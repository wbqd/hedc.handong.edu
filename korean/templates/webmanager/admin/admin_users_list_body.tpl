<br>
<span class="gen"><b><font color="#000000">&raquo; {L_USERLIST}</font></b></span><br><br>



<table width="100%" cellpadding="6" cellspacing="1" border="0" >
	<tr> 
		<td colspan="8" height="1" >
<table width="100%" cellpadding="0" cellspacing="1" border="0">
	<tr><form action="{U_LIST_ACTION}" method="post">
		<td align="left" valign="middle">
<p>{L_SELECT_SORT_METHOD} : 
<select name="sort">
<option value="user_id" class="genmed" {ID_SELECTED} >No</option>
<option value="username" class="genmed" {USERNAME_SELECTED} >{L_USERNAME}</option>
<option value="user_posts" class="genmed" {POSTS_SELECTED} >{L_POSTS}</option>
<option value="user_lastvisit" class="genmed" {LASTVISIT_SELECTED} >{L_LASTVISIT}</option>
<option value="user_active" class="genmed" {ACTIVE_SELECTED} >{L_ACTIVE}</option>
</select>
&nbsp;&nbsp;{L_ORDER} : 
<select name="order">
<option value="" {ASC_SELECTED} >{L_SORT_ASCENDING}</option>
<option value="DESC" {DESC_SELECTED} >{L_SORT_DESCENDING}</option>
</select>
<input type="submit" value="{L_SORT}" class="liteoption">
</td>
		<td align="right" valign="middle"><span class="genmed">{L_TOTAL}: {TOTAL_USERS}</span></td>
	</tr></form>
</table>
		</td>
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
	<tr>
		<td height="25" align="center" valign="middle" nowrap="nowrap"><span class="gen"><b><font color="#000000">No</font></b></span></td>
		<td  height="25" align="center" valign="middle" nowrap="nowrap"><span class="gen"><b><font color="#000000">{L_ACTION}</font></b></span></td>
		<td  height="25"align="center"  valign="middle" nowrap="nowrap"><span class="gen"><b><font color="#000000">{L_USERNAME}</font></b></span></td>
		<td  height="25" align="center" valign="middle" nowrap="nowrap"><span class="gen"><b><font color="#000000">{L_EMAIL}</font></b></span></td>
		<td  height="25" align="center" valign="middle" nowrap="nowrap"><span class="gen"><b><font color="#000000">{L_POSTS}</font></b></span></td>
		<td  height="25" align="center" valign="middle" nowrap="nowrap"><span class="gen"><b><font color="#000000">{L_JOINED}</font></b></span></td>
		<td  height="25" align="center" valign="middle" nowrap="nowrap"><span class="gen"><b><font color="#000000">{L_LASTVISIT}</font></b></span></td>
		<td  height="25" align="center" valign="middle" nowrap="nowrap"><span class="gen"><b><font color="#000000">{L_ACTIVE}</font></b></span></td>
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
	<!-- BEGIN userrow -->
	<tr>
		<td  align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.NUMBER}</span></td>
		<td  align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed"><a href="{userrow.U_ADMIN_USER}">{L_EDIT}</a><br /><a href="{userrow.U_ADMIN_USER_AUTH}">{L_PERM}</a></span></td>
		<td  align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.USERNAME}</span></td>
		<td  align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.EMAIL}</span></td>
		<td  align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.POSTS}</span></td>
		<td  align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.JOINED}</span></td>
		<td  align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.LAST_VISIT}</span></td>
		<td  align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.ACTIVE}</span></td>
	</tr>
	<tr> 
		<td colspan="8" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#cdcdcd"></td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- END userrow -->
	<tr> 
		<td colspan="8" height="1" >
			<span class="genmed"><b>ID {L_SEARCH}</b> : <a href="admin_users.php" class="genmed">{L_EDIT}</a> / <a href="admin_ug_auth.php?mode=user" class="genmed">{L_PERM}</a></span>
		</td>
	</tr>
	<tr><form name=csv method="post">
		<td colspan="8" height="1" >
			<span class="genmed"><b>{ADMIN_LANG_CSV_DOWNLOAD}</b> : {S_GROUP_SELECT}  

  	  <input type=button class=liteoption value="{L_DOWNLOAD}" onclick="javascript:window.open('csv_download.php?gid=' + document.csv.g.options[document.csv.g.selectedIndex].value , 'CSV','toolbar=no, location=no, status=no, menubar=no, scrollbars=no, resizable=now, width=400, height=140');"></span>
		</td>
	</tr></form>
	<tr><form name=csv2 method="post">
		<td colspan="8" height="1" >
			<span class="genmed"><b>MENU CSV Download</b> : {S_FORUM_SELECT}  

  	  <input type=button class=liteoption value="{L_DOWNLOAD}" onclick="javascript:if(document.csv2.fid.options[document.csv2.fid.selectedIndex].value.substr(0,1) == 'c'){alert('Do Not select [Category-Menu]'); return false;}else{window.open('csv_download2.php?fid=' + document.csv2.fid.options[document.csv2.fid.selectedIndex].value , 'CSV','toolbar=no, location=no, status=no, menubar=no, scrollbars=no, resizable=now, width=400, height=140');}"></span>
		</td>
	</tr></form>
</table>




<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
		<td align="right" valign="middle"><span class="nav">{PAGINATION}</span></td>
	</tr>
</table>
<br />