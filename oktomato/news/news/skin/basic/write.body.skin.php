<?php
$parag_idx = $_POST['parag_idx'];
$currentFolder = '/oktomato';
$i = isset($parag_idx) ? $parag_idx : $i ;
?>
			<!--// 추가/삭제될 표 영역 S -->

              <tr class="addTbl_<?php echo($i);?>" >
			  <input type="hidden" name="paragraph_idx[]" id="paragraph_idx_<?php echo $i ;?>" value="<?php echo $row['news_paragraph_idx'] ;?>">
			  <input type="hidden" name="old_ori_file_name[]" id="old_ori_file_name_<?php echo $i ;?>" value="<?php echo $row['ori_file_name'] ;?>">
			  <input type="hidden" name="old_up_file_name[]" id="old_up_file_name_<?php echo $i ;?>" value="<?php echo $row['up_file_name'] ;?>">

                <th scope="row"  class="addTbl_<?php echo($idx);?>" >이미지/영상 선택</th>
                <td >
                 <div class="lst_check radio " id="butRadio">
                      <span class="img_on" data-idx="<?php echo $i; ?>" onclick="butImgTm('<?php echo $i; ?>')">
                        <label for="img<?php echo $i; ?>">이미지</label>
                        <input type="radio" name="ImgOrVideo[<?php echo $i?>]" id="img<?php echo $i; ?>"  value="I" <?php if($row['img_or_video']=='img' || $row['img_or_video']=='' ) echo 'checked' ;  ?> >
                      </span>
                      <span class="video_on notcardnews"  data-idx="<?php echo $i; ?>"  onclick="butVideoTm('<?php echo $i; ?>')">
                        <label for="video<?php echo $i; ?>">영상</label>
                        <input type="radio" name="ImgOrVideo[<?php echo $i?>]" id="video<?php echo $i; ?>" value="V" <?php if($row['img_or_video']=='video') echo 'checked' ;  ?> >
                      </span>
                    </div>
                </td>
              </tr>
              <tr class="imgArea<?php echo $i; ?> addTbl_<?php echo($i);?>">
                <th scope="row">이미지</th>
                <td >
                  <div class="photoUpload">
                    <div class="photo"><span id="span-view-img-<?php echo $i ;?>"><?php if($row['img_or_video']=='img' && $row['up_file_name'] ) { echo '<img src=\''.$img_src.'\' width=112 >' ; } ?></span></div>
                    <div class="cont clearfix">
						<p>
							<div class="lst_check radio">
							  <span>
								<label for="water_on<?php echo $i ;?>">워터마크 표시</label>
								<input type="radio" name="water_status_img[<?php echo $i?>]" id="water_on<?php echo $i ;?>"  value="Y" >
							  </span>
							  <span>
								<label for="water_off<?php echo $i ;?>">워터마크 안 함</label>
								<input type="radio" name="water_status_img[<?php echo $i?>]" id="water_off<?php echo $i ;?>" value="N"  checked >
							  </span>
							  <br>* 워터마크는 입력만 적용됩니다.  수정 시에는 해당 이미지를 삭제하고  다시 올린 후, 저장하면 워터마크 적용이 가능합니다.
							</div>
						</p>
						<p>가로<span class="contents_img_width">600</span>px 이하. 세로 <span class="contents_img_heigth">2048</span>px 이하 1MB제한.</p>
                      <div class="fileinputs" >
                        <input type="file" class="file" name="imgFile[]"  id="file_<?php echo $i ;?>" />
                      </div>
                      <div class="lst_Upload">
					   <?php		if($row['img_or_video']=='img' && !empty($row['ori_file_name']) ){  ?>
                        <span class="tag" id="span-img-<?php echo $i?>"><?php if($row['img_or_video']=='img') echo $row['ori_file_name'] ;?>
							<button onclick="deleteFile(<?php echo $i?>, <?php echo $row['news_paragraph_idx'] ;?>, 'img-<?php echo $i?>')">삭제</button>
						</span>
						<? } ?>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="imgArea<?php echo $i?> addTbl_<?php echo($i);?>  notcardnews">
                <th scope="row" >이미지 설명</th>
                <td >
                  <input name="img_comment[]" type="text" class="inp_txt wp80" id="" value="<?php if($row['img_or_video']=='img') echo $row['img_comment'] ;  ?>" title="이미지설명 입력">
                </td>
              </tr>
			  <tr  class="imgArea<?php echo $i?> addTbl_<?php echo($i);?> notcardnews">
                <th scope="row">단락 텍스트</th>
                <td >
					 <div class="textarea">
                      <textarea name="img_content[]" id="img_content_<?php echo $i?>"><?php if($row['img_or_video']=='img') echo $row['new_paragraph_content'] ;  ?></textarea>
                    </div>
                </td>
              </tr>
			    <tr class="videoArea<?php echo $i?> addTbl_<?php echo($i);?>">
                <th scope="row">영상 썸네일</th>
                <td >
                  <div class="photoUpload">
                    <div class="photo"><span id="span-view-video-<?php echo $i ;?>"><?php if($row['img_or_video']=='video' && $row['up_file_name']) echo '<img src=\''.newsUploadPath.$row['up_file_name'].'\' width=112 >' ;?></span></div>
                    <div class="cont clearfix">
						<p>
							<div class="lst_check radio">
							  <span>
								<label for="water_v_on<?php echo $i ;?>">워터마크 표시</label>
								<input type="radio" name="water_status_video[<?php echo $i?>]" id="water_v_on<?php echo $i ;?>"  value="Y" >
							  </span>
							  <span>
								<label for="water_v_off<?php echo $i ;?>">워터마크 안 함</label>
								<input type="radio" name="water_status_video[<?php echo $i?>]" id="water_v_off<?php echo $i ;?>" value="N"  checked >
							  </span>
							  <br>* 워터마크는 입력만 적용됩니다.  수정 시에는 해당 이미지를 삭제하고  다시 올린 후, 저장하면 워터마크 적용이 가능합니다.
							</div>
						</p>
						<p>가로1024px 이하. 1MB제한.</p>
                      <div class="fileinputs" >
                        <input type="file" class="file" name="videoFile[]"/>
                      </div>
                      <div class="lst_Upload">
					  <?php		if($row['img_or_video']=='video' && !empty($row['ori_file_name']) ){  ?>
                        <span class="tag" id="span-video-<?php echo $i?>"><?php if($row['img_or_video']=='video') echo $row['ori_file_name'] ;?>
							<button onclick="deleteFile(<?php echo $i?>, <?php echo $row['news_paragraph_idx'] ;?>, 'video-<?php echo $i?>')">삭제</button>
						</span>
						<?php }  ?>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="videoArea<?php echo $i?> addTbl_<?php echo($i);?> ">
                <th scope="row" >영상 URL</th>
                <td >
                  <input name="video_url[]" type="text" class="inp_txt w390" id="" value="<?php if($row['img_or_video']=='video') echo $row['video_url'] ;  ?>" title=" 영상 URL 입력">
                </td>
              </tr>
			  <tr class="videoArea<?php echo $i?> addTbl_<?php echo($i);?> ">
                <th scope="row" >단락 텍스트</th>
                <td >
					 <div class="textarea">
                      <textarea name="video_content[]" id="video_content_<?php echo $i ; ?>"><?php if($row['img_or_video']=='video') echo $row['new_paragraph_content'] ;  ?></textarea>
                    </div>
                </td>
              </tr>
			  <tr class="addTbl_<?php echo($i);?> ">
                <th scope="row" >단락 추가/삭제</th>
                <td >
					 <div class="t-c">
                      <button onclick="addTbArticle(<?php echo $i ;?>);"><img src="<?=$currentFolder?>/images/common/btn_plus.gif" alt="" /></button>&nbsp
					  <button onclick="delTbArticle(<?php echo $i ;?>);"><img src="<?=$currentFolder?>/images/common/btn_minus.gif" alt="" /></button>
                    </div>
                </td>
              </tr>
			  <tr class="addTbl_<?php echo($i);?>"><td colspan=2 style="height:10"></td></tr>

			  <!--// 추가/삭제될 표 영역 E -->
			  <script>
			  /*
			<?php
			if ($row['img_or_video']=='img'){
			?>
				$("tr.videoArea<?php echo $i ; ?>").css("display","none")
				$("tr.imgArea<?php echo $i ; ?>").css("display","table-row")
			<?php
			}else{
			?>
				$("tr.videoArea<?php echo $i ; ?>").css("display","table-row")
				$("tr.imgArea<?php echo $i ; ?>").css("display","none")
			<?php
			}
			?>
			*/
			<?php
			if ($row['img_or_video']=='video'){
			?>
				$("tr.videoArea<?php echo $i ; ?>").css("display","table-row")
				$("tr.imgArea<?php echo $i ; ?>").css("display","none")
			<?php
			}else{
			?>
				$("tr.videoArea<?php echo $i ; ?>").css("display","none")
				$("tr.imgArea<?php echo $i ; ?>").css("display","table-row")
			<?php
			}
			?>

			  </script>

