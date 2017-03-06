<? include "../inc/config.php"; ?>
<?php
  $categoriName = "NEWS";
  $pageName = "NEWS";
  $pageNum = "2";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";

  include(ROOT.'inc/config.php');
  include(ROOT.'inc/link.php');
  include(ROOT.'inc/top.php');
  include(ROOT.'inc/header.php');
  include(ROOT.'inc/spot_sub.php');
?>
  <section id="container_sub">
    <div class="container_inner">
<?php
  include(ROOT.'inc/path.php');
?>

<div class="tabBox">
  <!-- <h3 class="h_tab"><button style="border-top:1px solid #ddd;">In brief</button></h3> -->
  <ul>
    <li class=""><a href="/news/?at=list&amp;subm=2">In brief</a></li>
    <li class=""><a href="/news/?at=list&amp;subm=3">Trend</a></li>
    <li class=""><a href="/news/?at=list&amp;subm=4">People</a></li>
    <li class=""><a href="/news/?at=list&amp;subm=14">World</a></li>
    <li class=""><a href="/news/?at=list&amp;subm=5">Trouble</a></li>
    <li class=""><a href="/news/?at=list&amp;subm=6">Episode</a></li>
    <li class=""><a href="/news/?at=list&amp;subm=15">Card News</a></li>
    <li class="on"><a href="/news/?at=list&amp;subm=16">Post</a></li>
    <li class=""><a href="/bbs/?at=list">Community</a></li>
  </ul>
</div>

<?php
  include(ROOT.'news/inc_search_form.php');
?>
<link rel="stylesheet" type="text/css" href="/css/owen.css">

<section id="bbsType6">
  <div class="inner">
    <ul class="clearfix">
      <li><a class="img" href="javascript:void(0);" onclick="getCardView();"><img src="/news/skin/cardnews/images/thum/thum01.jpg" /></a></li>
      <li><a class="img" href="javascript:void(0);" onclick="getCardView();"><img src="/news/skin/cardnews/images/thum/thum02.jpg" /></a></li>
      <li><a class="img" href="javascript:void(0);" onclick="getCardView();"><img src="/news/skin/cardnews/images/thum/thum03.jpg" /></a></li>
      <li><a class="img" href="javascript:void(0);" onclick="getCardView();"><img src="/news/skin/cardnews/images/thum/thum04.jpg" /></a></li>
      <li><a class="img" href="javascript:void(0);" onclick="getCardView();"><img src="/news/skin/cardnews/images/thum/thum05.jpg" /></a></li>
      <li><a class="img" href="javascript:void(0);" onclick="getCardView();"><img src="/news/skin/cardnews/images/thum/thum06.jpg" /></a></li>
      <li><a class="img" href="javascript:void(0);" onclick="getCardView();"><img src="/news/skin/cardnews/images/thum/thum07.jpg" /></a></li>
      <li><a class="img" href="javascript:void(0);" onclick="getCardView();"><img src="/news/skin/cardnews/images/thum/thum08.jpg" /></a></li>
      <li><a class="img" href="javascript:void(0);" onclick="getCardView();"><img src="/news/skin/cardnews/images/thum/thum09.jpg" /></a></li>
      <li><a class="img" href="javascript:void(0);" onclick="getCardView();"><img src="/news/skin/cardnews/images/thum/thum10.jpg" /></a></li>
      <li><a class="img" href="javascript:void(0);" onclick="getCardView();"><img src="/news/skin/cardnews/images/thum/thum11.jpg" /></a></li>
      <li><a class="img" href="javascript:void(0);" onclick="getCardView();"><img src="/news/skin/cardnews/images/thum/thum12.jpg" /></a></li>
    </ul>
  </div>
</section>

<script src="/js/jquery.dotdotdot.min.js"></script>
<script>

$.fn.extend({
    ensureLoad: function(handler) {
        return this.each(function() {
            if(this.complete) {
                handler.call(this);
            } else {
                $(this).load(handler);
            }
        });
    }
});

$(function(){
  resizing2(4);
  $(window).resize(function(){
    resizing2(4);
    var CardBoxH = Math.max($(window).scrollTop()+($(window).height()/2)-($("#cardnewsView .view_box").height()/2),30);
    $("#cardnewsView .view_box").css("margin-top",CardBoxH);
  })
});


function getCardView(){
  $("#loadgin_img").fadeIn();
  $.ajax({
    type:"GET",
    url:"/news/skin/cardnews/card_view.php",
    dataType:"html",
    success : function(data) {
      $("#cardnewsView").html(data);
      var imgArr = new Array;
      var imgEle = $("#cardnewsView .img_box img");
      var imgLoad = 0;
      if(imgEle.length ==0){
        openCardView();
      }else{
        for(var i = 0 ; i < imgEle.length ; i++){
          imgArr[i] = $("#cardnewsView .img_box img:eq("+i+")");
        }
        for(var j = 0 ; j < imgEle.length ; j++){
          imgArr[j].ensureLoad(function(){
            imgLoad++;
            if(imgLoad == imgEle.length){
              openCardView();
            }
          });
        }
      }
    },error : function(xhr, status, error) {
      alert(error);
    }
  });

  function openCardView(){
    var CardBox = $("#cardnewsView .img_box");
    CardBox.find(">li:eq(0)").siblings().css({"left":"100%"}).removeClass("show").end().css({"left":"0px"}).addClass("show");
    $("#cardnewsView .con_box > ul >li.img_list > span").text(CardBox.find("li.show").index()+1);
    $("#cardnewsView > .inner").fadeIn(200);
    var CardBoxH = Math.max($(window).scrollTop()+($(window).height()/2)-($("#cardnewsView .view_box").height()/2),30);
    $("#cardnewsView .view_box").css("margin-top",CardBoxH);
  }
}//getCardView

function getCardView2(){
  var CardBox = $("#cardnewsView .img_box");
  CardBox.find(">li:eq(0)").siblings().css({"left":"100%"}).removeClass("show").end().css({"left":"0px"}).addClass("show");
  $("#cardnewsView .con_box > ul >li.img_list > span").text(CardBox.find("li.show").index()+1);
  $("#cardnewsView > .inner").fadeIn(200);
  var CardBoxH = Math.max($(window).scrollTop()+($(window).height()/2)-($("#cardnewsView .view_box").height()/2),30);
  $("#cardnewsView .view_box").css("margin-top",CardBoxH);
}

function closeCardView(){
  $("#cardnewsView > .inner").fadeOut(300);
}

/*function resizing2(){
  var vw2 = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
  var wcnt ;
  if(vw2 >= 959){wcnt = 3;
  }else if(vw2 >= 480){wcnt = 2;
  }else{wcnt = 1;
  }

  var itemLen = $("#bbsType6 .inner > ul > li").length;
  $("#bbsType6 .inner").removeClass("w1 w2 w3").addClass("w"+wcnt);
  $("#bbsType6 .inner > ul > li").removeClass("ml0");
  for(var i = 0 ; i < itemLen/wcnt ; i++){
    $("#bbsType6 .inner > ul > li:eq("+(i*wcnt)+")").addClass("ml0");
  }
}*/

function slideCardImg(dire){
  var term = 450;
  var easi = "easeInOutQuint";
  var myobj = $("#cardnewsView .img_box > li.show");
  var slides = $("#cardnewsView .img_box > li");
  var slide_len = slides.length;
  var next_idx = $("#cardnewsView .img_box > li:eq("+((slide_len+myobj.index()+dire)%slide_len)+")");


  if(dire == 1){
    next_idx.css({"left":"100%"});
    myobj.stop().animate({left:"-100%"},term, easi);
  }else{
    next_idx.css({"left":"-100%"});
    myobj.stop().animate({left:"100%"},term, easi);
  }
  next_idx.stop().animate({left:"0px"},term, easi);
  next_idx.siblings().removeClass('show').end().addClass('show');
  $("#cardnewsView .con_box > ul >li.img_list > span").text(next_idx.index()+1);
}

</script>

<div class="paginate">
  <a href="" class="num on">1</a>
  <a href="" class="num">2</a>
  <a href="" class="num">3</a>
  <a href="" class="num">4</a>
  <a href="" class="num">5</a>
  <a href="" class="num">6</a>
  <a href="" class="num">7</a>
  <a href="" class="num">8</a>
  <a href="" class="num">9</a>
  <a href="" class="num">10</a>
  <a href="" class="btn next2">다음10페이지</a>
  <a href="" class="btn next">끝</a>
</div>
      <?=$pageUtil->attr[pageHtml]?>


    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <section id="cardnewsView"></section>
<?php
include_once(ROOT.'inc/footer.php');
include_once(ROOT.'inc/bot.php');
?>





