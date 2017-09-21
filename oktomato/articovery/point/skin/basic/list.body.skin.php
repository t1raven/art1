<?php if (!defined('OKTOMATO')) exit;?>
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b0102<?php echo $idCnt;?></label>
                    <input type="checkbox" id="b0102<?php echo $idCnt;?>" name="idxs[]" value="<?php echo $row['point_idx'];?>">
                  </td>
                <td><?php echo($PAGE_UNCOUNT);?></td>
                <td><?php echo($row['covery_name']);?></td>
                <td class="name"><?php echo $row['artist_name'];?></td>
                <td><?php echo $row['total_point'];?></td>
                <td class=""><?php echo $expertSum; ?></td>
                <td class=""><?php echo $memberSum; ?></td>
                <td class="layerPopup"><a href="#pointPopup" title="상세보기" class="layerOpen" data-idx="<?php echo $row['point_idx']; ?>" data-cidx="<?php echo $row['covery_idx']; ?>"><?php echo $expertSum + $memberSum; ?></a></td>
                <td class="fc1"><?php echo strtr(substr($row['create_date'], 0, 10), '-', '.' );?></td>
                <td class="fc_<?php echo $sHtmlClass; ?>"><?php echo $sDisplay; ?></td>
                <td>
                  <div class="user_td_control1">
                    <button type="button" onclick="editArticle(<?php echo $row['point_idx'];?>);">수정</button>
                    <button type="button" onclick="deleteArticle(<?php echo $row['point_idx'];?>);">삭제</button>
                  </div>
                </td>
              </tr>
