<?php
if (!defined('OKTOMATO')) exit;

$provision_idx = isset($_GET['idx']) ? $_GET['idx'] : null;

if (empty($provision_idx)){
	$provision_idx = 1;
}

$Provision = new Provision();
$Provision->setAttr("provision_idx", (int)$provision_idx);

try {
	if (!$Provision->getRead($dbh)) {
		throw new Exception("게시물이 존재하지 않습니다.");
	}
} catch(Exception $e) {
	echo $e->getMessage();
	$dbh = null;
	exit;
}


require 'skin/basic/write.skin.php';

$Provision = null;
$dbh = null;
unset($Provision);
unset($dbh);
if (gc_enabled()) gc_collect_cycles();
?>