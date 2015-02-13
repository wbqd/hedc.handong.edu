<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td width="100%" colspan="2" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
					<td>
                        <p>&nbsp;</p>
                    </td>
				</tr>
                <tr>
                    <td>
                        <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td>


<table width="100%" cellpadding="3" cellspacing="1" border="0" >
	<tr> 
		<td colspan="4" height="20"  align=center>
				<span class="gen"><b><font color="#000000">{L_FORUM_STATS}</font></b></span>
		</td>
	</tr>
	<tr> 
		<td colspan="4" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
  <tr> 
	<td width="25%" nowrap="nowrap"><span class="genmed"><font color="#000000">{L_STATISTIC}</font></span></td>
	<td width="25%"><span class="genmed"><font color="#000000">{L_VALUE}</font></span></td>
	<td width="25%" nowrap="nowrap" ><span class="genmed"><font color="#000000">{L_STATISTIC}</font></span></td>
	<td width="25%"><span class="genmed"><font color="#000000">{L_VALUE}</font></span></td>
  </tr>
	<tr> 
		<td colspan="4" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
  <tr> 
	<td class="row1" nowrap="nowrap">{L_NUMBER_POSTS}:</td>
	<td ><b>{NUMBER_OF_POSTS}</b></td>
	<td class="row1" nowrap="nowrap">{L_POSTS_PER_DAY}:</td>
	<td ><b>{POSTS_PER_DAY}</b></td>
  </tr>
  <tr> 
	<td class="row1" nowrap="nowrap">{L_NUMBER_TOPICS}:</td>
	<td ><b>{NUMBER_OF_TOPICS}</b></td>
	<td class="row1" nowrap="nowrap">{L_TOPICS_PER_DAY}:</td>
	<td ><b>{TOPICS_PER_DAY}</b></td>
  </tr>
  <tr> 
	<td class="row1" nowrap="nowrap">{L_NUMBER_USERS}:</td>
	<td ><b>{NUMBER_OF_USERS}</b></td>
	<td class="row1" nowrap="nowrap">{L_USERS_PER_DAY}:</td>
	<td ><b>{USERS_PER_DAY}</b></td>
  </tr>
  <tr> 
	<td class="row1" nowrap="nowrap">{L_BOARD_STARTED}:</td>
	<td ><b>{START_DATE}</b></td>
	<td class="row1" nowrap="nowrap">{L_DB_SIZE}:</td>
	<td ><b>{DB_SIZE}</b></td>
  </tr>
	<tr> 
		<td colspan="4" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br><br>

<table width="100%" cellpadding="3" cellspacing="1" border="0" >
	<tr> 
		<td colspan="5" height="20"  align=center>
				<span class="gen"><b><font color="#000000">{L_WHO_IS_ONLINE}</font></b></span>
		</td>
	</tr>
	<tr> 
		<td colspan="5" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
  <tr> 
	<td width="13%"  height="25">&nbsp;<span class="genmed"><font color="#000000">{L_USERNAME}</font></span>&nbsp;</td>
	<td width="22%" height="25" >&nbsp;<span class="genmed"><font color="#000000">{L_STARTED}</font></span>&nbsp;</td>
	<td width="20%" >&nbsp;<span class="genmed"><font color="#000000">{L_LAST_UPDATE}</font></span>&nbsp;</td>
	<td width="20%" >&nbsp;<span class="genmed"><font color="#000000">{L_FORUM_LOCATION}</font></span>&nbsp;</td>
	<td width="20%" height="25" >&nbsp;<span class="genmed"><font color="#000000">{L_IP_ADDRESS}</font></span>&nbsp;</td>
  </tr>
	<tr> 
		<td colspan="5" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
  <!-- BEGIN reg_user_row -->
  <tr> 
	<td width="13%" class="{reg_user_row.ROW_CLASS}" >&nbsp;<span class="genmed"><a href="{reg_user_row.U_USER_PROFILE}" class="genmed">{reg_user_row.USERNAME}</a></span>&nbsp;</td>
	<td width="22%"  class="{reg_user_row.ROW_CLASS}">&nbsp;<span class="genmed">{reg_user_row.STARTED}</span>&nbsp;</td>
	<td width="20%"  nowrap="nowrap" class="{reg_user_row.ROW_CLASS}">&nbsp;<span class="genmed">{reg_user_row.LASTUPDATE}</span>&nbsp;</td>
	<td width="20%" class="{reg_user_row.ROW_CLASS}" >&nbsp;<span class="genmed"><a href="{reg_user_row.U_FORUM_LOCATION}" class="genmed">{reg_user_row.FORUM_LOCATION}</a></span>&nbsp;</td>
	<td width="20%" class="{reg_user_row.ROW_CLASS}" >&nbsp;<span class="genmed">{reg_user_row.IP_ADDRESS}</span>&nbsp;</td>
  </tr>
  <!-- END reg_user_row -->
  <!-- BEGIN guest_user_row -->
  <tr> 
	<td width="13%" class="{guest_user_row.ROW_CLASS}" >&nbsp;<span class="genmed">{guest_user_row.USERNAME}</span>&nbsp;</td>
	<td width="22%"  class="{guest_user_row.ROW_CLASS}">&nbsp;<span class="genmed">{guest_user_row.STARTED}</span>&nbsp;</td>
	<td width="20%"  nowrap="nowrap" class="{guest_user_row.ROW_CLASS}">&nbsp;<span class="genmed">{guest_user_row.LASTUPDATE}</span>&nbsp;</td>
	<td width="20%" class="{guest_user_row.ROW_CLASS}" >&nbsp;<span class="genmed"><a href="{guest_user_row.U_FORUM_LOCATION}" class="genmed">{guest_user_row.FORUM_LOCATION}</a></span>&nbsp;</td>
	<td width="20%" class="{guest_user_row.ROW_CLASS}" >&nbsp;<span class="genmed">{guest_user_row.IP_ADDRESS}</span>&nbsp;</td>
  </tr>
  <!-- END guest_user_row -->
</table>
<br>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
