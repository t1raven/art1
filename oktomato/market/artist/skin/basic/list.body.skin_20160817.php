<?php if (!defined('OKTOMATO')) exit;?>
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b0102<?php echo $idCnt;?></label>
                    <input type="checkbox" id="b0102<?php echo $idCnt;?>" name="idxs[]" value="<?php echo $row['artist_idx'];?>">
                    </span>
                  </td>
                <td><?php echo($PAGE_UNCOUNT);?></td>
                <td class="name"><?php echo $row['artist_name'];?></td>
               <td><?php echo($row['artist_en_name']);?></td>
                <td class="fc1"><?php echo strtr(substr($row['create_date'], 0, 10), '-', '.' );?></td>
                <td>
                  <div class="user_td_control1">
                    <button type="button" onclick="editArticle(<?php echo $row['artist_idx'];?>);">수정</button>
                    <button type="button" onclick="deleteArticle(<?php echo $row['artist_idx'];?>);">삭제</button>
                  </div>
                </td>
              </tr>