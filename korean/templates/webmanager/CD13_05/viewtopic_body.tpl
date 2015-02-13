<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ko_KR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
		<td height="10" colspan="2"></td>
	</tr>
	<tr>
		<td align="right" colspan="2">{postrow.EDIT_IMG} 
		<!-- BEGIN switch_user_logged_in -->
		{postrow.DELETE_IMG}
		<!-- END switch_user_logged_in -->
		</td>
	</tr>
	<!--tr>
		<td height="22">&nbsp;<span class="genmed"><b><font color=#000000>{postrow.POST_SUBJECT}</font></b></span></td>
	</tr-->
	<tr> 
		<td colspan="2" height="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="30" bgcolor="#fafafa" align="left" colspan="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td height="5" colspan="3"></td>
				</tr>
				<tr>
					<td width="2%" height="20"></td>
					<td width="96%" ><font color='#000000'>{postrow.POST_SUBJECT}</font></td>
					<td width="2%"></td>
				</tr>
				<tr>
					<td height="5" colspan="2"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="1" colspan="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="10" colspan="2"></td>
	</tr>
	<tr>
		<td width="27%" align="center" valign="top">
			<table border="0" cellspacing="0" cellpadding="1" bgcolor="#FFFFFF" style="border-width:1px; border-color:#{THEME_COLOR_30}; border-style:solid;">
				<tr>
					<td align="center" valign="middle">{postrow.THUMBNAIL_SRC_HEADER}<img src="{postrow.THUMBNAIL_ONLY}" width="{postrow.THUMB_WIDTH_100}" height="{postrow.THUMB_HEIGHT_100}" border="0">{postrow.THUMBNAIL_SRC_TAIL}</td>
				</tr>
			</table>
		</td>
		<td valign="top" height="100%">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
				<tr>
					<td height="5" colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2"><span class="genmed">접수기간 : {postrow.REMARK1} ~ {postrow.REMARK2}</span></td>
				</tr>
				<tr>
					<td height="10" colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2"><span class="genmed">진행상태 : {postrow.REMARK3}</span></td>
				</tr>
				<tr>
					<td height="20" colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2"><span class="genmed" style="color: #aaaaaa; line-height:160%;">{postrow.REMARK14}</span></td>
				</tr>
				<tr>
					<td height="10" colspan="2"></td>
				</tr>
				<tr>
					<td align="left" valign="bottom" style="padding-bottom:3px;"><div class="fb-share-button"  data-href="viewtopic.php?9={postrow.U_POST_ID}" data-type="icon_link"></div></td>
					<td align="right" height="100%" valign="bottom">

						<!-- BEGIN switch_remark4 -->
							<a href="{postrow.REMARK4}" onfocus='this.blur()'><img src="templates/webmanager/images/button_join.jpg" width="76" height="26" border="0"></a>
						<!-- END switch_remark4 -->
						<!-- BEGIN switch_remark5 -->
							<a href="{postrow.REMARK5}" target="_blank" onfocus='this.blur()'><img src="templates/webmanager/images/button_result.jpg" width="76" height="26" border="0"></a>
						<!-- END switch_remark5 -->
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="10" colspan="2"></td>
	</tr>

	<tr> 
		<td height="1" colspan="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="5" colspan="2"></td>
	</tr>
	<tr align="center"> 
		<td valign="top" align="center" colspan="2" height="200">
			<table width="100%" cellspacing="2" cellpadding="2" border="0">
				<tr>
					<td valign="top">
						<span class="genmed">{postrow.MESSAGE}</span>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- END postrow -->
	<tr> 
		<td height="5" colspan="2"></td>
	</tr>
	<tr> 
		<td height="1" colspan="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="5" colspan="2"></td>
	</tr>
</table>
<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left" valign="middle" nowrap="nowrap"><span class="nav">{POST_IMG}<a href="{U_VIEW_FORUM}"><img src="templates/webmanager/images/icon_list.gif" border="0" alt="{L_VIEW_FORUM}" align="middle" /></a>&nbsp;<a href="javascript:void(window.open('{PRINTER_URL}', 'Popup','toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=650, height=600'));"><img src="{PRINTER_IMG}" border="0" align="middle" /></a>
	<!-- BEGIN switch_user_logged_in -->
	<a href="{U_FAV}"><img src="templates/webmanager/images/icon-scrab.gif" border="0" alt="{L_FAV}" align="middle" /></a>
	<!-- END switch_user_logged_in -->
	</span>
	</td>
	<td align="right" valign="top" nowrap="nowrap"></td>
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