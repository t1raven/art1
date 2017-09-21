<?php
if (!defined('OKTOMATO')) exit;

$idx = isset($_GET['idx']) ? (int)LIB_LIB::CkSearch($_GET['idx']) : null;

if (empty($idx) || $idx === 1) {
	header('Location:/notfound.html');
	exit;
}
else if (!empty($idx) && is_numeric($idx)) {
	$videos = new videos();
	$videos->setAttr('idx', $idx);
	$list = $videos->getList($dbh);

	if (is_array($list) && count($list) > 0) {
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
		$pageName = 'Artworks';
		$pageNum = '4';
		$subNum = '5';
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
	$videos = null;
	unset($dbh);
	unset($videos);
}
