<?php
if (!defined('OKTOMATO')) {
	header('Location:/');
	exit;
}

$chkAdmin = false;

if (AES256::dec($_SESSION['mst'], AES_KEY) === 'true') {
	$chkAdmin = true;
}
else {
	if (AES256::dec($_SESSION['user_level_code'], AES_KEY) === '99') {
		$chkAdmin = true;
	}
}

if (!$chkAdmin) {
	header('Location:/');
	exit;
}

$artist_idx = isset($_GET['idx']) ? Xss::chkXSS($_GET['idx']) : null;
$fileKind = isset($_GET['fk']) ? Xss::chkXSS($_GET['fk']) : null;

if (is_null($artist_idx)) {
   echo "<script>alert('잘못된 접근입니다.');history.go(-1);</script>";
   exit;
}

$Artist = new Artist();
$aFile = $Artist->getFileInfo($dbh, $artist_idx);

if (is_array($aFile)) {
	foreach($aFile as $row) {
		if ($fileKind === 'p') {
			if (!empty($row['photo_up_file_name']) && !empty(trim($row['photo_ori_file_name']))) {
				$file = ROOT.artistUploadPath.$row['photo_up_file_name'];
				$filename = trim($row['photo_ori_file_name']);
				$mimeType = $MIME['IMG'];
			}
		}
		elseif ($fileKind === 'c') {
			if (!empty($row['cv_up_file_name']) && !empty(trim($row['cv_ori_file_name']))) {
				$file = ROOT.artistUploadPath.$row['cv_up_file_name'];
				$filename = trim($row['cv_ori_file_name']);
				$mimeType = $MIME['PDF'];
			}
		}
	}
}
else {
	setFree();
	exit;
}

if (!empty($file) && !empty($filename)) {
	if (file_exists($file)) {
		if (LIB_FILE::ExtCheck($mimeType, mime_content_type($file))) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename(urlencode($filename)));
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			ob_clean();
			flush();
			readfile($file);
		}
		else {
			echo "<script>alert('첨부파일이 존재하지 않습니다.');history.go(-1);</script>";
			setFree();
			exit;
		}
	}
	else{
		echo "<script>alert('첨부파일이 존재하지 않습니다.');history.go(-1);</script>";
		setFree();
		exit;
	}
}
else {
	echo "<script>alert('첨부파일이 존재하지 않습니다.');history.go(-1);</script>";
		setFree();
		exit;
}

function setFree() {
	$dbh = null;
	$aFile = null;
	$Artist = null;
	unset($dbh);
	unset($aFile);
	unset($Artist);
}