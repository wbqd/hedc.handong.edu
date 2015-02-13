<br>
<span class="gen"><b><font color="#000000">&raquo; {L_SHADOW_TITLE}</font></b></span><br><br>
{ERROR_BOX}
<script language="Javascript" type="text/javascript">
	//
	// Should really check the browser to stop this whining ...
	//
	function select_switch(status)
	{
		for (i = 0; i < document.shadow_list.length; i++)
		{
			document.shadow_list.elements[i].checked = status;
		}
	}
</script>
<form method="post" name="shadow_list" action="{S_ATTACH_ACTION}">
  <table width="100%" align="center" cellpadding="4" cellspacing="1" border="0">
	<tr> 
		<td height="1" colspan="3">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td  align=center colspan="3"><span class="gen"><b><font color="#000000">{L_SHADOW_TITLE}</font></b></span></td>
	</tr>
	<tr> 
		<td height="1" colspan="3">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td align="center"><span class="gen">{L_ATTACHMENT}</span></td>
	  <td align="center"><span class="gen">{L_COMMENT}</span></td>
	  <td align="center"><span class="gen">{L_DELETE}</span></td>
	</tr>
	<tr> 
		<td height="1" colspan="3">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#cdcdcd"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td colspan="3" align="center"><span class="genmed">{L_EXPLAIN_FILE}</span></td>
	</tr>
  <!-- BEGIN file_shadow_row -->
    <tr> 
	  <td bgcolor="#f5f5f5" align="center" valign="middle"><span class="gen"><a class="gen" href="{file_shadow_row.U_ATTACHMENT}" target="_blank">{file_shadow_row.ATTACH_FILENAME}</a></span></td>
	  <td bgcolor="#fafafa" align="center" valign="middle"><span class="gen">{file_shadow_row.ATTACH_COMMENT}</span></td>
	  <td bgcolor="#f5f5f5" align="center" valign="middle"><input type="checkbox" name="attach_file_list[]" value="{file_shadow_row.ATTACH_ID}" /></td>
	</tr>
  <!-- END file_shadow_row -->
	<tr> 
		<td height="1" colspan="3">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="20" colspan="3"></td>
	</tr>
	<tr> 
		<td height="1" colspan="3">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td align="center"><span class="gen">{L_ATTACHMENT}</span></td>
	  <td align="center"><span class="gen">{L_COMMENT}</span></td>
	  <td align="center"><span class="gen">{L_DELETE}</span></td>
	</tr>
	<tr> 
		<td height="1" colspan="3">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#cdcdcd"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td colspan="3" align="center"><span class="genmed">{L_EXPLAIN_ROW}</span></td>
	</tr>
  <!-- BEGIN table_shadow_row -->
    <tr> 
	  <td bgcolor="#f5f5f5" align="center" valign="middle"><span class="gen">{table_shadow_row.ATTACH_FILENAME}</span></td>
	  <td bgcolor="#fafafa" align="center" valign="middle"><span class="gen">{table_shadow_row.ATTACH_COMMENT}</span></td>
	  <td bgcolor="#f5f5f5" align="center" valign="middle"><input type="checkbox" name="attach_id_list[]" value="{table_shadow_row.ATTACH_ID}" /></td>
	</tr>
  <!-- END table_shadow_row -->
	<tr> 
		<td height="1" colspan="3">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr align="right"> 
	  <td colspan="3" height="29">
	  <input type="submit" name="submit" class="liteoption" value="{L_DELETE_MARKED}" /></td>
	</tr>
</table>
{S_HIDDEN}

  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
	  <td align="right" valign="top" nowrap="nowrap"><b><span class="genmed">
	  <span class="genmed"><a href="javascript:select_switch(true);"><img src="./../templates/webmanager/images/icon_allchoice.gif" border="0" alt="{L_MARK_ALL}"></a>&nbsp;&nbsp;<a href="javascript:select_switch(false);"><img src="./../templates/webmanager/images/icon_choicecancel.gif" border="0" alt="{L_UNMARK_ALL}"></a></span></td>
	</tr>
  </table>

</form>

<br />