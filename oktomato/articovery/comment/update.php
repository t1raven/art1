<?php
if (!defined('OKTOMATO')) exit;

$score_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$opinion = isset($_POST['opinion']) ? Xss::chkXSS($_POST['opinion']) : null;
$display_state = isset($_POST['display_state']) ? Xss::chkXSS($_POST['display_state']) : 'Y';

// 변수 초기화
$score_idx = (!empty($score_idx)) ? (int)$score_idx : '';

// 유효성 검사 시작
if (is_null($opinion)) {
	Js::Alert('의견을 입력하세요');
	setFree();
	exit();
}

/*
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
*/

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

// 객체 인스턴스 생성
$Comment = new Comment();
$Comment->setAttr('score_idx', $score_idx);
$Comment->setAttr('opinion', $opinion);
$Comment->setAttr('display_state', $display_state);

try {
	if ($at === 'update' && !empty($score_idx) && is_int($score_idx)) {
		if ($Comment->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', PHP_SELF.'?'.PageUtil::_param_get(''), 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Comment->insert($dbh)) {
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
	$Comment = null;
	$dbh = null;
	unset($Comment);
	unset($dbh);
}
