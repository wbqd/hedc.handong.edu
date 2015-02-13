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
<table border="0" cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<td height="1" bgcolor="#eeeeee"></td>
	</tr>
<!-- END header_table -->
<!-- BEGIN topic -->
	<tr bgcolor="white" onMouseOver="this.style.backgroundColor='#{THEME_COLOR_4}';" onMouseOut=this.style.backgroundColor="white">
		<td valign="top">
			<table border="0" cellpadding="3" cellspacing="0" width="100%">
				<tr>
					<td height="5"></td>
				</tr>
				<tr>
					<td><span class="genmed"><span style="color: #000000; font-weight: bold; font-size: 13px;">[{topics_list_box.row.REMARK1}]</span>&nbsp;<a href="{topics_list_box.row.U_VIEW_TOPIC}" class="genmed" style="color: #000000; font-weight: bold; font-size: 13px;">{topics_list_box.row.TOPIC_TITLE_FULL}</a></span></td>
				</tr>
				<tr>
					<td><span class="genmed" style="color:#999999; line-height: 160%;">{topics_list_box.row.REMARK14}</span></td>
				</tr>
				<tr>
					<td align="right"><span class="genmed" style="color:#777777;"><b>{topics_list_box.row.REMARK4}</b> Έν Α€Ώψ&nbsp;&nbsp;</span></td>
				</tr>
				<tr>
					<td height="3"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="1" bgcolor="#eeeeee"></td>
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