<?php
if (!defined('OKTOMATO')) exit;

$works_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : 10;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$gnm = isset($_GET['gnm']) ? $_GET['gnm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;

$eYear = 1970;
$bYear = (int)date('Y');

$Work = new Work();
$Work->setAttr('works_idx', $works_idx);

$aArticovery = $Work->getArticovery($dbh);

if (!empty($works_idx)) {
	$Work->getEdit($dbh);
	$list = $Work->getFileInfo($dbh, $works_idx);
	//print_r($list);
	if (!is_null($list) && is_array($list)) {
		$i = 1;
		/*
		foreach($list as $row) {
			$img_idx[$i] = $row['img_idx'];
			//echo $row['goods_img'];
			$goods_img[$i] = $row['goods_img'];
			++$i;
		}
		*/
	}
}
else {
	$Work->attr['display_state'] = 'Y';
}



include('skin/basic/write.skin.php');

$Work = null;
$dbh = null;
unset($Work);
unset($dbh);
?>