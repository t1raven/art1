<?php
 $pageName = "View";
 $pageNum = "3";
 $subNum = "8";
 $thirdNum = "0";
?>
<? include "../../inc/link.php"; ?>
<? include "../../inc/top.php"; ?>
<? include "../../inc/header.php"; ?>
<? include "../../inc/side.php"; ?>

 <section id="container">
  <div class="container_inner">
    <? include "../../inc/path.php"; ?>
    <? include "../../inc/datepicker_setting.php"; ?>
     <article class="content">
      <section class="section_box">
        <h1 class="title1">Registration No.<?php echo $Advice->attr['advice_idx']; ?></h1>
        <div class="lst_table3">

          <table summary="렌탈관리(렌탈관련 내용)">
		  <form name="memoForm" method="post" action="?at=update" onsubmit="return false;">
			<input type="hidden" name="mode" value="edit">
			<input type="hidden" name="idx" value="<?php echo $Advice->attr['advice_idx'];?>">
            <caption>렌탈관리</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">이름</th>
                <td><?php echo $Advice->attr['advice_user_name']; ?></td>
              </tr>
<?php
if ($Advice->attr['request_type'] =='rental'){
?>
               <tr>
                 <th scope="row">기관명</th>
                 <td ><?php echo $Advice->attr['advice_user_company']; ?></td>
               </tr>
               <tr>
                 <th scope="row">공간대상</th>
                 <td ><?php echo nl2br($Advice->attr['setting_room']); ?></td>
               </tr>
<?php
}
?>
               <tr>
                <th scope="row">등록일</th>
                <td ><?php echo $Advice->attr['create_date']; ?></td>
              </tr>
              <tr>
                <th scope="row">요청작품명</th>
                <!-- td ><span class="font_blue_color"><a href="<?php echo $Advice->attr['user_view_url']; ?>" target="_blank"><?php echo $Advice->attr['goods_name']; ?></a></span> (<?php echo $Advice->attr['artist_name']; ?>)<br>
                </td -->
				<td><span class="font_blue_color">
<?php 
if (!empty($Advice->attr['goods_idx'])){
?>
				<a href="/marketPlace/artwork_view.php?goods=<?php echo $Advice->attr['goods_idx']; ?>" target="_blank"><?php echo $Advice->attr['goods_name']; ?></a></span> (<?php echo $Advice->attr['artist_name']; ?>)<br>
<?
}
?>
				</td>
              </tr>
              <tr>
                <th scope="row">답변 요청방법</th>
                <td ><?php echo $Advice->attr['how_to_request']; ?></td>
              </tr>
              <tr>
                <th scope="row">전화번호</th>
                <td ><?php echo $Advice->attr['advice_user_tel']; ?></td>
              </tr>
              <tr>
                <th scope="row">이메일</th>
                <td ><?php echo $Advice->attr['advice_user_email']; ?></td>
              </tr>
              <tr>
                <th scope="row">상담내용</th>
                <td ><?php echo nl2br($Advice->attr['advice_user_content']); ?></td>
              </tr>
              <tr>
                <th scope="row">답변입력</th>
                <td >
					<div class="textarea">
                      <textarea name="memo" rows="5" cols="60" ><?php echo $Advice->attr['advice_amdin_memo']; ?></textarea>
                    </div>
                </td>
              </tr>
              <tr>
                <th scope="row">상태</th>
                <td >
					<div class="lst_check radio">
                      <span>
                        <label for="frame1">답변요청</label>
                        <input type="radio" name="frame" id="frame1" <?php echo $request_status_on;?>>
                      </span>
                      <span>
                        <label for="frame2">답변완료</label>
                        <input type="radio" name="frame" id="frame2" <?php echo $request_status_off;?>>
                      </span>
                    </div>
                </td>
              </tr>
            </tbody>
		  </form>
          </table>

          <div class="bot_align">
            <div class="btn_right">
              <button id="btnList"  class="btn_pack1 gray ov-b small rato">List</button>
              <button id="btnSave"  class="btn_pack1 ov-b small rato">Save</button>
            </div>
        </div>
        </div><!-- //lst_table3 -->
      </section>
      <!-- //lst_table2 -->
     </article>
  </div>
 </section>

 <!-- //container -->
<? include "../../inc/bot.php"; ?>


<script type="text/javascript">
   $(function(){
      LabelHidden(".inp_txt.lh");   
      bbsCheckbox();   
      checkListMotion();
    })

function chkForm(f){
	if (f.memo.value == "") {
		alert("답변을 입력하세요.");
		f.memo.focus();
		return false;
	}
	f.submit();
	/*
	if(chkDefaultForm(f) ){
		 alert("dasdf");
		//f.target = "action_ifrm";
		f.submit();
	}
	*/
}

$(function(){
	$("#btnSave").click(function(){
		 chkForm(document.memoForm);
	});

	$("#btnList").click(function(){
		location.href='?at=list&page=<?=$page.$Params?>';
	});
});
</script>
<script type="text/javascript">
function articleDelete()
{
	if(!confirm('정보를 삭제하시겠습니까? 삭제된 데이터는 복구할 수 없습니다.')){
		return false;
	}

	$.ajax({
		type:"POST",
		url:"/oktomato/consult/__delete.php",
		dataType:"JSON",
		data:{"idx":<?php echo $advice_idx;?>},
		success: function(data) {
			if (data.cnt > 0) {
				alert("삭제되었습니다.");
				location.href="/oktomato/consult/join-list.php?at=list";
				//location.reload();
			}
			else{
				alert("삭제할 수 없습니다.");
			}
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});

}
</script>