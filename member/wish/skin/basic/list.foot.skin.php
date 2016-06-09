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
            </div><!-- dashSubArea -->
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
<form name="goodsFrm2" id="goodsFrm2" method="post" action="/basket/index.php" onsubmit="return false;">
<input type="hidden" name="at" value="update">
<input type="hidden" name="ord" id="ord" value="basket">
<input type="hidden" name="goods" id="goods">
<input type="hidden" name="order_cnt" value="1">
</form>
<?php //echo ACTION_IFRAME; ?>
<script>
$(".lst_horizontal >ul >  li").on("mouseenter mouseleave",function(e){
	if(e.type =="mouseenter"){
	  $(this).find(".delet").stop().animate({"right":0},300);
	}else{
	  $(this).find(".delet").stop().animate({"right":-50},300);
	}
})
tabTransformation(5,"c");

function deleteWish(id) {
	if (confirm("정말 삭제하시겠습니까?")) {
		$.ajax({
			type: "POST",
			url: "index.php",
			dataType:"json",
			data:{idx:id, at:"delete"},
			success:function(data) {
				if (data.cnt > 0) {
					location.reload();
				}
				else {
					alert("삭제를 실패했습니다.");
				}
			},
			error:function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			}
		});
	}
}

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

function order(idx) {
	$("#goods").val(idx);
	document.goodsFrm2.target = "action_ifrm";
	document.goodsFrm2.submit();
}

function rental(idx) {
	location.href = "/marketPlace/rental/index.php?goods="+idx;
}
</script>
<?php
include(ROOT.'inc/footer.php');
include(ROOT.'inc/bot.php');
?>