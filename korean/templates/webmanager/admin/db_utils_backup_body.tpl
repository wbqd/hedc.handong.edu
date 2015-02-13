<br>
<span class="gen"><b><font color="#000000">&raquo; {L_DATABASE_BACKUP}</font></b></span><br><br>
<form method="post" action="{S_DBUTILS_ACTION}">
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
		<td align="center" height="35">{S_HIDDEN_FIELDS}<input type=hidden name='gzipcompress' value="0"><input type=hidden name='additional_tables' value=""><input type=hidden name='backup_type' value="full"><input type="submit" name="backupstart" value="{L_START_BACKUP}" class="mainoption" /></td>
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
</table></form>
<br>