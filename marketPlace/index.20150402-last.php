<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/market/event.class.php');
require(ROOT.'lib/class/market/marketmain.class.php');
require(ROOT.'lib/class/market/goods.class.php');
include(ROOT.'inc/config.php');

$z = 0;
$i = 1;
$categoriName = 'MARKET';
$pageName = 'MARKET';
$pageNum = '3';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';
$_SESSION['rdmNbr'] = null;

$back_page = isset($_GET['back_page']) ? (int)$_GET['back_page'] : 1;  //view page 에서 목록으로를 눌렀을때 처리를 위한 변수
$isto = isset($_GET['isto']) ? 'isto'.(int)$_GET['isto'] : null; ; //view page 에서 목록(뒤로)으로를 눌렀을때 해당 섹션으로 찾아가기 위한 변수

$Marketmain = new Marketmain();
$mainBannerListRolling = $Marketmain->getMainBannerListRolling($dbh);
$genreBannerList = $Marketmain->getGenreBannerList($dbh);
$artWorkTotalCount = $Marketmain->getArtWorkCount($dbh);

//print_r($mainBannerListRolling);

include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>

<script>
$(window).load(function(){




})






</script>


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

          /*
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
*/

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



<!--//로그인 레이어팝업 S -->
<?php
require $_SERVER['DOCUMENT_ROOT'].'google_login_oauth/inc_google_login_check.php'; //구글 로그인 처리
?>
<script>
function googleOpen(url){
	if($("#returnUrl<?php echo $ajax_state;?>").val() != '/'){
		$("#returnUrl<?php echo $ajax_state;?>").val(document.location.href) ;
	}
	window.open(url, 'googleLogin', ',width=500,height=450');
}
</script>
<!-- script src="/js/facebook-login.js"></script -->
<script src="/js/cookie.js"></script>
<script src="/js/jquery.stellar.min.js"></script>

<section id="layerNewletter" >
	<input type="hidden" name="mode" id="mode" value="join">
	<input type="hidden" name="returnUrl" id="returnUrl" value="/">
    <header class="header">
        <p>회원가입을 하시면 더 많은 혜택을<br>  누리실 수 있습니다.</p>
        <h1>JOIN US</h1>
        <button class="close"><img src="/images/btn/btn_close.png" alt="닫기"></button>
    </header>
    <article class="cont">
      <div class="join">
        <div class="btnColor facebook">
          <a href="javascript:facebookLogin('join');"><span><img src="/images/ico/ico_face_mo.gif" alt="페이스북">&nbsp;facebook으로 회원가입</span></a>
        </div>
        <div class="btnColor google">
          <a href="javascript:googleOpen('<?php echo $authUrl?>');"><span><img src="/images/ico/ico_google_mo.gif" alt="구글">&nbsp;</span>Google+으로 회원가입</a>
        </div>
        <div class="btnColor line"><a href="/member/join/?at=write">회원가입</a></div>
        <p class="log">이미 가입하셨다면, <a href="/member/login.php">로그인하기</a></p>
        <!-- <p class="tams"><a href="/service/terms.php">이용약관</a>과 <a href="/service/policy.php">개인정보취급방침</a>에 동의합니다.</p> -->
      </div>
      <div class="email">
	    <form onSubmit="return newsletterSend()" >
          <label for="newLetterEmail" class="h">뉴스레터를 받으실 이메일주소를 남겨주세요. <br>매주 art1의 뉴스레터를 보내드립니다.</label>
          <input type="text" class="inp_eamil" id="newLetterEmail" >
          <div class="agree">
            <p>
              <input type="checkbox" id="newLetterEmail2" value="Y">
              <label for="newLetterEmail2">개인정보 제공에 동의합니다.</label>
            </p>
          </div>
	   </form>
      </div>
    </article>
    <div class="btn_bot">
      <!-- button onclick="newsletterSend()">SEND</button -->
	  <button onclick="newsletterSend();">뉴스레터 신청하기</button>

    </div>
    <footer class="footer">
        <input type="checkbox" id="a_week" value="Y" onClick="weekPopClose();">
        <label for="a_week">일주일동안 보지않기</label>
        <button class="close"> |  닫기</button>
    </footer>
</section>

<script>
$(function(){
	<?php
	if ($_SESSION['user_idx']){
	?>
			loginPopClose();
	<?
	}
	?>
	/*
	if (getCookie("cookLoginPopClose") == "true")	{  //일주일간 안 열리도록...
		loginPopClose();
	}
	*/
});

function loginPopClose(){
	//console.log("loginPopClose 실행");
	$("#layerNewletter").css("display","none");
	$("#cover").remove();
}

function weekPopClose(){ //일주일간 열지 않기
	//alert($("input:checkbox[id='a_week']").is(":checked"));
	if ( $("input:checkbox[id='a_week']").is(":checked") == true){
		setCookie("cookLoginPopClose",true, 7);
	}
}

function newsletterSend(){
	var email = $("#newLetterEmail").val();
	if ($('input:checkbox[id="newLetterEmail2"]').is(":checked") == false ){
		alert("개인정보 제공에 동의 하셔야 합니다.");
		$("#newLetterEmail2").focus();
		return false;
	}

	$.ajax({
		type:"POST",
		url:"/member/__newsletter_insert.php",
		data:{"email":email},
		dataType:"JSON",
		success: function(data) {
			//alert(data.cnt);
			if (data.cnt == 1) {
				alert("이메일이 등록 되었습니다.");
				loginPopClose();
				return false;

			} else if (data.cnt == 91) {
				alert("이메일 주소를 입력해 주세요.");
				return false;
			} else if (data.cnt == 92) {
				alert("이메일 형식이 맞지 않습니다..");
				return false;
			} else if (data.cnt == 93) {
				alert("이미 등록된 이메일 입니다.");
				return false;
			}else{
				alert("데이터 변경에 실패하였습니다.");
				return false;
				//location.reload();
			}

		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			return false;
		}
	});
	return false; //새로고침 방지

}


//뉴스레터
function newsletter(){
  var obj = $("#layerNewletter");
  var wrap = $("#wrap");
  var WinHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
  var ml= -(obj.outerWidth() / 2) ;
  var mt = WinHeight - obj.outerHeight();
  if( mt > 0){
    mt = mt / 2
  }else{
    mt = 10
  }

  if(WinHeight < obj.outerHeight() ){
    $("#layerNewletter").css({"position":"absolute"});
	wrap.css({
		"overflow":"hidden",
		"height":obj.outerHeight() + 50
	})//css
  }else{
	wrap.css({
		"overflow":"hidden",
		"height":WinHeight
	})//css

}

  $("#layerNewletter").css({
  "display":"block",
  "left":"50%",
  "top":mt,
  "margin-left":ml
  });

  var backgound = $("<div>").attr({
     "id": "cover"
   }).css({
     "height": $("#wrap").outerHeight(true),
     "z-index":11,
     "cursor":"pointer"
   })
  $("body").append(backgound);

  $("#layerNewletter .close , #cover").off().on("click",function(){
	  wrap.css({
		"overflow":"",
		"height":""
	})//css
    $("#layerNewletter").css("display","none");
    $("#cover").remove();
    //document.getElementById('movA1').play();
  });

}//newsletter

$(function(){

  <?php
	//if (! isset($_SESSION['user_idx']) ){ //회원로그인이 되어 있지 않으면 팝업 활성
	if (! isset($_SESSION['user_idx']) &&  !isset($isto)  ){ // 로그인 되어 있지 않고 뒤로가기로 넘어오지 않았으면  팝업 활성

	?>
		if (getCookie("cookLoginPopClose") != "true")	{  //일주일간 안 열리도록...
			newsletter();
		}
  //	newsletter();
	<?php  } ?>
//  awardClock();
//  lstMovMotion("#sect1 .lst_mov > .lst > li");

})

</script>


<!--//로그인 레이어팝업 E-->







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
                    <li><button type="button" onclick="shareFaceBook();"><img src="/images/btn/btn_share1_off.png" alt="페이스북"></button></li>
                    <li><button type="button" onclick="sharePinterest();"><img src="/images/btn/btn_share2_off.png" alt="핀터레스트"></button></li>
                    <!--li><button><img src="/images/btn/btn_share3_off.png" alt="인스타그램"></button></li>
                    <li><button><img src="/images/btn/btn_share4_off.png" alt="픽터파이"></button></li-->
                    <li><button type="button" onclick="shareGooglePlus();"><img src="/images/btn/btn_share5_off.png" alt="구글플러스"></button></li>
                  </ul>
                </dd>
            </dl>
          </header>
          <article class="marketVisualArticle">
              <div class="dmp-controls">
                <div class="pageing">
                   <button class="prev"><img src="/images/btn/btn_prev_op.png" alt="이전"></button>
                   <button class="next"><img src="/images/btn/btn_next_op.png" alt="다음"></button>
                 </div>
               </div>
              <div class="list">
              <!--
                  마켓 분기처리 작업 dmp:150323
                 <ul>
                 <?php foreach($mainBannerListRolling as $val): ?>
                 <?php
					 if ($val['mmb_gubun'] === 'A') {
						$sHref = 'artwork_view.php?goods='.$val['goods_idx'];
					}
					else{
					   if ($val['evt_idx'] === '10' ||$val['evt_idx'] === '12') {
						   $sHref = '/art1/promotion.php';
					   }
					   else {
							$sHref = 'exhibitions.php?evt='.$val['evt_idx'];
					   }
					}
				?>
                     <li>
                       <div class="photo"><a href="<?php echo $sHref; ?>"><img src="<?php echo marketMainUploadPath, $val['mmb_img_rename']; ?>" alt=""></a></div>
                     </li>
                 <?php endforeach; ?>
                 </ul>

                 -->

                 <ul>
                   <li class="on">
                       <div class="photo">
                            <a href="exhibitions.php?evt=13">
                                <img src="/images/tmp/img_april.jpg" alt="" class="pc" >
                                <img src="/images/tmp/img_april_1.jpg" alt="" class="mobile" >
                            </a>
                        </div>
                     </li>
                   <li>
                       <div class="photo">
                            <a href="exhibitions.php?evt=14">
                                <img src="/images/tmp/img_jo.jpg" alt="" class="pc" >
                                <img src="/images/tmp/img_jo_1.jpg" alt="" class="mobile" >
                            </a>
                        </div>
                     </li>
                     <li>
                       <div class="photo">
                            <a href="/art1/promotion.php">
                              <img src="/upload/market/main/1426582698R3KF7ND8PN.jpg" alt="" class="pc">
                              <img src="/images/tmp/tmp_marketPromotion_1.jpg" alt="" class="mobile">
                            </a>
                       </div>
                    </li>
                </ul>

              </div><!--//list -->

              <div class="cont">
                 <ul>
                 <?php foreach($mainBannerListRolling as $val): ?>
                     <li>
                       <div class="spec">
					   <?php
							if ($val['mmb_gubun'] === 'A') {
								$goodsSize = '';
								$artWorkInfo = $Marketmain->getMainBannerListRollingArtWork($dbh, $val['goods_idx']);

								if (!empty($artWorkInfo['goods_width'])) {
									$goodsSize .= $artWorkInfo['goods_width'];
								}

								if (!empty($artWorkInfo['goods_depth'])) {
									$goodsSize .= 'x'.$artWorkInfo['goods_depth'];
								}

								if (!empty($artWorkInfo['goods_height'])) {
									if ((int)$artWorkInfo['goods_height'] > 0) {
										$goodsSize .= 'x'.$artWorkInfo['goods_height'].'cm';
									}
									else {
										$goodsSize .= 'cm';
									}
								}
								else {
									$goodsSize .= 'cm';
								}
					   ?>
                          <h3><?php echo $artWorkInfo['goods_name']; ?><strong><?php echo $artWorkInfo['artist_name']; ?></strong></h3>
                          <p class="t1"><?php echo $artWorkInfo['goods_material']; ?></p>
                          <p><?php echo $goodsSize; ?></p>
                          <p><?php echo $artWorkInfo['goods_make_year']; ?></p>
                          <a href="artwork_view.php?goods=<?php echo $artWorkInfo['goods_idx']; ?>" class="btn">View Detail &gt; </a>
					   <?php
							}
							else{
								$eventInfo = $Marketmain->getMainBannerListRollingEvent($dbh, $val['evt_idx']);
						?>
                          <h3><?php echo $eventInfo['evt_title']; ?></h3>
                          <p class="t1"><?php echo $eventInfo['evt_copyright']; ?></p>
                          <!--p>100x58cm</p>
                          <p>2011</p-->
                          <a href="exhibitions.php.?evt=<?php echo $artWorkInfo['evt_idx']; ?>" class="btn">View Detail &gt; </a>
					   <?php } ?>
                       </div>
                     </li>
                 <?php endforeach; ?>
                 </ul>
              </div><!--//list -->
              <img src="/images/tmp/tmp_market_1.jpg" alt="" class="boxsize">
           </article><!-- //marketVisualArticle -->
        </section><!-- //marketVisual -->

       <section class="categori content-mediaBox margin1">
         <div class="list">
             <ul>
             <?php foreach($genreBannerList as $genre):?>
               <li class="n<?php echo $i; ?>">
                 <div class="photo"><img src="<?php echo marketGenreUploadPath, $genre['goods_img_rename']; ?>" alt=""></div>
                 <div class="spec">
                    <h3><?php echo $aMedium_new[$z]; ?></h3>
                    <a href="#categoriList" data-filter=".<?php echo $aEngMedium_new[$z]; ?>" class="btn">View Detail &gt; </a>
                 </div>
               </li>
               <?php ++$i; ++$z; endforeach; ?>
              </ul>
          </div><!--//list -->
       </section><!-- //categori -->

       <div id="categoriList" class="tabBox">
            <h3 class="h_tab"><button>전체</button></h3>
          <ul style="display: block;">
                <li class="on"><a href="#categoriList" data-filter="*">전체</a></li>
                <?php $i = 0; foreach($aEngMedium as $val): ?>
                <li><a href="#categoriList" data-filter=".<?php echo $val;?>"><?php echo $aMedium[$i];?></a></li>
                <?php ++$i; endforeach; ?>
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
                                <?php $j = 0; $i = 1; foreach($aSubject as $val): ?>
                                <li class="n<?php echo $i;?>"><button data-filter=".<?php echo $aEngSubject[$j];?>"><?php echo $val;?></button></li>
                                <?php ++$j; ++$i; endforeach; ?>
                              </ul>
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl class="sort_box">
                            <dt><button><span>모든사이즈</span></button></dt>
                            <dd>
                              <ul>
                                <li class="n0"><button data-filter="*">전체</button></li>
                                <?php $j = 0; $i = 1; foreach($aSize as $val): ?>
                                <li class="n<?php echo $i;?>"><button data-filter=".<?php echo $aEngSize[$j];?>"><?php echo $val;?></button></li>
                                <?php ++$j; ++$i; endforeach; ?>
                              </ul>
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl class="sort_box color">
                            <dt><button><span>모든 컬러</span></button></dt>
                            <dd>
                              <ul>
                                <li class="n0"><button data-filter="*">전체</button></li>
                                <?php $j = 0; $i = 1; foreach($aColor as $val): ?>
                                <li class="n<?php echo $i;?>"><button data-filter=".<?php echo $aEngColor[$j];?>"><span> <?php echo $val;?></span></button></li>
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
                                <li class="n0"><button data-filter="*">전체</button></li>
                                <?php $j = 0; $i = 1; foreach($aPrice as $val): ?>
                                <li class="n<?php echo $i;?>"><button data-filter=".<?php echo $aEngPrice[$j];?>"><?php echo $val;?></button></li>
                                <?php ++$j; ++$i; endforeach; ?>
                              </ul>
                            </dd>
                        </dl>
                    </li>
                </ul>
                <!--button class="btn_result">Search tools</button-->
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
      <div id="marketProductAjax" class="content-mediaBox margin1"></div>
      <div class="btn_bot cen">
        <button class="more-ajax2" onClick="nextPage();" id="nextMore"  style="display:none"><img src="/images/btn/btn_ajaxmore.jpg" alt="더보기"></button>
    </div>
      <!-- <button class="more-ajax" onclick="nextPage();" id="nextMore" style="display:none"><span>+ 더보기</span></button> -->

  </section><!-- //marketPlaceArea -->

    </div><!-- //container_inner -->
  </section><!-- //container_sub -->

<script>
var winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
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

    //tabTransformation(0,"c");
    if(winWidth >= 640){
    iCutter("#marketArea .marketVisual .list > ul > li .photo");
    }else{
      $("#marketArea .marketVisual .list > ul > li .photo img.mobile").css({
        "width":"",
        "height":"",
        "margin-left":""
      })
    }

    iCutter("#marketArea .categori .list > ul > li .photo");



  var mainTimeOutSet;
    $(function(){
        ajaxData();
        $(window).resize(function(){
            var winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            clearInterval(mainTimeOutSet);
            mainTimeOutSet = setTimeout(function(){
                if(winWidth >= 640){
                  iCutterLoadNone("#marketArea .marketVisual .list > ul > li .photo");
                }else{
                  $("#marketArea .marketVisual .list > ul > li .photo img.mobile").css({
                    "width":"",
                    "height":"",
                    "margin-left":""
                  })
                }

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
      if(Modernizr.csstransforms) photo.find("img").stop().animate({"transform": "scale(1.3)"},10000);
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
       var marketVisualInterval;
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

        $("#marketArea .marketVisual .list > ul > li").swipe( {
          //Generic swipe handler for all directions
          swipeLeft:function(event, direction, distance, duration, fingerCount) {
                if(visualNum < 0){
                      visualNum = visualTotal-1;
                  }else{
                    visualNum --;
                  }

                visualAction(visualNum);

          },
           swipeRight:function(event, direction, distance, duration, fingerCount) {
                if(visualNum >= visualTotal){
                      visualNum = 0;
                  }else{
                    visualNum ++;
                  }
                  visualAction(visualNum);
          },
          excludedElements:".noSwipe",
          threshold:80
        });

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
        }).on("mouseenter mouseleave",function(e){
            if(e.type == "mouseenter"){
                marketVisualStop();
            }else{
                marketVisualRun();
            }

        })

        //visualAction(visualNum);

         function marketVisualRun(){
            marketVisualInterval = setInterval (marketVisual_setintervarl, 4000);
          }

          function marketVisualStop(){
            clearInterval(marketVisualInterval);
          }

          function marketVisual_setintervarl(){
            if(visualNum >= visualTotal){
                      visualNum = 0;
                  }else{
                    visualNum ++;
                  }

                visualAction(visualNum);
      }

      marketVisualRun();





    //$("#marketArea .marketVisual").on("mouseenter",visualBoxEnter).on("mouseleave",visualBoxLeave);

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

 function nextPage(){
	if(page <= 1){
		$("#nextMore").css("display","none");
	}else{
		loadingStart($("#marketProductAjax").outerHeight());
		getItemElement();
		if (totalPage <= page){
			$("#nextMore").css("display","none");
		}
	}
 }

function scrollNewEvent(w) {
	var win = $(window),
	doc = $(document),
	body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
	var top = win.scrollTop() + win.height();
	var endHeight = $("#marketProductAjax").offset().top + $("#marketProductAjax").outerHeight() +150;
	if (top > endHeight ) {
		if (totalPage >= page) {
			startScroll();
		}
	}

	function startScroll() {
		if (!scrollNewsStartFlag) {
			scrollNewsStartFlag = true;
			<?php
			if ( $check_mobile == true ){ //모바일일때 자동스크롤이 1page 부터 나오도록
				$scroll_page = 1;
			}else{
				$scroll_page = 3;
			}
			?>

			if (page <= '<?php echo $scroll_page ?>' ) {
			//if (page <= 1 ) {
				nextPage();
			}
			else {
				if (totalPage >= page) {
					$("#nextMore").css("display","");
				}
				else {
					$("#nextMore").css("display","none");
				}
				$container.isotope('layout');
			}
			/*
			loadingStart($("#marketProductAjax").outerHeight());
			getItemElement();
			*/
		  }
	}
};//scrollNewEvent

   $(window).on("scroll",function(){
     scrollNewEvent();
     //getItemElement();
    })
    var categoriDep1 = "*";
	var page = 1;
	var totalCount = <?php echo $artWorkTotalCount;?>;
	var totalPage = Math.ceil(totalCount / <?php echo ARTWORKSLISTCOUNT;?>);

	//뒤로가기를 위한 변수
	var back_page = '<?php echo $back_page;?>' ;
	var isto = '<?php echo $isto;?>' ; //뒤로가기 시 해당 섹션으로 찾아가기 위한 변수  $("#id")


    $(".categori > .list > ul > li  a , #categoriList > ul > li > a").click(function(event){
            event.preventDefault();
             var index = $(this).parents("li").index();
            $('html,body').animate({scrollTop:$(this.hash).offset().top - 100}, 500);
            var filterValue = $(this).attr('data-filter');
            categoriDep1 = filterValue;
            //alert(categoriDep1);
            $container.isotope({ filter: filterValue });
            if($(this).parents("li").find(".photo").length > 0){
                index = index + 1;
                if($(this).attr('data-filter') == ".Print"){
                    index = 4;
                  }else if($(this).attr('data-filter') == ".Conversation"){
                    index = 1;
                  }


              }
            $("#categoriList > ul > li").each(function(){
              $(this).removeClass("on");

                $("#categoriList > ul > li:eq("+index+")").addClass("on");
            });

    });


    $(".sort_lst dl.sort_box dd > ul > li").on("mousedown",function(event){
            event.preventDefault();
            var filterValue = $(this).find("button").attr('data-filter');
            //alert(categoriDep1 +" , "+ filterValue);
            $container.isotope({ filter:categoriDep1+ filterValue });
    });



      var $container = $("#marketProductAjax");

      function ajaxData(num)
      {

           $.ajax({
               type:"GET",
               url:"ajax-bbs1.php",
               ansync : false,
               dataType:"html",
			   data:{ "page":page,"back_page":back_page },
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
                             filter: '*'
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
				  page ++;
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
          url:"ajax-bbs1.php",
          dataType:"html",
		  data:{"page":page},
          success : function(data) {

            loadingImg.animate({
                  "opacity":0
                },500,function(){
                  $(this).css("opacity",1).remove();
                    $("<div id='tmpData'></div>").html(data).appendTo($container);
                      var $data2 = $($container.find("#tmpData").html());
                      $container.append($data2);
                      $("#tmpData").remove();

                      $data2.css({"opacity":0 })
                      $data2.imagesLoaded(function(){
                           $data2.css({"opacity":1});
                           $container.isotope( 'appended',$data2);
                           $container.isotope('layout');
                            page ++;
                            scrollNewsStartFlag = false;

                        });//imagesLoaded
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

function shareFaceBook() {
	//var url = "http://www.facebook.com/sharer.php?u=<?php echo SHARE_URL;?>?goods=<?php echo $goods_idx?>";
	var url = "http://www.facebook.com/sharer.php?u=<?php echo SHARE_URL;?>";
	window.open(url, '', '');
}

function sharePinterest() {
	var coverImage = '';
	var desc = '';
	//var url = "http://pinterest.com/pin/create/button/?url=<?php echo SHARE_URL;?>?goods=<?php echo $goods_idx?>&media=" + coverImage + "&description=" + desc;
	var url = "http://pinterest.com/pin/create/button/?url=<?php echo SHARE_URL;?>?media=" + coverImage + "&description=" + desc;
	window.open(url, '', '');
}

function shareGooglePlus() {
	var url = "https://plus.google.com/share?url=<?php echo SHARE_URL;?>";
	window.open(url, '', 'width=490 height=470');
}
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



<?php
include(ROOT.'inc/footer.php');
include(ROOT.'inc/bot.php');

$dbh = null;
$Marketmain = null;
$mainBannerListRolling = null;
$genreBannerList = null;
$artWorkTotalCount = null;

unset($dbh);
unset($Marketmain);
unset($mainBannerListRolling);
unset($genreBannerList);
unset($artWorkTotalCount);
?>

<script>

$(function(){
	<?php
	if ($_SESSION['user_idx']){
	?>
		//	loginPopClose();
	<?
	}
	?>
});


</script>