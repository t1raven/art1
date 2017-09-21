<?php
if (!defined('OKTOMATO')) exit;

$covery_idx = isset($_POST['cidx']) ? (int)$_POST['cidx'] : null;
$point_idx = isset($_POST['idx']) ? (int)$_POST['idx'] : null;
$total_score = 0;
$maxIndex = null;

$Point = new Point();
$Point->setAttr('covery_idx', $covery_idx);
$Point->setAttr('point_idx', $point_idx);

if (is_numeric($covery_idx) && is_numeric($point_idx)) {
	$expertAvg = $Point->getExpertScoreAvg($dbh); // 전문가 패널 평균 값

	if (!empty($expertAvg)) {
		$list = $Point->getExpertScore($dbh); // 전문가 패널 목록

		if (is_array($list) && sizeof($list) > 1) {
			foreach ($list as $key => $row) {
				$tmp[$key] = abs($expertAvg - $row['final_score']);
			}

			$maxValue = max($tmp);
			$aryMaxKey = array_keys($tmp, $maxValue);
			if (is_array($aryMaxKey) && sizeof($aryMaxKey) > 0) {
				$maxIndex = $aryMaxKey[0];
			}
		}

		$memberList = $Point->getMemberScoreAvg($dbh); // 일반회원 평균 가져오기
		//print_r($memberList);
	}

	if (is_array($memberList) && sizeof($memberList) > 0) {
		if (!empty($memberList['technique_score'])) {
			array_push($list, $memberList); // 일반회원 배열에 추가
		}
	}

	//print_r($list);
	include('skin/basic/read.skin.php');
}

$Point = null;
$dbh = null;
unset($Point);
unset($dbh);
