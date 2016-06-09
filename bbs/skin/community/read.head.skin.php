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
		<? include "../news/inc_tap_menu.php"; ?>
		  <section id="bbs_view_ty1" class="bbs_view_ty1">
              <div class="inner">
                  <header class="header">
                      <h1 id="print_title"><strong><?php echo $Bbs->attr['bbs_name']; ?></strong><?php echo $Bbs->attr['bbs_title']; ?></h1>
                      <p class="data"><?php echo substr($Bbs->attr['reg_date'],0,4)?>.<?php echo substr($Bbs->attr['reg_date'],5,2)?>.<?php echo substr($Bbs->attr['reg_date'],8,2)?></p>
                      <ul class="util clearfix">
                        <!-- li><a href="#" class="mail">메일보내기</a></li -->
                        <li><a href="#" class="print"  id="btnPrint" onClick="print_ok();">프린트하기</a> </li>
                      </ul>
					  <article class="content">
						<div class="bbs_infor">
						<?
						//echo $bbs_idx;
						//$aAttachFile = $Bbs->getFileInfo($dbh, $bbs_idx, $bbs_code);
						$aAttachFile = $Bbs->getFileInfo($dbh, $bbs_idx, $bbs_code, 2);
						//echo print_r($aAttachFile);
						?>

<?php if (!empty($aAttachFile)) : ?>
<?php
		foreach($aAttachFile as $val) {
			//echo bbsUploadPath.$val['up_file_name'];
			?>
			<p><a href="<?php echo bbsUploadPath.$val['up_file_name'];?>" class="file"><img src="/images/bbs/ico_file.gif" alt="" /> &nbsp;<span><?php echo $val['ori_file_name'];?></span></a></p>
			<?php
		}
?>

<?php endif;?>
<!-- /div -->
							<!-- a href="#" class="file"><img src="/images/bbs/ico_file.gif" alt="" /> &nbsp;<span>첨부파일1.jpg</span></a></p --> <span class="writer">Writer : <?php echo $sWriter; ?></span>
						</div>
						<ul class="ico_list">
							<li><a href="javascript:;" onclick="shareFaceBook();"><img src="/images/bbs/ico_bbs_view1_off.gif" onmouseover="$(this).imgConversion(true);" onmouseout="$(this).imgConversion(false);" alt="페이스북" /></a></li>
							<li><a href="javascript:;" onclick="sharePinterest();"><img src="/images/bbs/ico_bbs_view2_off.gif" alt="" /></a></li>
							<!-- li><a href=""><img src="/images/bbs/ico_bbs_view3_off.gif" alt="" /></a></li>
							<li><a href=""><img src="/images/bbs/ico_bbs_view4_off.gif" alt="" /></a></li -->
							<li><a href="javascript:;" onclick="shareGooglePlus();" ><img src="/images/bbs/ico_bbs_view5_off.gif" alt="" /></a></li>
						</ul>

                  </article><!-- //content -->
                  </header><!-- //header -->
				  <div  class="bbsBody">
				  <p><?php echo str_replace('\\"', '"', htmlspecialchars_decode($Bbs->attr['bbs_content'])); ?></p>
				  </div>
				  <!-- p class="bbs_copy">&lt;저작권자 © ‘돈이 보이는 리얼타임 뉴스’ 머니투데이, 무단전재 및 재배포 금지&gt;</p -->

              </div><!-- //inner -->
          </section><!-- //bbs_view_ty1 -->

<script>
// 게시판에 올라온 글 중 이미지 반응형으로 처리
$(".bbsBody").find("img").css({
	 "max-width":"100%",
	 "width": "inherit",
	 "height": "auto"
}).attr("title","");

$(".bbsBody").find("img").parent().css({"text-align":"center","dispaly":"block","max-width":"700px","margin-left":"auto","margin-right":"auto"});
$(".bbsBody").find("a[href]").css({"word-break":"break-all"});
</script>






