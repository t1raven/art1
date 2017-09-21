<?php
if (!defined('OKTOMATO')) exit;

$aOldBannerUpFileName		= isset($_POST['oldBannerUpFileName']) ? $_POST['oldBannerUpFileName'] : null;
$aOldBannerFileName			= isset($_POST['oldBannerFileName']) ? $_POST['oldBannerFileName'] : null;
$aOldBannerUpFileNameMobile		= isset($_POST['oldBannerUpFileName']) ? $_POST['oldBannerUpFileNameMobile'] : null;
$aOldBannerFileNameMobile			= isset($_POST['oldBannerFileName']) ? $_POST['oldBannerFileNameMobile'] : null;
$aMainBannerIdx					= isset($_POST['mainBannerIdx']) ? $_POST['mainBannerIdx'] : null;
$aLinkUrl								= isset($_POST['linkUrl']) ? $_POST['linkUrl'] : null;
$aBannerIsDisplay								= isset($_POST['isDisplay']) ? $_POST['isDisplay'] : null;
$aMainBannerImg				= isset($_FILES['mainBannerImg']) ? $_FILES['mainBannerImg'] : null;
$aMainBannerImgMobile				= isset($_FILES['mainBannerImgMobile']) ? $_FILES['mainBannerImgMobile'] : null;

$banner = new Banner();

$banner->setAttr('aMainBannerIdx', $aMainBannerIdx);
$banner->setAttr('aLinkUrl', $aLinkUrl);
$banner->setAttr('aBannerSection', '3');
//$banner->setAttr('aBannerIsDisplay', 'Y');
$banner->setAttr('aBannerIsDisplay', $aBannerIsDisplay);

////////////////////////////////
// 베너 이미지 처리 S

// 첨부파일 처리
$i=0;
foreach ($aMainBannerIdx as $value) {
	$arr_this_value[$i] = True ;
	$arr_img =  $aMainBannerImg;
	$arr_img_mobile =  $aMainBannerImgMobile;
	
	if (!empty($arr_img['name'][$i])) {
		if (!LIB_FILE::MimeCheck($MIME['IMG'], $arr_img['tmp_name'][$i])) {
			$msg = '업로드 불가능한 파일 형식입니다.';
			//Js::LocationReplace($msg, '?'.PageUtil::_param_get('at=write'), 'parent');
			$banner = null;
			$dbh = null;
			unset($banner);
			unset($dbh);
		}
	}

	if (!empty($arr_img_mobile['name'][$i])) {
		if (!LIB_FILE::MimeCheck($MIME['IMG'], $arr_img_mobile['tmp_name'][$i])) {
			$msg = '업로드 불가능한 파일 형식입니다.';
			//Js::LocationReplace($msg, '?'.PageUtil::_param_get('at=write'), 'parent');
			$banner = null;
			$dbh = null;
			unset($banner);
			unset($dbh);
		}
	}
	
	//이미지 파일업로드 PC S
	if ($arr_img['name'][$i]) {
		$uploadPath = bannerUploadPath ;

		// 업로드 폴더 만들기
		if (!is_dir(ROOT.$uploadPath)) {
			LIB_FILE::CreateFolder(ROOT.$uploadPath, 0755);
		}

		// 기존파일명
		$arr_upFileName[$i] = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($arr_img['name'][$i]);
		$arr_oriFileName[$i] = LIB_LIB::CkSearch($arr_img['name'][$i]);


		LIB_FILE::ThumNail($arr_img['tmp_name'][$i], $arr_upFileName[$i], $arr_upFileName[$i], ROOT.$uploadPath, $EXT['IMG'], filesize($arr_img['tmp_name'][$i]), "1600", "168", ""); // 섬네일
		$arr_upFileName[$i] = $uploadPath.$arr_upFileName[$i] ; //풀경로 지정


		// 등록된 사진 삭제
		if (!empty($aOldBannerUpFileName[$i])) {
			LIB_FILE::DeleteFile(ROOT.$aOldBannerUpFileName[$i]);
		}

	}else {
		$arr_upFileName[$i] = $aOldBannerUpFileName[$i];
		$arr_oriFileName[$i] = $aOldBannerFileName[$i];

	}
	//이미지 파일 업로드 PC E

	//아무 값도 들어오지 않으면 무시할 수 있는 값을 처리 // DB 입력시 유효한지 체크 후 처리
	if ( empty($arr_img['name'][$i]) && empty($arr_linkUrl[$i]) ) {
		$arr_this_value[$i] = False  ;
	}


	//이미지 파일업로드 모바일 S
	if ($arr_img_mobile['name'][$i]) {
		$uploadPath = bannerUploadPath ;

		// 업로드 폴더 만들기
		if (!is_dir(ROOT.$uploadPath)) {
			LIB_FILE::CreateFolder(ROOT.$uploadPath, 0755);
		}

		// 기존파일명
		$arr_upFileNameMobile[$i] = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($arr_img_mobile['name'][$i]);
		$arr_oriFileNameMobile[$i] = LIB_LIB::CkSearch($arr_img_mobile['name'][$i]);


		LIB_FILE::ThumNail($arr_img_mobile['tmp_name'][$i], $arr_upFileNameMobile[$i], $arr_upFileNameMobile[$i], ROOT.$uploadPath, $EXT['IMG'], filesize($arr_img_mobile['tmp_name'][$i]), "1019", "270", ""); // 섬네일
		$arr_upFileNameMobile[$i] = $uploadPath.$arr_upFileNameMobile[$i] ; //풀경로 지정


		// 등록된 사진 삭제
		if (!empty($aOldBannerUpFileNameMobile[$i])) {
			LIB_FILE::DeleteFile(ROOT.$aOldBannerUpFileNameMobile[$i]);
		}

	}else {
		$arr_upFileNameMobile[$i] = $aOldBannerUpFileNameMobile[$i];
		$arr_oriFileNameMobile[$i] = $aOldBannerFileNameMobile[$i];

	}
	//이미지 파일 업로드 모바일  E

	//아무 값도 들어오지 않으면 무시할 수 있는 값을 처리 // DB 입력시 유효한지 체크 후 처리
	if ( empty($arr_img_mobile['name'][$i]) ) {
		$arr_this_valueMobile[$i] = False  ;
	}

	$i++;
}

$banner->setAttr('aUpFileName', $arr_upFileName);
$banner->setAttr('aOriFileName', $arr_oriFileName);
$banner->setAttr('arr_this_value', $arr_this_value);

$banner->setAttr('aUpFileNameMobile', $arr_upFileNameMobile);
$banner->setAttr('aOriFileNameMobile', $arr_oriFileNameMobile);
$banner->setAttr('arr_this_value_mobile', $arr_this_valueMobile);

/*if (!empty($aMainBannerIdx) ) {
	//echo "chk1";
	$rResult = $banner->updateBanner($dbh);
}
else {
	//echo "chk2";
	//$rResult = $banner->insertArr($dbh);
}*/
/*
if ($rResult[0] && $rResult[1] === 'success') {
	$msg = '처리되었습니다.';
	//$url = '?at=list';
	//$url = '?at=list'.$params;
}
else {
	$msg = '오류가 발생했습니다1.';
	
}
$result = $rResult[1];
*/

// 뉴스 목록 이미지 처리 E
////////////////////////////////
try{
	//if ($mode == 'edit' && !is_null($news_idx) ) {
		//echo("수정 <br>");
		if ($banner->updateBanner($dbh)) {
			Js::LocationReplace('수정되었습니다.', '?'.PageUtil::_param_get('at=write'), 'parent');
		}
		else {
			throw new Exception('게시물이 수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	//}
}
catch(Exception $e) {
	 echo $e->getMessage();
	//mysql_unbuffered_query('rollback');
	//JS::HistoryBack($e->getMessage());
}


$banner = null;
$dbh = null;

unset($banner);
unset($dbh);
?>