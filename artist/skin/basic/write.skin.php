<?php
include(ROOT.'inc/config.php');

$categoriName = '작가등록';
$pageName = '작가등록';
$pageNum = '10';
$subNum = '3';
$thirdNum = '0';
$pathType = 'a';

include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>
  <section id="container_sub" class="content-mediaBox margin1">
    <div class="container_inner">
      <?php include(ROOT.'inc/path.php'); ?>
      <?php include(ROOT.'oktomato/inc/datepicker_setting.php');?>
      <form name="writeFrm" method="post" enctype="multipart/form-data" onsubmit="return false;">
      <input type="hidden" name="at" value="update">
      <input type="hidden" name="idx" id="idx" value="<?php echo $Artist->attr['artist_idx'];?>">
      <input type="hidden" name="mode" value="<?php echo $mode;?>">
      <input type="hidden" name="old_photo_file" id="old_photo_file" value="<?php echo $Artist->attr['photo_up_file_name'];?>">
      <input type="hidden" name="old_photo_ori_file" id="old_photo_ori_file" value="<?php echo $Artist->attr['photo_ori_file_name'];?>">
      <input type="hidden" name="old_cv_file" id="old_cv_file" value="<?php echo $Artist->attr['cv_up_file_name'];?>">
      <input type="hidden" name="old_cv_ori_file" id="old_cv_ori_file" value="<?php echo $Artist->attr['cv_ori_file_name'];?>">

		<section id="photographerArea" class="content-mediaBox margin1">
			<!-- <h1 class="title6">개요</h1>
			<div class="txtBox">
				<p>
				'작가 등록'은 아트1 사이트에 게재될 작가 프로필을 작가가 직접 입력하는 서비스 입니다. 본 서비스를 통해 작가는 빠르고 정확하게 작가프로필을 등록할 수 있으며, 이후 추가되거나 수정사항이 있을 경우 본인이 실시간 변경할 수 있습니다. 다음의 간단한 절차에 따라 등록한 작가는 아트1에서 제공하는 다양한 혜택을 제공받습니다.</p>
				<p class="ex">※ 직접등록이 불가한 작가의 경우 아트1에 문의 후 정보를 보내주시면 담당자가 등록해드립니다.</p>
			</div>

			<div class="lst_process">
				<ul>
					<li class="step1">
						<div class="inner">
							<div class="box">
								<p class="step">STEP.01</p>
								<p class="tit">양식에 따라 내용 입력</p>
							</div>
						</div>
					</li>
					<li class="step2">
						<div class="inner">
							<div class="box">
								<p class="step">STEP.02</p>
								<p class="tit">내용 확인 후 개별연락 :<br>내용 보완 또는 작품요청</p>
							</div>
						</div>
					</li>
					<li class="step3">
						<div class="inner">
							<div class="box">
								<p class="step">STEP.03</p>
								<p class="tit">작품거래 계약체결</p>
							</div>
						</div>
					</li>
					<li class="step4">
						<div class="inner">
							<div class="box">
								<p class="step">STEP.04</p>
								<p class="tit">art1.com 마켓 작품 온라인 등록</p>
							</div>
						</div>
					</li>

				</ul>
			</div>
			<h1 class="title6">등록혜택</h1>
			<div class="txtBox">
				<p>등록된 작가 중 일부작가를 선정하여 전시개최 및 언론사기반의 특별프로모션을 다음과 같이 진행합니다.</p>
				<div class="box_gray">
					<ul>
						<li>1. 작품판매 및 렌탈대행</li>
						<li>2. 미술상</li>
						<li>3. 전시개최 </li>
						<li>4. 언론홍보</li>
					</ul>
				</div>
				<p>※ 자세한 혜택과 내용은 작품거래 계약시 안내합니다.</p>
			</div> -->



			<div class="lst_table3 artist">
               <table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
                   <caption>작가 등록</caption>
                   <colgroup>
                      <col class="th1">
                      <col>
                   </colgroup>
                   <tbody>
                      <tr>
                         <th scope="row">작가명 (kr) *</th>
                         <td >
                            <span class="col_td auto">
                            <label for="name" class="pos">홍길동</label>
                            <input name="name" type="text" class="inp_txt lh w110" id="name" value="<?php echo $Artist->attr['artist_name'];?>" title="작가명(Kr) 입력">
                            </span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">작가명 (En) *</th>
                         <td >
                            <span class="col_td auto">
                            <label for="first_name" class="pos">First Name</label>
                            <input name="first_name" type="text" class="inp_txt lh w150" id="first_name" value="<?php echo $aArtistEnName[0];?>" title="First Name 입력">
                            </span>
                            <span class="col_td auto">
                            <label for="last_name" class="pos">Last Name</label>
                            <input name="last_name" type="text" class="inp_txt lh w150" id="last_name" value="<?php echo $aArtistEnName[1];?>" title="Last Name 입력">
                            </span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">사진등록 *</th>
                         <td >
                            <div class="photoUpload">
                               <div class="photo"><?php if(!empty($Artist->attr['photo_up_file_name'])):?><img src="<?php echo artistUploadPath.$Artist->attr['photo_up_file_name'];?>" width="110" height="150"><?php endif;?></div>
                               <div class="cont clearfix">
                                  <div class="fileinputs" >
                                     <input type="file" class="file" name="photo_file" />
                                  </div>&nbsp;JPG 파일만 업로드 가능합니다.
                                  <?php if(!empty($Artist->attr['photo_up_file_name'])):?>
                                  <div class="lst_Upload">
                                     <span class="tag" id="span-photo"><?php echo $Artist->attr['photo_ori_file_name'];?> <button onclick="deleteAttach('<?php echo $Artist->attr['artist_idx'];?>', 'photo');">삭제</button></span>
                                  </div>
                                  <?php endif;?>
                               </div>
                            </div>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">CV *</th>
                         <td >
                            <div class="clearfix">
                               <div class="fileinputs" >
                                  <input type="file" class="file" name="cv_file" />
                               </div>&nbsp;PDF 파일만 업로드 가능합니다.
                               <?php if(!empty($Artist->attr['cv_up_file_name'])):?>
                               <div class="lst_Upload">
                                  <span class="tag" id="span-cv"><?php echo $Artist->attr['cv_ori_file_name'];?> <button onclick="deleteAttach('<?php echo $Artist->attr['artist_idx'];?>', 'cv');">삭제</button></span>
                               </div>
                               <?php endif;?>
                            </div>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">직업 *</th>
                         <td >
                            <span class="col_td auto">
                            <label for="job" class="pos">화가/문화센터강사/연구원</label>
                            <input name="job" type="text" class="inp_txt lh w190" id="job" value="<?php echo $Artist->attr['artist_job'];?>" title="직업 입력">
                            </span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">출생년월일</th>
                         <td >
                            <span class="datapiker"><input name="birthday" type="text" class="inp_txt date" id="birthday" value="<?php echo $Artist->attr['artist_birthday'];?>" readonly></span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">장르 *</th>
                         <td >
                            <span class="col_td auto">
                            <label for="genre" class="pos">서양화/극사실화</label>
                            <input name="genre" type="text" class="inp_txt lh w190" id="genre" value="<?php echo $Artist->attr['artist_genre'];?>" title="장르 입력">
                            </span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">휴대폰 *</th>
                         <td >
                            <span class="col_td auto">
                            <label for="artist_mobile" class="pos">숫자만 입력가능</label>
                            <input name="mobile" type="text" class="inp_txt lh w150 only_number" id="artist_mobile" value="<?php echo $Artist->attr['artist_mobile'];?>" maxlength="11" title="휴대폰 번호 입력">
                            </span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">이메일 *</th>
                         <td >
                            <input name="email" type="text" class="inp_txt w190" id="email" value="<?php echo $Artist->attr['artist_email'];?>" maxlength="60" title="이메일 주소 입력">
                         </td>
                      </tr>
                   </tbody>
               </table>
            </div>
			 <div class="lst_table3 artist">
               <table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
                  <caption>작가 등록</caption>
                  <colgroup>
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <?php for($i=0; $i<2; $i++){?>
                      <tr>
                        <th scope="row">학력 <?php echo $i+1;?><sup><?php echo numberOrdering($i+1);?></sup></th>
                        <td >
                          <select name="education_year[]">
                            <option value="">연도선택</option>
                          <?php for($j=$bYear; $j>=$eYear; $j--){$p=$i+1;?>
                            <option value="<?php echo $j;?>"<?php if ($aEducationYear[$i] === (string)$j):?> selected<?php endif;?>><?php echo $j;?></option>
                          <?php }?>
                          </select>
                          <input name="education_name[]" type="text" class="inp_txt w390" id="" value="<?php echo $aEducationName[$i];?>" title="학력 <?php echo $p.numberOrdering($p);?> 입력">
                        </td>
                     </tr>
                     <?php }?>

                    <?php for($i=0; $i<3; $i++){$p=$i+1;?>
                     <tr>
                        <th scope="row">수상 <?php echo $i+1;?><sup><?php echo numberOrdering($i+1);?></sup></th>
                        <td >
                          <select name="award_year[]">
                            <option value="">연도선택</option>
                            <?php for($j=$bYear; $j>=$eYear; $j--){?>
                            <option value="<?php echo $j;?>"<?php if ($aAwardYear[$i] === (string)$j):?> selected<?php endif;?>><?php echo $j;?></option>
                            <?php }?>
                          </select>
                          <input name="award_name[]" type="text" class="inp_txt w390" id="" value="<?php echo str_replace("\'", "'", $aAwardName[$i]);?>" title="수상 <?php echo $p.numberOrdering($p);?> 입력">
                      </td>
                     </tr>
                    <?php }?>

                    <?php for($i=0; $i<3; $i++){$p=$i+1;?>
                     <tr>
                        <th scope="row">개인전 <?php echo $i+1;?><sup><?php echo numberOrdering($i+1);?></sup></th>
                        <td >
                          <select name="private_year[]">
                            <option value="">연도선택</option>
                            <?php for($j=$bYear; $j>=$eYear; $j--){?>
                            <option value="<?php echo $j;?>"<?php if ($aPrivateYear[$i] === (string)$j):?> selected<?php endif;?>><?php echo $j;?></option>
                            <?php }?>
                          </select>
                          <input name="private_name[]" type="text" class="inp_txt w390" id="" value="<?php echo $aPrivateName[$i];?>" title="개인전 <?php echo $p.numberOrdering($p);?> 입력">
                        </td>
                     </tr>
                     <?php }?>

                     <?php for($i=0; $i<3; $i++){$p=$i+1;?>
                     <tr>
                        <th scope="row">단체전 <?php echo $i+1;?><sup><?php echo numberOrdering($i+1);?></sup></th>
                        <td >
                          <select name="team_year[]">
                            <option value="">연도선택</option>
                            <?php for($j=$bYear; $j>=$eYear; $j--){?>
                            <option value="<?php echo $j;?>"<?php if ($aTeamYear[$i] === (string)$j):?> selected<?php endif;?>><?php echo $j;?></option>
                            <?php }?>
                          </select>
                          <input name="team_name[]" type="text" class="inp_txt w390" id="" value="<?php echo $aTeamName[$i];?>" title="단체전 <?php echo $p.numberOrdering($p);?> 입력">
                        </td>
                     </tr>
                     <?php }?>
                  </tbody>
               </table>
            </div>
			<div class="lst_table3 artist">
               <table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
                  <caption>작가 등록</caption>
                  <colgroup>
                     <col class="th1">
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row" >대표작</th>
                        <td colspan="2" class=""><input name="major_work_txt" type="text" class="inp_txt w190 searchPopup" id="major_work_txt" value="<?php echo $aMajorWorkTxt[0];?>" readonly><input name="major_work" type="hidden" class="inp_txt w190 searchPopup" id="major_work" value="<?php echo $Artist->attr['major_work_idx'];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('major_work', '')"><img src="/oktomato/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                     </tr>
                     <tr>
                        <th scope="row">작가인사말 *</th>
                        <td colspan="2">
                           <div class="textarea">
                              <textarea name="greeting" id="greeting"><?php echo $Artist->attr['artist_greeting'];?></textarea>
                           </div>
                           <p>40단어 제한, 현재 <span id="greeting_bytes">00</span> 단어</p>
                        </td>
                     </tr>
                <?php for($i=0; $i<5; $i++): ?>
                     <?php $artwork_cnt = ($yyyy === (int)$aAnnualArtworkYear[$i]) ? $aAnnualArtworkCnt[$i] : '0';?>
                     <?php if ($i === 0):?>
                     <tr>
                        <th scope="row" rowspan="5">연도별 전시수</th>
                        <th scope="row"><?php echo $yyyy;?><input name="artwork_year[]" type="hidden" value="<?php echo $yyyy;?>"></th>
                        <td><input name="artwork_cnt[]" type="text" class="inp_txt w50 only_number" value="<?php echo $artwork_cnt;?>" title=""></td>
                     </tr>
                     <?php else:?>
                     <tr>
                        <th scope="row"><?php echo $yyyy;?><input name="artwork_year[]" type="hidden" value="<?php echo $yyyy;?>"></th>
                        <td><input name="artwork_cnt[]" type="text" class="inp_txt w50 only_number" value="<?php echo $artwork_cnt;?>" title=""></td>
                     </tr>
                     <?php endif;?>
                <?php ++$yyyy; endfor;?>
                     <tr>
                        <th scope="row" rowspan="5">소셜</th>
                        <th scope="row">홈페이지</th>
                        <td><input name="homepage" type="text" class="inp_txt w200" id="" value="<?php echo $Artist->attr['homepage_url'];?>" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">블로그</th>
                        <td><input name="blog" type="text" class="inp_txt w200" id="" value="<?php echo $Artist->attr['blog_url'];?>" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">페이스북</th>
                        <td><input name="facebook" type="text" class="inp_txt w200" id="" value="<?php echo $Artist->attr['facebook_url'];?>" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">다른SNS 1</th>
                        <td >
                           <span class="col_td auto">
                             <label for="sns_1_name" class="pos">SNS Name</label>
                             <input name="sns_1_name" type="text" class="inp_txt lh w100" id="sns_1_name" value="<?php echo $Artist->attr['sns_1_name'];?>" title=" 입력">
                           </span>
                           <span class="col_td auto">
                             <label for="sns_1_url" class="pos">URL</label>
                             <input name="sns_1_url" type="text" class="inp_txt lh w100" id="sns_1_url" value="<?php echo $Artist->attr['sns_1_url'];?>" title=" 입력">
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">다른 SNS 2</th>
                        <td >
                           <span class="col_td auto">
                             <label for="sns_2_name" class="pos">SNS Name</label>
                             <input name="sns_2_name" type="text" class="inp_txt lh w100" id="sns_2_name" value="<?php echo $Artist->attr['sns_2_name'];?>" title=" 입력">
                           </span>
                           <span class="col_td auto">
                             <label for="sns_2_url" class="pos">URL</label>
                             <input name="sns_2_url" type="text" class="inp_txt lh w100" id="sns_2_url" value="<?php echo $Artist->attr['sns_2_url'];?>" title=" 입력">
                           </span>
                        </td>
                     </tr>
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
  <link rel="stylesheet" href="/css/form.css" />
<?php include(ROOT.'lib/include/goods/artwork.inc.php');?>
<?php echo ACTION_IFRAME;?>
<input type="hidden" name="param-txt" id="param-txt">
<input type="hidden" name="param-num" id="param-num">
<script>
$(function(){
	//레이어 팝업
	$(".layerOpen").click(function(){
		$(".layer_popup1").css("display","none");
		var id = $(this).attr("href");
		var x = $(this).offset().left;
		var y = $(this).offset().top-10;
		layerBoxOffset(id,x,y);
		return false;
	});

	LabelHidden(".inp_txt.lh");
	//bbsCheckbox();
	checkListMotion();
	initFileUploads();

	$("#btnSave").click(function() {
		chkForm(document.writeFrm);
	});

	$("#greeting").keyup(function(){
		var len = returnToCount(document.getElementById("greeting"), 40);

		if (len > 40) {
			alert("인사말은 40 단어 까지 등록하실 수 있습니다.");
			//$("#greeting").val(strCut($("#greeting").val(), 40));
			//$("#greeting_bytes").html(returnToCount(document.getElementById("greeting"), 40))
			return;
		}

		$("#greeting_bytes").html(len)
	});

});

function returnToCount(obj, max) {
	var val = obj.value;
	var tmp_chr = null;
	var len = 0;
	var blank_pattern = /^\s+|\s+$/g;

	if (val != "") {
		for (var i = 0; i < val.length; i++) {
			tmp_chr = val.charAt(i);
			if (blank_pattern.test(tmp_chr) == true) {
				len += 1;
			}
			/*
			if (escape(tmp_chr).length > 4) {
				len += 2;
			}
			else {
				len += 1;
			}
			*/
		}
	}

	return len;

}


function chkForm(f) {
	if (f.name.value == "") {
		alert("작가명을 입력하세요.");
		f.name.focus();
		return false;
	}

	if (f.first_name.value == "") {
		alert("First Name 을 입력하세요.");
		f.first_name.focus();
		return false;
	}

	if (f.first_name.value == "") {
		alert("Last Name 을 입력하세요.");
		f.last_name.focus();
		return false;
	}

	if (f.old_photo_file.value == "" && f.photo_file.value == "") {
		alert("사진을 등록하세요.");
		return false;
	}
	if (f.old_cv_file.value == "" && f.cv_file.value == "") {
		alert("CV 등록하세요.");
		return false;
	}

	if ($("#job").val() == "") {
		alert("직업을 입력하세요.");
		$("#job").focus();
		return false;
	}

	/*
	if ($("#birthday").val() == "") {
		alert("출생년월일을 입력하세요.");
		$("#birthday").focus();
		return false;
	}
	*/

	if ($("#artist_mobile").val() == "") {
		alert("휴대폰번호를 숫자로 입력하세요.");
		$("#artist_mobile").focus();
		return false;
	}

	if ($("#email").val() == "") {
		alert("이메일을 입력하세요.");
		return false;
	}
	else {
		if (!chkEmail($("#email").val())) {
			alert("잘못된 이메일 형식입니다.");
			$("#email").focus();
			return false;
		}
	}

	/*
	if (chkDefaultForm(f)) {
		f.target = "action_ifrm";
		f.submit();
	}
	*/


	f.target = "action_ifrm";
	f.submit();
}

function deleteAttach(idx, attach) {
	if (idx == "") {
		alert("삭제할 수 없습니다.");
	}
	else {
			if (confirm("삭제하면 물리적 파일과 DB에서 삭제됩니다.\r\n정말 삭제하겠습니까?")) {
			$.ajax({
				type:"POST",
				url:"index.php",
				dataType:"JSON",
				data:{"idx":idx, "attach":attach, "at":"delete"},
				success: function(data) {
					if (data.cnt > 0) {
						if (attach == 'photo'){
							$(".photoUpload > .photo > img").remove();
						}
						$("#span-"+attach).remove();
						$("#old_"+attach+"_file").val("");
						$("#old_"+attach+"_ori_file").val("");
						alert("삭제되었습니다.");
					}
					else{
						alert("삭제할 수 없습니다.");
					}
				},
				error: function(xhr, status, error) {
					alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
				}
			});
		}
	}
}

function searchArtWork() {
	$.ajax({
		type:"POST",
		url:"/oktomato/market/marketmain/artwork.php",
		dataType:"html",
		data:{"artwork":$("#artwork").val(), txt:$("#param-txt").val(), num:$("#param-num").val()},
		success: function(data){
			$("#div-artwork >ul").html(data);
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}

function setArtWorkInsert(idx, name, artist, txt, num) {
	$("#"+txt+"_txt").val(name+'('+artist+')');
	$("#"+txt).val(idx);
	$("#artwork").val("");
	$("#div-artwork >ul").html("");
	$(".layer_popup1").css("display","none");
	setParam('', '');
}

function setParam(txt, num) {
	$("#param-txt").val(txt);
	$("#param-num").val(num);
}

</script>
<?php
include(ROOT.'inc/footer.php');
include(ROOT.'inc/bot.php');
