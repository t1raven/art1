<?php
$isAuth = true;

if (empty($_SESSION['galleryIdx']) || empty($_SESSION['galleryId']) || $_SESSION['loggedIn'] !== 1 || empty($_SESSION['ipAddr'] || empty($_SESSION['galleryLevelCode']))) {
	$isAuth = false;
}
else {
	if ($_SESSION['ipAddr'] !== $_SERVER['REMOTE_ADDR']) {
		$isAuth = false;
	}

	$galleryLevelCode = AES256::dec($_SESSION['galleryLevelCode'], AES_KEY);

	if (!is_numeric($galleryLevelCode)) {
		$isAuth = false;
	}
	else {
		if ((int)$galleryLevelCode < 60 && (int)$galleryLevelCode > 100) {
			$isAuth = false;
		}
	}
}

if (!$isAuth) {
	Js::LocationReplace('잘못된 접근입니다.', '/', 'top');
}
