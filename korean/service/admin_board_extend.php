<?php

/***************************************************************************
 *                            admin_board_extend.php
 *                            ----------------------
 *	begin			: 10/08/2003
 *	copyright		: Ptirhiik
 *	email			: admin@rpgnet-fr.com
 *	version			: 1.0.1 - 19/08/2003
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
	$file = basename(__FILE__);
	$module['General']['Configuration_extend'] = $file;
	return;
}

//
// Let's set the root dir for phpBB
//
$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);

//
// get all the mods settings
//
$mods = array();
$dir = @opendir($phpbb_root_path . 'includes/mods_settings');
while( $file = @readdir($dir) )
{
	if( preg_match("/^mod_.*?\." . $phpEx . "$/", $file) )
	{
		include($phpbb_root_path . 'includes/mods_settings/' . $file);
	}
}
@closedir($dir);

// mod_id
$mod_id = 0;
if ( isset($HTTP_GET_VARS['mod']) || isset($HTTP_POST_VARS['mod_id']) )
{
	$mod_id = isset($HTTP_POST_VARS['mod_id']) ? intval($HTTP_POST_VARS['mod_id']) : intval($HTTP_GET_VARS['mod']);
}

// build a key array
$mod_keys = array();
@reset($mods);
while ( list($name, $data) = @each($mods) )
{
	$mod_keys[] = $name;
}

// fix mod id
if ($mod_id > count($mod_keys))
{
	$mod_id = 0;
}

// mod name
$mod_name = $mod_keys[$mod_id];

// buttons
$submit = isset($HTTP_POST_VARS['submit']);

// get the real value of board_config
$sql = "SELECT * FROM " . CONFIG_TABLE;
if ( !$result = $db->sql_query($sql) ) message_die(CRITICAL_ERROR, 'Could not query config information', '', __LINE__, __FILE__, $sql);
$config = array();
while ($row = $db->sql_fetchrow($result))
{
	$config[ $row['config_name'] ] = $row['config_value'];
}

// validate
if ($submit)
{
	// init for error
	$error = false;
	$error_msg = '';

	// format and verify data
	@reset($mods[$mod_name]['fields']);
	while ( list($name, $field) = @each($mods[$mod_name]['fields']) )
	{
		if (isset($HTTP_POST_VARS[$name]))
		{
			switch ($field['type'])
			{
				case 'LIST_RADIO':
				case 'LIST_DROP':
					$$name = $HTTP_POST_VARS[$name];
					if (!in_array($$name, $mods[$mod_name]['fields'][$name]['values']))
					{
						$error = true;
						$lang_key = $mods[$mod_name]['fields'][$name]['lang_key'];
						if (isset($lang[$lang_key])) $lang_key = $lang[$lang_key];
						$error_msg = (empty($error_msg) ? '' : '<br />') . $lang['Error'] . ':&nbsp;' . $lang_key;
					}
					break;
				case 'TINYINT':
				case 'SMALLINT':
				case 'MEDIUMINT':
				case 'INT':
					$$name = intval($HTTP_POST_VARS[$name]);
					break;
				case 'VARCHAR':
				case 'TEXT':
					$$name = trim(str_replace("\'", "''", htmlspecialchars($HTTP_POST_VARS[$name])));
					break;
				case 'HTMLVARCHAR':
				case 'HTMLTEXT':
					$$name = trim(str_replace("\'", "''", $HTTP_POST_VARS[$name]));
					break;
				default:
					message_die(GENERAL_ERROR, 'Unknown type of config data : ' . $name, '', __LINE__, __FILE__, '');
					break;
			}
			if ($error)
			{
				$message = $error_msg . '<br /><br />' . sprintf($lang['Click_return_config'], '<a href="' . append_sid("./admin_board_extend.$phpEx?mod=$mod_id") . '">', '</a>') . '<br /><br />' . sprintf($lang['Click_return_admin_index'], '<a href="' . append_sid("./index.$phpEx?pane=right") . '">', '</a>');
				message_die(GENERAL_MESSAGE, $message);
			}
		}
	}

	// save data
	@reset($mods[$mod_name]['fields']);
	while ( list($name, $field) = @each($mods[$mod_name]['fields']) )
	{
		if (isset($$name))
		{
			// update
			$sql = "UPDATE " . CONFIG_TABLE . " 
					SET config_value = '" . $$name . "'
					WHERE config_name = '" . $name . "'";
			if( !$db->sql_query($sql) ) message_die(GENERAL_ERROR, 'Failed to update general configuration for ' . $name, '', __LINE__, __FILE__, $sql);
		}
		if ( isset($HTTP_POST_VARS[$name . '_over']) && !empty($field['user']) && isset($userdata[ $field['user'] ]) )
		{
			// update
			$sql = "UPDATE " . CONFIG_TABLE . " 
					SET config_value = '" . intval($HTTP_POST_VARS[$name . '_over']) . "'
					WHERE config_name = '$name" . "_over'";
			if( !$db->sql_query($sql) ) message_die(GENERAL_ERROR, 'Failed to update general configuration for ' . $name, '', __LINE__, __FILE__, $sql);
		}
	}

	// send an update message
	$message = $lang['Config_updated'] . '<br /><br />' . sprintf($lang['Click_return_config'], '<a href="' . append_sid("./admin_board_extend.$phpEx?mod=$mod_id") . '">', '</a>') . '<br /><br />' . sprintf($lang['Click_return_admin_index'], '<a href="' . append_sid("./index.$phpEx?pane=right") . '">', '</a>');
	message_die(GENERAL_MESSAGE, $message);
}


// template
$template->set_filenames(array(
	'body' => 'service/board_config_extend_body.tpl')
);

// header
$template->assign_vars(array(
	'L_TITLE'			=> $lang['Configuration_extend'],
	'L_TITLE_EXPLAIN'	=> $lang['Config_explain'],
	'L_MOD_NAME'		=> isset($lang[$mod_name]) ? $lang[$mod_name] : $mod_name,
	'L_SUBMIT'			=> $lang['Submit'],
	'L_RESET'			=> $lang['Reset'],
	)
);

// send menu
for ($i=0; $i < count($mod_keys); $i++)
{
	$template->assign_block_vars('mod', array(
		'CLASS'	=> ($mod_id == $i) ? 'row1' : 'row2',
		'U_MOD'	=> append_sid("./admin_board_extend.$phpEx?mod=$i"),
		'L_MOD'	=> isset($lang[ $mod_keys[$i] ]) ? $lang[ $mod_keys[$i] ] : $mod_keys[$i],
		)
	);
}

// send items
@reset($mods[$mod_name]['fields']);
while ( list($name, $field) = @each($mods[$mod_name]['fields']) )
{
	// get the field input statement
	$input = '';
	switch ($field['type'])
	{
		case 'LIST_RADIO':
			@reset($field['values']);
			while ( list($key, $val) = @each($field['values']) )
			{
				$selected = ($config[$name] == $val) ? ' checked="checked"' : '';
				$l_key = isset($lang[$key]) ? $lang[$key] : $key;
				$input .= '<input type="radio" name="' . $name . '" value="' . $val . '"' . $selected . ' />' . $l_key . '&nbsp;&nbsp;';
			}
			break;
		case 'LIST_DROP':
			@reset($field['values']);
			while ( list($key, $val) = @each($field['values']) )
			{
				$selected = ($config[$name] == $val) ? ' selected="selected"' : '';
				$l_key = isset($lang[$key]) ? $lang[$key] : $key;
				$input .= '<option value="' . $val . '"' . $selected . '>' . $l_key . '</option>';
			}
			$input = '<select name="' . $name . '">' . $input . '</select>';
			break;
		case 'TINYINT':
			$input = '<input type="text" name="' . $name . '" maxlength="3" size="2" class="post" value="' . $config[$name] . '" />';
			break;
		case 'SMALLINT':
			$input = '<input type="text" name="' . $name . '" maxlength="5" size="5" class="post" value="' . $config[$name] . '" />';
			break;
		case 'MEDIUMINT':
			$input = '<input type="text" name="' . $name . '" maxlength="8" size="8" class="post" value="' . $config[$name] . '" />';
			break;
		case 'INT':
			$input = '<input type="text" name="' . $name . '" maxlength="13" size="11" class="post" value="' . $config[$name] . '" />';
			break;
		case 'VARCHAR':
		case 'HTMLVARCHAR':
			$input = '<input type="text" name="' . $name . '" maxlength="255" size="45" class="post" value="' . $config[$name] . '" />';
			break;
		case 'TEXT':
		case 'HTMLTEXT':
			$input = '<textarea rows="5" cols="45" wrap="virtual" name="' . $name . '" class="post">' . $config[$name] . '</textarea>';
			break;
		default:
			$input = '';
			break;
	}

	// overwrite user choice
	$override = '';
	if ( !empty($input) && !empty($field['user']) && isset($userdata[ $field['user'] ]) )
	{
		$override = '';
		@reset($list_yes_no);
		while ( list($key, $val) = @each($list_yes_no) )
		{
			$selected = ($config[$name . '_over'] == $val) ? ' checked="checked"' : '';
			$l_key = isset($lang[$key]) ? $lang[$key] : $key;
			$override .= '<input type="radio" name="' . $name . '_over' . '" value="' . $val . '"' . $selected . ' />' . $l_key . '&nbsp;&nbsp;';
		}
		$override = '<hr />' . $lang['Override_user_choices'] . ':&nbsp;'. $override;
	}

	// dump to template
	$template->assign_block_vars('field', array(
		'L_NAME'	=> isset($lang[ $field['lang_key'] ]) ? $lang[ $field['lang_key'] ] : $field['lang_key'],
		'L_EXPLAIN'	=> isset($lang[ $field['explain'] ]) ? '<br />' . $lang[ $field['explain'] ] : '',
		'INPUT'		=> $input,
		'OVERRIDE'	=> $override,
		)
	);
}

// system
$s_hidden_fields = '<input type="hidden" name="mod_id" value="' . $mod_id . '" />';
$template->assign_vars(array(
	'S_ACTION'			=> append_sid("./admin_board_extend.$phpEx"),
	'S_HIDDEN_FIELDS'	=> $s_hidden_fields,
	)
);

// footer
$template->pparse("body");
include('./page_footer_admin.'.$phpEx);

?>