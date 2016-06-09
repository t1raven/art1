<? include "../inc/config.php"; ?>
<?php
  $categoriName = "NEWS";
  $pageName = "NEWS";
  $pageNum = "2";
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
      <script>
$(function(){
$("#quickBtn .back").css("display","inline");
/*
    var  isto = "<?=$isto?>";
  if(isto != ""){

  }else{
     $("#quickBtn .back").css("display","none");
  }*/
})


</script>
		<? include "./inc_tap_menu.php"; ?>
          <section id="bbs_view_ty1" class="content-mediaBox margin1">

              <div class="inner" >
                  <header class="header">
                      <h1><strong><?php echo $news_category_name;?></strong><?php echo $News->attr['news_title'];?></h1>
                      <p class="data"><?php echo substr($News->attr['create_date'],0,4)?>.<?php echo substr($News->attr['create_date'],5,2)?>.<?php echo substr($News->attr['create_date'],8,2)?></p>
                      <ul class="util clearfix" id="btnBox">
                        <!-- li><a href="#" class="mail" id="btnEmail">메일보내기</a></li -->
                        <li><a href="#" class="print" id="btnPrint1" onClick="print_ok();">프린트하기</a></li>
                      </ul>
					  <article class="content">
						<div class="bbs_infor">
							<p><span class="writer"><strong>[<?php echo $News->attr['source'];?>]</strong> <?php echo $News->attr['reporter_name'];?></span></p>
						</div>

					<ul class="ico_list" style='display:;'>
						<li><a href="javascript:;" onclick="shareFaceBook();"><img src="/images/bbs/ico_bbs_view1_off.gif" onmouseover="$(this).imgConversion(true);" onmouseout="$(this).imgConversion(false);" alt="페이스북" /></a></li>
						<li><a href="javascript:;" onClick="shareGooglePlus();"><img src="/images/bbs/ico_bbs_view5_off.gif" onmouseover="$(this).imgConversion(true);" onmouseout="$(this).imgConversion(false);" alt="구글플러스" /></a></li>
						<li><a href="javascript:;" onclick="sharePinterest();"><img src="/images/bbs/ico_bbs_view2_off.gif" onmouseover="$(this).imgConversion(true);" onmouseout="$(this).imgConversion(false);" alt="Pinterest" /></a></li>
						<!-- li><a href=""><img src="/images/bbs/ico_bbs_view3_off.gif" alt="" /></a></li>
						<li><a href=""><img src="/images/bbs/ico_bbs_view4_off.gif" alt="" /></a></li -->
					</ul>
                  </header><!-- //header -->
