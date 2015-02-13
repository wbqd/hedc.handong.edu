<?php
/***************************************************************************
 *                            calendar.php
 *                            ------------
 *	begin				: 03/08/2003
 *	copyright			: Ptirhiik
 *	email				: admin@rpgnet-fr.com
 *
 *	version				: 1.0.5 - 14/09/2003
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

define('IN_PHPBB', true);
define('IN_CALENDAR', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.' . $phpEx);
@include($phpbb_root_path . 'profilcp/functions_profile.' . $phpEx);
include($phpbb_root_path . 'includes/functions_calendar.' . $phpEx);

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);
//
// End session management
//

//
//  get parameters
//

//
// set the page title and include the page header
//
$page_title = $lang['Calendar'];
include ($phpbb_root_path . 'includes/page_header.' . $phpEx);
//
// get paramters
//
$start_date = 0;
if (isset($HTTP_GET_VARS['start']))
{
	$p_date		= intval($HTTP_GET_VARS['start']);
	$year		= intval(substr($p_date, 0, 4));
	$month		= intval(substr($p_date, 4, 2));
	$day		= intval(substr($p_date, 6, 2));
	if (($year <= 0) || ($month <= 0) || ($day <= 0))
	{
		$year = 0;
	}
	if (!empty($year))
	{
		$start_date = mktime( 0,0,0, $month, $day, $year);
	}
}

if (isset($HTTP_POST_VARS['start_month']))
{
	$month	= intval($HTTP_POST_VARS['start_month']);
	$year	= intval($HTTP_POST_VARS['start_year']);
	if (($month > 0) && ($year > 0))
	{
		$start_date = mktime( 0,0,0, $month, 01, $year);
	}
}

if (empty($start_date) || ($start_date <= 0))
{
	$start_date = mktime( 0,0,0, intval(date('m', time())), intval(date('d', time())), intval(date('Y', time())) );
}

// get the forum id selected
$fid = '';
if ( isset($HTTP_POST_VARS['selected_id']) || isset($HTTP_GET_VARS['fid']) )
{
	$fid = isset($HTTP_POST_VARS['selected_id']) ? $HTTP_POST_VARS['selected_id'] : $HTTP_GET_VARS['fid'];
	if ($fid != 'Root')
	{
		$type = substr($fid, 0, 1);
		$id = intval(substr($fid, 1));
		if ( !in_array($type, array(POST_FORUM_URL, POST_CAT_URL)) )
		{
			$type = POST_CAT_URL;
			$id = 0;
		}
		$fid = $type . $id;
		if ($fid == POST_CAT_URL . '0')
		{
			$fid = 'Root';
		}
	}
}

//
// template name
//
$template->set_filenames(array(
	'body' => 'calendar_body.tpl')
);

// Header
$template->assign_vars(array(
	'L_CALENDAR'	=> $lang['Calendar'],
	'U_CALENDAR'	=> append_sid("./calendar.$phpEx"),
	)
);

display_calendar('CALENDAR_MONTH', 0, $start_date, $fid);

// system
$s_hidden_fields = '';
if (!isset($nav_separator))
{
	$nav_separator = '&nbsp;->&nbsp;';
}
$template->assign_vars(array(
	'NAV_SEPARATOR'		=> $nav_separator,
	'S_ACTION'			=> append_sid("./calendar.$phpEx"),
	'S_HIDDEN_FIELDS'	=> $s_hidden_fields,
	)
);

// send to browser
$template->pparse('body');
include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>