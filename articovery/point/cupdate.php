<?php
if (!defined('OKTOMATO')) exit;

$result = 0;
$dup = 0;
$cnt = 0;
$contact = 0;
$covery_idx = '';

if ($_SESSION['user_idx']) {
	$covery_idx = isset($_POST['covery']) ? Xss::chkXSS($_POST['covery']) : null;
	$user_contact = isset($_POST['contact']) ? Xss::chkXSS($_POST['contact']) : null;
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
	$user_level = AES256::dec($_SESSION['user_level_code'], AES_KEY);

	if (is_numeric($covery_idx) && is_numeric($user_contact) && is_numeric($user_idx)) {
		$Point = new Point();
		$Point->setAttr('covery_idx', $covery_idx);
		$Point->setAttr('user_contact', $user_contact);
		$Point->setAttr('user_idx', $user_idx);
		$isPointAble = $Point->getIsPointAble($user_level);

		try {
			if ($isPointAble) {
				if (!$Point->getIsContact($dbh)) {
					if ($Point->setContact($dbh)) {
						$result = '1';
					}
				}
				else {
					$dup = '1';
				}
			}
		}
		catch(Exception $e) {
			//echo $e->getMessage();
		}
	}
}

$dbh = null;
$Point = null;
unset($dbh);
unset($Point);

echo '{"result":"'.$result.'", "dup":"'.$dup.'"}';
