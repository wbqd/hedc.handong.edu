<?php

/***************************************************************************
 *                            functions_topics_list.php
 *                            -------------------------
 *	begin			: 02/08/2003
 *	copyright		: Ptirhiik
 *	email			: admin@rpgnet-fr.com
 *	version			: 1.1.6 - 16/09/2003
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

// activate this line if you want to alternate the color of each row
// define('TOPIC_ALTERNATE_ROW_CLASS', true);

// different view for the topics the user replied too
define('USER_REPLIED_ICON', true); // activate this line if you are using different folder icons for the topic the user replied too
// define('USER_REPLIED_CLASS', 'quote'); // activate this line and set the class you prefer for the the topic the user replied too

// various includes
include_once($phpbb_root_path . './includes/functions_post.' . $phpEx);
include_once($phpbb_root_path . './includes/bbcode.' . $phpEx);
@include_once($phpbb_root_path . 'includes/functions_calendar.' . $phpEx);
@include_once($phpbb_root_path . 'includes/functions_announces.' . $phpEx);

//--------------------------------------------------
// topic_list() : display a list of topic
// ------------
//	$box :				name of the tpl var for the box
//	$tpl :				name of the template file used (blank: topics_list_box.tpl) : do not set .tpl at the end
//	$topic_rowset :		list of the topics : note that topic_id is filled with the item type + id (ie t256)
//	$list_title :		title of the box (blank: $lang['Topics'])
//	$split_type :		if false, the topics won't be split whatever is the split topic per type setup
//	$display_nav_tree :	if true, display the forum name where stands the topic
//	$footer :			what to display at the bottom of the last box (sort by, order, etc.)
//	$inbox :			if false, the topics won't be splitted in different boxes per type
//	$select_field :		name of the select field
//	$select_type :		0: no select field, 1: checkbox field (multiple selection), 2: radio field (unique selection)
//	$select_formname :	name of the form where the select field will appear
//	$select_values :	selected values (array)
// ---------------------------------
// standard sql request in order to fill the topic_rowset array :
// ---------------------------------
// $sql = "SELECT t.*, u.username, u.user_id, u2.username as user2, u2.user_id as id2, p.post_username, p2.post_username AS post_username2, p2.post_time 
//	FROM " . TOPICS_TABLE . " t, " . USERS_TABLE . " u, " . POSTS_TABLE . " p, " . POSTS_TABLE . " p2, " . USERS_TABLE . " u2
//	WHERE t.topic_poster = u.user_id
//		AND p.post_id = t.topic_first_post_id
//		AND p2.post_id = t.topic_last_post_id
//		AND u2.user_id = p2.poster_id 
//	ORDER BY t.topic_type DESC, t.topic_last_post_id DESC 
//	LIMIT $start, ".$board_config['topics_per_page'];
//--------------------------------------------------
function topic_list($box, $tpl='', $topic_rowset, $list_title='', $split_type=false, $display_nav_tree=true, $footer='', $inbox=true, $select_field='', $select_type=0, $select_formname='', $select_values=array(), $list_forum_id='', $start=0)
{
	global $db, $template, $board_config, $userdata, $phpEx, $lang, $images, $HTTP_COOKIE_VARS;
	global $tree;
	global $theme;
	global $upload_dir;	
	static $box_id;

	//print_r($template);

	// save template state
	$sav_tpl = $template->_tpldata;

	// init
	if (empty($tpl))
	{
		$tpl = 'topics_list_box';
	}
	if (empty($list_title))
	{
		$list_title = $lang['Topics'];
	}
	if (!empty($select_values) && !is_array($select_values) )
	{
		$s_values = $select_values;
		$select_values = array();
		$select_values[] = $s_values;
	}

	// selections
	$select_multi = false;
	$select_unique = false;
	if (!empty($select_field) && ($select_type > 0) && !empty($select_formname) )
	{
		switch ($select_type)
		{
			case 1:
				$select_multi = true;
				break;
			case 2:
				$select_unique = true;
				break;
		}
	}

	// get split params
	$switch_split_global_announce = (isset($board_config['split_global_announce']) && isset($lang['Post_Global_Announcement'])) ? intval($board_config['split_global_announce']) : false;
	$switch_split_announce = isset($board_config['split_announce']) ? intval($board_config['split_announce']) : false;
	$switch_split_sticky = isset($board_config['split_sticky']) ? intval($board_config['split_sticky']) : false;

	// set in separate table
	$split_box = $inbox && (isset($board_config['split_topic_split']) ? intval($board_config['split_topic_split']) : false);

	// take care of the context
	if (!$split_type)
	{
		$split_box = false;
		$switch_split_global_announce = false;
		$switch_split_announce = false;
		$switch_split_sticky = false;
	}

	if (!$switch_split_global_announce && !$switch_split_announce && !$switch_split_sticky)
	{
		$split_type = false;
		$split_box = false;
	}

	// Define censored word matches
	$orig_word = array();
	$replacement_word = array();
	obtain_word_list($orig_word, $replacement_word);

	// read the user cookie
	$tracking_topics	= ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_t"]) : array();
	$tracking_forums	= ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_f"]) : array();
	$tracking_all		= ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all']) ) ? intval($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all']) : NULL;

	// categories hierarchy v 2 compliancy
	$cat_hierarchy = function_exists(get_auth_keys);
	if (!$cat_hierarchy)
	{
		// standard read
		$is_auth = array();
		$is_auth = auth(AUTH_ALL, AUTH_LIST_ALL, $userdata);
	}

	// topic icon present
	$icon_installed = function_exists(get_icon_title);

	// get a default title
	if (empty($list_title))
	{
		$list_title = $lang['forum'];
	}

	// choose template
	$template->set_filenames(array(
		$tpl => $tpl . '.tpl')
	);

	// check if user replied to the topics
	$user_topics = array();
	if ($userdata['user_id'] != ANONYMOUS)
	{
		// get all the topic ids to display
		$topic_ids = array();
		for ($i = 0; $i < count($topic_rowset); $i++)
		{
			$topic_item_type	= substr($topic_rowset[$i]['topic_id'], 0, 1);
			$topic_id			= intval(substr($topic_rowset[$i]['topic_id'], 1));
			if ( $topic_item_type == POST_TOPIC_URL )
			{
				$topic_ids[] = $topic_id;
			}
		}
		// check if the user replied to
		if (!empty($topic_ids))
		{
			// check the posts
			$s_topic_ids = implode(', ', $topic_ids);
			$sql = "SELECT DISTINCT topic_id FROM " . POSTS_TABLE . " 
					WHERE topic_id IN ($s_topic_ids)
						AND poster_id = " . $userdata['user_id'];
			if ( !($result = $db->sql_query($sql)) )
			{
			   message_die(GENERAL_ERROR, 'Could not obtain post information', '', __LINE__, __FILE__, $sql);
			}
			while ($row = $db->sql_fetchrow($result))
			{
				$user_topics[POST_TOPIC_URL . $row['topic_id']] = true;
			}
		}
	}

	$selected_id = POST_FORUM_URL . $list_forum_id;
	$this = isset($tree['keys'][$selected_id]) ? $tree['keys'][$selected_id] : -1;

	// initiate
	$template->assign_block_vars($tpl, array(
		'FORMNAME'		=> $select_formname,
		'FIELDNAME'		=> $select_field,

		'POSTS'			=> $tree['data'][$this]['forum_posts'],
		'TOPICS'		=> $tree['data'][$this]['forum_topics'],
		)
	);

	// prepare spaning
	$span_all = ($icon_installed ? 7 : 6) + ($select_multi || $select_unique ? 1 : 0);
	$span_left = ($icon_installed ? 3 : 2) + ($select_unique ? 1 : 0);

	// display topics
	$color = false;
	$prec_topic_type = '';
	$header_sent = false;
	if (!isset($box_id)) $box_id = -1;


	///////////////////////////////



	$split_field = $tree['data'][$this]['split_field'];

	if (!empty($split_field)) {
		$split_box = true;
		$split_type = true;
	}

	////////////////////////////////


	for ($i=0; $i < count($topic_rowset); $i++)
	{
		$topic_item_type	= substr($topic_rowset[$i]['topic_id'], 0, 1);
		$topic_id			= intval(substr($topic_rowset[$i]['topic_id'], 1));
		$topic_title		= ( count($orig_word) ) ? preg_replace($orig_word, $replacement_word, $topic_rowset[$i]['topic_title']) : $topic_rowset[$i]['topic_title'];		
		$replies			= $topic_rowset[$i]['topic_replies'];
		$topic_type			= $topic_rowset[$i]['topic_type'];
		$user_replied		= ( !empty($user_topics) && isset($user_topics[$topic_rowset[$i]['topic_id']]) );
		$force_type_display	= false;

		if ( defined('POST_BIRTHDAY') && ($topic_type == POST_BIRTHDAY) )
		{
			$topic_type = $lang['Birthday'] . ': ';
		}
		else if( $topic_type == POST_GLOBAL_ANNOUNCE )
		{
			$topic_type = $lang['Topic_Global_Announcement'] . ' ';
		}
		else if( $topic_type == POST_ANNOUNCE )
		{
			//$topic_type = $lang['Topic_Announcement'] . ' ';
			$topic_type = '<img src="templates/'.$theme['template_name'].'/images/icon-notice.gif" align="absmiddle">' . ' ';
		}
		else if( $topic_type == POST_STICKY )
		{
			//$topic_type = $lang['Topic_Sticky'] . ' ';
			$topic_type = '<img src="templates/'.$theme['template_name'].'/images/icon-sticky.gif" align="absmiddle">' . ' ';
		}
		else
		{
			$topic_type = '';		
		}


	
		if( $topic_rowset[$i]['topic_vote'] )
		{
			//$topic_type .= $lang['Topic_Poll'] . ' ';
			$force_type_display = true;
		}
		if (defined('POST_BIRTHDAY') && ($topic_rowset[$i]['topic_type'] == POST_BIRTHDAY))
		{
			$folder_image =  $images['folder_birthday'];
			$folder_alt = $lang['Happy_birthday'];
			$newest_post_img = '';
		}
		else if( $topic_rowset[$i]['topic_status'] == TOPIC_MOVED )
		{
			$topic_type = $lang['Topic_Moved'] . ' ';
			$topic_id = $topic_rowset[$i]['topic_moved_id'];
			$folder_image =  $images['folder'];
			$folder_alt = $lang['Topics_Moved'];
			$newest_post_img = '';
			$force_type_display = true;
		}
		else
		{
			if( defined('POST_BIRTHDAY') && ($topic_rowset[$i]['topic_type'] == POST_BIRTHDAY) )
			{
				$folder = $images['folder_birthday'];
				$folder_new = $images['folder_birthday'];
			}
			else if( $topic_rowset[$i]['topic_type'] == POST_GLOBAL_ANNOUNCE )
			{
				$folder = ($user_replied && defined('USER_REPLIED_ICON')) ? $images['folder_global_announce_own'] : $images['folder_global_announce'];
				$folder_new = ($user_replied && defined('USER_REPLIED_ICON')) ? $images['folder_global_announce_new_own'] : $images['folder_global_announce_new'];
			}
			else if( $topic_rowset[$i]['topic_type'] == POST_ANNOUNCE )
			{
				$folder = ($user_replied && defined('USER_REPLIED_ICON')) ? $images['folder_announce_own'] : $images['folder_announce'];
				$folder_new = ($user_replied && defined('USER_REPLIED_ICON')) ? $images['folder_announce_new_own'] : $images['folder_announce_new'];
			}
			else if( $topic_rowset[$i]['topic_type'] == POST_STICKY )
			{
				$folder = ($user_replied && defined('USER_REPLIED_ICON')) ? $images['folder_sticky_own'] : $images['folder_sticky'];
				$folder_new = ($user_replied && defined('USER_REPLIED_ICON')) ? $images['folder_sticky_new_own'] : $images['folder_sticky_new'];
			}
			else if( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED )
			{
				$folder = ($user_replied && defined('USER_REPLIED_ICON')) ? $images['folder_locked_own'] : $images['folder_locked'];
				$folder_new = ($user_replied && defined('USER_REPLIED_ICON')) ? $images['folder_locked_new_own'] : $images['folder_locked_new'];
			}
			else
			{
				if($replies >= $board_config['hot_threshold'])
				{
					$folder = ($user_replied && defined('USER_REPLIED_ICON')) ? $images['folder_hot_own'] : $images['folder_hot'];
					$folder_new = ($user_replied && defined('USER_REPLIED_ICON')) ? $images['folder_hot_new_own'] : $images['folder_hot_new'];
				}
				else
				{
					$folder = ($user_replied && defined('USER_REPLIED_ICON')) ? $images['folder_own'] : $images['folder'];
					$folder_new = ($user_replied && defined('USER_REPLIED_ICON')) ? $images['folder_new_own'] : $images['folder_new'];
				}
			}
			$newest_post_img = '';
			if ( $userdata['session_logged_in'] && ($topic_item_type == POST_TOPIC_URL) )
			{
				if( $topic_rowset[$i]['post_time'] > $userdata['user_lastvisit'] ) 
				{
					if( !empty($tracking_topics) || !empty($tracking_forums) || !empty($tracking_all) )
					{
						$unread_topics = true;
						if( !empty($tracking_topics[$topic_id]) )
						{
							if( $tracking_topics[$topic_id] >= $topic_rowset[$i]['post_time'] )
							{
								$unread_topics = false;
							}
						}
						if( !empty($tracking_forums[$forum_id]) )
						{
							if( $tracking_forums[$forum_id] >= $topic_rowset[$i]['post_time'] )
							{
								$unread_topics = false;
							}
						}
						if( !empty($tracking_all) )
						{
							if( $tracking_all >= $topic_rowset[$i]['post_time'] )
							{
								$unread_topics = false;
							}
						}
						if ( $unread_topics )
						{
							$folder_image = $folder_new;
							$folder_alt = $lang['New_posts'];
							$newest_post_img = '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=newest") . '"><img src="' . $images['icon_newest_reply'] . '" alt="' . $lang['View_newest_post'] . '" title="' . $lang['View_newest_post'] . '" border="0" /></a>';
						}
						else
						{
							$folder_image = $folder;
							$folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];
							$newest_post_img = '';
						}
					}
					else
					{
						$folder_image = $folder_new;
						$folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['New_posts'];
						$newest_post_img = '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=newest") . '"><img src="' . $images['icon_newest_reply'] . '" alt="' . $lang['View_newest_post'] . '" title="' . $lang['View_newest_post'] . '" border="0" /></a> ';
					}
				}
				else 
				{
					$folder_image = $folder;
					$folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];
					$newest_post_img = '';
				}
			}
			else
			{
				$folder_image = $folder;
				$folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];
				$newest_post_img = '';
			}
		}

		// generate list of page for the topic
		$goto_page = '';
		if( ( $replies + 1 ) > $board_config['posts_per_page'] )
		{
			$total_pages = ceil( ( $replies + 1 ) / $board_config['posts_per_page'] );
			$goto_page = ' [ <img src="' . $images['icon_gotopost'] . '" alt="' . $lang['Goto_page'] . '" title="' . $lang['Goto_page'] . '" />' . $lang['Goto_page'] . ': ';
			$times = 1;
			for($j = 0; $j < $replies + 1; $j += $board_config['posts_per_page'])
			{
				$goto_page .= '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=" . $topic_id . "&amp;start=$j") . '">' . $times . '</a>';
				if( $times == 1 && $total_pages > 4 )
				{
					$goto_page .= ' ... ';
					$times = $total_pages - 3;
					$j += ( $total_pages - 4 ) * $board_config['posts_per_page'];
				}
				else if ( $times < $total_pages )
				{
					$goto_page .= ', ';
				}
				$times++;
			}
			$goto_page .= ' ] ';
		}

		$topic_author = '';
		$first_post_time = '';
		$last_post_time = '';
		$last_post_url = '';
		$views = '';
		switch ($topic_item_type)
		{
			case POST_USERS_URL:
				$view_topic_url		= append_sid("profile.$phpEx?" . POST_USERS_URL . "=$topic_id");
				break;
			default:
				$view_topic_url		= append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id");
				$topic_author		= ( $topic_rowset[$i]['user_id'] != ANONYMOUS ) ? '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . '=' . $topic_rowset[$i]['user_id']) . '">' : '';
				$topic_author		.= ( $topic_rowset[$i]['user_id'] != ANONYMOUS ) ? $topic_rowset[$i]['username'] : ( ( $topic_rowset[$i]['post_username'] != '' ) ? $topic_rowset[$i]['post_username'] : $lang['Guest'] );
				$topic_author		.= ( $topic_rowset[$i]['user_id'] != ANONYMOUS ) ? '</a>' : '';
				$first_post_time	= create_date($board_config['default_dateformat'], $topic_rowset[$i]['topic_time'], $board_config['board_timezone']);
				$last_post_time		= '<span title="'.create_date($board_config['default_dateformat'], $topic_rowset[$i]['post_time'], $board_config['board_timezone']).'">'.create_date("Y/m/d", $topic_rowset[$i]['post_time'], $board_config['board_timezone']).'</span>';
				$last_post_author	= ( $topic_rowset[$i]['id2'] == ANONYMOUS ) ? ( ($topic_rowset[$i]['post_username2'] != '' ) ? $topic_rowset[$i]['post_username2'] . ' ' : $lang['Guest'] . ' ' ) : '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . '='  . $topic_rowset[$i]['id2']) . '">' . $topic_rowset[$i]['user2'] . '</a>';
				$last_post_url		= '<a href="' . append_sid("viewtopic.$phpEx?"  . POST_POST_URL . '=' . $topic_rowset[$i]['topic_last_post_id']) . '#' . $topic_rowset[$i]['topic_last_post_id'] . '"><img src="' . $images['icon_latest_reply'] . '" alt="' . $lang['View_latest_post'] . '" title="' . $lang['View_latest_post'] . '" border="0" /></a>';
				$views				= $topic_rowset[$i]['topic_views'];
				break;
		}

		// categories hierarchy v 2 compliancy
		$nav_tree = '';
		if ( $display_nav_tree && !empty($topic_rowset[$i]['forum_id']) )
		{
			if ($cat_hierarchy)
			{
				if ($tree['auth'][POST_FORUM_URL . $topic_rowset[$i]['forum_id']]['tree.auth_view'])
				{
					$nav_tree = make_cat_nav_tree(POST_FORUM_URL . $topic_rowset[$i]['forum_id'], '', 'gensmall');
				}
			}
			else
			{
				if ($is_auth[ $topic_rowset[$i]['forum_id'] ]['auth_view'])
				{
					$nav_tree = '<a href="' . append_sid("viewforum.$phpEx?f=" . $topic_rowset[$i]['forum_id']) . '" class="gensmall">' . $topic_rowset[$i]['forum_name'] . '</a>';
				}
			}
		}
		if (!empty($nav_tree))
		{
			$nav_tree = '[ ' . $nav_tree . ' ]';
		}


		// get the type for rupture
		$topic_real_type = $topic_rowset[$i]['topic_type'];

		

		// if no split between global and standard announcement, group them with standard announcement
		if ( !$switch_split_global_announce && ($topic_real_type == POST_GLOBAL_ANNOUNCE) ) $topic_real_type = POST_ANNOUNCE;

		// if no split between announce and sticky, group them with sticky
		if ( !$switch_split_announce && ($topic_real_type == POST_ANNOUNCE) ) $topic_real_type = POST_STICKY;

		// if no split between sticky and normal, group them with normal
		if ( !$switch_split_sticky && ($topic_real_type == POST_STICKY) ) $topic_real_type = POST_NORMAL;

		
		///////////////////////
		if (!empty($split_field)) {
			$topic_real_type = $topic_rowset[$i][$split_field];
		}		
		///////////////////////

		// check if rupture
		$rupt = false;

		// split
		if ( ($i == 0) || $split_type )
		{
			if ($i == 0)
			{
				$rupt = true;
			}

			// check the rupt
			if ($prec_topic_type != $topic_real_type)
			{
				$rupt = true;
			}
		}
		$prec_topic_type = $topic_real_type;

		// header
		if ($rupt)
		{
			// close the prec box
			if ($split_box && ($i != 0))
			{
				// footer
				$template->assign_block_vars($tpl . '.row', array(
					'COLSPAN'		=> $span_all,
					)
				);

				// table closure
				$template->assign_block_vars($tpl . '.row.footer_table', array());

				// spacing
				$template->assign_block_vars($tpl . '.row', array());
				$template->assign_block_vars($tpl . '.row.spacer', array());

				// unset header
				$header_sent = false;
			}

			// get box title
			$main_title = $list_title;
			$sub_title = $list_title;
			switch ($topic_real_type)
			{
				case POST_BIRTHDAY:
					$sub_title = $lang['Birthday'];
					break;
				case POST_GLOBAL_ANNOUNCE:
					$sub_title = $lang['Post_Global_Announcement'];
					break;
				case POST_ANNOUNCE:
					$sub_title = $lang['Post_Announcement'];
					break;
				case POST_STICKY:
					$sub_title = $lang['Post_Sticky'];
					break;
				case POST_CALENDAR:
					$sub_title = $lang['Calendar_event'];
					break;
				case POST_NORMAL:
					$sub_title = $lang['Topics'];
					break;
			}

			///////////////////////
			if (!empty($split_field)) {
				$sub_title = $topic_rowset[$i][$split_field];
				if(strstr($sub_title, '⌒')) list($dump,$sub_title) = explode("⌒",$sub_title);
			}		
			///////////////////////

			$template->assign_block_vars($tpl . '.row', array(
				'L_TITLE'		=> (!$split_box) ? $main_title : $sub_title,
				'L_REPLIES'		=> $lang['Replies'],
				'L_AUTHOR'		=> $lang['Author'],
				'L_VIEWS'		=> $lang['Views'],
				'L_LASTPOST'	=> $lang['Last_Post'],
				'L_SITE_ADDRESS' => $lang['site_address'],
				'COLSPAN'		=> $span_all,
				)
			);

			// open a new box
			if ($split_box || ($i == 0))
			{
				$box_id++;
				$template->assign_block_vars($tpl . '.row.header_table', array(
					'COLSPAN'		=> $span_left,
					'BOX_ID'		=> $box_id,
					)
				);

				// selection fields
				if ($select_multi)
				{
					$template->assign_block_vars($tpl . '.row.header_table.multi_selection', array());
				}

				// set header
				$header_sent = truee;
			}

			// not in box, send a row title
			if ($split_type && !$split_box)
			{
				$template->assign_block_vars($tpl . '.row', array(
					'L_TITLE'		=> $sub_title,
					'COLSPAN'		=> $span_all,
					)
				);
				$template->assign_block_vars($tpl . '.row.header_row', array());
			}
		}

		// erase the type before the title if split
		if ( $split_type && ($topic_real_type == $topic_rowset[$i]['topic_type']) && !$force_type_display)
		{
			$topic_type = '';
		}

		// get the announces dates
		$topic_announces_dates = '';
		if (function_exists(get_announces_title) && in_array( $topic_rowset[$i]['topic_type'], array(POST_ANNOUNCE, POST_GLOBAL_ANNOUNCE)))
		{
			$topic_announces_dates = get_announces_title($topic_rowset[$i]['topic_time'], $topic_rowset[$i]['topic_announce_duration']);
		}

		// get the calendar dates
		$topic_calendar_dates = '';
		if (function_exists(get_calendar_title))
		{
			$topic_calendar_dates = get_calendar_title($topic_rowset[$i]['topic_calendar_time'], $topic_rowset[$i]['topic_calendar_duration']);
			$topic_calendar_dates_no_br = get_calendar_title_date($topic_rowset[$i]['topic_calendar_time'], $topic_rowset[$i]['topic_calendar_duration']);
		}

		// get the topic icons
		$icon = '';
		if ($icon_installed)
		{
			$type = $topic_rowset[$i]['topic_type'];
			if ($type == POST_NORMAL)
			{
				if ( defined('POST_CALENDAR') && !empty($topic_rowset[$i]['topic_calendar_time']) )
				{
					$type = POST_CALENDAR;
				}
				if ( defined('POST_PICTURE') && !empty($topic_rowset[$i]['topic_pic_url']) )
				{
					$type = POST_PICTURE;
				}
			}
			$icon = get_icon_title($topic_rowset[$i]['topic_icon'], 1, $type);
		}

		$new_img = '';
		
		if((time() - $topic_rowset[$i]['post_time']) < ($board_config['new_length']*3600)) 
		{
			$new_img = '<img src="' . $images['icon_newest_reply2'] . '" border="0" />';

		}		

		$topic_rowset[$i]['post_text'] = unprepare_message($topic_rowset[$i]['post_text']);

		// send topic to template
		$selected = (!empty($select_values) && in_array($topic_rowset[$i]['topic_id'], $select_values));
		$color = !$color;

		/////////////////////////////////////////////////////////////		

		if ($tree['auth'][POST_FORUM_URL . $topic_rowset[$i]['forum_id']]['auth_mod'])
		{
				$view_topic_url_header		= '<a href="'.$view_topic_url.'" class="topictitle">';
				$view_topic_url_tail		= '</a>';
		}
		else {
				$view_topic_url_header		= '';
				$view_topic_url_tail		= '';
		}

		//////////////////////////////////////////////////////////////

		@reset($attach_rows);

		$attach_rows = get_attachments_from_post($topic_rowset[$i]['post_id']);

		//print_r($attach_rows);

		$attach_num_rows = count($attach_rows);

		//print_r($board_config);

		$thumb_filename = "<img src='templates/".$theme['template_name']."/images/default_thumbnail.jpg' border=0>";
		$no_default_thumb_filename = "";

		$thumb_filename_only = "templates/".$theme['template_name']."/images/default_thumbnail.jpg";
		$no_default_thumb_filename_only = "";
		$thumb_width = "";
		$thumb_height = "";
		$download_direct = "";
		$download_indirect = "";
		$thumb_src_header ='';
		$thumb_src_tail ='';
		
		$img_filename = "";
		$img_filename_only = "";

		$filename_only = "";
		$original_filename_only = "";
			
		for ($attach_i = 0; $attach_i < $attach_num_rows; $attach_i++)
		{
			$download_direct = '<a href="'. $upload_dir . '/' . $attach_rows[$attach_i]['physical_filename'] .'"><img src="templates/'.$theme['template_name'].'/images/download.gif" border=0 align=absmiddle></a>';
			$download_indirect = '<a href="'. append_sid('download.' . $phpEx . '?id=' . $attach_rows[$attach_i]['attach_id']).'"  target="_blank"><img src="templates/'.$theme['template_name'].'/images/download.gif" border=0 align=absmiddle></a>';

			$filename_only = $attach_rows[$attach_i]['physical_filename'];
			$original_filename_only = $attach_rows[$attach_i]['real_filename'];

			if($attach_rows[$attach_i]['width']) {				
				$img_filename = "<img src='".$upload_dir . '/' . $attach_rows[$attach_i]['physical_filename']."' border=0>";
				$img_filename_only = $attach_rows[$attach_i]['physical_filename'];
			}

			if($attach_rows[$attach_i]['thumbnail'] == 1) {				
				$thumb_filename = "<img src='".$upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename']."' border=0>";		
				$no_default_thumb_filename = "<img src='".$upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename']."' border=0>";				
				$thumb_src_header = '<a href="#" onClick="window.open(\''.append_sid('download.' . $phpEx . '?id=' . $attach_rows[$attach_i]['attach_id'])."','_blank','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=".($attach_rows[$attach_i]['width']+20).",height=".($attach_rows[$attach_i]['height']+30)."')\">";
				$thumb_src_tail = '</a>';

				$thumb_filename_only = $upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename'];
				$no_default_thumb_filename_only = $upload_dir . '/' . THUMB_DIR . '/t_' . $attach_rows[$attach_i]['physical_filename'];
			}
		}			

		$size = image_getdimension($thumb_filename_only);

		$thumb_width = $size[0];
		$thumb_height = $size[1];		

		//////////////////////////////////////////////////////////////		
		if(strstr($topic_rowset[$i]['remark1'], '⌒')) list($dump,$topic_rowset[$i]['remark1']) = explode("⌒",$topic_rowset[$i]['remark1']);
		if(strstr($topic_rowset[$i]['remark2'], '⌒')) list($dump,$topic_rowset[$i]['remark2']) = explode("⌒",$topic_rowset[$i]['remark2']);
		if(strstr($topic_rowset[$i]['remark3'], '⌒')) list($dump,$topic_rowset[$i]['remark3']) = explode("⌒",$topic_rowset[$i]['remark3']);
		if(strstr($topic_rowset[$i]['remark4'], '⌒')) list($dump,$topic_rowset[$i]['remark4']) = explode("⌒",$topic_rowset[$i]['remark4']);
		if(strstr($topic_rowset[$i]['remark5'], '⌒')) list($dump,$topic_rowset[$i]['remark5']) = explode("⌒",$topic_rowset[$i]['remark5']);
		if(strstr($topic_rowset[$i]['remark6'], '⌒')) list($dump,$topic_rowset[$i]['remark6']) = explode("⌒",$topic_rowset[$i]['remark6']);
		if(strstr($topic_rowset[$i]['remark7'], '⌒')) list($dump,$topic_rowset[$i]['remark7']) = explode("⌒",$topic_rowset[$i]['remark7']);
		if(strstr($topic_rowset[$i]['remark8'], '⌒')) list($dump,$topic_rowset[$i]['remark8']) = explode("⌒",$topic_rowset[$i]['remark8']);
		if(strstr($topic_rowset[$i]['remark9'], '⌒')) list($dump,$topic_rowset[$i]['remark9']) = explode("⌒",$topic_rowset[$i]['remark9']);
		if(strstr($topic_rowset[$i]['remark10'], '⌒')) list($dump,$topic_rowset[$i]['remark10']) = explode("⌒",$topic_rowset[$i]['remark10']);
		if(strstr($topic_rowset[$i]['remark11'], '⌒')) list($dump,$topic_rowset[$i]['remark11']) = explode("⌒",$topic_rowset[$i]['remark11']);
		if(strstr($topic_rowset[$i]['remark12'], '⌒')) list($dump,$topic_rowset[$i]['remark12']) = explode("⌒",$topic_rowset[$i]['remark12']);
		if(strstr($topic_rowset[$i]['remark13'], '⌒')) list($dump,$topic_rowset[$i]['remark13']) = explode("⌒",$topic_rowset[$i]['remark13']);
		if(strstr($topic_rowset[$i]['remark14'], '⌒')) list($dump,$topic_rowset[$i]['remark14']) = explode("⌒",$topic_rowset[$i]['remark14']);
		if(strstr($topic_rowset[$i]['remark15'], '⌒')) list($dump,$topic_rowset[$i]['remark15']) = explode("⌒",$topic_rowset[$i]['remark15']);

		$topic_title_full = $topic_title;
		$topic_title = str_cut($topic_title, 40, '...');

		####################################################

		if (!empty($topic_rowset[$i]['remark1']))
		{
			$email_uri = 'mailto:' . $topic_rowset[$i]['remark1'];

			$guest_email_img = '<a href="' . $email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" align=absbottom /></a>';
			$guest_email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
		}
		else
		{
			$guest_email_img = '';
			$guest_email = '';
		}

		if ( !empty($topic_rowset[$i]['user_viewemail']) || $is_auth['auth_mod'] )
		{
			$email_uri = ( $board_config['board_email_form'] ) ? append_sid("profile.$phpEx?mode=email&amp;" . POST_USERS_URL .'=' . $topic_rowset[$i]['user_id']) : 'mailto:' . $topic_rowset[$i]['user_email'];

			$email_img = '<a href="' . $email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" align=absbottom /></a>';
			$email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
		}
		else
		{
			$email_img = '';
			$email = '';
		}

		####################################################


		$remark1_icon = '';

		switch ( $topic_rowset[$i]['remark1'] )
		{
			case '일반':
				$remark1_icon = 'remark1_icon1.jpg';
				break;
			case '필독':
				$remark1_icon = 'remark1_icon2.jpg';
				break;
			case '공지':
				$remark1_icon = 'remark1_icon3.jpg';
				break;
			case '서식':
				$remark1_icon = 'remark1_icon4.jpg';
				break;
			default:
				$remark1_icon = '';
				break;
		}		



		$template->assign_block_vars( $tpl . '.row', array(
			'ROW_CLASS'				=> ($color || !defined('TOPIC_ALTERNATE_ROW_CLASS')) ? 'row1' : 'row2',
			'ROW_FOLDER_CLASS'		=> ($user_replied && defined('USER_REPLIED_CLASS')) ? USER_REPLIED_CLASS : ( ($color || !defined('TOPIC_ALTERNATE_ROW_CLASS')) ? 'row1' : 'row2' ),
			'FORUM_ID'				=> $forum_id,
			'TOPIC_ID'				=> $topic_id,
			'LAST_POST_ID'				=> $topic_rowset[$i]['topic_last_post_id'],
			'TOPIC_FOLDER_IMG'		=> $folder_image,
			'TOPIC_AUTHOR'			=> $topic_author,
			'GOTO_PAGE'				=> !empty($goto_page) ? '<br />' . $goto_page : '',
			'TOPIC_NAV_TREE'		=> !empty($nav_tree) ? (empty($goto_page) ? '<br />' : '') . $nav_tree : '',
			'REPLIES'				=> $replies,
			'NEWEST_POST_IMG'		=> $newest_post_img,
			'NEW_IMG'				=> $new_img,
			'ICON'					=> $icon,
			'TOPIC_TITLE'			=> $topic_title,
			'TOPIC_TITLE_FULL'		=> $topic_title_full,
			'NUMBERING'				=> ($i + $start + 1),
			'TOPIC_ANNOUNCES_DATES'	=> $topic_announces_dates,
			'TOPIC_CALENDAR_DATES'	=> $topic_calendar_dates,
			'TOPIC_CALENDAR_DATES_NO_BR'	=> $topic_calendar_dates_no_br,

			'U_DEL_TOPIC'			=> append_sid("posting.$phpEx?mode=delete&amp;" . POST_POST_URL . "=" . $topic_rowset[$i]['topic_last_post_id']),
			'U_EDIT_TOPIC'			=> append_sid("posting.$phpEx?mode=editpost&amp;" . POST_POST_URL . "=" . $topic_rowset[$i]['topic_last_post_id']),

			'TOPIC_TYPE'			=> $topic_type,
			'VIEWS'					=> $views,
			'FIRST_POST_TIME'		=> $first_post_time,
			'LAST_POST_TIME'		=> $last_post_time,
			'LAST_POST_AUTHOR'		=> $last_post_author,
			'LAST_POST_IMG'			=> $last_post_url,
			'L_TOPIC_FOLDER_ALT'	=> $folder_alt,
			'U_VIEW_TOPIC'			=> $view_topic_url,
			'BOX_ID'				=> $box_id,
			'FID'					=> $topic_rowset[$i]['topic_id'],

			'TOPIC_ATTACHMENT_IMG' => topic_attachment_image($topic_rowset[$i]['topic_attachment']),
			'THUMBNAIL'		=> $thumb_filename,
			'NO_DEFAULT_THUMBNAIL'		=> $no_default_thumb_filename,
			'THUMBNAIL_SRC_HEADER'		=> $thumb_src_header,
			'THUMBNAIL_SRC_TAIL'		=> $thumb_src_tail,

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
			'FULL_IMG_URL'		=> $img_filename_only,
			'DOWNLOAD_DIRECT'		=> $download_direct,
			'DOWNLOAD_INDIRECT'		=> $download_indirect,

			'FILENAME_ONLY'		=> $filename_only,
			'ORIGINAL_FILENAME_ONLY'		=> $original_filename_only,

			'U_VIEW_TOPIC_HEADER'		=> $view_topic_url_header,
			'U_VIEW_TOPIC_TAIL'			=> $view_topic_url_tail,

			'GUEST_EMAIL_IMG' => $guest_email_img,
			'GUEST_EMAIL' => $guest_email,
			'EMAIL_IMG' => $email_img,
			'EMAIL' => $email,

			'REMARK1_ICON' => $remark1_icon,

			'REMARK1' => $topic_rowset[$i]['remark1'],
			'REMARK2' => $topic_rowset[$i]['remark2'],
			'REMARK3' => $topic_rowset[$i]['remark3'],
			'REMARK4' => $topic_rowset[$i]['remark4'],
			'REMARK5' => $topic_rowset[$i]['remark5'],
			'REMARK6' => $topic_rowset[$i]['remark6'],
			'REMARK7' => $topic_rowset[$i]['remark7'],
			'REMARK8' => $topic_rowset[$i]['remark8'],
			'REMARK9' => $topic_rowset[$i]['remark9'],
			'REMARK10' => $topic_rowset[$i]['remark10'],
			'REMARK11' => $topic_rowset[$i]['remark11'],
			'REMARK12' => $topic_rowset[$i]['remark12'],
			'REMARK13' => $topic_rowset[$i]['remark13'],
			'REMARK14' => $topic_rowset[$i]['remark14'],
			'REMARK15' => $topic_rowset[$i]['remark15'],
			'POST_SUBJECT' => $topic_rowset[$i]['post_subject'],
			'MESSAGE' => str_replace("\n", "\n<br />\n", $topic_rowset[$i]['post_text']),

			'L_VIEWS'		=> $lang['Views'],
			'L_LASTPOST'	=> $lang['Last_Post'],
			'L_AUTHOR'		=> $lang['Author'],
			'L_SELECT'				=> ($selected && ($select_multi || $select_unique)) ? 'checked="checked"' : '',
			)
		);
		//display_post_attachments($topic_rowset[$i]['post_id'], $topic_rowset[$i]['post_attachment']);

		//
		// Pics per row
		//
		if ((($i+1)%$board_config['pics_per_row']) == 0)
		{
			$template->assign_block_vars($tpl . '.row.switch_pics_per_row', array());
		}
		else {
			$template->assign_block_vars($tpl . '.row.switch_not_pics_per_row', array());
		}


		$template->assign_block_vars( $tpl . '.row.topic', array());


		if ($attach_num_rows > 0)
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_attach', array());
		}
		else {
			$template->assign_block_vars($tpl . '.row.topic.switch_not_attach', array());
		}		

		if (strlen(trim($topic_rowset[$i]['post_text'])) > 0)
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_message', array());
		}
		else {
			$template->assign_block_vars($tpl . '.row.topic.switch_not_message', array());
		}		


		if ($no_default_thumb_filename_only != '')
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_thumb', array());
		}
		else {
			$template->assign_block_vars($tpl . '.row.topic.switch_not_thumb', array());
		}		

		if ($replies > 0)
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_have_reply', array());
		}
		else {
			$template->assign_block_vars($tpl . '.row.topic.switch_not_have_reply', array());
		}		




		if (trim($topic_rowset[$i]['remark1']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark1', array());
		}
		if (trim($topic_rowset[$i]['remark2']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark2', array());
		}
		if (trim($topic_rowset[$i]['remark3']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark3', array());
		}
		if (trim($topic_rowset[$i]['remark4']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark4', array());
		}
		if (trim($topic_rowset[$i]['remark5']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark5', array());
		}
		if (trim($topic_rowset[$i]['remark6']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark6', array());
		}
		if (trim($topic_rowset[$i]['remark7']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark7', array());
		}
		if (trim($topic_rowset[$i]['remark8']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark8', array());
		}
		if (trim($topic_rowset[$i]['remark9']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark9', array());
		}
		if (trim($topic_rowset[$i]['remark10']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark10', array());
		}
		if (trim($topic_rowset[$i]['remark11']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark11', array());
		}
		if (trim($topic_rowset[$i]['remark12']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark12', array());
		}
		if (trim($topic_rowset[$i]['remark13']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark13', array());
		}
		if (trim($topic_rowset[$i]['remark14']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark14', array());
		}
		if (trim($topic_rowset[$i]['remark15']) != "")
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_remark15', array());
		}


		if (($userdata['user_id'] != ANONYMOUS && $topic_rowset[$i]['user_id'] != ANONYMOUS && $userdata['user_id'] == $topic_rowset[$i]['user_id']) || $tree['auth'][POST_FORUM_URL . $topic_rowset[$i]['forum_id']]['auth_mod'])
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_my_topic', array());
		}
		else {
			$template->assign_block_vars($tpl . '.row.topic.switch_not_my_topic', array());
		}

		// selection fields
		if ($select_multi)
		{
			$template->assign_block_vars($tpl . '.row.topic.multi_selection', array());
		}
		if ($select_unique)
		{
			$template->assign_block_vars($tpl . '.row.topic.single_selection', array());
		}

		if ( !$userdata['session_logged_in'] )
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_user_logged_out', array());
		}
		else
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_user_logged_in', array());
		}

		//
		// admin selection
		//
		if (($topic_rowset[$i]['user_level'] == ADMIN))
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_admin', array());
		}
		else {
			$template->assign_block_vars($tpl . '.row.topic.switch_not_admin', array());
		}

		if ($userdata['user_level'] == ADMIN)
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_user_admin', array());
		}
		else {
			$template->assign_block_vars($tpl . '.row.topic.switch_not_user_admin', array());
		}

		if ($tree['auth'][POST_FORUM_URL . $topic_rowset[$i]['forum_id']]['auth_mod'])
		{
			$template->assign_block_vars($tpl . '.row.topic.switch_user_moderator', array());
		}
		else {
			$template->assign_block_vars($tpl . '.row.topic.switch_not_user_moderator', array());
		}

		// icons
		if ($icon_installed)
		{
			$template->assign_block_vars( $tpl . '.row.topic.icon', array());
		}

		// nav tree asked
		if ($display_nav_tree && !empty($nav_tree))
		{
			$template->assign_block_vars( $tpl . '.row.topic.nav_tree', array());
		}
	} // end for topic_rowset read

	// send an header if missing
	if (!$header_sent)
	{
		$template->assign_block_vars($tpl . '.row', array(
			'L_TITLE'		=> $list_title,
			'L_REPLIES'		=> $lang['Replies'],
			'L_AUTHOR'		=> $lang['Author'],
			'L_VIEWS'		=> $lang['Views'],
			'L_LASTPOST'	=> $lang['Last_Post'],
			'COLSPAN'		=> $span_all,
			)
		);

		// open a new box
		$template->assign_block_vars($tpl . '.row.header_table', array(
			'COLSPAN'		=> $span_left,
			)
		);
	}

	// no data
	if (count($topic_rowset) == 0)
	{
		// send no topics notice
		$template->assign_block_vars( $tpl . '.row', array(
			'L_NO_TOPICS'	=> $lang['No_search_match'],
			'COLSPAN'		=> $span_all,
			)
		);
		$template->assign_block_vars( $tpl . '.row.no_topics', array());
	}

	// bottom line
	if (!empty($footer))
	{
		$template->assign_block_vars( $tpl . '.row', array(
			'COLSPAN'		=> $span_all,
			'FOOTER'		=> $footer,
			)
		);
		$template->assign_block_vars( $tpl . '.row.bottom', array());
	}

	// table closure
	$template->assign_block_vars( $tpl . '.row', array(
		'COLSPAN'		=> $span_all,
		)
	);
	$template->assign_block_vars( $tpl . '.row.footer_table', array());

	// spacing
	if (empty($footer))
	{
		// spacing
		$template->assign_block_vars($tpl . '.row', array());
		$template->assign_block_vars($tpl . '.row.spacer', array());
	}

	// transfert to a var
	$template->assign_var_from_handle('_box', $tpl);
	$res = $template->_tpldata['.'][0]['_box'];

	// restore template saved state
	$template->_tpldata = $sav_tpl;

	// assign value to the main template
	$template->assign_vars(array($box => $res));
}

?>