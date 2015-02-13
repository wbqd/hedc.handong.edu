<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="genmed"><img src="templates/webmanager/images/arrow-head.gif" border="0" align="absmiddle">&nbsp;Home > {L_SEARCH_QUERY}</span></td>
	</tr>
</table>
<form action="{S_SEARCH_ACTION}" method="POST">
<table border="0" cellpadding="0" cellspacing="0" width="95%">
	<tr>
		<td colspan="2" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
	<tr bgcolor="#fafafa">
		<td align="center" nowrap="nowrap" height="30" colspan="2"><span class="genmed"><b><font color=#000000>{L_SEARCH_QUERY}</font></b></span></td>
	</tr>
	<tr>
		<td colspan="2" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
	<tr> 
		<td width="50%" height="70"><span class="genmed">{L_SEARCH_KEYWORDS}:</span></td>
		<td valign="middle"><span class="genmed"><input type="text" style="width: 200px" class="formstyle4" name="search_keywords" size="30" /><br /><input class="formstyle3" type="radio" name="search_terms" value="any" class="formstyle3" checked="checked" /> {L_SEARCH_ANY_TERMS}<br /><input class="formstyle3" type="radio" name="search_terms" class="formstyle3" value="all" /> {L_SEARCH_ALL_TERMS}</span></td>
	</tr>
	<tr>
		<td colspan="2" height="1" bgcolor="#DADADA"></td>
	</tr>
	<tr> 
		<td height="33"><span class="genmed">{L_SEARCH_AUTHOR}:</span></td>
		<td colspan="2" valign="middle"><span class="genmed"><input type="text" style="width: 200px" class="formstyle4" name="search_author" size="30" /></span></td>
	</tr>
	<tr>
		<td colspan="2" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
	<tr bgcolor="#fafafa">
		<td colspan="2" height="30" align="center"><span class="genmed"><b><font color=#000000>{L_SEARCH_OPTIONS}</font></b></span></td>
	</tr>
	<tr>
		<td colspan="2" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<table border="0" cellpadding="3" cellspacing="0" width="95%">
				<tr>
					<td colspan="2" height="5"></td>
				</tr>
				<tr>
					<td width="40%" align="right"><span class="genmed">{L_FORUM}:&nbsp;</span></td>
					<td><span class="genmed"><select class="post" name="search_where">{S_FORUM_OPTIONS}</select></span></td>
				</tr>
				<tr>
					<td align="right"><span class="genmed">{L_SORT_BY}:&nbsp;</td>
					<td><select class="post" name="sort_by">{S_SORT_OPTIONS}</select>&nbsp;<input class="formstyle3" type="radio" name="sort_dir" class="formstyle3" value="ASC" /><span class="genmed">{L_SORT_ASCENDING}&nbsp;<input class="formstyle3" type="radio" name="sort_dir" class="formstyle3" value="DESC" checked /><span class="genmed">{L_SORT_DESCENDING}</span></td>
				</tr>
				<tr>
					<td align="right"><span class="genmed">{L_SEARCH_PREVIOUS}:&nbsp;</td>
					<td><select class="post" name="search_time">{S_TIME_OPTIONS}</select>&nbsp;<input class="formstyle3" type="radio" name="search_fields" class="formstyle3" value="all" checked="checked" /><span class="genmed">{L_SEARCH_MESSAGE_TITLE}&nbsp;<input class="formstyle3" type="radio" name="search_fields" class="formstyle3" value="msgonly" /><span class="genmed">{L_SEARCH_MESSAGE_ONLY}</span></td>
				</tr>
				<tr>
					<td colspan="2" height="5"></td>
				</tr>
			</table>
		</td>			
	</tr>
	<tr>
		<td colspan="4" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
	<tr bgcolor="#fafafa">
		<td colspan="4" align="center" height="29">{S_HIDDEN_FIELDS}<input type="hidden" name="show_results" value="posts" /><input class="liteoption" type="submit" value="{L_SEARCH}" /></td>
	</tr>
	<tr>
		<td colspan="4" height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
</table>
</form>
<br><br>