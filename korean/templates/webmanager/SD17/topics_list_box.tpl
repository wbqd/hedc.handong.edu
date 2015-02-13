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
		<td height="1" bgcolor="#{THEME_COLOR_30}" colspan="2"></td>
	</tr>
	<tr>
		<td height="30" bgcolor="#fafafa" align="left" colspan="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="60%" height="20"  align="left">&nbsp;<img src="templates/webmanager/images/detail_view_bullet.gif" border="0"><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="gen"><font color='#000000'>{topics_list_box.row.TOPIC_TITLE_FULL}</font></a>&nbsp;{topics_list_box.row.NEW_IMG}
					<!-- BEGIN switch_have_reply -->
					<img src="templates/webmanager/images/link-shortline.gif" border="0" align="absmiddle"><span class="postdetails"><font color="#D2235C" size="1"><img src="templates/webmanager/images/icon-comment.gif">{topics_list_box.row.REPLIES}</font>{topics_list_box.row.NEWEST_POST_IMG}</span>
					<!-- END switch_have_reply -->
					<!-- BEGIN switch_not_have_reply -->
					<!-- END switch_not_have_reply -->
					</td>
					<td height="20" align="right">&nbsp;<span class="genmed">{topics_list_box.row.L_VIEWS}: {topics_list_box.row.VIEWS}&nbsp;&nbsp;&nbsp;&nbsp;{topics_list_box.row.L_LASTPOST}: {topics_list_box.row.LAST_POST_TIME}</span>&nbsp;
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="1" bgcolor="#{THEME_COLOR_30}" colspan="2"></td>
	</tr>
	<tr>
		<td height="10" align="right" colspan="2">
		</td>
	</tr>
	<tr>
			<!-- BEGIN switch_attach -->
		<td width="230" align="center" valign="top">
			<table border="0" cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,2,0" width="219" height="80">
			<param name=movie value="templates/webmanager/SD17/mp3p.swf">
			<param name=quality value=high>
			<param name=wmode value=transparent>
			<param name="bgcolor" value="#FFFFFF">
			<param name="menu" value="false" />
			<param name="FlashVars" value="outMP3={topics_list_box.row.FILENAME_ONLY}">
			<embed src="templates/webmanager/images/mp3p.swf" quality=high  menu="false" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="219" height="80" FlashVars="outMP3={topics_list_box.row.FILENAME_ONLY}">
			</embed> 
			</object></td>
				</tr>
			</table>
		</td>
		<td valign="top" width="100%">
		<!-- END switch_attach -->			
		<!-- BEGIN switch_not_attach -->					
		<td valign="top" colspan=2>
		<!-- END switch_not_attach -->
			<table border="0" cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td><span class="genmed">{topics_list_box.row.MESSAGE}</span>
					</td>
				</tr>
			</table>
		</td>
	</tr>
<!-- BEGIN switch_message -->
	<tr>
		<td height="10"></td>
	</tr>
<!-- END switch_message -->
	<!-- END topic -->
<!-- BEGIN no_topics -->
	<tr> 
		<td colspan="2" height="1" bgcolor="#E8E8E8">
		</td>
	</tr>
	<tr>
		<td height="29" bgcolor="{T_TR_COLOR1}" align="center" colspan="2">
		<span class="gen">{topics_list_box.row.L_NO_TOPICS}</span></td>
	</tr>
<!-- END no_topics -->
<!-- BEGIN bottom -->
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