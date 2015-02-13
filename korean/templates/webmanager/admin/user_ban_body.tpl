<br>
<span class="gen"><b><font color="#000000">&raquo; {L_BAN_TITLE}</font></b></span><br><br>
<form method="post" name="post" action="{S_BANLIST_ACTION}">
<table width="99%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_BAN_USER}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td bgcolor="#fafafa" width="50%"><b>{L_USERNAME}</b></td>
	  <td><input class="post" type="text" class="post" name="username" maxlength="50" size="18" /> <input type="hidden" name="mode" value="edit" />{S_HIDDEN_FIELDS} <input type="submit" name="usersubmit" value="{L_FIND_USERNAME}" class="liteoption" onClick="window.open('{U_SEARCH_USER}', '_phpbbsearch', 'HEIGHT=180,resizable=yes,WIDTH=400');return false;" /></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_UNBAN_USER}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td bgcolor="#fafafa"><b>{L_USERNAME}</b><br /><span class="genmed"><font color="#A7A7A7">{L_UNBAN_USER_EXPLAIN}</font></span></td>
	  <td>{S_UNBAN_USERLIST_SELECT}</td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_BAN_IP}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td bgcolor="#fafafa"><b>{L_IP_OR_HOSTNAME}</b><br /><span class="genmed"><font color="#A7A7A7">{L_BAN_IP_EXPLAIN}</font></span></td>
	  <td><input class="post" type="text" name="ban_ip" size="35" /></td>
	</tr>
	<tr> 
	  <td bgcolor="#fafafa"><b>{L_USERNAME}</b><br /><span class="genmed"><font color="#A7A7A7">{L_UNBAN_USER_EXPLAIN}</font></span></td>
	  <td>{S_UNBAN_USERLIST_SELECT}</td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_UNBAN_IP}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td bgcolor="#fafafa"><b>{L_IP_OR_HOSTNAME}</b><br /><span class="genmed"><font color="#A7A7A7">{L_UNBAN_IP_EXPLAIN}</font></span></td>
	  <td>{S_UNBAN_IPLIST_SELECT}</td>
	</tr>
	<tr> 
	  <td bgcolor="#fafafa"><b>{L_USERNAME}</b><br /><span class="genmed"><font color="#A7A7A7">{L_UNBAN_USER_EXPLAIN}</font></span></td>
	  <td>{S_UNBAN_USERLIST_SELECT}</td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_BAN_EMAIL}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td bgcolor="#fafafa"><b>{L_EMAIL_ADDRESS}</b><br /><span class="genmed"><font color="#A7A7A7">{L_BAN_EMAIL_EXPLAIN}</font></span></td>
	  <td><input class="post" type="text" name="ban_email" size="35" /></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_UNBAN_EMAIL}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td bgcolor="#fafafa"><b>{L_EMAIL_ADDRESS}</b><br /><span class="genmed"><font color="#A7A7A7">{L_UNBAN_EMAIL_EXPLAIN}</font></span></td>
	  <td>{S_UNBAN_EMAILLIST_SELECT}</td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td colspan="2" align="center"><input type="submit" name="submit" value="{L_SUBMIT}" class="liteoption" />&nbsp;&nbsp;&nbsp;<input type="reset" value="{L_RESET}" class="liteoption" /></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
</table></form>

<p>{L_BAN_EXPLAIN_WARN}</p>
<br>