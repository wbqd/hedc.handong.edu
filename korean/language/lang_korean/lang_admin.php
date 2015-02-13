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
$lang['General'] = '�Ϲݰ���';
$lang['Users'] = '����� ����';
$lang['Groups'] = '�׷� ����';
$lang['Forums'] = '�޴� ����';
$lang['Styles'] = '��Ÿ�� ����';

$lang['Configuration'] = '����';
$lang['Permissions'] = '�㰡';
$lang['Manage'] = '����';
$lang['Disallow'] = 'ID ��� �Ұ�';
$lang['Prune'] = '����';
$lang['Mass_Email'] = '��ü���Ϻ�����';
$lang['Ranks'] = '���';
$lang['Smilies'] = '������';
$lang['Ban_Management'] = '����� ���� ����';//���� ����
$lang['Word_Censor'] = '�ܾ�˿�';
$lang['Export'] = '��Ų��������';
$lang['Create_new'] = '��Ų�����';
$lang['Add_new'] = '���ø��߰�';
$lang['Backup_DB'] = '�����ͺ��̽� ���';
$lang['Restore_DB'] = '�����ͺ��̽� ����';


//
// Index
//
$lang['Admin'] = '����';
$lang['Not_admin'] = '�� ����Ʈ�� ������ ������ �����ϴ�';
$lang['Welcome_phpBB'] = '�������������� ���� ���� ȯ���մϴ�';
$lang['Admin_intro'] = '�� ȭ���� ������ Ȩ�������� ���� ���ġ�� �����ϰ� �����ݴϴ�. ��ܿ� �ִ� <u>���� �ε���</u>�� Ŭ���ϸ� �� ȭ������ �ٽ� ���� �� �ֽ��ϴ�. ������ Ȩ������ ùȭ������ ���ư����� ���� �����ӿ� �ִ� �ΰ� Ŭ���Ͻʽÿ�. �� ȭ���� ���ʿ� �ִ� �ٸ� ��ũ���� Ȩ�������� ��� ��ɵ��� ������ �� �ֵ��� ���ָ�, �� ȭ�鿡�� �������� ������� �ֽ��ϴ�.';
$lang['Main_index'] = '����Ʈ �ε���';
$lang['Forum_stats'] = '����Ʈ ���';
$lang['Admin_Index'] = '���� �ε���';
$lang['Preview_forum'] = '�޴� �̸�����';

$lang['Click_return_admin_index'] = '���� �ε����� ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';

$lang['Statistic'] = '���';
$lang['Value'] = '��';
$lang['Number_posts'] = '�� �Խù�';
$lang['Posts_per_day'] = '����� �Խù�';
$lang['Number_topics'] = '������ ����';
$lang['Topics_per_day'] = '����� ������';
$lang['Number_users'] = '����ڼ�';
$lang['Users_per_day'] = '����� ������';
$lang['Board_started'] = '����Ʈ ���۵�';
$lang['Avatar_dir_size'] = '�ƹ�Ÿ ���丮 ũ��';
$lang['Database_size'] = '�����ͺ��̽� ũ��';
$lang['Gzip_compression'] ='Gzip ����';
$lang['Not_available'] = '��� �Ұ�';

$lang['ON'] = '��'; // This is for GZip compression
$lang['OFF'] = '��';


//
// DB Utils
//
$lang['Database_Utilities'] = '�����ͺ��̽� ��ƿ��Ƽ';

$lang['Restore'] = '����';
$lang['Backup'] = '���';
$lang['Restore_explain'] = '����� ���Ϸ� ���� ��� WebManager ���̺��� ���� ������ �����մϴ�. ���� ������ �����Ѵٸ�, ����� gzip �ؽ�Ʈ ������ ���ε�ɶ� �ڵ����� ������ Ǯ���ݴϴ�. <b>���</b> ������ �����ʹ� ��� ����ϴ�. ������ �ð��� ���� �ɸ��Ƿ� ���������� �� ȭ���� ������ ���ʽÿ�.';
$lang['Backup_explain'] = '���⼭�� WebManager�� ���õ� ��� �����͸� ����� �� �ֽ��ϴ�. �Բ� �����ϰ��� �ϴ� �߰��� ����� ���� ���̺��� WebManager�� ���� �����ͺ��̽��� �ִٸ� �Ʒ��� �߰� ���̺� �Է� �ڽ��� �̸��� �Է��Ͻʽÿ�(�޸��� ����Ͽ� ���� �̸��� ���� �� �ֽ��ϴ�). ������ �����Ѵٸ�, �ٿ�ε��ϱ� ���� gzip �������� ������ ũ�⸦ �۰� �� �� �ֽ��ϴ�.';

$lang['Backup_options'] = '��� �ɼ�';
$lang['Start_backup'] = '��� ����';
$lang['Full_backup'] = 'Ǯ ���';
$lang['Structure_backup'] = '��Ʈ��ó�� ���';
$lang['Data_backup'] = '�����͸� ���';
$lang['Additional_tables'] = '�߰� ���̺�';
$lang['Gzip_compress'] = 'Gzip���� ���� ����';
$lang['Select_file'] = '���� ����';
$lang['Start_Restore'] = '���� ����';

$lang['Restore_success'] = '�����ͺ��̽��� ���������� �����Ǿ����ϴ�.<br /><br />���� ����Ʈ�� ����� ����� ���� ���� ���°� �Ǿ����ϴ�.';
$lang['Backup_download'] = '�ٿ�ε尡 �� ���۵ǹǷ� ��ٷ� �ֽʽÿ�.';
$lang['Backups_not_supported'] = '�ƽ��Ե� �����ͺ��̽� ����� ������ �����ͺ��̽� �ý��ۿ����� ������ ���� �ʽ��ϴ�.';

$lang['Restore_Error_uploading'] = '��� ���� ���ε��� ������ �ֽ��ϴ�';
$lang['Restore_Error_filename'] = '���� �̸��� ������ �����Ƿ� �ٸ� ������ �õ��� ���ʽÿ�';
$lang['Restore_Error_decompress'] = 'gzip ������ ������ Ǯ ���� �����Ƿ� �ܼ� �ؽ�Ʈ ������ ���ε��Ͻʽÿ�';
$lang['Restore_Error_no_file'] = '���ε�� ������ �����ϴ�';


//
// Auth pages
//
$lang['Select_a_User'] = '����� ����';
$lang['Select_a_Group'] = '�׷� ����';
$lang['Select_a_Forum'] = '�޴� ����';
$lang['Auth_Control_User'] = '����� ���� ����';
$lang['Auth_Control_Group'] = '����ڱ׷����';
$lang['Auth_Control_Forum'] = '�޴� ���� ����';
$lang['Look_up_User'] = '����� ã��';
$lang['Look_up_Group'] = '�׷� ã��';
$lang['Look_up_Forum'] = '�޴� ã��';

$lang['Group_auth_explain'] = '���⿡���� �� ����� �׷쿡 ������ ���Ѱ� ������ ���¸� ������ �� �ֽ��ϴ�. �׷� ������ ������ ����, �� ����� �������� ����ڰ� �޴��� ���� ���� �� ������ ���� ���ʽÿ�. �׷��� ��찡 �߻��ϰԵǸ� ��� ��Ÿ�� ���Դϴ�.';
$lang['User_auth_explain'] = '���⿡���� �� ����ڿ� ������ ���Ѱ� ������ ���¸� ������ �� �ֽ��ϴ�. ����� ������ ������ ����, �� �׷� �������� ����ڰ� �޴��� ���� ���� �� ������ ���� ���ʽÿ�. �׷��� ��찡 �߻��ϰԵǸ� ��� ��Ÿ�� ���Դϴ�.';
$lang['Forum_auth_explain'] = '���⿡���� �� �޴��� ���� ������ ������ �� �ֽ��ϴ�. ���⿡�� �ܼ� ���� ��� ��尡 �ִµ�, ��� ��尡 �� �޴��� ���Ͽ� �� ������ ������ �����մϴ�. �޴��� ���� ������ �����ϸ� �ش� �޴������� ����ڰ� ���ϴ� ���� �۾��� ������ ��ĥ ������ ����Ͻʽÿ�.';

$lang['Simple_mode'] = '�ܼ� ���';
$lang['Advanced_mode'] = '��� ���';
$lang['Moderator_status'] = '������ ����';

$lang['Allowed_Access'] = '���� ����';
$lang['Disallowed_Access'] = '���� �Ұ�';
$lang['Is_Moderator'] = '������ �Դϴ�';
$lang['Not_Moderator'] = '�����ڰ� �ƴմϴ�';

$lang['Conflict_warning'] = '���� ����ġ ���';
$lang['Conflict_access_userauth'] = '�� ����ڴ� ���� �׷� ��������� �� �޴��� ������ �� �ֽ��ϴ�. ������ �������� �׷� ������ �����ϴ��� �� ����� �׷��� �����ϴ� ����� �ֽ��ϴ�. �ش� �׷�(�޴� ����)�� �Ʒ��� �����ϴ�.';
$lang['Conflict_mod_userauth'] = '�� ����ڴ� ���� �׷� ��������� �� �޴��� ������ ������ ���� �ֽ��ϴ�. ������ ������ ���� ���ϰ� �Ϸ��� �׷� ������ �����ϴ��� �� ����� �׷��� �����ϴ� ����� �ֽ��ϴ�. �ش� �׷�(�޴� ����)�� �Ʒ��� �����ϴ�.';

$lang['Conflict_access_groupauth'] = '���� �����(��)�� ���� �׷� ��������� �� �޴��� ������ �� �ֽ��ϴ�. ������ �������� �׷� ������ �����ϴ��� �� ����� �׷��� �����ϴ� ����� �ֽ��ϴ�. �ش� �׷�(�޴� ����)�� �Ʒ��� �����ϴ�.';
$lang['Conflict_mod_groupauth'] = '���� �����(��)�� ���� �׷� ��������� �� �޴��� ������ ������ ���� �ֽ��ϴ�. ������ ������ ���� ���ϰ� �Ϸ��� �׷� ������ �����ϴ��� �� ����� �׷��� �����ϴ� ����� �ֽ��ϴ�. �ش� �׷�(�޴� ����)�� �Ʒ��� �����ϴ�.';

$lang['Public'] = '����';
$lang['Private'] = '�����';
$lang['Registered'] = '���';
$lang['Administrators'] = '���';
$lang['Hidden'] = '����';

// These are displayed in the drop down boxes for advanced
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = '���';
$lang['Forum_REG'] = '�Ϲݻ����';
$lang['Forum_PRIVATE'] = '�����';
$lang['Forum_MOD'] = '�޴����';
$lang['Forum_ADMIN'] = '�ý��۰�����';

$lang['View'] = '����';
$lang['Read'] = '�б�';
$lang['Post'] = '����';
$lang['Reply'] = '�亯';
$lang['Edit'] = '����';
$lang['Delete'] = '����';
$lang['Sticky'] = '�ʵ�����';
$lang['Announce'] = '��������';
$lang['Vote'] = '��ǥ';
$lang['Pollcreate'] = '��ǥ �����';

$lang['Permissions'] = '����';
$lang['Simple_Permission'] = '�ܼ� ����';

$lang['User_Level'] = '����� ����';
$lang['Auth_User'] = '�����';
$lang['Auth_Admin'] = '�ý��۰�����';
$lang['Group_memberships'] = '����� �׷� �����';
$lang['Usergroup_members'] = '�� �׷��� �Ʒ� ����� ���� �ֽ��ϴ�';

$lang['Forum_auth_updated'] = '�޴� ���� �����';
$lang['User_auth_updated'] = '����� ���� �����';
$lang['Group_auth_updated'] = '�׷� ���� �����';

$lang['Auth_updated'] = '������ ����Ǿ����ϴ�';
$lang['Click_return_userauth'] = '����� �������� ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';
$lang['Click_return_groupauth'] = '�׷� �������� ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';
$lang['Click_return_forumauth'] = '�޴� �������� ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';


//
// Banning
//
$lang['Ban_control'] = '����� ���� ����';
$lang['Ban_explain'] = '���⿡���� ������� ������ ���� �� �ֽ��ϴ�. Ư�� ����ڳ� ���� ������ IP �ּ� Ȥ�� ȣ��Ʈ �̸��� ������ų�� �ֽ��ϴ�. �̷ν� ����ڰ� ����Ʈ�� �ε��� �������� �����ϴ°� ���� ������ �ֽ��ϴ�. ID�� �ٲ㼭 ����ϴ� ���� �������� ���� E-mail �ּҸ� �����մϴ�. ���� E-mail �ּҷ� ������Ű�� ����ڰ� �α��� �ϰų� ���� �ø��°��� ���� ���� �����Ƿ�, ���� ����� ���� ����ؾ� �մϴ�.';
$lang['Ban_explain_warn'] = '���� ������ IP �ּҸ� �Է��ϸ� �� �������� ��� �ּҵ��� ���� ����Ʈ�� �ö��� �����Ͻʽÿ�. �ʿ��� ��쿡�� ���ϵ�ī�� ���ڸ� ����� ���� �ֽ��ϴ�. �ּ� ������ �Է��ؾ߸� �Ѵٸ� ������ �ּҷ� �ϴ��� Ư�� �ּҸ� �����Ͻñ� �ٶ��ϴ�.';

$lang['Select_username'] = 'ID ����';
$lang['Select_ip'] = 'IP ����';
$lang['Select_email'] = 'E-mail �ּ� ����';

$lang['Ban_username'] = 'ID�� ���Ͽ� ����� ����';
$lang['Ban_username_explain'] = '������ Ű����� ���콺 �������� �ѹ��� �������� ����ڸ� ������ų �� �ֽ��ϴ�';

$lang['Ban_IP'] = 'IP �ּ�(�Ǵ� ȣ��Ʈ��) ����';
$lang['IP_hostname'] = 'IP �ּҵ� �̳� ȣ��Ʈ �̸���';
$lang['Ban_IP_explain'] = '���� IP�� ȣ��Ʈ �̸��� �����Ϸ��� �޸��� ����Ͻʽÿ�. IP �ּ� ������ �����Ϸ��� ������(-)�� ����Ͻʽÿ�. ���ϵ�ī�� ���ڴ� * �� ����Ͻʽÿ�';

$lang['Ban_email'] = 'E-mail �ּ� ����';
$lang['Ban_email_explain'] = '���� E-mail �ּҸ� �����Ϸ��� �޸��� ����Ͻʽÿ�. ���ϵ�ī�� ���ڴ� * �� ����Ͻʽÿ�. ������ *@hotmail.com';
$lang['Unban_username'] = 'ID�� ���Ͽ� ����� ���� ����';
$lang['Unban_username_explain'] = '������ Ű����� ���콺 �������� �ѹ��� �������� ����ڿ� ���� ������ ������ �� �ֽ��ϴ�';

$lang['Unban_IP'] = 'IP �ּ�(�Ǵ� ȣ��Ʈ��) ���� ����';
$lang['Unban_IP_explain'] = '������ Ű����� ���콺 �������� �ѹ��� ���� IP �ּҿ� ���� ������ ������ �� �ֽ��ϴ�';

$lang['Unban_email'] = 'E-mail �ּ� ���� ����';
$lang['Unban_email_explain'] = '������ Ű����� ���콺 �������� �ѹ��� ���� E-mail �ּҿ� ���� ������ ������ �� �ֽ��ϴ�';

$lang['No_banned_users'] = '������ ����� ����';
$lang['No_banned_ip'] = '������ IP �ּ� ����';
$lang['No_banned_email'] = '������ E-mail �ּ� ����';

$lang['Ban_update_sucessful'] = '��������Ʈ�� ���������� ������Ʈ�Ǿ����ϴ�';
$lang['Click_return_banadmin'] = '���� ���� ������ ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';


//
// Configuration
//
$lang['General_Config'] = '��ü����';
$lang['Config_explain'] = '���� ������� ����Ʈ�� �Ϲ����� �ɼ��� ������ �� �ֽ��ϴ�. ����� �� ����Ʈ ������ ������ ���� ��ũ�� �̿��Ͻʽÿ�.';

$lang['Click_return_config'] = '�Ϲ� �������� ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';

$lang['General_settings'] = '�Ϲ� ����Ʈ ����';
$lang['Server_name'] = '������ �̸�';
$lang['Server_name_explain'] = '�� ����Ʈ�� ����Ǵ� ������ �̸�';
$lang['Script_path'] = '��ũ��Ʈ ���';
$lang['Script_path_explain'] = 'WebManager�� ��ġ�� ������ �̸��� ���� ����� ���';
$lang['Server_port'] = '���� ��Ʈ';
$lang['Server_port_explain'] = '������ �����ϰ� �ִ� ��Ʈ, �Ϲ������� 80, �ٸ� ��쿡�� �����Ͻʽÿ�';
$lang['Site_name'] = '����Ʈ �̸�';
$lang['Site_desc'] = '����Ʈ �Ұ�';
$lang['Board_disable'] = '����Ʈ ��� ����';
$lang['Board_disable_explain'] = '�� ����� ����ڵ��� ����Ʈ�� ������� ���ϵ��� �մϴ�. ����Ʈ ����� ������ ��� �����ڴ� ������ �����ǿ� �� �� �ֽ��ϴ�.!';
$lang['Acct_activation'] = '���� Ȱ��ȭ ���';
$lang['Acct_activation_explain'] = '"����" : ������ ���� ��� ����</br>"�����" : ��� �� E-mail  ������ �޴� ������ ���ľ� ������ Ȱ��ȭ</br>"������" : ��� �� �����ڰ� ���������������� ���������� ������ Ȱ��ȭ';
$lang['Acc_None'] = '����'; // These three entries are the type of activation
$lang['Acc_User'] = '�����';
$lang['Acc_Admin'] = '������';

$lang['Abilities_settings'] = '����� �� ����Ʈ �⺻ ����';
$lang['Max_poll_options'] = '��ǥ �ɼ��� �ִ� ����';
$lang['Flood_Interval'] = '�⵵ ����';
$lang['Flood_Interval_explain'] = '�÷����� �� ���̿� ����ڰ� ��ٷ��� �� �ð�(��)';
$lang['Board_email_form'] = '����Ʈ�� ���� ����� E-mail';
$lang['Board_email_form_explain'] = '����ڵ��� ���� ���� ���α׷��� �ƴ� ����Ʈ�� ���� ���� E-mail�� �����ϴ�';
$lang['Topics_per_page'] = '�������� �� ��';
$lang['Posts_per_page'] = '�������� �亯��';
$lang['Hot_threshold'] = '�α��ִ� ������ �Ǵ� ���� �亯�� (Hot)';
$lang['Default_style'] = '�⺻ ��Ÿ��';
$lang['Override_style'] = '����� ��Ÿ�� �����ϱ�';
$lang['Override_style_explain'] = '�⺻������ ����� ��Ÿ�� ��ü�ϱ�';
$lang['Default_language'] = '�⺻ ���';
$lang['Date_format'] = '��¥ ����';
$lang['System_timezone'] = '�ý��� �ð���';
$lang['Enable_gzip'] = 'GZip ���� ��� ����';
$lang['Enable_prune'] = '�޴� ���� ��� ����';
$lang['Allow_HTML'] = 'HTML ���';
$lang['Allow_BBCode'] = 'BBCode ���';
$lang['Allowed_tags'] = '��� ������ HTML �±�';
$lang['Allowed_tags_explain'] = '�޸��� �±׸� �����Ͻʽÿ�';
$lang['Allow_smilies'] = '������ ���';
$lang['Smilies_path'] = '������ �ִ°� ���';
$lang['Smilies_path_explain'] = 'WebManager ��Ʈ ����� ���� ���, ��, images/smiles';
$lang['Allow_sig'] = '���� ���';
$lang['Max_sig_length'] = '�ִ� ���� ����';
$lang['Max_sig_length_explain'] = '������ �ִ� ���� ��';
$lang['Allow_name_change'] = 'ID ���� �㰡';

$lang['Avatar_settings'] = '�ƹ�Ÿ ����';
$lang['Allow_local'] = '�ƹ�Ÿ ������ ��� ����';
$lang['Allow_remote'] = '���� �ƹ�Ÿ ��� ����';
$lang['Allow_remote_explain'] = '�ٸ� ������Ʈ�� ��ũ�� �ƹ�Ÿ';
$lang['Allow_upload'] = '�ƹ�Ÿ ���ε� ��� ����';
$lang['Max_filesize'] = '�ִ� �ƹ�Ÿ ���� ũ��';
$lang['Max_filesize_explain'] = '���ε�� �ƹ�Ÿ ���� ��';
$lang['Max_avatar_size'] = '�ִ� �ƹ�Ÿ ����';
$lang['Max_avatar_size_explain'] = '(���� x �� �ȼ�)';
$lang['Avatar_storage_path'] = '�ƹ�Ÿ �ִ°� ���';
$lang['Avatar_storage_path_explain'] = 'WebManager ��Ʈ ����� ���� ���, ��, images/avatars';
$lang['Avatar_gallery_path'] = '�ƹ�Ÿ ������ ���';
$lang['Avatar_gallery_path_explain'] = '�̹� �ε�� �̹����� WebManager ��Ʈ ����� ���� ���, ��, images/avatars/gallery';

$lang['COPPA_settings'] = 'COPPA ����';
$lang['COPPA_fax'] = 'COPPA �ѽ� ��ȣ';
$lang['COPPA_mail'] = 'COPPA �ּ�';
$lang['COPPA_mail_explain'] = '�̰��� �θ���� COPPA ��� ����� ���� �ּ��Դϴ�';

$lang['Email_settings'] = 'E-mail ����';
$lang['Admin_email'] = '������ E-mail �ּ�';
$lang['Email_sig'] = 'E-mail ����';
$lang['Email_sig_explain'] = '����Ʈ���� ������ ��� E-mail�� �� �ؽ�Ʈ�� ÷�ε˴ϴ�';
$lang['Use_SMTP'] = 'E-mail�� SMTP ���� ����ϱ�';
$lang['Use_SMTP_explain'] = '���� ���� ��� ��ſ� ������ ������ ����Ͽ� E-mail�� �������� �� �Ͻʽÿ�.';
$lang['SMTP_server'] = 'SMTP ���� �ּ�';
$lang['SMTP_username'] = 'SMTP ����� �̸�';
$lang['SMTP_username_explain'] = 'SMTP ������ �䱸�ϴ� ��쿡��, ����� �̸��� �Է��Ͻʽÿ�';
$lang['SMTP_password'] = 'SMTP �н�����';
$lang['SMTP_password_explain'] = 'SMTP ������ �䱸�ϴ� ��쿡��, �н����带 �Է��Ͻʽÿ�';

$lang['Disable_privmsg'] = '����';
$lang['Inbox_limits'] = '���������Գ��� �ִ� �ۼ�';
$lang['Sentbox_limits'] = '���������Գ��� �ִ� �ۼ�';
$lang['Savebox_limits'] = '���������Գ��� �ִ� �ۼ�';

$lang['Cookie_settings'] = '��Ű ����';
$lang['Cookie_settings_explain'] = '������ �ڼ��� ������� ��Ű�� ��� ����� �������� �������� ���� �����մϴ�. ��κ��� ��쿡 �־ ����Ʈ�� ��� ����ġ���� ����������, ���� ������ �ϰ��� �Ѵٸ� ���Ǹ� ���ϸ� �߸��� ������ ����ڷ� �Ͽ��� �α������� ���ϰ� �� �� �ֽ��ϴ�';
$lang['Cookie_domain'] = '��Ű ������';
$lang['Cookie_name'] = '��Ű �̸�';
$lang['Cookie_path'] = '��Ű ���';
$lang['Cookie_secure'] = '��Ű ����';
$lang['Cookie_secure_explain'] = '������ SSL�� ���Ͽ� �����ϸ� �̰��� ��밡������, �ƴ� ��쿡�� ���Ұ������� �����Ͻʽÿ�';
$lang['Session_length'] = '���� ���� [ �� ]';


// Visual Confirmation
$lang['Visual_confirm'] = '��� Ȯ��';
$lang['Visual_confirm_explain'] = '�׸��� ���ڸ� �Է��ϸ� �ڵ�ȭ�� ���α׷��� �ƴ� ����� ��� ����� ���� �ۼ������� Ȯ���� �� �ֽ��ϴ�.';

//
// Forum Management
//
$lang['Forum_admin'] = '�޴� ����';
$lang['Forum_admin_explain'] = '���⿡���� ī�װ��� �޴��� �߰�, ����, ����, ���� ������ �� ��-����ȭ�� �� �� �ֽ��ϴ�<br/>�޴� ������ <u>���ο��� �ñ�� ���� ��</u>�� [����� ���]���� [����]�̶� �޴���,<br/><u>�׷쿡�� �ñ�� ���� ��</u>�� [�׷����]�� [����]�̶� �޴��� �̵��ϼż� ������ �����մϴ�.<br/>�޴��� ������ �� �ִ� ������ �ش� �޴��� [����]�� Ŭ���Ͻø� ���氡���մϴ�.<br/>';
$lang['Edit_forum'] = '�޴�����';
$lang['Create_forum'] = '�޴� ���� �����';
$lang['Create_category'] = 'ī�װ� ���� �����';
$lang['Remove'] = '����';
$lang['Action'] = '�ǽ�';
$lang['Update_order'] = '���� ������Ʈ';
$lang['Config_updated'] = '������ ���������� ������Ʈ�Ǿ����ϴ�';
$lang['Edit'] = '����';
$lang['Delete'] = '����';
$lang['Move_up'] = '���� �̵�';
$lang['Move_down'] = '�Ʒ��� �̵�';
$lang['Resync'] = '��-����ȭ';
$lang['No_mode'] = '������ ��尡 �����ϴ�';
$lang['Forum_edit_delete_explain'] = '�Ʒ� ������� ��� �Ϲ� �޴� �ɼ��� ������ �� �ֽ��ϴ�. ����� �� �޴� ������ ������ ���� ��ũ�� ����Ͻʽÿ�.';

$lang['Move_contents'] = '��� ���� �̵�';
$lang['Forum_delete'] = '�޴� ����';
$lang['Forum_delete_explain'] = '�Ʒ� ������� �޴�(Ȥ�� ī�װ�)�� ������ �� ������ �� �ȿ� �ִ� ��� ����(Ȥ�� �޴�)�� ���� �ű� �������� ������ �� �ֽ��ϴ�';

$lang['Status_locked'] = '���';
$lang['Status_unlocked'] = '����';
$lang['Forum_settings'] = '�޴� �Ӽ�';
$lang['Forum_name'] = '�޴� �̸�';
$lang['Forum_desc'] = '����';
$lang['Forum_status'] = '��� ����';
$lang['Forum_pruning'] = '�ڵ� ����';

$lang['prune_freq'] = '������ ��ȿ�� �Ź� Ȯ��';
$lang['prune_days'] = '�ƹ��� �۵� �ö���� ���� ������ ����';
$lang['Set_prune_data'] = '�� �޴��� ���ؼ� �ڵ� ������ �����Ͽ����� ���� �ֱ⸦ �������� �ʾҽ��ϴ�. �ǵ��ư��� �����Ͻʽÿ�';

$lang['Move_and_Delete'] = '�̵� �� ����';

$lang['Delete_all_posts'] = '��� �� ����';
$lang['Nowhere_to_move'] = '�̵��� ���� ����';

$lang['Edit_Category'] = 'ī�װ� ����';
$lang['Edit_Category_explain'] = '�� ������� ī�װ� �̸��� �����Ͻʽÿ�';

$lang['Forums_updated'] = '�޴��� ī�װ� ������ ���������� ������Ʈ�Ǿ����ϴ�';

$lang['Must_delete_forums'] = '�� ī�װ��� ����� ���� ��� �޴��� ���� �����ؾ��մϴ�';

$lang['Click_return_forumadmin'] = '�޴� ������ ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';


//
// Smiley Management
//
$lang['smiley_title'] = '������ ���� ��ƿ��Ƽ';
$lang['smile_desc'] = '���⿡���� ����ڰ� ���� �ø��ų� ������ ������ ����� ���� ǥ�� �׸��̳� �������� �߰�, ���� Ȥ�� ������ �� �ֽ��ϴ�.';

$lang['smiley_config'] = '������ ����';
$lang['smiley_code'] = '������ �ڵ�';
$lang['smiley_url'] = '������ �׸� ����';
$lang['smiley_emot'] = '������ ���� ǥ��';
$lang['smile_add'] = '���ο� ������ �߰�';
$lang['Smile'] = '������';
$lang['Emotion'] = '���� ǥ��';

$lang['Select_pak'] = '�� (.pak) ������ �����Ͻʽÿ�';
$lang['replace_existing'] = '���� ������ ��ü';
$lang['keep_existing'] = '���� ������ ����';
$lang['smiley_import_inst'] = '��ġ�� �Ϸ��� ������ ��Ű���� ������ Ǯ�� ��� ���ϵ��� ������ ������ ���丮�� ���ε��ؾ� �մϴ�.  �׷� ����, �� ��Ŀ��� �ùٸ� ������ �����Ͽ� ������ ���� ���� �ɴϴ�.';
$lang['smiley_import'] = '������ �� ��������';
$lang['choose_smile_pak'] = '������ ��(.pak) ������ �����Ͻʽÿ�';
$lang['import'] = '������ ��������';
$lang['smile_conflicts'] = '�浹�� ��� �ؾ��� ��';
$lang['del_existing_smileys'] = '�������� ���� ������ �������� �����Ͻʽÿ�';
$lang['import_smile_pack'] = '������ ���� ��������';
$lang['export_smile_pack'] = '������ �� �����';
$lang['export_smiles'] = '���� ��ġ�� �����Ϸκ��� �������� ������� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͽ� ������ �� ������ �ٿ�ε� �Ͻʽÿ�. �ݵ�� .pak Ȯ���ڸ� ����ϰ� ������ ���ϸ��� �����Ͻʽÿ�. �׷� ���� ��� ������ �̹����� .pak ���� ������ �����Ͽ� zip������ ����ʽÿ�.';

$lang['smiley_add_success'] = '�������� ���������� �߰��Ǿ����ϴ�';
$lang['smiley_edit_success'] = '�������� ���������� ������Ʈ�Ǿ����ϴ�';
$lang['smiley_import_success'] = '���������� ���������� �����Խ��ϴ�!';
$lang['smiley_del_success'] = '�������� ���������� ���������ϴ�';
$lang['Click_return_smileadmin'] = '������ ������ ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';


//
// User Management
//
$lang['User_admin'] = '����� ����';
$lang['User_admin_explain'] = '���⿡���� ������� ������ Ư�� �ɼǵ��� ������ �� �ֽ��ϴ�. ����� ������ �����Ϸ��� ����� �� �׷� ���� �ý����� �̿��Ͻʽÿ�.';

$lang['Look_up_user'] = '����� ã��';

$lang['Admin_user_fail'] = '����� ���������� ������Ʈ�� �� �����ϴ�.';
$lang['Admin_user_updated'] = '������� ���������� ���������� ������Ʈ�Ǿ����ϴ�.';
$lang['Click_return_useradmin'] = '����� ������ ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';

$lang['User_delete'] = '�� ����ڸ� �����մϴ�';
$lang['User_delete_explain'] = '���⸦ Ŭ���Ͽ� �� ����ڸ� �����մϴ�, �� ������ �ǵ����� �� �����ϴ�.';
$lang['User_deleted'] = '����ڰ� ���������� �����Ǿ����ϴ�.';

$lang['User_status'] = '����ڴ� Ȱ�����Դϴ�';
$lang['User_allowpm'] = '������ ������ �ֽ��ϴ�';
$lang['User_allowavatar'] = '�ƹ�Ÿ�� ǥ���� �� �ֽ��ϴ�';

$lang['Admin_avatar_explain'] = '���⿡���� ������� ���� �ƹ�Ÿ�� ���ų� ������ �� �ֽ��ϴ�.';

$lang['User_special'] = 'Ư�� ��� ���� �ʵ�';
$lang['User_special_explain'] = '�� �ʵ�� ����ڰ� ������ �� �����ϴ�. �ý��� �����ڸ��� �� �ɼǵ��� ������ �� �ֽ��ϴ�';


//
// Group Management
//
$lang['Group_administration'] = '����ڱ׷����';
$lang['Group_admin_explain'] = '����� ��� �׷��� �����ϴ� ������, ���� �׷��� ����, ����� �� ������ �� �� �ֽ��ϴ�. �����ڸ� ������ �� ������, �׷� ���¸� ����/�������� ��ȯ�� �� �ְ� �׷� �̸��� ������ ������ �� �ֽ��ϴ�';
$lang['Error_updating_groups'] = '�׷��� ������Ʈ�ϴµ� ������ �߻��߽��ϴ�';
$lang['Updated_group'] = '�׷��� ���������� ������Ʈ�Ǿ����ϴ�';
$lang['Added_new_group'] = '���ο� �׷��� ���������� ����� �����ϴ�';
$lang['Deleted_group'] = '�׷��� ���������� �����Ǿ����ϴ�';
$lang['New_group'] = '���ο� �׷� �����';
$lang['Edit_group'] = '�׷� �����ϱ�';
$lang['group_name'] = '�׷� �̸�';
$lang['group_description'] = '�׷� ����';
$lang['group_moderator'] = '�׷� ������';
$lang['group_status'] = '�׷� ����';
$lang['group_open'] = '�׷� ����';
$lang['group_closed'] = '�׷� �ݱ�';
$lang['group_hidden'] = '��� �׷�';
$lang['group_delete'] = '�׷� ����';
$lang['group_delete_check'] = '�� �׷��� �����մϴ�';
$lang['submit_group_changes'] = '���� ����';
$lang['reset_group_changes'] = '���� ���';
$lang['No_group_name'] = '�� �׷쿡 ���� �̸��� �����ؾ� �մϴ�';
$lang['No_group_moderator'] = '�� �׷쿡 ���� �����ڸ� �����ؾ� �մϴ�';
$lang['No_group_mode'] = '�� �׷쿡 ���� ��带 ���� Ȥ�� �������� �����ؾ� �մϴ�.';
$lang['No_group_action'] = '�ƹ��� ���۵� �������� �ʾҽ��ϴ�';
$lang['delete_group_moderator'] = '�� �׷� �����ڸ� �����ϰڽ��ϱ�?';
$lang['delete_moderator_explain'] = '�׷� �����ڸ� �ٲٷ���, �� �ڽ��� üũ�Ͽ� �� �����ڸ� �׷쿡�� �����Ͻʽÿ�. �׷��� ������ üũ���� ���ʽÿ�. �� ����ڴ� �׷��� �Ϲ� ȸ���� �˴ϴ�.';
$lang['Click_return_groupsadmin'] = '�׷� ������ ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';
$lang['Select_group'] = '�׷� �����ϱ�';
$lang['Look_up_group'] = '�׷� ã��';


//
// Prune Administration
//
$lang['Forum_Prune'] = '�޴� ����';
$lang['Forum_Prune_explain'] = '�̰��� ������ ��¥���� ������Ʈ�� �Խù��� ������ ������ �����մϴ�. ��ȣ�� �Է����� ������ ��� �������� �����˴ϴ�. ��ǥ�� �������� ������ �������� ������, �������� ���� ������ �ʽ��ϴ�. �̷��� �������� �������� ������ �մϴ�.';
$lang['Do_Prune'] = '�����ϱ�';
$lang['All_Forums'] = '��� �޴�';
$lang['Prune_topics_not_posted'] = '�� �Ⱓ ���� �亯�� ������ ���� �����ϱ�';
$lang['Topics_pruned'] = '������ ������';
$lang['Posts_pruned'] = '������ �۵�';
$lang['Prune_success'] = '�޴� ���� �۾��� ���������� ����Ǿ����ϴ�';


//
// Word censor
//
$lang['Words_title'] = '�ܾ� �˿�';
$lang['Words_explain'] = '���⿡���� ����Ʈ���� �ڵ����� �˿��� �ܾ���� �߰�, ���� �� ������ �� �ֽ��ϴ�. ���� ID�� �ش� �ܾ���� ����� �� �����ϴ�. ���ϵ幮��(*)�� �ϳ��� ���ڷ� ��޵˴ϴ�.';
$lang['Word'] = '�ܾ�';
$lang['Edit_word_censor'] = '�˿� �ܾ� ����';
$lang['Replacement'] = '��ü';
$lang['Add_new_word'] = '���ο� �ܾ� �߰�';
$lang['Update_word'] = '�˿� �ܾ� ������Ʈ';

$lang['Must_enter_word'] = '�ܾ�� ��ġ�� �ܾ �Է��ؾ� �մϴ�';
$lang['No_word_selected'] = '������ �ܾ ���õ��� �ʾҽ��ϴ�';

$lang['Word_updated'] = '���õ� �˿� �ܾ ���������� ������Ʈ�Ǿ����ϴ�';
$lang['Word_added'] = '�˿� �ܾ ���������� �߰��Ǿ����ϴ�';
$lang['Word_removed'] = '���õ� �˿� �ܾ ���������� �����Ǿ����ϴ�';

$lang['Click_return_wordadmin'] = '�˿� �ܾ� ������ ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';


//
// Mass Email
//
$lang['Mass_email_explain'] = '���⿡���� ��� ����ڳ� Ư�� �׷쳻�� ��� ����ڵ鿡�� E-mail�� ������ �ֽ��ϴ�. �� ��, ������ ���� �ּҷ� ������ ��������, ��� �����ڵ鿡�� blind carbon copy�� �������ϴ�. ���� ���� ����鿡�� ������ ������ �߼� �� ���� �����Ǵ��� �������� �̵����� ���ʽÿ�. ��ü ���� ���޿� �ð��� ���� �ɸ��� ���� �����̸�, �۾��� �Ϸ�Ǹ� �޽����� ��ϴ�';
$lang['Compose'] = '�ۼ�';

$lang['Recipients'] = '������';
$lang['All_users'] = '��� �����';

$lang['Email_successfull'] = '�޽����� ���������ϴ�';
$lang['Click_return_massemail'] = '��ü ���� ������� ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';


//
// Ranks admin
//
$lang['Ranks_title'] = 'ȸ����ް���';
$lang['Ranks_explain'] = '�� ������� ����� �߰�, ����, ���� �� ������ �� �ֽ��ϴ�. ����� ���� ����� ����Ͽ� ����ڿ��� ����� Ư�� ��޵� ����� �ֽ��ϴ�. �Ʒ����� �����ڰ� ������ �ּ� �� ���� ��� ������ ������ �Ǹ� ����Ʈ�� �ø� ������� �� ���� �Ʒ��� ���ؿ� ���Ͽ� ������� ����� �ڵ����� �����˴ϴ�. <br/>�ý��� �����ڳ� ����Ʈ ��ڰ��� �Խù����� ������� Ư���� ����ڴ� Ư�� ����� "��"�� �����Ͻʽÿ�.<br/><b>����)</b><br/>�ѰԽù����� 50�� �̻� : �ؿ��ȸ��<br/>�ѰԽù����� 100�� �̻� : ���ȸ�� ';

$lang['Add_new_rank'] = '���ο� ��� �߰�';

$lang['Rank_title'] = '���<br/>';
$lang['Rank_special'] = 'Ư�� ������� ����';
$lang['Rank_minimum'] = '�ּ� �� �� ';
$lang['Rank_maximum'] = '�ִ� �� ��';
$lang['Rank_image'] = '��� �̹���';
$lang['Rank_image_explain'] = '�̰��� ��޿� ������ ���� �̹����� �����մϴ�';
$lang['Rank_image_explain2'] = '(WebManager ��Ʈ�� ���� ����� ���)';

$lang['Must_select_rank'] = '����� �����ؾ� �մϴ�';
$lang['No_assigned_rank'] = 'Ư�� ����� �������� �ʾҽ��ϴ�';

$lang['Rank_updated'] = '����� ���������� ������Ʈ�Ǿ����ϴ�';
$lang['Rank_added'] = '����� ���������� �߰��Ǿ����ϴ�';
$lang['Rank_removed'] = '����� ���������� �����Ǿ����ϴ�';
$lang['No_update_ranks'] = '����� ���������� �����Ǿ����ϴٸ�, �� ����� ����ϴ� ����� ������ ������Ʈ���� �ʾҽ��ϴ�. �� �����鿡 ���� ����� �������� �ʱ�ȭ �ؾ� �մϴ�';

$lang['Click_return_rankadmin'] = '��� ������ ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';


//
// Disallow Username Admin
//
$lang['Disallow_control'] = '���Ұ� ID ����';
$lang['Disallow_explain'] = '���⿡���� ���Ұ��� ID�� �̸� ����� ���� �� �ֽ��ϴ�. ��� �Ұ��� ID �����ÿ� ���ϵ� ���ڸ� �̿��� �� �ֽ��ϴ�.  �̹� ��ϵ� ID�� ������ �� �����Ƿ�, �� ID�� ���� ���� ��, ��� �Ұ��� ID�� ����Ͻñ� �ٶ��ϴ�.';

$lang['Delete_disallow'] = '����';
$lang['Delete_disallow_title'] = '��� �Ұ� ID ���� �ϱ�';
$lang['Delete_disallow_explain'] = '���� ����Ʈ���� ID�� �����ϰ� ������ư�� Ŭ�������ν� ��� �Ұ� ID�� ������ �� �ֽ��ϴ�';

$lang['Add_disallow'] = '�߰�';
$lang['Add_disallow_title'] = '��� �Ұ� ID �߰�';
$lang['Add_disallow_explain'] = '���ϵ� ���ڸ� ����Ͽ� ��� �Ұ��� ID�� ������ �� �ֽ��ϴ�';

$lang['No_disallowed'] = '��� �Ұ��� ID ����';

$lang['Disallowed_deleted'] = '����� �Ұ��� ID�� ��Ͽ��� �����Ǿ����ϴ�';
$lang['Disallow_successful'] = '����� �Ұ��� ID�� ��Ͽ��� �߰��Ǿ����ϴ�';
$lang['Disallowed_already'] = '�Է��� ID�� �̹� ��� �Ұ� ����̳� �˿� �ܾ� ����Ʈ�� ���ԵǾ� �ֽ��ϴ�';

$lang['Click_return_disallowadmin'] = '��� �Ұ� ID ������ ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';


//
// Styles Admin
//
$lang['Styles_admin'] = '��Ų ����';
$lang['Styles_explain'] = '���⿡���� ����ڰ� ����� �� �ִ� ��Ÿ��(���ø� �� ��Ų)�� �߰�, ���� �� ������ �� �ֽ��ϴ�';
$lang['Styles_addnew_explain'] = '���� ����Ʈ�� ���� ���ϰ� ���� �ִ� ���ø��� ����� �� �ִ� ��Ų���Դϴ�. �� ����Ʈ ���� �����۵��� ���� WebManager �����ͺ��̽��� ��ġ���� �ʾҽ��ϴ�. �� ��Ų���� ����Ͻ÷��� ��Ų�� ��ġ�ϼž� �մϴ�. ��Ų�� ��ġ�Ϸ��� ��ġ ��ũ�� Ŭ���Ͻʽÿ�';

$lang['Select_template'] = '���ø� ����';

$lang['Style'] = '��Ų';
$lang['Template'] = '���ø�';
$lang['Install'] = '��ġ';
$lang['Download'] = '�ٿ�ε�';

$lang['Edit_theme'] = '��Ų ����';
$lang['Edit_theme_explain'] = '���õ� ��Ų�� ���� ������ �Ʒ� ��Ŀ��� ������ �� �ֽ��ϴ�';

$lang['Create_theme'] = '��Ų �����';
$lang['Create_theme_explain'] = '�Ʒ��� ����� ����Ͽ� ���õ� ���ø��� ���� ���ο� ��Ų�� ���� �� �ֽ��ϴ�. ���� �Է½�(16���� ����Ͽ�), # �� ������� ���ʽÿ�, ��, CCCCCC �� �ùٸ� ǥ���̰�, #CCCCCC �� �߸��� ǥ���Դϴ�';

$lang['Export_themes'] = '��Ų��������';
$lang['Export_explain'] = '���⿡���� ���õ� ���ø��� ���� ��Ų�� �������� �� �� �ֽ��ϴ�. �Ʒ��� ����Ʈ���� ���ø��� �����ϸ� ��ũ��Ʈ�� ��Ų ���� ������ �ۼ��ϰ� �� ������ ���ø� ���丮�� �����մϴ�. ���忡 �����ϸ� �ٿ�ε� �ɼ��� ǥ�õ� ���Դϴ�. ��ũ��Ʈ�� ������ ������ �� �ֵ��� �Ϸ��� ���õ� ���ø� ���丮�� ���� �������� ���� ������ ��� �մϴ�. ���� �ڼ��� ������ WebManager ����� ������ �����Ͻʽÿ�.';

$lang['Theme_installed'] = '���õ� ��Ų�� ���������� ��ġ�Ǿ����ϴ�';
$lang['Style_removed'] = '���õ� ��Ų�� �����ͺ��̽����� �����Ǿ����ϴ�. �ý��ۿ��� �� ��Ų�� ������ ������� ���ø� ���丮���� �ش� ��Ų�� ������ �մϴ�.';
$lang['Theme_info_saved'] = '���õ� ���ø��� ���� ��Ų ������ ����Ǿ����ϴ�. ���� theme_info.cfg (���� ���õ� ���ø� ���丮) �� ���� ������ �б�-�������� �ٲ� ���ƾ� �մϴ�';
$lang['Theme_updated'] = '���õ� ��Ų�� ������Ʈ�Ǿ����ϴ�. �ٲ� ��Ų ������ Backup�ϱ� ���ؼ��� "��Ų��������"��� �޴����� ��Ų�� ������ ���ø��� ������ �� "����"��ư�� �����ž� �մϴ�.';
$lang['Theme_created'] = '��Ų�� ����������ϴ�. ���� ������ ��Ų�� Backup�ϱ� ���ؼ��� "��Ų��������"��� �޴����� ��Ų�� ������ ���ø��� ������ �� "����"��ư�� �����ž� �մϴ�.';

$lang['Confirm_delete_style'] = '�� ��Ų�� ����ðڽ��ϱ�?';

$lang['Download_theme_cfg'] = 'Exporter�� ��Ų ���� ������ �ۼ��� �� �����ϴ�. �Ʒ��� ��ư�� Ŭ���Ͽ� ���������� �� ������ �ٿ�ε��Ͻ� ��, �ٿ� ���� ������ ���ø� ���ϵ��� �ִ� ���丮�� �̵���Ű�ʽÿ�. �� �Ŀ�, �� ���ϵ��� ����� �� �ֽ��ϴ�';
$lang['No_themes'] = '���õ� ���ø��� ������ ��Ų�� �����ϴ�. ���ο� ��Ų�� ������� ������ ���� ����� ��ũ�� Ŭ���Ͻʽÿ�';
$lang['No_template_dir'] = '���ø� ���丮�� �� �� �����ϴ�. �������� ������ ���ų� �������� �ʽ��ϴ�';
$lang['Cannot_remove_style'] = '���õ� ��Ų�� ���� ����Ʈ �⺻���̱⶧���� ������ �� �����ϴ�. �⺻ ��Ų�� �ٲ� ������ �ٽ� �õ��� ���ʽÿ�.';
$lang['Style_exists'] = '���õ� ��Ų �̸��� �̹� ���� �ϹǷ� ���ư��� �ٸ� �̸��� �����Ͻʽÿ�.';

$lang['Click_return_styleadmin'] = '��Ų ������ ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';

$lang['Theme_settings'] = '��Ų ����';
$lang['Theme_element'] = '��Ų ���';
$lang['Simple_name'] = '�ܼ� �̸�';
$lang['Value'] = '��';
$lang['Save_Settings'] = '���� ����';

$lang['Stylesheet'] = 'CSS ��Ÿ�Ͻ�Ʈ';
$lang['Background_image'] = '��� �̹���';
$lang['Background_color'] = '��� ��';
$lang['Theme_name'] = '��Ų��';
$lang['Link_color'] = '��ũ ��';
$lang['Text_color'] = '���� ��';
$lang['VLink_color'] = '�湮�� ��ũ ��';
$lang['ALink_color'] = 'Ȱ�� ��ũ ��';
$lang['HLink_color'] = 'Hover ��ũ ��';
$lang['Tr_color1'] = '���̺� �� �� 1';
$lang['Tr_color2'] = '���̺� �� ��2';
$lang['Tr_color3'] = '���̺� �� �� 3';
$lang['Tr_class1'] = '���̺� �� Ŭ���� 1';
$lang['Tr_class2'] = '���̺� �� Ŭ���� 2';
$lang['Tr_class3'] = '���̺� �� Ŭ���� 3';
$lang['Th_color1'] = '���̺� ��� �� 1';
$lang['Th_color2'] = '���̺� ��� ��  2';
$lang['Th_color3'] = '���̺� ��� �� 3';
$lang['Th_class1'] = '���̺� ��� Ŭ���� 1';
$lang['Th_class2'] = '���̺� ��� Ŭ���� 2';
$lang['Th_class3'] = '���̺� ��� Ŭ���� 3';
$lang['Td_color1'] = '���̺� �� �� 1';
$lang['Td_color2'] = '���̺� �� �� 2';
$lang['Td_color3'] = '���̺� �� �� 3';
$lang['Td_class1'] = '���̺� �� Ŭ���� 1';
$lang['Td_class2'] = '���̺� �� Ŭ���� 2';
$lang['Td_class3'] = '���̺� �� Ŭ���� 3';
$lang['fontface1'] = '��Ʈ ��� 1';
$lang['fontface2'] = '��Ʈ ��� 2';
$lang['fontface3'] = '��Ʈ ��� 3';
$lang['fontsize1'] = '��Ʈ ũ�� 1';
$lang['fontsize2'] = '��Ʈ ũ�� 2';
$lang['fontsize3'] = '��Ʈ ũ�� 3';
$lang['fontcolor1'] = '��Ʈ �� 1';
$lang['fontcolor2'] = '��Ʈ �� 2';
$lang['fontcolor3'] = '��Ʈ �� 3';
$lang['span_class1'] = '���� Ŭ���� 1';
$lang['span_class2'] = '���� Ŭ���� 2';
$lang['span_class3'] = '���� Ŭ���� 3';
$lang['img_poll_size'] = '��ǥ �̹��� ũ�� [px]';
$lang['img_pm_size'] = '���� �̹��� ũ�� [px]';


//
// Install Process
//
$lang['Welcome_install'] = 'WebManager ��ġ�� ȯ���մϴ�';
$lang['Initial_config'] = '�⺻ ����';
$lang['DB_config'] = '�����ͺ��̽� ����';
$lang['Admin_config'] = '� ����';
$lang['continue_upgrade'] = '���� ������ �ϴ� ��ǻ�ͷ� �ٿ�ε��� �������� �ϴ��� \'���׷��̵� ���\' ��ư���� ���׷��̵� ������ ����� �� �ֽ��ϴ�.  ���� ������ ���ε带 �Ϸ��� ���׷��̵尡 �Ϸ�ɶ����� ��ٸ��ʽÿ�.';
$lang['upgrade_submit'] = '���׷��̵� ���';

$lang['Installer_Error'] = '��ġ�ϴ� ���� ������ �߻��߽��ϴ�';
$lang['Previous_Install'] = '���� ��ġ�� �߰��߽��ϴ�';
$lang['Install_db_error'] = '�����ͺ��̽� ������Ʈ�� ������ �߻��߽��ϴ�';

$lang['Re_install'] = '���� ��ġ�� ���� ���� �۵����Դϴ�. <br /><br />WebManager �� �缳ġ �Ϸ��� �Ʒ��� Yes ��ư�� Ŭ���Ͻʽÿ�. ������ �����ʹ� ��� �������� ����� ����� ���� ������ �����Ͻʽÿ�. ����Ʈ �α��νÿ� ����ߴ� ����� ID�� ��й�ȣ�� �缳ġ�Ŀ� �ٽ� �����������, �� ���� �ٸ� �������� �������� �ʽ��ϴ�. <br /><br />Yes�� ���������� �� ������ ���ñ� �ٶ��ϴ�!';

$lang['Inst_Step_0'] = 'WebManager�� ������ �ּż� �����մϴ�. �� ��ġ�� �Ϸ��Ϸ��� �Ʒ� �䱸������ �����Ͻʽÿ�. ��ġ�Ϸ��� �����ͺ��̽��� �̹� �����ؾ� �ϴ� ���� �����Ͻʽÿ�. MS �׼����� ���� ODBC�� ����ϴ� �����ͺ��̽��� ��ġ�Ѵٸ�, �������� �ش� DSN�� ���� ������ �մϴ�.';

$lang['Start_Install'] = '��ġ ����';
$lang['Finish_Install'] = '��ġ �Ϸ�';

$lang['Default_lang'] = '�⺻ ����Ʈ ���';
$lang['DB_Host'] = '�����ͺ��̽� ���� ȣ��Ʈ�̸� / DSN';
$lang['DB_Name'] = '�����ͺ��̽� �̸�';
$lang['DB_Username'] = '�����ͺ��̽� ID';
$lang['DB_Password'] = '�����ͺ��̽� ��й�ȣ';
$lang['Database'] = '�����ͺ��̽�';
$lang['Install_lang'] = '��ġ�� ��� ����';
$lang['dbms'] = '�����ͺ��̽� ����';
$lang['Table_Prefix'] = '�����ͺ��̽� ���̺�� ����(prefix)';
$lang['Admin_Username'] = '��� ID';
$lang['Admin_Password'] = '��� ��й�ȣ';
$lang['Admin_Password_confirm'] = '��� ��й�ȣ  [ Ȯ�� ]';

$lang['Inst_Step_2'] = '��� ID�� ����������ϴ�. ���� �⺻���� ��ġ�� �Ϸ�Ǿ����ϴ�. ���� ȭ�鿡�� ��ġ�� ������ �� �ֽ��ϴ�. �Ϲ� ������ ���λ��׵��� Ȯ���ϰ� �ʿ��� ������ �Ͻʽÿ�. WebManager�� ������ �ּż� �����մϴ�.';

$lang['Unwriteable_config'] = '���� ������ ���� ���Ⱑ �ȵ˴ϴ�. �Ʒ��� ��ư�� Ŭ���ϸ� ���� ������ ���纻�� �ý������� �ٿ�ε� �� ���Դϴ�. �� ������ WebManager�� ������ ���丮�� ���ε��ؾ� �մϴ�. �׷� ����, ���� ��Ŀ��� �Է��� ��� ID�� ��й�ȣ�� �α����ϰ� ��� ���� ����(�α����ϸ� �� ȭ���� �ؿ� ��ũ�� ��Ÿ�� ���Դϴ�)�� ���� �Ϲ� ������ Ȯ���ؾ� �մϴ�. WebManager�� ������ �ּż� �����մϴ�.';
$lang['Download_config'] = '���� ���� �ٿ�ε�';

$lang['ftp_choose'] = '�ٿ�ε� ��� ����';
$lang['ftp_option'] = '<br />�� ������ PHP�� FTP ����� �����ϱ� ������ �켱������ �ڵ����� ���� ������ ftp �� �������� �����ϴ� �ɼ��� �־����ϴ�.';
$lang['ftp_instructs'] = '������ �ڵ����� WebManager �� �ִ� �������� ftp �ϵ��� �����Ͽ����ϴ�. �� �۾��� ���� ������ �Ʒ��� �Է��Ͻʽÿ�. �ٸ� ftp ���α׷��� ����� ���� ���������� FTP ��δ� ��Ȯ�� ��� ���� �մϴ�.';
$lang['ftp_info'] = 'FTP ������ �Է��Ͻʽÿ�';
$lang['Attempt_ftp'] = '���� ���� ���� �õ�';
$lang['Send_file'] = '������ ���� ������ ���� �������� ftp �ϰ���';
$lang['ftp_path'] = 'WebManager �� ���� FTP ���';
$lang['ftp_username'] = 'FTP ID';
$lang['ftp_password'] = 'FTP ��й�ȣ';
$lang['Transfer_config'] = '���� ����';
$lang['NoFTP_config'] = '���� ������ ������ �����߽��ϴ�. ���� ������ �ٿ�ε��Ͽ� �������� ftp �����Ͻʽÿ�.';

$lang['Install'] = '��ġ';
$lang['Upgrade'] = '���׷��̵�';


$lang['Install_Method'] = '��ġ ����� �����Ͻʽÿ�';

$lang['Install_No_Ext'] = '�������� php ������ ���õ� �����ͺ��̽��� �������� �ʽ��ϴ�';

$lang['Install_No_PCRE'] = 'WebManager�� php�� Perl-Compatible Regular Expressions Module�� �ʿ�� �ϴµ� ������ php ������ �װ��� �������� �ʰ� �ֽ��ϴ�!';


//
// mod : ezportal Admin
//
$lang['EZPortal_Config'] = 'ù����������';
$lang['EZPortal_Portal_settings'] = 'ù������ ����';
$lang['Welcome_Text'] = 'ȯ�� �޽���';
$lang['Html_areal'] = 'Html ����';
$lang['Number_of_News'] = '�������� ����';
$lang['News_length'] = '�������� ����';
$lang['News_Forum'] = '�������׸޴�';
$lang['Poll_Forum'] = '��ǥ�޴�';
$lang['Number_Recent_Topics'] = '�ֱ� ���� ����';
$lang['Exceptional_forums'] = '�������� �޴�<br>(ù�������� �ֱ� �Խù��� ���Ե��� ����)';
$lang['Last_Seen'] = 'Last seen users on forum';
$lang['Comma'] = 'CtrlŰ�� �����ø� ���� ���� �޴��� ������ �� �ֽ��ϴ�.';
//
//  END ezportal Admin
//


//-- mod : sub-templates ---------------------------------------------------------------------------
//-- add
$lang['Subtemplate'] = '�������ø�';
$lang['Subtemplate_explain'] = 'ī�װ��� �޴��� ������ �������ø��� ������ �� �ֽ��ϴ�';
$lang['Choose_main_style'] = '�⺻ ��Ų�� �����Ͻʽÿ�';
$lang['main_style'] = '�⺻ �������ø�';
$lang['subtpl_name'] = '�������ø� ��Ī';
$lang['subtpl_dir'] = '�������ø� ���丮';
$lang['subtpl_imagefile'] = '�̹��� ���� ����';
$lang['subtpl_create'] = '���ο� �������ø� �߰�';
$lang['subtpl_usage'] = '����� �������ø� : ';
$lang['Select_dir'] = '���丮 ����';

$lang['subtpl_error_name_missing'] = '�������ø��� ã�� �� �����ϴ�.';
$lang['subtpl_error_dir_missing'] = '�������ø� ���丮�� ã�� �� �����ϴ�.';
$lang['subtpl_error_no_selection'] = '�������ø��� ������ �ֽʽÿ�.';

$lang['subtpl_click_return'] = '�������ø��� �߰��Ǿ����ϴ�. �������ø� ������ ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�.';
//-- fin mod : sub-templates -----------------------------------------------------------------------

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
$lang['Category_attachment']					= 'ī�װ� �߰��� ��ġ';
$lang['Category_desc']							= 'ī�װ� ����';
$lang['Category_config_error_fixed']			= 'ī�װ� �������� �߻��� �������� �����Ǿ����ϴ�.';
$lang['Attach_forum_wrong']						= '�޴� �Ʒ��� �޴��� ������ �� �����ϴ�. �޴��� �߰��� ī�װ��� ������ �ֽʽÿ�.';
$lang['Attach_root_wrong']						= '�޴��� ������ �� �����ϴ�.';
$lang['Forum_name_missing']						= '�޴� �̸��� �Է��� �ּ���.';
$lang['Category_name_missing']					= 'ī�װ� �̸��� �Է��� �ּ���.';
$lang['Only_forum_for_topics']					= '�Խù��� ī�װ��� �ƴ� �޴����� ���� �� �ֽ��ϴ�.';
$lang['Delete_forum_with_attachment_denied']	= '���� ī�װ��� ������ �ִ� �޴��� ������ �� �����ϴ�.';

$lang['Category_delete']						= 'ī�װ� ����';
$lang['Category_delete_explain']				= 'ī�װ��� ������ �� �ֽ��ϴ�. ī�װ��� ������Ű������ ī�װ��� �����ߴ� �޴��� �Ű� ���� ��ġ�� ������ �ֽʽÿ�.';
// forum links type
$lang['Forum_link_url']							= '��ũ��ų URL';
$lang['Forum_link_url_explain']					= '��ũ��ų URL�� �Է����ּ���. ������ URL�� �Է��ؾ� �մϴ�. ��)http://www.yahoo.co.kr';
$lang['Forum_link_internal']					= 'WebManager���α׷�';
$lang['Forum_link_internal_explain']			= '��ũ��ų WebManager file��(���丮�� ����)�� �Է��� �ּ���.';
$lang['Forum_link_hit_count']					= '��ȸ��';
$lang['Forum_link_hit_count_explain']			= '��ũ�� �޴��� ��ȸ���� �˰� ������ yes�� �����ϼ���.';
$lang['Forum_link_with_attachment_deny']		= '�� �޴��� ���� ī�װ��� �����ϹǷ� ��ũ�޴����� ��ȯ�� �� �����ϴ�.';
$lang['Forum_link_with_topics_deny']			= '�� �޴��� �Խù��� �����Ƿ� ��ũ�޴����� ��ȯ�� �� �����ϴ�.';
$lang['Forum_attached_to_link_denied']			= '��ũ�޴����� �޴��� ī�װ��� ���Ӱ� ������ų �� �����ϴ�.';
//-- fin mod : categories hierarchy ----------------------------------------------------------------

//-- mod : mods settings ---------------------------------------------------------------------------
//-- add
$lang['Configuration_extend']	= '���� +';
$lang['Override_user_choices']	= '����� ���� ����';
//-- fin mod : mods settings -----------------------------------------------------------------------

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
$lang['Icons_settings_explain']		= '�޽��� �������� �߰�,���� �� ������ �� �ֽ��ϴ�.';
$lang['Icons_auth']					= '����';
$lang['Icons_auth_explain']			= '���� ������ ���� �� �������� �̿��� �� �ֽ��ϴ�.';
$lang['Icons_defaults']				= '�⺻ ����';
$lang['Icons_defaults_explain']		= '�����ۿ� �޽��� �������� ������ ������� �ʰ� �Է����� �� �⺻������ ������ ���� ������ �˴ϴ�.';
$lang['Icons_delete']				= '������ ����';
$lang['Icons_delete_explain']		= '�� �������� ��ü�� �������� ������ �ּ��� :';
$lang['Icons_confirm_delete']		= '�����Ͻðڽ��ϱ�?';

$lang['Icons_lang_key']				= '������ ��Ī';
$lang['Icons_lang_key_explain']		= '������ ��Ī�� ���콺�� ������ ���� �÷����� �� �������ϴ�. �۾��� ����ǥ�� �Է��� �� �ֽ��ϴ�. <br />( language/lang_<i>your_language</i>/lang_main.php�� üũ�� �ּ���.).';
$lang['Icons_icon_key']				= '������';
$lang['Icons_icon_key_explain']		= '������ �̹��� URL�� �Է����ּ���. <br />( templates/<i>your_template</i>/<i>your_template</i>.cfg �� üũ�� �ּ���.)';

$lang['Icons_error_title']			= '������ �̸��� �Է��� �ּ���.';
$lang['Icons_error_del_0']			= '�⺻���� �������� ������ �� �����ϴ�.';

$lang['Refresh']					= '���ΰ�ħ';
$lang['Usage']						= '���(%)';
//-- fin mod : post icon ---------------------------------------------------------------------------


//-- mod : qbar ------------------------------------------------------------------------------------
//-- add
// title
$lang['Qbar_admin']							= '�޴� ����';
$lang['Qbar_admin_explain']					= '�޴��� ���� ������ �� �� �ֽ��ϴ�.';
$lang['Qbar_menu']							= '�޴�';
$lang['Qbar_admin_panel']					= 'SubMenu ����';
$lang['Qbar_admin_panel_explain']			= 'SubMenu�� �����ϰų� ������ �� �ֽ��ϴ�. SubMenu�� ����Ʈ�� ����κп� ��Ÿ���ϴ�.';
$lang['Qbar_admin_field']					= 'SubMenu Field';
$lang['Qbar_admin_field_explain']			= 'SubMenu�� ���ο� Field�� �߰��ϰų� ������ �� �ֽ��ϴ�.';
$lang['Qbar_admin_import']					= 'SubMenu ��������';
$lang['Qbar_admin_import_explain']			= '�̹� �����Ǿ� �ִ� �ٸ� SubMenu���� �޴��׸�(Field)�� ������ �� �ֽ��ϴ�.';
$lang['Qbar_settings']						= '����';

// qbar def
$lang['Qbar_name']							= 'SubMenu ��Ī';
$lang['Qbar_name_explain']					= 'SubMenu ��Ī�� ����ڿ��� ������ �ʽ��ϴ�. : SubMenu ��Ī�� ������������������ ���˴ϴ�.';
$lang['Qbar_class']							= 'Class';
$lang['Qbar_class_explain']					= 'Bar ���� : Ȩ������ ����� ���� ���� �κп� ��ġ��.<br/>Menu : Ȩ������ ��� �����κп� ��ġ��.';
$lang['Qbar_display']						= 'Display';
$lang['Qbar_display_explain']				= 'SubMenu�� ��Ÿ������ "��"�� �����ϼ���.';
$lang['Qbar_cells']							= '�� ���ο� ǥ�õǴ� �޴� ��';
$lang['Qbar_cells_explain']					= '�� ���ο� ǥ�õǴ� �޴� �� : �޴��� �� ������ ������ ���� ������ ���ο� ������ �����˴ϴ�.';
$lang['Qbar_in_table']						= '���̺�� ǥ��';
$lang['Qbar_in_table_explain']				= '"��"�� �����ϸ� �޴��� ���̺� ���·� ǥ�õ˴ϴ�.';
$lang['Qbar_style']							= 'Submenu�� ��Ų ����';
$lang['Qbar_style_explain']					= 'Submenu�� Display�� �����ϴ� ��Ų�� ������ �޽��ϴ�.';
$lang['Qbar_sub_template']					= 'Submenu�� �������ø� ����';
$lang['Qbar_sub_template_explain']			= 'Submenu�� Display�� �����ϴ� �������ø��� ������ �޽��ϴ�.';

// field def
$lang['Qbar_field_name']					= 'Field name';
$lang['Qbar_field_name_explain']			= 'Field name�� �Ϲ� ����ڿ��� ������ �ʽ��ϴ�. : Field name�� submenu�� �޴��� ��Ī�ϴ� �̸��̸� ����(������������)������ ���˴ϴ�.';
$lang['Qbar_shortcut']						= 'Shortcut';
$lang['Qbar_shortcut_explain']				= 'Shortcut�� Submenu���� �޴��� �������� �̸��Դϴ�. ������ �̸��� lang_main.php�� �����ϴ� �������̸� ������ �ش��ϴ� value�� �޴��� �������� lang_main.php�� �������� �ʴ� �������̸� ����ڰ� �Է��ϴ� ������ �޴��� �̸��� ǥ�õ˴ϴ�. <br />(������ value�� �����Ϸ��� language/lang_<i>your_language</i>/lang_main.php�� �����ϼ���.)';

$lang['Qbar_explain']						= 'Mouse over';
$lang['Qbar_explain_explain']				= '��ũ�� ���������� ǥ�õǴ� �޴� ���� ���콺�� �÷� ������ �� ��Ÿ���� �޽����Դϴ�. ���ڳ� ����ǥ�� �̿��� �� �ֽ��ϴ�.<br />(��Ÿ���� �޽����� �����Ϸ��� language/lang_<i>your_language</i>/lang_main.php�� �����ϼ���.).';
$lang['Qbar_alternate']						= 'Alternate shortcut';
$lang['Qbar_alternate_explain']				= '����(Private Message)�� �� �̻��̸� Shortcut��� Alternate shortcut�� �޴��� ��Ÿ���ϴ�. ����� ������ ��Ÿ���� "-s"�� ǥ���ϱ� ���� Alternate shortcut ����� �߰��Ǿ����ϴ�. Shortcut�� ���������� ����ڰ� ������ �̸��� lang_main.php�� �����ϴ� �������̸� �ش� value�� ��Ÿ���� �׷��� ������ �Է��� ���� ��Ÿ���ϴ�.<br />(������ value�� �����Ϸ��� language/lang_<i>your_language</i>/lang_main.php�� �����ϼ���.).';
$lang['Qbar_icon']							= '������';
$lang['Qbar_icon_explain']					= '������ �̹����� �ִ� ��θ� �Է��� �ּ���. <br />(templates/<i>your_template</i>/<i>your_template</i>.cfg�� üũ���ּ���.)';
$lang['Qbar_icon2']							= '������2';
$lang['Qbar_icon2_explain']					= '������2 �̹����� �ִ� ��θ� �Է��� �ּ���. <br />(templates/<i>your_template</i>/<i>your_template</i>.cfg�� üũ���ּ���.)';
$lang['Qbar_use_value']						= 'Shortcut ǥ��';
$lang['Qbar_use_value_explain']				= 'Shortcut�� ��Ÿ������ "��"�� �����ϼ���.';
$lang['Qbar_use_icon']						= 'Icon ǥ��';
$lang['Qbar_use_icon_explain']				= 'Icon�� ǥ���Ϸ���  "��"�� �����ϼ���.';
$lang['Qbar_url']							= '���α׷� URL';
$lang['Qbar_url_explain']					= '�޴��� Ŭ������ �� �����ų ���α׷� URL�� �Է��ϼ���. ���α׷��� WebManager ���丮�� ������ URL�� �Է��ϰ� �� �ܿ��� Full URL�� �Է��ϼ���.(��:aaaa.php)';
$lang['Qbar_internal']						= 'WebManager ���α׷�';
$lang['Qbar_internal_explain']				= '"��"�� �����ϸ� WebManager ���α׷��� ����ǰ�, �ܺ� ���ٿ� ���� ������ �̷�����ϴ�.';
$lang['Qbar_auth_logged']					= '�α���';
$lang['Qbar_auth_logged_explain']			= '�α��� ���¿� ���� �޴��� ǥ�ð� �޶����ϴ�. "Prohibited"�� �����ϸ� �α��� �� �ش� �޴��� ������ �ʽ��ϴ�.';
$lang['Qbar_auth_admin']					= '����� ����';
$lang['Qbar_auth_admin_explain']			= '����� ���ؿ� ���� �޴��� ǥ�ð� �޶����ϴ�. "Ignore"�� �����ϸ� �׻� �޴��� ǥ�õ˴ϴ�.';
$lang['Qbar_auth_pm']						= 'PM awaiting';
$lang['Qbar_auth_pm_explain']				= 'PM awaiting�� ������ ���� �޴��� ǥ�ð� �޶����ϴ�. "Ignore"�� �����ϸ� �׻� �޴��� ǥ�õ˴ϴ�.';
$lang['Qbar_tree_id']						= '����Ʈ ����';
$lang['Qbar_tree_id_explain']				= '������� ���� ���ѿ� ���� �޴��� ���̴� ������ �޶����ϴ�.';

$lang['Qbar_auths']							= '����';
$lang['Qbar_private_messages']				= '����(PM:Private Messages) ����';

// specific actions
$lang['Qbar_delete_panel']					= 'SubMenu ����';
$lang['Qbar_delete_panel_confirm']			= 'SubMenu <b>%s</b>�� �����Ͻðڽ��ϱ�?';

$lang['Qbar_delete_field']					= '�޴� ����';
$lang['Qbar_delete_field_confirm']			= '�޴� "%s"�� <b>%s</b>���� �����Ͻðڽ��ϱ�?';

// error messages
$lang['Qbar_error_panel_system']			= 'System Qbar�� �����ϰų� ������ �� �����ϴ�.';
$lang['Qbar_error_panel_exists']			= '������ SubMenu name�� �����մϴ�.';
$lang['Qbar_error_panel_not_found']			= 'SubMenu name�� �������� �ʽ��ϴ�.';
$lang['Qbar_error_panel_empty_name']		= 'SubMenu name�� �����ؾ��մϴ�.';
$lang['Qbar_error_panel_empty_cells']		= 'SubMenu�� ��Ÿ������ �� ���� �� ǥ���� �޴��� ���� �����ؾ��մϴ�.';

$lang['Qbar_error_field_exists']			= '������ �޴�(Field name)�� �����մϴ�.';
$lang['Qbar_error_field_not_found']			= '������ �޴��� �������� �ʽ��ϴ�.';
$lang['Qbar_error_field_empty_name']		= '�޴���(Field name)�� �Է��ؾ� �մϴ�.';
$lang['Qbar_error_field_system']			= 'System SubMenu�� �޴����� �����ϰų� ������ �� �����ϴ�.';
$lang['Qbar_error_field_empty_shortcut']	= 'Shortcut�� ����Ϸ��� Shortcut���� �������̳� ����� �޴��� �̸��� �Է��ؾ� �մϴ�.';
$lang['Qbar_error_field_empty_icon']		= '�������� ���̰� �Ϸ��� �������� �������ּ���.';
$lang['Qbar_error_field_display_nothing']	= '��ũ�� �������� �̿��ϱ� ���ؼ� �ݵ�� �����ؾ� �մϴ�.';
$lang['Qbar_error_field_empty_url']			= '��ũ�� URL�̳� URI�� �Է��ؾ� �մϴ�.';
$lang['Qbar_error_field_external_url']		= '������(http://)�� �Է����� ������.';

// auths
$lang['Qbar_auth_ignore']					= 'Ignore';
$lang['Qbar_auth_required']					= 'Required';
$lang['Qbar_auth_prohibited']				= 'Prohibited';
$lang['Qbar_auth_pm_new']					= '���ο� ����';
$lang['Qbar_auth_pm_no_new']				= '���ο� ���� ����';
$lang['Qbar_auth_pm_unread']				= '���� ���� ����';

// classes
$lang['Qbar_class_system']					= 'System';
$lang['Qbar_class_bar']						= 'Bar';
$lang['Qbar_class_menu']					= 'Menu';

// generic actions
$lang['Create_field']						= '�޴� �߰�';
$lang['Create_panel']						= 'SubMenu �߰�';

// misc.
$lang['Qbar_none']							= '---------- None ----------';
$lang['Import']								= '��������';
$lang['Refresh']							= '���ΰ�ħ';
$lang['Qbar_all']							= '---------- All -----------';
//-- fin mod : qbar --------------------------------------------------------------------------------

// portal addon
$lang['Album_category'] = '�ٹ� ī�װ�<br>(ù�������� �ֱ� �̹����� � �ٹ� �޴����� �������� ����) ';
$lang['Banner_board'] = '��� �޴�';

// Log actions MOD Start
$lang['Log_action_title'] = 'Logs Actions';
$lang['Log_action_explain'] = '�޴����/�ý��۰������� Log ����� �� �� �ֽ��ϴ�.';
$lang['Choose_sort_method'] = '���� �׸�';
$lang['Order'] = '���� ���';
$lang['Go'] = '����';
$lang['Id_log'] = 'Log Id';
$lang['Choose_log'] = 'Log ����';
$lang['Delete'] = '����';
$lang['Action'] = 'Action';
$lang['Topic'] = 'Index No.';
$lang['Done_by'] = 'ID';
$lang['User_ip'] = '����� IP';
$lang['Select_all'] = '��ü ����';
$lang['Unselect_all'] = '���� ����';
$lang['Date'] = '�ð�';
$lang['See_topic'] = 'See the post';
$lang['Log_delete'] = 'Log����� �����߽��ϴ�.';
$lang['Click_return_admin_log'] = 'Logs Actions�� ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���ϼ���.';
$lang['Log_Config_updated'] = 'Log ������ �����Ͽ����ϴ�.';
$lang['Click_return_admin_log_config'] = 'Logs �������� ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���ϼ���.';
$lang['Log_Config'] = 'Log ����';
$lang['Log_Config_explain'] = 'Log Action�� ���� �ɼ��� ������ �� �ֽ��ϴ�.';
$lang['General_Config_Log'] = 'Log Action�� ���� �Ϲ����� ����';
$lang['Allow_all_admin'] = '�ٸ� �ý��۰����ڰ� Log Action�� �� �� �ֵ��� �Ͻðڽ��ϱ�?';
$lang['Allow_all_admin_explain'] = '�� �ɼ��� ceo�ܿ� �ٸ� �ý��۰����ڰ� Log Actions�� �� �� �ֵ��� ������ �� �ֽ��ϴ�. <br/>"Enabled"�� �����ϸ� ��� �ý��۰����ڰ� Log action�� �� �� �ְ� "Disabled"�� �����ϸ� �Ʒ��� ��Ͽ� �߰��� �ý��� �����ڸ� Log actions�� �� �� �ֽ��ϴ�.';
$lang['Admin_not_authorized'] = '�˼��մϴ�. �� �������� �� �� �ִ� ������ �����ϴ�.';
$lang['Add_username_admin_explain'] = 'Log actions�� �� �� �ִ� ������ �ο��� �����ڸ� ������ �ּ���.�ý��� ������ ������ �ִ� ����� ���� �����մϴ�.';
$lang['Delete_username_admin_explain'] = 'Log actions�� ������ ���� �����ڸ� ������ �ּ���.';
$lang['No_other_admins'] = '�߰��� �����ڰ� �����ϴ�.';
$lang['No_admins_authorized'] = '������ �ο����� �����ڰ� �����ϴ�.';
$lang['Add_Admin_Username'] = '�߰��� �����ڸ� ������ �ּ���.';
$lang['Delete_Admin_Username'] = '������ �����ڸ� ������ �ּ���.';
$lang['No_admins_allow'] = 'Log ����� �� �� �ִ� �����ڰ� �����ϴ�.';
$lang['No_admins_disallow'] = 'Log ����� �� �� ���� �����ڰ� �����ϴ�.';
$lang['Admins_add_success'] = 'Log actions�� �� �� �ִ� ������ ��Ͽ� �߰��Ǿ����ϴ�.';
$lang['Admins_del_success'] = 'Log actions�� �� �� �ִ� ������ ��Ͽ��� �����Ǿ����ϴ�.';

// Log actions MOD End

// Korean user-info
$lang['field_conf'] = "�����׸���";
$lang['field_use_off'] = "������";
$lang['field_use_on'] = "�����Է�";
$lang['field_use_req'] = "�ʼ��Է�";

$lang['field_realname'] = "�̸��� �Է¹����� �ֵ��� ���� �մϴ�.";
$lang['field_jumin'] = "�ֹε���� �Է¹����� �ֵ��� ���� �մϴ�";
$lang['field_mphone'] = "��ȭ��ȣ�� �Է¹����� �ֵ��� ���� �մϴ�";
$lang['field_hphone'] = "�ڵ����� �Է¹����� �ֵ��� ���� �մϴ�.";
$lang['field_birth'] = "������ �Է¹����� �ֵ��� ���� �մϴ�.";
$lang['field_gender'] = "������ �Է¹����� �ֵ��� ���� �մϴ�.";
$lang['field_from'] = "�ּ��ʵ� �Է¹���� �����մϴ�.";
$lang['field_occ'] = "�����ʵ� �Է¹���� �����մϴ�";

$lang['Personal_Galleries'] = "���ξٹ�";
$lang['Clear_Cache'] = "Cache ����";
$lang['Categories'] = "ī�װ�";
$lang['Photo_Album'] = "�ٹ�";
$lang['Portal'] = "ù������";
$lang['Users_List'] = "����ڸ��";
$lang['Logs'] = "Logs";
$lang['Logs_Actions'] = "Logs Actions";
$lang['Logs_Config'] = "Logs ����";

$lang['new_length'] = "���ο� �� ���ؽð� (New)";

$lang['split_field'] = "�и��׸�";

$lang['Moderator_Team'] = "������";

$lang['Admin_only'] = "�����ڸ� ���";

$lang['mouse_right'] = "���콺 ������ ����";
$lang['pics_per_row'] = "���ٿ� �� ���� ��";
$lang['popup_board'] = "�˾� �޴�";
$lang['popup_height'] = "����(pixel)";
$lang['popup_width'] = "����(pixel)";
$lang['popup_board_use'] = "��뿩��";
$lang['special_forum'] = "�����޴� ���̴� ����";

$lang['menu_manage'] = "�޴�������";
$lang['advanced_manage'] = "��ް���";

$lang['mass_mail'] = "��ü���Ϻ�����";


//admin_portal
$lang['admin_lang_announcement'] = '��������';
$lang['admin_lang_title'] = 'Ÿ��Ʋ';
$lang['admin_lang_number'] = '����';
$lang['admin_lang_recent_posts'] = '�ֱ� �Խù�';
$lang['admin_lang_from'] = '���� ���';
$lang['admin_lang_new_pic1'] = '�ֱ��̹��� 1';
$lang['admin_lang_hide_all'] = '���� (��ü)';
$lang['admin_lang_hide_author'] = '���� (�ۼ���)';
$lang['admin_lang_hide_date'] = '���� (�ۼ���)';
$lang['admin_lang_new_pic2'] = '�ֱ��̹��� 2';
$lang['admin_lang_poll'] = '��ǥ';
$lang['admin_lang_calendar'] = '���޷�';
//admin_config
$lang['admin_lang_copyright_setting'] = 'Copyright ����';
$lang['admin_lang_line_1'] = 'Line #1';
$lang['admin_lang_line_2'] = 'Line #2';
$lang['admin_lang_line_3'] = 'Line #3';
$lang['admin_lang_line_4'] = 'Line #4';
$lang['admin_lang_menu_setting'] = '�޴�����';
$lang['admin_lang_left_scroll'] = '���� �޴� ��ũ�� Ȱ��ȭ';
$lang['admin_lang_right_scroll'] =  '������ �޴� ��ũ�� Ȱ��ȭ';
$lang['admin_lang_quick_links_title'] = '����ũ (Ÿ��Ʋ)';
$lang['admin_lang_search_title'] = '�˻� (Ÿ��Ʋ)';
$lang['admin_lang_family_sites_title'] = '���û���Ʈ (Ÿ��Ʋ)';
$lang['admin_lang_post_setting'] = '�Խù� ����';
$lang['admin_lang_quick_links_hide'] = '����ũ (����)';
$lang['admin_lang_search_hide'] = '�˻� (����)';
$lang['admin_lang_family_sites_hide'] = '���û���Ʈ (����)';
$lang['admin_lang_sitemap_hide'] = '����Ʈ�� (����)';
//admin_forum
$lang['admin_lang_first_time'] = '������ �ٸ� �޴� ���·� ����� �����Ͱ� ���ǵ� �� �ֽ��ϴ�.';
$lang['admin_lang_and_then'] = '�� ��';
//navi
$lang['admin_lang_configuration'] = '��ü����';
$lang['admin_lang_index_page'] = 'ù����������';
$lang['admin_lang_main'] = '����';
$lang['admin_lang_top'] = '���';
$lang['admin_lang_users_list'] = '����ڸ��';
$lang['admin_lang_group_management'] = '����ڱ׷����';
$lang['admin_lang_group_permissions'] = '����ڱ׷����';
$lang['admin_lang_mass_email'] = '��ü���Ϻ�����';
$lang['admin_lang_register_field'] = '�����׸���';
$lang['admin_lang_control_panel'] = '���ϰ���';
$lang['admin_lang_management'] = '÷������ ȯ�漳��';
$lang['admin_lang_quota_limits'] = '���Ͽ뷮����';
$lang['admin_lang_shadow_attachments'] = '�������� ����';
$lang['admin_lang_extension_control'] = 'Ȯ���� ����';
$lang['admin_lang_extension_groups'] = 'Ȯ���� �׷� ����';
$lang['admin_lang_synchronize_attachments'] = '÷������ ����ȭ';
$lang['admin_lang_word_censors'] = '�ܾ� �˿�';
$lang['admin_lang_forbidden_extensions'] = '������ Ȯ���� ����';
$lang['admin_lang_ban_control'] = '����� ���� ����';
$lang['admin_lang_disallow_names'] = '���Ұ� ���̵� ����';
$lang['admin_lang_backup'] = '���';
$lang['admin_lang_restore'] = '����';
$lang['admin_lang_upload'] = '�ڷ���ε�';
$lang['admin_lang_banner'] = '���';
$lang['admin_lang_pop_up'] = '�˾�';
$lang['admin_lang_skin'] = '��Ų';
$lang['admin_lang_quick_links'] = '����ũ';
$lang['admin_lang_family_sites'] = '���û���Ʈ';
$lang['admin_lang_logo'] = '�ΰ�';
$lang['admin_lang_image_source'] = '�̹��� ������';
$lang['admin_lang_agreement'] = '��������';
$lang['admin_lang_event_box'] = 'Event Box';
$lang['admin_lang_mini_box'] = 'Mini Box';
$lang['admin_lang_sound'] = '�������';

$lang['admin_lang_csv_download'] = 'CSV �ٿ�ε�';
$lang['admin_lang_'] = '';
$lang['admin_lang_'] = '';
$lang['admin_lang_'] = '';
$lang['admin_lang_'] = '';

//
// That's all Folks!
// -------------------------------------------------

?>