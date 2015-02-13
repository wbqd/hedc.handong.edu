<br>
<span class="gen"><b><font color="#000000">&raquo; {L_CONTROL_PANEL_TITLE}</font></b></span><br><br>

<!-- BEGIN switch_user_based -->
<b>{L_STATISTICS_FOR_USER}</b>
<!-- END switch_user_based -->

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

<form method="post" name="attach_list" action="{S_MODE_ACTION}">
  <table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" nowrap="nowrap"><span class="genmed">{L_VIEW}:&nbsp;{S_VIEW_SELECT}&nbsp;&nbsp;{L_SELECT_SORT_METHOD}:&nbsp;{S_MODE_SELECT}&nbsp;&nbsp;{L_ORDER}&nbsp;{S_ORDER_SELECT}&nbsp;&nbsp; 
		<input type="submit" name="submit" value="{L_SUBMIT}" class="liteoption" />
		</span>
	  </td>
	</tr>
  </table>
  <table width="100%" cellpadding="3" cellspacing="1" border="0" >
	<tr> 
		<td colspan="8" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  align=center height="25" ><span class="gen"><b><font color="#000000">#</font></b></span></td>
	  <td align=center ><span class="gen"><b><font color="#000000">{L_FILENAME}</font></b></span></td>
	  <td align=center ><span class="gen"><b><font color="#000000">{L_EXTENSION}</font></b></span></td>
	  <td align=center ><span class="gen"><b><font color="#000000">{L_SIZE}</font></b></span></td>
	  <td align=center ><span class="gen"><b><font color="#000000">{L_DOWNLOADS}</font></b></span></td>
	  <td align=center ><span class="gen"><b><font color="#000000">{L_POST_TIME}</font></b></span></td>
	  <td align=center ><span class="gen"><b><font color="#000000">{L_POSTED_IN_TOPIC}</font></b></span></td>
	  <td align=center ><span class="gen"><b><font color="#000000">{L_DELETE}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="8" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- BEGIN attachrow -->
	<tr> 
	  <td class="{attachrow.ROW_CLASS}" align="center"><span class="gen">&nbsp;{attachrow.ROW_NUMBER}&nbsp;</span></td>
	  <td class="{attachrow.ROW_CLASS}" align="center"><span class="gen"><a href="{attachrow.U_VIEW_ATTACHMENT}" class="gen" target="_blank">{attachrow.FILENAME}</a></span></td>	  
	  <td class="{attachrow.ROW_CLASS}" align="center"><span class="gen">{attachrow.EXTENSION}</span></td>
	  <td class="{attachrow.ROW_CLASS}" align="center" valign="middle"><span class="gen"><b>{attachrow.SIZE}</b></span></td>
	  <td class="{attachrow.ROW_CLASS}" align="center" valign="middle"><span class="gen"><input type="text" size="3" maxlength="10" name="attach_count_list[]" value="{attachrow.DOWNLOAD_COUNT}" class="post" /></span></td>
	  <td class="{attachrow.ROW_CLASS}" align="center" valign="middle"><span class="gensmall">{attachrow.POST_TIME}</span></td>
	  <td class="{attachrow.ROW_CLASS}" align="center" valign="middle"><span class="gen">{attachrow.POST_TITLE}</span></td>
	  <td class="{attachrow.ROW_CLASS}" align="center">{attachrow.S_DELETE_BOX}</td>
	  {attachrow.S_HIDDEN}
	</tr>
	<!-- END attachrow -->
	<tr> 
	  <td  colspan="8" height="28" align="right"> 
		<input type="submit" name="submit_change" value="{L_SUBMIT_CHANGES}" class="mainoption" />
		&nbsp; 
		<input type="submit" name="delete" value="{L_DELETE_MARKED}" class="liteoption" />
	  </td>
	</tr>
  </table>

<!-- BEGIN switch_user_based -->
  {S_USER_HIDDEN}
<!-- END switch_user_based -->

  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
	  <td align="right" valign="top" nowrap="nowrap"><span class="genmed"><a href="javascript:select_switch(true);"><img src="./../templates/webmanager/images/icon_allchoice.gif" border="0" alt="{L_MARK_ALL}"></a>&nbsp;&nbsp;<a href="javascript:select_switch(false);"><img src="./../templates/webmanager/images/icon_choicecancel.gif" border="0" alt="{L_UNMARK_ALL}"></a></span></td>
	</tr>
  </table>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tr> 
	<td align="right"><span class="nav">{PAGINATION}&nbsp;</span></td>
  </tr>
</table></form>

<br />