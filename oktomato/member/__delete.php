<?php
// 개별 삭제
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/member/member.class.php');

$user_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
//$user_idx = isset($_GET['idx']) ? Xss::chkXSS($_GET['idx']) : null;
$result = 0;

if (!is_null($user_idx)) {
	$Member = new Member();
	$Member->setAttr('user_idx', $user_idx);
	
	$result = ($Member->delete($dbh)) ? 1 : 0;
	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}