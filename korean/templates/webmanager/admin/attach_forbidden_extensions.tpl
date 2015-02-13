<br>
<span class="gen"><b><font color="#000000">&raquo; {L_EXTENSIONS_TITLE}</font></b></span><br><br>
{ERROR_BOX}
<form method="post" action="{S_ATTACH_ACTION}">
<table width="99%" cellspacing="1" cellpadding="4" border="0" align="center">
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
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_EXTENSIONS_TITLE}</font></b></span></td>
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
	  <td align="center" width="50%"><span class="gen"><b>{L_EXTENSION}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_ADD_NEW}</b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#dfdfdf"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#fafafa" align="center" valign="middle" width="50%"><input type="text" size="8" maxlength="15" name="add_extension" class="post" value=""/></td>
		<td bgcolor="#fafafa" align="center" valign="middle"><input type="checkbox" name="add_extension_check" /></td>
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
	<tr align="right">
	  <td colspan="2" height="29"> {S_HIDDEN_FIELDS} <input type="submit" name="submit" class="liteoption" value="Submit" /></td>
	</tr>
	<tr> 
		<td colspan="2" height="20" ></td>
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
	  <td align="center" width="50%"><span class="gen"><b>{L_EXTENSION}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_DELETE}</b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#dfdfdf"></td>
				</tr>
			</table>
		</td>
	</tr>
<!-- BEGIN extensionrow -->
	<tr> 
	  <td bgcolor="#fafafa" align="center" valign="middle" width="50%"><span class="genmed">{extensionrow.EXTENSION_NAME}</span></td>
	  <td bgcolor="#fafafa" align="center" valign="middle"><input type="checkbox" name="extension_id_list[]" value="{extensionrow.EXTENSION_ID}" /></td>
	</tr>
<!-- END extensionrow -->
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr align="right">
	  <td colspan="2" height="29"> <input type="submit" name="submit" class="liteoption" value="Submit" /></td>
	</tr>
</table>
</form>
<br />