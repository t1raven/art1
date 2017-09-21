
<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
            <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/__ajax_pop_type.php', $('#pop_edit'), 'prev');">Back</button>
                <h1>Market Content Setting</h1>
                <button class="modal_save" onclick="modalFn.hide($('#pop_edit'));">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_market">
                    <div class="search_box">
                        <form method="get">
                            <div class="ipt_group">
                                <input type="text" class="ipt" id="" placeholder="'art1'의 작가와 작품을 검색하실 수 있습니다.">
                                <span class="ipt_right addon"><button type="submit" class="btn search">Search</button></span>
                            </div>
                        </form>
                    </div>
                    <div class="result_area">
                        <table class="tb_type_edit">
                            <colgroup>
                                <col width="30%">
                                <col>
                                <col>
                                <col>
                                <col>
                                <col width="5%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>작품명</th>
                                    <th>작가</th>
                                    <th>연도</th>
                                    <th>재료</th>
                                    <th>사이즈</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>조작된 나무</td>
                                    <td>홍길동</td>
                                    <td>2017</td>
                                    <td>paper on canvas</td>
                                    <td>77.0cm x 77.0cm</td>
                                    <td>
                                        <input type="radio" name="select" id="select[0]" class="chkraido">
                                        <label for="select[0]"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>자세</td>
                                    <td>고길동</td>
                                    <td>2017</td>
                                    <td>paper on canvas</td>
                                    <td>77.0cm x 77.0cm</td>
                                    <td>
                                        <input type="radio" name="select" id="select[1]" class="chkraido">
                                        <label for="select[1]"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Him self(left)</td>
                                    <td>서길동</td>
                                    <td>2016</td>
                                    <td>paper on canvas</td>
                                    <td>77.0cm x 77.0cm</td>
                                    <td>
                                        <input type="radio" name="select" id="select[2]" class="chkraido">
                                        <label for="select[2]"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>POTENTIAL</td>
                                    <td>남길동</td>
                                    <td>2015</td>
                                    <td>paper on canvas</td>
                                    <td>77.0cm x 77.0cm</td>
                                    <td>
                                        <input type="radio" name="select" id="select[3]" class="chkraido">
                                        <label for="select[3]"></label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <ul class="pagination">
                            <li class="start"><a href="#">Start</a></li>
                            <li class="prev"><a href="#">prev 5p</a></li>
                            <li class="active"><span>1</span></li>
                            <li class=""><a href="#">2</a></li>
                            <li class=""><a href="#">3</a></li>
                            <li class=""><a href="#">4</a></li>
                            <li class=""><a href="#">5</a></li>
                            <li class="next"><a href="#">next 5</a></li>
                            <li class="end"><a href="#">End</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>