<?php
// 개별 삭제 로직
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/bbs/bbs.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/function/common.php');
require ROOT.'lib/class/member/login.class.php';

$bbs_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$bbs_code = isset($_POST['code']) ? Xss::chkXSS($_POST['code']) : null;
$user_idx = isset($_POST['uidx']) ? Xss::chkXSS($_POST['uidx']) : null;

/*
//로그인 체크후 사용 가능
if( ! Login::getLoginWriteLevel($Bbs->attr['user_idx'])){
   exit;
}else{
	exit;
}
*/

if (!is_null($bbs_idx) && !is_null($bbs_code) &&  Login::getLoginWriteLevel($user_idx ) ) {
	$Bbs = new Bbs();
	$Bbs->setAttr('bbs_idx', $bbs_idx);
	$Bbs->setAttr('bbs_code', $bbs_code);
	$result = ($Bbs->delete($dbh)) ? 1 : 0;
	$dbh = null;
}
else {
	$result = 0;
}
?>
{"cnt":<?php echo $result ;?>}