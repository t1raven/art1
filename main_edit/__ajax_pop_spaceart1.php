
<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
            <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/__ajax_pop_type.php', $('#pop_edit'), 'prev');">Back</button>
                <h1>Space art1 Content Setting</h1>
                <button class="modal_save" onclick="mainEdit.editSave();">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_spaceArt1">
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
                                        <input type="radio" name="colortype" id="select[0]" class="chkraido" value="white" checked="">
                                        <label for="select[0]">White</label>
                                        <input type="radio" name="colortype" id="select[1]" class="chkraido" value="black">
                                        <label for="select[1]">Black</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Image<br/><span>(312 x 312px)</span></th>
                                    <td>
                                        <div class="imginputs">
                                            <input type="file" class="file" onchange="mainEdit.readFileURL(this, 1);" name="image">
                                            <div class="fakeimg">
                                                <div id="imgArea_1" class="imgArea"></div>
                                            </div>
                                            <a class="btn" href="javascript:void(0);" onclick="mainEdit.readFileOn(this);">Browser</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hashtag</th>
                                    <td>
                                        <input type="text" class="ipt" name="hashtag">
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
                        <div class="grid-item type_spaceart1 white" data-type="classtype" data-class="white black" data-name="colortype">
                            <a href="javascript:void(0);" data-type="link" data-name="hyperlink" target="_blank">
                                <div class="img previewImg"></div>
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
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>