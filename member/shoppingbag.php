<?php
include('../inc/config.php');

$categoriName = 'Membership';
$pageName = 'Sho';
$pageNum = '5';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

include('../inc/link.php');
include('../inc/top.php');
include('../inc/header.php');
include('../inc/spot_sub.php');
?>
  <section id="container_sub">
    <div class="container_inner">
      <?php include('../inc/path.php'); ?>
         <div class="shoppingPage">
		 <?php
		 	$login_no_ajax = true ; //로그인 페이지를 ajax 가 아닌 로직으로 호출할때 구분할 수 있도록 변수 지정  //ajax_login.php 에서 사용
		 	include('../inc/ajax_shopping.php');
		 ?>
		</div>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <script type="text/javascript">
     var shopping_owl = $("#headerArea #shoppingArea .shopping_list .inner ul");
                                    shopping_owl.owlCarousel({
                                          items : 4,
                                          itemsDesktop : [1000,5], //5 items between 1000px and 901px
                                          itemsDesktopSmall : [900,3], // betweem 900px and 601px
                                          itemsTablet: [600,3], //2 items between 600 and 0
                                          itemsMobile: [460,2], //2 items between 600 and 0
                                    });

                                    $("#shoppingArea .shopping_list > button.next").off().on("click",function(){
                                      shopping_owl.trigger('owl.next');
                                    })
                                    $("#shoppingArea .shopping_list > button.prev").off().on("click",function(){
                                      shopping_owl.trigger('owl.prev');
                                    })

  </script>
<?php
include('../inc/footer.php');
include('../inc/bot.php');
?>