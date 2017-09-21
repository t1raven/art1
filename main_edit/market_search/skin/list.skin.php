<?php
if (!defined('OKTOMATO')) exit;
?>

<section id="pop_edit" class="modal_type1">
    <div class="inner">
        <div class="modal_header">
            <div class="inner container back">
                <button class="modal_back" onclick="modalFn.change('/main_edit/pop_type/', $('#pop_edit'), 'idx=<?php echo $idx?>&type=<?php echo $type?>&size=<?php echo $size?>');">Back</button>
                <h1>Market Content Setting</h1>
                <button class="modal_save" onclick="edit_market_next();">다음</button>
                <button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
            </div>
        </div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont edit_market search_cont">
                    <div class="search_box">
                        <form method="get" onsubmit="mainEdit.search(this,'market'); return false">
                        <div class="ipt_group">
                            <input type="text" class="ipt" id="searchTxt" placeholder="'art1'의 작가와 작품을 검색하실 수 있습니다.">
                            <span class="ipt_right addon"><button type="submit" class="btn search">Search</button></span>
                        </div>
                        </form>
                    </div>
                    <div class="result_area">

                    </div>
                    <script type="text/javascript">
                        function edit_market_next() {
                            var t = $('.result_area').find('.chkraido:checked');
							var goods_idx = $('.result_area').find('input:radio[name=artworkid]:checked').val();
                            if(t.length >= 1){
                                mainEdit.data.type = 'market';
								mainEdit.data.goods_idx = goods_idx;
                                /*
								mainEdit.data['title'] =  t.closest('tr').find('.title').text();
                                mainEdit.data['artist'] = t.closest('tr').find('.artist').text();
                                mainEdit.data['data'] = t.closest('tr').find('.data').text();
                                mainEdit.data['spec1'] = t.closest('tr').find('.spec1').text();
                                mainEdit.data['spec2'] = t.closest('tr').find('.spec2').text();
								*/
                                //modalFn.change('/main_edit/__ajax_pop_market.php', $('#pop_edit'), mainEdit.data, 'next');
                                //modalFn.change('/main_edit/market_search/?at=write&idx=<?php echo $idx?>&goods_idx='+goods_idx, $('#pop_edit'), mainEdit.data, 'next');
                                modalFn.change('/main_edit/market_search/?at=write', $('#pop_edit'), mainEdit.data, 'next');
                            }else{
                                alert("작품을 선택해주세요!");
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>