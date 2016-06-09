<?php
if (!defined('OKTOMATO')) exit;

$idx = isset($_GET['idx']) ? (int)LIB_LIB::CkSearch($_GET['idx']) : null;
$nidx = isset($_GET['nidx']) ? (int)LIB_LIB::CkSearch($_GET['nidx']) : null;
$article = isset($_GET['article']) ? (int)LIB_LIB::CkSearch($_GET['article']) : null;
$page = isset($_GET['page']) ? (int)LIB_LIB::CkSearch($_GET['page']) : 1;
$sz = isset($_GET['sz']) ? (int)LIB_LIB::CkSearch($_GET['sz']) : 10;
$sw = isset($_GET['sw']) ? LIB_LIB::CkSearch($_GET['sw']) : null;
$cook_news_view =  isset($_COOKIE['cook_news_view']) ? Xss::chkXSS($_COOKIE['cook_news_view']) : null;

if (empty($idx) || $idx === 1) {
	header('Location:/notfound.html');
	exit;
}
else if (!empty($idx) && is_numeric($idx)) {
	$read_count = false;

	if ($cook_news_view){ //페이지 뷰 카운팅을 위해 쿠키저장
		$temp = explode(",",$cook_news_view);
		if (!in_array($news_idx,$temp)) { // 배열에 번호가 없을경우
			setcookie('cook_news_view',$_COOKIE['cook_news_view'].','.$news_idx,time()+86400);
			$read_count = true;
		}
		else{
			$read_count = false ;
		}

	}
	else{
		setcookie('cook_news_view',$news_idx,time()+86400);
		$read_count = true;
	}

	$params = 'idx='.urlencode($idx).'&sw='.urlencode($sw);

	$news = new News();
	$news->setAttr('idx', $idx);
	$news->setAttr('nidx', $nidx);
	$news->setAttr('article', $article);
	$news->setAttr("page", $page);
	$news->setAttr("sz", $sz);
	$news->setAttr("sw", $sw);
	$news->setAttr("read_count", $read_count);

	if ($news->getRead($dbh)) {
		$tmp = $news->getListParagraph($dbh);
		$list = $tmp[0];
		$total_cnt = $tmp[1];
		$total_cnt = isset($total_cnt) ? $total_cnt : 1;
		$prev = $news->getPrev($dbh);
		$next = $news->getNext($dbh);
		$prevHref = (is_array($prev)) ? '?at=read&idx='.urlencode($idx).'&nidx='.$prev['nidx'].'&article='.$prev['article'] : null;
		$nextHref =  (is_array($next)) ? '?at=read&idx='.urlencode($idx).'&nidx='.$next['nidx'].'&article='.$next['article'] : null;

		///echo $next;

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
		$newsCnt = 1;
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
		require 'skin/basic/read.skin.php';
		include '../../inc/footer.php';
		include '../../inc/bot.php';
	}
	else {
		header('Location:/notfound.html');
	}

	$dbh = null;
	$news = null;
	unset($dbh);
	unset($news);
}
