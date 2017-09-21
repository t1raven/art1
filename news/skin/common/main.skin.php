<?php
$subm='1';
?>
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

		<section id="newIndexArea">

<?



$back_page = isset($_GET['back_page']) ? (int)$_GET['back_page'] : null; //view page 에서 목록(뒤로)으로를 눌렀을때 처리를 위한 page 변수
$isto = isset($_GET['isto']) ? 'isto'.(int)$_GET['isto'] : null; ; //view page 에서 목록(뒤로)으로를 눌렀을때 해당 섹션으로 찾아가기 위한 변수
$at_tmp = isset($_GET['at']) ? $_GET['at'] : null; //view page 에서 목록(뒤로)으로를 눌렀을때 해당 메뉴로 찾아가기 위한 변수




$News = new News();


try {
	if (!$News->getFrontReadMainNews($dbh)) {
		//throw new Exception("게시물이 존재하지 않습니다.");
	}
} catch(Exception $e) {
	$dbh = null;
	//JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	echo $e->getMessage() ;
	//exit;
}
//echo "123456";
?>


		  <div class="sec1 content-mediaBox margin1">
              <div class="brief">
                <div class="bbs_thumb_t6">
                      <section class="lst">
                          <div class="thumb">
                            <a href="?at=read&subm=1&idx=<?php echo $News->attr['news_idx']; ?>"><img src="<?php echo newsUploadPath.$News->attr['news_recent_up_file_name'];?>" alt="" /></a>
                          </div>
                          <div class="cont">
                              <div class="inner">
                                <p class="h"><a href="?at=read&subm=1&idx=<?php echo $News->attr['news_idx']; ?>"><?php echo $News->attr['news_title'];?></a></p>
                                <p class="reporter">
                                  <strong>
                                    <?php echo $News->attr['reporter_name'];?>
                                  </strong>
								  | <?php echo  substr($News->attr['create_date'],0,10);?>  | <?php echo $News->attr['source'];?>
                                  <!-- span>
                                    | <?php echo  substr($News->attr['create_date'],0,10);?>
                                  </span>
                                  <span>
                                    | <?php echo $News->attr['source'];?>
                                  </span -->

                                </p>
                                <p class="txt">
                                  <a href="?at=read&subm=1&idx=<?php echo $News->attr['news_idx']; ?>"><?php echo $News->attr['new_paragraph_content'];?></a>
                                </p><!-- text_cont -->
                                <a href="?at=read&subm=1&idx=<?php echo $News->attr['news_idx']; ?>" class="more">더보기</a>
                              </div><!-- //inner -->
                          </div><!-- cont -->
                      </section><!-- lst -->
                  </div><!-- //bbs_thumb_t6 -->
              </div>


              <div class="focus">
                 <section class="bbs_thumb_t1">
                    <!-- <h1>Focus</h1> -->

<?php
//Episode 2,3 번
$News->setAttr("cate", 6); //Episode
$News->setAttr("sz", 2);
//$News->setAttr("start_row", 0);
//$News->setAttr("recent_status", 'N');
//$tmp = $News->getFrontList($dbh);
$tmp = $News->getFrontMainListRight($dbh);
//$list = $tmp[0];
$list = $tmp;
//echo print_r($list);
//exit;
foreach($list as $row) {
		//목록 이미지S
		if (empty($row['news_main_up_file_name'])){
			$list_img = $row['up_file_name'];
		}else{
			$list_img = $row['news_main_up_file_name'];
		}
		//목록 이미지E
?>
					   <article class="lst_thumb">
                              <div class="thumb">
                                  <a href="?at=read&subm=6&idx=<?php echo $row['news_idx']; ?>"><img src="<?php echo newsUploadPath.$list_img;?>" alt=""></a>
                              </div><!-- //thumb -->
                              <div class="cont">
                                <div class="inner">
                                    <!-- strong class="categori">Episode</strong -->
                                    <div class="txt">
                                      <a href="?at=read&subm=6&idx=<?php echo $row['news_idx']; ?>"><?php echo $row['news_title'];?></a>
                                    </div>
                                    <div class="user">
                                      <strong><?php echo $row['reporter_name'];?></strong>
									  <span class="first"><?php echo substr($row['create_date'],0,4)?>.<?php echo substr($row['create_date'],5,2)?>.<?php echo substr($row['create_date'],8,2)?></span>
									  <span><?php echo mb_substr($row['source'],0,12,"UTF-8") ;?></span>
                                    </div><!-- //user -->
                                 </div>
                              </div><!-- //cont -->
                       </article><!-- //lst_thumb -->
<?php
}

//Trend 2,3 번
$News->setAttr("cate", 3); //Trend
$News->setAttr("sz", 2);
//$News->setAttr("start_row", 0);
//$News->setAttr("recent_status", 'N');
//$tmp = $News->getFrontList($dbh);
$tmp = $News->getFrontMainListRight($dbh);
//$list = $tmp[0];
$list = $tmp;
foreach($list as $row) {
		//목록 이미지S
		if (empty($row['news_main_up_file_name'])){
			$list_img = $row['up_file_name'];
		}else{
			$list_img = $row['news_main_up_file_name'];
		}
		//목록 이미지E
?>

                       <article class="lst_thumb">
                              <div class="thumb">
                                  <a href="?at=read&subm=3&idx=<?php echo $row['news_idx']; ?>"><img src="<?php echo newsUploadPath.$list_img;?>" alt=""></a>
                              </div><!-- //thumb -->
                              <div class="cont">
                                <div class="inner">
                                    <!-- strong class="categori">Trend</strong -->
                                    <div class="txt">
                                      <a href="?at=read&subm=3&idx=<?php echo $row['news_idx']; ?>"><?php echo $row['news_title'];?></a>
                                    </div>
                                    <div class="user">
                                      <strong><?php echo $row['reporter_name'];?></strong>
									  <span class="first"><?php echo substr($row['create_date'],0,4)?>.<?php echo substr($row['create_date'],5,2)?>.<?php echo substr($row['create_date'],8,2)?></span>
									  <span><?php echo mb_substr($row['source'],0,12,"UTF-8") ;?></span>
                                    </div><!-- //user -->
                                 </div>
                              </div><!-- //cont -->
                       </article><!-- //lst_thumb -->
<?php
}
?>


                  </section><!-- //bbs_thumb_t1 -->
              </div><!-- //focus -->
          </div> <!-- //sec1    -->

<!-- 카드뉴스 시작 -->
<script src="/js/idangerous.swiper.min.js"></script>
<?php
$News->setAttr("cate", 15);
$News->setAttr("sz", 6);
$tmp = $News->getFrontMainListRight($dbh);
$list = $tmp;
$totalCnt = $News->getTotalCnt($dbh);
?>
		<section class="cardNewsSec content-mediaBox margin1">
			<section id="bbsType6">
				<div class="inner w6">
					<h1>Card News<a href="/news/?at=list&subm=15" class="view_all">View All (<?php echo number_format($totalCnt); ?>) ▶</a></h1>
					<ul class="clearfix">
					<?php
					foreach($list as $row) {
						//목록 이미지S
						if (empty($row['news_main_up_file_name'])){
							$list_img = $row['up_file_name'];
						}else{
							$list_img = $row['news_main_up_file_name'];
						}
					?>
						<li><a class="img" href="javascript:;" onclick="getCardView('<?php echo $row['news_idx'];?>');"><img src="<?php echo newsUploadPath.$list_img;?>" /></a></li>
					<?php
					}
					?>
						<!-- li><a class="img" href="javascript:;" onclick="getCardView('94115');"><img src="/news/skin/cardnews/images/thum/thum01.jpg" /></a></li>
						<li><a class="img" href="javascript:;" onclick="getCardView('94115');"><img src="/news/skin/cardnews/images/thum/thum02.jpg" /></a></li>
						<li><a class="img" href="javascript:;" onclick="getCardView('94115');"><img src="/news/skin/cardnews/images/thum/thum03.jpg" /></a></li>
						<li><a class="img" href="javascript:;" onclick="getCardView('94115');"><img src="/news/skin/cardnews/images/thum/thum04.jpg" /></a></li>
						<li><a class="img" href="javascript:;" onclick="getCardView('94115');"><img src="/news/skin/cardnews/images/thum/thum05.jpg" /></a></li>
						<li><a class="img" href="javascript:;" onclick="getCardView('94115');"><img src="/news/skin/cardnews/images/thum/thum06.jpg" /></a></li -->
					</ul>
				</div>
			</section>
		</section>
<script>
function resizing3(){
	var vw2 = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	var wcnt ;
	if(vw2 >= 959){wcnt = 6;
	}else if(vw2 >= 480){wcnt = 3;
	}else{wcnt = 2;
	}

	var itemLen = $("#bbsType6 .inner > ul > li").length;
	$("#bbsType6 .inner").removeClass("w2 w3 w6").addClass("w"+wcnt);
	$("#bbsType6 .inner > ul > li").removeClass("ml0");
	for(var i = 0 ; i < itemLen/wcnt ; i++){
		$("#bbsType6 .inner > ul > li:eq("+(i*wcnt)+")").addClass("ml0");
	}


	if($("#cardnewsView .view_box").hasClass("img_only")){
		if(vw >= vH){
			$("#cardnewsView .view_box").removeClass("w_max").addClass("h_max");
		}else{
			$("#cardnewsView .view_box").removeClass("h_max").addClass("w_max");
		}
	}
}
resizing3()

$(function(){
	$(window).resize(function(){
		resizing3();
		var CardBoxH = Math.max($(window).scrollTop()+($(window).height()/2)-($("#cardnewsView .view_box").height()/2),$(window).scrollTop());
		$("#cardnewsView .view_box").css("margin-top",CardBoxH);
	})
});

</script>
<!-- 카드뉴스 끝 -->


          <div class="sec2 content-mediaBox margin1">
              <section class="news">
                  <section class="bbs_thumb_t2">
                      <h1>Recent News</h1>
                          <div class="control">
                              <div class="pageing">
                                  <p class="result"><span class="num">1</span> / <span class="total">7</span></p>
                                  <div class="btn">
                                      <button class="prev"><img src="/images/btn/btn_prev_off.gif" alt="이전"></button>
                                      <button class="next"><img src="/images/btn/btn_next_off.gif" alt="다음"></button>
                                  </div><!-- //btn -->
                              </div><!-- //pageing -->
                          </div><!-- //control -->
                          <div class="banner_wrapper recent_news">
                              <div class="inner">
                                  <div class="motion">
<?php
//Recent News 각 뉴스 카테고리 별로 최근 1개
$list = $News->getFrontMainListMaxOneRow($dbh);
foreach($list as $row) {

		//리센트뉴스 S
		if(!empty($row['news_recent_up_file_name'])){
			$rescent_img = $row['news_recent_up_file_name'];
		}elseif (!empty($row['news_main_up_file_name'])){
			$rescent_img = $row['news_main_up_file_name'];
		}else{
			$rescent_img = $row['up_file_name'];
		}
		//리센트뉴스 E

		//목록 이미지S
		if (!empty($row['news_main_up_file_name'])){
			$list_img = $row['news_main_up_file_name'];
		}else{
			$list_img = $row['up_file_name'];
		}
		//목록 이미지E
?>
                                      <article class="lst">
                                          <div class="thumb">
                                              <a href="?at=read&subm=<?php echo $row['news_category_idx']; ?>&idx=<?php echo $row['news_idx']; ?>">
                                              <img class="rec" src="<?php echo newsUploadPath.$rescent_img;?>" alt=""><!--와이드--></a>
											                         <img class="tit" src="<?php echo newsUploadPath.$list_img;?>" alt=""><!--4:3-->
                                          </div><!-- //thumb -->
                                          <div class="cont">
                                              <div class="inner">
                                                    <a href="?at=read&subm=<?php echo $row['news_category_idx']; ?>&idx=<?php echo $row['news_idx']; ?>" class="h"><?php echo $row['news_title']?></a>
                                                    <div class="txt">
                                                      <a href="?at=read&subm=<?php echo $row['news_category_idx']; ?>&idx=<?php echo $row['news_idx']; ?>"><?php echo $row['new_paragraph_content'];?></a>
                                                    </div><!-- //txt -->
                                               </div><!-- //inner -->
                                               <p class="txt2">
                                                 <strong>
                                                    <?php echo $row['reporter_name'];?>
                                                  </strong>
                                                  <span>
                                                    <?php echo substr($row['create_date'],0,10);?>
                                                  </span>
                                                  <span>
                                                    <?php echo $row['source'];?>
                                                  </span>
                                               </p>
                                           </div><!-- //cont -->
                                      </article><!-- //lst -->
<?php
}
?>

                                  </div><!-- //motion -->
                              </div>
                          </div>
                  </section><!-- // bbs_thumb_t2 -->
              </section><!-- //news -->
              <script>
                  function bannerChange(obj){
                    var o = $(obj);
                    o.each(function(){
                        var $this = $(this);
                        var activeNum = 0;
                        var lst = $this.find(".banner_wrapper .lst");
                        var total = lst.length;
                        var action = $this.find(".motion");
                        var controlBox = $this.find(".control"),
                              result = controlBox.find(".result"),
                              direction = controlBox.find(".prev , .next");

                        var myInterval;

                        var lstPrev = lst.eq(activeNum);
                        lst.css("display","none");
                        lstPrev.css("display","block");
                        result.find(".num").text(activeNum+1).end().find(".total").text(total);

                        function boxAction(num){
                          lstPrev.css("display","none");
                          lst.eq(num).css("display","block");
                          result.find(".num").text(num+1);
                          lstPrev = lst.eq(num);
                        };

                        function directionMotion(pageing){
                          if(!action.is(":animated")){
                              if(pageing  == "prev"){
                                if(activeNum == 0 ) {activeNum = (total-1) }else{activeNum --;}
                                boxAction(activeNum);
                              }else{//next
                                if(activeNum  >= (total-1) ){activeNum  = 0  }else{ activeNum ++;}
                                boxAction(activeNum );
                              }//if

	                           if(WinWdith > 959 ){
				                  iCutterLoadNone("#newIndexArea .bbs_thumb_t2 .banner_wrapper.recent_news .lst > .thumb");
				              }else{
				              		$("#newIndexArea .bbs_thumb_t2 .banner_wrapper.recent_news .lst > .thumb img").css({"width":"100%","height":"auto","margin-left":"0px"});
				              }
                            }//is
                        }

                            function autorun(){
                              myInterval = setInterval (motion_setintervarl, 3000);
                            }

                            function runstop(){
                              clearInterval(myInterval);
                            }

                            function motion_setintervarl(){
                              directionMotion("next");
                            }


                        autorun();
                        direction.bind("click",function(){
                          var c = $(this).attr("class");
                          directionMotion(c);
                        }).bind("mouseenter",function(){
                            runstop()
                        }).bind("mouseleave",function(){
                            autorun()
                        });

                        action.bind("mouseenter",function(){
                            runstop()
                        }).bind("mouseleave",function(){
                            autorun()
                        });
                    });
                  }//bannerChange

                  bannerChange(".news .bbs_thumb_t2");
              </script>

              <div class="community">
                <section class="bbs_nomal_t1">
                    <h1>Community</h1>
                    <a href="/bbs/?at=list" class="more"><img src="/images/btn/btn_more_off.gif" alt="더보기"></a>
                    <div class="lst">
                      <ul>
<?php
//커뮤니티
$Bbs = new Bbs();
$Bbs->setAttr("page", 1);
$Bbs->setAttr("list_size", 12);
$Bbs->setAttr("word", NULL);
$Bbs->setAttr("category", 10);
$tmp = $Bbs->getCommunityList($dbh);
$list = $tmp[0];
foreach($list as $row) {
?>
                        <li><strong><?php echo $row['bbs_name']?></strong><a href="/bbs/?at=read&idx=<?php echo $row['bbs_idx']?>"><?php echo $row['bbs_title']?></a></li>
<?
}
?>
                      </ul>
                    </div>
                </section>
              </div>
          </div> <!-- //sec2    -->


          <!-- 배너 광고 -->
          <div class="bot_banner">
          <?php
		   //메인 베너 S
		  $banner = new Banner();
		  $list = null;
		  $row = null;
		  $banner->setAttr('section', 2);
		  $list = $banner->getListBanner($dbh);
		  $i=1;
		  foreach($list as $row){
				if($row['isDisplay'] == 'Y')
				{
		  ?>
			<a href="<?php echo $row['linkUrl']; ?>" class="inner" target="_blank">
				<img src="<?php echo $row['bannerUpFileName']; ?>" class="pc" alt="" />
				<img src="<?php echo $row['bannerUpFileNameMobile']; ?>" class="mobile" alt="" />
			</a>
		  <?php
				}
			 $i++;
		  }  //메인 베너 E
		  ?>
          </div>


          <section class="exbanner">
            <script src="/js/isotope.pkgd.min.js"></script>
               <div id="newWrapper"></div>
                    <div class="btn_bot cen">
                        <button class="more-ajax2" onClick="nextPage();" id="nextMore"  style="display:none"><img src="/images/btn/btn_ajaxmore.jpg" alt="더보기"></button>
                    </div>
               <!-- <button class="more-ajax" onClick="nextPage();" id="nextMore"  style="display:none"><span>+ 더보기</span></button> -->
          </section>

        </section><!-- //newIndexArea -->

    </div><!-- //container_inner -->
  </section><!-- //container_sub -->

<!-- 카드뉴스 추가하기 시작 -->
  <section id="cardnewsView" onclick="clickCardViewBack();"></section>
<!-- 카드뉴스 추가하기 끝 -->

  <script>

function swipeCardNews(){

<?php if ( $check_mobile == true ){ ?>

		$("#cardnewsView .view_box .img_box").swipe({
			swipeLeft:function() {
				slideCardImg(1);
			},
			swipeRight:function() {
				slideCardImg(-1);
			},
		});
<? }?>
}
var page = 1;
var back_page = '<?php echo $back_page;?>' ;
var isto = '<?php echo $isto;?>' ; //뒤로가기 시 해당 섹션으로 찾아가기 위한 변수  $("#id")
var at_tmp = '<?php echo $at_tmp;?>' ;

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
	console.log("1page :"+page);
	if(lastPaga <= 1){
		// $("#nextMore").css("display","none");
		$(".newsBox.bt_vewmore").css("visibility","hidden");
	}else{
		loadingStart($("#newWrapper").outerHeight());
		if($("#newWrapper").find(".newsBox").length > 0){
			getItemElement();
		}else{
			scrollNewsStartFlag = false;
		}

	}


 }

  function scrollNewEvent(w){
    var win = $(window),
    doc = $(document),
    body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
    var top = win.scrollTop() + win.height();
    var endHeight = $("#newWrapper").offset().top + $("#newWrapper").outerHeight();

    console.log(top, endHeight);

    if(top > endHeight/1.2 ){
      startScroll();
    }

    function startScroll(){

      if(!scrollNewsStartFlag){
        scrollNewsStartFlag = true;

		lastPaga = $(".pagecount").last().data("pagecount");
		//alert(lastPaga);
		/*
		if(lastPaga > 1){ //마지막 페이지이면 더 이상 페이지를 호출하지 않는다. by 이용태
			loadingStart($("#newWrapper").outerHeight());
			getItemElement();
		}else{
			$container.isotope('layout');
		}
		*/

		<?php
			if ( $check_mobile == true ){ //모바일일때 자동스크롤이 1page 부터 나오도록
				//$scroll_page = 1;
				$scroll_page = 3000000; //2016-04-27 업체요구에 의해 무한스크롤 처리 LYT
			}else{
				//$scroll_page = 3;
				$scroll_page = 3000000; //2016-04-27 업체요구에 의해 무한스크롤 처리 LYT
			}
		?>

		if (page >= (<?php echo $scroll_page ?>+1)) {
		//if (page >= 1 ){
			//$("#nextMore").css("display","");
			<?php if ( $check_mobile == true ){?>
				$(".newsBox.bt_vewmore .newsBox_inner > a").css("height","280");
			<?php }?>
			$(".newsBox.bt_vewmore").css("visibility","visible");
			$(".newsBox.bt_vewmore").animate({opacity:1},300);
		}

		if (page <= '<?php echo $scroll_page ?>' ) {
		//if (page <= 3 ){
			nextPage();

		}else{
			$container.isotope('layout');
		}

		/*
        loadingStart($("#newWrapper").outerHeight());
         getItemElement();
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

           $.ajax({
               type:"GET",
               //url:"ajax-bbs1.php",
			   url:"__list.php",
			   data:{"page":page, "back_page":back_page, "at_tmp":at_tmp },
               ansync : false,
               dataType:"html",
               success : function(data) {

                    var $container2;
                    $container.children().remove();
                      $("<div id='tmpData'></div>").html(data).appendTo($container);
                      var count = $container.find("#tmpData .newsBox").length;
                      for(var j = 0 ; j < count ; j++ ){
                      	$container.find("#tmpData .newsBox").attr("data-type","content1");
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
                        /*$container.find("img").fadeIn( 2000);*/
                            $container.isotope({
	                        	  getSortData: {
								                type: '[data-type]',
								              },
					         	          sortBy : ['type'],
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

					  page++;



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

		console.log("String :"+$("#newWrapper").find(".newsBox").length);
		if (back_page != '' ){ //view 에서 목록으로 갔을때 처리 하기 위한 로직 (back_page 는 view_page 에서 생성 처리한다.
			page = parseInt(back_page) + parseInt(page) -1 ;
			back_page = "";
		}

        $.ajax({
          type:"GET",
          //url:"ajax-bbs1.php",
		  url:"__list.php",
		  data:{"page":page, "at_tmp":at_tmp},
          dataType:"html",
          success : function(data) {

            loadingImg.animate({
                  "opacity":0
                },500,function(){
                  $(this).css("opacity",1).remove();
                    $("<div id='tmpData'></div>").html(data).appendTo($container);
                   	  var count = $container.find("#tmpData .newsBox").length;
                      for(var j = 0 ; j < count ; j++ ){
                      	$container.find("#tmpData .newsBox").attr("data-type","content"+page);
                      }
                      var $data2 = $($container.find("#tmpData").html());
                      $container.append($data2);
                      $("#tmpData").remove();

					//by 이용태 이미지 푸터영역 침범 버그 수정
					 var imgLoad = imagesLoaded( $container );
                      function onAlways( instance ) {
                        //$container.find("img").fadeIn( 20);
                            $container.isotope('layout');
                      };
                      imgLoad.on( 'always', onAlways );
					//////////


                      $container.isotope( 'insert',$data2).isotope('layout');
                      /*$data2.css({"opacity":0 , "margin-top":0}).animate({"opacity":1 , "margin-top":0},500);*/

                      scrollNewsStartFlag = false;



                })//loading
                page++;


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
  <script src="<?=$currentFolder?>/js/jquery.dotdotdot.min.js"></script>
  <script>
    var mainTimeOutSet;
    var WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
      $(window).resize(function(){
              WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            clearInterval(mainTimeOutSet);
            mainTimeOutSet = setTimeout(function(){

              iCutterLoadNone(".thumb");
              if(WinWdith > 959 ){

              }else{
              		$("#newIndexArea .bbs_thumb_t2 .banner_wrapper.recent_news .lst > .thumb img").css({"width":"100%","height":"auto","margin-left":"0px"});
              }

                dotWindow(".bbs_thumb_t6 .lst > .cont .h , .bbs_thumb_t6  .lst .cont .txt , #newIndexArea .bbs_thumb_t1 .lst_thumb .cont .txt , #newIndexArea .bbs_thumb_t2 .banner_wrapper .lst > .cont .h , #newIndexArea .bbs_thumb_t2 .banner_wrapper .lst > .cont .txt , #newIndexArea .bbs_nomal_t1 > .lst > ul > li > a");
            },1000);
          });

      if(WinWdith > 959 ){
         iCutter(".thumb");
      }
      //else{
     //    $("#newIndexArea .bbs_thumb_t2 .banner_wrapper .lst > .thumb").find()
  //  }
      dotWindow(".bbs_thumb_t6 .lst > .cont .h , .bbs_thumb_t6  .lst .cont .txt , #newIndexArea .bbs_thumb_t1 .lst_thumb .cont .txt , #newIndexArea .bbs_thumb_t2 .banner_wrapper .lst > .cont .h , #newIndexArea .bbs_thumb_t2 .banner_wrapper .lst > .cont .txt , #newIndexArea .bbs_nomal_t1 > .lst > ul > li > a" , "window");


  </script>

  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





