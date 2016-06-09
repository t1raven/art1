<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');

$categoriName = 'smart search';
$pageName = 'smart search';
$pageNum = '5';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

include(ROOT.'inc/config.php');
include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>
  <section id="container_sub">
    <div class="container_inner">
      <?php include(ROOT.'inc/path.php'); ?>
          <section id="quickSearchArea">
            <? include(ROOT.'search/common.inc.php');?>
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
<?php
include_once(ROOT.'inc/footer.php');
include_once(ROOT.'inc/bot.php');
?>