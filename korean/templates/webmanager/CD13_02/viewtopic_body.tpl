<script>
	function toggle(embeddedLayer) { 
		if (embeddedLayer.style.display == 'none'){ 
			embeddedLayer.filters.blendTrans.Apply(); 
			embeddedLayer.style.display = ''; 
			embeddedLayer.filters.blendTrans.Play() 
		} 
		else { 
			embeddedLayer.filters.blendTrans.Apply(); 
			embeddedLayer.style.display = 'none'; 
			embeddedLayer.filters.blendTrans.Play() 
		} 
	}

	function go_del(miniPassForm) {	

		Error = "";

		Error = checkPassword(document.forms[miniPassForm].remark15);

		if (Error) {
			alert(Error);
			return false;
		}
		else {	
			document.forms[miniPassForm].submit();
			return true;
		}
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

		if (document.post.message.value.length < 1) {
			formErrors += "{L_EMPTY_MESSAGE}" + "\n";
		}
		if (document.post.subject.value.length < 1) {
			formErrors += "{L_EMPTY_AUTHOR}" + "\n";
		}

		formErrors += checkPassword(document.post.remark15);

		if (formErrors) {
			alert(formErrors);
			return false;
		} else {		
			return true;		
		}
	}

</script>


<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="gen">{NAV_CAT_DESC}</span></td>
	</tr>
</table>
<!-- mod : categories hierarchy v 2 -->
<br>
<table width="95%" cellspacing="0" cellpadding="0" border="0">
	<!-- BEGIN postrow -->
	<!-- BEGIN switch_not_reply -->
	<tr> 
		<td colspan="6" height="2" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="6" height="2"></td>
	</tr>
	<tr>
		<td width="12%" nowrap="nowrap" height="29">&nbsp;<span class=menuTitle>{MENU_LANG_TITLE}</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span>&nbsp;</td>
		<td width="90%" colspan="4"><span class="genmed"><b><font color=#000000>{postrow.POST_SUBJECT}</font></b></span></td>
	</tr>
	<tr>
		<td colspan="6" height="2"></td>
	</tr>
	<tr> 
		<td colspan="6" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" height="29">&nbsp;<span class=menuTitle>URL</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span>&nbsp;</td>
		<td colspan="4"><span class="genmed"><a href="{postrow.REMARK1}" target="{postrow.REMARK2}">{postrow.REMARK1}</a>&nbsp;({postrow.REMARK2})</span></td>
	</tr>
	<tr> 
		<td colspan="6" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td width="12%" nowrap="nowrap" height="29">&nbsp;<span class=menuTitle>{MENU_LANG_AUTHOR}</span></td>
		<td width="3" valign="middle"><span class=menuBorder>|</span>&nbsp;</td>
		<td width="50%"><span class="genmed">{postrow.U_PROFILE_HEAD}<font color="#000000">{postrow.POSTER_NAME}</font>{postrow.U_PROFILE_TAIL}</td>
		<td width="12%" nowrap="nowrap" height="29" align="right">&nbsp;<span class=menuTitle>{MENU_LANG_DATE}</span>&nbsp;</td>
		<td width="3" valign="middle"><span class=menuBorder>|</span>&nbsp;</td>
		<td><span class="postdetails"><font color=#000000>{postrow.POST_DATE}</font></span></td>
	</tr>
	<tr> 
		<td colspan="6" height="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#DADADA"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td colspan="6" height="5">
		</td>
	</tr>
	<tr> 
		<td colspan="6" align="right">{postrow.EDIT_IMG} 

<!-- BEGIN switch_user_logged_in -->
{postrow.DELETE_IMG}
<!-- END switch_user_logged_in -->

 {postrow.IP_IMG}
		</td>
	</tr>
	<tr>
		<td colspan="6" align="center">
			<table width="95%" cellspacing="0" cellpadding="3" border="0">
				<tr>
					<td align="center"><span class="genmed">{postrow.THUMBNAIL_SRC_HEADER}{postrow.THUMBNAIL}{postrow.THUMBNAIL_SRC_TAIL}</span></td>
				</tr>
				<tr>
					<td><span class="genmed">{postrow.MESSAGE}</span></td>
				</tr>
				<tr>
					<td colspan="2" align="right"><span class="genmed"><font color="#A7A7A7">{postrow.EDITED_MESSAGE}</font></span></td>
				</tr>						
			</table>
		</td>
	</tr>
	<tr> 
		<td colspan="6" height="15">
		</td>
	</tr>
	<!-- END switch_not_reply -->

	<!-- BEGIN switch_reply -->
	<tr>
		<td colspan="6" height="1" bgcolor="#DADADA"></td>
	</tr>
	<tr>
		<td colspan="6" align="center">
			<table width="98%" cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td width="80%" height="30">&nbsp;<span class="genmed"><b>{postrow.COMMENTOR}</b></span>&nbsp;<span class="postdetails">({postrow.POST_DATE})</span></td>
					<td width="20%" align="right">
				<!-- BEGIN switch_password -->
					<a style='cursor:hand' onclick='toggle(miniPass_{postrow.U_POST_ID});'>
					<img src="templates/webmanager/images/comment-del.gif" align="absmiddle" border="0">
					</a>
					<span id='miniPass_{postrow.U_POST_ID}' style='display:none;width:100%;filter:blendTrans(Duration=0.5)'>
						<table border=0 cellspacing=0 cellpadding=0>		
							<form method=post name=miniPassForm_{postrow.U_POST_ID} action="posting.php">
							<input type="hidden" name=mode value="delete">
							<input type="hidden" name=p value="{postrow.U_POST_ID}">
							<tr>
								<td><img src="templates/webmanager/images/title-pass1.gif" align="absmiddle" border="0">&nbsp;<span class=menuBorder>|</span><span class="gen"><input type="password" name="remark15" size="4" maxlength="4" class="formstyle4" length=4 value="" />
								<a style='cursor:hand' onclick="go_del('miniPassForm_{postrow.U_POST_ID}');"> 
								<img src="templates/webmanager/images/comment-ok.gif"  border="0" align=absmiddle onclick>
								</a>
								</span></td>
							</tr>
							</form>
						</table>
					</span>	
				<!-- END switch_password -->
				<!-- BEGIN switch_del -->
					<a href='{postrow.U_DELETE}'><img src="templates/webmanager/images/comment-del.gif" align="absmiddle" border="0"></a>
				<!-- END switch_del -->
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="6" height="3"></td>
	</tr>
	<tr>
		<td colspan="6" align="center">
			<table width="95%" cellspacing="3" cellpadding="5" border="0">
				<tr>
					<td><span class="genmed">{postrow.MESSAGE}</span>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="6" height="1"></td>
	</tr>
	<!-- END switch_reply -->
	<!-- END postrow -->
	<tr> 
		<td height="1" colspan="6">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="5" colspan="6"></td>
	</tr>
</table>
<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left" valign="middle" nowrap="nowrap"><span class="nav">{POST_IMG}<a href="{U_VIEW_FORUM}"><img src="templates/webmanager/images/icon_list.gif" border="0" alt="{L_VIEW_FORUM}" align="middle" /></a>&nbsp;<a href="javascript:void(window.open('{PRINTER_URL}', 'Popup','toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=650, height=600'));"><img src="{PRINTER_IMG}" border="0" align="middle" /></a>
	<!-- BEGIN switch_user_logged_in -->
	<a href="{U_FAV}"><img src="templates/webmanager/images/icon-scrab.gif" border="0" alt="{L_FAV}" align="middle" /></a>
	<!-- END switch_user_logged_in -->
	</span></td>
	<td align="right" valign="top" nowrap="nowrap"><a href="{U_VIEW_OLDER_TOPIC}" class="nav">{L_VIEW_PREVIOUS_TOPIC}</a> <a href="{U_VIEW_NEWER_TOPIC}" class="nav">{L_VIEW_NEXT_TOPIC}</a></td>
  </tr>
</table>

<table width="95%" cellspacing="2" border="0" align="center">
  <tr>
  <td align="center"><span class="genmed">{PAGINATION}</span><br /></td>
  </tr>
  <tr>
  	<td align="right">{JUMPBOX}</td>
  </tr>
  <!--
    <tr>
	<td valign="top" nowrap="nowrap" align="center"><span class="genmed" style="line-height=80%"><br></span>
	<table width="318" cellspacing="0" cellpadding="0" border="0">
	<tr>{S_TOPIC_ADMIN}</tr>
	</table>
	</td>
  </tr>
  -->
</table>
<br><br>