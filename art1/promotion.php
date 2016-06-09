<?
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/goods/goods.class.php');




include "../inc/config.php";

$categoriName = "art1";
$pageName = "Promotion";
$pageNum = "1";
$subNum = "2";
$thirdNum = "0";
$pathType = "b";
$j = 0;


$Goods = new Goods();
$limitedNbr = $Goods->getLimitedNbr($dbh);
//$cnt = count($limitedNbr)
foreach($limitedNbr as $val) {
	//$aTemp .= $val['limited_nbr'].'|';
	$aTemp[$j] = $val['limited_nbr'];
	++$j;
}

//echo $aTemp;
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?>
<? include "../inc/spot_sub.php"; ?>
  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?>
          <? include "tab_art1.php"; ?>
<form name="goodsFrm" id="goodsFrm" method="post" action="/basket/index.php" onsubmit="return false;">
<input type="hidden" name="at" value="update">
<input type="hidden" name="ord" id="ord">
<input type="hidden" name="goods" id="goods" value="310">
<input type="hidden" name="order_cnt" value="1">

              <section id="art1_promotion" class="content-mediaBox margin1">
                     <header class="header">
                         <div class="movie">
                         <? if($check_ie === false){ ?>
                          <button class="play" onclick="playVid(3,this);"><img src="/images/bg/bg_mov_promotionBarble_play.jpg" alt="동영상 플레이 하기"></button>
                          <video id="movA4" loop="true" poster="/images/bg/bg_mov_promotionBarble.jpg" controls=""><source src="/Promotion_barble.mp4" type="video/mp4"><source src="/Promotion_barble.ogv" type="video/ogv"></video>
                          <!-- <iframe src="https://www.youtube.com/embed/GwFCyHs5lU4" frameborder="0" allowfullscreen></iframe> -->
                      <?}else{?>
                        <div id="art1_promotion_IeMov"></div>   
                      <?}?>
                          <!-- <iframe id="movYoutube1" src="//www.youtube.com/embed/EMI87-rtNOA?version=2&loop=1&autoplay=1&wmode=transparent&playlist=EMI87-rtNOA" frameborder="0" allowscriptaccess="always" allowfullscreen="true" wmode="Opaque" ></iframe> -->
                         </div>
                         <h1>"Barbie"</h1>
                         <p>Special Limited Edition 100</p>
                         <!-- <p>2015.3.4 ~ 3.14</p> -->
                     </header>
                     <article class="article">
                         <div class="rollingBanner">
                            <p class="txt_info">
                              <span><img src="/images/art1/ico_scroll.png" alt="scroll left and right"></span>
                            </p>
                            <div class="viewport">
                              <ul>
                                <li><img src="/images/art1/img_barbie_rol1.jpg" alt=""></li>
                                <li><img src="/images/art1/img_barbie_rol2.jpg" alt=""></li>
                                <li><img src="/images/art1/img_barbie_rol3.jpg" alt=""></li>
                                <li><img src="/images/art1/img_barbie_rol4.jpg" alt=""></li>
                                <li><img src="/images/art1/img_barbie_rol5.jpg" alt=""></li>
                                <li><img src="/images/art1/img_barbie_rol6.jpg" alt=""></li>
                                <li><img src="/images/art1/img_barbie_rol7.jpg" alt=""></li>
                                <li><img src="/images/art1/img_barbie_rol8.jpg" alt=""></li>
                                <li><img src="/images/art1/img_barbie_rol9.jpg" alt=""></li>
                              </ul>
                           </div>
                            <button class="prev">
                              <img src="/images/main/btn_ex_prev.png" alt="이전" class="pc">
                              <img src="/images/main/btn_ex2_prev.png" alt="이전" class="mobile">
                          </button>
                            <button class="next">
                              <img src="/images/main/btn_ex_next.png" alt="다음" class="pc">
                              <img src="/images/main/btn_ex2_next.png" alt="다음" class="mobile">
                            </button>
                         </div>
                         <div class="pro_info">
                              <ul>
                                 <li><strong>Name of Artist</strong><span>Yoon jeong won (윤정원)</span></li>
                                 <li class="rgh"><strong>Size</strong><span>16cm x 45.5cm x 8cm</span></li>
                                 <li><strong>Price</strong><span class="fc_pink">￦314.000</span></li>
                                 <li class="rgh"><strong>Title</strong><span>Barbie</span></li>
                                 <li><strong>Medium</strong><span>Mixed Media</span></li>
                                 <li class="shipping rgh">
                                    <strong>Shipping</strong>
                                    <span><em>￦10,000 (<!-- 화이트데이 -->특별패키지 ￦10,000 / 배송비 무료)</em> <b><!-- 작품은 3월 11일 일괄 배송됩니다. --> (배송기간 1~2일)</b><b class="fc_pink">미술작품의 특성상 반품 및 취소가 불가합니다. <br>에디션 선택의 특성상 2점 이상 구매하실 경우 각각 결제해 주시기 바랍니다.</b></span>
                                  </li>
                                 <li class="fn"><strong>Year</strong><span>2015</span></li>
                                 <li class="fn">
                                    <strong> Edition Number</strong>
                                    <span>
                                      <input type="text" class="only_number" id="limited_nbr" name="limited_nbr" maxlength="3" size="3" style="width:100px" readonly>
                                    </span>
                                    <p class="edition">1-100 에디션 중 원하시는 에디션 넘버를 선택하실 수 있습니다. <br>에디션 넘버는 아크릴 박스 뒷면에 기입되어 있으며, 원하는 넘버를 선택하여 세상에 하나뿐인 나만의 바비를 소장할 수 있습니다.</p>
                                    <div class="edittionbox">
                                    <p class="info">에디션 넘버를 선택해 주세요. 회색 숫자는 이미 판매가 완료된 넘버입니다.</p>
                                      <ul>
                                        <?php for($i = 1; $i <= 100; $i++):?>
                                        <li><button<?php if (in_array($i, $aTemp)) { ?> class="out"<?php } ?>><?php echo $i; ?></button></li>
                                        <?php endfor; ?>
                                      </ul>
                                      <button class="close">X</button>
                                    </div>
                                 </li>
                               </ul>

                               <div class="ex">
                                 <a href="javascript:;" class="btn_buy " id="btnBasket">구매하기</a>
                               </div>
                         </div>
                         <script type="text/javascript">
                         $(".edittionbox").css("display","none");
                              $("#limited_nbr").click(function(){
                                  $(".edittionbox").css("display","block");
                                  $(".edittionbox").find("li>button").on("click.edittion",function(){
                                      if(!$(this).hasClass("out")){
                                          var num = $(this).text();
                                           $("#limited_nbr").val(num);
                                           $(".edittionbox").css("display","none");
                                      }

                                  });

                                  $(".edittionbox").find(".close").on("click.edittionbox",function(){
                                     $(".edittionbox").css("display","none");
                                     $(".edittionbox").find(".close").off("click.edittionbox");
                                  });
                              })
                         </script>
                         <div class="pro_info2">
                              <h2 class="title7"><span>작품소</span>개</h2>
                               <p>아트1의 2015년 첫 번째 ‘Art Collaboration’ 프로모션에 함께할 아티스트는 윤정원 작가다. 이번 프로모션을 통해 판매되는 작품은 윤정원 작가의 작품 ‘Barbie’다.</p>
                               <p>오랫동안 소녀들의 로망이자 아름다움의 상징으로 많은 사랑을 받아온 바비인형에 다양한 재료들을 꼴라주하여 새로운 모습의 작품 ‘Barbie’를 탄생시켰다. 대량생산된 공산품 바비인형에 작가의 손길이 더해져 단 하나의 특별한 작품 ‘Barbie’로 거듭난 것 이다.</p>
                               <p>아트1은 ‘Art Collaboration’ 프로모션을 기념하여 스페셜 에디션으로 100점 한정 제작된 윤정원 작가의 작품 ‘Barbie’를 ₩314,000 이라는 특별가로 소장할 수 있는 기회를 제공한다. <!-- 작품 구매는 3월 4일(수)부터 3월14일(토)까지 가능하다. --></p>
                               <p>‘모두에게 익숙한 바비인형을 소재로 한 이번 작품을 통해 대중들이 미술 작품을 보다 친숙하게 느끼길 기대한다.</p>
                               <p>아트1의 ‘Art Collaboration’은 그동안 어렵고 멀게만 느껴졌던 작품구매를 손쉽게 할 수 있는 기회를 제공하는 프로모션이다. 아트1은 앞으로도 다양한 아티스트와의 아트 콜라보레이션을 통해 특별한 프로모션을 지속적으로 선보일 예정이다. </p>

                         </div>
                         <div class="pro_info2">
                              <h2 class="title7"><span>윤정원</span> Yoon jeong won</h2>
                              <div class="photo"><img src="/images/art1/img_barbie1.jpg" alt="윤정원 Yoon jeong won"></div><!-- //photo -->
                              <div class="cont">
                                  <dl class="n1">
                                    <dt>학력</dt>
                                    <dd><span class="year">2001</span>  독일 스투트가르트 국립조형대학 대학원 졸업</dd>
                                    <dd><span class="year">2000</span>  독일 뒤셀도르프 쿤스트아카데미 수학</dd>
                                    <dd><span class="year">1999</span>  독일 스투트가르트 국립조형대학 졸업</dd>
                                  </dl>
                                  <dl class="n1">
                                    <dt>개인전</dt>
                                    <dd><span class="year">2013</span>  최고의 사치, 트렁크갤러리, 서울 </dd>
                                    <dd><span class="year">2012</span>  Fantasy Universe, 애경백화점_ AK 갤러리, 수원</dd>
                                    <dd><span class="year">2011</span>  Smileplanet at Royal and Skape, 갤러리 스케이프 & 갤러리 로얄, 서울</dd>
                                  </dl>
                                  <dl class="n1">
                                    <dt>그룹전</dt>
                                    <dd><span class="year">2014</span>  욕망의 여섯 가지 얼굴, 스페이스K_광주, 광주 </dd>
                                    <dd><span class="year">2013</span>  서울시립 북서울미술관 개관전 Ⅱ부: 장면의 재구성 #2 _ NEW SCENES, 서울 시립 북서울미술관, 서울 애니마믹 비엔날레 2013-2014, 내 안의 드라마, 대구미술관, 대구</dd>
                                  </dl>
                                  <div class="txt">
                                    <p>윤정원 작가는 다양한 재료와 작업방식으로 작품 활동을 한다. </p>
                                    <p>작가는 일상 속에서 예술을 발견하여 평범한 일상용품들을 예술작품으로 재탄생시킴으로써 ‘삶이 곧 예술이며 예술이 곧 삶’임을 보여준다.</p>
                                  </div>
                              </div><!-- //cont -->
                         </div>
                        <h2 class="title7"><span>작가</span>의 다른작품</h2>
                         <div class="lst_pro">
                           <ul>
                             <li><img src="/images/art1/img_barbie_ch1.jpg" alt=""></li>
                             <li><img src="/images/art1/img_barbie_ch2.jpg" alt=""></li>
                             <li><img src="/images/art1/img_barbie_ch3.jpg" alt=""></li>
                             <li><img src="/images/art1/img_barbie_ch4.jpg" alt=""></li>
                           </ul>
                         </div>
                     </article>
              </section>
</form>



    </div><!-- //container_inner -->
  </section><!-- //container_sub -->


<? if($check_ie === true){ ?>
 <script src="/js/jwplayer.js"></script>
<?}?>
<script>
<? if($check_ie === true){ ?>
  $(function(){
      var jwp =null,

       jwp = jwplayer('art1_promotion_IeMov').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           image: "/images/bg/bg_mov_promotionBarble.jpg",
                           autostart: false,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/Promotion_barble.flv"
                       });


})
<?}?>

      var vid = [
        document.getElementById("movA1"),
        document.getElementById("movA2"),
        document.getElementById("movA3"),
        document.getElementById("movA4")
      ]

      function playVid(n,t) { 
          var $this = $(t);
          $this.css("display","none");
          vid[n].play(); 

      } 

      function pauseVid() { 
          vid[n].play(); 
      }


  





    </script>



<?php echo ACTION_IFRAME; ?>

<script type="text/javascript">
$(function(){
    var banOffset = $(".rollingBanner").offset().top;
    var winOffset  = $(window).scrollTop();
    var winSize = $(window).height();
    //bannerInfo(banOffset , winOffset , winSize);
    $(window).scroll(function(){
      banOffset = $(".rollingBanner").offset().top;
      winOffset  = $(window).scrollTop();
      winSize = $(window).height();
        //bannerInfo(banOffset , winOffset , winSize);
    })

    function bannerInfo(objH , winH , winS){
      if(winS < objH ){
          con(":::::banOffset:::::" + objH + ":::::winOffset:::::" + winH + ":::::winSize:::::" + winS );
           if( (objH - winH) < (winS - 650) ){
            if(!isie8){
              //con("sdfdfasdfadfasdfdfasdfadf" + (winS+objH+100));
              $(".rollingBanner > .txt_info").stop().animate({"opacity":0},100,function(){
                $(this).css("display","none");
              });
            }else{
              $(".rollingBanner > .txt_info").css("display","none");
            }
           }else{
               if(!isie8){
                 $(".rollingBanner > .txt_info").css("display","block").stop().animate({"opacity":1},100);
               }else{
                $(".rollingBanner > .txt_info").css("display","block");
               }
           }

       }else{
           $(".rollingBanner > .txt_info").css("display","none");
       }//if
    }/*//bannerInfo*/


  var  art1PromotionScroll = new IScroll('.rollingBanner > .viewport',  {
      scrollX: true,
      scrollY: false,
      mouseWheel: true ,
      preventDefault: false
      });

		$("#btnBasket").bind("click", function(){order("basket");});

});

       //  function rollingBanner(obj){
       //    var $obj = $(obj);
       //    var $obj.each(function(){
       //      var $(this) = $this
       //      var $viewport = $this.find(".viewport"); //마스크박스
       //      var $pos = $viewport.find("ul");
       //      var $prev = $obj.find(".prev");
       //      var $next = $obj.find(".next");
       //      var boxSize = 480;
       //      var total = $pos.find("> *").length; //배너 갯수
       //      var pageNum = 0; //현제 페이지
       //      var maskBoxSize = $viewport.outerWidth();
       //      var WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;



       //      function resize(){
       //          WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
       //          maskBoxSize = $viewport.outerWidth();
       //          con("rollingBanner::::::마스크사이즈 :::::"+maskBoxSize);
       //          con("rollingBanner::::::이전 마스크사이즈 :::::"+prevMaskBoxSIze);
       //          if(maskBoxSize != prevMaskBoxSIze ){
       //            con("rollingBanner::::::사이즈 변동");
       //            if(WinWdith < 661 && WinWdith > 520){

       //            }else if(WinWdith < 519){

       //            }else{

       //            }

       //            /*exp =  Math.round(maskBoxSize / boxSize);
       //            pageTotal = total -  exp;
       //            con("mov:::::노출되는 갯수::::"+exp);
       //            con("mov:::::총페이지 수::::"+pageTotal);
       //            prevMaskBoxSIze = maskBoxSize;
       //            //pageingMotion();
       //            pageNum = 0;
       //            $pos.animate({"left":0 },500,"swing");*/
       //          }
       //   }//resize

       //     function pageingMotion(){
       //      if(exp < total){
       //          $next.css("display",(pageTotal > pageNum) ? "block" : "none");
       //          $prev.css("display",(0 >= pageNum) ? "none" : "block");
       //        }else{
       //          $next.css("display","none");
       //          $prev.css("display","none");
       //        }
       //     }//pageingMotion

       //     function posMotion(pageNum){
       //     $pos.animate({"left": -(boxSize * pageNum) },200,"swing");
       //      //pageingMotion();

       //     }//posMotion

       //       $viewport.swipe( {
       //          //Generic swipe handler for all directions
       //          swipeLeft:function(event, direction, distance, duration, fingerCount) {
       //             if(!$pos.is(":animated")){
       //                pageNum = (pageNum >= pageTotal) ? pageTotal : pageNum + 1;
       //                posMotion(pageNum);
       //             };
       //             pageingOvrMotion($viewport, pageNum ,exp , pageTotal)

       //          },
       //           swipeRight:function(event, direction, distance, duration, fingerCount) {
       //                if(!$pos.is(":animated")){
       //                pageNum = (pageNum <= 0) ? 0 : pageNum - 1;
       //                posMotion(pageNum);
       //              };
       //              pageingOvrMotion($viewport, pageNum ,exp , pageTotal)
       //          },
       //          excludedElements:".noSwipe",
       //          threshold:80
       //        });

       //     //
       //      $next.on("click",function(){
       //        if(!$pos.is(":animated")){
       //            pageNum = (pageNum >= pageTotal) ? pageTotal : pageNum + 1;
       //            posMotion(pageNum);
       //         }
       //         pageingOvrMotion($viewport, pageNum ,exp , pageTotal)

       //      });

       //      $prev.on("click",function(){
       //          if(!$pos.is(":animated")){
       //            pageNum = (pageNum <= 0) ? 0 : pageNum - 1;
       //            posMotion(pageNum);
       //          };
       //          pageingOvrMotion($viewport, pageNum ,exp , pageTotal)
       //      });

       //     /*resize();
       //     $(window).resize(function(){resize()});*/
       // //   });
       //  }//rollingBanner

        //rollingBanner(rollingBanner);

	function order(ord) {
		if ($("#limited_nbr").val() == "") {
			alert("에디션넘버를 입력하세요.");
			$("#limited_nbr").focus();
			return false;
		}
		else {
			//alert("준비 중 입니다..");
			$("#ord").val(ord);
			document.goodsFrm.target = "action_ifrm";
			document.goodsFrm.submit();
		}
	}
  </script>
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





