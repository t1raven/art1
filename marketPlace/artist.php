<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/market/marketmain.class.php');

$artistName = null;
$artistEnName = null;

$artist_idx = isset($_GET['idx']) ? $_GET['idx'] : null;

$back_page = isset($_GET['back_page']) ? (int)$_GET['back_page'] : null; ; //view page 에서 목록(뒤로)으로를 눌렀을때 처리를 위한 page 변수
$isto = isset($_GET['isto']) ? 'isto'.(int)$_GET['isto'] : null; ; //view page 에서 목록(뒤로)으로를 눌렀을때 해당 섹션으로 찾아가기 위한 변수

$at_tmp = 'artist'; //view page 에서 목록(뒤로)으로를 눌렀을때 해당 메뉴로 찾아가기 위한 변수

$Marketmain = new Marketmain();
$Marketmain->setAttr('artist_idx', $artist_idx);
$eachArtWorkTotalCount = $Marketmain->getEachArtWorkCount($dbh);
$selledArtWorkCount = $Marketmain->getSelledArtWorkCount($dbh);
$rentaledArtWorkCount = $Marketmain->getRentaledArtWorkCount($dbh);
$aArtistName = $Marketmain->getArtistName($dbh);
$Marketmain = null;
unset($Marketmain);

if (is_array($aArtistName) && count($aArtistName) > 0) {
	$artistName = $aArtistName['artist_name'];
	$artistEnName = $aArtistName['artist_en_name'];
}

$categoriName = 'MARKET';
$pageName = 'MARKET';
$pageNum = '3';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';
$ARTWORKSLISTCOUNT = '32';

include('../inc/config.php');
include('../inc/link.php');
include('../inc/top.php');
include('../inc/header.php');
include('../inc/spot_sub.php');
?>
<section id="container_sub">
    <div class="container_inner">
        <section id="artistInfo" class="content-mediaBox margin1">
            <header class="header">
                <h1><?php echo $artistName;?><span><?php echo $artistEnName;?></span></h1>
                <ul  class="total">
                  <li>총 등록 작품 수 : <span><?php echo $eachArtWorkTotalCount;?></span></li>
                  <li>판매된 작품 수 : <span><?php echo $selledArtWorkCount;?></span></li>
				          <!-- <li>렌탈 중인  작품 수 : <span><?php echo $rentaledArtWorkCount;?></span></li> -->
                </ul>
            </header>
            <article class="article">
                <div id="marketProductAjax"></div>
            </article>
        </section>
    </div><!-- //container_inner -->
</section><!-- //container_sub -->
<script src="/js/isotope.pkgd.min.js"></script>
<script src="/js/jquery.transform2d.js"></script>
<script>
        $(function(){
		  ajaxData();
          //scrollNewEvent()
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

		var page = 1;
		var totalCount = <?php echo $eachArtWorkTotalCount;?>;
		//var totalPage = Math.ceil(totalCount / <?php echo ARTWORKSLISTCOUNT;?>);
		var totalPage = Math.ceil(totalCount / <?php echo $ARTWORKSLISTCOUNT;?>);

		//뒤로가기를 위한 변수
		var back_page = '<?php echo $back_page;?>' ;
		var isto = '<?php echo $isto;?>' ; //뒤로가기 시 해당 섹션으로 찾아가기 위한 변수  $("#id")
		var at_tmp = '<?php echo $at_tmp;?>' ;
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
			//alert(top);
            var endHeight = $("#marketProductAjax").offset().top + $("#marketProductAjax").outerHeight() +150;
			//alert(endHeight);
            if(top > endHeight ){
			  if (totalPage >= page){
				  startScroll();
			  }
            }

            function startScroll(){
              if(!scrollNewsStartFlag){
                scrollNewsStartFlag = true;
                loadingStart($("#marketProductAjax").outerHeight());
				//$("#marketProductAjax").addClass('clearfix');
                 getItemElement();

              }//if

            }

         };//scrollNewEvent

        function ajaxData(num)
          {

             $.ajax({
                 type:"GET",
                 url:"ajax_artist.php",
                 ansync : false,
                 dataType:"html",
				 data:{"page":page, "idx":<?php echo $artist_idx;?>, "back_page":back_page, "at_tmp":at_tmp },
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

							   var  isto = "<?=$isto?>";
							   setTimeout(function(){
								  if(isto != ""){
									  var top = $("#"+isto).offset().top - 100;
									  $("body,html").scrollTop(top);
									}
								 },500)
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
				  page += 1;
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
			if (back_page != '' ){ //view 에서 목록으로 갔을때 처리 하기 위한 로직 (back_page 는 view page 에서 생성 처리한다.
				page = parseInt(back_page) + parseInt(page) -1 ;
				back_page = "";
			}

          $.ajax({
            type:"GET",
            url:"ajax_artist.php",
            dataType:"html",
		    data:{"page":page, "idx":<?php echo $artist_idx;?> , "at_tmp":at_tmp},
            success : function(data) {

              loadingImg.animate({
                    "opacity":0
                  },500,function(){
                    $(this).css("opacity",1).remove();
                      $("<div id='tmpData'></div>").html(data).appendTo($container);
                        var $data2 = $($container.find("#tmpData").html());
                        $container.append($data2);
                        $("#tmpData").remove();
                        $data2.imagesLoaded(function(){
                          $container
                          .isotope( 'appended',$data2)
                          .isotope('layout');
                          $data2.css({"opacity":0 , "margin-top":0}).animate({"opacity":1 , "margin-top":0},500);
                          page += 1;
                          scrollNewsStartFlag = false;
                        });


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
<?php
include '../inc/footer.php';
include '../inc/bot.php';
?>