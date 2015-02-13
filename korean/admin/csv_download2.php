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
if(isset($HTTP_GET_VARS['fid']) || isset($HTTP_POST_VARS['fid']))
{	
	$fid = (isset($HTTP_POST_VARS['fid'])) ? $HTTP_POST_VARS['fid'] : $HTTP_GET_VARS['fid'];
	$type = substr($fid, 0, 1);
	$id = intval(substr($fid, 1));

	if( !isset($HTTP_POST_VARS['startdownload']) && !isset($HTTP_GET_VARS['startdownload']) )
	{
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang['ENCODING'] ?>"  />
<?php echo '<meta http-equiv="refresh" content="2;url=' . append_sid("csv_download2.$phpEx?fid=$fid&startdownload=1") . '">' ?>
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
	header("Pragma: no-cache");
	header("Content-Type: text/x-delimtext; name=\"menu.csv\"");
	header("Content-disposition: attachment; filename=\"menu.csv\"");

	//
	// Build the csv file...
	//			

		$sql = "SELECT pt.post_subject, pt.remark1, pt.remark2, pt.remark3, pt.remark4, pt.remark5, pt.remark6, pt.remark7, pt.remark8, pt.remark9, pt.remark10, pt.remark11, pt.remark12, pt.remark13, pt.remark14, pt.remark15, pt.post_text  
				FROM ". POSTS_TABLE . " p, " . TOPICS_TABLE . " t, " . POSTS_TEXT_TABLE . " pt  
				WHERE (p.post_id = t.topic_last_post_id) AND pt.post_id = p.post_id AND (p.forum_id = ".$id .")  
				ORDER BY p.post_id ASC";

		if(!$result = $db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, "Could not query Menu information", "", __LINE__, __FILE__, $sql);
		}
		//process user-info
		while( $row = $db->sql_fetchrow($result) )
		{
			//remove comma
			$row['post_subject'] = trim(str_replace('"', '""', $row['post_subject']));
			$row['remark1'] = trim(str_replace('"', '""', $row['remark1']));
			$row['remark2'] = trim(str_replace('"', '""', $row['remark2']));
			$row['remark3'] = trim(str_replace('"', '""', $row['remark3']));
			$row['remark4'] = trim(str_replace('"', '""', $row['remark4']));
			$row['remark5'] = trim(str_replace('"', '""', $row['remark5']));
			$row['remark6'] = trim(str_replace('"', '""', $row['remark6']));
			$row['remark7'] = trim(str_replace('"', '""', $row['remark7']));
			$row['remark8'] = trim(str_replace('"', '""', $row['remark8']));
			$row['remark9'] = trim(str_replace('"', '""', $row['remark9']));
			$row['remark10'] = trim(str_replace('"', '""', $row['remark10']));
			$row['remark11'] = trim(str_replace('"', '""', $row['remark11']));
			$row['remark12'] = trim(str_replace('"', '""', $row['remark12']));
			$row['remark13'] = trim(str_replace('"', '""', $row['remark13']));
			$row['remark14'] = trim(str_replace('"', '""', $row['remark14']));
			$row['remark15'] = trim(str_replace('"', '""', $row['remark15']));
			$row['post_text'] = trim(str_replace('"', '""', $row['post_text']));

			echo  '"'.$row['post_subject'].'","'.$row['remark1'].'","'.$row['remark2'].'","'.$row['remark3'].'","'.$row['remark4'].'","'.$row['remark5'].'","'.$row['remark6'].'","'.$row['remark7'].'","'.$row['remark8'].'","'.$row['remark9'].'","'.$row['remark10'].'","'.$row['remark11'].'","'.$row['remark12'].'","'.$row['remark13'].'","'.$row['remark14'].'","'.$row['remark15'].'","'.$row['post_text'].'"';
			echo "\n";
		}

	exit;
}

//include('./page_footer_admin.'.$phpEx);

?>
