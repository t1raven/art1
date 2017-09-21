<?php
include $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/include/chk.admin.inc.php';
require ROOT.'lib/class/member/sendmail.class.php';

$emailIdx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$result = 0;

if (!empty($emailIdx)) {
	$sendmail = new Sendmail();
	$sendmail->setAttr('emailIdx', $emailIdx);
	$result = ($sendmail->delete($dbh)) ? 1 : 0;
	$dbh = null;
	$sendmail = null;
	unset($dbh);
	unset($sendmail);
}
echo '{"cnt":'.$result.'}';