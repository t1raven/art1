<? include "../inc/config.php"; ?>
<?php
  $categoriName = "articovery";
  $pageName = "articovery";
  $pageNum = "5";
  $subNum = "1";
  $thirdNum = "0";
  $pathType = "b";

  $idx = $_GET["idx"];
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?>

<link rel="stylesheet" type="text/css" href="/css/articovery_170525.css">

<section id="container_sub" class="artipin">
	<section class="visual pin">
		<div class="bg">
			<img src="/images/articovery/bg_arti1.png" alt="" class="m-pc">
			<img src="/images/articovery/bg_arti1_m.jpg" alt="" class="m-mobile">
		</div>

		<div class="inner">
			<p class="logo"><img src="/images/articovery/h_articovery.png" alt="articovery"></p>
			<div class="menu">
				<ul>
					<li><a href="#">
						<span class="t1">ABOUT</span>
						<span class="t2">4.4 ~ 5.23</span>
					</a></li>
					<li class="on"><a href="#">
						<span class="t1">PIN</span>
						<span class="t2">5.30 ~ 6.20</span>
					</a></li>
					<li><a href="#">
						<span class="t1">POINT</span>
						<span class="t2">7.4 ~ 8.1</span>
					</a></li>
				</ul>
			</div>
			<div class="headline">
				<p class="t1">
					<img src="/images/articovery/txt_pc.png" class="m-pc" alt="PIN the artwork that catches your and captivates your heart! 지금 당신의 눈과 마을을 사로잡은 작품을 PIN 하세요. PIN 9개 한정 / PIN 수정 가능">
					<img src="/images/articovery/txt_mo.png" class="m-mobile" alt="PIN the artwork that catches your and captivates your heart! 지금 당신의 눈과 마을을 사로잡은 작품을 PIN 하세요. PIN 9개 한정 / PIN 수정 가능">
				</p>
			</div>
			<div class="cont">
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
			</div>
		</div>
	</section>
	<div class="container_inner pin">
		<div class="box_pin">
			<!--
			로그인 후
			<p class="h on">My <b>Pin</b></p>
			-->
			<p class="h">Log in</p>
			<div id="box-pin1" class="box-scrollX">
				<div class="pos">
					<div class="thumb">
						<a href="#" class="i-cut"><img src="/images/articovery/img_noimg.gif" alt=""></a>
					</div>
					<div class="thumb">
						<a href="#" class="i-cut"><img src="/images/articovery/img_noimg.gif" alt=""></a>
					</div>
					<div class="thumb">
						<a href="#" class="i-cut"><img src="/images/articovery/img_noimg.gif" alt=""></a>
					</div>
					<div class="thumb">
						<a href="#" class="i-cut"><img src="/images/articovery/img_noimg.gif" alt=""></a>
					</div>
					<div class="thumb">
						<a href="#" class="i-cut"><img src="/images/articovery/img_noimg.gif" alt=""></a>
					</div>
					<div class="thumb">
						<a href="#" class="i-cut"><img src="/images/articovery/img_noimg.gif" alt=""></a>
					</div>
					<div class="thumb">
						<a href="#" class="i-cut"><img src="/images/articovery/img_noimg.gif" alt=""></a>
					</div>
					<div class="thumb">
						<a href="#" class="i-cut"><img src="/images/articovery/img_noimg.gif" alt=""></a>
					</div>
					<div class="thumb">
						<a href="#" class="i-cut"><img src="/images/articovery/img_noimg.gif" alt=""></a>
					</div>
				</div>
			</div>
		</div>
		<section class="articovery_pin_main">
				<h1 class="h">
					<span>ARTWORK to PIN</span>
					<a href="#">VIEW MORE (110) ▶</a>
				</h1>
				<div class="lst-isotope">
					<div class="box-thumb">
						<a href="#" class="inner" onclick="layerPopup3.open('popup_join.php','popup_join'); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483331530MC78GSE9AM.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->
					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483331600P8LCS8G6HQ.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->

					<div class="box-thumb">
						<a href="#" class="inner"  onclick="layerPopup3.open('popup_alert2.php','popup_alert2'); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1448435365CENNQXS5MD.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>

					<!-- //box-thumb -->

					<div class="box-thumb">
						<a href="#" class="inner"   onclick="layerPopup3.open('popup_alert3.php','popup_alert3'); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483332334VLKQDG6QFW.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->


					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/14262314375V5PEYPFEU.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->


					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483331530MC78GSE9AM.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->
					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483331600P8LCS8G6HQ.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->

					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1448435365CENNQXS5MD.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>

					<!-- //box-thumb -->

					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483332334VLKQDG6QFW.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->


					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/14262314375V5PEYPFEU.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->


					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483331530MC78GSE9AM.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->
					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483331600P8LCS8G6HQ.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->

					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1448435365CENNQXS5MD.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>

					<!-- //box-thumb -->

					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483332334VLKQDG6QFW.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->


					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/14262314375V5PEYPFEU.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->


					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483331530MC78GSE9AM.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->
					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483331600P8LCS8G6HQ.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->

					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1448435365CENNQXS5MD.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>

					<!-- //box-thumb -->

					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483332334VLKQDG6QFW.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->


					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/14262314375V5PEYPFEU.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->


					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483331530MC78GSE9AM.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->
					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483331600P8LCS8G6HQ.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->

					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1448435365CENNQXS5MD.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>

					<!-- //box-thumb -->

					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/1483332334VLKQDG6QFW.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->


					<div class="box-thumb">
						<a href="#" class="inner" onclick="bpop(); return false;">
							<span class="thumb">
								<span class="img"><img src="/upload/goods/thumb/14262314375V5PEYPFEU.jpg" alt=""></span>
							</span>
							<span class="cont">
								<span class="h">Digital artwork</span>
								<span class="pin"><img src="/images/articovery/img_pin_off.png" alt=""></span>
								<!--
									체크시
								 	<span class="pin"><img src="/images/articovery/img_pin_on.png" alt=""></span>
								  -->
							</span>
						</a>
					</div>
					<!-- //box-thumb -->


			</div>
			<!-- //inner -->




		</section>


	</div><!-- //container_inner -->
</section><!-- //container_sub -->

<section id="popup_prd" class="popup_prd" style="display: none;">
	<div class="thumb">
		<img src="/images/articovery/tmp_prd1.jpg" alt="">
	</div>
	<div class="head">
		<div class="inner">
			<p class="h">함미나 - 흐르는눈물, 2016, Gouache, arcylic on canvas, 53 x 45.5 cm</p>
			<div class="rgh">
				<!-- 핀 체크 클래스 .on -->
				<button class="pin"  onclick="layerPopup3.open('popup_alert1.php','popup_alert1'); return false;">pin</button>
				<button class="b-close">닫기</button>
			</div>
		</div>
	</div>
</section>



<div class="m_cursor1" style="display: none;"><img src="/images/articovery/img_cursor.png" alt=""></div>
<script>



$(function(){
  <?php
  if ($_SESSION['user_idx']){
  ?>
      loginPopClose();
  <?
  }
  ?>
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

function newsletterSend(){
  var email = $("#newLetterEmail").val();
  if ($('input:checkbox[id="newLetterEmail2"]').is(":checked") == false ){
    alert("개인정보 제공에 동의 하셔야 합니다.");
    $("#newLetterEmail2").focus();
    return false;
  }

  $.ajax({
    type:"POST",
    url:"/member/__newsletter_insert.php",
    data:{"email":email},
    dataType:"JSON",
    success: function(data) {
      //alert(data.cnt);
      if (data.cnt == 1) {
        alert("이메일이 등록 되었습니다.");
        loginPopClose();
        return false;

      } else if (data.cnt == 91) {
        alert("이메일 주소를 입력해 주세요.");
        return false;
      } else if (data.cnt == 92) {
        alert("이메일 형식이 맞지 않습니다..");
        return false;
      } else if (data.cnt == 93) {
        alert("이미 등록된 이메일 입니다.");
        return false;
      }else{
        alert("데이터 변경에 실패하였습니다.");
        return false;
        //location.reload();
      }

    },
    error: function(xhr, status, error) {
      alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
      return false;
    }
  });
  return false; //새로고침 방지

}




</script>




<script type="text/javascript" src="/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="/js/packery-mode.pkgd.min.js"></script>
<script type="text/javascript" src="/js/bpopup.js"></script>
<script type="text/javascript"  src="/js/iscroll.js"></script>


<script type="text/javascript">

$("body").addClass("articoveryM");

function qmenu(){
	var $obj = $(".box_pin");
	var $start = $(".container_inner.pin");
	var $end = $("#footer");
	var mosize = 680;
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
	var mosize = 680;
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
var totalPage = 50;
var page = 0;
var loadingImg = $("<img>").addClass("loading").attr("src","../images/ico/ajax-loader.gif").css({
    "position":"absolute",
    "left":"50%",
    "top":0,
    "margin-left":-30
  });



function bpop(){
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

        });

	$(".b-close").off().on("click",function(){
		if(win_h <  h){
			$(window).scrollTop(win_top);
	            	$("#wrap").css({
			      "overflow":"",
			      "height":""
			})//css
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

	$.ajax({
          type:"GET",
          //url:"ajax_marketModeTest.php",
          url:"ajax_prd.php",
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
                      $container.find(".box-thumb").css("visibility","visible");
                      $("#tmpData").remove();
                      $data2.imagesLoaded(function(){
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
            $('<p class="noProduct">상품이 존재하지 않습니다.</p>').appendTo($container);
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
	if(w > 680){
		quickMobile(false);
	}else{
		quickMobile(true);
	}
});



$(window).load(function() {

  	iCutter(".i-cut");
  	//dotWindow(".t-dot");
  	thumbBoxEvent(".lst-isotope .box-thumb");


	pinScroll = new IScroll("#box-pin1", {
	    scrollX: true,
	    scrollY: false,
           scrollbars: false,
	    mouseWheelSpeed:200,
	    mouseWheel: true,
	    probeType: 2,
	    preventDefaultException: {
	    // default config, all form elements,
	    // extended with a WebComponents Custom Element from the future
	    tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|X-WIDGET)$/,
	    // and allow any element that has an accessKey (because we can)
	    accessKey: /.+/
	  }
	 });




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


<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>