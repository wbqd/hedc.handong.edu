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
<tr bgcolor="#fafafa">
	<td width="33%" align="center" nowrap="nowrap" height="30"><span class=menuTitle>제목</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="10%" align="center" nowrap="nowrap"><span class=menuTitle>이름</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="17%" align="center" nowrap="nowrap"><span class=menuTitle>학부</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="14%" align="center" nowrap="nowrap"><span class=menuTitle>학번</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="14%" align="center" nowrap="nowrap"><span class=menuTitle>연락처</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="10%" align="center" nowrap="nowrap"><span class=menuTitle>{MENU_LANG_DATE}</span></td>
</tr>
<tr>
	<td colspan="12" height="1" bgcolor="#{THEME_COLOR_30}"></td>
</tr>
<!-- END header_table -->
<!-- BEGIN topic -->
<tr>
	<td colspan="12" height="5"></td>
</tr>
<tr bgcolor="white" onMouseOver="this.style.backgroundColor='#{THEME_COLOR_4}';" onMouseOut=this.style.backgroundColor="white">
	<td height="22"><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="gen" style="line-height:180%;">{topics_list_box.row.TOPIC_TITLE_FULL}</a>&nbsp;{topics_list_box.row.TOPIC_ATTACHMENT_IMG}&nbsp;{topics_list_box.row.NEW_IMG}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.REMARK1}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.REMARK2}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.REMARK3}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.REMARK4}</span></td>
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.LAST_POST_TIME}</span></td>
</tr>
<tr>
	<td colspan="12" height="5"></td>
</tr>
<tr>
	<td colspan="12" height="1" bgcolor="#DADADA"></td>
</tr>
<!-- END topic -->
<!-- BEGIN no_topics -->
<tr> 
	<td colspan="12" height="29" align="center" valign="middle"><span class="genmed">{topics_list_box.row.L_NO_TOPICS}</span></td>
</tr>
<tr>
	<td colspan="12" height="1" bgcolor="#DADADA"></td>
</tr>
<!-- END no_topics -->
<!-- BEGIN bottom -->
<tr>
	<td colspan="12" height="15"></td>
</tr>
<tr> 
	<td colspan="12" align="center" valign="middle">
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