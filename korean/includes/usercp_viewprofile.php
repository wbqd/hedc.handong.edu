<?php
/***************************************************************************
 *                           usercp_viewprofile.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: usercp_viewprofile.php,v 1.8 2003/08/30 15:05:45 acydburn Exp $
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
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
	exit;
}

if ( empty($HTTP_GET_VARS[POST_USERS_URL]) || $HTTP_GET_VARS[POST_USERS_URL] == ANONYMOUS )
{
	message_die(GENERAL_MESSAGE, $lang['No_user_id_specified']);
}
$profiledata = get_userdata($HTTP_GET_VARS[POST_USERS_URL]);

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

$sql = "SELECT *
	FROM " . RANKS_TABLE . "
	ORDER BY rank_special, rank_min";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not obtain ranks information', '', __LINE__, __FILE__, $sql);
}

while ( $row = $db->sql_fetchrow($result) )
{
	$ranksrow[] = $row;
}
$db->sql_freeresult($result);

//
// Output page header and profile_view template
//
$template->set_filenames(array(
	'body' => 'profile_view_body.tpl')
);
//make_jumpbox('viewforum.'.$phpEx);

//
// Calculate the number of days this user has been a member ($memberdays)
// Then calculate their posts per day
//
$regdate = $profiledata['user_regdate'];
$memberdays = max(1, round( ( time() - $regdate ) / 86400 ));
$posts_per_day = $profiledata['user_posts'] / $memberdays;

// Get the users percentage of total posts
if ( $profiledata['user_posts'] != 0  )
{
	$total_posts = get_db_stat('postcount');
	$percentage = ( $total_posts ) ? min(100, ($profiledata['user_posts'] / $total_posts) * 100) : 0;
}
else
{
	$percentage = 0;
}

$avatar_img = '';
if ( $profiledata['user_avatar_type'] && $profiledata['user_allowavatar'] )
{
	switch( $profiledata['user_avatar_type'] )
	{
		case USER_AVATAR_UPLOAD:
			$avatar_img = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $profiledata['user_avatar'] . '" alt="" border="0" />' : '';
			break;
		case USER_AVATAR_REMOTE:
			$avatar_img = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $profiledata['user_avatar'] . '" alt="" border="0" />' : '';
			break;
		case USER_AVATAR_GALLERY:
			$avatar_img = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $profiledata['user_avatar'] . '" alt="" border="0" />' : '';
			break;
	}
}

$poster_rank = '';
$rank_image = '';
if ( $profiledata['user_rank'] )
{
	for($i = 0; $i < count($ranksrow); $i++)
	{
		if ( $profiledata['user_rank'] == $ranksrow[$i]['rank_id'] && $ranksrow[$i]['rank_special'] )
		{
			$poster_rank = $ranksrow[$i]['rank_title'];
			$rank_image = ( $ranksrow[$i]['rank_image'] ) ? '<img src="' . $ranksrow[$i]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" /><br />' : '';
		}
	}
}
else
{
	for($i = 0; $i < count($ranksrow); $i++)
	{
		if ( $profiledata['user_posts'] >= $ranksrow[$i]['rank_min'] && !$ranksrow[$i]['rank_special'] )
		{
			$poster_rank = $ranksrow[$i]['rank_title'];
			$rank_image = ( $ranksrow[$i]['rank_image'] ) ? '<img src="' . $ranksrow[$i]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" /><br />' : '';
		}
	}
}

$temp_url = append_sid("privmsg.$phpEx?mode=post&amp;" . POST_USERS_URL . "=" . $profiledata['user_id']);
$pm_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_pm'] . '" alt="' . $lang['Send_private_message'] . '" title="' . $lang['Send_private_message'] . '" border="0" /></a>';
$pm = '<a href="' . $temp_url . '">' . $lang['Send_private_message'] . '</a>';

if ( !empty($profiledata['user_viewemail']) || $userdata['user_level'] == ADMIN )
{
	$email_uri = ( $board_config['board_email_form'] ) ? append_sid("profile.$phpEx?mode=email&amp;" . POST_USERS_URL .'=' . $profiledata['user_id']) : 'mailto:' . $profiledata['user_email'];

	$email_img = '<a href="' . $email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" /></a>';
	$email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
}
else
{
	$email_img = '&nbsp;';
	$email = '&nbsp;';
}

$www_img = ( $profiledata['user_website'] ) ? '<a href="' . $profiledata['user_website'] . '" target="_userwww"><img src="' . $images['icon_www'] . '" alt="' . $lang['Visit_website'] . '" title="' . $lang['Visit_website'] . '" border="0" /></a>' : '&nbsp;';
$www = ( $profiledata['user_website'] ) ? '<a href="' . $profiledata['user_website'] . '" target="_userwww">' . $profiledata['user_website'] . '</a>' : '&nbsp;';

if ( !empty($profiledata['user_icq']) )
{
	$icq_status_img = '<a href="http://wwp.icq.com/' . $profiledata['user_icq'] . '#pager"><img src="http://web.icq.com/whitepages/online?icq=' . $profiledata['user_icq'] . '&img=5" width="18" height="18" border="0" /></a>';
	$icq_img = '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $profiledata['user_icq'] . '"><img src="' . $images['icon_icq'] . '" alt="' . $lang['ICQ'] . '" title="' . $lang['ICQ'] . '" border="0" /></a>';
	$icq =  '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $profiledata['user_icq'] . '">' . $lang['ICQ'] . '</a>';
}
else
{
	$icq_status_img = '&nbsp;';
	$icq_img = '&nbsp;';
	$icq = '&nbsp;';
}

$aim_img = ( $profiledata['user_aim'] ) ? '<a href="aim:goim?screenname=' . $profiledata['user_aim'] . '&amp;message=Hello+Are+you+there?"><img src="' . $images['icon_aim'] . '" alt="' . $lang['AIM'] . '" title="' . $lang['AIM'] . '" border="0" /></a>' : '&nbsp;';
$aim = ( $profiledata['user_aim'] ) ? '<a href="aim:goim?screenname=' . $profiledata['user_aim'] . '&amp;message=Hello+Are+you+there?">' . $lang['AIM'] . '</a>' : '&nbsp;';

$msn_img = ( $profiledata['user_msnm'] ) ? '<a href="javascript:DoInstantMessage(\''.$profiledata['user_msnm'].'\',\''.$profiledata['username'].'\');"><img src="' . $images['icon_msnm'] . '" alt="' . $lang['MSN'] . '" title="' . $lang['MSN'] . '" border="0" /></a>': '&nbsp;';
$msn = $msn_img;

$yim_img = ( $profiledata['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $profiledata['user_yim'] . '&amp;.src=pg"><img src="' . $images['icon_yim'] . '" alt="' . $lang['YIM'] . '" title="' . $lang['YIM'] . '" border="0" /></a>' : '';
$yim = ( $profiledata['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $profiledata['user_yim'] . '&amp;.src=pg">' . $lang['YIM'] . '</a>' : '';

$temp_url = append_sid("search.$phpEx?search_author=" . urlencode($profiledata['username']) . "&amp;showresults=posts");
$search_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_search'] . '" alt="' . $lang['Search_user_posts'] . '" title="' . $lang['Search_user_posts'] . '" border="0" /></a>';
$search = '<a href="' . $temp_url . '">' . $lang['Search_user_posts'] . '</a>';

list($buddy_img, $buddy, $buddy_lang) = get_buddy_img($userdata['user_id'], $profiledata['user_id']);


//************************************************************** 주민등록 번호
if ($profiledata['user_jumin1'] !='') {
   $jumin_number = $profiledata['user_jumin1'].' - '.$profiledata['user_jumin2'];
} else {
   $jumin_number = "$none_img";
}
$template->assign_vars(array(
   'L_USER_PERM_FOR' => $lang['User_perm_for'], 
   'U_PERM_PROFILE' => "<a href=\"" . append_sid("admin/admin_users.$phpEx?mode=edit&amp;u=" . $profiledata['user_id']) . "\" target=\"_blank\">" . '<img src="' . $images['s_edit'] . '" border="0">' . "</a> ",
   'JUMIN_NUMBER' => $jumin_number,)
);
$template->assign_block_vars('switch_user_admin', array());


//
// Select all group that the user is a member of or where the user has
// a pending membership.
//
	$sql = "SELECT g.group_id, g.group_name, g.group_type, ug.user_pending 
		FROM " . GROUPS_TABLE . " g, " . USER_GROUP_TABLE . " ug
		WHERE ug.user_id = " . $profiledata['user_id'] . "  
			AND ug.group_id = g.group_id
			AND g.group_single_user <> " . TRUE . "
		ORDER BY g.group_name, ug.user_id";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Error getting group information', '', __LINE__, __FILE__, $sql);
	}

	if ( $row = $db->sql_fetchrow($result) )
	{
		$in_group = array();
		$s_member_groups = '';
		$s_pending_groups = '';

		do
		{
			$in_group[] = $row['group_id'];
			if ( $row['user_pending'] )
			{
				$s_pending_groups .= $row['group_name']."<br>";
			}
			else
			{
				$s_member_groups .= $row['group_name']."<br>";
			}
		}
		while( $row = $db->sql_fetchrow($result) );
	}


//
// Generate page
//
$page_title = $lang['Viewing_profile'];
display_upload_attach_box_limits($profiledata['user_id']);
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

$template->assign_vars(array(
	'USERNAME' => $profiledata['username'],
	'REALNAME' => perm_realname($profiledata),
	'JOINED' => create_date($lang['DATE_FORMAT'], $profiledata['user_regdate'], $board_config['board_timezone']),
	'POSTER_RANK' => $poster_rank,
	'RANK_IMAGE' => $rank_image,
	'POSTS_PER_DAY' => $posts_per_day,
	'POSTS' => $profiledata['user_posts'],
	'PERCENTAGE' => $percentage . '%', 
	'POST_DAY_STATS' => sprintf($lang['User_post_day_stats'], $posts_per_day), 
	'POST_PERCENT_STATS' => sprintf($lang['User_post_pct_stats'], $percentage), 

    'L_LOGON' => $lang['Last_logon'], 
    'LAST_LOGON' => (($profiledata['user_lastvisit'] != 0) ? create_date($board_config['default_dateformat'], $profiledata['user_lastvisit'], $board_config['board_timezone']) : ''), 

	'SEARCH_IMG' => $search_img,
	'SEARCH' => $search,
	'PM_IMG' => $pm_img,
	'PM' => $pm,
	'EMAIL_IMG' => $email_img,
	'EMAIL' => $email,
	'WWW_IMG' => $www_img,
	'WWW' => $www,

	'BUDDY_IMG' => $buddy_img,
	'BUDDY' => $buddy,

	'ICQ_STATUS_IMG' => $icq_status_img,
	'ICQ_IMG' => $icq_img, 
	'ICQ' => $icq, 
	'AIM_IMG' => $aim_img,
	'AIM' => $aim,
	'MSN_IMG' => $msn_img,
	'MSN' => $msn,
	'YIM_IMG' => $yim_img,
	'YIM' => $yim,

	'LOCATION' => perm_from($profiledata,''),
	'OCCUPATION' => perm_occ($profiledata),

    'MPHONE' => perm_mphone($profiledata),
    'HPHONE' => perm_hphone($profiledata),

	'INTERESTS' => ( $profiledata['user_interests'] ) ? $profiledata['user_interests'] : '&nbsp;',
    'GENDER' => perm_gender($profiledata),
    'BIRTHDAY' => perm_birth_age($profiledata,'B'),
    'USER_AGE' => perm_birth_age($profiledata,'A'),
	'AVATAR_IMG' => $avatar_img,

	'REMARK1' => $profiledata['user_remark1'],
	'REMARK2' => $profiledata['user_remark2'],
	'REMARK3' => $profiledata['user_remark3'],
	'REMARK4' => $profiledata['user_remark4'],
	'REMARK5' => $profiledata['user_remark5'],
	'REMARK6' => $profiledata['user_remark6'],
	'REMARK7' => $profiledata['user_remark7'],
	'REMARK8' => $profiledata['user_remark8'],
	'REMARK9' => $profiledata['user_remark9'],
	'REMARK10' => $profiledata['user_remark10'],
	'REMARK11' => $profiledata['user_remark11'],
	'REMARK12' => $profiledata['user_remark12'],
	'REMARK13' => $profiledata['user_remark13'],
	'REMARK14' => $profiledata['user_remark14'],
	'REMARK15' => $profiledata['user_remark15'],
	'REMARK16' => $profiledata['user_remark16'],
	'REMARK17' => $profiledata['user_remark17'],
	'REMARK18' => $profiledata['user_remark18'],
	'REMARK19' => $profiledata['user_remark19'],
	'REMARK20' => $profiledata['user_remark20'],


	'L_VIEWING_PROFILE' => sprintf($lang['Viewing_user_profile'], $profiledata['username']), 
	'L_ABOUT_USER' => sprintf($lang['About_user'], $profiledata['username']), 
	'L_AVATAR' => $lang['Avatar'], 
	'L_POSTER_RANK' => $lang['Poster_rank'], 
	'L_JOINED' => $lang['Joined'], 
	'L_TOTAL_POSTS' => $lang['Total_posts'], 
	'L_SEARCH_USER_POSTS' => sprintf($lang['Search_user_posts'], $profiledata['username']), 
	'L_CONTACT' => $lang['Contact'],
	'L_EMAIL_ADDRESS' => $lang['Email_address'],
	'L_EMAIL' => $lang['Email'],
	'L_PM' => $lang['Private_Message'],
	'L_ICQ_NUMBER' => $lang['ICQ'],
	'L_YAHOO' => $lang['YIM'],
	'L_AIM' => $lang['AIM'],
	'L_MESSENGER' => $lang['MSNM'],
	'L_WEBSITE' => $lang['Website'],

	'L_BUDDY' => $lang['Buddy'],

	'L_LOCATION' => $lang['Location'],
	'L_OCCUPATION' => $lang['Occupation'],
	'L_INTERESTS' => $lang['Interests'],
    'L_GENDER' => $lang['Gender'],
    'L_BIRTHDAY' => $lang['Birthday'], 
	'L_REALNAME' => $lang['realname'],
	'L_HPHONE' => $lang['hand_phone'],
	'L_MPHONE' => $lang['my_phone'],
    'L_JUMIN' => $lang['Jumin'],
    'L_AGE' => $lang['Age'],

	"TITLE_REMARK1" => $board_config['title_remark1'],  
	"TITLE_REMARK2" => $board_config['title_remark2'],  
	"TITLE_REMARK3" => $board_config['title_remark3'],  
	"TITLE_REMARK4" => $board_config['title_remark4'],  
	"TITLE_REMARK5" => $board_config['title_remark5'],  
	"TITLE_REMARK6" => $board_config['title_remark6'],  
	"TITLE_REMARK7" => $board_config['title_remark7'],  
	"TITLE_REMARK8" => $board_config['title_remark8'],  
	"TITLE_REMARK9" => $board_config['title_remark9'],  
	"TITLE_REMARK10" => $board_config['title_remark10'],  
	"TITLE_REMARK11" => $board_config['title_remark11'],  
	"TITLE_REMARK12" => $board_config['title_remark12'],  
	"TITLE_REMARK13" => $board_config['title_remark13'],  
	"TITLE_REMARK14" => $board_config['title_remark14'],  
	"TITLE_REMARK15" => $board_config['title_remark15'],  
	"TITLE_REMARK16" => $board_config['title_remark16'],  
	"TITLE_REMARK17" => $board_config['title_remark17'],  
	"TITLE_REMARK18" => $board_config['title_remark18'],  
	"TITLE_REMARK19" => $board_config['title_remark19'],  
	"TITLE_REMARK20" => $board_config['title_remark20'],  
	
	'L_WATCHING_LIST' => $lang['watching_list'],

	'U_SEARCH_USER' => append_sid("search.$phpEx?search_author=" . urlencode($profiledata['username'])),
	'U_EDIT_PROFILE' => append_sid("profile.$phpEx?mode=editprofile"),

	'L_YOU_BELONG_GROUPS' => $lang['Current_memberships'],
	'L_PENDING_GROUPS' => $lang['Memberships_pending'],
	'GROUP_PENDING_LIST' => $s_pending_groups,
	'GROUP_MEMBER_LIST' => $s_member_groups,

	//
	// Photo Album Addon v2.x.x by Smartor
	//
	'U_PERSONAL_GALLERY' => append_sid("album_personal.$phpEx?user_id=" . $profiledata['user_id']),
	'L_PERSONAL_GALLERY' => sprintf($lang['Personal_Gallery_Of_User'], $profiledata['username']),


	'S_PROFILE_ACTION' => append_sid("profile.$phpEx"))
);


if($userdata['user_id'] == $profiledata['user_id']) {
	$template->assign_block_vars('switch_my_profile', array());	
}
else {
	$template->assign_block_vars('switch_not_my_profile', array());
}

if($userdata['user_id'] == $profiledata['user_id'] || $userdata['user_level'] == ADMIN) {
	$template->assign_block_vars('switch_my_profile_or_admin', array());
}
else {
	$template->assign_block_vars('switch_not_my_profile_or_admin', array());
}

get_buddies($profiledata); 

$template->pparse('body');

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>