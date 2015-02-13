<?php
/***************************************************************************
 *                             (admin) index.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: index.php,v 1.40.2.5 2003/08/03 11:50:51 acydburn Exp $
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

define('IN_PHPBB', 1);

//
// Load default header
//
$no_page_header = TRUE;
$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);

// ---------------
// Begin functions
//
function inarray($needle, $haystack)
{ 
	for($i = 0; $i < sizeof($haystack); $i++ )
	{ 
		if( $haystack[$i] == $needle )
		{ 
			return true; 
		} 
	} 
	return false; 
}
//
// End functions
// -------------

//
// Generate relevant output
//
if( isset($HTTP_GET_VARS['pane']) && $HTTP_GET_VARS['pane'] == 'left' )
{
	$dir = @opendir(".");

	$setmodules = 1;
	while( $file = @readdir($dir) )
	{
		if( preg_match("/^admin_.*?\." . $phpEx . "$/", $file) )
		{
			include($file);
		}
	}

	@closedir($dir);

	unset($setmodules);

	include('./page_header_admin.'.$phpEx);

	$template->set_filenames(array(
		"body" => "admin/index_navigate.tpl")
	);


	$u_login_logout = append_sid("../login.$phpEx?logout=true", true);
	$l_login_logout = $lang['Logout'] . ' [ ' . $userdata['username'] . ' ]';

	$template->assign_vars(array(
		"U_FORUM_INDEX" => append_sid("../portal.$phpEx"),
		"U_ADMIN_INDEX" => append_sid("index.$phpEx?pane=right"),
		"U_LOGIN_LOGOUT" => $u_login_logout,
		"U_ENGLISH" => append_sid("../../english/admin/index.$phpEx"),
		
		"L_MANAGE" => $lang['Manage'],
		"L_PERMISSIONS" => $lang['Permissions'],

		"L_MENU_MANAGE" => $lang['menu_manage'],
		"L_ADVANCED_MANAGE" => $lang['advanced_manage'],

		//메뉴별관리

		####################

		"U_MANAGE_SINGLE" => append_sid("admin_forums.$phpEx?mode=editforum"),
		"U_MANAGE_MULTI" => append_sid("admin_forums.$phpEx"),			

		"U_PERM_SINGLE" => append_sid("admin_forumauth.$phpEx?adv=1"),
		"U_PERM_MULTI" => append_sid("admin_forumauth.$phpEx"),

		"U_PREVIEW_SINGLE" => append_sid("../viewforum.$phpEx"),
		"U_PREVIEW_MULTI" => append_sid("../index.$phpEx"),

		####################

		//고급관리
		"U_ADV_MENU1_1" => append_sid("admin_board.$phpEx"),
		"U_ADV_MENU1_1_1" => append_sid("admin_register.$phpEx"),
		"U_ADV_MENU1_2" => append_sid("admin_board_extend.$phpEx"),
		"U_ADV_MENU1_3" => append_sid("admin_portal.$phpEx?mode=config"),
		"U_ADV_MENU1_4" => append_sid("admin_qbar.$phpEx?panel=1"),
		"U_ADV_MENU1_5" => append_sid("admin_qbar.$phpEx?panel=2"),

		"U_ADV_MENU2_1" => append_sid("admin_users.$phpEx"),
		"U_ADV_MENU2_2" => append_sid("admin_ug_auth.$phpEx?mode=user"),
		"U_ADV_MENU2_3" => append_sid("admin_ranks.$phpEx"),
		"U_ADV_MENU2_4" => append_sid("admin_users_list.$phpEx"),
		"U_ADV_MENU2_5" => append_sid("admin_mass_email.$phpEx"),

		"U_ADV_MENU3_1" => append_sid("admin_groups.$phpEx"),
		"U_ADV_MENU3_2" => append_sid("admin_ug_auth.$phpEx?mode=group"),

		"U_ADV_MENU4_1" => append_sid("admin_words.$phpEx"),
		"U_ADV_MENU4_2" => append_sid("admin_user_ban.$phpEx"),
		"U_ADV_MENU4_3" => append_sid("admin_disallow.$phpEx"),

		"U_ADV_MENU5_1" => append_sid("admin_attach_cp.$phpEx"),
		"U_ADV_MENU5_2" => append_sid("admin_attachments.$phpEx?mode=manage"),
		"U_ADV_MENU5_3" => append_sid("admin_attachments.$phpEx?mode=quota"),
		"U_ADV_MENU5_4" => append_sid("admin_attachments.$phpEx?mode=shadow"),
		"U_ADV_MENU5_5" => append_sid("admin_attachments.$phpEx?mode=sync"),
		"U_ADV_MENU5_6" => append_sid("admin_extensions.$phpEx?mode=extensions"),
		"U_ADV_MENU5_7" => append_sid("admin_extensions.$phpEx?mode=groups"),
		"U_ADV_MENU5_8" => append_sid("admin_extensions.$phpEx?mode=forbidden"),

		"U_ADV_MENU6_1" => append_sid("admin_db_utilities.$phpEx?perform=backup"),
		"U_ADV_MENU6_2" => append_sid("admin_db_utilities.$phpEx?perform=restore"),

		"U_ADV_MENU7_1" => append_sid("admin_statistics.$phpEx?mode=config"),
		"U_ADV_MENU7_2" => append_sid("admin_statistics.$phpEx?mode=manage"),


		"ADMIN_LANG_CONFIGURATION" => $lang['admin_lang_configuration'],
		"ADMIN_LANG_INDEX_PAGE" => $lang['admin_lang_index_page'],
		"ADMIN_LANG_MAIN" => $lang['admin_lang_main'],
		"ADMIN_LANG_TOP" => $lang['admin_lang_top'],
		"ADMIN_LANG_USERS_LIST" => $lang['admin_lang_users_list'],
		"ADMIN_LANG_GROUP_MANAGEMENT" => $lang['admin_lang_group_management'],
		"ADMIN_LANG_GROUP_PERMISSIONS" => $lang['admin_lang_group_permissions'],
		"ADMIN_LANG_MASS_EMAIL" => $lang['admin_lang_mass_email'],
		"ADMIN_LANG_REGISTER_FIELD" => $lang['admin_lang_register_field'],
		"ADMIN_LANG_CONTROL_PANEL" => $lang['admin_lang_control_panel'],
		"ADMIN_LANG_MANAGEMENT" => $lang['admin_lang_management'],
		"ADMIN_LANG_QUOTA_LIMITS" => $lang['admin_lang_quota_limits'],
		"ADMIN_LANG_SHADOW_ATTACHMENTS" => $lang['admin_lang_shadow_attachments'],
		"ADMIN_LANG_EXTENSION_CONTROL" => $lang['admin_lang_extension_control'],
		"ADMIN_LANG_EXTENSION_GROUPS" => $lang['admin_lang_extension_groups'],
		"ADMIN_LANG_SYNCHRONIZE_ATTACHMENTS" => $lang['admin_lang_synchronize_attachments'],
		"ADMIN_LANG_WORD_CENSORS" => $lang['admin_lang_word_censors'],
		"ADMIN_LANG_FORBIDDEN_EXTENSIONS" => $lang['admin_lang_forbidden_extensions'],
		"ADMIN_LANG_BAN_CONTROL" => $lang['admin_lang_ban_control'],
		"ADMIN_LANG_DISALLOW_NAMES" => $lang['admin_lang_disallow_names'],
		"ADMIN_LANG_BACKUP" => $lang['admin_lang_backup'],
		"ADMIN_LANG_RESTORE" => $lang['admin_lang_restore'],
		"ADMIN_LANG_UPLOAD" => $lang['admin_lang_upload'],
		"ADMIN_LANG_BANNER" => $lang['admin_lang_banner'],
		"ADMIN_LANG_POP_UP" => $lang['admin_lang_pop_up'],
		"ADMIN_LANG_SKIN" => $lang['admin_lang_skin'],
		"ADMIN_LANG_QUICK_LINKS" => $lang['admin_lang_quick_links'],
		"ADMIN_LANG_FAMILY_SITES" => $lang['admin_lang_family_sites'],
		"ADMIN_LANG_LOGO" => $lang['admin_lang_logo'],
		"ADMIN_LANG_IMAGE_SOURCE" => $lang['admin_lang_image_source'],
		"ADMIN_LANG_AGREEMENT" => $lang['admin_lang_agreement'],
		"ADMIN_LANG_EVENT_BOX" => $lang['admin_lang_event_box'],
		"ADMIN_LANG_MINI_BOX" => $lang['admin_lang_mini_box'],
		"ADMIN_LANG_SOUND" => $lang['admin_lang_sound'],

		"L_LOGIN_LOGOUT" => $l_login_logout,
		"L_FORUM_INDEX" => $lang['Main_index'],
		"L_ADMIN_INDEX" => $lang['Admin_Index'], 
		"L_PREVIEW_FORUM" => $lang['Preview_forum'])
	);

	ksort($module);

	while( list($cat, $action_array) = each($module) )
	{
		$cat = ( !empty($lang[$cat]) ) ? $lang[$cat] : preg_replace("/_/", " ", $cat);

		$template->assign_block_vars("catrow", array(
			"ADMIN_CATEGORY" => $cat)
		);

		ksort($action_array);

		$row_count = 0;
		while( list($action, $file)	= each($action_array) )
		{
			$row_color = ( !($row_count%2) ) ? $theme['td_color1'] : $theme['td_color2'];
			$row_class = ( !($row_count%2) ) ? $theme['td_class1'] : $theme['td_class2'];

			$action = ( !empty($lang[$action]) ) ? $lang[$action] : preg_replace("/_/", " ", $action);

			$template->assign_block_vars("catrow.modulerow", array(
				"ROW_COLOR" => "#" . $row_color,
				"ROW_CLASS" => $row_class, 

				"ADMIN_MODULE" => $action,
				"U_ADMIN_MODULE" => append_sid($file))
			);
			$row_count++;
		}
	}

	$template->pparse("body");

	include('./page_footer_admin.'.$phpEx);
}
elseif( isset($HTTP_GET_VARS['pane']) && $HTTP_GET_VARS['pane'] == 'right' )
{

	include('./page_header_admin.'.$phpEx);

	$template->set_filenames(array(
		"body" => "admin/index_body.tpl")
	);

	$template->assign_vars(array(
		"L_WELCOME" => $lang['Welcome_phpBB'],
		"L_ADMIN_INTRO" => $lang['Admin_intro'],
		"L_FORUM_STATS" => $lang['Forum_stats'],
		"L_WHO_IS_ONLINE" => $lang['Who_is_Online'],
		"L_USERNAME" => $lang['Username'],
		"L_LOCATION" => $lang['Location'],
		"L_LAST_UPDATE" => $lang['Last_updated'],
		"L_IP_ADDRESS" => $lang['IP_Address'],
		"L_STATISTIC" => $lang['Statistic'],
		"L_VALUE" => $lang['Value'],
		"L_NUMBER_POSTS" => $lang['Number_posts'],
		"L_POSTS_PER_DAY" => $lang['Posts_per_day'],
		"L_NUMBER_TOPICS" => $lang['Number_topics'],
		"L_TOPICS_PER_DAY" => $lang['Topics_per_day'],
		"L_NUMBER_USERS" => $lang['Number_users'],
		"L_USERS_PER_DAY" => $lang['Users_per_day'],
		"L_BOARD_STARTED" => $lang['Board_started'],
		"L_AVATAR_DIR_SIZE" => $lang['Avatar_dir_size'],
		"L_DB_SIZE" => $lang['Database_size'], 
		"L_FORUM_LOCATION" => $lang['Forum_Location'],
		"L_STARTED" => $lang['Login'],
		"L_GZIP_COMPRESSION" => $lang['Gzip_compression'])
	);

	//
	// Get forum statistics
	//
	$total_posts = get_db_stat('postcount');
	$total_users = get_db_stat('usercount');
	$total_topics = get_db_stat('topiccount');

	$start_date = create_date($board_config['default_dateformat'], $board_config['board_startdate'], $board_config['board_timezone']);

	$boarddays = ( time() - $board_config['board_startdate'] ) / 86400;

	$posts_per_day = sprintf("%.2f", $total_posts / $boarddays);
	$topics_per_day = sprintf("%.2f", $total_topics / $boarddays);
	$users_per_day = sprintf("%.2f", $total_users / $boarddays);

	$avatar_dir_size = 0;

	if ($avatar_dir = @opendir($phpbb_root_path . $board_config['avatar_path']))
	{
		while( $file = @readdir($avatar_dir) )
		{
			if( $file != "." && $file != ".." )
			{
				$avatar_dir_size += @filesize($phpbb_root_path . $board_config['avatar_path'] . "/" . $file);
			}
		}
		@closedir($avatar_dir);

		//
		// This bit of code translates the avatar directory size into human readable format
		// Borrowed the code from the PHP.net annoted manual, origanally written by:
		// Jesse (jesse@jess.on.ca)
		//
		if($avatar_dir_size >= 1048576)
		{
			$avatar_dir_size = round($avatar_dir_size / 1048576 * 100) / 100 . " MB";
		}
		else if($avatar_dir_size >= 1024)
		{
			$avatar_dir_size = round($avatar_dir_size / 1024 * 100) / 100 . " KB";
		}
		else
		{
			$avatar_dir_size = $avatar_dir_size . " Bytes";
		}

	}
	else
	{
		// Couldn't open Avatar dir.
		$avatar_dir_size = $lang['Not_available'];
	}

	if($posts_per_day > $total_posts)
	{
		$posts_per_day = $total_posts;
	}

	if($topics_per_day > $total_topics)
	{
		$topics_per_day = $total_topics;
	}

	if($users_per_day > $total_users)
	{
		$users_per_day = $total_users;
	}

	//
	// DB size ... MySQL only
	//
	// This code is heavily influenced by a similar routine
	// in phpMyAdmin 2.2.0
	//
	if( preg_match("/^mysql/", SQL_LAYER) )
	{
		$sql = "SELECT VERSION() AS mysql_version";
		if($result = $db->sql_query($sql))
		{
			$row = $db->sql_fetchrow($result);
			$version = $row['mysql_version'];

			if( preg_match("/^(3\.23|4\.)/", $version) )
			{
				$db_name = ( preg_match("/^(3\.23\.[6-9])|(3\.23\.[1-9][1-9])|(4\.)/", $version) ) ? "`$dbname`" : $dbname;

				$sql = "SHOW TABLE STATUS 
					FROM " . $db_name;
				if($result = $db->sql_query($sql))
				{
					$tabledata_ary = $db->sql_fetchrowset($result);

					$dbsize = 0;
					for($i = 0; $i < count($tabledata_ary); $i++)
					{
						if( $tabledata_ary[$i]['Type'] != "MRG_MyISAM" )
						{
							if( $table_prefix != "" )
							{
								if( strstr($tabledata_ary[$i]['Name'], $table_prefix) )
								{
									$dbsize += $tabledata_ary[$i]['Data_length'] + $tabledata_ary[$i]['Index_length'];
								}
							}
							else
							{
								$dbsize += $tabledata_ary[$i]['Data_length'] + $tabledata_ary[$i]['Index_length'];
							}
						}
					}
				} // Else we couldn't get the table status.
			}
			else
			{
				$dbsize = $lang['Not_available'];
			}
		}
		else
		{
			$dbsize = $lang['Not_available'];
		}
	}
	else if( preg_match("/^mssql/", SQL_LAYER) )
	{
		$sql = "SELECT ((SUM(size) * 8.0) * 1024.0) as dbsize 
			FROM sysfiles"; 
		if( $result = $db->sql_query($sql) )
		{
			$dbsize = ( $row = $db->sql_fetchrow($result) ) ? intval($row['dbsize']) : $lang['Not_available'];
		}
		else
		{
			$dbsize = $lang['Not_available'];
		}
	}
	else
	{
		$dbsize = $lang['Not_available'];
	}

	if ( is_integer($dbsize) )
	{
		if( $dbsize >= 1048576 )
		{
			$dbsize = sprintf("%.2f MB", ( $dbsize / 1048576 ));
		}
		else if( $dbsize >= 1024 )
		{
			$dbsize = sprintf("%.2f KB", ( $dbsize / 1024 ));
		}
		else
		{
			$dbsize = sprintf("%.2f Bytes", $dbsize);
		}
	}

	$template->assign_vars(array(
		"NUMBER_OF_POSTS" => $total_posts,
		"NUMBER_OF_TOPICS" => $total_topics,
		"NUMBER_OF_USERS" => $total_users,
		"START_DATE" => $start_date,
		"POSTS_PER_DAY" => $posts_per_day,
		"TOPICS_PER_DAY" => $topics_per_day,
		"USERS_PER_DAY" => $users_per_day,
		"AVATAR_DIR_SIZE" => $avatar_dir_size,
		"DB_SIZE" => $dbsize, 
		"GZIP_COMPRESSION" => ( $board_config['gzip_compress'] ) ? $lang['ON'] : $lang['OFF'])
	);
	//
	// End forum statistics
	//

	//
	// Get users online information.
	//
	$sql = "SELECT u.user_id, u.username, u.user_session_time, u.user_session_page, s.session_logged_in, s.session_ip, s.session_start 
		FROM " . USERS_TABLE . " u, " . SESSIONS_TABLE . " s
		WHERE s.session_logged_in = " . TRUE . " 
			AND u.user_id = s.session_user_id 
			AND u.user_id <> " . ANONYMOUS . " 
			AND u.user_session_time >= " . ( time() - 300 ) . " 
		ORDER BY u.user_session_time DESC";
	if(!$result = $db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, "Couldn't obtain regd user/online information.", "", __LINE__, __FILE__, $sql);
	}
	$onlinerow_reg = $db->sql_fetchrowset($result);

	$sql = "SELECT session_page, session_logged_in, session_time, session_ip, session_start   
		FROM " . SESSIONS_TABLE . "
		WHERE session_logged_in = 0
			AND session_time >= " . ( time() - 300 ) . "
		ORDER BY session_time DESC";
	if(!$result = $db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, "Couldn't obtain guest user/online information.", "", __LINE__, __FILE__, $sql);
	}
	$onlinerow_guest = $db->sql_fetchrowset($result);

	$sql = "SELECT forum_name, forum_id
		FROM " . FORUMS_TABLE;
	if($forums_result = $db->sql_query($sql))
	{
		while($forumsrow = $db->sql_fetchrow($forums_result))
		{
			$forum_data[$forumsrow['forum_id']] = $forumsrow['forum_name'];
		}
	}
	else
	{
		message_die(GENERAL_ERROR, "Couldn't obtain user/online forums information.", "", __LINE__, __FILE__, $sql);
	}

	$reg_userid_ary = array();

	if( count($onlinerow_reg) )
	{
		$registered_users = 0;

		for($i = 0; $i < count($onlinerow_reg); $i++)
		{
			if( !inarray($onlinerow_reg[$i]['user_id'], $reg_userid_ary) )
			{
				$reg_userid_ary[] = $onlinerow_reg[$i]['user_id'];

				$username = $onlinerow_reg[$i]['username'];

				if( $onlinerow_reg[$i]['user_allow_viewonline'] || $userdata['user_level'] == ADMIN )
				{
					$registered_users++;
					$hidden = FALSE;
				}
				else
				{
					$hidden_users++;
					$hidden = TRUE;
				}

				if( $onlinerow_reg[$i]['user_session_page'] < 1 )
				{
					switch($onlinerow_reg[$i]['user_session_page'])
					{
						case PAGE_INDEX:
							$location = $lang['Forum_index'];
							$location_url = "index.$phpEx?pane=right";
							break;
						case PAGE_POSTING:
							$location = $lang['Posting_message'];
							$location_url = "index.$phpEx?pane=right";
							break;
						case PAGE_LOGIN:
							$location = $lang['Logging_on'];
							$location_url = "index.$phpEx?pane=right";
							break;
						case PAGE_SEARCH:
							$location = $lang['Searching_forums'];
							$location_url = "index.$phpEx?pane=right";
							break;
						case PAGE_PROFILE:
							$location = $lang['Viewing_profile'];
							$location_url = "index.$phpEx?pane=right";
							break;
						case PAGE_VIEWONLINE:
							$location = $lang['Viewing_online'];
							$location_url = "index.$phpEx?pane=right";
							break;
						case PAGE_VIEWMEMBERS:
							$location = $lang['Viewing_member_list'];
							$location_url = "index.$phpEx?pane=right";
							break;
						case PAGE_PRIVMSGS:
							$location = $lang['Viewing_priv_msgs'];
							$location_url = "index.$phpEx?pane=right";
							break;
						case PAGE_FAQ:
							$location = $lang['Viewing_FAQ'];
							$location_url = "index.$phpEx?pane=right";
							break;
						case PAGE_ALBUM:
							$location = $lang['Album'];
							$location_url = "index.$phpEx?pane=right";
							break;
						default:
							$location = $lang['Forum_index'];
							$location_url = "index.$phpEx?pane=right";
					}
				}
				else
				{
					$location_url = append_sid("admin_forums.$phpEx?mode=editforum&amp;" . POST_FORUM_URL . "=" . $onlinerow_reg[$i]['user_session_page']);
					$location = $forum_data[$onlinerow_reg[$i]['user_session_page']];
				}

				$row_color = ( $registered_users % 2 ) ? $theme['td_color1'] : $theme['td_color2'];
				$row_class = ( $registered_users % 2 ) ? $theme['td_class1'] : $theme['td_class2'];

				$reg_ip = decode_ip($onlinerow_reg[$i]['session_ip']);

				$template->assign_block_vars("reg_user_row", array(
					"ROW_COLOR" => "#" . $row_color,
					"ROW_CLASS" => $row_class,
					"USERNAME" => $username, 
					"STARTED" => create_date($board_config['default_dateformat'], $onlinerow_reg[$i]['session_start'], $board_config['board_timezone']), 
					"LASTUPDATE" => create_date($board_config['default_dateformat'], $onlinerow_reg[$i]['user_session_time'], $board_config['board_timezone']),
					"FORUM_LOCATION" => $location,
					"IP_ADDRESS" => $reg_ip, 

					"U_WHOIS_IP" => "http://network-tools.com/default.asp?host=$reg_ip", 
					"U_USER_PROFILE" => append_sid("admin_users.$phpEx?mode=edit&amp;" . POST_USERS_URL . "=" . $onlinerow_reg[$i]['user_id']),
					"U_FORUM_LOCATION" => append_sid($location_url))
				);
			}
		}

	}
	else
	{
		$template->assign_vars(array(
			"L_NO_REGISTERED_USERS_BROWSING" => $lang['No_users_browsing'])
		);
	}

	//
	// Guest users
	//
	if( count($onlinerow_guest) )
	{
		$guest_users = 0;

		for($i = 0; $i < count($onlinerow_guest); $i++)
		{
			$guest_userip_ary[] = $onlinerow_guest[$i]['session_ip'];
			$guest_users++;

			if( $onlinerow_guest[$i]['session_page'] < 1 )
			{
				switch( $onlinerow_guest[$i]['session_page'] )
				{
					case PAGE_INDEX:
						$location = $lang['Forum_index'];
						$location_url = "index.$phpEx?pane=right";
						break;
					case PAGE_POSTING:
						$location = $lang['Posting_message'];
						$location_url = "index.$phpEx?pane=right";
						break;
					case PAGE_LOGIN:
						$location = $lang['Logging_on'];
						$location_url = "index.$phpEx?pane=right";
						break;
					case PAGE_SEARCH:
						$location = $lang['Searching_forums'];
						$location_url = "index.$phpEx?pane=right";
						break;
					case PAGE_PROFILE:
						$location = $lang['Viewing_profile'];
						$location_url = "index.$phpEx?pane=right";
						break;
					case PAGE_VIEWONLINE:
						$location = $lang['Viewing_online'];
						$location_url = "index.$phpEx?pane=right";
						break;
					case PAGE_VIEWMEMBERS:
						$location = $lang['Viewing_member_list'];
						$location_url = "index.$phpEx?pane=right";
						break;
					case PAGE_PRIVMSGS:
						$location = $lang['Viewing_priv_msgs'];
						$location_url = "index.$phpEx?pane=right";
						break;
					case PAGE_FAQ:
						$location = $lang['Viewing_FAQ'];
						$location_url = "index.$phpEx?pane=right";
						break;
					default:
						$location = $lang['Forum_index'];
						$location_url = "index.$phpEx?pane=right";
				}
			}
			else
			{
				$location_url = append_sid("admin_forums.$phpEx?mode=editforum&amp;" . POST_FORUM_URL . "=" . $onlinerow_guest[$i]['session_page']);
				$location = $forum_data[$onlinerow_guest[$i]['session_page']];
			}

			$row_color = ( $guest_users % 2 ) ? $theme['td_color1'] : $theme['td_color2'];
			$row_class = ( $guest_users % 2 ) ? $theme['td_class1'] : $theme['td_class2'];

			$guest_ip = decode_ip($onlinerow_guest[$i]['session_ip']);

			$template->assign_block_vars("guest_user_row", array(
				"ROW_COLOR" => "#" . $row_color,
				"ROW_CLASS" => $row_class,
				"USERNAME" => $lang['Guest'],
				"STARTED" => create_date($board_config['default_dateformat'], $onlinerow_guest[$i]['session_start'], $board_config['board_timezone']), 
				"LASTUPDATE" => create_date($board_config['default_dateformat'], $onlinerow_guest[$i]['session_time'], $board_config['board_timezone']),
				"FORUM_LOCATION" => $location,
				"IP_ADDRESS" => $guest_ip, 

				"U_WHOIS_IP" => "http://network-tools.com/default.asp?host=$guest_ip", 
				"U_FORUM_LOCATION" => append_sid($location_url))
			);
		}

	}
	else
	{
		$template->assign_vars(array(
			"L_NO_GUESTS_BROWSING" => $lang['No_users_browsing'])
		);
	}

	$template->pparse("body");

	include('./page_footer_admin.'.$phpEx);

}
elseif( isset($HTTP_GET_VARS['pane']) && $HTTP_GET_VARS['pane'] == 'top' )
{

	include('./page_header_admin.'.$phpEx);

	$template->set_filenames(array(
		"body" => "admin/index_top.tpl")
	);


	$u_login_logout = append_sid("../login.$phpEx?logout=true", true);
	$l_login_logout = $lang['Logout'] . ' [ ' . $userdata['username'] . ' ]';

	$template->assign_vars(array(
		"U_FORUM_INDEX" => append_sid("../portal.$phpEx"),
		"U_ADMIN_INDEX" => append_sid("index.$phpEx?pane=right"),
		"U_LOGIN_LOGOUT" => $u_login_logout,
		"U_ENGLISH" => append_sid("../../english/admin/index.$phpEx"),

		"U_PREVIEW_MULTI" => append_sid("../index.$phpEx"),
		
		"L_LOGIN_LOGOUT" => $l_login_logout,
		"L_FORUM_INDEX" => $lang['Main_index'],
		"L_ADMIN_INDEX" => $lang['Admin_Index'], 
		"L_PREVIEW_FORUM" => $lang['Preview_forum'])
	);

	$template->pparse("body");

	include('./page_footer_admin.'.$phpEx);
}
else
{
	//
	// Generate frameset
	//
	$template->set_filenames(array(
		"body" => "admin/index_frameset.tpl")
	);

	$template->assign_vars(array(
		'SITENAME' => $board_config['sitename'],
		'S_CONTENT_DIRECTION' => $lang['DIRECTION'], 
		'S_CONTENT_ENCODING' => $lang['ENCODING'], 
		"S_FRAME_NAV" => append_sid("index.$phpEx?pane=left"),
		"S_FRAME_TOP" => append_sid("index.$phpEx?pane=top"),
		"S_FRAME_MAIN" => append_sid("index.$phpEx?pane=right"))
	);

	header ("Expires: " . gmdate("D, d M Y H:i:s", time()) . " GMT");
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

	$template->pparse("body");

	$db->sql_close();
	exit;

}

?>