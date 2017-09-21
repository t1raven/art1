<?php
if (!defined('OKTOMATO')) exit;

$covery_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$covery_name = isset($_POST['covery_name']) ? Xss::chkXSS($_POST['covery_name']) : null;
$display_state = isset($_POST['display_state']) ? Xss::chkXSS($_POST['display_state']) : null;

// 유효성 검사
if (is_null($covery_name)) {
	Js::Alert('아트커버리를 입력하세요');
	setFree();
	exit();
}

if (is_null($display_state)) {
	Js::Alert('상태를 입력하세요');
	setFree();
	exit();
}
// 유효성 검사 끝

$covery_idx = (!empty($covery_idx)) ? (int)$covery_idx : '';

$Covery = new Covery();
$Covery->setAttr('covery_idx', $covery_idx);
$Covery->setAttr('covery_name', $covery_name);
$Covery->setAttr('display_state', $display_state);

try {
	if ($at === 'update' && !empty($covery_idx) && is_int($covery_idx)) {
		if ($Covery->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', PHP_SELF.'?'.PageUtil::_param_get('idx='), 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Covery->insert($dbh)) {
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
	$Covery = null;
	unset($dbh);
	unset($Covery);
}
?>