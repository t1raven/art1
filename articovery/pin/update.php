<?php
if (!defined('OKTOMATO')) exit;

$result = 0;
$covery_idx = '';

if ($_SESSION['user_idx']) {
	$works_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
	$mode = isset($_POST['mode']) ? Xss::chkXSS($_POST['mode']) : null;

	if (is_numeric($works_idx)) {
		$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
		$user_level = AES256::dec($_SESSION['user_level_code'], AES_KEY);
		$Pin = new Pin();
		$Pin->setAttr('works_idx', $works_idx);
		$Pin->setAttr('user_idx', $user_idx);
		$Pin->setAttr('user_level', $user_level);

		try {
			if ($mode == 'cancel') {
				if ($Pin->setMyPinCancel($dbh)) {
					$result = "1";
					$covery_idx = $Pin->attr['covery_idx'];
				}
				else {
					//throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
				}
			}
			else {
				if ($Pin->setMyPin($dbh)) {
					$result = "1";
					$covery_idx = $Pin->attr['covery_idx'];
				}
				else {
					//throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
				}
			}

			$pin_cnt = $Pin->getMyPinCount($dbh);
			$contact = $Pin->getIsContact($dbh);

			// 관리자 일경우 예외 처리
			if ($user_level == '99') {
				//$pin_cnt = ($pin_cnt == 9) ? 8 : $pin_cnt;
				$pin_cnt = 0;
				$contact = 0;
			}
		}
		catch(Exception $e) {
			//JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
		}
	}
}

setFree();
echo '{"result":"'.$result.'", "covery_idx":"'.$covery_idx.'", "pin_cnt":"'.$pin_cnt.'", "contact":"'.$contact.'"}';

function setFree() {
	$dbh = null;
	$Pin = null;
	unset($dbh);
	unset($Pin);
}
