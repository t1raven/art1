<?php if (!defined('OKTOMATO')) exit; ?>
<section id="container_sub">
	<div class="container_inner">
		<?php include '../tab_galleries.php'; ?>
		<div id="area_gallery_exhibition" class="content-mediaBox margin1">
			<section id="sect_videos" class="area_lato">
				<div class="gallery_list_video w3">
					<ul>
					<?php if (is_array($list)) : ?>
						<?php foreach($list as $val) : ?>
						<li class="videoItem">
							<div class="img out_cover">
								<img class="area_zoom" src="<?php echo galleriesVideosUploadPath, $val['upfileName']; ?>" alt="Videos Image" />
								<a class="cover" href="<?php echo $val['link']; ?>" data-img="<?php echo galleriesVideosUploadPath, $val['upfileName']; ?>" data-idx="<?php echo $val['videoIdx']; ?>" target="_blank">
									<div class="detail_circle big play"></div>
								</a>
							</div>
							<div class="con">
								<header>
									<p><?php echo $val['beginDate']; ?> ~ <?php echo $val['endDate']; ?></p>
								</header>
								<h3><?php echo $val['videoTitle']; ?></h3>
								<p><?php echo $val['artist']; ?></p>
							</div>
						</li>
						<?php endforeach ; ?>
					<?php else : ?>
						<li>
							<div style="text-align:center">No data </div>
						</li>
					<?php endif ; ?>
						<!--
						<li class="videoItem">
							<div class="img out_cover">
								<img class="area_zoom" src="/upload/galleries/exhibitions/148818885182UTMNMDSU.jpg" alt="Videos Image" /">
								<a class="cover" href="/video/Customizing-01.mp4" data-img="/upload/galleries/exhibitions/148818885182UTMNMDSU.jpg" data-idx="2" target="_blank">
									<div class="detail_circle big play"></div>
								</a>
							</div>
							<div class="con">
								<header>
									<p>2017.03.09 ~ 2017.05.14</p>
								</header>
								<h3>ABSOLUTENESS</h3>
								<p>Chinese Gruop Exhibition, ARTIST1, ARTIST2, ARTIST3</p>
							</div>
						</li>
						-->
					</ul>
				</div>
			</section>
			<!-- 동영상 팝업 -->
			<section id="mov_pop" onclick="closeMovPop();">
				<div class="inner" onclick="donotClose(event);">
					<a href="#" onclick="closeMovPop();return false" class="close_btn"><img src="/images/main/btn_close05.png" alt="동영상 닫기"/></a>
					<div class="mov_box">
						<div id="movFlv"></div>
					</div>
					<div class="remote">
						<button class="prev"><img src="/images/main/btn_mov_prev.png" alt="이전 동영상으로"/></button>
						<button id="playPause" onclick="playPause();"><img src="/images/main/btn_mov_play.png" alt="재생 버튼"/></button>
						<button class="next"><img src="/images/main/btn_mov_next.png" alt="다음 동영상으로"/></button>
						<button onclick="fullSize();"><img src="/images/main/btn_full.png" alt="전체 영상 버튼"/></button>
					</div>
				</div>
			</section>
			<!-- 동영상 팝업 -->
		</div>
	</div>
</section>
<script type="text/javascript">
iCutterOwen([".gallery_list_video .img"]);

var movList;
var movTotal;
var movStartNum;
function itemMotion(num, endedFlag, me){
    var ele = $(me);
    var movBox = $("#sect1");
	var videoTag = "movA1";
	var thumbItems = $(".new_mov .m_tlie");
	var soundSrc = me.attr('href');
	var ImgSrc = me.attr('data-img');

	<? if($check_mobile === false){ ?>
	var videobox = $('<video id="'+videoTag+'" '+' controls volume="1" autoplay="true"></video>');
	<? }else{ ?>
	var videobox = $('<div class="video_cover" style=""></div><video id="'+videoTag+'" '+' controls volume="1" autoplay="true"  ></video>');
	<? } ?>
	var sourceMp4 = $('<source src="'+soundSrc+'" type="video/mp4">');

	if($("#movFlv").find("#"+videoTag+"").length > 0){
	    $("#movFlv #"+videoTag+"").remove();
	}
	$("#movFlv").html(videobox);
	$("#movFlv #"+videoTag+"").append(sourceMp4);

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
	itemMotion(movStartNum, true );

	}, false);
}

function itemIeMotion(){
	$("#movFlv video").remove();
	$("#movFlv").html("<div class='noneMov'>ie9이하 버전은 동영상 플레이를 지원하지 않습니다.</div>");
}

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

function openMovPop(){
	fadePlayMotion($("#mov_pop"), true, 400);
	var movOffset = $(window).scrollTop() + (($(window).height() - $("#mov_pop > .inner").outerHeight())/2);
	$("#mov_pop > .inner").css("margin-top", movOffset);
	var WinWdith2 = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
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
	$("#mov_pop .remote").css("display", "block");
	$("#movFlv>*").remove();
}

$(function(){
	$('#mov_pop button.next').click(function(){
		console.log(movStartNum);
		(movStartNum < movTotal) ? movStartNum++ : movStartNum = 1;
		//console.log(movStartNum);
		itemMotion(movStartNum, true , movList.children(".videoItem").eq(movStartNum-1).find("a"));
	});
	$('#mov_pop button.prev').click(function(){
		console.log(movStartNum);
		(movStartNum > 1) ? movStartNum-- : movStartNum = movTotal;
		//console.log(movStartNum);
        itemMotion(movStartNum, true , movList.children(".videoItem").eq(movStartNum-1).find("a"));
	});

	$(".videoItem a").click(function(e) {
		e.preventDefault();
		openMovPop();
		movList = $(this).closest('ul');
		movStartNum = $(this).attr('data-idx');
		movTotal = movList.children(".videoItem").length;
        if(isie7 || isie8 || isie9){
        	itemIeMotion();
        }else{
        	itemMotion(movStartNum, false, $(this));
        }
        if($(this).hasClass('play')) {
        	$("#mov_pop .remote").css("display", "none");
        }
	});
});
</script>
