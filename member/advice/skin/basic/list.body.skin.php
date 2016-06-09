                      <tr>
                        <td class="ta-l pcTable"><span class="fc_data"><?php echo substr($row['create_date'], 0, 4);?> / <?php echo substr($row['create_date'], 5, 2);?> / <?php echo substr($row['create_date'], 8, 2);?></span></td>
                        <td class="ta-l">
                          <a href="#" class="h handler"><?php echo mb_strimwidth($row['advice_user_content'], 0, 30, "...",'UTF-8')?></a>
                          <!-- 모바일시 나옴 -->
                          <div class="mobileTableBox">
                            <span class="fc_data"><?php echo substr($row['create_date'], 0, 4);?> / <?php echo substr($row['create_date'], 5, 2);?> / <?php echo substr($row['create_date'], 8, 2);?></span>
                            <span><?php echo $request_type_text ;?></span>
                            <span class="<?php echo $request_status;?> handler"><?php echo $request_status_text;?></span>
                          </div>
                        </td>
                        <td class="pcTable"><?php echo $request_type_text ;?></td>
                        <td class="pcTable"><span class="<?php echo $request_status;?> handler"><?php echo $request_status_text;?></span></td>
                      </tr>
                      <tr class="answer">
                          <td colspan="4">
                            <section class="qnaContent">
                              <div class="inner">
                                  <ul>

<?php
if (!empty($row['goods_idx'])){
?>
                                    <li>
                                      <strong class="h">문의작품</strong>
                                      <div class="cont">
                                         <div class="thumb_photo">
                                                <div class="photo">
                                                    <img src="<?php echo goodsListImgUploadPath.$row['goods_list_img']; ?>" alt="">
                                                </div>
                                                <div class="info">
                                                  <p class="t1"><?php echo $row['goods_name']; ?></p>
                                                  <p class="t2">by <?php echo $row['artist_name']; ?></p>
                                                  <div class="mobileTableBox">
                                                      <span><?php echo number_format($row['goods_cnt']); ?></span>
                                                      <span>\ <?php echo number_format($row['goods_sell_price']); ?></span>
                                                    </div><!-- //mobileTableBox -->
                                                </div>
                                          </div><!-- //thumb_photo -->
                                      </div><!-- cont -->
                                    </li>
<?php
}
?>
                                    <li>
                                      <strong class="h">문의내용</strong>
                                      <div class="cont">
                                        <p><?php echo $row['advice_user_content'];?></p>
                                      </div>
                                    </li>
                                    <?php
                                    if($row['request_status']){
                                    ?>
                                    <li>
                                      <strong class="h">답변</strong>
                                      <div class="cont">
                                        <p><?php echo $row['advice_amdin_memo'];?></p>
                                      </div>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                  </ul>
                                  <button class="close"><img src="/images/btn/btn_close.png" alt="닫기"></button>
                              </div>
                            </section>
                          </td>
                      </tr><!-- //answer -->