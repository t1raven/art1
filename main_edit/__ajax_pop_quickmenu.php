<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
           <div class="inner container">
                <h1>Quick Link Icon Setting</h1>
                <button class="modal_save" onclick="modalFn.hide($('#pop_edit'));">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_quickmenu">
                    <div class="edit_area">
<?php
    for ($i=1; $i<=8; $i++) {
?>
                        <table class="tb_type_edit">
                            <colgroup>
                                <col width="80px">
                                <col width="120px">
                                <col>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th rowspan="3" class="top slot">
                                        Slot <?php echo $i?>
                                    </th>
                                    <th class="top">
                                        Icon image<br/>
                                        <span>(26 x 26px)</span>
                                    </th>
                                    <td>
                                        <div class="imginputs">
                                            <input type="file" class="file" name="icon[<?php echo $i?>]" onchange="readFileURL(this, <?php echo $i?>);">
                                            <div class="fakeimg">
                                                <div id="imgArea_<?php echo $i?>" class="imgArea"></div>
                                            </div>
                                            <a class="btn" href="javascript:void(0);" onclick="readFileOn(this);">Browser</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Text<br/>
                                        <span>(18bytes)</span>
                                    </th>
                                    <td>
                                        <input type="text" class="ipt" name="text[<?php echo $i?>]">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hyperlink</th>
                                    <td>
                                        <input type="text" class="ipt" name="hyperlink[<?php echo $i?>]">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
<?php
    }
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>