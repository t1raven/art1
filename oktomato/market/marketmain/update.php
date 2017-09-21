<?php
if (!defined('OKTOMATO')) exit;

$banner_type = isset($_POST['banner_type']) ? Xss::chkXSS($_POST['banner_type']) : null;

if ($banner_type === 'main') {
	$num = isset($_POST['num']) ? Xss::chkXSS($_POST['num']) : null;
	$mmb_gubun = isset($_POST['gubun'.$num]) ? Xss::chkXSS($_POST['gubun'.$num]) : null;	
	$mmb_display = isset($_POST['display'.$num]) ? Xss::chkXSS($_POST['display'.$num]) : 'Y';
	$orders = isset($_POST['orders'.$num]) ? Xss::chkXSS($_POST['orders'.$num]) : null;

	if (empty($num)) exit;

	$goods_name = null;
	$goods_idx = null;
	$evt_title = null;
	$evt_idx = null;

	if ($mmb_gubun === 'A') {
		$goods_name = isset($_POST['artwork_txt']) ? Xss::chkXSS($_POST['artwork_txt']) : null;
		$goods_idx = isset($_POST['artwork']) ? Xss::chkXSS($_POST['artwork']) : null;
	}
	else if ($mmb_gubun === 'E'){
		$evt_title = isset($_POST['event_txt']) ? Xss::chkXSS($_POST['event_txt']) : null;
		$evt_idx = isset($_POST['event']) ? Xss::chkXSS($_POST['event']) : null;
	}
	else {
		$mmb_link = isset($_POST['main_link']) ? Xss::chkXSS($_POST['main_link']) : null;
	}

	$old_img_name = isset($_POST['old_img_name']) ? Xss::chkXSS($_POST['old_img_name']) : null;
	$old_img_rename = isset($_POST['old_img_rename']) ? Xss::chkXSS($_POST['old_img_rename']) : null;
	$old_img_mobile_name = isset($_POST['old_img_mobile_name']) ? Xss::chkXSS($_POST['old_img_mobile_name']) : null;
	$old_img_mobile_rename = isset($_POST['old_img_mobile_rename']) ? Xss::chkXSS($_POST['old_img_mobile_rename']) : null;



	try {
		// PC 이미지 처리
		if (!empty($_FILES['main_banner_img']['name'])) {
			if (!LIB_FILE::MimeCheck($MIME['IMG'], $_FILES['main_banner_img']['tmp_name'])) {
				Js::LocationReplace('사용 가능한 파일형식이 아닙니다.('.$_FILES['main_banner_img']['name'].')', PHP_SELF, 'parent');
				setFree();
				exit();
			}
			else {
				$mmb_img_name = $_FILES['main_banner_img']['name'];
				$mmb_img_rename = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($_FILES['main_banner_img']['name']); // 파일명 생성

				LIB_FILE::FileUpload($_FILES['main_banner_img']['tmp_name'], $mmb_img_rename, $EXT['IMG'], ROOT.marketMainUploadPath); // 이미지 파일 업로드

				// 등록된 이미지 파일 삭제
				if (!empty($old_img_rename)) {
					LIB_FILE::DeleteFile(ROOT.marketMainUploadPath.$old_img_rename);
				}
			}
		}
		else {
			$mmb_img_name = $old_img_name;
			$mmb_img_rename = $old_img_rename;
		}

		// 모바일 이미지 처리
		if (!empty($_FILES['main_banner_mobile_img']['name'])) {
			if (!LIB_FILE::MimeCheck($MIME['IMG'], $_FILES['main_banner_mobile_img']['tmp_name'])) {
				Js::LocationReplace('사용 가능한 파일형식이 아닙니다.('.$_FILES['main_banner_mobile_img']['name'].')', PHP_SELF, 'parent');
				setFree();
				exit();
			}
			else {
				$mmb_img_mobile_name = $_FILES['main_banner_mobile_img']['name'];
				$mmb_img_mobile_rename = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($_FILES['main_banner_mobile_img']['name']); // 파일명 생성

				LIB_FILE::FileUpload($_FILES['main_banner_mobile_img']['tmp_name'], $mmb_img_mobile_rename, $EXT['IMG'], ROOT.marketMainUploadPath); // 이미지 파일 업로드

				// 등록된 이미지 파일 삭제
				if (!empty($old_img_mobile_rename)) {
					LIB_FILE::DeleteFile(ROOT.marketMainUploadPath.$old_img_mobile_rename);
				}
			}
		}
		else {
			$mmb_img_mobile_name = $old_img_mobile_name;
			$mmb_img_mobile_rename = $old_img_mobile_rename;
		}

		$Marketmain = new Marketmain();
		$Marketmain->setAttr('mmb_display', $mmb_display);
		$Marketmain->setAttr('mmb_gubun', $mmb_gubun);
		$Marketmain->setAttr('goods_name', $goods_name);
		$Marketmain->setAttr('goods_idx', $goods_idx);
		$Marketmain->setAttr('evt_title', $evt_title);
		$Marketmain->setAttr('evt_idx', $evt_idx);
		$Marketmain->setAttr('mmb_link', $mmb_link);
		$Marketmain->setAttr('mmb_img_name', $mmb_img_name);
		$Marketmain->setAttr('mmb_img_rename', $mmb_img_rename);
		$Marketmain->setAttr('mmb_img_mobile_name', $mmb_img_mobile_name);
		$Marketmain->setAttr('mmb_img_mobile_rename', $mmb_img_mobile_rename);
		$Marketmain->setAttr('orders', $orders);
		$Marketmain->setAttr('mmb_idx', $num);

		if ($Marketmain->updateMainBanner($dbh)) {
			Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	catch(Exception $e) {
		//JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
	}
}
elseif ($banner_type === 'genre') {

	$Marketmain = new Marketmain();


	//$cnt = count($_FILES['genre_banner_img']['name']);
	//echo "cnt:$cnt";

	for($i=0; $i<=7; $i++) {
		if (!empty($_FILES['genre_banner_img']['name'][$i])) {
			if (!LIB_FILE::MimeCheck($MIME['IMG'], $_FILES['genre_banner_img']['tmp_name'][$i])) {
				Js::LocationReplace('사용 가능한 파일형식이 아닙니다.('.$_FILES['genre_banner_img']['name'][$i].')', PHP_SELF, 'parent');
				setFree();
				exit();
			}
		}
	}

	// 작품 이미지 파일업로드
	for($i=0; $i<=7; $i++) {
		if (!empty($_FILES['genre_banner_img']['name'][$i])) {
			$genreBannerReImg[$i] = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($_FILES['genre_banner_img']['name'][$i]); // 파일명 생성
			LIB_FILE::FileUpload($_FILES['genre_banner_img']['tmp_name'][$i], $genreBannerReImg[$i], $EXT['IMG'], ROOT.marketGenreUploadPath); // 이미지 파일 업로드

			// 등록된 이미지 파일 삭제
			if (!empty($_POST['old_genre_banner_reimg'][$i])) {
				LIB_FILE::DeleteFile(ROOT.marketGenreUploadPath.$_POST['old_genre_banner_reimg'][$i]);
			}

			$Marketmain->setAttr('goods_img_name', $_FILES['genre_banner_img']['name'][$i]);
			$Marketmain->setAttr('goods_img_rename', $genreBannerReImg[$i]);
		}
		else {
			$Marketmain->setAttr('goods_img_name', $_POST['old_genre_banner_img'][$i]);
			$Marketmain->setAttr('goods_img_rename', $_POST['old_genre_banner_reimg'][$i]);
		}

		$Marketmain->setAttr('goods_medium', $i);

		try {
			if ($Marketmain->updateGenreBanner($dbh)) {
				$bUpdate = true;
				//Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
			}
			else {
				$bUpdate = false;
				throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
			}
		}
		catch(Exception $e) {
			$bUpdate = false;
			JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
		}
	}

	if ($bUpdate) {
		Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
	}
	else {
		Js::LocationReplace('오류', PHP_SELF, 'parent');
	}
}


setFree();

function setFree() {
	$Marketmain = null;
	$dbh = null;
	unset($Marketmain);
	unset($dbh);
}
?>