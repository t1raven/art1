            </tbody>
          </table>
        </div>

        </div>
      </section>
		<section id="bbsType" class="layer_popup1 bbs_type">
			<header>
				<h1>BBS Type Selection</h1>
				<button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
			</header>

			 <article class="cont">
				<ul class="bbs_type_list">
					<li>
						<p class="tit">일반(Big)</p>
						<button class="img" data-bbs="0"><img src="<?=$currentFolder?>/images/news/img_bbs_big.jpg" alt="" /></button>
					</li>
					<li>
						<p class="tit">일반(Small)</p>
						<button class="img" data-bbs="1"><img src="<?=$currentFolder?>/images/news/img_bbs_big.jpg" alt="" /></button>
					</li>
					<li>
						<p class="tit">타일</p>
						<button class="img" data-bbs="2"><img src="<?=$currentFolder?>/images/news/img_bbs_tile.jpg" alt="" /></button>
					</li>
					<li>
						<p class="tit">썸네일</p>
						<button class="img" data-bbs="3"><img src="<?=$currentFolder?>/images/news/img_bbs_thumbnail.jpg" alt="" /></button>
					</li>
					<li>
						<p class="tit">갤러리</p>
						<button class="img" data-bbs="4"><img src="<?=$currentFolder?>/images/news/img_bbs_gallery.jpg" alt="" /></button>
					</li>
				</ul>
			 </article> 
		 </section>
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->
<script type="text/javascript">
	var bbsType = ['일반(Big)','일반(Small)','타일','썸네일','갤러리'];
	 $(".pop_btn").each(function(){
		var ty = $(this).data("bbs");
		$(this).text(bbsType[ty]);	
	});
	

	$(".layerOpen").click(function(){
		var parentThis = $(this);

		var idx = $(this).data("idx"); //카테고리 코드
		
        $(".layer_popup1").css("display","none");
        var id = $(this).attr("href");
        var x = $(this).offset().left;
        var y = 30;
	 	 $(".bbs_type_list > li").off().on("click",function(){

			var ty = $(this).find(".img").data("bbs");
			parentThis.text(bbsType[ty]);
			
//			alert( bbsType[ty]);
			typeArticle(idx,ty); // 스킨타입 변경


			 if(isie7 || isie8){
				$(".layer_popup1").css({"display":"none"});
			  }else{
				$(".layer_popup1").stop().animate({"opacity":0},300,function(){
				  $(this).css("display","none");
				});
			  }//if
		});
       layerBoxOffset(id,x,y);
       return false;
    });

function typeArticle(idx,stype) {
	//alert(idx+" : "+stype);
		$.ajax({
			type:"POST",
			url:"__skintype_update.php",
			dataType:"JSON",
			data:{"idx":idx,"stype":stype},
			success: function(data) {
				if (data.cnt > 0) {
					//alert("변경되었습니다..");
					//location.href="?at=list";
					//location.reload();
				}
				else{
					alert("변경할 수 없습니다.");
				}
			},
			error: function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			}
		});

}

</script>
<? include "../../inc/bot.php"; ?>