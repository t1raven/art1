<?php
if($row['exh_confirm'] == 'W') { $cfm_css = 'fc_red' ;}
if($row['exh_confirm'] == 'Y') { $cfm_css = 'fc_blue' ;}
if($row['exh_confirm'] == 'N') { $cfm_css = '' ;}
?>
			  
			  <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01020<?php echo $row['exh_idx'];?></label>
                    <input type="checkbox" id="b01020" name="" value=""></span>
                  </td>
                <td><?php echo($PAGE_UNCOUNT);?></td>
                <td class="name"><span class="font_blue_color"><a href="javascript:previewImg('<?php echo $row['exh_idx'];?>');">Preview</a></span></td>
				<!--//마우스를 클릭한 곳에 이미지가 나온다 S-->
				<!-- td class="name"><span style="cursor:pointer;" class="img_view font_blue_color" onClick="previewImg('<?php echo $row['exh_idx'];?>'); mLayerPop('img_view', 'divImgPreview');">Preview</span></td -->
				<!--//마우스를 클릭한 곳에 이미지가 나온다 E-->
               	<td><span class="font_blue_color"><a href="<?php echo($row['exh_link']);?>" target="_blank">Link</a></span></td>
               	<td><a href="/oktomato/exhibition/?at=read&idx=<?php echo $row['exh_idx'];?>"><?php echo($row['user_name']);?></a></td>
               	<td><?php echo($row['exh_tel']);?></td>
                <td><?php echo(substr($row['create_date'],0,10));?></td>
                <td>
                  <div class="user_td_control1">
                    <!-- button class="conSelect">삭제</button -->
                    <span id="cfmMod_<?php echo $row['exh_idx'];?>" style="cursor:pointer;" class="conSelect <?php echo $cfm_css;?>" onclick="getAjaxPost('__confirm_box','<?php echo $row['exh_idx'];?>','divConfirmSelect');" ><?php echo($row['exh_confirm_text']);?></a></span>
                    <!-- img class='conSelect' src='../images/button.gif' alt="버튼1" / -->
                  </div>
                </td>
              </tr>