<script type="text/javascript">
  window.onload = function()
  {
	var oFCKeditor = new FCKeditor( 'easyArea' ) ;
	oFCKeditor.ToolbarSet = "Self" ;
	oFCKeditor.Height = "350";	
	oFCKeditor.Config["LinkBrowser"] = true;
	oFCKeditor.Config["ImageBrowser"] = true;
	oFCKeditor.Config["FlashBrowser"] = true;
	oFCKeditor.Config["LinkUpload"] = true;
	oFCKeditor.Config["ImageUpload"] = true;
	oFCKeditor.Config["FlashUpload"] = true;
    oFCKeditor.ReplaceTextarea() ;
  }
</script>

<script language="JavaScript" type="text/javascript">
<!--	
function checkForm() {

	formErrors = "";    	

	if (formErrors) {
		alert(formErrors);
		return false;
	} else {		
		return true;		
	}
}
-->
</script>
<br>
<span class="gen"><b><font color="#000000">&raquo; {L_FORUM_TITLE}</font></b></span><br><br>

<form name="forum" action="{S_FORUM_ACTION}" method="post" onsubmit="return checkForm(this)">
  <table width="100%" cellpadding="4" cellspacing="1" border="0" align="center">
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_FORUM_SETTINGS}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa>{L_FORUM_NAME}</td>
	  <td ><input type="text" size="25" name="forumname" value="{FORUM_NAME}" class="post" /></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa>{L_TEMPLATE}</td>
	  <td >{S_DIR}</td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa colspan=2><textarea id="easyArea" rows="25" cols="70" wrap="virtual" name="forumdesc" class="post">{DESCRIPTION}</textarea></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa>{L_CATEGORY}</td>
	  <td >{S_CAT_LIST}</td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa>{L_FORUM_DISPLAY_SORT}</td>
	  <td ><select name="forum_display_sort">{S_FORUM_DISPLAY_SORT_LIST}</select>&nbsp;
			<select name="forum_display_order">{S_FORUM_DISPLAY_ORDER_LIST}</select>&nbsp;{ADMIN_LANG_AND_THEN} 
			<select name="forum_display_sort2">{S_FORUM_DISPLAY_SORT_LIST2}</select>&nbsp;
			<select name="forum_display_order2">{S_FORUM_DISPLAY_ORDER_LIST2}</select>&nbsp;</td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa>{L_MODERATOR}</td>
	  <td >{MODERATORS}</td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td  colspan="2" align="center">{S_HIDDEN_FIELDS}<input type="submit" name="submit" value="{S_SUBMIT_VALUE}" class="mainoption" /></td>
	</tr>
  </table>
</form>
		
<br clear="all" />
