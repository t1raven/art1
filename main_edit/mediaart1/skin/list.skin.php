<?php
if (!defined('OKTOMATO')) exit;
?>

<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
            <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/__ajax_pop_type.php', $('#pop_edit'), 'prev');">Back</button>
                <h1>Media art1 Content Setting</h1>
                <!-- <button class="modal_save" onclick="mainEdit.editSave();">저장</button> -->
				<button class="modal_save" type="button" onclick="ContentSave(document.form_content, 'mediaart1');">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_mediaArt1">
                    <div class="edit_area">

					<form name="form_content" id="form_content" method="post" enctype="multipart/form-data" >
					<input type="hidden" name="at" id="at" value="update">
					<input type="hidden" name="mainContentIdx" id="mainContentIdx" value="<?php echo $row['mainContentIdx']?>">
					<input type="hidden" name="contentType" id="contentType" value="mediaart1">

                        <table class="tb_type_edit">
                            <colgroup>
                                <col width="30%">
                                <col width="70%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td>
                                        <input type="text" class="ipt" name="title" id="title" value="<?php echo $row['title']?>">
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
                                    <th>Icon</th>
                                    <td>
                                        <input type="radio" name="icontype" id="select[0]" class="chkraido" value="Premium" data-icon="/images/main_edit/ico_ma_premium.png" <?php echo (empty($row['iconType']) || $row['iconType']=='Premium') ? 'checked=""' : '' ;?>>
                                        <label for="select[0]">Premium</label>
                                        <input type="radio" name="icontype" id="select[1]" class="chkraido" data-icon="/images/main_edit/ico_ma_customizing.png" value="Customizing" <?php echo ($row['iconType']=='Customizing') ? 'checked=""' : '' ;?>>
                                        <label for="select[1]">Customizing</label>
                                        <input type="radio" name="icontype" id="select[2]" class="chkraido" data-icon="/images/main_edit/ico_ma_standard.png" value="Standard"  <?php echo ($row['iconType']=='Standard') ? 'checked=""' : '' ;?>>
                                        <label for="select[2]">Standard</label>
                                        <input type="radio" name="icontype" id="select[3]" class="chkraido" data-icon="/images/main_edit/ico_ma_press.png" value="Press"  <?php echo ($row['iconType']=='Press') ? 'checked=""' : '' ;?>>
                                        <label for="select[3]">Press</label>
                                        <input type="radio" name="icontype" id="select[4]" class="chkraido" data-icon="/images/main_edit/ico_ma_publication.png" value="Publication"  <?php echo ($row['iconType']=='Publication') ? 'checked=""' : '' ;?>>
                                        <label for="select[4]">Publication</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Spec Info</th>
                                    <td>
                                        <input type="text" class="ipt" name="specInfo" id="specInfo" value="<?php echo $row['specInfo']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>
                                        <input type="text" class="ipt" name="price" id="price" value="<?php echo $row['price']; ?>">
										<!-- <input type="text" class="ipt" name="price" id="price" value="<?php echo $row['price']; ?>"> -->
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

					</form>

					</div>
                    <div class="preview_area">
                        <div class="grid-item type_mediaart1">
                            <a href="javascript:void(0);" data-type="link" data-name="hyperlink" target="_blank">
                                <div class="img previewImg"><?php if (!empty($row['upFileName'])): ?><img src="<?php echo $row['upFileName']; ?>"><?php endif; ?></div>
                                <div class="cover">
                                    <div class="standard">
                                        <div class="inner">
                                            <p class="title" data-type="text" data-name="title"><?php echo (!empty($row['title'])) ? $row['title'] : 'Title' ; ?></p>
                                        </div>
                                    </div>
                                    <div class="hover">
                                        <div class="inner">
                                            <p class="icon" data-type="icon" data-name="icontype">
                                                <?php
                                                    $icon_img = 'ico_ma_premium.png';
                                                    if ($row['iconType'] == 'Premium') {
                                                        $icon_img = 'ico_ma_premium.png';
                                                    } else if ($row['iconType'] == 'Customizing') {
                                                        $icon_img = 'ico_ma_customizing.png';
                                                    } else if ($row['iconType'] == 'Standard') {
                                                        $icon_img = 'ico_ma_standard.png';
                                                    } else if ($row['iconType'] == 'Press') {
                                                        $icon_img = 'ico_ma_press.png';
                                                    } else if ($row['iconType'] == 'Publication') {
                                                        $icon_img = 'ico_ma_publication.png';
                                                    }
                                                ?>
                                                <img src="/images/main_edit/<?php echo $icon_img?>">
                                            </p>
                                            <p class="spec" data-type="text" data-name="specInfo"><?php echo (!empty($row['specInfo'])) ? $row['specInfo'] : 'Spec Info' ; ?></p>
                                            <p class="price">￦ <span data-type="price" data-name="price"><?php echo number_format($row['price'], 0)?></span></p>
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

								if ( $("#title").val() == "") {
									alert("title 을 입력하셔야 합니다.");
									$("#title").focus();
									return false;
								}
								if ( $("#price").val() == "") {
									alert("price 을 입력하셔야 합니다."); $("#price").focus();
									return false;
								}
								if ( $("#contentLink").val() == "") {
									alert("Hyperlink 을 입력하셔야 합니다."); $("#contentLink").focus();
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
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>