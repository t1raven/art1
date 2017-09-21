<?php
if($row['exh_confirm'] == 'W') { $cfm_css = 'fc_red' ;}
if($row['exh_confirm'] == 'Y') { $cfm_css = 'fc_blue' ;}
if($row['exh_confirm'] == 'N') { $cfm_css = '' ;}
?>
			  
			  <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01020</label>
                    <input type="checkbox" id="b01020" name="idxs[]" value="<?php echo $row['exh_idx'];?>"></span>
                  </td>
                <td><?php echo($PAGE_UNCOUNT);?></td>
				<!-- td><a href="javascript:previewImg('<?php echo $row['exh_idx'];?>');" class="fc_blue td_u">Preview</a></td -->
				<td><a href="#RecommendedImgPopup" class="fc_blue td_u layerOpenImg" data-idx="<?php echo $row['exh_idx'];?>" >Preview</a></td>
               <td><a href="<?php echo($row['exh_link']);?>" target="_blank" class="fc_blue td_u">Link</a></td>
			   <td class="name"><a href="/oktomato/member/?at=read&idx=<?php echo $row['user_idx']?>"><?php echo($row['exh_user_name']);?></a></td>
                <td class="fc1"><?php echo($row['exh_tel']);?></td>
				<td class="fc1"><?php echo(substr($row['create_date'],0,10));?></td>
                <td class="layerPopup">
					<span id="cfmMod_<?php echo $row['exh_idx'];?>" >
						<a href="#RecommendedListPopup" id="layerLink_<?php echo $row['exh_idx'];?>" class="layerOpen td_u <?php echo $cfm_css;?>"  data-idx="<?php echo $row['exh_idx'];?>"><?php echo($row['exh_confirm_text']);?></a>
					</span>
				</td>
              </tr>


<script>
		$(".layerOpen").click(function(){
        $(".layer_popup1").css("display","none");
        var id = $(this).attr("href");
        var x = $(this).offset().left-150;
        var y = $(this).offset().top-100;
        layerBoxOffset(id,x,y);
        return false;

    });
	</script>
