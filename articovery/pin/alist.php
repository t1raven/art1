<?php
if (!defined('OKTOMATO')) exit;

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : ARTWORKSLISTCOUNT;

if ( $check_mobile == true ){
	$sz = 15;
}else{
	$sz = ARTWORKSLISTCOUNT;
}

$Pin = new Pin();
$covery_idx = $Pin->getCoveryIdx($dbh);
$Pin->setAttr('covery_idx', '1');
$Pin->setAttr('page', $page);
$Pin->setAttr('sz', $sz);
$worksTotalCount = $Pin->getWorksCount($dbh);
$totalPage = ceil($worksTotalCount / $sz);

if ((int)$page === 1) {
	unset($_SESSION['rdmNbr']);
}

if ($worksTotalCount > 0) {
	$j = 0;

	if ($worksTotalCount >= $sz) {
		$kk = $worksTotalCount % $sz;

		if ($kk === 0) {
			$aCnt = $worksTotalCount - $sz;
		}
		else {
			$aCnt = $worksTotalCount - ($kk + $sz);
		}

		//echo "kk:$kk";
		//echo "aCnt:$aCnt";

		for ($i = 0; $i <= $aCnt; $i+=$sz) {
			$aValue[$j] = $i;
			$j++;
		}
	}
	else {
		$aValue[0] = 0;
	}

	//print_r($aValue);

	if (!is_null($_SESSION['rdmNbr'])) {
		//echo "세션존재";
	}
	else {
		//echo "세션존재하지 않음";
		$aryLastValue = $aValue[sizeof($aValue) -1];

		shuffle($aValue);

		$_SESSION['rdmNbr'] = $aValue;

		//print_r($_SESSION['rdmNbr']);

		if ($worksTotalCount > $sz) {
			if ($kk !== 0) {
				$_SESSION['rdmNbr'][sizeof($aValue)] = $aryLastValue + $sz;
			}
		}

		//print_r($_SESSION['rdmNbr']);
	}


	$Pin->setAttr('rdmstart', $_SESSION['rdmNbr'][(int)$page - 1]);

	$tmp = $Pin->getList2($dbh); // ori
	//$tmp = $Pin->getList($dbh);
	$list = $tmp[0];

	if ($_SESSION['user_idx']) {
		$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
		$user_level = AES256::dec($_SESSION['user_level_code'], AES_KEY);
		$Pin->setAttr('user_idx', $user_idx);
		$Pin->setAttr('user_level', $user_level);
		$myPinList = $Pin->getMyPin($dbh);
		//print_r($myPinList);

		$myPinListCnt = sizeof($myPinList);

		if ($myPinListCnt > 0) {
			for($i=0; $i < $myPinListCnt; $i++) {
				$aryMyPin[$i] = $myPinList[$i]['works_idx'];
			}
		}
		else {
			$aryMyPin = array();
			$myPinListCnt = 0;
		}
	}
	else {
		$aryMyPin = array();
	}

	if ($user_level == '99') {
		$isContact = 0;
		$myPinListCnt = 0;
	}

	require 'skin/alist.skin.php';
}

$dbh = null;
$Pin = null;
unset($dbh);
unset($Pin);
