<?php
include_once('../../lib/include/global.inc.php');
include_once('../../lib/class/exhibition/exhibition.class.php');
include_once('../../lib/function/common.php');

session_start(); // 세션 데이터 초기화

$user_idx = isset($_SESSION['user_idx']) ? $_SESSION['user_idx'] : null;
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
$user_name = AES256::dec($_SESSION['user_name'], AES_KEY);

$mode = isset($_POST['mode']) ? Xss::chkXSS($_POST['mode']) : null;
$exh_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$user_name = isset($_POST['user_name']) ? Xss::chkXSS($_POST['user_name']) : null;
$exh_tel = isset($_POST['tel']) ? Xss::chkXSS($_POST['tel']) : null;
$exh_link = isset($_POST['link']) ? Xss::chkXSS($_POST['link']) : null;
$old_up_file_name = isset($_POST['old_up_file_name']) ? Xss::chkXSS($_POST['old_up_file_name']) : null;
$old_ori_file_name = isset($_POST['old_ori_file_name']) ? Xss::chkXSS($_POST['old_ori_file_name']) : null;
$file_img = isset($HTTP_POST_FILES['file_img']) ? Xss::chkXSS($HTTP_POST_FILES['file_img']) : null;

if (!$user_idx){
	Js::LocationReplace('로그인 후 등록가능합니다.', '/oktomato/', 'parent');
	exit;
}

$Exhibition = new Exhibition();
$Exhibition->setAttr('exh_idx', $exh_idx);
$Exhibition->setAttr('user_idx', $user_idx);
$Exhibition->setAttr('user_name', $user_name);
$Exhibition->setAttr('exh_tel', $exh_tel);
$Exhibition->setAttr('exh_start_date', $exh_start_date);
$Exhibition->setAttr('exh_last_date', $exh_last_date);
$Exhibition->setAttr('exh_link', $exh_link);
$Exhibition->setAttr('exh_confirm', $exh_confirm);
$Exhibition->setAttr('exh_content', $exh_content);
$Exhibition->setAttr('file_list', $file_list);

try {

/////////////////////////////////////
// 파일 업로드 S
echo('tmp_name:'.LIB_FILE::MimeCheck($MIME['IMG'], $_FILES['file_img']['tmp_name']).'<br>');
	if ($_FILES['file_img']['name']) {
			if (!LIB_FILE::MimeCheck($MIME['IMG'], $_FILES['file_img']['tmp_name'])) {
				Js::LocationReplace('사용 가능한 파일형식이 아닙니다.('.$_FILES['file_img']['name'].')', '/oktomato/exhibition/?at=list', 'parent');
				setFree();
				exit();
			}
	}
	// 사진 파일업로드
	if ($_FILES['file_img']['name']) {
		// 기존파일명
		$up_file_name = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($_FILES['file_img']['name']);
		$ori_file_name = $_FILES['file_img']['name'];



		// 파일 업로드 //이미지를 리사이징 해서 저장.
		//LIB_FILE::ThumNail($_FILES['file_img']['tmp_name'], $_FILES['file_img']['name'], 'small_'.$up_file_name, ROOT.exhUploadPath, $EXT['IMG'], $_FILES['file_img']['size'], "450", "2048", ""); // 섬네일
		LIB_FILE::ThumNail($_FILES['file_img']['tmp_name'], $_FILES['file_img']['name'], 's_'.$up_file_name, ROOT.exhUploadPath, $EXT['IMG'], $_FILES['file_img']['size'], "281", "118", ""); // 섬네일
		LIB_FILE::ThumNail($_FILES['file_img']['tmp_name'], $_FILES['file_img']['name'], 'm_'.$up_file_name, ROOT.exhUploadPath, $EXT['IMG'], $_FILES['file_img']['size'], "580", "255", ""); // 섬네일
		
		//LIB_FILE::FileUpload($_FILES['file_img']['tmp_name'], $up_file_name, $EXT['IMG'], ROOT.exhUploadPath); //원본이미지 저장 // 원본이미지를 저장할때는 위의 섬네일로 생성되는 파일명을 수정해 줘야 한다.
		$Exhibition->setAttr('up_file_name', $up_file_name);
		$Exhibition->setAttr('ori_file_name', $ori_file_name);

		// 등록된 사진 삭제
		if (!empty($old_up_file_name)) {
			LIB_FILE::DeleteFile(ROOT.exhUploadPath.$old_up_file_name);
		}
	}
	else {
		$Exhibition->setAttr('up_file_name', $old_up_file_name);
		$Exhibition->setAttr('ori_file_name', $old_ori_file_name);
	}
// 파일 업로드 E
/////////////////////////////////////

/*
	if ($mode == 'reply' && !is_null($exh_idx)) {
		if ($Exhibition->reply($dbh)) {
			Js::LocationReplace('등록되었습니다.', '/oktomato/exhibitoin/?at=list', 'parent');
		}
		else {
			throw new Exception('게시물이 답변되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
*/
	if ($mode == 'edit' && !is_null($exh_idx) ) {
		echo("수정 <br>");
		if ($Exhibition->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', '/oktomato/exhibition/?at=list', 'parent');
		}
		else {
			throw new Exception('게시물이 수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		echo('<br>등록<br>');
		if ($Exhibition->insert($dbh)) {
			Js::LocationReplace('등록되었습니다.', '/oktomato/exhibition/?at=list', 'parent');
		}
		else {
			throw new Exception('게시물이 등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
}
catch(Exception $e) {
	// echo $e->getMessage();
	//mysql_unbuffered_query('rollback');
	//JS::HistoryBack($e->getMessage());
}

$dbh = null;
$Bbs = null;
unset($dbh);
unset($Bbs);
?>