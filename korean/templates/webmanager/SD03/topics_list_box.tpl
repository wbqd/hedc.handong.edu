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
<!-- END header_table -->
<!-- BEGIN topic -->
	<tr bgcolor="white" onMouseOver="this.style.backgroundColor='#{THEME_COLOR_4}';" onMouseOut=this.style.backgroundColor="white">
		<td width="2%" valign="top"><span class="genmed">{topics_list_box.row.NUMBERING}.</span></td>
		<td width="98%" valign="top"><span class="genmed"><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="gen">{topics_list_box.row.TOPIC_TITLE_FULL}</a>&nbsp;<span class="postdetails"><font color='#{THEME_COLOR_50}'>{topics_list_box.row.LAST_POST_TIME}</font></span>&nbsp;{topics_list_box.row.DOWNLOAD_INDIRECT}
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