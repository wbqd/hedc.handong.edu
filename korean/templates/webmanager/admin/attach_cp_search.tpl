<br>
<span class="gen"><b><font color="#000000">&raquo; {L_CONTROL_PANEL_TITLE}</font></b></span><br><br>

<form method="post" action="{S_MODE_ACTION}">
  <table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" nowrap="nowrap"><span class="genmed">{L_VIEW}:&nbsp;{S_VIEW_SELECT}&nbsp;&nbsp; 
		<input type="submit" name="submit" value="{L_SUBMIT}" class="liteoption" />
		</span></td>
	</tr>
  </table>

<table  width="100%" cellpadding="4" cellspacing="1" border="0">
	<tr> 
		<td colspan="4" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="4" align=center><span class="gen"><b><font color="#000000">{L_ATTACH_SEARCH_QUERY}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="4" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td  bgcolor=#fafafa colspan="2" width="40%"><span class="gen"><b>{L_FILENAME}</b></span><br /><span class="genmed"><font color="#A7A7A7">{L_WILDCARD_EXPLAIN}</font></span></td>
		<td  colspan="2" width="60%" valign="middle"><span class="genmed"><input type="text" style="width: 200px" class="post" name="search_keyword_fname" size="20" /></span></td>
	</tr>
	<tr> 
		<td  bgcolor=#fafafa colspan="2"><span class="gen"><b>{L_SEARCH_AUTHOR}</b></span><br /><span class="genmed"><font color="#A7A7A7">{L_WILDCARD_EXPLAIN}</font></span></td>
		<td  colspan="2" valign="middle"><span class="genmed"><input type="text" style="width: 200px" class="post" name="search_author" size="20" /></span></td>
	</tr>
	<tr> 
		<td  bgcolor=#fafafa colspan="2"></td>
		<td  colspan="2" valign="middle"><span class="genmed"><input type="text" style="width: 50px" class="post" name="search_size_smaller" size="10" />&nbsp;{L_SIZE_SMALLER_THAN}</span></td>
	</tr>
	<tr> 
		<td  bgcolor=#fafafa colspan="2"></td>
		<td  colspan="2" valign="middle"><span class="genmed"><input type="text" style="width: 50px" class="post" name="search_size_greater" size="10" />&nbsp;{L_SIZE_GREATER_THAN}</span></td>
	</tr>
	<tr> 
		<td  bgcolor=#fafafa colspan="2"><span class="gen"></span></td>
		<td  colspan="2" valign="middle"><span class="genmed"><input type="text" style="width: 50px" class="post" name="search_count_smaller" size="10" />&nbsp;{L_COUNT_SMALLER_THAN}</span></td>
	</tr>
	<tr> 
		<td  bgcolor=#fafafa colspan="2"><span class="gen"></span></td>
		<td  colspan="2" valign="middle"><span class="genmed"><input type="text" style="width: 50px" class="post" name="search_count_greater" size="10" />&nbsp;{L_COUNT_GREATER_THAN}</span></td>
	</tr>
	<tr> 
		<td  bgcolor=#fafafa colspan="2"><span class="gen"></span></td>
		<td  colspan="2" valign="middle"><span class="genmed"><input type="text" style="width: 50px" class="post" name="search_days_greater" size="10" />&nbsp;{L_MORE_DAYS_OLD}</span></td>
	</tr>
	<tr> 
		<td colspan="4" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="4" align=center><span class="gen"><b><font color="#000000">{L_SEARCH_OPTIONS}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="4" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td  bgcolor=#fafafa colspan="2"><span class="gen"><b>{L_FORUM}</b></span></td>
		<td  colspan="2" valign="middle"><select class="post" name="search_forum">{S_FORUM_OPTIONS}</select></span></td>
	</tr>
	<tr>
		<td  bgcolor=#fafafa colspan="2"><span class="gen"><b>{L_CATEGORY}</b>&nbsp;</span></td>
		<td  colspan="2" valign="middle"><select class="post" name="search_cat">{S_CATEGORY_OPTIONS}</select></span></td>
	</tr>
	<tr> 
		<td  bgcolor=#fafafa colspan="2"><span class="gen"><b>{L_SORT_BY}</b>&nbsp;</span></td>
		<td  colspan="2" valign="middle">{S_SORT_OPTIONS}</span></td>
	<tr>
		<td  bgcolor=#fafafa colspan="2"><span class="gen"><b>{L_ORDER}</b>&nbsp;</span></td>
		<td  colspan="2" valign="middle">{S_SORT_ORDER}</span></td>
	</tr>
	<tr> 
		<td colspan="4" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td  colspan="4" align="center" height="28">{S_HIDDEN_FIELDS}<input class="liteoption" type="submit" name="search" value="{L_SEARCH}" /></td>
	</tr>
</table>

</form>

<br />