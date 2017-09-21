              
            </tbody>
			</form>
          </table>
        </div>
        <div class="bot_align">
          <?=$pageUtil->attr[pageHtml]?>
          <div class="btn_right">
            <button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Register</button>
            <!-- button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b gray small rato">Delete All</button -->
			<?php if ($total_cnt > 0):?><button type="button" onclick="deleteAll();" class="btn_pack1 ov-b gray small rato">Delete All</button><?php endif;?>
          </div>
        </div>  
      </section> <!-- //lst_table2 -->
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

 <section id="mainInfoPopup" class="layer_popup1">
	<header class="searchBox">
      <button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
   </header>
   <article class="cont">
      <h1>뉴스레터 신청 이메일</h1>
       <p> <input name="modiEmail" type="text" class="inp_txt w190" id="modiEmail" value="abc@oktomato.net" > <button type="button" id="butEmailModi" class="btn_pack1 ov-b small rato">Save</button></p>
   </article>
</section>

  <?php echo ACTION_IFRAME;?>

<script>
function getModfyEmail(idx,email) {
	$.ajax({
		type:"POST",
		url:"__update.php",
		data:{"idx":idx,"email":email},
		dataType:"JSON",
		success: function(data) {
			//alert(data);
			if (data.cnt == 1) {
				$("#layerLink_"+idx).text(email);
				$("#emailLink_"+idx).data("email",email);
			} else if (data.cnt == 91) {
				alert("이메일에 값이 없습니다.");
			} else if (data.cnt == 92) {
				alert("이메일 형식이 맞지 않습니다..");
			} else if (data.cnt == 93) {
				alert("이미 등록된 이메일 입니다.");
			}else{
				alert("데이터 변경에 실패하였습니다.");
				location.reload();
			}
			
			$('#mainInfoPopup').hide(); 
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}

function deleteAll() {
	//return;
	if ($(":checkbox[name='idxs[]']:checked").length == 0) {
		alert("삭제하려는 것을 먼저 선택하여 주세요.");
	}
	else {
		if (confirm("선택한 것을 정말 삭제하겠습니까?")) {
			//document.listFrm.action="?at=delete";
			//document.listFrm.action = "?at=delete";
			document.listFrm.submit();
		}
	}
}

function deleteArticle(idx,email) {
	if (confirm("정말 삭제하겠습니까?")) {
		$.ajax({
			type:"POST",
			url:"__delete.php",
			//url:"?at=__delete",
			dataType:"JSON",
			data:{"idx":idx,"email":email},
			success: function(data) {
				
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

   $(".layerOpen").click(function(){  
	   var idx = $(this).data("idx"); //뉴스레터 idx
	   var email = $(this).data("email"); //이메일
	   $("#modiEmail").val(email)  ;

        $(".layer_popup1").css("display","none");   
        var id = $(this).attr("href");   
        var x = $(this).offset().left - 280;   
        var y = $(this).offset().top-10;   
        layerBoxOffset(id,x,y);   

		$("#butEmailModi").off().on("click",function(){
			email = $("#modiEmail").val(); //이메일
			getModfyEmail(idx,email);
		});

		
        return false;   
    });

   $(function(){
      LabelHidden(".inp_txt.lh");   
      bbsCheckbox();   
      checkListMotion();   
      initFileUploads();   
    })
   
</script>
<? include "../../inc/bot.php"; ?>