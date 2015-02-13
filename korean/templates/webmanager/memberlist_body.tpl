<form method="post" action="{S_MODE_ACTION}">
  <table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
	  <td><a href="{U_USERGROUP}"><img src="templates/webmanager/images/button-usergroup.gif" border="0"></a></td>
	  <td align="right"><span class="genmed">{S_MODE_SELECT}&nbsp;&nbsp;{S_ORDER_SELECT}&nbsp;&nbsp; 
		<input type="submit" name="submit" value="{L_SUBMIT}" class="liteoption" />
		</span></td>
	</tr>
  </table>
<table border="0" cellpadding="0" cellspacing="0" width="95%">
<tr>
	<td colspan="11" height="1" bgcolor="#{THEME_COLOR_30}"></td>
</tr>
<tr bgcolor="#Fafafa">
	<td width="5%" align="center"  height="29"><span class="menuTitle">#</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td align="center" height="29"><span class="menuTitle">{L_USERNAME}</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="15%" align="center" height="29"><span class="menuTitle">{L_PRIVATEMSGS}</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="15%" align="center" height="29"><span class="menuTitle">{L_EMAIL}</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="18%" align="center" height="29"><span class="menuTitle">{L_JOINED}</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="15%" align="center" height="29"><span class="menuTitle">{L_POSTS}</span></td>
</tr>
<tr>
	<td colspan="11" height="1" bgcolor="#{THEME_COLOR_30}"></td>
</tr>
	<!-- BEGIN memberrow -->
<tr> 
	<td height="29" align="center"><span class="genmed">{memberrow.ROW_NUMBER}</span></td>
	<td></td>
	<td align="center"><span class="genmed"><a href="{memberrow.U_VIEWPROFILE}" class="gen">{memberrow.USERNAME}</a></span></td>
	<td></td>
	<td align="center"><span class="genmed">{memberrow.PM_IMG}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{memberrow.EMAIL_IMG}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{memberrow.JOINED}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{memberrow.POSTS}</span></td>
  </tr>
  <tr>
	<td colspan="11" height="1" bgcolor="#DADADA"></td>
</tr>
	<!-- END memberrow -->
</table>

  <table width="95%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
	  <td align="left" valign="top"><span class="genmed">{TOTAL_USERS_ONLINE}&nbsp;{LOGGED_IN_USER_LIST}</span></td>
	</tr>
  </table>

<table width="95%" cellspacing="0" cellpadding="0" border="0">
  <tr> 
	<td align="center"><span class="genmed">{PAGINATION}</span></td>
  </tr>
</table></form>
<br>
