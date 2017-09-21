<?php
if (!defined('OKTOMATO')) exit;

$goods_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$category_idx = isset($_POST['category_idx']) ? Xss::chkXSS($_POST['category_idx']) : 1; // 카테고리 하드 코딩(작품은 1, 아트상품은 2)
$goods_medium = isset($_POST['medium']) ? Xss::chkXSS($_POST['medium']) : null;
$goods_subject = isset($_POST['subject']) ? Xss::chkXSS($_POST['subject']) : null;
$goods_size = isset($_POST['size']) ? Xss::chkXSS($_POST['size']) : null;
$goods_color = isset($_POST['color']) ? Xss::chkXSS($_POST['color']) : null;
$artist_idx = isset($_POST['artist_idx']) ? Xss::chkXSS($_POST['artist_idx']) : null;
$goods_name = isset($_POST['goods_name']) ? Xss::chkXSS($_POST['goods_name']) : null;
$goods_make_year = isset($_POST['make_year']) ? Xss::chkXSS($_POST['make_year']) : null;
$goods_make_type = isset($_POST['make_type']) ? Xss::chkXSS($_POST['make_type']) : null;
$goods_frame_state = isset($_POST['frame_state']) ? Xss::chkXSS($_POST['frame_state']) : 'N';
$goods_width = isset($_POST['width_size']) ? Xss::chkXSS($_POST['width_size']) : null;
$goods_depth = isset($_POST['depth_size']) ? Xss::chkXSS($_POST['depth_size']) : null;
$goods_height = isset($_POST['height_size']) ? Xss::chkXSS($_POST['height_size']) : null;
$goods_sell_price = isset($_POST['sell_price']) ? Xss::chkXSS($_POST['sell_price']) : null;
$goods_rental_price = isset($_POST['rental_price']) ? Xss::chkXSS($_POST['rental_price']) : null;

$goods_lental_state = isset($_POST['lental_state']) ? Xss::chkXSS($_POST['lental_state']) : 'N';
$recommend_idx = isset($_POST['recommend_idx']) ? Xss::chkXSS($_POST['recommend_idx']) : null;
$goods_description = isset($_POST['description']) ? Xss::chkXSS($_POST['description']) : null;
$goods_material = isset($_POST['material']) ? Xss::chkXSS($_POST['material']) : null;
$goods_exhibit_year = isset($_POST['exhibit_year']) ? Xss::chkXSS($_POST['exhibit_year']) : null;
$goods_exhibit_item = isset($_POST['exhibit_item']) ? Xss::chkXSS($_POST['exhibit_item']) : null;
$goods_display = isset($_POST['display']) ? Xss::chkXSS($_POST['display']) : 'Y';
$goods_point = isset($_POST['goods_point']) ? Xss::chkXSS($_POST['goods_point']) : null;
$goods_maker = isset($_POST['goods_maker']) ? Xss::chkXSS($_POST['goods_maker']) : null;
$goods_origin = isset($_POST['goods_origin']) ? Xss::chkXSS($_POST['goods_origin']) : null;
$delivery_type = isset($_POST['delivery_type']) ? Xss::chkXSS($_POST['delivery_type']) : 0;
$delivery_price = isset($_POST['delivery_price']) ? Xss::chkXSS($_POST['delivery_price']) : null;
$freight_collect_price = isset($_POST['freight_collect_price']) ? Xss::chkXSS($_POST['freight_collect_price']) : null;
$goods_cnt_type = isset($_POST['goods_cnt_type']) ? Xss::chkXSS($_POST['goods_cnt_type']) : 0;
$goods_cnt = isset($_POST['goods_cnt']) ? Xss::chkXSS($_POST['goods_cnt']) : 1;
$order_min_cnt = isset($_POST['order_min_cnt']) ? Xss::chkXSS($_POST['order_min_cnt']) : 1;
$order_max_cnt = isset($_POST['order_max_cnt']) ? Xss::chkXSS($_POST['order_max_cnt']) : 1;
$goods_list_img = isset($_POST['list_img']) ? Xss::chkXSS($_POST['list_img']) : null;
$sold_out_state = isset($_POST['sold_out_state']) ? Xss::chkXSS($_POST['sold_out_state']) : 'N';
$del_state = isset($_POST['del_state']) ? Xss::chkXSS($_POST['del_state']) : 'N';
$goods_add_img1 = isset($_POST['add_img1']) ? Xss::chkXSS($_POST['add_img1']) : null;
$goods_add_img2 = isset($_POST['add_img2']) ? Xss::chkXSS($_POST['add_img2']) : null;
$goods_add_img3 = isset($_POST['add_img3']) ? Xss::chkXSS($_POST['add_img3']) : null;
$goods_add_img4 = isset($_POST['add_img4']) ? Xss::chkXSS($_POST['add_img4']) : null;
$goods_add_img5 = isset($_POST['add_img5']) ? Xss::chkXSS($_POST['add_img5']) : null;
$goods_add_img6 = isset($_POST['add_img6']) ? Xss::chkXSS($_POST['add_img6']) : null;
$goods_add_img7 = isset($_POST['add_img7']) ? Xss::chkXSS($_POST['add_img7']) : null;
$goods_add_img8 = isset($_POST['add_img8']) ? Xss::chkXSS($_POST['add_img8']) : null;
$goods_add_img9 = isset($_POST['add_img9']) ? Xss::chkXSS($_POST['add_img9']) : null;
$goods_add_img10 = isset($_POST['add_img10']) ? Xss::chkXSS($_POST['add_img10']) : null;

// 유효성 검사
if (!is_numeric($goods_sell_price)) {
	Js::Alert('판매 가격은 숫자만 입력가능합니다.');
	exit;
}

/*
if (!empty($goods_rental_price)) {
	if (!is_numeric($goods_rental_price)) {
		Js::Alert('렌탈 가격은 숫자만 입력가능합니다.');
		exit;
	}
}
*/

$goods_idx  = (!empty($goods_idx)) ? (int)$goods_idx : '';

$Work = new Work();
$Work->setAttr('goods_idx', $goods_idx);
$Work->setAttr('category_idx', $category_idx);
$Work->setAttr('goods_medium', $goods_medium);
$Work->setAttr('goods_subject', $goods_subject);
$Work->setAttr('goods_size', $goods_size);
$Work->setAttr('goods_color', $goods_color);
$Work->setAttr('artist_idx', $artist_idx);
$Work->setAttr('goods_name', $goods_name);
$Work->setAttr('goods_make_year', $goods_make_year);
$Work->setAttr('goods_make_type', $goods_make_type);
$Work->setAttr('goods_frame_state', $goods_frame_state);
$Work->setAttr('goods_width', $goods_width);
$Work->setAttr('goods_depth', $goods_depth);
$Work->setAttr('goods_height', $goods_height);
$Work->setAttr('goods_sell_price', $goods_sell_price);
$Work->setAttr('goods_rental_price', $goods_rental_price);
$Work->setAttr('goods_lental_state', $goods_lental_state);
$Work->setAttr('recommend_idx', $recommend_idx);
$Work->setAttr('goods_description', $goods_description);
$Work->setAttr('goods_material', $goods_material);
$Work->setAttr('goods_exhibit_year', $goods_exhibit_year);
$Work->setAttr('goods_exhibit_item', $goods_exhibit_item);
$Work->setAttr('goods_display', $goods_display);
$Work->setAttr('goods_point', $goods_point);
$Work->setAttr('goods_maker', $goods_maker);
$Work->setAttr('goods_origin', $goods_origin);
$Work->setAttr('delivery_type', $delivery_type);
$Work->setAttr('delivery_price', $delivery_price);
$Work->setAttr('freight_collect_price', $freight_collect_price);
$Work->setAttr('goods_cnt_type', $goods_cnt_type);
$Work->setAttr('goods_cnt', $goods_cnt);
$Work->setAttr('order_min_cnt', $order_min_cnt);
$Work->setAttr('order_max_cnt', $order_max_cnt);
$Work->setAttr('goods_list_img', $goods_list_img);
$Work->setAttr('sold_out_state', $sold_out_state);
$Work->setAttr('del_state', $del_state);
$Work->setAttr('goods_add_img1', $goods_add_img1);
$Work->setAttr('goods_add_img2', $goods_add_img2);
$Work->setAttr('goods_add_img3', $goods_add_img3);
$Work->setAttr('goods_add_img4', $goods_add_img4);
$Work->setAttr('goods_add_img5', $goods_add_img5);
$Work->setAttr('goods_add_img6', $goods_add_img6);
$Work->setAttr('goods_add_img7', $goods_add_img7);
$Work->setAttr('goods_add_img8', $goods_add_img8);
$Work->setAttr('goods_add_img9', $goods_add_img9);
$Work->setAttr('goods_add_img10', $goods_add_img10);

try {
	/*
	$cnt = count($_FILES['img']['name']);
	echo "cnt:$cnt";

	for($i=0; $i<=$cnt; $i++) {
		if (!empty($_FILES['img']['name'][$i])) {
			if (!LIB_FILE::MimeCheck($MIME['IMG'], $_FILES['img']['tmp_name'][$i])) {
				Js::LocationReplace('사용 가능한 파일형식이 아닙니다.('.$_FILES['img']['name'][$i].')', '/oktomato/artist/?at=list', 'parent');
				setFree();
				exit();
			}
		}
	}

	echo "here";

	// 작품 이미지 파일업로드
	for($i=0; $i<=$cnt; $i++) {
		if (!empty($_FILES['img']['name'][$i])) {
			echo "<br>i:$i";
			$work_img[$i] = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($_FILES['img']['name'][$i]); // 파일명 생성
			//LIB_FILE::ThumNail($_FILES['img']['tmp_name'][$i], $_FILES['img']['name'][$i], 's'.$work_img[$i], ROOT.workUploadPath, $EXT['IMG'], $_FILES['img']['size'][$i], "450", "2048", ""); // 섬네일
			LIB_FILE::FileUpload($_FILES['img']['tmp_name'][$i], $work_img[$i], $EXT['IMG'], ROOT.workUploadPath); // 이미지 파일 업로드
			LIB_FILE::ThumNail(ROOT.workUploadPath.$work_img[$i], $work_img[$i], 's'.$work_img[$i], ROOT.workUploadPath, $EXT['IMG'], filesize(ROOT.workUploadPath.$work_img[$i]), '450', '2048', ''); // 섬네일
			$Work->setAttr('work_img_'.$i.'', $work_img[$i]);

			// 등록된 이미지 파일 삭제
			if (!empty($aOldImg[$i])) {
				LIB_FILE::DeleteFile(ROOT.workUploadPath.$aOldImg[$i]);
				LIB_FILE::DeleteFile(ROOT.workUploadPath.'s'.$aOldImg[$i]);
			}
		}
		else {
			$Work->setAttr('work_img_'.$i.'', $aOldImg[$i]);
		}
	}
	*/


	if ($at === 'update' && !empty($goods_idx) && is_int($goods_idx)) {
		if ($Work->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Work->insert($dbh)) {
			Js::LocationReplace('등록되었습니다.', PHP_SELF, 'parent');
		}
		else {
			throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
}
catch(Exception $e) {
	JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
}

setFree();

function setFree() {
	$Work = null;
	$dbh = null;
	unset($Work);
	unset($dbh);
}
?>