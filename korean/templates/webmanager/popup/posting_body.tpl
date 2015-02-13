
<script type="text/javascript">
  window.onload = function()
  {
	var oFCKeditor = new FCKeditor( 'easyArea' ) ;
	oFCKeditor.ToolbarSet = "Self" ;
	oFCKeditor.Height = "350";	
   <!-- BEGIN switch_admin -->
	oFCKeditor.Config["LinkBrowser"] = true;
	oFCKeditor.Config["ImageBrowser"] = true;
	oFCKeditor.Config["FlashBrowser"] = true;
	oFCKeditor.Config["LinkUpload"] = true;
	oFCKeditor.Config["ImageUpload"] = true;
	oFCKeditor.Config["FlashUpload"] = true;
   <!-- END switch_admin -->

    oFCKeditor.ReplaceTextarea() ;
  }
</script>

<script language="JavaScript" type="text/javascript">
<!--



// Startup variables
var imageTag = false;
var theSelection = false;

// Check for Browser & Platform for PC & IE specific bits
// More details from: http://www.mozilla.org/docs/web-developer/sniffer/browser_type.html
var clientPC = navigator.userAgent.toLowerCase(); // Get client info
var clientVer = parseInt(navigator.appVersion); // Get browser version

var is_ie = ((clientPC.indexOf("msie") != -1) && (clientPC.indexOf("opera") == -1));
var is_nav = ((clientPC.indexOf('mozilla')!=-1) && (clientPC.indexOf('spoofer')==-1)
                && (clientPC.indexOf('compatible') == -1) && (clientPC.indexOf('opera')==-1)
                && (clientPC.indexOf('webtv')==-1) && (clientPC.indexOf('hotjava')==-1));
var is_moz = 0;

var is_win = ((clientPC.indexOf("win")!=-1) || (clientPC.indexOf("16bit") != -1));
var is_mac = (clientPC.indexOf("mac")!=-1);

// Helpline messages
b_help = "{L_BBCODE_B_HELP}";
i_help = "{L_BBCODE_I_HELP}";
u_help = "{L_BBCODE_U_HELP}";
q_help = "{L_BBCODE_Q_HELP}";
c_help = "{L_BBCODE_C_HELP}";
l_help = "{L_BBCODE_L_HELP}";
o_help = "{L_BBCODE_O_HELP}";
p_help = "{L_BBCODE_P_HELP}";
w_help = "{L_BBCODE_W_HELP}";
a_help = "{L_BBCODE_A_HELP}";
s_help = "{L_BBCODE_S_HELP}";
f_help = "{L_BBCODE_F_HELP}";

// Define the bbCode tags
bbcode = new Array();
bbtags = new Array('[b]','[/b]','[i]','[/i]','[u]','[/u]','[quote]','[/quote]','[code]','[/code]','[list]','[/list]','[list=]','[/list]','[img]','[/img]','[url]','[/url]');
imageTag = false;

// Shows the help messages in the helpline window
function helpline(help) {
	document.post.helpbox.value = eval(help + "_help");
}


// Replacement for arrayname.length property
function getarraysize(thearray) {
	for (i = 0; i < thearray.length; i++) {
		if ((thearray[i] == "undefined") || (thearray[i] == "") || (thearray[i] == null))
			return i;
		}
	return thearray.length;
}

// Replacement for arrayname.push(value) not implemented in IE until version 5.5
// Appends element to the array
function arraypush(thearray,value) {
	thearray[ getarraysize(thearray) ] = value;
}

// Replacement for arrayname.pop() not implemented in IE until version 5.5
// Removes and returns the last element of an array
function arraypop(thearray) {
	thearraysize = getarraysize(thearray);
	retval = thearray[thearraysize - 1];
	delete thearray[thearraysize - 1];
	return retval;
}


function delimiterDetect(textbox) {	
	return "";
}

function checkRequired(selectbox) {		
	
	if(selectbox) {		
		if("select-one" == selectbox.type) {							
			if(selectbox.options[selectbox.selectedIndex].value == 'required') {
				return  "{REQUIRED_FIELD}: " + selectbox.options[0].text + "\n";			
			}	
			if(selectbox.options[selectbox.selectedIndex].value == 'ignored') {
				selectbox.options[selectbox.selectedIndex].value = '';			
			}
		}		
	}	
	return "";
}

function checkPassword(passwordbox) {		
	
	if(passwordbox) {		
		if("password" == passwordbox.type) {			
			if(!(passwordbox.value.length == 4 && CheckNum(passwordbox.value))) {
				return "{REQUIRED_PASSWORD}" + "\n";
			}
		}		
	}	
	return "";
}

function go_del() {	

	Error = "";

	Error = checkPassword(document.post.remark15);

	if (Error) {
		alert(Error);
		return false;
	}
	else {		
		self.location.href='{U_DELETE}&remark15=' + document.post.remark15.value;
		return true;
	}
}

function CheckNum(str, allowable) {
	valid = true;
	cmp = "0123456789" + allowable;
	for (i=0; i<str.length; i++) {
		if (cmp.indexOf(str.charAt(i)) < 0) {
			valid = false;
			break;
		}
	}
	return valid;
}

function checkForm() {

	formErrors = "";    
	formErrors2 = "";



	formErrors += checkRequired(document.post.remark1);
	formErrors += checkRequired(document.post.remark2);
	formErrors += checkRequired(document.post.remark3);
	formErrors += checkRequired(document.post.remark4);
	formErrors += checkRequired(document.post.remark5);
	formErrors += checkRequired(document.post.remark6);
	formErrors += checkRequired(document.post.remark7);
	formErrors += checkRequired(document.post.remark8);
	formErrors += checkRequired(document.post.remark9);
	formErrors += checkRequired(document.post.remark10);
	formErrors += checkRequired(document.post.remark11);
	formErrors += checkRequired(document.post.remark12);
	formErrors += checkRequired(document.post.remark13);
	formErrors += checkRequired(document.post.remark14);
	formErrors += checkRequired(document.post.remark15);

	formErrors += checkPassword(document.post.remark15);

	///////////////////////////

	formErrors2 += delimiterDetect(document.post.remark1);
	formErrors2 += delimiterDetect(document.post.remark2);
	formErrors2 += delimiterDetect(document.post.remark3);
	formErrors2 += delimiterDetect(document.post.remark4);
	formErrors2 += delimiterDetect(document.post.remark5);
	formErrors2 += delimiterDetect(document.post.remark6);
	formErrors2 += delimiterDetect(document.post.remark7);
	formErrors2 += delimiterDetect(document.post.remark8);
	formErrors2 += delimiterDetect(document.post.remark9);
	formErrors2 += delimiterDetect(document.post.remark10);
	formErrors2 += delimiterDetect(document.post.remark11);
	formErrors2 += delimiterDetect(document.post.remark12);
	formErrors2 += delimiterDetect(document.post.remark13);
	formErrors2 += delimiterDetect(document.post.remark14);
	formErrors2 += delimiterDetect(document.post.remark15);

	if (formErrors2) {		
		formErrors += "{BANNED_CHAR}: กา\n";
	}

	if (formErrors) {
		alert(formErrors);
		return false;
	} else {		
		return true;		
	}
}


function emoticon(text) {
	var txtarea = document.post.message;
	text = ' ' + text + ' ';
	if (txtarea.createTextRange && txtarea.caretPos) {
		var caretPos = txtarea.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? caretPos.text + text + ' ' : caretPos.text + text;
		txtarea.focus();
	} else {
		txtarea.value  += text;
		txtarea.focus();
	}
}

function bbfontstyle(bbopen, bbclose) {
	var txtarea = document.post.message;

	if ((clientVer >= 4) && is_ie && is_win) {
		theSelection = document.selection.createRange().text;
		if (!theSelection) {
			txtarea.value += bbopen + bbclose;
			txtarea.focus();
			return;
		}
		document.selection.createRange().text = bbopen + theSelection + bbclose;
		txtarea.focus();
		return;
	}
	else if (txtarea.selectionEnd && (txtarea.selectionEnd - txtarea.selectionStart > 0))
	{
		mozWrap(txtarea, bbopen, bbclose);
		return;
	}
	else
	{
		txtarea.value += bbopen + bbclose;
		txtarea.focus();
	}
	storeCaret(txtarea);
}


function bbstyle(bbnumber) {
	var txtarea = document.post.message;

	txtarea.focus();
	donotinsert = false;
	theSelection = false;
	bblast = 0;

	if (bbnumber == -1) { // Close all open tags & default button names
		while (bbcode[0]) {
			butnumber = arraypop(bbcode) - 1;
			txtarea.value += bbtags[butnumber + 1];
			buttext = eval('document.post.addbbcode' + butnumber + '.value');
			eval('document.post.addbbcode' + butnumber + '.value ="' + buttext.substr(0,(buttext.length - 1)) + '"');
		}
		imageTag = false; // All tags are closed including image tags :D
		txtarea.focus();
		return;
	}

	if ((clientVer >= 4) && is_ie && is_win)
	{
		theSelection = document.selection.createRange().text; // Get text selection
		if (theSelection) {
			// Add tags around selection
			document.selection.createRange().text = bbtags[bbnumber] + theSelection + bbtags[bbnumber+1];
			txtarea.focus();
			theSelection = '';
			return;
		}
	}
	else if (txtarea.selectionEnd && (txtarea.selectionEnd - txtarea.selectionStart > 0))
	{
		mozWrap(txtarea, bbtags[bbnumber], bbtags[bbnumber+1]);
		return;
	}
	
	// Find last occurance of an open tag the same as the one just clicked
	for (i = 0; i < bbcode.length; i++) {
		if (bbcode[i] == bbnumber+1) {
			bblast = i;
			donotinsert = true;
		}
	}

	if (donotinsert) {		// Close all open tags up to the one just clicked & default button names
		while (bbcode[bblast]) {
				butnumber = arraypop(bbcode) - 1;
				txtarea.value += bbtags[butnumber + 1];
				buttext = eval('document.post.addbbcode' + butnumber + '.value');
				eval('document.post.addbbcode' + butnumber + '.value ="' + buttext.substr(0,(buttext.length - 1)) + '"');
				imageTag = false;
			}
			txtarea.focus();
			return;
	} else { // Open tags
	
		if (imageTag && (bbnumber != 14)) {		// Close image tag before adding another
			txtarea.value += bbtags[15];
			lastValue = arraypop(bbcode) - 1;	// Remove the close image tag from the list
			document.post.addbbcode14.value = "Img";	// Return button back to normal state
			imageTag = false;
		}
		
		// Open tag
		txtarea.value += bbtags[bbnumber];
		if ((bbnumber == 14) && (imageTag == false)) imageTag = 1; // Check to stop additional tags after an unclosed image tag
		arraypush(bbcode,bbnumber+1);
		eval('document.post.addbbcode'+bbnumber+'.value += "*"');
		txtarea.focus();
		return;
	}
	storeCaret(txtarea);
}

// From http://www.massless.org/mozedit/
function mozWrap(txtarea, open, close)
{
	var selLength = txtarea.textLength;
	var selStart = txtarea.selectionStart;
	var selEnd = txtarea.selectionEnd;
	if (selEnd == 1 || selEnd == 2) 
		selEnd = selLength;

	var s1 = (txtarea.value).substring(0,selStart);
	var s2 = (txtarea.value).substring(selStart, selEnd)
	var s3 = (txtarea.value).substring(selEnd, selLength);
	txtarea.value = s1 + open + s2 + close + s3;
	return;
}

// Insert at Claret position. Code from
// http://www.faqts.com/knowledge_base/view.phtml/aid/1052/fid/130
function storeCaret(textEl) {
	if (textEl.createTextRange) textEl.caretPos = document.selection.createRange().duplicate();
}

//-->
</script>
<script language="JavaScript">
<!--
function namosw_goto(url, targetstr)
{
  if (url == 'backward')
    history.back(1);
  else if (url == 'forward')
    history.forward(1);
  else {
     if (targetstr == 'blank') {
       window.open(url, 'win1');
     } else {
       var frameobj;
       if (targetstr == '') targetstr = 'self';
       if ((frameobj = eval(targetstr)) != null)
         frameobj.location = url;
     }
  }
}

// -->
</script>

<form action="{S_POST_ACTION}" method="post" name="post" onsubmit="return checkForm(this)" {S_FORM_ENCTYPE}>
<table width="100%" cellspacing="2" cellpadding="2" border="0">
		<tr> 
		<td align="left" valign="middle" width="100%"><b><span class="gen"><font color="#000000">&raquo; {FORUM_NAME}</font></span></b><br><br></td>
		</tr>
</table>
{ERROR_BOX}

<table border="0" cellpadding="3" cellspacing="0" width="95%">
	<tr> 
		<td colspan="3" height="2" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#b3b3b3"></td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- BEGIN switch_username_select -->
	<tr> 
		<td width="20%" height="30">&nbsp;<span class=menuTitle>{MENU_LANG_AUTHOR}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="80%"><span class="genmed"><input type="text" class="formstyle4" name="username" size="25" maxlength="25" value="{USERNAME}" /></span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- END switch_username_select -->
	<!-- BEGIN switch_privmsg -->
	<tr> 
		<td width="20%" height="30">&nbsp;<span class=menuTitle>{MENU_LANG_ID}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td width="80%"><span class="genmed"><input type="text"  class="formstyle4" name="username" maxlength="25" size="25" value="{USERNAME}" />&nbsp;<input type="submit" name="usersubmit" value="{L_FIND_USERNAME}" class="liteoption" onClick="window.open('{U_SEARCH_USER}', '_phpbbsearch', 'HEIGHT=180,resizable=yes,WIDTH=400');return false;" /></span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- END switch_privmsg -->
	<tr> 
		<td width="20%" height="30" valign="top">&nbsp;<span class=menuTitle>{MENU_LANG_TITLE}</span></td>
		<td width="1" valign="top"><span class=menuBorder>|</span></td>
		<td width="80%" valign="top"><span class="genmed"> 
			<input type="text" name="subject" size="68" maxlength="130" class="formstyle4" value="{SUBJECT}" /></span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td width="20%" height="30" valign="top">&nbsp;<span class=menuTitle>{MENU_LANG_HIDE}</span></td>
		<td width="1" valign="top"><span class=menuBorder>|</span></td>
		<td width="80%" valign="top"><span class="genmed">
			<select name="remark1" size="1">
				<option value="0">{MENU_LANG_YES}
				<option value="1">{MENU_LANG_NO}
			</select>
			</span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td width="20%" height="30" valign="top">&nbsp;<span class=menuTitle>{MENU_LANG_SIZE}</span></td>
		<td width="1" valign="top"><span class=menuBorder>|</span></td>
		<td width="80%" valign="top"><span class="genmed"> 
			{MENU_LANG_WIDTH}: <input type="text" name="remark2" size="5" maxlength="5" class="formstyle4" value="{REMARK2}" />   &nbsp;&nbsp;&nbsp;{MENU_LANG_HEIGHT}: <input type="text" name="remark3" size="5" maxlength="5" class="formstyle4" value="{REMARK3}" />  </span></span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td width="20%" height="30" valign="top">&nbsp;<span class=menuTitle>{MENU_LANG_POSITION}</span></td>
		<td width="1" valign="top"><span class=menuBorder>|</span></td>
		<td width="80%" valign="top"><span class="genmed"> 
			X: <input type="text" name="remark4" size="5" maxlength="5" class="formstyle4" value="{REMARK4}" />    &nbsp;&nbsp;&nbsp;Y: <input type="text" name="remark5" size="5" maxlength="5" class="formstyle4" value="{REMARK5}" />  </span></span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td width="20%" height="30" valign="top">&nbsp;<span class=menuTitle>{MENU_LANG_MARGIN}</span></td>
		<td width="1" valign="top"><span class=menuBorder>|</span></td>
		<td width="80%" valign="top"><span class="genmed"> 
			{MENU_LANG_TOP}: <select name="remark6" size="1">
				<option value="0">0
				<option value="1">1
				<option value="2">2
				<option value="3">3
				<option value="4">4
				<option value="5">5
				<option value="6">6
				<option value="7">7
				<option value="8">8
				<option value="9">9
				<option value="10">10
				<option value="11">11
				<option value="12">12
				<option value="13">13
				<option value="14">14
				<option value="15">15
				<option value="16">16
				<option value="17">17
				<option value="18">18
				<option value="19">19
				<option value="20">20
				<option value="21">21
				<option value="22">22
				<option value="23">23
				<option value="24">24
				<option value="25">25
				<option value="26">26
				<option value="27">27
				<option value="28">28
				<option value="29">29
				<option value="30">30
			</select>
			
			&nbsp;&nbsp;&nbsp;{MENU_LANG_LEFT}: <select name="remark7" size="1">
				<option value="0">0
				<option value="1">1
				<option value="2">2
				<option value="3">3
				<option value="4">4
				<option value="5">5
				<option value="6">6
				<option value="7">7
				<option value="8">8
				<option value="9">9
				<option value="10">10
				<option value="11">11
				<option value="12">12
				<option value="13">13
				<option value="14">14
				<option value="15">15
				<option value="16">16
				<option value="17">17
				<option value="18">18
				<option value="19">19
				<option value="20">20
				<option value="21">21
				<option value="22">22
				<option value="23">23
				<option value="24">24
				<option value="25">25
				<option value="26">26
				<option value="27">27
				<option value="28">28
				<option value="29">29
				<option value="30">30
			</select>
			</span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td width="20%" height="30" valign="top">&nbsp;<span class=menuTitle>{MENU_LANG_SCROLLBARS}</span></td>
		<td width="1" valign="top"><span class=menuBorder>|</span></td>
		<td width="80%" valign="top"><span class="genmed">
			<select name="remark8" size="1">
				<option value="no">{MENU_LANG_NO}
				<option value="yes">{MENU_LANG_YES}				
			</select>
			</span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td width="20%" height="30" valign="top">&nbsp;<span class=menuTitle>{MENU_LANG_RESIZABLE}</span></td>
		<td width="1" valign="top"><span class=menuBorder>|</span></td>
		<td width="80%" valign="top"><span class="genmed">
			<select name="remark9" size="1">
				<option value="no">{MENU_LANG_NO}
				<option value="yes">{MENU_LANG_YES}		
			</select>
			</span></td>
	</tr>
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" valign="top">
						<textarea id='easyArea' name="message" rows="26" cols="87" wrap="virtual" class="formstyle4" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);">{MESSAGE}</textarea>
		</td>
	</tr>
	<tr> 
		<td colspan="3" height="5"></td>
	</tr>
	{ATTACHBOX}
	<!-- BEGIN switch_password -->
	<tr> 
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="30">&nbsp;<span class=menuTitle>{MENU_LANG_PASS}</span></td>
		<td width="1"><span class=menuBorder>|</span></td>
		<td valign="top"><input type="password" class="formstyle4" style="width200px"  name="remark15" size="4" maxlength="4" value="" />
		</td>
	</tr>
	<!-- END switch_password -->
	<tr>
		<td colspan="3" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#b3b3b3"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td colspan="3" height="5">
		</td>
	</tr>
	<tr> 
		<td colspan="3" align="center" height="28"> {S_HIDDEN_FORM_FIELDS}<input type="submit" accesskey="s" tabindex="6" name="post" class="mainoption" value="{L_SUBMIT}" />&nbsp;<input type="button" tabindex="5" name="button" class="mainoption" value="{L_CANCEL}" OnClick="document.location.replace('{U_VIEW_FORUM}')"/>
		<!-- BEGIN switch_del_btn -->
		{DEL_BUTTON}
		<!-- END switch_del_btn -->
		</td>
	</tr>
</table>

<table width="95%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
	  <td align="right" valign="top"></td>
	</tr>
  </table>
  <input type="hidden" name="afterPostURL" value="{U_VIEW_FORUM}">
  <input type="hidden" name="afterPostMsg" value="{MENU_LANG_SUCCESS_UPDATE}">
  <input type="hidden" name="afterPostSeconds" value="2">  
</form>

<br><br>
<script language="JavaScript" type="text/javascript">
<!--	

function remarkSaved(remark, savedRemark) {

	if(remark) {			

		if("select-one" == remark.type) {				
			for(i=0;i<remark.length;i++) {
				if(savedRemark == remark.options[i].value) {
					remark.options[i].selected = true;					
				}
			}
		}	
		else if("checkbox" == remark.type) {							
			if(savedRemark == "on") {
				remark.checked = true;					
			}
		}	
		else {				
			if ((remark[0]) && "radio" == remark[0].type) {
				for(i=0;i<remark.length;i++) {
					if(savedRemark == remark[i].value) {
						remark[i].checked = true;					
					}
				}
			}
		}		
	}	
}

	remarkSaved(document.post.remark1, "{REMARK1}");
	remarkSaved(document.post.remark2, "{REMARK2}");
	remarkSaved(document.post.remark3, "{REMARK3}");
	remarkSaved(document.post.remark4, "{REMARK4}");
	remarkSaved(document.post.remark5, "{REMARK5}");
	remarkSaved(document.post.remark6, "{REMARK6}");
	remarkSaved(document.post.remark7, "{REMARK7}");
	remarkSaved(document.post.remark8, "{REMARK8}");
	remarkSaved(document.post.remark9, "{REMARK9}");
	remarkSaved(document.post.remark10, "{REMARK10}");
	remarkSaved(document.post.remark11, "{REMARK11}");
	remarkSaved(document.post.remark12, "{REMARK12}");
	remarkSaved(document.post.remark13, "{REMARK13}");
	remarkSaved(document.post.remark14, "{REMARK14}");
	remarkSaved(document.post.remark15, "{REMARK15}");
-->
</script>