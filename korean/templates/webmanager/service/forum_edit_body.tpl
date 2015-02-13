
<h1>{L_FORUM_TITLE}</h1>

<p>{L_FORUM_EXPLAIN}</p>

<form action="{S_FORUM_ACTION}" method="post">
  <table width="100%" cellpadding="4" cellspacing="1" border="0" class="forumline" align="center">
	<tr> 
	  <th class="thHead" colspan="2">{L_FORUM_SETTINGS}</th>
	</tr>
	<tr> 
	  <td class="row1">{L_FORUM_NAME}</td>
	  <td class="row2"><input type="text" size="25" name="forumname" value="{FORUM_NAME}" class="post" /></td>
	</tr>
	<tr> 
	  <td class="row1">{L_FORUM_DESCRIPTION}</td>
	  <td class="row2"><textarea rows="5" cols="45" wrap="virtual" name="forumdesc" class="post">{DESCRIPTION}</textarea></td>
	</tr>
	<tr> 
	  <td class="row1">{L_CATEGORY}</td>
	  <td class="row2"><select name="c">{S_CAT_LIST}</select></td>
	</tr>
	<tr> 
	  <td class="row1">{L_FORUM_STATUS}</td>
	  <td class="row2"><select name="forumstatus">{S_STATUS_LIST}</select></td>
	</tr>
	<tr> 
	  <td class="row1">{L_AUTO_PRUNE}</td>
	  <td class="row2"><table cellspacing="0" cellpadding="1" border="0">
		  <tr> 
			<td align="right" valign="middle">{L_ENABLED}</td>
			<td align="left" valign="middle"><input type="checkbox" name="prune_enable" value="1" {S_PRUNE_ENABLED} /></td>
		  </tr>
		  <tr> 
			<td align="right" valign="middle">{L_PRUNE_DAYS}</td>
			<td align="left" valign="middle">&nbsp;<input type="text" name="prune_days" value="{PRUNE_DAYS}" size="5" class="post" />&nbsp;{L_DAYS}</td>
		  </tr>
		  <tr> 
			<td align="right" valign="middle">{L_PRUNE_FREQ}</td>
			<td align="left" valign="middle">&nbsp;<input type="text" name="prune_freq" value="{PRUNE_FREQ}" size="5" class="post" />&nbsp;{L_DAYS}</td>
		  </tr>
	  </table></td>
	</tr>
	<tr>
		<td class="row1">{L_LINK}&nbsp;</td>
		<td class="row2" align="center">
			<table cellspacing="0" cellpadding="3" border="0">
			<tr>
				<td align="right">{L_FORUM_LINK}&nbsp;</td>
				<td>
					<input type="text" name="forum_link" value="{FORUM_LINK}" size="60" class="post" /><br />
					<span class="gensmall">{L_FORUM_LINK_EXPLAIN}</span>
				</td>
			</tr>
			<tr>
				<td align="right">{L_FORUM_LINK_INTERNAL}&nbsp;</td>
				<td>
					<input type="radio" name="forum_link_internal" value="1" {FORUM_LINK_INTERNAL_YES} />&nbsp;{L_YES}&nbsp;&nbsp;<input type="radio" name="forum_link_internal" value="0" {FORUM_LINK_INTERNAL_NO} />&nbsp;{L_NO}<br />
					<span class="gensmall">{L_FORUM_LINK_INTERNAL_EXPLAIN}</span>
				</td>
			</tr>
			<tr>
				<td align="right">{L_FORUM_LINK_HIT_COUNT}&nbsp;</td>
				<td>
					<input type="radio" name="forum_link_hit_count" value="1" {FORUM_LINK_HIT_COUNT_YES} />&nbsp;{L_YES}&nbsp;&nbsp;<input type="radio" name="forum_link_hit_count" value="0" {FORUM_LINK_HIT_COUNT_NO} />&nbsp;{L_NO}<br />
					<span class="gensmall">&nbsp;{L_FORUM_LINK_HIT_COUNT_EXPLAIN}</span>
				</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="row1">{L_FORUM_DISPLAY_SORT}</td>
		<td class="row2">
			<select name="forum_display_sort">{S_FORUM_DISPLAY_SORT_LIST}</select>&nbsp;
			<select name="forum_display_order">{S_FORUM_DISPLAY_ORDER_LIST}</select>&nbsp;/
			<select name="forum_display_sort2">{S_FORUM_DISPLAY_SORT_LIST2}</select>&nbsp;
			<select name="forum_display_order2">{S_FORUM_DISPLAY_ORDER_LIST2}</select>&nbsp;
		</td>
	</tr>
	<tr> 
	  <td class="row1">{L_TEMPLATE}</td>
	  <td class="row2">{S_DIR} <font color=red>*It cannot be changed after selecting at the first time</font></td>
	</tr>
	<tr>
		<td class="row1">{L_SPLIT_FIELD}</td>
		<td class="row2">
			<select name="split_field">{SPLIT_FIELD_LIST}</select>&nbsp;			
		</td>
	</tr>
	<tr> 
	  <td class="row1">{L_MODERATOR}</td>
	  <td class="row2">{MODERATORS}</td>
	</tr>
	<tr> 
	  <td class="catBottom" colspan="2" align="center">{S_HIDDEN_FIELDS}<input type="submit" name="submit" value="{S_SUBMIT_VALUE}" class="mainoption" /></td>
	</tr>
  </table>
</form>
		
<br clear="all" />
