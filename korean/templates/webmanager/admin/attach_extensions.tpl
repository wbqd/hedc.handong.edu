<br>
<span class="gen"><b><font color="#000000">&raquo; {L_EXTENSIONS_TITLE}</font></b></span><br><br>
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
		<td  align=center colspan="8"><span class="gen"><b><font color="#000000">{L_EXTENSIONS_TITLE}</font></b></span></td>
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
	  <td align="center"><span class="gen"><b>{L_EXPLANATION}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_EXTENSION}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_EXTENSION_GROUP}</b></span></td>
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
	  <td align="center" valign="middle"><input type="text" size="30" maxlength="100" name="add_extension_explain" class="post" value="{ADD_EXTENSION_EXPLAIN}" /></td>
	  <td align="center" valign="middle" bgcolor="#f7f7f7"><input type="text" size="20" maxlength="100" name="add_extension" class="post" value="{ADD_EXTENSION}" /></td>
	  <td align="center" valign="middle">{S_ADD_GROUP_SELECT}</td>
	  <td align="center" valign="middle" bgcolor="#f7f7f7"><input type="checkbox" name="add_extension_check" /></td>
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
	  <td colspan="5" height="29"> {S_HIDDEN_FIELDS} <input type="submit" name="submit" class="liteoption" value="{L_SUBMIT}" /></td>
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
	  <td align="center"><span class="gen"><b>{L_EXPLANATION}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_EXTENSION}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_EXTENSION_GROUP}</b></span></td>
	  <td align="center"><span class="gen"><b>{L_DELETE}</b></span></td>
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
<!-- BEGIN extension_row -->
	<tr> 
	  <input type="hidden" name="extension_change_list[]" value="{extension_row.EXT_ID}" />
	  <td align="center" valign="middle"><input type="text" size="30" maxlength="100" name="extension_explain_list[]" class="post" value="{extension_row.EXTENSION_EXPLAIN}" /></td>
	  <td align="center" valign="middle" bgcolor="#f7f7f7"><b><span class="gen">{extension_row.EXTENSION}</span></b></td>
	  <td align="center" valign="middle">{extension_row.S_GROUP_SELECT}</td>
	  <td align="center" valign="middle" bgcolor="#f7f7f7"><input type="checkbox" name="extension_id_list[]" value="{extension_row.EXT_ID}" /></td>
	</tr>
<!-- END extension_row -->
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
	  <td colspan="5" height="29"> 
	  <input type="submit" name="{L_CANCEL}" class="liteoption" value="{L_CANCEL}" onClick="self.location.href='{S_CANCEL_ACTION}'" />
	  <input type="submit" name="submit" class="liteoption" value="{L_SUBMIT}" /></td>
	</tr>
</table>

</form>
<br />
