<?php
require $_SERVER['DOCUMENT_ROOT'].'/lib/include/global.inc.php';
require ROOT.'lib/class/galleries/'.basename(__DIR__).'.class'.SOURCE_EXT;

$sw = isset($_GET['sw']) ? LIB_LIB::CkSearch($_GET['sw']) : null;

$params = 'sw='.urlencode($sw);

$categoriName = 'GALLERIES';
$pageName = 'GALLERIES';
$pageNum = '4';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

$i = 0;

include '../inc/link.php';
include '../inc/top.php';
include '../inc/header.php';
include '../inc/spot_sub.php';

$galleries = new Galleries();
$galleries->setAttr('sw', $sw);
$tmp = $galleries->getList($dbh);
$list = $tmp[0];
$totalCnt = (int)$tmp[1];
$mainbanner = $galleries->getMainBannerList($dbh);
$barbanner = $galleries->getBarBanner($dbh);
//print_r($barbanner);
?>
<script src="/js/idangerous.swiper.min.js"></script>
<section id="container_sub">
	<div class="container_inner">
		<?php include '../inc/path.php'; ?>
		<div id="area_gallery_index" class="content-mediaBox margin1">
			<div class="top_btn">
				<button class="btnWhiteEdge" onclick="location.href='/galleries/join_info.php/'">Join +<span class="hv">입점신청</span></button>
			</div>
			<?php if (is_array($mainbanner) && count($mainbanner) > 0) : ?>
			<section id="gallery_spot">
				<div class="bx_slide">
					<ul class="swiper-wrapper">
						<?php foreach($mainbanner as $val) : ?>
						<li class="swiper-slide">
							<a href="<?php echo $val['link']; ?>">
								<img src="<?php echo galleriesBannerUploadPath, $val['upfileName']; ?>" alt="" class="pc"/>
								<img src="<?php echo galleriesBannerUploadPath, $val['mobileupfileName']; ?>" alt="" class="mobile"/>
								<span<?php if (!empty($val['bannerCaption'])) : ?> class="txt"<?php endif; ?>>
									<strong><?php echo $val['bannerTitle']; ?></strong>
									<span><?php echo $val['bannerCaption']; ?></span>
								</span>
							</a>
						</li>
						<?php endforeach ; ?>
					</ul>
					<div class="pagination">
						<button class="prev">&nbsp;</button><div class="inner"></div><button class="next">&nbsp;</button>
					</div>
				</div>
			</section>
			<?php endif ; ?>

			<section id="sect_gallery_list">
				<!-- <header>
					<form name="searchFrm" id="searchFrm" method="GET">
						<ul class="sort_lst">
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
						</ul>
						<div class="bx_search">
							<p><input type="text" name="sw" id="sw" value="<?php echo $sw; ?>" /> <button type="button" class="btn_pack samll2 black area_lato" onclick="search(this.form);">Search</button></p>
						</div>
					</form>
				</header> -->
				<div class="gallery_list area_lato">
				<?php if ($totalCnt > 0 && is_array($list)) : ?>
					<ul>
					<?php foreach ($list as $key => $row) : ?>
						<li>
							<div class="img out_cover" onclick="">
								<img class="area_zoom" src="<?php echo galleriesAboutUploadPath, 'l_'.$row['mainImg']; ?>" alt="Gallery Image" />
								<a class="cover" href="/galleries/about/?idx=<?php echo $row['galleryIdx']; ?>">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<h4><a href="/galleries/about/?idx=<?php echo $row['galleryIdx']; ?>"><?php echo $row['galleryNameEn']; ?></a></h4>
								<p><a href="/galleries/about/?idx=<?php echo $row['galleryIdx']; ?>"><?php echo $row['addr1En']; ?></a></p>
							</div>
						</li>
						<?php if ($key === 8 || $key === 17 || $key === 26 || $key === 35 || $key === 44) : ?>
							<?php if (!empty($barbanner[$i]['upfileName'])) : ?>
								<li class="w3">
									<a href="<?php echo $barbanner[$i]['link']; ?>" target="_blank" class="banner">
										<img src="<?php echo galleriesBannerUploadPath, $barbanner[$i]['upfileName']; ?>" class="img_for_pc" alt="" />
										<img src="<?php echo galleriesBannerUploadPath, $barbanner[$i]['mobileupfileName']; ?>" class="img_for_mobile" alt="" />
									</a>
								</li>
								<?php $i++; ?>
							<?php endif ; ?>
						<?php endif ; ?>
					<?php endforeach ; ?>
					</ul>
				<?php else : ?>
					<div style="text-align:center">Data does not exist.</div>
				<?php endif ; ?>
				</div>
			</section>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<script>
iCutterOwen([/*"#gallery_spot > .bx_slide > ul > li > a",*/ ".gallery_list .img"]);
var soptSp = new Swiper("#gallery_spot > .bx_slide", {
	pagination : "#gallery_spot .pagination > .inner",
	paginationClickable : true,
	cssWidthAndHeight : 'height',
	loop : true,
	autoplay : 5000,
	onSwiperCreated : function(){
		$("#gallery_spot > .bx_slide").addClass("show");
	},
	onInit: function(){
		swiperSlideH($("#gallery_spot > .bx_slide > ul > li > a"));
	}
});


function swiperSlideH(t) {
  $(window).resize(function(e) {
    var slideH = t.find(".pc").height();
    if($(window).width() <= 639){
      slideH = t.find(".mobile").height();
    }
    t.css('padding-bottom', slideH);
  }).resize();
}

$(function(){
	$("#gallery_spot > .bx_slide .pagination > button.prev").click(function(e){e.preventDefault();soptSp.swipePrev();});
	$("#gallery_spot > .bx_slide .pagination > button.next").click(function(e){e.preventDefault();soptSp.swipeNext();});
	
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
function search(f) {
	if ($("#sw").val() == "") {
		alert("검색어를 입력하세요.");
		$("#sw").focus();
		return false;
	}
	f.submit();
}
</script>
<?php
include '../inc/footer.php';
include '../inc/bot.php';

$db = null;
$galleries = null;
unset($db);
unset($galleries);