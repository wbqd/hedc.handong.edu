<?php

/***************************************************************************
 *                             functions_buddylist.php
 *                            -------------------------
 *   copyright            : ?003 Freakin' Booty ;-P
 *   version              : 1.1.1
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

if(!defined('IN_PHPBB'))
{
	die('Hacking attempt');
}

// Log actions MOD Start
include_once($phpbb_root_path . 'includes/functions_log.'.$phpEx);
// Log actions MOD End

//
// Add a buddy
//
function add_buddy(&$user_id, &$buddy_id)
{
	global $db, $lang, $template, $theme, $phpEx;
	global $HTTP_SERVER_VARS;

	$action = preg_replace("#(\&buddy=add)+?#si", '', $HTTP_SERVER_VARS['REQUEST_URI']);
	$action = preg_replace("#(\&b=$buddy_id)+?#si", '', $action);
	$action = preg_replace('#.*?([a-z]+?\.' . $phpEx . '.*?)$#i', '\1', htmlspecialchars($action));

	if( $buddy_id == $user_id )
	{
		message_die(GENERAL_MESSAGE, 'You cannot add yourself to the buddylist');
	}

	$sql = "SELECT * FROM " . BUDDIES_TABLE . " WHERE user_id = $user_id AND buddy_id = $buddy_id";
	if( !$result = $db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, 'Could not query buddylist information', '', __LINE__, __FILE__, $sql);
	}

	if( $row = $db->sql_fetchrow($result) )
	{
		message_die(GENERAL_MESSAGE, 'User is already in your buddylist');
	}
	$db->sql_freeresult($result);

	$sql = "INSERT INTO " . BUDDIES_TABLE . " (user_id, buddy_id)
			VALUES ($user_id, $buddy_id)";
	if( !$db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, 'Could not add the user to your buddylist', '', __LINE__, __FILE__, $sql);
	}

	$template->assign_vars(array(
		'META' => '<meta http-equiv="refresh" content="3;url=' . $action . '" />'
		)
	);

	$message = $lang['Buddy_added'];
	message_die(GENERAL_MESSAGE, $message);
}


//
// Remove a buddy
//
function remove_buddy(&$user_id, &$buddy_id)
{
	global $db, $lang, $template, $theme, $phpEx;
	global $HTTP_SERVER_VARS;

	$action = preg_replace("#(\&buddy=remove)+?#si", '', $HTTP_SERVER_VARS['REQUEST_URI']);
	$action = preg_replace("#(\&b=$buddy_id)+?#si", '', $action);
	$action = preg_replace('#.*?([a-z]+?\.' . $phpEx . '.*?)$#i', '\1', htmlspecialchars($action));

	$sql = "SELECT * FROM " . BUDDIES_TABLE . " WHERE user_id = $user_id AND buddy_id = $buddy_id";
	if( !$result = $db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, 'Could not query buddylist information', '', __LINE__, __FILE__, $sql);
	}

	if( !$row = $db->sql_fetchrow($result) )
	{
		message_die(GENERAL_MESSAGE, 'User is not in your buddylist');
	}
	$db->sql_freeresult($result);

	$sql = "DELETE FROM " . BUDDIES_TABLE . " WHERE buddy_id = $buddy_id AND user_id = $user_id";
	if( !$db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, 'Could not remove the buddy from your buddylist', '', __LINE__, __FILE__, $sql);
	}

	// Log actions MOD Start
	log_action('delete[buddy]', $buddy_id, $userdata['user_id'], $userdata['username']);
	// Log actions MOD End

	$template->assign_vars(array(
		'META' => '<meta http-equiv="refresh" content="3;url=' . $action . '" />'
		)
	);

	$message = $lang['Buddy_removed'];
	message_die(GENERAL_MESSAGE, $message);
}


//
// General buddylist
//
function get_buddies(&$data)
{
	global $db, $lang, $template, $theme, $images, $phpEx;
	global $HTTP_SERVER_VARS;

	$current_time = time();
	$session_time = 60;
	$end_session = $current_time - $session_time;

	$action = preg_replace('#.*?([a-z]+?\.' . $phpEx . '.*?)$#i', '\1', htmlspecialchars($HTTP_SERVER_VARS['REQUEST_URI']));

	$sql = "SELECT b.buddy_id, u.username AS buddy_name, u.user_email AS buddy_email, u.user_viewemail, u.user_allow_viewonline, u.user_session_time
			FROM " . BUDDIES_TABLE . " b, " . USERS_TABLE . " u
			WHERE b.user_id = " . $data['user_id'] . "
				AND u.user_id = b.buddy_id
			ORDER BY u.username ASC";
	if( !$result = $db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, 'Could not query buddies information', '', __LINE__, __FILE__, $sql);
	}

	$buddies_online = array();
	$buddies_offline = array();
	while( $row = $db->sql_fetchrow($result) )
	{
		if( ($row['user_allow_viewonline'] || $data['user_level'] == ADMIN) && ($row['user_session_time'] >= $end_session) )
		{
			$buddies_online[] = $row;
		}
		else
		{
			$buddies_offline[] = $row;
		}
	}
	$db->sql_freeresult($result);

	//
	// Default page
	//
	$template->set_filenames(array(
		'buddy_list' => 'buddylist_body.tpl'
		)
	);

	//
	// Dump vars to template
	//
	$template->assign_vars(array(
		'L_BUDDYLIST' => $lang['Buddylist'],
		'L_NO_BUDDIES_ONLINE' => $lang['No_buddies_online'],
		'L_NO_BUDDIES_OFFLINE' => $lang['No_buddies_offline'],
		'L_ONLINE' => $lang['Online'],
		'L_OFFLINE' => $lang['Offline']
		)
	);


	//
	// Okay, let's build the online buddies list
	//
	if( count($buddies_online) == 0 )
	{
		$template->assign_block_vars('switch_no_buddies_online', array());
	}
	else
	{
		for( $i = 0; $i < count($buddies_online); $i++ )
		{
			$buddy_id = $buddies_online[$i]['buddy_id'];
			$buddy_name = $buddies_online[$i]['buddy_name'];
			$buddy_profile = append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$buddy_id");
			$buddy_url = '<a href="' . $buddy_profile . '">' . $buddy_name . '</a>';

			$buddy_temp_url = append_sid("privmsg.$phpEx?mode=post&amp;" . POST_USERS_URL . "=$buddy_id");
			$buddy_pm_img = '<a href="' . $buddy_temp_url . '"><img src="' . $images['icon_pm'] . '" alt="' . $lang['Send_private_message'] . '" title="' . $lang['Send_private_message'] . '" border="0" /></a>';
			$buddy_pm = '<a href="' . $buddy_temp_url . '">' . $lang['Send_private_message'] . '</a>';

			if( $buddies_online[$i]['user_viewemail'] || ($data['user_level'] == ADMIN) )
			{
				$buddy_email_uri = ( $board_config['board_email_form'] ) ? append_sid("profile.$phpEx?mode=email&amp;" . POST_USERS_URL . "=$buddy_id") : 'mailto:' . $buddies_online[$i]['buddy_email'];
				$buddy_email_img = '<a href="' . $buddy_email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" /></a>';
				$buddy_email = '<a href="' . $buddy_email_uri . '">' . $lang['Send_email'] . '</a>';
			}
			else
			{
				$buddy_email_img = '&nbsp;';
				$buddy_email = '&nbsp;';
			}

			$buddy_temp_url = $action . ( ( preg_match('#\?#', $action) ) ? '&amp;' : '?' ) . "buddy=remove&amp;b=$buddy_id";
			$buddy_remove_img = '<a href="' . $buddy_temp_url . '"><img src="' . 'templates/'.$theme['template_name'].'/images/icon_mini-delete.gif' . '" alt="' . $lang['Remove_buddy'] . '" title="' . $lang['Remove_buddy'] . '" border="0" /></a>';
			$buddy_remove = '<a href="' . $buddy_temp_url . '">' . $lang['Remove_buddy'] . '</a>';

			$row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
			$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

			$template->assign_block_vars('listrow_online', array(
				'ROW_COLOR' => '#' . $row_color,
				'ROW_CLASS' => $row_class,

				'BUDDY_URL' => $buddy_url,
				'PM_IMG' => $buddy_pm_img,
				'PM' => $buddy_pm,
				'EMAIL_IMG' => $buddy_email_img,
				'EMAIL' => $buddy_email,
				'REMOVE_IMG' => $buddy_remove_img,
				'REMOVE' => $buddy_remove
				)
			);
		}
	}


	//
	// Okay, let's build the offline buddies list
	//
	if( count($buddies_offline) == 0 )
	{
		$template->assign_block_vars('switch_no_buddies_offline', array());
	}
	else
	{
		for( $i = 0; $i < count($buddies_offline); $i++ )
		{
			$buddy_id = $buddies_offline[$i]['buddy_id'];
			$buddy_name = $buddies_offline[$i]['buddy_name'];
			$buddy_email = $buddies_offline[$i]['buddy_email'];
			$buddy_profile = append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$buddy_id");
			$buddy_url = '<a href="' . $buddy_profile . '">' . $buddy_name . '</a>';

			$buddy_temp_url = append_sid("privmsg.$phpEx?mode=post&amp;" . POST_USERS_URL . "=$buddy_id");
			$buddy_pm_img = '<a href="' . $buddy_temp_url . '"><img src="' . $images['icon_pm'] . '" alt="' . $lang['Send_private_message'] . '" title="' . $lang['Send_private_message'] . '" border="0" /></a>';
			$buddy_pm = '<a href="' . $buddy_temp_url . '">' . $lang['Send_private_message'] . '</a>';

			if( $buddies_offline[$i]['user_viewemail'] || ($data['user_level'] == ADMIN) )
			{
				$buddy_email_uri = ( $board_config['board_email_form'] ) ? append_sid("profile.$phpEx?mode=email&amp;" . POST_USERS_URL . "=$buddy_id") : 'mailto:' . $buddies_offline[$i]['buddy_email'];
				$buddy_email_img = '<a href="' . $buddy_email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" /></a>';
				$buddy_email = '<a href="' . $buddy_email_uri . '">' . $lang['Send_email'] . '</a>';
			}
			else
			{
				$buddy_email_img = '&nbsp;';
				$buddy_email = '&nbsp;';
			}

			$buddy_temp_url = $action . ( ( preg_match('#\?#', $action) ) ? '&amp;' : '?' ) . "buddy=remove&amp;b=$buddy_id";
			$buddy_remove_img = '<a href="' . $buddy_temp_url . '"><img src="' . 'templates/'.$theme['template_name'].'/images/icon_mini-delete.gif' . '" alt="' . $lang['Remove_buddy'] . '" title="' . $lang['Remove_buddy'] . '" border="0" /></a>';
			$buddy_remove = '<a href="' . $buddy_temp_url . '">' . $lang['Remove_buddy'] . '</a>';

			$row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
			$row_class = ( !($i % 2 )) ? $theme['td_class1'] : $theme['td_class2'];

			$template->assign_block_vars('listrow_offline', array (
				'ROW_COLOR' => '#' . $row_color,
				'ROW_CLASS' => $row_class,

				'BUDDY_URL' => $buddy_url,
				'PM_IMG' => $buddy_pm_img,
				'PM' => $buddy_pm,
				'EMAIL_IMG' => $buddy_email_img,
				'EMAIL' => $buddy_email,
				'REMOVE_IMG' => $buddy_remove_img,
				'REMOVE' => $buddy_remove
				)
			);
		}
	}

	$template->assign_var_from_handle('BUDDYLIST', 'buddy_list');
}


//
// Getting the buddy images to appear
// This will create image and text links, and will choose add/remove appropriately
//
function get_buddy_img(&$user_id, &$buddy_id)
{
	global $db, $lang, $template, $theme, $images, $phpEx;
	global $HTTP_SERVER_VARS;

	$action = preg_replace("#(\&buddy=remove)+?#si", '', $HTTP_SERVER_VARS['REQUEST_URI']);
	$action = preg_replace("#(\&b=$buddy_id)+?#si", '', $action);
	$action = preg_replace('#.*?([a-z]+?\.' . $phpEx . '.*?)$#i', '\1', htmlspecialchars($action));

	$buddy = '';
	$buddy_img = '';
	$buddy_lang = '';
	if( $buddy_id != $user_id && $user_id != ANONYMOUS && $buddy_id != ANONYMOUS )
	{
		$sql = "SELECT buddy_id FROM " . BUDDIES_TABLE . " WHERE user_id = $user_id AND buddy_id = $buddy_id";
		if( !$result = $db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, 'Could not retrieve buddy information', '', __LINE__, __FILE__, $sql);
		}

		if( $row = $db->sql_fetchrow($result) )
		{
			$temp_url = $action . ( ( preg_match('#\?#', $action) ) ? '&amp;' : '?' ) . "buddy=remove&amp;b=$buddy_id";
			$buddy_img = '<input type=button name=join class=liteoption value="'.$lang['Remove_buddy'].'"  onclick="location.replace(\''. $temp_url .'\')">';			
			$buddy = '<a href="' . $temp_url . '">' . $lang['Remove_buddy'] . '</a>';
			$buddy_lang = $lang['Remove_buddy'].':';
		}
		else
		{
			$temp_url = $action . ( ( preg_match('#\?#', $action) ) ? '&amp;' : '?' ) . "buddy=add&amp;b=$buddy_id";
			$buddy_img = '<input type=button name=join class=liteoption value="'.$lang['Add_buddy'].'"  onclick="location.replace(\''. $temp_url .'\')">';			
			$buddy = '<a href="' . $temp_url . '">' . $lang['Add_buddy'] . '</a>';
			$buddy_lang = $lang['Add_buddy'].':';
		}

		$db->sql_freeresult($result);
	}

	return array($buddy_img, $buddy, $buddy_lang);
}


//
// Obtain buddies in a string
// Instead of having the normal buddylist, this function simply creates a string with all buddies in.
// Online buddies are being listed bold
//
function get_buddies_list(&$data, $mode = '')
{
	global $db, $lang, $template, $theme, $images, $phpEx;

	$current_time = time();
	$session_time = 60;
	$end_session = $current_time - $session_time;

	$sql = "SELECT b.buddy_id, u.username AS buddy_name, u.user_allow_viewonline, u.user_session_time
			FROM " . BUDDIES_TABLE . " b, " . USERS_TABLE . " u
			WHERE b.user_id = " . $data['user_id'] . "
				AND u.user_id = b.buddy_id
			ORDER BY u.username ASC";
	if( !$result = $db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, 'Could not query buddies information', '', __LINE__, __FILE__, $sql);
	}

	$buddies = array();
	while( $row = $db->sql_fetchrow($result) )
	{
		$buddies[] = $row;
	}
	$db->sql_freeresult($result);

	//
	// Dump vars to template
	//
	$template->assign_vars(array(
		'L_BUDDYLIST' => $lang['Buddylist']
		)
	);


	//
	// Okay, let's build the online buddies list
	//
	$s_buddies = '';
	if( count($buddies) == 0 )
	{
		$s_buddies = $lang['No_buddies'];
	}
	else
	{
		for( $i = 0; $i < count($buddies); $i++ )
		{
			$buddy_id = $buddies[$i]['buddy_id'];

			if( ($buddies[$i]['user_allow_viewonline'] || $data['user_level'] == ADMIN) && ($buddies[$i]['user_session_time'] >= $end_session) )
			{
				$buddy_name = '<b>' . $buddies[$i]['buddy_name'] . '</b>';
			}
			else
			{
				$buddy_name = $buddies[$i]['buddy_name'];
			}

			$temp_url = append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$buddy_id");
			$buddy_profile = '<a href="' . $temp_url . '">' . $buddy_name . '</a>';

			$temp_url = append_sid("privmsg.$phpEx?mode=post&amp;" . POST_USERS_URL . "=$buddy_id");
			$buddy_pm = '<a href="' . $temp_url . '">' . $buddy_name . '</a>';

			$s_buddies .= ( ( $s_buddies != '' ) ? ', ' : '' ) . ( ( $mode == 'pm' ) ? $buddy_pm : $buddy_profile );
		}
	}

	$template->assign_vars(array(
		'S_BUDDIES' => $s_buddies
		)
	);

	return;
}

?>
