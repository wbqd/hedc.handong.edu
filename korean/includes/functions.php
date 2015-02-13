<?php
/***************************************************************************
 *                               functions.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: functions.php,v 1.10 2003/08/30 15:05:45 acydburn Exp $
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


//--------------------------------------------------------------------- 셀렉트 
function user_pub_ary($pub_ary,$lang_ary,$ary_query) {// 셀렉션 테이타의 배열을 리턴.

   global $lang;
   if (!isset($pub_ary)) {
        while(list($value, $key) = @each($lang_ary)) {
	       if ($value == $ary_query) {
	           $pub_ary = $key;
           }
        }
    }
    return $pub_ary;
}
//--------------------------------------------------------------------- 이름
function perm_realname($perm_data) {

    global $pub_img,$userdata; 
    if (!empty($perm_data['user_realname'])) {
        $realname = $perm_data['user_realname'];
    } else $realname = $pub_img[0];
    return $realname;
}
//--------------------------------------------------------------------- 성별
function perm_gender($perm_data) {
// 주민등록번호를 먼저 체크하고 주민번호가 없거나 null 일 경우 젠더로 성별 추출.
    global $pub_img,$userdata;

    if (empty($perm_data['user_jumin2']) && empty($perm_data['user_gender'])) {
        $gender = $pub_img[0]; 
    } else if (true) {
           if (!empty($perm_data['user_jumin2'])) {
               $gender = substr($perm_data['user_jumin2'], 0, 1);
               $gender = ($gender == '1' || $gender == '3') ? $pub_img[2] : $pub_img[3];
           } else {
               if (!empty($perm_data['user_gender'])) {
                   $gender = ($perm_data['user_gender'] == 1) ? $pub_img[2] : $pub_img[3];
               } else $gender = "$pub_img[0]";
           }
    } else $gender = $pub_img[1]; 
    return $gender;
}
//---------------------------------------------------------------------- 생일/나이
function perm_birth_age($perm_data,$var) {

    global $pub_img,$lang,$userdata; 
    if ($perm_data['user_birthday']!=999999 && $perm_data['user_birthday']!=0) {
        $user_age = user_age($perm_data);
        $birthday = realdate($lang['DATE_FORMAT'], $perm_data['user_birthday']);
    } else {
        $user_age = $pub_img[0];
        $birthday = $pub_img[0];
    } 
    return ($var == 'B') ? "$birthday" : "$user_age";
}
//---------------------------------------------------------------------- 주소
function perm_from($perm_data,$var) {

    global $pub_img,$userdata;
    $from_ary = explode(" ", str_replace("/", " ", $perm_data['user_from']));
    if (!empty($perm_data['user_from']) && $perm_data['user_from'] !='/' && !empty($perm_data['user_zipcode'])) {
        $location  = str_replace("/", " ", $perm_data['user_from']).'&nbsp;'.'[우:'.$perm_data['user_zipcode'].']';
        $locations = $from_ary[0].'&nbsp;'.$from_ary[1];
    } else {
        $location  = $pub_img[0];
        $locations = $pub_img[0];
    }
    return ($var == 'S') ? "$locations" : "$location";
}
//----------------------------------------------------------------------- 직업
function perm_occ($perm_data) {

    global $pub_img,$lang,$userdata; 
    if (!empty($perm_data['user_occ'])) {
        $occupation = user_pub_ary($occupation, $lang['Occ'], $perm_data['user_occ']);
    } else $occupation = $pub_img[0];
    return $occupation;
}
//------------------------------------------------------------------------ 전화번호
function perm_mphone($perm_data) {

    global $pub_img,$lang,$userdata; 
    $phone_ary = explode("-", $perm_data['user_mphone']);
    if (!empty($phone_ary[0]) && !empty($phone_ary[1]) && !empty($phone_ary[2])) {
        $mphone = user_pub_ary($mphone1,$lang['mphone'],$phone_ary[0]) . ' - ' . $phone_ary[1] . ' - ' . $phone_ary[2];
    } else $mphone = $pub_img[0]; 
    return $mphone;
}
//-------------------------------------------------------------------------- 핸드폰
function perm_hphone($perm_data) {

    global $pub_img,$lang,$userdata; 
    $phone_ary = explode("-", $perm_data['user_hphone']);
    if (!empty($phone_ary[0]) && !empty($phone_ary[1]) && !empty($phone_ary[2])) {
        $hphone = user_pub_ary($hphone1,$lang['hphone'],$phone_ary[0]) . ' - ' . $phone_ary[1] . ' - ' . $phone_ary[2] ;
    } else $hphone = $pub_img[0]; 
    return $hphone;
}
//---------------------------------------------------------------------- 나이체크
function user_age($user_age) {

// 주민번호가 있을경우 주민등록 번호를 먼저 체크하여 나이를 리턴하고 null 일경우 
// 생일테이타를 체크하여 나이를 리턴한다..
    global $board_config;

    $age_g = substr($user_age['user_jumin2'], 0, 1); 
    $age_y = substr($user_age['user_jumin1'], 0, 2); 

    if (!empty($age_g)) {
        $age = date("Y", time()) - (1900+(intval($age_g/3)*100)+$age_y);
        if (isset($age)) $age++; 
        return $age; 

    } else {

        if ($user_age['user_birthday'] != 999999 || $user_age['user_birthday'] != 0) {
            $this_year = create_date('Y', time(), $board_config['board_timezone']); 
            $this_date = create_date('md', time(), $board_config['board_timezone']);
	        $birth=realdate('md', $user_age['user_birthday']);
            $age = $this_year - realdate ('Y',$user_age['user_birthday']); 
            if ($this_date < $birth) $age; 
                $age = $age; 
        }
    }
    return $age;
}
//***********************************************************************************
// 메세지 창 띄우기
//***********************************************************************************

function msg($message,$url="back") {
	echo "<script>window.alert('$message');";
    if ($url == "back") { echo "history.back()"; }
    else { echo "location.href='$url'"; }
    echo "</script>";
	exit;
}

//***********************************************************************************
// 문자열 자르기 
//***********************************************************************************

function str_cut($str, $len, $suffix) { 

   if ($len >= strlen($str)) return $str; 
       $klen = $len - 1; 
   while(ord($str[$klen]) & 0x80) $klen--; 

   return '<span title="'.$str.'">'. substr($str, 0, $len - (($len + $klen + 1) % 2)) . $suffix.'</span>';  
}

//*************************************************************************************
// Birthday Function
//*************************************************************************************

function mkrealdate($day,$month,$birth_year) 
{ 
   // range check months 
   if ($month<1 || $month>12) return "error"; 
   // range check days 
   switch ($month) 
   { 
      case 1: if ($day>31) return "error";break; 
      case 2: if ($day>29) return "error"; 
         $epoch=$epoch+31;break; 
      case 3: if ($day>31) return "error"; 
         $epoch=$epoch+59;break; 
      case 4: if ($day>30) return "error" ; 
         $epoch=$epoch+90;break; 
      case 5: if ($day>31) return "error"; 
         $epoch=$epoch+120;break; 
      case 6: if ($day>30) return "error"; 
         $epoch=$epoch+151;break; 
      case 7: if ($day>31) return "error"; 
         $epoch=$epoch+181;break; 
      case 8: if ($day>31) return "error"; 
         $epoch=$epoch+212;break; 
      case 9: if ($day>30) return "error"; 
         $epoch=$epoch+243;break; 
      case 10: if ($day>31) return "error"; 
         $epoch=$epoch+273;break; 
      case 11: if ($day>30) return "error"; 
         $epoch=$epoch+304;break; 
      case 12: if ($day>31) return "error"; 
         $epoch=$epoch+334;break; 
   } 
   $epoch=$epoch+$day; 
   $epoch_Y=sqrt(($birth_year-1970)*($birth_year-1970)); 
   $leapyear=round((($epoch_Y+2) / 4)-.5); 
   if (($epoch_Y+2)%4==0) 
   {// curent year is leapyear 
      $leapyear--; 
      if ($birth_year >1970 && $month>=3) $epoch=$epoch+1; 
      if ($birth_year <1970 && $month<3) $epoch=$epoch-1; 
   } else if ($month==2 && $day>28) return "error";//only 28 days in feb. 
   //year 
   if ($birth_year>1970) 
      $epoch=$epoch+$epoch_Y*365-1+$leapyear; 
   else 
      $epoch=$epoch-$epoch_Y*365-1-$leapyear; 
   return $epoch; 
} 

// Add function realdate for Birthday MOD 
// the originate php "date()", does not work proberly on all OS, especially when going back in time 
// before year 1970 (year 0), this function "realdate()", has a mutch larger valid date range, 
// from 1901 - 2099. it returns a "like" UNIX date format (only date, related letters may be used, due to the fact that
// the given date value should already be divided by 86400 - leaving no time information left) 
// a input like a UNIX timestamp divided by 86400 is expected, so 
// calculation from the originate php date and mktime is easy. 
// e.g. realdate ("m d Y", 3) returns the string "1 3 1970" 

// UNIX users should replace this function with the below code, since this should be faster
//
//function realdate($date_syntax="Ymd",$date=0) 
//{ return create_date($date_syntax,$date*86400,$board_config['board_timezone']); }

function realdate($date_syntax="Ymd",$date=0) 
{ 
	global $lang; 
	$i=2;
	if ($date>=0) 
	{
		$year=date%1461;
		$days = $date - $year*1461;
		while ($days > 364) 
	    	{
			$year++;		
			$days-=365; 	
			if ($i++==3)
			{
				$i=0;
				$days--;
			} 
		}
		if (days<=0 && $i==0)
		{
			$days++;
		}
	} else 
	{ 
		$year= -(date%1461);
		$days = $date + $year*1461;
      	while ($days<0) 
	      { 
      	   $year--; 
	         $days+=365; 
      	   if ($i++==3) 
	         { 
      	      $i=0; 
	            $days++; 
      	   } 
	      } 
   	}
	$leap_year = ($i==0) ? TRUE : FALSE;
	$months_array = ($i==0) ? 
		array (0,31,60,91,121,152,182,213,244,274,305,335,366) :
		array (0,31,59,90,120,151,181,212,243,273,304,334,365) ;
	for ($month=1;$month<12;$month++)
	{
		if ($days<$months_array[$month]) break;
	}

	$day=$days-$months_array[$month-1]+1;
	//you may gain speed performance by remove som of the below entry's if they are not needed/used
	return strtr ($date_syntax, array(
		'a' => '',
		'A' => '',
		'\\d' => 'd',
		'd' => ($day>9) ? $day : '0'.$day,
		'\\D' => 'D',
		'D' => $lang['day_short'][($date-3)%7],
		'\\F' => 'F',
		'F' => $lang['month_long'][$month-1],
		'g' => '',
		'G' => '',
		'H' => '',
		'h' => '',
		'i' => '',
		'I' => '',
		'\\j' => 'j',
		'j' => $day,
		'\\l' => 'l',
		'l' => $lang['day_long'][($date-3)%7],
		'\\L' => 'L',
		'L' => $leap_year,
		'\\m' => 'm',
		'm' => ($month>9) ? $month : '0'.$month,
		'\\M' => 'M',
		'M' => $lang['month_short'][$month-1],
		'\\n' => 'n',
		'n' => $month,
		'O' => '',
		's' => '',
		'S' => '',
		'\\t' => 't',
		't' => $months_array[$month]-$months_array[$month-1],
		'w' => '',
		'\\y' => 'y',
		'y' => ($year>29) ? $year-30 : $year+70,
		'\\Y' => 'Y',
		'Y' => $year+1970,
		'\\z' => 'z',
		'z' => $days,
		'\\W' => '',
		'W' => '') );
} 

function make_hours($base_time)
{
	global $lang;
	$years = floor($base_time/31536000);
	$base_time = $base_time - ($years*31536000);
	$weeks = floor($base_time/604800);
	$base_time = $base_time - ($weeks*604800);
	$days = floor($base_time/86400);
	$base_time = $base_time - ($days*86400);
	$hours = floor($base_time/3600);
	$base_time = $base_time - ($hours*3600);
	$min = floor($base_time/60);
	$sek = $base_time - ($min*60);
	if ($sek<10) $sek ='0'.$sek;
	if ($min<10) $min ='0'.$min;
	if ($hours<10) $hours ='0'.$hours;
	$result=(($years)?$years.' '.(($years==1)?$lang['Year']:$lang['Years']).', ':'').
	(($years || $weeks)?$weeks.' '.(($weeks==1)?$lang['Week']:$lang['Weeks']).', ':'').
	(($years || $weeks || $days) ? $days.' '.(($days==1)?$lang['Day']:$lang['Days']).', ':'').
	(($hours)?$hours.':':'00:').(($min)?$min.':' :'00:').$sek;
	return ($result)?$result:$lang['None'];
}

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
//--------------------------------------------------------------------------------------------------
//
// $nav_separator : used in the navigation sentence : ie Forum Index -> MainCat -> Forum -> Topic
// --------------
//--------------------------------------------------------------------------------------------------
$nav_separator = "&nbsp;>&nbsp;";

//--------------------------------------------------------------------------------------------------
//
// $tree : designed to get all the hierarchy
// ------
//
//	indexes :
//		- id : full designation : ie Root, f3, c20
//		- idx : rank order
//
//	$tree['keys'][id]			=> idx,
//	$tree['auth'][id]			=> auth_value array : ie tree['auth'][id]['auth_view'],
//	$tree['sub'][id]			=> array of sub-level ids,
//	$tree['main'][idx]			=> parent id,
//	$tree['type'][idx]			=> type of the row, can be 'c' for categories or 'f' for forums,
//	$tree['id'][idx]			=> value of the row id : cat_id for cats, forum_id for forums,
//	$tree['data'][idx]			=> db table row,
//	$tree['unread_topics'][idx]	=> boolean value to true if there is new topics
//--------------------------------------------------------------------------------------------------
$tree = array();

//--------------------------------------------------------------------------------------------------
//
// get_object_lang() : return the translated value of field depending on row type in the hierarchy
//
//--------------------------------------------------------------------------------------------------
function get_object_lang($cur, $field, $all=false)
{
	global $board_config, $lang, $tree;
	$res	= '';
	$this	= $tree['keys'][$cur];
	$type	= $tree['type'][$this];
	if ($cur == 'Root')
	{
		switch($field)
		{
			case 'name':
				//if (isset($lang[$board_config['sitename']]))
				//{
				//	$res = sprintf($lang['Forum_Index'], $lang[$board_config['sitename']]);
				//}
				//else
				//{
					$res = sprintf($lang['Forum_Index'], $board_config['sitename']);
				//}
				break;
			case 'desc':
				//if (isset($lang[$board_config['site_desc']]))
				//{
				//	$res = $lang[$board_config['site_desc']];
				//}
				//else
				//{
					$res = $board_config['site_desc'];
				//}
				break;
		}
	}
	else
	{
		switch($field)
		{
			case 'name':
				$field = ($type == POST_CAT_URL) ? 'cat_title' : 'forum_name';
				break;
			case 'desc':
				$field = ($type == POST_CAT_URL) ? 'cat_desc' : 'forum_desc';
				break;
		}
		$res = ($tree['auth'][$cur]['auth_view'] || $all) ? $tree['data'][$this][$field] : '';
		//if (isset($lang[$res])) $res = $lang[$res];
	}
	return $res;
}

//--------------------------------------------------------------------------------------------------
//
// build_tree() : fill each level of the hierarchy tree recursivly : use read_tree() as entry point
//
//--------------------------------------------------------------------------------------------------
function build_tree(&$cats, &$forums, &$new_topic_data, &$tracking_topics, &$tracking_forums, &$tracking_all, &$parents, $level=-1, $main='Root')
{
	global $db;
	global $tree;

	$tree_level = array();

	// get the forums of the level
	for ($i=0; $i < count($parents[POST_FORUM_URL][$main]); $i++)
	{
		$idx = $parents[POST_FORUM_URL][$main][$i];
		$tree_level['type'][]	= POST_FORUM_URL;
		$tree_level['id'][]		= $forums[$idx]['forum_id'];
		$tree_level['sort'][]	= $forums[$idx]['forum_order'];
		$tree_level['data'][]	= $forums[$idx];
	}
	// add the categories of this level
	for ($i=0; $i < count($parents[POST_CAT_URL][$main]); $i++)
	{
		$idx = $parents[POST_CAT_URL][$main][$i];
		$tree_level['type'][]	= POST_CAT_URL;
		$tree_level['id'][]		= $cats[$idx]['cat_id'];
		$tree_level['sort'][]	= $cats[$idx]['cat_order'];
		$tree_level['data'][]	= $cats[$idx];
	}

	// sort both
	if (!empty($tree_level['data'])) array_multisort($tree_level['sort'], $tree_level['type'], $tree_level['id'], $tree_level['data']);

	// add the tree_level to the tree
	$level++;
	$order = 0;
	for ($i=0; $i < count($tree_level['data']); $i++)
	{
		$this = count($tree['data']);
		$key = $tree_level['type'][$i] . $tree_level['id'][$i];
		$order = $order + 10;
		$tree['keys'][$key] = $this;
		$tree['main'][]		= $main;
		$tree['type'][]		= $tree_level['type'][$i];
		$tree['id'][]		= $tree_level['id'][$i];
		$tree['data'][]		= $tree_level['data'][$i];

		$tree['sub'][$main][] = $key;

		// cookies only set on forums
		$unread_topics = false;
		if ($tree['type'][$this] == POST_FORUM_URL)
		{
			$forum_id = $tree['id'][$this];
			if (!empty($new_topic_data[$forum_id]) )
			{
				$forum_last_post_time = 0;
				while( list($check_topic_id, $check_post_time) = @each($new_topic_data[$forum_id]) )
				{
					if ( empty($tracking_topics[$check_topic_id]) )
					{
						$unread_topics = true;
						$forum_last_post_time = max($check_post_time, $forum_last_post_time);
					}
					else
					{
						if ( $tracking_topics[$check_topic_id] < $check_post_time )
						{
							$unread_topics = true;
							$forum_last_post_time = max($check_post_time, $forum_last_post_time);
						}
					}
				} //  end while( list($check_topic_id, $check_post_time) = @each($new_topic_data[$forum_id]) )
				if ( !empty($tracking_forums[$forum_id]) )
				{
					if ( $tracking_forums[$forum_id] > $forum_last_post_time )
					{
						$unread_topics = false;
					}
				}
				if ( $tracking_all > $forum_last_post_time )
				{
					$unread_topics = false;
				}
			} //  if (!empty($new_topic_data[$forum_id]) )
		}
		$tree['unread_topics'][$this] = $unread_topics;

		// add sub levels
		build_tree($cats, $forums, $new_topic_data, $tracking_topics, $tracking_forums, $tracking_all, $parents, $level, $tree_level['type'][$i] . $tree_level['id'][$i]);
	}

	return;
}

//--------------------------------------------------------------------------------------------------
//
// read_tree() : read the tables and fill the hierarchical tree
//
//--------------------------------------------------------------------------------------------------
function read_tree()
{
	global $db, $userdata, $board_config, $HTTP_COOKIE_VARS;
	global $tree;

	// get censored words
	$orig_word = array();
	$remplacement_word = array();
	obtain_word_list($orig_word, $replacement_word);

	// mains
	$parents = array();
	$cats = array();
	$sql = "SELECT * FROM " . CATEGORIES_TABLE . " ORDER BY cat_order, cat_id";
	if ( !$result = $db->sql_query($sql) ) message_die(GENERAL_ERROR, "Couldn't access list of Categories", "", __LINE__, __FILE__, $sql);
	while ($row = $db->sql_fetchrow($result))
	{
		if ($row['cat_main'] == $row['cat_id']) $row['cat_main'] = 0;
		if (empty($row['cat_main_type'])) 
		{
			$row['cat_main_type'] = POST_CAT_URL;
			$row['cat_order'] = $row['cat_order'] + 9000000;
		}
		$row['main'] = ($row['cat_main'] == 0) ? 'Root' : $row['cat_main_type'] . $row['cat_main'];
		$idx = count($cats);
		$cats[$idx] = $row;
		$parents[POST_CAT_URL][ $row['main'] ][] = $idx;
	}

	// read forums
	$forums = array();
	$sql = "SELECT 
					f.*, 
					p.post_time, p.post_username, 
					u.username, u.user_id, 
					t.topic_last_post_id, t.topic_title 
				FROM ((( " . FORUMS_TABLE . " f 
				LEFT JOIN " . POSTS_TABLE . " p ON p.post_id = f.forum_last_post_id ) 
				LEFT JOIN " . USERS_TABLE . " u ON u.user_id = p.poster_id ) 
				LEFT JOIN " . TOPICS_TABLE . " t ON t.topic_id = p.topic_id AND t.forum_id = f.forum_id)
				ORDER BY f.forum_order, f.forum_id";
	if ( !$result = $db->sql_query($sql) ) message_die(GENERAL_ERROR, "Couldn't access list of Forums", "", __LINE__, __FILE__, $sql);
	while ($row = $db->sql_fetchrow($result))
	{
		$main_type = (empty($row['main_type'])) ? POST_CAT_URL : $row['main_type'];
		$row['main'] = ($row['cat_id'] == 0) ? 'Root' : $main_type . $row['cat_id'];
		if ( count($orig_word) )
		{
			$row['topic_title'] = preg_replace($orig_word, $replacement_word, $row['topic_title']);
		}
		$idx = count($forums);
		$forums[$idx] = $row;
		$parents[POST_FORUM_URL][ $row['main'] ][] = $idx;
	}

	//
	// Obtain a list of topic ids which contain
	// posts made since user last visited
	//
	$new_topic_data = array();
	if ( $userdata['session_logged_in'] )
	{
		$user_lastvisit = $userdata['user_lastvisit'];
		$sql = "SELECT t.forum_id, t.topic_id, p.post_time 
			FROM " . TOPICS_TABLE . " t, " . POSTS_TABLE . " p 
			WHERE p.post_id = t.topic_last_post_id 
				AND p.post_time > $user_lastvisit 
				AND t.topic_moved_id = 0"; 
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not query new topic information', '', __LINE__, __FILE__, $sql);
		}

		while( $topic_data = $db->sql_fetchrow($result) )
		{
			$new_topic_data[$topic_data['forum_id']][$topic_data['topic_id']] = $topic_data['post_time'];
		}
	}

	// read the user cookie
	$tracking_topics	= ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_t"]) : array();
	$tracking_forums	= ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_f"]) : array();
	$tracking_all		= ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all']) ) ? intval($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all']) : -1;

	// build the tree
	$tree = array();
	build_tree($cats, $forums, $new_topic_data, $tracking_topics, $tracking_forums, $tracking_all, $parents);

	return;
}

//--------------------------------------------------------------------------------------------------
//
// set_tree_user_auth() : enhance each row with auths and other things : use get_user_tree() as entry point
//
//--------------------------------------------------------------------------------------------------
function set_tree_user_auth()
{
	global $board_config, $userdata, $lang;
	global $tree;

	// read the tree from the bottom
	for ($i = count($tree['data']) - 1; $i >= 0; $i--)
	{
		//---------------------
		// full ids
		//---------------------
		$cur = $tree['type'][$i] . $tree['id'][$i];
		$main = $tree['main'][$i];
		$main_idx = ($main == 'Root') ? -1 : $tree['keys'][$main];

		//---------------------
		// auth view
		//---------------------
		$auth_view = false;
		if ( isset($tree['auth'][$cur]['auth_view']) )
		{
			// forum auth
			$auth_view = $tree['auth'][$cur]['auth_view'];
		}
		else if ( isset($tree['auth'][$cur]['tree.auth_view']) )
		{
			// categorie auth : get the sub level one
			$auth_view = $tree['auth'][$cur]['tree.auth_view'];
		}
		$tree['auth'][$cur]['auth_view'] = $auth_view;
		if ( !isset($tree['auth'][$cur]['tree.auth_view']) )
		{
			$tree['auth'][$cur]['tree.auth_view'] = $auth_view;
		}

		// grant the main level
		if ($main != 'Root')
		{
			$tree['auth'][$main]['tree.auth_view'] = ($tree['auth'][$main]['tree.auth_view'] || $tree['auth'][$cur]['tree.auth_view']);
		}

		//---------------------
		// auth read
		//---------------------
		$auth_read = false;
		if ( isset($tree['auth'][$cur]['auth_read']) )
		{
			// forum auth
			$auth_read = $tree['auth'][$cur]['auth_read'];
		}
		$tree['auth'][$cur]['auth_read'] = $auth_read;

		//---------------------
		// forum information
		//---------------------
		// locked status
		$locked = true;
		if ( isset($tree['data'][$i]['forum_status']) )
		{
			// forum info
			$locked = ($tree['data'][$i]['forum_status'] == FORUM_LOCKED);
		}
		else if ( isset($tree['data'][$i]['tree.locked']) )
		{
			// category info : get the sub levels one
			$locked = $tree['data'][$i]['tree.locked'];
		}
		$tree['data'][$i]['locked'] = $locked;

		// force lock status if no sub levels
		if ( !isset($tree['data'][$i]['tree.locked']) )
		{
			$tree['data'][$i]['tree.locked'] = $locked;
		}
		$tree['data'][$i]['tree.locked'] = ($tree['data'][$i]['tree.locked'] && $locked);

		// number of posts and topics
		if (!isset($tree['data'][$i]['tree.forum_posts']))
		{
			$tree['data'][$i]['tree.forum_posts'] = 0;
			$tree['data'][$i]['tree.forum_topics'] = 0;
		}
		if ($auth_view)
		{
			$tree['data'][$i]['tree.forum_posts'] += $tree['data'][$i]['forum_posts'];
			$tree['data'][$i]['tree.forum_topics'] += $tree['data'][$i]['forum_topics'];
		}

		// grant the main level
		if ($main != 'Root')
		{
			if ( !isset($tree['data'][$main_idx]['tree.locked']) )
			{
				$tree['data'][$main_idx]['tree.locked'] = $tree['data'][$i]['tree.locked'];
			}
			$tree['data'][$main_idx]['tree.locked'] = ($tree['data'][$main_idx]['tree.locked'] && $tree['data'][$i]['tree.locked']);

			// number of posts and topics
			if (!isset($tree['data'][$main_idx]['tree.forum_posts']))
			{
				$tree['data'][$main_idx]['tree.forum_posts'] = 0;
				$tree['data'][$main_idx]['tree.forum_topics'] = 0;
			}
			if ($auth_view)
			{
				$tree['data'][$main_idx]['tree.forum_posts'] += $tree['data'][$i]['tree.forum_posts'];
				$tree['data'][$main_idx]['tree.forum_topics'] += $tree['data'][$i]['tree.forum_topics'];
			}
		}

		//---------------------
		// last post
		//---------------------
		if ($auth_read)
		{
			// fill the sub
			if ( empty($tree['data'][$i]['tree.topic_last_post_id']) || ($tree['data'][$i]['post_time'] > $tree['data'][$i]['tree.post_time']) )
			{
				$tree['data'][$i]['tree.topic_last_post_id']	= $tree['data'][$i]['topic_last_post_id'];
				$tree['data'][$i]['tree.post_time']				= $tree['data'][$i]['post_time'];
				$tree['data'][$i]['tree.post_user_id']			= $tree['data'][$i]['user_id'];
				$tree['data'][$i]['tree.post_username']			= ($tree['data'][$i]['user_id'] != ANONYMOUS) ? $tree['data'][$i]['username'] : ( (!empty($tree['data'][$i]['post_username'])) ? $tree['data'][$i]['post_username'] : $lang['Guest'] );
				$tree['data'][$i]['tree.topic_title']			= $tree['data'][$i]['topic_title'];
				$tree['data'][$i]['tree.unread_topics']			= $tree['unread_topics'][$i];
			}
		}

		// grant the main level
		if ($main != 'Root')
		{
			if ( empty($tree['data'][$main_idx]['tree.topic_last_post_id']) || ($tree['data'][$i]['tree.post_time'] > $tree['data'][$main_idx]['tree.post_time']) )
			{
				$tree['data'][$main_idx]['tree.topic_last_post_id']	= $tree['data'][$i]['tree.topic_last_post_id'];
				$tree['data'][$main_idx]['tree.post_time']			= $tree['data'][$i]['tree.post_time'];
				$tree['data'][$main_idx]['tree.post_user_id']		= $tree['data'][$i]['tree.post_user_id'];
				$tree['data'][$main_idx]['tree.post_username']		= $tree['data'][$i]['tree.post_username'];
				$tree['data'][$main_idx]['tree.topic_title']		= $tree['data'][$i]['tree.topic_title'];
				$tree['data'][$main_idx]['tree.unread_topics']		= $tree['data'][$i]['tree.unread_topics'];
			}
		}
	}
}

//--------------------------------------------------------------------------------------------------
//
// get_user_tree() : generate the hierarchy tree - called in init_userprefs()
//
//--------------------------------------------------------------------------------------------------
function get_user_tree(&$userdata)
{
	global $tree;

	if (empty($tree)) read_tree();

	// read the user auth if requiered
	if (empty($tree['auth']))
	{
		$tree['auth'] = array();
		$wauth = auth(AUTH_ALL, AUTH_LIST_ALL, $userdata);
		if (!empty($wauth))
		{
			reset($wauth);
			while (list($key, $data) = each($wauth))
			{
				$tree['auth'][POST_FORUM_URL . $key] = $data;
			}
		}

		// enhanced each level
		set_tree_user_auth();
	}

	return;
}

//--------------------------------------------------------------------------------------------------
//
// get_auth_keys() : return an array() with only the viewable row id
// returned array :
//		$keys['keys'][id]		=> n,
//		$keys['id'][n]			=> id (used by $tree),
//		$keys['real_level'][n]	=> level in this auth-tree (root=-1),
//		$keys['level'][n]		=> level adjust for display (sub-level=parent level under certain conditions)
//		$keys['idx'][n]			=> idx (used by $tree)
//--------------------------------------------------------------------------------------------------
function get_auth_keys($cur='Root', $all=false, $level=-1, $max=-1, $auth_key='auth_view')
{
	global $board_config;
	global $tree;

	$keys = array();
	$last_i = -1;


	// add the level
	if ( ($cur == 'Root') || $tree['auth'][$cur][$auth_key] || $all)
	{
		// push the level
		if (($max < 0) || ($level < $max) || (($level==$max) && ((substr($tree['main'][$tree['keys'][$cur]], 0, 1) == POST_CAT_URL) || ($tree['main'][$tree['keys'][$cur]] == 'Root') )))
		{
			// if child of cat, align the level on the parent one
			$orig_level = $level;
			if (!$all)
			{
				if (($level > 0) && ((substr($cur, 0, 1) == POST_FORUM_URL) || (intval($board_config['sub_forum']) > 0)) && (substr($tree['main'][$tree['keys'][$cur]], 0, 1) == POST_CAT_URL)) $level = $level-1;
			}

			// store this level
			$last_i++;
			$keys['keys'][$cur]				= $last_i;
			$keys['id'][$last_i]			= $cur;
			$keys['real_level'][$last_i]	= $orig_level;
			$keys['level'][$last_i]			= $level;
			$keys['idx'][$last_i]			= (isset($tree['keys'][$cur]) ? $tree['keys'][$cur] : -1);

			// get sub-levels
			for ($i=0; $i < count($tree['sub'][$cur]); $i++)
			{
				$tkeys = array();
				$tkeys = get_auth_keys($tree['sub'][$cur][$i], $all, $orig_level+1, $max, $auth_key);

				// add sub-levels
				for ($j=0; $j < count($tkeys['id']); $j++)
				{
					$last_i++;
					$keys['keys'][$tkeys['id'][$j]] = $last_i;
					$keys['id'][$last_i]			= $tkeys['id'][$j];
					$keys['real_level'][$last_i]	= $tkeys['real_level'][$j];
					$keys['level'][$last_i]			= $tkeys['level'][$j];
					$keys['idx'][$last_i]			= $tkeys['idx'][$j];
				}
			}
		}
	}

	return $keys;
}


//--------------------------------------------------------------------------------------------------
// get_sub_forums() : return an array() with sub-forum id
// returned array :
//--------------------------------------------------------------------------------------------------
function get_sub_forums($baseCat='c1')
{
	global $tree;

	$subForums = array();

	// get sub-forums
	for ($i=0; $i < count($tree['sub'][$baseCat]); $i++)
	{
		$tSub = $tree['sub'][$baseCat][$i];
		$tKey = $tree['keys'][$tSub];

		if($tree['type'][$tKey] == POST_FORUM_URL) {
			$subForums[] = $tree['id'][$tKey];
		}
		else {
			$subForums = array_merge($subForums, get_sub_forums($tSub));
		}
	}

	return $subForums;
}

//--------------------------------------------------------------------------------------------------
//
// get_max_depth() : return the maximum level in the branch of the tree
//
//--------------------------------------------------------------------------------------------------
function get_max_depth($cur='Root', $all=false, $level=-1, &$keys, $max=-1)
{
	global $tree;
	if (empty($keys['id']))
	{
		$keys = array();
		$keys = get_auth_keys($cur, $all);
	}

	$max_level = 0;
	for ($i=0; $i < count($keys['id']); $i++)
	{
		if ($keys['level'][$i] > $max_level)
		{
			$max_level = $keys['level'][$i];
		}
	}
	return $max_level;
}

//--------------------------------------------------------------------------------------------------
//
// get_tree_option() : return a drop down menu list of <option></option>
//
//--------------------------------------------------------------------------------------------------
function get_tree_option($cur='', $all=false, $base_cat='', $filter='', $curCat='')
{
	global $tree, $lang;	

	if ($base_cat != ''){
		$base_id = $base_cat;
	}
	else if($cur == '' || $cur == 'c0' || $cur == 'Root' || $cur == 'f0') {
		$base_id = 'Root';
		//$base_id = '';
	}
	else {		
		$parent_id = $tree['main'][$tree['keys'][$cur]];
		$main_menu_key = $tree['keys'][$parent_id];
		$main_menu_cat = $parent_id;

		while($main_menu_cat != 'c1' && $tree['main'][$main_menu_key] != 'c1' && $main_menu_cat != 'c2' && $tree['main'][$main_menu_key] != 'c2') {
			$main_menu_cat = $tree['main'][$main_menu_key];
			$main_menu_key = $tree['keys'][$main_menu_cat];				
		}
		$base_id = $main_menu_cat;
	}

	//print_r($tree);

	$keys = array();
	$keys = get_auth_keys($base_id, $all);

	$res = '';
	for ($i=0; $i < count($keys['id']); $i++)
	{
		$filtering = true;
		if( ($filter == 'onlyCat' && ($tree['type'][ $keys['idx'][$i] ] == POST_FORUM_URL)) || ($filter =='onlyForum' && ($tree['type'][ $keys['idx'][$i] ] == POST_CAT_URL)) || ($filter == 'onlyCat' && $keys['id'][$i] == $curCat) || ($filter == 'onlyCat' && $keys['id'][$i] == 'c1' && $base_id != 'Root')) {
			$filtering = false;
		}
		
		// only get object that are not forum links type
		if ( (($tree['type'][ $keys['idx'][$i] ] != POST_FORUM_URL) || empty($tree['data'][ $keys['idx'][$i] ]['forum_link'])) &&  $filtering )
		{
			$selected = ($cur == $keys['id'][$i]) ? ' selected="selected"' : '';
			$res .= '<option value="' . $keys['id'][$i] . '"' .  $selected . '>';

			// name
			$name = get_object_lang($keys['id'][$i], 'name', $all);

			// increment
			$inc = '';
			for ($k=1; $k <= $keys['real_level'][$i]; $k++)
			{
				$inc .= '|&nbsp;&nbsp;&nbsp;';
			}
			if ($keys['level'][$i] >=0) $inc .= '|--';
			$name = $inc . $name;

			$res .= $name . '</option>';
		}
	}
	return $res;
}

//--------------------------------------------------------------------------------------------------
//
// build_index() : display a level and its sublevels : use dislay_index() as entry point
//
//--------------------------------------------------------------------------------------------------
function build_index($cur='Root', $cat_break=false, &$forum_moderators, $real_level=-1, $max_level=-1, &$keys, $menu_count=0)
{
	global $template, $phpEx, $board_config, $lang, $images;
	global $tree;
	//
	// init
	//
	$display = false;

	// get the sub_forum switch value
	$sub_forum = intval($board_config['sub_forum']);
	if (($sub_forum == 2) && defined('IN_VIEWFORUM'))
	{
		$sub_forum = 1;
	}
	$pack_first_level = ($sub_forum == 2);

	// verify the cat_break parm
	if (($cur != 'Root') && ($real_level == -1)) $cat_break = false;

	// display the level
	$this = isset($tree['keys'][$cur]) ? $tree['keys'][$cur] : -1;

	//
	// display each kind of row
	//

	// root level head
	if ($real_level == -1)
	{
		// get max inc level
		$max = -1;
		if ($sub_forum == 2) $max = 0;
		if ($sub_forum == 1) $max = 1;
		$keys = array();
		$keys = get_auth_keys($cur, false, -1, $max);
		$max_level = get_max_depth($cur, false, -1, $keys, $max);
	}

	// table header
	if (($board_config['split_cat'] && $cat_break && ($real_level==0)) || ((!$board_config['split_cat'] || !$cat_break) && ($real_level==-1)))
	{
		// if break, get the local max level
		if ($board_config['split_cat'] && $cat_break && ($real_level==0))
		{
			$max_level = 0;
			// the array is sorted
			$start = false;
			$stop = false;
			for ($i=0; ($i < count($keys['id']) && !$stop); $i++)
			{
				if ( $start && ($tree['main'][$keys['idx'][$i]] == $tree['main'][$this]))
				{
					$stop = true;
					$break;
				}
				if ($keys['id'][$i] == $cur) $start = true;
				if ($start && !$stop && ($keys['level'][$i] > $max_level)) $max_level = $keys['level'][$i];
			}
		}
		$template->assign_block_vars('catrow', array());
		$template->assign_block_vars('catrow.tablehead', array(
			'L_FORUM'	=> ($this < 0) ? $lang['Forum'] : get_object_lang($cur, 'name'),
			'INC_SPAN'	=> $max_level+2,
			)
		);
	}

	// get the level
	$level = $keys['level'][$keys['keys'][$cur]];

	// sub-forum view management
	$pull_down = true;
	if ($sub_forum > 0)
	{
		$pull_down = false;
		if (($real_level==0) && ($sub_forum == 1)) $pull_down = true;
	}

	if ($level >=0 )
	{
		// cat header row
		if ( ($tree['type'][$this] == POST_CAT_URL) && $pull_down)
		{
			// display a cat row
			$cat = $tree['data'][$this];
			$cat_id = $tree['id'][$this];

			// get the class colors
			$class_catLeft	= "catLeft";
			$class_cat		= "cat";
			$class_rowpic	= "rowpic";

			// send to template
			$template->assign_block_vars('catrow', array());
			$template->assign_block_vars('catrow.cathead', array(
				'CAT_TITLE'			=> get_object_lang($cur, 'name'),
				'CAT_DESC'			=> ereg_replace('<[^>]+>', '', get_object_lang($cur, 'desc')),

				'CLASS_CATLEFT'		=> $class_catLeft,
				'CLASS_CAT'			=> $class_cat,
				'CLASS_ROWPIC'		=> $class_rowpic,
				'INC_SPAN'			=> $max_level - $level+2,

				'U_VIEWCAT'			=> append_sid("index.$phpEx?" . POST_CAT_URL . "=$cat_id"),
				)
			);


			// add indentation to the display
			for ($k=1; $k <= $level; $k++)
			{
				$template->assign_block_vars('catrow.cathead.inc', array(
					'INC_CLASS' => ($k % 2) ?  'row1' : 'row2',
					)
				);
			}

			// something displayed
			$display = true;
		}
	}

	// forum header row
	if ($level >= 0)
	{
		if ( ($tree['type'][$this] == POST_FORUM_URL) || (($tree['type'][$this] == POST_CAT_URL) && !$pull_down))
		{
			// get the data
			$data	= $tree['data'][$this];
			$id		= $tree['id'][$this];
			$type	= $tree['type'][$this];
			$sub	= (!empty($tree['sub'][$cur]) && $tree['auth'][$cur]['tree.auth_view']);

			// specific to the data type
			$title	= get_object_lang($cur, 'name');
			$desc	= get_object_lang($cur, 'desc');

			//$title	.= (($tree['type'][$this] == POST_CAT_URL)? '&copy;' : '');

			// specific to something attached
			if ($sub)
			{
				$i_new		= $images['category_new'];
				$a_new		= $lang['New_posts'];
				$i_norm		= $images['category'];
				$a_norm		= $lang['No_new_posts'];
				$i_locked	= $images['category_locked'];
				$a_locked	= $lang['Forum_locked'];
			}
			else
			{
				$i_new		= $images['forum_new'];
				$a_new		= $lang['New_posts'];
				$i_norm		= $images['forum'];
				$a_norm		= $lang['No_new_posts'];
				$i_locked	= $images['forum_locked'];
				$a_locked	= $lang['Forum_locked'];
			}

			// forum link type
			if (($tree['type'][$this] == POST_FORUM_URL) && !empty($tree['data'][$this]['forum_link']))
			{
				$i_new		= $images['link'];
				$a_new		= $lang['Forum_link'];
				$i_norm		= $images['link'];
				$a_norm		= $lang['Forum_link'];
				$i_locked	= $images['link'];
				$a_locked	= $lang['Forum_link'];
			}

			// front icon
			$folder_image = ( $data['tree.unread_topics'] ) ? $i_new : $i_norm;
			$folder_alt   = ( $data['tree.unread_topics'] ) ? $a_new : $a_norm;
			if ($data['tree.locked'])
			{
				$folder_image	= $i_locked;
				$folder_alt		= $a_locked;
			}

			// moderators list
			$l_moderators	= '';
			$moderator_list = '';
			if ($type == POST_FORUM_URL)
			{
				if ( count($forum_moderators[$id]) > 0 )
				{
					$l_moderators = ( count($forum_moderators[$id]) == 1 ) ? '<br>'.$lang['Moderator'].': ' : '<br>'.$lang['Moderators'].': ';
					$moderator_list = implode(', ', $forum_moderators[$id]);
				}
			}

			// last post
			$last_post = $lang['No_Posts'];
			if ( $data['tree.topic_last_post_id'] )
			{
				// resize
				$topic_title = $data['tree.topic_title'];
				if ( strlen($topic_title) > (intval($board_config['last_topic_title_length'])-3) ) $topic_title = substr($topic_title, 0, intval($board_config['last_topic_title_length'])) . '...';
				$topic_title = '<a href="' . append_sid("viewtopic.$phpEx?"  . POST_POST_URL . "=" . $data['tree.topic_last_post_id']) . '#' . $data['tree.topic_last_post_id'] . '" title="' . $data['tree.topic_title'] . '">' . $topic_title . '</a><br />';

				$last_post_time = create_date($board_config['default_dateformat'], $data['tree.post_time'], $board_config['board_timezone']);
				$last_post  = (($board_config['last_topic_title']) ? $topic_title : '');
				$last_post .= $last_post_time . '<br />';
				$last_post .= ( $data['tree.post_user_id'] == ANONYMOUS ) ? $data['tree.post_username'] . ' ' : '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . '='  . $data['tree.post_user_id']) . '">' . $data['tree.post_username'] . '</a> ';
				$last_post .= '<a href="' . append_sid("viewtopic.$phpEx?"  . POST_POST_URL . '=' . $data['tree.topic_last_post_id']) . '#' . $data['tree.topic_last_post_id'] . '"><img src="' . $images['icon_latest_reply'] . '" border="0" alt="' . $lang['View_latest_post'] . '" title="' . $lang['View_latest_post'] . '" /></a>';
			}

			// links to sub-levels
			$links = '';
			if ( $sub && !$pull_down && (intval($board_config['sub_level_links']) > 0) && ((($real_level == 0) && ($sub_forum == 1)) || ($real_level == 1) || ($sub_forum == 2)) )
			{
				for ($j=0; $j < count($tree['sub'][$cur]); $j++) if ($tree['auth'][ $tree['sub'][$cur][$j] ]['auth_view'])
				{
					$wcur	= $tree['sub'][$cur][$j];
					$wthis	= $tree['keys'][$wcur];
					$wdata	= $tree['data'][$wthis];
					$wname	= get_object_lang($wcur, 'name');
					$wdesc	= get_object_lang($wcur, 'desc');
					switch($tree['type'][$wthis])
					{
						case POST_FORUM_URL:
							$wpgm = append_sid("./viewforum.$phpEx?" . POST_FORUM_URL . '=' . $tree['id'][$wthis]);
							break;
						case POST_CAT_URL:
							$wpgm = append_sid("./index.$phpEx?" . POST_CAT_URL . '=' . $tree['id'][$wthis]);
							break;
						default:
							$wpgm = append_sid("./portal.$phpEx");
							break;
					}
					$link = '';
					$wdesc = ereg_replace('<[^>]+>', '', $wdesc);
					if ($wname != '') $link = '<a href="' . $wpgm . '" title="' . $wdesc . '" class="genmed">' . $wname . '</a>';

					if (intval($board_config['sub_level_links']) == 2)
					{
						$wsub = (!empty($tree['sub'][$wcur]) && $tree['auth'][$wcur]['tree.auth_view']);

						// specific to something attached
						if ($wsub)
						{
							$wi_new		= $images['icon_minicat_new'];
							$wa_new		= $lang['New_posts'];
							$wi_norm	= $images['icon_minicat'];
							$wa_norm	= $lang['No_new_posts'];
							$wi_locked	= $images['icon_minicat_locked'];
							$wa_locked	= $lang['Forum_locked'];
						}
						else
						{
							$wi_new		= $images['icon_minipost_new'];
							$wa_new		= $lang['icon_minipost'];
							$wi_norm	= $images['icon_minipost'];
							$wa_norm	= $lang['No_new_posts'];
							$wi_locked	= $images['icon_minipost_lock'];
							$wa_locked	= $lang['Forum_locked'];
						}

						// forum link type
						if (($tree['type'][$wthis] == POST_FORUM_URL) && !empty($wdata['forum_link']))
						{
							$wi_new		= $images['icon_minilink'];
							$wa_new		= $lang['Forum_link'];
							$wi_norm		= $images['icon_minilink'];
							$wa_norm		= $lang['Forum_link'];
							$wi_locked	= $images['icon_minilink'];
							$wa_locked	= $lang['Forum_link'];
						}

						// front icon
						$wfolder_image	= ( $wdata['tree.unread_topics'] ) ? $wi_new : $wi_norm;
						$wfolder_alt	= ( $wdata['tree.unread_topics'] ) ? $wa_new : $wa_norm;
						if ($wdata['tree.locked'])
						{
							$wfolder_image	= $wi_locked;
							$wfolder_alt	= $wa_locked;
						}
						$wlast_post  = '<a href="' . append_sid("./viewtopic.$phpEx?"  . POST_POST_URL . '=' . $wdata['tree.topic_last_post_id']) . '#' . $wdata['tree.topic_last_post_id'] . '">';
						$wlast_post .= '<img src="' . $wfolder_image . '" border="0" alt="' . $wfolder_alt . '" title="' . $wfolder_alt . '" align="middle" /></a>';
					}
					if ($link != '') $links .= (($links != '') ? ', ' : '') . $wlast_post . $link;
				}
			}

			// send to template
			$template->assign_block_vars('catrow', array());
			$template->assign_block_vars('catrow.forumrow',	array(
				'FORUM_FOLDER_IMG'		=> $folder_image, 
				'FORUM_NAME'			=> $title,
				'FORUM_DESC'			=> $desc,
				'POSTS'					=> $data['tree.forum_posts'],
				'TOPICS'				=> $data['tree.forum_topics'],
				'LAST_POST'				=> $last_post,
				'MODERATORS'			=> $moderator_list,
				'L_MODERATOR'			=> empty($moderator_list) ? '' : ( empty($l_moderators) ? '<br />' : '<br />' . $l_moderators . '&nbsp;' ),
				'L_LINKS'				=> empty($links) ? '' : ( empty($lang['Subforums']) ? '<br /><br />' : '<br /><br /><b>' . $lang['Subforums'] . ':</b>&nbsp;' ),
				'LINKS'					=> $links, 
				'L_FORUM_FOLDER_ALT'	=> $folder_alt, 
				'U_VIEWFORUM'			=> ($type == POST_FORUM_URL) ? append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$id") : append_sid("index.$phpEx?" . POST_CAT_URL . "=$id"),
				
				'INC_SPAN'				=> $max_level- $level+1,
				'INC_CLASS'				=> ( !($level % 2) ) ? 'row1' : 'row2',
				)
			);

			//
			// Forum per row
			//
			$forumPerRow = 3;

			if ((($menu_count+1)%$forumPerRow) == 0)
			{
				$template->assign_block_vars('catrow.forumrow.switch_forum_per_row', array());
			}
			else {
				$template->assign_block_vars('catrow.forumrow.switch_not_forum_per_row', array());
			}

			$forumPerRow = 1;

			if ((($menu_count+1)%$forumPerRow) == 0)
			{
				$template->assign_block_vars('catrow.forumrow.switch_forum_per_row1', array());
			}
			else {
				$template->assign_block_vars('catrow.forumrow.switch_not_forum_per_row1', array());
			}

			$forumPerRow = 2;

			if ((($menu_count+1)%$forumPerRow) == 0)
			{
				$template->assign_block_vars('catrow.forumrow.switch_forum_per_row2', array());
			}
			else {
				$template->assign_block_vars('catrow.forumrow.switch_not_forum_per_row2', array());
			}

			$forumPerRow = 3;

			if ((($menu_count+1)%$forumPerRow) == 0)
			{
				$template->assign_block_vars('catrow.forumrow.switch_forum_per_row3', array());
			}
			else {
				$template->assign_block_vars('catrow.forumrow.switch_not_forum_per_row3', array());
			}

			$forumPerRow = 4;

			if ((($menu_count+1)%$forumPerRow) == 0)
			{
				$template->assign_block_vars('catrow.forumrow.switch_forum_per_row4', array());
			}
			else {
				$template->assign_block_vars('catrow.forumrow.switch_not_forum_per_row4', array());
			}

			$forumPerRow = 5;

			if ((($menu_count+1)%$forumPerRow) == 0)
			{
				$template->assign_block_vars('catrow.forumrow.switch_forum_per_row5', array());
			}
			else {
				$template->assign_block_vars('catrow.forumrow.switch_not_forum_per_row5', array());
			}

			$forumPerRow = 6;

			if ((($menu_count+1)%$forumPerRow) == 0)
			{
				$template->assign_block_vars('catrow.forumrow.switch_forum_per_row6', array());
			}
			else {
				$template->assign_block_vars('catrow.forumrow.switch_not_forum_per_row6', array());
			}

			$forumPerRow = 7;

			if ((($menu_count+1)%$forumPerRow) == 0)
			{
				$template->assign_block_vars('catrow.forumrow.switch_forum_per_row7', array());
			}
			else {
				$template->assign_block_vars('catrow.forumrow.switch_not_forum_per_row7', array());
			}

			$forumPerRow = 8;

			if ((($menu_count+1)%$forumPerRow) == 0)
			{
				$template->assign_block_vars('catrow.forumrow.switch_forum_per_row8', array());
			}
			else {
				$template->assign_block_vars('catrow.forumrow.switch_not_forum_per_row8', array());
			}

			$forumPerRow = 9;

			if ((($menu_count+1)%$forumPerRow) == 0)
			{
				$template->assign_block_vars('catrow.forumrow.switch_forum_per_row9', array());
			}
			else {
				$template->assign_block_vars('catrow.forumrow.switch_not_forum_per_row9', array());
			}

			$forumPerRow = 10;

			if ((($menu_count+1)%$forumPerRow) == 0)
			{
				$template->assign_block_vars('catrow.forumrow.switch_forum_per_row10', array());
			}
			else {
				$template->assign_block_vars('catrow.forumrow.switch_not_forum_per_row10', array());
			}

			// add indentation to the display
			for ($k=1; $k <= $level; $k++)
			{
				$template->assign_block_vars('catrow.forumrow.inc', array(
					'INC_CLASS' => ($k % 2) ?  'row1' : 'row2',
					)
				);
			}

			// forum link type
			if (($tree['type'][$this] == POST_FORUM_URL) && !empty($tree['data'][$this]['forum_link']))
			{
				$s_hit_count = '';
				if ($tree['data'][$this]['forum_link_hit_count'])
				{
					$s_hit_count = sprintf($lang['Forum_link_visited'], $tree['data'][$this]['forum_link_hit']);
				}
				$template->assign_block_vars('catrow.forumrow.forum_link', array(
					'HIT_COUNT' => $s_hit_count,
					)
				);
			}
			else
			{
				$template->assign_block_vars('catrow.forumrow.forum_link_no', array());
			}

			// something displayed
			$display = true;
		}
	}

	// display sub-levels
	for ($i=0,$menu_i=0; $i < count($tree['sub'][$cur]); $i++) if (!empty($keys['keys'][$tree['sub'][$cur][$i]]))
	{		
		$wdisplay = build_index($tree['sub'][$cur][$i], $cat_break, $forum_moderators, $level+1, $max_level, $keys, $menu_i);
		$menu_i++;
		if ($wdisplay) $display = true;
	}

	if ($level >=0 )
	{
		// forum footer row
		if ($tree['type'][$this] == POST_FORUM_URL)
		{
		}
	}

	if ($level >=0 )
	{
		// cat footer
		if ( ($tree['type'][$this] == POST_CAT_URL) && $pull_down)
		{
			$template->assign_block_vars('catrow', array());
			$template->assign_block_vars('catrow.catfoot', array('INC_SPAN' => $max_level - $level+5));

			// add indentation to the display
			for ($k=1; $k <= $level; $k++)
			{
				$template->assign_block_vars('catrow.catfoot.inc', array(
					'INC_SPAN' => $max_level - $level+5,
					'INC_CLASS' => ($k % 2) ?  'row1' : 'row2',
					)
				);
			}
		}
	}

	// root level footer
	if (($board_config['split_cat'] && $cat_break && $real_level==0) || ((!$board_config['split_cat'] || !$cat_break) && $real_level==-1))
	{
		$template->assign_block_vars('catrow', array());
		$template->assign_block_vars('catrow.tablefoot', array());
	}

	return $display;
}

//--------------------------------------------------------------------------------------------------
//
// display_index() : display the index using the tpl var {BOARD_INDEX}, return true if the index is not empty
//
//--------------------------------------------------------------------------------------------------
function display_index($cur='Root')
{
	global $board_config, $template, $userdata, $lang, $db, $nav_links, $phpEx;
	global $images, $nav_separator, $nav_cat_desc;

	$template->set_filenames(array(
		'index' => 'index_box.tpl')
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
		$forum_moderators[$row['forum_id']][] = '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $row['user_id']) . '">' . $row['username'] . '</a>';
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
		$forum_moderators[$row['forum_id']][] = '<a href="' . append_sid("groupcp.$phpEx?" . POST_GROUPS_URL . "=" . $row['group_id']) . '">' . $row['group_name'] . '</a>';
	}

	// let's dump all of this on the template
	$keys = array();
	$display = build_index($cur, $board_config['split_cat'], $forum_moderators, -1, -1, $keys);

	// constants
	$template->assign_vars(array(
		'L_FORUM' => $lang['Forum'],
		'L_TOPICS' => $lang['Topics'],
		'L_POSTS' => $lang['Posts'],
		'L_LASTPOST' => $lang['Last_Post'],
		)
	);
	$template->assign_vars(array(
		'SPACER'		=> $images['spacer'],
		'NAV_SEPARATOR' => $nav_separator,
		'NAV_CAT_DESC'	=> $nav_cat_desc,
		)
	);
	if ($display) $template->assign_var_from_handle('BOARD_INDEX', 'index');

	return $display;
}

//--------------------------------------------------------------------------------------------------
//
// make_cat_nav_tree() : build the nav sentence
//
//--------------------------------------------------------------------------------------------------
function make_cat_nav_tree($cur, $pgm='', $nav_class='genmed')
{
	global $phpbb_root_path, $phpEx, $db;
	global $global_orig_word, $global_replacement_word;
	global $nav_separator;
	global $tree;
	global $userdata;

	// get topic or post level
	$type = substr($cur, 0, 1);
	$id = intval(substr($cur,1));
	$topic_title = '';
	$fcur = '';
	switch ($type)
	{
		case POST_TOPIC_URL:
			$sql = "SELECT forum_id, topic_title 
						FROM " . TOPICS_TABLE . " WHERE topic_id = $id";
			if ( !($result = $db->sql_query($sql)) ) message_die(GENERAL_ERROR, 'Could not query topics information', '', __LINE__, __FILE__, $sql);
			if ($row = $db->sql_fetchrow($result))
			{
				$fcur = POST_FORUM_URL . $row['forum_id'];
				$topic_title = $row['topic_title'];
				$orig_word = array();
				$remplacement_word = array();
				obtain_word_list($orig_word, $replacement_word);
				if ( count($orig_word) )
				{
					$topic_title = preg_replace($orig_word, $replacement_word, $topic_title);
				}
			}
			break;
		case POST_POST_URL:
			$sql = "SELECT t.forum_id, t.topic_title 
						FROM " . POSTS_TABLE . " p, " . TOPICS_TABLE . " t 
						WHERE t.topic_id=p.topic_id AND post_id = $id";
			if ( !($result = $db->sql_query($sql)) ) message_die(GENERAL_ERROR, 'Could not query posts information', '', __LINE__, __FILE__, $sql);
			if ($row = $db->sql_fetchrow($result))
			{
				$fcur = POST_FORUM_URL . $row['forum_id'];
				$topic_title = $row['topic_title'];
				$orig_word = array();
				$remplacement_word = array();
				obtain_word_list($orig_word, $replacement_word);
				if ( count($orig_word) )
				{
					$topic_title = preg_replace($orig_word, $replacement_word, $topic_title);
				}
			}
			break;
	}

	// keep the compliancy with prec versions
	if (!isset($tree['keys'][$cur])) $cur = isset($tree['keys'][POST_CAT_URL . $cur]) ? POST_CAT_URL . $cur : $cur;

	// find the object
	$this = isset($tree['keys'][$cur]) ? $tree['keys'][$cur] : -1;

	$res = '';
	while (($this >= 0) || ($fcur != ''))
	{
		$type = (substr($fcur, 0, 1) != '') ? substr($cur, 0, 1) : $tree['type'][$this];
		switch($type)
		{
			case POST_CAT_URL:
				$field_name		= get_object_lang($cur, 'name');
				$param_type		= POST_CAT_URL;
				$param_value	= $tree['id'][$this];
				$pgm_name		= "index.$phpEx";
				break;
			case POST_FORUM_URL:
				$field_name		= get_object_lang($cur, 'name');
				$param_type		= POST_FORUM_URL;
				$param_value	= $tree['id'][$this];
				$pgm_name		= "viewforum.$phpEx";
				break;
			case POST_TOPIC_URL:
				$field_name		= $topic_title;
				$param_type		= POST_TOPIC_URL;
				$param_value	= $id;
				$pgm_name		= "viewtopic.$phpEx";
				break;
			case POST_POST_URL:
				$field_name		= $topic_title;
				$param_type		= POST_POST_URL;
				$param_value	= $id . '#' . $id;
				$pgm_name		= "viewtopic.$phpEx";
				break;
			default :
				$field_name		= '';
				$param_type		= '';
				$param_value	= '';
				$pgm_name		= "portal.$phpEx";
				break;
		}
		if ($pgm != '') $pgm_name = "$pgm.$phpEx";

		//if ( $userdata['user_level'] == ADMIN ) {
			if (!empty($field_name)) $res = '<a href="' . append_sid('./' . $pgm_name . (($field_name != '' && $param_type.$param_value != 'c1') ? "?$param_type=$param_value" : '')) . '" class="' . $nav_class . '">' . $field_name . '</a>' . (($res != '') ? $nav_separator . $res : '');
		//}
		//else {
		//	if (!empty($field_name)) $res = $field_name . (($res != '') ? $nav_separator . $res : '');
		//}

		// find parent object
		if ($fcur != '')
		{
			$cur	= $fcur;
			$pgm	= '';
			$fcur	= '';
			$topic_title = '';
		}
		else
		{
			$cur = $tree['main'][$this];
		}
		$this = isset($tree['keys'][$cur]) ? $tree['keys'][$cur] : -1;
	}

	return $res;
}

//--------------------------------------------------------------------------------------------------
//
// jumpbox() : replace the original phpBB make_jumpbox()
//
//--------------------------------------------------------------------------------------------------
function jumpbox($action, $match_forum_id = 0)
{
	global $template, $userdata, $lang, $db, $nav_links, $phpEx, $SID;
	global $links, $tree;

	$parent_id = $tree['main'][$tree['keys'][POST_FORUM_URL . $match_forum_id]];
	$main_menu_key = $tree['keys'][$parent_id];
	$main_menu_cat = $parent_id;

	while($main_menu_cat != 'c1' && $tree['main'][$main_menu_key] != 'c1' && $main_menu_cat != 'c2' && $tree['main'][$main_menu_key] != 'c2') {
		$main_menu_cat = $tree['main'][$main_menu_key];
		$main_menu_key = $tree['keys'][$main_menu_cat];				
	}

	// build the jumpbox
	$boxstring  = '<select name="selected_id" onchange="if(this.options[this.selectedIndex].value != -1){ forms[\'jumpbox\'].submit() }">';
	$boxstring .= '<option value="-1">' . $lang['Select_forum'] . '</option><option value="-1"></option>' . get_tree_option(POST_FORUM_URL . $match_forum_id, false, $main_menu_cat);
	$boxstring .= '</select>';

	// add SID if missing
	if ( !empty($SID) )
	{
		$boxstring .= '<input type="hidden" name="sid" value="' . $userdata['session_id'] . '" />';
	}

	// dump this to template
	$template->set_filenames(array(
		'jumpbox' => 'jumpbox.tpl')
	);
	$template->assign_vars(array(
		'L_GO' => $lang['Go'],
		'L_JUMP_TO' => $lang['Jump_to'],
		'L_SELECT_FORUM' => $lang['Select_forum'],

		'S_JUMPBOX_SELECT' => $boxstring,
		'S_JUMPBOX_ACTION' => append_sid($action))
	);
	$template->assign_var_from_handle('JUMPBOX', 'jumpbox');

	return;
}

//--------------------------------------------------------------------------------------------------
//
// selectbox() : replace the original phpBB function_admin/make_forum_select()
//
//--------------------------------------------------------------------------------------------------
function selectbox($box_name, $ignore_forum = false, $select_forum = '', $select_cat = '')
{
	$s_id = ($select_forum != '') ? POST_FORUM_URL . $select_forum : '';
	$select_cat = ($select_cat != '') ? POST_CAT_URL . $select_cat : '';
	$s_list = get_tree_option($select_forum, false, $select_cat);
	$res = '<select name="' . $box_name . '">' . $s_list . '</select>';
	return $res;
}
//-- fin mod : categories hierarchy ----------------------------------------------------------------


//-- mod : post icon -------------------------------------------------------------------------------
//-- add
function get_icon_title($icon, $empty=0, $topic_type=-1, $admin=false)
{
	global $lang, $images, $phpEx, $phpbb_root_path;

	// get icons parameters
	include($phpbb_root_path . './includes/def_icons.' . $phpEx);

	// admin path
	$admin_path = ($admin) ? '../' : './';

	// alignment
	switch ($empty)
	{
		case 1:
			$align= 'middle';
			break;
		case 2:
			$align= 'bottom';
			break;
		default:
			$align = 'absbottom';
			break;
	}

	// find the icon
	$found = false;
	$icon_map = -1;
	for ($i=0; ($i < count($icones)) && !$found; $i++)
	{
		if ($icones[$i]['ind'] == $icon)
		{
			$found = true;
			$icon_map = $i;
		}
	}

	// icon not found : try a default value
	if (!$found || ($found && empty($icones[$icon_map]['img'])))
	{
		$change = true;
		switch($topic_type)
		{
			case POST_NORMAL:
				$icon = $icon_defined_special['POST_NORMAL']['icon'];
				break;
			case POST_STICKY:
				$icon = $icon_defined_special['POST_STICKY']['icon'];
				break;
			case POST_ANNOUNCE:
				$icon = $icon_defined_special['POST_ANNOUNCE']['icon'];
				break;
			case POST_GLOBAL_ANNOUNCE:
				$icon = $icon_defined_special['POST_GLOBAL_ANNOUNCE']['icon'];
				break;
			case POST_BIRTHDAY:
				$icon = $icon_defined_special['POST_BIRTHDAY']['icon'];
				break;
			case POST_CALENDAR:
				$icon = $icon_defined_special['POST_CALENDAR']['icon'];
				break;
			case POST_PICTURE:
				$icon = $icon_defined_special['POST_PICTURE']['icon'];
				break;
			case POST_ATTACHMENT:
				$icon = $icon_defined_special['POST_ATTACHEMENT']['icon'];
				break;
			default:
				$change=false;
				break;
		}

		// a default icon has been sat
		if ($change)
		{
			// find the icon
			$found = false;
			$icon_map = -1;
			for ($i=0; ($i < count($icones)) && !$found; $i++)
			{
				if ($icones[$i]['ind'] == $icon)
				{
					$found = true;
					$icon_map = $i;
				}
			}
		}
	}

	// build the icon image
	if (!$found || ($found && empty($icones[$icon_map]['img'])))
	{
		switch ($empty)
		{
			case 0:
				$res = '';
				break;
			case 1:
				$res = '';
				break;
			case 2:
				$res = isset($lang[ $icones[$icon_map]['alt'] ]) ? $lang[ $icones[$icon_map]['alt'] ] : $icones[$icon_map]['alt'];
				break;
		}
	}
	else
	{
		$res = '<img align="' . $align . '" src="' . ( isset($images[ $icones[$icon_map]['img'] ]) ? $admin_path . $images[ $icones[$icon_map]['img'] ] : $admin_path . $icones[$icon_map]['img'] ) . '" alt="' . ( isset($lang[ $icones[$icon_map]['alt'] ]) ? $lang[ $icones[$icon_map]['alt'] ] : $icones[$icon_map]['alt'] ) . '" border="0">&nbsp;';
	}

	return $res;
}
//-- fin mod : post icon ---------------------------------------------------------------------------

//-- mod : topic display order ---------------------------------------------------------------------
//-- add
// build a list of the sortable fields or return field name
function get_forum_display_sort_option($selected_row=0, $action='list', $list='sort')
{
	global $lang;	

	$forum_display_sort = array(
		'lang_key'	=> array('Sort_Time', 'Sort_Topic_Title', 'Last_Post', 'Sort_Author', 'Sort_Views', 'Sort_Replies', 'Sort_Icon'),
		'fields'	=> array('t.topic_time', 't.topic_title', 't.topic_last_post_id', 'u.username', 't.topic_views', 't.topic_replies', 't.topic_icon'),
	);

	$forum_display_sort_extend = array(
		'lang_key'	=> array('Sort_Time', 'Sort_Topic_Title', 'Last_Post', 'Sort_Author', 'Sort_Views', 'Sort_Replies', 'Sort_Icon', 'sort_remark1', 'sort_remark2', 'sort_remark3', 'sort_remark4', 'sort_remark5', 'sort_remark6', 'sort_remark7', 'sort_remark8', 'sort_remark9', 'sort_remark10', 'sort_remark11', 'sort_remark12', 'sort_remark13', 'sort_remark14', 'sort_remark15'),
		'fields'	=> array('t.topic_time', 't.topic_title', 't.topic_last_post_id', 'u.username', 't.topic_views', 't.topic_replies', 't.topic_icon', 'pt.remark1', 'pt.remark2', 'pt.remark3', 'pt.remark4', 'pt.remark5', 'pt.remark6', 'pt.remark7', 'pt.remark8', 'pt.remark9', 'pt.remark10', 'pt.remark11', 'pt.remark12', 'pt.remark13', 'pt.remark14', 'pt.remark15'),
	);

	$forum_display_order = array(
		'lang_key'	=> array('Sort_Descending', 'Sort_Ascending'),
		'fields'	=> array('DESC', 'ASC'),
	);

	// get the good list
	$list_name = 'forum_display_' . $list;
	$listrow = $$list_name;

	// init the result
	$res = '';
	if ( $selected_row > count($listrow['lang_key']) )
	{
		$selected_row = 0;
	}

	// build list
	if ($action == 'list')
	{
		for ($i=0; $i < count($listrow['lang_key']); $i++)
		{
			$selected = ($i==$selected_row) ? ' selected="selected"' : '';
			$l_value = (isset($lang[$listrow['lang_key'][$i]])) ? $lang[$listrow['lang_key'][$i]] : $listrow['lang_key'][$i];
			$res .= '<option value="' . $i . '"' . $selected . '>' . $l_value . '</option>';
		}
	}
	else
	{
		// field
		$res = $listrow['fields'][$selected_row];
	}
	return $res;
}
//-- fin mod : topic display order -----------------------------------------------------------------

function get_db_stat($mode)
{
	global $db;

	switch( $mode )
	{
		case 'usercount':
			$sql = "SELECT COUNT(user_id) AS total
				FROM " . USERS_TABLE . "
				WHERE user_id <> " . ANONYMOUS;
			break;

		case 'newestuser':
			$sql = "SELECT user_id, username
				FROM " . USERS_TABLE . "
				WHERE user_id <> " . ANONYMOUS . "
				ORDER BY user_id DESC
				LIMIT 1";
			break;

		case 'postcount':
		case 'topiccount':
			$sql = "SELECT SUM(forum_topics) AS topic_total, SUM(forum_posts) AS post_total
				FROM " . FORUMS_TABLE;
			break;
	}

	if ( !($result = $db->sql_query($sql)) )
	{
		return false;
	}

	$row = $db->sql_fetchrow($result);

	switch ( $mode )
	{
		case 'usercount':
			return $row['total'];
			break;
		case 'newestuser':
			return $row;
			break;
		case 'postcount':
			return $row['post_total'];
			break;
		case 'topiccount':
			return $row['topic_total'];
			break;
	}

	return false;
}

//
// Get Userdata, $user can be username or user_id. If force_str is true, the username will be forced.
//
function get_userdata($user, $force_str = false)
{
	global $db;

	if (intval($user) == 0 || $force_str)
	{
		$user = trim(htmlspecialchars($user));
		$user = substr(str_replace("\\'", "'", $user), 0, 25);
		$user = str_replace("'", "\\'", $user);
	}
	else
	{
		$user = intval($user);
	}

	$sql = "SELECT *
		FROM " . USERS_TABLE . " 
		WHERE ";
	$sql .= ( ( is_integer($user) ) ? "user_id = $user" : "username = '" .  $user . "'" ) . " AND user_id <> " . ANONYMOUS;
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Tried obtaining data for a non-existent user', '', __LINE__, __FILE__, $sql);
	}

	return ( $row = $db->sql_fetchrow($result) ) ? $row : false;
}

function make_jumpbox($action, $match_forum_id = 0)
{
	global $template, $userdata, $lang, $db, $nav_links, $phpEx, $SID;

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
	return jumpbox($action, $match_forum_id);
//-- fin mod : categories hierarchy ----------------------------------------------------------------

//	$is_auth = auth(AUTH_VIEW, AUTH_LIST_ALL, $userdata);

	$sql = "SELECT c.cat_id, c.cat_title, c.cat_order
		FROM " . CATEGORIES_TABLE . " c, " . FORUMS_TABLE . " f
		WHERE f.cat_id = c.cat_id
		GROUP BY c.cat_id, c.cat_title, c.cat_order
		ORDER BY c.cat_order";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Couldn't obtain category list.", "", __LINE__, __FILE__, $sql);
	}
	
	$category_rows = array();
	while ( $row = $db->sql_fetchrow($result) )
	{
		$category_rows[] = $row;
	}

	if ( $total_categories = count($category_rows) )
	{
		$sql = "SELECT *
			FROM " . FORUMS_TABLE . "
			ORDER BY cat_id, forum_order";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not obtain forums information', '', __LINE__, __FILE__, $sql);
		}

		$boxstring = '<select name="' . POST_FORUM_URL . '" onchange="if(this.options[this.selectedIndex].value != -1){ forms[\'jumpbox\'].submit() }"><option value="-1">' . $lang['Select_forum'] . '</option>';

		$forum_rows = array();
		while ( $row = $db->sql_fetchrow($result) )
		{
			$forum_rows[] = $row;
		}

		if ( $total_forums = count($forum_rows) )
		{
			for($i = 0; $i < $total_categories; $i++)
			{
				$boxstring_forums = '';
				for($j = 0; $j < $total_forums; $j++)
				{
					if ( $forum_rows[$j]['cat_id'] == $category_rows[$i]['cat_id'] && $forum_rows[$j]['auth_view'] <= AUTH_REG )
					{

//					if ( $forum_rows[$j]['cat_id'] == $category_rows[$i]['cat_id'] && $is_auth[$forum_rows[$j]['forum_id']]['auth_view'] )
//					{
						$selected = ( $forum_rows[$j]['forum_id'] == $match_forum_id ) ? 'selected="selected"' : '';
						$boxstring_forums .=  '<option value="' . $forum_rows[$j]['forum_id'] . '"' . $selected . '>' . $forum_rows[$j]['forum_name'] . '</option>';

						//
						// Add an array to $nav_links for the Mozilla navigation bar.
						// 'chapter' and 'forum' can create multiple items, therefore we are using a nested array.
						//
						$nav_links['chapter forum'][$forum_rows[$j]['forum_id']] = array (
							'url' => append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=" . $forum_rows[$j]['forum_id']),
							'title' => $forum_rows[$j]['forum_name']
						);
								
					}
				}

				if ( $boxstring_forums != '' )
				{
					$boxstring .= '<option value="-1">&nbsp;</option>';
					$boxstring .= '<option value="-1">' . $category_rows[$i]['cat_title'] . '</option>';
					$boxstring .= '<option value="-1">----------------</option>';
					$boxstring .= $boxstring_forums;
				}
			}
		}

		$boxstring .= '</select>';
	}
	else
	{
		$boxstring .= '<select name="' . POST_FORUM_URL . '" onchange="if(this.options[this.selectedIndex].value != -1){ forms[\'jumpbox\'].submit() }"></select>';
	}

	if ( !empty($SID) )
	{
		$boxstring .= '<input type="hidden" name="sid" value="' . $userdata['session_id'] . '" />';
	}

	$template->set_filenames(array(
		'jumpbox' => 'jumpbox.tpl')
	);
	$template->assign_vars(array(
		'L_GO' => $lang['Go'],
		'L_JUMP_TO' => $lang['Jump_to'],
		'L_SELECT_FORUM' => $lang['Select_forum'],

		'S_JUMPBOX_SELECT' => $boxstring,
		'S_JUMPBOX_ACTION' => append_sid($action))
	);
	$template->assign_var_from_handle('JUMPBOX', 'jumpbox');

	return;
}

//
// Initialise user settings on page load
function init_userprefs($userdata)
{
	global $board_config, $theme, $images;
	global $template, $lang, $phpEx, $phpbb_root_path;
	global $nav_links;

	if ( $userdata['user_id'] != ANONYMOUS )
	{
		if ( !empty($userdata['user_lang']))
		{
			$board_config['default_lang'] = $userdata['user_lang'];
		}

		if ( !empty($userdata['user_dateformat']) )
		{
			$board_config['default_dateformat'] = $userdata['user_dateformat'];
		}

		if ( isset($userdata['user_timezone']) )
		{
			$board_config['board_timezone'] = $userdata['user_timezone'];
		}
	}

	if ( !file_exists(@phpbb_realpath($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_main.'.$phpEx)) )
	{
		$board_config['default_lang'] = 'korean';
	}

	include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_main.' . $phpEx);

	if ( defined('IN_ADMIN') )
	{
		if( !file_exists(@phpbb_realpath($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_admin.'.$phpEx)) )
		{
			$board_config['default_lang'] = 'korean';
		}

		include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_admin.' . $phpEx);
	}

	include_attach_lang();

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
	global $tree;
	if (empty($tree['auth'])) get_user_tree($userdata);
//-- fin mod : categories hierarchy ----------------------------------------------------------------

	//
	// Set up style
	//
	if ( !$board_config['override_user_style'] )
	{
		if ( $userdata['user_id'] != ANONYMOUS && $userdata['user_style'] > 0 )
		{
			if ( $theme = setup_style($userdata['user_style']) )
			{
				return;
			}
		}
	}

	$theme = setup_style($board_config['default_style']);

	//
	// Mozilla navigation bar
	// Default items that should be valid on all pages.
	// Defined here to correctly assign the Language Variables
	// and be able to change the variables within code.
	//
	$nav_links['top'] = array ( 
		'url' => append_sid($phpbb_root_path . 'index.' . $phpEx),
		'title' => sprintf($lang['Forum_Index'], $board_config['sitename'])
	);
	$nav_links['search'] = array ( 
		'url' => append_sid($phpbb_root_path . 'search.' . $phpEx),
		'title' => $lang['Search']
	);
	$nav_links['help'] = array ( 
		'url' => append_sid($phpbb_root_path . 'faq.' . $phpEx),
		'title' => $lang['FAQ']
	);
	$nav_links['author'] = array ( 
		'url' => append_sid($phpbb_root_path . 'memberlist.' . $phpEx),
		'title' => $lang['Memberlist']
	);

	return;
}

function setup_style($style)
{
	global $db, $board_config, $template, $images, $phpbb_root_path;

	$sql = "SELECT *
		FROM " . THEMES_TABLE . "
		WHERE themes_id = $style";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(CRITICAL_ERROR, 'Could not query database for theme info');
	}

	if ( !($row = $db->sql_fetchrow($result)) )
	{
		message_die(CRITICAL_ERROR, "Could not get theme data for themes_id [$style]");
	}

	$template_path = 'templates/' ;
	$template_name = $row['template_name'] ;

	$template = new Template($phpbb_root_path . $template_path . $template_name);

	if ( $template )
	{
		$current_template_path = $template_path . $template_name;
		@include($phpbb_root_path . $template_path . $template_name . '/' . $template_name . '.cfg');

		if ( !defined('TEMPLATE_CONFIG') )
		{
			message_die(CRITICAL_ERROR, "Could not open $template_name template config file", '', __LINE__, __FILE__);
		}

		$img_lang = ( file_exists(@phpbb_realpath($phpbb_root_path . $current_template_path . '/images/lang_' . $board_config['default_lang'])) ) ? $board_config['default_lang'] : 'korean';

		while( list($key, $value) = @each($images) )
		{
			if ( !is_array($value) )
			{
				$images[$key] = str_replace('{LANG}', 'lang_' . $img_lang, $value);
			}
		}
	}

	return $row;
}

function encode_ip($dotquad_ip)
{
	$ip_sep = explode('.', $dotquad_ip);
	return sprintf('%02x%02x%02x%02x', $ip_sep[0], $ip_sep[1], $ip_sep[2], $ip_sep[3]);
}

function decode_ip($int_ip)
{
	$hexipbang = explode('.', chunk_split($int_ip, 2, '.'));
	return hexdec($hexipbang[0]). '.' . hexdec($hexipbang[1]) . '.' . hexdec($hexipbang[2]) . '.' . hexdec($hexipbang[3]);
}

//
// Create date/time from format and timezone
//
function create_date($format, $gmepoch, $tz)
{
	global $board_config, $lang;
	static $translate;

	if ( empty($translate) && $board_config['default_lang'] != 'korean' )
	{
		@reset($lang['datetime']);
		while ( list($match, $replace) = @each($lang['datetime']) )
		{
			$translate[$match] = $replace;
		}
	}

	return ( !empty($translate) ) ? strtr(@gmdate($format, $gmepoch + (3600 * $tz)), $translate) : @gmdate($format, $gmepoch + (3600 * $tz));
}

//
// Pagination routine, generates
// page number sequence
//
function generate_pagination($base_url, $num_items, $per_page, $start_item, $add_prevnext_text = TRUE)
{
	global $lang;
	global $theme;

	$total_pages = ceil($num_items/$per_page);

	if ( $total_pages == 1 )
	{
		return '';
	}

	$on_page = floor($start_item / $per_page) + 1;

	$page_string = '';
	if ( $total_pages > 10 )
	{
		$init_page_max = ( $total_pages > 3 ) ? 3 : $total_pages;

		for($i = 1; $i < $init_page_max + 1; $i++)
		{
			$page_string .= ( $i == $on_page ) ? '<b>[' . $i . ']</b>' : '<a href="' . append_sid($base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) ) . '">[' . $i . ']</a>';
			if ( $i <  $init_page_max )
			{
				$page_string .= " ";
			}
		}

		if ( $total_pages > 3 )
		{
			if ( $on_page > 1  && $on_page < $total_pages )
			{
				$page_string .= ( $on_page > 5 ) ? ' ... ' : ' ';

				$init_page_min = ( $on_page > 4 ) ? $on_page : 5;
				$init_page_max = ( $on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;

				for($i = $init_page_min - 1; $i < $init_page_max + 2; $i++)
				{
					$page_string .= ($i == $on_page) ? '<b>[' . $i . ']</b>' : '<a href="' . append_sid($base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) ) . '">[' . $i . ']</a>';
					if ( $i <  $init_page_max + 1 )
					{
						$page_string .= ' ';
					}
				}

				$page_string .= ( $on_page < $total_pages - 4 ) ? ' ... ' : ' ';
			}
			else
			{
				$page_string .= ' ... ';
			}

			for($i = $total_pages - 2; $i < $total_pages + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<b>[' . $i . ']</b>'  : '<a href="' . append_sid($base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) ) . '">[' . $i . ']</a>';
				if( $i <  $total_pages )
				{
					$page_string .= " ";
				}
			}
		}
	}
	else
	{
		for($i = 1; $i < $total_pages + 1; $i++)
		{
			$page_string .= ( $i == $on_page ) ? '<b>[' . $i . ']</b>' : '<a href="' . append_sid($base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) ) . '">[' . $i . ']</a>';
			if ( $i <  $total_pages )
			{
				$page_string .= ' ';
			}
		}
	}

	if ( $add_prevnext_text )
	{
		if ( $on_page > 1 )
		{
			$page_string = ' <a href="' . append_sid($base_url . "&amp;start=" . ( ( $on_page - 2 ) * $per_page ) ) . '">' . '<img src="templates/'.$theme['template_name'].'/images/board_arrow_l.gif" border="0" align="absmiddle">' . '</a>&nbsp;&nbsp;' . $page_string;
		}

		if ( $on_page < $total_pages )
		{
			$page_string .= '&nbsp;&nbsp;<a href="' . append_sid($base_url . "&amp;start=" . ( $on_page * $per_page ) ) . '">' . '<img src="templates/'.$theme['template_name'].'/images/board_arrow_r.gif" border="0" align="absmiddle">' . '</a>';
		}

	}

	//combo-box
	$combo_string = '<br><br>'. $lang['menu_lang_pagejump'] .' : <select name="selectPage" size="1" onchange="if(this.options[this.selectedIndex].value != -1){location.replace(this.options[this.selectedIndex].value);}">';
	for($i = 1; $i < $total_pages + 1; $i++)
	{
		$combo_string .= ( $i == $on_page ) ? '<option value="-1" selected>' . $i . '</option>' : '<option value="' . append_sid($base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) ) . '">' . $i . '</option>';
	}
	$combo_string .= "</select>";
	$page_string .= $combo_string;
			

	//$page_string = $lang['Goto_page'] . ' ' . $page_string;	

	return $page_string;
}

//
// This does exactly what preg_quote() does in PHP 4-ish
// If you just need the 1-parameter preg_quote call, then don't bother using this.
//
function phpbb_preg_quote($str, $delimiter)
{
	$text = preg_quote($str);
	$text = str_replace($delimiter, '\\' . $delimiter, $text);
	
	return $text;
}

//
// Obtain list of naughty words and build preg style replacement arrays for use by the
// calling script, note that the vars are passed as references this just makes it easier
// to return both sets of arrays
//
function obtain_word_list(&$orig_word, &$replacement_word)
{
	global $db;

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
	global $global_orig_word, $global_replacement_word;

	if (isset($global_orig_word))
	{
		$orig_word			= $global_orig_word;
		$replacement_word	= $global_replacement_word;
	}
	else
	{
//-- fin mod : categories hierarchy ----------------------------------------------------------------

	//
	// Define censored word matches
	//
	$sql = "SELECT word, replacement
		FROM  " . WORDS_TABLE;
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not get censored words from database', '', __LINE__, __FILE__, $sql);
	}

	if ( $row = $db->sql_fetchrow($result) )
	{
		do 
		{
			//$orig_word[] = '#\b(' . str_replace('\*', '\w*?', phpbb_preg_quote($row['word'], '#')) . ')\b#i';
			$orig_word[] = '/'.preg_quote($row['word'], "/").'/';
			$replacement_word[] = $row['replacement'];
		}
		while ( $row = $db->sql_fetchrow($result) );
	}

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
		$global_orig_word			= $orig_word;
		$global_replacement_word	= $replacement_word;
	}
//-- fin mod : categories hierarchy ----------------------------------------------------------------

	return true;
}

//
// This is general replacement for die(), allows templated
// output in users (or default) language, etc.
//
// $msg_code can be one of these constants:
//
// GENERAL_MESSAGE : Use for any simple text message, eg. results 
// of an operation, authorisation failures, etc.
//
// GENERAL ERROR : Use for any error which occurs _AFTER_ the 
// common.php include and session code, ie. most errors in 
// pages/functions
//
// CRITICAL_MESSAGE : Used when basic config data is available but 
// a session may not exist, eg. banned users
//
// CRITICAL_ERROR : Used when config data cannot be obtained, eg
// no database connection. Should _not_ be used in 99.5% of cases
//
function message_die($msg_code, $msg_text = '', $msg_title = '', $err_line = '', $err_file = '', $sql = '')
{
	global $db, $template, $board_config, $theme, $lang, $phpEx, $phpbb_root_path, $nav_links, $gen_simple_header, $images;
	global $userdata, $user_ip, $session_length;
	global $starttime;
	global $main_menu_fields, $upload_dir, $page_title;
	global $HTTP_COOKIE_VARS, $HTTP_GET_VARS, $HTTP_POST_VARS, $SID, $fids;
	global $qbar_maps,$sub_menus,$sub_menus_urls,$sub_menus_names, $sub_menus_keys;

	

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
	global $tree;
//-- fin mod : categories hierarchy ----------------------------------------------------------------

//-- mod : qbar ------------------------------------------------------------------------------------ 
//-- add 
//-- fix 
   global $sub_template_key_image, $sub_templates, $qbar_maps; 
//-- fin mod : qbar --------------------------------------------------------------------------------

//print_r($HTTP_POST_VARS);

	if(defined('HAS_DIED'))
	{
		die("message_die() was called multiple times. This isn't supposed to happen. Was message_die() used in page_tail.php?");
	}
	
	define(HAS_DIED, 1);
	

	$sql_store = $sql;
	
	//
	// Get SQL error if we are debugging. Do this as soon as possible to prevent 
	// subsequent queries from overwriting the status of sql_error()
	//
	if ( DEBUG && ( $msg_code == GENERAL_ERROR || $msg_code == CRITICAL_ERROR ) )
	{
		$sql_error = $db->sql_error();

		$debug_text = '';

		if ( $sql_error['message'] != '' )
		{
			$debug_text .= '<br /><br />SQL Error : ' . $sql_error['code'] . ' ' . $sql_error['message'];
		}

		if ( $sql_store != '' )
		{
			$debug_text .= "<br /><br />$sql_store";
		}

		if ( $err_line != '' && $err_file != '' )
		{
			$debug_text .= '</br /><br />Line : ' . $err_line . '<br />File : ' . $err_file;
		}
	}

	if( empty($userdata) && ( $msg_code == GENERAL_MESSAGE || $msg_code == GENERAL_ERROR ) )
	{
		$userdata = session_pagestart($user_ip, PAGE_INDEX);
		init_userprefs($userdata);
	}

	//
	// If the header hasn't been output then do it
	//
	if ( !defined('HEADER_INC') && $msg_code != CRITICAL_ERROR )
	{
		if ( empty($lang) )
		{
			if ( !empty($board_config['default_lang']) )
			{
				include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_main.'.$phpEx);
			}
			else
			{
				include($phpbb_root_path . 'language/lang_korean/lang_main.'.$phpEx);
			}
		}

		if ( empty($template) )
		{
			$template = new Template($phpbb_root_path . 'templates/' . $board_config['board_template']);
		}
		if ( empty($theme) )
		{
			$theme = setup_style($board_config['default_style']);
		}

		//
		// Load the Page Header
		//
		if ( !defined('IN_ADMIN') )
		{
			$page_title = $lang['Information'];
			include($phpbb_root_path . 'includes/page_header.'.$phpEx);
		}
		else
		{
			$page_title = $lang['Information'];
			include($phpbb_root_path . 'admin/page_header_admin.'.$phpEx);
		}
	}

	switch($msg_code)
	{
		case GENERAL_MESSAGE:
			if ( $msg_title == '' )
			{
				$msg_title = $lang['Information'];
			}
			break;

		case CRITICAL_MESSAGE:
			if ( $msg_title == '' )
			{
				$msg_title = $lang['Critical_Information'];
			}
			break;

		case GENERAL_ERROR:
			if ( $msg_text == '' )
			{
				$msg_text = $lang['An_error_occured'];
			}

			if ( $msg_title == '' )
			{
				$msg_title = $lang['General_Error'];
			}
			break;

		case CRITICAL_ERROR:
			//
			// Critical errors mean we cannot rely on _ANY_ DB information being
			// available so we're going to dump out a simple echo'd statement
			//
			include($phpbb_root_path . 'language/lang_korean/lang_main.'.$phpEx);

			if ( $msg_text == '' )
			{
				$msg_text = $lang['A_critical_error'];
			}

			if ( $msg_title == '' )
			{
				$msg_title = ' <b>' . $lang['Critical_Error'] . '</b>';
			}
			break;
	}

	//
	// Add on DEBUG info if we've enabled debug mode and this is an error. This
	// prevents debug info being output for general messages should DEBUG be
	// set TRUE by accident (preventing confusion for the end user!)
	//
	if ( DEBUG && ( $msg_code == GENERAL_ERROR || $msg_code == CRITICAL_ERROR ) )
	{
		if ( $debug_text != '' )
		{
			$msg_text = $msg_text . '<br /><br /><b><u>DEBUG MODE</u></b>' . $debug_text;
		}
	}

	if ( $msg_code != CRITICAL_ERROR )
	{
		if ( !empty($lang[$msg_text]) )
		{
			$msg_text = $lang[$msg_text];
		}

		if ( !defined('IN_ADMIN') )
		{
			$template->set_filenames(array(
				'message_body' => 'message_body.tpl')
			);
		}
		else
		{
			$template->set_filenames(array(
				'message_body' => 'admin/admin_message_body.tpl')
			);
		}

		$template->assign_vars(array(
			'MESSAGE_TITLE' => $msg_title,
			'MESSAGE_TEXT' => $msg_text)
		);
		$template->pparse('message_body');

		if ( !defined('IN_ADMIN') )
		{
			include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
		}
		else
		{
			include($phpbb_root_path . 'admin/page_footer_admin.'.$phpEx);
		}
	}
	else
	{
		echo "<html>\n<body>\n" . $msg_title . "\n<br /><br />\n" . $msg_text . "</body>\n</html>";
	}

	exit;
}

//
// This function is for compatibility with PHP 4.x's realpath()
// function.  In later versions of PHP, it needs to be called
// to do checks with some functions.  Older versions of PHP don't
// seem to need this, so we'll just return the original value.
// dougk_ff7 <October 5, 2002>
function phpbb_realpath($path)
{
	global $phpbb_root_path, $phpEx;

	return (!@function_exists('realpath') || !@realpath($phpbb_root_path . 'includes/functions.'.$phpEx)) ? $path : @realpath($path);
}

function redirect($url)
{
	global $db, $board_config;

	if (!empty($db))
	{
		$db->sql_close();
	}

	$server_protocol = ($board_config['cookie_secure']) ? 'https://' : 'http://';
	$server_name = preg_replace('#^\/?(.*?)\/?$#', '\1', trim($board_config['server_name']));
	$server_port = ($board_config['server_port'] <> 80) ? ':' . trim($board_config['server_port']) : '';
	$script_name = preg_replace('#^\/?(.*?)\/?$#', '\1', trim($board_config['script_path']));
	$script_name = ($script_name == '') ? $script_name : '/' . $script_name;
	$url = preg_replace('#^\/?(.*?)\/?$#', '/\1', trim($url));

	// Redirect via an HTML form for PITA webservers
	if (@preg_match('/Microsoft|WebSTAR|Xitami/', getenv('SERVER_SOFTWARE')))
	{
		header('Refresh: 0; URL=' . $server_protocol . $server_name . $server_port . $script_name . $url);
		echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><meta http-equiv="refresh" content="0; url=' . $server_protocol . $server_name . $server_port . $script_name . $url . '"><title>Redirect</title></head><body><div align="center">If your browser does not support meta redirection please click <a href="' . $server_protocol . $server_name . $server_port . $script_name . $url . '">HERE</a> to be redirected</div></body></html>';
		exit;
	}

	// Behave as per HTTP/1.1 spec for others
	header('Location: ' . $server_protocol . $server_name . $server_port . $script_name . $url);
	exit;
}

function mod_color($orig_color, $mod, $mod_color){
   /*
       $orig_color - original html color, hex
       $mod_color - modifying color, hex
       $mod - modifier '+' or '-'
       usage: mod_color('CCCCCC', '+', '000033')
   */
   // does quick validation
   preg_match("/([0-9]|[A-F]){6}/i",$orig_color,$orig_arr);
   preg_match("/([0-9]|[A-F]){6}/i",$mod_color,$mod_arr);
   if ($orig_arr[0] && $mod_arr[0]) {
       for ($i=0; $i<6; $i=$i+2) {
           $orig_x = substr($orig_arr[0],$i,2);
           $mod_x = substr($mod_arr[0],$i,2);
           if ($mod == '+') { $new_x = hexdec($orig_x) + hexdec($mod_x); }
           else { $new_x = hexdec($orig_x) - hexdec($mod_x); }
           if ($new_x < 0) { $new_x = 0; }
           else if ($new_x > 255) { $new_x = 255; };
           $new_x = dechex($new_x);
           $ret .= $new_x;
       }
       return $ret;
   } else { return false; }
}

function mod_color_rate($orig_color, $rate){

   preg_match("/([0-9]|[A-F]){6}/i",$orig_color,$orig_arr);


   if ($orig_arr[0]) {

       for ($i=0; $i<6; $i=$i+2) {
           $orig_x = substr($orig_arr[0],$i,2);
           $new_x = hexdec($orig_x) + round((255-hexdec($orig_x))* $rate); 

           if ($new_x < 0) { $new_x = 0; }
           else if ($new_x > 255) { $new_x = 255; };

           $new_x = dechex($new_x);
           $ret .= $new_x;
       }
       return $ret;
   } else { return '000000'; }
}

function flashVarsEncode($str){

	$str = str_replace("%","%25",$str);
	$str = str_replace("+","%2B",$str);
	$str = str_replace(" ","%20",$str);	
	$str = str_replace("=","%3D",$str);
	$str = str_replace("&","%26",$str);
	$str = str_replace('"',"%22",$str);
	$str = str_replace("'","%27",$str);
	$str = str_replace("<","%3C",$str);
	$str = str_replace(">","%3E",$str);

	 return $str;

}


function saveSubTPL(){
	
	global $sub_templates, $phpbb_root_path, $theme;

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
}

?>