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
$lang['Rules_attach_can'] = '���� ÷�θ� �� �� <b>�ֽ��ϴ�</b>';
$lang['Rules_attach_cannot'] = '���� ÷�θ� �� �� <b>�����ϴ�</b>';
$lang['Rules_download_can'] = '���� �ٿ�ε� �� �� <b>�ֽ��ϴ�</b>';
$lang['Rules_download_cannot'] = '���� �ٿ�ε� �� �� <b>�����ϴ�</b>';
$lang['Sorry_auth_view_attach'] = '�˼��մϴ�. �� ÷�������� ���ų� �ٿ�ε��� ������ �����ϴ�.';

// Viewtopic -> Display of Attachments
$lang['Description'] = '����'; // used in Administration Panel too...
$lang['Downloaded'] = '�ٿ�ε��';
$lang['Download'] = '�ٿ�ε�'; // this Language Variable is defined in lang_admin.php too, but we are unable to access it from the main Language File
$lang['Filesize'] = '����ũ��';
$lang['Viewed'] = '����';
$lang['Download_number'] = '%d ��'; // replace %d with count
$lang['Extension_disabled_after_posting'] = 'Ȯ���� \'%s\' �� ����Ʈ �����ڿ� ���ؼ� ����� �����Ǿ����ϴ�. ÷�������� �� �� �����ϴ�.'; // used in Posts and PM's, replace %s with mime type

// Posting/PM -> Initial Display
$lang['Attach_posting_cp'] = '÷������ ������';
$lang['Attach_posting_cp_explain'] = '÷������ �߰��ϱ⸦ Ŭ���ϸ�, �Ʒ��� ÷������ �߰��ϱ� ���ڰ� ��Ÿ���ϴ�.<br />�Խõ� ÷�������� Ŭ���ϸ�, �̹� ÷�ε� ���ϵ��� �� �� ������ ������ �����մϴ�.<br />÷�������� ��ü(÷�ε� ���� �ٲٱ�)�ϰ��� �ϸ�, ���� ��ũ���� Ŭ���ؾ� �մϴ�. ����ó�� ÷�������� �߰��ϰ� ����, \'÷������ �߰�\' �� Ŭ������ ���ʽÿ�. �����ϰ��� �ϴ� ÷������ ��Ͽ��� \'÷�ε� ���� �ٲٱ�\'�� Ŭ���Ͻø� �˴ϴ�.';

// Posting/PM -> Posting Attachments
$lang['Add_attachment'] = '÷������ �߰�';
$lang['Add_attachment_title'] = '÷������ �߰��ϱ�';
$lang['Add_attachment_explain'] = '÷���� ������ ���ٸ�, �Ʒ� �� ĭ�� �״�� ���� �νʽÿ�';
$lang['File_name'] = '���ϸ�';
$lang['File_comment'] = '���� ����';

// Posting/PM -> Posted Attachments
$lang['Posted_attachments'] = '÷�ε� ����';
$lang['Options'] = '�ɼ�';
$lang['Update_comment'] = '���ϼ��� ���ΰ�ħ';
$lang['Delete_attachments'] = '÷�����ϵ� �����ϱ�';
$lang['Delete_attachment'] = '÷������ �����ϱ�';
$lang['Delete_thumbnail'] = '����� �����ϱ�';
$lang['Upload_new_version'] = '÷�ε� ���� �ٲٱ�';

// Errors -> Posting Attachments
$lang['Invalid_filename'] = '%s �� ��ȿ���� ���� ���ϸ��Դϴ�'; // replace %s with given filename
$lang['Attachment_php_size_na'] = '÷�ε� ������ �ʹ� Ů�ϴ�.<br />PHP�� ������ �ִ� ����� ���� ���߽��ϴ�.<br />÷������ ���� php.ini�� ������ �ִ� ���ε� ũ�⸦ ������ �� �����ϴ�.';
$lang['Attachment_php_size_overrun'] = '÷�ε� ������ �ʹ� Ů�ϴ�.<br />�ִ� ���ε� ũ��: %d MB.<br />php.ini �� ������ ũ�⸦ �����Ͻʽÿ�. ��, PHP�� ������ ���̸� ÷������ ���� �� ������ �ʰ��� �������ϴ�.'; // replace %d with ini_get('upload_max_filesize')
$lang['Disallowed_extension'] = 'Ȯ���� %s �� �㰡���� �ʾҽ��ϴ�'; // replace %s with extension (e.g. .php) 
$lang['Disallowed_extension_within_forum'] = '�� �޴������� Ȯ���ڸ� %s �� ���� ������ �㰡���� �ʾҽ��ϴ�'; // replace %s with the Extension
$lang['Attachment_too_big'] = '÷�ε� ������ �ʹ� Ů�ϴ�.<br />�ִ� ũ��: %d %s'; // replace %d with maximum file size, %s with size var
$lang['Attach_quota_reached'] = '�˼��մϴ�, ��� ÷�����Ͽ� ���� ��� ������ �ִ� ����ũ�⿡ �����߽��ϴ�. �ñ����� �����ø� �����ڿ��� �����Ͻñ�ٶ��ϴ�.';
$lang['Too_many_attachments'] = '�� �ۿ� ���� ÷�������� �ִ밳�� %d �� �̹� �Ѿ����ϴ�. ���� ÷�ΰ� �Ұ��մϴ�'; // replace %d with maximum number of attachments
$lang['Error_imagesize'] = '�̹��� ũ�Ⱑ ���� %d �ȼ� * ���� %d �ȼ����� �۾ƾ� �մϴ�'; 
$lang['General_upload_error'] = '���ε� ����:  %s ��ο� ÷�������� ���ε� �� �� �����ϴ�.'; // replace %s with local path

$lang['Error_empty_add_attachbox'] = '\'÷������ �߰�\' ���ڿ� ���� �Է��ؾ� �մϴ�';
$lang['Error_missing_old_entry'] = '���ΰ�ħ�� �� �� �����ϴ�, ������ ÷������ ����� ã�� �� �����ϴ�.';

// Errors -> PM Related
$lang['Attach_quota_sender_pm_reached'] = '�˼��մϴ�, �������� ��� ÷�����ϵ��� ���� �ִ� ����ũ�⿡ �����߽��ϴ�. ���� �����̳� ���� ���ϵ��� �����Ͻʽÿ�.';
$lang['Attach_quota_receiver_pm_reached'] = '�˼��մϴ�, \'%s\' �� �������� �� á���ϴ�. ���濡�� ���� �˸��ų�, ���ʿ��� ���̵��� �����Ҷ� ���� ��ٷ� �ֽʽÿ�.';

// Errors -> Download
$lang['No_attachment_selected'] = '�ٿ�ε��� ÷�������� �������� �����̽��ϴ�.';
$lang['Error_no_attachment'] = '������ ÷�������� �������� �ʽ��ϴ�.';

// Delete Attachments
$lang['Confirm_delete_attachments'] = '������ ÷�������� ���� �����Ͻðڽ��ϱ�?';
$lang['Deleted_attachments'] = '������ ������ �����Ǿ����ϴ�.';
$lang['Error_deleted_attachments'] = '÷�������� ������ �� �����ϴ�.';
$lang['Confirm_delete_pm_attachments'] = '��� ÷�����ϵ��� ������ �����Ͻðڽ��ϱ�?';

// General Error Messages
$lang['Attachment_feature_disabled'] = '�� ÷������ �ɼ��� ��� �Ұ��մϴ�.';

$lang['Directory_does_not_exist'] = '���丮 \'%s\' �� �������� �ʰų� ã�� �� �����ϴ�.'; // replace %s with directory
$lang['Directory_is_not_a_dir'] = '\'%s\' �� ���丮���� Ȯ���Ͻʽÿ�.'; // replace %s with directory
$lang['Directory_not_writeable'] = '���丮 \'%s\' �� ���� �����Ǿ� �ֽ��ϴ�. ���ε��� ��θ� ����� chmod �� 777 �� �����Ͻʽÿ�.'; // replace %s with directory

$lang['Ftp_error_connect'] = 'FTP ������ ������ �� �����ϴ�: \'%s\'. FTP ������ Ȯ���Ͻʽÿ�.';
$lang['Ftp_error_login'] = 'FTP ������ �α��� �� �� �����ϴ�. ID \'%s\' �� ��й�ȣ�� �ùٸ��� �ʽ��ϴ�. FTP ������ Ȯ���Ͻʽÿ�.';
$lang['Ftp_error_path'] = 'FTP ���丮�� ������ �� �����ϴ�: \'%s\'. FTP ������ Ȯ���Ͻʽÿ�.';
$lang['Ftp_error_upload'] = '������ FTP ���丮�� ���ε� �� �� �����ϴ�: \'%s\'. FTP ������ Ȯ���Ͻʽÿ�.';
$lang['Ftp_error_delete'] = '���� ������ �� �� �����ϴ�: \'%s\'. FTP ������ Ȯ���Ͻʽÿ�.<br />�� ������ �� �ٸ� ������ �������� ���� ÷������ �ϼ��� ������ �������� ������ ���� Ȯ���� ���ʽÿ�.';
$lang['Ftp_error_pasv_mode'] = 'FTP Passive ��� ������ �Ұ����մϴ�.';

// Attach Rules Window
$lang['Rules_page'] = '÷������ ��Ģ';
$lang['Attach_rules_title'] = '���� Ȯ���� �׷�� ����ũ��';
$lang['Group_rule_header'] = '%s -> �ִ� ���ε� ����ũ��: %s'; // Replace first %s with Extension Group, second one with the Size STRING
$lang['Allowed_extensions_and_sizes'] = '���� Ȯ���ڸ�� ����ũ��';
$lang['Note_user_empty_group_permissions'] = '����:<br />����� �� �޴������� ���� ÷�α���� ����� �� �ֽ��ϴ�, <br />������ Ȯ���� �׷쿡 ÷�α���� �㰡�Ǿ� ���� �ʱ� ������, <br />����÷�θ� ����� �� �����ϴ�. <br />�����Ѵٸ� ���� �޽����� ������ �ɰ̴ϴ�.<br />';

// Quota Variables
$lang['Upload_quota'] = '���ε� �뷮';
$lang['Pm_quota'] = '���� �뷮';
$lang['User_upload_quota_reached'] = '�˼��մϴ�, �ִ� ���ε� ���ѿ뷮 %d %s �� �����߽��ϴ�.'; // replace %d with Size, %s with Size Lang (MB for example)

// User Attachment Control Panel
$lang['User_acp_title'] = '÷������ ����';//����� ÷������ ������
$lang['UACP'] = '���� ÷���� ���� �����ϱ�';//����� ÷������ ������
$lang['User_uploaded_profile'] = '������� �뷮: %s';
$lang['User_quota_profile'] = '�ѿ뷮: %s';
$lang['Upload_percent_profile'] = '��ü�� %d%%';

// Common Variables
$lang['Bytes'] = 'Bytes';
$lang['KB'] = 'KB';
$lang['MB'] = 'MB';
$lang['Attach_search_query'] = '÷������ �˻�';
$lang['Test_settings'] = '�׽�Ʈ ����';
$lang['Not_assigned'] = '��������';
$lang['No_file_comment_available'] = '���ϼ����� �����ϴ�';
$lang['Attachbox_limit'] = '÷�� �������� %d%% á���ϴ�';
$lang['No_quota_limit'] = '��������';
$lang['Unlimited'] = '������';

?>