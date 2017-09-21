              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01020</label>
                     <input type="checkbox" id="b01020" name="idxs[]" value="<?php echo $row['newsletter_idx'];?>">
                  </td>
                <td><?php echo($PAGE_UNCOUNT);?></td>
                <td class="name"><a href="#" class="fc_blue td-u" id="layerLink_<?php echo $row['newsletter_idx'];?>"><?php echo $row['newsletter_email'];?></a></td>
               	<td><?php echo substr($row['create_date'],0,10);?></td>
                <td>
                  <div class="user_td_control1">
                    <a href="#mainInfoPopup" class="layerOpen td-u fc_gray" id="emailLink_<?php echo $row['newsletter_idx'];?>" data-idx="<?php echo $row['newsletter_idx'];?>" data-email="<?php echo $row['newsletter_email'];?>">수정</a>
                    <button onclick="deleteArticle(<?php echo $row['newsletter_idx'];?>,'<?php echo $row['newsletter_email'];?>');">삭제</button>
                  </div>
                </td>
              </tr>