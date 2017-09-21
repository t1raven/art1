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
		data:{"idx":<?php echo $qna_idx;?>},
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