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



<style type="text/css">
<!--

/* For Slideshow Photo Album Mod */
.imageborder { color: {T_FONTCOLOR1}; border-color: {T_FONTCOLOR1}; }



/* General page style. The scroll bar colours only visible in IE5.5+ */
body { 
	background-color: white;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	scrollbar-face-color: #EFEFEF;
	scrollbar-highlight-color: #FFFFFF;
	scrollbar-shadow-color: #EFEFEF;
	scrollbar-3dlight-color: #EBEBEB;
	scrollbar-arrow-color:  #A6A6A6;
	scrollbar-track-color: #FAFAFA;
	scrollbar-darkshadow-color: #DADADA;
}

/* General font families for common tags */
p, td		{ font-size : {T_FONTSIZE2}; color : #646464; }
a:link,a:active,a:visited { color : #A6A6A6; text-decoration: none;}
a:hover		{ text-decoration: none; color : #000000; }
hr	{ height: 0px; border: solid #EBEBEB 0px; border-top-width: 1px;}


/* This is the border line & background colour round the entire page */
.bodyline	{ background-color: #FFFFFF; border: 1px #DADADA solid; }

/* This is the outline round the main forum tables */
.forumline	{ background-color: #FFFFFF; border: 1px #CDCDCD solid; }


/* Main table cell colours and backgrounds */
table { font-size : {T_FONTSIZE2}px;}
td.row1	{ background-color: #FAFAFA; }
td.row2	{ background-color: #EFEFEF; }
td.row3	{ background-color: #EBEBEB; }


/*
  This is for the table cell above the Topics, Post & Last posts on the index.php page
  By default this is the fading out gradiated silver background.
  However, you could replace this with a bitmap specific for each forum
*/
td.rowpic {
		background-color: #FFFFFF;
		background-repeat: repeat-y;
}

/* Header cells - the blue and silver gradient backgrounds */
th	{
	color: #000000; font-size: {T_FONTSIZE2}px; font-weight : bold; 
	background-color: #E3E3E3; height: 25px;
}

td.cat,td.catHead,td.catSides,td.catLeft,td.catRight,td.catBottom {
			background-color:#EBEBEB; border: {T_TH_COLOR3}; border-style: solid; height: 28px;
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
	font-weight: bold; border: #FFFFFF; border-style: solid; height: 28px; }
td.row3Right,td.spaceRow {
	background-color: #EBEBEB; border: {T_TH_COLOR3}; border-style: solid; }

th.thHead,td.catHead { font-size: {T_FONTSIZE3}px; border-width: 1px 1px 0px 1px; }
th.thSides,td.catSides,td.spaceRow	 { border-width: 0px 1px 0px 1px; }
th.thRight,td.catRight,td.row3Right	 { border-width: 0px 1px 0px 0px; }
th.thLeft,td.catLeft	  { border-width: 0px 0px 0px 1px; }
th.thBottom,td.catBottom  { border-width: 0px 1px 1px 1px; }
th.thTop	 { border-width: 1px 0px 0px 0px; }
th.thCornerL { border-width: 1px 0px 0px 1px; }
th.thCornerR { border-width: 1px 1px 0px 0px; }


/* The largest text used in the index page title and toptic title etc. */
.maintitle	{
			font-weight: bold; font-size: 22px; font-family: "{T_FONTFACE2}",{T_FONTFACE1};
			text-decoration: none; line-height : 120%; color : #646464;
}


/* General text */
.gen { font-size : {T_FONTSIZE2}px; }
.genmed { font-size : {T_FONTSIZE2}px; }
.gensmall { font-size : {T_FONTSIZE1}px; }
.gen,.genmed,.gensmall { color : #646464; }
a.gen,a.genmed,a.gensmall { color: #A6A6A6; text-decoration: none; }
a.gen:hover,a.genmed:hover,a.gensmall:hover	{ color: #000000; text-decoration: none; }

.menuTitle { font-size : {T_FONTSIZE2}px; }
.menuTitle { color : #000000; }
a.menuTitle { color: #000000; text-decoration: none; }
a.menuTitle:hover { color: #000000; text-decoration: none; }

.menuBorder { font-size : {T_FONTSIZE2}px; }
.menuBorder { color : #808080; }
a.menuBorder { color: #808080; text-decoration: none; }
a.menuBorder:hover { color: #000000; text-decoration: none; }

/* The register, login, search etc links at the top of the page */
.mainmenu		{ font-size : {T_FONTSIZE2}px; color : #646464 }
a.mainmenu		{ text-decoration: none; color : #A6A6A6;  }
a.mainmenu:hover{ text-decoration: none; color : #000000; }


/* Forum category titles */
.cattitle		{ font-weight: bold; font-size: {T_FONTSIZE3}px ; letter-spacing: 1px; color : #646464}
a.cattitle		{ text-decoration: none; color : #A6A6A6; }
a.cattitle:hover{ text-decoration: none; }


/* Forum title: Text and link to the forums used in: index.php */
.forumlink		{ font-weight: bold; font-size: {T_FONTSIZE3}px; color : #A6A6A6; }
a.forumlink 	{ text-decoration: none; color : #A6A6A6; }
a.forumlink:hover{ text-decoration: none; color : #000000; }


/* Used for the navigation text, (Page 1,2,3 etc) and the navigation bar when in a forum */
.nav			{ font-weight: bold; font-size: {T_FONTSIZE2}px; color : #646464;}
a.nav			{ text-decoration: none; color : #A6A6A6; }
a.nav:hover		{ text-decoration: none; }

/* titles for the topics: could specify viewed link colour too */
.topictitle,h1,h2	{ font-weight: bold; font-size: {T_FONTSIZE2}px; }
a.topictitle:link   { text-decoration: none; }
a.topictitle:visited { text-decoration: none; }
a.topictitle:hover	{ text-decoration: none; }

/* Name of poster in viewmsg.php and viewtopic.php and other places */
.name			{ font-size : {T_FONTSIZE2}px; color : #646464;}

/* Location, number of posts, post date etc */
.postdetails		{ font-size : {T_FONTSIZE1}px; color : #646464; }


/* The content of the posts (body of text) */
.postbody { font-size : {T_FONTSIZE3}px; line-height: 18px}
a.postlink:link	{ text-decoration: none; color : #A6A6A6 }
a.postlink:visited { text-decoration: none; color : #A6A6A6; }
a.postlink:hover { text-decoration: none; color : #000000}


/* Quote & Code blocks */
.code { 
	font-family: {T_FONTFACE3}; font-size: {T_FONTSIZE2}px; color: {T_FONTCOLOR2};
	background-color: #FAFAFA; border: #EBEBEB; border-style: solid;
	border-left-width: 1px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px
}

.quote {
	font-family: {T_FONTFACE1}; font-size: {T_FONTSIZE2}px; color: {T_FONTCOLOR1}; line-height: 125%;
	background-color: #FAFAFA; border: #EBEBEB; border-style: solid;
	border-left-width: 1px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px
}


/* Copyright and bottom info */
.copyright		{ font-size: {T_FONTSIZE1}px; font-family: {T_FONTFACE1}; color: {T_FONTCOLOR1}; letter-spacing: -1px;}
a.copyright		{ color: {T_FONTCOLOR1}; text-decoration: none;}
a.copyright:hover { color: #646464; text-decoration: none;}

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
	cursor: hand;
}

/* The main submit button option */
input.mainoption {
	background-color : {T_TD_COLOR1};
	font-weight : bold;
	cursor: hand;
}

/* None-bold submit button */
input.liteoption {
	background-color : {T_TD_COLOR1};
	font-weight : normal;
	cursor: hand;
}


/* This is the line in the posting page which shows the rollover
  help line. This is actually a text box, but if set to be the same
  colour as the background no one will know ;)
*/
.helpline { background-color: #EFEFEF; border-style: none; }

/* Import the fancy styles for IE only (NS4.x doesn't use the @import function) */
@import url("templates/webmanager/formIE.css"); 
-->
</style>
<link rel="stylesheet" href="templates/webmanager/{T_HEAD_STYLESHEET}" type="text/css">

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
<body {MOUSE_PROTECTION} text="{T_BODY_TEXT}" link="{T_BODY_LINK}" vlink="{T_BODY_VLINK}" topmargin="0" marginheight="0" leftmargin="10" >
<a name="top"></a>
<center>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center">
		<br>