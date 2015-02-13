<?php
/***************************************************************************
 *                             admin_forums.php
 *                            -------------------
 *   begin                : Thursday, Jul 12, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: admin_forums.php,v 1.10 2003/08/30 15:05:44 acydburn Exp $
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

if( !empty($setmodules) )
{
	$file = basename(__FILE__);
	$module['Forums']['Manage'] = $file;
	return;
}

//
// Load default header
//
$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);
include($phpbb_root_path . 'includes/functions_admin.'.$phpEx);

$forum_auth_ary = array(
	"auth_view" => AUTH_ALL, 
	"auth_read" => AUTH_ALL, 
	"auth_post" => AUTH_REG, 
	"auth_reply" => AUTH_REG, 
	"auth_edit" => AUTH_REG, 
	"auth_delete" => AUTH_REG, 
	"auth_cal" => AUTH_MOD, 	
	"auth_sticky" => AUTH_MOD, 
	"auth_announce" => AUTH_MOD, 
	"auth_vote" => AUTH_REG, 
	"auth_pollcreate" => AUTH_MOD
);

$forum_auth_ary['auth_attachments'] = AUTH_REG;
$forum_auth_ary['auth_download'] = AUTH_ALL;

$forum_auth_fields = array('auth_view', 'auth_read', 'auth_post', 'auth_reply', 'auth_edit', 'auth_delete', 'auth_cal', 'auth_sticky', 'auth_announce', 'auth_vote', 'auth_pollcreate', 'auth_attachments', 'auth_download');

$simple_auth_types = array($lang['Public'], $lang['Registered'], $lang['Registered'] . ' [' . $lang['Hidden'] . ']', $lang['Private'], $lang['Private'] . ' [' . $lang['Hidden'] . ']', $lang['Admin_only'], $lang['Moderators'], $lang['Moderators'] . ' [' . $lang['Hidden'] . ']');

$simple_auth_ary = array(
	0  => array(AUTH_ALL, AUTH_ALL, AUTH_ALL, AUTH_ALL, AUTH_REG, AUTH_REG, AUTH_ADMIN, AUTH_MOD, AUTH_MOD, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_ALL),
	1  => array(AUTH_ALL, AUTH_ALL, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_ADMIN, AUTH_MOD, AUTH_MOD, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_ALL),
	2  => array(AUTH_ALL, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_ADMIN, AUTH_MOD, AUTH_MOD, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_REG),
	3  => array(AUTH_ALL, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ADMIN, AUTH_ACL, AUTH_MOD, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ACL),
	4  => array(AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ADMIN, AUTH_ACL, AUTH_MOD, AUTH_ACL, AUTH_ACL, AUTH_MOD, AUTH_ACL),
	5  => array(AUTH_ALL, AUTH_ALL, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_ADMIN, AUTH_MOD, AUTH_MOD, AUTH_REG, AUTH_MOD, AUTH_MOD, AUTH_ALL),
	6  => array(AUTH_ALL, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_ADMIN, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD),
	7  => array(AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_ADMIN, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD),
);


//
// Obtain list of moderators of each forum
// First users, then groups ... broken into two queries
//
$sql = "SELECT aa.forum_id, u.user_id, u.username 
	FROM " . AUTH_ACCESS_TABLE . " aa, " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g, " . USERS_TABLE . " u
	WHERE aa.auth_mod = " . TRUE . " 
		AND g.group_single_user = 1 
		AND ug.group_id = aa.group_id 
		AND g.group_id = aa.group_id 
		AND u.user_id = ug.user_id 
	GROUP BY u.user_id, u.username, aa.forum_id 
	ORDER BY aa.forum_id, u.user_id";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not query forum moderator information', '', __LINE__, __FILE__, $sql);
}

$forum_moderators = array();
while( $row = $db->sql_fetchrow($result) )
{
	$forum_moderators[$row['forum_id']][] = $row['username'] .'(<a href="' . append_sid("admin_users.$phpEx?mode=edit&amp;" . POST_USERS_URL . "=" . $row['user_id']) . '">'.$lang['Manage']. '</a>/' .'<a href="' . append_sid("admin_ug_auth.$phpEx?mode=user&amp;" . POST_USERS_URL . "=" . $row['user_id']) . '">'.$lang['Permissions'].'</a>'.')';
}

$sql = "SELECT aa.forum_id, g.group_id, g.group_name 
	FROM " . AUTH_ACCESS_TABLE . " aa, " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g 
	WHERE aa.auth_mod = " . TRUE . " 
		AND g.group_single_user = 0 
		AND g.group_type <> " . GROUP_HIDDEN . "
		AND ug.group_id = aa.group_id 
		AND g.group_id = aa.group_id 
	GROUP BY g.group_id, g.group_name, aa.forum_id 
	ORDER BY aa.forum_id, g.group_id";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not query forum moderator information', '', __LINE__, __FILE__, $sql);
}

while( $row = $db->sql_fetchrow($result) )
{
	$forum_moderators[$row['forum_id']][] = $row['group_name'] .'(<a href="' . append_sid("admin_groups.$phpEx?edit=".$lang['Look_up_group'] ."&amp;" . POST_GROUPS_URL . "=" . $row['group_id']) . '">'.$lang['Manage'].'</a>/'.'<a href="' . append_sid("admin_ug_auth.$phpEx?mode=group&amp;" . POST_GROUPS_URL . "=" . $row['group_id']) . '">'.$lang['Permissions'].'</a>'.')';
}

/////////////////////////////////////////////////

//
// Mode setting
//
if( isset($HTTP_POST_VARS['mode']) || isset($HTTP_GET_VARS['mode']) )
{
	$mode = ( isset($HTTP_POST_VARS['mode']) ) ? $HTTP_POST_VARS['mode'] : $HTTP_GET_VARS['mode'];
}
else
{
	$mode = "";
}

// ------------------
// Begin function block
//

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add

// check the presence of the attachment of the forum
$sql = "SELECT main_type FROM " . FORUMS_TABLE;
if ( $db->sql_query($sql) )
{
	define('SUB_FORUM_ATTACH', true);
}

// get the ids
$cat_id = 0;
if (isset($HTTP_POST_VARS[POST_CAT_URL]) || isset($HTTP_GET_VARS[POST_CAT_URL]))
{
	$cat_id = isset($HTTP_POST_VARS[POST_CAT_URL]) ? intval($HTTP_POST_VARS[POST_CAT_URL]) : intval($HTTP_GET_VARS[POST_CAT_URL]);
}

$forum_id = 0;
if (isset($HTTP_POST_VARS[POST_FORUM_URL]) || isset($HTTP_GET_VARS[POST_FORUM_URL]))
{
	$forum_id = isset($HTTP_POST_VARS[POST_FORUM_URL]) ? intval($HTTP_POST_VARS[POST_FORUM_URL]) : intval($HTTP_GET_VARS[POST_FORUM_URL]);
}

// check and fix parm
function admin_check_cat()
{
	global $db;

	$res = false;
	// build the cat list
	$mains = array();

	// from cats
	$sql = "SELECT * FROM " . CATEGORIES_TABLE . " ORDER BY cat_id";
	if ( !$result = $db->sql_query($sql) ) message_die(GENERAL_ERROR, "Couldn't access list of Categories", "", __LINE__, __FILE__, $sql);
	while ( $row = $db->sql_fetchrow($result) ) 
	{
		// fix cat_main value
		if (empty($row['cat_main_type'])) 
		{
			$row['cat_main_type'] = POST_CAT_URL;
		}
		if ( $row['cat_main'] == $row['cat_id'] )
		{
			$row['cat_main_type'] = POST_CAT_URL;
			$row['cat_main'] = 0;
		}
		// fill hierarchy array
		$mains[ POST_CAT_URL . $row['cat_id'] ] = $row['cat_main_type'] . $row['cat_main'];
	}  // end while ( $row = $db->sql_fetchrow($result) )

	// from forums
	$sql = "SELECT * FROM " . FORUMS_TABLE . " ORDER BY forum_id";
	if ( !$result = $db->sql_query($sql) ) message_die(GENERAL_ERROR, "Couldn't access list of Forums", "", __LINE__, __FILE__, $sql);
	while ( $row = $db->sql_fetchrow($result) ) 
	{
		// fill hierarchy array
		if (empty($row['main_type'])) $row['main_type'] = POST_CAT_URL;
		$mains[POST_FORUM_URL . $row['forum_id'] ] = $row['main_type'] . $row['cat_id'];
	}  // end while ( $row = $db->sql_fetchrow($result) )

	// no forums nor cats
	if (empty($mains)) return false;

	// push each cat
	reset($mains);
	while (list($id, $main) = each($mains) )
	{
		$root		= false;
		$cur		= $id;

		$stack		= array();
		$stack[]	= $cur;
		$error		= false;
		while ( !$root )
		{
			// parent catagory doesn't exists
			if ( ($mains[$cur] != 'c0' ) && !isset($mains[ $mains[$cur] ]) )
			{
				$error = true;
				$mains[$cur] = 'c0';
			}

			// the parent category is already in the stack (recursive attachement)
			if ( in_array($mains[$cur], $stack) )
			{
				$error = true;
				$mains[$cur] = 'c0';
			}

			// push parent category id
			$stack[] = $mains[$cur];

			// climb up a level
			$root = ($mains[$cur] == 'c0');
			$cur = $mains[$cur];

		}  // while ( !$root )

		// update database
		$type		= substr($id, 0, 1);
		$i			= intval(substr($id, 1));
		$main_type	= substr($mains[$id], 0, 1);
		$main_id	= intval(substr($mains[$id], 1));
		if ( $i != 0)
		{
			switch( $type )
			{
				case POST_CAT_URL:
					$sql = "UPDATE " . CATEGORIES_TABLE . " SET cat_main_type='$main_type', cat_main=$main_id WHERE cat_id=$i";
					if ( !$result = $db->sql_query($sql) ) message_die(GENERAL_ERROR, "Couldn't update list of Categories", "", __LINE__, __FILE__, $sql);



					break;
				case POST_FORUM_URL:
					$sql = "UPDATE " . FORUMS_TABLE . " SET cat_id=$main_id WHERE forum_id=$i";
					if (defined('SUB_FORUM_ATTACH'))
					{
						$sql = "UPDATE " . FORUMS_TABLE . " SET main_type='$main_type, cat_id=$main_id' WHERE forum_id=$i";
					}
					if ( !$result = $db->sql_query($sql) ) message_die(GENERAL_ERROR, "Couldn't update list of Forums", "", __LINE__, __FILE__, $sql);



					break;
				default:
					$sql = '';
					break;
			}
		}
	}
	return $error;
}  // end

function move_tree($type, $id, $move)
{
	global $db;
	global $tree;

	// search the object
	$this = (isset($tree['keys'][ $type . $id ])) ? $tree['keys'][ $type . $id ] : -1;

	// get the root id
	$main = ($this < 0) ? 'Root' : $tree['main'][$this];

	// renum objects of the same level and regenerate all
	$cats = array();
	$forums = array();
	$order = 0;
	$parents = array();
	for ($i=0; $i < count($tree['data']); $i++) 
	{
		if ($tree['main'][$i] == $main)
		{
			$order = $order + 10;
			$worder = ($i == $this) ? $order + $move : $order;
			$field_name = ($tree['type'][$i] == POST_CAT_URL) ? 'cat_order' : 'forum_order';
			$tree['data'][$i][$field_name] = $worder;
		}
		if ($tree['type'][$i] == POST_CAT_URL)
		{
			$idx = count($cats);
			$cats[$idx] = $tree['data'][$i];
			$parents[POST_CAT_URL][ $tree['main'][$i] ][] = $idx;
		}
		else
		{
			$idx = count($forums);
			$forums[$idx] = $tree['data'][$i];
			$parents[POST_FORUM_URL][ $tree['main'][$i] ][] = $idx;
		}
	}

	// build the tree
	$tree = array();
	$new_topic_data = array();
	$tracking_topics = array();
	$tracking_forums = array();
	$tracking_all = -1;
	build_tree($cats, $forums, $new_topic_data, $tracking_topic, $tracking_forums, $tracking_all, $parents);

	// re-order all
	$order = 0;
	for ($i=0; $i < count($tree['data']); $i++)
	{
		$order = $order + 10;
		if ($tree['type'][$i] == POST_CAT_URL)
		{
			$sql = "UPDATE " . CATEGORIES_TABLE . " SET cat_order=$order WHERE cat_id=" . $tree['id'][$i];
		}
		else
		{
			$sql = "UPDATE " . FORUMS_TABLE . " SET forum_order=$order WHERE forum_id=" . $tree['id'][$i];
		}
		if ( !$db->sql_query($sql) ) message_die(GENERAL_ERROR, 'Couldn\'t update cat/forum order', '', __LINE__, __FILE__, $sql);



	}
}
//-- fin mod : categories hierarchy ----------------------------------------------------------------

function get_info($mode, $id)
{
	global $db;

	switch($mode)
	{
		case 'category':
			$table = CATEGORIES_TABLE;
			$idfield = 'cat_id';
			$namefield = 'cat_title';
			break;

		case 'forum':
			$table = FORUMS_TABLE;
			$idfield = 'forum_id';
			$namefield = 'forum_name';
			break;

		default:
			message_die(GENERAL_ERROR, "Wrong mode for generating select list", "", __LINE__, __FILE__);
			break;
	}
	$sql = "SELECT count(*) as total
		FROM $table";
	if( !$result = $db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, "Couldn't get Forum/Category information", "", __LINE__, __FILE__, $sql);
	}
	$count = $db->sql_fetchrow($result);
	$count = $count['total'];

	$sql = "SELECT *
		FROM $table
		WHERE $idfield = $id"; 

	if( !$result = $db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, "Couldn't get Forum/Category information", "", __LINE__, __FILE__, $sql);
	}

	if( $db->sql_numrows($result) != 1 )
	{
		message_die(GENERAL_ERROR, "Forum/Category doesn't exist or multiple forums/categories with ID $id", "", __LINE__, __FILE__);
	}

	$return = $db->sql_fetchrow($result);
	$return['number'] = $count;
	return $return;
}

function get_list($mode, $id, $select)
{
	global $db;

	switch($mode)
	{
		case 'category':
			$table = CATEGORIES_TABLE;
			$idfield = 'cat_id';
			$namefield = 'cat_title';
			break;

		case 'forum':
			$table = FORUMS_TABLE;
			$idfield = 'forum_id';
			$namefield = 'forum_name';
			break;

		default:
			message_die(GENERAL_ERROR, "Wrong mode for generating select list", "", __LINE__, __FILE__);
			break;
	}

	$sql = "SELECT *
		FROM $table";
	if( $select == 0 )
	{
		$sql .= " WHERE $idfield <> $id";
	}

	if( !$result = $db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, "Couldn't get list of Categories/Forums", "", __LINE__, __FILE__, $sql);
	}

	$cat_list = "";

	while( $row = $db->sql_fetchrow($result) )
	{
		$s = "";
		if ($row[$idfield] == $id)
		{
			$s = " selected=\"selected\"";
		}
		$catlist .= "<option value=\"$row[$idfield]\"$s>" . $row[$namefield] . "</option>\n";
	}

	return($catlist);
}

function renumber_order($mode, $cat = 0)
{
	global $db;

	switch($mode)
	{
		case 'category':
			$table = CATEGORIES_TABLE;
			$idfield = 'cat_id';
			$orderfield = 'cat_order';
			$cat = 0;
			break;

		case 'forum':
			$table = FORUMS_TABLE;
			$idfield = 'forum_id';
			$orderfield = 'forum_order';
			$catfield = 'cat_id';
			break;

		default:
			message_die(GENERAL_ERROR, "Wrong mode for generating select list", "", __LINE__, __FILE__);
			break;
	}

	$sql = "SELECT * FROM $table";
	if( $cat != 0)
	{
		$sql .= " WHERE $catfield = $cat";
	}
	$sql .= " ORDER BY $orderfield ASC";


	if( !$result = $db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, "Couldn't get list of Categories", "", __LINE__, __FILE__, $sql);
	}

	$i = 10;
	$inc = 10;

	while( $row = $db->sql_fetchrow($result) )
	{
		$sql = "UPDATE $table
			SET $orderfield = $i
			WHERE $idfield = " . $row[$idfield];
		if( !$db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, "Couldn't update order fields", "", __LINE__, __FILE__, $sql);
		}
		$i += 10;
	}

}
//
// End function block
// ------------------

//
// Begin program proper
//
if( isset($HTTP_POST_VARS['addforum']) || isset($HTTP_POST_VARS['addcategory']) )
{
	$mode = ( isset($HTTP_POST_VARS['addforum']) ) ? "addforum" : "addcat";

	if( $mode == "addforum" )
	{
		list($cat_id) = each($HTTP_POST_VARS['addforum']);
		// 
		// stripslashes needs to be run on this because slashes are added when the forum name is posted
		//
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//		$forumname = stripslashes($HTTP_POST_VARS['forumname'][$cat_id]);
//-- add
		$forumname = stripslashes($HTTP_POST_VARS['name'][$cat_id]);
	}
	
	if( $mode == "addcat" )
	{
		list($cat_id) = each($HTTP_POST_VARS['addcategory']);
		$cat_title = stripslashes($HTTP_POST_VARS['name'][$cat_id]);
		$cat_main = $cat_id;
		$cat_id = -1;
//-- fin mod : categories hierarchy ----------------------------------------------------------------
	}
}

if( !empty($mode) ) 
{
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
	admin_check_cat();
	get_user_tree($userdata);
//-- fin mod : categories hierarchy ----------------------------------------------------------------

	switch($mode)
	{
		case 'addforum':
		case 'editforum':
			//
			// Show form to create/modify a forum
			//
			if ($mode == 'editforum')
			{
				// $newmode determines if we are going to INSERT or UPDATE after posting?

				$l_title = $lang['Edit_forum'];
				$newmode = 'modforum';
				$buttonvalue = $lang['Update'];

				$forum_id = intval($HTTP_GET_VARS[POST_FORUM_URL]);

				$row = get_info('forum', $forum_id);

				$cat_id = $row['cat_id'];
				$forumname = $row['forum_name'];
				$forumdesc = $row['forum_desc'];
				$forumstatus = $row['forum_status'];
//-- mod : topic display order ---------------------------------------------------------------------
//-- add
				$forum_display_sort = $row['forum_display_sort'];
				$forum_display_order = $row['forum_display_order'];
				$forum_display_sort2 = $row['forum_display_sort2'];
				$forum_display_order2 = $row['forum_display_order2'];
//-- fin mod : topic display order -----------------------------------------------------------------				

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
				$main_type = $row['main_type'];
				if (!defined('SUB_FORUM_ATTACH'))
				{
					if (empty($main_type)) $main_type = POST_CAT_URL;
				}
				$forum_link				= $row['forum_link'];
				$forum_link_internal	= intval($row['forum_link_internal']);
				$forum_link_hit_count	= intval($row['forum_link_hit_count']);
				$forum_link_hit			= intval($row['forum_link_hit']);
//-- fin mod : categories hierarchy ----------------------------------------------------------------
				$split_field = $row['split_field'];

				$split_field_list_array = array(
				'title'	=> array('normal', 'remark1', 'remark2', 'remark3', 'remark4', 'remark5', 'remark6', 'remark7', 'remark8', 'remark9', 'remark10', 'remark11', 'remark12', 'remark13', 'remark14', 'remark15'),
				'value'	=> array('', 'remark1', 'remark2', 'remark3', 'remark4', 'remark5', 'remark6', 'remark7', 'remark8', 'remark9', 'remark10', 'remark11', 'remark12', 'remark13', 'remark14', 'remark15'),
				);

				$split_field_list = '';

				for ($i=0; $i < count($split_field_list_array['title']); $i++)
				{
					$selected = ($split_field_list_array['value'][$i]==$split_field) ? ' selected="selected"' : '';
					$split_field_list .= '<option value="' . $split_field_list_array['value'][$i] . '"' . $selected . '>' . $split_field_list_array['title'][$i] . '</option>';
				}

				//
				// start forum prune stuff.
				//
				if( $row['prune_enable'] )
				{
					$prune_enabled = "checked=\"checked\"";
					$sql = "SELECT *
               			FROM " . PRUNE_TABLE . "
               			WHERE forum_id = $forum_id";
					if(!$pr_result = $db->sql_query($sql))
					{
						 message_die(GENERAL_ERROR, "Auto-Prune: Couldn't read auto_prune table.", __LINE__, __FILE__);
        			}

					$pr_row = $db->sql_fetchrow($pr_result);
				}
				else
				{
					$prune_enabled = '';
				}
			}
			else
			{
				$l_title = $lang['Create_forum'];
				$newmode = 'createforum';
				$buttonvalue = $lang['Create_forum'];

				$forumdesc = '';
				$forumstatus = FORUM_UNLOCKED;
//-- mod : topic display order ---------------------------------------------------------------------
//-- add
				$forum_display_sort = 0;
				$forum_display_order = 0;
				$forum_display_sort2 = 0;
				$forum_display_order2 = 0;
//-- fin mod : topic display order -----------------------------------------------------------------
				

				$forum_id = ''; 
				$prune_enabled = '';
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//			}
//
//			$catlist = get_list('category', $cat_id, TRUE);
//-- add
				$main_type = POST_CAT_URL;
				$prune_enabled = '';
				$forum_link				= '';
				$forum_link_internal	= 0;
				$forum_link_hit_count	= 0;
				$forum_link_hit			= 0;


				$split_field = '';
				$split_field_list_array = array(
				'title'	=> array('normal', 'remark1', 'remark2', 'remark3', 'remark4', 'remark5', 'remark6', 'remark7', 'remark8', 'remark9', 'remark10', 'remark11', 'remark12', 'remark13', 'remark14', 'remark15'),
				'value'	=> array('', 'remark1', 'remark2', 'remark3', 'remark4', 'remark5', 'remark6', 'remark7', 'remark8', 'remark9', 'remark10', 'remark11', 'remark12', 'remark13', 'remark14', 'remark15'),
				);

				$split_field_list = '';

				for ($i=0; $i < count($split_field_list_array['title']); $i++)
				{
					$selected = ($split_field_list_array['value'][$i]==$split_field) ? ' selected="selected"' : '';
					$split_field_list .= '<option value="' . $split_field_list_array['value'][$i] . '"' . $selected . '>' . $split_field_list_array['title'][$i] . '</option>';
				}


			}
			$catlist = get_tree_option( $main_type . $cat_id, true, 'Root', 'onlyCat' );
//-- fin mod : categories hierarchy ----------------------------------------------------------------

			$forumstatus == ( FORUM_LOCKED ) ? $forumlocked = "selected=\"selected\"" : $forumunlocked = "selected=\"selected\"";
			
			// These two options ($lang['Status_unlocked'] and $lang['Status_locked']) seem to be missing from
			// the language files.
			$lang['Status_unlocked'] = isset($lang['Status_unlocked']) ? $lang['Status_unlocked'] : 'Unlocked';
			$lang['Status_locked'] = isset($lang['Status_locked']) ? $lang['Status_locked'] : 'Locked';
			
			$statuslist = "<option value=\"" . FORUM_UNLOCKED . "\" $forumunlocked>" . $lang['Status_unlocked'] . "</option>\n";
			$statuslist .= "<option value=\"" . FORUM_LOCKED . "\" $forumlocked>" . $lang['Status_locked'] . "</option>\n"; 

			$template->set_filenames(array(
				"body" => "service/forum_edit_body.tpl")
			);

//-- mod : topic display order ---------------------------------------------------------------------
//-- add
			$forum_display_sort_list = get_forum_display_sort_option($forum_display_sort, 'list', 'sort_extend');
			$forum_display_order_list = get_forum_display_sort_option($forum_display_order, 'list', 'order');
			$forum_display_sort_list2 = get_forum_display_sort_option($forum_display_sort2, 'list', 'sort_extend');
			$forum_display_order_list2 = get_forum_display_sort_option($forum_display_order2, 'list', 'order');
//-- fin mod : topic display order -----------------------------------------------------------------

			$s_hidden_fields = '<input type="hidden" name="mode" value="' . $newmode .'" /><input type="hidden" name="' . POST_FORUM_URL . '" value="' . $forum_id . '" />';

			if ( count($forum_moderators[$forum_id]) > 0 )
			{
				$l_moderators = ( count($forum_moderators[$forum_id]) == 1 ) ? $lang['Moderator'] : $lang['Moderators'];
				$moderator_list = implode(', ', $forum_moderators[$forum_id]);
			}


			$tpl_path = phpbb_realpath($phpbb_root_path . 'templates/' . $theme['template_name']);

			// look for sub-dir
			$main_tpl = opendir( $tpl_path );
			$dirs = array();
			while ( $file = readdir($main_tpl) ) if ( is_dir($tpl_path . '/' . $file) && !in_array( $file, array('.', '..', 'admin', 'images', 'service') ) ) $dirs[] = $file;
			closedir($main_tpl);

			sort($dirs);


			// build the list
			//$select = ( $subtpl_id == -1 ) ? ' selected="selected"' : '';
			$s_dir = '<select name="dir">';
			for ($i=0; $i < count($dirs); $i++) 
			{
				$select = ($dirs[$i] == "SD2" ) ? ' selected="selected"' : '';
				$s_dir .= '<option value="' . $dirs[$i] . '"' . $select . '>' . $dirs[$i] . '</option>';
			}
			$s_dir .= '</select>';



			$template->assign_vars(array(
//-- mod : topic display order ---------------------------------------------------------------------
//-- add
				'L_FORUM_DISPLAY_SORT'			=> $lang['Sort_by'],
				'S_FORUM_DISPLAY_SORT_LIST'		=> $forum_display_sort_list,
				'S_FORUM_DISPLAY_ORDER_LIST'	=> $forum_display_order_list,
				'S_FORUM_DISPLAY_SORT_LIST2'	=> $forum_display_sort_list2,
				'S_FORUM_DISPLAY_ORDER_LIST2'	=> $forum_display_order_list2,
//-- fin mod : topic display order -----------------------------------------------------------------
				'S_FORUM_ACTION' => append_sid("admin_forums.$phpEx"),
				'S_HIDDEN_FIELDS' => $s_hidden_fields,
				'S_SUBMIT_VALUE' => $buttonvalue, 
				'S_CAT_LIST' => $catlist,
				'S_STATUS_LIST' => $statuslist,
				'S_PRUNE_ENABLED' => $prune_enabled,

				'MODERATORS'			=> $moderator_list,
				'L_MODERATOR'			=> empty($moderator_list) ? '' : $l_moderators,

				'L_TEMPLATE' => $lang['Template'], 
				'TPL_PATH' => $tpl_path, 
				
				'S_DIR'	=> ($mode == 'editforum') ? $sub_templates['f'.$forum_id]['dir'] : $s_dir. " <a href=\"#\" onclick=\"javascript:window.open('../templates/" . $theme['template_name'] . "/'+ document.forum.dir.options[document.forum.dir.selectedIndex].value + '/preview.htm', 'preview', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=no, width=600, height=600');\">[" . $lang['Preview'] . "]</a>",


				'L_FORUM_TITLE' => $l_title, 
				'L_FORUM_EXPLAIN' => $lang['Forum_edit_delete_explain'], 
				'L_FORUM_SETTINGS' => $lang['Forum_settings'], 
				'L_FORUM_NAME' => $lang['Forum_name'], 
				'L_CATEGORY' => $lang['Category'], 
				'L_FORUM_DESCRIPTION' => $lang['Forum_desc'],
				'L_FORUM_STATUS' => $lang['Forum_status'],
				'L_AUTO_PRUNE' => $lang['Forum_pruning'],
				'L_ENABLED' => $lang['Enabled'],
				'L_PRUNE_DAYS' => $lang['prune_days'],
				'L_PRUNE_FREQ' => $lang['prune_freq'],
				'L_DAYS' => $lang['Days'],

				'PRUNE_DAYS' => ( isset($pr_row['prune_days']) ) ? $pr_row['prune_days'] : 7,
				'PRUNE_FREQ' => ( isset($pr_row['prune_freq']) ) ? $pr_row['prune_freq'] : 1,
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
				'L_LINK'							=> $lang['Forum_link'],
				'L_FORUM_LINK'						=> $lang['Forum_link_url'],
				'L_FORUM_LINK_EXPLAIN'				=> $lang['Forum_link_url_explain'],
				'FORUM_LINK'						=> $forum_link,
				'L_FORUM_LINK_INTERNAL'				=> $lang['Forum_link_internal'],
				'L_FORUM_LINK_INTERNAL_EXPLAIN'		=> $lang['Forum_link_internal_explain'],
				'FORUM_LINK_INTERNAL_YES'			=> ( $forum_link_internal) ? ' checked="checked"' : '',
				'FORUM_LINK_INTERNAL_NO'			=> (!$forum_link_internal) ? ' checked="checked"' : '',
				'L_FORUM_LINK_HIT_COUNT'			=> $lang['Forum_link_hit_count'],
				'L_FORUM_LINK_HIT_COUNT_EXPLAIN'	=> $lang['Forum_link_hit_count_explain'],
				'FORUM_LINK_HIT_COUNT_YES'			=> ( $forum_link_hit_count) ? ' checked="checked"' : '',
				'FORUM_LINK_HIT_COUNT_NO'			=> (!$forum_link_hit_count) ? ' checked="checked"' : '',
				'L_YES'								=> $lang['Yes'],
				'L_NO'								=> $lang['No'],
//-- fin mod : categories hierarchy ----------------------------------------------------------------
				'L_SPLIT_FIELD'						=> $lang['split_field'],
				'SPLIT_FIELD_LIST'						=> $split_field_list,
				'FORUM_NAME' => $forumname,
				'DESCRIPTION' => $forumdesc)
			);
			$template->pparse("body");
			break;

		case 'createforum':
			//
			// Create a forum in the DB
			//
			if( trim($HTTP_POST_VARS['forumname']) == "" )
			{
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//				message_die(GENERAL_ERROR, "Can't create a forum without a name");
//			}
//
//			$sql = "SELECT MAX(forum_order) AS max_order
//				FROM " . FORUMS_TABLE . "
//				WHERE cat_id = " . intval($HTTP_POST_VARS[POST_CAT_URL]);
//			if( !$result = $db->sql_query($sql) )
//			{
//				message_die(GENERAL_ERROR, "Couldn't get order number from forums table", "", __LINE__, __FILE__, $sql);
//			}
//			$row = $db->sql_fetchrow($result);
//
//			$max_order = $row['max_order'];
//-- add
				message_die(GENERAL_ERROR, $lang['Forum_name_missing']);
			}

			// get ids
			$fid = $HTTP_POST_VARS[POST_CAT_URL];
			$type = substr($fid, 0, 1);
			$id = intval(substr($fid, 1));
			if ($fid == 'Root')
			{
				$id = 0;
				$type = POST_CAT_URL;
				if (!defined('SUB_FORUM_ATTACH'))
				{
					message_die(GENERAL_ERROR, $lang['Attach_root_wrong']);
				}
			}
			if ($type != POST_CAT_URL)
			{
				if (!defined('SUB_FORUM_ATTACH'))
				{
					message_die(GENERAL_ERROR, $lang['Attach_forum_wrong']);
				}
				if ($type == POST_FORUM_URL)
				{
					$this = $tree['keys'][$type . $id];
					if (!empty($tree['data'][$this]['forum_link']))
					{
						message_die(GENERAL_ERROR, $lang['Forum_attached_to_link_denied']);
					}
				}
			}
			$cat_id = $id;

			// get the last order
			$max_order = 0;
			$last = count($tree['data'])-1;
			if ($last >= 0) 
			{
				$max_order = ($tree['type'][$last] == POST_CAT_URL) ? $tree['data'][$last]['cat_order'] : $tree['data'][$last]['forum_order'];
			}
//-- fin mod : categories hierarchy ----------------------------------------------------------------
			$next_order = $max_order + 10;
			
			$sql = "SELECT MAX(forum_id) AS max_id
				FROM " . FORUMS_TABLE;
			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't get order number from forums table", "", __LINE__, __FILE__, $sql);
			}
			$row = $db->sql_fetchrow($result);

			$max_id = $row['max_id'];
			$next_id = $max_id + 1;

			//
			// Default permissions of public :: 
			//


			$field_sql = "";
			$value_sql = "";

			$default_cat_auth = $tree['data'][$tree['keys'][$type . $id]]['cat_auth'];

			$simple_ary = $simple_auth_ary[$default_cat_auth];

			for($i = 0; $i < count($simple_ary); $i++)
			{			
				$field_sql .= ", $forum_auth_fields[$i]";
				$value_sql .= ", $simple_ary[$i]";
			}

//-- mod : topic display order ---------------------------------------------------------------------
//-- add
			$field_sql .= ', forum_display_sort';
			$value_sql .= ', ' . intval($HTTP_POST_VARS['forum_display_sort']);
			$field_sql .= ', forum_display_order';
			$value_sql .= ', ' . intval($HTTP_POST_VARS['forum_display_order']);
			$field_sql .= ', forum_display_sort2';
			$value_sql .= ', ' . intval($HTTP_POST_VARS['forum_display_sort2']);
			$field_sql .= ', forum_display_order2';
			$value_sql .= ', ' . intval($HTTP_POST_VARS['forum_display_order2']);
//-- fin mod : topic display order -----------------------------------------------------------------

			// There is no problem having duplicate forum names so we won't check for it.

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
			if (defined('SUB_FORUM_ATTACH'))
			{
				$field_sql .= ", main_type";
				$value_sql .= ", '$type'";
			}
			$forum_link				= isset($HTTP_POST_VARS['forum_link']) ? trim(stripslashes($HTTP_POST_VARS['forum_link'])) : '';
			$forum_link_internal	= isset($HTTP_POST_VARS['forum_link_internal']) ? intval($HTTP_POST_VARS['forum_link_internal']) : 0;
			$forum_link_hit_count	= isset($HTTP_POST_VARS['forum_link_hit_count']) ? intval($HTTP_POST_VARS['forum_link_hit_count']) : 0;
			$field_sql .= ", forum_link";
			$value_sql .= ", '$forum_link'";
			$field_sql .= ", forum_link_internal";
			$value_sql .= ", $forum_link_internal";
			$field_sql .= ", forum_link_hit_count";
			$value_sql .= ", $forum_link_hit_count";
//-- fin mod : categories hierarchy ----------------------------------------------------------------
			$split_field = isset($HTTP_POST_VARS['split_field']) ? trim($HTTP_POST_VARS['split_field']) : '';
			$field_sql .= ", split_field";
			$value_sql .= ", '$split_field'";


//-- mod : categories hierarchy --------------------------------------------------------------------
// here we replaced
//	" . intval($HTTP_POST_VARS[POST_CAT_URL]) . "
// with
//	$cat_id
//-- modify

			$sql = "INSERT INTO " . FORUMS_TABLE . " (forum_id, forum_name, cat_id, forum_desc, forum_order, forum_status, prune_enable" . $field_sql . ")
				VALUES ('" . $next_id . "', '" . str_replace("\'", "''", $HTTP_POST_VARS['forumname']) . "', $cat_id, '" . str_replace("\'", "''", $HTTP_POST_VARS['forumdesc']) . "', $next_order, " . intval($HTTP_POST_VARS['forumstatus']) . ", " . intval($HTTP_POST_VARS['prune_enable']) . $value_sql . ")";
//-- fin mod : categories hierarchy ----------------------------------------------------------------
			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't insert row in forums table", "", __LINE__, __FILE__, $sql);
			}
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
			admin_check_cat();
			get_user_tree($userdata);
			move_tree('Root', 0, 0);
//-- fin mod : categories hierarchy ----------------------------------------------------------------

//-- sub-TPL

		$sub_templates['f'.$next_id]['name'] = $HTTP_POST_VARS['dir'];
		$sub_templates['f'.$next_id]['dir'] = $HTTP_POST_VARS['dir'];
		$sub_templates['f'.$next_id]['head_stylesheet'] = '';
		$sub_templates['f'.$next_id]['imagefile'] = '';

		ksort( $sub_templates );

		// generate the php file	
		$tpl_path = phpbb_realpath($phpbb_root_path . 'templates/' . $theme['template_name']);
		$filename = $tpl_path . '/sub_templates.cfg';
		@CHMOD($filename, 0666);
		@unlink($filename);
		$f = @fopen($filename, 'w' );

		$texte  = "<?php\n";
		@fputs( $f, $texte );
		@fputs( $f, "\n" );
		@reset($sub_templates);
		while ( list($key, $value) = each($sub_templates) )
		{
			$nat	= substr( $key, 0, 1);
			$id		= intval( substr( $key, 1) );

			/*
			$name	= '';
			$found	= false;
			for ($i=0; ( ($i < count($board)) && !$found); $i++)
			{
				$found = ( ($board[$i]['type'] == $nat) && ($board[$i]['id'] == $id) );
				if ($found) $name = $board[$i]['name'];
			}
			$texte = "// $name\n";
			@fputs( $f, $texte );
			*/

			$texte = "$" . "sub_templates['$key']['name'] = '" . $value['name'] . "';\n";
			@fputs( $f, $texte );
			$texte = "$" . "sub_templates['$key']['dir'] = '" . $value['dir']  . "';\n";
			@fputs( $f, $texte );
			$texte = "$" . "sub_templates['$key']['head_stylesheet'] = '" . $value['head_stylesheet'] . "';\n";
			@fputs( $f, $texte );
			$texte = "$" . "sub_templates['$key']['imagefile'] = '" . $value['imagefile']  . "';\n";
			@fputs( $f, $texte );
			@fputs( $f, "\n" );
		}
		$texte = "?>";
		@fputs( $f, $texte );
		@fclose( $f );


//



			if( $HTTP_POST_VARS['prune_enable'] )
			{

				if( $HTTP_POST_VARS['prune_days'] == "" || $HTTP_POST_VARS['prune_freq'] == "")
				{
					message_die(GENERAL_MESSAGE, $lang['Set_prune_data']);
				}

				$sql = "INSERT INTO " . PRUNE_TABLE . " (forum_id, prune_days, prune_freq)
					VALUES('" . $next_id . "', " . intval($HTTP_POST_VARS['prune_days']) . ", " . intval($HTTP_POST_VARS['prune_freq']) . ")";
				if( !$result = $db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, "Couldn't insert row in prune table", "", __LINE__, __FILE__, $sql);
				}
			}

			$message = $lang['Forums_updated'] . "<br /><br />" . sprintf($lang['Click_return_forumadmin'], "<a href=\"" . append_sid("admin_forums.$phpEx") . "\">", "</a>") . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>");

			message_die(GENERAL_MESSAGE, $message);

			break;

		case 'modforum':

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
			if( trim($HTTP_POST_VARS['forumname']) == "" )
			{
				message_die(GENERAL_ERROR, $lang['Forum_name_missing']);
			}

			$fid = $HTTP_POST_VARS[POST_CAT_URL];
			$type = substr($fid, 0, 1);
			$id = intval(substr($fid, 1));
			if ($fid == 'Root')
			{
				$id = 0;
				$type = POST_CAT_URL;
				if (!defined('SUB_FORUM_ATTACH'))
				{
					message_die(GENERAL_ERROR, $lang['Attach_root_wrong']);
				}
			}
			if ($type != POST_CAT_URL)
			{
				if (!defined('SUB_FORUM_ATTACH'))
				{
					message_die(GENERAL_ERROR, $lang['Attach_forum_wrong']);
				}
				if ($type == POST_FORUM_URL)
				{
					$this = $tree['keys'][$type . $id];
					if (!empty($tree['data'][$this]['forum_link']))
					{
						message_die(GENERAL_ERROR, $lang['Forum_attached_to_link_denied']);
					}
				}
			}
			$cat_id = $id;
//-- fin mod : categories hierarchy ----------------------------------------------------------------

			// Modify a forum in the DB
			if( isset($HTTP_POST_VARS['prune_enable']))
			{
				if( $HTTP_POST_VARS['prune_enable'] != 1 )
				{
					$HTTP_POST_VARS['prune_enable'] = 0;
				}
			}

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
			$field_value_sql = '';
			$forum_link				= isset($HTTP_POST_VARS['forum_link']) ? trim(stripslashes($HTTP_POST_VARS['forum_link'])) : '';
			$forum_link_internal	= isset($HTTP_POST_VARS['forum_link_internal']) ? intval($HTTP_POST_VARS['forum_link_internal']) : 0;
			$forum_link_hit_count	= isset($HTTP_POST_VARS['forum_link_hit_count']) ? intval($HTTP_POST_VARS['forum_link_hit_count']) : 0;

			// check if link nothing is attached to the forum
			if (!empty($forum_link))
			{
				// forum_id
				$forum_id = intval($HTTP_POST_VARS[POST_FORUM_URL]);

				// search in tree if something is attached to
				if (isset($tree['sub'][POST_FORUM_URL . $forum_id]))
				{
					message_die(GENERAL_MESSAGE, $lang['Forum_link_with_attachment_deny']);
				}

				// is there some topics attached to ?
				$sql = "SELECT * FROM " . TOPICS_TABLE . " WHERE forum_id=$forum_id";
				if( !$result = $db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, 'Couldn\'t access topics table', '', __LINE__, __FILE__, $sql);
				}
				if ($row = $db->sql_fetchrow($result))
				{
					message_die(GENERAL_MESSAGE, $lang['Forum_link_with_topics_deny']);
				}
			}

			$field_value_sql .= ", forum_link='$forum_link'";
			$field_value_sql .= ", forum_link_internal=$forum_link_internal";
			$field_value_sql .= ", forum_link_hit_count=$forum_link_hit_count";
			if (defined('SUB_FORUM_ATTACH'))
			{
				$field_value_sql .= ", main_type = '$type'";
			}
//-- fin mod : categories hierarchy ----------------------------------------------------------------
			$split_field = isset($HTTP_POST_VARS['split_field']) ? trim($HTTP_POST_VARS['split_field']) : '';	
			$field_value_sql .= ", split_field='$split_field' ";
			


//-- mod : categories hierarchy --------------------------------------------------------------------
// here we replaced
//	" . intval($HTTP_POST_VARS[POST_CAT_URL]) . "
// with
//	$cat_id
//
// and added
//	. $field_value_sql
//--- modify

//-- mod : topic display order ---------------------------------------------------------------------
// here we have added :
//		, forum_display_order = " . intval($HTTP_POST_VARS['forum_display_order']) . ", forum_display_sort = " . intval($HTTP_POST_VARS['forum_display_sort']) . "
//-- modify
			$sql = "UPDATE " . FORUMS_TABLE . "
				SET forum_name = '" . str_replace("\'", "''", $HTTP_POST_VARS['forumname']) . "', cat_id = $cat_id, forum_desc = '" . str_replace("\'", "''", $HTTP_POST_VARS['forumdesc']) . "', forum_status = " . intval($HTTP_POST_VARS['forumstatus']) . ", forum_display_order = " . intval($HTTP_POST_VARS['forum_display_order']) . ", forum_display_sort = " . intval($HTTP_POST_VARS['forum_display_sort']) . ", forum_display_order2 = " . intval($HTTP_POST_VARS['forum_display_order2']) . ", forum_display_sort2 = " . intval($HTTP_POST_VARS['forum_display_sort2']) . ", prune_enable = " . intval($HTTP_POST_VARS['prune_enable']) . $field_value_sql . "
				WHERE forum_id = " . intval($HTTP_POST_VARS[POST_FORUM_URL]);

//-- fin mod : topic display order -----------------------------------------------------------------

//-- fin mod : categories hierarchy ----------------------------------------------------------------

			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't update forum information", "", __LINE__, __FILE__, $sql);
			}

			// Log actions MOD Start
			log_action('update[forum information]', intval($HTTP_POST_VARS[POST_FORUM_URL]), $userdata['user_id'], $userdata['username']);
			// Log actions MOD End

			if( $HTTP_POST_VARS['prune_enable'] == 1 )
			{
				if( $HTTP_POST_VARS['prune_days'] == "" || $HTTP_POST_VARS['prune_freq'] == "" )
				{
					message_die(GENERAL_MESSAGE, $lang['Set_prune_data']);
				}

				$sql = "SELECT *
					FROM " . PRUNE_TABLE . "
					WHERE forum_id = " . intval($HTTP_POST_VARS[POST_FORUM_URL]);
				if( !$result = $db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, "Couldn't get forum Prune Information","",__LINE__, __FILE__, $sql);
				}

				if( $db->sql_numrows($result) > 0 )
				{
					$sql = "UPDATE " . PRUNE_TABLE . "
						SET	prune_days = " . intval($HTTP_POST_VARS['prune_days']) . ",	prune_freq = " . intval($HTTP_POST_VARS['prune_freq']) . "
				 		WHERE forum_id = " . intval($HTTP_POST_VARS[POST_FORUM_URL]);
				}
				else
				{
					$sql = "INSERT INTO " . PRUNE_TABLE . " (forum_id, prune_days, prune_freq)
						VALUES(" . intval($HTTP_POST_VARS[POST_FORUM_URL]) . ", " . intval($HTTP_POST_VARS['prune_days']) . ", " . intval($HTTP_POST_VARS['prune_freq']) . ")";
				}

				if( !$result = $db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, "Couldn't Update Forum Prune Information","",__LINE__, __FILE__, $sql);
				}

				// Log actions MOD Start
				log_action('update[Prune-Information]', intval($HTTP_POST_VARS[POST_FORUM_URL]), $userdata['user_id'], $userdata['username']);
				// Log actions MOD End

			}

			$message = $lang['Forums_updated'] . "<br /><br />" . sprintf($lang['Click_return_forumadmin'], "<a href=\"" . append_sid("admin_forums.$phpEx") . "\">", "</a>") . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>");

			message_die(GENERAL_MESSAGE, $message);

			break;
			
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//		case 'addcat':
//			// Create a category in the DB
//			if( trim($HTTP_POST_VARS['categoryname']) == '')
//			{
//				message_die(GENERAL_ERROR, "Can't create a category without a name");
//			}
//
//			$sql = "SELECT MAX(cat_order) AS max_order
//				FROM " . CATEGORIES_TABLE;
//			if( !$result = $db->sql_query($sql) )
//			{
//				message_die(GENERAL_ERROR, "Couldn't get order number from categories table", "", __LINE__, __FILE__, $sql);
//			}
//			$row = $db->sql_fetchrow($result);
//
//			$max_order = $row['max_order'];
//-- add
		case 'createcat':
			// Create a category in the DB
			if( trim($HTTP_POST_VARS['cat_title']) == '')
			{
				message_die(GENERAL_ERROR, $lang['Category_name_missing']);
			}
			$main = $HTTP_POST_VARS['cat_main'];
			if ($main == 'Root')
			{
				$cat_main_type = POST_CAT_URL;
				$cat_main = 0;
			}
			else
			{
				$cat_main_type = substr($main, 0, 1);
				$cat_main = intval(substr($main, 1));
			}
			if ($cat_main_type == POST_FORUM_URL)
			{
				$this = $tree['keys'][$cat_main_type . $cat_main];
				if (!empty($tree['data'][$this]['forum_link']))
				{
					message_die(GENERAL_ERROR, $lang['Forum_attached_to_link_denied']);
				}
			}

			// get the last order
			$max_order = 0;
			$last = count($tree['data'])-1;
			if ($last >= 0) 
			{
				$max_order = ($tree['type'][$last] == POST_CAT_URL) ? $tree['data'][$last]['cat_order'] : $tree['data'][$last]['forum_order'];
			}
//-- fin mod : categories hierarchy ----------------------------------------------------------------
			$next_order = $max_order + 10;

			//
			// There is no problem having duplicate forum names so we won't check for it.
			//
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//			$sql = "INSERT INTO " . CATEGORIES_TABLE . " (cat_title, cat_order)
//				VALUES ('" . str_replace("\'", "''", $HTTP_POST_VARS['categoryname']) . "', $next_order)";
//-- add
			$sql = "INSERT INTO " . CATEGORIES_TABLE . " (cat_title, cat_main_type, cat_main, cat_desc, cat_order, cat_auth)
				VALUES ('" . str_replace("\'", "''", $HTTP_POST_VARS['cat_title']) . "', '" . $cat_main_type . "', " . $cat_main . ", '" . str_replace("\'", "''", $HTTP_POST_VARS['cat_desc']) . "', '" . $next_order . "', '" . $HTTP_POST_VARS['cat_auth'] . "')";
//-- fin mod : categories hierarchy ----------------------------------------------------------------
			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't insert row in categories table", "", __LINE__, __FILE__, $sql);
			}

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
			admin_check_cat();
			get_user_tree($userdata);
			move_tree('Root', 0, 0);
//-- fin mod : categories hierarchy ----------------------------------------------------------------


			$message = $lang['Forums_updated'] . "<br /><br />" . sprintf($lang['Click_return_forumadmin'], "<a href=\"" . append_sid("admin_forums.$phpEx") . "\">", "</a>") . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>");

			message_die(GENERAL_MESSAGE, $message);

			break;

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
		case 'addcat':
//-- fin mod : categories hierarchy ----------------------------------------------------------------			

		case 'editcat':
			//
			// Show form to edit a category
			//

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
			if ($mode == 'editcat')
			{
				$l_title = $lang['Edit_Category'];
//-- fin mod : categories hierarchy ----------------------------------------------------------------

			$newmode = 'modcat';
			$buttonvalue = $lang['Update'];

			$cat_id = intval($HTTP_GET_VARS[POST_CAT_URL]);

			$row = get_info('category', $cat_id);
			$cat_title = $row['cat_title'];

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
				$cat_desc	= $row['cat_desc'];
				$cat_auth	= $row['cat_auth'];
				$cat_main	= $row['cat_main'];				
				$cat_main_type = $row['cat_main_type'];
				if ($cat_main <= 0)
				{
					$cat_main = 0;
					$cat_main_type = POST_CAT_URL;
				}
			}
			else
			{
				$l_title = $lang['Create_category'];
				$newmode = 'createcat';
				$buttonvalue = $lang['Create_category'];
				$cat_desc  = '';				
				$cat_main_type = POST_CAT_URL;
				if ($cat_main <= 0)
				{
					$cat_main = 0;
				}
				
				$cat_auth = $tree['data'][$tree['keys'][$cat_main_type . $cat_main]]['cat_auth'];	

			}			

			// get the list of cats/forums
			$catlist = get_tree_option($cat_main_type . $cat_main, true, 'Root', 'onlyCat', POST_CAT_URL.$cat_id);
//-- fin mod : categories hierarchy ----------------------------------------------------------------

			$template->set_filenames(array(
				"body" => "service/category_edit_body.tpl")
			);

			/////////////////////////////////////

			
			$auth_list = "";			

			for ($i=0; $i < count($simple_auth_types); $i++)
			{
				$selected = ($i==$cat_auth) ? ' selected="selected"' : '';
				$l_value = $simple_auth_types[$i];
				$auth_list .= '<option value="' . $i . '"' . $selected . '>' . $l_value . '</option>';
			}

			/////////////////////////////////////

			$s_hidden_fields = '<input type="hidden" name="mode" value="' . $newmode . '" /><input type="hidden" name="' . POST_CAT_URL . '" value="' . $cat_id . '" />';

			$template->assign_vars(array(
				'CAT_TITLE' => $cat_title,

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//				'L_EDIT_CATEGORY' => $lang['Edit_Category'],
//-- add
				'L_CAT_DESCRIPTION'			=> $lang['Category_desc'],
				'CAT_DESCRIPTION'			=> $cat_desc,
				'S_CAT_LIST'				=> $catlist,
				'L_CATEGORY_ATTACHMENT'		=> $lang['Category_attachment'],

				'L_EDIT_CATEGORY'			=> $l_title,
//-- fin mod : categories hierarchy ---------------------------------------------------------------- 
				'L_EDIT_CATEGORY_EXPLAIN' => $lang['Edit_Category_explain'], 
				'L_CATEGORY' => $lang['Category'], 
					
				'L_AUTH_TITLE' => $lang['Auth_Control_Forum'], 
				'S_AUTH_LIST' => $auth_list, 

				'S_HIDDEN_FIELDS' => $s_hidden_fields, 
				'S_SUBMIT_VALUE' => $buttonvalue, 
				'S_FORUM_ACTION' => append_sid("admin_forums.$phpEx"))
			);

			$template->pparse("body");
			break;

		case 'modcat':
			// Modify a category in the DB
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
			if( trim($HTTP_POST_VARS['cat_title']) == '')
			{
				message_die(GENERAL_ERROR, $lang['Category_name_missing']);
			}
			$main = $HTTP_POST_VARS['cat_main'];
			if ($main == 'Root')
			{
				$cat_main_type = POST_CAT_URL;
				$cat_main = 0;
			}
			else
			{
				$cat_main_type = substr($main, 0, 1);
				$cat_main = intval(substr($main, 1));
			}
			if ($cat_main_type == POST_FORUM_URL)
			{
				$this = $tree['keys'][$cat_main_type . $cat_main];
				if (!empty($tree['data'][$this]['forum_link']))
				{
					message_die(GENERAL_ERROR, $lang['Forum_attached_to_link_denied']);
				}
			}

			// update db
//-- fin mod : categories hierarchy ----------------------------------------------------------------

//-- mod : categories hierarchy --------------------------------------------------------------------
// here we added
//	, cat_main_type='" . $cat_main_type . "', cat_main = " . $cat_main . ", cat_desc = '" . str_replace("\'", "''", $HTTP_POST_VARS['cat_desc']) . "' ".
//-- modify
			$sql = "UPDATE " . CATEGORIES_TABLE . "
				SET cat_title = '" . str_replace("\'", "''", $HTTP_POST_VARS['cat_title']) . "', cat_main_type='" . $cat_main_type . "', cat_main = " . $cat_main . ", cat_desc = '" . str_replace("\'", "''", $HTTP_POST_VARS['cat_desc']) . "', cat_auth = '" . $HTTP_POST_VARS['cat_auth'] . "'  
				WHERE cat_id = " . intval($HTTP_POST_VARS[POST_CAT_URL]);
//-- fin mod : categories hierarchy ----------------------------------------------------------------
			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't update forum information", "", __LINE__, __FILE__, $sql);
			}

				// Log actions MOD Start
				log_action('update[cat-Information]', intval($HTTP_POST_VARS[POST_CAT_URL]), $userdata['user_id'], $userdata['username']);
				// Log actions MOD End

			$message = $lang['Forums_updated'] . "<br /><br />" . sprintf($lang['Click_return_forumadmin'], "<a href=\"" . append_sid("admin_forums.$phpEx") . "\">", "</a>") . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>");

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
			$err = admin_check_cat();
			if ( $err ) $message = $lang['Category_config_error_fixed'] . "<br /><br />" . $message;
//-- fin mod : categories hierarchy ----------------------------------------------------------------

			message_die(GENERAL_MESSAGE, $message);

			break;
			
		case 'deleteforum':
			// Show form to delete a forum
			$forum_id = intval($HTTP_GET_VARS[POST_FORUM_URL]);

			$select_to = '<select name="to_id">';
			$select_to .= "<option value=\"-1\"$s>" . $lang['Delete_all_posts'] . "</option>\n";
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//			$select_to .= get_list('forum', $forum_id, 0);
//-- add
			$select_to .= '<option value=""></option>';
			$select_to .= get_tree_option('', true, 'Root'); 
//-- fin mod : categories hierarchy ----------------------------------------------------------------
			$select_to .= '</select>';

			$buttonvalue = $lang['Move_and_Delete'];

			$newmode = 'movedelforum';

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//			$foruminfo = get_info('forum', $forum_id);
//			$name = $foruminfo['forum_name'];
//-- add
			$this = $tree['keys'][POST_FORUM_URL . $forum_id];
			$name = $tree['data'][$this]['forum_name'];
			$desc = $tree['data'][$this]['forum_desc'];

			$name_trad = get_object_lang(POST_FORUM_URL . $forum_id, 'name');
			$desc_trad = get_object_lang(POST_FORUM_URL . $forum_id, 'desc');
			if ($name != $name_trad) $name = '(' . $name . ') ' . $name_trad;
			if ($desc != $desc_trad) $desc = '(' . $desc . ') ' . $desc_trad;
//-- fin mod : categories hierarchy ----------------------------------------------------------------

			$template->set_filenames(array(
				"body" => "service/forum_delete_body.tpl")
			);

			$s_hidden_fields = '<input type="hidden" name="mode" value="' . $newmode . '" /><input type="hidden" name="from_id" value="' . $forum_id . '" />';

			$template->assign_vars(array(
				'NAME' => $name, 

				'L_FORUM_DELETE' => $lang['Forum_delete'], 
				'L_FORUM_DELETE_EXPLAIN' => $lang['Forum_delete_explain'], 
				'L_MOVE_CONTENTS' => $lang['Move_contents'], 
				'L_FORUM_NAME' => $lang['Forum_name'], 

				"S_HIDDEN_FIELDS" => $s_hidden_fields,
				'S_FORUM_ACTION' => append_sid("admin_forums.$phpEx"), 
				'S_SELECT_TO' => $select_to,
				'S_SUBMIT_VALUE' => $buttonvalue)
			);

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
			$template->assign_vars(array(
				'DESC'			=> $desc,
				'L_FORUM_DESC'	=> $lang['Forum_desc'],
				)
			);
//-- fin mod : categories hierarchy ----------------------------------------------------------------

			$template->pparse("body");
			break;

		case 'movedelforum':
			//
			// Move or delete a forum in the DB
			//
			$from_id = intval($HTTP_POST_VARS['from_id']);
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//			$to_id = intval($HTTP_POST_VARS['to_id']);
//-- add
			$to_fid = $HTTP_POST_VARS['to_id'];
			if (intval($to_fid) == -1)
			{
				$to_type = '';
				$to_id = -1;
			}
			else
			{
				$to_type	= substr($to_fid, 0, 1);
				$to_id		= intval(substr($to_fid, 1));
				if (($to_type != POST_FORUM_URL) || ($to_fid == 'Root'))
				{
					message_die(GENERAL_MESSAGE, $lang['Only_forum_for_topics']);
				}
			}

			// check if sub-levels present
			if (!empty($tree['sub'][POST_FORUM_URL. $from_id]))
			{
				message_die(GENERAL_MESSAGE, $lang['Delete_forum_with_attachment_denied']);
			}
//-- fin mod : categories hierarchy ----------------------------------------------------------------
			$delete_old = intval($HTTP_POST_VARS['delete_old']);

			// Either delete or move all posts in a forum
			if($to_id == -1)
			{
				// Delete polls in this forum
				$sql = "SELECT v.vote_id 
					FROM " . VOTE_DESC_TABLE . " v, " . TOPICS_TABLE . " t 
					WHERE t.forum_id = $from_id 
						AND v.topic_id = t.topic_id";
				if (!($result = $db->sql_query($sql)))
				{
					message_die(GENERAL_ERROR, "Couldn't obtain list of vote ids", "", __LINE__, __FILE__, $sql);
				}

				if ($row = $db->sql_fetchrow($result))
				{
					$vote_ids = '';
					do
					{
						$vote_ids = (($vote_ids != '') ? ', ' : '') . $row['vote_id'];
					}
					while ($row = $db->sql_fetchrow($result));

					$sql = "DELETE FROM " . VOTE_DESC_TABLE . " 
						WHERE vote_id IN ($vote_ids)";
					$db->sql_query($sql);

					$sql = "DELETE FROM " . VOTE_RESULTS_TABLE . " 
						WHERE vote_id IN ($vote_ids)";
					$db->sql_query($sql);

					$sql = "DELETE FROM " . VOTE_USERS_TABLE . " 
						WHERE vote_id IN ($vote_ids)";
					$db->sql_query($sql);

					// Log actions MOD Start
					log_action('delete[polls-in-forum]', $from_id, $userdata['user_id'], $userdata['username']);
					// Log actions MOD End

				}
				$db->sql_freeresult($result);
				
				include($phpbb_root_path . "includes/prune.$phpEx");
				prune($from_id, 0, true); // Delete everything from forum
			}
			else
			{
				$sql = "SELECT *
					FROM " . FORUMS_TABLE . "
					WHERE forum_id IN ($from_id, $to_id)";
				if( !$result = $db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, "Couldn't verify existence of forums", "", __LINE__, __FILE__, $sql);
				}

				if($db->sql_numrows($result) != 2)
				{
					message_die(GENERAL_ERROR, "Ambiguous forum ID's", "", __LINE__, __FILE__);
				}
				$sql = "UPDATE " . TOPICS_TABLE . "
					SET forum_id = $to_id
					WHERE forum_id = $from_id";
				if( !$result = $db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, "Couldn't move topics to other forum", "", __LINE__, __FILE__, $sql);
				}
				$sql = "UPDATE " . POSTS_TABLE . "
					SET	forum_id = $to_id
					WHERE forum_id = $from_id";
				if( !$result = $db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, "Couldn't move posts to other forum", "", __LINE__, __FILE__, $sql);
				}
				sync('forum', $to_id);
				// Log actions MOD Start
				log_action('update[move-posts-to-other-forum]', $from_id, $userdata['user_id'], $userdata['username']);
				// Log actions MOD End
			}

			// Alter Mod level if appropriate - 2.0.4
			$sql = "SELECT ug.user_id 
				FROM " . AUTH_ACCESS_TABLE . " a, " . USER_GROUP_TABLE . " ug 
				WHERE a.forum_id <> $from_id 
					AND a.auth_mod = 1
					AND ug.group_id = a.group_id";
			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't obtain moderator list", "", __LINE__, __FILE__, $sql);
			}

			if ($row = $db->sql_fetchrow($result))
			{
				$user_ids = '';
				do
				{
					$user_ids .= (($user_ids != '') ? ', ' : '' ) . $row['user_id'];
				}
				while ($row = $db->sql_fetchrow($result));

				$sql = "SELECT ug.user_id 
					FROM " . AUTH_ACCESS_TABLE . " a, " . USER_GROUP_TABLE . " ug 
					WHERE a.forum_id = $from_id 
						AND a.auth_mod = 1 
						AND ug.group_id = a.group_id
						AND ug.user_id NOT IN ($user_ids)";
				if( !$result2 = $db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, "Couldn't obtain moderator list", "", __LINE__, __FILE__, $sql);
				}
					
				if ($row = $db->sql_fetchrow($result2))
				{
					$user_ids = '';
					do
					{
						$user_ids .= (($user_ids != '') ? ', ' : '' ) . $row['user_id'];
					}
					while ($row = $db->sql_fetchrow($result2));

					$sql = "UPDATE " . USERS_TABLE . " 
						SET user_level = " . USER . " 
						WHERE user_id IN ($user_ids) 
							AND user_level <> " . ADMIN;
					$db->sql_query($sql);
				}
				$db->sql_freeresult($result);

			}
			$db->sql_freeresult($result2);

			$sql = "DELETE FROM " . FORUMS_TABLE . "
				WHERE forum_id = $from_id";
			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't delete forum", "", __LINE__, __FILE__, $sql);
			}
			
			$sql = "DELETE FROM " . AUTH_ACCESS_TABLE . "
				WHERE forum_id = $from_id";
			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't delete forum", "", __LINE__, __FILE__, $sql);
			}
			
			$sql = "DELETE FROM " . PRUNE_TABLE . "
				WHERE forum_id = $from_id";
			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't delete forum prune information!", "", __LINE__, __FILE__, $sql);
			}

			// Log actions MOD Start
			log_action('delete[forum]', $from_id, $userdata['user_id'], $userdata['username']);
			// Log actions MOD End

			$message = $lang['Forums_updated'] . "<br /><br />" . sprintf($lang['Click_return_forumadmin'], "<a href=\"" . append_sid("admin_forums.$phpEx") . "\">", "</a>") . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>");

			message_die(GENERAL_MESSAGE, $message);

			break;
			
		case 'deletecat':
			//
			// Show form to delete a category
			//
			$cat_id = intval($HTTP_GET_VARS[POST_CAT_URL]);

			$buttonvalue = $lang['Move_and_Delete'];
			$newmode = 'movedelcat';
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//			$catinfo = get_info('category', $cat_id);
//			$name = $catinfo['cat_title'];
//
//			if ($catinfo['number'] == 1)
//			{
//				$sql = "SELECT count(*) as total
//					FROM ". FORUMS_TABLE;
//				if( !$result = $db->sql_query($sql) )
//				{
//					message_die(GENERAL_ERROR, "Couldn't get Forum count", "", __LINE__, __FILE__, $sql);
//				}
//				$count = $db->sql_fetchrow($result);
//				$count = $count['total'];
//
//				if ($count > 0)
//				{
//					message_die(GENERAL_ERROR, $lang['Must_delete_forums']);
//				}
//				else
//				{
//					$select_to = $lang['Nowhere_to_move'];
//				}
//			}
//			else
//			{
//				$select_to = '<select name="to_id">';
//				$select_to .= get_list('category', $cat_id, 0);
//				$select_to .= '</select>';
//			}
//-- add
			$this = $tree['keys'][POST_CAT_URL . $cat_id];
			$name = $tree['data'][$this]['cat_title'];
			$desc = $tree['data'][$this]['cat_desc'];
			$cat_auth = $tree['data'][$this]['cat_auth'];

			$name_trad = get_object_lang(POST_CAT_URL . $cat_id, 'name');
			$desc_trad = get_object_lang(POST_CAT_URL . $cat_id, 'desc');
			if ($name != $name_trad) $name = '(' . $name . ') ' . $name_trad;
			if ($desc != $desc_trad) $desc = '(' . $desc . ') ' . $desc_trad;

			// chek main category deletation
			if ($tree['main'][$this] == 'Root')
			{
				// check if other main categories
				$found = false;
				for ($i=0; (($i < count($tree['data'])) && !$found); $i++)
				{
					$found = (($i != $this) && ($tree['main'][$i] == 'Root'));
				}
				// no other main cats : check if forums presents
				if (!$found)
				{
					$found = false;
					for ($i=0; $i < count($tree['sub'][POST_CAT_URL . $from_id]); $i++)
					{
						$found = ($tree['type'][$tree['keys'][$tree['sub'][POST_CAT_URL . $cat_id][$i]]] == POST_FORUM_URL);
					}
					if ($found)
					{
						message_die(GENERAL_ERROR, $lang['Must_delete_forums']);
					}
				}
			}
			
			// get cat list
			$s_cat_list = get_tree_option('', true, 'Root');
			$select_to = '<select name="to_id">' . $s_cat_list . '</select>';
//-- fin mod : categories hierarchy ----------------------------------------------------------------

			$template->set_filenames(array(
				"body" => "service/forum_delete_body.tpl")
			);

			$s_hidden_fields = '<input type="hidden" name="mode" value="' . $newmode . '" /><input type="hidden" name="from_id" value="' . $cat_id . '" />';

			$template->assign_vars(array(
				'NAME' => $name, 

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//				'L_FORUM_DELETE' => $lang['Forum_delete'], 
//				'L_FORUM_DELETE_EXPLAIN' => $lang['Forum_delete_explain'], 
//-- add
				'L_FORUM_DELETE' => $lang['Category_delete'],
				'L_FORUM_DELETE_EXPLAIN' => $lang['Category_delete_explain'],
//-- fin mod : categories hierarchy ----------------------------------------------------------------
				'L_MOVE_CONTENTS' => $lang['Move_contents'], 
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//				'L_FORUM_NAME' => $lang['Forum_name'], 
//-- add
				'L_FORUM_NAME' => $lang['Category'],
//-- fin mod : categories hierarchy ----------------------------------------------------------------
				
				'S_HIDDEN_FIELDS' => $s_hidden_fields,
				'S_FORUM_ACTION' => append_sid("admin_forums.$phpEx"), 
				'S_SELECT_TO' => $select_to,
				'S_SUBMIT_VALUE' => $buttonvalue)
			);

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
			$template->assign_vars(array(
				'L_FORUM_DESC'	=> $lang['Category_desc'],
				'DESC'			=> $desc,
				)
			);
//-- fin mod : categories hierarchy ----------------------------------------------------------------
			$template->pparse("body");
			break;

		case 'movedelcat':
			//
			// Move or delete a category in the DB
			//
			$from_id = intval($HTTP_POST_VARS['from_id']);
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//			$to_id = intval($HTTP_POST_VARS['to_id']); 
//-- add
			$to_fid		= $HTTP_POST_VARS['to_id'];
			$to_type	= substr($to_fid, 0, 1);
			$to_id		= intval(substr($to_fid, 1));
//-- fin mod : categories hierarchy ----------------------------------------------------------------

			if (!empty($to_id))
			{
				$sql = "SELECT *
					FROM " . CATEGORIES_TABLE . "
					WHERE cat_id IN ($from_id, $to_id)";
				if( !$result = $db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, "Couldn't verify existence of categories", "", __LINE__, __FILE__, $sql);
				}
				if($db->sql_numrows($result) != 2)
				{
					message_die(GENERAL_ERROR, "Ambiguous category ID's", "", __LINE__, __FILE__);
				}

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
				// check that there is no forum attached to the from cat (will issue to forum attached to forums)
				if (($to_type == POST_FORUM_URL) && !defined('SUB_FORUM_ATTACH'))
				{
					$found = false;
					for ($i=0; $i < count($tree['sub'][POST_CAT_URL . $from_id]); $i++)
					{
						$found = ($tree['type'][$tree['keys'][$tree['sub'][POST_CAT_URL . $from_id][$i]]] == POST_FORUM_URL);
					}
					if ($found)
					{
						message_die(GENERAL_ERROR, $lang['Must_delete_forums']);
					}
				}

				$sql_feed = '';
				$sql_where = '';
				if (defined('SUB_FORUM_ATTACH'))
				{
					$sql_feed = ", main_type='$to_type'";
					$sql_where = " AND main_type='" . POST_CAT_URL . "'";
				}
//-- fin mod : categories hierarchy ----------------------------------------------------------------


//-- mod : categories hierarchy --------------------------------------------------------------------
// here we added
//	" . $sql_feed . "
// and
//	 . $sql_where
//-- modify
				$sql = "UPDATE " . FORUMS_TABLE . "
					SET cat_id = $to_id" . $sql_feed . "
					WHERE cat_id = $from_id" . $sql_where;
//-- fin mod : categories hierarchy ----------------------------------------------------------------
				if( !$result = $db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, "Couldn't move forums to other category", "", __LINE__, __FILE__, $sql);
				}
				// Log actions MOD Start
				log_action('update[move-forums-to-other-category]', $from_id, $userdata['user_id'], $userdata['username']);
				// Log actions MOD End
			}

			$sql = "DELETE FROM " . CATEGORIES_TABLE ."
				WHERE cat_id = $from_id";
				
			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't delete category", "", __LINE__, __FILE__, $sql);
			}

			// Log actions MOD Start
			log_action('delete[category]', $from_id, $userdata['user_id'], $userdata['username']);
			// Log actions MOD End


			$message = $lang['Forums_updated'] . "<br /><br />" . sprintf($lang['Click_return_forumadmin'], "<a href=\"" . append_sid("admin_forums.$phpEx") . "\">", "</a>") . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>");

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
			$err = admin_check_cat();
			if ( $err ) $message = $lang['Category_config_error_fixed'] . "<br /><br />" . $message;
//-- fin mod : categories hierarchy ----------------------------------------------------------------

			message_die(GENERAL_MESSAGE, $message);

			break;

		case 'forum_order':
			//
			// Change order of forums in the DB
			//
			$move = intval($HTTP_GET_VARS['move']);
			$forum_id = intval($HTTP_GET_VARS[POST_FORUM_URL]);

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//			$forum_info = get_info('forum', $forum_id);
//
//			$cat_id = $forum_info['cat_id'];
//
//			$sql = "UPDATE " . FORUMS_TABLE . "
//				SET forum_order = forum_order + $move
//				WHERE forum_id = $forum_id";
//			if( !$result = $db->sql_query($sql) )
//			{
//				message_die(GENERAL_ERROR, "Couldn't change category order", "", __LINE__, __FILE__, $sql);
//			}
//
//			renumber_order('forum', $forum_info['cat_id']);
//-- add
			// update the level order
			move_tree(POST_FORUM_URL, $forum_id, $move);
//-- fin mod : categories hierarchy ----------------------------------------------------------------			$show_index = TRUE;
			
			$show_index = TRUE;

			break;
			
		case 'cat_order':
			//
			// Change order of categories in the DB
			//
			$move = intval($HTTP_GET_VARS['move']);
			$cat_id = intval($HTTP_GET_VARS[POST_CAT_URL]);

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//			$sql = "UPDATE " . CATEGORIES_TABLE . "
//				SET cat_order = cat_order + $move
//				WHERE cat_id = $cat_id";
//			if( !$result = $db->sql_query($sql) )
//			{
//				message_die(GENERAL_ERROR, "Couldn't change category order", "", __LINE__, __FILE__, $sql);
//			}
//
//			renumber_order('category');
//-- add
			// update the level order
			move_tree(POST_CAT_URL, $cat_id, $move);

			// get ids
			$main	= $tree['main'][ $tree['keys'][POST_CAT_URL . $cat_id] ];
			$cat_id = $tree['id'][ $tree['keys'][$main] ];
//-- fin mod : categories hierarchy ----------------------------------------------------------------
			$show_index = TRUE;

			break;

		case 'forum_sync':
			sync('forum', intval($HTTP_GET_VARS[POST_FORUM_URL]));
			$show_index = TRUE;

			break;

		default:
			message_die(GENERAL_MESSAGE, $lang['No_mode']);
			break;
	}

	if ($show_index != TRUE)
	{
		include('./page_footer_admin.'.$phpEx);
		exit;
	}
}

//
// Start page proper
//
$template->set_filenames(array(
	"body" => "service/forum_admin_body.tpl")
);

$template->assign_vars(array(
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
	'L_ACTION' => $lang['Action'],
//-- fin mod : categories hierarchy ----------------------------------------------------------------
	'S_FORUM_ACTION' => append_sid("admin_forums.$phpEx"),
	'L_FORUM_TITLE' => $lang['Forum_admin'], 
	'L_FORUM_EXPLAIN' => $lang['Forum_admin_explain'], 
	'L_CREATE_FORUM' => $lang['Create_forum'], 
	'L_CREATE_CATEGORY' => $lang['Create_category'], 
	'L_EDIT' => $lang['Edit'], 
	'L_DELETE' => $lang['Delete'], 
	'L_MOVE_UP' => $lang['Move_up'], 
	'L_MOVE_DOWN' => $lang['Move_down'], 
	'L_RESYNC' => $lang['Resync'])
);

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
/*

$sql = "SELECT cat_id, cat_title, cat_order
	FROM " . CATEGORIES_TABLE . "
	ORDER BY cat_order";
if( !$q_categories = $db->sql_query($sql) )
{
	message_die(GENERAL_ERROR, "Could not query categories list", "", __LINE__, __FILE__, $sql);
}

if( $total_categories = $db->sql_numrows($q_categories) )
{
	$category_rows = $db->sql_fetchrowset($q_categories);

	$sql = "SELECT *
		FROM " . FORUMS_TABLE . "
		ORDER BY cat_id, forum_order";
	if(!$q_forums = $db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, "Could not query forums information", "", __LINE__, __FILE__, $sql);
	}

	if( $total_forums = $db->sql_numrows($q_forums) )
	{
		$forum_rows = $db->sql_fetchrowset($q_forums);
	}

	//
	// Okay, let's build the index
	//
	$gen_cat = array();

	for($i = 0; $i < $total_categories; $i++)
	{
		$cat_id = $category_rows[$i]['cat_id'];

		$template->assign_block_vars("catrow", array( 
			'S_ADD_FORUM_SUBMIT' => "addforum[$cat_id]", 
			'S_ADD_FORUM_NAME' => "forumname[$cat_id]", 

			'CAT_ID' => $cat_id,
			'CAT_DESC' => $category_rows[$i]['cat_title'],

			'U_CAT_EDIT' => append_sid("admin_forums.$phpEx?mode=editcat&amp;" . POST_CAT_URL . "=$cat_id"),
			'U_CAT_DELETE' => append_sid("admin_forums.$phpEx?mode=deletecat&amp;" . POST_CAT_URL . "=$cat_id"),
			'U_CAT_MOVE_UP' => append_sid("admin_forums.$phpEx?mode=cat_order&amp;move=-15&amp;" . POST_CAT_URL . "=$cat_id"),
			'U_CAT_MOVE_DOWN' => append_sid("admin_forums.$phpEx?mode=cat_order&amp;move=15&amp;" . POST_CAT_URL . "=$cat_id"),
			'U_VIEWCAT' => append_sid($phpbb_root_path."index.$phpEx?" . POST_CAT_URL . "=$cat_id"))
		);

		for($j = 0; $j < $total_forums; $j++)
		{
			$forum_id = $forum_rows[$j]['forum_id'];
			
			if ($forum_rows[$j]['cat_id'] == $cat_id)
			{

				$template->assign_block_vars("catrow.forumrow",	array(
					'FORUM_NAME' => $forum_rows[$j]['forum_name'],
					'FORUM_DESC' => $forum_rows[$j]['forum_desc'],
					'ROW_COLOR' => $row_color,
					'NUM_TOPICS' => $forum_rows[$j]['forum_topics'],
					'NUM_POSTS' => $forum_rows[$j]['forum_posts'],

					'U_VIEWFORUM' => append_sid($phpbb_root_path."viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id"),
					'U_FORUM_EDIT' => append_sid("admin_forums.$phpEx?mode=editforum&amp;" . POST_FORUM_URL . "=$forum_id"),
					'U_FORUM_DELETE' => append_sid("admin_forums.$phpEx?mode=deleteforum&amp;" . POST_FORUM_URL . "=$forum_id"),
					'U_FORUM_MOVE_UP' => append_sid("admin_forums.$phpEx?mode=forum_order&amp;move=-15&amp;" . POST_FORUM_URL . "=$forum_id"),
					'U_FORUM_MOVE_DOWN' => append_sid("admin_forums.$phpEx?mode=forum_order&amp;move=15&amp;" . POST_FORUM_URL . "=$forum_id"),
					'U_FORUM_RESYNC' => append_sid("admin_forums.$phpEx?mode=forum_sync&amp;" . POST_FORUM_URL . "=$forum_id"))
				);

			}// if ... forumid == catid
			
		} // for ... forums

	} // for ... categories

}// if ... total_categories

//-- add
*/
function display_admin_index($cur='Root', $level=0, $max_level=-1)
{
	global $template, $phpEx, $lang, $images;
	global $tree;
	global $forum_moderators;

	// display the level
	$this = isset($tree['keys'][$cur]) ? $tree['keys'][$cur] : -1;

	// root level
	if ($max_level==-1)
	{
		// get max inc level
		$keys = array();
		$max_level = get_max_depth($cur, true, -1, $keys);
		if ($cur != 'Root') $max_level++;
		$template->assign_vars(array(
			'INC_SPAN'		=> ($max_level+3),
			'INC_SPAN_ALL'	=> ($max_level+7),
			)
		);
	}

	// if forum index, omit one level
	if ($cur == 'Root') $level=-1;

	// sub-levels
	if ($this >= -1)
	{
		// cat header row
		if ($tree['type'][$this] == POST_CAT_URL)
		{
			// display a cat row
			$cat = $tree['data'][$this];
			$cat_id = $tree['id'][$this];

			// get the class colors
			$class_catLeft   = "cat";
			$class_catMiddle = "cat";
			$class_catRight  = "cat";

			$cat_title = $cat['cat_title'];
			$cat_title_trad = get_object_lang(POST_CAT_URL . $cat_id, 'name');
			if ($cat_title != $cat_title_trad) $cat_title = '(' . $cat_title . ') ' . $cat_title_trad;

			// send to template
			$template->assign_block_vars('catrow', array());
			$template->assign_block_vars('catrow.cathead', array(
				'CAT_ID'			=> $cat_id,
				'CAT_TITLE'			=> $cat_title,

				'CLASS_CATLEFT'		=> $class_catLeft,
				'CLASS_CATMIDDLE'	=> $class_catMiddle,
				'CLASS_CATRIGHT'	=> $class_catRight,
				'INC_SPAN'			=> $max_level - $level+3,
				'WIDTH'				=> ($max_level == $level) ? 'width="50%"' : '',

				'U_CAT_EDIT'		=> append_sid("admin_forums.$phpEx?mode=editcat&amp;" . POST_CAT_URL . "=$cat_id"),
				'U_CAT_DELETE'		=> append_sid("admin_forums.$phpEx?mode=deletecat&amp;" . POST_CAT_URL . "=$cat_id"),
				'U_CAT_MOVE_UP'		=> append_sid("admin_forums.$phpEx?mode=cat_order&amp;move=-15&amp;" . POST_CAT_URL . "=$cat_id"),
				'U_CAT_MOVE_DOWN'	=> append_sid("admin_forums.$phpEx?mode=cat_order&amp;move=15&amp;" . POST_CAT_URL . "=$cat_id"),
				'U_VIEWCAT'			=> append_sid("admin_forums.$phpEx?" . POST_CAT_URL . "=$cat_id"))
			);
			// add indentation to the display
			$rowspan = empty($cat['cat_desc']) ? 1 : 2;
			for ($k=1; $k <= $level; $k++) $template->assign_block_vars('catrow.cathead.inc', array('ROWSPAN' => $rowspan));

			if (!empty($cat['cat_desc']))
			{
				$cat_desc = $cat['cat_desc'];
				$cat_desc_trad = get_object_lang(POST_CAT_URL . $cat_id, 'desc');
				if ($cat_desc != $cat_desc_trad) $cat_desc = '(' . $cat_desc . ') ' . $cat_desc_trad;

				$template->assign_block_vars('catrow', array());
				$template->assign_block_vars('catrow.cattitle', array(
					'CAT_DESCRIPTION'	=> $cat_desc,
					'INC_SPAN_ALL'		=> $max_level - $level+7,
					)
				);
			}
		}

		// forum header row
		if ($tree['type'][$this] == POST_FORUM_URL)
		{
			$forum = $tree['data'][$this];
			$forum_id = $tree['id'][$this];
			$forum_link_img = '';
			if (!empty($tree['data'][$this]['forum_link']))
			{
				$forum_link_img = '<img src="../' . $images['link'] . '" border="0" />';
			}
			else
			{
				$sub = (isset($tree['sub'][POST_FORUM_URL . $forum_id]));
				$forum_link_img = '<img src="../' . (($sub) ? $images['category'] : $images['forum']) . '" border="0" />';
				if ($tree['data'][$this]['forum_status'] == FORUM_LOCKED)
				{
					$forum_link_img = '<img src="../' . (($sub) ? $images['category_locked'] : $images['forum_locked']) . '" border="0" />';
				}
			}

			if ( count($forum_moderators[$forum_id]) > 0 )
			{
				$l_moderators = ( count($forum_moderators[$forum_id]) == 1 ) ? '<br>'.$lang['Moderator'].': ' : '<br>'.$lang['Moderators'].': ';
				$moderator_list = implode(', ', $forum_moderators[$forum_id]);
			}

			$forum_name = $forum['forum_name'];
			$forum_name_trad = get_object_lang(POST_FORUM_URL . $forum_id, 'name');
			if ($forum_name != $forum_name_trad) $forum_name = '(' . $forum_name . ') ' . $forum_name_trad;

			$forum_desc = $forum['forum_desc'];
			$forum_desc_trad = get_object_lang(POST_FORUM_URL . $forum_id, 'desc');
			if ($forum_desc != $forum_desc_trad) $forum_desc = '(' . $forum_desc . ') ' . $forum_desc_trad;
			$template->assign_block_vars('catrow', array());
			$template->assign_block_vars('catrow.forumrow', array(
				'LINK_IMG'			=> $forum_link_img,
				'FORUM_NAME'		=> $forum_name,
				'FORUM_DESC'		=> $forum_desc,
				'NUM_TOPICS'		=> $forum['forum_topics'],
				'NUM_POSTS'			=> $forum['forum_posts'],

				'MODERATORS'			=> $moderator_list,
				'L_MODERATOR'			=> empty($moderator_list) ? '' : ( empty($l_moderators) ? '<br />' : '<br /><b>' . $l_moderators . '</b>&nbsp;' ),

				'INC_SPAN'			=> $max_level - $level+1,
				'WIDTH'				=> ($max_level == $level) ? 'width="50%"' : '',

				'U_VIEWFORUM'		=> append_sid("admin_forums.$phpEx?" . POST_FORUM_URL . "=$forum_id"),
				'U_FORUM_EDIT'		=> append_sid("admin_forums.$phpEx?mode=editforum&amp;" . POST_FORUM_URL . "=$forum_id"),
				'U_FORUM_DELETE'	=> append_sid("admin_forums.$phpEx?mode=deleteforum&amp;" . POST_FORUM_URL . "=$forum_id"),
				'U_FORUM_MOVE_UP'	=> append_sid("admin_forums.$phpEx?mode=forum_order&amp;move=-15&amp;" . POST_FORUM_URL . "=$forum_id"),
				'U_FORUM_MOVE_DOWN'	=> append_sid("admin_forums.$phpEx?mode=forum_order&amp;move=15&amp;" . POST_FORUM_URL . "=$forum_id"),
				'U_FORUM_RESYNC'	=> append_sid("admin_forums.$phpEx?mode=forum_sync&amp;" . POST_FORUM_URL . "=$forum_id"))
			);
			// add indentation to the display
			for ($k=1; $k <= $level; $k++) $template->assign_block_vars('catrow.forumrow.inc', array());
		}

		// display the sub-level
		for ($i=0; $i < count($tree['sub'][$cur]); $i++)
		{
			display_admin_index($tree['sub'][$cur][$i], $level+1, $max_level);
		}

		// forum footer

		// cat footer
		if ($tree['type'][$this] == POST_CAT_URL)
		{
			// add the footer
			$template->assign_block_vars('catrow', array());
			$template->assign_block_vars('catrow.catfoot', array(
				'S_ADD_FORUM_SUBMIT'	=> "addforum[$cat_id]",
				'S_ADD_CAT_SUBMIT'		=> "addcategory[$cat_id]",
				'S_ADD_NAME'			=> "name[$cat_id]",
				'INC_SPAN'				=> $max_level - $level+3,
				'INC_SPAN_ALL'			=> $max_level - $level+7,
				)
			);
			// add indentation to the display
			for ($k=1; $k <= $level; $k++) $template->assign_block_vars('catrow.catfoot.inc', array());
		}

		// board index footer
		if ($cur == 'Root')
		{
			$template->assign_block_vars('switch_board_footer', array());
			if (defined('SUB_FORUM_ATTACH'))
			{
				$template->assign_block_vars('switch_board_footer.sub_forum_attach', array());
			}
		}
	}
}

// fix the cat_main value
admin_check_cat();

// read the cats/forums tree
get_user_tree($userdata);

// get the values of level selected
$main = 'Root';
if (!empty($cat_id))
{
	$main = POST_CAT_URL . $cat_id;
}
else if (!empty($forum_id))
{
	$main = $tree['main'][$forum_id];
	$main = $tree['main'][ $tree['keys'][POST_FORUM_URL . $forum_id] ];
}
if (!isset($tree['keys'][$main])) $main = 'Root';

// get the nav cat sentence
$nav_cat_desc = make_cat_nav_tree($main, 'admin_forums');
if ($nav_cat_desc != '') $nav_cat_desc = $nav_separator . $nav_cat_desc;
$template->assign_vars(array(
	'SPACER'			=> './../' . $images['spacer'],
	'NAV_CAT_DESC'		=> $nav_cat_desc,
	'L_INDEX'			=> sprintf($lang['Forum_Index'], $board_config['sitename']),
	)
);

// display the tree
display_admin_index($main);
//-- fin mod : categories hierarchy ----------------------------------------------------------------

$template->pparse("body");

include('./page_footer_admin.'.$phpEx);

?>
