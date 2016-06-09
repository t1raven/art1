                </ul>
              </section>

              <!-- div class="paginate">
                  <a href="#" class="btn"><img src="/images/bbs/btn_prev2_off.gif" alt="처음"></a>
                  <a href="#" class="btn prev"><img src="/images/bbs/btn_prev_off.gif" alt="이전"></a>
                  <a href="#" class="num on">1</a>
                  <a href="#" class="num">2</a>
                  <a href="#" class="btn next"><img src="/images/bbs/btn_next_off.gif" alt="다음"></a>
                  <a href="#" class="btn"><img src="/images/bbs/btn_next2_off.gif" alt="마지막"></a>
              </div -->
			  <?=$pageUtil->attr[pageHtml]?>

    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
   <script src="/js/jquery.dotdotdot.min.js"></script>
  <script>
      
        var mainTimeOutSet;

      $(window).resize(function(){
            clearInterval(mainTimeOutSet);
            mainTimeOutSet = setTimeout(function(){
                iCutterLoadNone(".thumb");
                dotWindow("#bbs_thumb_t5 > ul > li .cont > .txt" , "window");    
            },1000);
          });
      iCutter(".thumb");
      dotWindow("#bbs_thumb_t5 > ul > li .cont > .txt" , "window");    
  

  </script>
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>
