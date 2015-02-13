<br>
<span class="gen"><b><font color="#000000">&raquo; {L_CONTROL_PANEL_TITLE}</font></b></span><br><br>

<form method="post" action="{S_MODE_ACTION}">
  <table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
<!--	  <td align="left" nowrap="nowrap"><span class="gen"><a class="gen" href="{U_BACK}" />Back</a></span></td> -->
	  <td align="right" nowrap="nowrap"><span class="genmed">{L_VIEW}:&nbsp;{S_VIEW_SELECT}&nbsp;&nbsp;{L_SELECT_SORT_METHOD}:&nbsp;{S_MODE_SELECT}&nbsp;&nbsp;{L_ORDER}&nbsp;{S_ORDER_SELECT}&nbsp;&nbsp; 
		<input type="submit" name="submit" value="{L_SUBMIT}" class="liteoption" />
		</span>
	  </td>
	</tr>
  </table>
  <table width="100%" cellpadding="3" cellspacing="1" border="0" >
	<tr> 
		<td colspan="4" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td width="10%" height="25"  align=center><span class="gen"><b><font color="#000000">#</font></b></span></td>
	  <td width="30%"  align=center><span class="gen"><b><font color="#000000">{L_USERNAME}</font></b></span></td>
	  <td width="30%" align=center ><span class="gen"><b><font color="#000000">{L_ATTACHMENTS}</font></b></span></td>
	  <td width="30%" align=center><span class="gen"><b><font color="#000000">{L_TOTAL_SIZE}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="4" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#000000"></td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- BEGIN memberrow -->
	<tr> 
	  <td class="{memberrow.ROW_CLASS}" align="center"><span class="gen">&nbsp;{memberrow.ROW_NUMBER}&nbsp;</span></td>
	  <td class="{memberrow.ROW_CLASS}" align="center"><span class="gen"><a href="{memberrow.U_VIEW_MEMBER}" class="gen">{memberrow.USERNAME}</a></span></td>
	  <td class="{memberrow.ROW_CLASS}" align="center" valign="middle">&nbsp;<b>{memberrow.TOTAL_ATTACHMENTS}</b>&nbsp;</td>
	  <td class="{memberrow.ROW_CLASS}" align="center">&nbsp;<b>{memberrow.TOTAL_SIZE}</b>&nbsp;</td>
	</tr>
	<!-- END memberrow -->
	<tr> 
	  <td  colspan="4" height="28">&nbsp;</td>
	</tr>
  </table>
  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
	  <td align="right" valign="top"></td>
	</tr>
  </table>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tr> 
	<td align="right"><span class="nav">{PAGINATION}&nbsp;</span></td>
  </tr>
</table></form>

<br />