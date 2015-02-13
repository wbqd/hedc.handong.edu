<script language="Javascript" type="text/javascript">
	//
	// Should really check the browser to stop this whining ...
	//
	function select_switch(status)
	{
		for (i = 0; i < document.attach_list.length; i++)
		{
			document.attach_list.elements[i].checked = status;
		}
	}
</script>
<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="genmed"><img src="templates/webmanager/images/arrow-head.gif" border="0" align="absmiddle">&nbsp;Home > {L_UACP}</span></td>
	</tr>
</table>
<form method="post" name="attach_list" action="{S_MODE_ACTION}">
  <table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	 <tr>
	  <td align="right" nowrap="nowrap"><span class="genmed">{L_SELECT_SORT_METHOD}:&nbsp;{S_MODE_SELECT}&nbsp;&nbsp;{L_ORDER}&nbsp;{S_ORDER_SELECT}&nbsp;&nbsp; 
		<input type="submit" name="submit" value="{L_SUBMIT}" class="liteoption" />
		</span>
	  </td>
	</tr>
  </table>
<table border="0" cellpadding="0" cellspacing="0" width="95%">
<tr>
	<td colspan="13" height="2" bgcolor="#3E98D0"></td>
</tr>
<tr bgcolor="#F5F5F5">
	<td width="5%" align="center" nowrap="nowrap" height="30"><span class="genmed"><b>#</b></span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td align="center" nowrap="nowrap"><span class="genmed"><b>&nbsp;&nbsp;{L_FILENAME}&nbsp;&nbsp;</b></span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="15%" align="center" nowrap="nowrap"><span class="genmed"><b>&nbsp;&nbsp;{L_EXTENSION}&nbsp;&nbsp;</b></span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="5%" align="center" nowrap="nowrap" ><span class="genmed"><b>&nbsp;&nbsp;{L_SIZE}&nbsp;&nbsp;</b></span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="10%" align="center" nowrap="nowrap"><span class="genmed"><b>&nbsp;&nbsp;{L_DOWNLOADS}&nbsp;&nbsp;</b></span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="15%" align="center" nowrap="nowrap"><span class="genmed"><b>&nbsp;&nbsp;{L_POST_TIME}&nbsp;&nbsp;</b></span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="7%" align="center" nowrap="nowrap"><span class="genmed"><b>&nbsp;&nbsp;{L_DELETE}&nbsp;&nbsp;</b></span></td>
</tr>
<tr>
	<td colspan="13" height="1" bgcolor="#DADADA"></td>
</tr>
	<!-- BEGIN attachrow -->
	<tr> 
	  <td height="27" align="center" nowrap="nowrap"><span class="gen">&nbsp;{attachrow.ROW_NUMBER}&nbsp;</span></td>
	  <td></td>
	  <td align="center"><span class="genmed"><a href="{attachrow.U_VIEW_ATTACHMENT}" class="gen" target="_blank">{attachrow.FILENAME}</a></span></td>
	  <td></td>
	  <td align="center" nowrap="nowrap"><span class="genmed">{attachrow.EXTENSION}</span></td>
	  <td></td>
	  <td align="center" nowrap="nowrap"><span class="genmed"><b>{attachrow.SIZE}</b></span></td>
	  <td></td>
	  <td align="center" nowrap="nowrap"><span class="genmed"><b>{attachrow.DOWNLOAD_COUNT}</b></span></td>
	  <td></td>
	  <td align="center" nowrap="nowrap"><span class="genmed">{attachrow.POST_TIME}</span></td>
	  <td></td>
	  <td align="center" nowrap="nowrap">{attachrow.S_DELETE_BOX}</td>
	  {attachrow.S_HIDDEN}
	</tr>
<tr>
	<td colspan="13" height="1" bgcolor="#DADADA"></td>
</tr>
	<!-- END attachrow -->
<tr bgcolor="#F5F5F5">
	<td height="29" align="right" colspan="13" >
		<input type="submit" name="delete" value="{L_DELETE_MARKED}" class="liteoption" />&nbsp;
	</td>
</tr>
<tr>
	<td colspan="13" height="1" bgcolor="#DADADA"></td>
</tr>
</table>

  {S_USER_HIDDEN}

  <table width="90%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
	  <td align="right" valign="top" nowrap="nowrap"><span class="genmed"><a href="javascript:select_switch(true);"><img src="templates/webmanager/images/icon_allchoice.gif" border="0" alt="{L_MARK_ALL}"></a>&nbsp;&nbsp;<a href="javascript:select_switch(false);"><img src="templates/webmanager/images/icon_choicecancel.gif" border="0" alt="{L_UNMARK_ALL}"></a></span></td>
	</tr>
  </table>

<table width="95%" cellspacing="0" cellpadding="0" border="0">
  <tr> 
	<td align="center"><span class="nav">{PAGINATION}&nbsp;</span></td>
  </tr>
</table></form>
<br><br>