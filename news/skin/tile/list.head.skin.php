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
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
		<? include "./inc_tap_menu.php"; ?> 

			<? include "./inc_search_form.php"; ?> 

       <script src="/js/isotope.pkgd.min.js"></script>
       <section id="newWrapper">
     
        </section>
        <!-- <div class="btn_bot cen">
            <button class="more-ajax2" onclick="nextPage();" id="nextMore" style="display:none"><img src="/images/btn/btn_ajaxmore.jpg" alt="더보기"></button>        
        </div> -->

<?
$back_page = isset($_GET['back_page']) ? (int)$_GET['back_page'] : null; ; //view page 에서 목록(뒤로)으로를 눌렀을때 처리를 위한 page 변수 
$isto = isset($_GET['isto']) ? 'isto'.(int)$_GET['isto'] : null; ; //view page 에서 목록(뒤로)으로를 눌렀을때 해당 섹션으로 찾아가기 위한 변수
$at_tmp = isset($_GET['at']) ? $_GET['at'] : null; //view page 에서 목록(뒤로)으로를 눌렀을때 해당 메뉴로 찾아가기 위한 변수

?>


<script>
var news_skin_type = "<?php echo $news_skin_type?>";
var news_category_name = "<?php echo $news_category_name?>";
var cate = "<?php echo $cate?>";
var page = 1;

var back_page = '<?php echo $back_page;?>' ;
var isto = '<?php echo $isto;?>' ; //뒤로가기 시 해당 섹션으로 찾아가기 위한 변수  $("#id") 
var at_tmp = '<?php echo $at_tmp;?>' ;
var word ='<?php echo $word?>';


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

 function nextPage(){
	lastPaga = $(".pagecount").last().data("pagecount");
	console.log("lastPaga :"+lastPaga);
	if(lastPaga <= 1){ //ajax로 한번당 불러오는 갯수보다 작아야 한다.
		// $("#nextMore").css("display","none");
		$(".newsBox.bt_vewmore").css("visibility","hidden");
	}else{
		loadingStart($("#newWrapper").outerHeight());
		getItemElement(); 
	}
 }


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

		lastPaga = $(".pagecount").last().data("pagecount");

		nextPage(); //2016-04-27 업체 요청에 의해 무한스크롤 처리 LYT
		
		/*
		if (page >= 4 ){
			// $("#nextMore").css("display","");

			<?php if ( $check_mobile == true ){?>
				$(".newsBox.bt_vewmore .newsBox_inner > a").css("height","280");
			<?php }?>			
			$(".newsBox.bt_vewmore").css("visibility","visible");
			$(".newsBox.bt_vewmore").animate({opacity:1},300);
		}

		if (page <= 3 ){
			nextPage();
		}
		*/


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
           //최초로 불러온다.
		   $.ajax({
               //type:"GET",
			  
			   
			   type:"GET",
               //url:"ajax-bbs1.php",
				url:"__list.php",
			   data:{"page":page,"news_skin_type":news_skin_type,"news_category_name":news_category_name,"cate":cate,"back_page":back_page, "at_tmp":at_tmp,"word":word},
               ansync : false,
               dataType:"html",
               success : function(data) {
                
                    var $container2;
                    $container.children().remove();
                      $("<div id='tmpData'></div>").html(data).appendTo($container);
                      var count = $container.find("#tmpData .newsBox").length;
                      for(var j = 0 ; j < count ; j++ ){
                      	$container.find("#tmpData .newsBox").attr("data-type","content01");
                      }
                      var data2 = $container.find("#tmpData").html();
                      $container.append(data2);
                      $("#tmpData").remove();

                    var htmlString = "";
                    htmlString +="<section class='newsBox bt_vewmore'  data-type='viewmore' style='visibility:hidden;opacity:0;'>";
					htmlString +="	<div class='newsBox_inner'>";
					htmlString +="		<a href='javascript:;' onclick='nextPage();' onmouseover='childImgsOn(this);' onmouseleave='childImgsOff(this);' ><span class='h100'></span><span><img src='/images/market/bg_plus_off.png'/><br/>더보기</span></a>";
					htmlString +="	</div>";
					htmlString +="</section>";
                    $container.append(htmlString);
                      var imgLoad = imagesLoaded( $container );

                      function onAlways( instance ) {
                        $container.find("img").fadeIn( 2000);
                            $container.isotope({
                            	getSortData: {
								    type: '[data-type]',
								},
					         	    sortBy : ['type'],
                             	itemSelector: '.newsBox',
                            });
                      };
                      imgLoad.on( 'always', onAlways );

					  page++;

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
        //최초 이후 페이징 되면서 불러온다.
		if (back_page != '' ){ //view 에서 목록으로 갔을때 처리 하기 위한 로직 (back_page 는 view_page 에서 생성 처리한다. 
			page = parseInt(back_page) + parseInt(page) -1 ;
			back_page = "";
		}

		$.ajax({
          type:"GET",
          //url:"ajax-bbs1.php",
		  url:"__list.php",
		  data:{"page":page,"news_skin_type":news_skin_type,"news_category_name":news_category_name,"cate":cate, "at_tmp":at_tmp,"word":word},
          dataType:"html",
          success : function(data) {

			  //alert(data);
            
            loadingImg.animate({
                  "opacity":0
                },500,function(){
                  $(this).css("opacity",1).remove();
                    $("<div id='tmpData'></div>").html(data).appendTo($container);
                      var count = $container.find("#tmpData .newsBox").length;
                      var page2; 
                      (page < 10 ? page2 = '0'+page : page2 = page);
                      for(var j = 0 ; j < count ; j++ ){
                      	$container.find("#tmpData .newsBox").attr("data-type","content"+page2);
                      }
                      var $data2 = $($container.find("#tmpData").html());
                     
                      


					//////////
					 var imgLoad = imagesLoaded( $container );
                      function onAlways( instance ) {
                      	 $container.isotope( 'insert',$data2).isotope('layout');
                      	 $("#tmpData").remove();
                      };
                      imgLoad.on( 'always', onAlways );
					//////////


                      //$container.isotope( 'insert',$data2).isotope('layout');
                      //$data2.css({"opacity":0 , "margin-top":0}).animate({"opacity":1 , "margin-top":0},500);
					  //$data2.css({"opacity":0 , "margin-top":100}).animate({"opacity":1 , "margin-top":0},500);


                      scrollNewsStartFlag = false;
					  

                })//loading

				page++;
              
          },
           complete : function(data) {

           },error : function(xhr, status, error) {
            alert(error);
            $container.children().remove();
            $('<p class="noProduct">뉴스가 존재하지 않습니다.</p>').appendTo($container);
           }
      })
  }//getItemElement

</script>
     
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>