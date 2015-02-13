<br>
<b><span class="gen"><font color="#754C24">{L_RANKS_TITLE}</font></span></b>&nbsp;
<br><span class="gen">{L_RANKS_TEXT}</span><br><br>

<form action="{S_RANK_ACTION}" method="post"><table class="forumline" cellpadding="4" cellspacing="1" border="0" align="center">
	<tr>
		<th class="thTop" colspan="2">{L_RANKS_TITLE}</th>
	</tr>
	<tr>
		<td class="row1" width="38%"><span class="genmed"><b>{L_RANK_TITLE}</b></span></td>
		<td class="row2"><input class="post" type="text" name="title" size="35" maxlength="40" value="{RANK}" /></td>
	</tr>
	<tr>
		<td class="row1"><span class="gen"><b>{L_RANK_SPECIAL}</b></span></td>
		<td class="row2"><input type="radio" name="special_rank" class="formstyle3" value="1" {SPECIAL_RANK} />{L_YES} &nbsp;&nbsp;<input type="radio" class="formstyle3" name="special_rank" value="0" {NOT_SPECIAL_RANK} /> {L_NO}</td>
	</tr>
	<tr>
		<td class="row1" width="38%"><span class="gen"><b>{L_RANK_MINIMUM}</b></span></td>
		<td class="row2"><input class="post" type="text" name="min_posts" size="5" maxlength="10" value="{MINIMUM}" /></td>
	</tr>
	<tr>
		<td class="row1" width="38%"><span class="gen"><b>{L_RANK_IMAGE}</b></span><br />
		<span class="genmed"><font color="#A7A7A7">{L_RANK_IMAGE_EXPLAIN}</font></span></td>
		<td class="row2"><input class="post" type="text" name="rank_image" size="40" maxlength="255" value="{IMAGE}" /><br>{L_RANK_IMAGE_EXPLAIN2}<br />{IMAGE_DISPLAY}</td>
	</tr>
	<tr>
		<td class="catBottom" colspan="2" align="center"><input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" class="liteoption" /></td>
	</tr>
</table>
{S_HIDDEN_FIELDS}</form>
<br>