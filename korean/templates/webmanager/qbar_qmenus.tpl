<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>


<!-- BEGIN _qmenu -->
<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
<!-- BEGIN line -->
<tr>
	<!-- BEGIN cell -->
	<td align="{_qmenu.ALIGN}" width="{_qmenu.WIDTH}%" nowrap="nowrap"></td><td><A 
	<!-- BEGIN in_table -->
	<!-- END in_table -->
	<!-- BEGIN field -->
	<!-- BEGIN switch_not_empty -->	
onMouseOver="MM_showHideLayers('Layer{_qmenu.line.cell.field.LAYER_NO}','','show');" onMouseOut="MM_showHideLayers('Layer{_qmenu.line.cell.field.LAYER_NO}','','hide'); "><span id="Layer{_qmenu.line.cell.field.LAYER_NO}" style="BORDER-RIGHT: #629f14  0px solid; PADDING-RIGHT: 0px; BORDER-TOP: #629f14  0px solid; PADDING-LEFT: 0px; Z-INDEX: 3; BACKGROUND: #ffffff; FILTER: alpha(opacity=100); VISIBILITY: hidden; PADDING-BOTTOM: 0px; OVERFLOW: visible; BORDER-LEFT: #629f14  0px solid; WIDTH: 0px; PADDING-TOP: 0px; BORDER-BOTTOM: #629f14  0px solid; POSITION: absolute; TOP: 
<!-- BEGIN switch_portal -->
130px
<!-- END switch_portal -->
<!-- BEGIN switch_not_portal -->
130px
<!-- END switch_not_portal -->
"> 
	<table  style="border-style:solid;" bordercolor='#83c5ca' bgcolor=white border="1" cellpadding="5" cellspacing="0" width="{_qmenu.line.cell.field.WIDTH}">	
		<tr><td>

	<table bgcolor=white border="0" cellpadding="3" cellspacing="0" width="100%">	
	<!-- END switch_not_empty -->
	<!-- BEGIN sub_menu -->
	<tr onmouseover='this.style.backgroundColor="#f5f5f5";' onmouseout='this.style.backgroundColor=""'>
        <td nowrap="nowrap" height=17>
            <img src="templates/webmanager/images/bullet4_white.gif" border="0" align="absmiddle">&nbsp;<span class="genmed" style="line-height=180%"><a href="{_qmenu.line.cell.field.sub_menu.SUB_MENU_URL}" class="submenu">{_qmenu.line.cell.field.sub_menu.SUB_MENU_NAME}</a>&nbsp;</span>
	</td>
	</tr>
	<!-- END sub_menu -->	
	<!-- BEGIN switch_not_empty -->	
	</table>
	</td></tr>
	</table>

	</span>
	<!-- END switch_not_empty -->
	<!-- BEGIN switch_not_empty -->	
<A 
	<!-- END switch_not_empty -->
href="{_qmenu.line.cell.field.URL}"  onfocus="this.blur()"   OnMouseOver="MM_showHideLayers('Layer{_qmenu.line.cell.field.LAYER_NO}','','show');" onMouseOut="MM_showHideLayers('Layer{_qmenu.line.cell.field.LAYER_NO}','','hide');"  class="rollover"><img src="{_qmenu.line.cell.field.ICON2}" border="0" align="absbottom" class="rollover"/><img src="{_qmenu.line.cell.field.ICON}" border="0" align="absbottom" /></a></td><td><A 
	<!-- END field -->
	<!-- BEGIN in_table -->
	<!-- END in_table -->
href="#"></a>
	</td>
	<!-- END cell -->
</tr>
<!-- END line -->
</table>
<!-- END _qmenu -->