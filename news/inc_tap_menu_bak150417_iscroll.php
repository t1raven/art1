<?php
//뉴스 서브 메뉴 링크
?>
<div class="tabBox" style="margin-bottom: 50px;">
	<!-- <h3 class="h_tab"><button style="border-top:1px solid #ddd;">In brief</button></h3> -->
	<ul>
		<li class="<?php if($subm=='2') echo 'on' ; ?>"><a href="/news/?at=list&subm=2">In brief</a></li>
		<li class="<?php if($subm=='3') echo 'on' ; ?>"><a href="/news/?at=list&subm=3">Trend</a></li>
		<li class="<?php if($subm=='4') echo 'on' ; ?>"><a href="/news/?at=list&subm=4">People</a></li>
		<li class="<?php if($subm=='14') echo 'on' ; ?>"><a href="/news/?at=list&subm=14">World</a></li>
		<li class="<?php if($subm=='5') echo 'on' ; ?>"><a href="/news/?at=list&subm=5">Trouble</a></li>
		<li class="<?php if($subm=='6') echo 'on' ; ?>"><a href="/news/?at=list&subm=6">Episode</a></li>
		<li class="<?php if($subm=='') echo 'on' ; ?>"><a href="/bbs/?at=list">Community</a></li>
	</ul>
	<span class="prev" style="display: none;"><img src="/images/ico/ico_tabarr_lft.png" alt=""></span>
   <span class="next" style="display: none;"><img src="/images/ico/ico_tabarr_rgh.png" alt=""></span>
</div>
 <script>
 var sidemyScroll;
  function updatePosition(){
    var xsize = (xsize == NaN) ? 0 : Math.abs(this.x);
    con("xsize:::"+xsize);
    var $this = $(".tabBox");
    if($this.find(">ul").outerWidth() > $this.outerWidth()){
      if(xsize >= ($this.find(">ul").outerWidth() - $this.outerWidth() -10) ){
        $this.find(".next").css("display","none");
      }else{
        $this.find(".next").css("display","block");
      }

      if(xsize > 0){
         $this.find(".prev").css("display","block");
      }else{
        $this.find(".prev").css("display","none");
      }                  


   }else{
    $this.find(".prev , .next").css("display","none");
   }
}//updatePosition

 $(function(){
 	  sidemyScroll = new IScroll('.tabBox', { 
        scrollX: true, 
        scrollY: false,
        mouseWheel: true ,
        preventDefault: false
      });

      sidemyScroll.on('scrollEnd', updatePosition);
      sidemyScroll.on('scroll', updatePosition);

      updatePosition();
 		tabTransformationIscroll($(".tabBox > ul >li.on").index()+1);
 //   tabTransformation($(".tabBox > ul >li.on").index()+1,"d");
});
</script>