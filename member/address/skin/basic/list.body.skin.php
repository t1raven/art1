<?php if (!defined('OKTOMATO')) exit;?>
                    <div class="lst">
                      <div class="inner">
                          <h1><?php if ($row['default_state'] === 'Y'):?>기본<?php else:?>추가<?php endif;?> 배송주소</h1>
                          <div class="txt">
                                <p><?php echo $row['user_name'];?></p>
                                <p><?php echo $row['user_addr_1']?> <?php echo $row['user_addr_2'];?></p>
                          </div>
                          <div class="btn">
                              <a href="javascript:;" onclick="editAddress('<?php echo $row['addr_idx']?>', '<?php echo $row['user_name'];?>', '<?php echo $row['user_zip']?>', '<?php echo $row['user_addr_1']?>', '<?php echo $row['user_addr_2']?>', '<?php echo $row['user_email']?>', '<?php echo $row['user_tel']?>', '<?php echo $row['default_state']?>')"><span class="fc_blue">수정</span></a>
                              <a href="javascript:;" onclick="deleteAddress('<?php echo $row['addr_idx']?>');"><span class="fc_blue">삭제</span></a>
                          </div>
                        </div>
                    </div>

