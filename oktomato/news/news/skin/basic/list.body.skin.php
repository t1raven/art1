                    <tr>
                      <td>
                        <span class="check_listbox box">
                          <label for="pt">b0102<?php echo $idCnt;?></label>
                          <input type="checkbox" id="b0102<?php echo $idCnt;?>" name="idxs[]" value="<?php echo $row['news_idx'];?>">
                        </td>
                        <td><?php echo($PAGE_UNCOUNT);?></td>
                        <td><?php echo $row['news_category_name'];?></td>
                        <td><a href="?<?php echo PageUtil::_param_get('idx='.$row['news_idx'].'&at=write&mode=edit');?>"><?php echo $row['news_title'];?></a></td>
                        <td class="name"><?php echo $row['reporter_name'];?></td>
                        <td class="fc1"><?php echo substr($row['create_date'], 0, 10);?></td>
                        <td class="<?php echo $request_status;?>"><?php echo $request_status_text;?></td>
                        <td>
                           <div class="user_td_control1">
                              <button type="button" onClick="location.href='?<?php echo PageUtil::_param_get('idx='.$row['news_idx'].'&at=write&mode=edit');?>'">수정</button>
                              <button type="button" onClick="deleteArticle(<?php echo $row['news_idx'];?>)" >삭제</button>
                           </div>
                        </td>
                     </tr>
