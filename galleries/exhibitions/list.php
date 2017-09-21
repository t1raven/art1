<?php
if (!defined('OKTOMATO')) exit;

$idx = isset($_GET['idx']) ? (int)LIB_LIB::CkSearch($_GET['idx']) : null;
$aidx = isset($_GET['aidx']) ? (int)LIB_LIB::CkSearch($_GET['aidx']) : null;

//$params = 'sz='.urlencode($sz).'&exh='.urlencode($exh).'&nm='.urlencode($nm).'&st='.urlencode($st).'&bd='.urlencode($bd).'&ed='.urlencode($ed).'&od='.urlencode($od).'&ot='.urlencode($ot);

if (empty($idx) || $idx === 1) {
	header('Location:/notfound.html');
	exit;
}
else if (!empty($idx) && is_numeric($idx)) {
	$bExist = false;
	$exhibitions = new Exhibitions();
	$exhibitions->setAttr('idx', $idx);
	$exhibitions->setAttr('aidx', $aidx);

	if (!empty($idx) && $aidx > 0) {
		$topList = null;
		$list = $exhibitions->getExhibitionsList($dbh);
		if (is_array($list) && count($list) > 0) {
			$bExist = true;
		}
	}
	else if (!empty($idx) && empty($aidx)) {
		$topList = $exhibitions->getTopExhibitionsList($dbh);
		if (is_array($topList) && count($topList) > 0) {
			$list = $exhibitions->getExhibitionsList($dbh);
			$bExist = true;
		}
	}

	if ($bExist) {
		// 탭 메뉴을 위한 로직
		$init = new Init();
		$init->setAttr('idx', $idx);
		$isContents = $init->getIsContents($dbh);
		$logoImg = $init->getLogoImg($dbh);
		$init = null;
		unset($init);
		$videosCnt = (int)$isContents['videosCnt'];
		$exhibitionsCnt = (int)$isContents['exhibitionsCnt'];
		$artistsCnt =  (int)$isContents['artistsCnt'];
		$artworksCnt = (int)$isContents['artworksCnt'];
		$newsCnt = (int)$isContents['newsCnt'];
		$artfairsCnt = (int)$isContents['artfairsCnt'];
		$categoriName = 'GALLERIES';
		$pageName = 'exhibition';
		$pageNum = '4';
		$subNum = '2';
		$thirdNum = '0';
		$pathType = 'a';

		include '../../inc/link.php';
		include '../../inc/top.php';
		include '../../inc/header.php';
		include '../../inc/spot_sub.php';
		require 'skin/basic/list.skin.php';
		include '../../inc/footer.php';
		include '../../inc/bot.php';
	}
	else {
		header('Location:/notfound.html');
	}

	$dbh = null;
	$exhibitions = null;
	unset($dbh);
	unset($exhibitions);
}
