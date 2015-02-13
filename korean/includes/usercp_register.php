<?php
/***************************************************************************
 *                            usercp_register.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: usercp_register.php,v 1.20.2.54 2003/07/18 16:34:01 acydburn Exp $
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

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
	exit;
}

$unhtml_specialchars_match = array('#&gt;#', '#&lt;#', '#&quot;#', '#&amp;#');
$unhtml_specialchars_replace = array('>', '<', '"', '&');

// Begin Unique Registration Hash MOD by pentapenguin (http://www.pentapenguin.com)
$registration_hash = md5($userdata['session_ip'] . $userdata['session_id']);
// End Unique Registration Hash MOD by pentapenguin

// ---------------------------------------
// Load agreement template since user has not yet
// agreed to registration conditions/coppa
//
function show_coppa()
{

	global $userdata, $template, $lang, $phpbb_root_path, $phpEx, $db, $registration_hash;

	###############################################

	$sql = "SELECT pt.post_subject, pt.post_text 
		FROM ". POSTS_TABLE . " p, " . POSTS_TEXT_TABLE . " pt  
		WHERE (pt.post_id = p.post_id) AND (p.forum_id = 87)
		ORDER BY p.post_id ASC 
		";

	if (!$result = $db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Could not query agreement information', '', __LINE__, __FILE__, $sql);
	}

	$agree_row = array();
	while ($row = $db->sql_fetchrow($result))
	{
		$agree_row[] = $row;
	}

	for ($i = 0; $i < count($agree_row); $i++)
	{

		$template->assign_block_vars('agree_row', array(
			'TITLE' => $agree_row[$i]['post_subject'],
			'TEXT' =>  unprepare_message($agree_row[$i]['post_text'])
			)
		);
	}

	###############################################

	$template->set_filenames(array(
		'body' => 'agreement.tpl')
	);

	$template->assign_vars(array(
		'REGISTRATION' => $lang['Registration'],
		'AGREEMENT' => str_replace("\n", "\n<br />\n", $agreementText),
		"AGREE_OVER_13" => $lang['Agree_over_13'],
		"AGREE_UNDER_13" => $lang['Agree_under_13'],
		'DO_NOT_AGREE' => $lang['Agree_not'],

		"U_AGREE_OVER13" => "profile.$phpEx?mode=register&amp;agreed=$registration_hash&amp;sid=" . $userdata['session_id'],
		"U_AGREE_UNDER13" => "profile.$phpEx?mode=register&amp;agreed=$registration_hash&amp;coppa=true&amp;sid=" . $userdata['session_id']
		//"U_AGREE_OVER13" => append_sid("profile.$phpEx?mode=register&amp;agreed=$registration_hash"),
		//"U_AGREE_UNDER13" => append_sid("profile.$phpEx?mode=register&amp;agreed=$registration_hash&amp;coppa=true")
		)
	);

	$template->pparse('body');

}

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
//------------------------------------------------------------------- 주민체크 펑션
function Check_jumin($jumin1,$jumin2) {
    $jumin = trim($jumin1 . $jumin2);
	$lastnumber = substr($jumin,12,1); 
	$add = '234567892345';
	$length = strlen($jumin); 
	$total = 0; 
	if ($length <> 13) {
		msg("주민등록번호 자릿수가 틀립니다.");
		exit;
	} 
	for ($i = 0; $i < 12; $i++) { 
		$total = $total + (substr($jumin,$i,1)*substr($add,$i,1)); 
	} 
	$rest = $total%11; 
	$result = 11 - $rest; 
	if ($result == 10) {$result = 0;}
	if ($result == 11) {$result = 1;} 
	if ($result <> $lastnumber) {
		msg("잘못된 주민등록번호 입니다.");
		exit;
	} 
} 
//--------------------------------------------------------------------- 전화번호 체크
function Check_phone($phone1,$phone2,$phone3,$str1,$str2) {
    Check_null($phone1, "${str2}를 선택해주시기 바랍니다.");
    Check_null($phone2, "${str1} 국번을 입력해주세요");
    Check_num($phone2, "${str1} 국번은 숫자로만 입력하셔야 합니다.");
    if (strlen($phone2) < 3) { msg("${str1} 국번은 3자리 이상 4 자리 이하의 숫자로 입력하셔야 합니다."); } 
    Check_null($phone3, "${str1} 번호를 입력해주세요");
    Check_num($phone3, "${str1} 번호는 숫자로만 입력하셔야 합니다.");
    if (strlen($phone3) < 4) { msg("${str1} 번호는 4자리 숫자로 입력하셔야 합니다."); } 
}
//--------------------------------------------------------------------- 공백체크
function Check_null($check,$str) {
	if ((empty($check)) || $check =='') {
	   msg("${str}");
	   exit;
	}
}
//--------------------------------------------------------------------- 숫자체크 
function Check_num($num,$str) {
	$num = trim($num);
	if (eregi("[^0-9]", $num)) { msg("입력오류 : ${str}"); }
}

//+-------------------------------------------------------------------+
//| 메인체크 폼                                                       |
//+-------------------------------------------------------------------+
function Check_Form() {
    global $board_config,$realname,$jumin1,$jumin2,$mphone1,$mphone2,$mphone3,$hphone1,
           $hphone2,$hphone3,$location,$location2,$occupation,$b_year,$b_md,$b_day;
// ------------------------------------------------------------------ 이름 체크
    if ($board_config['use_realname'] == 2) {
        $realname = trim($realname);
        if (!$realname) { msg("이름을 입력해주세요!"); }
	    if (ereg("(^[a-z]+([0-9a-z])$)", $realname)) {
		    msg("이름은 한글로 작성하셔야 합니다!");
		    exit;
        }
    }
// ------------------------------------------------------------------ 주민등록 번호 체크
    if ($board_config['use_jumin'] == 2) {
       (empty($jumin1) || empty($jumin2)) ? msg("주민등록번호를 입력하세요.") : Check_jumin($jumin1,$jumin2);
    }
    if (!empty($jumin1) || !empty($jumin2)) { Check_jumin($jumin1,$jumin2); }
// ------------------------------------------------------------------- 전화체크
    if ($board_config['use_mphone'] == 2) {
        Check_phone($mphone1,$mphone2,$mphone3,'전화','지역번호');
    } else {
        if (!empty($mphone1) || !empty($mphone2) || !empty($mphone3)) {
            Check_phone($mphone1,$mphone2,$mphone3,'전화','지역번호');
        }
    }
    if ($board_config['use_hphone'] == 2) {
        Check_phone($hphone1,$hphone2,$hphone3,'핸드폰','이동통신사');
    } else {
        if (!empty($hphone1) || !empty($hphone2) || !empty($hphone3)) {
            Check_phone($hphone1,$hphone2,$hphone3,'핸드폰','이동통신사');
        }
    }
// ------------------------------------------------------------------- 주소체크
    if($board_config['use_from'] == 2) {
       Check_null($location,'주소를 입력하지 않으셨습니다.');
       Check_null($location2,'나머지 주소를 입력하시기 바랍니다.');
    }
// ------------------------------------------------------------------- 직업체크
    if ($board_config['use_occ'] == 2) {
        Check_null($occupation,'직업을 선택 하시기 바랍니다.');
    }
// -------------------------------------------------------------------- 생일체크
    if ($board_config['use_birth'] == 2) {

        if (empty($b_year)) { msg("생년을 입력하세요."); }
        if (strlen($b_year) < 4) { msg("생년은 4자리 숫자로 입력하셔야 합니다."); }
        if (empty($b_md)) { msg("생월을 선택해주세요"); }
        if (empty($b_day)) { msg("생일을 선택해주세요"); }

    } else {

        if (!empty($b_year) || !empty($b_md) || !empty($b_day)) {
            if (strlen($b_year) < 4) { msg("생년은 4자리 숫자로 입력하셔야 합니다."); }
            else if (empty($b_md)) { msg("생월을 선택해주세요"); }
            else if (empty($b_day)) { msg("생일을 선택해주세요"); }
            else if ((empty($b_year)) && (!empty($b_md)) && (!empty($b_day))) { msg("생년을 입력해주세요"); } 
        }
    }
    return;
} 
//---------------------------------------------------------------------// 폼 체크 끝 //

//
// ---------------------------------------

$error = FALSE;
$page_title = ( $mode == 'editprofile' ) ? $lang['Edit_profile'] : $lang['Register'];

if ( $mode == 'register' && $HTTP_POST_VARS['agreed'] != $registration_hash && $HTTP_GET_VARS['agreed'] != $registration_hash )
{
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);

	show_coppa();

	include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
}

$coppa = ( empty($HTTP_POST_VARS['coppa']) && empty($HTTP_GET_VARS['coppa']) ) ? 0 : TRUE;

//
// Check and initialize some variables if needed
//
if (
	isset($HTTP_POST_VARS['submit']) ||
	isset($HTTP_POST_VARS['avatargallery']) ||
	isset($HTTP_POST_VARS['submitavatar']) ||
	isset($HTTP_POST_VARS['cancelavatar']) ||
	$mode == 'register' )
{

	// session id check
	if ($sid == '' || $sid != $userdata['session_id'])
	{
		message_die(GENERAL_ERROR, 'Invalid_session');
	}

	include($phpbb_root_path . 'includes/functions_validate.'.$phpEx);
	include($phpbb_root_path . 'includes/bbcode.'.$phpEx);
	include($phpbb_root_path . 'includes/functions_post.'.$phpEx);

	if ( $mode == 'editprofile' )
	{
		$user_id = intval($HTTP_POST_VARS['user_id']);
		$current_email = trim(htmlspecialchars($HTTP_POST_VARS['current_email']));
	}

	$strip_var_list = array('username' => 'username', 'confirm_code' => 'confirm_code', 'email' => 'email', 'icq' => 'icq', 'aim' => 'aim', 'msn' => 'msn', 'yim' => 'yim', 'website' => 'website', 'location' => 'location', 'location2' => 'location2', 'occupation' => 'occupation', 'remark1' => 'remark1', 'remark2' => 'remark2', 'remark3' => 'remark3', 'remark4' => 'remark4', 'remark5' => 'remark5', 'remark6' => 'remark6', 'remark7' => 'remark7', 'remark8' => 'remark8', 'remark9' => 'remark9', 'remark10' => 'remark10', 'remark11' => 'remark11', 'remark12' => 'remark12', 'remark13' => 'remark13', 'remark14' => 'remark14', 'remark15' => 'remark15', 'remark16' => 'remark16', 'remark17' => 'remark17', 'remark18' => 'remark18', 'remark19' => 'remark19', 'remark20' => 'remark20', 'interests' => 'interests');

	// Strip all tags from data ... may p**s some people off, bah, strip_tags is
	// doing the job but can still break HTML output ... have no choice, have
	// to use htmlspecialchars ... be prepared to be moaned at.
	while( list($var, $param) = @each($strip_var_list) )
	{
		if ( !empty($HTTP_POST_VARS[$param]) )
		{
			$$var = trim(htmlspecialchars($HTTP_POST_VARS[$param]));
		}
	}

	$trim_var_list = array('cur_password' => 'cur_password', 'new_password' => 'new_password', 'password_confirm' => 'password_confirm', 'signature' => 'signature');

	while( list($var, $param) = @each($trim_var_list) )
	{
		if ( !empty($HTTP_POST_VARS[$param]) )
		{
			$$var = trim($HTTP_POST_VARS[$param]);
		}
	}

	$signature = str_replace('<br />', "\n", $signature);

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


	// Run some validation on the optional fields. These are pass-by-ref, so they'll be changed to
	// empty strings if they fail.
	validate_optional_fields($icq, $aim, $msn, $yim, $website);

	$viewemail = ( isset($HTTP_POST_VARS['viewemail']) ) ? ( ($HTTP_POST_VARS['viewemail']) ? TRUE : 0 ) : 0;
	$allowviewonline = ( isset($HTTP_POST_VARS['hideonline']) ) ? ( ($HTTP_POST_VARS['hideonline']) ? 0 : TRUE ) : TRUE;
	$notifyreply = ( isset($HTTP_POST_VARS['notifyreply']) ) ? ( ($HTTP_POST_VARS['notifyreply']) ? TRUE : 0 ) : 0;
	$notifypm = ( isset($HTTP_POST_VARS['notifypm']) ) ? ( ($HTTP_POST_VARS['notifypm']) ? TRUE : 0 ) : TRUE;
	$popup_pm = ( isset($HTTP_POST_VARS['popup_pm']) ) ? ( ($HTTP_POST_VARS['popup_pm']) ? TRUE : 0 ) : TRUE;


	//added
	$realname = ( isset($HTTP_POST_VARS['realname']) ) ? $HTTP_POST_VARS['realname'] : '';
	$jumin1 = ( isset($HTTP_POST_VARS['jumin1']) ) ? $HTTP_POST_VARS['jumin1'] : '';
	$jumin2 = ( isset($HTTP_POST_VARS['jumin2']) ) ? $HTTP_POST_VARS['jumin2'] : '';
	$mphone1 = ( isset($HTTP_POST_VARS['mphone1']) ) ? intval ($HTTP_POST_VARS['mphone1']) : 0;
	$mphone2 = ( isset($HTTP_POST_VARS['mphone2']) ) ? $HTTP_POST_VARS['mphone2'] : '';
	$mphone3 = ( isset($HTTP_POST_VARS['mphone3']) ) ? $HTTP_POST_VARS['mphone3'] : '';
	$hphone1 = ( isset($HTTP_POST_VARS['hphone1']) ) ? intval ($HTTP_POST_VARS['hphone1']) : 0;
	$hphone2 = ( isset($HTTP_POST_VARS['hphone2']) ) ? $HTTP_POST_VARS['hphone2'] : '';
	$hphone3 = ( isset($HTTP_POST_VARS['hphone3']) ) ? $HTTP_POST_VARS['hphone3'] : '';
	$occupation = ( isset($HTTP_POST_VARS['occupation']) ) ? intval ($HTTP_POST_VARS['occupation']) : 0;
	$zipcode1 = ( isset($HTTP_POST_VARS['zipcode1']) ) ? $HTTP_POST_VARS['zipcode1'] : '';
	$zipcode2 = ( isset($HTTP_POST_VARS['zipcode2']) ) ? $HTTP_POST_VARS['zipcode2'] : '';	

    $gender = ( isset($HTTP_POST_VARS['gender']) ) ? intval ($HTTP_POST_VARS['gender']) : 0;


	if ( $mode == 'register' )
	{
		$attachsig = ( isset($HTTP_POST_VARS['attachsig']) ) ? ( ($HTTP_POST_VARS['attachsig']) ? TRUE : 0 ) : $board_config['allow_sig'];

		$allowhtml = ( isset($HTTP_POST_VARS['allowhtml']) ) ? ( ($HTTP_POST_VARS['allowhtml']) ? TRUE : 0 ) : $board_config['allow_html'];
		$allowbbcode = ( isset($HTTP_POST_VARS['allowbbcode']) ) ? ( ($HTTP_POST_VARS['allowbbcode']) ? TRUE : 0 ) : $board_config['allow_bbcode'];
		$allowsmilies = ( isset($HTTP_POST_VARS['allowsmilies']) ) ? ( ($HTTP_POST_VARS['allowsmilies']) ? TRUE : 0 ) : $board_config['allow_smilies'];
	}
	else
	{
		$attachsig = ( isset($HTTP_POST_VARS['attachsig']) ) ? ( ($HTTP_POST_VARS['attachsig']) ? TRUE : 0 ) : 0;

		$allowhtml = ( isset($HTTP_POST_VARS['allowhtml']) ) ? ( ($HTTP_POST_VARS['allowhtml']) ? TRUE : 0 ) : $userdata['user_allowhtml'];
		$allowbbcode = ( isset($HTTP_POST_VARS['allowbbcode']) ) ? ( ($HTTP_POST_VARS['allowbbcode']) ? TRUE : 0 ) : $userdata['user_allowbbcode'];
		$allowsmilies = ( isset($HTTP_POST_VARS['allowsmilies']) ) ? ( ($HTTP_POST_VARS['allowsmilies']) ? TRUE : 0 ) : $userdata['user_allowsmile'];
	}

	$user_style = ( isset($HTTP_POST_VARS['style']) ) ? intval($HTTP_POST_VARS['style']) : $board_config['default_style'];

	if ( !empty($HTTP_POST_VARS['language']) )
	{
		if ( preg_match('/^[a-z_]+$/i', $HTTP_POST_VARS['language']) )
		{
			$user_lang = htmlspecialchars($HTTP_POST_VARS['language']);
		}
		else
		{
			$error = true;
			$error_msg = $lang['Fields_empty'];
		}
	}
	else
	{
		$user_lang = $board_config['default_lang'];
	}

	$user_timezone = ( isset($HTTP_POST_VARS['timezone']) ) ? doubleval($HTTP_POST_VARS['timezone']) : $board_config['board_timezone'];

	$sql = "SELECT config_value
		FROM " . CONFIG_TABLE . "
		WHERE config_name = 'default_dateformat'";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not select default dateformat', '', __LINE__, __FILE__, $sql);
	}
	$row = $db->sql_fetchrow($result);
	$board_config['default_dateformat'] = $row['config_value'];
	$user_dateformat = ( !empty($HTTP_POST_VARS['dateformat']) ) ? trim(htmlspecialchars($HTTP_POST_VARS['dateformat'])) : $board_config['default_dateformat'];

	$user_avatar_local = ( isset($HTTP_POST_VARS['avatarselect']) && !empty($HTTP_POST_VARS['submitavatar']) && $board_config['allow_avatar_local'] ) ? $HTTP_POST_VARS['avatarselect'] : ( ( isset($HTTP_POST_VARS['avatarlocal'])  ) ? htmlspecialchars($HTTP_POST_VARS['avatarlocal']) : '' );

	$user_avatar_remoteurl = ( !empty($HTTP_POST_VARS['avatarremoteurl']) ) ? trim(htmlspecialchars($HTTP_POST_VARS['avatarremoteurl'])) : '';
	$user_avatar_upload = ( !empty($HTTP_POST_VARS['avatarurl']) ) ? trim($HTTP_POST_VARS['avatarurl']) : ( ( $HTTP_POST_FILES['avatar']['tmp_name'] != "none") ? $HTTP_POST_FILES['avatar']['tmp_name'] : '' );
	$user_avatar_name = ( !empty($HTTP_POST_FILES['avatar']['name']) ) ? $HTTP_POST_FILES['avatar']['name'] : '';
	$user_avatar_size = ( !empty($HTTP_POST_FILES['avatar']['size']) ) ? $HTTP_POST_FILES['avatar']['size'] : 0;
	$user_avatar_filetype = ( !empty($HTTP_POST_FILES['avatar']['type']) ) ? $HTTP_POST_FILES['avatar']['type'] : '';

	$user_avatar = ( empty($user_avatar_loc) && $mode == 'editprofile' ) ? $userdata['user_avatar'] : '';
	$user_avatar_type = ( empty($user_avatar_loc) && $mode == 'editprofile' ) ? $userdata['user_avatar_type'] : '';

	if ( (isset($HTTP_POST_VARS['avatargallery']) || isset($HTTP_POST_VARS['submitavatar']) || isset($HTTP_POST_VARS['cancelavatar'])) && (!isset($HTTP_POST_VARS['submit'])) )
	{
		$username = stripslashes($username);
		$email = stripslashes($email);
		$cur_password = htmlspecialchars(stripslashes($cur_password));
		$new_password = htmlspecialchars(stripslashes($new_password));
		$password_confirm = htmlspecialchars(stripslashes($password_confirm));

		$icq = stripslashes($icq);
		$aim = stripslashes($aim);
		$msn = stripslashes($msn);
		$yim = stripslashes($yim);

		$website = stripslashes($website);
		$location = stripslashes($location);
		$location2 = stripslashes($location2);
		$occupation = stripslashes($occupation);
		$interests = stripslashes($interests);
		$signature = stripslashes($signature);

		$user_lang = stripslashes($user_lang);
		$user_dateformat = stripslashes($user_dateformat);

		$remark1 = stripslashes($remark1);
		$remark2 = stripslashes($remark2);
		$remark3 = stripslashes($remark3);
		$remark4 = stripslashes($remark4);
		$remark5 = stripslashes($remark5);
		$remark6 = stripslashes($remark6);
		$remark7 = stripslashes($remark7);
		$remark8 = stripslashes($remark8);
		$remark9 = stripslashes($remark9);
		$remark10 = stripslashes($remark10);
		$remark11 = stripslashes($remark11);
		$remark12 = stripslashes($remark12);
		$remark13 = stripslashes($remark13);
		$remark14 = stripslashes($remark14);
		$remark15 = stripslashes($remark15);
		$remark16 = stripslashes($remark16);
		$remark17 = stripslashes($remark17);
		$remark18 = stripslashes($remark18);
		$remark19 = stripslashes($remark19);
		$remark20 = stripslashes($remark20);


		if ( !isset($HTTP_POST_VARS['cancelavatar']))
		{
			$user_avatar = $user_avatar_local;
			$user_avatar_type = USER_AVATAR_GALLERY;
		}
	}
}

//
// Let's make sure the user isn't logged in while registering,
// and ensure that they were trying to register a second time
// (Prevents double registrations)
//
if ($mode == 'register' && ($userdata['session_logged_in'] || $username == $userdata['username']))
{
	message_die(GENERAL_MESSAGE, $lang['Username_taken'], '', __LINE__, __FILE__);
}

//
// Did the user submit? In this case build a query to update the users profile in the DB
//

//----------------------------------------------------------------------------------
//  필드를  템플릿으로 제어하기위한 함수정의....
//----------------------------------------------------------------------------------
user_field($board_config['use_realname'],'switch_use_realname','switch_realname_req','switch_realname_ig');
if ($mode == 'register') {
	user_field($board_config['use_jumin'],'switch_use_jumin','switch_jumin_req','switch_jumin_ig');
}
else {
	user_field($board_config['use_jumin'],'switch_use_jumin_show','switch_jumin_req_show','switch_jumin_ig');
}
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
/**********************************************************************************/

if ( isset($HTTP_POST_VARS['submit']) )
{
	include($phpbb_root_path . 'includes/usercp_avatar.'.$phpEx);

	$passwd_sql = '';
	if ( $mode == 'editprofile' )
	{
		if ( $user_id != $userdata['user_id'] )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Wrong_Profile'];
		}
	}
	else if ( $mode == 'register' )
	{

       $mphone = addslashes($mphone1.'-'.$mphone2.'-'.$mphone3);
       $hphone = addslashes($hphone1.'-'.$hphone2.'-'.$hphone3);
       $location = addslashes($location . "/" . $location2);
       $zipcode = addslashes(trim($zipcode1 . '-' . $zipcode2));
       //----------------------------------------------------
       // 체크함수 호출.` -_-;
       //----------------------------------------------------
        Check_Form();

		if ( empty($username) || empty($new_password) || empty($password_confirm) || empty($email) )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Fields_empty'];
		}
	}

	if ($board_config['enable_confirm'] && $mode == 'register')
	{
		if (empty($HTTP_POST_VARS['confirm_id']))
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Confirm_code_wrong'];
		}
		else
		{
			$sql = 'SELECT code 
				FROM ' . CONFIRM_TABLE . " 
				WHERE confirm_id = '" . htmlspecialchars($HTTP_POST_VARS['confirm_id']) . "' 
					AND session_id = '" . $userdata['session_id'] . "'";
			if (!($result = $db->sql_query($sql)))
			{
				message_die(GENERAL_ERROR, 'Could not obtain confirmation code', __LINE__, __FILE__, $sql);
			}

			if ($row = $db->sql_fetchrow($result))
			{
				if ($row['code'] != $confirm_code)
				{
					$error = TRUE;
					$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Confirm_code_wrong'];
				}
				else
				{
					$sql = 'DELETE FROM ' . CONFIRM_TABLE . " 
						WHERE confirm_id = '" . htmlspecialchars($HTTP_POST_VARS['confirm_id']) . "' 
							AND session_id = '" . $userdata['session_id'] . "'";
					if (!$db->sql_query($sql))
					{
						message_die(GENERAL_ERROR, 'Could not delete confirmation code', __LINE__, __FILE__, $sql);
					}
				}
			}
			else
			{		
				$error = TRUE;
				$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $user->lang['Confirm_code_wrong'];
			}
			$db->sql_freeresult($result);
		}
	}

	$passwd_sql = '';
	if ( !empty($new_password) && !empty($password_confirm) )
	{
		if ( $new_password != $password_confirm )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Password_mismatch'];
		}
		else if ( strlen($new_password) > 32 )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Password_long'];
		}
		else
		{
			if ( $mode == 'editprofile' )
			{
				$sql = "SELECT user_password
					FROM " . USERS_TABLE . "
					WHERE user_id = $user_id";
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, 'Could not obtain user_password information', '', __LINE__, __FILE__, $sql);
				}

				$row = $db->sql_fetchrow($result);

				if ( $row['user_password'] != md5($cur_password) )
				{
					$error = TRUE;
					$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Current_password_mismatch'];
				}
			}

			if ( !$error )
			{
				$new_password = md5($new_password);
				$passwd_sql = "user_password = '$new_password', ";
			}
		}
	}
	else if ( ( empty($new_password) && !empty($password_confirm) ) || ( !empty($new_password) && empty($password_confirm) ) )
	{
		$error = TRUE;
		$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Password_mismatch'];
	}

	//
	// Do a ban check on this email address
	//
	if ( $email != $userdata['user_email'] || $mode == 'register' )
	{
		$result = validate_email($email);
		if ( $result['error'] )
		{
			$email = $userdata['user_email'];

			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $result['error_msg'];
		}

		if ( $mode == 'editprofile' )
		{
			$sql = "SELECT user_password
				FROM " . USERS_TABLE . "
				WHERE user_id = $user_id";
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not obtain user_password information', '', __LINE__, __FILE__, $sql);
			}

			$row = $db->sql_fetchrow($result);

			if ( $row['user_password'] != md5($cur_password) )
			{
				$email = $userdata['user_email'];

				$error = TRUE;
				$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Current_password_mismatch'];
			}
		}
	}

	$username_sql = '';
	if ( $board_config['allow_namechange'] || $mode == 'register' )
	{
		if ( empty($username) )
		{
			// Error is already triggered, since one field is empty.
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Username_disallowed'];
		}
		else if ( $username != $userdata['username'] || $mode == 'register' )
		{
			if (strtolower($username) != strtolower($userdata['username']))
			{
				$result = validate_username($username);
				if ( $result['error'] )
				{
					$error = TRUE;
					$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $result['error_msg'];
				}
			}

			if (!$error)
			{
				$username_sql = "username = '" . str_replace("\'", "''", $username) . "', ";
			}
		}
	}


	//jumin-check
	if ($mode == 'register' )
	{
		$result = validate_jumin($jumin1,$jumin2);
		if ( $result['error'] )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $result['error_msg'];
		}
	}

	if ( $signature != '' )
	{
		if ( strlen($signature) > $board_config['max_sig_chars'] )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Signature_too_long'];
		}

		if ( $signature_bbcode_uid == '' )
		{
			$signature_bbcode_uid = ( $allowbbcode ) ? make_bbcode_uid() : '';
		}
		$signature = prepare_message($signature, $allowhtml, $allowbbcode, $allowsmilies, $signature_bbcode_uid);
	}

	if ( $website != '' )
	{
		rawurlencode($website);
	}

	$avatar_sql = '';

	if ( isset($HTTP_POST_VARS['avatardel']) && $mode == 'editprofile' )
	{
		$avatar_sql = user_avatar_delete($userdata['user_avatar_type'], $userdata['user_avatar']);
	}

	if ( ( !empty($user_avatar_upload) || !empty($user_avatar_name) ) && $board_config['allow_avatar_upload'] )
	{
		if ( !empty($user_avatar_upload) )
		{
			$avatar_mode = ( !empty($user_avatar_name) ) ? 'local' : 'remote';
			$avatar_sql = user_avatar_upload($mode, $avatar_mode, $userdata['user_avatar'], $userdata['user_avatar_type'], $error, $error_msg, $user_avatar_upload, $user_avatar_name, $user_avatar_size, $user_avatar_filetype);
		}
		else if ( !empty($user_avatar_name) )
		{
			$l_avatar_size = sprintf($lang['Avatar_filesize'], round($board_config['avatar_filesize'] / 1024));

			$error = true;
			$error_msg .= ( ( !empty($error_msg) ) ? '<br />' : '' ) . $l_avatar_size;
		}
	}
	else if ( $user_avatar_remoteurl != '' && $board_config['allow_avatar_remote'] )
	{
		if ( @file_exists(@phpbb_realpath('./' . $board_config['avatar_path'] . '/' . $userdata['user_avatar'])) )
		{
			@unlink(@phpbb_realpath('./' . $board_config['avatar_path'] . '/' . $userdata['user_avatar']));
		}
		$avatar_sql = user_avatar_url($mode, $error, $error_msg, $user_avatar_remoteurl);
	}
	else if ( $user_avatar_local != '' && $board_config['allow_avatar_local'] )
	{
		if ( @file_exists(@phpbb_realpath('./' . $board_config['avatar_path'] . '/' . $userdata['user_avatar'])) )
		{
			@unlink(@phpbb_realpath('./' . $board_config['avatar_path'] . '/' . $userdata['user_avatar']));
		}
		$avatar_sql = user_avatar_gallery($mode, $error, $error_msg, $user_avatar_local);

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
}
	}

	if ( !$error )
	{
		if ( $avatar_sql == '' )
		{
			$avatar_sql = ( $mode == 'editprofile' ) ? '' : "'', " . USER_AVATAR_NONE;
		}

		if ( $mode == 'editprofile' )
		{
			if ( $email != $userdata['user_email'] && $board_config['require_activation'] != USER_ACTIVATION_NONE && $userdata['user_level'] != ADMIN )
			{
				$user_active = 0;

				$user_actkey = gen_rand_string(true);
				$key_len = 54 - ( strlen($server_url) );
				$key_len = ( $key_len > 6 ) ? $key_len : 6;
				$user_actkey = substr($user_actkey, 0, $key_len);

				if ( $userdata['session_logged_in'] )
				{
					session_end($userdata['session_id'], $userdata['user_id']);
				}
			}
			else
			{
				$user_active = 1;
				$user_actkey = '';
			}

        $mphone = addslashes($mphone1.'-'.$mphone2.'-'.$mphone3);
        $hphone = addslashes($hphone1.'-'.$hphone2.'-'.$hphone3);
        $location = addslashes($location . "/" . $location2);
        $zipcode = addslashes(trim($zipcode1 . '-' . $zipcode2));
        
       //----------------------------------------------------
       // 체크함수 호출.` -_-;
       //----------------------------------------------------
        Check_Form();

			$sql = "UPDATE " . USERS_TABLE . "
				SET " . $username_sql . $passwd_sql . "user_email = '" . str_replace("\'", "''", $email) ."', user_icq = '" . str_replace("\'", "''", $icq) . "', user_website = '" . str_replace("\'", "''", $website) . "', user_occ = '" . str_replace("\'", "''", $occupation) . "', user_from = '" . str_replace("\'", "''", $location) . "', user_interests = '" . str_replace("\'", "''", $interests) . "', user_sig = '" . str_replace("\'", "''", $signature) . "', user_sig_bbcode_uid = '$signature_bbcode_uid', user_viewemail = $viewemail, user_aim = '" . str_replace("\'", "''", str_replace(' ', '+', $aim)) . "', user_yim = '" . str_replace("\'", "''", $yim) . "', user_msnm = '" . str_replace("\'", "''", $msn) . "', user_attachsig = $attachsig, user_allowsmile = $allowsmilies, user_allowhtml = $allowhtml, user_allowbbcode = $allowbbcode, user_allow_viewonline = $allowviewonline, user_notify = $notifyreply, user_notify_pm = $notifypm, user_popup_pm = $popup_pm, user_timezone = $user_timezone, user_dateformat = '" . str_replace("\'", "''", $user_dateformat) . "', user_lang = '" . str_replace("\'", "''", $user_lang) . "', user_style = $user_style, user_active = $user_active, user_actkey = '" . str_replace("\'", "''", $user_actkey) . "'" . $avatar_sql . ", user_birthday='$birthday', user_gender=$gender, user_realname = '" . str_replace("\'", "''", $realname) . "', user_zipcode = '$zipcode', user_jumin1 = '$jumin1', user_jumin2 = '$jumin2', user_mphone = '$mphone', user_hphone = '$hphone', user_remark1 = '" . str_replace("\'", "''", $remark1) . "', user_remark2 = '" . str_replace("\'", "''", $remark2) . "', user_remark3 = '" . str_replace("\'", "''", $remark3) . "', user_remark4 = '" . str_replace("\'", "''", $remark4) . "', user_remark5 = '" . str_replace("\'", "''", $remark5) . "', user_remark6 = '" . str_replace("\'", "''", $remark6) ."', user_remark7 = '" . str_replace("\'", "''", $remark7) ."', user_remark8 = '" . str_replace("\'", "''", $remark8) ."', user_remark9 = '" . str_replace("\'", "''", $remark9) ."', user_remark10 = '" . str_replace("\'", "''", $remark10) ."', user_remark11 = '" . str_replace("\'", "''", $remark11) ."', user_remark12 = '" . str_replace("\'", "''", $remark12) ."', user_remark13 = '" . str_replace("\'", "''", $remark13) ."', user_remark14 = '" . str_replace("\'", "''", $remark14) ."', user_remark15 = '" . str_replace("\'", "''", $remark15) ."', user_remark16 = '" . str_replace("\'", "''", $remark16) ."', user_remark17 = '" . str_replace("\'", "''", $remark17) ."', user_remark18 = '" . str_replace("\'", "''", $remark18) ."', user_remark19 = '" . str_replace("\'", "''", $remark19) ."', user_remark20 = '" . str_replace("\'", "''", $remark20) ."'  
				WHERE user_id = $user_id";

			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not update users table', '', __LINE__, __FILE__, $sql);
			}

			if ( !$user_active )
			{
				//
				// The users account has been deactivated, send them an email with a new activation key
				//
				include($phpbb_root_path . 'includes/emailer.'.$phpEx);
				$emailer = new emailer($board_config['smtp_delivery']);

				$emailer->from($board_config['board_email']);
				$emailer->replyto($board_config['board_email']);

				$emailer->use_template('user_activate', stripslashes($user_lang));
				$emailer->email_address($email);
				$emailer->set_subject($lang['Reactivate']);

				$emailer->assign_vars(array(
					'SITENAME' => $board_config['sitename'],
					'USERNAME' => preg_replace($unhtml_specialchars_match, $unhtml_specialchars_replace, substr(str_replace("\'", "'", $username), 0, 25)),
					'EMAIL_SIG' => (!empty($board_config['board_email_sig'])) ? str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']) : '',

					'U_ACTIVATE' => $server_url . '?mode=activate&' . POST_USERS_URL . '=' . $user_id . '&act_key=' . $user_actkey)
				);
				$emailer->send();
				$emailer->reset();

				$message = $lang['Profile_updated_inactive'] . '<br /><br />' . sprintf($lang['Click_return_index'],  '<a href="' . append_sid("portal.$phpEx") . '">', '</a>');
			}
			else
			{
				$message = $lang['Profile_updated'] . '<br /><br />' . sprintf($lang['Click_return_index'],  '<a href="' . append_sid("portal.$phpEx") . '">', '</a>');
			}

			$template->assign_vars(array(
				"META" => '<meta http-equiv="refresh" content="5;url=' . append_sid("portal.$phpEx") . '">')
			);

			message_die(GENERAL_MESSAGE, $message);
		}
		else
		{
			$sql = "SELECT MAX(user_id) AS total
				FROM " . USERS_TABLE;
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not obtain next user_id information', '', __LINE__, __FILE__, $sql);
			}

			if ( !($row = $db->sql_fetchrow($result)) )
			{
				message_die(GENERAL_ERROR, 'Could not obtain next user_id information', '', __LINE__, __FILE__, $sql);
			}
			$user_id = $row['total'] + 1;

			//
			// Get current date
			//
			$sql = "INSERT INTO " . USERS_TABLE . "	(user_id, username, user_regdate, user_password, user_email, user_icq, user_website, user_occ, user_from, user_interests, user_sig, user_sig_bbcode_uid, user_avatar, user_avatar_type, user_viewemail, user_aim, user_yim, user_msnm, user_attachsig, user_allowsmile, user_allowhtml, user_allowbbcode, user_allow_viewonline, user_notify, user_notify_pm, user_popup_pm, user_timezone, user_dateformat, user_lang, user_style, user_gender, user_birthday, user_realname, user_zipcode, user_jumin1, user_jumin2, user_mphone, user_hphone, user_remark1, user_remark2, user_remark3, user_remark4, user_remark5, user_remark6, user_remark7, user_remark8, user_remark9, user_remark10, user_remark11, user_remark12, user_remark13, user_remark14, user_remark15, user_remark16, user_remark17, user_remark18, user_remark19, user_remark20, user_level, user_allow_pm, user_active, user_actkey)
				VALUES ($user_id, '" . str_replace("\'", "''", $username) . "', " . time() . ", '" . str_replace("\'", "''", $new_password) . "', '" . str_replace("\'", "''", $email) . "', '" . str_replace("\'", "''", $icq) . "', '" . str_replace("\'", "''", $website) . "', '" . str_replace("\'", "''", $occupation) . "', '" . str_replace("\'", "''", $location) . "', '" . str_replace("\'", "''", $interests) . "', '" . str_replace("\'", "''", $signature) . "', '$signature_bbcode_uid', $avatar_sql, $viewemail, '" . str_replace("\'", "''", str_replace(' ', '+', $aim)) . "', '" . str_replace("\'", "''", $yim) . "', '" . str_replace("\'", "''", $msn) . "', $attachsig, $allowsmilies, $allowhtml, $allowbbcode, $allowviewonline, $notifyreply, $notifypm, $popup_pm, $user_timezone, '" . str_replace("\'", "''", $user_dateformat) . "', '" . str_replace("\'", "''", $user_lang) . "', $user_style, '$gender', '$birthday', '$realname', '$zipcode', '$jumin1', '$jumin2', '$mphone', '$hphone', '$remark1', '$remark2', '$remark3', '$remark4', '$remark5', '$remark6', '$remark7', '$remark8', '$remark9', '$remark10', '$remark11', '$remark12', '$remark13', '$remark14', '$remark15', '$remark16', '$remark17', '$remark18', '$remark19', '$remark20', 0, 1,";

			if ( $board_config['require_activation'] == USER_ACTIVATION_SELF || $board_config['require_activation'] == USER_ACTIVATION_ADMIN || $coppa )
			{
				$user_actkey = gen_rand_string(true);
				$key_len = 54 - (strlen($server_url));
				$key_len = ( $key_len > 6 ) ? $key_len : 6;
				$user_actkey = substr($user_actkey, 0, $key_len);
				$sql .= "0, '" . str_replace("\'", "''", $user_actkey) . "')";
			}
			else
			{
				$sql .= "1, '')";
			}

			if ( !($result = $db->sql_query($sql, BEGIN_TRANSACTION)) )
			{
				message_die(GENERAL_ERROR, 'Could not insert data into users table', '', __LINE__, __FILE__, $sql);
			}

			$sql = "INSERT INTO " . GROUPS_TABLE . " (group_name, group_description, group_single_user, group_moderator)
				VALUES ('', 'Personal User', 1, 0)";
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not insert data into groups table', '', __LINE__, __FILE__, $sql);
			}

			$group_id = $db->sql_nextid();

			$sql = "INSERT INTO " . USER_GROUP_TABLE . " (user_id, group_id, user_pending)
				VALUES ($user_id, $group_id, 0)";
			if( !($result = $db->sql_query($sql, END_TRANSACTION)) )
			{
				message_die(GENERAL_ERROR, 'Could not insert data into user_group table', '', __LINE__, __FILE__, $sql);
			}

			if ( $coppa )
			{
				$message = $lang['COPPA'];
				$email_template = 'coppa_welcome_inactive';
			}
			else if ( $board_config['require_activation'] == USER_ACTIVATION_SELF )
			{
				$message = $lang['Account_inactive'];
				$email_template = 'user_welcome_inactive';
			}
			else if ( $board_config['require_activation'] == USER_ACTIVATION_ADMIN )
			{
				$message = $lang['Account_inactive_admin'];
				$email_template = 'admin_welcome_inactive';
			}
			else
			{
				$message = $lang['Account_added'];
				$email_template = 'user_welcome';
			}

			include($phpbb_root_path . 'includes/emailer.'.$phpEx);
			$emailer = new emailer($board_config['smtp_delivery']);

			$emailer->from($board_config['board_email']);
			$emailer->replyto($board_config['board_email']);

			$emailer->use_template($email_template, stripslashes($user_lang));
			$emailer->email_address($email);
			$emailer->set_subject(sprintf($lang['Welcome_subject'], $board_config['sitename']));

			if( $coppa )
			{
				$emailer->assign_vars(array(
					'SITENAME' => $board_config['sitename'],
					'WELCOME_MSG' => sprintf($lang['Welcome_subject'], $board_config['sitename']),
					'USERNAME' => preg_replace($unhtml_specialchars_match, $unhtml_specialchars_replace, substr(str_replace("\'", "'", $username), 0, 25)),
					'PASSWORD' => $password_confirm,
					'EMAIL_SIG' => str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']),

					'FAX_INFO' => $board_config['coppa_fax'],
					'MAIL_INFO' => $board_config['coppa_mail'],
					'EMAIL_ADDRESS' => $email,
					'ICQ' => $icq,
					'AIM' => $aim,
					'YIM' => $yim,
					'MSN' => $msn,
					'WEB_SITE' => $website,
					'FROM' => $location,
					'OCC' => $occupation,
					'INTERESTS' => $interests,
					'SITENAME' => $board_config['sitename']));
			}
			else
			{
				$emailer->assign_vars(array(
					'SITENAME' => $board_config['sitename'],
					'WELCOME_MSG' => sprintf($lang['Welcome_subject'], $board_config['sitename']),
					'USERNAME' => preg_replace($unhtml_specialchars_match, $unhtml_specialchars_replace, substr(str_replace("\'", "'", $username), 0, 25)),
					'PASSWORD' => $password_confirm,
					'EMAIL_SIG' => str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']),

					'U_ACTIVATE' => $server_url . '?mode=activate&' . POST_USERS_URL . '=' . $user_id . '&act_key=' . $user_actkey)
				);
			}

			$emailer->send();
			$emailer->reset();

			if ( $board_config['require_activation'] == USER_ACTIVATION_ADMIN )
			{
				$sql = "SELECT user_email, user_lang 
					FROM " . USERS_TABLE . "
					WHERE user_level = " . ADMIN;
				
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, 'Could not select Administrators', '', __LINE__, __FILE__, $sql);
				}
				
				while ($row = $db->sql_fetchrow($result))
				{
					$emailer->from($board_config['board_email']);
					$emailer->replyto($board_config['board_email']);
					
					$emailer->email_address(trim($row['user_email']));
					$emailer->use_template("admin_activate", $row['user_lang']);
					$emailer->set_subject($lang['New_account_subject']);

					$emailer->assign_vars(array(
						'USERNAME' => preg_replace($unhtml_specialchars_match, $unhtml_specialchars_replace, substr(str_replace("\'", "'", $username), 0, 25)),
						'EMAIL_SIG' => str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']),

						'U_ACTIVATE' => $server_url . '?mode=activate&' . POST_USERS_URL . '=' . $user_id . '&act_key=' . $user_actkey)
					);
					$emailer->send();
					$emailer->reset();
				}
				$db->sql_freeresult($result);
			}

			$message = $message . '<br /><br />' . sprintf($lang['Click_return_index'],  '<a href="' . append_sid("portal.$phpEx") . '">', '</a>');

			message_die(GENERAL_MESSAGE, $message);
		} // if mode == register
	}
} // End of submit


if ( $error )
{
	//
	// If an error occured we need to stripslashes on returned data
	//
	$username = stripslashes($username);
	$email = stripslashes($email);
	$new_password = '';
	$password_confirm = '';

	$icq = stripslashes($icq);
	$aim = str_replace('+', ' ', stripslashes($aim));
	$msn = stripslashes($msn);
	$yim = stripslashes($yim);

	$website = stripslashes($website);
	$location = stripslashes($location);
	$location2 = stripslashes($location2);
	$occupation = stripslashes($occupation);
	$interests = stripslashes($interests);
	$signature = stripslashes($signature);
	$signature = ($signature_bbcode_uid != '') ? preg_replace("/:(([a-z0-9]+:)?)$signature_bbcode_uid(=|\])/si", '\\3', $signature) : $signature;

	$user_lang = stripslashes($user_lang);
	$user_dateformat = stripslashes($user_dateformat);

}
else if ( $mode == 'editprofile' && !isset($HTTP_POST_VARS['avatargallery']) && !isset($HTTP_POST_VARS['submitavatar']) && !isset($HTTP_POST_VARS['cancelavatar']) )
{
	$user_id = $userdata['user_id'];
	$username = $userdata['username'];
	$email = $userdata['user_email'];
	$new_password = '';
	$password_confirm = '';

	$icq = $userdata['user_icq'];
	$aim = str_replace('+', ' ', $userdata['user_aim']);
	$msn = $userdata['user_msnm'];
	$yim = $userdata['user_yim'];

	$website = $userdata['user_website'];
    $from_ary = explode('/', $userdata['user_from']);
	$location = $from_ary[0];
	$location2 = $from_ary[1];
	$interests = $userdata['user_interests'];
	$gender = $userdata['user_gender'];
	$signature_bbcode_uid = $userdata['user_sig_bbcode_uid'];
	$signature = ($signature_bbcode_uid != '') ? preg_replace("/:(([a-z0-9]+:)?)$signature_bbcode_uid(=|\])/si", '\\3', $userdata['user_sig']) : $userdata['user_sig'];

	$remark1 = $userdata['user_remark1'];
	$remark2 = $userdata['user_remark2'];
	$remark3 = $userdata['user_remark3'];
	$remark4 = $userdata['user_remark4'];
	$remark5 = $userdata['user_remark5'];
	$remark6 = $userdata['user_remark6'];
	$remark7 = $userdata['user_remark7'];
	$remark8 = $userdata['user_remark8'];
	$remark9 = $userdata['user_remark9'];
	$remark10 = $userdata['user_remark10'];
	$remark11 = $userdata['user_remark11'];
	$remark12 = $userdata['user_remark12'];
	$remark13 = $userdata['user_remark13'];
	$remark14 = $userdata['user_remark14'];
	$remark15 = $userdata['user_remark15'];
	$remark16 = $userdata['user_remark16'];
	$remark17 = $userdata['user_remark17'];
	$remark18 = $userdata['user_remark18'];
	$remark19 = $userdata['user_remark19'];
	$remark20 = $userdata['user_remark20'];


if ($userdata['user_birthday']!=999999) {
	$birthday = realdate($lang['Submit_date_format'],$userdata['user_birthday']); 
	$b_day = realdate('j',$userdata['user_birthday']); 
	$b_md = realdate('n',$userdata['user_birthday']); 
	$b_year = realdate('Y',$userdata['user_birthday']); 

} else {

	$b_day = ''; 
	$b_md = ''; 
	$b_year = ''; 
	$birthday = ''; 
}
	$realname = $userdata['user_realname'];
	$occupation = $userdata['user_occ'];

    $jumin1 = $userdata['user_jumin1'];
    $jumin2 = $userdata['user_jumin2'];

    $zipcode_ary = explode("-", $userdata['user_zipcode']);
    $zipcode1 = $zipcode_ary[0];
    $zipcode2 = $zipcode_ary[1];

    $mphone_ary = explode("-", $userdata['user_mphone']);
    $mphone1 = $mphone_ary[0];
    $mphone2 = $mphone_ary[1];
    $mphone3 = $mphone_ary[2];

    $hphone_ary = explode("-", $userdata['user_hphone']);
    $hphone1 = $hphone_ary[0];
    $hphone2 = $hphone_ary[1];
    $hphone3 = $hphone_ary[2];

/***********************************************************************************/

	$viewemail = $userdata['user_viewemail'];
	$notifypm = $userdata['user_notify_pm'];
	$popup_pm = $userdata['user_popup_pm'];
	$notifyreply = $userdata['user_notify'];
	$attachsig = $userdata['user_attachsig'];
	$allowhtml = $userdata['user_allowhtml'];
	$allowbbcode = $userdata['user_allowbbcode'];
	$allowsmilies = $userdata['user_allowsmile'];
	$allowviewonline = $userdata['user_allow_viewonline'];

	$user_avatar = ( $userdata['user_allowavatar'] ) ? $userdata['user_avatar'] : '';
	$user_avatar_type = ( $userdata['user_allowavatar'] ) ? $userdata['user_avatar_type'] : USER_AVATAR_NONE;

	$user_style = $userdata['user_style'];
	$user_lang = $userdata['user_lang'];
	$user_timezone = $userdata['user_timezone'];
	$user_dateformat = $userdata['user_dateformat'];
}

//
// Default pages
//
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

//make_jumpbox('viewforum.'.$phpEx);

if ( $mode == 'editprofile' )
{
	if ( $user_id != $userdata['user_id'] )
	{
		$error = TRUE;
		$error_msg = $lang['Wrong_Profile'];
	}
}

if( isset($HTTP_POST_VARS['avatargallery']) && !$error )
{
	include($phpbb_root_path . 'includes/usercp_avatar.'.$phpEx);

	$avatar_category = ( !empty($HTTP_POST_VARS['avatarcategory']) ) ? $HTTP_POST_VARS['avatarcategory'] : '';

	$template->set_filenames(array(
		'body' => 'profile_avatar_gallery.tpl')
	);

	$allowviewonline = !$allowviewonline;

	display_avatar_gallery($mode, $avatar_category, $user_id, $email, $current_email, $coppa, $username, $email, &$new_password, &$cur_password, $password_confirm, $icq, $aim, $msn, $yim, $website, $location, $location2, $occupation, $interests, $signature, $viewemail, $notifypm, $popup_pm, $notifyreply, $attachsig, $allowhtml, $allowbbcode, $allowsmilies, $allowviewonline, $user_style, $user_lang, $user_timezone, $user_dateformat, $userdata['session_id'], $gender, $birthday, $realname, $zipcode1, $zipcode2, $jumin1, $jumin2, $mphone1, $mphone2, $mphone3, $hphone1, $hphone2, $hphone3, $remark1, $remark2, $remark3, $remark4, $remark5, $remark6, $remark7, $remark8, $remark9, $remark10, $remark11, $remark12, $remark13, $remark14, $remark15, $remark16, $remark17, $remark18, $remark19, $remark20);
}
else
{
	include($phpbb_root_path . 'includes/functions_selects.'.$phpEx);

	if ( !isset($coppa) )
	{
		$coppa = FALSE;
	}

	if ( !isset($user_template) )
	{
		$selected_template = $board_config['system_template'];
	}

	$avatar_img = '';
	if ( $user_avatar_type )
	{
		switch( $user_avatar_type )
		{
			case USER_AVATAR_UPLOAD:
				$avatar_img = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $user_avatar . '" alt="" />' : '';
				break;
			case USER_AVATAR_REMOTE:
				$avatar_img = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $user_avatar . '" alt="" />' : '';
				break;
			case USER_AVATAR_GALLERY:
				$avatar_img = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $user_avatar . '" alt="" />' : '';
				break;
		}
	}

	$s_hidden_fields = '<input type="hidden" name="sid" value="' . $userdata['session_id'] . '" /><input type="hidden" name="mode" value="' . $mode . '" /><input type="hidden" name="agreed" value="' . $registration_hash . '" /><input type="hidden" name="coppa" value="' . $coppa . '" />';
	if( $mode == 'editprofile' )
	{
		$s_hidden_fields .= '<input type="hidden" name="user_id" value="' . $userdata['user_id'] . '" />';
		//
		// Send the users current email address. If they change it, and account activation is turned on
		// the user account will be disabled and the user will have to reactivate their account.
		//
		$s_hidden_fields .= '<input type="hidden" name="current_email" value="' . $userdata['user_email'] . '" />';
	}

	if ( !empty($user_avatar_local) )
	{
		$s_hidden_fields .= '<input type="hidden" name="avatarlocal" value="' . $user_avatar_local . '" />';
	}

	$html_status =  ( $userdata['user_allowhtml'] && $board_config['allow_html'] ) ? $lang['HTML_is_ON'] : $lang['HTML_is_OFF'];
	$bbcode_status = ( $userdata['user_allowbbcode'] && $board_config['allow_bbcode']  ) ? $lang['BBCode_is_ON'] : $lang['BBCode_is_OFF'];
	$smilies_status = ( $userdata['user_allowsmile'] && $board_config['allow_smilies']  ) ? $lang['Smilies_are_ON'] : $lang['Smilies_are_OFF'];

    switch ($gender) { 
       case 1: $gender_male_checked="checked=\"checked\"";break; 
       case 2: $gender_female_checked="checked=\"checked\"";break; 
      default: $gender_male_checked="checked=\"checked\"";
    } 

	if ( $error )
	{
		$template->set_filenames(array(
			'reg_header' => 'error_body.tpl')
		);
		$template->assign_vars(array(
			'ERROR_MESSAGE' => "<font color=red>".$error_msg."</font>")
		);
		$template->assign_var_from_handle('ERROR_BOX', 'reg_header');
	}

    // 오리지날 템플릿
	$template->set_filenames(array(
		'body' => 'profile_add_body.tpl')
	);

	if ( $mode == 'editprofile' )
	{
		$template->assign_block_vars('switch_edit_profile', array());
	}

$s_b_day = '&nbsp;<select name="b_day" size="1" class="gensmall" size="1">
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
  	</select>&nbsp;'.$lang['Day'].' &nbsp; ' ;
$s_b_md = '&nbsp;<select name="b_md" size="1" class="gensmall" size="1"}"> 
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
    </select>&nbsp;'.$lang['Month'].''; 

$s_b_day= str_replace("value=\"".$b_day."\">", "value=\"".$b_day."\" SELECTED>" ,$s_b_day);
$s_b_md = str_replace("value=\"".$b_md."\">", "value=\"".$b_md."\" SELECTED>" ,$s_b_md);
$s_b_year = '<input type="text" class="post"style="width: 40px"  name="b_year" size="4" maxlength="4" value="'.$b_year.'" />'.'&nbsp;'.$lang['Year'].'&nbsp;';
$i=0;
$s_birthday='';

for ($i=0;$i<=strlen($lang['Submit_date_format']);$i++)  { 

	switch ($lang['Submit_date_format'][$i]) { 
       	case d:  $s_birthday .=$s_b_day;break; 
        	case m:  $s_birthday .=$s_b_md;break; 
      	case Y:  $s_birthday .=$s_b_year;break; 
   }
}

	if ( ($mode == 'register') || ($board_config['allow_namechange']) )
	{
		$template->assign_block_vars('switch_namechange_allowed', array());
	}
	else
	{
		$template->assign_block_vars('switch_namechange_disallowed', array());
	}

	if ($board_config['allow_sig'])
	{
		$template->assign_block_vars('switch_sig_allowed', array());
	}
	else
	{
		$template->assign_block_vars('switch_sig_disallowed', array());
	}

	if (!$board_config['privmsg_disable'])
	{
		$template->assign_block_vars('switch_privmsg_allowed', array());
	}
	else
	{
		$template->assign_block_vars('switch_privmsg_disallowed', array());
	}


	// Visual Confirmation
	$confirm_image = '';
	if (!empty($board_config['enable_confirm']) && $mode == 'register')
	{
		$sql = 'SELECT session_id 
			FROM ' . SESSIONS_TABLE; 
		if (!($result = $db->sql_query($sql)))
		{
			message_die(GENERAL_ERROR, 'Could not select session data', '', __LINE__, __FILE__, $sql);
		}

		if ($row = $db->sql_fetchrow($result))
		{
			$confirm_sql = '';
			do
			{
				$confirm_sql .= (($confirm_sql != '') ? ', ' : '') . "'" . $row['session_id'] . "'";
			}
			while ($row = $db->sql_fetchrow($result));
		
			$sql = 'DELETE FROM ' .  CONFIRM_TABLE . " 
				WHERE session_id NOT IN ($confirm_sql)";
			if (!$db->sql_query($sql))
			{
				message_die(GENERAL_ERROR, 'Could not delete stale confirm data', '', __LINE__, __FILE__, $sql);
			}
		}
		$db->sql_freeresult($result);

		$sql = 'SELECT COUNT(session_id) AS attempts 
			FROM ' . CONFIRM_TABLE . " 
			WHERE session_id = '" . $userdata['session_id'] . "'";
		if (!($result = $db->sql_query($sql)))
		{
			message_die(GENERAL_ERROR, 'Could not obtain confirm code count', '', __LINE__, __FILE__, $sql);
		}

		if ($row = $db->sql_fetchrow($result))
		{
			if ($row['attempts'] > 3)
			{
				message_die(GENERAL_MESSAGE, $lang['Too_many_registers']);
			}
		}
		$db->sql_freeresult($result);
		
		$confirm_chars = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',  'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',  'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9');

		list($usec, $sec) = explode(' ', microtime()); 
		mt_srand($sec * $usec); 

		$max_chars = count($confirm_chars) - 1;
		$code = '';
		for ($i = 0; $i < 6; $i++)
		{
			$code .= $confirm_chars[mt_rand(0, $max_chars)];
		}

		$confirm_id = md5(uniqid($user_ip));

		$sql = 'INSERT INTO ' . CONFIRM_TABLE . " (confirm_id, session_id, code) 
			VALUES ('$confirm_id', '". $userdata['session_id'] . "', '$code')";
		if (!$db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, 'Could not insert new confirm code information', '', __LINE__, __FILE__, $sql);
		}

		unset($code);
		
		$confirm_image = (@extension_loaded('zlib')) ? '<img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id") . '" alt="" title="" />' : '<img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id&amp;c=1") . '" alt="" title="" /><img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id&amp;c=2") . '" alt="" title="" /><img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id&amp;c=3") . '" alt="" title="" /><img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id&amp;c=4") . '" alt="" title="" /><img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id&amp;c=5") . '" alt="" title="" /><img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id&amp;c=6") . '" alt="" title="" />';
		$s_hidden_fields .= '<input type="hidden" name="confirm_id" value="' . $confirm_id . '" />';

		$template->assign_block_vars('switch_confirm', array());
	}

	//
	// Let's do an overall check for settings/versions which would prevent
	// us from doing file uploads....
	//
	$ini_val = ( phpversion() >= '4.0.0' ) ? 'ini_get' : 'get_cfg_var';
	$form_enctype = ( @$ini_val('file_uploads') == '0' || strtolower(@$ini_val('file_uploads') == 'off') || phpversion() == '4.0.4pl1' || !$board_config['allow_avatar_upload'] || ( phpversion() < '4.0.3' && @$ini_val('open_basedir') != '' ) ) ? '' : 'enctype="multipart/form-data"';

	$template->assign_vars(array(
		'USERNAME' => $username,
		'CUR_PASSWORD' => $cur_password,
		'NEW_PASSWORD' => $new_password,
		'PASSWORD_CONFIRM' => $password_confirm,
		'EMAIL' => $email,
		'CONFIRM_IMG' => $confirm_image, 
		'YIM' => $yim,
		'ICQ' => $icq,
		'MSN' => $msn,
		'AIM' => $aim,
		'INTERESTS' => $interests,
		'S_BIRTHDAY' => $s_birthday,
		'LOCATION' => $location,
		'LOCATION2' => $location2,
        'LOCK_GENDER' =>($mode!='register') ? 'DISABLED':'', 
        'GENDER' => $gender, 
        'GENDER_NO_SPECIFY_CHECKED' => $gender_no_specify_checked, 
        'GENDER_MALE_CHECKED' => $gender_male_checked, 
        'GENDER_FEMALE_CHECKED' => $gender_female_checked, 
		'WEBSITE' => $website,
		'SIGNATURE' => str_replace('<br />', "\n", $signature),
		'SIGNATURE_NO_HTML' => htmlspecialchars($signature),
		'VIEW_EMAIL_YES' => ( $viewemail ) ? 'checked="checked"' : '',
		'VIEW_EMAIL_NO' => ( !$viewemail ) ? 'checked="checked"' : '',
		'HIDE_USER_YES' => ( !$allowviewonline ) ? 'checked="checked"' : '',
		'HIDE_USER_NO' => ( $allowviewonline ) ? 'checked="checked"' : '',
		'NOTIFY_PM_YES' => ( $notifypm ) ? 'checked="checked"' : '',
		'NOTIFY_PM_NO' => ( !$notifypm ) ? 'checked="checked"' : '',
		'NOTIFY_PM' => $notifypm,
		'POPUP_PM_YES' => ( $popup_pm ) ? 'checked="checked"' : '',
		'POPUP_PM_NO' => ( !$popup_pm ) ? 'checked="checked"' : '',
		'POPUP_PM' => $popup_pm,
		'ALWAYS_ADD_SIGNATURE_YES' => ( $attachsig ) ? 'checked="checked"' : '',
		'ALWAYS_ADD_SIGNATURE_NO' => ( !$attachsig ) ? 'checked="checked"' : '',
		'ALWAYS_ADD_SIGNATURE' => $attachsig,
		'NOTIFY_REPLY_YES' => ( $notifyreply ) ? 'checked="checked"' : '',
		'NOTIFY_REPLY_NO' => ( !$notifyreply ) ? 'checked="checked"' : '',
		'ALWAYS_ALLOW_BBCODE' => $allowbbcode,
		'ALWAYS_ALLOW_HTML' => $allowhtml,
		'ALWAYS_ALLOW_SMILIES' => $allowsmilies,
		
		'ALLOW_AVATAR' => $board_config['allow_avatar_upload'],
		'AVATAR' => $avatar_img,
		'AVATAR_SIZE' => $board_config['avatar_filesize'],
		
		//'LANGUAGE_SELECT' => language_select($user_lang, 'language'),
		//'STYLE_SELECT' => style_select($user_style, 'style'),
		//'TIMEZONE_SELECT' => tz_select($user_timezone, 'timezone'),
		//'DATE_FORMAT' => $user_dateformat,

		'LANGUAGE_SELECT' => $user_lang,
		'STYLE_SELECT' => $user_style,
		'TIMEZONE_SELECT' => $user_timezone,
		'DATE_FORMAT' => $user_dateformat,

		'HTML_STATUS' => $html_status,
		'BBCODE_STATUS' => sprintf($bbcode_status, '<a href="' . append_sid("faq.$phpEx?mode=bbcode") . '" target="_phpbbcode">', '</a>'),
		'SMILIES_STATUS' => $smilies_status,

		'OCCUPATION' => user_select('occupation', $lang['Occ'], $occupation),
		'OCCUPATION_RAW' => $occupation,
        'REALNAME' => $realname,

        'JUMIN1' => $jumin1,
        'JUMIN2' => $jumin2,
        'ZIPCODE1' => $zipcode1,
        'ZIPCODE2' => $zipcode2,
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

		'L_EMAIL_DESC' => $lang['email_desc'],
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


		'L_CURRENT_PASSWORD' => $lang['Current_password'],
		'L_NEW_PASSWORD' => ( $mode == 'register' ) ? $lang['Password'] : $lang['New_password'],
		'L_CONFIRM_PASSWORD' => $lang['Confirm_password'],
		'L_CONFIRM_PASSWORD_EXPLAIN' => ( $mode == 'editprofile' ) ? $lang['Confirm_password_explain'] : '',
		'L_PASSWORD_IF_CHANGED' => ( $mode == 'editprofile' ) ? $lang['password_if_changed'] : '',
		'L_PASSWORD_CONFIRM_IF_CHANGED' => ( $mode == 'editprofile' ) ? $lang['password_confirm_if_changed'] : '',
		'L_SUBMIT' => $lang['Submit'],
		'L_RESET' => $lang['Reset'],
		'L_ICQ_NUMBER' => $lang['ICQ'],
		'L_MESSENGER' => $lang['MSNM'],
		'L_YAHOO' => $lang['YIM'],
		'L_WEBSITE' => $lang['Website'],
		'L_AIM' => $lang['AIM'],
		'L_LOCATION' => $lang['Location'],
		'L_LOCATION2' => $lang['Location2'],
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
        'L_BIRTHDAY_EX' => $lang['Birthday_explain'],
        'L_BIRTHDAY' => $lang['Birthday'],
		'L_ALWAYS_ALLOW_SMILIES' => $lang['Always_smile'],
		'L_ALWAYS_ALLOW_BBCODE' => $lang['Always_bbcode'],
		'L_ALWAYS_ALLOW_HTML' => $lang['Always_html'],
		'L_HIDE_USER' => $lang['Hide_user'],
		'L_ALWAYS_ADD_SIGNATURE' => $lang['Always_add_sig'],

		'L_AVATAR_PANEL' => $lang['Avatar_panel'],
		'L_AVATAR_EXPLAIN' => sprintf($lang['Avatar_explain'], $board_config['avatar_max_width'], $board_config['avatar_max_height'], (round($board_config['avatar_filesize'] / 1024))),
		'L_UPLOAD_AVATAR_FILE' => $lang['Upload_Avatar_file'],
		'L_UPLOAD_AVATAR_URL' => $lang['Upload_Avatar_URL'],
		'L_UPLOAD_AVATAR_URL_EXPLAIN' => $lang['Upload_Avatar_URL_explain'],
		'L_AVATAR_GALLERY' => $lang['Select_from_gallery'],
		'L_SHOW_GALLERY' => $lang['View_avatar_gallery'],
		'L_LINK_REMOTE_AVATAR' => $lang['Link_remote_Avatar'],
		'L_LINK_REMOTE_AVATAR_EXPLAIN' => $lang['Link_remote_Avatar_explain'],
		'L_DELETE_AVATAR' => $lang['Delete_Image'],
		'L_CURRENT_IMAGE' => $lang['Current_Image'],

		'L_SIGNATURE' => $lang['Signature'],
		'L_SIGNATURE_EXPLAIN' => sprintf($lang['Signature_explain'], $board_config['max_sig_chars']),
		'L_NOTIFY_ON_REPLY' => $lang['Always_notify'],
		'L_NOTIFY_ON_REPLY_EXPLAIN' => $lang['Always_notify_explain'],
		'L_NOTIFY_ON_PRIVMSG' => $lang['Notify_on_privmsg'],
		'L_POPUP_ON_PRIVMSG' => $lang['Popup_on_privmsg'],
		'L_POPUP_ON_PRIVMSG_EXPLAIN' => $lang['Popup_on_privmsg_explain'],
		'L_PREFERENCES' => $lang['Preferences'],
		'L_PUBLIC_VIEW_EMAIL' => $lang['Public_view_email'],
		'L_ITEMS_REQUIRED' => $lang['Items_required'],
		'L_REGISTRATION_INFO' => $lang['Registration_info'],
		'L_PROFILE_INFO' => $lang['Profile_info'],
		'L_PROFILE_INFO_NOTICE' => $lang['Profile_info_warn'],
		'L_EMAIL_ADDRESS' => $lang['Email_address'],

		'L_CONFIRM_CODE_IMPAIRED'	=> sprintf($lang['Confirm_code_impaired'], '<a href="mailto:' . $board_config['board_email'] . '">', '</a>'), 
		'L_CONFIRM_CODE'			=> $lang['Confirm_code'], 
		'L_CONFIRM_CODE_EXPLAIN'	=> $lang['Confirm_code_explain'], 

		'S_ALLOW_AVATAR_UPLOAD' => $board_config['allow_avatar_upload'],
		'S_ALLOW_AVATAR_LOCAL' => $board_config['allow_avatar_local'],
		'S_ALLOW_AVATAR_REMOTE' => $board_config['allow_avatar_remote'],
		'S_HIDDEN_FIELDS' => $s_hidden_fields,
		'S_FORM_ENCTYPE' => $form_enctype,
		'S_PROFILE_ACTION' => append_sid("profile.$phpEx"))
	);

	//
	// This is another cheat using the block_var capability
	// of the templates to 'fake' an IF...ELSE...ENDIF solution
	// it works well :)
	//
	if ( $mode != 'register' )
	{
		if ( $userdata['user_allowavatar'] && ( $board_config['allow_avatar_upload'] || $board_config['allow_avatar_local'] || $board_config['allow_avatar_remote'] ) )
		{
			$template->assign_block_vars('switch_avatar_block', array() );

			if ( $board_config['allow_avatar_upload'] && file_exists(@phpbb_realpath('./' . $board_config['avatar_path'])) )
			{
				if ( $form_enctype != '' )
				{
					$template->assign_block_vars('switch_avatar_block.switch_avatar_local_upload', array() );
				}
				$template->assign_block_vars('switch_avatar_block.switch_avatar_remote_upload', array() );
			}

			if ( $board_config['allow_avatar_remote'] )
			{
				$template->assign_block_vars('switch_avatar_block.switch_avatar_remote_link', array() );
			}

			if ( $board_config['allow_avatar_local'] && file_exists(@phpbb_realpath('./' . $board_config['avatar_gallery_path'])) )
			{
				$template->assign_block_vars('switch_avatar_block.switch_avatar_local_gallery', array() );
			}
		}
	}
}

$template->pparse('body');

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>