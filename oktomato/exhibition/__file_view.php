<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class/exhibition/exhibition.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/function/common.php');

$exh_idx = setIsset($_POST['idx'], null);

$Exhibition = new exhibition();
$Exhibition->setAttr("exh_idx", $exh_idx);

//exit;
$aAttachFile = '';

try {
	if (!$Exhibition->getRead($dbh)) {
		// throw new Exception("게시물이 존재하지 않습니다.");
	}
}
catch(Exception $e) {
	$dbh = null;
	JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	exit;
}

if ( $Exhibition->attr['up_file_name'] != '' ) {
	echo ('<img src='.exhUploadPath.'m_'.$Exhibition->attr['up_file_name'].'  width=290>');
}

unset($Exhibition->attr);
?>
