<?php
if (!defined('OKTOMATO')) exit;
?>

<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
            <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/galleries_search/', $('#pop_edit'), 'idx=<?php echo $idx?>&type=<?php echo $type?>');">Back</button>
                <h1>Exhibitions Content Setting</h1>
                <button class="modal_save" onclick="mainEdit.editSave();">저장</button>
                <button class="modal_save" onclick="ContentSave(document.form_content, 'galleries');">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_galleries">
                    <div class="edit_area">

					<form name="form_content" id="form_content" method="post" enctype="multipart/form-data" >
					<input type="hidden" name="at" id="at" value="update">
					<input type="hidden" name="mainContentIdx" id="mainContentIdx" value="<?php echo $row['mainContentIdx']?>">
					<input type="hidden" name="contentType" id="contentType" value="galleries">
					<input type="hidden" name="exhibitionIdx" id="exhibitionIdx" value="<?php echo $exhibitionIdx?>">

                        <table class="tb_type_edit">
                            <colgroup>
                                <col width="30%">
                                <col width="70%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>Color Type</th>
                                    <td>
                                        <input type="radio" name="colortype" id="select[0]" class="chkraido" value="white" <?php echo (empty($row['colorType']) || $row['colorType']=='W') ? 'checked=""' : '' ;?> >
                                        <label for="select[0]">White</label>
                                        <input type="radio" name="colortype" id="select[1]" class="chkraido" value="black" <?php echo ($row['colorType']=='B') ? 'checked=""' : '' ;?>>
                                        <label for="select[1]">Black</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Image<br/><span>(312 x 312px)</span></th>
                                    <td>
                                        <div class="imginputs">
                                            <input type="hidden" name="oldContentUpFileName" id="oldContentUpFileName" value="<?php echo $row['upFileName']?>">
											<input type="file" class="file" name="mainContentImg" id="mainContentImg"  onchange="mainEdit.readFileURL(this, 1);" name="image">
                                            <div class="fakeimg">
                                                <div id="imgArea_1" class="imgArea"><?php if (!empty($row['upFileName'])): ?><img src="<?php echo $row['upFileName']; ?>" style="max-width: 100px; max-height:100px" class="img"><?php endif; ?></div>
                                            </div>
                                            <a class="btn" href="javascript:void(0);" onclick="mainEdit.readFileOn(this);">Browser</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hyperlink</th>
                                    <td>
                                        <input type="text" class="ipt" name="contentLink" id="contentLink" value="<?php echo $row['hyperLink']; ?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="preview_area">
                        <div class="grid-item type_galleries white" data-type="classtype" data-class="white black" data-name="colortype">
                            <div class="img previewImg"><?php if (!empty($row['upFileName'])): ?><img src="<?php echo $row['upFileName']; ?>"><?php endif; ?></div>
                            <div class="cover">
                                <div class="standard">
                                    <div class="inner">
                                        <p class="gallery" data-type="text" data-name="gallery"><?php echo $rowM['galleryNameKr']?></p>
                                        <p class="exhibition" data-type="text" data-name="exhibition"><?php echo $rowM['exhibitionTitle']?></p>
                                        <p class="date" data-type="text" data-name="date"><?php echo $rowM['beginDate']?> ~ <?php echo $rowM['endDate']?></p>
                                    </div>
                                </div>
                                <div class="hover">
                                    <div class="inner">
                                        <a href="javascript:void(0);" target="_blank" class="more" data-type="link" data-name="hyperlink"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        mainEdit.setPreview();
                        newsAni.hoverMotion('.preview_area .grid-item');
                        mainEdit.editChangeData();
                        iCutterOwen([".preview_area .grid-item"]);

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
									alert("Hyperlink 을 입력하셔야 합니다."); $("#contentLink").focus();
									return false;
								}


								var formData = new FormData(f);
								$.ajax({
									url: '/main_edit/galleries_search/',
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