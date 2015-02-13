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
		<td height="30" >&nbsp;&nbsp;&nbsp;<span class="genmed"><img src="templates/webmanager/images/ico_sq3.gif" border="0" align="absmiddle">&nbsp;<font color=#000000><b>{FORUM_NAME}</b></font></span>
		</td>
	</tr>
<tr>
	<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
</tr>
	<tr>
		<td height="5"></td>
	</tr>
	<tr>
		<td align="center">
			<table border="0" cellpadding="7" cellspacing="1" align="center">
				<tr>
<!-- END header_table -->  


<!-- BEGIN topic -->
					<td valign="top" align="center" height="100%">
						<table border="0" cellpadding="0" cellspacing="0" width="33%" height="100%">
							<tr>
								<td align="center">
								<table border="3" width="100%" height="100%" cellspacing="0" cellpadding="8" bordercolor="#EFEFEF" align="center">
									<tr>
										<td align="center">
										<table border="0" cellspacing="0" cellpadding="0" bordercolor="#EDEDED" align="center">
											<tr>
												<td height="5"></td>
											</tr>
											<tr>
												<td align="center"><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="topictitle"><img src="{topics_list_box.row.THUMBNAIL_ONLY}" width="{topics_list_box.row.THUMB_WIDTH_100}" height="{topics_list_box.row.THUMB_HEIGHT_100}" border="0"></a></td>
											</tr>
											<tr>
												<td height="5"></td>
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
								<td height="35" align="center" valign="top"><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="gen"><font color="#{THEME_COLOR_100}">{topics_list_box.row.TOPIC_TITLE_FULL}</font></a></span>
								</td>
							</tr>
						</table>
					</td>
<!-- END topic -->

<!-- BEGIN no_topics -->
<td class="row1" height="30" align="center" valign="middle"><span class="gen">{topics_list_box.row.L_NO_TOPICS}</span></td>
<!-- END no_topics -->

<!-- BEGIN switch_pics_per_row -->
</tr><tr>
<!-- END switch_pics_per_row -->

<!-- BEGIN bottom -->
</tr>
<tr>
	<td align="center" valign="middle"></td>
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