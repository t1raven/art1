<?php
if (!defined('OKTOMATO')) exit;

$aMainQuickLinkIdx = isset($_POST['mainQuickLinkIdx']) ? $_POST['mainQuickLinkIdx'] : null;
$aOldQuickUpFileName = isset($_POST['oldQuickUpFileName']) ? $_POST['oldQuickUpFileName'] : null;
$aQuickUpFileName = isset($_FILES['quickUpFileName']) ? $_FILES['quickUpFileName'] : null;
$aQuickText = isset($_POST['quickText']) ? $_POST['quickText'] : null;
$aQuickHyperlink = isset($_POST['quickHyperlink']) ? $_POST['quickHyperlink'] : null;

$main = new Main();

$main->setAttr('aMainQuickLinkIdx', $aMainQuickLinkIdx);
$main->setAttr('aOldQuickUpFileName', $aOldQuickUpFileName);
$main->setAttr('aQuickText', $aQuickText);
$main->setAttr('aQuickHyperlink', $aQuickHyperlink);


// 첨부파일 처리
$i=0;
foreach ($aMainQuickLinkIdx as $value) {
	$arr_this_value[$i] = True ;
	$arr_img =  $aQuickUpFileName;


	if (!empty($arr_img['name'][$i])) {
		if (!LIB_FILE::MimeCheck($MIME['IMG'], $arr_img['tmp_name'][$i])) {
			$msg = '업로드 불가능한 파일 형식입니다.';
			//Js::LocationReplace($msg, '?'.PageUtil::_param_get('at=write'), 'parent');
			$main = null;
			$dbh = null;
			unset($main);
			unset($dbh);
			exit;
		}
	}


	//이미지 파일업로드 S
	if ($arr_img['name'][$i]) {
		$uploadPath = bannerUploadPath ;

		// 업로드 폴더 만들기
		if (!is_dir(ROOT.$uploadPath)) {
			LIB_FILE::CreateFolder(ROOT.$uploadPath, 0755);
		}

		// 기존파일명
		$arr_upFileName[$i] = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($arr_img['name'][$i]);
		$arr_oriFileName[$i] = LIB_LIB::CkSearch($arr_img['name'][$i]);


		LIB_FILE::ThumNail($arr_img['tmp_name'][$i], $arr_upFileName[$i], $arr_upFileName[$i], ROOT.$uploadPath, $EXT['IMG'], filesize($arr_img['tmp_name'][$i]), "26", "26", ""); // 섬네일
		$arr_upFileName[$i] = $uploadPath.$arr_upFileName[$i] ; //풀경로 지정

		// 등록된 사진 삭제
		if (!empty($oldBannerUpFileName[$i])) {
			LIB_FILE::DeleteFile(ROOT.$oldBannerUpFileName[$i]);
		}

	}else {
		$arr_upFileName[$i] = $aOldQuickUpFileName[$i];

	}

	//이미지 파일 업로드 E

	//아무 값도 들어오지 않으면 무시할 수 있는 값을 처리 // DB 입력시 유효한지 체크 후 처리
	if ( empty($arr_img['name'][$i]) && empty($arr_linkUrl[$i]) ) {
		$arr_this_value[$i] = False  ;
	}

	$i++;
}

$main->setAttr('aUpFileName', $arr_upFileName);
$main->setAttr('aOriFileName', $arr_oriFileName);
$main->setAttr('arr_this_value', $arr_this_value);

try{
	if (!empty($aMainQuickLinkIdx) ) {
		//echo "chk1";
		$rResult[0] = $main->updateQuick($dbh);
		$msg = "업데이트 성공";
		$result = true;
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
{"result":"<?php echo $result?>", "msg":"<?php echo $msg?>"}