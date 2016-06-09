<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/market/goods.class.php');
include(ROOT.'inc/config.php');

$goods_idx = isset($_GET['goods']) ? Xss::chkXSS($_GET['goods']) : null;
if (is_null($goods_idx) || !is_numeric($goods_idx)) exit;

$categoriName = 'Market';
$pageName = 'Market';
$pageNum = '3';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

$Goods = new Goods();
$Goods->setAttr('goods_idx', $goods_idx);
$Goods->getEdit($dbh);
$imgList = $Goods->getFileInfo($dbh, $goods_idx);
$relationImgList = $Goods->getRelationGoodsImg($dbh);

include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>
  <section id="container_sub">
    <div class="container_inner">
      <?php include(ROOT.'inc/path.php'); ?>
      <form name="goodsFrm" id="goodsFrm" method="post" action="/basket/index.php" onsubmit="return false;">
      <input type="hidden" name="at" value="update">
      <input type="hidden" name="ord" id="ord">
      <input type="hidden" name="goods" id="goods" value="<?php echo $goods_idx;?>">
      <input type="hidden" name="order_cnt" value="1">
      <section id="marketView1" class="clearfix">
          <div class="item">
          <?php if (is_array($imgList)): ?>
            <?php foreach($imgList as $row): ?>
            <img src="<?php echo goodsBigImgUploadPath, $row['goods_img'];?>" alt="">
            <?php endforeach;?>
          <?php endif; ?>
          </div>
          <article class="cont">
            <h1><?php echo $Goods->attr['goods_name'];?></h1>
            <p class="money"><?php echo number_format($Goods->attr['goods_sell_price']);?> 원</p>
			<?php if ($_SESSION['logged_in'] === 1): ?>
            <div class="btns">
              <button type="button" class="btnPack ov-g" id="btnBasket"><span>장바구니 담기</span></button>
              <button type="button" class="btnPack ov-g" id="btnWishlist"><span>WISHLIST</span></button>

			  <div class="layerPopupT1 cart" style="display:none;">
				<div class="inner">
					<h3 class="tit">ADD TO CART</h3>
					<p class="txt">선택하신 작품을 장바구니에 담았습니다.</p>
					<p class="cart_btn"><button class="close">계속 쇼핑하기</button> &nbsp; <a class="cart" href="/basket/index.php">장바구니 보러가기</a></p>
				</div>
				<div class="close_pos"><button class="close"><img src="/images/market/ico_market_close1.gif" alt="닫기" /></button></div>
			 </div>

            </div>
			<?php endif; ?>
            <div class="sns">
              <div class="inner">
                <a href="javascript:;" onclick="shareFaceBook();" class="sns1"><img src="/images/ico/ico_sns1.gif" alt="페이스북"></a>
                <a href="javascript:;" onclick="sharePinterest();" class="sns2"><img src="/images/ico/ico_sns2.gif" alt="핀터레스트"></a>
                <a href="#" class="sns3"><img src="/images/ico/ico_sns3.gif" alt="인스타그램"></a>
                <a href="#" class="sns4"><img src="/images/ico/ico_sns4.gif" alt="픽터파이"></a>
              </div>
            </div>
            <div class="guide">
                  <h2 class="htype2"><button>작품상세</button></h2>
                  <div class="accordionBox">
                      <p class="t"><?php echo nl2br(strip_tags($Goods->attr['goods_description']));?></p>
                  </div><!-- //accordionBox -->
                  <h2 class="htype2"><button>상품상세정보</button></h2>
                  <div class="accordionBox">
                      <p class="t">- 사이즈 : <?php echo $Goods->attr['goods_width'];?> X <?php echo $Goods->attr['goods_depth'];?> X <?php echo $Goods->attr['goods_height'];?><br /> - 재료 : <?php echo $Goods->attr['goods_material'];?></p>
                  </div><!-- //accordionBox -->
                  <h2 class="htype2"><button>교환/환불/반품안내</button></h2>
                  <div class="accordionBox">
                      <p class="t">HONG’S ECO BAG – 에코백은 이민아 작가의 작품으로 사용하기에 편리하면서 환경을 생각한 디자인과 재료로 제작되었습니다.</p>
                  </div><!-- //accordionBox -->
            </div>
            <div class="ectProduct">
                <h2>관련상품</h2>
                <ul class="items">
<?php
if (is_array($relationImgList)) {
	foreach($relationImgList as $row) {
		if ($goods_idx != $row['goods_idx']) {
?>
                  <li><a href="javascript:;" onclick="getView('<?php echo $row['goods_idx'];?>')"><img src="<?php echo goodsListImgUploadPath, $row['goods_list_img'];?>" alt=""></a></li>
<?php
		}
	}
}
?>
                </ul>
            </div>
          </article>
      </section>
      </form>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
<?php echo ACTION_IFRAME; ?>

<script>
$(".guide .htype2 > button").on("click",function(){
	var t = $(this).parent();

	if(!t.hasClass("on")){
		$(".guide .htype2.on").removeClass("on").next().slideUp(300);
		t.addClass("on").next().slideDown(300);
	}else{
		t.removeClass("on").next().slideUp(300);
	}
});

function getView(goods) {
	location.href= "?goods="+goods;
}

function shareFaceBook() {
	var url = "http://www.facebook.com/sharer.php?u=<?php echo SHARE_URL;?>?goods=<?php echo $goods_idx?>";
	window.open(url, '', '');
}

function sharePinterest() {
	var coverImage = '';
	var desc = '';
	var url = "http://pinterest.com/pin/create/button/?url=<?php echo SHARE_URL;?>?goods=<?php echo $goods_idx?>&media=" + coverImage + "&description=" + desc;
	window.open(url, '', '');
}

function order(ord) {
	$("#ord").val(ord);
	document.goodsFrm.target = "action_ifrm";
	document.goodsFrm.submit();
}

function wish() {
	$.ajax({
		type:"POST",
		url:"/basket/index.php",
		dataType:"json",
		data:{"idx":$("#goods").val(), "at":"wish"},
		success:function(data) {
			if (data.cnt > 0) {
				alert("WISH LIST 에 등록되었습니다.")
			}
			else {
				alert("이미 WISH LIST 에 존재합니다.");
			}
		},
		error:function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
	//$("#ord").val(ord);
	//document.goodsFrm.at.value = "wish";
	//document.goodsFrm.target = "action_ifrm";
	//document.goodsFrm.submit();
}

function cartLayer(qty) {
	if ($(".layerPopupT1.cart").css("display") == "none"){
		$(".layerPopupT1").fadeOut();
		$(".layerPopupT1.cart").fadeIn();
	}
	else{
			$(".layerPopupT1.cart").fadeOut();
	}

	$(".totalNum>span").text(qty);
}

$(function(){
	$("#btnBasket").bind("click", function(){order("basket");});
	$("#btnWishlist").bind("click", function(){wish();});
});
</script>
<?php
include(ROOT.'inc/footer.php');
include(ROOT.'inc/bot.php');

$dbh = null;
$relationImgList = null;
$imgList = null;
$Goods = null;
unset($dbh);
unset($relationImgList);
unset($imgList);
unset($Goods);
