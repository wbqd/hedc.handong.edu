			<tr> 
				<td colspan="3" height="1">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr> 
							<td height="1" bgcolor="#DADADA"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td width="20%" height="30" valign="top">&nbsp;<span class=menuTitle>{MENU_LANG_POLL}</span></td>
				<td width="1" valign="top"><span class=menuBorder>|</span></td>
				<td width="80%" valign="top"><span class="genmed">{L_ADD_POLL_EXPLAIN}<br><b>{L_POLL_QUESTION}</b> : <input type="text" name="poll_title" size="50" maxlength="255" class="formstyle4" value="{POLL_TITLE}" /></span></td>
	        </tr>
			<!-- BEGIN poll_option_rows -->
            <tr>
				<td></td>
				<td></td>
				<td width="80%" valign="top"><span class="genmed"><b>{L_POLL_OPTION}</b> : <input type="text" name="poll_option_text[{poll_option_rows.S_POLL_OPTION_NUM}]" size="30" class="formstyle4" maxlength="255" value="{poll_option_rows.POLL_OPTION}" /></span> &nbsp;<input type="submit" name="edit_poll_option" value="{L_UPDATE_OPTION}" class="liteoption" /> <input type="submit" name="del_poll_option[{poll_option_rows.S_POLL_OPTION_NUM}]" value="{L_DELETE_OPTION}" class="liteoption" /></td>
			</tr>
			<!-- END poll_option_rows -->
            <tr>
				<td></td>
				<td></td>
				<td width="80%" valign="top"><span class="genmed"><b>{L_POLL_OPTION}</b> : <input type="text" name="add_poll_option_text" size="30" maxlength="255" class="formstyle4" value="{ADD_POLL_OPTION}" /></span> &nbsp;<input type="submit" name="add_poll_option" value="{L_ADD_OPTION}" class="liteoption" /></td>
			</tr>
            <tr>
				<td></td>
				<td></td>
				<td width="80%" valign="top"><span class="genmed"><b>{L_POLL_LENGTH}</b> : <input type="text" name="poll_length" size="3" maxlength="3" class="formstyle4" value="{POLL_LENGTH}" /></span>&nbsp;<span class="gen"><b>{L_DAYS}</b></span>&nbsp;<span class="genmed">{L_POLL_LENGTH_EXPLAIN}</span></td>
			</tr>
			<!-- BEGIN switch_poll_delete_toggle -->
            <tr>
				<td></td>
				<td></td>
				<td width="80%" valign="top"><span class="gen"><b>{L_POLL_DELETE}</b></span>&nbsp;&nbsp;<input class="formstyle3" type="checkbox" name="poll_delete" /></td>
			</tr>
			<!-- END switch_poll_delete_toggle -->
