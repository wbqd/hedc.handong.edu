<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="gen">{NAV_CAT_DESC}</span></td>
	</tr>
</table>
<!-- mod : categories hierarchy v 2 -->
	<!-- BEGIN postrow -->
<!-- BEGIN switch_not_reply -->
<table width="95%" cellspacing="0" cellpadding="2" border="0">
	<tr>
		<td></td>
		<td></td>
		<td align="right" valign="top">
		{postrow.EDIT_IMG} 
		</td>
	</tr>
</table>
<table width="95%" cellspacing="0" cellpadding="2" border="0">
	<tr>
		<td height="10" colspan="3"></td>
	</tr>
	<tr>
		<td colspan="3">
			<table width="100%" border="1" cellspacing="0" bordercolor="#cccccc" summary="" bordercolordark="#ffffff" cellpadding="5" >
				<tr> 
					<td width="16%" align="center" bgcolor="#EDEDED">&nbsp;<span class=menuTitle>상담신청일</span></td>
					<td width="24%"><span class="genmed">{postrow.REMARK1}</span></td>
					<td width="12%" align="center" bgcolor="#EDEDED">&nbsp;<span class=menuTitle>시간대</span></td>
					<td width="16%"><span class="genmed">{postrow.REMARK2}</span></td>
					<td width="12%" align="center" bgcolor="#EDEDED">&nbsp;<span class=menuTitle>튜터</span></td>
					<td width="20%"><span class="genmed">{postrow.REMARK3}</span></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="10" colspan="3"></td>
	</tr>
</table>
<!-- END switch_not_reply -->

<!-- BEGIN switch_reply -->
<!-- BEGIN switch_my_topic -->
<table width="95%" cellspacing="0" cellpadding="2" border="0">
	<tr>
		<td></td>
		<td></td>
		<td align="right" valign="top">
		{postrow.EDIT_IMG} 
		{postrow.DELETE_IMG}
		</td>
	</tr>
</table>
<table width="95%" cellspacing="0" cellpadding="2" border="0">
	<tr>
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor=#{THEME_COLOR_30}></td>
				</tr>
			</table>
		</td>
	</tr>

	<tr> 
		<td height="30" width="10%">&nbsp;<span class=menuTitle>이&nbsp;&nbsp;&nbsp;름</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td width="90%"><span class="genmed">{postrow.POST_SUBJECT}</span></td>
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
		<td colspan="3"  height="3"></td>
	</tr>
	<tr> 
		<td valign="top" height="150">&nbsp;<span class=menuTitle>내&nbsp;&nbsp;&nbsp;용</span></td>
		<td valign="top" width="1"><span class=menuBorder>|</span></td>
		<td align="left" valign="top"><span class="genmed">{postrow.MESSAGE}</span></td>
	</tr>
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
<!-- END switch_my_topic -->
<!-- BEGIN switch_not_my_topic -->

<table width="95%" cellspacing="0" cellpadding="2" border="0">
	<tr>
		<td height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor=#{THEME_COLOR_30}></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td>
			자신이 신청한 정보만 조회가 가능합니다.
		</td>
	</tr>
	<tr>
		<td  height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor=#{THEME_COLOR_30}></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<!-- END switch_not_my_topic -->
<!-- END switch_reply -->
<!-- END postrow -->
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
