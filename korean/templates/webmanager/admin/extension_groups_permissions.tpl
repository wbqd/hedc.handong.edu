<br>
<span class="gen"><b><font color="#000000">&raquo; {L_GROUP_PERMISSIONS_TITLE}</font></b></span><br><br>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td align="center">
			<form method="post" action="{A_PERM_ACTION}">
			<table width="90%"  cellspacing="1" cellpadding="4" border="0" align="center">
				<tr> 
					<td colspan="1" height="1" >
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr> 
								<td height="1" bgcolor="#000000"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
				  <td  colspan="1" align=center><span class="gen"><b><font color="#000000">{L_ALLOWED_FORUMS}</font></b></span></td>
				</tr>
				<tr> 
					<td colspan="1" height="1" >
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr> 
								<td height="1" bgcolor="#000000"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td class="row1" align="center">
						<select style="width:560px" name="entries[]" multiple="multiple" size="5">
						<!-- BEGIN allow_option_values -->
						<option value="{allow_option_values.VALUE}">{allow_option_values.OPTION}</option>
						<!-- END allow_option_values -->
						</select>
					</td>
				</tr>
				<tr> 
					<td colspan="1" height="1" >
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr> 
								<td height="1" bgcolor="#000000"></td>
							</tr>
						</table>
					</td>
				</tr>

				<tr>
					<td  align="center"> <input class="liteoption" type="submit" name="del_forum" value="{L_REMOVE_SELECTED}" /> &nbsp; <input class="liteoption" type="submit" name="close_perm" value="{L_CLOSE_WINDOW}" /><input type="hidden" name="e_mode" value="perm" /></td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
	<tr>
		<td>
			<form method="post" action="{A_PERM_ACTION}">
			<table width="90%"  cellspacing="1" cellpadding="4" border="0" align="center">
				<tr> 
					<td colspan="1" height="1" >
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr> 
								<td height="1" bgcolor="#000000"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
				  <td  colspan="1" align=center><span class="gen"><b><font color="#000000">{L_ADD_FORUMS}</font></b></span></td>
				</tr>
				<tr> 
					<td colspan="1" height="1" >
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr> 
								<td height="1" bgcolor="#000000"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td class="row1" align="center">
					<select style="width:560px" name="entries[]" multiple="multiple" size="5">
					<!-- BEGIN forum_option_values -->
					<option value="{forum_option_values.VALUE}">{forum_option_values.OPTION}</option>
					<!-- END forum_option_values -->
					</select>
					</td>
				</tr>
				<tr> 
					<td colspan="1" height="1" >
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr> 
								<td height="1" bgcolor="#000000"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="center"> <input type="submit" name="add_forum" value="{L_ADD_SELECTED}" class="mainoption" />&nbsp; <input type="reset" value="{L_RESET}" class="liteoption" />&nbsp; <input type="hidden" name="e_mode" value="perm" /></td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>

<br /><br /><br />
