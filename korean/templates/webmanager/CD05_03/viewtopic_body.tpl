<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="gen">{NAV_CAT_DESC}</span></td>
	</tr>
</table>
<!-- mod : categories hierarchy v 2 -->
<table width="95%" cellspacing="0" cellpadding="2" border="0">
	<!-- BEGIN postrow -->
	<tr>
		<td></td>
		<td></td>
		<td align="right" valign="top">{postrow.EDIT_IMG} 

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
	</tr>
	<tr> 
		<td width="18%" height="30">&nbsp;<span class=menuTitle>신청자</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td><span class="genmed"><b><font color=#000000>{postrow.POST_SUBJECT}</font></b></span></td>
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
		<td height="30">&nbsp;<span class=menuTitle>{MENU_LANG_DATE}</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td><span class="genmed">{postrow.POST_DATE}</span></td>
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
		<td height="30">&nbsp;<span class=menuTitle>학&nbsp;&nbsp;&nbsp;번</span></td>
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
		<td height="30">&nbsp;<span class=menuTitle>학&nbsp;&nbsp;&nbsp;부</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td><span class="genmed">{postrow.REMARK2}</span></td>
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
		<td height="30">&nbsp;<span class=menuTitle>휴대폰</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td><span class="genmed">{postrow.REMARK3}</span></td>
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
		<td><span class="genmed"><a href="mailto:{postrow.REMARK4}">{postrow.REMARK4}</a></span></td>
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
		<td colspan="3"  height="3"></td>
	</tr>
	<tr> 
		<td valign="top" height="30">&nbsp;<span class=menuTitle>내&nbsp;&nbsp;&nbsp;용</span></td>
		<td valign="top" width="1"><span class=menuBorder>|</span></td>
		<td><span class="genmed">{postrow.MESSAGE}</span></td>
	</tr>
	<!-- END postrow -->
	<tr>
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor=#{THEME_COLOR_30}></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>
<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left" valign="middle" nowrap="nowrap"><span class="nav">{POST_IMG}<a href="{U_VIEW_FORUM}"><img src="templates/webmanager/images/icon_list.gif" border="0" alt="{L_VIEW_FORUM}" align="middle" /></a>&nbsp;<a href="javascript:void(window.open('{PRINTER_URL}', 'Popup','toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=650, height=600'));"><img src="{PRINTER_IMG}" border="0" align="middle" /></a>
	<!-- BEGIN switch_user_logged_in -->
	<a href="{U_FAV}"><img src="templates/webmanager/images/icon-scrab.gif" border="0" alt="{L_FAV}" align="middle" /></a>
	<!-- END switch_user_logged_in -->
	</span></td>
	<td align="right" valign="top" nowrap="nowrap"><!--a href="{U_VIEW_OLDER_TOPIC}" class="nav">{L_VIEW_PREVIOUS_TOPIC}</a> <a href="{U_VIEW_NEWER_TOPIC}" class="nav">{L_VIEW_NEXT_TOPIC}</a--></td>
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
