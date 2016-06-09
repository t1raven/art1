                  </ul>
              </section>

			  <div class="btn_bot_right">
                <?php if($page > 1 ) {?><button class="btn_pack prev" id="prev">PREV</button><?php } ?>
				<?php if($page < ceil($total_cnt / $sz)  ) {?><button class="btn_pack next" id="next">NEXT</button><?php } ?>
              </div>
          </div>


    </div><!-- //container_inner -->

  </section><!-- //container_sub -->
  <script src="<?=$currentFolder?>/js/jquery.dotdotdot.min.js"></script>
  <script>
  <?
$p_page = $page-1;
$n_page = $page+1;
?>

$("#prev").on("click",function(){
	//location.href="?at=list&subm=<?php echo $subm;?>&page=<?php echo $page - 1 ;?>&<?php echo $param;?>";
	location.href="?<?php echo PageUtil::_param_get('at=list&page='.$p_page);?>";
});
$("#next").on("click",function(){
	//location.href="?at=list&subm=<?php echo $subm;?>&page=<?php echo $page + 1 ;?>&<?php echo $param;?>";
	location.href="?<?php echo PageUtil::_param_get('at=list&page='.$n_page);?>";
});



    var bbsPlus = $("<img>").attr({
      "src":"/images/bg/bg_plus.gif"
    }).css({
      "position":"absolute",
      "width":42,
      "height":42,
      "right":"2%",
      "top":"50%",
      "z-index":10,
      "margin-top":-22

    }).addClass("plus");
    $("#bbs_list1_rwd >ul>li").css("cursor","pointer").on("mouseenter mouseleave",function(e){
      var $this = $(this);
        if(e.type == "mouseenter"){
          $this.addClass("on").append(bbsPlus); 
          if(Modernizr.opacity){
            bbsPlus.css({"opacity":0,"top":"65%"}).stop().animate({
              "opacity":1,
              "top":"50%"
            },300,"easeInQuad");
          }
        }else{
          $this.removeClass("on").find(".plus").remove();
        }
    }).on("click",function(){
      var href = $(this).find(" .cont .h a").attr("href");
      $(document).attr("location",href);

    });
      dotWindow("#bbs_list1_rwd > ul > li .cont .h , #bbs_list1_rwd > ul > li .cont .txt " , "window");    
  </script>
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>


