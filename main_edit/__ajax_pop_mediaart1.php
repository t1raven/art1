
<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
            <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/__ajax_pop_type.php', $('#pop_edit'), 'prev');">Back</button>
                <h1>Media art1 Content Setting</h1>
                <button class="modal_save" onclick="mainEdit.editSave();">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_mediaArt1">
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
                                    <th>Icon</th>
                                    <td>
                                        <input type="radio" name="icontype" id="select[0]" class="chkraido" value="/images/main_edit/ico_ma_premium.png" checked="">
                                        <label for="select[0]">Premium</label>
                                        <input type="radio" name="icontype" id="select[1]" class="chkraido" value="/images/main_edit/ico_ma_basic.png">
                                        <label for="select[1]">Basic</label>
                                        <input type="radio" name="icontype" id="select[2]" class="chkraido" value="/images/main_edit/ico_ma_standard.png">
                                        <label for="select[2]">Standard</label>
                                        <input type="radio" name="icontype" id="select[3]" class="chkraido" value="/images/main_edit/ico_ma_press.png">
                                        <label for="select[3]">Press</label>
                                        <input type="radio" name="icontype" id="select[4]" class="chkraido" value="/images/main_edit/ico_ma_publication.png">
                                        <label for="select[4]">Publication</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Spec Info</th>
                                    <td>
                                        <input type="text" class="ipt" name="spec">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>
                                        <input type="text" class="ipt" name="price">
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
                        <div class="grid-item type_mediaart1">
                            <a href="javascript:void(0);" data-type="link" data-name="hyperlink" target="_blank">
                                <div class="img previewImg"></div>
                                <div class="cover">
                                    <div class="standard">
                                        <div class="inner">
                                            <p class="title" data-type="text" data-name="title">Title</p>
                                        </div>
                                    </div>
                                    <div class="hover">
                                        <div class="inner">
                                            <p class="icon" data-type="image" data-name="icontype"><img src="/images/main_edit/ico_ma_premium.png"></p>
                                            <p class="spec" data-type="text" data-name="spec">Spec Info</p>
                                            <p class="price">￦ <span data-type="price" data-name="price">0</span></p>
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