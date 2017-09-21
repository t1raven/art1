<?php
if (!defined('OKTOMATO')) exit;

$goods_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : 10;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$gnm = isset($_GET['gnm']) ? $_GET['gnm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;

$eYear = 1970;
$bYear = (int)date('Y');

$mediumCnt = count($aMedium);
$subjectCnt = count($aSubject);
$sizeCnt = count($aSize);
$colorCnt = count($aColor);

$Work = new Work();
$Work->setAttr('goods_idx', $goods_idx);

if (!empty($goods_idx)) {
	$Work->getEdit($dbh);
	$list = $Work->getFileInfo($dbh, $goods_idx);
	//print_r($list);
	if (!is_null($list) && is_array($list)) {
		$i = 1;
		foreach($list as $row) {
			$img_idx[$i] = $row['img_idx'];
			//echo $row['goods_img'];
			$goods_img[$i] = $row['goods_img'];
			++$i;
		}
	}
}
else {
	$Work->attr['is_rental'] = 'N';
	$Work->attr['goods_cnt'] = 1;
	$Work->attr['goods_display'] = 'Y';
	$Work->attr['sold_out_state'] = 'N';
}

$refereeList = $Work->getSearchReferee($dbh);

include('skin/basic/write.skin.php');

$Work = null;
$dbh = null;

unset($Work);
unset($dbh);
?>