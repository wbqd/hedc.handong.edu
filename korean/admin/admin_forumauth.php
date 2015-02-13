<?php
/***************************************************************************
 *                            admin_forumauth.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: admin_forumauth.php,v 1.6 2003/08/30 15:05:44 acydburn Exp $
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

define('IN_PHPBB', 1);

if( !empty($setmodules) )
{
	$filename = basename(__FILE__);
	$module['Forums']['Permissions']   = $filename;

	return;
}

//
// Load default header
//
$no_page_header = TRUE;
$phpbb_root_path = './../';
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);

//-- mod : calendar --------------------------------------------------------------------------------
// here we added for each row a new column for calendar auth similar to the sticky value
// and add Calendar in the comment header
//-- modify

//
// Start program - define vars
//
//                View      Read      Post      Reply     Edit     Delete   Calendar    Sticky   Announce    Vote      Poll
$simple_auth_ary = array(
	0  => array(AUTH_ALL, AUTH_ALL, AUTH_ALL, AUTH_ALL, AUTH_REG, AUTH_REG, AUTH_ADMIN, AUTH_MOD, AUTH_MOD, AUTH_REG, AUTH_REG),
	1  => array(AUTH_ALL, AUTH_ALL, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_ADMIN, AUTH_MOD, AUTH_MOD, AUTH_REG, AUTH_REG),
	2  => array(AUTH_ALL, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_REG, AUTH_ADMIN, AUTH_MOD, AUTH_MOD, AUTH_REG, AUTH_REG),
	3  => array(AUTH_ALL, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ADMIN, AUTH_ACL, AUTH_MOD, AUTH_ACL, AUTH_ACL),
	4  => array(AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ACL, AUTH_ADMIN, AUTH_ACL, AUTH_MOD, AUTH_ACL, AUTH_ACL),
	5  => array(AUTH_ALL, AUTH_ALL, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_ADMIN, AUTH_MOD, AUTH_MOD, AUTH_REG, AUTH_MOD),
	6  => array(AUTH_ALL, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_ADMIN, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD),
	7  => array(AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_ADMIN, AUTH_MOD, AUTH_MOD, AUTH_MOD, AUTH_MOD),
);

//-- fin mod : calendar ----------------------------------------------------------------------------

$simple_auth_types = array($lang['Public'], $lang['Registered'], $lang['Registered'] . ' [' . $lang['Hidden'] . ']', $lang['Private'], $lang['Private'] . ' [' . $lang['Hidden'] . ']', $lang['Admin_only'], $lang['Moderators'], $lang['Moderators'] . ' [' . $lang['Hidden'] . ']');

//-- mod : calendar --------------------------------------------------------------------------------
// here we added
//	, 'auth_cal'
//-- modify

$forum_auth_fields = array('auth_view', 'auth_read', 'auth_post', 'auth_reply', 'auth_edit', 'auth_delete', 'auth_cal', 'auth_sticky', 'auth_announce', 'auth_vote', 'auth_pollcreate');

//-- fin mod : calendar ----------------------------------------------------------------------------

$field_names = array(
	'auth_view' => $lang['View'],
	'auth_read' => $lang['Read'],
	'auth_post' => $lang['Post'],
	'auth_reply' => $lang['Reply'],
	'auth_edit' => $lang['Edit'],
	'auth_delete' => $lang['Delete'],
//-- mod : calendar --------------------------------------------------------------------------------
//-- add
	'auth_cal' => $lang['Calendar'],
//-- fin mod : calendar ----------------------------------------------------------------------------

	'auth_sticky' => $lang['Sticky'],
	'auth_announce' => $lang['Announce'], 
	'auth_vote' => $lang['Vote'], 
	'auth_pollcreate' => $lang['Pollcreate']);

$forum_auth_levels = array('ALL', 'REG', 'PRIVATE', 'MOD', 'ADMIN');
$forum_auth_const = array(AUTH_ALL, AUTH_REG, AUTH_ACL, AUTH_MOD, AUTH_ADMIN);
attach_setup_forum_auth($simple_auth_ary, $forum_auth_fields, $field_names);

if(isset($HTTP_GET_VARS[POST_FORUM_URL]) || isset($HTTP_POST_VARS[POST_FORUM_URL]))
{
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//	$forum_id = (isset($HTTP_POST_VARS[POST_FORUM_URL])) ? intval($HTTP_POST_VARS[POST_FORUM_URL]) : intval($HTTP_GET_VARS[POST_FORUM_URL]);
//	$forum_sql = "AND forum_id = $forum_id";
//-- add
	$fid = (isset($HTTP_POST_VARS[POST_FORUM_URL])) ? $HTTP_POST_VARS[POST_FORUM_URL] : $HTTP_GET_VARS[POST_FORUM_URL];
	$f_type = substr($fid, 0, 1);
	if ($f_type == POST_FORUM_URL)
	{
		$forum_id = intval(substr($fid, 1));
		$forum_sql = " WHERE forum_id = $forum_id";
	}
	else
	{
		unset($forum_id);
		$forum_sql = '';
	}
//-- fin mod : categories hierarchy ----------------------------------------------------------------
}
else
{
	unset($forum_id);
	$forum_sql = '';
}

if( isset($HTTP_GET_VARS['adv']) )
{
	$adv = intval($HTTP_GET_VARS['adv']);
}
else
{
	unset($adv);
}



if( isset($HTTP_GET_VARS['select_cat']) ||  isset($HTTP_POST_VARS['select_cat']))
{
	$select_cat = (isset($HTTP_GET_VARS['select_cat']))?intval($HTTP_GET_VARS['select_cat']):intval($HTTP_POST_VARS['select_cat']);

	if($select_cat == "") unset($select_cat);
}

//
// Start program proper
//
if( isset($HTTP_POST_VARS['submit']) )
{
	$sql = '';

	if(!empty($forum_id))
	{
		if(isset($HTTP_POST_VARS['simpleauth']))
		{
			$simple_ary = $simple_auth_ary[$HTTP_POST_VARS['simpleauth']];

			for($i = 0; $i < count($simple_ary); $i++)
			{
				$sql .= ( ( $sql != '' ) ? ', ' : '' ) . $forum_auth_fields[$i] . ' = ' . $simple_ary[$i];
			}

			$sql = "UPDATE " . FORUMS_TABLE . " SET $sql WHERE forum_id = $forum_id";
		}
		else
		{
			for($i = 0; $i < count($forum_auth_fields); $i++)
			{
				$value = $HTTP_POST_VARS[$forum_auth_fields[$i]];

				if ( $forum_auth_fields[$i] == 'auth_vote' )
				{
					if ( $HTTP_POST_VARS['auth_vote'] == AUTH_ALL )
					{
						$value = AUTH_REG;
					}
				}

				$sql .= ( ( $sql != '' ) ? ', ' : '' ) .$forum_auth_fields[$i] . ' = ' . $value;
			}

			$sql = "UPDATE " . FORUMS_TABLE . " SET $sql WHERE forum_id = $forum_id";
		}

		if ( $sql != '' )
		{
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not update auth table', '', __LINE__, __FILE__, $sql);
			}
		}

		// Log actions MOD Start
		log_action('update[auth]', $forum_id, $userdata['user_id'], $userdata['username']);
		// Log actions MOD End		

		$forum_sql = '';
		$adv = 0;
	}


//select_cat" value="'. $select_cat

	if(isset($select_cat))
	{
		$base_param = "?select_cat=$select_cat";
	}
	else
	{
		$base_param = "?f=$fid&adv=1";
	}

	$template->assign_vars(array(
		'META' => '')
	);
	$message = $lang['Forum_auth_updated'] ;
	message_die(GENERAL_MESSAGE, $message);

} // End of submit

//
// Get required information, either all forums if
// no id was specified or just the requsted if it
// was
//
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
// $sql = "SELECT f.*
//	FROM " . FORUMS_TABLE . " f, " . CATEGORIES_TABLE . " c
//	WHERE c.cat_id = f.cat_id
//	$forum_sql
//	ORDER BY c.cat_order ASC, f.forum_order ASC";
// if ( !($result = $db->sql_query($sql)) )
// {
//	message_die(GENERAL_ERROR, "Couldn't obtain forum list", "", __LINE__, __FILE__, $sql);
// }
//
// $forum_rows = $db->sql_fetchrowset($result);
// $db->sql_freeresult($result);
//-- fin mod : categories hierarchy ----------------------------------------------------------------

if( empty($forum_id) )
{
	//
	// Output the selection table if no forum id was
	// specified
	//
	$template->set_filenames(array(
		'body' => 'admin/auth_select_body.tpl')
	);

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//	$select_list = '<select name="' . POST_FORUM_URL . '">';
//	for($i = 0; $i < count($forum_rows); $i++)
//	{
//		$select_list .= '<option value="' . $forum_rows[$i]['forum_id'] . '">' . $forum_rows[$i]['forum_name'] . '</option>';
//	}
//	$select_list .= '</select>';
//-- add
	$select_list = selectbox(POST_FORUM_URL, false, '', $select_cat);
//-- fin mod : categories hierarchy ----------------------------------------------------------------

	$s_hidden_fields = '<input type="hidden" name="select_cat" value="'. $select_cat. '">';

	$template->assign_vars(array(
		'L_AUTH_TITLE' => $lang['Auth_Control_Forum'],
		'L_AUTH_EXPLAIN' => $lang['Forum_auth_explain'],
		'L_AUTH_SELECT' => $lang['Select_a_Forum'],
		'L_LOOK_UP' => $lang['Look_up_Forum'],

		'S_AUTH_ACTION' => append_sid("admin_forumauth.$phpEx?adv=1"),
		'S_AUTH_SELECT' => $select_list,
		'S_HIDDEN_FIELDS' => $s_hidden_fields)
	);

}
else
{
	//
	// Output the authorisation details if an id was
	// specified
	//
	$template->set_filenames(array(
		'body' => 'admin/auth_forum_body.tpl')
	);

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//	$forum_name = $forum_rows[0]['forum_name'];
//-- add
	$forum_rows[0] = $tree['data'][$tree['keys'][POST_FORUM_URL . $forum_id]];
	$forum_name_trad = get_object_lang(POST_FORUM_URL . $forum_id, 'name');
	$forum_name = $forum_rows[0]['forum_name'];
	if ($forum_name != $forum_name_trad)
	{
		$forum_name = '(' . $forum_name . ') ' . $forum_name_trad;
	}
//-- fin mod : categories hierarchy ----------------------------------------------------------------

	@reset($simple_auth_ary);
	while( list($key, $auth_levels) = each($simple_auth_ary))
	{
		$matched = 1;
		for($k = 0; $k < count($auth_levels); $k++)
		{
			$matched_type = $key;

			if ( $forum_rows[0][$forum_auth_fields[$k]] != $auth_levels[$k] )
			{
				$matched = 0;
			}
		}

		if ( $matched )
		{
			break;
		}
	}

	//
	// If we didn't get a match above then we
	// automatically switch into 'advanced' mode
	//
	if ( !isset($adv) && !$matched )
	{
		$adv = 1;
	}

	$s_column_span == 0;

	if ( empty($adv) )
	{
		$simple_auth = '<select name="simpleauth">';

		for($j = 0; $j < count($simple_auth_types); $j++)
		{
			$selected = ( $matched_type == $j ) ? ' selected="selected"' : '';
			$simple_auth .= '<option value="' . $j . '"' . $selected . '>' . $simple_auth_types[$j] . '</option>';
		}

		$simple_auth .= '</select>';

		$template->assign_block_vars('forum_auth_titles', array(
			'CELL_TITLE' => $lang['Simple_mode'])
		);
		$template->assign_block_vars('forum_auth_data', array(
			'S_AUTH_LEVELS_SELECT' => $simple_auth)
		);

		$s_column_span++;
	}
	else
	{
		//
		// Output values of individual
		// fields
		//
		for($j = 0; $j < count($forum_auth_fields); $j++)
		{
			$custom_auth[$j] = '&nbsp;<select name="' . $forum_auth_fields[$j] . '">';

			for($k = 0; $k < count($forum_auth_levels); $k++)
			{
				$selected = ( $forum_rows[0][$forum_auth_fields[$j]] == $forum_auth_const[$k] ) ? ' selected="selected"' : '';
				$custom_auth[$j] .= '<option value="' . $forum_auth_const[$k] . '"' . $selected . '>' . $lang['Forum_' . $forum_auth_levels[$k]] . '</option>';
			}
			$custom_auth[$j] .= '</select>&nbsp;';

			$cell_title = $field_names[$forum_auth_fields[$j]];

			$template->assign_block_vars('forum_auth_titles', array(
				'CELL_TITLE' => $cell_title)
			);
			$template->assign_block_vars('forum_auth_data', array(
				'S_AUTH_LEVELS_SELECT' => $custom_auth[$j])
			);

			$s_column_span++;
		}
	}

	$adv_mode = ( empty($adv) ) ? '1' : '0';
//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//	$switch_mode = append_sid("admin_forumauth.$phpEx?" . POST_FORUM_URL . "=" . $forum_id . "&adv=". $adv_mode);
//-- add
	$switch_mode = append_sid("admin_forumauth.$phpEx?" . POST_FORUM_URL . "=f" . $forum_id . "&adv=". $adv_mode . "&select_cat=". $select_cat);
//-- fin mod : categories hierarchy ----------------------------------------------------------------
	$switch_mode_text = ( empty($adv) ) ? $lang['Advanced_mode'] : $lang['Simple_mode'];
	$u_switch_mode = '<a href="' . $switch_mode . '">' . $switch_mode_text . '</a>';

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- delete
//	$s_hidden_fields = '<input type="hidden" name="' . POST_FORUM_URL . '" value="' . $forum_id . '">';
//-- add
	$s_hidden_fields = '<input type="hidden" name="' . POST_FORUM_URL . '" value="f' . $forum_id . '">';
	$s_hidden_fields .= '<input type="hidden" name="select_cat" value="'. $select_cat. '">';
//-- fin mod : categories hierarchy ----------------------------------------------------------------

	$template->assign_vars(array(
		'FORUM_NAME' => $forum_name,

		'L_FORUM' => $lang['Forum'], 
		'L_AUTH_TITLE' => $lang['Auth_Control_Forum'],
		'L_AUTH_EXPLAIN' => $lang['Forum_auth_explain'],
		'L_SUBMIT' => $lang['Submit'],
		'L_RESET' => $lang['Reset'],

		'ADMIN_LANG_PUBLIC' => $lang['Public'],
		'ADMIN_LANG_PRIVATE' => $lang['Private'],
		'ADMIN_LANG_REGISTERED' => $lang['Registered'],
		'ADMIN_LANG_MODERATORS' => $lang['Moderators'],
		'ADMIN_LANG_HIDDEN' => $lang['Hidden'],
		'ADMIN_LANG_ADMIN_ONLY' => $lang['Admin_only'],

		'ADMIN_LANG_FORUM_ALL' => $lang['Forum_ALL'],
		'ADMIN_LANG_FORUM_REG' => $lang['Forum_REG'],
		'ADMIN_LANG_FORUM_PRIVATE' => $lang['Forum_PRIVATE'],
		'ADMIN_LANG_FORUM_MOD' => $lang['Forum_MOD'],
		'ADMIN_LANG_FORUM_ADMIN' => $lang['Forum_ADMIN'],

		'ADMIN_LANG_VIEW' => $lang['View'],
		'ADMIN_LANG_READ' => $lang['Read'],
		'ADMIN_LANG_POST' => $lang['Post'],
		'ADMIN_LANG_REPLY' => $lang['Reply'],
		'ADMIN_LANG_EDIT' => $lang['Edit'],
		'ADMIN_LANG_DELETE' => $lang['Delete'],
		'ADMIN_LANG_CALENDAR' => $lang['Calendar'],			
		'ADMIN_LANG_STICKY' => $lang['Sticky'],
		'ADMIN_LANG_ANNOUNCE' => $lang['Announce'],
		'ADMIN_LANG_VOTE' => $lang['Vote'],
		'ADMIN_LANG_POLLCREATE' => $lang['Pollcreate'],
		'ADMIN_LANG_AUTH_ATTACH' => $lang['Auth_attach'],
		'ADMIN_LANG_AUTH_DOWNLOAD' => $lang['Auth_download'],


		'ADMIN_LANG_SIMPLE_MODE' => $lang['Simple_mode'],			


		'U_SWITCH_MODE' => $u_switch_mode,

		'S_FORUMAUTH_ACTION' => append_sid("admin_forumauth.$phpEx"),
		'S_COLUMN_SPAN' => $s_column_span,
		'S_HIDDEN_FIELDS' => $s_hidden_fields)
	);

}

include('./page_header_admin.'.$phpEx);

$template->pparse('body');

include('./page_footer_admin.'.$phpEx);

?>