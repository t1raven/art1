<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
           <div class="inner container">
                <h1>News Content Setting</h1>
                <button class="modal_save" onclick="modalFn.hide($('#pop_edit'));">저장</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_news search_cont">
                    <div class="search_box">
                        <form method="get" onsubmit="searchCont(this,'news'); return false">
                        <div class="ipt_group">
                            <input type="text" class="ipt" id="searchTxt" placeholder="뉴스를 검색하실 수 있습니다.">
                            <span class="ipt_right addon"><button type="submit" class="btn search">Search</button></span>
                        </div>
                        </form>
                    </div>
                    <div class="result_area">

                    </div>
                    <script type="text/javascript">

                    </script>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>