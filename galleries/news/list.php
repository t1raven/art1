<?php
if (!defined('OKTOMATO')) exit;

$idx = isset($_GET['idx']) ? (int)LIB_LIB::CkSearch($_GET['idx']) : null;
$page = isset($_GET['page']) ? (int)LIB_LIB::CkSearch($_GET['page']) : 1;
$sz = isset($_GET['sz']) ? (int)LIB_LIB::CkSearch($_GET['sz']) : 10;
$sw = isset($_GET['sw']) ? LIB_LIB::CkSearch($_GET['sw']) : null;

if (empty($idx) || $idx === 1) {
	header('Location:/notfound.html');
	exit;
}
else if (!empty($idx) && is_numeric($idx)) {
	$params = 'sz='.urlencode($sz).'&sw='.urlencode($sw).'&idx='.urlencode($idx);
	$news = new News();
	$news->setAttr('idx', $idx);
	$news->setAttr('page', $page);
	$news->setAttr('sz', $sz);
	$news->setAttr('sw', $sw);

	$tmp = $news->getList($dbh);
	//print_r($tmp);
	$list = $tmp[0];
	$totalCnt = $tmp[1];
	//$total_all_cnt = $tmp[2];

	// 페이지 처리
	$pageUtil = new PageUtil();
	$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
	$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
	$PAGE_UNCOUNT = $totalCnt - $DEFAULT['NumPerStart'];
	$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $totalCnt, $page, $params);

	//if (is_array($list) && count($list) > 0) {

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
		$pageName = 'News';
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
	/*
	}
	else {
		header('Location:/notfound.html');
	}
	*/

	$dbh = null;
	$news = null;
	unset($dbh);
	unset($news);
}

