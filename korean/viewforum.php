<?php
/***************************************************************************
 *                               viewforum.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: viewforum.php,v 1.6 2003/08/30 15:05:45 acydburn Exp $
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

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
include($phpbb_root_path . 'includes/def_icons.'. $phpEx);
//-- fin mod : post icon ---------------------------------------------------------------------------

//-- mod : split topic type ------------------------------------------------------------------------
//-- add
include_once($phpbb_root_path . 'includes/functions_topics_list.'. $phpEx);
//-- fin mod : split topic type --------------------------------------------------------------------

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
include_once($phpbb_root_path . 'includes/functions_calendar.'.$phpEx);
//-- fin mod : calendar ----------------------------------------------------------------------------

//
// Start initial var setup
//
if ( isset($HTTP_GET_VARS[POST_FORUM_URL]) || isset($HTTP_POST_VARS[POST_FORUM_URL]) )
{
	$forum_id = ( isset($HTTP_GET_VARS[POST_FORUM_URL]) ) ? intval($HTTP_GET_VARS[POST_FORUM_URL]) : intval($HTTP_POST_VARS[POST_FORUM_URL]);
}
else if ( isset($HTTP_GET_VARS['forum']))
{
	$forum_id = intval($HTTP_GET_VARS['forum']);
}
else
{
	$forum_id = '';
}
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
define('IN_VIEWFORUM', true);
if (isset($HTTP_GET_VARS['selected_id']) || isset($HTTP_POST_VARS['selected_id']))
{
	$selected_id = isset($HTTP_POST_VARS['selected_id']) ? $HTTP_POST_VARS['selected_id'] : $HTTP_GET_VARS['selected_id'];
	$type	= substr($selected_id, 0, 1);
	$id		= intval(substr($selected_id, 1));
	if ($type == POST_FORUM_URL)
	{
		$forum_id = $id;
		$parm = "?" . POST_FORUM_URL . "=$forum_id";
		redirect(append_sid("./viewforum.$phpEx" . $parm));
		exit;
	}
	else if (($type == POST_CAT_URL) || ($selected_id == 'Root'))
	{
		$parm = ($id != 0) ? "?" . POST_CAT_URL . "=$id" : '';
		redirect(append_sid("./index.$phpEx" . $parm));
		exit;
	}
}
//-- fin mod : categories hierarchy ----------------------------------------------------------------


$start = ( isset($HTTP_GET_VARS['start']) ) ? intval($HTTP_GET_VARS['start']) : 0;

if ( isset($HTTP_GET_VARS['mark']) || isset($HTTP_POST_VARS['mark']) )
{
	$mark_read = (isset($HTTP_POST_VARS['mark'])) ? $HTTP_POST_VARS['mark'] : $HTTP_GET_VARS['mark'];
}
else
{
	$mark_read = '';
}
//
// End initial var setup
//

//
// Check if the user has actually sent a forum ID with his/her request
// If not give them a nice error page.
//
if ( !empty($forum_id) )
{
	$sql = "SELECT *
		FROM " . FORUMS_TABLE . "
		WHERE forum_id = $forum_id";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not obtain forums information', '', __LINE__, __FILE__, $sql);
	}
}
else
{
	message_die(GENERAL_MESSAGE, 'Forum_not_exist');
}

//
// If the query doesn't return any rows this isn't a valid forum. Inform
// the user.
//
if ( !($forum_row = $db->sql_fetchrow($result)) )
{
	message_die(GENERAL_MESSAGE, 'Forum_not_exist');
}

//
// Start session management
//
$userdata = session_pagestart($user_ip, $forum_id);
init_userprefs($userdata);
//
// End session management
//

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
// handle forum link type
$selected_id = POST_FORUM_URL . $forum_id;
$this = isset($tree['keys'][$selected_id]) ? $tree['keys'][$selected_id] : -1;
if ( ($this > -1) && !empty($tree['data'][$this]['forum_link']))
{
	// add 1 to hit if count ativated
	if ($tree['data'][$this]['forum_link_hit_count'])
	{
		$sql = "UPDATE " . FORUMS_TABLE . "
					SET forum_link_hit = forum_link_hit + 1
					WHERE forum_id=$forum_id";
		if (!$db->sql_query($sql)) message_die(GENERAL_ERROR, 'Could not increment forum hits information', '', __LINE__, __FILE__, $sql);
	}

	// prepare url
	$url = $tree['data'][$this]['forum_link'];
	if ($tree['data'][$this]['forum_link_internal'])
	{
		$part = explode( '?', $url);
		$url .= ((count($part) > 1) ? '&' : '?') . 'sid=' . $userdata['session_id'];
		$url = append_sid($url);

		// redirect to url
		redirect($url);
	}

	// Redirect via an HTML form for PITA webservers
	if (@preg_match('/Microsoft|WebSTAR|Xitami/', getenv('SERVER_SOFTWARE')))
	{
		header('Refresh: 0; URL=' . $url);
		echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><meta http-equiv="refresh" content="0; url=' . $url . '"><title>' . $lang['Redirect'] . '</title></head><body><div align="center">' . sprintf($lang['Rediect_to'], '<a href="' . $url . '">', '</a>') . '</div></body></html>';
		exit;
	}

	// Behave as per HTTP/1.1 spec for others
	header('Location: ' . $url);
	exit;
}
//-- fin mod : categories hierarchy ----------------------------------------------------------------

$split_field = $tree['data'][$this]['split_field'];

if (!empty($split_field)) {
	$topics_per_page = 10000;
}
else {
	$topics_per_page = $board_config['topics_per_page'];
}

//
// Start auth check
//
$is_auth = array();
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
// $is_auth = auth(AUTH_ALL, $forum_id, $userdata, $forum_row);
//-- add
$is_auth = $tree['auth'][POST_FORUM_URL . $forum_id];
//-- fin mod : categories hierarchy ----------------------------------------------------------------

if (!$is_auth['auth_view'] )
{
	if ( !$userdata['session_logged_in'] )
	{
		$redirect = POST_FORUM_URL . "=$forum_id" . ( ( isset($start) ) ? "&start=$start" : '' );
		redirect(append_sid("login.$phpEx?redirect=viewforum.$phpEx&$redirect", true));
	}
	//
	// The user is not authed to read this forum ...
	//
	$message = ( !$is_auth['auth_view'] ) ? $lang['Forum_not_exist'] : sprintf($lang['Sorry_auth_read'], $is_auth['auth_read_type']);

	message_die(GENERAL_MESSAGE, $message);
}
//
// End of auth check
//

//
// Handle marking posts
//
if ( $mark_read == 'topics' )
{
	if ( $userdata['session_logged_in'] )
	{
		$sql = "SELECT MAX(post_time) AS last_post
			FROM " . POSTS_TABLE . "
			WHERE forum_id = $forum_id";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not obtain forums information', '', __LINE__, __FILE__, $sql);
		}

		if ( $row = $db->sql_fetchrow($result) )
		{
			$tracking_forums = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) : array();
			$tracking_topics = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) : array();

			if ( ( count($tracking_forums) + count($tracking_topics) ) >= 150 && empty($tracking_forums[$forum_id]) )
			{
				asort($tracking_forums);
				unset($tracking_forums[key($tracking_forums)]);
			}

			if ( $row['last_post'] > $userdata['user_lastvisit'] )
			{
				$tracking_forums[$forum_id] = time();

				setcookie($board_config['cookie_name'] . '_f', serialize($tracking_forums), 0, $board_config['cookie_path'], $board_config['cookie_domain'], $board_config['cookie_secure']);
			}
		}

		$template->assign_vars(array(
			'META' => '<meta http-equiv="refresh" content="3;url=' . append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id") . '">')
		);
	}

	$message = $lang['Topics_marked_read'] . '<br /><br />' . sprintf($lang['Click_return_forum'], '<a href="' . append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id") . '">', '</a> ');
	message_die(GENERAL_MESSAGE, $message);
}
//
// End handle marking posts
//

$tracking_topics = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) : '';
$tracking_forums = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) : '';

//
// Do the forum Prune
//
if ( $is_auth['auth_mod'] && $board_config['prune_enable'] )
{
	if ( $forum_row['prune_next'] < time() && $forum_row['prune_enable'] )
	{
		include($phpbb_root_path . 'includes/prune.'.$phpEx);
		require($phpbb_root_path . 'includes/functions_admin.'.$phpEx);
		auto_prune($forum_id);
	}
}
//
// End of forum prune
//

//
// Obtain list of moderators of each forum
// First users, then groups ... broken into two queries
//
$sql = "SELECT u.user_id, u.username
	FROM " . AUTH_ACCESS_TABLE . " aa, " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g, " . USERS_TABLE . " u
	WHERE aa.forum_id = $forum_id
		AND aa.auth_mod = " . TRUE . "
		AND g.group_single_user = 1
		AND ug.group_id = aa.group_id
		AND g.group_id = aa.group_id
		AND u.user_id = ug.user_id
	GROUP BY u.user_id, u.username
	ORDER BY u.user_id";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not query forum moderator information', '', __LINE__, __FILE__, $sql);
}

$moderators = array();
while( $row = $db->sql_fetchrow($result) )
{
	$moderators[] = '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $row['user_id']) . '">' . $row['username'] . '</a>';
}

$sql = "SELECT g.group_id, g.group_name
	FROM " . AUTH_ACCESS_TABLE . " aa, " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g
	WHERE aa.forum_id = $forum_id
		AND aa.auth_mod = " . TRUE . "
		AND g.group_single_user = 0
		AND g.group_type <> ". GROUP_HIDDEN ."
		AND ug.group_id = aa.group_id
		AND g.group_id = aa.group_id
	GROUP BY g.group_id, g.group_name
	ORDER BY g.group_id";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not query forum moderator information', '', __LINE__, __FILE__, $sql);
}

while( $row = $db->sql_fetchrow($result) )
{
	$moderators[] = '<a href="' . append_sid("groupcp.$phpEx?" . POST_GROUPS_URL . "=" . $row['group_id']) . '">' . $row['group_name'] . '</a>';
}

$l_moderators = ( count($moderators) == 1 ) ? $lang['Moderator'] : $lang['Moderators'];
$forum_moderators = ( count($moderators) ) ? implode(', ', $moderators) : $lang['None'];
unset($moderators);

//access-group

$sql = "SELECT g.group_id, g.group_name, g.group_type, ug.user_pending
	FROM " . GROUPS_TABLE . " g, " . USER_GROUP_TABLE . " ug
	WHERE ug.user_id = '" . $userdata['user_id'] . "'
		AND ug.group_id = g.group_id
		AND g.group_single_user <> " . TRUE . "
	ORDER BY g.group_name, ug.user_id";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Error getting group information', '', __LINE__, __FILE__, $sql);
}

$s_pending_groups = array();
$s_member_groups = array();

if ( $row = $db->sql_fetchrow($result) )
{
	do
	{
		if ( $row['user_pending'] )
		{
			$s_pending_groups[] = $row['group_id'];
		}
		else
		{
			$s_member_groups[] = $row['group_id'];
		}
	}
	while( $row = $db->sql_fetchrow($result) );
}


$accessGroup = array();

$sql = "SELECT g.group_id, g.group_name, g.group_type
	FROM " . AUTH_ACCESS_TABLE . " aa, " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g
	WHERE aa.forum_id = $forum_id
		AND (aa.auth_view = " . TRUE . "
		OR aa.auth_read = " . TRUE . ")
		AND g.group_single_user = 0
		AND g.group_type <> ". GROUP_HIDDEN ."
		AND ug.group_id = aa.group_id
		AND g.group_id = aa.group_id
	GROUP BY g.group_id, g.group_name, g.group_type
	ORDER BY g.group_id";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not query forum moderator information', '', __LINE__, __FILE__, $sql);
}

while( $row = $db->sql_fetchrow($result) )
{
	if(in_array($row['group_id'],$s_pending_groups)){
		$actionLabel = '(´ë±âÁß)';
	}
	else if(in_array($row['group_id'],$s_member_groups)) {
		$actionLabel = '(Å»Åð)';
	}
	else{
		$actionLabel = '(°¡ÀÔ)';
	}

	if($row['group_type'] == GROUP_OPEN) {
		$accessGroup[] = $row['group_name'] . ' <a href="' . append_sid("groupcp.$phpEx?" . POST_GROUPS_URL . "=" . $row['group_id']) . '">' . $actionLabel . '</a>';
	}
	else {
		$accessGroup[] = $row['group_name'];
	}
}

$forum_accessGroup = $lang['Usergroups'] . " : ";
$forum_accessGroup .= ( count($accessGroup) ) ? implode(', ', $accessGroup) : $lang['None'];
unset($accessGroup);


$forbiddenForumIDs = explode(',',$board_config['remark5']);
$onlyMineSql = "";

if( in_array($forum_id, $forbiddenForumIDs) && !$is_auth['auth_mod'] ) {
	$onlyMineSql = " AND t.topic_poster = ". $userdata['user_id'];
}

//
// Generate a 'Show topics in previous x days' select box. If the topicsdays var is sent
// then get it's value, find the number of topics with dates newer than it (to properly
// handle pagination) and alter the main query
//
$previous_days = array(0, 1, 7, 14, 30, 90, 180, 364);
$previous_days_text = array($lang['All_Topics'], $lang['1_Day'], $lang['7_Days'], $lang['2_Weeks'], $lang['1_Month'], $lang['3_Months'], $lang['6_Months'], $lang['1_Year']);

if ( !empty($HTTP_POST_VARS['topicdays']) || !empty($HTTP_GET_VARS['topicdays']) )
{
	$topic_days = ( !empty($HTTP_POST_VARS['topicdays']) ) ? $HTTP_POST_VARS['topicdays'] : $HTTP_GET_VARS['topicdays'];
	$min_topic_time = time() - ($topic_days * 86400);

	$sql = "SELECT COUNT(t.topic_id) AS forum_topics
		FROM " . TOPICS_TABLE . " t, " . POSTS_TABLE . " p
		WHERE t.forum_id = $forum_id
			$onlyMineSql
			AND p.post_id = t.topic_last_post_id
			AND p.post_time >= $min_topic_time";

	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not obtain limited topics count information', '', __LINE__, __FILE__, $sql);
	}
	$row = $db->sql_fetchrow($result);

	$topics_count = ( $row['forum_topics'] ) ? $row['forum_topics'] : 1;
	$limit_topics_time = "AND p.post_time >= $min_topic_time";

	if ( !empty($HTTP_POST_VARS['topicdays']) )
	{
		$start = 0;
	}
}
else
{
	$sql = "SELECT COUNT(t.topic_id) AS forum_topics
		FROM " . TOPICS_TABLE . " t
		WHERE t.forum_id = $forum_id
			$onlyMineSql
			";

	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not obtain limited topics count information', '', __LINE__, __FILE__, $sql);
	}
	$row = $db->sql_fetchrow($result);

	$topics_count = ( $row['forum_topics'] ) ? $row['forum_topics'] : 1;

	//$topics_count = ( $forum_row['forum_topics'] ) ? $forum_row['forum_topics'] : 1;

	$limit_topics_time = '';
	$topic_days = 0;
}

$select_topic_days = '<select name="topicdays">';
for($i = 0; $i < count($previous_days); $i++)
{
	$selected = ($topic_days == $previous_days[$i]) ? ' selected="selected"' : '';
	$select_topic_days .= '<option value="' . $previous_days[$i] . '"' . $selected . '>' . $previous_days_text[$i] . '</option>';
}
$select_topic_days .= '</select>';


//
// All announcement data, this keeps announcements
// on each viewforum page ...
//
$sql = "SELECT t.*, u.username, u.user_id, u2.username as user2, u2.user_id as id2, p.post_time, p.post_username
	FROM " . TOPICS_TABLE . " t, " . USERS_TABLE . " u, " . POSTS_TABLE . " p, " . USERS_TABLE . " u2
	WHERE t.forum_id = $forum_id
		AND t.topic_poster = u.user_id
		AND p.post_id = t.topic_last_post_id
		AND p.poster_id = u2.user_id
		AND t.topic_type = " . POST_ANNOUNCE . "
	ORDER BY t.topic_last_post_id DESC ";
if ( !($result = $db->sql_query($sql)) )
{
   message_die(GENERAL_ERROR, 'Could not obtain topic information', '', __LINE__, __FILE__, $sql);
}

$topic_rowset = array();
$total_announcements = 0;
while( $row = $db->sql_fetchrow($result) )
{
	$topic_rowset[] = $row;
	$total_announcements++;
}

$db->sql_freeresult($result);

//
// Grab all the basic data (all topics except announcements)
// for this forum
//

//-- mod : topic display order ---------------------------------------------------------------------
//-- add
// default forum values
$dft_sort = $forum_row['forum_display_sort'];
$dft_order = $forum_row['forum_display_order'];
$dft_sort2 = $forum_row['forum_display_sort2'];
$dft_order2 = $forum_row['forum_display_order2'];

// Sort def
$sort_value = $dft_sort;
if ( isset($HTTP_GET_VARS['sort']) || isset($HTTP_POST_VARS['sort']) )
{
	$sort_value = isset($HTTP_GET_VARS['sort']) ? intval($HTTP_GET_VARS['sort']) : intval($HTTP_POST_VARS['sort']);
}
$sort_list = '<select name="sort">' . get_forum_display_sort_option($sort_value, 'list', 'sort') . '</select>';
$sort_value2 = $dft_sort2;
if ( isset($HTTP_GET_VARS['sort2']) || isset($HTTP_POST_VARS['sort2']) )
{
	$sort_value2 = isset($HTTP_GET_VARS['sort2']) ? intval($HTTP_GET_VARS['sort2']) : intval($HTTP_POST_VARS['sort2']);
}

// Order def
$order_value = $dft_order;
if ( isset($HTTP_GET_VARS['order']) || isset($HTTP_POST_VARS['order']) )
{
	$order_value = isset($HTTP_GET_VARS['order']) ? intval($HTTP_GET_VARS['order']) : intval($HTTP_POST_VARS['order']);
}
$order_list = '<select name="order">' . get_forum_display_sort_option($order_value, 'list', 'order') . '</select>';
$order_value2 = $dft_order2;
if ( isset($HTTP_GET_VARS['order2']) || isset($HTTP_POST_VARS['order2']) )
{
	$order_value2 = isset($HTTP_GET_VARS['order2']) ? intval($HTTP_GET_VARS['order2']) : intval($HTTP_POST_VARS['order2']);
}

// display
$s_display_order = '&nbsp;' . $lang['Sort_by'] . ':&nbsp;' . $sort_list . $order_list . '&nbsp;';

// selected method
$sort_method = get_forum_display_sort_option($sort_value, 'field', 'sort_extend');
$order_method = get_forum_display_sort_option($order_value, 'field', 'order');
$sort_method2 = get_forum_display_sort_option($sort_value2, 'field', 'sort_extend');
$order_method2 = get_forum_display_sort_option($order_value2, 'field', 'order');

//print_r($sort_method);
//-- fin mod : topic display order -----------------------------------------------------------------

//-- mod : topic display order ---------------------------------------------------------------------
// here we added
//	, $sort_method $order_method
//-- modify

$sql = "SELECT t.*, u.username, u.user_realname, u.user_email, u.user_viewemail, u.user_level, u.user_id, u2.username as user2, u2.user_id as id2, p.post_username, p.post_id, p.post_attachment, p2.post_username AS post_username2, p2.post_time, pt.*
	FROM " . TOPICS_TABLE . " t, " . USERS_TABLE . " u, " . POSTS_TABLE . " p, " . POSTS_TABLE . " p2, " . USERS_TABLE . " u2, " . POSTS_TEXT_TABLE . " pt
	WHERE t.forum_id = $forum_id
		AND t.topic_poster = u.user_id
		$onlyMineSql
		AND pt.post_id = p.post_id
		AND p.post_id = t.topic_first_post_id
		AND p2.post_id = t.topic_last_post_id
		AND u2.user_id = p2.poster_id
		AND t.topic_type <> " . POST_ANNOUNCE . "
		$limit_topics_time
	ORDER BY t.topic_type DESC, $sort_method $order_method, $sort_method2 $order_method2, t.topic_last_post_id DESC
	LIMIT $start, ".$topics_per_page;
//-- fin mod : topic display order -----------------------------------------------------------------
if ( !($result = $db->sql_query($sql)) )
{
   message_die(GENERAL_ERROR, 'Could not obtain topic information', '', __LINE__, __FILE__, $sql);
}

//print_r($tree['auth']);

$total_topics = 0;
while( $row = $db->sql_fetchrow($result) )
{
	$topic_rowset[] = $row;
	$total_topics++;
}

$db->sql_freeresult($result);

//
// Total topics ...
//
$total_topics += $total_announcements;

//
// Define censored word matches
//
$orig_word = array();
$replacement_word = array();
obtain_word_list($orig_word, $replacement_word);

//
// Post URL generation for templating vars
//
$template->assign_vars(array(
	'L_DISPLAY_TOPICS' => $lang['Display_topics'],

	'U_POST_NEW_TOPIC' => append_sid("posting.$phpEx?mode=newtopic&amp;" . POST_FORUM_URL . "=$forum_id"),

	'S_SELECT_TOPIC_DAYS' => $select_topic_days,
	'S_POST_DAYS_ACTION' => append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=" . $forum_id . "&amp;start=$start"))
);

//
// User authorisation levels output
//
$s_auth_can = ( ( $is_auth['auth_post'] ) ? $lang['Rules_post_can'] : $lang['Rules_post_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_reply'] ) ? $lang['Rules_reply_can'] : $lang['Rules_reply_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_edit'] ) ? $lang['Rules_edit_can'] : $lang['Rules_edit_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_delete'] ) ? $lang['Rules_delete_can'] : $lang['Rules_delete_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_vote'] ) ? $lang['Rules_vote_can'] : $lang['Rules_vote_cannot'] ) . '<br />';

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
$s_auth_can .= ( ( $is_auth['auth_cal'] ) ? $lang['Rules_calendar_can'] : $lang['Rules_calendar_cannot'] ) . '<br />';
//-- fin mod : calendar ----------------------------------------------------------------------------

attach_build_auth_levels($is_auth, $s_auth_can);

if ( $is_auth['auth_mod'] )
{
	$s_auth_can .= sprintf($lang['Rules_moderate'], "<a href=\"modcp.$phpEx?" . POST_FORUM_URL . "=$forum_id&amp;start=" . $start . "&amp;sid=" . $userdata['session_id'] . '">', '</a>');
}

//
// Mozilla navigation bar
//
$nav_links['up'] = array(
	'url' => append_sid('index.'.$phpEx),
	'title' => sprintf($lang['Forum_Index'], $board_config['sitename'])
);

//
// Dump out the page header and load viewforum template
//

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
$forum_row['forum_name'] = get_object_lang(POST_FORUM_URL . $forum_id, 'name');
//-- fin mod : categories hierarchy ----------------------------------------------------------------


$topic_mod = '';

if ( $is_auth['auth_mod'] )
{
	$topic_mod .= "<a href=\"modcp.$phpEx?" . POST_FORUM_URL . "=$forum_id&amp;sid=" . $userdata['session_id'] . "\"><img src=\"templates/".$theme['template_name']."/images/icon-board-admin.gif\" alt=\"\" title=\"\" border=\"0\" /></a>";
}


define('SHOW_ONLINE', true);
$page_title = $lang['View_forum'] . ' - ' . $forum_row['forum_name'];

if(isset($HTTP_GET_VARS['popup'])) {
	$gen_simple_header = -1;
}
include($phpbb_root_path . 'includes/page_header.'.$phpEx);


if(isset($HTTP_GET_VARS['popup']) && isset($HTTP_GET_VARS['printable']))
	$template->set_filenames(array(
		'body' => 'printerforum_body.tpl')
	);
else
	$template->set_filenames(array(
		'body' => 'viewforum_body.tpl')
	);


if($tree['main'][$tree['keys'][POST_FORUM_URL.$forum_id]] != 'c1') {
	make_jumpbox('viewforum.'.$phpEx, $forum_id);
}

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
// display the sub-cats
display_index(POST_FORUM_URL . $forum_id);
//-- fin mod : categories hierarchy ----------------------------------------------------------------

$post_img = ($forum_row['forum_status'] == FORUM_LOCKED ) ? $images['post_locked'] : $images['post_new'];

if (!($is_auth['auth_post'] || $is_auth['auth_mod']) )
{
	$post_img = '';
}
else {
	$new_topic_url = append_sid("posting.$phpEx?mode=newtopic&amp;" . POST_FORUM_URL . "=$forum_id");
	$post_alt = ($forum_row['forum_status'] == FORUM_LOCKED ) ? $lang['Forum_locked'] : $lang['Post_new_topic'];
	$post_img = "<a href=\"$new_topic_url\"><img src=\"$post_img\" border=\"0\" alt=\"$post_alt\" align=\"middle\" /></a>&nbsp";
}

$template->assign_vars(array(
	'FORUM_ID' => $forum_id,
	'FORUM_NAME' => $forum_row['forum_name'],
	'FORUM_DESC' => $forum_row['forum_desc'],
	'MODERATORS' => $forum_moderators,
	'ACCESSGROUPS' => $forum_accessGroup,
	'POST_IMG' => $post_img,
	'PRINTER_IMG' => $images['printer'],
	'PRINTER_URL' => "viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id&amp;topicdays=$topic_days&amp;sort=$sort_value&amp;order=$order_value&amp;sort2=$sort_value2&amp;order2=$order_value2&popup=yes&today=no&printable=yes&start=".$start,

	'FOLDER_IMG' => $images['folder'],
	'FOLDER_NEW_IMG' => $images['folder_new'],
	'FOLDER_HOT_IMG' => $images['folder_hot'],
	'FOLDER_HOT_NEW_IMG' => $images['folder_hot_new'],
	'FOLDER_LOCKED_IMG' => $images['folder_locked'],
	'FOLDER_LOCKED_NEW_IMG' => $images['folder_locked_new'],
	'FOLDER_STICKY_IMG' => $images['folder_sticky'],
	'FOLDER_STICKY_NEW_IMG' => $images['folder_sticky_new'],
	'FOLDER_ANNOUNCE_IMG' => $images['folder_announce'],
	'FOLDER_ANNOUNCE_NEW_IMG' => $images['folder_announce_new'],

	'L_TOPICS' => $lang['Topics'],
	'L_REPLIES' => $lang['Replies'],
	'L_VIEWS' => $lang['Views'],
	'L_POSTS' => $lang['Posts'],
	'L_LASTPOST' => $lang['Last_Post'],
	'L_MODERATOR' => $l_moderators,
	'L_MARK_TOPICS_READ' => $lang['Mark_all_topics'],
	'L_POST_NEW_TOPIC' => ( $forum_row['forum_status'] == FORUM_LOCKED ) ? $lang['Forum_locked'] : $lang['Post_new_topic'],
	'L_NO_NEW_POSTS' => $lang['No_new_posts'],
	'L_NEW_POSTS' => $lang['New_posts'],
	'L_NO_NEW_POSTS_LOCKED' => $lang['No_new_posts_locked'],
	'L_NEW_POSTS_LOCKED' => $lang['New_posts_locked'],
	'L_NO_NEW_POSTS_HOT' => $lang['No_new_posts_hot'],
	'L_NEW_POSTS_HOT' => $lang['New_posts_hot'],
	'L_ANNOUNCEMENT' => $lang['Post_Announcement'],
	'L_STICKY' => $lang['Post_Sticky'],
	'L_POSTED' => $lang['Posted'],
	'L_JOINED' => $lang['Joined'],
	'L_AUTHOR' => $lang['Author'],

	'S_AUTH_LIST' => $s_auth_can,
	'S_TOPIC_ADMIN' => $topic_mod,

	'U_VIEW_FORUM' => append_sid("viewforum.$phpEx?" . POST_FORUM_URL ."=$forum_id"),

	'U_MARK_READ' => append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id&amp;mark=topics"),

	// Custom Function
	'USER_BAN_LINK' => append_sid("user_ban.$phpEx"))
);
//
// End header
//

//
// admin selection
//
if ( $is_auth['auth_mod'] )
{
	$template->assign_block_vars('switch_admin', array());
}
else {
	$template->assign_block_vars('switch_not_admin', array());
}

//
// Okay, lets dump out the page ...
//

//-- mod : split topic type ------------------------------------------------------------------------
//-- add
// adjust the item id
for ($i=0; $i < count($topic_rowset); $i++)
{
	$topic_rowset[$i]['topic_id'] = POST_TOPIC_URL . $topic_rowset[$i]['topic_id'];
}

// set the bottom sort option
$footer = $select_topic_days . '&nbsp;' . ( !empty($s_display_order) ? $s_display_order : '') . '<input type="submit" class="liteoption" value="' . $lang['Go'] . '" name="submit" />';

if(isset($HTTP_GET_VARS['popup']) && isset($HTTP_GET_VARS['printable']))
	$footer = '';

// send the list
$allow_split_type = true;
$display_nav_tree = false;
topic_list('TOPICS_LIST_BOX', 'topics_list_box', $topic_rowset, '', $allow_split_type, $display_nav_tree, $footer, true, '', 0, '', array(), $forum_id, $start);
//-- delete
/*
//---------------------------------------
//
// Note : all the code that was standing there stands now in functions_topics_list.php, topic_list() func
//
//---------------------------------------

if( $total_topics )
{
	for($i = 0; $i < $total_topics; $i++)
	{
		$topic_id = $topic_rowset[$i]['topic_id'];

		$topic_title = ( count($orig_word) ) ? preg_replace($orig_word, $replacement_word, $topic_rowset[$i]['topic_title']) : $topic_rowset[$i]['topic_title'];

		$replies = $topic_rowset[$i]['topic_replies'];

		$topic_type = $topic_rowset[$i]['topic_type'];

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
		$type = $topic_rowset[$i]['topic_type'];
		if ($type == POST_NORMAL)
		{
			if (!empty($topic_rowset[$i]['topic_calendar_time']))
			{
				$type = POST_CALENDAR;
			}
			if (!empty($topic_rowset[$i]['topic_pic_url']))
			{
				$type = POST_PICTURE;
			}
		}
		$icon = get_icon_title($topic_rowset[$i]['topic_icon'], 1, $type);
//-- fin mod : post icon ---------------------------------------------------------------------------


		if( $topic_type == POST_ANNOUNCE )
		{
			$topic_type = $lang['Topic_Announcement'] . ' ';
		}
		else if( $topic_type == POST_STICKY )
		{
			$topic_type = $lang['Topic_Sticky'] . ' ';
		}
		else
		{
			$topic_type = '';
		}

		if( $topic_rowset[$i]['topic_vote'] )
		{
			$topic_type .= $lang['Topic_Poll'] . ' ';
		}

		if( $topic_rowset[$i]['topic_status'] == TOPIC_MOVED )
		{
			$topic_type = $lang['Topic_Moved'] . ' ';
			$topic_id = $topic_rowset[$i]['topic_moved_id'];

			$folder_image =  $images['folder'];
			$folder_alt = $lang['Topics_Moved'];
			$newest_post_img = '';
		}
		else
		{
			if( $topic_rowset[$i]['topic_type'] == POST_ANNOUNCE )
			{
				$folder = $images['folder_announce'];
				$folder_new = $images['folder_announce_new'];
			}
			else if( $topic_rowset[$i]['topic_type'] == POST_STICKY )
			{
				$folder = $images['folder_sticky'];
				$folder_new = $images['folder_sticky_new'];
			}
			else if( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED )
			{
				$folder = $images['folder_locked'];
				$folder_new = $images['folder_locked_new'];
			}
			else
			{
				if($replies >= $board_config['hot_threshold'])
				{
					$folder = $images['folder_hot'];
					$folder_new = $images['folder_hot_new'];
				}
				else
				{
					$folder = $images['folder'];
					$folder_new = $images['folder_new'];
				}
			}

			$newest_post_img = '';
			if( $userdata['session_logged_in'] )
			{
				if( $topic_rowset[$i]['post_time'] > $userdata['user_lastvisit'] )
				{
					if( !empty($tracking_topics) || !empty($tracking_forums) || isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all']) )
					{
						$unread_topics = true;

						if( !empty($tracking_topics[$topic_id]) )
						{
							if( $tracking_topics[$topic_id] >= $topic_rowset[$i]['post_time'] )
							{
								$unread_topics = false;
							}
						}

						if( !empty($tracking_forums[$forum_id]) )
						{
							if( $tracking_forums[$forum_id] >= $topic_rowset[$i]['post_time'] )
							{
								$unread_topics = false;
							}
						}

						if( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all']) )
						{
							if( $HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all'] >= $topic_rowset[$i]['post_time'] )
							{
								$unread_topics = false;
							}
						}

						if( $unread_topics )
						{
							$folder_image = $folder_new;
							$folder_alt = $lang['New_posts'];

							$newest_post_img = '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=newest") . '"><img src="' . $images['icon_newest_reply'] . '" alt="' . $lang['View_newest_post'] . '" title="' . $lang['View_newest_post'] . '" border="0" /></a> ';
						}
						else
						{
							$folder_image = $folder;
							$folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];

							$newest_post_img = '';
						}
					}
					else
					{
						$folder_image = $folder_new;
						$folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['New_posts'];

						$newest_post_img = '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=newest") . '"><img src="' . $images['icon_newest_reply'] . '" alt="' . $lang['View_newest_post'] . '" title="' . $lang['View_newest_post'] . '" border="0" /></a> ';
					}
				}
				else
				{
					$folder_image = $folder;
					$folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];

					$newest_post_img = '';
				}
			}
			else
			{
				$folder_image = $folder;
				$folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];

				$newest_post_img = '';
			}
		}

		if( ( $replies + 1 ) > $board_config['posts_per_page'] )
		{
			$total_pages = ceil( ( $replies + 1 ) / $board_config['posts_per_page'] );
			$goto_page = ' [ <img src="' . $images['icon_gotopost'] . '" alt="' . $lang['Goto_page'] . '" title="' . $lang['Goto_page'] . '" />' . $lang['Goto_page'] . ': ';

			$times = 1;
			for($j = 0; $j < $replies + 1; $j += $board_config['posts_per_page'])
			{
				$goto_page .= '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=" . $topic_id . "&amp;start=$j") . '">' . $times . '</a>';
				if( $times == 1 && $total_pages > 4 )
				{
					$goto_page .= ' ... ';
					$times = $total_pages - 3;
					$j += ( $total_pages - 4 ) * $board_config['posts_per_page'];
				}
				else if ( $times < $total_pages )
				{
					$goto_page .= ', ';
				}
				$times++;
			}
			$goto_page .= ' ] ';
		}
		else
		{
			$goto_page = '';
		}

		$view_topic_url = append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id");

		$topic_author = ( $topic_rowset[$i]['user_id'] != ANONYMOUS ) ? '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . '=' . $topic_rowset[$i]['user_id']) . '">' : '';
		$topic_author .= ( $topic_rowset[$i]['user_id'] != ANONYMOUS ) ? $topic_rowset[$i]['username'] : ( ( $topic_rowset[$i]['post_username'] != '' ) ? $topic_rowset[$i]['post_username'] : $lang['Guest'] );

		$topic_author .= ( $topic_rowset[$i]['user_id'] != ANONYMOUS ) ? '</a>' : '';

		$first_post_time = create_date($board_config['default_dateformat'], $topic_rowset[$i]['topic_time'], $board_config['board_timezone']);

		$last_post_time = create_date($board_config['default_dateformat'], $topic_rowset[$i]['post_time'], $board_config['board_timezone']);

		$last_post_author = ( $topic_rowset[$i]['id2'] == ANONYMOUS ) ? ( ($topic_rowset[$i]['post_username2'] != '' ) ? $topic_rowset[$i]['post_username2'] . ' ' : $lang['Guest'] . ' ' ) : '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . '='  . $topic_rowset[$i]['id2']) . '">' . $topic_rowset[$i]['user2'] . '</a>';

		$last_post_url = '<a href="' . append_sid("viewtopic.$phpEx?"  . POST_POST_URL . '=' . $topic_rowset[$i]['topic_last_post_id']) . '#' . $topic_rowset[$i]['topic_last_post_id'] . '"><img src="' . $images['icon_latest_reply'] . '" alt="' . $lang['View_latest_post'] . '" title="' . $lang['View_latest_post'] . '" border="0" /></a>';

		$views = $topic_rowset[$i]['topic_views'];

		$row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
		$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
		$calendar_title = get_calendar_title($topic_rowset[$i]['topic_calendar_time'], $topic_rowset[$i]['topic_calendar_duration']);
		if (!empty($calendar_title)) $calendar_title = '</a></span><a name="cal_' . $topic_id . '">' . $calendar_title . '<span class="topictitle">';
		$topic_title .= $calendar_title;
//-- fin mod : calendar ----------------------------------------------------------------------------

		$template->assign_block_vars('topicrow', array(
//-- mod : post icon -------------------------------------------------------------------------------
//-- add
			'ICON'					=> $icon,
//-- fin mod : post icon ---------------------------------------------------------------------------
			'ROW_COLOR' => $row_color,
			'ROW_CLASS' => $row_class,
			'FORUM_ID' => $forum_id,
			'TOPIC_ID' => $topic_id,
			'TOPIC_FOLDER_IMG' => $folder_image,
			'TOPIC_AUTHOR' => $topic_author,
			'GOTO_PAGE' => $goto_page,
			'REPLIES' => $replies,
			'NEWEST_POST_IMG' => $newest_post_img,
			'TOPIC_ATTACHMENT_IMG' => topic_attachment_image($topic_rowset[$i]['topic_attachment']),
			'TOPIC_TITLE' => $topic_title,
			'TOPIC_TYPE' => $topic_type,
			'VIEWS' => $views,
			'FIRST_POST_TIME' => $first_post_time,
			'LAST_POST_TIME' => $last_post_time,
			'LAST_POST_AUTHOR' => $last_post_author,
			'LAST_POST_IMG' => $last_post_url,

			'L_TOPIC_FOLDER_ALT' => $folder_alt,

			'U_VIEW_TOPIC' => $view_topic_url)
		);
	}
*/
//-- fin mod : split topic type --------------------------------------------------------------------

	$topics_count -= $total_announcements;

//-- mod : topic display order ---------------------------------------------------------------------
// here we added
//	&amp;sort=$sort_value&amp;order=$order_value
//-- modify
	$template->assign_vars(array(
		'PAGINATION' => generate_pagination("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id&amp;topicdays=$topic_days&amp;sort=$sort_value&amp;order=$order_value&amp;sort2=$sort_value2&amp;order2=$order_value2", $topics_count, $topics_per_page, $start),
		'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / $topics_per_page ) + 1 ), ceil( $topics_count / $topics_per_page )),

		'L_GOTO_PAGE' => $lang['Goto_page'])
	);
//-- fin mod : topic display order -----------------------------------------------------------------
//-- mod : split topic type ------------------------------------------------------------------------
//-- delete
/*
}
else
{
	//
	// No topics
	//
	$no_topics_msg = ( $forum_row['forum_status'] == FORUM_LOCKED ) ? $lang['Forum_locked'] : $lang['No_topics_post_one'];
	$template->assign_vars(array(
		'L_NO_TOPICS' => $no_topics_msg)
	);

	$template->assign_block_vars('switch_no_topics', array() );

}
*/
//-- fin mod : split topic type --------------------------------------------------------------------
//
// Parse the page and print
//
$template->pparse('body');

//
// Page footer
//
if(isset($HTTP_GET_VARS['printertopic']))
	$gen_simple_header = 1;
else if(isset($HTTP_GET_VARS['popup']))
	$gen_simple_header = -1;

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>