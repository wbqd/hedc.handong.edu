<?php

/***************************************************************************
 *                            lang_admin.php [Korean]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_admin.php,v 1.35.2.3 2002/06/27 20:06:44 thefinn Exp $
 *
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/
// 2002/08/28 Translated by TankTonk
// 2002/12/17 updated by Soon-Son Kwon(kss@kldp.org)

//
// Format is same as lang_main
//

//
// Modules, this replaces the keys used
// in the modules[][] arrays in each module file
//
$lang['General'] = '일반관리';
$lang['Users'] = '사용자 관리';
$lang['Groups'] = '그룹 관리';
$lang['Forums'] = '메뉴 관리';
$lang['Styles'] = '스타일 관리';

$lang['Configuration'] = '설정';
$lang['Permissions'] = '허가';
$lang['Manage'] = '관리';
$lang['Disallow'] = 'ID 사용 불가';
$lang['Prune'] = '정리';
$lang['Mass_Email'] = '전체메일보내기';
$lang['Ranks'] = '등급';
$lang['Smilies'] = '스마일';
$lang['Ban_Management'] = '사용자 접근 금지';//금지 제어
$lang['Word_Censor'] = '단어검열';
$lang['Export'] = '스킨내보내기';
$lang['Create_new'] = '스킨만들기';
$lang['Add_new'] = '템플릿추가';
$lang['Backup_DB'] = '데이터베이스 백업';
$lang['Restore_DB'] = '데이터베이스 복원';


//
// Index
//
$lang['Admin'] = '관리';
$lang['Not_admin'] = '이 사이트을 관리할 권한이 없습니다';
$lang['Welcome_phpBB'] = '관리자페이지에 오신 것을 환영합니다';
$lang['Admin_intro'] = '이 화면은 귀하의 홈페이지의 각종 통계치를 간략하게 보여줍니다. 상단에 있는 <u>관리 인덱스</u>를 클릭하면 이 화면으로 다시 들어올 수 있습니다. 귀하의 홈페이지 첫화면으로 돌아가려면 왼쪽 프레임에 있는 로고를 클릭하십시오. 본 화면의 왼쪽에 있는 다른 링크들은 홈페이지의 모든 기능들을 제어할 수 있도록 해주며, 각 화면에는 도구들의 사용방법이 있습니다.';
$lang['Main_index'] = '사이트 인덱스';
$lang['Forum_stats'] = '사이트 통계';
$lang['Admin_Index'] = '관리 인덱스';
$lang['Preview_forum'] = '메뉴 미리보기';

$lang['Click_return_admin_index'] = '관리 인덱스로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';

$lang['Statistic'] = '통계';
$lang['Value'] = '값';
$lang['Number_posts'] = '총 게시물';
$lang['Posts_per_day'] = '일평균 게시물';
$lang['Number_topics'] = '주제글 갯수';
$lang['Topics_per_day'] = '일평균 주제글';
$lang['Number_users'] = '사용자수';
$lang['Users_per_day'] = '일평균 가입자';
$lang['Board_started'] = '사이트 시작됨';
$lang['Avatar_dir_size'] = '아바타 디렉토리 크기';
$lang['Database_size'] = '데이터베이스 크기';
$lang['Gzip_compression'] ='Gzip 압축';
$lang['Not_available'] = '사용 불가';

$lang['ON'] = '켬'; // This is for GZip compression
$lang['OFF'] = '끔';


//
// DB Utils
//
$lang['Database_Utilities'] = '데이터베이스 유틸리티';

$lang['Restore'] = '복원';
$lang['Backup'] = '백업';
$lang['Restore_explain'] = '저장된 파일로 부터 모든 WebManager 테이블의 완전 복원을 실행합니다. 만약 서버가 지원한다면, 압축된 gzip 텍스트 파일이 업로드될때 자동으로 압축을 풀어줍니다. <b>경고</b> 기존의 데이터는 모두 덮어씁니다. 복원은 시간이 오래 걸리므로 끝날때까지 이 화면을 떠나지 마십시오.';
$lang['Backup_explain'] = '여기서는 WebManager에 관련된 모든 데이터를 백업할 수 있습니다. 함께 저장하고자 하는 추가의 사용자 정의 테이블이 WebManager와 같은 데이터베이스에 있다면 아래의 추가 테이블 입력 박스에 이름을 입력하십시오(콤마를 사용하여 여러 이름을 넣을 수 있습니다). 서버가 지원한다면, 다운로드하기 전에 gzip 압축으로 파일의 크기를 작게 할 수 있습니다.';

$lang['Backup_options'] = '백업 옵션';
$lang['Start_backup'] = '백업 시작';
$lang['Full_backup'] = '풀 백업';
$lang['Structure_backup'] = '스트럭처만 백업';
$lang['Data_backup'] = '데이터만 백업';
$lang['Additional_tables'] = '추가 테이블';
$lang['Gzip_compress'] = 'Gzip으로 파일 압축';
$lang['Select_file'] = '파일 선택';
$lang['Start_Restore'] = '복원 시작';

$lang['Restore_success'] = '데이터베이스가 성공적으로 복원되었습니다.<br /><br />이제 사이트는 백업이 만들어 졌을 때의 상태가 되었습니다.';
$lang['Backup_download'] = '다운로드가 곧 시작되므로 기다려 주십시오.';
$lang['Backups_not_supported'] = '아쉽게도 데이터베이스 백업이 귀하의 데이터베이스 시스템에서는 지원이 되지 않습니다.';

$lang['Restore_Error_uploading'] = '백업 파일 업로딩에 문제가 있습니다';
$lang['Restore_Error_filename'] = '파일 이름에 문제가 있으므로 다른 파일을 시도해 보십시오';
$lang['Restore_Error_decompress'] = 'gzip 파일의 압축을 풀 수가 없으므로 단순 텍스트 버전을 업로드하십시오';
$lang['Restore_Error_no_file'] = '업로드된 파일이 없습니다';


//
// Auth pages
//
$lang['Select_a_User'] = '사용자 선택';
$lang['Select_a_Group'] = '그룹 선택';
$lang['Select_a_Forum'] = '메뉴 선택';
$lang['Auth_Control_User'] = '사용자 권한 조절';
$lang['Auth_Control_Group'] = '사용자그룹권한';
$lang['Auth_Control_Forum'] = '메뉴 권한 조절';
$lang['Look_up_User'] = '사용자 찾기';
$lang['Look_up_Group'] = '그룹 찾기';
$lang['Look_up_Forum'] = '메뉴 찾기';

$lang['Group_auth_explain'] = '여기에서는 각 사용자 그룹에 지정된 권한과 관리자 상태를 변경할 수 있습니다. 그룹 권한을 변경할 때에, 각 사용자 권한으로 사용자가 메뉴에 아직 들어올 수 있음을 잊지 마십시오. 그러한 경우가 발생하게되면 경고가 나타날 것입니다.';
$lang['User_auth_explain'] = '여기에서는 각 사용자에 지정된 권한과 관리자 상태를 변경할 수 있습니다. 사용자 권한을 변경할 때에, 각 그룹 권한으로 사용자가 메뉴에 아직 들어올 수 있음을 잊지 마십시오. 그러한 경우가 발생하게되면 경고가 나타날 것입니다.';
$lang['Forum_auth_explain'] = '여기에서는 각 메뉴의 권한 레벨을 변경할 수 있습니다. 여기에는 단순 모드와 고급 모드가 있는데, 고급 모드가 각 메뉴에 대하여 더 세밀한 조절을 제공합니다. 메뉴의 권한 레벨을 변경하면 해당 메뉴내에서 사용자가 행하는 각종 작업에 영향을 미칠 것임을 명심하십시오.';

$lang['Simple_mode'] = '단순 모드';
$lang['Advanced_mode'] = '고급 모드';
$lang['Moderator_status'] = '관리자 상태';

$lang['Allowed_Access'] = '접근 가능';
$lang['Disallowed_Access'] = '접근 불가';
$lang['Is_Moderator'] = '관리자 입니다';
$lang['Not_Moderator'] = '관리자가 아닙니다';

$lang['Conflict_warning'] = '권한 불일치 경고';
$lang['Conflict_access_userauth'] = '이 사용자는 아직 그룹 멤버쉽으로 이 메뉴에 접근할 수 있습니다. 접근을 막으려면 그룹 권한을 변경하던가 이 사용자 그룹을 제거하는 방법이 있습니다. 해당 그룹(메뉴 포함)은 아래와 같습니다.';
$lang['Conflict_mod_userauth'] = '이 사용자는 아직 그룹 멤버쉽으로 이 메뉴에 관리자 권한을 갖고 있습니다. 관리자 권한을 갖지 못하게 하려면 그룹 권한을 변경하던가 이 사용자 그룹을 제거하는 방법이 있습니다. 해당 그룹(메뉴 포함)은 아래와 같습니다.';

$lang['Conflict_access_groupauth'] = '다음 사용자(들)는 아직 그룹 멤버쉽으로 이 메뉴에 접근할 수 있습니다. 접근을 막으려면 그룹 권한을 변경하던가 이 사용자 그룹을 제거하는 방법이 있습니다. 해당 그룹(메뉴 포함)은 아래와 같습니다.';
$lang['Conflict_mod_groupauth'] = '다음 사용자(들)는 아직 그룹 멤버쉽으로 이 메뉴에 관리자 권한을 갖고 있습니다. 관리자 권한을 갖지 못하게 하려면 그룹 권한을 변경하던가 이 사용자 그룹을 제거하는 방법이 있습니다. 해당 그룹(메뉴 포함)은 아래와 같습니다.';

$lang['Public'] = '공개';
$lang['Private'] = '비공개';
$lang['Registered'] = '등록';
$lang['Administrators'] = '운영자';
$lang['Hidden'] = '숨김';

// These are displayed in the drop down boxes for advanced
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = '모두';
$lang['Forum_REG'] = '일반사용자';
$lang['Forum_PRIVATE'] = '비공개';
$lang['Forum_MOD'] = '메뉴운영자';
$lang['Forum_ADMIN'] = '시스템관리자';

$lang['View'] = '보기';
$lang['Read'] = '읽기';
$lang['Post'] = '쓰기';
$lang['Reply'] = '답변';
$lang['Edit'] = '편집';
$lang['Delete'] = '삭제';
$lang['Sticky'] = '필독사항';
$lang['Announce'] = '공지사항';
$lang['Vote'] = '투표';
$lang['Pollcreate'] = '투표 만들기';

$lang['Permissions'] = '권한';
$lang['Simple_Permission'] = '단순 권한';

$lang['User_Level'] = '사용자 레벨';
$lang['Auth_User'] = '사용자';
$lang['Auth_Admin'] = '시스템관리자';
$lang['Group_memberships'] = '사용자 그룹 멤버쉽';
$lang['Usergroup_members'] = '이 그룹은 아래 멤버를 갖고 있습니다';

$lang['Forum_auth_updated'] = '메뉴 권한 변경됨';
$lang['User_auth_updated'] = '사용자 권한 변경됨';
$lang['Group_auth_updated'] = '그룹 권한 변경됨';

$lang['Auth_updated'] = '권한이 변경되었습니다';
$lang['Click_return_userauth'] = '사용자 권한으로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';
$lang['Click_return_groupauth'] = '그룹 권한으로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';
$lang['Click_return_forumauth'] = '메뉴 권한으로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';


//
// Banning
//
$lang['Ban_control'] = '사용자 접근 금지';
$lang['Ban_explain'] = '여기에서는 사용자의 접근을 막을 수 있습니다. 특정 사용자나 일정 범위의 IP 주소 혹은 호스트 이름을 금지시킬수 있습니다. 이로써 사용자가 사이트의 인덱스 페이지에 접근하는것 조차 막을수 있습니다. ID를 바꿔서 등록하는 것을 막으려면 금지 E-mail 주소를 지정합니다. 단지 E-mail 주소로 금지시키면 사용자가 로그인 하거나 글을 올리는것을 막을 수는 없으므로, 앞의 방법을 먼저 사용해야 합니다.';
$lang['Ban_explain_warn'] = '일정 범위의 IP 주소를 입력하면 그 범위내의 모든 주소들이 금지 리스트에 올라감을 유념하십시오. 필요한 경우에는 와일드카드 문자를 사용할 수도 있습니다. 주소 범위를 입력해야만 한다면 가능한 최소로 하던가 특정 주소를 지정하시기 바랍니다.';

$lang['Select_username'] = 'ID 선택';
$lang['Select_ip'] = 'IP 선택';
$lang['Select_email'] = 'E-mail 주소 선택';

$lang['Ban_username'] = 'ID를 통하여 사용자 금지';
$lang['Ban_username_explain'] = '적절한 키보드와 마우스 조작으로 한번에 여러명의 사용자를 금지시킬 수 있습니다';

$lang['Ban_IP'] = 'IP 주소(또는 호스트명) 금지';
$lang['IP_hostname'] = 'IP 주소들 이나 호스트 이름들';
$lang['Ban_IP_explain'] = '여러 IP나 호스트 이름을 지정하려면 콤마를 사용하십시오. IP 주소 범위를 지정하려면 하이픈(-)을 사용하십시오. 와일드카드 문자는 * 를 사용하십시오';

$lang['Ban_email'] = 'E-mail 주소 금지';
$lang['Ban_email_explain'] = '여러 E-mail 주소를 지정하려면 콤마를 사용하십시오. 와일드카드 문자는 * 를 사용하십시오. 예제로 *@hotmail.com';
$lang['Unban_username'] = 'ID를 통하여 사용자 금지 해제';
$lang['Unban_username_explain'] = '적절한 키보드와 마우스 조작으로 한번에 여러명의 사용자에 대한 금지를 해제할 수 있습니다';

$lang['Unban_IP'] = 'IP 주소(또는 호스트명) 금지 해제';
$lang['Unban_IP_explain'] = '적절한 키보드와 마우스 조작으로 한번에 여러 IP 주소에 대한 금지를 해제할 수 있습니다';

$lang['Unban_email'] = 'E-mail 주소 금지 해제';
$lang['Unban_email_explain'] = '적절한 키보드와 마우스 조작으로 한번에 여러 E-mail 주소에 대한 금지를 해제할 수 있습니다';

$lang['No_banned_users'] = '금지된 사용자 없음';
$lang['No_banned_ip'] = '금지된 IP 주소 없음';
$lang['No_banned_email'] = '금지된 E-mail 주소 없음';

$lang['Ban_update_sucessful'] = '금지리스트가 성공적으로 업데이트되었습니다';
$lang['Click_return_banadmin'] = '접근 금지 관리로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';


//
// Configuration
//
$lang['General_Config'] = '전체설정';
$lang['Config_explain'] = '다음 양식으로 사이트의 일반적인 옵션을 변경할 수 있습니다. 사용자 및 사이트 설정은 왼쪽의 관련 링크를 이용하십시오.';

$lang['Click_return_config'] = '일반 설정으로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';

$lang['General_settings'] = '일반 사이트 설정';
$lang['Server_name'] = '도메인 이름';
$lang['Server_name_explain'] = '이 사이트가 실행되는 도메인 이름';
$lang['Script_path'] = '스크립트 경로';
$lang['Script_path_explain'] = 'WebManager가 위치한 도메인 이름에 대한 상대적 경로';
$lang['Server_port'] = '서버 포트';
$lang['Server_port_explain'] = '서버가 동작하고 있는 포트, 일반적으로 80, 다른 경우에만 변경하십시오';
$lang['Site_name'] = '사이트 이름';
$lang['Site_desc'] = '사이트 소개';
$lang['Board_disable'] = '사이트 사용 정지';
$lang['Board_disable_explain'] = '이 기능은 사용자들이 사이트를 사용하지 못하도록 합니다. 사이트 사용을 정지한 경우 관리자는 관리자 제어판에 들어갈 수 있습니다.!';
$lang['Acct_activation'] = '계정 활성화 방법';
$lang['Acct_activation_explain'] = '"없음" : 등록즉시 계정 사용 가능</br>"사용자" : 등록 후 E-mail  인증을 받는 과정을 거쳐야 계정이 활성화</br>"관리자" : 등록 후 관리자가 관리자페이지에서 개별적으로 계정을 활성화';
$lang['Acc_None'] = '없음'; // These three entries are the type of activation
$lang['Acc_User'] = '사용자';
$lang['Acc_Admin'] = '관리자';

$lang['Abilities_settings'] = '사용자 및 사이트 기본 설정';
$lang['Max_poll_options'] = '투표 옵션의 최대 갯수';
$lang['Flood_Interval'] = '쇄도 간격';
$lang['Flood_Interval_explain'] = '올려지는 글 사이에 사용자가 기다려야 할 시간(초)';
$lang['Board_email_form'] = '사이트를 통한 사용자 E-mail';
$lang['Board_email_form_explain'] = '사용자들은 메일 전용 프로그램이 아닌 사이트를 통해 서로 E-mail을 보냅니다';
$lang['Topics_per_page'] = '페이지당 글 수';
$lang['Posts_per_page'] = '페이지당 답변수';
$lang['Hot_threshold'] = '인기있는 주제가 되는 기준 답변수 (Hot)';
$lang['Default_style'] = '기본 스타일';
$lang['Override_style'] = '사용자 스타일 무시하기';
$lang['Override_style_explain'] = '기본값으로 사용자 스타일 교체하기';
$lang['Default_language'] = '기본 언어';
$lang['Date_format'] = '날짜 형식';
$lang['System_timezone'] = '시스템 시간대';
$lang['Enable_gzip'] = 'GZip 압축 사용 가능';
$lang['Enable_prune'] = '메뉴 정리 사용 가능';
$lang['Allow_HTML'] = 'HTML 사용';
$lang['Allow_BBCode'] = 'BBCode 사용';
$lang['Allowed_tags'] = '사용 가능한 HTML 태그';
$lang['Allowed_tags_explain'] = '콤마로 태그를 구분하십시오';
$lang['Allow_smilies'] = '스마일 사용';
$lang['Smilies_path'] = '스마일 있는곳 경로';
$lang['Smilies_path_explain'] = 'WebManager 루트 디렉토디 하의 경로, 즉, images/smiles';
$lang['Allow_sig'] = '서명 사용';
$lang['Max_sig_length'] = '최대 서명 길이';
$lang['Max_sig_length_explain'] = '서명의 최대 문자 수';
$lang['Allow_name_change'] = 'ID 변경 허가';

$lang['Avatar_settings'] = '아바타 설정';
$lang['Allow_local'] = '아바타 갤러리 사용 가능';
$lang['Allow_remote'] = '원격 아바타 사용 가능';
$lang['Allow_remote_explain'] = '다른 웹사이트로 링크된 아바타';
$lang['Allow_upload'] = '아바타 업로드 사용 가능';
$lang['Max_filesize'] = '최대 아바타 파일 크기';
$lang['Max_filesize_explain'] = '업로드된 아바타 파일 용';
$lang['Max_avatar_size'] = '최대 아바타 차원';
$lang['Max_avatar_size_explain'] = '(높이 x 폭 픽셀)';
$lang['Avatar_storage_path'] = '아바타 있는곳 경로';
$lang['Avatar_storage_path_explain'] = 'WebManager 루트 디렉토디 하의 경로, 즉, images/avatars';
$lang['Avatar_gallery_path'] = '아바타 갤러리 경로';
$lang['Avatar_gallery_path_explain'] = '이미 로드된 이미지용 WebManager 루트 디렉토디 하의 경로, 즉, images/avatars/gallery';

$lang['COPPA_settings'] = 'COPPA 설정';
$lang['COPPA_fax'] = 'COPPA 팩스 번호';
$lang['COPPA_mail'] = 'COPPA 주소';
$lang['COPPA_mail_explain'] = '이것은 부모들이 COPPA 등록 양식을 보낼 주소입니다';

$lang['Email_settings'] = 'E-mail 설정';
$lang['Admin_email'] = '관리자 E-mail 주소';
$lang['Email_sig'] = 'E-mail 서명';
$lang['Email_sig_explain'] = '사이트에서 보내는 모든 E-mail에 이 텍스트가 첨부됩니다';
$lang['Use_SMTP'] = 'E-mail에 SMTP 서버 사용하기';
$lang['Use_SMTP_explain'] = '로컬 메일 기능 대신에 지정된 서버를 사용하여 E-mail을 보내려면 예 하십시오.';
$lang['SMTP_server'] = 'SMTP 서버 주소';
$lang['SMTP_username'] = 'SMTP 사용자 이름';
$lang['SMTP_username_explain'] = 'SMTP 서버가 요구하는 경우에만, 사용자 이름을 입력하십시오';
$lang['SMTP_password'] = 'SMTP 패스워드';
$lang['SMTP_password_explain'] = 'SMTP 서버가 요구하는 경우에만, 패스워드를 입력하십시오';

$lang['Disable_privmsg'] = '쪽지';
$lang['Inbox_limits'] = '받은쪽지함내의 최대 글수';
$lang['Sentbox_limits'] = '보낸쪽지함내의 최대 글수';
$lang['Savebox_limits'] = '저장쪽지함내의 최대 글수';

$lang['Cookie_settings'] = '쿠키 설정';
$lang['Cookie_settings_explain'] = '다음의 자세한 내용들은 쿠키가 어떻게 사용자 브라우저로 보내지는 가를 정의합니다. 대부분의 경우에 있어서 디폴트의 쿠기 설정치들이 적당하지만, 만약 변경을 하고자 한다면 주의를 요하며 잘못된 설정은 사용자로 하여금 로그인하지 못하게 할 수 있습니다';
$lang['Cookie_domain'] = '쿠키 도메일';
$lang['Cookie_name'] = '쿠키 이름';
$lang['Cookie_path'] = '쿠키 경로';
$lang['Cookie_secure'] = '쿠키 보안';
$lang['Cookie_secure_explain'] = '서버가 SSL을 통하여 동작하면 이것을 사용가능으로, 아닌 경우에는 사용불가능으로 설정하십시오';
$lang['Session_length'] = '세션 길이 [ 초 ]';


// Visual Confirmation
$lang['Visual_confirm'] = '등록 확인';
$lang['Visual_confirm_explain'] = '그림의 문자를 입력하면 자동화된 프로그램이 아닌 사람이 등록 양식을 직접 작성했음을 확인할 수 있습니다.';

//
// Forum Management
//
$lang['Forum_admin'] = '메뉴 관리';
$lang['Forum_admin_explain'] = '여기에서는 카테고리와 메뉴를 추가, 삭제, 편집, 순서 재조정 및 재-동기화을 할 수 있습니다<br/>메뉴 관리를 <u>개인에게 맡기고 싶을 때</u>는 [사용자 목록]에서 [권한]이란 메뉴로,<br/><u>그룹에게 맡기고 싶을 때</u>는 [그룹관리]의 [권한]이란 메뉴로 이동하셔서 변경이 가능합니다.<br/>메뉴에 접근할 수 있는 권한은 해당 메뉴의 [권한]을 클릭하시면 변경가능합니다.<br/>';
$lang['Edit_forum'] = '메뉴관리';
$lang['Create_forum'] = '메뉴 새로 만들기';
$lang['Create_category'] = '카테고리 새로 만들기';
$lang['Remove'] = '삭제';
$lang['Action'] = '실시';
$lang['Update_order'] = '순서 업데이트';
$lang['Config_updated'] = '설정이 성공적으로 업데이트되었습니다';
$lang['Edit'] = '편집';
$lang['Delete'] = '삭제';
$lang['Move_up'] = '위로 이동';
$lang['Move_down'] = '아래로 이동';
$lang['Resync'] = '재-동기화';
$lang['No_mode'] = '설정된 모드가 없습니다';
$lang['Forum_edit_delete_explain'] = '아래 양식으로 모든 일반 메뉴 옵션을 구성할 수 있습니다. 사용자 및 메뉴 구성은 왼쪽의 관련 링크를 사용하십시오.';

$lang['Move_contents'] = '모든 내용 이동';
$lang['Forum_delete'] = '메뉴 삭제';
$lang['Forum_delete_explain'] = '아래 양식으로 메뉴(혹은 카테고리)를 삭제할 수 있으며 그 안에 있는 모든 주제(혹은 메뉴)을 어디로 옮길 것인지를 결정할 수 있습니다';

$lang['Status_locked'] = '잠김';
$lang['Status_unlocked'] = '해제';
$lang['Forum_settings'] = '메뉴 속성';
$lang['Forum_name'] = '메뉴 이름';
$lang['Forum_desc'] = '설명';
$lang['Forum_status'] = '잠금 상태';
$lang['Forum_pruning'] = '자동 정리';

$lang['prune_freq'] = '주제의 시효를 매번 확인';
$lang['prune_days'] = '아무런 글도 올라오지 않은 주제를 삭제';
$lang['Set_prune_data'] = '이 메뉴에 대해서 자동 정리를 지정하였으나 정리 주기를 지정하지 않았습니다. 되돌아가서 설정하십시오';

$lang['Move_and_Delete'] = '이동 및 삭제';

$lang['Delete_all_posts'] = '모든 글 삭제';
$lang['Nowhere_to_move'] = '이동할 곳이 없음';

$lang['Edit_Category'] = '카테고리 편집';
$lang['Edit_Category_explain'] = '이 양식으로 카테고리 이름을 변경하십시오';

$lang['Forums_updated'] = '메뉴와 카테고리 정보가 성공적으로 업데이트되었습니다';

$lang['Must_delete_forums'] = '이 카테고리를 지우기 전에 모든 메뉴를 먼저 삭제해야합니다';

$lang['Click_return_forumadmin'] = '메뉴 관리로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';


//
// Smiley Management
//
$lang['smiley_title'] = '스마일 편집 유틸리티';
$lang['smile_desc'] = '여기에서는 사용자가 글을 올리거나 쪽지를 보낼때 사용할 감정 표현 그림이나 스마일을 추가, 삭제 혹은 편집할 수 있습니다.';

$lang['smiley_config'] = '스마일 구성';
$lang['smiley_code'] = '스마일 코드';
$lang['smiley_url'] = '스마일 그림 파일';
$lang['smiley_emot'] = '스마일 감정 표현';
$lang['smile_add'] = '새로운 스마일 추가';
$lang['Smile'] = '스마일';
$lang['Emotion'] = '감정 표현';

$lang['Select_pak'] = '팩 (.pak) 파일을 선택하십시오';
$lang['replace_existing'] = '기존 스마일 대체';
$lang['keep_existing'] = '기존 스마일 보존';
$lang['smiley_import_inst'] = '설치를 하려면 스마일 패키지의 압축을 풀고 모든 파일들을 적당한 스마일 디렉토리로 업로드해야 합니다.  그런 다음, 이 양식에서 올바른 정보를 선택하여 스마일 팩을 가져 옵니다.';
$lang['smiley_import'] = '스마일 팩 가져오기';
$lang['choose_smile_pak'] = '스마일 팩(.pak) 파일을 선택하십시오';
$lang['import'] = '스마일 가져오기';
$lang['smile_conflicts'] = '충돌난 경우 해야할 일';
$lang['del_existing_smileys'] = '가져오기 전에 기존의 스마일을 삭제하십시오';
$lang['import_smile_pack'] = '스마일 팩을 가져오기';
$lang['export_smile_pack'] = '스마일 팩 만들기';
$lang['export_smiles'] = '현재 설치된 스마일로부터 스마일을 만들려면 %s<font color=#0072BC>여기</font>%s를 클릭하여 스마일 팩 파일을 다운로드 하십시오. 반드시 .pak 확장자를 사용하고 적당한 파일명을 지정하십시오. 그런 다음 모든 스마일 이미지와 .pak 구성 파일을 포함하여 zip파일을 만드십시오.';

$lang['smiley_add_success'] = '스마일이 성공적으로 추가되었습니다';
$lang['smiley_edit_success'] = '스마일이 성공적으로 업데이트되었습니다';
$lang['smiley_import_success'] = '스마일팩을 성공적으로 가져왔습니다!';
$lang['smiley_del_success'] = '스마일이 성공적으로 지워졌습니다';
$lang['Click_return_smileadmin'] = '스마일 관리로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';


//
// User Management
//
$lang['User_admin'] = '사용자 관리';
$lang['User_admin_explain'] = '여기에서는 사용자의 정보와 특정 옵션들을 변경할 수 있습니다. 사용자 권한을 변경하려면 사용자 및 그룹 권한 시스템을 이용하십시오.';

$lang['Look_up_user'] = '사용자 찾기';

$lang['Admin_user_fail'] = '사용자 프로파일을 업데이트할 수 없습니다.';
$lang['Admin_user_updated'] = '사용자의 프로파일이 성공적으로 업데이트되었습니다.';
$lang['Click_return_useradmin'] = '사용자 관리로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';

$lang['User_delete'] = '이 사용자를 삭제합니다';
$lang['User_delete_explain'] = '여기를 클릭하여 이 사용자를 삭제합니다, 본 동작은 되돌려질 수 없습니다.';
$lang['User_deleted'] = '사용자가 성공적으로 삭제되었습니다.';

$lang['User_status'] = '사용자는 활동중입니다';
$lang['User_allowpm'] = '쪽지를 보낼수 있습니다';
$lang['User_allowavatar'] = '아바타를 표시할 수 있습니다';

$lang['Admin_avatar_explain'] = '여기에서는 사용자의 현재 아바타를 보거나 삭제할 수 있습니다.';

$lang['User_special'] = '특수 운영자 전용 필드';
$lang['User_special_explain'] = '이 필드는 사용자가 수정할 수 없습니다. 시스템 관리자만이 이 옵션들을 설정할 수 있습니다';


//
// Group Management
//
$lang['Group_administration'] = '사용자그룹관리';
$lang['Group_admin_explain'] = '여기는 모든 그룹을 관리하는 곳으로, 기존 그룹의 삭제, 만들기 및 편집을 할 수 있습니다. 관리자를 지정할 수 있으며, 그룹 상태를 열림/닫힘으로 전환할 수 있고 그룹 이름과 설명을 지정할 수 있습니다';
$lang['Error_updating_groups'] = '그룹을 업데이트하는데 에러가 발생했습니다';
$lang['Updated_group'] = '그룹이 성공적으로 업데이트되었습니다';
$lang['Added_new_group'] = '새로운 그룹이 성공적으로 만들어 졌습니다';
$lang['Deleted_group'] = '그룹이 성공적으로 삭제되었습니다';
$lang['New_group'] = '새로운 그룹 만들기';
$lang['Edit_group'] = '그룹 편집하기';
$lang['group_name'] = '그룹 이름';
$lang['group_description'] = '그룹 설명';
$lang['group_moderator'] = '그룹 관리자';
$lang['group_status'] = '그룹 상태';
$lang['group_open'] = '그룹 열기';
$lang['group_closed'] = '그룹 닫기';
$lang['group_hidden'] = '비밀 그룹';
$lang['group_delete'] = '그룹 삭제';
$lang['group_delete_check'] = '이 그룹을 삭제합니다';
$lang['submit_group_changes'] = '변경 적용';
$lang['reset_group_changes'] = '변경 취소';
$lang['No_group_name'] = '이 그룹에 대한 이름을 지정해야 합니다';
$lang['No_group_moderator'] = '이 그룹에 대한 관리자를 지정해야 합니다';
$lang['No_group_mode'] = '이 그룹에 대한 모드를 열힘 혹은 닫힘으로 지정해야 합니다.';
$lang['No_group_action'] = '아무런 동작도 지정되지 않았습니다';
$lang['delete_group_moderator'] = '옛 그룹 관리자를 삭제하겠습니까?';
$lang['delete_moderator_explain'] = '그룹 관리자를 바꾸려면, 이 박스에 체크하여 옛 관리자를 그룹에서 제거하십시오. 그렇지 않으면 체크하지 마십시오. 그 사용자는 그룹의 일반 회원이 됩니다.';
$lang['Click_return_groupsadmin'] = '그룹 관리로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';
$lang['Select_group'] = '그룹 지정하기';
$lang['Look_up_group'] = '그룹 찾기';


//
// Prune Administration
//
$lang['Forum_Prune'] = '메뉴 정리';
$lang['Forum_Prune_explain'] = '이것은 지정된 날짜동안 업데이트된 게시물이 없었던 주제를 삭제합니다. 번호를 입력하지 않으면 모든 주제들이 삭제됩니다. 투표가 진행중인 주제는 삭제하지 않으며, 공지사항 또한 지우지 않습니다. 이러한 주제들은 수동으로 지워야 합니다.';
$lang['Do_Prune'] = '정리하기';
$lang['All_Forums'] = '모든 메뉴';
$lang['Prune_topics_not_posted'] = '이 기간 동안 답변이 없었던 주제 정리하기';
$lang['Topics_pruned'] = '정리된 주제들';
$lang['Posts_pruned'] = '정리된 글들';
$lang['Prune_success'] = '메뉴 정리 작업이 성공적으로 수행되었습니다';


//
// Word censor
//
$lang['Words_title'] = '단어 검열';
$lang['Words_explain'] = '여기에서는 사이트에서 자동으로 검열될 단어들을 추가, 편집 및 삭제할 수 있습니다. 또한 ID에 해당 단어들을 사용할 수 없습니다. 와일드문자(*)는 하나의 문자로 취급됩니다.';
$lang['Word'] = '단어';
$lang['Edit_word_censor'] = '검열 단어 편집';
$lang['Replacement'] = '대체';
$lang['Add_new_word'] = '새로운 단어 추가';
$lang['Update_word'] = '검열 단어 업데이트';

$lang['Must_enter_word'] = '단어와 대치할 단어를 입력해야 합니다';
$lang['No_word_selected'] = '편집할 단어가 선택되지 않았습니다';

$lang['Word_updated'] = '선택된 검열 단어가 성공적으로 업데이트되었습니다';
$lang['Word_added'] = '검열 단어가 성공적으로 추가되었습니다';
$lang['Word_removed'] = '선택된 검열 단어가 성공적으로 삭제되었습니다';

$lang['Click_return_wordadmin'] = '검열 단어 관리로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';


//
// Mass Email
//
$lang['Mass_email_explain'] = '여기에서는 모든 사용자나 특정 그룹내의 모든 사용자들에게 E-mail을 보낼수 있습니다. 이 때, 관리자 메일 주소로 메일이 보내지며, 모든 수신자들에게 blind carbon copy가 보내집니다. 만약 많은 사람들에게 메일을 보내서 발송 후 조금 지연되더라도 페이지를 이동하지 마십시오. 전체 메일 전달에 시간이 오래 걸리는 것은 정상이며, 작업이 완료되면 메시지가 뜹니다';
$lang['Compose'] = '작성';

$lang['Recipients'] = '수신자';
$lang['All_users'] = '모든 사용자';

$lang['Email_successfull'] = '메시지가 보내졌습니다';
$lang['Click_return_massemail'] = '전체 메일 양식으로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';


//
// Ranks admin
//
$lang['Ranks_title'] = '회원등급관리';
$lang['Ranks_explain'] = '이 양식으로 등급을 추가, 편집, 보기 및 삭제할 수 있습니다. 사용자 관리 기능을 사용하여 사용자에게 적용될 특별 등급도 만들수 있습니다. 아래에서 관리자가 설정한 최소 글 수가 등급 결정의 기준이 되며 사이트에 올린 사용자의 글 수를 아래의 기준에 비교하여 사용자의 등급이 자동으로 결정됩니다. <br/>시스템 관리자나 사이트 운영자같이 게시물수에 상관없는 특별한 사용자는 특별 등급을 "예"로 설정하십시요.<br/><b>예시)</b><br/>총게시물수가 50개 이상 : 준우수회원<br/>총게시물수가 100개 이상 : 우수회원 ';

$lang['Add_new_rank'] = '새로운 등급 추가';

$lang['Rank_title'] = '등급<br/>';
$lang['Rank_special'] = '특별 등급으로 설정';
$lang['Rank_minimum'] = '최소 글 수 ';
$lang['Rank_maximum'] = '최대 글 수';
$lang['Rank_image'] = '등급 이미지';
$lang['Rank_image_explain'] = '이것은 등급에 연관된 작은 이미지를 정의합니다';
$lang['Rank_image_explain2'] = '(WebManager 루트에 대한 상대적 경로)';

$lang['Must_select_rank'] = '등급을 선택해야 합니다';
$lang['No_assigned_rank'] = '특별 등급이 지정되지 않았습니다';

$lang['Rank_updated'] = '등급이 성공적으로 업데이트되었습니다';
$lang['Rank_added'] = '등급이 성공적으로 추가되었습니다';
$lang['Rank_removed'] = '등급이 성공적으로 삭제되었습니다';
$lang['No_update_ranks'] = '등급이 성공적으로 삭제되었습니다만, 이 등급을 사용하는 사용자 계정이 업데이트되지 않았습니다. 이 계정들에 대한 등급을 수동으로 초기화 해야 합니다';

$lang['Click_return_rankadmin'] = '등급 관리로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';


//
// Disallow Username Admin
//
$lang['Disallow_control'] = '사용불가 ID 설정';
$lang['Disallow_explain'] = '여기에서는 사용불가한 ID를 미리 등록해 놓을 수 있습니다. 사용 불가한 ID 지정시에 와일드 문자를 이용할 수 있습니다.  이미 등록된 ID는 지정할 수 없으므로, 그 ID를 먼저 삭제 후, 사용 불가한 ID로 등록하시기 바랍니다.';

$lang['Delete_disallow'] = '삭제';
$lang['Delete_disallow_title'] = '사용 불가 ID 삭제 하기';
$lang['Delete_disallow_explain'] = '다음 리스트에서 ID를 선택하고 삭제버튼을 클릭함으로써 사용 불가 ID를 삭제할 수 있습니다';

$lang['Add_disallow'] = '추가';
$lang['Add_disallow_title'] = '사용 불가 ID 추가';
$lang['Add_disallow_explain'] = '와일드 문자를 사용하여 사용 불가한 ID를 지정할 수 있습니다';

$lang['No_disallowed'] = '사용 불가한 ID 없음';

$lang['Disallowed_deleted'] = '사용이 불가한 ID가 목록에서 삭제되었습니다';
$lang['Disallow_successful'] = '사용이 불가한 ID가 목록에서 추가되었습니다';
$lang['Disallowed_already'] = '입력한 ID는 이미 사용 불가 목록이나 검열 단어 리스트에 포함되어 있습니다';

$lang['Click_return_disallowadmin'] = '사용 불가 ID 관리로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';


//
// Styles Admin
//
$lang['Styles_admin'] = '스킨 관리';
$lang['Styles_explain'] = '여기에서는 사용자가 사용할 수 있는 스타일(템플릿 및 스킨)을 추가, 삭제 및 관리할 수 있습니다';
$lang['Styles_addnew_explain'] = '다음 리스트는 현재 귀하가 갖고 있는 템플릿에 적용될 수 있는 스킨들입니다. 이 리스트 상의 아이템들은 아직 WebManager 데이터베이스에 설치되지 않았습니다. 이 스킨들을 사용하시려면 스킨을 설치하셔야 합니다. 스킨을 설치하려면 설치 링크를 클릭하십시오';

$lang['Select_template'] = '템플릿 선택';

$lang['Style'] = '스킨';
$lang['Template'] = '템플릿';
$lang['Install'] = '설치';
$lang['Download'] = '다운로드';

$lang['Edit_theme'] = '스킨 편집';
$lang['Edit_theme_explain'] = '선택된 스킨에 대한 설정은 아래 양식에서 편집할 수 있습니다';

$lang['Create_theme'] = '스킨 만들기';
$lang['Create_theme_explain'] = '아래의 양식을 사용하여 선택된 템플릿에 대한 새로운 스킨을 만들 수 있습니다. 색을 입력시(16진수 사용하여), # 를 사용하지 마십시오, 즉, CCCCCC 는 올바른 표기이고, #CCCCCC 는 잘못된 표기입니다';

$lang['Export_themes'] = '스킨내보내기';
$lang['Export_explain'] = '여기에서는 선택된 템플릿에 대한 스킨을 내보내기 할 수 있습니다. 아래의 리스트에서 탬플릿을 선택하면 스크립트가 스킨 구성 파일을 작성하고 그 파일을 템플릿 디렉토리에 저장합니다. 저장에 실패하면 다운로드 옵션이 표시될 것입니다. 스크립트가 파일을 저장할 수 있도록 하려면 선택된 템플릿 디렉토리에 대한 웹서버에 쓰기 권한을 줘야 합니다. 보다 자세한 내용은 WebManager 사용자 설명서를 참조하십시오.';

$lang['Theme_installed'] = '선택된 스킨이 성공적으로 설치되었습니다';
$lang['Style_removed'] = '선택된 스킨이 데이터베이스에서 삭제되었습니다. 시스템에서 이 스킨을 완전히 지우려면 템플릿 디렉토리에서 해당 스킨을 지워야 합니다.';
$lang['Theme_info_saved'] = '선택된 템플릿에 대한 스킨 정보가 저장되었습니다. 이제 theme_info.cfg (또한 선택된 템플릿 디렉토리) 에 대한 권한을 읽기-전용으로 바꿔 놓아야 합니다';
$lang['Theme_updated'] = '선택된 스킨이 업데이트되었습니다. 바뀐 스킨 설정을 Backup하기 위해서는 "스킨내보내기"라는 메뉴에서 스킨을 적용한 템플릿을 선택한 후 "제출"버튼을 누르셔야 합니다.';
$lang['Theme_created'] = '스킨이 만들어졌습니다. 새로 생성된 스킨을 Backup하기 위해서는 "스킨내보내기"라는 메뉴에서 스킨을 적용한 템플릿을 선택한 후 "제출"버튼을 누르셔야 합니다.';

$lang['Confirm_delete_style'] = '이 스킨을 지우시겠습니까?';

$lang['Download_theme_cfg'] = 'Exporter가 스킨 정보 파일을 작성할 수 없습니다. 아래의 버튼을 클릭하여 브라우저에서 이 파일을 다운로드하신 후, 다운 받은 파일을 템플릿 파일들이 있는 디렉토리로 이동시키십시오. 그 후에, 그 파일들을 사용할 수 있습니다';
$lang['No_themes'] = '선택된 템플릿에 적용할 스킨이 없습니다. 새로운 스킨을 만들려면 왼쪽의 새로 만들기 링크를 클릭하십시오';
$lang['No_template_dir'] = '템플릿 디렉토리를 열 수 없습니다. 웹서버가 읽을수 없거나 존재하지 않습니다';
$lang['Cannot_remove_style'] = '선택된 스킨은 현재 사이트 기본값이기때문에 삭제할 수 없습니다. 기본 스킨을 바꾼 다음에 다시 시도해 보십시오.';
$lang['Style_exists'] = '선택된 스킨 이름이 이미 존재 하므로 돌아가서 다른 이름을 선택하십시오.';

$lang['Click_return_styleadmin'] = '스킨 관리로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오';

$lang['Theme_settings'] = '스킨 설정';
$lang['Theme_element'] = '스킨 요소';
$lang['Simple_name'] = '단순 이름';
$lang['Value'] = '값';
$lang['Save_Settings'] = '설정 저장';

$lang['Stylesheet'] = 'CSS 스타일시트';
$lang['Background_image'] = '배경 이미지';
$lang['Background_color'] = '배경 색';
$lang['Theme_name'] = '스킨명';
$lang['Link_color'] = '링크 색';
$lang['Text_color'] = '문자 색';
$lang['VLink_color'] = '방문한 링크 색';
$lang['ALink_color'] = '활동 링크 색';
$lang['HLink_color'] = 'Hover 링크 색';
$lang['Tr_color1'] = '테이블 열 색 1';
$lang['Tr_color2'] = '테이블 열 색2';
$lang['Tr_color3'] = '테이블 열 색 3';
$lang['Tr_class1'] = '테이블 열 클래스 1';
$lang['Tr_class2'] = '테이블 열 클래스 2';
$lang['Tr_class3'] = '테이블 열 클래스 3';
$lang['Th_color1'] = '테이블 헤더 색 1';
$lang['Th_color2'] = '테이블 헤더 색  2';
$lang['Th_color3'] = '테이블 헤더 색 3';
$lang['Th_class1'] = '테이블 헤더 클래스 1';
$lang['Th_class2'] = '테이블 헤더 클래스 2';
$lang['Th_class3'] = '테이블 헤더 클래스 3';
$lang['Td_color1'] = '테이블 셀 색 1';
$lang['Td_color2'] = '테이블 셀 색 2';
$lang['Td_color3'] = '테이블 셀 색 3';
$lang['Td_class1'] = '테이블 셀 클래스 1';
$lang['Td_class2'] = '테이블 셀 클래스 2';
$lang['Td_class3'] = '테이블 셀 클래스 3';
$lang['fontface1'] = '폰트 모양 1';
$lang['fontface2'] = '폰트 모양 2';
$lang['fontface3'] = '폰트 모양 3';
$lang['fontsize1'] = '폰트 크기 1';
$lang['fontsize2'] = '폰트 크기 2';
$lang['fontsize3'] = '폰트 크기 3';
$lang['fontcolor1'] = '폰트 색 1';
$lang['fontcolor2'] = '폰트 색 2';
$lang['fontcolor3'] = '폰트 색 3';
$lang['span_class1'] = '스팬 클래스 1';
$lang['span_class2'] = '스팬 클래스 2';
$lang['span_class3'] = '스팬 클래스 3';
$lang['img_poll_size'] = '투표 이미지 크기 [px]';
$lang['img_pm_size'] = '쪽지 이미지 크기 [px]';


//
// Install Process
//
$lang['Welcome_install'] = 'WebManager 설치를 환영합니다';
$lang['Initial_config'] = '기본 구성';
$lang['DB_config'] = '데이터베이스 구성';
$lang['Admin_config'] = '운영 구성';
$lang['continue_upgrade'] = '구성 파일을 일단 컴퓨터로 다운로드한 다음에는 하단의 \'업그레이드 계속\' 버튼으로 업그레이드 과정을 계속할 수 있습니다.  구성 파일의 업로드를 하려면 업그레이드가 완료될때까지 기다리십시오.';
$lang['upgrade_submit'] = '업그레이드 계속';

$lang['Installer_Error'] = '설치하는 동안 에러가 발생했습니다';
$lang['Previous_Install'] = '이전 설치를 발견했습니다';
$lang['Install_db_error'] = '데이터베이스 업데이트에 에러가 발생했습니다';

$lang['Re_install'] = '이전 설치한 것이 아직 작동중입니다. <br /><br />WebManager 를 재설치 하려면 아래의 Yes 버튼을 클릭하십시오. 기존의 데이터는 모두 없어지며 백업도 만들어 지지 않음을 주의하십시오. 사이트 로그인시에 사용했던 운영자의 ID와 비밀번호는 재설치후에 다시 만들어지지만, 그 외의 다른 설정들은 복구되지 않습니다. <br /><br />Yes를 누르기전에 잘 생각해 보시기 바랍니다!';

$lang['Inst_Step_0'] = 'WebManager를 선택해 주셔서 감사합니다. 본 설치를 완료하려면 아래 요구사항을 기재하십시오. 설치하려는 데이터베이스가 이미 존재해야 하는 것을 주지하십시오. MS 액세스와 같이 ODBC를 사용하는 데이터베이스에 설치한다면, 진행전에 해당 DSN을 먼저 만들어야 합니다.';

$lang['Start_Install'] = '설치 시작';
$lang['Finish_Install'] = '설치 완료';

$lang['Default_lang'] = '기본 사이트 언어';
$lang['DB_Host'] = '데이터베이스 서버 호스트이름 / DSN';
$lang['DB_Name'] = '데이터베이스 이름';
$lang['DB_Username'] = '데이터베이스 ID';
$lang['DB_Password'] = '데이터베이스 비밀번호';
$lang['Database'] = '데이터베이스';
$lang['Install_lang'] = '설치용 언어 선택';
$lang['dbms'] = '데이터베이스 형식';
$lang['Table_Prefix'] = '데이터베이스 테이블용 서문(prefix)';
$lang['Admin_Username'] = '운영자 ID';
$lang['Admin_Password'] = '운영자 비밀번호';
$lang['Admin_Password_confirm'] = '운영자 비밀번호  [ 확인 ]';

$lang['Inst_Step_2'] = '운영자 ID가 만들어졌습니다. 이제 기본적인 설치가 완료되었습니다. 다음 화면에서 설치를 조율할 수 있습니다. 일반 설정의 세부사항들을 확인하고 필요한 수정을 하십시오. WebManager를 선택해 주셔서 감사합니다.';

$lang['Unwriteable_config'] = '구성 파일이 현재 쓰기가 안됩니다. 아래의 버튼을 클릭하면 구성 파일의 복사본이 시스템으로 다운로드 될 것입니다. 이 파일을 WebManager와 동일한 디렉토리에 업로드해야 합니다. 그런 다음, 앞의 양식에서 입력한 운영자 ID와 비밀번호로 로그인하고 운영자 제어 센터(로그인하면 각 화면의 밑에 링크가 나타날 것입니다)로 가서 일반 구성을 확인해야 합니다. WebManager를 선택해 주셔서 감사합니다.';
$lang['Download_config'] = '구성 파일 다운로드';

$lang['ftp_choose'] = '다운로드 방법 선택';
$lang['ftp_option'] = '<br />이 버전의 PHP는 FTP 사용이 가능하기 때문에 우선적으로 자동으로 구성 파일을 ftp 할 것인지를 선택하는 옵션이 주어집니다.';
$lang['ftp_instructs'] = '파일을 자동으로 WebManager 가 있는 계정으로 ftp 하도록 선택하였습니다. 그 작업을 돕는 정보를 아래에 입력하십시오. 다른 ftp 프로그램을 사용할 때와 마찬가지로 FTP 경로는 정확한 경로 여야 합니다.';
$lang['ftp_info'] = 'FTP 정보를 입력하십시오';
$lang['Attempt_ftp'] = '구성 파일 전송 시도';
$lang['Send_file'] = '파일을 내게 보내면 내가 수동으로 ftp 하겠음';
$lang['ftp_path'] = 'WebManager 에 대한 FTP 경로';
$lang['ftp_username'] = 'FTP ID';
$lang['ftp_password'] = 'FTP 비밀번호';
$lang['Transfer_config'] = '전송 시작';
$lang['NoFTP_config'] = '구성 파일의 전송이 실패했습니다. 구성 파일을 다운로드하여 수동으로 ftp 전송하십시오.';

$lang['Install'] = '설치';
$lang['Upgrade'] = '업그레이드';


$lang['Install_Method'] = '설치 방법을 선택하십시오';

$lang['Install_No_Ext'] = '서버상의 php 구성이 선택된 데이터베이스를 지원하지 않습니다';

$lang['Install_No_PCRE'] = 'WebManager는 php용 Perl-Compatible Regular Expressions Module을 필요로 하는데 귀하의 php 구성은 그것을 지원하지 않고 있습니다!';


//
// mod : ezportal Admin
//
$lang['EZPortal_Config'] = '첫페이지관리';
$lang['EZPortal_Portal_settings'] = '첫페이지 설정';
$lang['Welcome_Text'] = '환영 메시지';
$lang['Html_areal'] = 'Html 영역';
$lang['Number_of_News'] = '공지사항 갯수';
$lang['News_length'] = '공지사항 길이';
$lang['News_Forum'] = '공지사항메뉴';
$lang['Poll_Forum'] = '투표메뉴';
$lang['Number_Recent_Topics'] = '최근 주제 갯수';
$lang['Exceptional_forums'] = '예외적인 메뉴<br>(첫페이지의 최근 게시물에 포함되지 않음)';
$lang['Last_Seen'] = 'Last seen users on forum';
$lang['Comma'] = 'Ctrl키를 누르시면 여러 개의 메뉴을 선택할 수 있습니다.';
//
//  END ezportal Admin
//


//-- mod : sub-templates ---------------------------------------------------------------------------
//-- add
$lang['Subtemplate'] = '서브템플릿';
$lang['Subtemplate_explain'] = '카테고리나 메뉴에 적용할 서브템플릿을 설정할 수 있습니다';
$lang['Choose_main_style'] = '기본 스킨을 선택하십시오';
$lang['main_style'] = '기본 서브템플릿';
$lang['subtpl_name'] = '서브템플릿 명칭';
$lang['subtpl_dir'] = '서브템플릿 디렉토리';
$lang['subtpl_imagefile'] = '이미지 설정 파일';
$lang['subtpl_create'] = '새로운 서브템플릿 추가';
$lang['subtpl_usage'] = '적용된 서브템플릿 : ';
$lang['Select_dir'] = '디렉토리 선택';

$lang['subtpl_error_name_missing'] = '서브템플릿을 찾을 수 없습니다.';
$lang['subtpl_error_dir_missing'] = '서브템플릿 디렉토리를 찾을 수 없습니다.';
$lang['subtpl_error_no_selection'] = '서브템플릿을 선택해 주십시오.';

$lang['subtpl_click_return'] = '서브템플릿이 추가되었습니다. 서브템플릿 관리로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하십시오.';
//-- fin mod : sub-templates -----------------------------------------------------------------------

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
$lang['Category_attachment']					= '카테고리 추가할 위치';
$lang['Category_desc']							= '카테고리 설명';
$lang['Category_config_error_fixed']			= '카테고리 설정에서 발생한 문제점이 수정되었습니다.';
$lang['Attach_forum_wrong']						= '메뉴 아래에 메뉴를 생성할 수 없습니다. 메뉴를 추가할 카테고리를 선택해 주십시요.';
$lang['Attach_root_wrong']						= '메뉴를 생성할 수 없습니다.';
$lang['Forum_name_missing']						= '메뉴 이름을 입력해 주세요.';
$lang['Category_name_missing']					= '카테고리 이름을 입력해 주세요.';
$lang['Only_forum_for_topics']					= '게시물은 카테고리가 아닌 메뉴에만 속할 수 있습니다.';
$lang['Delete_forum_with_attachment_denied']	= '하위 카테고리를 가지고 있는 메뉴은 삭제할 수 없습니다.';

$lang['Category_delete']						= '카테고리 삭제';
$lang['Category_delete_explain']				= '카테고리를 삭제할 수 있습니다. 카테고리를 삭제시키기전에 카테고리가 포함했던 메뉴를 옮겨 놓을 위치를 결정해 주십시요.';
// forum links type
$lang['Forum_link_url']							= '링크시킬 URL';
$lang['Forum_link_url_explain']					= '링크시킬 URL을 입력해주세요. 완전한 URL을 입력해야 합니다. 예)http://www.yahoo.co.kr';
$lang['Forum_link_internal']					= 'WebManager프로그램';
$lang['Forum_link_internal_explain']			= '링크시킬 WebManager file명(디렉토리를 포함)을 입력해 주세요.';
$lang['Forum_link_hit_count']					= '조회수';
$lang['Forum_link_hit_count_explain']			= '링크된 메뉴의 조회수를 알고 싶으면 yes를 선택하세요.';
$lang['Forum_link_with_attachment_deny']		= '이 메뉴은 하위 카테고리가 존재하므로 링크메뉴으로 변환할 수 없습니다.';
$lang['Forum_link_with_topics_deny']			= '이 메뉴은 게시물이 있으므로 링크메뉴으로 변환할 수 없습니다.';
$lang['Forum_attached_to_link_denied']			= '링크메뉴에는 메뉴나 카테고리를 새롭게 생성시킬 수 없습니다.';
//-- fin mod : categories hierarchy ----------------------------------------------------------------

//-- mod : mods settings ---------------------------------------------------------------------------
//-- add
$lang['Configuration_extend']	= '설정 +';
$lang['Override_user_choices']	= '사용자 선택 무시';
//-- fin mod : mods settings -----------------------------------------------------------------------

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
$lang['Icons_settings_explain']		= '메시지 아이콘을 추가,수정 및 삭제할 수 있습니다.';
$lang['Icons_auth']					= '권한';
$lang['Icons_auth_explain']			= '권한 설정에 따라 이 아이콘을 이용할 수 있습니다.';
$lang['Icons_defaults']				= '기본 설정';
$lang['Icons_defaults_explain']		= '주제글에 메시지 아이콘을 별도로 사용하지 않고 입력했을 때 기본적으로 다음과 같이 설정이 됩니다.';
$lang['Icons_delete']				= '아이콘 삭제';
$lang['Icons_delete_explain']		= '이 아이콘을 대체할 아이콘을 선택해 주세요 :';
$lang['Icons_confirm_delete']		= '삭제하시겠습니까?';

$lang['Icons_lang_key']				= '아이콘 명칭';
$lang['Icons_lang_key_explain']		= '아이콘 명칭은 마우스가 아이콘 위에 올려졌을 때 보여집니다. 글씨나 문자표를 입력할 수 있습니다. <br />( language/lang_<i>your_language</i>/lang_main.php를 체크해 주세요.).';
$lang['Icons_icon_key']				= '아이콘';
$lang['Icons_icon_key_explain']		= '아이콘 이미지 URL을 입력해주세요. <br />( templates/<i>your_template</i>/<i>your_template</i>.cfg 를 체크해 주세요.)';

$lang['Icons_error_title']			= '아이콘 이름을 입력해 주세요.';
$lang['Icons_error_del_0']			= '기본적인 아이콘은 삭제할 수 없습니다.';

$lang['Refresh']					= '새로고침';
$lang['Usage']						= '사용(%)';
//-- fin mod : post icon ---------------------------------------------------------------------------


//-- mod : qbar ------------------------------------------------------------------------------------
//-- add
// title
$lang['Qbar_admin']							= '메뉴 관리';
$lang['Qbar_admin_explain']					= '메뉴에 대한 관리을 할 수 있습니다.';
$lang['Qbar_menu']							= '메뉴';
$lang['Qbar_admin_panel']					= 'SubMenu 설정';
$lang['Qbar_admin_panel_explain']			= 'SubMenu를 생성하거나 수정할 수 있습니다. SubMenu는 사이트의 헤더부분에 나타납니다.';
$lang['Qbar_admin_field']					= 'SubMenu Field';
$lang['Qbar_admin_field_explain']			= 'SubMenu에 새로운 Field를 추가하거나 수정할 수 있습니다.';
$lang['Qbar_admin_import']					= 'SubMenu 가져오기';
$lang['Qbar_admin_import_explain']			= '이미 설정되어 있는 다른 SubMenu에서 메뉴항목(Field)을 가져올 수 있습니다.';
$lang['Qbar_settings']						= '설정';

// qbar def
$lang['Qbar_name']							= 'SubMenu 명칭';
$lang['Qbar_name_explain']					= 'SubMenu 명칭은 사용자에게 보이지 않습니다. : SubMenu 명칭은 관리자페이지에서만 사용됩니다.';
$lang['Qbar_class']							= 'Class';
$lang['Qbar_class_explain']					= 'Bar 선택 : 홈페이지 헤더의 가장 상위 부분에 위치함.<br/>Menu : 홈페이지 헤더 하위부분에 위치함.';
$lang['Qbar_display']						= 'Display';
$lang['Qbar_display_explain']				= 'SubMenu를 나타내려면 "예"를 선택하세요.';
$lang['Qbar_cells']							= '한 라인에 표시되는 메뉴 수';
$lang['Qbar_cells_explain']					= '한 라인에 표시되는 메뉴 수 : 메뉴의 총 개수가 지정한 수를 넘으면 새로운 라인이 생성됩니다.';
$lang['Qbar_in_table']						= '테이블로 표시';
$lang['Qbar_in_table_explain']				= '"예"를 선택하며 메뉴가 테이블 형태로 표시됩니다.';
$lang['Qbar_style']							= 'Submenu에 스킨 적용';
$lang['Qbar_style_explain']					= 'Submenu의 Display가 선택하는 스킨의 영향을 받습니다.';
$lang['Qbar_sub_template']					= 'Submenu에 서브템플릿 적용';
$lang['Qbar_sub_template_explain']			= 'Submenu의 Display가 선택하는 서브템플릿의 영향을 받습니다.';

// field def
$lang['Qbar_field_name']					= 'Field name';
$lang['Qbar_field_name_explain']			= 'Field name은 일반 사용자에게 보이지 않습니다. : Field name은 submenu의 메뉴를 지칭하는 이름이며 내부(관리자페이지)에서만 사용됩니다.';
$lang['Qbar_shortcut']						= 'Shortcut';
$lang['Qbar_shortcut_explain']				= 'Shortcut은 Submenu에서 메뉴로 보여지는 이름입니다. 지정한 이름이 lang_main.php에 존재하는 변수명이면 변수에 해당하는 value가 메뉴에 보여지고 lang_main.php에 존재하지 않는 변수명이면 사용자가 입력하는 값으로 메뉴의 이름이 표시됩니다. <br />(변수의 value를 수정하려면 language/lang_<i>your_language</i>/lang_main.php를 수정하세요.)';

$lang['Qbar_explain']						= 'Mouse over';
$lang['Qbar_explain_explain']				= '링크나 아이콘으로 표시되는 메뉴 위에 마우스를 올려 놓았을 때 나타나는 메시지입니다. 글자나 문자표를 이용할 수 있습니다.<br />(나타나는 메시지를 수정하려면 language/lang_<i>your_language</i>/lang_main.php를 수정하세요.).';
$lang['Qbar_alternate']						= 'Alternate shortcut';
$lang['Qbar_alternate_explain']				= '쪽지(Private Message)가 둘 이상이면 Shortcut대신 Alternate shortcut이 메뉴에 나타납니다. 영어로 복수를 나타내는 "-s"를 표현하기 위해 Alternate shortcut 기능이 추가되었습니다. Shortcut과 마찬가지로 사용자가 지정한 이름이 lang_main.php에 존재하는 변수명이면 해당 value가 나타나고 그렇지 않으면 입력한 값이 나타납니다.<br />(변수의 value를 수정하려면 language/lang_<i>your_language</i>/lang_main.php를 수정하세요.).';
$lang['Qbar_icon']							= '아이콘';
$lang['Qbar_icon_explain']					= '아이콘 이미지가 있는 경로를 입력해 주세요. <br />(templates/<i>your_template</i>/<i>your_template</i>.cfg를 체크해주세요.)';
$lang['Qbar_icon2']							= '아이콘2';
$lang['Qbar_icon2_explain']					= '아이콘2 이미지가 있는 경로를 입력해 주세요. <br />(templates/<i>your_template</i>/<i>your_template</i>.cfg를 체크해주세요.)';
$lang['Qbar_use_value']						= 'Shortcut 표시';
$lang['Qbar_use_value_explain']				= 'Shortcut을 나타내려면 "예"를 선택하세요.';
$lang['Qbar_use_icon']						= 'Icon 표시';
$lang['Qbar_use_icon_explain']				= 'Icon을 표시하려면  "예"를 선택하세요.';
$lang['Qbar_url']							= '프로그램 URL';
$lang['Qbar_url_explain']					= '메뉴를 클릭했을 때 연결시킬 프로그램 URL을 입력하세요. 프로그램이 WebManager 디렉토리에 있으면 URL을 입력하고 그 외에는 Full URL을 입력하세요.(예:aaaa.php)';
$lang['Qbar_internal']						= 'WebManager 프로그램';
$lang['Qbar_internal_explain']				= '"예"를 선택하면 WebManager 프로그램과 연결되고, 외부 접근에 대한 보안이 이루어집니다.';
$lang['Qbar_auth_logged']					= '로그인';
$lang['Qbar_auth_logged_explain']			= '로그인 상태에 따라 메뉴의 표시가 달라집니다. "Prohibited"을 선택하면 로그인 시 해당 메뉴만 보이지 않습니다.';
$lang['Qbar_auth_admin']					= '사용자 수준';
$lang['Qbar_auth_admin_explain']			= '사용자 수준에 따라 메뉴의 표시가 달라집니다. "Ignore"를 선택하면 항상 메뉴가 표시됩니다.';
$lang['Qbar_auth_pm']						= 'PM awaiting';
$lang['Qbar_auth_pm_explain']				= 'PM awaiting의 설정에 따라 메뉴의 표시가 달라집니다. "Ignore"를 선택하면 항상 메뉴가 표시됩니다.';
$lang['Qbar_tree_id']						= '사이트 구조';
$lang['Qbar_tree_id_explain']				= '사용자의 보기 권한에 따라 메뉴가 보이는 수준이 달라집니다.';

$lang['Qbar_auths']							= '권한';
$lang['Qbar_private_messages']				= '쪽지(PM:Private Messages) 관리';

// specific actions
$lang['Qbar_delete_panel']					= 'SubMenu 삭제';
$lang['Qbar_delete_panel_confirm']			= 'SubMenu <b>%s</b>를 삭제하시겠습니까?';

$lang['Qbar_delete_field']					= '메뉴 삭제';
$lang['Qbar_delete_field_confirm']			= '메뉴 "%s"를 <b>%s</b>에서 삭제하시겠습니까?';

// error messages
$lang['Qbar_error_panel_system']			= 'System Qbar는 수정하거나 삭제할 수 없습니다.';
$lang['Qbar_error_panel_exists']			= '동일한 SubMenu name이 존재합니다.';
$lang['Qbar_error_panel_not_found']			= 'SubMenu name이 존재하지 않습니다.';
$lang['Qbar_error_panel_empty_name']		= 'SubMenu name을 지정해야합니다.';
$lang['Qbar_error_panel_empty_cells']		= 'SubMenu를 나타내려면 한 라인 당 표시할 메뉴의 수를 지정해야합니다.';

$lang['Qbar_error_field_exists']			= '동일한 메뉴(Field name)이 존재합니다.';
$lang['Qbar_error_field_not_found']			= '동일한 메뉴가 존재하지 않습니다.';
$lang['Qbar_error_field_empty_name']		= '메뉴명(Field name)을 입력해야 합니다.';
$lang['Qbar_error_field_system']			= 'System SubMenu의 메뉴명은 수정하거나 삭제할 수 없습니다.';
$lang['Qbar_error_field_empty_shortcut']	= 'Shortcut을 사용하려면 Shortcut란에 변수명이나 사용할 메뉴의 이름을 입력해야 합니다.';
$lang['Qbar_error_field_empty_icon']		= '아이콘을 보이게 하려면 아이콘을 지정해주세요.';
$lang['Qbar_error_field_display_nothing']	= '링크나 아이콘을 이용하기 위해서 반드시 선택해야 합니다.';
$lang['Qbar_error_field_empty_url']			= '링크의 URL이나 URI를 입력해야 합니다.';
$lang['Qbar_error_field_external_url']		= '도메인(http://)을 입력하지 마세요.';

// auths
$lang['Qbar_auth_ignore']					= 'Ignore';
$lang['Qbar_auth_required']					= 'Required';
$lang['Qbar_auth_prohibited']				= 'Prohibited';
$lang['Qbar_auth_pm_new']					= '새로운 쪽지';
$lang['Qbar_auth_pm_no_new']				= '새로운 쪽지 없음';
$lang['Qbar_auth_pm_unread']				= '읽지 않은 쪽지';

// classes
$lang['Qbar_class_system']					= 'System';
$lang['Qbar_class_bar']						= 'Bar';
$lang['Qbar_class_menu']					= 'Menu';

// generic actions
$lang['Create_field']						= '메뉴 추가';
$lang['Create_panel']						= 'SubMenu 추가';

// misc.
$lang['Qbar_none']							= '---------- None ----------';
$lang['Import']								= '가져오기';
$lang['Refresh']							= '새로고침';
$lang['Qbar_all']							= '---------- All -----------';
//-- fin mod : qbar --------------------------------------------------------------------------------

// portal addon
$lang['Album_category'] = '앨범 카테고리<br>(첫페이지의 최근 이미지를 어떤 앨범 메뉴에서 가져올지 선택) ';
$lang['Banner_board'] = '배너 메뉴';

// Log actions MOD Start
$lang['Log_action_title'] = 'Logs Actions';
$lang['Log_action_explain'] = '메뉴운영자/시스템관리자의 Log 기록을 볼 수 있습니다.';
$lang['Choose_sort_method'] = '정렬 항목';
$lang['Order'] = '정렬 방식';
$lang['Go'] = '정렬';
$lang['Id_log'] = 'Log Id';
$lang['Choose_log'] = 'Log 선택';
$lang['Delete'] = '삭제';
$lang['Action'] = 'Action';
$lang['Topic'] = 'Index No.';
$lang['Done_by'] = 'ID';
$lang['User_ip'] = '사용자 IP';
$lang['Select_all'] = '전체 선택';
$lang['Unselect_all'] = '선택 해제';
$lang['Date'] = '시간';
$lang['See_topic'] = 'See the post';
$lang['Log_delete'] = 'Log기록을 삭제했습니다.';
$lang['Click_return_admin_log'] = 'Logs Actions로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하세요.';
$lang['Log_Config_updated'] = 'Log 설정을 변경하였습니다.';
$lang['Click_return_admin_log_config'] = 'Logs 설정으로 돌아가려면 %s<font color=#0072BC>여기</font>%s를 클릭하세요.';
$lang['Log_Config'] = 'Log 설정';
$lang['Log_Config_explain'] = 'Log Action에 대한 옵션을 설정할 수 있습니다.';
$lang['General_Config_Log'] = 'Log Action에 대한 일반적인 설정';
$lang['Allow_all_admin'] = '다른 시스템관리자가 Log Action을 볼 수 있도록 하시겠습니까?';
$lang['Allow_all_admin_explain'] = '이 옵션은 ceo외에 다른 시스템관리자가 Log Actions을 볼 수 있도록 설정할 수 있습니다. <br/>"Enabled"를 선택하면 모든 시스템관리자가 Log action을 볼 수 있고 "Disabled"를 선택하면 아래의 목록에 추가된 시스템 관리자만 Log actions을 볼 수 있습니다.';
$lang['Admin_not_authorized'] = '죄송합니다. 이 페이지를 볼 수 있는 권한이 없습니다.';
$lang['Add_username_admin_explain'] = 'Log actions을 볼 수 있는 권한을 부여할 관리자를 선택해 주세요.시스템 관리자 권한이 있는 사람만 선택 가능합니다.';
$lang['Delete_username_admin_explain'] = 'Log actions을 보이지 않을 관리자를 선택해 주세요.';
$lang['No_other_admins'] = '추가할 관리자가 없습니다.';
$lang['No_admins_authorized'] = '권한을 부여받은 관리자가 없습니다.';
$lang['Add_Admin_Username'] = '추가할 관리자를 선택해 주세요.';
$lang['Delete_Admin_Username'] = '삭제할 관리자를 선택해 주세요.';
$lang['No_admins_allow'] = 'Log 기록을 볼 수 있는 관리자가 없습니다.';
$lang['No_admins_disallow'] = 'Log 기록을 볼 수 없는 관리자가 없습니다.';
$lang['Admins_add_success'] = 'Log actions을 볼 수 있는 관리자 목록에 추가되었습니다.';
$lang['Admins_del_success'] = 'Log actions을 볼 수 있는 관리자 목록에서 삭제되었습니다.';

// Log actions MOD End

// Korean user-info
$lang['field_conf'] = "가입항목설정";
$lang['field_use_off'] = "사용안함";
$lang['field_use_on'] = "선택입력";
$lang['field_use_req'] = "필수입력";

$lang['field_realname'] = "이름을 입력받을수 있도록 설정 합니다.";
$lang['field_jumin'] = "주민등록을 입력받을수 있도록 설정 합니다";
$lang['field_mphone'] = "전화번호를 입력받을수 있도록 설정 합니다";
$lang['field_hphone'] = "핸드폰을 입력받을수 있도록 설정 합니다.";
$lang['field_birth'] = "생일을 입력받을수 있도록 설정 합니다.";
$lang['field_gender'] = "성별을 입력받을수 있도록 설정 합니다.";
$lang['field_from'] = "주소필드 입력방법을 선택합니다.";
$lang['field_occ'] = "직업필드 입력방법을 선택합니다";

$lang['Personal_Galleries'] = "개인앨범";
$lang['Clear_Cache'] = "Cache 삭제";
$lang['Categories'] = "카테고리";
$lang['Photo_Album'] = "앨범";
$lang['Portal'] = "첫페이지";
$lang['Users_List'] = "사용자목록";
$lang['Logs'] = "Logs";
$lang['Logs_Actions'] = "Logs Actions";
$lang['Logs_Config'] = "Logs 설정";

$lang['new_length'] = "새로운 글 기준시간 (New)";

$lang['split_field'] = "분리항목";

$lang['Moderator_Team'] = "관리팀";

$lang['Admin_only'] = "관리자만 등록";

$lang['mouse_right'] = "마우스 오른쪽 방지";
$lang['pics_per_row'] = "한줄에 올 사진 수";
$lang['popup_board'] = "팝업 메뉴";
$lang['popup_height'] = "높이(pixel)";
$lang['popup_width'] = "넓이(pixel)";
$lang['popup_board_use'] = "사용여부";
$lang['special_forum'] = "하위메뉴 보이는 포럼";

$lang['menu_manage'] = "메뉴별관리";
$lang['advanced_manage'] = "고급관리";

$lang['mass_mail'] = "전체메일보내기";


//admin_portal
$lang['admin_lang_announcement'] = '공지사항';
$lang['admin_lang_title'] = '타이틀';
$lang['admin_lang_number'] = '개수';
$lang['admin_lang_recent_posts'] = '최근 게시물';
$lang['admin_lang_from'] = '추출 대상';
$lang['admin_lang_new_pic1'] = '최근이미지 1';
$lang['admin_lang_hide_all'] = '숨김 (전체)';
$lang['admin_lang_hide_author'] = '숨김 (작성자)';
$lang['admin_lang_hide_date'] = '숨김 (작성일)';
$lang['admin_lang_new_pic2'] = '최근이미지 2';
$lang['admin_lang_poll'] = '투표';
$lang['admin_lang_calendar'] = '행사달력';
//admin_config
$lang['admin_lang_copyright_setting'] = 'Copyright 설정';
$lang['admin_lang_line_1'] = 'Line #1';
$lang['admin_lang_line_2'] = 'Line #2';
$lang['admin_lang_line_3'] = 'Line #3';
$lang['admin_lang_line_4'] = 'Line #4';
$lang['admin_lang_menu_setting'] = '메뉴설정';
$lang['admin_lang_left_scroll'] = '왼쪽 메뉴 스크롤 활성화';
$lang['admin_lang_right_scroll'] =  '오른쪽 메뉴 스크롤 활성화';
$lang['admin_lang_quick_links_title'] = '퀵링크 (타이틀)';
$lang['admin_lang_search_title'] = '검색 (타이틀)';
$lang['admin_lang_family_sites_title'] = '관련사이트 (타이틀)';
$lang['admin_lang_post_setting'] = '게시물 설정';
$lang['admin_lang_quick_links_hide'] = '퀵링크 (숨김)';
$lang['admin_lang_search_hide'] = '검색 (숨김)';
$lang['admin_lang_family_sites_hide'] = '관련사이트 (숨김)';
$lang['admin_lang_sitemap_hide'] = '사이트맵 (숨김)';
//admin_forum
$lang['admin_lang_first_time'] = '구조가 다른 메뉴 형태로 변경시 데이터가 유실될 수 있습니다.';
$lang['admin_lang_and_then'] = '한 뒤';
//navi
$lang['admin_lang_configuration'] = '전체설정';
$lang['admin_lang_index_page'] = '첫페이지관리';
$lang['admin_lang_main'] = '메인';
$lang['admin_lang_top'] = '상단';
$lang['admin_lang_users_list'] = '사용자목록';
$lang['admin_lang_group_management'] = '사용자그룹관리';
$lang['admin_lang_group_permissions'] = '사용자그룹권한';
$lang['admin_lang_mass_email'] = '전체메일보내기';
$lang['admin_lang_register_field'] = '가입항목설정';
$lang['admin_lang_control_panel'] = '파일관리';
$lang['admin_lang_management'] = '첨부파일 환경설정';
$lang['admin_lang_quota_limits'] = '파일용량제한';
$lang['admin_lang_shadow_attachments'] = '오류파일 관리';
$lang['admin_lang_extension_control'] = '확장자 관리';
$lang['admin_lang_extension_groups'] = '확장자 그룹 관리';
$lang['admin_lang_synchronize_attachments'] = '첨부파일 동기화';
$lang['admin_lang_word_censors'] = '단어 검열';
$lang['admin_lang_forbidden_extensions'] = '금지된 확장자 관리';
$lang['admin_lang_ban_control'] = '사용자 접근 금지';
$lang['admin_lang_disallow_names'] = '사용불가 아이디 설정';
$lang['admin_lang_backup'] = '백업';
$lang['admin_lang_restore'] = '복원';
$lang['admin_lang_upload'] = '자료업로드';
$lang['admin_lang_banner'] = '배너';
$lang['admin_lang_pop_up'] = '팝업';
$lang['admin_lang_skin'] = '스킨';
$lang['admin_lang_quick_links'] = '퀵링크';
$lang['admin_lang_family_sites'] = '관련사이트';
$lang['admin_lang_logo'] = '로고';
$lang['admin_lang_image_source'] = '이미지 보관함';
$lang['admin_lang_agreement'] = '가입조건';
$lang['admin_lang_event_box'] = 'Event Box';
$lang['admin_lang_mini_box'] = 'Mini Box';
$lang['admin_lang_sound'] = '배경음악';

$lang['admin_lang_csv_download'] = 'CSV 다운로드';
$lang['admin_lang_'] = '';
$lang['admin_lang_'] = '';
$lang['admin_lang_'] = '';
$lang['admin_lang_'] = '';

//
// That's all Folks!
// -------------------------------------------------

?>