<br>
<span class="gen"><b><font color="#000000">&raquo; {L_DATABASE_RESTORE}</font></b></span><br><br>
<form enctype="multipart/form-data" method="post" action="{S_DBUTILS_ACTION}">
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center">
	<tr> 
		<td height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td  align=center><span class="gen"><b><font color="#000000">{L_SELECT_FILE}</font></b></span></td>
	</tr>
	<tr> 
		<td height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center" height="35">&nbsp;<input type="file" name="backup_file">&nbsp;&nbsp;{S_HIDDEN_FIELDS}<input type="submit" name="restore_start" value="{L_START_RESTORE}" class="mainoption" />&nbsp;</td>
	</tr>

</table></form>
<br>