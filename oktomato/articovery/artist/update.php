<?php
if (!defined('OKTOMATO')) exit;

$covery_idx = isset($_POST['covery_idx']) ? Xss::chkXSS($_POST['covery_idx']) : null;
$artist_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$artist_name = isset($_POST['name']) ? Xss::chkXSS($_POST['name']) : null;
$artist_mobile = isset($_POST['mobile']) ? Xss::chkXSS($_POST['mobile']) : null;
$artist_email = isset($_POST['email']) ? Xss::chkXSS($_POST['email']) : null;
$display_state = isset($_POST['display_state']) ? Xss::chkXSS($_POST['display_state']) : null;

// 유효성 검사
if (!is_numeric($covery_idx)) {
	Js::Alert('아티커버리명를 입력하세요');
	setFree();
	exit();
}

if (is_null($artist_name)) {
	Js::Alert('작가명을 입력하세요');
	setFree();
	exit();
}

if (!is_numeric($artist_mobile)) {
	Js::Alert('휴대전화번호는 숫자만 입력 가능합니다.');
	setFree();
	exit();
}

if (!LIB_LIB::chkMail($artist_email)) {
	Js::Alert('유효한 이메일이 아닙니다.');
	setFree();
	exit();
}

if (is_null($display_state)) {
	Js::Alert('상태를 선택하세요.');
	setFree();
	exit();
}
// 유효성 검사 끝

$artist_idx = (!empty($artist_idx)) ? (int)$artist_idx : '';

$Artist = new Artist();
$Artist->setAttr('covery_idx', $covery_idx);
$Artist->setAttr('artist_idx', $artist_idx);
$Artist->setAttr('artist_name', $artist_name);
$Artist->setAttr('artist_mobile', $artist_mobile);
$Artist->setAttr('artist_email', $artist_email);
$Artist->setAttr('display_state', $display_state);

try {
	if ($at === 'update' && !empty($artist_idx) && is_int($artist_idx)) {
		if ($Artist->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', PHP_SELF.'?'.PageUtil::_param_get('idx='), 'parent');
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

function setFree() {
	$dbh = null;
	$Artist = null;
	unset($dbh);
	unset($Artist);
}
?>