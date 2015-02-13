<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="gen">{NAV_CAT_DESC}</span></td>
	</tr>
</table>
<!-- mod : categories hierarchy v 2 -->
<br>
<table border="0" cellpadding="0" cellspacing="0" width="95%" align="center">
	<!-- BEGIN postrow -->
	<tr>
		<td align="right" valign="middle">{postrow.EDIT_IMG} 
		<!-- BEGIN switch_user_logged_in -->
		{postrow.DELETE_IMG}
		<!-- END switch_user_logged_in -->
		{postrow.IP_IMG}
		</td>
	</tr>
	<tr>
		<td>
		&nbsp;<img src="templates/webmanager/images/detail_view_bullet.gif" border="0">&nbsp;<span class="genmed"><font color="#{THEME_COLOR_100}">{postrow.POST_SUBJECT}</font></span>&nbsp;{postrow.GUEST_EMAIL_IMG}&nbsp;&nbsp;<span class="gensmall"><font color="#{THEME_COLOR_30}">{postrow.POST_DATE}</font></span>
		</td>
	</tr>
	<tr>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="8">
                        <p><img src="templates/webmanager/images/guestbox-top.gif" border="0"></p>
                    </td>
					<td background="templates/webmanager/images/guestbox-back.gif">
					</td>
					<td width="8">
                        <p><img src="templates/webmanager/images/guestbox-top2.gif" border="0"></p>
                    </td>
                </tr>
                <tr>
				    <td width="8" background="templates/webmanager/images/guestbox-back.gif">
                    </td>
                    <td align="center" background="templates/webmanager/images/guestbox-back.gif">
                        <table border="0" cellpadding="4" cellspacing="0" width="95%">
                            <tr>
                                <td>
                                   <span class="genmed">{postrow.MESSAGE}</span>
                                </td>
                            </tr>
                        </table>
                    </td>
				    <td width="8" background="templates/webmanager/images/guestbox-back.gif">
                    </td>
                </tr>
                <tr>
                    <td width="8">
                        <p><img src="templates/webmanager/images/guestbox-bottom3.gif" border="0"></p>
                    </td>
                    <td background="templates/webmanager/images/guestbox-back.gif">
                    </td>
                    <td width="8">
                        <p><img src="templates/webmanager/images/guestbox-bottom4.gif" border="0"></p>
                    </td>
                </tr>
            </table>
        </td>
	</tr>
	<!-- END postrow -->
</table>

<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
		<td height="5"></td>
	</tr>
	<tr> 
		<td align="left" valign="middle" nowrap="nowrap"><span class="nav">{POST_IMG}<a href="{U_VIEW_FORUM}"><img src="templates/webmanager/images/icon_list.gif" border="0" alt="{L_VIEW_FORUM}" align="middle" /></a>&nbsp;<a href="javascript:void(window.open('{PRINTER_URL}', 'Popup','toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=650, height=600'));"><img src="{PRINTER_IMG}" border="0" align="middle" /></a>
		</span></td>
		<td align="right" valign="top" nowrap="nowrap"><a href="{U_VIEW_OLDER_TOPIC}" class="nav">{L_VIEW_PREVIOUS_TOPIC}</a> <a href="{U_VIEW_NEWER_TOPIC}" class="nav">{L_VIEW_NEXT_TOPIC}</a></td>
	</tr>
</table>

<table width="95%" cellspacing="2" border="0" align="center">
  <tr>
  	<td align="right">{JUMPBOX}</td>
  </tr>
</table>
<br><br>