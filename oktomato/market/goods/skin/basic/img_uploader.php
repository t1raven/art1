<?php
include_once('../../lib/include/global.inc.php');

$max_size = $_POST['max_size'];
$limit_size = $_POST['limit_size'];

If (empty($max_size)) {
	$max_size = 0;
}

$file = $_FILES['img']['name'];


if (empty($file)) {
	$attachCount = 0;
	print '__error, 경로 오류입니다.';
	exit;
}
else {
	if (!empty($_FILES['img']['name'])) {
		if (!LIB_FILE::MimeCheck($MIME['IMG'], $_FILES['img']['tmp_name'])) {
			Js::Alert('사용 가능한 파일형식이 아닙니다.('.$_FILES['img']['name'].')');
			exit();
		}
		else {
			$goods_img = time().LIB_LIB::SecuID(10).".".LIB_FILE::ExtensionName($_FILES['img']['name']); // 파일명 생성
			LIB_FILE::FileUpload($_FILES['img']['tmp_name'], $goods_img, $EXT['IMG'], ROOT.goodsUploadPath); // 이미지 파일 업로드
			LIB_FILE::ThumNail(ROOT.goodsUploadPath.'middle/'.$goods_img, $goods_img, $goods_img, ROOT.goodsUploadPath, $EXT['IMG'], filesize(ROOT.goodsUploadPath.$goods_img), '450', '2048', ''); // 중간 이미지 섬네일
			LIB_FILE::ThumNail(ROOT.goodsUploadPath.'middle/'.$goods_img, $goods_img, $goods_img, ROOT.goodsUploadPath, $EXT['IMG'], filesize(ROOT.goodsUploadPath.$goods_img), '450', '2048', ''); // 최소 이미지 섬네일

		}
	}



	$uploadDir = $_SERVER[DOCUMENT_ROOT].'/upload/temp/';
	$orgFileName = $oriFileName =  $_FILES['img']['name'];
	$fileSize = $_FILES['img']['size'];
	$fileExt = strtolower(array_pop(explode('.', $oriFileName)));
	$fileReName = randomGenerator() .'.'.$fileExt;

	$isStat = true;
	if($fileExt != "jpg") $isStat = false;
	if($fileSize > 1024 * 1024 * 1){
		print '__large|';
	}
	else{
		if($isStat){ //-- 이미지일 경우
			$uploadFile = $uploadDir . basename($fileReName);

			if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
				//echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
			}
			else {
				//print "파일 업로드 공격의 가능성이 있습니다!\n";
			}
			print '__complete|'.$fileReName;
		}
		else{
			print '__not|';
		}
	}
}
?>