<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="gen">{NAV_CAT_DESC}</span></td>
	</tr>
</table>
<table width="95%" cellspacing="1" cellpadding="0" border="0">
	<tr>
		<td>
			<span class="genmed">{FORUM_DESC}</span>
		</td>
	</tr>
</table>
<!-- mod : categories hierarchy v 2 -->
<table width="95%" cellspacing="1" cellpadding="0" border="0">
<!-- BEGIN postrow -->
	<tr>
		<td align="right">{postrow.EDIT_IMG} 
		<!-- BEGIN switch_user_logged_in -->
		{postrow.DELETE_IMG}
		<!-- END switch_user_logged_in -->
		</td>
	</tr>
	<tr>
		<td height="22">&nbsp;<span class="genmed" style="color:#000000; font-weight: bold; font-size:13px;">{postrow.POST_SUBJECT}</span></td>
	</tr>
	<tr>
		<td height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td width="100%" valign="top">
			<table width="100%" border="0" cellspacing="3" cellpadding="5">
				<tr>
					<td width="25%" valign="top" align="center">
					<table border="0" cellspacing="0" cellpadding="1" bgcolor="#FFFFFF" style="border-width:1px; border-color:#{THEME_COLOR_30}; border-style:solid;">
						<tr>
							<td align="center" valign="middle"><a href="{postrow.REMARK6}" target="{postrow.REMARK7}"><img src="{postrow.THUMBNAIL_ONLY}" width="{postrow.THUMB_WIDTH_100}" height="{postrow.THUMB_HEIGHT_100}" border="0"></a></td>
						</tr>
					</table>
					</td>
					<td valign="top">
						<table border="0" cellpadding="0" cellspacing="1" width="100%" span class="genmed" style="line-height=180%">
							<!-- BEGIN switch_remark1 -->
							<tr>
								<td width="3%" valign="top" align="center" height="20">
									<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0">
								</td>
								<td width="97%">
									{postrow.REMARK1}									
								</td>
							</tr>
							<!-- END switch_remark1 -->
							<!-- BEGIN switch_remark2 -->
							<tr>
								<td width="3%" valign="top" align="center" height="20">
									<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0">
								</td>
								<td width="97%">
									{postrow.REMARK2}									
								</td>
							</tr>
							<!-- END switch_remark2 -->
							<!-- BEGIN switch_remark3 -->
							<tr>
								<td valign="top" align="center" height="20">
									<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0">
								</td>
								<td>
									{postrow.REMARK3}									
								</td>
							</tr>
							<!-- END switch_remark3 -->
							<!-- BEGIN switch_remark4 -->
							<tr>
								<td valign="top" align="center" height="20">
									<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0">
								</td>
								<td>
									{postrow.REMARK4}
								</td>
							</tr>
							<!-- END switch_remark4 -->
							<!-- BEGIN switch_remark5 -->
							<tr>
								<td valign="top" align="center" height="20">
									<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0">
								</td>
								<td>
									{postrow.REMARK5}									
								</td>
							</tr>
							<!-- END switch_remark5 -->
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td valign="middle" height="5"></td>
	</tr>
	<tr align="center"> 
		<td valign="top" align="center" height="200">
			<table width="100%" cellspacing="2" cellpadding="2" border="0">
				<tr>
					<td valign="top">
						<span class="genmed">{postrow.MESSAGE}</span>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td valign="middle" height="5"></td>
	</tr>
	<!-- END postrow -->
	<tr> 
		<td height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="5"></td>
	</tr>
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
  	<td align="right">{JUMPBOX}</td>
  </tr>
  <!--<tr> 
	<td width="73%" valign="top" nowrap="nowrap" align="right">
	<table width="318" cellspacing="0" cellpadding="0" border="0">
	<tr>{S_TOPIC_ADMIN}</tr>
	</table>
	</td>
  </tr>-->
</table>
<br><br>