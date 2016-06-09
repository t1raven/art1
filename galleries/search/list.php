<?php
if (!defined('OKTOMATO')) exit;

$chkgallery = isset($_GET['chkgallery']) ?  Xss::chkXSS($_GET['chkgallery']) : null;
$chkexhibition = isset($_GET['chkexhibition']) ?  Xss::chkXSS($_GET['chkexhibition']) : null;
$chkartist = isset($_GET['chkartist']) ?  Xss::chkXSS($_GET['chkartist']) : null;
$chkartworks = isset($_GET['chkartworks']) ?  Xss::chkXSS($_GET['chkartworks']) : null;
$chknews = isset($_GET['chknews']) ?  Xss::chkXSS($_GET['chknews']) : null;
$chkartfair = isset($_GET['chkartfair']) ?  Xss::chkXSS($_GET['chkartfair']) : null;
$kword = isset($_GET['kword']) ?  Xss::chkXSS($_GET['kword']) : null;

//2016-04-27 작가 검색시 작품도 나오도록 요청에 의해 처리 LYT
if (!empty($chkartist === 'Y')) {
	$chkartworks = 'Y';
}


if (empty($kword) ) {
	header('Location:/notfound.html');
	exit;
}
else {
	$search = new Search();
	$search->setAttr('chkgallery', $chkgallery);
	$search->setAttr('chkexhibition', $chkexhibition);
	$search->setAttr('chkartist', $chkartist);
	$search->setAttr('chkartworks', $chkartworks);
	$search->setAttr('chknews', $chknews);
	$search->setAttr('chkartfair', $chkartfair);
	$search->setAttr('kword', $kword);

	$galleryList = null;
	$exhibitionList = null;
	$artistList = null;
	$artworksList = null;
	$newsList = null;
	$artfairList = null;

	
	

	if (!empty($chkgallery === 'Y')) {
		$galleryList = $search->getGalleryList($dbh);
	}

	if (!empty($chkexhibition === 'Y')) {
		$exhibitionList = $search->getExhibitionList($dbh);
	}

	if (!empty($chkartist === 'Y')) {
		$artistList = $search->getArtistList($dbh);
	}

	if (!empty($chkartworks === 'Y')) {
		$artworksList = $search->getArtistworksList($dbh);
	}

	if (!empty($chknews === 'Y')) {
		$newsList = $search->getNewsList($dbh);
	}

	if (!empty($chkartfair === 'Y')) {
		$artfairList = $search->getArtfairList($dbh);
	}

	$categoriName = 'Search Result';
	$pageName = 'Search Result';
	$pageNum = '4';
	$subNum = '0';
	$thirdNum = '0';
	$pathType = 'a';

	include '../../inc/link.php';
	include '../../inc/top.php';
	include '../../inc/header.php';
	include '../../inc/spot_sub.php';
	require 'skin/basic/list.skin.php';
	include '../../inc/footer.php';
	include '../../inc/bot.php';

	$dbh = null;
	$search = null;
	unset($dbh);
	unset($search);
}