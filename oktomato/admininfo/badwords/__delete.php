<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/admininfo/'.basename(__DIR__).'.class.php';
//require ROOT.'lib/include/controler.inc.php';

$bad_words_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$result = 0;

if (!empty($bad_words_idx)) {
	$Badwords = new Badwords();
	$Badwords->setAttr('bad_words_idx', $bad_words_idx);

	$result = ($Badwords->delete($dbh)) ? 1 : 0;

	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}