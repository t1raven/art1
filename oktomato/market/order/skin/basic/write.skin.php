<?php
if (!defined('OKTOMATO')) exit;

$pageName = 'View';
$pageNum = '3';
$subNum = '10';
$thirdNum = '0';

include('../../inc/link.php');
include('../../inc/top.php');
include('../../inc/header.php');
include('../../inc/side.php');
?>
<section id="container">
   <div class="container_inner">
    <?php include('../../inc/path.php'); ?>
    <?php include('../../inc/datepicker_setting.php'); ?>
   <article class="content">
      <form name="writeFrm" method="post" onsubmit="return false;">
      <input type="hidden" name="at" value="update">
      <input type="hidden" name="order" id="order" value="<?php echo $Order->attr['ord_nbr'];?>">

      <section class="section_box">
         <div class="lft_Box">
            <h1 class="title1">주문자 정보</h1>
            <div class="lst_table3">
               <table summary="주문자정보">
                  <caption>주문자정보</caption>
                  <colgroup>
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row">주문자명</th>
                        <td><?php echo $Order->attr['ord_name'];?></td>
                     </tr>
                     <tr>
                        <th scope="row">전화번호</th>
                        <td><?php echo $Order->attr['ord_tel'];?></td>
                     </tr>
                     <tr>
                        <th scope="row">이메일</th>
                        <td><?php echo $Order->attr['ord_email'];?></td>
                     </tr>
                     <tr>
                        <th scope="row">주문자주소</th>
                        <td>&nbsp;</td>
                     </tr>
                  </tbody>
               </table>
               <!-- //lst_table3 -->
            </div>
        </div>
        <div class="rgh_Box">
           <h1 class="title1">배송자 정보</h1>
           <div class="lst_table3">
               <table summary="배송자 정보">
                  <caption>배송자 정보</caption>
                  <colgroup>
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row">받는분</th>
                        <td><?php echo $Order->attr['rec_name'];?></td>
                     </tr>
                     <tr>
                        <th scope="row">전화번호</th>
                        <td><?php echo $Order->attr['rec_tel'];?></td>
                     </tr>
                     <tr>
                        <th scope="row">이메일</th>
                        <td><?php echo $Order->attr['rec_email'];?></td>
                     </tr>
                     <tr>
                        <th scope="row">받는분주소</th>
                        <td><?php echo $Order->attr['rec_addr_1'];?> <?php echo $Order->attr['rec_addr_2'];?></td>
                     </tr>
                  </tbody>
               </table>
               <!-- //lst_table3 -->
            </div>
        </div>
      </section>
      <section class="section_box">
        <h1 class="title1">Order Detail</h1>
        <div class="lst_table3">
           <table summary="주문정보">
              <caption>주문 정보</caption>
              <colgroup>
                 <col class="th1">
                 <col>
              </colgroup>
              <tbody>
                 <tr>
                    <th scope="row">주문번호</th>
                    <td><?php echo $Order->attr['ord_nbr'];?></td>
                 </tr>
                 <tr>
                    <th scope="row">주문상품</th>
                    <td >
                        <ul>
                        <?php if (is_array($orderInfo) && count($orderInfo)): ?>
                            <?php foreach($orderInfo as $row): ?>
                            <li>
								<a href="javascript:;" class="fc_blue td-u"><?php echo $row['goods_name'];?></a>(<?php echo $row['artist_name'];?>)
								<?php if (!empty($row['limited_nbr']) && !empty($row['limited_nbr_tmp'])) {echo '고유번호:'.$row['limited_nbr_tmp'];} ?> \<?php echo number_format($row['settlement_price']);?>
							</li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                            <!--li><a href="#" class="fc_blue td-u">어둠의 다크</a>(홍길동) \2,300,000</li-->
                        </ul>
                    </td>
                 </tr>
                 <tr>
                    <th scope="row">주문일시</th>
                    <td><?php echo $Order->attr['create_date'];?></td>
                 </tr>
                 <tr>
                    <th scope="row">결제 방법</th>
                    <td><?php echo $Order->attr['payment_name'];?></td>
                 </tr>
                  <tr>
                    <th scope="row">결제금액정보</th>
                    <td><?php echo number_format($Order->attr['amount']);?>원</td>
                 </tr>
                  <tr>
                    <th scope="row">현 주문 상태</th>
                    <td >
                                <span class="tit"><button onclick="tranStateChange('1', '주문접수')">주문접수</button> <span id="trana_state_1"><?php echo $aCreateDate[1];?></span></span>
                                <span class="tit"><button onclick="tranStateChange('2', '입금완료')">입금완료</button> <span id="trana_state_2"><?php echo $aCreateDate[2];?></span></span>
                                <span class="tit"><button onclick="tranStateChange('3', '상품준비')">상품준비</button> <span id="trana_state_3"><?php echo $aCreateDate[3];?></span></span>
                                <span class="tit"><button onclick="tranStateChange('4', '배송 중')">배송 중</button> <span id="trana_state_4"><?php echo $aCreateDate[4];?></span></span>
                                <span class="tit"><button onclick="tranStateChange('5', '상품준비')">배송완료<button> <span id="trana_state_5"><?php echo $aCreateDate[5];?></span></span>
                        <!--div class="order_stat_Box">
                            <ul>
                                <li><span class="tit"><button onclick="tranStateChange(1, '주문접수')">주문접수</button></span> (2014.10.29 10:13)</li>
                                <li><span class="tit"><button onclick="tranStateChange(2, '입금완료')">입금완료</button></span> (2014.10.29 10:13)</li>
                                <li><span class="tit"><button onclick="tranStateChange(3, '상품준비')">상품준비</button></span> (2014.10.29 10:13)</li>
                                <li><span class="tit"><button onclick="tranStateChange(4, '배송 중')">배송 중</button></span> (2014.10.29 10:13)</li>
                                <li class="last"><span class="tit"><button onclick="tranStateChange(3, '상품준비')">배송완료<button></span> (2014.10.29 10:13)</li>
                            </ul>
                            <!--div class="lnvoice">송장번호 :
                                <span class="col_td auto">
                                <label for="com" class="pos">배송업체명</label>
                                <input name="delivery_company" type="text" class="inp_txt lh w90" id="com" value="<?php echo $Order->attr['delivery_company'];?>">
                                </span>
                                <span class="col_td auto">
                                <label for="num" class="pos">송장번호</label>
                                <input name="delivery_nbr" type="text" class="inp_txt lh w250" id="num" value="<?php echo $Order->attr['delivery_nbr'];?>">
                                </span>
                            </div-->
                        </div>
                    </td>
                 </tr>
                  <tr>
                    <th scope="row">배송정보</th>
                    <td>
                        <span class="col_td auto">
                        <label for="delivery_company" class="pos">배송업체명</label>
                        <input name="delivery_company" type="text" class="inp_txt lh w90 {label:'배송업체명',required:true}" id="delivery_company" value="<?php echo $Order->attr['delivery_company'];?>">
                        </span>
                        <span class="col_td auto">
                        <label for="delivery_nbr" class="pos">송장번호</label>
                        <input name="delivery_nbr" type="text" class="inp_txt lh w250 {label:'송장번호',required:true}" id="delivery_nbr" value="<?php echo $Order->attr['delivery_nbr'];?>">
                    </td>
                 </tr>
              </tbody>
           </table>
           <!-- //lst_table3 -->
        </div>
        <div class="bot_align">
           <div class="btn_right">
              <button type="button" class="btn_pack1 gray ov-b small rato" id="btnList">List</button>
              <button type="button" class="btn_pack1 ov-b small rato" id="btnSave">Save</button>
           </div>
        </div>
      </section>
      </form>
      <!-- //lst_table2 -->
   </article>
   </div> <!-- //container_inner -->
</section>
<!-- //container -->
<?php echo ACTION_IFRAME;?>

<script>
$(function(){
	//레이어 팝업
	$(".layerOpen").click(function(){
		$(".layer_popup1").css("display","none");
		var id = $(this).attr("href");
		var x = $(this).offset().left;
		var y = $(this).offset().top-10;
		layerBoxOffset(id,x,y);
		return false;
	});

	// and / or 스위치 함수
	$("button.btn_switch").click(function(){
		var text = $(this).text();
		$(this).text((text == "AND") ? "OR":"AND");
		//$("#anor").val($(this).text());
	});

	LabelHidden(".inp_txt.lh");
	bbsCheckbox();
	checkListMotion();
	btnHover(".btnOvr");

	$("#btnList").click(function() {
		location.href="index.php";
	});
	$("#btnSave").click(function() {
		chkForm(document.writeFrm);
	});

})

function chkForm(f) {
	if (chkDefaultForm(f)) {
		f.target = "action_ifrm";
		f.submit();
	}
}

function tranStateChange(tran_state, tran_state_name){
	var tmp_msg = '';
	var prefix_msg = '<?php echo $msg; ?>';

	if (tran_state == 4){ //상품배송시
		/*
		if ($("#old_delivery_company").val() == "" || $("#old_delivery_nbr").val() == "")
		{
			tmp_msg = "배송업체와 송장번호가 입력되지 않으면 상품배송SMS가 발송되지 않습니다.\n"
		}
		*/
	}
	else if (tran_state == 5){ //배송완료시
		//tmp_msg += '최소 배송완료 처리시에만 적립금이 지급됩니다.\n이후 적립금은 지급되지 않으니 해당 주문회원상세에서 직접 적립금을 지급하셔야 합니다.\n';
	}

	var msg = confirm(tmp_msg + prefix_msg + tran_state_name + " 상태로 변경하시겠습니까?");

	if (msg){
		//$("#action_ifrm").attr("src", "update.php?ord_nbr=<?php echo $ord_nbr;?>&tran_state=" + tran_state);
		$.ajax({
			type:"POST",
			url:"index.php",
			dataType:"JSON",
			data:{"at":"update", "order":"<?php echo $ord_nbr;?>", "tran_state":tran_state},
			success:function(data) {
				if (data.cnt > 0) {
					alert("변경되었습니다.");
					$("#trana_state_"+tran_state).text(data.date);
				}
				else {
					alert("실패하였습니다. 시스템 관리자에게 문의하여 주세요.");
				}
			},
			error:function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			}
		});
	}
}
</script>
<?php include('../../inc/bot.php'); ?>