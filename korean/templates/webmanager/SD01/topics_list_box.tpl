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
<!-- END header_table -->

<table border="0" cellpadding="2" cellspacing="0" width="100%">
	<!-- BEGIN topic -->
	<!-- BEGIN switch_user_moderator -->
	<tr>
		<td colspan="3" align="right">
			<a href="{topics_list_box.row.U_EDIT_TOPIC}"><img src="templates/webmanager/images/icon_edit.gif" border="0"></a>&nbsp;<a href="{topics_list_box.row.U_DEL_TOPIC}"><img src="templates/webmanager/images/icon_delete.gif" border="0"></a>
		</td>
	</tr>
	<!-- END switch_user_moderator -->
	<!-- BEGIN switch_not_user_moderator -->
	<!-- END switch_not_user_moderator -->
	<tr>
		<td valign="middle" height="30" bgcolor="{T_TD_COLOR3}" colspan="3"><a name="TOPIC_ANCHOR_{topics_list_box.row.LAST_POST_ID}"></a>
			<span class="genmed"><b>&nbsp;&nbsp;&nbsp;&nbsp;<font color=#000000>{topics_list_box.row.TOPIC_TITLE_FULL}</font></b></span>
		</td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td width="3%">
		</td>
		<td width="94%" align="left" valign="top">
			<span class="genmed">{topics_list_box.row.MESSAGE}</td>
		</td>
		<td width="3%">
		</td>
	</tr>
	<tr>
		<td colspan="3" height="10"></td>
	</tr>
    <!-- END topic -->
</table>
<table border="0" cellpadding="2" cellspacing="0" width="100%">
<!-- BEGIN no_topics -->
<tr> 
	<td class="row1" height="30" align="center" valign="middle"><span class="gen">{topics_list_box.row.L_NO_TOPICS}</span></td>
</tr>
<!-- END no_topics -->
</table>
<!-- BEGIN switch_pics_per_row -->
<!-- END switch_pics_per_row -->
<!-- END row -->
<!-- END topics_list_box -->