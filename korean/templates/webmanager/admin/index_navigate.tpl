<script language="JavaScript">
<!--

function namosw_list(parent, visible, width, height, font, size, fgColor, bgColor, indent, hbgColor, hfgColor) {
  this.additem = namosw_l_additem;
  this.addlist = namosw_l_addlist;
  this.make    = namosw_l_make;
  this.write   = namosw_l_write;
  this.show    = namosw_l_show;
  this.update  = namosw_l_update;
  this.updateparent = namosw_l_updateparent;
  this.items = new Array();
  this.id = document.namosw_lists.length;
  this.parent_id = 0;
  this.x = 0;
  this.y = 0;
  this.visible = visible;
  this.width    = width;
  this.height   = height;
  this.parent   = parent;
  this.indent = indent;
  this.fgColor = fgColor;
  this.hfgColor = hfgColor;
  this.bgColor  = bgColor;
  this.hbgColor = hbgColor;

  this.font_start = '';
  this.font_end   = '';

  this.font_start = '<font color=' + fgColor;
  if (font != '') this.font_start += ' face=\"' + font + '\"';
  if (size != '' && size.indexOf('pt', 0) == -1) this.font_start += ' size=' + size;
  this.font_start += '>';

  this.font_start += '<span class=gen>';

  this.font_end  = '</span>';
  this.font_end += '</font>';

  this.made     = false;
  this.shown    = false;
  document.namosw_lists[document.namosw_lists.length] = this;
}

function namosw_l_setclip(layer, left, right, top, bottom) {
  var is_ns4 = navigator.appName.indexOf('Netscape', 0) != -1 && !document.getElementById;
  var is_ns6 = navigator.appName.indexOf('Netscape', 0) != -1 && document.getElementById;

  if (is_ns4) {
    layer.clip.left   = left; 
    layer.clip.right  = right;
    layer.clip.top    = top;  
    layer.clip.bottom = bottom;
  } else if (is_ns6) {
    layer.style.width  = right-left;
    layer.style.height = bottom-top;
    layer.style.clip  = "rect(" + top + "," + right + "," + bottom + "," + left + ")";
  } else {    
    layer.style.pixelWidth  = right-left;
    layer.style.pixelHeight = bottom-top;
    layer.style.clip  = "rect(" + top + "," + right + "," + bottom + "," + left + ")";
  }
}

function namosw_l_write() {
  var is_ns4 = navigator.appName.indexOf('Netscape', 0) != -1 && !document.getElementById;
  var is_ns6 = navigator.appName.indexOf('Netscape', 0) != -1 && document.getElementById;

  var layer, clip, str;
  for(var i = 0; i < this.items.length; i++) { 
    layer = this.items[i];
    if (is_ns4) 
      layer.visibility = "hidden";
    else 
      layer.style.visibility = "hidden";
    str = "";

    str += "<table width="+this.width+" nowrap border='0' cellpadding='0' cellspacing='0'><tr>";
	str += "<td align=right valign='middle' nowrap>";

	if (layer.type == 'list') {
      str += "<a";
      if (is_ns4) str += " href=\"javascript:void(0);\"";
      else        str += " style=\"cursor:hand;\"";
      str += " onclick=\"namosw_l_expand("+layer.list.id+");\">";
    } 
    else { 
		str += "<a href=\"" + layer.url + "\" target=\"" + "main" + "\" style=\"text-decoration:none;\">"; 
	}

    if (this.font_start) str += this.font_start;
    str += layer.text;
    if (this.font_end) str += this.font_end;

	if (layer.type == 'list') {
		str += "</a>";
    } 
    else { 
		str += "</a>";
	}
   
    str += "</td></table>";

    str = str.replace("span", "span id='namoswlistspan" + layer.lid + "'");

    if (is_ns4) {
      layer.document.writeln(str);
      layer.document.close();
    } else if (is_ns6) {
      layer.innerHTML = str;
      layer.span = document.getElementById('namoswlistspan'+layer.lid);
    } else {
      layer.innerHTML = str;
      layer.span = document.all['namoswlistspan'+layer.lid];
    }
    if (layer.type == 'list' && layer.list.visible)
      this.items[i].list.write();
  }
  this.made = true;
}

function namosw_l_show() {
  var is_ns4 = navigator.appName.indexOf('Netscape', 0) != -1 && !document.getElementById;
  var is_ns6 = navigator.appName.indexOf('Netscape', 0) != -1 && document.getElementById;

  var layer;
  for(var i = 0; i < this.items.length; i++) { 
    layer = this.items[i];
    namosw_l_setclip(layer, 0, this.width, 0, this.height-1);
    if (is_ns4) {
      if (layer.oBgColor) layer.document.bgColor = layer.oBgColor;
      else layer.document.bgColor = this.bgColor;
    } else {
      if (layer.oBgColor) layer.style.backgroundColor = layer.oBgColor;
      else layer.style.backgroundColor = this.bgColor;
    }
    if (layer.type == 'list' && layer.list.visible)
      layer.list.show();
  }
  this.shown = true;
}

function namosw_l_update(parent_visible, x, y) {
  var is_ns4 = navigator.appName.indexOf('Netscape', 0) != -1 && !document.getElementById;
  var is_ns6 = navigator.appName.indexOf('Netscape', 0) != -1 && document.getElementById;

  var top = y, layer, list;
  for(var i = 0; i < this.items.length; i++) { 
    layer = this.items[i];
    list  = layer.list;
    if (this.visible && parent_visible) {
      if (is_ns4) {
 layer.visibility = "visible";
 layer.top = top;
 layer.left = x;
      } else if (is_ns6) {
 layer.style.visibility = "visible";
 layer.style.top   = top;
 layer.style.left  = x; 
      } else {
 layer.style.visibility = "visible";
 layer.style.pixelTop   = top;
 layer.style.pixelLeft  = x; 
// if (layer.url) layer.style.cursor = "hand";
      }
      top += this.height-(this.indent*5);
    } else {
      if (is_ns4)      layer.visibility = "hidden";
      else if (is_ns6) layer.style.visibility = "hidden";
      else             layer.style.visibility = "hidden";
    }
    if (layer.type == 'list') {
      if (list.visible) {
        if (!list.made)  list.write();
        if (!list.shown) list.show();        
      } else {
      }
      if (list.made)
        top = list.update(this.visible && parent_visible, x, top);
    }
  }
  return top;
}

function namosw_l_updateparent(parent_id) {
  this.parent_id = parent_id;
  for(var i = 0; i < this.items.length; i++)
    if (this.items[i].type == 'list')
      this.items[i].list.updateparent(parent_id);
}

function namosw_l_expand(i) {
  document.namosw_lists[i].visible = !document.namosw_lists[i].visible;

  if(document.namosw_lists[i].visible = true) {
	for(var j = 0; j < document.namosw_lists.length; j++) {
		if(i != j && document.namosw_lists[i].parent_id != j) {
			document.namosw_lists[j].visible = false;
		}
	}
  }

  list = document.namosw_lists[document.namosw_lists[i].parent_id];
  list.update(true, list.x, list.y);
}

function namosw_l_make(x, y) {
  this.updateparent(this.id);
  this.write();
  this.show();
  this.update(true, x, y);
  this.x = x; 
  this.y = y;
}

function namosw_l_additem(text, url, frame) {
  var is_ns4 = navigator.appName.indexOf('Netscape', 0) != -1 && !document.getElementById;
  var is_ns6 = navigator.appName.indexOf('Netscape', 0) != -1 && document.getElementById;

  var layer = null;
  if (is_ns4 && this.parent)
    layer = eval('this.parent.document.layers.namoswlistitem'+document.namosw_lists.lid);
  else if (is_ns6)
    layer = document.getElementById("namoswlistitem" + document.namosw_lists.lid);
  else
    layer = eval('document.all.namoswlistitem'+document.namosw_lists.lid);

  if (layer == null && is_ns4) 
    layer = this.parent ? new Layer(this.width, this.parent) : new Layer(this.width);

  if (layer == null) return;

  if (url)   layer.url   = url;
  if (frame) {
    if (frame.indexOf('parent.') != 0)
      layer.frame = "_" + frame;
    else
      layer.frame = frame.substring(7, frame.length);
  }
  else //if frame is ""
    layer.frame = "_self";

  layer.type = 'item';
  layer.text = text;
  layer.lid  = document.namosw_lists.lid;
  this.items[this.items.length] = layer;
  layer.hbgColor = this.hbgColor;
  layer.oBgColor = this.bgColor;
  layer.fgColor = this.fgColor;
  layer.hfgColor = this.hfgColor;
  if (layer.captureEvents)
    layer.captureEvents(Event.MOUSEOVER|Event.MOUSEOUT|Event.MOUSEUP);
  layer.onmouseover = namosw_l_onmouseover;
  layer.onmouseout  = namosw_l_onmouseout;
//  layer.onmouseup   = namosw_l_onmouseup;
  document.namosw_lists.lid++;
}

function namosw_l_addlist(list, text, url, frame) {
  var is_ns4 = navigator.appName.indexOf('Netscape', 0) != -1 && !document.getElementById;
  var is_ns6 = navigator.appName.indexOf('Netscape', 0) != -1 && document.getElementById;

  var layer = null;

  if (is_ns4 && this.parent)
    layer = eval('this.parent.document.layers.namoswlistitem'+document.namosw_lists.lid);
  else if (is_ns6)
    layer = document.getElementById("namoswlistitem" + document.namosw_lists.lid);
  else
    layer = eval('document.all.namoswlistitem'+document.namosw_lists.lid);
  if (layer == null && is_ns4) 
      layer = this.parent ? new Layer(this.width, this.parent) : new Layer(this.width);

  if (layer == null) return;

  if (url)   layer.url   = url;
  if (frame) {
    if (frame.indexOf('parent.') != 0)
      layer.frame = "_" + frame;
    else
      layer.frame = frame.substring(7, frame.length);
  }
  else
    layer.frame = "_self";
  layer.list = list;
  layer.type = 'list';
  layer.text = text;
  layer.lid  = document.namosw_lists.lid;
  this.items[this.items.length] = layer;
  list.parent = this;
  layer.hbgColor = this.hbgColor;
  layer.oBgColor = this.bgColor;
  layer.fgColor = this.fgColor;
  layer.hfgColor = this.hfgColor;
  if (layer.captureEvents)
    layer.captureEvents(Event.MOUSEOVER|Event.MOUSEOUT|Event.MOUSEUP);
  layer.onmouseover = namosw_l_onmouseover;
  layer.onmouseout  = namosw_l_onmouseout;
//  layer.onmouseup   = namosw_l_onmouseup;
  document.namosw_lists.lid++;
}

function namosw_l_onmouseover()
{
  var is_ns4 = navigator.appName.indexOf('Netscape', 0) != -1 && !document.getElementById;
  var is_ns6 = navigator.appName.indexOf('Netscape', 0) != -1 && document.getElementById;

  if (is_ns4) {
    if (this.hbgColor)
      this.bgColor = this.hbgColor;
  } else {
    if (this.hbgColor) this.style.backgroundColor = this.hbgColor;
    if (this.hfgColor) this.span.style.color = this.hfgColor;
  }
  if (this.url) self.status = this.url;
}

function namosw_l_onmouseout()
{
  var is_ns4 = navigator.appName.indexOf('Netscape', 0) != -1 && !document.getElementById;
  var is_ns6 = navigator.appName.indexOf('Netscape', 0) != -1 && document.getElementById;

  if (is_ns4) {
    this.bgColor = this.oBgColor;
  } else  {
    this.style.backgroundColor = this.oBgColor;
    this.span.style.color = this.fgColor;
  }
  if (this.url) self.status = '';
}

function namosw_l_onmouseup()
{
  if (this.url) {
    if (this.frame == 'blank') {
      window.open(this.url, 'win1');
    } else {
      var frame_obj;
      if ((frame_obj = eval(this.frame)) != null)
        frame_obj.location = this.url;
    }
  }
}

function namosw_init_list(top_layer)
{
  if (parseInt(navigator.appVersion) < 4)
    return;
  if (top_layer == '')
    return;

  document.namosw_lists     = new Array();
  document.namosw_lists.lid = 0;

  var is_ns4 = navigator.appName.indexOf('Netscape', 0) != -1 && !document.getElementById;
  var is_ns6 = navigator.appName.indexOf('Netscape', 0) != -1 && document.getElementById;

  var layer;
  if (is_ns4)      layer = document.layers[top_layer];  
  else if (is_ns6) layer = document.getElementById(top_layer);
  else             layer = document.all[top_layer];


  var string = "";
  for (i = 0; i < 40; i++) {
    string = string + "<div id='namoswlistitem" + (document.namosw_lists.lid+i) + "' " +
                      "style='position: absolute;'></div>";
  }
  layer.innerHTML += string;

  l1 = new namosw_list(layer, true, 170, 23, 'Arial', '2', 'black', 'white', 0, 'white');
    l2 = new namosw_list(layer, false, 170, 23, 'Arial', '1', 'black', 'white', 1, 'white');
    l2.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_CONFIGURATION}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU1_1}', 'main');
    l2.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_INDEX_PAGE}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU1_3}', 'main');
  l1.addlist(l2, '<img src="../templates/webmanager/images/admin/menu1.gif"  valign=absmiddle border="0">', '', 'main');


	l1.additem('<img src="../templates/webmanager/images/admin/menu2.gif"  valign=absmiddle border="0">', '{U_ADV_MENU1_4}', 'main');
    //l8 = new namosw_list(layer, false, 170, 23, 'Arial', '1', 'black', 'white', 1, 'white');
    //l8.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_MAIN}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU1_4}', 'main');
    //l8.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_TOP}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU1_5}', 'main');
  //l1.addlist(l8, '<img src="../templates/webmanager/images/admin/menu2.gif"  valign=absmiddle border="0">', '', 'main');
  //l1.additem('<img src="../templates/webmanager/images/admin/menu2.gif"  valign=absmiddle border="0">', '{U_ADV_MENU1_4}', 'main');
  //l1.additem('<img src="../templates/webmanager/images/admin/menu3.gif"  valign=absmiddle border="0">', '{U_ADV_MENU1_5}', 'main');

    l3 = new namosw_list(layer, false, 170, 23, 'Arial', '1', 'black', 'white', 1, 'white');
    l3.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_USERS_LIST}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU2_4}', 'main');
    l3.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_GROUP_MANAGEMENT}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU3_1}', 'main');
    l3.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_GROUP_PERMISSIONS}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU3_2}', 'main');
    //l3.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>Ranks&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU2_3}', 'main');
    l3.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_MASS_EMAIL}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU2_5}', 'main');
    l3.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_REGISTER_FIELD}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU1_1_1}', 'main');
  l1.addlist(l3, '<img src="../templates/webmanager/images/admin/menu4.gif"  valign=absmiddle border="0">', '', 'main');


    l4 = new namosw_list(layer, false, 170, 23, 'Arial', '1', 'black', 'white', 1, 'white');
    l4.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_CONTROL_PANEL}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU5_1}', 'main');
    l4.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_MANAGEMENT}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU5_2}', 'main');
    l4.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_QUOTA_LIMITS}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU5_3}', 'main');
    l4.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_SHADOW_ATTACHMENTS}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU5_4}', 'main');
    l4.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_EXTENSION_CONTROL}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU5_6}', 'main');
    l4.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_EXTENSION_GROUPS}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU5_7}', 'main');
    l4.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_SYNCHRONIZE_ATTACHMENTS}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU5_5}', 'main');
  l1.addlist(l4, '<img src="../templates/webmanager/images/admin/menu5.gif"  valign=absmiddle border="0">', '', 'main');


	l5 = new namosw_list(layer, false, 170, 23, 'Arial', '1', 'black', 'white', 1, 'white');
    l5.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_WORD_CENSORS}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU4_1}', 'main');
    l5.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_FORBIDDEN_EXTENSIONS}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU5_8}', 'main');
    l5.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_BAN_CONTROL}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU4_2}', 'main');
    l5.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_DISALLOW_NAMES}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU4_3}', 'main');
  l1.addlist(l5, '<img src="../templates/webmanager/images/admin/menu6.gif"  valign=absmiddle border="0">', '', 'main');


    l6 = new namosw_list(layer, false, 170, 23, 'Arial', '1', 'black', 'white', 1, 'white');
    l6.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_BACKUP}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU6_1}', 'main');
    l6.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_RESTORE}&nbsp;&nbsp;&nbsp;', '{U_ADV_MENU6_2}', 'main');
  l1.addlist(l6, '<img src="../templates/webmanager/images/admin/menu7.gif"  valign=absmiddle border="0">', '', 'main');

  //l1.additem('<img src="../templates/webmanager/images/admin/menu8.gif"  valign=absmiddle border="0">', '{U_ADV_MENU7_2}', 'main');
    l7 = new namosw_list(layer, false, 170, 23, 'Arial', '1', 'black', 'white', 1, 'white');
    l7.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_UPLOAD}&nbsp;&nbsp;&nbsp;', '{U_PREVIEW_SINGLE}&f=37', 'main');
	l7.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_BANNER}&nbsp;&nbsp;&nbsp;', '{U_PREVIEW_SINGLE}&f=38', 'main');
	l7.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_POP_UP}&nbsp;&nbsp;&nbsp;', '{U_PREVIEW_SINGLE}&f=44', 'main');
	l7.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>{ADMIN_LANG_AGREEMENT}&nbsp;&nbsp;&nbsp;', '{U_PREVIEW_SINGLE}&f=87', 'main');
	l7.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>하단메뉴&nbsp;&nbsp;&nbsp;', '{U_PREVIEW_SINGLE}&f=89', 'main');
	l7.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>플래쉬배경이미지&nbsp;&nbsp;&nbsp;', '{U_PREVIEW_SINGLE}&f=49', 'main');
	l7.additem('<img src="../templates/webmanager/images/admin/submenu-icon.gif" border="0" valign=absmiddle>Item Pool&nbsp;&nbsp;&nbsp;', '/itemPool/adminMode.html', 'main');
  l1.addlist(l7, '<img src="../templates/webmanager/images/admin/menu9.gif"  valign=absmiddle border="0">', '', 'main');

  l1.make(0, 14);
}



// --></script>




<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
    <tr>
        <td width="0">
            <p><a href="{U_FORUM_INDEX}" target="_parent"><img src="../templates/webmanager/images/admin/logo.gif" width="180" border="0"></p></a>
        </td>
		<td width="40" height="59">
        </td>
    </tr>
    <tr>
        <td width="0" >
           <p><img src="../templates/webmanager/images/admin/menu-title.gif" width="180" height="38" border="0"></p>
        </td>
		<td width="40" rowspan="2" align="top">
            <p>&nbsp;</p>
        </td>
    </tr>
    <tr>
        <td width="0" height=360 background="../templates/webmanager/images/admin/menu-back.gif">
            <p>&nbsp;</p>
			<div id="layer1" style="border-width:1px; border-style:none; width:170px; height:200px; position:absolute; left:9px; top:89px; z-index:1;">
				<p>&nbsp;</p>
			</div>            
        </td>
    </tr>
    <tr>
        <td width="0" height="100%" background="../templates/webmanager/images/admin/menu-back.gif" align="center">
<br/>		
        </td>
    </tr>
</table>


<script language="javascript1.2" defer>
<!--
namosw_init_list('layer1');
-->
</script>

<br />