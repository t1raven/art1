<? include "../inc/config.php"; ?>
<?php
  $categoriName = "MARKET";
  $pageName = "MARKET";
  $pageNum = "3";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
  <? include "../inc/header.php"; ?> 
  <? include "../inc/spot_sub.php"; ?> 
  <div class="blackBg"></div>
  <div id="zoomBg" style="display:none">
	<div class="inner">
		<img src="/images/market/img_zoom.jpg" alt="" />
	</div>
	<button class="close">Close <span><img src="/images/market/ico_market_close1.gif" alt="" /></span></button>
  </div>
  <div id="marketBg" style="display: none">
	<div class="img"><img src="/images/market/img_pic1.jpg" alt="" /></div>
    <h3 class="h_gallery">IN GALLERY</h3>
	<div class="bg gallery"><img src="/images/market/bg_gallery.jpg" alt="" /></div>
    <h3 class="h_living">IN LIVING</h3>
	<div class="bg living"><img src="/images/market/bg_living.jpg" alt="" /></div>
    <h3 class="h_corridor">IN CORRIDOR</h3>
	<div class="bg corridor"><img src="/images/market/bg_corridor.jpg" alt="" /></div>
	<div class="btnClose"><button><img src="/images/market/btn_bg_close.png" alt="" /></button></div>
  </div>
  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
      <section id="marketView1" class="clearfix">
		<div class="marketArea">
			<div class="BigArea">
				<div class="img"><img src="/images/market/img_big.jpg" alt="" /></div>
				<div class="btn">
                  <button class="zoom"><img src="/images/market/btn_zoom.jpg" alt="크게보기" /></button>
                  <button class="viewRoom"><img src="/images/market/btn_view.jpg" alt="갤러리로 보기" /></button>
                  <div class="lst_gal">
                     <ul>
                        <li><button data-type="gallery">IN GALLERY</button></li>
                        <li><button data-type="living">IN LIVING</button></li>
                        <li><button data-type="corridor">IN CORRIDOR</button></li>
                     </ul>
					<div class="arr"><img src="/images/market/img_market_arr.gif" alt="" /></div>
                  </div>
             </div>
			</div>
			<div class="artSlide">
				<button class="up"><img src="/images/market/btn_slideup.jpg" alt="위로" /></button>
				<button class="down"><img src="/images/market/btn_slidedown.jpg" alt="아래로" /></button>
				<ul class="list">
					<li><span class="on"></span><a href="#"><img src="/images/market/img_small_tmp1.jpg" alt="" /></a></li>
					<li><span class="on"></span><a href="#"><img src="/images/market/img_small_tmp2.jpg" alt="" /></a></li>
					<li><a href="#"><img src="/images/market/img_small_tmp3.jpg" alt="" /></a></li>
					<li><a href="#"><img src="/images/market/img_small_tmp1.jpg" alt="" /></a></li>
					<li><a href="#"><img src="/images/market/img_small_tmp2.jpg" alt="" /></a></li>
					<li><a href="#"><img src="/images/market/img_small_tmp3.jpg" alt="" /></a></li>
				</ul>
			</div>
			
			<div class="desArea">
				<p class="writer">강명규&nbsp; <a href="#"><img src="/images/market/btn_more.jpg" alt="자세히 보기" /></a></p>
				<p class="tit">벽에 고인 눈물</p>
				<p class="price">\ 2,200,000</p>
				<dl class="details_list">
					<dt>Details</dt>
					<dd>2011</dd>
					<dd>종이에 수채, 색연필, 잉크</dd>
					<dd>non framed</dd>
					<dd>39 x 27cm (6호)</dd>
				</dl>
				<div class="sns">
					  <div class="inner">
						<a href="#" class="sns1"><img src="/images/market/ico_sns1_off.gif" alt="페이스북"></a>
						<a href="#" class="sns2"><img src="/images/market/ico_sns2_off.gif" alt=" "></a>
						<a href="#" class="sns3"><img src="/images/market/ico_sns3_off.gif" alt="인스타그램"></a>
						<a href="#" class="sns4"><img src="/images/market/ico_sns4_off.gif" alt="pinterest"></a>
					  </div>
				  </div>
				<div class="btn">
					<button class="btnPack2 normal min layerOpen request"><span>REQUEST</span></button> 
					<a href="#" class="btnPack2 normal min"><span>WISH LIST</span></a> 
					<button class="btnPack2 normal min layerOpen cart"><span>CART</span></button>
					<a href="rental.php" class="btnPack2 normal min"><span>RENTAL</span></a>
					 <div class="layerPopupT1 request">
						<div class="inner">
							<h3 class="tit">Send Request</h3>
							<ul class="list">
								<li><p class="tit">이름</p>
								<input type="text" name="" class="n_txt" id="" /></li>
								<li><p class="tit">전화번호(숫자만 입력해주세요)</p>
								<input type="text" name="" class="n_txt" id="" /></li>
								<li><p class="tit">상담내용</p>
								<textarea name="" id="" cols="30" rows="10" class="n_area"></textarea></li>
								<li class="last"><p class="tit">담당자 연락처</p>
									<dl class="contact_list">
										<dt>이진우 팀장</dt>
										<dd>+82.10.4651.2308(KOREA)</dd>
										<dd>jinwoo@mt.co.kr</dd>
									</dl>
									<dl class="contact_list">
										<dt>강필웅 실장</dt>
										<dd>+82.10.3885.6846(KOREA)</dd>
										<dd>jinwoo@mt.co.kr</dd>
									</dl>
								</li>
							</ul> 
							<div class="common_btn">
								<a href="" class="btnPack2 normal min"><span>SEND</span></a> 
							</div>
						</div> 
					 </div>
					  <div class="layerPopupT1 cart">
						<div class="inner">
							<h3 class="tit">ADD TO CART</h3>
							<p class="txt">선택하신 작품을 장바구니에 담았습니다.</p>
							<p class="cart_btn"><button class="ing close">계속 쇼핑하기</button> &nbsp; <a class="cart" href="#">장바구니 보러가기</a></p>
						</div> 
						<div class="close_pos"><button class="close"><img src="/images/market/ico_market_close1.gif" alt="닫기" /></button></div>
					 </div>
				</div>
				
			</div>
		</div><!-- marketArea -->
		<div class="tabArea">
			<ul class="tab_list">
				<li class="on"><span><a href="#cont1">Artist</a></span></li>
				<li><span><a href="#cont2">Work Detail</a></span></li>
				<li><span><a href="#cont3">Recommends</a></span></li>
				<li><span><a href="#cont4">Shipping</a></span></li>
			</ul>
		</div>
		<div class="tabcont" id="cont1">
			<!-- <img src="/images/market/img_tab_tmp.jpg" alt="" /> -->
			<div id="profileBox">
				<h2 class="tit">PROFILE</h2>
				<div class="inner">
					<div class="box t-c man_img"><div class="inner"><img src="/images/market/img_profile1.jpg" alt="" /></div></div>
					<div class="box name">
						<div class="inner">
							<p class="name">최영</p>
							<p class="poinT">Artist info.</p>
							<ul class="n_list">
								<li>
									<p class="tit">직업</p>
									<p class="txt">화기 / 문화센터 강사 / 연구원</p>
								</li>
								<li>
									<p class="tit">생년월일</p>
									<p class="txt">1982. 07. 17</p>
								</li>
								<li>
									<p class="tit">장르</p>
									<p class="txt">서양화 / 극사실화</p>
								</li>
							</ul>
						</div>
					</div>
					<div class="box edu">
						<div class="inner">
							<p class="poinT">학력</p>
							<ul class="n_list">
								<li>
									<p class="tit">2000년</p>
									<p class="txt">첼시 예술대학 MA Fine Art 전공(영국)</p>
								</li>
								<li>
									<p class="tit">1997년</p>
									<p class="txt">서울대학교 서양화전공 학사(한국)</p>
								</li>
							</ul>
						</div>
					</div>
					<div class="box awards">
						<div class="inner">
							<p class="poinT">수상</p>
							<ul class="n_list">
								<li>
									<p class="txt">2008년<br />내일의 아티스트 2009, 성곡미술관</p>
								</li>
								<li>
									<p class="txt">2005년<br />New Artist Trend 2005, 서울문화재단</p>
								</li>
								<li>
									<p class="txt">2004년<br />Kumho Young Artist 2004, 금호미술관 </p>
								</li>
							</ul>
						</div>
					</div>
					<div class="box display">
						<div class="inner">
							<p class="poinT">전시</p>
							<p class="tit2">개인전</p>
							<ul class="n_list">
								<li>
									<p class="txt">2014년<br />네온 그레이 터미널, 하이트 컬렉션, 서울</p>
								</li>
								<li>
									<p class="txt">2010년<br />내일의 작가 박진아 개인전, 성곡미술관</p>
								</li>
								<li>
									<p class="txt">2010년<br />스냅라이프, 성곡미술관, 서울</p>
								</li>
							</ul>
							<p class="tit2">단체전</p>
							<ul class="n_list">
								<li>
									<p class="txt">2014년<br />네온 그레이 터미널, 하이트 컬렉션, 서울</p>
								</li>
								<li>
									<p class="txt">2010년<br />내일의 작가 박진아 개인전, 성곡미술관</p>
								</li>
								<li>
									<p class="txt">2010년<br />스냅라이프, 성곡미술관, 서울</p>
								</li>
							</ul>
						</div>
					</div>
					<div class="box repre">
						<div class="inner">
							<p class="poinT">대표작</p>
							<div class="art_img">
								<img src="/images/market/img_profile3.jpg" alt="" />
							</div>
							<p class="art_tit">Chicago Fragments XVI</p>
							<p class="art_writer">by Sven Pfrommer </p>
						</div>
					</div>
					<div class="box summary">
						<div class="inner">
							<p class="poinT">작가인사말</p>
							<p class="n_txt">현재 대유문화재단 산하 영은 미술관에서 주관하는 영은레지던시 프로젝트에 입주해 참여하고 있으며, 2015년 갤러리 EM에서 대규모 개인전을 앞두고 있습니다.현재 대유문화재단 산하 영은 미술관에서 주관하는 영은레지던시 프로젝트에 입주해 참여하고 있으며, 2015년 갤러리 EM에서 대규모 개인전을 앞두고 있습니다.</p>
						</div>
					</div>
					<div class="box graph">
						<div class="inner"> 
							<p class="poinT">아티스트그래프</p>
							<div class="img"><img src="/images/market/img_profile2.gif" alt="" /></div>
						</div>
					</div>
					<div class="box social">
						<div class="inner">
							<p class="poinT">소셜</p>
							<ul class="ico_list">
								<li><span class="ico"><img src="/images/market/ico_pro_home.gif" alt="" /></span><a href="http://art1.com">http://art1.com</a></li>
								<li><span class="ico"><img src="/images/market/ico_pro_balloon.gif" alt="" /></span><a href="http://art1.blog.com">http://art1.blog.com</a></li>
								<li><span class="ico"><img src="/images/market/ico_pro_face.gif" alt="" /></span><a href="http://www.facebook.com/cento84">http://www.facebook.com/cento84</a></li>
								<li><span class="ico"><img src="/images/market/ico_pro_google.gif" alt="" /></span><a href="http://plus.google.com/free84">http://plus.google.com/free84</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
      <div class="tabArea">
       <ul class="tab_list">
        <li><span><a href="#cont1">Artist</a></span></li>
        <li class="on"><span><a href="#cont2">Work Detail</a></span></li>
        <li><span><a href="#cont3">Recommends</a></span></li>
        <li><span><a href="#cont4">Shipping</a></span></li>
       </ul>
      </div>
      <div class="tabcont" id="cont2">
       <img src="/images/market/img_tab_tmp2.jpg" alt="" />
      </div>
        <div class="tabArea">
         <ul class="tab_list">
          <li><span><a href="#cont1">Artist</a></span></li>
          <li><span><a href="#cont2">Work Detail</a></span></li>
          <li class="on"><span><a href="#cont3">Recommends</a></span></li>
          <li><span><a href="#cont4">Shipping</a></span></li>
         </ul>
        </div>
        <div class="tabcont" id="cont3">
         <img src="/images/market/img_tab_tmp3.jpg" alt="" />
        </div>
        <div class="tabArea">
         <ul class="tab_list">
          <li><span><a href="#cont1">Artist</a></span></li>
          <li><span><a href="#cont2">Work Detail</a></span></li>
          <li><span><a href="#cont3">Recommends</a></span></li>
          <li class="on"><span><a href="#cont4">Shipping</a></span></li>
         </ul>
        </div>
        <div class="tabcont" id="cont4">
         <p>준비중입니다.</p>
        </div>
      </section> 
      






<script>



		$(".sns .inner a img").hover(function(){
	$(this).attr("src",$(this).attr("src").split("_off").join("_on"));
		},function(){
	$(this).attr("src",$(this).attr("src").split("_on").join("_off"));
});

		function imgalign(){
			$(".artSlide .list li").each(function(){
				var $this = $(this)
				var imgheight = $this.find("a").height()/2
				$this.find("a").css("margin-top",-imgheight)
			});
		}
		imgalign();
	
                function boxHeightCustom(){
                	var obj = $("#profileBox");
                    var box =  obj.find(".box");
                    var total = box.length;
                    for (var i = 0; i < box.length; i++) {
                      
                    };


                }//boxHeightCustom
                boxHeightCustom();

		$(function(){
			$(".blackBg").css({"opacity":"0.6"})
			$("button.zoom").click(function(){
				$("#zoomBg").fadeIn();
				$(".blackBg").fadeIn();
				
			});
			$("#zoomBg .close").click(function(){
				$("#zoomBg").fadeOut();
				$(".blackBg").fadeOut();
			});


          $(".tabArea .tab_list   a").click(function(event){            
                     event.preventDefault();
                     $('html,body').animate({scrollTop:($(this.hash).offset().top) - 200}, 500);
             });


        function viewInRoom(){
          var win = $(window),
           doc = $(document),
           viewport = win.height(),
           wrap = $("#wrap"),
           body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');

          var bigImg = $(".BigArea .img img").attr("src");
          var oL = $(".BigArea").find(".img").offset().left;
          var oT = $(".BigArea").find(".img").offset().top;
          var btn = $(".viewRoom"),
                  lst = $(".lst_gal");


          var marketBg = $("#marketBg"),
                marketImg = marketBg.find(".img"),
                close = marketBg.find(".btnClose button");




          function viewMotion(){
           var type = $(this).data("type");
           var img = $("<img>").attr("src",bigImg)
           .css({
            "position":"absolute",
            "left":oL,
            "top":oT,
            "z-index":10
           })
           .addClass("upImg").appendTo(marketBg);

           viewport = win.height();

           win.scrollTop(0);
           wrap.css({
            "height":viewport,
            "overflow":"hidden"
           });
           marketBg.css({"opacity":1,"display":"block"})
           .find(".bg."+type).css({"display":"block","opacity":0})
           .animate({"opacity":1},800).end()
           .find("h3.h_"+type).css("display","block");


           $(".upImg").delay(800).animate({
            "left":"50%",
            "top":198,
            "width":276,
            "margin-left":-138
           },1000);
           close.off().on("click",function(){
             wrap.css({
              "height":"",
              "overflow":""
             });
             marketBg.animate({"opacity":0},400,function(){
              $(this).css({"display":"none"}).find(".bg."+type).css({"display":"none"}).end().find("h3.h_"+type).css("display","none");
              $(".upImg").remove();
             });


           });

          }///viewMotion    


  
                  






                 
          lst.find("button").off().on("click",viewMotion); 
          btn.on("click",function(){
            lst.css("display",(lst.css("display") == "block") ? "none" : "block");
          });

        };

        viewInRoom();





			$(".layerOpen.request").click(function(){
				if ($(".layerPopupT1.request").css("display") == "none")
				{	
					$(".layerPopupT1").fadeOut();
					$(".layerPopupT1.request").fadeIn();
				}else{
						$(".layerPopupT1.request").fadeOut();
				}
			});
			$(".layerOpen.cart,.layerPopupT1 .close").click(function(){
				if ($(".layerPopupT1.cart").css("display") == "none")
				{	$(".layerPopupT1").fadeOut();
					$(".layerPopupT1.cart").fadeIn();
				}else{
						$(".layerPopupT1.cart").fadeOut();
				}
			});
		});
      $(".guide .htype2 > button").on("click",function(){
        var t = $(this).parent();
        if(!t.hasClass("on")){
          t.addClass("on").next().slideDown(300);
        }else{
          t.removeClass("on").next().slideUp(300);
        }

      });


    </script>

      
      
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





