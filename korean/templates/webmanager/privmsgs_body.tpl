 
<script language="Javascript" type="text/javascript">
	//
	// Should really check the browser to stop this whining ...
	//
	function select_switch(status)
	{
		for (i = 0; i < document.privmsg_list.length; i++)
		{
			document.privmsg_list.elements[i].checked = status;
		}
	}
</script>
<table border="0" cellspacing="2" cellpadding="2" align="center" width="95%">
	<tr> 
		<td valign="top" align="center" width="70%"> 
			<table height="40" cellspacing="0" cellpadding="0" border="0">
				<tr valign="middle"> 
					<td>{INBOX_IMG}</td>		  
					<td>{SENTBOX_IMG}</td>		  
					<td>{OUTBOX_IMG}</td>		  
					<td>{SAVEBOX_IMG}</td>		  
				</tr>
			</table>
		</td>
		<td align="right" width="30%"> 
		<!-- BEGIN switch_box_size_notice -->
			<table width="175" cellspacing="1" cellpadding="2" border="0" class="bodyline">
				<tr> 
					<td colspan="3" width="175"  nowrap="nowrap"><span class="gensmall">{BOX_SIZE_STATUS}</span></td>
				</tr>
				<tr> 
					<td colspan="3" width="175" bgcolor=#f0f0f0>
						<table cellspacing="0" cellpadding="1" border="0">
							<tr> 
								<td bgcolor="{T_TD_COLOR2}"><img src="templates/webmanager/images/spacer.gif" width="{INBOX_LIMIT_IMG_WIDTH}" height="8" alt="{INBOX_LIMIT_PERCENT}" /></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr> 
					<td width="33%" ><span class="gensmall">0%</span></td>
					<td width="34%" align="center" ><span class="gensmall">50%</span></td>
					<td width="33%" align="right" ><span class="gensmall">100%</span></td>
				</tr>
			</table>
		<!-- END switch_box_size_notice -->
		</td>
	</tr>
</table>
<form method="post" name="privmsg_list" action="{S_PRIVMSGS_ACTION}">
<table width="95%" cellspacing="2" cellpadding="2" border="0"> 
	<tr>
		<td><span class="genmed">{L_DISPLAY_MESSAGES}: 
			<select name="msgdays">{S_SELECT_MSG_DAYS}</select>&nbsp;<input type="submit" value="{L_GO}" name="submit_msgdays" class="liteoption" /></td>
        <td>&nbsp;</td>
	</tr>
	<tr>
		<td width="100%" valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td colspan="9" height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
				<tr bgcolor="#fafafa"> 
					<td width="5%" height="30" nowrap="nowrap" align="center"><span class="menuTitle">{L_FLAG}</span></td>
					<td width="1"><span class=menuBorder>|</span></td>
					<td width="50%" class="thTop" nowrap="nowrap" align="center"><span class="menuTitle">{L_SUBJECT}</span></td>
					<td width="1"><span class=menuBorder>|</span></td>
					<td width="20%" class="thTop" nowrap="nowrap" align="center"><span class="menuTitle">{L_FROM_OR_TO}</span></td>
					<td width="1"><span class=menuBorder>|</span></td>
					<td width="20%" class="thTop" nowrap="nowrap" align="center"><span class="menuTitle">{L_DATE}</span></td>
					<td width="1"><span class=menuBorder>|</span></td>
					<td width="5%" class="thCornerR" nowrap="nowrap" align="center"><span class="menuTitle">{L_MARK}</span></td>
				</tr>
				<tr>
					<td colspan="9" height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
				<!-- BEGIN listrow -->
				<tr> 
					<td align="center" height="27"><img src="{listrow.PRIVMSG_FOLDER_IMG}" alt="{listrow.L_PRIVMSG_FOLDER_ALT}" title="{listrow.L_PRIVMSG_FOLDER_ALT}" /></td>
					<td></td>
					<td >{listrow.PRIVMSG_ATTACHMENTS_IMG}<span class="gen"><a href="{listrow.U_READ}" class="gen">{listrow.SUBJECT}</a></span></td>
					<td></td>
					<td align="center"><span class="name"><a href="{listrow.U_FROM_USER_PROFILE}" class="name">{listrow.FROM}</a></span></td>
					<td></td>
					<td align="center"><span class="postdetails">{listrow.DATE}</span></td>
					<td></td>
					<td align="center"><span class="genmed"> 
						<input type="checkbox" class="formstyle3" name="mark[]2" value="{listrow.S_MARK_ID}" />
					</span></td>
				</tr>
				<tr>
					<td colspan="9" height="1" bgcolor="#DADADA"></td>
				</tr>
				<!-- END listrow -->
				<!-- BEGIN switch_no_messages -->
				<tr> 
					<td colspan="9" height="29" align="center" valign="middle"><span class="gen">{L_NO_MESSAGES}</span></td>
				</tr>
				<tr>
					<td colspan="9" height="1" bgcolor="#DADADA"></td>
				</tr>
				<!-- END switch_no_messages -->
				<tr bgcolor="#fafafa"> 
					<td colspan="9" height="29" align="right"> {S_HIDDEN_FIELDS}
	  					<input type="submit" name="deleteall" value="{L_DELETE_ALL}" class="liteoption" />
						<input type="submit" name="delete" value="{L_DELETE_MARKED}" class="liteoption" />
	  					<input type="submit" name="save" value="{L_SAVE_MARKED}" class="liteoption" />
					</td>
				</tr>
				<tr>
					<td colspan="9" height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
			<table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
				<tr> 
					<td width="5%" align="left" valign="middle"><span class="nav">{POST_PM_IMG}</span></td>
					<td nowrap="nowrap" align="right" valign="top">
						<span class="genmed"><a href="javascript:select_switch(true);"><img src="templates/webmanager/images/icon_allchoice.gif" border="0" alt="{L_MARK_ALL}"></a>&nbsp;&nbsp;<a href="javascript:select_switch(false);"><img src="templates/webmanager/images/icon_choicecancel.gif" border="0" alt="{L_UNMARK_ALL}"></a></span></td>
				</tr>
				<tr>
					<td align="center" valign="top" nowrap="nowrap" colspan="2"><span class="genmed">{PAGINATION}<br /></span></td>
				</tr>
			</table>
		</td>
		<td width="180" valign="top" nowrap="nowrap">{BUDDYLIST}
		</td>
	</table> 
</form>
<br><br>