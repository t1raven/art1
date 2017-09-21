<?php
if (!defined('OKTOMATO')) exit;

$z = 0;
$selectionCnt = 3;
$mdChoiceCnt = 5;
$collectionCnt = 4;

$Marketmain = new Marketmain();
$Marketmain->getSelectionEdit($dbh);
$aMsIssue = explode('§', $Marketmain->attr['ms_issue']);
$aMsFocusedWorks = explode('§', $Marketmain->attr['ms_focused_works']);
$aMsAwardedArtist = explode('§', $Marketmain->attr['ms_awarded_artist']);
$aMsIssueTxt = $Marketmain->setGoodsName($dbh, $aMsIssue);
$aMsFocusedWorksTxt = $Marketmain->setGoodsName($dbh, $aMsFocusedWorks);
$aMsAwardedArtistTxt = $Marketmain->setGoodsName($dbh, $aMsAwardedArtist);

$Marketmain->getMdChoiceEdit($dbh);
$aMmcTitle = explode('§', $Marketmain->attr['mmc_title']);
$aMmcArtwork = explode('§', $Marketmain->attr['mmc_artwork']);
$aMmcArtworkTxt = $Marketmain->setGoodsName($dbh, $aMmcArtwork);

$Marketmain->getCollectionEdit($dbh);
$aMcTopSeller = explode('§', $Marketmain->attr['mc_top_seller']);
$aMcMdPick = explode('§', $Marketmain->attr['mc_md_pick']);
$aMcNewArrivals = explode('§', $Marketmain->attr['mc_new_arrivals']);
$aMcTopSellerTxt = $Marketmain->setGoodsName($dbh, $aMcTopSeller);
$aMcMdPickTxt = $Marketmain->setGoodsName($dbh, $aMcMdPick);
$aMcNewArrivalsTxt = $Marketmain->setGoodsName($dbh, $aMcNewArrivals);

include 'skin/basic/list.skin.php';

$aMsIssue = null;
$aMsFocusedWorks = null;
$aMsAwardedArtist = null;
$aMsIssueTxt = null;
$aMsFocusedWorksTxt = null;
$aMsAwardedArtistTxt = null;
$aMmcTitle = null;
$aMmcArtwork = null;
$aMmcArtworkTxt = null;
$aMcTopSeller = null;
$aMcMdPick = null;
$aMcNewArrivals = null;
$aMcTopSellerTxt = null;
$aMcMdPickTxt = null;
$aMcNewArrivalsTxt = null;
$Marketmain = null;
$dbh = null;

unset($aMsIssue);
unset($aMsFocusedWorks);
unset($aMsAwardedArtist);
unset($aMsIssueTxt);
unset($aMsFocusedWorksTxt);
unset($aMsAwardedArtistTxt);
unset($aMmcTitle);
unset($aMmcArtwork);
unset($aMmcArtworkTxt);
unset($aMcTopSeller);
unset($aMcMdPick);
unset($aMcNewArrivals);
unset($aMcTopSellerTxt);
unset($aMcMdPickTxt);
unset($aMcNewArrivalsTxt);
unset($Marketmain);
unset($dbh);
