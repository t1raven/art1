<?php
if (!defined('OKTOMATO')) exit;

$evt_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$evt_title = isset($_POST['title']) ? Xss::chkXSS($_POST['title']) : null;
$evt_copyright = isset($_POST['copyright']) ? Xss::chkXSS($_POST['copyright']) : null;
$evt_main_img = isset($_POST['main_img']) ? Xss::chkXSS($_POST['main_img']) : null;
$evt_main_img_old = isset($_POST['main_img_old']) ? Xss::chkXSS($_POST['main_img_old']) : null;
$evt_display_state = isset($_POST['display_state']) ? Xss::chkXSS($_POST['display_state']) : null;
$para_sub_title = isset($_POST['sub_title']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['sub_title'])) : null;
$para_artwork = isset($_POST['artwork']) ? LIB_LIB::getArrayReturn(Xss::chkXSS($_POST['artwork'])) : null;

$evt_idx  = (!empty($evt_idx)) ? (int)$evt_idx : '';
$evt_main_img = (!empty($evt_main_img)) ? $evt_main_img : $evt_main_img_old;

$Event = new Event();
$Event->setAttr('evt_idx', $evt_idx);
$Event->setAttr('evt_title', $evt_title);
$Event->setAttr('evt_copyright', $evt_copyright);
$Event->setAttr('evt_main_img', $evt_main_img);
$Event->setAttr('evt_display_state', $evt_display_state);
$Event->setAttr('para_sub_title', $para_sub_title);
$Event->setAttr('para_artwork', $para_artwork);

try {
	if (!empty($_POST['main_img'])) {
		if (!LIB_FILE::moveFile(ROOT.tempUploadPath.$_POST['main_img'], ROOT.eventUploadPath.$_POST['main_img'])) {
			JS::LocationReplace('파일 이동 오류입니다.', PHP_SELF, 'parent');
			setFree();
			exit();
		}
	}

	if ($at === 'update' && !empty($evt_idx) && is_int($evt_idx)) {
		if ($Event->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Event->insert($dbh)) {
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
	$Event = null;
	unset($dbh);
	unset($Event);
}
?>