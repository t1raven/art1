
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
<!-- <link rel="stylesheet" href="/css/flipclock.css"> -->
<link rel="stylesheet" href="/css/animate.css" />
<link rel="stylesheet" href="/css/tmp_main.css?ver1.22" />
 <!--<script src="/js/flipclock.min.js"></script>-->
 <script src="/js/isotope.pkgd.min.js"></script>
 <script src="/js/jquery.transform2d.js"></script>
 <script src="/js/jquery.dotdotdot.min.js"></script>
  <script src="/js/jwplayer.js"></script>
<!-- <div class="testBox" style="background-color: #fff; width: 200px;height: 100px;position: fixed; left: 0; top: 0; z-index: 1000000;"></div> -->

<nav id="sideNav_v2">
	<div class="bx_dial">
		<ul>
			<li class="focus0"><a href="#NewsV2" class="s1">news</a></li>
			<li><a href="#sect1" class="s2">Artist rec</a></li>
			<li><a href="#Archive" class="s3">market</a></li>
			<li><a href="#Exhibition" class="s4">Preview</a></li>
			<li><a href="#arthongsSNS" class="s5">Social</a></li>
		</ul>
		<div class="btn_updown">
			<button class="btn_up" onclick="asideFn.scroll(-1)"><img src="/images/main/btn_aside_up.png" alt="" /><span class="img_on"><img src="/images/main/btn_aside_up_on.png" alt="" /></span></button>
			<button class="btn_down" onclick="asideFn.scroll(1)"><img src="/images/main/btn_aside_down.png" alt="" /><span class="img_on"><img src="/images/main/btn_aside_down_on.png" alt="" /></span></button>
		</div>
	</div>
</nav>


<!--//로그인 레이어팝업 S -->
<script>

function transitionName () {
    var i,
        undefined,
        el = document.createElement('div'),
        transforms = {
            'transform':'transform',
            'OTransform':'-o-transform',  // oTransitionEnd in very old Opera
            'msTransform':'-ms-transform',
            'MozTransform':'-moz-transform',
            'webkitTransform':'-webkit-transform'
        };

    for (i in transforms) {
        if (transforms.hasOwnProperty(i) && el.style[i] !== undefined) {
            return transforms[i];
        }
    }
}

var asideFn = {
	dRate : [],
	align : function(){
		for(var k = 0 ; k < 5 ; k++){
			this.dRate[k] = Math.round(Math.sin((90-(13*k))*Math.PI/180) * 100) / 100;
		}
		this.move(0,"abs");
		$("#sideNav_v2").addClass('ready');
	},
	move : function(dire, type){
		var box = $("#sideNav_v2 > .bx_dial > ul");
		var unit = box.find(">li");
		var now = box.find(" >li.focus0");
		if(type === "arr"){
			var next = unit.eq((unit.length+now.index()+dire)%unit.length);
		}else{
			var next = unit.eq(dire);
		}
		var prevAll = next.prevAll();
		var nextAll = next.nextAll();
		var pLen = prevAll.length;
		var nLen = nextAll.length;
		var nextIdx = next.index();
		var transName = transitionName();
		var liH = 36, subH = 10;
		for(var l = 0 ; l < pLen ; l++){
			subH += liH*asideFn.dRate[pLen-l];
		} // 마진 줄 높이 구하기
		var mgt = Math.floor(
			next.position().top - 
			parseInt(box.css('margin-top'))
		);
		box.stop().animate({'margin-top':-(nextIdx && nextIdx >= now.index() ? subH : subH)}, 400, 'easeInOutQuad');
		for(var i = 0 ; i < pLen ; i++){
			unit.eq(i).removeAttr('style').css({"opacity":asideFn.dRate[pLen-i]*0.7, "line-height":2.25*asideFn.dRate[pLen-i]+"em"})
			unit.eq(i)[0].style[transName] = "scale("+asideFn.dRate[pLen-i]+")";
			//unit.eq(i).removeAttr('class').addClass('focus'+(pLen-i))
		}
		for(var j = 1 ; j <= nLen ; j++){
			unit.eq(j+nextIdx).removeAttr('style').css({"opacity":asideFn.dRate[j]*0.7, "line-height":2.25*asideFn.dRate[j]+"em"});
			unit.eq(j+nextIdx)[0].style[transName] = "scale("+asideFn.dRate[j]+")";
		}
		next.siblings(".focus0").removeClass('focus0').end().removeAttr('style class').addClass('focus0');
	},
	scroll : function(dire){
		var box = $("#sideNav_v2 > .bx_dial > ul");
		var unit = box.find(">li");
		var now = box.find(" >li.focus0");
		var next = unit.eq((unit.length+now.index()+dire)%unit.length);
		next.find('a').trigger('click');
	}
};

asideFn.align();
var scrollMotionFlag = true;
$("#sideNav_v2 .bx_dial a").on("click",function(){
	if(scrollMotionFlag){
		scrollMotionFlag = false;
		asideFn.move($(this).parent().index(), "abs");
		$('html,body').animate({scrollTop:$(this.hash).offset().top-70}, 1500, 'easeInOutQuint',function(){scrollMotionFlag = true});
	}
	return false;
})

//뉴스레터
function newsletter(){
  var obj = $("#layerNewletter");

  var WinHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
  var ml= -(obj.outerWidth() / 2) ;
  var mt = WinHeight - obj.outerHeight();
  if( mt > 0){
    mt = mt / 2
  }else{
    mt = 10
  }
}//newsletter
</script>

<?
$imgVer = '?ver=1.42';
$movies[0]['num'] =  '6';
$movies[1]['num'] =  '7';
$movies[2]['num'] =  '8';
$movies[3]['num'] =  '9';
$movies[4]['num'] =  '10';
$movies[5]['num'] =  '11';
$movies[6]['num'] =  '12';

$movies[0]['img'] =  '/images/main/tmp2/img_movt2_06.jpg'.$imgVer;
$movies[1]['img'] =  '/images/main/tmp2/img_movt2_07.jpg'.$imgVer;
$movies[2]['img'] =  '/images/main/tmp2/img_movt2_08.jpg'.$imgVer;
$movies[3]['img'] =  '/images/main/tmp2/img_movt2_09.jpg'.$imgVer;
$movies[4]['img'] =  '/images/main/tmp2/img_movt2_10.jpg'.$imgVer;
$movies[5]['img'] =  '/images/main/tmp2/img_movt2_11.jpg'.$imgVer;
$movies[6]['img'] =  '/images/main/tmp2/img_movt2_12.jpg'.$imgVer;

$movies[0]['dimg'] =  '/images/bg/bg_mov_noPlay6.jpg'.$imgVer;
$movies[1]['dimg'] =  '/images/bg/bg_mov_noPlay7.jpg'.$imgVer;
$movies[2]['dimg'] =  '/images/bg/bg_mov_noPlay8.jpg'.$imgVer;
$movies[3]['dimg'] =  '/images/bg/bg_mov_noPlay9.jpg'.$imgVer;
$movies[4]['dimg'] =  '/images/bg/bg_mov_noPlay10.jpg'.$imgVer;
$movies[5]['dimg'] =  '/images/bg/bg_mov_noPlay11.jpg'.$imgVer;
$movies[6]['dimg'] =  '/images/bg/bg_mov_noPlay12.jpg'.$imgVer;

if($check_mobile === false){
	$movies[0]['mov'] =  'ArtistRec6';
	$movies[1]['mov'] =  'ArtistRec7';
	$movies[2]['mov'] =  'ArtistRec8';
	$movies[3]['mov'] =  'ArtistRec9';
	$movies[4]['mov'] =  'ArtistRec10';
	$movies[5]['mov'] =  'ArtistRec11';
	$movies[6]['mov'] =  'ArtistRec12';
}else{
	$movies[0]['mov'] =  'ArtistRec6_m';
	$movies[1]['mov'] =  'ArtistRec7_m';
	$movies[2]['mov'] =  'ArtistRec8_m';
	$movies[3]['mov'] =  'ArtistRec9_m';
	$movies[4]['mov'] =  'ArtistRec10_m';
	$movies[5]['mov'] =  'ArtistRec11_m';
	$movies[6]['mov'] =  'ArtistRec12_m';
}
?>      
<? include "inc/header.php"; ?>
  <section id="container_main">
    <div class="container_inner">
		
		<!--메인 뉴스 & 베너 S -->
		<section id="NewsV2">
			<div class="inner">
				<div class="bx_news">
					<ul>
						<li class="w2">
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
								<div class="con_t2">
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
						<li>
							<a class="inner" href="<?php echo $link?>">
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
						<li>
							<a class="inner" href="<?php echo $link?>">
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
						</li><!-- EPISODE -->
						
						<li class="md_hide">
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
						<li class="md_hide">
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
						<li>
							<a class="inner" href="<?php echo $link?>">
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
						<li>
							<a class="inner" href="<?php echo $link?>">
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
						</li><!-- PEOPLE -->
						<li class="w2 board">
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
															<!-- <tr><th>Episode</th><td><a href="#">미술계 "과거 정치검열 의혹에 명확한 해명 없다" vs 문체부...</a></td><td class="date">Mar.28</td></tr>
															<tr><th>People</th><td><a href="#">유홍준 "80년대 리얼리즘은 한국 현대미술의 정체성" </a></td><td class="date">Mar.28</td><tr>
															<tr><th>Episode</th><td><a href="#">미술품 거래를 투명하게 '한국 미술시장 정보시스템' 공개 </a></td><td class="date">Mar.28</td></tr>
															<tr><th>Trend</th><td><a href="#">서울시립미술관은 지난해 어떤 작품 소장했을까? </a></td><td class="date">Mar.28</td></tr>
															<tr><th>Trend</th><td><a href="#">흑백사진의 장인 '펜티 사말라티' 국내 첫 개인전 개최 </a></td><td class="date">Mar.28</td></tr>
															<tr><th>World</th><td><a href="#">갤러리 다운재, '자연의 빛 물들다' 도자 다구展 </a></td><td class="date">Mar.28</td><tr>
															<tr><th>In Brief</th><td><a href="#">발해와 고려 유물 상설전시관 새 단장…청자·귀금속이 반짝반짝 </a></td><td class="date">Mar.28</td><tr> -->
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
				  ?>
					<a href="<?php echo $row['linkUrl']; ?>" class="inner" target="_blank">
						<img src="<?php echo $row['bannerUpFileName']; ?>" class="pc" alt="" />
						<img src="<?php echo $row['bannerUpFileNameMobile']; ?>" class="mobile" alt="" />
					</a>
				  <?php 
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

<script>
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
	
</script>		



		<section id="sect1" class="on-page motion-check">
      	  <div class="top_btn">
      		<a href="/homeguide/guide.php" class="more"><button class="btnWhiteEdge">아트1 +</button></a>
          </div>
		  <h1 class="title_main">
              <a href="/art1/index.php"><img src="/images/main/t7.png" alt="ARTIST REC" class="pc" /></a>
              <a href="/art1/index.php"><img src="/images/main/t7_2.png" alt="ARTIST REC" class="mobile" /></a>
              <span class="title_sub">&nbsp;</span>
          </h1>
			<section class="new_mov">
				<ul class="inner clearfix">
					<li class="bx_l">
						<div class="m_tlie tile_t1" data-video="<?=$movies[6]['mov']?>" data-img="<?=$movies[6]['dimg']?>" data-idx="<?=$movies[6]['num']?>">
							<span class="cover"></span><img src="<?=$movies[6]['img']?>" class="movimg" alt="">
							<div class="cont">
								<h2><span>ARTIST<br />REC#<?=$movies[6]['num']-1?></span></h2>
							</div>
							<a href="#" class="play"><img src="images/main/btn_play.png" alt="영상 시작"></a>
							<a href="/art1/artist_rec.php?idx=<?=$movies[6]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
						</div>
						<ul class="clearfix">
							<li class="m_tlie tile_t2" data-video="<?=$movies[4]['mov']?>" data-img="<?=$movies[4]['dimg']?>" data-idx="<?=$movies[4]['num']?>">
								<span class="cover"></span><img src="<?=$movies[4]['img']?>" class="movimg" alt="">
								<div class="cont">
									<h2><span>ARTIST<br />REC#<?=$movies[4]['num']?></span></h2>
								</div>
								<a href="#" class="play"><img src="images/main/btn_play.png" alt="영상 시작"></a>
								<a href="/art1/artist_rec.php?idx=<?=$movies[4]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
							</li>
							<li class="m_tlie tile_t2" data-video="<?=$movies[3]['mov']?>" data-img="<?=$movies[3]['dimg']?>" data-idx="<?=$movies[3]['num']?>">
								<span class="cover"></span><img src="<?=$movies[3]['img']?>" class="movimg" alt="">
								<div class="cont">
									<!-- <h2><span>ARTIST<br />REC#<?=$movies[3]['num']?></span></h2> -->
									<h2 class="type2"><span>art1<br />&nbsp;show&nbsp;</span></h2>
								</div>
								<a href="#" class="play single"><img src="images/main/btn_play.png" alt="영상 시작"></a>
								<!-- <a href="/art1/artist_rec.php?idx=<?=$movies[3]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a> -->
							</li>
						</ul>
					</li>
					<li class="bx_r">
						<ul class="clearfix">
							<li class="m_tlie tile_t3" data-video="<?=$movies[2]['mov']?>" data-img="<?=$movies[2]['dimg']?>" data-idx="<?=$movies[2]['num']?>">
								<span class="cover"></span><img src="<?=$movies[2]['img']?>" class="movimg" alt="">
								<div class="cont">
									<h2><span>ARTIST<br />REC#<?=$movies[2]['num']?></span></h2>
								</div>
								<a href="#" class="play"><img src="images/main/btn_play.png" alt="영상 시작"></a>
								<a href="/art1/artist_rec.php?idx=<?=$movies[2]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
							</li>
							<li class="m_tlie tile_t3" data-video="<?=$movies[1]['mov']?>" data-img="<?=$movies[1]['dimg']?>" data-idx="<?=$movies[1]['num']?>">
								<span class="cover"></span><img src="<?=$movies[1]['img']?>" class="movimg" alt="">
								<div class="cont">
									<h2><span>ARTIST<br />REC#<?=$movies[1]['num']?></span></h2>
								</div>
								<a href="#" class="play"><img src="images/main/btn_play.png" alt="영상 시작"></a>
								<a href="/art1/artist_rec.php?idx=<?=$movies[1]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
							</li>
							<li class="m_tlie tile_t3 logo">
								<a href="/art1/artist_rec.php" /><img src="images/main/tile_logo2.gif" class="logo" alt=""></a><!--로고-->
							</li>
							<li class="m_tlie tile_t3 promo" data-video="<?=$movies[0]['mov']?>" data-img="<?=$movies[0]['dimg']?>" data-idx="<?=$movies[0]['num']?>">
								<span class="cover"></span><img src="<?=$movies[0]['img']?>" class="movimg" alt="">
								<div class="cont">
									<h2><span>ARTIST<br />REC#<?=$movies[0]['num']?></span></h2>
								</div>
								<a href="#" class="play"><img src="images/main/btn_play.png" alt="영상 시작"></a>
								<a href="/art1/artist_rec.php?idx=<?=$movies[0]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
							</li>
						</ul>
						<div class="m_tlie tile_t4" data-video="<?=$movies[5]['mov']?>" data-img="<?=$movies[5]['dimg']?>" data-idx="<?=$movies[5]['num']?>">
							<img src="<?=$movies[5]['img']?>" class="movimg" alt=""><span class="cover"></span>
							<div class="cont">
								<h2><span>ARTIST<br />REC#<?=$movies[5]['num']-1?></span></h2>
							</div>
							<a href="#" class="play"><img src="images/main/btn_play.png" alt="영상 시작"></a>
							<a href="/art1/artist_rec.php?idx=<?=$movies[5]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
						</div>
					</li>
				</ul>
			</section>
		
          
<!-- 기존 동영상 섹션 시작-->
          <div class="mov bxsh">
              <span class="cover"></span>
              <div class="cont">
                <h1>Anselm Kiefer</h1>
                <p class="t1">DIE UNGEBORENEN</p>
                <p class="t2">Galerie Thaddaeus Ropac | Paris Pantin | 2012 </p>
              </div>
              <div class="m_tlie tile_t1" data-video="<?=$movies[6]['mov']?>" data-img="<?=$movies[6]['dimg']?>" data-idx="<?=$movies[6]['num']?>">
				<span class="cover"></span><img src="<?=$movies[6]['img']?>" class="movimg" alt="">
				<div class="cont">
					<h2><span>ARTIST<br />REC#<?=$movies[6]['num']-1?></span></h2>
				</div>
				<a href="#" class="play"><img src="images/main/btn_play.png" alt="영상 시작"></a>
				<a href="/art1/artist_rec.php?idx=<?=$movies[6]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
			  </div>

            </div>
            <section class="lst_mov">
              <button class="prev"><img src="/images/main/btn_movPrev.png" alt="이전"></button>
              <button class="next"><img src="/images/main/btn_movNext.png" alt="다음"></button>
              <ul class="lst">
                  <li class="bxsh"  data-video="<?=$movies[5]['mov']?>" data-img="<?=$movies[5]['dimg']?>" data-idx="<?=$movies[5]['num']?>">
                      <span class="cover"></span><img src="<?=$movies[5]['img']?>" class="movimg" alt="">
                      <div class="cont">
                       	<h2><span>ARTIST<br />REC#<?=$movies[5]['num']-1?></span></h2>
                        <div class="txt">
                        </div>
                      </div>
                      <a href="#" class="play"><img src="images/main/btn_play.png" alt="영상 시작"></a>
                      <a href="/art1/artist_rec.php?idx=<?=$movies[5]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
                  </li>
                  <li class="bxsh"  data-video="<?=$movies[4]['mov']?>" data-img="<?=$movies[4]['dimg']?>" data-idx="<?=$movies[4]['num']?>">
                      <span class="cover"></span><img src="<?=$movies[4]['img']?>" class="movimg" alt="">
                      <div class="cont">
                        <h2><span>ARTIST<br />REC#<?=$movies[4]['num']?></span></h2>
                        <div class="txt">
                        </div>
                      </div>
                      <a href="#" class="play"><img src="images/main/btn_play.png" alt="영상 시작"></a>
                      <a href="/art1/artist_rec.php?idx=<?=$movies[4]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
                  </li>
                  <li class="bxsh" data-video="<?=$movies[3]['mov']?>" data-img="<?=$movies[3]['dimg']?>" data-idx="<?=$movies[3]['num']?>">
                      <span class="cover"></span><img src="<?=$movies[3]['img']?>" class="movimg" alt="">
                      <div class="cont">
						<h2 class="type2"><span>art1<br />&nbsp;show&nbsp;</span></h2>
                        <!-- <h2><span>ARTIST<br />REC#<?=$movies[3]['num']?></span></h2> -->
                        <div class="txt">
                        </div>
                      </div>
                    <a href="#" class="play single"><img src="images/main/btn_play.png" alt="영상 시작"></a>
                    <!-- <a href="/art1/artist_rec.php?idx=<?=$movies[3]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a> -->
                  </li>
                  
                  <li class="bxsh" data-video="<?=$movies[2]['mov']?>" data-img="<?=$movies[2]['dimg']?>" data-idx="<?=$movies[2]['num']?>">
                      <span class="cover"></span><img src="<?=$movies[2]['img']?>" class="movimg" alt="">
                      <div class="cont">
                        <h2><span>ARTIST<br />REC#<?=$movies[2]['num']?></span></h2>
                        <div class="txt">
                        </div>
                      </div>
                      <a href="#" class="play"><img src="images/main/btn_play.png" alt="영상 시작"></a>
                      <a href="/art1/artist_rec.php?idx=<?=$movies[2]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
                  </li>
                  <li class="bxsh" data-video="<?=$movies[1]['mov']?>" data-img="<?=$movies[1]['dimg']?>" data-idx="<?=$movies[1]['num']?>">
                      <span class="cover"></span><img src="<?=$movies[1]['img']?>" class="movimg" alt="">
                      <div class="cont">
                        <h2><span>ARTIST<br />REC#<?=$movies[1]['num']?></span></h2>
                      </div>
                    <a href="#" class="play"><img src="images/main/btn_play.png" alt="영상 시작"></a>
                    <a href="/art1/artist_rec.php?idx=<?=$movies[1]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
                  </li>
                  <li class="bxsh" data-video="<?=$movies[0]['mov']?>" data-img="<?=$movies[0]['dimg']?>" data-idx="<?=$movies[0]['num']?>">
                      <span class="cover"></span><img src="<?=$movies[0]['img']?>" class="movimg" alt="">
                      <div class="cont">
                        <h2><span>ARTIST<br />REC#<?=$movies[0]['num']?></span></h2>
                      </div>
                    <a href="#" class="play"><img src="images/main/btn_play.png" alt="영상 시작"></a>
                    <a href="/art1/artist_rec.php?idx=<?=$movies[0]['num']?>" class="share"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
                  </li>
            </ul>
           </section>
<!-- 기존 동영상 섹션 끝-->

      </section><!-- //sect1 -->
    <script>
    function openMovPop(){
    	$("#mov_pop > .inner").css("margin-top",$(window).scrollTop()+130+"px");
    	var WinWdith2 = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    	fadePlayMotion($("#mov_pop"), true, 400);
    	if(WinWdith2 < 845){
			var movH =  Math.round($("#mov_pop > .inner > .mov_box").width()*0.5622);
			$("#mov_pop > .inner > .mov_box").css("height",movH+"px");
		}else{
			$("#mov_pop > .inner > .mov_box").removeAttr("style");
		}
    }
    
    function donotClose(e){
    	e.stopPropagation();
    }
    function closeMovPop(){
    	fadePlayMotion($("#mov_pop"), false, 400);
    	$("#movFlv>*").remove();
    }
<?if($check_mobile === false){?>	
  	var movies = [
  		{name : 'Promotion_barble', img : '/images/bg/bg_mov_promotionBarble.jpg'},
		{name : 'ArtistRec1', img : '/images/bg/bg_mov_noPlay1.jpg'},
		{name : 'ArtistRec2', img : '/images/bg/bg_mov_noPlay2.jpg'},
		{name : 'ArtistRec3', img : '/images/bg/bg_mov_noPlay3.jpg'},
		{name : 'ArtistRec4', img : '/images/bg/bg_mov_noPlay4.jpg'},
		{name : 'ArtistRec5', img : '/images/bg/bg_mov_noPlay5.jpg'},
		{name : 'ArtistRec6', img : '/images/bg/bg_mov_noPlay6.jpg'},
		{name : 'ArtistRec7', img : '/images/bg/bg_mov_noPlay7.jpg'},
		{name : 'ArtistRec8', img : '/images/bg/bg_mov_noPlay8.jpg'},
		{name : 'ArtistRec9', img : '/images/bg/bg_mov_noPlay9.jpg'},
		{name : 'ArtistRec10', img : '/images/bg/bg_mov_noPlay10.jpg'},
		{name : 'ArtistRec11', img : '/images/bg/bg_mov_noPlay11.jpg'},
		{name : 'ArtistRec11', img : '/images/bg/bg_mov_noPlay12.jpg'}
  	]
<?}else{?>	
  	var movies = [
		{name : 'Promotion_barble_m', img : '/images/bg/bg_mov_promotionBarble.jpg'},
		{name : 'ArtistRec2_m', img : '/images/bg/bg_mov_noPlay2.jpg'},
		{name : 'ArtistRec3_m', img : '/images/bg/bg_mov_noPlay3.jpg'},
		{name : 'ArtistRec4_m', img : '/images/bg/bg_mov_noPlay4.jpg'},
		{name : 'ArtistRec5_m', img : '/images/bg/bg_mov_noPlay5.jpg'},
		{name : 'ArtistRec6_m', img : '/images/bg/bg_mov_noPlay6.jpg'},
		{name : 'ArtistRec7_m', img : '/images/bg/bg_mov_noPlay7.jpg'},
		{name : 'ArtistRec8_m', img : '/images/bg/bg_mov_noPlay8.jpg'},
		{name : 'ArtistRec9_m', img : '/images/bg/bg_mov_noPlay9.jpg'},
		{name : 'ArtistRec10_m', img : '/images/bg/bg_mov_noPlay10.jpg'},
		{name : 'ArtistRec11_m', img : '/images/bg/bg_mov_noPlay11.jpg'},
		{name : 'ArtistRec12_m', img : '/images/bg/bg_mov_noPlay12.jpg'}
  	]
<?}?>
    var movTotal = movies.length;
    var movStartNum;
      if(isie7 || isie8 || isie9){
      var jwp =null;
         function itemIeMotion(num, me){
         	
				var ele = $(me);
                if(jwp != null){
                  var thumbItems = $(".new_mov .m_tlie");
                  var soundSrc = ele.data('video');
                  $("#movFlv_wrapper").remove();
                  $("#mov_pop > .inner > .mov_box").append($("<div id='movFlv'></div>"));
                  jwp = jwplayer('movFlv').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           autostart: true,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/"+soundSrc+".flv"
                       });

                }else{
                      var videoTag = "movA1";
                      var thumbItems = $(".new_mov .m_tlie");
                      var soundSrc = ele.data('video');
                     /* if($("#movFlv").find("#"+videoTag+"").length > 0){
                            $("#movFlv #"+videoTag+"").remove();
                      }*/
                      jwp = jwplayer('movFlv').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           autostart: true,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/"+soundSrc+".flv"
                       });
                }

          }//itemIeMotion

		function playPause() {
		} 
		
		function fullSize(){
		}


      }else{//isie7 || isie8
              function itemMotion(num, endedFlag, me){
                  //con("num::::"+num);
                 var ele = $(me);
                 var movBox = $("#sect1");
                  var videoTag = "movA1";
                  var thumbItems = $(".new_mov .m_tlie");
                  //var lang = thumbItems.length;
                  if(endedFlag){
              		var soundSrc = movies[num]['name'];
              		var ImgSrc = movies[num]['img'];
                  }else{
                    var soundSrc = ele.data('video');
                    var ImgSrc = ele.data('img');
                  }

                  <? if($check_mobile === false){ ?>
                  var videobox = $('<video id="'+videoTag+'" '+ (endedFlag ? "" : "autoplay") +' controls volume="1"  ></video>');
                  <? }else{ ?>
                  var videobox = $('<div class="video_cover" style=""></div><video id="'+videoTag+'" '+ (endedFlag ? "" : "autoplay") +' controls volume="1"  ></video>');
                  <? } ?>
                  var sourceMp4 = $('<source src="'+soundSrc+'.mp4" type="video/mp4">');
                  var sourceOgg = $('<source src="'+soundSrc+'.ogv" type="video/ogv">');
                  var sourceEmbed = $('<embed src="'+soundSrc+'.mp4" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" autoplay="false"></embed>');
                  if($("#movFlv").find("#"+videoTag+"").length > 0){
                        $("#movFlv #"+videoTag+"").remove();
                  }
                  $("#movFlv").html(videobox);
                  $("#movFlv #"+videoTag+"").append(sourceMp4).append(sourceOgg).append(sourceEmbed);
                  
                  <? if($check_mobile === true){ ?>
                  document.getElementById("movA1").oncanplay  = function() {
                  		$(".video_cover").fadeOut();
                  };
                  document.getElementById("movA1").play();
                  <? } ?>
                  var video = document.getElementById(videoTag);

                  video.addEventListener("ended", function () {
                    if(movStartNum >=  1/*thumbItems.length+1*/ ){
                       movStartNum--;
                    }else{
                       movStartNum = movTotal;
                    }
                    itemMotion(movStartNum, true ) ;

                  }, false);                  
            }

		$(function(){
 			$('#mov_pop button.next').click(function(){
				(movStartNum >=  1) ? movStartNum-- : movStartNum = movTotal-1;
				itemMotion(movStartNum, true ) ;
			});
			$('#mov_pop button.prev').click(function(){
				(movStartNum <  movTotal) ? movStartNum++ : movStartNum = 0;
                itemMotion(movStartNum, true ) ;
			});
		});
		
		function playPause() {
			var mov = document.getElementById("movA1");
		    if (mov.paused) 
		        mov.play();
		    else 
		        mov.pause(); 
		} 
		
		function fullSize(){
			var mov = document.getElementById("movA1");
			if (mov.requestFullscreen) {
				mov.requestFullscreen();
			} else if (mov.mozRequestFullScreen) {
				mov.mozRequestFullScreen(); // Firefox
			} else if (mov.webkitRequestFullscreen) {
				mov.webkitRequestFullscreen(); // Chrome and Safari
			}
		}
		
      }//isie7 || isie8


		
			 

    </script>
<script>



        function movZone(){
          var $obj = $("#sect1");
          var $mask = $obj.find(".lst_mov"); //마스크박스
          var $pos = $mask.find(".lst");
          var $prev = $obj.find(".prev");
          var $next = $obj.find(".next");
          var exp = 0; // 노출되는 갯수
          var total = 6; //배너 갯수
          var pageNum = 0; //현제 페이지
          var pageGo = 1; // 페이지 넘어가는 수
          var pageTotal = 0;
          var maskBoxSize = $mask.outerWidth();
          var prevMaskBoxSIze = 0;

          var WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
          if( WinWdith >= 600 ){ pageGo = 1; }else{ pageGo = 2; }
          if(WinWdith < 845){
				boxSize = $("#sect1 .lst_mov > .lst > li:eq(1)").outerWidth(true);
            }else{
                boxSize = 249;
            }
            pageingArea($mask,total);
            resize();

           function resize(){

              WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
              maskBoxSize = $mask.outerWidth();
              if( WinWdith >= 600 ){ pageGo = 1; }else{ pageGo = 2; }
              //con("mov::::::마스크사이즈 :::::"+maskBoxSize);
              //con("mov::::::이전 마스크사이즈 :::::"+prevMaskBoxSIze);
              if(maskBoxSize != prevMaskBoxSIze ){
               // con("mov::::::사이즈 변동");
                if(WinWdith < 845){
					boxSize = $("#sect1 .lst_mov > .lst > li:eq(1)").outerWidth(true);
                }else{
                    boxSize = 249;
                }
                if($("#mov_pop").css("display") != "none"){
                	$("#mov_pop > .inner > .mov_box").removeAttr("style");
                }
                exp =  Math.round(maskBoxSize / boxSize);
                pageTotal = total -  exp;
                //con("mov:::::노출되는 갯수::::"+exp);
                //con("mov:::::총페이지 수::::"+pageTotal);
                prevMaskBoxSIze = maskBoxSize;
                //pageingMotion();
                pageNum = 0;
                $pos.animate({"left":0 },500,"swing");


              }
              pageingOvrMotion($mask, pageNum ,exp , pageTotal);
              pageingResizeMotion($mask,1025);

           }//resize


          function pageingMotion(){
            if(exp < total){
                $next.css("display",(pageTotal > pageNum) ? "block" : "none");
                $prev.css("display",(0 >= pageNum) ? "none" : "block");
              }else{
                $next.css("display","none");
                $prev.css("display","none");
              }
           }//pageingMotion

           function posMotion(pageNum){
           $pos.animate({"left": -( (boxSize ) * pageNum) },200,"swing");
            //pageingMotion();

           }//posMotion

             $mask.swipe( {
                //Generic swipe handler for all directions
                swipeLeft:function(event, direction, distance, duration, fingerCount) {
                   if(!$pos.is(":animated")){
                      pageNum = (pageNum >= pageTotal) ? pageTotal : pageNum + pageGo;
                      posMotion(pageNum);
                   };
                   pageingOvrMotion($mask, pageNum ,exp , pageTotal)

                },
                 swipeRight:function(event, direction, distance, duration, fingerCount) {
                      if(!$pos.is(":animated")){
                      pageNum = (pageNum <= 0) ? 0 : pageNum - pageGo;
                      posMotion(pageNum);
                    };
                    pageingOvrMotion($mask, pageNum ,exp , pageTotal)
                },
                excludedElements:".noSwipe",
                threshold:80
              });

           //
            $next.on("click",function(){
              if(!$pos.is(":animated")){
                  pageNum = (pageNum >= pageTotal) ? pageTotal : pageNum + pageGo;
                  posMotion(pageNum);
               }
               pageingOvrMotion($mask, pageNum ,exp , pageTotal)

            });

            $prev.on("click",function(){
                if(!$pos.is(":animated")){
                  pageNum = (pageNum <= 0) ? 0 : pageNum - pageGo;
                  posMotion(pageNum);
                };
                pageingOvrMotion($mask, pageNum ,exp , pageTotal)
            });




           $(window).resize(function(){resize()});
        }//movZone
        movZone();
      </script>
  
     <section id="Archive" class="on-page">
      	<div class="top_btn">
      		<a href="/artist" class="more"><button class="btnWhiteEdge">작가등록 +</button><!-- <img src="/images/main/btn_marketmore_off.png" alt="작가등록"> --></a>
      	</div>
          <h1 class="title_main">
              <a href="/marketPlace/index.php"><img src="/images/main/t1.png" alt="ARCHIVE" class="pc" /></a>
              <a href="/marketPlace/index.php"><img src="/images/main/t1_2.png" alt="ARCHIVE" class="mobile" /></a>
              <span class="title_sub"><!-- 온라인 작품거래 &middot  렌탈서비스 &middot 아카이브를 동시에 제공합니다. -->&nbsp;</span>
          </h1>

          <span class="bg_lft"></span>
          <span class="bg_rgh"></span>
          <div class="sort radio">
            <button class="all on" data-filter="*">ALL</button>
            <button class="rental" data-filter=".rental">RENTAL</button>
            <button class="buy" data-filter=".buy">BUY</button>
          </div>
          <button class="prev">
              <img src="/images/btn/btn_prev3.png" alt="이전으로" class="pc">
              <img src="/images/main/btn_ex2_prev.png" alt="이전" class="mobile">
          </button>
          <button class="next">
              <img src="/images/btn/btn_next3.png" alt="다음으로" class="pc">
              <img src="/images/main/btn_ex2_next.png" alt="이전" class="mobile">
          </button>

        <div class="Archive_inner">

          <div class="archive_cont box1">
            <ul></ul>
          </div><!--archive_cont-->
          <div class="archive_cont box2">
            <ul></ul>
          </div><!--archive_cont-->
        </div><!--media_inner-->
      </section><!--Archive section-->
            
      <!-- <section id="Sponsorship" class="on-page">
        <h1 class="title_main">
              <a href="/art1/award.php"><img src="/images/main/t5.png" alt="Sponsorship" class="pc" /></a>
              <a href="/art1/award.php"><img src="/images/main/t5_2.png" alt="Sponsorship" class="mobile" /></a>
              <span class="title_sub">특화된 프로그램의 미술상을 제정합니다.</span>
          </h1>
          <div class="bg-overay">
            <span class="pc"><img src="/images/main/bg4.jpg" alt=""  /></span>
            <span class="tb"><img src="/images/main/bg4_tb.jpg" alt=""  /></span>
            <span class="mo"><img src="/images/main/bg4_mo.jpg" alt=""  /></span>
          </div>
        <div class="Sponsorship_inner">
          <div class="Sponsorship_cont">
            <div class="clock"></div>
            <div class="Sponsorship_sample"><img src="/images/main/img_Sponsorship.png" alt=""></div>
            <div class="cont">
              <div class="txt1">
                <p><span class="space">아트1에서 제정한 '올해의 젊은작가상'은 역량있는 우수한 청년작가들의</span> 발굴과 후원을 위해 만들어졌습니다.</p>
                <p><span class="space">젊은 작가들의 활발한 작품활동을 위한 역량화사업으로</span> 시작된 '올해의 젊은작가상'에 많은 참여와 관심 부탁드립니다.</p>
      				<p>'올해의 작가상'이 <span class="space">2015년 11월 11일 시작됩니다.</span></p>

              </div>
              <div class="txt2">
      			  <p>아트1에서 제정한 '올해의 작가상'은 <span class="space">작가 발굴과 후원을 위해 만들어졌습니다.</span> <br /><span class="space">작가들의 활발한 작품활동을 위한 역량화 사업으로 시작된 </span>'올해의 작가상'에 많은 참여와 관심 부탁드립니다.</p>
                <p>01/ 국내외 유수의  작가, 큐레이터, 디렉터들의 지속적인 멘토링</p>
                <p>02/ 특별전 개최 및 시상식: 상금 및 상패 지급</p>
                <p>03/ 전시 작가 홍보</p>
              </div>
            </div>

          </div>archive_cont
        </div>media_inner
      </section>section -->


      <section id="Exhibition" class="on-page">
        <!--//전시회 정보 입력 S-->

        <div class="top_btn">
        	<a href="#ExhibitionPopup" class="more" onclick="exPop(); return false;"><button class="btnWhiteEdge">배너신청 +</button></a>
        </div>
        <img src="/images/main/bg5.jpg" alt="" class="bg-overay" style="height: 100%;">
        <!-- <img src="/images/main/bg_diagram_left.jpg" class="pic n1" alt="">
        <img src="/images/main/bg_diagram_right.jpg" class="pic n2" alt="">
        <img src="/images/main/img_dia_blue.png" class="pic n3" alt="">
        <img src="/images/main/img_dia_yellow.png" class="pic n4" alt=""> -->
        <h1 class="title_main" style="cursor:pointer;">
              <a href="#ExhibitionPopup" class="pc"  onclick="exPop(); return false;"><img src="/images/main/t2.png" alt="preview" /></a>
              <a href="#ExhibitionPopup" class="mobile"  onclick="exPop(); return false;">PREVIEW</a>
              <span class="title_sub"><!-- 전시 &middot 교육 &middot 학술 &middot 강좌소식을 공유합니다. -->&nbsp;</span>
          </h1>
          <button class="prev">
            <img src="/images/main/btn_ex_prev.png" alt="이전" class="pc">
            <img src="/images/main/btn_ex2_prev.png" alt="이전" class="mobile">
          </button>
          <button class="next">
            <img src="/images/main/btn_ex_next.png" alt="다음" class="pc">
            <img src="/images/main/btn_ex2_next.png" alt="다음" class="mobile">
          </button>
        <div class="Exhibition_inner">
          <div class="slideMotionBox">
            <div class="motionBox">
                <div class="box">



<script>

$(function(){
  // $(".more").on("mouseenter mouseleave" ,function(e){
    // if (e.type  ==  "mouseenter")  {
       // $(this).find("img").imgConversion(true);
    // }else{
      // $(this).find("img").imgConversion(false);
    // }
  // });
 $(document).on("keyup", "input:text[numberOnly]", function() {$(this).val( $(this).val().replace(/[^0-9]/gi,"") );});
 $(document).on("keyup", "input:text[datetimeOnly]", function() {$(this).val( $(this).val().replace(/[^0-9:\-]/gi,"") );});
 
 
  var btnTxt = {
 	sect1 : {off:"아트1 +", on:"사용팁"},
 	News : {off:"보도자료 +", on:"웹하드"},
 	Archive : {off:"작가등록 +", on:"작가등록 +"},
 	Exhibition : {off:"배너신청 +", on:"free"},
 };
 
	var nHover = 0;
	$("body").on("click touchstart",function(e){
		if($("#News .toolTip").css("visibility") == "visible"){
			$("#News .more button").html(btnTxt["News"]['off']);
			hideToolTip("#News .more");
			$("#News .more, #News .more a").blur();
			nHover = 0;
		}
	});
	$(".container_inner .more").bind("mouseover touchstart click",function(e){
		var myIdInfo = $(this).parent().parent().attr('id');
		$(this).find("button").html(btnTxt[myIdInfo]['on']);
		
		if( myIdInfo == "News"){
			showToolTip(this);
			if(nHover == 0){
				e.preventDefault();
				nHover = 1;
				return false;
			}
			e.stopPropagation();
		}
	});
	
	$(".container_inner .more").mouseleave(function(){
		var myIdInfo = $(this).parent().parent().attr('id');
		$(this).find("button").html(btnTxt[myIdInfo]['off']);
		if( myIdInfo = "News"){
			hideToolTip(this);
		}
	});



// var overMore = $(".container_inner .top_btn .more").on('mouseenter touchstart',function(e){
 		// myIdInfo = $(this).parent().parent().attr('id');
 		// $(this).find("button").html(btnTxt[myIdInfo]['on']);
 		// if( myIdInfo = "News"){
 			// showToolTip(this);
 		// }
 		// e.stopPropagation();
 		// return myIdInfo;
 // });
//
// $(".container_inner .top_btn .more").on('mouseleave',function(e){
 		// var myIdInfo2 = $(this).parent().parent().attr('id');
 		// $(this).find("button").html(btnTxt[myIdInfo]['off']);
 		// if( myIdInfo2 = "News"){
 			// hideToolTip(this);
 		// }
// });
//
// $('body').on('touchstart', function(e){
	// $(overMore).find(".top_btn .more button").html(btnTxt[overMore]['off']);
	// if( overMore = "News"){
		// hideToolTip(this);
	// }
// });

 $("#ExhibitionPopup .fileinputs .fakefile input").attr("placeholder","배너등록 (580*254px)");

});

function loginCheck(){ //로그인 체크를 한다.
	var id = "<?php echo isset($_SESSION['user_idx']);?>";
	if (id == "")	{
		if(confirm("로그인을 해야 사용할 수 있는 기능입니다.\r\n로그인 페이지로 이동하시겠습니까?")){
			location.href="/member/login.php?returnUrl="+location.href;
		}
		return false;
	}else{
		return true;
	}

}



function checkIDArert(id, msg){
	if($("#"+id).val()==""){
		alert(msg);
		$("#"+id).focus();
		return false;
	}else{
		return true;
	}
}

</script>
<!--//전시회 정보 입력 E-->


                  <div class="pos">

                  </div><!-- //lst -->
                  <!-- <div class="box_hong">
                    <div class="inner">
                      <h1>art1에 직접 광고신청하세요.</h1>
                      <h1>아트1 'PREVIEW'에 전시배너를 직접 등록하세요.</h1>
                      <p>2015년 11월 11일까지 <span class="space">모든 전시배너는 무료입니다.</span> </p>
                      <a href="#" class="more" onclick="exPop(); return false" ><img src="/images/main/btn_sin.jpg" alt="신청하기"></a>
                    </div>
                  </div> --><!-- //box_hong -->
                </div><!-- //box -->

             </div> <!-- //motionBox -->
          </div><!-- //slideMotionBox -->
        </div>
      </section>


<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/class/exhibition/exhibition.class.php';
$Exhibition = new Exhibition();
$Exhibition->setAttr("cfm", 'Y');
$tmp = $Exhibition->getList($dbh);
$total_cnt = $tmp[1];
?>



<script type="text/javascript">
     function exPop(){
    	 var CHeight = $("#wrap").outerHeight(true);
    	 var WHeight = $(window).height();
    	 var WScroll = $(window).scrollTop();
    	 $("#ExhibitionPopup").css("top",WHeight/2-200);
    	 $("#cover").css({'height':CHeight,'z-index':'11'});
    	 $("#cover").fadeIn(300);
        setTimeout(function(){
        $("#ExhibitionPopup").fadeIn(200);
        },200)
     }
     function exClose(){
    	 $("#cover").fadeOut(150);
         $("#ExhibitionPopup").fadeOut(200);
         
     }


//**************************************** bannerZone ****************************************





 function bannerZone(){
          var now = 14; // 현재 불러온 갯수
          var list = 20; //불러올 갯수
         // var total = 35; //배너 갯수
      var total = <?php echo $total_cnt;?>;

          var pageNum = 0; //현제 페이지
          var wideMode = false , mobileMode = false;
          var pageTotal = Math.ceil(total / list);
          var $obj = $("#Exhibition");
          var $mask = $("#Exhibition .slideMotionBox .box"); //마스크박스
          var $pos = $mask.find(".pos");
          var $prev = $obj.find(".prev");
          var $next = $obj.find(".next");
          var $box_hong = $obj.find(".box_hong");
          var WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
          var maskWIdth = $mask.outerWidth();


          var boxWdith = $mask.outerWidth() + 200; //마스크박스 크기





            resize();
            //con(pageTotal,"PREVIEW:::토탈페이지 값");
            pageingArea($obj,pageTotal+1);
            pageingOvrMotion($obj, pageNum ,1 , pageTotal+1)




           function resize(){

              WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

              if(maskWIdth !=  $mask.outerWidth()){
                  removeBox();
                  maskWIdth =  $mask.outerWidth();
              }

              if(WinWdith < 845){
                  if(!mobileMode){
                    //console.log("mobileMode");
                    list = 6;
                    removeBox();

                  }
                  wideMode = false;
                  mobileMode = true;

              }else{
                 if(!wideMode){
                  ////console.log("wideMode");
                    list = 14;
                    removeBox();
                  }
                  wideMode = true;
                  mobileMode = false;

              }
              pageingResizeMotion($obj,1025);

              var WinHeight = $(window).height();
              if(WinHeight >= 939 && WinWdith > 1080 ){
              	$("#arthongsSNS").height(WinHeight - $("#footer").outerHeight(true)-$("#header .header_inner").outerHeight(true)-5);
              }

              if($("#cover").css("display") != "none"){
              	var CHeight = $("#wrap").outerHeight(true);
	    	 	$("#cover").css({'height':CHeight});
	    	 }

           }//resize

           function removeBox(){
           	if(WinWdith < 845){
           		now = 6;
           	}else{
           		now = 14;
           	}
           	if(now >= total){
           		$next.hide();
           	}
            pageNum = 0;
            pageTotal = Math.ceil((total - now) / list);
            $pos.css("left",0).children().remove();
            $box_hong.css("left",0);
            //con(pageTotal,"PREVIEW:::토탈페이지 값");
             pageingArea($obj,pageTotal+1);
             pageingOvrMotion($obj, pageNum ,1 , pageTotal+1)
            ajaxData();

           }//removeBox

           function fadeMotion(p,s,d){
            var $Parent = $(p);
            var Speed = s;
            var Delay = d;
            var total = $Parent.find(" > * ").length;
            for (var i = 0; i < total; i++) {
              $Parent.find(" > *:eq("+i+") ").css({
                "top":0,
                "opacity":0
              }).stop().delay(Delay*i).animate({
                "top":0,
                "opacity":1
              },Speed)//

            };//fadeMotion







           }


          function ajaxData(){
                    if(WinWdith >= 845){
                     	$.ajax({
		                   type:"GET",
		           			url:"__ajax_bannerZone1_1.php",
		                   ansync : false,
		                   dataType:"html",
		                  // data:{"now":now,"list":list , "total":total},
		                   success : function(data) {
		                        var $container2;
		                        //console.log("ajax 시작");
		                          //$container.children().remove();
		                          var $ul = $('<ul class="lst"></ul>');
		                          $("<div id='tmpData'></div>").html(data).appendTo($pos);
		                          var data2 = $pos.find("#tmpData").html();
		                            $ul.append(data2);
		                            $pos.append($ul);
		                            $pos.find("#tmpData").remove();
		                           var imgLoad = imagesLoaded( $ul );
		                            imgLoad.on( 'always', onAlways );
		                          function onAlways( instance ) {
		                              $pos.css("width", ( (100 / $mask.find(".lst").length) * $mask.find(".lst").length ) +"%");
		                              $mask.find(".lst").css("width", ( Math.ceil(100 / $mask.find(".lst").length)  ) +"%");
		                              $mask.find(".lst > li.align2:nth-child(2n+1)").css("margin-left",0);
		                              $mask.find(".lst > li.align4:nth-child(4n-1)").css("margin-left",0);
		                              pageingMotion();
		                              ajaxData2();

		                          };
		                   },
		                   complete : function(data) {
		                   },
		                   error : function(xhr, status, error) {
		                    alert(error);
		                    //$container.children().remove();
		                    $('<p class="noProduct">상품이 존재하지 않습니다.</p>').appendTo($pos);
		                   }
		              });
		              return;
                    }else{
           			    $.ajax({
		                   type:"GET",
		           			url:"__ajax_bannerZone1_2.php",
		                   ansync : false,
		                   dataType:"html",
		                  // data:{"now":now,"list":list , "total":total},
		                   success : function(data) {
		                        var $container2;
		                        //console.log("ajax 시작");
		                          //$container.children().remove();
		                          var $ul = $('<ul class="lst"></ul>');
		                          $("<div id='tmpData'></div>").html(data).appendTo($pos);
		                          var data2 = $pos.find("#tmpData").html();
		                            $ul.append(data2);
		                            $pos.append($ul);
		                            $pos.find("#tmpData").remove();
		                           var imgLoad = imagesLoaded( $ul );
		                            imgLoad.on( 'always', onAlways );
		                          function onAlways( instance ) {
		                              $pos.css("width", ( (100 / $mask.find(".lst").length) * $mask.find(".lst").length ) +"%");
		                              $mask.find(".lst").css("width", ( Math.ceil(100 / $mask.find(".lst").length)  ) +"%");
		                              $mask.find(".lst > li.align2:nth-child(2n+1)").css("margin-left",0);
		                              $mask.find(".lst > li.align4:nth-child(4n-1)").css("margin-left",0);
		                              pageingMotion();
		                              ajaxData2();

		                          };
		                   },
		                   complete : function(data) {
		                   },
		                   error : function(xhr, status, error) {
		                    alert(error);
		                    //$container.children().remove();
		                    $('<p class="noProduct">상품이 존재하지 않습니다.</p>').appendTo($pos);
		                   }
		              });
		              return;
           			}

                /*  $.ajax({
                   type:"GET",
                   //url:"ajax_bannerZone.php",
           			url:"__ajax_bannerZone1_1.php",
                   ansync : false,
                   dataType:"html",
                  // data:{"now":now,"list":list , "total":total},
                   success : function(data) {
                        var $container2;
                        //console.log("ajax 시작");
                          //$container.children().remove();
                          var $ul = $('<ul class="lst"></ul>');
                          $("<div id='tmpData'></div>").html(data).appendTo($pos);
                          var data2 = $pos.find("#tmpData").html();
                            $ul.append(data2);
                            $pos.append($ul);
                            $pos.find("#tmpData").remove();
                           var imgLoad = imagesLoaded( $ul );
                            imgLoad.on( 'always', onAlways );
                          function onAlways( instance ) {
                              $pos.css("width", ( (100 / $mask.find(".lst").length) * $mask.find(".lst").length ) +"%");
                              $mask.find(".lst").css("width", ( Math.ceil(100 / $mask.find(".lst").length)  ) +"%");
                              $mask.find(".lst > li.align2:nth-child(2n+1)").css("margin-left",0);
                              $mask.find(".lst > li.align4:nth-child(4n-1)").css("margin-left",0);
                              pageingMotion();
                              ajaxData2();

                          };
                   },
                   complete : function(data) {
                   },
                   error : function(xhr, status, error) {
                    alert(error);
                    //$container.children().remove();
                    $('<p class="noProduct">상품이 존재하지 않습니다.</p>').appendTo($pos);
                   }
              }); */
          };//ajaxData

          function ajaxData2(){
                  $.ajax({
                   type:"GET",
                   //url:"ajax_bannerZone2.php",
           url:"__ajax_bannerZone2.php",
                   ansync : false,
                   dataType:"html",
                   data:{"now":now,"list":list , "total":total},
                   success : function(data) {
                        var $container2;
                        //console.log("ajax 시작");
                          //$container.children().remove();

                          var $ul = $('<ul class="lst type2"></ul>');
                          $("<div id='tmpData'></div>").html(data).appendTo($pos);
                          var data2 = $pos.find("#tmpData").html();
                            $ul.css("visibility","hidden").append(data2);
                            $pos.append($ul);
                            $pos.find("#tmpData").remove();
                           var imgLoad = imagesLoaded( $ul );
                            imgLoad.on( 'always', onAlways );
                            now = now + list;
                          function onAlways( instance ) {
                              $pos.css("width", $mask.outerWidth() * $mask.find(".lst").length  );
                              $mask.find(".lst").css({
                                "width":$mask.outerWidth(),
                                "visibility":"visible"
                              });
                                 if(WinWdith < 845){
                                  $mask.find(".lst.type2 > li").css("margin-left","");
                                 }else{
                                  $mask.find(".lst.type2 > li:nth-child(4n+1)").css("margin-left",0);
                                }



                               if(pageNum > 0) {
                                //posMotion("next");
                              }else{
                                 //pageingMotion();
                              }

                          };


                   },
                   complete : function(data) {

                   },
                   error : function(xhr, status, error) {
                    alert(error);
                    //$container.children().remove();
                    $('<p class="noProduct">상품이 존재하지 않습니다.</p>').appendTo($pos);

                   }
              });
          };//ajaxData2


          function pageingMotion(){
            /* //con("pageTotal ::: " + pageTotal);
             //con("pageNum ::: " + pageNum);*/
            $next.css("display",(pageTotal > pageNum) ? "block" : "none");
            $prev.css("display",(0 >= pageNum) ? "none" : "block");
           }//pageingMotion

           function posMotion(derection){

            ////con("모션 pageNum ::: " + pageNum);

            if(pageNum == 1){
                $box_hong.stop().animate({"left":"-100%"},400,"swing");
            }else if(pageNum == 0){
              $box_hong.stop().animate({"left":0},400,"swing");
            }

            if(derection == "next"){
              //$pos.find(".lst:eq("+(pageNum-1)+")").animate({"opacity":0},300,"easeInCubic");
              fadeMotion($pos.find(".lst:eq("+pageNum+")"),/*speed*/700,/*delay*/50);
              $pos.animate({
                "left":"-"+(100 * pageNum ) +"%"},400,"swing",function(){
                if(now < total){
                    ajaxData2();
                  }
              })

            }else if(derection == "prev"){

              $pos.animate({"left":"-"+(100 * pageNum) +"%"},400,"swing")
            }
            pageingMotion();

           }//posMotion

           $mask.swipe( {
              //Generic swipe handler for all directions
              swipeLeft:function(event, direction, distance, duration, fingerCount) {
               //tbox.text("You swiped " + direction + "  times " );
                if(!$pos.is(":animated")){
                    pageNum = (pageNum >= pageTotal) ? pageTotal : pageNum + 1;
                    posMotion("next");
                    pageingOvrMotion($obj, pageNum ,1 , pageTotal+1)
                 }


              },
               swipeRight:function(event, direction, distance, duration, fingerCount) {
                  if(!$pos.is(":animated")){
                    pageNum = (pageNum <= 0) ? 0 : pageNum - 1;
                    posMotion("prev");
                    pageingOvrMotion($obj, pageNum ,1 , pageTotal+1)
                  };
              },
              excludedElements:".noSwipe",
              threshold:80
            });





            $next.on("click",function(){
              if(!$pos.is(":animated")){
                  pageNum = (pageNum >= pageTotal) ? pageTotal : pageNum + 1;
                  posMotion("next");
                  pageingOvrMotion($obj, pageNum ,1 , pageTotal+1)
               }

            });

            $prev.on("click",function(){
                if(!$pos.is(":animated")){
                  pageNum = (pageNum <= 0) ? 0 : pageNum - 1;
                  posMotion("prev");
                  pageingOvrMotion($obj, pageNum ,1 , pageTotal+1)
                };
            });




           $(window).resize(function(){resize()});
        }//bannerZone

//**************************************** //bannerZone ****************************************
//bannerZone

</script>


<!--//쇼셜 S-->

      <section id="arthongsSNS" class="on-page n3">
        <h1 class="title_main">
          <button><img src="/images/main/t4.png" alt="ARTHONGS SNS" class="pc"></button>
          <!-- <img src="/images/main/t4_2.png" alt="ARTHONGS SNS" class="mobile"> -->
          <p class="mobile">SOCIAL</p>
          <span class="title_sub"><!-- 대중미술의 발전을 위한 소통의 장 -->&nbsp;</span>
        </h1>
        <ul class="share">
                <li><a href="https://www.facebook.com/art1com" target="_blank"><img src="/images/btn/btn_share1_off.png" alt="페이스북"></a></li>
                <li><a href="https://www.pinterest.com/art1com/" target="_blank"><img src="/images/btn/btn_share2_off.png" alt="핀터레스트"></a></li>
                <li><a href="https://instagram.com/art1com" target="_blank"><img src="/images/btn/btn_share3_off.png" alt="인스타그램"></a></li>
                <!-- <li><button><img src="/images/btn/btn_share4_off.png" alt="픽터파이"></button></li> -->
                <li><a><img src="/images/btn/btn_share5_off.png" alt="구글플러스"></a></li>
         </ul>
        <div class="bg-overay">
          <span class="pc"><!--<img src="/images/main/bg3.jpg" alt=""  />--></span>
          <span class="tb"><!--<img src="/images/main/bg3_tb.jpg" alt=""  />--></span>
          <span class="mo"><!--<img src="/images/main/bg3_mo.jpg" alt=""  />--></span>
        </div>
        <button class="prev">
            <img src="/images/main/btn_sns2_prev.png" alt="이전" class="pc">
            <img src="/images/main/btn_ex2_prev.png" alt="이전" class="mobile">
          </button>
          <button class="next">
            <img src="/images/main/btn_sns2_next.png" alt="다음" class="pc">
            <img src="/images/main/btn_ex2_next.png" alt="다음" class="mobile">
          </button>
        <div class="sns_inner">
          <div class="sns_cont clearfix">

			<article class="facebook bdrs" id="SnsFacebook">
            </article><!--//facebook-->



            <article class="pinterest bdrs" id="SnsPinterest">
            </article><!--//pinterest-->

            <article class="instagram bdrs" id="SnsInstagram">
            </article><!--//instagram-->

            <article class="pictify bdrs" id="SnsPictify">
            </article><!--//instagram-->
          </div><!--//sns_cont-->
        </div><!--//sns_inner-->
      </section><!---//arthongsSNS-->
 <section id="ExhibitionPopup" class="popup" style="position:fixed;display:none">
      <form name="frm_exh" onsubmit="return false" enctype="multipart/form-data">
          <div class="inner">
                        <h1>
                        	<p class="sub_hd">무료로 전시배너를 신청하세요.</p>
                        	<p>UPLOAD</p>
                        </h1>
                        <button class="close" onclick="exClose()"><img src="/images/btn/btn_close.png" alt="닫기"></button>
                        <div class="formMailType1">
                            <ul>
                              <li>
                                    <label for="exh_name" class="h"></label>
                                    <input type="text" name="exh_name" id="exh_name" class="inp_txt2" onfocus="loginCheck();" placeholder="신청자명(기관명)" >
                              </li>
                              <li>
                                    <label for="addr_tel" class="h"></label>
                                    <input type="text" name="exh_tel" id="exh_tel" class="inp_txt2" onfocus="loginCheck();" placeholder="연락처"  numberonly="true">
                              </li>
                              <li class="file">
                                    <label for="addr_file" class="h"></label>
                                    <div class="fileinputs" data-src="/images/btn/btn_upload3.gif">
                                      <input type="file" class="file" name="exh_file" id="exh_file" onfocus="loginCheck();" placeholder="" />
                                    </div>
                              </li>
                              <li>
                                    <label for="addr_link" class="h"></label>
                                    <input type="url" name="exh_link" id="exh_link" class="inp_txt2" onfocus="loginCheck();" placeholder="링크 URL(웹사이트, 블로그, SNS 등 택일)" >
                              </li>
                            </ul>
                            <div class="btn_bot">
                              <!-- button type="button" onclick="exh_send();" id="btnExhSend" class="btn_pack black">Send</button -->
             				 <button type="button"  id="btnExhSend" class="btn_pack black">Send</button>
              <!-- button onclick="exClose()" class="btn_pack black">Send</button -->
                            </div><!-- //btn_bot -->

	                        <div class="t1">
	                           <!-- <p>2015년 11월 11일까지 모든 전시배너는 무료입니다.</p>
	                           <p>배너는 580*254px 사이즈로 등록해 주세요</p> -->
	                           <p>관리자가 승인하면 바로 등록됩니다.</p>
	                           <p><strong>고객센터 02-6325-9271</strong></p>
	                        </div>
                      </div><!-- //formMailType1 -->
                    </div><!-- //inner -->
      </form>
</section><!-- //popup -->
<div id="cover" style="cursor: pointer;display:none;"  onclick="exClose()"></div>

<script type="text/javascript">

$("#btnExhSend").on("click",function(){
	var exh_name = $("#exh_name").val();
	var exh_tel = $("#exh_tel").val();
	var exh_file = $("#exh_file").val();
	var exh_link = $("#exh_link").val();

	if( checkIDArert("exh_name", "신청자명을 입력하셔야 합니다.") == false ){ return false; }
	if( checkIDArert("exh_tel", "연락처를 입력하셔야 합니다.")  == false ){ return false; }
	if( checkIDArert("exh_file", "베너를 등록하셔야 합니다.")  == false ){ return false; }
	if( checkIDArert("exh_link", "링크를 등록하셔야 합니다..")  == false ){ return false; }

	if(isNaN(exh_tel) == true){
		alert("연락처는 숫자만 입력하셔야 합니다.");
		exh_tel.focus();
		return false;
	}

	var formData = new FormData();

	formData.append("exh_name",$("input[name=exh_name]").val() );
	formData.append("exh_tel",$("input[name=exh_tel]").val() );
	formData.append("exh_file",$("input[name=exh_file]")[0].files[0] );
	formData.append("exh_link",$("input[name=exh_link]").val() );

	$.ajax({
		type:"POST",
		url:"__ajax_exh_update.php",
		//data:{"exh_name":exh_name,"exh_tel":exh_tel,"exh_file":exh_file,"exh_link":exh_link},
		data: formData,
		processData : false,
		contentType : false,
//		dataType:"JSON",
		success: function(data) {
//			alert(data);
			if (data == 1) {
				alert("등록 되었습니다. 관리자 확인 후 승인하면 등록됩니다.");
				frm_exh.reset();
				exClose();
				return false;
			} else if (data == 8) {
				alert("로그인 후 사용 가능 합니다.");
				return false;
			} else if (data == 7) {
				alert("입력란에 정보를 입력하셔야 합니다.");
				return false;
			} else if (data == 2) {
				alert("사용 가능 이미지 파일이 아닙니다.");
				return false;
			} else if (data == 3) {
				alert("베너로 등록할 이미지 파일이 없습니다.");
				return false;
			}else if (data == 9) {
				alert("데이터 변경에 실패하였습니다.");
				return false;
				//location.reload();
			}else{
				alert(data);
				//alert("입력 오류 입니다.");
				return false;
				//location.reload();
			}
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			return false;
		}
	});
	return false
});

$("#ExhibitionPopup .formMailType1 .file div.fileinputs").hover(function(){
	$("#ExhibitionPopup .formMailType1 .file .fakefile img").attr("src","/images/btn/btn_upload3_on2.gif").css({"border-color":"#ee3042","background-color":"#fff"});
},function(){
	$("#ExhibitionPopup .formMailType1 .file .fakefile img").attr("src","/images/btn/btn_upload3.gif").css({"border-color":"#969696","background-color":"#969696"});
});

</script>

<script>
function ajaxSoclal(id, url,idx){
	$.ajax({
        type:"POST",
        url:url,
        //data:params,
		data:{"id":id,"idx":idx},
        success:function(data){
            $("#"+id).html(data);
            snsAlign(id);
        },
        //beforeSend:showRequest,
        error:function(e){
            alert(e.responseText);
        }
    });
}
ajaxSoclal('SnsFacebook', '__ajax_sns.php',1);
ajaxSoclal('SnsPinterest', '__ajax_sns.php',6);
ajaxSoclal('SnsInstagram', '__ajax_sns.php',11);
//ajaxSoclal('SnsPictify', '__ajax_sns.php',16);

function snsAlign(id){
	var snsEle = $("#"+id+"");
	var snsConEle = snsEle.find(".sns_conbox .conbox_inner");
	if(snsConEle.length == 1){
		snsConEle.clone().appendTo(snsEle.find(".sns_conbox"));
	}
    $("#"+id+" .sns_conbox .conbox_inner:eq(0)").addClass("show");
	slideSns(id);
}
var snsInterval = new Array;
var startEnd = 0;
var snsSlidingcnt = 0;
function slideSns(id){
	var snsEle = $("#"+id+"");
	var snsConEle = snsEle.find(".sns_conbox .conbox_inner");
	var idx = $("#"+id+"").index();
	var snsInv = new Array;
	snsInv[idx] = new Object;
	snsInterval[idx] = setInterval(function(){
		startEnd = 0;
		setTimeout(function(){
			snsInv[idx]["tap"] = snsConEle.parent();
			snsInv[idx]["myobj"] = snsEle.find(".sns_conbox > .conbox_inner.show");
			snsInv[idx]["slide_len"] = snsConEle.length;
			snsInv[idx]["next"] = snsEle.find(".sns_conbox > .conbox_inner:eq("+(snsInv[idx]["myobj"].index()+1)%(snsInv[idx]["slide_len"])+")");
			
			snsInv[idx]["next"].stop().animate({left:"0px"},600);
			snsInv[idx]["myobj"].stop().animate({left:"100%"},600,function(){
				snsInv[idx]["myobj"].css("left","-100%");
				snsInv[idx]["next"].siblings().removeClass('show').end().addClass('show');
			});
		},500+(250*idx));
	},3000);
}

$(function(){
	$("#arthongsSNS .sns_inner, #arthongsSNS .prev, #arthongsSNS .next").hover(function(){
		startEnd = 1;
		stopInv('SnsFacebook');
		stopInv('SnsPinterest');
		stopInv('SnsInstagram');
	},function(){
		if(startEnd == 1){
			slideSns("SnsFacebook");
			slideSns("SnsPinterest");
			slideSns("SnsInstagram");
		}
	});
})

function stopInv(id){
	var idx = $("#"+id+"").index();
	clearInterval(snsInterval[idx]);
}
</script>


<!--//쇼셜 E -->
    </div><!-- //container_inner -->
  </section><!-- //container_main -->
  
  
<section id="mov_pop" onclick="closeMovPop();"><!-- 동영상 팝업 -->
	<div class="inner" onclick="donotClose(event);">
		<a href="#" onclick="closeMovPop();return false" class="close_btn"><img src="/images/main/btn_close05.png" alt="동영상 닫기"/></a>
		<div class="mov_box">
			<div id="movFlv"></div>
		</div>
<!--[if (gt ie 8)|(!ie)]>-->
		<div class="remote">
			<button class="prev"><img src="/images/main/btn_mov_prev.png" alt="이전 동영상으로"/></button>
			<button id="playPause" onclick="playPause();"><img src="/images/main/btn_mov_play.png" alt="재생 버튼"/></button>
			<button class="next"><img src="/images/main/btn_mov_next.png" alt="다음 동영상으로"/></button>
			<button onclick="fullSize();"><img src="/images/main/btn_full.png" alt="전체 영상 버튼"/></button>
		</div>
<!--<![endif]-->
	</div>
</section><!-- 동영상 팝업 -->
<!-- <section id="promo_pop" onclick="closePromoPop();">
	<div class="inner">
		<div class="con" onclick="donotClose(event);">
			<a class="img" href="/news/index.php?at=read&subm=1&idx=176462">
				<img class="pc" src="/images/main/bg_art1_show_v2.jpg?ver1.4">
				<img class="tablet" src="/images/main/bg_art1_show_tablet_v2.jpg?ver1.1">
				<img class="mobile" src="/images/main/bg_art1_show_mobile_v2.jpg?ver1.1">
			</a>
			<div class="donotshow">
				<input type="checkbox" id="donotsow"><label for="donotsow">오늘하루 보지 않기</label>
				<a href="javascript:;" onclick="closePromoPop();">[닫기]</a>
			</div>
		</div>
	</div>
</section>-->
  <? include "inc/footer.php"; ?>

<script src="/js/main_bak160203.js"></script>


  <script>

	// $(function() {
		// $(window).resize(function(){
			// if($("#promo_pop").css('display') != 'none'){
				// promoResize();
			// }
		// });
		// if(getCookie("promo_popup") != 1){
			// setTimeout(function(){
				// openPromoPop();
			// },800);
		// }
	// });	
	function promoResize(){
		var vw = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
		if(vw <= 580){
			$("#promo_pop > .inner img.pc, #promo_pop > .inner img.tablet").removeClass("on");
			$("#promo_pop > .inner img.mobile").addClass("on");
		}else if(vw <= 900){
			$("#promo_pop > .inner img.pc, #promo_pop > .inner img.mobile").removeClass("on");
			$("#promo_pop > .inner img.tablet").addClass("on");
		}else{
			$("#promo_pop > .inner img.tablet, #promo_pop > .inner img.mobile").removeClass("on");
			$("#promo_pop > .inner img.pc").addClass("on");
		}
		$("#promo_pop .donotshow").css("width",$("#promo_pop > .inner img.on").css("width"));
	}
	
	
	function openPromoPop(){
    	fadePlayMotion($("#promo_pop"), true, 500);
		promoResize();
    }
    
    function donotClose(e){
    	e.stopPropagation();
    }
    function closePromoPop(){
		if($("#donotsow").prop("checked") == true){
			setCookie("promo_popup",1,1);
		}else{
			setCookie("promo_popup",0,1);
		}
    	fadePlayMotion($("#promo_pop"), false, 400);
    }
  
  
  lstMovMotion("#sect1 .m_tlie");
  
    <? if($check_mobile == false){ ?>
    $(window).scroll(function(){
       _currentScrollTop = $(this).scrollTop();
      if(isie7 || isie8){}else{onPageMotion();}

    });
    if(isie7 || isie8){}else{onPageMotion();}


   <?} ?>
</script>
<? include "inc/bot.php"; ?>




<script>
$(function(){
	<?php
	if ($_SESSION['user_idx']){
	?>
			//loginPopClose();
	<?
	}
	?>
  /*  $( window ).stellar({
      hideDistantElements: false,
      horizontalScrolling: false
    });   */
   
});


</script>

