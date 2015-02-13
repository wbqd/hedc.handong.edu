<!-- mod : categories hierarchy v 2 -->
<table width="100%" cellspacing="2" cellpadding="2" border="0">
		<tr> 
		<td align="left" valign="middle" width="100%"><b><span class="gen"><font color="#000000">&raquo; {FORUM_NAME}</font></span></b><br><br></td>
		</tr>
</table>

<table width="95%" cellspacing="0" cellpadding="0" border="0">
{POLL_DISPLAY} 
	<!-- BEGIN postrow -->
	<tr> 
		<td colspan="6" height="2" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#b3b3b3"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="10%" height="29">&nbsp;<span class=menuTitle>{MENU_LANG_TITLE}</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span></td>
		<td width="90%" colspan="4"><span class="genmed">{postrow.POST_ICON}<b>{postrow.POST_SUBJECT}</b></span></td>
	</tr>
	<tr> 
		<td colspan="6" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
<!-- BEGIN switch_attach -->
	<tr>
		<td nowrap="nowrap" height="29">&nbsp;<span class=menuTitle>{MENU_LANG_FILENAME}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td colspan="4"><span class="genmed">{postrow.FILENAME_ONLY}{postrow.DOWNLOAD_COUNT}</span></td>
	</tr>
	<tr> 
		<td colspan="6" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
<!-- END switch_attach -->
	<tr> 
		<td colspan="6" height="10">
		</td>
	</tr>
	<tr> 
		<td colspan="6" align="right">{postrow.EDIT_IMG} 

<!-- BEGIN switch_user_logged_in -->
{postrow.DELETE_IMG}
<!-- END switch_user_logged_in -->
		</td>
	</tr>
	<tr>
		<td colspan="6" align="center">
			<table width="94%" cellspacing="0" cellpadding="3" border="0">
				<tr>
					<td><span class="genmed">{postrow.MESSAGE}</span>{postrow.ATTACHMENTS}</td>
				</tr>
				<tr>
					<td colspan="2" align="right"><span class="genmed"><font color="#A7A7A7">{postrow.EDITED_MESSAGE}</font></span></td>
				</tr>						
			</table>
		</td>
	</tr>
	<tr> 
		<td colspan="6" height="15">
		</td>
	</tr>
	<tr>
		<td colspan="6" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor=#b3b3b3></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td colspan="6" height="5">
		</td>
	</tr>
	<!-- END postrow -->
</table>
<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left" valign="middle" nowrap="nowrap"><span class="nav">{POST_IMG}<a href="{U_VIEW_FORUM}"><img src="templates/webmanager/images/icon_list.gif" border="0" alt="{L_VIEW_FORUM}" align="middle" /></a>
	</span></td>
	<td align="right" valign="top" nowrap="nowrap"><a href="{U_VIEW_OLDER_TOPIC}" class="nav">{L_VIEW_PREVIOUS_TOPIC}</a> <a href="{U_VIEW_NEWER_TOPIC}" class="nav">{L_VIEW_NEXT_TOPIC}</a></td>
  </tr>
</table>

<table width="100%" cellspacing="2" border="0" align="center">
  <tr>
  <td align="center" colspan="2"><span class="genmed">{PAGINATION}</span><br /></td>
  </tr>
  <!--
    <tr>
	<td valign="top" nowrap="nowrap" align="center"><span class="genmed" style="line-height=80%"><br></span>
	<table width="318" cellspacing="0" cellpadding="0" border="0">
	<tr>{S_TOPIC_ADMIN}</tr>
	</table>
	</td>
  </tr>-->
</table>
<br><br>