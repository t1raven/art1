<?php if (!defined('OKTOMATO')) exit;?>
            </tbody>
          </table>
          </form>
        </div>
        <div class="bot_align">
          <?=$pageUtil->attr[pageHtml]?>
          <div class="btn_right">
            <!--button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Register</button-->
            <?php if ($total_cnt > 0):?><button type="button" onclick="deleteAll();" class="btn_pack1 ov-b gray small rato">Delete All</button><?php endif;?>
          </div>
        </div>
      </section> <!-- //lst_table2 -->
     </article>
  </div>
 </section>
 <!-- //container -->
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

function editArticle(ord) {
	location.href="index.php?at=write&ord="+ord+"&page=<?php echo $page?>";
}

function deleteArticle(ord) {
	if (confirm("정말 삭제하겠습니까?")) {
		$.ajax({
			type:"POST",
			url:"index.php",
			dataType:"JSON",
			data:{"ord":ord, "at":document.listFrm.at.value},
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
</script>
<?php include('../../inc/bot.php'); ?>