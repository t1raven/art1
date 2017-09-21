<?php
if (!defined('OKTOMATO')) exit;
?>

<section id="pop_edit" class="modal_type1">
    <div class="inner">

	<form name="form_banner" id="frm_banner" method="post" enctype="multipart/form-data" >
	<input type="hidden" name="at" id="at" value="update">
	<input type="hidden" name="section" id="section" value="<?php echo $row['section']?>"> 
	<input type="hidden" name="mainBannerIdx" id="mainBannerIdx" value="<?php echo $row['bannerIdx']?>"> 
	<input type="hidden" name="oldBannerUpFileName" id="oldBannerUpFileName" value="<?php echo $row['bannerUpFileName']?>"> 
	<input type="hidden" name="oldBannerFileName" id="oldBannerFileName" value="<?php echo $row['bannerFileName']?>"> 
	<input type="hidden" name="oldBannerUpFileNameMobile" id="oldBannerUpFileNameMobile" value="<?php echo $row['bannerUpFileNameMobile']?>"> 
	<input type="hidden" name="oldBannerFileNameMobile" id="oldBannerFileNameMobile" value="<?php echo $row['bannerFileNameMobile']?>"> 
	<input type="hidden" name="bannerName" id="bannerName" value="<?php echo $row['bannerName']?>"> 
	<input type="hidden" name="category" id="category" value="<?php echo $row['category']?>"> 
	<input type="hidden" name="target" id="category" value="<?php echo $row['target']?>"> 
	<input type="hidden" name="sort" id="sort" value="<?php echo $row['sort']?>"> 

        <div class="modal_header">
           <div class="inner container">
                <h1>AD Banner Setting</h1>
                <!-- <button class="modal_save" type="button" onclick="mainEdit.editSave();">저장</button> -->
                <button class="modal_save" type="button" onclick="bennerSave(this.form);">저장</button>
                <button class="modal_close" type="button" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_banner">
                    <div class="edit_area">
                        

						<table class="tb_type_edit">
                            <colgroup>
                                <col width="120px">
                                <col>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>
                                        Image(pc)<br/>
                                        <span>(1600 x 168px)</span>
                                    </th>
                                    <td>
                                        <div class="imginputs">
                                            <input type="file" class="file" name="mainBannerImg" id="mainBannerImg" onchange="mainEdit.readFileURL(this, 1);">
                                            <div class="fakeimg">
                                                <div id="imgArea_1" class="imgArea"><?php if (!empty($row['bannerUpFileName'])): ?><img src="<?php echo $row['bannerUpFileName']; ?>" style="max-width: 400px; max-height:40px"><?php endif; ?></div>
                                            </div>
                                            <a class="btn" href="javascript:void(0);" onclick="mainEdit.readFileOn(this);">Browser</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Image(mobile)<br/>
                                        <span>(1019 x 270px)</span>
                                    </th>
                                    <td>
                                        <div class="imginputs">
                                            <input type="file" class="file" name="mainBannerImgMobile" id="mainBannerImgMobile" onchange="mainEdit.readFileURL(this, 2);" value="<?php echo $row['bannerUpFileNameMobile']; ?>">
                                            <div class="fakeimg">
                                                <div id="imgArea_2" class="imgArea"><?php if (!empty($row['bannerUpFileNameMobile'])): ?><img src="<?php echo $row['bannerUpFileNameMobile']; ?>" style="max-width: 400px; max-height:100px" class="img"><?php endif; ?></div>
                                            </div>
                                            <a class="btn" href="javascript:void(0);" onclick="mainEdit.readFileOn(this);">Browser</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hyperlink</th>
                                    <td>
                                        <input type="text" class="ipt" name="linkUrl" id="linkUrl" value="<?php echo $row['linkUrl']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Display</th>
                                    <td>
                                        <input type="radio" name="isDisplay" id="display[0]" class="chkraido" value="Y" <?php if ($row['isDisplay'] === 'Y'): ?>  checked=""<?php endif; ?>>
                                        <label for="display[0]">On</label>
                                        <input type="radio" name="isDisplay" id="display[1]" class="chkraido" value="N" <?php if ($row['isDisplay'] === 'N'): ?>  checked=""<?php endif; ?>>
                                        <label for="display[1]">Off</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
						
                    </div>
                </div>
            </div>
        </div>
	
	</form>

    </div>
</section>

<script>
function bennerSave (f) {
	try {
		if ( $("#oldBannerFileName").val() == "" )
		{
			if ( $("#mainBannerImg").val() == "") {
				alert("PC용 이미지를 입력하셔야 합니다.");
				return false;
			}
		}
		
		if ( $("#oldBannerFileNameMobile").val() == "" )
		{
			if ( $("#mainBannerImgMobile").val() == "") {
				alert("모바일용 이미지를 입력하셔야 합니다.");
				return false;
			}
		}
		
		if ( $("#linkUrl").val() == "") {
            alert("Hyperlink 를 입력하셔야 합니다.");
            return false;
        }
		
		var formData = new FormData(f);
		$.ajax({
			url: '/main_edit/banner/',
			enctype: "multipart/form-data",
			processData: false,
			contentType: false,
			data: formData,
			type: 'POST',
			dataType: 'JSON',
			success: function(data){
				alert(data.msg);
				if (data.result == true)
				{
					location.reload();
				} else {
					modalFn.hide($('#pop_edit'));
				}
				
			},
			error: function(a,b,c){
				alert("파일 업로드 실패");
			}
		});
	}
	catch(e) {
        return false;
    }
}
</script>