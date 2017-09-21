<?php
if (!defined('OKTOMATO')) exit;
?>

<section id="pop_edit" class="modal_type1">
    <div class="inner">

	<form name="form_banner" id="frm_banner" method="post" enctype="multipart/form-data" >
	<input type="hidden" name="at" id="at" value="update">

        <div class="modal_header">
           <div class="inner container">
                <h1>Quick Link Icon Setting</h1>
                <!-- <button class="modal_save" onclick="modalFn.hide($('#pop_edit'));">저장</button> -->
                <button class="modal_save" type="button" onclick="quickLinkSave(this.form)">저장</button>
                <button class="modal_close" type="button" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_quickmenu">
                    <div class="edit_area">
<?php
//    for ($i=1; $i<=8; $i++) {
$i =1;
foreach($list as $row) {	
?>
                         
						<table class="tb_type_edit">
                            <colgroup>
                                <col width="80px">
                                <col width="120px">
                                <col>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th rowspan="3" class="top slot">
                                        Slot <?php echo $i?>
                                    </th>
                                    <th class="top">
                                        Icon image<br/>
                                        <span>(26 x 26px)</span>
                                    </th>
                                    <td>
                                        <div class="imginputs">
                                            <input type="hidden" name="mainQuickLinkIdx[]" id="mainQuickLinkIdx_<?php echo $row['mainQuickLinkIdx']?>"  value="<?php echo $row['mainQuickLinkIdx']?>">
											<input type="hidden" name="oldQuickUpFileName[]" id="oldQuickUpFileName_<?php echo $i ?>" value="<?php echo $row['upFileName']?>"> 
											<input type="file" class="file" name="quickUpFileName[]" id="quickUpFileName_<?php echo $i ?>" onchange="mainEdit.readFileURL(this, <?php echo $i?>);">
                                            <div class="fakeimg">
                                                <div id="imgArea_<?php echo $i?>" class="imgArea"><?php if (!empty($row['upFileName'])): ?><img src="<?php echo $row['upFileName']; ?>" style="max-width: 26px; max-height:26px"><?php endif; ?></div>
                                            </div>
                                            <a class="btn" href="javascript:void(0);" onclick="mainEdit.readFileOn(this);">Browser</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Text<br/>
                                        <span>(18bytes)</span>
                                    </th>
                                    <td>
                                        <input type="text" class="ipt" name="quickText[]" id="quickText_<?php echo $i ?>"  value="<?php echo $row['content']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hyperlink</th>
                                    <td>
                                        <input type="text" class="ipt" name="quickHyperlink[]" id="quickHyperlink_<?php echo $i ?>"  value="<?php echo $row['linkUrl']?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
<?php
	$i++;
}
//    }
?>
                    </div>
                </div>
            </div>
        </div>

	</form>

    </div>
</section>

<script>
function quickLinkSave (f) {
	try {
		var max_i = "<?php echo count($list) ?>";

		for (var i=1; i <= max_i ; i++ ) {
			if ( $("#oldQuickUpFileName_"+i).val() == "" )
			{
				if ( $("#quickUpFileName_"+i).val() == "") {
					alert("Slot "+i+"의 이미지를 입력하셔야 합니다.");
					return false;
				}
			}
			if ( $("#quickText_"+i).val() == "") {
				alert("Slot "+i+"의 텍스트를 입력하셔야 합니다.");
				$("#quickText_"+i).focus();
				return false;
			}
			if ( $("#quickHyperlink_"+i).val() == "") {
				alert("Slot "+i+"의 링크를 입력하셔야 합니다.");
				$("#quickHyperlink_"+i).focus();
				return false;
			}
		}

		var formData = new FormData(f);
		$.ajax({
			url: '/main_edit/quickmenu/',
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