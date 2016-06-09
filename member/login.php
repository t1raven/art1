<? include "../inc/config.php"; ?>
<?php
  $categoriName = "MemberShip";
  $pageName = "Log In";
  $pageNum = "5";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 

  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
      

         <!--  <?php
         include_once('skin/basic/login-skin.php');
         ?> -->

         <?
		 $login_no_ajax = true ; //로그인 페이지를 ajax 가 아닌 로직으로 호출할때 구분할 수 있도록 변수 지정  //ajax_login.php 에서 사용
		 include "../inc/ajax_login.php"; 
		 ?> 


      
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  



  
  
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>











