<br>
<span class="gen"><b><font color="#000000">&raquo; {L_MANAGE_QUOTAS_TITLE}</font></b></span><br><br>

<form method="post" action="{S_ATTACH_ACTION}">
  <table width="99%" align="center" cellpadding="4" cellspacing="1" border="0" >
	<tr> 
		<td colspan="3" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td  align=center><span class="gen"><b><font color="#000000">{L_DESCRIPTION}</font></b></span></td>
		<td  align=center><span class="gen"><b><font color="#000000">{L_SIZE}</font></b></span></td>
		<td  align=center><span class="gen"><b><font color="#000000">{L_ADD_NEW}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align="center" valign="middle"><input type="text" size="20" maxlength="25" name="quota_description" class="post" value=""/></td>
		<td  align="center" valign="middle"><input type="text" size="8" maxlength="15" name="add_max_filesize" class="post" value="{MAX_FILESIZE}" /> {S_FILESIZE}</td>
		<td bgcolor=#fafafa align="center" valign="middle"><input type="checkbox" name="add_quota_check" /></td>
	</tr>
	<tr align="right">
	  <td bgcolor=#fafafa colspan="3" height="29"> {S_HIDDEN_FIELDS} <input type="submit" name="submit" class="mainoption" value="{L_SUBMIT}" /></td>
	</tr>
	<tr> 
		<td colspan="3" height="30" >
		</td>
	</tr>

	<tr> 
		<td colspan="3" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td  align=center><span class="gen"><b><font color="#000000">{L_DESCRIPTION}</font></b></span></td>
		<td  align=center><span class="gen"><b><font color="#000000">{L_SIZE}</font></b></span></td>
		<td  align=center><span class="gen"><b><font color="#000000">{L_DELETE}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
<!-- BEGIN limit_row -->
	<tr> 
	  <td bgcolor=#fafafa align="center" valign="middle">
		<input type="hidden" name="quota_change_list[]" value="{limit_row.QUOTA_ID}" />
		<b><span class="genmed"><a href="{limit_row.U_VIEW}" class="genmed">{L_VIEW}</a></span></b>
		<input type="text" size="20" maxlength="25" name="quota_desc_list[]" class="post" value="{limit_row.QUOTA_NAME}" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  </td>	
	  <td  align="center" valign="middle"><input type="text" size="8" maxlength="15" name="max_filesize_list[]" class="post" value="{limit_row.MAX_FILESIZE}" /> {limit_row.S_FILESIZE}</td>
	  <td bgcolor=#fafafa align="center" valign="middle"><input type="checkbox" name="quota_id_list[]" value="{limit_row.QUOTA_ID}" /></td>
	</tr>
<!-- END limit_row -->
	<tr align="right">
	  <td bgcolor=#fafafa colspan="3" height="29"> <input type="submit" name="submit" class="mainoption" value="{L_SUBMIT}" /></td>
	</tr>
</table>
</form>
<br><br>
<!-- {QUOTA_LIMIT_SETTINGS} -->

<!-- BEGIN switch_quota_limit_desc -->
<center><h1>{L_QUOTA_LIMIT_DESC}</h1></center>

<table width="99%" cellspacing="0" cellpadding="0" border="0" align="center">
	<tr>
		<td align="left" width="49%">
			<table width="100%"  cellspacing="1" cellpadding="4" border="0" align="left">
				<tr>
					<td  align=center><span class="gen"><b><font color="#000000">{L_ASSIGNED_USERS} - {L_UPLOAD_QUOTA}</font></b></span></td>
				</tr>
				<tr>
					<td bgcolor=#fafafa align="center">
						<select style="width:99%" name="entries[]" multiple="multiple" size="5">
<!-- END switch_quota_limit_desc -->
						<!-- BEGIN users_upload_row -->
						<option value="{users_upload_row.USER_ID}">{users_upload_row.USERNAME}</option>
						<!-- END users_upload_row -->
<!-- BEGIN switch_quota_limit_desc -->
						</select>
					</td>
				</tr>
			</table>
		</td>
		<td width="2%">
			&nbsp;&nbsp;&nbsp;
		</td>
		<td align="right" width="49%">
			<table width="100%"  cellspacing="1" cellpadding="4" border="0" align="right">
				<tr>
					<td  align=center><span class="gen"><b><font color="#000000">{L_ASSIGNED_USERS} - {L_UPLOAD_QUOTA}</font></b></span></td>
				</tr>
				<tr>
					<td bgcolor=#fafafa align="center">
					<select style="width:99%" name="entries[]" multiple="multiple" size="5">
<!-- END switch_quota_limit_desc -->
					<!-- BEGIN groups_upload_row -->
					<option value="{groups_upload_row.GROUP_ID}">{groups_upload_row.GROUPNAME}</option>
					<!-- END groups_upload_row -->
<!-- BEGIN switch_quota_limit_desc -->
					</select>
					</td>
				</tr>
			</table>
		</td>
	</tr>

</table>
<!-- END switch_quota_limit_desc -->

<br />