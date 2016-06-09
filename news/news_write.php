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
				<li><a href="index1.php">In brief</a></li>
				<li><a href="index2.php">Trend</a></li>
				<li><a href="index3.php">People</a></li>
				<li><a href="index4.php">World</a></li>
				<li><a href="index5.php">Trouble</a></li>
				<li><a href="index6.php">Episode</a></li>
				<li><a href="index7.php">Community</a></li>
			</ul>
		</div>
          <section id="bbs_view_ty1"  class="write content-mediaBox margin1">
              <div class="inner">
                  <header class="header">
                      <select>
                        <option value="1">공지</option>
                        <option value="1">학술행사</option>
                        <option value="1">강좌</option>
                        <option value="1">공모</option>
                        <option value="1">구인구직</option>
                        <option value="1">전시소식</option>
                        <option value="1">도서</option>
                      </select>
                      <input type="text" class="inp_txt wp80">
                  </header><!-- //header -->
                  <article class="content">
                    <div class="textarea">
                      <textarea name="" id=""></textarea>
                    </div>
                  </article><!-- //content -->
              </div><!-- //inner -->
          </section><!-- //bbs_view_ty1 -->
          <div class="btn_bot">
               <div class="rgh_group">
                  <a href="#" class="btn_pack samll black">목록</a>
              </div> 
          </div><!-- //btn_bot -->









      
      
    </b><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





