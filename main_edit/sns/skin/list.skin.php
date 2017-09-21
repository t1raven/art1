<?php
if (!defined('OKTOMATO')) exit;

    $size = isset($_GET['size']) ? $_GET['size'] : "w1h1";
?>
<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
            <div class="inner container back">
                <!-- <button class="modal_back" onclick="modalFn.change('/main_edit/__ajax_pop_type.php', $('#pop_edit'), 'prev');">Back</button> -->
                <button class="modal_back" onclick="modalFn.change('/main_edit/pop_type/', $('#pop_edit'), 'id=<?php echo $id?>&idx=<?php echo $idx?>4&type=<?php echo $type?>&size=<?php echo $size?>');">Back</button>
                <h1>SNS Content Setting</h1>
                <!-- <button class="modal_save" onclick="mainEdit.editSave();">저장</button> -->
				<button class="modal_save" type="button" onclick="ContentSave(document.form_content);">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class=" inner_cont sns <?php if($size == "w2h1") echo 'w2' ?>">
                    <div class="edit_area">

					<form name="form_content" id="form_content" method="post" enctype="multipart/form-data" >
					<input type="hidden" name="at" id="at" value="update">
					<input type="hidden" name="mainContentIdx" id="mainContentIdx" value="<?php echo $row['mainContentIdx']?>"> 
					<input type="hidden" name="contentType" id="contentType" value="<?php echo $type?>"> 
					<input type="hidden" name="size" id="size" value="<?php echo $size?>"> 

                        <table class="tb_type_edit">
                            <colgroup>
                                <col width="30%">
                                <col width="70%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>Type</th>
                                    <td>
                                        <input type="radio" name="snstype" id="select[0]" class="chkraido" value="facebook" <?php echo ($row['snsType']!='I') ? 'checked=""' : '' ;?> >
                                        <label for="select[0]">Facebook</label>
                                        <input type="radio" name="snstype" id="select[1]" class="chkraido" value="instagram" <?php echo ($row['snsType']=='I') ? 'checked=""' : '' ;?> >
                                        <label for="select[1]">Instagram</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Image<br/>
<?php
    if($size == "w2h1") {
?>
                                        <span>(634 x 312px)</span>
<?php
    }else if($size == "w2h2"){
?>
                                        <span>(634 x 634px)</span>
<?php
    }else{
?>
                                        <span>(312 x 312px)</span>
<?php
    }
?>
                                    </th>
                                    <td>
                                        <div class="imginputs">
                                            <input type="hidden" name="oldContentUpFileName" id="oldContentUpFileName" value="<?php echo $row['upFileName']?>"> 
											<input type="file" class="file" name="mainContentImg" id="mainContentImg"  onchange="mainEdit.readFileURL(this, 1);" name="image">
											<!-- <input type="file" class="file" onchange="mainEdit.readFileURL(this, 1);" name="image"> -->
                                            <div class="fakeimg">
                                                <div id="imgArea_1" class="imgArea <?php echo $size?>"><?php if (!empty($row['upFileName'])): ?><img src="<?php echo $row['upFileName']; ?>" style="max-width: 100px; max-height:100px" class="img"><?php endif; ?></div>
                                            </div>
                                            <a class="btn" href="javascript:void(0);" onclick="mainEdit.readFileOn(this);">Browser</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hyperlink</th>
                                    <td>
                                        <input type="text" class="ipt" name="contentLink"  id="contentLink"  value="<?php echo $row['hyperLink']?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="preview_area">
                        <div class="grid-item type_sns facebook" data-type="classtype" data-class="facebook instagram" data-name="snstype">
                            <div class="img previewImg"><?php if (!empty($row['upFileName'])): ?><img src="<?php echo $row['upFileName']; ?>"  class="img"><?php endif; ?></div>
                            <div class="cover">
                                <div class="standard">
                                    <div class="inner">
                                        <p class="icon">icon</p>
                                        <p class="like">like</p>
                                    </div>
                                </div>
                                <div class="hover">
                                    <div class="inner">
                                        <a href="javascript:void(0);" data-type="link" data-name="hyperlink" target="_blank" class="more"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        newsAni.hoverMotion('.preview_area .grid-item');
                        mainEdit.editChangeData();
                        iCutterOwen([".preview_area .grid-item .img"]);

						//폼 처리
						function ContentSave(f) {
							try {
								if ( $("#oldContentUpFileName").val() == "" )
								{
									if ( $("#mainContentImg").val() == "") {
										alert("이미지를 입력하셔야 합니다.");
										return false;
									}
								}
								if ( $("#contentLink").val() == "") {
									alert("Hyperlink 를 입력하셔야 합니다.");
									return false;
								}

								var formData = new FormData(f);
								$.ajax({
									url: '/main_edit/sns/',
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
                </div>
            </div>
        </div>
    </div>
</section>