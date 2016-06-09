<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once(ROOT.'lib/class/market/basket.class.php');

$totalQty = 0;
$totalAccount = 0;
$Basket = new Basket();
$list = $Basket->getList($dbh);
//echo print_r($list);

?>
<section id="headerArea">
	<div class="inner">
		<div id="shoppingArea">
			<h3 class="tit">장바구니</h3>
			<?php if (is_array($list) && count($list)):?>
			<p class="ea"><span><?php echo $basketCnt;?></span>개의 작품이 담겨 있습니다.</p>
			<section id="shopping_list_id" class="shopping_list">
				<button class="prev"><img src="/images/header/btn_movPrev.gif" alt="이전"></button>
				<button class="next"><img src="/images/header/btn_movNext.gif" alt="다음"></button>
				<div class="inner">
					<ul class="lst">
					<?php
						foreach($list as $row):
							$sumEachGoodsPrice = (int)$row['goods_sell_price'] * (int)$row['qty'];
							$totalQty = $totalQty + (int)$row['qty'];
							$totalAccount = $totalAccount + $sumEachGoodsPrice;
					?>
						<li>
							<div class="img">
                                <?php if ($row['goods_cnt'] === '0'):?>
                                    <p class="circle"><img src="/images/ico/ico_red_circle.png" alt="판매불가"></p>
                                <?php else: ?>
                                    <?php if ($row['is_rental'] === 'Y'): ?>
                                        <p class="circle"><img src="/images/ico/ico_blue_circle.png" alt="렌탈불가"></p>
                                    <?php endif; ?>
                                <?php endif; ?>
								<a href="#" onclick="goods='<?php echo $row['goods_idx']; ?>'; marketViewMotion(this,'shopping'); return false;"> <img src="<?php echo goodsListImgUploadPath, $row['goods_list_img'];?>" class="" alt=""></a>
								<div class="delete"><button type="button" onclick="topDeleteGoods('<?php echo $row['goods_idx'];?>', this);"><img src="/images/header/btn_delete.gif" alt="" /></button></div>
							</div>
							<div class="cont">
								<p class="write"><?php echo $row['artist_name'];?></p>
							<div class="txt">
								<strong><?php echo $row['goods_name'];?></strong>
								<p>\ <?php echo number_format($sumEachGoodsPrice);?></p>
							</div>
							</div>
						</li>
						<?php endforeach;?>
					</ul>
				</div>
			</section>
			<div class="priceBox">
				<p>구매 총액 <span> \ <?php echo number_format($totalAccount); ?></span></p>
			</div>
			<div class="btn"><a href="/basket">결제하기</a></div>
			<?php else: ?>
			<div style="text-align:center;">장바구니가 비어있습니다.</div>
			<?php endif; ?>
			<div class="close"><button onclick="fixedPopupClose();"><img src="/images/header/btn_close.gif" alt="닫기" /></button></div>
		</div>
	</div>
</section>

<script>
function topDeleteGoods(id, obj) {
	if (confirm("정말 삭제하시겠습니까?")) {
		$.ajax({
			type: "POST",
			url: "/basket/index.php",
			dataType:"json",
			data:{idx:id, at:"delete"},
			success:function(data) {
				if (data.cnt > 0) {
					var amount = " \\ " + data.amount;

					//location.reload();
					//$("#headerArea").remove();
					//$("#fixedPopupArea").load('/inc/ajax_shopping.php');
					//rollngBasketbanner1();
					//$(".totalNum>span").text();
					$(obj).parent().parent().parent().remove();
					$("#shoppingArea > p > span").text(data.basketcnt);
					$(".priceBox > p > span").text(amount);
					$(".totalNum").text(data.basketcnt);
					//console.log($(this));
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
$(".totalNum>span").text("<?php echo $totalQty;?>");

</script>
<?php
$Basket = null;
$list = null;
$dbh = null;

unset($Basket);
unset($list);
unset($dbh);
?>