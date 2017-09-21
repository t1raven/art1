<?php
if (!defined('OKTOMATO')) exit;
?>

<?php
    $size = isset($_GET['size']) ? $_GET['size'] : "w1h1";
?>
<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
           <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/__ajax_pop_type.php', $('#pop_edit'), 'prev');">Back</button>
                <h1>Video Content Setting</h1>
                <!-- <button class="modal_save" onclick="modalFn.hide($('#pop_edit'));">저장</button> -->
                <button class="modal_save" type="button" onclick="ContentSave(document.form_content);">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_video <?php if($size == "w2h1") echo 'w2' ?>">
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
                                    <th>Title</th>
                                    <td>
                                        <input type="text" class="ipt" name="title" id="title" value="<?php echo $row['title']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sub Title</th>
                                    <td>
                                        <input type="text" class="ipt" name="sub_title" id="sub_title" value="<?php echo $row['subTitle']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Image<br/>
<?php
	$maxWidth = 100;
    if($size == "w2h1") {
		$maxWidth = 200;
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
											<!-- <input type="file" class="file" onchange="readFileURL(this, 1);"> -->
                                            <div class="fakeimg">
                                                <div id="imgArea_1" class="imgArea <?php echo $size?>"><?php if (!empty($row['upFileName'])): ?><img src="<?php echo $row['upFileName']; ?>" style="max-width: <?php echo $maxWidth;?>px; max-height:100px" class="img"><?php endif; ?></div>
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

						</form>

                    </div>

                    <div class="preview_area">
                        <div class="grid-item type_video">
                            <div class="img previewImg" ><?php if (!empty($row['upFileName'])): ?><img src="<?php echo $row['upFileName']; ?>"  class="img"><?php endif; ?></div>
                            <div class="cover">
                                <div class="standard">
                                    <div class="inner">
                                        
										<p class="title"><?php echo (!empty($row['title']))? $row['title'] : '작가 - 제목을입력하세요' ;?></p>
                                    </div>
                                </div>
                                <div class="hover">
                                    <div class="inner">
                                        <p class="sub_title"><?php echo (!empty($row['subTitle']))? str_replace(' ', '<br/>', $row['subTitle']) : 'ARTIST<br/> REC#21' ;?></p>
                                        <!-- <a href="#" class="play"><img src="images/main/btn_play.png" alt="play"></a> -->
                                        <a href="/art1/artist_rec.php?idx=21" class="more"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        mainEdit.setPreview();
						newsAni.hoverMotion('.preview_area .grid-item');
						//mainEdit.editChangeData();
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

								if ( $("#title").val() == "") {
									alert("타이틀을 입력하셔야 합니다.");
									return false;
								}

								if ( $("#sub_title").val() == "") {
									alert("서브 타이틀을 입력하셔야 합니다.");
									return false;
								}

								if ( $("#contentLink").val() == "") {
									alert("Hyperlink 를 입력하셔야 합니다.");
									return false;
								}

								var formData = new FormData(f);
								$.ajax({
									url: '/main_edit/video/',
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