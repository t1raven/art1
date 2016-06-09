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
    <div class="container_inner">
    <? include "../../../../inc/path.php"; ?> 
	<? include "../../../tab_myaccount.php"; ?> 
      <div class="dashSubArea">
        <h1>기본정보수정[이메일/패스워드 변경]</h1>
      	<section id="formMailArea"  class="content-mediaBox margin1">
           <div class="formMailType1 searchID">
                	<p class="sub_txt">새로운 패스워드 적용이 완료되었습니다. </p>
                  <div class="btn_bot">
                    <!-- a href="/member/modify.php" class="btn_pack samll2 black">수정</a -->
					<a href="/" id="btnSave" class="btn_pack samll2 black">Home</a>
                  </div><!-- //btn_bot -->
			</div>	
		</section>
      <!-- //dashSubArea -->
      
      
    </div><!-- //container_inner -->
    </div>
  </section><!-- //container_sub -->

<script src="/js/jquery.chkform.js"></script>
  <? include "../../../../inc/footer.php"; ?>
  <? include "../../../../inc/bot.php"; ?>













