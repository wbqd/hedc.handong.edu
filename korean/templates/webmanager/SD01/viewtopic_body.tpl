<table width="95%" cellspacing="2" cellpadding="2" border="0">
	<tr> 
	  <td align="right" valign="top" width="100%"><span class="gen">{NAV_CAT_DESC}</span></td>
	</tr>
</table>
<!-- mod : categories hierarchy v 2 -->
<!-- BEGIN postrow -->
<table border="0" cellpadding="0" cellspacing="0" width="95%">
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
	   <td width="3%"></td>
           <td valign="top" align="right" valign="top">{postrow.EDIT_IMG}
		   <!-- BEGIN switch_user_logged_in -->
			{postrow.DELETE_IMG}
		   <!-- END switch_user_logged_in -->
</td>
	</tr>
</table>
<table border="0" cellpadding="2" cellspacing="0" width="95%">
	<tr>
		<td valign="middle" height="30" bgcolor="{T_TD_COLOR3}" colspan="3">
			<span class="genmed">&nbsp;&nbsp;&nbsp;&nbsp;<b><font color=#000000>{postrow.POST_SUBJECT}</font></b></span>
		</td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td width="3%"></td>
		<td width="94%" align="left" valign="top">
			<span class="genmed">{postrow.MESSAGE}</span>{postrow.ATTACHMENTS}
		</td>
		<td width="3%">
		</td>
	</tr>
</table>
<!-- END postrow -->
<br>
<!-- BEGIN switch_admin_now -->
<table width="95%" cellspacing="2" cellpadding="2" border="0">
  <tr> 
  	<td align="left" valign="middle" nowrap="nowrap"><span class="nav">{POST_IMG}<a href="{U_VIEW_FORUM}"><img src="templates/webmanager/images/icon_list.gif" border="0" alt="{L_VIEW_FORUM}" align="middle" /></a>&nbsp;<a href="javascript:void(window.open('{PRINTER_URL}', 'Popup','toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=650, height=600'));"><img src="{PRINTER_IMG}" border="0" align="middle" /></a>
	</span></td>
  </tr>
</table>
<!-- END switch_admin_now -->
<table width="95%" cellspacing="2" border="0" align="center">
  <tr> 
	<td valign="top" align="right">{JUMPBOX}</td>
  </tr>
</table>
<br><br>