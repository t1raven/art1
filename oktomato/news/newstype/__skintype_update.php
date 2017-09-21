<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/news/newstype.class.php');
// 전시관리
$idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$stype = isset($_POST['stype']) ? Xss::chkXSS($_POST['stype']) : null;
//$exh_idx = isset($_GET['idx']) ? Xss::chkXSS($_GET['idx']) : null;
//$mod = isset($_GET['mod']) ? Xss::chkXSS($_GET['mod']) : null;
//echo $exh_idx  .'<br>';
//echo $mod .'<br>';

$result = 0;

if (!is_null($idx)) {
	$Newstype = new Newstype();
	$Newstype->setAttr('news_category_idx', $idx);
	$Newstype->setAttr('news_skin_type', $stype);
	
	$result = ($Newstype->updateSkintype($dbh)) ? 1 : 0;
	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}
