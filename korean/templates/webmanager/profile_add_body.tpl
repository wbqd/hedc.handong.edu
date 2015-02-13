<script language="javascript"> 
<!--
function CheckForm(regform) {

   if(!regform.username.value) {
      alert('아이디를 입력하세요!');
      regform.username.focus();
      return false;
   }
<!-- BEGIN switch_realname_req -->
   if(!regform.realname.value) {
       alert('닉 네임 또는 이름을 입력하세요!');
       regform.realname.focus();
       return false;
   } else {
	   returnvalue = CheckStr(regform.realname.value);
	   if (!returnvalue) {
		   alert("이름은 한글로만 작성하세요. ");
		   regform.realname.select();
		   return false;
	   }
   }
   if(regform.realname.value.length < 2) {
	  alert('이름은 두자 이상 입력하세요...');
	  regform.realname.focus();
      return false;
   }
<!-- END switch_realname_req -->

<!-- BEGIN switch_jumin_req -->
   if(!regform.jumin1.value) {
       alert('주민등록번호를 입력하세요!');
       regform.jumin1.focus();
       return false;
   } else {
	   returnvalue = CheckNum(regform.jumin1.value);
	   if (!returnvalue) {
		   alert("주민등록번호는 숫자만 입력하세요..");
		   regform.jumin1.focus();
		   regform.jumin1.select();
		   return false;
	   }
   }
   if(regform.jumin1.value.length < 6) {
	  alert('주민등록번호 앞자리는 6자리 숫자여야 합니다.');
	  regform.jumin1.focus();
      return false;
   }
   if(!regform.jumin2.value) {
       alert('주민등록번호 뒷자리를 입력하세요!');
       regform.jumin2.focus();
       return false;
   } else {
	   returnvalue = CheckNum(regform.jumin2.value);
	   if (!returnvalue) {
		   alert("주민등록번호는 숫자만 입력하세요..");
		   regform.jumin2.focus();
		   regform.jumin2.select();
		   return false;
	   }
   }
   if(regform.jumin2.value.length < 7) {
	  alert('주민등록번호 뒷자리는 7자리 숫자여야 합니다.');
	  regform.jumin2.focus();
      return false;
   }
<!-- END switch_jumin_req -->
   if(!regform.email.value) {
      alert('E-Mail을 입력하세요!');
      regform.email.focus();
      return false;
   }
<!-- BEGIN switch_user_logged_out -->
   if(!regform.new_password.value) {
      alert('비밀번호를 입력하세요!');
      regform.new_password.focus();
      return false;
   }
   if(regform.new_password.value) {
      if(regform.new_password.value.length<4 || regform.new_password.value.length>10) {
	     alert('비밀번호는 최소 4자 이상, 10자 이하의 숫자 또는 영문이어야 합니다.');
	     regform.new_password.select();
	     regform.new_password.focus();
         return false;
      }
   }
   if(!regform.password_confirm.value) {
      alert('비밀번호 확인을 입력하세요');
      regform.password_confirm.focus();
      return false;
   }
   if(regform.new_password.value != regform.password_confirm.value) { 
      alert('비밀번호가 서로 다르게 입력되었습니다.'); 
      regform.password_confirm.value=''; 
      regform.password_confirm.focus(); 
      return false; 
   } 
<!-- END switch_user_logged_out -->

<!-- BEGIN switch_from_req -->
   if(!regform.location.value) {
       alert('우편번호 자동찾기로 주소를 입력하세요');
       regform.location.focus();
       return false;
   }
   if(!regform.location2.value) {
       alert('나머지 주소를 입력하세요');
       regform.location2.focus();
       return false;
   }
<!-- END switch_from_req -->

<!-- BEGIN switch_occ_req -->
   if(regform.occupation[0].selected == true) { 
      alert('직업을 선택해주세요'); 
      regform.occupation.focus();
      return false; 
   } 
<!-- END switch_occ_req -->

<!-- BEGIN switch_mphone_req -->
	if (regform.mphone1[0].selected == true) {
		alert("지역번호를 선택하십시오!");
		regform.mphone1.focus();
		return false;
	}
    if (!regform.mphone2.value) {
		alert("전화국번을 입력하십시오!");
		regform.mphone2.focus();
		return false;
    } else {
		returnvalue = CheckNum(regform.mphone2.value);
		if (!returnvalue) {
		    alert("전화국번은 숫자로만 입력하세요..");
		    regform.mphone2.focus();
		    regform.mphone2.select();
		    return false;
		} else if (regform.mphone2.value.length < 3 || regform.mphone2.value.length > 4) {
	        alert('전화국번은 3자리 이상 4자리 이하의 숫자로만 작성하셔야 합니다.');
	        regform.mphone2.focus();
            return false;
        }
	}
    if (!regform.mphone3.value) {
		alert("전화번호를 입력하십시오!");
		regform.mphone3.focus();
		return false;
    } else {
		returnvalue = CheckNum(regform.mphone3.value);
		if (!returnvalue) {
		    alert("전화번호는 숫자로만 입력하세요..");
		    regform.mphone3.focus();
		    regform.mphone3.select();
		    return false;
		} else if (regform.mphone3.value.length < 4) {
	        alert('전화번호는 4자리 숫자로만 작성하셔야 합니다.');
	        regform.mphone3.focus();
            return false;
        }
	}
<!-- END switch_mphone_req -->

<!-- BEGIN switch_hphone_req -->
	if (regform.hphone1[0].selected == true) {
		alert("이동통신사를 선택하십시오!");
		regform.hphone1.focus();
		return false;
	}
    if (!regform.hphone2.value) {
		alert("핸드폰국번을 입력하십시오!");
		regform.hphone2.focus();
		return false;
    } else {
		returnvalue = CheckNum(regform.hphone2.value);
		if (!returnvalue) {
		    alert("핸드폰 국번은 숫자로만 입력하세요..");
		    regform.hphone2.focus();
		    regform.hphone2.select();
		    return false;
		} else if (regform.hphone2.value.length < 3 || regform.hphone2.value.length > 4) {
	        alert('핸드폰국번은 3자리 이상 4자리 이하의 숫자로만 작성하셔야 합니다.');
	        regform.hphone2.focus();
            return false;
        }
	}
    if (!regform.hphone3.value) {
		alert("핸드폰 번호를 입력하십시오!");
		regform.hphone3.focus();
		return false;
    } else {
		returnvalue = CheckNum(regform.hphone3.value);
		if (!returnvalue) {
		    alert("핸드폰번호는 숫자로만 입력하세요..");
		    regform.hphone3.focus();
		    regform.hphone3.select();
		    return false;
		} else if (regform.hphone3.value.length < 4) {
	        alert('핸드폰 번호는 4자리 숫자로만 작성하셔야 합니다.');
	        regform.hphone3.focus();
            return false;
        }
	}
<!-- END switch_hphone_req -->

<!-- BEGIN switch_birth_req -->
    if (regform.b_year.value < 1900 || regform.b_year.value > 2003 || regform.b_year.value <= 0) {
	    alert('생년이 입력되지 않았거나 잘못 입력되었습니다.');
	    regform.b_year.focus();
        regform.b_year.select();
        return false;
    } else if (regform.b_md[0].selected == true) {
		alert("생월을 선택해주세요!");
		regform.b_md.focus();
		return false;
    } else if (regform.b_day[0].selected == true) {
		alert("생일을 선택해주세요!");
		regform.b_day.focus();
		return false;
    }
<!-- END switch_birth_req -->


<!-- BEGIN switch_remark1_req -->
   if(!regform.remark1.value) {
       alert('{L_REMARK1} 입력하세요!');
       regform.remark1.focus();
       return false;
   } 
<!-- END switch_remark1_req -->
<!-- BEGIN switch_remark2_req -->
   if(!regform.remark2.value) {
       alert('{L_REMARK2} 입력하세요!');
       regform.remark2.focus();
       return false;
   } 
<!-- END switch_remark2_req -->
<!-- BEGIN switch_remark3_req -->
   if(!regform.remark3.value) {
       alert('{L_REMARK3} 입력하세요!');
       regform.remark3.focus();
       return false;
   } 
<!-- END switch_remark3_req -->
<!-- BEGIN switch_remark4_req -->
   if(!regform.remark4.value) {
       alert('{L_REMARK4} 입력하세요!');
       regform.remark4.focus();
       return false;
   } 
<!-- END switch_remark4_req -->
<!-- BEGIN switch_remark5_req -->
   if(!regform.remark5.value) {
       alert('{L_REMARK5} 입력하세요!');
       regform.remark5.focus();
       return false;
   } 
<!-- END switch_remark5_req -->
<!-- BEGIN switch_remark6_req -->
   if(!regform.remark6.value) {
       alert('{L_REMARK6} 입력하세요!');
       regform.remark6.focus();
       return false;
   } 
<!-- END switch_remark6_req -->
<!-- BEGIN switch_remark7_req -->
   if(!regform.remark7.value) {
       alert('{L_REMARK7} 입력하세요!');
       regform.remark7.focus();
       return false;
   } 
<!-- END switch_remark7_req -->
<!-- BEGIN switch_remark8_req -->
   if(!regform.remark8.value) {
       alert('{L_REMARK8} 입력하세요!');
       regform.remark8.focus();
       return false;
   } 
<!-- END switch_remark8_req -->
<!-- BEGIN switch_remark9_req -->
   if(!regform.remark9.value) {
       alert('{L_REMARK9} 입력하세요!');
       regform.remark9.focus();
       return false;
   } 
<!-- END switch_remark9_req -->
<!-- BEGIN switch_remark10_req -->
   if(!regform.remark10.value) {
       alert('{L_REMARK10} 입력하세요!');
       regform.remark10.focus();
       return false;
   } 
<!-- END switch_remark10_req -->


<!-- BEGIN switch_remark11_req -->
   if(!regform.remark11.value) {
       alert('{L_REMARK11} 입력하세요!');
       regform.remark11.focus();
       return false;
   } 
<!-- END switch_remark11_req -->
<!-- BEGIN switch_remark12_req -->
   if(!regform.remark12.value) {
       alert('{L_REMARK12} 입력하세요!');
       regform.remark12.focus();
       return false;
   } 
<!-- END switch_remark12_req -->
<!-- BEGIN switch_remark13_req -->
   if(!regform.remark13.value) {
       alert('{L_REMARK13} 입력하세요!');
       regform.remark13.focus();
       return false;
   } 
<!-- END switch_remark13_req -->
<!-- BEGIN switch_remark14_req -->
   if(!regform.remark14.value) {
       alert('{L_REMARK14} 입력하세요!');
       regform.remark14.focus();
       return false;
   } 
<!-- END switch_remark14_req -->
<!-- BEGIN switch_remark15_req -->
   if(!regform.remark15.value) {
       alert('{L_REMARK15} 입력하세요!');
       regform.remark15.focus();
       return false;
   } 
<!-- END switch_remark15_req -->
<!-- BEGIN switch_remark16_req -->
   if(!regform.remark16.value) {
       alert('{L_REMARK16} 입력하세요!');
       regform.remark16.focus();
       return false;
   } 
<!-- END switch_remark16_req -->
<!-- BEGIN switch_remark17_req -->
   if(!regform.remark17.value) {
       alert('{L_REMARK17} 입력하세요!');
       regform.remark17.focus();
       return false;
   } 
<!-- END switch_remark17_req -->
<!-- BEGIN switch_remark18_req -->
   if(!regform.remark18.value) {
       alert('{L_REMARK18} 입력하세요!');
       regform.remark18.focus();
       return false;
   } 
<!-- END switch_remark18_req -->
<!-- BEGIN switch_remark19_req -->
   if(!regform.remark19.value) {
       alert('{L_REMARK19} 입력하세요!');
       regform.remark19.focus();
       return false;
   } 
<!-- END switch_remark19_req -->
<!-- BEGIN switch_remark20_req -->
   if(!regform.remark20.value) {
       alert('{L_REMARK20} 입력하세요!');
       regform.remark20.focus();
       return false;
   } 
<!-- END switch_remark20_req -->


} <!--// End CheckForm //-->

function check_id(ref) { 

   if(!regform.username.value) { 
      alert('아이디를 입력하신 후에 확인하세요!'); 
      regform.username.focus(); 
      return; 
   } else { 
      ref=ref+"?username="+regform.username.value; 
      window.open(ref,"checkid",'width=290,height=130,menubar=no,status=no,scrollbar=no,'); 
   } 
} 
function CheckStr(str) {
	var re = /[a-zA-Z0-9\s~!@#\$%\^&\*\(\)_\+\{\}|:"<>\?`\-=\[\]\\;',\.\/]/; 
	if (re.test(str)) {
		return false;
	}
	return true;
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
// -->
</script>
<table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="right" valign="middle" width="100%"><span class="genmed"><img src="templates/webmanager/images/arrow-head.gif" border="0" align="absmiddle">&nbsp;Home > {L_PROFILE}</span></td>
	</tr>
</table>
<form name="regform" action="{S_PROFILE_ACTION}" {S_FORM_ENCTYPE} method="post" onsubmit='return CheckForm(this);'>

{ERROR_BOX}


<!------------------------------- 필수 입력 템플릿 ---------------------------------->
<table border="0" cellpadding="3" cellspacing="1" width="95%" >
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
	<tr> 
		<td colspan="2"><span class="genmed">{L_ITEMS_REQUIRED}</span></td>
	</tr>
	<!-- BEGIN switch_namechange_disallowed -->
	<tr> 
		<td bgcolor=#fafafa align=right width="30%"><span class="gen"><b>{L_USERNAME}</b> <font color="#F26D7D">*</font></span></td>
		<td><input type="hidden" name="username" value="{USERNAME}" /><span class="gen"><b>{USERNAME}</b></span>
		</td>
	</tr>
	<!-- END switch_namechange_disallowed -->
	<!-- BEGIN switch_namechange_allowed -->
	<tr> 
		<td bgcolor=#fafafa align=right width="30%"><span class="gen"><b>{L_USERNAME}</b> <font color="#F26D7D">*</font></span></td>
		<td><input type="text" class="post" style="width:200px" name="username" size="25" maxlength="25" value="{USERNAME}" />
	<!-- BEGIN switch_user_logged_out -->
             <a href="javascript:check_id('idcheck.php')"><img src=templates/webmanager/images/id.jpg border=0 align="top"></a>
        <!-- END switch_user_logged_out -->
		</td>
	</tr>
	<!-- END switch_namechange_allowed -->

<!-- BEGIN switch_realname_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_REALNAME}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"style="width200px"  name="realname" size="23" value="{REALNAME}" />
       </td>
	</tr>
<!-- END switch_realname_req -->

<!-- BEGIN switch_jumin_req -->
	<tr><td bgcolor=#fafafa align=right ><span class="gen"><b>{L_JUMIN}</b> <font color="#F26D7D">* </font></span></td>
	    <td> 
		  <input type="text" class="post"style="width: 70px"  name="jumin1" size="10" maxlength="6" value="{JUMIN1}" /> - 
          <input type="text" class="post"style="width: 70px"  name="jumin2" size="10" maxlength="7" value="{JUMIN2}" /></td>
	 </tr>
<!-- END switch_jumin_req -->

<!-- BEGIN switch_jumin_req_show -->
	<tr><td bgcolor=#fafafa align=right ><span class="gen"><b>{L_JUMIN}</b> <font color="#F26D7D">* </font></span></td>
	    <td> 
		  <span class="gen">{JUMIN1} - {JUMIN2}</span>
  		  <input type="hidden" name="jumin1" maxlength="6" value="{JUMIN1}" />
		  <input type="hidden" name="jumin2" maxlength="7" value="{JUMIN2}" />
		  </td>
	 </tr>
<!-- END switch_jumin_req_show -->

<!-- BEGIN switch_gender_req -->
    <tr> 
      <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_GENDER}</b> <font color="#F26D7D">* </font></span></td><td>
        <input class="formstyle3" type="radio" name="gender" value="1" {GENDER_MALE_CHECKED}/> 
        <span class="gen">{L_GENDER_MALE}</span>&nbsp;&nbsp; 
        <input class="formstyle3" type="radio" name="gender" value="2" {GENDER_FEMALE_CHECKED}/> 
        <span class="gen">{L_GENDER_FEMALE}</span>
        </td>
    </tr>
<!-- END switch_gender_req -->

<!-- BEGIN switch_birth_req -->
    <tr> 
      <td bgcolor=#fafafa align=right ><span class="genmed"><b>{L_BIRTHDAY}</b> <font color="#F26D7D">* </font></span></td> 
      <td><span class="genmed">{S_BIRTHDAY} </span>
       </td>
    </tr>
<!-- END switch_birth_req -->

	<tr> 
		<td bgcolor=#fafafa align=right valign=top><span class="gen"><b>{L_EMAIL_ADDRESS}</b> <font color="#F26D7D">*</font></span></td>
		<td><input type="text" class="post" style="width:200px" name="email" size="25" maxlength="255" value="{EMAIL}" /><br>
		<span class="genmed"><font color="#A7A7A7">{L_EMAIL_DESC}</font></span></td>
	</tr>
	<!-- BEGIN switch_edit_profile -->
	<tr> 
	  <td bgcolor=#fafafa align=right valign=top><span class="gen"><b>{L_CURRENT_PASSWORD}</b> <font color="#F26D7D">*</font></span></td>
	  <td> 
		<input type="password" class="post" style="width: 200px" name="cur_password" size="25" maxlength="32" value="{CUR_PASSWORD}" /><br />
		<span class="genmed"><font color="#A7A7A7">{L_CONFIRM_PASSWORD_EXPLAIN}</font></span>
	  </td>
	</tr>
	<!-- END switch_edit_profile -->
	<tr> 
	  <td bgcolor=#fafafa align=right valign=top><span class="gen"><b>{L_NEW_PASSWORD}</b> <font color="#F26D7D">*</font></span></td>
	  <td> 
		<input type="password" class="post" style="width: 200px" name="new_password" size="25" maxlength="32" value="{NEW_PASSWORD}" /><br />
		<span class="genmed"><font color="#A7A7A7">{L_PASSWORD_IF_CHANGED}</font></span>
	  </td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa align=right valign=top><span class="gen"><b>{L_CONFIRM_PASSWORD}</b> <font color="#F26D7D">* </font></span></td>
	  <td> 
		<input type="password" class="post" style="width: 200px" name="password_confirm" size="25" maxlength="32" value="{PASSWORD_CONFIRM}" /><br />
		<span class="genmed"><font color="#A7A7A7">{L_PASSWORD_CONFIRM_IF_CHANGED}</font></span>
	  </td>
	</tr>
	<!-- Visual Confirmation -->

	<!-- BEGIN switch_confirm -->
	<tr> 
	  <td bgcolor=#fafafa align=right  valign=top><span class="genmed"><b>{L_CONFIRM_CODE}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post" style="width: 200px" name="confirm_code" size="6" maxlength="6" value="" /><br /><span class="genmed"><font color="#A7A7A7">{L_CONFIRM_CODE_EXPLAIN}</font></span><br>{CONFIRM_IMG}<br /><span class="genmed"><font color="#A7A7A7">{L_CONFIRM_CODE_IMPAIRED}</font></span></td>
	</tr>
	<!-- END switch_confirm -->

<!-- BEGIN switch_from_req -->
    <tr> 
      <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_ZIPCODE}</b> <font color="#F26D7D">* </font></span></td> 
      <td> 
        <input type="text" class="post" name="zipcode1" size=4 maxlength=3 class=input READONLY value="{ZIPCODE1}"> - 
        <input type="text" class="post" name="zipcode2" size=4 maxlength=3 class=input READONLY value="{ZIPCODE2}">
        <span class="gen"><a href="#" onClick="window.open('zipsearch.php','zipsearch','width=500,height=180,scrollbars=no')"> <img src=templates/webmanager/images/zipcode.gif border=0 align="absmiddle"></a></span>
     </td> 
    </tr>
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_LOCATION}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"style="width 200px" name="location" size="32" maxlength="100" READONLY value="{LOCATION}" />
      </td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_LOCATION2}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"style="width 200px"  name="location2" size="32" maxlength="50" value="{LOCATION2}" /></td>
	</tr>
<!-- END switch_from_req -->

<!-- BEGIN switch_occ_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_OCCUPATION}</b> <font color="#F26D7D">* </font></span></td>
	  <td>{OCCUPATION}
       </td>
	</tr>
<!-- END switch_occ_req -->

<!-- BEGIN switch_mphone_req -->
    <tr> 
      <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_MPHONE}</b> <font color="#F26D7D">* </font></span></td> 
      <td>{MPHONE1}
       <input type="text" class="post"style="width: 40px"  name="mphone2" size="8" maxlength="4" value="{MPHONE2}" /> - 
       <input type="text" class="post"style="width: 40px"  name="mphone3" size="8" maxlength="4" value="{MPHONE3}" /> 
        </td> 
    </tr>
<!-- END switch_mphone_req -->

<!-- BEGIN switch_hphone_req -->
    <tr> 
      <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_HPHONE}</b> <font color="#F26D7D">* </font></span></td> 
      <td>{HPHONE1}
       <input type="text" class="post"style="width: 40px"  name="hphone2" size="8" maxlength="4" value="{HPHONE2}" /> - 
       <input type="text" class="post"style="width: 40px"  name="hphone3" size="8" maxlength="4" value="{HPHONE3}" />
        </td> 
    </tr>
<!-- END switch_hphone_req -->
<!-- BEGIN switch_remark1_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK1}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark1" size="30"  value="{REMARK1}" />
	</td>
	</tr>
<!-- END switch_remark1_req -->
<!-- BEGIN switch_remark2_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK2}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark2" size="30"  value="{REMARK2}" />
	</td>
	</tr>
<!-- END switch_remark2_req -->
<!-- BEGIN switch_remark3_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK3}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark3" size="30"  value="{REMARK3}" />
	</td>
	</tr>
<!-- END switch_remark3_req -->
<!-- BEGIN switch_remark4_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK4}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark4" size="30"  value="{REMARK4}" />
	</td>
	</tr>
<!-- END switch_remark4_req -->
<!-- BEGIN switch_remark5_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK5}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark5" size="30"  value="{REMARK5}" />
	</td>
	</tr>
<!-- END switch_remark5_req -->
<!-- BEGIN switch_remark6_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK6}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark6" size="30"  value="{REMARK6}" />
	</td>
	</tr>
<!-- END switch_remark6_req -->
<!-- BEGIN switch_remark7_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK7}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark7" size="30"  value="{REMARK7}" />
	</td>
	</tr>
<!-- END switch_remark7_req -->
<!-- BEGIN switch_remark8_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK8}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark8" size="30"  value="{REMARK8}" />
	</td>
	</tr>
<!-- END switch_remark8_req -->
<!-- BEGIN switch_remark9_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK9}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark9" size="30"  value="{REMARK9}" />
	</td>
	</tr>
<!-- END switch_remark9_req -->
<!-- BEGIN switch_remark10_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK10}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark10" size="30"  value="{REMARK10}" />
	</td>
	</tr>
<!-- END switch_remark10_req -->
<!-- BEGIN switch_remark11_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK11}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark11" size="30"  value="{REMARK11}" />
	</td>
	</tr>
<!-- END switch_remark11_req -->
<!-- BEGIN switch_remark12_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK12}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark12" size="30"  value="{REMARK12}" />
	</td>
	</tr>
<!-- END switch_remark12_req -->
<!-- BEGIN switch_remark13_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK13}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark13" size="30"  value="{REMARK13}" />
	</td>
	</tr>
<!-- END switch_remark13_req -->
<!-- BEGIN switch_remark14_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK14}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark14" size="30"  value="{REMARK14}" />
	</td>
	</tr>
<!-- END switch_remark14_req -->
<!-- BEGIN switch_remark15_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK15}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark15" size="30"  value="{REMARK15}" />
	</td>
	</tr>
<!-- END switch_remark15_req -->
<!-- BEGIN switch_remark16_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK16}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark16" size="30"  value="{REMARK16}" />
	</td>
	</tr>
<!-- END switch_remark16_req -->
<!-- BEGIN switch_remark17_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK17}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark17" size="30"  value="{REMARK17}" />
	</td>
	</tr>
<!-- END switch_remark17_req -->
<!-- BEGIN switch_remark18_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK18}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark18" size="30"  value="{REMARK18}" />
	</td>
	</tr>
<!-- END switch_remark18_req -->
<!-- BEGIN switch_remark19_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK19}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark19" size="30"  value="{REMARK19}" />
	</td>
	</tr>
<!-- END switch_remark19_req -->
<!-- BEGIN switch_remark20_req -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK20}</b> <font color="#F26D7D">* </font></span></td>
	  <td><input type="text" class="post"  name="remark20" size="30"  value="{REMARK20}" />
	</td>
	</tr>
<!-- END switch_remark20_req -->


<!------------------------------ 선택입력 템플릿------------------------------------>

	<!--<tr> 
	  <th class="thSides" colspan="2" height="25" valign="middle">{L_PROFILE_INFO}</th>
	</tr>
	<tr> 
	  <td colspan="2"><span class="genmed">{L_PROFILE_INFO_NOTICE}</span></td>
	</tr>-->
<!-- BEGIN switch_use_realname -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_REALNAME}</b> </span></td>
	  <td><input type="text" class="post"style="width200px"  name="realname" size="32" value="{REALNAME}" />
      </td>
	</tr>
<!-- END switch_use_realname -->

<!-- BEGIN switch_use_jumin -->
	<tr><td bgcolor=#fafafa align=right ><span class="gen"><b>{L_JUMIN}</b> </span></td>
	    <td> 
		  <input type="text" class="post"style="width: 70px"  name="jumin1" size="10" maxlength="6" value="{JUMIN1}" />
        - <input type="text" class="post"style="width: 70px"  name="jumin2" size="10" maxlength="7" value="{JUMIN2}" /></td>
	 </tr>
<!-- END switch_use_jumin -->

<!-- BEGIN switch_use_jumin_show -->
	<tr><td bgcolor=#fafafa align=right ><span class="gen"><b>{L_JUMIN}</b></span></td>
	    <td> 
		  <span class="gen">{JUMIN1} - {JUMIN2}</span>
		  <input type="hidden" name="jumin1" maxlength="6" value="{JUMIN1}" />
		  <input type="hidden" name="jumin2" maxlength="7" value="{JUMIN2}" />
		  </td>
	 </tr>
<!-- END switch_use_jumin_show -->

<!-- BEGIN switch_use_from -->
    <tr> 
      <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_ZIPCODE}</b> </span></td> 
      <td> 
        <input type="text" class="post" name="zipcode1" size=4 maxlength=3 class=input READONLY value="{ZIPCODE1}"> - 
        <input type="text" class="post" name="zipcode2" size=4 maxlength=3 class=input READONLY value="{ZIPCODE2}">
        <span class="gen"><a href="#" onClick="window.open('zipsearch.php','zipsearch','width=500,height=180,scrollbars=no')"> <img src=templates/webmanager/images/zipcode.gif border=0 align="absmiddle"></a></span></td>
    </tr>
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_LOCATION}</b> </span></td>
	  <td><input type="text" class="post"style="width 200px"  name="location" size="32" maxlength="100" READONLY value="{LOCATION}" />
      </td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_LOCATION2}</b> </span></td>
	  <td><input type="text" class="post"style="width 200px"  name="location2" size="32" maxlength="50" value="{LOCATION2}" /></td>
	</tr>
<!-- END switch_use_from -->

<!-- BEGIN switch_use_occ -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_OCCUPATION}</b> </span></td>
	  <td>{OCCUPATION}
     </td>
	</tr>
<!-- END switch_use_occ -->

<!-- BEGIN switch_use_mphone -->
    <tr> 
      <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_MPHONE}</b> </span></td> 
      <td>{MPHONE1}
       <input type="text" class="post"style="width: 40px"  name="mphone2" size="8" maxlength="4" value="{MPHONE2}" /> -
       <input type="text" class="post"style="width: 40px"  name="mphone3" size="8" maxlength="4" value="{MPHONE3}" /> 
        </td> 
    </tr>
<!-- END switch_use_mphone -->

<!-- BEGIN switch_use_hphone -->
    <tr> 
      <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_HPHONE}</b> </span></td> 
      <td>{HPHONE1}
       <input type="text" class="post"style="width: 40px"  name="hphone2" size="8" maxlength="4" value="{HPHONE2}" /> -
       <input type="text" class="post"style="width: 40px"  name="hphone3" size="8" maxlength="4" value="{HPHONE3}" /> 
      </td> 
    </tr>
<!-- END switch_use_hphone -->

<!-- BEGIN switch_use_gender -->
    <tr> 
      <td bgcolor=#fafafa align=right ><span class="gen"><b>{L_GENDER}</b> </span></td><td> 
        <input class="formstyle3" type="radio" name="gender" value="1" {GENDER_MALE_CHECKED}/> 
        <span class="gen">{L_GENDER_MALE}</span>&nbsp;&nbsp; 
        <input class="formstyle3" type="radio" name="gender" value="2" {GENDER_FEMALE_CHECKED}/> 
        <span class="gen">{L_GENDER_FEMALE}</span>
        </td>
    </tr>
<!-- END switch_use_gender -->

<!-- BEGIN switch_use_birth -->
    <tr> 
      <td bgcolor=#fafafa align=right ><span class="genmed"><b>{L_BIRTHDAY}</b> <br><span class=genmed>{L_BIRTHDAY_EX}</span></td> 
      <td><span class="genmed">{S_BIRTHDAY} 
       </td>
    </tr>
<!-- END switch_use_birth -->

<!-- BEGIN switch_use_remark1 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK1}</b> </span></td>
	  <td><input type="text" class="post"  name="remark1" size="30"  value="{REMARK1}" />
	</td>
	</tr>
<!-- END switch_use_remark1 -->
<!-- BEGIN switch_use_remark2 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK2}</b> </span></td>
	  <td><input type="text" class="post"  name="remark2" size="30"  value="{REMARK2}" />
	</td>
	</tr>
<!-- END switch_use_remark2 -->
<!-- BEGIN switch_use_remark3 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK3}</b> </span></td>
	  <td><input type="text" class="post"  name="remark3" size="30"  value="{REMARK3}" />
	</td>
	</tr>
<!-- END switch_use_remark3 -->
<!-- BEGIN switch_use_remark4 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK4}</b> </span></td>
	  <td><input type="text" class="post"  name="remark4" size="30"  value="{REMARK4}" />
	</td>
	</tr>
<!-- END switch_use_remark4 -->
<!-- BEGIN switch_use_remark5 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK5}</b> </span></td>
	  <td><input type="text" class="post"  name="remark5" size="30"  value="{REMARK5}" />
	</td>
	</tr>
<!-- END switch_use_remark5 -->
<!-- BEGIN switch_use_remark6 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK6}</b> </span></td>
	  <td><input type="text" class="post"  name="remark6" size="30"  value="{REMARK6}" />
	</td>
	</tr>
<!-- END switch_use_remark6 -->
<!-- BEGIN switch_use_remark7 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK7}</b> </span></td>
	  <td><input type="text" class="post"  name="remark7" size="30"  value="{REMARK7}" />
	</td>
	</tr>
<!-- END switch_use_remark7 -->
<!-- BEGIN switch_use_remark8 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK8}</b> </span></td>
	  <td><input type="text" class="post"  name="remark8" size="30"  value="{REMARK8}" />
	</td>
	</tr>
<!-- END switch_use_remark8 -->
<!-- BEGIN switch_use_remark9 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK9}</b> </span></td>
	  <td><input type="text" class="post"  name="remark9" size="30"  value="{REMARK9}" />
	</td>
	</tr>
<!-- END switch_use_remark9 -->
<!-- BEGIN switch_use_remark10 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK10}</b> </span></td>
	  <td><input type="text" class="post"  name="remark10" size="30"  value="{REMARK10}" />
	</td>
	</tr>
<!-- END switch_use_remark10 -->
<!-- BEGIN switch_use_remark11 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK11}</b> </span></td>
	  <td><input type="text" class="post"  name="remark11" size="30"  value="{REMARK11}" />
	</td>
	</tr>
<!-- END switch_use_remark11 -->
<!-- BEGIN switch_use_remark12 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK12}</b> </span></td>
	  <td><input type="text" class="post"  name="remark12" size="30"  value="{REMARK12}" />
	</td>
	</tr>
<!-- END switch_use_remark12 -->
<!-- BEGIN switch_use_remark13 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK13}</b> </span></td>
	  <td><input type="text" class="post"  name="remark13" size="30"  value="{REMARK13}" />
	</td>
	</tr>
<!-- END switch_use_remark13 -->
<!-- BEGIN switch_use_remark14 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK14}</b> </span></td>
	  <td><input type="text" class="post"  name="remark14" size="30"  value="{REMARK14}" />
	</td>
	</tr>
<!-- END switch_use_remark14 -->
<!-- BEGIN switch_use_remark15 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK15}</b> </span></td>
	  <td><input type="text" class="post"  name="remark15" size="30"  value="{REMARK15}" />
	</td>
	</tr>
<!-- END switch_use_remark15 -->
<!-- BEGIN switch_use_remark16 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK16}</b> </span></td>
	  <td><input type="text" class="post"  name="remark16" size="30"  value="{REMARK16}" />
	</td>
	</tr>
<!-- END switch_use_remark16 -->
<!-- BEGIN switch_use_remark17 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK17}</b> </span></td>
	  <td><input type="text" class="post"  name="remark17" size="30"  value="{REMARK17}" />
	</td>
	</tr>
<!-- END switch_use_remark17 -->
<!-- BEGIN switch_use_remark18 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK18}</b> </span></td>
	  <td><input type="text" class="post"  name="remark18" size="30"  value="{REMARK18}" />
	</td>
	</tr>
<!-- END switch_use_remark18 -->
<!-- BEGIN switch_use_remark19 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK19}</b> </span></td>
	  <td><input type="text" class="post"  name="remark19" size="30"  value="{REMARK19}" />
	</td>
	</tr>
<!-- END switch_use_remark19 -->
<!-- BEGIN switch_use_remark20 -->
	<tr> 
	  <td bgcolor=#fafafa align=right ><span class="gen"><b>{TITLE_REMARK20}</b> </span></td>
	  <td><input type="text" class="post"  name="remark20" size="30"  value="{REMARK20}" />
	</td>
	</tr>
<!-- END switch_use_remark20 -->

	<!--<tr> 
	  <td bgcolor=#fafafa align=right><span class="gen"><b>{L_INTERESTS}</b></span></td>
	  <td> 
		<input type="text" class="post"style="width: 200px"  name="interests" size="35" maxlength="150" value="{INTERESTS}" />
	  </td>
	</tr>-->
	<!-- BEGIN switch_sig_allowed -->
	<!--tr> 
	  <td bgcolor=#fafafa align=right valign="top"><span class="gen"><b>{L_SIGNATURE}</b></span><br /><span class="genmed"><font color="#A7A7A7">{L_SIGNATURE_EXPLAIN}</font></span></td>
	  <td> 
		<textarea name="signature"style="width: 300px"  rows="6" cols="30" class="post">{SIGNATURE}</textarea>
	  </td>
	</tr-->
	<!-- END switch_sig_allowed -->
	<!-- BEGIN switch_sig_disallowed -->
	<input type="hidden" name="signature" value="{SIGNATURE_NO_HTML}" />
	<!-- END switch_sig_disallowed -->

	<!--tr> 
	  <th class="thSides" colspan="2" height="25" valign="middle"><b>{L_PREFERENCES}</b></th>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa align=right><span class="gen"><b>{L_PUBLIC_VIEW_EMAIL}</b></span></td>
	  <td> 
		<input class="formstyle3" type="radio" name="viewemail" value="1" {VIEW_EMAIL_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input class="formstyle3" type="radio" name="viewemail" value="0" {VIEW_EMAIL_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa align=right><span class="gen"><b>{L_HIDE_USER}</b></span></td>
	  <td> 
		<input class="formstyle3" type="radio" name="hideonline" value="1" {HIDE_USER_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input class="formstyle3" type="radio" name="hideonline" value="0" {HIDE_USER_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa align=right><span class="gen"><b>{L_NOTIFY_ON_REPLY}</b></span><br />
		<span class="genmed"><font color="#A7A7A7">{L_NOTIFY_ON_REPLY_EXPLAIN}</font></span></td>
	  <td> 
		<input class="formstyle3" type="radio" name="notifyreply" value="1" {NOTIFY_REPLY_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input class="formstyle3" type="radio" name="notifyreply" value="0" {NOTIFY_REPLY_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr-->
	<input type="hidden" name="viewemail" value="0" />
	<input type="hidden" name="hideonline" value="0" />
	<input type="hidden" name="notifyreply" value="0" />

	<!-- BEGIN switch_privmsg_allowed -->
	<input type="hidden" name="notifypm" value="1" />
	<input type="hidden" name="popup_pm" value="1" />
	<!--tr> 
	  <td bgcolor=#fafafa align=right><span class="gen"><b>{L_NOTIFY_ON_PRIVMSG}</b></span></td>
	  <td> 
		<input class="formstyle3" type="radio" name="notifypm" value="1" {NOTIFY_PM_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input class="formstyle3" type="radio" name="notifypm" value="0" {NOTIFY_PM_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td bgcolor=#fafafa align=right><span class="gen"><b>{L_POPUP_ON_PRIVMSG}</b></span><br /><span class="genmed"><font color="#A7A7A7">{L_POPUP_ON_PRIVMSG_EXPLAIN}</font></span></td>
	  <td> 
		<input class="formstyle3" type="radio" name="popup_pm" value="1" {POPUP_PM_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input class="formstyle3" type="radio" name="popup_pm" value="0" {POPUP_PM_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr-->
	<!-- END switch_privmsg_allowed -->

	<!-- BEGIN switch_privmsg_disallowed -->
	<input type="hidden" name="notifypm" value="1" />
	<input type="hidden" name="popup_pm" value="1" />
	<!--input type="hidden" name="notifypm" value="{NOTIFY_PM}" />
	<input type="hidden" name="popup_pm" value="{POPUP_PM}" /-->
	<!-- END switch_privmsg_disallowed -->

	<!-- BEGIN switch_sig_allowed -->
	<!--tr> 
	  <td bgcolor=#fafafa align=right><span class="gen"><b>{L_ALWAYS_ADD_SIGNATURE}</b></span></td>
	  <td> 
		<input class="formstyle3" type="radio" name="attachsig" value="1" {ALWAYS_ADD_SIGNATURE_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input class="formstyle3" type="radio" name="attachsig" value="0" {ALWAYS_ADD_SIGNATURE_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr-->
	<!-- END switch_sig_allowed -->
	<!-- BEGIN switch_sig_disallowed -->
	<input type="hidden" name="attachsig" value="{ALWAYS_ADD_SIGNATURE}" />
	<!-- END switch_sig_disallowed -->

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


	<!-- BEGIN switch_avatar_block -->
	<!--tr> 
	  <th class="thSides" colspan="2" height="12" valign="middle">{L_AVATAR_PANEL}</th>
	</tr>
	<tr> 
		<td bgcolor=#fafafa align=right colspan="2"><table width="70%" cellspacing="2" cellpadding="0" border="0" align="center">
			<tr> 
				<td width="65%"><span class="genmed"><font color="#A7A7A7">{L_AVATAR_EXPLAIN}</font></span></td>
				<td align="center"><span class="genmed"><font color="#A7A7A7">{L_CURRENT_IMAGE}</font></span><br />{AVATAR}<br /><input type="checkbox" class="formstyle3" name="avatardel" />&nbsp;<span class="genmed"><font color="#A7A7A7">{L_DELETE_AVATAR}</font></span></td>
			</tr>
		</table></td>
	</tr-->
	<!-- BEGIN switch_avatar_local_upload -->
	<!--tr> 
		<td bgcolor=#fafafa align=right><span class="gen"><b>{L_UPLOAD_AVATAR_FILE}</b></span></td>
		<td><input type="hidden" name="MAX_FILE_SIZE" value="{AVATAR_SIZE}" /><input type="file" name="avatar" class="post" style="width:200px" /></td>
	</tr-->
	<!-- END switch_avatar_local_upload -->
	<!-- BEGIN switch_avatar_remote_upload -->
	<!--tr> 
		<td bgcolor=#fafafa align=right><span class="gen"><b>{L_UPLOAD_AVATAR_URL}</b></span><br /><span class="genmed"><font color="#A7A7A7">{L_UPLOAD_AVATAR_URL_EXPLAIN}</font></span></td>
		<td><input type="text" name="avatarurl" size="40" class="post" style="width:200px" /></td>
	</tr-->
	<!-- END switch_avatar_remote_upload -->
	<!-- BEGIN switch_avatar_remote_link -->
	<!--tr> 
		<td bgcolor=#fafafa align=right><span class="gen"><b>{L_LINK_REMOTE_AVATAR}</b></span><br /><span class="genmed"><font color="#A7A7A7">{L_LINK_REMOTE_AVATAR_EXPLAIN}</font></span></td>
		<td><input type="text" name="avatarremoteurl" size="40" class="post" style="width:200px" /></td>
	</tr-->
	<!-- END switch_avatar_remote_link -->
	<!-- BEGIN switch_avatar_local_gallery -->
	<!--tr> 
		<td bgcolor=#fafafa align=right><span class="gen"><b>{L_AVATAR_GALLERY}</b></span></td>
		<td><input type="submit" name="avatargallery" value="{L_SHOW_GALLERY}" class="liteoption" /></td>
	</tr-->
	<!-- END switch_avatar_local_gallery -->
	<!-- END switch_avatar_block -->
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
		<td  colspan="2" align="center" height="28">{S_HIDDEN_FIELDS}<input type="submit" name="submit" value="{L_SUBMIT}" class="liteoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" name="reset" class="liteoption" /></td>
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
</table>
</form>
<br><br>