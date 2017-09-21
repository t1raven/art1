<?php if (!defined('OKTOMATO')) exit;?>
            </tbody>
          </table>
          </form>
        </div>
        <div class="bot_align">
          <?=$pageUtil->attr[pageHtml]?>
          <div class="btn_right">
            <button type="button" onclick="location.href='?at=write'" class="btn_pack1 ov-b small rato">Register</button>
            <?php if ($total_cnt > 0):?><button type="button" onclick="deleteAll();" class="btn_pack1 ov-b gray small rato">Delete All</button><?php endif;?>
          </div>
        </div>
      </section>
      <!-- //lst_table2 -->
     </article>
  </div>
 </section>
<?php echo ACTION_IFRAME;?>
<!-- //container -->
<script>
$(function(){
	// and / or 스위치 함수
	$("button.btn_switch").click(function(){
		var text = $(this).text();
		$(this).text((text == "AND") ? "OR":"AND");
		$("#st").val((text == "AND") ? 1 : 0);
		//$("#anor").val($(this).text());
	});
	LabelHidden(".inp_txt.lh");
	bbsCheckbox();
	checkListMotion();
})

function deleteAll() {
	if ($(":checkbox[name='idxs[]']:checked").length == 0) {
		alert("삭제하려는 것을 먼저 선택하여 주세요.");
	}
	else {
		if (confirm("선택한 것을 정말 삭제하겠습니까?")) {
			document.listFrm.submit();
		}
	}
}

function editArticle(idx) {
	//location.href="index.php?at=write&idx="+idx+"&page=<?php echo $page?>";
	location.href="index.php?idx="+idx+"&<?php echo PageUtil::_param_get('at=write&idx=&page='.$page); ?>";
}

function deleteArticle(idx) {
	if (confirm("정말 삭제하겠습니까?")) {
		$.ajax({
			type:"POST",
			url:"index.php",
			dataType:"JSON",
			data:{"idx":idx, "at":document.listFrm.at.value},
			success: function(data) {
				if (data.cnt > 0) {
					alert("삭제되었습니다.");
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
	location.href="index.php";
}

function deleteKeyword(v) {
	$("#"+v).val("");
	$("#span-"+v).remove();
}

function setListSize(sz) {
	location.href="index.php?<?php echo $params;?>&sz="+sz;
}

function setOrder(sort, od) {
	location.href="index.php?sort="+sort+"&od="+od;
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

function excel(){
	location.href="<?php echo $paramsExcel; ?>";
}
</script>
<?php include '../../inc/bot.php'; ?>