<br>
<span class="gen"><b><font color="#000000">&raquo; {L_CONFIGURATION_TITLE}</font></b></span><br><br>
<form action="{S_CONFIG_ACTION}" method="post"><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center">
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_GENERAL_SETTINGS}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa  width="40%"><b>{L_SITE_NAME}</b><br /><span class="genmed"><font color="#A7A7A7">{L_SITE_NAME_EXPLAIN}</font></span></td>
		<td  width="40%"><input class="post" type="text" size="25" maxlength="100" name="sitename" value="{SITENAME}" /></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_DISABLE_BOARD}</b><br /><span class="genmed"><font color="#A7A7A7">{L_DISABLE_BOARD_EXPLAIN}</font></span></td>
		<td ><input type="radio" name="board_disable" value="1" {S_DISABLE_BOARD_YES} /> {L_YES}&nbsp;&nbsp;<input type="radio" name="board_disable" value="0" {S_DISABLE_BOARD_NO} /> {L_NO}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_ACCT_ACTIVATION}</b><br /><span class="genmed"><font color="#A7A7A7">{L_ACCT_ACTIVATION_EXPLAIN}</font></span></td>
		<td ><input type="radio" name="require_activation" value="{ACTIVATION_NONE}" {ACTIVATION_NONE_CHECKED} />{L_NONE}&nbsp; &nbsp;<input type="radio" name="require_activation" value="{ACTIVATION_USER}" {ACTIVATION_USER_CHECKED} />{L_USER}&nbsp; &nbsp;<input type="radio" name="require_activation" value="{ACTIVATION_ADMIN}" {ACTIVATION_ADMIN_CHECKED} />{L_ADMIN}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_VISUAL_CONFIRM}</b><br /><span class="genmed"><font color="#A7A7A7">{L_VISUAL_CONFIRM_EXPLAIN}</font></span></td>
		<td ><input type="radio" name="enable_confirm" value="1" {CONFIRM_ENABLE} />{L_YES}&nbsp; &nbsp;<input type="radio" name="enable_confirm" value="0" {CONFIRM_DISABLE} />{L_NO}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_MOUSE_RIGHT}</b></td>
		<td ><input type="radio" name="mouse_right" value="1" {MOUSE_RIGHT_ENABLE} />{L_YES}&nbsp; &nbsp;<input type="radio" name="mouse_right" value="0" {MOUSE_RIGHT_DISABLE} />{L_NO}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_SYSTEM_TIMEZONE}</b></td>
		<td >{TIMEZONE_SELECT}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_DISABLE_PRIVATE_MESSAGING}</b></td>
		<td ><input type="radio" name="privmsg_disable" value="0" {S_PRIVMSG_ENABLED} />{L_ENABLED}&nbsp; &nbsp;<input type="radio" name="privmsg_disable" value="1" {S_PRIVMSG_DISABLED} />{L_DISABLED}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_FLOOD_INTERVAL}</b><br /><span class="genmed"><font color="#A7A7A7">{L_FLOOD_INTERVAL_EXPLAIN}</font></span></td>
		<td ><input class="post" type="text" size="3" maxlength="10" name="flood_interval" value="{FLOOD_INTERVAL}" /> {L_SECONDS}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_TOPICS_PER_PAGE}</b></td>
		<td ><input class="post" type="text" name="topics_per_page" size="3" maxlength="4" value="{TOPICS_PER_PAGE}" /></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_POSTS_PER_PAGE}</b></td>
		<td ><input class="post" type="text" name="posts_per_page" size="3" maxlength="4" value="{POSTS_PER_PAGE}" /></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_HOT_THRESHOLD}</b></td>
		<td ><input class="post" type="text" name="hot_threshold" size="3" maxlength="4" value="{HOT_TOPIC}" /></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_NEW_LENGTH}</b></td>
		<td ><input class="post" type="text" name="new_length" size="3" maxlength="4" value="{NEW_LENGTH}" /> {L_HOURS}</td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="2" align=center><a id="copyright" name="copyright"><span class="gen"><b><font color="#000000">Copyright</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>Line #1</b></td>
		<td ><input class="post" type="text" name="remark1" size="40"  value="{REMARK1}" /></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>Line #2</b></td>
		<td ><input class="post" type="text" name="remark2" size="40" value="{REMARK2}" /></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>Line #3</b></td>
		<td ><input class="post" type="text" name="remark3" size="40"  value="{REMARK3}" /></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>Line #4</b></td>
		<td ><input class="post" type="text" name="remark4" size="40"  value="{REMARK4}" /></td>
	</tr>	
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="2" align=center><a id="copyright" name="copyright"><span class="gen"><b><font color="#000000">맞춤 설정</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>1:1 게시판</b><br /><span class="genmed"><font color="#A7A7A7">본인이 쓴 글을 본인과 관리자만 확인하려면 메뉴 생성 후 메뉴의 번호를 추가후 메뉴별로 권한 설정해야 함.(로그인 후 글쓰기 및 글 쓴 내용 확인 가능)</font></span></td>
		<td ><input class="post" type="text" name="remark5" size="60"  value="{REMARK5}" /><br>Ex : 97,101,145</td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_EMAIL_SETTINGS}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_BOARD_EMAIL_FORM}</b><br /><span class="genmed"><font color="#A7A7A7">{L_BOARD_EMAIL_FORM_EXPLAIN}</font></span></td>
		<td ><input type="radio" name="board_email_form" value="1" {BOARD_EMAIL_FORM_ENABLE} /> {L_ENABLED}&nbsp;&nbsp;<input type="radio" name="board_email_form" value="0" {BOARD_EMAIL_FORM_DISABLE} /> {L_DISABLED}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_EMAIL_SIG}</b><br /><span class="genmed"><font color="#A7A7A7">{L_EMAIL_SIG_EXPLAIN}</font></span></td>
		<td ><textarea name="board_email_sig" rows="5" cols="30" class="post">{EMAIL_SIG}</textarea></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>{L_ADMIN_EMAIL}</b></td>
		<td ><input class="post" type="text" size="25" maxlength="100" name="board_email" value="{EMAIL_FROM}" /></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>'개인 컨설팅' 알림메일 수신자</b></td>
		<td ><input class="post" type="text" size="25" maxlength="100" name="remark8" value="{REMARK8}" /></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>'소수자 학습지원' 알림메일 수신자</b></td>
		<td ><input class="post" type="text" size="25" maxlength="100" name="remark6" value="{REMARK6}" /></td>
	</tr>
	<tr>
		<td bgcolor=#fafafa ><b>'학습상담' 알림메일 수신자</b></td>
		<td ><input class="post" type="text" size="25" maxlength="100" name="remark7" value="{REMARK7}" /></td>
	</tr>

	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td  colspan="2" align=center>{S_HIDDEN_FIELDS}<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" class="mainoption" /></td>
	</tr>
</table></form>
<br>