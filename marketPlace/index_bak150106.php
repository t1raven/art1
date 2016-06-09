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
              <?php if (is_array($eventBanner)): ?>
              <div class="bxBanner">
                <ul>
                  <?php foreach($eventBanner as $row): ?>
                  <li>
                    <a href="#" class="item"><img src="<?php echo eventUploadPath, $row['evt_main_img'];?>" alt=""></a>
                    <div class="cont">
                      <div class="inner">
                        <p class="t1"><?php echo $row['evt_copyright'];?></p>
                        <p class="t2"><?php echo $row['evt_title'];?></p>
                      </div>
                    </div>
                  </li>
                  <?php endforeach; ?>
                </ul>
              <?php else: ?>
              <div class="pos posA1 wide-pre-Box content-mediaBox">
                <p class="noAjaxData">자료가 존재하지 않습니다.</p>
              <?php endif; ?>
              </div>
          </article><!-- //RepBanner -->
           <!--
             MDChoice
             상품 썸네일 267 * 173 으로 고정 부탁드립니다.(css로가 아닌  순수 이미지 사이즈)

             -->

          <article class="MDChoice">
              <div class="inner">
                <h2 class="title2">MD Choice</h2>
                <div class="bxBanner" id="md-choice-banner">
                  <!--ul>
                    <li><a href="#"><img src="/images/market/tmp1_5.jpg" alt=""></a></li>
                    <li><a href="#"><img src="/images/market/tmp1_5.jpg" alt=""></a></li>
                    <li><a href="#"><img src="/images/market/tmp1_5.jpg" alt=""></a></li>
                  </ul-->
                </div><!-- //bxBanner -->
              </div><!-- //inner -->
          </article><!-- //MDChoice -->

          <article class="quickLink">
              <h2 class="blind">quick banner</h2>
              <div class="inner">
                <ul class="lst">
                <?php
				$i=0;
				$j = 0;
				foreach($aMdChoiceTitleList as $val) :
					if (!empty($val)):
				?>
					<li<?php if ($i === 0):?> class="on"<?php endif;?>><a href="javascript:;" onclick="selectMdChoice(this, '<?php echo $j;?>');"><span><?php echo $val;?></span></a></li>
				<?php
					endif;
					++$i;
					$j = $j + 5;
				endforeach;
				?>
                  <!--li><a href="#"><span>일러스트 특집</span></a></li>
                  <li><a href="#"><span>북유럽 특집</span></a></li>
                  <li><a href="#"><span>Christmas Collection</span></a></li>
                  <li><a href="#"><span>일러스트 특집</span></a></li-->
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
                          <li class="n0"><button onmousedown="setCondition('price', '');">전체</button></li>
                          <li class="n1"><button onmousedown="setCondition('price', '0');">50,000 ~ 100,000 원</button></li>
                          <li class="n2"><button onmousedown="setCondition('price', '1');">100,000 ~ 200,000 원</button></li>
                          <li class="n3"><button onmousedown="setCondition('price', '2');">200,000 ~ 500,000 원</button></li>
                          <li class="n4"><button onmousedown="setCondition('price', '3');">500,000 ~ 1,000,000 원</button></li>
                          <li class="n5"><button onmousedown="setCondition('price', '4');">1,000,000 원 이상</button></li>
                        </ul>
                      </dd>
                  </dl>
              </li>
              <li>
                  <dl class="sort_box">
                      <dt><button><span>Medium</span></button></dt>
                      <dd>
                        <ul>
                          <li class="n0"><button onmousedown="setCondition('medium', '');">전체</button></li>
                          <li class="n1"><button onmousedown="setCondition('medium', '0');">Design</button></li>
                          <li class="n1"><button onmousedown="setCondition('medium', '1');">Drawing</button></li>
                          <li class="n3"><button onmousedown="setCondition('medium', '2');">Painting</button></li>
                          <li class="n4"><button onmousedown="setCondition('medium', '3');">Film Viedo</button></li>
                          <li class="n5"><button onmousedown="setCondition('medium', '4');">Installation</button></li>
                          <li class="n6"><button onmousedown="setCondition('medium', '5');">Sculpture</button></li>
                          <li class="n7"><button onmousedown="setCondition('medium', '6');">Print</button></li>
                          <li class="n8"><button onmousedown="setCondition('medium', '7');">Photography</button></li>
                        </ul>
                      </dd>
                  </dl>
              </li>
              <li>
                  <dl class="sort_box">
                      <dt><button><span>Subject</span></button></dt>
                      <dd>
                        <ul>
                          <li class="n0"><button onmousedown="setCondition('subject', '');">전체</button></li>
                          <li class="n1"><button onmousedown="setCondition('subject', '0');">Poitical</button></li>
                          <li class="n2"><button onmousedown="setCondition('subject', '1');">Landscape</button></li>
                          <li class="n3"><button onmousedown="setCondition('subject', '2');">Humor</button></li>
                          <li class="n4"><button onmousedown="setCondition('subject', '3');">Science</button></li>
                          <li class="n5"><button onmousedown="setCondition('subject', '4');">Fashion</button></li>
                          <li class="n6"><button onmousedown="setCondition('subject', '5');">Cityscape</button></li>
                          <li class="n7"><button onmousedown="setCondition('subject', '6');">Animals</button></li>
                          <li class="n8"><button onmousedown="setCondition('subject', '7');">Still life</button></li>
                          <li class="n9"><button onmousedown="setCondition('subject', '8');">Portait</button></li>
                        </ul>
                      </dd>
                  </dl>
              </li>
              <li>
                  <dl class="sort_box">
                      <dt><button><span>Size</span></button></dt>
                      <dd>
                        <ul>
                          <li class="n0"><button onmousedown="setCondition('size', '');">전체</button></li>
                          <li class="n1"><button onmousedown="setCondition('size', '0');">S(~50)</button></li>
                          <li class="n2"><button onmousedown="setCondition('size', '1');">M(~100)</button></li>
                          <li class="n3"><button onmousedown="setCondition('size', '2');">L(~100)</button></li>
                          <li class="n4"><button onmousedown="setCondition('size', '3');">ETC</button></li>
                        </ul>
                      </dd>
                  </dl>
              </li>
          </ul>
          <button class="btn_result" type="button" onclick="searchArchive();">SEARCH</button>
        </header>
        <script>
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

            $(function(){ sortDesignMotion(".sort_box"); getMdChoiceBanner(0); searchArchive(); });

			function setCondition(txt, val) {
				switch (txt) {
					case "price" : price = val; break;
					case "medium" :  medium = val; break;
					case "subject" :  subject = val; break;
					case "size" :  size = val; break;
				}
			}

			function searchArchive() {
				$.ajax({
					type:"POST",
					url:"ajax_archive.php",
					dataType:"html",
					data:{"price":price, "medium":medium, "subject":subject, "size":size},
					success:function(data) {
						$("#article-archive").html(data);
					},
					error:function(xhr, status, error) {
						alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
					}
				});
			}

			function getMdChoiceBanner(idx) {
				$.ajax({
					type:"POST",
					url:"ajax_mdchoice.php",
					dataType:"html",
					data:{"idx":idx},
					success:function(data) {
						$("#md-choice-banner").html(data);
					},
					error:function(xhr, status, error) {
						alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
					}
				});
			}

			function selectMdChoice(obj, idx) {
				$(".quickLink>div>ul>li").attr("class", "");
				$(obj).parent().attr("class", "on");
				getMdChoiceBanner(idx);
			}
        </script>
        <article class="lst_horizontal style2 content-mediaBox" id="article-archive">
          <?php include('ajax_archive.php');?>
        </article>

      </section><!-- //toprated -->

      <!--
       ArtHongs Product
       상품 썸네일 280 * 210 으로 고정 부탁드립니다.(css로가 아닌  순수 이미지 사이즈)

       -->
      <section class="artProduct content-mediaBox">
        <h1  class="title1">Art Product</h1>
        <article class="lst_horizontal style3">
            <?php if (is_array($aGoodsList)): ?>
            <ul>
              <?php foreach($aGoodsList as $row): ?>
              <li>
                <div class="item"><a href="goods_view.php?goods=<?php echo $row['goods_idx'];?>"><img src="<?php echo goodsListImgUploadPath, $row['goods_list_img'];?>" alt=""></a></div>
                <div class="cont">
                  <p class="t1"><?php echo $row['goods_name'];?></p>
                  <p class="t2"><?php echo number_format($row['goods_sell_price']);?>원</p>
                </div>
              </li>
              <?php endforeach;?>
            </ul>
            <?php else: ?>
            <div class="pos posA1 wide-pre-Box content-mediaBox">
              <p class="noAjaxData">자료가 존재하지 않습니다.</p>
            </div>
            <?php endif;?>
        </article>

      </section><!-- //toprated -->
  </section><!-- //marketPlaceArea -->

    </div><!-- //container_inner -->
  </section><!-- //container_sub -->

<?php include '../inc/footer.php'; ?>
<?php include '../inc/bot.php'; ?>
<?php
$dbh = null;
unset($dbh);
?>