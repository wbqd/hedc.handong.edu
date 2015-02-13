<?php
/***************************************************************************
 *				functions_log.php
 *		               -------------------
 *     begin                : Jan 24 2003
 *     copyright            : Morpheus
 *     email                : morpheus@2037.biz
 *
 *     $Id: function_log.php,v 1.85.2.9 2003/01/24 18:31:54 Moprheus Exp $
 *
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/


if (!defined('IN_PHPBB'))
{
	die('Hacking attempt');
}

function log_action($action, $topic_id, $user_id, $username)
{
	global $db;

	$sql = "SELECT session_ip
		FROM " . SESSIONS_TABLE . "
		WHERE session_user_id = '$user_id' ";

	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not select session_ip', '', __LINE__, __FILE__, $sql);
	}
	$row = $db->sql_fetchrow($result);
	$user_ip = $row['session_ip'];

	$username = addslashes($username);

	$time = time();

	$sql = "INSERT INTO " . LOGS_TABLE . " (mode, topic_id, user_id, username, user_ip, time)
		VALUES ('$action', '$topic_id', '$user_id', '$username', '$user_ip', '$time')";

	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not insert data into logs table', '', __LINE__, __FILE__, $sql);
	}
}
?>