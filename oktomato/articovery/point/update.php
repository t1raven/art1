<?php
if (!defined('OKTOMATO')) exit;

$point_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$covery_idx = isset($_POST['covery_idx']) ? Xss::chkXSS($_POST['covery_idx']) : null;
$artist_idx = isset($_POST['artist_idx']) ? Xss::chkXSS($_POST['artist_idx']) : null;
$artist_name = isset($_POST['artist_name']) ? Xss::chkXSS($_POST['artist_name']) : null;
$display_state = isset($_POST['display_state']) ? Xss::chkXSS($_POST['display_state']) : 'Y';

// 변수 초기화
$point_idx = (!empty($point_idx)) ? (int)$point_idx : '';

// 유효성 검사 시작
if (!is_numeric($covery_idx)) {
	Js::Alert('아티커버리명를 입력하세요');
	setFree();
	exit();
}

if (!is_numeric($artist_idx) || is_null($artist_name)) {
	Js::Alert('작가명을 입력하세요');
	setFree();
	exit();
}

if (is_null($display_state)) {
	Js::Alert('상태를 선택하세요.');
	setFree();
	exit();
}

$Point = new Point();
$Point->setAttr('point_idx', $point_idx);
$Point->setAttr('covery_idx', $covery_idx);
$Point->setAttr('artist_idx', $artist_idx);
$Point->setAttr('display_state', $display_state);

try {
	if ($at === 'update' && !empty($point_idx) && is_int($point_idx)) {
		if ($Point->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', PHP_SELF.'?'.PageUtil::_param_get(''), 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Point->insert($dbh)) {
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
	$Point = null;
	$dbh = null;
	unset($Point);
	unset($dbh);
}
