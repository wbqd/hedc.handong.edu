<!-- BEGIN topics_list_box -->
<!-- BEGIN row -->
<!-- BEGIN header_table -->
<!-- BEGIN multi_selection -->
<script language="Javascript" type="text/javascript">
//
// checkbox selection management
function check_uncheck_main_{topics_list_box.row.header_table.BOX_ID}()
{
	var all_checked = true;
	for (i = 0; (i < document.{topics_list_box.FORMNAME}.elements.length) && all_checked; i++)
	{
		if (document.{topics_list_box.FORMNAME}.elements[i].name == '{topics_list_box.FIELDNAME}[]{topics_list_box.row.header_table.BOX_ID}')
		{
			all_checked =  document.{topics_list_box.FORMNAME}.elements[i].checked;
		}
	}
	document.{topics_list_box.FORMNAME}.all_mark_{topics_list_box.row.header_table.BOX_ID}.checked = all_checked;
}
// check/uncheck all
function check_uncheck_all_{topics_list_box.row.header_table.BOX_ID}()
{
	for (i = 0; i < document.{topics_list_box.FORMNAME}.length; i++)
	{
		if (document.{topics_list_box.FORMNAME}.elements[i].name == '{topics_list_box.FIELDNAME}[]{topics_list_box.row.header_table.BOX_ID}')
		{
			document.{topics_list_box.FORMNAME}.elements[i].checked = document.{topics_list_box.FORMNAME}.all_mark_{topics_list_box.row.header_table.BOX_ID}.checked;
		}
	}
}
</script>
<!-- END multi_selection -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
	</tr>
	<tr bgcolor="#Fafafa">
		<td nowrap="nowrap" height="30">
		<span class="genmed">&nbsp;&nbsp;<font color=#000000><b>{FORUM_NAME}</b></font></span></td>
	</tr>
	<tr> 
		<td height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
<!-- END header_table -->
<!-- BEGIN topic -->
	<tr>
		<td align="center" valign="top">
			<table border="0" cellpadding="4" cellspacing="0" width="100%">
				<tr>
					<td width="10"></td>
					<td height="30">
						<span class="genmed" style="line-height=100%"><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="gen"><font color=#{THEME_COLOR_100}>{topics_list_box.row.TOPIC_TITLE_FULL}</font></a>&nbsp;<img src="templates/webmanager/images/link-shortline.gif" border="0" align="absmiddle">&nbsp;<a href="http://{topics_list_box.row.REMARK2}" target="_blank">{topics_list_box.row.REMARK2}</a>&nbsp;{topics_list_box.row.NEW_IMG}</span>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<span class="genmed">{topics_list_box.row.MESSAGE}</span>
					</td>
				</tr>
				<tr> 
					<td colspan="2" height="1">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr> 
								<td height="1" bgcolor="#DADADA"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
<!-- END topic -->
<!-- BEGIN no_topics -->
	<tr> 
		<td height="30" align="center" valign="middle"><span class="genmed">{topics_list_box.row.L_NO_TOPICS}</span></td>
	</tr>
	<tr> 
		<td height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>

<!-- END no_topics -->
<!-- BEGIN footer_table -->
</table>
<!-- END footer_table -->
<!-- BEGIN spacer -->
<br>
<!-- END spacer -->
<!-- BEGIN switch_pics_per_row -->
<!-- END switch_pics_per_row -->
<!-- END row -->
<!-- END topics_list_box -->