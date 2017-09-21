<?php
//사용안함 by 2014-12-19 이용태
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
$idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$currentFolder = '/oktomato';
?>

              <tr class="addTbl_<?php echo($idx);?>">
                <th scope="row">이미지/영상 선택</th>
                <td >
                 <div class="lst_check radio">
                      <span data-idx="<?php echo $idx; ?>"  onclick="butImgTm('<?php echo $idx; ?>')">
                        <label for="img<?php echo $idx; ?>">이미지</label>
                        <input type="radio" name="ImgOrVideo[<?php echo $idx; ?>]"  value="I" id="img<?php echo $idx; ?>"  checked  >
                      </span>
                      <span  data-idx="<?php echo $idx; ?>"  onclick="butVideoTm('<?php echo $idx; ?>')">
                        <!-- label for="video">영상</label -->
                        <label for="video<?php echo $idx; ?>">영상</label>
                        <input type="radio" name="ImgOrVideo[<?php echo $idx; ?>]" id="video<?php echo $idx; ?>" value="V" >
                      </span>
                    </div>
                </td>
              </tr>
              <tr class="imgArea<?php echo($idx);?> addTbl_<?php echo($idx);?>">
                <th scope="row">이미지</th>
                <td >
                  <div class="photoUpload">
                    <div class="photo"></div>
                    <div class="cont clearfix">
                        <p>가로1024px 이하. 1MB제한.</p>
                      <div class="fileinputs" id="fileClassM<?php echo $idx; ?>">
                        <input type="file" class="file" name="imgFile[]"/>
                        <div class="fakefile"><input><img src="/oktomato/images/btn/btn_upload_off.gif"></div>
                      </div>
                      <div class="lst_Upload">
                        <!-- span class="tag">홍길동.jpg <button>삭제</button></span -->
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="imgArea<?php echo($idx);?> addTbl_<?php echo($idx);?>">
                <th scope="row" >이미지 설명</th>
                <td >
                  <input name="img_comment[]" type="text" class="inp_txt w390" id="" value="" title="이미지설명 입력">    
                </td>
              </tr>
			  <tr  class="imgArea<?php echo($idx);?> addTbl_<?php echo($idx);?>">
                <th scope="row">단락 텍스트</th>
                <td >
					 <div class="textarea addTbl_<?php echo($idx);?>">
                      <textarea name="img_content[]"></textarea>
                    </div>
                </td>
              </tr>
			  <!-- tr class="imgArea addTbl_<?php echo($idx);?>">
                <th scope="row" >단락 추가/삭제</th>
                <td >
					 <div class="t-c">
                      <button><img src="<?=$currentFolder?>/images/common/btn_plus.gif" alt="" /></button>&nbsp <button><img src="<?=$currentFolder?>/images/common/btn_minus.gif" alt="" /></button>
                    </div>
                </td>
              </tr -->
			    <tr class="videoArea<?php echo($idx);?> addTbl_<?php echo($idx);?>">
                <th scope="row">영상 썸네일</th>
                <td >
                  <div class="photoUpload">
                    <div class="photo"></div>
                    <div class="cont clearfix">
						<p>가로1024px 이하. 1MB제한.</p>
                      <div class="fileinputs" >
                        <input type="file" class="file" name="videoFile[]"/>
						<div class="fakefile"><input><img src="/oktomato/images/btn/btn_upload_off.gif"></div>
                      </div>
                      <div class="lst_Upload">
                        <!-- span class="tag">홍길동.jpg <button>삭제</button></span -->
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="videoArea<?php echo($idx);?> addTbl_<?php echo($idx);?>">
                <th scope="row" >영상 URL</th>
                <td >
                  <input name="video_url[]" type="text" class="inp_txt w390" id="" value="" title=" 영상 URL 입력">   
                </td>
              </tr>
			  <tr class="videoArea<?php echo($idx);?> addTbl_<?php echo($idx);?>">
                <th scope="row" >단락 텍스트</th>
                <td >
					 <div class="textarea">
                      <textarea name="video_content[]"></textarea>
                    </div>
                </td>
              </tr>
			  <tr class="addTbl_<?php echo($idx);?>">
                <th scope="row" >단락 추가/삭제</th>
                <td >
					 <div class="t-c">
                      <button onclick="addTbArticle();"><img src="<?=$currentFolder?>/images/common/btn_plus.gif" alt="" /></button>&nbsp 
					  <button onclick="delTbArticle(<?php echo $idx;?>);"><img src="<?=$currentFolder?>/images/common/btn_minus.gif" alt="" /></button>
                    </div>
                </td>
              </tr>
			  <!--// 추가/삭제될 표 영역 E -->