<?php
if (!defined('OKTOMATO')) exit;

$artist_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$artist_name = isset($_POST['name']) ? Xss::chkXSS($_POST['name']) : null;
$artist_first_name = isset($_POST['first_name']) ? Xss::chkXSS($_POST['first_name']) : null;
$artist_last_name = isset($_POST['last_name']) ? Xss::chkXSS($_POST['last_name']) : null;
$old_photo_up_file_name = isset($_POST['old_photo_file']) ? Xss::chkXSS($_POST['old_photo_file']) : null;
$old_photo_ori_file_name = isset($_POST['old_photo_ori_file']) ? Xss::chkXSS($_POST['old_photo_ori_file']) : null;
$old_cv_up_file_name = isset($_POST['old_cv_file']) ? Xss::chkXSS($_POST['old_cv_file']) : null;
$old_cv_ori_file_name = isset($_POST['old_cv_ori_file']) ? Xss::chkXSS($_POST['old_cv_ori_file']) : null;

$artist_job = isset($_POST['job']) ? Xss::chkXSS($_POST['job']) : null;
$artist_birthday = isset($_POST['birthday']) ? Xss::chkXSS($_POST['birthday']) : null;
$artist_genre = isset($_POST['genre']) ? Xss::chkXSS($_POST['genre']) : null;
$artist_mobile = isset($_POST['mobile']) ? Xss::chkXSS($_POST['mobile']) : null;
$artist_email = isset($_POST['email']) ? Xss::chkXSS($_POST['email']) : null;

$education_year = isset($_POST['education_year']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['education_year'])) : null;
$education_name = isset($_POST['education_name']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['education_name'])) : null;
$award_year = isset($_POST['award_year']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['award_year'])) : null;
$award_name = isset($_POST['award_name']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['award_name'])) : null;
$private_year = isset($_POST['private_year']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['private_year'])) : null;
$private_name = isset($_POST['private_name']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['private_name'])) : null;
$team_year = isset($_POST['team_year']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['team_year'])) : null;
$team_name = isset($_POST['team_name']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['team_name'])) : null;

$major_work_idx = isset($_POST['major_work']) ? Xss::chkXSS($_POST['major_work']) : null;
$artist_greeting = isset($_POST['greeting']) ? Xss::chkXSS($_POST['greeting']) : null;
$annual_artwork_year = isset($_POST['artwork_year']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['artwork_year'])) : null;
$annual_artwork_cnt = isset($_POST['artwork_cnt']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['artwork_cnt'])) : null;
$homepage_url = isset($_POST['homepage']) ? Xss::chkXSS($_POST['homepage']) : null;
$blog_url = isset($_POST['blog']) ? Xss::chkXSS($_POST['blog']) : null;
$facebook_url = isset($_POST['facebook']) ? Xss::chkXSS($_POST['facebook']) : null;
$sns_1_name = isset($_POST['sns_1_name']) ? Xss::chkXSS($_POST['sns_1_name']) : null;
$sns_1_url = isset($_POST['sns_1_url']) ? Xss::chkXSS($_POST['sns_1_url']) : null;
$sns_2_name = isset($_POST['sns_2_name']) ? Xss::chkXSS($_POST['sns_2_name']) : null;
$sns_2_url = isset($_POST['sns_2_url']) ? Xss::chkXSS($_POST['sns_2_url']) : null;
$approval_state = isset($_POST['approval']) ? Xss::chkXSS($_POST['approval']) : 'N';


// 유효성 검사

if (!is_numeric($artist_mobile)) {
	JS::LocationReload('휴대전화번호는 숫자만 입력 가능합니다.', '', 'parent');
	setFree();
	exit();
}

if (!empty($_POST['artwork_cnt'])) {
	if (is_array($_POST['artwork_cnt'])) {
		foreach($_POST['artwork_cnt'] as $val) {
			if (!empty($val)) {
				if (!is_numeric($val)) {
					JS::LocationReload('연도별 작품수는 숫자만 입력 가능합니다.', '', 'parent');
					setFree();
					break;
					exit();
				}
			}
		}
	}
}

if (!LIB_LIB::chkMail($artist_email)) {
	JS::LocationReload('유효한 이메일이 아닙니다.', '', 'parent');
	setFree();
	exit();
}

// 유효성 검사 끝



$artist_idx = (!empty($artist_idx)) ? (int)$artist_idx : '';

$Artist = new Artist();
$Artist->setAttr('artist_idx', $artist_idx);
$Artist->setAttr('artist_name', $artist_name);
$Artist->setAttr('artist_en_name', $artist_first_name.' '.$artist_last_name);
$Artist->setAttr('artist_job', $artist_job);
$Artist->setAttr('artist_birthday', $artist_birthday);
$Artist->setAttr('artist_genre', $artist_genre);
$Artist->setAttr('artist_mobile', $artist_mobile);
$Artist->setAttr('artist_email', $artist_email);

$Artist->setAttr('education_year', $education_year);
$Artist->setAttr('education_name', $education_name);
$Artist->setAttr('award_year', $award_year);
$Artist->setAttr('award_name', $award_name);
$Artist->setAttr('private_year', $private_year);
$Artist->setAttr('private_name', $private_name);
$Artist->setAttr('team_year', $team_year);
$Artist->setAttr('team_name', $team_name);

$Artist->setAttr('major_work_idx', $major_work_idx);
$Artist->setAttr('artist_greeting', $artist_greeting);
$Artist->setAttr('annual_artwork_year', $annual_artwork_year);
$Artist->setAttr('annual_artwork_cnt', $annual_artwork_cnt);
$Artist->setAttr('homepage_url', $homepage_url);
$Artist->setAttr('blog_url', $blog_url);
$Artist->setAttr('facebook_url', $facebook_url);
$Artist->setAttr('sns_1_name', $sns_1_name);
$Artist->setAttr('sns_1_url', $sns_1_url);
$Artist->setAttr('sns_2_name', $sns_2_name);
$Artist->setAttr('sns_2_url', $sns_2_url);
$Artist->setAttr('approval_state', $approval_state);


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
			Js::LocationReplace('art1 자문단 검토 후 개별 연락드립니다.', PHP_SELF, 'parent');
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
	$dbh = null;
	$Artist = null;
	unset($dbh);
	unset($Artist);
}
?>