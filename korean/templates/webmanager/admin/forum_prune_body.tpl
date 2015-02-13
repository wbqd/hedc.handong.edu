<br>
<b><span class="gen"><font color="#754C24">{L_FORUM_PRUNE}</font></span></b>
<br><span class="gen">{L_FORUM_PRUNE_EXPLAIN}</span><br><br>

<b><span class="gen">{L_FORUM}: {FORUM_NAME}</span></b>

<form method="post"	action="{S_FORUMPRUNE_ACTION}">
  <table cellspacing="1" cellpadding="4" border="0" align="center" class="forumline">
	<tr> 
	  <th class="thHead">{L_FORUM_PRUNE}</th>
	</tr>
	<tr>
	  <td class="row1">{S_PRUNE_DATA}</td>
	</tr>
	<tr> 
	  <td class="catBottom" align="center">{S_HIDDEN_VARS}
		<input type="submit" name="doprune" value="{L_DO_PRUNE}" class="mainoption">
	  </td>
	</tr>
  </table>
</form>
<br>