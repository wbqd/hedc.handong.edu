<span class="cattitle">헬프데스크 신청 금지 목록</span>
<table width="90%" cellpadding="2" cellspacing="1" border="0">
	<tr>
		<th>No.</th>
		<th>User ID</th>
		<th>User Name</th>
		<th>Ban Until</th>
		<th>Ban Section</th>
		<th>Delete</th>
	</tr>
	<!-- BEGIN ban_list_row -->
	<form name="delete_ban_form" action="user_ban.php" method="post" id="user_ban" onsubmit="return chkDeleteForm()">
		<tr>
			<td align="center">{ban_list_row.BAN_INDEX}</td>
			<td align="center">{ban_list_row.USERNAME}</td>
			<td align="center">{ban_list_row.USER_REALNAME}</td>
			<td align="center">{ban_list_row.BAN_UNTIL}</td>
			<td align="center">{ban_list_row.BAN_SECTION}</td>
			<td align="center"><input type="hidden" name="ban_id" value="{ban_list_row.BAN_ID}" /><input type="submit" value="Delete" class="mainoption" /></td>
		</tr>
	</form>
	<!-- END ban_list_row -->
	<tr bgcolor="#e5eecc">
		<td colspan="6" align="center"><strong>Add a new user</strong></td>
	</tr>
	<form name="add_ban_form" action="user_ban.php" method="post" id="user_ban" onsubmit="return chkAddForm()" >
		<tr bgcolor="#e5eecc">
			<td align="center"></td>
			<td align="center"><input type="text" name="ban_username" /></td>
			<td align="center"></td>
			<td align="center"><input type="date" name="ban_until" /></td>
			<td align="center">
				<input type="radio" name="ban_section" value="English HD">English HD
				<br>
				<input type="radio" name="ban_section" value="Korean HD">Korean HD
			</td>
			<td align="center"><input type="submit" value="등록" class="mainoption" /></td>
		</tr>
	</form>
</table>
<script>
function chkAddForm() {
	with (document.add_ban_form) {
		if (ban_username.value == "" ) { alert("금지할 ID를 입력하세요."); return false};
		if (ban_until.value == "" ) { alert("날짜를 입력하세요."); return false};
		if (ban_korean.value == "" ) { alert("금지할 헬프데스크 섹션을 선택하세요."); return false};
		if (confirm("사용자 '" + ban_username.value + "'(을)를 " + ban_until.value + "까지 " + ban_section.value + " 신청을 금지하도록 하시겠습니까?")) {
		    return true;
		} else {
		    return false;
		}
	}
}
function chkDeleteForm() {
	with (document.delete_ban_form) {
		if (confirm("삭제하시겠습니까?")) {
		    return true;
		} else {
		    return false;
		}
	}
}
</script>