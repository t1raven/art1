<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/galleries/'.basename(__DIR__).'.class'.SOURCE_EXT;

//$idx = $_GET["idx"];
//$widx = $_GET["widx"];

$idx = isset($_POST['idx']) ? (int)LIB_LIB::CkSearch($_POST['idx']) : null;
$widx = isset($_POST['widx']) ? (int)LIB_LIB::CkSearch($_POST['widx']) : null;
$eidx = isset($_POST['eidx']) ? (int)LIB_LIB::CkSearch($_POST['eidx']) : null;
$aidx = isset($_POST['aidx']) ? (int)LIB_LIB::CkSearch($_POST['aidx']) : null;
$fidx = isset($_POST['fidx']) ? (int)LIB_LIB::CkSearch($_POST['fidx']) : null;
$tgt = isset($_POST['tgt']) ? LIB_LIB::CkSearch($_POST['tgt']) : null;

$artworks = new Artworks();
$artworks->setAttr('idx', $idx);
$artworks->setAttr('widx', $widx);
$artworks->setAttr('eidx', $eidx);
$artworks->setAttr('aidx', $aidx);
$artworks->setAttr('fidx', $fidx);
$artworks->setAttr('cnt', $cnt);
$artworks->setAttr('step', $step);
$artworks->setAttr('tgt', $tgt);


switch($tgt) {
	case 'about' : $artworks->getAboutBeginEnd($dbh); break;
	case 'exhibitions' : $artworks->getExhibitionsBeginEnd($dbh); break;
	case 'artists' : $artworks->getArtistsBeginEnd($dbh); break;
	case 'artworks' : $artworks->getArtworksBeginEnd($dbh); break;
	case 'artfairs' : $artworks->getArtfairsBeginEnd($dbh); break;
}

// 작품일 경우 처음과 마지막의 작품 일련번호 값
//$artworks->getArtworksBeginEnd($dbh);
$begin = $artworks->attr['beginIdx'];
$end = $artworks->attr['endIdx'];

//$url = urlencode($PUBLIC['HOME']. $_SERVER["REQUEST_URI"]);

?>

<section id="pop_artworks_view" class="pop_type1">
	<div class="inner">
		<button class="btn_close" onclick='popFn.hide($("#pop_artworks_view"));'><img src="/images/market/btn_close3_off.png" alt="" /></button>
		<section id="area_artworks_list">
			<ul class="swiper-wrapper"></ul>
			<div class="pagi_btns">
				<button class="btn_prev"><img src="/images/galleries/btn_arr_prev.png" alt="이전" /></button>
				<button class="btn_next"><img src="/images/galleries/btn_arr_next.png" alt="다음" /></button>
			</div>
		</section>
	</div>
</section>

<?php if (!empty($_SESSION['user_id']) && $_SESSION['logged_in']  === 1) : ?>

<div id="pop_common"></div>

<div id="direct_price_request"></div>

<div id="contact_gallery"></div>

<?php endif ; ?>

<script>
function mvArtist(idx, aidx) {
	window.location.href ="/galleries/artists/?at=read&idx="+idx+"&aidx="+aidx;
}
function alignSpot(){
	var bxImg = $("#area_gallery_artwork_view .gallery_artwork_view .bx_img");
	iCutterInOwen("#area_gallery_artwork_view .gallery_artwork_view .bx_img .bx_slide > ul > li")
	var artSpot = bxImg.find(".bx_slide > ul > li");
	var len = artSpot.length;
	if(len > 1){
		var str = "";
		for(var k = 0 ; k < len ; k++){
			var img = artSpot.eq(k).html();
			str +='<li '+(k==0 ? "class=\'on\'" : "")+'><div class="inner"><a href="javascript:;">'+img+'</a></div></li>'
		}
		bxImg.find(".thumnail > ul").html(str);
		iCutterOwen("#area_gallery_artwork_view .thumnail a");
		bxImg.find(".thumnail a").on('click',function(){
			var conLi = bxImg.find(".bx_slide > ul > li");
			var par = $(this).parent().parent();
			var idx = par.index();
			collaboSpotMotion({tab : par, con : conLi, idx : idx});
		})
	}
}

function collaboSpotMotion(o){
	if(!o.tab.hasClass('on')){
		o.tab.siblings('.on').removeClass('on').end().addClass('on');
		o.con.eq(o.idx).siblings('.on').removeClass('on').end().addClass('on');
	}
}
alignSpot();

<?php if (!empty($_SESSION['user_id']) && $_SESSION['logged_in']  === 1) : ?>
$(function(){
	$("#btnSend").click(function() {
		sendContact();
	});
	//popFn.show($('#pop_contact_gallery_sent'));
});

function sendRequest(idx, widx) {
	$.ajax({
		type:"POST",
		url:"/galleries/artworks/request.php",
		dataType:"json",
		data:{"idx":idx, "widx":widx, "at":"request"},
		success: function(data){
			if (data.cnt > 0) {
				directPriceRequest(idx, widx);
				//popFn.show($('#pop_direct_request_gallery'));
				//console.log(data);
				//$("#table-artworks > tbody").html(data);
			}
			else {
				alert("메일 전송 실패!!");
			}
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}

function directPriceRequest(idx, widx) {
	$.ajax({
		type:"POST",
		url:"/galleries/artworks/ajax_direct_price_request.php",
		dataType:"html",
		data:{"idx":idx, "widx":widx},
		success: function(data){
			if (data) {
				$("#direct_price_request").html(data);
				popFn.show($('#pop_direct_request_gallery'), '', {bg : 'pop_bg_common2'});
				//console.log(data);
				//$("#table-artworks > tbody").html(data);
			}
			else {
				alert("실패!!");
			}
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}


function contactGallery(idx, widx) {
	$.ajax({
		type:"POST",
		url:"/galleries/artworks/ajax_contact_gallery.php",
		dataType:"html",
		data:{"idx":idx, "widx":widx},
		success: function(data){
			if (data) {
				$("#contact_gallery").html(data);
				popFn.show($('#pop_contact_gallery'),'', {bg : 'pop_bg_common2'});
				//console.log(data);
				//$("#table-artworks > tbody").html(data);
			}
			else {
				alert("실패!!");
			}
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}

function sendContact(){
	var pattern = /([0-9a-zA-Z_-]+)@([0-9a-zA-Z_-]+)\.([0-9a-zA-Z_-]+)/;
	if ($("#email").val().trim() == "") {
		alert("이메일을 입력하세요.");
		return false;

	}
	else {
		if (!pattern.test($("#email").val())) {
			alert("이메일이 유효하지 않습니다.");
			return false;
		}
	}

	if ($("#msg").val().trim() == "") {
		alert("문의 내용을 입력하세요.");
		return false;
	}
	else {
		$.ajax({
			type:"POST",
			url:"/galleries/artworks/contact.php",
			dataType:"json",
			data:{"idx":$("#idx").val(), "widx":$("#widx").val(), "email":$("#email").val(), "name":$("#name").val(), "phone":$("#phone").val(), "msg":$("#msg").val()},
			success: function(data){
				if (data.cnt > 0) {
					popFn.change({prev:$('#pop_contact_gallery'), next : $('#pop_contact_gallery_sent')});
				}
				else {
					alert("메일 전송 실패!!");
				}
			},
			error: function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			}
		});
	}
}
<?php endif ; ?>

function goExhibition(idx, aidx) {
	location.href = "/galleries/exhibitions?idx="+idx+"&aidx="+aidx;
}
</script>



<script>
var GetArtworksViewlist = function(ele, params){
	var defaults = {
		step : 'first',
		widx : 0
	};
	params = params || {};
	for (var prop in defaults) {
		if (prop in params && typeof params[prop] === 'object') {
			for (var subProp in defaults[prop]) {if (! (subProp in params[prop])) {params[prop][subProp] = defaults[prop][subProp];}}
		} else if (! (prop in params)) {params[prop] = defaults[prop];}
	};
	this.outBx = $(ele);
	var pop = $("#pop_artworks_view");
	var swp = "";
	var spBx = $("#area_artworks_list");
	var spUl = spBx.find('ul');
	var spLis = "";

	_this = this;

	this.getData = function(o){
		console.log(o);
		$.ajax({
			url : '/galleries/artworks/ajax_artworks_view_list.php',
			type : 'POST',
			dataType : 'html',
			data : o,
			success : function(data){
				if(o.step === 'first'){
					_this.outBx.append(data);
					pop.css('display','block');
					spLis = spUl.find(" > li");
					swp = new Swiper('#area_artworks_list',{
						cssWidthAndHeight : 'height',
						noSwiping : true,
						initialSlide : spLis.length >= 3 ? 1 : (spLis.eq(0).data('widx') ===  <?=$begin?> ? 0 : 1),
						onSlideReset : function(){
							spUl.addClass('swiper-no-swiping');
							setTimeout(function(){
								checkGetData();
							},300);
						},
						onSlideChangeStart : function(){
							spUl.addClass('swiper-no-swiping');
							setTimeout(function(){
								checkGetData();
							},300);
						},
						onSwiperCreated : function(){
							var sl = spLis.filter(".swiper-slide-active");
							if(sl.index() === 0)spBx.find('button.btn_prev').addClass('hide');
							if(sl.index() === spLis.length - 1)spBx.find('button.btn_next').addClass('hide');
						}
					});
					_this.listHeight();
					popFn.show(pop);

					spBx.find('button.btn_prev').off().on('click', function(e){
						e.preventDefault();
						swp.swipePrev();
					});
					spBx.find('button.btn_next').off().on('click', function(e){
						e.preventDefault();
						swp.swipeNext();
					});

				}else if(o.step === -1){
					if(data){
						spUl.prepend(data);
						swp.reInit()
						swp.swipeTo(1, 0, false);
					}
				}else if(o.step === 1){
					if(data){
						spUl.append(data);
						swp.reInit()
						swp.swipeTo(swp.slides.length-2, 0, false);
					}
				}


			},
			error : function(a,b,c){
				alert(c);
			}
		})
	};
	this.listHeight = function(){
		var inner = pop.find(" > .inner");
		spBx.height('').height(spBx.find(".swiper-slide-active").height());
	}

	function checkGetData(){
		var sl = spBx.find(".swiper-slide-active");
		sl.data('widx') === <?=$begin?> ? spBx.find('button.btn_prev').addClass('hide') : spBx.find('button.btn_prev').removeClass('hide');
		sl.data('widx') === <?=$end?> ? spBx.find('button.btn_next').addClass('hide') : spBx.find('button.btn_next').removeClass('hide');

		if(swp.activeIndex == 0 && spBx.find(".swiper-slide:eq(0)").data('widx') !== <?=$begin?>){
			//alert("chk1");
			//_this.getData({widx : spBx.find(".swiper-slide:eq(0)").data('widx')-1, step : -1, idx : 14 });
			_this.getData({idx : <?php echo $idx; ?>, widx : spBx.find(".swiper-slide:eq(0)").data('widx'), eidx : <?php echo $eidx; ?>, aidx : <?php echo $aidx; ?>, fidx : <?php echo $fidx; ?>, tgt : '<?php echo $tgt; ?>', step : -1 });
		}else if(swp.activeIndex == swp.slides.length-1  && spBx.find(".swiper-slide:eq("+(swp.slides.length-1)+")").data('widx') !== <?=$end?>){
			//_this.getData({widx : spBx.find(".swiper-slide:eq("+(swp.slides.length-1)+")").data('widx')+1, step : 1, idx : 14 });
			_this.getData({idx : <?php echo $idx; ?>, widx : spBx.find(".swiper-slide:eq("+(swp.slides.length-1)+")").data('widx'), eidx : <?php echo $eidx; ?>, aidx : <?php echo $aidx; ?>, fidx : <?php echo $fidx; ?>, tgt : '<?php echo $tgt; ?>', step : 1});
			//alert("chk2");
		}
		if(spBx.height() !== sl.height()){
			resizeTop(sl.height());
			spBx.stop().stop().animate({'height':sl.height()},function(){spUl.removeClass('swiper-no-swiping');});
		}else{
			spUl.removeClass('swiper-no-swiping');
		}
	}

	function resizeTop(next){
		var t = pop;
		var vH = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
		var bxH = t.find('.inner').outerHeight() - t.find('.inner').height() + next;
		var scl = $(window).scrollTop();
		t.stop().animate({"top" : ( bxH > vH ? scl : (vH-bxH)/2+scl )+"px"});
	}

	this.getData({idx : params.idx, widx : params.widx, eidx : params.eidx, aidx : params.aidx, fidx : params.fidx, tgt : params.tgt, step : params.step});
	var resizeTimer = "";
	$(window).on('resize',function(){
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(_this.listHeight,100);
	});
};//GetArtworksViewlist


var worksList = new GetArtworksViewlist('#area_artworks_list > ul',{
	idx : <?=$idx?>,
	widx : <?=$widx?>,
	eidx : <?=$eidx?>,
	aidx : <?=$aidx?>,
	fidx : <?=$fidx?>,
	tgt : '<?=$tgt?>'
});

function alignArtWorkView(index){
	var cl = '';
	if(index !== undefined){
		cl = index;
	}
	var bxImg = $("#pop_artworks_view li.list").filter(function(){return $(this).data('widx') === cl}).eq(0).find(".gallery_artwork_view .bx_img");
	var artSpot = bxImg.find(".bx_slide > ul > li");
	iCutterInOwen(artSpot);
	artSpot.eq(0).addClass('on');
	var len = artSpot.length;
	if(len > 1){
		var str = "";
		for(var k = 0 ; k < len ; k++){
			var img = artSpot.eq(k).html();
			str +='<li '+(k==0 ? "class=\'on\'" : "")+'><div class="inner"><a href="javascript:;">'+img+'</a></div></li>'
		}
		bxImg.find(".thumnail > ul").html(str);
		iCutterOwen("#area_gallery_artwork_view .thumnail a");
		bxImg.find(".thumnail a").on('click',function(){
			var conLi = bxImg.find(".bx_slide > ul > li");
			var par = $(this).parent().parent();
			var idx = par.index();
			spotMotion({tab : par, con : conLi, idx : idx});
		})
	}

	function spotMotion(o){
		if(!o.tab.hasClass('on')){
			o.tab.siblings('.on').removeClass('on').end().addClass('on');
			o.con.eq(o.idx).siblings('.on').removeClass('on').end().addClass('on');
		}
	}
}
</script>