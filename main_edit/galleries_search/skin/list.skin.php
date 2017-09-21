<?php
if (!defined('OKTOMATO')) exit;
?>

<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
            <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/pop_type/', $('#pop_edit'), 'idx=<?php echo $idx?>&type=<?php echo $type?>');">Back</button>
                <h1>Exhibitions Search</h1>
                <button class="modal_save" onclick="edit_galleries_next();">다음</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_galleries search_cont">
                    <div class="search_box">
                        <form method="get" onsubmit="mainEdit.search(this,'galleries'); return false">
                        <div class="ipt_group">
                            <input type="text" class="ipt" id="searchTxt" placeholder="갤러리와 전시회를 검색하실 수 있습니다.">
                            <span class="ipt_right addon"><button type="submit" class="btn search">Search</button></span>
                        </div>
                        </form>
                    </div>
                    <div class="result_area">

                    </div>
                    <script type="text/javascript">
                        function edit_galleries_next() {
                            var t = $('.result_area').find('.chkraido:checked');
							var exhidx = $('.result_area').find('input:radio[name=exhidx]:checked').val();
                            if(t.length >= 1){
                                mainEdit.data['type'] = 'galleries';
								mainEdit.data['exhidx'] = exhidx;
                                /*
								mainEdit.data['gallery'] =  t.closest('tr').find('.gallery').text();
                                mainEdit.data['exhibition'] = t.closest('tr').find('.exhibition').text();
                                mainEdit.data['date'] = t.closest('tr').find('.date').text();
								*/

                                //modalFn.change('/main_edit/__ajax_pop_galleries.php', $('#pop_edit'), mainEdit.data, 'next');
                                modalFn.change('/main_edit/galleries_search/?at=write', $('#pop_edit'), mainEdit.data, 'next');
                            }else{
                                alert("전시회를 선택해주세요!");
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>