<?php
header('Content-Type:text/html;charset=utf-8');
/**********************************************************************
* Title             : 각종환경 설정 및 설정파일 include
**********************************************************************/

# FORM CACHE
if( $_GET['Cache'] == 'On' || $_POST['Cache'] == 'On' )
{
	# CACHE
	session_cache_limiter('private, must-revalidate');
}
else
{
	# NO CACHE
	header('Expires: Mon, 26 Jul 1970 01:00:00 GMT');
	header('Last-Modified: '.gmdate("D,d M Y H:i:s").' GMT');
	header('Cache-Control: must-revalidate,post-check=0,pre-check=0', false);
	header('Pragma: no-cache');
}

# header
header('p3p: CP=\"ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC\"');

# DEFAULT VALUE
$PUBLIC['HOME'] = 'http://'.$_SERVER['SERVER_NAME'];
$PUBLIC['DOM'] = str_replace('www.', '', $_SERVER['SERVER_NAME']);
$PUBLIC['SITE'] = $_SERVER['SERVER_NAME'];
$PUBLIC['SITE_NAME'] = '(주)아트1닷컴';
$PUBLIC['SITE_MAIL'] = 'art1@art1.com';
$PUBLIC['SHARE_URL'] = urlencode($PUBLIC['HOME'].$_SERVER['PHP_SELF']);
$PUBLIC['PROTOCOL'] = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';

# DEFAULT VALUE SETUP
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('HOME', $PUBLIC['HOME']);
define('DOM', $PUBLIC['DOM']);
define('SITE', $PUBLIC['SITE']);
define('SITE_NAME', $PUBLIC['SITE_NAME']);
define('SITE_MAIL', $PUBLIC['SITE_MAIL']);
define('SHARE_URL', $PUBLIC['SHARE_URL']);
define('PHP_SELF', $_SERVER['PHP_SELF']);
define('PROTOCOL', $PUBLIC['PROTOCOL']);
define('MYSQL_KEY', 'fslial');
define('SOURCE_EXT', '.php');
define('AES_KEY', 'f0211f1f8fde82df2938c6559ef029596c9f85cd21c11a637bca71a921b07a47');
define('MASTER', 'db1aa34863cb04c46a7f0c096a56218fddb9162e10027726249fc031bbd5bd2b');
define('DORO_KEY', 'D274DEADE969F150118F020776BAD4D8');
define('WS_URL',  'http://ws.didim365.com/address/addr.aspx');
define('ACTION_IFRAME', '<iframe style="position:absolute; left:-2000px; top:-2000px;" name="action_ifrm" id="action_ifrm" title="빈프레임" width="0" height="0" frameborder="0"></iframe>');

# DIRECTORY CONSTANT DEFINE
//define('UPLOAD_DIR', ROOT.'/upload');
define('UPLOAD_DIR', '/upload/'); //-- 기본업로드 폴더
define('memberUploadPath', UPLOAD_DIR.'member/'); //-- 회원사진

// add
define('tempUploadPath', UPLOAD_DIR.'temp/'); //-- 업로드 파일 임시 저장소
define('bbsUploadPath', UPLOAD_DIR.'bbs/'); //-- 게시판 업로드 파일 저장소
define('emailUploadPath', UPLOAD_DIR.'email/'); //-- 이메일 업로드 파일 저장소
define('artistUploadPath', UPLOAD_DIR.'artist/'); //-- 작가 업로드 파일 저장소
define('workUploadPath', UPLOAD_DIR.'work/'); //-- 작품 업로드 파일 저장소
define('exhUploadPath', UPLOAD_DIR.'exh/'); //-- 전시 업로드 파일 저장소
define('recommendUploadPath', UPLOAD_DIR.'recommend/'); //--추천 업로드 파일 저장소

define('goodsUploadPath', UPLOAD_DIR.'goods/'); //--상품 업로드 파일 저장소
define('goodsListImgUploadPath', UPLOAD_DIR.'goods/list/'); //--상품 목록 이미지 파일 저장소
define('goodsBigImgUploadPath', UPLOAD_DIR.'goods/big/'); //--상품 원본 이미지 파일 저장소
define('goodsMiddleImgUploadPath', UPLOAD_DIR.'goods/middle/'); //--상품 중간 이미지 파일 저장소
define('goodsSmallImgUploadPath', UPLOAD_DIR.'goods/small/'); //--상품 최소 이미지 파일 저장소
define('goodsThumbImgUploadPath', UPLOAD_DIR.'goods/thumb/'); //--상품 섬네일 이미지 파일 저장소(300 * 비율)
define('eventUploadPath', UPLOAD_DIR.'event/'); //--기획전 이미지 파일 저장소
define('goodsScaleImgUploadPath', UPLOAD_DIR.'goods/scale/'); //--상품 사이즈 비교를 위한 이미지 파일 저장소 //이용태

define('newsUploadPath', UPLOAD_DIR.'news/'); //-- News 업로드 파일 저장소
define('snsUploadPath', UPLOAD_DIR.'sns/'); //-- SNS 업로드 파일 저장소

define('marketMainUploadPath', UPLOAD_DIR.'market/main/'); //-- Market Main Banner 업로드 파일 저장소
define('marketGenreUploadPath', UPLOAD_DIR.'market/genre/'); //-- Market Genre Banner 업로드 파일 저장소
define('bannerUploadPath', UPLOAD_DIR.'banner/'); //-- 배너 업로드 파일 저장소

// Galleries
define('galleriesArtistsUploadPath', UPLOAD_DIR.'galleries/artists/'); //-- 갤러리즈 artists 업로드 파일 저장소
define('galleriesArtworksUploadPath', UPLOAD_DIR.'galleries/artworks/'); //-- 갤러리즈 artworks 업로드 파일 저장소
define('galleriesExhibitionsUploadPath', UPLOAD_DIR.'galleries/exhibitions/'); //-- 갤러리즈 exhibitions 업로드 파일 저장소
define('galleriesArtFairsUploadPath', UPLOAD_DIR.'galleries/artfairs/'); //-- 갤러리즈 artfairs 업로드 파일 저장소
define('galleriesAboutUploadPath', UPLOAD_DIR.'galleries/about/'); //-- 갤러리즈 about 업로드 파일 저장소
define('galleriesBannerUploadPath', UPLOAD_DIR.'galleries/banner/'); //-- 갤러리즈 banner 업로드 파일 저장소



define('PGLogPath', '../../pg/log/'); //-- PG Log 경로

define('FAIL_CNT', 5);
define('JOIN_PREFIX', 'join-');

define('OKTOMATO', TRUE); // 개별 페이지 실행 금지
//define('ARTWORKSLISTCOUNT', 13); // 작품 출력 갯수
define('ARTWORKSLISTCOUNT', 30); // 작품 출력 갯수



# SESSION & COOKIE
ini_set('session.cookie_domain', DOM);
ini_set('session.gc_maxlifetime', '3600');
ini_set('session.save_path', ROOT.'/SessionDir');
//session_set_cookie_params(0, "/", HOME);
//session_cache_limiter(''); // nocache, public, private
if($_REQUEST['SessionSwitch'] != 'OFF') Session_Start();


# DATABASE CONNECTION
$SITEDB['host'] = '119.205.211.196';
$SITEDB['user'] = 'art1';
$SITEDB['pass'] = 'i8q$p2nyzinj8@r';
$SITEDB['db'] = 'art1_com';
//$SITEDB_CONNECT = mysql_connect($SITEDB['host'], $SITEDB['user'], $SITEDB['pass']) or die("FAILED CONNECTION DATABASE");
//$SITEDB_MSD = mysql_select_db($SITEDB['db'], $SITEDB_CONNECT);
//mysql_query("SET NAMES utf8");
//$DSN = 'mysql:host='.$SITEDB['host'].';dbname='.$SITEDB['db'];
try
{
	$dbh = new PDO('mysql:host='.$SITEDB['host'].';dbname='.$SITEDB['db'], $SITEDB['user'], $SITEDB['pass']);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
	//$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


	$dbh->exec('SET NAMES utf8');
	//$dbh->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
	//echo 'auto:'.$dbh->getAttribute(PDO::ATTR_AUTOCOMMIT);
}
catch (PDOException $e)
{
	echo 'Failed to obtain database handle' . $e->getMessage();
	die();
}





# INCLUDE FILE
require_once ROOT.'/lib/class/util/Lib.php';			# STANDARD METHOD CLASS
require_once ROOT.'/lib/class/util/Js.php';				# JAVASCRIPT CLASS
require_once ROOT.'/lib/class/util/Db.php';			# Db Error CLASS
require_once ROOT.'/lib/class/util/LibDate.php';		# DATE CLASS
require_once ROOT.'/lib/class/util/LibFile.php';		# FILE CLASS
require_once ROOT.'/lib/class/util/PageUtil.php';	# PAGE CLASS
require_once ROOT.'/lib/class/util/Sitecode.php';	# SITECODE CLASS
require_once ROOT.'/lib/class/util/Pagination.php';	# PAGE CLASS
require_once ROOT.'/lib/class/util/AES256.php';	# AES256
require_once ROOT.'/lib/class/util/XSS.php';	# XSS Filter
require_once ROOT.'/lib/class/util/AntiXSS.php';	# XSS Filter
require_once ROOT.'/lib/class/util/BasketCount.php';	# Basket ArtWorks Count


# DEFAULT VALUE
$DEFAULT['NumPerStart'] =  0; # START LIMITER
$DEFAULT['NumPerPage'] = 15; # NUMBER PER PAGE
$DEFAULT['NumPerBlock'] = 10; # NUMBER PER BLOCK
$DEFAULT['RealIp'] = $_SERVER['REMOTE_ADDR'];
$DEFAULT['NowDateTime'] = time();
$DEFAULT['DateTime'] = date('Y-m-d H:i:s');
$DEFAULT['FileSize'] = 20487150;

define('MAXFILESIZE', 20487150 ); //-- 업로드 파일용량 20M

# EXT CHECK
$EXT['IMG'] = 'jpg|jpeg|gif|png';
$EXT['File'] = 'txt|zip|tar|pdf|jpg|gif|png|hwp|doc|ppt|pps|pdf|xls|ai';
$EXT['Help'] = 'hwp|doc|ppt|pdf|xls|jpg|gif|png|zip';
$EXT['PDF'] = 'pdf';
$EXT['AI'] = 'ai';
$EXT['IMG_PDF'] = 'jpg|jpeg|gif|png|pdf';

# MIME CHECK
$MIME['IMG'] = 'image/png|image/jpeg|image/gif';
$MIME['FILE'] = 'application/zip|application/pdf|application/msword|application/vnd.ms-excel|application/vnd.ms-powerpoint';
$MIME['PDF'] ='application/pdf';
$MIME['AI'] ='application/postscript';
$MIME['IMG_PDF'] = 'image/png|image/jpeg|image/gif|application/pdf';
// 'image/png', 'image/jpeg', 'image/gif', 'image/bmp', 'application/zip', 'application/pdf', 'application/msword', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint'


# Controller Info
$aCTL = array('list', 'write', 'update', 'delete', 'read', 'main', 'wish', 'address', 'download', 'complete', 'duplication', 'change', 'account', 'request', 'contact', 'excel_download', 'sort');

# 작품 카테고리
$aMedium = array('회화', '사진', '디자인', '판화', '조각', '미디어', '설치', '기타');
$aEngMedium = array('Conversation', 'Photo', 'Design', 'Print', 'Carving', 'Image', 'Installation', 'Other');

#마켓베너 카테고리 //회화와 판화 위치 변경
$aMedium_new = array('판화', '사진', '디자인', '회화', '조각', '미디어', '설치', '기타');
$aEngMedium_new = array('Print', 'Photo', 'Design', 'Conversation', 'Carving', 'Image', 'Installation', 'Other');

$aSubject = array('풍경', '인물', '정물', '동물', '추상', '공간', '팝아트', '기타');
$aEngSubject = array('Landscape', 'Human', 'Still', 'Animal', 'Abstraction', 'Space', 'Pop', 'Etc');

$aSize = array('S(~50)', 'M(~100)', 'L(100~)', 'ETC');
$aEngSize = array('Small', 'Medium', 'Large', 'LargeX');

$aColor = array('빨강색', '오렌지색', '갈색', '노랑색', '녹색', '하늘색', '파란색', '보라색', '핑크색', '하얀색', '회색', '검정색');
$aEngColor = array('Red', 'Orange', 'Brown', 'Yellow', 'Green', 'Skyblue', 'Blue', 'Purple', 'Pink', 'White', 'Gray', 'black');

//$aPrice = array('50,000 ~ 100,000 원', '100,000 ~ 200,000 원', '200,000 ~ 500,000 원', '500,000 ~ 1,000,000 원', '1,000,000 원 이상');
//$aEngPrice = array('Price1', 'Price2', 'Price3', 'Price4', 'Price5');

$aPrice = array('50 만원 이하', '50 만원 ~ 100 만원', '100 만원 ~ 200 만원', '200 만원 ~ 300 만원',  '300 만원 ~ 400 만원' , '400 만원 ~ 500 만원' , '500 만원 ~ 1,000 만원','1,000 만원 이상');
$aEngPrice = array('Price1', 'Price2', 'Price3', 'Price4', 'Price5', 'Price6', 'Price7', 'Price8');

# 주문 변경 로직
$aTranStateName = array('', '주문접수', '입금완료', '상품준비중', '배송중', '배송완료' , '취소요청', '취소완료', '교환요청', '교환완료', '반품요청', '반품완료', '환불요청', '환불완료');

$GoBack = $HTTP_REFERER;

$OnLoad = '';

$GUEST_VIEW = true;

if ($_SESSION['LOGIN_MEMBER_NAME'] == '' || $_SESSION['LOGIN_MEMBER_NAME'] == null)
{
	$LOGIN_MEMBER_UID = 0;
	$LOGIN_MEMBER_ID = 'GUEST';
	$LOGIN_MEMBER_NAME = '비회원';
}
else
{
	$LOGIN_MEMBER_UID = $_SESSION['LOGIN_MEMBER_UID'];
	$LOGIN_MEMBER_ID = $_SESSION['LOGIN_MEMBER_ID'];
	$LOGIN_MEMBER_NAME = $_SESSION['LOGIN_MEMBER_NAME'];
}



$mobile_agent = array('iPhone', 'IPad', 'iPod', 'BlackBerry', 'Android', 'Windows CE', 'LG', 'MOT', 'SAMSUNG', 'SonyEricsson' );
$check_mobile = false;
$mobileCnt = count($mobile_agent);

for($i=0; $i<$mobileCnt; $i++){
	if(stripos( $_SERVER['HTTP_USER_AGENT'], $mobile_agent[$i] )){
		$check_mobile = true; //모바일 접속
		break;
	}
}

$ie_agent = array("MSIE 7","MSIE 8" );
$check_ie = false;
$ieAgentCnt = count($ie_agent);
for($i=0; $i<$ieAgentCnt; $i++){
	//echo '<script>alert("'.$_SERVER['HTTP_USER_AGENT'].'")</script>';
  if(stripos( $_SERVER['HTTP_USER_AGENT'], $ie_agent[$i] )){
    $check_ie = true; //
    break;
  }
}


$basketCnt = BasketCount::getBasketCount($dbh);

$aryURL = parse_url($_SERVER['HTTP_REFERER']);
?>