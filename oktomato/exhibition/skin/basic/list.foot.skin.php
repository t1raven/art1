            </tbody>
			</form>
          </table>
        </div>
        <div class="bot_align">
          <?=$pageUtil->attr[pageHtml]?>

          <div class="btn_right">
            <button onClick="setWrite();" class="btn_pack1 ov-b small rato">Register</button>
            <!-- button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b gray small rato">Delete All</button -->
			<?php if ($total_cnt > 0):?><button type="button" onclick="deleteAll();" class="btn_pack1 ov-b gray small rato">Delete All</button><?php endif;?>
          </div>
        </div>
      </section>
      <!-- //lst_table2 -->
	  <div id="divImgPreview"></div>
     </article>
  </div> <!-- //container_inner -->
   
 </section> <!-- //container -->


 <section id="RecommendedListPopup" class="layer_popup1 trea">
     <button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
     <article class="cont">
        <h1>처리</h1>
        <div class="scrollBox2 trea">
          <ul class="butt_list">
			<li><button class="buttTxt" data-confirm="Y" >승인</button></li>
            <li><button class="buttTxt" data-confirm="W">대기</button></li>
            <li><button class="buttTxt" data-confirm="N">거절</button></li>
            <li><button class="buttTxt" data-confirm="D">삭제</button></li>
          </ul>
        </div>
     </article> 
 </section>


<section id="RecommendedImgPopup" class="layer_popup1" >
</section>


 <script>
 $(function(){
  //레이어 팝업
   $(".layerOpen").click(function(){
	   var idx = $(this).data("idx"); //카테고리 코드

        $(".layer_popup1").css("display","none");
        var id = $(this).attr("href");
        var x = $(this).offset().left-170;
        var y = $(this).offset().top-100;
        layerBoxOffset(id,x,y);

		$(".butt_list > li").off().on("click",function(){
			var ty = $(this).find(".buttTxt").data("confirm");
			confirm_result(idx,ty);

		});
        return false;

    });


//previewImg(idx);
  //이미지 팝업
   $(".layerOpenImg").click(function(){
		var idx = $(this).data("idx"); //카테고리 코드

        $(".layer_popup2").css("position","absolute");
		$(".layer_popup2").css("display","none");
        var id = $(this).attr("href");
        var x = $(this).offset().left +40;
        var y = $(this).offset().top-110;
        layerBoxOffset(id,x,y);
		previewImg(idx);

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
    initFileUploads();
    btnHover(".btnOvr");

  })


$("#cfmAll").bind("click",function(){
	$("#cfm").val("");
});
$("#cfmY").bind("click",function(){
	$("#cfm").val("Y");
});
$("#cfmW").bind("click",function(){
	$("#cfm").val("W");
});
$("#cfmN").bind("click",function(){
	$("#cfm").val("N");
});


  function deleteAll() {
	if ($(":checkbox[name='idxs[]']:checked").length == 0) {
		alert("삭제하려는 것을 먼저 선택하여 주세요.");
	}
	else {
		if (confirm("선택한 것을 정말 삭제하겠습니까?")) {
			//document.listFrm.target="action_ifrm"
			document.listFrm.submit();
		}
	}
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

function previewImg(idx) {
	$.ajax({
		type:"POST",
		url:"__file_view.php",
		data:{"idx":idx},
		success: function(data) {
			// alert(data);
			//$("#divImgPreview").html(data);  
			$("#RecommendedImgPopup").html(data);  
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
					$("#layerLink_"+idx).text("승인");
					$("#layerLink_"+idx).removeClass("fc_red");
					$("#layerLink_"+idx).addClass("fc_blue");
				}
				if (mod=='W'){
					$("#layerLink_"+idx).text("대기");
					$("#layerLink_"+idx).removeClass("fc_blue");
					$("#layerLink_"+idx).addClass("fc_red");
				}
				if (mod=='N'){
					$("#layerLink_"+idx).text("거절");
					$("#layerLink_"+idx).removeClass("fc_blue");
					$("#layerLink_"+idx).removeClass("fc_red");
				}
			}else{
				alert("데이터 변경에 실패하였습니다.");
				location.reload();
			}
			
			$('#RecommendedListPopup').hide(); 
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

	  function hiddenPopup(e,id){ //레이어 이외의 곳 클릭시 팝업닫기
		$('#'+id).each(function(){
				if( $(this).css('display') == 'block' )
				{
					var l_position = $(this).offset();
					//l_position.right = parseInt(l_position.left) + ($(this).width()) ;
					l_position.right = parseInt(l_position.left) + ($(this).outerWidth()) ;
					
					//l_position.bottom = parseInt(l_position.top) + parseInt($(this).height());
					l_position.bottom = parseInt(l_position.top) + parseInt($(this).outerHeight());

					if(   ( l_position.left <= e.pageX && e.pageX <= l_position.right )
							&& ( l_position.top <= e.pageY && e.pageY <= l_position.bottom ) ){
						//alert( 'popup in click' );
					}else{
						//alert( 'popup out click' );
						//$(this).hide("fast");
						$(this).hide();
					}
				}
		});
	}

$(document).mousedown(function(e){ //레이어 이외의 곳 클릭시 팝업닫기
	hiddenPopup(e,'RecommendedListPopup');
	hiddenPopup(e,'RecommendedImgPopup');
});
</script>

<? include "../inc/bot.php"; ?>