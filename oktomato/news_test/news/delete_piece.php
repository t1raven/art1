<?php
// 개별 삭제
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/news/'.basename(__DIR__).'.class.php';

$idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
//$exh_idx = isset($_GET['idx']) ? Xss::chkXSS($_GET['idx']) : null;
$result = 0;

if (!is_null($idx)) {
	$News = new News();
	$News->setAttr('news_idx', $idx);
	
	$result = ($News->delete($dbh)) ? 1 : 0;
	$dbh = null;
}

//$result = 1;
?>
{"cnt":<?php echo $result;?>}