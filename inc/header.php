<header id="header" <? if ($pageNum == "0"){?> class="h_main"<?} else {?> class="h_sub" <? } ?>>
   <div class="header_inner">
      <h1>
         <a href="/"><img src="/images/header/logo_1st.jpg" alt="Fulfil your art life ART hongs" /></a>
      </h1>
      <nav id="lnb"  <? if ($pageNum == "0"){?> class="h_main"<?} else {?> class="h_sub" <? } ?>>
         <ul>
            <li class="m1"><a href="/art1/artist_rec.php"><span class="en">art1</span><span class="kr">아트1</span></a></li>
            <li class="m2"><a href="/news/index.php?at=main"><span class="en">news</span><span class="kr">뉴스</span></a></li>
            <li class="m3"><a href="/marketPlace/index.php"><span class="en">market</span><span class="kr">마켓</span></a></li>
            <li class="m4"><a href="/galleries/"><span class="en">galleries</span><span class="kr">갤러리</span></a></li>
            <li class="m5 new"><a href="/articovery/"><span class="en">articovery</span><span class="kr">아티커버리</span></a></li>
         </ul>
      </nav>
      <!--gnb-->
      <script>
      $(function(){
            if ($("#lnb").find("ul>li").length >= pageNum && pageNum  > 0 ) {
               $("#lnb").find(".m"+pageNum).addClass("on");
            };

      })

      </script>
      <nav class="utill">
         <ul>
<?php if (empty($_SESSION['user_idx'])){ ?>
	<?php if($_SERVER["SCRIPT_NAME"] == '/member/login.php'){ ?>
			<li class="login"><a href="/member/login.php" data-ajaxdata="/inc/ajax_login.php" class="txt">Log In</a></li>
	<?php }else{ ?>
			<li class="login"><a href="/member/login.php" data-ajaxdata="/inc/ajax_login.php" onclick="fixedLayerPopup(this,true); return false;" class="txt">Log In</a></li>
	<?php } ?>
<?php }else{ ?>
            <li class="logout">
               <a href="#lst_myart" class="txt"><!--My art 1 -->MY</a>
               <div id="lst_myart" class="lst_myart">
                  <ul>
                     <li><a href="/member/dashboard">마이페이지</a></li>
                     <!-- li><a href="/member/modify.php">기본정보수정</a></li -->
                     <li><a href="/member/modify/?at=write">기본정보수정</a></li>
                     <!-- li><a href="/member/qna.php">상담내역</a></li -->
                     <li><a href="/member/advice">상담내역</a></li>
                     <li><a href="/member/address">배송지 관리</a></li>
                     <li><a href="/member/wish">위시리스트</a></li>
                     <li><a href="/member/order">주문정보</a></li>
                     <!-- li><a href="/member/contact_us.php">문의하기</a></li -->
                     <li class="logout"><a href="/member/logout.php">Log Out</a></li>
                  </ul>
               </div>
            </li>
<?php } ?>
            <!-- <li>
               <div class="totalNum"><span>1</span></div>
               <a href="/member/wishlist.php" data-ajaxdata="/inc/ajax_wish.php" onclick="fixedLayerPopup(this,true); return false;"><img src="/images/header/ico_wishlist_off.png" alt="위시리스트" /></a>
            </li> -->
            <li class="m1">
               <div class="totalNum"><span><?php echo $basketCnt?></span></div>
<?php if($_SERVER["SCRIPT_NAME"] == '/member/shoppingbag.php'){ ?>
               <a href="/member/shoppingbag.php" data-ajaxdata="/inc/ajax_shopping.php" ><img src="/images/header/ico_shoppingbag_off.png" alt="shoppingbag" /></a>
<?php }else{ ?>
               <a href="/member/shoppingbag.php" data-ajaxdata="/inc/ajax_shopping.php" onclick="fixedLayerPopup(this,true); return false;"><img src="/images/header/ico_shoppingbag_off.png" alt="shoppingbag" /></a>
<?php } ?>
	    </li>
            <li class="m2">
<?php if($_SERVER["SCRIPT_NAME"] == '/member/reservation.php'){ ?>
               <a href="/member/reservation.php?goods=<?php echo (int)$_GET['goods']?>&aj=1" data-ajaxdata="/inc/ajax_reservation.php?goods=<?php echo (int)$_GET['goods']?>" ><img src="/images/header/ico_counseling_off.png" alt="예약상담신청" /></a>
<?php }else{ ?>
               <a href="/member/reservation.php?goods=<?php echo (int)$_GET['goods']?>&aj=1" data-ajaxdata="/inc/ajax_reservation.php?goods=<?php echo (int)$_GET['goods']?>" onclick="fixedLayerPopup(this,true); return false;"><img src="/images/header/ico_counseling_off.png" alt="예약상담신청" /></a>
<?php } ?>
	    </li>
            <li class="m3">
<?php if($_SERVER["SCRIPT_NAME"] == '/search/quicksearch.php'){ ?>
               <a href="/search/quicksearch.php" data-ajaxdata="/search/ajax_quicksearch.php" ><img src="/images/header/ico_quickSearch_off.png" alt="퀵서치" /></a>
<?php }else if($pageNum == 4){ ?>
               <a href="/search/quicksearch_gallery.php" data-ajaxdata="/search/ajax_quicksearch_gallery.php" onclick="fixedLayerPopup(this,true); return false;"><img src="/images/header/ico_quickSearch_off.png" alt="퀵서치" /></a>
<?php }else{ ?>
               <a href="/search/quicksearch.php" data-ajaxdata="/search/ajax_quicksearch.php" onclick="fixedLayerPopup(this,true); return false;"><img src="/images/header/ico_quickSearch_off.png" alt="퀵서치" /></a>
<?php } ?>
               <!-- a href="/search/quicksearch.php" data-ajaxdata="/search/ajax_quicksearch.php" onclick="fixedLayerPopup(this,true); return false;"><img src="/images/header/ico_quickSearch_off.png" alt="퀵서치" /></a -->
            </li>
         </ul>
      </nav>
      <!--utill-->
      <!-- <button class="btn_menu mobile allMenu"><img src="/images/header/ico_lm_menu_off.png" alt="menu" /></button> -->
   </div>
   <!--header_inner-->
   <div class="mobileQmenu">
      <div class="inner">
         <ul>
            <li><a href="/art1/artist_rec.php"><span>art1</span></a></li>
            <li><a href="/news/index.php?at=main"><span>news</span></a></li>
            <li><a href="/marketPlace/index.php"><span>market</span></a></li>
            <li><a href="/galleries/"><span>galleries</span></a></li>
            <li class="new"><a href="/articovery/"><span>articovery</span></a></li>
         </ul>
      </div>
   </div>
   <!-- <button class="btn_menu pc allMenu"><img src="/images/header/ico_lm_menu_off.png" alt="menu" /></button> -->
</header>
<!--header-->
<script>
   $("#header .header_inner .utill > ul > li").on("mouseenter mouseleave" , function(e){
   	if(!$(this).hasClass("on")){
   		if(!$(this).find(">a").hasClass("on") && !$(this).find(">a").hasClass("txt") ){
   			if(e.type == "mouseenter"){
   				$(this).find("img").imgConversion(true);
   			}else{
   				$(this).find("img").imgConversion(false);
   			}
   		}
   	}
   });




   	// 임시 로그인 시스템
   	$("#header .header_inner .utill > ul > li.logout > a").on("click",function(e){
   		e.preventDefault();
   		e.stopPropagation();
   		var id = $($(this).attr("href"));
   		var b = id.css("display") == "none";
   		if (b){
   			id.addClass("on").fadeIn(300);
   			$("html").off().on("mousedown",function(event){
                 if(event.which == 1){
                    id.removeClass("on").fadeOut(300);
                    }
                 });
   		}else{
   			id.removeClass("on").fadeOut(300);
   		};


   	});

</script>
<section id="allMenu">
<?php
require(ROOT.'lib/class/bookmark/bookmark.class.php');

$BookMark = new BookMark();
$aAllMenu = $BookMark->getAllMenu($dbh);
$aBookMarkList = $BookMark->getBookMarkList($dbh);
$BookMark = null;
unset($BookMark);

//print_r($aBookMarkList);

$bmIdx = array('');

$zz = 0;
foreach($aBookMarkList as $tmp) {
	$bmIdx[$zz] = $tmp['bm_idx'];
	++$zz;
}
?>
   <!-- allMenu -->
   <h2 class="blind">전체메뉴</h2>
   <div class="allMenu_inner">
      <div class="allMenu_scroll">
            <div class="allMenu_tab">
               <ul>
                  <li>
                     <a href="#allMenuLst">
                     <span class="ico"><img src="/images/header/ico_allmenu_off.png" alt=""></span>
                     <span>전체메뉴</span>
                     </a>
                  </li>
                  <li>
                     <a href="#bookMarkLst">
                     <span class="ico"><img src="/images/header/ico_heart_off.png" alt=""></span>
                     <span>즐겨찾기</span>
                     </a>
                  </li>
               </ul>
               <!-- span class="arr"><img src="/images/allMenu/bg_arr3.gif" alt=""></span -->
            </div>
      <!-- //allMenu_tab -->
            <div id="allMenuLst">
               <div class="lnbScrollBox">
                     <div class="inner">
                           <ul class="depth1">
                                 <li>
                                    <a href="/art1/index.php">art1</a>
                                    <div class="depth2">
                                          <ul>
                                          <?php if (is_array($aAllMenu) && count($aAllMenu) > 0): ?>
                                              <?php foreach($aAllMenu as $menu): ?>
                                                <?php if ($menu['bm_category'] === '1'): ?>
                                                <li><a href="<?php echo $menu['bm_url'];?>"><?php echo $menu['bm_menu'];?></a><button type="button" onclick="setFavorite('<?php echo $menu['bm_idx'];?>', this);"><img src="/images/header/ico_star_<?php if(in_array($menu['bm_idx'], $bmIdx)):?>on<?php else:?>off<?php endif;?>.png" alt="" /></button></li>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                           <?php endif; ?>
                                          </ul>
                                    </div>
                                 </li>
                                 <li>
                                    <a href="/news/index.php?at=main">news</a>
                                    <div class="depth2">
                                          <ul>
                                          <?php if (is_array($aAllMenu) && count($aAllMenu) > 0): ?>
                                              <?php foreach($aAllMenu as $menu): ?>
                                                <?php if ($menu['bm_category'] === '2'): ?>
                                                <li><a href="<?php echo $menu['bm_url'];?>"><?php echo $menu['bm_menu'];?></a><button type="button" onclick="setFavorite('<?php echo $menu['bm_idx'];?>', this);"><img src="/images/header/ico_star_<?php if(in_array($menu['bm_idx'], $bmIdx)):?>on<?php else:?>off<?php endif;?>.png" alt="" /></button></li>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                           <?php endif; ?>
                                          </ul>
                                    </div>
                                 </li>
                                 <li class="noDepth"><a href="/marketPlace/index.php">market</a></li>
                                 <li class="noDepth"><a href="/galleries/">galleries</a></li>
                           </ul>
                     </div>
               </div>
            </div>
            <div id="bookMarkLst">
               <ul>
               <?php if (is_array($aBookMarkList) && count($aBookMarkList) > 0): ?>
                  <?php foreach($aBookMarkList as $bm): ?>
                  <li><a href="<?php echo $bm['bm_url'];?>"><?php echo $bm['bm_menu'];?></a><button class="maker" type="button" onclick="setFavorite('<?php echo $bm['bm_idx'];?>', this);"><img src="/images/header/ico_star_on.png" alt="" /></button></li>
                  <?php endforeach; ?>
               <?php endif; ?>
               </ul>
            </div>
      </div><!--allMenu_scroll-->
   </div><!-- //inner -->
</section>
<!-- allMenu -->


<script type="text/javascript">
var bidx = 0;
$(function(){
	 /*
	 $("#allMenu #bookMarkLst > ul > li button,#allMenu #allMenuLst .lnbScrollBox .inner > ul > li .depth2 ul li button").on("click",function(){
		   if($(this).hasClass("maker")){
			   alert("1");
			  $(this).removeClass("maker").find(">img").imgConversion(false);
			  //$('#bookMarkLst>ul>li').find(">a").parent().remove();
				//console.log("1");
			   //setBookMark('delete');
		   }else{
			  alert("2");
			  $(this).addClass("maker").find(">img").imgConversion(true);
			  $(this).parent().clone().appendTo('#bookMarkLst>ul');

			  //console.log("2");
			 //setBookMark('update');
		   }//if
		});
	 $(".lnbScrollBox .inner > ul > li").each(function(){
		   if($(this).find(".depth2").length  == 0 ){
			  $(this).addClass("noDepth");
		   }
	 });
	 */

	$(".lnbScrollBox .inner > ul > li > a").click(function(){
		   var b = $(this).siblings(".depth2").length > 0;
		   if(b){
				 if ($(this).parent().find(".depth2").css("display") == "none")
					{
					   $(this).parent().addClass("on").find(".depth2").slideDown(300,function(){sideIscroll();});
					   $(this).parent().siblings("li").removeClass("on").find(".depth2").slideUp(300,function(){sideIscroll();});
					}else{
					   $(this).parent().removeClass("on").find(".depth2").slideUp(300,function(){sideIscroll();});
					}

			  return false;
		   }else{

		   }
	});

});



function setFavorite(idx, t) {
	<?php if ($_SESSION['user_idx']):?>
	bidx = idx;

	if($(t).hasClass("maker")){
		//alert("1");
		//alert($(t).parent().text());

		var id = $('#bookMarkLst>ul>li').index($("#bookMarkLst>ul>li:contains("+ $(t).parent().text() +")"));
		//var id = $('#bookMarkLst>ul>li').index($("#bookMarkLst>ul>li:contains('Trend')"));
		//alert(id);

		$(t).removeClass("maker").find(">img").imgConversion(false);
		$('#bookMarkLst>ul>li').eq($('#bookMarkLst>ul>li').index($("#bookMarkLst>ul>li:contains("+ $(t).parent().text() +")"))).remove();
		//$('#bookMarkLst>ul>li').eq($('#bookMarkLst>ul>li').index($("#bookMarkLst>ul>li:contains('Trend')"))).remove();

		$("#allMenuLst .lnbScrollBox .inner > ul > li .depth2 ul li button").eq($("#allMenuLst .lnbScrollBox .inner > ul > li .depth2 ul li").index($("#allMenuLst .lnbScrollBox .inner > ul > li .depth2 ul li:contains("+ $(t).parent().text() +")"))).removeClass("maker").find(">img").imgConversion(false);;

		//$('#bookMarkLst>ul>li').find(">a").parent().remove();
		//$('#bookMarkLst>ul>li').contains($(t).parent().text()).remove();
		//console.log("1");

		setBookMark('delete');
	}else{
		//alert("2");
		//alert($(t).parent().text());
		$(t).addClass("maker").find(">img").imgConversion(true);
		$(t).parent().clone().appendTo('#bookMarkLst>ul');
		setBookMark('update');
		//console.log("2");
	}
	<?php else:?>
	alert("회원만 사용할 수 있습니다.");
	return false;
	<?php endif;?>
}


function setBookMark(at) {
	<?php if ($_SESSION['user_idx']):?>
	$.ajax({
		type:"POST",
		url:"/bookmark/index.php",
		dataType:"json",
		data:{"idx":bidx, "at":at},
		success:function(data) {
			if (data.cnt > 0) {
			}
			else {
			}
		},
		error:function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
	<?php else:?>
	alert("회원만 사용할 수 있습니다.");
	return false;
	<?php endif;?>
}
</script>
