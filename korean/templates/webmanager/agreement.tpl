<table  width="90%" cellspacing="1" cellpadding="3" border="0">
	<tr> 
		<td colspan="1" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="25" valign="middle" align=center><span class="genmed"><b><font color=#000000>{REGISTRATION}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="1" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="10" valign="middle" align=center></td>
	</tr>
	<!-- BEGIN agree_row -->
	<tr>
		<td  align="center"><table width="96%" cellspacing="2" cellpadding="2" border="0" align="center">
			<tr>
				<td><span class="genmed"><b><font color="#000000">{agree_row.TITLE}</font></b></span></td>
			</tr>
			<tr>
				<td><span class="genmed">
				<div style="position:relative; overflow: auto; width:100%; height:150px; background-color: #FFFFFF; padding:10px; border:1 solid #cccccc;" > 
				{agree_row.TEXT}
				</div>
				</span></td>
			</tr>
		</table></td>
	</tr>
	<!-- END agree_row -->
	<tr>
		<td height="10" valign="middle" align=center></td>
	</tr>
	<tr> 
		<td colspan="1" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="25" valign="middle" align=center><div align="center">
		<a href="" class="genmed"></a>
		<input type="button" name="yes" class="mainoption" value="{AGREE_OVER_13}"  onclick="location.replace('{U_AGREE_OVER13}')">		
		<input type="button" name="no" class="mainoption" value="{DO_NOT_AGREE}"  onclick="location.replace('{U_INDEX}')">
		</div></td>
	</tr>
</table>
<br><br>