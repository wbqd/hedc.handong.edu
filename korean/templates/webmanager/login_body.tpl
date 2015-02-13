<br>
<form action="{S_LOGIN_ACTION}" method="post" target="_top">
<table width="60%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F3F3F3">
	<tr>
		<td height="3">
		</td>
	</tr>
	<tr>
		<td align="center">
			<table style="border-width:1px; border-color:rgb(204,204,204); border-style:solid;" border="0" cellpadding="0" cellspacing="1" width="98%" bgcolor="white">
				<tr>
					<td  height="10"></td>
				</tr>
				<tr>
					<td  height="30" align="center"><span class="genmed"><b>{L_ENTER_PASSWORD}</b></span></td>
				</tr>
				<tr>
					<td  height="5"></td>
				</tr>
				<tr>
					<td  align="center">
						<table border="0" cellpadding="0" cellspacing="0" align="center">
							<tr>
								<td rowspan="2">
									<table border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="right"><span class="genmed"><img src="templates/webmanager/images/title-id1.gif"></span></td>
											<td width="5"></td>
											<td align="left"><span class="genmed"><input type="text" name="username" size="15" maxlength="40" value="{USERNAME}" class="formstyle4"></span></td>
										</tr>
										<tr>
											<td colspan="3" height="3"></td>
										</tr>
										<tr>
											<td align="right"><span class="genmed"><img src="templates/webmanager/images/title-pass1.gif"></span></td>
											<td></td>
											<td align="left"><span class="genmed"><input type="password" name="password" size="15" maxlength="32" class="formstyle4"></td>
										</tr>
									</table>
								</td>
								<td width="2" rowspan="2"></td>
								<td align="left" valign="top"><input type="checkbox" class="formstyle3" name="autologin" style="height:17; padding-top:0; margin-left:0;"><span class="genmed">{L_AUTO_LOGIN}</span></td>
							</tr>
							<tr>
								<td align="left" style="padding-top:3;">&nbsp;<input type="submit" name="login" value="{L_LOGIN}" style="height:17; color:rgb(100,100,100); background-color:rgb(240,240,240); padding-top:1; border-width:1; border-color:rgb(210,210,210); font-family: µ¸¿ò; size: 8pt; font-weight:bolder;"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan=2 height=13></td>
				<tr>
				<tr>
					<td  height="1" bgcolor="#dddddd"></td>
				</tr>
				<tr>
					<td  valign="middle" align=center height="35">{S_HIDDEN_FIELDS}<img src="templates/webmanager/images/icon_img.gif" vspace=2>&nbsp;<a href="profile.php?mode=register" class="genmed">{L_REGISTER}</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="templates/webmanager/images/icon_img.gif" vspace=2>&nbsp;<a href="{U_SEND_PASSWORD}" class="genmed">{L_SEND_PASSWORD}</span></a>
					</td>
				</tr>
				</table>
		</td>
	</tr>
	<tr>
		<td height="3">
		</td>
	</tr>
</table>
</form>
<br><br>