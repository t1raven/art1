<?php if (!defined('OKTOMATO')) exit;?>
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b0102<?php echo $idCnt;?></label>
                    <input type="checkbox" id="b0102<?php echo $idCnt;?>" name="idxs[]" value="<?php echo $row['score_idx'];?>">
                  </td>
                <td><?php echo $PAGE_UNCOUNT ;?></td>
                <td><?php echo $row['covery_name'] ;?></td>
                <td><?php if ($row['is_expert'] == 'Y') : ?>패널<?php else : ?>일반<?php endif ; ?></td>
                <td><?php echo $row['user_id'] ;?></td>
                <td class="opinion"><span title="<?php echo $row['opinion']; ?>"><?php echo (mb_strlen($row['opinion'], 'UTF-8') > 20) ? mb_substr($row['opinion'], 0, 20, 'UTF-8').'...' : $row['opinion']; ?></span></td>
                <td><?php echo long2ip($row['ip_addr']); ?></td>
                <td class="fc1"><?php echo strtr($row['create_date'], '-', '.' ); ?></td>
                <td class="fc_<?php echo $sHtmlClass; ?>"><?php echo $sDisplay; ?></td>
                <td>
                  <div class="user_td_control1">
                    <button type="button" onclick="editArticle(<?php echo $row['score_idx']; ?>);">수정</button>
                    <button type="button" onclick="deleteArticle(<?php echo $row['score_idx']; ?>);">삭제</button>
                  </div>
                </td>
              </tr>
