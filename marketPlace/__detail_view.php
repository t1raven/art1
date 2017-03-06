<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/market/work.class.php');
require(ROOT.'lib/class/market/artist.class.php');

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
$aCvYear = explode('§', $Artist->attr['cv_year']);
$aCvName = explode('§', $Artist->attr['cv_name']);
$aAnnualArtworkYear = explode('§', $Artist->attr['annual_artwork_year']);
$aAnnualArtworkQty = explode('§', $Artist->attr['annual_artwork_cnt']);
$aEducationYearCnt = count($aEducationYear) - 1;
$aAwardYearCnt = count($aAwardYear) - 1;
$aPrivateYearCnt = count($aPrivateYear) - 1;
$aTeamYearCnt = count($aTeamYear) - 1;
$aCvYearCnt = count($aCvYear) - 1;
$aAnnualArtworkCnt = count($aAnnualArtworkYear) - 1;
$aAnnualArtworkQtyMax = max($aAnnualArtworkQty);

$width = !empty($Work->attr['goods_width']) ? $Work->attr['goods_width'] : null;
$depth = !empty($Work->attr['goods_depth']) ? $Work->attr['goods_depth'] : null;
$height = !empty($Work->attr['goods_height']) ? $Work->attr['goods_height'] : null;

//2015-03-13 이용태 수정 소숫점 .0 을 없앤다.
$width =  !empty($width) ? str_replace('.0','',$width) : null; //str_replace("-","",$loss_hp)
$height =  !empty($height) ? str_replace('.0','',$height)  : null;
$depth =  !empty($depth) ? str_replace('.0','',$depth)  : null;


/*
if (!empty($depth)) {
	$artWorkSize .= $depth;
}

if (!empty($width)) {
	$artWorkSize .= 'x'.$width;
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
*/


// 세로
if (!empty($depth)) {
	$artWorkSize .= $depth;
}

// 가로
if (!empty($width)) {
	$artWorkSize .= 'x'.$width;
}

// 높이
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

if($artWorkSize === 'cm') { //2016-05-12 LYT // 사이즈 값이 없으면 문구 처리
	$artWorkSize = 'Variable dimensions';
}


$snsTitle = $Work->attr['goods_name'];
$snsImg = $PUBLIC['HOME'].goodsMiddleImgUploadPath.$imgList[0]['goods_img'];
//$snsUrl = $PUBLIC['HOME'].$_SERVER['PHP_SELF'];
$snsUrl = $PUBLIC['HOME'].'/marketPlace/index.php';
$snsDescription = str_replace("\r\n", '', strip_tags($Work->attr['goods_description']));

//$ogType ='article, artist';
//$ogSiteName = '아트1닷컴';
//$ogUrl = $PUBLIC['SHARE_URL'].urlencode('?'.$_SERVER['QUERY_STRING']);
//$ogUrl = $PUBLIC['HOME'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
//$pinUrl = $PUBLIC['HOME'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
?>
<div class="blackBg"></div>
<div id="zoomBg" style="display:none">
	<div class="photo" style="cursor: url(http://i1.daumcdn.net/dmaps/apis/cursor/openhand.cur.ico) 7 5, url(http://i1.daumcdn.net/dmaps/apis/cursor/openhand.cur.ico), default;">
      <!-- <div class="photo" style="cursor: url(http://i1.daumcdn.net/dmaps/apis/cursor/closedhand.cur.ico) 7 5, url(http://i1.daumcdn.net/dmaps/apis/cursor/closedhand.cur.ico), move;"> -->
		<div class="inner">
			<span><img src="<?php echo goodsBigImgUploadPath, $imgList[0]['goods_img'];?>" alt="" /></span>
		</div>
	</div>
	<div class="artSlide">
		<button class="up"><img src="/images/market/btn_slideup.jpg" alt="위로"></button>
		<button class="down"><img src="/images/market/btn_slidedown.jpg" alt="아래로"></button>
		<div class="bx_list">
			<ul class="list">
			  <?php if (is_array($imgList)): $i = 0; ?>
				<?php foreach($imgList as $row): ?>
				<li><?php if ($i === 0): ?><span class="on"></span><?php endif; ?><a href="#" data-img="<?php echo goodsBigImgUploadPath, $row['goods_img'];?>"><img src="<?php echo goodsSmallImgUploadPath, $row['goods_img'];?>" alt="" /></a></li>
				<?php ++$i; endforeach;?>
			  <?php endif; ?>
			</ul>
		</div>
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
<section id="marketRView">

    <div class="inner_view">
        <form name="goodsFrm" id="goodsFrm" method="post" action="/basket/index.php" onsubmit="return false;">
        <input type="hidden" name="at" value="update">
        <input type="hidden" name="ord" id="ord">
        <input type="hidden" name="goods" id="goods" value="<?php echo $goods_idx;?>">
        <input type="hidden" name="order_cnt" value="1">
        </form>
          <header class="header">
            <h1><?php echo $Work->attr['goods_name'];?> <span><?php echo $Work->attr['artist_name'];?></span></h1>
            <a href="/marketPlace/artist.php?idx=<?php echo $Work->attr['artist_idx'];?>" class="more">작가의 다른작품보기 +</a>
            <ul class="sns">
              <li><button type="button" onclick="shareFaceBook('<?php echo $snsUrl;?>','<?php echo $snsImg; ?>','<?php echo $snsTitle; ?>','<?php echo $snsDescription; ?>');"><img src="/images/market/btn_sns1_off.gif" alt="페이스북" onmouseover="$(this).imgConversion(true);" onmouseout="$(this).imgConversion(false);" ></button></li>
              <li><button type="button" onclick="shareGooglePlus('<?php echo $snsUrl;?>','<?php echo $snsTitle; ?>');"><img src="/images/market/btn_sns5_off.gif" alt="구글플러스" onmouseover="$(this).imgConversion(true);" onmouseout="$(this).imgConversion(false);"></button></li>
              <li><button type="button" onclick="sharePinterest('<?php echo $snsUrl;?>','<?php echo $snsImg; ?>','<?php echo $snsTitle; ?>');"><img src="/images/market/btn_sns2_off.gif" alt="핀터레스트" onmouseover="$(this).imgConversion(true);" onmouseout="$(this).imgConversion(false);"></button></li>
              <!-- <li><button type="button"><img src="/images/market/btn_sns3_off.gif" alt="인스타그램"></button></li> -->
            </ul>
            <a href="#" class="close" onclick="return false;">
              <img src="/images/market/btn_close3_off.png" alt="닫기" onmouseover="$(this).imgConversion(true);" onmouseout="$(this).imgConversion(false);">
            </a>
          </header>

          <article class="product_info">
              <div class="BigArea">
                <p class="copy"><span class="space">ⓒ<?php echo $Work->attr['goods_make_year'];?>. <span style="font-weight:bold; line-height:22px;"><?php echo $Work->attr['artist_name'];?></span>. All Rights Reserved.  </span> 작품이미지의 도용 및 무단 재배포를 금지합니다.</p>
                <div class="img">
                <?php if ($Work->attr['goods_cnt'] === '0'):?>
                    <span class="sale"><img src="/images/market/ico_sale.png" alt="판매됨"></span>
                <?php else: ?>
                    <?php if ($Work->attr['is_rental'] === 'Y'): ?>
                    <span class="rental"><img src="/images/market/ico_rental.png" alt="랜탈됨"></span>
                    <?php endif; ?>
                <?php endif; ?>
                    <img src="<?php echo goodsBigImgUploadPath, $imgList[0]['goods_img'];?>" alt="">
                </div>
              </div><!-- //BigArea -->

              <div class="product_des">

                  <div class="group_rgh">
                      <p class="price">
                          <span class="h">판매가</span>
                          <span class="mon"> ₩ <?php if ($Work->attr['price_exchange_state'] === 'Y'){echo $Work->attr['price_exchange_text'];}else{echo number_format($Work->attr['goods_sell_price']);} ?></span>
                          <?php if ($Work->attr['goods_cnt'] === '0'): ?><span class="sale_end">- 판매완료</span><?php endif; ?>

                          <span class="rantal">
                              <span class="h">렌탈가</span>
                              <span class="mon">₩ <?php if ($Work->attr['rental_exchange_state'] === 'Y'){echo $Work->attr['rental_exchange_text'];}else{echo number_format($Work->attr['goods_rental_price']);} ?></span > <span class="moth">/ 월 (VAT 별도)</span>
                              <?php if ($Work->attr['is_rental'] === 'Y'): ?><span class="rantal_end">- 렌탈 중</span><?php endif; ?>
                          </span>
                          <?php if (trim($Work->attr['rental_exchange_text']) !== '렌탈불가') : ?><span class="info_rantal">(렌탈 기간에 따라 렌탈료가 할인됩니다. <a href="javascript:rental();" class="link">렌탈정책보기</a> )</span><?php endif; ?>

                    </p>
                    <ul class="details_list">
                        <li><strong>Material</strong> <span>:&nbsp;&nbsp; <?php echo $Work->attr['goods_material'];?></span></li>
                        <li><strong>Frame</strong> <span>:&nbsp;&nbsp;  <?php echo ($Work->attr['goods_frame_state'] === 'Y') ? 'framed' : 'non framed';?></span></li>
                        <li><strong>Size</strong> <span>:&nbsp;&nbsp;  <?php echo $artWorkSize; ?></span></li>
                        <li><strong>Year</strong> <span>:&nbsp;&nbsp;  <?php echo $Work->attr['goods_make_year'];?></span></li>
                    </ul>
                    <div class="btn">
                        <button type="button" id="btnRequest" class=" layerOpen request"><span>REQUEST</span></button>
                        <button type="button" id="btnWishlist" class=""><span>WISH LIST</span></button>
                        <div class="layerPopupT1 wishlist"  style="display: none;">
                              <div class="inner">
                                  <h3 class="tit">ADD TO WISH LIST</h3>
                                  <p class="txt">WISH LIST에 등록되었습니다.</p>
                                  <p class="cart_btn"><button class="close">계속 쇼핑하기</button> &nbsp; <a class="cart" href="/member/wish/">WISH LIST 보러가기</a></p>
                              </div>
                              <div class="close_pos"><button class="close"><img src="/images/market/ico_market_close1.gif" alt="닫기"></button></div>
                          </div>
                        <button type="button" id="btnBasket" class=" layerOpen cart"><span>CART</span></button>
                        <button type="button" id="btnRental" class=""><span>RENTAL</span></button>
                            <div class="layerPopupT1 cart"  style="display: none;">
                                <div class="inner">
                                    <h3 class="tit">ADD TO CART</h3>
                                    <p class="txt">선택하신 작품을 장바구니에 담았습니다.</p>
                                    <p class="cart_btn"><button class="close">계속 쇼핑하기</button> &nbsp; <a class="cart" href="/basket/index.php">장바구니 보러가기</a></p>
                                </div>
                                <div class="close_pos"><button class="close"><img src="/images/market/ico_market_close1.gif" alt="닫기"></button></div>
                            </div>
                      </div><!-- //btn -->
                      <div class="util">
                        <button class="zoom">+ Zoom</button>
                        <?php if ($Work->attr['goods_medium'] ==='4' || $Work->attr['goods_medium'] === '5'): ?>
                        <?php else: ?>

                        <button class="viewRoom">@ View</button>
                        <div class="lst_gal">
                           <ul>
                              <li><button data-type="gallery">Gallery</button></li>
                              <li><button data-type="living">Living</button></li>
                              <li><button data-type="corridor">Corridor</button></li>
                           </ul>
                         </div>

                        <?php endif; ?>
                    </div>


                </div><!-- //group_rgh -->

                <div class="group_lft">
                      <?php if ($Work->attr['goods_scale_img']): ?><img src="<?php echo goodsScaleImgUploadPath, $Work->attr['goods_scale_img'];?>" alt="각 연령별 높이"><?php endif; ?>
                  </div><!-- //group_lft -->

              </div><!-- //product_des -->
          </article><!-- //product_info -->
          <div class="tabBox">
            <!-- <h3 class="h_tab"><button style="border-top:1px solid #ddd;">In brief</button></h3> -->
              <ul>
                  <li><span><a href="#WorkDetail">Work Detail</a></span></li>
                  <li><span><a href="#Artist">Artist</a></span></li>
                  <li><span><a href="#Recommends">Recommends</a></span></li>
                  <li><span><a href="#Shipping">Shipping</a></span></li>
              </ul>
            <!-- <span class="prev" style="display: none;"><img src="/images/ico/ico_tabarr_lft.png" alt=""></span>
             <span class="next" style="display: none;"><img src="/images/ico/ico_tabarr_rgh.png" alt=""></span> -->
          </div>

          <article id="WorkDetail" class="proview_area2">
              <h1><span class="ico">Description</span></h1>
              <div class="t1">
                <p><?php echo nl2br(strip_tags(stripslashes($Work->attr['goods_description'])));?></p>
              </div>
              <div class="table_type before">
                  <table style="table-layout:fixed;">
                  <colgroup>
                  <col width="18.17543859649%">
                  <col width="">
                  <col width="18.17543859649%">
                  <col width="">
                  </colgroup>
                      <tbody>
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
                      </tbody>
                  </table>
              </div>
              <div class="table_type after">
                  <table style="table-layout:fixed;">
                  <colgroup>
                  <col width="28.17543859649%">
                  <col width="">
                  </colgroup>
                      <tbody>
                      <tr>
                          <th scope="col">작품명</th>
                          <td><?php echo $Work->attr['goods_name'];?></td>
                      </tr>
                      <tr>
                        <th scope="col">사이즈</th>
                          <td><?php echo $artWorkSize; ?></td>
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
                      </tbody>
                  </table>
              </div>
          </article><!-- //WorkDetail -->
          <article id="Artist"  class="proview_area2">
              <h1><span class="ico2">PROFILE</span></h1>
                <div class="group_lft">
                      <img src="<?php echo artistUploadPath, $Artist->attr['photo_up_file_name'];?>" alt="">
                </div><!-- //group_lft -->

          <div class="group_rgh">
              <p class="name"><span><?php echo htmlspecialchars(stripslashes($Artist->attr['artist_name']));?></span></p>
              <p class="t1"><?php echo nl2br(strip_tags(stripslashes($Artist->attr['artist_greeting'])));?></p>
              <div class="lst about">
                  <ul>
                      <li>
                          <div class="h">직업</div>
                          <div class="cont"><?php echo htmlspecialchars(stripslashes($Artist->attr['artist_job']));?></div>
                      </li>
                      <li>
                          <div class="h">출생</div>
                          <div class="cont">
							<?php if (!empty($Artist->attr['artist_birthday'])) { ?>
								<?php echo substr($Artist->attr['artist_birthday'], 0, 4); ?>
							<?php }else{ ?>Closed<?php }?>
						  </div>
                      </li>
                      <li>
                          <div class="h">장르</div>
                          <div class="cont"><?php echo htmlspecialchars(stripslashes($Artist->attr['artist_genre']));?></div>
                      </li>
                  </ul>
              </div>
              <div class="lst exp">
                  <ul>
					<?php if ($aEducationYearCnt > 0 && (!empty($aEducationYear[0]) ||  !empty($aEducationName[0]))): ?>
                      <li>
                          <div class="h">학력</div>
                          <div class="cont">
						<?php for($i = 0; $i < $aEducationYearCnt; $i++): ?>
							<?php if (!empty($aEducationYear[$i]) ||  !empty($aEducationName[$i])): ?>
                              <p><?php echo $aEducationYear[$i];?>  <?php echo htmlspecialchars(stripslashes($aEducationName[$i]));?></p>
							<?php endif; ?>
						<?php endfor; ?>
                          </div>
                      </li>
					<?php endif; ?>
					<?php if ($aPrivateYearCnt > 0 && (!empty($aPrivateYear[0]) ||  !empty($aPrivateName[0]))): ?>
                      <li>
                          <div class="h">개인전</div>
                          <div class="cont">
							<?php for($i = 0; $i < $aPrivateYearCnt; $i++): ?>
								<?php if (!empty($aPrivateYear[$i]) ||  !empty($aPrivateName[$i])): ?>
                              <p><?php echo $aPrivateYear[$i];?> <?php echo htmlspecialchars(stripslashes($aPrivateName[$i]));?></p>
							<?php endif; ?>
						<?php endfor; ?>
                          </div>
                      </li>
					<?php endif; ?>
					<?php if ($aTeamYearCnt > 0 && (!empty($aTeamYear[0]) ||  !empty($aTeamName[0]))): ?>
                      <li>
                          <div class="h">단체전</div>
                          <div class="cont">
							<?php for($i = 0; $i < $aTeamYearCnt; $i++): ?>
								<?php if (!empty($aTeamYear[$i]) ||  !empty($aTeamName[$i])): ?>
                              <p><?php echo $aTeamYear[$i];?> <?php echo htmlspecialchars(stripslashes($aTeamName[$i]));?></p>
							<?php endif; ?>
						<?php endfor; ?>
                          </div>
                      </li>
					<?php endif; ?>
					<?php if ($aCvYearCnt > 0 && (!empty($aCvYear[0]) ||  !empty($aCvName[0]))): ?>
                      <li>
                          <div class="h">프로젝트</div>
                          <div class="cont">
							<?php for($i = 0; $i < $aCvYearCnt; $i++): ?>
								<?php if (!empty($aCvYear[$i]) ||  !empty($aCvName[$i])): ?>
                              <p><?php echo $aCvYear[$i];?> <?php echo htmlspecialchars(stripslashes($aCvName[$i]));?></p>
							<?php endif; ?>
						<?php endfor; ?>
                          </div>
                      </li>
					<?php endif; ?>
					<?php if ($aAwardYearCnt > 0 && (!empty($aAwardYear[0]) ||  !empty($aAwardName[0]))): ?>
                      <li>
                          <div class="h">수상</div>
                          <div class="cont">
							<?php for($i = 0; $i < $aAwardYearCnt; $i++): ?>
								<?php if (!empty($aAwardYear[$i]) ||  !empty($aAwardName[$i])): ?>
                              <p><?php echo $aAwardYear[$i];?> <?php echo htmlspecialchars(stripslashes($aAwardName[$i]));?></p>
							<?php endif; ?>
						<?php endfor; ?>
                          </div>
                      </li>
					<?php endif; ?>
                  </ul>
              </div>
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
                            <div class="bar" style="height:<?php echo $px;?>px"><span><?php echo (!empty($aAnnualArtworkQty[$i])) ? $aAnnualArtworkQty[$i] : 0;?></span></div>
                            <p class="year"><?php echo $aAnnualArtworkYear[$i];?></p>
                      </li>
					<?php ++$j; endfor; ?>
                  </ul>
              </div>
          </div><!-- //group_rgh -->

          </article><!-- //Artist -->
          <article id="Recommends"  class="proview_area2">
          <h1><span class="ico3">ANOTHER</span></h1>
              <div id="shoppingArea">
                <h3 class="tit">이 작품을 본 고객이 함께 본 작품</h3>

                <section id="shopping_list_id" class="shopping_list">
                  <button class="prev"><img src="/images/common/btn_prev_view.gif" alt="이전"></button>
                  <button class="next"><img src="/images/common/btn_next_view.gif" alt="다음"></button>
                  <div class="inner">
                        <ul>
						<?php if (is_array($recommendList)): ?>
							<?php foreach($recommendList as $row): ?>
                              <li>
                                 <div class="img">
								<?php if ($row['goods_cnt'] === '0'):?>
									<p class="circle"><img src="/images/ico/ico_red_circle.png" alt="판매불가"></p>
								<?php else: ?>
									<?php if ($row['is_rental'] === 'Y'): ?>
										<p class="circle"><img src="/images/ico/ico_blue_circle.png" alt="렌탈불가"></p>
									<?php endif; ?>
								<?php endif; ?>
									<a href="#" onclick="goods='<?php echo $row['goods_idx']; ?>'; marketViewMotion(); return false;"><img src="<?php echo goodsListImgUploadPath, $row['goods_list_img'];?>" alt=""></a></div>
                                  <div class="txt">
                                      <p class="writer"><?php echo $row['artist_name'];?></p>
                                      <p class="art_tit"><?php echo $row['goods_name'];?></p>
                                  </div>
                              </li>
							<?php endforeach; ?>
						<?php endif; ?>
                          </ul>
                  </div>
                </section>
              </div>


          </article><!-- //Recommends -->
          <article id="Shipping"  class="proview_area2">
          <h1><span class="ico4">PROCESS</span></h1>
                <section id="orderInfo">
                <h2 class="title5">배송안내</h2>
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
                   주문 즉시 art1의 패키지에 안전하게 포장  →  발송  <br>※ 발송 후 배송까지 평균 2일 소요됩니다.
                      </p>
                    </li>
                  </ul>
                </div>
                <div class="txtBox">
                  <!-- <ol class="lst_num1">
                    <li><span class="num">- </span>배송일정은 계약금이입금된 후 배송날짜를 배정해서 안내해 드립니다.</li>
                    <li><span class="num">- </span> 도서 산간지역의 경우 평균배송기간보다 지연될 수 있습니다.</li>
                    <li><span class="num">- </span> 주문폭주, 특정기간(명절, 공휴일 등), 택배사 사정 등에 따라 배송이 지연될 수있으니 양해바랍니다. </li>
                  </ol> -->
                </div>
                <h2 class="title5 n2">교환/반품안내</h2>
                <div class="txtBox">
                  <ol class="lst_num1">
                    <li><span class="num">1.</span> 오배송, 제품 하자, 단순변심으로 인한 교환/반품 모두작품 인도일기준 7일 이내에가능합니다.</li>
                    <li><span class="num">2.</span> 상품하자 및 오배송 등의 사유로 교환/반품시 배송비는 업체가 부담하며, 고객 변심에 의한 교환/반품인 경우에는고객이 부담하여야 합니다.</li>
                    <li><span class="num">3.</span> 반품 택배비는 작품에 따라 상이할 수 있으므로 반드시 고객센터로 확인 후 교환/반품 접수바랍니다.</li>
                    <li><span class="num">4.</span> 교환/반품을 원하는 작품은 수령일 기준 7일내에 보내야 합니다.    </li>
                  </ol>
                </div>
                <h2 class="title5 n3">청약 철회가 불가능한 경우</h2>
                <div class="txtBox">
                  <ol class="lst_num1">
                    <li><span class="num">1.</span>고객님의 사유로 작품이 파훼손되어 복구불가한 경우</li>
                    <li><span class="num">2.</span> 이용자의 사용 또는 일부 쇠에 의하여 재화 등의 가치가 현저히 감소한 경우</li>
                    <li><span class="num">3.</span> 시간의 경과에 의하여 재판매가 곤란할 정도로 작품의 가치가 현저히 감소한 경우</li>
                    <li><span class="num">4.</span> 작품보증서를 분실한 경우</li>
                  </ol>
                </div>
              </section>
          </article><!-- //Shipping -->
    </div>
</section>
<? if($check_mobile === true){ ?>
<style type="text/css">
#marketRView{
    /* -webkit-overflow-scrolling: touch; -webkit-transform: translateZ(0px);
    -webkit-transform: translate3d(0,0,0);
    -webkit-perspective: 1000; */
  }

</style>

<? } ?>

<script>
var marketViewViewport = $("#marketRView");
var marketViewViewportInner = marketViewViewport.find(".inner_view");
var marketViewScroll;

 marketViewScroll = new IScroll("#marketRView", {
    scrollX: false,
    <? if($check_mobile === true){ ?>
    click: true,
    <? } ?>
    scrollbars: 'custom',
    mouseWheelSpeed:200,
    mouseWheel: true,
    probeType: 2,
    preventDefaultException: {
    // default config, all form elements,
    // extended with a WebComponents Custom Element from the future
    tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|X-WIDGET)$/,
    // and allow any element that has an accessKey (because we can)
    accessKey: /.+/
  }
 });

marketViewScroll.on('scroll', updatePosition);
marketViewScroll.on('scrollEnd', updatePosition);

function updatePosition () {
	if((this.y>>0 <= 0)){
		$("#marketRView header .close").css({"transform" : "translateY("+(-(this.y>>0))+"px)"});
	}
}

function winParsent(n){
  var winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  con(winWidth)
  var n2  = ((winWidth-17) / 100)*n;
  return n2;
}

function marketViewOpen(){

	function resize(){
		var winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            if($("#container_sub").length > 0){
                var outsideSize = $(".container_inner").offset().left;
            }else{
                var outsideSize = $("#header .header_inner").offset().left;
            }

            marketViewViewport.css({
              "display":"block"
              });
            marketViewViewportInner.css({
              "padding-top":$("#header").height()
            });
            marketViewViewportInner.find(".product_info").css({
               "padding-top":marketViewViewportInner.find(".header").height() + 50
            });
            marketViewViewport.find(".header").css({
                    "position":"fixed",
                    "left":"",
                    "top":"",
                  });
            /*marketViewViewport.find(".header").css("top",$("#header").height());*/
		if(winWidth > 1250){
			marketViewViewport.stop().animate({"width":marketViewViewportInner.outerWidth(true) + outsideSize},500,function(){});
			marketViewViewport.css("padding-right","");
		}else if(winWidth <= 1250 && winWidth > 960  ){
			marketViewViewport.stop().animate({"width":marketViewViewportInner.outerWidth(true)},500,function(){});
			marketViewViewport.css("padding-right",40);
		}else if(winWidth <= 960 ){
                var par = winWidth / 100;
                // con(winParsent(96));
                marketViewViewportInner.css({
                      "padding-top":$("#header").height(),
                      "width":winParsent(92)
                    });
                marketViewViewport.stop().animate({
                  "width":"92%"
                },500,function(){}).css({
			"padding":"0 2% 2%"
			});
                marketViewViewportInner.find(".product_info").css({
                 "padding-top":"0"
              });

                  marketViewViewport.find(".header").css({
                    "position":"relative",
                    "left":"",
                    "top":"",
                  });

		}
		//con("outsideSize:::::"+outsideSize);
	}

    /*   marketViewViewport.css({
          "-webkit-overflow-scrolling":"touch"
          });*/
	$("html").addClass("noScroll").css("margin-right",$.scrollbarWidth());
      $("#header .header_inner").css("left",-(8));
      $("body").off("mousewheel");
       imagesLoaded(marketViewViewport,function(){
        marketViewScroll.refresh();
      });
      //
      //imagesLoaded(marketViewViewport,function(){
          topBannerClose();
          resize();
          zoomMotion();
          viewInRoom();
              var recommends_owl = $("#marketRView #shoppingArea .shopping_list .inner > ul");
              recommends_owl.owlCarousel({
                    autoPlay: 2500, //Set AutoPlay to 3 seconds
                    items : 4,
                    itemsDesktop : [1000,5], //5 items between 1000px and 901px
                    itemsDesktopSmall : [900,3], // betweem 900px and 601px
                    itemsTablet: [600,3], //2 items between 600 and 0
                    itemsMobile: [460,2], //2 items between 600 and 0

              });

              $("#marketRView #shoppingArea .shopping_list > button.next").click(function(){
                recommends_owl.trigger('owl.next');
              })
              $("#marketRView #shoppingArea .shopping_list > button.prev").click(function(){
                recommends_owl.trigger('owl.prev');
              })


  //    })




      //rollngbanner1();
	tab("#marketRView .tabBox",1);
	coverOpen();
	$("#marketRView .header .close,#coverSolo").on("click.marketView",marketViewClose);
	$(window).on("resize.marketView",function(){resize();});

};//marketViewOpen

function marketViewScrollCheck(){
}


function marketViewClose(){
    //marketViewScroll.disable();
    var winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	$("html").removeClass("noScroll").css("margin-right","");
      $("#header .header_inner").css("left","");
       marketViewViewportInner.css({
              "padding-top":"",
              "width":""
            });
          if(winWidth > 1250){
      		marketViewViewport.stop().animate({"width":0},500,function(){
      			marketViewViewport.css({
      				"width":"",
      				"padding-right":""
    				});
                        marketViewViewport.css("display","none");
      		});

            }else if(winWidth <= 960 ){
                  marketViewViewport.css({"width":0});
                  marketViewViewport.css({
                  "width":"",
                  "padding":""
                  });
                  marketViewViewport.css("display","none");
            }

		$.srSmoothscroll({step: 100,speed: 400,ease: 'swing'});
		coverClose();
		$("#marketRView .header .close,#coverSolo").off("click.marketView");
		$(window).off("resize.marketView");
              marketViewViewport.css({
                "width":"",
                "padding":""
                });

};//marketViewClose


marketViewOpen();

function request() {
<?php if ($_SESSION['logged_in'] === 1): ?>
	document.location.href="/member/reservation.php?goods=<?php echo $Work->attr['goods_idx']?>&aj=1";
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

function wishLayer() {
	if ($(".layerPopupT1.wishlist").css("display") == "none"){
		$(".layerPopupT1").fadeOut();
		$(".layerPopupT1.wishlist").fadeIn();
	}
	else{
			$(".layerPopupT1.wishlist").fadeOut();
	}

	//$(".totalNum>span").text(qty);
}


function order(ord) {
<?php if ($_SESSION['logged_in'] === 1): ?>

	<?php if ($Work->attr['price_exchange_state'] === 'Y' && trim($Work->attr['price_exchange_text']) === '판매불가') {?>
		alert('판매가 불가능한 작품입니다.');
	<?php } else { ?>
		$("#ord").val(ord);
		document.goodsFrm.at.value = "update";
		document.goodsFrm.target = "action_ifrm";
		document.goodsFrm.submit();
	<?php } ?>

<?php else : ?>
	goLogin();
<?php endif; ?>
}

function wish() {
<?php if ($_SESSION['logged_in'] === 1): ?>
	//$("#btnWishlist").unbind("click");
	/*
	$.ajax({
		type:"POST",
		url:"/basket/index.php",
		dataType:"JSON",
		data:{"idx":$("#goods").val(), "at":"wish"},
		success:function(data) {
			if (data.cnt > 0) {
				wishLayer();
				//alert("WISH LIST 에 등록되었습니다.")
			}
			else {
				alert("이미 WISH LIST 에 존재합니다.");
				//$("#btnWishlist").bind("click", function(){wish();});
			}
		},
		error:function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
	*/

	//$("#ord").val(ord);
	document.goodsFrm.at.value = "wish";
	document.goodsFrm.target = "action_ifrm";
	document.goodsFrm.submit();
<?php else : ?>
	goLogin();
<?php endif; ?>
}

function rental() {
<?php if ($_SESSION['logged_in'] === 1): ?>
	<?php if ($Work->attr['rental_exchange_state'] === 'Y' && trim($Work->attr['rental_exchange_text']) === '렌탈불가') { ?>
		alert('렌탈이 불가능한 제품입니다.');
	<?php } else { ?>
		document.location.href = "/marketPlace/rental/index.php?goods=<?php echo $Work->attr['goods_idx']?>";
	<?php } ?>
<?php else : ?>
	goLogin();
<?php endif; ?>
}

function goLogin() {
	if(confirm("로그인을 해야 사용할 수 있는 기능입니다.\r\n로그인 페이지로 이동하시겠습니까?")){
		location.href="/member/login.php?returnUrl="+location.href;
	}
}

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
      var bigImg = $(".BigArea .img > img").attr("src");
      var img = $("<img>").attr("src",bigImg)
      .css({
      "position":"absolute",
      "left":oL,
      "top":oT,
      "z-index":10
      })
      .addClass("upImg").appendTo(marketBg);
      viewport = win.height();
      /*wrap.css({
        "height":viewport,
        "overflow":"hidden"
      });*/
      marketBg.css({"opacity":1,"display":"block"})
      .find(".bg."+type).css({"display":"block","opacity":0})
      .animate({"opacity":1},800).end()
      .find("h3.h_"+type).css("display","block");

      $(".upImg").delay(800).animate({
        "left":"50%",
        "top":178,
        "width":230,
        "margin-left":-115
      },1000);
      close.off().on("click",function(){
        /*wrap.css({
          "height":"",
          "overflow":""
        });*/
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


function rollngbanner1(){
    var $obj = $("#shopping_list_id");
    var $mask = $("#shopping_list_id .inner");
    var $pos = $mask.find("ul");
    var $prev = $obj.find(".prev");
    var $next = $obj.find(".next");
    /*var $tab = $obj.find(".align_list");*/
    var boxSize , boxmargin ,totalBoxSize , exp , pageTotal;
    var total = $pos.find(">li").length;
    var allBox = 4;
    var maskBoxSize = $mask.outerWidth();
    var prevExp = 0;
    var pageDetailNum = 0;
    /*var tabChange = false;*/

    function Exp(){
        if(WinWdith > 1024){
          exp = 4;
        }else if(WinWdith <= 1024 && WinWdith > 768 ){
          exp = 4;
        }else if(WinWdith <= 768 && WinWdith > 560 ){
          exp = 3;
        }else if(WinWdith <= 560){
          exp = 2;
        }
    }

    function sizeCalculation(){
        $pos.css({"width":""});
        $mask.css({"width":"","margin":""});
        $pos.find(">li:eq(1)").css({"width":"","margin-left":""});
      boxSize = parseInt($pos.find(">li:eq(1)").css("width"));
      boxmargin = parseInt($pos.find(">li:eq(1)").css("margin-left"));
      maskBoxSize = $mask.outerWidth();
      totalBoxSize = boxSize + boxmargin;
      total = $pos.find(">li").length;
            $mask.css({
                "width": parseInt(totalBoxSize * exp),
                "margin": "0 auto"
              })
      $pos.css({
        "width": (totalBoxSize + 100) * total
      })

      $pos.find(">li").each(function(index){
        $(this).css({
          "width":boxSize,
          "margin-left":boxmargin
        });
      });
    };

     function resize(){
        WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        Exp();
        sizeCalculation();
        if(exp != prevExp /*|| tabChange == true */ ){
             prevExp = exp;
          //   tabChange = false;
            pageDetailNum = 0;
            pageTotal = total -  exp;
            pageingMotion();
            $pos.css({"left":0 });
        }
     }//resize


    function pageingMotion(){
      if(exp < total){
          $next.css("display",(pageTotal > pageDetailNum) ? "block" : "none");
          $prev.css("display",(0 >= pageDetailNum) ? "none" : "block");
        }else{
          $next.css("display","none");
          $prev.css("display","none");
        }
     }//pageingMotion

     function posMotion(pageDetailNum){
     $pos.animate({"left": -(totalBoxSize * pageDetailNum) },300,"swing");
      pageingMotion();
     }//posMotion

      $mask.swipe( {
        //Generic swipe handler for all directions
        swipeLeft:function(event, direction, distance, duration, fingerCount) {
          if(!$pos.is(":animated")){
            pageDetailNum = (pageTotal <= pageDetailNum) ? pageTotal : pageDetailNum + 1;
            posMotion(pageDetailNum);
            con("pageDetailNum:::::::"+pageDetailNum);
            con("pageTotal:::::::"+pageTotal);


         }

        },
         swipeRight:function(event, direction, distance, duration, fingerCount) {
         if(!$pos.is(":animated")){
            pageDetailNum = (0 >= pageDetailNum) ? 0 : pageDetailNum - 1;
            posMotion(pageDetailNum);
          };
        },
        excludedElements:".noSwipe",
        threshold:80
      });





      $next.on("click",function(){
        if(!$pos.is(":animated")){
            pageDetailNum = (pageDetailNum >= pageTotal) ? pageTotal : pageDetailNum + 1;
            posMotion(pageDetailNum);
         }

      });

      $prev.on("click",function(){
          if(!$pos.is(":animated")){
            pageDetailNum = (pageDetailNum <= 0) ? 0 : pageDetailNum - 1;
            posMotion(pageDetailNum);
          };
      });

    $(window).resize(function(){resize()});
    // $tab.find("li").on("click",function(){
    //     tabIndex = $(this).index();
    //     $pos = $mask.find(".goods_list:eq("+tabIndex+")");
    //    tabChange = true;
    //     resize();
    // })
    resize();

  }//rollngbanner1

function zoomMotion(){
      var $wrap = $("#wrap");
      var $zoomBox = $("#zoomBg");
      var $bigImg = $(".BigArea .img");
      var $zoomImg = $zoomBox.find(".photo");
      var myScroll;
      myScroll = new IScroll('#zoomBg .photo', {
      	scrollX: false, freeScroll: true,
    	mouseWheelSpeed:200,
    	mouseWheel: true,
      });

$("#zoomBg .photo").on("mousedown mouseup",function(e){
  if(e.type == "mousedown"){
    $(this).css("cursor","url(/images/ico/closedhand.cur.ico) 7 5, url(/images/ico/closedhand.cur.ico), move");
  }else{
    $(this).css("cursor","url(/images/ico/openhand.cur.ico) 7 5, url(/images/ico/openhand.cur.ico), default");
  };

})
$("button.zoom").click(function(){
        var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        var windowTop = $(window).scrollTop();
            var bigImgSrc = $bigImg.find("img").attr("src");
            var onBox = $("<span>").addClass("on");
            var backgound = $("<div>").attr({
               "id": "cover"
             }).css({
              "position":"fixed",
              "left":"0",
              "top":0,
              "width":"100%",
               "height": "100%",
               "z-index":11,
               "cursor":"pointer",
               "display":"none"
             })
            $("body").append(backgound);

            //$zoomImg.find("img").attr("src",bigImgSrc);

        $zoomBox.css({
          "position":"fixed",
          "left":"3%",
          "top":"3%",
          "width": "94%",
          "height" : "94%",
          "margin-left" : 0

        })

          fadePlayMotion($zoomBox , true , 400);
          fadePlayMotion(backgound , true , 400);
          $("#zoomBg .close , #cover").off("click").on("click",zoomClose);
          $("#zoomBg .artSlide ul.list > li > a").off("click").on("click",zoomThumb);
          $(window).on("resize",zoomClose);
          myScroll.refresh();

		/*이미지 썸네일 슬라이드 추가*/
		var artSl = $("#zoomBg .artSlide");
		var artSl_unit = $("#zoomBg .artSlide ul.list > li");
		var viewList = 6;
		artSl_unit.eq(0).addClass("top");
		if(artSl_unit.length < 7){
			artSl.find(" > button").hide();
		}else{
			artSl.find(" > button").on('click',function(){
				var top_unit = artSl.find(' ul.list > li.top');
				var next;
				if($(this).hasClass('up')){
					if(top_unit.index() <= 0){
						if(!artSl.find("ul.list").is(':animated')){
							artSl.find("ul.list").animate({'top':-(top_unit.position().top-20)},300,"easeOutQuad");
							artSl.find("ul.list").animate({'top':-(top_unit.position().top)},250, "easeInQuad");
						}
						return false;
					}
					next = top_unit.prev();
				}else{
					if(top_unit.index()+viewList >= artSl_unit.length){
						if(!artSl.find("ul.list").is(':animated')){
							artSl.find("ul.list").animate({'top':-(top_unit.position().top+20)},300,"easeOutQuad");
							artSl.find("ul.list").animate({'top':-(top_unit.position().top)},250, "easeInQuad");
						}
						return false;
					}
					next = top_unit.next();
				}
				artSl.find("ul.list").animate({'top':-(next.position().top)});
				next.siblings('.top').removeClass('top').end().addClass('top');
			});
		}

          function zoomClose(){

          fadePlayMotion($("#cover") , false , 400);
          $zoomBox.fadeTo(400,0,function(){
            $(this).css("display","none");
            $("#cover").remove();
          });

          $("#zoomBg .close , #cover").off("click");
          $(window).off("resize",zoomClose);
        };//zoomClose

        function zoomThumb(){
            var bimg = $(this).data("img");
            $("#zoomBg .artSlide ul.list > li > .on").remove();
              $zoomImg.find("span > img").attr("src",bimg);
              $(this).before(onBox);
               myScroll.refresh();
        };



      });

  }//zoomMotion

$(function(){
	$("#btnRequest").off("click").on("click", function(){request();});
	$("#btnBasket").off("click").on("click", function(){order("basket");});
	$("#btnWishlist").off("click").on("click", function(){wish();});
	//$("#btnWishlist").click(function(){wish();});
	$("#btnRental").off("click").on("click", function(){rental();});

	$(".layerOpen.cart,.layerPopupT1 .close").click(function(){
		if ($(".layerPopupT1.cart").css("display") == "none"){
			//$(".layerPopupT1").fadeOut();
			//$(".layerPopupT1.cart").fadeIn();
		}else{
			$(".layerPopupT1.cart").fadeOut();
		}
	});

	$(".layerOpen.wishlist,.layerPopupT1 .close").click(function(){
		if ($(".layerPopupT1.wishlist").css("display") == "none"){
		}else{
			$(".layerPopupT1.wishlist").fadeOut();
		}
	});


});


</script>
<?php

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