<?php
if (!defined('OKTOMATO')) exit;

$result = 0;
$covery_idx = '';

if ($_SESSION['user_idx']) {
	$covery_idx = isset($_POST['covery']) ? Xss::chkXSS($_POST['covery']) : null;
	$user_contact = isset($_POST['contact']) ? Xss::chkXSS($_POST['contact']) : null;
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
	if (is_numeric($covery_idx) && is_numeric($user_contact) && is_numeric($user_idx)) {
		$Pin = new Pin();
		$Pin->setAttr('covery_idx', $covery_idx);
		$Pin->setAttr('user_contact', $user_contact);
		$Pin->setAttr('user_idx', $user_idx);
		try {
			if ($Pin->setContact($dbh)) {
				$result = '1';
			}
		}
		catch(Exception $e) {
			//JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
		}
	}
}

$dbh = null;
$Pin = null;
unset($dbh);
unset($Pin);

echo '{"result":"'.$result.'"}';
