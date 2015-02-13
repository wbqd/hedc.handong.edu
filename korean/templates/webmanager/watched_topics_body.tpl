<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
<!-- BEGIN switch_watched_topics_block -->
<script language="Javascript" type="text/javascript"> 
<!-- 
function setCheckboxes(theForm, elementName, isChecked)
{
    var chkboxes = document.forms[theForm].elements[elementName];
    var count = chkboxes.length;

    if (count) 
	{
        for (var i = 0; i < count; i++) 
		{
            chkboxes[i].checked = isChecked;
    	}
    } 
	else 
	{
    	chkboxes.checked = isChecked;
    } 

    return true;
} 
//--> 
</script> 
<form name="unwatch_form" id="unwatch_form" method="post" action="{S_FORM_ACTION}">
<input type="Hidden" name="mode" value="editprofile" />
<!-- END switch_watched_topics_block -->
<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="genmed"><img src="templates/webmanager/images/arrow-head.gif" border="0" align="absmiddle">&nbsp;Home > {L_WATCHING_LIST}</span></td>
	</tr>
</table>
<table border="0" cellpadding="4" cellspacing="0" width="95%">
<tr>
	<td colspan="11" height="2" bgcolor="#3E98D0"></td>
</tr>
<tr bgcolor="#F5F5F5">
	<td width="15%" align="center" nowrap="nowrap" height="30"><span class="genmed"><b>{L_FORUM}</b></span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td align="center" nowrap="nowrap"><span class="genmed"><b>&nbsp;&nbsp;{L_WATCHED_TOPICS}&nbsp;&nbsp;</b></span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="5%" align="center" nowrap="nowrap"><span class="genmed"><b>&nbsp;&nbsp;{L_REPLIES}&nbsp;&nbsp;</b></span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="15%" align="center" nowrap="nowrap"><span class="genmed"><b>&nbsp;&nbsp;{L_AUTHOR}&nbsp;&nbsp;</b></span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="22%" align="center" nowrap="nowrap" ><span class="genmed"><b>&nbsp;&nbsp;{L_LAST_POST}&nbsp;&nbsp;</b></span></td>
	<td width="1"><span class=menuBorder>|</span></td>
	<td width="5%" align="center" nowrap="nowrap"><span class="genmed"><b>&nbsp;&nbsp;{L_SELECT}&nbsp;&nbsp;</b></span></td>
</tr>
<tr>
	<td colspan="11" height="1" bgcolor="#DADADA"></td>
</tr>
<!-- BEGIN topic_watch_row -->
<tr>
    <td height="27" align="center" nowrap="nowrap"><span class="genmed"><a href="{topic_watch_row.U_FORUM_LINK}" class="genmed">{topic_watch_row.S_FORUM_TITLE}</span></td>
	<td></td>
    <td align="center" nowrap="nowrap"><span class="genmed"><a href="{topic_watch_row.U_WATCHED_TOPIC}" class="genmed">{topic_watch_row.S_WATCHED_TOPIC}</a><br/>{topic_watch_row.GOTO_PAGE}</span></td>
	<td></td>
    <td align="center" nowrap="nowrap"><span class="genmed">{topic_watch_row.S_WATCHED_TOPIC_REPLIES}</span></td>
	<td></td>
    <td align="center" nowrap="nowrap"><span class="genmed">{topic_watch_row.TOPIC_POSTER}</span></td>
	<td></td>
    <td align="center" nowrap="nowrap"><span class="genmed">{topic_watch_row.S_WATCHED_TOPIC_LAST}</span></td>
	<td></td>
    <td align="center" nowrap="nowrap">
        <input type="checkbox" name="unwatch_list[]" value="{topic_watch_row.S_WATCHED_TOPIC_ID}" / class="formstyle3">
    </td>    
</tr>
<tr>
	<td colspan="11" height="1" bgcolor="#DADADA"></td>
</tr>
<!-- END topic_watch_row -->
<!-- BEGIN switch_watched_topics_block -->
<tr bgcolor="#F5F5F5">
    <td colspan="11" align="right" height="29">
        <input type="submit" name="unwatch_topics" class="liteoption" value="{L_STOP_WATCH}" />&nbsp;
    </td>
</tr>
<tr>
	<td colspan="11" height="1" bgcolor="#DADADA"></td>
</tr>
<!-- END switch_watched_topics_block -->
<!-- BEGIN switch_no_watched_topics -->
<tr>
    <td colspan="11" height="29" align="center">
        <span class="genmed">{L_NO_WATCHED_TOPICS}</span>
    </td>
</tr>
<tr>
	<td colspan="11" height="1" bgcolor="#DADADA"></td>
</tr>
<!-- END switch_no_watched_topics -->
</table>
<!-- BEGIN switch_watched_topics_block -->
<table cellspacing="1" cellpadding="2" border="0" width="95%">
<tr>
<td align="right">
    <span class="genmed"><a href="#" onclick="setCheckboxes('unwatch_form', 'unwatch_list[]', true); return false;" class="gensmall"><img src="templates/webmanager/images/icon_allchoice.gif" border="0" alt="{L_MARK_ALL}"></a>&nbsp;&nbsp;<a href="#" onclick="setCheckboxes('unwatch_form', 'unwatch_list[]', false); return false;" class="gensmall"><img src="templates/webmanager/images/icon_choicecancel.gif" border="0" alt="{L_UNMARK_ALL}"></a></span>
    <br/>
<!-- END switch_watched_topics_block -->
    <span class="gensmall"><b>{PAGINATION}</b></span>
<!-- BEGIN switch_watched_topics_block -->
</td>
</tr></table>
</form>
<!-- END switch_watched_topics_block -->
<br><br>