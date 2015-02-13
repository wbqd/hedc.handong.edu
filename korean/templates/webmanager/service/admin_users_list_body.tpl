<h1>{L_USERLIST}</h1>

<p>{L_TOTAL}: {TOTAL_USERS}</p>

<form action="{U_LIST_ACTION}" method="post">
<p>{L_SELECT_SORT_METHOD}
<select name="sort">
<option value="user_id" class="genmed" {ID_SELECTED} >No</option>
<option value="username" class="genmed" {USERNAME_SELECTED} >{L_USERNAME}</option>
<option value="user_posts" class="genmed" {POSTS_SELECTED} >{L_POSTS}</option>
<option value="user_lastvisit" class="genmed" {LASTVISIT_SELECTED} >{L_LASTVISIT}</option>
<option value="user_active" class="genmed" {ACTIVE_SELECTED} >{L_ACTIVE}</option>
</select>
&nbsp;{L_ORDER}
<select name="order">
<option value="" {ASC_SELECTED} >{L_SORT_ASCENDING}</option>
<option value="DESC" {DESC_SELECTED} >{L_SORT_DESCENDING}</option>
</select>
&nbsp;<input type="submit" value="{L_SORT}" class="liteoption">
</form>

<table width="100%" cellpadding="6" cellspacing="1" border="0" class="forumline">
	<tr>
		<th class="thCornerL" height="25" valign="middle" nowrap="nowrap">No</th>
		<th class="thTop" height="25" valign="middle" nowrap="nowrap">{L_ACTION}</th>
		<th class="thTop" height="25" valign="middle" nowrap="nowrap">{L_USERNAME}</th>
		<th class="thTop" height="25" valign="middle" nowrap="nowrap">{L_EMAIL}</th>
		<th class="thTop" height="25" valign="middle" nowrap="nowrap">{L_POSTS}</th>
		<th class="thTop" height="25" valign="middle" nowrap="nowrap">{L_JOINED}</th>
		<th class="thTop" height="25" valign="middle" nowrap="nowrap">{L_LASTVISIT}</th>
		<th class="thCornerR" height="25" valign="middle" nowrap="nowrap">{L_ACTIVE}</th>
	</tr>
	<!-- BEGIN userrow -->
	<tr>
		<td class="{userrow.COLOR}" align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.NUMBER}</span></td>
		<td class="{userrow.COLOR}" align="center" valign="middle" height="28" nowrap="nowrap"><span class="gensmall"><a href="{userrow.U_ADMIN_USER}">{L_EDIT}</a><br /><a href="{userrow.U_ADMIN_USER_AUTH}">{L_PERM}</a></span></td>
		<td class="{userrow.COLOR}" align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.USERNAME}</span></td>
		<td class="{userrow.COLOR}" align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.EMAIL}</span></td>
		<td class="{userrow.COLOR}" align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.POSTS}</span></td>
		<td class="{userrow.COLOR}" align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.JOINED}</span></td>
		<td class="{userrow.COLOR}" align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.LAST_VISIT}</span></td>
		<td class="{userrow.COLOR}" align="center" valign="middle" height="28" nowrap="nowrap"><span class="genmed">{userrow.ACTIVE}</span></td>
	</tr>
	<!-- END userrow -->
	<tr>
		<td class="catBottom" height="28" align="center" valign="middle" colspan="8">
		</td>
	</tr>
</table>

<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
		<td align="left" valign="middle" nowrap="nowrap"><span class="nav">{PAGE_NUMBER}</span></td>
		<td align="right" valign="middle"><span class="nav">{PAGINATION}</span></td>
	</tr>
</table>

<br />
