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
  
  <section id="container_sub">
    <div class="container_inner">
        <section id="artistInfo" class="content-mediaBox margin1">
            <header class="header">
                <h1>홍길동 <span>Hong Gil-dong</span></h1>
                <ul  class="total">
                  <li>총 등록 작품 수 : <span>20</span></li>
                  <li>렌탈된  작품 수 : <span>20</span></li>
                  <li>판매된 작품 수 : <span>20</span></li>
                </ul>
            </header>

            <article class="article">
                <div id="marketProductAjax">
                  
                </div>
            </article>
        </section>   

      <script src="/js/isotope.pkgd.min.js"></script>
      <script src="/js/jquery.transform2d.js"></script>
        <script>

        $(function(){
          ajaxData();
          scrollNewEvent()
          var mainTimeOutSet;
         /* $(window).resize(function(){
              clearInterval(mainTimeOutSet);
              mainTimeOutSet = setTimeout(function(){
                  iCutterLoadNone("#marketArea .marketVisual .list > ul > li .photo");
                  iCutterLoadNone("#marketArea .categori .list > ul > li .photo");
              },1000);
            })*/
        })
        $(window).on("scroll",function(){
           scrollNewEvent();
           //getItemElement();
          })


        var $container = $("#marketProductAjax");
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


<!--      <p><img src="/images/market/img_artist_infor.jpg" alt="" /></p> -->







      
      
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





