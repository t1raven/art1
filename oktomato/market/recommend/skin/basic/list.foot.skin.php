<?php if (!defined('OKTOMATO')) exit;?>
				</tbody>
			  </table>
			</div><!-- //lst_table3 -->
		</div>
		<div class="rgh_area" style="float:right; width:48%;">
			<form name="writeFrm" method="post" enctype="multipart/form-data" onsubmit="return false;">
			<input type="hidden" name="at" value="update">
			<input type="hidden" name="idx">
			<input type="hidden" name="old_img_up_file">
			<div class="lst_table3 no_line">
				<h1 class="title1">Modify</h1>
					<table summary="Search Option ImageUpload">
						<caption>Search Option ImageUpload</caption>
						<colgroup>
						  <col>
						  <col>
						  <col>
						  <col>
						</colgroup>
						<tbody>
						  <tr>
							<td>
							  <div class="clearfix d-t on">
							   <span class="fileImg">
								 <img src="/images/ico/tag1.png" id="referee-img">
								</span>
								<div class="fileinputs" >
								  <input type="file" class="file" name="img_file">
								</div>
							  </div>
							</td>
						  </tr>
						  <tr>
							<td>
								<span class="col_td auto">
								 <!--label for="referee" class="pos name" style="display: block;">김순응 대표</label-->
								 <input name="referee" type="text" class="inp_txt w90 {label:'추전인',required:true}" id="referee">
							   </span>
							   &nbsp;
							   <button type="submit" class="btn_pack1 ov-b small rato" id="btnSave">SAVE</button>
							</td>
						  </tr>
						</tbody>
					  </table>
				</div><!-- //lst_table3 -->
				</form>
			</div>
		</div>
      </section><!--// section_box -->
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->
<?php echo ACTION_IFRAME;?>

<script>
$(function(){
	$("#btnSave").click(function() {
		chkForm(document.writeFrm);
	});

	LabelHidden(".inp_txt.lh");
	initFileUploads();
	btnHover(".btnOvr");
})

function chkForm(f) {
	if (f.old_img_up_file.value == "" && f.img_file.value == "") {
		alert("이미지를 입력하세요.");
		f.img_file.focus();
		return false;
	}

	if (chkDefaultForm(f)) {
		f.target = "action_ifrm";
		f.submit();
	}
	//f.submit();
}

function editArticle(idx, img, referee) {
	var f = document.writeFrm;
	f.idx.value = idx;
	f.referee.value = referee;
	f.old_img_up_file.value = img;
	$("#referee-img").attr("src", "/upload/recommend/"+img);
}

function deleteArticle(idx) {
	if (confirm("정말 삭제하겠습니까?")) {
		$.ajax({
			type:"POST",
			url:"index.php",
			dataType:"JSON",
			data:{"idx":idx, "at":"delete"},
			success: function(data) {
				if (data.cnt > 0) {
					alert("삭제되었습니다.");
					location.reload();
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
</script>
<?php include '../../inc/bot.php'; ?>