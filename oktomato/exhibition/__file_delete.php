<?php

include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/exhibition/exhibition.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/function/common.php');

$exh_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
//$bbs_code = isset($_POST['code']) ? Xss::chkXSS($_POST['code']) : null;
$file_idx = isset($_POST['file_idx']) ? Xss::chkXSS($_POST['file_idx']) : null;

/*
$exh_idx = isset($_GET['idx']) ? Xss::chkXSS($_GET['idx']) : null;
//$bbs_code = isset($_POST['code']) ? Xss::chkXSS($_POST['code']) : null;
$file_idx = isset($_GET['file_idx']) ? Xss::chkXSS($_GET['file_idx']) : null;
*/
//echo("$exh_idx , $file_idx <br>");

if (!is_null($exh_idx)  && !is_null($file_idx)) {
	$Exhibition = new Exhibition();
	$Exhibition->setAttr('exh_idx', $exh_idx);
	//$Exhibition->setAttr('exh_code', $exh_code);
	$Exhibition->setAttr('exh_upfile_idx', $file_idx);
	$result = ($Exhibition->selectFileDelete($dbh)) ? '__complete' : '__error';
	$dbh = null;
}
else {
	$result = '__error';
}
?>
{"result": "<?php echo $result;?>"}