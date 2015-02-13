<?php
/***************************************************************************
 *                         lang_bbcode.php [Korean]
 *                            -------------------
 *   begin                : Wednesday Oct 3, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: lang_bbcode.php,v 1.1.2.2 2002/11/14 14:00:13 psotfx Exp $
 *
 *
 ***************************************************************************/


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
// To add an entry to your BBCode guide simply add a line to this file in this format:
// $faq[] = array("question", "answer");
// If you want to separate a section enter $faq[] = array("--","Block heading goes here if wanted");
// Links will be created automatically
//
// DO NOT forget the ; at the end of the line.
// Do NOT put double quotes (") in your BBCode guide entries, if you absolutely must then escape them ie. \"something\";
//
// The BBCode guide items will appear on the BBCode guide page in the same order they are listed in this file
//
// If just translating this file please do not alter the actual HTML unless absolutely necessary, thanks :)
//
// In addition please do not translate the colours referenced in relation to BBCode any section, if you do
// users browsing in your language may be confused to find they're BBCode doesn't work :D You can change
// references which are 'in-line' within the text though.
//
  
$faq[] = array("--","�Ұ�");
$faq[] = array("BBCode�� �����ΰ�", "BBCode�� HTML�� Ư�� �����̴�. �Խ��ǻ� ���� �ø��� BBCode�� ����Ҽ� �ִ����� ��ڰ� �����Ѵ�. ���� �� ��Ŀ��� �� �ۿ� ���Ͽ� ���������� BBCode�� ������ �� �ִ�. BBCode�� ��Ÿ�Ͽ� �־� HTML�� ����Ͽ�, �±״� &lt; �� &gt; ��ſ� ���ȣ [ �� ] �ȿ� ����, ����� ��� ǥ���� �������� �����ϰ� �����Ѵ�. ����ϴ� ���÷���Ʈ�� ���� �� ����� �޽��� �������� �ִ� Ŭ���� ������ �������̽��� BBCode�� �ۿ� �߰��ϴ� ���� �� ������ ���ٴ� ���� �˰� �� ���̴�. ������ ������ ������ ������ ����.");

$faq[] = array("--","�ؽ�Ʈ ������");
$faq[] = array("����, ���Ÿ� �� ���� ���ڸ� ����� ���", "BBCode�� ������ �⺻ ��Ÿ���� ������ �ٲܼ� �ֵ��� �±׸� �����ϰ� �ִ�. ������ ����� �̿��Ѵ�: <ul><li>�Ϻ� ���ڸ� ����� �Ϸ��� <b>[b][/b]</b> �ȿ� ���� �ִ´�, ���� ���, <br /><br /><b>[b]</b>�ȴ�<b>[/b]</b><br /><br />�� <b>�ȴ�</b>�� �ȴ�</li><li>������ �������� <b>[u][/u]</b>�� ����Ѵ�, ���� ���, <br /><br /><b>[u]</b>���� ��ħ<b>[/u]</b><br /><br />�� <u>���� ��ħ</u>�� �ȴ�</li><li>���ڸ� ���Ÿ����� �Ϸ��� <b>[i][/i]</b>�� ����Ѵ�, ���� ���, <br /><br />���� <b>[i]</b>������!<b>[/i]</b><br /><br />�� ���� <i>������!</i>�� �ȴ�</li></ul>");
$faq[] = array("������ ���̳� ũ�⸦ �ٲٴ� ���", "������ ���̳� ũ�⸦ �ٲٷ��� ������ �±׸� ����Ѵ�. ȭ�� ����� ������� �������� �ý��ۿ� �������� ����ϱ� �ٶ���: <ul><li>������ ���� ������ ���ڸ� <b>[color=][/color]</b> �ȿ� �־ �Ѵ�. ������(��: red, blue, yellow ��) �� �Է��ϰų� 16������ ����Ѵ�, ��: #FFFFFF, #000000. ������ ���ڸ� �������:<br /><br /><b>[color=red]</b>�ȴ�!<b>[/color]</b><br /><br /> Ȥ�� <br /><br /><b>[color=#FF0000]</b>�ȴ�!<b>[/color]</b><br /><br />���� �ϸ� <span style=\"color:red\">�ȴ�!</span>�� �ȴ�</li><li>������ ũ��� <b>[size=][/size]</b> �±׸� �̿��Ѵ�. �� �±״� ���� ������� ���ø�Ʈ�� ���������� ���� ������ ���� ũ�⸦ �ȼ��� ��Ÿ�� ��ġ�ν�, 1 ���� �����Ͽ� 29 �����̴�. ��:<br /><br /><b>[size=9]</b>�����۾�<b>[/size]</b><br /><br />�� �Ϲ������� <span style=\"font-size:9px\">���� �۾�</span>�� �ǰ�<br /><br /><br /><br /><b>[size=24]</b>ū�۾�!<b>[/size]</b><br /><br />�� <span style=\"font-size:24px\">ū�۾�HUGE!</span>�� �ȴ�</li></ul>");
$faq[] = array("��ȯ �±׸� ������ �� �ִ°�?", "���� �� �� �ִ�, ���� ��� ������� ������ ������:<br /><br /><b>[size=18][color=red][b]</b>���� �ָ�!<b>[/b][/color][/size]</b><br /><br /> �� <span style=\"color:red;font-size:18px\"><b>���� �ָ�!</b></span>�� �ȴ�<br /><br />�׷��� �׷��� ���ڸ� ���� ����ϴ� ���� �������� �ʴ´�! �±׸� �ùٷ� �ݵ��� �����ؾ� �Ѵ�. ���� ���, ������ Ʋ�� �����̴�:<br /><br /><b>[b][u]</b>Ʋ����<b>[/b][/u]</b>");

$faq[] = array("--","�ο� �� ������ ������ ���");
$faq[] = array("�亯�� ���� �ο��ϱ�", "���� �ο뿡�� �ΰ��� ����� �ִµ�, ���� �� �������̴�.<ul><li>�Խ����� �Խù��� ���� ����� �ϱ����� �ο� ����� �̿��Ҷ� �Խñ��� <b>[quote=\"\"][/quote]</b> ������ ���� �޽��� â�� ÷�εȴٴ� ���� �˾ƾ��Ѵ�. �� ������� Ÿ���̳� ��Ÿ �ø����� �ϴ°͵鿡 ���� ������ �̿��� �ο��� �� �� �ִ�! ���� ���, ȫ�浿�� ������ ���� �Ϻθ� �ο��Ϸ��� :<br /><br /><b>[quote=\"ȫ�浿\"]</b>ȫ�浿�� �ۼ��� ��<b>[/quote]</b><br /><br />������� ����� ȫ�浿 �ۼ�:  �ڿ� ������ ���� ���� �տ� �´�. �ο��ϴ� �̸� �ֺ��� \"\" �� ����ϴ� ���� ���� ���ƾ� �Ѵ�.</li><li>�ι�° ����� �͸��� �ο��̴�. �� ����� �̿��Ϸ��� ���ڸ� <b>[quote][/quote]</b> �±� �ȿ� �ִ´�. �޽����� ���� �ܼ���, ���� ���� �տ� �ο�: �̶�� ���´�</li></ul>");
$faq[] = array("�ڵ� �� ������ ������ ���", "�ڵ��� �Ϻκ� �̳� ������ �۲��� �̿��ϴ� ������ ���� ����ϰ��� �Ѵٸ� <b>[code][/code]</b> �±� �ȿ� �־�� �Ѵ�. ���� ���, <br /><br /><b>[code]</b>echo \"This is some code\";<b>[/code]</b><br /><br /><b>[code][/code]</b> �±׳����� ���� �������� ���� ������ ������ �� �� ���� ���̴�.");

$faq[] = array("--","����Ʈ �����");
$faq[] = array("������ ����Ʈ �����", "BBCode�� �� ������ ����Ʈ�� �����ϴµ�, �����İ� ���� ����Ʈ�̴�. �̰͵��� HTML�� ����Ʈ��� �ٺ������δ� �����ϴ�. ������ ����Ʈ�� ����Ʈ���� �� �׸���� �� ���ڷ� �鿩���� �ϸ鼭 ���������� ����Ѵ�. ������ ����Ʈ�� ������� <b>[list][/list]</b>�� ����ϰ� ����Ʈ���� �� �׸���� <b>[*]</b>�� �̿��Ͽ� �����Ѵ�. ���� ���, �����ϴ� ���� ����Ʈ�� ������� :<br /><br /><b>[list]</b><br /><b>[*]</b>Red<br /><b>[*]</b>Blue<br /><b>[*]</b>Yellow<br /><b>[/list]</b><br /><br />��������� ������ ����Ʈ�� ���������:<ul><li>Red</li><li>Blue</li><li>Yellow</li></ul>");
$faq[] = array("���� ����Ʈ �����", "����Ʈ�� �ι�° ������ ���� ����Ʈ�� �� �׸� �տ� ������ ǥ���� �������� ������ �� �ְ� ���ش�. <b>[list=1][/list]</b> �� ����Ͽ� ��ȣ �ű� ����Ʈ�� ����ų� <b>[list=a][/list]</b> �� ����Ͽ� ���ĺ� �ű� ����Ʈ�� ���� �� �ִ�. ������ ����Ʈ������ ���� �� �׸���� <b>[*]</b>���� �����Ѵ�. ���� ���:<br /><br /><b>[list=1]</b><br /><b>[*]</b>���� �湮<br /><b>[*]</b>��ǻ�� ����<br /><b>[*]</b>��ǻ�� �տ��� ������ ������<br /><b>[/list]</b><br /><br /> ������ ���� ����� ��´�:<ol type=\"1\"><li>���� �湮</li><li>��ǻ�� ����</li><li>��ǻ�� �տ��� ������ ������</li></ol> ���ĺ� �ű��� ���δ�:<br /><br /><b>[list=a]</b><br /><b>[*]</b>ù��° ��<br /><b>[*]</b>�ι�° ��<br /><b>[*]</b>����° ��<br /><b>[/list]</b><br /><br />��¹���<ol type=\"a\"><li>ù��° ��</li><li>�ι�° ��</li><li>����° ��</li></ol>");

$faq[] = array("--", "��ũ �����");
$faq[] = array("�ٸ� ����Ʈ ��ũ", "WebManager�� BBCode�� URI(URL�� �� �˷��� Uniform Resource Indicators) ����� ���� ����� �����Ѵ�.<ul><li>ù��° ����� <b>[url=][/url]</b> �±׸� �̿��ϴµ�, = ��ȣ ������ ���� ��� ���ڵ��� URL�� ��޵ȴ�. ���� ��� www.ontoin.com ���� ��ũ�Ϸ���:<br /><br /><b>[url=http://www.ontoin.com/]</b>WebManager��!<b>[/url]</b><br /><br />������ ���� ��ũ�� ��´�, <a href=\"http://www.ontoin.com/\" target=\"_blank\">WebManager��!</a> ��ũ�� ���ο� â���� �����Ƿ� �Խ����� ��� ����� �� �ִ�.</li><li>URL ��ü�� ��ũ�� ǥ���Ϸ��� :<br /><br /><b>[url]</b>http://www.ontoin.com/<b>[/url]</b><br /><br />������ ���� ����� ��´�, <a href=\"http://www.ontoin.com/\" target=\"_blank\">http://www.ontoin.com/</a></li><li>���� WebManager �� <i>Magic Links</i>��� ����� �����ϴµ�, �̰��� �±׳� http://�� �������� �ʾƵ� ���������� �ùٸ� URL�� ��ũ�� ����� �ش�. ���� ��� �޽������� www.ontoin.com �� �Է��ϸ� �ڵ����� <a href=\"http://www.ontoin.com/\" target=\"_blank\">www.ontoin.com</a> �� �޽����� ���������.</li><li>���� ����� E-mail �ּҿ��� ����Ǵµ�, ������ ���� �ּҸ� ������ �� �ִ�:<br /><br /><b>[email]</b>no.one@domain.adr<b>[/email]</b><br /><br />����� ������ ���� :  <a href=\"emailto:no.one@domain.adr\">no.one@domain.adr</a>,Ȥ�� �׳� no.one@domain.adr �� �޽����� �Է��ϸ� ���߿� �����Ҷ� �ڵ����� ��ȯ�� �ȴ�.</li></ul>�ٸ� BBCode �±׵�� ���������� <b>[img][/img]</b> (���� ���� ����), <b>[b][/b]</b>�� ���� �±׵� URL�� ������ �� �ִ�. ������ �±׿���ó�� �±��� ���� ������ ��Ȯ�� �ؾ� �Ѵ�, ���� ���:<br /><br /><b>[url=http://www.ontoin.com/][img]</b>http://www.ontoin.com/images/phplogo.gif<b>[/url][/img]</b><br /><br />�� �߸��� ���̴�.");

$faq[] = array("--", "�Խù��� �̹��� ���̱�");
$faq[] = array("�Խù��� �̹��� ���̱�", "WebManager�� BBCode�� �Խù��� �̹����� ������ �ֵ��� �±׸� �����Ѵ�. �� �±׸� ����Ҷ� ����ؾ��� �ΰ��� �߿��� ���� �ִµ�; �켱 ���� ������� �̹����� �ߴ� ���� �ݱ��� �ʴ´ٴ� �Ͱ� �̹����� �̹� ���ͳݻ� �����ϰ� �־�� �Ѵ�(�������� ������ �ʴ���, �̹����� �ڽ��� �ľȿ� �־���� �ȵȴ�). ���� WebManager���� �̹����� �����ϴ� ����� ����(�̷��� WebManager������ ����� �� ���̴�). �̹����� �������� �̹����� URL�� <b>[img][/img]</b> �±� �ȿ� �ִ´�. ���� ���:<br /><br /><b>[img]</b>http://www.ontoin.com/images/phplogo.gif<b>[/img]</b><br /><br />������ ����� �ٿ� ���� �̹����� <b>[url][/url]</b> �±׾ȿ� �־ �ȴ�, ���� ���<br /><br /><b>[url=http://www.ontoin.com/][img]</b>http://www.ontoin.com/images/phplogo.gif<b>[/img][/url]</b><br /><br />�����:<br /><br /><a href=\"http://www.ontoin.com/\" target=\"_blank\"><img src=\"templates/lab/images/logo_phpBB_med.gif\" border=\"0\" alt=\"\" /></a><br />");

$faq[] = array("--", "��Ÿ");
$faq[] = array("����� ���� �±׸� �߰��� �� �ִ°�?", "WebManager���� �������� ������δ� �ȵȴ�. �̷��� ���������� ����� ���� ���� �ִ�");

//
// This ends the BBCode guide entries
//

?>