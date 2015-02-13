<?php
/***************************************************************************
 *                            lang_main.php [Korean]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_main.php,v 1.85.2.4 2002/06/23 02:47:56 dougk_ff7 Exp $
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
// Add your details here if wanted, e.g. Name, username, email address, website
// 2002/08/28 Translated by TankTonk
// 2002/12/17 updated by Soon-Son Kwon(kss@kldp.org)
//

//
// The format of this file is ---> $lang['message'] = 'text';
//
// You should also try to set a locale and a character encoding (plus direction). The encoding and direction
// will be sent to the template. The locale may or may not work, it's dependent on OS support and the syntax
// varies ... give it your best guess!
//

$lang['ENCODING'] = 'euc-kr';
$lang['DIRECTION'] = 'ltr';
$lang['LEFT'] = 'left';
$lang['RIGHT'] = 'right';
$lang['DATE_FORMAT'] =  'Y/m/d'; // This should be changed to the default date format for your language, php date() format
$lang['CAL_DATE_FORMAT'] =  'd';

// This is optional, if you would like a _SHORT_ message output
// along with our copyright message indicating you are the translator
// please add it here.
// $lang['TRANSLATION'] = 'Translated by TankTonk';

//
// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = '�˻�����';//�Խ���
$lang['Category'] = '�з�';
$lang['Topic'] = '����';
$lang['Topics'] = '����';
$lang['Replies'] = '�亯';
$lang['Views'] = '��ȸ';
$lang['Post'] = '�۾���';
$lang['Posts'] = '�ѰԽù�';
$lang['Posts_Topics'] = '����+�亯';
$lang['Posted'] = '�ۼ���';
$lang['Username'] = 'ID';
$lang['Password'] = '��й�ȣ';
$lang['Email'] = 'E-mail';
$lang['Poster'] = '�ۼ���';
$lang['Author'] = '�ۼ���';
$lang['Time'] = '�ð�';
$lang['Hours'] = '��';
$lang['for_Hours'] = '�ð�';
$lang['Seconds'] = '��';
$lang['Message'] = '����';

$lang['1_Day'] = '1��';
$lang['7_Days'] = '7��';
$lang['2_Weeks'] = '2��';
$lang['1_Month'] = '1��';
$lang['3_Months'] = '3��';
$lang['6_Months'] = '6��';
$lang['1_Year'] = '1��';

$lang['Go'] = '����';
$lang['Jump_to'] = '�̵�';
$lang['Submit'] = '�Ϸ�';
$lang['Reset'] = '���ΰ�ħ';
$lang['Cancel'] = '���';
$lang['Preview'] = '�̸�����';
$lang['Confirm'] = 'Ȯ��';
$lang['Spellcheck'] = 'ö��üũ';
$lang['Yes'] = '��';
$lang['No'] = '�ƴϿ�';
$lang['Enabled'] = '��밡��';
$lang['Disabled'] = '�������';
$lang['Error'] = '����';

$lang['Next'] = '����';
$lang['Previous'] = '����';
$lang['Goto_page'] = '���������';
$lang['Joined'] = '����';
$lang['IP_Address'] = 'IP �ּ�';

$lang['Select_forum'] = '�޴� ����';
$lang['View_latest_post'] = '�ֱ� �� ����';
$lang['View_newest_post'] = '�� �� ����';
$lang['Page_of'] = '������ <b>%d</b> �� <b>%d</b>'; // Replaces with: Page 1 of 2 for example

$lang['ICQ'] = 'ICQ ��ȣ';
$lang['AIM'] = 'AIM �ּ�';
$lang['MSNM'] = 'MSN �޽���';
$lang['YIM'] = 'Yahoo �޽���';

$lang['Forum_Index'] = '%s';  // eg. sitename Forum Index, %s can be removed if you prefer

$lang['Post_new_topic'] = '�� ����';
$lang['Reply_to_topic'] = '�亯 �ޱ�';
$lang['Reply_with_quote'] = '�ο�� �Բ� �亯';

$lang['Click_return_topic'] = '������ ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�'; // %s's here are for uris, do not remove!
$lang['Click_return_login'] = '�ٽ� �õ��Ͻ÷��� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';
$lang['Click_return_forum'] = '�޴��� ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';
$lang['Click_view_message'] = '������ �Խù��� ������ %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';
$lang['Click_return_modcp'] = '������ ���������� ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';
$lang['Click_return_group'] = '�׷� ������ ���ư����� %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';

$lang['Admin_panel'] = '��� ���������� ����';

$lang['Board_disable'] = '�˼��մϴ�. ������ Ȩ�������� �̿��Ͻ� �� �����ϴ�. ���߿� �ٽ� �õ��� �ֽʽÿ�.';


//
// Global Header strings
//
 $lang['Registered_users'] = '�������� ȸ�� :';
$lang['Browsing_forum'] = '�� �޴��� �̿��ϰ� �ִ� �����:';
$lang['Online_users_zero_total'] = '��<b>0</b>�� ������ > ';
$lang['Online_users_total'] = '�� <b>%d</b>�� ������ > ';
$lang['Online_user_total'] = '�� <b>%d</b>�� ������ > ';
$lang['Reg_users_zero_total'] = 'ȸ�� 0��, ';
$lang['Reg_users_total'] = 'ȸ�� %d��, ';
$lang['Reg_user_total'] = 'ȸ�� %d��, ';
$lang['Hidden_users_zero_total'] = '����� 0��, ';
$lang['Hidden_user_total'] = '����� %d�� ��, ';
$lang['Hidden_users_total'] = '����� %d�� ��, ';
$lang['Guest_users_zero_total'] = '�մ� 0��';
$lang['Guest_users_total'] = '�մ� %d��';
$lang['Guest_user_total'] = '�մ� %d��';
$lang['Record_online_users'] = '���� ����� �ִٱ��: <b>%s</b>��(%s)'; // first %s = number of users, second %s is the date.

$lang['Admin_online_color'] = '%s���%s';
$lang['Mod_online_color'] = '%s������%s';

$lang['You_last_visit'] = '���� ������ �湮�� <br>%s �Դϴ�.'; // %s replaced by date/time
$lang['Current_time'] = '���� �ð��� %s'; // %s replaced by time

$lang['Search_new'] = '���� �ö�� �� ����';
$lang['Search_your_posts'] = '���� �ø� �� ã��';
$lang['Search_unanswered'] = '�亯�� ���� ���� ã��';

$lang['Register'] = 'ȸ������';
$lang['Profile'] = '��������';
$lang['Edit_profile'] = '���� ���� ����';
$lang['Search'] = '�˻�';
$lang['Memberlist'] = 'ȸ�����';
$lang['FAQ'] = '�̿�ȳ�';
$lang['BBCode_guide'] = 'BBCode ����';
$lang['Usergroups'] = '����� �׷�';
$lang['Last_Post'] = '�ۼ���';
$lang['Moderator'] = '������';
$lang['Moderators'] = '������';


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = '����ڰ� �ø� ���� <b>0</b>�� �Դϴ�'; // Number of posts
$lang['Posted_articles_total'] = '����ڰ� �ø� ���� �� <b>%d</b>�� �Դϴ�'; // Number of posts
$lang['Posted_article_total'] = '����ڰ� �ø� ���� �� <b>%d</b>�� �Դϴ�'; // Number of posts
$lang['Registered_users_zero_total'] = '��ϵ� ����ڴ� <b>0</b>�� �Դϴ�'; // # registered users
$lang['Registered_users_total'] = '��ϵ� ����ڴ� <b>%d</b>�� �Դϴ�'; // # registered users
$lang['Registered_user_total'] = '��ϵ� ����ڴ� <b>%d</b>�� �Դϴ�'; // # registered users
$lang['Newest_user'] = '�ֱٿ� ����� ����ڴ� <b>%s%s%s</b> �Դϴ�'; // a href, username, /a

$lang['No_new_posts_last_visit'] = '������ �湮 ���ķ� ���� �ö�� ���� �����ϴ�';
$lang['No_new_posts'] = '���ο� �� ����';
$lang['New_posts'] = '���ο� ��';
$lang['New_post'] = '���ο� ��';
$lang['No_new_posts_hot'] = '���ο� �� ���� [ �α� ]';
$lang['New_posts_hot'] = '���ο� �� [ �α� ]';
$lang['No_new_posts_locked'] = '���ο� �� ���� [ ��� ]';
$lang['New_posts_locked'] = '���ο� �� [ ��� ]';
$lang['Forum_is_locked'] = '�޴� ���';


//
// Login
//
$lang['Enter_password'] = '�α����Ϸ��� ID�� ��й�ȣ�� �Է��ϼ���';
$lang['Login'] = '�α���';
$lang['Logout'] = '�α׾ƿ�';

$lang['Forgotten_password'] = '��й�ȣ ����';

$lang['Log_me_in'] = '�ڵ��α���';

$lang['Error_login'] = 'ID�� Ʋ�Ȱų� ��й�ȣ�� Ʋ�Ƚ��ϴ�';


//
// Index page
//
$lang['Index'] = '�ε���';
$lang['No_Posts'] = '�� ����';
$lang['No_forums'] = '�޴��� �����ϴ�';

$lang['Private_Message'] = '����';
$lang['Private_Messages'] = '����';
$lang['Who_is_Online'] = '������ ����';

$lang['Mark_all_forums'] = '��� �޴��� ���� ���·� ǥ��';
$lang['Forums_marked_read'] = '��� �޴��� ���� ���·� ǥ���߽��ϴ�';


//
// Viewforum
//
$lang['View_forum'] = '�޴� ����';

$lang['Forum_not_exist'] = '<b>�޴��� ������ ������ �����ϴ�.</b><br><br> �����ڰ� ����� ����ڸ� ���� ������ �޴��Դϴ�.<br>(���� : ����, ��� ���)';
$lang['Reached_on_error'] = '������ �� �������� ���̽��ϴ�';

$lang['Display_topics'] = '���� ���� ǥ��';
$lang['All_Topics'] = '��� ����';

$lang['Topic_Announcement'] = '<b>��������:</b>';
$lang['Topic_Sticky'] = '<b>�ʵ�����:</b>';
$lang['Topic_Moved'] = '<b>�̵��Ǿ���:</b>';
$lang['Topic_Poll'] = '<b>[ ��ǥ ]</b>';

$lang['Mark_all_topics'] = '��� ���� ���� ���·� ǥ��';
$lang['Topics_marked_read'] = '�� �޴��� ������ ���� ���·� ǥ�õǾ����ϴ�';

$lang['Rules_post_can'] = '���ο� ������ �ø� �� <b>�ֽ��ϴ�</b>';
$lang['Rules_post_cannot'] = '���ο� ������ �ø� �� <b>�����ϴ�</b>';
$lang['Rules_reply_can'] = '����� �ø� �� <b>�ֽ��ϴ�</b>';
$lang['Rules_reply_cannot'] = '����� �ø� �� <b>�����ϴ�</b>';
$lang['Rules_edit_can'] = '������ ������ �� <b>�ֽ��ϴ�</b>';
$lang['Rules_edit_cannot'] = '������ ������ �� <b>�����ϴ�</b>';
$lang['Rules_delete_can'] = '�Խù��� ������ �� <b>�ֽ��ϴ�</b>';
$lang['Rules_delete_cannot'] = '�Խù��� ������ �� <b>�����ϴ�</b>';
$lang['Rules_vote_can'] = '��ǥ�� �� �� <b>�ֽ��ϴ�</b>';
$lang['Rules_vote_cannot'] = '��ǥ�� �� �� <b>�����ϴ�</b>';
$lang['Rules_moderate'] = '%s�� �޴��� ������ ��%s <b>�ֽ��ϴ�</b>'; // %s replaced by a href links, do not remove!

$lang['No_topics_post_one'] = '�� �޴����� �÷��� ���� �����ϴ�<br /><b>�� ����</b> ��ũ�� Ŭ���Ͽ� ���� �ø��ʽÿ�';


//
// Viewtopic
//
$lang['View_topic'] = '���� ����';

$lang['Guest'] = '�մ�';
$lang['Post_subject'] = '����';
$lang['View_next_topic'] = '���� ���� ����';
$lang['View_previous_topic'] = '���� ���� ����';
$lang['Submit_vote'] = '��ǥ';
$lang['View_results'] = '���';

$lang['No_newer_topics'] = '�� �޴����� �� ���ο� ������ �����ϴ�';
$lang['No_older_topics'] = '�� �޴����� �� ������ ������ �����ϴ�';
$lang['Topic_post_not_exist'] = '��û�� ������ ���� �������� �ʽ��ϴ�';
$lang['No_posts_topic'] = '�� ���ȿ� ���� ���� �������� �ʽ��ϴ�';

$lang['Display_posts'] = '���� �� ǥ��';
$lang['All_Posts'] = '��� ��';
$lang['Newest_First'] = '���ο� �� ����';
$lang['Oldest_First'] = '������ �� ����';

$lang['Back_to_top'] = '����';

$lang['Read_profile'] = '����� ���� ����';
$lang['Send_email'] = '����ڿ��� E-mail ������';
$lang['Visit_website'] = '�� �ø����� ������Ʈ �湮';
$lang['ICQ_status'] = 'ICQ ����';
$lang['Edit_delete_post'] = '�� ����/����';
$lang['View_IP'] = '�� �ø����� IP �ּ� ����';
$lang['Delete_post'] = '�� ����';

$lang['wrote'] = '��'; // proceeds the username and is followed by the quoted text
$lang['Quote'] = '�ο�'; // comes before bbcode quote output.
$lang['Code'] = '�ڵ�'; // comes before bbcode code output.

$lang['Edited_time_total'] = 'Last edited by %s on %s; edited %d time'; // Last edited by me on 12 Oct 2001; edited 1 time
$lang['Edited_times_total'] = 'Last edited by %s on %s; edited %d times'; // Last edited by me on 12 Oct 2001; edited 2 times

$lang['Lock_topic'] = '�� ������ ���';
$lang['Unlock_topic'] = '�� ������ ����� ����';
$lang['Move_topic'] = '�� ������ �̵���';
$lang['Delete_topic'] = '�� ������ ������';
$lang['Split_topic'] = '�� ������ �и���';

$lang['Stop_watching_topic'] = '�� ������ ���ø� ������';
$lang['Start_watching_topic'] = '�� ������ ���� ����� ������';
$lang['No_longer_watching'] = '�� ������ �� �̻� �������� �ʽ��ϴ�';
$lang['You_are_watching'] = '�� ������ �����ϰ� �ֽ��ϴ�';

$lang['Total_votes'] = '�� ��ǥ��';

//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = '����';
$lang['Topic_review'] = '���� ����';

$lang['No_post_mode'] = '��尡 �������� �ʾҽ��ϴ�'; // If posting.php is called without a mode (newtopic/reply/delete/etc, shouldn't be shown normaly)

$lang['Post_a_new_topic'] = '���ο� ���� �ø���';
$lang['Post_a_reply'] = '��� �ø���';
$lang['Post_topic_as'] = '���� �ø���';
$lang['Edit_Post'] = '�� ����';
$lang['Options'] = '�ɼ�';

$lang['Post_Announcement'] = '��������';
$lang['Post_Sticky'] = '�ʵ�����';
$lang['Post_Normal'] = '�Ϲ�';

$lang['Confirm_delete'] = '�� ���� �����Ͻðڽ��ϱ�?';
$lang['Confirm_delete_poll'] = '�� ��ǥ�� �����Ͻðڽ��ϱ�?';

$lang['Flood_Error'] = '�� �ٸ� ���� �ݹ� �ø� ���� �����Ƿ� ����Ŀ� ��õ� �Ͻʽÿ�';
$lang['Empty_subject'] = '������ �ݵ�� �Է��ϼž� �մϴ�';
$lang['Empty_message'] = '������ �ݵ�� �Է��ϼž� �մϴ�';
$lang['Empty_author'] = '�̸��� �ݵ�� �Է��ϼž� �մϴ�';
$lang['Forum_locked'] = '�� �޴��� ������Ƿ� ���� �ø��ų�, �亯�� �ϰų� ������ �� �� �����ϴ�';
$lang['Topic_locked'] = '�� ������ ������Ƿ� �亯�� �ϰų� ������ �� �� �����ϴ�';
$lang['No_post_id'] = '�����Ϸ��� ���� ���� �����ؾ� �մϴ�';
$lang['No_topic_id'] = '�亯�Ϸ��� ������ ���� �����ؾ� �մϴ�';
$lang['No_valid_mode'] = '�� �ø���, ���� Ȥ�� �ο븸 �� �� �����ϴ�, �ǵ��ư��� ��õ� �Ͻʽÿ�';
$lang['No_such_post'] = '�׷� ���� �����ϴ�, �ǵ��ư��� ��õ� �Ͻʽÿ�';
$lang['Edit_own_posts'] = '�ڽ��� �۸��� ������ �� �ֽ��ϴ�';
$lang['Delete_own_posts'] = '�ڽ��� �۸��� ������ �� �ֽ��ϴ�';
$lang['Cannot_delete_replied'] = '����� �ִ� �Խù��� ������ �� �����ϴ�';
$lang['Cannot_delete_poll'] = '���� �������� ��ǥ�� ������ �� �����ϴ�';
$lang['Empty_poll_title'] = '��ǥ�� ���� ������ �Է��ؾ� �մϴ�';
$lang['To_few_poll_options'] = '�ּ��� �ΰ��� ��ǥ �ɼ��� �Է��ؾ� �մϴ�';
$lang['To_many_poll_options'] = '�ɼ��� �ʹ� ���� �����Ͽ����ϴ�';
$lang['Post_has_no_poll'] = '�� �ۿ��� ��ǥ�� �����ϴ�';
$lang['Already_voted'] = '�̹� ��ǥ�ϼ̽��ϴ�';
$lang['No_vote_option'] = '��ǥ�� �� �ɼ��� �����ؾ� �մϴ�';

$lang['Add_poll'] = '��ǥ �ֱ�';
$lang['Add_poll_explain'] = '��ǥ �ֱ⸦ ������ ������, �Ʒ� �� ĭ�� �״�� ���� �νʽÿ�';
$lang['Poll_question'] = '��ǥ ����';
$lang['Poll_option'] = '��ǥ �ɼ�';
$lang['Add_option'] = '�ɼ� �߰�';
$lang['Update'] = '����';
$lang['Delete'] = '����';
$lang['Poll_for'] = '��ǥ ����';
$lang['Days'] = '��'; // This is used for the Run poll for ... Days + in admin_forums for pruning
$lang['Poll_for_explain'] = '[ ������ ��ǥ�� ���ϸ� 0 Ȥ�� �� ĭ���� �Ͻʽÿ� ]';
$lang['Delete_poll'] = '��ǥ ����';

$lang['Disable_HTML_post'] = 'HTML ��� �Ұ�';
$lang['Disable_BBCode_post'] = 'BBCode ��� �Ұ�';
$lang['Disable_Smilies_post'] = '������ ��� �Ұ�';

$lang['HTML_is_ON'] = 'HTML <u>���</u>';
$lang['HTML_is_OFF'] = 'HTML <u>��� ����</u>';
$lang['BBCode_is_ON'] = '%sBBCode%s <u>���</u>'; // %s are replaced with URI pointing to FAQ
$lang['BBCode_is_OFF'] = '%sBBCode%s <u>��� ����</u>';
$lang['Smilies_are_ON'] = '������ <u>���</u>';
$lang['Smilies_are_OFF'] = '������ <u>��� ����</u>';

$lang['Attach_signature'] = '���� ���̱� (������ ���� �������� ����)';
$lang['Notify'] = '����� �ö���� �뺸��';
$lang['Delete_post'] = '����';

$lang['Stored'] = '���������� �ԷµǾ����ϴ�';
$lang['Deleted'] = '���������� �����Ǿ����ϴ�';
$lang['Poll_delete'] = '���������� �����Ǿ����ϴ�';
$lang['Vote_cast'] = '��ǥ�� �ϼ̽��ϴ�';

$lang['Topic_reply_notification'] = '��� �뺸';

$lang['bbcode_b_help'] = '���� ����: [b]����[/b]  (alt+b)';
$lang['bbcode_i_help'] = '���Ÿ� ����: [i]����[/i]  (alt+i)';
$lang['bbcode_u_help'] = '���� ����: [u]����[/u]  (alt+u)';
$lang['bbcode_q_help'] = '�ο� ����: [quote]����[/quote]  (alt+q)';
$lang['bbcode_c_help'] = '�ڵ� ǥ��: [code]�ڵ�[/code]  (alt+c)';
$lang['bbcode_l_help'] = '����Ʈ: [list]����[/list] (alt+l)';
$lang['bbcode_o_help'] = '���� ����Ʈ: [list=]����[/list]  (alt+o)';
$lang['bbcode_p_help'] = '�̹��� �ֱ�: [img]http://image_url[/img]  (alt+p)';
$lang['bbcode_w_help'] = 'URL �ֱ�: [url]http://url[/url] �Ǵ� [url=http://url]URL ����[/url]  (alt+w)';
$lang['bbcode_a_help'] = '��� ���� BBCode �±� �ݱ�';
$lang['bbcode_s_help'] = '�۲û�: [color=red]����[/color]  ��: ����� color=#FF0000';
$lang['bbcode_f_help'] = '�۲�ũ��: [size=x-small]���� ����[/size]';

$lang['Emoticons'] = '�̸�Ƽ��';
$lang['More_emoticons'] = '�̸�Ƽ�� ����';

$lang['Font_color'] = '�۲û�';
$lang['color_default'] = '�ʱⰪ';
$lang['color_dark_red'] = '��ο� ����';
$lang['color_red'] = '����';
$lang['color_orange'] = '��������';
$lang['color_brown'] = '����';
$lang['color_yellow'] = '�����';
$lang['color_green'] = '���';
$lang['color_olive'] = '�ø����';
$lang['color_cyan'] = '�ϴû�';
$lang['color_blue'] = 'û��';
$lang['color_dark_blue'] = '��ο� û��';
$lang['color_indigo'] = '����';
$lang['color_violet'] = '���ֻ�';
$lang['color_white'] = '���';
$lang['color_black'] = '���';

$lang['Font_size'] = '�۲� ũ��';
$lang['font_tiny'] = '�����۰�';
$lang['font_small'] = '�۰�';
$lang['font_normal'] = '����';
$lang['font_large'] = 'ũ��';
$lang['font_huge'] = '����ũ��';

$lang['Close_Tags'] = '�±� �ݱ�';
$lang['Styles_tip'] = '��: ��Ÿ���� ���õ� ���ڿ� ��� ������ �����մϴ�';


//
// Private Messaging
//
$lang['Private_Messaging'] = '����';

$lang['Login_check_pm'] = '������ Ȯ���Ϸ��� �α����Ͻʽÿ�';
$lang['New_pms'] = '���ο� ����(%d)'; // You have 2 new messages
$lang['New_pm'] = '���ο� ����(%d)'; // You have 1 new message
$lang['No_new_pm'] = '���ο� ����(0)';
$lang['Unread_pms'] = '���� ���� ����(%d)';
$lang['Unread_pm'] = '���� ���� ����(%d)';
$lang['No_unread_pm'] = '���� ���� ����(0)';
$lang['You_new_pm'] = '���ο� ����';
$lang['You_new_pms'] = '���ο� ����';
$lang['You_no_new_pm'] = '���ο� ����(0)';

$lang['Unread_message'] = '���� ���� ����';
$lang['Read_message'] = '���� ����';

$lang['Read_pm'] = '���� �б�';
$lang['Post_new_pm'] = '�� ���� ����';
$lang['Post_reply_pm'] = '������ �亯';
$lang['Post_quote_pm'] = '���� �ο�';
$lang['Edit_pm'] = '���� ����';

$lang['Inbox'] = '���� ������';
$lang['Outbox'] = '���� ������';
$lang['Savebox'] = '���� ������';
$lang['Sentbox'] = '���� ������';
$lang['Flag'] = '����Ȯ��';
$lang['Subject'] = '����';
$lang['From'] = '������';
$lang['To'] = '�޴���';
$lang['Date'] = '��¥';
$lang['Mark'] = 'ǥ��';
$lang['Sent'] = '������';
$lang['Saved'] = '�����';
$lang['Delete_marked'] = '����';
$lang['Delete_all'] = '���� ����';
$lang['Save_marked'] = '����';
$lang['Save_message'] = '����';
$lang['Delete_message'] = '����';

$lang['Display_messages'] = '���� ����'; // Followed by number of days/weeks/months
$lang['All_Messages'] = '��� ����';

$lang['No_messages_folder'] = '������ �����ϴ�';

$lang['PM_disabled'] = '�� ����Ʈ������ ������ ����Ҽ� ������ �����Ǿ� �ֽ��ϴ�';
$lang['Cannot_send_privmsg'] = '��ڰ� ������ ���� ������ ����� ���� ���ҽ��ϴ�';
$lang['No_to_user'] = '������ �������� ID�� �����Ͻʽÿ�';
$lang['No_such_user'] = '�������� �ʾҰų� �������� �ʴ� ������Դϴ�';

$lang['Disable_HTML_pm'] = '�� ������ HTML ������� ����';
$lang['Disable_BBCode_pm'] = '�� ������ BBCode ������� ����';
$lang['Disable_Smilies_pm'] = '�� ������ ������ ������� ����';

$lang['Message_sent'] = '������ ���������ϴ�';

$lang['Click_return_inbox'] = '���� ���������� ������ %s<font color=#0072BC>����</font>%s�� Ŭ���ϼ���';
$lang['Click_return_index'] = '�ε����� ������ %s<font color=#0072BC>����</font>%s�� Ŭ���ϼ���';

$lang['Send_a_new_message'] = '���ο� ���� ������';
$lang['Send_a_reply'] = '������ ���� ���';
$lang['Edit_message'] = '���� ����';

$lang['Notification_subject'] = '���ο� ������ �����߽��ϴ�';

$lang['Find_username'] = 'ID ã��';
$lang['Find'] = 'ã��';
$lang['No_match'] = 'ã�� ����';

$lang['No_post_id'] = '�۹�ȣ�� �������� �ʾ���';
$lang['No_such_folder'] = '�������� �ʴ� ����';
$lang['No_folder'] = '������ �������� �ʾ���';

$lang['Mark_all'] = '��ü ����';
$lang['Unmark_all'] = '���� ����';

$lang['Confirm_delete_pm'] = '�� ������ �����ϰڽ��ϱ�?';
$lang['Confirm_delete_pms'] = '�� �������� �����ϰڽ��ϱ�?';

$lang['Inbox_size'] = '���� �������� %d%% á���ϴ�'; // eg. Your Inbox is 50% full
$lang['Sentbox_size'] = '���� �������� %d%% á���ϴ�';
$lang['Savebox_size'] = '���� �������� %d%% á���ϴ�';

$lang['Click_view_privmsg'] = '���� ���������� ������ %s<font color=#0072BC>����</font>%s�� Ŭ���Ͻʽÿ�';


//
// Profiles/Registration
//
$lang['Viewing_user_profile'] = '%s �� ����� ����'; // %s is username
$lang['About_user'] = '%s���� ����� �����Դϴ�'; // %s is username

$lang['Preferences'] = '����';
$lang['Items_required'] = ' * �� ǥ�õ� �κ��� �ʼ� �׸��Դϴ�';
$lang['Registration_info'] = '��� ����';
$lang['Profile_info'] = '���� ����';
$lang['Profile_info_warn'] = '������ ����';
$lang['Avatar_panel'] = '�ƹ�Ÿ ������';
$lang['Avatar_gallery'] = '�ƹ�Ÿ ����';

$lang['Website'] = 'Ȩ������';
$lang['Location'] = '�ּ�';
$lang['Contact'] = '����ó';
$lang['Email_address'] = 'E-mail';
$lang['Email'] = 'E-mail';
$lang['Send_private_message'] = '���� ������';
$lang['Hidden_email'] = '[ ���� ]';
$lang['Search_user_posts'] = '�� ������� �� ã��';
$lang['Interests'] = '���ɻ�';
$lang['Occupation'] = '����';
$lang['Poster_rank'] = '���';

$lang['Total_posts'] = '�� �ۼ�';
$lang['User_post_pct_stats'] = '������ %.2f%%'; // 1.25% of total
$lang['User_post_day_stats'] = '����� %.2f ��'; // 1.5 posts per day
$lang['Search_user_posts'] = '%s���� �ø� �� ��� ã��'; // Find all posts by username

$lang['No_user_id_specified'] = '�������� �ʾҰų� �������� �ʴ� ������Դϴ�';
$lang['Wrong_Profile'] = 'Ÿ���� ���� ������ ������ �� �����ϴ�.';

$lang['Only_one_avatar'] = '���� �� ������ �ƹ�Ÿ���� ������ �� �ֽ��ϴ�';
$lang['File_no_data'] = '������ URL���� �ƹ��� �����͵� �����ϴ�';
$lang['No_connection_URL'] = '������ URL�� ������ �� �����ϴ�';
$lang['Incomplete_URL'] = 'URL�� ��ȿ���� �ʽ��ϴ�';
$lang['Wrong_remote_avatar_format'] = '���� �ƹ�Ÿ�� URL�� ��ȿ���� �ʽ��ϴ�';
$lang['No_send_account_inactive'] = '������ ���� �������̱� ������ ��й�ȣ�� ������ �����ϴ�. �ڼ��� ������ ��ڿ��� �����Ͻʽÿ�';

$lang['Always_smile'] = '�׻� ������ ���';
$lang['Always_html'] = '�׻� HTML ���';
$lang['Always_bbcode'] = '�׻� BBCode ���';
$lang['Always_add_sig'] = '�׻� ���� ÷��';
$lang['Always_notify'] = '�׻� ��۽� �뺸';
$lang['Always_notify_explain'] = '���� �ø� ������ ���� ����� ������ E-mail ������. ���� �ø� �� ���� ������';

$lang['Board_style'] = '����Ʈ ����';
$lang['Board_lang'] = '����Ʈ ���';
$lang['No_themes'] = '�����ͺ��̽��� ���� ����';
$lang['Timezone'] = '�ð���';
$lang['Date_format'] = '��¥ ����';
$lang['Date_format_explain'] = '���� ������ PHP <a href=\'http://www.php.net/date\' target=\'_other\'>date()</a>�� ������ ����Դϴ�';
$lang['Signature'] = '����';
$lang['Signature_explain'] = '�̰��� �ø��� �ۿ� ÷�ε� ���� �����Դϴ�. ������ %d �����Դϴ�';
$lang['Public_view_email'] = '�׻� �� E-mail �ּ� ���̱�';

$lang['Current_password'] = '���� ��й�ȣ';
$lang['New_password'] = '�� ��й�ȣ';
$lang['Confirm_password'] = '��й�ȣ Ȯ��';
$lang['Confirm_password_explain'] = '��й�ȣ�� E-mail �ּҸ� �ٲٷ��� ���� ��й�ȣ�� Ȯ���ؾ� �մϴ�';
$lang['password_if_changed'] = '�� ��й�ȣ�� �Է��ϼ���';
$lang['password_confirm_if_changed'] = '���� �� ��й�ȣ�� �ٽ� �Է��ϼ���';

$lang['Avatar'] = '�ƹ�Ÿ';
$lang['Avatar_explain'] = '�ڽ��� ǥ���ϴ� ���� �׷��� �̹����� �����ݴϴ�. �ѹ��� �ϳ��� �̹����� ���ǰ� �������� %d �ȼ�, ���ѳ��̴� %d �ȼ��̸� ���� ũ�� ������  %dkB �Դϴ�.';
$lang['Upload_Avatar_file'] = '�� ��ǻ�ͷκ��� �ƹ�Ÿ ���ε�';
$lang['Upload_Avatar_URL'] = 'URL�� �ƹ�Ÿ ���ε�';
$lang['Upload_Avatar_URL_explain'] = '�ƹ�Ÿ �̹����� �ִ� URL�� �Է��ϼ���, �� ����Ʈ�� ����˴ϴ�.';
$lang['Pick_local_Avatar'] = '�ƹ�Ÿ �������� �����ϱ�';
$lang['Link_remote_Avatar'] = '�ٸ� ����Ʈ�� �ƹ�Ÿ ��ũ';
$lang['Link_remote_Avatar_explain'] = '��ũ�Ϸ��� �ƹ�Ÿ �̹����� �ִ� URL�� �Է��ϼ���.';
$lang['Avatar_URL'] = '�ƹ�Ÿ �̹��� URL';
$lang['Select_from_gallery'] = '�ƹ�Ÿ �������� ����';
$lang['View_avatar_gallery'] = '�ƹ�Ÿ ������ ����';

$lang['Select_avatar'] = '�ƹ�Ÿ ����';
$lang['Return_profile'] = '�ƹ�Ÿ ���';
$lang['Select_category'] = 'ī�װ� ����';

$lang['Delete_Image'] = '�̹��� ����';
$lang['Current_Image'] = '���� �̹���';

$lang['Notify_on_privmsg'] = '���ο� ������ ���� E-mail�� �뺸�ϱ�';
$lang['Popup_on_privmsg'] = '���ο� ������ ���� �˾�â ����';
$lang['Popup_on_privmsg_explain'] = '���ο� ������ ������ ������ ����Ʈ ���ӽ� �˾�â�� ��ϴ�';
$lang['Hide_user'] = '���� ���� �����';

$lang['Profile_updated'] = '���� ������ ������Ʈ�Ǿ����ϴ�';
$lang['Profile_updated_inactive'] = '���� ������ ������Ʈ�Ǿ����ϴٸ� �߿��� �������� ������ �����Ǿ����ϴ�. E-mail�� Ȯ���Ͽ� ������ �ٽ� ����� �մϴ�. ���� ����� ��ġ�� �ʿ��� ���̶�� ��ڰ� �ʿ��� ��ġ�� ���� ������ ��ٸ��ʽÿ�<br/>E-mail�� �̿��Ͽ� ������ �����ϱ⶧���� E-mail�� �������� ��� �������� �޾ƾ� �մϴ�. �ֱٿ� ������ E-mail�� ���������� ���޵Ǿ������Դϴ�. ������ ���������� Ȯ���� �ֽʽÿ�.';

$lang['Password_mismatch'] = '�Է��� ��й�ȣ�� ��ġ���� �ʽ��ϴ�';
$lang['Current_password_mismatch'] = '�Է��� ���� ��й�ȣ�� �����ͺ��̽��� ����� �Ͱ� ��ġ���� �ʽ��ϴ�';
$lang['Password_long'] = '��й�ȣ�� 32�� �̳����� �մϴ�';
$lang['Too_many_registers'] = '����� �����Ͽ����ϴ�. ���߿� �ٽ� �õ��� �ּ���.';
$lang['Username_taken'] = '�̹� �����ϼ̰ų� �̹� ������� ID�Դϴ�';
$lang['Username_invalid'] = 'ID�� ���� �� ���� ���ڸ� �����̽��ϴ�';
$lang['Username_disallowed'] = '������ �ʴ� ID�Դϴ�';
$lang['Email_taken'] = 'E-mail �ּҰ� �̹� ��ϵ� ������� ���Դϴ�';
$lang['Email_banned'] = '������ E-mail �ּ��Դϴ�';
$lang['Email_invalid'] = '��ȿ���� ���� E-mail �ּ��Դϴ�';
$lang['Signature_too_long'] = '������ �ʹ� ��ϴ�';
$lang['Fields_empty'] = '�ʼ������� �����Ͽ��� �մϴ�';
$lang['Avatar_filetype'] = '�ƹ�Ÿ�� .jpg, .gif Ȥ�� .png ���� �մϴ�';
$lang['Avatar_filesize'] = '�ƹ�Ÿ �̹����� ���� ũ��� %d kB ���� �۾ƾ� �մϴ�'; // The avatar image file size must be less than 6 kB
$lang['Avatar_imagesize'] = '�ƹ�Ÿ�� ũ��� ���� %d �ȼ�, ���� %d �ȼ����� �۾ƾ� �մϴ�';

$lang['Welcome_subject'] = '%s�� ���Ű��� ȯ���մϴ�'; // Welcome to my.com forums
$lang['New_account_subject'] = '���ο� ����� ����';
$lang['Account_activated_subject'] = '������ Ȱ��ȭ�Ǿ���';

$lang['Account_added'] = '����� �ּż� �����մϴ�, ������ ���� ����������Ƿ� ID�� ��й�ȣ�� �̿��Ͽ� �α����Ͻʽÿ�';
$lang['Account_inactive'] = '������ ����������ϴٸ�, ���� ������ �ؾ� �մϴ�, ����Ű�� ������ E-mail �ּҷ� ���������Ƿ� E-mail�� Ȯ���Ͽ� ������ �������Ͻʽÿ�.';
$lang['Account_inactive_admin'] = '������ ����������ϴٸ�, �����ڰ� ������ �����ؾ� ����Ͻ� �� �ֽ��ϴ�. �����ڿ��� E-mail�� ���������� ������ ���εǸ� �뺸�� �� ���Դϴ�';
$lang['Account_active'] = '������ �����Ǿ����ϴ�. ����� �ּż� �����մϴ�';
$lang['Account_active_admin'] = '������ �����Ǿ����ϴ�';
$lang['Reactivate'] = '������ �������Ͻʽÿ�!';
$lang['Already_activated'] = '�̹� ���� ������ �ϼ̽��ϴ�';
$lang['COPPA'] = '������ ����������� ������ �ʿ�� �ϹǷ� �ڼ��� ������ E-mail�� Ȯ���� �ֽʽÿ�.';

$lang['Registration'] = '��� ���� ����';
$lang['Reg_agreement'] = '�̰��� ������ ���İ� ������ ��ȯ�ϱ� ���� ���Դϴ�. �̰��� ������ �����Ͻ� �� ������ ���Խ� �ʿ�� �ϴ� �ʼ� ������ �̰����� ����Ͻ� ID�� ��й�ȣ, �׸��� E-mail �ּ��̰�, �� �̿��� �������� ������ ���ÿ� ���� �������� �����ŵ� �̿뿡 �ƹ��� ������ ������ Ư�� �������� <strong>E-mail �ּҴ� ����Ʈ �� �������� ���� ������� �ʽ��ϴ�</strong>. <p>��� ����ڿ��Դ� �뷫 ������ ���� ����� �⺻������ �ο��ǹǷ� ����Ʈ�� �ξ� ȿ�����̰� ���ϰ� �̿��Ͻ� �� �ֽ��ϴ�.</p> <li><strong>��� �뺸 ���</strong>: ������ �ø� �ۿ� ����� �ö�� ��� �ٷ� E-mail�� ���� �뺸���� �� �ֽ��ϴ�.</li><li><strong>���ο� �� ǥ�� ���</strong>: ������ �湮 ���� ���� �ö�� �۸� ��� ���� �� �ֽ��ϴ�.</li><li><strong>���� �� �ƹ�Ÿ</strong>: ������� ������ �츱 �� �ִ� ���� ��ɰ� �ƹ�Ÿ�� ���� ������ �� �ֽ��ϴ�.</li><li>�� �ܿ��� ����ڰ� ���� ��ȯ �� ����Ʈ �̿뿡 ���� �������� ���׵��� ������ �� �ֽ��ϴ�.</li> <p>������ ����ϴ� ���̳� ����, �弳 �� ��Ÿ ����Ʈ ���ݿ� ���� �ʴ� �۵��� ���� �뺸���� ��� Ȥ�� �� ����Ʈ ��ڿ� ���� ������ ���� �ֽ��ϴ�. �̴� �̰��� ���� ���� ȯ������ ����� ���� �ּ����� ����̹Ƿ� ���� ���Ǹ� ���Ѽ� �ҹ̽����� ���� ������ �ʵ��� �Բ� ���� �ֽñ⸦ ��Ź�帳�ϴ�.</p>';

$lang['Agree_under_13'] = '������ 13�� <b>�̸�</b>�̸� ��� ���ǿ� �����մϴ�';
$lang['Agree_over_13'] = '���ǿ� �����մϴ�';
$lang['Agree_not'] = '���ǿ� �������� �ʽ��ϴ�';

$lang['Wrong_activation'] = '����Ű�� ��ġ���� �ʽ��ϴ�';
$lang['Send_password'] = '<b>ID�� �� ��й�ȣ �ޱ�</b><br><br>���Խ� �Է��� �����ּҸ� �Է��Ͻø�<br>���Ϸ� ID/����й�ȣ��  �����մϴ�';
$lang['Password_updated'] = 'ID�� �� ��й�ȣ�� ���۵Ǿ����ϴ� E-mail�� Ȯ���Ͻʽÿ�';
$lang['No_email_match'] = '������ E-mail �ּҰ� ��ġ���� �ʽ��ϴ�';
$lang['New_password_activation'] = '�� ��й�ȣ ����';
$lang['Password_activated'] = '������ �������Ǿ����ϴ�. E-mail�� ���� ��й�ȣ�� �α����Ͻʽÿ�';

$lang['Send_email_msg'] = 'E-mail';
$lang['No_user_specified'] = '����ڰ� �������� �ʾҽ��ϴ�';
$lang['User_prevent_email'] = '�� ����ڴ� E-mail ������ �ź��ϰ� �ֽ��ϴ�. ����� ���� �����⸦ �õ��Ͻʽÿ�';
$lang['User_not_exist'] = '�������� �ʴ� ����� �Դϴ�';
$lang['CC_email'] = 'E-mail�� �ڽſ��Ե� ������';
$lang['Email_message_desc'] = '�� ������ ���� ���ڷ� �������� HTML�̳� BBCode�� �������� �ʽ��ϴ�. ȸ�� �ּҴ� ������ E-mail �ּҷ� �˴ϴ�.';
$lang['Flood_email_limit'] = '���� �� �ٸ� E-mail�� ���� �� �����ϴ�. ���߿� �ٽ� �õ��� ������';
$lang['Recipient'] = '������';
$lang['Email_sent'] = 'E-mail�� ���������ϴ�';
$lang['Send_email'] = 'E-mail ������';
$lang['Empty_subject_email'] = 'E-mail�� ������ �����ϼ���';
$lang['Empty_message_email'] = 'E-mail�� ������ �Է��ϼ���';

//
// Visual confirmation system strings
//
$lang['Confirm_code_wrong'] = '�����ڵ尡 �߸��Ǿ����ϴ�.';
$lang['Too_many_registers'] = '��Ͻõ� Ƚ���� �ʰ��߽��ϴ�. ���߿� �ٽ� �õ��� �ֽʽÿ�.';
$lang['Confirm_code_impaired'] = '�ڵ尡 ������ ���� ��� %s������%s���� ������ �����ּ���.';
$lang['Confirm_code'] = '�����ڵ�(��ҹ��� ����)';
$lang['Confirm_code_explain'] = '�׸��ӿ� ���̴� �ڵ带 �Է��� �ּ���. ����0�� �缱�� �׾��� �ֽ��ϴ�. ����O�� ������ �ּ���.';




//
// Memberslist
//
$lang['Select_sort_method'] = '���� �׸�';
$lang['Sort'] = '����';
$lang['Sort_Top_Ten'] = '�ۼ��� 10����';
$lang['Sort_Joined'] = '������';
$lang['Sort_Username'] = 'ID';
$lang['Sort_Location'] = '��ġ';
$lang['Sort_Posts'] = '�ѱۼ�';
$lang['Sort_Email'] = 'E-mail';
$lang['Sort_Website'] = '������Ʈ';
$lang['Sort_Ascending'] = '��������';
$lang['Sort_Descending'] = '��������';
$lang['Order'] = '���� ���';


//
// Group control panel
//
$lang['Group_Control_Panel'] = '�׷� ������';
$lang['Group_member_details'] = '�׷� ����';
$lang['Group_member_join'] = '�׷� ����';

$lang['Group_Information'] = '�׷� ����';
$lang['Group_name'] = '�׷� �̸�';
$lang['Group_description'] = '�׷� ����';
$lang['Group_membership'] = '�׷� ȸ����';
$lang['Group_Members'] = '�׷� ȸ��';
$lang['Group_Moderator'] = '�׷� ������';
$lang['Pending_members'] = '������� ȸ��';

$lang['Group_type'] = '�׷� ����';
$lang['Group_open'] = '���� �׷�';
$lang['Group_closed'] = '���� �׷�';
$lang['Group_hidden'] = '��� �׷�';

$lang['Current_memberships'] = '���Ե� �׷�';
$lang['Non_member_groups'] = '���Ե��� ���� �׷�';
$lang['Memberships_pending'] = '���� ������� �׷�';

$lang['No_groups_exist'] = '�����ϴ� �׷��� ����';
$lang['Group_not_exist'] = '�������� �ʴ� �׷�';

$lang['Join_group'] = '�׷� ����';
$lang['No_group_members'] = '�� �׷쿡�� ȸ���� �����ϴ�';
$lang['Group_hidden_members'] = '�� �׷��� ������׷��Դϴ�, ȸ�� �ڰ��� �� �� �����ϴ�';
$lang['No_pending_group_members'] = '�� �׷��� ������� ȸ���� �����ϴ�';
$lang['Group_joined'] = '�� �׷쿡 ���������� ���� ��û�Ǿ����ϴ�.<br />�׷� �����ڰ� ������ �����ϸ� �뺸�� �� ���Դϴ�';
$lang['Group_request'] = '�׷� ���� ��û�� �����Ǿ����ϴ�';
$lang['Group_approved'] = 'ȸ�� ���� ��û�� ���εǾ����ϴ�';
$lang['Group_added'] = '�� �׷쿡 ���ԵǼ̽��ϴ�';
$lang['Already_member_group'] = '�̹� �� �׷� ȸ���Դϴ�';
$lang['User_is_member_group'] = '����ڴ� �̹� �� �׷��� ȸ���Դϴ�';
$lang['Group_type_updated'] = '�׷� ���� ������Ʈ ����';

$lang['Could_not_add_user'] = '�������� �ʴ� �����';
$lang['Could_not_anon_user'] = '�������� �׷� ȸ������ �� �� ����';

$lang['Confirm_unsub'] = '�� �׷쿡�� Ż���ϰڽ��ϱ�?';
$lang['Confirm_unsub_pending'] = '���� ��û�� ���� ���ε��� �ʾҽ��ϴ�, ������ ����ϰڽ��ϱ�?';

$lang['Unsub_success'] = '�� �׷쿡�� Ż���ϼ̽��ϴ�.';

$lang['Approve_selected'] = '���õ� ����� ����';
$lang['Deny_selected'] = '���õ� ����� �ź�';
$lang['Not_logged_in'] = '�׷쿡 �����Ϸ��� �α����ؾ� �մϴ�.';
$lang['Remove_selected'] = '���õ� ����� ����';
$lang['Add_member'] = 'ȸ�� �߰�';
$lang['Not_group_moderator'] = '�� �׷��� �����ڰ� �ƴϹǷ� �� ����� ������ �� �����ϴ�.';

$lang['Login_to_join'] = '�׷쿡 �����ϰų� ȸ���� �����Ϸ��� �α����ϼ���';
$lang['This_open_group'] = '���� �׷��Դϴ�, �����Ϸ��� Ŭ���ϼ���';
$lang['This_closed_group'] = '���� �׷��̹Ƿ� ���̻� ȸ���� ���� �ʽ��ϴ�';
$lang['This_hidden_group'] = '��� �׷��̹Ƿ� �ڵ� ȸ���߰��� ���� �ʽ��ϴ�';
$lang['Member_this_group'] = '���ϴ� �� �׷��� ȸ���Դϴ�';
$lang['Pending_this_group'] = '������ ȸ�� �ڰ��� ���� ���Դϴ� ���εɶ����� ����� �ּ���';
$lang['Are_group_moderator'] = '���ϴ� �׷� �������Դϴ�';
$lang['None'] = 'None';

$lang['Subscribe'] = '��û';
$lang['Unsubscribe'] = '���';
$lang['View_Information'] = '���� ����';


//
// Search
//
$lang['Search_query'] = '�˻�';
$lang['Search_options'] = '�˻� �ɼ�';

$lang['Search_keywords'] = 'Ű����� �˻�';
$lang['Search_keywords_explain'] = ' X OR Y : X �Ǵ� Y, �� �߿� �ϳ� �̻� �����ϴ� ���<br/>X AND Y : X�� Y�� �ݵ�� �����ؾ� �ϴ� ���<br/>NOT X and Y : X�� �������� �ʰ� Y�� �����ϴ� ���<br/> X* : X�� �����ϰ� X�� �����ϴ� �ܾ�(��:Abc*)';
$lang['Search_author'] = '�ۼ��ڷ� �˻�';
$lang['Search_author_explain'] = '�κ� ��ġ�ϴ� �˻���(��:Abc*)';

$lang['Search_for_any'] = '�� �ܾ�� ����';
$lang['Search_for_all'] = '��� �ܾ� ����';
$lang['Search_title_msg'] = '��ü(����+����+��Ÿ)';
$lang['Search_msg_only'] = '����';

$lang['Return_first'] = '�̸�����'; // followed by xxx characters in a select box
$lang['characters_posts'] = '(�Խù��� ���ڼ�)';

$lang['Search_previous'] = '�˻� ���'; // followed by days, weeks, months, year, all in a select box

$lang['Sort_by'] = '���� ���';
$lang['Sort_Time'] = '�ø� �ð�';
$lang['Sort_Post_Subject'] = '�亯�� ����';
$lang['Sort_Topic_Title'] = '������ ����';
$lang['Sort_Author'] = '�ۼ���';
$lang['Sort_Forum'] = '�޴�';//

$lang['Display_results'] = '��� ���̱�';
$lang['All_available'] = '��� ���';
$lang['No_searchable_forums'] = '�� ����Ʈ�� �ִ� �޴��� �˻��� ������ �����ϴ�';

$lang['No_search_match'] = '�˻� ���ǿ� �´� ����� �����ϴ�';
$lang['Found_search_match'] = '�˻� ��� %d �� ��ġ'; // eg. Search found 1 match
$lang['Found_search_matches'] = '�˻� ��� %d �� ��ġ'; // eg. Search found 24 matches

$lang['Close_window'] = 'â�ݱ�';


//
// Auth related entries
//
// Note the %s will be replaced with one of the following 'user' arrays
$lang['Sorry_auth_announce'] = '�� �޴��� ���� %s �� ���������� �ø� �� �ֽ��ϴ�';
$lang['Sorry_auth_sticky'] = '�� �޴��� ���� %s �� �ʵ������� �ø� �� �ֽ��ϴ�';
$lang['Sorry_auth_read'] = '�� �޴��� ���� %s �� ���� ���� �� �ֽ��ϴ�';
$lang['Sorry_auth_post'] = '�� �޴��� ���� %s �� ���� �ø� �� �ֽ��ϴ�';
$lang['Sorry_auth_reply'] = '�� �޴��� ���� %s �� ����� �ø� �� �ֽ��ϴ�';
$lang['Sorry_auth_edit'] = '�� �޴��� ���� %s �� �ø� ���� ������ �� �ֽ��ϴ�';
$lang['Sorry_auth_delete'] = '�� �޴��� ���� %s �� �ø� ���� ������ �� �ֽ��ϴ�';
$lang['Sorry_auth_vote'] = '�� �޴��� ���� %s �� ��ǥ�� ������ �� �ֽ��ϴ�';

// These replace the %s in the above strings
$lang['Auth_Anonymous_Users'] = '<b>�մ�</b>';
$lang['Auth_Registered_Users'] = '<b>��� �����</b>';
$lang['Auth_Users_granted_access'] = '<b>�㰡�� ���� �����</b>';
$lang['Auth_Moderators'] = '<b>������</b>';
$lang['Auth_Administrators'] = '<b>���</b>';

$lang['Not_Moderator'] = '���ϴ� �� �޴��� �����ڰ� �ƴմϴ�';
$lang['Not_Authorised'] = '���� ����';

$lang['You_been_banned'] = '���ϴ� �� ����Ʈ���� ������߽��ϴ�<br />�ڼ��� ������ �ý��� �����ڳ� �޴� ��ڿ��� �����ϼ���';


//
// Viewonline
//
$lang['Reg_users_zero_online'] = '��ϵ� ����ڰ� ������ '; // There ae 5 Registered and
$lang['Reg_users_online'] = '��ϵ� ����ڰ� %d ���̸� '; // There ae 5 Registered and
$lang['Reg_user_online'] = '��ϵ� ����ڰ� %d ���̸�'; // There ae 5 Registered and
$lang['Hidden_users_zero_online'] = '����� �¶��� ����� ����'; // 6 Hidden users online
$lang['Hidden_users_online'] = '����� �¶��� ����� %d ��'; // 6 Hidden users online
$lang['Hidden_user_online'] = '����� �¶��� ����� %d ��'; // 6 Hidden users online
$lang['Guest_users_online'] = '�������� �մ� %d ��'; // There are 10 Guest users online
$lang['Guest_users_zero_online'] = '�������� �մ� ����'; // There are 10 Guest users online
$lang['Guest_user_online'] = '�������� �մ� %d ��'; // There is 1 Guest user online
$lang['No_users_browsing'] = '���� ����ڰ� �����ϴ�';

$lang['Online_explain'] = '�� �����ʹ� ���� 5�� ���� Ȱ���� ����ڵ鿡 ���� ���Դϴ�';

$lang['Forum_Location'] = '���� ��ġ';
$lang['Last_updated'] = '������ ������Ʈ';

$lang['Forum_index'] = '����Ʈ �ε���';
$lang['Logging_on'] = '�α���';
$lang['Posting_message'] = '�Խù� �ø��� ��';
$lang['Searching_forums'] = '�޴� �˻� ��';
$lang['Viewing_profile'] = '�������� ���� ��';
$lang['Viewing_online'] = '�¶��� ����� ���� ��';
$lang['Viewing_member_list'] = 'ȸ�� ��� ���� ��';
$lang['Viewing_priv_msgs'] = '����� ���� ���� ��';
$lang['Viewing_FAQ'] = 'FAQ ���� ��';


//
// Moderator Control Panel
//
$lang['Mod_CP'] = '������ ������';
$lang['Mod_CP_explain'] = '�Խù��� �Ѳ����� ������ �� �ֽ��ϴ�.';

$lang['Select'] = '����';
$lang['Delete'] = '����';
$lang['Move'] = '�̵�';
$lang['Lock'] = '���';
$lang['Unlock'] = '����';

$lang['Topics_Removed'] = '���õ� ������ ���������� �����ͺ��̽����� �����Ǿ����ϴ�.';
$lang['Topics_Locked'] = '���õ� ������ �����ϴ�';
$lang['Topics_Moved'] = '���õ� ������ �̵��Ǿ����ϴ�';
$lang['Topics_Unlocked'] = '���õ� ������ �����ϴ�';
$lang['No_Topics_Moved'] = '�̵��� ������ �����ϴ�';

$lang['Confirm_delete_topic'] = '�����Ͻðڽ��ϱ�?';
$lang['Confirm_lock_topic'] = '���õ� ������  ��׽ðڽ��ϱ�?';
$lang['Confirm_unlock_topic'] = '���õ� ������ �����Ͻðڽ��ϱ�?';
$lang['Confirm_move_topic'] = '<font color=red>������ �ٸ� �޴� ���·� �̵��ϸ� �����Ͱ� ���ǵ� �� �ֽ��ϴ�.<br>ī�װ��δ� �̵��Ͻ� �� �����ϴ�.</font><br><br>�̵��Ͻðڽ��ϱ�?';

$lang['Move_to_forum'] = '�޴��� �̵�';
$lang['Leave_shadow_topic'] = '���� �޴��� �׸��� ���� �����.';

$lang['Split_Topic'] = '���� �и� ������';
$lang['Split_Topic_explain'] = '�Ʒ� ����� �̿��� �ø� ���� ���������� �����ϰų� ���� ��ġ���� �и����� ������ �ΰ��� �и��� �� �ֽ��ϴ�';
$lang['Split_title'] = '�� ���� ����';
$lang['Split_forum'] = '�� ������ ���� �޴�';
$lang['Split_posts'] = '���õ� ���� �и�';
$lang['Split_after'] = '���õ� �۷� ���� �и�';
$lang['Topic_split'] = '���õ� ������ ���������� �и��Ǿ����ϴ�';

$lang['Too_many_error'] = '���� �ʹ� ���� �����߽��ϴ�. ������ �и��Ϸ��� ���� �ϳ��� �����ؾ� �մϴ�!';

$lang['None_selected'] = '�� �۾��� �ϱ� ���� ������ ���õ��� �ʾҽ��ϴ�. �ǵ��ư��� �ּ��� �ϳ��� �����Ͻʽÿ�.';
$lang['New_forum'] = '�� �޴�';

$lang['This_posts_IP'] = '�� �ۿ� ���� IP';
$lang['Other_IP_this_user'] = '�� ����ڰ� ���� �ø� �ٸ� IP �ּ�';
$lang['Users_this_IP'] = '�� IP ���� ���� �ø��� �����';
$lang['IP_info'] = 'IP ����';
$lang['Lookup_IP'] = 'IP ã��';


//
// Timezones ... for display on each page
//
$lang['All_times'] = '�ð���: %s'; // eg. All times are GMT - 12 Hours (times from next block)

$lang['-12'] = 'GMT - 12 �ð�';
$lang['-11'] = 'GMT - 11 �ð�';
$lang['-10'] = 'GMT - 10 �ð�';
$lang['-9'] = 'GMT - 9 �ð�';
$lang['-8'] = 'GMT - 8 �ð�';
$lang['-7'] = 'GMT - 7 �ð�';
$lang['-6'] = 'GMT - 6 �ð�';
$lang['-5'] = 'GMT - 5 �ð�';
$lang['-4'] = 'GMT - 4 �ð�';
$lang['-3.5'] = 'GMT - 3.5 �ð�';
$lang['-3'] = 'GMT - 3 �ð�';
$lang['-2'] = 'GMT - 2 �ð�';
$lang['-1'] = 'GMT - 1 �ð�';
$lang['0'] = 'GMT';
$lang['1'] = 'GMT + 1 �ð�';
$lang['2'] = 'GMT + 2 �ð�';
$lang['3'] = 'GMT + 3 �ð�';
$lang['3.5'] = 'GMT + 3.5 �ð�';
$lang['4'] = 'GMT + 4 �ð�';
$lang['4.5'] = 'GMT + 4.5 �ð�';
$lang['5'] = 'GMT + 5 �ð�';
$lang['5.5'] = 'GMT + 5.5 �ð�';
$lang['6'] = 'GMT + 6 �ð�';
$lang['6.5'] = 'GMT + 6.5 �ð�';
$lang['7'] = 'GMT + 7 �ð�';
$lang['8'] = 'GMT + 8 �ð�';
$lang['9'] = 'GMT + 9 �ð�(�ѱ�)';
$lang['9.5'] = 'GMT + 9.5 �ð�';
$lang['10'] = 'GMT + 10 �ð�';
$lang['11'] = 'GMT + 11 �ð�';
$lang['12'] = 'GMT + 12 �ð�';
$lang['13'] = 'GMT + 13 �ð�';

// These are displayed in the timezone select box
$lang['tz']['-12'] = 'GMT - 12 �ð�';
$lang['tz']['-11'] = 'GMT - 11 �ð�';
$lang['tz']['-10'] = 'GMT - 10 �ð�';
$lang['tz']['-9'] = 'GMT - 9 �ð�';
$lang['tz']['-8'] = 'GMT - 8 �ð�';
$lang['tz']['-7'] = 'GMT - 7 �ð�';
$lang['tz']['-6'] = 'GMT - 6 �ð�';
$lang['tz']['-5'] = 'GMT - 5 �ð�';
$lang['tz']['-4'] = 'GMT - 4 �ð�';
$lang['tz']['-3.5'] = 'GMT - 3.5 �ð�';
$lang['tz']['-3'] = 'GMT - 3 �ð�';
$lang['tz']['-2'] = 'GMT - 2 �ð�';
$lang['tz']['-1'] = 'GMT - 1 �ð�';
$lang['tz']['0'] = 'GMT';
$lang['tz']['1'] = 'GMT + 1 �ð�';
$lang['tz']['2'] = 'GMT + 2 �ð�';
$lang['tz']['3'] = 'GMT + 3 �ð�';
$lang['tz']['3.5'] = 'GMT + 3.5 �ð�';
$lang['tz']['4'] = 'GMT + 4 �ð�';
$lang['tz']['4.5'] = 'GMT + 4.5 �ð�';
$lang['tz']['5'] = 'GMT + 5 �ð�';
$lang['tz']['5.5'] = 'GMT + 5.5 �ð�';
$lang['tz']['6'] = 'GMT + 6 �ð�';
$lang['tz']['6.5'] = 'GMT + 6.5 �ð�';
$lang['tz']['7'] = 'GMT + 7 �ð�';
$lang['tz']['8'] = 'GMT + 8 �ð�';
$lang['tz']['9'] = 'GMT + 9 �ð�(�ѱ�)';
$lang['tz']['9.5'] = 'GMT + 9.5 �ð�';
$lang['tz']['10'] = 'GMT + 10 �ð�';
$lang['tz']['11'] = 'GMT + 11 �ð�';
$lang['tz']['12'] = 'GMT + 12 �ð�';

$lang['datetime']['Sunday'] = '�Ͽ���';
$lang['datetime']['Monday'] = '������';
$lang['datetime']['Tuesday'] = 'ȭ����';
$lang['datetime']['Wednesday'] = '������';
$lang['datetime']['Thursday'] = '�����';
$lang['datetime']['Friday'] = '�ݿ���';
$lang['datetime']['Saturday'] = '�����';
$lang['datetime']['Sun'] = '��';
$lang['datetime']['Mon'] = '��';
$lang['datetime']['Tue'] = 'ȭ';
$lang['datetime']['Wed'] = '��';
$lang['datetime']['Thu'] = '��';
$lang['datetime']['Fri'] = '��';
$lang['datetime']['Sat'] = '��';
$lang['datetime']['January'] = '1';
$lang['datetime']['February'] = '2';
$lang['datetime']['March'] = '3';
$lang['datetime']['April'] = '4';
$lang['datetime']['May'] = '5';
$lang['datetime']['June'] = '6';
$lang['datetime']['July'] = '7';
$lang['datetime']['August'] = '8';
$lang['datetime']['September'] = '9';
$lang['datetime']['October'] = '10';
$lang['datetime']['November'] = '11';
$lang['datetime']['December'] = '12';
$lang['datetime']['Jan'] = '1';
$lang['datetime']['Feb'] = '2';
$lang['datetime']['Mar'] = '3';
$lang['datetime']['Apr'] = '4';
$lang['datetime']['May'] = '5';
$lang['datetime']['Jun'] = '6';
$lang['datetime']['Jul'] = '7';
$lang['datetime']['Aug'] = '8';
$lang['datetime']['Sep'] = '9';
$lang['datetime']['Oct'] = '10';
$lang['datetime']['Nov'] = '11';
$lang['datetime']['Dec'] = '12';

//
// Photo Album Addon v2.x.x by Smartor
//
$lang['Album'] = '�ٹ�';
$lang['Personal_Gallery_Of_User'] = '%s ���ξٹ�';

//
// Errors (not related to a
// specific failure on a page)
//
$lang['Information'] = '����';
$lang['Critical_Information'] = '�߿��� ����';

$lang['General_Error'] = '�Ϲ� ����';
$lang['Critical_Error'] = 'ġ���� ����';
$lang['An_error_occured'] = '������ �߻��߽��ϴ�';
$lang['A_critical_error'] = 'ġ���� ������ �߻��߽��ϴ�';

//
// Smartor's ezPortal
//
$lang['Home'] = 'Home';
$lang['Board_navigation'] = '�޴�';
$lang['Statistics'] = '���';
$lang['total_topics'] = "<br>( �� <b>%s</b>�� ���� )"; // added in v2.1.6
$lang['Comments'] = '�亯';
$lang['Read_Full'] = '���뺸��';
$lang['View_comments'] = '��� ����';
$lang['Post_your_comment'] = '��� ����';
$lang['Welcome'] = '�ȳ��ϼ���!';
$lang['Register_new_account'] = '%sȸ������%s';
$lang['Remember_me'] = '�ڵ��α���';
$lang['View_complete_list'] = 'ȸ�����';
$lang['Poll'] = '��ǥ';
$lang['Login_to_vote'] = '�α��� ���ּ���';
$lang['Vote'] = '��ǥ�ϱ�';
$lang['No_poll'] = '�������� ��ǥ�� �����ϴ�.';
$lang['Newest_pic'] = '���ο� �̹���'; // Album Addon
$lang['Recent_topics'] = '���ο� ����'; // Recent Topics
$lang['Search_at'] = '�˻�'; // Search Block
$lang['Advanced_search'] = '�� �˻�'; // Search Block

//
// Links
//
$lang['links'] = 'Link';

//MsgIcon Mod 
$lang['Msg_Icon_No_Icon'] = '�������� �����ϴ�.'; 

//-- mod : categories hierarchy --------------------------------------------------------------------
//-- add
$lang['Forum_link']					= 'Link�� ��ȯ';
$lang['Forum_link_visited']			= '�� ��ũ�� ��ȸ���� %d ���Դϴ�.';
$lang['Redirect']					= '��ȯ';
$lang['Redirect_to']				= '�������� meta redirection�� �������� ������ %s����%�� Ŭ���� �ּ���.';

$lang['Use_sub_forum']				= 'ī�װ� �Ӽ�';
$lang['Hierarchy_setting']			= 'ī�װ� ���� ����';
$lang['Index_packing_explain']		= 'ī�װ� �Ӽ��� �����Կ� ���� ī�װ��� ���̴� ������ �޶����ϴ�. Full�� �����ϸ� ���� ���� ī�װ��� ���̸�, None�� �����ϸ� ���� ���� ī�װ��� �޴����� �������ϴ�.';
$lang['Medium']						= 'Medium';
$lang['Full']						= 'Full';
$lang['Split_categories']			= '�޴��� ī�װ����� ���̺��� ������ ���̰� ����';
$lang['Use_last_topic_title']		= '�޴� �ε����� �ֱٿ� �ö�� ���� ������ ��Ÿ���ϴ�.';
$lang['Last_topic_title_length']	= '�޴� �ε����� �������� �ֱ� �������� ���ڼ��� ������ �� �ֽ��ϴ�.';
$lang['Sub_level_links']			= 'Index�� Sub-level ��ũ ǥ��';
$lang['Sub_level_links_explain']	= 'ī�װ��� ��ũ�� ���ԵǾ� ���� ��� ������ ������ ���� index�� ��ũ�� �̸� ������ ���� �ֽ��ϴ�.';
$lang['With_pics']					= 'With icons';
$lang['Display_viewonline']			= 'Index�� ������ �ִ� Online���� ����� ������ �����ݴϴ�.';
$lang['Never']						= '�����';
$lang['Root_index_only']			= '����Index�� �������� �����ֱ�';
$lang['Always']						= '�׻� �����ֱ�';
$lang['Subforums']					= ''; // 'Subforums';
//-- fin mod : categories hierarchy ----------------------------------------------------------------

//Fav Mod
$lang['remove_fav_data'] = '�ۺ����Կ��� ���� ������ �� �����ϴ�.';
$lang['insert_fav_data'] = '�ۺ����Կ� ���� �߰��� �� �����ϴ�.';
$lang['no_fav_topic'] = '�ۺ����Կ� ����� ���� �����ϴ�.';
$lang['favorites'] = '�ۺ�����';
$lang['add_fav'] = '�ۺ����Կ� �߰�';
$lang['exist_fav'] = '�̹� �߰��Ͻ� ���Դϴ�.';

//Recent Topics
$lang['last_24h'] = '�ֱ�24�ð�';
$lang['today'] = '����';
$lang['yesterday'] = '����';
$lang['last_week'] = '������';
$lang['last_xdays1'] = '���� ';
$lang['last_xdays2'] = ' ��';
$lang['link'] = '�ֱ� ������';
$lang['show_posts'] = '�Խù� ����:';
$lang['showing_posts'] = '�Խù� ����:';
$lang['day_posts'] = '��';
$lang['last_posts'] = '����';
$lang['Started'] = '';
$lang['Title'] = ' <font size=4>%s</font> �� �Խù� %s'; // %s topics | %s sort method
$lang['xdays'] = ' �ֱ� %s ��'; // %s days
$lang['tday'] = ' ����';
$lang['yday'] = ' ����';
$lang['week'] = ' ���� ��';
$lang['24h'] = ' �ֱ� 24�ð�';
$lang['Replies'] = '�亯';
$lang['Views'] = '��ȸ';

//
// Buddy list
//
$lang['Buddylist'] = 'ģ�����';
$lang['Buddy'] = 'ģ��';
$lang['Add_buddy'] = 'ģ�� �߰�';
$lang['Remove_buddy'] = 'ģ�� ����';
$lang['Buddy_added'] = 'ģ����Ͽ� �߰��Ǿ����ϴ�.';
$lang['Buddy_removed'] = 'ģ����Ͽ��� �����Ǿ����ϴ�.';
$lang['Click_return_page'] = '%s<font color=#0072BC>����</font>%s�� Ŭ���ϸ� ���� �������� ���ư��ϴ�.';
$lang['Confirm_remove_buddy'] = 'ģ����Ͽ��� �����Ͻðڽ��ϱ�?';

$lang['Online'] = '�¶���';
$lang['Offline'] = '��������';
$lang['Buddies_online'] = '�¶��λ� �ִ� ģ��';
$lang['Buddies_offline'] = '�������λ� �ִ� ģ��';
$lang['No_buddies'] = 'ģ����Ͽ� ��ϵ� ����ڰ� �����ϴ�.';
$lang['No_buddies_online'] = '������ ģ���� �����ϴ�.';
$lang['No_buddies_offline'] = '';//�������� ���� ģ���� �����ϴ�.


//-- mod : calendar --------------------------------------------------------------------------------
//-- add
$lang['Calendar']				= 'Calendar';
$lang['Calendar_scheduler']		= 'Scheduler';
$lang['Calendar_event']			= 'Event Calendar';
$lang['Calendar_from_to']		= '%s ~ %s';
$lang['Calendar_time']			= '%s';
$lang['Calendar_duration']		= '���� �Ⱓ';

$lang['Calendar_settings']		= 'Calendar ����';
$lang['Calendar_week_start']	= '������ ���� ����';
$lang['Calendar_header_cells']	= 'ù������ Calendar�� ������ �� ����Ʈ ����� ���̴� Calendar ĭ��(0���� ������ : No display)';
$lang['Calendar_title_length']	= 'Calendar �� ĭ�� �������� ������ ����';
$lang['Calendar_text_length']	= 'Event �̸�����â�� �������� ������ ����(Calendar�� Event�� ���콺�� �÷��� �� �������� �̸����� â)';
$lang['Calendar_display_open']	= 'ù������ ����κп� Calendar�� ���̰� �Ұ������� ����';
$lang['Calendar_nb_row']		= 'ù������ Calendar�� ������ �� ����Ʈ ����� ���̴� Calendar Event row ��';
$lang['Calendar_birthday']		= 'Calendar�� ���� ǥ��';
$lang['Calendar_forum']			= 'Scheduler���� ������ �Ʒ� �޴���Ī ǥ��';

$lang['Sorry_auth_cal']			= '�˼��մϴ�, %s�� Event Calendar�� �÷��ֽñ� �ٶ��ϴ�.';
$lang['Date_error']				= '%d��, %d��, %d���� �ùٸ� ��¥ ������ �ƴմϴ�.';

$lang['Event_time']				= '���� �ð�';
$lang['Minutes']				= '��';
$lang['Today']					= '����';
$lang['All_events']				= '��� events';

$lang['Rules_calendar_can']		= 'Event Calendar�� �Խù��� ����� �� �ֽ��ϴ�.';
$lang['Rules_calendar_cannot']	= 'Event Calendar�� �Խù��� ����� �� �����ϴ�.';

$lang['Calendar_start']				= '������';
$lang['Calendar_insert']			= '�߰��ϱ�';
$lang['Calendar_during']			= '����';
$lang['Calendar_event_content']		= '�Ⱓ';
$lang['Calendar_explain']			= '<br/>���۽ð����� ����ڰ� ������ �Ⱓ ���� ����˴ϴ�';
//-- fin mod : calendar ----------------------------------------------------------------------------

//-- mod : split topic type ------------------------------------------------------------------------
//-- add
$lang['Announce_settings']		= '�������� ����';
$lang['split_global_announce']	= '��ü ���� �и�';
$lang['split_announce']			= '�������� �и�';
$lang['split_sticky']			= '�ʵ����� �и�';
$lang['split_topic_split']		= '���� Ÿ�Ժ��� �и��Ͽ� ǥ��';
//-- fin mod : split topic type --------------------------------------------------------------------

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
$lang['Icons_settings']			= '������ ����';
$lang['Icons_per_row']			= '�� �ٿ� ���� ������ ��';
$lang['Icons_per_row_explain']	= '�� �ٿ� ���̴� �������� ������ ������ �ּ���.';
$lang['post_icon_title']		= '�� ����';
// icons
$lang['icon_none']				= 'No icon';
$lang['icon_note']				= '����';
$lang['icon_important']			= '�亯';
$lang['icon_idea']				= '����';
$lang['icon_warning']			= '����';
$lang['icon_question']			= '����';
$lang['icon_cool']				= '���';
$lang['icon_funny']				= '��ǥ';
$lang['icon_angry']				= '�ݱ�';
$lang['icon_sad']				= '���';
$lang['icon_mocker']			= '��û';
$lang['icon_shocked']			= 'Oooh !';
$lang['icon_complicity']		= 'Complicity';
$lang['icon_bad']				= 'Bad !';
$lang['icon_great']				= 'Great !';
$lang['icon_disgusting']		= 'Beark !';
$lang['icon_winner']			= 'Gniark !';
$lang['icon_impressed']			= 'Oh yes !';
$lang['icon_roleplay']			= 'Roleplay';
$lang['icon_fight']				= 'Fight';
$lang['icon_loot']				= 'Loot';
$lang['icon_picture']			= '�׸�';
$lang['icon_calendar']			= 'Event Calendar';
//-- fin mod : post icon ---------------------------------------------------------------------------

//-- mod : topic order -------------------------------------------------------------------------------
//-- add
$lang['Sort_Views']			= '��ȸ��';
$lang['Sort_Replies']			= '�亯';
$lang['Sort_Icon']			= '������';
//-- fin mod : topic order ---------------------------------------------------------------------------

//-- mod : qbar ------------------------------------------------------------------------------------
//-- add
$lang['FAQ_explain']				= '���� �ϴ� ����';
$lang['Search_explain']				= '�޴� �˻�';
$lang['Memberlist_explain']			= '��ϵ� ����� ���';
$lang['Usergroups_explain']			= '��ϵ� ����� �׷�';
$lang['Profile_explain']			= '������������';
$lang['Private_Messaging_explain']	= '������ Ȯ���ϼ���';
$lang['Login_explain']				= '�α����� �ּ���';
$lang['Register_explain']			= '����ϼ���';
$lang['Logout_explain']				= '�α׾ƿ�';
$lang['Admin_explain']				= '������ ���� �������� �̵��Ͻÿ�.';
$lang['Forum_index_explain']		= '�޴��ε���';
//-- fin mod : qbar --------------------------------------------------------------------------------

//-- Admin User list
$lang['Users_List']		= '����� ���';
$lang['Total_users']		= '��ü�����';
$lang['Last_visit']		= '������ �湮';
$lang['Active']		= 'Ȱ����';

//-- Watched Topics List
$lang['Watched_Topics'] = '�������� ��';
$lang['No_Watched_Topics'] = '�������� �������� �����ϴ�.';
$lang['Watched_Topics_Started'] = '�� ���� ����';
$lang['Watched_Topics_Stop'] = '���� ����';
$lang['Check_All'] = '��� ����';
$lang['UnCheck_All'] = '���� ����';

// Log actions MOD Start
$lang['Close_window'] = 'â�ݱ�';
$lang['Rules_title'] = 'Action : %s';
$lang['Locking_topic'] = '������ ���';
$lang['Unlocking_topic'] = '������ ��� ����';
$lang['Spliting_topic'] = '�Խù� �и�';
$lang['Moving_topic'] = '�Խù� �̵�';
$lang['Deleting_topic'] = '�Խù� ����';
$lang['Editing_topic'] = '�Խù� ����';
$lang['Lock_Explication'] = '�޴����/�ý��۰����ڰ� �ۿ� "���" ����� �����ϸ� �Ϲݻ���ڴ� �亯�� �ø� ���� �����ϴ�. �׷��� �޴����/�ý��۰����ڴ� �亯���Ⱑ �����մϴ�.';
$lang['Unlock_Explication'] = '�޴����/�ý��۰����ڴ� ��� ���� ������ �� �ֽ��ϴ�. ����� �����ϸ� ��� ����ڵ��� �亯�� �ø� �� �ֽ��ϴ�.';
$lang['Split_Explication'] = '������ �ؿ� �ö�� ���� ���� �Խù� �� Ư�� �Խù��� �����Ͽ� ������ �����۷� �и��� �� �ֽ��ϴ�.';
$lang['Move_Explication'] = '�������� �޴� A�� �޴� B ������ �̵���ų �� �ֽ��ϴ�. �̵� �Ŀ� ���� �������� �ִ� �ڸ����� shadow�� �����ϴ�.';
$lang['Delete_Explication'] = '�޴����/�ý��۰����ڰ� �������� �����Ҽ� �ֽ��ϴ�. �� �� �����ϸ� ������ �Ұ����մϴ�.<br /><b>�� ����� ����� ���� ������ �ּ���.</b>';
$lang['Edit_Explication'] = '�ý��۰����ڳ� �޴���ڴ� �Ϲݻ���ڰ� �ۼ��� �Խù��� ������ �� �ֽ��ϴ�.';
$lang['No_action_specified'] = 'Ư���� action�� �����ϴ�.';
// Log actions MOD End


//-- Korean user-info
$lang['hand_phone'] = "�ڵ��� ��ȣ";
$lang['hphone']['0'] = "= �� �� =";
$lang['hphone']['010'] = "010";
$lang['hphone']['011'] = "011";
$lang['hphone']['013'] = "013";
$lang['hphone']['016'] = "016"; 
$lang['hphone']['017'] = "017"; 
$lang['hphone']['018'] = "018"; 
$lang['hphone']['019'] = "019"; 

$lang['my_phone'] = "��ȭ��ȣ";
$lang['mphone'][0] = "= �� �� =";
$lang['mphone'][2] = "02";
$lang['mphone'][31] = "031";
$lang['mphone'][32] = "032"; 
$lang['mphone'][33] = "033"; 
$lang['mphone'][41] = "041"; 
$lang['mphone'][42] = "042"; 
$lang['mphone'][43] = "043";
$lang['mphone'][51] = "051"; 
$lang['mphone'][52] = "052"; 
$lang['mphone'][53] = "053"; 
$lang['mphone'][54] = "054"; 
$lang['mphone'][55] = "055"; 
$lang['mphone'][61] = "061";
$lang['mphone'][62] = "062"; 
$lang['mphone'][63] = "063"; 
$lang['mphone'][64] = "064"; 

// ���� �޺� �ʵ嵥��Ÿ
$lang['Occupation'] = "����";
$lang['Occ'][0] = "= �� �� =";
$lang['Occ'][1] = "����л�����";
$lang['Occ'][2] = "���л�";
$lang['Occ'][3] = "ȸ���";
$lang['Occ'][4] = "�ֺ�";
$lang['Occ'][5] = "����/������";
$lang['Occ'][6] = "����/���";
$lang['Occ'][7] = "����";
$lang['Occ'][8] = "������";
$lang['Occ'][9] = "���/����";
$lang['Occ'][10] = "�Ƿ��";
$lang['Occ'][11] = "������";
$lang['Occ'][12] = "��ۿ���/����";
$lang['Occ'][13] = "���п���";
$lang['Occ'][14] = "�ڿ���";
$lang['Occ'][15] = "����/�������";
$lang['Occ'][16] = "����";
$lang['Occ'][17] = "�ܼ��빫/�Ͽ�";
$lang['Occ'][18] = "����/����/����";
$lang['Occ'][19] = "��/��/�����";
$lang['Occ'][20] = "������";
$lang['Occ'][21] = "��������";
$lang['Occ'][22] = "����";
$lang['Occ'][23] = "��Ÿ";

$lang['Location2'] = "������ �ּ�";
$lang['Jumin'] = "�ֹε�Ϲ�ȣ";
$lang['Zipcode'] = "���� ��ȣ";
$lang['realname'] = "�Ǹ�";

$lang['Gender'] = '����';//used in users profile to display witch gender he/she is 
$lang['Male'] = '����'; 
$lang['Female']='����'; 
$lang['No_gender_specify'] = '������'; 

$lang['remark1'] = '�Ҽӱ��';
$lang['remark2'] = '�μ���';
$lang['remark3'] = '����';
$lang['remark4'] = '����';
$lang['remark5'] = '���';

$lang['Birthday'] = '����'; 
$lang['Age'] = '����'; 

$lang['Submit_date_format'] = 'Y-m-d'; // php date() format - Note: ONLY d, m and Y may be used and SHALL ALL be used (different seperators are accepted) 
$lang['Year'] = '��';
$lang['Month'] = '��';
$lang['Day'] = '��';
$lang['day_short'] = array ($lang['datetime']['Sun'],$lang['datetime']['Mon'],$lang['datetime']['Tue'],$lang['datetime']['Wed'],$lang['datetime']['Thu'],$lang['datetime']['Fri'],$lang['datetime']['Sat']);
$lang['day_long'] = array ($lang['datetime']['Sunday'],$lang['datetime']['Monday'],$lang['datetime']['Tuesday'],$lang['datetime']['Wednesday'],$lang['datetime']['Thursday'],$lang['datetime']['Friday'],$lang['datetime']['Saturday']);
$lang['month_short'] = array ($lang['datetime']['Jan'],$lang['datetime']['Feb'],$lang['datetime']['Mar'],$lang['datetime']['Apr'],$lang['datetime']['May'],$lang['datetime']['Jun'],$lang['datetime']['Jul'],$lang['datetime']['Aug'],$lang['datetime']['Sep'],$lang['datetime']['Oct'],$lang['datetime']['Nov'],$lang['datetime']['Dec']);
$lang['month_long'] = array ($lang['datetime']['January'],$lang['datetime']['February'],$lang['datetime']['March'],$lang['datetime']['April'],$lang['datetime']['May'],$lang['datetime']['June'],$lang['datetime']['July'],$lang['datetime']['August'],$lang['datetime']['September'],$lang['datetime']['October'],$lang['datetime']['November'],$lang['datetime']['December']);
$lang['Last_logon'] = '����������';

$lang['apply'] = '����';
$lang['skin_manage'] = '��Ų ����';

$lang['view_list'] = '��Ϻ���';
$lang['printer_topic'] = '����Ʈ����';

$lang['theme_search'] = '�����˻�';

$lang['watching_list'] = '�������� ���';

$lang['sort_remark1'] = 'remark1';
$lang['sort_remark2'] = 'remark2';
$lang['sort_remark3'] = 'remark3';
$lang['sort_remark4'] = 'remark4';
$lang['sort_remark5'] = 'remark5';
$lang['sort_remark6'] = 'remark6';
$lang['sort_remark7'] = 'remark7';
$lang['sort_remark8'] = 'remark8';
$lang['sort_remark9'] = 'remark9';
$lang['sort_remark10'] = 'remark10';
$lang['sort_remark11'] = 'remark11';
$lang['sort_remark12'] = 'remark12';
$lang['sort_remark13'] = 'remark13';
$lang['sort_remark14'] = 'remark14';
$lang['sort_remark15'] = 'remark15';

$lang['editor_lang'] = 'kr';
$lang['editor_lang_full'] = 'korean';

$lang['banned_char'] = '�Է��Ͻ� ��������';
$lang['required_field'] = '���Է��Ͻ� �ʼ����û���';
$lang['required_password'] = '��й�ȣ�� �Է��ϼ��� (4�ڸ� ����)';
$lang['Current_password_mismatch_with_back'] = '�Է��� ���� ��й�ȣ�� �����ͺ��̽��� ����� �Ͱ� ��ġ���� �ʽ��ϴ�</br><a href="javascript:history.back()">�ڷ�</a>';

$lang['deleted_post'] = '������ ���Դϴ�';

$lang['View_Calendar'] = 'Ķ���� ����';

$lang['email_desc'] = '������ ���ο� �����ּҷ� ����Ű�� ���۵˴ϴ�';
$lang['only_jpg'] = 'JPG, PNG�� ����';
$lang['thumb_extension'] = 'JPG, PNG�� ����ϰ���';

$lang['site_address'] = '�����ּ�';


//
// Menu Lang
// 
$lang['menu_lang_1stLine'] = 'ù��° ��';
$lang['menu_lang_2ndLine'] = '�ι�° ��';
$lang['menu_lang_address'] = '�ּ�';
$lang['menu_lang_agentname'] = '��Ī';
$lang['menu_lang_applicant'] = '��û��';
$lang['menu_lang_attach'] = '����';
$lang['menu_lang_author'] = '�ۼ���';
$lang['menu_lang_cell'] = '�޴���';
$lang['menu_lang_content'] = '����';
$lang['menu_lang_date'] = '�ۼ���';
$lang['menu_lang_descript'] = '�󼼼���';
$lang['menu_lang_email'] = '����';
$lang['menu_lang_etc'] = '���';
$lang['menu_lang_event'] = '�Ⱓ';
$lang['menu_lang_fax'] = '�ѽ�';
$lang['menu_lang_filename'] = '����';
$lang['menu_lang_from'] = '������';
$lang['menu_lang_hide'] = '����';
$lang['menu_lang_job'] = '����';
$lang['menu_lang_margin'] = '����';
$lang['menu_lang_messagebody'] = '����';
$lang['menu_lang_messagetype'] = '����';
$lang['menu_lang_name'] = '�̸�';
$lang['menu_lang_place'] = '�ٹ�ó';
$lang['menu_lang_poll'] = '��ǥ';
$lang['menu_lang_position'] = '��ġ';
$lang['menu_lang_president'] = '��ǥ��';
$lang['menu_lang_recipient'] = '�����';
$lang['menu_lang_reply'] = '�亯';
$lang['menu_lang_resizable'] = 'ũ������';
$lang['menu_lang_scrollbars'] = '��ũ�ѹ�';
$lang['menu_lang_section'] = '�з�';
$lang['menu_lang_size'] = 'ũ��';
$lang['menu_lang_sta'] = 'Status';
$lang['menu_lang_streaming'] = '��Ʈ���� URL';
$lang['menu_lang_subject'] = '����';
$lang['menu_lang_tel'] = '��ȭ��ȣ';
$lang['menu_lang_themecolor'] = '�׸� ����';
$lang['menu_lang_title'] = '����';
$lang['menu_lang_to'] = '�޴���';
$lang['menu_lang_url'] = 'URL';
$lang['menu_lang_view'] = '��ȸ';
$lang['menu_lang_id'] = '���̵�';
$lang['menu_lang_pass'] = '��й�ȣ';
$lang['menu_lang_menucolor'] = '�޴� ����';
$lang['menu_lang_menubgcolor'] = '�޴� ��� ����';
$lang['menu_lang_logobgcolor'] = '����';
$lang['menu_lang_bannerimage'] = '�̹���';
$lang['menu_lang_bannername'] = '�̸�';
$lang['menu_lang_opacity'] = '�޴� ��� ����';
$lang['menu_lang_path'] = '���';
$lang['menu_lang_yes'] = '��';
$lang['menu_lang_no'] = '�ƴϿ�';
$lang['menu_lang_top'] = '���';
$lang['menu_lang_left'] = '����';
$lang['menu_lang_right'] = '����';
$lang['menu_lang_width'] = '�ʺ�';
$lang['menu_lang_height'] = '����';
$lang['menu_lang_volume'] = '����';
$lang['menu_lang_loop'] = '�ݺ�';
$lang['menu_lang_alignment'] = '����';
$lang['menu_lang_color'] = '����';
$lang['menu_lang_center'] = '���';
$lang['menu_lang_new_window'] = '��â';
$lang['menu_lang_current_window'] = '����â';
$lang['menu_lang_success_update'] = '���������� ������Ʈ �Ǿ����ϴ�.';
$lang['menu_lang_upload_crop'] = '�̹��� ���ε� & �̹��� �ڸ���';
$lang['menu_lang_edit'] = '����';
$lang['menu_lang_crop_now'] = '�̹��� �ڸ���';
$lang['menu_lang_short_description'] = '���� ����';

$lang['menu_lang_admin_menu'] = '�����ڸ޴�';
$lang['menu_lang_logo'] = '�ΰ�';
$lang['menu_lang_skin'] = '��Ų';
$lang['menu_lang_sound'] = '�������';
$lang['menu_lang_home'] = 'ù������';
$lang['menu_lang_event_box'] = 'Event Box';
$lang['menu_lang_mini_box'] = 'Mini Box';
$lang['menu_lang_pop_up'] = '�˾�â';
$lang['menu_lang_family_sites'] = '���û���Ʈ';
$lang['menu_lang_copyright'] = 'Copyright';
$lang['menu_lang_menu_scroll'] = '�޴���ũ��';
$lang['menu_lang_quick_links'] = '����ũ';
$lang['menu_lang_banner'] = '���';
$lang['menu_lang_agreement'] = '�̿���';
$lang['menu_lang_one_more_time'] = '�ʱ� ȭ������ ����';

$lang['menu_lang_not_admin'] = '�����ڸ� �̿��� �� �ֽ��ϴ�.';

$lang['menu_lang_sitemap'] = '����Ʈ��';

$lang['menu_lang_pagejump'] = '������ �ٷΰ���';

$lang['menu_lang_required'] = '�ý��ۿ� �ʼ����� ����Դϴ�. <br>�����Ͻ� �� �����ϴ�. ';
$lang['menu_lang_hide_instead'] = '���ʿ��Ͻ� ��� ������ ����� �̿��Ͽ� ����ñ� �����ص帳�ϴ�.';
$lang['menu_lang_no_access'] = '�������� ���� �õ��Դϴ�. <br>��ӵ� ��� �ý��ۿ� ������ �߻��� �� �ֽ��ϴ�.';

$lang['menu_lang_'] = '';
$lang['menu_lang_'] = '';
$lang['menu_lang_'] = '';
$lang['menu_lang_'] = '';
$lang['menu_lang_'] = '';

//
// That's all, Folks!
// -------------------------------------------------

?>