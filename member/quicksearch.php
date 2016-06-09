<? include "../inc/config.php"; ?>
<?php
  $categoriName = "SMART SEARCH";
  $pageName = "SMART SEARCH";
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
          <section id="quickSearchArea">
            <? include "../inc/ajax_quicksearch.php";  ?> 
          </section>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  

<script>
 $(".searchBar").find(".btn_search").click(function(){
    if ($(".smartTableBox").css("display") == "none")
    {
      $(this).addClass("on")
      $(".smartTableBox").slideDown();
    }else{
      $(".smartTableBox").slideUp();
      $(this).removeClass("on")
    }
  });
    checkListMotion();
    bbsCheckbox();
    LabelHidden(".inp_txt.lh");
</script>
  
  
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>











