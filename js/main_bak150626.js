  var win = $(window);
  var WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  var tbox = $(".testBox").css("display","none");
  var mainTimeOutSet; // Interval :: iCutter , dotdotdot
  var _currentScrollTop=0;
  var halfOri = 340;
  var article1Top,article2Top ,article3Top, article4Top,article5Top,article6Top;
  var article1TopFlag=false,article2TopFlag=false ,article3TopFlag=false, article4TopFlag=false,article5TopFlag=false,article6TopFlag=false;
  var half1,half2,half3,half5,half6;
  var tabScroll;
  var sidemyScroll;


//스크롤시 비주얼 모션
  function onPageMotion(){
    $(".on-page").each(function(){
       var bg = $(this).find(".bg-overay");
       var offsetTop = $(this).offset().top;
       var scrollT = $(this).scrollTop();
       if(!$(this).hasClass("n2")){
            bg.css({ top:((_currentScrollTop-offsetTop) / 10) * 4.2});
        }
      });
  }



var winsetTime;
var article1Top =  0;
var article2Top =  $('#News').offset().top;
var article3Top =  $('#Archive').offset().top;
//var article4Top =  $('#Sponsorship').offset().top;
var article5Top =  $('#Exhibition').offset().top;
var article6Top =  $('#arthongsSNS').offset().top;


 function activeNav(){
   var top = $(document).scrollTop();
   var wwidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
   var wheight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
   article1Top =  0;
   article2Top =  $('#News').offset().top;
   article3Top =  $('#Archive').offset().top;
   //article4Top =  $('#Sponsorship').offset().top;
   article5Top =  $('#Exhibition').offset().top;
   article6Top =  $('#arthongsSNS').offset().top;
   if(wheight > 920){
      if(wwidth > 1024 ){
      //con("activeNavTop:::::::"+top);
      clearInterval(winsetTime);
        winsetTime = setTimeout(function(){
          if( top > article1Top && top < 399 ){
		  
            $("html , body").animate({scrollTop:article1Top},700,"easeInOutQuint"); 
            //con("최상단:::::::"+article1Top);
          }
          else if( top > 400  && top < article3Top - 399  ){
              $("html , body").animate({scrollTop:article2Top-70},700,"easeInOutQuint"); 
              //con("news:::::::"+article2Top);
          }
 //         else if( top > article3Top - 400 && top < article4Top - 399 ){
      //        $("html , body").animate({scrollTop:article3Top-60},700,"easeInOutQuint"); 
        //       //con("market:::::::"+article3Top);
     //     }
           else if( top > article3Top - 400 && top < article5Top - 399 ){
              $("html , body").animate({scrollTop:article3Top-70},700,"easeInOutQuint"); 

                //con("award:::::::"+article4Top);
          }
           else if( top > article5Top - 400 && top < article6Top - 399 ){
              $("html , body").animate({scrollTop:article5Top-70},700,"easeInOutQuint"); 
              //con("preview:::::::"+article5Top);
          }  

          else if( top > article6Top - 400){
              $("html , body").animate({scrollTop:article6Top-70},700,"easeInOutQuint"); 
              //con("preview:::::::"+article6Top);
                
         }  
        },200)
      }//if
    }//if
};//activeNav


// 사이드 이동 및 고정 함수
 function sideOver(){
     if( _currentScrollTop >= 0 &&  _currentScrollTop < article2Top - halfOri ){
          if(!article1TopFlag){

            if($('#sideNav>ul>li>a.active').length > 0){
              $('#sideNav>ul>li>a.active').find("img")
              .attr("src",$('#sideNav>ul>li>a.active').find("img").attr("src").split("_on").join("_off"))
              .end().removeClass("active");
            }//if

            $('#sideNav>ul>li>a.s1').addClass('active').find("img")
            .attr("src",$('#sideNav>ul>li>a.s1').find("img").attr("src").split("_off").join("_on"));
          }

          article1TopFlag = true;
          article2TopFlag = false;
          article3TopFlag = false;
          article4TopFlag = false;
          article5TopFlag = false;
          article6TopFlag = false;
       }

        if( _currentScrollTop > article2Top - halfOri &&  _currentScrollTop < article3Top - halfOri ){
          if(!article2TopFlag){
            if($('#sideNav>ul>li>a.active').length > 0){
              $('#sideNav>ul>li>a.active').find("img")
              .attr("src",$('#sideNav>ul>li>a.active').find("img").attr("src").split("_on").join("_off"))
              .end().removeClass("active");
            }//if
            $('#sideNav>ul>li>a.s2').addClass('active').find("img").attr("src",$('#sideNav>ul>li>a.s2').find("img").attr("src").split("_off").join("_on"));
          }//if
          article1TopFlag = false;
          article2TopFlag = true;
          article3TopFlag = false;
          article4TopFlag = false;
          article5TopFlag = false;
          article6TopFlag = false;
       }//if


        if( _currentScrollTop > article3Top - halfOri &&  _currentScrollTop < article5Top - halfOri ){
          if(!article3TopFlag){
           if($('#sideNav>ul>li>a.active').length > 0){
              $('#sideNav>ul>li>a.active').find("img")
              .attr("src",$('#sideNav>ul>li>a.active').find("img").attr("src").split("_on").join("_off"))
              .end().removeClass("active");
            }//if
          $('#sideNav>ul>li>a.s3').addClass('active').find("img").attr("src",$('#sideNav>ul>li>a.s3').find("img").attr("src").split("_off").join("_on"));
          }//if
          article1TopFlag = false;
          article2TopFlag = false;
          article3TopFlag = true;
          article4TopFlag = false;
          article5TopFlag = false;
          article6TopFlag = false;
       }//if

     /*   if( _currentScrollTop > article4Top - halfOri &&  _currentScrollTop < article5Top - halfOri ){
          if(!article4TopFlag){
           if($('#sideNav>ul>li>a.active').length > 0){
              $('#sideNav>ul>li>a.active').find("img")
              .attr("src",$('#sideNav>ul>li>a.active').find("img").attr("src").split("_on").join("_off"))
              .end().removeClass("active");
            }//if
          $('#sideNav>ul>li>a.s4').addClass('active').find("img").attr("src",$('#sideNav>ul>li>a.s4').find("img").attr("src").split("_off").join("_on"));
          }//if
          article1TopFlag = false;
          article2TopFlag = false;
          article3TopFlag = false;
          article4TopFlag = true;
          article5TopFlag = false;
          article6TopFlag = false;
       }//if*/

       if( _currentScrollTop > article5Top - halfOri &&  _currentScrollTop < article6Top - 100 ){
         if(!article5TopFlag){
          if($('#sideNav>ul>li>a.active').length > 0){
              $('#sideNav>ul>li>a.active').find("img")
              .attr("src",$('#sideNav>ul>li>a.active').find("img").attr("src").split("_on").join("_off"))
              .end().removeClass("active");
            }//if
          $('#sideNav>ul>li>a.s5').addClass('active').find("img").attr("src",$('#sideNav>ul>li>a.s5').find("img").attr("src").split("_off").join("_on"));
          }//if
          article1TopFlag = false;
          article2TopFlag = false;
          article3TopFlag = false;
          article4TopFlag = false;
          article5TopFlag = true;
          article6TopFlag = false;
       }//if

        if( _currentScrollTop > article6Top - halfOri ){
         if(!article5TopFlag){
         if($('#sideNav>ul>li>a.active').length > 0){
              $('#sideNav>ul>li>a.active').find("img")
              .attr("src",$('#sideNav>ul>li>a.active').find("img").attr("src").split("_on").join("_off"))
              .end().removeClass("active");
            }//if
          $('#sideNav>ul>li>a.s6').addClass('active').find("img").attr("src",$('#sideNav>ul>li>a.s5').find("img").attr("src").split("_off").join("_on"));
          }//if
          article1TopFlag = false;
          article2TopFlag = false;
          article3TopFlag = false;
          article4TopFlag = false;
          article5TopFlag = false;
          article6TopFlag = true;
       }//if

  }//sideOver


 //**************************************** art1 ****************************************
function lstMovMotion(obj){
  var o = $(obj);
  o.each(function(){
    var $this  = $(this);
    function mouseEnter(e){
      var elemt = $(this);
      var cont = elemt.find(".cont");
      var cover = elemt.find(".cover");
      var play = elemt.find(".play");
      var share = elemt.find(".share");
      var photo = elemt.find(".movimg");
      var speed = 300;
      fadePlayMotion(play , true , speed);
      fadePlayMotion(share , true , speed);
      fadePlayMotion(cover , true , speed);
      cont.stop().animate({"margin-top":0},speed,"easeInOutCubic");
      if(is_touch_device()){
	      play.off('click');
	      share.on('click',function(){return false});
	      setTimeout(function(){
	      	play.on('click',mouseClick);
	      	share.off('click');
	      },speed);
      }
      // if(Modernizr.csstransforms) photo.stop().animate({"transform": "scale(1.2)"},1000);
    }

    function mouseLeave(){
      var elemt = $(this);
      var cont = elemt.find(".cont");
      var cover = elemt.find(".cover");
      var play = elemt.find(".play");
      var share = elemt.find(".share");
      var photo = elemt.find(".movimg");
      var speed = 300;
      fadePlayMotion(play , false , speed);
      fadePlayMotion(share , false , speed);
      fadePlayMotion(cover , false , speed);
      cont.stop().animate({"margin-top":-80},speed,"easeOutCubic");
      // if(Modernizr.csstransforms) photo.stop().animate({"transform": "scale(1)"},100);
    }

    function mouseClick(e){
        e.preventDefault();
        openMovPop();
        movStartNum = $($this).data('idx');
        if(isie7 || isie8){
           itemIeMotion(movStartNum, $this);   

        }else{
          itemMotion(movStartNum, false ,$this);    
        }
    }
    $this.on("mouseenter",mouseEnter);
    $this.on("mouseleave",mouseLeave);
    $this.find(".play").on("click",mouseClick);
  });

}//lstMovMotion

function lstMovMotion2(obj){
  var o = $(obj);
  o.each(function(){
    var $this  = $(this);
    function mouseEnter(){
      var elemt = $(this);
      var cont = elemt.find(".cont");
      var cover = elemt.find(".cover");
      var speed = 300;
      fadePlayMotion(cover , true , speed);
      fadePlayMotion(cont , true , speed);

    }
    function mouseLeave(){
      var elemt = $(this);
      var cont = elemt.find(".cont");
      var cover = elemt.find(".cover");
      var speed = 300;
      fadePlayMotion(cover , false , speed);
      fadePlayMotion(cont , false , speed);

    }
    $this.on("mouseenter",mouseEnter);
    $this.on("mouseleave",mouseLeave);
  });

}//lstMovMotion2

//**************************************** //art1  ****************************************


//**************************************** News ****************************************
  /*탭/셀렉터 변환*/
      function tabTransformation(num,t){
        var transType1Flag = false;
        var transType2Flag = false;
        var tabArea = $('.tabList');
        var tabHeadline = tabArea.find('.h_tab');
        var tabLst = tabArea.find(">ul");
        if(num > 0) tabLst.find("> li:eq("+(num-1)+")").addClass("on");
        if(num > 0) tabHeadline.find("button").text(tabLst.find("> li:eq("+(num-1)+") >a").text());

     /*   tabHeadline.on("click",function(){
          if(tabLst.css("display") == "block"){
            $(this).removeClass("on");
            tabLst.slideUp(300);
          }else{
            $(this).addClass("on");
            tabLst.slideDown(300);
          }

        });

        tabArea.on("mouseleave",function(){
          if(tabHeadline.hasClass("on")){
            tabHeadline.removeClass("on");
            tabLst.slideUp(300);
          }

        });*/

      function motion(num){
          //tabHeadline.find("button").text(tabLst.find("> li:eq("+num+") >  a").text());
      }//ajaxStart


        function tabResize(){
          var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
          if(width >  1023){
             transType1();
            }else{
             transType2();
               if(sidemyScroll != undefined) {
                sidemyScroll.refresh();
               }
            }

          function transType1(){
            if(!transType1Flag){
              //width >  1080
              //tabLst.css("display","block");

            }//if
            transType1Flag = true;
            transType2Flag = false;
          }

            function transType2(){
            if(!transType2Flag){
              //width <  1080
              //tabLst.css("display","none");



            }//if
            transType1Flag = false;
            transType2Flag = true;
          }

        }
      
        $(window).on("resize",tabResize);
        tabResize();
      }//tabTransformation
       tabTransformation(1)



/*var pos = $("#nav_dep2 > ul > li.on").position().left;
      sidemyScroll.scrollTo(-(pos),0,0 ); */




        function newsZone(){
          var $obj = $("#News");
          var $btns = $obj.find(".tabList>ul>li>a");
          var $container = $obj.find(".NewCont_inner");
          var link = $obj.find(".tabList>ul>li:eq(0)>a").attr("href");

          ajaxData();


          function btnClick(e){
                e.preventDefault();
                if(!$(this).parent().hasClass("on")){
                  $obj.find(".tabList>ul>li.on").removeClass("on");
                  $(this).parent().addClass("on")
                  link = $(this).attr("href");
                  ajaxData();
                }

          }//btnClick

          function ajaxData(){
                  $.ajax({
                   type:"GET",
                   url:link,
                   ansync : false,
                   dataType:"html",
                   success : function(data) {
                        var $container2;
                          //console.log("ajax 시작");
                          $container.children().remove();
                          $("<div id='tmpData'></div>").html(data).appendTo($container);
                          var data2 = $container.find("#tmpData").html();
                            $container.append(data2);
                            $("#tmpData").remove();
                           var imgLoad = imagesLoaded( $container );
                           /*$container.find("li").css("opacity",0);*/
                            imgLoad.on( 'always', onAlways );
                          function onAlways( instance ) {
                            /*if(Modernizr.opacity){
                              for (var i = 0; i < $container.find("li").length; i++) {
                                   $container.find("li:eq("+i+")").stop().delay(100*i).animate({
                                      "opacity":1
                                     },500)
                                }*/
                            //}

                            //iCutterLoadNoneTopMargin("#News .Broad_inner .show > ul > li > .item");
                            //dotWindow("#News .Broad_inner .show > ul > li > .cont h2 , #News .Broad_inner .lst_show > div.lst ul > li > .cont p a.ti ");
                            iCutterLoadNoneTopMargin("#NewsArea2 .media_inner > .media_line ul > li .item");
                             dotWindow("#NewsArea2 .media_inner > .media_line ul > li .cont h2 , #NewsArea2 .media_inner > .media_line ul > li .cont p" , "window");


                          };/*//onAlways*/


                   },
                   complete : function(data) {

                   },
                   error : function(xhr, status, error) {
                    alert(error);
                    //$container.children().remove();
                    $('<p class="noProduct">상품이 존재하지 않습니다.</p>').appendTo($pos);

                   }
              });
          };//ajaxData
          $btns.on("click",btnClick);
        }//newsZone


//**************************************** //News ****************************************


//**************************************** //Market ****************************************
          function marketZone(){
            var $container_cen = $(".Archive_inner > .archive_cont > ul");
            var $container_cen_1 = $(".Archive_inner > .archive_cont.box1 > ul");
            var $container_cen_2 = $(".Archive_inner > .archive_cont.box2 > ul");
            var $prev =$("#Archive .prev");
            var $next =$("#Archive .next");
            var move = 199; // 이동 크기
            var margin = 16;
            var exposure = 6; //노출된 갯수
            var side = 2; // 커버아래 갯수
            var pageNum = 0; //현제 페이지 넘버
            var proNum = 70; //불러오는 작품 갯수
            var oriTotalNum = Math.round($container_cen.parent().outerWidth() / move);
            var totalNum = oriTotalNum - exposure;
            var motionTime;
            var WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            var $mask = $(".Archive_inner");
            var maskBoxSize = $mask.outerWidth();
            var prevMaskBoxSIze = 0;
            


             function boxTransPrev(){
                totalNum = oriTotalNum - exposure;
                // con("market:::: pageNum::::  " + pageNum);  
                // con("market:::: totalNum + exposure::::  " + (totalNum + exposure));  
                /*con("market:::: exposure::::  " + exposure);  */
                // con("market:::: side:::: " + side);  

                if(pageNum <= -( (totalNum + exposure) - side ) ){
                      
                       pageNum = pageNum + (totalNum+exposure); 
                      //con("pageNum::::::::" + pageNum);
                      var box1Left = $(".Archive_inner > .archive_cont.box2").css("left");
                      var box2Left =  parseInt( $container_cen_1.parent().css("left") +  (move * exposure) ) -  $container_cen_2.outerWidth();
                      $(".Archive_inner > .archive_cont.box1").css("left",box1Left) ; 
                      $(".Archive_inner > .archive_cont.box2").css("left",box2Left - $container_cen_2.outerWidth());  
                      
                   }else{

                        if(pageNum <= 0){
                        var moveSize =  move * exposure;
                        /*var box2Left = parseInt(  $container_cen_2.outerWidth() + (moveSize + margin)   );*/

                        var box2Left =  parseInt( $container_cen_1.parent().css("left") +  (move * exposure) ) -  $container_cen_2.outerWidth();

                        //con("market:::: box2 : left" + box2Left);    

                       $(".Archive_inner > .archive_cont.box2").css("left", box2Left ); 

                       

                    }

                   }

                
                //if(pageNum <= -( (totalNum + exposure) - side ) ){
                  
                       

            //   }



             }


            function boxTransNext(){
                totalNum = oriTotalNum - exposure;
                // con("market:::: pageNum::::  " + pageNum);  
                // con("market:::: totalNum::::  " + totalNum);  
                // con("market:::: exposure::::  " + exposure);  
                // con("market:::: side:::: " + side);  
                


              if(pageNum >= (totalNum - (exposure + side)) ){

                if(pageNum > totalNum){

                    pageNum = pageNum - (totalNum+exposure);
                    var box1Left = $(".Archive_inner > .archive_cont.box2").css("left");
                    var box2Left = $(".Archive_inner > .archive_cont.box1").css("left");
                    $(".Archive_inner > .archive_cont.box1").css("left",box1Left) ; 
                    $(".Archive_inner > .archive_cont.box2").css("left",box2Left );  
                  }else{
                    var box2Left = parseInt( $container_cen_1.parent().css("left") ) + ( $container_cen_1.parent().outerWidth( ));
                     //con("market:::: box1 : left" + box2Left);  
                     $(".Archive_inner > .archive_cont.box2").css("left", box2Left); 
                  }
              }


             /* if(pageNum > (totalNum - exposure) - side ){
                con("pageNum 값이("+pageNum+") ,,,, " + ((totalNum - exposure) - side) + "값보다 높을때." );  
                 
                  var box1Left = ( move * (totalNum-(side+2)) ) - margin;
                  var box2Left = -(( move * (totalNum-(side)) ) + margin);

                  pageNum = -(exposure + side);
                    con("market:::: 레이아웃 루트");  
                    con("market:::: box1 : left" + box1Left);  
                    con("market:::: box1 : left" + box2Left);  
                    $(".Archive_inner > .archive_cont.box1").css("left",box1Left) ;
                    $(".Archive_inner > .archive_cont.box2").css("left", box2Left); 

              }else if(pageNum <= - ( oriTotalNum - side) ){

                  var box1Left = - (( move * side ) + margin);
                  var box2Left = -( ((oriTotalNum + side) *  move)  + (margin * side) ) ;

                  pageNum = side;
                  con("market:::: 레이아웃 루트");  
                  con("market:::: box1 : left" + box1Left);  
                  con("market:::: box1 : left" + box2Left);  
                  $(".Archive_inner > .archive_cont.box1").css("left",box1Left) ;
                  $(".Archive_inner > .archive_cont.box2").css("left", box2Left);  
              }//if*/

            };

              function resize(){
                WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
                maskBoxSize = $mask.outerWidth();
                //console.log("마스크사이즈 :::::"+maskBoxSize);
                //console.log("이전 마스크사이즈 :::::"+prevMaskBoxSIze);
                //console.log(maskBoxSize / boxSize);
                //con("wefdfafqawefqfqfwfefwef ::::::::::::::::::: "+ WinWdith +"::::::::::::"+  exposure);     
                 if(WinWdith > 1440){
                          exposure = 6
                     }else if(WinWdith <= 1440 && WinWdith > 1024  ){
                          exposure = 4
                     }else if(WinWdith <= 1023 && WinWdith > 760  ){
                          exposure = 3 
                    }else if(WinWdith <= 760  ){
                        exposure = 2 
                    }

                if(maskBoxSize != prevMaskBoxSIze ){
                   //con("market:::::사이즈 변동");



                    if(WinWdith < 1024){
                        //exposure = 5; //노출된 갯수
                       // side = 1; // 커버아래 갯수\
                        proNum = 60; //불러오는 작품 갯수
                       // oriTotalNum = Math.round($container_cen.parent().outerWidth() / move);
                        //totalNum = oriTotalNum - exposure;
                        // con("market:::::사이즈 변동 1023이하");     
                        // con("market::::: oriTotalNum :::" + oriTotalNum);    
                        // con("market::::: totalNum :::" + totalNum);    
                        pageNum = 0;
                        if($container_cen_1.find("li").length > 0){
                          //isotopereLoad()
                        }
                        
                    }else{
                      // con("market:::::사이즈 변동 1023이상");     
                      // con("market::::: oriTotalNum :::" + oriTotalNum);    
                      // con("market::::: totalNum :::" + totalNum);    
                     // exposure = 6; //노출된 갯수
                   //   side = 2; // 커버아래 갯수
                      proNum = 60; //불러오는 작품 갯수
                   //   oriTotalNum = Math.round($container_cen.parent().outerWidth() / move);
                   //   totalNum = oriTotalNum - exposure;
                      pageNum = 0;
                      if($container_cen_1.find("li").length > 0){
                         // isotopereLoad()
                        }
                    }
                    if($("#Archive").find(".pageing").length == 0){
                      pageingArea($("#Archive"),oriTotalNum);
                    }

                    if(WinWdith < 1024){
                      ovrNum = 3;
                    }else if(WinWdith < 960 && WinWdith > 760){
                        ovrNum = 3;
                    }else if(WinWdith > 760){
                      ovrNum = 2;
                    } 
                    
                    prevMaskBoxSIze = maskBoxSize;
                }//사이즈 변동
                con( Math.ceil( WinWdith / (move + margin) )  , "market::Pageing노출값:::::");
                pageingOvrMotion($("#Archive"), pageNum ,  Math.ceil( WinWdith / (move + margin) )  , oriTotalNum)
                pageingResizeMotion($("#Archive"),1024);
             }//resize

             resize();
             $(window).resize(function(){resize()});

             function sortMotion(){
               if(!$(this).hasClass("on")){
                    $('#Archive .sort > button.on').removeClass("on");
                    $(this).addClass("on");
                  }
                var filterValue = $(this).attr('data-filter');
                $container_cen_1.isotope({ filter: filterValue });
                $container_cen_2.isotope({ filter: filterValue });
                

             }

             function mouseEnter(){
                var elemt = $(this);
                var cover = elemt.find(".spec");
                var photo = elemt.find(".item img");
                var speed = 300;
                fadePlayMotion(cover , true , speed);
                if(Modernizr.csstransforms) photo.stop().animate({"transform": "scale(1.1)"},700);
              }

              function mouseLeave(){
                var elemt = $(this);
                var cover = elemt.find(".spec");
                var photo = elemt.find(".item img");
                var speed = 300;
                fadePlayMotion(cover , false , speed);
                if(Modernizr.csstransforms) photo.stop().animate({"transform": "scale(1)"},700);

              }

              $mask.swipe( {
                //Generic swipe handler for all directions
                swipeLeft:function(event, direction, distance, duration, fingerCount) {
                 nextMotion()
                 
                },
                 swipeRight:function(event, direction, distance, duration, fingerCount) {
                 prevMotion()
                },
                excludedElements:".noSwipe",
                threshold:80
              });


             function prevMotion(){
                if(!$container_cen.parent().is(":animated")){
                    //con("모션박스 옵셋값  ::" + $container_cen.offset().left);
                    //con("Archive_inner 옵셋값  ::" + $(".Archive_inner").offset().left);
                   // if($container_cen.offset().left < $(".Archive_inner").offset().left){
                        // con("markre:::perv");
                        // con("markre:::현재 노출값"+ exposure);
                        pageNum =  pageNum - exposure;
                        boxTransPrev();  

                        $container_cen.parent().stop().animate({"left": "+="+(move * exposure)  },300,"easeInQuad",function(){
                           clearTimeout(motionTime);
                            motionTime = setTimeout(function(){
                              //pageNum --;   
                               
                              
                              
                              pageingOvrMotion($("#Archive"), pageNum ,  Math.ceil( WinWdith / (move + margin) )  , oriTotalNum)
                            },50);
                            
                        });
                        
                     
                     // }
                     
                     
                }

             }


             function nextMotion(){
                if(!$container_cen.parent().is(":animated")){
                   //con("모션박스 옵셋값  ::" + $container_cen.offset().left);
                  //con("Archive_inner 옵셋값  ::" + $(".Archive_inner").offset().left);
                  //if($container_cen.offset().left < $(".Archive_inner").offset().left){
                          
                      // con("markre:::next");
                      // con("markre:::현재 노출값"+ exposure);
                      
                      $container_cen.parent().stop().animate({"left": "-="+(move * exposure)   },300,"easeInQuad",function(){
                          clearTimeout(motionTime);
                          motionTime = setTimeout(function(){
                            //pageNum ++;    
                            pageNum  = pageNum + exposure  ;
                           boxTransNext();  
                            pageingOvrMotion($("#Archive"), pageNum ,  Math.ceil( WinWdith / (move + margin) )  , oriTotalNum)
                          },50);
                            
                        });
                       

                    //}
                    
                    
                }

             }



            function ajaxCenterData()
            {
               $.ajax({
                   type:"GET",
                   url:"ajax_marketlist_mobile.php",
                   ansync : false,
                   dataType:"html",
                    data:{"ea":proNum},
                   success : function(data) {
                        $container_cen.children().remove();
                          $("<div id='tmpData'></div>").html(data).appendTo($container_cen);
                          var data2 = $container_cen.find("#tmpData").html();
                          var $container_cen_1 = $(".Archive_inner > .archive_cont.box1 > ul");
                          var $container_cen_2 = $(".Archive_inner > .archive_cont.box2 > ul");
                          $container_cen.append(data2);
                          $container_cen.find("#tmpData").remove();
                          var imgLoad = imagesLoaded( $container_cen );
                          function onAlways( instance ) {
                            $container_cen.find("img").fadeIn( 2000);
                                
                                $('#Archive .sort').off().on( 'click', 'button', sortMotion);
                                iCutterLoadNone("#Archive .Archive_inner .archive_cont ul > li .item");
                                $prev.off().on( 'click', prevMotion);
                                $next.off().on( 'click', nextMotion);
                                $container_cen.find(">li").off().on("mouseenter",mouseEnter).on("mouseleave",mouseLeave);
                                
                                $container_cen_1.isotope({
                                   itemSelector: 'li',
                                   transitionDuration:"0.8s"
                                });
                               
                                setTimeout(function(){
                                   $container_cen_2.isotope({
                                     itemSelector: 'li',
                                     transitionDuration:"0.8s"
                                  });
                                  $("#Archive .Archive_inner .archive_cont.box1").css("left",-margin);
                                  $("#Archive .Archive_inner .archive_cont.box2").css("left",-($container_cen.parent().outerWidth() +margin ));  
                                },300);

                          };
                          imgLoad.on( 'always', onAlways );
                   },
                   complete : function(data) {

                   },
                   error : function(xhr, status, error) {
                    alert(error);
                   }
              });
            }//ajaxCenterData
            ajaxCenterData();

             function isotopereLoad()
            {
               $.ajax({
                   type:"GET",
                   url:"ajax_marketlist_mobile.php",
                   ansync : false,
                   dataType:"html",
                    data:{"ea":proNum},
                   success : function(data) {
                          $("<div id='tmpData'></div>").html(data).appendTo($container_cen);
                          var data2 = $container_cen.find("#tmpData").html();
                          $container_cen.append(data2);
                          $container_cen.find("#tmpData").remove();
                          var imgLoad = imagesLoaded( $container_cen );
                          function onAlways( instance ) {
                                iCutterLoadNone("#Archive .Archive_inner .archive_cont ul > li .item");
                                $container_cen.find(">li").off().on("mouseenter",mouseEnter).on("mouseleave",mouseLeave);
                                /*$container_cen_1.isotope('insert',data2);
                                $container_cen_1.isotope('layout');
                                //$container_cen_1.isotope('insert',data2);
                                $container_cen_1.isotope('remove', $container_cen_1.find("li"));
                                $container_cen_2.isotope("remove", $container_cen_2.find("li"));*/
                                $container_cen_1.isotope('remove', $container_cen_1.find("li")).isotope('appended',data2).isotope('layout');
                          $container_cen_2.isotope("remove", $container_cen_2.find("li")).isotope('appended',data2).isotope('layout');
                                  $("#Archive .Archive_inner .archive_cont.box1").css("left",-margin);
                                  $("#Archive .Archive_inner .archive_cont.box2").css("left",-($container_cen.parent().outerWidth() +margin ));  
                          };
                          imgLoad.on( 'always', onAlways );
                   },
                   complete : function(data) {

                   },
                   error : function(xhr, status, error) {
                    alert(error);
                   }
              });
            }//isotopereLoad

          }//marketZone

//**************************************** //Market ****************************************

//**************************************** Award ****************************************

function awardClock(){
    // Grab the current date
    var currentDate = new Date();

    // Set some date in the future. In this case, it's always Jan 1
    // // 미래의 어떤 날짜를 설정합니다. 이 경우, 항상 1월 1일있어
    var futureDate  = new Date(currentDate.getFullYear() + 0, 11, 11);

    // Calculate the difference in seconds between the future and current date
    // 미래와 현재 날짜 사이의 시간 (초)의 차이를 계산
    var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

    // Instantiate a coutdown FlipClock
    clock = $('.clock').FlipClock(diff, {
      clockFace: 'DailyCounter',
      countdown: true,
      showSeconds: false
    });
}
//**************************************** //Award ****************************************




//**************************************** SOCIAL ****************************************

 //공유하기
  $("#arthongsSNS > .title_main > button").on("click",function(){
    var child = $("#arthongsSNS .share > li");
      forFade(child,(child.css("display") == "none") ? true : false);
  });
  //공유하기 버튼 오버
  $(".share > li  button").on("mouseenter mouseleave",function(e){
      $(this).find("img").imgConversion((e.type == "mouseenter") ? true : false);
  });

  function snsZone(){
    var $obj = $("#arthongsSNS");
    var $mask = $("#arthongsSNS .sns_inner"); //마스크박스
    var $pos = $mask.find(".sns_cont");
    var $prev = $obj.find(".prev");
    var $next = $obj.find(".next");
    var boxSize = $pos.find("> article.facebook").width();
    var boxmargin = 14;
    var totalBoxSize = boxSize + boxmargin;
    var exp = 0; // 노출되는 갯수
    var total = 3; //배너 갯수
    var pageNum = 0; //현제 페이지
    var wideMode = false , mobileMode = false;
    var pageTotal = 0;
    var maskBoxSize = $mask.outerWidth();
    var prevMaskBoxSIze = 0;

    pageingArea($mask,total);
    resize();





     function resize(){
        boxSize = $pos.find("> article.facebook").width();
        maskBoxSize = $mask.outerWidth();
        totalBoxSize = boxSize + boxmargin;
        /*con(maskBoxSize,"SNS::::마스크사이즈");
        con(prevMaskBoxSIze,"SNS::::마스크사이즈");*/
        if(maskBoxSize != prevMaskBoxSIze ){
          exp =  parseInt(maskBoxSize / totalBoxSize);
          pageTotal = total -  exp;
          prevMaskBoxSIze = maskBoxSize;
          pageingMotion()
          pageNum = 0;
          $pos.animate({"left":0 },300,"swing");
        /*  con("SNS::::사이즈 변동");
          con(exp,"SNS::::노출된 배너수");  
          con(pageTotal,"SNS::::숨겨진 배너갯수");*/
        }
        pageingResizeMotion($mask,1024);
        pageingOvrMotion($mask , pageNum ,exp , total)

     }//resize


    function pageingMotion(){
      if(exp < total){
          $next.css("display",(pageTotal > pageNum) ? "block" : "none");
          $prev.css("display",(0 >= pageNum) ? "none" : "block");
        }else{
          $next.css("display","none");
          $prev.css("display","none");
        }
        pageingOvrMotion($mask , pageNum ,exp , total)
     }//pageingMotion

     function posMotion(pageNum){
     $pos.animate({"left": -(totalBoxSize * pageNum) },300,"swing");
      pageingMotion();
     }//posMotion


     $mask.swipe( {
          //Generic swipe handler for all directions
          swipeLeft:function(event, direction, distance, duration, fingerCount) {
           tbox.text("You swiped " + direction + "  times " ); 
             if(!$pos.is(":animated")){
                pageNum = (pageNum >= pageTotal) ? 0 : pageNum + 1;
                posMotion(pageNum);
                pageingOvrMotion($mask , pageNum ,exp , total)
             }
           
          },
           swipeRight:function(event, direction, distance, duration, fingerCount) {
           tbox.text("You swiped " + direction + "  times " ); 
             if(!$pos.is(":animated")){
                pageNum = (pageNum <= 0) ? pageTotal : pageNum - 1;
                posMotion(pageNum);
                pageingOvrMotion($mask , pageNum ,exp , total)
              };
          },
          excludedElements:".noSwipe",
          threshold:80
        });

      $next.on("click",function(){
        if(!$pos.is(":animated")){
            pageNum = (pageNum > pageTotal) ? pageTotal : pageNum + 1;
            posMotion(pageNum);
            pageingOvrMotion($mask , pageNum ,exp , total)
         }

      });

      $prev.on("click",function(){
          if(!$pos.is(":animated")){
            pageNum = (pageNum <= 0) ? 0 : pageNum - 1;
            posMotion(pageNum);
            pageingOvrMotion($mask , pageNum ,exp , total)
          };
      });




     $(window).resize(function(){resize()});
  }//snsZone


//**************************************** //SOCIAL ****************************************




//이미지 리사이징
iCutter("#News .Broad_inner .show > ul > li > .item");
//절사
dotWindow("#News .Broad_inner .show > ul > li > .cont h2 , #News .Broad_inner .lst_show > div.lst ul > li > .cont p a.ti" , "window");
//뉴스
newsZone();   
//마켓
marketZone();
//preview
bannerZone();    
//social
snsZone();
//파일업로더
initFileUploads();

$(function(){
  
    //뉴스레터
  //  if(WinWdith > 640){
      
    //}
  newsletter();     
  //awardClock();  
  lstMovMotion("#sect1 .lst_mov > .lst > li");
  
})



win.resize(function(){
  WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  clearInterval(mainTimeOutSet);
  mainTimeOutSet = setTimeout(function(){
      iCutterLoadNone("#News .Broad_inner .show > ul > li > .item");
      dotWindow(".bbs_thumb_t6 .lst .cont .txt" , "window");
      updatePosition();
  },1000);
});//resize
     
win.scroll(function(event){
    var top = win.scrollTop() + win.height();
    _currentScrollTop=$(window).scrollTop();


    offSetcheck(".motion-check" ,top);
    sideOver();
    activeNav();
});//scroll


win.load(function(){
   WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
   article1Top =  0;
   article2Top =  $('#News').offset().top;
   article3Top =  $('#Archive').offset().top;
  // article4Top =  $('#Sponsorship').offset().top;
   article5Top =  $('#Exhibition').offset().top;
   article6Top =  $('#arthongsSNS').offset().top;
   half1 = 0;
   half2 = article2Top - 600;
   half3 = article3Top - 500;
  // half4 = article4Top - 100;
   half5 = article5Top - 370;
    $("#sideNav").on("mouseenter mouseleave",function(e){
        if(e.type == "mouseenter"){
          $(this).stop().animate({"width":120},300,"easeOutExpo");
          $(this).find("p").css("left",19);
        }else{
          $(this).stop().animate({"width":40},300,"easeOutExpo");
          $(this).find("p").css("left",43);
        }
    }).find(">ul>li>a").on("click",function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top-65}, 1500, 'easeInOutQuint');
    });

  sideOver();

      sidemyScroll = new IScroll('.tabList', { 
        scrollX: true, 
        scrollY: false,
        mouseWheel: true ,
        preventDefault: false
      });

      sidemyScroll.on('scrollEnd', updatePosition);
      sidemyScroll.on('scroll', updatePosition);

      updatePosition();
      


      
      
  
});//load

  function updatePosition(){
    var xsize = (xsize == NaN) ? 0 : Math.abs(this.x);
    con("xsize:::"+xsize);
    var $this = $(".tabList");
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




 





    function offSetcheck(obj , top){
      if(isie8 || isie7){return};
      var o = $(obj),
      win = $(window),
      doc = $(document),
        step = self.step,
        speed = self.speed,
        viewport = win.height(),
        body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html'),
        wheel = false;
          o.each(function(index){
            //윈도우 크기 +
            var antTop = $(this).offset().top;
            var startPoint = antTop - 30;
            if(viewport < antTop ){
              if(startPoint > top){
                    if(!offSetcheckFlag[index]){
                      //console.log(index+"번째"+" 진입전");
                    }
                    offSetcheckFlag[index] = true;
                  }else{
                    if(offSetcheckFlag[index]){
                      //console.log(index+"번째"+"진입후");

                    }//if
                    offSetcheckFlag[index] = false;
                  }//startPoint

                }

          });//each
        }//offSetcheck

  
  var offSetcheckFlag = new Array();
  for (var i = 0; i < $(".motion-check").length; i++) {
      offSetcheckFlag[i] = false;
  }


function showToolTip(me){
	var $this = $(me).find(".toolTip");
	$this.css('visibility','visible'); 
	if(!isie8 || !isie7){
		$this.stop().animate({opacity:1},100);
	}
}

function hideToolTip(me){
	var $this = $(me).find(".toolTip");
	if(!isie8 || !isie7){
		$this.stop().animate({opacity:0},100,function(){
		$this.css('visibility','hidden');
	});
	}else{
		$this.css('visibility','hidden');
	}
	
}

function is_touch_device() {
	return (('ontouchstart' in window) || (navigator.MaxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0));
}