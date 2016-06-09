                              <tr>
                                <td class="mobileNone"><?php echo($PAGE_UNCOUNT);?></td>
                                <td class="ta-l"><a href="?<?php echo PageUtil::_param_get('idx='.$row['news_idx'].'&at=read');?>"><?php echo htmlspecialchars_decode($row['news_title'])?></a></td>
                                <td><?php echo substr($row['create_date'],0,4)?>.<?php echo substr($row['create_date'],5,2)?>.<?php echo substr($row['create_date'],8,2)?></td>
                                <td class="mobileNone"><?php echo $row['view_count']; ?></td>
                              </tr>