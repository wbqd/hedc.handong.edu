<?php

/***************************************************************************
 *                            qbar_setup.php
 *                            --------------
 *	begin			: 22/07/2003
 *	copyright		: Ptirhiik
 *	email			: admin@rpgnet-fr.com
 *	version			: 1.0.2 - 24/07/2003
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

//----------------------------------------------------------------------------
//	$qbar_maps[map_name]
//  --------------------
//		[class]				constant : class of bar : System, Bar, Menu
//		[display]			switch : do we display this qbar (System never are)
//		[cells]				value : number of cells used to display the bar before carriage return
//		[in_table]			switch : Do we draw a table around the qbar
//		[style]				value : Qbar specific to a style
//		[sub_template]		value : Qbar specific to a sub-template (optionnal) : *ALL means ignore
//		[fields]			array : options of the qbar
//			[shortcut]		value : lang[] key or value for the shortcut displayed
//			[alternate]		value : lang[] key or value for shortcut when pms are more than one
//			[explain]		value : lang[] key or value for the shortcut used as title or alt on mouseover
//			[icon]			value : images[] key or url to the icon
//			[use_value]		switch : we use the value to display
//			[use_icon]		switch : we use the icon to display
//			[url]			value : url of the prog to call while clicking on shortcut
//			[internal]		switch : does tbe program is in phpBB dirs ? if true, do append_sid() with
//			[auth_logged]	switch : ignore/required/denied to : the option will be display if
//			[auth_admin]	switch : ignore/required/denied to : admin user check
//			[auth_pm]		switch : ignore/new_pm/unread pm/no new nor unread : pm check
//			[tree_id]		value : if the user is authorized to the forum tree level (auth view)
//----------------------------------------------------------------------------

$qbar_maps = array(

	'MainMenu' => array(
		'class'			=> 'Menu',
		'display'		=> true,
		'cells'			=> 10,
		'in_table'		=> false,
		'style'			=> 0,
		'sub_template'	=> '',
		'fields'		=> array(
			'menu1' => array(
				'shortcut' 		=> '센터소개',
				'explain' 		=> '센터소개',
				'icon' 			=> 'menu1',
				'icon2' 		=> 'menu1_1',
				'use_icon' 		=> true,
				'url' 			=> 'index.php?c=12',
				'internal' 		=> true,
				'tree_id' 		=> 'c12',
			),
			'menu2' => array(
				'shortcut' 		=> '교수지원',
				'explain' 		=> '교수지원',
				'icon' 			=> 'menu2',
				'icon2' 		=> 'menu2_1',
				'use_icon' 		=> true,
				'url' 			=> 'index.php?c=7',
				'internal' 		=> true,
				'tree_id' 		=> 'c7',
			),
			'menu3' => array(
				'shortcut' 		=> '학습지원',
				'explain' 		=> '학습지원',
				'icon' 			=> 'menu3',
				'icon2' 		=> 'menu3_1',
				'use_icon' 		=> true,
				'url' 			=> 'index.php?c=8',
				'internal' 		=> true,
				'tree_id' 		=> 'c8',
			),
			'menu4' => array(
				'shortcut' 		=> '교육연구',
				'explain' 		=> '교육연구',
				'icon' 			=> 'menu4',
				'icon2' 		=> 'menu4_1',
				'use_icon' 		=> true,
				'url' 			=> 'index.php?c=10',
				'internal' 		=> true,
				'tree_id' 		=> 'c10',
			),
			'menu5' => array(
				'shortcut' 		=> '자료실',
				'explain' 		=> '자료실',
				'icon' 			=> 'menu5',
				'icon2' 		=> 'menu5_1',
				'use_icon' 		=> true,
				'url' 			=> 'index.php?c=9',
				'internal' 		=> true,
				'tree_id' 		=> 'c9',
			),
		),
	),

	'SubMenu' => array(
		'class'			=> 'Bar',
		'display'		=> true,
		'cells'			=> 10,
		'in_table'		=> false,
		'style'			=> 0,
		'sub_template'	=> '',
		'fields'		=> array(
			'HOME' => array(
				'shortcut' 		=> 'HOME',
				'explain' 		=> 'HOME',
				'use_value' 	=> true,
				'url' 			=> 'portal.php',
				'internal' 		=> true,
			),
			'검색' => array(
				'shortcut' 		=> 'SEARCH',
				'explain' 		=> '고급 검색',
				'use_value' 	=> true,
				'url' 			=> 'search.php',
				'internal' 		=> true,
			),
			'Statistics' => array(
				'shortcut' 		=> 'STATISTICS',
				'explain' 		=> '통계',
				'use_value' 	=> true,
				'url' 			=> 'statistics.php',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
				'auth_admin' 	=> 1,
			),
			'Memberlist' => array(
				'shortcut' 		=> 'USERLIST',
				'explain' 		=> '사용자 목록',
				'use_value' 	=> true,
				'url' 			=> 'memberlist.php',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
				'auth_admin' 	=> 1,
			),
			'Usergroups' => array(
				'shortcut' 		=> 'USERGROUPS',
				'explain' 		=> '사용자 그룹',
				'use_value' 	=> true,
				'url' 			=> 'groupcp.php',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
			),
			'PM_simple' => array(
				'shortcut' 		=> 'MESSAGE',
				'explain' 		=> '쪽지',
				'use_value' 	=> true,
				'url' 			=> 'privmsg.php',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
			),
			'Favorites' => array(
				'shortcut' 		=> 'FAVORITES',
				'explain' 		=> '글보관함',
				'use_value' 	=> true,
				'url' 			=> 'favorites.php',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
			),
			'Profile' => array(
				'shortcut' 		=> 'PROFILE',
				'explain' 		=> '개인정보수정',
				'use_value' 	=> true,
				'url' 			=> 'profile.php?mode=editprofile',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
			),
			'Admin_configuration_panel' => array(
				'shortcut' 		=> 'ADMIN',
				'explain' 		=> '관리자메뉴',
				'use_value' 	=> true,
				'url' 			=> 'admin/index.php',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
				'auth_admin' 	=> 1,
			),
			'Logout' => array(
				'shortcut' 		=> 'LOG OUT',
				'explain' 		=> '로그아웃',
				'use_value' 	=> true,
				'url' 			=> 'login.php?logout=true',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
			),
			'Login' => array(
				'shortcut' 		=> 'LOG IN',
				'explain' 		=> '로그인',
				'use_value' 	=> true,
				'url' 			=> 'login.php',
				'internal' 		=> true,
				'auth_logged' 	=> 2,
			),
			'Register' => array(
				'shortcut' 		=> 'SIGN UP',
				'explain' 		=> '회원가입',
				'use_value' 	=> true,
				'url' 			=> 'profile.php?mode=register',
				'internal' 		=> true,
				'auth_logged' 	=> 2,
			),
		),
	),

	'default_menu' => array(
		'class'			=> 'System',
		'display'		=> false,
		'cells'			=> 0,
		'in_table'		=> false,
		'style'			=> 0,
		'sub_template'	=> '',
		'fields'		=> array(
			'FAQ' => array(
				'shortcut' 		=> 'FAQ',
				'explain' 		=> 'FAQ_explain',
				'icon' 			=> 'menu_faq',
				'icon2' 		=> 'menu_faq',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'faq.php',
				'internal' 		=> true,
			),
			'Search' => array(
				'shortcut' 		=> 'Search',
				'explain' 		=> 'Search_explain',
				'icon' 			=> 'menu_search',
				'icon2' 		=> 'menu_search',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'search.php',
				'internal' 		=> true,
			),
			'Memberlist' => array(
				'shortcut' 		=> 'Memberlist',
				'explain' 		=> 'Memberlist_explain',
				'icon' 			=> 'menu_memberlist',
				'icon2' 		=> 'menu_memberlist',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'memberlist.php',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
			),
			'Usergroups' => array(
				'shortcut' 		=> 'Usergroups',
				'explain' 		=> 'Usergroups_explain',
				'icon' 			=> 'menu_usergroups',
				'icon2' 		=> 'menu_usergroups',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'groupcp.php',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
			),
			'Profile' => array(
				'shortcut' 		=> 'Profile',
				'explain' 		=> 'Profile_explain',
				'icon' 			=> 'menu_profile',
				'icon2' 		=> 'menu_profile',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'profile.php?mode=editprofile',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
			),
			'PM_simple' => array(
				'shortcut' 		=> 'Private_Messaging',
				'explain' 		=> 'Private_Messaging_explain',
				'icon' 			=> 'menu_messages',
				'icon2' 		=> 'menu_messages',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'privmsg.php?folder=inbox',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
			),
			'PM_Unlogged' => array(
				'shortcut' 		=> 'Login_check_pm',
				'explain' 		=> 'Private_Messaging_explain',
				'icon' 			=> 'menu_messages',
				'icon2' 		=> 'menu_messages',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'login.php',
				'internal' 		=> true,
				'auth_logged' 	=> 2,
			),
			'PM_New_text' => array(
				'shortcut' 		=> 'New_pm',
				'alternate' 	=> 'New_pms',
				'explain' 		=> 'Private_Messaging_explain',
				'icon' 			=> 'menu_messages',
				'icon2' 		=> 'menu_messages',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'privmsg.php?folder=inbox',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
				'auth_pm' 		=> 1,
			),
			'PM_Unread_text' => array(
				'shortcut' 		=> 'Unread_pm',
				'alternate' 	=> 'Unread_pms',
				'explain' 		=> 'Private_Messaging_explain',
				'icon' 			=> 'menu_messages',
				'icon2' 		=> 'menu_messages',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'privmsg.php?folder=inbox',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
				'auth_pm' 		=> 2,
			),
			'PM_No_new_text' => array(
				'shortcut' 		=> 'No_new_pm',
				'explain' 		=> 'Private_Messaging_explain',
				'icon' 			=> 'menu_messages',
				'icon2' 		=> 'menu_messages',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'privmsg.php?folder=inbox',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
				'auth_pm' 		=> 3,
			),
			'Register' => array(
				'shortcut' 		=> 'Register',
				'explain' 		=> 'Register_explain',
				'icon' 			=> 'menu_register',
				'icon2' 		=> 'menu_register',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'profile.php?mode=register',
				'internal' 		=> true,
				'auth_logged' 	=> 2,
			),
			'Login' => array(
				'shortcut' 		=> 'Login',
				'explain' 		=> 'Login_explain',
				'icon' 			=> 'menu_login',
				'icon2' 		=> 'menu_login',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'login.php',
				'internal' 		=> true,
				'auth_logged' 	=> 2,
			),
			'Logout' => array(
				'shortcut' 		=> 'Logout',
				'explain' 		=> 'Logout_explain',
				'icon' 			=> 'menu_logout',
				'icon2' 		=> 'menu_logout',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'login.php?logout=true',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
			),
			'Admin_configuration_panel' => array(
				'shortcut' 		=> 'Admin',
				'explain' 		=> 'Admin_explain',
				'icon' 			=> 'menu_admin',
				'icon2' 		=> 'menu_admin',
				'use_value' 	=> true,
				'use_icon' 		=> true,
				'url' 			=> 'admin/index.php',
				'internal' 		=> true,
				'auth_logged' 	=> 1,
				'auth_admin' 	=> 1,
			),
		),
	),

	// standard forum tree
	'default_tree' => array(
		'class'			=> 'System',
		'display'		=> false,
		'cells'			=> 0,
		'in_table'		=> false,
		'sub_template'	=> '*ALL',
		'fields'		=> array(
		),
	),
);

?>