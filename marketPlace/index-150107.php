<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/market/event.class.php');
require(ROOT.'lib/class/market/marketmain.class.php');
require(ROOT.'lib/class/market/goods.class.php');
include(ROOT.'inc/config.php');

$categoriName = 'MARKET';
$pageName = 'MARKET';
$pageNum = '3';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

$Event = new Event();
$eventBanner = $Event->getEventExhibitionBanner($dbh);
$Event = null;
unset($Event);

$aMdChoiceTitleList = null;
$Marketmain = new Marketmain();
$mdChoiceTitle = $Marketmain->getMDChoiceList($dbh);

if (!empty($mdChoiceTitle)) {
	$aMdChoiceTitle = explode('§', $mdChoiceTitle);
	foreach($aMdChoiceTitle as $val) {
			$aMdChoiceTitleList[] = $val;
	}
}

$Marketmain = null;
unset($Marketmain);


$Goods = new Goods();
$aGoodsList = $Goods->getMainGoodsList($dbh);
$Goods = null;
unset($Goods);


include '../inc/link.php';
include '../inc/top.php';
include '../inc/header.php';
include '../inc/spot_sub.php';
?>
<script>
      $(function(){
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

          /*var slider2 =  $('.MDChoice .bxBanner > ul').bxSlider({
               auto: false,
               autoControls: false,
               stopAuto: false,
               speed:800,
               pause:7000
            });

            $(document).on('click','.bx-next, .bx-prev , .bx-pager-link , .bxBanner',function() {
                  slider.stopAuto();
                  slider.startAuto();
            });*/
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
      <?php include "../inc/path.php"; ?>
      <section id="marketArea">

        <section class="marketVisual content-mediaBox margin1">
          <header class="header">
            <h1 class="blind">마켓메인비주얼</h1>
            <h2 class="blind">공유하기</h2>
            <dl class="share">
                <dt><button><img src="/images/btn/btn_share.png" alt="공유하기"></button></dt>
                <dd>
                  <ul>
                    <li><button><img src="/images/btn/btn_share1_off.png" alt="페이스북"></button></li>
                    <li><button><img src="/images/btn/btn_share2_off.png" alt="핀터레스트"></button></li>
                    <li><button><img src="/images/btn/btn_share3_off.png" alt="인스타그램"></button></li>
                    <li><button><img src="/images/btn/btn_share4_off.png" alt="픽터파이"></button></li>
                    <li><button><img src="/images/btn/btn_share5_off.png" alt="구글플러스"></button></li>
                  </ul>
                </dd>
            </dl>
          </header>
          <article class="marketVisualArticle">
              <div class="dmp-controls">
                <div class="pageing">
                   <button class="prev"><img src="/images/btn/btn_prev.png" alt="이전"></button>
                   <button class="next"><img src="/images/btn/btn_next.png" alt="다음"></button>
                 </div><!-- //pageing -->
               </div>
              <div class="list">
                 <ul>
                     <li>
                       <div class="photo"><img src="/images/tmp/tmp_market_1.jpg" alt=""></div>
                     </li>
                     <li>
                       <div class="photo"><img src="/images/tmp/tmp_market_12.jpg" alt=""></div>
                     </li>
                     <li>
                       <div class="photo"><img src="/images/tmp/tmp_market_13.jpg" alt=""></div>
                     </li>
                     <li>
                       <div class="photo"><img src="/images/tmp/tmp_market_14.jpg" alt=""></div>
                     </li>
                 </ul>
              </div><!--//list -->

              <div class="cont">
                 <ul>
                     <li>
                       <div class="spec">
                          <h3>깎여진산수11-3-1 <strong>임희성</strong></h3>
                          <p class="t1">플락시글래스안에 오일 &amp; 아크릴</p>
                          <p>116 X 175 (100호)</p>
                          <p>2013</p>
                          <a href="/marketPlace/artwork_view.php?goods=15" class="btn">View Detail &gt; </a>
                       </div>
                     </li>
                     <li>
                       <div class="spec">
                          <h3>깎여진산수11-3-2 <strong>임희성</strong></h3>
                          <p class="t1">플락시글래스안에 오일 &amp; 아크릴</p>
                          <p>116 X 175 (100호)</p>
                          <p>2013</p>
                          <a href="/marketPlace/artwork_view.php?goods=15" class="btn">View Detail &gt; </a>
                       </div>
                     </li>
                     <li>
                       <div class="spec">
                          <h3>깎여진산수11-3-3 <strong>임희성</strong></h3>
                          <p class="t1">플락시글래스안에 오일 &amp; 아크릴</p>
                          <p>116 X 175 (100호)</p>
                          <p>2013</p>
                          <a href="/marketPlace/artwork_view.php?goods=15" class="btn">View Detail &gt; </a>
                       </div>
                     </li>
                     <li>
                       <div class="spec">
                          <h3>깎여진산수11-3-4 <strong>임희성</strong></h3>
                          <p class="t1">플락시글래스안에 오일 &amp; 아크릴</p>
                          <p>116 X 175 (100호)</p>
                          <p>2013</p>
                          <a href="/marketPlace/artwork_view.php?goods=15" class="btn">View Detail &gt; </a>
                       </div>
                     </li>
                 </ul>
              </div><!--//list -->
              <img src="/images/tmp/tmp_market_1.jpg" alt="" class="boxsize">
           </article><!-- //marketVisualArticle -->
        </section><!-- //marketVisual -->

       <section class="categori content-mediaBox margin1">
         <div class="list">
             <ul>
               <li class="n1">
                 <div class="photo"><img src="/images/tmp/tmp_market_2.jpg" alt=""></div>
                 <div class="spec">
                    <h3>회화</h3>
                    <a href="#categoriList" data-filter=".Conversation" class="btn">View Detail &lt; </a>
                 </div>
               </li>
               <li class="n2">
                 <div class="photo"><img src="/images/tmp/tmp_market_3.jpg" alt=""></div>
                 <div class="spec">
                    <h3>사진</h3>
                    <a href="#categoriList" data-filter=".Photo" class="btn">View Detail &lt; </a>
                 </div>
               </li>
               <li class="n3">
                 <div class="photo"><img src="/images/tmp/tmp_market_4.jpg" alt=""></div>
                 <div class="spec">
                    <h3>디자인</h3>
                    <a href="#categoriList" data-filter=".Design"  class="btn">View Detail &lt; </a>
                 </div>
               </li>
               <li class="n4">
                 <div class="photo"><img src="/images/tmp/tmp_market_5.jpg" alt=""></div>
                 <div class="spec">
                    <h3>판화</h3>
                    <a href="#categoriList" data-filter=".Print" class="btn">View Detail &lt; </a>
                 </div>
               </li>
               <li class="n5">
                 <div class="photo"><img src="/images/tmp/tmp_market_6.jpg" alt=""></div>
                 <div class="spec">
                    <h3>조각</h3>
                    <a href="#categoriList" data-filter=".Carving" class="btn">View Detail &lt; </a>
                 </div>
               </li>
               <li class="n6">
                 <div class="photo"><img src="/images/tmp/tmp_market_7.jpg" alt=""></div>
                 <div class="spec">
                    <h3>영상</h3>
                    <a href="#categoriList" data-filter=".Image" class="btn">View Detail &lt; </a>
                 </div>
               </li>
               <li class="n7">
                 <div class="photo"><img src="/images/tmp/tmp_market_8.jpg" alt=""></div>
                 <div class="spec">
                    <h3>설치</h3>
                    <a href="#categoriList" data-filter=".Installation" class="btn">View Detail &lt; </a>
                 </div>
               </li>
               <li class="n8">
                 <div class="photo"><img src="/images/tmp/tmp_market_9.jpg" alt=""></div>
                 <div class="spec">
                    <h3>기타</h3>
                    <a href="#categoriList" data-filter=".Other" class="btn">View Detail &lt; </a>
                 </div>
               </li>
             </ul>
          </div><!--//list -->
       </section><!-- //categori -->

       <div id="categoriList" class="tabBox">
            <h3 class="h_tab"><button>전체</button></h3>
          <ul style="display: block;">
                <li><a href="#categoriList" data-filter=".Conversation" >회화</a></li>
                <li><a href="#categoriList" data-filter=".Photo" >사진</a></li>
                <li><a href="#categoriList" data-filter=".Design" >디자인</a></li>
                <li><a href="#categoriList" data-filter=".Print" >판화</a></li>
                <li><a href="#categoriList" data-filter=".Carving" >조각</a></li>
                <li><a href="#categoriList" data-filter=".Image" >영상</a></li>
                <li><a href="#categoriList" data-filter=".Installation" >설치</a></li>
                <li><a href="#categoriList" data-filter=".Other" >기타</a></li>
          </ul>
      </div>

      <div class="searchArea content-mediaBox margin1">
          <div class="inner">
                <ul class="sort_lst">
                    <li>
                        <dl class="sort_box">
                            <dt><button><span>모든 테마</span></button></dt>
                            <dd>
                              <ul>
                                <li class="n0"><button data-filter="*">전체</button></li>
                                <li class="n1"><button data-filter=".n1_1">x1</button></li>
                                <li class="n2"><button data-filter=".n1_2">x2</button></li>
                                <li class="n3"><button data-filter=".n1_3">x3</button></li>
                              </ul>
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl class="sort_box">
                            <dt><button onmousedown="size.value='';"><span>모든사이즈</span></button></dt>
                            <dd>
                              <ul>
                                <li class="n0"><button>전체</button></li>
                                <?php $j = 0; $i = 1; foreach($aSize as $val): ?>
                                <li class="n<?php echo $i;?>"><button><?php echo $val;?></button></li>
                                <?php ++$j; ++$i; endforeach; ?>
                              </ul>
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl class="sort_box">
                            <dt><button><span>모든 컬러</span></button></dt>
                            <dd>
                              <ul>
                                <li class="n0"><button>전체</button></li>
                                <?php $j = 0; $i = 1; foreach($aColor as $val): ?>
                                <li class="n<?php echo $i;?>"><button><?php echo $val;?></button></li>
                                <?php ++$j; ++$i; endforeach; ?>
                              </ul>
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl class="sort_box">
                            <dt><button><span>모든 가격</span></button></dt>
                            <dd>
                              <ul>
                                <li class="n0"><button>전체</button></li>
                                <?php $j = 0; $i = 1; foreach($aPrice as $val): ?>
                                <li class="n<?php echo $i;?>"><button><?php echo $val;?></button></li>
                                <?php ++$j; ++$i; endforeach; ?>
                              </ul>
                            </dd>
                        </dl>
                    </li>
                </ul>
                <button class="btn_result">Search tools</button>
                <div class="search2">
                  <div class="lst_check type3">
                      <span>
                          <label for="search2inp">렌탈가능</label>
                          <input type="radio" name="search2inp" id="search2inp" >
                      </span>
                      <span>
                          <label for="search3inp">판매중</label>
                          <input type="radio" name="search3inp" id="search3inp">
                      </span>
                     </div><!-- //lst_check -->
                     <div class="inpBox">
                          <input type="text" id="" name="" title="검색어 입력">
                          <button><img src="/images/btn/btn_search.png" alt="검색하기"></button>
                     </div>
              </div>
           </div>
      </div><!-- //searchArea -->

      <script src="/js/isotope.pkgd.min.js"></script>
      <script src="/js/jquery.transform2d.js"></script>
      <div id="marketProductAjax" class="content-mediaBox margin1">

      </div>
  </section><!-- //marketPlaceArea -->

    </div><!-- //container_inner -->
  </section><!-- //container_sub -->

<script>






    //서치툴 토글
    $("#marketArea .searchArea .search2").css("display","none");
    $("#marketArea .searchArea").stop().animate({"height":60},300)
    $("#marketArea .searchArea .btn_result").on("click",function(){
       var obj = $("#marketArea .searchArea .search2");
       if(obj.css("display") == "none"){
        $("#marketArea .searchArea").stop().animate({"height":100},300)
        obj.slideDown(300);
       }else{
        $("#marketArea .searchArea").stop().animate({"height":60},300)
        obj.slideUp(300);
       }


    });

    tabTransformation(0,"c");
    iCutter("#marketArea .marketVisual .list > ul > li .photo");
    iCutter("#marketArea .categori .list > ul > li .photo");



  var mainTimeOutSet;



    $(function(){

        ajaxData();
        $(window).resize(function(){
            clearInterval(mainTimeOutSet);
            mainTimeOutSet = setTimeout(function(){
                iCutterLoadNone("#marketArea .marketVisual .list > ul > li .photo");
                iCutterLoadNone("#marketArea .categori .list > ul > li .photo");
            },1000);
          })



    //공유하기
    $(".share > dt > button").on("click",function(){
      var child = $(this).parent().next().find(">ul>li");
        forFade(child,(child.css("display") == "none") ? true : false);
    });
    //공유하기 버튼 오버
    $(".share > dd  button").on("mouseenter mouseleave",function(e){
        $(this).find("img").imgConversion((e.type == "mouseenter") ? true : false);
    });

    //작품 오버시 cover
    //
    function mouseEnter(){
      var elemt = $(this);
      var photo = elemt.find(".photo");
      var cont = elemt.find(".spec");
      var cover = $("<div class='cover'></div>");
      var speed = 300;
      if(Modernizr.csstransforms) photo.find("img").stop().animate({"transform": "scale(1.2)"},10000);
      elemt.append(cover);
      fadePlayMotion(cont , true , speed);
      fadePlayMotion(cover , true , speed);
    }

    function mouseLeave(){
      var elemt = $(this);
      var photo = elemt.find(".photo");
      var cont = elemt.find(".spec");
      var cover = elemt.find(".cover");
      var photo = elemt.find(".photo");
      var speed = 300;
       if(Modernizr.csstransforms) photo.find("img").stop().animate({"transform": "scale(1)"},100);
      fadePlayMotion(cont , false , speed);
      cover.stop().animate({"opacity":0},speed,function(){
            $(this).css("display","none").remove();
          });
    }

     function visualBoxEnter(){
      var elemt = $(this);
      var cont = elemt.find(".marketVisualArticle >.cont");
      var photo = elemt.find(".marketVisualArticle >.list > ul > li.on > .photo");
      var cover = $("<div class='cover'></div>");
      var speed = 300;
      $("#marketArea .marketVisual .prev , #marketArea .marketVisual .next").css("display","block");
      elemt.append(cover);
      //if(Modernizr.csstransforms) photo.find("img").stop().animate({"transform": "scale(1.4)"},30000);
      fadePlayMotion(cont , true , speed);
      fadePlayMotion(cover , true , speed);
    }

    function visualBoxLeave(){
      var elemt = $(this);
      var cover = elemt.find(".cover");
      var cont = elemt.find(".marketVisualArticle >.cont");
      var photo = elemt.find(".marketVisualArticle >.list > ul > li.on > .photo");
      //var cont = elemt.find(".spec");
      $("#marketArea .marketVisual .prev , #marketArea .marketVisual .next").css("display","none");
      var speed = 300;
       //if(Modernizr.csstransforms) photo.find("img").stop().animate({"transform": "scale(1)"},100);
      fadePlayMotion(cont , false , speed);
      cover.stop().animate({"opacity":0},speed,function(){
          $(this).css("display","none").remove();
        });
    }

    $(".categori .list > ul > li ").on("mouseenter",mouseEnter).on("mouseleave",mouseLeave);

       var visualNum = 0;
       var visualTotal = $("#marketArea .marketVisual .list > ul > li").length - 1;
       $("#marketArea .marketVisual .list > ul > li:eq("+visualNum+")").addClass("on");
       $("#marketArea .marketVisual .cont > ul > li:eq("+visualNum+")").addClass("on");
       function visualAction(page){
          var photo = $("#marketArea .marketVisual .list > ul > li:eq("+page+")");
          var cont = $("#marketArea .marketVisual .cont > ul > li:eq("+page+")");
          var prevPhoto = $("#marketArea .marketVisual .list > ul > li.on");
          var prevCont = $("#marketArea .marketVisual .cont > ul > li.on");
          prevPhoto.removeClass("on");
          prevCont.removeClass("on");
          photo.addClass("on");
          cont.addClass("on");


        };

        $("#marketArea .marketVisual .prev , #marketArea .marketVisual .next").on("click",function(){
              if($(this).hasClass("prev")){
                  if(visualNum < 0){
                      visualNum = visualTotal-1;
                  }else{
                    visualNum --;
                  }

                visualAction(visualNum);

              }else if($(this).hasClass("next")){

                if(visualNum >= visualTotal){
                      visualNum = 0;
                  }else{
                    visualNum ++;
                  }

                visualAction(visualNum);
              }
        });

        visualAction(visualNum);



    $("#marketArea .marketVisual").on("mouseenter",visualBoxEnter).on("mouseleave",visualBoxLeave);








  })










   //차례로 페이드  함수
   function forFade(chi,sw){
      var child = chi;
      var Switch = sw;
      if(Modernizr.opacity){
        var length = child.length;
         if(Switch){
            for (var i = 0; i < length; i++) {
              child.filter(":eq("+i+")").css({
                "display":"block",
                "opacity":0
              }).stop().delay(100*i).animate({
                "opacity":1
              },300);
            };
          }else{
            for (var i = 0; i < length; i++) {
              child.filter(":eq("+i+")").stop().animate({
                  "opacity":0
                },200,function(){
                 $(this).css({"display":"none"});
                });

            };
          }
        }else{//ie8
            child.css("display",(Switch) ? "block" : "none");
        }//Modernizr

   }



  var scrollNewsStartFlag = false;
  var loadingImg = $("<img>").addClass("loading").attr("src","../images/ico/ajax-loader.gif").css({
    "position":"absolute",
    "left":"50%",
    "top":0,
    "margin-left":-30
  });

  function loadingStart(num){
    $("#marketProductAjax").append(loadingImg);
    loadingImg.css("top",num);
  };

  function scrollNewEvent(w){

    var win = $(window),
    doc = $(document),
    body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
    var top = win.scrollTop() + win.height();
    var endHeight = $("#marketProductAjax").offset().top + $("#marketProductAjax").outerHeight() +150;

    if(top > endHeight ){
      startScroll();
    }

    function startScroll(){
      if(!scrollNewsStartFlag){
        scrollNewsStartFlag = true;
        loadingStart($("#marketProductAjax").outerHeight());
         getItemElement();

      }//if

    }




  };//scrollNewEvent

   $(window).on("scroll",function(){
     scrollNewEvent();
     //getItemElement();
    })
    var categoriDep1;
    $(".categori > .list > ul > li  a , #categoriList > ul > li > a").click(function(event){
            event.preventDefault();
            var index = $(this).parents("li").index();
            $('html,body').animate({scrollTop:$(this.hash).offset().top - 100}, 500);
            var filterValue = $(this).attr('data-filter');
            categoriDep1 = filterValue;
            alert(categoriDep1);
            $container.isotope({ filter: filterValue });
            $("#categoriList > ul > li").each(function(){
              $(this).removeClass("on");
              $("#categoriList > ul > li:eq("+index+")").addClass("on");

            });

    });


    $(".sort_lst dl.sort_box dd > ul > li").on("mousedown",function(event){
            event.preventDefault();
            var filterValue = $(this).find("button").attr('data-filter');
            alert(categoriDep1 +" , "+ filterValue);
             $container.isotope({ filter:categoriDep1+ filterValue });
    });



      var $container = $("#marketProductAjax");

      function ajaxData(num)
        {

           $.ajax({
               type:"GET",
               url:"ajax-bbs-120107.php",
               ansync : false,
               dataType:"html",
               success : function(data) {
                    var $container2;
                    $container.children().remove();
                      $("<div id='tmpData'></div>").html(data).appendTo($container);
                      var data2 = $container.find("#tmpData").html();
                      $container.append(data2);
                      $("#tmpData").remove();
                      var imgLoad = imagesLoaded( $container );

                      function onAlways( instance ) {
                        $container.find("img").fadeIn( 2000);
                            $container.isotope({
                             itemSelector: '.newsBox',
                            });
                      };
                      imgLoad.on( 'always', onAlways );



                      /*function onDone( instance ) {
                      alert('onDone');
                    };
*/
                  /*  imgLoad.on( 'progress', function( instance, image ) {
                        var result = image.isLoaded ? 'loaded' : 'broken';
                        console.log( 'image is ' + result + ' for ' + image.img.src );
                      });*/

                     /*$container.imagesLoaded(function(){
                        $container.find("img").fadeIn( 2000);
                          $container.isotope({
                           itemSelector: '.newsBox',
                          });

                        });*/


                  //imgLoad.on( 'done', onDone);
               },
               complete : function(data) {

               },
               error : function(xhr, status, error) {
                alert(error);
                $container.children().remove();
                $('<p class="noProduct">상품이 존재하지 않습니다.</p>').appendTo($container);

               }
          });
        }//ajaxData

    function getItemElement() {
        $.ajax({
          type:"GET",
          url:"ajax-bbs-120107.php",
          dataType:"html",
          success : function(data) {

            loadingImg.animate({
                  "opacity":0
                },500,function(){
                  $(this).css("opacity",1).remove();
                    $("<div id='tmpData'></div>").html(data).appendTo($container);
                      var $data2 = $($container.find("#tmpData").html());
                      $container.append($data2);
                      $("#tmpData").remove();
                      $container.isotope( 'appended',$data2).isotope('layout');
                      $data2.css({"opacity":0 , "margin-top":0}).animate({"opacity":1 , "margin-top":0},500);

                      scrollNewsStartFlag = false;

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


  </script>

  <script>
    checkListMotion(".lst_check.type3");
    var price = '', medium = '', subject = '', size = '';
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

            $(function(){ sortDesignMotion(".sort_box"); });
        </script>

<?php include '../inc/footer.php'; ?>
<?php include '../inc/bot.php'; ?>
<?php
$dbh = null;
unset($dbh);
?>