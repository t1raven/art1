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
<style>
#div-point.table-point table {
	border: 1px solid black;
	width:500px;
}
#div-point.table-point th {
	background-color: #4CAF50;
	color: #ffffff;
	border: 1px solid black;
	vertical-align: middle;
	height: 40px;
	font-weight: bold;
}
#div-point.table-point td {
	border: 1px solid black;
	vertical-align: middle;
	text-align: center;
	height: 30px;
}
#div-point.table-point tr:nth-child(even) {
	/*background-color: #f2f2f2;*/
}
</style>
<section id="pointPopup" class="layer_popup1">
	<header class="searchBox">
		<button class="close"><img src="/oktomato/images/btn/btn_close.gif" alt="닫기"></button>
	</header>
	<article class="cont">
		<div class="scrollBox1">
			<table class="table-point" id="div-point">
				<thead>
					<tr>
						<th width="100">패널명</th>
						<th width="80">기술성</th>
						<th width="80">예술성</th>
						<th width="80">창의성</th>
						<th width="80">가능성</th>
						<th width="80">평균</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</article>
</section>

<?php echo ACTION_IFRAME;?>
<!-- //container -->

<script>
$(function(){
	//레이어 팝업
	$(".layerOpen").click(function(){
		$.ajax({
			url:'index.php',
			type:'post',
			data:{"idx":$(this).data("idx"), "cidx":$(this).data("cidx"), "at":"read"},
			dataType:'html',
			async:false,
			success:function(data){
				if(data != null){
					$("#div-point tbody").html(data);
				}
			},
			error:function(e){
				alert(e.responseText);
			}
		});

		$(".layer_popup1").css("display","none");
		var id = $(this).attr("href");
		//var x = $(this).offset().left;
		//var y = $(this).offset().top-10;
		var x = ( $(window).scrollLeft() + ( $(window).width() - $('.layer_popup1').width()) / 2 );
		var y = ( $(window).scrollTop() + ( $(window).height() - $('.layer_popup1').height()) / 2 );
		layerBoxOffset(id,x,y);
		return false;
	});

	LabelHidden(".inp_txt.lh");
	bbsCheckbox();
	checkListMotion();
	$( "#pointPopup" ).draggable({
		containment: 'window',
		scroll: false
	});
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
	location.href='index.php?at=list';
}

function deleteKeyword(v) {
	$("#"+v).val("");
	$("#span-"+v).remove();
}

function setListSize(sz) {
	location.href="index.php?<?php echo $params;?>&sz="+sz;
}

function setOrder(sort, od) {
	location.href="index.php?<?php echo $params;?>&sort="+sort+"&od="+od;
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

function getPoint(idx){
	window.open(index);
}
function excel(){
	location.href="<?php echo $paramsExcel; ?>";
}
</script>
<?php include '../../inc/bot.php'; ?>