            </tbody>
			</form>
          </table>
        </div> <!-- 검색결과리스트_게시판_끝 -->

<div id="divConfirmSelect"></div>
<!---------------->
	<style type="text/css">
		#divConfirmSelect {
		 position:absolute;
		 display:none;
		 background-color:#ffffff;
		 border:solid 2px #2ba3f7;
		 width:140px;
		 height:15px;
		 padding:10px;
		}
	</style>
<!---------------->

        <!-- 검색결과리스트_페이징처리_시작 -->
        <div class="bot_align">
          <?=$pageUtil->attr[pageHtml]?>

          <div class="btn_right">
            <button onClick="setWrite();" class="btn_pack1 ov-b small rato">Register</button>
            <?php if ($total_cnt > 0):?><button type="button" onclick="deleteAll();" class="btn_pack1 ov-b gray small rato">Delete All</button><?php endif;?>
          </div>
        </div>  
		
      </section> <!-- //lst_table2 -->
      
      <div id="divImgPreview"></div>
<!---------------->
	<style type="text/css">
	/* //마우스를 클릭한 곳에 이미지 나올때 사용
		#divImgPreview {
		 position:absolute;
		 display:none;
		 background-color:#ffffff;
		 border:solid 0px #2ba3f7;
		 width:140px;
		 height:15px;
		 padding:0px;
		}
		*/
	</style>
<!---------------->
		<!-- img src="/oktomato/images/sample/sample1.jpg" width="200" alt="샘플이미지" / -->
        
     </article> <!-- content -->
  </div> <!-- //container_inner -->
 </section> <!-- //container -->
 
 
<script type="text/javascript">
$(document).ready(function(){
  //마우스 오버시 레이어 display값을 block으로 변경
   $("#Layer_popup").bind("mouseover", function() {
        $(this).css({"display":"block"});
    });
//마우스아웃시 레이어 display값을 none으로 변경
   $("#Layer_popup").bind("mouseout", function() {
        $(this).css({"display":"none"});
    });
});


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
				if (data.cnt > 0) {
					alert("삭제되었습니다.");
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
}
function deleteKeywordRadio(v){
	$("input:radio[name='"+v+"']").removeAttr('checked');
	$("input:radio[name='"+v+"']:radio[value='']").attr('checked', true); // 원하는 값(Y)을 체크
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
<script>
function previewImg(idx) {
	$.ajax({
		type:"POST",
		url:"__file_view.php",
		data:{"idx":idx},
		success: function(data) {
			// alert(data);
			$("#divImgPreview").html(data);  
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}

function getAjaxPost(uv,idx,targetId) {
	$.ajax({
		type:"POST",
		url:uv+".php",
		data:{"idx":idx},
		success: function(data) {
			$("#"+targetId+"").html(data);  
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}

function getModfyConfirm(idx,mod) {
	$.ajax({
		type:"POST",
		url:"__confirm_update.php",
		data:{"idx":idx,"mod":mod},
		dataType:"JSON",
		success: function(data) {
			if (data.cnt > 0) {
				if (mod=='Y'){
					$("#cfmMod_"+idx).text("승인");
					$("#cfmMod_"+idx).removeClass("fc_red");
					$("#cfmMod_"+idx).addClass("fc_blue");
				}
				if (mod=='W'){
					$("#cfmMod_"+idx).text("대기");
					$("#cfmMod_"+idx).removeClass("fc_blue");
					$("#cfmMod_"+idx).addClass("fc_red");
				}
				if (mod=='N'){
					$("#cfmMod_"+idx).text("거절");
					$("#cfmMod_"+idx).removeClass("fc_blue");
					$("#cfmMod_"+idx).removeClass("fc_red");
				}
			}else{
				alert("데이터 변경에 실패하였습니다.");
				location.reload();
			}
			
			$('#divConfirmSelect').hide(); 
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}

function confirm_result(idx,val){
	//alert(idx +"::"+ val);
	if (val == 'W' || val == 'Y' || val == 'N'){
		getModfyConfirm(idx,val);
	}
	if (val == 'D'){
		deleteArticle(idx);
	}
}
</script>
	<script type="text/javascript">
		//-- 버튼 클릭시 버튼을 클릭한 위치 근처에 레이어 생성 --//
		$('.conSelect').click(function(e) {
		 var divTop = e.pageY -160; //상단 좌표
		 var divLeft = e.pageX - 350; //좌측 좌표\

		 $('#divConfirmSelect').css({
			 "top": divTop
			 ,"left": divLeft
			// , "position": "absolute"
		 }).show();
		});

		function mLayerPop(vcss, vtarget){
			$('.'+vcss).click(function(e) {
				 var divTop = e.pageY -160; //상단 좌표
				 var divLeft = e.pageX - 350; //좌측 좌표\
				 $('#'+vtarget+'').css({
					 "top": divTop
					 ,"left": divLeft
					// , "position": "absolute"
				 }).show();
			});
		}

		$(document).mousedown(function(e){ //레이어 이외의 곳 클릭시 팝업닫기
			
			$('#divConfirmSelect').each(function(){
				if( $(this).css('display') == 'block' )
				{
					var l_position = $(this).offset();

					l_position.right = parseInt(l_position.left) + ($(this).width()) + 20;
					l_position.bottom = parseInt(l_position.top) + parseInt($(this).height()) + 20;

					if(   ( l_position.left <= e.pageX && e.pageX <= l_position.right )
						&& ( l_position.top <= e.pageY && e.pageY <= l_position.bottom ) )
					{
						//alert( 'popup in click' );
					}
					else
					{
						//alert( 'popup out click' );
						//$(this).hide("fast");
						$(this).hide();
					}
				}
			});

			/*//마우스 따라 이미지가 나올때 팝업 닫기 S
			$('#divImgPreview').each(function(){
				if( $(this).css('display') == 'block' )
				{
					var l_position = $(this).offset();

					l_position.right = parseInt(l_position.left) + ($(this).width()) + 20;
					l_position.bottom = parseInt(l_position.top) + parseInt($(this).height()) + 20;

					if(   ( l_position.left <= e.pageX && e.pageX <= l_position.right )
						&& ( l_position.top <= e.pageY && e.pageY <= l_position.bottom ) )
					{
						//alert( 'popup in click' );
					}
					else
					{
						//alert( 'popup out click' );
						//$(this).hide("fast");
						$(this).hide();
					}
				}
			});
			*///마우스 따라 이미지가 나올때 팝업 닫기 S
		});
	</script>

<? include "../inc/bot.php"; ?>
