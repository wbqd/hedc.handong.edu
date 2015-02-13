<br>
<form action="{S_PROFILE_ACTION}" method="post">
<table width="43%" border="0" cellpadding="1" cellspacing="0" bgcolor="#F3F3F3">
	<tr>
		<td height="3">
		</td>
	</tr>
	<tr>
		<td align="center">
			<table style="border-width:1px; border-color:rgb(204,204,204); border-style:solid;" border="0" cellpadding="4" cellspacing="1" width="98%" bgcolor="white">
				<tr>
					<td colspan="2" height="5"></td>
				</tr>
				<tr>
					<td colspan="2" height="30" align="center"><span class="genmed">{L_SEND_PASSWORD}</span></td>
				</tr>
				<tr>
					<td><span class="genmed">&nbsp;&nbsp;&nbsp;<img src="templates/webmanager/images/title-email.gif">&nbsp;</span></td>
					<td><span class="genmed"><input type="text" class="formstyle4" style="width: 200px" name="email" size="15" maxlength="255" value="{EMAIL}" /></span></td>
				</tr>
				<tr>
					<td></td>
					<td>
					{S_HIDDEN_FIELDS}
					<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />
					<input type="reset" value="{L_RESET}" name="reset" class="liteoption" /></td>
				</tr>
				<tr>
					<td colspan="2" height="10"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="3">
		</td>
	</tr>
</table>	
</form>
<br><br>