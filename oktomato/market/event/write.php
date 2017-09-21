<?php
if (!defined('OKTOMATO')) exit;

$evt_idx = isset($_GET['idx']) ? $_GET['idx'] : null;

$ii = 1;
$jj = 1;
$p = 0;
$displayState = 'Y';

if (!empty($evt_idx)) {
	$Event = new Event();
	$Event->setAttr('evt_idx', $evt_idx);
	$Event->getEventEdit($dbh);
	$Event->getEventParagraphEdit($dbh);
	$aParaSubTitle = explode('§', $Event->attr['para_sub_title']);
	$aParaArtWork = explode('§', $Event->attr['para_artwork']);
	$aParaArtWorkTxt = $Event->setGoodsName($dbh, $aParaArtWork);
	$displayState = ($Event->attr['evt_display_state'] === 'Y') ? 'Y' : 'N';
}


include 'skin/basic/write.skin.php';

$aParaSubTitle = null;
$aParaArtWork = null;
$aParaArtWorkTxt = null;
$Marketmain = null;
$dbh = null;

unset($aParaSubTitle);
unset($aParaArtWork);
unset($aParaArtWorkTxt);
unset($Event);
unset($dbh);
?>