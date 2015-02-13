<table cellspacing="0" cellpadding="0" border="0" align="center">
  <tr> 
	<td valign="middle">{INBOX_IMG}</td>
	<td valign="middle">{SENTBOX_IMG}</td>
	<td valign="middle">{OUTBOX_IMG}</td>
	<td valign="middle">{SAVEBOX_IMG}</td>
	</tr>
</table>
<br>
<form method="post" action="{S_PRIVMSGS_ACTION}">
<table width="95%" cellspacing="0" cellpadding="0" border="0">
	<tr> 
		<td colspan="9" height="4">
		</td>
	</tr>
	<tr> 
		<td colspan="9" height="1" bgcolor="#{THEME_COLOR_30}">
		</td>
	</tr>
	<tr>
		<td width="10%" nowrap="nowrap" height="30">&nbsp;<span class=menuTitle>{MENU_LANG_FROM}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="50%" colspan="4">&nbsp;<span class="genmed"><a href="{U_FROM_USER_PROFILE}" class="name">{MESSAGE_FROM}</a></span></td>
		<td width="10%">&nbsp;<span class=menuTitle>{MENU_LANG_TO}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="30%">&nbsp;<span class="genmed"><a href="{U_TO_USER_PROFILE}" class="name">{MESSAGE_TO}</a></span></td>
	</tr>
	<tr> 
		<td colspan="9" height="1" bgcolor="#DADADA">
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" height="27">&nbsp;<span class=menuTitle>{MENU_LANG_SUBJECT}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td colspan="4">&nbsp;<span class="genmed">{POST_SUBJECT}</span></td>
		<td nowrap="nowrap" height="29">&nbsp;<span class=menuTitle>{MENU_LANG_DATE}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td>&nbsp;<span class="genmed">{POST_DATE}</span></td>
	</tr>
	<tr> 
		<td colspan="9" height="1" bgcolor="#DADADA">
		</td>
	</tr>
	<tr> 
		<td colspan="9" height="5">
		</td>
	</tr>
	<tr> 
		<td colspan="9" align="right" valign="top"> {EDIT_PM_IMG}</td>
	</tr>
	<tr>
		<td colspan="9" align="center" valign="top">
			<table width="98%" cellspacing="0" cellpadding="3" border="0">
				<tr>
					<td><span class="genmed">{MESSAGE}</span>
<!-- BEGIN postrow -->
	{ATTACHMENTS}
<!-- END postrow -->
				<!--br><span class="genmed"><font color="#8A8A8A">{postrow.SIGNATURE}</font></span-->
				</td>
				</tr>			
			</table>
		</td>
	</tr>
	<tr> 
		<td colspan="9" height="15">
		</td>
	</tr>
</table>
<table width="95%" cellspacing="0" cellpadding="0" border="0" align="center">
	<tr>
	  <td colspan="3" height="28" align="right"> {S_HIDDEN_FIELDS} 
		<input type="submit" name="save" value="{L_SAVE_MSG}" class="liteoption" />
		<input type="submit" name="delete" value="{L_DELETE_MSG}" class="liteoption" />
<!-- BEGIN switch_attachments -->
		<input type="submit" name="pm_delete_attach" value="{L_DELETE_ATTACHMENTS}" class="liteoption" />
<!-- END switch_attachments -->
	  </td>
	</tr>
	<tr>
		<td colspan="3" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
</table>
<table width="95%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
		<td>{REPLY_PM_IMG}</td>
	</tr>
</table>
</form>
<br><br>