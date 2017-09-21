
            </tbody>


          </table>


          <div class="bot_align">
            <div class="btn_right">
              <!-- button onclick="location.href='?at=list'" class="btn_pack1 gray ov-b small rato">List</button -->
			  <button onclick="location.href='?<?php echo PageUtil::_param_get('at=list');?>'" class="btn_pack1 gray ov-b small rato">List</button>
			  
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


<?php
echo ACTION_IFRAME;
?>

<script>
$("#cdate_h").val("<?php echo $cdate_h; ?>");
$("#cdate_m").val("<?php echo $cdate_m; ?>0");
//$("#reserve_h").val("<?php echo $cdate_h; ?>");
//$("#reserve_m").val("<?php echo $cdate_m; ?>0");

function newsListImgInput(cate_idx){
	//alert($("#news_main").is(":checked"));
	/*
	if ($("#news_main").is(":checked") == true){
		$("#newsmain_tr").css("display","");
	}else{
		$("#newsmain_tr").css("display","none");
	}
	*/
	if (cate_idx == 1){
		$("#span_img_size_text").text("700px * 337px");
	}else{
		$("#span_img_size_text").text("600px * 450px");
	}
}

</script>
<script> 

	function chkForm(f){
		if(chkDefaultForm(f) ){
			alert(chkDefaultForm(f));
			//f.target = "action_ifrm";
			f.submit();
		}
	}
	$("#btnSave").click(function(){
		// chkForm(document.joinFrm);
		if ( $("input:radio[name='newsCate1']").is(":checked") == false){
			alert('뉴스카테고리를 선택하셔야 합니다.');
			$("input:radio[name='newsCate1']").focus();
			return false ;
		}
		if ( $("#title").val() == "" ){
			alert('제목을 입력하셔야 합니다.');
			$("#title").focus();
			return false ;
		}

		if ( $("#img_content_1").val() == "" && $("#video_content_1").val() == "" ){
			alert('뉴스 첫번째 단락 내용이 없습니다.');
			return false ;
		}
		//chkForm(document.fomnews);
		document.fomnews.target = "action_ifrm";
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
			//url:"__add_table.php",
			url:"skin/basic/write.body.skin.php",
			//data:{"idx":idx},
			data:{"parag_idx":idx},
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

function deleteMainFile(idx) {
	if(confirm("이미지를 삭제하시겠습니까? 삭제하면 복구 할 수 없습니다.")){
		$.ajax({
			type:"POST",
			url:"__delete_file_main.php",
			dataType:"JSON",
			data:{"idx":idx},
			success: function(data) {
//				alert(data);
				if (data.cnt > 0) {
					$("#span-img").remove();
					$("#span-view-img").remove();
					$("#old_news_main_up_file_name").val("");
					$("#old_news_main_ori_file_name").val("");
					
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
<script type="text/javascript">
        function readURL(input, idx) {
			alert( input.files[0]);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
					alert('#view-img-'+idx);
					alert(e.target.result);
                    $('#view-img-'+idx).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<? include "../../inc/bot.php"; ?>
