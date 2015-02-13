<?php

/***************************************************************************
 *                            functions_mods_settings.php
 *                            ---------------------------
 *	begin			: 10/08/2003
 *	copyright		: Ptirhiik
 *	email			: admin@rpgnet-fr.com
 *	version			: 1.0.2 - 19/08/2003
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

// some standard lists
$list_yes_no = array('Yes' => 1, 'No' => 0);

//---------------------------------------------------------------
//
//	init_board_config_key() : add a key and its value to the board config table
//
//---------------------------------------------------------------
function init_board_config_key($key, $value, $force=false)
{
	global $db, $board_config;

	if (!isset($board_config[$key]))
	{
		$board_config[$key] = $value;
		$sql = "INSERT INTO " . CONFIG_TABLE . " (config_name,config_value) VALUES('$key','$value')";
		if ( !$db->sql_query($sql) ) message_die(GENERAL_ERROR, 'Could not add key ' . $key . ' in config table', '', __LINE__, __FILE__, $sql);
	}
	else if ($force)
	{
		$board_config[$key] = $value;
		$sql = "UPDATE " . CONFIG_TABLE . " SET config_value='$value' WHERE config_name='$key'";
		if ( !$db->sql_query($sql) ) message_die(GENERAL_ERROR, 'Could not add key ' . $key . ' in config table', '', __LINE__, __FILE__, $sql);
	}
}

//---------------------------------------------------------------
//
//	user_board_config_key() : get the user choice if defined
//
//---------------------------------------------------------------
function user_board_config_key($key, $user_field='', $over_field='')
{
	global $board_config, $userdata;

	// get the user fields name if not given
	if (empty($user_field))
	{
		$user_field = 'user_' . $key;
	}

	// get the overwrite allowed switch name if not given
	if (empty($over_field))
	{
		$over_field = $key . '_over';
	}

	// does the key exists ?
	if (!isset($board_config[$key])) return;

	// does the user field exists ?
	if (!isset($userdata[$user_field])) return;

	// does the overwrite switch exists ?
	if (!isset($board_config[$over_field]))
	{
		$board_config[$over_field] = 0; // no overwrite
	}

	if (!intval($board_config[$over_field]))
	{
		$board_config[$key] = $userdata[$user_field];
	}
}

//---------------------------------------------------------------
//
//	init_board_config() : get the user choice if defined
//
//---------------------------------------------------------------
function init_board_config($mod_name, $config_fields)
{
	global $mods;

	@reset($config_fields);
	while ( list($config_key, $config_data) = each($config_fields) )
	{
		// create the key value
		init_board_config_key($config_key, ( !empty($config_data['values']) ? $config_data['values'][ $config_data['default'] ] : $config_data['default']) );
		if (!empty($config_data['user']))
		{
			// create the "overwrite user choice" value
			init_board_config_key($config_key . '_over', 0);

			// get user choice value
			user_board_config_key($config_key, $config_data['user']);
		}

		// deliever it for input only if not hidden
		if (!$config_data['hide'])
		{
			$mods[$mod_name]['fields'][$config_key] = $config_data;
		}
	}
}

?>