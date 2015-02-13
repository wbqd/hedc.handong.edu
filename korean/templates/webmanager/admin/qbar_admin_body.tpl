<br>
<span class="gen"><b><font color="#000000">&raquo; {L_TITLE}</font></b></span><br><br>

<form name="post" method="post" action="{S_ACTION}">

<table width="100%" cellpadding="4" cellspacing="1" border="0"  align="center">
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
	<td align="center" width="30%" ><span class="gen"><b><font color="#000000">{L_MENU}</font></b></span></td>
	<!-- BEGIN switch_import_no -->
	<td align="center" nowrap="nowrap" width="50%">&nbsp;<span class="gen"><b><font color="#000000">{L_SETTINGS}</font></b></span>&nbsp;</span></td>
	<!-- END switch_import_no -->
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
<!-- BEGIN qbar -->
<!-- BEGIN field -->
<tr>
	<!-- BEGIN inc -->
	<td  width="30">&nbsp;</td>
	<!-- END inc -->
	<td align="center"  colspan="1" width="20%">
		{qbar.field.TITLE}
	</td>
	<!-- BEGIN switch_icon -->
	<!-- END switch_icon -->
	<!-- BEGIN switch_import_no -->
	<!-- END switch_import_no -->
	<td  nowrap="nowrap" align="center">
		<table cellpadding="2" cellspacing="1" border="0" width="100%" align="center">
		<!-- BEGIN switch_single -->
		<tr><td colspan="2" align="center"><span class="genmed"><b><a href="{U_MANAGE_SINGLE}&f={qbar.field.FIELD_TREE_ID}" target="main" class="genmed">{L_MANAGE}</a></b>&nbsp;</span></td></tr>
		<tr><td colspan="2" align="center"><span class="genmed"><b><a href="{U_PERM_SINGLE}&f={qbar.field.TREE_ID}" target="main" class="genmed">{L_PERMISSIONS}</a></b>&nbsp;</span></td></tr>
		<!-- END switch_single -->

		<!-- BEGIN switch_multi -->
		<tr><td colspan="2" align="center"><span class="genmed"><b><a href="{U_MANAGE_MULTI}&c={qbar.field.FIELD_TREE_ID}" target="main" class="genmed">{L_MANAGE}</a></b>&nbsp;</span></td></tr>
		<tr><td colspan="2" align="center"><span class="genmed"><b><a href="{U_PERM_MULTI}&select_cat={qbar.field.FIELD_TREE_ID}" target="main" class="genmed">{L_PERMISSIONS}</a></b>&nbsp;</span></td></tr>
		<!-- END switch_multi -->

		</table>
	</td>

</tr>

	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#cdcdcd"></td>
				</tr>
			</table>
		</td>
	</tr>
<!-- END field -->

<!-- END qbar -->

</table>
</form>
<br><br>