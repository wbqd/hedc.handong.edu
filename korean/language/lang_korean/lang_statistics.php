<?php
/***************************************************************************
*                           lang_statistics.php
*                            -------------------
*   begin                : Tue February 26 2002
*   copyright            : (C) 2002 Nivisec.com
*   email                : admin@nivisec.com
*
*   $Id: lang_statistics.php,v 1.4 2002/11/09 16:04:08 acydburn Exp $
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

// Original Statistics Mod (c) 2002 Nivisec - http://nivisec.com/mods

//
// If you want to credit the Author on the Statistics Page, uncomment the second line.
//
$lang['Version_info'] = '<br />Statistics Mod Version %s'; //%s = number
//$lang['Version_info'] = '<br />Statistics Mod Version %s &copy; 2002 <a href="http://www.opentools.de/board">Acyd Burn</a>';

//
// These Language Variables are available for all installed Modules
//
$lang['Rank'] = '순위';
$lang['Percent'] = '퍼센트';
$lang['Graph'] = '그래프';
$lang['Uses'] = '사용횟수';
$lang['How_many'] = '사용횟수';

//
// Main Language
//

//
// Page Header/Footer
//
$lang['Install_info'] = 'Installed on %s'; //%s = date
$lang['Viewed_info'] = 'Statistics Page Loaded %d Times'; //%d = number
$lang['Statistics_title'] = '통계';

//
// Admin Language
//
$lang['Statistics_management'] = '통계 모듈';
$lang['Statistics_config'] = '통계 설정';

//
// Statistics Config
//
$lang['Statistics_config_title'] = '통계 설정';

$lang['Return_limit'] = '표시개수';
$lang['Return_limit_desc'] = '각 순위에 표시될 개수. 여기에서 설정하면 모든 모듈에 자동으로 전달됩니다.';
$lang['Clear_cache'] = '모듈의 임시파일 삭제';
$lang['Clear_cache_desc'] = '현재 모든 모듈이 생성한 모든 임시파일을 삭제합니다.';
$lang['Modules_directory'] = '모듈 디렉토리';
$lang['Modules_directory_desc'] = '사이트의 홈디렉토리로부터의 상대경로입니다. /나 \를 사용하지 마세요';

//
// Status Messages
//
$lang['Messages'] = '관리자 메시지';
$lang['Updated'] = '수정사항';
$lang['Active'] = '활성화';
$lang['Activate'] = '활성화';
$lang['Activated'] = '활성화됨';
$lang['Not_active'] = '비활성화';
$lang['Deactivate'] = '비활성화';
$lang['Deactivated'] = '비활성화됨';
$lang['Install'] = '설치';
$lang['Installed'] = '설치됨';
$lang['Uninstall'] = '제거';
$lang['Uninstalled'] = '제거됨';
$lang['Move_up'] = '위로 이동';
$lang['Move_down'] = '아래로 이동';
$lang['Update_time'] = '갱신시간';
$lang['Auth_settings_updated'] = '권한설정';

//
// Modules Management
//
$lang['Back_to_management'] = '모듈관리 화면으로';
$lang['Statistics_modules_title'] = '통계관리';

$lang['Module_name'] = '이름';
$lang['Directory_name'] = '디렉토리명';
$lang['Status'] = '상태';
$lang['Update_time_minutes'] = '갱신시간 (분단위)';
$lang['Update_time_desc'] = '통계 갱신을 위해 임시파일을 만드는 시간간격(분단위)';
$lang['Auto_set_update_time'] = '설치되어 활성화된 모든 모듈에 대해 갱신 시간을 설정하세요 (시간이 오래 걸릴 수도 있습니다.)';
$lang['Uninstall_module'] = '모듈제거';
$lang['Uninstall_module_desc'] = '이 모듈이 제거되면 설치명령으로 다시 설치할 수 있습니다. 파일시스템에서 모듈이 지워지지 않고 완전히 지우려면 수작업으로 이 모듈의 디렉토리를 지워야합니다.';
$lang['Active_desc'] = '이 모듈이 활성화되면 권한설정에 따라 표시됩니다.';
$lang['Go'] = '보기';

$lang['Not_allowed_to_install'] = '이 모듈을 설치할 수 없습니다. 대부분의 경우에는 이 모듈을 실행시키기위한 Mod를 설치하지 않았기 때문입니다.';
$lang['Wrong_stats_mod_version'] = 'Statistics Mod의 버젼때문에 이 모듈을 설치할 수 없습니다. 이 모듈을 설치하려면 적어도 Version %s의 Statistics Mod가 필요합니다..'; // replace %s with Version (2.1.3 for example)
$lang['Module_install_error'] = '모듈 설치중 에러가 발생했습니다. 위의 메시지를 참고하세요';

$lang['Preview_debug_info'] = '이 모듈은 %f 초동안 생성되었습니다.: %d 쿼리가 실행되었습니다.'; // Replace %f with seconds and %d with queries
$lang['Update_time_recommend'] = '이 통계모듈은 갱신시간으로 <b>%d</b> 분을 추천합니다.'; // Replace %d with Minutes

?>