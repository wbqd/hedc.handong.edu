<br>
<span class="gen"><b><font color="#000000">&raquo; {L_AUTH_TITLE}</font></b></span><br><br>
<br><br>
<b><span class="gen">{L_FORUM}: {FORUM_NAME}</span></b>

<form method="post" action="{S_FORUMAUTH_ACTION}">
  <table width="100%" cellspacing="1" cellpadding="4" border="0" align="center" >
	<tr> 
		<td colspan="{S_COLUMN_SPAN}" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <!-- BEGIN forum_auth_titles -->
	   <td  align=center><span class="gen"><b><font color="#000000">{forum_auth_titles.CELL_TITLE}</font></b></span></td>
	  <!-- END forum_auth_titles -->	 
	</tr>
	<tr> 
		<td colspan="{S_COLUMN_SPAN}" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <!-- BEGIN forum_auth_data -->
	  <td bgcolor=#fafafa align="center">{forum_auth_data.S_AUTH_LEVELS_SELECT}</td>
	  <!-- END forum_auth_data -->
	</tr>
	<tr> 
	  <td colspan="{S_COLUMN_SPAN}" align="center" class="row1"> <span class="genmed">{U_SWITCH_MODE}</span></td>
	</tr>
	<tr> 
		<td colspan="{S_COLUMN_SPAN}" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td colspan="{S_COLUMN_SPAN}"  align="center">{S_HIDDEN_FIELDS} 
		<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />
		<input type="reset" value="{L_RESET}" name="reset" class="mainoption" />
	  </td>
	</tr>
  </table>
</form>
<br><br><br>

<table bordercolor="#cccccc" cellspacing="0" bordercolordark="#ffffff" cellpadding="1" width="1150" align="center" border="1"><tbody>

<tr><td valign="middle" align="center" width="10%" height="25"  bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_SIMPLE_MODE}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_VIEW}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_READ}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_POST}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_REPLY}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_EDIT}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_DELETE}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_AUTH_ATTACH}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_AUTH_DOWNLOAD}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_CALENDAR}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_STICKY}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_ANNOUNCE}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_VOTE}</b></span></td><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_POLLCREATE}</b></span></td></tr>

<tr><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_PUBLIC}</b></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_ADMIN}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></td></tr>

<tr><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_REGISTERED}</b></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ADMIN}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></td></tr>

<tr><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_REGISTERED}<br/>[{ADMIN_LANG_HIDDEN}]</b></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ADMIN}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></td></tr>

<tr><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_PRIVATE}</b></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ADMIN}</span></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></td></tr>

<tr><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_PRIVATE}<br/>[{ADMIN_LANG_HIDDEN}]</b></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ADMIN}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_PRIVATE}</span></td></tr>

<tr><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_ADMIN_ONLY}</b></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ADMIN}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_REG}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></td></tr>

<tr><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_MODERATORS}</b></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ALL}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_ADMIN}</span></span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></td></tr>

<tr><td valign="middle" align="center" bgcolor="#f0f0f0"><span class="genmed"><b>{ADMIN_LANG_MODERATORS}<br/>[{ADMIN_LANG_HIDDEN}]</b></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_ADMIN}</span></td><td valign="middle" align="center"><span class="genmed"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></td><td valign="middle" align="center"><span class="genmed">{ADMIN_LANG_FORUM_MOD}</span></td></tr>

</tbody></table>


<br>