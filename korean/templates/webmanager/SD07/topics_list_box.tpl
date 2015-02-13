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
<table border="0" cellpadding="4" cellspacing="1" width="100%">
<!-- END header_table -->
<!-- BEGIN topic -->
	<tr bgcolor="white"> 
		<td valign="top" width="95%">
			<span class="genmed"><img src="templates/webmanager/images/ico_sq.gif" border="0" align="absmiddle">&nbsp; <span class="genmed" style="line-height=180%"><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="gen"><font color='#{THEME_COLOR_100}'>{topics_list_box.row.TOPIC_TITLE_FULL}</font></a>
		</td>
	</tr>
	<tr>
		<td bgcolor="#fafafa">
			<table width="100%" border="0" cellspacing="0" cellpadding="5">
				<tr>
					<td>
						<span class="genmed">{topics_list_box.row.MESSAGE}</span>
					<!-- BEGIN switch_attach -->
						<br><p align="right">{topics_list_box.row.DOWNLOAD_INDIRECT}</p>
					<!-- END switch_attach -->
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="5"></td>
	</tr>
<!-- END topic -->
<!-- BEGIN no_topics -->
	<tr> 
		<td class="row1" height="30" align="center" valign="middle"><span class="gen">{topics_list_box.row.L_NO_TOPICS}</span></td>
	</tr>
<!-- END no_topics -->
<!-- BEGIN bottom -->
<!-- END bottom -->
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