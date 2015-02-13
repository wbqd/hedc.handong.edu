<script language="JavaScript" type="text/javascript">
<!--	
function checkForm() {

	formErrors = "";    	

	if (formErrors) {
		alert(formErrors);
		return false;
	} else {
		editor._textArea.value = editor.getHTML();
		return true;		
	}
}
-->
</script>

<div class="maintitle"><center>{L_CONFIGURATION_TITLE}</center></div>
<br />
<div class="genmed">{L_CONFIGURATION_EXPLAIN}</div>
<br />
<form action="{S_CONFIG_ACTION}" method="post" onsubmit="return checkForm(this)">
<table width="99%" cellpadding="3" cellspacing="1" border="0" align="center" class="forumline">
<tr> 
<th colspan="2">{L_GENERAL_SETTINGS}</th>
</tr>
<tr> 
<td class="row1" width="38%"><b>{L_WELCOME_TEXT}</b><br />
<span class="gensmall">{L_WELCOME_TEXT_EXPLAIN}</span></td>
<td class="row2" width="62%"><textarea 
<input type="text" maxlength="9999" size="40" name="welcome_text" value=" name="board_msg" rows="10" cols="45">{WELCOME_TEXT}</textarea>
</td>
</tr>
<tr> 
<td class="row1" width="38%"><b>{L_HTML_AREA}</b></td>
<td class="row2" width="62%">
<textarea id="easyArea" 
<input type="text" maxlength="9999" size="40" name="html_area" value=" name="board_msg" rows="35" cols="60">{HTML_AREA}</textarea>
</td>
</tr>
<tr> 
<td class="row1" width="38%"><b>{L_NUMBER_OF_NEWS}</b><br><br></td>
<td class="row2" width="62%"> 
<input type="text" maxlength="255" size="40" name="number_of_news" value="{NUMBER_OF_NEWS}" class="post" />
</td>
</tr>
<tr> 
<td class="row1" width="38%"><b><br><br>{L_NEWS_LENGTH}</b><br><br></td>
<td class="row2" width="62%"> 
<input type="text" maxlength="255" size="40" name="news_length" value="{NEWS_LENGTH}" class="post" />
</td>
</tr>
<tr> 
<td class="row1" width="38%"><b>{L_NEWS_FORUM}</b><br><br><span class="gensmall"><br>*<u>{L_COMMA}</u>*<br></td>
<td class="row2" width="62%"> 
<input type="text" maxlength="255" size="40" name="news_forum" value="{NEWS_FORUM}" class="post" />
</td>
</tr>
<tr> 
<td class="row1" width="38%"><b><br>{L_POLL_FORUM}</b><br><br><span class="gensmall"><br>*<u>{L_COMMA}</u>*</td>
<td class="row2" width="62%"> 
<input type="text" maxlength="255" size="40" name="poll_forum" value="{POLL_FORUM}" class="post" />
</td>
</tr>
<tr> 
<td class="row1" width="38%"><b><br>{L_NUMBER_RECENT_TOPICS}</b><br><br></td>
<td class="row2" width="62%"> 
<input type="text" maxlength="255" size="40" name="number_recent_topics" value="{NUMBER_RECENT_TOPICS}" class="post" />
</td>
</tr>
<tr> 
<td class="row1" width="38%"><b><br>{L_EXCEPTIONAL_FORUMS}</b><br><br><span class="gensmall"><br>*<u>{L_COMMA}</u>*<br></td>
<td class="row2" width="62%"> 
<input type="text" maxlength="255" size="40" name="exceptional_forums" value="{EXCEPTIONAL_FORUMS}" class="post" />
</td>
</tr>
<tr> 
<td class="row1" width="38%"><b><br>{L_ALBUM_CAT}</b><br><br></td>
<td class="row2" width="62%"> 
<input type="text" maxlength="255" size="40" name="pic_category" value="{PIC_CATEGORY}" class="post" />
</td>
</tr>
<tr> 
<td class="row1" width="38%"><b><br>{L_BANNER_FORUM}</b><br><br></td>
<td class="row2" width="62%"> 
<input type="text" maxlength="255" size="40" name="banner_forum" value="{BANNER_FORUM}" class="post" />
</td>
</tr>
<tr> 
<td class="row1" width="38%"><b><br>{L_POPUP_BOARD}</b><br><br></td>
<td class="row2" width="62%"> 
<input type="text" maxlength="255" size="10" name="popup_board" value="{POPUP_BOARD}" class="post" />&nbsp;[ {L_POPUP_HEIGHT} <input type="text" maxlength="3" size="3" name="popup_height" value="{POPUP_HEIGHT}" class="post" /> X {L_POPUP_WIDTH} <input type="text" maxlength="3" size="3" name="popup_width" value="{POPUP_WIDTH}" class="post" /> ]
<br>- {L_POPUP_BOARD_USE} :<input class="formstyle3" type="radio" name="popup_board_use" value="1" {POPUP_BOARD_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="popup_board_use" value="0" {POPUP_BOARD_NO} /> {L_NO}
</td>
</tr>

<tr> 
<td class="cat" colspan="2" align="center">{S_HIDDEN_FIELDS}<br><br> 
<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />
&nbsp;&nbsp; 
<input type="reset" value="{L_RESET}" class="button" />
</td>
</tr>
</table>
</form>
<br clear="all" />