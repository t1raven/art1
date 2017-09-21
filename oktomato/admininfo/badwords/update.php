<?php
if (!defined('OKTOMATO')) exit;

$mode = isset($_POST['mode']) ? trim($_POST['mode']) : null;
$bad_words_idx = isset($_POST['bad_words_idx']) ? trim((int)$_POST['bad_words_idx']) : null;
$bad_word = isset($_POST['bad_word']) ? trim($_POST['bad_word']) : null;

if ($mode == 'edit' ) {
	if (empty($bad_words_idx) || empty($bad_word) ) {
		JS::HistoryBack('필수 입력항목에 데이터를 입력해 주세요.');
		exit;
	}
}else{
	if (empty($bad_word) ) {
		JS::HistoryBack('금칙어를 입력해 주세요.');
		exit;
	}
}

$Badwords = new Badwords();
$Badwords->setAttr('bad_words_idx', $bad_words_idx);
$Badwords->setAttr('bad_word', $bad_word);

try {

	if ($mode == 'edit') {
		if ($Badwords->update($dbh)) {
			//JS::HistoryBack('수정되었습니다.');
			JS::LocationReplace('수정되었습니다.', '?at=list', 'parent');
		}else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}else {

		if ($Badwords->insert($dbh)) {
			//JS::HistoryBack('등록되었습니다.');
			JS::LocationReplace('등록되었습니다.', '?at=list', 'parent');
		}else {
			throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
}
catch(Exception $e) {
	//JS::HistoryBack($e->getMessage());
	echo $e->getMessage() ;
}

$dbh = null;
$Badwords = null;
unset($dbh);
unset($Badwords);
?>