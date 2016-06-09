<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';

$singleFile = $_FILES['single_file']['name'];
$multiFile = $_FILES['multi_file']['name'];
$scaleFile = $_FILES['scale_file']['name'];

if ( empty($singleFile) && empty($multiFile) && empty($scaleFile) ) {
	$attachCount = 0;
	print '__error, 경로 오류입니다.';
	exit;
}


if (!empty($singleFile)) {
	if (!LIB_FILE::MimeCheck($MIME['IMG'], $_FILES['single_file']['tmp_name'])) {
		print '__not|';
		exit;
	}
	else {
		$uploadDir = ROOT.goodsListImgUploadPath;
		$orgFileName = $oriFileName =  $_FILES['single_file']['name'];
		$fileSize = $_FILES['single_file']['size'];
		$tmp = explode('.', $oriFileName);
		$fileExt = strtolower(array_pop($tmp));
		$fileReName = time().LIB_LIB::SecuID(10).'.'.$fileExt;
		$isStat = true;

		//if ($fileExt != "jpg") $isStat = false;

		if (stripos($EXT['IMG'], $fileExt) === false) $isStat = false;

		if ($fileSize > 1024 * 1024 * 1) {
			print '__large|';
		}
		else {
			if ($isStat){ //-- 이미지일 경우
				$uploadFile = $uploadDir . basename($fileReName);

				if (move_uploaded_file($_FILES['single_file']['tmp_name'], $uploadFile)) {
					//echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
				}
				else {
					//print "파일 업로드 공격의 가능성이 있습니다!\n";
				}
				print '__complete|'.$fileReName;
			}
			else {
				print '__not|';
			}
		}
	}
}
elseif (!empty($multiFile)) {
	if (!LIB_FILE::MimeCheck($MIME['IMG'], $_FILES['multi_file']['tmp_name'])) {
		print '__not|';
		exit;
	}
	else {
		$uploadDir = ROOT.goodsBigImgUploadPath;
		$orgFileName = $oriFileName =  $_FILES['multi_file']['name'];
		$fileSize = $_FILES['multi_file']['size'];
		$tmp = explode('.', $oriFileName);
		$fileExt = strtolower(array_pop($tmp));
		$fileReName = time().LIB_LIB::SecuID(10).'.'.$fileExt;
		$isStat = true;

		//if ($fileExt != "jpg") $isStat = false;

		if (stripos($EXT['IMG'], $fileExt) === false) $isStat = false;

		if ($fileSize > 1024 * 1024 * 1) {
			print '__large|';
		}
		else {
			if ($isStat) { //-- 이미지일 경우
				$uploadFile = $uploadDir . basename($fileReName);

				if (move_uploaded_file($_FILES['multi_file']['tmp_name'], $uploadFile)) {
					LIB_FILE::ThumNail($uploadFile, $fileReName, $fileReName, ROOT.goodsMiddleImgUploadPath, $EXT['IMG'], filesize($uploadFile), '647', '2048', ''); // middle 섬네일
					LIB_FILE::ThumNail($uploadFile, $fileReName, $fileReName, ROOT.goodsSmallImgUploadPath, $EXT['IMG'], filesize($uploadFile), '57', '58', ''); // small 섬네일
					LIB_FILE::ThumNail($uploadFile, $fileReName, $fileReName, ROOT.goodsThumbImgUploadPath, $EXT['IMG'], filesize($uploadFile), '300', '500', ''); // Thumb 섬네일
					//echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
				}
				else {
					//print "파일 업로드 공격의 가능성이 있습니다!\n";
				}
				print '__complete|'.$fileReName;
			}
			else {
				print '__not|';
			}
		}
	}
}
elseif (!empty($scaleFile)) {
	if (!LIB_FILE::MimeCheck($MIME['IMG'], $_FILES['scale_file']['tmp_name'])) {
		print '__not|';
		exit;
	}
	else {
		$uploadDir = ROOT.goodsScaleImgUploadPath;
		//$uploadDir = ROOT.goodsBigImgUploadPath;
		$orgFileName = $oriFileName =  $_FILES['scale_file']['name'];
		$fileSize = $_FILES['scale_file']['size'];
		$tmp = explode('.', $oriFileName);
		$fileExt = strtolower(array_pop($tmp));
		$fileReName = time().LIB_LIB::SecuID(10).'.'.$fileExt;
		$isStat = true;

		//if ($fileExt != "jpg") $isStat = false;

		if (stripos($EXT['IMG'], $fileExt) === false) $isStat = false;

		if ($fileSize > 1024 * 1024 * 1) {
			print '__large|';
		}
		else {
			if ($isStat){ //-- 이미지일 경우
				$uploadFile = $uploadDir . basename($fileReName);

				if (move_uploaded_file($_FILES['scale_file']['tmp_name'], $uploadFile)) {
					//echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
				}
				else {
					//print "파일 업로드 공격의 가능성이 있습니다!\n";
				}
				print '__complete|'.$fileReName;
			}
			else {
				print '__not|';
			}
		}
	}
}
?>