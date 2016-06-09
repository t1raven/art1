<?php
$isAuth = true;

if (empty($_SESSION['galleryIdx']) || empty($_SESSION['galleryId']) || $_SESSION['loggedIn'] !== 1 || empty($_SESSION['ipAddr'] || empty($_SESSION['galleryLevelCode']))) {
	$isAuth = false;
}
else {
	if ($_SESSION['ipAddr'] !== $_SERVER['REMOTE_ADDR']) {
		$isAuth = false;
	}

	$userLevelCode = AES256::dec($_SESSION['galleryLevelCode'], AES_KEY);

	if (!is_numeric($userLevelCode)) {
		$isAuth = false;
	}
	else {
		if ((int)$userLevelCode !== 99) {
			$isAuth = false;
		}
	}
}

if (!$isAuth) {
	session_destroy();
	Js::LocationReplace('페이지가 존재하지 않습니다.', '/404.html', 'top');
	exit;
}
