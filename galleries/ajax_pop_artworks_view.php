<?php $idx = $_GET["idx"]; ?>

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
<script>
var GetArtworksViewlist = function(ele, params){
	var defaults = {
		step : 'first',
		idx : 0
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
		$.ajax({
			url : '/galleries/ajax_artworks_view_list.php',
			type : 'GET',
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
						initialSlide : spLis.length >= 3 ? 1 : 0,
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
					spUl.prepend(data);
					swp.reInit()
					swp.swipeTo(1, 0, false);
				}else if(o.step === 1){
					spUl.append(data);
					swp.reInit()
					swp.swipeTo(swp.slides.length-2, 0, false);
				};
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
		if(swp.activeIndex == 0){
			_this.getData({idx : spBx.find(".swiper-slide:eq(0)").data('idx')-1, step : -1});
		}else if(swp.activeIndex == swp.slides.length-1){
			_this.getData({idx : spBx.find(".swiper-slide:eq("+(swp.slides.length-1)+")").data('idx')+1, step : 1});
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

	this.getData({idx : params.idx, step : params.step});
	var resizeTimer = "";
	$(window).on('resize',function(){
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(_this.listHeight,100);
	});
};//GetArtworksViewlist


var worksList = new GetArtworksViewlist('#area_artworks_list > ul',{
	idx : <?=$idx?>
});

function alignArtWorkView(index){
	var cl = '';
	if(index !== undefined){
		cl = index;
	}
	var bxImg = $("#pop_artworks_view li.list").filter(function(){return $(this).data('idx') === cl}).find(".gallery_artwork_view .bx_img");
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