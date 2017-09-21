<?php if (!defined('OKTOMATO')) exit; ?>
<script type="text/javascript" src="/js/nouislider.js"></script>
<script type="text/javascript" src="/js/radialIndicator.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/nouislider.css">
<link rel="stylesheet" type="text/css" href="/css/articovery.css">
<link rel="stylesheet" type="text/css" href="/css/respond.css">
<section id="container_sub" class="articovery_cont">
	<div class="container_inner">
		<!-- detail view layerpopup Start -->
		<div class="popup_prd_bg"></div>
		<div class="popup_prd">
			<div class="thumb b-close"></div>
			<div class="head">
				<div class="inner">
					<p class="h"></p>
					<div class="rgh">
						<button class="b-close">닫기</button>
					</div>
				</div>
			</div>
		</div>
		<!-- detail view layerpopup End -->
		<div id="articovery" class="point view">
			<div class="visual <?php echo $aryVisual[$point_idx]; ?>">
				<div class="inner">
					<div class="logo">
						<img src="/images/articovery/b_articovery.png"/>
					</div>
					<div class="menu">
						<ul>
							<li>
								<a href="/articovery/about">
									<span class="t1">ABOUT</span>
									<span class="t2">4.4 ~ 5.23</span>
								</a>
							</li>
							<li>
								<a href="/articovery/pin">
									<span class="t1">PIN</span>
									<span class="t2">5.30 ~ 6.20</span>
								</a>
							</li>
							<li class="on">
								<a href="/articovery/point">
									<span class="t1">POINT</span>
									<span class="t2">7.4 ~ 8.1</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<?php include 'skin/profile_'.$point_idx.'.skin.php'; ?>

			<div class="feature <?php echo $aryVisual[$point_idx]; ?>" id="artWorks">
				<div class="inner">
					<div class="title_wrap">
						<p>Artworks</p>
					</div>
					<div class="list_wrap">
						<ul>
							<li class="n1">
								<div>
									<a href="#"><img src="/images/articovery/<?php echo str_replace('_big', '', $thumbImg[1]); ?>" alt=""></a>
									<span class="cont">
										<span class="h"><?php echo $thumbInfo[1]; ?></span>
									</span>
								</div>
							</li>
							<li class="n2">
								<div>
									<a href="#"><img src="/images/articovery/<?php echo str_replace('_big', '', $thumbImg[2]); ?>" alt=""></a>
									<span class="cont">
										<span class="h"><?php echo $thumbInfo[2]; ?></span>
									</span>
								</div>
							</li>
							<li class="n3">
								<div>
									<a href="#"><img src="/images/articovery/<?php echo str_replace('_big', '', $thumbImg[3]); ?>" alt=""></a>
									<span class="cont">
										<span class="h"><?php echo $thumbInfo[3]; ?></span>
									</span>
								</div>
							</li>
							<li class="n4">
								<div>
									<a href="#"><img src="/images/articovery/<?php echo str_replace('_big', '', $thumbImg[4]); ?>" alt=""></a>
									<span class="cont">
										<span class="h"><?php echo $thumbInfo[4]; ?></span>
									</span>
								</div>
							</li>
							<li class="n5">
								<div>
									<a href="#"><img src="/images/articovery/<?php echo str_replace('_big', '', $thumbImg[5]); ?>" alt=""></a>
									<span class="cont">
										<span class="h"><?php echo $thumbInfo[5]; ?></span>
									</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="feature" id="pointNow">
				<div class="inner">
					<?php if ($isPointAble) : ?>
					<div class="img_ban_area">
						<a href="#" onclick="return false;">
							<img src="/images/articovery/img_pointnow_ban.png" alt="">
							<img src="/images/articovery/ico_pointnowclick.png" alt="" class="on_click">
						</a>
					</div>
					<?php endif ; ?>

					<!-- 일반회원 심사 -->
					<div class="comment_area member">

					</div>

					<!-- 전문가 패널 심사 -->
					<div class="comment_area expert">
						<div class="title_wrap">
							<p>전문가 패널 합계 평균값</p>
						</div>

						<div class="clist_wrap">
							<ul>
								<li>
									<div class="user_wrap">
										<div class="user_ico">
											<span class="black">A</span>
										</div>
										<div class="user_info">
											<p class="user_id">전문가 패널</p>
											<p class="write_time">art1.com</p>
										</div>
									</div>
									<div class="comment">
										<p><?php echo $opinion; ?></p>
									</div>
									<div class="point_wrap">
										<div class="sep_point">
											<div class="point_circle_expert" data-point="<?php echo sprintf('%.2f', $technique_score); ?>"></div>
											<div class="point_circle_expert" data-point="<?php echo sprintf('%.2f', $artistic_score); ?>"></div>
											<div class="point_circle_expert" data-point="<?php echo sprintf('%.2f', $creativity_score); ?>"></div>
											<div class="point_circle_expert" data-point="<?php echo sprintf('%.2f', $potential_score); ?>"></div>
										</div>
									</div>
									<div class="avg_point">
										<p><?php echo sprintf('%.2f', $final_score); ?></p>
									</div>
								</li>
							</ul>
						</div>
					</div>

					<!-- 레이어팝업 -->
					<div class="popup_bg"></div>

					<div class="point_pop_wrap write" style="z-index:100;"></div>

					<div class="point_pop_wrap complete" style="z-index:101;"></div>

					<div class="popup_alert_bg"></div>

					<div class="point_pop_alert" style="z-index:102;">
						<div class="btn_alertx_wrap">
							<button type="button" name="">
								<img src="/images/articovery/ico_closex.png" alt="닫기">
							</button>
						</div>
						<p>!</p>
						<div class="btn_wrap">
							<button type="button" name="button">해당 작가의 작품에 대한의견을 남겨주세요</button>
						</div>
					</div>

					<div class="point_pop_wrap finish contact">

					</div>
			</div>
		</div>
		<div class="footer"></div>
	</div>
</section><!-- //container_sub -->

<div class="popup_wrap">
</div>

<script>
function pageRun(page){
	comment(page);
}
function complete(covery_idx, point_cnt, is_contact, expert){
	$.ajax({
		url:"index.php",
		type:"post",
		data:{"cidx":"<?php echo $covery_idx; ?>", "pidx":"<?php echo $point_idx; ?>", "at":"complete"},
		dataType:"html",
		success:function(data){
			if(expert == 0){
				comment(1);
				if(point_cnt == 9 && is_contact == 0){
					contact(covery_idx);
				}else{
					$(".point_pop_wrap.complete").html(data);
					$(".point_pop_wrap.complete").fadeIn();
					$(".point_pop_wrap.write").fadeOut();
				}
			}else{
				$(".point_pop_wrap.complete").html(data);
				$(".point_pop_wrap.complete").fadeIn();
				$(".point_pop_wrap.write").fadeOut();
			}
		},
		error:function(e){
			alert(e.responseText);
		}
	});
 }

function comment(page){
	$.ajax({
		url:"index.php",
		type:"post",
		data:{"cidx":"<?php echo $covery_idx; ?>", "pidx":"<?php echo $point_idx; ?>", "page":page, "at":"comment"},
		dataType:"html",
		success:function(data){
			$(".comment_area.member").html(data);
		},
		error:function(e){
			alert(e.responseText);
		}
	});
 }

function contact(covery){
	$.ajax({
		url:"index.php",
		type:"post",
		data:{"covery":covery, "at":"contact"},
		dataType:"html",
		success:function(data){
			$(".point_pop_wrap.complete").html(data);
			$(".point_pop_wrap.complete").fadeIn();
			$(".point_pop_wrap.write").fadeOut();
			var posTop = $(".point_pop_wrap.complete").offset();
			$(window).scrollTop(posTop.top);
		},
		error:function(e){
			alert(e.responseText);
		}
	});
}

function list(){
	location.href="?at=list";
}

function write(){
	$.ajax({
		url:"index.php",
		type:"post",
		data:{"cidx":"<?php echo $covery_idx; ?>", "pidx":"<?php echo $point_idx; ?>", "at":"write"},
		dataType:"html",
		success:function(data){
			$(".point_pop_wrap.write").html(data);
			$(".point_pop_wrap.write").fadeIn();
		},
		error:function(e){
			alert(e.responseText);
		}
	});
}

function read(cidx, pidx){
	location.href="?at=read&cidx="+cidx+"&pidx="+pidx;
}
function request(){
	$.ajax({
		url:"index.php",
		type:"post",
		data:{"cidx":"<?php echo $covery_idx; ?>", "pidx":"<?php echo $point_idx; ?>", "at":"request"},
		dataType:"json",
		success:function(data){
			if(data.result == 1){
				$(".popup_bg").fadeIn();
				write();
			}else{
				$(".popup_alert_bg").fadeIn();
				$(".point_pop_alert").fadeIn();
				$(".point_pop_alert > div.btn_wrap > button ").text(data.msg);
			}
		},
		error:function(e){
			alert(e.responseText);
		}
	});
}

$(function(){
	$("#pointNow .img_ban_area > a").click(function(){
		var posTop = $(".img_ban_area").offset();
		console.log(posTop);
		$(window).scrollTop(posTop.top - 112);
		request();
	});
	$(".btn_close_wrap > button").click(function(){
		$(".point_pop_wrap").fadeOut();
		$(".popup_bg").fadeOut();
	});
	$(".popup_bg").click(function(){
		$(".point_pop_wrap").fadeOut();
		$(this).fadeOut();
	});

	$(".btn_alertx_wrap > button").click(function(){
		$(".point_pop_alert").fadeOut();
		$(".popup_alert_bg").fadeOut();
	});
	$(".popup_alert_bg").click(function(){
		$(".point_pop_alert").fadeOut();
		$(this).fadeOut();
	});
	$(".point_pop_alert .btn_wrap button").click(function(){
		$(".point_pop_alert").fadeOut();
		$(".popup_alert_bg").fadeOut();
	});

	$("#pointNow.feature .img_ban_area a").bind("mouseover mouseenter",function(){
		$("#pointNow.feature .img_ban_area img.on_click").show();
	}).bind("mouseout mouseleave",function(){
		$("#pointNow.feature .img_ban_area img.on_click").hide();
	});

	for ( var i = 0; i < $(".point_circle_expert").length; i++ ) {
		$(".point_circle_expert").eq(i).radialIndicator({
			radius:19,
			barWidth: 1,
			initValue: $(".point_circle_expert").eq(i).data('point'),
			roundCorner : true,
			percentage: false,
			minValue: 0,
			maxValue: 10,
			barColor: '#000000',
			displayNumber: true
		});
	}
	comment();

	$(".popup_prd").bind("mouseover mouseenter",function(){
		$(this).css("cursor", "url(/images/articovery/img_cursor2.png), auto");
	}).bind("mouseout mouseleave",function(){
		$(this).css("cursor", "default");
	});
	$("#articovery.point.view #artWorks.feature .list_wrap li a").bind("mouseover mouseenter",function(){
		$(this).css("cursor", "url(/images/articovery/img_cursor.png), auto");
	}).bind("mouseout mouseleave",function(){
		$(this).css("cursor", "default");
	});

	fullImgLoad();
	artAboutHeight();
});

$(window).resize(function(){
	artAboutHeight();
});

function fullImgLoad(){
	var artwork_top = "";
	$("#articovery.point.view #artWorks.feature .list_wrap li a").click(function(){
		artwork_top = $(this).parents("li").position();
		$(".popup_prd").fadeIn();
		$(".popup_prd_bg").fadeIn();
		if($(this).parents().hasClass("n1")){
			$(".popup_prd > .thumb").html("<img src='/images/articovery/<?php echo $thumbImg[1]; ?>' alt='' />");
			$(".popup_prd > .head > .inner > p.h").html("<?php echo $thumbInfo[1]; ?>");
		}else if($(this).parents().hasClass("n2")){
			$(".popup_prd > .thumb").html("<img src='/images/articovery/<?php echo $thumbImg[2]; ?>' alt='' />");
			$(".popup_prd > .head > .inner > p.h").html("<?php echo $thumbInfo[2]; ?>");
		}else if($(this).parents().hasClass("n3")){
			$(".popup_prd > .thumb").html("<img src='/images/articovery/<?php echo $thumbImg[3]; ?>' alt='' />");
			$(".popup_prd > .head > .inner > p.h").html("<?php echo $thumbInfo[3]; ?>");
		}else if($(this).parents().hasClass("n4")){
			$(".popup_prd > .thumb").html("<img src='/images/articovery/<?php echo $thumbImg[4]; ?>' alt='' />");
			$(".popup_prd > .head > .inner > p.h").html("<?php echo $thumbInfo[4]; ?>");
		}else if($(this).parents().hasClass("n5")){
			$(".popup_prd > .thumb").html("<img src='/images/articovery/<?php echo $thumbImg[5]; ?>' alt='' />");
			$(".popup_prd > .head > .inner > p.h").html("<?php echo $thumbInfo[5]; ?>");
		}
	});
	$(".b-close").click(function(){
		$(".popup_prd").fadeOut();
		$(".popup_prd_bg").fadeOut();
		$(window).scrollTop(artwork_top.top);
	});
	$(".popup_prd_bg").click(function(){
		$(".popup_prd").fadeOut();
		$(this).fadeOut();
	});
}

function artAboutHeight(){
	var wrapH = $("#articovery.point.view #artAbout.feature > .inner").height();
	var artistH = $("#articovery.point.view #artAbout.feature li.artist_area").height();
	var descH = $("#articovery.point.view #artAbout.feature li.desc_area").height();
	var exhibH = $("#articovery.point.view #artAbout.feature li.exhibit_area").height();
	var leftH = artistH + exhibH + 28;

	if(leftH < descH){
		$("#articovery.point.view #artAbout.feature > .inner").height(descH);
	}
}
</script>
