<table border="0" cellpadding="0" cellspacing="0" width="95%">
	<tr>
		<td colspan="11" height="2" bgcolor="#DADADA"></td>
	</tr>
	<tr bgcolor="#F5F5F5">
		<td width="20%" align="center" height="30"><span class="genmed"><b>Section</b></span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="25%" align="center"><span class="genmed"><b>{L_USERNAME}</b></span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="15%" align="center"><span class="genmed"><b>{L_POSTS}</b></span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="10%" align="center"><span class="genmed"><b>{L_PM}</b></span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="20%" align="center"><span class="genmed"><b>{L_EMAIL}</b></span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="10%" align="center"><span class="genmed"><b>{L_SELECT}</b></span></td>
	</tr>
	<tr>
		<td colspan="11" height="1" bgcolor="#DADADA"></td>
	</tr>
	<!-- BEGIN pending_members_row -->
	<tr>
		<td align="center" height="27"><span class="genmed">{L_PENDING_MEMBERS}</span></td>
		<td></td>
		<td align="center"><span class="genmed"><a href="{pending_members_row.U_VIEWPROFILE}">{pending_members_row.USERNAME}</a></span></td>
		<td></td>
		<td align="center"><span class="genmed">{pending_members_row.POSTS}</span></td>
		<td></td>
		<td align="center"><span class="genmed">{pending_members_row.PM_IMG}</span></td>
		<td></td>
		<td align="center"><span class="genmed">{pending_members_row.EMAIL_IMG}</span></td>
		<td></td>
		<td align="center"><span class="gensmall"><input type="checkbox" class="formstyle3" name="pending_members[]" value="{pending_members_row.USER_ID}" checked="checked" /></span></td>
	</tr>
	<tr>
		<td colspan="11" height="1" bgcolor="#DADADA"></td>
	</tr>
	<!-- END pending_members_row -->
	<tr bgcolor="#F5F5F5"> 
		<td colspan="11" height="29" align="right"><span class="cattitle"> 
		<input type="submit" name="approve" value="{L_APPROVE_SELECTED}" class="mainoption" />
		&nbsp; 
		<input type="submit" name="deny" value="{L_DENY_SELECTED}" class="liteoption" />
		</span></td>
	</tr>
	<tr>
		<td colspan="11" height="1" bgcolor="#DADADA"></td>
	</tr>
	<tr>
		<td colspan="11" height="2" bgcolor="#F2F2F2"></td>
	</tr>
</table>
<br><br>