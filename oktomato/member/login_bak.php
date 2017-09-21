<?php
include_once '../../lib/include/global.inc.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title>관리자모드</title>
<meta charset="utf-8">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/js/common.js"></script>
<script src="/js/jquery.chkform.js"></script>
</head>
<body>
<form name="loginFrm" method="post" action="login-check.php" onsubmit="return false;">


<p><input type="text" name="uid" class="inp {label:'아이디',required:true}" placeholder="아이디" required></p>
<p><input type="text" name="upwd" class="inp {label:'비밀번호',required:true}" placeholder="비밀번호" required></p>
<button id="btnLogin">로그인</button>






</form>
<script type="text/javascript">
function chkForm(f){
	if(chkDefaultForm(f) ){
		f.target = "action_ifrm";
		f.submit();
	}
}
$(function(){
	$("#btnLogin").click(function(){
		 chkForm(document.loginFrm);
	});
});
</script>
<?php echo ACTION_IFRAME;?>
</body>
</html>