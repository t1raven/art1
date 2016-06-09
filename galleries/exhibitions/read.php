<?php
if (!defined('OKTOMATO')) exit;

$idx = isset($_GET['idx']) ? (int)LIB_LIB::CkSearch($_GET['idx']) : null;
$eidx = isset($_GET['eidx']) ? (int)LIB_LIB::CkSearch($_GET['eidx']) : null;

//$params = 'sz='.urlencode($sz).'&exh='.urlencode($exh).'&nm='.urlencode($nm).'&st='.urlencode($st).'&bd='.urlencode($bd).'&ed='.urlencode($ed).'&od='.urlencode($od).'&ot='.urlencode($ot);

if (empty($idx) || $idx === 1 || empty($eidx)) {
	header('Location:/notfound.html');
	exit;
}
else if (!empty($idx) && is_numeric($idx) && !empty($eidx) && is_numeric($eidx)) {
	$exhibitions = new Exhibitions();
	$exhibitions->setAttr('idx', $idx);
	$exhibitions->setAttr('eidx', $eidx);

	if ($exhibitions->getRead($dbh)) {
		$imgList = $exhibitions->getImgList($dbh);
		$artistsList = $exhibitions->getSelectedArtists($dbh);
		$worksList = $exhibitions->getSelectedWorks($dbh);
		$artistsListCnt = (is_array($artistsList)) ? count($artistsList) - 1  : 0;

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
		$pageName = 'exhibition';
		$pageNum = '4';
		$subNum = '2';
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
	$exhibitions = null;
	unset($dbh);
	unset($exhibitions);
}

