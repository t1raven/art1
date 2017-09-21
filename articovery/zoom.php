<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');

if ($_SESSION['user_idx']) {
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);

	//require(ROOT.'lib/class/articovery/zoom.class.php');
	require(ROOT.'lib/class/articovery/'.basename(__DIR__).'.class.php');

	$works_idx = isset($_POST['idx']) ? (int)$_POST['idx'] : null;
	$Articovery = new Articovery();
	$Articovery->setAttr('works_idx', $works_idx);
	$Articovery->setAttr('user_idx', $user_idx);

	$result = $Articovery->getRead($dbh);
	$isPin = $Articovery->getIsPin($dbh);

	$works_idx  = $Articovery->attr['works_idx'];
	$covery_idx  = $Articovery->attr['covery_idx'];
	$artist_idx  = $Articovery->attr['artist_idx'];
	$works_name = trim($Articovery->attr['works_name']);
	$works_make_year  = trim($Articovery->attr['works_make_year']);
	$works_make_type  = trim($Articovery->attr['works_make_type']);
	$works_width  = trim($Articovery->attr['works_width']);
	$works_depth  = trim($Articovery->attr['works_depth']);
	$works_height  = trim($Articovery->attr['works_height']);

	$title = !empty($works_name) ? $works_name : '';
	$title .= !empty($works_make_year) ? ', '.$works_make_year : '';
	$title .= !empty($works_make_type) ? ', '.$works_make_type : '';

	if (!empty($works_width) && !empty($works_depth) && !empty($works_height)) {
		$title .= ', '.$works_depth.' x '. $works_width.' x '.$works_height.'cm';
	}
	else if (!empty($works_width) && !empty($works_depth)) {
		$title .= ', '.$works_depth.' x '. $works_width.'cm';
	}

	$works_img = articoveryBigImgUploadPath.$Articovery->attr['works_img'];

	$pin_cnt = $Articovery->getMyPinCount($dbh);

	$dbh = null;
	$Articovery = null;
	unset($dhb);
	unset($Articovery);
	//echo  '{"result":"'.$result.'","works_idx":"'.$works_idx.'","covery_idx":"'.$covery_idx.'","artist_idx":"'.$artist_idx.'","works_name":"'.$works_name.'","works_make_year":"'.$works_make_year.'","works_make_type":"'.$works_make_type.'","works_size":"'.$works_size.'","works_img":"'.$works_img.'"}';
	echo  '{"result":"'.$result.'","works_idx":"'.$works_idx.'","covery_idx":"'.$covery_idx.'","artist_idx":"'.$artist_idx.'","title":"'.$title.'","works_img":"'.$works_img.'","pin":"'.$isPin.'", "pin_cnt":"'.$pin_cnt.'"}';
	//echo json_encode($data, 0);
}
else{
	echo '{"result":"0"}';
}

