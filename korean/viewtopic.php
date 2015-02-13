<?php
/***************************************************************************
 *                               viewtopic.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: viewtopic.php,v 1.13 2003/08/30 15:05:45 acydburn Exp $
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . 'includes/bbcode.'.$phpEx);
include($phpbb_root_path . 'includes/functions_post.'.$phpEx);

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
include($phpbb_root_path . 'includes/def_icons.'. $phpEx);
//-- fin mod : post icon ---------------------------------------------------------------------------

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
include_once($phpbb_root_path . 'includes/functions_calendar.'.$phpEx);
//-- fin mod : calendar ----------------------------------------------------------------------------

//
// Start initial var setup
//
$topic_id = $post_id = 0;
if ( isset($HTTP_GET_VARS[POST_TOPIC_URL]) )
{
	$topic_id = intval($HTTP_GET_VARS[POST_TOPIC_URL]);
}
else if ( isset($HTTP_GET_VARS['topic']) )
{
	$topic_id = intval($HTTP_GET_VARS['topic']);
}

if ( isset($HTTP_GET_VARS[POST_POST_URL]))
{
	$post_id = intval($HTTP_GET_VARS[POST_POST_URL]);
}


$start = ( isset($HTTP_GET_VARS['start']) ) ? intval($HTTP_GET_VARS['start']) : 0;

if ( !isset($topic_id) && !isset($post_id) )
{
	message_die(GENERAL_MESSAGE, 'Topic_post_not_exist');
}

//
// Find topic id if user requested a newer
// or older topic
//
if ( isset($HTTP_GET_VARS['view']) && empty($HTTP_GET_VARS[POST_POST_URL]) )
{
	if ( $HTTP_GET_VARS['view'] == 'newest' )
	{
		if ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_sid']) || isset($HTTP_GET_VARS['sid']) )
		{
			$session_id = isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_sid']) ? $HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_sid'] : $HTTP_GET_VARS['sid'];

			if ( $session_id )
			{
				$sql = "SELECT p.post_id
					FROM " . POSTS_TABLE . " p, " . SESSIONS_TABLE . " s,  " . USERS_TABLE . " u
					WHERE s.session_id = '$session_id'
						AND u.user_id = s.session_user_id
						AND p.topic_id = $topic_id
						AND p.post_time >= u.user_lastvisit
					ORDER BY p.post_time ASC
					LIMIT 1";
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, 'Could not obtain newer/older topic information', '', __LINE__, __FILE__, $sql);
				}

				if ( !($row = $db->sql_fetchrow($result)) )
				{
					message_die(GENERAL_MESSAGE, 'No_new_posts_last_visit');
				}

				$post_id = $row['post_id'];

				if (isset($HTTP_GET_VARS['sid']))
				{
					redirect("viewtopic.$phpEx?sid=$session_id&" . POST_POST_URL . "=$post_id#$post_id");
				}
				else
				{
					redirect("viewtopic.$phpEx?" . POST_POST_URL . "=$post_id#$post_id");
				}
			}
		}

		redirect(append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id", true));
	}
	else if ( $HTTP_GET_VARS['view'] == 'next' || $HTTP_GET_VARS['view'] == 'previous' )
	{
		$sql_condition = ( $HTTP_GET_VARS['view'] == 'next' ) ? '>' : '<';
		$sql_ordering = ( $HTTP_GET_VARS['view'] == 'next' ) ? 'ASC' : 'DESC';

		$sql = "SELECT t.topic_id
			FROM " . TOPICS_TABLE . " t, " . TOPICS_TABLE . " t2
			WHERE
				t2.topic_id = $topic_id
				AND t.forum_id = t2.forum_id
				AND t.topic_last_post_id $sql_condition t2.topic_last_post_id
			ORDER BY t.topic_last_post_id $sql_ordering
			LIMIT 1";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Could not obtain newer/older topic information", '', __LINE__, __FILE__, $sql);
		}

		if ( $row = $db->sql_fetchrow($result) )
		{
			$topic_id = intval($row['topic_id']);
		}
		else
		{
			$message = ( $HTTP_GET_VARS['view'] == 'next' ) ? 'No_newer_topics' : 'No_older_topics';
			message_die(GENERAL_MESSAGE, $message);
		}
	}
}

//
// This rather complex gaggle of code handles querying for topics but
// also allows for direct linking to a post (and the calculation of which
// page the post is on and the correct display of viewtopic)
//
$join_sql_table = ( empty($post_id) ) ? '' : ", " . POSTS_TABLE . " p, " . POSTS_TABLE . " p2 ";
$join_sql = ( empty($post_id) ) ? "t.topic_id = $topic_id" : "p.post_id = $post_id AND t.topic_id = p.topic_id AND p2.topic_id = p.topic_id AND p2.post_id <= $post_id";
$count_sql = ( empty($post_id) ) ? '' : ", COUNT(p2.post_id) AS prev_posts";

$order_sql = ( empty($post_id) ) ? '' : "GROUP BY p.post_id, t.topic_id, t.topic_title, t.topic_status, t.topic_replies, t.topic_time, t.topic_type, t.topic_vote, t.topic_last_post_id, f.forum_name, f.forum_status, f.forum_id, f.auth_view, f.auth_read, f.auth_post, f.auth_reply, f.auth_edit, f.auth_delete, f.auth_sticky, f.auth_announce, f.auth_pollcreate, f.auth_vote, f.auth_attachments ORDER BY p.post_id ASC";

//-- mod : calendar --------------------------------------------------------------------------------
// here we added
//	, t.topic_first_post_id, t.topic_calendar_time, t.topic_calendar_duration
//-- modify

$sql = "SELECT t.topic_id, t.topic_title, t.topic_views, t.topic_status, t.topic_replies, t.topic_time, t.topic_type, t.topic_vote, t.topic_last_post_id, t.topic_first_post_id, t.topic_calendar_time, t.topic_calendar_duration, f.forum_name, f.forum_status, f.forum_id, f.auth_view, f.auth_read, f.auth_post, f.auth_reply, f.auth_edit, f.auth_delete, f.auth_sticky, f.auth_announce, f.auth_pollcreate, f.auth_vote, f.auth_attachments" . $count_sql . "
	FROM " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f" . $join_sql_table . "
	WHERE $join_sql
		AND f.forum_id = t.forum_id
		$order_sql";
attach_setup_viewtopic_auth($order_sql, $sql);

//-- fin mod : calendar ----------------------------------------------------------------------------

if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain topic information", '', __LINE__, __FILE__, $sql);
}

if ( !($forum_topic_data = $db->sql_fetchrow($result)) )
{
	message_die(GENERAL_MESSAGE, 'Topic_post_not_exist');
}

$forum_id = intval($forum_topic_data['forum_id']);

//
// Start session management
//
$userdata = session_pagestart($user_ip, $forum_id);
init_userprefs($userdata);
//
// End session management
//

//
// Start auth check
//
$is_auth = array();
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
// $is_auth = auth(AUTH_ALL, $forum_id, $userdata, $forum_topic_data);
//
// if( !$is_auth['auth_view'] || !$is_auth['auth_read'] )
//-- add
$is_auth = $tree['auth'][POST_FORUM_URL . $forum_id];


//get topic_id and make a switch for 'my-topic'

$topic_id_temp = 0;

if ($topic_id != 0)
{
	$topic_id_temp = $topic_id;
}
else {
	$sql = "SELECT p.topic_id
		FROM " . POSTS_TABLE . " p 
		WHERE
			p.post_id = $post_id
		";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Could not obtain topic information", '', __LINE__, __FILE__, $sql);
	}
	if ( $row = $db->sql_fetchrow($result) )
	{
		$topic_id_temp = intval($row['topic_id']);
	}
}

$sql = "SELECT t.topic_poster
	FROM " . TOPICS_TABLE . " t 
	WHERE
		t.topic_id = $topic_id_temp 
	";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain topic information", '', __LINE__, __FILE__, $sql);
}
if ( $row = $db->sql_fetchrow($result) )
{
	$poster_temp = intval($row['topic_poster']);
}

if (($userdata['user_id'] != ANONYMOUS && $poster_temp != ANONYMOUS && $userdata['user_id'] == $poster_temp) || $is_auth['auth_mod'])
{
	$template->assign_block_vars('switch_my_topic', array());
}
else {
	$template->assign_block_vars('switch_not_my_topic', array());
}

$forbiddenForumIDs = explode(',',$board_config['remark5']);		

if (in_array($forum_id, $forbiddenForumIDs) && $userdata['user_id'] != $poster_temp && !$is_auth['auth_mod'])
{
	message_die(GENERAL_ERROR, "Illegal Access");
}


if ($is_auth['auth_reply'])
{
	$template->assign_block_vars('switch_reply_possible', array());
	if (!$userdata['session_logged_in'] )
	{
		$template->assign_block_vars('switch_reply_possible.switch_user_logged_out', array());
	}
	else
	{
		$template->assign_block_vars('switch_reply_possible.switch_user_logged_in', array());
	}
}
else {
	$template->assign_block_vars('switch_reply_impossible', array());
}

///////////////////////////////////////

if ( !$is_auth['auth_read'] )
//-- fin mod : categories hierarchy ----------------------------------------------------------------
{
	if ( !$userdata['session_logged_in'] )
	{
		$redirect = ( isset($post_id)  && $post_id != 0) ? POST_POST_URL . "=$post_id" : POST_TOPIC_URL . "=$topic_id";
		$redirect .= ( isset($start) ) ? "&start=$start" : '';
		redirect(append_sid("login.$phpEx?redirect=viewtopic.$phpEx&$redirect", true));
	}

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//	$message = ( !$is_auth['auth_view'] ) ? $lang['Topic_post_not_exist'] : sprintf($lang['Sorry_auth_read'], $is_auth['auth_read_type']);
//-- add
	$message = sprintf($lang['Sorry_auth_read'], $is_auth['auth_read_type']);
//-- fin mod : categories hierarchy ----------------------------------------------------------------

	message_die(GENERAL_MESSAGE, $message);
}
//
// End auth check
//

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
// $forum_name = $forum_topic_data['forum_name'];
//-- add
$forum_name = get_object_lang(POST_FORUM_URL . $forum_topic_data['forum_id'], 'name');
$forum_desc = get_object_lang(POST_FORUM_URL . $forum_topic_data['forum_id'], 'desc');
//-- fin mod : categories hierarchy ----------------------------------------------------------------
$topic_title = $forum_topic_data['topic_title'];
$topic_id = intval($forum_topic_data['topic_id']);
$topic_time = $forum_topic_data['topic_time'];

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
$topic_first_post_id = intval($forum_topic_data['topic_first_post_id']);
$topic_calendar_time = intval($forum_topic_data['topic_calendar_time']);
$topic_calendar_duration = intval($forum_topic_data['topic_calendar_duration']);
//-- fin mod : calendar ----------------------------------------------------------------------------

if ( !empty($post_id) )
{
	$start = floor(($forum_topic_data['prev_posts'] - 1) / intval($board_config['posts_per_page'])) * intval($board_config['posts_per_page']);
}

//
// Buddylist actions
//
$buddy_id = ( isset($HTTP_GET_VARS['b']) ) ? intval($HTTP_GET_VARS['b']) : 0;
$buddy_action = ( isset($HTTP_GET_VARS['buddy']) ) ? $HTTP_GET_VARS['buddy'] : '';
if( $buddy_id && $buddy_action != '' )
{
	if( $buddy_action == 'add' )
	{
		add_buddy($userdata['user_id'], $buddy_id);
	}
	else if( $buddy_action == 'remove' )
	{
		remove_buddy($userdata['user_id'], $buddy_id);
	}
}
//
// END: Buddylist actions
//

//
// Is user watching this thread?
//
if( $userdata['session_logged_in'] )
{
	$can_watch_topic = TRUE;

	$sql = "SELECT notify_status
		FROM " . TOPICS_WATCH_TABLE . "
		WHERE topic_id = $topic_id
			AND user_id = " . $userdata['user_id'];
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Could not obtain topic watch information", '', __LINE__, __FILE__, $sql);
	}

	if ( $row = $db->sql_fetchrow($result) )
	{
		if ( isset($HTTP_GET_VARS['unwatch']) )
		{
			if ( $HTTP_GET_VARS['unwatch'] == 'topic' )
			{
				$is_watching_topic = 0;

				$sql_priority = (SQL_LAYER == "mysql") ? "LOW_PRIORITY" : '';
				$sql = "DELETE $sql_priority FROM " . TOPICS_WATCH_TABLE . "
					WHERE topic_id = $topic_id
						AND user_id = " . $userdata['user_id'];
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, "Could not delete topic watch information", '', __LINE__, __FILE__, $sql);
				}
				// Log actions MOD Start
				log_action('delete[topic-watch]', $topic_id, $userdata['user_id'], $userdata['username']);
				// Log actions MOD End
			}

			$template->assign_vars(array(
				'META' => '<meta http-equiv="refresh" content="3;url=' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start") . '">')
			);

			$message = $lang['No_longer_watching'] . '<br /><br />' . sprintf($lang['Click_return_topic'], '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start") . '">', '</a>');
			message_die(GENERAL_MESSAGE, $message);
		}
		else
		{
			$is_watching_topic = TRUE;

			if ( $row['notify_status'] )
			{
				$sql_priority = (SQL_LAYER == "mysql") ? "LOW_PRIORITY" : '';
				$sql = "UPDATE $sql_priority " . TOPICS_WATCH_TABLE . "
					SET notify_status = 0
					WHERE topic_id = $topic_id
						AND user_id = " . $userdata['user_id'];
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, "Could not update topic watch information", '', __LINE__, __FILE__, $sql);
				}
			}
		}
	}
	else
	{
		if ( isset($HTTP_GET_VARS['watch']) )
		{
			if ( $HTTP_GET_VARS['watch'] == 'topic' )
			{
				$is_watching_topic = TRUE;

				$sql_priority = (SQL_LAYER == "mysql") ? "LOW_PRIORITY" : '';
				$sql = "INSERT $sql_priority INTO " . TOPICS_WATCH_TABLE . " (user_id, topic_id, notify_status)
					VALUES (" . $userdata['user_id'] . ", $topic_id, 0)";
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, "Could not insert topic watch information", '', __LINE__, __FILE__, $sql);
				}
			}

			$template->assign_vars(array(
				'META' => '<meta http-equiv="refresh" content="3;url=' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start") . '">')
			);

			$message = $lang['You_are_watching'] . '<br /><br />' . sprintf($lang['Click_return_topic'], '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start") . '">', '</a>');
			message_die(GENERAL_MESSAGE, $message);
		}
		else
		{
			$is_watching_topic = 0;
		}
	}
}
else
{
	if ( isset($HTTP_GET_VARS['unwatch']) )
	{
		if ( $HTTP_GET_VARS['unwatch'] == 'topic' )
		{
			redirect(append_sid("login.$phpEx?redirect=viewtopic.$phpEx&" . POST_TOPIC_URL . "=$topic_id&unwatch=topic", true));
		}
	}
	else
	{
		$can_watch_topic = 0;
		$is_watching_topic = 0;
	}
}

//
// Generate a 'Show posts in previous x days' select box. If the postdays var is POSTed
// then get it's value, find the number of topics with dates newer than it (to properly
// handle pagination) and alter the main query
//
$previous_days = array(0, 1, 7, 14, 30, 90, 180, 364);
$previous_days_text = array($lang['All_Posts'], $lang['1_Day'], $lang['7_Days'], $lang['2_Weeks'], $lang['1_Month'], $lang['3_Months'], $lang['6_Months'], $lang['1_Year']);

if( !empty($HTTP_POST_VARS['postdays']) || !empty($HTTP_GET_VARS['postdays']) )
{
	$post_days = ( !empty($HTTP_POST_VARS['postdays']) ) ? $HTTP_POST_VARS['postdays'] : $HTTP_GET_VARS['postdays'];
	$min_post_time = time() - (intval($post_days) * 86400);

	$sql = "SELECT COUNT(p.post_id) AS num_posts
		FROM " . TOPICS_TABLE . " t, " . POSTS_TABLE . " p
		WHERE t.topic_id = $topic_id
			AND p.topic_id = t.topic_id
			AND p.post_time >= $min_post_time";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Could not obtain limited topics count information", '', __LINE__, __FILE__, $sql);
	}

	$total_replies = ( $row = $db->sql_fetchrow($result) ) ? intval($row['num_posts']) : 0;

	$limit_posts_time = "AND p.post_time >= $min_post_time ";

	if ( !empty($HTTP_POST_VARS['postdays']))
	{
		$start = 0;
	}
}
else
{
	$total_replies = intval($forum_topic_data['topic_replies']) + 1;

	$limit_posts_time = '';
	$post_days = 0;
}

$select_post_days = '<select name="postdays">';
for($i = 0; $i < count($previous_days); $i++)
{
	$selected = ($post_days == $previous_days[$i]) ? ' selected="selected"' : '';
	$select_post_days .= '<option value="' . $previous_days[$i] . '"' . $selected . '>' . $previous_days_text[$i] . '</option>';
}
$select_post_days .= '</select>';

//
// Decide how to order the post display
//
if ( !empty($HTTP_POST_VARS['postorder']) || !empty($HTTP_GET_VARS['postorder']) )
{
	$post_order = (!empty($HTTP_POST_VARS['postorder'])) ? $HTTP_POST_VARS['postorder'] : $HTTP_GET_VARS['postorder'];
	$post_time_order = ($post_order == "asc") ? "ASC" : "DESC";
}
else
{
	$post_order = 'desc';
	$post_time_order = 'DESC';
}

$select_post_order = '<select name="postorder">';
if ( $post_time_order == 'ASC' )
{
	$select_post_order .= '<option value="asc" selected="selected">' . $lang['Oldest_First'] . '</option><option value="desc">' . $lang['Newest_First'] . '</option>';
}
else
{
	$select_post_order .= '<option value="asc">' . $lang['Oldest_First'] . '</option><option value="desc" selected="selected">' . $lang['Newest_First'] . '</option>';
}
$select_post_order .= '</select>';

//
// Go ahead and pull all data for this topic
//
$sql = "SELECT u.username, u.user_realname, u.user_level, u.user_id, u.user_posts, u.user_from, u.user_website, u.user_email, u.user_icq, u.user_aim, u.user_yim, u.user_regdate, u.user_msnm, u.user_viewemail, u.user_rank, u.user_sig, u.user_sig_bbcode_uid, u.user_avatar, u.user_avatar_type, u.user_allowavatar, u.user_allowsmile, p.*,  pt.post_text, pt.post_subject, pt.bbcode_uid, pt.remark1, pt.remark2, pt.remark3, pt.remark4, pt.remark5, pt.remark6, pt.remark7, pt.remark8, pt.remark9, pt.remark10, pt.remark11, pt.remark12, pt.remark13, pt.remark14, pt.remark15 
	FROM " . POSTS_TABLE . " p, " . USERS_TABLE . " u, " . POSTS_TEXT_TABLE . " pt
	WHERE p.topic_id = $topic_id
		$limit_posts_time
		AND pt.post_id = p.post_id
		AND u.user_id = p.poster_id
	ORDER BY (p.post_id = $topic_first_post_id) DESC, p.post_time $post_time_order
	LIMIT $start, ".(isset($HTTP_GET_VARS['msgcount']) & isset($HTTP_GET_VARS['printertopic']) ? intval($HTTP_GET_VARS['msgcount']) : $board_config['posts_per_page']);
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain post/user information.", '', __LINE__, __FILE__, $sql);
}

$postrow = array();
if ($row = $db->sql_fetchrow($result))
{
	do
	{
		$postrow[] = $row;
	}
	while ($row = $db->sql_fetchrow($result));
	$db->sql_freeresult($result);

	$total_posts = count($postrow);
}
else 
{ 
   include($phpbb_root_path . 'includes/functions_admin.' . $phpEx); 
   sync('topic', $topic_id); 

   message_die(GENERAL_MESSAGE, $lang['No_posts_topic']); 
} 

$resync = FALSE; 
if ($forum_topic_data['topic_replies'] + 1 < $start + count($postrow)) 
{ 
   $resync = TRUE; 
} 
elseif ($start + $board_config['posts_per_page'] > $forum_topic_data['topic_replies']) 
{ 
   $row_id = intval($forum_topic_data['topic_replies']) % intval($board_config['posts_per_page']); 
   if ($postrow[$row_id]['post_id'] != $forum_topic_data['topic_last_post_id'] || $start + count($postrow) < $forum_topic_data['topic_replies']) 
   { 
      $resync = TRUE; 
   } 
} 
elseif (count($postrow) < $board_config['posts_per_page']) 
{ 
   $resync = TRUE; 
} 

if ($resync) 
{ 
   include($phpbb_root_path . 'includes/functions_admin.' . $phpEx); 
   sync('topic', $topic_id); 

   $result = $db->sql_query('SELECT COUNT(post_id) AS total FROM ' . POSTS_TABLE . ' WHERE topic_id = ' . $topic_id); 
   $row = $db->sql_fetchrow($result); 
   $total_replies = $row['total']; 
}

$sql = "SELECT *
	FROM " . RANKS_TABLE . "
	ORDER BY rank_special, rank_min";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain ranks information.", '', __LINE__, __FILE__, $sql);
}

$ranksrow = array();
while ( $row = $db->sql_fetchrow($result) )
{
	$ranksrow[] = $row;
}
$db->sql_freeresult($result);

//
// Define censored word matches
//
$orig_word = array();
$replacement_word = array();
obtain_word_list($orig_word, $replacement_word);

//die($orig_word[0].'...'.$replacement_word[0].$orig_word[1].'...'.$replacement_word[1]);



//
// Censor topic title
//
if ( count($orig_word) )
{
	$topic_title = preg_replace($orig_word, $replacement_word, $topic_title);
}

//
// Was a highlight request part of the URI?
//
$highlight_match = $highlight = '';
if (isset($HTTP_GET_VARS['highlight']))
{
	// Split words and phrases
	$words = explode(' ', trim(htmlspecialchars($HTTP_GET_VARS['highlight'])));

	for($i = 0; $i < sizeof($words); $i++)
	{
		if (trim($words[$i]) != '')
		{
			$highlight_match .= (($highlight_match != '') ? '|' : '') . str_replace('*', '\w*', phpbb_preg_quote($words[$i], '#'));
		}
	}
	unset($words);

	$highlight = urlencode($HTTP_GET_VARS['highlight']);
}

//
// Post, reply and other URL generation for
// templating vars
//

$printer_topic_url = append_sid("viewtopic.$phpEx?printertopic=1&" . POST_TOPIC_URL . "=$topic_id&start=$start&postdays=$post_days&postorder=$post_order&vote=viewresult");

$new_topic_url = append_sid("posting.$phpEx?mode=newtopic&amp;" . POST_FORUM_URL . "=$forum_id");
$reply_topic_url = append_sid("posting.$phpEx?mode=reply&amp;" . POST_TOPIC_URL . "=$topic_id");
$view_forum_url = append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id");
$view_prev_topic_url = append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=previous");
$view_next_topic_url = append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=next");

//
// Mozilla navigation bar
//
$nav_links['prev'] = array(
	'url' => $view_prev_topic_url,
	'title' => $lang['View_previous_topic']
);
$nav_links['next'] = array(
	'url' => $view_next_topic_url,
	'title' => $lang['View_next_topic']
);
$nav_links['up'] = array(
	'url' => $view_forum_url,
	'title' => $forum_name
);

$reply_img = ( $forum_topic_data['forum_status'] == FORUM_LOCKED || $forum_topic_data['topic_status'] == TOPIC_LOCKED ) ? $images['reply_locked'] : $images['reply_new'];
$reply_alt = ( $forum_topic_data['forum_status'] == FORUM_LOCKED || $forum_topic_data['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['Reply_to_topic'];
$post_img = ( $forum_topic_data['forum_status'] == FORUM_LOCKED ) ? $images['post_locked'] : $images['post_new'];
$post_alt = ( $forum_topic_data['forum_status'] == FORUM_LOCKED ) ? $lang['Forum_locked'] : $lang['Post_new_topic'];

$printer_img = $images['printer'];
$printer_alt = "Printer-friendly version";

//
// Set a cookie for this topic
//
if ( $userdata['session_logged_in'] )
{
	$tracking_topics = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) : array();
	$tracking_forums = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) : array();

	if ( !empty($tracking_topics[$topic_id]) && !empty($tracking_forums[$forum_id]) )
	{
		$topic_last_read = ( $tracking_topics[$topic_id] > $tracking_forums[$forum_id] ) ? $tracking_topics[$topic_id] : $tracking_forums[$forum_id];
	}
	else if ( !empty($tracking_topics[$topic_id]) || !empty($tracking_forums[$forum_id]) )
	{
		$topic_last_read = ( !empty($tracking_topics[$topic_id]) ) ? $tracking_topics[$topic_id] : $tracking_forums[$forum_id];
	}
	else
	{
		$topic_last_read = $userdata['user_lastvisit'];
	}

	if ( count($tracking_topics) >= 150 && empty($tracking_topics[$topic_id]) )
	{
		asort($tracking_topics);
		unset($tracking_topics[key($tracking_topics)]);
	}

	$tracking_topics[$topic_id] = time();

	setcookie($board_config['cookie_name'] . '_t', serialize($tracking_topics), 0, $board_config['cookie_path'], $board_config['cookie_domain'], $board_config['cookie_secure']);
}

//
// Load templates
//
if(isset($HTTP_GET_VARS['popup']) && isset($HTTP_GET_VARS['printable']))
	$template->set_filenames(array(
		'body' => 'printertopic_body.tpl')
	);
else if(isset($HTTP_GET_VARS['popup'])) 
	$template->set_filenames(array(
		'body' => 'popup_body.tpl')
	);
else
	$template->set_filenames(array(
		'body' => 'viewtopic_body.tpl')
	);

if($tree['main'][$tree['keys'][POST_FORUM_URL.$forum_id]] != 'c1') {
	make_jumpbox('viewforum.'.$phpEx, $forum_id);
}

//
// Output page header
//
$page_title = $lang['View_topic'] .' - ' . $topic_title;
if(isset($HTTP_GET_VARS['printertopic'])) {
	include($phpbb_root_path . 'includes/page_header_printer.'.$phpEx);
}
else {
	if(isset($HTTP_GET_VARS['popup'])) {
		$gen_simple_header = -1;
		$page_title = $topic_title;
	}
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);
}

//-- mod : sub-template ----------------------------------------------------------------------------
//-- add
$reply_img = ( $forum_topic_data['forum_status'] == FORUM_LOCKED || $forum_topic_data['topic_status'] == TOPIC_LOCKED ) ? $images['reply_locked'] : $images['reply_new'];
$post_img = ( $forum_topic_data['forum_status'] == FORUM_LOCKED ) ? $images['post_locked'] : $images['post_new'];
//-- fin mod : sub-template ------------------------------------------------------------------------

//
// User authorisation levels output
//
$s_auth_can = ( ( $is_auth['auth_post'] ) ? $lang['Rules_post_can'] : $lang['Rules_post_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_reply'] ) ? $lang['Rules_reply_can'] : $lang['Rules_reply_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_edit'] ) ? $lang['Rules_edit_can'] : $lang['Rules_edit_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_delete'] ) ? $lang['Rules_delete_can'] : $lang['Rules_delete_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_vote'] ) ? $lang['Rules_vote_can'] : $lang['Rules_vote_cannot'] ) . '<br />';
attach_build_auth_levels($is_auth, $s_auth_can);

$topic_mod = '';

if ( $is_auth['auth_mod'] )
{
	$topic_mod .= "<td width=\"190\"><a href=\"modcp.$phpEx?" . POST_FORUM_URL . "=$forum_id&amp;sid=" . $userdata['session_id'] . "\"><img src=\"templates/".$theme['template_name']."/images/admin-menu1.gif\" alt=\"\" title=\"\" border=\"0\" /></a></td>";

	$topic_mod .= "<td width=\"190\"><a href=\"modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=delete&amp;sid=" . $userdata['session_id'] . '"><img src="templates/'.$theme['template_name'].'/images/admin-menu2.gif" alt="' . $lang['Delete_topic'] . '" title="' . $lang['Delete_topic'] . '" border="0" /></a></td>';

	$topic_mod .= "<td width=\"190\"><a href=\"modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=move&amp;sid=" . $userdata['session_id'] . '"><img src="templates/'.$theme['template_name'].'/images/admin-menu3.gif" alt="' . $lang['Move_topic'] . '" title="' . $lang['Move_topic'] . '" border="0" /></a></td>';

	$topic_mod .= ( $forum_topic_data['topic_status'] == TOPIC_UNLOCKED ) ? "<td width=\"190\"><a href=\"modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=lock&amp;sid=" . $userdata['session_id'] . '"><img src="templates/'.$theme['template_name'].'/images/admin-menu4.gif" alt="' . $lang['Lock_topic'] . '" title="' . $lang['Lock_topic'] . '" border="0" /></a></td>' : "<td width=\"190\"><a href=\"modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=unlock&amp;sid=" . $userdata['session_id'] . '"><img src="templates/'.$theme['template_name'].'/images/admin-menu4-1.gif" alt="' . $lang['Unlock_topic'] . '" title="' . $lang['Unlock_topic'] . '" border="0" /></a></td>';

	$topic_mod .= "<td width=\"190\"><a href=\"modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=split&amp;sid=" . $userdata['session_id'] . '"><img src="templates/'.$theme['template_name'].'/images/admin-menu5.gif" alt="' . $lang['Split_topic'] . '" title="' . $lang['Split_topic'] . '" border="0" /></a></td>';
}

//
// Topic watch information
//
$s_watching_topic = '';
if ( $can_watch_topic )
{
	if ( $is_watching_topic )
	{
		$s_watching_topic = "<a href=\"viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;unwatch=topic&amp;start=$start&amp;sid=" . $userdata['session_id'] . '">' . $lang['Stop_watching_topic'] . '</a>';
		$s_watching_topic_img = ( isset($images['topic_un_watch']) ) ? "<a href=\"viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;unwatch=topic&amp;start=$start&amp;sid=" . $userdata['session_id'] . '"><img src="' . $images['topic_un_watch'] . '" alt="' . $lang['Stop_watching_topic'] . '" title="' . $lang['Stop_watching_topic'] . '" border="0" align="absmiddle"></a>' : '';
	}
	else
	{
		$s_watching_topic = "<a href=\"viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;watch=topic&amp;start=$start&amp;sid=" . $userdata['session_id'] . '">' . $lang['Start_watching_topic'] . '</a>';
		$s_watching_topic_img = ( isset($images['Topic_watch']) ) ? "<a href=\"viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;watch=topic&amp;start=$start&amp;sid=" . $userdata['session_id'] . '"><img src="' . $images['Topic_watch'] . '" alt="' . $lang['Start_watching_topic'] . '" title="' . $lang['Start_watching_topic'] . '" border="0" align="absmiddle"></a>' : '';
	}
}

//
// If we've got a hightlight set pass it on to pagination,
// I get annoyed when I lose my highlight after the first page.
//
if(isset($HTTP_GET_VARS['printertopic'])) {
	$pagination = ( $highlight != '' )? generate_pagination("viewtopic.$phpEx?printertopic=1&amp;" . POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order&amp;highlight=$highlight". (isset($HTTP_GET_VARS['msgcount'])? "&amp;msgcount=". intval($HTTP_GET_VARS['msgcount']): ''), $total_replies, (isset($HTTP_GET_VARS['msgcount'])? intval($HTTP_GET_VARS['msgcount']): $board_config['posts_per_page']), $start): generate_pagination("viewtopic.$phpEx?printertopic=1&amp;" . POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order". (isset($HTTP_GET_VARS['msgcount'])? "&amp;msgcount=". intval($HTTP_GET_VARS['msgcount']): ''), $total_replies, (isset($HTTP_GET_VARS['msgcount'])? intval($HTTP_GET_VARS['msgcount']): $board_config['posts_per_page']), $start);
	if($pagination != '')
		$pagination = $pagination. (( $highlight != '' )? " &nbsp;<a href=\"viewtopic.$phpEx?printertopic=1&amp;". POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order&amp;highlight=$highlight&amp;start=0&amp;msgcount=10000\" title=\"no pagination\">:||:</a>":  " &nbsp;<a href=\"viewtopic.$phpEx?printertopic=1&amp;". POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order&amp;start=0&amp;msgcount=10000\" title=\"no pagination\">:||:</a>");
	}
else
	$pagination = ( $highlight != '' )? generate_pagination("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order&amp;highlight=$highlight", $total_replies, (isset($HTTP_GET_VARS['msgcount'])? intval($HTTP_GET_VARS['msgcount']): $board_config['posts_per_page']), $start): generate_pagination("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order", $total_replies, (isset($HTTP_GET_VARS['msgcount'])? intval($HTTP_GET_VARS['msgcount']): $board_config['posts_per_page']), $start);

//check for previous and next topic

$sql = "SELECT t.topic_id
	FROM " . TOPICS_TABLE . " t, " . TOPICS_TABLE . " t2
	WHERE
		t2.topic_id = $topic_id
		AND t.forum_id = t2.forum_id
		AND t.topic_last_post_id < t2.topic_last_post_id
	ORDER BY t.topic_last_post_id DESC
	LIMIT 1";

if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain newer/older topic information", '', __LINE__, __FILE__, $sql);
}

$view_previous_topic = (!($row = $db->sql_fetchrow($result))) ? '' : '<img src="templates/'.$theme['template_name'].'/images/icon_prev.gif" border=0>'; 


$sql = "SELECT t.topic_id
	FROM " . TOPICS_TABLE . " t, " . TOPICS_TABLE . " t2
	WHERE
		t2.topic_id = $topic_id
		AND t.forum_id = t2.forum_id
		AND t.topic_last_post_id > t2.topic_last_post_id
	ORDER BY t.topic_last_post_id ASC
	LIMIT 1";

if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain newer/older topic information", '', __LINE__, __FILE__, $sql);
}

$view_next_topic = (!($row = $db->sql_fetchrow($result))) ? '' : '<img src="templates/'.$theme['template_name'].'/images/icon_next.gif" border=0>'; 

//print_r($is_auth);

if (!($is_auth['auth_post'] || $is_auth['auth_mod'] ) )
{
	$post_img = '';
}
else {
	$post_img = "<a href=\"$new_topic_url\"><img src=\"$post_img\" border=\"0\" alt=\"$post_alt\" align=\"middle\" /></a>&nbsp;";
}

if (!($is_auth['auth_reply'] || $is_auth['auth_mod'])  )
{
	$reply_img = '';
}
else {
	$reply_img = "<a href=\"$reply_topic_url\"><img src=\"$reply_img\" border=\"0\" alt=\"$reply_alt\" align=\"middle\" /></a>&nbsp;";
}

//
// Send vars to template
//
$template->assign_vars(array(
	'FORUM_ID' => $forum_id,
    'FORUM_NAME' => $forum_name,
	'FORUM_DESC' => $forum_desc,
    'TOPIC_ID' => $topic_id,
    'TOPIC_TITLE' => $topic_title,
	'VIEWS' => $forum_topic_data['topic_views'],
	'PAGINATION' => $pagination,
	'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / intval((isset($HTTP_GET_VARS['msgcount'])? intval($HTTP_GET_VARS['msgcount']): $board_config['posts_per_page'])) ) + 1 ), ceil( $total_replies / intval((isset($HTTP_GET_VARS['msgcount'])? intval($HTTP_GET_VARS['msgcount']): $board_config['posts_per_page'])) )),

	'POST_IMG' => $post_img,
	'REPLY_IMG' => $reply_img,

	'PRINTER_IMG' => $printer_img,
	'PRINTER_URL' => "viewtopic.$phpEx?popup=yes&today=no&printable=yes&" . POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order&start=".$start,

	'L_SITE_ADDRESS' => $lang['site_address'],

	'L_AUTHOR' => $lang['Author'],
	'L_MESSAGE' => $lang['Message'],
	'L_POSTED' => $lang['Posted'],
	'L_POST_SUBJECT' => $lang['Post_subject'],
	'L_VIEW_NEXT_TOPIC' => $view_next_topic,
	'L_VIEW_PREVIOUS_TOPIC' => $view_previous_topic,
	'L_POST_NEW_TOPIC' => $post_alt,
	'L_POST_REPLY_TOPIC' => $reply_alt,

	'L_PRINTER_TOPIC' => $lang['printer_topic'], 

	'L_BACK_TO_TOP' => $lang['Back_to_top'],
	'L_DISPLAY_POSTS' => $lang['Display_posts'],
	'L_LOCK_TOPIC' => $lang['Lock_topic'],
	'L_UNLOCK_TOPIC' => $lang['Unlock_topic'],
	'L_MOVE_TOPIC' => $lang['Move_topic'],
	'L_SPLIT_TOPIC' => $lang['Split_topic'],
	'L_DELETE_TOPIC' => $lang['Delete_topic'],
	'L_GOTO_PAGE' => $lang['Goto_page'],
	'L_VIEW_FORUM' => $lang['view_list'],
	'REQUIRED_PASSWORD' => $lang['required_password'],
	'L_EMPTY_MESSAGE' => $lang['Empty_message'],
	'L_EMPTY_SUBJECT' => $lang['Empty_subject'],
	'L_EMPTY_AUTHOR' => $lang['Empty_author'],
	'L_SUBMIT' => $lang['Submit'],

	'S_TOPIC_LINK' => POST_TOPIC_URL,
	'S_SELECT_POST_DAYS' => $select_post_days,
	'S_SELECT_POST_ORDER' => $select_post_order,
	'S_POST_DAYS_ACTION' => append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . '=' . $topic_id . "&amp;start=$start"),
	'S_AUTH_LIST' => $s_auth_can,
	'S_TOPIC_ADMIN' => $topic_mod,
	'S_WATCH_TOPIC' => $s_watching_topic,
	'S_WATCH_TOPIC_IMG' => $s_watching_topic_img,

	'U_FAV' => append_sid("favorites.$phpEx?t=" . $topic_id . "&mode=add"),
	'L_FAV' => $lang['add_fav'],

	'U_VIEW_TOPIC' => append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start&amp;postdays=$post_days&amp;postorder=$post_order&amp;highlight=$highlight"),
	'U_VIEW_FORUM' => $view_forum_url,
	'U_VIEW_OLDER_TOPIC' => $view_prev_topic_url,
	'U_VIEW_NEWER_TOPIC' => $view_next_topic_url,
	'U_POST_NEW_TOPIC' => $new_topic_url,

	'U_PRINTER_TOPIC' => $printer_topic_url,

	'U_POST_REPLY_TOPIC' => $reply_topic_url)
);

//
// Does this topic contain a poll?
//
if ( !empty($forum_topic_data['topic_vote']) )
{
	$s_hidden_fields = '';

	$sql = "SELECT vd.vote_id, vd.vote_text, vd.vote_start, vd.vote_length, vr.vote_option_id, vr.vote_option_text, vr.vote_result
		FROM " . VOTE_DESC_TABLE . " vd, " . VOTE_RESULTS_TABLE . " vr
		WHERE vd.topic_id = $topic_id
			AND vr.vote_id = vd.vote_id
		ORDER BY vr.vote_option_id ASC";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Could not obtain vote data for this topic", '', __LINE__, __FILE__, $sql);
	}

	if ( $vote_info = $db->sql_fetchrowset($result) )
	{
		$db->sql_freeresult($result);
		$vote_options = count($vote_info);

		$vote_id = $vote_info[0]['vote_id'];
		$vote_title = $vote_info[0]['vote_text'];

		$sql = "SELECT vote_id
			FROM " . VOTE_USERS_TABLE . "
			WHERE vote_id = $vote_id
				AND vote_user_id = " . intval($userdata['user_id']);
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Could not obtain user vote data for this topic", '', __LINE__, __FILE__, $sql);
		}

		$user_voted = ( $row = $db->sql_fetchrow($result) ) ? TRUE : 0;
		$db->sql_freeresult($result);

		if ( isset($HTTP_GET_VARS['vote']) || isset($HTTP_POST_VARS['vote']) )
		{
			$view_result = ( ( ( isset($HTTP_GET_VARS['vote']) ) ? $HTTP_GET_VARS['vote'] : $HTTP_POST_VARS['vote'] ) == 'viewresult' ) ? TRUE : 0;
		}
		else
		{
			$view_result = 0;
		}

		$poll_expired = ( $vote_info[0]['vote_length'] ) ? ( ( $vote_info[0]['vote_start'] + $vote_info[0]['vote_length'] < time() ) ? TRUE : 0 ) : 0;

		if ( $user_voted || $view_result || $poll_expired || !$is_auth['auth_vote'] || $forum_topic_data['topic_status'] == TOPIC_LOCKED )
		{
			$template->set_filenames(array(
				'pollbox' => 'viewtopic_poll_result.tpl')
			);

			$vote_results_sum = 0;

			for($i = 0; $i < $vote_options; $i++)
			{
				$vote_results_sum += $vote_info[$i]['vote_result'];
			}

			$vote_graphic = 0;
			$vote_graphic_max = count($images['voting_graphic']);

			for($i = 0; $i < $vote_options; $i++)
			{
				$vote_percent = ( $vote_results_sum > 0 ) ? $vote_info[$i]['vote_result'] / $vote_results_sum : 0;
				$vote_graphic_length = round($vote_percent * $board_config['vote_graphic_length']);

				$vote_graphic_img = $images['voting_graphic'][$vote_graphic];
				$vote_graphic = ($vote_graphic < $vote_graphic_max - 1) ? $vote_graphic + 1 : 0;

				if ( count($orig_word) )
				{
					$vote_info[$i]['vote_option_text'] = preg_replace($orig_word, $replacement_word, $vote_info[$i]['vote_option_text']);
				}

				$template->assign_block_vars("poll_option", array(
					'POLL_OPTION_CAPTION' => $vote_info[$i]['vote_option_text'],
					'POLL_OPTION_RESULT' => $vote_info[$i]['vote_result'],
					'POLL_OPTION_PERCENT' => sprintf("%.1d%%", ($vote_percent * 100)),

					'POLL_OPTION_IMG' => $vote_graphic_img,
					'POLL_OPTION_IMG_WIDTH' => $vote_graphic_length)
				);
			}

			$template->assign_vars(array(
				'L_TOTAL_VOTES' => $lang['Total_votes'],
				'TOTAL_VOTES' => $vote_results_sum)
			);

		}
		else
		{
			$template->set_filenames(array(
				'pollbox' => 'viewtopic_poll_ballot.tpl')
			);

			for($i = 0; $i < $vote_options; $i++)
			{
				if ( count($orig_word) )
				{
					$vote_info[$i]['vote_option_text'] = preg_replace($orig_word, $replacement_word, $vote_info[$i]['vote_option_text']);
				}

				$template->assign_block_vars("poll_option", array(
					'POLL_OPTION_ID' => $vote_info[$i]['vote_option_id'],
					'POLL_OPTION_CAPTION' => $vote_info[$i]['vote_option_text'])
				);
			}

			$template->assign_vars(array(
				'L_SUBMIT_VOTE' => $lang['Submit_vote'],
				'L_VIEW_RESULTS' => $lang['View_results'],

				'U_VIEW_RESULTS' => append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order&amp;vote=viewresult"))
			);

			$s_hidden_fields = '<input type="hidden" name="topic_id" value="' . $topic_id . '" /><input type="hidden" name="mode" value="vote" />';
		}

		if ( count($orig_word) )
		{
			$vote_title = preg_replace($orig_word, $replacement_word, $vote_title);
		}

		$s_hidden_fields .= '<input type="hidden" name="sid" value="' . $userdata['session_id'] . '" />';

		$template->assign_vars(array(
			'POLL_QUESTION' => $vote_title,

			'S_HIDDEN_FIELDS' => $s_hidden_fields,
			'S_POLL_ACTION' => append_sid("posting.$phpEx?mode=vote&amp;" . POST_TOPIC_URL . "=$topic_id"))
		);

		$template->assign_var_from_handle('POLL_DISPLAY', 'pollbox');
	}
}

init_display_post_attachments($forum_topic_data['topic_attachment']);
//
// Update the topic view counter
//
$sql = "UPDATE " . TOPICS_TABLE . "
	SET topic_views = topic_views + 1
	WHERE topic_id = $topic_id";
if ( !$db->sql_query($sql) )
{
	message_die(GENERAL_ERROR, "Could not update topic views.", '', __LINE__, __FILE__, $sql);
}

/////////////////////////////////////////
$sql = "SELECT t.*, u.* 
	FROM " . TOPICS_TABLE . " t, " . TOPICS_TABLE . " t2,  " . USERS_TABLE . " u 
	WHERE
		t2.topic_id = $topic_id
		AND t.forum_id = t2.forum_id
		AND t.topic_poster = u.user_id
		AND t.topic_last_post_id > t2.topic_last_post_id
	ORDER BY t.topic_last_post_id ASC
	LIMIT 1";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain next/prev topic information", '', __LINE__, __FILE__, $sql);
}

if ( $next_topic_info = $db->sql_fetchrow($result) )
{
	$template->assign_block_vars('switch_next_topic', array());
}

$sql = "SELECT t.*, u.* 
	FROM " . TOPICS_TABLE . " t, " . TOPICS_TABLE . " t2,  " . USERS_TABLE . " u 
	WHERE
		t2.topic_id = $topic_id
		AND t.forum_id = t2.forum_id
		AND t.topic_poster = u.user_id
		AND t.topic_last_post_id < t2.topic_last_post_id
	ORDER BY t.topic_last_post_id DESC
	LIMIT 1";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain next/prev topic information", '', __LINE__, __FILE__, $sql);
}

if ( $prev_topic_info = $db->sql_fetchrow($result) )
{
	$template->assign_block_vars('switch_prev_topic', array());
}

$template->assign_vars(array(
	'NEXT_TOPIC_ID' => $next_topic_info['topic_id'],
	'NEXT_TOPIC_TITLE' => $next_topic_info['topic_title'],
	'NEXT_TOPIC_POSTER' => $next_topic_info['username'],
	'NEXT_TOPIC_TIME' => create_date('Y/m/d', $next_topic_info['topic_time'], $board_config['board_timezone']),

	'PREV_TOPIC_ID' => $prev_topic_info['topic_id'],
	'PREV_TOPIC_TITLE' => $prev_topic_info['topic_title'],
	'PREV_TOPIC_POSTER' => $prev_topic_info['username'],
	'PREV_TOPIC_TIME' => create_date('Y/m/d', $prev_topic_info['topic_time'], $board_config['board_timezone']),
	)
);
/////////////////////////////////////////


//
// Okay, let's do the loop, yeah come on baby let's do the loop
// and it goes like this ...
//
for($i = 0; $i < $total_posts; $i++)
{
	$poster_id = $postrow[$i]['user_id'];
	$poster = ( $poster_id == ANONYMOUS ) ? $lang['Guest'] : $postrow[$i]['username'];
	$commentor = ( $poster_id == ANONYMOUS ) ? $postrow[$i]['post_subject'] : $postrow[$i]['username'];

	$post_date = create_date($board_config['default_dateformat'], $postrow[$i]['post_time'], $board_config['board_timezone']);

	$poster_posts = ( $postrow[$i]['user_id'] != ANONYMOUS ) ? $lang['Posts'] . ': ' . $postrow[$i]['user_posts'] : '';

	$poster_from = ( $postrow[$i]['user_from'] && $postrow[$i]['user_id'] != ANONYMOUS ) ? $lang['Location'] . ': ' . $postrow[$i]['user_from'] : '';

	$poster_joined = ( $postrow[$i]['user_id'] != ANONYMOUS ) ? $lang['Joined'] . ': ' . create_date($lang['DATE_FORMAT'], $postrow[$i]['user_regdate'], $board_config['board_timezone']) : '';

	$poster_avatar = '';
	if ( $postrow[$i]['user_avatar_type'] && $poster_id != ANONYMOUS && $postrow[$i]['user_allowavatar'] )
	{
		switch( $postrow[$i]['user_avatar_type'] )
		{
			case USER_AVATAR_UPLOAD:
				$poster_avatar = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $postrow[$i]['user_avatar'] . '" alt="" border="0" />' : '';
				break;
			case USER_AVATAR_REMOTE:
				$poster_avatar = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $postrow[$i]['user_avatar'] . '" alt="" border="0" />' : '';
				break;
			case USER_AVATAR_GALLERY:
				$poster_avatar = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $postrow[$i]['user_avatar'] . '" alt="" border="0" />' : '';
				break;
		}
	}

	//
	// Define the little post icon
	//
	if ( $userdata['session_logged_in'] && $postrow[$i]['post_time'] > $userdata['user_lastvisit'] && $postrow[$i]['post_time'] > $topic_last_read )
	{
		$mini_post_img = $images['icon_minipost_new'];
		$mini_post_alt = $lang['New_post'];
	}
	else
	{
		$mini_post_img = $images['icon_minipost'];
		$mini_post_alt = $lang['Post'];
	}

	$mini_post_url = append_sid("viewtopic.$phpEx?" . POST_POST_URL . '=' . $postrow[$i]['post_id']) . '#' . $postrow[$i]['post_id'];

	//
	// Generate ranks, set them to empty string initially.
	//
	$poster_rank = '';
	$rank_image = '';
	if ( $postrow[$i]['user_id'] == ANONYMOUS )
	{
	}
	else if ( $postrow[$i]['user_rank'] )
	{
		for($j = 0; $j < count($ranksrow); $j++)
		{
			if ( $postrow[$i]['user_rank'] == $ranksrow[$j]['rank_id'] && $ranksrow[$j]['rank_special'] )
			{
				$poster_rank = $ranksrow[$j]['rank_title'];
				$rank_image = ( $ranksrow[$j]['rank_image'] ) ? '<img src="' . $ranksrow[$j]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" align=absmiddle /><br />' : '';
			}
		}
	}
	else
	{
		for($j = 0; $j < count($ranksrow); $j++)
		{
			if ( $postrow[$i]['user_posts'] >= $ranksrow[$j]['rank_min'] && !$ranksrow[$j]['rank_special'] )
			{
				$poster_rank = $ranksrow[$j]['rank_title'];
				$rank_image = ( $ranksrow[$j]['rank_image'] ) ? '<img src="' . $ranksrow[$j]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" align=absmiddle /><br />' : '';
			}
		}
	}

	//
	// Handle anon users posting with usernames
	//
	if ( $poster_id == ANONYMOUS && $postrow[$i]['post_username'] != '' )
	{
		$poster = $postrow[$i]['post_username'];
		$poster_rank = $lang['Guest'];
	}

	$temp_url = '';
	$profile_url = '';
	$profile_url_head = '';
	$profile_url_tail = '';

	if ( $poster_id != ANONYMOUS )
	{
		$temp_url = append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$poster_id");
		$profile_url = $temp_url;
		$profile_url_head = '<a href="'.$profile_url.'">';
		$profile_url_tail = '</a>';
		$profile_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_profile'] . '" alt="' . $lang['Read_profile'] . '" title="' . $lang['Read_profile'] . '" border="0" /></a>';
		$profile = '<a href="' . $temp_url . '">' . $lang['Read_profile'] . '</a>';

		$temp_url = append_sid("privmsg.$phpEx?mode=post&amp;" . POST_USERS_URL . "=$poster_id");
		$pm_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_pm'] . '" alt="' . $lang['Send_private_message'] . '" title="' . $lang['Send_private_message'] . '" border="0" /></a>';
		$pm = '<a href="' . $temp_url . '">' . $lang['Send_private_message'] . '</a>';

		if ( !empty($postrow[$i]['user_viewemail']) || $is_auth['auth_mod'] )
		{
			$email_uri = ( $board_config['board_email_form'] ) ? append_sid("profile.$phpEx?mode=email&amp;" . POST_USERS_URL .'=' . $poster_id) : 'mailto:' . $postrow[$i]['user_email'];

			$email_img = '<a href="' . $email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" /></a>';
			$email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
		}
		else
		{
			$email_img = '';
			$email = '';
		}

		$www_img = ( $postrow[$i]['user_website'] ) ? '<a href="' . $postrow[$i]['user_website'] . '" target="_userwww"><img src="' . $images['icon_www'] . '" alt="' . $lang['Visit_website'] . '" title="' . $lang['Visit_website'] . '" border="0" /></a>' : '';
		$www = ( $postrow[$i]['user_website'] ) ? '<a href="' . $postrow[$i]['user_website'] . '" target="_userwww">' . $lang['Visit_website'] . '</a>' : '';

		if ( !empty($postrow[$i]['user_icq']) )
		{
			$icq_status_img = '<a href="http://wwp.icq.com/' . $postrow[$i]['user_icq'] . '#pager"><img src="http://web.icq.com/whitepages/online?icq=' . $postrow[$i]['user_icq'] . '&img=5" width="18" height="18" border="0" /></a>';
			$icq_img = '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $postrow[$i]['user_icq'] . '"><img src="' . $images['icon_icq'] . '" alt="' . $lang['ICQ'] . '" title="' . $lang['ICQ'] . '" border="0" /></a>';
			$icq =  '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $postrow[$i]['user_icq'] . '">' . $lang['ICQ'] . '</a>';
		}
		else
		{
			$icq_status_img = '';
			$icq_img = '';
			$icq = '';
		}

		$aim_img = ( $postrow[$i]['user_aim'] ) ? '<a href="aim:goim?screenname=' . $postrow[$i]['user_aim'] . '&amp;message=Hello+Are+you+there?"><img src="' . $images['icon_aim'] . '" alt="' . $lang['AIM'] . '" title="' . $lang['AIM'] . '" border="0" /></a>' : '';
		$aim = ( $postrow[$i]['user_aim'] ) ? '<a href="aim:goim?screenname=' . $postrow[$i]['user_aim'] . '&amp;message=Hello+Are+you+there?">' . $lang['AIM'] . '</a>' : '';

		$temp_url = append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$poster_id");
	   $msn_img = ( $postrow[$i]['user_msnm'] ) ? '<a href="javascript:DoInstantMessage(\''.$postrow[$i]['user_msnm'].'\',\''.$postrow[$i]['username'].'\');"><img src="' . $images['icon_msnm'] . '" alt="' . $lang['MSNM'] . '" title="' . $lang['MSNM'] . '" border="0" /></a>' : '';
	   $msn = $msn_img;

		$yim_img = ( $postrow[$i]['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $postrow[$i]['user_yim'] . '&amp;.src=pg"><img src="' . $images['icon_yim'] . '" alt="' . $lang['YIM'] . '" title="' . $lang['YIM'] . '" border="0" /></a>' : '';
		$yim = ( $postrow[$i]['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $postrow[$i]['user_yim'] . '&amp;.src=pg">' . $lang['YIM'] . '</a>' : '';
	}
	else
	{
		$profile_img = '';
		$profile = '';
		$pm_img = '';
		$pm = '';
		$email_img = '';
		$email = '';
		$www_img = '';
		$www = '';
		$icq_status_img = '';
		$icq_img = '';
		$icq = '';
		$aim_img = '';
		$aim = '';
		$msn_img = '';
		$msn = '';
		$yim_img = '';
		$yim = '';
	}

	
	$quote_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_quote'] . '" alt="' . $lang['Reply_with_quote'] . '" title="' . $lang['Reply_with_quote'] . '" border="0" /></a>';
	$quote = '<a href="' . $temp_url . '">' . $lang['Reply_with_quote'] . '</a>';

	$temp_url = append_sid("search.$phpEx?search_author=" . urlencode($postrow[$i]['username']) . "&amp;showresults=posts");
	$search_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_search'] . '" alt="' . $lang['Search_user_posts'] . '" title="' . $lang['Search_user_posts'] . '" border="0" /></a>';
	$search = '<a href="' . $temp_url . '">' . $lang['Search_user_posts'] . '</a>';

	list($buddy_img, $buddy, $buddy_lang) = get_buddy_img($userdata['user_id'], $poster_id);

	//print_r($is_auth);

	if ( $is_auth['auth_reply'] || $is_auth['auth_mod'] )
	{
		$temp_url = append_sid("posting.$phpEx?mode=quote&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id']);
		$quote_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_quote'] . '" alt="' . $lang['Reply_with_quote'] . '" title="' . $lang['Reply_with_quote'] . '" border="0" /></a>';
		$quote = '<a href="' . $temp_url . '">' . $lang['Reply_with_quote'] . '</a>';
	}
	else
	{
		$quote_img = '';
		$quote = '';
	}

	if ( ( $userdata['user_id'] == $poster_id && $is_auth['auth_edit'] ) || $is_auth['auth_mod'] )
	{
		$temp_url = append_sid("posting.$phpEx?mode=editpost&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id']);
		$edit_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_edit'] . '" alt="' . $lang['Edit_delete_post'] . '" title="' . $lang['Edit_delete_post'] . '" border="0" /></a>';
		$edit = '<a href="' . $temp_url . '">' . $lang['Edit_delete_post'] . '</a>';
	}
	else
	{
		$edit_img = '';
		$edit = '';
	}

	if ( $is_auth['auth_mod'] )
	{
		$temp_url = "modcp.$phpEx?mode=ip&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id'] . "&amp;" . POST_TOPIC_URL . "=" . $topic_id . "&amp;sid=" . $userdata['session_id'];
		$ip_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_ip'] . '" alt="' . $lang['View_IP'] . '" title="' . $lang['View_IP'] . '" border="0" /></a>';
		$ip = '<a href="' . $temp_url . '">' . $lang['View_IP'] . '</a>';

		$temp_url = "posting.$phpEx?mode=delete&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id'] . "&amp;sid=" . $userdata['session_id'];
		$delpost_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_delpost'] . '" alt="' . $lang['Delete_post'] . '" title="' . $lang['Delete_post'] . '" border="0" /></a>';
		$delpost = '<a href="' . $temp_url . '">' . $lang['Delete_post'] . '</a>';
	}
	else
	{
		$ip_img = '';
		$ip = '';

		if ( $userdata['user_id'] == $poster_id && $is_auth['auth_delete'] && $forum_topic_data['topic_last_post_id'] == $postrow[$i]['post_id'] )
		{
			$temp_url = "posting.$phpEx?mode=delete&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id'] . "&amp;sid=" . $userdata['session_id'];
			$delpost_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_delpost'] . '" alt="' . $lang['Delete_post'] . '" title="' . $lang['Delete_post'] . '" border="0" /></a>';
			$delpost = '<a href="' . $temp_url . '">' . $lang['Delete_post'] . '</a>';
		}
		else
		{
			$delpost_img = '';
			$delpost = '';
		}
	}

	if (($forum_topic_data['topic_last_post_id'] == $postrow[$i]['post_id'] && $userdata['user_id'] != ANONYMOUS && $userdata['user_id'] == $poster_id) || $is_auth['auth_mod']) {
		$delpost_url = "posting.$phpEx?mode=delete&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id'] . "&amp;sid=" . $userdata['session_id'];
	}
	else {
		$delpost_url = '';
	}

	$post_subject = ( $postrow[$i]['post_subject'] != '' ) ? $postrow[$i]['post_subject'] : '';

	$message = $postrow[$i]['post_text'];
	$bbcode_uid = $postrow[$i]['bbcode_uid'];

	$user_sig = ( $postrow[$i]['enable_sig'] && $postrow[$i]['user_sig'] != '' && $board_config['allow_sig'] ) ? $postrow[$i]['user_sig'] : '';
	$user_sig_bbcode_uid = $postrow[$i]['user_sig_bbcode_uid'];

	//
	// Note! The order used for parsing the message _is_ important, moving things around could break any
	// output
	//

	//
	// If the board has HTML off but the post has HTML
	// on then we process it, else leave it alone
	//
	if ( !$board_config['allow_html'] )
	{
		if ( $user_sig != '' && $userdata['user_allowhtml'] )
		{
			$user_sig = preg_replace('#(<)([\/]?.*?)(>)#is', "&lt;\\2&gt;", $user_sig);
		}

		if ( $postrow[$i]['enable_html'] )
		{
			$message = preg_replace('#(<)([\/]?.*?)(>)#is', "&lt;\\2&gt;", $message);
		}
	}

	//
	// Parse message and/or sig for BBCode if reqd
	//
	if ( $board_config['allow_bbcode'] )
	{
		if ( $user_sig != '' && $user_sig_bbcode_uid != '' )
		{
			$user_sig = ( $board_config['allow_bbcode'] ) ? bbencode_second_pass($user_sig, $user_sig_bbcode_uid) : preg_replace('/\:[0-9a-z\:]+\]/si', ']', $user_sig);
		}

		if ( $bbcode_uid != '' )
		{
			$message = ( $board_config['allow_bbcode'] ) ? bbencode_second_pass($message, $bbcode_uid) : preg_replace('/\:[0-9a-z\:]+\]/si', ']', $message);
		}
	}

	if ( $user_sig != '' )
	{
		$user_sig = make_clickable($user_sig);
	}
	$message = make_clickable($message);

	//
	// Parse smilies
	//
	if ( $board_config['allow_smilies'] )
	{
		if ( $postrow[$i]['user_allowsmile'] && $user_sig != '' )
		{
			$user_sig = smilies_pass($user_sig);
		}

		if ( $postrow[$i]['enable_smilies'] )
		{
			$message = smilies_pass($message);
		}
	}

	//
	// Highlight active words (primarily for search)
	//
	if ($highlight_match)
	{
		// This was shamelessly 'borrowed' from volker at multiartstudio dot de
		// via php.net's annotated manual
		$message = str_replace('\"', '"', substr(preg_replace('#(\>(((?>([^><]+|(?R)))*)\<))#se', "preg_replace('#\b(" . $highlight_match . ")\b#i', '<span style=\"color:#" . $theme['fontcolor3'] . "\"><b>\\\\1</b></span>', '\\0')", '>' . $message . '<'), 1, -1));
	}

	//
	// Replace naughty words
	//
	if (count($orig_word))
	{
		$post_subject = preg_replace($orig_word, $replacement_word, $post_subject);

		if ($user_sig != '')
		{
			$user_sig = str_replace('\"', '"', substr(preg_replace('#(\>(((?>([^><]+|(?R)))*)\<))#se', "preg_replace(\$orig_word, \$replacement_word, '\\0')", '>' . $user_sig . '<'), 1, -1));
		}

		$message = str_replace('\"', '"', substr(preg_replace('#(\>(((?>([^><]+|(?R)))*)\<))#se', "preg_replace(\$orig_word, \$replacement_word, '\\0')", '>' . $message . '<'), 1, -1));
	}

	//
	// Replace newlines (we use this rather than nl2br because
	// till recently it wasn't XHTML compliant)
	//
	if ( $user_sig != '' )
	{
		$user_sig = '<br />_________________<br />' . str_replace("\n", "\n<br />\n", $user_sig);
	}

	$message = str_replace("\n", "\n<br />\n", $message);

	//
	// Editing information
	//
	if ( $postrow[$i]['post_edit_count'] )
	{
		$l_edit_time_total = ( $postrow[$i]['post_edit_count'] == 1 ) ? $lang['Edited_time_total'] : $lang['Edited_times_total'];

		$l_edited_by = '<br />' . sprintf($l_edit_time_total, $poster, create_date($board_config['default_dateformat'], $postrow[$i]['post_edit_time'], $board_config['board_timezone']), $postrow[$i]['post_edit_count']);
	}
	else
	{
		$l_edited_by = '';
	}

	
	$post_subject_only = $post_subject;

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
	if (!empty($topic_calendar_time) && ($postrow[$i]['post_id'] == $topic_first_post_id))
	{		
		$topic_calendar_only = get_calendar_title_date($topic_calendar_time, $topic_calendar_duration);
		$post_subject .= get_calendar_title($topic_calendar_time, $topic_calendar_duration);
	}
//-- fin mod : calendar ----------------------------------------------------------------------------

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
	//$post_subject = get_icon_title($postrow[$i]['post_icon']) . '&nbsp;' . $post_subject;
//-- fin mod : post icon ---------------------------------------------------------------------------

	$post_icon = get_icon_title($postrow[$i]['post_icon']);
	

	//
	// Again this will be handled by the templating
	// code at some point
	//
	$row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
	$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

	//////////////////////////////////////////////////////////////

	@reset($attach_rows);

	$attach_rows = get_attachments_from_post($postrow[$i]['post_id']);

	//print_r($attach_rows);

	$attach_num_rows = count($attach_rows);

	$thumb_filename = "";

	$yes_default_thumb_filename = "<br><img src='templates/".$theme['template_name']."/images/default_thumbnail.jpg' border=0><br><br>";

	if ($postrow[$i]['post_id'] == $topic_first_post_id)
	{
		//$thumb_filename = "<br><img src='templates/".$theme['template_name']."/images/default_thumbnail.jpg' border=0><br><br>";
	}
	else {
		$thumb_filename = "";
	}

	$thumb_filename_only = "templates/".$theme['template_name']."/images/default_thumbnail.jpg";
	$no_default_thumb_filename_only = "";
	$thumb_width = "";
	$thumb_height = "";	
	
	$thumb_src_header ='';
	$thumb_src_tail ='';
	$filesize ='';
	$filename ='';
	$filename_only ='';
	$filename_dummy ='';
	$download_count ='';
	$download_direct = "";
	$download_indirect = "";

	$full_img_path ='';
	$thumb_img_path ='';
			
	$img_filename = "";
			
	$physical_filename_only = "";
			
	for ($attach_i = 0; $attach_i < $attach_num_rows; $attach_i++)
	{

		$physical_filename_only = $attach_rows[$attach_i]['physical_filename'];

		$download_direct = '<a href="'. $upload_dir . '/' . $attach_rows[$attach_i]['physical_filename'] .'"><img src="templates/'.$theme['template_name'].'/images/download.gif" border=0 align=absmiddle></a>';
		$download_indirect = '<a href="'. append_sid('download.' . $phpEx . '?id=' . $attach_rows[$attach_i]['attach_id']).'"><img src="templates/'.$theme['template_name'].'/images/download.gif" border=0 align=absmiddle></a>';

		$full_img_path = 'http://'.$board_config['server_name']. $board_config['script_path'] . $upload_dir . '/' . $attach_rows[$attach_i]['physical_filename'];

		$filesize = $attach_rows[$attach_i]['filesize'];
		$size_lang = ($filesize >= 1048576) ? $lang['MB'] : ( ($filesize >= 1024) ? $lang['KB'] : $lang['Bytes'] );
		if ($filesize >= 1048576)
		{
			$filesize = (round((round($filesize / 1048576 * 100) / 100), 2));
		}
		else if ($filesize >= 1024)
		{
			$filesize = (round((round($filesize / 1024 * 100) / 100), 2));
		}

		$filesize = "(".$filesize.$size_lang.")";

		$filename = $lang['File_name'].": ".'<a href="'.append_sid('download.' . $phpEx . '?id=' . $attach_rows[$attach_i]['attach_id']).'"  target="_blank">'.$attach_rows[$attach_i]['real_filename']."</a>".$filesize."&nbsp;&nbsp;";
		$filename_only = '<a href="'.append_sid('download.' . $phpEx . '?id=' . $attach_rows[$attach_i]['attach_id']).'"  target="_blank">'.$attach_rows[$attach_i]['real_filename']."</a>".$filesize."&nbsp;&nbsp;";			
		$filename_dummy = $attach_rows[$attach_i]['real_filename'].$filesize;			
			
		$download_count = $lang['Downloaded'].": <b>".$attach_rows[$attach_i]['download_count']."</b>";


		if($attach_rows[$attach_i]['width']) {				
			$img_filename = "<img src='".$upload_dir . '/' . $attach_rows[$attach_i]['physical_filename']."' border=0>";
		}

		if($attach_rows[$attach_i]['thumbnail'] == 1) {				

			$thumb_img_path = 'Thumbnail: ('.'http://'.$board_config['server_name']. $board_config['script_path'] . $upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename'].')';

			$thumb_filename = "<br><img src='".$upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename']."' border=0><br><br>";		
			$yes_default_thumb_filename = "<br><img src='".$upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename']."' border=0><br><br>";	
			$thumb_src_header = '<a href="#" onClick="window.open(\''.append_sid('download.' . $phpEx . '?id=' . $attach_rows[$attach_i]['attach_id'])."','_blank','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=".($attach_rows[$attach_i]['width']+20).",height=".($attach_rows[$attach_i]['height']+30)."')\">";
			$thumb_src_tail = '</a>';

			$thumb_filename_only = $upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename'];
			$no_default_thumb_filename_only = $upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename'];

		}

		//die($full_img_path);

	}			


	$size = image_getdimension($thumb_filename_only);

	$thumb_width = $size[0];
	$thumb_height = $size[1];			

	//////////////////////////////////////////////////////////////	

	$message = unprepare_message($message);

	if(strstr($postrow[$i]['remark1'], '⌒')) list($dump,$postrow[$i]['remark1']) = explode("⌒",$postrow[$i]['remark1']);
	if(strstr($postrow[$i]['remark2'], '⌒')) list($dump,$postrow[$i]['remark2']) = explode("⌒",$postrow[$i]['remark2']);
	if(strstr($postrow[$i]['remark3'], '⌒')) list($dump,$postrow[$i]['remark3']) = explode("⌒",$postrow[$i]['remark3']);
	if(strstr($postrow[$i]['remark4'], '⌒')) list($dump,$postrow[$i]['remark4']) = explode("⌒",$postrow[$i]['remark4']);
	if(strstr($postrow[$i]['remark5'], '⌒')) list($dump,$postrow[$i]['remark5']) = explode("⌒",$postrow[$i]['remark5']);
	if(strstr($postrow[$i]['remark6'], '⌒')) list($dump,$postrow[$i]['remark6']) = explode("⌒",$postrow[$i]['remark6']);
	if(strstr($postrow[$i]['remark7'], '⌒')) list($dump,$postrow[$i]['remark7']) = explode("⌒",$postrow[$i]['remark7']);
	if(strstr($postrow[$i]['remark8'], '⌒')) list($dump,$postrow[$i]['remark8']) = explode("⌒",$postrow[$i]['remark8']);
	if(strstr($postrow[$i]['remark9'], '⌒')) list($dump,$postrow[$i]['remark9']) = explode("⌒",$postrow[$i]['remark9']);
	if(strstr($postrow[$i]['remark10'], '⌒')) list($dump,$postrow[$i]['remark10']) = explode("⌒",$postrow[$i]['remark10']);
	if(strstr($postrow[$i]['remark11'], '⌒')) list($dump,$postrow[$i]['remark11']) = explode("⌒",$postrow[$i]['remark11']);
	if(strstr($postrow[$i]['remark12'], '⌒')) list($dump,$postrow[$i]['remark12']) = explode("⌒",$postrow[$i]['remark12']);
	if(strstr($postrow[$i]['remark13'], '⌒')) list($dump,$postrow[$i]['remark13']) = explode("⌒",$postrow[$i]['remark13']);
	if(strstr($postrow[$i]['remark14'], '⌒')) list($dump,$postrow[$i]['remark14']) = explode("⌒",$postrow[$i]['remark14']);
	if(strstr($postrow[$i]['remark15'], '⌒')) list($dump,$postrow[$i]['remark15']) = explode("⌒",$postrow[$i]['remark15']);

	if (!empty($postrow[$i]['remark1']))
	{
		$email_uri = 'mailto:' . $postrow[$i]['remark1'];

		$guest_email_img = '<a href="' . $email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" align=absbottom /></a>';
		$guest_email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
	}
	else
	{
		$guest_email_img = '';
		$guest_email = '';
	}


	$remark1_icon = '';

	switch ( $postrow[$i]['remark1'] )
	{
		case '일반':
			$remark1_icon = 'remark1_icon1.jpg';
			break;
		case '필독':
			$remark1_icon = 'remark1_icon2.jpg';
			break;
		case '공지':
			$remark1_icon = 'remark1_icon3.jpg';
			break;
		case '서식':
			$remark1_icon = 'remark1_icon4.jpg';
			break;
		default:
			$remark1_icon = '';
			break;
	}


	$template->assign_block_vars('postrow', array(		
		'ROW_COLOR' => '#' . $row_color,
		'ROW_CLASS' => $row_class,
		'COMMENTOR' => $commentor,
		'POSTER_NAME' => $poster,
		'POSTER_RANK' => $poster_rank,
		'RANK_IMAGE' => $rank_image,
		'POSTER_JOINED' => $poster_joined,
		'POSTER_POSTS' => $poster_posts,
		'POSTER_FROM' => $poster_from,
		'POSTER_AVATAR' => $poster_avatar,
		'POST_DATE' => $post_date,
		'POST_SUBJECT' => $post_subject,
		'POST_SUBJECT_ONLY' => $post_subject_only,
		'TOPIC_CALENDAR_ONLY' => $topic_calendar_only,
		'POST_ICON' => $post_icon,
		'MESSAGE' => $message,
		'SIGNATURE' => $user_sig,
		'EDITED_MESSAGE' => $l_edited_by,

		'MINI_POST_IMG' => $mini_post_img,
		'PROFILE_IMG' => $profile_img,
		'U_PROFILE' => $profile_url,
		'U_PROFILE_HEAD' => $profile_url_head,
		'U_PROFILE_TAIL' => $profile_url_tail,

		'PROFILE' => $profile,
		'SEARCH_IMG' => $search_img,
		'SEARCH' => $search,
		'PM_IMG' => $pm_img,
		'PM' => $pm,
		'EMAIL_IMG' => $email_img,
		'EMAIL' => $email,
		'WWW_IMG' => $www_img,
		'WWW' => $www,
		'ICQ_STATUS_IMG' => $icq_status_img,
		'ICQ_IMG' => $icq_img,
		'ICQ' => $icq,
		'AIM_IMG' => $aim_img,
		'AIM' => $aim,
		'MSN_IMG' => $msn_img,
		'MSN' => $msn,
		'YIM_IMG' => $yim_img,
		'YIM' => $yim,

		'BUDDY_IMG' => $buddy_img,
		'BUDDY' => $buddy,
		'L_BUDDY' => $buddy_lang,

		'EDIT_IMG' => $edit_img,
		'EDIT' => $edit,
		'QUOTE_IMG' => $quote_img,
		'QUOTE' => $quote,
		'IP_IMG' => $ip_img,
		'IP' => $ip,
		'DELETE_IMG' => $delpost_img,
		'DELETE' => $delpost,
		'U_DELETE' => $delpost_url,

		'L_MINI_POST_ALT' => $mini_post_alt,

	'REMARK1_ICON' => $remark1_icon,

	'REMARK1' => $postrow[$i]['remark1'],
	'REMARK2' => $postrow[$i]['remark2'],
	'REMARK3' => $postrow[$i]['remark3'],
	'REMARK4' => $postrow[$i]['remark4'],
	'REMARK5' => $postrow[$i]['remark5'],
	'REMARK6' => $postrow[$i]['remark6'],
	'REMARK7' => $postrow[$i]['remark7'],
	'REMARK8' => $postrow[$i]['remark8'],
	'REMARK9' => $postrow[$i]['remark9'],
	'REMARK10' => $postrow[$i]['remark10'],
	'REMARK11' => $postrow[$i]['remark11'],
	'REMARK12' => $postrow[$i]['remark12'],
	'REMARK13' => $postrow[$i]['remark13'],
	'REMARK14' => $postrow[$i]['remark14'],
	'REMARK15' => $postrow[$i]['remark15'],

	'GUEST_EMAIL_IMG' => $guest_email_img,
	'GUEST_EMAIL' => $guest_email,

	'TOPIC_ATTACHMENT_IMG' => topic_attachment_image($postrow[$i]['topic_attachment']),
	'THUMBNAIL'		=> $thumb_filename,
	'YES_DEFAULT_THUMBNAIL'		=> $yes_default_thumb_filename,
	'THUMBNAIL_SRC_HEADER'		=> $thumb_src_header,
	'THUMBNAIL_SRC_TAIL'		=> $thumb_src_tail,
	'FILENAME' => $filename,
	'FILENAME_ONLY' => $filename_only,
	'FILENAME_DUMMY' => $filename_dummy,
	'DOWNLOAD_COUNT' => $download_count,
	'FULL_IMG_PATH' => $full_img_path,
	'THUMB_IMG_PATH' => $thumb_img_path,

	'THUMBNAIL_ONLY'		=> $thumb_filename_only,
	'NO_DEFAULT_THUMBNAIL_ONLY'		=> $no_default_thumb_filename_only,
	'THUMB_WIDTH_100'		=> $thumb_width,
	'THUMB_HEIGHT_100'		=> $thumb_height,
	'THUMB_WIDTH_90'		=> round($thumb_width*0.9),
	'THUMB_HEIGHT_90'		=> round($thumb_height*0.9),
	'THUMB_WIDTH_80'		=> round($thumb_width*0.8),
	'THUMB_HEIGHT_80'		=> round($thumb_height*0.8),
	'THUMB_WIDTH_70'		=> round($thumb_width*0.7),
	'THUMB_HEIGHT_70'		=> round($thumb_height*0.7),
	'THUMB_WIDTH_60'		=> round($thumb_width*0.6),
	'THUMB_HEIGHT_60'		=> round($thumb_height*0.6),
	'THUMB_WIDTH_50'		=> round($thumb_width*0.5),
	'THUMB_HEIGHT_50'		=> round($thumb_height*0.5),

	'FULL_IMG'		=> $img_filename,
	'DOWNLOAD_DIRECT'		=> $download_direct,
	'DOWNLOAD_INDIRECT'		=> $download_indirect,

	'PHYSICAL_FILENAME_ONLY'		=> $physical_filename_only,


		'U_MINI_POST' => $mini_post_url,
		'U_POST_ID' => $postrow[$i]['post_id'])
	);
	display_post_attachments($postrow[$i]['post_id'], $postrow[$i]['post_attachment']);

	if (trim($postrow[$i]['remark1']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark1', array());
	}
	if (trim($postrow[$i]['remark2']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark2', array());
	}
	if (trim($postrow[$i]['remark3']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark3', array());
	}
	if (trim($postrow[$i]['remark4']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark4', array());
	}
	if (trim($postrow[$i]['remark5']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark5', array());
	}
	if (trim($postrow[$i]['remark6']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark6', array());
	}
	if (trim($postrow[$i]['remark7']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark7', array());
	}
	if (trim($postrow[$i]['remark8']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark8', array());
	}
	if (trim($postrow[$i]['remark9']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark9', array());
	}
	if (trim($postrow[$i]['remark10']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark10', array());
	}
	if (trim($postrow[$i]['remark11']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark11', array());
	}
	if (trim($postrow[$i]['remark12']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark12', array());
	}
	if (trim($postrow[$i]['remark13']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark13', array());
	}
	if (trim($postrow[$i]['remark14']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark14', array());
	}
	if (trim($postrow[$i]['remark15']) != "")
	{
		$template->assign_block_vars('postrow.switch_remark15', array());
	}

	if (strlen(trim($postrow[$i]['post_text'])) > 0)
	{
		$template->assign_block_vars( 'postrow.switch_message', array());
	}
	else {
		$template->assign_block_vars( 'postrow.switch_not_message', array());
	}	


	//thumb-switch
	if ($no_default_thumb_filename_only != "")
	{
		$template->assign_block_vars('postrow.switch_have_thumb', array());
	}
	else {
		$template->assign_block_vars('postrow.switch_not_have_thumb', array());
	}

	if ($attach_num_rows > 0)
	{
		$template->assign_block_vars('postrow.switch_attach', array());
	}
	else {
		$template->assign_block_vars('postrow.switch_not_attach', array());
	}


	//
	// admin_or_reply selection
	//
	if (($postrow[$i]['post_id'] != $topic_first_post_id) || ($postrow[$i]['user_level'] == ADMIN))
	{
		$template->assign_block_vars('postrow.switch_admin_or_reply', array());
	}
	else {
		$template->assign_block_vars('postrow.switch_not_admin_or_reply', array());
	}
	//
	// admin selection
	//
	if (($postrow[$i]['user_level']== ADMIN))
	{
		$template->assign_block_vars('postrow.switch_admin', array());
	}
	else {
		$template->assign_block_vars('postrow.switch_not_admin', array());
	}

	if ($is_auth['auth_mod'])
	{
		$template->assign_block_vars('switch_admin_now', array());
		$template->assign_block_vars('postrow.switch_admin_now', array());
	}
	else {
		$template->assign_block_vars('switch_not_admin_now', array());
		$template->assign_block_vars('postrow.switch_not_admin_now', array());
	}
	//
	// Reply selection
	//
	if (($postrow[$i]['post_id'] != $topic_first_post_id))
	{
		$template->assign_block_vars('postrow.switch_reply', array());
		if ( !$userdata['session_logged_in'] )
		{
			$template->assign_block_vars('postrow.switch_reply.switch_user_logged_out', array());
		}
		else
		{
			$template->assign_block_vars('postrow.switch_reply.switch_user_logged_in', array());
		}

		if ($delpost_url == '')
		{
			$template->assign_block_vars('postrow.switch_reply.switch_not_del', array());
		}
		else
		{
			$template->assign_block_vars('postrow.switch_reply.switch_del', array());
		}


		if (trim($forum_topic_data['topic_last_post_id']) == $postrow[$i]['post_id'] && $postrow[$i]['remark15'] != "" && !$is_auth['auth_mod'])
		{			
			$template->assign_block_vars('postrow.switch_reply.switch_password', array());
		}
		else {
			$template->assign_block_vars('postrow.switch_reply.switch_not_password', array());
		}

		if (($userdata['user_id'] != ANONYMOUS && $postrow[$i]['user_id'] != ANONYMOUS && $userdata['user_id'] == $postrow[$i]['user_id']) || $is_auth['auth_mod'])
		{
			$template->assign_block_vars('postrow.switch_reply.switch_my_topic', array());
		}
		else {
			$template->assign_block_vars('postrow.switch_reply.switch_not_my_topic', array());
		}
		
	}
	else {
		$template->assign_block_vars('postrow.switch_not_reply', array());


		if (trim($postrow[$i]['remark1']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark1', array());
		}
		if (trim($postrow[$i]['remark2']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark2', array());
		}
		if (trim($postrow[$i]['remark3']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark3', array());
		}
		if (trim($postrow[$i]['remark4']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark4', array());
		}
		if (trim($postrow[$i]['remark5']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark5', array());
		}
		if (trim($postrow[$i]['remark6']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark6', array());
		}
		if (trim($postrow[$i]['remark7']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark7', array());
		}
		if (trim($postrow[$i]['remark8']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark8', array());
		}
		if (trim($postrow[$i]['remark9']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark9', array());
		}
		if (trim($postrow[$i]['remark10']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark10', array());
		}
		if (trim($postrow[$i]['remark11']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark11', array());
		}
		if (trim($postrow[$i]['remark12']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark12', array());
		}
		if (trim($postrow[$i]['remark13']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark13', array());
		}
		if (trim($postrow[$i]['remark14']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark14', array());
		}
		if (trim($postrow[$i]['remark15']) != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_remark15', array());
		}


		if ( !$userdata['session_logged_in'] )
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_user_logged_out', array());
		}
		else
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_user_logged_in', array());
		}

		if ($attach_num_rows > 0)
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_attach', array());
		}
		else {
			$template->assign_block_vars('postrow.switch_not_reply.switch_not_attach', array());
		}

		if ($no_default_thumb_filename_only != "")
		{
			$template->assign_block_vars('postrow.switch_not_reply.switch_have_thumb', array());
		}
		else {
			$template->assign_block_vars('postrow.switch_not_reply.switch_not_have_thumb', array());
		}
	}

	if ( !$userdata['session_logged_in'] )
	{
		$template->assign_block_vars('postrow.switch_user_logged_out', array());
	}
	else
	{
		$template->assign_block_vars('postrow.switch_user_logged_in', array());
	}
}

$template->pparse('body');

if(isset($HTTP_GET_VARS['printertopic']))
	$gen_simple_header = 1;
else if(isset($HTTP_GET_VARS['popup']))
	$gen_simple_header = -1; 
include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>
