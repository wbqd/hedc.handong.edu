<form name="form1" method="get" action="{FORM_ACTION}">
<table width="60%" cellpadding="1" cellspacing="1" border="0" align="center">
  <tr>
        <td align="center"><span class="genmed">{L_SHOWING} <b>{MSG}</b></span></td>
  </tr>
  <tr>
        <td align="center"><span class="gensmall">{L_SHOW}
                                                  [ <a href="{FORM_ACTION}?selorder=lweek" class="mainmenu">{L_LWEEK_MSG}</a> ]
                                                  [ <a href="{FORM_ACTION}?selorder=yestr" class="mainmenu">{L_YESTR_MSG}</a> ]
                                                  [ <a href="{FORM_ACTION}?selorder=las24" class="mainmenu">{L_LAS24_MSG}</a> ]
                                                  [ <a href="{FORM_ACTION}?selorder=today" class="mainmenu">{L_TODAY_MSG}</a> ]
                                                  [ {L_LAST}
                                                        <input type="text" name="nodays" size="2" value="{NODAYS}" maxlength="3" class="post">
                                                        <input type="hidden" name="selorder" value="laday">
                                                        <a href="javascript:document.form1.submit();" class="mainmenu">{L_DAYS}</a> ]</td>
  </tr>
</table>
</form>

<table width="100%" cellpadding="1" cellspacing="1" border="0" align="center">
  <tr>
        <td><span class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a></span></td>
  </tr>
</table>

<table width="100%" cellpadding="1" cellspacing="1" border="0" align="center" class="forumline">
  <tr>
        <th colspan="6">{L_RECENT_TITLE}</th>
  </tr>
  <!-- BEGIN recent -->
  <tr> 
        <td class="{recent.ROW_CLASS}" align="center" valign="middle">{recent.TOPIC_FOLDER_IMG}</td>
        <td class="{recent.ROW_CLASS}"><span class="topictitle">{recent.NEWEST_IMG}{recent.TOPIC_TYPE}<a href="{recent.U_VIEW_TOPIC}" class="topictitle">{recent.TOPIC_TITLE}</a></span>
                                       <font size="-6">{recent.GOTO_PAGE}<br />{recent.L_STARTED} {recent.FIRST_TIME}</font></td>
        <td class="{recent.ROW_CLASS}" align="right"><span class="postdetails">{recent.REPLIES} {recent.L_REPLIES}&nbsp;&nbsp;
                                                       <br />{recent.VIEWS} {recent.L_VIEWS}</span>&nbsp;&nbsp;</td>
        <td class="{recent.ROW_CLASS}">&nbsp;&nbsp;<a href="{recent.U_VIEW_FORUM}" class="genmed">{recent.FORUM_NAME}</td>
        <td class="{recent.ROW_CLASS}" align="right" valign="middle" nowrap="nowrap"><span class="gensmall"> {recent.LAST_URL} {recent.LAST_TIME}&nbsp;&nbsp;
                                                       <br />{recent.LAST_AUTHOR}</span>&nbsp;&nbsp;</td>
  </tr>
  <!-- END recent -->
</table>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tr> 
        <td><span class="nav">{PAGE_NUMBER}</span></td>
        <td align="right"><span class="nav">{PAGINATION}</span></td>
  </tr>
  <tr> 
        <td colspan="2"><span class="nav">{TOTAL}</span></td>
  </tr>
</table>
