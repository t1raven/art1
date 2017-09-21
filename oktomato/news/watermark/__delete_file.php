<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/news/watermark.class.php';

$idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
//$news_paragraph_idx = isset($_GET['idx']) ? Xss::chkXSS($_GET['idx']) : null;
$result = 0;

if (!empty($idx)) {
	$Watermark = new Watermark();
	$Watermark->setAttr('water_idx', $idx);

	$result = ($Watermark->delete_file($dbh)) ? 1 : 0;
	//$result =1 ;
	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}