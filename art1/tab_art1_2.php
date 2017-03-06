<div class="tabBox">
    <ul>
          <li><a href="artist_rec.php">Artist Rec</a></li>
          <li><a href="art_collabo.php">Art Collabo</a></li>
          <li class="black"><a href="space_art1.php">space art1</a></li>
          <li class="blue"><a href="media_art1.php">media art1</a></li>
          <li><a href="about_us.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
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