          
		  <div class="btn_bot">
              <div class="lft_group">
                  <?php if(!empty($Bbs->attr['prev_idx'])){ ?><a href="?at=read&idx=<?php echo $Bbs->attr['prev_idx'];?>&<?php echo $readParams; ?>" class="btn_pack prev samll">이전글</a><?php } ?>
                  <?php if(!empty($Bbs->attr['next_idx'])){ ?><a href="?at=read&idx=<?php echo $Bbs->attr['next_idx'];?>&<?php echo $readParams; ?>" class="btn_pack next samll">다음글</a><?php } ?>
              </div> 
              <div class="rgh_group">
                  <a href="?<?php echo PageUtil::_param_get('idx='.$row['bbs_idx'].'&at=list');?>" class="btn_pack samll">목록</a>
<?
if ( Login::getLoginWriteLevel($Bbs->attr['user_idx']) ){  //관리자이거나 글쓴이 이면 수정 삭제 가능
?>  
				  <a href="?<?php echo PageUtil::_param_get('at=write&mode=edit');?>" class="btn_pack samll">수정</a>
				  <a href="javascript:articleDelete();" class="btn_pack samll">삭제</a>
<?
}
?>

              </div> 
          </div><!-- //btn_bot -->




     
    </b><!-- //container_inner -->
  </section><!-- //container_sub -->

<?php
echo ACTION_IFRAME;
?>


<iframe name="print_iframe" id="print_iframe" src="" width="0" height="0" style="display:"></iframe>
<script type="text/javascript">
/*
$("#btnPrint").on("click",function(){
	var print_contents = $("#bbs_view_ty1").html();
	$("#print_iframe").contents().find("body").html(print_contents);
	$("#print_iframe").contents().find("#btnBox").hide();
	$("#print_iframe").focus();
	frames["print_iframe"].focus();
	frames["print_iframe"].print();
});
*/
function print_ok() {
	window.open("/news/print_pop.php","print_iframe");
}

//var share_url = encodeURIComponent("<?php echo SHARE_URL;?>?at=read&idx=<?php echo $Bbs->attr['bbs_idx']; ?>");
var share_url = "<?php echo SHARE_URL;?>"+encodeURIComponent("?at=read&idx=<?php echo $Bbs->attr['bbs_idx']; ?>");
function shareFaceBook() {
	var url = "http://www.facebook.com/sharer.php?u="+share_url;
	window.open(url, '', '');
}

function sharePinterest() {
	var coverImage = '';
	var desc = '';
	var url = "http://pinterest.com/pin/create/button/?url="+share_url;
	window.open(url, '', '');
}
function shareGooglePlus() {
	var url = "https://plus.google.com/share?url="+share_url;
	window.open(url, '', 'width=490 height=470');
}

function articleDelete()
{
	$.ajax({
		type:"POST",
		url:"/bbs/__delete.php",
		dataType:"JSON",
		data:{"idx":<?php echo $Bbs->attr['bbs_idx']; ?>, "code":"<?php echo $Bbs->attr['bbs_code'];?>", "uidx":"<?php echo $Bbs->attr['user_idx'];?>"},
		success: function(data) {
//			alert(data);
			if (data.cnt > 0) {
				alert("삭제되었습니다.");
				location.href="/bbs/?at=list&code=<?php echo $Bbs->attr['bbs_code'];?>";
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


function articleDeleteComment(cidx,uidx)
{
	$.ajax({
		type:"POST",
		url:"/bbs/__delete_comment.php",
		dataType:"JSON",
		data:{"idx":<?php echo $Bbs->attr['bbs_idx']; ?>, "cidx":cidx, "uidx":uidx},
		success: function(data) {
			//alert(data);
			if (data.cnt > 0) {
				alert("삭제되었습니다.");
				//location.href="/bbs/?at=list&code=<?php echo $Bbs->attr['bbs_code'];?>";
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
</script>


  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>

