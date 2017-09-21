<?php
 $pageName = "Edit";
 $pageNum = "2";
 $subNum = "2";
 $thirdNum = "0";
?>
<? include "../../inc/link.php"; ?>
<? include "../../inc/top.php"; ?>
<? include "../../inc/header.php"; ?>
<? include "../../inc/side.php"; ?>
 <section id="container">
  <div class="container_inner">
    <? include "../../inc/path.php"; ?>
    <? include "../../inc/datepicker_setting.php"; ?>
     <article class="content">
	 <form name="fomnews" method="POST" action="?at=update" enctype="multipart/form-data" onsubmit="return false;" >
	 <input type="hidden" name="addTbl" id="addTbl" value="1">
	 <input type="hidden" name="arrAddTbl" id="arrAddTbl" value="1">
	 <input type="hidden" name="mode" id="mode" value="<?php echo $mode ; ?>">
	 <input type="hidden" name="idx" id="idx" value="<?php echo $news_idx ; ?>">
		<section class="section_box">
			<h1 class="title1">Category</h1>
			<div class="lst_table3">
			
				<table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
					<caption>작가 등록</caption>
					<colgroup>
					  <col class="th1">
					  <col>
					</colgroup>
					<tbody>
					  <tr>
						  <th scope="row">뉴스카테고리 선택</th>
						  <td>
							<div class="lst_check radio">
<?php
$Newstype = new Newstype();
$Newstype->setAttr("news_category_code", 1000000000);
$Newstype->setAttr("news_category_depth", 2);

$tmp = $Newstype->getList($dbh);
$list_cate = $tmp[0];
foreach($list_cate as $row_cate) { 
?>
								<span><label for="<?php echo($row_cate['news_category_name']);?>"><?php echo($row_cate['news_category_name']);?></label>
											<input type="radio" name="newsCate1" id="<?php echo($row_cate['news_category_name']);?>" value="<?php echo($row_cate['news_category_idx']);?>"
											<?php if($newsCate1==$row_cate['news_category_idx']){ echo 'checked';} ?>>
								</span>
<?php
}
$list_cate = null;
$tmp = null;
unset($list_cate);
unset($tmp);
?>

								<br />
							</div>
						  </td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>

		<section class="section_box">
			<h1 class="title1">Info.</h1>
			<div class="lst_table3">
				<table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
					<caption>작가 등록</caption>
					<colgroup>
					  <col class="th1">
					  <col>
					</colgroup>
					<tbody id="tbodyP">
					  <tr>
						<th scope="row" >타이틀1</th>
						<td >
						  <input name="title" type="text" class="inp_txt w390" id="title" value="<?php echo $news_title; ?>" title="타이틀 입력" >
						</td>
					  </tr>
						<tr>
							<th scope="row" >기자명</th>
							<td >
							  <input name="reporter" type="text" class="inp_txt w390" id="reporter" value="<?php echo $reporter_name; ?>" title="기자명 입력">   
							</td>
						</tr>
						<tr>
							<th scope="row" >출처</th>
							<td >
							  <input name="source" type="text" class="inp_txt w390" id="source" value="<?php echo $source; ?>" title="출처 입력">   
							</td>
						</tr>
						<tr>
							<th scope="row" >입력일시</th>
							<td >
							  <!-- input name="cdate" type="text" class="inp_txt w390" id="cdate" value="<?php echo $create_date; ?>" title="입력일시 입력"  -->   
							  <span class="datapiker"><input name="cdate_d" type="text" class="inp_txt date" id="sd" value="<?php echo $cdate_d; ?>"></span>
							  <select name="cdate_h" id="cdate_h">
							 	<option value="01">01시</option>
							 	<option value="02">02시</option>
							 	<option value="03">03시</option>
							 	<option value="04">04시</option>
							 	<option value="05">05시</option>
							 	<option value="06">06시</option>
							 	<option value="07">07시</option>
							 	<option value="08">08시</option>
							 	<option value="09">09시</option>
							 	<option value="10">10시</option>
							 	<option value="11">11시</option>
							 	<option value="12">12시</option>
							 	<option value="13">13시</option>
							 	<option value="14">14시</option>
							 	<option value="15">15시</option>
							 	<option value="16">16시</option>
							 	<option value="17">17시</option>
							 	<option value="18">18시</option>
							 	<option value="19">19시</option>
							 	<option value="20">20시</option>
							 	<option value="21">21시</option>
							 	<option value="22">22시</option>
							 	<option value="23">23시</option>
							 	<option value="24">24시</option>
							 </select>
							 <select name="cdate_m" id="cdate_m">
								<option value="00">00분</option>
							 	<option value="10">10분</option>
							 	<option value="20">20분</option>
							 	<option value="30">30분</option>
							 	<option value="40">40분</option>
							 	<option value="50">50분</option>
							 </select>
							</td>
						</tr>
						<tr>
							<th scope="row">노출여부</th>
							<td >
							 <div class="lst_check radio">
								  <span>
									<label for="exp">노출</label>
									<input type="radio" name="display_status" id="exp"  value="Y" <?php if($display_status=='Y' or$display_status=='' ){ echo 'checked';} ?>>
								  </span>
								  <span>
									<label for="exp_n">비노출</label>
									<input type="radio" name="display_status" id="exp_n" value="N" <?php if($display_status=='N'){ echo 'checked';} ?>>
								  </span>
								</div>
							</td>
						  </tr>
					</tbody>
				</table>
			</div>
		</section>

		<section class="section_box">
        <h1 class="title1">Paragraph 1</h1>
        <div class="lst_table3">


          <table summary="뉴스 단락 등록">
            <caption>뉴스 단락 등록</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
			
            <tbody id="tplus">

<?php
if ($mode=='edit'){

	$tmp = $News->getListParagraph($dbh);
	$list = $tmp[0];
	$total_cnt = $tmp[1];
	$total_cnt = isset($total_cnt) ? $total_cnt : 1;
	echo('<script>$("#addTbl").val('.$total_cnt.')</script>');
	$i=1;
	foreach($list as $row) { 
	//	include('skin/basic/list.body.skin.php');
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
                        <input type="radio" name="ImgOrVideo[<?php echo $i?>]" id="img<?php echo $i; ?>"  value="I" <?php if($row['img_or_video']=='img') echo 'checked' ;  ?> >
                      </span>
                      <span class="video_on"  data-idx="<?php echo $i; ?>"  onclick="butVideoTm('<?php echo $i; ?>')">
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
                    <div class="photo"><span id="span-view-img-<?php echo $i ;?>"><?php if($row['img_or_video']=='img' && $row['up_file_name']) echo '<img src=\''.newsUploadPath.$row['up_file_name'].'\' width=112 >' ;?></span></div>
                    <div class="cont clearfix">
						<p>가로1024px 이하. 1MB제한.</p>
                      <div class="fileinputs" >
                        <input type="file" class="file" name="imgFile[]"/>
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
              <tr class="imgArea<?php echo $i?> addTbl_<?php echo($i);?>">
                <th scope="row" >이미지 설명</th>
                <td >
                  <input name="img_comment[]" type="text" class="inp_txt w390" id="" value="<?php if($row['img_or_video']=='img') echo $row['img_comment'] ;  ?>" title="이미지설명 입력">   
                </td>
              </tr>
			  <tr  class="imgArea<?php echo $i?> addTbl_<?php echo($i);?>">
                <th scope="row">단락 텍스트</th>
                <td >
					 <div class="textarea">
                      <textarea name="img_content[]"><?php if($row['img_or_video']=='img') echo $row['new_paragraph_content'] ;  ?></textarea>
                    </div>
                </td>
              </tr>
			  <!-- tr class="imgArea">
                <th scope="row" >단락 추가/삭제</th>
                <td >
					 <div class="t-c">
                      <button><img src="<?=$currentFolder?>/images/common/btn_plus.gif" alt="" /></button>&nbsp <button><img src="<?=$currentFolder?>/images/common/btn_minus.gif" alt="" /></button>
                    </div>
                </td>
              </tr -->
			    <tr class="videoArea<?php echo $i?> addTbl_<?php echo($i);?>">
                <th scope="row">영상 썸네일</th>
                <td >
                  <div class="photoUpload">
                    <div class="photo"><span id="span-view-video-<?php echo $i ;?>"><?php if($row['img_or_video']=='video' && $row['up_file_name']) echo '<img src=\''.newsUploadPath.$row['up_file_name'].'\' width=112 >' ;?></span></div>
                    <div class="cont clearfix">
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
              <tr class="videoArea<?php echo $i?> addTbl_<?php echo($i);?>">
                <th scope="row" >영상 URL</th>
                <td >
                  <input name="video_url[]" type="text" class="inp_txt w390" id="" value="<?php if($row['img_or_video']=='video') echo $row['video_url'] ;  ?>" title=" 영상 URL 입력">   
                </td>
              </tr>
			  <tr class="videoArea<?php echo $i?> addTbl_<?php echo($i);?>">
                <th scope="row" >단락 텍스트</th>
                <td >
					 <div class="textarea">
                      <textarea name="video_content[]"><?php if($row['img_or_video']=='video') echo $row['new_paragraph_content'] ;  ?></textarea>
                    </div>
                </td>
              </tr>
			  <tr class="addTbl_<?php echo($i);?>">
                <th scope="row" >단락 추가/삭제</th>
                <td >
					 <div class="t-c">
                      <button onclick="addTbArticle(<?php echo $i ;?>);"><img src="<?=$currentFolder?>/images/common/btn_plus.gif" alt="" /></button>&nbsp 
					  <button onclick="delTbArticle(<?php echo $i ;?>);"><img src="<?=$currentFolder?>/images/common/btn_minus.gif" alt="" /></button>
                    </div>
                </td>
              </tr>

			  <!--// 추가/삭제될 표 영역 E -->
			  <script>
			<?php
			if ($row['img_or_video']=='img'){
			?>
				$("tr.videoArea<?php echo $i ; ?>").css("display","none")
				$("tr.imgArea<?php echo $i ; ?>").css("display","table-row")
			<?
			}else{
			?>
				$("tr.videoArea<?php echo $i ; ?>").css("display","table-row")
				$("tr.imgArea<?php echo $i ; ?>").css("display","none")
			<?
			}	  
			?>
			  </script>

<?
		$i=$i+1;
	}
}else{
?>
			<!--// 추가/삭제될 표 영역 S -->
              <tr>
                <th scope="row">이미지/영상 선택</th>
                <td >
                 <div class="lst_check radio">
                      <span class="img_on" data-idx="1"  onclick="butImgTm(1)">
                        <label for="img1">이미지</label>
                        <input type="radio" name="ImgOrVideo[1]" id="img1"  value="I"  checked>
                      </span>
                      <span class="video_on"  data-idx="1" onclick="butVideoTm(1)">
                        <label for="video1">영상</label>
                        <input type="radio" name="ImgOrVideo[1]" id="video1" value="V" >
                      </span>
                    </div>
                </td>
              </tr>
              <tr class="imgArea1">
                <th scope="row">이미지</th>
                <td >
                  <div class="photoUpload">
                    <div class="photo"></div>
                    <div class="cont clearfix">
						<p>가로1024px 이하. 1MB제한.</p>
                      <div class="fileinputs" >
                        <input type="file" class="file" name="imgFile[]"/>
                      </div>
                      <div class="lst_Upload">
                        <!-- span class="tag">홍길동.jpg <button>삭제</button></span -->
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="imgArea1">
                <th scope="row" >이미지 설명</th>
                <td >
                  <input name="img_comment[]" type="text" class="inp_txt w390" id="" value="" title="이미지설명 입력">   
                </td>
              </tr>
			  <tr  class="imgArea1">
                <th scope="row">단락 텍스트</th>
                <td >
					 <div class="textarea">
                      <textarea name="img_content[]"></textarea>
                    </div>
                </td>
              </tr>

				<tr class="videoArea1">
                <th scope="row">영상 썸네일</th>
                <td >
                  <div class="photoUpload">
                    <div class="photo"></div>
                    <div class="cont clearfix">
						<p>가로1024px 이하. 1MB제한.</p>
                      <div class="fileinputs" >
                        <input type="file" class="file" name="videoFile[]"/>
                      </div>
                      <div class="lst_Upload">
                        <!-- span class="tag">홍길동.jpg <button>삭제</button></span -->
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="videoArea1">
                <th scope="row" >영상 URL</th>
                <td >
                  <input name="video_url[]" type="text" class="inp_txt w390" id="" value="" title=" 영상 URL 입력">   
                </td>
              </tr>
			  <tr class="videoArea1">
                <th scope="row" >단락 텍스트</th>
                <td >
					 <div class="textarea">
                      <textarea name="video_content[]"></textarea>
                    </div>
                </td>
              </tr>
			  <tr class="">
                <th scope="row" >단락 추가/삭제</th>
                <td >
					 <div class="t-c">
                      <button onclick="addTbArticle();"><img src="<?=$currentFolder?>/images/common/btn_plus.gif" alt="" /></button>&nbsp 
					  <button onclick="delTbArticle();"><img src="<?=$currentFolder?>/images/common/btn_minus.gif" alt="" /></button>
                    </div>
                </td>
              </tr>

			  <!--// 추가/삭제될 표 영역 E -->

<?
}
?>



            </tbody>


          </table>


          <div class="bot_align">
            <div class="btn_right">
              <button onclick="alert('준비중입니다.');" class="btn_pack1 gray ov-b small rato">List</button>
              <button  id="btnSave" class="btn_pack1 ov-b small rato">Save</button>
            </div>
          </div>

        </div><!-- //lst_table3 -->

      </section>

      <!-- //lst_table2 -->
	  </form>
	 </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->



<script>
$("#cdate_h").val("<?php echo $cdate_h; ?>");
$("#cdate_m").val("<?php echo $cdate_m; ?>0");
</script>
<script> 

	function chkForm(f){
		if(chkDefaultForm(f) ){
			//f.target = "action_ifrm";
			f.submit();
		}
	}
	$("#btnSave").click(function(){
		// chkForm(document.joinFrm);
		document.fomnews.submit();
	});

   function butImgTm(idx){
			$("tr.videoArea"+idx).css("display","none");
			$("tr.imgArea"+idx).css("display","table-row");
			//$('input:radio[name="ImgOrVideo['+idx+']"][value="I"]).prop('checked', true);
   }

   function butVideoTm(idx){
			$("tr.videoArea"+idx).css("display","table-row");
			$("tr.imgArea"+idx).css("display","none");
			//$('input:radio[name="ImgOrVideo[0]"][value="V"]).prop('checked', true);
   }

function addTbArticle() {
	//alert(idx+" : "+stype);
	var idx =parseInt( $("#addTbl").val() ) + 1 ;
		$.ajax({
			type:"POST",
			url:"__add_table.php",
			data:{"idx":idx},
			success: function(data) {
				$("#tplus").append(data);
				$("#addTbl").val(idx);
				$("#arrAddTbl").val($("#arrAddTbl").val()+"-"+idx);

			    initFileUploads();
				checkListMotion();

				$("tr.videoArea"+idx).css("display","none")
				$("tr.imgArea"+idx).css("display","table-row")
			},
			error: function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			}
		});
}


function deleteParagraph(idx, pidx) {
	if(confirm("입력된 단락을 삭제하시겠습니까? 삭제하면 복구 할 수 없습니다.")){
		$.ajax({
			type:"POST",
			url:"__delete_paragraph.php",
			dataType:"JSON",
			data:{"idx":pidx},
			success: function(data) {
				if (data.cnt > 0) {
					alert("삭제되었습니다.");
					
					$(".addTbl_"+idx).remove(); 
					$("#arrAddTbl").val($("#arrAddTbl").val().replace ("-"+idx, ''));
					
					return true ;
				}
				else{
					alert("삭제할 수 없습니다.");
					return false;
				}
			},
			error: function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
				return false;
				//return true;
			}
		});
	}
}

function deleteFile(idx, pidx, v) {
	if(confirm("이미지를 삭제하시겠습니까? 삭제하면 복구 할 수 없습니다.")){
		$.ajax({
			type:"POST",
			url:"__delete_file.php",
			dataType:"JSON",
			data:{"idx":pidx},
			success: function(data) {
				if (data.cnt > 0) {
					$("#span-"+v).remove();
					$("#span-view-"+v).remove();
					$("#old_ori_file_name_"+idx).val("");
					$("#old_up_file_name_"+idx).val("");
					
					return true ;
				}
				else{
					alert("삭제할 수 없습니다.");
					return false;
				}
			},
			error: function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
				return false;
				//return true;
			}
		});
	}
}

function delTbArticle(idx){
	var delPar;
	var paragraph_idx;

	//alert('삭제');
	if (idx==1){
		alert('맨 앞 단락은 삭제 할 수 없습니다.');
		return;
	}
	
	pidx = $("#paragraph_idx_"+idx).val()
	if ($("#mode").val() == "edit" && pidx > 0 ){
		delPar = deleteParagraph(idx, pidx );
		return ;
	}

	$(".addTbl_"+idx).remove(); 
	$("#arrAddTbl").val($("#arrAddTbl").val().replace ("-"+idx, ''));

	//$(".imgArea").remove(); 
	
	
}

</script> 
 <script>
 $(function(){
	$("tr.videoArea1").css("display","none");
	$("tr.imgArea1").css("display","table-row");


	
	/*
	$(".img_on").click(function(){
		var idxd = $(this).data("idx"); 
		alert(idxd);
		$("tr.videoArea"+idxd).css("display","none")
		$("tr.imgArea"+idxd).css("display","table-row")
	 });

	 $(".video_on").click(function(){
		 var idxd = $(this).data("idx"); 
		$("tr.videoArea"+idxd).css("display","table-row")
		$("tr.imgArea"+idxd).css("display","none")
	 });
*/
   // and / or 스위치 함수
/*
   function butImg(idx){
		$("tr.videoArea"+idx).css("display","none")
		$("tr.imgArea"+idx).css("display","table-row")
   }
*/

    $("button.btn_switch").click(function(){
        var text = $(this).text();
        $(this).text((text == "AND") ? "OR":"AND");
        //$("#anor").val($(this).text());
    });

    LabelHidden(".inp_txt.lh");
    bbsCheckbox();
    checkListMotion();
    initFileUploads();
})

 </script>




<? include "../../inc/bot.php"; ?>


