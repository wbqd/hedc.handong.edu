<br>
<span class="gen"><b><font color="#000000">&raquo; {L_MANAGE_TITLE}</font></b></span><br><br>

{ERROR_BOX}

<form action="{S_ATTACH_ACTION}" method="post">
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" >
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
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_ATTACHMENT_SETTINGS}</font></b></span></td>
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
		<td bgcolor=#fafafa width="75%"><b>{L_MAX_FILESIZE}</b><br /><span class="genmed"><font color="#A7A7A7">{L_MAX_FILESIZE_EXPLAIN}</font></span></td>
		<td ><input type="text" size="8" maxlength="15" name="max_filesize" class="post" value="{MAX_FILESIZE}" /> {S_FILESIZE}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa width="75%"><b>{L_DEFAULT_QUOTA_LIMIT}</b><br /><span class="genmed"><font color="#A7A7A7">{L_DEFAULT_QUOTA_LIMIT_EXPLAIN}</font></span></td>
		<td >
		<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td nowrap="nowrap" width="40%">{S_DEFAULT_UPLOAD_LIMIT}</td>
			<td nowrap="nowrap" width="60%"><span class="genmed">&nbsp;{L_UPLOAD_QUOTA}&nbsp;</span></td>
		</tr>		
		</table>
		</td>
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
		<td  colspan="2" align="center">{S_HIDDEN_FIELDS}<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" class="liteoption" />&nbsp;&nbsp;<input type="submit" name="settings" value="{L_TEST_SETTINGS}" class="liteoption" /></td>
	</tr>

</table></form>

<br />
