
		</ul>
	</div>
</section>

			<?=$pageUtil->attr[pageHtml]?>


    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <section id="cardnewsView" onclick="clickCardViewBack();"></section>
<?php
include_once(ROOT.'inc/footer.php');
include_once(ROOT.'inc/bot.php');
?>

<script src="/js/idangerous.swiper.min.js"></script>
<script src="/js/jquery.dotdotdot.min.js"></script>
<script>
function swipeCardNews(){

<?php if ( $check_mobile == true ){ ?>

		// $("#cardnewsView .view_box .img_box").swipe({
			// swipeLeft:function() {
				// slideCardImg(1);
			// },
			// swipeRight:function() {
				// slideCardImg(-1);
			// },
		// });
<? }?>
}

$(function(){
	var low_cnt ="<?php echo $low_cnt; ?>";
	var wPostcnt =  resizing2(low_cnt);
	wPostRe(wPostcnt);

	$(window).resize(function(){
		wPostcnt = resizing2(low_cnt);
		var CardBoxH = Math.max($(window).scrollTop()+($(window).height()/2)-($("#cardnewsView .view_box").height()/2),30);
		$("#cardnewsView .view_box").css("margin-top",CardBoxH);

		wPostRe(wPostcnt);
	})

	function wPostRe(wPostcnt){
		//2017-03-14 lyt (모바일의 경우 2개씩 나오므로 인브리프와 주전자가 없으면 해당 li 를 감춘다.
		var $li = $(".clearfix").find("li");
		var li_cnt = $(".clearfix").find("li").length;

		if (wPostcnt == 2) {

			var $li = $(".clearfix").find("li");
			var li_cnt = $(".clearfix").find("li").length;

			for (i = 0; i < li_cnt ; i++) {
				//console.log("$li : "+ $li.eq(i).hasClass('post_4'));

				//4:주전자 li 가 없으면 3:인브리프도 없는지 확인하여 둘다 없으면 모바일에서는 숨김 처리
				if ($li.eq(i).hasClass('post_4') == true) {
					if ($li.eq(i-1).hasClass('post_3') == true) {
						$li.eq(i).css("display","none");
						$li.eq(i-1).css("display","none");
					}
				}
			}
		}else{
			$li.css("display","");
		}
	}

});

var viewID = "";
$(window).on('hashchange', function() {
	viewID = location.hash.split("#")[1];
	if(viewID != undefined && viewID != "") {
		getCardView(viewID);
	}else{
		viewID = ""
	}
}).trigger('hashchange');


</script>
<script>
var share_url = "<?php echo SHARE_URL;?>"+encodeURIComponent("?page=<?php echo $page;?>&at=list&subm=16&cate=16");
function shareFaceBookMM() {
	//alert("<?php echo $News->attr['news_idx']; ?>");
	var url = "http://www.facebook.com/sharer.php?u="+share_url+"#"+viewID;
	window.open(url, '', '');
}

function sharePinterestMM() {
	var coverImage = '';
	var desc = '';
	var url = "http://pinterest.com/pin/create/button/?url="+share_url+"#"+viewID;
	window.open(url, '', '');
}
function shareGooglePlusMM() {
	var url = "https://plus.google.com/share?url="+share_url+"#"+viewID;
	window.open(url, '', 'width=490 height=470');
}


</script>