<?php
/***************************************************************************
 *                            lang_admin_attach.php [Korean]
 *                              -------------------
 *     begin                : Thu Mar 06 2003
 *     copyright            : (C) 2003 Jang Jaeho
 *     email                : kiwidream@empal.com
 *
 *     $Id: lang_admin_attach.php,v 2.3.6 2003/03/06 Jaeho Exp $
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

//
// Attachment Mod Admin Language Variables
//

// Modules, this replaces the keys used
$lang['Control_Panel'] = '제어판';
$lang['Shadow_attachments'] = '오류파일 관리';
$lang['Forbidden_extensions'] = '금지된 확장자';
$lang['Extension_control'] = '관리';
$lang['Extension_group_manage'] = '그룹관리';
$lang['Special_categories'] = '특정 카테고리';
$lang['Sync_attachments'] = '동기화';
$lang['Quota_limits'] = '용량 제한';

// Attachments -> Management
$lang['Attach_settings'] = '첨부파일 환경설정';
$lang['Manage_attachments_explain'] = '이곳은 첨부파일 모드의 메인 설정을 조정하는 곳입니다. 문서 맨 아래쪽 \'테스트 설정\' 버튼 클릭하면, 첨부파일 모드가 제대로 동작하는지 시스템 테스트를 수행할겁니다. 파일 업로드에 문제가 있다면, 이 테스트를 수행하십시요. 자세한 에러 메시지가 보일겁니다.';
$lang['Attach_filesize_settings'] = '첨부파일 크기 설정';
$lang['Attach_number_settings'] = '첨부파일 수 설정';
$lang['Attach_options_settings'] = '옵션';

$lang['Upload_directory'] = '업로드 디렉토리';
$lang['Upload_directory_explain'] = '첨부파일 업로드 디렉토리를 위한 경로를 입력하십시요. 예를 들어, \'files\'이라 입력하면(http://www.yourdomain.com/WebManager 에 설치했다고 가정시), 첨부파일 업로드 디렉토리는 http://www.yourdomain.com/WebManager/files 가 됩니다.';
$lang['Attach_img_path'] = '첨부파일(게시글내) 아이콘';
$lang['Attach_img_path_explain'] = '게시글 안에 첨부파일 링크옆에 보이는 이미지 아이콘 경로입니다. 원치 않으면 빈 칸으로 남겨두십시요. 이 설정은 확장자 그룹관리내의 설정에 의해 덮여 쓰여집니다.';
$lang['Attach_topic_icon'] = '첨부파일(주제앞) 아이콘';
$lang['Attach_topic_icon_explain'] = '주제글 앞에 붙는 첨부파일 이미지 아이콘입니다. 원하지 않으면 빈 칸으로 남겨두십시요.';
$lang['Attach_display_order'] = '정렬방식';
$lang['Attach_display_order_explain'] = '첨부파일들의 정렬순을 선택할 수 있습니다. 내림차순(최근 첨부파일순)/오름차순(오래된 첨부파일순)';
$lang['Show_apcp'] = '첨부파일 제어판 보기';
$lang['Show_apcp_explain'] = '글쓰기 본문아래쪽에 - 첨부파일 제어판 보기를 원하면 (예), 첨부파일 펼침목록 보기를 원한다면 (아니오)를 선택하십시요. 직접 옵션을 바꿔서 그 모양을 확인해 보시면 이해가 빠를겁니다.';

$lang['Max_filesize_attach'] = '파일크기';
$lang['Max_filesize_attach_explain'] = '최대 첨부파일 크기. 0 값은 \'무제한\'. 이 설정값은 사용자의 서버 환경에 따라 제한될 수 있습니다.<br>예를 들어, 서버의 php 설정이 최대 2M 를 허용할때 이 이상의 값은 받아들여지지 않을 수 있습니다.';
$lang['Attach_quota'] = '용량제한';
$lang['Attach_quota_explain'] = '모든 첨부파일의 최대 디스크 할당량. 0 값은 \'무제한\'.';
$lang['Max_filesize_pm'] = '최대 파일크기 (쪽지함)';
$lang['Max_filesize_pm_explain'] = '각 사용자의 쪽지함내에서 첨부파일 최대 디스크 할당량.  0 값은 \'무제한\'.';
$lang['Default_quota_limit'] = '기본 용량 제한';
$lang['Default_quota_limit_explain'] = '새롭게 가입한 사용자나 용량 지정되지 않은 사용자에게 자동으로 기본 제한용량을 선택할 수 있습니다.<br>\'지정안함\' 옵션은 첨부파일 용량을 지정하지 않는다.';

$lang['Max_attachments'] = '최대 첨부파일 수';
$lang['Max_attachments_explain'] = '한 개의 게시글에 대한 최대 첨부파일 수.';
$lang['Max_attachments_pm'] = '한 개의 쪽지에 대한 최대 첨부파일 수';
$lang['Max_attachments_pm_explain'] = '쪽지에 사용자가 첨부할 수 있는 최대 파일수를 지정하십시요.';

$lang['Disable_mod'] = '첨부파일 모드 사용안함';
$lang['Disable_mod_explain'] = '이 옵션은 주로 새 템플릿이나 테마를 테스트 하기위한 것입니다. 모든 첨부파일 기능을 사용못하게 합니다.';
$lang['PM_Attachments'] = '쪽지에 첨부파일 사용하기';
$lang['PM_Attachments_explain'] = '쪽지에 파일 첨부를 가능하게 하거나 못하게 설정합니다.';
$lang['Ftp_upload'] = 'FTP 업로드 사용함';
$lang['Ftp_upload_explain'] = 'FTP 업로드 옵션 사용하기. \'예\'를 선택하면, 첨부파일 FTP 설정을 지정해야 하며 업로드 디렉토리는 더 이상 사용할 수 없게 됩니다.';
$lang['Attachment_topic_review'] = '주제 검토창에서 첨부파일 보기를 하시겠습니까?';
$lang['Attachment_topic_review_explain'] = '\'예\'를 선택하면, 답장쓰기를 할때 주제검토창에 첨부된 모든 파일들을 볼 수 있습니다.';

$lang['Ftp_server'] = 'FTP 업로드 서버';
$lang['Ftp_server_explain'] = '파일이 업로드될 IP주소나 FTP 호스트명을 입력하시기 바랍니다. 빈 칸으로 비워두면 WebManager 가 설치된 서버가 사용됩니다. 주소앞에 ftp:// 나 어떤것도 입력하지 마십시요. 그냥 ftp.foo.com 나 IP 주소만 입력하시기 바랍니다.';

$lang['Attach_ftp_path'] = 'FTP 업로드 디렉토리 경로';
$lang['Attach_ftp_path_explain'] = '첨부파일들이 저장될 디렉토리. chmod 를 사용할 필요는 없습니다. IP 나 FTP 주소는 입력하지 마십시요, FTP 경로만 입력하면 됩니다. <br />예: /home/web/uploads';
$lang['Ftp_download_path'] = 'FTP 경로의 다운로드 링크';
$lang['Ftp_download_path_explain'] = '첨부파일이 저장될 FTP 경로에 대한 URL을 입력하십시요.<br />Remote FTP 서버를 사용하시면, 전체 URL을 입력하시면 됩니다. 예: http://www.mystorage.com/WebManager/upload.<br />로컬 호스트를 사용하신다면, WebManager 디렉토리의 상대 URL 경로를 입력하실 수 있습니다. 예: \'upload\'.<br />인터넷으로부터 FTP 경로가 접근불가능하다면 빈 칸으로 남겨두십시요.';
$lang['Ftp_passive_mode'] = 'FTP Passive 모드 사용함';
$lang['Ftp_passive_mode_explain'] = 'PASV 명령어는 리모트 서버가 데이타 연결을 위해 하나의 포트를 열것을 요청하게 됩니다, 그리고 이 포트의 주소를 반환하게 됩니다. 리모트 서버는 이 포트에 귀를 기울이게 되고 클라이언트가 여기에 연결됩니다.';

$lang['No_ftp_extensions_installed'] = 'FTP 확장자가 PHP 설치에서 컴파일 되어있지 않은 이유로, FTP 업로드를 사용할 수 없습니다.';

// Attachments -> Shadow Attachments
$lang['Shadow_attachments_explain'] = '시스템상에 첨부파일은 존재하나 게시물이 없어졌거나, 게시물은 존재하나 링크된 첨부파일이 존재하지 않을때, 오류 파일들을 삭제할 수 있습니다.';
$lang['Shadow_attachments_file_explain'] = '파일 시스템상에 존재하지만 게시글에 지정되지 않은 첨부파일을 삭제하십시요.';
$lang['Shadow_attachments_row_explain'] = '파일 시스템상에 존재하지 않는 첨부파일들을 삭제하십시요.';
$lang['Empty_file_entry'] = '파일 목록 비우기';

// Attachments -> Sync
$lang['Sync_thumbnail_resetted'] = '첨부파일에 대한 썸네일이 재설정되었습니다: %s'; // replace %s with physical Filename
$lang['Attach_sync_finished'] = '첨부파일 동기화가 완료되었습니다.';

// Extensions -> Extension Control
$lang['Manage_extensions'] = '확장자 관리';
$lang['Manage_extensions_explain'] = '파일 확장자들을 관리할 수 있습니다.';
$lang['Explanation'] = '설명';
$lang['Extension_group'] = '확장자 그룹';
$lang['Invalid_extension'] = '유효하지 않은 확장자명';
$lang['Extension_exist'] = '확장자명 %s 는 이미 존재합니다.'; // replace %s with the Extension
$lang['Unable_add_forbidden_extension'] = '확장자명 %s 는 금지되었습니다. 허용된 확장자명에 추가할 수 없습니다.'; // replace %s with Extension

// Extensions -> Extension Groups Management
$lang['Manage_extension_groups'] = '확장자 그룹 관리';
$lang['Manage_extension_groups_explain'] = '여기선 확장자 그룹을 추가, 삭제, 수정할 수 있습니다. 확장자 그룹을 사용 못하게 하거나 특정 카테고리에 지정할 수도 있습니다. 또한, 그룹에 속한 첨부파일 앞에 나타나는 업로드 아이콘을 지정할 수도 있습니다.';
$lang['Special_category'] = '특정 카테고리';
$lang['Category_images'] = 'Images';
$lang['Category_stream_files'] = 'Stream Files';
$lang['Category_swf_files'] = 'Flash Files';
$lang['Allowed'] = '허용';
$lang['Allowed_forums'] = '허용된메뉴';
$lang['Ext_group_permissions'] = '그룹 권한';
$lang['Download_mode'] = '다운로드 모드';
$lang['Upload_icon'] = '업로드 아이콘';
$lang['Max_groups_filesize'] = '최대 파일크기';
$lang['Extension_group_exist'] = '확장자 그룹 %s 가 이미 존재합니다.'; // replace %s with the group name
$lang['Collapse'] = '+';
$lang['Decollapse'] = '-';

// Extensions -> Special Categories
$lang['Manage_categories'] = '특정 카테고리 관리';
$lang['Manage_categories_explain'] = '여기선 특정 카테고리를 설정할 수 있습니다. 특정값을 변경할 수 있고 확장자 그룹에 지정된 특정 카테고리들에 대한 조건들을 변경할 수 있습니다.';
$lang['Settings_cat_images'] = '특정 카테고리 설정: Images';
$lang['Settings_cat_streams'] = '특정 카테고리 설정: Stream Files';
$lang['Settings_cat_flash'] = '특정 카테고리 설정: Flash Files';
$lang['Display_inlined'] = '이미지 보기';
$lang['Display_inlined_explain'] = '게시글 안에 이미지 보여주기(예} / 링크로 이미지 보여주기(아니오)';
$lang['Max_image_size'] = '최대 이미지 사이즈';
$lang['Max_image_size_explain'] = '첨부될 최대 이미지 크기 지정(넓이x높이 픽셀단위). 0x0 이면, 사용 불가입니다. PHP 제한에 의해 몇몇 이미지는 작동하지 않을 수도 있습니다.';
$lang['Image_link_size'] = '이미지 링크 사이즈';
$lang['Image_link_size_explain'] = '링크된 이미지 크기를 지정할 수 있습니다. <br />이 옵션을 사용하지 않으려면 0x0 으로 지정하시면 됩니다.';
$lang['Assigned_group'] = '지정된 그룹';

$lang['Image_create_thumbnail'] = '썸네일 만들기';
$lang['Image_create_thumbnail_explain'] = '항상 썸네일을 만듭니다. 이 옵션은 최대 이미지 사이즈 옵션을 제외한 이 특정 카테고리 관리내에 모든 설정보다 우선시 합니다. 이 옵션은 글내에 썸네일을 보여주고 사용자는 이를 클릭함으로써 원본 이미지 열기를 할 수 있습니다.<br />이 옵션은 Imagick 프로그램이 설치되어 있어야 합니다. 만약, 설치되어 있지 않거나 Safe-Mode가 가능하다면 PHP의 GD-확장가가 사용될 겁니다. 이미지 형식이 PHP에 의해 지원되지 않는다면 이 옵션은 사용할 수 없습니다.';
$lang['Image_min_thumb_filesize'] = '최소 썸네일 파일크기';
$lang['Image_min_thumb_filesize_explain'] = '이미지가 지정된 파일크기보다 작으면, 썸네일은 만들어지지 않습니다.';
$lang['Image_imagick_path'] = 'Imagick 프로그램 (완전한 경로)';
$lang['Image_imagick_path_explain'] = 'Imagick의 변환 경로를 입력하십시요, 보통 /usr/bin/convert (윈도우상에서는 c:/imagemagick/convert.exe).';
$lang['Image_search_imagick'] = 'Imagick 검색';

$lang['Use_gd2'] = 'GD2 Extension을 이용하세요';
$lang['Use_gd2_explain'] = 'PHP는 이미지 처리를 위해 GD1 또는 GD2 Extension으로 컴파일해야합니다. Imagick 없이 명확한 썸네일을 만들기 위해서 첨부파일 시 두가지 방법을 사용합니다. 여기에서 사용자가 선택한 방법에 따라 결과가 달라지며 만약 쎔네일의 상태가 좋지 않으면 이 설정을 다시 바꾸어 주시기 바랍니다.';
$lang['Attachment_version'] = '첨부파일 모드 버젼%s'; // %s is the version number


// Extensions -> Forbidden Extensions
$lang['Manage_forbidden_extensions'] = '금지된 확장자 관리';
$lang['Manage_forbidden_extensions_explain'] = '여기선 금지된 확장자명을 추가하거나 삭제할 수 있습니다. 보안상 확장자 php, php3, php4 는 기본적으로 금지된 확장자들이며 삭제 불가능합니다.';
$lang['Forbidden_extension_exist'] = '금지된 확장자명 %s 는 이미 존재합니다'; // replace %s with the extension
$lang['Extension_exist_forbidden'] = '확장자 %s 이미 허용된 확장자명에 지정되어 있습니다. 이곳에 추가 하기전에 먼저 삭제해 주십시요.';  // replace %s with the extension

// Extensions -> Extension Groups Control -> Group Permissions
$lang['Group_permissions_title'] = '확장자 그룹 권한 -> \'%s\''; // Replace %s with the Groups Name
$lang['Group_permissions_explain'] = '여기서는 여러분이 선택한 메뉴에 선택된 확장자 그룹을 제한할 수 있습니다. 기본값은 사용자가 파일첨부가 가능한 모든 메뉴에 확장자 그룹을 허용하는 것입니다. 아래쪽 메뉴 추가하기에서 원하는 메뉴를 선택하고 추가하기만 하시면 됩니다. 선택된 메뉴가 허용된 메뉴에 나타날 것이고 기본값 모든메뉴는 사라지게 됩니다. 다시 모든메뉴를 선택하고 추가하면 모든메뉴가 보이게 됩니다.';
$lang['Note_admin_empty_group_permissions'] = '주의:<br />아래 보이는 메뉴 항목에서 사용자는 일반적으로 첨부파일 기능을 사용할 수 있으나, 확장자 그룹에 첨부파일 사용이 허락되지 않았다면 어떠한 확장자 그룹도 파일첨부를 허락하지 않습니다. 그냥 실행한다면 에러 메시지를 만나게 될겁니다. Maybe you want to set the Permission \'Post Files\' to ADMIN at these Forums.<br /><br />';
$lang['Add_forums'] = '메뉴 추가하기';
$lang['Add_selected'] = '선택된 항목 추가';
$lang['Perm_all_forums'] = '모든 메뉴';

// Attachments -> Quota Limits
$lang['Manage_quotas'] = '파일용량제한';
$lang['Manage_quotas_explain'] = '용량 제한을 추가/삭제/변경할 수 있습니다. 나중에 용량제한을 사용자나 그룹에 할당할 수 있습니다. 사용자에게 용량제한을 할당하고자 한다면 \'그룹관리->관리\' 로 가서 편집하고자 하는 그룹을 선택하시면 설정변경을  보실수 있습니다. 그룹에 할당코자 한다면, \'그룹->관리\'로 가서 편집하고자 하는 그룹을 선택하시면 설정변경을 보실 수 있습니다. 사용자나 그룹이 특정한 용량제한에 할당되어 있는지 보고자 하면, 용량 설명 좌측의 \'보기\' 를 클릭하시면 됩니다.';
$lang['Assigned_users'] = '할당된 사용자';
$lang['Assigned_groups'] = '할당된 그룹';
$lang['Quota_limit_exist'] = '용량 제한 %s 가 이미 존재합니다.'; // Replace %s with the Quota Description

// Attachments -> Control Panel
$lang['Control_panel_title'] = '파일관리';
$lang['Control_panel_explain'] = ' 사용자나 첨부파일, 보기 등에 근거한 모든 첨부파일을 보거나 관리할 수 있습니다.';
$lang['File_comment_cp'] = '파일 설명';

// Control Panel -> Search
$lang['Search_wildcard_explain'] = '와일드 카드로 * 를 사용하실 수 있습니다.';
$lang['Size_smaller_than'] = '(bytes)보다 Size가 작은 첨부파일';
$lang['Size_greater_than'] = '(bytes)보다 Size가 큰 첨부파일';
$lang['Count_smaller_than'] = '보다 다운로드수가 적은 첨부파일';
$lang['Count_greater_than'] = '보다 다운로드수가 많은 첨부파일';
$lang['More_days_old'] = '이 날보다 오래된 첨부파일 검색';
$lang['No_attach_search_match'] = '검색된 첨부파일이 없습니다.';

// Control Panel -> Statistics
$lang['Number_of_attachments'] = '첨부파일 수';
$lang['Total_filesize'] = '총 파일크기';
$lang['Number_posts_attach'] = '파일 첨부된 게시글 수';
$lang['Number_topics_attach'] = '파일 첨부된 주제 수';
$lang['Number_users_attach'] = '첨부파일 사용자 수';
$lang['Number_pms_attach'] = '쪽지내의 총 첨부파일 수';

// Control Panel -> Attachments
$lang['Statistics_for_user'] = '%s 에 대한 첨부파일 통계'; // replace %s with username
$lang['Size_in_kb'] = '크기 (KB)';
$lang['Downloads'] = '다운로드수';
$lang['Post_time'] = '게시 시간';
$lang['Posted_in_topic'] = '게시글';
$lang['Submit_changes'] = '변경 저장';

// Sort Types
$lang['Sort_Attachments'] = '첨부파일';
$lang['Sort_Size'] = '크기';
$lang['Sort_Filename'] = '파일명';
$lang['Sort_Comment'] = '설명';
$lang['Sort_Extension'] = '확장자';
$lang['Sort_Downloads'] = '다운로드수';
$lang['Sort_Posttime'] = '게시 시간';
$lang['Sort_Posts'] = '게시글';

// View Types
$lang['View_Statistic'] = '통계';
$lang['View_Search'] = '검색';
$lang['View_Username'] = '사용자명';
$lang['View_Attachments'] = '첨부파일';

// Successfully updated
$lang['Attach_config_updated'] = '첨부파일 설정이 성공적으로 변경되었습니다';
$lang['Click_return_attach_config'] = '설정으로 되돌아 가고자 한다면 %s<font color=#0072BC>여기</font>%s 를 클릭하십시요';
$lang['Test_settings_successful'] = '테스트 설정을 마쳤습니다. 이상이 없는것 같습니다.';

// Some basic definitions
$lang['Attachments'] = '첨부파일 관리';
$lang['Attachment'] = '첨부파일';
$lang['Extensions'] = '확장자 관리';
$lang['Extension'] = '확장자명';

// Auth pages
$lang['Auth_attach'] = '파일 업로드';
$lang['Auth_download'] = '파일 다운로드';

?>