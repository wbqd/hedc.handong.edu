<?php
/***************************************************************************
 *                            lang_admin_album.php [korean]
 *                              -------------------
 *     begin                : Sunday, February 02, 2003
 *     copyright            : (C) 2003 Smartor
 *     email                : smartor_xp@hotmail.com
 *
 *     $Id: lang_admin_album.php,v 1.0.4 2003/02/09 20:12:16 ngoctu Exp $
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
// Configuration
//
$lang['Album_config'] = '앨범 환경설정';
$lang['Album_config_explain'] = '여기서 앨범의 전체적인 환경을 설정하고 관리할 수 있습니다.';
$lang['Album_config_updated'] = '앨범 설정정보가 성공적으로 업데이트되었습니다.';
$lang['Click_return_album_config'] = ' %s[여기를 클릭]%s하시면 앨범 설정 페이지로 돌아갑니다.';
$lang['Max_pics'] = '이미지 한계싸이즈 지정 (-1 = 무제한)';
$lang['User_pics_limit'] = '회원에 대한 이미지 수 (-1 = 무제한)';
$lang['Moderator_pics_limit'] = '관리자에 대한 이미지 수 (-1 = 무제한)';
$lang['Pics_Approval'] = '이미지 인증';
$lang['Rows_per_page'] = '출력될 썸네일 세로 칼럼 수';
$lang['Cols_per_page'] = '출력될 썸네일 가로 칼럼 수';
$lang['Thumbnail_quality'] = '썸네일 해상도 (1-100)';
$lang['Thumbnail_cache'] = '썸네일 Cache 사용';
$lang['Manual_thumbnail'] = '썸네일 수동';
$lang['GD_version'] = 'GD 최적화버젼 선택 (사용하는 GD 버젼)';
$lang['Pic_Desc_Max_Length'] = '이미지 소개/코멘트 문자열길이 (bytes)';
$lang['Hotlink_prevent'] = '핫 링크 방지';
$lang['Hotlink_allowed'] = '핫 링크 허용 (구분은 콤마(,)로 합니다.)';
$lang['Personal_gallery'] = '개인앨범 사용레벨';
$lang['Personal_gallery_limit'] = '개인앨범 한계 이미지 수';
$lang['Personal_gallery_view'] = '개인앨범 공개레벨 지정';
$lang['Rate_system'] = '투표시스템 사용';
$lang['Rate_Scale'] =' 투표점수 범위 설정';
$lang['Comment_system'] = '코멘트 기능 사용하기';
$lang['Thumbnail_Settings'] = '썸네일 설정';
$lang['Extra_Settings'] = '기타 설정';
$lang['Default_Sort_Method'] = '이미지 정렬 순서 선택';
$lang['Default_Sort_Order'] = '이미지 기본 정렬방식 선택';
$lang['Fullpic_Popup'] = '이미지를 열때 풀 팝업창으로 띄웁니다.';


// Personal Gallery Page
$lang['Personal_Galleries'] = '개인앨범';
$lang['Album_personal_gallery_title'] = '개인앨범';
$lang['Album_personal_gallery_explain'] = '이 페이지에서 개인앨범을 보거나 관리하는 사용자그룹을 선택할 수 있습니다.<br>"비공개"로 설정된 앨범을 아래에서 지정해 준 사용자그룹이 보거나 관리할 수 있습니다.';
$lang['Album_personal_successfully'] = '설정이 성공적으로 업데이트 되었습니다.';
$lang['Click_return_album_personal'] = '%s[여기를 클릭]%s 하시면 그룹에 대한 개인앨범 설정페이지로 돌아갑니다.';

//
// Categories
//
$lang['Album_Categories_Title'] = '앨범 카테고리 관리';
$lang['Album_Categories_Explain'] = '이 스크린에서 카테고리를 관리, 편집할 수 있습니다. : 생성,삽입,삭제,정렬, 기타.. <br>수정을 클릭하시면 해당 카테고리의 기능권한을 사용자별로 설정하실 수 있습니다.';
$lang['Category_Permissions'] = '카테고리 접근권한';
$lang['Category_Title'] = '카테고리 타이틀';
$lang['Category_Desc'] = '카테고리 설명';
$lang['View_level'] = '보기권한';
$lang['Upload_level'] = '업로드 권한';
$lang['Rate_level'] = '투표권한';
$lang['Comment_level'] = '코멘트 권한';
$lang['Edit_level'] = '편집권한';
$lang['Delete_level'] = '삭제권한';
$lang['New_category_created'] = '새 카테고리가 성공적으로 생성 되었습니다.';
$lang['Click_return_album_category'] = '%s[여기를 클릭]%s 앨범 카테고리 관리 페이지로 돌아갑니다.';
$lang['Category_updated'] = '이 카테고리가 성공적으로 업데이트 되었습니다.';
$lang['Delete_Category'] = '카텍고리 삭제';
$lang['Delete_Category_Explain'] = '카테고리에 포함된 이미지도 삭제 되므로 주의해 주세요.';
$lang['Delete_all_pics'] = '이미지 전체 삭제';
$lang['Category_deleted'] = '이 카테고리가 성공적으로 삭제되었습니다.';
$lang['Category_changed_order'] = '이 카테고리의 순서가 성공적으로 변경되었습니다.';

//
// Permissions
//
$lang['Album_Auth_Title'] = '앨범 권한 설정';
$lang['Album_Auth_Explain'] = '여기에서 앨범 카테고리별로 사용자그룹의 관리 권한을 설정할 수 있습니다.';
$lang['Select_a_Category'] = '카테고리 선택';
$lang['Look_up_Category'] = '카테고리 보기';
$lang['Album_Auth_successfully'] = '권한이 성공적으로 업데이트 되었습니다.';
$lang['Click_return_album_auth'] = '%s[여기를 클릭]%s 하시면 앨범 권한 설정 페이지로 돌아갑니다.';

$lang['Upload'] = '업로드';
$lang['Rate'] = '투 표';
$lang['Comment'] = '코멘트';

//
// Clear Cache
//
$lang['Clear_Cache'] = 'Cache 삭제';
$lang['Album_clear_cache_confirm'] = '썸네일 Cache 기능을 다시 사용할려면 환경설정에서 설정을 다시 변경해야 합니다..<br /><br /> 정말 Cache를 제거하시겠습니까..?';
$lang['Thumbnail_cache_cleared_successfully'] = '<br />썸네일 Cache를 성공적으로 제거하였습니다.<br />&nbsp;';


?>