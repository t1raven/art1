<?php
if (!defined('OKTOMATO')) exit;

if ($_SESSION['user_idx']) {
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
	$user_level = AES256::dec($_SESSION['user_level_code'], AES_KEY);
	$works_idx = isset($_POST['idx']) ? (int)$_POST['idx'] : null;
	$Pin = new Pin();
	$Pin->setAttr('works_idx', $works_idx);
	$Pin->setAttr('user_idx', $user_idx);

	$result = $Pin->getRead($dbh);
	$isPin = $Pin->getIsPin($dbh);

	$works_idx  = $Pin->attr['works_idx'];
	$covery_idx  = $Pin->attr['covery_idx'];
	$artist_idx  = $Pin->attr['artist_idx'];
	$works_name = trim($Pin->attr['works_name']);
	$works_make_year  = trim($Pin->attr['works_make_year']);
	$works_make_type  = trim($Pin->attr['works_make_type']);
	$works_width  = trim($Pin->attr['works_width']);
	$works_depth  = trim($Pin->attr['works_depth']);
	$works_height  = trim($Pin->attr['works_height']);

	$title = !empty($works_name) ? $works_name : '';
	$title .= !empty($works_make_year) ? ', '.$works_make_year : '';
	$title .= !empty($works_make_type) ? ', '.$works_make_type : '';

	if (!empty($works_width) && !empty($works_depth) && !empty($works_height)) {
		$title .= ', '.$works_depth.' x '. $works_width.' x '.$works_height.'cm';
	}
	else if (!empty($works_width) && !empty($works_depth)) {
		$title .= ', '.$works_depth.' x '. $works_width.'cm';
	}

	$works_img = articoveryBigImgUploadPath.$Pin->attr['works_img'];
	$pin_cnt = $Pin->getMyPinCount($dbh);

	//$Pin->setAttr('covery_idx', $covery_idx);
	$contact = $Pin->getIsContact($dbh);

	// 관리자 일경우 예외 처리
	if ($user_level == '99') {
		//$pin_cnt = ($pin_cnt == 9) ? 8 : $pin_cnt;
		//$pin_cnt = 0;
		$contact = 0;
	}


	$dbh = null;
	$Pin = null;
	unset($dhb);
	unset($Pin);
	//echo  '{"result":"'.$result.'","works_idx":"'.$works_idx.'","covery_idx":"'.$covery_idx.'","artist_idx":"'.$artist_idx.'","works_name":"'.$works_name.'","works_make_year":"'.$works_make_year.'","works_make_type":"'.$works_make_type.'","works_size":"'.$works_size.'","works_img":"'.$works_img.'"}';
	echo  '{"result":"'.$result.'","works_idx":"'.$works_idx.'","covery_idx":"'.$covery_idx.'","artist_idx":"'.$artist_idx.'","title":"'.$title.'","works_img":"'.$works_img.'","pin":"'.$isPin.'", "pin_cnt":"'.$pin_cnt.'", "contact":"'.$contact.'"}';
	//echo json_encode($data, 0);
}
else{
	echo '{"result":"0"}';
}
