                                <tr class="<?php echo ($row['notice'] > 0) ? 'tr_new_color':''; ?>">
                                  <td class="mobileNone"><?php echo($PAGE_UNCOUNT);?></td>
                                  <td><?php echo $row['bbs_name']?></td>
                                  <td class="ta-l">
                                  <span class="bbs_name"><?php echo $row['bbs_name']?></span>
                                  <a class="cont" href="?<?php echo PageUtil::_param_get('idx='.$row['bbs_idx'].'&at=read');?>"><?php echo $row['bbs_title']?>  
                                  <span class="replyCount"><?php echo $comment_count?></span>
                                   <?php if ($row['up_file_count'] > 0) { ?> 
                                    &nbsp;&nbsp;<img src="/images/bbs/ico_file.gif" alt="" />
                                    <?php }?>
                                    </td> 
                                  </a>  
								  
                                  <td class="<?php echo ( new_diff($row['reg_date'],24)==true )?'today':''; ?>"><?//php echo substr($row['reg_date'],0,10)?> <?php echo timediff($row['reg_date']);?> 
                                  	<span class="hit_cnt"> / <?php echo $row['bbs_hit']?></span>
                                  </td>
                                  <td class="mobileNone"><?php echo $row['bbs_hit']?></td>
                                </tr>