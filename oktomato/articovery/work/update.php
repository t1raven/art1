<?php
if (!defined('OKTOMATO')) exit;

$works_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$covery_idx = isset($_POST['covery_idx']) ? Xss::chkXSS($_POST['covery_idx']) : null;
$artist_idx = isset($_POST['artist_idx']) ? Xss::chkXSS($_POST['artist_idx']) : null;
$artist_name = isset($_POST['artist_name']) ? Xss::chkXSS($_POST['artist_name']) : null;
$works_name = isset($_POST['works_name']) ? Xss::chkXSS($_POST['works_name']) : null;
$works_make_year = isset($_POST['make_year']) ? Xss::chkXSS($_POST['make_year']) : null;
$works_make_type = isset($_POST['make_type']) ? Xss::chkXSS($_POST['make_type']) : null;
$works_width = isset($_POST['width_size']) ? Xss::chkXSS($_POST['width_size']) : null;
$works_depth = isset($_POST['depth_size']) ? Xss::chkXSS($_POST['depth_size']) : null;
$works_height = isset($_POST['height_size']) ? Xss::chkXSS($_POST['height_size']) : null;
$display_state = isset($_POST['display_state']) ? Xss::chkXSS($_POST['display_state']) : 'Y';
$works_img = isset($_POST['works_img']) ? Xss::chkXSS($_POST['works_img']) : null;

// 변수 초기화
$works_idx = (!empty($works_idx)) ? (int)$works_idx : '';

// 유효성 검사 시작
if (!is_numeric($covery_idx)) {
	Js::Alert('아티커버리명를 입력하세요');
	setFree();
	exit();
}

if (!is_numeric($artist_idx)) {
	Js::Alert('작가명을 입력하세요');
	setFree();
	exit();
}

if (is_null($artist_name)) {
	Js::Alert('작가명을 입력하세요');
	setFree();
	exit();
}

if (is_null($works_name)) {
	Js::Alert('작품명을 입력하세요');
	setFree();
	exit();
}

if (is_null($works_make_type)) {
	Js::Alert('제작방식을 입력하세요');
	setFree();
	exit();
}

/*
if (is_null($works_width) || is_null($works_depth) || is_null($works_height) ) {
	Js::Alert('사이즈를 입력하세요');
	setFree();
	exit();
}
*/

if (is_null($display_state)) {
	Js::Alert('상태를 선택하세요.');
	setFree();
	exit();
}

if (is_null($works_img)) {
	Js::Alert('이미지를 입력하세요.');
	setFree();
	exit();
}

// 객체 인스턴스 생성
$Work = new Work();
$Work->setAttr('works_idx', $works_idx);
$Work->setAttr('covery_idx', $covery_idx);
$Work->setAttr('artist_idx', $artist_idx);
$Work->setAttr('works_name', $works_name);
$Work->setAttr('works_make_year', $works_make_year);
$Work->setAttr('works_make_type', $works_make_type);
$Work->setAttr('works_width', $works_width);
$Work->setAttr('works_depth', $works_depth);
$Work->setAttr('works_height', $works_height);
$Work->setAttr('works_img', $works_img);
$Work->setAttr('display_state', $display_state);

try {
	if ($at === 'update' && !empty($works_idx) && is_int($works_idx)) {
		if ($Work->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', PHP_SELF.'?'.PageUtil::_param_get(''), 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Work->insert($dbh)) {
			Js::LocationReplace('등록되었습니다.', PHP_SELF, 'parent');
		}
		else {
			throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
}
catch(Exception $e) {
	//echo $e->getMessage() ;
	JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
}

setFree();

function setFree() {
	$Work = null;
	$dbh = null;
	unset($Work);
	unset($dbh);
}
?>