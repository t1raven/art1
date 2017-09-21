<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
           <div class="inner container">
                <h1>AD Banner Setting</h1>
                <button class="modal_save" onclick="mainEdit.editSave();">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_banner">
                    <div class="edit_area">
                        <table class="tb_type_edit">
                            <colgroup>
                                <col width="120px">
                                <col>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>
                                        Image(pc)<br/>
                                        <span>(1600 x 168px)</span>
                                    </th>
                                    <td>
                                        <div class="imginputs">
                                            <input type="file" class="file" name="imgPc" onchange="mainEdit.readFileURL(this, 1);">
                                            <div class="fakeimg">
                                                <div id="imgArea_1" class="imgArea"></div>
                                            </div>
                                            <a class="btn" href="javascript:void(0);" onclick="mainEdit.readFileOn(this);">Browser</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Image(mobile)<br/>
                                        <span>(1019 x 270px)</span>
                                    </th>
                                    <td>
                                        <div class="imginputs">
                                            <input type="file" class="file" name="imgMobile" onchange="mainEdit.readFileURL(this, 2);">
                                            <div class="fakeimg">
                                                <div id="imgArea_2" class="imgArea"></div>
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
                                <tr>
                                    <th>Display</th>
                                    <td>
                                        <input type="radio" name="display" id="display[0]" class="chkraido" value="on" checked="">
                                        <label for="display[0]">On</label>
                                        <input type="radio" name="display" id="display[1]" class="chkraido" value="off">
                                        <label for="display[1]">Off</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>