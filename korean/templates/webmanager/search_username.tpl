<script language="javascript" type="text/javascript">
<!--
function refresh_username(selected_username)
{
	opener.document.forms['post'].username.value = selected_username;
	opener.focus();
	window.close();
}
//-->
</script>
<form method="post" name="search" action="{S_SEARCH_ACTION}">
<table width="100%" border="0" cellpadding="1" cellspacing="0" bgcolor="#F3F3F3">
	<tr>
		<td height="3">
		</td>
	</tr>
	<tr>
		<td align="center">
			<table style="border-width:1px; border-color:rgb(204,204,204); border-style:solid;" border="0" cellpadding="4" cellspacing="1" width="98%" bgcolor="white">
				<tr>
					<td colspan="2" height="5"></td>
				</tr>
				<tr>
					<td colspan="2" height="30" align="center"><span class="genmed"><b>{L_SEARCH_USERNAME}</b></span></td>
				</tr>
				<tr>
					<td width="35%" align="right"><span class="genmed">Search Username : </span></td>
					<td><span class="genmed"><input type="text" name="search_username" value="{USERNAME}" class="formstyle4" />&nbsp;<input type="submit" name="search" value="{L_SEARCH}" class="liteoption" /></span></td>
				</tr>
				<tr>
					<td></td>
					<td>
					<span class="genmed">{L_SEARCH_EXPLAIN}</span><br />
					<!-- BEGIN switch_select_name -->
					<span class="genmed">{L_UPDATE_USERNAME}<br /><select name="username_list">{S_USERNAME_OPTIONS}</select>&nbsp; <input type="submit" class="liteoption" onClick="refresh_username(this.form.username_list.options[this.form.username_list.selectedIndex].value);return false;" name="use" value="{L_SELECT}" /></span><br />
					<!-- END switch_select_name -->
					</td>
				</tr>
				<tr>
					<td colspan="2" height="10"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><span class="genmed"><a href="javascript:window.close();" class="genmed"><b>{L_CLOSE_WINDOW}</b></a></span></td>
				</tr>
				<tr>
					<td colspan="2" height="10"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="3">
		</td>
	</tr>
</table>
</form>
<br><br>