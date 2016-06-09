<?php
if ($_SESSION['ipAddr'] === $_SERVER['REMOTE_ADDR']) {
	if (!empty($_SESSION['galleryLevelCode'])) {
		if (AES256::dec($_SESSION['galleryLevelCode'], AES_KEY) === '99') {
			if (!empty($_SESSION['galleryIdx']) && !empty($_SESSION['galleryId']) && !empty($_SESSION['galleryNameKr']) && $_SESSION['loggedIn'] === 1) {
				header('Location:/oktomato/main.php');
				exit();
			}
			else {
				header('Location:/partner/member/login.php');
				exit();
			}
		}
		else {
				header('Location:/');
				exit();
		}
	}
	else {
		header('Location:/');
		exit();
	}
}
else {
	header('Location:/partner/member/login.php');
	exit();
}
