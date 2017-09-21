<?php
// 개별 삭제
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/exhibition/exhibition.class.php');

$exh_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
//$exh_idx = isset($_GET['idx']) ? Xss::chkXSS($_GET['idx']) : null;
$result = 0;

if (!is_null($exh_idx)) {
	$Exhibition = new Exhibition();
	$Exhibition->setAttr('exh_idx', $exh_idx);
	
	$result = ($Exhibition->delete($dbh)) ? 1 : 0;
	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}