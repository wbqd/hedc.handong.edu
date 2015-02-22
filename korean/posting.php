<?php
/***************************************************************************
 *                                posting.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: posting.php,v 1.6 2003/08/30 15:05:45 acydburn Exp $
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

// Log actions MOD Start
include_once($phpbb_root_path . 'includes/functions_log.'.$phpEx);
// Log actions MOD End

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
include($phpbb_root_path . 'includes/def_icons.'.$phpEx);
//-- fin mod : post icon ---------------------------------------------------------------------------

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
include_once($phpbb_root_path . 'includes/functions_calendar.'.$phpEx);
//-- fin mod : calendar ----------------------------------------------------------------------------

//
// Check and set various parameters
//
$params = array('submit' => 'post', 'confirm' => 'confirm', 'preview' => 'preview', 'delete' => 'delete', 'poll_delete' => 'poll_delete', 'poll_add' => 'add_poll_option', 'poll_edit' => 'edit_poll_option', 'mode' => 'mode');
while( list($var, $param) = @each($params) )
{
	if ( !empty($HTTP_POST_VARS[$param]) || !empty($HTTP_GET_VARS[$param]) )
	{
		$$var = ( !empty($HTTP_POST_VARS[$param]) ) ? $HTTP_POST_VARS[$param] : $HTTP_GET_VARS[$param];
	}
	else
	{
		$$var = '';
	}
}

$params = array('forum_id' => POST_FORUM_URL, 'topic_id' => POST_TOPIC_URL, 'post_id' => POST_POST_URL);
while( list($var, $param) = @each($params) )
{
	if ( !empty($HTTP_POST_VARS[$param]) || !empty($HTTP_GET_VARS[$param]) )
	{
		$$var = ( !empty($HTTP_POST_VARS[$param]) ) ? intval($HTTP_POST_VARS[$param]) : intval($HTTP_GET_VARS[$param]);
	}
	else
	{
		$$var = '';
	}
}

$refresh = $preview || $poll_add || $poll_edit || $poll_delete;

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
$post_icon = isset($HTTP_POST_VARS['post_icon']) ? intval($HTTP_POST_VARS['post_icon']) : 0;
//-- fin mod : post icon ---------------------------------------------------------------------------

//
// Set topic type
//
$topic_type = ( !empty($HTTP_POST_VARS['topictype']) ) ? intval($HTTP_POST_VARS['topictype']) : POST_NORMAL;


//-- mod : calendar --------------------------------------------------------------------------------
//-- add
$year	= ( !empty($HTTP_POST_VARS['topic_calendar_year']) ) ? intval($HTTP_POST_VARS['topic_calendar_year']) : '';
$month	= ( !empty($HTTP_POST_VARS['topic_calendar_month']) ) ? intval($HTTP_POST_VARS['topic_calendar_month']) : '';
$day	= ( !empty($HTTP_POST_VARS['topic_calendar_day']) ) ? intval($HTTP_POST_VARS['topic_calendar_day']) : '';
$hour	= ( !empty($HTTP_POST_VARS['topic_calendar_hour']) ) ? intval($HTTP_POST_VARS['topic_calendar_hour']) : '';
$min	= ( !empty($HTTP_POST_VARS['topic_calendar_min']) ) ? intval($HTTP_POST_VARS['topic_calendar_min']) : '';
$d_day	= ( !empty($HTTP_POST_VARS['topic_calendar_duration_day']) ) ? intval($HTTP_POST_VARS['topic_calendar_duration_day']) : '';
$d_hour	= ( !empty($HTTP_POST_VARS['topic_calendar_duration_hour']) ) ? intval($HTTP_POST_VARS['topic_calendar_duration_hour']) : '';
$d_min	= ( !empty($HTTP_POST_VARS['topic_calendar_duration_min']) ) ? intval($HTTP_POST_VARS['topic_calendar_duration_min']) : '';
if ( empty($year) || empty($month) || empty($day) )
{
	$year = '';
	$month = '';
	$day = '';
	$hour = '';
	$min = '';
	$d_day = '';
	$d_hour = '';
	$d_min = '';
}
if (empty($hour) && empty($min))
{
	$hour = '';
	$min = '';
	$d_hour = '';
	$d_min = '';
}

// start event
$topic_calendar_time = 0;
if (!empty($year))
{
	$topic_calendar_time = mktime( intval($hour), intval($min), 0, intval($month), intval($day), intval($year) );
}

// duration
$topic_calendar_duration = 0;
$d_dur = $d_day . $d_hour . $d_min;
if ( !empty($topic_calendar_time) && !empty($d_dur) )
{
	$topic_calendar_duration = intval($d_day) * 86400 + intval($d_hour) * 3600 + intval($d_min) * 60 -1;
	if ($topic_calendar_duration < 0)
	{
		$topic_calendar_duration = 0;
	}
}
//-- fin mod : calendar ----------------------------------------------------------------------------

			$remark1 = ( isset($HTTP_POST_VARS['remark1']) ) ? trim($HTTP_POST_VARS['remark1']) : trim($HTTP_GET_VARS['remark1']);
			$remark2 = ( isset($HTTP_POST_VARS['remark2']) ) ? trim($HTTP_POST_VARS['remark2']) : trim($HTTP_GET_VARS['remark2']);
			$remark3 = ( isset($HTTP_POST_VARS['remark3']) ) ? trim($HTTP_POST_VARS['remark3']) : trim($HTTP_GET_VARS['remark3']);
			$remark4 = ( isset($HTTP_POST_VARS['remark4']) ) ? trim($HTTP_POST_VARS['remark4']) : trim($HTTP_GET_VARS['remark4']);
			$remark5 = ( isset($HTTP_POST_VARS['remark5']) ) ? trim($HTTP_POST_VARS['remark5']) : trim($HTTP_GET_VARS['remark5']);
			$remark6 = ( isset($HTTP_POST_VARS['remark6']) ) ? trim($HTTP_POST_VARS['remark6']) : trim($HTTP_GET_VARS['remark6']);
			$remark7 = ( isset($HTTP_POST_VARS['remark7']) ) ? trim($HTTP_POST_VARS['remark7']) : trim($HTTP_GET_VARS['remark7']);
			$remark8 = ( isset($HTTP_POST_VARS['remark8']) ) ? trim($HTTP_POST_VARS['remark8']) : trim($HTTP_GET_VARS['remark8']);
			$remark9 = ( isset($HTTP_POST_VARS['remark9']) ) ? trim($HTTP_POST_VARS['remark9']) : trim($HTTP_GET_VARS['remark9']);
			$remark10 = ( isset($HTTP_POST_VARS['remark10']) ) ? trim($HTTP_POST_VARS['remark10']) : trim($HTTP_GET_VARS['remark10']);
			$remark11 = ( isset($HTTP_POST_VARS['remark11']) ) ? trim($HTTP_POST_VARS['remark11']) : trim($HTTP_GET_VARS['remark11']);
			$remark12 = ( isset($HTTP_POST_VARS['remark12']) ) ? trim($HTTP_POST_VARS['remark12']) : trim($HTTP_GET_VARS['remark12']);
			$remark13 = ( isset($HTTP_POST_VARS['remark13']) ) ? trim($HTTP_POST_VARS['remark13']) : trim($HTTP_GET_VARS['remark13']);
			$remark14 = ( isset($HTTP_POST_VARS['remark14']) ) ? trim($HTTP_POST_VARS['remark14']) : trim($HTTP_GET_VARS['remark14']);
			$remark15 = ( isset($HTTP_POST_VARS['remark15']) ) ? trim($HTTP_POST_VARS['remark15']) : trim($HTTP_GET_VARS['remark15']);


			$afterPostURL = ( isset($HTTP_POST_VARS['afterPostURL']) ) ? trim($HTTP_POST_VARS['afterPostURL']) : trim($HTTP_GET_VARS['afterPostURL']);
			$afterPostMsg = ( isset($HTTP_POST_VARS['afterPostMsg']) ) ? trim($HTTP_POST_VARS['afterPostMsg']) : trim($HTTP_GET_VARS['afterPostMsg']);
			$afterPostSeconds = ( isset($HTTP_POST_VARS['afterPostSeconds']) ) ? trim($HTTP_POST_VARS['afterPostSeconds']) : trim($HTTP_GET_VARS['afterPostSeconds']);



######################
$sql = "SELECT pt.remark15
	FROM " . POSTS_TABLE . " p, " . POSTS_TEXT_TABLE . " pt
	WHERE p.post_id = '".$post_id."'
		AND pt.post_id = p.post_id
	";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain password information.", '', __LINE__, __FILE__, $sql);
}

$db_password = "";
if ($row = $db->sql_fetchrow($result)) {
	$db_password = $row['remark15'];
}

$password = (isset($HTTP_POST_VARS['remark15'])) ? trim($HTTP_POST_VARS['remark15']) : trim($HTTP_GET_VARS['remark15']);

######################

//
// If the mode is set to topic review then output
// that review ...
//
if ( $mode == 'topicreview' )
{
	require($phpbb_root_path . 'includes/topic_review.'.$phpEx);

	topic_review($topic_id, false);
	exit;
}
else if ( $mode == 'smilies' )
{
	generate_smilies('window', PAGE_POSTING);
	exit;
}

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_POSTING);
init_userprefs($userdata);
//
// End session management
//

//
// Was cancel pressed? If so then redirect to the appropriate
// page, no point in continuing with any further checks
//
if ( isset($HTTP_POST_VARS['cancel']) )
{
	if ( $post_id )
	{
		$redirect = "viewtopic.$phpEx?" . POST_POST_URL . "=$post_id";
		$post_append = "#$post_id";
	}
	else if ( $topic_id )
	{
		$redirect = "viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id";
		$post_append = '';
	}
	else if ( $forum_id )
	{
		$redirect = "viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id";
		$post_append = '';
	}
	else
	{
		$redirect = "portal.$phpEx";
		$post_append = '';
	}

	redirect(append_sid($redirect, true) . $post_append);
}

//
// What auth type do we need to check?
//
$is_auth = array();

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
$is_auth_type = '';
$is_auth_type_cal = '';
//-- fin mod : calendar ----------------------------------------------------------------------------

switch( $mode )
{
	case 'newtopic':
		if ( $topic_type == POST_ANNOUNCE )
		{
			$is_auth_type = 'auth_announce';
		}
		else if ( $topic_type == POST_STICKY )
		{
			$is_auth_type = 'auth_sticky';
		}
		else
		{
			$is_auth_type = 'auth_post';
		}
//-- mod : calendar --------------------------------------------------------------------------------
//-- add
		if (!empty($topic_calendar_time))
		{
			$is_auth_type_cal = 'auth_cal';
		}
//-- fin mod : calendar ----------------------------------------------------------------------------
		break;
	case 'reply':
	case 'quote':
		$is_auth_type = 'auth_reply';
		break;
	case 'editpost':
		$is_auth_type = 'auth_edit';
		break;
	case 'delete':
	case 'poll_delete':
		$is_auth_type = 'auth_delete';
		break;
	case 'vote':
		$is_auth_type = 'auth_vote';
		break;
	case 'topicreview':
		$is_auth_type = 'auth_read';
		break;
	default:
		message_die(GENERAL_MESSAGE, $lang['No_post_mode']);
		break;
}

//
// Here we do various lookups to find topic_id, forum_id, post_id etc.
// Doing it here prevents spoofing (eg. faking forum_id, topic_id or post_id
//
$error_msg = '';
$post_data = array();
switch ( $mode )
{
	case 'newtopic':
		if ( empty($forum_id) )
		{
			message_die(GENERAL_MESSAGE, $lang['Forum_not_exist']);
		}

		$sql = "SELECT *
			FROM " . FORUMS_TABLE . "
			WHERE forum_id = $forum_id";
		break;

	case 'reply':
	case 'vote':
		if ( empty( $topic_id) )
		{
			message_die(GENERAL_MESSAGE, $lang['No_topic_id']);
		}

		$sql = "SELECT f.*, t.topic_status, t.topic_title
			FROM " . FORUMS_TABLE . " f, " . TOPICS_TABLE . " t
			WHERE t.topic_id = $topic_id
				AND f.forum_id = t.forum_id";
		break;

	case 'quote':
	case 'editpost':
	case 'delete':
	case 'poll_delete':
		if ( empty($post_id) )
		{
			message_die(GENERAL_MESSAGE, $lang['No_post_id']);
		}

//-- mod : calendar --------------------------------------------------------------------------------
// here we added
//	, t.topic_calendar_time, t.topic_calendar_duration
//-- modify

//-- mod : post icon -------------------------------------------------------------------------------
// here we added
//	, t.topic_icon
//	, p.post_icon
//-- modify

		$select_sql = ( !$submit ) ? ", t.topic_title, t.topic_icon, t.topic_calendar_time, t.topic_calendar_duration, p.enable_bbcode, p.enable_html, p.enable_smilies, p.enable_sig, p.post_username, pt.post_subject, p.post_icon, pt.post_text, pt.bbcode_uid, u.username, u.user_id, u.user_sig, pt.remark1, pt.remark2, pt.remark3, pt.remark4, pt.remark5, pt.remark6, pt.remark7, pt.remark8, pt.remark9, pt.remark10, pt.remark11, pt.remark12, pt.remark13, pt.remark14, pt.remark15 " : '';
		$from_sql = ( !$submit ) ? ", " . POSTS_TEXT_TABLE . " pt, " . USERS_TABLE . " u" : '';
		$where_sql = ( !$submit ) ? "AND pt.post_id = p.post_id AND u.user_id = p.poster_id" : '';

//-- fin mod : post icon ---------------------------------------------------------------------------

//-- fin mod : calendar ----------------------------------------------------------------------------

		$sql = "SELECT f.*, t.topic_id, t.topic_status, t.topic_type, t.topic_first_post_id, t.topic_last_post_id, t.topic_vote, p.post_id, p.poster_id, p.post_time" . $select_sql . "
			FROM " . POSTS_TABLE . " p, " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f" . $from_sql . "
			WHERE p.post_id = $post_id
				AND t.topic_id = p.topic_id
				AND f.forum_id = p.forum_id
				$where_sql";
		break;

	default:
		message_die(GENERAL_MESSAGE, $lang['No_valid_mode']);
}

if ( $result = $db->sql_query($sql) )
{
	$post_info = $db->sql_fetchrow($result);

	$forum_id = $post_info['forum_id'];
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//	$forum_name = $post_info['forum_name'];
//-- add
	$forum_name = get_object_lang(POST_FORUM_URL . $post_info['forum_id'], 'name');
	$forum_desc = get_object_lang(POST_FORUM_URL . $post_info['forum_id'], 'desc');
//-- fin mod : categories hierarchy ----------------------------------------------------------------

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
	if (!empty($post_info['topic_calendar_duration']))
	{
		$post_info['topic_calendar_duration']++;
	}
//-- fin mod : calendar ----------------------------------------------------------------------------

	$is_auth = auth(AUTH_ALL, $forum_id, $userdata, $post_info);

	if ( $post_info['forum_status'] == FORUM_LOCKED && !$is_auth['auth_mod'])
	{
	   message_die(GENERAL_MESSAGE, $lang['Forum_locked']);
	}
	else if ( $mode != 'newtopic' && $post_info['topic_status'] == TOPIC_LOCKED && !$is_auth['auth_mod'])
	{
	   message_die(GENERAL_MESSAGE, $lang['Topic_locked']);
	}

	if ( $mode == 'editpost' || $mode == 'delete' || $mode == 'poll_delete' )
	{
		$topic_id = $post_info['topic_id'];

		$post_data['poster_post'] = ( $post_info['poster_id'] == $userdata['user_id'] ) ? true : false;
		$post_data['first_post'] = ( $post_info['topic_first_post_id'] == $post_id ) ? true : false;
		$post_data['last_post'] = ( $post_info['topic_last_post_id'] == $post_id ) ? true : false;
		$post_data['last_topic'] = ( $post_info['forum_last_post_id'] == $post_id ) ? true : false;
		$post_data['has_poll'] = ( $post_info['topic_vote'] ) ? true : false;
		$post_data['topic_type'] = $post_info['topic_type'];

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
		$post_data['post_icon'] = $post_info['post_icon'];
//-- fin mod : post icon ---------------------------------------------------------------------------

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
		$post_data['topic_calendar_time'] = $post_info['topic_calendar_time'];
		$post_data['topic_calendar_duration'] = $post_info['topic_calendar_duration'];
//-- fin mod : calendar ----------------------------------------------------------------------------

		$post_data['poster_id'] = $post_info['poster_id'];

		if ( $post_data['first_post'] && $post_data['has_poll'] )
		{
			$sql = "SELECT *
				FROM " . VOTE_DESC_TABLE . " vd, " . VOTE_RESULTS_TABLE . " vr
				WHERE vd.topic_id = $topic_id
					AND vr.vote_id = vd.vote_id
				ORDER BY vr.vote_option_id";
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not obtain vote data for this topic', '', __LINE__, __FILE__, $sql);
			}

			$poll_options = array();
			$poll_results_sum = 0;
			if ( $row = $db->sql_fetchrow($result) )
			{
				$poll_title = $row['vote_text'];
				$poll_id = $row['vote_id'];
				$poll_length = $row['vote_length'] / 86400;

				do
				{
					$poll_options[$row['vote_option_id']] = $row['vote_option_text'];
					$poll_results_sum += $row['vote_result'];
				}
				while ( $row = $db->sql_fetchrow($result) );
			}

			$post_data['edit_poll'] = ( ( !$poll_results_sum || $is_auth['auth_mod'] ) && $post_data['first_post'] ) ? true : 0;
		}
		else
		{
			$post_data['edit_poll'] = ($post_data['first_post'] && $is_auth['auth_pollcreate']) ? true : false;
		}

		//
		// Can this user edit/delete the post/poll?
		//
		if (($post_info['poster_id'] != ANONYMOUS && $post_info['poster_id'] != $userdata['user_id'] && !$is_auth['auth_mod']))
		{
			$message = ( $delete || $mode == 'delete' ) ? $lang['Delete_own_posts'] : $lang['Edit_own_posts'];
			$message .= '<br /><br />' . sprintf($lang['Click_return_topic'], '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id") . '">', '</a>');

			message_die(GENERAL_MESSAGE, $message);
		}
		else if ( !$post_data['last_post'] && !$is_auth['auth_mod'] && ( $mode == 'delete' || $delete ) )
		{
			message_die(GENERAL_MESSAGE, $lang['Cannot_delete_replied']);
		}
		else if ( !$post_data['edit_poll'] && !$is_auth['auth_mod'] && ( $mode == 'poll_delete' || $poll_delete ) )
		{
			message_die(GENERAL_MESSAGE, $lang['Cannot_delete_poll']);
		}
	}
	else
	{
		if ( $mode == 'quote' )
		{
			$topic_id = $post_info['topic_id'];
		}

		$post_data['first_post'] = ( $mode == 'newtopic' ) ? true : 0;
		$post_data['last_post'] = false;
		$post_data['has_poll'] = false;
		$post_data['edit_poll'] = false;
	}
}
else
{
	message_die(GENERAL_MESSAGE, $lang['No_such_post']);
}

//
// The user is not authed, if they're not logged in then redirect
// them, else show them an error message
//

//-- mod : calendar --------------------------------------------------------------------------------
// here we added
//	 || (!empty($is_auth_type_cal) && !$is_auth[$is_auth_type_cal])
//-- modify

if ( !$is_auth[$is_auth_type] || (!empty($is_auth_type_cal) && !$is_auth[$is_auth_type_cal]))
{
	if ( $userdata['session_logged_in'] )
	{
//-- mod : calendar --------------------------------------------------------------------------------
//-- add
		if (!empty($is_auth_type_cal) && !$is_auth[$is_auth_type_cal])
		{
			message_die(GENERAL_MESSAGE, sprintf($lang['Sorry_' . $is_auth_type_cal], $is_auth[$is_auth_type_cal . "_type"]));
		}
//-- fin mod : calendar ----------------------------------------------------------------------------

		message_die(GENERAL_MESSAGE, sprintf($lang['Sorry_' . $is_auth_type], $is_auth[$is_auth_type . "_type"]));
	}

	switch( $mode )
	{
		case 'newtopic':
			$redirect = "mode=newtopic&" . POST_FORUM_URL . "=" . $forum_id;
			break;
		case 'reply':
		case 'topicreview':
			$redirect = "mode=reply&" . POST_TOPIC_URL . "=" . $topic_id;
			break;
		case 'quote':
		case 'editpost':
			$redirect = "mode=quote&" . POST_POST_URL ."=" . $post_id;
			break;
	}

	redirect(append_sid("login.$phpEx?redirect=posting.$phpEx&" . $redirect, true));
}

//-- fin mod : calendar ----------------------------------------------------------------------------

//
// Set toggles for various options
//
if ( !$board_config['allow_html'] )
{
	$html_on = 0;
}
else
{
	$html_on = ( $submit || $refresh ) ? ( ( !empty($HTTP_POST_VARS['disable_html']) ) ? 0 : TRUE ) : ( ( $userdata['user_id'] == ANONYMOUS ) ? $board_config['allow_html'] : $userdata['user_allowhtml'] );
}

if ( !$board_config['allow_bbcode'] )
{
	$bbcode_on = 0;
}
else
{
	$bbcode_on = ( $submit || $refresh ) ? ( ( !empty($HTTP_POST_VARS['disable_bbcode']) ) ? 0 : TRUE ) : ( ( $userdata['user_id'] == ANONYMOUS ) ? $board_config['allow_bbcode'] : $userdata['user_allowbbcode'] );
}

if ( !$board_config['allow_smilies'] )
{
	$smilies_on = 0;
}
else
{
	$smilies_on = ( $submit || $refresh ) ? ( ( !empty($HTTP_POST_VARS['disable_smilies']) ) ? 0 : TRUE ) : ( ( $userdata['user_id'] == ANONYMOUS ) ? $board_config['allow_smilies'] : $userdata['user_allowsmile'] );
}

if ( ($submit || $refresh) && $is_auth['auth_read'])
{
	$notify_user = ( !empty($HTTP_POST_VARS['notify']) ) ? TRUE : 0;
}
else
{
	if ( $mode != 'newtopic' && $userdata['session_logged_in'] && $is_auth['auth_read'] )
	{
		$sql = "SELECT topic_id
			FROM " . TOPICS_WATCH_TABLE . "
			WHERE topic_id = $topic_id
				AND user_id = " . $userdata['user_id'];
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not obtain topic watch information', '', __LINE__, __FILE__, $sql);
		}

		$notify_user = ( $db->sql_fetchrow($result) ) ? TRUE : $userdata['user_notify'];
	}
	else
	{
		$notify_user = ( $userdata['session_logged_in'] && $is_auth['auth_read'] ) ? $userdata['user_notify'] : 0;
	}
}

$attach_sig = ( $submit || $refresh ) ? ( ( !empty($HTTP_POST_VARS['attach_sig']) ) ? TRUE : 0 ) : ( ( $userdata['user_id'] == ANONYMOUS ) ? 0 : $userdata['user_attachsig'] );
execute_posting_attachment_handling();


// --------------------
//  What shall we do?
//
if ( ( $delete || $poll_delete || $mode == 'delete' ) && !$confirm )
{

	if (($post_info['poster_id'] == ANONYMOUS || $userdata['user_id'] == ANONYMOUS) && ($db_password != $password)  && ($mode == 'delete') && $is_auth['auth_delete'] &&  !$confirm && !$is_auth['auth_mod'] ) {
		message_die(GENERAL_MESSAGE, 'Current_password_mismatch_with_back');
	}

	//
	// Confirm deletion
	//
	$s_hidden_fields = '<input type="hidden" name="' . POST_POST_URL . '" value="' . $post_id . '" />';
	$s_hidden_fields .= ( $delete || $mode == "delete" ) ? '<input type="hidden" name="mode" value="delete" />' : '<input type="hidden" name="mode" value="poll_delete" />';
	$s_hidden_fields .=   '<input type="hidden" name="' . POST_FORUM_URL . '" value="' . $forum_id . '" />';


	$l_confirm = ( $delete || $mode == 'delete' ) ? $lang['Confirm_delete'] : $lang['Confirm_delete_poll'];

	//
	// Output confirmation page
	//
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);

	$template->set_filenames(array(
		'confirm_body' => 'confirm_body.tpl')
	);

	$template->assign_vars(array(
		'MESSAGE_TITLE' => $lang['Information'],
		'MESSAGE_TEXT' => $l_confirm,

		'L_YES' => $lang['Yes'],
		'L_NO' => $lang['No'],

		'S_CONFIRM_ACTION' => append_sid("posting.$phpEx"),
		'S_HIDDEN_FIELDS' => $s_hidden_fields)
	);

	$template->pparse('confirm_body');

	include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
}
else if ( $mode == 'vote' )
{
	//
	// Vote in a poll
	//
	if ( !empty($HTTP_POST_VARS['vote_id']) )
	{
		$vote_option_id = intval($HTTP_POST_VARS['vote_id']);

		$sql = "SELECT vd.vote_id
			FROM " . VOTE_DESC_TABLE . " vd, " . VOTE_RESULTS_TABLE . " vr
			WHERE vd.topic_id = $topic_id
				AND vr.vote_id = vd.vote_id
				AND vr.vote_option_id = $vote_option_id
			GROUP BY vd.vote_id";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not obtain vote data for this topic', '', __LINE__, __FILE__, $sql);
		}

		if ( $vote_info = $db->sql_fetchrow($result) )
		{
			$vote_id = $vote_info['vote_id'];

			$sql = "SELECT *
				FROM " . VOTE_USERS_TABLE . "
				WHERE vote_id = $vote_id
					AND vote_user_id = " . $userdata['user_id'];
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not obtain user vote data for this topic', '', __LINE__, __FILE__, $sql);
			}

			if ( !($row = $db->sql_fetchrow($result)) )
			{
				$sql = "UPDATE " . VOTE_RESULTS_TABLE . "
					SET vote_result = vote_result + 1
					WHERE vote_id = $vote_id
						AND vote_option_id = $vote_option_id";
				if ( !$db->sql_query($sql, BEGIN_TRANSACTION) )
				{
					message_die(GENERAL_ERROR, 'Could not update poll result', '', __LINE__, __FILE__, $sql);
				}

				$sql = "INSERT INTO " . VOTE_USERS_TABLE . " (vote_id, vote_user_id, vote_user_ip)
					VALUES ($vote_id, " . $userdata['user_id'] . ", '$user_ip')";
				if ( !$db->sql_query($sql, END_TRANSACTION) )
				{
					message_die(GENERAL_ERROR, "Could not insert user_id for poll", "", __LINE__, __FILE__, $sql);
				}

				$message = $lang['Vote_cast'];
			}
			else
			{
				$message = $lang['Already_voted'];
			}
		}
		else
		{
			$message = $lang['No_vote_option'];
		}

		$template->assign_vars(array(
			'META' => '<meta http-equiv="refresh" content="3;url=' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id") . '">')
		);
		$message .=  '<br /><br />' . sprintf($lang['Click_view_message'], '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id") . '">', '</a>');
		message_die(GENERAL_MESSAGE, $message);
	}
	else
	{
		redirect(append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id", true));
	}
}
else if ( $submit || $confirm )
{

//
// Submit post/vote (newtopic, edit, reply, etc.)
//
$return_message = '';
$return_meta = '';

switch ( $mode )
{
	case 'editpost':
	case 'newtopic':
	case 'reply':

			// Anti - Spam
			$antiSpamCode=$HTTP_POST_VARS[md5($userdata['username'] . $HTTP_POST_VARS['antiSpamDate'] . $board_config['board_email'])];
			if (!isset($antiSpamCode) || empty($antiSpamCode) || $antiSpamCode!=md5($userdata['username'] . $userdata['user_regdate']) || (gmdate('U')-$HTTP_POST_VARS['antiSpamDate'])>3600) {
				if($mode == "newtopic") {
					message_die(GENERAL_MESSAGE, "DO NOT SPAM");
				}
			}

			$username = ( !empty($HTTP_POST_VARS['username']) ) ? $HTTP_POST_VARS['username'] : '';
			$subject = ( !empty($HTTP_POST_VARS['subject']) ) ? trim($HTTP_POST_VARS['subject']) : '';
			$message = ( !empty($HTTP_POST_VARS['message']) ) ? $HTTP_POST_VARS['message'] : '';

			//
			// Block censored words
			//
			$sql = "SELECT word
				FROM  " . WORDS_TABLE;
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not get censored words from database', '', __LINE__, __FILE__, $sql);
			}

			if ( $row = $db->sql_fetchrow($result) )
			{
				do
				{
					if( stristr($subject, $row['word']) != false || stristr($message, $row['word']) != false) {

						message_die(GENERAL_MESSAGE, "금지된 단어가 포함되어있습니다 : ". $row['word']);
					}

				}
				while ( $row = $db->sql_fetchrow($result) );
			}

			/// Block END

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
			$topic_calendar_time = ( $topic_calendar_time != $post_data['topic_calendar_time'] && !$is_auth['auth_cal']) ? $post_data['topic_calendar_time'] : $topic_calendar_time;
			if (empty($topic_calendar_time)) $topic_calendar_time = 0;
			$topic_calendar_duration = ( $topic_calendar_duration != $post_data['topic_calendar_duration'] && !$is_auth['auth_cal']) ? $post_data['topic_calendar_duration'] : $topic_calendar_duration;
			if (empty($topic_calendar_time) || empty($topic_calendar_duration)) $topic_calendar_duration = 0;
//-- fin mod : calendar ----------------------------------------------------------------------------

			$poll_title = ( isset($HTTP_POST_VARS['poll_title']) && $is_auth['auth_pollcreate'] ) ? $HTTP_POST_VARS['poll_title'] : '';
			$poll_options = ( isset($HTTP_POST_VARS['poll_option_text']) && $is_auth['auth_pollcreate'] ) ? $HTTP_POST_VARS['poll_option_text'] : '';
			$poll_length = ( isset($HTTP_POST_VARS['poll_length']) && $is_auth['auth_pollcreate'] ) ? $HTTP_POST_VARS['poll_length'] : '';
			$bbcode_uid = '';

			$remark1 = ( isset($HTTP_POST_VARS['remark1']) ) ? trim($HTTP_POST_VARS['remark1']) : trim($HTTP_GET_VARS['remark1']);
			$remark2 = ( isset($HTTP_POST_VARS['remark2']) ) ? trim($HTTP_POST_VARS['remark2']) : trim($HTTP_GET_VARS['remark2']);
			$remark3 = ( isset($HTTP_POST_VARS['remark3']) ) ? trim($HTTP_POST_VARS['remark3']) : trim($HTTP_GET_VARS['remark3']);
			$remark4 = ( isset($HTTP_POST_VARS['remark4']) ) ? trim($HTTP_POST_VARS['remark4']) : trim($HTTP_GET_VARS['remark4']);
			$remark5 = ( isset($HTTP_POST_VARS['remark5']) ) ? trim($HTTP_POST_VARS['remark5']) : trim($HTTP_GET_VARS['remark5']);
			$remark6 = ( isset($HTTP_POST_VARS['remark6']) ) ? trim($HTTP_POST_VARS['remark6']) : trim($HTTP_GET_VARS['remark6']);
			$remark7 = ( isset($HTTP_POST_VARS['remark7']) ) ? trim($HTTP_POST_VARS['remark7']) : trim($HTTP_GET_VARS['remark7']);
			$remark8 = ( isset($HTTP_POST_VARS['remark8']) ) ? trim($HTTP_POST_VARS['remark8']) : trim($HTTP_GET_VARS['remark8']);
			$remark9 = ( isset($HTTP_POST_VARS['remark9']) ) ? trim($HTTP_POST_VARS['remark9']) : trim($HTTP_GET_VARS['remark9']);
			$remark10 = ( isset($HTTP_POST_VARS['remark10']) ) ? trim($HTTP_POST_VARS['remark10']) : trim($HTTP_GET_VARS['remark10']);
			$remark11 = ( isset($HTTP_POST_VARS['remark11']) ) ? trim($HTTP_POST_VARS['remark11']) : trim($HTTP_GET_VARS['remark11']);
			$remark12 = ( isset($HTTP_POST_VARS['remark12']) ) ? trim($HTTP_POST_VARS['remark12']) : trim($HTTP_GET_VARS['remark12']);
			$remark13 = ( isset($HTTP_POST_VARS['remark13']) ) ? trim($HTTP_POST_VARS['remark13']) : trim($HTTP_GET_VARS['remark13']);
			$remark14 = ( isset($HTTP_POST_VARS['remark14']) ) ? trim($HTTP_POST_VARS['remark14']) : trim($HTTP_GET_VARS['remark14']);
			$remark15 = ( isset($HTTP_POST_VARS['remark15']) ) ? trim($HTTP_POST_VARS['remark15']) : trim($HTTP_GET_VARS['remark15']);


			$afterPostURL = ( isset($HTTP_POST_VARS['afterPostURL']) ) ? trim($HTTP_POST_VARS['afterPostURL']) : trim($HTTP_GET_VARS['afterPostURL']);
			$afterPostMsg = ( isset($HTTP_POST_VARS['afterPostMsg']) ) ? trim($HTTP_POST_VARS['afterPostMsg']) : trim($HTTP_GET_VARS['afterPostMsg']);
			$afterPostSeconds = ( isset($HTTP_POST_VARS['afterPostSeconds']) ) ? trim($HTTP_POST_VARS['afterPostSeconds']) : trim($HTTP_GET_VARS['afterPostSeconds']);

//-- mod : calendar --------------------------------------------------------------------------------
// here we have added
//	, $topic_calendar_time, $topic_calendar_duration
//-- modify prepare_post only

			if ( ($mode == 'editpost') && $is_auth['auth_edit'] && $submit && ($db_password != $password) && ($post_info['poster_id'] == ANONYMOUS || $userdata['user_id'] == ANONYMOUS) && !$is_auth['auth_mod'] ) {
				message_die(GENERAL_MESSAGE, 'Current_password_mismatch_with_back');
			}

			$remark15 = ($mode == 'editpost') ? $db_password : $remark15;

			prepare_post($mode, $post_data, $bbcode_on, $html_on, $smilies_on, $error_msg, $username, $bbcode_uid, $subject, $message, $poll_title, $poll_options, $poll_length, $topic_calendar_time, $topic_calendar_duration, $remark1, $remark2, $remark3, $remark4, $remark5, $remark6, $remark7, $remark8, $remark9, $remark10, $remark11, $remark12, $remark13, $remark14, $remark15);

//-- fin mod : calendar ----------------------------------------------------------------------------

			if ( $error_msg == '' )
			{
				$topic_type = ( $topic_type != $post_data['topic_type'] && !$is_auth['auth_sticky'] && !$is_auth['auth_announce'] ) ? $post_data['topic_type'] : $topic_type;

//-- mod : calendar --------------------------------------------------------------------------------
// here we added
//	, $topic_calendar_time, $topic_calendar_duration
//-- modify

//-- mod : post icon -------------------------------------------------------------------------------
// here we added
//	, post_icon
//-- modify

				submit_post($mode, $post_data, $return_message, $return_meta, $forum_id, $topic_id, $post_id, $poll_id, $topic_type, $bbcode_on, $html_on, $smilies_on, $attach_sig, $bbcode_uid, str_replace("\'", "''", $username), str_replace("\'", "''", $subject), str_replace("\'", "''", $message), str_replace("\'", "''", $poll_title), $poll_options, $poll_length, $remark1, $remark2, $remark3, $remark4, $remark5, $remark6, $remark7, $remark8, $remark9, $remark10, $remark11, $remark12, $remark13, $remark14, $remark15, $topic_calendar_time, $topic_calendar_duration, $post_icon, $afterPostURL, $afterPostMsg, $afterPostSeconds);

//-- fin mod : post icon ---------------------------------------------------------------------------

//-- fin mod : calendar ----------------------------------------------------------------------------
			}
			break;

			case 'delete':
			case 'poll_delete':

			delete_post($mode, $post_data, $return_message, $return_meta, $forum_id, $topic_id, $post_id, $poll_id);
			break;
	}

	if ( $error_msg == '' )
	{
		if ( $mode != 'editpost' )
		{
			$user_id = ( $mode == 'reply' || $mode == 'newtopic' ) ? $userdata['user_id'] : $post_data['poster_id'];
			update_post_stats($mode, $post_data, $forum_id, $topic_id, $post_id, $user_id);
		}

		$attachment_mod['posting']->insert_attachment($post_id);

		if ($error_msg == '' && $mode != 'poll_delete')
		{
			user_notification($mode, $post_data, $post_info['topic_title'], $forum_id, $topic_id, $post_id, $notify_user);
		}

		if ( $mode == 'newtopic' || $mode == 'reply' )
		{
			$tracking_topics = ( !empty($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) : array();
			$tracking_forums = ( !empty($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) : array();

			if ( count($tracking_topics) + count($tracking_forums) == 100 && empty($tracking_topics[$topic_id]) )
			{
				asort($tracking_topics);
				unset($tracking_topics[key($tracking_topics)]);
			}

			$tracking_topics[$topic_id] = time();

			setcookie($board_config['cookie_name'] . '_t', serialize($tracking_topics), 0, $board_config['cookie_path'], $board_config['cookie_domain'], $board_config['cookie_secure']);
		}



		//emailer
		if ($mode == 'newtopic' && $forum_id == 203)
		{

				include_once($phpbb_root_path . 'includes/emailer.'.$phpEx);
				$emailer = new emailer($board_config['smtp_delivery']);

				$emailer->from($board_config['board_email']);

				$emailer->use_template('post_notify_for_admin2', stripslashes($user_lang));
				$emailer->email_address($board_config['remark8']);

				$emailer->assign_vars(array(
					'MAIL_SUBJECT' => $subject,
					'MAIL_REMARK1' => $remark1,
					'MAIL_REMARK2' => $remark2,
					'MAIL_REMARK3' => $remark3,
					'MAIL_REMARK4' => $remark4,
					'MAIL_REMARK5' => $remark5,
					'MAIL_REMARK6' => $remark6,
					'MAIL_REMARK7' => $remark7,
					'MAIL_REMARK8' => $remark8,
					'MAIL_REMARK9' => $remark9,
					'MAIL_REMARK10' => $remark10,
					'MAIL_REMARK11' => $remark11,
					'MAIL_REMARK12' => $remark12,
					'MAIL_REMARK13' => $remark13,
					'MAIL_REMARK14' => $remark14,
					'MAIL_MESSAGE' => $message
					)
				);
				$emailer->send();
				$emailer->reset();
		}


		$template->assign_vars(array(
			'META' => $return_meta)
		);
		message_die(GENERAL_MESSAGE, $return_message);
	}
}

if( $refresh || isset($HTTP_POST_VARS['del_poll_option']) || $error_msg != '' )
{
	$username = ( !empty($HTTP_POST_VARS['username']) ) ? htmlspecialchars(trim(stripslashes($HTTP_POST_VARS['username']))) : '';
	$subject = ( !empty($HTTP_POST_VARS['subject']) ) ? htmlspecialchars(trim(stripslashes($HTTP_POST_VARS['subject']))) : '';
	$message = ( !empty($HTTP_POST_VARS['message']) ) ? htmlspecialchars(trim(stripslashes($HTTP_POST_VARS['message']))) : '';

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
	$post_icon = ( !empty($HTTP_POST_VARS['post_icon']) ) ? intval($HTTP_POST_VARS['post_icon']) : 0;
//-- fin mod : post icon ---------------------------------------------------------------------------

	$poll_title = ( !empty($HTTP_POST_VARS['poll_title']) ) ? htmlspecialchars(trim(stripslashes($HTTP_POST_VARS['poll_title']))) : '';
	$poll_length = ( isset($HTTP_POST_VARS['poll_length']) ) ? max(0, intval($HTTP_POST_VARS['poll_length'])) : 0;

	$poll_options = array();
	if ( !empty($HTTP_POST_VARS['poll_option_text']) )
	{
		while( list($option_id, $option_text) = @each($HTTP_POST_VARS['poll_option_text']) )
		{
			if( isset($HTTP_POST_VARS['del_poll_option'][$option_id]) )
			{
				unset($poll_options[$option_id]);
			}
			else if ( !empty($option_text) )
			{
				$poll_options[$option_id] = htmlspecialchars(trim(stripslashes($option_text)));
			}
		}
	}

	if ( isset($poll_add) && !empty($HTTP_POST_VARS['add_poll_option_text']) )
	{
		$poll_options[] = htmlspecialchars(trim(stripslashes($HTTP_POST_VARS['add_poll_option_text'])));
	}

	if ( $mode == 'newtopic' || $mode == 'reply')
	{
		$user_sig = ( $userdata['user_sig'] != '' && $board_config['allow_sig'] ) ? $userdata['user_sig'] : '';
	}
	else if ( $mode == 'editpost' )
	{
		$user_sig = ( $post_info['user_sig'] != '' && $board_config['allow_sig'] ) ? $post_info['user_sig'] : '';
	}

	if( $preview )
	{
		$orig_word = array();
		$replacement_word = array();
		obtain_word_list($orig_word, $replacement_word);

		$bbcode_uid = ( $bbcode_on ) ? make_bbcode_uid() : '';
		$preview_message = stripslashes(prepare_message(addslashes(unprepare_message($message)), $html_on, $bbcode_on, $smilies_on, $bbcode_uid));
		$preview_subject = $subject;
		$preview_username = $username;

		//
		// Finalise processing as per viewtopic
		//
		if( !$html_on )
		{
			if( $user_sig != '' || !$userdata['user_allowhtml'] )
			{
				$user_sig = preg_replace('#(<)([\/]?.*?)(>)#is', '&lt;\2&gt;', $user_sig);
			}
		}

		if( $attach_sig && $user_sig != '' && $userdata['user_sig_bbcode_uid'] )
		{
			$user_sig = bbencode_second_pass($user_sig, $userdata['user_sig_bbcode_uid']);
		}

		if( $bbcode_on )
		{
			$preview_message = bbencode_second_pass($preview_message, $bbcode_uid);
		}

		if( !empty($orig_word) )
		{
			$preview_username = ( !empty($username) ) ? preg_replace($orig_word, $replacement_word, $preview_username) : '';
			$preview_subject = ( !empty($subject) ) ? preg_replace($orig_word, $replacement_word, $preview_subject) : '';
			$preview_message = ( !empty($preview_message) ) ? preg_replace($orig_word, $replacement_word, $preview_message) : '';
		}

		if( $user_sig != '' )
		{
			$user_sig = make_clickable($user_sig);
		}
		$preview_message = make_clickable($preview_message);

		if( $smilies_on )
		{
			if( $userdata['user_allowsmile'] && $user_sig != '' )
			{
				$user_sig = smilies_pass($user_sig);
			}

			$preview_message = smilies_pass($preview_message);
		}

		if( $attach_sig && $user_sig != '' )
		{
			$preview_message = $preview_message . '<br /><br />_________________<br />' . $user_sig;
		}

		$preview_message = str_replace("\n", '<br />', $preview_message);

		$template->set_filenames(array(
			'preview' => 'posting_preview.tpl')
		);

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
		$preview_subject = get_icon_title($post_icon) . '&nbsp;' . $preview_subject;
//-- fin mod : post icon ---------------------------------------------------------------------------

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
		if (!empty($topic_calendar_time))
		{
			$preview_subject .= get_calendar_title($topic_calendar_time, $topic_calendar_duration);
		}
//-- fin mod : calendar ----------------------------------------------------------------------------

		$attachment_mod['posting']->preview_attachments();

		$thumb_filename = "<img src='templates/".$theme['template_name']."/images/default_thumbnail.jpg' border=0>";
		$thumb_src_header ='';
		$thumb_src_tail ='';


		if (0 < count($attachment_mod['posting']->attachment_list))
		{
			$thumb_src_header = '<a href="'.$upload_dir . '/' . $attachment_mod['posting']->attachment_list[0].'"  target="_blank">';
			$thumb_src_tail = '</a>';
			$thumb_filename = "<img src='".$upload_dir . '/' . THUMB_DIR . '/t_' . $attachment_mod['posting']->attachment_list[0]."' border=0>";
		}

		if(strstr($remark1, '⌒')) list($dump,$remark1) = explode("⌒",$remark1);
		if(strstr($remark2, '⌒')) list($dump,$remark2) = explode("⌒",$remark2);
		if(strstr($remark3, '⌒')) list($dump,$remark3) = explode("⌒",$remark3);
		if(strstr($remark4, '⌒')) list($dump,$remark4) = explode("⌒",$remark4);
		if(strstr($remark5, '⌒')) list($dump,$remark5) = explode("⌒",$remark5);
		if(strstr($remark6, '⌒')) list($dump,$remark6) = explode("⌒",$remark6);
		if(strstr($remark7, '⌒')) list($dump,$remark7) = explode("⌒",$remark7);
		if(strstr($remark8, '⌒')) list($dump,$remark8) = explode("⌒",$remark8);
		if(strstr($remark9, '⌒')) list($dump,$remark9) = explode("⌒",$remark9);
		if(strstr($remark10, '⌒')) list($dump,$remark10) = explode("⌒",$remark10);
		if(strstr($remark11, '⌒')) list($dump,$remark11) = explode("⌒",$remark11);
		if(strstr($remark12, '⌒')) list($dump,$remark12) = explode("⌒",$remark12);
		if(strstr($remark13, '⌒')) list($dump,$remark13) = explode("⌒",$remark13);
		if(strstr($remark14, '⌒')) list($dump,$remark14) = explode("⌒",$remark14);
		if(strstr($remark15, '⌒')) list($dump,$remark15) = explode("⌒",$remark15);

		$template->assign_vars(array(
			'TOPIC_TITLE' => $preview_subject,
			'POST_SUBJECT' => $preview_subject,
			'POSTER_NAME' => $preview_username,
			'POST_DATE' => create_date($board_config['default_dateformat'], time(), $board_config['board_timezone']),
			'MESSAGE' => $preview_message,

			'REMARK1' => $remark1,
			'REMARK2' => $remark2,
			'REMARK3' => $remark3,
			'REMARK4' => $remark4,
			'REMARK5' => $remark5,
			'REMARK6' => $remark6,
			'REMARK7' => $remark7,
			'REMARK8' => $remark8,
			'REMARK9' => $remark9,
			'REMARK10' => $remark10,
			'REMARK11' => $remark11,
			'REMARK12' => $remark12,
			'REMARK13' => $remark13,
			'REMARK14' => $remark14,
			'REMARK15' => $remark15,

			'THUMBNAIL'		=> $thumb_filename,
			'THUMBNAIL_SRC_HEADER'		=> $thumb_src_header,
			'THUMBNAIL_SRC_TAIL'		=> $thumb_src_tail,


			'L_POST_SUBJECT' => $lang['Post_subject'],
			'L_PREVIEW' => $lang['Preview'],
			'L_POSTED' => $lang['Posted'],
			'L_POST' => $lang['Post'])
		);
		$template->assign_var_from_handle('POST_PREVIEW_BOX', 'preview');
	}
	else if( $error_msg != '' )
	{
		$template->set_filenames(array(
			'reg_header' => 'error_body.tpl')
		);
		$template->assign_vars(array(
			'ERROR_MESSAGE' => "<font color=red>".$error_msg."</font>")
		);
		$template->assign_var_from_handle('ERROR_BOX', 'reg_header');
	}
}
else
{
	//
	// User default entry point
	//
	if ( $mode == 'newtopic' )
	{
		$user_sig = ( $userdata['user_sig'] != '' ) ? $userdata['user_sig'] : '';

		$username = ($userdata['session_logged_in']) ? $userdata['username'] : '';
		$poll_title = '';
		$poll_length = '';
		$subject = ( isset($HTTP_POST_VARS['subject']) ) ? trim($HTTP_POST_VARS['subject']) : trim($HTTP_GET_VARS['subject']);
		$message = '';

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
		$post_icon = 0;
//-- fin mod : post icon ---------------------------------------------------------------------------
	}
	else if ( $mode == 'reply' )
	{
		$user_sig = ( $userdata['user_sig'] != '' ) ? $userdata['user_sig'] : '';

		$username = ( $userdata['session_logged_in'] ) ? $userdata['username'] : '';
		$subject = '';
                // begin Automatic Subject on Reply mod
                $subject = $post_info['topic_title'];
                if ( !preg_match('/^Re:/', $subject) && strlen($subject) > 0)
                {
                        $subject = 'Re: ' . $subject;
                }
                // end Automatic Subject on Reply mod
		$message = '';

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
		$post_icon = 0;
//-- fin mod : post icon ---------------------------------------------------------------------------

	}
	else if ( $mode == 'quote' || $mode == 'editpost' )
	{
		$subject = ( $post_data['first_post'] ) ? $post_info['topic_title'] : $post_info['post_subject'];
		$message = $post_info['post_text'];
//-- mod : post icon -------------------------------------------------------------------------------
//-- add
		$post_icon = ( $post_data['first_post'] ) ? $post_info['topic_icon'] : $post_info['post_icon'];
//-- fin mod : post icon ---------------------------------------------------------------------------

		if ( $mode == 'editpost' )
		{
			$attach_sig = ( $post_info['enable_sig'] && $post_info['user_sig'] != '' ) ? TRUE : 0;
			$user_sig = $post_info['user_sig'];

			$html_on = ( $post_info['enable_html'] ) ? true : false;
			$bbcode_on = ( $post_info['enable_bbcode'] ) ? true : false;
			$smilies_on = ( $post_info['enable_smilies'] ) ? true : false;

			$remark1 = $post_info['remark1'];
			$remark2 = $post_info['remark2'];
			$remark3 = $post_info['remark3'];
			$remark4 = $post_info['remark4'];
			$remark5 = $post_info['remark5'];
			$remark6 = $post_info['remark6'];
			$remark7 = $post_info['remark7'];
			$remark8 = $post_info['remark8'];
			$remark9 = $post_info['remark9'];
			$remark10 = $post_info['remark10'];
			$remark11 = $post_info['remark11'];
			$remark12 = $post_info['remark12'];
			$remark13 = $post_info['remark13'];
			$remark14 = $post_info['remark14'];
			$remark15 = $post_info['remark15'];
		}
		else
		{
			$attach_sig = ( $userdata['user_attachsig'] ) ? TRUE : 0;
			$user_sig = $userdata['user_sig'];
		}

		if ( $post_info['bbcode_uid'] != '' )
		{
			$message = preg_replace('/\:(([a-z0-9]:)?)' . $post_info['bbcode_uid'] . '/s', '', $message);
		}

		$message = str_replace('<', '&lt;', $message);
		$message = str_replace('>', '&gt;', $message);
		$message = str_replace('<br />', "\n", $message);

		if ( $mode == 'quote' )
		{
			$orig_word = array();
			$replacement_word = array();
			obtain_word_list($orig_word, $replace_word);

			$msg_date =  create_date($board_config['default_dateformat'], $postrow['post_time'], $board_config['board_timezone']);

			// Use trim to get rid of spaces placed there by MS-SQL 2000
			$quote_username = ( trim($post_info['post_username']) != '' ) ? $post_info['post_username'] : $post_info['username'];
			$message = '<p align=center><table style="font-family: 돋움, Arial, Helvetica, sans-serif; font-size: 12px;" cellspacing="0" cellpadding="3" border="1" width="95%" bordercolordark="#EFEFEF" bordercolorlight="#E6E6E6">	<tr>	  <td style="font-family: 돋움, Arial, Helvetica, sans-serif; font-size: 12px;  line-height: 125%; background-color: white;" ><b>' . $quote_username . ' wrote:</b><br>' . $message . '</td>	</tr></table></p>';



			if ( !empty($orig_word) )
			{
				$subject = ( !empty($subject) ) ? preg_replace($orig_word, $replace_word, $subject) : '';
				$message = ( !empty($message) ) ? preg_replace($orig_word, $replace_word, $message) : '';
			}

			if ( !preg_match('/^Re:/', $subject) && strlen($subject) > 0 )
			{
				$subject = 'Re: ' . $subject;
			}

			$mode = 'reply';
		}
		else
		{
			$username = ( $post_info['user_id'] == ANONYMOUS && !empty($post_info['post_username']) ) ? $post_info['post_username'] : '';
		}
	}
}

//
// Signature toggle selection
//
if( $user_sig != '' )
{
	$template->assign_block_vars('switch_signature_checkbox', array());
}

//
// HTML toggle selection
//
if ( $board_config['allow_html'] )
{
	$html_status = $lang['HTML_is_ON'];
	$template->assign_block_vars('switch_html_checkbox', array());
}
else
{
	$html_status = $lang['HTML_is_OFF'];
}

//
// BBCode toggle selection
//
if ( $board_config['allow_bbcode'] )
{
	$bbcode_status = $lang['BBCode_is_ON'];
	$template->assign_block_vars('switch_bbcode_checkbox', array());
}
else
{
	$bbcode_status = $lang['BBCode_is_OFF'];
}

//
// Smilies toggle selection
//
if ( $board_config['allow_smilies'] )
{
	$smilies_status = $lang['Smilies_are_ON'];
	$template->assign_block_vars('switch_smilies_checkbox', array());
}
else
{
	$smilies_status = $lang['Smilies_are_OFF'];
}

if( !$userdata['session_logged_in'] || ( $mode == 'editpost' && $post_info['poster_id'] == ANONYMOUS ) )
{
	$template->assign_block_vars('switch_username_select', array());
}

//
// Notify checkbox - only show if user is logged in
//
if ( $userdata['session_logged_in'] && $is_auth['auth_read'] )
{
	if ( $mode != 'editpost' || ( $mode == 'editpost' && $post_info['poster_id'] != ANONYMOUS ) )
	{
		$template->assign_block_vars('switch_notify_checkbox', array());
	}
}

//
// Delete selection
//
if ( $mode == 'editpost' && ( ( $is_auth['auth_delete'] && $post_data['last_post'] && ( !$post_data['has_poll'] || $post_data['edit_poll'] ) ) || $is_auth['auth_mod'] ) )
{
	$template->assign_block_vars('switch_delete_checkbox', array());
}

//
// admin_or_reply selection
//
if ( $mode == 'reply' || $is_auth['auth_mod'] )
{
	$template->assign_block_vars('switch_admin_or_reply', array());
}
else {
	$template->assign_block_vars('switch_not_admin_or_reply', array());
}
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
// Reply selection
//
if ( $mode == 'reply')
{
	$template->assign_block_vars('switch_reply', array());
}
else {
	$template->assign_block_vars('switch_not_reply', array());
}

//password
if ((($mode == 'newtopic' || $mode == 'reply') && !$userdata['session_logged_in'] && !$is_auth['auth_mod']) || ($mode == 'editpost' &&  $db_password != "" && !$is_auth['auth_mod']))
{
	$template->assign_block_vars('switch_password', array());
}
else {
	$template->assign_block_vars('switch_not_password', array());
}

//del_btn
if (($post_data['last_post'] && $mode == 'editpost' &&  $db_password != "" && !$is_auth['auth_mod']))
{
	$template->assign_block_vars('switch_del_btn', array());
}
else {
	$template->assign_block_vars('switch_not_del_btn', array());
}

//
// Topic type selection
//
$topic_type_toggle = '';
if ( $mode == 'newtopic' || ( $mode == 'editpost' && $post_data['first_post'] ) )
{
	$template->assign_block_vars('switch_type_toggle', array());

	if( $is_auth['auth_sticky'] )
	{
		$topic_type_toggle .= '<input type="radio" name="topictype" class="formstyle3"  value="' . POST_STICKY . '"';
		if ( $post_data['topic_type'] == POST_STICKY || $topic_type == POST_STICKY )
		{
			$topic_type_toggle .= ' checked="checked"';
		}
		$topic_type_toggle .= ' /> ' . $lang['Post_Sticky'] . '&nbsp;&nbsp;';
	}

	if( $is_auth['auth_announce'] )
	{
		$topic_type_toggle .= '<input type="radio" name="topictype" class="formstyle3"  value="' . POST_ANNOUNCE . '"';
		if ( $post_data['topic_type'] == POST_ANNOUNCE || $topic_type == POST_ANNOUNCE )
		{
			$topic_type_toggle .= ' checked="checked"';
		}
		$topic_type_toggle .= ' /> ' . $lang['Post_Announcement'] . '&nbsp;&nbsp;';
	}

	if ( $topic_type_toggle != '' )
	{
		$topic_type_toggle = '<input type="radio" name="topictype" class="formstyle3"  value="' . POST_NORMAL .'"' . ( ( $post_data['topic_type'] == POST_NORMAL || $topic_type == POST_NORMAL ) ? ' checked="checked"' : '' ) . ' /> ' . $lang['Post_Normal'] . '&nbsp;&nbsp;' . $topic_type_toggle;
	}
}

//-- mod : custom user ban function --------------------------------------------------------------------------------
//-- author: 정인호
//-- date: 2014.3
//
// Prevent user to register more than two times in a week.
//

// 먼저 해당 유저의 포스트의 게시일을 받아온다
// $result가 끝날 때까지 루프를 돌리고
// 그리고 오늘 날짜에서 게시일을 빼서 7일 이내면 counter++
// counter가 2 이상이 되면 switch_not_approved_post 출력
//
// 주의: 중복 방지를 위해 모든 변수는 cf_ prefix 붙이기.
//
// -- 2014.04.14 수정 : 109번 포럼이 222번으로 변경.
// -- 2015.2.23 Add 231
// 로그인한 사용자가 222번 포럼에 쓴 모든 포스팅 시간을 쿼리한다. 단, 관리자 그룹은 제외.
if ( $forum_id == 222 ) {
	$cf_sql = 	"SELECT	p.post_time
				FROM	" . POSTS_TABLE . " p
				JOIN	" . USERS_TABLE . " u
				ON		u.user_id = p.poster_id
				WHERE	p.forum_id = 222
				AND		u.user_level = 0
				AND 	u.user_id = " . $userdata['user_id'];

	if (!($cf_result = $db->sql_query($cf_sql)))
	{
	        message_die (GENERAL_ERROR, 'Unable to retrieve post_time');
	}

	// 오늘 날짜에서 포스팅 날짜를 빼서 그 값이 7일보다 작으면 cf_counter를 ++한다.
	$cf_week_in_sec = 7 * 24 * 60 * 60;
	$cf_counter = 0;
	while ($cf_row = $db->sql_fetchrow($cf_result))
	{
		$cf_post_time = $cf_row['post_time'];
		if ((time() - $cf_post_time) < $cf_week_in_sec)
			$cf_counter++;
	}
	$db->sql_freeresult($cf_result);

	// 사용자 신청 금지 테이블에서 해당 유저가 있는지 쿼리한다. 이때 결과 정렬 순서는 ban_id의 역순이다. 역시 관리자 그룹은 제외.
	$cf_sql =	"SELECT		b.ban_until
				FROM		" . USER_BAN_TABLE . " b
				JOIN		" . USERS_TABLE . " u
				ON			u.user_id = b.user_id
				WHERE		u.user_id = " . $userdata['user_id'] . "
				AND			u.user_level = 0
				AND			b.ban_section = 'English HD'
				ORDER BY	b.ban_id DESC";

	if (!($cf_result = $db->sql_query($cf_sql)))
	{
	        message_die (GENERAL_ERROR, 'Unable to retrieve ban_until');
	}

	$cf_row = $db->sql_fetchrow($cf_result);

	$db->sql_freeresult($cf_result);

	$ban_flag = false;

	// 신청 금지 쿼리에서 결과가 있다면 해당일 까지 접근하지 못하게 막는다.
	if (!is_null($cf_row['ban_until']))
	{
		$ban_until = $cf_row['ban_until'];
		$cf_today = time();
		$timestamp = strtotime($ban_until);

		if (($timestamp - $cf_today) > 0)
			$ban_flag = true;
		else
			$ban_flag = false;
	}

	if ( $mode == 'newtopic' || ( $mode == 'editpost' && $post_data['first_post'] ) )
	{
		$template->assign_block_vars('switch_first_post', array());
	}

	// 만약 주 2회 이상 신청한 경우 알림 템플릿을 내보낸다.
	else if ($cf_counter > 1 && ( $mode != 'editpost' ) )
	{
		$template->assign_block_vars('switch_not_approved_post', array(
			'TIME' => time(),
			'CF_POST_TIME' => $cf_post_time,
			'CF_WEEK_IN_SEC' => $cf_week_in_sec,
			'CF_COUNTER' => $cf_counter,
			'CF_USER_NAME' => $userdata['username']
			)
		);
	}

	// 만약 신청 금지 리스트에 있는 경우 금지 템플릿을 내보낸다.
	else if ($ban_flag)
	{
		$template->assign_block_vars('switch_baned', array(
			'CF_USER_NAME' => $userdata['username'],
			'BAN_UNTIL' => $ban_until)
		);
	}
	else
	{
		$template->assign_block_vars('switch_not_first_post', array());
	}
}

// -- forum 231
if ( $forum_id == 231 ) {
	$cf_sql = 	"SELECT	p.post_time
				FROM	" . POSTS_TABLE . " p
				JOIN	" . USERS_TABLE . " u
				ON		u.user_id = p.poster_id
				WHERE	p.forum_id = 231
				AND		u.user_level = 0
				AND 	u.user_id = " . $userdata['user_id'];

	if (!($cf_result = $db->sql_query($cf_sql)))
	{
	        message_die (GENERAL_ERROR, 'Unable to retrieve post_time');
	}

	// 오늘 날짜에서 포스팅 날짜를 빼서 그 값이 7일보다 작으면 cf_counter를 ++한다.
	$cf_week_in_sec = 7 * 24 * 60 * 60;
	$cf_counter = 0;
	while ($cf_row = $db->sql_fetchrow($cf_result))
	{
		$cf_post_time = $cf_row['post_time'];
		if ((time() - $cf_post_time) < $cf_week_in_sec)
			$cf_counter++;
	}
	$db->sql_freeresult($cf_result);

	// 사용자 신청 금지 테이블에서 해당 유저가 있는지 쿼리한다. 이때 결과 정렬 순서는 ban_id의 역순이다. 역시 관리자 그룹은 제외.
	$cf_sql =	"SELECT		b.ban_until
				FROM		" . USER_BAN_TABLE . " b
				JOIN		" . USERS_TABLE . " u
				ON			u.user_id = b.user_id
				WHERE		u.user_id = " . $userdata['user_id'] . "
				AND			u.user_level = 0
				AND			b.ban_section = 'Korean HD'
				ORDER BY	b.ban_id DESC";

	if (!($cf_result = $db->sql_query($cf_sql)))
	{
	        message_die (GENERAL_ERROR, 'Unable to retrieve ban_until');
	}

	$cf_row = $db->sql_fetchrow($cf_result);

	$db->sql_freeresult($cf_result);

	$ban_flag = false;

	// 신청 금지 쿼리에서 결과가 있다면 해당일 까지 접근하지 못하게 막는다.
	if (!is_null($cf_row['ban_until']))
	{
		$ban_until = $cf_row['ban_until'];
		$cf_today = time();
		$timestamp = strtotime($ban_until);

		if (($timestamp - $cf_today) > 0)
			$ban_flag = true;
		else
			$ban_flag = false;
	}

	if ( $mode == 'newtopic' || ( $mode == 'editpost' && $post_data['first_post'] ) )
	{
		$template->assign_block_vars('switch_first_post', array());
	}

	// 만약 주 2회 이상 신청한 경우 알림 템플릿을 내보낸다.
	else if ($cf_counter > 1 && ( $mode != 'editpost' ) )
	{
		$template->assign_block_vars('switch_not_approved_post', array(
			'TIME' => time(),
			'CF_POST_TIME' => $cf_post_time,
			'CF_WEEK_IN_SEC' => $cf_week_in_sec,
			'CF_COUNTER' => $cf_counter,
			'CF_USER_NAME' => $userdata['username']
			)
		);
	}

	// 만약 신청 금지 리스트에 있는 경우 금지 템플릿을 내보낸다.
	else if ($ban_flag)
	{
		$template->assign_block_vars('switch_baned', array(
			'CF_USER_NAME' => $userdata['username'],
			'BAN_UNTIL' => $ban_until)
		);
	}
	else
	{
		$template->assign_block_vars('switch_not_first_post', array());
	}
}
// 실은 해당 페이지를 로드할 때 js로 경고창 띄우로 history.back()하게 만들어서 알림 템플릿과 신청 금지 템플릿은 보이지도 않지만, 혹시나 js 피해서 들어오는 사용자의 경우를 대비해서 php로도 대비 로직을 짜두었다. ;p

//-- fin mod : custom user ban function ----------------------------------------------------------------------------


//-- mod : calendar --------------------------------------------------------------------------------
//-- add
//
// Calendar type selection
//
$topic_type_cal = '';
if ( $mode == 'newtopic' || ( $mode == 'editpost' && $post_data['first_post'] ) )
{
	if( $is_auth['auth_cal'])
	{
		$template->assign_block_vars('switch_type_cal', array());
		$months = array(
			' -- ',
			$lang['datetime']['January'],
			$lang['datetime']['February'],
			$lang['datetime']['March'],
			$lang['datetime']['April'],
			$lang['datetime']['May'],
			$lang['datetime']['June'],
			$lang['datetime']['July'],
			$lang['datetime']['August'],
			$lang['datetime']['September'],
			$lang['datetime']['October'],
			$lang['datetime']['November'],
			$lang['datetime']['December'],
		);

		// get the date
		$topic_calendar_time = ( !isset($HTTP_POST_VARS['topic_calendar_year']) || (($topic_calendar_time != intval($post_data['topic_calendar_time'])) && !$is_auth['auth_cal']) ) ? intval($post_data['topic_calendar_time']) : $topic_calendar_time;
		$topic_calendar_duration = ( (!isset($HTTP_POST_VARS['topic_calendar_duration_day']) && !isset($HTTP_POST_VARS['topic_calendar_duration_hour']) && !isset($HTTP_POST_VARS['topic_calendar_duration_min']) ) || (($topic_calendar_duration != intval($post_data['topic_calendar_duration'])) && !$is_auth['auth_cal']) ) ? intval($post_data['topic_calendar_duration']) : $topic_calendar_duration;

		// get the components of the event date
		$year	= '';
		$month	= '';
		$day	= '';
		$hour	= '';
		$min	= '';
		if (!empty($topic_calendar_time))
		{
			$year	= intval( date('Y', $topic_calendar_time) );
			$month	= intval( date('m', $topic_calendar_time) );
			$day	= intval( date('d', $topic_calendar_time) );
			$hour	= intval( date('H', $topic_calendar_time) );
			$min	= intval( date('i', $topic_calendar_time) );
		}

		// get the components of the duration
		$d_day	= '';
		$d_hour	= '';
		$d_min	= '';
		if ( !empty($topic_calendar_time) && !empty($topic_calendar_duration) )
		{
			$d_dur = intval($topic_calendar_duration);
			$d_day = intval($d_dur / 86400);
			$d_dur = $d_dur - 86400 * $d_day;
			$d_hour = intval($d_dur / 3600);
			$d_dur = $d_dur - 3600 * $d_hour;
			$d_min = intval($d_dur / 60);
		}

		// raz if no date
		if ( empty($year) || empty($month) || empty($day) )
		{
			$year	= '';
			$month	= '';
			$day	= '';
			$hour	= '';
			$min	= '';
			$d_day	= '';
			$d_hour	= '';
			$d_min	= '';
		}

		// day list
		$s_topic_calendar_day = '<select name="topic_calendar_day">';
		for ($i=0; $i <= 31; $i++)
		{
			$selected = ( intval($day) == $i) ? ' selected="selected"' : '';
			$s_topic_calendar_day .= '<option value="' . $i . '"' . $selected . '>' . ( ($i == 0) ? ' -- ' : str_pad($i, 2, '0', STR_PAD_LEFT) ) . '</option>';
		}
		$s_topic_calendar_day .= '</select>';

		// month list
		$s_topic_calendar_month = '<select name="topic_calendar_month">';
		for ($i=0; $i <= 12; $i++)
		{
			$selected = ( intval($month) == $i ) ? ' selected="selected"' : '';
			$s_topic_calendar_month .= '<option value="' . $i . '"' . $selected . '>' . $months[$i] . '</option>';
		}
		$s_topic_calendar_month .= '</select>';

		// year list
		$s_topic_calendar_year = '<select name="topic_calendar_year">';

		$selected = empty($year) ? ' selected="selected"' : '';
		$s_topic_calendar_year .= '<option value="0"' . $select . '> ---- </option>';

		$start_year = ( (intval($year) > 1971 ) && (intval($year) <= date('Y', time())) ) ? intval($year)-1 : date('Y', time())-1;
		for ($i = $start_year; $i <= date('Y', time())+10; $i++)
		{
			$selected = ( intval($year) == $i) ? ' selected="selected"' : '';
			$s_topic_calendar_year .= '<option value="' . $i . '"' . $selected . '>' . $i . '</option>';
		}
		$s_topic_calendar_year .= '</select>';

		// time
		if (empty($hour) && empty($min))
		{
			$hour = '';
			$min = '';
		}
		$topic_calendar_hour	= $hour;
		$topic_calendar_min		= $min;

		// duration
		if ( empty($topic_calendar_hour) && empty($topic_calendar_min) )
		{
			$d_hour = '';
			$d_min = '';
		}
		if ( empty($d_day) && empty($d_hour) && empty($d_min) )
		{
			$d_day = '';
			$d_hour = '';
			$d_min = '';
		}
		$topic_calendar_duration_day	= $d_day;
		$topic_calendar_duration_hour	= $d_hour;
		$topic_calendar_duration_min	= $d_min;
	}
}
//-- fin mod : calendar ----------------------------------------------------------------------------

$hidden_form_fields = '<input type="hidden" name="mode" value="' . $mode . '" />';

switch( $mode )
{
	case 'newtopic':
		$page_title = $lang['Post_a_new_topic'];
		$hidden_form_fields .= '<input type="hidden" name="' . POST_FORUM_URL . '" value="' . $forum_id . '" />';
		break;

	case 'reply':
		$page_title = $lang['Post_a_reply'];
		$hidden_form_fields .= '<input type="hidden" name="' . POST_TOPIC_URL . '" value="' . $topic_id . '" />';
		break;

	case 'editpost':
		$page_title = $lang['Edit_Post'];
		$hidden_form_fields .= '<input type="hidden" name="' . POST_POST_URL . '" value="' . $post_id . '" />';
		break;
}

// Generate smilies listing for page output
generate_smilies('inline', PAGE_POSTING);

//
// Include page header
//
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

$template->set_filenames(array(
	'body' => 'posting_body.tpl',
	'pollbody' => 'posting_poll_body.tpl',
	'reviewbody' => 'posting_topic_review.tpl')
);

if($tree['main'][$tree['keys'][POST_FORUM_URL.$forum_id]] != 'c1') {
	make_jumpbox('viewforum.'.$phpEx, $forum_id);
}
//make_jumpbox('viewforum.'.$phpEx);

$template->assign_vars(array(
	'FORUM_NAME' => $forum_name,
	'FORUM_DESC' => $forum_desc,
	'L_POST_A' => $page_title,
	'L_POST_SUBJECT' => $lang['Post_subject'],

	'U_VIEW_FORUM' => append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id"))
);

//
// This enables the forum/topic title to be output for posting
// but not for privmsg (where it makes no sense)
//
$template->assign_block_vars('switch_not_privmsg', array());

if($mode == 'newtopic' && !($submit || $refresh)){
	$template->assign_block_vars('switch_mode_newtopic', array());
	if ( $is_auth['auth_mod'] )
	{
		$template->assign_block_vars('switch_mode_newtopic.switch_admin', array());
	}
	else {
		$template->assign_block_vars('switch_mode_newtopic.switch_not_admin', array());
	}
}
else if($mode == 'editpost' || ($submit || $refresh)) {
	$template->assign_block_vars('switch_mode_editpost', array());
	if ( $is_auth['auth_mod'] )
	{
		$template->assign_block_vars('switch_mode_editpost.switch_admin', array());
	}
	else {
		$template->assign_block_vars('switch_mode_editpost.switch_not_admin', array());
	}
}
else if($mode == 'reply') {
	$template->assign_block_vars('switch_mode_reply', array());
	if ( $is_auth['auth_mod'] )
	{
		$template->assign_block_vars('switch_mode_reply.switch_admin', array());
	}
	else {
		$template->assign_block_vars('switch_mode_reply.switch_not_admin', array());
	}
}

// Anti - Spam
$timeForAntiSpam = gmdate('U');

$hidden_form_fields .= '<input type="hidden" name="' . md5($userdata['username'] . $timeForAntiSpam . $board_config['board_email']) . '" value="' . md5($userdata['username'] . $userdata['user_regdate']) . '" />';
$hidden_form_fields .= '<input type="hidden" name="antiSpamDate" value="' . $timeForAntiSpam . '" />';

//
// Output the data to the template
//
$template->assign_vars(array(
	'USERNAME' => $username,
	'SUBJECT' => $subject,
	'MESSAGE' => $message,
	'HTML_STATUS' => $html_status,
	'BBCODE_STATUS' => sprintf($bbcode_status, '<a href="' . append_sid("faq.$phpEx?mode=bbcode") . '" target="_phpbbcode">', '</a>'),
	'SMILIES_STATUS' => $smilies_status,

	'POST_TIME' => ( empty($post_info['post_time']) ? '': create_date($board_config['default_dateformat'], $post_info['post_time'], $board_config['board_timezone']) ),

	'REMARK1' => $remark1,
	'REMARK2' => $remark2,
	'REMARK3' => $remark3,
	'REMARK4' => $remark4,
	'REMARK5' => $remark5,
	'REMARK6' => $remark6,
	'REMARK7' => $remark7,
	'REMARK8' => $remark8,
	'REMARK9' => $remark9,
	'REMARK10' => $remark10,
	'REMARK11' => $remark11,
	'REMARK12' => $remark12,
	'REMARK13' => $remark13,
	'REMARK14' => $remark14,
	'REMARK15' => $remark15,


	'GLOBAL_REMARK1' => $board_config['remark1'],
	'GLOBAL_REMARK2' => $board_config['remark2'],
	'GLOBAL_REMARK3' => $board_config['remark3'],
	'GLOBAL_REMARK4' => $board_config['remark4'],
	'GLOBAL_REMARK5' => $board_config['remark5'],
	'GLOBAL_REMARK6' => $board_config['remark6'],
	'GLOBAL_REMARK7' => $board_config['remark7'],
	'GLOBAL_REMARK8' => $board_config['remark8'],
	'GLOBAL_REMARK9' => $board_config['remark9'],
	'GLOBAL_REMARK10' => $board_config['remark10'],
	'GLOBAL_REMARK11' => $board_config['remark11'],
	'GLOBAL_REMARK12' => $board_config['remark12'],
	'GLOBAL_REMARK13' => $board_config['remark13'],
	'GLOBAL_REMARK14' => $board_config['remark14'],
	'GLOBAL_REMARK15' => $board_config['remark15'],
	'GLOBAL_REMARK16' => $board_config['remark16'],
	'GLOBAL_REMARK17' => $board_config['remark17'],
	'GLOBAL_REMARK18' => $board_config['remark18'],
	'GLOBAL_REMARK19' => $board_config['remark19'],
	'GLOBAL_REMARK20' => $board_config['remark20'],
	'GLOBAL_REMARK21' => $board_config['remark21'],
	'GLOBAL_REMARK22' => $board_config['remark22'],
	'GLOBAL_REMARK23' => $board_config['remark23'],
	'GLOBAL_REMARK24' => $board_config['remark24'],
	'GLOBAL_REMARK25' => $board_config['remark25'],
	'GLOBAL_REMARK26' => $board_config['remark26'],
	'GLOBAL_REMARK27' => $board_config['remark27'],
	'GLOBAL_REMARK28' => $board_config['remark28'],
	'GLOBAL_REMARK29' => $board_config['remark29'],
	'GLOBAL_REMARK30' => $board_config['remark30'],

	'INFO_USERNAME' => $userdata['username'],
	'INFO_USER_ID' => $userdata['user_id'],
	'INFO_USER_EMAIL' => $userdata['user_email'],
	'INFO_USER_WEBSITE' => $userdata['user_website'],
	'INFO_USER_FROM' => str_replace("/", " ", $userdata['user_from']),
	'INFO_USER_INTERESTS' => $userdata['user_interests'],
	'INFO_USER_GENDER' => $userdata['user_gender'],
	'INFO_USER_BIRTHDAY' => $userdata['user_birthday'],
	'INFO_USER_REALNAME' => $userdata['user_realname'],
	'INFO_USER_ZIPCODE_SHORT' => str_replace("-", "", $userdata['user_zipcode']),
	'INFO_USER_ZIPCODE' => $userdata['user_zipcode'],
	'INFO_USER_JUMIN1' => $userdata['user_jumin1'],
	'INFO_USER_JUMIN2' => $userdata['user_jumin2'],
	'INFO_USER_MPHONE' => $userdata['user_mphone'],
	'INFO_USER_HPHONE' => $userdata['user_hphone'],
	'INFO_USER_REMARK1' => $userdata['user_remark1'],
	'INFO_USER_REMARK2' => $userdata['user_remark2'],
	'INFO_USER_REMARK3' => $userdata['user_remark3'],
	'INFO_USER_REMARK4' => $userdata['user_remark4'],
	'INFO_USER_REMARK5' => $userdata['user_remark5'],
	'CURRENT_TIME' => time(),
	'IP_INFO_DOT' => getenv("REMOTE_ADDR"),
	'IP_INFO' => str_replace(".", "_", getenv("REMOTE_ADDR")),

	'BANNED_CHAR' => $lang['banned_char'],
	'REQUIRED_FIELD' => $lang['required_field'],
	'REQUIRED_PASSWORD' => $lang['required_password'],

	'L_SITE_ADDRESS' => $lang['site_address'],

	'PASSWORD' => $lang['Password'],
	'U_DELETE' => append_sid("posting.$phpEx?mode=delete&" . POST_POST_URL . "=$post_id"),
	'DEL_BUTTON' => ($mode == 'editpost') ? '&nbsp;<input type="button" name="'.$lang['Delete'].'" class="mainoption" value="'.$lang['Delete'].'" OnClick="go_del()"/>' : '',

	'L_AUTHOR' => $lang['Author'],
	'L_SUBJECT' => $lang['Subject'],
	'L_MESSAGE_BODY' => $lang['Message_body'],
	'L_OPTIONS' => $lang['Options'],
	'L_PREVIEW' => $lang['Preview'],
	'L_SPELLCHECK' => $lang['Spellcheck'],
	'L_SUBMIT' => $lang['Submit'],
	'L_CANCEL' => $lang['Cancel'],
	'L_CONFIRM_DELETE' => $lang['Confirm_delete'],
	'L_DISABLE_HTML' => $lang['Disable_HTML_post'],
	'L_DISABLE_BBCODE' => $lang['Disable_BBCode_post'],
	'L_DISABLE_SMILIES' => $lang['Disable_Smilies_post'],
	'L_ATTACH_SIGNATURE' => $lang['Attach_signature'],
	'L_NOTIFY_ON_REPLY' => $lang['Notify'],
	'L_DELETE_POST' => $lang['Delete_post'],

	'L_BBCODE_B_HELP' => $lang['bbcode_b_help'],
	'L_BBCODE_I_HELP' => $lang['bbcode_i_help'],
	'L_BBCODE_U_HELP' => $lang['bbcode_u_help'],
	'L_BBCODE_Q_HELP' => $lang['bbcode_q_help'],
	'L_BBCODE_C_HELP' => $lang['bbcode_c_help'],
	'L_BBCODE_L_HELP' => $lang['bbcode_l_help'],
	'L_BBCODE_O_HELP' => $lang['bbcode_o_help'],
	'L_BBCODE_P_HELP' => $lang['bbcode_p_help'],
	'L_BBCODE_W_HELP' => $lang['bbcode_w_help'],
	'L_BBCODE_A_HELP' => $lang['bbcode_a_help'],
	'L_BBCODE_S_HELP' => $lang['bbcode_s_help'],
	'L_BBCODE_F_HELP' => $lang['bbcode_f_help'],
	'L_EMPTY_MESSAGE' => $lang['Empty_message'],

	'L_FONT_COLOR' => $lang['Font_color'],
	'L_COLOR_DEFAULT' => $lang['color_default'],
	'L_COLOR_DARK_RED' => $lang['color_dark_red'],
	'L_COLOR_RED' => $lang['color_red'],
	'L_COLOR_ORANGE' => $lang['color_orange'],
	'L_COLOR_BROWN' => $lang['color_brown'],
	'L_COLOR_YELLOW' => $lang['color_yellow'],
	'L_COLOR_GREEN' => $lang['color_green'],
	'L_COLOR_OLIVE' => $lang['color_olive'],
	'L_COLOR_CYAN' => $lang['color_cyan'],
	'L_COLOR_BLUE' => $lang['color_blue'],
	'L_COLOR_DARK_BLUE' => $lang['color_dark_blue'],
	'L_COLOR_INDIGO' => $lang['color_indigo'],
	'L_COLOR_VIOLET' => $lang['color_violet'],
	'L_COLOR_WHITE' => $lang['color_white'],
	'L_COLOR_BLACK' => $lang['color_black'],

	'L_FONT_SIZE' => $lang['Font_size'],
	'L_FONT_TINY' => $lang['font_tiny'],
	'L_FONT_SMALL' => $lang['font_small'],
	'L_FONT_NORMAL' => $lang['font_normal'],
	'L_FONT_LARGE' => $lang['font_large'],
	'L_FONT_HUGE' => $lang['font_huge'],

	'L_PREV_TOPIC' => $lang['View_previous_topic'],
	'L_NEXT_TOPIC' => $lang['View_next_topic'],

	'L_BBCODE_CLOSE_TAGS' => $lang['Close_Tags'],
	'L_STYLES_TIP' => $lang['Styles_tip'],

	'U_VIEWTOPIC' => ( $mode == 'reply' ) ? append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;postorder=desc") : '',
	'U_REVIEW_TOPIC' => ( $mode == 'reply' ) ? append_sid("posting.$phpEx?mode=topicreview&amp;" . POST_TOPIC_URL . "=$topic_id") : '',

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
	'L_CALENDAR_TITLE'			=> $lang['Calendar_event'],
	'L_START'					=> $lang['Calendar_start'],
	'L_TIME'					=> $lang['Event_time'],
	'L_CALENDAR_DURATION'		=> $lang['Calendar_duration'],
	'L_DAYS'					=> $lang['Days'],
	'L_HOURS'					=> $lang['Hours'],
	'L_MINUTES'					=> $lang['Minutes'],
	'L_TODAY'					=> $lang['Today'],

	'L_CALENDAR_INSERT'			=> $lang['Calendar_insert'],
	'L_CALENDAR_DURING'			=> $lang['Calendar_during'],
	'L_CALENDAR_EVENT_CONTENT'	=> $lang['Calendar_event_content'],
	'L_CALENDAR_EXPLAIN'		=> $lang['Calendar_explain'],

	'TODAY_DAY'					=> date('d', time()),
	'TODAY_MONTH'				=> date('m', time()),
	'TODAY_YEAR'				=> date('Y', time()),

	'S_CALENDAR_YEAR'			=> $s_topic_calendar_year,
	'S_CALENDAR_MONTH'			=> $s_topic_calendar_month,
	'S_CALENDAR_DAY'			=> $s_topic_calendar_day,

	'CALENDAR_HOUR'				=> $topic_calendar_hour,
	'CALENDAR_MIN'				=> $topic_calendar_min,
	'CALENDAR_DURATION_DAY'		=> $topic_calendar_duration_day,
	'CALENDAR_DURATION_HOUR'	=> $topic_calendar_duration_hour,
	'CALENDAR_DURATION_MIN'		=> $topic_calendar_duration_min,
//-- fin mod : calendar ----------------------------------------------------------------------------

	'S_HTML_CHECKED' => ( !$html_on ) ? 'checked="checked"' : '',
	'S_BBCODE_CHECKED' => ( !$bbcode_on ) ? 'checked="checked"' : '',
	'S_SMILIES_CHECKED' => ( !$smilies_on ) ? 'checked="checked"' : '',
	'S_SIGNATURE_CHECKED' => ( $attach_sig ) ? 'checked="checked"' : '',
	'S_NOTIFY_CHECKED' => ( $notify_user ) ? 'checked="checked"' : '',
	'S_TYPE_TOGGLE' => $topic_type_toggle,
	'S_TOPIC_ID' => $topic_id,
	'S_POST_ACTION' => append_sid("posting.$phpEx"),
	'S_HIDDEN_FORM_FIELDS' => $hidden_form_fields)
);

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
// get the number of icon per row from config
$icon_per_row = isset($board_config['icon_per_row']) ? intval($board_config['icon_per_row']) : 10;
if ($icon_per_row <= 1)
{
	$icon_per_row = 10;
}

// get the list of icon available to the user
$icones_sort = array();
for ($i = 0; $i < count($icones); $i++)
{
	switch ($icones[$i]['auth'])
	{
		case AUTH_ADMIN:
			if ( $userdata['user_level'] == ADMIN )
			{
				$icones_sort[] = $i;
			}
			break;
		case AUTH_MOD:
			if ( $is_auth['auth_mod'] )
			{
				$icones_sort[] = $i;
			}
			break;
		case AUTH_REG:
			if ( $userdata['session_logged_in'] )
			{
				$icones_sort[] = $i;
			}
			break;
		default:
			$icones_sort[] = $i;
			break;
	}
}

// check if the icon exists
$found = false;
for ($i=0; ( ($i < count($icones_sort)) && !$found );$i++)
{
	$found = ($icones[ $icones_sort[$i] ]['ind'] == $post_icon);
}
if (!$found) $post_icon = 0;

// send to template
$template->assign_block_vars('switch_icon_checkbox', array());
$template->assign_vars(array(
	'L_ICON_TITLE' => $lang['post_icon_title'],
	)
);

// display the icons
$nb_row = intval( (count($icones_sort)-1) / $icon_per_row )+1;
$offset = 0;
for ($i=0; $i < $nb_row; $i++)
{
	$template->assign_block_vars('switch_icon_checkbox.row',array());
	for ($j=0; ( ($j < $icon_per_row) && ($offset < count($icones_sort)) ); $j++)
	{
		$icon_id  = $icones_sort[$offset];

		// send to cell or cell_none
		$template->assign_block_vars('switch_icon_checkbox.row.cell', array(
			'ICON_ID'		=> $icones[$icon_id]['ind'],
			'ICON_CHECKED'	=> ($post_icon == $icones[$icon_id]['ind']) ? ' checked="checked"' : '',
			'ICON_IMG'		=> get_icon_title($icones[$icon_id]['ind'], 2),
			)
		);
		$offset++;
	}
}
//-- fin mod : post icon ---------------------------------------------------------------------------

//
// Poll entry switch/output
//
if( ( $mode == 'newtopic' || ( $mode == 'editpost' && $post_data['edit_poll']) ) && $is_auth['auth_pollcreate'] )
{
	$template->assign_vars(array(
		'L_ADD_A_POLL' => $lang['Add_poll'],
		'L_ADD_POLL_EXPLAIN' => $lang['Add_poll_explain'],
		'L_POLL_QUESTION' => $lang['Poll_question'],
		'L_POLL_OPTION' => $lang['Poll_option'],
		'L_ADD_OPTION' => $lang['Add_option'],
		'L_UPDATE_OPTION' => $lang['Update'],
		'L_DELETE_OPTION' => $lang['Delete'],
		'L_POLL_LENGTH' => $lang['Poll_for'],
		'L_DAYS' => $lang['Days'],
		'L_POLL_LENGTH_EXPLAIN' => $lang['Poll_for_explain'],
		'L_POLL_DELETE' => $lang['Delete_poll'],

		'POLL_TITLE' => $poll_title,
		'POLL_LENGTH' => $poll_length)
	);

	if( $mode == 'editpost' && $post_data['edit_poll'] && $post_data['has_poll'])
	{
		$template->assign_block_vars('switch_poll_delete_toggle', array());
	}

	if( !empty($poll_options) )
	{
		while( list($option_id, $option_text) = each($poll_options) )
		{
			$template->assign_block_vars('poll_option_rows', array(
				'POLL_OPTION' => str_replace('"', '&quot;', $option_text),

				'S_POLL_OPTION_NUM' => $option_id)
			);
		}
	}

	$template->assign_var_from_handle('POLLBOX', 'pollbody');
}

//
// Topic review
//
if( $mode == 'reply' && $is_auth['auth_read'] )
{
	require($phpbb_root_path . 'includes/topic_review.'.$phpEx);
	topic_review($topic_id, true);

	$template->assign_block_vars('switch_inline_mode', array());
	$template->assign_var_from_handle('TOPIC_REVIEW_BOX', 'reviewbody');
}

$template->pparse('body');

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>
