              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01020</label>
                    <input type="checkbox" id="b01020" name="idxs[]" value="<?php echo $row['user_idx'];?>"></span>
                  </td>
                <td><?php echo($PAGE_UNCOUNT);?></td>
                <td><?php echo $row['user_id'];?></td>
               	<td><?php echo $row['order_count'];?></td>
               	<td><?php echo(substr($row['create_date'],0,10));?></td>
                <td>
                  <div class="user_td_control1">
                    <button type="button" class="fc_blue" onClick="location.href='?at=read&idx=<?php echo $row['user_idx']; ?>'">수정</button>
                    <button type="button" onClick="deleteArticle(<?php echo $row['user_idx'];?>)" >삭제</button>
                  </div>
                </td>
              </tr>
              <!-- tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01021</label>
                    <input type="checkbox" id="b01021" name="" value=""></span>
                  </td>
                <td>4</td>
                <td>ryu@oktomato.net</td>
                <td>홍길동2</td>
                <td>2014.07.24</td>
                <td>
                  <div class="user_td_control1">
                    <button onClick="location.href='#'">수정</button>
                    <button>삭제</button>
                  </div>
                </td>
              </tr -->