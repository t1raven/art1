 <?php if (!defined('OKTOMATO')) exit; ?>
        <section id="basicArea" class="dash_lst">
              <header class="header">
                <h1 class="title1">기본정보</h1>
              </header>
              <article class="article">
                  <ul class="lst_sort1">
				  <?php if (!$Member->getRead($dbh)): ?>
				  <?php else: ?>
                      <li><strong>E-mail(ID)</strong><span><?php echo $Member->attr['user_id']; ?></span></li>
                      <li><strong>SMS 수신</strong><span>NO</span></li>
                      <li><strong>뉴스레터 수신</strong><span><?php echo ($Member->getNewletterStatus($dbh,$Member->attr['user_id'])== true)?'YES':'NO' ;?></span></li>
				  <?php endif; ?>
                  </ul><!-- //lst_sort1 -->

                  <div class="btn_bot lft">
                    <a href="/member/modify/?at=write" class="btn_pack samll2 black">수정</a>
                  </div><!-- //btn_bot -->

              </article><!-- //article -->
          </section><!-- //basicArea -->


          <section id="customerArea" class="dash_lst">
              <header class="header">
                <h1 class="title1">상담내역</h1>
                <a href="/member/advice/" class="more"><img src="/images/btn/btn_bbs_more.gif" alt="더보기"></a>
              </header>
              <article class="article">
                  <div class="table_dot">
                    <table summary="상담내역에 관한 날짜,제목,관련문의,답변여부에 관한 표입니다.">
                      <caption>상담내역</caption>
                      <colgroup>
                        <col class="data2 pcTable">
                        <col>
                        <col class="t4 pcTable">
                        <col class="t4 pcTable">
                      </colgroup>
                      <tbody>
                    <?php if (is_array($adviceList) && count($adviceList) > 0): ?>
                      <?php foreach($adviceList as $val): ?>
						<?php
							if ($val['request_status']) {
								$request_status = ' fc_answer ';
								$request_status_text = '답변 ';
							} else {
								$request_status = 'fc_noanswer';
								$request_status_text = ' 미답변 ';
							}
							if ($val['request_type'] == 'rental') {
								$request_type_text = '렌탈상담';
							}elseif($val['request_type'] == 'advice') {
								$request_type_text = '작품상담';
							}
						?>
                        <tr>
                          <td class="ta-l pcTable"><span class="fc_data">
						  <?php echo substr($val['create_date'], 0, 4);?> / <?php echo substr($val['create_date'], 5, 2);?> / <?php echo substr($val['create_date'], 8, 2);?></span></td>
                          <td class="ta-l">
                            <a href="/member/advice/?idx=<?php echo $val['advice_idx'];?>" class="h"><?php echo mb_strimwidth($val['advice_user_content'], 0, 30, "...",'UTF-8')?></a>
                            <!-- 모바일시 나옴 -->
                            <div class="mobileTableBox">
                              <span class="fc_data"><?php echo substr($val['create_date'], 0, 4);?> / <?php echo substr($val['create_date'], 5, 2);?> / <?php echo substr($val['create_date'], 8, 2);?></span>
                              <span><?php echo $request_type_text ;?></span>
                              <span class="<?php echo $request_status;?>"><?php echo $request_status_text ;?></span>
                            </div>
                          </td>
                          <td class="pcTable"><?php echo $request_type_text ;?></td>
                          <td class="pcTable"><span class="<?php echo $request_status;?>"><?php echo $request_status_text ;?></span></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                       <tr><td colspan="4">상담내용이 없습니다.</td></tr>
                    <?php endif; ?>
                      </tbody>
                    </table>
                  </div><!-- //tableType -->
              </article><!-- //article -->

          </section><!-- //customerArea -->


          <section id="orderAddArea" class="dash_lst">
              <header class="header">
                <h1 class="title1">배송주소록</h1>
                <a href="/member/address" class="more"><img src="/images/btn/btn_bbs_more.gif" alt="더보기"></a>
              </header>
              <article class="article">
                  <div class="lst_order">
                  <?php if (is_array($addressList) && count($addressList) > 0): ?>
                      <?php foreach($addressList as $val): ?>
                      <div class="lst">
                        <div class="inner">
                            <h1><?php if ($val['default_state'] === 'Y'):?>기본<?php else:?>추가<?php endif;?> 배송주소</h1>
                            <div class="txt">
                                  <p><?php echo $val['user_name']?></p>
                                  <p><?php echo $val['user_addr_1'];?> <?php echo $val['user_addr_2'];?></p>
                            </div>
                            <div class="btn"><a href="javascript:;" onclick="addAddress();" class="fc_blue">수정</a> <a href="javascript:;" onclick="addAddress();" class="fc_blue">추가</a></div>
                          </div>
                      </div><!-- //lst -->
                      <?php endforeach; ?>
                  <?php else: ?>
                       <div>배송 주소가 없습니다. 배송 주소를 등록하여 주세요.</div>
                  <?php endif; ?>
                 </div><!-- //lst_order -->
              </article><!-- //article -->

          </section><!-- //orderAddArea -->


          <section id="wishListArea" class="dash_lst">
              <header class="header">
                <h1 class="title1">위시리스트</h1>
                <a href="/member/wish" class="more"><img src="/images/btn/btn_bbs_more.gif" alt="더보기"></a>
              </header>
              <article class="article">
                  <div class="lst_horizontal style4">
                      <ul>
                      <?php if (is_array($wishList) && count($wishList) > 0): ?>
                          <?php foreach($wishList as $row): ?>
                          <li>
                              <div class="photo">
                                <?php if ($row['goods_cnt'] === '0'):?>
                                    <p class="circle"><img src="/images/ico/ico_red_circle.png" alt="판매불가"></p>
                                <?php else: ?>
                                    <?php if ($row['is_rental'] === 'Y'): ?>
                                        <p class="circle"><img src="/images/ico/ico_blue_circle.png" alt="렌탈불가"></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <a href="#" onclick="goods='<?php echo $row['goods_idx']; ?>'; marketViewMotion(); return false;"><img src="<?php echo goodsListImgUploadPath, $row['goods_list_img'];?>" alt=""></a>
                              </div>
                              <div class="cont">
                                <p class="t1"><?php echo $row['artist_name'];?></p>
                                <p class="t2"><?php echo $row['goods_name'];?></p>
                              </div>
                              <div class="btn">
                                <!-- <?php if ($row['goods_lental_state'] === 'N' || $row['sold_out_state'] === 'Y'): ?>
                                  <button type="button" class="btn_pack radius Inactive" onclick="alert('렌탈이 불가능한 작품입니다.');">RENTAL</button>
                                <?php else: ?>
                                  <button type="button" class="btn_pack radius" onclick="rental('<?php echo $row['goods_idx'];?>')">RENTAL</button>
                                <?php endif; ?> -->

                                <?php if ($row['goods_lental_state'] === 'N' || $row['goods_cnt'] === '0' || $row['sold_out_state'] === 'Y'): ?>
                                  <button type="button" class="btn_pack radius Inactive" onclick="alert('판매가 불가능한 작품입니다.');">CART</button>
                                <?php else: ?>
                                  <button type="button" class="btn_pack radius" onclick="order('<?php echo $row['goods_idx'];?>');">CART</button>
                                <?php endif; ?>
                              </div>
                          </li>
                          <?php endforeach;?>
                      <?php else: ?>
                          <li>위시 리스트가 존재하지 않습니다.</li>
                      <?php endif; ?>
                      </ul>
                  </div>
              </article>
          </section><!-- //wishListArea -->


          <section id="orderInfoArea" class="dash_lst">
              <header class="header">
                <h1 class="title1">주문정보</h1>
                <a href="/member/order" class="more"><img src="/images/btn/btn_bbs_more.gif" alt="더보기"></a>
              </header>
              <article class="article">
                  <div class="table_dot">
                    <table summary="주문정보에 관한 날짜,제목,관련문의,답변여부에 관한 표입니다.">
                      <caption>주문정보</caption>
                      <colgroup>
                        <col class="data pcTable">
                        <col class="pcTable">
                        <col>
                        <col class="t4 pcTable">
                        <col class="t4 pcTable">
                      </colgroup>
                      <tbody>
                        <?php if (is_array($orderList) && count($orderList) > 0): ?>
                            <?php foreach($orderList as $row): ?>

                          <tr>
                            <td class="pcTable"><span class="fc_data"><?php echo str_replace('-', ' / ', substr($row['create_date'], 0, 10));?></span></td>
                            <td class="pcTable"><a href="#"><?php echo $row['ord_nbr'];?></a></td>
                            <td class="ta-l">
                              <a href="#" class="h"><?php echo $row['ord_goods'];?></a>
                              <!-- 모바일시 나옴 -->
                              <div class="mobileTableBox">
                                <span class="fc_data"><?php echo str_replace('-', ' / ', substr($row['create_date'], 0, 10));?></span>
                                <span><?php echo $row['ord_nbr'];?></span>
                                <span>\ <?php echo number_format($row['amount']);?></span>
                                <span><a href="#" class="handler">상세정보</a></span>
                              </div>
                            </td>
                            <td class="pcTable">\ <?php echo number_format($row['amount']);?></td>
                            <td class="pcTable"><a href="#" class="handler">상세정보</a></td>
                          </tr>
                          <tr class="answer">
                              <td colspan="5">
                                <section class="qnaContent">
                                  <div class="inner">
                                        <!-- 주문정보 내역 -->
                                        <div class="table_dot bdt-n">
                                              <table summary="상담내역에 관한 날짜,제목,관련문의,답변여부에 관한 표입니다.">
                                                <caption>상담내역</caption>
                                                <colgroup>
                                                  <col>
                                                  <col class="t4 pcTable">
                                                  <col class="t4 pcTable">
                                                </colgroup>
                                                <tbody>
                                                <?php
                                                        $orderListDetail = $DashBoard->getMyAccountOrderListDetail($dbh, $row['ord_nbr']);
                                                        if (is_array($orderListDetail)) {
                                                            foreach($orderListDetail as $val) {
                                                ?>
                                                  <tr>
                                                    <td class="ta-l">
                                                      <div class="thumb_photo">
                                                            <div class="photo">
                                                              <a href="#" onclick="goods='<?php echo $val['goods_idx']; ?>'; marketViewMotion(); return false;"><img src="<?php echo goodsListImgUploadPath, $val['goods_list_img'];?>" alt=""></a>
                                                            </div>
                                                            <div class="info">
                                                              <p class="t1"><?php echo $val['goods_name'];?></p>
                                                              <p class="t2">by <?php echo $val['artist_name'];?></p>
                                                              <div class="mobileTableBox">
                                                                  <span><?php echo $val['qty'];?></span>
                                                                  <span>\ <?php echo number_format($val['settlement_price']);?></span>
                                                                </div><!-- //mobileTableBox -->
                                                            </div>
                                                      </div><!-- //thumb_photo -->
                                                    </td>
                                                    <td class="pcTable"><?php echo $val['qty'];?></td>
                                                    <td class="pcTable">\ <?php echo number_format($val['settlement_price']);?></td>
                                                  </tr>
                                                  <?php } }?>
                                                </tbody>
                                              </table>
                                        </div><!-- //tableType -->
                                        <!-- //주문정보 내역 -->
                                      <button class="close"><img src="/images/btn/btn_close.png" alt="닫기"></button>
                                  </div>
                                </section>
                              </td>
                          </tr><!-- //answer -->
                          <?php endforeach; ?>
                         <?php else: ?>
                          <tr>
                            <td colspan="5">주문 내역이 없습니다.</td>
                          </tr>
                         <?php endif; ?>

                      </tbody>
                    </table>
                  </div><!-- //tableType -->
              </article>

          </section><!-- //orderInfoArea -->