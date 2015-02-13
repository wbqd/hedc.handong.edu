<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="gen">{NAV_CAT_DESC}</span></td>
	</tr>
</table>
<table width="95%" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td colspan="2" height="1" bgcolor="#{THEME_COLOR_30}"></td>
</tr>
	<tr bgcolor="#F5F5F5">
		<td height="30" align="center" colspan="2"><span class="genmed"><b>{L_IP_INFO}</b></span></td>
	</tr>
<tr>
	<td colspan="2" height="1" bgcolor="#{THEME_COLOR_30}"></td>
</tr>
	<tr bgcolor="#F9F9F9"> 
		<td height="30" colspan="2"><span class="genmed"><b>{L_THIS_POST_IP}</b></span></td>
	</tr>
	<tr>
		<td height="1" colspan="2" bgcolor="#DADADA"></td>
	</tr>
	<tr> 
		<td height="20"> 
			&nbsp;<span class="genmed">{IP} [ {POSTS} ]</span>
		</td>
		<td align="right">
			<!--p><a href="{U_LOOKUP_IP}"><img src="templates/webmanager/images/icon_ipsearch.gif" border="0"></a></p-->
		</td>
	</tr>
	<tr>
		<td height="1" colspan="2" bgcolor="#DADADA"></td>
	</tr>
	<tr bgcolor="#F9F9F9"> 
		<td height="30" colspan="2"><span class="genmed"><b>{L_OTHER_USERS}</b></span></td>
	</tr>
	<tr>
		<td height="1" colspan="2" bgcolor="#DADADA"></td>
	</tr>
  <!-- BEGIN userrow -->
	<tr> 
		<td height="20"> 
			&nbsp;<span class="genmed"><a href="{userrow.U_PROFILE}">{userrow.USERNAME}</a> [ {userrow.POSTS} ]</span>
		</td>
		<td align="right" valign="middle">
			<p><a href="{userrow.U_SEARCHPOSTS}" title="{userrow.L_SEARCH_POSTS}"><img src="{SEARCH_IMG}" border="0" alt="{L_SEARCH}"  /></a></p>
		</td>
	</tr>
	<tr>
		<td height="1" colspan="2" bgcolor="#DADADA"></td>
	</tr>
  <!-- END userrow -->
	<tr bgcolor="#F9F9F9"> 
		<td height="30" colspan="2"><span class="genmed"><b>{L_OTHER_IPS}</b></span></td>
	</tr>
	<tr>
		<td height="1" colspan="2" bgcolor="#DADADA"></td>
	</tr>
  <!-- BEGIN iprow -->
	<tr> 
		<td height="20">
			&nbsp;<span class="genmed">{iprow.IP} [ {iprow.POSTS} ]</span>
		</td>
		<td align="right">
			<!--p><a href="{iprow.U_LOOKUP_IP}"><img src="templates/webmanager/images/icon_ipsearch.gif" border="0"></a></p-->
		</td>
	</tr>
	<tr>
		<td height="1" colspan="2" bgcolor="#DADADA"></td>
	</tr>
  <!-- END iprow -->
	<tr>
		<td colspan="2" height="2" bgcolor="#F2F2F2"></td>
	</tr>
</table>
<p align="center"><a href="{U_BACK}"><img src="templates/webmanager/images/icon-board-back.gif" border="0"></a></p>
<br><br>