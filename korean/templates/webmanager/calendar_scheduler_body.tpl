<form name="_calendar_scheduler" method="post" action="{ACTION}">
<table cellspacing="0" cellpadding="0" border="0" width="95%">
<tr>
	<td colspan="3">
		<br style="font-size:5;" />
	</td>
</tr>
<tr>
	<td valign="top" align="center" width="60%">
		<table cellpadding="0" cellspacing="0" border="0" width="95%">
		<tr>
			<td colspan="2" valign="bottom"><img src="templates/webmanager/images/calendar/{MONTH_IMG}.gif" border="0">	</td>
			<td colspan="3" align="center">
				<table cellpadding="0" cellspacing="0" border="0" width="88%">
				<tr>
					<td align=right><a href="{U_PREC}" class="gen"><img src="templates/webmanager/images/left-arrow.gif" border="0"></a></td>
					<td align="center">{S_MONTH}{S_YEAR}</td>
					<td align=left><a href="{U_NEXT}" class="gen"><img src="templates/webmanager/images/right-arrow.gif" border="0"></a></td>
				</tr>
				</table>
			</td>
			<td colspan="2" valign="bottom" align="right">
				<img src="templates/webmanager/images/calendar/{YEAR_IMG_1}.gif" border="0"><img src="templates/webmanager/images/calendar/{YEAR_IMG_2}.gif" border="0"><img src="templates/webmanager/images/calendar/{YEAR_IMG_3}.gif" border="0"><img src="templates/webmanager/images/calendar/{YEAR_IMG_4}.gif" border="0"><img src="templates/webmanager/images/calendar/year-name.gif" border="0">
			</td>
		</tr>
		<tr>
			<td colspan="7" height="5">
			</td>
		</tr>
		<tr>
			<td colspan="7" background="templates/webmanager/images/calendar/calendar-top-back.gif" height="31" align="center">
				<table cellpadding="3" cellspacing="1" border="0" width="100%">
					<tr>
						<td width="13%" align="center">
							<img src="templates/webmanager/images/calendar/sun.gif" border="0"></td>
						<td width="13%" align="center">
							<img src="templates/webmanager/images/calendar/mon.gif" border="0"></td>
						<td width="13%" align="center">
							<img src="templates/webmanager/images/calendar/tue.gif" border="0"></td>
						<td width="13%" align="center">
							<img src="templates/webmanager/images/calendar/wed.gif" border="0"></td>
						<td width="13%" align="center">
							<img src="templates/webmanager/images/calendar/thu.gif" border="0"></td>
						<td width="13%" align="center">
							<img src="templates/webmanager/images/calendar/fri.gif" border="0"></td>
						<td width="13%" align="center">
							<img src="templates/webmanager/images/calendar/sat.gif" border="0"></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="7" align="center" bgcolor="#E6E6E6">
				<table cellpadding="3" cellspacing="1" border="0" width="100%">
				<!-- BEGIN row -->
					<tr>
						<!-- BEGIN cell -->
							<td width="13%" bgcolor="white" align="right" valign="top" height="40"><span class="gen">{row.cell.DAY}</span></td>
						<!-- END cell -->
					</tr>
				<!-- END row -->
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="7" align="center" height="38">
				<table cellpadding="0" cellspacing="0" border="0" width="100%">
					<tr>
						<td width="50%">
							<a href="{U_PREC}" class="gen"><img src="templates/webmanager/images/calendar/prev.gif" border="0"></a>
						</td>
						<td width="50%" align="right">
							<a href="{U_NEXT}" class="gen"><img src="templates/webmanager/images/calendar/next.gif" border="0"></a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		</table>
	</td>
	<td valign="top" width="40%" align="center">
		<table cellpadding="0" cellspacing="0" border="0" width="100%">
			<tr>
				<td valign="top" height="24">
			</tr>
			<tr>
				<td align="center">
				{TOPIC_LIST_SCHEDULER}
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>

<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
<tr>
	<td align="right" valign="bottom" nowrap="nowrap">{S_HIDDEN_FIELDS}<span class="genmed"><b>{PAGINATION}</b></span></td>
</tr>
</table>
</form>
<br><br>