<?php
// Version 2.0.1 (needs translating for other language versions!)
// Calendar Addon MOD Language fields

$lang['Calendar'] = "달력";

$lang['Cal_description'] = "설명";
$lang['Cal_day'] = "시작일";
$lang['Cal_hour'] = "시간";
$lang['End_day'] = "만료일";
$lang['End_time'] = "만료시간";
$lang['Cal_subject'] = "제목";
$lang['Cal_add_event'] = "이벤트 추가";
$lang['Cal_submit_event'] = "이벤트 등록";

$lang['Cal_event_not_add'] = "이벤트가 추가되지 않았습니다.";
$lang['Cal_event_delete'] = "이벤트가 삭제되었습니다.";
$lang['Cal_Del_mod'] = "삭제/수정";
$lang['Cal_mod_only'] = "수정";
$lang['Cal_back2cal'] = "달력 홈으로";
$lang['Cal_mod_marked'] = "이벤트 수정";
$lang['Cal_del_marked'] = "이벤트 삭제";
$lang['Cal_must_sel_event'] = "하나의 이벤트를 선택해야 합니다.";
$lang['Cal_edit_own_event'] = "자신의 이벤트만 수정할 수 있습니다.";
$lang['Cal_delete_event'] = "이 이벤트를 지울 수 있는 권한이 없습니다.";
$lang['Cal_not_enough_access'] = "죄송합니다.</ br>권한이 없습니다.";
$lang['Cal_must_member'] = "이 서비스를 이용할 수 있는 권한이 있어야 합니다.";
$lang['Cal_alt_event'] = "현재 :";
$lang['Validate'] = "이벤트 유효화하기";
$lang['Cal_event_validated'] = "지정한 이벤트가 유효화/삭제 되었습니다.";
$lang['No events'] = "이 날짜에 등록된 이벤트가 없습니다.";
$lang['No records'] = "유효화할 이벤트가 없습니다.";
$lang['No records modify'] = "수정 가능한 이벤트가 없습니다.";
$lang['No information'] = "불충분한 정보입니다. 관련된 모든 항목을 채워주세요.";
$lang['Date before today'] = "이미 지난 날짜에 이벤트를 등록할 수 없습니다.";
$lang['Date before start'] = "만료시간이 시작시간보다 빠를 수는 없습니다.";
$lang['No date'] = "시작일과 만료일을 선택해야 합니다.";
$lang['No time'] = "시작 시간과 만료 시간을 선택해야 합니다.";


// New Version 2.0.0 Additions.
$lang['Config_Calendar'] = "달력 설정";
$lang['Config_Calendar_explain'] = "달력을 위한 변수들을 설정하는 곳입니다.";
$lang['Cal_event_add'] = "이벤트가 추가/수정 되었습니다.";
$lang['Cal_add4valid'] = "이벤트가 등록되었습니다.";

$lang['week_start'] = "시작요일";
$lang['subject_length'] = "제목 길이";
$lang['subject_length_explain'] = "달력 형식에 보여줄 이벤트 제목의 길이를 입력하세요<br><i>한글은 2bytes씩이니  짝수를 입력하셔야 합니다.</i>";
$lang['cal_script_path_explain'] = "현재 사용중이지 않습니다."; 
$lang['allow_anon'] = "방문객에게 보는 권한 부여";
$lang['allow_old'] = "지난 날짜에 이벤트 추가 가능";
$lang['allow_old_explain'] = "과거에 이벤트를 올리는 것을 가능하게 합니다.";

$lang['show_headers'] = "WebManager header 정보를 보여준다.";
$lang['cal_date_explain'] = "전체 설정에 의한 date타입과 다를 경우에만 사용하세요 <a href='http://www.php.net/date' target='_other'>date()</a>";
$lang['category'] = "카테고리";

$lang['Cal_config_updated'] = "성공적으로 달력 설정이 업데이트 되었습니다.";
$lang['Cal_return_config'] = '달력 설정으로 돌아가시려면 %s여기%s를 클릭하세요'; 
$lang['allow_categories'] = "이벤트와 함께 카테고리를 이용합니다.";
$lang['require_categories'] = "카테고리가 필요합니다:";

$lang['No_cat_selected'] = "선택된 카테고리가 없습니다.";
$lang['Edit_cat'] = "카테고리 수정";
$lang['Cats_explain'] = "데이터베이스에 카테고리가 추가/수정/삭제 되도록 이곳을 이용하세요.";
$lang['Cats_title'] = "카테고리 관리자";
$lang['Must_enter_cat'] = "카테고리를 입력하셔야 합니다.";
$lang['Cat_updated'] = "카테고리가 업데이트 되었습니다.";
$lang['Cat_added'] = "카테고리가 추가되었습니다.";
$lang['cat_removed'] = "카테고리가 삭제되었습니다";
$lang['Add_new_cat'] = "새로운 카테고리가 추가되었습니다.";
$lang['Click_return_catadmin'] = '카테고리 관리자로 돌아가려면 %s여기%s를 클릭하세요';
$lang['Must_enter_valid_cat'] = "합당한 알파벳/숫자를 입력해야 합니다.";
$lang['Filter_cats_alt'] = "선택한 카테고리만 보기";
$lang['Filter_cats'] = "필터링...";
$lang['Month_jump'] = "선택:";

$lang['Recur_apply_to'] = "변경이 적용될 곳:";
$lang['Recur_future'] = "미래 이벤트";
$lang['Recur_solo'] = "이 이벤트만";
$lang['Recur_all'] = "모든 반복";
$lang['Cal_repeats'] = "반복:";
$lang['until'] = "언제까지";
$lang['Earliest recur before today'] = "시작일을 오늘 이전으로 할 수 없습니다.<BR> 문제의 이벤트: ";
$lang['day'] = "일";
$lang['month'] = "월";
$lang['year'] = "년";
$lang['Event_length'] = "각 이벤트 지속기간:";
$lang['Recur_title'] = "반복 정보";
$lang['Event_title'] = "이벤트 정보";
$lang['Event overlap'] = "반복 이벤트는 시작 이벤트가 끝나기 전에 반복될 수 없습니다.";
$lang['R_period too small'] = "반복 이벤트를 위한 기간이 불충분합니다.";

$lang['Add notes'] = "Entry에 추가 메모하기";
$lang['Add noted title'] = "메모하기";
$lang['Split solo'] = "'Stand-alone' Entry로 분리하기 <i>(더이상 관련된 이벤트들과 같이 업데이트 되지 않습니다.)</i>";
$lang['Split solo title'] = "독립된 이벤트로 분리하기";
$lang['Split future'] = "이 시점이후의 이벤트 모든 Entry 수정";
$lang['Split future title'] = "모든 미래 이벤트 수정";
$lang['Edit all'] = "관련된 모든 Entry 수정";
$land['Edit all title'] = "관련된 모든 이벤트 수정";
$lang['early_iteration'] = "(오늘 이후의 가장 빠른 반복)";

$lang['global subject'] = "전체 제목";
$lang['global desc'] = "전체 이벤트 정보";

$lang['Del future'] = "이 시점 이후에 있는 모든 미래 이벤트를 지웁니다.";
$lang['Del all'] = "모든 이벤트 Entry 삭제 <i>(불리된 Entry는 제외)</i>";
$lang['Del this'] = "하나의 이벤트 삭제";

$lang['Event_num'] = "이벤트 수:";
$lang['of'] = "<i>of</i>";

$lang['Additional info'] = "추가 정보:";
$lang['Event specific'] = "(특별히 이 이벤트에 해당하는):";

$lang['allow_user_post_default'] = "모든 등록된 사용자를 위한 기본 권한";

$lang['no_public'] = '권한없음';
$lang['view_only'] = '보기만';
$lang['view_suggest'] = '보기와 이벤트 추천';
$lang['view_add'] = '보기와 이벤트 추가';
$lang['view_edit_own'] = '보기와 이벤트 추가 (자신의 이벤트 수정/삭제)';
$lang['cal_admin'] = '달력 관리자';

$lang['Invalid date'] = "입력한 날짜에 모순이 있습니다.";
$lang['Empty subject'] = "이벤트 제목을 입력해야 합니다.";
$lang['Empty description'] = "이벤트 설명을 입력해야 합니다.";
$lang['max'] = "최대:";
$lang['Return'] = "돌아갈 목적지: ";

$lang['View All'] = "모두 보기";
$lang['Calendar_Level'] = "달력 레벨";
$lang['Calendar_Categories'] = "달력 카테고리";
$lang['Calendar Config'] = "달력 설정";

$lang['days'] = "일";
$lang['weeks'] = "주";
$lang['months'] = "월";
$lang['years'] = "년";

$lang['view_year'] = "년단위로 보기";
$lang['view_month'] = "월단위로 보기";
$lang['view_week'] = "주단위로 보기";
$lang['view_day'] = "하루단위로 보기";
$lang['view_list'] = "리스트 보기";
$lang['view'] = "보기";

$lang['Submitted_by'] = '등록한 사용자:';

$lang['No_modify_old'] = "지난 이벤트를 수정할 수 없습니다.";
$lang['Cat_in_use'] = "이 카테고리와 연관된 이벤트가 있어 지울 수 없습니다.";


// DEV lang 2.0.25

$lang['require_time'] = "이벤트의 시작/끝 시간을 입력해주십시오.";
$lang['allow_private_event'] = "등록된 사용자만 이용할 수 있는 기능입니다.";
$lang['allow_group_event'] = "등록된 사용자만 이용할 수 있는 기능입니다.";

$lang['event_access'] = "이벤트 입력:";
$lang['private_event'] = "비공개";
$lang['public_event'] = "공개";
$lang['ug_event'] = "허용되지 않은 사용자 그룹";
$lang['group_select'] = "허용된 사용자 그룹: ";

$lang['group_event_explain'] = "<span class='genmed'><i>(하나 이상의 그룹을 선택시 CTRL키를 누른 상태에서 마우스로 클릭하십시오.)</i></span>";
$lang['No_private_events'] = "이벤트를 추가할 권한이 없습니다.";
$lang['time_format'] = "시간 형식";

// DEV lang 2.0.31

$lang['c_first'] = '1st';
$lang['c_second'] = '2nd';
$lang['c_third'] = '3rd';
$lang['c_fourth'] = '4th';
$lang['OR_every'] = '또는 매일:';

?>