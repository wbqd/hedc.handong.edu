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
<span class="gen"><b><font color="#000000">&raquo; {L_EMAIL_TITLE}</font></b></span><br><br>

<form method="post" action="{S_USER_ACTION}" onsubmit="return checkForm(this)">

{ERROR_BOX}

<table cellspacing="1" cellpadding="4" border="0" align="center" width="100%">
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
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_COMPOSE}</font></b></span></td>
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
	  <td bgcolor=#fafafa align="right" width="25%"><b>{L_RECIPIENTS}</b></td>
	  <td  align="left">{S_GROUP_SELECT}</td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa align="right"><b>{L_EMAIL_SUBJECT}</b></td>
	  <td ><span class="gen"><input class="post" type="text" name="subject" size="45" maxlength="100" class="post" value="{SUBJECT}" /></span></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa colspan=2><span class="gen"> <textarea id="easyArea" name="message" rows="30" cols="40" wrap="virtual" style="width:450px" class="post">{MESSAGE}</textarea></span> 
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
	  <td align="center" colspan="2"><input type="submit" value="{L_EMAIL}" name="submit" class="mainoption" /></td>
	</tr>
</table>
</form>
<br>