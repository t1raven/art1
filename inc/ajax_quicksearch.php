<?php
require_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
?>
<form name="ssFrm" method="post" action="/search/index.php">
<section id="headerArea" class="quickSearchBox">
   <div class="inner">
   <button type="button" class="close" onclick="fixedPopupClose();"><img src="/images/btn/btn_close2.gif" alt="닫기"></button>
      <div class="smartBox">
		<h1 class="smart_tit">스마트 검색</h1>
         <div class="smartTableBox">
			<div class="lst_table3 smart">
			   <table summary="Smart Search">
				  <caption>Smart Search</caption>
				  <colgroup>
					 <col class="th1">
					 <col>
				  </colgroup>
				  <tbody>
					 <tr>
						<th scope="row">Medium </th>
						<td>
						   <div class="lst_check radio">
							  <?php $j = 0; $i = 1; foreach($aMedium as $val): ?>
							  <span>
							  <label for="tMedium<?php echo $i;?>"><?php echo $val;?></label>
							  <input type="radio" name="medium" id="tMedium<?php echo $i;?>" value="<?php echo $j;?>">
							  </span>
							  <?php ++$j; ++$i; endforeach; ?>
						   </div>
						</td>
					 </tr>
					 <tr>
						<th scope="row">Subject </th>
						<td>
						   <div class="lst_check radio">
						      <?php $j = 0; $i = 1; foreach($aSubject as $val): ?>
							  <span>
							  <label for="aSubject<?php echo $i;?>"><?php echo $val;?></label>
							  <input type="radio" name="subject" id="aSubject<?php echo $i;?>" value="<?php echo $j;?>">
							  </span>
							  <?php ++$j; ++$i; endforeach; ?>
						   </div>
						</td>
					 </tr>
					 <tr>
						<th scope="row">Size </th>
						<td>
						   <div class="lst_check radio">
						      <?php $j = 0; $i = 1; foreach($aSize as $val): ?>
							  <span>
							  <label for="aSize<?php echo $i;?>"><?php echo $val;?></label>
							  <input type="radio" name="size" id="aSize<?php echo $i;?>" value="<?php echo $j;?>">
							  </span>
							  <?php ++$j; ++$i; endforeach; ?>
						   </div>
						</td>
					 </tr>
					 <tr>
						<th scope="row">Color </th>
						<td>
						   <div class="lst_check radio colorBar">
						      <?php $j = 0; $i = 1; foreach($aColor as $val): ?>
							  <span class="aColor<?php echo $i;?>">
							  <label for="aColor<?php echo $i;?>"><?php echo $val;?></label>
							  <input type="radio" name="color" id="aColor<?php echo $i;?>" value="<?php echo $j;?>">
							  </span>
							  <?php ++$j; ++$i; endforeach; ?>
						   </div>
						</td>
					 </tr>
					 <tr>
						<th scope="row">Price </th>
						<td>
						   <div class="lst_check radio">
						      <?php $j = 0; $i = 1; foreach($aSize as $val): ?>
							  <span>
							  <label for="aSize<?php echo $i;?>"><?php echo $val;?></label>
							  <input type="radio" name="size" id="aSize<?php echo $i;?>" value="<?php echo $j;?>">
							  </span>
							  <?php ++$j; ++$i; endforeach; ?>
						   </div>
						</td>
					 </tr>
					 <!-- <tr class="p10">
					 						<th scope="row"></th>
					 						<td class="t-c">
					 							<div class="lst_check">
					 							  <span class="pink">
					 								  <label for="rental">렌탈가능</label>
					 								  <input type="checkbox" name="rental_state" id="rental" value="Y">
					 							  </span>
					 							  <span class="pink">
					 								  <label for="sell">판매중</label>
					 								  <input type="checkbox" name="sold_state" id="sell" value="N">
					 							  </span>
					 							</div>
					 						</td>
					 </tr> -->
				  </tbody>
			   </table>
			</div>
			<div class="arr"><img src="/images/bg/img_smart_arr.gif" alt="" /></div>
         </div><!-- smartTableBox -->
			<div class="searchBar">
				<div class="inner">
					<p>
						<span class="check_listbox box">
							<label for="chkartist">작가명</label>
							<input type="checkbox" id="chkartist" name="chkartist" value="Y" checked="checked">
						</span>
						<span class="check_listbox box last">
							<label for="chkartwork">작품명</label>
							<input type="checkbox" id="chkartwork" name="chkartwork" value="Y">
						</span>
						<span class="col_td auto">
							<label for="kword" class="pos">검색어를 입력하세요!</label>
							<input name="kword" type="text" class="inp_txt lh" id="kword" title="검색어를 입력하세요!">
						</span>
						<button type="button" class="btn_search">상세검색</button>
					</p>
				</div>
			</div>
			<div class="search_btn">
				<a href="javascript:;" onclick="getSearch();">검색하기</a>
			</div>
      </div>
   </div>
</section>
</form>
<script>
function getSearch() {
	if ($("#kword").val() != "") {
		if (!$("input:checkbox[name='chkartist']").is(":checked") && !$("input:checkbox[name='chkartwork']").is(":checked")) {
			alert("왼쪽의 작가명이나 작품명을 체크하여 주세요.");
			return false;
		}
	}

	if ($("input:checkbox[name='chkartist']").is(":checked") || $("input:checkbox[name='chkartwork']").is(":checked")) {
		if ($("#kword").val() == "") {
			alert("검색어를 입력하세요!");
			$("#kword").focus();
			return false;
		}
	}

	document.ssFrm.submit();
}
</script>