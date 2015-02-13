<script language="Javascript" type="text/javascript">
	//
	// Should really check the browser to stop this whining ...
	//
	function select_switch(status)
	{
		for (i = 0; i < document.topic_list.length; i++)
		{
			document.topic_list.elements[i].checked = status;
		}
	}
</script>

<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="gen">{NAV_CAT_DESC}</span></td>
	</tr>
</table>
<form name="topic_list" method="post" action="{S_MODCP_ACTION}">
<table width="95%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td colspan="5" height="2" bgcolor="#cdcdcd"></td>
	</tr>
	<tr bgcolor="#F5F5F5">
		<td height="30" align="center" colspan="5"><span class="genmed"><b>{L_MOD_CP}</b></span> 
		</td>
	</tr>
	<tr>
		<td height="1" colspan="5" bgcolor="#DADADA"></td>
	</tr>
	<tr> 
		<td colspan="5" align="center">
		<table border="0" width="100%" cellpadding="10" cellspacing="0">
			<tr><td><span class="genmed">{L_MOD_CP_EXPLAIN}</span></td></tr>
		</table>
		</td>
	</tr>
	<tr>
		<td height="1" colspan="5" bgcolor="#DADADA"></td>
	</tr>
	<tr bgcolor="#F5F5F5"> 
		<td width="70%" height="30" align="center">&nbsp;<span class="genmed"><b>{L_TOPICS}</b></span>&nbsp;</td>
		<td width="1"><span class=genmed><font color=#808080>|</font></span></td>
		<td width="25%" align="center" nowrap="nowrap">&nbsp;<span class="genmed"><b>{L_LASTPOST}</b></span>&nbsp;</td>
		<td width="1"><span class=genmed><font color=#808080>|</font></span></td>
		<td width="5%" align="center" nowrap="nowrap">&nbsp;<span class="genmed"><input class="formstyle3" type="checkbox" name="checkAll" value="" onClick="select_switch(this.checked)"/></span>&nbsp;</td>
	</tr>
	<tr>
		<td height="1" colspan="5" bgcolor="#DADADA"></td>
	</tr>
	<!-- BEGIN topicrow -->
	<tr> 
	  <td height="27">&nbsp;<img src="{topicrow.TOPIC_FOLDER_IMG}" alt="{topicrow.L_TOPIC_FOLDER_ALT}" title="{topicrow.L_TOPIC_FOLDER_ALT}" />&nbsp;<span class="genmed">{topicrow.TOPIC_TITLE}</a></span>
	  </td>
	  <td></td>
	  <td align="center" valign="middle" nowrap="nowrap"><span class="postdetails">{topicrow.LAST_POST_TIME}</span></td>
	  <td></td>
	  <td align="center" valign="middle"> 
		<input class="formstyle3" type="checkbox" name="topic_id_list[]" value="{topicrow.TOPIC_ID}" />
	  </td>
	</tr>
	<tr>
		<td height="1" colspan="5" bgcolor="#DADADA"></td>
	</tr>
	<!-- END topicrow -->
	<tr align="right" bgcolor="#F5F5F5"> 
		<td align=left>
			&nbsp; <a href="javascript:select_switch(true);"><img src="templates/webmanager/images/icon_allchoice.gif" border="0" alt="{L_MARK_ALL}"></a>&nbsp;&nbsp;<a href="javascript:select_switch(false);"><img src="templates/webmanager/images/icon_choicecancel.gif" border="0" alt="{L_UNMARK_ALL}"></a>
		</td>
	  <td colspan="4" height="29"> {S_HIDDEN_FIELDS} 
		<input type="submit" name="delete" class="liteoption" value="{L_DELETE}" />
		&nbsp; 
		<input type="submit" name="move" class="liteoption" value="{L_MOVE}" />
		&nbsp; 
	  </td>
	</tr>
	<tr>
		<td colspan="11" height="1" bgcolor="#DADADA"></td>
	</tr>
  </table>
  <table width="95%" cellspacing="2" border="0" cellpadding="2">
  <tr><td align="center"><br><a href="{U_BACK}"><img src="templates/webmanager/images/icon-board-back.gif" border="0"></a></td>
  </tr>
  <tr> 
	<td align="center" valign="top" nowrap="nowrap"><span class="genmed">{PAGINATION}</span></td>
  </tr>
</table>
</form>
<br><br>