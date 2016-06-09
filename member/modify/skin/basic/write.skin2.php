<? include "../../../../inc/config.php"; ?>
<?php
  $categoriName = "MY art1";
  $pageName = "기본정보수정";
  $pageNum = "5";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../../../../inc/link.php"; ?>
<? include "../../../../inc/top.php"; ?>
<? include "../../../../inc/header.php"; ?> 
<? include "../../../../inc/spot_sub.php"; ?> 

  <section id="container_sub"  class="mt0">
  <form name="joinFrm" method="post" action="/member/join/?at=update" onsubmit="return false;">
  <input type="hidden" name="mode" id="mode" value="edit">
    <div class="container_inner">
    <? include "../../../../inc/path.php"; ?> 
	<? include "../../../tab_myaccount.php"; ?> 
      <div class="dashSubArea">
            <h1 class="title1 content-mediaBox ">기본정보수정[이메일/패스워드 변경]</h1>
      	<section id="formMailArea"  class="content-mediaBox margin1">
           <div class="formMailType1 searchID">
                	<p class="sub_txt">새로운 패스워드를 입력해 주세요.</p>
                  <ul>
                    <li>
                          <label for="" class="h">E-Mail Address *</label>
                          <input type="text" name="id" id="id"  class="inp_txt2" value="" class="inp {label:'이메일',required:true}" required />
                          <p class="alert_txt">중복된 이메일 입니다.</p>
                    </li>
                   </ul>
                   <p class="sub_txt">패스워드는 최소 6자 이상만 허용됩니다.<br />보안을 위해 숫자와 문자 또는 특수기호를 혼용해 주세요.</p>
                   <ul> 
                    <li>
                          <label for="" class="h">New Password *</label>
                          <input type="password" name="pwd" id="pwd"  class="inp_txt2" class="inp {label:'비밀번호',required:true}" required />
                    </li>
                    <li>
                          <label for="" class="h">Confirm New Password *</label>
                          <input type="password" name="rpwd" id="rpwd"  class="inp_txt2" value="" class="inp {label:'비밀번호 재입력',required:true}" required />
                    </li>
                  </ul>
                  <div class="btn_bot">
                    <!-- a href="/member/modify.php" class="btn_pack samll2 black">수정</a -->
					<a href="javascript:void(0);" id="btnSave" class="btn_pack samll2 black">Save</a>
                  </div><!-- //btn_bot -->
			</div>	
		</section>
      <!-- //dashSubArea -->
      
      
    </div><!-- //container_inner -->
    </div>
  </form>
  </section><!-- //container_sub -->

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
		if ($("#id").val()==''){ alert('이메일을 입력하셔야 합니다.'); $("#id").focus(); return false; }
		//if ($("#rid").val()==''){ alert('이메일 확인을 입력하셔야 합니다.'); $("#rid").focus(); return false; }
		//if ($("#pwd").val()==''){ alert('비밀번호를 입력하셔야 합니다.'); $("#pwd").focus(); return false; }
		//if ($("#rpwd").val()==''){ alert('비밀번호 확인을 입력하셔야 합니다.'); $("#rpwd").focus(); return false; }

		//if ($("#id").val() !=$("#rid").val()){ alert('이메일과 이메일 확인이 일치하지 않습니다.'); $("#rid").val(''); $("#rid").focus(); return false; }
		if ($("#pwd").val() != $("#rpwd").val()){ alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.'); $("#rpwd").val(''); $("#rpwd").focus(); return false; }
		chkForm(document.joinFrm);
	});
});


   checkListMotion(".rgh_group");
   tabTransformation(2,"c");
  </script>
  <? include "../../../../inc/footer.php"; ?>
  <? include "../../../../inc/bot.php"; ?>













