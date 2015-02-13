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
	<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
</tr>
<tr bgcolor="#Fafafa"> 
	<td height="29"><span class="genmed">&nbsp;&nbsp;<font color=#000000><b>{FORUM_NAME}</b></font></span>
	</td>
</tr>
<tr>
	<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
</tr>
<tr>
	<td height="15"></td>
</tr>
<tr>
<td align="center">
<table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">
<tr>
<!-- END header_table -->
<!-- BEGIN topic -->
<td valign="top" align="center" height="100%" width="33%">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td align="center">
			<table border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" style="border-width:1px; border-color:rgb(230,230,230); border-style:solid;">
				<tr>
					<td align="center" align="center" valign="middle" width="180" bgcolor="#Fafafa" height="210">
					<table width=100% height=100% border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" style="border-width:2px; border-color:rgb(255,255,255); border-style:solid;">
						<tr>
							<td align="center" valign="middle" bgcolor="#f0f0f0"><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="topictitle"><img src="{topics_list_box.row.THUMBNAIL_ONLY}" width="{topics_list_box.row.THUMB_WIDTH_100}" height="{topics_list_box.row.THUMB_HEIGHT_100}" border="0"></a></td>
						</tr>
					</table>
					</td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td height="5"></td>
		</tr>
		<tr>
			<td align="center" valign="top"><img src="templates/webmanager/images/detail_view_bullet.gif" border="0"><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="gen"><font color='#{THEME_COLOR_100}'>{topics_list_box.row.TOPIC_TITLE_FULL}</font></a>
				<!-- BEGIN switch_have_reply -->
				<span class="postdetails">[{topics_list_box.row.REPLIES}]</span>{topics_list_box.row.NEWEST_POST_IMG}
				<!-- END switch_have_reply -->
				<!-- BEGIN switch_not_have_reply -->
				<!-- END switch_not_have_reply -->
				{topics_list_box.row.NEW_IMG}
			</td>
		</tr>
		<tr>
			<td align="center" valign="top"><span class="postdetails">{topics_list_box.row.LAST_POST_TIME}</span></td>
		</tr>
		<tr>
			<td align="center" valign="top"><span class="genmed"><font color="#C1C1C1">{topics_list_box.row.L_AUTHOR}: {topics_list_box.row.TOPIC_AUTHOR}</font></span></td>
		</tr>
	</table>
</td>
<!-- END topic -->

<!-- BEGIN no_topics -->
<td height="30" align="center" valign="middle"><span class="genmed">{topics_list_box.row.L_NO_TOPICS}</span></td>
<!-- END no_topics -->

<!-- BEGIN switch_pics_per_row -->
</tr><tr><td height="10"></td></tr><tr>
<!-- END switch_pics_per_row -->
<!-- BEGIN bottom -->
</tr>
<tr>
	<td height="15"></td>
</tr>
<tr> 
	<td align="center" valign="middle" colspan="3">
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
</td>
</tr>
</table>
<!-- END footer_table -->
<!-- END row -->
<!-- END topics_list_box -->