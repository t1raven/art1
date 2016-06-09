<?php
if (!defined('OKTOMATO')) exit;

$idx = isset($_GET['idx']) ? (int)LIB_LIB::CkSearch($_GET['idx']) : null;
//$params = 'sz='.urlencode($sz).'&exh='.urlencode($exh).'&nm='.urlencode($nm).'&st='.urlencode($st).'&bd='.urlencode($bd).'&ed='.urlencode($ed).'&od='.urlencode($od).'&ot='.urlencode($ot);

if (empty($idx) || $idx === 1) {
	header('Location:/notfound.html');
	exit;
}
else if (!empty($idx) && is_numeric($idx)) {
	$about = new About();
	$about->setAttr('idx', $idx);

	if ($about->getRead($dbh)) {
		$aExhibitionsList = $about->getExhibitionsList($dbh);
		$aArtistsList = $about->getArtistsList($dbh);
		$aArtworksList = $about->getArtworksList($dbh);
		$aNewsList = $about->getNewsList($dbh);
		$aArtfairsList = $about->getArtfairsList($dbh);
		
		//총 갯수 // 2016-05-13 LYT
		$exhibitionsCount = $about->getExhibitionsCount($dbh); 
		$artistsCount = $about->getArtistsCount($dbh); 
		$artworksCount = $about->getArtworksCount($dbh); 
		$newsCount = $about->getNewsCount($dbh); 
		$artfairsListCount = $about->getArtfairsCount($dbh); 

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
		$pageName = 'GALLERIES';
		$pageNum = '4';
		$subNum = '1';
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
	$about = null;
	unset($dbh);
	unset($about);
}
