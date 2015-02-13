<?php

define('IN_PHPBB', 1);


//
// Load default header
//
$no_page_header = TRUE;
$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);

//
// Increase maximum execution time, but don't complain about it if it isn't
// allowed.
//
@set_time_limit(1200);

//
// Begin program
//
if( isset($HTTP_GET_VARS['gid']) || isset($HTTP_POST_VARS['gid']) )
{
	$gid = (isset($HTTP_POST_VARS['gid'])) ? $HTTP_POST_VARS['gid'] : $HTTP_GET_VARS['gid'];	

	if( !isset($HTTP_POST_VARS['startdownload']) && !isset($HTTP_GET_VARS['startdownload']) )
	{
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang['ENCODING'] ?>"  />
<?php echo '<meta http-equiv="refresh" content="2;url=' . append_sid("csv_download.$phpEx?gid=$gid&startdownload=1") . '">' ?>
<title>CSV-Download</title>
</head>
<body bgcolor="white" text="#646464" link="#A6A6A6" vlink="#646464">

<br />

<table width="100%" cellpadding="4" cellspacing="1" border="0">
	<tr>
		<th align="center"><font size=2>CSV-Download</font></th>
	</tr>
	<tr>
		<td width="100%" align="center"><font size=2>Downloading...</font></td>
	</tr>
</table>
</body>
</html>
<?php

		exit;
	}


	//
	// Build the csv file...
	//

	if($gid >= -1) {
		// Query users info...
		if($gid == -1) {//all-user			
		
			$sql = "SELECT * 
					FROM ".USERS_TABLE."
					WHERE user_id > 0
					ORDER BY user_id asc";
			if(!$result = $db->sql_query($sql))
			{
				message_die(GENERAL_ERROR, "Could not query Users information-1", "", __LINE__, __FILE__, $sql);
			}
		}
		else {//specific-group

			$sql = "SELECT u.*  
				FROM " . USERS_TABLE . " u, " . USER_GROUP_TABLE . " ug
				WHERE ug.group_id = $gid
					AND u.user_id = ug.user_id
					AND ug.user_pending = 0 
				ORDER BY u.user_id asc"; 
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not query Users information-3', '', __LINE__, __FILE__, $sql);
			}
		}

		//message_die(GENERAL_ERROR, $group_name);

		header("Pragma: no-cache");
		header("Content-Type: text/x-delimtext; name=\"userlist.csv\"");
		header("Content-disposition: attachment; filename=\"userlist.csv\"");

		echo	'id'.",". //for sylk error
					$lang['realname'].",".
					$lang['Email'].",".

					$board_config['title_remark1'].",".
					$board_config['title_remark2'].",".
					$board_config['title_remark3'].",".
					$board_config['title_remark4'].",".
					$board_config['title_remark5'].",".
					$board_config['title_remark6'].",".
					$board_config['title_remark7'].",".
					$board_config['title_remark8'].",".
					$board_config['title_remark9'].",".
					$board_config['title_remark10'].",".
					$board_config['title_remark11'].",".
					$board_config['title_remark12'].",".
					$board_config['title_remark13'].",".
					$board_config['title_remark14'].",".
					$board_config['title_remark15'].",".
					$board_config['title_remark16'].",".
					$board_config['title_remark17'].",".
					$board_config['title_remark18'].",".
					$board_config['title_remark19'].",".
					$board_config['title_remark20'].",".

					$lang['Jumin'].",".
					$lang['Location'].",".
					$lang['Zipcode'].",".
					$lang['hand_phone'].",".
					$lang['my_phone'];
		echo "\n";

		//process user-info
		while( $row = $db->sql_fetchrow($result) )
		{
			//remove comma
			$row['username'] = trim(str_replace(",", " ", $row['username']));
			$row['user_realname'] = trim(str_replace(",", " ", $row['user_realname']));
			$row['user_email'] = trim(str_replace(",", " ", $row['user_email']));

			$row['user_remark1'] = trim(str_replace(",", " ", $row['user_remark1']));
			$row['user_remark2'] = trim(str_replace(",", " ", $row['user_remark2']));
			$row['user_remark3'] = trim(str_replace(",", " ", $row['user_remark3']));
			$row['user_remark4'] = trim(str_replace(",", " ", $row['user_remark4']));
			$row['user_remark5'] = trim(str_replace(",", " ", $row['user_remark5']));
			$row['user_remark6'] = trim(str_replace(",", " ", $row['user_remark6']));
			$row['user_remark7'] = trim(str_replace(",", " ", $row['user_remark7']));
			$row['user_remark8'] = trim(str_replace(",", " ", $row['user_remark8']));
			$row['user_remark9'] = trim(str_replace(",", " ", $row['user_remark9']));
			$row['user_remark10'] = trim(str_replace(",", " ", $row['user_remark10']));
			$row['user_remark11'] = trim(str_replace(",", " ", $row['user_remark11']));
			$row['user_remark12'] = trim(str_replace(",", " ", $row['user_remark12']));
			$row['user_remark13'] = trim(str_replace(",", " ", $row['user_remark13']));
			$row['user_remark14'] = trim(str_replace(",", " ", $row['user_remark14']));
			$row['user_remark15'] = trim(str_replace(",", " ", $row['user_remark15']));
			$row['user_remark16'] = trim(str_replace(",", " ", $row['user_remark16']));
			$row['user_remark17'] = trim(str_replace(",", " ", $row['user_remark17']));
			$row['user_remark18'] = trim(str_replace(",", " ", $row['user_remark18']));
			$row['user_remark19'] = trim(str_replace(",", " ", $row['user_remark19']));
			$row['user_remark20'] = trim(str_replace(",", " ", $row['user_remark20']));


			$row['user_jumin1'] = trim(str_replace(",", " ", $row['user_jumin1']));
			$row['user_jumin2'] = trim(str_replace(",", " ", $row['user_jumin2']));
			$row['user_from'] = trim(str_replace(",", " ", $row['user_from']));
			$row['user_zipcode'] = trim(str_replace(",", " ", $row['user_zipcode']));
			$row['user_hphone'] = trim(str_replace(",", " ", $row['user_hphone']));
			$row['user_mphone'] = trim(str_replace(",", " ", $row['user_mphone']));

			//formatting
			$row['user_from'] = ($row['user_from'] =='/' ? '': $row['user_from']);		
			$row['user_from'] = str_replace("/", " ", $row['user_from']);
			$row['user_zipcode'] = ($row['user_from'] =='' ? '': $row['user_zipcode']);	
			$row['user_hphone'] = ($row['user_hphone'] == '0--' ? '': '0'.$row['user_hphone']);		
			$row['user_mphone'] = ($row['user_mphone'] == '0--' ? '': '0'.$row['user_mphone']);

			echo	$row['username'].",".
						$row['user_realname'].",".
						$row['user_email'].",".

						$row['user_remark1'].",".
						$row['user_remark2'].",".
						$row['user_remark3'].",".
						$row['user_remark4'].",".
						$row['user_remark5'].",".
						$row['user_remark6'].",".
						$row['user_remark7'].",".
						$row['user_remark8'].",".
						$row['user_remark9'].",".
						$row['user_remark10'].",".
						$row['user_remark11'].",".
						$row['user_remark12'].",".
						$row['user_remark13'].",".
						$row['user_remark14'].",".
						$row['user_remark15'].",".
						$row['user_remark16'].",".
						$row['user_remark17'].",".
						$row['user_remark18'].",".
						$row['user_remark19'].",".
						$row['user_remark20'].",".

						$row['user_jumin1']."-".$row['user_jumin2'].",".
						$row['user_from'].",".
						$row['user_zipcode'].",".
						$row['user_hphone'].",".
						$row['user_mphone'];
			echo "\n";
		}
	}
	else {//special-case
		/*sample
		if($gid == -2) {//f-65
			$sql = "SELECT pt.post_subject, pt.remark1, pt.remark2, pt.remark3, pt.remark4, pt.remark5, pt.remark6, pt.remark7, pt.remark8, pt.remark9, pt.remark10, pt.remark11, pt.remark12, pt.remark13, pt.remark14, pt.remark15  
					FROM ". POSTS_TABLE . " p, " . TOPICS_TABLE . " t, " . POSTS_TEXT_TABLE . " pt  
					WHERE (p.post_id = t.topic_last_post_id) AND pt.post_id = p.post_id AND (p.forum_id = 65)  
					ORDER BY p.post_id ASC";

			if(!$result = $db->sql_query($sql))
			{
				message_die(GENERAL_ERROR, "Could not query Users information-3", "", __LINE__, __FILE__, $sql);
			}
			//process user-info
			while( $row = $db->sql_fetchrow($result) )
			{
				//remove comma
				$row['post_subject'] = trim(str_replace(",", " ", $row['post_subject']));
				$row['remark3'] = trim(str_replace(",", " ", $row['remark3']));
				$row['remark7'] = trim(str_replace(",", " ", $row['remark7']));
				$row['remark8'] = trim(str_replace(",", " ", $row['remark8']));

				echo  $row['post_subject'].",".$row['remark3'].",".$row['remark7'].",".",".$row['remark8'];
				echo "\n";
			}
		}
		*/
	}

	exit;
}

//include('./page_footer_admin.'.$phpEx);

?>
