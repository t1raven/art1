<?php
if ($row['request_status']) {
	$request_status = ' fc_red ';
	$request_status_text = ' 답변완료 ';
} else {
	$request_status = '';
	$request_status_text = ' 답변대기 ';
}
?>
			 
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01020</label>
                    <input type="checkbox" id="b01020" name="idxs[]" value="<?php echo $row['qna_idx'];?>">
                  </td>
                <td><?php echo($PAGE_UNCOUNT);?></td>
				<td class="name"><?php echo $row['qna_title'];?></td>
                <td class="name"><?php echo $row['qna_user_name'];?></td>
               	<td><?php echo substr($row['create_date'], 0, 10);?></td>
                <td class="fc1 <?php echo $request_status;?>" ><?php echo $request_status_text;?></td>
                <td>
                  <div class="user_td_control1">
                    <button onclick="editArticle(<?php echo $row['qna_idx'];?>);">수정</button>
                    <button onclick="deleteArticle(<?php echo $row['qna_idx'];?>);">삭제</button>
                  </div>
                </td>
              </tr>

              