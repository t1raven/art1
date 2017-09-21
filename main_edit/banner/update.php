<?php
if (!defined('OKTOMATO')) exit;

$oldBannerUpFileName		= isset($_POST['oldBannerUpFileName']) ? $_POST['oldBannerUpFileName'] : null;
$oldBannerFileName			= isset($_POST['oldBannerFileName']) ? $_POST['oldBannerFileName'] : null;
$oldBannerUpFileNameMobile		= isset($_POST['oldBannerUpFileName']) ? $_POST['oldBannerUpFileNameMobile'] : null;
$oldBannerFileNameMobile			= isset($_POST['oldBannerFileName']) ? $_POST['oldBannerFileNameMobile'] : null;
$mainBannerIdx					= isset($_POST['mainBannerIdx']) ? $_POST['mainBannerIdx'] : null;
$linkUrl								= isset($_POST['linkUrl']) ? $_POST['linkUrl'] : null;
$isDisplay								= isset($_POST['isDisplay']) ? $_POST['isDisplay'] : null;
$mainBannerImg				= isset($_FILES['mainBannerImg']) ? $_FILES['mainBannerImg'] : null;
$mainBannerImgMobile				= isset($_FILES['mainBannerImgMobile']) ? $_FILES['mainBannerImgMobile'] : null;

$main = new Main();
foreach($_POST as $key => $value) {
	if (!is_array($value)) {
		$main->setAttr($key, Xss::chkXSS($value));
	}
	else {
		$$key = $value;
	}
}

////////////////////////////////
// 베너 이미지 처리 S

// 첨부파일 처리
//$i=0;
//foreach ($aMainBannerIdx as $value) {
	$arr_this_value = True ;
	$arr_img =  $mainBannerImg;
	$arr_img_mobile =  $mainBannerImgMobile;
	
	if (!empty($arr_img['name'])) {
		if (!LIB_FILE::MimeCheck($MIME['IMG'], $arr_img['tmp_name'])) {
			$msg = '업로드 불가능한 파일 형식입니다.';
			//Js::LocationReplace($msg, '?'.PageUtil::_param_get('at=write'), 'parent');
			$banner = null;
			$dbh = null;
			unset($banner);
			unset($dbh);
		}
	}

	if (!empty($arr_img_mobile['name'])) {
		if (!LIB_FILE::MimeCheck($MIME['IMG'], $arr_img_mobile['tmp_name'])) {
			$msg = '업로드 불가능한 파일 형식입니다.';
			//Js::LocationReplace($msg, '?'.PageUtil::_param_get('at=write'), 'parent');
			$banner = null;
			$dbh = null;
			unset($banner);
			unset($dbh);
		}
	}
	
	//이미지 파일업로드 PC S
	if ($arr_img['name']) {
		$uploadPath = bannerUploadPath ;

		// 업로드 폴더 만들기
		if (!is_dir(ROOT.$uploadPath)) {
			LIB_FILE::CreateFolder(ROOT.$uploadPath, 0755);
		}

		// 기존파일명
		$arr_upFileName = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($arr_img['name']);
		$arr_oriFileName = LIB_LIB::CkSearch($arr_img['name']);


		LIB_FILE::ThumNail($arr_img['tmp_name'], $arr_upFileName, $arr_upFileName, ROOT.$uploadPath, $EXT['IMG'], filesize($arr_img['tmp_name']), "1600", "168", ""); // 섬네일
		$arr_upFileName = $uploadPath.$arr_upFileName ; //풀경로 지정


		// 등록된 사진 삭제
		if (!empty($oldBannerUpFileName)) {
			LIB_FILE::DeleteFile(ROOT.$oldBannerUpFileName);
		}

	}else {
		$arr_upFileName = $oldBannerUpFileName;
		$arr_oriFileName = $oldBannerFileName;

	}
	//이미지 파일 업로드 PC E

	//아무 값도 들어오지 않으면 무시할 수 있는 값을 처리 // DB 입력시 유효한지 체크 후 처리
	if ( empty($arr_img['name']) && empty($arr_linkUrl) ) {
		$arr_this_value = False  ;
	}


	//이미지 파일업로드 모바일 S
	if ($arr_img_mobile['name']) {
		$uploadPath = bannerUploadPath ;

		// 업로드 폴더 만들기
		if (!is_dir(ROOT.$uploadPath)) {
			LIB_FILE::CreateFolder(ROOT.$uploadPath, 0755);
		}

		// 기존파일명
		$arr_upFileNameMobile = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($arr_img_mobile['name']);
		$arr_oriFileNameMobile = LIB_LIB::CkSearch($arr_img_mobile['name']);


		LIB_FILE::ThumNail($arr_img_mobile['tmp_name'], $arr_upFileNameMobile, $arr_upFileNameMobile, ROOT.$uploadPath, $EXT['IMG'], filesize($arr_img_mobile['tmp_name']), "1019", "270", ""); // 섬네일
		$arr_upFileNameMobile = $uploadPath.$arr_upFileNameMobile ; //풀경로 지정


		// 등록된 사진 삭제
		if (!empty($oldBannerUpFileNameMobile)) {
			LIB_FILE::DeleteFile(ROOT.$oldBannerUpFileNameMobile);
		}

	}else {
		$arr_upFileNameMobile = $oldBannerUpFileNameMobile;
		$arr_oriFileNameMobile = $oldBannerFileNameMobile;

	}
	//이미지 파일 업로드 모바일  E

	//아무 값도 들어오지 않으면 무시할 수 있는 값을 처리 // DB 입력시 유효한지 체크 후 처리
	if ( empty($arr_img_mobile['name']) ) {
		$arr_this_valueMobile = False  ;
	}

$main->setAttr('upFileName', $arr_upFileName);
$main->setAttr('oriFileName', $arr_oriFileName);
$main->setAttr('arr_this_value', $arr_this_value);

$main->setAttr('upFileNameMobile', $arr_upFileNameMobile);
$main->setAttr('oriFileNameMobile', $arr_oriFileNameMobile);
$main->setAttr('arr_this_value_mobile', $arr_this_valueMobile);



try{
	if (!empty($mainBannerIdx) ) {
		//echo "chk1";
		$rResult = $main->updateBanner($dbh);
		$msg = "업데이트 성공";
	}
	else {
		$msg = "ajax Error";
		//echo "chk2";
		//$rResult = $main->insertArr($dbh);
	}
}
catch(Exception $e) {
	 echo $e->getMessage();
	//JS::HistoryBack($e->getMessage());
}

$banner = null;
$dbh = null;

unset($banner);
unset($dbh);
?>
{"result":"<?php echo $rResult?>", "msg":"<?php echo $msg?>"}