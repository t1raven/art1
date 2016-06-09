<?php
// 개별 삭제 로직
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/bbs/bbs.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/function/common.php');
require ROOT.'lib/class/member/login.class.php';

$bbs_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$comment_idx = isset($_POST['cidx']) ? Xss::chkXSS($_POST['cidx']) : null;
$user_idx = isset($_POST['uidx']) ? Xss::chkXSS($_POST['uidx']) : null;
/*
$bbs_idx = isset($_GET['idx']) ? Xss::chkXSS($_GET['idx']) : null;
$comment_idx = isset($_GET['cidx']) ? Xss::chkXSS($_GET['cidx']) : null;
$user_idx = isset($_GET['uidx']) ? Xss::chkXSS($_GET['uidx']) : null;

echo $bbs_idx.'<br>';
echo $comment_idx.'<br>';
echo $user_idx.'<br>';
echo Login::getLoginWriteLevel($user_idx ) .'<br>';
//exit;
*/
if (!is_null($bbs_idx) && !is_null($comment_idx) &&  Login::getLoginWriteLevel($user_idx ) ) {
//	echo $user_idx.' 여기<br>';
	$Bbs = new Bbs();
	$Bbs->setAttr('bbs_idx', $bbs_idx);
	$Bbs->setAttr('comment_idx', $comment_idx);
	$result = ($Bbs->getCommentDelete($dbh)) ? 1 : 0;
	$dbh = null;
}
else {
	$result = 0;
}
?>
{"cnt":<?php echo $result ;?>}