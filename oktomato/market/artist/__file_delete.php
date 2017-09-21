<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/classes/bbs/bbs.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/function/common.php');

$bbs_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$bbs_code = isset($_POST['code']) ? Xss::chkXSS($_POST['code']) : null;
$file_idx = isset($_POST['file_idx']) ? Xss::chkXSS($_POST['file_idx']) : null;

if (!is_null($bbs_idx) && !is_null($bbs_code) && !is_null($file_idx)) {
	$Bbs = new Bbs();
	$Bbs->setAttr('bbs_idx', $bbs_idx);
	$Bbs->setAttr('bbs_code', $bbs_code);
	$Bbs->setAttr('file_idx', $file_idx);
	$result = ($Bbs->selectFileDelete($dbh)) ? '__complete' : '__error';
	$dbh = null;
}
else {
	$result = '__error';
}
?>
{"result": "<?php echo $result;?>"}