			  <tr>
                <td><?php echo($i);?></td>
				<td><?php echo($row['news_category_name']);?></td>
				<td>
					<a  class="pop_btn layerOpen" href="#bbsType"  data-bbs="<?php echo(setSkinType($row['news_skin_type']));?>" data-idx="<?php echo($row['news_category_idx']);?>">
						썸네일
					</a>
				</td>
              </tr>
