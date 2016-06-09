<?php
$returnUrl = isset($_REQUEST['returnUrl']) ? Xss::chkXSS($_REQUEST['returnUrl']) : NULL;

if(empty($login_no_ajax)){ //$login_no_ajax //login.php 에서 지정 
	require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php'; // ajax 로 호출할때만 사용
	$ajax_state = '_ajax'; 
}else{
	if ($returnUrl == NULL ) {	$returnUrl = '/'; }
}

require $_SERVER['DOCUMENT_ROOT'].'google_login_oauth/inc_google_login_check.php'; //구글 로그인 처리
//echo 'returnUrl : '.$returnUrl.'<br>';

if (!empty($_COOKIE["cook_user_id"])){
	$cook_user_id = Xss::chkXSS(AES256::dec($_COOKIE["cook_user_id"], AES_KEY));
	$cook_checked= 'checked';
}

?>
<script>
function googleOpen(url){
	if($("#returnUrl<?php echo $ajax_state;?>").val() != '/'){ 
		$("#returnUrl<?php echo $ajax_state;?>").val(document.location.href) ;
	}
	window.open(url, 'googleLogin', ',width=500,height=450');
}
</script>

<script src="/js/facebook-login.js"></script>

<section id="loginArea">
   <div class="inner">
    <?php if(empty($login_no_ajax)){ ?>
	<button class="close" onclick="fixedPopupClose();"><img src="/images/btn/btn_close.png" alt="닫기"></button>
	<?php } ?>
      <div class="lft_group">
        <h1>로그인</h1>   
        <form name="loginFrm<?php echo $ajax_state;?>" method="post" action="/member/login-check.php" onsubmit="return loginCheck();">
        <input type="hidden" name="returnUrl" id="returnUrl<?php echo $ajax_state;?>" value="<?php echo $returnUrl; ?>">
        <input type="hidden" name="mode" id="mode" value="login">
        <div class="left">
          <p><input type="text" name="uid" id="uid<?php echo $ajax_state;?>" value="<?php echo $cook_user_id;?>art1@art1.com" class="n_txt" class="inp {label:'아이디',required:true}" placeholder="ID" required /></p>
          <p><input type="password" name="upwd" id="upwd<?php echo $ajax_state;?>" class="n_txt"  value="art1" class="inp {label:'비밀번호',required:true}" placeholder="Password" required/></p>
         </div>
         <p class="add">
           <span class="txt_left"><input type="checkbox" name="idsave" id="idsave<?php echo $ajax_state;?>"  value="Y" <?php echo $cook_checked;?>/><label for="idsave">아이디 저장</label></span>
           <span class="txt_right"><a href="#">비밀번호를 잊어버리셨나요?</a></span>
           </p>

          <a href="javascript:loginCheck();" >로그인</a>
          <!-- button onclick="loginCheck();">로그인</button -->
        <input type="submit" style="display:none;">
      
     </form>
</div><!-- //lft_group -->  


<div class="rgh_group">
      <h1>회원가입</h1>   
      <ul>
            <li class="face">
                  <div class="pc_ver">
                        <span class="ico"><img src="/images/ico/ico_face.gif" alt="페이스북" /></span>
                        <div class="txt">
                              <p><a href="javascript:facebookLogin('login');"><span>페이스북으로 로그인</span>하세요<br>  회원가입하기에서 페이스북으로도 가입하실 수 있습니다</a></p>
                        </div>
                  </div>
                  <div class="mo_ver">
                        <a href="javascript:facebookLogin('login');"><span><img src="/images/ico/ico_face_mo.gif" alt="페이스북" />&nbsp;facebook으로 로그인</a>
                  </div>
            </li>
            <li class="google">
                  <div class="pc_ver">
                        <span class="ico"><img src="/images/ico/ico_google.gif" alt="구글" /></span>
                        <div class="txt">
                              <p><a href="javascript:googleOpen('<?php echo $authUrl?>');"><span>구글+로 로그인</span>하세요<br>회원가입하기에서 구글+로도 가입하실 수 있습니다.</a></p>
                        </div>
                  </div>
                  <div class="mo_ver">
                        <a href="javascript:googleOpen('<?php echo $authUrl?>');"><span><img src="/images/ico/ico_google_mo.gif" alt="구글" />&nbsp;</span>Google+으로 로그인</a>
                  </div>
            </li>
      </ul>

      <div class="joinBox">
          <div class="inner">
              <p class="tit">art1 회원이 아니세요?</p>
              <p class="txt">회원가입을 하시면 art1 의 더 많은 혜택을 누리실 수 있습니다.</p>
              <div class="btn"><!-- a href="/member/join.php">회원가입하기</a --><a href="/member/join/?at=write">회원가입하기</a></div>
          </div>
      </div>


</div><!--// rgh_group -->

     
     
   	
</div><!--// inner -->	
 </section>



<script src="/js/jquery.chkform.js"></script>
<script type="text/javascript">
function chkForm(f){
	if ($("#returnUrl<?php echo $ajax_state;?>").val() == '' ){
		$("#returnUrl<?php echo $ajax_state;?>").val(document.location.href) ;
	}

	if(chkDefaultForm(f) ){
	//	f.target = "action_ifrm";
		f.submit();
	}
}
function loginCheck(){
	
	//alert(document.location.href);
	if ($("#uid<?php echo $ajax_state;?>").val()==''){ alert('아이디를 입력하셔야 합니다.'); $("#uid").focus(); return false; }
	if ($("#upwd<?php echo $ajax_state;?>").val()==''){ alert('비밀번호를 입력하셔야 합니다.'); $("#upwd").focus(); return false; }
	
	chkForm(document.loginFrm<?php echo $ajax_state;?>);
}
</script>



<?php
//echo ACTION_IFRAME;
?>