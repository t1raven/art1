
<? include "inc/config.php"; ?>
<?php
  require ROOT.'lib/class/banner/banner.class'.SOURCE_EXT;
  require ROOT.'lib/class/main/main.class'.SOURCE_EXT;
  $main = new Main(); //베너 / 메인노출 뉴스

  $pageName = "메인";
  $pageNum = "0";
  $subNum = "0";
  $thirdNum = "0";
?>
<? include "inc/link.php"; ?>
<? include "inc/top.php"; ?>
<link rel="stylesheet" href="/css/main_renew.css" />
<script src="/js/isotope.pkgd.min.js"></script>
<? include "inc/header.php"; ?>

  <section id="container_main">
    <div class="container_inner">

		<!--메인 뉴스 & 베너 S -->
		<section id="NewsV2" class="main-grid">
			<div class="inner">
				<div class="bx_news">
					<ul>
						<li class="grid-sizer"></li>
						<li class="w2 grid-item" data-type="headline">
							<div class="inner type_headline">
							  <?php
							  //메인 뉴스 1 (큰 베너 3개, 2:1 size)
							  $banner = new Banner(); //베너 / 메인노출 뉴스

							  $list = null;
							  $row = null;
							  $link = null;
							  $banner->setAttr('section', 1);
							  $list = $banner->getList($dbh);
							  ?>
								<ul class="img slide">
									<?php foreach($list as $row) { ?>
									<li><img src="<?php echo newsUploadPath, $row['news_img']; ?>" alt="뉴스기사1" /></li>
									<?php } //foreach ?>
								</ul>
								<div class="con_t2 con">
									<h2 class="rato">HEADLINE</h2>
									<div id="news_sect_slide1" class="bx_slide">
										<ul class="swiper-wrapper swiper-no-swiping">
											<?php
											foreach($list as $row) {
												$link = '/news/index.php?at=read&subm='.$row['news_category_idx'].'&idx='.$row['news_idx'];
											?>
											<li class="swiper-slide ">
												<h3><a href="<?php echo $link?>"><?php echo $row['news_title']?></a></h3>
												<p><a href="<?php echo $link?>"><?php echo $row['news_text']?> </a></p>
											</li>
											<?php } //foreach ?>

										</ul>
										<div class="pagination"></div>
									</div>
								</div>
							</div>
						</li><!-- EPISODE -->


						<!-- 뉴스 2-1 -->
						<?php
						//메인 뉴스 2-1 (1:1 size)
						$link = null;
						$banner->setAttr('section', 2);
						$banner->setAttr('news_mainpage_idx', 4);
						$banner->getRead($dbh);
						$link = '/news/index.php?at=read&subm='.$banner->attr['news_category_idx'].'&idx='.$banner->attr['news_idx'];
						?>
						<li class="grid-item" data-type="news">
							<div class="inner type_news">
								<a href="<?php echo $link?>">
									<div class="img"><img src="<?php echo newsUploadPath, $banner->attr['news_img']; ?>" alt="뉴스기사" /></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2><?php echo $banner->attr['news_category_text'] ;?></h2>
												<h3><?php echo $banner->attr['news_title'] ;?></h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p><?php echo $banner->attr['news_text'] ;?></p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt="" /></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li><!-- EPISODE -->

						<!-- 뉴스 3-1 -->
						<?php
						//메인 뉴스 3-1 (1:1 size)
						$link = null;
						$banner->setAttr('section', 3);
						$banner->setAttr('news_mainpage_idx', 6);
						$banner->getRead($dbh);
						$link = '/news/index.php?at=read&subm='.$banner->attr['news_category_idx'].'&idx='.$banner->attr['news_idx'];
						?>
						<li class="grid-item" data-type="news">
							<div class="inner type_news">
								<a href="<?php echo $link?>">
									<div class="img"><img src="<?php echo newsUploadPath, $banner->attr['news_img']; ?>" alt="뉴스기사" /></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2><?php echo $banner->attr['news_category_text'] ;?></h2>
												<h3><?php echo $banner->attr['news_title'] ;?></h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p><?php echo $banner->attr['news_text'] ;?></p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt="" /></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li><!-- EPISODE -->

						<li class="md_hide grid-item" data-type="news">
							<div class="inner type_time">
								<div class="bx_logo">
									<div class="inner2">
										<div id="news_timer" class="bx_time">
											<h2><span class="hour">&nbsp;</span><span class="min">&nbsp;</span></h2>
											<h3>&nbsp;</h3>
										</div>
										<div class="logos">
											<a href="/art1/quick_space_art1.php" target="_blank"><img src="/images/main/logo_space_art1_new.png" alt="space_art1" /></a>
											<a href="/art1/quick_media_art1.php" target="_blank"><img src="/images/main/logo_media_art1_new.png" alt="media_art1" /></a>
										</div>
									</div>
								</div>
							</div>
						</li><!-- time & logo -->

						<!-- 뉴스 4 -->
						<?php
						//카드뉴스 뉴스 3-1 (1:1 size)
						$link = null;
						$banner->setAttr('section', 4);
						$banner->setAttr('news_mainpage_idx', 8);
						$banner->getRead($dbh);
						$link = '/news/index.php?at=read&subm='.$banner->attr['news_category_idx'].'&idx='.$banner->attr['news_idx'];
						?>
						<li class="md_hide grid-item" data-type="news">
							<div class="inner card_news type_news">
								<div class="img"><a href="<?php echo $link?>"><img src="<?php echo newsUploadPath, $banner->attr['news_img']; ?>" alt="" /></a></div>
							</div>
						</li>

						<!-- 뉴스 2-2 -->
						<?php
						//메인뉴스 2-2 (1:1 size)
						$link = null;
						$banner->setAttr('section', 2);
						$banner->setAttr('news_mainpage_idx', 5);
						$banner->getRead($dbh);
						$link = '/news/index.php?at=read&subm='.$banner->attr['news_category_idx'].'&idx='.$banner->attr['news_idx'];
						?>
						<li class="grid-item" data-type="news">
							<div class="inner type_news">
								<a href="<?php echo $link?>">
									<div class="img"><img src="<?php echo newsUploadPath, $banner->attr['news_img']; ?>" alt="뉴스기사" /></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2><?php echo $banner->attr['news_category_text'] ;?></h2>
												<h3><?php echo $banner->attr['news_title'] ;?></h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p><?php echo $banner->attr['news_text'] ;?></p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt="" /></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li><!-- TREND -->

						<!-- 뉴스 3-2 -->
						<?php
						//메인뉴스 3-2 (1:1 size)
						$link = null;
						$banner->setAttr('section', 3);
						$banner->setAttr('news_mainpage_idx', 7);
						$banner->getRead($dbh);
						$link = '/news/index.php?at=read&subm='.$banner->attr['news_category_idx'].'&idx='.$banner->attr['news_idx'];
						?>
						<li class="grid-item" data-type="news">
							<div class="inner type_news">
								<a href="<?php echo $link?>">
									<div class="img"><img src="<?php echo newsUploadPath, $banner->attr['news_img']; ?>" alt="뉴스기사" /></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2><?php echo $banner->attr['news_category_text'] ;?></h2>
												<h3><?php echo $banner->attr['news_title'] ;?></h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p><?php echo $banner->attr['news_text'] ;?></p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt="" /></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li><!-- PEOPLE -->
						<li class="w2 board grid-item" data-type="newslist">
							<div class="inner type_newslist">
								<div class="bx_bbs_list">
									<div class="inner2">
										<div class="list">
											<ul class="depth1">

											<?php for($i = 0 ; $i < 3 ; $i++){?>
												<li class="<?php echo ($i == 0 )? 'show' : '' ;?>">
													<table class="depth2">
														<tbody>
														<?php
														$list = null;
														$row = null;
														$link = null;
														$banner->setAttr("page", $i+1);
														$banner->setAttr("sz", 7 );
														//$banner->setAttr("bbs_category", 10);
														$list = $banner->getListMainNews($dbh);

														foreach($list as $row) {
															//날짜형식 변경
															$newsDateFormat = date('M.d' , strtotime($row['create_date']) );
															$link = '/news/index.php?at=read&subm='.$row['news_category_idx'].'&idx='.$row['news_idx'];
														?>
															<tr><th><?php echo $row['news_category_name']?></th><td><a href="<?php echo $link?>"><?php echo $row['news_title']?></a></td><td class="date"><?php echo $newsDateFormat ?></td></tr>
														<?php } ?>
														</tbody>
													</table>
												</li>
											<?php }?>
											</ul>
										</div>
										<div class="btns">
											<button onclick="moveNewsList(-1)"><img src="/images/main/ico_page_up1.png" alt="" /></button>
											<button onclick="moveNewsList(1)"><img src="/images/main/ico_page_down1.png" alt="" /></button>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>

				<div class="bot_banner" data-type="banner" data-idx="5" >
					<?php
					//메인 베너 S
					$list = null;
					$row = null;
					$idx = 5;
					$row = $main->getBanner($dbh, $idx);

					if($row['isDisplay'] == 'Y' && !empty($row['bannerUpFileName']) ) {
					?>
						<div class="inner type_banner">
							<a href="<?php echo $row['linkUrl']; ?>" target="_blank">
								<img src="<?php echo $row['bannerUpFileName']; ?>" class="pc" alt="" />
								<img src="<?php echo $row['bannerUpFileNameMobile']; ?>" class="mobile" alt="" />
							</a>
						</div>
					<?php
					} else {
						if ( AES256::dec($_SESSION['user_level_code'], AES_KEY) >= '99') {
						?>
							<div class="inner type_banner">
									배너영역입니다.<br><br>
									노출 될 베너가 없습니다.<br><br>
							</div>
						<?php
						}
					}
					//메인 베너 E
					?>
				</div>
			</div>
		</section>
		<?php
			$banner = null;
			unset($banner);
		?>
		<!--메인 뉴스 & 베너 E -->

		<!--메인 퀵메뉴 S -->
		<section id="main_quickmenu">
			<div class="inner">
				<div class="menu" id="quickmenu" data-type="quickmenu">
					<ul>
					<?php
					$quickMenuList = $main->getQuickLinkList($dbh);
					foreach($quickMenuList as $row) {
					?>
						<li class="item">
							<a href="<?php echo $row['linkUrl']?>">
								<img src="<?php echo $row['upFileName']?>">
								<p><?php echo $row['content']?></p>
							</a>
						</li>
					<?php
					}
					?>
						<li class="line"><span></span></li>
					</ul>
				</div>
				<div id="rankSp" data-type="keyword">
					<ul class="slider">
<?php
//for($x=0; $x<10; $x++){
$aKeywordList =  $main->getKeywordList($dbh);
$i =1;
foreach($aKeywordList as $row) {
?>
						<li class="">
							<span class="rank"><?php echo $i?>.</span>
							<span class="text"><?php echo $row['content']?></span>
							<span class="issue"><?php echo ($row['isNew']=='Y' ) ? 'new' : '' ;?> </span>
						</li>
<?
	$i++;
}
?>
					</ul>
					<div class="layer">
						<ul>
<?php
//for($x=0; $x<10; $x++){
	$i =1;
foreach($aKeywordList as $row) {
?>
							<li>
								<a href="<?php echo $row['linkUrl']?>">
									<span class="rank"><?php echo $i?>.</span>
									<span class="text"><?php echo $row['content']?></span>
									<span class="issue"><?php echo ($row['isNew']=='Y' ) ? 'new' : '' ;?> </span>
								</a>
							</li>
<?php
	$i++;
}
?>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!--메인 퀵메뉴 E -->

		<!--메인 섹션1 S -->
		<section id="main_section01" class="main-grid">
			<div class="inner">
				<div class="bx_news">
					<ul>
						<li class="grid-sizer"></li>

<?php
/**
* 메인 1:1 size 컨텐츠
* $main : class
* $idx : TB_MAIN_CONTENT 테이블 고유번호
* $md_hide = 'md_hide' 화면이 줄어들면 숨김 $md_hide = 'md_hide'
*/
function printContent1by1($dbh, $main, $idx, $md_hide=null) {
	$row = $main->getContentEdit($dbh, $idx);
	//md_hide

	if($row['contentType'] == 'spaceart1') {
		?>
						<li class="grid-item <?php echo $md_hide?>" data-type="<?php echo $row['contentType']?>" data-idx="<?php echo $idx?>">
							<div class="inner type_<?php echo $row['contentType']?> <?php echo ($row['colorType'] == 'W') ? 'white' : 'black' ; ?>">
								<a href="<?php echo $row['hyperLink']?>">
									<div class="img"><img src="<?php echo $row['upFileName']?>" alt="뉴스기사" class="h100p"></div>
									<div class="cover">
							        	<div class="standard">
											<div class="inner">
												<p class="logo"></p>
												<p class="Hashtag"><?php echo (!empty($row['hashtag']) ) ? str_replace(',', '#', $row['hashtag']) : '' ; ?></p>
											</div>
										</div>
							        	<div class="hover">
							        		<div class="inner">
							        			<p class="logo"></p>
												<p class="Hashtag"><?php echo (!empty($row['hashtag']) ) ? str_replace(',', '#', $row['hashtag']) : '' ; ?></p>
								        	</div>
							        	</div>
							      	</div>
								</a>
							</div>
						</li>
		<?php
	}
	else if($row['contentType'] == 'mediaart1') {

		$icon_img = 'ico_ma_premium.png';
		if ($row['iconType'] == 'Premium') {
			$icon_img = 'ico_ma_premium.png';
		} else if ($row['iconType'] == 'Customizing') {
			$icon_img = 'ico_ma_customizing.png';
		} else if ($row['iconType'] == 'Standard') {
			$icon_img = 'ico_ma_standard.png';
		} else if ($row['iconType'] == 'Press') {
			$icon_img = 'ico_ma_press.png';
		} else if ($row['iconType'] == 'Publication') {
			$icon_img = 'ico_ma_publication.png';
		}
		?>
						<li class="grid-item <?php echo $md_hide?>" data-type="<?php echo $row['contentType']?>" data-idx="<?php echo $idx?>">
							<div class="inner type_<?php echo $row['contentType']?>">
								<a href="<?php echo $row['hyperLink']?>">
									<div class="img"><img src="<?php echo $row['upFileName']?>" alt="뉴스기사" class="h100p"></div>
									<div class="cover">
										<div class="standard">
											<div class="inner">
												<p class="title"><?php echo $row['title']?></p>
											</div>
										</div>
										<div class="hover">
											<div class="inner">
												<p class="icon"><img src="/images/main_edit/<?php echo $icon_img?>"></p>
												<p class="spec"><?php echo $row['specInfo']?></p>
												<p class="price">￦ <?php echo number_format($row['price'], 0)?></p>
											</div>
										</div>
									</div>
								</a>
							</div>
						</li>
		<?php
	}
	else if($row['contentType'] == 'video') {
		?>

						<li class="grid-item <?php echo $md_hide?>"  data-type="<?php echo $row['contentType']?>" data-idx="<?php echo $idx?>">
							<div class="inner type_<?php echo $row['contentType']?>">
								<div class="img"><img src="<?php echo $row['upFileName']?>" alt="비디오" class="h100p"></div>
								<div class="cover">
						        	<div class="standard">
										<div class="inner">
											<p class="title"><?php echo $row['title']?></p>
										</div>
									</div>
						        	<div class="hover">
						        		<div class="inner">
							        		<p class="sub_title"><?php echo str_replace(' ', '<br/>', $row['subTitle'])?></p>
							        		<!-- <a href="#" class="play"><img src="images/main/btn_play.png" alt="play"></a> -->
							        		<a href="<?php echo $row['hyperLink']?>" class="more"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
							        	</div>
						        	</div>
						      	</div>
							</div>
						</li>
		<?php
	}
	else if($row['contentType'] == 'sns') {
		?>

						<li class="grid-item <?php echo $md_hide?>"  data-type="<?php echo $row['contentType']?>" data-idx="<?php echo $idx?>">
							<div class="inner type_<?php echo $row['contentType']?> <?php echo ($row['snsType']!='I') ? 'facebook' : 'instagram' ;?>">
								<a href="<?php echo $row['hyperLink']?>" target="_blank">
									<div class="img"><img src="<?php echo $row['upFileName']?>" alt="SNS" class="h100p"></div>
									<div class="cover">
							        	<div class="standard">
											<div class="inner">
												<p class="icon">icon</p>
									        	<p class="like">like</p>
											</div>
										</div>
							        	<div class="hover">
							        		<div class="inner">
								        		<div class="more"></div>
								        	</div>
							        	</div>
							      	</div>
						      	</a>
							</div>
						</li>
		<?php
	}
	else if($row['contentType'] == 'market') {
		$rowM = $main->getMarketEdit($dbh, $row['goods_idx']);
	?>
						<li class="grid-item <?php echo $md_hide?>" data-type="<?php echo $row['contentType']?>" data-idx="<?php echo $idx?>" data-goods_idx="<?php echo $row['goods_idx']?>">
							<div class="inner type_<?php echo $row['contentType']?>">
								<div class="img"><img src="<?php echo $row['upFileName']?>" alt="마켓" class="h100p"></div>
								<div class="cover">
									<div class="standard">
										<div class="inner">
											<p class="title"><span><?php echo $rowM['artist_name']?></span><?php echo $rowM['goods_name']?></p>
										</div>
									</div>
						        	<div class="hover">
						        		<div class="inner">
							        		<a href="#" onclick="goods='<?php echo $row['goods_idx']; ?>'; marketViewMotion(); return false;" class="more"><img src="/images/btn/btn_more3.png" alt="더보기"></a>
								        	<p class="title"><?php echo $rowM['goods_name']?></p>
								        	<p class="artist"><?php echo $rowM['artist_name']?> / <?php echo $rowM['goods_make_year']?></p>
								        	<p class="spec"><?php echo $rowM['goods_make_type']?></p>
								         	<p class="spec"><?php echo LIB_LIB::getGoodsSize($rowM['goods_depth'], $rowM['goods_width'], $rowM['goods_height'])?></p>
							        	</div>
						        	</div>
						      	</div>
							</div>
						</li>
		<?php
	}
	else if($row['contentType'] == 'galleries') {
		$rowM = $main->getGalleriesEdit($dbh, $row['exhibitionIdx']);
	?>
						<li class="grid-item <?php echo $md_hide?>" data-type="<?php echo $row['contentType']?>" data-idx="<?php echo $idx?>" data-exhidx="<?php echo $row['exhibitionIdx']?>">
							<div class="inner type_galleries white">
								<a href="/galleries/exhibitions/?at=read&idx=<?php echo $rowM['galleryIdx']?>&eidx=<?php echo $rowM['exhibitionIdx']?>">
									<div class="img"><img src="<?php echo $row['upFileName']?>" alt="갤러리" class="h100p"></div>
									<div class="cover">
							        	<div class="standard">
											<div class="inner">
												<p class="gallery"><?php echo $rowM['galleryNameEn']?></p>
												<p class="exhibition"><?php echo $rowM['exhibitionTitle']?></p>
												<p class="date"><?php echo $rowM['beginDate']?> ~ <?php echo $rowM['endDate']?></p>
											</div>
										</div>
							        	<div class="hover">
							        		<div class="inner">
								        		<div class="more"></div>
								        	</div>
							        	</div>
							      	</div>
						      	</a>
							</div>
						</li>
		<?php
	}
	else {
	?>
						<li class="grid-item <?php echo $md_hide?>" data-type="<?php echo $row['contentType']?>" data-idx="<?php echo $idx?>" data-goods_idx="<?php echo $row['goods_idx']?>">
							<div class="inner type_market">
								<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
								<div class="cover">
						        	<div class="standard">
										<div class="inner">
											<p class="title"><span>작품없음</span>작품을 선택해주세요.</p>
										</div>
									</div>
						        	<div class="hover">
						        		<div class="inner">
							        		<a href="#" class="more"><img src="/images/btn/btn_more3.png" alt="더보기"></a>
								        	<p class="title">작품없음</p>
								        	<p class="artist">작품없음 / 2016</p>
								        	<p class="spec">Acrylic on canvas</p>
								         	<p class="spec">90.9x72.7cm</p>
							        	</div>
						        	</div>
						      	</div>
							</div>
						</li>
	<?php
	}
}


//2*2
function printContent2by2($dbh, $main, $idx, $stamp=null) {

	$row = $main->getContentEdit($dbh, $idx);

	if($row['contentType'] == 'video') {
		?>
						<li class="grid-item w2 h2 <?php echo $stamp?>" data-type="<?php echo $row['contentType']?>" data-idx="<?php echo $idx?>">
							<div class="inner type_video">
								<div class="img"><img src="<?php echo $row['upFileName']?>" alt="비디오" class="h100p"></div>
								<div class="cover">
						        	<div class="standard">
										<div class="inner">
											<p class="title"><?php echo $row['title']?></p>
										</div>
									</div>
						        	<div class="hover">
						        		<div class="inner">
							        		<p class="sub_title"><?php echo str_replace(' ', '<br/>', $row['subTitle'])?></p>
							        		<!-- <a href="#" class="play"><img src="images/main/btn_play.png" alt="play"></a> -->
							        		<a href="<?php echo $row['hyperLink']?>" class="more"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
							        	</div>
						        	</div>
						      	</div>
							</div>
						</li>

		<?php
	}
	else if($row['contentType'] == 'market') {
		$rowM = $main->getMarketEdit($dbh, $row['goods_idx']);
	?>
						<li class="grid-item w2 h2 <?php echo $stamp?>" data-type="<?php echo $row['contentType']?>" data-idx="<?php echo $idx?>" data-goods_idx="<?php echo $row['goods_idx']?>">
							<div class="inner type_<?php echo $row['contentType']?> <?php echo ($row['positionType']=='R')? 'right' : 'left' ; ?>">
								<!-- <a href="#"> -->
								<a href="#" onclick="goods='<?php echo $row['goods_idx']; ?>'; marketViewMotion(); return false;">
									<div class="img"><img src="<?php echo $row['upFileName']?>" alt="마켓" class="h100p"></div>
									<div class="cover <?php echo ($row['colorType']=='B')? 'black' : 'white' ; ?>">
										<div class="inner">
											<p class="artist"><?php echo $rowM['artist_name']?></p>
											<p class="title"><?php echo $rowM['goods_name']?></p>
											<p class="spec"><?php echo $rowM['goods_make_year']?>, <?php echo $rowM['goods_make_type']?>, <?php echo LIB_LIB::getGoodsSize($rowM['goods_depth'], $rowM['goods_width'], $rowM['goods_height'])?></p>
										</div>
									</div>
								</a>
							</div>
						</li>

		<?php
	}
	else {
	?>
						<li class="grid-item w2 h2 <?php echo $stamp?>" data-type="market" data-idx="<?php echo $idx?>" data-goods_idx="<?php echo $row['goods_idx']?>">
							<div class="inner type_market right">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img2.jpg" alt="뉴스기사" class="h100p"></div>
									<div class="cover">
										<div class="inner">
											<p class="artist">작가명</p>
											<p class="title">작품을 선택하세요</p>
											<p class="spec">0000, Mixed media, size</p>
										</div>
									</div>
								</a>
							</div>
						</li>
	<?php
	}
}


//1*2
function printContent1by2($dbh, $main, $idx) {

	$row = $main->getContentEdit($dbh, $idx);

	if($row['contentType'] == 'video') {
		?>
						<li class="grid-item w2" data-type="<?php echo $row['contentType']?>" data-idx="<?php echo $idx?>">
							<div class="inner type_video">
								<a href="<?php echo $row['hyperLink']?>">
									<div class="img"><img src="<?php echo $row['upFileName']?>" alt="비디오" class="h100p"></div>
									<div class="cover">
							        	<div class="standard">
											<div class="inner">
												<p class="title"><?php echo $row['title']?></p>
											</div>
										</div>
							        	<div class="hover">
							        		<div class="inner">
								        		<p class="sub_title"><?php echo str_replace(' ', '<br/>', $row['subTitle'])?></p>
								        		<!-- <a href="#" class="play"><img src="images/main/btn_play.png" alt="play"></a> -->
								        		<div class="more"><img src="images/main/btn_share.png" alt="자세히 보기"></div>
								        	</div>
							        	</div>
							      	</div>
							     </a>
							</div>
						</li>
		<?php
	}
	else if($row['contentType'] == 'sns') {
	?>
						<li class="grid-item w2" data-type="<?php echo $row['contentType']?>" data-idx="<?php echo $idx?>">
							<div class="inner type_<?php echo $row['contentType']?> <?php echo ($row['snsType']!='I') ? 'facebook' : 'instagram' ;?>">
								<a href="<?php echo $row['hyperLink']?>" target="_blank">
									<div class="img"><img src="<?php echo $row['upFileName']?>" alt="sns" class="h100p"></div>
									<div class="cover">
							        	<div class="standard">
											<div class="inner">
												<p class="icon">icon</p>
									        	<p class="like">like</p>
											</div>
										</div>
							        	<div class="hover">
							        		<div class="inner">
								        		<div class="more"></div>
								        	</div>
							        	</div>
							      	</div>
						      	</a>
							</div>
						</li>
		<?php
	}
	else {
	?>
						<li class="grid-item w2" data-type="video" data-idx="<?php echo $idx?>" >
							<div class="inner type_video">
								<a href="/art1/artist_rec.php?idx=21" class="more"><img src="images/main/btn_share.png" alt="자세히 보기">
									<div class="img"><img src="/images/main/main_temp_img3.jpg" alt="비디오" class="h100p"></div>
									<div class="cover">
							        	<div class="standard">
											<div class="inner">
												<p class="title">내용을 입력하세요.</p>
											</div>
										</div>
							        	<div class="hover">
							        		<div class="inner">
								        		<p class="sub_title">ARTIST<br/> REC#21</p>
								        		<!-- <a href="#" class="play"><img src="images/main/btn_play.png" alt="play"></a> -->
								        		<div class="more"><img src="images/main/btn_share.png"></div>
								        	</div>
							        	</div>
							      	</div>
						      	</a>
							</div>
						</li>
	<?php
	}
}
?>

<?php
printContent1by1($dbh, $main, 1, null);
printContent1by1($dbh, $main, 2, null);
printContent1by1($dbh, $main, 3, 'md_hide');
printContent1by1($dbh, $main, 4, null);
printContent1by1($dbh, $main, 5, 'md_hide');
?>
						<li class="grid-item" data-type="link">
							<div class="inner type_link">
								<a href="http://swindow.naver.com/art/store/1000016984" target="_blank">
									<div class="bx_link">
										<div class="inner" style="background-color: #fff;border-color:#23b400">
											<dl>
												<dt>
													<div class="bx_tit">
														<h2 style="color:#23b400;">네이버 아트윈도 <br/>바로가기</h2>
														<div class="line" style="background-color:#23b400;"></div>
													</div>
												</dt>
												<dd>
													<p style="color:#999;">naver artwindow <br/>view all.</p>
												</dd>
											</dl>
										</div>
									</div>
								</a>
							</div>
						</li>
<?php
printContent2by2($dbh, $main, 6, 'stamp');
printContent1by2($dbh, $main, 7);
printContent1by1($dbh, $main, 8,'md_hide');
printContent1by1($dbh, $main, 9, null);
?>
						<li class="grid-item" data-type="link">
							<div class="inner type_link">
								<a href="/art1/artist_rec.php">
									<div class="bx_link">
										<div class="inner" style="background-color: #092357;border-color:#092357">
											<dl>
												<dt>
													<div class="bx_tit">
														<h2 style="color:#fff;">작가 인터뷰 영상 <br/>바로가기</h2>
														<div class="line" style="background-color:#fff;"></div>
													</div>
												</dt>
												<dd>
													<p style="color:#b5bdcc;">art1 artist rec <br/>view all.</p>
												</dd>
											</dl>
										</div>
									</div>
								</a>
							</div>
						</li>

					</ul>
				</div>

				<div class="bot_banner" data-type="banner" data-idx="6" >
					<?php
					//메인 바 베너2 S
					$list = null;
					$row = null;
					$idx = 6;
					$row = $main->getBanner($dbh, $idx);

					if($row['isDisplay'] == 'Y' && !empty($row['bannerUpFileName']) ) {
					?>
						<div class="inner type_banner">
							<a href="<?php echo $row['linkUrl']; ?>" target="_blank">
								<img src="<?php echo $row['bannerUpFileName']; ?>" class="pc" alt="" />
								<img src="<?php echo $row['bannerUpFileNameMobile']; ?>" class="mobile" alt="" />
							</a>
						</div>
					<?php
					} else {
						if ( AES256::dec($_SESSION['user_level_code'], AES_KEY) >= '99') {
						?>
							<div class="inner type_banner">
									배너영역입니다.<br><br>
									노출 될 베너가 없습니다.<br><br>
							</div>
						<?php
						}
					}
					//메인 바 베너2 E
					?>
				</div>
			</div>
		</section>
		<!--메인 섹션1 E -->

		<!--메인 섹션2 S -->
		<section id="main_section02" class="main-grid">
			<div class="inner">
				<div class="bx_news">
					<ul>
						<li class="grid-sizer"></li>
<?php
printContent2by2($dbh, $main, 10);
printContent1by1($dbh, $main, 11, null);
?>
						<li class="grid-item" data-type="link">
							<div class="inner type_link">
								<a href="/member/login.php">
									<div class="bx_link">
										<div class="inner" style="background-color: #fff;border-color:#ec0044">
											<dl>
												<dt>
													<div class="bx_tit">
														<h2 style="color:#ec0044;">아트1 로그인 <br/>바로가기</h2>
														<div class="line" style="background-color:#ec0044;"></div>
													</div>
												</dt>
												<dd>
													<p style="color:#999;">art1 membership <br/>join us.</p>
												</dd>
											</dl>
										</div>
									</div>
								</a>
							</div>
						</li>
<?php
printContent1by1($dbh, $main, 12, 'md_hide');
printContent1by1($dbh, $main, 13, null);
printContent1by1($dbh, $main, 14, null);
printContent1by1($dbh, $main, 15, 'md_hide');
printContent1by1($dbh, $main, 16, 'md_hide');
?>
						<li class="grid-item" data-type="link">
							<div class="inner type_link">
								<a href="/bbs/?at=list">
									<div class="bx_link">
										<div class="inner" style="background-color: #ad5961;border-color:#ad5961">
											<dl>
												<dt>
													<div class="bx_tit">
														<h2 style="color:#fff;">아트1 게시판 <br/>바로가기</h2>
														<div class="line" style="background-color:#fff;"></div>
													</div>
												</dt>
												<dd>
													<p style="color:#eacdcf;">art1 community <br/>view all.</p>
												</dd>
											</dl>
										</div>
									</div>
								</a>
							</div>
						</li>
<?php
printContent1by1($dbh, $main, 19, null);
printContent1by2($dbh, $main, 20);
?>
					</ul>
				</div>

				<div class="bot_banner" data-type="banner" data-idx="7" >
					<?php
					//메인 바 베너2 S
					$list = null;
					$row = null;
					$idx = 7;
					$row = $main->getBanner($dbh, $idx);

					if($row['isDisplay'] == 'Y' && !empty($row['bannerUpFileName']) ) {
					?>
						<div class="inner type_banner">
							<a href="<?php echo $row['linkUrl']; ?>" target="_blank">
								<img src="<?php echo $row['bannerUpFileName']; ?>" class="pc" alt="" />
								<img src="<?php echo $row['bannerUpFileNameMobile']; ?>" class="mobile" alt="" />
							</a>
						</div>
					<?php
					} else {
						if ( AES256::dec($_SESSION['user_level_code'], AES_KEY) >= '99') {
						?>
							<div class="inner type_banner">
									배너영역입니다.<br><br>
									노출 될 베너가 없습니다.<br><br>
							</div>
						<?php
						}
					}
					//메인 바 베너2 E
					?>
				</div>
				<!-- <div class="bot_banner" data-type="banner">
					<div class="inner type_banner">
						<a href="http://www.lofficielhommes.co.kr/" target="_blank">
							<img src="/images/main/main_temp_banner2.jpg" class="pc" alt="">
							<img src="/images/main/main_temp_banner2.jpg" class="mobile" alt="">
						</a>
					</div>
				</div> -->
			</div>
		</section>
		<!--메인 섹션2 E -->

		<!--메인 섹션3 S -->
		<section id="main_section03" class="main-grid">
			<div class="inner">
				<div class="bx_news">
					<ul>
						<li class="grid-sizer"></li>
<?php
printContent1by1($dbh, $main, 21, 'md_hide');
printContent1by1($dbh, $main, 22, null);
printContent1by1($dbh, $main, 23, null);
printContent1by1($dbh, $main, 24, 'md_hide');
?>
						<li class="grid-item" data-type="link">
							<div class="inner type_link">
								<a href="/galleries/join_info.php/">
									<div class="bx_link">
										<div class="inner" style="background-color: #fff;border-color:#333">
											<dl>
												<dt>
													<div class="bx_tit">
														<h2 style="color:#333;">갤러리즈 입점 <br/>바로가기</h2>
														<div class="line" style="background-color:#333;"></div>
													</div>
												</dt>
												<dd>
													<p style="color:#999;">galleries <br/>Join us.</p>
												</dd>
											</dl>
										</div>
									</div>
								</a>
							</div>
						</li>
<?php
printContent1by1($dbh, $main, 25, null);
printContent2by2($dbh, $main, 26, 'stamp');
printContent1by2($dbh, $main, 27);
printContent1by1($dbh, $main, 28);
?>
						<li class="grid-item" data-type="link">
							<div class="inner type_link">
								<a href="http://www.spaceart1.com/" target="_blank">
									<div class="bx_link">
										<div class="inner" style="background-color: #1a1a1a;border-color:#1a1a1a">
											<dl>
												<dt>
													<div class="bx_tit">
														<h2 style="color:#fff;">스페이스 아트1 <br/>바로가기</h2>
														<div class="line" style="background-color:#fff;"></div>
													</div>
												</dt>
												<dd>
													<p style="color:#b5bdcc;">space art1 <br/>view all.</p>
												</dd>
											</dl>
										</div>
									</div>
								</a>
							</div>
						</li>
<?php
printContent1by1($dbh, $main, 29, 'md_hide');
?>
					</ul>
				</div>
				<div class="bot_banner" data-type="banner" data-idx="8" >
					<?php
					//메인 바 베너4 S
					$list = null;
					$row = null;
					$idx = 8;
					$row = $main->getBanner($dbh, $idx);

					if($row['isDisplay'] == 'Y' && !empty($row['bannerUpFileName']) ) {
					?>
						<div class="inner type_banner">
							<a href="<?php echo $row['linkUrl']; ?>" target="_blank">
								<img src="<?php echo $row['bannerUpFileName']; ?>" class="pc" alt="" />
								<img src="<?php echo $row['bannerUpFileNameMobile']; ?>" class="mobile" alt="" />
							</a>
						</div>
					<?php
					} else {
						if ( AES256::dec($_SESSION['user_level_code'], AES_KEY) >= '99') {
						?>
							<div class="inner type_banner">
									배너영역입니다.<br><br>
									노출 될 베너가 없습니다.<br><br>
							</div>
						<?php
						}
					}
					//메인 바 베너4 E
					?>
				</div>
				<!-- <div class="bot_banner" data-type="banner">
					<div class="inner type_banner">
						<a href="http://www.lofficielhommes.co.kr/" target="_blank">
							<img src="/images/main/main_temp_banner3.jpg" class="pc" alt="">
							<img src="/images/main/main_temp_banner3.jpg" class="mobile" alt="">
						</a>
					</div>
				</div> -->
			</div>
		</section>
		<!--메인 섹션3 E -->

		<script type="text/javascript">

			var newsAni = {
				flag : true,
				swipe : function(){
					var bx = $("#NewsV2 .w2 > .inner");
					if($("#news_sect_slide1 .swiper-slide").length <= 1){
						bx.find(".img.slide > li").css("visibility","visible");
					}else{
						var newsSp = new Swiper("#news_sect_slide1", {
							cssWidthAndHeight : 'height',
							loop : true,
							noSwiping : true,
							speed : 500,
							autoplay : 3000,
							pagination : "#news_sect_slide1 .pagination",
							paginationClickable : true,
							onSlideChangeStart : function(){
								idx = (newsSp.activeLoopIndex);
								newsAni.fade(idx);
							}
						});
						var nowIdx = newsSp.activeLoopIndex;

						bx.find(".img.slide > li").eq(nowIdx).addClass('on').css({opacity:1}).siblings().css({opacity:0});
						var len = $("#news_sect_slide1 .swiper-slide").not(".swiper-slide-duplicate").length;

						bx.mouseenter(function(){newsSp.stopAutoplay();})
						bx.mouseleave(function(){newsSp.startAutoplay();})
						bx.swipe({
							swipeLeft:function(event, direction, distance, duration, fingerCount) {
								if(newsAni.flag){
									newsAni.flag = false;
									newsSp.stopAutoplay();
									newsSp.swipeNext();
								}
							},swipeRight : function(event, direction, distance, duration, fingerCount){
								if(newsAni.flag){
									newsAni.flag = false;
									newsSp.stopAutoplay();
									newsSp.swipePrev();
								}
							}
						});
					}
				},
				fade : function(idx){
					var bx = $("#NewsV2 .w2 > .inner .img.slide");
					var li = bx.find(" > li");
					var liOn = li.filter(function(){return $(this).hasClass("on");});
					liOn.stop().animate({opacity:0}, 400, 'linear' , function(){
						liOn.removeClass('on');
						li.eq(idx).addClass('on').delay(100).animate({opacity:1}, 400, 'linear' ,function(){
							newsAni.flag = true;
						});
					})
				},
				hoverMotion : function(t){
					var el = $(t);

					el.each(function() {
						var tl = new TimelineMax();
						$(this).find('.standard').css({visibility: 'visible'});
						$(this).find('.hover').css({visibility: 'visible'});

						if($(this).hasClass('type_market')){
							tl.pause()
								.to($(this).find('.img'),0.5,{scale: 1.1})
								.fromTo($(this).find('.standard'),0.5,{alpha: 1},{alpha: 0},'-=0.5')
								.fromTo($(this).find('.hover'),0.5,{alpha: 0},{alpha: 1},'-=0.5');
						}else if($(this).hasClass('type_galleries')){
							tl.pause()
								.to($(this).find('.img'),0.5,{scale: 1.1})
								.fromTo($(this).find('.standard'),0.3,{alpha: 1},{alpha: 0, y: 100+'%', visible: 'hidden'},'-=0.5')
								.fromTo($(this).find('.hover'),0.5,{alpha: 0},{alpha: 1},'-=0.5');
						}else if($(this).hasClass('type_mediaart1')){
							tl.pause()
								.to($(this).find('.img'),0.5,{scale: 1.1})
								.fromTo($(this).find('.standard'),0.3,{alpha: 1},{alpha: 0},'-=0.5')
								.fromTo($(this).find('.hover'),0.5,{alpha: 0},{alpha: 1},'-=0.5');
						}else if($(this).hasClass('type_sns')){
							tl.pause()
								.to($(this).find('.img'),0.5,{scale: 1.1})
								.fromTo($(this).find('.icon'),0.3,{y: 0},{y: -60},'-=0.5')
								.fromTo($(this).find('.like'),0.3,{y: 0},{y: 60},'-=0.5')
								.fromTo($(this).find('.hover'),0.5,{alpha: 0},{alpha: 1},'-=0.5');
						}else if($(this).hasClass('type_video')){
							tl.pause()
								.fromTo($(this),0.5,{borderTopLeftRadius: 0},{borderTopLeftRadius: 35})
								.fromTo($(this).find('.img>img'),0.5,{borderTopLeftRadius: 0},{borderTopLeftRadius: 35},'-=0.5')
								.fromTo($(this).find('.standard'),0.3,{alpha: 1},{alpha: 0},'-=0.5')
								.fromTo($(this).find('.title'),0.3,{y: 0},{y: -50},'-=0.5')
								.fromTo($(this).find('.hover'),0.5,{alpha: 0},{alpha: 1},'-=0.5')
								.fromTo($(this).find('.sub_title'),0.3,{y: -70},{y: 0},'-=0.5');
						}else if($(this).hasClass('type_spaceart1')){
							tl.pause()
								.to($(this).find('.img'),0.5,{scale: 1.1})
								.fromTo($(this).find('.standard'),0.5,{alpha: 1, y: 0},{alpha: 0, y: -100+'%'},'-=0.5')
								.fromTo($(this).find('.hover'),0.3,{alpha: 0,y: 100+'%'},{alpha: 1,y: 0+'%'},'-=0.5');
						}

						$(this).hover(
							function() {
						    	tl.play();
						  	}, function() {
						  		tl.reverse();
						  	}
						);
					});
				}
			}

			newsAni.swipe();
			newsAni.hoverMotion('.grid-item > .inner');
			//iCutterOwen(["#NewsV2 .bx_news > ul > li.w2 ul.img.slide > li", "#NewsV2 .bx_news > ul > li:not(.w2) .img", ".main-grid .bx_news .img"]);

			function setNewsTime(){
				var ww = WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
				if(ww < 1550)return;
				var t = $("#news_timer");
				var date = new Date();
				var week = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
				var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
				var hour = date.getHours();
				var min = date.getMinutes();
				var now = {
					year : date.getFullYear(),
					hour : hour === 12 ? 12 : date.getHours()%12,
					min : min < 10 ? "0"+min : min,
					ampm : Math.floor(date.getHours()/12) ? "PM" : "AM",
					month : (date.getMonth()+1)<10 ? '0'+(date.getMonth()+1) : (date.getMonth()+1),
					date : (date.getDate())<10 ? '0'+(date.getDate()) : (date.getDate()),
					week : week[date.getDay()]
				}
				t.find('h2 > .hour').html(now.hour+":");
				t.find('h2 > .min').html(now.min);
				//t.find('h2 > small').html(" "+now.ampm);
				//t.find('h3').html(now.week+". "+now.month+" "+now.date);
				t.find('h3').html(now.year+". "+now.month+". "+now.date+" "+now.week);
				//console.log(date.getWeek());
			}

			setInterval(setNewsTime,1000);

			function moveNewsList(dire){
				var box = $("#NewsV2 .bx_bbs_list .list > ul");
				var unit = box.find(">li");
				var now = box.find(" >li.show");
				var next = unit.eq((unit.length+now.index()+dire)%unit.length);
				box.animate({'margin-top':-(Math.floor(next.position().top - parseInt(box.css('margin-top'))))}, 400, 'easeInOutQuad');
				next.siblings('.show').removeClass('show').end().addClass('show');
			}

			$('.main-grid .bx_news > ul').isotope({
				itemSelector: '.grid-item',
				percentPosition: true,
				stamp: '.stamp',
				masonry: {
					columnWidth: '.grid-sizer'
				}
			});

			$('#rankSp .slider').bxSlider({
				mode: 'vertical',
				auto: true,
				pause: 3000,
				pager: false,
				controls: false
			});

			$("#main_quickmenu .menu > ul > li.item").on("mouseover",function() {
				var idx = $("#main_quickmenu .menu > ul > li.item").index($(this));
				var pos = $("#main_quickmenu .menu > ul > li.line").outerWidth()*idx;
				TweenMax.to($("#main_quickmenu .menu > ul > li.line"),0.5,{left:pos, ease: Power1.easeInOut});
			});

			$(".bx_slide > ul > li h3:not(.video_tit), .bx_slide > ul > li p, .bx_news dl.con h3:not(.video_tit), .bx_news dl.con p").dotdotdot();
			$("h3.video_tit").dotdotdot({ after: ".ico_video" });
			setTimeout(function(){ $("h3.video_tit").dotdotdot({ after: ".ico_video" }); }, 1000);

			$(window).resize(function() {

			});

			<?php
			if ( AES256::dec($_SESSION['user_level_code'], AES_KEY) >= '99') {
			?>
			//if(getUrlParameter("mode") == "admin") {

				var mainEdit = {
					data : {idx:'',type:'',size:'w1h1'},
					init : function(){
						$(".bx_news > ul > li").each(function(i) {
							var _id = "s"+$(".main-grid").index($(this).closest(".main-grid"))+"_i"+$(this).parent().find("li").index($(this));
							if(!$(this).hasClass("grid-sizer")) $(this).attr("id", _id)
						});

						$(".bot_banner").each(function(i) {
							var _id = "s"+$(".main-grid").index($(this).closest(".main-grid"))+"_b"+(i+1);
							$(this).attr("id", _id)
						});

						$(".bx_news > ul > li > .inner:not(.type_headline,.type_news), .bot_banner > .inner, #main_quickmenu .menu, #main_quickmenu #rankSp").each(function(i) {
							var _id = $(this).parent().attr("id");

							if(!$(this).hasClass("type_time") && !$(this).hasClass("type_newslist") && !$(this).hasClass("type_link")){
								$(this).append('<div class="admin_util"></div>');
								if($(this).hasClass("type_spaceart1")
									||$(this).hasClass("type_market")
									||$(this).hasClass("type_galleries")
									||$(this).hasClass("type_video")
									||$(this).hasClass("type_sns")
									||$(this).hasClass("type_mediaart1")) {
									$(this).find('.admin_util').append('<button class="btn_pack1 small" onclick="mainEdit.show(this, 1);">작성</button>');
								}
								$(this).find('.admin_util').append('<button class="btn_pack1 small" onclick="mainEdit.show(this);">수정</button>');
							}
						});
					},
					show : function(t,n){
						mainEdit.data = {};
						var target = $(t).closest(".grid-item");
						if($(t).closest(".bot_banner").length > 0)  target = $(t).closest(".bot_banner");
						if($(t).closest("#quickmenu").length > 0)  target = $(t).closest("#quickmenu");
						if($(t).closest("#rankSp").length > 0)  target = $(t).closest("#rankSp");

						mainEdit.data['id'] = target.attr("id");
						mainEdit.data['type'] = target.data("type");
						mainEdit.data['idx'] = target.data("idx");
						mainEdit.data['goods_idx'] = target.data("goods_idx");
						mainEdit.data['exhidx'] = target.data("exhidx");

						if(target.hasClass('w2')){
							mainEdit.data['size'] = 'w2h1';
							if(target.hasClass('h2')) mainEdit.data['size'] = 'w2h2';
						}else{
							mainEdit.data['size'] = 'w1h1';
						}
						//console.log('id : '+mainEdit.data['id']);
						//console.log('idx : '+mainEdit.data['idx']);
						//console.log('type : '+mainEdit.data['type']);
						//console.log('size : '+mainEdit.data['size']);
						var url = "/main_edit/__ajax_pop_"+mainEdit.data['type']+".php";
						//if (mainEdit.data['type'] == "banner") var url = "/main_edit/"+mainEdit.data['type']+"/";
						if (n) {
							url = "/main_edit/pop_type/";
							modalFn.show(url, {data:{id:mainEdit.data['id'],idx:mainEdit.data['idx'], type:mainEdit.data['type'], size:mainEdit.data['size']}});
						}
						else if (mainEdit.data['type'] == "market" ) {
							var url = "/main_edit/"+mainEdit.data['type']+"_search/";
							modalFn.show(url, {data:{at:'write', goods_idx:mainEdit.data['goods_idx'],id:mainEdit.data['id'],idx:mainEdit.data['idx'], type:mainEdit.data['type'], size:mainEdit.data['size']}});
						}
						else if (mainEdit.data['type'] == "galleries" ) {
							var url = "/main_edit/"+mainEdit.data['type']+"_search/";
							modalFn.show(url, {data:{at:'write', exhidx:mainEdit.data['exhidx'],id:mainEdit.data['id'],idx:mainEdit.data['idx'], type:mainEdit.data['type'], size:mainEdit.data['size']}});
						}
						else {
							var url = "/main_edit/"+mainEdit.data['type']+"/";
							modalFn.show(url, {data:{id:mainEdit.data['id'],idx:mainEdit.data['idx'], type:mainEdit.data['type'], size:mainEdit.data['size']}});
						}

					},
					next : function(type){
						mainEdit.data['type'] = type;
						//var url = "/main_edit/__ajax_pop_"+mainEdit.data['type']+".php";
						var url = "/main_edit/"+mainEdit.data['type']+"/";
						modalFn.change(url, $('#pop_edit'), mainEdit.data, 'next');
					},
					search : function(t,type,url){
						if(url == undefined){
							if($(t).find('#searchTxt').val() == ''){
								alert("검색어를 입력하세요!");
								$(t).find('#searchTxt').focus();
								return false;
							}
							var word = $(t).find('#searchTxt').val();
							//url = "/main_edit/__ajax_result_"+type+".php?word="+word
							url = "/main_edit/"+type+"_search/?at=alist&word="+word
						}

						var resultArea = $(t).closest('.modal_content').find('.result_area');

						$.ajax({
					        url : url,
					        type : "get",
					        dataType : "html",
					        success : function(data){
					        	resultArea.html(data);
					        	modalFn.resize($('#pop_edit'));
					        	resultArea.find('.pagination a').on('click',function(e) {
					        		e.preventDefault();
					        		var pageUrl = $(this).attr('href');
					        		mainEdit.search(t,type,pageUrl);
					        	});
					        },
					        error : function(a,b,c){
					            alert(b);
					        }
					    });
					},
					readFileOn : function(t) {
						$(t).parent().find('.file').trigger('click');
					},
			        readFileURL : function(input, section){
			            var isIE = (navigator.appName=="Microsoft Internet Explorer");
			            var path = input.value;
			            var ext = path.substring(path.lastIndexOf('.') + 1).toLowerCase();
			            if(path == ""){
							alert();
							$(input).val('');
			                $('#imgArea_' + section).html('');
			                $(window).resize();
			                $('.previewImg').html('');
			               return;
			            }
			            if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			                alert('gif,png,jpg,jpeg 파일만 업로드 할수 있습니다.');
			                $(input).val('');
							 $('#imgArea_' + section).html('');
			                 $(window).resize();
			                return;
			            }

			            if(isIE) {
			                var img = '<img src="'+path+'" class="img"/>'
			                $('#imgArea_' + section).html(img);
			                $(window).resize();
			                $('.previewImg').html('<img src="'+path+'">');
			                iCutterOwen([".previewImg"]);
			            }else{
			                 if (input.files && input.files[0]) {
			                    var reader = new FileReader(); //파일을 읽기 위한 FileReader객체 생성
			                    reader.onload = function (e) {
			                        //파일 읽어들이기를 성공했을때 호출되는 이벤트 핸들러
			                        var img = '<img src="'+e.target.result+'" class="img"/>'
			                        $('#imgArea_' + section).html(img);
			                        //이미지 Tag의 SRC속성에 읽어들인 File내용을 지정
			                        //(아래 코드에서 읽어들인 dataURL형식)
			                        $(window).resize();
			                        $('.previewImg').html('<img src="'+e.target.result+'">');
			                        iCutterOwen([".previewImg"]);
			                    }
			                    reader.readAsDataURL(input.files[0]);
			                    //File내용을 읽어 dataURL형식의 문자열로 저장
			                 }
			            }

			        },
			        setPreview: function(){
						var t = $('.preview_area');
						t.find("[data-name]").each(function() {
							var type = $(this).data('type'),
								  name = $(this).data('name');
							switch(type) {
							    case 'text':
							       if(mainEdit.data[name] != undefined) $(this).text(mainEdit.data[name])
							        break;
							    case 'image':
							    	if(mainEdit.data[name] != undefined) $(this).html('<img src="'+mainEdit.data[name]+'">')
							        break;
								case 'icon':
							    	if(mainEdit.data[name] != undefined) $(this).html('<img src="'+mainEdit.data[name]+'">')
							        break;
							    case 'link':
							        if(mainEdit.data[name] != undefined) $(this).attr('href', mainEdit.data[name])
							        break;
							    case 'price':
							        if(mainEdit.data[name] != undefined){
							        	$(this).text(priceCommas(mainEdit.data[name]));
							        }
							        break;
							    case 'classtype':
							    	if(mainEdit.data[name] != undefined){
							    		$(this).removeClass($(this).data('class')).addClass(mainEdit.data[name])
							    	}
							        break;
							}
						})
					},
			        editChangeData: function(){
						var t = $('.edit_area').find('input');
						t.change(function() {
							var _key = $(this).attr('name'),
								_val = $(this).val();

							 var icon = $(this).data("icon");
							 if (icon != undefined) {
								_val = icon;
							 }
							mainEdit.data[_key] = _val;
							mainEdit.setPreview();
						});
					},
					editSave : function(){
						console.log(mainEdit.data);
						var t = $('.edit_area').find('input'), chkVal = true;
						t.each(function() {
							var _key = $(this).attr('name'),
								_val = $(this).val();
							if(_val == ""){
								if($(this).attr('type') == 'radio'){
									alert("선택해 주세요!");
								}else if($(this).attr('type') == 'file'){
									alert("이미지를 등록해주세요!");
								}else{
									alert("내용을 입력헤주세요!");
								}
								$(this).focus();
								return chkVal = false;
							}
							mainEdit.data[_key] = _val;
						});

						if(chkVal){
							console.log(mainEdit.data);
							alert("저장되었습니다.");
							//modalFn.hide($('#pop_edit'));
						}
					}
				}
				mainEdit.init();

			//}
			<?php
			} // if (AES256::dec($_SESSION['user_level_code'], AES_KEY) >= '99')
			?>

		</script>


    </div><!-- //container_inner -->
  </section><!-- //container_main -->

<? include "inc/footer.php"; ?>
<? include "inc/bot.php"; ?>