                        <?php if (is_array($orderList)): ?>
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
                                                        $orderListDetail = $Order->getMyAccountOrderListDetail($dbh, $row['ord_nbr']);
                                                        if (is_array($orderListDetail)) {
                                                            foreach($orderListDetail as $val) {
                                                ?>
                                                  <tr>
                                                    <td class="ta-l">
                                                      <div class="thumb_photo">
                                                            <div class="photo">
                                                            <?php if ($val['goods_cnt'] === '0'):?>
                                                                <p class="circle"><img src="/images/ico/ico_red_circle.png" alt="판매불가"></p>
                                                            <?php else: ?>
                                                                <?php if ($val['is_rental'] === 'Y'): ?>
                                                                <p class="circle"><img src="/images/ico/ico_blue_circle.png" alt="렌탈불가"></p>
                                                                <?php endif; ?>
                                                            <?php endif; ?>

                                                              <img src="<?php echo goodsListImgUploadPath, $val['goods_list_img'];?>" alt="">
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