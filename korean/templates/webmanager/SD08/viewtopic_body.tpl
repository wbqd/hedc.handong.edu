<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="gen">{NAV_CAT_DESC}</span></td>
	</tr>
</table>
<!-- mod : categories hierarchy v 2 -->
<table width="95%" cellspacing="1" cellpadding="0" border="0">
	<!-- BEGIN postrow -->
	<!-- BEGIN switch_not_reply -->
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td align="right">{postrow.EDIT_IMG} 
		<!-- BEGIN switch_user_logged_in -->
		{postrow.DELETE_IMG}
		<!-- END switch_user_logged_in -->
		</td>
	</tr>
	<tr>
		<td height="22">&nbsp;<span class="genmed"><b><font color=#000000>{postrow.POST_SUBJECT}</font></b></span></td>
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
					<td width="30%" valign="top" align="center">
					<table border="0" cellspacing="0" cellpadding="1" bgcolor="#FFFFFF" style="border-width:1px; border-color:#{THEME_COLOR_30}; border-style:solid;">
						<tr>
							<td align="center" valign="middle">{postrow.THUMBNAIL_SRC_HEADER}<img src="{postrow.THUMBNAIL_ONLY}" width="{postrow.THUMB_WIDTH_100}" height="{postrow.THUMB_HEIGHT_100}" border="0">{postrow.THUMBNAIL_SRC_TAIL}</td>
						</tr>
					</table>
					</td>
					<td valign="top">
						<table border="0" cellpadding="0" cellspacing="1" width="100%" span class="genmed" style="line-height=180%">
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
							<!-- BEGIN switch_remark6 -->
							<tr>
								<td valign="top" align="center" height="20">
									<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0">
								</td>
								<td>
									{postrow.REMARK6}
								</td>
							</tr>
							<!-- END switch_remark6 -->
							<!-- BEGIN switch_remark7 -->
							<tr>
								<td valign="top" align="center" height="20">
									<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0">
								</td>
								<td>
									{postrow.REMARK7}
								</td>
							</tr>
							<!-- END switch_remark7 -->
							<!-- BEGIN switch_remark8 -->
							<tr>
								<td valign="top" align="center" height="20">
									<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0">
								</td>
								<td>
									{postrow.REMARK8}
								</td>
							</tr>
							<!-- END switch_remark8 -->
							<!-- BEGIN switch_remark9 -->
							<tr>
								<td valign="top" align="center" height="20">
									<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0">
								</td>
								<td>
									{postrow.REMARK9}
								</td>
							</tr>
							<!-- END switch_remark9 -->
							<!-- BEGIN switch_remark10 -->
							<tr>
								<td valign="top" align="center" height="20">
									<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0">
								</td>
								<td>
									{postrow.REMARK10}
								</td>
							</tr>
							<!-- END switch_remark10 -->
							<!-- BEGIN switch_remark11 -->
							<tr>
								<td valign="top" align="center" height="20">
									<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0">
								</td>
								<td>
									{postrow.REMARK11}
								</td>
							</tr>
							<!-- END switch_remark11 -->
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
		<td valign="top" align="center">
			<table width="100%" cellspacing="2" cellpadding="2" border="0">
				<tr>
					<td valign="top">
						<span class="genmed">{postrow.MESSAGE}</span>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- END switch_not_reply -->

	<!-- BEGIN switch_reply -->
	<tr> 
		<td height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<table width="98%" cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td width="80%" height="30">&nbsp;<span class="genmed"><b>{postrow.COMMENTOR}</b></span>&nbsp;<span class="postdetails">({postrow.POST_DATE})</span></td>
					<td width="20%" align="right">
				<!-- BEGIN switch_password -->
					<a style='cursor:hand' onclick='toggle(miniPass_{postrow.U_POST_ID});'>
					<img src="templates/webmanager/images/comment-del.gif" align="absmiddle" border="0">
					</a>
					<span id='miniPass_{postrow.U_POST_ID}' style='display:none;width:100%;filter:blendTrans(Duration=0.5)'>
						<table border=0 cellspacing=0 cellpadding=0>		
							<form method=post name=miniPassForm_{postrow.U_POST_ID} action="posting.php">
							<input type="hidden" name=mode value="delete">
							<input type="hidden" name=p value="{postrow.U_POST_ID}">
							<tr>
								<td><img src="templates/webmanager/images/title-pass1.gif" align="absmiddle" border="0">&nbsp;<span class=menuBorder>|</span><span class="gen"><input type="password" name="remark15" size="4" maxlength="4" class="formstyle4" length=4 value="" />
								<a style='cursor:hand' onclick="go_del('miniPassForm_{postrow.U_POST_ID}');"> 
								<img src="templates/webmanager/images/comment-ok.gif"  border="0" align=absmiddle onclick>
								</a>
								</span></td>
							</tr>
							</form>
						</table>
					</span>	
				<!-- END switch_password -->
				<!-- BEGIN switch_del -->
					<a href='{postrow.U_DELETE}'><img src="templates/webmanager/images/comment-del.gif" align="absmiddle" border="0"></a>
				<!-- END switch_del -->
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="3"></td>
	</tr>
	<tr>
		<td align="center">
			<table width="95%" cellspacing="3" cellpadding="5" border="0">
				<tr>
					<td><span class="genmed">{postrow.MESSAGE}</span>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td  height="1"></td>
	</tr>
	<!-- END switch_reply -->
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
	<!-- Comment(Begin) -->
	<!-- BEGIN switch_reply_possible -->
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td align="center">
			<form action="posting.php" method="post" name="post" onsubmit="return checkForm(this)" enctype="multipart/form-data">
			<table width="100%" cellspacing="0" cellpadding="0" border="0" height="134">
				<tr bgcolor=#fafafa>					
					<td  align="center">
						<table width="98%" cellspacing="0" cellpadding="5" border="0">
							<!-- BEGIN switch_user_logged_out -->
							<tr>
								<td width="8%" align="center">
								&nbsp;&nbsp;<img src="templates/webmanager/images/author1.gif" align="absmiddle">	
								</td>
								<td width="15%">
								<span class="gen"><input type="text" name="subject" size="15" maxlength="60" class="post" value="{SUBJECT}" /></span>
									</td>
								<td width="5%" align="center">
								<img src="templates/webmanager/images/title-pass1.gif" align="absmiddle">	
								</td>
								<td width="50%">

								<span class="gen">
								<input type="password" name="remark15" size="4" maxlength="4" class="post" value="" /></span>								
								</td>
							</tr>
							<!-- END switch_user_logged_out -->
							<!-- BEGIN switch_user_logged_in -->
							<tr>
								<td width="8%" align="center">
								</td>
								<td width="15%">				
								<input type="hidden" name="subject" size="15" maxlength="60" class="post" value="{USERNAME}" />
								</td>
								<td width="5%" align="center">
								</td>
								<td width="50%">								
								</td>
							</tr>
							<!-- END switch_user_logged_in -->
							<tr>
								<td colspan="4" align="center">
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tr>
											<td><span class="genmed"><textarea name="message" rows="5" cols="72" wrap="virtual" class="post" style='width:99%;height:80;overflow:auto;'>{MESSAGE}</textarea></span>
											</td>
											<td width="15%"><p>
											<input type=image  class="formstyle3" name="post" src="templates/webmanager/images/comment-write.gif"></p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<input type="hidden" name="post" value="{L_SUBMIT}" />
			<input type="hidden" name="mode" value="reply" />
			<input type="hidden" name="t" value="{TOPIC_ID}" />
			</form>
		</td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<!-- END switch_reply_possible -->
	<!-- Comment(End) -->
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