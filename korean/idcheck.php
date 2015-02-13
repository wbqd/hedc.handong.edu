<?
/***************************************************************************
 *                           idcheck.php
 *                           -------------------
 *   Author               : 2002 (M) Zzangga
 *   E-mail               : nexus@dreamwiz.com
 *   Home                 : http://www.phpbb.co.kr
 *   Mod Version          : 0.9.4
 ***************************************************************************/

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);

$user_sql = $db->sql_query("SELECT username FROM  " . USERS_TABLE . " WHERE username ='$username'");
$user_id  = $db->sql_numrows($user_sql); 

if ($user_id ==0) { 
    $user_id = true;  
} else { 
    $user_id=false; 
}

$dis_sql = $db->sql_query("SELECT disallow_username  FROM ".DISALLOW_TABLE." WHERE disallow_username ='$username'");                       
$dis_id  = $db->sql_numrows($dis_sql);  

if ($dis_id ==0) { 
    $dis_id = true; 
} else { 
    $dis_id=false; 
}

$style = $board_config['default_style'];
$sql = "SELECT template_name FROM ".THEMES_TABLE." WHERE themes_id = $style";
$row = $db->sql_query($sql);
$theme = $db->sql_fetchrow($row);
$theme = $theme['template_name'];
$backg = $theme['body_bgcolor'];

?>
<html>
<head>
<title>ID-Check</title>
<link rel="stylesheet" href="templates/<? echo $theme ?>/<? echo $theme ?>.css" type="text/css" />

<style type="text/css">
A:link {text-decoration:none}
A:visited {text-decoration:none}
A:hover {text-decoration:underline}
</style>

<script language="javascript">
<!-- 
function replace_id() {
    opener.document.regform.username.value="";
	opener.document.regform.username.focus();
	self.close();
}
<? 
if ($board_config['use_realname'] != 2) {
?>
function next() {
	opener.document.regform.email.focus();
	self.close();
}
<? } ?>

<? 
if ($board_config['use_realname'] == 2) {
?>
function next() {
	opener.document.regform.realname.focus();
	self.close();
}
<? } ?>

//-->
</script>

</head>

<body>

<body bgcolor=<? echo $backg ?>>
<div align="center">
  <table width='260' border='0' cellspacing='1' cellpadding='3' bgcolor='#6C6C00'align='center' height='40'>  
   <tr><td bgcolor='#eaeaea'><center>
<?
  if (!$dis_id){
       echo("<span class=gen> <br><span class=red>$username</span> 는 사용할수 없는 아이디 입니다.<br>다른 아이디로 신청해주시기 바랍니다.</span><br><br>
       </td></tr></table><br>
       <input type=button class=suboption onClick='replace_id()' value=' 창 닫 기 '><br><br>");
       exit;
  } 

  if ($user_id) {
      echo("<span class=gen> <br><b>$username</b> 는 사용 <span class=blue>가능한 아이디</span> 입니다.<br>
      입력하신 <a href='javascript:next()'>이 아이디로 신청</a> 합니다.<br><br>
      </td></tr></table><br>
      <span class=gen><input type=button class=suboption value=' 창 닫 기 ' onClick='self.close()'></span>");

  } else {
      echo ("<span class=gen> <br><span class=red>$username</span> 는 이미 <span class=blue>등록된 아이디</span>입니다.<br>다른 아이디로 신청해주시기 바랍니다.</span><br><br>
      </td></tr></table><br>
      <input type=button class=suboption onClick='replace_id()' value=' 창 닫 기 '>");
  }
?>
</div>
</body>
</html>

