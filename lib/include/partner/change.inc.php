<?php
if (!defined('OKTOMATO')) exit;

$idx = isset($_POST['idx']) ? (int)LIB_LIB::CkSearch($_POST['idx']) : null;
$cnt = 0;
$url = '/';


if (AES256::dec($_SESSION['galleryLevelCode'], AES_KEY) === '99') {
	if (!empty($idx) && is_numeric($idx)) {
		$_SESSION['galleryIdxTmp'] = $_SESSION['galleryIdx'];
		$_SESSION['galleryLevelCodeTmp'] = $_SESSION['galleryLevelCode'];
		$_SESSION['galleryIdx'] = AES256::enc($idx, AES_KEY);
		$_SESSION['galleryLevelCode'] = AES256::enc('60', AES_KEY);
		$cnt = 1;
		$url = '/partner/about/';
	}
}
else if (AES256::dec($_SESSION['galleryLevelCodeTmp'], AES_KEY) === '99' && AES256::dec($_SESSION['galleryLevelCode'], AES_KEY) === '60') {
	if (empty($idx)) {
		$_SESSION['galleryIdx'] = $_SESSION['galleryIdxTmp'];
		$_SESSION['galleryLevelCode'] = $_SESSION['galleryLevelCodeTmp'];
		$_SESSION['galleryIdxTmp'] = null;
		$_SESSION['galleryLevelCodeTmp'] = null;
		$url = '/partner/register/';
		$cnt = 1;
	}
}
echo '{"cnt":'.$cnt.', "url":"'.$url.'"}';