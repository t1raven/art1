
<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
            <div class="inner container">
                <h1>Link Content Setting</h1>
                <button class="modal_save" onclick="modalFn.hide($('#pop_edit'));">저장</button>
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
                                    <th>Title Color</th>
                                    <td>
                                        <input type="text" class="ipt" name="titleColor">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sub Title</th>
                                    <td>
                                        <input type="text" class="ipt" name="sub_title">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sub Title Color</th>
                                    <td>
                                        <input type="text" class="ipt" name="sub_titleColor">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hyperlink</th>
                                    <td>
                                        <input type="text" class="ipt" name="hyperlink">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Box Color</th>
                                    <td>
                                        <input type="text" class="ipt" name="boxColor">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Border Color</th>
                                    <td>
                                        <input type="text" class="ipt" name="borderColor">
                                    </td>
                                </tr>
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