<?php
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

$page_title = 'Moderator List';

include ($phpbb_root_path . 'includes/page_header.' . $phpEx);

$template->set_filenames(array (
	'body' => 'moderator_list_body.tpl'
));

$sql = 'SELECT  user_id
        ,       username
        ,       user_posts
        ,       user_regdate
        ,       user_level
        FROM    ' . USERS_TABLE . '
        WHERE   user_level = ' . MOD . '
        AND     user_active = ' . TRUE . '
        ORDER BY user_id';

if (!($result = $db->sql_query($sql))) {
	message_die(GENERAL_ERROR, 'Unable to retrieve users');
}
while ($row = $db->sql_fetchrow($result)) {
	$moderator_rank = $row['user_rank'];
	$moderator_posts = $row['user_posts'];

	if ($moderator_rank) {
		$sql = 'SELECT  rank_title
		                        FROM    ' . RANKS_TABLE . '
		                        WHERE   rank_id = ' . $moderator_rank;
	} else {
		$sql = 'SELECT  rank_title
		                        FROM    ' . RANKS_TABLE . '
		                        WHERE   rank_min < ' . $moderator_posts . '
		                        ORDER BY rank_min DESC';
	}

	if (!($rank_result = $db->sql_query($sql))) {
		message_die(GENERAL_ERROR, 'Unable to retrieve ranks');
	}

	$rank_row = $db->sql_fetchrow($rank_result);

	$template->assign_block_vars('moderator_row', array (
		'USER_ID' => $row['user_id'],
		'USERNAME' => $row['username'],
		'USER_POSTS' => $row['user_posts'],
		'RANK_TITLE' => $rank_row['rank_title'],
		'CURRENT_USER' => $userdata['username']
	));
}
$db->sql_freeresult($result);

$template->pparse('body');
$cf_test = $_POST['cf_test'];
echo $cf_test;

include ($phpbb_root_path . 'includes/page_tail.' . $phpEx);
?>