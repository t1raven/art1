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
		<div class="tabBox">
			<ul>
				<li class="<?php if($subm=='2') echo 'on' ; ?>"><a href="<?php echo $news_menu_brief ; ?>">In brief</a></li>
				<li class="<?php if($subm=='3') echo 'on' ; ?>"><a href="<?php echo $news_menu_trend ; ?>">Trend</a></li>
				<li class="<?php if($subm=='4') echo 'on' ; ?>"><a href="<?php echo $news_menu_people ; ?>">People</a></li>
				<li class="<?php if($subm=='14') echo 'on' ; ?>"><a href="<?php echo $news_menu_world ; ?>">World</a></li>
				<li class="<?php if($subm=='5') echo 'on' ; ?>"><a href="<?php echo $news_menu_trouble ; ?>">Trouble</a></li>
				<li class="<?php if($subm=='6') echo 'on' ; ?>"><a href="<?php echo $news_menu_episode ; ?>">Episode</a></li>
				<li class="<?php if($subm=='') echo 'on' ; ?>"><a href="<?php echo $news_menu_community ; ?>">Community</a></li>
			</ul>
		</div>
          <section id="bbs_view_ty1">
              <div class="inner">
                  <header class="header">
                      <h1><strong><?php echo $news_category_name;?></strong><?php echo $News->attr['news_title'];?></h1>
                      <p class="data"><?php echo substr($News->attr['create_date'],0,4)?>.<?php echo substr($News->attr['create_date'],5,2)?>.<?php echo substr($News->attr['create_date'],8,2)?></p>
                      <ul class="util clearfix">
                        <li><a href="#" class="mail">메일보내기</a></li>
                        <li><a href="#" class="print">프린트하기</a></li>
                      </ul>
                  </header><!-- //header -->
                  <article class="content">
                    <p style="text-align:center;margin-bottom: 30px;"><img src="/images/tmp/tmp_bbs_view.jpg" alt=""></p>
                    <p style="text-align:center; font-size: 15px; line-height: 22px;">
                      전시는 영화 '마담뺑덕'의 등장하는 인물들의 오마쥬로 이루어진다. 학규(정우성)와 덕이(이솜) 그리고 학규의 딸 청이(박소영)의 방을 구성, 각 공간별로 캐릭터의 개성을 느낄 수 있는 작품들을 배치했다. 이번 전시는 영화 소품과 스틸컷을 전시하는 기존의 영화 전시회와 달리 5인의 현대 미술 작가들이 영화를 새로운 시각으로 재해석한 작품들을 창작해 그간 없던 새로운 영화와 미술의 예술적 결합을 선보인다. 특히 ‘학규의 Bad Room’이라는 전시공간에는 사전에 촬영한 정우성의 이미지를 침대 위에 투사, 관객이 침대 위에 누워 실제 배우와 함께 있는 듯한 느낌을 받을 수 있는 작품이 전시돼 있다. 더욱이 침대 위에 투사된 정우성 이미지는 고정된 이미지가 아니라 여러 동작을 반복한다. 또 관람객은 정우성의 친절한 해설을 들을 수 있다. 정우성의 목소리가 담긴 오디오 가이드가 마련됐다. 지난 18일 정우성과 이솜이 갤러리 정식 오픈 전에 직접 방문해 전시에 대한 기대감을 드러내기도 했다. 
                    </p>
                  </article><!-- //content -->
              </div><!-- //inner -->
          </section><!-- //bbs_view_ty1 -->
          <div class="btn_bot">
              <div class="lft_group">
                  <a href="#" class="btn_pack prev samll">이전글</a>
                  <a href="#" class="btn_pack next samll">다음글</a>
              </div> 
              <div class="rgh_group">
                  <a href="#" class="btn_pack samll">목록</a>
              </div> 
          </div><!-- //btn_bot -->

      
    </b><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





