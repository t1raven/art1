<?php
//if (!defined('OKTOMATO')) exit;
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');

$result = 0;
$covery_idx = '';

if ($_SESSION['user_idx']) {
	$works_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
	$mode = isset($_POST['mode']) ? Xss::chkXSS($_POST['mode']) : null;

	if (is_numeric($works_idx)) {
		$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);

		require(ROOT.'lib/class/articovery/'.basename(__DIR__).'.class.php');

		$Articovery = new Articovery();
		$Articovery->setAttr('works_idx', $works_idx);
		$Articovery->setAttr('user_idx', $user_idx);

		try {
			if ($mode == 'cancel') {
				if ($Articovery->setMyPinCancel($dbh)) {
					$result = "1";
					$covery_idx = $Articovery->attr['covery_idx'];
				}
				else {
					//throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
				}
				$pin_cnt = $Articovery->getMyPinCount($dbh);
			}
			else {
				if ($Articovery->setMyPin($dbh)) {
					$result = "1";
					$covery_idx = $Articovery->attr['covery_idx'];
				}
				else {
					//throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
				}
				$pin_cnt = $Articovery->getMyPinCount($dbh);
			}
		}
		catch(Exception $e) {
			//JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
		}
	}
}
setFree();
echo '{"result":"'.$result.'", "covery_idx":"'.$covery_idx.'", "pin_cnt":"'.$pin_cnt.'"}';

function setFree() {
	$dbh = null;
	$Articovery = null;
	unset($dbh);
	unset($Articovery);
}
