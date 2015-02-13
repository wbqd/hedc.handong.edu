<!-- BEGIN switch_admin -->
<table width="95%" cellspacing="2" border="0" cellpadding="3">
	<tr>
		<td>
			<span class="genmed">{FORUM_DESC}</span>
		</td>
	</tr>
</table>
<table width="95%" cellspacing="2" border="0" cellpadding="2"><form method="post" action="{S_POST_DAYS_ACTION}">
<tr><td align="center" width="100%">
{BOARD_INDEX}
{TOPICS_LIST_BOX}
</td></tr>
</table>
</form>
<!-- END switch_admin -->
<!-- BEGIN switch_not_admin -->
<script language="JavaScript">
<!--

location.href = "{U_POST_NEW_TOPIC}";

// -->
</script>
<!-- END switch_not_admin -->