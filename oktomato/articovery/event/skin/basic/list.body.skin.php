<?php if (!defined('OKTOMATO')) exit;?>
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b0102<?php echo $idCnt;?></label>
                    <input type="checkbox" id="b0102<?php echo $idCnt;?>" name="idxs[]" value="<?php echo $row['contact_idx'];?>">
                    </span>
                </td>
                <td><?php echo $PAGE_UNCOUNT;?></td>
                <td class="name"><?php echo htmlspecialchars(stripslashes($row['covery_name'])); ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['user_contact']; ?></td>
                <td><?php echo long2ip($row['ip_addr']); ?></td>
                <td class="fc1"><?php echo strtr($row['create_date'], '-', '.' ); ?></td>
                <!--td>
                  <div class="user_td_control1">
                    <button type="button" onclick="editArticle(<?php echo $row['contact_idx'];?>);">수정</button>
                    <button type="button" onclick="deleteArticle(<?php echo $row['covery_idx'];?>);">삭제</button>
                  </div>
                </td-->
              </tr>
