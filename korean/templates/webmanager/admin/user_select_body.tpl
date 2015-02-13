<br>
<span class="gen"><b><font color="#000000">&raquo; {L_USER_TITLE}</font></b></span><br><br>

<form method="post" name="post" action="{S_USER_ACTION}"><table cellspacing="1" cellpadding="4" border="0" align="center" >
	<tr> 
		<td colspan="1" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="1" align=center><span class="gen"><b><font color="#000000">{L_USER_SELECT}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="1" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="row1" align="center"><input type="text" class="post" name="username" maxlength="50" size="20" /> <input type="hidden" name="mode" value="edit" />{S_HIDDEN_FIELDS}<input type="submit" name="submituser" value="{L_LOOK_UP}" class="mainoption" /> <input type="submit" name="usersubmit" value="{L_FIND_USERNAME}" class="liteoption" onClick="window.open('{U_SEARCH_USER}', '_phpbbsearch', 'HEIGHT=180,resizable=yes,WIDTH=400');return false;" /></td>
	</tr>
</table></form>
<br><br>