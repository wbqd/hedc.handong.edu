
<script type="text/javascript">
  window.onload = function()
  {
	//var oFCKeditor = new FCKeditor( 'easyArea' ) ;
	//oFCKeditor.ToolbarSet = "Self" ;
	//oFCKeditor.Height = "350";	
   <!-- BEGIN switch_admin -->
//	oFCKeditor.Config["LinkBrowser"] = true;
//	oFCKeditor.Config["ImageBrowser"] = true;
//	oFCKeditor.Config["FlashBrowser"] = true;
//	oFCKeditor.Config["LinkUpload"] = true;
//	oFCKeditor.Config["ImageUpload"] = true;
//	oFCKeditor.Config["FlashUpload"] = true;
   <!-- END switch_admin -->
    //oFCKeditor.ReplaceTextarea() ;
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

<script type="text/javascript">

function View(color) {                  // preview color
  //document.getElementById("ColorPreview").style.backgroundColor = '#' + color;  
}

function Set(string) {                   // select color
  var color = ValidateColor(string);
  if (color == null) { alert("Invalid color code: " + string); }        // invalid color
  else {                                                                // valid color
	document.getElementById("ColorPreview").style.backgroundColor = '#' + color;  
    document.getElementById("ColorHex").value = color;
  }
}


function ValidateColor(string) {                // return valid color code
  string = string || '';
  string = string + "";
  string = string.toUpperCase();
  var chars = '0123456789ABCDEF';
  var out   = '';

  for (var i=0; i<string.length; i++) {             // remove invalid color chars
    var schar = string.charAt(i);
    if (chars.indexOf(schar) != -1) { out += schar; }
  }

  if (out.length != 6) { return null; }            // check length
  return out;
}

</script>


<form action="{S_POST_ACTION}" method="post" name="post" onsubmit="return checkForm(this)" {S_FORM_ENCTYPE}>
<table width="100%" cellspacing="2" cellpadding="2" border="0">
		<tr> 
		<td align="left" valign="middle" width="100%"><b><span class="gen"><font color="#000000">&raquo; {FORUM_NAME}</font></span></b><br><br></td>
		</tr>
</table>
{ERROR_BOX}

<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
		<td align="left"></td>
	</tr>
</table>

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
	<input type="hidden" name="subject" size="50" maxlength="130"  value="{SUBJECT}" />
	<tr> 
		<td width="20%" height="30" valign="top">&nbsp;<span class=menuTitle>{MENU_LANG_MENUCOLOR}</span></td>
		<td width="1" valign="top"><span class=menuBorder>|</span></td>
		<td width="80%" valign="top"><span class="genmed"> 
			</span>
<table border="0px" cellspacing="0px" cellpadding="4" width="200">
 <tr>
  <td style="background:buttonface" valign=center><div style="background-color: #000000; padding: 1; height: 21px; width: 50px"><div id="ColorPreview" style="height: 100%; width: 100%"></div></div></td>
  <td style="background:buttonface" valign=center><input type="text" name="remark2"
    id="ColorHex" value="{REMARK2}" size=15 maxlength="100" style="font-size: 12px"></td>
  <td style="background:buttonface" width=100%></td>
 </tr>
</table>

<table border="0" cellspacing="1px" cellpadding="0px" width="200" bgcolor="#000000" style="cursor: hand;">
<tr>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#003300 onMouseOver=View('003300') onClick=Set('003300') height="10px" width="10px"></td>
<td bgcolor=#006600 onMouseOver=View('006600') onClick=Set('006600') height="10px" width="10px"></td>
<td bgcolor=#009900 onMouseOver=View('009900') onClick=Set('009900') height="10px" width="10px"></td>
<td bgcolor=#00CC00 onMouseOver=View('00CC00') onClick=Set('00CC00') height="10px" width="10px"></td>
<td bgcolor=#00FF00 onMouseOver=View('00FF00') onClick=Set('00FF00') height="10px" width="10px"></td>
<td bgcolor=#330000 onMouseOver=View('330000') onClick=Set('330000') height="10px" width="10px"></td>
<td bgcolor=#333300 onMouseOver=View('333300') onClick=Set('333300') height="10px" width="10px"></td>
<td bgcolor=#336600 onMouseOver=View('336600') onClick=Set('336600') height="10px" width="10px"></td>
<td bgcolor=#339900 onMouseOver=View('339900') onClick=Set('339900') height="10px" width="10px"></td>
<td bgcolor=#33CC00 onMouseOver=View('33CC00') onClick=Set('33CC00') height="10px" width="10px"></td>
<td bgcolor=#33FF00 onMouseOver=View('33FF00') onClick=Set('33FF00') height="10px" width="10px"></td>
<td bgcolor=#660000 onMouseOver=View('660000') onClick=Set('660000') height="10px" width="10px"></td>
<td bgcolor=#663300 onMouseOver=View('663300') onClick=Set('663300') height="10px" width="10px"></td>
<td bgcolor=#666600 onMouseOver=View('666600') onClick=Set('666600') height="10px" width="10px"></td>
<td bgcolor=#669900 onMouseOver=View('669900') onClick=Set('669900') height="10px" width="10px"></td>
<td bgcolor=#66CC00 onMouseOver=View('66CC00') onClick=Set('66CC00') height="10px" width="10px"></td>
<td bgcolor=#66FF00 onMouseOver=View('66FF00') onClick=Set('66FF00') height="10px" width="10px"></td>
</tr>
<tr>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#333333 onMouseOver=View('333333') onClick=Set('333333') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#000033 onMouseOver=View('000033') onClick=Set('000033') height="10px" width="10px"></td>
<td bgcolor=#003333 onMouseOver=View('003333') onClick=Set('003333') height="10px" width="10px"></td>
<td bgcolor=#006633 onMouseOver=View('006633') onClick=Set('006633') height="10px" width="10px"></td>
<td bgcolor=#009933 onMouseOver=View('009933') onClick=Set('009933') height="10px" width="10px"></td>
<td bgcolor=#00CC33 onMouseOver=View('00CC33') onClick=Set('00CC33') height="10px" width="10px"></td>
<td bgcolor=#00FF33 onMouseOver=View('00FF33') onClick=Set('00FF33') height="10px" width="10px"></td>
<td bgcolor=#330033 onMouseOver=View('330033') onClick=Set('330033') height="10px" width="10px"></td>
<td bgcolor=#333333 onMouseOver=View('333333') onClick=Set('333333') height="10px" width="10px"></td>
<td bgcolor=#336633 onMouseOver=View('336633') onClick=Set('336633') height="10px" width="10px"></td>
<td bgcolor=#339933 onMouseOver=View('339933') onClick=Set('339933') height="10px" width="10px"></td>
<td bgcolor=#33CC33 onMouseOver=View('33CC33') onClick=Set('33CC33') height="10px" width="10px"></td>
<td bgcolor=#33FF33 onMouseOver=View('33FF33') onClick=Set('33FF33') height="10px" width="10px"></td>
<td bgcolor=#660033 onMouseOver=View('660033') onClick=Set('660033') height="10px" width="10px"></td>
<td bgcolor=#663333 onMouseOver=View('663333') onClick=Set('663333') height="10px" width="10px"></td>
<td bgcolor=#666633 onMouseOver=View('666633') onClick=Set('666633') height="10px" width="10px"></td>
<td bgcolor=#669933 onMouseOver=View('669933') onClick=Set('669933') height="10px" width="10px"></td>
<td bgcolor=#66CC33 onMouseOver=View('66CC33') onClick=Set('66CC33') height="10px" width="10px"></td>
<td bgcolor=#66FF33 onMouseOver=View('66FF33') onClick=Set('66FF33') height="10px" width="10px"></td>
</tr>
<tr>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#666666 onMouseOver=View('666666') onClick=Set('666666') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#000066 onMouseOver=View('000066') onClick=Set('000066') height="10px" width="10px"></td>
<td bgcolor=#003366 onMouseOver=View('003366') onClick=Set('003366') height="10px" width="10px"></td>
<td bgcolor=#006666 onMouseOver=View('006666') onClick=Set('006666') height="10px" width="10px"></td>
<td bgcolor=#009966 onMouseOver=View('009966') onClick=Set('009966') height="10px" width="10px"></td>
<td bgcolor=#00CC66 onMouseOver=View('00CC66') onClick=Set('00CC66') height="10px" width="10px"></td>
<td bgcolor=#00FF66 onMouseOver=View('00FF66') onClick=Set('00FF66') height="10px" width="10px"></td>
<td bgcolor=#330066 onMouseOver=View('330066') onClick=Set('330066') height="10px" width="10px"></td>
<td bgcolor=#333366 onMouseOver=View('333366') onClick=Set('333366') height="10px" width="10px"></td>
<td bgcolor=#336666 onMouseOver=View('336666') onClick=Set('336666') height="10px" width="10px"></td>
<td bgcolor=#339966 onMouseOver=View('339966') onClick=Set('339966') height="10px" width="10px"></td>
<td bgcolor=#33CC66 onMouseOver=View('33CC66') onClick=Set('33CC66') height="10px" width="10px"></td>
<td bgcolor=#33FF66 onMouseOver=View('33FF66') onClick=Set('33FF66') height="10px" width="10px"></td>
<td bgcolor=#660066 onMouseOver=View('660066') onClick=Set('660066') height="10px" width="10px"></td>
<td bgcolor=#663366 onMouseOver=View('663366') onClick=Set('663366') height="10px" width="10px"></td>
<td bgcolor=#666666 onMouseOver=View('666666') onClick=Set('666666') height="10px" width="10px"></td>
<td bgcolor=#669966 onMouseOver=View('669966') onClick=Set('669966') height="10px" width="10px"></td>
<td bgcolor=#66CC66 onMouseOver=View('66CC66') onClick=Set('66CC66') height="10px" width="10px"></td>
<td bgcolor=#66FF66 onMouseOver=View('66FF66') onClick=Set('66FF66') height="10px" width="10px"></td>
</tr>
<tr>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#999999 onMouseOver=View('999999') onClick=Set('999999') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#000099 onMouseOver=View('000099') onClick=Set('000099') height="10px" width="10px"></td>
<td bgcolor=#003399 onMouseOver=View('003399') onClick=Set('003399') height="10px" width="10px"></td>
<td bgcolor=#006699 onMouseOver=View('006699') onClick=Set('006699') height="10px" width="10px"></td>
<td bgcolor=#009999 onMouseOver=View('009999') onClick=Set('009999') height="10px" width="10px"></td>
<td bgcolor=#00CC99 onMouseOver=View('00CC99') onClick=Set('00CC99') height="10px" width="10px"></td>
<td bgcolor=#00FF99 onMouseOver=View('00FF99') onClick=Set('00FF99') height="10px" width="10px"></td>
<td bgcolor=#330099 onMouseOver=View('330099') onClick=Set('330099') height="10px" width="10px"></td>
<td bgcolor=#333399 onMouseOver=View('333399') onClick=Set('333399') height="10px" width="10px"></td>
<td bgcolor=#336699 onMouseOver=View('336699') onClick=Set('336699') height="10px" width="10px"></td>
<td bgcolor=#339999 onMouseOver=View('339999') onClick=Set('339999') height="10px" width="10px"></td>
<td bgcolor=#33CC99 onMouseOver=View('33CC99') onClick=Set('33CC99') height="10px" width="10px"></td>
<td bgcolor=#33FF99 onMouseOver=View('33FF99') onClick=Set('33FF99') height="10px" width="10px"></td>
<td bgcolor=#660099 onMouseOver=View('660099') onClick=Set('660099') height="10px" width="10px"></td>
<td bgcolor=#663399 onMouseOver=View('663399') onClick=Set('663399') height="10px" width="10px"></td>
<td bgcolor=#666699 onMouseOver=View('666699') onClick=Set('666699') height="10px" width="10px"></td>
<td bgcolor=#669999 onMouseOver=View('669999') onClick=Set('669999') height="10px" width="10px"></td>
<td bgcolor=#66CC99 onMouseOver=View('66CC99') onClick=Set('66CC99') height="10px" width="10px"></td>
<td bgcolor=#66FF99 onMouseOver=View('66FF99') onClick=Set('66FF99') height="10px" width="10px"></td>
</tr>
<tr>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#CCCCCC onMouseOver=View('CCCCCC') onClick=Set('CCCCCC') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#0000CC onMouseOver=View('0000CC') onClick=Set('0000CC') height="10px" width="10px"></td>
<td bgcolor=#0033CC onMouseOver=View('0033CC') onClick=Set('0033CC') height="10px" width="10px"></td>
<td bgcolor=#0066CC onMouseOver=View('0066CC') onClick=Set('0066CC') height="10px" width="10px"></td>
<td bgcolor=#0099CC onMouseOver=View('0099CC') onClick=Set('0099CC') height="10px" width="10px"></td>
<td bgcolor=#00CCCC onMouseOver=View('00CCCC') onClick=Set('00CCCC') height="10px" width="10px"></td>
<td bgcolor=#00FFCC onMouseOver=View('00FFCC') onClick=Set('00FFCC') height="10px" width="10px"></td>
<td bgcolor=#3300CC onMouseOver=View('3300CC') onClick=Set('3300CC') height="10px" width="10px"></td>
<td bgcolor=#3333CC onMouseOver=View('3333CC') onClick=Set('3333CC') height="10px" width="10px"></td>
<td bgcolor=#3366CC onMouseOver=View('3366CC') onClick=Set('3366CC') height="10px" width="10px"></td>
<td bgcolor=#3399CC onMouseOver=View('3399CC') onClick=Set('3399CC') height="10px" width="10px"></td>
<td bgcolor=#33CCCC onMouseOver=View('33CCCC') onClick=Set('33CCCC') height="10px" width="10px"></td>
<td bgcolor=#33FFCC onMouseOver=View('33FFCC') onClick=Set('33FFCC') height="10px" width="10px"></td>
<td bgcolor=#6600CC onMouseOver=View('6600CC') onClick=Set('6600CC') height="10px" width="10px"></td>
<td bgcolor=#6633CC onMouseOver=View('6633CC') onClick=Set('6633CC') height="10px" width="10px"></td>
<td bgcolor=#6666CC onMouseOver=View('6666CC') onClick=Set('6666CC') height="10px" width="10px"></td>
<td bgcolor=#6699CC onMouseOver=View('6699CC') onClick=Set('6699CC') height="10px" width="10px"></td>
<td bgcolor=#66CCCC onMouseOver=View('66CCCC') onClick=Set('66CCCC') height="10px" width="10px"></td>
<td bgcolor=#66FFCC onMouseOver=View('66FFCC') onClick=Set('66FFCC') height="10px" width="10px"></td>
</tr>
<tr>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#FFFFFF onMouseOver=View('FFFFFF') onClick=Set('FFFFFF') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#0000FF onMouseOver=View('0000FF') onClick=Set('0000FF') height="10px" width="10px"></td>
<td bgcolor=#0033FF onMouseOver=View('0033FF') onClick=Set('0033FF') height="10px" width="10px"></td>
<td bgcolor=#0066FF onMouseOver=View('0066FF') onClick=Set('0066FF') height="10px" width="10px"></td>
<td bgcolor=#0099FF onMouseOver=View('0099FF') onClick=Set('0099FF') height="10px" width="10px"></td>
<td bgcolor=#00CCFF onMouseOver=View('00CCFF') onClick=Set('00CCFF') height="10px" width="10px"></td>
<td bgcolor=#00FFFF onMouseOver=View('00FFFF') onClick=Set('00FFFF') height="10px" width="10px"></td>
<td bgcolor=#3300FF onMouseOver=View('3300FF') onClick=Set('3300FF') height="10px" width="10px"></td>
<td bgcolor=#3333FF onMouseOver=View('3333FF') onClick=Set('3333FF') height="10px" width="10px"></td>
<td bgcolor=#3366FF onMouseOver=View('3366FF') onClick=Set('3366FF') height="10px" width="10px"></td>
<td bgcolor=#3399FF onMouseOver=View('3399FF') onClick=Set('3399FF') height="10px" width="10px"></td>
<td bgcolor=#33CCFF onMouseOver=View('33CCFF') onClick=Set('33CCFF') height="10px" width="10px"></td>
<td bgcolor=#33FFFF onMouseOver=View('33FFFF') onClick=Set('33FFFF') height="10px" width="10px"></td>
<td bgcolor=#6600FF onMouseOver=View('6600FF') onClick=Set('6600FF') height="10px" width="10px"></td>
<td bgcolor=#6633FF onMouseOver=View('6633FF') onClick=Set('6633FF') height="10px" width="10px"></td>
<td bgcolor=#6666FF onMouseOver=View('6666FF') onClick=Set('6666FF') height="10px" width="10px"></td>
<td bgcolor=#6699FF onMouseOver=View('6699FF') onClick=Set('6699FF') height="10px" width="10px"></td>
<td bgcolor=#66CCFF onMouseOver=View('66CCFF') onClick=Set('66CCFF') height="10px" width="10px"></td>
<td bgcolor=#66FFFF onMouseOver=View('66FFFF') onClick=Set('66FFFF') height="10px" width="10px"></td>
</tr>
<tr>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#FF0000 onMouseOver=View('FF0000') onClick=Set('FF0000') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#990000 onMouseOver=View('990000') onClick=Set('990000') height="10px" width="10px"></td>
<td bgcolor=#993300 onMouseOver=View('993300') onClick=Set('993300') height="10px" width="10px"></td>
<td bgcolor=#996600 onMouseOver=View('996600') onClick=Set('996600') height="10px" width="10px"></td>
<td bgcolor=#999900 onMouseOver=View('999900') onClick=Set('999900') height="10px" width="10px"></td>
<td bgcolor=#99CC00 onMouseOver=View('99CC00') onClick=Set('99CC00') height="10px" width="10px"></td>
<td bgcolor=#99FF00 onMouseOver=View('99FF00') onClick=Set('99FF00') height="10px" width="10px"></td>
<td bgcolor=#CC0000 onMouseOver=View('CC0000') onClick=Set('CC0000') height="10px" width="10px"></td>
<td bgcolor=#CC3300 onMouseOver=View('CC3300') onClick=Set('CC3300') height="10px" width="10px"></td>
<td bgcolor=#CC6600 onMouseOver=View('CC6600') onClick=Set('CC6600') height="10px" width="10px"></td>
<td bgcolor=#CC9900 onMouseOver=View('CC9900') onClick=Set('CC9900') height="10px" width="10px"></td>
<td bgcolor=#CCCC00 onMouseOver=View('CCCC00') onClick=Set('CCCC00') height="10px" width="10px"></td>
<td bgcolor=#CCFF00 onMouseOver=View('CCFF00') onClick=Set('CCFF00') height="10px" width="10px"></td>
<td bgcolor=#FF0000 onMouseOver=View('FF0000') onClick=Set('FF0000') height="10px" width="10px"></td>
<td bgcolor=#FF3300 onMouseOver=View('FF3300') onClick=Set('FF3300') height="10px" width="10px"></td>
<td bgcolor=#FF6600 onMouseOver=View('FF6600') onClick=Set('FF6600') height="10px" width="10px"></td>
<td bgcolor=#FF9900 onMouseOver=View('FF9900') onClick=Set('FF9900') height="10px" width="10px"></td>
<td bgcolor=#FFCC00 onMouseOver=View('FFCC00') onClick=Set('FFCC00') height="10px" width="10px"></td>
<td bgcolor=#FFFF00 onMouseOver=View('FFFF00') onClick=Set('FFFF00') height="10px" width="10px"></td>
</tr>
<tr>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#00FF00 onMouseOver=View('00FF00') onClick=Set('00FF00') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#990033 onMouseOver=View('990033') onClick=Set('990033') height="10px" width="10px"></td>
<td bgcolor=#993333 onMouseOver=View('993333') onClick=Set('993333') height="10px" width="10px"></td>
<td bgcolor=#996633 onMouseOver=View('996633') onClick=Set('996633') height="10px" width="10px"></td>
<td bgcolor=#999933 onMouseOver=View('999933') onClick=Set('999933') height="10px" width="10px"></td>
<td bgcolor=#99CC33 onMouseOver=View('99CC33') onClick=Set('99CC33') height="10px" width="10px"></td>
<td bgcolor=#99FF33 onMouseOver=View('99FF33') onClick=Set('99FF33') height="10px" width="10px"></td>
<td bgcolor=#CC0033 onMouseOver=View('CC0033') onClick=Set('CC0033') height="10px" width="10px"></td>
<td bgcolor=#CC3333 onMouseOver=View('CC3333') onClick=Set('CC3333') height="10px" width="10px"></td>
<td bgcolor=#CC6633 onMouseOver=View('CC6633') onClick=Set('CC6633') height="10px" width="10px"></td>
<td bgcolor=#CC9933 onMouseOver=View('CC9933') onClick=Set('CC9933') height="10px" width="10px"></td>
<td bgcolor=#CCCC33 onMouseOver=View('CCCC33') onClick=Set('CCCC33') height="10px" width="10px"></td>
<td bgcolor=#CCFF33 onMouseOver=View('CCFF33') onClick=Set('CCFF33') height="10px" width="10px"></td>
<td bgcolor=#FF0033 onMouseOver=View('FF0033') onClick=Set('FF0033') height="10px" width="10px"></td>
<td bgcolor=#FF3333 onMouseOver=View('FF3333') onClick=Set('FF3333') height="10px" width="10px"></td>
<td bgcolor=#FF6633 onMouseOver=View('FF6633') onClick=Set('FF6633') height="10px" width="10px"></td>
<td bgcolor=#FF9933 onMouseOver=View('FF9933') onClick=Set('FF9933') height="10px" width="10px"></td>
<td bgcolor=#FFCC33 onMouseOver=View('FFCC33') onClick=Set('FFCC33') height="10px" width="10px"></td>
<td bgcolor=#FFFF33 onMouseOver=View('FFFF33') onClick=Set('FFFF33') height="10px" width="10px"></td>
</tr>
<tr>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#0000FF onMouseOver=View('0000FF') onClick=Set('0000FF') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#990066 onMouseOver=View('990066') onClick=Set('990066') height="10px" width="10px"></td>
<td bgcolor=#993366 onMouseOver=View('993366') onClick=Set('993366') height="10px" width="10px"></td>
<td bgcolor=#996666 onMouseOver=View('996666') onClick=Set('996666') height="10px" width="10px"></td>
<td bgcolor=#999966 onMouseOver=View('999966') onClick=Set('999966') height="10px" width="10px"></td>
<td bgcolor=#99CC66 onMouseOver=View('99CC66') onClick=Set('99CC66') height="10px" width="10px"></td>
<td bgcolor=#99FF66 onMouseOver=View('99FF66') onClick=Set('99FF66') height="10px" width="10px"></td>
<td bgcolor=#CC0066 onMouseOver=View('CC0066') onClick=Set('CC0066') height="10px" width="10px"></td>
<td bgcolor=#CC3366 onMouseOver=View('CC3366') onClick=Set('CC3366') height="10px" width="10px"></td>
<td bgcolor=#CC6666 onMouseOver=View('CC6666') onClick=Set('CC6666') height="10px" width="10px"></td>
<td bgcolor=#CC9966 onMouseOver=View('CC9966') onClick=Set('CC9966') height="10px" width="10px"></td>
<td bgcolor=#CCCC66 onMouseOver=View('CCCC66') onClick=Set('CCCC66') height="10px" width="10px"></td>
<td bgcolor=#CCFF66 onMouseOver=View('CCFF66') onClick=Set('CCFF66') height="10px" width="10px"></td>
<td bgcolor=#FF0066 onMouseOver=View('FF0066') onClick=Set('FF0066') height="10px" width="10px"></td>
<td bgcolor=#FF3366 onMouseOver=View('FF3366') onClick=Set('FF3366') height="10px" width="10px"></td>
<td bgcolor=#FF6666 onMouseOver=View('FF6666') onClick=Set('FF6666') height="10px" width="10px"></td>
<td bgcolor=#FF9966 onMouseOver=View('FF9966') onClick=Set('FF9966') height="10px" width="10px"></td>
<td bgcolor=#FFCC66 onMouseOver=View('FFCC66') onClick=Set('FFCC66') height="10px" width="10px"></td>
<td bgcolor=#FFFF66 onMouseOver=View('FFFF66') onClick=Set('FFFF66') height="10px" width="10px"></td>
</tr>
<tr>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#FFFF00 onMouseOver=View('FFFF00') onClick=Set('FFFF00') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#990099 onMouseOver=View('990099') onClick=Set('990099') height="10px" width="10px"></td>
<td bgcolor=#993399 onMouseOver=View('993399') onClick=Set('993399') height="10px" width="10px"></td>
<td bgcolor=#996699 onMouseOver=View('996699') onClick=Set('996699') height="10px" width="10px"></td>
<td bgcolor=#999999 onMouseOver=View('999999') onClick=Set('999999') height="10px" width="10px"></td>
<td bgcolor=#99CC99 onMouseOver=View('99CC99') onClick=Set('99CC99') height="10px" width="10px"></td>
<td bgcolor=#99FF99 onMouseOver=View('99FF99') onClick=Set('99FF99') height="10px" width="10px"></td>
<td bgcolor=#CC0099 onMouseOver=View('CC0099') onClick=Set('CC0099') height="10px" width="10px"></td>
<td bgcolor=#CC3399 onMouseOver=View('CC3399') onClick=Set('CC3399') height="10px" width="10px"></td>
<td bgcolor=#CC6699 onMouseOver=View('CC6699') onClick=Set('CC6699') height="10px" width="10px"></td>
<td bgcolor=#CC9999 onMouseOver=View('CC9999') onClick=Set('CC9999') height="10px" width="10px"></td>
<td bgcolor=#CCCC99 onMouseOver=View('CCCC99') onClick=Set('CCCC99') height="10px" width="10px"></td>
<td bgcolor=#CCFF99 onMouseOver=View('CCFF99') onClick=Set('CCFF99') height="10px" width="10px"></td>
<td bgcolor=#FF0099 onMouseOver=View('FF0099') onClick=Set('FF0099') height="10px" width="10px"></td>
<td bgcolor=#FF3399 onMouseOver=View('FF3399') onClick=Set('FF3399') height="10px" width="10px"></td>
<td bgcolor=#FF6699 onMouseOver=View('FF6699') onClick=Set('FF6699') height="10px" width="10px"></td>
<td bgcolor=#FF9999 onMouseOver=View('FF9999') onClick=Set('FF9999') height="10px" width="10px"></td>
<td bgcolor=#FFCC99 onMouseOver=View('FFCC99') onClick=Set('FFCC99') height="10px" width="10px"></td>
<td bgcolor=#FFFF99 onMouseOver=View('FFFF99') onClick=Set('FFFF99') height="10px" width="10px"></td>
</tr>
<tr>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#00FFFF onMouseOver=View('00FFFF') onClick=Set('00FFFF') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#9900CC onMouseOver=View('9900CC') onClick=Set('9900CC') height="10px" width="10px"></td>
<td bgcolor=#9933CC onMouseOver=View('9933CC') onClick=Set('9933CC') height="10px" width="10px"></td>
<td bgcolor=#9966CC onMouseOver=View('9966CC') onClick=Set('9966CC') height="10px" width="10px"></td>
<td bgcolor=#9999CC onMouseOver=View('9999CC') onClick=Set('9999CC') height="10px" width="10px"></td>
<td bgcolor=#99CCCC onMouseOver=View('99CCCC') onClick=Set('99CCCC') height="10px" width="10px"></td>
<td bgcolor=#99FFCC onMouseOver=View('99FFCC') onClick=Set('99FFCC') height="10px" width="10px"></td>
<td bgcolor=#CC00CC onMouseOver=View('CC00CC') onClick=Set('CC00CC') height="10px" width="10px"></td>
<td bgcolor=#CC33CC onMouseOver=View('CC33CC') onClick=Set('CC33CC') height="10px" width="10px"></td>
<td bgcolor=#CC66CC onMouseOver=View('CC66CC') onClick=Set('CC66CC') height="10px" width="10px"></td>
<td bgcolor=#CC99CC onMouseOver=View('CC99CC') onClick=Set('CC99CC') height="10px" width="10px"></td>
<td bgcolor=#CCCCCC onMouseOver=View('CCCCCC') onClick=Set('CCCCCC') height="10px" width="10px"></td>
<td bgcolor=#CCFFCC onMouseOver=View('CCFFCC') onClick=Set('CCFFCC') height="10px" width="10px"></td>
<td bgcolor=#FF00CC onMouseOver=View('FF00CC') onClick=Set('FF00CC') height="10px" width="10px"></td>
<td bgcolor=#FF33CC onMouseOver=View('FF33CC') onClick=Set('FF33CC') height="10px" width="10px"></td>
<td bgcolor=#FF66CC onMouseOver=View('FF66CC') onClick=Set('FF66CC') height="10px" width="10px"></td>
<td bgcolor=#FF99CC onMouseOver=View('FF99CC') onClick=Set('FF99CC') height="10px" width="10px"></td>
<td bgcolor=#FFCCCC onMouseOver=View('FFCCCC') onClick=Set('FFCCCC') height="10px" width="10px"></td>
<td bgcolor=#FFFFCC onMouseOver=View('FFFFCC') onClick=Set('FFFFCC') height="10px" width="10px"></td>
</tr>
<tr>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#FF00FF onMouseOver=View('FF00FF') onClick=Set('FF00FF') height="10px" width="10px"></td>
<td bgcolor=#000000 onMouseOver=View('000000') onClick=Set('000000') height="10px" width="10px"></td>
<td bgcolor=#9900FF onMouseOver=View('9900FF') onClick=Set('9900FF') height="10px" width="10px"></td>
<td bgcolor=#9933FF onMouseOver=View('9933FF') onClick=Set('9933FF') height="10px" width="10px"></td>
<td bgcolor=#9966FF onMouseOver=View('9966FF') onClick=Set('9966FF') height="10px" width="10px"></td>
<td bgcolor=#9999FF onMouseOver=View('9999FF') onClick=Set('9999FF') height="10px" width="10px"></td>
<td bgcolor=#99CCFF onMouseOver=View('99CCFF') onClick=Set('99CCFF') height="10px" width="10px"></td>
<td bgcolor=#99FFFF onMouseOver=View('99FFFF') onClick=Set('99FFFF') height="10px" width="10px"></td>
<td bgcolor=#CC00FF onMouseOver=View('CC00FF') onClick=Set('CC00FF') height="10px" width="10px"></td>
<td bgcolor=#CC33FF onMouseOver=View('CC33FF') onClick=Set('CC33FF') height="10px" width="10px"></td>
<td bgcolor=#CC66FF onMouseOver=View('CC66FF') onClick=Set('CC66FF') height="10px" width="10px"></td>
<td bgcolor=#CC99FF onMouseOver=View('CC99FF') onClick=Set('CC99FF') height="10px" width="10px"></td>
<td bgcolor=#CCCCFF onMouseOver=View('CCCCFF') onClick=Set('CCCCFF') height="10px" width="10px"></td>
<td bgcolor=#CCFFFF onMouseOver=View('CCFFFF') onClick=Set('CCFFFF') height="10px" width="10px"></td>
<td bgcolor=#FF00FF onMouseOver=View('FF00FF') onClick=Set('FF00FF') height="10px" width="10px"></td>
<td bgcolor=#FF33FF onMouseOver=View('FF33FF') onClick=Set('FF33FF') height="10px" width="10px"></td>
<td bgcolor=#FF66FF onMouseOver=View('FF66FF') onClick=Set('FF66FF') height="10px" width="10px"></td>
<td bgcolor=#FF99FF onMouseOver=View('FF99FF') onClick=Set('FF99FF') height="10px" width="10px"></td>
<td bgcolor=#FFCCFF onMouseOver=View('FFCCFF') onClick=Set('FFCCFF') height="10px" width="10px"></td>
<td bgcolor=#FFFFFF onMouseOver=View('FFFFFF') onClick=Set('FFFFFF') height="10px" width="10px"></td>
</tr>
</table>

			</td>
	</tr>

	<tr> 
		<td colspan="3" height="5">
		</td>
	</tr>
	<tr> 
		<td colspan="3" align="center" height="28"> {S_HIDDEN_FORM_FIELDS}<input type="submit" accesskey="s" tabindex="6" name="post" class="mainoption" value="{L_SUBMIT}" />&nbsp;<input type="button" tabindex="5" name="cancel" class="mainoption" value="{L_CANCEL}" OnClick="document.location.replace('{U_VIEW_FORUM}')"/>
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

	document.getElementById("ColorPreview").style.backgroundColor = '#' + '{REMARK2}';  
	document.getElementById("ColorPreview2").style.backgroundColor = '#' + '{REMARK3}';  
	document.getElementById("ColorPreview3").style.backgroundColor = '#' + '{REMARK4}';  
-->
</script>