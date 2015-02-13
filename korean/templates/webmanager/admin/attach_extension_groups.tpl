<br>
{GROUP_PERMISSIONS_BOX}
{PERM_ERROR_BOX}
<span class="gen"><b><font color="#000000">&raquo; {L_EXTENSION_GROUPS_TITLE}</font></b></span><br><br>

{ERROR_BOX}

<form method="post" action="{S_ATTACH_ACTION}">
  <table width="100%" align="center" cellpadding="4" cellspacing="1" border="0">
	<tr> 
		<td height="1" colspan="8">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td  align=center colspan="8"><span class="gen"><b><font color="#000000">{L_EXTENSION_GROUPS_TITLE}</font></b></span></td>
	</tr>
	<tr> 
		<td height="1" colspan="8">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr bgcolor="#f5f5f5"> 
	  <td align="center"><span class="gen"><b>{L_EXTENSION_GROUP}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_SPECIAL_CATEGORY}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_ALLOWED}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_DOWNLOAD_MODE}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_UPLOAD_ICON}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_MAX_FILESIZE}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_ALLOWED_FORUMS}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_ADD_NEW}</b></span></td>
	</tr>
	<tr> 
		<td height="1" colspan="8">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#dfdfdf"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td align="center" valign="middle">
      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
	  <tr>
  	  <td align="center" valign="middle" width="10%" wrap="nowrap">&nbsp;</td>
	  <td align="left" valign="middle"><input type="text" size="10" maxlength="100" name="add_extension_group" class="post" value="{ADD_GROUP_NAME}" /></td>
	  </tr>
	  </table>
	  </td>
	  <td align="center" valign="middle" bgcolor="#f7f7f7">{S_SELECT_CAT}</td>
	  <td align="center" valign="middle"><input type="checkbox" name="add_allowed" /></td>
	  <td align="center" valign="middle" bgcolor="#f7f7f7">{S_ADD_DOWNLOAD_MODE}</td>
	  <td align="center" valign="middle"><input type="text" size="12" maxlength="100" name="add_upload_icon" class="post" value="{UPLOAD_ICON}" /></td>
	  <td align="center" valign="middle" bgcolor="#f7f7f7"><input type="text" size="3" maxlength="15" name="add_max_filesize" class="post" value="{MAX_FILESIZE}" /> {S_FILESIZE}</td>
	  <td align="center" valign="middle">&nbsp;</td>
	  <td align="center" valign="middle" bgcolor="#f7f7f7"><input type="checkbox" name="add_extension_group_check" /></td>
	</tr>
	<tr> 
		<td height="1" colspan="8">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr align="right"> 
	  <td colspan="8" height="29"><input type="submit" name="submit" class="liteoption" value="{L_SUBMIT}" /></td>
    </tr>
	<tr> 
		<td height="20" colspan="8"></td>
	</tr>
	<tr> 
		<td height="1" colspan="8">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr bgcolor="#f5f5f5"> 
	  <td align="center"><span class="gen"><b>{L_EXTENSION_GROUP}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_SPECIAL_CATEGORY}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_ALLOWED}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_DOWNLOAD_MODE}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_UPLOAD_ICON}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_MAX_FILESIZE}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_ALLOWED_FORUMS}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_DELETE}</b></span></td>
	</tr>
	<tr> 
		<td colspan="8" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#dfdfdf"></td>
				</tr>
			</table>
		</td>
	</tr>
  <!-- BEGIN grouprow -->
    <tr> 
	  <input type="hidden" name="group_change_list[]" value="{grouprow.GROUP_ID}" />
	  <td align="center" valign="middle">
      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
	  <tr>
		<td align="center" valign="middle" width="10%" wrap="nowrap"><b><span class="gensmall"><a href="{grouprow.U_VIEWGROUP}" class="genmed">{grouprow.CAT_BOX}</a></span></b></td>
		<td align="left" valign="middle"><input type="text" size="10" maxlength="100" name="extension_group_list[]" class="post" value="{grouprow.EXTENSION_GROUP}" /></td>
	  </tr>
	  </table>
	  </td>
	  <td align="center" valign="middle" bgcolor="#f7f7f7">{grouprow.S_SELECT_CAT}</td>
	  <td align="center" valign="middle"><input type="checkbox" name="allowed_list[]" value="{grouprow.GROUP_ID}" {grouprow.S_ALLOW_SELECTED} /></td>
	  <td align="center" valign="middle" bgcolor="#f7f7f7">{grouprow.S_DOWNLOAD_MODE}</td>
	  <td align="center" valign="middle"><input type="text" size="12" maxlength="100" name="upload_icon_list[]" class="post" value="{grouprow.UPLOAD_ICON}" /></td>
	  <td align="center" valign="middle" bgcolor="#f7f7f7"><input type="text" size="3" maxlength="15" name="max_filesize_list[]" class="post" value="{grouprow.MAX_FILESIZE}" /> {grouprow.S_FILESIZE}</td>
	  <td align="center" valign="middle"><span class="genmed"><a href="{grouprow.U_FORUM_PERMISSIONS}" class="genmed">{L_FORUM_PERMISSIONS}</a></span></td>
	  <td align="center" valign="middle" bgcolor="#f7f7f7"><input type="checkbox" name="group_id_list[]" value="{grouprow.GROUP_ID}" /></td>
	</tr>
  <!-- BEGIN extensionrow -->

  <tr> 
	<td align="center" valign="middle" bgcolor="#f7f7f7"><span class="genmed">{grouprow.extensionrow.EXTENSION}</span></td>
    <td align="center" valign="middle" bgcolor="#f7f7f7"><span class="genmed">{grouprow.extensionrow.EXPLANATION}</span></td>
	<td align="center" valign="middle" bgcolor="#f7f7f7">&nbsp;</td>
	<td align="center" valign="middle" bgcolor="#f7f7f7">&nbsp;</td>
	<td align="center" valign="middle" bgcolor="#f7f7f7">&nbsp;</td>
	<td align="center" valign="middle" bgcolor="#f7f7f7">&nbsp;</td>
	<td align="center" valign="middle" bgcolor="#f7f7f7">&nbsp;</td>
	<td align="center" valign="middle" bgcolor="#f7f7f7">&nbsp;</td>
  </tr>

  <!-- END extensionrow -->
  <!-- END grouprow -->

	<tr> 
		<td height="1" colspan="8">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr align="right"> 
	  <td colspan="8" height="29"> 
	  <input type="submit" name="{L_CANCEL}" class="liteoption" value="{L_CANCEL}" onClick="self.location.href='{S_CANCEL_ACTION}'" />
	  <input type="submit" name="submit" class="liteoption" value="{L_SUBMIT}" /></td>
	</tr>
</table>

</form>

<br />
