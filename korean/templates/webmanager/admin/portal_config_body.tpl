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
<form action="{S_CONFIG_ACTION}" method="post" onsubmit="return checkForm(this)">
<br><span class="gen"><b><font color="#000000">&raquo; {L_CONFIGURATION_TITLE}</font></b></span>
	<table>
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
		<td bgcolor=#fafafa  width="30%"><b>{L_WELCOME_TEXT}</b></td>
		<td height=300  ><textarea id="easyArea" rows="26" cols="87" name="html_area">{HTML_AREA}</textarea></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_NUMBER_OF_NEWS}</b></td>
		<td ><input type="text" maxlength="255" size="10" name="number_of_news" value="{NUMBER_OF_NEWS}" class="post" /></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_NUMBER_RECENT_TOPICS}</b></td>
		<td ><input type="text" maxlength="255" size="10" name="number_recent_topics" value="{NUMBER_RECENT_TOPICS}" class="post" /></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_EXCEPTIONAL_FORUMS}</b></td>
		<td >{EXCEPTIONAL_FORUMS_LIST}<span class="genmed"><font color="#A7A7A7">*<u>{L_COMMA}</u>*</span></td>
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
<td colspan="2" align="center">{S_HIDDEN_FIELDS}
<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />
&nbsp;&nbsp; 
<input type="reset" value="{L_RESET}" class="button" />
</td>
</tr>
</table>
</form>
<br clear="all" />