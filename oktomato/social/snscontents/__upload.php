<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';

$singleFile = $_FILES['single_file']['name'];

if (empty($singleFile) && empty($multiFile)) {
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
		$uploadDir = ROOT.tempUploadPath;
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

?>