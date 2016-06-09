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
          //btnFadeUp(".item");
          // 탭
          tabMotion(".tab_type2");  
          //
          
        });      

        $(window).on("load",function(){
          //wideSlideBox(".wideSlideBox");
        });

        

          


    

  </script>
  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
      <section id="marketPlaceArea">
        <!--
          Selection
          상품 썸네일 380 * 286 으로 고정 부탁드립니다.(css로가 아닌  순수 이미지 사이즈)

         -->
        <section class="issued Paragraph">
          <header class="content-mediaBox">
            <h1 class="title1">Selection</h1>
              <div class="tab_type2" data-start="1" data-box="posA2">
                <ul>
                  <li><a href="ajax_selection1.php">ISSUED</a></li>
                  <li><a href="ajax_selection2.php">FOCUSED WORKS</a></li>
                  <li><a href="ajax_selection3.php">AWARDED ARTIST</a></li>
                </ul>
              </div><!-- //tab_type2 -->
          </header>
          <div class="issuedArticle">
              <div class="dmp-controls">
                <div class="pageing">
                   <button class="prev"><img src="/images/ico/btn_prev.png" alt="이전"></button>
                   <button class="next"><img src="/images/ico/btn_next.png" alt="다음"></button>
                 </div><!-- //pageing -->
               </div>
              <div class="pos posA2 wide-pre-Box content-mediaBox">
                 <p class="noAjaxData">데이타가 존재하지 않습니다.</p>
              </div><!--//pos -->
           </div>
        </section><!-- //issued -->
        <!--
          Curation
          상품 썸네일 778 * 378 으로 고정 부탁드립니다.(css로가 아닌  순수 이미지 사이즈)

         -->
        <section class="hotTheme clearfix content-mediaBox Paragraph">
         <h1 class="title1">Curation</h1>   
          <article class="RepBanner">
              <div class="bxBanner">
                <ul>
                  <li>
                    <a href="#" class="item"><img src="/images/market/tmp1_4.jpg" alt=""></a>
                    <div class="cont">
                      <div class="inner">
                        <p class="t1">다가오는 크리스마스를 준비하며!</p>
                        <p class="t2">Christmas Collection</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <a href="#" class="item"><img src="/images/market/tmp1_4.jpg" alt=""></a>
                    <div class="cont">
                      <div class="inner">
                        <p class="t1">다가오는 크리스마스를 준비하며!</p>
                        <p class="t2">Christmas Collection</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <a href="#" class="item"><img src="/images/market/tmp1_4.jpg" alt=""></a>
                    <div class="cont">
                      <div class="inner">
                        <p class="t1">다가오는 크리스마스를 준비하며!</p>
                        <p class="t2">Christmas Collection</p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
          </article><!-- //RepBanner -->
           <!--
             MDChoice
             상품 썸네일 267 * 173 으로 고정 부탁드립니다.(css로가 아닌  순수 이미지 사이즈)

             -->

          <article class="MDChoice">
              <div class="inner">
                <h2 class="title2">MD Choice</h2>  
                <div class="bxBanner">
                  <ul>
                    <li><a href="#"><img src="/images/market/tmp1_5.jpg" alt=""></a></li>
                    <li><a href="#"><img src="/images/market/tmp1_5.jpg" alt=""></a></li>
                    <li><a href="#"><img src="/images/market/tmp1_5.jpg" alt=""></a></li>
                  </ul>
                </div><!-- //bxBanner -->
              </div><!-- //inner -->
          </article><!-- //MDChoice -->

          <article class="quickLink">
              <h2 class="blind">quick banner</h2>  
              <div class="inner">
                <ul class="lst">
                  <li class="on"><a href="#"><span>Christmas Collection</span></a></li>
                  <li><a href="#"><span>일러스트 특집</span></a></li>
                  <li><a href="#"><span>북유럽 특집</span></a></li>
                  <li><a href="#"><span>Christmas Collection</span></a></li>
                  <li><a href="#"><span>일러스트 특집</span></a></li>
                </ul>
              </div>
          </article><!-- //quickLink -->

      </section><!-- hotTheme -->
      <!--
       Collection
       상품 썸네일 183 * 135 으로 고정 부탁드립니다.(css로가 아닌  순수 이미지 사이즈)

       -->
      <section class="topseller Paragraph">
        <header class="content-mediaBox">
            <h1 class="title1">Collection</h1>
            <div class="tab_type2" data-start="1" data-box="posA1">
              <ul>
                <li><a href="ajax_collection1.php">TOP SELLER</a></li>
                <li><a href="ajax_collection2.php">MD’S PICK</a></li>
                <li><a href="ajax_collection3.php">NEW ARRIVALS</a></li>
              </ul>
            </div><!-- //tab_type2 -->
        </header>
        <div class="topsellerArticle">
          <div class="dmp-controls">
            <div class="pageing">
               <button class="prev"><img src="/images/ico/btn_prev.png" alt="이전"></button>
               <button class="next"><img src="/images/ico/btn_next.png" alt="다음"></button>
             </div><!-- //pageing -->
           </div><!-- //dmp-controls -->
            <div class="pos posA1 wide-pre-Box content-mediaBox">
               <p class="noAjaxData">데이타가 존재하지 않습니다.</p>
            </div><!--//pos -->
        </div><!-- //topsellerArticle -->
      </section><!-- //issued -->

      <!--
       Archive
       상품 썸네일 183 * 135 으로 고정 부탁드립니다.(css로가 아닌  순수 이미지 사이즈)

       -->
      <section class="toprated Paragraph">
        <header class="content-mediaBox">
          <h1 class="title1">Archive</h1>
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
          <button class="btn_result">SEARCH</button>
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
                    <span class="ico_red_circle">sold out</span>
                    <a href="#"><img src="/images/market/tmp1_15.jpg" alt=""></a>
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
                    <a href="#"><img src="/images/market/tmp1_16.jpg" alt=""></a>
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
                    <a href="#"><img src="/images/market/tmp1_17.jpg" alt=""></a>
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
                    <span class="ico_red_circle">sold out</span>
                    <a href="#"><img src="/images/market/tmp1_18.jpg" alt=""></a>
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
                    <a href="#"><img src="/images/market/tmp1_19.jpg" alt=""></a>
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
                    <a href="#"><img src="/images/market/tmp1_20.jpg" alt=""></a>
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
                    <span class="ico_blue_circle">rental 가능</span>
                    <a href="#"><img src="/images/market/tmp1_21.jpg" alt=""></a>
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
                    <a href="#"><img src="/images/market/tmp1_22.jpg" alt=""></a>
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
                    <span class="ico_blue_circle">rental 가능</span>
                    <a href="#"><img src="/images/market/tmp1_23.jpg" alt=""></a>
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
                    <a href="#"><img src="/images/market/tmp1_24.jpg" alt=""></a>
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
                    <span class="ico_blue_circle">rental 가능</span>
                    <a href="#"><img src="/images/market/tmp1_25.jpg" alt=""></a>
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
                    <a href="#"><img src="/images/market/tmp1_26.jpg" alt=""></a>
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

      <!--
       ArtHongs Product
       상품 썸네일 280 * 210 으로 고정 부탁드립니다.(css로가 아닌  순수 이미지 사이즈)

       -->
      <section class="artProduct content-mediaBox">
        <h1  class="title1">Art Product</h1>
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





