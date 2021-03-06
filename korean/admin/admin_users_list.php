<?php
/***************************************************************************
 *                              admin_users_list.php
 *                              -------------------
 *   begin                : Wednesday, January 29, 2003
 *   copyright            : (C) 2003 Smartor
 *   email                : smartor_xp@hotmail.com
 *
 *   $Id: admin_users_list.php,v 1.1.0 1/29/2003, 11:02:14 ngoctu Exp $
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

if( !empty($setmodules) )
{
	$filename = basename(__FILE__);
	$module['Users']['Users_List'] = $filename;
	return;
}

//
// Let's set the root dir for phpBB
//
$phpbb_root_path = '../';
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);

//
// Set variables
//
$users_per_page = 25;

$start = (isset($HTTP_GET_VARS['start'])) ? intval($HTTP_GET_VARS['start']) : 0;

if( isset($HTTP_POST_VARS['sort']) )
{
	$sort_method = $HTTP_POST_VARS['sort'];
}
else if( isset($HTTP_GET_VARS['sort']) )
{
	$sort_method = $HTTP_GET_VARS['sort'];
}
else
{
	$sort_method = 'user_id';
}

if( isset($HTTP_POST_VARS['order']) )
{
	$sort_order = $HTTP_POST_VARS['order'];
}
else if( isset($HTTP_GET_VARS['order']) )
{
	$sort_order = $HTTP_GET_VARS['order'];
}
else
{
	$sort_order = '';
}


$template->set_filenames(array(
	'body' => 'admin/admin_users_list_body.tpl')
);

// Count users
$sql = "SELECT count(user_id) as total FROM ".USERS_TABLE." WHERE user_id > 0";
if(!$result = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, "Could not count users", "", __LINE__, __FILE__, $sql);
}
$row = $db->sql_fetchrow($result);
$total_users = $row['total'];


//groups
$sql = "SELECT group_id, group_name 
	FROM ".GROUPS_TABLE . "  
	WHERE group_single_user <> 1";
if ( !($result = $db->sql_query($sql)) ) 
{
	message_die(GENERAL_ERROR, 'Could not obtain list of groups', '', __LINE__, __FILE__, $sql);
}

$select_list = '<select name = "' . POST_GROUPS_URL . '"><option value = "-1">' . $lang['All_users'] . '</option>';
if ( $row = $db->sql_fetchrow($result) )
{
	do
	{
		$select_list .= '<option value = "' . $row['group_id'] . '">' . $row['group_name'] . '</option>';
	}
	while ( $row = $db->sql_fetchrow($result) );
}
$select_list .= '</select>';

$template->assign_vars(array(
	'L_SELECT_SORT_METHOD' => $lang['Select_sort_method'],
	'U_LIST_ACTION' => append_sid("admin_users_list.$phpEx"),
	'L_SORT' => $lang['Sort'],
	'L_ORDER' => $lang['Order'],

	'L_SEARCH' => $lang['Search'],

	'L_DOWNLOAD' => $lang['Download'],
	'ADMIN_LANG_CSV_DOWNLOAD' => $lang['admin_lang_csv_download'],
	'S_GROUP_SELECT' => $select_list,
	'S_FORUM_SELECT' => '<select name="fid">'.get_tree_option('', true, 'c1', '').'</select>',

	

	'L_USERNAME' => $lang['Username'],
	'L_POSTS' => $lang['Posts'],
	'L_EMAIL' => $lang['Email'],
	'L_LASTVISIT' => $lang['Last_visit'],
	'L_ACTION' => $lang['Action'],
	'L_JOINED' => $lang['Joined'],
	'L_USERLIST' => $lang['Users_List'],
	'L_TOTAL' => $lang['Total_users'],
	'L_ACTIVE' => $lang['Active'],
	'L_EDIT' => $lang['Manage'],
	'L_PERM' => $lang['Permissions'],

	'L_SORT_DESCENDING' => $lang['Sort_Descending'],
	'L_SORT_ASCENDING' => $lang['Sort_Ascending'],
	'ID_SELECTED' => ($sort_method == 'user_id') ? 'selected="selected"' : '',
	'USERNAME_SELECTED' => ($sort_method == 'username') ? 'selected="selected"' : '',
	'POSTS_SELECTED' => ($sort_method == 'user_posts') ? 'selected="selected"' : '',
	'LASTVISIT_SELECTED' => ($sort_method == 'user_lastvisit') ? 'selected="selected"' : '',
	'ACTIVE_SELECTED' => ($sort_method == 'user_active') ? 'selected="selected"' : '',
	'ASC_SELECTED' => ($sort_order != 'DESC') ? 'selected="selected"' : '',
	'DESC_SELECTED' => ($sort_order == 'DESC') ? 'selected="selected"' : '',
	'TOTAL_USERS' => $total_users
	)
);

// Query users info...
$sql = "SELECT user_id, username, user_email, user_regdate, user_lastvisit, user_posts, user_active
		FROM ".USERS_TABLE."
		WHERE user_id > 0
		ORDER BY " . $sort_method . " " . $sort_order . "
		LIMIT ".$start.",".$users_per_page;
if(!$result = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, "Could not query Users information", "", __LINE__, __FILE__, $sql);
}

while( $row = $db->sql_fetchrow($result) )
{
	$userrow[] = $row;
}

for ($i = 0; $i < $users_per_page; $i++)
{
	if (empty($userrow[$i]))
	{
		break;
	}

	$row_color = (($i % 2) == 0) ? "row1" : "row2";
	
	$template->assign_block_vars('userrow', array(
		'COLOR' => $row_color,
		'NUMBER' => $userrow[$i]['user_id'],
		'USERNAME' => $userrow[$i]['username'],
		'U_ADMIN_USER' => append_sid("admin_users.$phpEx?mode=edit&amp;" . POST_USERS_URL . "=" . $userrow[$i]['user_id']),
		'U_ADMIN_USER_AUTH' => append_sid("admin_ug_auth.$phpEx?mode=user&amp;" . POST_USERS_URL . "=" . $userrow[$i]['user_id']),
		'EMAIL' => $userrow[$i]['user_email'],
		'JOINED' => create_date($lang['DATE_FORMAT'], $userrow[$i]['user_regdate'], $board_config['board_timezone']),
		'LAST_VISIT' => (!$userrow[$i]['user_lastvisit']) ? '' : create_date($lang['DATE_FORMAT'], $userrow[$i]['user_lastvisit'], $board_config['board_timezone']),
		'POSTS' => $userrow[$i]['user_posts'],
		'ACTIVE' => ( $userrow[$i]['user_active'] ) ? $lang['Yes'] : $lang['No']
		) //end array
	);
} // end for

$template->assign_vars(array(
	'PAGINATION' => generate_pagination(append_sid("admin_users_list.$phpEx?sort=$sort_method&amp;order=$sort_order"), $total_users, $users_per_page, $start, FALSE),
	'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / $users_per_page ) + 1 ), ceil( $total_users / $users_per_page ))
	) // end array
);

// Finally...
$template->pparse('body');

include('./page_footer_admin.'.$phpEx);

?>