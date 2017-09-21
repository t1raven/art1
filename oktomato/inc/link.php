<?
// 사이트 전제 경로설정
$site_home_name = "ART1";
$web_site_url = "/";
$currentFolder = "/oktomato/";
$develop_company = "OKTOMATO";

// 기본 타이틀 및 링크설정
$main_title_0th = "index";
$main_title_0th_url = $currentFolder."/";

$main_title_1th = "art1";
//$main_title_1th_url = $currentFolder."ah/ah_management_list.php";
$main_title_1th_url = $currentFolder."main/banner/?at=write";
		// 페이지 타이틀
		//$title_01_01th = "AH 관리";
		$title_01_01th = "메인 뉴스/베너관리";
		//$link_01_01 = $currentFolder."ah/ah_management_list.php";
		$link_01_01 = $currentFolder."main/banner/?at=write";


$main_title_2th = "News";
//$main_title_2th_url = $currentFolder."news/type.php";
$main_title_2th_url = $currentFolder."news/newstype/?at=list"; //스킨적용 by 이용태
		// 페이지 타이틀
		$title_02_01th = "타입관리";
		$title_02_02th = "뉴스관리";
		$title_02_03th = "워터마크관리";
		$title_02_04th = "뉴스 배너관리";
		/*
		$title_02_03th = "People";
		$title_02_04th = "World";
		$title_02_05th = "Trouble";
		$title_02_06th = "Episode";
		$title_02_07th = "Notice";
		*/
		//$link_02_01 = $currentFolder."news/type.php";
		$link_02_01 = $currentFolder."news/newstype/?at=list"; //스킨적용 by 이용태
		//$link_02_02 = $currentFolder."news/news.php";
		$link_02_02 = $currentFolder."news/news/?at=list"; //스킨적용 by 이용태
		$link_02_03 = $currentFolder."news/watermark/?at=write"; //스킨적용 by 이용태
		$link_02_04 = $currentFolder."news/banner/?at=write"; //스킨적용 by 정종효
		/*
		$link_02_03 = $currentFolder."news/people.php";
		$link_02_04 = $currentFolder."news/world.php";
		$link_02_05 = $currentFolder."news/trouble.php";
		$link_02_06 = $currentFolder."news/episode.php";
		$link_02_07 = $currentFolder."news/notice.php";
		*/


$main_title_3th = "Market";
$main_title_3th_url = $currentFolder."market/artist/index.php";
		// 페이지 타이틀


		$title_03_01th = "작가관리";
		$title_03_02th = "작품관리";
		$title_03_03th = "추천인관리";
		$title_03_04th = "마켓메인관리";
		$title_03_05th = "기획전관리";
		$title_03_06th = "아트상품관리";
		$title_03_07th = "Q&amp;A관리";
		$title_03_08th = "상담관리";
		$title_03_09th = "렌탈관리";
		$title_03_10th = "주문관리";
		$title_03_11th = "마켓바베너관리";
		$link_03_01 = $currentFolder."market/artist/index.php";
		$link_03_02 = $currentFolder."market/work/index.php";
		$link_03_03 = $currentFolder."market/recommend/index.php";
		$link_03_04 = $currentFolder."market/marketmain/index.php";
		$link_03_05 = $currentFolder."market/event/index.php";
		$link_03_06 = $currentFolder."market/goods/index.php";
		$link_03_07 = $currentFolder."market/qna_management_list.php";
//		$link_03_08 = $currentFolder."market/advice_management_list.php";
		$link_03_08 = $currentFolder."market/advice/";
		$link_02_08 = $currentFolder."consult/list.php"; // 스킨화 적용
		$link_03_09 = $currentFolder."market/rental_order_management_list.php";
		$link_03_10 = $currentFolder."market/order";
		$link_03_11 = $currentFolder."market/banner/?at=write";


$main_title_4th = "Articovery";
//$main_title_4th_url = $currentFolder."artcovery/pin/order_management_list.php";
$main_title_4th_url = $currentFolder."articovery/covery";

		// 페이지 타이틀
		$title_04_01th = "아티커버리관리";
		$title_04_02th = "작가관리";
		$title_04_03th = "작품관리";
		$title_04_04th = "POINT관리";
		$title_04_05th = "POINT 댓글관리";
		$title_04_06th = "PIN 응모자";
		$title_04_07th = "POINT 응모자";

		// 페이지 링크
		$link_04_01 = $currentFolder."articovery/covery";
		$link_04_02 = $currentFolder."articovery/artist";
		$link_04_03 = $currentFolder."articovery/work";
		$link_04_04 = $currentFolder."articovery/point";
		$link_04_05 = $currentFolder."articovery/comment";
		$link_04_06 = $currentFolder."articovery/pin";
		$link_04_07 = $currentFolder."articovery/event";



$main_title_5th = "Preview";
//$main_title_5th_url = $currentFolder."exhibition/exhibition.php";
$main_title_5th_url = $currentFolder."exhibition/"; //스킨적용 by 이용태
		// 페이지 타이틀
		$title_05_01th = "전시관리";
		//$link_05_01 = $currentFolder."exhibition/exhibition.php";
		$link_05_01 = $currentFolder."exhibition/"; //스킨적용 by 이용태




$main_title_6th = "Social";
//$main_title_6th_url = $currentFolder."social/sns_link.php";
$main_title_6th_url = $currentFolder."social/snslink/"; //스킨적용 by 이용태
		// 페이지 타이틀
		$title_06_01th = "SNS링크관리";
		$title_06_02th = "컨텐츠관리";
		//$link_06_01 = $currentFolder."social/sns_link.php";
		$link_06_01 = $currentFolder."social/snslink/"; //스킨적용 by 이용태
		//$link_06_02 = $currentFolder."social/contens_management.php";
		$link_06_02 = $currentFolder."social/snscontents/"; //스킨적용 by 이용태

$main_title_7th = "Admin Info";
//$main_title_7th_url = $currentFolder."admininfo/sub_01.php";
$main_title_7th_url = $currentFolder."admininfo/admininfo/index.php"; //스킨적용 by 이용태
		// 페이지 타이틀
		$title_07_01th = "관리자정보";
		$title_07_02th = "약관관리";
		$title_07_03th = "금칙어관리";
		//$link_07_01 = $currentFolder."admininfo/sub_01.php";
		$link_07_01 = $currentFolder."admininfo/admininfo/index.php"; //스킨적용 by 이용태
		//$link_07_02 = $currentFolder."admininfo/sub_02.php";
		$link_07_02 = $currentFolder."admininfo/provision/?at=write"; //스킨적용 by 이용태
		//$link_07_03 = $currentFolder."admininfo/sub_03.php";
		$link_07_03 = $currentFolder."admininfo/badwords/index.php"; //스킨적용 by 이용태

$main_title_8th = "Member";
//$main_title_8th_url = $currentFolder."member/sub_01.php";
$main_title_8th_url = $currentFolder."member/"; //스킨적용 by 이용태
		// 페이지 타이틀
		$title_08_01th = "회원관리";
		$title_08_02th = "뉴스레터신청관리";
		$title_08_03th = "뉴스레터발송관리";
		//$link_08_01 = $currentFolder."member/sub_01.php";
		$link_08_01 = $currentFolder."member/"; //스킨적용 by 이용태
		//$link_08_02 = $currentFolder."member/sub_02.php";
		$link_08_02 = $currentFolder."member/newsletter/index.php";//스킨적용 by 이용태
		$link_08_03 = $currentFolder."member/sendmail/index.php";


$main_title_9th = "Stats";
$main_title_9th_url = $currentFolder."stats/times.php";
		// 페이지 타이틀
		$title_09_01th = "시간별통계";
		$title_09_02th = "일별통계";
		$title_09_03th = "월별통계";
		$title_09_04th = "접속환경통계";
		$title_09_05th = "매출통계";
		$title_09_06th = "경로별통계";
		$link_09_01 = $currentFolder."stats/times.php";
		$link_09_02 = $currentFolder."stats/days.php";
		$link_09_03 = $currentFolder."stats/months.php";
		$link_09_04 = $currentFolder."stats/enviroment.php";
		$link_09_05 = $currentFolder."stats/sale.php";
		$link_09_06 = $currentFolder."stats/referrer.php";

// 카테고리 설정
switch($pageNum){
	case ("01") :
//		$ov1 = "_o"; $ov2 = ""; $ov3 = ""; $ov4 = ""; $ov5 = ""; $ov6 = ""; $ov7 = ""; $ov8 = ""; $ov9 = ""; $ov10 = "";
		$position_title = $main_title_1th; $position_title_url = $main_title_1th_url;
			switch($subNum){
				case ("01") : $position_title_sub = $title_01_01th; $position_title_sub_url = $link_01_01; break;
				case ("02") : $position_title_sub = $title_01_02th; $position_title_sub_url = $link_01_02; break;
				case ("03") : $position_title_sub = $title_01_03th; $position_title_sub_url = $link_01_03; break;
				case ("04") : $position_title_sub = $title_01_04th; $position_title_sub_url = $link_01_04; break;
				case ("05") : $position_title_sub = $title_01_05th; $position_title_sub_url = $link_01_05; break;
				case ("06") : $position_title_sub = $title_01_06th; $position_title_sub_url = $link_01_06; break;
				case ("07") : $position_title_sub = $title_01_07th; $position_title_sub_url = $link_01_07; break;
				case ("08") : $position_title_sub = $title_01_08th; $position_title_sub_url = $link_01_08; break;
				case ("09") : $position_title_sub = $title_01_09th; $position_title_sub_url = $link_01_09; break;
				case ("10") : $position_title_sub = $title_01_10th; $position_title_sub_url = $link_01_10; break;
			}
break;
}
switch($pageNum){
	case ("02") :
//		$ov1 = ""; $ov2 = "_o"; $ov3 = ""; $ov4 = ""; $ov5 = ""; $ov6 = ""; $ov7 = ""; $ov8 = ""; $ov9 = ""; $ov10 = "";
		$position_title = $main_title_2th; $position_title_url = $main_title_2th_url;
			switch($subNum){
				case ("01") : $position_title_sub = $title_02_01th; $position_title_sub_url = $link_02_01; break;
				case ("02") : $position_title_sub = $title_02_02th; $position_title_sub_url = $link_02_02; break;
				case ("03") : $position_title_sub = $title_02_03th; $position_title_sub_url = $link_02_03; break;
				case ("04") : $position_title_sub = $title_02_04th; $position_title_sub_url = $link_02_04; break;
				case ("05") : $position_title_sub = $title_02_05th; $position_title_sub_url = $link_02_05; break;
				case ("06") : $position_title_sub = $title_02_06th; $position_title_sub_url = $link_02_06; break;
				case ("07") : $position_title_sub = $title_02_07th; $position_title_sub_url = $link_02_07; break;
				case ("08") : $position_title_sub = $title_02_08th; $position_title_sub_url = $link_02_08; break;
				case ("09") : $position_title_sub = $title_02_09th; $position_title_sub_url = $link_02_09; break;
				case ("10") : $position_title_sub = $title_02_10th; $position_title_sub_url = $link_02_10; break;
			}
break;
}
// 카테고리 설정
switch($pageNum){
	case ("03") :
//		$ov1 = "_o"; $ov2 = ""; $ov3 = ""; $ov4 = ""; $ov5 = ""; $ov6 = ""; $ov7 = ""; $ov8 = ""; $ov9 = ""; $ov10 = "";
		$position_title = $main_title_3th; $position_title_url = $main_title_3th_url;
			switch($subNum){
				case ("01") : $position_title_sub = $title_03_01th; $position_title_sub_url = $link_03_01; break;
				case ("02") : $position_title_sub = $title_03_02th; $position_title_sub_url = $link_03_02; break;
				case ("03") : $position_title_sub = $title_03_03th; $position_title_sub_url = $link_03_03; break;
				case ("04") : $position_title_sub = $title_03_04th; $position_title_sub_url = $link_03_04; break;
				case ("05") : $position_title_sub = $title_03_05th; $position_title_sub_url = $link_03_05; break;
				case ("06") : $position_title_sub = $title_03_06th; $position_title_sub_url = $link_03_06; break;
				case ("07") : $position_title_sub = $title_03_07th; $position_title_sub_url = $link_03_07; break;
				case ("08") : $position_title_sub = $title_03_08th; $position_title_sub_url = $link_03_08; break;
				case ("09") : $position_title_sub = $title_03_09th; $position_title_sub_url = $link_03_09; break;
				case ("10") : $position_title_sub = $title_03_10th; $position_title_sub_url = $link_03_10; break;
				case ("11") : $position_title_sub = $title_03_11th; $position_title_sub_url = $link_03_11; break;
			}
break;
}
switch($pageNum){
	case ("04") :
//		$ov1 = ""; $ov2 = "_o"; $ov3 = ""; $ov4 = ""; $ov5 = ""; $ov6 = ""; $ov7 = ""; $ov8 = ""; $ov9 = ""; $ov10 = "";
		$position_title = $main_title_4th; $position_title_url = $main_title_4th_url;
			switch($subNum){
				case ("01") : $position_title_sub = $title_04_01th; $position_title_sub_url = $link_04_01; break;
				case ("02") : $position_title_sub = $title_04_02th; $position_title_sub_url = $link_04_02; break;
				case ("03") : $position_title_sub = $title_04_03th; $position_title_sub_url = $link_04_03; break;
				case ("04") : $position_title_sub = $title_04_04th; $position_title_sub_url = $link_04_04; break;
				case ("05") : $position_title_sub = $title_04_05th; $position_title_sub_url = $link_04_05; break;
				case ("06") : $position_title_sub = $title_04_06th; $position_title_sub_url = $link_04_06; break;
				case ("07") : $position_title_sub = $title_04_07th; $position_title_sub_url = $link_04_07; break;
				case ("08") : $position_title_sub = $title_04_08th; $position_title_sub_url = $link_04_08; break;
				case ("09") : $position_title_sub = $title_04_09th; $position_title_sub_url = $link_04_09; break;
				case ("10") : $position_title_sub = $title_04_10th; $position_title_sub_url = $link_04_10; break;
			}
break;
}
// 카테고리 설정
switch($pageNum){
	case ("05") :
//		$ov1 = "_o"; $ov2 = ""; $ov3 = ""; $ov4 = ""; $ov5 = ""; $ov6 = ""; $ov7 = ""; $ov8 = ""; $ov9 = ""; $ov10 = "";
		$position_title = $main_title_5th; $position_title_url = $main_title_5th_url;
			switch($subNum){
				case ("01") : $position_title_sub = $title_05_01th; $position_title_sub_url = $link_05_01; break;
				case ("02") : $position_title_sub = $title_05_02th; $position_title_sub_url = $link_05_02; break;
				case ("03") : $position_title_sub = $title_05_03th; $position_title_sub_url = $link_05_03; break;
				case ("04") : $position_title_sub = $title_05_04th; $position_title_sub_url = $link_05_04; break;
				case ("05") : $position_title_sub = $title_05_05th; $position_title_sub_url = $link_05_05; break;
				case ("06") : $position_title_sub = $title_05_06th; $position_title_sub_url = $link_05_06; break;
				case ("07") : $position_title_sub = $title_05_07th; $position_title_sub_url = $link_05_07; break;
				case ("08") : $position_title_sub = $title_05_08th; $position_title_sub_url = $link_05_08; break;
				case ("09") : $position_title_sub = $title_05_09th; $position_title_sub_url = $link_05_09; break;
				case ("10") : $position_title_sub = $title_05_10th; $position_title_sub_url = $link_05_10; break;
			}
break;
}
switch($pageNum){
	case ("06") :
//		$ov1 = ""; $ov2 = "_o"; $ov3 = ""; $ov4 = ""; $ov5 = ""; $ov6 = ""; $ov7 = ""; $ov8 = ""; $ov9 = ""; $ov10 = "";
		$position_title = $main_title_6th; $position_title_url = $main_title_6th_url;
			switch($subNum){
				case ("01") : $position_title_sub = $title_06_01th; $position_title_sub_url = $link_06_01; break;
				case ("02") : $position_title_sub = $title_06_02th; $position_title_sub_url = $link_06_02; break;
				case ("03") : $position_title_sub = $title_06_03th; $position_title_sub_url = $link_06_03; break;
				case ("04") : $position_title_sub = $title_06_04th; $position_title_sub_url = $link_06_04; break;
				case ("05") : $position_title_sub = $title_06_05th; $position_title_sub_url = $link_06_05; break;
				case ("06") : $position_title_sub = $title_06_06th; $position_title_sub_url = $link_06_06; break;
				case ("07") : $position_title_sub = $title_06_07th; $position_title_sub_url = $link_06_07; break;
				case ("08") : $position_title_sub = $title_06_08th; $position_title_sub_url = $link_06_08; break;
				case ("09") : $position_title_sub = $title_06_09th; $position_title_sub_url = $link_06_09; break;
				case ("10") : $position_title_sub = $title_06_10th; $position_title_sub_url = $link_06_10; break;
			}
break;
}
// 카테고리 설정
switch($pageNum){
	case ("07") :
//		$ov1 = "_o"; $ov2 = ""; $ov3 = ""; $ov4 = ""; $ov5 = ""; $ov6 = ""; $ov7 = ""; $ov8 = ""; $ov9 = ""; $ov10 = "";
		$position_title = $main_title_7th; $position_title_url = $main_title_7th_url;
			switch($subNum){
				case ("01") : $position_title_sub = $title_07_01th; $position_title_sub_url = $link_07_01; break;
				case ("02") : $position_title_sub = $title_07_02th; $position_title_sub_url = $link_07_02; break;
				case ("03") : $position_title_sub = $title_07_03th; $position_title_sub_url = $link_07_03; break;
				case ("04") : $position_title_sub = $title_07_04th; $position_title_sub_url = $link_07_04; break;
				case ("05") : $position_title_sub = $title_07_05th; $position_title_sub_url = $link_07_05; break;
				case ("06") : $position_title_sub = $title_07_06th; $position_title_sub_url = $link_07_06; break;
				case ("07") : $position_title_sub = $title_07_07th; $position_title_sub_url = $link_07_07; break;
				case ("08") : $position_title_sub = $title_07_08th; $position_title_sub_url = $link_07_08; break;
				case ("09") : $position_title_sub = $title_07_09th; $position_title_sub_url = $link_07_09; break;
				case ("10") : $position_title_sub = $title_07_10th; $position_title_sub_url = $link_07_10; break;
			}
break;
}
switch($pageNum){
	case ("08") :
//		$ov1 = ""; $ov2 = "_o"; $ov3 = ""; $ov4 = ""; $ov5 = ""; $ov6 = ""; $ov7 = ""; $ov8 = ""; $ov9 = ""; $ov10 = "";
		$position_title = $main_title_8th; $position_title_url = $main_title_8th_url;
			switch($subNum){
				case ("01") : $position_title_sub = $title_08_01th; $position_title_sub_url = $link_08_01; break;
				case ("02") : $position_title_sub = $title_08_02th; $position_title_sub_url = $link_08_02; break;
				case ("03") : $position_title_sub = $title_08_03th; $position_title_sub_url = $link_08_03; break;
				case ("04") : $position_title_sub = $title_08_04th; $position_title_sub_url = $link_08_04; break;
				case ("05") : $position_title_sub = $title_08_05th; $position_title_sub_url = $link_08_05; break;
				case ("06") : $position_title_sub = $title_08_06th; $position_title_sub_url = $link_08_06; break;
				case ("07") : $position_title_sub = $title_08_07th; $position_title_sub_url = $link_08_07; break;
				case ("08") : $position_title_sub = $title_08_08th; $position_title_sub_url = $link_08_08; break;
				case ("09") : $position_title_sub = $title_08_09th; $position_title_sub_url = $link_08_09; break;
				case ("10") : $position_title_sub = $title_08_10th; $position_title_sub_url = $link_08_10; break;
			}
break;
}
// 카테고리 설정
switch($pageNum){
	case ("09") :
//		$ov1 = "_o"; $ov2 = ""; $ov3 = ""; $ov4 = ""; $ov5 = ""; $ov6 = ""; $ov7 = ""; $ov8 = ""; $ov9 = ""; $ov10 = "";
		$position_title = $main_title_9th; $position_title_url = $main_title_9th_url;
			switch($subNum){
				case ("01") : $position_title_sub = $title_09_01th; $position_title_sub_url = $link_09_01; break;
				case ("02") : $position_title_sub = $title_09_02th; $position_title_sub_url = $link_09_02; break;
				case ("03") : $position_title_sub = $title_09_03th; $position_title_sub_url = $link_09_03; break;
				case ("04") : $position_title_sub = $title_09_04th; $position_title_sub_url = $link_09_04; break;
				case ("05") : $position_title_sub = $title_09_05th; $position_title_sub_url = $link_09_05; break;
				case ("06") : $position_title_sub = $title_09_06th; $position_title_sub_url = $link_09_06; break;
				case ("07") : $position_title_sub = $title_09_07th; $position_title_sub_url = $link_09_07; break;
				case ("08") : $position_title_sub = $title_09_08th; $position_title_sub_url = $link_09_08; break;
				case ("09") : $position_title_sub = $title_09_09th; $position_title_sub_url = $link_09_09; break;
				case ("10") : $position_title_sub = $title_09_10th; $position_title_sub_url = $link_09_10; break;
			}
break;
}
switch($pageNum){
	case ("10") :
//		$ov1 = ""; $ov2 = "_o"; $ov3 = ""; $ov4 = ""; $ov5 = ""; $ov6 = ""; $ov7 = ""; $ov8 = ""; $ov9 = ""; $ov10 = "";
		$position_title = $main_title_10th; $position_title_url = $main_title_10th_url;
			switch($subNum){
				case ("01") : $position_title_sub = $title_10_01th; $position_title_sub_url = $link_10_01; break;
				case ("02") : $position_title_sub = $title_10_02th; $position_title_sub_url = $link_10_02; break;
				case ("03") : $position_title_sub = $title_10_03th; $position_title_sub_url = $link_10_03; break;
				case ("04") : $position_title_sub = $title_10_04th; $position_title_sub_url = $link_10_04; break;
				case ("05") : $position_title_sub = $title_10_05th; $position_title_sub_url = $link_10_05; break;
				case ("06") : $position_title_sub = $title_10_06th; $position_title_sub_url = $link_10_06; break;
				case ("07") : $position_title_sub = $title_10_07th; $position_title_sub_url = $link_10_07; break;
				case ("08") : $position_title_sub = $title_10_08th; $position_title_sub_url = $link_10_08; break;
				case ("09") : $position_title_sub = $title_10_09th; $position_title_sub_url = $link_10_09; break;
				case ("10") : $position_title_sub = $title_10_10th; $position_title_sub_url = $link_10_10; break;
			}
break;
}
?>