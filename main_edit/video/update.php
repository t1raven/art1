<?php
if (!defined('OKTOMATO')) exit;

$oldContentUpFileName		= isset($_POST['oldContentUpFileName']) ? $_POST['oldContentUpFileName'] : null;
$mainContentIdx					= isset($_POST['mainContentIdx']) ? $_POST['mainContentIdx'] : null;
$contentType						= isset($_POST['contentType']) ? $_POST['contentType'] : null;
$title										= isset($_POST['title']) ? $_POST['title'] : null;
$subTitle								= isset($_POST['sub_title']) ? $_POST['sub_title'] : null;
$contentLink							= isset($_POST['contentLink']) ? $_POST['contentLink'] : null;
$size									= isset($_POST['size']) ? $_POST['size'] : null;

$mainContentImg					= isset($_FILES['mainContentImg']) ? $_FILES['mainContentImg'] : null;

$main = new Main();
$main->setAttr('mainContentIdx', Xss::chkXSS($mainContentIdx));
$main->setAttr('title', Xss::chkXSS($title));
$main->setAttr('subTitle', Xss::chkXSS($subTitle));
$main->setAttr('contentType', Xss::chkXSS($contentType));
$main->setAttr('colortype', Xss::chkXSS($colortype));
$main->setAttr('contentLink', Xss::chkXSS($contentLink));
////////////////////////////////
// 이미지 처리 S

// 첨부파일 처리
$arr_this_value = True ;
$arr_img =  $mainContentImg;

if (!empty($arr_img['name'])) {
	if (!LIB_FILE::MimeCheck($MIME['IMG'], $arr_img['tmp_name'])) {
		$msg = '업로드 불가능한 파일 형식입니다.';
		//Js::LocationReplace($msg, '?'.PageUtil::_param_get('at=write'), 'parent');
		$Content = null;
		$dbh = null;
		unset($Content);
		unset($dbh);
	}
}

//이미지 파일업로드 PC S
if ($arr_img['name']) {
	$uploadPath = bannerUploadPath;

	// 업로드 폴더 만들기
	if (!is_dir(ROOT.$uploadPath)) {
		LIB_FILE::CreateFolder(ROOT.$uploadPath, 0755);
	}

	// 기존파일명
	$arr_upFileName = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($arr_img['name']);
	$arr_oriFileName = LIB_LIB::CkSearch($arr_img['name']);

	if($size == 'w2h1' ) {
		$sizeW = 634;
		$sizeH = 312;
	} else if ($size == 'w2h2') {
		$sizeW = 634;
		$sizeH = 634;
	} else {
		$sizeW = 312;
		$sizeH = 312;
	}

	LIB_FILE::ThumNail($arr_img['tmp_name'], $arr_upFileName, $arr_upFileName, ROOT.$uploadPath, $EXT['IMG'], filesize($arr_img['tmp_name']), $sizeW, $sizeH, ""); // 섬네일
	$arr_upFileName = $uploadPath.$arr_upFileName ; //풀경로 지정


	// 등록된 사진 삭제
	if (!empty($oldContentUpFileName)) {
		LIB_FILE::DeleteFile(ROOT.$oldContentUpFileName);
	} else {
		//다른 컨텐츠를 선택해서 기존의 파일을 삭제할 수 없을 경우 이전에 등록된 이미지 삭제
		$row = $main->getContentEdit($dbh, $mainContentIdx);
		if(!empty($row['upFileName'])) {
			LIB_FILE::DeleteFile(str_replace('//','/',ROOT.$row['upFileName']) );
		}
	}


}else {
	$arr_upFileName = $oldContentUpFileName;
}
//이미지 파일 업로드 PC E

//아무 값도 들어오지 않으면 무시할 수 있는 값을 처리 // DB 입력시 유효한지 체크 후 처리
if ( empty($arr_img['name']) && empty($arr_linkUrl) ) {
	$arr_this_value = False  ;
}


$main->setAttr('upFileName', $arr_upFileName);

try{
	if (!empty($mainContentIdx) ) {
		$rResult = $main->updateContent($dbh);
		$msg = "업데이트 성공";
	}
	else {
		$msg = "ajax Error";
		//$rResult = $main->insertArr($dbh);
	}
}
catch(Exception $e) {
	 echo $e->getMessage();
	//JS::HistoryBack($e->getMessage());
}

$Content = null;
$dbh = null;

unset($Content);
unset($dbh);
?>
{"result":"<?php echo $rResult?>", "msg":"<?php echo $msg?>"}