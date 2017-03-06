
		</ul>
	</div>
</section>

<!-- div class="paginate">
	<a href="" class="num on">1</a>
	<a href="" class="num">2</a>
	<a href="" class="num">3</a>
	<a href="" class="num">4</a>
	<a href="" class="num">5</a>
	<a href="" class="num">6</a>
	<a href="" class="num">7</a>
	<a href="" class="num">8</a>
	<a href="" class="num">9</a>
	<a href="" class="num">10</a>
	<a href="" class="btn next2">다음10페이지</a>
	<a href="" class="btn next">끝</a>
</div -->
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
	resizing2(3);
	$(window).resize(function(){
		resizing2(3);
		var CardBoxH = Math.max($(window).scrollTop()+($(window).height()/2)-($("#cardnewsView .view_box").height()/2),30);
		$("#cardnewsView .view_box").css("margin-top",CardBoxH);
	})

});


</script>
<script>
var share_url = "<?php echo SHARE_URL;?>"+encodeURIComponent("??page=<?php echo $page;?>&at=list&subm=15&cate=15");
function shareFaceBookMM() {
	//alert("<?php echo $News->attr['news_idx']; ?>");
	var url = "http://www.facebook.com/sharer.php?u="+share_url;
	window.open(url, '', '');
}

function sharePinterestMM() {
	var coverImage = '';
	var desc = '';
	var url = "http://pinterest.com/pin/create/button/?url="+share_url;
	window.open(url, '', '');
}
function shareGooglePlusMM() {
	var url = "https://plus.google.com/share?url="+share_url;
	window.open(url, '', 'width=490 height=470');
}


</script>