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
	<td colspan="12" height="1" bgcolor="#{THEME_COLOR_30}"></td>
</tr>
<tr bgcolor="#Fafafa">
	<td width="13%" align="center" nowrap="nowrap" height="29"><span class=menuTitle>이름</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="18%" align="center" nowrap="nowrap" height="29"><span class=menuTitle>학부</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="28%" align="center" nowrap="nowrap" height="29"><span class=menuTitle>튜터링 필요한 과목</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="13%" align="center" nowrap="nowrap" height="29"><span class=menuTitle>과목 교수님</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="14%" align="center" nowrap="nowrap" height="29"><span class=menuTitle>강의 시간</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="13%" align="center" nowrap="nowrap" height="29"><span class=menuTitle>{MENU_LANG_DATE}</span></td>
</tr>
	<tr>
		<td colspan="12" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
<!-- END header_table -->
<!-- BEGIN topic -->
<tr bgcolor="white" onMouseOver="this.style.backgroundColor='#{THEME_COLOR_4}';" onMouseOut=this.style.backgroundColor="white">
	<td align="center" height="27"><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="gen">&nbsp;{topics_list_box.row.TOPIC_TITLE_FULL}</a></span></td>
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.REMARK1}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.REMARK7}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.REMARK8}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.REMARK9}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.LAST_POST_TIME}</span></td>
</tr>
	<tr>
		<td colspan="12" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
<!-- END topic -->
<!-- BEGIN no_topics -->
<tr> 
	<td colspan="12" height="30" align="center" valign="middle"><span class="genmed">{topics_list_box.row.L_NO_TOPICS}</span></td>
</tr>
	<tr>
		<td colspan="12" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
<!-- END no_topics -->
<!-- BEGIN bottom -->
<tr>
	<td colspan="12" height="5"></td>
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
