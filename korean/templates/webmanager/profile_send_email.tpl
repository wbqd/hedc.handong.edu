<script type="text/javascript">
  window.onload = function()
  {
	var oFCKeditor = new FCKeditor( 'easyArea' ) ;
	oFCKeditor.ToolbarSet = "Self" ;
	oFCKeditor.Height = "450";	
   <!-- BEGIN switch_admin -->
	oFCKeditor.Config["LinkBrowser"] = true;
	oFCKeditor.Config["ImageBrowser"] = true;
	oFCKeditor.Config["FlashBrowser"] = true;
	oFCKeditor.Config["LinkUpload"] = true;
	oFCKeditor.Config["ImageUpload"] = true;
	oFCKeditor.Config["FlashUpload"] = true;
   <!-- END switch_admin -->

    oFCKeditor.ReplaceTextarea() ;
  }
</script>

<script language="JavaScript" type="text/javascript">
<!--
function checkForm(formObj) {

	formErrors = false;    

	editor._textArea.value = editor.getHTML();

	if (formObj.message.value.length < 2) {
		formErrors = "{L_EMPTY_MESSAGE_EMAIL}";
	}
	else if ( formObj.subject.value.length < 2)
	{
		formErrors = "{L_EMPTY_SUBJECT_EMAIL}";
	}

	if (formErrors) {
		alert(formErrors);
		return false;
	}
}
//-->
</script>
<form action="{S_POST_ACTION}" method="post" name="post" onSubmit="return checkForm(this)">

{ERROR_BOX}
<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="left" valign="middle" width="100%"><span class="genmed"><img src="templates/webmanager/images/arrow-head.gif" border="0" align="absmiddle">&nbsp;{L_SEND_EMAIL_MSG}</span></td>
	</tr>
</table>
<table border="0" cellpadding="2" cellspacing="0" width="95%">
	<tr> 
		<td colspan="3" height="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="2" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td width="20%" valign="middle">&nbsp;<span class=menuTitle>{MENU_LANG_TO}</span></td>
		<td width="1" valign="middle"><span class=menuBorder>|</span></td>
		<td width="80%" valign="middle"><span class="genmed"><b>{USERNAME}</b></span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td width="20%" valign="middle">&nbsp;<span class=menuTitle>{MENU_LANG_TITLE}</span></td>
		<td width="1" valign="middle"><span class=menuBorder>|</span></td>
		<td width="80%" valign="middle"><span class="gen"> 
			<input type="text" name="subject" size="45" maxlength="60" style="width:430px" class="formstyle4" value="{SUBJECT}" /></span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="30" valign="top">&nbsp;<span class=menuTitle>{MENU_LANG_CONTENT}</span></td>
		<td width="1" valign="top"><span class=menuBorder>|</span></td>
		<td valign="top"><span class="genmed">
			<table width="450" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td>
						<span class="gen"> 
						<textarea id='easyArea' name="message" rows="30" cols="35" wrap="virtual" style="width:430px" class="formstyle4" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);">{MESSAGE}</textarea>
						</span>
					</td>
				</tr>
				<tr> 
					<td colspan="2">
						<input type="checkbox" name="cc_email" class="formstyle3" value="1" checked="checked" /><span class="genmed">{L_CC_EMAIL}</span>
					</td>
				</tr>
			</table>
			</span>
		</td>
	</tr>
	<tr> 
		<td colspan="3" height="5"></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
				<tr> 
					<td height="2" bgcolor="#F2F2F2"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td colspan="3" height="5">
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center" height="28">{S_HIDDEN_FIELDS}<input type="submit" name="submit" class="mainoption" value="{L_SEND_EMAIL}" /></td>
	</tr>
</table>
</form>
<br><br>