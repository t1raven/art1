<?php
if (!defined('OKTOMATO')) exit;

$result = 0;
$recommend_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;

if (!empty($recommend_idx) && is_numeric($recommend_idx)) {
	$Recommend = new Recommend();
	$Recommend->setAttr('recommend_idx', $recommend_idx);
	$result = ($Recommend->delete($dbh)) ? 1 : 0;

	$Recommend = null;
	$dbh = null;
	unset($Recommend);
	unset($dbh);
	if (gc_enabled()) gc_collect_cycles();
}
?>
{"cnt":<?php echo $result;?>}