<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="genmed"><img src="templates/webmanager/images/arrow-head.gif" border="0" align="absmiddle">&nbsp;Home > {L_USERGROUPS} > {L_GROUP_INFORMATION}</span></td>
	</tr>
</table>
<form action="{S_GROUPCP_ACTION}" method="post">
<table border="0" cellpadding="0" cellspacing="0" width="95%">
	<tr>
		<td colspan="3" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
	<tr bgcolor="#fafafa">
		<td colspan="3" align="center" height="30"><span class="genmed"><b>{L_GROUP_INFORMATION}</b></span></td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
	<tr> 
		<td width="15%" height="27"><span class="genmed">{L_GROUP_NAME}:</span></td>
		<td width="1" valign="middle"><span class=menuBorder>|</span>&nbsp;</td>
		<td width="83%"><span class="genmed"><b>{GROUP_NAME}</b></span></td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#DADADA"></td>
	</tr>
	<tr> 
		<td height="27"><span class="genmed">{L_GROUP_DESC}:</span></td>
		<td width="1" valign="middle"><span class=menuBorder>|</span>&nbsp;</td>
		<td><span class="genmed">{GROUP_DESC}</span></td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#DADADA"></td>
	</tr>
	<tr> 
		<td height="27"><span class="genmed">{L_GROUP_MEMBERSHIP}:</span></td>
		<td width="1" valign="middle"><span class=menuBorder>|</span>&nbsp;</td>
		<td><span class="genmed">{GROUP_DETAILS} &nbsp;&nbsp;
		<!-- BEGIN switch_subscribe_group_input -->
		<input class="mainoption" type="submit" name="joingroup" value="{L_JOIN_GROUP}" />
		<!-- END switch_subscribe_group_input -->
		<!-- BEGIN switch_unsubscribe_group_input -->
		<input class="mainoption" type="submit" name="unsub" value="{L_UNSUBSCRIBE_GROUP}" />
		<!-- END switch_unsubscribe_group_input -->
		</span></td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#DADADA"></td>
	</tr>
<!-- BEGIN switch_mod_option -->
	<tr> 
		<td height="27"><span class="genmed">{L_GROUP_TYPE}:</span></td>
		<td width="1" valign="middle"><span class=menuBorder>|</span>&nbsp;</td>
		<td><span class="genmed"><input class="formstyle3" type="radio" name="group_type" value="{S_GROUP_OPEN_TYPE}" {S_GROUP_OPEN_CHECKED} /> {L_GROUP_OPEN} &nbsp;&nbsp;<input class="formstyle3" type="radio" name="group_type" value="{S_GROUP_CLOSED_TYPE}" {S_GROUP_CLOSED_CHECKED} />	{L_GROUP_CLOSED} &nbsp;&nbsp;<input class="formstyle3" type="radio" name="group_type" value="{S_GROUP_HIDDEN_TYPE}" {S_GROUP_HIDDEN_CHECKED} />	{L_GROUP_HIDDEN} &nbsp;&nbsp; <input class="mainoption" type="submit" name="groupstatus" value="{L_UPDATE}" /></span></td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#DADADA"></td>
	</tr>
<!-- END switch_mod_option -->
</table>

{S_HIDDEN_FIELDS}

</form>
<br>
<form action="{S_GROUPCP_ACTION}" method="post" name="post">
<table border="0" cellpadding="0" cellspacing="0" width="95%">
	<tr>
		<td colspan="11" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
	<tr bgcolor="#fafafa">
		<td width="20%" align="center" height="30"><span class="genmed">User Level</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="25%" align="center"><span class="genmed">{L_USERNAME}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="15%" align="center"><span class="genmed">{L_POSTS}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="15%" align="center"><span class="genmed">{L_PM}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="15%" align="center"><span class="genmed">{L_EMAIL}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="10%" align="center"><span class="genmed">{L_SELECT}</span></td>
	</tr>
	<tr>
		<td colspan="11" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
	<tr> 
	  <td align="center" height="27"><span class="genmed">{L_GROUP_MODERATOR}</span></td>
	  <td></td>
	  <td align="center"><span class="genmed"><a href="{U_MOD_VIEWPROFILE}">{MOD_USERNAME}</a></span></td>
	  <td></td>
	  <td align="center"><span class="postdetails">{MOD_POSTS}</span></td>
	  <td></td>
	  <td align="center">{MOD_PM_IMG}</td>
	  <td></td>
	  <td align="center" valign="middle"><span class="gen">{MOD_EMAIL_IMG}</span></td>
	  <td></td>
	  <td align="center"> &nbsp; </td>
	</tr>
	<tr>
		<td colspan="11" height="1" bgcolor="#DADADA"></td>
	</tr>
	<!-- BEGIN member_row -->
	<tr> 
		<td align="center" height="27"><span class="genmed">{L_GROUP_MEMBERS}</span></td>
		<td></td>
		<td align="center"><span class="genmed"><a href="{member_row.U_VIEWPROFILE}">{member_row.USERNAME}</a></span></td>
		<td></td>
		<td align="center"><span class="postdetails">{member_row.POSTS}</span></td>
		<td></td>
		<td align="center">{member_row.PM_IMG}</td>
		<td></td>
		<td align="center"><span class="genmed">{member_row.EMAIL_IMG}</span></td>
		<td></td>
		<td align="center"> 
		<!-- BEGIN switch_mod_option -->
		<input type="checkbox" class="formstyle3" name="members[]" value="{member_row.USER_ID}" /> 
		<!-- END switch_mod_option -->
		</td>
	</tr>
	<tr>
		<td colspan="11" height="1" bgcolor="#DADADA"></td>
	</tr>
	<!-- END member_row -->

	<!-- BEGIN switch_no_members -->
	<tr> 
	  <td colspan="11" height="29" align="center"><span class="genmed">{L_NO_MEMBERS}</span></td>
	</tr>
	<tr>
		<td colspan="11" height="1" bgcolor="#DADADA"></td>
	</tr>
	<!-- END switch_no_members -->

	<!-- BEGIN switch_hidden_group -->
	<tr> 
	  <td colspan="11" height="29" align="center"><span class="genmed">{L_HIDDEN_MEMBERS}</span></td>
	</tr>
	<tr>
		<td colspan="11" height="1" bgcolor="#DADADA"></td>
	</tr>
	<!-- END switch_hidden_group -->

	<!-- BEGIN switch_mod_option -->
	<tr >
		<td colspan="11" height="29" align="right"><span class="cattitle">
			<input type="submit" name="remove" value="{L_REMOVE_SELECTED}" class="mainoption" />
		</td>
	</tr>
	<tr>
		<td colspan="11" height="1" bgcolor="#DADADA"></td>
	</tr>
	<!-- END switch_mod_option -->
</table>

<table width="95%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr>
		<td height="5"></td>
	</tr>
	<tr>
		<td align="left" valign="top">
		<!-- BEGIN switch_mod_option -->
		<span class="genmed"><input type="text"  class="post" name="username" maxlength="50" size="20" /> <input type="submit" name="add" value="{L_ADD_MEMBER}" class="mainoption" /> <input type="submit" name="usersubmit" value="{L_FIND_USERNAME}" class="liteoption" onClick="window.open('{U_SEARCH_USER}', '_phpbbsearch', 'HEIGHT=250,resizable=yes,WIDTH=400');return false;" /></span><br /><br />
		<!-- END switch_mod_option --></td>
	</tr>
	<tr> 
	<td><span class="genmed">{PAGINATION}</span></td>
	</tr>
</table>

{PENDING_USER_BOX}

{S_HIDDEN_FIELDS}</form>
<br><br>