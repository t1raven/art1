                  <li>
                      <?php if (!empty($list_img)) : ?>
					  <div class="thumb"><a href="?at=read&subm=<?php echo $subm; ?>&idx=<?php echo $row['news_idx']; ?>"><img src="<?php echo $list_img;?>" alt="" style="width: 100%; height: auto; margin-left: 0px;"></a></div>
                      <?php endif ; ?>
					  <div class="cont">
                        <h1><a href="?<? echo PageUtil::_param_get('idx='.$row['news_idx'].'&at=read') ?>"><?php echo htmlspecialchars_decode($row['news_title']);?></a></h1>
                        <p class="txt"><a href="?<? echo PageUtil::_param_get('idx='.$row['news_idx'].'&at=read') ?>"><?php echo strip_tags($row['new_paragraph_content']) ;?></a></p>
                        <p class="data"><?php echo (empty($row['source'])) ? NULL: '['.$row['source'].']'  ;?> <?php echo $row['reporter_name'];?> | <?php echo substr($row['create_date'],0,4)?>.<?php echo substr($row['create_date'],5,2)?>.<?php echo substr($row['create_date'],8,2)?></p>
                      </div>
                  </li>

