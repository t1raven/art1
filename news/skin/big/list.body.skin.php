                    <li>
                      <div class="inner">
                        <div class="d-tc">
                              <div class="data">
                                <span class="year"><?php echo substr($row['create_date'],0,4)?></span> <span class="mon"><?php echo substr($row['create_date'],5,2)?>.<?php echo substr($row['create_date'],8,2)?></span>
                              </div><!-- //data -->
                              <div class="cont">
                                  <div class="h">
                                      <a href="?at=read&subm=<?php echo $subm; ?>&idx=<?php echo $row['news_idx']; ?>"><?php echo $row['news_title']?></a>
                                  </div>
                                  <div class="txt">
                                      <a href="?at=read&subm=<?php echo $subm; ?>&idx=<?php echo $row['news_idx']; ?>"><?php echo $row['new_paragraph_content'] ;?></a>
                                  </div><!-- //txt -->
                              </div><!-- //cont -->
                          </div><!-- //d-tc -->
                       </div><!--// inner --> 
                    </li>