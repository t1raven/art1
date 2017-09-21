<?php
    $size = isset($_GET['size']) ? $_GET['size'] : "w1h1";
?>
<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
           <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/__ajax_pop_type.php', $('#pop_edit'), 'prev');">Back</button>
                <h1>Video Content Setting</h1>
                <button class="modal_save" onclick="modalFn.hide($('#pop_edit'));">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_video">
                    <div class="edit_area">
                        <table class="tb_type_edit">
                            <colgroup>
                                <col width="30%">
                                <col width="70%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td>
                                        <input type="text" class="ipt" name="title">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sub Title</th>
                                    <td>
                                        <input type="text" class="ipt" name="sub_title">
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
                                            <input type="file" class="file" onchange="readFileURL(this, 1);">
                                            <div class="fakeimg">
                                                <div id="imgArea_1" class="imgArea"></div>
                                            </div>
                                            <a class="btn" href="javascript:void(0);" onclick="readFileOn(this);">Browser</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hyperlink</th>
                                    <td>
                                        <input type="text" class="ipt" name="hyperlink">
                                    </td>
                                </tr>
<?php
    if($size == "w2h1" || $size == "w2h2") {
?>
                                <tr>
                                    <th>Color Type</th>
                                    <td>
                                        <input type="radio" name="colorType" id="color[0]" class="chkraido" value="white" checked="">
                                        <label for="color[0]">White</label>
                                        <input type="radio" name="colorType" id="color[1]" class="chkraido" value="black">
                                        <label for="color[1]">Black</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Position Type</th>
                                    <td>
                                        <input type="radio" name="positionType" id="position[0]" class="chkraido" value="left" checked="">
                                        <label for="position[0]">Left</label>
                                        <input type="radio" name="positionType" id="position[1]" class="chkraido" value="right">
                                        <label for="position[1]">Right</label>
                                    </td>
                                </tr>
<?php
    }
?>
                            </tbody>
                        </table>
                    </div>
                    <div class="preview_area">
                        Preview
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>