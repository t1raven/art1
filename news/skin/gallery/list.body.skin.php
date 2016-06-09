                    <section class="lst">
                        <?php if (!empty($list_img)) : ?>
						<div class="item" >
                            <a href="?<?php echo PageUtil::_param_get('idx='.$row['news_idx'].'&at=read');?>">
                              <img src="<?php echo $list_img;?>" class="pc" alt="">
                              <img src="<?php echo $rescent_img;?>" class="mobile" alt="">
                            </a>
                        </div><!-- trend_imgBox -->
						<?php endif ; ?>
                        <div class="cont">
                            <div class="inner">
                              <p class="h"><a href="?at=read&subm=<?php echo $subm; ?>&idx=<?php echo $row['news_idx']; ?>"><?php echo $row['news_title']?></a></p>
                              <p class="reporter"><?php echo (empty($row['source'])) ? NULL: '['.$row['source'].']'  ;?> <?php echo $row['reporter_name'];?> | <?php echo substr($row['create_date'],0,4)?>.<?php echo substr($row['create_date'],5,2)?>.<?php echo substr($row['create_date'],8,2)?></p>
                              <p class="txt">
                                <a href="?at=read&subm=<?php echo $subm; ?>&idx=<?php echo $row['news_idx']; ?>"><?php echo strip_tags($row['new_paragraph_content']) ;?></a>
                              </p><!-- //text_cont -->
                            </div><!-- //inner -->
                        </div><!-- //cont -->
                    </section><!-- //lst -->