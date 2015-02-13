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
<table border="0" cellpadding="1" cellspacing="0" width="100%" align="center">
	<tr>
        <td colspan="3" height="1" background="templates/webmanager/images/guest-line.gif">
        </td>
	</tr>
	<tr>
	<!-- BEGIN multi_selection -->
		<td width="5%" align="center" nowrap="nowrap"><input type="checkbox" name="all_mark_{topics_list_box.row.header_table.BOX_ID}" value="0" onClick="check_uncheck_all_{topics_list_box.row.header_table.BOX_ID}();">&nbsp;</td>
	<!-- END multi_selection -->
	</tr>
<!-- END header_table -->
<!-- BEGIN topic -->
	<tr>
		<td width="70%">
			&nbsp;<img src="templates/webmanager/images/detail_view_bullet.gif" border="0">&nbsp;<span class="genmed"><font color="#{THEME_COLOR_100}">{topics_list_box.row.TOPIC_TITLE_FULL}</font></span>&nbsp;{topics_list_box.row.GUEST_EMAIL_IMG}</td>
		<td width="18%" align="right">
			<span class="gensmall"><font color="#{THEME_COLOR_30}">{topics_list_box.row.LAST_POST_TIME}</font></span>
		</td>
		<td width="12%" align="right" valign="middle">
			<a href="{topics_list_box.row.U_VIEW_TOPIC}" class="topictitle"><img src="templates/webmanager/images/guest-edit-del.gif" border="0" align="absbottom"></a>
		</td>
	</tr>
    <tr>
        <td colspan="3">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="8">
                        <p><img src="templates/webmanager/images/guestbox-top.gif" border="0"></p>
                    </td>
					<td background="templates/webmanager/images/guestbox-back.gif">
					</td>
					<td width="8">
                        <p><img src="templates/webmanager/images/guestbox-top2.gif" border="0"></p>
                    </td>
                </tr>
                <tr>
				    <td width="8" background="templates/webmanager/images/guestbox-back.gif">
                    </td>
                    <td align="center" background="templates/webmanager/images/guestbox-back.gif">
                        <table border="0" cellpadding="4" cellspacing="0" width="95%">
                            <tr>
                                <td>
                                   <span class="genmed">{topics_list_box.row.MESSAGE}</span>
                                </td>
                            </tr>
                        </table>
                    </td>
				    <td width="8" background="templates/webmanager/images/guestbox-back.gif">
                    </td>
                </tr>
                <tr>
                    <td width="8">
                        <p><img src="templates/webmanager/images/guestbox-bottom3.gif" border="0"></p>
                    </td>
                    <td background="templates/webmanager/images/guestbox-back.gif">
                    </td>
                    <td width="8">
                        <p><img src="templates/webmanager/images/guestbox-bottom4.gif" border="0"></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="3" height="8">
        </td>
    </tr>
<!-- END topic -->
<!-- BEGIN no_topics -->
	<tr> 
		<td class="row1" colspan="3" height="30" align="center" valign="middle"><span class="gen">{topics_list_box.row.L_NO_TOPICS}</span></td>
	</tr>
<!-- END no_topics -->
<!-- BEGIN bottom -->
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