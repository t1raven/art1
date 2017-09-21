<?php
include '../../inc/config.php';

$categoriName = 'articovery';
$pageName = 'articovery';
$pageNum = '5';
$subNum = '1';
$thirdNum = '0';
$pathType = 'b';

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
?>

<script type="text/javascript" src="/js/bpopup.js"></script>
<script type="text/javascript" src="/js/radialIndicator.js"></script>
<link rel="stylesheet" type="text/css" href="/css/articovery.css">
<link rel="stylesheet" type="text/css" href="/css/articovery_170525.css">
<link rel="stylesheet" type="text/css" href="/css/articovery_point_respond.css">

<section id="container_sub" class="articovery_cont">
	<div class="container_inner">
		<div id="articovery" class="point list">
			<div class="visual">
				<div class="inner">
					<div class="logo">
						<img src="/images/articovery/h_articovery.png"/>
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
					<div class="makeyourpoint">
						<div class="title"><img src="/images/articovery/point_visual_title.png"/></div>
						<ul class="pointCircles">
							<li>
								<div class=" point_circle" data-point="840"></div>
								<div class="txt">Technique<br/>기술성</div>
							</li>
							<li>
								<div class="point_circle" data-point="875"></div>
								<div class="txt">Artistic Quality<br/>예술성</div>
							</li>
							<li>
								<div class="point_circle" data-point="809"></div>
								<div class="txt">Creativity<br/>창의성</div>
							</li>
							<li>
								<div class="point_circle" data-point="812"></div>
								<div class="txt">Potential<br/>기능성</div>
							</li>
	                    </ul>

	                    <script type="text/javascript">
	                    	$(function(){
		                    	for ( var i = 0; i < $(".point_circle").length; i++ ) {
							        $(".point_circle").eq(i).radialIndicator({
							          radius:50,
							          barWidth: 5,
							          initValue: 0,
							          minValue: 0,
							          maxValue: 1000,
							          barColor: '#fff',
							          barBgColor: '#666',
							          fontSize: 19,
							          fontWeight: 'normal',
							          frameNum: 100,
							          format: '#.##'
							        });
							        var radObj = $(".point_circle").eq(i).data('radialIndicator');
							        radObj.animate($(".point_circle").eq(i).data('point'));
							    }
						  	});
	                    </script>
					</div>
				</div>
			</div>
			<div class="feature" id="top9">
				<div class="inner">
					<div class="feature_head">
						<div class="title">POINT : TOP 9</div>
						<div class="subTitle1">가장 많은 PIN을 받은 9명의 작가입니다. 작가 상세페이지로 이동해 POINT 해주세요.</div>
						<div class="subTitle2">TOP 9 are scored by us.</div>
					</div>
					<ul class="name_list">
						<li>성병희</li>
						<li>고주안</li>
						<li>아댈라리</li>
						<li>함미나</li>
						<li>노예영</li>
						<li>심종희</li>
						<li>강덕현</li>
						<li>수진</li>
						<li>임시연</li>
					</ul>
					<ul class="top9_list">
						<li class="completed">
							<div class="inner">
								<?php if ($_SESSION['user_idx']): ?>
								<a href="/articovery/point/view.php">
								<?php else: ?>
								<a href="javascript:void(0);" onclick="layerPopup3.open('index.php','popup_join', '', {'at':'join'}); return false;">
								<?php endif; ?>
									<img src="/images/articovery/top9/top9_1.jpg"/>
								</a>
								<div class="cont">
									<span class="h"><img src="/images/articovery/top9/top9_photo_1.png">함미나 - 연옥Purgatory</span>
								</div>
								<span class="ico_point"></span>
							</div>
						</li>
						<li>
							<div class="inner">
								<?php if ($_SESSION['user_idx']): ?>
								<a href="/articovery/point/view.php">
								<?php else: ?>
								<a href="javascript:void(0);" onclick="layerPopup3.open('index.php','popup_join', '', {'at':'join'}); return false;">
								<?php endif; ?>
									<img src="/images/articovery/top9/top9_2.jpg"/>
								</a>
								<div class="cont">
									<span class="h"><img src="/images/articovery/top9/top9_photo_1.png">함미나 - 연옥Purgatory</span>
								</div>
								<span class="ico_point"></span>
							</div>
						</li>
						<li>
							<div class="inner">
								<?php if ($_SESSION['user_idx']): ?>
								<a href="/articovery/point/view.php">
								<?php else: ?>
								<a href="javascript:void(0);" onclick="layerPopup3.open('index.php','popup_join', '', {'at':'join'}); return false;">
								<?php endif; ?>
									<img src="/images/articovery/top9/top9_3.jpg"/>
								</a>
								<div class="cont">
									<span class="h"><img src="/images/articovery/top9/top9_photo_1.png">함미나 - 연옥Purgatory</span>
								</div>
								<span class="ico_point"></span>
							</div>
						</li>
						<li>
							<div class="inner">
								<?php if ($_SESSION['user_idx']): ?>
								<a href="/articovery/point/view.php">
								<?php else: ?>
								<a href="javascript:void(0);" onclick="layerPopup3.open('index.php','popup_join', '', {'at':'join'}); return false;">
								<?php endif; ?>
									<img src="/images/articovery/top9/top9_4.jpg"/>
								</a>
								<div class="cont">
									<span class="h"><img src="/images/articovery/top9/top9_photo_1.png">함미나 - 연옥Purgatory</span>
								</div>
								<span class="ico_point"></span>
							</div>
						</li>
						<li>
							<div class="inner">
								<?php if ($_SESSION['user_idx']): ?>
								<a href="/articovery/point/view.php">
								<?php else: ?>
								<a href="javascript:void(0);" onclick="layerPopup3.open('index.php','popup_join', '', {'at':'join'}); return false;">
								<?php endif; ?>
									<img src="/images/articovery/top9/top9_5.jpg"/>
								</a>
								<div class="cont">
									<span class="h"><img src="/images/articovery/top9/top9_photo_1.png">함미나 - 연옥Purgatory</span>
								</div>
								<span class="ico_point"></span>
							</div>
						</li>
						<li>
							<div class="inner">
								<?php if ($_SESSION['user_idx']): ?>
								<a href="/articovery/point/view.php">
								<?php else: ?>
								<a href="javascript:void(0);" onclick="layerPopup3.open('index.php','popup_join', '', {'at':'join'}); return false;">
								<?php endif; ?>
									<img src="/images/articovery/top9/top9_6.jpg"/>
								</a>
								<div class="cont">
									<span class="h"><img src="/images/articovery/top9/top9_photo_1.png">함미나 - 연옥Purgatory</span>
								</div>
								<span class="ico_point"></span>
							</div>
						</li>
						<li>
							<div class="inner">
								<?php if ($_SESSION['user_idx']): ?>
								<a href="/articovery/point/view.php">
								<?php else: ?>
								<a href="javascript:void(0);" onclick="layerPopup3.open('index.php','popup_join', '', {'at':'join'}); return false;">
								<?php endif; ?>
									<img src="/images/articovery/top9/top9_7.jpg"/>
								</a>
								<div class="cont">
									<span class="h"><img src="/images/articovery/top9/top9_photo_1.png">함미나 - 연옥Purgatory</span>
								</div>
								<span class="ico_point"></span>
							</div>
						</li>
						<li>
							<div class="inner">
								<?php if ($_SESSION['user_idx']): ?>
								<a href="/articovery/point/view.php">
								<?php else: ?>
								<a href="javascript:void(0);" onclick="layerPopup3.open('index.php','popup_join', '', {'at':'join'}); return false;">
								<?php endif; ?>
									<img src="/images/articovery/top9/top9_8.jpg"/>
								</a>
								<div class="cont">
									<span class="h"><img src="/images/articovery/top9/top9_photo_1.png">함미나 - 연옥Purgatory</span>
								</div>
								<span class="ico_point"></span>
							</div>
						</li>
						<li>
							<div class="inner">
								<?php if ($_SESSION['user_idx']): ?>
								<a href="/articovery/point/view.php">
								<?php else: ?>
								<a href="javascript:void(0);" onclick="layerPopup3.open('index.php','popup_join', '', {'at':'join'}); return false;">
								<?php endif; ?>
									<img src="/images/articovery/top9/top9_9.jpg"/>
								</a>
								<div class="cont">
									<span class="h"><img src="/images/articovery/top9/top9_photo_1.png">함미나 - 연옥Purgatory</span>
								</div>
								<span class="ico_point"></span>
							</div>
						</li>
					</ul>
				</div>
			</div>

			<div class="feature" id="panels">
				<div class="inner">
					<div class="feature_head">
						<div class="title">PROFESSIONAL PANELS</div>
						<div class="subTitle1">11인의 전문가 패널을 소개합니다.</div>
					</div>
					<ul class="name_list">
						<li>구본진</li>
						<li>김승현</li>
						<li>김아미</li>
						<li>김윤섭</li>
						<li>박현주</li>
						<li>백가흠</li>
						<li>심홍규</li>
						<li>양태오</li>
						<li>우이경</li>
						<li>이서연</li>
						<li>정나영</li>
					</ul>
					<ul class="panel_list">
						<li>
							<img src="/images/articovery/panel/panel_1.png"/>
						</li>
						<li>
							<img src="/images/articovery/panel/panel_2.png"/>
						</li>
						<li>
							<img src="/images/articovery/panel/panel_3.png"/>
						</li>
						<li>
							<img src="/images/articovery/panel/panel_4.png"/>
						</li>
						<li>
							<img src="/images/articovery/panel/panel_5.png"/>
						</li>
						<li>
							<img src="/images/articovery/panel/panel_6.png"/>
						</li>
						<li>
							<img src="/images/articovery/panel/panel_7.png"/>
						</li>
						<li>
							<img src="/images/articovery/panel/panel_8.png"/>
						</li>
						<li>
							<img src="/images/articovery/panel/panel_9.png"/>
						</li>
						<li>
							<img src="/images/articovery/panel/panel_10.png"/>
						</li>
						<li>
							<img src="/images/articovery/panel/panel_11.png"/>
						</li>
						<li>
							<img src="/images/articovery/panel/panel_12.png"/>
						</li>
					</ul>
				</div>
			</div>

			<div class="feature" id="about">
				<div class="inner">
					<div class="feature_head sty2">
						<div class="subTitle1">ARTICOVERY</div>
						<div class="title"><a href="/articovery/about/" style="color: #1a1a1a;">ABOUT</a></div>
						<div class="subTitle2">ARTIST + DISCOVERY</div>
					</div>
					<div class="feature_text nanumbarungothic">
						다양한 분야의 인플루언서들이 앞서 TOP 9의 작가에 대한 POINT를 진행합니다. <br/>이후 대중의 점수와 합산하여, 합계평균값이 가장 높은 최종 TOP 1을 선정합니다.
					</div>
				</div>
			</div>
			<div class="feature" id="event">
				<div class="inner">
					<div class="feature_head sty2">
						<div class="subTitle1">EVENT</div>
						<div class="title">POINT 참여 혜택</div>
					</div>
					<div class="feature_text nanumbarungothic">
						POINT에 참여하시면, 추첨을 통해 <strong>TOP 1 작가의 원화 작품</strong>을 드립니다. <br/><span>(무작위 추첨 방식 / PIN, POINT 중복참여 가능)</span>
					</div>
				</div>
			</div>
			<div class="footer">
				<div class="inner">
					<div class="logo">
						<img src="/images/articovery/h_articovery.png"/>
					</div>
					<div class="copy">Copyright2017. All Rights Reserved.</div>
					<ul class="sns">
						<li><a href="#"><img src="/images/articovery/ico_facebook.png"/></a></li>
						<li><a href="#"><img src="/images/articovery/ico_instagram.png"/></a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</section><!-- //container_sub -->

<script type="text/javascript">
function layerPopup3(){
	var $win = $(window);
	var $html = $('html, body');

	console.log(111);

	this.open = function (url,id,func,da2){
		var $wrap = $('#wrap');

		if(func != "none"){
			var callbacks = $.Callbacks(id);
			callbacks.add( func );
		}
		if(url != undefined){
			$.ajax({
				type:"GET",
				url:url,
				dataType:"html",
				data : da2,
				success : function(data) {
					var cont ;
					var $data = $(data);
					// if($("#"+id).length > 0){
					//      $("#"+id).bPopup({
					//       closeClass : "b-close"
					//      });
					//   }else{
					newLayer();
					//}

					function newLayer(){
						$("body").append( $("<div id="+id+" class='layerPopup3'>") );
						$("#"+id).append($data)
						$("#"+id).imagesLoaded(function(){
							console.log("111");
							callbacks.fire("#"+id);
							$("#"+id).bPopup({
								closeClass : "b-close",
								onClose: function() {
									$("#"+id).remove();
								}
							});
						});
					}
				},
				complete : function(data) {
				},error : function(xhr, status, error) {
				}
			})
		}else{//if
			alert('팝업파일이 존재하지 않습니다.');
		}
	};//open
	this.close = function (id){};//close
}//layerPopup

window.layerPopup3  = new layerPopup3();
</script>
<?php
include '../../inc/footer.php';
include '../../inc/bot.php';