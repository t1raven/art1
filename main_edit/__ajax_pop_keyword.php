<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
           <div class="inner container">
                <h1>Keyword Setting</h1>
                <button class="modal_save" onclick="modalFn.hide($('#pop_edit'));">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_keyword">
                    <div class="edit_area">
<?php
    for ($i=1; $i<=10; $i++) {
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
                                        New tag
                                    </th>
                                    <td>
                                        <input type="radio" name="display[<?php echo $i?>]" id="display[<?php echo $i?>][0]" class="chkraido" value="on" checked="">
                                        <label for="display[<?php echo $i?>][0]">On</label>
                                        <input type="radio" name="display[<?php echo $i?>]" id="display[<?php echo $i?>][1]" class="chkraido" value="off">
                                        <label for="display[<?php echo $i?>][1]">Off</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Text<br/>
                                        <span>(24bytes)</span>
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