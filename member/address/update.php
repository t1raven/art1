<?php
if (!defined('OKTOMATO')) exit;

$addr_idx = isset($_POST['address']) ? Xss::chkXSS($_POST['address']) : null;
$user_name = isset($_POST['addr_name']) ? Xss::chkXSS($_POST['addr_name']) : null;
$user_zip = isset($_POST['addr_zip']) ? Xss::chkXSS($_POST['addr_zip']) : null;
$user_addr_1 = isset($_POST['addr_1']) ? Xss::chkXSS($_POST['addr_1']) : null;
$user_addr_2 = isset($_POST['addr_2']) ? Xss::chkXSS($_POST['addr_2']) : null;
$user_email = isset($_POST['addr_email']) ? Xss::chkXSS($_POST['addr_email']) : null;
$user_tel = isset($_POST['addr_tel']) ? Xss::chkXSS($_POST['addr_tel']) : null;
$default_state = isset($_POST['addr_state']) ? Xss::chkXSS($_POST['addr_state']) : 'N';
$mode = isset($_POST['mode']) ? Xss::chkXSS($_POST['mode']) : 'N';

$default_state = (empty($default_state)) ? 'N' : $default_state;


// 유효성 검사
if (!is_numeric($user_tel)) {
	JS::Alert('전화번호는 숫자만 입력 가능합니다.');
	setFree();
	exit();
}

if (!LIB_LIB::chkMail($user_email)) {
	JS::Alert('유효한 이메일이 아닙니다.');
	setFree();
	exit();
}
// 유효성 검사 끝

$addr_idx = (!empty($addr_idx)) ? (int)$addr_idx : '';

$Address = new Address();
$Address->setAttr('addr_idx', $addr_idx);
$Address->setAttr('user_name', $user_name);
$Address->setAttr('user_zip', $user_zip);
$Address->setAttr('user_addr_1', $user_addr_1);
$Address->setAttr('user_addr_2', $user_addr_2);
$Address->setAttr('user_email', $user_email);
$Address->setAttr('user_tel', $user_tel);
$Address->setAttr('default_state', $default_state);

try {
	if ($at === 'update' && !empty($addr_idx) && is_numeric($addr_idx)) {
		if ($Address->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Address->insert($dbh)) {
			if ($mode === 'b') {
				Js::LocationReplace('등록되었습니다.', '/order/address.php', 'parent');
			}
			else {
				Js::LocationReplace('등록되었습니다.', PHP_SELF, 'parent');
			}
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
	$Address = null;
	unset($dbh);
	unset($Address);
}
?>