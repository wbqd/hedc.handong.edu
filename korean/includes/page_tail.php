<?php
/***************************************************************************
 *                              page_tail.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: page_tail.php,v 1.27.2.2 2002/11/26 11:42:12 psotfx Exp $
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
	die('Hacking attempt');
}

//
// Show the overall footer.
//
$admin_link = ( $userdata['user_level'] == ADMIN ) ? '<a href="admin/index.' . $phpEx . '?sid=' . $userdata['session_id'] . '">' . $lang['Admin_panel'] . '</a><br /><br />' : '';

$template->set_filenames(array(
	'overall_footer' => ( empty($gen_simple_header) ) ? 'overall_footer.tpl' : (($gen_simple_header < 0) ? 'popup_footer.tpl' : 'simple_footer.tpl') )
);

if (defined('PORTAL_TABLE') && $CFG['popup_board_use'])
{		
	$template->assign_block_vars('use_popup', array()
	);
}
else {
	$template->assign_block_vars('not_use_popup', array()
	);
}

if (isset($HTTP_GET_VARS['printable']))
{		
	$template->assign_block_vars('switch_printable', array());
}
else {
	$template->assign_block_vars('switch_not_printable', array());
}


###############################################
//bottom-menu

$sql = "SELECT pt.post_id,pt.post_subject, pt.remark1, pt.remark2, pt.remark3, pt.remark4, pt.remark5, pt.remark6, pt.remark7, pt.remark8, pt.remark9 
	FROM ". POSTS_TABLE . " p, " . POSTS_TEXT_TABLE . " pt  
	WHERE (pt.post_id = p.post_id) AND (p.forum_id = 89) AND (pt.remark1 = 1) 
	ORDER BY p.post_id ASC 
	";

if (!$result = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, 'Could not query agreement information', '', __LINE__, __FILE__, $sql);
}

$bottom_row = array();
while ($row = $db->sql_fetchrow($result))
{
	$bottom_row[] = $row;
}



for ($i = 0; $i < count($bottom_row); $i++)
{
	if($i == 0) {
		$template->assign_block_vars('bottom_menu', array()	);
	}

	$template->assign_block_vars('bottom_menu.row', array(
		'TITLE' => $bottom_row[$i]['post_subject'],
		'U_LINK' => append_sid("viewtopic.$phpEx?PopTop=".$bottom_row[$i]['remark6']."&PopLeft=".$bottom_row[$i]['remark7']."&popup=yes&today=no&" . POST_POST_URL . '=' . $bottom_row[$i]['post_id']),
		'ID' => $bottom_row[$i]['post_id'],
		'WIDTH' => $bottom_row[$i]['remark2'],
		'HEIGHT' => $bottom_row[$i]['remark3'],
		'X' => $bottom_row[$i]['remark4'],
		'Y' => $bottom_row[$i]['remark5'],	
		'SCROLLBARS' => $bottom_row[$i]['remark8'],
		'RESIZABLE' => $bottom_row[$i]['remark9'],	
		)
	);

	if($i != 0) {
		$template->assign_block_vars('bottom_menu.row.not_first', array()	);
	}
}

###############################################


//
// Sitemap
//

$sitemap = '';

$sitemap  = '<select name="selected_id" onchange="if(this.options[this.selectedIndex].value != -1){ forms[\'sitemap\'].submit() }">';
$sitemap .= '<option value="-1" selected>'.$lang['menu_lang_sitemap'].'</option><option value="-1">-----------------------</option>' . get_tree_option( '', false,'c1');
$sitemap .= '</select>';

   
$template->assign_vars(array(
	'PHPBB_VERSION' => '2' . $board_config['version'],
	'WEBMASTER' => $board_config['board_email'],
	'TRANSLATION_INFO' => ( isset($lang['TRANSLATION_INFO']) ) ? $lang['TRANSLATION_INFO'] : '', 
	'NO_MORE_TODAY' => ( isset($HTTP_GET_VARS['today']) ) ? '' : '&nbsp;<a href="javascript:closeWin();">오늘은 그만보기</a>&nbsp;|', 
	'PRINT_QUESTION' => ( isset($HTTP_GET_VARS['printable']) ) ? 'if(confirm("인쇄하시겠습니까?")) {print();}' : '',  

	'S_SITEMAP' => $sitemap, 
	
	'POP_ID' => $HTTP_GET_VARS[POST_POST_URL],

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
	'ADMIN_LINK' => $admin_link)
);

if (trim($board_config['remark1']) != "")
{
	$template->assign_block_vars('switch_copyright1', array());
}
if (trim($board_config['remark2']) != "")
{
	$template->assign_block_vars('switch_copyright2', array());
}
if (trim($board_config['remark3']) != "")
{
	$template->assign_block_vars('switch_copyright3', array());
}
if (trim($board_config['remark4']) != "")
{
	$template->assign_block_vars('switch_copyright4', array());
}

$template->pparse('overall_footer');

//
// Close our DB connection.
//
$db->sql_close();

//
// Compress buffered output if required and send to browser
//
if ( $do_gzip_compress )
{
	//
	// Borrowed from php.net!
	//
	$gzip_contents = ob_get_contents();
	ob_end_clean();

	$gzip_size = strlen($gzip_contents);
	$gzip_crc = crc32($gzip_contents);

	$gzip_contents = gzcompress($gzip_contents, 9);
	$gzip_contents = substr($gzip_contents, 0, strlen($gzip_contents) - 4);

	echo "\x1f\x8b\x08\x00\x00\x00\x00\x00";
	echo $gzip_contents;
	echo pack('V', $gzip_crc);
	echo pack('V', $gzip_size);
}

exit;

?>