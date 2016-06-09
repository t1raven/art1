
					<?php 
					if( $total_cnt > 0){ echo $pageUtil->attr[pageHtml];
					?>
					<script>
					$(".paginate").css("margin-bottom","40px");
					</script>
					<?php
					}
					?>
					<?//=$pageUtil->attr[pageHtml]?>
				
				</div>
			</div>

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
