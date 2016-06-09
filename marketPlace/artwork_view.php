<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/market/work.class.php');
require(ROOT.'lib/class/market/artist.class.php');
include(ROOT.'inc/config.php');

$goods_idx = isset($_GET['goods']) ? Xss::chkXSS($_GET['goods']) : null;

$back_page = isset($_GET['back_page']) ? (int)$_GET['back_page'] : null; ; //view page 에서 목록(뒤로)으로를 눌렀을때 처리를 위한 page 변수
$isto = isset($_GET['isto']) ? 'isto'.(int)$_GET['isto'] : null; ; //view page 에서 목록(뒤로)으로를 눌렀을때 해당 섹션으로 찾아가기 위한 변수
$at_tmp = isset($_GET['at_tmp']) ? Xss::chkXSS($_GET['at_tmp']) : null; //view page 에서 목록(뒤로)으로를 눌렀을때 해당 메뉴로 찾아가기 위한 변수

if (is_null($goods_idx) || !is_numeric($goods_idx)) exit;

$categoriName = 'MARKET';
$pageName = 'MARKET';
$pageNum = '3';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

$Work = new Work();
$Work->setAttr('goods_idx', $goods_idx);
$Work->getEdit($dbh);
$imgList = $Work->getFileInfo($dbh, $goods_idx);
$relationImgList = $Work->getRelationWorkImg($dbh);
$recommendList = $Work->getRadomArtWork($dbh);

$Artist = new Artist();
$Artist->setAttr('artist_idx', $Work->attr['artist_idx']);
$Artist->getEdit($dbh);

$aEducationYear = explode('§', $Artist->attr['education_year']);
$aEducationName = explode('§', $Artist->attr['education_name']);
$aAwardYear = explode('§', $Artist->attr['award_year']);
$aAwardName = explode('§', $Artist->attr['award_name']);
$aPrivateYear = explode('§', $Artist->attr['private_year']);
$aPrivateName = explode('§', $Artist->attr['private_name']);
$aTeamYear = explode('§', $Artist->attr['team_year']);
$aTeamName = explode('§', $Artist->attr['team_name']);
$aAnnualArtworkYear = explode('§', $Artist->attr['annual_artwork_year']);
$aAnnualArtworkQty = explode('§', $Artist->attr['annual_artwork_cnt']);
$aEducationYearCnt = count($aEducationYear) - 1;
$aAwardYearCnt = count($aAwardYear) - 1;
$aPrivateYearCnt = count($aPrivateYear) - 1;
$aTeamYearCnt = count($aTeamYear) - 1;
$aAnnualArtworkCnt = count($aAnnualArtworkYear) - 1;
$aAnnualArtworkQtyMax = max($aAnnualArtworkQty);

$width = !empty($Work->attr['goods_width']) ? $Work->attr['goods_width'] : null;
$depth = !empty($Work->attr['goods_depth']) ? $Work->attr['goods_depth'] : null;
$height = !empty($Work->attr['goods_height']) ? $Work->attr['goods_height'] : null;

		//2015-03-13 이용태 수정 소숫점 .0 을 없앤다.
		$width =  !empty($width) ? str_replace('.0','',$width) : null; //str_replace("-","",$loss_hp)
		$height =  !empty($height) ? str_replace('.0','',$height)  : null;
		$depth =  !empty($depth) ? str_replace('.0','',$depth)  : null;

if (!empty($width)) {
	$artWorkSize .= $width;
}

if (!empty($depth)) {
	$artWorkSize .= 'x'.$depth;
}

if (!empty($height)) {
	if ((int)$height > 0) {
		$artWorkSize .= 'x'.$height.'cm';
	}
	else {
		$artWorkSize .= 'cm';
	}
}
else {
	$artWorkSize .= 'cm';
}

include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>

<script>
$(function(){
$("#quickBtn .back").css("display","inline");
/*
    var  isto = "<?=$isto?>";
  if(isto != ""){

  }else{
     $("#quickBtn .back").css("display","none");
  }*/
})


</script>
  <div class="blackBg"></div>
  <div id="zoomBg" style="display:none">
	<div class="photo">
		<div class="inner">
			<span><img src="<?php echo goodsBigImgUploadPath, $imgList[0]['goods_img'];?>" alt="" /></span>
		</div>
	</div>
	<div class="artSlide">
		<button class="up"><img src="/images/market/btn_slideup.jpg" alt="위로"></button>
		<button class="down"><img src="/images/market/btn_slidedown.jpg" alt="아래로"></button>
		<ul class="list">
		  <?php if (is_array($imgList)): $i = 0; ?>
			<?php foreach($imgList as $row): ?>
			<li><?php if ($i === 0): ?><span class="on"></span><?php endif; ?><a href="#" data-img="<?php echo goodsBigImgUploadPath, $row['goods_img'];?>"><img src="<?php echo goodsSmallImgUploadPath, $row['goods_img'];?>" alt="" /></a></li>
			<?php ++$i; endforeach;?>
		  <?php endif; ?>
			<!--li><span class="on"></span><a href="#" data-img="/upload/goods/middle/14212150545Z6GP4SSQK.jpg"><img src="/upload/goods/small/14212150545Z6GP4SSQK.jpg" alt="" ></a></li>
			<li><a href="#"><img src="/images/market/img_small_tmp1.jpg" alt="" /></a></li>
			<li><a href="#"><img src="/images/market/img_small_tmp2.jpg" alt="" /></a></li>
			<li><a href="#"><img src="/images/market/img_small_tmp3.jpg" alt="" /></a></li>
			<li><a href="#"><img src="/images/market/img_small_tmp1.jpg" alt="" /></a></li>
			<li><a href="#"><img src="/images/market/img_small_tmp2.jpg" alt="" /></a></li>
			<li><a href="#"><img src="/images/market/img_small_tmp3.jpg" alt="" /></a></li-->
		</ul>
	</div>
	<button class="close">Close <span><img src="/images/market/ico_market_close1.gif" alt="" /></span></button>
  </div>
  <div id="marketBg" style="display: none">
    <h3 class="h_gallery">IN GALLERY</h3>
	<div class="bg gallery"><img src="/images/market/bg_gallery.jpg" alt="" /></div>
    <h3 class="h_living">IN LIVING</h3>
	<div class="bg living"><img src="/images/market/bg_living.jpg" alt="" /></div>
    <h3 class="h_corridor">IN CORRIDOR</h3>
	<div class="bg corridor"><img src="/images/market/bg_corridor.jpg" alt="" /></div>
	<div class="btnClose"><button><img src="/images/market/btn_bg_close.png" alt="" /></button></div>
  </div>
  <section id="container_sub">
    <div class="container_inner">
      <?php include(ROOT.'inc/path.php'); ?>
      <section id="marketView1" class="clearfix">
      <form name="goodsFrm" id="goodsFrm" method="post" action="/basket/index.php" onsubmit="return false;">
      <input type="hidden" name="at" value="update">
      <input type="hidden" name="ord" id="ord">
      <input type="hidden" name="goods" id="goods" value="<?php echo $goods_idx;?>">
      <input type="hidden" name="order_cnt" value="1">
	  </form>
		<div class="marketArea content-mediaBox margin1">
			<div class="BigArea">
				<div class="img">
				<img src="<?php echo goodsMiddleImgUploadPath, $imgList[0]['goods_img'];?>" alt="" />
				<!--
						dmp:150324
						저작권 카피라이터 삽입
				-->
				<!-- p class="copy">Copyrightⓒ <span style="font-weight:bold; line-height:22px;"><?php echo $Work->attr['artist_name'];?></span> All Rights Reserved. 작품이미지의 도용 및 무단 재배포를 금지합니다.</p -->
				<p class="copy">ⓒ<?php echo $Work->attr['goods_make_year'];?>. <span style="font-weight:bold; line-height:22px;"><?php echo $Work->attr['artist_name'];?></span>. All Rights Reserved. 작품이미지의 도용 및 무단 재배포를 금지합니다.</p>
				</div>

				<div class="btn">
                  <button class="zoom"><img src="/images/market/btn_zoom.jpg" alt="크게보기" /></button>
                  <button class="viewRoom"><img src="/images/market/btn_view.jpg" alt="갤러리로 보기" /></button>
                  <div class="lst_gal">
                     <ul>
                        <li><button data-type="gallery">IN GALLERY</button></li>
                        <li><button data-type="living">IN LIVING</button></li>
                        <li><button data-type="corridor">IN CORRIDOR</button></li>
                     </ul>
					<div class="arr"><img src="/images/market/img_market_arr.gif" alt="" /></div>
                  </div>
             </div>
			</div>
			<div class="artSlide">
				<button class="up"><img src="/images/market/btn_slideup.jpg" alt="위로" /></button>
				<button class="down"><img src="/images/market/btn_slidedown.jpg" alt="아래로" /></button>
				<ul class="list">
				  <?php if (is_array($imgList)): $i = 0; ?>
					<?php foreach($imgList as $row): ?>
					<li><?php if ($i === 0): ?><span class="on"></span><?php endif; ?><a href="#" data-img="<?php echo goodsMiddleImgUploadPath, $row['goods_img'];?>"><img src="<?php echo goodsSmallImgUploadPath, $row['goods_img'];?>" alt="" /></a></li>
					<?php ++$i; endforeach;?>
				  <?php endif; ?>
					<!--li><span class="on"></span><a href="#"><img src="/images/market/img_small_tmp1.jpg" alt="" /></a></li>
					<li><a href="#"><img src="/images/market/img_small_tmp2.jpg" alt="" /></a></li>
					<li><a href="#"><img src="/images/market/img_small_tmp3.jpg" alt="" /></a></li>
					<li><a href="#"><img src="/images/market/img_small_tmp1.jpg" alt="" /></a></li>
					<li><a href="#"><img src="/images/market/img_small_tmp2.jpg" alt="" /></a></li>
					<li><a href="#"><img src="/images/market/img_small_tmp3.jpg" alt="" /></a></li-->
				</ul>
			</div>
			<div class="desArea">
				<p class="writer"><?php echo $Work->attr['artist_name'];?>&nbsp; <a href="artist.php?idx=<?php echo $Work->attr['artist_idx'];?>"><img src="/images/market/btn_more.jpg" alt="자세히 보기" /></a> <span style="font-size:12px">클릭하시면 작가의 다른 작품을 보실 수 있습니다.</span></p>
				<p class="tit"><?php echo $Work->attr['goods_name'];?></p>
				<p class="price">
						<span class="h">판매가</span>
						<?php if ($Work->attr['price_exchange_state'] === 'Y') { echo $Work->attr['price_exchange_text'];}else{echo '&#8361 ', number_format($Work->attr['goods_sell_price']);} ?>
						<span class="rantal"><span class="h">렌탈가</span>
						<?php if ($Work->attr['rental_exchange_state'] === 'Y'): ?>
						<?php echo $Work->attr['rental_exchange_text'];?>
						<?php else: ?>
						&#8361 <?php echo number_format($Work->attr['goods_rental_price']);?><span style="font-size:13px;display:inline-block; margin-top:-2px; margin-left:3px; vertical-align:1px "> / 월</span></span>
						<?php endif;?>
						<?php if (trim($Work->attr['rental_exchange_text']) !== '렌탈불가') : ?>
							<span style="margin-top: 5px; font-size:12px; line-height:12px; color: #8d8d8d; display:block; ">(렌탈 기간에 따라 요금이 상이합니다. <a href="rental/index.php?goods=<?php echo $Work->attr['goods_idx']?>" style=" color: #333; border-bottom: 1px solid #333; padding-bottom: 3px; display: inline-block; *display: inline; *zoom: 1;">렌탈정책보기</a>)</span>
						<?php endif; ?>
				</p>
				<dl class="details_list">
					<dt>Details</dt>
					<dd><?php echo $Work->attr['goods_material'];?></dd>
					<dd><?php echo ($Work->attr['goods_frame_state'] === 'Y') ? 'framed' : 'non framed';?></dd>
					<dd><?php echo $artWorkSize; ?></dd>
					<dd><?php echo $Work->attr['goods_make_year'];?></dd>
				</dl>
				<div class="sns">
					  <div class="inner">
						<a href="javascript:;" onclick="shareFaceBook();" class="sns1"><img src="/images/market/ico_sns1_off.gif" alt="페이스북"></a>
						<a href="javascript:;" onclick="sharePinterest();" class="sns2"><img src="/images/market/ico_sns2_off.gif" alt="핀터레스트"></a>
						<a href="javascript:;" onclick="" class="sns3"><img src="/images/market/ico_sns3_off.gif" alt="인스타그램"></a>
						<a href="javascript:;" onclick="" class="sns4"><img src="/images/market/ico_sns4_off.gif" alt="픽터파이"></a>
					  </div>
				  </div>
				<div class="btn">
					<button type="button" id="btnRequest" class="btnPack2 normal min layerOpen request"><span>REQUEST</span></button>
					<a href="javascript:;" id="btnWishlist" class="btnPack2 normal min"><span>WISH LIST</span></a>
					<button type="button" id="btnBasket" class="btnPack2 normal min layerOpen cart"><span>CART</span></button>
					<a href="javascript:;" id="btnRental" class="btnPack2 normal min"><span>RENTAL</span></a>
					 <div class="layerPopupT1 request">
						<div class="inner">
							<h3 class="tit">Send Request</h3>
							<ul class="list">
								<li><p class="tit">이름</p>
								<input type="text" name="" class="n_txt" id="" /></li>
								<li><p class="tit">전화번호(숫자만 입력해주세요)</p>
								<input type="text" name="" class="n_txt" id="" /></li>
								<li><p class="tit">상담내용</p>
								<textarea name="" id="" cols="30" rows="10" class="n_area"></textarea></li>
								<li class="last"><p class="tit">담당자 연락처</p>
									<dl class="contact_list">
										<dt>이진우 팀장</dt>
										<dd>+82.10.4651.2308(KOREA)</dd>
										<dd>jinwoo@mt.co.kr</dd>
									</dl>
									<dl class="contact_list">
										<dt>강필웅 실장</dt>
										<dd>+82.10.3885.6846(KOREA)</dd>
										<dd>jinwoo@mt.co.kr</dd>
									</dl>
								</li>
							</ul>
							<div class="common_btn">
								<a href="" class="btnPack2 normal min"><span>SEND</span></a>
							</div>
						</div>
					 </div>
					  <div class="layerPopupT1 cart">
						<div class="inner">
							<h3 class="tit">ADD TO CART</h3>
							<p class="txt">선택하신 작품을 장바구니에 담았습니다.</p>
							<p class="cart_btn"><button class="close">계속 쇼핑하기</button> &nbsp; <a class="cart" href="/basket/index.php">장바구니 보러가기</a></p>
						</div>
						<div class="close_pos"><button class="close"><img src="/images/market/ico_market_close1.gif" alt="닫기" /></button></div>
					 </div>
				</div><!-- //btn -->
				<!--
						dmp:150324
						사이즈 비교 이미지 삽입
				-->
			 <!-- div class="size_view" style="display: none;" -->
			 <div class="size_view" style="">
			 <?php if ($Work->attr['goods_scale_img']){ ?>
				<img src="<?php echo goodsScaleImgUploadPath ?><?php echo $Work->attr['goods_scale_img'];?>" alt="">
			 <?php } ?>
				<!-- img src="/images/tmp/tmp_viewbox.jpg" alt="" -->
			</div>


			</div>
		</div><!-- marketArea -->
		<div class="tabArea first content-mediaBox">
			<h3 class="h_tab"><button>Artist</button></h3>
			<ul class="tab_list">
				<li class="on"><span><a href="#cont1">Artist</a></span></li>
				<li><span><a href="#cont2">Work Detail</a></span></li>
				<li><span><a href="#cont3">Recommends</a></span></li>
				<li><span><a href="#cont4">Shipping</a></span></li>
			</ul>
		</div>
		<div class="tabcont content-mediaBox margin1" id="cont1">
			<!-- <img src="/images/market/img_tab_tmp.jpg" alt="" /> -->
			<div id="profileBox">
				<h2 class="tit">PROFILE</h2>
				<div class="inner">
					<div class="box t-c man_img">
						<div class="inner">
							<span><img src="<?php echo artistUploadPath, $Artist->attr['photo_up_file_name'];?>" alt="" /></span>
						</div>
					</div>
					<div class="box name">
						<div class="inner">
							<p class="name"><?php echo $Artist->attr['artist_name'];?></p>
							<p class="poinT">Artist info.</p>
							<ul class="n_list">
								<li>
									<p class="tit">직업</p>
									<p class="txt"><?php echo $Artist->attr['artist_job'];?></p>
								</li>
								<li>
									<p class="tit">생년월일</p>
									<p class="txt"><?php echo strtr($Artist->attr['artist_birthday'], '-', '.');?></p>
								</li>
								<li>
									<p class="tit">장르</p>
									<p class="txt"><?php echo $Artist->attr['artist_genre'];?></p>
								</li>
							</ul>
						</div>
					</div>
					<div class="box edu">
						<div class="inner">
							<p class="poinT">학력</p>
							<ul class="n_list">
							<?php for($i = 0; $i < $aEducationYearCnt; $i++): ?>
								<?php if (!empty($aEducationYear[$i]) ||  !empty($aEducationName[$i])): ?>
								<li>
									<p class="tit"><?php echo $aEducationYear[$i];?>년</p>
									<p class="txt"><?php echo $aEducationName[$i];?></p>
								</li>
								<?php endif; ?>
							<?php endfor; ?>
							</ul>
						</div>
					</div>
					<div class="box awards">
						<div class="inner">
							<p class="poinT">수상</p>
							<ul class="n_list">
							<?php for($i = 0; $i < $aAwardYearCnt; $i++): ?>
								<?php if (!empty($aAwardYear[$i]) ||  !empty($aAwardName[$i])): ?>
								<li>
									<p class="txt"><?php echo $aAwardYear[$i];?>년<br /><?php echo $aAwardName[$i];?></p>
								</li>
								<?php endif; ?>
							<?php endfor; ?>
							</ul>
						</div>
					</div>
					<div class="box display">
						<div class="inner">
							<p class="poinT">전시</p>
							<p class="tit2">개인전</p>
							<ul class="n_list">
							<?php for($i = 0; $i < $aPrivateYearCnt; $i++): ?>
								<?php if (!empty($aPrivateYear[$i]) ||  !empty($aPrivateName[$i])): ?>
								<li>
									<p class="txt"><?php echo $aPrivateYear[$i];?>년<br /><?php echo $aPrivateName[$i];?></p>
								</li>
								<?php endif; ?>
							<?php endfor; ?>
							</ul>
							<p class="tit2">단체전</p>
							<ul class="n_list">
							<?php for($i = 0; $i < $aTeamYearCnt; $i++): ?>
								<?php if (!empty($aTeamYear[$i]) ||  !empty($aTeamName[$i])): ?>
								<li>
									<p class="txt"><?php echo $aTeamYear[$i];?>년<br /><?php echo $aTeamName[$i];?></p>
								</li>
								<?php endif; ?>
							<?php endfor; ?>
							</ul>
						</div>
					</div>
					<div class="box repre">
						<div class="inner">
							<p class="poinT">대표작</p>
							<?php if (!empty($Artist->attr['major_work_img'])):?>
							<div class="art_img">
								<img src="<?php echo goodsListImgUploadPath, $Artist->attr['major_work_img']; ?>" alt="" />
							</div>
							<p class="art_tit"><?php echo $Artist->attr['major_work']; ?></p>
							<p class="art_writer">by <?php echo $Artist->attr['artist_name']; ?></p>
							<? endif;?>
						</div>
					</div>
					<div class="box summary">
						<div class="inner">
							<p class="poinT">작가인사말</p>
							<p class="n_txt"><?php echo nl2br(strip_tags($Artist->attr['artist_greeting']));?></p>
						</div>
					</div>
					<div class="box graph">
						<div class="inner">
							<p class="poinT">최근 전시 그래프</p>
							<div class="img">
								<div class="lst_graph">
									<ul>
									<?php $j = 1; for($i = 0; $i < $aAnnualArtworkCnt; $i++):
											if ((int)$aAnnualArtworkQty[$i] > 0) {
												$px = floor((int)$aAnnualArtworkQty[$i] / (int)$aAnnualArtworkQtyMax * 100);
											}
											else {
												$px = 0;
											}
									?>
										<li class="n<?php echo $j;?>">
											<div class="bar" style="height:<?php echo $px;?>px"><span><?php echo $aAnnualArtworkQty[$i];?></span></div>
											<p class="year"><?php echo $aAnnualArtworkYear[$i];?></p>
										</li>
									<?php ++$j; endfor; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="box social">
						<div class="inner">
							<p class="poinT">소셜</p>
							<ul class="ico_list">
								<?php if(!empty($Artist->attr['homepage_url'])):?><li><span class="ico"><img src="/images/market/ico_pro_home.gif" alt="" /></span><a href="<?php echo $Artist->attr['homepage_url'];?>"><?php echo $Artist->attr['homepage_url'];?></a></li><?php endif;?>
								<?php if(!empty($Artist->attr['blog_url'])):?><li><span class="ico"><img src="/images/market/ico_pro_balloon.gif" alt="" /></span><a href="<?php echo $Artist->attr['blog_url'];?>"><?php echo $Artist->attr['blog_url'];?></a></li><?php endif;?>
								<?php if(!empty($Artist->attr['facebook_url'])):?><li><span class="ico"><img src="/images/market/ico_pro_face.gif" alt="" /></span><a href="<?php echo $Artist->attr['facebook_url'];?>"><?php echo $Artist->attr['facebook_url'];?></a></li><?php endif;?>
								<?php if(!empty($Artist->attr['sns_1_url'])):?><li><span class="ico"><img src="/images/market/ico_pro_google.gif" alt="" /></span><a href="<?php echo $Artist->attr['sns_1_url'];?>"><?php echo $Artist->attr['sns_1_url'];?></a></li><?php endif;?>
								<?php if(!empty($Artist->attr['sns_2_url'])):?><li><span class="ico"><img src="/images/market/ico_pro_google.gif" alt="" /></span><a href="<?php echo $Artist->attr['sns_2_url'];?>"><?php echo $Artist->attr['sns_2_url'];?></a></li><?php endif;?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
      <div class="tabArea  content-mediaBox ect">
       <ul class="tab_list">
        <li><span><a href="#cont1">Artist</a></span></li>
        <li class="on"><span><a href="#cont2">Work Detail</a></span></li>
        <li><span><a href="#cont3">Recommends</a></span></li>
        <li><span><a href="#cont4">Shipping</a></span></li>
       </ul>
      </div>
      <div class="tabcont content-mediaBox margin1" id="cont2">
      <!--  <img src="/images/market/img_tab_tmp2.jpg" alt="" /> -->
			<div id="inforBox">
				<h2 class="market_tit title4">작품정보</h2>
				<!--div class="lft_area">
					<div class="img"><img src="<?php echo goodsListImgUploadPath, $Work->attr['goods_list_img'];?>" alt="" /></div>
				</div-->
				<div class="rgh_area">
					<div class="cont">
						<p class="tit">Curator's Note</p>
						<p class="txt"><?php echo nl2br(strip_tags(stripslashes($Work->attr['goods_description'])));?></p>
					</div>
				</div>
			</div>
			<section class="proview_area2">
			<div class="table_type before">
				<table style="table-layout:fixed;">
					<colgroup>
						<col width="15.17543859649%">
						<col width="">
						<col width="15.17543859649%">
						<col width="">
					</colgroup>
					<tr>
						<th scope="col">작품명</th>
						<td><?php echo $Work->attr['goods_name'];?></td>
						<th scope="col">사이즈</th>
						<td><?php echo $artWorkSize; ?></td>
					</tr>
					<tr>
						<th scope="col">장르</th>
						<td><?php echo $aMedium[$Work->attr['goods_medium']].'('.$aSubject[$Work->attr['goods_subject']].')';?></td>
						<th scope="col">제작년도</th>
						<td><?php echo $Work->attr['goods_make_year'];?></td>
					</tr>
					<tr>
						<th scope="col">프레임 여부</th>
						<td><?php echo ($Work->attr['goods_frame_state'] === 'Y') ? '유' : '무';?></td>
						<th scope="col">전시 및 출품내역</th>
						<td><?php echo $Work->attr['goods_exhibit_year'], $Work->attr['goods_exhibit_item'];?></td>
					</tr>
					<tr>
						<th scope="col">재료</th>
						<td colspan="3"><?php echo $Work->attr['goods_material'];?></td>
					</tr>
				</table>
			</div>
			<div class="table_type after" >
				<table>
					<tr>
						<th scope="col">작품명</th>
						<td><?php echo $Work->attr['goods_name'];?></td>
					</tr>
					<tr>
						<th scope="col">사이즈</th>
						<td><?php echo (!empty($Work->attr['goods_width'])) ? $Work->attr['goods_width'].' x ': '';?><?php echo (!empty($Work->attr['goods_depth'])) ? $Work->attr['goods_depth'].' x ': '';?><?php echo (!empty($Work->attr['goods_height'])) ? $Work->attr['goods_height'].' cm ': '';?></td>
					</tr>
					<tr>
						<th scope="col">장르</th>
						<td><?php echo $aMedium[$Work->attr['goods_medium']].'('.$aSubject[$Work->attr['goods_subject']].')';?></td>
					</tr>
					<tr>
						<th scope="col">제작년도</th>
						<td><?php echo $Work->attr['goods_make_year'];?></td>
					</tr>
					<tr>
						<th scope="col">프레임 여부</th>
						<td><?php echo ($Work->attr['goods_frame_state'] === 'Y') ? '유' : '무';?></td>
					</tr>
					<tr>
						<th scope="col">전시 및 출품내역</th>
						<td><?php echo $Work->attr['goods_exhibit_year'], $Work->attr['goods_exhibit_item'];?></td>
					</tr>
					<tr>
						<th scope="col">재료</th>
						<td><?php echo $Work->attr['goods_material'];?></td>
					</tr>
				</table>
			</div>
		</section><!-- //proview_area -->
      </div>
        <div class="tabArea  content-mediaBox  ect">
         <ul class="tab_list">
          <li><span><a href="#cont1">Artist</a></span></li>
          <li><span><a href="#cont2">Work Detail</a></span></li>
          <li class="on"><span><a href="#cont3">Recommends</a></span></li>
          <li><span><a href="#cont4">Shipping</a></span></li>
         </ul>
        </div>
        <div class="tabcont content-mediaBox margin1" id="cont3">
         <!-- <img src="/images/market/img_tab_tmp3.jpg" alt="" /> -->
			<div id="bestartBox">
				<h2 class="market_tit title4">이 작품을 본 고객이 함께 본 작품</h2>
				<ul>
				<?php if (is_array($recommendList)): ?>
					<?php foreach($recommendList as $row): ?>
					<li>
						<div class="img"><a href="?goods=<?php echo $row['goods_idx'];?>"><img src="<?php echo goodsListImgUploadPath, $row['goods_list_img'];?>" alt="" /></a></div>
						<div class="txt">
							<p class="writer"><?php echo $row['artist_name'];?></p>
							<p class="art_tit"><?php echo $row['goods_name'];?></p>
						</div>
					</li>
					<?php endforeach; ?>
				<?php endif; ?>
				</ul>
			</div>
        </div>
        <div class="tabArea  content-mediaBox ect">
         <ul class="tab_list">
          <li><span><a href="#cont1">Artist</a></span></li>
          <li><span><a href="#cont2">Work Detail</a></span></li>
          <li><span><a href="#cont3">Recommends</a></span></li>
          <li class="on"><span><a href="#cont4">Shipping</a></span></li>
         </ul>
        </div>
        <div class="tabcont content-mediaBox margin1" id="cont4">
         	<!-- <section id="orderInfo">
         		<h1 class="title4">배송정보</h1>
         		<h2 class="title5"><span>01</span> 배송안내</h2>
         		<div class="txtBox">
         			<p>작품배송은 ‘아트1’에서 일괄진행하고 국내배송을 기준으로 하며, 발생되는 모든 배송, 설치 및 반환비용은 구매자가 일괄 부담합니다. 각각의 작품은 모두 개별 배송되며, 보험조건이나 파손위험도 등의 조건에 따라 배송수단 및 배송료가 상이할 수 있음을 밝힙니다.</p>
         		</div>
         		<div class="box_gray">
         		         		<ul>
         		         			<li class="n1">
         		         				<p>
         		         					<strong>1:1 상담을 통한 렌탈 및 구매</strong>
         		         					상담내용 기반으로 작품셀렉(약 2일 소요)  →  작가에게 인수인계  →  작가와 ‘아트1’ 전문가의 작품 컨디션 체크  →  ‘아트1’의 패키지에 안전하게 포장  →  art1 전문 배송업체를 통해 개별 배송  →  현장 컨디션 체크   →  설치
         		         				</p>
         		         			</li>
         		         			<li class="n2">
         		         				<p>
         		         					<strong>사이트를 통한 직접 렌탈 및 구매</strong>
         		         					구매/렌탈접수  →  작가에게 인수인계  →  ‘아트1’전문가의 컨디션 체크  →  ‘아트1’의 패키지에 안전하게 포장  →  ‘아트1’ 전문 배송업체를 통해 발송  →  현장 컨디션 체크  →  설치 <br>※ 작품 발송 후 배송까지 평균 2일 소요됩니다.

         		         				</p>
         		         			</li>
         		         			<li class="n3">
         		         				<p>
         		         					<strong>아트프로젝트</strong>
         								 주문 즉시 art1의 패키지에 안전하게 포장  →  발송	<br>※ 발송 후 배송까지 평균 2일 소요됩니다.
         		         				</p>
         		         			</li>
         		         		</ul>
         		</div>
         		<div class="txtBox">
         		         		<ol class="lst_num1">
         		         			<li><span class="num">- </span>배송일정은 계약금이입금된 후 배송날짜를 배정해서 안내해 드립니다.</li>
         		         			<li><span class="num">- </span> 도서 산간지역의 경우 평균배송기간보다 지연될 수 있습니다.</li>
         		         			<li><span class="num">- </span> 주문폭주, 특정기간(명절, 공휴일 등), 택배사 사정 등에 따라 배송이 지연될 수있으니 양해바랍니다. </li>
         		         		</ol>
         		</div>
         		<h2 class="title5"><span>02</span> 교환/반품안내</h2>
         		<div class="txtBox">
         		         		<ol class="lst_num1">
         		         			<li><span class="num">1.</span> 오배송, 제품 하자, 단순변심으로 인한 교환/반품 모두작품 인도일기준 7일 이내에가능합니다.</li>
         		         			<li><span class="num">2.</span> 상품하자 및 오배송 등의 사유로 교환/반품시 배송비는 업체가 부담하며, 고객 변심에 의한 교환/반품인 경우에는고객이 부담하여야 합니다.</li>
         		         			<li><span class="num">3.</span> 반품 택배비는 작품에 따라 상이할 수 있으므로 반드시 고객센터로 확인 후 교환/반품 접수바랍니다.</li>
         		         			<li><span class="num">4.</span> 교환/반품을 원하는 작품은 수령일 기준 7일내에 보내야 합니다.    </li>
         		         		</ol>
         		         	</div>
         		<h2 class="title5"><span>03</span> 청약 철회가 불가능한 경우</h2>
         		<div class="txtBox">
         		         		<ol class="lst_num1">
         		         			<li><span class="num">1.</span>고객님의 사유로 작품이 파훼손되어 복구불가한 경우</li>
         		         			<li><span class="num">2.</span> 이용자의 사용 또는 일부 쇠에 의하여 재화 등의 가치가 현저히 감소한 경우</li>
         		         			<li><span class="num">3.</span> 시간의 경과에 의하여 재판매가 곤란할 정도로 작품의 가치가 현저히 감소한 경우</li>
         		         			<li><span class="num">4.</span> 작품보증서를 분실한 경우</li>
         		         		</ol>
         		</div>
         	</section> -->
			<? include "../inc/order_info.php"; ?>
        </div>
      </section>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
<?php //echo ACTION_IFRAME; ?>
<script src="/js/iscroll.js"></script>
<script>
$(".sns .inner a img").hover(function(){
	$(this).attr("src",$(this).attr("src").split("_off").join("_on"));
		},function(){
	$(this).attr("src",$(this).attr("src").split("_on").join("_off"));
});


iCutter2(".artSlide .list li ");
iCutter("#bestartBox .img ");


$("#marketView1 .artSlide ul.list > li").on("click",function(){
	var onBox = $("<span class='on'></span>");
	var imgsrc = $(this).find(">a").data("img");
	if($(this).find(".on").length == 0){
		$("#marketView1 .artSlide ul.list > li .on").remove();
		$(this).append(onBox);
		$("#marketView1 .marketArea .BigArea .img > img").attr("src",imgsrc);



	}

})



// 박스 넓이 통일 함수 오류 원본 150306
/*function boxHeightCustom(){
	var o = $("#profileBox .box");
	var height = 0;
	o.css("height","").find(".inner").css("height","");
	for (var i = 0; i < o.length; i++) {
		  if( i  == o.length-1 ){
		  	o.eq(i).css("height",height + 20).find(".inner").css("height",height);
		  	return;
		  }
			if(o.eq(i).offset().top == o.eq(i+1).offset().top){
				if(o.eq(i).find(".inner").outerHeight() > o.eq(i+1).find(".inner").outerHeight()){
					height = o.eq(i).find(".inner").outerHeight();
				}else{
					height = o.eq(i+1).find(".inner").outerHeight();
				}
				o.eq(i).css("height",height + 20).find(".inner").css("height",height);

			}else{
				if(o.eq(i).find(".inner").outerHeight() < height){
						o.eq(i).css("height",height + 20).find(".inner").css("height",height);
				}else{

				}
			}
		};
}*/

// 박스 넓이 통일 함수
function boxHeightCustom(){
	var o = $("#profileBox .box");
	var hArray = [];
	var hConut = 0;
	var height = 0;
	var offset = o.eq(0).offset().top;
	o.css("height","").find(".inner").css("height","");
	for (var i = 0; i < o.length; i++) {
		if(o.eq(i).offset().top == offset){
			con("boxLeng"+i+":::::height::::::"+o.eq(i).find(".inner").outerHeight());
			if(o.eq(i).find(".inner").outerHeight() > height){
				height = o.eq(i).find(".inner").outerHeight();
				hArray[hConut] = o.eq(i).find(".inner").outerHeight();
			}
			con("hCount::::"+hConut+":::::::"+hArray[hConut]);
		}else{
			con("boxLeng_down"+i);
			hConut = hConut + 1;
			offset = o.eq(i).offset().top;
			height = o.eq(i).find(".inner").outerHeight();
			hArray[hConut] = o.eq(i).find(".inner").outerHeight();
		}

	}//for


	hConut = 0;
	offset = o.eq(0).offset().top;
	for (var i = 0; i < o.length; i++) {
			if(o.eq(i).offset().top == offset){
				o.eq(i).css("height",hArray[hConut] + 30).find(".inner").css("height",hArray[hConut]);
				con("hCountAfter::::"+hConut+":::::::"+hArray[hConut]);
			}else{
				hConut = hConut + 1;
				offset = o.eq(i).offset().top;
				o.eq(i).css("height",hArray[hConut] + 30).find(".inner").css("height",hArray[hConut]);
				con("hCountAfter::::"+hConut+":::::::"+hArray[hConut]);
			}
	};
}


$(window).resize(function(){
	boxHeightCustom();
})
$(window).load(function(){
	boxHeightCustom();
})






function loaded () {

}

//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
$(function(){
	//zoom
	var $wrap = $("#wrap");
	var $zoomBox = $("#zoomBg");
	var $bigImg = $(".BigArea .img");
	var $zoomImg = $zoomBox.find(".photo");
	var myScroll;
	myScroll = new IScroll('#zoomBg .photo', { scrollX: false, freeScroll: true });

	$("button.zoom").click(function(){
		$(window).scrollTop(0);
		var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
		var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
		var windowTop = $(window).scrollTop();
    		var bigImgSrc = $bigImg.find("img").attr("src");
    		var backgound = $("<div>").attr({
	         "id": "cover"
	       }).css({
	         "height": windowHeight,
	         "z-index":11,
	         "cursor":"pointer",
	         "display":"none"
	       })
	      $("body").append(backgound);
	      $wrap.css({
	      	"overflow":"hidden",
	      	"height":windowHeight
	      })

	      //$zoomImg.find("img").attr("src",bigImgSrc);

		$zoomBox.css({
			"left":"50%",
			"top":20,
			"width": "90%",
			"height" : (windowHeight - 40),
			"margin-left" : "-45%"
		})

	    fadePlayMotion($zoomBox , true , 400);
	    fadePlayMotion(backgound , true , 400);
	    $("#zoomBg .close , #cover").on("click",zoomClose);
	    $(window).on("resize",zoomClose);
	    myScroll.refresh();

	    function zoomClose(){

			fadePlayMotion($("#cover") , false , 400);
			$zoomBox.fadeTo(400,0,function(){
				$(this).css("display","none");
				$("#cover").remove();
			});
			$wrap.css({
		      	"overflow":"",
		      	"height":""
		      })
			$("#zoomBg .close , #cover").off("click");
			$(window).off("resize",zoomClose);
		};//zoomClose




	});





	var transType1Flag = false;
  	var transType2Flag = false;
  	var tabArea = $('.tabArea.first');
	var tabHeadline = tabArea.find('.h_tab');
	var tabLst = tabArea.find(">ul");

	 tabHeadline.on("click",function(){
	    if(tabLst.css("display") == "block"){
	      $(this).removeClass("on");
	      tabLst.slideUp(300);
	    }else{
	      $(this).addClass("on");
	      tabLst.slideDown(300);
	    }

	  });
	  tabArea.on("mouseleave",function(){
	    if(tabHeadline.hasClass("on")){
	      tabHeadline.removeClass("on");
	      tabLst.slideUp(300);
	    }

	  });

	function tabResize(){
	    var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	    if(width >  767){
	       transType1();
	      }else{
	       transType2();
	      }

	    function transType1(){
	      if(!transType1Flag){
	        //width >  768
      	   tabLst.css("display","block");
      	  $(".tabcont").css("display","");
		  $(".tabArea.first .tab_list li").removeClass("on");
      	  $(".tabArea.first .tab_list li:eq(0)").addClass("on");
	        $(".tabArea .tab_list  a").off().on("click",function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:($(this.hash).offset().top) - 200}, 500);
		});


	      }//if
	      transType1Flag = true;
	      transType2Flag = false;
	    }

	      function transType2(){
	      if(!transType2Flag){
	        tabLst.css("display","none");
	        $(".tabArea.first .tab_list  a").off().on("click",function(event){
			event.preventDefault();
			tabHeadline.find("button").text($(this).text());
			$(".tabArea.first .tab_list li.on").removeClass("on");
			$(this).parents("li").addClass("on");
			var id = $(this.hash);
			$(".tabcont").css("display","none");
			id.css("display","block");
		});





	      }//if
	      transType1Flag = false;
	      transType2Flag = true;
	    }

	  }

	$(window).on("resize",tabResize);
  	tabResize();


	function viewInRoom(){
		var win = $(window),
		doc = $(document),
		viewport = win.height(),
		wrap = $("#wrap"),
		body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
		var bigImg = $(".BigArea .img img").attr("src");
		var oL = $(".BigArea").find(".img").offset().left;
		var oT = $(".BigArea").find(".img").offset().top;
		var btn = $(".viewRoom"),
			  lst = $(".lst_gal");

		var marketBg = $("#marketBg"),
			marketImg = marketBg.find(".img"),
			close = marketBg.find(".btnClose button");

		function viewMotion(){
			var type = $(this).data("type");
			var bigImg = $(".BigArea .img img").attr("src");
			var img = $("<img>").attr("src",bigImg)
			.css({
			"position":"absolute",
			"left":oL,
			"top":oT,
			"z-index":10
			})
			.addClass("upImg").appendTo(marketBg);
			viewport = win.height();
			win.scrollTop(0);
			wrap.css({
				"height":viewport,
				"overflow":"hidden"
			});
			marketBg.css({"opacity":1,"display":"block"})
			.find(".bg."+type).css({"display":"block","opacity":0})
			.animate({"opacity":1},800).end()
			.find("h3.h_"+type).css("display","block");

			$(".upImg").delay(800).animate({
				"left":"50%",
				"top":198,
				"width":276,
				"margin-left":-138
			},1000);
			close.off().on("click",function(){
				wrap.css({
					"height":"",
					"overflow":""
				});
				marketBg.animate({"opacity":0},400,function(){
					$(this).css({"display":"none"}).find(".bg."+type).css({"display":"none"}).end().find("h3.h_"+type).css("display","none");
					$(".upImg").remove();
				});

			});
		}///viewMotion

		lst.find("button").off().on("click",viewMotion);
		btn.on("click",function(){
			lst.css("display",(lst.css("display") == "block") ? "none" : "block");
		});
	};
	viewInRoom();

	/*$(".layerOpen.request").click(function(){
		if ($(".layerPopupT1.request").css("display") == "none"){
			$(".layerPopupT1").fadeOut();
			$(".layerPopupT1.request").fadeIn();
		}else{
				$(".layerPopupT1.request").fadeOut();
		}
	});*/

	$(".layerOpen.cart,.layerPopupT1 .close").click(function(){
		if ($(".layerPopupT1.cart").css("display") == "none"){
			//$(".layerPopupT1").fadeOut();
			//$(".layerPopupT1.cart").fadeIn();
		}else{
			$(".layerPopupT1.cart").fadeOut();
		}
	});
});

$(".guide .htype2 > button").on("click",function(){
	var t = $(this).parent();
	if(!t.hasClass("on")){
		t.addClass("on").next().slideDown(300);
	}else{
		t.removeClass("on").next().slideUp(300);
	}
});



/*
function shareFaceBook()
{
	var fullUrl;
	var url = "<?php echo SHARE_URL;?>?goods=<?php echo $goods_idx?>";
	var image = "<?php echo SHARE_URL;?><?php echo goodsBigImgUploadPath, $imgList[0]['goods_img'];?>";
	var title = "<?php echo $Work->attr['goods_name'];?>";
	var summary = "";

	var pWidth = 640;
	var pHeight = 380;
	var pLeft = (screen.width - pWidth) / 2;
	var pTop = (screen.height - pHeight) / 2;

	fullUrl = 'http://www.facebook.com/share.php?s=100&p[url]='+ url+'&p[images][0]='+ image+'&p[title]='+ title+'&p[summary]='+ summary;
	fullUrl = fullUrl.split('#').join('%23');
	fullUrl = encodeURI(fullUrl);
	window.open(fullUrl,'','width='+ pWidth +',height='+ pHeight +',left='+ pLeft +',top='+ pTop +',location=no,menubar=no,status=no,scrollbars=no,resizable=no,titlebar=no,toolbar=no');
}
*/



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

function request() {
<?php if ($_SESSION['logged_in'] === 1): ?>
	document.location.href="/member/reservation.php?goods=<?php echo $Work->attr['goods_idx']?>&aj=1";
<?php else : ?>
	goLogin();
<?php endif; ?>
}

function order(ord) {
<?php if ($_SESSION['logged_in'] === 1): ?>

	<?php if ($Work->attr['price_exchange_state'] === 'Y' && trim($Work->attr['price_exchange_text']) === '판매불가') {?>
		alert('판매가 불가능한 작품입니다.');
	<?php } else { ?>
		$("#ord").val(ord);
		document.goodsFrm.target = "action_ifrm";
		document.goodsFrm.submit();
	<?php } ?>

<?php else : ?>
	goLogin();
<?php endif; ?>
}

function wish() {
<?php if ($_SESSION['logged_in'] === 1): ?>
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
<?php else : ?>
	goLogin();
<?php endif; ?>
}

function rental() {
<?php if ($_SESSION['logged_in'] === 1): ?>
	<?php if ($Work->attr['rental_exchange_state'] === 'Y' && trim($Work->attr['rental_exchange_text']) === '렌탈불가') { ?>
		alert('렌탈이 불가능한 제품입니다.');
	<?php } else { ?>
		document.location.href = "rental/index.php?goods=<?php echo $Work->attr['goods_idx']?>";
	<?php } ?>
<?php else : ?>
	goLogin();
<?php endif; ?>
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

function goLogin() {
	if(confirm("로그인을 해야 사용할 수 있는 기능입니다.\r\n로그인 페이지로 이동하시겠습니까?")){
		location.href="/member/login.php?returnUrl="+location.href;
	}
}

$(function(){
	$("#btnRequest").bind("click", function(){request();});
	$("#btnBasket").bind("click", function(){order("basket");});
	$("#btnWishlist").bind("click", function(){wish();});
	$("#btnRental").bind("click", function(){rental();});
});
</script>

<?php
include_once(ROOT.'inc/footer.php');
include_once(ROOT.'inc/bot.php');

$recommendList = null;
$relationImgList = null;
$imgList = null;
$Artist = null;
$Work = null;
$dbh = null;

unset($recommendList);
unset($relationImgList);
unset($imgList);
unset($Artist);
unset($Work);
unset($dbh);
?>