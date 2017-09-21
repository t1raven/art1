<?php if (!defined('OKTOMATO')) exit;?>
				  <tr>
					<th scope="row">Slot <?php echo $i;?></th>
					<td>
					  <div class="fileImg">
						 <img src="<?php echo recommendUploadPath, $row['img_up_file_name'];?>" alt="<?php echo $row['referee'];?>">
					  </div>
					</td>
					<td class="t-c">
					  <span class="col_td auto">
						 <?php echo $row['referee'];?>
					   </span>
					</td>
					<td class="t-c">
					  <div class="user_td_control1">
						<button type="button" onclick="editArticle('<?php echo $row['recommend_idx'];?>', '<?php echo $row['img_up_file_name'];?>', '<?php echo $row['referee'];?>');">수정</button>
						<button type="button" onclick="deleteArticle('<?php echo $row['recommend_idx'];?>');">삭제</button>
					  </div>
					</td>
				  </tr>
