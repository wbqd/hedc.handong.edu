<br>
<span class="gen"><b><font color="#000000">&raquo; {L_GROUP_TITLE}</font></b></span><br><br>

<form action="{S_GROUP_ACTION}" method="post" name="post"><table border="0" cellpadding="3" cellspacing="1" align="center">
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
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_GROUP_EDIT_DELETE}</font></b></span></td>
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
	  <td bgcolor=#fafafa colspan="2"><span class="genmed">{L_ITEMS_REQUIRED}</span></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa width="38%"><span class="gen"><b>{L_GROUP_NAME}</b></span></td>
	  <td  width="62%"> 
		<input class="post" type="text" name="group_name" size="35" maxlength="40" value="{GROUP_NAME}" />
	  </td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa width="38%"><span class="gen"><b>{L_GROUP_DESCRIPTION}</b></span></td>
	  <td  width="62%"> 
		<textarea class="post" name="group_description" rows="5" cols="51">{GROUP_DESCRIPTION}</textarea>
	  </td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa width="38%"><span class="gen"><b>{L_GROUP_MODERATOR}</b></span></td>
	  <td  width="62%"><input class="post" type="text" class="post" name="username" maxlength="50" size="20" value="{GROUP_MODERATOR}" /> &nbsp; <input type="submit" name="usersubmit" value="{L_FIND_USERNAME}" class="liteoption" onClick="window.open('{U_SEARCH_USER}', '_phpbbsearch', 'HEIGHT=250,resizable=yes,WIDTH=400');return false;" /></td>
	</tr>

	<tr> 
	  <td bgcolor=#fafafa width="38%"><span class="gen"><b>{L_GROUP_STATUS}</b></span></td>
	  <td  width="62%"> 
		<input type="radio" name="group_type" class="formstyle3" value="{S_GROUP_OPEN_TYPE}" {S_GROUP_OPEN_CHECKED} /> {L_GROUP_OPEN} &nbsp;&nbsp;<input type="radio" name="group_type" class="formstyle3" value="{S_GROUP_CLOSED_TYPE}" {S_GROUP_CLOSED_CHECKED} />	{L_GROUP_CLOSED} &nbsp;&nbsp;<input type="radio" name="group_type" class="formstyle3" value="{S_GROUP_HIDDEN_TYPE}" {S_GROUP_HIDDEN_CHECKED} />	{L_GROUP_HIDDEN}</td> 
	</tr>
	<!-- BEGIN group_edit -->
	<tr> 
	  <td bgcolor=#fafafa width="38%"><span class="gen"><b>{L_DELETE_MODERATOR}</b></span>
	  <br />
	  <span class="genmed"><font color="#A7A7A7">{L_DELETE_MODERATOR_EXPLAIN}</font></span></td>
	  <td  width="62%"> 
		<input type="checkbox" name="delete_old_moderator" class="formstyle3" value="1">
		{L_YES}</td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa width="38%"><span class="gen"><b>{L_GROUP_DELETE}</b></span></td>
	  <td  width="62%"> 
		<input type="checkbox" name="group_delete" class="formstyle3" value="1">
		{L_GROUP_DELETE_CHECK}</td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_UPLOAD_QUOTA}</b></span></td>
	  <td >{S_SELECT_UPLOAD_QUOTA}</td>
	</tr>
	<input type='hidden' name='group_pm_quota' value='{PM_QUOTA_RAW}'>
	<!-- END group_edit -->
	<tr> 
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	  <td  colspan="2" align="center"><span class="cattitle"> 
		<input type="submit" name="group_update" value="{L_SUBMIT}" class="mainoption" />
		&nbsp;&nbsp; 
		<input type="reset" value="{L_RESET}" name="reset" class="mainoption" />
		</span></td>
	</tr>
</table>{S_HIDDEN_FIELDS}</form>
<br>