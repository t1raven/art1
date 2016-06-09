<?php
if (!defined('OKTOMATO')) exit;

$idx = isset($_GET['idx']) ? (int)LIB_LIB::CkSearch($_GET['idx']) : null;
$fidx = isset($_GET['fidx']) ? (int)LIB_LIB::CkSearch($_GET['fidx']) : null;

//$params = 'sz='.urlencode($sz).'&exh='.urlencode($exh).'&nm='.urlencode($nm).'&st='.urlencode($st).'&bd='.urlencode($bd).'&ed='.urlencode($ed).'&od='.urlencode($od).'&ot='.urlencode($ot);

if (empty($idx) || $idx === 1 || empty($fidx)) {
	header('Location:/notfound.html');
	exit;
}
else if (!empty($idx) && is_numeric($idx) && !empty($fidx) && is_numeric($fidx)) {
	$artfairs = new Artfairs();
	$artfairs->setAttr('idx', $idx);
	$artfairs->setAttr('fidx', $fidx);
	$artfairs->getRead($dbh);
	$imgList = $artfairs->getImgList($dbh);

	if (is_array($imgList) && count($imgList) > 0) {
		array_unshift($imgList, array('upfileName'=>$artfairs->attr['upfileName']));
	}
	else {
		if (!empty($artfairs->attr['upfileName'])) {
			$imgList = array(array('upfileName'=>$artfairs->attr['upfileName']));
		}
	}

	if (is_array($imgList)) {
		$artistsList = $artfairs->getSelectedArtists($dbh);
		$worksList = $artfairs->getSelectedWorks($dbh);

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
		$pageName = 'Art Fairs';
		$pageNum = '4';
		$subNum = '6';
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
	$artfairs = null;
	unset($dbh);
	unset($artfairs);
}
