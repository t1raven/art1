<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/market/'.basename(__DIR__).'.class.php';
//require ROOT.'lib/include/controler.inc.php';

$advice_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$result = 0;

if (!empty($advice_idx)) {
	$Advice = new Advice();
	$Advice->setAttr('advice_idx', $advice_idx);

	$result = ($Advice->delete($dbh)) ? 1 : 0;

	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}