<script language="JavaScript">
<!--
function namosw_goto_byselect(sel, targetstr)
{
  var index = sel.selectedIndex;
  if (sel.options[index].value != '') {
     if (targetstr == 'blank') {
       window.open(sel.options[index].value, 'win1');
     } else {
       var frameobj;
       if (targetstr == '') targetstr = 'self';
       if ((frameobj = eval(targetstr)) != null)
         frameobj.location = sel.options[index].value;
     }
  }
}

// -->
</script>
<table width="100%" cellspacing="2" cellpadding="2" border="0">
		<tr> 
		<td align="left" valign="middle" width="100%"><b><span class="gen"><font color="#754C24">Admin-Boards</font></span></b><br><br></td>
		</tr>
</table>
<table width="100%" cellspacing="2" border="0" cellpadding="2">
<tr><td align="center" width="100%">
{BOARD_INDEX}
</td></tr>
</table>
<table width="95%" cellspacing="0" border="0" align="center" cellpadding="2">
  <tr> 
<td align="left">&nbsp;</td>
  </tr>
</table>
