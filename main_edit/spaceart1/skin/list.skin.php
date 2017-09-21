<?php
if (!defined('OKTOMATO')) exit;
?>

<section id="pop_edit" class="modal_type1">
    <div class="inner">



        <div class="modal_header">
            <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/__ajax_pop_type.php', $('#pop_edit'), 'prev');">Back</button>
                <h1>Space art1 Content Setting</h1>
                <!-- <button class="modal_save" onclick="mainEdit.editSave();">저장</button> -->
                <button class="modal_save" type="button" onclick="ContentSave(document.form_content, 'spaceart1');">저장</button>
                <button class="modal_close" type="button" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">


            <div class="inner">
                <div class="inner_cont edit_spaceArt1">
                    <div class="edit_area">

					<form name="form_content" id="form_content" method="post" enctype="multipart/form-data" >
					<input type="hidden" name="at" id="at" value="update">
					<input type="hidden" name="mainContentIdx" id="mainContentIdx" value="<?php echo $row['mainContentIdx']?>"> 
					<input type="hidden" name="contentType" id="contentType" value="spaceart1"> 
	

                        <table class="tb_type_edit">
                            <colgroup>
                                <col width="30%">
                                <col width="70%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>Color Type
									</th>
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
                                    <th>Hashtag</th>
                                    <td>
                                        <input type="text" class="ipt inputHashTagReplace" name="hashtag" id="hashtag" value="<?php echo str_replace(',', '#', $row['hashtag']) ?>">
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
					</form>

                    </div>
                    <div class="preview_area">
                        <div class="grid-item type_spaceart1 white" data-type="classtype" data-class="white black" data-name="colortype">
                            <a href="javascript:void(0);" data-type="link" data-name="hyperlink" target="_blank">
                                <div class="img previewImg"><?php if (!empty($row['upFileName'])): ?><img src="<?php echo $row['upFileName']; ?>"><?php endif; ?></div>
                                <div class="cover">
                                    <div class="standard">
                                        <div class="inner">
                                            <p class="logo"></p>
                                            <p class="Hashtag" data-type="text" data-name="hashtag">#HASHTAG</p>
                                        </div>
                                    </div>
                                    <div class="hover">
                                        <div class="inner">
                                            <p class="logo"></p>
                                            <p class="Hashtag" data-type="text" data-name="hashtag">#HASHTAG</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <script type="text/javascript">
                        newsAni.hoverMotion('.preview_area .grid-item');
                        mainEdit.editChangeData();
                        iCutterOwen([".preview_area .grid-item .img"]);

						//폼 처리
						function ContentSave(f, action) {
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
									url: '/main_edit/'+action+'/',
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

						hashtagReplace(); //해시태그
                    </script>

                </div>
            </div>
        </div>
	




    </div>
</section>

