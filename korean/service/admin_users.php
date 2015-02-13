<?php
/***************************************************************************
 *                              admin_users.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: admin_users.php,v 1.10 2003/08/30 15:05:44 acydburn Exp $
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
	$module['Users']['Manage'] = $filename;

	return;
}

$phpbb_root_path = './../';
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);
require($phpbb_root_path . 'includes/bbcode.'.$phpEx);
require($phpbb_root_path . 'includes/functions_post.'.$phpEx);
require($phpbb_root_path . 'includes/functions_selects.'.$phpEx);
require($phpbb_root_path . 'includes/functions_validate.'.$phpEx);

//---------------------------------------------------------------------------
//  필드를  템플릿으로 제어하기위한 함수정의....
//---------------------------------------------------------------------------
function user_field($use_temp,$switch_sel,$switch_req, $switch_ig) {
    global $template;
    if (!empty($use_temp)) {
        if ($use_temp == 1) {
	        $template->assign_block_vars("$switch_sel", array());
        } else {
	        $template->assign_block_vars("$switch_req", array());
        } 
    }
	else {
		$template->assign_block_vars("$switch_ig", array());
	}
    return;
}
user_field($board_config['use_realname'],'switch_use_realname','switch_realname_req','switch_realname_ig');
user_field($board_config['use_jumin'],'switch_use_jumin','switch_jumin_req','switch_jumin_ig');
user_field($board_config['use_mphone'],'switch_use_mphone','switch_mphone_req','switch_mphone_ig');
user_field($board_config['use_hphone'],'switch_use_hphone','switch_hphone_req','switch_hphone_ig');
user_field($board_config['use_occ'],'switch_use_occ','switch_occ_req','switch_occ_ig');
user_field($board_config['use_from'],'switch_use_from','switch_from_req','switch_from_ig');
user_field($board_config['use_birth'],'switch_use_birth','switch_birth_req','switch_birth_ig');
user_field($board_config['use_gender'],'switch_use_gender','switch_gender_req','switch_gender_ig');
user_field($board_config['use_remark1'],'switch_use_remark1','switch_remark1_req','switch_remark1_ig');
user_field($board_config['use_remark2'],'switch_use_remark2','switch_remark2_req','switch_remark2_ig');
user_field($board_config['use_remark3'],'switch_use_remark3','switch_remark3_req','switch_remark3_ig');
user_field($board_config['use_remark4'],'switch_use_remark4','switch_remark4_req','switch_remark4_ig');
user_field($board_config['use_remark5'],'switch_use_remark5','switch_remark5_req','switch_remark5_ig');
user_field($board_config['use_remark6'],'switch_use_remark6','switch_remark6_req','switch_remark6_ig');
user_field($board_config['use_remark7'],'switch_use_remark7','switch_remark7_req','switch_remark7_ig');
user_field($board_config['use_remark8'],'switch_use_remark8','switch_remark8_req','switch_remark8_ig');
user_field($board_config['use_remark9'],'switch_use_remark9','switch_remark9_req','switch_remark9_ig');
user_field($board_config['use_remark10'],'switch_use_remark10','switch_remark10_req','switch_remark10_ig');
user_field($board_config['use_remark11'],'switch_use_remark11','switch_remark11_req','switch_remark11_ig');
user_field($board_config['use_remark12'],'switch_use_remark12','switch_remark12_req','switch_remark12_ig');
user_field($board_config['use_remark13'],'switch_use_remark13','switch_remark13_req','switch_remark13_ig');
user_field($board_config['use_remark14'],'switch_use_remark14','switch_remark14_req','switch_remark14_ig');
user_field($board_config['use_remark15'],'switch_use_remark15','switch_remark15_req','switch_remark15_ig');
user_field($board_config['use_remark16'],'switch_use_remark16','switch_remark16_req','switch_remark16_ig');
user_field($board_config['use_remark17'],'switch_use_remark17','switch_remark17_req','switch_remark17_ig');
user_field($board_config['use_remark18'],'switch_use_remark18','switch_remark18_req','switch_remark18_ig');
user_field($board_config['use_remark19'],'switch_use_remark19','switch_remark19_req','switch_remark19_ig');
user_field($board_config['use_remark20'],'switch_use_remark20','switch_remark20_req','switch_remark20_ig');


$html_entities_match = array('#<#', '#>#');
$html_entities_replace = array('&lt;', '&gt;');

//
// Set mode
//
if( isset( $HTTP_POST_VARS['mode'] ) || isset( $HTTP_GET_VARS['mode'] ) )
{
	$mode = ( isset( $HTTP_POST_VARS['mode']) ) ? $HTTP_POST_VARS['mode'] : $HTTP_GET_VARS['mode'];
}
else
{
	$mode = '';
}

//
// Begin program
//
if ( $mode == 'edit' || $mode == 'save' && ( isset($HTTP_POST_VARS['username']) || isset($HTTP_GET_VARS[POST_USERS_URL]) || isset( $HTTP_POST_VARS[POST_USERS_URL]) ) )
{
	attachment_quota_settings('user', $HTTP_POST_VARS['submit'], $mode);
	//
	// Ok, the profile has been modified and submitted, let's update
	//
	if ( ( $mode == 'save' && isset( $HTTP_POST_VARS['submit'] ) ) || isset( $HTTP_POST_VARS['avatargallery'] ) || isset( $HTTP_POST_VARS['submitavatar'] ) || isset( $HTTP_POST_VARS['cancelavatar'] ) )
	{
		$user_id = intval($HTTP_POST_VARS['id']);

		if (!($this_userdata = get_userdata($user_id)))
		{
			message_die(GENERAL_MESSAGE, $lang['No_user_id_specified'] );
		}

		if( $HTTP_POST_VARS['deleteuser'] )
		{
			$sql = "SELECT g.group_id 
				FROM " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g  
				WHERE ug.user_id = $user_id 
					AND g.group_id = ug.group_id 
					AND g.group_single_user = 1";
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not obtain group information for this user', '', __LINE__, __FILE__, $sql);
			}

			$row = $db->sql_fetchrow($result);
			
			$sql = "UPDATE " . POSTS_TABLE . "
				SET poster_id = " . DELETED . ", post_username = '$username' 
				WHERE poster_id = $user_id";
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not update posts for this user', '', __LINE__, __FILE__, $sql);
			}

			$sql = "UPDATE " . TOPICS_TABLE . "
				SET topic_poster = " . DELETED . " 
				WHERE topic_poster = $user_id";
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not update topics for this user', '', __LINE__, __FILE__, $sql);
			}
			
			$sql = "UPDATE " . VOTE_USERS_TABLE . "
				SET vote_user_id = " . DELETED . "
				WHERE vote_user_id = $user_id";
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not update votes for this user', '', __LINE__, __FILE__, $sql);
			}
			
			$sql = "SELECT group_id
				FROM " . GROUPS_TABLE . "
				WHERE group_moderator = $user_id";
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not select groups where user was moderator', '', __LINE__, __FILE__, $sql);
			}
			
			while ( $row_group = $db->sql_fetchrow($result) )
			{
				$group_moderator[] = $row_group['group_id'];
			}
			
			if ( count($group_moderator) )
			{
				$update_moderator_id = implode(', ', $group_moderator);
				
				$sql = "UPDATE " . GROUPS_TABLE . "
					SET group_moderator = " . $userdata['user_id'] . "
					WHERE group_moderator IN ($update_moderator_id)";
				if( !$db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, 'Could not update group moderators', '', __LINE__, __FILE__, $sql);
				}
			}

			$sql = "DELETE FROM " . USERS_TABLE . "
				WHERE user_id = $user_id";
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not delete user', '', __LINE__, __FILE__, $sql);
			}

			$sql = "DELETE FROM " . USER_GROUP_TABLE . "
				WHERE user_id = $user_id";
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not delete user from user_group table', '', __LINE__, __FILE__, $sql);
			}

			$sql = "DELETE FROM " . GROUPS_TABLE . "
				WHERE group_id = " . $row['group_id'];
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not delete group for this user', '', __LINE__, __FILE__, $sql);
			}

			$sql = "DELETE FROM " . AUTH_ACCESS_TABLE . "
				WHERE group_id = " . $row['group_id'];
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not delete group for this user', '', __LINE__, __FILE__, $sql);
			}

			$sql = "DELETE FROM " . TOPICS_WATCH_TABLE . "
				WHERE user_id = $user_id";
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not delete user from topic watch table', '', __LINE__, __FILE__, $sql);
			}
			
			$sql = "DELETE FROM " . BANLIST_TABLE . "
				WHERE ban_userid = $user_id";
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not delete user from banlist table', '', __LINE__, __FILE__, $sql);
			}

			// Log actions MOD Start
			log_action('delete[user]', $user_id, $userdata['user_id'], $userdata['username']);
			// Log actions MOD End

			$sql = "SELECT privmsgs_id
				FROM " . PRIVMSGS_TABLE . "
				WHERE privmsgs_from_userid = $user_id 
					OR privmsgs_to_userid = $user_id";
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not select all users private messages', '', __LINE__, __FILE__, $sql);
			}

			// This little bit of code directly from the private messaging section.
			while ( $row_privmsgs = $db->sql_fetchrow($result) )
			{
				$mark_list[] = $row_privmsgs['privmsgs_id'];
			}
			
			if ( count($mark_list) )
			{
				$delete_sql_id = implode(', ', $mark_list);
				
				$delete_text_sql = "DELETE FROM " . PRIVMSGS_TEXT_TABLE . "
					WHERE privmsgs_text_id IN ($delete_sql_id)";
				$delete_sql = "DELETE FROM " . PRIVMSGS_TABLE . "
					WHERE privmsgs_id IN ($delete_sql_id)";
				
				if ( !$db->sql_query($delete_sql) )
				{
					message_die(GENERAL_ERROR, 'Could not delete private message info', '', __LINE__, __FILE__, $delete_sql);
				}
				
				if ( !$db->sql_query($delete_text_sql) )
				{
					message_die(GENERAL_ERROR, 'Could not delete private message text', '', __LINE__, __FILE__, $delete_text_sql);
				}
			}

			$message = $lang['User_deleted'] . '<br /><br />' . sprintf($lang['Click_return_useradmin'], '<a href="' . append_sid("admin_users.$phpEx") . '">', '</a>') . '<br /><br />' . sprintf($lang['Click_return_admin_index'], '<a href="' . append_sid("index.$phpEx?pane=right") . '">', '</a>');

			message_die(GENERAL_MESSAGE, $message);
		}

		$username = ( !empty($HTTP_POST_VARS['username']) ) ? trim(strip_tags(htmlspecialchars($HTTP_POST_VARS['username']))) : '';
		$email = ( !empty($HTTP_POST_VARS['email']) ) ? trim(strip_tags(htmlspecialchars( $HTTP_POST_VARS['email'] ) )) : '';

		$password = ( !empty($HTTP_POST_VARS['password']) ) ? trim(strip_tags(htmlspecialchars( $HTTP_POST_VARS['password'] ) )) : '';
		$password_confirm = ( !empty($HTTP_POST_VARS['password_confirm']) ) ? trim(strip_tags(htmlspecialchars( $HTTP_POST_VARS['password_confirm'] ) )) : '';

		$icq = ( !empty($HTTP_POST_VARS['icq']) ) ? trim(strip_tags( $HTTP_POST_VARS['icq'] ) ) : '';
		$aim = ( !empty($HTTP_POST_VARS['aim']) ) ? trim(strip_tags( $HTTP_POST_VARS['aim'] ) ) : '';
		$msn = ( !empty($HTTP_POST_VARS['msn']) ) ? trim(strip_tags( $HTTP_POST_VARS['msn'] ) ) : '';
		$yim = ( !empty($HTTP_POST_VARS['yim']) ) ? trim(strip_tags( $HTTP_POST_VARS['yim'] ) ) : '';

		$website = ( !empty($HTTP_POST_VARS['website']) ) ? trim(strip_tags( $HTTP_POST_VARS['website'] ) ) : '';
		$location = ( !empty($HTTP_POST_VARS['location']) ) ? trim(strip_tags( $HTTP_POST_VARS['location'] ) ) : '';
		$location2 = ( !empty($HTTP_POST_VARS['location2']) ) ? trim(strip_tags( $HTTP_POST_VARS['location2'] ) ) : '';

		$interests = ( !empty($HTTP_POST_VARS['interests']) ) ? trim(strip_tags( $HTTP_POST_VARS['interests'] ) ) : '';
        $gender = ( isset($HTTP_POST_VARS['gender']) ) ? $HTTP_POST_VARS['gender'] : 0;

        if (isset($HTTP_POST_VARS['birthday']) ) {
	        $birthday = intval ($HTTP_POST_VARS['birthday']);
	        $b_day = realdate('j',$birthday); 
	        $b_md = realdate('n',$birthday); 
	        $b_year = realdate('Y',$birthday);

        } else {

	        $b_day = ( isset($HTTP_POST_VARS['b_day']) ) ? intval ($HTTP_POST_VARS['b_day']) : 0;
	        $b_md = ( isset($HTTP_POST_VARS['b_md']) ) ? intval ($HTTP_POST_VARS['b_md']) : 0;
	        $b_year = ( isset($HTTP_POST_VARS['b_year']) ) ? intval ($HTTP_POST_VARS['b_year']) : 0;
	        $birthday = mkrealdate($b_day,$b_md,$b_year);
        }

		$signature = ( !empty($HTTP_POST_VARS['signature']) ) ? trim(str_replace('<br />', "\n", $HTTP_POST_VARS['signature'] ) ) : '';

		validate_optional_fields($icq, $aim, $msn, $yim, $website);

		$viewemail = ( isset( $HTTP_POST_VARS['viewemail']) ) ? ( ( $HTTP_POST_VARS['viewemail'] ) ? TRUE : 0 ) : 0;
		$allowviewonline = ( isset( $HTTP_POST_VARS['hideonline']) ) ? ( ( $HTTP_POST_VARS['hideonline'] ) ? 0 : TRUE ) : TRUE;
		$notifyreply = ( isset( $HTTP_POST_VARS['notifyreply']) ) ? ( ( $HTTP_POST_VARS['notifyreply'] ) ? TRUE : 0 ) : 0;
		$notifypm = ( isset( $HTTP_POST_VARS['notifypm']) ) ? ( ( $HTTP_POST_VARS['notifypm'] ) ? TRUE : 0 ) : TRUE;
		$popuppm = ( isset( $HTTP_POST_VARS['popup_pm']) ) ? ( ( $HTTP_POST_VARS['popup_pm'] ) ? TRUE : 0 ) : TRUE;
		$attachsig = ( isset( $HTTP_POST_VARS['attachsig']) ) ? ( ( $HTTP_POST_VARS['attachsig'] ) ? TRUE : 0 ) : 0;

		$allowhtml = ( isset( $HTTP_POST_VARS['allowhtml']) ) ? intval( $HTTP_POST_VARS['allowhtml'] ) : $board_config['allow_html'];
		$allowbbcode = ( isset( $HTTP_POST_VARS['allowbbcode']) ) ? intval( $HTTP_POST_VARS['allowbbcode'] ) : $board_config['allow_bbcode'];
		$allowsmilies = ( isset( $HTTP_POST_VARS['allowsmilies']) ) ? intval( $HTTP_POST_VARS['allowsmilies'] ) : $board_config['allow_smilies'];

		$user_style = ( $HTTP_POST_VARS['style'] ) ? intval( $HTTP_POST_VARS['style'] ) : $board_config['default_style'];
		$user_lang = ( $HTTP_POST_VARS['language'] ) ? $HTTP_POST_VARS['language'] : $board_config['default_lang'];
		$user_timezone = ( isset( $HTTP_POST_VARS['timezone']) ) ? doubleval( $HTTP_POST_VARS['timezone'] ) : $board_config['board_timezone'];
		$user_template = ( $HTTP_POST_VARS['template'] ) ? $HTTP_POST_VARS['template'] : $board_config['board_template'];
		$user_dateformat = ( $HTTP_POST_VARS['dateformat'] ) ? trim( $HTTP_POST_VARS['dateformat'] ) : $board_config['default_dateformat'];

		$user_avatar_local = ( isset( $HTTP_POST_VARS['avatarselect'] ) && !empty($HTTP_POST_VARS['submitavatar'] ) && $board_config['allow_avatar_local'] ) ? $HTTP_POST_VARS['avatarselect'] : ( ( isset( $HTTP_POST_VARS['avatarlocal'] )  ) ? $HTTP_POST_VARS['avatarlocal'] : '' );

		$user_avatar_remoteurl = ( !empty($HTTP_POST_VARS['avatarremoteurl']) ) ? trim( $HTTP_POST_VARS['avatarremoteurl'] ) : '';
		$user_avatar_url = ( !empty($HTTP_POST_VARS['avatarurl']) ) ? trim( $HTTP_POST_VARS['avatarurl'] ) : '';
		$user_avatar_loc = ( $HTTP_POST_FILES['avatar']['tmp_name'] != "none") ? $HTTP_POST_FILES['avatar']['tmp_name'] : '';
		$user_avatar_name = ( !empty($HTTP_POST_FILES['avatar']['name']) ) ? $HTTP_POST_FILES['avatar']['name'] : '';
		$user_avatar_size = ( !empty($HTTP_POST_FILES['avatar']['size']) ) ? $HTTP_POST_FILES['avatar']['size'] : 0;
		$user_avatar_filetype = ( !empty($HTTP_POST_FILES['avatar']['type']) ) ? $HTTP_POST_FILES['avatar']['type'] : '';

		$user_avatar = ( empty($user_avatar_loc) ) ? $this_userdata['user_avatar'] : '';
		$user_avatar_type = ( empty($user_avatar_loc) ) ? $this_userdata['user_avatar_type'] : '';		

		$user_status = ( !empty($HTTP_POST_VARS['user_status']) ) ? intval( $HTTP_POST_VARS['user_status'] ) : 0;
// 추가필드
        $realname = ( !empty($HTTP_POST_VARS['realname']) ) ? trim(strip_tags( $HTTP_POST_VARS['realname'] ) ) : ''; 
        $zipcode1 = ( !empty($HTTP_POST_VARS['zipcode1']) ) ? trim(strip_tags( $HTTP_POST_VARS['zipcode1'] ) ) : ''; 
        $zipcode2 = ( !empty($HTTP_POST_VARS['zipcode2']) ) ? trim(strip_tags( $HTTP_POST_VARS['zipcode2'] ) ) : ''; 
        $jumin1 = ( !empty($HTTP_POST_VARS['jumin1']) ) ? trim(strip_tags( $HTTP_POST_VARS['jumin1'] ) ) : ''; 
        $jumin2 = ( !empty($HTTP_POST_VARS['jumin2']) ) ? trim(strip_tags( $HTTP_POST_VARS['jumin2'] ) ) : ''; 

        $occupation = ( isset($HTTP_POST_VARS['occupation']) ) ? intval ($HTTP_POST_VARS['occupation']) : 0;
        $mphone1 = ( isset($HTTP_POST_VARS['mphone1']) ) ? intval ($HTTP_POST_VARS['mphone1']) : 0;
        $mphone2 = ( !empty($HTTP_POST_VARS['mphone2']) ) ? trim(strip_tags( $HTTP_POST_VARS['mphone2'] ) ) : ''; 
        $mphone3 = ( !empty($HTTP_POST_VARS['mphone3']) ) ? trim(strip_tags( $HTTP_POST_VARS['mphone3'] ) ) : ''; 

        $hphone1 = ( isset($HTTP_POST_VARS['hphone1']) ) ? intval ($HTTP_POST_VARS['hphone1']) : 0;
        $hphone2 = ( !empty($HTTP_POST_VARS['hphone2']) ) ? trim(strip_tags( $HTTP_POST_VARS['hphone2'] ) ) : ''; 
        $hphone3 = ( !empty($HTTP_POST_VARS['hphone3']) ) ? trim(strip_tags( $HTTP_POST_VARS['hphone3'] ) ) : ''; 

		$remark1 = ( isset($HTTP_POST_VARS['remark1']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark1'] ) ) : ''; 
		$remark2 = ( isset($HTTP_POST_VARS['remark2']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark2'] ) ) : ''; 
		$remark3 = ( isset($HTTP_POST_VARS['remark3']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark3'] ) ) : ''; 
		$remark4 = ( isset($HTTP_POST_VARS['remark4']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark4'] ) ) : ''; 
		$remark5 = ( isset($HTTP_POST_VARS['remark5']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark5'] ) ) : ''; 
		$remark6 = ( isset($HTTP_POST_VARS['remark6']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark6'] ) ) : ''; 
		$remark7 = ( isset($HTTP_POST_VARS['remark7']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark7'] ) ) : ''; 
		$remark8 = ( isset($HTTP_POST_VARS['remark8']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark8'] ) ) : ''; 
		$remark9 = ( isset($HTTP_POST_VARS['remark9']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark9'] ) ) : ''; 
		$remark10 = ( isset($HTTP_POST_VARS['remark10']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark10'] ) ) : ''; 
		$remark11 = ( isset($HTTP_POST_VARS['remark11']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark11'] ) ) : ''; 
		$remark12 = ( isset($HTTP_POST_VARS['remark12']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark12'] ) ) : ''; 
		$remark13 = ( isset($HTTP_POST_VARS['remark13']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark13'] ) ) : ''; 
		$remark14 = ( isset($HTTP_POST_VARS['remark14']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark14'] ) ) : ''; 
		$remark15 = ( isset($HTTP_POST_VARS['remark15']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark15'] ) ) : ''; 
		$remark16 = ( isset($HTTP_POST_VARS['remark16']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark16'] ) ) : ''; 
		$remark17 = ( isset($HTTP_POST_VARS['remark17']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark17'] ) ) : ''; 
		$remark18 = ( isset($HTTP_POST_VARS['remark18']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark18'] ) ) : ''; 
		$remark19 = ( isset($HTTP_POST_VARS['remark19']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark19'] ) ) : ''; 
		$remark20 = ( isset($HTTP_POST_VARS['remark20']) ) ? trim(strip_tags( $HTTP_POST_VARS['remark20'] ) ) : ''; 

		$user_allowpm = ( !empty($HTTP_POST_VARS['user_allowpm']) ) ? intval( $HTTP_POST_VARS['user_allowpm'] ) : 0;
		$user_rank = ( !empty($HTTP_POST_VARS['user_rank']) ) ? intval( $HTTP_POST_VARS['user_rank'] ) : 0;
		$user_allowavatar = ( !empty($HTTP_POST_VARS['user_allowavatar']) ) ? intval( $HTTP_POST_VARS['user_allowavatar'] ) : 0;

		if( isset( $HTTP_POST_VARS['avatargallery'] ) || isset( $HTTP_POST_VARS['submitavatar'] ) || isset( $HTTP_POST_VARS['cancelavatar'] ) )
		{
			$username = stripslashes($username);
			$email = stripslashes($email);
			$password = '';
			$password_confirm = '';

			$icq = stripslashes($icq);
			$aim = htmlspecialchars(stripslashes($aim));
			$msn = htmlspecialchars(stripslashes($msn));
			$yim = htmlspecialchars(stripslashes($yim));

			$website = htmlspecialchars(stripslashes($website));
			$location = htmlspecialchars(stripslashes($location));
			$location2 = htmlspecialchars(stripslashes($location2));
			$occupation = htmlspecialchars(stripslashes($occupation));
			$interests = htmlspecialchars(stripslashes($interests));
			$signature = htmlspecialchars(stripslashes($signature));

  // 추가필드
            $realname = htmlspecialchars(stripslashes($realname)); 
            $zipcode1 = htmlspecialchars(stripslashes($zipcode1)); 
            $zipcode2 = htmlspecialchars(stripslashes($zipcode2)); 
            $jumin1 = htmlspecialchars(stripslashes($jumin1)); 
            $jumin2 = htmlspecialchars(stripslashes($jumin2)); 

            $mphone1 = htmlspecialchars(stripslashes($mphone1)); 
            $mphone2 = htmlspecialchars(stripslashes($mphone2)); 
            $mphone3 = htmlspecialchars(stripslashes($mphone3)); 
            $hphone1 = htmlspecialchars(stripslashes($hphone1)); 
            $hphone2 = htmlspecialchars(stripslashes($hphone2)); 
            $hphone3 = htmlspecialchars(stripslashes($hphone3)); 

			$remark1 = htmlspecialchars(stripslashes($remark1)); 
			$remark2 = htmlspecialchars(stripslashes($remark2)); 
			$remark3 = htmlspecialchars(stripslashes($remark3)); 
			$remark4 = htmlspecialchars(stripslashes($remark4)); 
			$remark5 = htmlspecialchars(stripslashes($remark5)); 
			$remark6 = htmlspecialchars(stripslashes($remark6)); 
			$remark7 = htmlspecialchars(stripslashes($remark7)); 
			$remark8 = htmlspecialchars(stripslashes($remark8)); 
			$remark9 = htmlspecialchars(stripslashes($remark9)); 
			$remark10 = htmlspecialchars(stripslashes($remark10)); 
			$remark11 = htmlspecialchars(stripslashes($remark11)); 
			$remark12 = htmlspecialchars(stripslashes($remark12)); 
			$remark13 = htmlspecialchars(stripslashes($remark13)); 
			$remark14 = htmlspecialchars(stripslashes($remark14)); 
			$remark15 = htmlspecialchars(stripslashes($remark15)); 
			$remark16 = htmlspecialchars(stripslashes($remark16)); 
			$remark17 = htmlspecialchars(stripslashes($remark17)); 
			$remark18 = htmlspecialchars(stripslashes($remark18)); 
			$remark19 = htmlspecialchars(stripslashes($remark19)); 
			$remark20 = htmlspecialchars(stripslashes($remark20)); 


			$user_lang = stripslashes($user_lang);
			$user_dateformat = htmlspecialchars(stripslashes($user_dateformat));

			if ( !isset($HTTP_POST_VARS['cancelavatar'])) 
			{
				$user_avatar = $user_avatar_local;
				$user_avatar_type = USER_AVATAR_GALLERY;
			}
		}
	}

	if( isset( $HTTP_POST_VARS['submit'] ) )
	{
		include($phpbb_root_path . 'includes/usercp_avatar.'.$phpEx);

		$error = FALSE;

		if (stripslashes($username) != $this_userdata['username'])
		{
			unset($rename_user);

			if ( stripslashes(strtolower($username)) != strtolower($this_userdata['username']) ) 
			{
				$result = validate_username($username);
				if ( $result['error'] )
				{
					$error = TRUE;
					$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $result['error_msg'];
				}
				else if ( strtolower(str_replace("\\'", "''", $username)) == strtolower($userdata['username']) )
				{
					$error = TRUE;
					$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Username_taken'];
				}
			}

			if (!$error)
			{
				$username_sql = "username = '" . str_replace("\\'", "''", $username) . "', ";
				$rename_user = $username; // Used for renaming usergroup
			}
		}

		$passwd_sql = '';
		if( !empty($password) && !empty($password_confirm) )
		{
			//
			// Awww, the user wants to change their password, isn't that cute..
			//
			if($password != $password_confirm)
			{
				$error = TRUE;
				$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Password_mismatch'];
			}
			else
			{
				$password = md5($password);
				$passwd_sql = "user_password = '$password', ";
			}
		}
		else if( $password && !$password_confirm )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Password_mismatch'];
		}
		else if( !$password && $password_confirm )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Password_mismatch'];
		}

		if ($signature != '')
		{
			$sig_length_check = preg_replace('/(\[.*?)(=.*?)\]/is', '\\1]', stripslashes($signature));
			if ( $allowhtml )
			{
				$sig_length_check = preg_replace('/(\<.*?)(=.*?)( .*?=.*?)?([ \/]?\>)/is', '\\1\\3\\4', $sig_length_check);
			}

			// Only create a new bbcode_uid when there was no uid yet.
			if ( $signature_bbcode_uid == '' )
			{
				$signature_bbcode_uid = ( $allowbbcode ) ? make_bbcode_uid() : '';
			}
			$signature = prepare_message($signature, $allowhtml, $allowbbcode, $allowsmilies, $signature_bbcode_uid);

			if ( strlen($sig_length_check) > $board_config['max_sig_chars'] )
			{ 
				$error = TRUE;
				$error_msg .=  ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Signature_too_long'];
			}
		}

		//
		// Avatar stuff
		//
		$avatar_sql = "";
		if( isset($HTTP_POST_VARS['avatardel']) )
		{
			if( $this_userdata['user_avatar_type'] == USER_AVATAR_UPLOAD && $this_userdata['user_avatar'] != "" )
			{
				if( @file_exists(@phpbb_realpath("./" . $board_config['avatar_path'] . "/" . $this_userdata['user_avatar'])) )
				{
					@unlink("./" . $board_config['avatar_path'] . "/" . $this_userdata['user_avatar']);
				}
			}
			$avatar_sql = ", user_avatar = '', user_avatar_type = " . USER_AVATAR_NONE;
		}
		else if( ( $user_avatar_loc != "" || !empty($user_avatar_url) ) && !$error )
		{
			//
			// Only allow one type of upload, either a
			// filename or a URL
			//
			if( !empty($user_avatar_loc) && !empty($user_avatar_url) )
			{
				$error = TRUE;
				if( isset($error_msg) )
				{
					$error_msg .= "<br />";
				}
				$error_msg .= $lang['Only_one_avatar'];
			}

			if( $user_avatar_loc != "" )
			{
				if( file_exists(@phpbb_realpath($user_avatar_loc)) && ereg(".jpg$|.gif$|.png$", $user_avatar_name) )
				{
					if( $user_avatar_size <= $board_config['avatar_filesize'] && $user_avatar_size > 0)
					{
						$error_type = false;

						//
						// Opera appends the image name after the type, not big, not clever!
						//
						preg_match("'image\/[x\-]*([a-z]+)'", $user_avatar_filetype, $user_avatar_filetype);
						$user_avatar_filetype = $user_avatar_filetype[1];

						switch( $user_avatar_filetype )
						{
							case "jpeg":
							case "pjpeg":
							case "jpg":
								$imgtype = '.jpg';
								break;
							case "gif":
								$imgtype = '.gif';
								break;
							case "png":
								$imgtype = '.png';
								break;
							default:
								$error = true;
								$error_msg = (!empty($error_msg)) ? $error_msg . "<br />" . $lang['Avatar_filetype'] : $lang['Avatar_filetype'];
								break;
						}

						if( !$error )
						{
							list($width, $height) = @getimagesize($user_avatar_loc);

							if( $width <= $board_config['avatar_max_width'] && $height <= $board_config['avatar_max_height'] )
							{
								$user_id = $this_userdata['user_id'];

								$avatar_filename = $user_id . $imgtype;

								if( $this_userdata['user_avatar_type'] == USER_AVATAR_UPLOAD && $this_userdata['user_avatar'] != "" )
								{
									if( @file_exists(@phpbb_realpath("./../" . $board_config['avatar_path'] . "/" . $this_userdata['user_avatar'])) )
									{
										@unlink("./../" . $board_config['avatar_path'] . "/". $this_userdata['user_avatar']);
									}
								}
								@copy($user_avatar_loc, "./../" . $board_config['avatar_path'] . "/$avatar_filename");

								$avatar_sql = ", user_avatar = '$avatar_filename', user_avatar_type = " . USER_AVATAR_UPLOAD;
							}
							else
							{
								$l_avatar_size = sprintf($lang['Avatar_imagesize'], $board_config['avatar_max_width'], $board_config['avatar_max_height']);

								$error = true;
								$error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $l_avatar_size : $l_avatar_size;
							}
						}
					}
					else
					{
						$l_avatar_size = sprintf($lang['Avatar_filesize'], round($board_config['avatar_filesize'] / 1024));

						$error = true;
						$error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $l_avatar_size : $l_avatar_size;
					}
				}
				else
				{
					$error = true;
					$error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $lang['Avatar_filetype'] : $lang['Avatar_filetype'];
				}
			}
			else if( !empty($user_avatar_url) )
			{
				//
				// First check what port we should connect
				// to, look for a :[xxxx]/ or, if that doesn't
				// exist assume port 80 (http)
				//
				preg_match("/^(http:\/\/)?([\w\-\.]+)\:?([0-9]*)\/(.*)$/", $user_avatar_url, $url_ary);

				if( !empty($url_ary[4]) )
				{
					$port = (!empty($url_ary[3])) ? $url_ary[3] : 80;

					$fsock = @fsockopen($url_ary[2], $port, $errno, $errstr);
					if( $fsock )
					{
						$base_get = "/" . $url_ary[4];

						//
						// Uses HTTP 1.1, could use HTTP 1.0 ...
						//
						@fputs($fsock, "GET $base_get HTTP/1.1\r\n");
						@fputs($fsock, "HOST: " . $url_ary[2] . "\r\n");
						@fputs($fsock, "Connection: close\r\n\r\n");

						unset($avatar_data);
						while( !@feof($fsock) )
						{
							$avatar_data .= @fread($fsock, $board_config['avatar_filesize']);
						}
						@fclose($fsock);

						if( preg_match("/Content-Length\: ([0-9]+)[^\/ ][\s]+/i", $avatar_data, $file_data1) && preg_match("/Content-Type\: image\/[x\-]*([a-z]+)[\s]+/i", $avatar_data, $file_data2) )
						{
							$file_size = $file_data1[1]; 
							$file_type = $file_data2[1];

							switch( $file_type )
							{
								case "jpeg":
								case "pjpeg":
								case "jpg":
									$imgtype = '.jpg';
									break;
								case "gif":
									$imgtype = '.gif';
									break;
								case "png":
									$imgtype = '.png';
									break;
								default:
									$error = true;
									$error_msg = (!empty($error_msg)) ? $error_msg . "<br />" . $lang['Avatar_filetype'] : $lang['Avatar_filetype'];
									break;
							}

							if( !$error && $file_size > 0 && $file_size < $board_config['avatar_filesize'] )
							{
								$avatar_data = substr($avatar_data, strlen($avatar_data) - $file_size, $file_size);

								$tmp_filename = tempnam ("/tmp", $this_userdata['user_id'] . "-");
								$fptr = @fopen($tmp_filename, "wb");
								$bytes_written = @fwrite($fptr, $avatar_data, $file_size);
								@fclose($fptr);

								if( $bytes_written == $file_size )
								{
									list($width, $height) = @getimagesize($tmp_filename);

									if( $width <= $board_config['avatar_max_width'] && $height <= $board_config['avatar_max_height'] )
									{
										$user_id = $this_userdata['user_id'];

										$avatar_filename = $user_id . $imgtype;

										if( $this_userdata['user_avatar_type'] == USER_AVATAR_UPLOAD && $this_userdata['user_avatar'] != "")
										{
											if( file_exists(@phpbb_realpath("./../" . $board_config['avatar_path'] . "/" . $this_userdata['user_avatar'])) )
											{
												@unlink("./../" . $board_config['avatar_path'] . "/" . $this_userdata['user_avatar']);
											}
										}
										@copy($tmp_filename, "./../" . $board_config['avatar_path'] . "/$avatar_filename");
										@unlink($tmp_filename);

										$avatar_sql = ", user_avatar = '$avatar_filename', user_avatar_type = " . USER_AVATAR_UPLOAD;
									}
									else
									{
										$l_avatar_size = sprintf($lang['Avatar_imagesize'], $board_config['avatar_max_width'], $board_config['avatar_max_height']);

										$error = true;
										$error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $l_avatar_size : $l_avatar_size;
									}
								}
								else
								{
									//
									// Error writing file
									//
									@unlink($tmp_filename);
									message_die(GENERAL_ERROR, "Could not write avatar file to local storage. Please contact the board administrator with this message", "", __LINE__, __FILE__);
								}
							}
						}
						else
						{
							//
							// No data
							//
							$error = true;
							$error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $lang['File_no_data'] : $lang['File_no_data'];
						}
					}
					else
					{
						//
						// No connection
						//
						$error = true;
						$error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $lang['No_connection_URL'] : $lang['No_connection_URL'];
					}
				}
				else
				{
					$error = true;
					$error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $lang['Incomplete_URL'] : $lang['Incomplete_URL'];
				}
			}
			else if( !empty($user_avatar_name) )
			{
				$l_avatar_size = sprintf($lang['Avatar_filesize'], round($board_config['avatar_filesize'] / 1024));

				$error = true;
				$error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $l_avatar_size : $l_avatar_size;
			}
		}
		else if( $user_avatar_remoteurl != "" && $avatar_sql == "" && !$error )
		{
			if( !preg_match("#^http:\/\/#i", $user_avatar_remoteurl) )
			{
				$user_avatar_remoteurl = "http://" . $user_avatar_remoteurl;
			}

			if( preg_match("#^(http:\/\/[a-z0-9\-]+?\.([a-z0-9\-]+\.)*[a-z]+\/.*?\.(gif|jpg|png)$)#is", $user_avatar_remoteurl) )
			{
				$avatar_sql = ", user_avatar = '" . str_replace("\'", "''", $user_avatar_remoteurl) . "', user_avatar_type = " . USER_AVATAR_REMOTE;
			}
			else
			{
				$error = true;
				$error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $lang['Wrong_remote_avatar_format'] : $lang['Wrong_remote_avatar_format'];
			}
		}
		else if( $user_avatar_local != "" && $avatar_sql == "" && !$error )
		{
			$avatar_sql = ", user_avatar = '" . str_replace("\'", "''", $user_avatar_local) . "', user_avatar_type = " . USER_AVATAR_GALLERY;
		}


// find the birthday values, reflected by the $lang['Submit_date_format'] 
if ($b_day || $b_md || $b_year) //if a birthday is submited, then validate it 
{ 
      $user_age=(date('md')>=$b_md.(($b_day <= 9) ? '0':'').$b_day) ? date('Y') - $b_year : date('Y') - $b_year - 1 ; 
      // Check date, maximum / minimum user age 
      if (!checkdate($b_md,$b_day,$b_year)) 
      { 
         $error = TRUE; 
         if( isset($error_msg) )$error_msg .= "<br />"; 
         $error_msg .= 'Wrong birthday format'; 
      } else
      { 
         $birthday = ($error) ? $birthday : mkrealdate($b_day,$b_md,$b_year);
      } 
} else $birthday = ($error) ? '' : 999999;

		//
		// Update entry in DB
		//
		if( !$error )
		{

            $mphone = addslashes($mphone1.'-'.$mphone2.'-'.$mphone3);
            $hphone = addslashes($hphone1.'-'.$hphone2.'-'.$hphone3);
            $location = $location . "/" . $location2;
            $zipcode = trim($zipcode1 . '-'. $zipcode2);

			$sql = "UPDATE " . USERS_TABLE . "
				SET " . $username_sql . $passwd_sql . "user_email = '" . str_replace("\'", "''", $email) . "', user_icq = '" . str_replace("\'", "''", $icq) . "', user_website = '" . str_replace("\'", "''", $website) . "', user_occ = '" . str_replace("\'", "''", $occupation) . "', user_from = '" . str_replace("\'", "''", $location) . "', user_interests = '" . str_replace("\'", "''", $interests) . "', user_sig = '" . str_replace("\'", "''", $signature) . "', user_viewemail = $viewemail, user_aim = '" . str_replace("\'", "''", $aim) . "', user_yim = '" . str_replace("\'", "''", $yim) . "', user_msnm = '" . str_replace("\'", "''", $msn) . "', user_attachsig = $attachsig, user_sig_bbcode_uid = '$signature_bbcode_uid', user_allowsmile = $allowsmilies, user_allowhtml = $allowhtml, user_allowavatar = $user_allowavatar, user_allowbbcode = $allowbbcode, user_allow_viewonline = $allowviewonline, user_notify = $notifyreply, user_allow_pm = $user_allowpm, user_notify_pm = $notifypm, user_popup_pm = $popuppm, user_lang = '" . str_replace("\'", "''", $user_lang) . "', user_style = $user_style, user_timezone = $user_timezone, user_dateformat = '" . str_replace("\'", "''", $user_dateformat) . "', user_active = $user_status, user_rank = $user_rank" . $avatar_sql . ", user_gender = '$gender', user_birthday='$birthday', user_realname = '" . str_replace("\'", "''", $realname) . "',  user_zipcode = '$zipcode', user_jumin1 = '$jumin1', user_jumin2 = '$jumin2', user_mphone = '$mphone', user_hphone = '$hphone', user_remark1='$remark1', user_remark2='$remark2', user_remark3='$remark3', user_remark4='$remark4', user_remark5='$remark5', user_remark6='$remark6', user_remark7='$remark7', user_remark8='$remark8', user_remark9='$remark9', user_remark10='$remark10', user_remark11='$remark11', user_remark12='$remark12', user_remark13='$remark13', user_remark14='$remark14', user_remark15='$remark15', user_remark16='$remark16', user_remark17='$remark17', user_remark18='$remark18', user_remark19='$remark19', user_remark20='$remark20'  
				WHERE user_id = $user_id";

			if( $result = $db->sql_query($sql) )
			{
				if( isset($rename_user) )
				{
					$sql = "UPDATE " . GROUPS_TABLE . "
						SET group_name = '".str_replace("\'", "''", $rename_user)."'
						WHERE group_name = '".str_replace("'", "''", $this_userdata['username'] )."'";
					if( !$result = $db->sql_query($sql) )
					{
						message_die(GENERAL_ERROR, 'Could not rename users group', '', __LINE__, __FILE__, $sql);
					}
					// Log actions MOD Start
					log_action('update[user-rename]', 0, $userdata['user_id'], $userdata['username']);
					// Log actions MOD End
				}
				
				// Delete user session, to prevent the user navigating the forum (if logged in) when disabled
				if (!$user_status)
				{
					$sql = "DELETE FROM " . SESSIONS_TABLE . " 
						WHERE session_user_id = " . $user_id;

					if ( !$db->sql_query($sql) )
					{
						message_die(GENERAL_ERROR, 'Error removing user session', '', __LINE__, __FILE__, $sql);
					}
				}
				
				$message .= $lang['Admin_user_updated'];
			}
			else
			{
				$error = TRUE;
				$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Admin_user_fail'];
			}

			// Log actions MOD Start
			log_action('update[user-data]', $user_id, $userdata['user_id'], $userdata['username']);
			// Log actions MOD End

			$message .= '<br /><br />' . sprintf($lang['Click_return_useradmin'], '<a href="' . append_sid("admin_users.$phpEx") . '">', '</a>') . '<br /><br />' . sprintf($lang['Click_return_admin_index'], '<a href="' . append_sid("index.$phpEx?pane=right") . '">', '</a>');

			message_die(GENERAL_MESSAGE, $message);
		}
		else
		{
			$template->set_filenames(array(
				'reg_header' => 'error_body.tpl')
			);

			$template->assign_vars(array(
				'ERROR_MESSAGE' => "<font color=red>".$error_msg."</font>")
			);

			$template->assign_var_from_handle('ERROR_BOX', 'reg_header');

			$username = htmlspecialchars(stripslashes($username));
			$email = stripslashes($email);
			$password = '';
			$password_confirm = '';

			$icq = stripslashes($icq);
			$aim = htmlspecialchars(str_replace('+', ' ', stripslashes($aim)));
			$msn = htmlspecialchars(stripslashes($msn));
			$yim = htmlspecialchars(stripslashes($yim));

			$website = htmlspecialchars(stripslashes($website));
			$location = htmlspecialchars(stripslashes($location));
			$location2 = htmlspecialchars(stripslashes($location2));
			$occupation = htmlspecialchars(stripslashes($occupation));
			$interests = htmlspecialchars(stripslashes($interests));
			$signature = htmlspecialchars(stripslashes($signature));

    // 추가필드
			$realname = htmlspecialchars(stripslashes($realname));
            $zipcode1 = htmlspecialchars(stripslashes($zipcode1)); 
            $zipcode2 = htmlspecialchars(stripslashes($zipcode2)); 
            $jumin1 = htmlspecialchars(stripslashes($jumin1)); 
            $jumin2 = htmlspecialchars(stripslashes($jumin2)); 

            $mphone1 = htmlspecialchars(stripslashes($mphone1)); 
            $mphone2 = htmlspecialchars(stripslashes($mphone2)); 
            $mphone3 = htmlspecialchars(stripslashes($mphone3)); 
            $hphone1 = htmlspecialchars(stripslashes($hphone1)); 
            $hphone2 = htmlspecialchars(stripslashes($hphone2)); 
            $hphone3 = htmlspecialchars(stripslashes($hphone3)); 

            $remark1 = htmlspecialchars(stripslashes($remark1)); 
            $remark2 = htmlspecialchars(stripslashes($remark2)); 
            $remark3 = htmlspecialchars(stripslashes($remark3)); 
            $remark4 = htmlspecialchars(stripslashes($remark4)); 
            $remark5 = htmlspecialchars(stripslashes($remark5)); 
			$remark6 = htmlspecialchars(stripslashes($remark6)); 
			$remark7 = htmlspecialchars(stripslashes($remark7)); 
			$remark8 = htmlspecialchars(stripslashes($remark8)); 
			$remark9 = htmlspecialchars(stripslashes($remark9)); 
			$remark10 = htmlspecialchars(stripslashes($remark10)); 
			$remark11 = htmlspecialchars(stripslashes($remark11)); 
			$remark12 = htmlspecialchars(stripslashes($remark12)); 
			$remark13 = htmlspecialchars(stripslashes($remark13)); 
			$remark14 = htmlspecialchars(stripslashes($remark14)); 
			$remark15 = htmlspecialchars(stripslashes($remark15)); 
			$remark16 = htmlspecialchars(stripslashes($remark16)); 
			$remark17 = htmlspecialchars(stripslashes($remark17)); 
			$remark18 = htmlspecialchars(stripslashes($remark18)); 
			$remark19 = htmlspecialchars(stripslashes($remark19)); 
			$remark20 = htmlspecialchars(stripslashes($remark20)); 

			$user_lang = stripslashes($user_lang);
			$user_dateformat = htmlspecialchars(stripslashes($user_dateformat));
		}
	}
	else if( !isset( $HTTP_POST_VARS['submit'] ) && $mode != 'save' && !isset( $HTTP_POST_VARS['avatargallery'] ) && !isset( $HTTP_POST_VARS['submitavatar'] ) && !isset( $HTTP_POST_VARS['cancelavatar'] ) )
	{
		if( isset( $HTTP_GET_VARS[POST_USERS_URL]) || isset( $HTTP_POST_VARS[POST_USERS_URL]) )
		{
			$user_id = ( isset( $HTTP_POST_VARS[POST_USERS_URL]) ) ? intval( $HTTP_POST_VARS[POST_USERS_URL]) : intval( $HTTP_GET_VARS[POST_USERS_URL]);
			$this_userdata = get_userdata($user_id);
			if( !$this_userdata )
			{
				message_die(GENERAL_MESSAGE, $lang['No_user_id_specified'] );
			}
		}
		else
		{
			$this_userdata = get_userdata($HTTP_POST_VARS['username'], true);
			if( !$this_userdata )
			{
				message_die(GENERAL_MESSAGE, $lang['No_user_id_specified'] );
			}
		}

		//
		// Now parse and display it as a template
		//
		$user_id = $this_userdata['user_id'];
		$username = $this_userdata['username'];
		$email = $this_userdata['user_email'];
		$password = '';
		$password_confirm = '';

		$icq = $this_userdata['user_icq'];
		$aim = htmlspecialchars(str_replace('+', ' ', $this_userdata['user_aim'] ));
		$msn = htmlspecialchars($this_userdata['user_msnm']);
		$yim = htmlspecialchars($this_userdata['user_yim']);

		$website = htmlspecialchars($this_userdata['user_website']);
        $from_ary = explode("/", $this_userdata['user_from']);
		$location = htmlspecialchars($from_ary[0]);
		$location2 = htmlspecialchars($from_ary[1]);
		$occupation = htmlspecialchars($this_userdata['user_occ']);
		$interests = htmlspecialchars($this_userdata['user_interests']);

		$signature = ($this_userdata['user_sig_bbcode_uid'] != '') ? preg_replace('#:' . $this_userdata['user_sig_bbcode_uid'] . '#si', '', $this_userdata['user_sig']) : $this_userdata['user_sig'];
		$signature = preg_replace($html_entities_match, $html_entities_replace, $signature);

  // 추가필드
        $gender = $this_userdata['user_gender'];
        $next_birthday_greeting = $this_userdata['user_next_birthday_greeting'];

        if ($this_userdata['user_birthday']!=999999) {
	        $birthday = realdate($lang['Submit_date_format'],$this_userdata['user_birthday']); 
	        $b_day = realdate('j',$this_userdata['user_birthday']); 
	        $b_md = realdate('n',$this_userdata['user_birthday']); 
	        $b_year = realdate('Y',$this_userdata['user_birthday']); 

        } else {

	        $b_day = ''; 
	        $b_md = ''; 
	        $b_year = ''; 
	        $birthday = ''; 
        }
   
        $realname = htmlspecialchars($this_userdata['user_realname']); 

        $zipcode_ary = explode("-", $this_userdata['user_zipcode']);
        $zipcode1 = htmlspecialchars($zipcode_ary[0]); 
        $zipcode2 = htmlspecialchars($zipcode_ary[1]); 

        $jumin1 = htmlspecialchars($this_userdata['user_jumin1']); 
        $jumin2 = htmlspecialchars($this_userdata['user_jumin2']); 

        $mphone_ary = explode("-", $this_userdata['user_mphone']);
        $mphone1 = htmlspecialchars($mphone_ary[0]); 
        $mphone2 = htmlspecialchars($mphone_ary[1]); 
        $mphone3 = htmlspecialchars($mphone_ary[2]);
        $hphone_ary = explode("-", $this_userdata['user_hphone']);
        $hphone1 = htmlspecialchars($hphone_ary[0]); 
        $hphone2 = htmlspecialchars($hphone_ary[1]); 
        $hphone3 = htmlspecialchars($hphone_ary[2]);

		$remark1 = htmlspecialchars($this_userdata['user_remark1']); 
		$remark2 = htmlspecialchars($this_userdata['user_remark2']); 
		$remark3 = htmlspecialchars($this_userdata['user_remark3']); 
		$remark4 = htmlspecialchars($this_userdata['user_remark4']); 
		$remark5 = htmlspecialchars($this_userdata['user_remark5']); 
		$remark6 = htmlspecialchars($this_userdata['user_remark6']); 
		$remark7 = htmlspecialchars($this_userdata['user_remark7']); 
		$remark8 = htmlspecialchars($this_userdata['user_remark8']); 
		$remark9 = htmlspecialchars($this_userdata['user_remark9']); 
		$remark10 = htmlspecialchars($this_userdata['user_remark10']); 
		$remark11 = htmlspecialchars($this_userdata['user_remark11']); 
		$remark12 = htmlspecialchars($this_userdata['user_remark12']); 
		$remark13 = htmlspecialchars($this_userdata['user_remark13']); 
		$remark14 = htmlspecialchars($this_userdata['user_remark14']); 
		$remark15 = htmlspecialchars($this_userdata['user_remark15']); 
		$remark16 = htmlspecialchars($this_userdata['user_remark16']); 
		$remark17 = htmlspecialchars($this_userdata['user_remark17']); 
		$remark18 = htmlspecialchars($this_userdata['user_remark18']); 
		$remark19 = htmlspecialchars($this_userdata['user_remark19']); 
		$remark20 = htmlspecialchars($this_userdata['user_remark20']); 

		$viewemail = $this_userdata['user_viewemail'];
		$notifypm = $this_userdata['user_notify_pm'];
		$popuppm = $this_userdata['user_popup_pm'];
		$notifyreply = $this_userdata['user_notify'];
		$attachsig = $this_userdata['user_attachsig'];
		$allowhtml = $this_userdata['user_allowhtml'];
		$allowbbcode = $this_userdata['user_allowbbcode'];
		$allowsmilies = $this_userdata['user_allowsmile'];
		$allowviewonline = $this_userdata['user_allow_viewonline'];

		$user_avatar = $this_userdata['user_avatar'];
		$user_avatar_type = $this_userdata['user_avatar_type'];
		$user_style = $this_userdata['user_style'];
		$user_lang = $this_userdata['user_lang'];
		$user_timezone = $this_userdata['user_timezone'];
		$user_dateformat = htmlspecialchars($this_userdata['user_dateformat']);
		
		$user_status = $this_userdata['user_active'];
		$user_allowavatar = $this_userdata['user_allowavatar'];
		$user_allowpm = $this_userdata['user_allow_pm'];
		
		$COPPA = false;

		$html_status =  ($this_userdata['user_allowhtml'] ) ? $lang['HTML_is_ON'] : $lang['HTML_is_OFF'];
		$bbcode_status = ($this_userdata['user_allowbbcode'] ) ? $lang['BBCode_is_ON'] : $lang['BBCode_is_OFF'];
		$smilies_status = ($this_userdata['user_allowsmile'] ) ? $lang['Smilies_are_ON'] : $lang['Smilies_are_OFF'];
	}

	if( isset($HTTP_POST_VARS['avatargallery']) && !$error )
	{
		if( !$error )
		{
			$user_id = intval($HTTP_POST_VARS['id']);

			$template->set_filenames(array(
				"body" => "service/user_avatar_gallery.tpl")
			);

			$dir = @opendir("../" . $board_config['avatar_gallery_path']);

			$avatar_images = array();
			while( $file = @readdir($dir) )
			{
				if( $file != "." && $file != ".." && !is_file(phpbb_realpath("./../" . $board_config['avatar_gallery_path'] . "/" . $file)) && !is_link(phpbb_realpath("./../" . $board_config['avatar_gallery_path'] . "/" . $file)) )
				{
					$sub_dir = @opendir("../" . $board_config['avatar_gallery_path'] . "/" . $file);

					$avatar_row_count = 0;
					$avatar_col_count = 0;

					while( $sub_file = @readdir($sub_dir) )
					{
						if( preg_match("/(\.gif$|\.png$|\.jpg)$/is", $sub_file) )
						{
							$avatar_images[$file][$avatar_row_count][$avatar_col_count] = $file . "/" . $sub_file;

							$avatar_col_count++;
							if( $avatar_col_count == 5 )
							{
								$avatar_row_count++;
								$avatar_col_count = 0;
							}
						}
					}
				}
			}
	
			@closedir($dir);

			if( isset($HTTP_POST_VARS['avatarcategory']) )
			{
				$category = $HTTP_POST_VARS['avatarcategory'];
			}
			else
			{
				list($category, ) = each($avatar_images);
			}
			@reset($avatar_images);

			$s_categories = "";
			while( list($key) = each($avatar_images) )
			{
				$selected = ( $key == $category ) ? "selected=\"selected\"" : "";
				if( count($avatar_images[$key]) )
				{
					$s_categories .= '<option value="' . $key . '"' . $selected . '>' . ucfirst($key) . '</option>';
				}
			}

			$s_colspan = 0;
			for($i = 0; $i < count($avatar_images[$category]); $i++)
			{
				$template->assign_block_vars("avatar_row", array());

				$s_colspan = max($s_colspan, count($avatar_images[$category][$i]));

				for($j = 0; $j < count($avatar_images[$category][$i]); $j++)
				{
					$template->assign_block_vars("avatar_row.avatar_column", array(
						"AVATAR_IMAGE" => "../" . $board_config['avatar_gallery_path'] . "/" . $avatar_images[$category][$i][$j])
					);

					$template->assign_block_vars("avatar_row.avatar_option_column", array(
						"S_OPTIONS_AVATAR" => $avatar_images[$category][$i][$j])
					);
				}
			}

			$coppa = ( ( !$HTTP_POST_VARS['coppa'] && !$HTTP_GET_VARS['coppa'] ) || $mode == "register") ? 0 : TRUE;

			$s_hidden_fields = '<input type="hidden" name="mode" value="edit" /><input type="hidden" name="agreed" value="true" /><input type="hidden" name="coppa" value="' . $coppa . '" />';
			$s_hidden_fields .= '<input type="hidden" name="id" value="' . $user_id . '" />';

			$s_hidden_fields .= '<input type="hidden" name="username" value="' . str_replace("\"", "&quot;", $username) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="email" value="' . str_replace("\"", "&quot;", $email) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="icq" value="' . str_replace("\"", "&quot;", $icq) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="aim" value="' . str_replace("\"", "&quot;", $aim) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="msn" value="' . str_replace("\"", "&quot;", $msn) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="yim" value="' . str_replace("\"", "&quot;", $yim) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="website" value="' . str_replace("\"", "&quot;", $website) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="location" value="' . str_replace("\"", "&quot;", $location) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="location2" value="' . str_replace("\"", "&quot;", $location2) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="occupation" value="' . str_replace("\"", "&quot;", $occupation) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="interests" value="' . str_replace("\"", "&quot;", $interests) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="signature" value="' . str_replace("\"", "&quot;", $signature) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="viewemail" value="' . $viewemail . '" />';
			$s_hidden_fields .= '<input type="hidden" name="notifypm" value="' . $notifypm . '" />';
			$s_hidden_fields .= '<input type="hidden" name="popup_pm" value="' . $popuppm . '" />';
			$s_hidden_fields .= '<input type="hidden" name="notifyreply" value="' . $notifyreply . '" />';
			$s_hidden_fields .= '<input type="hidden" name="attachsig" value="' . $attachsig . '" />';
			$s_hidden_fields .= '<input type="hidden" name="allowhtml" value="' . $allowhtml . '" />';
			$s_hidden_fields .= '<input type="hidden" name="allowbbcode" value="' . $allowbbcode . '" />';
			$s_hidden_fields .= '<input type="hidden" name="allowsmilies" value="' . $allowsmilies . '" />';
			$s_hidden_fields .= '<input type="hidden" name="hideonline" value="' . !$allowviewonline . '" />';
			$s_hidden_fields .= '<input type="hidden" name="style" value="' . $user_style . '" />'; 
			$s_hidden_fields .= '<input type="hidden" name="language" value="' . $user_lang . '" />';
			$s_hidden_fields .= '<input type="hidden" name="timezone" value="' . $user_timezone . '" />';
			$s_hidden_fields .= '<input type="hidden" name="dateformat" value="' . str_replace("\"", "&quot;", $user_dateformat) . '" />';

			$s_hidden_fields .= '<input type="hidden" name="gender" value="' . $gender . '" />';
            $s_hidden_fields .= '<input type="hidden" name="birthday" value="'.$birthday.'" />';
            $s_hidden_fields .= '<input type="hidden" name="next_birthday_greeting" value="'.$next_birthday_greeting.'" />';
			$s_hidden_fields .= '<input type="hidden" name="realname" value="' . str_replace("\"", "&quot;", $realname) . '" />';
			$s_hidden_fields .= '<input type="hidden" name="zipcode1" value="' . $zipcode1 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="zipcode2" value="' . $zipcode2 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="jumin1" value="' . $jumin1 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="jumin2" value="' . $jumin2 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="mphone1" value="' . $mphone1 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="mphone2" value="' . $mphone2 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="mphone3" value="' . $mphone3 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="hphone1" value="' . $hphone1 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="hphone2" value="' . $hphone2 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="hphone3" value="' . $hphone3 . '" />';

			$s_hidden_fields .= '<input type="hidden" name="remark1" value="' . $remark1 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark2" value="' . $remark2 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark3" value="' . $remark3 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark4" value="' . $remark4 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark5" value="' . $remark5 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark6" value="' . $remark6 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark7" value="' . $remark7 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark8" value="' . $remark8 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark9" value="' . $remark9 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark10" value="' . $remark10 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark11" value="' . $remark11 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark12" value="' . $remark12 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark13" value="' . $remark13 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark14" value="' . $remark14 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark15" value="' . $remark15 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark16" value="' . $remark16 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark17" value="' . $remark17 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark18" value="' . $remark18 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark19" value="' . $remark19 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="remark20" value="' . $remark20 . '" />';

			$s_hidden_fields .= '<input type="hidden" name="user_status" value="' . $user_status . '" />';
			$s_hidden_fields .= '<input type="hidden" name="user_allowpm" value="' . $user_allowpm . '" />';
			$s_hidden_fields .= '<input type="hidden" name="user_allowavatar" value="' . $user_allowavatar . '" />';
			$s_hidden_fields .= '<input type="hidden" name="user_rank" value="' . $user_rank . '" />';

			$template->assign_vars(array(
				"L_USER_TITLE" => $lang['User_admin'],
				"L_USER_EXPLAIN" => $lang['User_admin_explain'],
				"L_AVATAR_GALLERY" => $lang['Avatar_gallery'], 
				"L_SELECT_AVATAR" => $lang['Select_avatar'], 
				"L_RETURN_PROFILE" => $lang['Return_profile'], 
				"L_CATEGORY" => $lang['Select_category'], 
				"L_GO" => $lang['Go'],

				"S_OPTIONS_CATEGORIES" => $s_categories, 
				"S_COLSPAN" => $s_colspan, 
				"S_PROFILE_ACTION" => append_sid("admin_users.$phpEx?mode=$mode"), 
				"S_HIDDEN_FIELDS" => $s_hidden_fields)
			);
		}
	}
	else
	{
		$s_hidden_fields = '<input type="hidden" name="mode" value="save" /><input type="hidden" name="agreed" value="true" /><input type="hidden" name="coppa" value="' . $coppa . '" />';
		$s_hidden_fields .= '<input type="hidden" name="id" value="' . $this_userdata['user_id'] . '" />';

		if( !empty($user_avatar_local) )
		{
			$s_hidden_fields .= '<input type="hidden" name="avatarlocal" value="' . $user_avatar_local . '" />';
		}

		if( $user_avatar_type )
		{
			switch( $user_avatar_type )
			{
				case USER_AVATAR_UPLOAD:
					$avatar = '<img src="../' . $board_config['avatar_path'] . '/' . $user_avatar . '" alt="" />';
					break;
				case USER_AVATAR_REMOTE:
					$avatar = '<img src="' . $user_avatar . '" alt="" />';
					break;
				case USER_AVATAR_GALLERY:
					$avatar = '<img src="../' . $board_config['avatar_gallery_path'] . '/' . $user_avatar . '" alt="" />';
					break;
			}
		}
		else
		{
			$avatar = "";
		}

		$sql = "SELECT * FROM " . RANKS_TABLE . "
			WHERE rank_special = 1
			ORDER BY rank_title";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not obtain ranks data', '', __LINE__, __FILE__, $sql);
		}

		$rank_select_box = '<option value="0">' . $lang['No_assigned_rank'] . '</option>';
		while( $row = $db->sql_fetchrow($result) )
		{
			$rank = $row['rank_title'];
			$rank_id = $row['rank_id'];
			
			$selected = ( $this_userdata['user_rank'] == $rank_id ) ? ' selected="selected"' : '';
			$rank_select_box .= '<option value="' . $rank_id . '"' . $selected . '>' . $rank . '</option>';
		}

		$template->set_filenames(array(
			"body" => "service/user_edit_body.tpl")
		);
		
        $s_b_day = '<select name="b_day" size="1" class="gensmall" size="1">
	       <option value="0">&nbsp;-&nbsp;</option>
	       <option value="1">&nbsp;1&nbsp;</option>
	       <option value="2">&nbsp;2&nbsp;</option>
	       <option value="3">&nbsp;3&nbsp;</option>
	       <option value="4">&nbsp;4&nbsp;</option>
	       <option value="5">&nbsp;5&nbsp;</option>
	       <option value="6">&nbsp;6&nbsp;</option>
	       <option value="7">&nbsp;7&nbsp;</option>
	       <option value="8">&nbsp;8&nbsp;</option>
	       <option value="9">&nbsp;9&nbsp;</option>
	       <option value="10">&nbsp;10&nbsp;</option>
	       <option value="11">&nbsp;11&nbsp;</option>
	       <option value="12">&nbsp;12&nbsp;</option>
	       <option value="13">&nbsp;13&nbsp;</option>
	       <option value="14">&nbsp;14&nbsp;</option>
	       <option value="15">&nbsp;15&nbsp;</option>
	       <option value="16">&nbsp;16&nbsp;</option>
	       <option value="17">&nbsp;17&nbsp;</option>
	       <option value="18">&nbsp;18&nbsp;</option>
	       <option value="19">&nbsp;19&nbsp;</option>
	       <option value="20">&nbsp;20&nbsp;</option>
	       <option value="21">&nbsp;21&nbsp;</option>
	       <option value="22">&nbsp;22&nbsp;</option>
	       <option value="23">&nbsp;23&nbsp;</option>
	       <option value="24">&nbsp;24&nbsp;</option>
	       <option value="25">&nbsp;25&nbsp;</option>
	       <option value="26">&nbsp;26&nbsp;</option>
	       <option value="27">&nbsp;27&nbsp;</option>
	       <option value="28">&nbsp;28&nbsp;</option>
	       <option value="29">&nbsp;29&nbsp;</option>
	       <option value="30">&nbsp;30&nbsp;</option>
	       <option value="31">&nbsp;31&nbsp;</option>
  	      </select>'.$lang['Day'];
      $s_b_md = '<select name="b_md" size="1" class="gensmall" size="1"}"> 
           <option value="0">&nbsp;-&nbsp;</option> 
           <option value="1">&nbsp;'.$lang['datetime']['January'].'&nbsp;</option> 
           <option value="2">&nbsp;'.$lang['datetime']['February'].'&nbsp;</option> 
           <option value="3">&nbsp;'.$lang['datetime']['March'].'&nbsp;</option> 
           <option value="4">&nbsp;'.$lang['datetime']['April'].'&nbsp;</option> 
           <option value="5">&nbsp;'.$lang['datetime']['May'].'&nbsp;</option> 
           <option value="6">&nbsp;'.$lang['datetime']['June'].'&nbsp;</option> 
           <option value="7">&nbsp;'.$lang['datetime']['July'].'&nbsp;</option> 
           <option value="8">&nbsp;'.$lang['datetime']['August'].'&nbsp;</option> 
           <option value="9">&nbsp;'.$lang['datetime']['September'].'&nbsp;</option> 
           <option value="10">&nbsp;'.$lang['datetime']['October'].'&nbsp;</option> 
           <option value="11">&nbsp;'.$lang['datetime']['November'].'&nbsp;</option> 
           <option value="12">&nbsp;'.$lang['datetime']['December'].'&nbsp;</option> 
          </select>'.'&nbsp;'.$lang['Month'].'&nbsp;&nbsp;'; 
       $s_b_day= str_replace("value=\"".$b_day."\">", "value=\"".$b_day."\" SELECTED>" ,$s_b_day);
       $s_b_md = str_replace("value=\"".$b_md."\">", "value=\"".$b_md."\" SELECTED>" ,$s_b_md);
       $s_b_year = '<input type="text" class="post"style="width: 40px"  name="b_year" size="4" maxlength="4" value="'.$b_year.'" />'.'&nbsp;'.$lang['Year'].'&nbsp;';
       $i=0;
       $s_birthday='';

       for ($i=0;$i<=strlen($lang['Submit_date_format']);$i++) { 

	        switch ($lang['Submit_date_format'][$i]) { 
           	    case d:  $s_birthday .=$s_b_day;break; 
        	    case m:  $s_birthday .=$s_b_md;break; 
      	        case Y:  $s_birthday .=$s_b_year;break; 
            }
        }		
        switch ($gender) { 
           case 1: $gender_male_checked="checked=\"checked\"";break; 
           case 2: $gender_female_checked="checked=\"checked\"";break; 
          default: $gender_male_checked="checked=\"checked\"";
        } 

		//
		// Let's do an overall check for settings/versions which would prevent
		// us from doing file uploads....
		//
		$ini_val = ( phpversion() >= '4.0.0' ) ? 'ini_get' : 'get_cfg_var';
		$form_enctype = ( !@$ini_val('file_uploads') || phpversion() == '4.0.4pl1' || !$board_config['allow_avatar_upload'] || ( phpversion() < '4.0.3' && @$ini_val('open_basedir') != '' ) ) ? '' : 'enctype="multipart/form-data"';

		$template->assign_vars(array(
			'USERNAME' => $username,
			'EMAIL' => $email,
			'YIM' => $yim,
			'ICQ' => $icq,
			'MSN' => $msn,
			'AIM' => $aim,
			'OCCUPATION' => user_select('occupation', $lang['Occ'], $occupation),
			'OCCUPATION_RAW' => $occupation,
			'INTERESTS' => $interests,
			'GENDER' => $gender, 
            'GENDER_NO_SPECIFY_CHECKED' => $gender_no_specify_checked, 
            'GENDER_MALE_CHECKED' => $gender_male_checked, 
            'GENDER_FEMALE_CHECKED' => $gender_female_checked,
			'LOCATION' => $location,
			'LOCATION2' => $location2,
			'WEBSITE' => $website,
			'SIGNATURE' => str_replace('<br />', "\n", $signature),
			'VIEW_EMAIL_YES' => ($viewemail) ? 'checked="checked"' : '',
			'VIEW_EMAIL_NO' => (!$viewemail) ? 'checked="checked"' : '',
			'HIDE_USER_YES' => (!$allowviewonline) ? 'checked="checked"' : '',
			'HIDE_USER_NO' => ($allowviewonline) ? 'checked="checked"' : '',
			'NOTIFY_PM_YES' => ($notifypm) ? 'checked="checked"' : '',
			'NOTIFY_PM_NO' => (!$notifypm) ? 'checked="checked"' : '',
			'POPUP_PM_YES' => ($popuppm) ? 'checked="checked"' : '',
			'POPUP_PM_NO' => (!$popuppm) ? 'checked="checked"' : '',
			'ALWAYS_ADD_SIGNATURE_YES' => ($attachsig) ? 'checked="checked"' : '',
			'ALWAYS_ADD_SIGNATURE_NO' => (!$attachsig) ? 'checked="checked"' : '',
			'NOTIFY_REPLY_YES' => ( $notifyreply ) ? 'checked="checked"' : '',
			'NOTIFY_REPLY_NO' => ( !$notifyreply ) ? 'checked="checked"' : '',
			'ALWAYS_ALLOW_BBCODE_YES' => ($allowbbcode) ? 'checked="checked"' : '',
			'ALWAYS_ALLOW_BBCODE_NO' => (!$allowbbcode) ? 'checked="checked"' : '',
			'ALWAYS_ALLOW_HTML_YES' => ($allowhtml) ? 'checked="checked"' : '',
			'ALWAYS_ALLOW_HTML_NO' => (!$allowhtml) ? 'checked="checked"' : '',
			'ALWAYS_ALLOW_SMILIES_YES' => ($allowsmilies) ? 'checked="checked"' : '',
			'ALWAYS_ALLOW_SMILIES_NO' => (!$allowsmilies) ? 'checked="checked"' : '',
			'AVATAR' => $avatar,
			'LANGUAGE_SELECT' => language_select($user_lang),
			'TIMEZONE_SELECT' => tz_select($user_timezone),
			'STYLE_SELECT' => style_select($user_style, 'style'),
			'DATE_FORMAT' => $user_dateformat,
			'ALLOW_PM_YES' => ($user_allowpm) ? 'checked="checked"' : '',
			'ALLOW_PM_NO' => (!$user_allowpm) ? 'checked="checked"' : '',
			'ALLOW_AVATAR_YES' => ($user_allowavatar) ? 'checked="checked"' : '',
			'ALLOW_AVATAR_NO' => (!$user_allowavatar) ? 'checked="checked"' : '',

       // 추가필드
            'REALNAME' => $realname,
            'ZIPCODE1' => $zipcode1,
            'ZIPCODE2' => $zipcode2,
            'JUMIN1' => $jumin1,
            'JUMIN2' => $jumin2,

            'MPHONE1' => user_select('mphone1', $lang['mphone'], $mphone1),
			'MPHONE1_RAW' => $mphone1,
            'MPHONE2' => $mphone2,
            'MPHONE3' => $mphone3,
            'HPHONE1' => user_select('hphone1', $lang['hphone'], $hphone1),
            'HPHONE1_RAW' => $hphone1,
            'HPHONE2' => $hphone2,
            'HPHONE3' => $hphone3,
				
			'B_YEAR_RAW' => $b_year,
			'B_MD_RAW' => $b_md,
			'B_DAY_RAW' => $b_day,

            'REMARK1' => $remark1,
            'REMARK2' => $remark2,
            'REMARK3' => $remark3,
            'REMARK4' => $remark4,
            'REMARK5' => $remark5,
			'REMARK6' => $remark6,
			'REMARK7' => $remark7,
			'REMARK8' => $remark8,
			'REMARK9' => $remark9,
			'REMARK10' => $remark10,
			'REMARK11' => $remark11,
			'REMARK12' => $remark12,
			'REMARK13' => $remark13,
			'REMARK14' => $remark14,
			'REMARK15' => $remark15,
			'REMARK16' => $remark16,
			'REMARK17' => $remark17,
			'REMARK18' => $remark18,
			'REMARK19' => $remark19,
			'REMARK20' => $remark20,		

			'USER_ACTIVE_YES' => ($user_status) ? 'checked="checked"' : '',
			'USER_ACTIVE_NO' => (!$user_status) ? 'checked="checked"' : '', 
			'RANK_SELECT_BOX' => $rank_select_box,

			'L_USERNAME' => $lang['Username'],
			'L_USER_TITLE' => $lang['User_admin'],
			'L_USER_EXPLAIN' => $lang['User_admin_explain'],
			'L_NEW_PASSWORD' => $lang['New_password'], 
			'L_PASSWORD_IF_CHANGED' => $lang['password_if_changed'],
			'L_CONFIRM_PASSWORD' => $lang['Confirm_password'],
			'L_PASSWORD_CONFIRM_IF_CHANGED' => $lang['password_confirm_if_changed'],
			'L_SUBMIT' => $lang['Submit'],
			'L_RESET' => $lang['Reset'],
			'L_ICQ_NUMBER' => $lang['ICQ'],
			'L_MESSENGER' => $lang['MSNM'],
			'L_YAHOO' => $lang['YIM'],
			'L_WEBSITE' => $lang['Website'],
			'L_AIM' => $lang['AIM'],
			'S_BIRTHDAY' => $s_birthday,
			'L_LOCATION' => $lang['Location'],
			'L_LOCATION2' => $lang['Location2'],
			'L_OCCUPATION' => $lang['Occupation'],
			'L_OCCUPATION' => $lang['Occupation'],
			'L_BOARD_LANGUAGE' => $lang['Board_lang'],
			'L_BOARD_STYLE' => $lang['Board_style'],
			'L_TIMEZONE' => $lang['Timezone'],
			'L_DATE_FORMAT' => $lang['Date_format'],
			'L_DATE_FORMAT_EXPLAIN' => $lang['Date_format_explain'],
			'L_YES' => $lang['Yes'],
			'L_NO' => $lang['No'],
			'L_INTERESTS' => $lang['Interests'],
			'L_GENDER' =>$lang['Gender'], 
            'L_GENDER_MALE' =>$lang['Male'], 
            'L_GENDER_FEMALE' =>$lang['Female'], 
            'L_GENDER_NOT_SPECIFY' =>$lang['No_gender_specify'],
            'L_BIRTHDAY' => $lang['Birthday'], 
			'L_ALWAYS_ALLOW_SMILIES' => $lang['Always_smile'],
			'L_ALWAYS_ALLOW_BBCODE' => $lang['Always_bbcode'],
			'L_ALWAYS_ALLOW_HTML' => $lang['Always_html'],
			'L_HIDE_USER' => $lang['Hide_user'],
			'L_ALWAYS_ADD_SIGNATURE' => $lang['Always_add_sig'],
			
			'L_SPECIAL' => $lang['User_special'],
			'L_SPECIAL_EXPLAIN' => $lang['User_special_explain'],
			'L_USER_ACTIVE' => $lang['User_status'],
			'L_ALLOW_PM' => $lang['User_allowpm'],
			'L_ALLOW_AVATAR' => $lang['User_allowavatar'],

   //추가 랭귀지
			'L_REALNAME' => $lang['realname'],
            'L_JUMIN' => $lang['Jumin'],
            'L_ZIPCODE' => $lang['Zipcode'],
            'L_MPHONE' => $lang['my_phone'],
            'L_HPHONE' => $lang['hand_phone'],
            'L_VIEW_PUBLIC' => $lang['view_public'],
            'L_VIEW_HIDDEN' => $lang['view_hidden'],

			"TITLE_REMARK1" => $board_config['title_remark1'],  
			"TITLE_REMARK2" => $board_config['title_remark2'],  
			"TITLE_REMARK3" => $board_config['title_remark3'],  
			"TITLE_REMARK4" => $board_config['title_remark4'],  
			"TITLE_REMARK5" => $board_config['title_remark5'],  
			"TITLE_REMARK6" => $board_config['title_remark6'],  
			"TITLE_REMARK7" => $board_config['title_remark7'],  
			"TITLE_REMARK8" => $board_config['title_remark8'],  
			"TITLE_REMARK9" => $board_config['title_remark9'],  
			"TITLE_REMARK10" => $board_config['title_remark10'],  
			"TITLE_REMARK11" => $board_config['title_remark11'],  
			"TITLE_REMARK12" => $board_config['title_remark12'],  
			"TITLE_REMARK13" => $board_config['title_remark13'],  
			"TITLE_REMARK14" => $board_config['title_remark14'],  
			"TITLE_REMARK15" => $board_config['title_remark15'],  
			"TITLE_REMARK16" => $board_config['title_remark16'],  
			"TITLE_REMARK17" => $board_config['title_remark17'],  
			"TITLE_REMARK18" => $board_config['title_remark18'],  
			"TITLE_REMARK19" => $board_config['title_remark19'],  
			"TITLE_REMARK20" => $board_config['title_remark20'],  
			
			'L_AVATAR_PANEL' => $lang['Avatar_panel'],
			'L_AVATAR_EXPLAIN' => $lang['Admin_avatar_explain'],
			'L_DELETE_AVATAR' => $lang['Delete_Image'],
			'L_CURRENT_IMAGE' => $lang['Current_Image'],
			'L_UPLOAD_AVATAR_FILE' => $lang['Upload_Avatar_file'],
			'L_UPLOAD_AVATAR_URL' => $lang['Upload_Avatar_URL'],
			'L_AVATAR_GALLERY' => $lang['Select_from_gallery'],
			'L_SHOW_GALLERY' => $lang['View_avatar_gallery'],
			'L_LINK_REMOTE_AVATAR' => $lang['Link_remote_Avatar'],

			'L_SIGNATURE' => $lang['Signature'],
			'L_SIGNATURE_EXPLAIN' => sprintf($lang['Signature_explain'], $board_config['max_sig_chars'] ),
			'L_NOTIFY_ON_PRIVMSG' => $lang['Notify_on_privmsg'],
			'L_NOTIFY_ON_REPLY' => $lang['Always_notify'],
			'L_POPUP_ON_PRIVMSG' => $lang['Popup_on_privmsg'],
			'L_PREFERENCES' => $lang['Preferences'],
			'L_PUBLIC_VIEW_EMAIL' => $lang['Public_view_email'],
			'L_ITEMS_REQUIRED' => $lang['Items_required'],
			'L_REGISTRATION_INFO' => $lang['Registration_info'],
			'L_PROFILE_INFO' => $lang['Profile_info'],
			'L_PROFILE_INFO_NOTICE' => $lang['Profile_info_warn'],
			'L_EMAIL_ADDRESS' => $lang['Email_address'],
			'S_FORM_ENCTYPE' => $form_enctype,

			'HTML_STATUS' => $html_status,
			'BBCODE_STATUS' => sprintf($bbcode_status, '<a href="../' . append_sid("faq.$phpEx?mode=bbcode") . '" target="_phpbbcode">', '</a>'), 
			'SMILIES_STATUS' => $smilies_status,

			'L_DELETE_USER' => $lang['User_delete'],
			'L_DELETE_USER_EXPLAIN' => $lang['User_delete_explain'],
			'L_SELECT_RANK' => $lang['Rank_title'],

			'S_HIDDEN_FIELDS' => $s_hidden_fields,
			'S_PROFILE_ACTION' => append_sid("admin_users.$phpEx"))
		);

		if( file_exists(@phpbb_realpath('./../' . $board_config['avatar_path'])) && ($board_config['allow_avatar_upload'] == TRUE) )
		{
			if ( $form_enctype != '' )
			{
				$template->assign_block_vars('avatar_local_upload', array() );
			}
			$template->assign_block_vars('avatar_remote_upload', array() );
		}

		if( file_exists(@phpbb_realpath('./../' . $board_config['avatar_gallery_path'])) && ($board_config['allow_avatar_local'] == TRUE) )
		{
			$template->assign_block_vars('avatar_local_gallery', array() );
		}
		
		if( $board_config['allow_avatar_remote'] == TRUE )
		{
			$template->assign_block_vars('avatar_remote_link', array() );
		}
	}

	$template->pparse('body');
}
else
{
	//
	// Default user selection box
	//
	$template->set_filenames(array(
		'body' => 'service/user_select_body.tpl')
	);

	$template->assign_vars(array(
		'L_USER_TITLE' => $lang['User_admin'],
		'L_USER_EXPLAIN' => $lang['User_admin_explain'],
		'L_USER_SELECT' => $lang['Select_a_User'],
		'L_LOOK_UP' => $lang['Look_up_user'],
		'L_FIND_USERNAME' => $lang['Find_username'],

		'U_SEARCH_USER' => append_sid("./../search.$phpEx?mode=searchuser"), 

		'S_USER_ACTION' => append_sid("admin_users.$phpEx"),
		'S_USER_SELECT' => $select_list)
	);
	$template->pparse('body');

}

include('./page_footer_admin.'.$phpEx);

?>