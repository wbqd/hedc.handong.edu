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
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td height="1" bgcolor="#b3b3b3"></td>
</tr>
<tr bgcolor="#Fafafa"> 
	<td height="29"><span class="genmed">&nbsp;&nbsp;<font color=#000000><b>&raquo; {FORUM_NAME}</b></font></span>
	</td>
</tr>
<tr>
	<td height="1" bgcolor="#b3b3b3"></td>
</tr>
<tr>
<td align="center">
<table border="0" cellpadding="0" cellspacing="0" width="100%">

<!-- END header_table -->  


<!-- BEGIN topic -->
<tr>
 <td valign="top" align="center">		
		<span class="genmed" style="line-height=50%"><br></span>
	   <a href="{topics_list_box.row.U_EDIT_TOPIC}" class="gen"><font color='{topics_list_box.row.REMARK2}'><b>{topics_list_box.row.TOPIC_TITLE_FULL}</b></font></a>
		<span class="genmed" style="line-height=50%">
		<input type="button" name="edit" class="mainoption" value="{MENU_LANG_EDIT}"  onclick="document.location.replace('{topics_list_box.row.U_EDIT_TOPIC}')">

</td>
</tr>
<!-- END topic -->

<!-- BEGIN no_topics -->
<tr>
<td height="30" align="center" valign="middle"><span class="genmed">{topics_list_box.row.L_NO_TOPICS}</span></td>
</tr>
<!-- END no_topics -->

<!-- BEGIN bottom -->
<tr>
	<td height="15"></td>
</tr>
<tr>
<!-- END bottom -->
<!-- BEGIN footer_table -->
</tr>
</table>
</table>
<!-- END footer_table -->
<!-- END row -->
<!-- END topics_list_box -->