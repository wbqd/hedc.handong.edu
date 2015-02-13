
<h1>{L_USER_TITLE}</h1>

<p>{L_USER_EXPLAIN}</p>

{ERROR_BOX}

<form name="regform" action="{S_PROFILE_ACTION}" {S_FORM_ENCTYPE} method="post"><table width="98%" cellspacing="1" cellpadding="4" border="0" align="center" class="forumline">
	<tr> 
	  <th class="thHead" colspan="2">{L_REGISTRATION_INFO}</th>
	</tr>
<!------------------------------- 필수 입력 템플릿 ---------------------------------->
	<tr> 
	  <td class="row2" colspan="2"><span class="gensmall">{L_ITEMS_REQUIRED}</span></td>
	</tr>
	<tr> 
	  <td class="row1" width="38%"><span class="gen">{L_USERNAME}: *</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="username" size="35" maxlength="40" value="{USERNAME}" />
	  </td>
	</tr>
<!-- BEGIN switch_realname_req -->
	<tr> 
	  <td class="row1"><span class="gen">{L_REALNAME} * </span></td>
	  <td class="row2">
      <input type="text" class="post"style="width200px"  name="realname" size="35" maxlength="6" value="{REALNAME}" />
      </td>
	</tr>
<!-- END switch_realname_req -->

<!-- BEGIN switch_jumin_req -->
	<tr><td class="row1"><span class="gen">{L_JUMIN} * </span></td>
	    <td class="row2"> 
		  <input type="text" class="post"style="width: 70px"  name="jumin1" size="10" maxlength="6" value="{JUMIN1}" />
        - <input type="text" class="post"style="width: 70px"  name="jumin2" size="10" maxlength="7" value="{JUMIN2}" /></td>
	 </tr>
<!-- END switch_jumin_req -->
	<tr> 
	  <td class="row1"><span class="gen">{L_EMAIL_ADDRESS}: *</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="email" size="35" maxlength="255" value="{EMAIL}" />
	  </td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_NEW_PASSWORD}: *</span><br />
		<span class="gensmall">{L_PASSWORD_IF_CHANGED}</span></td>
	  <td class="row2"> 
		<input class="post" type="password" name="password" size="35" maxlength="32" value="" />
	  </td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_CONFIRM_PASSWORD}: * </span><br />
		<span class="gensmall">{L_PASSWORD_CONFIRM_IF_CHANGED}</span></td>
	  <td class="row2"> 
		<input class="post" type="password" name="password_confirm" size="35" maxlength="32" value="" />
	  </td>
	</tr>
<!-- BEGIN switch_from_req -->
    <tr> 
      <td class="row1"><span class="gen">{L_ZIPCODE} * </span></td> 
      <td class="row2"> 
        <input type="text" class="post" name="zipcode1" size=4 maxlength=3 class=input READONLY value="{ZIPCODE1}"> - 
        <input type="text" class="post" name="zipcode2" size=4 maxlength=3 class=input READONLY value="{ZIPCODE2}">
        <span class="gen"><a href="#" onClick="window.open('../zipsearch.php','zipsearch','width=500,height=180,scrollbars=no')"> <img src=../templates/webmanager/images/zipcode.gif border=0 align="absmiddle"></a></span>
     </td> 
    </tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_LOCATION} *</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="location" size="35" maxlength="100" value="{LOCATION}" />
        </td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_LOCATION2} *</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="location2" size="35" maxlength="50" value="{LOCATION2}" />
	  </td>
	</tr>
<!-- END switch_from_req -->

<!-- BEGIN switch_occ_req -->
	<tr> 
	  <td class="row1"><span class="gen">{L_OCCUPATION} *</span></td>
	  <td class="row2">{OCCUPATION} 
       </td>
	</tr>
<!-- END switch_occ_req -->

<!-- BEGIN switch_mphone_req -->
    <tr> 
      <td class="row1"><span class="gen">{L_MPHONE} * </span></td> 
      <td class="row2">{MPHONE1}
       <input type="text" class="post"style="width: 50px"  name="mphone2" size="10" maxlength="4" value="{MPHONE2}" /> - 
       <input type="text" class="post"style="width: 50px"  name="mphone3" size="10" maxlength="4" value="{MPHONE3}" />
       </td> 
    </tr>
<!-- END switch_mphone_req -->

<!-- BEGIN switch_hphone_req -->
    <tr> 
      <td class="row1"><span class="gen">{L_HPHONE} *  </span></td> 
      <td class="row2">{HPHONE1}
       <input type="text" class="post"style="width: 50px"  name="hphone2" size="10" maxlength="4" value="{HPHONE2}" /> - 
       <input type="text" class="post"style="width: 50px"  name="hphone3" size="10" maxlength="4" value="{HPHONE3}" />
        </td> 
    </tr>
<!-- END switch_hphone_req -->

<!-- BEGIN switch_gender_req -->
     <tr> 
      <td class="row1"><span class="gen">{L_GENDER} * </span></td> 
      <td class="row2">       
      <input type="radio" name="gender" value="1" {GENDER_MALE_CHECKED}/> 
      <span class="gen">{L_GENDER_MALE}</span>&nbsp;&nbsp; 
      <input type="radio" name="gender" value="2" {GENDER_FEMALE_CHECKED}/> 
      <span class="gen">{L_GENDER_FEMALE}</span>&nbsp;&nbsp; 
      </td>
    </tr>
<!-- END switch_gender_req -->

<!-- BEGIN switch_birth_req -->
    <tr> 
       <td class="row1"><span class="gen">{L_BIRTHDAY} * </span></td>
       <td class="row2">{S_BIRTHDAY}
       </td>
    </tr>
<!-- END switch_birth_req -->

<!-- BEGIN switch_remark1_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK1}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark1" size="35"  value="{REMARK1}" />
      </td>
	</tr>
<!-- END switch_remark1_req -->
<!-- BEGIN switch_remark2_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK2}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark2" size="35"  value="{REMARK2}" />
      </td>
	</tr>
<!-- END switch_remark2_req -->
<!-- BEGIN switch_remark3_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK3}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark3" size="35"  value="{REMARK3}" />
      </td>
	</tr>
<!-- END switch_remark3_req -->
<!-- BEGIN switch_remark4_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK4}</b> <font color="#F26D7D">* </span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark4" size="35"  value="{REMARK4}" />
      </td>
	</tr>
<!-- END switch_remark4_req -->
<!-- BEGIN switch_remark5_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK5}</b> <font color="#F26D7D">* </span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark5" size="35"  value="{REMARK5}" />
      </td>
	</tr>
<!-- END switch_remark5_req -->
<!-- BEGIN switch_remark6_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK6}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark6" size="35"  value="{REMARK6}" />
      </td>
	</tr>
<!-- END switch_remark6_req -->
<!-- BEGIN switch_remark7_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK7}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark7" size="35"  value="{REMARK7}" />
      </td>
	</tr>
<!-- END switch_remark7_req -->
<!-- BEGIN switch_remark8_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK8}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark8" size="35"  value="{REMARK8}" />
      </td>
	</tr>
<!-- END switch_remark8_req -->
<!-- BEGIN switch_remark9_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK9}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark9" size="35"  value="{REMARK9}" />
      </td>
	</tr>
<!-- END switch_remark9_req -->
<!-- BEGIN switch_remark10_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK10}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark10" size="35"  value="{REMARK10}" />
      </td>
	</tr>
<!-- END switch_remark10_req -->
<!-- BEGIN switch_remark11_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK11}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark11" size="35"  value="{REMARK11}" />
      </td>
	</tr>
<!-- END switch_remark11_req -->
<!-- BEGIN switch_remark12_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK12}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark12" size="35"  value="{REMARK12}" />
      </td>
	</tr>
<!-- END switch_remark12_req -->
<!-- BEGIN switch_remark13_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK13}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark13" size="35"  value="{REMARK13}" />
      </td>
	</tr>
<!-- END switch_remark13_req -->
<!-- BEGIN switch_remark14_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK14}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark14" size="35"  value="{REMARK14}" />
      </td>
	</tr>
<!-- END switch_remark14_req -->
<!-- BEGIN switch_remark15_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK15}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark15" size="35"  value="{REMARK15}" />
      </td>
	</tr>
<!-- END switch_remark15_req -->
<!-- BEGIN switch_remark16_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK16}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark16" size="35"  value="{REMARK16}" />
      </td>
	</tr>
<!-- END switch_remark16_req -->
<!-- BEGIN switch_remark17_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK17}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark17" size="35"  value="{REMARK17}" />
      </td>
	</tr>
<!-- END switch_remark17_req -->
<!-- BEGIN switch_remark18_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK18}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark18" size="35"  value="{REMARK18}" />
      </td>
	</tr>
<!-- END switch_remark18_req -->
<!-- BEGIN switch_remark19_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK19}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark19" size="35"  value="{REMARK19}" />
      </td>
	</tr>
<!-- END switch_remark19_req -->
<!-- BEGIN switch_remark20_req -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK20}</b> <font color="#F26D7D">*</font></span></td>
	  <td class="row2">
      <input type="text" class="post"  name="remark20" size="35"  value="{REMARK20}" />
      </td>
	</tr>
<!-- END switch_remark20_req -->

	<tr> 
	  <td class="catsides" colspan="2">&nbsp;</td>
	</tr>
<!------------------------------- 선택입력 템플릿-------------------------------------->
	<tr> 
	  <th class="thSides" colspan="2">{L_PROFILE_INFO}</th>
	</tr>
	<tr> 
	  <td class="row2" colspan="2"><span class="gensmall">{L_PROFILE_INFO_NOTICE}</span></td>
	</tr>
<!-- BEGIN switch_use_realname -->
	<tr> 
	  <td class="row1"><span class="gen">{L_REALNAME} </span></td>
	  <td class="row2"><input type="text" class="post"style="width200px"  name="realname" size="35" maxlength="6" value="{REALNAME}" />
      </td>
	</tr>
<!-- END switch_use_realname -->

<!-- BEGIN switch_use_jumin -->
	<tr><td class="row1"><span class="gen">{L_JUMIN} </span></td>
	    <td class="row2"> 
		  <input type="text" class="post"style="width: 70px"  name="jumin1" size="10" maxlength="6" value="{JUMIN1}" /> -
          <input type="text" class="post"style="width: 70px"  name="jumin2" size="10" maxlength="7" value="{JUMIN2}" /></td>
	 </tr>
<!-- END switch_use_jumin -->

<!-- BEGIN switch_use_from -->
    <tr> 
      <td class="row1"><span class="gen">{L_ZIPCODE} </span></td> 
      <td class="row2"> 
        <input type="text" class="post" name="zipcode1" size=4 maxlength=3 class=input READONLY value="{ZIPCODE1}"> - 
        <input type="text" class="post" name="zipcode2" size=4 maxlength=3 class=input READONLY value="{ZIPCODE2}">
        <span class="gen"><a href="#" onClick="window.open('../zipsearch.php','zipsearch','width=500,height=180,scrollbars=no')"> <img src=../templates/webmanager/images/zipcode.gif border=0 align="absmiddle"></a></span>
     </td> 
    </tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_LOCATION} </span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="location" size="35" maxlength="100" value="{LOCATION}" />
        </td>
	  </td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_LOCATION2} </span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="location2" size="35" maxlength="50" value="{LOCATION2}" />
	  </td>
	</tr>
<!-- END switch_use_from -->

<!-- BEGIN switch_use_occ -->
	<tr> 
	  <td class="row1"><span class="gen">{L_OCCUPATION} </span></td>
	  <td class="row2">{OCCUPATION}
      </td>
	</tr>
<!-- END switch_use_occ -->

<!-- BEGIN switch_use_mphone -->
    <tr> 
      <td class="row1"><span class="gen">{L_MPHONE} </span></td> 
      <td class="row2">{MPHONE1}
       <input type="text" class="post"style="width: 50px"  name="mphone2" size="10" maxlength="4" value="{MPHONE2}" /> - 
       <input type="text" class="post"style="width: 50px"  name="mphone3" size="10" maxlength="4" value="{MPHONE3}" />
       </td>
    </tr>
<!-- END switch_use_mphone -->

<!-- BEGIN switch_use_hphone -->
    <tr> 
      <td class="row1"><span class="gen">{L_HPHONE} </span></td> 
      <td class="row2">{HPHONE1}
       <input type="text" class="post"style="width: 50px"  name="hphone2" size="10" maxlength="4" value="{HPHONE2}" /> - 
       <input type="text" class="post"style="width: 50px"  name="hphone3" size="10" maxlength="4" value="{HPHONE3}" />
       </td> 
    </tr>
<!-- END switch_use_hphone -->

<!-- BEGIN switch_use_gender -->
    <tr> 
      <td class="row1"><span class="gen">{L_GENDER}</span></td> 
      <td class="row2"> 
      <input type="radio" name="gender" value="1" {GENDER_MALE_CHECKED}/> 
      <span class="gen">{L_GENDER_MALE}</span>&nbsp;&nbsp; 
      <input type="radio" name="gender" value="2" {GENDER_FEMALE_CHECKED}/> 
      <span class="gen">{L_GENDER_FEMALE}</span> 
	  </td> 
   </tr>
<!-- END switch_use_gender -->

<!-- BEGIN switch_use_birth -->
    <tr> 
      <td class="row1"><span class="gen">{L_BIRTHDAY}</span></td>
      <td class="row2"> {S_BIRTHDAY}
       </td>
    </tr>
<!-- END switch_use_birth -->

<!-- BEGIN switch_use_remark1 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK1}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark1" size="35"  value="{REMARK1}" />
	 </td>
	</tr>
<!-- END switch_use_remark1 -->
<!-- BEGIN switch_use_remark2 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK2}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark2" size="35"  value="{REMARK2}" />
	 </td>
	</tr>
<!-- END switch_use_remark2 -->
<!-- BEGIN switch_use_remark3 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK3}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark3" size="35"  value="{REMARK3}" />
	 </td>
	</tr>
<!-- END switch_use_remark3 -->
<!-- BEGIN switch_use_remark4 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK4}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark4" size="35"  value="{REMARK4}" />
	 </td>
	</tr>
<!-- END switch_use_remark4 -->
<!-- BEGIN switch_use_remark5 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK5}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark5" size="35"  value="{REMARK5}" />
	 </td>
	</tr>
<!-- END switch_use_remark5 -->
<!-- BEGIN switch_use_remark6 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK6}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark6" size="35"  value="{REMARK6}" />
	 </td>
	</tr>
<!-- END switch_use_remark6 -->
<!-- BEGIN switch_use_remark7 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK7}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark7" size="35"  value="{REMARK7}" />
	 </td>
	</tr>
<!-- END switch_use_remark7 -->
<!-- BEGIN switch_use_remark8 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK8}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark8" size="35"  value="{REMARK8}" />
	 </td>
	</tr>
<!-- END switch_use_remark8 -->
<!-- BEGIN switch_use_remark9 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK9}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark9" size="35"  value="{REMARK9}" />
	 </td>
	</tr>
<!-- END switch_use_remark9 -->
<!-- BEGIN switch_use_remark10 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK10}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark10" size="35"  value="{REMARK10}" />
	 </td>
	</tr>
<!-- END switch_use_remark10 -->
<!-- BEGIN switch_use_remark11 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK11}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark11" size="35"  value="{REMARK11}" />
	 </td>
	</tr>
<!-- END switch_use_remark11 -->
<!-- BEGIN switch_use_remark12 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK12}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark12" size="35"  value="{REMARK12}" />
	 </td>
	</tr>
<!-- END switch_use_remark12 -->
<!-- BEGIN switch_use_remark13 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK13}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark13" size="35"  value="{REMARK13}" />
	 </td>
	</tr>
<!-- END switch_use_remark13 -->
<!-- BEGIN switch_use_remark14 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK14}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark14" size="35"  value="{REMARK14}" />
	 </td>
	</tr>
<!-- END switch_use_remark14 -->
<!-- BEGIN switch_use_remark15 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK15}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark15" size="35"  value="{REMARK15}" />
	 </td>
	</tr>
<!-- END switch_use_remark15 -->
<!-- BEGIN switch_use_remark16 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK16}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark16" size="35"  value="{REMARK16}" />
	 </td>
	</tr>
<!-- END switch_use_remark16 -->
<!-- BEGIN switch_use_remark17 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK17}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark17" size="35"  value="{REMARK17}" />
	 </td>
	</tr>
<!-- END switch_use_remark17 -->
<!-- BEGIN switch_use_remark18 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK18}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark18" size="35"  value="{REMARK18}" />
	 </td>
	</tr>
<!-- END switch_use_remark18 -->
<!-- BEGIN switch_use_remark19 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK19}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark19" size="35"  value="{REMARK19}" />
	 </td>
	</tr>
<!-- END switch_use_remark19 -->
<!-- BEGIN switch_use_remark20 -->
	<tr> 
	  <td class="row1"><span class="gen"><b>{TITLE_REMARK20}</b></span></td>
	  <td class="row2"><input type="text" class="post"  name="remark20" size="35"  value="{REMARK20}" />
	 </td>
	</tr>
<!-- END switch_use_remark20 -->

	<tr> 
	  <td class="row1"><span class="gen">{L_ICQ_NUMBER}</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="icq" size="10" maxlength="15" value="{ICQ}" />
	  </td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_AIM}</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="aim" size="20" maxlength="255" value="{AIM}" />
	  </td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_MESSENGER}</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="msn" size="20" maxlength="255" value="{MSN}" />
	  </td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_YAHOO}</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="yim" size="20" maxlength="255" value="{YIM}" />
	  </td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_WEBSITE}</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="website" size="35" maxlength="255" value="{WEBSITE}" />
	  </td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_INTERESTS}</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="interests" size="35" maxlength="150" value="{INTERESTS}" />
	  </td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_SIGNATURE}</span><br />
		<span class="gensmall">{L_SIGNATURE_EXPLAIN}<br />
		<br />
		{HTML_STATUS}<br />
		{BBCODE_STATUS}<br />
		{SMILIES_STATUS}</span></td>
	  <td class="row2"> 
		<textarea class="post" name="signature" rows="6" cols="45">{SIGNATURE}</textarea>
	  </td>
	</tr>
	<tr> 
	  <td class="catsides" colspan="2"><span class="cattitle">&nbsp;</span></td>
	</tr>
	<tr> 
	  <th class="thSides" colspan="2">{L_PREFERENCES}</th>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_PUBLIC_VIEW_EMAIL}</span></td>
	  <td class="row2"> 
		<input type="radio" name="viewemail" value="1" {VIEW_EMAIL_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="viewemail" value="0" {VIEW_EMAIL_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_HIDE_USER}</span></td>
	  <td class="row2"> 
		<input type="radio" name="hideonline" value="1" {HIDE_USER_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="hideonline" value="0" {HIDE_USER_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_NOTIFY_ON_REPLY}</span></td>
	  <td class="row2"> 
		<input type="radio" name="notifyreply" value="1" {NOTIFY_REPLY_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="notifyreply" value="0" {NOTIFY_REPLY_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_NOTIFY_ON_PRIVMSG}</span></td>
	  <td class="row2"> 
		<input type="radio" name="notifypm" value="1" {NOTIFY_PM_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="notifypm" value="0" {NOTIFY_PM_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_POPUP_ON_PRIVMSG}</span></td>
	  <td class="row2"> 
		<input type="radio" name="popup_pm" value="1" {POPUP_PM_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="popup_pm" value="0" {POPUP_PM_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_ALWAYS_ADD_SIGNATURE}</span></td>
	  <td class="row2"> 
		<input type="radio" name="attachsig" value="1" {ALWAYS_ADD_SIGNATURE_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="attachsig" value="0" {ALWAYS_ADD_SIGNATURE_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_ALWAYS_ALLOW_BBCODE}</span></td>
	  <td class="row2"> 
		<input type="radio" name="allowbbcode" value="1" {ALWAYS_ALLOW_BBCODE_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="allowbbcode" value="0" {ALWAYS_ALLOW_BBCODE_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_ALWAYS_ALLOW_HTML}</span></td>
	  <td class="row2"> 
		<input type="radio" name="allowhtml" value="1" {ALWAYS_ALLOW_HTML_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="allowhtml" value="0" {ALWAYS_ALLOW_HTML_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_ALWAYS_ALLOW_SMILIES}</span></td>
	  <td class="row2"> 
		<input type="radio" name="allowsmilies" value="1" {ALWAYS_ALLOW_SMILIES_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="allowsmilies" value="0" {ALWAYS_ALLOW_SMILIES_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_BOARD_LANGUAGE}</span></td>
	  <td class="row2">{LANGUAGE_SELECT}</td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_BOARD_STYLE}</span></td>
	  <td class="row2">{STYLE_SELECT}</td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_TIMEZONE}</span></td>
	  <td class="row2">{TIMEZONE_SELECT}</td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_DATE_FORMAT}</span><br />
		<span class="gensmall">{L_DATE_FORMAT_EXPLAIN}</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="dateformat" value="{DATE_FORMAT}" maxlength="16" />
	  </td>
	</tr>
	<tr> 
	  <td class="catSides" colspan="2"><span class="cattitle">&nbsp;</span></td>
	</tr>
	<tr> 
	  <th class="thSides" colspan="2" height="12" valign="middle">{L_AVATAR_PANEL}</th>
	</tr>
	<tr align="center"> 
	  <td class="row1" colspan="2"> 
		<table width="70%" cellspacing="2" cellpadding="0" border="0">
		  <tr> 
			<td width="65%"><span class="gensmall">{L_AVATAR_EXPLAIN}</span></td>
			<td align="center"><span class="gensmall">{L_CURRENT_IMAGE}</span><br />
			  {AVATAR}<br />
			  <input type="checkbox" name="avatardel" />
			  &nbsp;<span class="gensmall">{L_DELETE_AVATAR}</span></td>
		  </tr>
		</table>
	  </td>
	</tr>

	<!-- BEGIN avatar_local_upload -->
	<tr> 
	  <td class="row1"><span class="gen">{L_UPLOAD_AVATAR_FILE}</span></td>
	  <td class="row2"> 
		<input type="hidden" name="MAX_FILE_SIZE" value="{AVATAR_SIZE}" />
		<input type="file" name="avatar" class="post" style="width: 200px"  />
	  </td>
	</tr>
	<!-- END avatar_local_upload -->
	<!-- BEGIN avatar_remote_upload -->
	<tr> 
	  <td class="row1"><span class="gen">{L_UPLOAD_AVATAR_URL}</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="avatarurl" size="40" class="post" style="width: 200px"  />
	  </td>
	</tr>
	<!-- END avatar_remote_upload -->
	<!-- BEGIN avatar_remote_link -->
	<tr> 
	  <td class="row1"><span class="gen">{L_LINK_REMOTE_AVATAR}</span></td>
	  <td class="row2"> 
		<input class="post" type="text" name="avatarremoteurl" size="40" class="post" style="width: 200px"  />
	  </td>
	</tr>
	<!-- END avatar_remote_link -->
	<!-- BEGIN avatar_local_gallery -->
	<tr> 
	  <td class="row1"><span class="gen">{L_AVATAR_GALLERY}</span></td>
	  <td class="row2"> 
		<input type="submit" name="avatargallery" value="{L_SHOW_GALLERY}" class="liteoption" />
	  </td>
	</tr>
	<!-- END avatar_local_gallery -->

	<tr> 
	  <td class="catSides" colspan="2">&nbsp;</td>
	</tr>
	<tr>
	  <th class="thSides" colspan="2">{L_SPECIAL}</th>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_UPLOAD_QUOTA}</span></td>
	  <td class="row2">{S_SELECT_UPLOAD_QUOTA}</td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_PM_QUOTA}</span></td>
	  <td class="row2">{S_SELECT_PM_QUOTA}</td>
	</tr>
	<tr>
	  <td class="row1" colspan="2"><span class="gensmall">{L_SPECIAL_EXPLAIN}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_USER_ACTIVE}</span></td>
	  <td class="row2"> 
		<input type="radio" name="user_status" value="1" {USER_ACTIVE_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="user_status" value="0" {USER_ACTIVE_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_ALLOW_PM}</span></td>
	  <td class="row2"> 
		<input type="radio" name="user_allowpm" value="1" {ALLOW_PM_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="user_allowpm" value="0" {ALLOW_PM_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_ALLOW_AVATAR}</span></td>
	  <td class="row2"> 
		<input type="radio" name="user_allowavatar" value="1" {ALLOW_AVATAR_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="user_allowavatar" value="0" {ALLOW_AVATAR_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr>
		<td class="row1"><span class="gen">{L_SELECT_RANK}</span></td>
		<td class="row2"><select name="user_rank">{RANK_SELECT_BOX}</select></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_DELETE_USER}?</span></td>
	  <td class="row2"> 
		<input type="checkbox" name="deleteuser">
		{L_DELETE_USER_EXPLAIN}</td>
	</tr>
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

	<tr> 
	  <td class="catBottom" colspan="2" align="center">{S_HIDDEN_FIELDS} 
		<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />
		&nbsp;&nbsp; 
		<input type="reset" value="{L_RESET}" class="liteoption" />
	  </td>
	</tr>
</table></form>
