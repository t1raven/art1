

<header id="header" <? if ($pageNum == "0"){?> class="h_main"<?} else {?> class="h_sub" <? } ?>>
   <div class="header_inner">
      <h1>
         <a href="/"><img src="/images/header/logo.jpg" alt="Fulfil your art life ART hongs" /></a>
      </h1>
      <nav id="lnb"  <? if ($pageNum == "0"){?> class="h_main"<?} else {?> class="h_sub" <? } ?>>
         <ul>
            <li class="m1">
               <a href="/art1/index.php"><span class="en">art 1</span><span class="kr">아트1</span></a></li>
            <!-- li class="m2"><a href="/news/index.php">NEWS</a></li -->
            <li class="m2"><a href="/news/index.php?at=main"><span class="en">news</span><span class="kr">뉴스</span></a></li>
            <li class="m3"><a href="/marketPlace/index.php"><span class="en">market</span><span class="kr">마켓</span></a></li>
            <!-- <li class="m4"><a href="/sponsorship/index.php">SPONSORSHIP</a></li> -->
         </ul>
      </nav>
      <!--gnb-->
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
               <a href="#lst_myart" class="txt">My art 1</a>
               <div id="lst_myart" class="lst_myart">
                  <ul>
                     <li><a href="/member/dashboard">마이페이지</a></li>
                     <!-- li><a href="/member/modify.php">기본정보수정</a></li -->
                     <li><a href="/member/modify/?at=write">기본정보수정</a></li>
                     <!-- li><a href="/member/qna.php">상담내역</a></li -->
                     <li><a href="/member/advice">상담내역</a></li>
                     <li><a href="/member/address">주소록 관리</a></li>
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
            <li>
               <div class="totalNum"><span><?php echo $basketCnt?></span></div>
<?php if($_SERVER["SCRIPT_NAME"] == '/member/shoppingbag.php'){ ?>
               <a href="/member/shoppingbag.php" data-ajaxdata="/inc/ajax_shopping.php" ><img src="/images/header/ico_shoppingbag_off.png" alt="shoppingbag" /></a>
<?php }else{ ?>
               <a href="/member/shoppingbag.php" data-ajaxdata="/inc/ajax_shopping.php" onclick="fixedLayerPopup(this,true); return false;"><img src="/images/header/ico_shoppingbag_off.png" alt="shoppingbag" /></a>
<?php } ?>
			</li>
            <li>
<?php if($_SERVER["SCRIPT_NAME"] == '/member/reservation.php'){ ?>
               <a href="/member/reservation.php?goods=<?php echo (int)$_GET['goods']?>&aj=1" data-ajaxdata="/inc/ajax_reservation.php?goods=<?php echo (int)$_GET['goods']?>" ><img src="/images/header/ico_counseling_off.png" alt="예약상담신청" /></a>
<?php }else{ ?>
               <a href="/member/reservation.php?goods=<?php echo (int)$_GET['goods']?>&aj=1" data-ajaxdata="/inc/ajax_reservation.php?goods=<?php echo (int)$_GET['goods']?>" onclick="fixedLayerPopup(this,true); return false;"><img src="/images/header/ico_counseling_off.png" alt="예약상담신청" /></a>
<?php } ?>
			</li>
            <li>
<?php if($_SERVER["SCRIPT_NAME"] == '/search/quicksearch.php'){ ?>
               <a href="/search/quicksearch.php" data-ajaxdata="/search/ajax_quicksearch.php" ><img src="/images/header/ico_quickSearch_off.png" alt="퀵서치" /></a>
<?php }else{ ?>
               <a href="/search/quicksearch.php" data-ajaxdata="/search/ajax_quicksearch.php" onclick="fixedLayerPopup(this,true); return false;"><img src="/images/header/ico_quickSearch_off.png" alt="퀵서치" /></a>
<?php } ?>
               <!-- a href="/search/quicksearch.php" data-ajaxdata="/search/ajax_quicksearch.php" onclick="fixedLayerPopup(this,true); return false;"><img src="/images/header/ico_quickSearch_off.png" alt="퀵서치" /></a -->
            </li>
         </ul>
      </nav>
      <!--utill-->
      <button class="btn_menu mobile allMenu"><img src="/images/header/ico_lm_menu_off.png" alt="menu" /></button>
   </div>
   <!--header_inner-->
   <button class="btn_menu pc allMenu"><img src="/images/header/ico_lm_menu_off.png" alt="menu" /></button>
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
   <!-- allMenu -->
   <h2 class="blind">전체메뉴</h2>
   <div class="allMenu_inner">
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
                                          <li><a href="/art1/index.php">Exhibition</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                          <li><a href="/art1/promotion.php">Promotion</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                          <li><a href="/art1/award.php">Award</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                          <li><a href="/art1/about_us.php">About</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                          <li><a href="/art1/contact.php">Contact</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                    </ul>
                              </div>
                           </li>
                           <li>
                              <a href="/news/index.php?at=main">news</a>
                              <div class="depth2">
                                    <ul>
                                        <li><a href="/news/index.php?at=main">Main</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                          <li><a href="/news/index.php?at=list&subm=2">In brief</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                          <li><a href="/news/index.php?at=list&subm=3">Trend</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                          <li><a href="/news/index.php?at=list&subm=4">People</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                          <li><a href="/news/index.php?at=list&subm=14">World</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                          <li><a href="/news/index.php?at=list&subm=5">Trouble</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                          <li><a href="/news/index.php?at=list&subm=6">Episode</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                          <li><a href="/news/index7.php">Community</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
                                    </ul>
                              </div>
                           </li>
                           <li><a href="/marketPlace/index.php">market</a></li>
                     </ul>
               </div>
         </div>
      </div>
      <div id="bookMarkLst">
         <ul>
            <li><a href="/reservation_services/realtime.jsp">Exhibition</a><button class="maker"><img src="/images/header/ico_star_on.png" alt="" /></button></li>
            <li><a href="/reservation_services/weekend.jsp">Promotion</a><button class="maker"><img src="/images/header/ico_star_on.png" alt="" /></button></li>
            <li><a href="/reservation_services/waiting.jsp">Award</a><button class="maker"><img src="/images/header/ico_star_on.png" alt="" /></button></li>
            <li><a href="/reservation_services/grouproom.jsp">Contact</a><button class="maker"><img src="/images/header/ico_star_on.png" alt="" /></button></li>
            <li><a href="/news/index.php?at=main">Main</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
            <li><a href="/news/index.php?at=list&subm=2">In brief</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
            <li><a href="/news/index.php?at=list&subm=3">Trend</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
            <li><a href="/news/index.php?at=list&subm=4">People</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
            <li><a href="/news/index.php?at=list&subm=14">World</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
            <li><a href="/news/index.php?at=list&subm=5">Trouble</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
            <li><a href="/news/index.php?at=list&subm=6">Episode</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
            <li><a href="/news/index7.php">Community</a> <button><img src="/images/header/ico_star_off.png" alt="" /></button></li>
         </ul>
      </div>
   </div>
   <!-- //inner -->
</section>
<!-- allMenu -->

<script type="text/javascript">

	$(function(){
                     $("#allMenu #bookMarkLst > ul > li button,#allMenu #allMenuLst .lnbScrollBox .inner > ul > li .depth2 ul li button").on("click",function(){

                           if($(this).hasClass("maker")){
                              $(this).removeClass("maker").find(">img").imgConversion(false);
                           }else{
                              $(this).addClass("maker").find(">img").imgConversion(true);
                           }//if

                        });

                     $(".lnbScrollBox .inner > ul > li").each(function(){
                           if($(this).find(".depth2").length  == 0 ){
                              $(this).addClass("noDepth");
                           }
                     });
		$(".lnbScrollBox .inner > ul > li > a").click(function(){
		       var b = $(this).siblings(".depth2").length > 0;
                           if(b){
                                 if ($(this).parent().find(".depth2").css("display") == "none")
                                    {
                                       $(this).parent().addClass("on").find(".depth2").slideDown("slow");
                                       $(this).parent().siblings("li").removeClass("on").find(".depth2").slideUp("slow");
                                    }else{
                                       $(this).parent().find(".depth2").slideUp("slow");
                                    }


                              return false;
                           }else{


                           }






		});
	});
</script>


