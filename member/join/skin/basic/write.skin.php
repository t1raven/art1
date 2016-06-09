<? include "../../inc/config.php"; ?>
<?php
  $categoriName = "MemberShip";
  $pageName = "회원가입";
  $pageNum = "5";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../../inc/link.php"; ?>
<? include "../../inc/top.php"; ?>
<? include "../../inc/header.php"; ?>
<? include "../../inc/spot_sub.php"; ?>

  <section id="container_sub">
    <div class="container_inner">
      <? include "../../inc/path.php"; ?>

<script src="/js/facebook-login.js"></script>

      <section id="joinStep1Area" class="content-mediaBox">
	  <form name="joinFrm" method="post" action="?at=update" onsubmit="return false;">
	  <input type="hidden" name="mode" id="mode" value="join">
         <h1>회원가입</h1>
         <div class="lft_group">
           <ul>
            <li>
             <label class="h" for="">이메일(아이디)</label>
             <input type="text" title="이메일(아이디) 입력" name="id" id="id"  value=""  class="inp {label:'이메일',required:true}" placeholder="이메일" required />
            </li>
            <li>
             <label class="h" for="">이메일 확인</label>
             <input type="text" title="이메일 확인 입력"  name="rid" id="rid"  value="" class="inp {label:'이메일 재입력',required:true}" placeholder="이메일 재입력" required />
            </li>
            <li>
             <label class="h" for="">비밀번호</label>
             <input type="password" title="비밀번호 입력" name="pwd" id="pwd"  value="" class="inp {label:'비밀번호',required:true}" placeholder="비밀번호" required />
            </li>
            <li>
             <label class="h" for="">비밀번호 확인</label>
             <input type="password" title="비밀번호 확인 입력" name="rpwd" id="rpwd"  value="" class="inp {label:'비밀번호 재입력',required:true}" placeholder="비밀번호 재입력" required />
            </li>
            <li>
             <label class="h" for="SMSsusin">SMS 수신동의</label>
             <div class="susin">
              <input type="radio" id="SMSsusin1"  name="sms_status" value="Y" checked>
              <label for="SMSsusin1" class="mr">예</label>
              <input type="radio" id="SMSsusin2" name="sms_status" value="N">
              <label for="SMSsusin2">아니오</label>
             </div>
            </li>
            <!-- <li>
             <label class="h" for="">뉴스레터 수신동의</label>
             <div class="susin">
              <input type="radio" id="NEWSsusin1"  name="newsletter_status" value="Y" checked>
              <label for="NEWSsusin1" class="mr">예</label>
              <input type="radio" id="NEWSsusin2" name="newsletter_status" value="N">
              <label for="NEWSsusin2">아니오</label>
             </div>

            </li> -->
           </ul>
         </div>

         <div class="rgh_group">
           <ul>
            <li><a href="javascript:facebookLogin('join');" class="btn_face_mo"><span class="lft">facebook으로 회원가입</span></a></li>
            <li><a href="javascript:googleOpen('<?php echo $authUrl?>');" class="btn_google_mo"><span class="lft">Google+으로 회원가입</span></a></li>
           </ul>
           <p class="info"><span class="space">페이스북/구글+ 정보를 통해</span>  회원가입이 가능합니다.</p>
         </div>

         <div class="bot_group">
             <div class="agreement">
             <p><input type="checkbox" name="policyAgree" id="policyAgree" class="inp {label:'이용약관',required:true}" placeholder="이용약관" required> 이용약관에 동의하시겠습니까? 약관 동의 내용을 보시려면 <a href="/service/terms.php" class="here">여기</a>를 클릭하세요</p>
             <p><input type="checkbox" name="privacyAgree" id="privacyAgree" class="inp {label:'개인정보취급방침',required:true}" placeholder="개인정보취급방침" required> 개인정보 취급방침에 동의하시겠습니까? 개입정보 취급방침 내용을 보시려면  <a href="/service/policy.php" class="here">여기</a> 클릭하세요</p>
            </div>
            <div class="btns">
             <button class="btnPack ov-g" onclick="reset();"><span>취소</span></button>
             <button class="btnPack ov-g" id="btnSave"><span>완료</span></button>
            </div>
         </div>
      </form>
      </section>



    </div><!-- //container_inner -->
  </section><!-- //container_sub -->

  <!-- 전환페이지 설정 -->
<script type="text/javascript" src="http://wcs.naver.net/wcslog.js"></script>
<script type="text/javascript">
var _nasa={};
_nasa["cnv"] = wcs.cnv("5","1"); // 전환유형, 전환가치 설정해야함. 설치매뉴얼 참고
</script>
  <? include "../../inc/footer.php"; ?>
<? include "../../inc/bot.php"; ?>

<script src="/js/jquery.chkform.js"></script>
<script type="text/javascript">
function chkForm(f){
	if(chkDefaultForm(f) ){
		//f.target = "action_ifrm";
		f.submit();
	}
}
$(function(){
	$("#btnSave").click(function(){
		 chkForm(document.joinFrm);
	});
});
</script>
<script>
function googleOpen(url){
	window.open(url, 'googleLogin', ',width=500,height=450');
}
</script>








