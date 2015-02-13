<br>
<span class="gen"><b><font color="#000000">&raquo; {L_USER_TITLE}</font></b></span><br><br>

{ERROR_BOX}

<form name="regform" action="{S_PROFILE_ACTION}" {S_FORM_ENCTYPE} method="post"><table width="98%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td  colspan="2" height="25" valign="middle" align=center><span class="gen"><b><font color="#000000">{L_REGISTRATION_INFO}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
<!------------------------------- 필수 입력 템플릿 ---------------------------------->
	<tr> 
		<td colspan="2"><span class="genmed">{L_ITEMS_REQUIRED}</span></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa width="38%"><span class="genmed"><b>{L_USERNAME}</b> <font color="#F26D7D">*</font></span></td>
	  <td> 
		<input class="post" type="text" name="username" size="35" maxlength="40" value="{USERNAME}" />
	  </td>
	</tr>
<!-- BEGIN switch_realname_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_REALNAME}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"style="width200px"  name="realname" size="35" value="{REALNAME}" />
      </td>
	</tr>
<!-- END switch_realname_req -->

<!-- BEGIN switch_jumin_req -->
	<tr><td bgcolor=#fafafa><span class="gen"><b>{L_JUMIN}</b> <font color="#F26D7D">*</font></span></td>
	    <td> 
		  <input type="text" class="post"style="width: 70px"  name="jumin1" size="10" maxlength="6" value="{JUMIN1}" />
        - <input type="text" class="post"style="width: 70px"  name="jumin2" size="10" maxlength="7" value="{JUMIN2}" /></td>
	 </tr>
<!-- END switch_jumin_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_EMAIL_ADDRESS}</b> <font color="#F26D7D">*</font></span></td>
	  <td> 
		<input class="post" type="text" name="email" size="35" maxlength="255" value="{EMAIL}" />
	  </td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_NEW_PASSWORD}</b> <font color="#F26D7D">*</font></span><br />
		<span class="genmed"><font color="#A7A7A7">{L_PASSWORD_IF_CHANGED}</font></span></td>
	  <td> 
		<input class="post" type="password" name="password" size="35" maxlength="32" value="" />
	  </td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_CONFIRM_PASSWORD}</b> <font color="#F26D7D">*</font></span><br />
		<span class="genmed"><font color="#A7A7A7">{L_PASSWORD_CONFIRM_IF_CHANGED}</font></span></td>
	  <td> 
		<input class="post" type="password" name="password_confirm" size="35" maxlength="32" value="" />
	  </td>
	</tr>
<!-- BEGIN switch_from_req -->
    <tr> 
      <td bgcolor=#fafafa><span class="gen"><b>{L_ZIPCODE}</b> <font color="#F26D7D">*</font></span></td> 
      <td> 
        <input type="text" class="post" name="zipcode1" size=4 maxlength=3 class=input READONLY value="{ZIPCODE1}"> - 
        <input type="text" class="post" name="zipcode2" size=4 maxlength=3 class=input READONLY value="{ZIPCODE2}">
        <span class="gen"><a href="#" onClick="window.open('../zipsearch.php','zipsearch','width=500,height=180,scrollbars=no')"> <img src=../templates/webmanager/images/zipcode.gif border=0 align="absmiddle"></a></span>
     </td> 
    </tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_LOCATION}</b> <font color="#F26D7D">*</font></span></td>
	  <td> 
		<input class="post" type="text" name="location" size="35" maxlength="100" value="{LOCATION}" />
        </td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_LOCATION2}</b> <font color="#F26D7D">*</font></span></td>
	  <td> 
		<input class="post" type="text" name="location2" size="35" maxlength="50" value="{LOCATION2}" />
	  </td>
	</tr>
<!-- END switch_from_req -->

<!-- BEGIN switch_occ_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_OCCUPATION}</b> <font color="#F26D7D">*</font></span></td>
	  <td>{OCCUPATION} 
       </td>
	</tr>
<!-- END switch_occ_req -->

<!-- BEGIN switch_mphone_req -->
    <tr> 
      <td bgcolor=#fafafa><span class="gen"><b>{L_MPHONE}</b> <font color="#F26D7D">*</font></span></td> 
      <td>{MPHONE1}
       <input type="text" class="post"style="width: 50px"  name="mphone2" size="10" maxlength="4" value="{MPHONE2}" /> - 
       <input type="text" class="post"style="width: 50px"  name="mphone3" size="10" maxlength="4" value="{MPHONE3}" />
       </td> 
    </tr>
<!-- END switch_mphone_req -->

<!-- BEGIN switch_hphone_req -->
    <tr> 
      <td bgcolor=#fafafa><span class="gen"><b>{L_HPHONE}</b> <font color="#F26D7D">*</font></span></td> 
      <td>{HPHONE1}
       <input type="text" class="post"style="width: 50px"  name="hphone2" size="10" maxlength="4" value="{HPHONE2}" /> - 
       <input type="text" class="post"style="width: 50px"  name="hphone3" size="10" maxlength="4" value="{HPHONE3}" />
        </td> 
    </tr>
<!-- END switch_hphone_req -->

<!-- BEGIN switch_gender_req -->
     <tr> 
      <td bgcolor=#fafafa><span class="gen"><b>{L_GENDER}</b> <font color="#F26D7D">*</font> </span></td> 
      <td>       
      <input type="radio" name="gender" value="1" {GENDER_MALE_CHECKED}/> 
      <span class="gen">{L_GENDER_MALE}</span>&nbsp;&nbsp; 
      <input type="radio" name="gender" value="2" {GENDER_FEMALE_CHECKED}/> 
      <span class="gen">{L_GENDER_FEMALE}</span>&nbsp;&nbsp; 
      </td>
    </tr>
<!-- END switch_gender_req -->

<!-- BEGIN switch_birth_req -->
    <tr> 
       <td bgcolor=#fafafa><span class="gen"><b>{L_BIRTHDAY}</b> <font color="#F26D7D">*</font></span></td>
       <td>{S_BIRTHDAY}
       </td>
    </tr>
<!-- END switch_birth_req -->

<!-- BEGIN switch_remark1_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK1}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark1" size="35"  value="{REMARK1}" />
      </td>
	</tr>
<!-- END switch_remark1_req -->
<!-- BEGIN switch_remark2_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK2}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark2" size="35"  value="{REMARK2}" />
      </td>
	</tr>
<!-- END switch_remark2_req -->
<!-- BEGIN switch_remark3_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK3}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark3" size="35"  value="{REMARK3}" />
      </td>
	</tr>
<!-- END switch_remark3_req -->
<!-- BEGIN switch_remark4_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK4}</b> <font color="#F26D7D">* </span></td>
	  <td>
      <input type="text" class="post"  name="remark4" size="35"  value="{REMARK4}" />
      </td>
	</tr>
<!-- END switch_remark4_req -->
<!-- BEGIN switch_remark5_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK5}</b> <font color="#F26D7D">* </span></td>
	  <td>
      <input type="text" class="post"  name="remark5" size="35"  value="{REMARK5}" />
      </td>
	</tr>
<!-- END switch_remark5_req -->
<!-- BEGIN switch_remark6_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK6}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark6" size="35"  value="{REMARK6}" />
      </td>
	</tr>
<!-- END switch_remark6_req -->
<!-- BEGIN switch_remark7_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK7}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark7" size="35"  value="{REMARK7}" />
      </td>
	</tr>
<!-- END switch_remark7_req -->
<!-- BEGIN switch_remark8_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK8}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark8" size="35"  value="{REMARK8}" />
      </td>
	</tr>
<!-- END switch_remark8_req -->
<!-- BEGIN switch_remark9_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK9}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark9" size="35"  value="{REMARK9}" />
      </td>
	</tr>
<!-- END switch_remark9_req -->
<!-- BEGIN switch_remark10_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK10}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark10" size="35"  value="{REMARK10}" />
      </td>
	</tr>
<!-- END switch_remark10_req -->
<!-- BEGIN switch_remark11_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK11}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark11" size="35"  value="{REMARK11}" />
      </td>
	</tr>
<!-- END switch_remark11_req -->
<!-- BEGIN switch_remark12_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK12}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark12" size="35"  value="{REMARK12}" />
      </td>
	</tr>
<!-- END switch_remark12_req -->
<!-- BEGIN switch_remark13_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK13}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark13" size="35"  value="{REMARK13}" />
      </td>
	</tr>
<!-- END switch_remark13_req -->
<!-- BEGIN switch_remark14_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK14}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark14" size="35"  value="{REMARK14}" />
      </td>
	</tr>
<!-- END switch_remark14_req -->
<!-- BEGIN switch_remark15_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK15}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark15" size="35"  value="{REMARK15}" />
      </td>
	</tr>
<!-- END switch_remark15_req -->
<!-- BEGIN switch_remark16_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK16}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark16" size="35"  value="{REMARK16}" />
      </td>
	</tr>
<!-- END switch_remark16_req -->
<!-- BEGIN switch_remark17_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK17}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark17" size="35"  value="{REMARK17}" />
      </td>
	</tr>
<!-- END switch_remark17_req -->
<!-- BEGIN switch_remark18_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK18}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark18" size="35"  value="{REMARK18}" />
      </td>
	</tr>
<!-- END switch_remark18_req -->
<!-- BEGIN switch_remark19_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK19}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark19" size="35"  value="{REMARK19}" />
      </td>
	</tr>
<!-- END switch_remark19_req -->
<!-- BEGIN switch_remark20_req -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK20}</b> <font color="#F26D7D">*</font></span></td>
	  <td>
      <input type="text" class="post"  name="remark20" size="35"  value="{REMARK20}" />
      </td>
	</tr>
<!-- END switch_remark20_req -->
<!------------------------------- 선택입력 템플릿-------------------------------------->
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td  colspan="2" height="25" valign="middle" align=center><span class="gen"><b><font color="#000000">{L_PROFILE_INFO}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>

<!-- BEGIN switch_use_realname -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_REALNAME}</b></span></td>
	  <td><input type="text" class="post"style="width200px"  name="realname" size="35" value="{REALNAME}" />
      </td>
	</tr>
<!-- END switch_use_realname -->

<!-- BEGIN switch_use_jumin -->
	<tr><td bgcolor=#fafafa><span class="gen"><b>{L_JUMIN}</b></span></td>
	    <td> 
		  <input type="text" class="post"style="width: 70px"  name="jumin1" size="10" maxlength="6" value="{JUMIN1}" /> -
          <input type="text" class="post"style="width: 70px"  name="jumin2" size="10" maxlength="7" value="{JUMIN2}" /></td>
	 </tr>
<!-- END switch_use_jumin -->

<!-- BEGIN switch_use_from -->
    <tr> 
      <td bgcolor=#fafafa><span class="gen"><b>{L_ZIPCODE}</b></span></td> 
      <td> 
        <input type="text" class="post" name="zipcode1" size=4 maxlength=3 class=input READONLY value="{ZIPCODE1}"> - 
        <input type="text" class="post" name="zipcode2" size=4 maxlength=3 class=input READONLY value="{ZIPCODE2}">
        <span class="gen"><a href="#" onClick="window.open('../zipsearch.php','zipsearch','width=500,height=180,scrollbars=no')"> <img src=../templates/webmanager/images/zipcode.gif border=0 align="absmiddle"></a></span>
     </td> 
    </tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_LOCATION}</b></span></td>
	  <td> 
		<input class="post" type="text" name="location" size="35" maxlength="100" value="{LOCATION}" />
        </td>
	  </td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_LOCATION2}</b></span></td>
	  <td> 
		<input class="post" type="text" name="location2" size="35" maxlength="50" value="{LOCATION2}" />
	  </td>
	</tr>
<!-- END switch_use_from -->

<!-- BEGIN switch_use_occ -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_OCCUPATION}</b></span></td>
	  <td>{OCCUPATION}
      </td>
	</tr>
<!-- END switch_use_occ -->

<!-- BEGIN switch_use_mphone -->
    <tr> 
      <td bgcolor=#fafafa><span class="gen"><b>{L_MPHONE}</b></span></td> 
      <td>{MPHONE1}
       <input type="text" class="post"style="width: 50px"  name="mphone2" size="10" maxlength="4" value="{MPHONE2}" /> - 
       <input type="text" class="post"style="width: 50px"  name="mphone3" size="10" maxlength="4" value="{MPHONE3}" />
       </td>
    </tr>
<!-- END switch_use_mphone -->

<!-- BEGIN switch_use_hphone -->
    <tr> 
      <td bgcolor=#fafafa><span class="gen"><b>{L_HPHONE}</b></span></td> 
      <td>{HPHONE1}
       <input type="text" class="post"style="width: 50px"  name="hphone2" size="10" maxlength="4" value="{HPHONE2}" /> - 
       <input type="text" class="post"style="width: 50px"  name="hphone3" size="10" maxlength="4" value="{HPHONE3}" />
       </td> 
    </tr>
<!-- END switch_use_hphone -->

<!-- BEGIN switch_use_gender -->
    <tr> 
      <td bgcolor=#fafafa><span class="gen"><b>{L_GENDER}</b></span></td> 
      <td> 
      <input type="radio" name="gender" value="1" {GENDER_MALE_CHECKED}/> 
      <span class="gen">{L_GENDER_MALE}</span>&nbsp;&nbsp; 
      <input type="radio" name="gender" value="2" {GENDER_FEMALE_CHECKED}/> 
      <span class="gen">{L_GENDER_FEMALE}</span> 
	  </td> 
   </tr>
<!-- END switch_use_gender -->

<!-- BEGIN switch_use_birth -->
    <tr> 
      <td bgcolor=#fafafa><span class="gen"><b>{L_BIRTHDAY}</b></span></td>
      <td> {S_BIRTHDAY}
       </td>
    </tr>
<!-- END switch_use_birth -->

<!-- BEGIN switch_use_remark1 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK1}</b></span></td>
	  <td><input type="text" class="post"  name="remark1" size="35"  value="{REMARK1}" />
	 </td>
	</tr>
<!-- END switch_use_remark1 -->
<!-- BEGIN switch_use_remark2 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK2}</b></span></td>
	  <td><input type="text" class="post"  name="remark2" size="35"  value="{REMARK2}" />
	 </td>
	</tr>
<!-- END switch_use_remark2 -->
<!-- BEGIN switch_use_remark3 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK3}</b></span></td>
	  <td><input type="text" class="post"  name="remark3" size="35"  value="{REMARK3}" />
	 </td>
	</tr>
<!-- END switch_use_remark3 -->
<!-- BEGIN switch_use_remark4 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK4}</b></span></td>
	  <td><input type="text" class="post"  name="remark4" size="35"  value="{REMARK4}" />
	 </td>
	</tr>
<!-- END switch_use_remark4 -->
<!-- BEGIN switch_use_remark5 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK5}</b></span></td>
	  <td><input type="text" class="post"  name="remark5" size="35"  value="{REMARK5}" />
	 </td>
	</tr>
<!-- END switch_use_remark5 -->
<!-- BEGIN switch_use_remark6 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK6}</b></span></td>
	  <td><input type="text" class="post"  name="remark6" size="35"  value="{REMARK6}" />
	 </td>
	</tr>
<!-- END switch_use_remark6 -->
<!-- BEGIN switch_use_remark7 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK7}</b></span></td>
	  <td><input type="text" class="post"  name="remark7" size="35"  value="{REMARK7}" />
	 </td>
	</tr>
<!-- END switch_use_remark7 -->
<!-- BEGIN switch_use_remark8 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK8}</b></span></td>
	  <td><input type="text" class="post"  name="remark8" size="35"  value="{REMARK8}" />
	 </td>
	</tr>
<!-- END switch_use_remark8 -->
<!-- BEGIN switch_use_remark9 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK9}</b></span></td>
	  <td><input type="text" class="post"  name="remark9" size="35"  value="{REMARK9}" />
	 </td>
	</tr>
<!-- END switch_use_remark9 -->
<!-- BEGIN switch_use_remark10 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK10}</b></span></td>
	  <td><input type="text" class="post"  name="remark10" size="35"  value="{REMARK10}" />
	 </td>
	</tr>
<!-- END switch_use_remark10 -->
<!-- BEGIN switch_use_remark11 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK11}</b></span></td>
	  <td><input type="text" class="post"  name="remark11" size="35"  value="{REMARK11}" />
	 </td>
	</tr>
<!-- END switch_use_remark11 -->
<!-- BEGIN switch_use_remark12 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK12}</b></span></td>
	  <td><input type="text" class="post"  name="remark12" size="35"  value="{REMARK12}" />
	 </td>
	</tr>
<!-- END switch_use_remark12 -->
<!-- BEGIN switch_use_remark13 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK13}</b></span></td>
	  <td><input type="text" class="post"  name="remark13" size="35"  value="{REMARK13}" />
	 </td>
	</tr>
<!-- END switch_use_remark13 -->
<!-- BEGIN switch_use_remark14 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK14}</b></span></td>
	  <td><input type="text" class="post"  name="remark14" size="35"  value="{REMARK14}" />
	 </td>
	</tr>
<!-- END switch_use_remark14 -->
<!-- BEGIN switch_use_remark15 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK15}</b></span></td>
	  <td><input type="text" class="post"  name="remark15" size="35"  value="{REMARK15}" />
	 </td>
	</tr>
<!-- END switch_use_remark15 -->
<!-- BEGIN switch_use_remark16 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK16}</b></span></td>
	  <td><input type="text" class="post"  name="remark16" size="35"  value="{REMARK16}" />
	 </td>
	</tr>
<!-- END switch_use_remark16 -->
<!-- BEGIN switch_use_remark17 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK17}</b></span></td>
	  <td><input type="text" class="post"  name="remark17" size="35"  value="{REMARK17}" />
	 </td>
	</tr>
<!-- END switch_use_remark17 -->
<!-- BEGIN switch_use_remark18 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK18}</b></span></td>
	  <td><input type="text" class="post"  name="remark18" size="35"  value="{REMARK18}" />
	 </td>
	</tr>
<!-- END switch_use_remark18 -->
<!-- BEGIN switch_use_remark19 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK19}</b></span></td>
	  <td><input type="text" class="post"  name="remark19" size="35"  value="{REMARK19}" />
	 </td>
	</tr>
<!-- END switch_use_remark19 -->
<!-- BEGIN switch_use_remark20 -->
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{TITLE_REMARK20}</b></span></td>
	  <td><input type="text" class="post"  name="remark20" size="35"  value="{REMARK20}" />
	 </td>
	</tr>
<!-- END switch_use_remark20 -->

	<!--tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_INTERESTS}</b></span></td>
	  <td> 
		<input class="post" type="text" name="interests" size="35" maxlength="150" value="{INTERESTS}" />
	  </td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_SIGNATURE}</b></span><br />
		<span class="genmed"><font color="#A7A7A7">{L_SIGNATURE_EXPLAIN}</b></font></span></td>
	  <td> 
		<textarea class="post" name="signature" rows="6" cols="45">{SIGNATURE}</textarea>
	  </td>
	</tr-->
	<!--tr> 
	  <th class="thSides" colspan="2"><b>{L_PREFERENCES}</b></th>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_PUBLIC_VIEW_EMAIL}</b></span></td>
	  <td> 
		<input type="radio" name="viewemail" value="1" {VIEW_EMAIL_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="viewemail" value="0" {VIEW_EMAIL_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_HIDE_USER}</b></span></td>
	  <td> 
		<input type="radio" name="hideonline" value="1" {HIDE_USER_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="hideonline" value="0" {HIDE_USER_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_NOTIFY_ON_REPLY}</b></span></td>
	  <td> 
		<input type="radio" name="notifyreply" value="1" {NOTIFY_REPLY_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="notifyreply" value="0" {NOTIFY_REPLY_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_NOTIFY_ON_PRIVMSG}</b></span></td>
	  <td> 
		<input type="radio" name="notifypm" value="1" {NOTIFY_PM_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="notifypm" value="0" {NOTIFY_PM_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_POPUP_ON_PRIVMSG}</b></span></td>
	  <td> 
		<input type="radio" name="popup_pm" value="1" {POPUP_PM_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="popup_pm" value="0" {POPUP_PM_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr-->
	<!--tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_ALWAYS_ADD_SIGNATURE}</b></span></td>
	  <td> 
		<input type="radio" name="attachsig" value="1" {ALWAYS_ADD_SIGNATURE_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="attachsig" value="0" {ALWAYS_ADD_SIGNATURE_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr-->

	<input type="hidden" name="allowbbcode" value="{ALWAYS_ALLOW_BBCODE}" />
	<input type="hidden" name="allowhtml" value="{ALWAYS_ALLOW_HTML}" />
	<input type="hidden" name="allowsmilies" value="{ALWAYS_ALLOW_SMILIES}" />
	
	<input type="hidden" name="language" value="{LANGUAGE_SELECT}" />
	<input type="hidden" name="style" value="{STYLE_SELECT}" />
	<input type="hidden" name="timezone" value="{TIMEZONE_SELECT}" />
	<input type="hidden" name="dateformat" value="{DATE_FORMAT}" />

<!-- BEGIN switch_realname_ig -->
	<input type="hidden" name="realname" value="{REALNAME}" />
<!-- END switch_realname_ig -->
<!-- BEGIN switch_jumin_ig -->
	<input type="hidden" name="jumin1" value="{JUMIN1}" />
	<input type="hidden" name="jumin2" value="{JUMIN2}" />
<!-- END switch_jumin_ig -->
<!-- BEGIN switch_mphone_ig -->
	<input type="hidden" name="mphone1" value="{MPHONE1_RAW}" />
	<input type="hidden" name="mphone2" value="{MPHONE2}" />
	<input type="hidden" name="mphone3" value="{MPHONE3}" />
<!-- END switch_mphone_ig -->
<!-- BEGIN switch_hphone_ig -->
	<input type="hidden" name="hphone1" value="{HPHONE1_RAW}" />
	<input type="hidden" name="hphone2" value="{HPHONE2}" />
	<input type="hidden" name="hphone3" value="{HPHONE3}" />
<!-- END switch_hphone_ig -->
<!-- BEGIN switch_occ_ig -->
	<input type="hidden" name="occupation" value="{OCCUPATION_RAW}" />
<!-- END switch_occ_ig -->
<!-- BEGIN switch_from_ig -->
	<input type="hidden" name="zipcode1" value="{ZIPCODE1}" />
	<input type="hidden" name="zipcode2" value="{ZIPCODE2}" />
	<input type="hidden" name="location" value="{LOCATION}" />
	<input type="hidden" name="location2" value="{LOCATION2}" />
<!-- END switch_from_ig -->
<!-- BEGIN switch_birth_ig -->
	<input type="hidden" name="b_year" value="{B_YEAR_RAW}" />
	<input type="hidden" name="b_md" value="{B_MD_RAW}" />
	<input type="hidden" name="b_day" value="{B_DAY_RAW}" />
<!-- END switch_birth_ig -->
<!-- BEGIN switch_gender_ig -->
	<input type="hidden" name="gender" value="{GENDER}" />
<!-- END switch_gender_ig -->
<!-- BEGIN switch_remark1_ig -->
	<input type="hidden" name="remark1" value="{REMARK1}" />
<!-- END switch_remark1_ig -->
<!-- BEGIN switch_remark2_ig -->
	<input type="hidden" name="remark2" value="{REMARK2}" />
<!-- END switch_remark2_ig -->
<!-- BEGIN switch_remark3_ig -->
	<input type="hidden" name="remark3" value="{REMARK3}" />
<!-- END switch_remark3_ig -->
<!-- BEGIN switch_remark4_ig -->
	<input type="hidden" name="remark4" value="{REMARK4}" />
<!-- END switch_remark4_ig -->
<!-- BEGIN switch_remark5_ig -->
	<input type="hidden" name="remark5" value="{REMARK5}" />
<!-- END switch_remark5_ig -->
<!-- BEGIN switch_remark6_ig -->
	<input type="hidden" name="remark6" value="{REMARK6}" />
<!-- END switch_remark6_ig -->
<!-- BEGIN switch_remark7_ig -->
	<input type="hidden" name="remark7" value="{REMARK7}" />
<!-- END switch_remark7_ig -->
<!-- BEGIN switch_remark8_ig -->
	<input type="hidden" name="remark8" value="{REMARK8}" />
<!-- END switch_remark8_ig -->
<!-- BEGIN switch_remark9_ig -->
	<input type="hidden" name="remark9" value="{REMARK9}" />
<!-- END switch_remark9_ig -->
<!-- BEGIN switch_remark10_ig -->
	<input type="hidden" name="remark10" value="{REMARK10}" />
<!-- END switch_remark10_ig -->
<!-- BEGIN switch_remark11_ig -->
	<input type="hidden" name="remark11" value="{REMARK11}" />
<!-- END switch_remark11_ig -->
<!-- BEGIN switch_remark12_ig -->
	<input type="hidden" name="remark12" value="{REMARK12}" />
<!-- END switch_remark12_ig -->
<!-- BEGIN switch_remark13_ig -->
	<input type="hidden" name="remark13" value="{REMARK13}" />
<!-- END switch_remark13_ig -->
<!-- BEGIN switch_remark14_ig -->
	<input type="hidden" name="remark14" value="{REMARK14}" />
<!-- END switch_remark14_ig -->
<!-- BEGIN switch_remark15_ig -->
	<input type="hidden" name="remark15" value="{REMARK15}" />
<!-- END switch_remark15_ig -->
<!-- BEGIN switch_remark16_ig -->
	<input type="hidden" name="remark16" value="{REMARK16}" />
<!-- END switch_remark16_ig -->
<!-- BEGIN switch_remark17_ig -->
	<input type="hidden" name="remark17" value="{REMARK17}" />
<!-- END switch_remark17_ig -->
<!-- BEGIN switch_remark18_ig -->
	<input type="hidden" name="remark18" value="{REMARK18}" />
<!-- END switch_remark18_ig -->
<!-- BEGIN switch_remark19_ig -->
	<input type="hidden" name="remark19" value="{REMARK19}" />
<!-- END switch_remark19_ig -->
<!-- BEGIN switch_remark20_ig -->
	<input type="hidden" name="remark20" value="{REMARK20}" />
<!-- END switch_remark20_ig -->

	<!--tr> 
	  <th class="thSides" colspan="2" height="12" valign="middle"><b>{L_AVATAR_PANEL}</b></th>
	</tr>
	<tr align="center"> 
	  <td bgcolor=#fafafa colspan="2"> 
		<table width="70%" cellspacing="2" cellpadding="0" border="0">
		  <tr> 
			<td width="70%"><span class="genmed"><font color="#A7A7A7">{L_AVATAR_EXPLAIN}</font></span></td>
			<td align="center"><span class="genmed"><font color="#A7A7A7">{L_CURRENT_IMAGE}</font></span><br />
			  {AVATAR}<br />
			  <input type="checkbox" name="avatardel" />
			  &nbsp;<span class="genmed"><font color="#A7A7A7">{L_DELETE_AVATAR}</font></span></td>
		  </tr>
		</table>
	  </td>
	</tr-->

	<!-- BEGIN avatar_local_upload -->
	<!--tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_UPLOAD_AVATAR_FILE}</b></span></td>
	  <td> 
		<input type="hidden" name="MAX_FILE_SIZE" value="{AVATAR_SIZE}" />
		<input type="file" name="avatar" class="post" style="width: 200px"  />
	  </td>
	</tr-->
	<!-- END avatar_local_upload -->
	<!-- BEGIN avatar_remote_upload -->
	<!--tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_UPLOAD_AVATAR_URL}</b></span></td>
	  <td> 
		<input class="post" type="text" name="avatarurl" size="40" class="post" style="width: 200px"  />
	  </td>
	</tr-->
	<!-- END avatar_remote_upload -->
	<!-- BEGIN avatar_remote_link -->
	<!--tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_LINK_REMOTE_AVATAR}</b></span></td>
	  <td> 
		<input class="post" type="text" name="avatarremoteurl" size="40" class="post" style="width: 200px"  />
	  </td>
	</tr-->
	<!-- END avatar_remote_link -->
	<!-- BEGIN avatar_local_gallery -->
	<!--tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_AVATAR_GALLERY}</b></span></td>
	  <td> 
		<input type="submit" name="avatargallery" value="{L_SHOW_GALLERY}" class="liteoption" />
	  </td>
	</tr-->
	<!-- END avatar_local_gallery -->
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td  colspan="2" height="25" valign="middle" align=center><span class="gen"><b><font color="#000000">{L_SPECIAL}</font></b></span></td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_UPLOAD_QUOTA}</b></span></td>
	  <td>{S_SELECT_UPLOAD_QUOTA}</td>
	</tr>
	<input type='hidden' name='user_pm_quota' value='{PM_QUOTA_RAW}'>
	<tr>
	  <td bgcolor=#fafafa colspan="2"><span class="genmed"><font color="#A7A7A7">{L_SPECIAL_EXPLAIN}</font></span></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_USER_ACTIVE}</b></span></td>
	  <td> 
		<input type="radio" name="user_status" value="1" {USER_ACTIVE_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="user_status" value="0" {USER_ACTIVE_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_ALLOW_PM}</b></span></td>
	  <td> 
		<input type="radio" name="user_allowpm" value="1" {ALLOW_PM_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="user_allowpm" value="0" {ALLOW_PM_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<!--tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_ALLOW_AVATAR}</b></span></td>
	  <td> 
		<input type="radio" name="user_allowavatar" value="1" {ALLOW_AVATAR_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="user_allowavatar" value="0" {ALLOW_AVATAR_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr-->
	<tr>
		<td bgcolor=#fafafa><span class="gen"><b>{L_SELECT_RANK}</b></span></td>
		<td><select name="user_rank">{RANK_SELECT_BOX}</select></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa><span class="gen"><b>{L_DELETE_USER}</b></span></td>
	  <td> 
		<input type="checkbox" name="deleteuser" class="formstyle3">
		{L_DELETE_USER_EXPLAIN}</td>
	</tr>
	<tr> 
		<td colspan="2" height="1" >
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr> 
					<td height="1" bgcolor="#{THEME_COLOR_30}"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
	  <td colspan="2" align="center">{S_HIDDEN_FIELDS} 
		<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />
		&nbsp;&nbsp; 
		<input type="reset" value="{L_RESET}" class="mainoption" />
	  </td>
	</tr>
</table></form>
<br><br>