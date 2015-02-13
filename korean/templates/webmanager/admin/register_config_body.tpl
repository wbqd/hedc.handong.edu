<br>
<span class="gen"><b><font color="#000000">&raquo; {L_FIELD_CONF}</font></b></span><br><br>

<form action="{S_CONFIG_ACTION}" method="post"><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" >
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
	  <td  colspan="2" align=center><span class="gen"><b><font color="#000000">{L_FIELD_CONF}</font></b></span></td>
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
		<td bgcolor=#fafafa align=right><b>{L_FIELD_REALNAME}</b></td>
		<td >
         <input type="radio" name="use_realname" value="0" {FIELD_REALNAME_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_realname" value="1" {FIELD_REALNAME_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_realname" value="2" {FIELD_REALNAME_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><b>{L_FIELD_JUMIN}</b></td>
		<td >
         <input type="radio" name="use_jumin" value="0" {FIELD_JUMIN_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_jumin" value="1" {FIELD_JUMIN_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_jumin" value="2" {FIELD_JUMIN_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><b>{L_FIELD_MPHONE}</b></td>
		<td >
         <input type="radio" name="use_mphone" value="0" {FIELD_MPHONE_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_mphone" value="1" {FIELD_MPHONE_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_mphone" value="2" {FIELD_MPHONE_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><b>{L_FIELD_HPHONE}</b></td>
		<td >
         <input type="radio" name="use_hphone" value="0" {FIELD_HPHONE_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_hphone" value="1" {FIELD_HPHONE_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_hphone" value="2" {FIELD_HPHONE_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><b>{L_FIELD_GENDER}</b></td>
		<td >
         <input type="radio" name="use_gender" value="0" {FIELD_GENDER_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_gender" value="1" {FIELD_GENDER_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_gender" value="2" {FIELD_GENDER_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><b>{L_FIELD_BIRTH}</b></td>
		<td >
         <input type="radio" name="use_birth" value="0" {FIELD_BIRTH_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_birth" value="1" {FIELD_BIRTH_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_birth" value="2" {FIELD_BIRTH_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><b>{L_FIELD_FROM}</b></td>
		<td >
	 <input type="radio" name="use_from" value="0" {FIELD_FROM_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_from" value="1" {FIELD_FROM_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_from" value="2" {FIELD_FROM_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><b>{L_FIELD_OCC}</b></td>
		<td >
	<input type="radio" name="use_occ" value="0" {FIELD_OCC_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_occ" value="1" {FIELD_OCC_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_occ" value="2" {FIELD_OCC_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>

	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark1" size="20" value="{TITLE_REMARK1}" /></td>
		<td >
         <input type="radio" name="use_remark1" value="0" {FIELD_REMARK1_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark1" value="1" {FIELD_REMARK1_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark1" value="2" {FIELD_REMARK1_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark2" size="20" value="{TITLE_REMARK2}" /></td>
		<td >
         <input type="radio" name="use_remark2" value="0" {FIELD_REMARK2_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark2" value="1" {FIELD_REMARK2_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark2" value="2" {FIELD_REMARK2_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark3" size="20" value="{TITLE_REMARK3}" /></td>
		<td >
         <input type="radio" name="use_remark3" value="0" {FIELD_REMARK3_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark3" value="1" {FIELD_REMARK3_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark3" value="2" {FIELD_REMARK3_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark4" size="20" value="{TITLE_REMARK4}" /></td>
		<td >
         <input type="radio" name="use_remark4" value="0" {FIELD_REMARK4_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark4" value="1" {FIELD_REMARK4_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark4" value="2" {FIELD_REMARK4_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark5" size="20" value="{TITLE_REMARK5}" /></td>
		<td >
         <input type="radio" name="use_remark5" value="0" {FIELD_REMARK5_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark5" value="1" {FIELD_REMARK5_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark5" value="2" {FIELD_REMARK5_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark6" size="20" value="{TITLE_REMARK6}" /></td>
		<td >
         <input type="radio" name="use_remark6" value="0" {FIELD_REMARK6_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark6" value="1" {FIELD_REMARK6_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark6" value="2" {FIELD_REMARK6_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark7" size="20" value="{TITLE_REMARK7}" /></td>
		<td >
         <input type="radio" name="use_remark7" value="0" {FIELD_REMARK7_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark7" value="1" {FIELD_REMARK7_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark7" value="2" {FIELD_REMARK7_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark8" size="20" value="{TITLE_REMARK8}" /></td>
		<td >
         <input type="radio" name="use_remark8" value="0" {FIELD_REMARK8_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark8" value="1" {FIELD_REMARK8_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark8" value="2" {FIELD_REMARK8_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark9" size="20" value="{TITLE_REMARK9}" /></td>
		<td >
         <input type="radio" name="use_remark9" value="0" {FIELD_REMARK9_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark9" value="1" {FIELD_REMARK9_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark9" value="2" {FIELD_REMARK9_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark10" size="20" value="{TITLE_REMARK10}" /></td>
		<td >
         <input type="radio" name="use_remark10" value="0" {FIELD_REMARK10_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark10" value="1" {FIELD_REMARK10_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark10" value="2" {FIELD_REMARK10_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark11" size="20" value="{TITLE_REMARK11}" /></td>
		<td >
         <input type="radio" name="use_remark11" value="0" {FIELD_REMARK11_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark11" value="1" {FIELD_REMARK11_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark11" value="2" {FIELD_REMARK11_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark12" size="20" value="{TITLE_REMARK12}" /></td>
		<td >
         <input type="radio" name="use_remark12" value="0" {FIELD_REMARK12_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark12" value="1" {FIELD_REMARK12_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark12" value="2" {FIELD_REMARK12_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark13" size="20" value="{TITLE_REMARK13}" /></td>
		<td >
         <input type="radio" name="use_remark13" value="0" {FIELD_REMARK13_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark13" value="1" {FIELD_REMARK13_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark13" value="2" {FIELD_REMARK13_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark14" size="20" value="{TITLE_REMARK14}" /></td>
		<td >
         <input type="radio" name="use_remark14" value="0" {FIELD_REMARK14_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark14" value="1" {FIELD_REMARK14_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark14" value="2" {FIELD_REMARK14_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark15" size="20" value="{TITLE_REMARK15}" /></td>
		<td >
         <input type="radio" name="use_remark15" value="0" {FIELD_REMARK15_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark15" value="1" {FIELD_REMARK15_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark15" value="2" {FIELD_REMARK15_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark16" size="20" value="{TITLE_REMARK16}" /></td>
		<td >
         <input type="radio" name="use_remark16" value="0" {FIELD_REMARK16_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark16" value="1" {FIELD_REMARK16_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark16" value="2" {FIELD_REMARK16_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark17" size="20" value="{TITLE_REMARK17}" /></td>
		<td >
         <input type="radio" name="use_remark17" value="0" {FIELD_REMARK17_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark17" value="1" {FIELD_REMARK17_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark17" value="2" {FIELD_REMARK17_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark18" size="20" value="{TITLE_REMARK18}" /></td>
		<td >
         <input type="radio" name="use_remark18" value="0" {FIELD_REMARK18_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark18" value="1" {FIELD_REMARK18_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark18" value="2" {FIELD_REMARK18_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark19" size="20" value="{TITLE_REMARK19}" /></td>
		<td >
         <input type="radio" name="use_remark19" value="0" {FIELD_REMARK19_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark19" value="1" {FIELD_REMARK19_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark19" value="2" {FIELD_REMARK19_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td bgcolor=#fafafa align=right><input class="post" type="text" name="title_remark20" size="20" value="{TITLE_REMARK20}" /></td>
		<td >
         <input type="radio" name="use_remark20" value="0" {FIELD_REMARK20_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input type="radio" name="use_remark20" value="1" {FIELD_REMARK20_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input type="radio" name="use_remark20" value="2" {FIELD_REMARK20_REQ} /> {L_FIELD_USE_REQ}</td>
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
		<td  colspan="2" align="center">{S_HIDDEN_FIELDS}<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" class="mainoption" />
		</td>
	</tr>
</table>
<input type="hidden"  name="sitename" value="{SITENAME}" />
</form>
<br>