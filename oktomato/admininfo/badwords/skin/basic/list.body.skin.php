              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt"></label>
                    <input type="checkbox" id="b01020" name="idxs[]" value="<?php echo $row['bad_words_idx'];?>"></span>
                  </td>
                <td><?php echo($PAGE_UNCOUNT);?></td>
                <td class="t-l"><?php echo $row['bad_word'];?></td>
                <td class="fc1"><?php echo substr($row['create_date'],0,10);?></td>
                <td>
                  <div class="user_td_control1">
                     <button type="button" id="#writePopup" class="layerOpen" data-idx="<?php echo $row['bad_words_idx'];?>" data-word="<?php echo $row['bad_word'];?>"  data-mode="edit" >수정</button>
                    <button onclick="deleteArticle(<?php echo $row['bad_words_idx'];?>);">삭제</button>
                  </div>
                </td>
              </tr>