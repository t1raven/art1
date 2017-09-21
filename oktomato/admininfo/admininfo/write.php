<?php
if (!defined('OKTOMATO')) exit;

//$admininfo_idx = isset($_GET['idx']) ? $_GET['idx'] : null;

if (empty($admininfo_idx)){
	$admininfo_idx = '000001'; //site_info 테이블 idx
}
$user_idx = 1; //member 테이블 관리자 idx

$Admininfo = new Admininfo();
$Admininfo->setAttr("admininfo_idx", $admininfo_idx);

try {
	if (!$Admininfo->getRead($dbh)) {
		throw new Exception("게시물이 존재하지 않습니다.");
	}
} catch(Exception $e) {
	echo $e->getMessage();
	$dbh = null;
	exit;
}

$Member = new Member();
$Member->setAttr("user_idx", 1);

try {
	if (!$Member->getRead($dbh)) {
		throw new Exception("게시물이 존재하지 않습니다.");
	}
} catch(Exception $e) {
	echo $e->getMessage();
	$dbh = null;
	exit;
}

require 'skin/basic/write.skin.php';

$Admininfo = null;
$dbh = null;
unset($Admininfo);
unset($dbh);
if (gc_enabled()) gc_collect_cycles();
?>