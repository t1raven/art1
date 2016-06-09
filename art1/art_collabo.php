

<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/goods/goods.class.php');
include "../inc/config.php";

  $categoriName = "art1";
  $pageName = "Exhibition";
  $pageNum = "1";
  $subNum = "2";
  $thirdNum = "0";
  $pathType = "b";
  
$Goods = new Goods();
$limitedNbr = $Goods->getLimitedNbr($dbh);
//$cnt = count($limitedNbr)
foreach($limitedNbr as $val) {
	//$aTemp .= $val['limited_nbr'].'|';
	$aTemp[$j] = $val['limited_nbr'];
	++$j;
}
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
			<section id="art1_art_collabo" class="content-mediaBox margin1">
				<article id="spot">
					<div class="inner clearfix">
						<div class="img">
							<div class="bx_slide">
								<ul>
									<li class="on"><img src="/images/art1/img_barbie_rol2.jpg" alt="" /></li>
									<li><img src="/images/art1/img_barbie_rol6.jpg" alt="" /></li>
									<li><img src="/images/art1/img_barbie_rol5.jpg" alt="" data-top="-35" /></li>
									<li><img src="/images/art1/img_barbie_rol3.jpg" alt="" data-top="-50" /></li>
									<li><img src="/images/art1/img_barbie_rol7.jpg" alt="" data-top="-50" /></li>
								</ul>
								<button class="btn_prev" onclick="collabPage(-1)"><img src="/images/btn/btn_prev_op.png" alt="이전"></button>
								<button class="btn_next" onclick="collabPage(1)"><img src="/images/btn/btn_next_op.png" alt="다음"></button>					
							</div>
							<div class="thumnail">
								<ul>
								</ul>
							</div>
							<div class="comment">
								<div class="inner">
									아트1의 2015년 첫 번째 ‘Art Collaboration’ 프로모션에 함께할 아티스트는 윤정원 작가다. 이번 프로모션을 통해 판매되는 작품은 윤정원 작가의 작품 ‘Barbie’다.
									오랫동안 소녀들의 로망이자 아름다움의 상징으로 많은 사랑을 받아온 바비인형에 다양한 재료들을 꼴라주하여 새로운 모습의 작품 ‘Barbie’를 탄생시켰다. 대량생산된 공산품 바비인형에 작가의 손길이 더해져 단 하나의 특별한 작품 ‘Barbie’로 거듭난 것이다. 아트1은 ‘Art Collaboration’ 프로모션을 기념하여 스페셜 에디션으로 100점 한정 제작된 윤정원 작가의 작품 ‘Barbie’를 ₩314,000 이라는 특별가로 소장할 수 있는 기회를 제공한다. ‘모두에게 익숙한 바비인형을 소재로 한 이번 작품을 통해 대중들이 미술 작품을 보다 친숙하게 느끼길 기대한다.
									아트1의 ‘Art Collaboration’은 그동안 어렵고 멀게만 느껴졌던 작품구매를 손쉽게 할 수 있는 기회를 제공하는 프로모션이다. 아트1은 앞으로도 다양한 아티스트와의 아트 콜라보레이션을 통해 특별한 프로모션을 지속적으로 선보일 예정이다.
								</div>
							</div>
						</div>
						<div class="con">
							<hgroup>
								<h2>Barbie</h2>
								<h3>Special Limited Edition 100</h3>
								<h4>￦ 314,000</h4>
							</hgroup>
							<div class="info">
								<h4>DETAIL</h4>
								<dl>
									<dt>Name of Artist</dt>
									<dd>Yoon jeoung won(윤정원)</dd>
									<dt>Medium</dt><dd>Mixed Media</dd>
									<dt>Size</dt><dd>16 x 45.5 x 8</dd>
									<dt>Year</dt><dd>2015</dd>
								</dl>
							</div>
							<div class="info">
								<h4>SHIPPING</h4>
								<h5>￦10,000(특별패키지 ￦10,000 / 배송비 무료)</h5>
								<p>
									(배송기간 1~2일)<br />미술작품의 특성상 반품 및 취소가 불가합니다.<br />
									에디션 선택의 특성상 2점 이상 구매하실 경우 각각 결제해 주시기 바랍니다.
								</p>
							</div>
							<div class="info">
								<form name="goodsFrm" id="goodsFrm" method="post" action="/basket/index.php" onsubmit="return false;">
									<input type="hidden" name="at" value="update">
									<input type="hidden" name="ord" id="ord">
									<input type="hidden" name="goods" id="goods" value="310">
									<input type="hidden" name="order_cnt" value="1">
									<ul class="bx_form">
										<li>
											<label for="edition_no">Edition No.</label>
											<div>
												<input type="text" id="limited_nbr" readonly="">
											</div>
											<div class="edittionbox" onclick="stopgoup(event)">
												<p class="info">에디션 넘버를 선택해 주세요. 회색 숫자는 이미 판매가 완료된 넘버입니다.</p>
												<ul>
													<?php for($i = 1; $i <= 100; $i++):?>
														<li><button<?php if (in_array($i, $aTemp)) { ?> class="out"<?php } ?>><?php echo $i; ?></button></li>
													<?php endfor; ?>
												</ul>
												<button class="close">X</button>
											</div>
										</li>
									</ul>
								</form>
							</div>
							<div class="btn_bns"><button class="btn_pack black" id="btnBasket">구매하기</button></div>
						</div>
					</div>
				</article>
<script src="/js/jquery.transform2d.js"></script>
<script>
	function alignSpot(){
		iCutter("#art1_art_collabo #spot .bx_slide > ul > li");
		var artSpot = $("#art1_art_collabo #spot .bx_slide > ul > li");
		var str = "";
		for(var k = 0 ; k < artSpot.length ; k++){
			var img = artSpot.eq(k).html();
			str +='<li '+(k==0 ? "class=\'on\'" : "")+'><a href="javascript:;">'+img+'</a></li>'
		}
		$("#art1_art_collabo #spot .thumnail > ul").html(str);
		
		artSpot = [
			$("#art1_art_collabo #spot .bx_slide > ul > li"),
			$("#art1_art_collabo #spot .thumnail > ul > li")
		];
		for(var j = 0 ; j < artSpot.length ; j++){
			for(var i = 0 ; i < artSpot[j].length ; i++){
				var img = artSpot[j].eq(i).find('img')
				var top = img.data('top');
				if(top){
					img.css('top',top+'%');
				}
			}
		}
		$("#art1_art_collabo #spot .thumnail a").on('click',function(){
			var conLi = $("#art1_art_collabo #spot .bx_slide > ul > li");
			var par = $(this).parent();
			var idx = par.index();
			collaboSpotMotion({tab : par, con : conLi, idx : idx});
		})
	}
	alignSpot();
	$(function(){
		$("#art1_art_collabo #spot .bx_slide li").swipe({
			swipeLeft : function(event){
				collabPage(1);
			},
			swipeRight : function(){
				collabPage(-1);
			}
		});
	})
	function collaboSpotMotion(o){
		if(!o.tab.hasClass('on')){
			o.tab.siblings('.on').removeClass('on').end().addClass('on');
			o.con.eq(o.idx).siblings('.on').removeClass('on').end().addClass('on');
		}
	}
	
	function collabPage(dire){
		var tabLi = $("#art1_art_collabo #spot .thumnail > ul > li");
		var tabOn = tabLi.filter('.on');
		var len = tabLi.length;
		var idx = (tabOn.index() + dire + len) % len;
		var cont = $("#art1_art_collabo #spot .bx_slide > ul > li");
		var tab = tabLi.eq(idx);
		collaboSpotMotion({
			tab: tab,
			con: cont,
			idx: idx
		});
	}
	
	
	
	$("#limited_nbr").click(function(e) {
		var edbx = $(".edittionbox");
		edbx.css("display", "block").find("li>button").on("click.edittion", function() {
			if(!$(this).hasClass("out")) {
				var num = $(this).text();
				$("#limited_nbr").val(num);
				edbx.css("display", "none");
			}
		});
		stopgoup(e);
		$('body').on('click', hide);
		edbx.find(".close").on("click.edittionbox", hide);
		
		function hide(){
			edbx.css("display", "none").find(".close").off("click.edittionbox");
			$('body').off('click');
		}
	});
	$("#btnBasket").bind("click", function(){order("basket");});
	
	function order(ord) {
		if ($("#limited_nbr").val() == "") {
			alert("에디션넘버를 입력하세요.");
			$("#limited_nbr").focus();
			return false;
		}
		else {
			//alert("준비 중 입니다..");
			$("#ord").val(ord);
			document.goodsFrm.target = "action_ifrm";
			document.goodsFrm.submit();
		}
	}
</script>						
				<section id="arist_tiles">
					<article class="inner">
						<div class="area_top clearfix">
							<div class="bx_lft">
								<section class="sect sec1">
									<img class="area_zoom" src="/images/art1/art_collab_tile1.jpg" alt="" />
								</section>
							</div>
							<div class="bx_rgt">
								<div class="inner">
									<ul class="rgt_top clearfix">
										<li>
											<section class="sect sec2">
												<img src="/images/art1/art_collab_tile2.jpg" alt="" />
											</section>
										</li>
										<li>
											<section class="sect sec3">
												<img src="/images/art1/art_collab_tile3.jpg" alt="" />
											</section>
										</li>
									</ul>
									<ul class="rgt_bot clearfix">
										<li>
											<section class="sect sec_profile">
												<img src="/images/art1/art_collab_tile4.jpg" alt="" />
											</section>
										</li>
										<li class="h200">
											<section class="sect sec4">
												<img src="/images/art1/art_collab_tile5.jpg" alt="" />
											</section>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="area_bot">
							<ul>
								<li class="bx_lft">
									<section class="sect sec5" onclick=''>
										<img src="/images/art1/art_collab_tile6.jpg" alt="" />
									</section>
								</li>
								<li class="bx_rgt">
									<section class="sect sec6">
										<img src="/images/art1/art_collab_tile7.jpg" alt="" />
									</section>
								</li>
							</ul>
						</div>
					</article>
				</section>
				<div class="movie">
<? if($check_ie === false){ ?>
					<button class="play" onclick="playVid(3,this);"><img src="/images/bg/bg_mov_promotionBarble_play.jpg" alt="동영상 플레이 하기"></button>
					<video id="movA4" poster="/images/bg/bg_mov_promotionBarble.jpg" controls=""><source src="/Promotion_barble.mp4" type="video/mp4"><source src="/Promotion_barble.ogv" type="video/ogv"></video>
<?}else{?>
					<div id="art1_promotion_IeMov"></div>   
<?}?>
				</div>
				<section id="sec_artist">
					<ul class="clearfix">
						<li class="img">
							<img src="/images/art1/art_collab_artist1.jpg" alt="" />
							<div class="name">
								<p>윤정원</p>
								<p>Yoon jeong won </p>
							</div>
						</li>
						<li class="con">
							<dl>
								<dt>학력</dt>
								<dd>2014  독일 스투트가르트 국립조형대학 대학원 졸업</dd>
								<dd>2014  독일 뒤셀도르프 쿤스트아카데미 수학</dd>
								<dd>2013  독일 스투트가르트 국립조형대학 졸업</dd>
							</dl>
							<dl>
								<dt>개인전</dt>
								<dd>2013 최고의 사치, 트렁크갤러리, 서울</dd>
								<dd>2012 Fantasy Universe, 애경백화점_ AK 갤러리, 수원</dd>
								<dd>2011 Smileplanet at Royal and Skape, 갤러리 스케이프 & 갤러리 로얄, 서울</dd>
							</dl>
							<dl>
								<dt>그룹전</dt>
								<dd>2014 욕망의 여섯 가지 얼굴, 스페이스K_광주, 광주</dd>
								<dd>2013 서울시립 북서울미술관 개관전 Ⅱ부: 장면의 재구성 #2 _ NEW SCENES, 서울 시립 북서울미술관, 서울 애니마믹 비엔날레 2013-2014, 내 안의 드라마, 대구미술관, 대구</dd>
							</dl>
						</li>
					</ul>
				</section>
				<section id="collabo_list" class="list_art1_t1 content-mediaBox margin1">
					<h2>All Art Collabo</h2>
					<div class="list">
						<ul class="clearfix">
							<li>
								<div class="inner">
									<div class="img">
										<a href="/art1/art_collabo.php">
											<img src="/images/art1/art_collab_list1.jpg" alt="" />
										</a>
									</div>
									<div class="con">
										<h3>"Barbie"</h3>
										<p>Special Limited Edition 100</p>
										<p>2015.11.24 ~ 12.3</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</section>
			</section>
<script>
	var aristFn = {
		showVideo : function(me){
			var video = $(me).data('video');
			var par = $(me).parent();
			if(par.find('video').length == 0){				
<?if($check_mobile === false){?>
          		par.append("<video poster='/images/bg/bg_mov_noPlay10' controls=''><source src='/"+video+".mp4' type='video/mp4'><source src='/"+video+".ogv' type='video/ogv'></video>");
<?}else{?>
          		par.append("<video poster='/images/bg/bg_mov_noPlay10.jpg' controls=''><source src='/"+video+"_m.mp4' type='video/mp4'><source src='/"+video+"_m.ogv' type='video/ogv'></video>");
<?}?>
			}
			$(me).remove();
			par[0].getElementsByTagName('video')[0].play();
		}
	}
	
	var alignFn = {
		dv : 767,
		area : $("#art1_art_collabo"),
		ctScroll : "",
		setting : function(){
			var vw = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
			if(vw > 767){
				if(!this.area.hasClass('pc')){
					this.area.addClass('pc').removeClass('mobile');
					iCutterOwen(["#arist_tiles .sect"]);
					this.ctScroll = new IScroll('#spot .comment',{
						scrollbars: 'custom',
					    mouseWheel: true,
						disableMouse: true
					});
				}
				
			}else if(vw <= 767 && !this.area.hasClass('mobile')){
				this.area.addClass('mobile').removeClass('pc');
				iCutterOwen(["#arist_tiles .sect"]);
				if(this.ctScroll){
					setTimeout(function(){
						alignFn.ctScroll.destroy();
					},61)
				}
			}
		}
	}
	
	alignFn.setting();
	iCutterOwen(["#arist_tiles .sect", '#arist_tiles .sec_profile .img', '#artist_list > .list .img']);
	$(window).resize(function(){
		alignFn.setting();
	})
	
</script>
<? if($check_ie === true){ ?>
	<script src="/js/jwplayer.js"></script>
<?}?>
<script>
<? if($check_ie === true){ ?>
  $(function(){
      var jwp =null,

       jwp = jwplayer('art1_promotion_IeMov').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           image: "/images/bg/bg_mov_promotionBarble.jpg",
                           autostart: false,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/Promotion_barble.flv"
                       });


})
<?}?>
      var vid = [
        document.getElementById("movA1"),
        document.getElementById("movA2"),
        document.getElementById("movA3"),
        document.getElementById("movA4")
      ]

      function playVid(n,t) { 
          var $this = $(t);
          $this.css("display","none");
          vid[n].play(); 

      } 

      function pauseVid() { 
          vid[n].play(); 
      }
    </script>
		</div><!-- //container_inner -->
	</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





