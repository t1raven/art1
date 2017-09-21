<?php
    $size = isset($_GET['size']) ? $_GET['size'] : "w1h1";
?>
<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
            <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/__ajax_pop_market_search.php', $('#pop_edit'), 'prev');">Back</button>
                <h1>Market Content Setting</h1>
                <button class="modal_save" onclick="mainEdit.editSave();">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
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
                                    <td>
                                        <input type="radio" name="colortype" id="color[0]" class="chkraido" value="white" checked="">
                                        <label for="color[0]">White</label>
                                        <input type="radio" name="colortype" id="color[1]" class="chkraido" value="black">
                                        <label for="color[1]">Black</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Position Type</th>
                                    <td>
                                        <input type="radio" name="positiontype" id="position[0]" class="chkraido" value="left" checked="">
                                        <label for="position[0]">Left</label>
                                        <input type="radio" name="positiontype" id="position[1]" class="chkraido" value="right">
                                        <label for="position[1]">Right</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="preview_area">
                        <div class="grid-item type_market left" data-type="classtype" data-class="left right" data-name="positiontype">
                            <a href="#">
                                <div class="img" data-type="image" data-name="image"><img src="/images/main/main_temp_img2.jpg"></div>
                                <div class="cover" data-type="classtype" data-class="white black" data-name="colortype">
                                    <div class="inner">
                                        <p class="artist" data-type="text" data-name="artist">ARTIST</p>
                                        <p class="title" data-type="text" data-name="title">TITLE</p>
                                        <p class="spec"><span data-type="text" data-name="data">0000</span>, <span data-type="text" data-name="spec1">SPEC MAERIAL</span>, <span data-type="text" data-name="spec2">SPEC SIZE</span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
<?php
    }else{
?>
                    <div class="preview_area">
                        <div class="grid-item type_market">
                            <div class="img" data-type="image" data-name="image"><img src="/images/main/main_temp_img1.jpg"></div>
                            <div class="cover">
                                <div class="standard">
                                    <div class="inner">
                                        <p class="title"><span data-type="text" data-name="artist">ARTIST</span><strong data-type="text" data-name="title">TITLE</strong></p>
                                    </div>
                                </div>
                                <div class="hover">
                                    <div class="inner">
                                        <a href="#" class="more"><img src="/images/btn/btn_more3.png" alt="더보기"></a>
                                        <p class="title" data-type="text" data-name="title">TITLE</p>
                                        <p class="artist"><span data-type="text" data-name="artist">ARTIST</span> / <span data-type="text" data-name="data">0000</span></p>
                                        <p class="spec" data-type="text" data-name="spec1">SPEC MAERIAL</p>
                                        <p class="spec" data-type="text" data-name="spec2">SPEC SIZE</p>
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
                        iCutterOwen([".preview_area .grid-item .img"]);
                    </script>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>