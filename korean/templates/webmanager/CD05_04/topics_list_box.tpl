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
	<td height="1" bgcolor="#{THEME_COLOR_30}" colspan="10"></td>
</tr>
<tr bgcolor="#Fafafa"> 
	<td height="29" colspan="10">&nbsp;&nbsp;&nbsp;<span class="genmed"><img src="templates/webmanager/images/ico_sq3.gif" border="0" align="absmiddle">&nbsp;<font color=#000000><b>{topics_list_box.row.L_TITLE}</b></font></span></td>
</tr>
<tr>
	<td height="1" bgcolor="#{THEME_COLOR_30}" colspan="10"></td>
</tr>
<tr height="27">
	<td width="30%" align="center" nowrap="nowrap"><span class=menuTitle>시간대</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="30%" align="center" nowrap="nowrap"><span class=menuTitle>튜&nbsp;&nbsp;&nbsp;터</span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="40%" align="center" nowrap="nowrap" colspan="2"><span class=menuTitle>신청현황</span></td>
	<!--td width="1"><span class=menuBorder>|</span></td>
	<td width="14%" align="center" nowrap="nowrap"><span class=menuTitle>{MENU_LANG_DATE}</span></td-->
</tr>
<tr>
	<td colspan="10" height="1">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr> 
				<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
			</tr>
		</table>
	</td>
</tr>
<!-- END header_table -->
<!-- BEGIN topic -->



<!--table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td colspan="10" height="1" bgcolor="#{THEME_COLOR_30}"></td>
</tr>
<tr>
	<td colspan="10" height="3"></td>
</tr-->
<!-- END header_table -->
<!-- BEGIN topic -->
<tr bgcolor="white" onMouseOver="this.style.backgroundColor='#{THEME_COLOR_4}';" onMouseOut=this.style.backgroundColor="white" height="27">
<!-- BEGIN switch_user_admin -->
	<td align="center"><span class="genmed"><a href="{topics_list_box.row.U_VIEW_TOPIC}" class="gen">{topics_list_box.row.REMARK2}</a></span></td>
<!-- END switch_user_admin -->
<!-- BEGIN switch_not_user_admin -->
	<td align="center"><span class="genmed">{topics_list_box.row.REMARK2}</span></td>
<!-- END switch_not_user_admin -->
	<td></td>
	<td align="center"><span class="genmed">{topics_list_box.row.REMARK3}<span class="genmed"></span></td>
	<td></td>
	<td align="center">
<!-- BEGIN switch_have_reply -->
		<a href="{topics_list_box.row.U_VIEW_TOPIC}"><img src="templates/webmanager/images/button_done.gif" width="64" height="19" border="0"></a>
<!-- END switch_have_reply -->
<!-- BEGIN switch_not_have_reply -->
		<a href="posting.php?mode=reply&t={topics_list_box.row.TOPIC_ID}" class="gen"><img src="templates/webmanager/images/button_apply.gif" width="64" height="19" border="0"></a>
<!-- END switch_not_have_reply -->
	</td>
	<td align="center"><span class="genmed">

</tr>
	<tr>
		<td colspan="10" height="1">
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
	<td colspan="10" height="30" align="center" valign="middle"><span class="genmed">{topics_list_box.row.L_NO_TOPICS}</span></td>
</tr>
	<tr>
		<td colspan="10" height="1">
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
	<td colspan="10" height="5"></td>
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
