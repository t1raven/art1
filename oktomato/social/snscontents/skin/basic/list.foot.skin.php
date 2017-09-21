      </article>
   </div>
   <!-- //container_inner -->
</section>
<!-- //container -->
<?php echo ACTION_IFRAME;?>

<script type="text/javascript" src="../../../js/ajaxupload.js"></script>
<script>
function chkForm(f) {
	if (chkDefaultForm(f)) {
		f.target = "action_ifrm";
		f.action = "index.php?at=write";
		f.submit();
	}
}

function submitForm(f){
		//chkForm(f);
		f.target = "action_ifrm";
		f.action = "index.php?at=update";
		f.submit();
}


function deleteFile(idx, v) {
	if(confirm("이미지를 삭제하시겠습니까?")){
		var tmpImgFile = $("#sns_img"+v).val();
		var oldSnsImg = $("#old_sns_img"+v).val();

		$.ajax({
			type:"POST",
			url:"__delete_file.php",
			dataType:"JSON",
			data:{"idx":idx,"oldSnsImg":oldSnsImg,"tmpImgFile":tmpImgFile},
			success: function(data) {
				//alert(data);
				if (data.cnt > 0) {
					$("#btn_regist"+v).css("display","inline");
					$("#btn_delete"+v).css("display","none");
					$("#sns_img"+v).val("");
					$("#banner"+v).attr("src","");

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
/*
function deleteListImg() {
	var attach, msg;

	if ($("#main_img_old").val() != "") {
		attach = $("#main_img_old").val();
		msg = "삭제하면 물리적 파일과 DB에서 삭제됩니다.\r\n정말 삭제하겠습니까?";
	}
	else {
		attach = $("#main_img").val();
		msg = "삭제하면 물리적 파일이 삭제됩니다.\r\n정말 삭제하겠습니까?";
	}

	if (confirm(msg)) {
		$.ajax({
			type:"POST",
			url:"index.php",
			dataType:"JSON",
			data:{"idx":$("#idx").val(), "attach": attach, "at":"delete"},
			success: function(data) {
				if (data.cnt > 0) {
					$("#btn_regist").css("display","block");
					$("#btn_delete").css("display","none");
					$("#main_img").val("");
					$("#main_img_old").val("");
					$("#banner").attr("src","");
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
*/
<?php
$max_i = $i ;
for ($i=0; $max_i > $i ; $i++ ){
?>
	var button<?php echo $i ;?> = $("#btn_regist<?php echo $i ;?>"), interval;

		new AjaxUpload(button<?php echo $i ;?>,{
			action: '__upload.php',
			name: 'single_file',
			onSubmit : function(file, ext){
				this.disable();
				$("#upload_status<?php echo $i ;?>").css("display", "block");

			},
			onComplete: function(file, response){
				$("#upload_status<?php echo $i ;?>").css("display", "none");
				var result = $.trim(response).split("|");
				var status = result[0];

				if (status == "__complete"){
					var filename = result[1];
					$("#btn_regist<?php echo $i ;?>").css("display","none");
					$("#btn_delete<?php echo $i ;?>").css("display","inline");
					$("#sns_img<?php echo $i ;?>").val(filename);
					$("#banner<?php echo $i ;?>").attr("src","/upload/temp/" + filename);
				}
				else if (status == "__large"){
					alert("1Mbyte 이하인 이미지를 선택하세요.");
				}
				else{
					alert("[jpg|gif|png]파일을 선택하세요.");
				}
				this.enable();
			}
		});
<?
}
?>

$(function(){
	LabelHidden(".inp_txt.lh");
	// bbsCheckbox();
	checkListMotion();
	//initFileUploads();
	btnHover(".btnOvr");
})
</script>
<?php include('../../inc/bot.php'); ?>