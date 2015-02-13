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
	background-color: white;
	font-family: '³ª´®°íµñ', nanumgothic, µ¸¿ò, Verdana, Arial, Helvetica, sans-serif;
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
.calendar	{ font-family: '³ª´®°íµñ', nanumgothic; font-size: 15px; color : #787878;}
a.calendar:link   { text-decoration: none; color : #787878; }
a.calendar:visited   { text-decoration: none; color : #787878; }
a.calendar:hover	{ text-decoration: none; color : #787878; }

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
.submenu { font-size : 12px; color : #555555;}
a.submenu { color: #555555; text-decoration: none; }
a.submenu:visited	{ color: #555555; text-decoration: none; }
a.submenu:hover	{ color: #2a62c1; text-decoration: none; }

/* submenu2 */
.submenu2 { font-size : 13px; color : #6a6a6a;}
a.submenu2 { color: #6a6a6a; text-decoration: none; }
a.submenu2:visited	{ color: #6a6a6a; text-decoration: none; }
a.submenu2:hover	{ font-weight: bold; color: #39a2c4; text-decoration: none; }

/* submenu3 */
.submenu3 { font-size : 11px; color : #999999;}
a.submenu3 { color: #999999; text-decoration: none; }
a.submenu3:visited	{ color: #999999; text-decoration: none; }
a.submenu3:hover	{ font-weight: bold; color: #39a2c4; text-decoration: none; }

/* The register, login, search etc links at the top of the page */
.mainmenu		{ font-size : {T_FONTSIZE2}px; color : {T_BODY_TEXT} }
a.mainmenu		{ text-decoration: none; color : {T_BODY_LINK};  }
a.mainmenu:hover{ text-decoration: none; color : #000000; }

/* The login, statics, memberlist etc links at the top of the page */
.topmenu  { font-family:'³ª´®°íµñ', nanumgothic, arial; font-size : 11px; color : #69655c;}
a.topmenu		{ text-decoration: none; color : #69655c; }
a.topmenu:hover{ text-decoration: none; color : #69655c; }
a.topmenu:visited{ text-decoration: none; color : #69655c; }


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
	font-family: '³ª´®°íµñ', nanumgothic; font-size: 15px; color: #FFFFFF; line-height: 125%;
	background-color: #00abde; border: #F6F5F5; border-style: solid;
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
<table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0">
    <tr>
        <td valign="top" height="100%">
            <table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="102" bgcolor="#EAEAEA">&nbsp;</td>
                </tr>
                <tr>
                    <td background="templates/webmanager/images/bg_pattern_left.jpg" style="background-position:top right;">&nbsp;</td>
                </tr>
            </table>
        </td>
        <td width="1114" height="100%" valign="top" align="center">
			<table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0">
				<tr>
					<td width="47" valign="top" height="100%">
			            <table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0">
			                <tr>
			                    <td height="102" bgcolor="#EAEAEA"></td>
			                </tr>
			                <tr>
			                    <td width="47" height="45"><img src="templates/webmanager/images/bg_menu_left.jpg" width="47" height="45" border="0"></td>
			                </tr>
			                <tr>
			                    <td width="47" background="templates/webmanager/images/margin_pattern_left.jpg" height="100%">&nbsp;</td>
			                </tr>
			            </table>				
					</td>
					<td width="1020" height="100%" valign="top">					
			            <table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0">
			                <tr>
			                    <td height="87" bgcolor="#EAEAEA">
			                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
			                            <tr>
			                                <td width="284" rowspan="4"><a href="{U_PORTAL}" onfocus='this.blur()'><img src="templates/webmanager/images/logo.jpg" width="284" height="87" border="0"></a></td>
			                                <td height="12"></td>
			                            </tr>
			                            <tr>
			                                <td align="right">
												<table border="0" cellspacing="0" cellpadding="0">
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
			                            </tr>
			                            <tr>
			                                <td height="8"></td>
			                            </tr>
			                            <tr>
											<form name="search_block" method="post" action="{U_SEARCH}" onSubmit="return checkSearch()">
			                                <td align="right" valign="top">
			                                    <table border="0" cellspacing="0" cellpadding="0" background="templates/webmanager/images/search_body.jpg">
			                                        <tr>
														<td width="13"><img src="templates/webmanager/images/search_left.jpg" width="13" height="27" border="0"></td>
			                                            <td width="165"><input class="formstyle" type="text" name="search_keywords" size="19" style="font-family: '³ª´®°íµñ', nanumgothic, µ¸¿ò; color:rgb(168,168,168); border-style:none; height:16px; width: 160px; padding-top:0; background-image:url('templates/webmanager/images/img_search.jpg'); background-repeat:no-repeat; background-position:left;  padding-top:0;" onFocus="this.style.background='#ffffff'"></td>
			                                            <td width="27"><input type="image" class="formstyle3" src="templates/webmanager/images/button_search.jpg" align="absmiddle" border="0"><input type="hidden" name="search_fields" value="all"><input type="hidden" name="show_results" value="posts"></td>
			                                            <td width="30" bgcolor="#EAEAEA"></td>
			                                        </tr>
			                                    </table>
			                                </td>
											</form>
			                            </tr>
			                        </table>
			                    </td>
			                </tr>
			                <tr>
			                    <td height="45" bgcolor="#82c1c8"><table border="0" cellspacing="0" cellpadding="0"><tr><td width="48"><img src="templates/webmanager/images/menu_margin_left.jpg" width="48" height="45" border="0"></td><td>{QMENUS}</td><td width="42"><img src="templates/webmanager/images/menu_margin_right.jpg" width="42" height="45" border="0"></td></tr></table></td>
			                </tr>
			                <tr>
			                    <td height="232"><img src="templates/webmanager/images/image_sub3.jpg" width="1020" height="232" border="0"></td>
			                </tr>
							<tr>
								<td height="25"></td>
							</tr>
			                <tr>
			                    <td height="100%" valign="top">
									<table border="0" width="1020" cellspacing="0" cellpadding="0">
										<tr>
											<td width="24"></td>
											<td width="200" valign="top" align="center">
												<table border="0" width="200" cellspacing="0" cellpadding="0">
													<tr>
														<td height="71" background="templates/webmanager/images/title_sub3.jpg" align="right" valign="top">
															<!-- BEGIN switch_admin_only -->
															<table border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td height="5" colspan="3"></td>
																</tr>
																<tr>
																	<td align="right">
																	<a href="javascript:void(window.open('admin/popframe.php?url={EDIT_URL_ENCODED}', 'AdminMenu','toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=670, height=700'));"><img src="templates/webmanager/images/bt_edit.gif" width="22" height="11" border="0"></a>
																	<a href="javascript:void(window.open('admin/popframe.php?url={AUTH_URL_ENCODED}', 'AdminMenu','toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=670, height=700'));"><img src="templates/webmanager/images/bt_auth.gif" width="26" height="11" border="0"></a>
																	</td>
																	<td width="5"></td>
																</tr>
															</table>
															<!-- END switch_admin_only -->
														</td>
													</tr>
													<tr>
														<td valign="top" align="center" background="templates/webmanager/images/bg_submenu.jpg">
															<table border="0" width="178" cellspacing="0" cellpadding="0" height="100%">
																<tr>
																	<td height="28" colspan="3"></td>
																</tr>
																<!-- BEGIN sub_menu -->
																<tr>
																	<td width="8"></td>
																	<td width="153" align="left" valign="top"><span class="genmed"><a href="{sub_menu.SUB_MENU_URL}" class="submenu2">{sub_menu.SUB_MENU_NAME}</a></span></td>
																	<td width="17" align="center" valign="top"><img src="templates/webmanager/images/bullet_submenu.jpg" width="7" height="7" vspace="4"></td>
																</tr>
																<tr>
																	<td height="7" colspan="3"></td>
																</tr>
																<tr>
																	<td height="1" colspan="3" bgcolor="#ebebeb"></td>
																</tr>
																<tr>
																	<td height="8" colspan="3"></td>
																</tr>
																<!-- BEGIN switch_second -->
																<tr>
																	<td height="3" colspan="3"></td>
																</tr>
																<tr>
																	<td colspan="3">
																	<table  border="0" cellpadding="0" cellspacing="0" width="100%">
																	<!-- BEGIN second_menu -->
																		<tr>
																			<td width="8"></td>
																			<td width="10" class="submenu3" align="center" valign="top">-&nbsp;</td>
																			<td align="left" valign="top" width="143"><a href="{sub_menu.switch_second.second_menu.SUB2_MENU_URL}" class="submenu3">{sub_menu.switch_second.second_menu.SUB2_MENU_NAME}</a></td>
																		</tr>
																		<tr>
																			<td height="5" colspan="3"></td>
																		</tr>
																	<!-- END second_menu -->
																	</table>
																	</td>
																</tr>
																<tr>
																	<td height="2" colspan="3"></td>
																</tr>
																<tr>
																	<td height="1" colspan="3" bgcolor="#ebebeb"></td>
																</tr>
																<tr>
																	<td height="8" colspan="3"></td>
																</tr>
																<!-- END switch_second -->
																<tr>
																	<td height="2" colspan="3"></td>
																</tr>
																<!-- END sub_menu -->
																<tr>
																	<td height="30" colspan="3"></td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td height="2"><img src="templates/webmanager/images/submenu_bottom.jpg" width="200" height="2" border="0"></td>
													</tr>
												</table>
											</td>
											<td width="791" valign="top" align="center">
												<table border="0" width="100%" cellspacing="0" cellpadding="0">
													<tr>
														<td height="28" align="center"><img src="templates/webmanager/images/con_title_sub3.jpg" width="727" height="28" border="0"></td>
													</tr>
													<tr>
														<td height="5"></td>
													</tr>
													<tr>
														<td valign="top" align="center">
															<table border="0" width="98%" cellspacing="0" cellpadding="0">
																<tr>
																	<td valign="top" align="center">