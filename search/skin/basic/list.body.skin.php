<?php if (!defined('OKTOMATO')) exit;?>
                            <li>
                                <div class="photo">
                                <?php if ($row['goods_cnt'] === '0'):?>
                                    <p class="circle"><img src="/images/ico/ico_red_circle.png" alt="판매불가"></p>
                                <?php else: ?>
                                    <?php if ($row['is_rental'] === 'Y'): ?>
                                        <p class="circle"><img src="/images/ico/ico_blue_circle.png" alt="렌탈불가"></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                                  <!--a href="/marketPlace/artwork_view.php?goods=<?php echo $row['goods_idx'];?>"><img src="<?php echo goodsListImgUploadPath, $row['goods_list_img'];?>" alt=""></a-->
                                  <a href="#" onclick="goods='<?php echo $row['goods_idx']; ?>'; marketViewMotion(); return false;"><img class="nomg" src="<?php echo goodsListImgUploadPath, $row['goods_list_img'];?>" alt=""></a>
                                </div>
                                <div class="cont">
                                  <p class="t1"><?php echo $row['artist_name'];?></p>
                                  <p class="t2"><?php echo $row['goods_name'];?></p>
                                </div>
                                <div class="btn">
                                 <?php if ($row['is_rental'] === 'Y' || $row['goods_cnt'] === '0' || $row['sold_out_state'] === 'Y'): ?>
                                  <button type="button" class="btn_pack radius Inactive" onclick="alert('렌탈이 불가능한 작품입니다.');">RENTAL</button>
                                <?php else: ?>
                                  <button type="button" class="btn_pack radius" onclick="rental('<?php echo $row['goods_idx'];?>')">RENTAL</button>
                                <?php endif; ?>
                                <?php if ($row['is_rental'] === 'Y' || $row['goods_cnt'] === '0' || $row['sold_out_state'] === 'Y'): ?>
                                  <button type="button" class="btn_pack radius Inactive" onclick="alert('판매가 불가능한 작품입니다.');">CART</button>
                                <?php else: ?>
                                  <button type="button" class="btn_pack radius layerOpen cart" onclick="order('<?php echo $row['goods_idx'];?>');">CART</button>
                                <?php endif; ?>
                                </div>
                            </li>