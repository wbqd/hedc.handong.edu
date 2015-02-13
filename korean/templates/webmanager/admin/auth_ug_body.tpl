<br>
<span class="gen"><b><font color="#000000">&raquo; {L_AUTH_TITLE}</font></b></span><br><br>

<br><br>
<b><span class="gen">{L_USER_OR_GROUPNAME}: {USERNAME}</span></b>
<form method="post" action="{S_AUTH_ACTION}">

<!-- BEGIN switch_user_auth -->
<p>{USER_LEVEL}</p>
<p>{USER_GROUP_MEMBERSHIPS}</p>
<!-- END switch_user_auth -->

<!-- BEGIN switch_group_auth -->
<p>{GROUP_MEMBERSHIP}</p>
<!-- END switch_group_auth -->


  <table cellspacing="1" cellpadding="4" border="0" align="center"  width="100%">
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
	  <td width="50%"  colspan="{INC_SPAN}" align=center><span class="gen"><b><font color="#000000">{L_FORUM}</font></b></span></td>
	  <!-- BEGIN acltype -->
	  <td  align=center><span class="gen"><b><font color="#000000">{acltype.L_UG_ACL_TYPE}</font></b></span></td>
	  <!-- END acltype -->
	  <td align=center><span class="gen" ><b><font color="#000000">{L_MODERATOR_STATUS}</font></b></span></td>
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

	<!-- BEGIN row -->
	<!-- BEGIN cathead -->
	<tr  height=30> 
		<!-- BEGIN inc -->
		<td bgcolor=#f0f0f0 width="46" align=center ><span class="genmed"><font color=#cdcdcd>--------</font></span></td>
		<!-- END inc -->
		<td colspan="{row.cathead.INC_SPAN}" bgcolor=#f0f0f0 align="left" nowrap> <span class="genmed"><b><font color=#000000>{row.cathead.CAT_TITLE}</font></b></span></td>
		<!-- BEGIN aclvalues -->
		<td bgcolor=#f0f0f0 align="left" nowrap><span class="cattitlemed">&nbsp;</span></td>
		<!-- END aclvalues -->
		<td bgcolor=#f0f0f0 align="left" nowrap><span class="cattitlemed">&nbsp;</span></td>
	</tr>
	<!-- END cathead -->
	<!-- BEGIN forums -->
	<tr  height=30>
		<!-- BEGIN inc -->	
		<td  width="46" align=center ><span class="genmed"><font color=#cdcdcd>--------</font></span></td>
		<!-- END inc -->
		<td  align="left" colspan="{row.forums.INC_SPAN}"><span class="gentbl"><font color=#000000>{row.forums.FORUM_NAME}</font></span></td>
		<!-- BEGIN aclvalues -->
		<td bgcolor=#f0f0f0 align="center">{row.forums.aclvalues.S_ACL_SELECT}</td>
		<!-- END aclvalues -->
		<td  align="center">{row.forums.S_MOD_SELECT}</td>
	</tr>
	<!-- END forums -->
	<!-- END row -->
	<tr> 
	  <td colspan="{S_COLUMN_SPAN}" class="row1" align="center"><span class="genmed">{U_SWITCH_MODE}</span></td>
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
		&nbsp;&nbsp; 
		<input type="reset" value="{L_RESET}" class="mainoption" name="reset" />
	  </td>
	</tr>
  </table>
</form>
<br>