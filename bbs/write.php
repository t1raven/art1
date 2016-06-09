<?php
//include_once('skin/basic/write-skin.php');

//로그인 체크후 사용 가능
if( $arr_user = Login::getLoginCheck(urlencode($_SERVER["REQUEST_URI"])) ){
	$user_level_code = $arr_user['user_level_code']; 
	$user_idx = $arr_user['user_idx']; 
}else{
	exit;
}

$bbs_idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;
$bbs_code = isset($_GET['code']) ? $_GET['code'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$search_type = isset($_GET['st']) ? $_GET['st'] : 0;
$word = isset($_GET['word']) ? $_GET['word'] : null;
$category = isset($_GET['category']) ? $_GET['category'] : 10;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$list_size = 1;

$Bbs = new Bbs();
$Bbs->setAttr("bbs_idx", $bbs_idx);
$Bbs->setAttr("bbs_code", $bbs_code);
$Bbs->setAttr("bbs_category", $category);

if ($mode == 'edit') {
	//관리자와 자기가 쓴 글만 수정권한이 있다.


	//$Bbs->getRead($dbh, $bbs_idx, $bbs_code);
	$Bbs->getCommunityRead($dbh, $bbs_idx, $bbs_code);
	$aFileInfo = $Bbs->getFileInfo($dbh, $bbs_idx, $bbs_code);
}
elseif ($mode == 'replay') {

}

include_once('skin/community/write.skin.php');
?>
