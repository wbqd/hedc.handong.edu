<span class="cattitle">��������ũ ��û ���� ���</span>
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
			<td align="center"><input type="submit" value="���" class="mainoption" /></td>
		</tr>
	</form>
</table>
<script>
function chkAddForm() {
	with (document.add_ban_form) {
		if (ban_username.value == "" ) { alert("������ ID�� �Է��ϼ���."); return false};
		if (ban_until.value == "" ) { alert("��¥�� �Է��ϼ���."); return false};
		if (ban_korean.value == "" ) { alert("������ ��������ũ ������ �����ϼ���."); return false};
		if (confirm("����� '" + ban_username.value + "'(��)�� " + ban_until.value + "���� " + ban_section.value + " ��û�� �����ϵ��� �Ͻðڽ��ϱ�?")) {
		    return true;
		} else {
		    return false;
		}
	}
}
function chkDeleteForm() {
	with (document.delete_ban_form) {
		if (confirm("�����Ͻðڽ��ϱ�?")) {
		    return true;
		} else {
		    return false;
		}
	}
}
</script>