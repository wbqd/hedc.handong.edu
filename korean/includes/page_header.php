<?php
/***************************************************************************
 *                              page_header.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: page_header.php,v 1.106.2.20 2003/06/10 20:48:19 acydburn Exp $
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

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}

define('HEADER_INC', TRUE);

//
// gzip_compression
//
$do_gzip_compress = FALSE;
if ( $board_config['gzip_compress'] )
{
	$phpver = phpversion();

	$useragent = (isset($_SERVER["HTTP_USER_AGENT"]) ) ? $_SERVER["HTTP_USER_AGENT"] : $HTTP_USER_AGENT;

	if ( $phpver >= '4.0.4pl1' && ( strstr($useragent,'compatible') || strstr($useragent,'Gecko') ) )
	{
		if ( extension_loaded('zlib') )
		{
			ob_start('ob_gzhandler');
		}
	}
	else if ( $phpver > '4.0' )
	{
		if ( strstr($HTTP_SERVER_VARS['HTTP_ACCEPT_ENCODING'], 'gzip') )
		{
			if ( extension_loaded('zlib') )
			{
				$do_gzip_compress = TRUE;
				ob_start();
				ob_implicit_flush(0);

				header('Content-Encoding: gzip');
			}
		}
	}
}

//
// Parse and show the overall header.
//
$template->set_filenames(array(
	'overall_header' => ( empty($gen_simple_header) ) ? 'overall_header.tpl' : (($gen_simple_header < 0) ? 'popup_header.tpl' : 'simple_header.tpl') )
);

//
// Generate logged in/logged out status
//
if ( $userdata['session_logged_in'] )
{
	$u_login_logout = 'login.'.$phpEx.'?logout=true&amp;sid=' . $userdata['session_id'];
	$l_login_logout = $lang['Logout'] . ' [ ' . $userdata['username'] . ' ]';
}
else
{
	$u_login_logout = 'login.'.$phpEx;
	$l_login_logout = $lang['Login'];
}

$s_last_visit = ( $userdata['session_logged_in'] ) ? create_date($board_config['default_dateformat'], $userdata['user_lastvisit'], $board_config['board_timezone']) : '';

//
// Get basic (usernames + totals) online
// situation
//
$logged_visible_online = 0;
$logged_hidden_online = 0;
$guests_online = 0;
$online_userlist = '';

if (defined('SHOW_ONLINE'))
{

	$user_forum_sql = ( !empty($forum_id) ) ? "AND s.session_page = " . intval($forum_id) : '';
	$sql = "SELECT u.username, u.user_id, u.user_allow_viewonline, u.user_level, s.session_logged_in, s.session_ip
		FROM ".USERS_TABLE." u, ".SESSIONS_TABLE." s
		WHERE u.user_id = s.session_user_id
			AND s.session_time >= ".( time() - 300 ) . "
			$user_forum_sql
		ORDER BY u.username ASC, s.session_ip ASC";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not obtain user/online information', '', __LINE__, __FILE__, $sql);
	}

	$userlist_ary = array();
	$userlist_visible = array();

	$prev_user_id = 0;
	$prev_user_ip = '';

	while( $row = $db->sql_fetchrow($result) )
	{
		// User is logged in and therefor not a guest
		if ( $row['session_logged_in'] )
		{
			// Skip multiple sessions for one user
			if ( $row['user_id'] != $prev_user_id )
			{
				$style_color = '';
				if ( $row['user_level'] == ADMIN )
				{
					$row['username'] = '<b>' . $row['username'] . '</b>';
					$style_color = 'style="color:#' . $theme['fontcolor3'] . '"';
				}
				else if ( $row['user_level'] == MOD )
				{
					$row['username'] = '<b>' . $row['username'] . '</b>';
					$style_color = 'style="color:#' . $theme['fontcolor2'] . '"';
				}

				if ( $row['user_allow_viewonline'] )
				{
					$user_online_link = '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $row['user_id']) . '"' . $style_color .'>' . $row['username'] . '</a>';
					$logged_visible_online++;
				}
				else
				{
					$user_online_link = '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $row['user_id']) . '"' . $style_color .'><i>' . $row['username'] . '</i></a>';
					$logged_hidden_online++;
				}

				if ( $row['user_allow_viewonline'] || $userdata['user_level'] == ADMIN )
				{
					$online_userlist .= ( $online_userlist != '' ) ? ', ' . $user_online_link : $user_online_link;
				}
			}

			$prev_user_id = $row['user_id'];
		}
		else
		{
			// Skip multiple sessions for one user
			if ( $row['session_ip'] != $prev_session_ip )
			{
				$guests_online++;
			}
		}

		$prev_session_ip = $row['session_ip'];
	}
	$db->sql_freeresult($result);

	if ( empty($online_userlist) )
	{
		$online_userlist = $lang['None'];
	}
	$online_userlist = ( ( isset($forum_id) ) ? $lang['Browsing_forum'] : $lang['Registered_users'] ) . ' ' . $online_userlist;

	$total_online_users = $logged_visible_online + $logged_hidden_online + $guests_online;

	if ( $total_online_users > $board_config['record_online_users'])
	{
		$board_config['record_online_users'] = $total_online_users;
		$board_config['record_online_date'] = time();

		$sql = "UPDATE " . CONFIG_TABLE . "
			SET config_value = '$total_online_users'
			WHERE config_name = 'record_online_users'";
		if ( !$db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, 'Could not update online user record (nr of users)', '', __LINE__, __FILE__, $sql);
		}

		$sql = "UPDATE " . CONFIG_TABLE . "
			SET config_value = '" . $board_config['record_online_date'] . "'
			WHERE config_name = 'record_online_date'";
		if ( !$db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, 'Could not update online user record (date)', '', __LINE__, __FILE__, $sql);
		}
	}

	if ( $total_online_users == 0 )
	{
		$l_t_user_s = $lang['Online_users_zero_total'];
	}
	else if ( $total_online_users == 1 )
	{
		$l_t_user_s = $lang['Online_user_total'];
	}
	else
	{
		$l_t_user_s = $lang['Online_users_total'];
	}

	if ( $logged_visible_online == 0 )
	{
		$l_r_user_s = $lang['Reg_users_zero_total'];
	}
	else if ( $logged_visible_online == 1 )
	{
		$l_r_user_s = $lang['Reg_user_total'];
	}
	else
	{
		$l_r_user_s = $lang['Reg_users_total'];
	}

	if ( $logged_hidden_online == 0 )
	{
		$l_h_user_s = $lang['Hidden_users_zero_total'];
	}
	else if ( $logged_hidden_online == 1 )
	{
		$l_h_user_s = $lang['Hidden_user_total'];
	}
	else
	{
		$l_h_user_s = $lang['Hidden_users_total'];
	}

	if ( $guests_online == 0 )
	{
		$l_g_user_s = $lang['Guest_users_zero_total'];
	}
	else if ( $guests_online == 1 )
	{
		$l_g_user_s = $lang['Guest_user_total'];
	}
	else
	{
		$l_g_user_s = $lang['Guest_users_total'];
	}

	$l_online_users = sprintf($l_t_user_s, $total_online_users);
	//$l_online_users .= sprintf($l_r_user_s, $logged_visible_online);
	//$l_online_users .= sprintf($l_h_user_s, $logged_hidden_online);
	//$l_online_users .= sprintf($l_g_user_s, $guests_online);
}

//
// Obtain number of new private messages
// if user is logged in
//
if ( ($userdata['session_logged_in']) && (empty($gen_simple_header)) )
{
	if ( $userdata['user_new_privmsg'] )
	{
		$l_message_new = ( $userdata['user_new_privmsg'] == 1 ) ? $lang['New_pm'] : $lang['New_pms'];
		$l_privmsgs_text = sprintf($l_message_new, $userdata['user_new_privmsg']);

		if ( $userdata['user_last_privmsg'] > $userdata['user_lastvisit'] )
		{
			$sql = "UPDATE " . USERS_TABLE . "
				SET user_last_privmsg = " . $userdata['user_lastvisit'] . "
				WHERE user_id = " . $userdata['user_id'];
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not update private message new/read time for user', '', __LINE__, __FILE__, $sql);
			}

			$s_privmsg_new = 1;
			$icon_pm = $images['pm_new_msg'];
		}
		else
		{
			$s_privmsg_new = 0;
			$icon_pm = $images['pm_new_msg'];
		}
	}
	else
	{
		$l_privmsgs_text = $lang['No_new_pm'];

		$s_privmsg_new = 0;
		$icon_pm = $images['pm_no_new_msg'];
	}

	if ( $userdata['user_unread_privmsg'] )
	{
		$l_message_unread = ( $userdata['user_unread_privmsg'] == 1 ) ? $lang['Unread_pm'] : $lang['Unread_pms'];
		$l_privmsgs_text_unread = sprintf($l_message_unread, $userdata['user_unread_privmsg']);
	}
	else
	{
		$l_privmsgs_text_unread = $lang['No_unread_pm'];
	}
}
else
{
	$icon_pm = $images['pm_no_new_msg'];
	$l_privmsgs_text = $lang['Login_check_pm'];
	$l_privmsgs_text_unread = '';
	$s_privmsg_new = 0;
}

//
// Generate HTML required for Mozilla Navigation bar
//
if (!isset($nav_links))
{
	$nav_links = array();
}

$nav_links_html = '';
$nav_link_proto = '<link rel="%s" href="%s" title="%s" />' . "\n";
while( list($nav_item, $nav_array) = @each($nav_links) )
{
	if ( !empty($nav_array['url']) )
	{
		$nav_links_html .= sprintf($nav_link_proto, $nav_item, append_sid($nav_array['url']), $nav_array['title']);
	}
	else
	{
		// We have a nested array, used for items like <link rel='chapter'> that can occur more than once.
		while( list(,$nested_array) = each($nav_array) )
		{
			$nav_links_html .= sprintf($nav_link_proto, $nav_item, $nested_array['url'], $nested_array['title']);
		}
	}
}

$admin_link = ( $userdata['user_level'] == ADMIN ) ? '<a href="admin/index.' . $phpEx . '?sid=' . $userdata['session_id'] . '">' . $lang['Admin_panel'] . '</a><br /><br />' : '';

// Format Timezone. We are unable to use array_pop here, because of PHP3 compatibility
$l_timezone = explode('.', $board_config['board_timezone']);
$l_timezone = (count($l_timezone) > 1 && $l_timezone[count($l_timezone)-1] != 0) ? $lang[sprintf('%.1f', $board_config['board_timezone'])] : $lang[number_format($board_config['board_timezone'])];
//
// The following assigns all _common_ variables that may be used at any point
// in a template.
//
$pub_img = array(
   '',
   '',
   $lang['Male'],
   $lang['Female'],
);

// Check For Anonymous User
if ($userdata['user_id'] != '-1')
{
	$name_link = '<a href="' . append_sid("profile.$phpEx?mode=editprofile&amp;" . $userdata['user_id']) . '">' . $userdata['username'] . '</a>';
}
else
{
	$name_link = $lang['Guest'];
}

//////////////////////////////////////
//-- mod : qbar ------------------------------------------------------------------------------------
//-- add
include( $phpbb_root_path . 'includes/functions_qbar.' . $phpEx);
qbar_display_qbars(empty($gen_simple_header));
//-- fin mod : qbar --------------------------------------------------------------------------------

$preload_imgs = array();

$menu_imgs = array();

while(is_array($qbar_maps['MainMenu']['fields']) && $tempfield = each($qbar_maps['MainMenu']['fields'])) {
	$menu_imgs[] = $images[$tempfield['value']['icon2']];
}

$editor_imgs = array();

$preload_imgs = array_merge($menu_imgs,$editor_imgs);

$preload_img_list = implode("', '",$preload_imgs); 

$preload_img_list = "'".$preload_img_list."'";

//////////////////////////////////////

//print_r($preload_img_list);

//
// Avatar On Index MOD
//
$avatar_img = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_path'] . '/default.jpg" alt="" border="0" />' : '';
if ( $userdata['user_avatar_type'] && $userdata['user_allowavatar'] )
{
	switch( $userdata['user_avatar_type'] )
	{
		case USER_AVATAR_UPLOAD:
			$avatar_img = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $userdata['user_avatar'] . '" alt="" border="0" />' : '';
			break;
		case USER_AVATAR_REMOTE:
			$avatar_img = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $userdata['user_avatar'] . '" alt="" border="0" />' : '';
			break;
		case USER_AVATAR_GALLERY:
			$avatar_img = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $userdata['user_avatar'] . '" alt="" border="0" />' : '';
			break;
	}
}

//
// Get Flash-INFO
//

$sql = "SELECT d.width, d.height, d.border, d.attach_id, d.physical_filename, d.real_filename, d.download_count, d.comment, d.filesize, d.thumbnail, d.filetime, p.post_id, p.post_username, p.post_time, u.username, u.user_id, t.topic_title, t.forum_id
	FROM " . ATTACHMENTS_TABLE . " a, " . ATTACHMENTS_DESC_TABLE . " d, " . POSTS_TABLE . " p, " . USERS_TABLE . " u, " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f
	WHERE (d.attach_id = a.attach_id) AND (a.post_id = p.post_id) AND (p.poster_id = u.user_id) AND (p.topic_id = t.topic_id) AND (a.privmsgs_id = 0)  AND (p.forum_id = f.forum_id) AND (f.forum_id = 49) 
	ORDER BY p.post_id DESC LIMIT 0,1";

if (!$result = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, 'Could not query flash-backimage information', '', __LINE__, __FILE__, $sql);
}

$imageInfo = $db->sql_fetchrow($result);


$imageBox = $imageInfo['physical_filename'];


$sql = "SELECT d.width, d.height, d.border, d.attach_id, d.physical_filename, d.real_filename, d.download_count, d.comment, d.filesize, d.thumbnail, d.filetime, p.post_id, p.post_username, p.post_time, u.username, u.user_id, t.topic_title, t.forum_id, pt.remark1, pt.remark2, pt.remark3, pt.remark4, pt.remark5
	FROM " . ATTACHMENTS_TABLE . " a, " . ATTACHMENTS_DESC_TABLE . " d, " . POSTS_TABLE . " p, " . USERS_TABLE . " u, " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f, " . POSTS_TEXT_TABLE . " pt 
	WHERE (d.attach_id = a.attach_id) AND (a.post_id = p.post_id) AND (p.poster_id = u.user_id) AND (p.topic_id = t.topic_id) AND (a.privmsgs_id = 0) AND (p.forum_id = f.forum_id) AND (f.forum_id = 73) AND (pt.post_id = p.post_id) 
	ORDER BY p.post_id DESC LIMIT 0,1";

if (!$result = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, 'Could not query flash-backimage information', '', __LINE__, __FILE__, $sql);
}

$textInfo = $db->sql_fetchrow($result);


$textBox = $textInfo['physical_filename'];
$textBox_x = $textInfo['remark1'];
$textBox_y = $textInfo['remark2'];

###############################################

//
// Get Theme-INFO
//

$sql = "SELECT pt.post_subject, pt.remark1, pt.remark2, pt.remark3, pt.remark4, pt.remark5, pt.post_text
	FROM "  . POSTS_TABLE . " p, " . POSTS_TEXT_TABLE . " pt 
	WHERE (p.forum_id = 88) AND (pt.post_id = p.post_id) 
	";

if (!$result = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, 'Could not query flash-backimage information', '', __LINE__, __FILE__, $sql);
}

$themeRow = array();
while ($row = $db->sql_fetchrow($result))
{
	$themeRow[] = $row;
}

$infoRow = array();
for ($i = 0; $i < count($themeRow); $i++)
{
	$infoKey = strtolower($themeRow[$i]['post_subject']);
	$infoRow[$infoKey]['themeColor'] = $themeRow[$i]['remark2'] ;

}

###############################################

$sd_field = $qbar_maps['MainMenu']['fields'];
$sd_menu = array();
$sd_found = false;
$currentMenu = "index";

for ($i=0; ( ($i < count($fids)) && !$sd_found && is_array($sd_field)); $i++) {
	
	$sd_key = $fids[$i];

	reset($sd_field);
	
	while (!$sd_found && ($sd_menu = @each($sd_field)))
	{			

		
		$temp1 = explode("?",$sd_menu['value']['url']);
		$temp2 = explode("&",$temp1[1]);
		$temp3 = explode("=",$temp2[0]);				

		$sd_id = $temp3[0].$temp3[1];		
		
		if($sd_key == $sd_id){
			$sd_found = true;
			$currentMenu = $sd_menu['key'];
			$main_id = substr($sd_menu['value']['tree_id'],1);
		}
	}
}

if(isset($HTTP_GET_VARS['printable'])) {
	$infoRow[$currentMenu]['themeColor'] = "#333333";
}

###############################################
//
// Get Extra-list : modified
//

$extra_no = 1;
$forum_no = 64;
$title_length = 2000;
$use_attach = true;

$attach_sql_1 = "";
$attach_sql_2 = "";
$attach_sql_3 = "";
if($use_attach){
	$attach_sql_1 = "d.width, d.height, d.border, d.attach_id, d.physical_filename, d.real_filename, d.download_count, d.comment, d.filesize, d.thumbnail, d.filetime,";
	$attach_sql_2 = ATTACHMENTS_TABLE . " a, " . ATTACHMENTS_DESC_TABLE . " d, ";
	$attach_sql_3 = "(d.attach_id = a.attach_id) AND (a.post_id = p.post_id) AND (d.width > 0) AND (a.privmsgs_id = 0) AND ";
}


$sql = "SELECT ". $attach_sql_1 ." p.post_id, p.post_username, p.post_time, t.topic_id, t.topic_title, t.topic_time, t.forum_id, pt.remark1, pt.remark2, pt.remark3, pt.remark4, pt.remark5, pt.remark6, pt.remark7, pt.remark8, pt.remark9, pt.remark10, pt.remark11, pt.remark12, pt.remark13, pt.remark14, pt.remark15,  pt.post_text, u.user_id, u.username   
		FROM ". $attach_sql_2 . POSTS_TABLE . " p, " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f, " . POSTS_TEXT_TABLE . " pt, " . USERS_TABLE . " AS u 
		WHERE  ". $attach_sql_3. " (p.post_id = t.topic_first_post_id) AND (p.forum_id = f.forum_id) AND pt.post_id = p.post_id AND (p.poster_id = u.user_id)  AND (p.forum_id = 193)  
		ORDER BY p.post_id ASC LIMIT 0, 6";

if (!$result = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, 'Could not query Extra information', '', __LINE__, __FILE__, $sql);
}



$extra_row = array();
while ($row = $db->sql_fetchrow($result))
{
	$extra_row[] = $row;
}

for ($i = 0; $i < count($extra_row); $i++)
{
	if($extra_row[$i]['thumbnail'] == 1) {
		$extra_row[$i]['thumbnail'] = $upload_dir . '/' . ( ($extra_row[$i]['thumbnail']) ? THUMB_DIR . '/t_' : '' ) . $extra_row[$i]['physical_filename'];		
	}
	else {
		$extra_row[$i]['thumbnail'] = "templates/".$theme['template_name']."/images/default_thumbnail.jpg";
	}

	$extra_row[$i]['full_img'] = $upload_dir . '/' . $extra_row[$i]['physical_filename'];	

	$size = image_getdimension($extra_row[$i]['thumbnail']);

	$thumb_width = $size[0];
	$thumb_height = $size[1];

	if(strstr($extra_row[$i]['remark1'], '|')) list($dump,$extra_row[$i]['remark1']) = explode("|",$extra_row[$i]['remark1']);
	if(strstr($extra_row[$i]['remark2'], '|')) list($dump,$extra_row[$i]['remark2']) = explode("|",$extra_row[$i]['remark2']);
	if(strstr($extra_row[$i]['remark3'], '|')) list($dump,$extra_row[$i]['remark3']) = explode("|",$extra_row[$i]['remark3']);
	if(strstr($extra_row[$i]['remark4'], '|')) list($dump,$extra_row[$i]['remark4']) = explode("|",$extra_row[$i]['remark4']);
	if(strstr($extra_row[$i]['remark5'], '|')) list($dump,$extra_row[$i]['remark5']) = explode("|",$extra_row[$i]['remark5']);
	if(strstr($extra_row[$i]['remark6'], '|')) list($dump,$extra_row[$i]['remark6']) = explode("|",$extra_row[$i]['remark6']);
	if(strstr($extra_row[$i]['remark7'], '|')) list($dump,$extra_row[$i]['remark7']) = explode("|",$extra_row[$i]['remark7']);
	if(strstr($extra_row[$i]['remark8'], '|')) list($dump,$extra_row[$i]['remark8']) = explode("|",$extra_row[$i]['remark8']);
	if(strstr($extra_row[$i]['remark9'], '|')) list($dump,$extra_row[$i]['remark9']) = explode("|",$extra_row[$i]['remark9']);
	if(strstr($extra_row[$i]['remark10'], '|')) list($dump,$extra_row[$i]['remark10']) = explode("|",$extra_row[$i]['remark10']);
	if(strstr($extra_row[$i]['remark11'], '|')) list($dump,$extra_row[$i]['remark11']) = explode("|",$extra_row[$i]['remark11']);
	if(strstr($extra_row[$i]['remark12'], '|')) list($dump,$extra_row[$i]['remark12']) = explode("|",$extra_row[$i]['remark12']);
	if(strstr($extra_row[$i]['remark13'], '|')) list($dump,$extra_row[$i]['remark13']) = explode("|",$extra_row[$i]['remark13']);
	if(strstr($extra_row[$i]['remark14'], '|')) list($dump,$extra_row[$i]['remark14']) = explode("|",$extra_row[$i]['remark14']);
	if(strstr($extra_row[$i]['remark15'], '|')) list($dump,$extra_row[$i]['remark15']) = explode("|",$extra_row[$i]['remark15']);

	$new_img = '';
	
	if((time() - $extra_row[$i]['post_time']) < ($board_config['new_length']*3600)) 
	{
		$new_img = '<img src="' . $images['icon_newest_reply2'] . '" border="0" />';
	}


	$extra_row[$i]['topic_title'] = str_cut($extra_row[$i]['topic_title'], $title_length, '...');

	$template->assign_block_vars('extra_row_'.$extra_no, array(
		'U_TITLE' => append_sid("viewtopic.$phpEx?" . POST_POST_URL . '=' . $extra_row[$i]['post_id']) . '#' .$extra_row[$i]['post_id'],
		'TITLE' => ( count($orig_word) ) ? preg_replace($orig_word, $replacement_word, $extra_row[$i]['topic_title']) : $extra_row[$i]['topic_title'],
		'U_POSTER' => append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $extra_row[$i]['user_id']),
		'S_POSTER' => (( $extra_row[$i]['user_id'] != ANONYMOUS ) ? $extra_row[$i]['username'] : ( ( $extra_row[$i]['post_username'] != '' ) ? $extra_row[$i]['post_username'] : "Guest" )),
		'S_POSTTIME' => create_date('Y/m/d', $extra_row[$i]['post_time'], $board_config['board_timezone']),

		'REMARK1' => $extra_row[$i]['remark1'],
		'REMARK2' => $extra_row[$i]['remark2'],
		'REMARK3' => $extra_row[$i]['remark3'],
		'REMARK4' => $extra_row[$i]['remark4'],
		'REMARK5' => $extra_row[$i]['remark5'],
		'REMARK6' => $extra_row[$i]['remark6'],
		'REMARK7' => $extra_row[$i]['remark7'],
		'REMARK8' => $extra_row[$i]['remark8'],
		'REMARK9' => $extra_row[$i]['remark9'],
		'REMARK10' => $extra_row[$i]['remark10'],
		'REMARK11' => $extra_row[$i]['remark11'],
		'REMARK12' => $extra_row[$i]['remark12'],
		'REMARK13' => $extra_row[$i]['remark13'],
		'REMARK14' => $extra_row[$i]['remark14'],
		'REMARK15' => $extra_row[$i]['remark15'],

		'MESSAGE' => $extra_row[$i]['post_text'],

		'NEW_IMG' => $new_img,

		'THUMBNAIL' => $extra_row[$i]['thumbnail'],
		'FULL_IMG' => $extra_row[$i]['full_img'],
		'REAL_FILENAME' => $extra_row[$i]['real_filename'],

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
		'THUMB_WIDTH_40'		=> round($thumb_width*0.4),
		'THUMB_HEIGHT_40'		=> round($thumb_height*0.4),
		'THUMB_WIDTH_30'		=> round($thumb_width*0.3),
		'THUMB_HEIGHT_30'		=> round($thumb_height*0.3),
		'THUMB_WIDTH_20'		=> round($thumb_width*0.2),
		'THUMB_HEIGHT_20'		=> round($thumb_height*0.2),
		'THUMB_WIDTH_10'		=> round($thumb_width*0.1),
		'THUMB_HEIGHT_10'		=> round($thumb_height*0.1),

		)
	);
}

//
// END - Extra-list
//


###############################################

$template->assign_vars(array(
	'SITENAME' => $board_config['sitename'],
	'SITE_DESCRIPTION' => $board_config['site_desc'],
	'PAGE_TITLE' => $page_title,
	'LAST_VISIT_DATE' => sprintf($lang['You_last_visit'], $s_last_visit),
	'CURRENT_TIME' => sprintf($lang['Current_time'], create_date($board_config['default_dateformat'], time(), $board_config['board_timezone'])),
	'TOTAL_USERS_ONLINE' => $l_online_users,
	'LOGGED_IN_USER_LIST' => $online_userlist,
	'RECORD_USERS' => sprintf($lang['Record_online_users'], $board_config['record_online_users'], create_date($board_config['default_dateformat'], $board_config['record_online_date'], $board_config['board_timezone'])),
	'PRIVATE_MESSAGE_INFO' => $l_privmsgs_text,
	'PRIVATE_MESSAGE_INFO_UNREAD' => $l_privmsgs_text_unread,
	'PRIVATE_MESSAGE_NEW_FLAG' => $s_privmsg_new,

	'TOP_LEFT_MARGIN' => (!isset($HTTP_GET_VARS['today']) && isset($HTTP_GET_VARS['PopLeft']) && isset($HTTP_GET_VARS['PopTop'])) ? 'leftmargin='.$HTTP_GET_VARS['PopLeft'].' topmargin='.$HTTP_GET_VARS['PopTop'] : '', 

	'PRIVMSG_IMG' => $icon_pm,

	'ADMIN_LINK' => $admin_link,

	'AVATAR_IMG' => $avatar_img,

	'MOUSE_PROTECTION' => ($board_config['mouse_right'] ? 'oncontextmenu="return false" ondragstsrt="return false" onselectstart="return false" ' : ''),

	'L_TO' => $lang['To'],

	'L_USERNAME' => $lang['Username'],
	'L_PASSWORD' => $lang['Password'],
	'L_LOGIN_LOGOUT' => $l_login_logout,
	'L_LOGIN' => $lang['Login'],
	'L_LOGOUT' => $lang['Logout'],
	'L_LOG_ME_IN' => $lang['Log_me_in'],
	'L_AUTO_LOGIN' => $lang['Log_me_in'],
	'L_INDEX' => sprintf($lang['Forum_Index'], $board_config['sitename']),
	'L_REGISTER' => $lang['Register'],
	'L_REGISTER_NEW_ACCOUNT' => sprintf($lang['Register_new_account'], '<a href="' . append_sid("profile.$phpEx?mode=register") . '">', '</a>'),
	'U_REGISTER_NEW_ACCOUNT' => append_sid("profile.$phpEx?mode=register"),
	'L_SEND_PASSWORD' => $lang['Forgotten_password'],
	'U_SEND_PASSWORD' => append_sid("profile.$phpEx?mode=sendpassword"),
	//profile
	'U_VIEWPROFILE' => append_sid("profile.$phpEx?mode=viewprofile&amp;u=" . $userdata['user_id']),
	'U_EDITPROFILE' => append_sid("profile.$phpEx?mode=editprofile"),
	'PROFILE_NAME' => $userdata['username'],

	'L_PROFILE' => $lang['Profile'],
	'L_SEARCH' => $lang['Search'],
	'L_PRIVATEMSGS' => $lang['Private_Messages'],
	'L_WHO_IS_ONLINE' => $lang['Who_is_Online'],
	'L_MEMBERLIST' => $lang['Memberlist'],
	'L_FAQ' => $lang['FAQ'],
	'L_USERGROUPS' => $lang['Usergroups'],
	'L_SEARCH_NEW' => $lang['Search_new'],
	'L_SEARCH_UNANSWERED' => $lang['Search_unanswered'],
	'L_SEARCH_SELF' => $lang['Search_your_posts'],
	'L_WHOSONLINE_ADMIN' => sprintf($lang['Admin_online_color'], '<span style="color:#' . $theme['fontcolor3'] . '">', '</span>'),
	'L_WHOSONLINE_MOD' => sprintf($lang['Mod_online_color'], '<span style="color:#' . $theme['fontcolor2'] . '">', '</span>'),
	'L_CALENDAR' => $lang['Calendar'],
	// Search
	'L_ADVANCED_SEARCH' => $lang['Advanced_search'],

    'L_WATCHED_TOPICS' => $lang['Watched_Topics'],

	'L_EDITOR_LANG' => $lang['editor_lang'],
	'L_EDITOR_FULL_LANG' => $lang['editor_lang_full'],


	'L_FAV' => $lang['favorites'],

	'U_RECENT' => append_sid("recent.$phpEx"),
	'L_RECENT' => $lang['link'],

	'U_SEARCH_UNANSWERED' => append_sid('search.'.$phpEx.'?search_id=unanswered'),
	'U_SEARCH_SELF' => append_sid('search.'.$phpEx.'?search_id=egosearch'),
	'U_SEARCH_NEW' => append_sid('search.'.$phpEx.'?search_id=newposts'),
	'U_INDEX' => append_sid('index.'.$phpEx),
	'U_REGISTER' => append_sid('profile.'.$phpEx.'?mode=register'),
	'U_PROFILE' => append_sid('profile.'.$phpEx.'?mode=editprofile'),
	'U_PRIVATEMSGS' => append_sid('privmsg.'.$phpEx.'?folder=inbox'),
	'U_PRIVATEMSGS_POPUP' => append_sid('privmsg.'.$phpEx.'?mode=newpm'),
	'U_SEARCH' => append_sid('search.'.$phpEx),
	'U_MEMBERLIST' => append_sid('memberlist.'.$phpEx),
	'U_MODCP' => append_sid('modcp.'.$phpEx),
	'U_FAQ' => append_sid('faq.'.$phpEx),
	'U_VIEWONLINE' => append_sid('viewonline.'.$phpEx),
	'U_LOGIN_LOGOUT' => append_sid($u_login_logout),
	'U_GROUP_CP' => append_sid('groupcp.'.$phpEx),
	'ADMIN_LINK' => $admin_link,
	
    'U_WATCHED_TOPICS' => append_sid($phpbb_root_path . 'watched_topics.' . $phpEx),

	// Links
	'L_STATISTICS' => $lang['Statistics'],
	'U_STATISTICS' => append_sid('statistics.'.$phpEx),

	// Links
	'U_CALENDAR' => append_sid('calendar.'.$phpEx),

	'U_FAV' => append_sid('favorites.'.$phpEx),

	// ezPortal
	'U_PORTAL' => append_sid('portal.'.$phpEx),
	'L_HOME' => $lang['Home'],

	// Links
	'U_LINKS' => append_sid('links.'.$phpEx),
	'L_LINKS' => $lang['links'],

	//global
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

	// Album MOD
	'L_ALBUM' => $lang['Album'],
	'U_ALBUM' => append_sid('album.'.$phpEx),

	'U_PARTIAL_AUTHOR' => append_sid('search.'.$phpEx.'?search_author='.$userdata['username']),
	'USERNAME' => $userdata['username'],

	'S_CONTENT_DIRECTION' => $lang['DIRECTION'],
	'S_CONTENT_ENCODING' => $lang['ENCODING'],
	'S_CONTENT_DIR_LEFT' => $lang['LEFT'],
	'S_CONTENT_DIR_RIGHT' => $lang['RIGHT'],
	'S_TIMEZONE' => sprintf($lang['All_times'], $l_timezone),
	'S_LOGIN_ACTION' => append_sid('login.'.$phpEx),

	'T_HEAD_STYLESHEET' => $theme['head_stylesheet'],
	'T_BODY_BACKGROUND' => $theme['body_background'],
	'T_BODY_BGCOLOR' => '#'.$theme['body_bgcolor'],
	'T_BODY_TEXT' => '#'.$theme['body_text'],
	'T_BODY_LINK' => '#'.$theme['body_link'],
	'T_BODY_VLINK' => '#'.$theme['body_vlink'],
	'T_BODY_ALINK' => '#'.$theme['body_alink'],
	'T_BODY_HLINK' => '#'.$theme['body_hlink'],
	'T_TR_COLOR1' => '#'.$theme['tr_color1'],
	'T_TR_COLOR2' => '#'.$theme['tr_color2'],
	'T_TR_COLOR3' => '#'.$theme['tr_color3'],
	'T_TR_CLASS1' => $theme['tr_class1'],
	'T_TR_CLASS2' => $theme['tr_class2'],
	'T_TR_CLASS3' => $theme['tr_class3'],
	'T_TH_COLOR1' => '#'.$theme['th_color1'],
	'T_TH_COLOR2' => '#'.$theme['th_color2'],
	'T_TH_COLOR3' => '#'.$theme['th_color3'],
	'T_TH_CLASS1' => $theme['th_class1'],
	'T_TH_CLASS2' => $theme['th_class2'],
	'T_TH_CLASS3' => $theme['th_class3'],
	'T_TD_COLOR1' => '#'.$theme['td_color1'],
	'T_TD_COLOR2' => '#'.$theme['td_color2'],
	'T_TD_COLOR3' => '#'.$theme['td_color3'],
	'T_TD_CLASS1' => $theme['td_class1'],
	'T_TD_CLASS2' => $theme['td_class2'],
	'T_TD_CLASS3' => $theme['td_class3'],
	'T_FONTFACE1' => $theme['fontface1'],
	'T_FONTFACE2' => $theme['fontface2'],
	'T_FONTFACE3' => $theme['fontface3'],
	'T_FONTSIZE1' => $theme['fontsize1'],
	'T_FONTSIZE2' => $theme['fontsize2'],
	'T_FONTSIZE3' => $theme['fontsize3'],
	'T_FONTCOLOR1' => '#'.$theme['fontcolor1'],
	'T_FONTCOLOR2' => '#'.$theme['fontcolor2'],
	'T_FONTCOLOR3' => '#'.$theme['fontcolor3'],
	'T_SPAN_CLASS1' => $theme['span_class1'],
	'T_SPAN_CLASS2' => $theme['span_class2'],
	'T_SPAN_CLASS3' => $theme['span_class3'],

	'IMAGEBOX'		=> $imageBox,
	'TEXTBOX'		=> $textBox,
	'TEXTBOX_X'		=> $textBox_x,
	'TEXTBOX_Y'		=> $textBox_y,


	'EDIT_URL_ENCODED' => urlencode('admin_forums.php?c='.$main_id),
	'AUTH_URL_ENCODED' => urlencode('admin_forumauth.php?select_cat='.$main_id),

	'THEME_COLOR_100' => $infoRow[$currentMenu]['themeColor'],		
	'THEME_COLOR_90' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.1),	
	'THEME_COLOR_80' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.2),	
	'THEME_COLOR_70' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.3),	
	'THEME_COLOR_60' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.4),	
	'THEME_COLOR_50' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.5),	
	'THEME_COLOR_40' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.6),	
	'THEME_COLOR_30' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.7),	
	'THEME_COLOR_20' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.8),	
	'THEME_COLOR_10' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.9),	
	'THEME_COLOR_5' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.95),	
	'THEME_COLOR_4' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.96),
	'THEME_COLOR_3' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.97),	
	'THEME_COLOR_2' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.98),	
	'THEME_COLOR_1' => mod_color_rate(strtoupper($infoRow[$currentMenu]['themeColor']), 0.99),	

	'MENU_LANG_1STLINE' => $lang['menu_lang_1stLine'],
	'MENU_LANG_2NDLINE' => $lang['menu_lang_2ndLine'],
	'MENU_LANG_ADDRESS' => $lang['menu_lang_address'],
	'MENU_LANG_AGENTNAME' => $lang['menu_lang_agentname'],
	'MENU_LANG_APPLICANT' => $lang['menu_lang_applicant'],
	'MENU_LANG_ATTACH' => $lang['menu_lang_attach'],
	'MENU_LANG_AUTHOR' => $lang['menu_lang_author'],
	'MENU_LANG_CELL' => $lang['menu_lang_cell'],
	'MENU_LANG_CONTENT' => $lang['menu_lang_content'],
	'MENU_LANG_DATE' => $lang['menu_lang_date'],
	'MENU_LANG_DESCRIPT' => $lang['menu_lang_descript'],
	'MENU_LANG_EMAIL' => $lang['menu_lang_email'],
	'MENU_LANG_ETC' => $lang['menu_lang_etc'],
	'MENU_LANG_EVENT' => $lang['menu_lang_event'],
	'MENU_LANG_FAX' => $lang['menu_lang_fax'],
	'MENU_LANG_FILENAME' => $lang['menu_lang_filename'],
	'MENU_LANG_FROM' => $lang['menu_lang_from'],
	'MENU_LANG_HIDE' => $lang['menu_lang_hide'],
	'MENU_LANG_JOB' => $lang['menu_lang_job'],
	'MENU_LANG_MARGIN' => $lang['menu_lang_margin'],
	'MENU_LANG_MESSAGEBODY' => $lang['menu_lang_messagebody'],
	'MENU_LANG_MESSAGETYPE' => $lang['menu_lang_messagetype'],
	'MENU_LANG_NAME' => $lang['menu_lang_name'],
	'MENU_LANG_PLACE' => $lang['menu_lang_place'],
	'MENU_LANG_POLL' => $lang['menu_lang_poll'],
	'MENU_LANG_POSITION' => $lang['menu_lang_position'],
	'MENU_LANG_PRESIDENT' => $lang['menu_lang_president'],
	'MENU_LANG_RECIPIENT' => $lang['menu_lang_recipient'],
	'MENU_LANG_REPLY' => $lang['menu_lang_reply'],
	'MENU_LANG_RESIZABLE' => $lang['menu_lang_resizable'],
	'MENU_LANG_SCROLLBARS' => $lang['menu_lang_scrollbars'],
	'MENU_LANG_SECTION' => $lang['menu_lang_section'],
	'MENU_LANG_SIZE' => $lang['menu_lang_size'],
	'MENU_LANG_STA' => $lang['menu_lang_sta'],
	'MENU_LANG_STREAMING' => $lang['menu_lang_streaming'],
	'MENU_LANG_SUBJECT' => $lang['menu_lang_subject'],
	'MENU_LANG_TEL' => $lang['menu_lang_tel'],
	'MENU_LANG_THEMECOLOR' => $lang['menu_lang_themecolor'],
	'MENU_LANG_TITLE' => $lang['menu_lang_title'],
	'MENU_LANG_TO' => $lang['menu_lang_to'],
	'MENU_LANG_URL' => $lang['menu_lang_url'],
	'MENU_LANG_VIEW' => $lang['menu_lang_view'],
	'MENU_LANG_ID' => $lang['menu_lang_id'],
	'MENU_LANG_PASS' => $lang['menu_lang_pass'],
	'MENU_LANG_MENUCOLOR' => $lang['menu_lang_menucolor'],
	'MENU_LANG_MENUBGCOLOR' => $lang['menu_lang_menubgcolor'],
	'MENU_LANG_LOGOBGCOLOR' => $lang['menu_lang_logobgcolor'],
	'MENU_LANG_BANNERIMAGE' => $lang['menu_lang_bannerimage'],
	'MENU_LANG_BANNERNAME' => $lang['menu_lang_bannername'],
	'MENU_LANG_OPACITY' => $lang['menu_lang_opacity'],
	'MENU_LANG_PATH' => $lang['menu_lang_path'],
	'MENU_LANG_YES' => $lang['menu_lang_yes'],
	'MENU_LANG_NO' => $lang['menu_lang_no'],
	'MENU_LANG_TOP' => $lang['menu_lang_top'],
	'MENU_LANG_LEFT' => $lang['menu_lang_left'],
	'MENU_LANG_WIDTH' => $lang['menu_lang_width'],
	'MENU_LANG_HEIGHT' => $lang['menu_lang_height'],
	'MENU_LANG_VOLUME' => $lang['menu_lang_volume'],
	'MENU_LANG_LOOP' => $lang['menu_lang_loop'],
	'MENU_LANG_RIGHT' => $lang['menu_lang_right'],
	'MENU_LANG_ALIGNMENT' => $lang['menu_lang_alignment'],
	'MENU_LANG_COLOR' => $lang['menu_lang_color'],
	'MENU_LANG_CENTER' => $lang['menu_lang_center'],
	'MENU_LANG_NEW_WINDOW' => $lang['menu_lang_new_window'],
	'MENU_LANG_CURRENT_WINDOW' => $lang['menu_lang_current_window'],
	'MENU_LANG_SUCCESS_UPDATE' => $lang['menu_lang_success_update'],
	'MENU_LANG_UPLOAD_CROP' => $lang['menu_lang_upload_crop'],
	'MENU_LANG_EDIT' => $lang['menu_lang_edit'],
	'MENU_LANG_CROP_NOW' => $lang['menu_lang_crop_now'],

	'MENU_LANG_ADMIN_MENU' => $lang['menu_lang_admin_menu'],
	'MENU_LANG_LOGO' => $lang['menu_lang_logo'],
	'MENU_LANG_SKIN' => $lang['menu_lang_skin'],
	'MENU_LANG_SOUND' => $lang['menu_lang_sound'],
	'MENU_LANG_HOME' => $lang['menu_lang_home'],
	'MENU_LANG_EVENT_BOX' => $lang['menu_lang_event_box'],
	'MENU_LANG_MINI_BOX' => $lang['menu_lang_mini_box'],
	'MENU_LANG_POP_UP' => $lang['menu_lang_pop_up'],
	'MENU_LANG_FAMILY_SITES' => $lang['menu_lang_family_sites'],
	'MENU_LANG_COPYRIGHT' => $lang['menu_lang_copyright'],
	'MENU_LANG_MENU_SCROLL' => $lang['menu_lang_menu_scroll'],
	'MENU_LANG_QUICK_LINKS' => $lang['menu_lang_quick_links'],
	'MENU_LANG_BANNER' => $lang['menu_lang_banner'],
	'MENU_LANG_AGREEMENT' => $lang['menu_lang_agreement'],
	'MENU_LANG_SHORT_DESCRIPTION' => $lang['menu_lang_short_description'],


	'MENU_LANG_' => $lang['menu_lang_'],
	'MENU_LANG_' => $lang['menu_lang_'],
	'MENU_LANG_' => $lang['menu_lang_'],
	'MENU_LANG_' => $lang['menu_lang_'],


	'U_NAME_LINK' => $name_link,

	'PRELOAD_IMG_LIST' => $preload_img_list,	

	'NAV_LINKS' => $nav_links_html)
);

/**************************************************************/
//side-menu

//side-menu

$special_side = explode(',',$board_config['remark30']);



$sd_field = $qbar_maps['MainMenu']['fields'];
$sd_menu = array();
$sd_found = false;

for ($i=0; ( ($i < count($fids)) && !$sd_found && is_array($sd_field)); $i++) {
	
	$sd_key = $fids[$i];

	$sub_index = -1;

	reset($sd_field);
	
	while (($sd_menu = @each($sd_field)) && !$sd_found )
	{			
		$sub_index++;

		$temp1 = explode("?",$sd_menu['value']['url']);
		$temp2 = explode("&",$temp1[1]);
		$temp3 = explode("=",$temp2[0]);				

		$sd_id = $temp3[0].$temp3[1];
		
		if($sd_key == $sd_id || in_array($sd_key,$special_side)){
			$sd_found = true;
		}
	}
}

if($sd_found) {
	if(in_array($sd_key,$special_side)){		

		if(count($tree['sub'][$sd_key]) > 0) {
			$template->assign_block_vars('switch_menu', array());
		}
		else {
			$template->assign_block_vars('not_switch_menu', array());
		}

		for ($i = 0; $i < count($tree['sub'][$sd_key]); $i++ )
		{		
			$sub_menu_key_temp = $tree['sub'][$sd_key][$i];
			if($tree['auth'][$sub_menu_key_temp]['auth_view']) {
				$template->assign_block_vars('sub_menu', array(		
					'SUB_MENU_NO' => $i,
					'SUB_MENU' => '<a href="'. append_sid($qbar_maps['default_tree']['fields'][$sub_menu_key_temp]['url']) . '" class=calendar>' . $qbar_maps['default_tree']['fields'][$sub_menu_key_temp]['shortcut'] . '</a>',
					'SUB_MENU_URL' => append_sid($qbar_maps['default_tree']['fields'][$sub_menu_key_temp]['url']),
					'SUB_MENU_NAME' => $qbar_maps['default_tree']['fields'][$sub_menu_key_temp]['shortcut'],
					)
				);
			}

			if(count($tree['sub'][$sub_menu_key_temp]) > 0) {

				$template->assign_block_vars('sub_menu.switch_second', array());

				for ($m = 0; $m < count($tree['sub'][$sub_menu_key_temp]); $m++ )
				{	
					$sub_menu_key_temp2 = $tree['sub'][$sub_menu_key_temp][$m];
					if($tree['auth'][$sub_menu_key_temp2]['auth_view']) {
						$template->assign_block_vars('sub_menu.switch_second.second_menu', array(						
							'SUB2_MENU_NO' => $m,
							'SUB2_MENU' => '<a href="'. append_sid($qbar_maps['default_tree']['fields'][$sub_menu_key_temp2]['url']) . '" class=calendar>' . $qbar_maps['default_tree']['fields'][$sub_menu_key_temp2]['shortcut'] . '</a>',
							'SUB2_MENU_URL' => append_sid($qbar_maps['default_tree']['fields'][$sub_menu_key_temp2]['url']),
							'SUB2_MENU_NAME' => $qbar_maps['default_tree']['fields'][$sub_menu_key_temp2]['shortcut'],
							)
						);
					}
				}
			}


		}		
	}

	else {
		if(count($sub_menus[$sub_index]) > 0) {
			$template->assign_block_vars('switch_menu', array());
		}
		else {
			$template->assign_block_vars('not_switch_menu', array());
		}

		for ($k=0; $k < count($sub_menus[$sub_index]); $k++)
		{						
			$template->assign_block_vars('sub_menu', array(	
				'SUB_MENU_NO' => $k,
				'SUB_MENU' => $sub_menus[$sub_index][$k],
				'SUB_MENU_URL' => $sub_menus_urls[$sub_index][$k],
				'SUB_MENU_NAME' => $sub_menus_names[$sub_index][$k],
				)
			);


			$sub_menu_key_temp = $sub_menus_keys[$sub_index][$k];

			if(count($tree['sub'][$sub_menu_key_temp]) > 0) {

				$template->assign_block_vars('sub_menu.switch_second', array());

				for ($m = 0; $m < count($tree['sub'][$sub_menu_key_temp]); $m++ )
				{	
					$sub_menu_key_temp2 = $tree['sub'][$sub_menu_key_temp][$m];
					if($tree['auth'][$sub_menu_key_temp2]['auth_view']) {
						$template->assign_block_vars('sub_menu.switch_second.second_menu', array(						
							'SUB2_MENU_NO' => $m,
							'SUB2_MENU' => '<a href="'. append_sid($qbar_maps['default_tree']['fields'][$sub_menu_key_temp2]['url']) . '" class=calendar>' . $qbar_maps['default_tree']['fields'][$sub_menu_key_temp2]['shortcut'] . '</a>',
							'SUB2_MENU_URL' => append_sid($qbar_maps['default_tree']['fields'][$sub_menu_key_temp2]['url']),
							'SUB2_MENU_NAME' => $qbar_maps['default_tree']['fields'][$sub_menu_key_temp2]['shortcut'],
							)
						);
					}
				}
			}


		}

	}

}
/**************************************************************/



//
// portal or not
//
if ( strstr($_SERVER["PHP_SELF"] ,"portal.php"))
{
	$template->assign_block_vars('switch_portal', array());

	if (($userdata['user_level'] == ADMIN))
	{
		$template->assign_block_vars('switch_portal.switch_admin_only_in_portal', array());
	}
	else {
		$template->assign_block_vars('switch_portal.switch_not_admin_only_in_portal', array());
	}
}
else
{
	$template->assign_block_vars('switch_not_portal', array());

	if (($userdata['user_level'] == ADMIN))
	{
		$template->assign_block_vars('switch_not_portal.switch_admin_only_in_not_portal', array());
	}
	else {
		$template->assign_block_vars('switch_not_portal.switch_not_admin_only_in_not_portal', array());
	}

}


//
// Login box?
//
if ( !$userdata['session_logged_in'] )
{
	$template->assign_block_vars('switch_user_logged_out', array());
}
else
{
	$template->assign_block_vars('switch_user_logged_in', array());

	//
	// admin selection
	//
	if (($userdata['user_level'] == ADMIN))
	{
		$template->assign_block_vars('switch_user_logged_in.switch_admin', array());
	}
	else {
		$template->assign_block_vars('switch_user_logged_in.switch_not_admin', array());
	}

	if ( !empty($userdata['user_popup_pm']) )
	{
		$template->assign_block_vars('switch_enable_pm_popup', array());
	}
}

if (($userdata['user_level'] == ADMIN))
{
	$template->assign_block_vars('switch_admin_only', array());
}
else {
	$template->assign_block_vars('switch_not_admin_only', array());
}

// Add no-cache control for cookies if they are set
//$c_no_cache = (isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_sid']) || isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_data'])) ? 'no-cache="set-cookie", ' : '';

// Work around for "current" Apache 2 + PHP module which seems to not
// cope with private cache control setting
if (!empty($_SERVER['SERVER_SOFTWARE']) && strstr($_SERVER['SERVER_SOFTWARE'], 'Apache/2'))
{
	header ('Cache-Control: no-cache, pre-check=0, post-check=0');
}
else
{
	header ('Cache-Control: private, pre-check=0, post-check=0, max-age=0');
}
header ('Expires: 0');
header ('Pragma: no-cache');

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
include_once($phpbb_root_path . 'includes/mods_settings/mod_categories_hierarchy.' . $phpEx);

// get the nav sentence
$nav_key = '';
if (isset($HTTP_POST_VARS[POST_CAT_URL]) || isset($HTTP_GET_VARS[POST_CAT_URL]))
{
	$nav_key = POST_CAT_URL . ((isset($HTTP_POST_VARS[POST_CAT_URL])) ? intval($HTTP_POST_VARS[POST_CAT_URL]) : intval($HTTP_GET_VARS[POST_CAT_URL]));
}
if (isset($HTTP_POST_VARS[POST_FORUM_URL]) || isset($HTTP_GET_VARS[POST_FORUM_URL]))
{
	$nav_key = POST_FORUM_URL . ((isset($HTTP_POST_VARS[POST_FORUM_URL])) ? intval($HTTP_POST_VARS[POST_FORUM_URL]) : intval($HTTP_GET_VARS[POST_FORUM_URL]));
}
if (isset($HTTP_POST_VARS[POST_TOPIC_URL]) || isset($HTTP_GET_VARS[POST_TOPIC_URL]))
{
	$nav_key = POST_TOPIC_URL . ((isset($HTTP_POST_VARS[POST_TOPIC_URL])) ? intval($HTTP_POST_VARS[POST_TOPIC_URL]) : intval($HTTP_GET_VARS[POST_TOPIC_URL]));
}
if (isset($HTTP_POST_VARS[POST_POST_URL]) || isset($HTTP_GET_VARS[POST_POST_URL]))
{
	$nav_key = POST_POST_URL . ((isset($HTTP_POST_VARS[POST_POST_URL])) ? intval($HTTP_POST_VARS[POST_POST_URL]) : intval($HTTP_GET_VARS[POST_POST_URL]));
}
if ( empty($nav_key) && (isset($HTTP_POST_VARS['selected_id']) || isset($HTTP_GET_VARS['selected_id'])) )
{
   $nav_key = isset($HTTP_GET_VARS['selected_id']) ? $HTTP_GET_VARS['selected_id'] : $HTTP_POST_VARS['selected_id'];
}
if (empty($nav_key)) $nav_key = 'Root';
$nav_cat_desc = make_cat_nav_tree($nav_key, $nav_pgm);
if (!empty($nav_cat_desc)) $nav_cat_desc = '<img src="templates/'.$theme['template_name'].'/images/arrow-head.gif" border="0" align="absmiddle">&nbsp;' . $nav_cat_desc;
//if ($nav_cat_desc != '') $nav_cat_desc = $nav_separator . $nav_cat_desc;

// send to template
$template->assign_vars(array(
	'SPACER'		=> $images['spacer'],
	'NAV_SEPARATOR' => $nav_separator,
	'NAV_CAT_DESC'	=> $nav_cat_desc,
	)
);
//-- fin mod : categories hierarchy ----------------------------------------------------------------

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
include_once($phpbb_root_path . 'includes/mods_settings/mod_calendar.' . $phpEx);

if (!defined('IN_CALENDAR'))
{
	if ( intval($board_config['calendar_header_cells']) > 0 )
	{
		include_once($phpbb_root_path . './includes/functions_calendar.' . $phpEx);
		display_calendar('CALENDAR_BOX', intval($board_config['calendar_header_cells']));
	}
}
$template->assign_vars(array(
	'L_CALENDAR'	=> $lang['Calendar'],
	'I_CALENDAR'	=> $images['menu_calendar'],
	'U_CALENDAR'	=> append_sid("./calendar.$phpEx"),
	)
);
//-- fin mod : calendar ----------------------------------------------------------------------------

// Log actions MOD Start
include_once($phpbb_root_path . 'includes/functions_log.'.$phpEx);
// Log actions MOD End

//-- mod : split topic type ------------------------------------------------------------------------
//-- add
include_once($phpbb_root_path . 'includes/mods_settings/mod_split_topic_type.' . $phpEx);
//-- fin mod : split topic type --------------------------------------------------------------------

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
include_once($phpbb_root_path . 'includes/mods_settings/mod_post_icons.' . $phpEx);
//-- mod : post icon -------------------------------------------------------------------------------

$template->pparse('overall_header');

?>