<?

/***************************************************************************
 *                          zipsearch.php
 *                         -------------------
 *   Author               : 2002 (M) Zzangga
 *   E-mail               : nexus@dreamwiz.com
 *   Home                 : http://www.phpbb.co.kr
 *   Mod Version          : 0.9.4
 ***************************************************************************/

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);

$style = $board_config['default_style'];
$sql   = "SELECT template_name FROM ".THEMES_TABLE." WHERE themes_id = $style";
$row   = $db->sql_query($sql);
$theme = $db->sql_fetchrow($row);
$theme = $theme['template_name'];

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
// Set dong 
// 
if( isset( $HTTP_POST_VARS['dong'] ) || isset( $HTTP_GET_VARS['dong'] ) ) 
{ 
$dong = ( isset( $HTTP_POST_VARS['dong']) ) ? $HTTP_POST_VARS['dong'] : $HTTP_GET_VARS['dong']; 
} 
else 
{ 
$dong = ''; 
} 

// 
// Set location 
// 
if( isset( $HTTP_POST_VARS['location'] ) || isset( $HTTP_GET_VARS['location'] ) ) 
{ 
$location = ( isset( $HTTP_POST_VARS['location']) ) ? $HTTP_POST_VARS['location'] : $HTTP_GET_VARS['location']; 
} 
else 
{ 
$location = ''; 
} 

if(!$mode) {
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>�����ȣ �˻�</title>
<link rel="stylesheet" href="templates/<? echo $theme ?>/<? echo $theme ?>.css" type="text/css" />
</head>

<body onLoad="document.zipsearch.dong.focus();">

  <form name=zipsearch method="post" action="zipsearch.php?mode=search">
   <table align=center>
	 <tr><td align=center><b><span class=gen>�����ȣ �˻�</b></td></tr>
	   <tr><td>
		 <table align=center height=100>
          <tr>
            <td> 
             <br><span class=gen>&nbsp;&nbsp;ã�����Ͻô� ������ ��/��/���� �̸��� ������� �Է��Ͻ� ��<br>&nbsp;&nbsp;[�˻�]��ư�� Ŭ���Ͻø� �����ȣ�� �ڵ����� ã���ݴϴ�.</span>
             <hr /><span class=gen>&nbsp;&nbsp;�ּҰ� '����Ư���� ������ ���ﵿ'�� ��� ���ﵿ��<br>&nbsp;&nbsp;�Է��Ͻø� �˴ϴ�.</span>
            </td>
           </tr>
		   <tr><td align=center>
		   <input type=text name=dong size=16 class=input>&nbsp;
		   <input type=submit value=" �˻��ϱ� " class=suboption align="absmiddle"></td></tr>
		 </table>
       </td></tr>
     </table>
    </form>
  </body>
</html>

<?
} 

else if($mode == "search")  {

     if(!$dong) {
	    echo "<script>window.alert('��/��/�� �̸��� �Է��Ͻ� �� �����ϼ���. '); history.back();</script>";
	    exit;
     }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>�����ȣ�˻�</title>
<link rel="stylesheet" href="templates/<? echo $theme ?>/<? echo $theme ?>.css" type="text/css" />
</head>

<body onLoad="document.zipsearch2.location.focus();">

<form name=zipsearch2 method="post" action="zipsearch.php?mode=input">
<table align=center>
	<tr><td align=center><b><span class=gen>�����ȣ �˻�</b></td></tr>
	<tr><td>
	   <table align=center height=100>
		 <tr><td align=center><span class=gen>�ּҸ� ������ �ּ���</td></tr>
		 <tr><td align=center>
           <select name='location' size=5>
			<?	
			  $result = $db->sql_query("SELECT zip_code,zip_sido,zip_gugun,zip_dong,zip_bunji FROM zipcode WHERE zip_dong like '%$dong%' ORDER BY zip_code");
			  $count  = $db->sql_numrows($result);

              if($count == 0) {
	             echo "<script>window.alert('�˻��ϰ��� �ϴ� �ּҰ� �����ϴ�.');history.back();</script>";
	             exit;
			  }

			  while($row = $db->sql_fetchrow($result)) {
					$code  = $row['zip_code'];
					$sido  = $row['zip_sido'];
					$gugun = $row['zip_gugun'];
					$dong  = $row['zip_dong'];
					$bunji = $row['zip_bunji'];
		
					$address = "[" . $code . "] " . $sido . " " . $gugun . " " . $dong . " " ;
					if($bunji) {
					   $address = $address . $bunji;
					}
					echo "<option value='$address'>$address</option>";
			  }
			 ?>	
			</select><br><br>
			<input type="submit" value=" ���ÿϷ� " class=suboption align="absmiddle">
	        <input type="reset" value=" �������� " class=suboption align="absmiddle">
		  </td></tr>
		</table>
	</td></tr>
</table>
</body>
</html>
<?
}
?>

<?
if($mode == "input") {

	$zipcode1 = substr($location,1,3);
	$zipcode2 = substr($location,5,3);

	$select_location = explode(" ",$location);
    if ($select_location[4] >= 1) {
	    $location  = $select_location[1] . " " . $select_location[2] . " " . $select_location[3];
	    $location2 = $select_location[4] . " " . $select_location[5];
    } else {
    	$location  = $select_location[1] . " " . $select_location[2] . " " . $select_location[3] . " " . $select_location[4];
	    $location2 = $select_location[5];
    }
?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<script language="javascript">
		opener.document.regform.location.value = "<?echo $location?>";
		//opener.document.regform.location2.value = "<?echo $location2?>";
        opener.document.regform.zipcode1.value  = "<?echo $zipcode1?>";
        opener.document.regform.zipcode2.value  = "<?echo $zipcode2?>";
        opener.document.regform.location2.focus();
        self.close();
</script>
<?
}
?>