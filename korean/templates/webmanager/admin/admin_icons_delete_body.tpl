<br>
<b><span class="gen"><font color="#754C24">{L_TITLE}</font></span></b>
<br><span class="gen">{L_TITLE_EXPLAIN}</span><br><br>

<form action="{S_ACTION}" method="post">
<table width="100%" cellpadding="2" cellspacing="0">
<tr>
	<td><span class="nav"><a href="{S_ACTION}" class="nav">{L_TITLE}</a></span></td>
</tr>
</table>

<table width="100%" cellpadding="4" cellspacing="1" border="0" class="forumline">
<tr>
	<th align="center">{L_TITLE_DELETE}</th>
</tr>
<tr>
	<td class="row1" align="center">
		<span class="gen"><br /><br />{MESSAGE}&nbsp;&nbsp;{ICON}<br /><br /></span>
		<!-- BEGIN replace -->
		<table border="0" cellspacing="0" cellpadding="2">
		<!-- BEGIN row -->
		<tr>
			<td nowrap="nowrap">
				<span class="gen">
					<!-- BEGIN cell -->
					<input type="radio" name="replace_icon" value="{replace.row.cell.ICON_ID}"{replace.row.cell.ICON_CHECKED}>&nbsp;{replace.row.cell.ICON_IMG}&nbsp;&nbsp;
					<!-- END cell -->
				</span>
			</td>
		</tr>
		<!-- END row -->
		</table>
		<br />
		<!-- END replace -->
		<br />
	</td>
</tr>
<tr>
	<td class="catBottom" colspan="2" align="center">{S_HIDDEN_FIELDS}
		<input type="submit" name="confirm" class="mainoption" value="{L_CONFIRM}" />&nbsp;
		<input type="submit" name="cancel" class="liteoption" value="{L_CANCEL}" />
	</td>
</tr>
</table>
</form>
<br>