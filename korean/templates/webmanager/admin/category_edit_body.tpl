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
<span class="gen"><b><font color="#000000">&raquo; {L_EDIT_CATEGORY}</font></b></span><br><br>

<form name="category" action="{S_FORUM_ACTION}" method="post" onsubmit="return checkForm(this)">
  <table width="100%" cellpadding="4" cellspacing="1" border="0"  align="center">
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
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_EDIT_CATEGORY}</font></b></span></td>
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
	  <td width=30% bgcolor=#fafafa>{L_CATEGORY}</td>
	  <td ><input class="post" type="text" size="25" name="cat_title" value="{CAT_TITLE}" /></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa>{L_TEMPLATE}</td>
	  <td >{S_DIR}</td>
	</tr>
	<tr>
	  <td bgcolor=#fafafa colspan=2><textarea id="easyArea" rows="25" cols="70" wrap="virtual" name="cat_desc" class="post">{CAT_DESCRIPTION}</textarea></td>
	</tr>
	<tr>
	  <td bgcolor=#fafafa>{L_CATEGORY_ATTACHMENT}</td>
	  <td >{S_CAT_LIST}</td>
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
