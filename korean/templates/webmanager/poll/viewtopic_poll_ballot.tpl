			<tr>
				<td colspan="6" align="center"><br clear="all" />
					<form method="POST" action="{S_POLL_ACTION}">
					<table style="border-width:1px; border-color:rgb(204,204,204); border-style:solid;" border="0" cellpadding="0" cellspacing="10" width="70%" bgcolor="#F5F5F5">
						<tr>
							<td align="center"><span class="gen"><b>{POLL_QUESTION}</b></span></td>
						</tr>
						<tr>
							<td align="center">
								<table cellspacing="0" cellpadding="2" border="0">
									<!-- BEGIN poll_option -->
									<tr>
										<td><input class="formstyle3" type="radio" name="vote_id" value="{poll_option.POLL_OPTION_ID}" />&nbsp;</td>
										<td><span class="gen">{poll_option.POLL_OPTION_CAPTION}</span></td>
									</tr>
									<!-- END poll_option -->
								</table>
							</td>
						</tr>
						<tr>
							<td align="center">
								<input type="submit" name="submit" value="{L_SUBMIT_VOTE}" class="liteoption" />&nbsp;<span class="genmed"><input type="button" value="{L_VIEW_RESULTS}" OnClick="location = '{U_VIEW_RESULTS}';" class="liteoption"></span>
							</td>
						</tr>
					</table>{S_HIDDEN_FIELDS}
					</form>
				</td>
			</tr>
			<tr>
				<td height="20" colspan="6" ></td>
			</tr>