<?php
include_once '../../lib/include/global.inc.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta name="title" content="머니투데이 관리자홈페이지">
<meta name="author" content="OKTOMATO">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title><?=$pageName?> | 머니투데이 관리자모드</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?=$currentFolder?>/css/default.css" />
<link rel="stylesheet" href="/oktomato/css/login.css" />
<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'> -->
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?=$currentFolder?>/js/jquery.easing.1.3.js"></script>
<script src="<?=$currentFolder?>/js/common.js"></script>
<script src="<?=$currentFolder?>/js/fakeselect.js"></script>

<script src="/js/jquery.chkform.js"></script>
<!--[if lt IE 9]>
 <link rel="stylesheet" href="<?=$currentFolder?>/css/ie.css" />
 <script src="<?=$currentFolder?>/js/html5.js"></script>
 <script src="<?=$currentFolder?>/js/respond.min.js"></script>
  <![endif]-->
 </head>
<body>
 <div id="wrap">
 <section id="loginBoxArea">
  <h1><strong>Online</strong> Inquiry</h1>
  <div class="blueBox">
   <p>Log in here to enter system</p>
   <div class="flid">
      <form name="loginFrm" method="post" action="login-check.php" onsubmit="return false;">
     <div class="id_box"> <input type="text" name="uid" class="inp {label:'아이디',required:true}" placeholder="ID" required></div>
      <div class="pw_box"><input type="text" name="upwd" class="inp {label:'비밀번호',required:true}" placeholder="Password" required></div>
      <button id="btnLogin">Log in</button>
     </form>
    </div><!-- //flid -->
  </div><!-- //blueBox -->

  <footer class="footer">
    <h1><img src="/oktomato/images/login/img_logo_oktomto.png" alt="OKTOMATO"></h1>
    <p class="copyright">
		T : 02)2697-2399<span>l</span>
	F : 02)2697-1845<span> l</span>
	Copyright&copy; 2002~2014. OKTOMATO.NET All rights reserved.</p>
  </footer>

 </section><!-- //loginBoxArea -->

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