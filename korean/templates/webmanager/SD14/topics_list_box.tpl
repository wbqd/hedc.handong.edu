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
	<td height="1" bgcolor="#{THEME_COLOR_30}" colspan="2"></td>
</tr>
<tr bgcolor="#Fafafa"> 
	<td height="29" colspan="2">&nbsp;&nbsp;&nbsp;<span class="genmed"><img src="templates/webmanager/images/ico_sq3.gif" border="0" align="absmiddle">&nbsp;<font color=#000000><b>{FORUM_NAME}</b></font></span></td>
</tr>
<tr>
	<td height="1" bgcolor="#{THEME_COLOR_30}" colspan="2"></td>
</tr>
<!-- END header_table -->
<!-- BEGIN topic -->
<tr>
	<td height="10" colspan="2">
	</td>
</tr>
<tr>
	<td width="30%" align="center" valign="top">
		<table border="0" cellpadding="0" cellspacing="0"><tr><td height="5"></td></tr></table>
		<table border="0" cellspacing="0" cellpadding="1" bgcolor="#FFFFFF" style="border-width:1px; border-color:#{THEME_COLOR_30}; border-style:solid;">
			<tr>
				<td align="center" valign="middle">
					<a href="{topics_list_box.row.U_VIEW_TOPIC}" class="topictitle"><img src="{topics_list_box.row.THUMBNAIL_ONLY}" width="{topics_list_box.row.THUMB_WIDTH_100}" height="{topics_list_box.row.THUMB_HEIGHT_100}" border="0"></a></td>
			</tr>
		</table>
	</td>
	<td align="left" valign="top">
	<table border="0" cellpadding="0" cellspacing="0" width="100%" span class="genmed" style="line-height=180%">
		<tr>
			<td height="22" colspan="2"><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="gen"><font color='#{THEME_COLOR_100}'>{topics_list_box.row.TOPIC_TITLE_FULL}</font></a></span>
			</td>
		</tr>
		<!-- BEGIN switch_remark1 -->
		<tr>
			<td width="3%" valign="top" align="center" height="20">
				<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0" align="absmiddle">
			</td>
			<td width="97%">
				{topics_list_box.row.REMARK1}
			</td>
		</tr>
		<!-- END switch_remark1 -->
		<!-- BEGIN switch_remark2 -->
		<tr>
			<td valign="top" align="center"  height="20">
				<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0" align="absmiddle">
			</td>
			<td>
				{topics_list_box.row.REMARK2}				
			</td>
		</tr>
		<!-- END switch_remark2 -->
		<!-- BEGIN switch_remark3 -->
		<tr>
			<td valign="top" align="center"  height="20">
				<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0" align="absmiddle">
			</td>
			<td>
				{topics_list_box.row.REMARK3}				
			</td>
		</tr>
		<!-- END switch_remark3 -->
		<!-- BEGIN switch_remark4 -->
		<tr>
			<td valign="top" align="center"  height="20">
				<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0" align="absmiddle">
			</td>
			<td>
				{topics_list_box.row.REMARK4}				
			</td>
		</tr>
		<!-- END switch_remark4 -->
		<!-- BEGIN switch_remark5 -->
		<tr>
			<td valign="top" align="center"  height="20">
				<img src="templates/webmanager/images/detail_view_bullet1.gif" border="0" align="absmiddle">
			</td>
			<td>
				{topics_list_box.row.REMARK5}				
			</td>
		</tr>
		<!-- END switch_remark5 -->
</table>
</td>
</tr>
<tr> 
	<td colspan="2" height="10"></td>
</tr>
<tr> 
	<td colspan="2" bgcolor="#DADADA" height="1"></td>
</tr>
<!-- END topic -->
<!-- BEGIN no_topics -->
<tr> 
	<td colspan="2" height="30" align="center" valign="middle"><span class="gen">{topics_list_box.row.L_NO_TOPICS}</span></td>
</tr>
<!-- END no_topics -->
<!-- BEGIN bottom -->
<!-- END bottom -->
<!-- BEGIN footer_table -->
</table>
<!-- END footer_table -->
<!-- BEGIN spacer -->
<br><br>
<!-- END spacer -->
<!-- BEGIN switch_pics_per_row -->
<!-- END switch_pics_per_row -->
<!-- END row -->
<!-- END topics_list_box -->