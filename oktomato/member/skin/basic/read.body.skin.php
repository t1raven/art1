  
			  <tr>
                <!-- td>
                  <span class="check_listbox box">
                    <label for="pt">b01020</label>
                    <input type="checkbox" id="b01020" name="" value=""></span>
                  </td -->
                <td><?php echo substr($row['create_date'], 1, 15)?></td>
                <td><?php echo $row['ord_nbr']?></td>
               	<td><?php echo number_format($row['amount'],0)?></td>
                <td>
                  <div class="user_td_control1">
					<button onClick="location.href='/oktomato/market/order/index.php?at=write&ord=<?php echo $row['ord_nbr']?>'">상세</button>
                  </div>
                </td>
              </tr>
              <!-- tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01021</label>
                    <input type="checkbox" id="b01021" name="" value=""></span>
                  </td>
                <td>2014.07.24</td>
                <td>SADEGFIUH344</td>
                <td>3,200,000원</td>
                <td>
                  <div class="user_td_control1">
                    <button onClick="location.href='#'">상세</button>
                  </div>
                </td>
              </tr -->

			  