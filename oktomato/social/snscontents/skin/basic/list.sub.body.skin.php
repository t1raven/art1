<input type="hidden" name="sns_img[]" id="sns_img<?php echo $i ;?>" value="<?php echo $row_c['up_file_name'] ;?>">
<!--<input type="hidden" name="old_sns_img[]" id="old_sns_img<?php echo $i ;?>" value="<?php echo $row_c['up_file_name'] ;?>">-->
<input type="hidden" name="sc_idx[]" value="<?php echo $row_c['sns_contents_idx'] ;?>">
<input type="hidden" name="s_idx[]" value="<?php echo $row_c['sns_link_idx'] ;?>">
					 <tr>
                        <th scope="row" rowspan="4">Content<?php echo $ci;?> </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs<?php echo $i ;?>" >
                                 <span style="background:#ddd; display:inline-block;"><img id="banner<?php echo $i ;?>" src="<?php if (!empty($row_c['up_file_name'])) {echo snsUploadPath, $row_c['up_file_name'];}?>" width="132" height="100" alt="이미지를 업로드해주세요."> </span>

                                 <button type="button" id="btn_regist<?php echo $i ;?>"  class="btn_regist" data-idx="<?php echo $i ;?>" <?php if (!empty($row_c['up_file_name'])):?> style="display:none"<?php endif;?> >이미지 등록</button>
                                 <button type="button" id="btn_delete<?php echo $i ;?>" class="btn_delete" onclick="deleteFile(<?php echo $row_c['sns_contents_idx'] ;?>,<?php echo $i ;?>);" <?php if (!empty($row_c['up_file_name'])):?> style="display:inline;"<?php endif;?>>이미지 삭제</button>
                                 <div id="upload_status<?php echo $i ;?>" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
								 (236 * 143)<br>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos"><?php echo $row_c['sns_content_title']?></label>
                           <input name="title[]" type="text" class="inp_txt lh w190" id="tit" value="<?php echo $row_c['sns_content_title'] ;?>">
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name="content[]"><?php echo $row_c['sns_content']?></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td>
                           <span class="datapiker">
                           <input name="cdate[]" type="text" class="inp_txt date" id="sd<?echo $i?>" value="<?php echo (empty($row_c['create_date'])) ? date('Y-m-d') : substr( $row_c['create_date'],0,10); ?>">
                           </span>
                        </td>
                     </tr>