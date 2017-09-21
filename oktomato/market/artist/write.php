<?php
if (!defined('OKTOMATO')) exit;

$artist_idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;
$at = isset($_GET['at']) ? $_GET['at'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : 10;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$enm = isset($_GET['enm']) ? $_GET['enm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

$yyyy = (int)date('Y') - 4;
$bYear = (int)date('Y');
$eYear = 1970;

$aArtistEnName = null;
$aEducationYear = null;
$aEducationName = null;
$aAwardYear = null;
$aAwardName = null;
$aPrivateYear = null;
$aPrivateName = null;
$aTeamYear = null;
$aTeamName = null;
$aCvYear = null;
$aCvName = null;
$aAnnualArtworkYear = null;
$aAnnualArtworkCnt = null;
$aMajorWorkIdx = null;
$aMajorWorkTxt = null;

$Artist = new Artist();
$Artist->setAttr('artist_idx', $artist_idx);

if (!is_null($artist_idx) && is_int($artist_idx)) {
	$Artist->getEdit($dbh);
	$aArtistEnName = explode(' ', $Artist->attr['artist_en_name']);
	$aEducationYear = explode('§', $Artist->attr['education_year']);
	$aEducationName = explode('§', $Artist->attr['education_name']);
	$aAwardYear = explode('§', $Artist->attr['award_year']);
	$aAwardName = explode('§', $Artist->attr['award_name']);
	$aPrivateYear = explode('§', $Artist->attr['private_year']);
	$aPrivateName = explode('§', $Artist->attr['private_name']);
	$aTeamYear = explode('§', $Artist->attr['team_year']);
	$aTeamName = explode('§', $Artist->attr['team_name']);
	$aCvYear = explode('§', $Artist->attr['cv_year']);
	$aCvName = explode('§', $Artist->attr['cv_name']);
	$aAnnualArtworkYear = explode('§', $Artist->attr['annual_artwork_year']);
	$aAnnualArtworkCnt = explode('§', $Artist->attr['annual_artwork_cnt']);
	$aMajorWorkIdx = array($Artist->attr['major_work_idx']);
	$aMajorWorkTxt = $Artist->setGoodsName($dbh, $aMajorWorkIdx);
}
else {
	$Artist->attr['approval_state'] = 'N';
}

include 'skin/basic/write.skin.php';

function numberOrdering($val) {
	switch($val) {
		case 1 : return 'st'; break;
		case 2 : return 'nd'; break;
		case 3 : return 'rd'; break;
		case 4 || 5: return 'th'; break;
	}
}

$Artist = null;
$aArtistEnName = null;
$aEducationYear = null;
$aEducationName = null;
$aAwardYear = null;
$aAwardName = null;
$aPrivateYear = null;
$aPrivateName = null;
$aTeamYear = null;
$aTeamName = null;
$aCvYear = null;
$aCvName = null;
$aAnnualArtworkYear = null;
$aAnnualArtworkCnt = null;
$aMajorWorkIdx = null;
$aMajorWorkTxt = null;
$dbh = null;

unset($Artist);
unset($aArtistEnName);
unset($aEducationYear);
unset($aEducationName);
unset($aAwardYear);
unset($aAwardName);
unset($aPrivateYear);
unset($aPrivateName);
unset($aTeamYear);
unset($aTeamName);
unset($aCvYear);
unset($aCvName);
unset($aAnnualArtworkYear);
unset($aAnnualArtworkCnt);
unset($aMajorWorkIdx);
unset($aMajorWorkTxt);
unset($dbh);
?>