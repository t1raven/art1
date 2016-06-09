                            </tbody>
                        </table>
                    </div>
                </section>
                <!--div class="paginate">
                  <a href="#" class="btn"><img src="/images/bbs/btn_prev2_off.gif" alt="처음"></a>
                  <a href="#" class="btn prev"><img src="/images/bbs/btn_prev_off.gif" alt="이전"></a>
                  <a href="#" class="num on">1</a>
                  <a href="#" class="num">2</a>
                  <a href="#" class="btn next"><img src="/images/bbs/btn_next_off.gif" alt="다음"></a>
                  <a href="#" class="btn"><img src="/images/bbs/btn_next2_off.gif" alt="마지막"></a>
                </div -->
				<?php echo $pageUtil->attr[pageHtml]?>
            </div><!-- //content-mediaBox -->
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <script>
  /*
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
	  */
  </script>
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>