<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/news/'.basename(__DIR__).'.class.php';
//require ROOT.'lib/include/controler.inc.php';

$news_paragraph_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
//$news_paragraph_idx = isset($_GET['idx']) ? Xss::chkXSS($_GET['idx']) : null;
$result = 0;

if (!empty($news_paragraph_idx)) {
	$News = new News();
	$News->setAttr('news_paragraph_idx', $news_paragraph_idx);

	$result = ($News->delete_paragraph($dbh)) ? 1 : 0;

	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}