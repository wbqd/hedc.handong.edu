<?php
/***************************************************************************
 *                                portal.php
 *                            -------------------
 *   begin                : Tuesday, August 13, 2002
 *   copyright            : (C) 2002 Smartor
 *   email                : smartor_xp@hotmail.com
 *
 *   $Id: portal.php,v 2.1.7 2003/01/30, 17:05:58 Smartor Exp $
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

/***************************************************************************
 *
 *   Some code in this file I borrowed from the original index.php, Welcome
 *   Avatar MOD and others...
 *
 ***************************************************************************/

//
// Set configuration for ezPortal
//

// Welcome Text: note that we are in PHP file, so use \' instead of ' and use \\ instead of \ (HTML enabled)
//$CFG['welcome_text'] = '';

// Number of news on portal
//$CFG['number_of_news'] = '5';

// Length of news
//$CFG['news_length'] = '20000';

// News Forum ID: separate by comma for multi-forums, eg. '1,2,5'
//$CFG['news_forum'] = '5';

// Poll Forum ID: separate by comma for multi-forums, eg. '3,8,14'
//$CFG['poll_forum'] = '17';

// Number of Recent Topics (not Forum ID)
//$CFG['number_recent_topics'] = '15';

// Exceptional Forums for Recent Topics, eg. '2,4,10' (note: my Recent Topics script has its own permission checking, so you can leave this variable blank)
//$CFG['exceptional_forums'] = '2,5,17,13,14,15,21,22,23';

//
// END configuration
// --------------------------------------------------------

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . 'fetchposts.'.$phpEx);
// Change Style
include($phpbb_root_path . 'includes/functions_selects.'.$phpEx);
include($phpbb_root_path . 'includes/functions_post.'.$phpEx);
//calendar
@include($phpbb_root_path . 'profilcp/functions_profile.' . $phpEx);
include($phpbb_root_path . 'includes/functions_calendar.' . $phpEx);
include($phpbb_root_path . 'includes/functions_topics_list.' . $phpEx);

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);
//
// End session management
//


// Define censored word matches
$orig_word = array();
$replacement_word = array();
obtain_word_list($orig_word, $replacement_word);

//print_r($tree);
//print_r($keys);

//
// If you don't use these stats on your index you may want to consider
// removing them
//
$total_posts = get_db_stat('postcount');
$total_users = get_db_stat('usercount');
$total_topics = get_db_stat('topiccount');
$newest_userdata = get_db_stat('newestuser');
$newest_user = $newest_userdata['username'];
$newest_uid = $newest_userdata['user_id'];

if( $total_posts == 0 )
{
	$l_total_post_s = $lang['Posted_articles_zero_total'];
}
else if( $total_posts == 1 )
{
	$l_total_post_s = $lang['Posted_article_total'];
}
else
{
	$l_total_post_s = $lang['Posted_articles_total'];
}

if( $total_users == 0 )
{
	$l_total_user_s = $lang['Registered_users_zero_total'];
}
else if( $total_users == 1 )
{
	$l_total_user_s = $lang['Registered_user_total'];
}
else
{
	$l_total_user_s = $lang['Registered_users_total'];
}

// Read Portal Configuration from DB
define('PORTAL_TABLE', $table_prefix.'portal');

$CFG = array();
$sql = "SELECT * FROM " . PORTAL_TABLE;

if( !($result = $db->sql_query($sql)) )
{
	message_die(CRITICAL_ERROR, "Could not query config information", "", __LINE__, __FILE__, $sql);
}

while ( $row = $db->sql_fetchrow($result) )
{
	$CFG[$row['portal_name']] = $row['portal_value'];
}


//
// Recent Topics
//
$sql = "SELECT * FROM ". FORUMS_TABLE . " ORDER BY forum_id";
if (!$result = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, 'Could not query forums information', '', __LINE__, __FILE__, $sql);
}
$forum_data = array();
while( $row = $db->sql_fetchrow($result) )
{
	$forum_data[] = $row;
}

$is_auth_ary = array();
$is_auth_ary = auth(AUTH_ALL, AUTH_LIST_ALL, $userdata, $forum_data);

if( $CFG['exceptional_forums'] == '' )
{
	$except_forum_id = '\'start\'';
}
else
{
	$except_forum_id = $CFG['exceptional_forums'];
}

for ($i = 0; $i < count($forum_data); $i++)
{
	if (!$is_auth_ary[$forum_data[$i]['forum_id']]['auth_view'])
	{
		if ($except_forum_id == '\'start\'')
		{
			$except_forum_id = $forum_data[$i]['forum_id'];
		}
		else
		{
			$except_forum_id .= ',' . $forum_data[$i]['forum_id'];
		}
	}
}
$sql = "SELECT t.topic_id, t.topic_title, t.topic_last_post_id, t.forum_id, p.post_id, p.poster_id, p.post_username, p.post_time, u.user_id, u.username
		FROM " . TOPICS_TABLE . " AS t, " . POSTS_TABLE . " AS p, " . USERS_TABLE . " AS u
		WHERE t.forum_id NOT IN (" . $except_forum_id . ")
			AND t.topic_status <> 2
			AND p.post_id = t.topic_last_post_id
			AND p.poster_id = u.user_id
		ORDER BY p.post_id DESC
		LIMIT " . $CFG['number_recent_topics'];
if (!$result = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, 'Could not query recent topics information', '', __LINE__, __FILE__, $sql);
}
$number_recent_topics = $db->sql_numrows($result);
$recent_topic_row = array();
while ($row = $db->sql_fetchrow($result))
{
	$recent_topic_row[] = $row;
}


for ($i = 0; $i < $number_recent_topics; $i++)
{
	$recent_topic_row[$i]['topic_title'] = str_cut($recent_topic_row[$i]['topic_title'], 28, '...');

	$new_img = '';
	
	if((time() - $recent_topic_row[$i]['post_time']) < ($board_config['new_length']*3600)) 
	{
		$new_img = '<img src="' . $images['icon_newest_reply2'] . '" border="0" />';
	}

	$template->assign_block_vars('recent_topic_row', array(
		'U_TITLE' => append_sid("viewtopic.$phpEx?" . POST_POST_URL . '=' . $recent_topic_row[$i]['post_id']) . '#' .$recent_topic_row[$i]['post_id'],
		'L_TITLE' => ( count($orig_word) ) ? preg_replace($orig_word, $replacement_word, $recent_topic_row[$i]['topic_title']) : $recent_topic_row[$i]['topic_title'],
		'U_POSTER' => append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $recent_topic_row[$i]['user_id']),
		'NEW_IMG' => $new_img,
		'S_POSTER' => (( $recent_topic_row[$i]['user_id'] != ANONYMOUS ) ? $recent_topic_row[$i]['username'] : ( ( $recent_topic_row[$i]['post_username'] != '' ) ? $recent_topic_row[$i]['post_username'] : "Guest" )),
		'S_POSTTIME' => create_date('Y/m/d', $recent_topic_row[$i]['post_time'], $board_config['board_timezone'])
		)
	);
}
//
// END - Recent Topics
//


//
// Get Banner Pic
//

$sql = "SELECT d.width, d.height, d.border, d.attach_id, d.physical_filename, d.real_filename, d.download_count, d.comment, d.filesize, d.thumbnail, d.filetime, p.post_id, p.post_username, p.post_time, u.username, u.user_id, t.topic_title, t.forum_id, pt.remark1, pt.remark2 
		FROM " . ATTACHMENTS_TABLE . " a, " . ATTACHMENTS_DESC_TABLE . " d, " . POSTS_TABLE . " p, " . USERS_TABLE . " u, " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f, " . POSTS_TEXT_TABLE . " pt 
		WHERE (d.attach_id = a.attach_id) AND (a.post_id = p.post_id) AND (p.poster_id = u.user_id) AND (p.topic_id = t.topic_id) AND (a.privmsgs_id = 0) AND (d.width > 0) AND (p.forum_id = f.forum_id) AND pt.post_id = p.post_id AND (f.forum_id = " .$CFG['banner_forum']. ") 
		ORDER BY p.post_time ASC";

if (!$result = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, 'Could not query album information', '', __LINE__, __FILE__, $sql);
}

//message_die(GENERAL_ERROR, 'Could not query album information', '', __LINE__, __FILE__, $sql);

$banner_row = array();
while ($row = $db->sql_fetchrow($result))
{
	$banner_row[] = $row;
}


for ($i = 0; $i < count($banner_row); $i++)
{	
	$banner_img = $upload_dir . '/' . $banner_row[$i]['physical_filename'];

	$template->assign_block_vars('banner_row', array(
		'U_LINK' => $banner_row[$i]['remark1'],
		'TARGET' => $banner_row[$i]['remark2'],
		'BANNER' => $banner_img,
		'TITLE' => $banner_row[$i]['topic_title'],
		)
	);
}



//
// Get Pop-up
//

$sql = "SELECT pt.post_id, pt.remark1, pt.remark2, pt.remark3, pt.remark4, pt.remark5, pt.remark6, pt.remark7, pt.remark8, pt.remark9   
		FROM " . POSTS_TABLE . " p, " . POSTS_TEXT_TABLE . " pt     
		WHERE (p.forum_id = " .$CFG['popup_board']. ") AND pt.post_id = p.post_id AND pt.remark1 = 1 
		ORDER BY p.post_id DESC";

if (!$result = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, 'Could not query Pop-up information', '', __LINE__, __FILE__, $sql);
}

$row = array();

while ($row = $db->sql_fetchrow($result))
{		
	$template->assign_block_vars('popup_row', array(
		'U_LINK' => append_sid("viewtopic.$phpEx?PopTop=".$row['remark6']."&PopLeft=".$row['remark7']."&popup=yes&" . POST_POST_URL . '=' . $row['post_id']),
		'ID' => $row['post_id'],
		'WIDTH' => $row['remark2'],
		'HEIGHT' => $row['remark3'],
		'X' => $row['remark4'],
		'Y' => $row['remark5'],	
		'SCROLLBARS' => $row['remark8'],
		'RESIZABLE' => $row['remark9'],	
		)
	);
}

//
// Get Flash-INFO
//

$sql = "SELECT d.width, d.height, d.border, d.attach_id, d.physical_filename, d.real_filename, d.download_count, d.comment, d.filesize, d.thumbnail, d.filetime, p.post_id, p.post_username, p.post_time, u.username, u.user_id, t.topic_title, t.forum_id
	FROM " . ATTACHMENTS_TABLE . " a, " . ATTACHMENTS_DESC_TABLE . " d, " . POSTS_TABLE . " p, " . USERS_TABLE . " u, " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f
	WHERE (d.attach_id = a.attach_id) AND (a.post_id = p.post_id) AND (p.poster_id = u.user_id) AND (p.topic_id = t.topic_id) AND (a.privmsgs_id = 0) AND (p.forum_id = f.forum_id) AND (f.forum_id = 49) 
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


//
// Get Newest Pic
//

	$sql = "SELECT d.width, d.height, d.border, d.attach_id, d.physical_filename, d.real_filename, d.download_count, d.comment, d.filesize, d.thumbnail, d.filetime, p.post_id, p.post_username, p.post_time, u.username, u.user_id, t.topic_title, t.forum_id
		FROM " . ATTACHMENTS_TABLE . " a, " . ATTACHMENTS_DESC_TABLE . " d, " . POSTS_TABLE . " p, " . USERS_TABLE . " u, " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f
		WHERE (d.attach_id = a.attach_id) AND (a.post_id = p.post_id) AND (p.poster_id = u.user_id) AND (p.topic_id = t.topic_id) AND (a.privmsgs_id = 0) AND (d.width > 0) AND (d.thumbnail = 1) AND (p.forum_id = f.forum_id) AND (f.cat_id = " .$CFG['pic_category']. ") 
		ORDER BY d.filetime DESC LIMIT 0,1";

if (!$result = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, 'Could not query album information', '', __LINE__, __FILE__, $sql);
}

$picrow = $db->sql_fetchrow($result);


$picrow['thumbnail'] = $upload_dir . '/' . ( ($picrow['thumbnail']) ? THUMB_DIR . '/t_' : '' ) . $picrow['physical_filename'];
$size = get_img_size_format($picrow['width'], $picrow['height']);
$picrow['thumbnail'] = $picrow['thumbnail'] . '" width="' . $size[0] . '" height="' . $size[1];

$thumb_filename_only = $upload_dir . '/' . THUMB_DIR . '/t_' . $picrow['physical_filename'];

$size = image_getdimension($thumb_filename_only);

$thumb_width = $size[0];
$thumb_height = $size[1];


//
// Get Extra-list : modified
//

$extra_no = 2;
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
		WHERE  ". $attach_sql_3. " (p.post_id = t.topic_first_post_id) AND (p.forum_id = f.forum_id) AND pt.post_id = p.post_id AND (p.poster_id = u.user_id)  AND (p.forum_id = 194)  
		ORDER BY p.post_id DESC LIMIT 0, 2";

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

//
// Get Extra-list : modified
//

$extra_no = 3;
$forum_no = 64;
$title_length = 24;
$use_attach = true;

$attach_sql_1 = "";
$attach_sql_2 = "";
$attach_sql_3 = "";
if($use_attach){
	$attach_sql_1 = "d.width, d.height, d.border, d.attach_id, d.physical_filename, d.real_filename, d.download_count, d.comment, d.filesize, d.thumbnail, d.filetime,";
	$attach_sql_2 = ATTACHMENTS_TABLE . " a, " . ATTACHMENTS_DESC_TABLE . " d, ";
	$attach_sql_3 = "(d.attach_id = a.attach_id) AND (a.post_id = p.post_id) AND (d.width > 0) AND (a.privmsgs_id = 0) AND ";
}


$sql = "SELECT ". $attach_sql_1 ." p.post_id, p.post_username, p.post_time, t.topic_id, t.topic_title, t.topic_time, t.forum_id, pt.remark1, pt.remark2, pt.remark3, pt.remark4, pt.remark5, pt.remark6, pt.remark7, pt.remark8, pt.remark9, pt.remark10, pt.remark11, pt.remark12, pt.remark13, pt.remark14, pt.remark15, u.user_id, u.username   
		FROM ". $attach_sql_2 . POSTS_TABLE . " p, " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f, " . POSTS_TEXT_TABLE . " pt, " . USERS_TABLE . " AS u 
		WHERE  ". $attach_sql_3. " (p.post_id = t.topic_first_post_id) AND (p.forum_id = f.forum_id) AND pt.post_id = p.post_id AND (p.poster_id = u.user_id)  AND (p.forum_id = f.forum_id) AND (p.forum_id = 207)  
		ORDER BY p.post_id DESC LIMIT 0, 10";

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

	if(strstr($extra_row[$i]['remark1'], '⌒')) list($dump,$extra_row[$i]['remark1']) = explode("⌒",$extra_row[$i]['remark1']);
	if(strstr($extra_row[$i]['remark2'], '⌒')) list($dump,$extra_row[$i]['remark2']) = explode("⌒",$extra_row[$i]['remark2']);
	if(strstr($extra_row[$i]['remark3'], '⌒')) list($dump,$extra_row[$i]['remark3']) = explode("⌒",$extra_row[$i]['remark3']);
	if(strstr($extra_row[$i]['remark4'], '⌒')) list($dump,$extra_row[$i]['remark4']) = explode("⌒",$extra_row[$i]['remark4']);
	if(strstr($extra_row[$i]['remark5'], '⌒')) list($dump,$extra_row[$i]['remark5']) = explode("⌒",$extra_row[$i]['remark5']);
	if(strstr($extra_row[$i]['remark6'], '⌒')) list($dump,$extra_row[$i]['remark6']) = explode("⌒",$extra_row[$i]['remark6']);
	if(strstr($extra_row[$i]['remark7'], '⌒')) list($dump,$extra_row[$i]['remark7']) = explode("⌒",$extra_row[$i]['remark7']);
	if(strstr($extra_row[$i]['remark8'], '⌒')) list($dump,$extra_row[$i]['remark8']) = explode("⌒",$extra_row[$i]['remark8']);
	if(strstr($extra_row[$i]['remark9'], '⌒')) list($dump,$extra_row[$i]['remark9']) = explode("⌒",$extra_row[$i]['remark9']);
	if(strstr($extra_row[$i]['remark10'], '⌒')) list($dump,$extra_row[$i]['remark10']) = explode("⌒",$extra_row[$i]['remark10']);
	if(strstr($extra_row[$i]['remark11'], '⌒')) list($dump,$extra_row[$i]['remark11']) = explode("⌒",$extra_row[$i]['remark11']);
	if(strstr($extra_row[$i]['remark12'], '⌒')) list($dump,$extra_row[$i]['remark12']) = explode("⌒",$extra_row[$i]['remark12']);
	if(strstr($extra_row[$i]['remark13'], '⌒')) list($dump,$extra_row[$i]['remark13']) = explode("⌒",$extra_row[$i]['remark13']);
	if(strstr($extra_row[$i]['remark14'], '⌒')) list($dump,$extra_row[$i]['remark14']) = explode("⌒",$extra_row[$i]['remark14']);
	if(strstr($extra_row[$i]['remark15'], '⌒')) list($dump,$extra_row[$i]['remark15']) = explode("⌒",$extra_row[$i]['remark15']);

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
		'S_POSTTIME' => create_date('Y-m-d', $extra_row[$i]['post_time'], $board_config['board_timezone']),

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

	if ($i != 0)  
	{
		$template->assign_block_vars('extra_row_'.$extra_no.'.not_first', array());
	}

	if($i%5 == 4) {        // 이 줄부터 아래의 코드를 추가로 삽입하면 됨~ 한줄에 5개씩 보이고 싶을때의 코드임.
		$template->assign_block_vars('extra_row_'.$extra_no.'.switch_newline', array());
	}
	else {
		$template->assign_block_vars('extra_row_'.$extra_no.'.switch_not_newline', array());
	}


}

//
// END - Extra-list
//

//
// Get Extra-list : modified
//

$extra_no = 4;
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
		WHERE  ". $attach_sql_3. " (p.post_id = t.topic_first_post_id) AND (p.forum_id = f.forum_id) AND pt.post_id = p.post_id AND (p.poster_id = u.user_id)  AND (p.forum_id = 115)  
		ORDER BY p.post_id DESC LIMIT 0, 3";

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
		'S_POSTTIME' => create_date('Y-m-d', $extra_row[$i]['post_time'], $board_config['board_timezone']),

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

if( $userdata['session_logged_in'] )
{
	$sql = "SELECT COUNT(post_id) as total
			FROM " . POSTS_TABLE . "
			WHERE post_time >= " . $userdata['user_lastvisit'];
	$result = $db->sql_query($sql);
	if( $result )
	{
		$row = $db->sql_fetchrow($result);
		$lang['Search_new'] = $lang['Search_new'] . "&nbsp;(" . $row['total'] . ")";
	}
}

//
// Start output of page
//
define('SHOW_ONLINE', true);
$page_title = $lang['Home'];
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

$template->set_filenames(array(
	'body' => 'portal_body.tpl')
);

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
// Check For Anonymous User
if ($userdata['user_id'] != '-1')
{
	$name_link = '<a href="' . append_sid("profile.$phpEx?mode=editprofile&amp;" . $userdata['user_id']) . '">' . $userdata['username'] . '</a>';
}
else
{
	$name_link = $lang['Guest'];
}
//
// END: Avatar On Index MOD
//

// Change Style
$fpage_style = $userdata['user_style'];
if(isset($HTTP_POST_VARS['fpage_theme']))
{
	$fpage_theme = intval($HTTP_POST_VARS['fpage_theme']);
	$fpuser_id = $userdata['user_id'];
	$fp_sql = "UPDATE " . USERS_TABLE . " SET user_style = '$fpage_theme' WHERE user_id = $fpuser_id";
	if ( !($fp_result = $db->sql_query($fp_sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not update users table ' . "$user_id $fpage_theme", '', __LINE__, __FILE__, $sql);
	}
	else
	{
		$fp_message = $lang['Profile_updated'] . '<br /><br />' . sprintf($lang['Click_return_index'],  '<a href="' . append_sid("portal.$phpEx") . '">', '</a>');
		message_die(GENERAL_MESSAGE, $fp_message);
	}
}

$template->assign_vars(array(
	'WELCOME_TEXT' => $CFG['welcome_text'],
	'HTML_AREA' => $CFG['html_area'],
	'TOTAL_POSTS' => sprintf($l_total_post_s, $total_posts),
	'TOTAL_USERS' => sprintf($l_total_user_s, $total_users),
	'TOTAL_TOPICS' => sprintf($lang['total_topics'], $total_topics),
	'NEWEST_USER' => sprintf($lang['Newest_user'], '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$newest_uid") . '">', $newest_user, '</a>'),
	'L_FORUM' => $lang['Forum'],
	'L_BOARD_NAVIGATION' => $lang['Board_navigation'],
	'L_STATISTICS' => $lang['Statistics'],	
	'L_ANNOUNCEMENT' => $lang['Post_Announcement'],
	'L_POSTED' => $lang['Posted'],
	'L_COMMENTS' => $lang['Comments'],
	'L_VIEW_COMMENTS' => $lang['View_comments'],
	'L_POST_COMMENT' => $lang['Post_your_comment'],
	'L_SEND_PASSWORD' => $lang['Forgotten_password'],
	'U_SEND_PASSWORD' => append_sid("profile.$phpEx?mode=sendpassword"),
	'L_REGISTER_NEW_ACCOUNT' => sprintf($lang['Register_new_account'], '<a href="' . append_sid("profile.$phpEx?mode=register") . '">', '</a>'),
	'U_REGISTER_NEW_ACCOUNT' => append_sid("profile.$phpEx?mode=register"),
	'L_REMEMBER_ME' => $lang['Remember_me'],
	'L_VIEW_COMPLETE_LIST' => $lang['View_complete_list'],
	'L_POLL' => $lang['Poll'],
	'L_VOTE_BUTTON' => $lang['Vote'],
	'NO_VOTE_OPTION' => $lang['No_vote_option'],
	'SUBMIT_VOTE' => $lang['Submit_vote'],
	'VIEW_RESULTS' => $lang['View_results'],
	//profile
	'U_VIEWPROFILE' => append_sid("profile.$phpEx?mode=viewprofile&amp;u=" . $userdata['user_id']),
	'U_EDITPROFILE' => append_sid("profile.$phpEx?mode=editprofile"),
	'PROFILE_NAME' => $userdata['username'],

	// Change Style
	'TEMPLATE_SELECT' => style_select($board_config['default_style'], 'template'),
	'L_SELECT_STYLE' => $lang['Change_style'],
	'L_CHANGE_NOW' => $lang['Go'],
	'FPAGE_STYLE' => style_select($fpage_style, 'fpage_theme'),
	// Recent Topics
	'L_RECENT_TOPICS' => $lang['Recent_topics'],
	// Photo Album
	'L_NEWEST_PIC' => $lang['Newest_pic'],
	'PIC_IMAGE' => $picrow['thumbnail'],
	'PIC_TITLE' => $picrow['topic_title'],
	'PIC_POSTER' => (( $picrow['user_id'] != ANONYMOUS ) ? $picrow['username'] : ( ( $picrow['post_username'] != '' ) ? $picrow['post_username'] : "Guest" )),
	'U_PIC_LINK' => append_sid('viewtopic.' . $phpEx . '?p=' . $picrow['post_id']),
	'PIC_TIME' => create_date('Y/m/d', $picrow['filetime'], $board_config['board_timezone']),
	'U_PIC_POSTER' => append_sid("profile.$phpEx?mode=viewprofile&amp;u=" . $picrow['user_id']),

	'THUMBNAIL_ONLY'		=> $thumb_filename_only,
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

	'IMAGEBOX'		=> $imageBox,
	'TEXTBOX'		=> $textBox,
	'TEXTBOX_X'		=> $textBox_x,
	'TEXTBOX_Y'		=> $textBox_y,

	// Search
	'L_SEARCH_AT' => $lang['Search_at'],
	'L_ADVANCED_SEARCH' => $lang['Advanced_search'],
	// Welcome Avatar
	'L_NAME_WELCOME' => $lang['Welcome'],
	'U_NAME_LINK' => $name_link,
	'AVATAR_IMG' => $avatar_img)
);

//
// Fetch Posts from Announcements Forum
//
if(!isset($HTTP_GET_VARS['article']))
{
	$template->assign_block_vars('welcome_text', array());

	$fetchposts = phpbb_fetch_posts($CFG['news_forum'], $CFG['number_of_news'], $CFG['news_length']);

	for ($i = 0; $i < count($fetchposts); $i++)
	{
		if( $fetchposts[$i]['striped'] == 1 )
		{
			$open_bracket = '[ ';
			$close_bracket = ' ]';
			$read_full = $lang['Read_Full'];
		}
		else
		{
			$open_bracket = '';
			$close_bracket = '';
			$read_full = '';
		}

		$fetchposts[$i]['post_text'] = unprepare_message($fetchposts[$i]['post_text']);

		$fetchposts[$i]['topic_title'] = str_cut($fetchposts[$i]['topic_title'], 42, '...');

		$new_img = '';
	
		if((time() - $fetchposts[$i]['topic_time_original']) < ($board_config['new_length']*3600)) 
		{
			$new_img = '<img src="' . $images['icon_newest_reply2'] . '" border="0" />';
		}

		$template->assign_block_vars('fetchpost_row', array(
			'TITLE' => ( count($orig_word) ) ? preg_replace($orig_word, $replacement_word, $fetchposts[$i]['topic_title']) : $fetchposts[$i]['topic_title'],
			'POSTER' => $fetchposts[$i]['username'],
			'TIME' => $fetchposts[$i]['topic_time'],
			'TEXT' => $fetchposts[$i]['post_text'],
			'REPLIES' => $fetchposts[$i]['topic_replies'],
			'U_VIEW_COMMENTS' => append_sid('viewtopic.' . $phpEx . '?t=' . $fetchposts[$i]['topic_id']),
			'U_POST_COMMENT' => append_sid('posting.' . $phpEx . '?mode=reply&amp;t=' . $fetchposts[$i]['topic_id']),
			'U_READ_FULL' => append_sid('portal.' . $phpEx . '?article=' . $i),
			'L_READ_FULL' => $read_full,
			'NEW_IMG' => $new_img,
			'OPEN' => $open_bracket,
			'CLOSE' => $close_bracket)
		);
	}
}
else
{
	$fetchposts = phpbb_fetch_posts($CFG['news_forum'], $CFG['number_of_news'], 0);

	$i = intval($HTTP_GET_VARS['article']);

	$template->assign_block_vars('fetchpost_row', array(
		'TITLE' => $fetchposts[$i]['topic_title'],
		'POSTER' => $fetchposts[$i]['username'],
		'TIME' => $fetchposts[$i]['topic_time'],
		'TEXT' => $fetchposts[$i]['post_text'],
		'REPLIES' => $fetchposts[$i]['topic_replies'],
		'U_VIEW_COMMENTS' => append_sid('viewtopic.' . $phpEx . '?t=' . $fetchposts[$i]['topic_id']),
		'U_POST_COMMENT' => append_sid('posting.' . $phpEx . '?mode=reply&amp;t=' . $fetchposts[$i]['topic_id'])
		)
	);
}
//
// END: Fetch Announcements
//


//
// Fetch Poll
//
$fetchpoll = phpbb_fetch_poll($CFG['poll_forum']);

if (!empty($fetchpoll))
{
	$template->assign_vars(array(		
		'S_POLL_QUESTION' => $fetchpoll['vote_text'],
		'S_POLL_ACTION' => append_sid('posting.'.$phpEx.'?'.POST_TOPIC_URL.'='.$fetchpoll['topic_id']),
		'S_TOPIC_ID' => $fetchpoll['topic_id'],
		'L_SUBMIT_VOTE' => $lang['Submit_vote'],		
		'L_LOGIN_TO_VOTE' => $lang['Login_to_vote'],		
		'U_VIEW_RESULT' => append_sid('viewtopic.' . $phpEx . '?t=' . $fetchpoll['topic_id']. '&vote=viewresult')
		)
	);

	for ($i = 0; $i < count($fetchpoll['options']); $i++)
	{
		$template->assign_block_vars('poll_option_row', array(
			'OPTION_ID' => $fetchpoll['options'][$i]['vote_option_id'],
			'OPTION_TEXT' => $fetchpoll['options'][$i]['vote_option_text'],
			'VOTE_RESULT' => $fetchpoll['options'][$i]['vote_result'],
			)
		);
	}
	if ( !$userdata['session_logged_in'] && count($fetchpoll['options'])>0)
	{
		$template->assign_block_vars('switch_user_logged_out_and_poll_option_row', array());
	}
	else if ( $userdata['session_logged_in'] && count($fetchpoll['options'])>0)
	{
		$template->assign_block_vars('switch_user_logged_in_and_poll_option_row', array());
	}
}
else
{
	$template->assign_vars(array(		
		'S_POLL_QUESTION' => $lang['No_poll'],
		'DISABLED' => 'disabled="disabled"'
		)
	);
}

// Calendar

// some constants
$set_of_months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
$set_of_days = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');

$now_year = date('Y', time());
$now_month = date('m', time());
$now_day = date('d', time());

//
//  get parameters
//
// date
$date = 0;
if ( isset($HTTP_POST_VARS['date']) || isset($HTTP_GET_VARS['d']) )
{
	$date = isset($HTTP_POST_VARS['date']) ? intval($HTTP_POST_VARS['date']) : intval($HTTP_GET_VARS['d']);
}
if ($date == 0)
{
	$date = time();
}

// date per jumpbox
$start_month = intval($HTTP_POST_VARS['start_month']);
$start_year = intval($HTTP_POST_VARS['start_year']);
if ( !empty($start_month) && !empty($start_year) )
{
	$day = 01;
	if($start_month == $now_month && $start_year == $now_year) {
		$day = $now_day;
	}
	$date = mktime(0,0,0, $start_month, $day, $start_year);
}

// mode
$mode = '';
if ( isset($HTTP_POST_VARS['mode']) || isset($HTTP_GET_VARS['mode']) )
{
	$mode = isset($HTTP_POST_VARS['mode']) ? $HTTP_POST_VARS['mode'] : $HTTP_GET_VARS['mode'];
}
if ( !in_array($mode, array('hour')) )
{
	$mode = '';
}
// start
$start = 0;
if ( isset($HTTP_POST_VARS['start']) || isset($HTTP_GET_VARS['start']) )
{
	$start = isset($HTTP_POST_VARS['start']) ? $HTTP_POST_VARS['start'] : $HTTP_GET_VARS['start'];
}

// get the period
$year	= date('Y', $date);
$month	= date('m', $date);
$day	= date('d', $date);
$hour	= date('H', $date);
$min	= date('i', $date);
if ($mode == 'hour')
{
	$start_date	= mktime($hour, 0, 0, $month, $day, $year);
	$end_date	= mktime($hour+1, 0, 0, $month, $day, $year);
}
else
{
	$start_date	= mktime(0, 0, 0, $month, $day, $year);
	$end_date	= mktime(0 ,0 ,0, $month, $day+1, $year);
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
		if ( ($id == 0) || !in_array($type, array(POST_FORUM_URL, POST_CAT_URL)) )
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
// get the month events
//
$month_start = mktime(0,0,0, $month, 01, $year);
$month_end	 = mktime(0,0,0, $month+1, 01, $year);
$number = 0;
$events	= array();
get_event_PCP_birthday($events, $number, $month_start, $month_end);
get_event_topics($events, $number, $month_start, $month_end, false, 0, -1, $fid);

// get the days with events
$days = array();
for ($i=0; $i < count($events); $i++)
{
	// set the event on the month viewed
	$calendar_start = $events[$i]['event_calendar_time'];
	$calendar_end =  $events[$i]['event_calendar_time'] + $events[$i]['event_calendar_duration'];
	if ($calendar_start < $month_start) $calendar_start = $month_start;
	if ($calendar_end >= $month_end) $calendar_end = $month_end-1;
	$wstart = intval(date('d', $calendar_start));
	$wend = intval(date('d', $calendar_end));
	for ($j = $wstart; $j <= $wend; $j++)
	{
		$days[$j] = true;
	}
}
//
// get the day events
//
$events = array();

// birthday
$birthdays_count = 0;
$remaining = $board_config['topics_per_page'];
get_event_PCP_birthday($events, $birthdays_count, $start_date, $end_date, true, $start, $remaining);
$displayed = count($events)-1;
if ($displayed < 0) $displayed = 0;

// topics
$topics_count = 0;
$remaining = $board_config['topics_per_page'] - $displayed;
$local_start = $start-$displayed;
get_event_topics($events, $topics_count, $start_date, $end_date, true, $local_start, $remaining, $fid);


// send the month box
$first_day_of_week = isset($board_config['calendar_week_start']) ? intval($board_config['calendar_week_start']) : 1;

// buid select list for month
$s_month = '';
for ($i=0; $i < count($set_of_months); $i++)
{
	$selected = ($month == $i+1) ? ' selected="selected"' : '';
	$s_month .= '<option value="' . ($i+1) . '"' . $selected . '>' . $lang['datetime'][ $set_of_months[$i] ] . '</option>';
}
$s_month = sprintf('<select name="start_month" class="yearMonth"  onchange="forms[\'_calendar_scheduler\'].submit();">%s</select>', $s_month);

// buid select list for year
$year = intval(date('Y', $start_date));
$s_year = '<select name="start_year" class="yearMonth" onchange="forms[\'_calendar_scheduler\'].submit();">';
for ($i=1971; $i < 2070; $i++)
{
	$selected = ($year == $i) ? ' selected="selected"' : '';
	$s_year .= '<option value="' . $i . '"' . $selected . '>' . $i . '</option>';
}
$s_year .= '</select>';

// send header
$k = $first_day_of_week;
for ($i=0; $i <= 6; $i++)
{
	$template->assign_block_vars('header_cell', array(
		'L_DAY' => $lang['datetime'][ $set_of_days[$k] ],
		)
	);
	$k++;
	if ($k > 6) $k = 0;
}

$prec = mktime(0,0,0, $month-1, $day, $year);
$next = mktime(0,0,0, $month+1, $day, $year);

// get first day of the month
$offset		= date('w', mktime(0,0,0, $month, 01, $year)) - $first_day_of_week;
if ($offset < 0) $offset = $offset + 7;
$offset		= mktime(0,0,0, $month, 01-$offset, $year);
$nb_days	= intval((mktime(0,0,0, $month+1, 01, $year) - $offset) / 86400);
$nb_rows	= intval($nb_days / 7);

$start_m	= mktime(0,0,0, $month, 01, $year);
$end_m		= mktime(0,0,0, $month+1, 01, $year);
$today		= mktime(0,0,0, $now_month, $now_day, $now_year);
if (($nb_days % 7) > 0)
{
	$nb_rows++;
}

$color = false;
for ($j=0; $j < $nb_rows; $j++)
{
	$template->assign_block_vars('row', array());
	$color = !$color;
	for ($i=0; $i <= 6; $i++)
	{
		$cur = intval(date('d', $offset));
		/*
		$class = ($color) ? 'calrow1' : 'calrow2';
		if (($offset < $start_m) || ($offset >= $end_m))
		{
			$cur = '&nbsp;';
			$class = 'calrow3';
		}
		*/
		$class = ($color) ? 'calendar' : 'calendar';
		if (($offset < $start_m) || ($offset >= $end_m))
		{
			$cur = '&nbsp;';
			$class = 'calendar';
		}
		if ($now_month == $month && $offset == $today)
		{
			$class = 'today';
		}
		if ($days[$cur])
		{
			$url = append_sid("./calendar_scheduler.$phpEx?d=$offset&fid=$fid");
			$cur = sprintf('<a href="%s">%s</a>', $url, $cur);
			/*$cur = sprintf('<a href="%s" class="eventday"><b>%s</b></a>', $url, $cur);*/
			$class = 'eventday';
		}
		$template->assign_block_vars('row.cell', array(
			'CLASS' => $class,
			'DAY' => $cur,
			)
		);
		$offset = $offset + 86400;
	}
}

// list of topics
$period = ($mode == 'hour') ? 3600-1 : '';
$title = get_calendar_title_date($start_date, $period);

// system
$s_hidden_fields = '<input type="hidden" name="mode" value="' . $mode . '" />';
$s_hidden_fields .= '<input type="hidden" name="date" value="' . $date . '" />';
$s_hidden_fields .= '<input type="hidden" name="start" value="' . $start . '" />';
if (!isset($nav_separator))
{
	$nav_separator = '&nbsp;->&nbsp;';
}

$total = $topics_count + $birthdays_count;
if ($total == 0) $total++;

$template->assign_vars(array(
	'L_portal'	=> $lang['portal'],
	'U_portal'	=> append_sid("./portal.$phpEx?d=$date&mode=$mode&start=$start"),

	'S_MONTH'			=> $s_month,
	'S_YEAR'			=> $s_year,
	'U_PREC'			=> append_sid("./portal.$phpEx?d=$prec&fid=$fid"),
	'U_NEXT'			=> append_sid("./portal.$phpEx?d=$next&fid=$fid"),
	'U_CALENDAR'		=> append_sid("./calendar.$phpEx?start=" . $year . $month . "01&fid=$fid"),
	'L_CALENDAR'		=> $lang['Calendar'],
	'L_VIEW_CALENDAR'	=> $lang['View_Calendar'],
	'IMG_CALENDAR'		=> $images['icon_calendar'],

	'PAGINATION' => generate_pagination("portal.$phpEx?d=$date&mode=$mode", $total, $board_config['topics_per_page'], $start),
	'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / $board_config['topics_per_page'] ) + 1 ), ceil( $topics_count / $board_config['topics_per_page'] )),
	'L_GOTO_PAGE' => $lang['Goto_page'],

	'NAV_SEPARATOR'		=> $nav_separator,
	'S_ACTION'			=> append_sid("./portal.$phpEx"),
	'S_HIDDEN_FIELDS'	=> $s_hidden_fields,
	)
);




//
// Generate the page
//
$template->pparse('body');

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>