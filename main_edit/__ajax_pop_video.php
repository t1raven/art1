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
                <div class="inner_cont edit_video <?php if($size == "w2h1") echo 'w2' ?>">
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
                                                <div id="imgArea_1" class="imgArea <?php echo $size?>"></div>
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
                            </tbody>
                        </table>
                    </div>
                    <div class="preview_area">
                        <div class="grid-item type_video">
                            <div class="img"></div>
                            <div class="cover">
                                <div class="standard">
                                    <div class="inner">
                                        <p class="title">이민혜 - 자꾸 보고싶은 연인들의 감정</p>
                                    </div>
                                </div>
                                <div class="hover">
                                    <div class="inner">
                                        <p class="sub_title">ARTIST<br/> REC#21</p>
                                        <a href="#" class="play"><img src="images/main/btn_play.png" alt="play"></a>
                                        <a href="/art1/artist_rec.php?idx=21" class="more"><img src="images/main/btn_share.png" alt="자세히 보기"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        newsAni.hoverMotion('.preview_area .grid-item');
                        iCutterOwen([".preview_area .grid-item .img"]);
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>