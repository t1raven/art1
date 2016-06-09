<? include "../inc/config.php"; ?>
<?php
  $categoriName = "COUNSEL";
  $pageName = "상담등록";
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
          <section id="resevationContArea" class="content-mediaBox margin1">
            <? include "../inc/ajax_reservation.php";  ?> 
          </section>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  

<script>
    checkListMotion();
</script>
  
  
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>











