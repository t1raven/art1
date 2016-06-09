<? include "../inc/config.php"; ?>
<?php
  $categoriName = "MY ACCOUNT";
  $pageName = "기본정보수정";
  $pageNum = "5";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 

  <section id="container_sub"  class="mt0">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
	<? include "tab_myaccount.php"; ?> 
      <div class="dashSubArea">
            <h1 class="title1 content-mediaBox ">기본정보수정</h1>
      	<section id="formMailArea"  class="content-mediaBox margin1">
                <div class="formMailType1">
                  <ul>
                    <li>
                          <label for="" class="h">이메일(아이디)</label>
                          <input type="text" name="uid" id="uid_ajax"  class="inp_txt2">
                    </li>
                    <li>
                          <label for="" class="h">이메일 확인</label>
                          <input type="text" name="uid" id="uid_ajax"  class="inp_txt2">
                    </li>
                    <li>
                          <label for="" class="h">비밀번호</label>
                          <input type="text" name="uid" id="uid_ajax"  class="inp_txt2">
                    </li>
                    <li>
                          <label for="" class="h">비밀번호 확인</label>
                          <input type="text" name="uid" id="uid_ajax"  class="inp_txt2">
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
                                <input type="radio" name="newsform" id="newsform1"  checked />
                                <label for="newsform1">예</label>
                              </span>
                              <span class="radio_listbox">
                                <input type="radio" name="newsform" id="newsform2"  />
                                <label for="newsform2">아니오</label>
                              </span>
                          </div>
                    </li>
                  </ul>
                  <div class="btn_bot">
                    <a href="/member/modify.php" class="btn_pack samll2 black">수정</a>
                  </div><!-- //btn_bot -->
            </section>
      </div><!-- //dashSubArea -->

      

      
      
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <script>
   checkListMotion(".rgh_group");
   tabTransformation(2,"c");
  </script>
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>













