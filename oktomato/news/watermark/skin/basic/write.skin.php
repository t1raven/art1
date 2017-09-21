<?php
 $pageName = "Edit";
 $pageNum = "2";
 $subNum = "3";
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

		<section class="section_box">
        <h1 class="title1">워터마크 관리</h1>
        <div class="lst_table3">


          <table summary="워터마크 등록">
            <caption>워터마크 </caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
			
            <tbody id="tplus">

		<form name="fomnews" method="POST" action="?at=update" enctype="multipart/form-data" onsubmit="return false;" >	
			<input type="hidden" name="mode" id="mode" value="edit">
			<input type="hidden" name="idx" id="idx" value="<?php echo $Watermark->attr['water_idx']; ?>">
			<input type="hidden" name="old_up_file_name" id="old_up_file_name" value="<?php echo $Watermark->attr['up_file_name']; ?>">
			  

              <tr>
                <th scope="row">이미지</th>
                <td >
                  <div class="photoUpload">
                    <div class="photo"><span id="span-view-img"><?php if($Watermark->attr['up_file_name']) echo '<img src=\''.newsUploadPath.$Watermark->attr['up_file_name'].'\' width=112 >' ;?></span></div>
                    <div class="cont clearfix">
						<p>가로300px 이하. 세로 1024px 이하 1MB제한.</p>
						<p>배경이 투명한 이미지를 사용하려면  PNG 파일만 가능 합니다. </p>
                      <div class="fileinputs" >
                        <input type="file" class="file" name="imgFile" />
                      </div>
                      <div class="lst_Upload">
                        <span class="tag" id="span-img"><?php echo $Watermark->attr['ori_file_name'] ;?> 
							<button onclick="deleteFile(<?php echo $Watermark->attr['water_idx'] ;?>)">삭제</button>
						</span>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>


            </tbody>


          </table>


          <div class="bot_align">
            <div class="btn_right">
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

	function chkForm(f){
		if(chkDefaultForm(f) ){
			alert(chkDefaultForm(f));
			//f.target = "action_ifrm";
			f.submit();
		}
	}
	$("#btnSave").click(function(){
		// chkForm(document.joinFrm);
		/*
		if ( $("input:radio[name='newsCate1']").is(":checked") == false){
			alert('뉴스카테고리를 선택하셔야 합니다.');
			$("input:radio[name='newsCate1']").focus();
			return false ;
		}
		*/
		//document.fomnews.target = "action_ifrm";
		document.fomnews.submit();
	});



function deleteFile(idx) {
	if(confirm("이미지를 삭제하시겠습니까? 삭제하면 복구 할 수 없습니다.")){
		$.ajax({
			type:"POST",
			url:"__delete_file.php",
			dataType:"JSON",
			data:{"idx":idx},
			success: function(data) {
			//alert(data);
				if (data.cnt > 0) {
					$("#span-img").remove();
					$("#span-view-img").remove();
					$("#old_ori_file_name").val("");
					$("#old_up_file_name").val("");
					
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

</script> 
 <script>
 $(function(){
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










