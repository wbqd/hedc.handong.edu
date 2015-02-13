	<tr>
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- BEGIN attach_row -->
		<tr> 
			<td width="20%" height="30" valign="top">&nbsp;<span class=menuTitle>{MENU_LANG_ATTACH}</span></td>
			<td width="1" valign="top"><span class=menuBorder>|</span></td>
			<td width="80%" valign="top"><span class="gen"><a class="gen" href="{attach_row.U_VIEW_ATTACHMENT}" target="_blank">{attach_row.FILE_NAME}</a></span>
			</td> 
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td height="20"><span class="genmed"><input type="submit" name="del_attachment[{attach_row.ATTACH_FILENAME}]" value="{L_DELETE_ATTACHMENT}" class="liteoption" /> 

			</td>
		</tr>
		<tr> 
			<td colspan="3" height="5"></td>
		</tr>
		{attach_row.S_HIDDEN}	
	<!-- END attach_row -->
