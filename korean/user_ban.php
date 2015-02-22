<?php


/*
 * 이 파일은 특정 유저를 특정 기간 동안 헬프데스크를 신청하지 못하게 막는 파일입니다.
 */
define('IN_PHPBB', true);
$phpbb_root_path = './';
include ($phpbb_root_path . 'extension.inc');
include ($phpbb_root_path . 'common.' . $phpEx);

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);
//
// End session management
//

$page_title = 'User Ban';

include ($phpbb_root_path . 'includes/page_header.' . $phpEx);

$template->set_filenames(array (
	'body' => 'user_ban_body.tpl'
));

if (!empty ($_POST['ban_username']) && !empty ($_POST['ban_until']) && !empty ($_POST['ban_section'])) {
	$ban_username = $_POST['ban_username'];
	$ban_until = $_POST['ban_until'];
	$ban_section = $_POST['ban_section'];

	$sql = "SELECT	user_id
			FROM	" . USERS_TABLE . "
			WHERE	username = '$ban_username'";

	if (!($result = $db->sql_query($sql))) {
		message_die(GENERAL_ERROR, 'Unable to retrieve users');
	}

	$row = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);

	if (!is_null($row['user_id'])) {
		$ban_user_id = $row['user_id'];
		$sql = "INSERT INTO " . USER_BAN_TABLE . "(user_id, ban_until, ban_section)
				VALUES ('$ban_user_id', '$ban_until', '$ban_section')";

		if (!($db->sql_query($sql))) {
			message_die(GENERAL_ERROR, 'Unable to retrieve users');
		}

		$sql = "SELECT	u.username
				,		u.user_realname
				,		b.ban_until
				,		b.ban_id
				,		b.ban_section
				FROM	" . USERS_TABLE . " u
				JOIN	" . USER_BAN_TABLE . " b
				ON		u.user_id = b.user_id
				ORDER BY b.ban_id";

		if (!($result = $db->sql_query($sql))) {
			message_die(GENERAL_ERROR, 'Unable to retrieve users');
		}
		$ban_index = 1;
		while ($row = $db->sql_fetchrow($result)) {
			$template->assign_block_vars('ban_list_row', array (
				'BAN_INDEX' => $ban_index,
				'BAN_ID' => $row['ban_id'],
				'USERNAME' => $row['username'],
				'USER_REALNAME' => $row['user_realname'],
				'BAN_UNTIL' => $row['ban_until'],
				'BAN_SECTION' => $row['ban_section']
			));
			$ban_index++;
		}
		$db->sql_freeresult($result);
	}
} else
	if (!empty ($_POST['ban_id'])) {
		$post_ban_id = $_POST['ban_id'];
		$sql = "DELETE FROM	" . USER_BAN_TABLE . "
				WHERE ban_id = " . $post_ban_id;

		if (!$db->sql_query($sql)) {
			message_die(GENERAL_ERROR, 'Unable to retrieve users');
		}

		$sql = "SELECT	u.username
				,		u.user_realname
				,		b.ban_until
				,		b.ban_id
				,		b.ban_section
				FROM	" . USERS_TABLE . " u
				JOIN	" . USER_BAN_TABLE . " b
				ON		u.user_id = b.user_id
				ORDER BY b.ban_id";

		if (!($result = $db->sql_query($sql))) {
			message_die(GENERAL_ERROR, 'Unable to retrieve users');
		}
		$ban_index = 1;
		while ($row = $db->sql_fetchrow($result)) {
			$template->assign_block_vars('ban_list_row', array (
				'BAN_INDEX' => $ban_index,
				'BAN_ID' => $row['ban_id'],
				'USERNAME' => $row['username'],
				'USER_REALNAME' => $row['user_realname'],
				'BAN_UNTIL' => $row['ban_until'],
				'BAN_SECTION' => $row['ban_section']
			));
			$ban_index++;
		}
		$db->sql_freeresult($result);
	} else {
		$sql = "SELECT	u.username
				,		u.user_realname
				,		b.ban_until
				,		b.ban_id
				,		b.ban_section
				FROM	" . USERS_TABLE . " u
				JOIN	" . USER_BAN_TABLE . " b
				ON		u.user_id = b.user_id
				ORDER BY b.ban_id";

		if (!($result = $db->sql_query($sql))) {
			message_die(GENERAL_ERROR, 'Unable to retrieve users');
		}
		$ban_index = 1;
		while ($row = $db->sql_fetchrow($result)) {
			$template->assign_block_vars('ban_list_row', array (
				'BAN_INDEX' => $ban_index,
				'BAN_ID' => $row['ban_id'],
				'USERNAME' => $row['username'],
				'USER_REALNAME' => $row['user_realname'],
				'BAN_UNTIL' => $row['ban_until'],
				'BAN_SECTION' => $row['ban_section']
			));
			$ban_index++;
		}
		$db->sql_freeresult($result);
	}

$template->pparse('body');

include ($phpbb_root_path . 'includes/page_tail.' . $phpEx);
?>