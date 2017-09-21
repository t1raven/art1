<?php
if (!defined('OKTOMATO')) exit;

$evt_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$evt_idxs = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

// 멀티 삭제
if (!is_null($evt_idxs) && is_array($evt_idxs)) {
	$Event = new Event();
	$Event->setAttr('evt_idx', $evt_idxs);

	try {
		if ($Event->deletes($dbh)) {
			Js::LocationHref('삭제되었습니다.', PHP_SELF, 'parent');
		}
		else {
			throw new Exception('삭제되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	catch(Exception $e) {
		Js::LocationHref($e->getMessage(), PHP_SELF, 'parent');
	}
}
else {
	$result = 0;
	$attach = isset($_POST['attach']) ? Xss::chkXSS($_POST['attach']) : null;
	$type = isset($_POST['type']) ? Xss::chkXSS($_POST['type']) : null; //모바일일때는 'm' //2016-06-03 LYT

	$Event = new Event();
	$Event->setAttr('evt_idx', $evt_idx);

	if (!empty($evt_idx) && is_numeric($evt_idx)) {
		if (!empty($attach)) {
			//$result = ($Event->deleteAttachAjax($dbh, $attach)) ? 1 : 0;
			if($type === 'm') {
				//모바일 이미지 삭제 //2016-06-03 LYT
				$result = ($Event->deleteAttachAjaxMobile($dbh, $attach)) ? 1 : 0; //모바일 삭제
			}
			else {
				$result = ($Event->deleteAttachAjax($dbh, $attach)) ? 1 : 0;
			}
		}
		else {
			$result = ($Event->delete($dbh)) ? 1 : 0;
		}
	}
	else {
		if (!empty($attach)) {
			$result = ($Event->deleteTempAttachAjax($attach)) ? 1 : 0;
		}
	}
	echo '{"cnt":'.$result.'}';
}

$Event = null;
$dbh = null;
unset($Event);
unset($dbh);
?>
