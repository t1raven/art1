<?php
//if (!defined('OKTOMATO')) exit;
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');

$result = 0;
$covery_idx = '';

if ($_SESSION['user_idx']) {
	$covery_idx = isset($_POST['covery']) ? Xss::chkXSS($_POST['covery']) : null;
	$user_contact = isset($_POST['contact']) ? Xss::chkXSS($_POST['contact']) : null;
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);

	if (is_numeric($covery_idx) && is_numeric($user_contact) && is_numeric($user_idx)) {
		require(ROOT.'lib/class/articovery/'.basename(__DIR__).'.class.php');

		$Articovery = new Articovery();
		$Articovery->setAttr('covery_idx', $covery_idx);
		$Articovery->setAttr('user_contact', $user_contact);
		$Articovery->setAttr('user_idx', $user_idx);

		try {
			if ($Articovery->setContact($dbh)) {
				$result = "1";
			}
		}
		catch(Exception $e) {
			//JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
		}
	}
}
setFree();
echo '{"result":"'.$result.'"}';

function setFree() {
	$dbh = null;
	$Articovery = null;
	unset($dbh);
	unset($Articovery);
}
