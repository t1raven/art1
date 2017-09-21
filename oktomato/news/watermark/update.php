<?php
if (!defined('OKTOMATO')) exit;

$mode = isset($_POST['mode']) ? $_POST['mode'] : null;
$water_idx = isset($_POST['idx']) ? $_POST['idx'] : null;
$old_up_file_name= isset($_POST['old_up_file_name']) ? $_POST['old_up_file_name'] : null;
$imgFile = isset($_FILES['imgFile']) ? $_FILES['imgFile'] : null;

try {
	if (!empty($imgFile['name'])) {
		if (!LIB_FILE::MimeCheck($MIME['IMG'], $imgFile['tmp_name'])) {
			Js::Alert('사용 가능한 파일형식이 아닙니다1.('.$imgFile['name'].')');
			
			//setFree();
			exit();
		}
	}

	//이미지 파일업로드 S
	if ($imgFile['name']) {

		// 기존파일명
		$up_file_name = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($imgFile['name']);
		$ori_file_name = $imgFile['name'];

					
		LIB_FILE::FileUpload($imgFile['tmp_name'], $up_file_name, $EXT['IMG'], ROOT.newsUploadPath); //원본이미지 저장 
		
		// 등록된 사진 삭제
		if (!empty($old_up_file_name)) {
			LIB_FILE::DeleteFile(ROOT.newsUploadPath.$old_up_file_name);
		}

	}else {
		$up_file_name = $old_up_file_name;
		$ori_file_name = $old_ori_file_name;
	}

	//이미지 파일 업로드 E
	$Watermark = new Watermark();
	$Watermark->setAttr('water_idx', $water_idx);
	$Watermark->setAttr('imgFile', $imgFile);
	$Watermark->setAttr('up_file_name', $up_file_name);
	$Watermark->setAttr('ori_file_name', $ori_file_name);

	if ($mode == 'edit' && !is_null($water_idx) ) {
		//echo("수정 <br>");
		if ($Watermark->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', '?at=write&idx='.$water_idx, 'parent');
		}
		else {
			throw new Exception('게시물이 수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {

		$water_idx = $Watermark->insert($dbh);
		//echo('news_idx :'.$news_idx.'<br>');

		if ($water_idx) {
			Js::LocationReplace('등록되었습니다.', '?at=write&idx='.$water_idx, 'parent');
		}
		else {
			throw new Exception('게시물이 등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}

}
catch(Exception $e) {
	 echo $e->getMessage();
	//mysql_unbuffered_query('rollback');
	//JS::HistoryBack($e->getMessage());
}

$dbh = null;
$Watermark = null;
unset($dbh);
unset($Watermark);
?>
