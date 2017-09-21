<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/market/'.basename(__DIR__).'.class.php';
//require ROOT.'lib/include/controler.inc.php';

$qna_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$result = 0;

if (!empty($qna_idx)) {
	$Qna = new Qna();
	$Qna->setAttr('qna_idx', $qna_idx);

	$result = ($Qna->delete($dbh)) ? 1 : 0;

	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}