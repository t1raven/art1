<?php
if (!defined('OKTOMATO')) exit;

$arr_sc_idx = isset($_POST['sc_idx']) ? Xss::chkXSS($_POST['sc_idx']) : null;
$arr_s_idx = isset($_POST['s_idx']) ? Xss::chkXSS($_POST['s_idx']) : null;
$arr_sns_img = isset($_POST['sns_img']) ? Xss::chkXSS($_POST['sns_img']) : null;
//$arr_old_sns_img = isset($_POST['old_sns_img']) ? Xss::chkXSS($_POST['old_sns_img']) : null;
$arr_title = isset($_POST['title']) ? Xss::chkXSS($_POST['title']) : null;
$arr_content = isset($_POST['content']) ? Xss::chkXSS($_POST['content']) : null;
$arr_cdate = isset($_POST['cdate']) ? Xss::chkXSS($_POST['cdate']) : null;

$Snscontents = new Snscontents();
$Snscontents->setAttr('arr_s_idx', $arr_s_idx);
$Snscontents->setAttr('arr_sc_idx', $arr_sc_idx);
$Snscontents->setAttr('arr_sns_img', $arr_sns_img);
$Snscontents->setAttr('arr_title', $arr_title);
$Snscontents->setAttr('arr_content', $arr_content);
$Snscontents->setAttr('arr_cdate', $arr_cdate);

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
			$Snscontents_img[$i] = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($_FILES['img']['name'][$i]); // 파일명 생성
			//LIB_FILE::ThumNail($_FILES['img']['tmp_name'][$i], $_FILES['img']['name'][$i], 's'.$Snscontents_img[$i], ROOT.SnscontentsUploadPath, $EXT['IMG'], $_FILES['img']['size'][$i], "450", "2048", ""); // 섬네일
			LIB_FILE::FileUpload($_FILES['img']['tmp_name'][$i], $Snscontents_img[$i], $EXT['IMG'], ROOT.SnscontentsUploadPath); // 이미지 파일 업로드
			LIB_FILE::ThumNail(ROOT.SnscontentsUploadPath.$Snscontents_img[$i], $Snscontents_img[$i], 's'.$Snscontents_img[$i], ROOT.SnscontentsUploadPath, $EXT['IMG'], filesize(ROOT.SnscontentsUploadPath.$Snscontents_img[$i]), '450', '2048', ''); // 섬네일
			$Snscontents->setAttr('Snscontents_img_'.$i.'', $Snscontents_img[$i]);

			// 등록된 이미지 파일 삭제
			if (!empty($aOldImg[$i])) {
				LIB_FILE::DeleteFile(ROOT.SnscontentsUploadPath.$aOldImg[$i]);
				LIB_FILE::DeleteFile(ROOT.SnscontentsUploadPath.'s'.$aOldImg[$i]);
			}
		}
		else {
			$Snscontents->setAttr('Snscontents_img_'.$i.'', $aOldImg[$i]);
		}
	}
	*/

 //SNS 는 정해져 있으므로 입력(insert)은 없다.
 //만일 새로운 값이 추가되야 한다면 sns_contents 테이블에 직접 sns_link_idx 값을 입력한 후 업데이트 로직을 이용하여 자료 업데이트
	if ($Snscontents->update($dbh)) {
		//Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
		Js::LocationReplace('수정되었습니다.', '?at=list', 'parent');
	}
	else {
		throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
	}
}
catch(Exception $e) {
	JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
}

setFree();

function setFree() {
	$Snscontents = null;
	$dbh = null;
	unset($Snscontents);
	unset($dbh);
}
?>