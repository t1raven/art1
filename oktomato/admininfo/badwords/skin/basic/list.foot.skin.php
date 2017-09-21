            </tbody>
			</form>
          </table>
        </div>
        <div class="bot_align">
          <?=$pageUtil->attr[pageHtml]?>
          <div class="btn_right">
			<!-- button onClick="setWrite();" class="btn_pack1 ov-b small rato">Register</button -->
			<button type="button" class="btn_pack1 ov-b small rato layerOpen" id="#writePopup">Register</button>
			<?php if ($total_cnt > 0):?><button type="button" onclick="deleteAll();" class="btn_pack1 ov-b gray small rato">Delete All</button><?php endif;?>
          </div>
        </div>  
      </section>
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->


 <section id="writePopup" class="layer_popup1">
 <!-- header class="searchBox">
      <button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
   </header -->
   <!-- form name="listFrm" method="post" action="?at=update" target="action_ifrm" -->
   <form name="saveFrm" method="post" action="?at=update">
   <input type="hidden" name="mode" id="mode" value="">
   <input type="hidden" name="bad_words_idx" id="bad_words_idx" value="" >
   <article class="cont">
      <h1>금칙어</h1>
       <p> <input name="bad_word" type="text" class="inp_txt w190" id="bad_word" value="" > <button type="button" onClick="submit();" class="btn_pack1 ov-b small rato">Save</button></p>
   </article>
   </form>
</section>

<?php echo ACTION_IFRAME;?>

<script>

$(function(){
    //레이어 팝업
   
   $(".layerOpen").click(function(){
		var idx = $(this).data("idx"); //수정시 
		var word = $(this).data("word");
		var mode = $(this).data("mode"); 
		$("#mode").val(mode);
		$("#bad_words_idx").val(idx);
		$("#bad_word").val(word);


	    $(".layer_popup1").css("position","absolute");
        $(".layer_popup1").css("display","none");
        //var id = $(this).attr("href");
		var id = $(this).attr("id");
        var x = $(this).offset().left - 250;
        var y = $(this).offset().top-10;
        layerBoxOffset(id,x,y);
        return false;
    });
   

      LabelHidden(".inp_txt.lh");
      bbsCheckbox();
      checkListMotion();
      initFileUploads();

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
			hiddenPopup(e,'writePopup');
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
	location.href='?at=write';
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
	f.submit();
}


   
</script>
<? include "../../inc/bot.php"; ?>