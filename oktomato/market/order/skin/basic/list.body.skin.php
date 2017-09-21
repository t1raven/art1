<?php if (!defined('OKTOMATO')) exit;?>
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01020<?php echo $idCnt;?></label>
                    <input type="checkbox" id="b0102<?php echo $idCnt;?>" name="ords[]" value="<?php echo $row['ord_nbr'];?>">
                  </td>
                <td><?php echo $row['ord_nbr'];?></td>
                <td><?php echo $row['ord_goods'];?></td>
                <td class="name"><?php echo $row['rec_name'];?></td>
                <td><?php echo strtr(substr($row['create_date'], 0, 10), '-', '.');?></td>
                <td class="<?php echo $sClass;?>"><?php echo $tranState;?></td>
                <td>
                  <div class="user_td_control1">
                    <button type="button" onclick="editArticle('<?php echo $row['ord_nbr'];?>');">수정</button>
                    <button type="button" onclick="deleteArticle('<?php echo $row['ord_nbr'];?>');">삭제</button>
                  </div>
                </td>
              </tr>