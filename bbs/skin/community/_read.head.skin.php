<? include "../inc/config.php"; ?>
<?php
  $categoriName = "NEWS";
  $pageName = "NEWS";
  $pageNum = "2";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
		<div class="tabBox">
			<ul>
				<li><a href="<?php echo $news_menu_brief ; ?>">In brief</a></li>
				<li><a href="<?php echo $news_menu_trend ; ?>">Trend</a></li>
				<li><a href="<?php echo $news_menu_people ; ?>">People</a></li>
				<li><a href="<?php echo $news_menu_world ; ?>">World</a></li>
				<li><a href="<?php echo $news_menu_trouble ; ?>">Trouble</a></li>
				<li><a href="<?php echo $news_menu_episode ; ?>">Episode</a></li>
				<li class="on"><a href="<?php echo $news_menu_community ; ?>">Community</a></li>
			</ul>
		</div>
          <section id="bbs_view_ty1">
              <div class="inner">
                  <header class="header">
                      <h1><strong><?php echo $Bbs->attr['bbs_name']; ?></strong><?php echo $Bbs->attr['bbs_title']; ?></h1>
                      <p class="data"><?php echo substr($Bbs->attr['reg_date'],0,4)?>.<?php echo substr($Bbs->attr['reg_date'],5,2)?>.<?php echo substr($Bbs->attr['reg_date'],8,2)?></p>
                      <ul class="util clearfix">
                        <!-- li><a href="#" class="mail">메일보내기</a></li -->
                        <li><a href="#" class="print"  id="btnPrint">프린트하기</a></li>
                      </ul>
                  </header><!-- //header -->
                  <article class="content">
					<ul class="ico_list">
						<li><a href="javascript:;" onclick="shareFaceBook();"><img src="/images/bbs/ico_bbs_view1_off.gif" alt="페이스북" /></a></li>
						<li><a href="javascript:;" onclick="sharePinterest();"><img src="/images/bbs/ico_bbs_view2_off.gif" alt="" /></a></li>
						<li><a href=""><img src="/images/bbs/ico_bbs_view3_off.gif" alt="" /></a></li>
						<li><a href=""><img src="/images/bbs/ico_bbs_view4_off.gif" alt="" /></a></li>
						<li><a href="javascript:;" onclick="shareGooglePlus();" ><img src="/images/bbs/ico_bbs_view5_off.gif" alt="" /></a></li>
					</ul>
                    <p><?php echo str_replace('\\"', '"', htmlspecialchars_decode($Bbs->attr['bbs_content'])); ?></p>
                  </article><!-- //content -->
              </div><!-- //inner -->
          </section><!-- //bbs_view_ty1 -->





		  <div class="comentArea">

		  <form name="comment_frm" method="post" action="comment_update.php">
			<input type="hidden" name="idx" value="<?php echo $Bbs->attr['bbs_idx']; ?>">
				<div class="inputBox">
					<span class="input"><textarea name="com_content" id="com_content" cols="30" rows="10"></textarea></span><span class="btn"><button>댓글달기</button></span>
				</div>
		  </form>

				<div class="replyBox">


<?
$Bbs->setAttr("bbs_idx", $bbs_idx);
$Bbs->setAttr("page", $page);
$Bbs->setAttr("list_size", 10);

$tmp_com = $Bbs->getListComment($dbh);
$list_com = $tmp_com[0];
$total_cnt_com = $tmp_com[1];



foreach($list_com as $row_com){
		$Bbs->setAttr("comment_group", $row_com['comment_group']);
		$tmp_com_re = $Bbs->getListCommentRe($dbh);
		$list_com_re = $tmp_com_re[0];
		$total_cnt_com_re = $tmp_com_re[1];
		$list_count= count($list_com_re);
?>
					<div class="reply">
					<form method="post" action="comment_update.php" onSubmit="return writeReply('<?php echo $row_com['comment_idx']; ?>',this);" >
					<input type="hidden" name="idx" value="<?php echo $Bbs->attr['bbs_idx']; ?>">
					<input type="hidden" name="cidx" value="<?php echo $row_com['comment_idx']; ?>">
					<input type="hidden" name="mode" value="reply">
						<div class="inner">
							<p class="infor"><span class="writer"><?php echo explode("@",$row_com['user_id'])[0];?></span><span class="time"><?php echo substr($row_com['create_date'],0,16);?></span></p>
							<ul class="btn_list">
								<li class="reply_input_btn"><a href="#" onclick="return false;">댓글</a></li>
								<?php
								if ( Login::getLoginWriteLevel($Bbs->attr['user_idx']) ){  //관리자이거나 글쓴이 이면 수정 삭제 가능							
								?>
									<li><a href="javascript:articleDeleteComment(<?php echo $row_com['comment_idx']; ?>,<?php echo $row_com['origin_user_idx'];?>)">삭제</a></li>
									<!-- li><a href="#">수정</a></li -->
								<?
								}
								?>
							</ul>
							<div class="cont"> 
								<p><?php echo $row_com[comment_content];?></p>
							</div>
							<?php if($list_count > 0){ ?>
							<button type="button" class="btn_reply">답글 <?php echo $list_count ;?></button>
							<? } ?>
						</div>
						<div class="reply input">
							<div class="inner">
								<!-- p class="infor"><span class="writer">작성자명</span></p -->
								<div class="inputBox">
									<span class="input"><textarea name="com_content" id="com_content_<?php echo $row_com['comment_idx']; ?>" cols="30" rows="10"></textarea></span><span class="btn"><button>댓글달기</button></span>
								</div>
							</div>
						</div>
					</form>
					</div>
					
<?
		$i=0;

		//echo 		'list_count '.$list_count .'<br>';
		foreach($list_com_re as $row_re){
			if ($i == 0 ){
				echo '<div class="reply by" style="display:block;">';
			}
?>
					<div class="reply by1">
						<div class="inner">
							<p class="infor"><span class="writer"><?php echo explode("@",$row_re['user_id'])[0];?></span><span class="time"><?php echo substr($row_re['create_date'],0,16);?></span></p>
							<?php
							if ( Login::getLoginWriteLevel($Bbs->attr['user_idx']) ){  //관리자이거나 글쓴이 이면 수정 삭제 가능							
							?>
							<ul class="btn_list">
								<li><a href="javascript:articleDeleteComment(<?php echo $row_re['comment_idx']; ?>,<?php echo $row_re['origin_user_idx'];?>)">삭제</a></li>
								<!-- li><a href="">수정</a></li -->
							</ul>
							<?
							}
							?>
							<div class="cont"> 
								<p><?php echo $row_re[comment_content];?></p>
							</div>
						</div>
					</div>


<?
			$i ++;
			if ($list_count == $i ){
				echo '</div>';
			}
		}
}
?>

<script>
function writeReply(id,f){
	if($("#com_content_"+id).val() == "" ){ 
		alert("내용을 입력하셔야 합니다."); 
		return false ; 
	}else{
		return true ;
	}
}

</script>



					
				</div>
			</div>
			<script type="text/javascript">
				$(".reply .btn_list .reply_input_btn").click(function(){
					if ($(this).parents(".reply").find(".reply.input").css("display") == "none")
					{
						$(this).parents(".reply").find(".reply.input").slideDown();
					}else{
						$(this).parents(".reply").find(".reply.input").slideUp();
					}
			  });
			  $(".btn_reply").click(function(){
					
					if ($(this).parents(".reply").next(".reply.by").css("display") == "none")
					{
						$(this).addClass("on").parents(".reply").next(".reply.by").slideDown();
					}else{
						$(this).removeClass("on").parents(".reply").next(".reply.by").slideUp();
					}
				});
				$(".ico_list li").hover(function(){
	$(this).find("img").attr("src",$(this).find("img").attr("src").split("_off").join("_on"));
		},function(){
	$(this).find("img").attr("src",$(this).find("img").attr("src").split("_on").join("_off"));
});

			</script>










          
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

<iframe name="print_iframe" id="print_iframe" src="" width="0" height="0" style="display:"></iframe>
<script type="text/javascript">
$("#btnPrint").on("click",function(){
	var print_contents = $("#bbs_view_ty1").html();
	$("#print_iframe").contents().find("body").html(print_contents);
	$("#print_iframe").contents().find("#btnBox").hide();
	$("#print_iframe").focus();
	frames["print_iframe"].focus();
	frames["print_iframe"].print();
});

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
			//alert(data);
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





