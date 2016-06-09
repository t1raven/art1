<? include "../inc/config.php"; ?>
<?php
  $categoriName = "입점신청";
  $pageName = "Artists";
  $pageNum = "4";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
  <section id="container_sub" class="content-mediaBox margin1">
    <div class="container_inner">
      <?php include(ROOT.'inc/path.php'); ?>
		<section id="photographerArea" class="content-mediaBox margin1">
			<div class="lst_table3 artist">
               <table summary="갤러리 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
                   <caption>갤러리명 등록</caption>
                   <colgroup>
                      <col class="th1">
                      <col>
                   </colgroup>
                   <tbody>
                      <tr>
                         <th scope="row">갤러리명 (kr) *</th>
                         <td>
                            <span class="col_td auto">
                            <label for="name" class="pos"></label>
                            <input name="name" type="text" class="inp_txt lh w390" id="name" value="">
                            </span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">갤러리명 (En) *</th>
                         <td >
                            <span class="col_td auto">
                            <label for="nameEng" class="pos"></label>
                            <input name="nameEng" type="text" class="inp_txt lh w390" id="nameEng" value="">
                            </span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">갤러리 로고 *</th>
                         <td >
                            <div class="clearfix">
                               <div class="fileinputs" >
                                  <input type="file" class="file" name="cv_file" />
                               </div>&nbsp;cf. ai파일로 올려주세요.
                               <?php if(!empty($Artist->attr['cv_up_file_name'])):?>
                               <div class="lst_Upload">
                                  <span class="tag" id="span-cv"><?php echo $Artist->attr['cv_ori_file_name'];?> <button onclick="deleteAttach('<?php echo $Artist->attr['artist_idx'];?>', 'cv');">삭제</button></span>
                               </div>
                               <?php endif;?>
                            </div>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">시업자등록증 *</th>
                         <td >
                            <div class="clearfix">
                               <div class="fileinputs" >
                                  <input type="file" class="file" name="cv_file" />
                               </div>
                               <?php if(!empty($Artist->attr['cv_up_file_name'])):?>
                               <div class="lst_Upload">
                                  <span class="tag" id="span-cv"><?php echo $Artist->attr['cv_ori_file_name'];?> <button onclick="deleteAttach('<?php echo $Artist->attr['artist_idx'];?>', 'cv');">삭제</button></span>
                               </div>
                               <?php endif;?>
                            </div>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">홈페이지 주소 *</th>
                         <td>
                            <input name="" type="text" class="inp_txt lh w390" id="" value="">
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">이메일 주소 *</th>
                         <td>
                            <input name="" type="text" class="inp_txt lh w390" id="" value="">
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">전화번호 *</th>
                         <td>
                            <input name="" type="text" class="inp_txt lh w390" id="" value="">
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">팩스번호 *</th>
                         <td>
                            <input name="" type="text" class="inp_txt lh w390" id="" value="">
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">담당자명 *</th>
                         <td>
                            <input name="" type="text" class="inp_txt lh w390" id="" value="">
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">담당자 연락처 *</th>
                         <td>
                            <input name="" type="text" class="inp_txt lh w390" id="" value="">
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">담당자 이메일 주소 *</th>
                         <td>
                            <input name="" type="text" class="inp_txt lh w390" id="" value="">
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">주소</th>
                         <td>
							<input type="text" class="inp_txt lh w110 only_number" name="zipCode" id="zipCode" value="07639" title=""> <button type="button" class="btn_width_input" onclick="">Search</button>
							<div style="margin-top:5px;"><input type="text" class="inp_txt lh w470" name="addr1" id="addr1" value="서울 강서구 내발산동 723-9" readonly=""></div>
							<div style="margin-top:5px;"><input type="text" class="inp_txt lh w470" name="addr2" id="addr2" value="평화빌딩2층" onblur="getMaps();"></div>
						</td>
                      </tr>
                      <tr>
                         <th scope="row">SNS</th>
                         <td>
                            <input name="" type="text" class="inp_txt lh w390" id="" value="">
                         </td>
                      </tr>
                   </tbody>
               </table>
            </div>
			 
            <div class="bot_align">
               <div class="btn_right">
                  <button type="button" class="btn_pack1 ov-b small rato" id="btnSave">Save</button>
               </div>
            </div>
		</section>
		</form>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
<script>
$(function(){
	LabelHidden(".inp_txt.lh");
	initFileUploads();
});
</script>  
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





