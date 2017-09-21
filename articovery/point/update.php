<?php
if (!defined('OKTOMATO')) exit;

$result = 0;

if ($_SESSION['user_idx']) {
	$covery_idx = isset($_POST['cidx']) ? Xss::chkXSS($_POST['cidx']) : null;
	$point_idx = isset($_POST['pidx']) ? Xss::chkXSS($_POST['pidx']) : null;
	$score_idx = isset($_POST['sidx']) ? Xss::chkXSS($_POST['sidx']) : null;
	$technique_score = isset($_POST['technique']) ? Xss::chkXSS($_POST['technique']) : null;
	$artistic_score = isset($_POST['artistic']) ? Xss::chkXSS($_POST['artistic']) : null;
	$creativity_score = isset($_POST['creativity']) ? Xss::chkXSS($_POST['creativity']) : null;
	$potential_score = isset($_POST['potential']) ? Xss::chkXSS($_POST['potential']) : null;
	$opinion = isset($_POST['opinion']) ? Xss::chkXSS($_POST['opinion']) : null;
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
	$user_level = AES256::dec($_SESSION['user_level_code'], AES_KEY);

	if (is_numeric($covery_idx) && is_numeric($point_idx)) {
		$Point = new Point();
		$Point->setAttr('covery_idx', $covery_idx);
		$Point->setAttr('point_idx', $point_idx);
		$Point->setAttr('score_idx', $score_idx);
		$Point->setAttr('user_idx', $user_idx);
		$Point->setAttr('user_level', $user_level);
		$Point->setAttr('technique_score', $technique_score);
		$Point->setAttr('artistic_score', $artistic_score);
		$Point->setAttr('creativity_score', $creativity_score);
		$Point->setAttr('potential_score', $potential_score);
		$Point->setAttr('opinion', $opinion);

		try {
			$isPointAble = $Point->getIsPointAble($user_level);

			if ($isPointAble) {
				if (is_numeric($score_idx)) {
					if ($Point->setPointScoreUpdate($dbh)) {
						$result = '1';
					}
				}
				else {
					if ($Point->setPointScore($dbh)) {
						$result = '1';
					}
				}
			}

			$point_cnt = $Point->getMyPointCount($dbh);
			$contact = $Point->getIsContact($dbh);
			$expert = ($user_level == '20') ? 1 : 0;
		}
		catch(Exception $e) {
			//echo $e->getMessage();
		}
	}
}

setFree();
echo '{"result":"'.$result.'", "covery_idx":"'.$covery_idx.'", "point_cnt":"'.$point_cnt.'", "contact":"'.$contact.'", "expert":"'.$expert.'"}';

function setFree() {
	$dbh = null;
	$Point = null;
	unset($dbh);
	unset($Point);
}
