<?php
if (!defined('OKTOMATO')) exit;
?>

<section id="pop_edit" class="modal_type1">
    <div class="inner">

	<form name="form_banner" id="frm_banner" method="post" >
	<input type="hidden" name="at" id="at" value="update">

        <div class="modal_header">
           <div class="inner container">
                <h1>Keyword Setting</h1>
                <!-- <button class="modal_save" onclick="modalFn.hide($('#pop_edit'));">저장</button> -->
                <button class="modal_save" type="button" onclick="kewordSave(this.form)">저장</button>
                <button class="modal_close"  type="button"  onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_keyword">
                    <div class="edit_area">
<?php
//    for ($i=1; $i<=10; $i++) {
	$i=1;
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
                                        New tag
                                    </th>
                                    <td>
                                        <input type="hidden" name="sort[]" id="sort_<?php echo $row['sort']?>"  value="<?php echo $row['sort']?>">
										<input type="hidden" name="mainKeywordIdx[]" id="mainKeywordIdx_<?php echo $row['mainKeywordIdx']?>"  value="<?php echo $row['mainKeywordIdx']?>">
										<input type="radio" name="isNew_<?php echo $i-1?>" id="isNew[<?php echo $i?>][0]" class="chkraido" value="Y" <?php echo ($row['isNew']=='Y') ? 'checked=""' : '' ;?>>
                                        <label for="isNew[<?php echo $i?>][0]">On</label>
                                        <input type="radio" name="isNew_<?php echo $i-1?>" id="isNew[<?php echo $i?>][1]" class="chkraido" value="N" <?php echo ($row['isNew']!='Y') ? 'checked=""' : '' ;?>>
                                        <label for="isNew[<?php echo $i?>][1]">Off</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Text<br/>
                                        <span>(24bytes)</span>
                                    </th>
                                    <td>
                                        <input type="text" class="ipt" name="keywordText[]"  id="keywordText_<?php echo $i?>"  value="<?php echo $row['content']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hyperlink</th>
                                    <td>
                                        <input type="text" class="ipt" name="keywordLink[]"  id="keywordLink_<?php echo $i?>"  value="<?php echo $row['linkUrl']?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
<?php
		$i++;
    }
?>
                    </div>
                </div>
            </div>
        </div>

		</form>

    </div>
</section>

<script>
function kewordSave (f) {
	try {
		var max_i = "<?php echo count($list) ?>";

		for (var i=1; i <= max_i ; i++ ) {
			if ( $("#keywordText_"+i).val() == "") {
				alert("Slot "+i+"의 텍스트를 입력하셔야 합니다.");
				$("#keywordText_"+i).focus();
				return false;
			}
			if ( $("#keywordText_"+i).val() == "") {
				alert("Slot "+i+"의 링크를 입력하셔야 합니다.");
				$("#quickHyperlink_"+i).focus();
				return false;
			}
		}

		var formData = new FormData(f);
		$.ajax({
			url: '/main_edit/keyword/',
			data: formData,
			type: 'POST',
			dataType: 'JSON',
			processData: false,
			contentType: false,
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
				alert("ajax Error!  업로드 실패");
			}
		});

	}
	catch(e) {
        return false;
    }
}
</script>