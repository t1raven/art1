<!DOCTYPE html>
<html lang="ko">
<head>
<meta name="title" content="art1">
<meta name="author" content="art1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta property="fb:app_id" content="763051133779822" />
<meta property="og:site_name" content="아트1" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>" />
<meta property="og:title" content="<?php echo (!empty($ogTitle)) ? $ogTitle : ''; ?>" />
<meta property="og:description" content="<?php echo (!empty($ogDescription)) ? $ogDescription : '아트1은 아카이브 기반의 작가등록, 작품 판매, 미술뉴스, 갤러리 정보를 제공하는 새로운 아트플랫폼 입니다.'; ?>" />
<meta property="og:image" content="<?php echo (!empty($ogImage)) ? $ogImage : 'http://www.art1.com/images/header/logo_for_link.jpg?ver=20170511'; ?>" />
<link rel="image_src" href="<?php echo (!empty($ogImage)) ? $ogImage : 'http://www.art1.com/images/header/logo_for_link.jpg?ver=20170511'; ?>" />
<!--<meta name="naver-site-verification" content="d2dad7ab901a8d6d4da8b09189888679d9824714" />-->
<meta name="description" content="아트1은 아카이브 기반의 작가등록, 작품 판매, 미술뉴스, 갤러리 정보를 제공하는 새로운 아트플랫폼 입니다." />
<title>아트1</title>
<link rel="icon" href="http://www.art1.com/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://www.art1.com/favicon.ico" type="image/x-icon">
<?php if ($check_mobile === false) : ?>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?=$currentFolder?>/css/fonts.css" />
<?php endif ;  ?>
<link rel="stylesheet" href="<?=$currentFolder?>/css/default.css?ver1.21" />
<link rel="stylesheet" href="<?=$currentFolder?>/css/common.css" />
<link rel="stylesheet" href="<?=$currentFolder?>/css/hj.css" />
<?php if ($pageNum === "4") : ?>
<link rel="stylesheet" href="<?=$currentFolder?>/css/content_v2.css" />
<?php endif ; ?>
<link rel="stylesheet" href="<?=$currentFolder?>/css/content.css?ver1.22" />
<link rel="stylesheet" href="<?=$currentFolder?>/css/popup.css" />
<script src="<?=$currentFolder?>/js/idangerous.swiper.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=$currentFolder?>/js/jquery.easing.1.3.js"></script>
<script src="<?=$currentFolder?>/js/modernizr.custom.37565.js"></script>
<script src="<?=$currentFolder?>/js/jquery.bxslider.min.js"></script>
<script src="<?=$currentFolder?>/js/common.js"></script>
<script src="<?=$currentFolder?>/js/commonUI.js"></script>
<script src="<?=$currentFolder?>/js/fakeselect.js"></script>
<script src="<?=$currentFolder?>/js/jquery.touchSwipe.min.js"></script>
<script src="/js/facebook-login.js"></script>
<script src="/js/statistics.js"></script>
<script src="/js/iscroll.js"></script>
<script src="/js/iscroll5-ie8.js"></script>
<script src="/js/nprogress.js"></script>
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?=$currentFolder?>/css/ie.css" />
<script src="<?=$currentFolder?>/js/html5.js"></script>
<script src="<?=$currentFolder?>/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<dl class="accessibilityWrap">
  <dt class="blind"><strong> 바로가기  메뉴</strong></dt>
  <dd><a href="#container">컨텐츠바로가기</a></dd>
  <dd><a href="#lnb">주메뉴바로가기</a></dd>
  <dd><a href="#footer">하단메뉴바로가기</a></dd>
</dl>
<section id="tmpView">
</section>
<div id="wrap">
	<div id="img_for_other"><img src="/images/header/logo_for_link.jpg?ver=20170511" alt="외부링크용로고"></div>
    <div id="art1guide">
      <div class="inner">
          <!-- <p class="img"><a href="/homeguide/guide.php"><img src="/images/header/img_artguide.jpg" alt="모두를 위한 아트1 사용팁 go"></a></p> -->
          <p class="r_group">
            <button class="nextClose">7일간 <span class="space">보지않기</span></button>
            <button class="close">닫기</button>
          </p>
      </div>
    </div>

	<script type="text/javascript">
$(function(){
  //NProgress.start();
});
$( document ).ready(function() {
  NProgress.done();
  $('.fade').removeClass('out');
});
function fixedPopupClose2(ur){
  $("#header .header_inner .utill > ul > li").each(function(){
    $(this).find(">a").removeClass("on");
    if(!$(this).find(">a").hasClass("txt") ){
      $(this).find("img").imgConversion(false);
    }
  })//each
  var fixedPopArea = $("#fixedPopupArea");
  fixedPopArea.slideUp(0);
  $("#header").css({"top":""});
  $("#wrap").css({"top":""});
  fixedTopLayerFlag = false;
  fixedStateImg = "";
  $("#cover_white").remove();
}


  function marketViewMotion(t,o){
//con(event.type);
if(o == "shopping"){
   fixedPopupClose2();

};
    /*var $this = $(this);*/
/*    alert();*/
  $("#tmpView").children().remove();
   // marketViewOpen();

    $.ajax({
          type:"GET",
          //url:"ajax_marketView.php",
          url:"/marketPlace/__detail_view.php",
          dataType:"html",
          data:{"goods":goods},
          success : function(data) {
         $("#tmpView").html(data);

          /*  var $data2 = data;
              $this.addClass('viewOn').find(".newsBox_inner").css("display","none").end().append(boxView);
              $this.find(".boxView").append($data2);
              // $this.find(".boxView").find("#marketView1").css("display","none");
              $this.find(".boxView").imagesLoaded(function(){
               $this.find(".boxView").css("display","block");
               $container.isotope('layout');
                 setTimeout(function(){
                  var offset = $container.find(".viewOn").offset().top - ($("#header").outerHeight() + 5);

                  $('html,body').animate({scrollTop:offset}, 600);
                },600);*/
             //});//imagesLoaded
             // $("#tmpView").imagesLoaded(function(){
             //     marketViewOpen();
             // });//imagesLoaded

          },error : function(xhr, status, error) {
            alert(error);
           }
      })


     event.preventDefault();

  }






		$(function(){
              <? if($check_mobile === false){ ?>
                  $.srSmoothscroll({step: 100,speed: 400,ease: 'swing'});
              <?}?>

				if(Modernizr.opacity){

				}

		})
                var mobileKeyWords = new Array('iPhone', 'IPad', 'iPod', 'BlackBerry', 'Android', 'Windows CE', 'LG', 'MOT', 'SAMSUNG', 'SonyEricsson');
                var fixedTopLayerFlag = false;
                var fixedStateImg = false;
                var fixedClose = false;
                var layerOpenIntaval;
                  //alert(navigator.userAgent);
                //상단 레이어
                //


                function fixedLayerPopup(t,m,ty){
                  var $this = $(t);
                  var locationType = ty;
                  var winsize = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

                   if(winsize <= 960){
                         $(location).attr('href',$this.attr("href"));
                          return;
                    }
                   if(m){
                      for (var word in mobileKeyWords){
                        if (typeof mobileKeyWords[word] === 'string' && navigator.userAgent.match(mobileKeyWords[word])){
                             //mobile
                               $(location).attr('href',$this.attr("href"));
                             return;
                             break;

                        }//if
                      }//for

                  }//if



                  if(fixedStateImg){
                    fixedStateImg.removeClass("on");

                    if(fixedStateImg.data("ajaxdata") == $this.data("ajaxdata")){
                      fixedClose = true;
                      fixedPopupClose();
                    }
                  }

                   if(!fixedClose){
                     $("#header .header_inner .utill > ul > li").each(function(){
                      if(!$(this).find(">a").hasClass("txt") ){
                        $(this).find("img").imgConversion(false);
                      }
                    })//each
                    $this.addClass("on")
                     if(!$this.hasClass("txt")){
                      $this.find("img").imgConversion(true);
                     }

                    fixedStateImg = $this;

                    var win = $(window);
                    var winTop = win.scrollTop();
                    var winSize = win.width();
                    var adata = $this.data("ajaxdata");
                    // alert(adata.indexOf("shopping"));
                    if(fixedTopLayerFlag){
                      fixedPopupOpen(adata,m);
                    }else{
                      fixedPopupOpen(adata,m);
                    }//if
                  }//if
                  fixedClose = false;

                }//fixedLayerPopup

                function openType1(ar,h){
                  $("#header").stop().animate({"top":h-4},500);
                  $("#wrap").stop().animate({"top":h-4},500);
                  ar.css({
                    "top":"",
                    "height":"",
                    "display":"none"

                  });
                  ar.slideDown(400);
                  fixedTopLayerFlag = true;



                  if($(".quickSearchBox").length > 0){

                  $(".searchBar").find(".btn_search").click(function(){
                      if ($(".smartTableBox").css("display") == "none")
                      {
                        $(this).addClass("on")
                        $(".smartTableBox").slideDown();
                      }else{
                        $(".smartTableBox").slideUp();
                        $(this).removeClass("on")
                      }
                    });

                     $(".layerOpen").click(function(){
                          $(".layer_popup1").css("display","none");
                          var id = $(this).attr("href");
                          var x = $(this).offset().left;
                          var y = $(this).offset().top-10;
                          layerBoxOffset(id,x,y);
                          return false;
                      });

                     // and / or 스위치 함수
                      $("button.btn_switch").click(function(){
                          var text = $(this).text();
                          $(this).text((text == "AND") ? "OR":"AND");
                      });


                      checkListMotion();
                      bbsCheckbox();
                      LabelHidden(".inp_txt.lh");

                  }//if::quickSearchBox
                }//openType1

                function openType2(ar,h){
                  $("#header").stop().animate({"top":""},400);
                  $("#wrap").stop().animate({"top":""},400);
                  ar.css({"top":$("#header").outerHeight()}).slideDown(400);
                  fixedTopLayerFlag = true;

                }





                function fixedPopupOpen(ur,m){
                  var fixedPopArea = $("#fixedPopupArea");
                  var height = 0;
                  var backgound = $("<div>").attr({
                       "id": "cover_white"
                     }).css({
                       "height": $("#wrap").outerHeight(),
                       "z-index": 110,
                       "display":"block",
                       "opacity":0
                     });



                    $("body").append(backgound);
                    backgound.stop().animate({"opacity":1},300).on("click",function(){
                      fixedPopupClose();
                      backgound.off("click");
                      $(window).off("resize");

                    });


                     $(window).on("resize",function(){
                     	var winsize = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
                   		if(winsize <= 960){
                   			fixedPopupClose();
	                        backgound.off("click");
	                        $(window).off("resize");
                        };
                     });









                    $.ajax({
                          url : ur,
                          type : "get",
                          ansync : false,
                          dataType:"html",
                          success : function(data) {
                              topBannerStartClose();
                              fixedPopArea.children().remove();
                              $("<div id='tmpData'></div>").html(data).appendTo(fixedPopArea);
                               var data2 = fixedPopArea.find("#tmpData").html();
                               $("#tmpData").remove();
                              fixedPopArea.append(data2).imagesLoaded(function(){;
                                  height = fixedPopArea.outerHeight();
                                  fixedPopArea.css({
                                  "display":"block",
                                  "height":0
                                });
                                 if(ur.indexOf("shopping") > 0){

                                var shopping_owl = $("#headerArea #shoppingArea .shopping_list .inner ul");
                                    shopping_owl.owlCarousel({
                                          items : 4
                                          // itemsDesktop : [1199,3],
                                          // itemsDesktopSmall : [979,3]
                                    });

                                    $("#shoppingArea .shopping_list > button.next").off().on("click",function(){
                                      shopping_owl.trigger('owl.next');
                                    })
                                    $("#shoppingArea .shopping_list > button.prev").off().on("click",function(){
                                      shopping_owl.trigger('owl.prev');
                                    })


                                  }
                                  if(m){
                                      openType1(fixedPopArea,height);
                                    }else{
                                      openType2(fixedPopArea,height);
                                    }
                              });
                          },
                          error : function(xhr, status, error) {
                            alert("데이타 오류");
                          }
                         });







                  }

                  function removeLayerPopup(){


                  };

                  function fixedPopupClose(ur){
                    $("#header .header_inner .utill > ul > li").each(function(){
                      $(this).find(">a").removeClass("on");
                      if(!$(this).find(">a").hasClass("txt") ){
                        $(this).find("img").imgConversion(false);
                      }
                    })//each
                    var fixedPopArea = $("#fixedPopupArea");

                	//alert();
                    fixedPopArea.slideUp(400);
                    $("#header").stop().animate({"top":""},400);
                    $("#wrap").stop().animate({"top":""},400);
                    fixedTopLayerFlag = false;
                    fixedStateImg = "";
                    $("#cover_white").remove();
                  }



	</script>

 <div id="fixedPopupArea" style="display: none"></div>
