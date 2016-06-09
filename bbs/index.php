<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/bbs/'.basename(__DIR__).'.class.php';
require ROOT.'lib/class/member/login.class.php';
require ROOT.'lib/class/admininfo/badwords.class.php';
require ROOT.'lib/function/common.php';

//뉴스 서브 메뉴 링크
$news_menu_brief = '/news/index.php?at=list&subm=2';
$news_menu_trend = '/news/index.php?at=list&subm=3';
$news_menu_people = '/news/index.php?at=list&subm=4';
$news_menu_world = '/news/index.php?at=list&subm=14';
$news_menu_trouble = '/news/index.php?at=list&subm=5';
$news_menu_episode = '/news/index.php?at=list&subm=6';
$news_menu_community = '/bbs/?at=list';


function timediff($dateTo){
	//날짜를 받아서 1시간 전이면 00분 전
	//하루 전이면 00 시간 전 이라는 메시지 리턴
	//하루가 지났으면 날짜를 리턴

	$thisTime=new DateTime(date("Y-m-d H:i:s"));
	$dateTo_tmp =new DateTime($dateTo);
	$result = date_diff( $dateTo_tmp, $thisTime);

	if ( $result ->d > 0 ){
		$result_date = substr($dateTo,0,10);
	}elseif($result ->h > 0){
		$result_date =  $result ->h .'시간 전';
	}elseif($result ->i > 0){
		$result_date = sprintf('%02d',$result ->i) .'분 전';
	}elseif($result ->s > 0){
		$result_date = sprintf('%02d',$result ->s) .'초 전';
	}

	//echo $result_date ;
	return $result_date ;

}

function new_diff($dateTo,$hours){
	//날짜와 시간을 받아서 시간 이내면 true //new 를 표시하기 위해 사용
	$timefrom =strtotime($dateTo) + 60*60*$hours; 
	$timefrom = date($timefrom); 
	$todatytime = time(); 
	//echo $todatytime;
	//echo '<br>';
	//echo $timefrom;
	if($timefrom >= $todatytime){
		$result = true ;
	}else{
		$result = false ;
	}
	return  $result ;

}
//echo strtotime('+24 hour', '2015-01-25 16:23:24');
//echo '  dd :'.new_diff('2015-01-22 16:23:24',24); 

require ROOT.'lib/include/controler.inc.php';

/*
define('SOURCE_EXT', '.php');

$action = isset($_REQUEST['at']) ? $_REQUEST['at'] : 'write';

include_once($action.SOURCE_EXT);
//include_once('write.php');


//include_once "$_SERVER[DOCUMENT_ROOT]/common.php";
*/
/*
switch ($ptype)
{
	case 'read' : include_once($_SERVER['DOCUMENT_ROOT'].'bbs/read.php'); break;
	case 'write' : include_once('write.php'); break;
	case 'update' : include_once($_SERVER['DOCUMENT_ROOT'].'bbs/update.php'); break;
	default : include_once($_SERVER['DOCUMENT_ROOT'].'bbs/list.php'); break;
}
*/
//update_page("BBS");


?>
