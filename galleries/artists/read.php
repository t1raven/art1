<?php
if (!defined('OKTOMATO')) exit;

$idx = isset($_GET['idx']) ? (int)LIB_LIB::CkSearch($_GET['idx']) : null;
$aidx = isset($_GET['aidx']) ? (int)LIB_LIB::CkSearch($_GET['aidx']) : null;

//$params = 'sz='.urlencode($sz).'&exh='.urlencode($exh).'&nm='.urlencode($nm).'&st='.urlencode($st).'&bd='.urlencode($bd).'&ed='.urlencode($ed).'&od='.urlencode($od).'&ot='.urlencode($ot);

if (empty($idx) || $idx === 1 || empty($aidx)) {
	header('Location:/notfound.html');
	exit;
}
else if (!empty($idx) && is_numeric($idx) && !empty($aidx) && is_numeric($aidx)) {
	$isExhibition = 0;
	$artists = new Artists();
	$artists->setAttr('idx', $idx);
	$artists->setAttr('aidx', $aidx);

	if ($artists->getRead($dbh)) {
		$isExhibition = $artists->getIsExhibition($dbh);
		$myArtworksList = $artists->getMyArtworksList($dbh);
		$myArtworksCnt =  (is_array($myArtworksList)) ? count($myArtworksList) : 0;

		// 탭 메뉴을 위한 로직
		$init = new Init();
		$init->setAttr('idx', $idx);
		$isContents = $init->getIsContents($dbh);
		$logoImg = $init->getLogoImg($dbh);
		$init = null;
		unset($init);
		$exhibitionsCnt = (int)$isContents['exhibitionsCnt'];
		$artistsCnt =  (int)$isContents['artistsCnt'];
		$artworksCnt = (int)$isContents['artworksCnt'];
		$newsCnt = (int)$isContents['newsCnt'];
		$artfairsCnt = (int)$isContents['artfairsCnt'];
		$categoriName = 'GALLERIES';
		$pageName = 'Artists';
		$pageNum = '4';
		$subNum = '3';
		$thirdNum = '0';
		$pathType = 'a';

		include '../../inc/link.php';
		include '../../inc/top.php';
		include '../../inc/header.php';
		include '../../inc/spot_sub.php';
		require 'skin/basic/read.skin.php';
		include '../../inc/footer.php';
		include '../../inc/bot.php';
	}
	else {
		header('Location:/notfound.html');
	}

	$dbh = null;
	$artists = null;
	unset($dbh);
	unset($artists);
}
