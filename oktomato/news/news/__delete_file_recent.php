<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/news/'.basename(__DIR__).'.class.php';
//require ROOT.'lib/include/controler.inc.php';

$idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
//$news_paragraph_idx = isset($_GET['idx']) ? Xss::chkXSS($_GET['idx']) : null;
$result = 0;

if (!empty($idx)) {
	$News = new News();
	$News->setAttr('news_idx', $idx);

	$result = ($News->delete_recent_file($dbh, $idx)) ? 1 : 0;
	//$result =1 ;
	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}

