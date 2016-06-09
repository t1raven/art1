<div class="tabBox n5">
	<ul>
		<li><a href="/galleries/about/?idx=<?php echo $idx; ?>">About</a></li>
		<li<?php if ($exhibitionsCnt === 0) : ?> style="display:none;"<?php endif ; ?>><a href="/galleries/exhibitions/?idx=<?php echo $idx; ?>">Exhibitions</a></li>
		<li<?php if ($artistsCnt === 0) : ?> style="display:none;"<?php endif ; ?>><a href="/galleries/artists/?idx=<?php echo $idx; ?>">Artists</a></li>
		<li<?php if ($artworksCnt === 0) : ?> style="display:none;"<?php endif ; ?>><a href="/galleries/artworks/?idx=<?php echo $idx; ?>">Artworks</a></li>
		<li<?php if ($newsCnt === 0) : ?> style="display:none;"<?php endif ; ?>><a href="/galleries/news/?idx=<?php echo $idx; ?>">News</a></li>
		<li<?php if ($artfairsCnt === 0) : ?> style="display:none;"<?php endif ; ?>><a href="/galleries/artfairs/?idx=<?php echo $idx; ?>">Art Fairs</a></li>
	</ul>
	<span class="prev" style="display: none;"><img src="/images/ico/ico_tabarr_lft.png" alt=""></span>
	<span class="next" style="display: none;"><img src="/images/ico/ico_tabarr_rgh.png" alt=""></span>
</div>
<script>
 var sidemyScroll;
 var tabSubNum = "<?=$subNum?>";
 $(".tabBox").find("li:eq("+(tabSubNum-1)+")").addClass("on");
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
    updatePosition();
    tabTransformationIscroll($(".tabBox > ul >li.on").index()+1);
    //if($(window).width() >= 639){
      sidemyScroll = new IScroll('.tabBox', {
          scrollX: true,
          scrollY: false,
          mouseWheel: true ,
          preventDefault: false
        });

        sidemyScroll.on('scrollEnd', updatePosition);
        sidemyScroll.on('scroll', updatePosition);
    //}
      
    
});
</script>
