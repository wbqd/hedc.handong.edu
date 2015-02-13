<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="gen">{NAV_CAT_DESC}</span></td>
	</tr>
</table>
<table width="95%" cellspacing="0" cellpadding="4" border="0">
	<tr>
		<td>
			<span class="genmed">{FORUM_DESC}</span>
		</td>
	</tr>
</table>
<!-- mod : categories hierarchy v 2 -->
<table width="95%" cellspacing="0" cellpadding="4" border="0">
	<!-- BEGIN postrow -->
	<tr> 
		<td colspan="3" align="right">{postrow.EDIT_IMG} 
		<!-- BEGIN switch_user_logged_in -->
		{postrow.DELETE_IMG}
		<!-- END switch_user_logged_in -->
		</td>
	</tr>
	<tr>
		<td colspan="3" height="2" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	<tr>
		<td width="10%" nowrap="nowrap" height="30">&nbsp;<span class=menuTitle>{MENU_LANG_TITLE}</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td width="90%"><span class="genmed"><b><font color=#000000>{postrow.POST_SUBJECT}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="30">&nbsp;<span class=menuTitle>신청일</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td><span class="genmed">{postrow.POST_DATE} </span> ( written By <span class="genmed">{postrow.U_PROFILE_HEAD}<font color=#000000>{postrow.POSTER_NAME}</font>{postrow.U_PROFILE_TAIL} )&nbsp;</td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="30">&nbsp;<span class=menuTitle>이름</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td><span class="genmed">{postrow.REMARK1}</span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="30">&nbsp;<span class=menuTitle>학부</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td><span class="genmed">{postrow.REMARK2}&nbsp;</span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="30">&nbsp;<span class=menuTitle>학번</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td><span class="genmed">{postrow.REMARK3}&nbsp;</span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="30">&nbsp;<span class=menuTitle>연락처</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td><span class="genmed">{postrow.REMARK4}</span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="30">&nbsp;<span class=menuTitle>E-mail</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td><span class="genmed"><a href="mailto:{postrow.REMARK5}">{postrow.REMARK5}</a></span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td valign="top" height="100">&nbsp;<span class=menuTitle>요약</span></td>
		<td width="3" valign="top"><span class=menuBorder>|</span></td>
		<td valign="top"><span class="genmed" style="line-height:180%;">{postrow.MESSAGE}</span></td>
	</tr>
	<tr> 
		<td colspan="3" height="10">
		</td>
	</tr>
<!-- BEGIN switch_attach -->
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" height="29">&nbsp;<span class=menuTitle>{MENU_LANG_FILENAME}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td><span class="genmed">{postrow.FILENAME_ONLY}{postrow.DOWNLOAD_COUNT}</span></td>
	</tr>
<!-- END switch_attach -->
	<!-- END postrow -->
	<tr>
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td colspan="3" height="5">
		</td>
	</tr>
</table>
<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left" valign="middle" nowrap="nowrap"><span class="nav">{POST_IMG}<a href="{U_VIEW_FORUM}"><img src="templates/webmanager/images/icon_list.gif" border="0" alt="{L_VIEW_FORUM}" align="middle" /></a>&nbsp;<a href="javascript:void(window.open('{PRINTER_URL}', 'Popup','toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=650, height=600'));"><img src="{PRINTER_IMG}" border="0" align="middle" /></a>
	<!-- BEGIN switch_user_logged_in -->
	<a href="{U_FAV}"><img src="templates/webmanager/images/icon-scrab.gif" border="0" alt="{L_FAV}" align="middle" /></a>
	<!-- END switch_user_logged_in -->
	</span></td>
	<td align="right" valign="top" nowrap="nowrap"></td>
  </tr>
</table>

<table width="95%" cellspacing="2" border="0" align="center">
  <tr>
  <td align="center"><span class="genmed">{PAGINATION}</span><br /></td>
  </tr>
  <tr>
  	<td align="right">{JUMPBOX}</td>
  </tr>
  <!--
    <tr>
	<td valign="top" nowrap="nowrap" align="center"><span class="genmed" style="line-height=80%"><br></span>
	<table width="318" cellspacing="0" cellpadding="0" border="0">
	<tr>{S_TOPIC_ADMIN}</tr>
	</table>
	</td>
  </tr>
  -->
</table>
<br><br>