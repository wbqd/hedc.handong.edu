 
<tr> 
	<td colspan="6" align="center"><br clear="all" />
		<table style="border-width:1px; border-color:rgb(204,204,204); border-style:solid;" border="0" cellpadding="0" cellspacing="10" width="70%" bgcolor="#fafafa">
			<tr> 
				<td colspan="4" align="center"><span class="gen"><b>{POLL_QUESTION}</b></span></td>
			</tr>
			<tr> 
				<td align="center"> 
					<table cellspacing="0" cellpadding="2" border="0">
						<!-- BEGIN poll_option -->
						<tr> 
							<td><span class="gen">{poll_option.POLL_OPTION_CAPTION}</span></td>
							<td> 
								<table cellspacing="0" cellpadding="0" border="0">
									<tr> 
										<td><img src="templates/webmanager/images/vote_lcap.gif" width="4" alt="" height="12" /></td>
										<td><img src="{poll_option.POLL_OPTION_IMG}" width="{poll_option.POLL_OPTION_IMG_WIDTH}" height="12" alt="{poll_option.POLL_OPTION_PERCENT}" /></td>
										<td><img src="templates/webmanager/images/vote_rcap.gif" width="4" alt="" height="12" /></td>
									</tr>
								</table>
							</td>
							<td align="center"><b><span class="gen">&nbsp;{poll_option.POLL_OPTION_PERCENT}&nbsp;</span></b></td>
							<td align="center"><span class="gen">[ {poll_option.POLL_OPTION_RESULT} ]</span></td>
						</tr>
						<!-- END poll_option -->
					</table>
				</td>
			</tr>
			<tr> 
				<td colspan="4" align="center"><span class="gen"><b>{L_TOTAL_VOTES} : {TOTAL_VOTES}</b></span></td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td height="20" colspan="6" ></td>
</tr>

