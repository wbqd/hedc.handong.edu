<br>
<span class="gen"><b><font color="#000000">&raquo; {L_WORDS_TITLE}</font></b></span><br><br>
<form method="post" action="{S_WORDS_ACTION}">
<table width="99%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr> 
		<td colspan="4" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center"><span class="gen"><b><font color="#000000">{L_WORD}</font></b></span></td>
		<td align="center"><span class="gen"><b><font color="#000000">{L_REPLACEMENT}</font></b></span></td>
		<td align="center" colspan="2"><span class="gen"><b><font color="#000000">{L_ACTION}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="4" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- BEGIN words -->
	<tr>
		<td bgcolor="#fafafa" align="center">{words.WORD}</td>
		<td bgcolor="#fafafa" align="center">{words.REPLACEMENT}</td>
		<td bgcolor="#f8f8f8" align="center"><a href="{words.U_WORD_EDIT}">{L_EDIT}</a></td>
		<td bgcolor="#f8f8f8" align="center"><a href="{words.U_WORD_DELETE}">{L_DELETE}</a></td>
	</tr>
	<!-- END words -->
	<tr> 
		<td colspan="4" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="4" align="center">{S_HIDDEN_FIELDS}<input type="submit" name="add" value="{L_ADD_WORD}" class="liteoption" /></td>
	</tr>

</table></form>
<br><br>