 <?php if (!defined('OKTOMATO')) exit; ?>
        </div>
      </div>

    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
<form name="goodsFrm" id="goodsFrm" method="post" onsubmit="return false;">
<input type="hidden" name="at" value="update">
<input type="hidden" name="ord" id="ord" value="basket">
<input type="hidden" name="goods" id="goods">
<input type="hidden" name="order_cnt" value="1">
</form>
<?php echo ACTION_IFRAME; ?>
 <script type="text/javascript">
      elemtAccordionMotion2(".table_dot");
      tabTransformation(1,"c");

      function tabMotion(o){
        var obj  = $(o);

        obj.each(function(){
          $this = $(this);
          var start = $this.data("start");
          var direction = $this.find(".prev , .next");
          var winSIze = window.innerWidth;
          var boxPos =$this.find(">ul");
          var boxChildren =  boxPos.find(">li");
          var total = boxChildren.length;
          var boxPosSIze = boxPos.outerWidth();
          var easeing = "swing";
          var nomal = false;
          var mobile1 = false;
          var mobile2 = false;




          function mainMotion(direction){

            if(!boxPos.is(":animated")){
              if(direction == "prev"){
                //'Scroll up'
              }else{//prev
                //'Scroll down'
              }//next
            }
          };//motion

           // 윈도우 바로 밖에 있는 메뉴 인덱스를 잡아낸다.
          function windowOutside(){
            winSIze = window.innerWidth;
            var index;
            for (var i = 0; i < boxChildren.length; i++) {
              var offset = boxChildren.filter(":eq("+i+")").offset().left;
              if(offset > winSIze){
                index =  boxChildren.filter(":eq("+i+")").index();
                return index;
              }
            };
          }


          function posMotion(b,num){
            if(!b){
              // 현재 오버값
              var index = boxChildren.filter(".on").index();
              //박스크기의 퍼센트 값을 잡는다.
              var s = (parseInt(boxPos.css("width")) / winSIze ) * 100;
              //박스 크기/전체메뉴 겟수 * 현제 오버 값 을 해서 이동할 값을 얻는다.
              var size = (s/total)* index;
              boxPos.css({"left":"-"+size+"%"});
            }else{
              //boxPos.animate({"left":-(lft)},300,easeing);
            }
          }//



           function directionClick(e){
              if ($(this).hasClass("prev")) {motion("prev");}else{motion("next");}
            }


          function dirctionDisplay(){
              if(boxChildren.filter(".on").index() == 0){
                    direction.filter(".prev").css("display","none");
                }else{
                    direction.filter(".prev").css("display","block");
                }

                if(boxChildren.filter(".on").index() == (total-1)){
                    direction.filter(".next").css("display","none");
                }else{
                    direction.filter(".next").css("display","block");
                }
          }


          function resizeMotion(){
            winSIze = window.innerWidth;
            boxPosSIze = boxPos.outerWidth();
              if(winSIze > 768 ){
                if(!nomal){

                }
                nomal = true;
                mobile1 = false;
                mobile2 = false;

              }else if(winSIze < 768 && winSIze > 768 ){
                if(!mobile1){
                  //posMotion(false);

                }
                 nomal = false;
                 mobile1 = true;
                 mobile2 = false;

              }else if(width < 480 && width > 320 ){
                if(!mobile2){
                  //posMotion(false);
                }
                nomal = false;
                mobile1 = false;
                mobile2 = true;
              }



          }//resizeMotion


          function init(){
             boxChildren.filter(":eq("+start+")").addClass("on");
             dirctionDisplay();
             posMotion(false);

            if(winSIze > boxPosSIze){

            }else{


            }///winSIze

            direction.on("click",directionClick);
            $(window).on("resize",resizeMotion);

          }//init

          init();


        })//each
      }//scrollMotion
      //tabMotion(".tabBox");


function addAddress() {
	location.href = "/member/address";
}

function order(idx) {
	$("#goods").val(idx);
	document.goodsFrm.target = "action_ifrm";
	document.goodsFrm.submit();
}

function rental(idx) {
	location.href = "/marketPlace/rental/index.php?goods="+idx;
}
</script>
<?php
include(ROOT.'inc/footer.php');
include(ROOT.'inc/bot.php');
?>