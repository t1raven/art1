<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/social/'.basename(__DIR__).'.class.php';
//require ROOT.'lib/include/controler.inc.php';

$idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$oldSnsImg = isset($_POST['oldSnsImg']) ? Xss::chkXSS($_POST['oldSnsImg']) : null;
$tmpImgFile = isset($_POST['tmpImgFile']) ? Xss::chkXSS($_POST['tmpImgFile']) : null;

/*
$idx = isset($_GET['idx']) ? Xss::chkXSS($_GET['idx']) : null;
$oldSnsImg = isset($_GET['oldSnsImg']) ? Xss::chkXSS($_GET['oldSnsImg']) : null;
$tmpImgFile = isset($_GET['tmpImgFile']) ? Xss::chkXSS($_GET['tmpImgFile']) : null;
*/
$result = 0;

if (!empty($idx)) {
	$Snscontents = new Snscontents();
	$Snscontents->setAttr('sns_contents_idx', $idx);
	$Snscontents->setAttr('oldSnsImg', $oldSnsImg);
	$Snscontents->setAttr('tmpImgFile', $tmpImgFile);
	

	$result = ($Snscontents->delete_file($dbh)) ? 1 : 0;
	//$result =1 ;
	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}