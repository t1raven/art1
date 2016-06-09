
				 <!-- p class="bbs_copy">[<?php echo $News->attr['source'];?>]</p -->
				 
				 </article><!-- //content -->
              </div><!-- //inner -->
          </section><!-- //bbs_view_ty1 -->
          <div class="btn_bot content-mediaBox margin1">
              <div class="lft_group">
                  <?php if(!empty($News->attr['prev_idx'])){ ?><a href="?idx=<?php echo $News->attr['prev_idx'];?>&<?php echo $readParams; ?>" class="btn_pack prev samll">이전글</a><?php } ?>
                  <?php if(!empty($News->attr['next_idx'])){ ?><a href="?idx=<?php echo $News->attr['next_idx'];?>&<?php echo $readParams; ?>" class="btn_pack next samll">다음글</a><?php } ?>
              </div> 
<?php
if ( isset($at_tmp) ){  
	$back_url_m = '?'.PageUtil::_param_get('at='.$at_tmp.'&subm='.$subm) ;
}else{
	$back_url_m = 'javascript:history.back()';
}

if ($News->attr['news_category_idx']!='1' ){ //뉴스 메인은 목록이 없다.
?>             
			  <div class="rgh_group">
                  <a href="?<?php echo PageUtil::_param_get('at=list&subm='.$subm);?>" class="btn_pack samll">목록</a>
				  <a href="?<?php echo PageUtil::_param_get('at='.$at_tmp.'&subm='.$subm);?>" class="btn_pack samll">뒤로</a>
              </div> 
<?
}
?>
          </div><!-- //btn_bot -->

      
    </b><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>



<script>
//$("#btnPrint").on("click",function(){
	/* 프린트 
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
	window.open("print_pop.php","print_iframe");
}

var share_url = "<?php echo SHARE_URL;?>"+encodeURIComponent("?at=read&idx=<?php echo $News->attr['news_idx']; ?>");
function shareFaceBook() {
	//alert("<?php echo $News->attr['news_idx']; ?>");
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


</script>
<iframe name="print_iframe" id="print_iframe" src="" width="0" height="0" style="display:"></iframe>
