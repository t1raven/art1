            </tbody>
			</form>
          </table>
        </div> <!-- 검색결과리스트_게시판_끝 -->

        <!-- 검색결과리스트_페이징처리_시작 -->
        <div class="bot_align">
          <?=$pageUtil->attr[pageHtml]?>
		  <!-- 검색결과리스트_페이징처리_끝 -->

          <div class="btn_right">
            <!--button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Register</button-->
           <?php if ($total_cnt > 0):?><button type="button" onclick="deleteAll();" class="btn_pack1 ov-b gray small rato">Delete All</button><?php endif;?>
            <div class="space5"></div>

            <!-- button onClick="alert('준비중입니다.');" class="btn_pack1_b_type ov-b small rato">Send E-mail</button -->
          </div>

          <div class="space100"></div>


        </div>
      </section> <!-- //lst_table2 -->


     </article> <!-- content -->
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

<? include "../inc/bot.php"; ?>

<script>
 $(function(){
	// and / or 스위치 함수
	$("button.btn_switch").click(function(){
		var text = $(this).text();
		$(this).text((text == "OR") ? "OR":"AND");
		//$("#anor").val($(this).text());
	});
	LabelHidden(".inp_txt.lh");
	bbsCheckbox();
	checkListMotion();
})

function deleteAll() {
	//return;
	if ($(":checkbox[name='idxs[]']:checked").length == 0) {
		alert("삭제하려는 것을 먼저 선택하여 주세요.");
	}
	else {
		if (confirm("선택한 것을 정말 삭제하겠습니까?")) {
			document.listFrm.action="?at=delete";
			document.listFrm.submit();
		}
	}
}

function editArticle(idx) {
	//location.href="?at=read&idx="+idx+"&page=<?php echo $page?>&mode=edit";
	location.href="?at=read&idx="+idx+"&page=<?php echo $page?>&mode=edit";
}

function deleteArticle(idx) {
	if (confirm("정말 삭제하겠습니까?")) {
		$.ajax({
			type:"POST",
			url:"__delete.php",
			//url:"?at=__delete",
			dataType:"JSON",
			data:{"idx":idx},
			success: function(data) {
				//console.log(data);
				if (data.cnt > 0) {
					alert("삭제되었습니다.1");
					//location.href="?at=list";
					location.reload();
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
}

function setReset() {
	location.href='?at=list';
}

function setWrite() {
	location.href='write.php';
}

function deleteKeyword(v) {
	$("#"+v).val("");
	$("#span-"+v).remove();
/*
	if (v == 'orders'){
		var orders 		= $(':radio[name="orders"]:checked').val();
		$('input:radio[name=orders]:input[value='+orders+']').attr("checked", false);
	}
*/
}

function setListSize(sz) {
	location.href="?<?php echo $params;?>&sz="+sz;
}

function setOrder(sort, od) {
	location.href="?at=list&sort="+sort+"&od="+od;
}

function getSearch(f) {
	if ($("#bdate").val() != "" || $("#edate").val() != "") {
		if ($("#bdate").val() == "") {
			alert("시작일을 입력하세요.");
			$("#bdate").focus();
			return false;
		}
		if ($("#edate").val() == "") {
			alert("종료일을 입력하세요.");
			$("#edate").focus();
			return false;
		}
	}
	else {

	}

	f.submit();
}

</script>

