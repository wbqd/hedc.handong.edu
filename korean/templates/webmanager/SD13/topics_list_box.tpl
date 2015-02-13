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
<!-- END header_table -->  
<!-- BEGIN topic -->
	<tr> 
		<td colspan="2" height="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="30" bgcolor="#fafafa" align="left" colspan="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td height="5" colspan="2"></td>
				</tr>
				<tr>
					<td width="3%" height="20" align="left" valign="top">&nbsp;<img src="templates/webmanager/images/detail_view_bullet.gif" border="0"></td>
					<td width="97%" ><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="gen"><font color='#000000'>{topics_list_box.row.TOPIC_TITLE_FULL}</font></a>&nbsp;{topics_list_box.row.NEW_IMG}
					<!-- BEGIN switch_have_reply -->
					<img src="templates/webmanager/images/link-shortline.gif" border="0" align="absmiddle"><span class="postdetails"><font color="#D2235C" size="1"><img src="templates/webmanager/images/icon-comment.gif">{topics_list_box.row.REPLIES}</font>{topics_list_box.row.NEWEST_POST_IMG}</span>
					<!-- END switch_have_reply -->
					<!-- BEGIN switch_not_have_reply -->
					<!-- END switch_not_have_reply -->
					</td>
				</tr>
				<tr>
					<td height="5" colspan="2"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td colspan="2" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="10" align="right" colspan="2">
		</td>
	</tr>
	<tr>
		<td width="35%" align="center" valign="top">
			<table border="0" cellspacing="0" cellpadding="1" bgcolor="#FFFFFF" style="border-width:1px; border-color:#{THEME_COLOR_30}; border-style:solid;">
			<tr>
				<td align="center" valign="middle">
					<a href="{topics_list_box.row.U_VIEW_TOPIC}" class="topictitle"><img src="{topics_list_box.row.THUMBNAIL_ONLY}" width="{topics_list_box.row.THUMB_WIDTH_100}" height="{topics_list_box.row.THUMB_HEIGHT_100}" border="0"></a></td>
			</tr>		
			</table>
		</td>
		<td valign="top">
			<span class="genmed">{topics_list_box.row.MESSAGE}</span>
		</td>
	</tr>
	<tr>
		<td height="20"></td>
	</tr>
	<!-- END topic -->
<!-- BEGIN no_topics -->
	<tr> 
		<td colspan="2" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#E8E8E8"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="29" bgcolor="{T_TR_COLOR1}" align="center" colspan="2">
		<span class="gen">{topics_list_box.row.L_NO_TOPICS}</span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#E8E8E8"></td>
				</tr>
			</table>
		</td>
	</tr>
<!-- END no_topics -->
<!-- BEGIN bottom -->
	<tr> 
		<td colspan="2" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#E8E8E8"></td>
				</tr>
				<tr> 
					<td height="2" bgcolor="#F2F2F2"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="10" colspan="2"></td>
	</tr>
	<tr> 
		<td align="center" valign="middle" colspan="2">
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
<!-- BEGIN switch_pics_per_row -->
<!-- END switch_pics_per_row -->
<!-- END row -->
<!-- END topics_list_box -->