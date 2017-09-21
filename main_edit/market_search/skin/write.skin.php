<?php
if (!defined('OKTOMATO')) exit;
    $size = isset($_GET['size']) ? $_GET['size'] : "w1h1";
?>
<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
            <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/market_search/', $('#pop_edit'), 'idx=<?php echo $idx?>&type=<?php echo $type?>');">Back</button>
                <h1>Market Content Setting</h1>
                <!-- <button class="modal_save" onclick="mainEdit.editSave();">저장</button> -->
                <button class="modal_save" type="button" onclick="ContentSave1();">저장</button>
                <button class="modal_close" type="button" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_market <?php if($size == "w2h2") echo 'w2' ?>">
<?php
    if($size == "w2h2") {
?>
                    <div class="edit_area">
                        <table class="tb_type_edit">
                            <colgroup>
                                <col width="30%">
                                <col width="70%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>Color Type</th>

<!-- <td>
	<input type="radio" name="snstype" id="select[0]" class="chkraido" value="facebook" <?php echo ($rowM['snsType']!='I') ? 'checked=""' : '' ;?> >
	<label for="select[0]">Facebook</label>
	<input type="radio" name="snstype" id="select[1]" class="chkraido" value="instagram" <?php echo ($rowM['snsType']=='I') ? 'checked=""' : '' ;?> >
	<label for="select[1]">Instagram</label>
</td>
 -->


                                    <td>
                                        <input type="radio" name="colortype" id="color[0]" class="chkraido" value="white" <?php echo ($row['colorType']!='B') ? 'checked=""' : '' ;?>>
                                        <label for="color[0]">White</label>
                                        <input type="radio" name="colortype" id="color[1]" class="chkraido" value="black" <?php echo ($row['colorType']=='B') ? 'checked=""' : '' ;?>>
                                        <label for="color[1]">Black</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Position Type</th>
                                    <td>
                                        <input type="radio" name="positiontype" id="position[0]" class="chkraido" value="left" <?php echo ($row['positionType']!='R') ? 'checked=""' : '' ;?>>
                                        <label for="position[0]">Left</label>
                                        <input type="radio" name="positiontype" id="position[1]" class="chkraido" value="right" <?php echo ($row['positionType']=='R') ? 'checked=""' : '' ;?>>
                                        <label for="position[1]">Right</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Image<br/><span>(634 x 634px)</span></th>
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
                            </tbody>
                        </table>
                    </div>
                    <div class="preview_area">
                        <div class="grid-item type_market <?php echo ($row['positionType']=='R')? 'right' : 'left' ; ?>" data-type="classtype" data-class="left right" data-name="positiontype">
                            <a href="#">
                                <!-- <div class="img" data-type="image" data-name="image"><img src="/upload/goods/middle/<?php echo $rowM['goods_img']?>"></div> -->
                                <div class="img previewImg"><?php if (!empty($row['upFileName'])): ?><img src="<?php echo $row['upFileName']; ?>"><?php endif; ?></div>
                                <div class="cover <?php echo ($row['colorType']=='B')? 'black' : 'white' ; ?>" data-type="classtype" data-class="white black" data-name="colortype">
                                    <div class="inner">
                                        <p class="artist" data-type="text" data-name="artist"><?php echo $rowM['artist_name']?></p>
                                        <p class="title" data-type="text" data-name="title"><?php echo $rowM['goods_name']?></p>
                                        <p class="spec"><span data-type="text" data-name="data"><?php echo $rowM['goods_make_year']?></span>, <span data-type="text" data-name="spec1"><?php echo $rowM['goods_make_type']?></span>, <span data-type="text" data-name="spec2"><?php echo LIB_LIB::getGoodsSize($rowM['goods_depth'], $rowM['goods_width'], $rowM['goods_height'])?></span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
<?php
    }else{
?>
                    <div class="edit_area">
                        <table class="tb_type_edit">
                            <colgroup>
                                <col width="30%">
                                <col width="70%">
                            </colgroup>
                            <tbody>
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
                            </tbody>
                        </table>
                    </div>
                    <div class="preview_area">
                        <div class="grid-item type_market">
                            <!-- <div class="img" data-type="image" data-name="image"><img src="/upload/goods/middle/<?php echo $rowM['goods_img']?>"></div> -->
                            <div class="img previewImg"><?php if (!empty($row['upFileName'])): ?><img src="<?php echo $row['upFileName']; ?>"><?php endif; ?></div>
                            <div class="cover">
                                <div class="standard">
                                    <div class="inner">
                                        <p class="title"><span data-type="text" data-name="artist"><?php echo $rowM['artist_name']?></span><strong data-type="text" data-name="title"><?php echo $rowM['goods_name']?></strong></p>
                                    </div>
                                </div>
                                <div class="hover">
                                    <div class="inner">
                                        <a href="#" class="more"><img src="/images/btn/btn_more3.png" alt="더보기"></a>
                                        <p class="title" data-type="text" data-name="title"><?php echo $rowM['goods_name']?></p>
                                        <p class="artist"><span data-type="text" data-name="artist"><?php echo $rowM['artist_name']?></span> / <span data-type="text" data-name="data"><?php echo $rowM['goods_make_year']?></span></p>
                                        <p class="spec" data-type="text" data-name="spec1"><?php echo $rowM['goods_make_type']?></p>
                                        <p class="spec" data-type="text" data-name="spec2"><?php echo LIB_LIB::getGoodsSize($rowM['goods_depth'], $rowM['goods_width'], $rowM['goods_height'])?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
    }
?>
                    <script type="text/javascript">
                        mainEdit.setPreview();
                        newsAni.hoverMotion('.preview_area .grid-item');
                        mainEdit.editChangeData();
                        iCutterOwen([".preview_area .grid-item"]);

						//폼 처리
						function ContentSave1() {
							try {
								var idx = "<?php echo $idx?>";
								var goodsIdx = "<?php echo $goodsIdx?>";
								var type = "<?php echo $type?>";
								var colortype = $('input:radio[name=colortype]:checked').val();
								var positiontype = $('input:radio[name=positiontype]:checked').val();

								if ( idx == "" || goodsIdx == "" ) {
									alert("선택된 작품이 없습니다.");
									return false;
								}
								//var formData = new FormData(f);
								$.ajax({
									url: '/main_edit/market_search/',
									data: {at:'update', mainContentIdx:idx, goodsIdx:goodsIdx, contentType:type, colortype:colortype, positiontype:positiontype},
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
										alert("업로드 실패");
									}
								});

							}
							catch(e) {
								//alert("ajax Error");
								return false;
							}
						}
                    </script>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>