<style type="text/css">
.cf-button {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background-color:#f9f9f9;
	-webkit-border-top-left-radius:5px;
	-moz-border-radius-topleft:5px;
	border-top-left-radius:5px;
	-webkit-border-top-right-radius:5px;
	-moz-border-radius-topright:5px;
	border-top-right-radius:5px;
	-webkit-border-bottom-right-radius:5px;
	-moz-border-radius-bottomright:5px;
	border-bottom-right-radius:5px;
	-webkit-border-bottom-left-radius:5px;
	-moz-border-radius-bottomleft:5px;
	border-bottom-left-radius:5px;
	text-indent:0;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#666666;
	font-family:Arial;
	font-size:12px;
	font-weight:bold;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:200px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #ffffff;
}.cf-button:hover {
	background-color:#e9e9e9;
}.cf-button:active {
	position:relative;
	top:1px;
}</style>

<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="gen">{NAV_CAT_DESC}</span></td>
	</tr>
</table>
<table width="95%" cellspacing="2" border="0" cellpadding="3">
	<tr>
		<td>
			<span class="genmed">{FORUM_DESC}</span>
		</td>
	</tr>
</table>
<table width="95%" cellspacing="2" border="0" cellpadding="2"><form method="post" action="{S_POST_DAYS_ACTION}">
<tr><td align="center" width="100%">
{BOARD_INDEX}
{TOPICS_LIST_BOX}
</td></tr>
</table>
</form>

<table width="95%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr>
	  <td width="100%" align="center"><span class="genmed">{PAGINATION}</span></td>
	</tr>
	<tr>
	  <td width="100%" align="left"><span class="genmed">{POST_IMG}<a href="javascript:void(window.open('{PRINTER_URL}', 'Popup','toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=650, height=600'));"><img src="{PRINTER_IMG}" border="0" alt="{L_PRINTER_TOPIC}" align="middle" /></a></span></td>
	</tr>
	<tr>
	  <td width="100%" align="right"><span class="genmed">{JUMPBOX}</span></td>
	</tr>
	<tr>
	  <td width="100%" align="center"><span class="genmed"><button class="cf-button"><a href="{USER_BAN_LINK}" target="_blank">헬프데스크 신청 금지 페이지로 가기</button></a></span></td>
	</tr>
	<tr>
	  <td width="100%" align="center"><span class="genmed">{S_TOPIC_ADMIN}</span></td>
	</tr>
</table>
<br><br>
