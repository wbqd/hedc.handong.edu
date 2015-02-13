<br>
<span class="gen"><b><font color="#000000">&raquo; {L_FORUM_TITLE}</font></b></span><br><br>

<form method="post" action="{S_FORUM_ACTION}">
<table width="100%" cellpadding="1" cellspacing="1" border="0"  align="center">
<!-- BEGIN catrow -->
<!-- BEGIN cathead -->
<tr> 
	<td colspan="{INC_SPAN_ALL}" height="1" >
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr> 
				<td height="1" bgcolor="#cdcdcd"></td>
			</tr>
		</table>
	</td>
</tr>
<tr height=35>
	<!-- BEGIN inc -->
	<td rowspan="{catrow.cathead.inc.ROWSPAN}" width="46" align=center nowrap="nowrap"><span class="genmed"><font color=#cdcdcd>--------</font></span></td>
	<!-- END inc -->
	<td bgcolor=#f0f0f0   colspan="{catrow.cathead.INC_SPAN}" {catrow.cathead.WIDTH}>&nbsp;<span class="genmed"><b><a href="{catrow.cathead.U_VIEWCAT}" ><font color=#000000>{catrow.cathead.CAT_TITLE}</font></a></b></span></td>
	<td bgcolor=#f0f0f0 align="center" valign="middle"><span class="genmed"><a href="{catrow.cathead.U_CAT_EDIT}" class="genmed">{L_EDIT}</a></span></td>
	<td bgcolor=#f0f0f0 align="center" valign="middle"><span class="genmed">{catrow.cathead.U_CAT_DELETE}</span></td>
	<td bgcolor=#f0f0f0 align="center" valign="middle" nowrap="nowrap"><span class="genmed">{catrow.cathead.U_CAT_MOVE_UP}<br>{catrow.cathead.U_CAT_MOVE_DOWN}</span></td>
	<td bgcolor=#f0f0f0  align="center" valign="middle"><span class="genmed">&nbsp;</span></td>
</tr>
<!-- END cathead -->
<!-- BEGIN cattitle -->
<tr>
	<td bgcolor=#f0f0f0 colspan="{catrow.cattitle.INC_SPAN_ALL}"><span class="genmed"></span></td>
</tr>
<!-- END cattitle -->
<!-- BEGIN forumrow -->
<tr> 
	<td colspan="{INC_SPAN_ALL}" height="1" >
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr> 
				<td height="1" bgcolor="#cdcdcd"></td>
			</tr>
		</table>
	</td>
</tr>
<tr height=35> 
	<!-- BEGIN inc -->
	<td width="46" align=center nowrap="nowrap"><span class="genmed"><font color=#cdcdcd>--------</font></span></td>
	<!-- END inc -->
	<td colspan="{catrow.forumrow.INC_SPAN}" {catrow.forumrow.WIDTH}><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="100%"><span class="genmed"><a href="{catrow.forumrow.U_VIEWFORUM}">&nbsp;<font color=#000000>{catrow.forumrow.FORUM_NAME}</font></a></span><br /><span class="genmed">{catrow.forumrow.L_MODERATOR}{catrow.forumrow.MODERATORS}</span></td></tr></table></td>
	<td bgcolor=#fafafa align="center" valign="middle"><span class="genmed">{catrow.forumrow.NUM_TOPICS}</span></td>
	<td align="center" valign="middle"><span class="genmed"></span></td>
	<td  align="center" valign="middle"><span class="gen"><a href="{catrow.forumrow.U_FORUM_EDIT}" class="genmed">{L_EDIT}</a></span></td>
	<td bgcolor=#fafafa align="center" valign="middle"><span class="genmed"><a href="{catrow.forumrow.U_FORUM_DELETE}">{L_DELETE}</a></span></td>
	<td  align="center" valign="middle"><span class="genmed"><a href="{catrow.forumrow.U_FORUM_MOVE_UP}">{L_MOVE_UP}</a> <br /> <a href="{catrow.forumrow.U_FORUM_MOVE_DOWN}">{L_MOVE_DOWN}</a></span></td>
	<td bgcolor=#fafafa align="center" valign="middle"><span class="genmed"><a href="{catrow.forumrow.U_FORUM_RESYNC}">{L_RESYNC}</a></span></td>
</tr>
<!-- END forumrow -->
<!-- BEGIN catfoot -->
<tr> 
	<td colspan="{INC_SPAN_ALL}" height="1" >
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr> 
				<td height="1" bgcolor="#cdcdcd"></td>
			</tr>
		</table>
	</td>
</tr>
<tr  height=35>
	<!-- BEGIN inc -->
	<td width="46" align=center nowrap="nowrap"><span class="genmed"><font color=#cdcdcd>--------</font></span></td>
	<!-- END inc -->
	<td colspan="{catrow.catfoot.INC_SPAN_ALL}"  nowrap="nowrap">		
		<input class="post" type="text" name="{catrow.catfoot.S_ADD_NAME}" />&nbsp;
		<input type="submit" class="liteoption"  name="{catrow.catfoot.S_ADD_FORUM_SUBMIT}" value="{L_CREATE_FORUM}" />
		<input type="submit" class="liteoption"  name="{catrow.catfoot.S_ADD_CAT_SUBMIT}" value="{L_CREATE_CATEGORY}" />
	</td>
</tr>
<!-- END catfoot -->
<!-- END catrow -->
<tr>
	<td bgcolor=#fafafa colspan="{INC_SPAN_ALL}">
		<!-- BEGIN switch_board_footer -->
		<input class="post" type="text" name="name[0]" />&nbsp;
		<!-- BEGIN sub_forum_attach -->
		<input type="submit" class="liteoption"  name="addforum[0]" value="{L_CREATE_FORUM}" />
		<!-- END sub_forum_attach -->
		<input type="submit" class="liteoption"  name="addcategory[0]" value="{L_CREATE_CATEGORY}" />
		<!-- END switch_board_footer -->
	</td>
</tr>
<tr> 
	<td colspan="{INC_SPAN_ALL}" height="1" >
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr> 
				<td height="1" bgcolor="#cdcdcd"></td>
			</tr>
		</table>
	</td>
</tr>
</table></form>
<br>