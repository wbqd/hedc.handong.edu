<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="{S_CONTENT_DIRECTION}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset={S_CONTENT_ENCODING}">
<meta http-equiv="Content-Style-Type" content="text/css">
{META}
{NAV_LINKS}
<title>{SITENAME} :: {PAGE_TITLE}</title>


<script type="text/javascript" src="/{L_EDITOR_FULL_LANG}/htmleditor/fckeditor.js"></script>


<OBJECT height='1' id='MsgrObj' width='1'></OBJECT>
<script>
function DoInstantMessage(person,screen)
{
	//Check if person has messenger installed
	try{MsgrObj.classid="clsid:B69003B3-C55E-4B48-836C-BC5946FC3B28";}
	catch(e){if(!(e.number && 2148139390) == 2148139390)return;}
	
	//Check if you are logged in
	if(MsgrObj.MyStatus == 1)
	{
		alert("You are not logged into Messenger.\nYou must login to Messenger before continuing.");
		return;
	}
	
	//Check if person is already in contact list
	try{var contact = MsgrObj.GetContact(person,"");}
	catch(e)
	{
		if((e.number && 2164261642) == 2164261642) //MSGR_E_USER_NOT_FOUND
		{
			if(confirm("Add "+screen+" to your contact list?")==true)MsgrObj.AddContact(0,person);
		}
	}
	
	//Ask to send an instant message
	if(confirm("Send "+screen+" an instant message?")==true)MsgrObj.InstantMessage(person);
}
</script>


<!-- link rel="stylesheet" href="templates/webmanager/{T_HEAD_STYLESHEET}" type="text/css" -->
<style type="text/css">
<!--

/* For Slideshow Photo Album Mod */
.imageborder { color: {T_FONTCOLOR1}; border-color: {T_FONTCOLOR1}; }



/* General page style. The scroll bar colours only visible in IE5.5+ */
body { 
	background-color: #c6deef;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	scrollbar-face-color: {T_TR_COLOR2};
	scrollbar-highlight-color: {T_TD_COLOR2};
	scrollbar-shadow-color: {T_TR_COLOR2};
	scrollbar-3dlight-color: {T_TR_COLOR3};
	scrollbar-arrow-color:  {T_BODY_LINK};
	scrollbar-track-color: {T_TR_COLOR1};
	scrollbar-darkshadow-color: {T_TH_COLOR1};
}

/* General font families for common tags */
a:link,a:active,a:visited { color : {T_BODY_LINK}; text-decoration: none;}
a:hover		{ text-decoration: none; color : #000000; }
hr	{ height: 0px; border: solid {T_TR_COLOR3} 0px; border-top-width: 1px;}

/* This is the border line & background colour round the entire page */
.bodyline	{ background-color: {T_TD_COLOR2}; border: 1px {T_TH_COLOR1} solid; }

/* This is the outline round the main forum tables */
.forumline	{ background-color: {T_TD_COLOR2}; border: 1px {T_TH_COLOR2} solid; }

/* This is the outline round the main calendar tables */
.calendar	{ font-size: {T_FONTSIZE2}px; color : {T_BODY_TEXT};}
a.calendar:link   { text-decoration: none; color : #000000; }
a.calendar:visited   { text-decoration: none; color : #000000; }
a.calendar:hover	{ text-decoration: none; color : #000000; }

/* Main table cell colours and backgrounds */
table { font-size : {T_FONTSIZE2}px;}
td.row1	{ background-color: {T_TR_COLOR1}; }
td.row2	{ background-color: {T_TR_COLOR2}; }
td.row3	{ background-color: {T_TR_COLOR3}; }

/*
  This is for the table cell above the Topics, Post & Last posts on the index.php page
  By default this is the fading out gradiated silver background.
  However, you could replace this with a bitmap specific for each forum
*/
td.rowpic {
		background-color: {T_TD_COLOR2};
		background-image: url(templates/webmanager/images/{T_TH_CLASS3});
		background-repeat: repeat-y;
}

/* Header cells - the blue and silver gradient backgrounds */
th	{
	color: {T_FONTCOLOR1}; font-size: {T_FONTSIZE2}px; font-weight : bold; 
	background-color: {T_BODY_LINK}; height: 25px;
	background-image: url(templates/webmanager/images/{T_TH_CLASS2});
}

td.cat,td.catHead,td.catSides,td.catLeft,td.catRight,td.catBottom {
			background-image: url(templates/webmanager/images/{T_TH_CLASS1});
			background-color:{T_TR_COLOR3}; border: {T_TH_COLOR3}; border-style: solid; height: 28px;
}

/*
  Setting additional nice inner borders for the main table cells.
  The names indicate which sides the border will be on.
  Don't worry if you don't understand this, just ignore it :-)
*/
td.cat,td.catHead,td.catBottom {
	height: 29px;
	border-width: 0px 0px 0px 0px;
}
th.thHead,th.thSides,th.thTop,th.thLeft,th.thRight,th.thBottom,th.thCornerL,th.thCornerR {
	font-weight: bold; border: {T_TD_COLOR2}; border-style: solid; height: 28px;
}
td.row3Right,td.spaceRow {
	background-color: {T_TR_COLOR3}; border: {T_TH_COLOR3}; border-style: solid;
}

th.thHead,td.catHead { font-size: {T_FONTSIZE3}px; border-width: 0px 0px 0px 0px; }
th.thSides,td.catSides,td.spaceRow	 { border-width: 0px 0px 0px 0px; }
th.thRight,td.catRight,td.row3Right	 { border-width: 0px 0px 0px 0px; }
th.thLeft,td.catLeft	  { border-width: 0px 0px 0px 0px; }
th.thBottom,td.catBottom  { border-width: 0px 0px 0px 0px; }
th.thTop	 { border-width: 0px 0px 0px 0px; }
th.thCornerL { border-width: 0px 0px 0px 0px; }
th.thCornerR { border-width: 0px 0px 0px 0px; }

/* The largest text used in the index page title and toptic title etc. */
.maintitle	{
	font-weight: bold; font-size: 22px; font-family: "{T_FONTFACE2}",{T_FONTFACE1};
	text-decoration: none; line-height : 120%; color : {T_BODY_TEXT};
}

/* General text */
.gen { font-size : {T_FONTSIZE2}px; }
.genmed { font-size : {T_FONTSIZE2}px; }
.gensmall { font-size : {T_FONTSIZE1}px; }
.gen,.genmed,.gensmall { color : {T_BODY_TEXT}; }
a.gen,a.genmed,a.gensmall { color: {T_BODY_LINK}; text-decoration: none; }
a.gen:hover,a.genmed:hover,a.gensmall:hover	{ color: #000000; text-decoration: none; }

.menuTitle { font-size : {T_FONTSIZE2}px; }
.menuTitle { color : #{THEME_COLOR_100}; }
a.menuTitle { color: #{THEME_COLOR_100}; text-decoration: none; }
a.menuTitle:hover { color: #000000; text-decoration: none; }

.menuBorder { font-size : {T_FONTSIZE2}px; }
.menuBorder { color : #{THEME_COLOR_50}; }
a.menuBorder { color: #{THEME_COLOR_50}; text-decoration: none; }
a.menuBorder:hover { color: #000000; text-decoration: none; }

/* special link text */
.link { font-size : {T_FONTSIZE2}px; color : #FFFFFF;}
a.link { color: #FFFFFF; text-decoration: none; }
a.link:hover	{ color: #000000; text-decoration: none; }
a.link:visited	{ color: #FFFFFF; text-decoration: none; }

/* submenu */
.submenu { font-size : {T_FONTSIZE2}px; color : 8eb7d3;}
a.submenu { color: 8eb7d3; text-decoration: none; }
a.submenu:visited	{ color: 8eb7d3; text-decoration: none; }
a.submenu:hover	{ color: #214880; text-decoration: none; }

/* submenu2 */
.submenu2 { font-size : {T_FONTSIZE2}px; color : #5e8fba;}
a.submenu2 { color: #5e8fba; text-decoration: none; }
a.submenu2:visited	{ color: #5e8fba; text-decoration: none; }
a.submenu2:hover	{ font-weight: bold; color: #285ead; text-decoration: none; }

/* The register, login, search etc links at the top of the page */
.mainmenu		{ font-size : {T_FONTSIZE2}px; color : {T_BODY_TEXT} }
a.mainmenu		{ text-decoration: none; color : {T_BODY_LINK};  }
a.mainmenu:hover{ text-decoration: none; color : #000000; }

/* The login, statics, memberlist etc links at the top of the page */
.topmenu		{ font-family:verdana; font-size : 9px; color : #aaaaaa;}
a.topmenu		{ text-decoration: none; color : #aaaaaa; }
a.topmenu:hover{ text-decoration: none; color : #aaaaaa; }
a.topmenu:visited{ text-decoration: none; color : #aaaaaa; }


/* event-day */
.eventday		{ font-size : {T_FONTSIZE2}px; color : FFFFFF; }
a.eventday		{ text-decoration: none; color : {T_BODY_HLINK};  }
a.eventday:hover{ text-decoration: none; color : #000000 }
a.eventday:visited{ text-decoration: none; color : {T_BODY_HLINK} }


/* Forum category titles */
.cattitle		{ font-weight: bold; font-size: {T_FONTSIZE3}px ; letter-spacing: 1px; color : {T_BODY_LINK}}
a.cattitle		{ text-decoration: none; color : {T_BODY_LINK}; }
a.cattitle:hover{ text-decoration: none; }

/* Forum title: Text and link to the forums used in: index.php */
.forumlink		{ font-weight: bold; font-size: {T_FONTSIZE3}px; color : {T_BODY_LINK}; }
a.forumlink 	{ text-decoration: none; color : {T_BODY_LINK}; }
a.forumlink:hover{ text-decoration: none; color : #000000; }

/* Used for the navigation text, (Page 1,2,3 etc) and the navigation bar when in a forum */
.nav			{ font-weight: bold; font-size: {T_FONTSIZE2}px; color : {T_BODY_TEXT};}
a.nav			{ text-decoration: none; color : {T_BODY_LINK}; }
a.nav:hover		{ text-decoration: none; }

/* titles for the topics: could specify viewed link colour too */
.topictitle,h1,h2	{ font-weight: bold; font-size: {T_FONTSIZE2}px; color : {T_BODY_TEXT}; }
a.topictitle:link   { text-decoration: none; color : {T_BODY_LINK}; }
a.topictitle:visited { text-decoration: none; color : {T_BODY_VLINK}; }
a.topictitle:hover	{ text-decoration: none; color : #000000; }

/* Name of poster in viewmsg.php and viewtopic.php and other places */
.name			{ font-size : {T_FONTSIZE2}px; color : {T_BODY_TEXT};}

/* Location, number of posts, post date etc */
.postdetails		{ font-size : {T_FONTSIZE1}px; color : {T_BODY_TEXT}; }

/* The content of the posts (body of text) */
.postbody { font-size : {T_FONTSIZE3}px; line-height: 18px}
a.postlink:link	{ text-decoration: none; color : {T_BODY_LINK} }
a.postlink:visited { text-decoration: none; color : {T_BODY_VLINK}; }
a.postlink:hover { text-decoration: none; color : #000000}

/* Quote & Code blocks */
.code { 
	font-family: {T_FONTFACE3}; font-size: {T_FONTSIZE2}px; color: {T_FONTCOLOR2};
	background-color: {T_TD_COLOR1}; border: {T_TR_COLOR3}; border-style: solid;
	border-left-width: 1px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px
}

.quote {
	font-family: {T_FONTFACE1}; font-size: {T_FONTSIZE2}px; color: {T_FONTCOLOR1}; line-height: 125%;
	background-color: {T_TD_COLOR1}; border: {T_TR_COLOR3}; border-style: solid;
	border-left-width: 1px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px
}

/* calendar color */
.today {
	font-family: {T_FONTFACE1}; font-size: {T_FONTSIZE2}px; color: #F5989D; line-height: 125%;
	background-color: #FCF5F5; border: #F1C1C1; border-style: solid;
	border-left-width: 1px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px
}

/* Special code */
.specialcode { font-size : {T_FONTSIZE2}px; color : F26522; }

/* Copyright and bottom info */
.copyright		{ font-size: {T_FONTSIZE2}px; font-family: {T_FONTFACE1}; color: #8E8E8E; letter-spacing: -1px;}
a.copyright		{ color: {T_FONTCOLOR2}; text-decoration: none;}
a.copyright:hover { color: #000000; text-decoration: none;}

/* Rollover */
a.rollover img { border-width:0px; display:block; }
a.rollover img.rollover { display:none; }
a.rollover:hover { }
a.rollover:hover img { display:none; }
a.rollover:hover img.rollover { display:block; }


/* Form elements */
input,textarea, select {
	color : {T_BODY_TEXT};
	font: normal {T_FONTSIZE2}px {T_FONTFACE1};
	border-color : {T_TD_COLOR3};
	border-style : solid;
	border-width : 1px;
}

/* Form style */
.formstyle { border-color: E2DFDA; border-style: solid;	border-width: 1px
}

/* Form style1 */
.formstyle1 { border-color: FFFFFF; border-style: solid;	border-width: 1px
}


/* Form style2 */
.formstyle2 { border-color: F9F9F9; border-style: none;	border-width: 0px
}

/* Form style3 */
.formstyle3 { border-color: {T_BODY_BGCOLOR}; border-style: none;	border-width: 0px
}

/* Form style4 */
.formstyle4 { border-color: D7D7D7; border-style: solid;	background-color : F7F7F7; border-width: 1px
}


/* The text input fields background colour */
input.post, textarea.post, select {
	background-color : {T_TD_COLOR2};
	border-color: CCCCCC; 
	border-style: solid;	
	border-width: 1px
}

input { text-indent : 2px; border-color: CCCCCC; border-style: solid;	border-width: 1px }


/* The buttons used for bbCode styling in message post */
input.button {
	background-color : {T_TR_COLOR1};
	color : {T_BODY_TEXT};
	font-size: {T_FONTSIZE2}px; font-family: {T_FONTFACE1};
	padding-top:2;
	cursor: hand;
}

/* The main submit button option */
input.mainoption {
	background-color : {T_TD_COLOR1};
	font-weight : bold;
	padding-top:2;
	cursor: hand;
}

/* None-bold submit button */
input.liteoption {
	background-color : {T_TD_COLOR1};
	font-weight : normal;
	padding-top:2;
	cursor: hand;
}

/* This is the line in the posting page which shows the rollover
  help line. This is actually a text box, but if set to be the same
  colour as the background no one will know ;)
*/
.helpline { background-color: {T_TR_COLOR2}; border-style: none; }

/* Import the fancy styles for IE only (NS4.x doesn't use the @import function) */
@import url("templates/webmanager/formIE.css"); 
-->
</style>

<script language="JavaScript" type="text/javascript" src="includes/toggle_display.js"></script>
<!-- BEGIN switch_enable_pm_popup -->
<script language="Javascript" type="text/javascript">
<!--
	if ( {PRIVATE_MESSAGE_NEW_FLAG} )
	{
		window.open('{U_PRIVATEMSGS_POPUP}', '_phpbbprivmsg', 'HEIGHT=200,resizable=yes,WIDTH=300');;
	}
//-->
</script>
<!-- END switch_enable_pm_popup -->



<script language="JavaScript" type="text/javascript">
		  <!--
		  function checkSearch()
		  {
				return true;		
		  }
		  function checkLogin()
		  {
				return true;		
		  }

		  //-->
</script>
<script language="JavaScript">
<!--
function na_restore_img_src(name, nsdoc)
{
  var img = eval((navigator.appName.indexOf('Netscape', 0) != -1) ? nsdoc+'.'+name : 'document.all.'+name);
  if (name == '')
    return;
  if (img && img.altsrc) {
    img.src    = img.altsrc;
    img.altsrc = null;
  } 
}

function na_preload_img()
{ 
  var img_list = na_preload_img.arguments;
  if (document.preloadlist == null) 
    document.preloadlist = new Array();
  var top = document.preloadlist.length;
  for (var i=0; i < img_list.length; i++) {
    document.preloadlist[top+i]     = new Image;
    document.preloadlist[top+i].src = img_list[i+1];
  } 
}

function na_change_img_src(name, nsdoc, rpath, preload)
{ 
  var img = eval((navigator.appName.indexOf('Netscape', 0) != -1) ? nsdoc+'.'+name : 'document.all.'+name);
  if (name == '')
    return;
  if (img) {
    img.altsrc = img.src;
    img.src    = rpath;
  } 
}

// -->
</script>

</head>
<body {MOUSE_PROTECTION} text="{T_BODY_TEXT}" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" OnLoad="na_preload_img(false, {PRELOAD_IMG_LIST});">
<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" background="templates/webmanager/images/bg_sub.jpg" style="background-repeat:repeat-x;">
    <tr>
        <td align="center" valign="top">
		<table border="0" width="925" height="100%" cellspacing="0" cellpadding="0" align="center">
		    <tr>
				<td height="25"></td>
		    </tr>
		    <tr>
				<td height="25" background="templates/webmanager/images/bg_top.jpg" align="right">
					<table border="0" height="25" cellspacing="0" cellpadding="0">
						<tr>
							<td width="22"><img src="templates/webmanager/images/top_left.jpg" width="22" height="25" border="0"></td>
							<td background="templates/webmanager/images/top_body.jpg">
								<table border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td height="11"></td>
									</tr>
									<tr>
										<td class="topmenu">{QBARS}
										<!-- BEGIN switch_user_logged_in -->
										/&nbsp;<a href="search.php?search_author={PROFILE_NAME}">MY PAGE</a>
										<!-- END switch_user_logged_in -->
										</td>
										<td width="35"></td>
									</tr>
								</table>
							</td>
							<td width="53"><img src="templates/webmanager/images/top_right.jpg" width="53" height="25" border="0"></td>
						</tr>
					</table>
				</td>
		    </tr>
		    <tr>
				<td height="61">
					<table border="0" width="925" height="61" cellspacing="0" cellpadding="0">
						<tr>
							<td width="220" rowspan="2" height="61"><a href="{U_PORTAL}" onfocus='this.blur()'><img src="templates/webmanager/images/logo.jpg" width="220" height="61" border="0"></a></td>
							<td width="705" height="15"><img src="templates/webmanager/images/gap_topmenu.jpg" width="705" height="15"></td>
						</tr>
						<tr>
							<td width="705" height="46" bgcolor="white" align="right"><table border="0" cellspacing="0" cellpadding="0"><tr><td width="29" height="46"><img src="templates/webmanager/images/menu_left.jpg" width="29" height="46"></td><td>{QMENUS}</td><td width="24"><img src="templates/webmanager/images/menu_right.jpg" width="24" height="46"></td></tr></table></td>
						</tr>
					</table>
				</td>
		    </tr>
		    <tr>
				<td height="8"><img src="templates/webmanager/images/gap_menu.jpg" width="925" height="8" border="0"></td>
		    </tr>
		    <tr>
				<td height="145"><table border="0" height="145" cellspacing="0" cellpadding="0"><tr><td width="225"><img src="templates/webmanager/images/title_image_sub6.jpg" width="225" height="145" border="0"></td><td width="700"><img src="templates/webmanager/images/image_sub6.jpg" width="700" height="145" border="0"></td></tr></table></td>
		    </tr>
		    <tr>
				<td height="10"><img src="templates/webmanager/images/gap_image.jpg" width="925" height="10" border="0"></td>
		    </tr>
		    <tr>
				<td height="46"><img src="templates/webmanager/images/title_sub6.jpg" width="925" height="46" border="0"></td>
		    </tr>
		    <tr>
				<td valign="top" align="center" height="100%">
			    <table border="0" width="925" cellspacing="0" cellpadding="0" height="100%">
					<tr>
						<td width="220" valign="top" align="center" bgcolor="#FFFFFF">
							<table border="0" width="220" cellspacing="0" cellpadding="0" height="100%">
								<tr>
									<td align="center" valign="top">
										<table border="0" width="180" cellspacing="0" cellpadding="0" background="0">
											<tr>
												<td height="6"></td>
											</tr>
											<tr>
												<td height="12" align="right" valign="top">
													<!-- BEGIN switch_admin_only -->
															<table border="0" cellspacing="0" cellpadding="0" width="100%">
																<tr>
																	<td height="6"></td>
																</tr>
																<tr>
																	<td align="right">
																	<a href="javascript:void(window.open('admin/popframe.php?url={EDIT_URL_ENCODED}', 'AdminMenu','toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=670, height=700'));"><img src="templates/webmanager/images/bt_edit.gif" width="22" height="11" border="0"></a>
																	<a href="javascript:void(window.open('admin/popframe.php?url={AUTH_URL_ENCODED}', 'AdminMenu','toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=670, height=700'));"><img src="templates/webmanager/images/bt_auth.gif" width="26" height="11" border="0"></a>
																	</td>
																</tr>
																<tr>
																	<td height="3"></td>
																</tr>
															</table>
													<!-- END switch_admin_only -->
												</td>
											</tr>
											<tr>
												<td valign="top" align="center">
													<table border="0" width="180" cellspacing="0" cellpadding="0">
														<tr>
															<td height="4" colspan="2"></td>
														</tr>
													<!-- BEGIN sub_menu -->
														<tr>
															<td width="19" valign="top" align="left"><img src="templates/webmanager/images/bullet_submenu.jpg" width="11" height="10" border="0" vspace="1"></td>
															<td width="161" valign="top" align="left"><b><a href="{sub_menu.SUB_MENU_URL}" class="submenu2">{sub_menu.SUB_MENU_NAME}</a></b></td>
														</tr>
														<tr>
															<td height="6" colspan="2"></td>
														</tr>
														<tr>
															<td height="1" colspan="2"  bgcolor="#e7ebf1"></td>
														</tr>
													<!-- BEGIN switch_second -->
														<tr>
															<td colspan="2">
															<table border="0" cellpadding="0" cellspacing="0" width="100%">
																<tr>
																	<td height="8" colspan="2"></td>
																</tr>
															<!-- BEGIN second_menu -->
																<tr>
																	<td width="20" align="right" class="submenu2" valign="top">&nbsp;&nbsp;</td>
																	<td align="left" width="160"><a href="{sub_menu.switch_second.second_menu.SUB2_MENU_URL}" class="submenu2" style="font-size:8pt; font-family:µ¸¿ò;">{sub_menu.switch_second.second_menu.SUB2_MENU_NAME}</a></td>
																</tr>
																<tr>
																	<td height="2" colspan="2"></td>
																</tr>
															<!-- END second_menu -->
															</table>
															</td>
														</tr>
														<tr>
															<td height="5" colspan="2"></td>
														</tr>
														<tr>
															<td height="1" colspan="2"  bgcolor="#e7ebf1"></td>
														</tr>
														<!-- END switch_second -->
														<tr>
															<td height="8" colspan="2"></td>
														</tr>
														<!-- END sub_menu -->
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td height="20"></td>
								</tr>
								<tr>
									<td height="100%"></td>
								</tr>
								<tr>
									<form name="search_block" method="post" action="{U_SEARCH}" onSubmit="return checkSearch()">
									<td height="140" background="templates/webmanager/images/bg_search.jpg" valign="top" align="center">
										<table border="0" cellspacing="0" cellpadding="0">
											<tr>
											<td colspan="3" height="67"></td>
											</tr>
											<tr>
											<td><input class="formstyle" type="text" name="search_keywords" size="20" style="height : 21; color:rgb(0,0,0); background-color:rgb(255,255,255); padding-top:3; border-width:1; border-color:rgb(57,124,175); border-style:solid;"></td>
											<td width="2"></td>
											<td width="17" valign="middle"><input type="image" class="formstyle3" src="templates/webmanager/images/search_go.jpg" align="absmiddle" border="0"><input type="hidden" name="search_fields" value="all"><input type="hidden" name="show_results" value="posts"></td>
											</tr>
											<tr>
											<td colspan="3" height="10"></td>
											</tr>
											<tr>
											<td colspan="3" height="8"><a href="{U_SEARCH}" class="genmed"><img src="templates/webmanager/images/button_advanced.jpg" width="104" height="8" border="0"></a></td>
											</tr>
										</table>
									</td>
									</form>
								</tr>
							</table>
						</td>
						<td width="7" valign="top"></td>
						<td width="698" valign="top" align="center" bgcolor="white">
							<table border="0" width="698" cellspacing="0" cellpadding="0" height="100%">
								<tr>
									<td align="center" valign="top">
										<table border="0" width="98%" cellspacing="0" cellpadding="0">
											<tr>
												<td height="5"></td>
											</tr>
											<tr>
												<td align="center" valign="top">