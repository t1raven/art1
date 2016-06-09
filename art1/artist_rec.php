<? include "../inc/config.php"; ?>
<?php
  $categoriName = "art1";
  $pageName = "Exhibition";
  $pageNum = "1";
  $subNum = "1";
  $thirdNum = "0";
  $pathType = "b";
  
  $idx = $_GET["idx"];
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
<link rel="stylesheet" type="text/css" href="/css/owen2.css">
<section id="container_sub">
	<div class="container_inner">
		<? include "../inc/path.php"; ?> 
		<? include "tab_art1_2.php"; ?>
		<? include "artist_rec_data.php"; ?>
<?
	$vData = new videoData;
	$vData -> checkData();
?>
			<section id="art1_artist_rec" class="content-mediaBox margin1">
				<article id="spot">
					<div class="inner">
						<div class="mov">
							<div class="inner">
								<div id="area_movie">
 <? if($check_ie === false){ ?>
								<button class="backPlay"  onclick="aristFn.showVideo(this);" data-video="<?= $vData->video ?>"><img src="<?= $vData->spotImg ?>" alt=""></button>
 <?}else{?>
 									<div id="ie_area_movie"></div>	
 <?}?>
								</div>
							</div>
						</div>
						<div class="con">
							<h2><?= $vData->title ?></h2>
							<div class="comment">
								<div class="inner">
									<div>
										<?= $vData->comment ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
				<section id="arist_tiles">
					<article class="inner">
						<div class="area_top clearfix">
							<div class="bx_lft">
								<section class="sect sec1">
									<div class="swiper-container">
										<ul class="swiper-wrapper clearfix">
<?foreach($vData->slideImg as $value){?>
											<li class="swiper-slide">
												<a href="http://art1.com/marketPlace/artist.php?idx=<?= $vData->arist[idx] ?>"><img src="<?= $value ?>" alt="" /></a>
											</li>
<?}?>											
										</ul>
									</div>
									<button class="pagi prev"><img src="/images/btn/btn_prev_op.png" alt="이전" /></button>
									<button class="pagi next"><img src="/images/btn/btn_next_op.png" alt="다음" /></button>
								</section>
							</div>
							<div class="bx_rgt">
								<div class="inner">
									<ul class="rgt_top clearfix">
										<li>
											<section class="sect sec2 out_cover" onclick=''>
												<img class="area_zoom ict_hide" src="<?= $vData->tile[0][img] ?>" alt="" />
<? if($vData->tile[0][linkType] == 'url'){?>												
												<a href="<?= $vData->tile[0][url] ?>" class="cover" <?php echo  substr($vData->tile[0][url],0,4)=='http' ? 'target="_blank"' : '' ?>>
<? }else{?>
												<a href="javascript:;" onclick="aristFn.showPop(<?= $vData->tile[0][url] ?>)" class="cover">
<? }?>
													<div class="bd"></div>
													<span class="h100"></span><div>
														<p class="tit"><?= $vData->tile[0][tit][0] ?></p>
														<p><?= $vData->tile[0][tit][1] ?></p>
														<p><?= $vData->tile[0][tit][2] ?></p>
													</div>
												</a>
											</section>
										</li>
										<li>
											<section class="sect sec3 out_cover" onclick=''>
												<img class="area_zoom ict_hide" src="<?= $vData->tile[1][img] ?>" alt="" />
<? if($vData->tile[1][linkType] == 'url'){?>												
												<a href="<?= $vData->tile[1][url] ?>" class="cover" <?php echo  substr($vData->tile[1][url],0,4)=='http' ? 'target="_blank"' : '' ?>>
<? }else{?>
												<a href="javascript:;" onclick="aristFn.showPop(<?= $vData->tile[1][url] ?>)" class="cover">
<? }?>
													<div class="bd"></div>
													<span class="h100"></span><div>
														<p class="tit"><?= $vData->tile[1][tit][0] ?></p>
														<p><?= $vData->tile[1][tit][1] ?></p>
														<p><?= $vData->tile[1][tit][2] ?></p>
													</div>
												</a>
											</section>
										</li>
									</ul>
									<ul class="rgt_bot clearfix">
										<li>
											<section class="sect sec_profile">
												<span class="h100"></span><div class="inner">
													<div class="bx_img">
														<div class="img">
															<img class="ict_hide" src="<?= $vData->arist[img] ?>" alt="" />
														</div>
														<a href="http://art1.com/marketPlace/artist.php?idx=<?= $vData->arist[idx] ?>"><span>&nbsp;</span><span>&nbsp;</span></a>
													</div>
													<div class="con">
														<h2><?= $vData->arist[name] ?></h2>
														<p><?= $vData->arist[nameE] ?></p>
													</div>
												</div>
											</section>
										</li>
										<li class="h200">
											<section class="sect sec4 out_cover" onclick=''>
												<img class="area_zoom ict_hide" src="<?= $vData->tile[2][img] ?>" alt="" />
<? if($vData->tile[2][linkType] == 'url'){?>
												<a href="<?= $vData->tile[2][url] ?>" class="cover" <?php echo  substr($vData->tile[2][url],0,4)=='http' ? 'target="_blank"' : '' ?>>
<? }else{?>
												<a href="javascript:;" onclick="aristFn.showPop(<?= $vData->tile[2][url] ?>)" class="cover">
<? }?>
													<div class="bd"></div>
													<span class="h100"></span><div>
														<p class="tit"><?= $vData->tile[2][tit][0] ?></p>
														<p><?= $vData->tile[2][tit][1] ?></p>
														<p><?= $vData->tile[2][tit][2] ?></p>
													</div>
												</a>
											</section>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="area_bot">
							<ul>
								<li class="bx_lft">
									<section class="sect sec5 out_cover" onclick=''>
												<img class="area_zoom ict_hide" src="<?= $vData->tile[3][img] ?>" alt="" />
<? if($vData->tile[3][linkType] == 'url'){?>
												<a href="<?= $vData->tile[3][url] ?>" class="cover" <?php echo  substr($vData->tile[3][url],0,4)=='http' ? 'target="_blank"' : '' ?>>
<? }else{?>
												<a href="javascript:;" onclick="aristFn.showPop(<?= $vData->tile[3][url] ?>)" class="cover">
<? }?>
													<div class="bd"></div>
													<span class="h100"></span><div>
														<p class="tit"><?= $vData->tile[3][tit][0] ?></p>
														<p><?= $vData->tile[3][tit][1] ?></p>
														<p><?= $vData->tile[3][tit][2] ?></p>
													</div>
												</a>
									</section>
								</li>
								<li class="bx_rgt">
									<section class="sect sec6 out_cover" onclick=''>
										<img class="area_zoom ict_hide" src="<?= $vData->tile[4][img] ?>" alt="" />
<? if($vData->tile[4][linkType] == 'url'){?>
										<a href="<?= $vData->tile[4][url] ?>" class="cover" <?php echo  substr($vData->tile[4][url],0,4)=='http' ? 'target="_blank"' : '' ?>>
<? }else{?>
										<a href="javascript:;" onclick="aristFn.showPop(<?= $vData->tile[4][url] ?>)" class="cover">
<? }?>
											<div class="bd"></div>
											<span class="h100"></span><div>
												<p class="tit"><?= $vData->tile[4][tit][0] ?></p>
												<p><?= $vData->tile[4][tit][1] ?></p>
												<p><?= $vData->tile[4][tit][2] ?></p>
											</div>
										</a>
									</section>
								</li>
							</ul>
						</div>
					</article>
<script>
	function setSwiper(){
		var tileSp = new Swiper("#arist_tiles .sec1 .swiper-container", {
			cssWidthAndHeight : 'height',
			loop : true
		});
		var t = $("#arist_tiles .sec1");
		t.find('button.prev').click(function(){
			tileSp.swipePrev();
			event.preventDefault ?  event.preventDefault() : event.returnValue = false;
		});
		t.find('button.next').click(function(){
			tileSp.swipeNext();
			event.preventDefault ?  event.preventDefault() : event.returnValue = false;
		});
	}
	
	setSwiper();
	
</script>					
				</section>
			</section>
			<section id="artist_list" class="list_art1_t1 content-mediaBox margin1">
				<h2>All Artists Rec</h2>
				<div class="list">
					<ul class="clearfix">
<?foreach(array_reverse($artistList) as $value){?>
						<li>
							<div class="inner">
								<div class="img out_cover">
									<a href="/art1/artist_rec.php?idx=<?= $value[idx] ?>">
										<img class="area_zoom" src="<?= $value[img] ?>" alt="" />
									</a>
									<div class="cover_r">
										<span class="h100"></span><p><?= $value[txt] ?></p>
									</div>
								</div>
							</div>
						</li>
<?}?>
					</ul>
				</div>
			</section>

<? if($check_ie === true){ ?>
	<script src="/js/jwplayer.js"></script>
<?}?>

<? if($check_ie === true){ ?>
<script>
  $(function(){
      var jwp = jwplayer('ie_area_movie').setup({
           controls: false, // v6
           controlbar: "none", //v5
           width: "100%",
           height: "100%",
           image: "<?= $vData->spotImg ?>",
           autostart: false,
           repeat:"always",
           icons: false, // disable a big play button on the middle of screen
           flashplayer: "/swf/jwplayer44.swf",
           file: "/<?= $vData->video ?>.flv"
       });    
})
</script>
<?}?>

<script>
	

	var aristFn = {
		popScl : '',
		showVideo : function(me){
			var video = $(me).data('video');
			var par = $(me).parent();
			if(par.find('video').length == 0){				
<?if($check_mobile === false){?>
          		par.append("<video poster='<?= $vData->spotImg ?>' controls=''><source src='/"+video+".mp4' type='video/mp4'><source src='/"+video+".ogv' type='video/ogv'></video>");
<?}else{?>
          		par.append("<video poster='<?= $vData->spotImg ?>' controls=''><source src='/"+video+"_m.mp4' type='video/mp4'><source src='/"+video+"_m.ogv' type='video/ogv'></video>");
<?}?>
			}
			//$(me).remove();
			var v_ele = par[0].getElementsByTagName('video')[0];
			if (v_ele.requestFullscreen) {
			  v_ele.requestFullscreen();
			} else if (v_ele.mozRequestFullScreen) {
			  v_ele.mozRequestFullScreen();
			} else if (v_ele.webkitRequestFullscreen) {
			  v_ele.webkitRequestFullscreen();
			}
			v_ele.play();
		},
		showPop : function(o){
			var t = $("#pop_artist_rec");
			$.ajax({
				url : 'artist_rec_popup.php',
				dataType : 'html',
				data : {"idx" : o.idx, "tile" : o.tile},
				success : function(data){
					t.find('.inner_d2 > .bx_con').html(data);
					popFn.show(t,function(){
						aristFn.popScl = new IScroll('#pop_artist_rec .con > .inner',{
							scrollbars: 'custom',
						    mouseWheel: true,
						    disableMouse: true
						});
					});
				},
				error : function(xhr, status, error) {
					alert(error);
				}
			})
		}
	}
	
	var alignFn = {
		dv : 767,
		area : $("#art1_artist_rec"),
		ctScroll : "",
		setting : function(){
			var vw = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
			var desc = $("#art1_artist_rec #spot .con > .comment");
			if(vw > 767){
				desc.css('top',$("#art1_artist_rec #spot .con > h2").outerHeight(true));
				if(!this.area.hasClass('pc')){
					this.area.addClass('pc').removeClass('mobile');
					iCutterOwen(["#arist_tiles .sect"]);
					this.ctScroll = new IScroll('#spot .comment',{
						scrollbars: 'custom',
					    mouseWheel: true,
					    disableMouse: true,
						preventDefault : false
					});
				}
				setTimeout(function(){
					alignFn.setScrollBar();
				},61)
				
			}else if(vw <= 767 && !this.area.hasClass('mobile')){
				this.area.addClass('mobile').removeClass('pc');
				iCutterOwen(["#arist_tiles .sect"]);
				desc.css('top','');
				if(this.ctScroll){
					setTimeout(function(){
						alignFn.ctScroll.destroy();
					},61)
				}
			}
		},
		setScrollBar : function(){
			var scroll_bar = $(".iScrollVerticalScrollbar")
			scroll_bar.css('display',scroll_bar.find(' > .iScrollIndicator').css('display'));
		} 
	}
	
	alignFn.setting();
	iCutterOwen(["#arist_tiles .sect", '#arist_tiles .sec_profile .img', '#artist_list > .list .img']);
	$(window).resize(function(){
		alignFn.setting();
	})
	$(function(){
		//aristFn.showPop();
	})
	
</script>
		<div id="pop_common"></div>
		<div id="pop_artist_rec" class="pop_type1">
			<div class="inner">
				<header>
					<div class="inner">
						<h2>artist note [작가노트]</h2>
						<button class="btn_close" onclick="popFn.hide($('#pop_artist_rec'));"><img src="/images/btn/btn_close.png" alt="" /></button>
					</div>
				</header>
				<div class="con">
					<div class="inner">
						<div class="inner_d2">
							<div class="bx_con">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div><!-- //container_inner -->
	</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





