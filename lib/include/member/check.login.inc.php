<?php
if (preg_match('/^action/', $_SERVER["REQUEST_URI"]) ) $TARGETURL = base64_encode("/");
else $TARGETURL = base64_encode($_SERVER["REQUEST_URI"]);

@session_start();
if (strcmp($_SESSION['user_ip'], $_SERVER['REMOTE_ADDR']) == 0 && $_SESSION['logged_in']) {
	echo AES256::dec($_SESSION['user_name'], AES_KEY) . "님은 " . $_SESSION['user_ip'] . "에서 접속하셨습니다.";
}
else {
	//echo "허가되지 않은 사용자 입니다.";
	$alert = "로그인을 하셔야 합니다.";
	JS::LocationReplace($alert, "/member/login.php?Cache=On&targeturl=$TARGETURL", '');
	exit;
}
?>