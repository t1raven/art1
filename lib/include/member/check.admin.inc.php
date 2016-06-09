<?php
if ($_SESSION['user_ip'] === $_SERVER['REMOTE_ADDR']) {
	if (!empty($_SESSION['user_level_code'])) {
		if (AES256::dec($_SESSION['user_level_code'], AES_KEY) === '99') {
			if (!empty($_SESSION['user_idx']) && !empty($_SESSION['user_id']) && !empty($_SESSION['user_name']) && $_SESSION['logged_in'] === 1) {
				header('Location:/oktomato/main.php');
				exit();
			}
			else {
				header('Location:/oktomato/member/login.php');
				exit();
			}
		}
		else {
			if (!empty($_SESSION['mst']) && AES256::dec($_SESSION['mst'], AES_KEY) === 'true') {
				if (AES256::dec($_SESSION['user_id'], AES_KEY) === MASTER) {
					header('Location:/oktomato/main.php');
					exit();
				}
			}
			else {
				header('Location:/');
				exit();
			}
		}
	}
	else {
		header('Location:/');
		exit();
	}
}
else {
	header('Location:/oktomato/member/login.php');
	exit();
}
?>