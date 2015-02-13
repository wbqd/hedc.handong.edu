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
<form method="post" action="{S_POST_DAYS_ACTION}">
<table width="95%" cellspacing="2" border="0" cellpadding="2">
<tr><td align="center" width="100%">
{BOARD_INDEX}


<object width="650" height="1250"
classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
codebase="http://fpdownload.macromedia.com/
pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0">
<param name="SRC" value="/itemPool/lectureFeedback.swf">
<embed src="/itemPool/lectureFeedback.swf" width="650" height="1250">
</embed>
</object> 


<!--script language="JavaScript" type="text/javascript">
<!--

var requiredMajorVersion = 9;
// Minor version of Flash required
var requiredMinorVersion = 0;
// Minor version of Flash required
var requiredRevision = 124;

// Version check for the Flash Player that has the ability to start Player Product Install (6.0r65)
var hasProductInstall = DetectFlashVer(6, 0, 65);

// Version check based upon the values defined in globals
var hasRequestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);

if ( hasProductInstall && !hasRequestedVersion ) {
	// DO NOT MODIFY THE FOLLOWING FOUR LINES
	// Location visited after installation is complete if installation is required
	var MMPlayerType = (isIE == true) ? "ActiveX" : "PlugIn";
	var MMredirectURL = window.location;
    document.title = document.title.slice(0, 47) + " - Flash Player Installation";
    var MMdoctitle = document.title;

	AC_FL_RunContent(
		"src", "playerProductInstall",
		"FlashVars", "MMredirectURL="+MMredirectURL+'&MMplayerType='+MMPlayerType+'&MMdoctitle='+MMdoctitle+"",
		"width", "650",
		"height", "1250",
		"align", "middle",
		"id", "itemPool",
		"quality", "high",
		"bgcolor", "#869ca7",
		"name", "itemPool",
		"allowScriptAccess","sameDomain",
		"type", "application/x-shockwave-flash",
		"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
} else if (hasRequestedVersion) {
	// if we've detected an acceptable version
	// embed the Flash Content SWF when all tests are passed
	AC_FL_RunContent(
			"src", "/itemPool/lectureFeedback",
			"FlashVars", "",
			"width", "650",
			"height", "1250",
			"align", "middle",
			"id", "itemPool",
			"quality", "high",
			"bgcolor", "#869ca7",
			"name", "itemPool",
			"allowScriptAccess","sameDomain",
			"type", "application/x-shockwave-flash",
			"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
  } else {  // flash is too old or we can't detect the plugin
    var alternateContent = 'Alternate HTML content should be placed here. '
  	+ 'This content requires the Adobe Flash Player. '
   	+ '<a href=http://www.adobe.com/go/getflash/>Get Flash</a>';
    document.write(alternateContent);  // insert non-flash content
  }
// -->
</script>
<noscript>
  	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
			id="itemPool" width="650" height="1250"
			codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
			<param name="movie" value="/itemPool/lectureFeedback.swf" />
			<param name="FlashVars" value="modelNo={MODEL_NO}" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#869ca7" />
			<param name="allowScriptAccess" value="sameDomain" />
			<embed src="/itemPool/lectureFeedback.swf" quality="high" bgcolor="#869ca7"
				width="650" height="1250" name="itemPool" align="middle"
				play="true"
				FlashVars= ""
				loop="false"
				quality="high"
				allowScriptAccess="sameDomain"
				type="application/x-shockwave-flash"
				pluginspage="http://www.adobe.com/go/getflashplayer">
			</embed>
	</object>
</noscript>


</td></tr>
</table>
</form>

<table width="95%" cellspacing="2" border="0" align="center" cellpadding="2">

	<tr>
	  <td width="100%" align="right"><span class="genmed">{JUMPBOX}</span></td>
	</tr>
	<tr>
	  <td width="100%" align="center"><span class="genmed">&nbsp;</span></td>
	</tr>

</table>
<br><br>