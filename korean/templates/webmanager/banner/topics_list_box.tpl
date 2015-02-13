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
	<td colspan="8" height="1" bgcolor="#b3b3b3"></td>
</tr>
<tr bgcolor="#Fafafa">
	<td width="23%" align="center" height="30"><span class=menuTitle>{MENU_LANG_BANNERNAME}</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="30%" align="center"><span class=menuTitle>{MENU_LANG_BANNERIMAGE}</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="32%" align="center"><span class=menuTitle>{MENU_LANG_URL}</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="13%" align="center"><span class=menuTitle>{MENU_LANG_DATE}</span></td>
	<!-- BEGIN multi_selection -->
	<td width="5%" align="center" nowrap="nowrap"><input type="checkbox" name="all_mark_{topics_list_box.row.header_table.BOX_ID}" value="0" onClick="check_uncheck_all_{topics_list_box.row.header_table.BOX_ID}();">&nbsp;</th>
	<!-- END multi_selection -->
</tr>
<tr>
	<td colspan="8" height="1" bgcolor="#b3b3b3"></td>
</tr>
<!-- END header_table -->
<!-- BEGIN topic -->
<tr bgcolor="white" onMouseOver="this.style.backgroundColor='#f5f5f5';" onMouseOut=this.style.backgroundColor="white">
	<td height="27">&nbsp;<a href="{topics_list_box.row.U_EDIT_TOPIC}" class="gen">{topics_list_box.row.TOPIC_TITLE_FULL}</a></span></td>
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.FULL_IMG}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.REMARK1} [{topics_list_box.row.REMARK2}]</span></td>
	<td></td>
	<td align="center" nowrap="nowrap"><span class="genmed">{topics_list_box.row.LAST_POST_TIME}</span></td>
	<!-- BEGIN multi_selection -->
	<td width="5%" align="center" nowrap="nowrap"><input type="checkbox" name="all_mark_{topics_list_box.row.header_table.BOX_ID}" value="0" onClick="check_uncheck_all_{topics_list_box.row.header_table.BOX_ID}();">&nbsp;</th>
	<!-- END multi_selection -->
</tr>
<tr>
	<td colspan="8" height="1" bgcolor="#DADADA"></td>
</tr>
<!-- END topic -->
<!-- BEGIN no_topics -->
<tr> 
	<td colspan="8" height="29" align="center" valign="middle"><span class="genmed">{topics_list_box.row.L_NO_TOPICS}</span></td>
</tr>
<tr>
	<td colspan="8" height="1" bgcolor="#DADADA"></td>
</tr>
<!-- END no_topics -->
<!-- BEGIN bottom -->

<tr>
	<td colspan="8" height="15"></td>
</tr>
<tr> 
	<td colspan="8" align="center" valign="middle">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td  height="30" width="100%" align="center" bgcolor="#fafafa">
					<span class="genmed">{topics_list_box.row.FOOTER}</span>
				</td>
			</tr>
		</table>
	</td>
</tr>
<!-- END bottom -->
<!-- BEGIN footer_table -->
</table>


<!-- END footer_table -->
<!-- BEGIN spacer -->
<br class="gensmall">
<!-- END spacer -->
<!-- BEGIN switch_pics_per_row -->
<!-- END switch_pics_per_row -->
<!-- END row -->
<!-- END topics_list_box -->