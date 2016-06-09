<?php if (!defined('OKTOMATO')) exit;?>
              </ul>
            </div>
            <div class="layerPopupT1 cart">
              <div class="inner">
                <h3 class="tit">ADD TO CART</h3>
                <p class="txt">선택하신 작품을 장바구니에 담았습니다.</p>
                <p class="cart_btn"><button class="close">계속 쇼핑하기</button> &nbsp; <a class="cart" href="/basket/index.php">장바구니 보러가기</a></p>
              </div>
              <div class="close_pos"><button class="close"><img src="/images/market/ico_market_close1.gif" alt="닫기" /></button></div>
            </div>
         </section><!-- //wishListArea -->

    </div><!-- //container_inner -->
  </section><!-- //container_sub -->


<!--<form name="goodsFrm" id="goodsFrm" method="post" action="/basket/index.php" onsubmit="return false;">
<input type="hidden" name="at" value="update">
<input type="hidden" name="ord" id="ord" value="basket">
<input type="hidden" name="goods" id="goods">
<input type="hidden" name="order_cnt" value="1">
</form-->
<?php //echo ACTION_IFRAME; ?>
<script src="/js/jquery.dotdotdot.min.js"></script>
<script>
$(function(){
/*
	$(".layerOpen.cart").click(function(){

		if ($(".layerPopupT1.cart").css("display") == "none"){
			//$(".layerPopupT1").fadeOut();
			$(".layerPopupT1.cart").css({
				"z-index":90,
				"top":$(window).scrollTop() + 100
			}).fadeIn();
			var backgound = $("<div>").attr({
		         "id": "cover"
		       }).css({
		         "height": $("body").outerHeight()
		       })
		      $("body").append(backgound);
		}

		$(".layerPopupT1.cart .close , #cover").on("click",function(){
			$("#cover").remove();
			$(".layerPopupT1.cart").css("z-index",10).fadeOut();
			$(".layerPopupT1 .close , #cover").off();
		})


	});
*/
});

/*
function cartLayer(qty) {
	if ($(".layerPopupT1.cart").css("display") == "none"){
		//$(".layerPopupT1").fadeOut();
		$(".layerPopupT1.cart").css({
			"z-index":90,
			"top":$(window).scrollTop() + 100
		}).fadeIn();
		var backgound = $("<div>").attr({
			"id": "cover"
			}).css({
			"height": $("body").outerHeight()
			})
		$("body").append(backgound);
	}

	$(".layerPopupT1.cart .close , #cover").on("click",function(){
		$("#cover").remove();
		$(".layerPopupT1.cart").css("z-index",10).fadeOut();
		$(".layerPopupT1 .close , #cover").off();
	})

	$(".totalNum>span").text(qty);
}

var mainTimeOutSet;
iCutter(".lst_horizontal.style4 .photo");
dotWindow(".lst_horizontal.style4 .cont .t2" , "window");

$(window).resize(function(){
	clearInterval(mainTimeOutSet);
	mainTimeOutSet = setTimeout(function(){
		iCutterLoadNone(".lst_horizontal.style4 .photo");
		dotWindow(".lst_horizontal.style4 .cont .t2" , "window");
	},1000);
})

function order(idx) {
	$("#goods").val(idx);
	document.goodsFrm.target = "action_ifrm";
	document.goodsFrm.submit();
}

function rental(idx) {
	location.href = "/marketPlace/rental/index.php?goods="+idx;
}
*/
</script>
<?
include(ROOT.'inc/footer.php');
include(ROOT.'inc/bot.php');
?>