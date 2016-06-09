<? include "../inc/config.php"; ?>
<?php
  $pageName = "MarketPlace";
  $pageNum = "0";
  $subNum = "0";
  $thirdNum = "0";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
  <? include "../inc/header.php"; ?> 
  <section id="spot_sub" class="fixedsubTop">
    <div class="img"><img src="/images/spot/img_spotsub1.jpg" alt=""></div>
    <div class="cont">
      <h1><img src="/images/spot/p_spotsub1.png" alt="market Place"></h1>
      <p>전세계 미술계 소식을 한발 빠르게 전합니다. </p>
    </div>
  </section>
<script>
      $(function(){
         

         //
        //bxslider//////////////////////////////////
          function spotVisible(currentIndex){
            var obj = $(currentIndex);
              for (var i = 0; i < obj.find(".cont > .inner > *").length; i++) {
                obj.find(".cont > .inner > *").css({
                  "opacity":0,
                  "margin-top":-20
                })
              };
          };

          function spotReset(currentIndex){
            var obj = $(currentIndex);
              for (var i = 0; i < obj.find(".cont > .inner > *").length; i++) {
                obj.find(".cont > .inner > *").filter(":eq("+i+")").delay(400*i).animate({
                  "margin-top":0,
                  "opacity":1
                },800,"easeInOutQuart");
              };
          };


          var slider =  $('.RepBanner .bxBanner > ul').bxSlider({
               auto: true,
               autoControls: false,
               stopAuto: true,
               speed:800,
               pause:7000,

               onSliderLoad: function(currentIndex){
                if(isie7 || isie8){}else{
                  var obj = $('ul.banner_list > li:eq('+currentIndex+')');
                  spotVisible(obj);
                  spotReset(obj);

                }
                    //spotReset(currentIndex);
                // do funky JS stuff here
               // alert('Slider has finished loading. Click OK to continue!');
              },
              onSlideBefore: function(currentIndex){
                if(isie7 || isie8){}else{spotVisible(currentIndex);}
                //


              },
              onSlideAfter: function(currentIndex){
                if(isie7 || isie8){}else{spotReset(currentIndex); }
                //  spotReset(currentIndex);
                //alert($(this));
                // do mind-blowing JS stuff here
                //alert('A slide has finished transitioning. Bravo. Click OK to continue!');
              //  alert($(this).attr("class"));


              }
            });

          var slider2 =  $('.MDChoice .bxBanner > ul').bxSlider({
               auto: false,
               autoControls: false,
               stopAuto: false,
               speed:800,
               pause:7000
            });

            $(document).on('click','.bx-next, .bx-prev , .bx-pager-link , .bxBanner',function() {
                  slider.stopAuto();
                  slider.startAuto();

          });
          //bxslider//////////////////////////////////
          //

         
          // 작품오버시 메뉴
          btnFadeUp(".item");
          // 탭
          tabMotion(".tab_type2");  
          //
          
        });      

        $(window).on("load",function(){
          wideSlideBox(".wideSlideBox");
        });

          


    

  </script>
  <section id="container_sub">
    <div class="container_inner">
      <div class="path content-mediaBox">
        <p><a href="/" class="home">HOME</a>  &lt; Market Place</p>
      </div>
      <section id="marketPlaceArea">

      <section class="topseller Paragraph">
        <header class="content-mediaBox">
            <h1 class="title1">Collection</h1>
            <div class="tab_type2" data-start="1" data-box="posA1">
              <ul>
                <li><a href="ajax_collection1.php">TOP SELLER</a></li>
                <li><a href="ajax_collection2.php">MD’S PICK</a></li>
                <li><a href="ajax_collection3.php">NEW ARRIVAL</a></li>
              </ul>
            </div><!-- //tab_type2 -->
        </header>
        <div class="wideSlideBox">
          <div class="dmp-controls">
            <div class="pageing">
               <button class="prev"><img src="/images/ico/btn_prev.png" alt="이전"></button>
               <button class="next"><img src="/images/ico/btn_next.png" alt="다음"></button>
             </div><!-- //pageing -->
           </div>
            
            <div class="pos posA1 wide-pre-Box content-mediaBox">
               <p class="noAjaxData">데이타가 존재하지 않습니다.</p>
            </div><!--//pos -->
           

        </div>
        
      </section><!-- //issued -->


      <section class="toprated Paragraph">
        <header class="content-mediaBox">
          <h1 class="title1">Top Rated Item</h1>
          <ul class="sort_lst">
              <li>
                  <dl class="sort_box">
                      <dt><button><span>Price</span></button></dt>
                      <dd>
                        <ul>
                          <li class="n0"><button>전체</button></li>
                          <li class="n1"><button>50,000 ~ 100,000 원</button></li>
                          <li class="n2"><button>100,000 ~ 200,000 원</button></li>
                          <li class="n3"><button>200,000 ~ 500,000 원</button></li>
                          <li class="n4"><button>500,000 ~ 1,000,000 원</button></li>
                          <li class="n5"><button>1,000,000 원 이상</button></li>
                        </ul>
                      </dd>
                  </dl>
              </li>
              <li>
                  <dl class="sort_box">
                      <dt><button><span>Medium</span></button></dt>
                      <dd>
                        <ul>
                          <li class="n0"><button>전체</button></li>
                          <li class="n1"><button>50,000 ~ 100,000 원</button></li>
                          <li class="n2"><button>100,000 ~ 200,000 원</button></li>
                          <li class="n3"><button>200,000 ~ 500,000 원</button></li>
                          <li class="n4"><button>500,000 ~ 1,000,000 원</button></li>
                          <li class="n5"><button>1,000,000 원 이상</button></li>
                        </ul>
                      </dd>
                  </dl>
              </li>
              <li>
                  <dl class="sort_box">
                      <dt><button><span>Subject</span></button></dt>
                      <dd>
                        <ul>
                          <li class="n0"><button>전체</button></li>
                          <li class="n1"><button>50,000 ~ 100,000 원</button></li>
                          <li class="n2"><button>100,000 ~ 200,000 원</button></li>
                          <li class="n3"><button>200,000 ~ 500,000 원</button></li>
                          <li class="n4"><button>500,000 ~ 1,000,000 원</button></li>
                          <li class="n5"><button>1,000,000 원 이상</button></li>
                        </ul>
                      </dd>
                  </dl>
              </li>
              <li>
                  <dl class="sort_box">
                      <dt><button><span>Size</span></button></dt>
                      <dd>
                        <ul>
                          <li class="n0"><button>전체</button></li>
                          <li class="n1"><button>50,000 ~ 100,000 원</button></li>
                          <li class="n2"><button>100,000 ~ 200,000 원</button></li>
                          <li class="n3"><button>200,000 ~ 500,000 원</button></li>
                          <li class="n4"><button>500,000 ~ 1,000,000 원</button></li>
                          <li class="n5"><button>1,000,000 원 이상</button></li>
                        </ul>
                      </dd>
                  </dl>
              </li>
          </ul>
        </header>
        <script>
          //alert(e.which); // 1:좌클릭, 2:휠클릭, 3:우클릭  
             function sortDesignMotion(obj){
                var o = $(obj);

                function selectRemove(){
                    o.css({
                      "z-index":2
                    }).find("dd").css({
                      "display":"none"
                    });
                 } 

                o.each(function(){
                    var t = $(this);
                    var name = $(this).find("dt").text();

                    function selectOptionOpen(event){
                      event.stopPropagation();
                      var elemt = $(this);
                      var option = elemt.parent().next(); 
                      var box = elemt.parents("dl");
                      var open = option.css("display") == "block";
                       if(!open){
                          selectRemove();
                          box.css("z-index",5);
                          option.slideDown(300);
                       }else{
                           box.css("z-index",2);
                           option.slideUp(300);
                       }

                        $("html").off().on("mousedown",function(event){
                           if(event.which == 1){
                              box.css("z-index",2);
                              option.slideUp(300);
                              }
                           }); 

                       option.find("button").off().on("mousedown",function(event){
                          if(event.which == 1){
                            var num = $(this).parent().attr("class").replace("n","");
                             if( num == 0 ){
                                box.find("dt>button>span").text(name);
                             }else{
                                box.find("dt>button>span").text($(this).text());
                             }
                           }
                       });
                    }//selectOptionOpen
                    t.find(">dt>button").on("mousedown",selectOptionOpen)
                });
             }; 

            $(function(){ sortDesignMotion(".sort_box") });

            


        </script>
        <article class="lst_horizontal style2 content-mediaBox">
              <ul>
                <li>
                  <div class="item">
                    <a href="#"><img src="/images/market/tmp1_6.jpg" alt=""></a>
                    <div class="link">
                      <ul>
                        <li><a href="#" class="zoom">자세히 보기</a></li>
                        <li><a href="#" class="nlink">관련링크</a></li>
                        <li><a href="#" class="basket">장바구니</a></li>
                        <li><a href="#" class="mark">찜하기</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="cont">
                    <p class="t1">신현임</p>
                    <p class="t2">생명의 숲</p>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <a href="#"><img src="/images/market/tmp1_9.jpg" alt=""></a>
                    <div class="link">
                      <ul>
                        <li><a href="#" class="zoom">자세히 보기</a></li>
                        <li><a href="#" class="nlink">관련링크</a></li>
                        <li><a href="#" class="basket">장바구니</a></li>
                        <li><a href="#" class="mark">찜하기</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="cont">
                    <p class="t1">신현임</p>
                    <p class="t2">생명의 숲</p>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <a href="#"><img src="/images/market/tmp1_7.jpg" alt=""></a>
                    <div class="link">
                      <ul>
                        <li><a href="#" class="zoom">자세히 보기</a></li>
                        <li><a href="#" class="nlink">관련링크</a></li>
                        <li><a href="#" class="basket">장바구니</a></li>
                        <li><a href="#" class="mark">찜하기</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="cont">
                    <p class="t1">신현임</p>
                    <p class="t2">생명의 숲</p>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <a href="#"><img src="/images/market/tmp1_8.jpg" alt=""></a>
                    <div class="link">
                      <ul>
                        <li><a href="#" class="zoom">자세히 보기</a></li>
                        <li><a href="#" class="nlink">관련링크</a></li>
                        <li><a href="#" class="basket">장바구니</a></li>
                        <li><a href="#" class="mark">찜하기</a></li>
                      </ul>
                    </div>
                  </div>
                 <div class="cont">
                    <p class="t1">신현임</p>
                    <p class="t2">생명의 숲</p>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <a href="#"><img src="/images/market/tmp1_6.jpg" alt=""></a>
                    <div class="link">
                      <ul>
                        <li><a href="#" class="zoom">자세히 보기</a></li>
                        <li><a href="#" class="nlink">관련링크</a></li>
                        <li><a href="#" class="basket">장바구니</a></li>
                        <li><a href="#" class="mark">찜하기</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="cont">
                    <p class="t1">신현임</p>
                    <p class="t2">생명의 숲</p>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <a href="#"><img src="/images/market/tmp1_9.jpg" alt=""></a>
                    <div class="link">
                      <ul>
                        <li><a href="#" class="zoom">자세히 보기</a></li>
                        <li><a href="#" class="nlink">관련링크</a></li>
                        <li><a href="#" class="basket">장바구니</a></li>
                        <li><a href="#" class="mark">찜하기</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="cont">
                    <p class="t1">신현임</p>
                    <p class="t2">생명의 숲</p>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <a href="#"><img src="/images/market/tmp1_7.jpg" alt=""></a>
                    <div class="link">
                      <ul>
                        <li><a href="#" class="zoom">자세히 보기</a></li>
                        <li><a href="#" class="nlink">관련링크</a></li>
                        <li><a href="#" class="basket">장바구니</a></li>
                        <li><a href="#" class="mark">찜하기</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="cont">
                    <p class="t1">신현임</p>
                    <p class="t2">생명의 숲</p>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <a href="#"><img src="/images/market/tmp1_8.jpg" alt=""></a>
                    <div class="link">
                      <ul>
                        <li><a href="#" class="zoom">자세히 보기</a></li>
                        <li><a href="#" class="nlink">관련링크</a></li>
                        <li><a href="#" class="basket">장바구니</a></li>
                        <li><a href="#" class="mark">찜하기</a></li>
                      </ul>
                    </div>
                  </div>
                 <div class="cont">
                    <p class="t1">신현임</p>
                    <p class="t2">생명의 숲</p>
                  </div>
                </li>

              </ul>
        </article>
        
        
      </section><!-- //toprated -->


      <section class="artProduct content-mediaBox">
        <h1  class="title1">ArtHongs Product</h1>
        <article class="lst_horizontal style3">
            <ul>
              <li>
                <div class="item"><a href="market_view1.php"><img src="/images/market/tmp1_10.jpg" alt=""></a></div>
                <div class="cont">
                  <p class="t1">Hong’s 에코백</p>
                  <p class="t2">50,000원</p>
                </div>
              </li>
              <li>
                <div class="item"><a href="market_view1.php"><img src="/images/market/tmp1_11.jpg" alt=""></a></div>
                <div class="cont">
                  <p class="t1">Hong’s 에코백</p>
                  <p class="t2">50,000원</p>
                </div>
              </li>
              <li>
                <div class="item"><a href="market_view1.php"><img src="/images/market/tmp1_12.jpg" alt=""></a></div>
                <div class="cont">
                  <p class="t1">Hong’s 에코백</p>
                  <p class="t2">50,000원</p>
                </div>
              </li>
              <li>
                <div class="item"><a href="market_view1.php"><img src="/images/market/tmp1_13.jpg" alt=""></a></div>
                <div class="cont">
                  <p class="t1">Hong’s 에코백</p>
                  <p class="t2">50,000원</p>
                </div>
              </li>
            </ul>
        </article>

      </section><!-- //toprated -->
  </section><!-- //marketPlaceArea -->








      
      
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





