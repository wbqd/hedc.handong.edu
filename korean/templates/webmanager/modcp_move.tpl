<form action="{S_MODCP_ACTION}" method="post">


<table align=center width="80%" border="0" cellpadding="1" cellspacing="0" bgcolor="#F3F3F3">
	<tr>
		<td height="3">
		</td>
	</tr>
	<tr>
		<td align="center">
			<table style="border-width:1px; border-color:rgb(204,204,204); border-style:solid;" border="0" cellpadding="4" cellspacing="1" width="98%" bgcolor="white">
				<tr>
					<td colspan="2" height="5"></td>
				</tr>
				<tr>
					<td colspan="2" height="30" align="center"><span class="genmed"><b>{MESSAGE_TITLE}</b></span></td>
				</tr>
				<tr> 
				  <td> 
					<table width="100%" border="0" cellspacing="0" cellpadding="1">
					  <tr> 
						<td>&nbsp;</td>
					  </tr>
					  <tr> 
						<td align="center"><span class="genmed">{L_MOVE_TO_FORUM} &nbsp; {S_FORUM_SELECT}<br /><br />
						  <br />
						  {MESSAGE_TEXT}</span><br />
						  <br />
						  {S_HIDDEN_FIELDS} 
						  <input class="mainoption" type="submit" name="confirm" value="{L_YES}" />
						  &nbsp;&nbsp; 
						  <input class="liteoption" type="submit" name="cancel" value="{L_NO}" />
						</td>
					  </tr>
					  <tr> 
						<td>&nbsp;</td>
					  </tr>
					</table>
				  </td>
				</tr>
				<tr>
					<td colspan="2" height="10"></td>
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
<p align="center"><a href="{U_BACK}"><img src="templates/webmanager/images/icon-board-back.gif" border="0"></a></p>
<br><br>