<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/exhibition/exhibition.class.php');
// 전시관리
$exh_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$mod = isset($_POST['mod']) ? Xss::chkXSS($_POST['mod']) : null;
//$exh_idx = isset($_GET['idx']) ? Xss::chkXSS($_GET['idx']) : null;
//$mod = isset($_GET['mod']) ? Xss::chkXSS($_GET['mod']) : null;
//echo $exh_idx  .'<br>';
//echo $mod .'<br>';

$result = 0;

if (!is_null($exh_idx)) {
	$Exhibition = new Exhibition();
	$Exhibition->setAttr('exh_idx', $exh_idx);
	$Exhibition->setAttr('mod', $mod);
	
	$result = ($Exhibition->updateConfirm($dbh)) ? 1 : 0;
	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}
