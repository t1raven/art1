
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
	resizing2(low_cnt);
	$(window).resize(function(){
		resizing2(low_cnt);
		var CardBoxH = Math.max($(window).scrollTop()+($(window).height()/2)-($("#cardnewsView .view_box").height()/2),30);
		$("#cardnewsView .view_box").css("margin-top",CardBoxH);
	})

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
var share_url = "<?php echo SHARE_URL;?>"+encodeURIComponent("?page=<?php echo $page;?>&at=list&subm=15&cate=15");
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