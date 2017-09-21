<?php
if (!defined('OKTOMATO')) exit;

$recommend_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$referee = isset($_POST['referee']) ? Xss::chkXSS($_POST['referee']) : null;
$old_img_up_file_name = isset($_POST['old_img_up_file']) ? Xss::chkXSS($_POST['old_img_up_file']) : null;


$Recommend = new Recommend();
$Recommend->setAttr('recommend_idx', $recommend_idx);
$Recommend->setAttr('referee', $referee);

try {
	if ($_FILES['img_file']['name']) {
		if (!LIB_FILE::MimeCheck($MIME['IMG'], $_FILES['img_file']['tmp_name'])) {
			Js::LocationReplace('사용 가능한 파일형식이 아닙니다.('.$_FILES['img_file']['name'].')', PHP_SELF, 'parent');
			setFree();
			exit();
		}
	}

	// 이미지 파일업로드
	if ($_FILES['img_file']['name']) {
		// 기존파일명
		$img_up_file_name = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($_FILES['img_file']['name']);

		// 파일 업로드
		LIB_FILE::FileUpload($_FILES['img_file']['tmp_name'], $img_up_file_name, $EXT['IMG'], ROOT.recommendUploadPath);
		$Recommend->setAttr('img_up_file_name', $img_up_file_name);

		// 등록된 사진 삭제
		if (!empty($old_img_up_file_name)) {
			LIB_FILE::DeleteFile(ROOT.recommendUploadPath.$old_img_up_file_name);
		}
	}
	else {
		$Recommend->setAttr('img_up_file_name', $old_img_up_file_name);

	}

	if ($at === 'update' && !empty($recommend_idx) && is_numeric($recommend_idx)) {
		if ($Recommend->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Recommend->insert($dbh)) {
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
	$Recommend = null;
	$dbh = null;
	unset($Recommend);
	unset($dbh);
	if (gc_enabled()) gc_collect_cycles();
}
?>