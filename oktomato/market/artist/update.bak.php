<?php
if (!defined('OKTOMATO')) exit;

$artist_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$artist_name = isset($_POST['name']) ? Xss::chkXSS($_POST['name']) : null;
$artist_first_name = isset($_POST['first_name']) ? Xss::chkXSS($_POST['first_name']) : null;
$artist_last_name = isset($_POST['last_name']) ? Xss::chkXSS($_POST['last_name']) : null;
$birth_year = isset($_POST['birth_year']) ? Xss::chkXSS($_POST['birth_year']) : null;
$education_year = isset($_POST['education_year']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['education_year'])) : null;
$education_name = isset($_POST['education_name']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['education_name'])) : null;
$award_year = isset($_POST['award_year']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['award_year'])) : null;
$award_name = isset($_POST['award_name']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['award_name'])) : null;
$private_year = isset($_POST['private_year']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['private_year'])) : null;
$private_name = isset($_POST['private_name']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['private_name'])) : null;
$team_year = isset($_POST['team_year']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['team_year'])) : null;
$team_name = isset($_POST['team_name']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['team_name'])) : null;
$old_photo_up_file_name = isset($_POST['old_photo_file']) ? Xss::chkXSS($_POST['old_photo_file']) : null;
$old_photo_ori_file_name = isset($_POST['old_photo_ori_file']) ? Xss::chkXSS($_POST['old_photo_ori_file']) : null;
$old_cv_up_file_name = isset($_POST['old_cv_file']) ? Xss::chkXSS($_POST['old_cv_file']) : null;
$old_cv_ori_file_name = isset($_POST['old_cv_ori_file']) ? Xss::chkXSS($_POST['old_cv_ori_file']) : null;

$artist_idx  = (!empty($artist_idx)) ? (int)$artist_idx : '';

$Artist = new Artist();
$Artist->setAttr('artist_idx', $artist_idx);
$Artist->setAttr('artist_name', $artist_name);
$Artist->setAttr('artist_en_name', $artist_first_name.' '.$artist_last_name);
$Artist->setAttr('birth_year', $birth_year);
$Artist->setAttr('education_year', $education_year);
$Artist->setAttr('education_name', $education_name);
$Artist->setAttr('award_year', $award_year);
$Artist->setAttr('award_name', $award_name);
$Artist->setAttr('private_year', $private_year);
$Artist->setAttr('private_name', $private_name);
$Artist->setAttr('team_year', $team_year);
$Artist->setAttr('team_name', $team_name);

try {
	if ($_FILES['photo_file']['name']) {
		if (!LIB_FILE::MimeCheck($MIME['IMG'], $_FILES['photo_file']['tmp_name'])) {
			Js::LocationReplace('사용 가능한 파일형식이 아닙니다.('.$_FILES['photo_file']['name'].')', PHP_SELF.'?at=list', 'parent');
			setFree();
			exit();
		}
	}

	if ($_FILES['cv_file']['name']) {
		if (!LIB_FILE::MimeCheck($MIME['PDF'], $_FILES['cv_file']['tmp_name'])) {
			Js::LocationReplace('사용 가능한 파일형식이 아닙니다.('.$_FILES['cv_file']['name'].')', PHP_SELF.'?at=list', 'parent');
			setFree();
			exit();
		}
	}

	// 사진 파일업로드
	if ($_FILES['photo_file']['name']) {
		// 기존파일명
		$photo_up_file_name = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($_FILES['photo_file']['name']);
		$photo_ori_file_name = $_FILES['photo_file']['name'];

		// 파일 업로드
		LIB_FILE::FileUpload($_FILES['photo_file']['tmp_name'], $photo_up_file_name, $EXT['IMG'], ROOT.artistUploadPath);
		$Artist->setAttr('photo_up_file_name', $photo_up_file_name);
		$Artist->setAttr('photo_ori_file_name', $photo_ori_file_name);

		// 등록된 사진 삭제
		if (!empty($old_photo_up_file_name)) {
			LIB_FILE::DeleteFile(ROOT.artistUploadPath.$old_photo_up_file_name);
		}
	}
	else {
		$Artist->setAttr('photo_up_file_name', $old_photo_up_file_name);
		$Artist->setAttr('photo_ori_file_name', $old_photo_ori_file_name);
	}

	// CV 파일업로드
	if ($_FILES['cv_file']['name']) {
		// 기존 파일명
		$cv_up_file_name = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($_FILES['cv_file']['name']);
		$cv_ori_file_name = $_FILES['cv_file']['name'];

		// 파일 업로드
		LIB_FILE::FileUpload($_FILES['cv_file']['tmp_name'], $cv_up_file_name, $EXT['PDF'], ROOT.artistUploadPath);
		$Artist->setAttr('cv_up_file_name', $cv_up_file_name);
		$Artist->setAttr('cv_ori_file_name', $cv_ori_file_name);

		// 등록된 cv 파일 삭제
		if (!empty($old_cv_up_file_name)) {
			LIB_FILE::DeleteFile(ROOT.artistUploadPath.$old_cv_up_file_name);
		}
	}
	else {
		$Artist->setAttr('cv_up_file_name', $old_cv_up_file_name);
		$Artist->setAttr('cv_ori_file_name', $old_cv_ori_file_name);
	}


	if ($at === 'update' && !empty($artist_idx) && is_int($artist_idx)) {
		if ($Artist->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Artist->insert($dbh)) {
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
if (gc_enabled()) gc_collect_cycles();

function setFree() {
	$dbh = null;
	$Artist = null;
	unset($dbh);
	unset($Artist);
}
?>