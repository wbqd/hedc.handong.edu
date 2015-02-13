<!-- mod : categories hierarchy v 2 -->
<table width="95%" cellspacing="1" cellpadding="0" border="0">
	<!-- BEGIN postrow -->
	<tr>
		<td height="10" colspan="2"></td>
	</tr>
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
					<td width="96%" ><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="gen"><font color='#000000'>{postrow.POST_SUBJECT}</font></a></td>
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
					<td colspan="2"><span class="genmed" style="color: #aaaaaa;">{postrow.REMARK14}</span></td>
				</tr>
				<tr>
					<td height="10" colspan="2"></td>
				</tr>
				<tr>
					<td align="right" height="100%" valign="bottom" colspan="2">
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