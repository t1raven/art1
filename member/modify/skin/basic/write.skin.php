<? include "../../inc/config.php"; ?>
<?php
  $categoriName = "MY art1";
  $pageName = "기본정보수정";
  $pageNum = "5";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../../inc/link.php"; ?>
<? include "../../inc/top.php"; ?>
<? include "../../inc/header.php"; ?> 
<? include "../../inc/spot_sub.php"; ?> 

  <section id="container_sub"  class="mt0">
  <form name="joinFrm" method="post" action="/member/join/?at=update" onsubmit="return false;">
  <input type="hidden" name="mode" id="mode" value="edit">
    <div class="container_inner">
      <? include "../../inc/path.php"; ?> 
	<? include "../tab_myaccount.php"; ?> 
      <div class="dashSubArea">
            <h1 class="title1 content-mediaBox ">기본정보수정</h1>
      	<section id="formMailArea"  class="content-mediaBox margin1">
                <div class="formMailType1">
                  <ul>
                    <li>
                          <label for="" class="h">이메일(아이디)</label>
                          <input type="text" name="id" id="id"  class="inp_txt2" value="" class="inp {label:'이메일',required:true}" placeholder="이메일" required />
                    </li>
                    <li>
                          <label for="" class="h">이메일 확인</label>
                          <input type="text" name="rid" id="rid"  class="inp_txt2" class="inp {label:'이메일 재입력',required:true}" placeholder="이메일 재입력" required />
                    </li>
                    <li>
                          <label for="" class="h">비밀번호</label>
                          <input type="password" name="pwd" id="pwd"  class="inp_txt2" class="inp {label:'비밀번호',required:true}" placeholder="비밀번호" required />
                    </li>
                    <li>
                          <label for="" class="h">비밀번호 확인</label>
                          <input type="password" name="rpwd" id="rpwd"  class="inp_txt2" value="" class="inp {label:'비밀번호 재입력',required:true}" placeholder="비밀번호 확인" required />
                    </li>
                    <li>
                         <p class="h">SMS 수신동의</p>
                          <div class="rgh_group radio">
                            <span class="radio_listbox">
                                <input type="radio" name="smsform" id="smsform1"  checked />
                                <label for="smsform1">예</label>
                              </span>
                              <span class="radio_listbox">
                                <input type="radio" name="smsform" id="smsform2"  />
                                <label for="smsform2">아니오</label>
                              </span>
                          </div>
                    </li>
                    <li>
                          <p class="h">뉴스레터 수신동의</p>
                          <div class="rgh_group radio">
                            <span class="radio_listbox ">
                                <input type="radio" name="newsletter_status" id="newsform1"  value="Y" <?php if(!empty($newsletter_status)){ echo 'checked';} ?> />
                                <label for="newsform1">예</label>
                              </span>
                              <span class="radio_listbox">
                                <input type="radio" name="newsletter_status" id="newsform2" value="N" <?php if(empty($newsletter_status)){ echo 'checked';} ?> />
                                <label for="newsform2">아니오</label>
                              </span>
                          </div>
                    </li>
                  </ul>
                  <div class="btn_bot">
                    <!-- a href="/member/modify.php" class="btn_pack samll2 black">수정</a -->
					<a href="javascript:void(0);" id="btnSave" class="btn_pack samll2 black">수정</a>
                  </div><!-- //btn_bot -->
            </section>
      </div><!-- //dashSubArea -->

      

      
      
    </div><!-- //container_inner -->
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
		if ($("#rid").val()==''){ alert('이메일 확인을 입력하셔야 합니다.'); $("#rid").focus(); return false; }
		//if ($("#pwd").val()==''){ alert('비밀번호를 입력하셔야 합니다.'); $("#pwd").focus(); return false; }
		//if ($("#rpwd").val()==''){ alert('비밀번호 확인을 입력하셔야 합니다.'); $("#rpwd").focus(); return false; }

		if ($("#id").val() !=$("#rid").val()){ alert('이메일과 이메일 확인이 일치하지 않습니다.'); $("#rid").val(''); $("#rid").focus(); return false; }
		if ($("#pwd").val() != $("#rpwd").val()){ alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.'); $("#rpwd").val(''); $("#rpwd").focus(); return false; }
		chkForm(document.joinFrm);
	});
});


   checkListMotion(".rgh_group");
   tabTransformation(2,"c");
  </script>
  <? include "../../inc/footer.php"; ?>
<? include "../../inc/bot.php"; ?>













