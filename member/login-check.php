<?php
require_once('../lib/include/global.inc.php');
require_once('../lib/class/member/login.class.php');

$user_id = isset($_POST['uid']) ? Xss::chkXSS($_POST['uid']) : null;
$user_pwd = isset($_POST['upwd']) ? Xss::chkXSS($_POST['upwd']) : null;
$return_url = isset($_POST['returnUrl']) ? Xss::chkXSS($_POST['returnUrl']) : null;
$idsave = isset($_POST['idsave']) ? Xss::chkXSS($_POST['idsave']) : null;

?>
<script>
//alert("<?=$return_url ?>")
console.log("$return_url  : <?=$return_url ?>");
</script>
<?

if (empty($return_url)){
	$return_url = '/';
}

if ($return_url == '/'){
	$return_url = '/marketPlace/index.php';
}else{
	//$return_url = '/'; //마켓에서 온 것이 아니면 전부 메인으로 처리 //이 부분을 삭제 또는 주석처리 하면  상단에서 로그인 한 것은 자기 페이지를 찾아간다.
} 
?>

<form name="frmReturn" method="post" action="/member/login.php" target="parent">
	<input type="hidden" name="return_url" value="<?php echo $return_url ;?>">
</form>
<script>
	function login_return(val){
		alert(val);
		frmReturn.submit();
	}
</script>
<?php

if (empty($user_id) || empty($user_pwd)) {
//	JS::LocationHref('입력값이 유효하지 않습니다.', '/member/login.php', 'parent');
	JS::LocationHref('입력값이 유효하지 않습니다.', '/member/login.php', '');
//	exit();
	?>	<script>//login_return("입력값이 유효하지 않습니다."); </script>
	<?php
	exit;
}
else {
	if (!LIB_LIB::chkMail($user_id)) {
		//JS::LocationHref('유효한 아이디가 아닙니다.', '/member/login.php', 'parent');
		JS::LocationHref('유효한 아이디가 아닙니다.', '/member/login.php', '');
		//exit();
		?>	<script>//login_return("유효한 아이디가 아닙니다.");</script>
		<?php
		exit;
	}

	$login = new Login();
	$login->setAttr('user_id', $user_id);
	$login->setAttr('user_pwd', $user_pwd);

	try {
		if ($login->getLogin($dbh)) {
			//@session_cache_limiter('nocache');
			session_start(); // 세션 데이터 초기화

			$user_id = AES256::enc($login->attr['user_id'], AES_KEY);
			$_SESSION['user_idx'] = AES256::enc($login->attr['user_idx'], AES_KEY);
			$_SESSION['user_id'] = $user_id;
			$_SESSION['user_name'] = AES256::enc($login->attr['user_name'], AES_KEY);
			$_SESSION['user_level_code'] = AES256::enc($login->attr['user_level_code'], AES_KEY);
			$_SESSION['logged_in'] = 1;
			$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];

			if ($idsave ==='Y'){ // 아이디 저장
				setcookie('cook_user_id', $user_id, time()+(60*60*24*30),'/');
			}else{
				setcookie('cook_user_id','',time() - 3600,'/');
			}


			//JS::LocationReplace($login->attr['user_name'].'님 환영합니다.', $return_url, 'parent');
			//JS::LocationReplace('환영합니다.', $return_url, 'parent');
			//header(Location:$return_url);
			//JS::LocationHref('환영합니다.', $return_url );
			
//echo "$return_url";
			?>

			<script>
			//alert("<?php echo $login->attr['user_name']; ?>님 환영합니다.");
			
			location.href="<?php echo $return_url; ?>";

			//parent.fixedPopupClose();
			</script>

			<?php
		}
		else {
			throw new Exception('정보가 일치하지 않습니다.');
		}
	}
	catch(Exception $e) {
		JS::LocationHref($e->getMessage(), '/member/login.php', 'parent');
	}

	$dbh = null;
	unset($dbh);
}
?>