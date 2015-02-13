	<?php
/***************************************************************************
 *                            lang_faq_attach.php [Korean]
 *                              -------------------
 *     begin            : Thu Mar 06 2003
 *     copyright	: (C) 2003 Jang Jaeho
 *     email		: kiwidream@empal.com
 *
 *     $Id: lang_faq_attach.php,v 2.3.6 2003/03/06 Jaeho Exp $
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

$faq[] = array("--","첨부파일");

$faq[] = array("첨부파일은 어떻게 추가하나요?", "새 글을 작성할때 파일첨부가 가능합니다. 본문 내용입력 아래에 <i>첨부파일 추가하기</i> 항목이 있어야 합니다. <i>찾아보기...</i> 버튼을 클릭하면 파일선택 대화상자가 열립니다. 원하는 파일을 선택하고 열기를 클릭하시면 됩니다. <i>파일설명</i>란에 파일에 대한 설명을 입력하면 링크로 나타나며, 빈 칸으로 남겨두면 파일이름이 링크로 표시됩니다. 관리자가 여러개의 파일첨부가 가능하게 설정해 두었다면 최대 파일수에 도달할 때까지 위에서 설명한대로 계속 진행하시면 됩니다.<br/><br/>관리자는 최대 파일크기, 파일 확장자명 제한등과 같은 설정을 조절할 수 있습니다. 사용자 정책에 따라 첨부된 파일은 사용자의 책임하에 있으며 아무런 경고없이 삭제될 수도 있습니다.<br/><br/>데이타 손실에 대한 어떠한 책임도 관리자나 그외의 권한이 주어진 자에게 책임이 없음을 명심하십시요.");

$faq[] = array("글을 이미 올린후에 첨부파일은 어떻게 추가하나요?", "글을 올린후 첨부파일을 추가하고자 한다면 편집 아이콘을 클릭하시면 됩니다. 그리고 위에서 설명한대로 따라하시면 됩니다. 마지막으로, <i>제출</i> 을 클릭하시면 새로운 첨부파일이 추가될 겁니다.");

$faq[] = array("첨부파일을 어떻게 삭제하나요?", "첨부파일을 삭제하실려면, <i>게시된 첨부파일</i> 항목안에 <i>첨부파일 삭제하기</i> 버튼을 클릭하시면 원하는 파일을 삭제할 수 있습니다. 마지막으로, <i>제출</i> 을 클릭하시면 첨부파일이 삭제될 겁니다.");

$faq[] = array("파일설명을 어떻게 갱신하나요?", "파일설명을 갱신하시려면, <i>게시된 첨부파일</i> 항목안, <i>파일 설명</i> 란에 글자를 입력하시고 <i>파일설명 새로고침</i> 버튼을 클릭하시면 됩니다. 마지막으로, <i>제출</i> 을 클릭하시면 파일설명이 갱신될 겁니다.");

$faq[] = array("게시글 내에서 왜 내 첨부파일이 보이지 않습니까?", "대부분의 경우는 파일이나 확장자가 허가되지 않았기 때문입니다. 또는, 사용자 정책에 따라 관리자에 의해 삭제되었기 때문입니다.");

$faq[] = array("왜 파일첨부가 되지 않습니까?", "파일첨부가 특정 사용자나 그룹에게만 허가되었기 때문입니다. 해당 권한이 주어진 자에게 연락해 보시기 바랍니다.");

$faq[] = array("권한이 있는데도 왜 파일첨부가 되지 않습니까?", "관리자에 의해 특정 게시판에 대한 권한 설정이 변경되었을 수도 있습니다. 관리자나 해당 권한이 주어진 자에게 연락해 보시기 바랍니다.");

$faq[] = array("왜 첨부파일 삭제가 되지 않나요?", "몇몇 게시판에 대해 첨부파일 삭제는 특정 사용자나 그룹에게만 제한되어 있을 수 있습니다. 삭제에 대한 권한이 주어져 있어야 합니다. 시스템 관리자에게 문의해 보시기 바랍니다.");

$faq[] = array("왜 첨부파일을 보거나 다운로드가 안 되나요?", "몇몇 게시판에 대해 첨부파일 보기나 다운로드는 특정 사용자나 그룹에게만 제한되어 있을 수 있습니다. 보기나 다운로드에 대한 권한이 주어져 있어야 합니다. 관리자에게 문의해 보시기 바랍니다.");

$faq[] = array("왜 법적인 파일에 대해 연락을 취해야 하나요?", "관리자나 해당 권한이 있는 자에게 문의해야 합니다. 만약 해당 관리자를 찾지 못하면 도메인 소유인에게 연락해 보십시요. phpBB Group은 이 보드를 사용하는 사용자나 어떻게, 어디에 사용되던지 이에 대한 어떠한 제어권도 없음을 명심하셔야 합니다. phpBB 웹사이트(phpbb.com)나 phpBB 프로그램 자체와 관련된 문제가 아닌, 어떠한 법적 문제에 대해 phpBB Group와 연락을 취하는 것은 아무 의미가 없는 일입니다. 만약 이 소프트웨어의 third party 사용에 대한 메일을 phpBB Group 에 보내시면 간단한 대답이나 아무 대답을 얻지 못할 수도 있습니다.");

?>