<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/member/member.class.php';
//require ROOT.'lib/include/controler.inc.php';

$newsletter_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$email = isset($_POST['email']) ? Xss::chkXSS($_POST['email']) : null;
$result = 0;

if (!empty($email)) {
	$Member = new Member();
	//$Member->setAttr('newsletter_idx', $newsletter_idx);

	$result = ($Member->setNewsletter_delete($dbh,$email)) ? 1 : 0;

	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}