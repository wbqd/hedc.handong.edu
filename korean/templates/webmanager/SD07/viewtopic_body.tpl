<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="gen">{NAV_CAT_DESC}</span></td>
	</tr>
</table>
<!-- mod : categories hierarchy v 2 -->
<br>
<table width="95%" cellspacing="1" cellpadding="3" border="0">
	<!-- BEGIN postrow -->
	<tr> 
		<td width="100%" height="28" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td align="right" colspan="2">{postrow.EDIT_IMG} 
				<!-- BEGIN switch_user_logged_in -->
				{postrow.DELETE_IMG}
				<!-- END switch_user_logged_in -->
				</td>
			</tr>				
			<tr>
				<td colspan="2"><img src="templates/webmanager/images/ico_sq3.gif" border="0" align="absmiddle">&nbsp;<span class="genmed"><b><font color=#000000>{postrow.POST_SUBJECT}</font></b></span></td>
			</tr>
			<tr>
				<td class="{postrow.ROW_CLASS}" colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="5">
						<tr>
							<td>
								<span class="genmed">{postrow.MESSAGE}</span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
<!-- BEGIN switch_attach -->
			<tr> 
				<td colspan="2" height="10">
				</td>
			</tr>
			<tr>
				<td colspan="2" height="29" align="right">&nbsp;<span class=menuTitle>{MENU_LANG_FILENAME}</span><span class="genmed">&nbsp;:&nbsp;
				{postrow.FILENAME_ONLY}</span></td>
			</tr>
			<tr> 
				<td colspan="2" height="10">
				</td>
			</tr>
<!-- END switch_attach -->
</table></td>
	</tr>
<!-- END postrow -->
</table>
<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left" valign="middle" nowrap="nowrap"><span class="nav">{POST_IMG}<a href="{U_VIEW_FORUM}"><img src="templates/webmanager/images/icon_list.gif" border="0" alt="{L_VIEW_FORUM}" align="middle" /></a>&nbsp;<a href="javascript:void(window.open('{PRINTER_URL}', 'Popup','toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=650, height=600'));"><img src="{PRINTER_IMG}" border="0" align="middle" /></a>
	<!-- BEGIN switch_user_logged_in -->
	<a href="{U_FAV}"><img src="templates/webmanager/images/icon-scrab.gif" border="0" alt="{L_FAV}" align="middle" /></a>
	<!-- END switch_user_logged_in -->
	</span></td>
	<td align="right" valign="top" nowrap="nowrap"><a href="{U_VIEW_OLDER_TOPIC}" class="nav">{L_VIEW_PREVIOUS_TOPIC}</a> <a href="{U_VIEW_NEWER_TOPIC}" class="nav">{L_VIEW_NEXT_TOPIC}</a></td>
  </tr>
</table>
<table width="95%" cellspacing="2" border="0" align="center">
  <tr>
  <td align="center"><span class="genmed">{PAGINATION}</span><br /></td>
  </tr>
  <tr>
  	<td align="right">{JUMPBOX}</td>
  </tr>
    <!--<tr>
	<td valign="top" nowrap="nowrap" align="center"><span class="genmed" style="line-height=80%"><br></span>
	<table width="318" cellspacing="0" cellpadding="0" border="0">
	<tr>{S_TOPIC_ADMIN}</tr>
	</table>
	</td>
  </tr>-->
</table>
<br><br>