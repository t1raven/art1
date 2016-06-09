<? include "../inc/config.php"; ?>
<?php
  $categoriName = "Market";
  $pageName = "Market";
  $pageNum = "3";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
  <? include "../inc/header.php"; ?> 
  <? include "../inc/spot_sub.php"; ?> 
  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
      <section id="marketView1" class="clearfix">
          <div class="item">
            <img src="/images/market/img_tmpv1.jpg" alt="">
            <img src="/images/market/img_tmpv2.jpg" alt="">
          </div>
          <article class="cont">
            <h1>HONG’S ECO BAG - 에코백</h1>
            <p class="money">100,000 원</p>
            <div class="btns">
              <button class="btnPack ov-g"><span>장바구니 담기</span></button>
              <button class="btnPack ov-g"><span>WISHLIST</span></button>
            </div> 
            <div class="sns">
              <div class="inner">
                <a href="#" class="sns1"><img src="/images/ico/ico_sns1.gif" alt="페이스북"></a>
                <a href="#" class="sns2"><img src="/images/ico/ico_sns2.gif" alt=" "></a>
                <a href="#" class="sns3"><img src="/images/ico/ico_sns3.gif" alt="인스타그램"></a>
                <a href="#" class="sns4"><img src="/images/ico/ico_sns4.gif" alt="pinterest"></a>
              </div>
            </div>
            <div class="guide">
                  <h2 class="htype2"><button>작품상세</button></h2>
                  <div class="accordionBox">
                      <p class="t">HONG’S ECO BAG – 에코백은 이민아 작가의 작품으로 사용하기에 
편리하면서 환경을 생각한 디자인과 재료로 제작되었습니다.</p>
                  </div><!-- //accordionBox --> 
                  <h2 class="htype2"><button>상품상세정보</button></h2>
                  <div class="accordionBox">
                      <p class="t">- 사이즈 : 80 X 20 X 10<br /> - 재료 : 종이, 한지, 플라스틱</p>
                  </div><!-- //accordionBox --> 
                  <h2 class="htype2"><button>교환/환불/반품안내</button></h2>
                  <div class="accordionBox">
                      <p class="t">HONG’S ECO BAG – 에코백은 이민아 작가의 작품으로 사용하기에 
편리하면서 환경을 생각한 디자인과 재료로 제작되었습니다.</p>
                  </div><!-- //accordionBox --> 
            </div>
            <div class="ectProduct">
                <h2>관련상품</h2>
                <ul class="items">
                  <li><a href="#"><img src="/images/market/tmp1_10.jpg" alt=""></a></li>
                  <li><a href="#"><img src="/images/market/tmp1_11.jpg" alt=""></a></li>
                </ul>
            </div>
          </article>
      </section>
      






<script>

      $(".guide .htype2 > button").on("click",function(){
        var t = $(this).parent();
        if(!t.hasClass("on")){
          $(".guide .htype2.on").removeClass("on").next().slideUp(300);
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





