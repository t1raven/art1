<?php
if (!defined('OKTOMATO')) exit;

$tbl = isset($_POST['tbl']) ? Xss::chkXSS($_POST['tbl']) : null;

if ($tbl === 'selection') {
	$ms_issue = isset($_POST['issue']) ? Xss::chkXSS($_POST['issue']) : null;
	$ms_focused_works = isset($_POST['focused_works']) ? Xss::chkXSS($_POST['focused_works']) : null;
	$ms_awarded_artist = isset($_POST['awarded_artist']) ? Xss::chkXSS($_POST['awarded_artist']) : null;

	foreach($ms_issue as $v) {
		$aMsIssue .= $v.'§';
	}
	foreach($ms_focused_works as $v) {
		$aMsFocusedWorks .= $v.'§';
	}
	foreach($ms_awarded_artist as $v) {
		$aMsAwardedArtist .= $v.'§';
	}

	$Marketmain = new Marketmain();
	$Marketmain->setAttr('ms_issue', $aMsIssue);
	$Marketmain->setAttr('ms_focused_works', $aMsFocusedWorks);
	$Marketmain->setAttr('ms_awarded_artist', $aMsAwardedArtist);

	try {
		$cnt = $Marketmain->getCount($dbh, $tbl);
		echo "cnt:".$cnt;

		if ($cnt > 0) {
			echo "chk1";
			if ($Marketmain->updateSelection($dbh)) {
				Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
			}
			else {
				throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
			}
		}
		else {
			echo "chk2";
			if ($Marketmain->insertSelection($dbh)) {
				Js::LocationReplace('등록되었습니다.', PHP_SELF, 'parent');
			}
			else {
				throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
			}
		}
	}
	catch(Exception $e) {
		//JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
	}
}
elseif ($tbl === 'md_choice') {
	$mmc_title = isset($_POST['title']) ? Xss::chkXSS($_POST['title']) : null;
	$mmc_artwork = isset($_POST['artwork']) ? Xss::chkXSS($_POST['artwork']) : null;

	foreach($mmc_title as $v) {
		$aMmcTitle .= $v.'§';
	}

	foreach($mmc_artwork as $v) {
		$aMmcArtwork .= $v.'§';
	}

	$Marketmain = new Marketmain();
	$Marketmain->setAttr('mmc_title', $aMmcTitle);
	$Marketmain->setAttr('mmc_artwork', $aMmcArtwork);

	try {
		$cnt = $Marketmain->getCount($dbh, $tbl);

		if ($cnt > 0) {
			if ($Marketmain->updateMdChoice($dbh)) {
				Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
			}
			else {
				throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
			}
		}
		else {
			if ($Marketmain->insertMdChoice($dbh)) {
				Js::LocationReplace('등록되었습니다.', PHP_SELF, 'parent');
			}
			else {
				throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
			}
		}
	}
	catch(Exception $e) {
		JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
	}
}
elseif ($tbl === 'collection') {
	echo "here";
	$mc_top_seller = isset($_POST['top_seller']) ? Xss::chkXSS($_POST['top_seller']) : null;
	$mc_md_pick = isset($_POST['md_pick']) ? Xss::chkXSS($_POST['md_pick']) : null;
	$mc_new_arrivals = isset($_POST['new_arrivals']) ? Xss::chkXSS($_POST['new_arrivals']) : null;

	foreach($mc_top_seller as $v) {
		$aMcTopSeller .= $v.'§';
	}
	foreach($mc_md_pick as $v) {
		$aMcMdPick .= $v.'§';
	}
	foreach($mc_new_arrivals as $v) {
		$aMcNewArrivals .= $v.'§';
	}
	$Marketmain = new Marketmain();
	$Marketmain->setAttr('mc_top_seller', $aMcTopSeller);
	$Marketmain->setAttr('mc_md_pick', $aMcMdPick);
	$Marketmain->setAttr('mc_new_arrivals', $aMcNewArrivals);

	try {
		$cnt = $Marketmain->getCount($dbh, $tbl);

		if ($cnt > 0) {
			if ($Marketmain->updateCollection($dbh)) {
				Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
			}
			else {
				throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
			}
		}
		else {
			if ($Marketmain->insertCollection($dbh)) {
				Js::LocationReplace('등록되었습니다.', PHP_SELF, 'parent');
			}
			else {
				throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
			}
		}

	}
	catch(Exception $e) {
		JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
	}

}

setFree();

function setFree() {
	$Marketmain = null;
	$dbh = null;
	unset($Marketmain);
	unset($dbh);
}
?>