<?php
/***************************************************************************
 *                            lang_main_attach.php [Korean]
 *                              -------------------
 *     begin                : Thu Mar 06 2003
 *     copyright            : (C) 2003 Jang Jaeho
 *     email                : kiwidream@empal.com
 *
 *     $Id: lang_main_attach.php,v 2.3.6 2003/03/06 Jaeho Exp $
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
// Attachment Mod Main Language Variables
//

// Auth Related Entries
$lang['Rules_attach_can'] = '파일 첨부를 할 수 <b>있습니다</b>';
$lang['Rules_attach_cannot'] = '파일 첨부를 할 수 <b>없습니다</b>';
$lang['Rules_download_can'] = '파일 다운로드 할 수 <b>있습니다</b>';
$lang['Rules_download_cannot'] = '파일 다운로드 할 수 <b>없습니다</b>';
$lang['Sorry_auth_view_attach'] = '죄송합니다. 이 첨부파일을 보거나 다운로드할 권한이 없습니다.';

// Viewtopic -> Display of Attachments
$lang['Description'] = '설명'; // used in Administration Panel too...
$lang['Downloaded'] = '다운로드수';
$lang['Download'] = '다운로드'; // this Language Variable is defined in lang_admin.php too, but we are unable to access it from the main Language File
$lang['Filesize'] = '파일크기';
$lang['Viewed'] = '보기';
$lang['Download_number'] = '%d 번'; // replace %d with count
$lang['Extension_disabled_after_posting'] = '확장자 \'%s\' 은 사이트 관리자에 의해서 사용이 중지되었습니다. 첨부파일은 볼 수 없습니다.'; // used in Posts and PM's, replace %s with mime type

// Posting/PM -> Initial Display
$lang['Attach_posting_cp'] = '첨부파일 제어판';
$lang['Attach_posting_cp_explain'] = '첨부파일 추가하기를 클릭하면, 아래에 첨부파일 추가하기 상자가 나타납니다.<br />게시된 첨부파일을 클릭하면, 이미 첨부된 파일들을 볼 수 있으며 편집도 가능합니다.<br />첨부파일을 교체(첨부된 파일 바꾸기)하고자 하면, 양쪽 링크들을 클릭해야 합니다. 평상시처럼 첨부파일을 추가하고 나서, \'첨부파일 추가\' 를 클리하지 마십시요. 변경하고자 하는 첨부파일 목록에서 \'첨부된 파일 바꾸기\'를 클릭하시면 됩니다.';

// Posting/PM -> Posting Attachments
$lang['Add_attachment'] = '첨부파일 추가';
$lang['Add_attachment_title'] = '첨부파일 추가하기';
$lang['Add_attachment_explain'] = '첨부할 파일이 없다면, 아래 빈 칸을 그대로 남겨 두십시오';
$lang['File_name'] = '파일명';
$lang['File_comment'] = '파일 설명';

// Posting/PM -> Posted Attachments
$lang['Posted_attachments'] = '첨부된 파일';
$lang['Options'] = '옵션';
$lang['Update_comment'] = '파일설명 새로고침';
$lang['Delete_attachments'] = '첨부파일들 삭제하기';
$lang['Delete_attachment'] = '첨부파일 삭제하기';
$lang['Delete_thumbnail'] = '썸네일 삭제하기';
$lang['Upload_new_version'] = '첨부된 파일 바꾸기';

// Errors -> Posting Attachments
$lang['Invalid_filename'] = '%s 은 유효하지 않은 파일명입니다'; // replace %s with given filename
$lang['Attachment_php_size_na'] = '첨부된 파일이 너무 큽니다.<br />PHP에 지정된 최대 사이즈를 얻지 못했습니다.<br />첨부파일 모드는 php.ini에 지정된 최대 업로드 크기를 결정할 수 없습니다.';
$lang['Attachment_php_size_overrun'] = '첨부된 파일이 너무 큽니다.<br />최대 업로드 크기: %d MB.<br />php.ini 에 지정된 크기를 참고하십시요. 즉, PHP에 설정된 값이며 첨부파일 모드는 이 값보다 초과할 수없습니다.'; // replace %d with ini_get('upload_max_filesize')
$lang['Disallowed_extension'] = '확장자 %s 은 허가되지 않았습니다'; // replace %s with extension (e.g. .php) 
$lang['Disallowed_extension_within_forum'] = '이 메뉴내에서 확장자명 %s 를 가진 파일은 허가되지 않았습니다'; // replace %s with the Extension
$lang['Attachment_too_big'] = '첨부된 파일이 너무 큽니다.<br />최대 크기: %d %s'; // replace %d with maximum file size, %s with size var
$lang['Attach_quota_reached'] = '죄송합니다, 모든 첨부파일에 대해 허용 가능한 최대 파일크기에 도달했습니다. 궁금점이 있으시면 관리자에게 문의하시기바랍니다.';
$lang['Too_many_attachments'] = '이 글에 대한 첨부파일의 최대개수 %d 를 이미 넘었습니다. 파일 첨부가 불가합니다'; // replace %d with maximum number of attachments
$lang['Error_imagesize'] = '이미지 크기가 넓이 %d 픽셀 * 높이 %d 픽셀보다 작아야 합니다'; 
$lang['General_upload_error'] = '업로드 에러:  %s 경로에 첨부파일을 업로드 할 수 없습니다.'; // replace %s with local path

$lang['Error_empty_add_attachbox'] = '\'첨부파일 추가\' 상자에 값을 입력해야 합니다';
$lang['Error_missing_old_entry'] = '새로고침을 할 수 없습니다, 오래된 첨부파일 목록을 찾을 수 없습니다.';

// Errors -> PM Related
$lang['Attach_quota_sender_pm_reached'] = '죄송합니다, 쪽지함의 모든 첨부파일들이 허용된 최대 파일크기에 도달했습니다. 받은 파일이나 보낸 파일들을 삭제하십시요.';
$lang['Attach_quota_receiver_pm_reached'] = '죄송합니다, \'%s\' 의 쪽지함이 꽉 찼습니다. 상대방에게 직접 알리거나, 불필요한 파이들을 삭제할때 까지 기다려 주십시요.';

// Errors -> Download
$lang['No_attachment_selected'] = '다운로드할 첨부파일을 선택하지 않으셨습니다.';
$lang['Error_no_attachment'] = '선택한 첨부파일이 존재하지 않습니다.';

// Delete Attachments
$lang['Confirm_delete_attachments'] = '선택한 첨부파일을 정말 삭제하시겠습니까?';
$lang['Deleted_attachments'] = '선택한 파일이 삭제되었습니다.';
$lang['Error_deleted_attachments'] = '첨부파일을 삭제할 수 없습니다.';
$lang['Confirm_delete_pm_attachments'] = '모든 첨부파일들을 정말로 삭제하시겠습니까?';

// General Error Messages
$lang['Attachment_feature_disabled'] = '이 첨부파일 옵션은 사용 불가합니다.';

$lang['Directory_does_not_exist'] = '디렉토리 \'%s\' 는 존재하지 않거나 찾을 수 없습니다.'; // replace %s with directory
$lang['Directory_is_not_a_dir'] = '\'%s\' 이 디렉토리인지 확인하십시요.'; // replace %s with directory
$lang['Directory_not_writeable'] = '디렉토리 \'%s\' 는 쓰기 금지되어 있습니다. 업로드할 경로를 만들고 chmod 를 777 로 설정하십시요.'; // replace %s with directory

$lang['Ftp_error_connect'] = 'FTP 서버에 접속할 수 없습니다: \'%s\'. FTP 설정을 확인하십시요.';
$lang['Ftp_error_login'] = 'FTP 서버에 로그인 할 수 없습니다. ID \'%s\' 나 비밀번호가 올바르지 않습니다. FTP 설정을 확인하십시요.';
$lang['Ftp_error_path'] = 'FTP 디렉토리에 접근할 수 없습니다: \'%s\'. FTP 설정을 확인하십시요.';
$lang['Ftp_error_upload'] = '파일을 FTP 디렉토리에 업로드 할 수 없습니다: \'%s\'. FTP 설정을 확인하십시요.';
$lang['Ftp_error_delete'] = '파일 삭제를 할 수 없습니다: \'%s\'. FTP 설정을 확인하십시요.<br />이 에러의 또 다른 원인은 존재하지 않은 첨부파일 일수도 있으니 오류파일 관리를 먼저 확인해 보십시요.';
$lang['Ftp_error_pasv_mode'] = 'FTP Passive 모드 변경이 불가능합니다.';

// Attach Rules Window
$lang['Rules_page'] = '첨부파일 규칙';
$lang['Attach_rules_title'] = '허용된 확장자 그룹과 파일크기';
$lang['Group_rule_header'] = '%s -> 최대 업로드 파일크기: %s'; // Replace first %s with Extension Group, second one with the Size STRING
$lang['Allowed_extensions_and_sizes'] = '허용된 확장자명과 파일크기';
$lang['Note_user_empty_group_permissions'] = '주의:<br />당신은 이 메뉴내에서 파일 첨부기능을 사용할 수 있습니다, <br />하지만 확장자 그룹에 첨부기능이 허가되어 있지 않기 때문에, <br />파일첨부를 사용할 수 없습니다. <br />실행한다면 에러 메시지를 만나게 될겁니다.<br />';

// Quota Variables
$lang['Upload_quota'] = '업로드 용량';
$lang['Pm_quota'] = '쪽지 용량';
$lang['User_upload_quota_reached'] = '죄송합니다, 최대 업로드 제한용량 %d %s 에 도달했습니다.'; // replace %d with Size, %s with Size Lang (MB for example)

// User Attachment Control Panel
$lang['User_acp_title'] = '첨부파일 관리';//사용자 첨부파일 제어판
$lang['UACP'] = '내가 첨부한 파일 관리하기';//사용자 첨부파일 제어판
$lang['User_uploaded_profile'] = '사용중인 용량: %s';
$lang['User_quota_profile'] = '총용량: %s';
$lang['Upload_percent_profile'] = '전체의 %d%%';

// Common Variables
$lang['Bytes'] = 'Bytes';
$lang['KB'] = 'KB';
$lang['MB'] = 'MB';
$lang['Attach_search_query'] = '첨부파일 검색';
$lang['Test_settings'] = '테스트 설정';
$lang['Not_assigned'] = '지정안함';
$lang['No_file_comment_available'] = '파일설명이 없습니다';
$lang['Attachbox_limit'] = '첨부 파일함이 %d%% 찼습니다';
$lang['No_quota_limit'] = '지정안함';
$lang['Unlimited'] = '무제한';

?>