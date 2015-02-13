<!-- BEGIN calendar_list_box -->
<!-- BEGIN row -->
<!-- BEGIN header_table -->
<!-- BEGIN multi_selection -->
<script language="Javascript" type="text/javascript">
//
// checkbox selection management
function check_uncheck_main_{calendar_list_box.row.header_table.BOX_ID}()
{
	var all_checked = true;
	for (i = 0; (i < document.{calendar_list_box.FORMNAME}.elements.length) && all_checked; i++)
	{
		if (document.{calendar_list_box.FORMNAME}.elements[i].name == '{calendar_list_box.FIELDNAME}[]{calendar_list_box.row.header_table.BOX_ID}')
		{
			all_checked =  document.{calendar_list_box.FORMNAME}.elements[i].checked;
		}
	}
	document.{calendar_list_box.FORMNAME}.all_mark_{calendar_list_box.row.header_table.BOX_ID}.checked = all_checked;
}
// check/uncheck all
function check_uncheck_all_{calendar_list_box.row.header_table.BOX_ID}()
{
	for (i = 0; i < document.{calendar_list_box.FORMNAME}.length; i++)
	{
		if (document.{calendar_list_box.FORMNAME}.elements[i].name == '{calendar_list_box.FIELDNAME}[]{calendar_list_box.row.header_table.BOX_ID}')
		{
			document.{calendar_list_box.FORMNAME}.elements[i].checked = document.{calendar_list_box.FORMNAME}.all_mark_{calendar_list_box.row.header_table.BOX_ID}.checked;
		}
	}
}
</script>
<!-- END multi_selection -->
<table border="0" cellpadding="7" cellspacing="0" width="100%" style="border-width:1px; border-color:rgb(230,239,230); border-style:solid;">
<tr> 
	<td colspan="1" bgcolor="#f0f0f0" height="25" nowrap="nowrap"><span class="genmed">&nbsp;<b><font color="#000000">{calendar_list_box.row.L_TITLE}</font></b></span></td>
	<!-- BEGIN multi_selection -->
	<td width="5%" align="center" nowrap="nowrap"><input type="checkbox" name="all_mark_{calendar_list_box.row.header_table.BOX_ID}" value="0" onClick="check_uncheck_all_{calendar_list_box.row.header_table.BOX_ID}();">&nbsp;</td>
	<!-- END multi_selection -->
</tr>
<tr>
	<td height="2">
	</td>
</tr>
<!-- END header_table -->
<!-- BEGIN topic -->
<tr> 
	<!-- BEGIN single_selection -->
	<td align="center" valign="middle" width="5%"><input type="radio" name="{calendar_list_box.FIELDNAME}" value="{calendar_list_box.row.FID}" {calendar_list_box.row.L_SELECT} /></td>
	<!-- END single_selection -->
	<td align=left><span class="genmed"><img src="templates/webmanager/images/calendar/note-icon.gif" border="0"><a href="{calendar_list_box.row.U_VIEW_TOPIC}"><b>{calendar_list_box.row.TOPIC_TITLE_FULL}</b></a></span>&nbsp;{calendar_list_box.row.NEWEST_POST_IMG}{calendar_list_box.row.NEW_IMG}<span class="genmed">&nbsp;&nbsp;{calendar_list_box.row.TOPIC_CALENDAR_DATES}</span></td>	
	<!-- BEGIN multi_selection -->
	<td align="center" valign="middle"><span class="postdetails"><input type="checkbox" name="{calendar_list_box.FIELDNAME}[]{calendar_list_box.row.BOX_ID}" value="{calendar_list_box.row.FID}" onClick="javascript:check_uncheck_main_{calendar_list_box.row.BOX_ID}();" {calendar_list_box.row.L_SELECT} /></span></td>
	<!-- END multi_selection -->
<tr>
	<td colspan="1" height="10"></td>
</tr>
<!-- END topic -->
<!-- BEGIN no_topics -->
<tr> 
	<td colspan="1" height="30" align="center" valign="middle"><span class="gen">{calendar_list_box.row.L_NO_TOPICS}</span></td>
</tr>
<!-- END no_topics -->
<!-- BEGIN bottom -->
<tr>
	<td colspan="1" height="10"></td>
</tr>
<!-- END bottom -->
<!-- BEGIN footer_table -->
</table>
<!-- END footer_table -->
<!-- BEGIN spacer -->

<!-- END spacer -->
<!-- BEGIN switch_pics_per_row -->
<!-- END switch_pics_per_row -->
<!-- END row -->
<!-- END calendar_list_box -->