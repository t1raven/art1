
<? include "inc/config.php"; ?>
<?php
  require ROOT.'lib/class/banner/banner.class'.SOURCE_EXT;

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
						<li class="w2 grid-item">
							<div class="inner">
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
						<li class="grid-item">
							<div class="inner">
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
						<li class="grid-item">
							<div class="inner">
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

						<li class="md_hide grid-item">
							<div class="inner">
								<div class="bx_logo">
									<div class="inner2">
										<div id="news_timer" class="bx_time">
											<h2><span>&nbsp;</span><small>&nbsp;</small></h2>
											<h3>&nbsp;</h3>
										</div>
										<div class="logos">
											<a href="/art1/quick_space_art1.php" target="_blank"><img src="/images/main/logo_space_art1.png" alt="space_art1" /></a>
											<a href="/art1/quick_media_art1.php" target="_blank"><img src="/images/main/logo_media_art1.png" alt="media_art1" /></a>
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
						<li class="md_hide grid-item">
							<div class="inner card_news">
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
						<li class="grid-item">
							<div class="inner">
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
						<li class="grid-item">
							<div class="inner">
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
						<li class="w2 board grid-item">
							<div class="inner">
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

				<div class="bot_banner">
					<?php
					   //메인 베너 S
					  $list = null;
					  $row = null;
					  $banner->setAttr('section', 1);
					  $list = $banner->getListBanner($dbh);
					  $i=1;
					  foreach($list as $row){
							if($row['isDisplay'] == 'Y')
							{
					?>
						<div class="inner">
							<a href="<?php echo $row['linkUrl']; ?>" target="_blank">
								<img src="<?php echo $row['bannerUpFileName']; ?>" class="pc" alt="" />
								<img src="<?php echo $row['bannerUpFileNameMobile']; ?>" class="mobile" alt="" />
							</a>
						</div>
					<?php
							}
						 $i++;
					  }  //메인 베너 E
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
				<ul class="menu">
					<li class="item">
						<a href="#">
							<img src="/images/ico/ico_quick_m01.png">
							<p>갤러리 일정 공유</p>
						</a>
					</li>
					<li class="item">
						<a href="#">
							<img src="/images/ico/ico_quick_m02.png">
							<p>아티스트 영상</p>
						</a>
					</li>
					<li class="item">
						<a href="#">
							<img src="/images/ico/ico_quick_m03.png">
							<p>갤러리 플렛폼</p>
						</a>
					</li>
					<li class="item">
						<a href="#">
							<img src="/images/ico/ico_quick_m04.png">
							<p>이달의 추천작</p>
						</a>
					</li>
					<li class="item">
						<a href="#">
							<img src="/images/ico/ico_quick_m05.png">
							<p>카드뉴스</p>
						</a>
					</li>
					<li class="item">
						<a href="#">
							<img src="/images/ico/ico_quick_m06.png">
							<p>스페이스아트1 대관</p>
						</a>
					</li>
					<li class="item">
						<a href="#">
							<img src="/images/ico/ico_quick_m07.png">
							<p>미디어아트1 이용</p>
						</a>
					</li>
					<li class="item">
						<a href="#">
							<img src="/images/ico/ico_quick_m08.png">
							<p>커뮤니티</p>
						</a>
					</li>
					<li class="line"><span></span></li>
				</ul>
				<div id="rankSp">
					<ul class="">
						<li class="">
							<span class="rank">1.</span>
							<a href="#" class="text">스페이스 아트1 대관 안내</a>
							<span class="issue">new</span>
						</li>
						<li class="">
							<span class="rank">2.</span>
							<a href="#" class="text">스페이스 아트1 대관 안내</a>
							<span class="issue">- 1</span>
						</li>
						<li class="">
							<span class="rank">3.</span>
							<a href="#" class="text">스페이스 아트1 대관 안내</a>
							<span class="issue">+ 1</span>
						</li>
					</ul>
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
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>media art1</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>galleries</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>market</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>market</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>facebook</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="bx_link">
										<div class="inner" style="background-color: #fff;border-color:#23b400">
											<dl>
												<dt>
													<div class="bx_tit">
														<h2 style="color:#23b400;">네이버 아트윈도우 <br/>바로가기</h2>
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
						<li class="grid-item w2 h2 stamp">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img2.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con right">
										<dt>
											<div class="bx_tit">
												<h2>market</h2>
												<h3>첫 외국인 현대미술관장 임명 미술계 반발...</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>미술계 "과거 정치검열 의혹에 명확한 해명 없다" vs 문체부 "능력 출중" 문화체육관광부(장관 김종덕)가 신임 국립현대미술관 관장에 '바르셀로나 현대미술관'(MACBA) 관장을 지냈던...</p>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item w2">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img3.jpg" alt="뉴스기사"></div>
									<dl class="con right black">
										<dt>
											<div class="bx_tit">
												<h2>artist rec</h2>
												<h3 class="video_tit">첫 외국인 현대미술관장 임명 미술계 반발...<img src="/images/ico/ico_video.png" class="ico_video"></h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>미술계 "과거 정치검열 의혹에 명확한 해명 없다" vs 문체부 "능력 출중" 문화체육관광부(장관 김종덕)가 신임 국립현대미술관 관장에 '바르셀로나 현대미술관'(MACBA) 관장을 지냈던...</p>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>market</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>instagram</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
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
				<div class="bot_banner">
					<div class="inner">
						<a href="http://www.lofficielhommes.co.kr/" target="_blank">
							<img src="/images/main/main_temp_banner1.jpg" class="pc" alt="">
							<img src="/images/main/main_temp_banner1.jpg" class="mobile" alt="">
						</a>
					</div>
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
						<li class="grid-item w2 h2">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img2.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con right">
										<dt>
											<div class="bx_tit">
												<h2>artist rec</h2>
												<h3 class="video_tit">첫 외국인 현대미술관장 임명 미술계 반발...<img src="/images/ico/ico_video.png" class="ico_video"></h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>미술계 "과거 정치검열 의혹에 명확한 해명 없다" vs 문체부 "능력 출중" 문화체육관광부(장관 김종덕)가 신임 국립현대미술관 관장에 '바르셀로나 현대미술관'(MACBA) 관장을 지냈던...</p>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>market</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
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
						<li class="grid-item md_hide">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>artist rec</h2>
												<h3 class="video_tit">고통받는 이에게 '갑옷'을 입히다.<img src="/images/ico/ico_video.png" class="ico_video"></h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>market</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>galleries</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>galleries</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>space art1</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
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
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>market</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item w2">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img3.jpg" alt="뉴스기사"></div>
									<dl class="con black">
										<dt>
											<div class="bx_tit">
												<h2>facebook</h2>
												<h3>첫 외국인 현대미술관장 임명 미술계 반발...</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>미술계 "과거 정치검열 의혹에 명확한 해명 없다" vs 문체부 "능력 출중" 문화체육관광부(장관 김종덕)가 신임 국립현대미술관 관장에 '바르셀로나 현대미술관'(MACBA) 관장을 지냈던...</p>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="bot_banner">
					<div class="inner">
						<a href="http://www.lofficielhommes.co.kr/" target="_blank">
							<img src="/images/main/main_temp_banner2.jpg" class="pc" alt="">
							<img src="/images/main/main_temp_banner2.jpg" class="mobile" alt="">
						</a>
					</div>
				</div>
			</div>
		</section>
		<!--메인 섹션2 E -->

		<!--메인 섹션3 S -->
		<section id="main_section03" class="main-grid">
			<div class="inner">
				<div class="bx_news">
					<ul>
						<li class="grid-sizer"></li>
						<li class="grid-item md_hide">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>market</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>market</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>space art1</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>instagram</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="bx_link">
										<div class="inner" style="background-color: #fff;border-color:#333">
											<dl>
												<dt>
													<div class="bx_tit">
														<h2 style="color:#333;">갤러리 입점 <br/>바로가기</h2>
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
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>pinterest</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item w2 h2 stamp">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img2.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con right">
										<dt>
											<div class="bx_tit">
												<h2>market</h2>
												<h3>첫 외국인 현대미술관장 임명 미술계 반발...</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>미술계 "과거 정치검열 의혹에 명확한 해명 없다" vs 문체부 "능력 출중" 문화체육관광부(장관 김종덕)가 신임 국립현대미술관 관장에 '바르셀로나 현대미술관'(MACBA) 관장을 지냈던...</p>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item w2">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img3.jpg" alt="뉴스기사"></div>
									<dl class="con black">
										<dt>
											<div class="bx_tit">
												<h2>artist rec</h2>
												<h3 class="video_tit">첫 외국인 현대미술관장 임명 미술계 반발...<img src="/images/ico/ico_video.png" class="ico_video"></h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>미술계 "과거 정치검열 의혹에 명확한 해명 없다" vs 문체부 "능력 출중" 문화체육관광부(장관 김종덕)가 신임 국립현대미술관 관장에 '바르셀로나 현대미술관'(MACBA) 관장을 지냈던...</p>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>galleries</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<a href="#">
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
						<li class="grid-item md_hide">
							<div class="inner">
								<a href="#">
									<div class="img"><img src="/images/main/main_temp_img1.jpg" alt="뉴스기사" class="h100p"></div>
									<dl class="con">
										<dt>
											<div class="bx_tit">
												<h2>instagram</h2>
												<h3>고통받는 이에게 '갑옷'을 입히다, 시대를 관찰하는 손종준 작가</h3>
											</div>
										</dt>
										<dd>
											<div class="inner">
												<p>"케이옥션은 사회적 책임감과 사회공헌에 대한 사명감을 가지고 문화를 통한 사회공헌활동을 이어갈 것입니다." <br><br>K옥션 이상규 대표(56)는 국내 미술품 경매사중 첫 사회공헌 회사라는 자부심이 강하다. <br><br>지난 2008년부터 매년 사랑나눔 자선경매를 이어오며 사회의 온기를 전하고 있다. 불황의 시대에 억소리나는 경매로 일반 사회와의 괴리감이 있지만, 연말이면 '미술품 기부' 행사로 지속적인 메세나활동을 펼치고 있다.</p>
												<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
											</div>
										</dd>
									</dl>
								</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="bot_banner">
					<div class="inner">
						<a href="http://www.lofficielhommes.co.kr/" target="_blank">
							<img src="/images/main/main_temp_banner3.jpg" class="pc" alt="">
							<img src="/images/main/main_temp_banner3.jpg" class="mobile" alt="">
						</a>
					</div>
				</div>
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
				}
			}

			iCutterOwen(["#NewsV2 .bx_news > ul > li.w2 ul.img.slide > li", "#NewsV2 .bx_news > ul > li:not(.w2) .img"]);
			newsAni.swipe();

			function setNewsTime(){
				var ww = WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
				if(ww < 1550)return;
				var t = $("#news_timer");
				var date = new Date();
				var week = ["일", "월", "화", "수", "목", "금", "토"];
				var hour = date.getHours();
				var min = date.getMinutes();
				var now = {
					hour : hour === 12 ? 12 : date.getHours()%12,
					min : min < 10 ? "0"+min : min,
					ampm : Math.floor(date.getHours()/12) ? "PM" : "AM",
					month : date.getMonth()+1,
					date : date.getDate(),
					week : week[date.getDay()]
				}
				t.find('h2 > span').html(now.hour+":"+now.min);
				t.find('h2 > small').html(" "+now.ampm);
				t.find('h3').html(now.month+"월 "+now.date+"일 "+now.week+"요일");
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

			$('#rankSp ul').bxSlider({
				mode: 'vertical',
				auto: true,
				pause: 3000,
				pager: false,
				controls: false
			});

			$(".menu > li.item").on("mouseover",function() {
				var idx = $(".menu > li.item").index($(this));
				var pos = $(".menu > li.line").outerWidth()*idx;
				TweenMax.to($(".menu > li.line"),0.5,{left:pos, ease: Power1.easeInOut});
			});

			$(".bx_slide > ul > li h3:not(.video_tit), .bx_slide > ul > li p, .bx_news dl.con h3:not(.video_tit), .bx_news dl.con p").dotdotdot();
			$("h3.video_tit").dotdotdot({ after: ".ico_video" });
			setTimeout(function(){ $("h3.video_tit").dotdotdot({ after: ".ico_video" }); }, 1000);

			$(window).resize(function() {

			});

			if(getUrlParameter("mode") == "admin") {
				$(".bx_news > ul > li").each(function(i) {
					var _id = "s"+$(".main-grid").index($(this).closest(".main-grid"))+"_i"+$(this).parent().find("li").index($(this));
					if(!$(this).hasClass("grid-sizer")) $(this).attr("id", _id)
				});

				$(".bot_banner").each(function(i) {
					var _id = "s"+$(".main-grid").index($(this).closest(".main-grid"))+"_b"+(i+1);
					$(this).attr("id", _id)
				});

				$(".bx_news > ul > li > .inner, .bot_banner > .inner").each(function(i) {
					var _id = $(this).parent().attr("id");

					if($(this).find(".bx_bbs_list").length < 1 && $(this).find(".bx_logo").length < 1){
						$(this).append('<div class="util"><button class="btn_pack1 gray small" onclick="edit_cont(this);">EDIT</button></div>');
						if($(this).parent().hasClass("w2")){
							$(this).find(".util").prepend('<span class="colorChange"><input name="'+_id+'" type="radio" id="'+_id+'_c[w]" class="chkraido white" value="white"><label for="'+_id+'_c[w]"></label><input name="'+_id+'" type="radio" id="'+_id+'_c[b]" class="chkraido black" value="black"><label for="'+_id+'_c[b]"></label><span><select><option value="left">LEFT</option><option value="right">RIGHT</option></select>');

							if($(this).closest(".grid-item").find(".con").hasClass("black")){
								$(this).find(".util input[type='radio'].black").attr("checked", true);
							}else{
								$(this).find(".util input[type='radio'].white").attr("checked", true);
							}

							if($(this).closest(".grid-item").find(".con").hasClass("right")){
								$(this).find(".util select").val("right");
							}else{
								$(this).find(".util select").val("left");
							}
						}
					}
				});

				$(".util input[type='radio']").change(function(){
					$(this).closest(".grid-item").find(".con").removeClass("black white").addClass($(this).val());
				});

				$(".util select").change(function(){
					$(this).closest(".grid-item").find(".con").removeClass("left right").addClass($(this).val());
				});

				function edit_cont(t) {
					/*popFn.show($("#pop_edit"), {
						onLoad : function() {

						}
					});*/
					var idx = $(t).closest(".grid-item").attr("id");
						url = "/__ajax_pop_edit.php";
					ajaxShowPopCont({url:url, data:{"idx":idx}});
				}
			}

		</script>


    </div><!-- //container_inner -->
  </section><!-- //container_main -->

<? include "inc/footer.php"; ?>
<? include "inc/bot.php"; ?>


