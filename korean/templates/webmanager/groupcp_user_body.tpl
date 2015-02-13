<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="genmed"><img src="templates/webmanager/images/arrow-head.gif" border="0" align="absmiddle">&nbsp;Home > {L_USERGROUPS}</span><br><br></td>
	</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="95%">
	<tr>
		<td colspan="3" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
  <!-- BEGIN switch_groups_joined -->
	<tr bgcolor="#fafafa">
		<td colspan="3" align="center" height="30"><span class="genmed"><b>{L_GROUP_MEMBERSHIP_DETAILS}</b></span></td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
  <!-- BEGIN switch_groups_member -->
	<tr> 
		<td width="30%" height="30"  align="center" valign="middle"><span class="genmed">{L_YOU_BELONG_GROUPS}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="70%" align="right" valign="middle"> 
			<table width="90%" cellspacing="0" cellpadding="0" border="0">
			<form method="get" action="{S_USERGROUP_ACTION}">
				<tr>
					<td width="40%"><span class="gensmall">{GROUP_MEMBER_SELECT}</span></td>
					<td align="center" width="30%"> 
					<input type="submit" value="{L_VIEW_INFORMATION}" class="liteoption" />{S_HIDDEN_FIELDS}
					</td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#E8E8E8"></td>
	</tr>

	  <!-- END switch_groups_member -->
	  <!-- BEGIN switch_groups_pending -->
	<tr> 
		<td width="30%" height="30"><span class="genmed">{L_PENDING_GROUPS}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="70%" align="right"> 
			<table width="90%" cellspacing="0" cellpadding="0" border="0">
			<form method="get" action="{S_USERGROUP_ACTION}">
				<tr>
					<td width="40%"><span class="gensmall">{GROUP_PENDING_SELECT}</span></td>
					<td align="center" width="30%"> 
					<input type="submit" value="{L_VIEW_INFORMATION}" class="liteoption" />{S_HIDDEN_FIELDS}
					</td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#E8E8E8"></td>
	</tr>

	  <!-- END switch_groups_pending -->
	  <!-- END switch_groups_joined -->
	  <!-- BEGIN switch_groups_remaining -->
	<tr bgcolor="#fafafa"> 
		<td colspan="3" align="center" height="29"><span class="genmed"><b>{L_JOIN_A_GROUP}</b></span></td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
	<tr> 
		<td width="30%" height="30"><span class="genmed">{L_SELECT_A_GROUP}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="70%" align="right"> 
			<table width="90%" cellspacing="0" cellpadding="0" border="0">
			<form method="get" action="{S_USERGROUP_ACTION}">
				<tr>
					<td width="40%"><span class="gensmall">{GROUP_LIST_SELECT}</span></td>
					<td align="center" width="30%"> 
					<input type="submit" value="{L_VIEW_INFORMATION}" class="liteoption" />{S_HIDDEN_FIELDS}
					</td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#E8E8E8"></td>
	</tr>

  <!-- END switch_groups_remaining -->
</table>
<br clear="all" /><br>