
<table border="0" cellpadding="0" cellspacing="1"  width="100%"> 
  <tr> 
    <td  align="left" colspan="5" height=30> 
  <span class="cattitle"><font color=#000000>{L_MODULE_NAME} {WEEK}</font></span> 
    </td> 
  </tr> 
  	<tr> 
		<td colspan="5" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
  <tr height=23   bgcolor=#fafafa>    
    <td colspan="1"  align="center"><span class="gen"><font color=#000000>{L_RANK}</font></span></td>    
    <td colspan="1"  align="center" width="10%"><span class="gen"><font color=#000000>{L_USERNAME}</font></span></td> 
    <td colspan="1"  align="center" width="10%"><span class="gen"><font color=#000000>{L_POSTS}</font></span></td> 
    <td colspan="1"  align="center" width="10%"><span class="gen"><font color=#000000>{L_PERCENTAGE}</font></span></td> 
    <td colspan="1"  align="center" width="50%"><span class="gen"><font color=#000000>{L_GRAPH}</font></span></td> 
  </tr> 
  	<tr> 
		<td colspan="5" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
  <!-- BEGIN top_posters_week --> 
  <tr height=23> 
    <td class="{top_posters_week.CLASS}" align="center" width="5%"><span class="gen">{top_posters_week.RANK}</span></td> 
    <td class="{top_posters_week.CLASS}" align="center" width="10%"><span class="gen"><a href="{top_posters_week.URL}">{top_posters_week.USERNAME}</a></span></td> 
    <td class="{top_posters_week.CLASS}" align="center" width="10%"><span class="gen">{top_posters_week.POSTS}</span></td> 
    <td class="{top_posters_week.CLASS}" align="center" width="10%"><span class="gen">{top_posters_week.PERCENTAGE}%</span></td>    
    <td class="{top_posters_week.CLASS}" align="left" width="55%"> 
   <table cellspacing="0" cellpadding="0" border="0" align="left"> 
     <tr> 
       <td align="right"><img src="{LEFT_GRAPH_IMAGE}" width="4" height="12" /></td> 
     </tr> 
   </table> 
   <table cellspacing="0" cellpadding="0" border="0" align="left" width="{top_posters_week.BAR}%"> 
     <tr> 
       <td><img src="{GRAPH_IMAGE}" width="100%" height="12" /></td> 
     </tr> 
   </table> 
   <table cellspacing="0" cellpadding="0" border="0" align="left"> 
     <tr> 
       <td align="left"><img src="{RIGHT_GRAPH_IMAGE}" width="4" height="12" /></td> 
     </tr> 
   </table> 
    </td> 
  </tr> 
  <!-- END top_posters_week --> 
  	<tr> 
		<td colspan="5" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
</table> 
