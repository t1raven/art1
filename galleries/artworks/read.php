<?php
if (!defined('OKTOMATO')) exit;

$idx = isset($_GET['idx']) ? (int)LIB_LIB::CkSearch($_GET['idx']) : null;
$widx = isset($_GET['widx']) ? (int)LIB_LIB::CkSearch($_GET['widx']) : null;

//$params = 'sz='.urlencode($sz).'&exh='.urlencode($exh).'&nm='.urlencode($nm).'&st='.urlencode($st).'&bd='.urlencode($bd).'&ed='.urlencode($ed).'&od='.urlencode($od).'&ot='.urlencode($ot);

if (empty($idx) || $idx === 1 || empty($widx)) {
	header('Location:/notfound.html');
	exit;
}
else if (!empty($idx) && is_numeric($idx) && !empty($widx) && is_numeric($widx)) {
	$isExhibition = 0;
	$artworks = new Artworks();
	$artworks->setAttr('idx', $idx);
	$artworks->setAttr('widx', $widx);

	if ($artworks->getRead($dbh)) {
		$isExhibition = $artworks->getIsExhibition($dbh);
		$artworksList = $artworks->getArtworksList($dbh);

		// 탭 메뉴을 위한 로직
		$init = new Init();
		$init->setAttr('idx', $idx);
		$isContents = $init->getIsContents($dbh);
		$logoImg = $init->getLogoImg($dbh);
		$galleryName = $init->getGalleryName($dbh);
		$init = null;
		unset($init);
		$exhibitionsCnt = (int)$isContents['exhibitionsCnt'];
		$artistsCnt =  (int)$isContents['artistsCnt'];
		$artworksCnt = (int)$isContents['artworksCnt'];
		$newsCnt = (int)$isContents['newsCnt'];
		$artfairsCnt = (int)$isContents['artfairsCnt'];
		$categoriName = 'GALLERIES';
		$pageName = 'Artworks';
		$pageNum = '4';
		$subNum = '4';
		$thirdNum = '0';
		$pathType = 'a';

		$userEmail = AES256::dec($_SESSION['user_id'], AES_KEY);

		if (!empty($_SESSION['user_id'])) {
			$userId = explode('@', $userEmail)[0];
		}
		else {
			$userId = null;
		}

		$url = urlencode($PUBLIC['HOME']. $_SERVER["REQUEST_URI"]);

		// Open Graph Begin
		$ogImage = (!empty($artworksList[0]['upfileName'])) ? $PUBLIC['HOME'].galleriesArtworksUploadPath.'r_'.$artworksList[0]['upfileName'] : null ;
		$ogTitle = $artworks->attr['worksNameEn'];
		$ogDescription = $artworks->attr['material'];
		// Open Graph End

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
	$artworks = null;
	unset($dbh);
	unset($artworks);
}
