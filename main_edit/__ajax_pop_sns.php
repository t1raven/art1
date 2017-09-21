<?php
    $size = isset($_GET['size']) ? $_GET['size'] : "w1h1";
?>
<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
            <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/__ajax_pop_type.php', $('#pop_edit'), 'prev');">Back</button>
                <h1>SNS Content Setting</h1>
                <button class="modal_save" onclick="mainEdit.editSave();">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class=" inner_cont sns <?php if($size == "w2h1") echo 'w2' ?>">
                    <div class="edit_area">
                        <table class="tb_type_edit">
                            <colgroup>
                                <col width="30%">
                                <col width="70%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>Type</th>
                                    <td>
                                        <input type="radio" name="snstype" id="select[0]" class="chkraido" value="facebook" checked="">
                                        <label for="select[0]">Facebook</label>
                                        <input type="radio" name="snstype" id="select[1]" class="chkraido" value="instagram">
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
                                            <input type="file" class="file" onchange="mainEdit.readFileURL(this, 1);" name="image">
                                            <div class="fakeimg">
                                                <div id="imgArea_1" class="imgArea <?php echo $size?>"></div>
                                            </div>
                                            <a class="btn" href="javascript:void(0);" onclick="mainEdit.readFileOn(this);">Browser</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hyperlink</th>
                                    <td>
                                        <input type="text" class="ipt" name="hyperlink">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="preview_area">
                        <div class="grid-item type_sns facebook" data-type="classtype" data-class="facebook instagram" data-name="snstype">
                            <div class="img previewImg"></div>
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
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>