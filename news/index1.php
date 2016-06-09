<? include "../inc/config.php"; ?>
<?php
  $categoriName = "NEWS";
  $pageName = "NEWS";
  $pageNum = "2";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<div class="loadingBox">
    <h1>NEWS</h1>  
</div>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
	<div class="tabBox mb2">
		<ul>
			<li class="on"><a href="index1.php">In brief</a></li>
			<li><a href="index2.php">Trend</a></li>
			<li><a href="index3.php">People</a></li>
			<li><a href="index4.php">World</a></li>
			<li><a href="index5.php">Trouble</a></li>
			<li><a href="index6.php">Episode</a></li>
			<li><a href="index7.php">Community</a></li>
		</ul>
	</div>
       <script src="/js/isotope.pkgd.min.js"></script>
       <section id="newWrapper">
          
        </section>
<script>






$(".loadingBox").css("display","none");
/*      $(window).load(function(){
          $(".loadingBox").fadeOut(400);
      });*/
      $(function(){
        ajaxData();
         /* $(".ajaxLoad").bind("click",function(){
            getItemElement();
          });*/
      })



  var scrollNewsStartFlag = false;
  var loadingImg = $("<img>").addClass("loading").attr("src","../images/ico/ajax-loader.gif").css({
    "position":"absolute",
    "left":"50%",
    "top":0,
    "margin-left":-30
  });

  function loadingStart(num){
    $("#newWrapper").append(loadingImg);
    loadingImg.css("top",num);
  };

  function scrollNewEvent(w){

    var win = $(window),
    doc = $(document),
    body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
    var top = win.scrollTop() + win.height();
    var endHeight = $("#newWrapper").offset().top + $("#newWrapper").outerHeight() +150;

    if(top > endHeight ){
      startScroll();
    }

    function startScroll(){
      if(!scrollNewsStartFlag){
        scrollNewsStartFlag = true;
        loadingStart($("#newWrapper").outerHeight());
         getItemElement(); 

      }//if
      
    }

    

  
  };//scrollNewEvent

   $(window).on("scroll",function(){
     scrollNewEvent();
     //getItemElement(); 
    })
      
      var $container = $("#newWrapper");

      function ajaxData(num)
        {
          
           $.ajax({
               type:"GET",
               url:"ajax-bbs1.php",
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
          url:"ajax-bbs1.php",
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
                      $data2.css({"opacity":0 , "margin-top":100}).animate({"opacity":1 , "margin-top":0},500);

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
          








      
      
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





