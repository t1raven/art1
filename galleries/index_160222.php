<? include "../inc/config.php"; ?>
<?php
  $categoriName = "GALLERIES";
  $pageName = "GALLERIES";
  $pageNum = "4";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
<script src="/js/idangerous.swiper.min.js"></script>
<section id="container_sub">
	<div class="container_inner">
		<? include "../inc/path.php"; ?>
		<div id="area_gallery_index" class="content-mediaBox margin1">
			<div class="top_btn">
				<a href="/homeguide/guide.php" class="more"><button class="btnWhiteEdge">Join +</button></a>
			</div>
			<section id="gallery_spot">
				<div class="bx_slide">
					<ul class="swiper-wrapper">
						<li class="swiper-slide">
							<a href="">
								<img src="/images/galleries/bg_spot1.jpg" alt="" class="ict_hide"/>
								<span class="txt">
									<strong>국제갤러리</strong>
									<span>서울특별시 종로구 소격동 59-1</span>
								</span>
							</a>
						</li>
						<li class="swiper-slide">
							<a href="">
								<img src="/images/galleries/bg_spot1.jpg" alt=""  class="ict_hide"/>
								<span class="txt">
									<strong>국제갤러리</strong>
									<span>서울특별시 종로구 소격동 59-1</span>
								</span>
							</a>
						</li>
					</ul>
					<div class="pagination"></div>
				</div>
			</section>
			<section id="sect_gallery_list">
				<header>
					<form>
					<!-- <ul class="sort_lst">
						<li>
							<dl class="sort_box">
								<dt><button><span>지역별</span></button></dt>
								<dd>
									<ul>
										<li class="n0"><button data-area-idx="0">모든지역</button></li>
										<li class="n1"><button data-area-idx="1">서울</button></li>
										<li class="n2"><button data-area-idx="2">서울 외 지역</button></li>
									</ul>
								</dd>
							</dl>
						</li>
						<li>
							<dl class="sort_box">
								<dt><button><span>정렬</span></button></dt>
								<dd>
									<ul>
										<li class="n0"><button data-solt="recent">최신순</button></li>
										<li class="n1"><button data-solt="hit">히트순</button></li>
									</ul>
								</dd>
							</dl>
						</li>
					</ul> -->
					<div class="bx_search">
						<p><input type="text" /> <button class="btn_pack samll2 black area_lato">Search</button></p>
					</div>
					</form>
				</header>
				<div class="gallery_list area_lato">
					<ul>
<?for($i = 1 ; $i < 10 ; $i++){?>
						<li>
							<div class="img out_cover">
								<img class="area_zoom" src="/images/galleries/img_gallery<?= $i ?>.jpg" alt="갤러리 이미지" />
								<a class="cover" href="about.php">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<h4>OPERA GALLERY</h4>
								<p>Gangnam-gu, Seoul</p>
							</div>
						</li>
<? if($i === 9){?>
						<li class="w3">
							<a href="" target="_blank" class="banner"><img src="/images/galleries/bg_main_banner1.jpg" alt="" /></a>
						</li>
<?}?>
<? } ?>
					</ul>
				</div>
			</section>
<script>
iCutterOwen("#gallery_spot > .bx_slide > ul > li > a");
var soptSp = new Swiper("#gallery_spot > .bx_slide", {
	pagination : "#gallery_spot .pagination",
	paginationClickable : true,
	cssWidthAndHeight : 'height'
});

$(function(){ 
	sortDesignMotion(".sort_box");
	$(".sort_lst dl.sort_box dd > ul > li").on("mousedown",function(event){
	}); 
});

function sortDesignMotion(obj) {
	var o = $(obj);
	function selectRemove() {
		o.css({"z-index": 2}).find("dd").css({"display": "none"});
	}
	o.each(function() {
		var t = $(this);
		var name = $(this).find("dt").text();

		function selectOptionOpen(event) {
			event.stopPropagation();
			var elemt = $(this);
			var option = elemt.parent().next();
			var box = elemt.parents("dl");
			var open = option.css("display") == "block";
			if(!open) {
				selectRemove();
				box.css("z-index", 5);
				option.slideDown(300);
			} else {
				box.css("z-index", 2);
				option.slideUp(300);
			}

			$("html").off().on("mousedown", function(event) {
				if(event.which == 1) {
					box.css("z-index", 2);
					option.slideUp(300);
				}
			});

			option.find("button").off().on("mousedown", function(event) {
				if(event.which == 1) {
					var num = $(this).parent().attr("class").replace("n", "");
					if(num == 0) {
						box.find("dt>button>span").text(name);
					} else {
						box.find("dt>button>span").text($(this).text());
					}
				}
			});
		} //selectOptionOpen
		t.find(">dt>button").on("mousedown", selectOptionOpen)
	});
};
	
</script>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





