<? include "../inc/config.php"; ?>
<?php
  $categoriName = "MY ACCOUNT";
  $pageName = "대시보드";
  $pageNum = "5";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 

  <section id="container_sub" class="mt0">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
      <? include "tab_myaccount.php"; ?> 
      <div class="dashSubArea">
         <div id="dashboardArea" class="content-mediaBox margin1">
        
          <section id="basicArea" class="dash_lst">
              <header class="header">
                <h1 class="title1">기본정보</h1>
              </header>
              <article class="article">
                  <ul class="lst_sort1">
                      <li><strong>E-mail(ID)</strong><span>ryu@oktomato.net</span></li>
                      <li><strong>SMS 수신</strong><span>NO</span></li>
                      <li><strong>뉴스레터 수신</strong><span>YES</span></li>
                  </ul><!-- //lst_sort1 -->

                  <div class="btn_bot lft">
                    <a href="/member/modify.php" class="btn_pack samll2 black">수정</a>
                  </div><!-- //btn_bot -->

              </article><!-- //article -->
          </section><!-- //basicArea -->


          <section id="customerArea" class="dash_lst">
              <header class="header">
                <h1 class="title1">상담내역</h1>
                <a href="/member/qna.php" class="more"><img src="/images/btn/btn_bbs_more.gif" alt="더보기"></a>
              </header>
              <article class="article">
                  <div class="table_dot">
                    <table summary="상담내역에 관한 날짜,제목,관련문의,답변여부에 관한 표입니다.">
                      <caption>상담내역</caption>
                      <colgroup>
                        <col class="data2 pcTable">
                        <col>
                        <col class="t4 pcTable">
                        <col class="t4 pcTable">
                      </colgroup>
                      <tbody>
                        <tr>
                          <td class="ta-l pcTable"><span class="fc_data">2015 / 03 / 21</span></td>
                          <td class="ta-l">
                            <a href="#" class="h">벽에 고인 눈물 작품 문의 드립니다.</a>
                            <!-- 모바일시 나옴 -->
                            <div class="mobileTableBox">
                              <span class="fc_data">2015 / 03 / 21</span>
                              <span>작품상담</span>
                              <span class="fc_noanswer">미답변</span>
                            </div>
                          </td>
                          <td class="pcTable">작품상담</td>
                          <td class="pcTable"><span class="fc_noanswer">미답변</span></td>
                        </tr>
                        <tr>
                          <td class="ta-l pcTable"><span class="fc_data">2015 / 03 / 21</span></td>
                          <td class="ta-l">
                            <a href="#" class="h">벽에 고인 눈물 작품 문의 드립니다.</a>
                            <!-- 모바일시 나옴 -->
                            <div class="mobileTableBox">
                              <span class="fc_data">2015 / 03 / 21</span>
                              <span>작품상담</span>
                              <span class="fc_noanswer">미답변</span>
                            </div>
                          </td>
                          <td class="pcTable">작품상담</td>
                          <td class="pcTable"><span class="fc_noanswer">미답변</span></td>
                        </tr>
                        <tr>
                          <td class="ta-l pcTable"><span class="fc_data">2015 / 03 / 21</span></td>
                          <td class="ta-l">
                            <a href="#" class="h">벽에 고인 눈물 작품 문의 드립니다.</a>
                            <!-- 모바일시 나옴 -->
                            <div class="mobileTableBox">
                              <span class="fc_data">2015 / 03 / 21</span>
                              <span>작품상담</span>
                              <span class="fc_answer">답변</span>
                            </div>
                          </td>
                          <td class="pcTable">작품상담</td>
                          <td class="pcTable"><span class="fc_answer">답변</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- //tableType -->
              </article><!-- //article -->

          </section><!-- //customerArea -->


          <section id="orderAddArea" class="dash_lst">
              <header class="header">
                <h1 class="title1">배송주소록</h1>
                <a href="/member/address.php" class="more"><img src="/images/btn/btn_bbs_more.gif" alt="더보기"></a>
              </header>
              <article class="article">
                  <div class="lst_order">
                      <div class="lst">
                        <div class="inner">
                            <h1>기본배송주소</h1>
                            <div class="txt">
                                  <p>홍길동 / 회사</p>
                                  <p>서울시 양천구 오목로 180 2층</p>
                            </div>
                            <div class="btn"><a href="#" class="fc_blue">수정</a> <a href="#" class="fc_blue">추가</a></div>
                          </div>
                      </div><!-- //lst -->

                       <div class="lst">
                        <div class="inner">
                            <h1>추가배송주소1</h1>
                            <div class="txt">
                                  <p>홍길동 / 회사</p>
                                  <p>서울시 양천구 오목로 180 2층</p>
                            </div>
                            <div class="btn"><a href="#" class="fc_blue">수정</a> <a href="#" class="fc_blue">추가</a></div>
                          </div>
                      </div><!-- //lst -->

                      <div class="lst">
                        <div class="inner">
                            <h1>추가배송주소1</h1>
                            <div class="txt">
                                  <p>홍길동 / 회사</p>
                                  <p>서울시 양천구 오목로 180 2층</p>
                            </div>
                            <div class="btn"><a href="#" class="fc_blue">수정</a> <a href="#" class="fc_blue">추가</a></div>
                          </div>
                      </div><!-- //lst -->

                      <div class="lst">
                        <div class="inner">
                            <h1>추가배송주소1</h1>
                            <div class="txt">
                                  <p>홍길동 / 회사</p>
                                  <p>서울시 양천구 오목로 180 2층</p>
                            </div>
                            <div class="btn"><a href="#" class="fc_blue">수정</a> <a href="#" class="fc_blue">추가</a></div>
                          </div>
                      </div><!-- //lst -->

                      
                 </div><!-- //lst_order -->
              </article><!-- //article -->

          </section><!-- //orderAddArea -->


          <section id="wishListArea" class="dash_lst">
              <header class="header">
                <h1 class="title1">위시리스트</h1>
              </header>
              <article class="article">
                  <div class="lst_horizontal style4">
                      <ul>
                          <li>
                            <!-- //렌탈 비활성시 버튼에 .Inactive 넣어주세요 -->
                              <div class="photo">
                                <a href="#"><img src="/upload/goods/list/1420791631436V4Q4FMB.jpg" alt=""></a>
                              </div>
                              <div class="cont">
                                <p class="t1">홍길동</p>
                                <p class="t2">Chicago Fragments XVI</p>
                              </div>
                              <div class="btn">
                                <button class="btn_pack radius">RENTAL</button>
                                <button class="btn_pack radius Inactive" onclick="alert('판매가 불가능한 제품입니다.')">CART</button>
                              </div>
                          </li>
                          <li>
                              <div class="photo">
                                <a href="#"><img src="/upload/goods/list/1420791425S32ZLEUFND.jpg" alt=""></a>
                              </div>
                              <div class="cont">
                                <p class="t1">홍길동</p>
                                <p class="t2">Chicago Fragments XVI</p>
                              </div>
                              <div class="btn">
                                <button class="btn_pack radius Inactive">RENTAL</button>
                                <button class="btn_pack radius">CART</button>
                              </div>
                          </li>
                          <li>
                              <div class="photo">
                                <a href="#"><img src="/upload/goods/list/1420790957BWX65ZT4WX.jpg" alt=""></a>
                              </div>
                              <div class="cont">
                                <p class="t1">홍길동</p>
                                <p class="t2">Chicago Fragments XVI Chicago Fragments XVI Chicago Fragments XVI</p>
                              </div>
                              <div class="btn">
                                <button class="btn_pack radius">RENTAL</button>
                                <button class="btn_pack radius">CART</button>
                              </div>
                          </li>
                          <li>
                              <div class="photo">
                                <a href="#"><img src="/upload/goods/list/1420790765NFZYKD28QL.jpg" alt=""></a>
                              </div>
                              <div class="cont">
                                <p class="t1">홍길동</p>
                                <p class="t2">Chicago Fragments XVI</p>
                              </div>
                              <div class="btn">
                                <button class="btn_pack radius">RENTAL</button>
                                <button class="btn_pack radius">CART</button>
                              </div>
                          </li>
                      </ul>
                  </div>
              </article>

          </section><!-- //wishListArea -->


          <section id="orderInfoArea" class="dash_lst">
              <header class="header">
                <h1 class="title1">주문정보</h1>
              </header>
              <article class="article">
                  <div class="table_dot">
                    <table summary="주문정보에 관한 날짜,제목,관련문의,답변여부에 관한 표입니다.">
                      <caption>주문정보</caption>
                      <colgroup>
                        <col class="data pcTable">
                        <col class="pcTable">
                        <col>
                        <col class="t4 pcTable">
                        <col class="t4 pcTable">
                      </colgroup>
                      <tbody>
                        <tr>
                          <td class="pcTable"><span class="fc_data">2015 / 03 / 21</span></td>
                          <td class="pcTable"><a href="#">2231CE23344EA23434</a></td>
                          <td class="ta-l">
                            <a href="#" class="h">벽에 고인 눈물 작품 문의 드립니다.</a>
                            <!-- 모바일시 나옴 -->
                            <div class="mobileTableBox">
                              <span class="fc_data">2015 / 03 / 21</span>
                              <span>2231CE23344EA23434</span>
                              <span>\ 4,600,000</span>
                              <span><a href="#">상세정보</a></span>
                            </div>

                          </td>
                          <td class="pcTable">\ 4,600,000</td>
                          <td class="pcTable"><a href="#">상세정보</a></td>
                        </tr>
                        <tr>
                          <td class="pcTable"><span class="fc_data">2015 / 03 / 21</span></td>
                          <td class="pcTable"><a href="#">2231CE23344EA23434</a></td>
                          <td class="ta-l">
                            <a href="#" class="h">벽에 고인 눈물 작품 문의 드립니다.</a>
                            <!-- 모바일시 나옴 -->
                            <div class="mobileTableBox">
                              <span class="fc_data">2015 / 03 / 21</span>
                              <span>2231CE23344EA23434</span>
                              <span>\ 4,600,000</span>
                              <span><a href="#">상세정보</a></span>
                            </div>
                          </td>
                          <td class="pcTable">\ 4,600,000</td>
                          <td class="pcTable"><a href="#">상세정보</a></td>
                        </tr>

                      </tbody>
                    </table>
                  </div><!-- //tableType -->
              </article>

          </section><!-- //orderInfoArea -->

        </div>
      </div>
      
      
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <script type="text/javascript">
      tabTransformation(1,"c");

      function tabMotion(o){
        var obj  = $(o);

        obj.each(function(){
          $this = $(this);
          var start = $this.data("start");
          var direction = $this.find(".prev , .next");
          var winSIze = window.innerWidth;
          var boxPos =$this.find(">ul");
          var boxChildren =  boxPos.find(">li");
          var total = boxChildren.length;
          var boxPosSIze = boxPos.outerWidth();
          var easeing = "swing";
          var nomal = false;
          var mobile1 = false;
          var mobile2 = false;


         

          function mainMotion(direction){

            if(!boxPos.is(":animated")){
              if(direction == "prev"){
                //'Scroll up'
              }else{//prev
                //'Scroll down'
              }//next 
            }
          };//motion

           // 윈도우 바로 밖에 있는 메뉴 인덱스를 잡아낸다.
          function windowOutside(){
            winSIze = window.innerWidth;
            var index;
            for (var i = 0; i < boxChildren.length; i++) {
              var offset = boxChildren.filter(":eq("+i+")").offset().left;
              if(offset > winSIze){
                index =  boxChildren.filter(":eq("+i+")").index();
                return index;
              }
            };
          }
          

          function posMotion(b,num){
            if(!b){
              // 현재 오버값
              var index = boxChildren.filter(".on").index();
              //박스크기의 퍼센트 값을 잡는다.
              var s = (parseInt(boxPos.css("width")) / winSIze ) * 100;
              //박스 크기/전체메뉴 겟수 * 현제 오버 값 을 해서 이동할 값을 얻는다.
              var size = (s/total)* index;
              boxPos.css({"left":"-"+size+"%"});
            }else{
              //boxPos.animate({"left":-(lft)},300,easeing);  
            }
          }//



           function directionClick(e){
              if ($(this).hasClass("prev")) {motion("prev");}else{motion("next");}
            }


          function dirctionDisplay(){
              if(boxChildren.filter(".on").index() == 0){
                    direction.filter(".prev").css("display","none");         
                }else{
                    direction.filter(".prev").css("display","block");         
                }

                if(boxChildren.filter(".on").index() == (total-1)){
                    direction.filter(".next").css("display","none");         
                }else{
                    direction.filter(".next").css("display","block");         
                }  
          }


          function resizeMotion(){
            winSIze = window.innerWidth;
            boxPosSIze = boxPos.outerWidth();
              if(winSIze > 768 ){
                if(!nomal){
                  
                }
                nomal = true;
                mobile1 = false;
                mobile2 = false;

              }else if(winSIze < 768 && winSIze > 768 ){
                if(!mobile1){
                  //posMotion(false);

                }
                 nomal = false;
                 mobile1 = true;
                 mobile2 = false;

              }else if(width < 480 && width > 320 ){
                if(!mobile2){
                  //posMotion(false);
                }
                nomal = false;
                mobile1 = false;
                mobile2 = true;
              }


            
          }//resizeMotion


          function init(){
             boxChildren.filter(":eq("+start+")").addClass("on");
             dirctionDisplay();
             posMotion(false);

            if(winSIze > boxPosSIze){

            }else{
              
                
            }///winSIze   

            direction.on("click",directionClick); 
            $(window).on("resize",resizeMotion);

          }//init

          init();


        })//each
      }//scrollMotion
      //tabMotion(".tabBox");
  </script>
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>













