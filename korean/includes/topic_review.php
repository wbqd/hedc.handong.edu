<?php
/***************************************************************************
 *                              topic_review.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: topic_review.php,v 1.6 2003/08/30 15:05:45 acydburn Exp $
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

function topic_review($topic_id, $is_inline_review)
{
	global $db, $board_config, $template, $lang, $images, $theme, $phpEx, $phpbb_root_path;
	global $userdata, $user_ip;
	global $orig_word, $replacement_word;
	global $starttime;
	global $upload_dir;

//-- mod : qbar ------------------------------------------------------------------------------------ 
//-- add 
//-- fix 
   global $sub_template_key_image, $sub_templates, $qbar_maps; 
//-- fin mod : qbar --------------------------------------------------------------------------------

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
	global $icones;
//-- fin mod : post icon ---------------------------------------------------------------------------

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
	global $tree;
//-- fin mod : categories hierarchy ----------------------------------------------------------------

	if ( !$is_inline_review )
	{
		if ( !isset($topic_id) )
		{
			message_die(GENERAL_MESSAGE, 'Topic_not_exist');
		}

		//
		// Get topic info ...
		//
//-- mod : calendar --------------------------------------------------------------------------------
// here we added
//	, t.topic_calendar_time, t.topic_calendar_duration, t.topic_first_post_id
//-- modify
		$sql = "SELECT t.topic_title, t.topic_calendar_time, t.topic_calendar_duration, t.topic_first_post_id, f.forum_id, f.auth_view, f.auth_read, f.auth_post, f.auth_reply, f.auth_edit, f.auth_delete, f.auth_sticky, f.auth_announce, f.auth_pollcreate, f.auth_vote, f.auth_attachments 
			FROM " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f 
			WHERE t.topic_id = $topic_id
				AND f.forum_id = t.forum_id";
//-- fin mod : calendar ----------------------------------------------------------------------------
		$tmp = '';
		attach_setup_viewtopic_auth($tmp, $sql);
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not obtain topic information', '', __LINE__, __FILE__, $sql);
		}

		if ( !($forum_row = $db->sql_fetchrow($result)) )
		{
			message_die(GENERAL_MESSAGE, 'Topic_post_not_exist');
		}

		$forum_id = $forum_row['forum_id'];
		$topic_title = $forum_row['topic_title'];

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
		$topic_calendar_time = intval($forum_row['topic_calendar_time']);
		$topic_first_post_id = intval($forum_row['topic_first_post_id']);
		$topic_calendar_duration = intval($forum_row['topic_calendar_duration']);
//-- fin mod : calendar ----------------------------------------------------------------------------
		
		//
		// Start session management
		//
		$userdata = session_pagestart($user_ip, $forum_id);
		init_userprefs($userdata);
		//
		// End session management
		//

		$is_auth = array();
		$is_auth = auth(AUTH_ALL, $forum_id, $userdata, $forum_row);

		if ( !$is_auth['auth_read'] )
		{
			message_die(GENERAL_MESSAGE, sprintf($lang['Sorry_auth_read'], $is_auth['auth_read_type']));
		}
	}

	//
	// Define censored word matches
	//
	if ( empty($orig_word) && empty($replacement_word) )
	{
		$orig_word = array();
		$replacement_word = array();

		obtain_word_list($orig_word, $replacement_word);
	}

	//
	// Dump out the page header and load viewtopic body template
	//
	if ( !$is_inline_review )
	{
		$gen_simple_header = TRUE;

		$page_title = $lang['Topic_review'] . ' - ' . $topic_title;
		include($phpbb_root_path . 'includes/page_header.'.$phpEx);

		$template->set_filenames(array(
			'reviewbody' => 'posting_topic_review.tpl')
		);
	}

	//
	// Go ahead and pull all data for this topic
	//
	$sql = "SELECT u.username, u.user_id, u.user_level, p.*,  pt.post_text, pt.post_subject, pt.bbcode_uid, pt.remark1, pt.remark2, pt.remark3, pt.remark4, pt.remark5, pt.remark6, pt.remark7, pt.remark8, pt.remark9, pt.remark10, pt.remark11, pt.remark12, pt.remark13, pt.remark14, pt.remark15 
		FROM " . POSTS_TABLE . " p, " . USERS_TABLE . " u, " . POSTS_TEXT_TABLE . " pt
		WHERE p.topic_id = $topic_id
			AND p.poster_id = u.user_id
			AND p.post_id = pt.post_id
		ORDER BY p.post_id ASC
		LIMIT " . $board_config['posts_per_page'];
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not obtain post/user information', '', __LINE__, __FILE__, $sql);
	}

	init_display_review_attachments($is_auth);
	//
	// Okay, let's do the loop, yeah come on baby let's do the loop
	// and it goes like this ...
	//
	if ( $row = $db->sql_fetchrow($result) )
	{
		$mini_post_img = $images['icon_minipost'];
		$mini_post_alt = $lang['Post'];

		$i = 0;
		do
		{
			$poster_id = $row['user_id'];
			$poster = $row['username'];

			$post_date = create_date($board_config['default_dateformat'], $row['post_time'], $board_config['board_timezone']);

			//
			// Handle anon users posting with usernames
			//
			if( $poster_id == ANONYMOUS && $row['post_username'] != '' )
			{
				$poster = $row['post_username'];
				$poster_rank = $lang['Guest'];
			}
			elseif ( $poster_id == ANONYMOUS )
			{
				$poster = $lang['Guest'];
				$poster_rank = '';
			}

			$post_subject = ( $row['post_subject'] != '' ) ? $row['post_subject'] : '';

			$message = $row['post_text'];
			$bbcode_uid = $row['bbcode_uid'];

			//
			// If the board has HTML off but the post has HTML
			// on then we process it, else leave it alone
			//
			if ( !$board_config['allow_html'] && $row['enable_html'] )
			{
				$message = preg_replace('#(<)([\/]?.*?)(>)#is', '&lt;\2&gt;', $message);
			}

			if ( $bbcode_uid != "" )
			{
				$message = ( $board_config['allow_bbcode'] ) ? bbencode_second_pass($message, $bbcode_uid) : preg_replace('/\:[0-9a-z\:]+\]/si', ']', $message);
			}

			$message = make_clickable($message);

			if ( count($orig_word) )
			{
				$post_subject = preg_replace($orig_word, $replacement_word, $post_subject);
				$message = preg_replace($orig_word, $replacement_word, $message);
			}

			if ( $board_config['allow_smilies'] && $row['enable_smilies'] )
			{
				$message = smilies_pass($message);
			}

			$message = str_replace("\n", '<br />', $message);

//-- mod : calendar --------------------------------------------------------------------------------
//-- add
			if (!empty($topic_calendar_time) && ($topic_first_post_id == $row['post_id']))
			{
				$post_subject .= get_calendar_title($topic_calendar_time, $topic_calendar_duration);
			}
//-- fin mod : calendar ----------------------------------------------------------------------------

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
			$post_subject = get_icon_title($row['post_icon']) . '&nbsp;' . $post_subject;
//-- fin mod : post icon ---------------------------------------------------------------------------

			//
			// Again this will be handled by the templating
			// code at some point
			//
			$row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
			$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

			$message = unprepare_message($message);

			if(strstr($row['remark1'], 'กา')) list($dump,$row['remark1']) = explode("กา",$row['remark1']);
			if(strstr($row['remark2'], 'กา')) list($dump,$row['remark2']) = explode("กา",$row['remark2']);
			if(strstr($row['remark3'], 'กา')) list($dump,$row['remark3']) = explode("กา",$row['remark3']);
			if(strstr($row['remark4'], 'กา')) list($dump,$row['remark4']) = explode("กา",$row['remark4']);
			if(strstr($row['remark5'], 'กา')) list($dump,$row['remark5']) = explode("กา",$row['remark5']);
			if(strstr($row['remark6'], 'กา')) list($dump,$row['remark6']) = explode("กา",$row['remark6']);
			if(strstr($row['remark7'], 'กา')) list($dump,$row['remark7']) = explode("กา",$row['remark7']);
			if(strstr($row['remark8'], 'กา')) list($dump,$row['remark8']) = explode("กา",$row['remark8']);
			if(strstr($row['remark9'], 'กา')) list($dump,$row['remark9']) = explode("กา",$row['remark9']);
			if(strstr($row['remark10'], 'กา')) list($dump,$row['remark10']) = explode("กา",$row['remark10']);
			if(strstr($row['remark11'], 'กา')) list($dump,$row['remark11']) = explode("กา",$row['remark11']);
			if(strstr($row['remark12'], 'กา')) list($dump,$row['remark12']) = explode("กา",$row['remark12']);
			if(strstr($row['remark13'], 'กา')) list($dump,$row['remark13']) = explode("กา",$row['remark13']);
			if(strstr($row['remark14'], 'กา')) list($dump,$row['remark14']) = explode("กา",$row['remark14']);
			if(strstr($row['remark15'], 'กา')) list($dump,$row['remark15']) = explode("กา",$row['remark15']);


			//////////////////////////////////////////////////////////////

			@reset($attach_rows);

			$attach_rows = get_attachments_from_post($row['post_id']);

			//print_r($attach_rows);

			$attach_num_rows = count($attach_rows);

			$thumb_filename = "";
			$yes_default_thumb_filename = "<br><img src='templates/".$theme['template_name']."/images/default_thumbnail.jpg' border=0><br><br>";

			if ($row['post_id'] == $topic_first_post_id)
			{
				//$thumb_filename = "<br><img src='templates/".$theme['template_name']."/images/default_thumbnail.jpg' border=0><br><br>";
			}
			else {
				$thumb_filename = "";
			}

			$thumb_filename_only = "templates/".$theme['template_name']."/images/default_thumbnail.jpg";
			$no_default_thumb_filename_only = "";
			$thumb_width = "";
			$thumb_height = "";	
			
			$thumb_src_header ='';
			$thumb_src_tail ='';
			$filesize ='';
			$filename ='';
			$download_count ='';
			$download_direct = "";
			$download_indirect = "";

			$full_img_path ='';
			$thumb_img_path ='';
					
			$img_filename = "";
					
			for ($attach_i = 0; $attach_i < $attach_num_rows; $attach_i++)
			{

				$download_direct = '<a href="'. $upload_dir . '/' . $attach_rows[$attach_i]['physical_filename'] .'"><img src="templates/'.$theme['template_name'].'/images/download.gif" border=0 align=absmiddle></a>';
				$download_indirect = '<a href="'. append_sid('download.' . $phpEx . '?id=' . $attach_rows[$attach_i]['attach_id']).'"><img src="templates/'.$theme['template_name'].'/images/download.gif" border=0 align=absmiddle></a>';

				$full_img_path = 'Path: ('.'http://'.$board_config['server_name']. $board_config['script_path'] . $upload_dir . '/' . $attach_rows[$attach_i]['physical_filename']. ')';

				if($attach_rows[$attach_i]['width']) {				
					$img_filename = "<img src='".$upload_dir . '/' . $attach_rows[$attach_i]['physical_filename']."' border=0>";
				}

				if($attach_rows[$attach_i]['thumbnail'] == 1) {				

					$thumb_img_path = 'Thumbnail: ('.'http://'.$board_config['server_name']. $board_config['script_path'] . $upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename'].')';

					$thumb_filename = "<br><img src='".$upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename']."' border=0><br><br>";		
					$yes_default_thumb_filename = "<br><img src='".$upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename']."' border=0><br><br>";	
					$thumb_src_header = '<a href="#" onClick="window.open(\''.append_sid('download.' . $phpEx . '?id=' . $attach_rows[$attach_i]['attach_id'])."','_blank','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=".($attach_rows[$attach_i]['width']+20).",height=".($attach_rows[$attach_i]['height']+30)."')\">";
					$thumb_src_tail = '</a>';

					$filesize = $attach_rows[$attach_i]['filesize'];
					$size_lang = ($filesize >= 1048576) ? $lang['MB'] : ( ($filesize >= 1024) ? $lang['KB'] : $lang['Bytes'] );
					if ($filesize >= 1048576)
					{
						$filesize = (round((round($filesize / 1048576 * 100) / 100), 2));
					}
					else if ($filesize >= 1024)
					{
						$filesize = (round((round($filesize / 1024 * 100) / 100), 2));
					}

					$filesize = "(".$filesize.$size_lang.")";

					$filename = $lang['File_name'].": ".'<a href="'.append_sid('download.' . $phpEx . '?id=' . $attach_rows[$attach_i]['attach_id']).'"  target="_blank">'.$attach_rows[$attach_i]['real_filename']."</a>".$filesize."&nbsp;&nbsp";			
					
					$download_count = $lang['Downloaded'].": <b>".$attach_rows[$attach_i]['download_count']."</b>";

					$thumb_filename_only = $upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename'];
					$no_default_thumb_filename_only = $upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename'];

				}

				//die($full_img_path);

			}			


			$size = image_getdimension($thumb_filename_only);

			$thumb_width = $size[0];
			$thumb_height = $size[1];			

			//////////////////////////////////////////////////////////////	

			$template->assign_block_vars('postrow', array(
				'ROW_COLOR' => '#' . $row_color, 
				'ROW_CLASS' => $row_class, 

				'MINI_POST_IMG' => $mini_post_img, 
				'POSTER_NAME' => $poster, 
				'POST_DATE' => $post_date, 
				'POST_SUBJECT' => $post_subject, 
				'MESSAGE' => $message,

				'REMARK1' => $row['remark1'],
				'REMARK2' => $row['remark2'],
				'REMARK3' => $row['remark3'],
				'REMARK4' => $row['remark4'],
				'REMARK5' => $row['remark5'],
				'REMARK6' => $row['remark6'],
				'REMARK7' => $row['remark7'],
				'REMARK8' => $row['remark8'],
				'REMARK9' => $row['remark9'],
				'REMARK10' => $row['remark10'],
				'REMARK11' => $row['remark11'],
				'REMARK12' => $row['remark12'],
				'REMARK13' => $row['remark13'],
				'REMARK14' => $row['remark14'],
				'REMARK15' => $row['remark15'],

				'THUMBNAIL'		=> $thumb_filename,
				'YES_DEFAULT_THUMBNAIL'		=> $yes_default_thumb_filename,
				'THUMBNAIL_SRC_HEADER'		=> $thumb_src_header,
				'THUMBNAIL_SRC_TAIL'		=> $thumb_src_tail,
				'FILENAME' => $filename,
				'DOWNLOAD_COUNT' => $download_count,
				'FULL_IMG_PATH' => $full_img_path,
				'THUMB_IMG_PATH' => $thumb_img_path,

				'THUMBNAIL_ONLY'		=> $thumb_filename_only,
				'NO_DEFAULT_THUMBNAIL_ONLY'		=> $no_default_thumb_filename_only,
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

				'FULL_IMG'		=> $img_filename,
				'DOWNLOAD_DIRECT'		=> $download_direct,
				'DOWNLOAD_INDIRECT'		=> $download_indirect,
					
				'L_MINI_POST_ALT' => $mini_post_alt)
			);
			display_review_attachments($row['post_id'], $row['post_attachment'], $is_auth);

			$i++;

			//
			// admin_or_reply selection
			//
			if (($row['post_id'] != $topic_first_post_id) || ($row['user_level'] == ADMIN))
			{
				$template->assign_block_vars('postrow.switch_admin_or_reply', array());
			}
			else {
				$template->assign_block_vars('postrow.switch_not_admin_or_reply', array());
			}
			//
			// admin selection
			//
			if (($row['user_level']== ADMIN))
			{
				$template->assign_block_vars('postrow.switch_admin', array());
			}
			else {
				$template->assign_block_vars('postrow.switch_not_admin', array());
			}

			if (($userdata['user_level'] == ADMIN))
			{
				$template->assign_block_vars('switch_admin_now', array());
				$template->assign_block_vars('postrow.switch_admin_now', array());
			}
			else {
				$template->assign_block_vars('switch_not_admin_now', array());
				$template->assign_block_vars('postrow.switch_not_admin_now', array());
			}
			//
			// Reply selection
			//
			if (($row['post_id'] != $topic_first_post_id))
			{
				$template->assign_block_vars('postrow.switch_reply', array());
			}
			else {
				$template->assign_block_vars('postrow.switch_not_reply', array());
			}

			if ( !$userdata['session_logged_in'] )
			{
				$template->assign_block_vars('postrow.switch_user_logged_out', array());
			}
			else
			{
				$template->assign_block_vars('postrow.switch_user_logged_in', array());
			}
		}
		while ( $row = $db->sql_fetchrow($result) );
	}
	else
	{
		message_die(GENERAL_MESSAGE, 'Topic_post_not_exist', '', __LINE__, __FILE__, $sql);
	}



	$template->assign_vars(array(
		'L_AUTHOR' => $lang['Author'],
		'L_MESSAGE' => $lang['Message'],
		'L_POSTED' => $lang['Posted'],
		'L_POST_SUBJECT' => $lang['Post_subject'], 
		'L_TOPIC_REVIEW' => $lang['Topic_review'])
	);

	if ( !$is_inline_review )
	{
		$template->pparse('reviewbody');
		include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
	}
}

?>
