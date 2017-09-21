<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/articovery/'.basename(__DIR__).'.class.php');
require(ROOT.'google_login_oauth/inc_google_login_check.php'); //구글 로그인 처리
//include(ROOT.'inc/config.php');

$categoriName = "articovery";
$pageName = "articovery";
$pageNum = "5";
$subNum = "1";
$thirdNum = "0";
$pathType = "b";

$idx = $_GET["idx"];
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : ARTWORKSLISTCOUNT;
$list = null;

if ( $check_mobile == true ){
	$sz = 12;
}else{
	$sz = ARTWORKSLISTCOUNT;
}

$Articovery = new Articovery();
$covery_idx = $Articovery->getCoveryIdx($dbh);
$Articovery->setAttr('covery_idx', $covery_idx);
$Articovery->setAttr('page', $page);
$Articovery->setAttr('sz', $sz);
$worksTotalCount = $Articovery->getWorksCount($dbh);
$totalPage = ceil($worksTotalCount / $sz);

if ((int)$page === 1) {
	unset($_SESSION['rdmNbr']);
}

if ($worksTotalCount > 0) {
	$j = 0;
	if ($worksTotalCount >= $sz) {
		$kk = $worksTotalCount % $sz;
		if ($kk === 0) {
			$aCnt = $worksTotalCount - $sz;
		}
		else {
			$aCnt = $worksTotalCount - ($kk + $sz);
		}
		//echo "kk:$kk";
		//echo "aCnt:$aCnt";
		for ($i = 0; $i <= $aCnt; $i+=$sz) {
			$aValue[$j] = $i;
			$j++;
		}
	}
	else {
		$aValue[0] = 0;
	}
	//print_r($aValue);
	if (!is_null($_SESSION['rdmNbr'])) {
		//echo "세션존재";
	}
	else {
		//echo "세션존재하지 않음";
		$aryLastValue = $aValue[sizeof($aValue) -1];
		shuffle($aValue);
		$_SESSION['rdmNbr'] = $aValue;
		//print_r($_SESSION['rdmNbr']);
		if ($worksTotalCount > $sz) {
			if ($kk !== 0) {
				$_SESSION['rdmNbr'][sizeof($aValue)] = $aryLastValue + $sz;
			}
		}
		//print_r($_SESSION['rdmNbr']);
	}

	$Articovery->setAttr('rdmstart', $_SESSION['rdmNbr'][(int)$page - 1]);
	$tmp = $Articovery->getList2($dbh); // ori
	//$tmp = $Articovery->getList($dbh);
	$list = $tmp[0];
}

if ($_SESSION['user_idx']) {
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
	$Articovery->setAttr('user_idx', $user_idx);
	$myPinList = $Articovery->getMyPin($dbh);
	//print_r($myPinList);

	if (sizeof($myPinList) < 0) {
		for($i=0; $i < sizeof($myPinList); $i++) {
			$aryMyPin[$i] = $myPinList[$i]['works_idx'];
		}
	}
	else {
		$aryMyPin = array();
	}

	//$myPinList = $Articovery->getMyPinList($dbh);
}
else {
	$aryMyPin = array();
}
include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
?>
<link rel="stylesheet" type="text/css" href="/css/articovery_170525.css">
<section id="container_sub" class="artipin">
	<section class="visual pin ">
		<div class="bg">
			<img src="/images/articovery/bg_arti1.jpg" alt="" class="m-pc">
			<img src="/images/articovery/bg_arti1_m.jpg" alt="" class="m-mobile">
		</div>

		<div class="inner">
			<!-- <p class="logo"><img src="/images/articovery/h_articovery.png" alt="articovery"></p> -->
			<div class="menu">
				<ul>
					<li><a href="about.php">
						<span class="t1">ABOUT</span>
						<span class="t2">4.4 ~ 5.23</span>
					</a></li>
					<li class="on"><a href="index.php">
						<span class="t1">PIN</span>
						<span class="t2">5.30 ~ 6.20</span>
					</a></li>
					<li><a href="index3.php">
						<span class="t1">POINT</span>
						<span class="t2">7.4 ~ 8.1</span>
					</a></li>
				</ul>
			</div>
			<!-- <div class="headline">
				<p class="t1">
					<img src="/images/articovery/txt_pc.png" class="m-pc" alt="PIN the artwork that catches your and captivates your heart! 지금 당신의 눈과 마을을 사로잡은 작품을 PIN 하세요. PIN 9개 한정 / PIN 수정 가능">
					<img src="/images/articovery/txt_mo.png" class="m-mobile" alt="PIN the artwork that catches your and captivates your heart! 지금 당신의 눈과 마을을 사로잡은 작품을 PIN 하세요. PIN 9개 한정 / PIN 수정 가능">
				</p>
			</div> -->
			<!-- <div class="cont">
				<p class="h"><strong>PIN</strong> 참여 혜택</p>
				<div class="lft">
				<p><span class="d-b"><b>O</b>ne:</span>
					<span class="br-pc">9개의 PIN을 완료한 분들 중 추첨을 통해</span> <span class="br-pc"><b>[빕스 식사권</b><span class="fsz">(2명 각 2매씩),</span> <b>스타벅스 기프티콘</b><span class="fsz">(30명)</span>]</span>을 드립니다.
				</p>
				</div>
				<div class="rgh">
				<p><span class="d-b"><b>T</b>wo:</span>
					<span class="br-pc">7월에 시작하는 POINT에도 참여하세요. </span> <span class="br-pc">추첨을 통해  TOP1  작가의  원화  작품을  드립니다.</span>
					<span class="fsz">(무작위 추첨 방식 / PIN, POINT 중복참여 가능)</span>
				</p>
				</div>
			</div> -->
		</div>
	</section>
	<div class="container_inner pin">
		<div class="box_pin">
		<?php if ($_SESSION['user_idx']) : ?>
			<p class="h on">MY <b>PIN</b></p>
		<?php else: ?>
			<p class="h">Log in</p>
		<?php endif; ?>

			<div id="box-pin1" class="box-scrollX">
				<div class="pos">
					<?php for($i = 0; $i < 9; $i++) : ?>
					<div class="thumb">
						<?php if (!empty($myPinList[$i]['works_img'])) : ?>
						<a href="#" class="i-cut" onclick="bpop('<?php echo $myPinList[$i]['works_idx']; ?>'); return false;"><img src="<?php echo articoverySmallImgUploadPath.$myPinList[$i]['works_img']; ?>" alt=""></a>
						<?php else: ?>
						<a href="javascript:;" class="i-cut" onclick="void(0);"><img src="/images/articovery/img_noimg.gif" alt=""></a>
						<?php endif; ?>
					</div>
					<?php endfor; ?>
				</div>
			</div>
		</div>
		<section class="articovery_pin_main">
			<h1 class="h">
				<span>ARTWORK to PIN</span>
				<span class="t1"> ALL (<?php echo number_format($worksTotalCount); ?>)</span>
			</h1>
			<div class="lst-isotope">
			<?php if (is_array($list)) : ?>
				<?php foreach ($list as $row) : ?>
				<div class="box-thumb">
					<?php if ($_SESSION['user_idx']): ?>
					<a href="#" class="inner" onclick="bpop('<?php echo $row['works_idx']; ?>'); return false;">
					<?php else: ?>
					<a href="#" class="inner" onclick="layerPopup3.open('popup_join.php','popup_join');return false;">
					<?php endif; ?>

						<span class="thumb">
							<span class="img"><img src="/upload/articovery/thumb/<?php echo $row['works_img']; ?>" alt=""></span>
						</span>
						<span class="cont">
							<span class="h"><?php echo $row['works_make_type']; ?></span>
							<span class="pin">
								<span class="img"><img src="/images/articovery/img_pin_<?php if (in_array($row['works_idx'], $aryMyPin)) : ?>on<?php else: ?>off<?php endif; ?>.png" id="img-pin-<?php echo $row['works_idx']; ?>" alt="">
								</span>
								<span class="t1">
									PIN <?php echo number_format($row['works_pin_count']); ?>
								</span>
							</span>
						</span>
					</a>
				</div>
				<?php endforeach; ?>
			<?php endif; ?>
			</div>
		</section>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->

<section id="popup_prd" class="popup_prd" style="display: none;">
	<div class="thumb b-close">
		<!--img src="/images/articovery/tmp_prd1.jpg" alt=""-->
		<img src="/images/articovery/noimg.png" alt="">
		<div class="m_cursor2" style="display: none;"><img src="/images/articovery/img_cursor2.png" alt=""></div>
	</div>
	<div class="head">
		<div class="inner">
			<p class="h"></p>
			<div class="rgh">
				<!-- 핀 체크 클래스 .on -->
				<button class="pin">pin</button>
				<button class="b-close">닫기</button>
			</div>
		</div>
	</div>
	
</section>
<div class="m_cursor1" style="display: none;"><img src="/images/articovery/img_cursor.png" alt=""></div>
<script type="text/javascript" src="/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="/js/packery-mode.pkgd.min.js"></script>
<script type="text/javascript" src="/js/bpopup.js"></script>
<script type="text/javascript"  src="/js/iscroll5.js"></script>
<script type="text/javascript">
$(function(){
  <?php if ($_SESSION['user_idx']): ?>loginPopClose();<?php endif; ?>
  /*
  if (getCookie("cookLoginPopClose") == "true") {  //일주일간 안 열리도록...
    loginPopClose();
  }
  */

  
});

function loginPopClose(){
  //console.log("loginPopClose 실행");
  $("#layerNewletter").css("display","none");
  $("#cover").remove();
}

function weekPopClose(){ //일주일간 열지 않기
  //alert($("input:checkbox[id='a_week']").is(":checked"));
  if ( $("input:checkbox[id='a_week']").is(":checked") == true){
    setCookie("cookLoginPopClose",true, 7);
  }
}

function googleOpen(url){
  if($("#returnUrl<?php echo $ajax_state;?>").val() != '/'){
    $("#returnUrl<?php echo $ajax_state;?>").val(document.location.href) ;
  }
  window.open(url, 'googleLogin', ',width=500,height=450');
}

function setMyPin(idx){
	$.ajax({
		url:'update.php',
		type:'post',
		data:{'idx':idx},
		dataType:'json',
		success:function(data){
			//alert(data.result);
			if(data.result == 1){
				if(data.pin_cnt < 9){
					//$("#popup_prd").find("div.head > div > div > button.pin").addClass("on").attr("onclick", "void(0)");
					$("#popup_prd").find("div.head > div > div > button.pin").addClass("on").attr("onclick", "layerPopup3.open('popup_pin_cancel.php','popup_pin_cancel','',{'idx':'"+data.works_idx+"'}); return false;");
					$("#img-pin-"+idx).attr("src", "/images/articovery/img_pin_on.png");
				}
				getThumb(data.covery_idx);

				if(data.pin_cnt == 9){
					$("#popup_prd").find("div.head > div > div > button.pin").addClass("on").attr("onclick", "void(0)");
					layerPopup3.open('popup_alert3.php','popup_alert3', '', {'covery':data.covery_idx});
				}
			}else{
				if(data.pin_cnt == 9){
					alert("핀은 최대 9개 까지만 가능합니다.");
					return false;
				}else{
					alert("error");
					return false;
				}
			}
		}
	});
}



function setMyPinCancel(idx){
	$.ajax({
		url:'update.php',
		type:'post',
		data:{'idx':idx, 'mode':'cancel'},
		dataType:'json',
		success:function(data){
			//alert(data.result);
			if(data.result == 1){
				$("#popup_prd").find("div.head > div > div > button.pin").removeClass("on").attr("onclick", "layerPopup3.open('popup_alert1.php','popup_alert1','',{'idx':'"+idx+"'}); return false;");
				$("#img-pin-"+idx).attr("src", "/images/articovery/img_pin_off.png");

				getThumb(data.covery_idx);
			}else{
					alert("error");
					return false;
			}
		}
	});
}



function getThumb(idx){
	$.ajax({
		url:'thumb.php',
		type:'post',
		data:{'idx':idx},
		dataType:'html',
		success:function(data){
			if(data){

				$("#box-pin1").children().remove();
				$("#box-pin1").html(data);

				// $("#box-pin1").imagesLoaded(function(){
				// 	iCutter(".i-cut");
				// })

			}else{
				alert("error");
			}
		}
	});
}

function setPinContact(){
	var regNumber = /^[0-9]*$/;
	var contact = $("#contact").val();
	if(contact.trim() == ""){
		alert("핸드폰 번호를 입력하세요.");
		$("#contact").focus();
		event.stopPropagation();
		return false;

	}else{
		if(!regNumber.test(contact)){
			alert("핸드폰 번호는 숫자만 입력해 주세요.");
			$("#contact").focus();
			event.stopPropagation();
			return false;
		}
		if(contact.length < 10){
			alert("핸드폰 번호가 유효하지 않습니다.다시 입력해 주세요.");
			$("#contact").focus();
			event.stopPropagation();
			return false;
		}
	}

	if ($(":radio[id=sms_agree1]").is(":checked") == false){
		alert("sms 수신동의에 동의 하셔야 합니다.");
		$("#sms_agree1").focus();
		event.stopPropagation();
		return false;
	}

	if ($('input:checkbox[id="roll_agree"]').is(":checked") == false ){
		alert("이용약관에 동의 하셔야 합니다.");
		$("#roll_agree").focus();
		event.stopPropagation();
		return false;
	}

	if ($('input:checkbox[id="private_agree"]').is(":checked") == false ){
		alert("개인정보 취급방침에 동의 하셔야 합니다.");
		$("#private_agree").focus();
		event.stopPropagation();
		return false;
	}

	$.ajax({
		url:"contact.php",
		type:"post",
		data:{"covery":$("#covery").val(), "contact":contact},
		dataType:"json",
		success: function(data){
			if(data.result == 1) {
				//alert("등록 되었습니다.");
				layerPopup3.open('popup_alert4.php','popup_alert4');
				//return false;
			}else{
				alert("등록 오류가 발생했습니다.\r\n관리자에게 문의하여 주세요");
				//return false;
			}
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			//return false;
		}
	});

	//$("#pop_alert3").remove();
	//return false; //새로고침 방지
}

$("body").addClass("articoveryM");

function qmenu(){
	var $obj = $(".box_pin");
	var $start = $(".container_inner.pin");
	var $end = $("#footer");
	var mosize = 960;
	var win = $(window),
	doc = $(document),
	body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');

	function size(){
	   var tsize = $start.offset().top;
	   var top1 = win.scrollTop();
	   var top2 = win.scrollTop() + win.height();
	   var offset = $obj.offset();

	   if(tsize <=  top1 && $obj.outerHeight() <  win.height() ){
		 $obj.addClass("fix");
	   }else{
	   	$obj.removeClass("fix");
	   }
	};

	$(window).on("resize.qmenu",function(){
   		if(win.width() >= mosize){
   			size();
   		}
	});

	$(window).on("scroll.qmenu",function(){
		if(win.width() >= mosize){
	   	   size();
	      }
	});
}

qmenu();
//탭(전체/카테고리)

function thumbBoxEvent(o){
	var $obj = $(o);
	var $cursor = $(".m_cursor1");
	var mosize = 960;
	var win = $(window),
	doc = $(document),
	body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
	$obj.each(function(){
	var $this = $(this);
		$this.off().on("mousemove mouseleave",function(event){
			if(win.width() >= mosize){
				var $that = $(this);
				if(event.type == "mousemove"){
					      x = event.pageX;
	    				      y = event.pageY;
	    				      // console.log(x);
	    				      // console.log(y);
					$cursor.css({
						"display":"",
						"position":"absolute",
						"top":y,
						"left":x,
						/*"margin-left": -($cursor.width() / 2),
						"margin-top": -($cursor.height() / 2),*/
						"margin-left": ($cursor.width() / 3),
						"margin-top": ($cursor.height() / 3),
						"z-index":50
					});
					$that.css("cursor","none").find("a").css("cursor","none");

				}else{
					$cursor.css({
						"display":"none"
					})
					$that.css("cursor","auto");
				}

			}

		});

	});

}


var pinScroll;
var $container = $(".lst-isotope");
var isotope = [];
var lstIsotope = [];
var scrollNewsStartFlag = false;
//var totalPage = 50;
//var page = 0;
var page = 1;
var totalCount = <?php echo $worksTotalCount;?>;
var totalPage = Math.ceil(totalCount / <?php echo ARTWORKSLISTCOUNT;?>);
//var totalPage = Math.ceil(totalCount / 5);

var loadingImg = $("<img>").addClass("loading").attr("src","../images/ico/ajax-loader.gif").css({
    "position":"absolute",
    "left":"50%",
    "top":0,
    "margin-left":-30
  });



function cannotPIN(){
	alert("9개의 PIN을 이미 선택하였습니다.\r\n더 이상 PIN을 선택할 수 없습니다.");
}

function bpop(id){
	$("#popup_prd").find(".thumb > img").attr("src", "/images/articovery/noimg.png");

	$.ajax({
		url:"zoom.php",
		type:"post",
		data:{idx:id},
		dataType:"json",
		async:true,
		success:function(data){
			console.log(data);
			var title;
			//$("#popup_prd").children().remove();
			//$("#popup_prd").html(data);
			if(data.result == 1){
					$("#popup_prd").find(".thumb > img").attr("src", data.works_img);
					$("#popup_prd").find("div.head > div > p").text(data.title);
					if (data.pin == 1){
						if(data.pin_cnt < 9){
							$("#popup_prd").find("div.head > div > div > button.pin").addClass("on").attr("onclick", "layerPopup3.open('popup_pin_cancel.php','popup_pin_cancel','',{'idx':'"+data.works_idx+"'}); return false;");
						}else{
							$("#popup_prd").find("div.head > div > div > button.pin").addClass("on").attr("onclick", "void(0)");
						}
					}else{
						$("#popup_prd").find("div.head > div > div > button.pin").removeClass("on");
						if(data.pin_cnt < 9){
							$("#popup_prd").find("div.head > div > div > button.pin").attr("onclick", "layerPopup3.open('popup_alert1.php','popup_alert1','',{'idx':'"+data.works_idx+"'}); return false;");
						}else{
							$("#popup_prd").find("div.head > div > div > button.pin").attr("onclick", "cannotPIN();");
						}
					}
			}else{
				alert("자료가 존재하지 않습니다.");
			}
			$("#popup_prd").imagesLoaded(function(){

				
				


				var win_top , w , h , win_h;
				$("#popup_prd").bPopup({
			            closeClass : "b-close",
			             follow: [true, true],
			          },function(){
				          	win_top = $(window).scrollTop();
				          	w = $("#popup_prd .thumb").width();
				          	h = $("#popup_prd .thumb").height();
				          	win_h = $(window).height();

				          	if(win_h <  h){
				          		$(window).scrollTop(0);
				          		$("#popup_prd").css("top",0);
				          		$("#wrap").css({
							    "overflow":"hidden",
							    "height":h
							  })//css
				          	}



				          	var $cursor2 = $(".m_cursor2");
						var mosize = 960;
						var win = $(window),
						doc = $(document),
						body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
						var $thumb = $("#popup_prd .thumb");
							$thumb.off().on("mousemove mouseleave",function(event){
								if(win.width() >= mosize){
									var $that = $(this);
									if(event.type == "mousemove"){
										      x = event.pageX;
						    				      y = event.pageY - $that.scrollTop();
						    				      // console.log(x);
						    				      // console.log(y);
										$cursor2.css({
										      "display":"",
											"position":"absolute",
											"top":y,
											"left":x,
											/*"margin-left": -($cursor2.width() / 2),
											"margin-top": -($cursor2.height() / 2),*/
											"margin-left": (27 / 3),
											"margin-top": (35 / 3),
											"z-index":50
										});
										$that.css("cursor","none").find("a").css("cursor","none");

									}else{
										$cursor2.css({
											"display":"none"
										})
										$that.css("cursor","auto");
									}

								}

							});


			        });

				$(".b-close").off().on("click",function(){
					if(win_h <  h){
				            	$("#wrap").css({
						      "overflow":"",
						      "height":""
						})//css
				            	$(window).scrollTop(win_top);
			          	 }
				});

			});

			//$("#popup_prd").find("div > img").attr("src", "/upload/articovery/big/14958726405F33AAQMA2.jpg");

			/*
			var win_top , w , h , win_h;

			$("#popup_prd").bPopup(
				{
					closeClass : "b-close",
					follow: [true, true],
				},
				function(){
					win_top = $(window).scrollTop();
					w = $("#popup_prd .thumb").width();
					h = $("#popup_prd .thumb").height();
					win_h = $(window).height();
					if(win_h <  h){
						$(window).scrollTop(0);
						$("#popup_prd").css("top",0);
						$("#wrap").css({"overflow":"hidden", "height":h}); //css
					}
				}
			);

			$(".b-close").off().on("click",function(){
				if(win_h <  h){
					$(window).scrollTop(win_top);
					$("#wrap").css({"overflow":"", "height":""}); //css
				}
			});
			*/
		}

	});


	

}

function layerPopup3(){
 var $win = $(window);
 var $html = $('html, body');

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
   this.close = function (id){


   };//close


}//layerPopup



function scrollNewEvent(w) {
  var win = $(window),
  doc = $(document),
  body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
  var top = win.scrollTop() + win.height();
  var endHeight = $(".lst-isotope").offset().top + ($(".lst-isotope").outerHeight()  / 2);
  if (top > endHeight ) {
    if (totalPage >= page) {
    //if (totalPage > page) {
      startScroll();
    }
  }

  function startScroll() {
    if (!scrollNewsStartFlag) {
      scrollNewsStartFlag = true;

	  nextPage(); //2016-04-27 업체요구 무한스크롤 처리 LYT

      }
  }
};//scrollNewEvent



 function nextPage(){
    loadingStart($(".articovery_pin_main").outerHeight());
    getItemElement();
    // if (totalPage <= page){
    //   $("#marketProductAjax .newsBox.bt_vewmore").css("visibility","hidden");
    // }
 }


function loadingStart(num){
    $(".articovery_pin_main").append(loadingImg);
    loadingImg.css("top",num);
};



function getItemElement() {
    if (page == 1) {
      page = 2;
    }
	$.ajax({
          type:"get",
          url:"ajax_prd.php",
          data:{"page":page},
          dataType:"html",
          success : function(data) {
            loadingImg.animate({
                  "opacity":0
                },500,function(){
                  $(this).css("opacity",1).remove();
                    $("<div id='tmpData'></div>").html(data).appendTo($container);
                      var count = $container.find("#tmpData .newsBox").length;
                      var $data2 = $($container.find("#tmpData").html());
                       thumbBoxEvent(".lst-isotope .box-thumb");
                      $container.append($data2);
                      $("#tmpData").remove();
                      $data2.imagesLoaded(function(){
                      	$container.find(".box-thumb").css("visibility","visible");
                           lstIsotope[0]
                           .isotope('insert',$data2)
                           .isotope('layout');
                            page ++;
                            scrollNewsStartFlag = false;

                            //$container.off("click.motionView").on( 'click.motionView', '.newsBox',marketViewMotion);
                        });//imagesLoaded
                })//loading

          },
           complete : function(data) {

           },error : function(xhr, status, error) {
            alert(error);
            $container.children().remove();
            $('<p class="noProduct">작품이 존재하지 않습니다.</p>').appendTo($container);
           }
      })
}//getItemElement





function quickMobile(b){
			var $this = $(".box_pin .box-scrollX");
			var $pos = $this.find(" .pos");
 	  	if(b){

			var w = 0;
			for (var i = 0; i <= $this.find(".thumb").length; i++) {
				w = w + $this.find(".thumb:eq("+i+")").outerWidth(true);
			}
			if($this.width() <  w){
				$pos.css("width",w + 10).parent().css("visibility","visible");

			}else{
				$pos.css("width","100%").parent().css("visibility","visible");
			}

		   pinScroll.refresh();


		  }else{
		  	$pos.css({"width":"auto"});
		  	pinScroll.refresh();

		  }




}




$(window).on("resize.quick",function(){
	var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	if(w > 960){
		quickMobile(false);
	}else{
		quickMobile(true);
	}
});


$(window).load(function() {
  	iCutterLoadNone(".i-cut");
  	//dotWindow(".t-dot");
  	thumbBoxEvent(".lst-isotope .box-thumb");



  	pinScroll =  new IScroll("#box-pin1", {
		      scrollbars: false,
		      scrollX: true, scrollY: false,freeScroll: false,
		      // mouseWheelSpeed:200,
		       mouseWheel: true,
		      zoom: true,
		      click:true,
		      preventDefault:false,
		      interactiveScrollbars: false
		      //bounce:false
		      //bounceEasing: 'elastic',
		      //bounceTime: 0
		    });
	// pinScroll = new IScroll("#box-pin1", {
	//     scrollX: true,
	//     scrollY: false,
 //           scrollbars: false,
	//     mouseWheelSpeed:200,
	//     mouseWheel: true,
	//     probeType: 2,
	//     preventDefaultException: {
	//     // default config, all form elements,
	//     // extended with a WebComponents Custom Element from the future
	//     tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|X-WIDGET)$/,
	//     // and allow any element that has an accessKey (because we can)
	//     accessKey: /.+/
	//   }
	//  });




	    $(window).trigger("resize");



  	    // isotope 플러그인
  if($(".lst-isotope").length > 0){

      function onRecentAlways(){

          for (var i = 0; i < $(".lst-isotope").length; i++) {
              var $lst_isotope = $(".lst-isotope:eq("+i+")");
              isotope[i] =  $lst_isotope;
              var isotopePlugin = $(".lst-isotope").isotope({
                    itemSelector: '.box-thumb',
                    layoutMode: 'packery'
               });
              lstIsotope.push(isotopePlugin);
             $(".lst-isotope > *").css("visibility","visible");



          }//for
      };//onRecentAlways
     var recentLoad = imagesLoaded($(".lst-isotope"));
     recentLoad.on( 'always', onRecentAlways );


     $(window).on("scroll",function(){
	 	scrollNewEvent();
	})


  }//if :: isotope


  })

window.layerPopup3  = new layerPopup3();

</script>


<?php
include "../inc/footer.php";
include "../inc/bot.php";

$dbh = null;
$Articovery = null;
unset($dbh);
unset($Articovery);
