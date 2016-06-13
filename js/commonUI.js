/*
 *  jQuery dotdotdot 1.8.1
 *
 *  Copyright (c) Fred Heusschen
 *  www.frebsite.nl
 *
 *  Plugin website:
 *  dotdotdot.frebsite.nl
 *
 *  Licensed under the MIT license.
 *  http://en.wikipedia.org/wiki/MIT_License
 */
!function(t,e){function n(t,e,n){var r=t.children(),o=!1;t.empty();for(var i=0,d=r.length;d>i;i++){var l=r.eq(i);if(t.append(l),n&&t.append(n),a(t,e)){l.remove(),o=!0;break}n&&n.detach()}return o}function r(e,n,i,d,l){var s=!1,c="a, table, thead, tbody, tfoot, tr, col, colgroup, object, embed, param, ol, ul, dl, blockquote, select, optgroup, option, textarea, script, style",u="script, .dotdotdot-keep";return e.contents().detach().each(function(){var h=this,f=t(h);if("undefined"==typeof h)return!0;if(f.is(u))e.append(f);else{if(s)return!0;e.append(f),!l||f.is(d.after)||f.find(d.after).length||e[e.is(c)?"after":"append"](l),a(i,d)&&(s=3==h.nodeType?o(f,n,i,d,l):r(f,n,i,d,l)),s||l&&l.detach()}}),n.addClass("is-truncated"),s}function o(e,n,r,o,d){var c=e[0];if(!c)return!1;var h=s(c),f=-1!==h.indexOf(" ")?" ":"　",p="letter"==o.wrap?"":f,g=h.split(p),v=-1,w=-1,b=0,y=g.length-1;for(o.fallbackToLetter&&0==b&&0==y&&(p="",g=h.split(p),y=g.length-1);y>=b&&(0!=b||0!=y);){var m=Math.floor((b+y)/2);if(m==w)break;w=m,l(c,g.slice(0,w+1).join(p)+o.ellipsis),r.children().each(function(){t(this).toggle().toggle()}),a(r,o)?(y=w,o.fallbackToLetter&&0==b&&0==y&&(p="",g=g[0].split(p),v=-1,w=-1,b=0,y=g.length-1)):(v=w,b=w)}if(-1==v||1==g.length&&0==g[0].length){var x=e.parent();e.detach();var C=d&&d.closest(x).length?d.length:0;x.contents().length>C?c=u(x.contents().eq(-1-C),n):(c=u(x,n,!0),C||x.detach()),c&&(h=i(s(c),o),l(c,h),C&&d&&t(c).parent().append(d))}else h=i(g.slice(0,v+1).join(p),o),l(c,h);return!0}function a(t,e){return t.innerHeight()>e.maxHeight}function i(e,n){for(;t.inArray(e.slice(-1),n.lastCharacter.remove)>-1;)e=e.slice(0,-1);return t.inArray(e.slice(-1),n.lastCharacter.noEllipsis)<0&&(e+=n.ellipsis),e}function d(t){return{width:t.innerWidth(),height:t.innerHeight()}}function l(t,e){t.innerText?t.innerText=e:t.nodeValue?t.nodeValue=e:t.textContent&&(t.textContent=e)}function s(t){return t.innerText?t.innerText:t.nodeValue?t.nodeValue:t.textContent?t.textContent:""}function c(t){do t=t.previousSibling;while(t&&1!==t.nodeType&&3!==t.nodeType);return t}function u(e,n,r){var o,a=e&&e[0];if(a){if(!r){if(3===a.nodeType)return a;if(t.trim(e.text()))return u(e.contents().last(),n)}for(o=c(a);!o;){if(e=e.parent(),e.is(n)||!e.length)return!1;o=c(e[0])}if(o)return u(t(o),n)}return!1}function h(e,n){return e?"string"==typeof e?(e=t(e,n),e.length?e:!1):e.jquery?e:!1:!1}function f(t){for(var e=t.innerHeight(),n=["paddingTop","paddingBottom"],r=0,o=n.length;o>r;r++){var a=parseInt(t.css(n[r]),10);isNaN(a)&&(a=0),e-=a}return e}if(!t.fn.dotdotdot){t.fn.dotdotdot=function(e){if(0==this.length)return t.fn.dotdotdot.debug('No element found for "'+this.selector+'".'),this;if(this.length>1)return this.each(function(){t(this).dotdotdot(e)});var o=this,i=o.contents();o.data("dotdotdot")&&o.trigger("destroy.dot"),o.data("dotdotdot-style",o.attr("style")||""),o.css("word-wrap","break-word"),"nowrap"===o.css("white-space")&&o.css("white-space","normal"),o.bind_events=function(){return o.bind("update.dot",function(e,d){switch(o.removeClass("is-truncated"),e.preventDefault(),e.stopPropagation(),typeof l.height){case"number":l.maxHeight=l.height;break;case"function":l.maxHeight=l.height.call(o[0]);break;default:l.maxHeight=f(o)}l.maxHeight+=l.tolerance,"undefined"!=typeof d&&(("string"==typeof d||"nodeType"in d&&1===d.nodeType)&&(d=t("<div />").append(d).contents()),d instanceof t&&(i=d)),g=o.wrapInner('<div class="dotdotdot" />').children(),g.contents().detach().end().append(i.clone(!0)).find("br").replaceWith("  <br />  ").end().css({height:"auto",width:"auto",border:"none",padding:0,margin:0});var c=!1,u=!1;return s.afterElement&&(c=s.afterElement.clone(!0),c.show(),s.afterElement.detach()),a(g,l)&&(u="children"==l.wrap?n(g,l,c):r(g,o,g,l,c)),g.replaceWith(g.contents()),g=null,t.isFunction(l.callback)&&l.callback.call(o[0],u,i),s.isTruncated=u,u}).bind("isTruncated.dot",function(t,e){return t.preventDefault(),t.stopPropagation(),"function"==typeof e&&e.call(o[0],s.isTruncated),s.isTruncated}).bind("originalContent.dot",function(t,e){return t.preventDefault(),t.stopPropagation(),"function"==typeof e&&e.call(o[0],i),i}).bind("destroy.dot",function(t){t.preventDefault(),t.stopPropagation(),o.unwatch().unbind_events().contents().detach().end().append(i).attr("style",o.data("dotdotdot-style")||"").removeClass("is-truncated").data("dotdotdot",!1)}),o},o.unbind_events=function(){return o.unbind(".dot"),o},o.watch=function(){if(o.unwatch(),"window"==l.watch){var e=t(window),n=e.width(),r=e.height();e.bind("resize.dot"+s.dotId,function(){n==e.width()&&r==e.height()&&l.windowResizeFix||(n=e.width(),r=e.height(),u&&clearInterval(u),u=setTimeout(function(){o.trigger("update.dot")},100))})}else c=d(o),u=setInterval(function(){if(o.is(":visible")){var t=d(o);c.width==t.width&&c.height==t.height||(o.trigger("update.dot"),c=t)}},500);return o},o.unwatch=function(){return t(window).unbind("resize.dot"+s.dotId),u&&clearInterval(u),o};var l=t.extend(!0,{},t.fn.dotdotdot.defaults,e),s={},c={},u=null,g=null;return l.lastCharacter.remove instanceof Array||(l.lastCharacter.remove=t.fn.dotdotdot.defaultArrays.lastCharacter.remove),l.lastCharacter.noEllipsis instanceof Array||(l.lastCharacter.noEllipsis=t.fn.dotdotdot.defaultArrays.lastCharacter.noEllipsis),s.afterElement=h(l.after,o),s.isTruncated=!1,s.dotId=p++,o.data("dotdotdot",!0).bind_events().trigger("update.dot"),l.watch&&o.watch(),o},t.fn.dotdotdot.defaults={ellipsis:"... ",wrap:"word",fallbackToLetter:!0,lastCharacter:{},tolerance:0,callback:null,after:null,height:null,watch:!1,windowResizeFix:!0},t.fn.dotdotdot.defaultArrays={lastCharacter:{remove:[" ","　",",",";",".","!","?"],noEllipsis:[]}},t.fn.dotdotdot.debug=function(t){};var p=1,g=t.fn.html;t.fn.html=function(n){return n!=e&&!t.isFunction(n)&&this.data("dotdotdot")?this.trigger("update",[n]):g.apply(this,arguments)};var v=t.fn.text;t.fn.text=function(n){return n!=e&&!t.isFunction(n)&&this.data("dotdotdot")?(n=t("<div />").text(n).html(),this.trigger("update",[n])):v.apply(this,arguments)}}}(jQuery),jQuery(document).ready(function(t){t(".dot-ellipsis").each(function(){var e=t(this).hasClass("dot-resize-update"),n=t(this).hasClass("dot-timer-update"),r=0,o=t(this).attr("class").split(/\s+/);t.each(o,function(t,e){var n=e.match(/^dot-height-(\d+)$/);null!==n&&(r=Number(n[1]))});var a=new Object;n&&(a.watch=!0),e&&(a.watch="window"),r>0&&(a.height=r),t(this).dotdotdot(a)})}),jQuery(window).load(function(){jQuery(".dot-ellipsis.dot-load-update").trigger("update.dot")});

var WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

if(!isie8 && !ismacos){
(function(a){function d(b){var c=b||window.event,d=[].slice.call(arguments,1),e=0,f=!0,g=0,h=0;return b=a.event.fix(c),b.type="mousewheel",c.wheelDelta&&(e=c.wheelDelta/120),c.detail&&(e=-c.detail/3),h=e,c.axis!==undefined&&c.axis===c.HORIZONTAL_AXIS&&(h=0,g=-1*e),c.wheelDeltaY!==undefined&&(h=c.wheelDeltaY/120),c.wheelDeltaX!==undefined&&(g=-1*c.wheelDeltaX/120),d.unshift(b,e,g,h),(a.event.dispatch||a.event.handle).apply(this,d)}var b=["DOMMouseScroll","mousewheel"];if(a.event.fixHooks)for(var c=b.length;c;)a.event.fixHooks[b[--c]]=a.event.mouseHooks;a.event.special.mousewheel={setup:function(){if(this.addEventListener)for(var a=b.length;a;)this.addEventListener(b[--a],d,!1);else this.onmousewheel=d},teardown:function(){if(this.removeEventListener)for(var a=b.length;a;)this.removeEventListener(b[--a],d,!1);else this.onmousewheel=null}},a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})})(jQuery)

  

;(function($) {
    'use strict';
    
    $.srSmoothscroll = function(options) {
    
    var self = $.extend({
        step: 55,
        speed: 400,
        ease: "swing"
    }, options || {});
    
    // private fields & init
    var win = $(window),
        doc = $(document),
        top = $(window).scrollTop(),
        step = self.step,
        speed = self.speed,
        viewport = win.height(),
        body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html'),
        wheel = false;
    // events

    $('body').mousewheel(function(event, delta) {

        wheel = true;

        if (delta < 0) // down
            top = (top+viewport) >= doc.height() ? top : top+=step;

        else // up
            top = top <= 0 ? 0 : top-=step;

        body.stop().animate({scrollTop: top}, speed, self.ease, function () {
            wheel = false;
        });

        return false;
    });

    win
    .on('resize', function (e) {
        viewport = win.height();
    })
    .on('scroll', function (e) {
        if (!wheel)
            top = win.scrollTop();
    });
    
    };


})(jQuery);

}else{
  $.srSmoothscroll = function(options) {};
}//if::isie8
function setViewPort() {
     var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    if (windowWidth <= 1024 && windowWidth >= 901) {
        $("meta[name=viewport]").attr("content", "width=1024, target-densitydpi=device-dpi , user-scalable=no");
    } else if (windowWidth <= 900 && windowWidth >= 768) {
        $("meta[name=viewport]").attr("content", "width=768, target-densitydpi=device-dpi , user-scalable=no");
    } else if (windowWidth <= 767 && windowWidth >= 421) {
        $("meta[name=viewport]").attr("content", "width=640, target-densitydpi=device-dpi , user-scalable=no");
    } else if (windowWidth <= 420) {
        $("meta[name=viewport]").attr("content", "width=420, target-densitydpi=device-dpi , user-scalable=no");    
    } else {
        $("meta[name=viewport]").attr("content", "width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi");
    }
}  
setViewPort();

$(function(){

    // 로드와 동시에 뷰포트 실행
   /* var viewPortWidth = 800;
    var wW0 = window.screen.width;
    var scale = wW0/viewPortWidth;
    var vPort;

    var userAgent = navigator.userAgent;

    if(userAgent.indexOf("SHV-E210") > -1 ){
        vPort = "width=device-width, maximum-scale="+scale+", minimum-scale="+scale+", initial-scale="+scale+", user-scalable=yes, target-densitydpi=device-dpi";
        document.getElementById("viewport").setAttribute("content", vPort);
    }else if( userAgent.indexOf("SHW-M440") > -1 ){
        vPort = "width=device-width, maximum-scale="+scale+", minimum-scale="+scale+", initial-scale="+scale+", user-scalable=yes, target-densitydpi=device-dpi";
        document.getElementById("viewport").setAttribute("content", vPort);
    }else if( userAgent.indexOf("SHV-E250") > -1 ){
        vPort = "width=device-width, maximum-scale="+scale+", minimum-scale="+scale+", initial-scale="+scale+", user-scalable=yes, target-densitydpi=device-dpi";
        document.getElementById("viewport").setAttribute("content", vPort);
    }else{
        $('#viewport').attr('content', 'width=800, user-scalable=0, target-densitydpi=device-dpi');
    }*/

    $(".bbs_table table tbody tr td a.cont").dotdotdot({watch: "window"});

})




// 페이지 갯수 계산해 페이징 생성
function pageingArea(o,n){
  var obj = o;
  var num = n;

  obj.each(function(){
      $this = $(this);
      if($this.find(".pageingBox").length > 0) $this.find(".pageingBox").remove();
      var pageingBox = $('<div class="pageingBox" style="text-align:center; padding-top: 20px;"></div>');
      $(this).append(pageingBox);
      for(var i=0; i < num; i++){
         pageingBox.append($("<img>").attr({ 
          src:"/images/btn/btn_circle_off.png"
         }).css({"width":9,"margin":"0 3px"})
        ) ;
      }
  })

}

// 페이징 리사이즈 관련 디스플레이
function pageingResizeMotion(obj , resize){
  var $this = obj;

    if( WinWdith >= resize){
        //con(WinWdith+",,,,,"+resize,"페이징 리사이즈 값 : none")
       $this.find(".pageingBox").css("display","none");
    }else{
    //  con(WinWdith+",,,,,"+resize,"페이징 리사이즈 값 : block")
        $this.find(".pageingBox").css("display","block");

    }
}

// 페이징 오버 모션
function pageingOvrMotion(obj , pageNum ,exp , totalNum){
  var $this = obj;
  var leng = $this.find(".pageingBox > img").length -1;
    $this.find(".pageingBox > img").each(function(){
      $(this).imgConversion(false);
    })

     for(var i=pageNum; i < (pageNum+exp); i++ ){
        //con(i, obj.attr("class") + "페이징 모션 값 ::::");
         //con( "페이징 모션 값 ::::" +leng);
            if(i > leng ){
              con( "페이징 모션 남는값 ::::" + (i - (leng+1)));
              $this.find(".pageingBox > img:eq("+ (i - (leng+1)) +")").imgConversion(true); 
            }else{
               $this.find(".pageingBox > img:eq("+i+")").imgConversion(true); 
            }
  }


}


function rollngBasketbanner1(){
    var $obj = $("#shopping_list_id");
    var $mask = $("#shopping_list_id>.inner");
    var $pos = $mask.find(".lst");
    var $prev = $obj.find(".prev");
    var $next = $obj.find(".next");
    var boxSize , boxmargin ,totalBoxSize , exp , pageTotal;
    var total = $pos.find(">li").length;
    var allBox = 4;
    var maskBoxSize = $mask.outerWidth();
    var prevExp = 0;

    function Exp(){
        if(WinWdith > 1200){
          exp = 4;
        }else if(WinWdith <= 1200 && WinWdith > 960 ){
          exp = 4;
        }else if(WinWdith <= 960 ){
          exp = 2;
        }
    }

    function sizeCalculation(){

        $pos.css({"width":""});
       $mask.css({"width":"","margin":""});        
       $pos.find(">li:eq(1)").css({"width":"","margin-left":""});
      boxSize = parseInt($pos.find(">li:eq(1)").css("width"));
      boxmargin = parseInt($pos.find(">li:eq(1)").css("margin-left"));  
      maskBoxSize = $mask.outerWidth();

      totalBoxSize = boxSize + boxmargin;
      total = $pos.find(">li").length;
    $mask.css({
        "width": parseInt(totalBoxSize * exp)
      })
      $pos.css({
        "width": (totalBoxSize + 100) * total 
      })

      $pos.find(">li").each(function(index){
        $(this).css({
          "width":boxSize,
          "margin-left":boxmargin
        }); 
      });
    };

     function resize(){
        WinWdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        Exp();
        sizeCalculation();  
        //if(exp != prevExp){
             prevExp = exp;
             tabChange = false;
            pageBasketNum = 0;
            pageTotal = total -  exp;
            pageingMotion();
            $pos.css({"left":0 });
        //}
     }//resize


    function pageingMotion(){
      if(exp < total){
          $next.css("display",(pageTotal > pageBasketNum) ? "block" : "none");
          $prev.css("display",(0 >= pageBasketNum) ? "none" : "block");
        }else{
          $next.css("display","none");
          $prev.css("display","none");
        }
     }//pageingMotion

     function posMotion(pageBasketNum){
     $pos.animate({"left": -(totalBoxSize * pageBasketNum) },300,"swing");
      pageingMotion();
     }//posMotion

      $next.on("click",function(){
        if(!$pos.is(":animated")){
            pageBasketNum = (pageBasketNum > pageTotal) ? pageTotal : pageBasketNum + 1;
            posMotion(pageBasketNum);
         }

      });

      $prev.on("click",function(){
          if(!$pos.is(":animated")){
            pageBasketNum = (pageBasketNum <= 0) ? 0 : pageBasketNum - 1;
            posMotion(pageBasketNum);
          };
      });

       $mask.swipe( {
        //Generic swipe handler for all directions
        swipeLeft:function(event, direction, distance, duration, fingerCount) {
          if(!$pos.is(":animated")){
            pageBasketNum = (pageBasketNum > pageTotal) ? pageTotal : pageBasketNum + 1;
            posMotion(pageBasketNum);
         }
         
        },
         swipeRight:function(event, direction, distance, duration, fingerCount) {
         if(!$pos.is(":animated")){
            pageBasketNum = (pageBasketNum <= 0) ? 0 : pageBasketNum - 1;
            posMotion(pageBasketNum);
          };
        },
        excludedElements:".noSwipe",
        threshold:80
      });

    $(window).resize(function(){resize()});
    resize();

  }//rollngbanner1

   function popUpHeight(obj){
      obj.css({"height":""});
      $("#wrap").css({"height":""});
      var winHeight = $(window).outerHeight(true);
      var objHeight = obj.outerHeight(true);
      $("#wrap").css({
        "height": (winHeight < objHeight) ? objHeight : winHeight,
        "overflow" : "hidden"
      });
      if(winHeight > objHeight){
        obj.css({"height": winHeight});
      }
    }//popUpHeight


function dotWindow(o , mode){
        var obj = $(o);
        var mode = mode;
        var mainTimeOutSet;
console.log(0);
        function fontDot(){
            obj.dotdotdot({ watch: mode });
          }

           $(function(){
              $(window).resize(function(){
                clearInterval(mainTimeOutSet);
                mainTimeOutSet = setTimeout(function(){
                    fontDot();
                },1000);
              });
              fontDot();
            });

      }//dotWindow

function iCutter(obj){
  var o = $(obj);

  $(window).on("load",function(){
    var divs = $(obj);
    divs.each(function(){
      var $this = $(this);
      var divAspect = $this.outerHeight() / $this.outerWidth();
      var img = $this.find('img');
      var imgAspect = img.outerHeight() / img.outerWidth();

      if (imgAspect <= divAspect) {
          var imgWidthActual = $this.outerHeight() / imgAspect;
          var imgWidthToBe = $this.outerHeight() / divAspect;
          var marginLeft = -Math.round((imgWidthActual - imgWidthToBe) / 2)
          img.css({
            "width":"auto",
            "height":"100%",
            "margin-left":marginLeft
          });
        } else {
           img.css({
            "width":"100%",
            "height":"auto",
            "margin-left":0
          });
        }
    });//each
  });//load

  
    /*window.onload = function() {
      
      for (var i = 0; i < divs.length; ++i) {
        var div = divs[i];
        var divAspect = div.offsetHeight / div.offsetWidth;
        console.log(divAspect)
        //div.style.overflow = 'hidden';
        
        var img = div.querySelector('img');
        var imgAspect = img.height / img.width;

        if (imgAspect <= divAspect) {
          var imgWidthActual = div.offsetHeight / imgAspect;
          var imgWidthToBe = div.offsetHeight / divAspect;
          var marginLeft = -Math.round((imgWidthActual - imgWidthToBe) / 2)
          img.style.cssText = 'width: auto; height: 100%; margin-left: '
                          + marginLeft + 'px;'
        } else {
          img.style.cssText = 'width: 100%; height: auto; margin-left: 0;';
        }
      }
    };*/
}//iCutter


//모달 팝업창
function LayerPopup_type(obj){
    var id_Motion = $(".layerPopup");
    var objHeight = $(obj).outerHeight();
    var winHeight = $(window).height();
    var scrollT = $(window).scrollTop();
     if(obj =="close"){
    //for(var i=0; i<=id_Motion.length; i++){
      //$(id_Motion[i]).css("display","none");
      id_Motion.css("display","none");
      $("#cover").remove();
    //}
  }else{
    /*$(window).on('scroll',function(){
        var scrollT = $(window).scrollTop();
        $(obj).stop().animate({"top":  scrollT + 110  });
    });*/
     var backgound = $("<div>").attr({
         "id": "cover"
       }).css({
         "height": $("body").outerHeight(),
       })
      $("body").append(backgound);

    for(var i=0; i<=id_Motion.length; i++){
        $(id_Motion[i]).css("display","none");
     }
   $(obj).css({
      "display":"block",
      "z-index":90,
      "top":scrollT + 110 ,
      "left":"50%",
      "margin-left":-( $(obj).outerWidth() / 2)
    });
     //alert(objHeight +",,,,"+ winHeight );
     //if(objHeight > winHeight){}
     backgound.off().on("click",function(){
        id_Motion.css("display","none");
        backgound.remove();
        backgound.off("click");
     });

  }//if    
 
  
}//LayerPopup_type

function iCutterLoadNone(obj){
  var o = $(obj);

    var divs = $(obj);
    divs.each(function(){
      var $this = $(this);
      var img = $this.find('img');
      img.css({"width":"","height":"","margin-left":""});
      var divAspect = $this.outerHeight() / $this.outerWidth();
      var imgAspect = img.outerHeight() / img.outerWidth();
      if (imgAspect <= divAspect) {
          var imgWidthActual = $this.outerHeight() / imgAspect;
          var imgWidthToBe = $this.outerHeight() / divAspect;
          var marginLeft = -Math.round((imgWidthActual - imgWidthToBe) / 2)
          img.css({
            "width":"auto",
            "height":"100%",
            "margin-left":marginLeft
          });
        } else {
           img.css({
            "width":"100%",
            "height":"auto",
            "margin-left":0
          });
        }
    });//each

  
    /*window.onload = function() {
      
      for (var i = 0; i < divs.length; ++i) {
        var div = divs[i];
        var divAspect = div.offsetHeight / div.offsetWidth;
        console.log(divAspect)
        //div.style.overflow = 'hidden';
        
        var img = div.querySelector('img');
        var imgAspect = img.height / img.width;

        if (imgAspect <= divAspect) {
          var imgWidthActual = div.offsetHeight / imgAspect;
          var imgWidthToBe = div.offsetHeight / divAspect;
          var marginLeft = -Math.round((imgWidthActual - imgWidthToBe) / 2)
          img.style.cssText = 'width: auto; height: 100%; margin-left: '
                          + marginLeft + 'px;'
        } else {
          img.style.cssText = 'width: 100%; height: auto; margin-left: 0;';
        }
      }
    };*/
}//iCutterLoadNone

function iCutterLoadNoneTopMargin(obj){
  var o = $(obj);

    var divs = $(obj);
    divs.each(function(){
      var $this = $(this);
      var divAspect = $this.outerHeight() / $this.outerWidth();
      var img = $this.find('img');
      var imgAspect = img.outerHeight() / img.outerWidth();

      if (imgAspect <= divAspect) {
          var imgWidthActual = $this.outerHeight() / imgAspect;
          var imgWidthToBe = $this.outerHeight() / divAspect;
          var marginLeft = -Math.round((imgWidthActual - imgWidthToBe) / 2)
          img.css({
            "width":"auto",
            "height":"100%",
            "margin-left":marginLeft
          });
        } else {
          /*var imgWidthActual = $this.outerHeight() / imgAspect;
          var imgWidthToBe = $this.outerHeight() / divAspect;
          var marginLeft = -Math.round((imgWidthActual - imgWidthToBe) / 2)*/
           img.css({
            "width":"100%",
            "height":"auto",
            "margin-top":0
          });
        }
    });//each

  
    /*window.onload = function() {
      
      for (var i = 0; i < divs.length; ++i) {
        var div = divs[i];
        var divAspect = div.offsetHeight / div.offsetWidth;
        console.log(divAspect)
        //div.style.overflow = 'hidden';
        
        var img = div.querySelector('img');
        var imgAspect = img.height / img.width;

        if (imgAspect <= divAspect) {
          var imgWidthActual = div.offsetHeight / imgAspect;
          var imgWidthToBe = div.offsetHeight / divAspect;
          var marginLeft = -Math.round((imgWidthActual - imgWidthToBe) / 2)
          img.style.cssText = 'width: auto; height: 100%; margin-left: '
                          + marginLeft + 'px;'
        } else {
          img.style.cssText = 'width: 100%; height: auto; margin-left: 0;';
        }
      }
    };*/
}//iCutterLoadNone

function iCutter2(obj){
  var o = $(obj);

  $(window).on("load",function(){
    var divs = $(obj);
    divs.each(function(){
      var $this = $(this);
      var divAspect = $this.outerHeight() / $this.outerWidth();
      var img = $this.find('img');
      var imgAspect = img.outerHeight() / img.outerWidth();
      //console.log(img.outerHeight());

      if (imgAspect <= divAspect) {
       //console.log("가로가 길다");
          var imgWidthActual = $this.outerHeight() / imgAspect;
          var imgWidthToBe = $this.outerHeight() / divAspect;
          var marginLeft = -Math.round((imgWidthActual - imgWidthToBe) / 2);
          var mt = ( $this.outerHeight() - img.outerHeight() ) / 2;
          img.css({
            "width":"100%",
            "height":"auto",
            "margin-top":mt
            //"margin-left":marginLeft
          });
        } else {
          //console.log("세로가 길다");
          var ml = ( $this.outerWidth() - img.outerWidth() ) / 2;
           img.css({
            "width":"auto",
            "height":"100%"
            //"margin-top":ml
            //"margin-left":0
          });
        }
    });//each
  });//load

  
    /*window.onload = function() {
      
      for (var i = 0; i < divs.length; ++i) {
        var div = divs[i];
        var divAspect = div.offsetHeight / div.offsetWidth;
        console.log(divAspect)
        //div.style.overflow = 'hidden';
        
        var img = div.querySelector('img');
        var imgAspect = img.height / img.width;

        if (imgAspect <= divAspect) {
          var imgWidthActual = div.offsetHeight / imgAspect;
          var imgWidthToBe = div.offsetHeight / divAspect;
          var marginLeft = -Math.round((imgWidthActual - imgWidthToBe) / 2)
          img.style.cssText = 'width: auto; height: 100%; margin-left: '
                          + marginLeft + 'px;'
        } else {
          img.style.cssText = 'width: 100%; height: auto; margin-left: 0;';
        }
      }
    };*/
}//iCutter


//차례로 페이드  함수
   function forFade(chi,sw){
      var child = chi;
      var Switch = sw;
      if(Modernizr.opacity){
        var length = child.length;
         if(Switch){
            for (var i = 0; i < length; i++) {
              child.filter(":eq("+i+")").css({
                "display":"block",
                "opacity":0
              }).stop().delay(100*i).animate({
                "opacity":1
              },300);
            };
          }else{
            for (var i = 0; i < length; i++) {
              child.filter(":eq("+i+")").stop().animate({
                  "opacity":0
                },200,function(){
                 $(this).css({"display":"none"});
                });

            };
          }
        }else{//ie8
            child.css("display",(Switch) ? "block" : "none");
        }//Modernizr

   }



  
  var wideFlag = false,
        normalFlag = false , 
        tablet1Flag = false , 
        tablet2Flag = false,   
        mobile1Flag = false, 
        mobile2Flag = false


 function resizeEvent(w){

    var win = $(window),
    doc = $(document),
    width = w,
    step = self.step,
    speed = self.speed,
    viewport = win.height(),
    body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');

   
    if(width > 1280 ){
      WideMotion();
    }else if(width < 1280 && width > 960 ){
      normalMotion();
    }else if(width < 959 && width > 768 ){
      tablet1Motion();
    }else if(width < 767 && width > 640 ){
      tablet2Motion();   
    }else if(width < 639 && width > 480 ){
      mobile1Motion();   
    }else if(width < 479 && width > 320 ){
      mobile2Motion();       
    }

    function WideMotion(){
      if(!wideFlag){
        //console.log("와이드 영역");
        //topFIxedMotion(false,false);
      }//if
      wideFlag = true;
      normalFlag = false;
      tablet1Flag = false;
      tablet2Flag = false;
      mobile1Flag = false;           
      mobile2Flag = false;           
    }

      function normalMotion(){
      if(!normalFlag){
        //console.log("일반");
         //topFIxedMotion(false,false);
      }//if
      wideFlag = false;
      normalFlag = true;
      tablet1Flag = false;
      tablet2Flag = false;
      mobile1Flag = false;           
      mobile2Flag = false;             
    }

     function tablet1Motion(){
      if(!tablet1Flag){
        //topFIxedMotion(true,true);
        //console.log("tablet1Flag")
      }//if
      wideFlag = false;
      normalFlag = false;
      tablet1Flag = true;
      tablet2Flag = false;
      mobile1Flag = false;           
      mobile2Flag = false;             
    }

     function tablet2Motion(){
      if(!tablet2Flag){
       // topFIxedMotion(true,true);
        //console.log("tablet2Flag")
      }//if
      wideFlag = false;
      normalFlag = false;
      tablet1Flag = false;
      tablet2Flag = true;
      mobile1Flag = false;           
      mobile2Flag = false;             
    }

     function mobile1Motion(){
      if(!mobile1Flag){
        //topFIxedMotion(true,true);
        //console.log("모바일 영역1")
      }//if
      wideFlag = false;
      normalFlag = false;
      tablet1Flag = false;
      tablet2Flag = false;
      mobile1Flag = true;           
      mobile2Flag = false;             
    }

     function mobile2Motion(){
      if(!mobile2Flag){
        //topFIxedMotion(true,true);
        //console.log("모바일 영역")
      }//if
      wideFlag = false;
      normalFlag = false;
      tablet1Flag = false;
      tablet2Flag = false;
      mobile1Flag = false;           
      mobile2Flag = true;             
    }
  };

  
        


var scrollStartFlag = false
var scrollIngFlag = false

  function scrollTopEvent(w){
    
    var win = $(window),
    doc = $(document),
    body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
    var top = win.scrollTop();
     //console.log(w);
     //console.log(top); 

    if(w >  960){
        if(top <= 40 ){
          startScroll();
        }else{
          ingScroll();
        }
    }else{
      topFIxedMotion(false,true);

    }

    function startScroll(){
      //console.log("start-Start:::"+scrollStartFlag); 
      //console.log("start-Ing:::"+scrollIngFlag); 
      if(!scrollStartFlag){
        //console.log("start");
        //상단 모션
        topFIxedMotion(false,false);

      }//if
      scrollStartFlag = true;
      scrollIngFlag = false;
      
    }

      function ingScroll(){
      //console.log("ing-Start:::"+scrollStartFlag); 
      //console.log("ing-Ing:::"+scrollIngFlag); 
      if(!scrollIngFlag){
       //console.log("ing");
        //상단 모션
        topFIxedMotion(true,false);

      }//if
      scrollStartFlag = false;
      scrollIngFlag = true;
      
    }


  
  };

  
  $(window).resize(function(){
    var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    //console.log(width);
    resizeEvent(width);
    scrollTopEvent(width);
  })

    $(window).on("scroll",function(){
      var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
     scrollTopEvent(width);
    })
    scrollTopEvent(WinWdith);

    
  
  resizeEvent($(window).width());







    function topFIxedMotion(b,z){
      var header = $("#header") ,
            inner = header.find(".header_inner"),
            h1 = inner.find(">h1"),
            lnb = inner.find("#lnb"),
            util = inner.find(".utill"),
            allBtn = header.find("button.btn_menu"),
            allMenu = $("#allMenu .allMenu_inner")

      function mobile(){
        inner.css({"height":""});
         h1.css({
          "width":"",
          "margin-top":""
        })
         util.css({"top":""});
         allBtn.css({"top":""});
         allMenu.css({"top":""});
      }

      if(b){//아래
        if(z){
           mobile();
        }else{
          // inner.animate({"height":65},300);
          // h1.animate({"width":70,"margin-top":13},300);
          // lnb.animate({"top":19},300);
          // util.animate({"top":19},300);
          // allBtn.animate({"top":17},300);
          // allMenu.animate({"top":72},300);
        }
          



      }else{// 상단
          if(z){
              mobile();
          }else{
              // inner.animate({"height":95},300);
              // h1.animate({"width":100,"margin-top":20},300);
              // lnb.animate({"top":32},300);
              // util.animate({"top":32},300);
              // allBtn.animate({"top":34},300);
              // allMenu.animate({"top":104},300);
        }




      }//if:b

    }//topFIxedMotion



   function btnFadeUp(obj){
        /*
        var o = $(obj);
        o.each(function(){
          var $this = $(this); 
          if($this.find(".link").length > 0){
              function itemEnter(e){
                var elemt = $(this);
                var btnBox = elemt.find(".link");
                var btns = btnBox.find(">ul>li");
                  if(Modernizr.opacity){
                    btnBox.css({
                      "display":"block",
                      "opacity":0
                    }).stop().animate({"opacity":1},300)
                     btns.css({
                      "display":"block",
                      "opacity":0
                    })
                    for (var i = 0; i < btns.length; i++) {
                         btns.eq(i).stop().delay(50*i).animate({"opacity":1},400);
                    };
                  }else{//Modernizr
                    btnBox.css({"display":"block"})
                    btns.css({"display":"block"});
                  }//Modernizr
              };//itemEnter

              function itemLeave(){
                 var elemt = $(this);
                var btnBox = elemt.find(".link");
                var btns = btnBox.find(">ul>li");

                 if(Modernizr.opacity){
                    btnBox.stop().animate({"opacity":0},300,function(){

                      $(this).css({"display":"none"});
                      btns.css({"display":"none"});

                    });
                  }else{//Modernizr
                    btnBox.css({"display":"none"})
                    btns.css({"display":"none"});
                  }//Modernizr
              };//itemLeave
              $this.on("mouseenter",itemEnter).on("mouseleave",itemLeave);
            }

        });//each
*/
    };//btnFadeUp

    function childrenTotal(b,du){
      if(du == "w"){
        var child = b.children();
        var total = 0;
        for (var i = 0; i < child.length; i++) {
            total += child.eq(i).outerWidth(true);
        }; 
        return total; 
      }
      

    }


    function coverOpen(){
      var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
      var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
      if($("#coverSolo").length > 0){
        $("#coverSolo").remove();
      }
      var backgound = $("<div>").attr({
               "id": "coverSolo"
             }).css({
               "height": $("#wrap").outerHeight(),
               "z-index":9,
               "cursor":"pointer",
               "display":"none"
             })
            $("body").append(backgound);
          fadePlayMotion(backgound , true , 400);

    }

    function coverClose(){
       var backgound = $("#coverSolo");
        fadePlayMotion(backgound , false , 400);
        setTimeout(function(){
          backgound.remove();
          },400);
    };


    function wideSlideBox(obj){
      var  o = $(obj);
      o.each(function(){
        var $this = $(this);
        var preBox = $this.find(".wide-pre-Box");
        var child = $this.find(".wide-slide-child");
        var parSize = preBox.outerWidth();
        var childSize = child.outerWidth();
        var child2Size = child.children().outerWidth(true);
        var spacing = childSize - parSize;
        var Num = 0;
        var total = child.find(">li").length;
        var boxLeng = Math.round(parSize / child2Size);
        var moreNum = total - boxLeng;


        child.css({"left":0});

        function resize(){
          preBox = $this.find(".wide-pre-Box");
          child = $this.find(".wide-slide-child");
          parSize = preBox.outerWidth();
          childSize = child.outerWidth();
          child2Size = child.children().outerWidth(true);
          total = child.find(">li").length;
          boxLeng = Math.round(parSize / child2Size);
          moreNum = total - boxLeng;
          spacing = childSize - parSize;

          //console.log("child2Size::::"+child2Size);
          //console.log("spacing::::"+spacing);
           if(child2Size < spacing){
                  child.css("width", childrenTotal(child,"w"));
                 $this.find(".dmp-controls").css({"display":"block"}).find(".pageing > button").off().on("click",motion);
            }else{
                child.css({"left":0,"width":""});
                $this.find(".dmp-controls").css("display","none").find(".pageing > button").off("click");
            }

        }

        function motion(event,du){
            if(du != undefined){
              if(du == "prev" || du == "left" ){

              }else if(du == "next" || du == "right" ){

              }//if : du              

            }else{
              if($(this).hasClass("prev")){
                 if(Num == 0){
                 Num = moreNum;   
                }else{
                  Num --;
                }   


              }else if($(this).hasClass("next")){
                if(Num == moreNum){
                 Num = 0;   
                }else{
                  Num ++;
                }   
                

              }//if: du

             child.stop().animate({"left":-(child2Size * Num)},300,"easeInCubic");
            }//if
        };

       
        $(window).off().on("resize",resize);
        resize();


      });//each

    };

    function tabMotion(obj){
      var  o = $(obj);
      o.each(function(){
        var $this = $(this);
        
        var $tab = $this.find(">ul > li");
        var total = $tab.length;
        var start = parseInt($this.data("start") - 1);
        var tab_id = new Array(); 
        for( var i=0; i<=total; i++){
          tab_id[i] = $tab.eq(i).find(">a").attr("href");
         }//for
         $tab.eq(start).addClass("on");
         var $pos = $("."+$this.data("box"));
         ajaxLoad(start,false);

          function clickEvent(event){
            event.preventDefault();
            var index = $(this).index();
            if(!$pos.children().eq(0).is(":animated")){
              $tab.filter(".on").removeClass("on");
              $tab.eq(index).addClass("on");
              ajaxLoad(index,true); 
            }

          };//clickEvent



        function ajaxLoad(num,b){
            $.ajax({
                    url : tab_id[num],
                    type : "get",
                    ansync : false,
                    dataType:"html",
                    success : function(data) {
                      if(!b){
                        $pos.children(".noAjaxData").remove();
                         $("<div id='tmpData'></div>").html(data).appendTo($pos);
                         var data2 = $pos.find("#tmpData").html();
                         $("#tmpData").remove();
                        $pos.append(data2);
                        btnFadeUp($pos.find(".item"));
                        wideSlideBox(".wideSlideBox");
                      }else{
                        var height = $pos.outerHeight();
                        
                        /**
                         *
                         * 상단 슬라이드일때
                        $pos.css({
                          "height":height,
                        });
                        $pos.children().eq(0).stop().animate({"margin-top":-(height)},600,"easeOutCubic",function(){
                          $pos.css({"height":""});
                          $(this).remove();
                        });
                        */
                        
                        $pos.css({
                          "height":height,
                        });
                        $pos.children().eq(0).remove();

                        $("<div id='tmpData'></div>").html(data).appendTo($pos);
                         var data2 = $pos.find("#tmpData").html();
                         $("#tmpData").remove();
                        $pos.append(data2);
                         if(Modernizr.opacity){
                          $pos.children().find(".item").each(function(index){
                            $(this).css({"opacity":0}).stop().delay(200*index).animate({"opacity":1},1000);  
                          });
                        };

                        $pos.css({"height":""});
                        
                        
                        btnFadeUp($pos.find(".item"));
                        //wideSlideBox(".wideSlideBox");



                      }
                    },
                    error : function(xhr, status, error) {
                      alert("데이타 오류");
                    }
                });
          }//ajaxLoad


       

        $tab.on("click",clickEvent);


      });

    };

     /*탭/셀렉터 변환*/
      function tabTransformationIscroll(num,t){
        var transType1Flag = false;
        var transType2Flag = false;
        var tabArea = $('.tabList');
        var tabHeadline = tabArea.find('.h_tab');
        var tabLst = tabArea.find(">ul");
        if(num > 0) tabLst.find("> li:eq("+(num-1)+")").addClass("on");
        if(num > 0) tabHeadline.find("button").text(tabLst.find("> li:eq("+(num-1)+") >a").text());

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
           
            }//if
            transType1Flag = true;
            transType2Flag = false;
          }

            function transType2(){
            if(!transType2Flag){

            }//if
            transType1Flag = false;
            transType2Flag = true;
          }

        }
      
        $(window).on("resize",tabResize);
        tabResize();
      }//tabTransformationIscroll

var sideIScroll;

function sideIscroll(){
    var WinHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;     
    var h = WinHeight - ($("#header").outerHeight());
    //$("body").off("mousewheel");
    /*con("window1::::::::::::"  +  WinHeight);  
    con("window2::::::::::::"  + ( WinHeight - $("#header").outerHeight() )      );
    con("allMenu_scroll:::::::::::"  + $(".allMenu_scroll").outerHeight() );*/
   if(sideIScroll ==undefined){
      sideIScroll = new IScroll(".allMenu_inner", { 
        scrollX: false, 
        //scrollbars: 'custom',
        mouseWheelSpeed:200,
        mouseWheel: true ,
        preventDefaultException: { tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|A)$/ }
     });
   }
    $("#allMenu").find(".allMenu_inner").css({
      "height": h,
      "overflow":"hidden"
      //"overflow-y":"auto"
    });
   sideIScroll.refresh();
};//sideIscroll


function tab(o,s){
  $obj  = $(o);

  $obj.each(function(){
    var $this = $(this);
    var $total = $this.find("li").length;
    var $first = s-1;
    var $prev = $first;
    var tab_id = new Array(); 
    var $btn = $this.find("li");
    var $start = $btn.eq($first);

    for( var i=0; i<$total; i++){
      tab_id[i] = $btn.eq(i).find("a").attr("href");
      $(tab_id[i]).css("display","none"); 
      $(tab_id[$first]).css("display","block"); 
    }
    
    $start.addClass("on");

   $btn.bind("click",function(){
    var $this = $(this);
    var $index = $(this).index();
    
    if(!$this.hasClass("link")){
          if(!$this.hasClass("on")){
           $btn.each(function(){
            $(this).removeClass("on");
           });
           $this.addClass("on");
           $(tab_id[$prev]).css("display","none");
           $(tab_id[$index]).css("display","block");
           $prev = $index;
        }
        //예약현황시 스크롤 초기화
        if($this.parent().hasClass("myResInfo")) myHomeScroll1.refresh();
        if($("#marketRView").length > 0) marketViewScroll.refresh();
        return false;

    }
    
    
    

   });
   

  });//each
}//tab


$(function(){
      
  // 사이드 메뉴
  var sideFlag = false; 
  var sideObj = $("#allMenu");
  var sideArr = $("#allMenu .allMenu_tab .arr");
  var sideArrOffset = [-83,51];
  var sideParent , sideBtnFlag;
  // 상단 메뉴
  var msv;

     

  function sideRemove(){
    coverClose();
    sideBtnFlag.find("img").imgConversion(false);
    var objWIdth = sideObj.outerWidth(true);
    sideObj.stop().animate({"left":-(objWIdth)},300,"easeInQuad",function(){$(this).css("display","none")});
    sideFlag = false;
              sideObj.find(".allMenu_inner").stop().animate({"left":-320},300,"easeInQuad");
  }
  function sideTabClick(){

    var $this = $(this);
    var index = $this.index();
    if(!$this.hasClass("on")){
      sideArr.stop().animate({"margin-left": sideArrOffset[index]},300,"easeInQuad");
      $("#allMenu .allMenu_tab > ul > li.on").removeClass("on").find(".ico>img").imgConversion(false);
      $this.addClass("on").find(".ico>img").imgConversion(true);
      var target = $($(this).find(">a").attr("href"));
      sideParent.css("display","none");
      target.css("display","block");
      sideParent = target;
                  sideIscroll()
    }//if
    return false;
  };//sideTabClick

  function sideInit(num){
    var  start = $("#allMenu .allMenu_tab > ul > li:eq("+num+")");
    start.addClass("on").find("img").attr("src",start.find("img").attr("src").split("off").join("on"));
    sideParent = $(start.find(">a").attr("href"));
    sideArr.css("margin-left", sideArrOffset[0]  );
    
  }//sideMotion

  function sideLstClick(e){
    $this = $(this).parent();
    if(!$this.hasClass("on")){
      $this.siblings(".on").removeClass("on").find(".depth2").stop().animate({"height":0},300,"easeInQuad",function(){
        $(this).css({
          "display":"none",
          "height":""
        })
                        sideIscroll();
      });
      var height = $this.find(".depth2").outerHeight(true); 
      $this.addClass("on").find(".depth2").css({
          "display":"block",
          "height":0
        }).stop().animate({"height":height},300,"easeInQuad",function(){sideIscroll()});

    }else{
      $this.removeClass("on").find(".depth2").stop().animate({"height":0},300,"easeInQuad",function(){
        $(this).css({
          "display":"none",
          "height":""
        })
                      sideIscroll();
      });

    }
    e.preventDefault();

  }
  function sideMotion(){

    coverOpen();
    $("#coverSolo").click(function(event) {
      sideRemove();
    });

    topBannerStartClose()
    var $this = $(this);
    
    var objWIdth = sideObj.outerWidth(true);
    var winHeight = parseInt( $("#wrap").outerHeight(true) ) -  parseInt(sideObj.css("top"));
    sideBtnFlag = $this;
    if (sideFlag) {
      sideRemove($this);
    }else{
      $this.find("img").imgConversion(true);
      sideObj.css({
        "display":"block",
        "height":winHeight
      }).stop().animate({"left":0},300,"easeInQuad");
                    sideObj.find(".allMenu_inner").stop().animate({"left":0},300,"easeInQuad");
      /*$(".lnbScrollBox").css({
        "height":$(window).height() -$(".lnbScrollBox").offset().top
      })*/
      sideFlag = true;
                  sideIscroll();
      //myScroll.refresh();
      $(".allMenuLst_left_title_wrap > *").find(">a").off().on("click",function(e){
            e.preventDefault(); 
          })
      $(".allMenuLst_left_title_wrap > *").off().on("click",function(e){
          if(!$(this).hasClass("on")){
            var pos = $(".lnbScrollBox .inner");
            var posHeight = new Array;

            for (var i = 0; i < pos.find(".list  > li").length; i++) {
              posHeight[i] = pos.find(".list  > li:eq("+i+")").offset().top - pos.find(".list  > li:eq(0)").offset().top;
            };
            pos.transition({ y: -(posHeight[$(this).index()]) });


            $(".allMenuLst_left_title_wrap > *").each(function(){
                $(this).removeClass("on").find("img").imgConversion(false);

            });
            $(this).removeClass("ovr").addClass("on").find("img").imgConversion(true);

          }
      }).on("mouseenter mouseleave",function(e){
        if(!$(this).hasClass("on")){  
          if(e.type == "mouseenter"){
            $(this).addClass("ovr").find("img").imgConversion(true);
          }else{
            $(this).removeClass("ovr").find("img").imgConversion(false);
          }
        }

      });





    }//sideFlag

  }//sideMotion
  sideInit(0);
  $("#allMenu .allMenu_tab > ul > li").on("click",sideTabClick);
  $("#header .allMenu").on("click",sideMotion);
  $("#allMenu #allMenuLst > ul > li > a").on("click",sideLstClick);

});


/*탭/셀렉터 변환*/
function tabTransformation(num,t){
  var type = t;
  var transType1Flag = false;
  var transType2Flag = false;
  var tabArea = $('.tabBox');
  var tabHeadline = tabArea.find('.h_tab');
  var tabLst = tabArea.find(">ul");
  if(type != "d") if(num > 0) tabLst.find("> li:eq("+(num-1)+")").addClass("on");
  if(num > 0) tabHeadline.find("button").text(tabLst.find("> li:eq("+(num-1)+") >a").text());
  if(type == "a"){
    var bodyId = $("#tabType1Body");
    var dataLink = tabLst.find("> li:eq("+(num-1)+") >a").data("src");  
  }
  
  

  
  tabHeadline.on("click",function(){
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

  });



function ajaxStart(d,num){
      /*본문호출*/
  $.ajax({
    url : d,
    type : "get",
    ansync : false,
    dataType:"html",
    success : function(data) {
            if(bodyId.height() > 10) bodyId.css("min-height","").css("min-height",bodyId.outerHeight());
            $("<div id='tmpData' style='visibility: hidden;'></div>").html(data).appendTo(bodyId);
            var data2 = bodyId.find("#tmpData").html();        
            $("#tmpData").remove();
            bodyId.children().remove();
            tabLst.find("> li.on").removeClass("on").end().find("> li:eq("+num+")").addClass("on");
            tabHeadline.find("button").text(tabLst.find("> li.on >  a").text());
            bodyId.append(data2).find("> *").css({"opacity":0});
            
        bodyId.imagesLoaded(function(){
        bodyId.find("> *").delay(300).animate({"opacity":1},1000,function(){  });
              
        /*  for(var i=0; i < bodyId.find("> *").length; i++ ){
            console.log(i)
            
          }*/
          
        });//imagesLoaded
    },
    error : function(xhr, status, error) {
      alert("준비중입니다.");
    }
   });    

}//ajaxStart 

function motion(num){
    tabLst.find("> li.on").removeClass("on").end().find("> li:eq("+num+")").addClass("on");
    tabHeadline.find("button").text(tabLst.find("> li.on >  a").text());
}//ajaxStart
  

  function tabResize(){
    var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    if(width >  767){
       transType1();
      }else{
       transType2();
      }

    function transType1(){
      if(!transType1Flag){
        //width >  768
        tabLst.css("display","block");

      }//if
      transType1Flag = true;
      transType2Flag = false;
    }

      function transType2(){
      if(!transType2Flag){
        //width <  768
        tabLst.css("display","none");        


      }//if
      transType1Flag = false;
      transType2Flag = true;
    }

  }
  tabLst.find(">li>a").on("click",function(e){
    var num = $(this).parent().index();
    if(type == "a"){
      e.preventDefault();
      var link = $(this).data("src");  
      
      ajaxStart(link,num);
    }else if(type == "c"){
      if(type != "d") motion(num);
    }
      //$("html,body").stop().animate({scrollTop:tabArea.offset().top - 80 },300)
  });
  $(window).on("resize",tabResize);
  tabResize();
  if(type == "a"){
    ajaxStart(dataLink,num-1);
  }else if(type == "c"){
    
  }
  
}//tabTransformation






(function () {
  

  /**
   * Class for managing events.
   * Can be extended to provide event functionality in other classes.
   *
   * @class EventEmitter Manages event registering and emitting.
   */
  function EventEmitter() {}

  // Shortcuts to improve speed and size
  var proto = EventEmitter.prototype;
  var exports = this;
  var originalGlobalValue = exports.EventEmitter;

  /**
   * Finds the index of the listener for the event in it's storage array.
   *
   * @param {Function[]} listeners Array of listeners to search through.
   * @param {Function} listener Method to look for.
   * @return {Number} Index of the specified listener, -1 if not found
   * @api private
   */
  function indexOfListener(listeners, listener) {
    var i = listeners.length;
    while (i--) {
      if (listeners[i].listener === listener) {
        return i;
      }
    }

    return -1;
  }

  /**
   * Alias a method while keeping the context correct, to allow for overwriting of target method.
   *
   * @param {String} name The name of the target method.
   * @return {Function} The aliased method
   * @api private
   */
  function alias(name) {
    return function aliasClosure() {
      return this[name].apply(this, arguments);
    };
  }

  /**
   * Returns the listener array for the specified event.
   * Will initialise the event object and listener arrays if required.
   * Will return an object if you use a regex search. The object contains keys for each matched event. So /ba[rz]/ might return an object containing bar and baz. But only if you have either defined them with defineEvent or added some listeners to them.
   * Each property in the object response is an array of listener functions.
   *
   * @param {String|RegExp} evt Name of the event to return the listeners from.
   * @return {Function[]|Object} All listener functions for the event.
   */
  proto.getListeners = function getListeners(evt) {
    var events = this._getEvents();
    var response;
    var key;

    // Return a concatenated array of all matching events if
    // the selector is a regular expression.
    if (typeof evt === 'object') {
      response = {};
      for (key in events) {
        if (events.hasOwnProperty(key) && evt.test(key)) {
          response[key] = events[key];
        }
      }
    }
    else {
      response = events[evt] || (events[evt] = []);
    }

    return response;
  };

  /**
   * Takes a list of listener objects and flattens it into a list of listener functions.
   *
   * @param {Object[]} listeners Raw listener objects.
   * @return {Function[]} Just the listener functions.
   */
  proto.flattenListeners = function flattenListeners(listeners) {
    var flatListeners = [];
    var i;

    for (i = 0; i < listeners.length; i += 1) {
      flatListeners.push(listeners[i].listener);
    }

    return flatListeners;
  };

  /**
   * Fetches the requested listeners via getListeners but will always return the results inside an object. This is mainly for internal use but others may find it useful.
   *
   * @param {String|RegExp} evt Name of the event to return the listeners from.
   * @return {Object} All listener functions for an event in an object.
   */
  proto.getListenersAsObject = function getListenersAsObject(evt) {
    var listeners = this.getListeners(evt);
    var response;

    if (listeners instanceof Array) {
      response = {};
      response[evt] = listeners;
    }

    return response || listeners;
  };

  /**
   * Adds a listener function to the specified event.
   * The listener will not be added if it is a duplicate.
   * If the listener returns true then it will be removed after it is called.
   * If you pass a regular expression as the event name then the listener will be added to all events that match it.
   *
   * @param {String|RegExp} evt Name of the event to attach the listener to.
   * @param {Function} listener Method to be called when the event is emitted. If the function returns true then it will be removed after calling.
   * @return {Object} Current instance of EventEmitter for chaining.
   */
  proto.addListener = function addListener(evt, listener) {
    var listeners = this.getListenersAsObject(evt);
    var listenerIsWrapped = typeof listener === 'object';
    var key;

    for (key in listeners) {
      if (listeners.hasOwnProperty(key) && indexOfListener(listeners[key], listener) === -1) {
        listeners[key].push(listenerIsWrapped ? listener : {
          listener: listener,
          once: false
        });
      }
    }

    return this;
  };

  /**
   * Alias of addListener
   */
  proto.on = alias('addListener');

  /**
   * Semi-alias of addListener. It will add a listener that will be
   * automatically removed after it's first execution.
   *
   * @param {String|RegExp} evt Name of the event to attach the listener to.
   * @param {Function} listener Method to be called when the event is emitted. If the function returns true then it will be removed after calling.
   * @return {Object} Current instance of EventEmitter for chaining.
   */
  proto.addOnceListener = function addOnceListener(evt, listener) {
    return this.addListener(evt, {
      listener: listener,
      once: true
    });
  };

  /**
   * Alias of addOnceListener.
   */
  proto.once = alias('addOnceListener');

  /**
   * Defines an event name. This is required if you want to use a regex to add a listener to multiple events at once. If you don't do this then how do you expect it to know what event to add to? Should it just add to every possible match for a regex? No. That is scary and bad.
   * You need to tell it what event names should be matched by a regex.
   *
   * @param {String} evt Name of the event to create.
   * @return {Object} Current instance of EventEmitter for chaining.
   */
  proto.defineEvent = function defineEvent(evt) {
    this.getListeners(evt);
    return this;
  };

  /**
   * Uses defineEvent to define multiple events.
   *
   * @param {String[]} evts An array of event names to define.
   * @return {Object} Current instance of EventEmitter for chaining.
   */
  proto.defineEvents = function defineEvents(evts) {
    for (var i = 0; i < evts.length; i += 1) {
      this.defineEvent(evts[i]);
    }
    return this;
  };

  /**
   * Removes a listener function from the specified event.
   * When passed a regular expression as the event name, it will remove the listener from all events that match it.
   *
   * @param {String|RegExp} evt Name of the event to remove the listener from.
   * @param {Function} listener Method to remove from the event.
   * @return {Object} Current instance of EventEmitter for chaining.
   */
  proto.removeListener = function removeListener(evt, listener) {
    var listeners = this.getListenersAsObject(evt);
    var index;
    var key;

    for (key in listeners) {
      if (listeners.hasOwnProperty(key)) {
        index = indexOfListener(listeners[key], listener);

        if (index !== -1) {
          listeners[key].splice(index, 1);
        }
      }
    }

    return this;
  };

  /**
   * Alias of removeListener
   */
  proto.off = alias('removeListener');

  /**
   * Adds listeners in bulk using the manipulateListeners method.
   * If you pass an object as the second argument you can add to multiple events at once. The object should contain key value pairs of events and listeners or listener arrays. You can also pass it an event name and an array of listeners to be added.
   * You can also pass it a regular expression to add the array of listeners to all events that match it.
   * Yeah, this function does quite a bit. That's probably a bad thing.
   *
   * @param {String|Object|RegExp} evt An event name if you will pass an array of listeners next. An object if you wish to add to multiple events at once.
   * @param {Function[]} [listeners] An optional array of listener functions to add.
   * @return {Object} Current instance of EventEmitter for chaining.
   */
  proto.addListeners = function addListeners(evt, listeners) {
    // Pass through to manipulateListeners
    return this.manipulateListeners(false, evt, listeners);
  };

  /**
   * Removes listeners in bulk using the manipulateListeners method.
   * If you pass an object as the second argument you can remove from multiple events at once. The object should contain key value pairs of events and listeners or listener arrays.
   * You can also pass it an event name and an array of listeners to be removed.
   * You can also pass it a regular expression to remove the listeners from all events that match it.
   *
   * @param {String|Object|RegExp} evt An event name if you will pass an array of listeners next. An object if you wish to remove from multiple events at once.
   * @param {Function[]} [listeners] An optional array of listener functions to remove.
   * @return {Object} Current instance of EventEmitter for chaining.
   */
  proto.removeListeners = function removeListeners(evt, listeners) {
    // Pass through to manipulateListeners
    return this.manipulateListeners(true, evt, listeners);
  };

  /**
   * Edits listeners in bulk. The addListeners and removeListeners methods both use this to do their job. You should really use those instead, this is a little lower level.
   * The first argument will determine if the listeners are removed (true) or added (false).
   * If you pass an object as the second argument you can add/remove from multiple events at once. The object should contain key value pairs of events and listeners or listener arrays.
   * You can also pass it an event name and an array of listeners to be added/removed.
   * You can also pass it a regular expression to manipulate the listeners of all events that match it.
   *
   * @param {Boolean} remove True if you want to remove listeners, false if you want to add.
   * @param {String|Object|RegExp} evt An event name if you will pass an array of listeners next. An object if you wish to add/remove from multiple events at once.
   * @param {Function[]} [listeners] An optional array of listener functions to add/remove.
   * @return {Object} Current instance of EventEmitter for chaining.
   */
  proto.manipulateListeners = function manipulateListeners(remove, evt, listeners) {
    var i;
    var value;
    var single = remove ? this.removeListener : this.addListener;
    var multiple = remove ? this.removeListeners : this.addListeners;

    // If evt is an object then pass each of it's properties to this method
    if (typeof evt === 'object' && !(evt instanceof RegExp)) {
      for (i in evt) {
        if (evt.hasOwnProperty(i) && (value = evt[i])) {
          // Pass the single listener straight through to the singular method
          if (typeof value === 'function') {
            single.call(this, i, value);
          }
          else {
            // Otherwise pass back to the multiple function
            multiple.call(this, i, value);
          }
        }
      }
    }
    else {
      // So evt must be a string
      // And listeners must be an array of listeners
      // Loop over it and pass each one to the multiple method
      i = listeners.length;
      while (i--) {
        single.call(this, evt, listeners[i]);
      }
    }

    return this;
  };

  /**
   * Removes all listeners from a specified event.
   * If you do not specify an event then all listeners will be removed.
   * That means every event will be emptied.
   * You can also pass a regex to remove all events that match it.
   *
   * @param {String|RegExp} [evt] Optional name of the event to remove all listeners for. Will remove from every event if not passed.
   * @return {Object} Current instance of EventEmitter for chaining.
   */
  proto.removeEvent = function removeEvent(evt) {
    var type = typeof evt;
    var events = this._getEvents();
    var key;

    // Remove different things depending on the state of evt
    if (type === 'string') {
      // Remove all listeners for the specified event
      delete events[evt];
    }
    else if (type === 'object') {
      // Remove all events matching the regex.
      for (key in events) {
        if (events.hasOwnProperty(key) && evt.test(key)) {
          delete events[key];
        }
      }
    }
    else {
      // Remove all listeners in all events
      delete this._events;
    }

    return this;
  };

  /**
   * Alias of removeEvent.
   *
   * Added to mirror the node API.
   */
  proto.removeAllListeners = alias('removeEvent');

  /**
   * Emits an event of your choice.
   * When emitted, every listener attached to that event will be executed.
   * If you pass the optional argument array then those arguments will be passed to every listener upon execution.
   * Because it uses `apply`, your array of arguments will be passed as if you wrote them out separately.
   * So they will not arrive within the array on the other side, they will be separate.
   * You can also pass a regular expression to emit to all events that match it.
   *
   * @param {String|RegExp} evt Name of the event to emit and execute listeners for.
   * @param {Array} [args] Optional array of arguments to be passed to each listener.
   * @return {Object} Current instance of EventEmitter for chaining.
   */
  proto.emitEvent = function emitEvent(evt, args) {
    var listeners = this.getListenersAsObject(evt);
    var listener;
    var i;
    var key;
    var response;

    for (key in listeners) {
      if (listeners.hasOwnProperty(key)) {
        i = listeners[key].length;

        while (i--) {
          // If the listener returns true then it shall be removed from the event
          // The function is executed either with a basic call or an apply if there is an args array
          listener = listeners[key][i];

          if (listener.once === true) {
            this.removeListener(evt, listener.listener);
          }

          response = listener.listener.apply(this, args || []);

          if (response === this._getOnceReturnValue()) {
            this.removeListener(evt, listener.listener);
          }
        }
      }
    }

    return this;
  };

  /**
   * Alias of emitEvent
   */
  proto.trigger = alias('emitEvent');

  /**
   * Subtly different from emitEvent in that it will pass its arguments on to the listeners, as opposed to taking a single array of arguments to pass on.
   * As with emitEvent, you can pass a regex in place of the event name to emit to all events that match it.
   *
   * @param {String|RegExp} evt Name of the event to emit and execute listeners for.
   * @param {...*} Optional additional arguments to be passed to each listener.
   * @return {Object} Current instance of EventEmitter for chaining.
   */
  proto.emit = function emit(evt) {
    var args = Array.prototype.slice.call(arguments, 1);
    return this.emitEvent(evt, args);
  };

  /**
   * Sets the current value to check against when executing listeners. If a
   * listeners return value matches the one set here then it will be removed
   * after execution. This value defaults to true.
   *
   * @param {*} value The new value to check for when executing listeners.
   * @return {Object} Current instance of EventEmitter for chaining.
   */
  proto.setOnceReturnValue = function setOnceReturnValue(value) {
    this._onceReturnValue = value;
    return this;
  };

  /**
   * Fetches the current value to check against when executing listeners. If
   * the listeners return value matches this one then it should be removed
   * automatically. It will return true by default.
   *
   * @return {*|Boolean} The current value to check for or the default, true.
   * @api private
   */
  proto._getOnceReturnValue = function _getOnceReturnValue() {
    if (this.hasOwnProperty('_onceReturnValue')) {
      return this._onceReturnValue;
    }
    else {
      return true;
    }
  };

  /**
   * Fetches the events object and creates one if required.
   *
   * @return {Object} The events storage object.
   * @api private
   */
  proto._getEvents = function _getEvents() {
    return this._events || (this._events = {});
  };

  /**
   * Reverts the global {@link EventEmitter} to its previous value and returns a reference to this version.
   *
   * @return {Function} Non conflicting EventEmitter class.
   */
  EventEmitter.noConflict = function noConflict() {
    exports.EventEmitter = originalGlobalValue;
    return EventEmitter;
  };

  // Expose the class either via AMD, CommonJS or the global object
  if (typeof define === 'function' && define.amd) {
    define('eventEmitter/EventEmitter',[],function () {
      return EventEmitter;
    });
  }
  else if (typeof module === 'object' && module.exports){
    module.exports = EventEmitter;
  }
  else {
    this.EventEmitter = EventEmitter;
  }
}.call(this));

/*!
 * eventie v1.0.4
 * event binding helper
 *   eventie.bind( elem, 'click', myFn )
 *   eventie.unbind( elem, 'click', myFn )
 */

/*jshint browser: true, undef: true, unused: true */
/*global define: false */

( function( window ) {



var docElem = document.documentElement;

var bind = function() {};

function getIEEvent( obj ) {
  var event = window.event;
  // add event.target
  event.target = event.target || event.srcElement || obj;
  return event;
}

if ( docElem.addEventListener ) {
  bind = function( obj, type, fn ) {
    obj.addEventListener( type, fn, false );
  };
} else if ( docElem.attachEvent ) {
  bind = function( obj, type, fn ) {
    obj[ type + fn ] = fn.handleEvent ?
      function() {
        var event = getIEEvent( obj );
        fn.handleEvent.call( fn, event );
      } :
      function() {
        var event = getIEEvent( obj );
        fn.call( obj, event );
      };
    obj.attachEvent( "on" + type, obj[ type + fn ] );
  };
}

var unbind = function() {};

if ( docElem.removeEventListener ) {
  unbind = function( obj, type, fn ) {
    obj.removeEventListener( type, fn, false );
  };
} else if ( docElem.detachEvent ) {
  unbind = function( obj, type, fn ) {
    obj.detachEvent( "on" + type, obj[ type + fn ] );
    try {
      delete obj[ type + fn ];
    } catch ( err ) {
      // can't delete window object properties
      obj[ type + fn ] = undefined;
    }
  };
}

var eventie = {
  bind: bind,
  unbind: unbind
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( 'eventie/eventie',eventie );
} else {
  // browser global
  window.eventie = eventie;
}

})( this );

/*!
 * imagesLoaded v3.1.8
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

( function( window, factory ) { 
  // universal module definition

  /*global define: false, module: false, require: false */

  if ( typeof define === 'function' && define.amd ) {
    // AMD
    define( [
      'eventEmitter/EventEmitter',
      'eventie/eventie'
    ], function( EventEmitter, eventie ) {
      return factory( window, EventEmitter, eventie );
    });
  } else if ( typeof exports === 'object' ) {
    // CommonJS
    module.exports = factory(
      window,
      require('wolfy87-eventemitter'),
      require('eventie')
    );
  } else {
    // browser global
    window.imagesLoaded = factory(
      window,
      window.EventEmitter,
      window.eventie
    );
  }

})( window,

// --------------------------  factory -------------------------- //

function factory( window, EventEmitter, eventie ) {



var $ = window.jQuery;
var console = window.console;
var hasConsole = typeof console !== 'undefined';

// -------------------------- helpers -------------------------- //

// extend objects
function extend( a, b ) {
  for ( var prop in b ) {
    a[ prop ] = b[ prop ];
  }
  return a;
}

var objToString = Object.prototype.toString;
function isArray( obj ) {
  return objToString.call( obj ) === '[object Array]';
}

// turn element or nodeList into an array
function makeArray( obj ) {
  var ary = [];
  if ( isArray( obj ) ) {
    // use object if already an array
    ary = obj;
  } else if ( typeof obj.length === 'number' ) {
    // convert nodeList to array
    for ( var i=0, len = obj.length; i < len; i++ ) {
      ary.push( obj[i] );
    }
  } else {
    // array of single index
    ary.push( obj );
  }
  return ary;
}

  // -------------------------- imagesLoaded -------------------------- //

  /**
   * @param {Array, Element, NodeList, String} elem
   * @param {Object or Function} options - if function, use as callback
   * @param {Function} onAlways - callback function
   */
  function ImagesLoaded( elem, options, onAlways ) {
    // coerce ImagesLoaded() without new, to be new ImagesLoaded()
    if ( !( this instanceof ImagesLoaded ) ) {
      return new ImagesLoaded( elem, options );
    }
    // use elem as selector string
    if ( typeof elem === 'string' ) {
      elem = document.querySelectorAll( elem );
    }

    this.elements = makeArray( elem );
    this.options = extend( {}, this.options );

    if ( typeof options === 'function' ) {
      onAlways = options;
    } else {
      extend( this.options, options );
    }

    if ( onAlways ) {
      this.on( 'always', onAlways );
    }

    this.getImages();

    if ( $ ) {
      // add jQuery Deferred object
      this.jqDeferred = new $.Deferred();
    }

    // HACK check async to allow time to bind listeners
    var _this = this;
    setTimeout( function() {
      _this.check();
    });
  }

  ImagesLoaded.prototype = new EventEmitter();

  ImagesLoaded.prototype.options = {};

  ImagesLoaded.prototype.getImages = function() {
    this.images = [];

    // filter & find items if we have an item selector
    for ( var i=0, len = this.elements.length; i < len; i++ ) {
      var elem = this.elements[i];
      // filter siblings
      if ( elem.nodeName === 'IMG' ) {
        this.addImage( elem );
      }
      // find children
      // no non-element nodes, #143
      var nodeType = elem.nodeType;
      if ( !nodeType || !( nodeType === 1 || nodeType === 9 || nodeType === 11 ) ) {
        continue;
      }
      var childElems = elem.querySelectorAll('img');
      // concat childElems to filterFound array
      for ( var j=0, jLen = childElems.length; j < jLen; j++ ) {
        var img = childElems[j];
        this.addImage( img );
      }
    }
  };

  /**
   * @param {Image} img
   */
  ImagesLoaded.prototype.addImage = function( img ) {
    var loadingImage = new LoadingImage( img );
    this.images.push( loadingImage );
  };

  ImagesLoaded.prototype.check = function() {
    var _this = this;
    var checkedCount = 0;
    var length = this.images.length;
    this.hasAnyBroken = false;
    // complete if no images
    if ( !length ) {
      this.complete();
      return;
    }

    function onConfirm( image, message ) {
      if ( _this.options.debug && hasConsole ) {
        //console.log( 'confirm', image, message );
      }

      _this.progress( image );
      checkedCount++;
      if ( checkedCount === length ) {
        _this.complete();
      }
      return true; // bind once
    }

    for ( var i=0; i < length; i++ ) {
      var loadingImage = this.images[i];
      loadingImage.on( 'confirm', onConfirm );
      loadingImage.check();
    }
  };

  ImagesLoaded.prototype.progress = function( image ) {
    this.hasAnyBroken = this.hasAnyBroken || !image.isLoaded;
    // HACK - Chrome triggers event before object properties have changed. #83
    var _this = this;
    setTimeout( function() {
      _this.emit( 'progress', _this, image );
      if ( _this.jqDeferred && _this.jqDeferred.notify ) {
        _this.jqDeferred.notify( _this, image );
      }
    });
  };

  ImagesLoaded.prototype.complete = function() {
    var eventName = this.hasAnyBroken ? 'fail' : 'done';
    this.isComplete = true;
    var _this = this;
    // HACK - another setTimeout so that confirm happens after progress
    setTimeout( function() {
      _this.emit( eventName, _this );
      _this.emit( 'always', _this );
      if ( _this.jqDeferred ) {
        var jqMethod = _this.hasAnyBroken ? 'reject' : 'resolve';
        _this.jqDeferred[ jqMethod ]( _this );
      }
    });
  };

  // -------------------------- jquery -------------------------- //

  if ( $ ) {
    $.fn.imagesLoaded = function( options, callback ) {
      var instance = new ImagesLoaded( this, options, callback );
      return instance.jqDeferred.promise( $(this) );
    };
  }


  // --------------------------  -------------------------- //

  function LoadingImage( img ) {
    this.img = img;
  }

  LoadingImage.prototype = new EventEmitter();

  LoadingImage.prototype.check = function() {
    // first check cached any previous images that have same src
    var resource = cache[ this.img.src ] || new Resource( this.img.src );
    if ( resource.isConfirmed ) {
      this.confirm( resource.isLoaded, 'cached was confirmed' );
      return;
    }

    // If complete is true and browser supports natural sizes,
    // try to check for image status manually.
    if ( this.img.complete && this.img.naturalWidth !== undefined ) {
      // report based on naturalWidth
      this.confirm( this.img.naturalWidth !== 0, 'naturalWidth' );
      return;
    }

    // If none of the checks above matched, simulate loading on detached element.
    var _this = this;
    resource.on( 'confirm', function( resrc, message ) {
      _this.confirm( resrc.isLoaded, message );
      return true;
    });

    resource.check();
  };

  LoadingImage.prototype.confirm = function( isLoaded, message ) {
    this.isLoaded = isLoaded;
    this.emit( 'confirm', this, message );
  };

  // -------------------------- Resource -------------------------- //

  // Resource checks each src, only once
  // separate class from LoadingImage to prevent memory leaks. See #115

  var cache = {};

  function Resource( src ) {
    this.src = src;
    // add to cache
    cache[ src ] = this;
  }

  Resource.prototype = new EventEmitter();

  Resource.prototype.check = function() {
    // only trigger checking once
    if ( this.isChecked ) {
      return;
    }
    // simulate loading on detached element
    var proxyImage = new Image();
    eventie.bind( proxyImage, 'load', this );
    eventie.bind( proxyImage, 'error', this );
    proxyImage.src = this.src;
    // set flag
    this.isChecked = true;
  };

  // ----- events ----- //

  // trigger specified handler for event type
  Resource.prototype.handleEvent = function( event ) {
    var method = 'on' + event.type;
    if ( this[ method ] ) {
      this[ method ]( event );
    }
  };

  Resource.prototype.onload = function( event ) {
    this.confirm( true, 'onload' );
    this.unbindProxyEvents( event );
  };

  Resource.prototype.onerror = function( event ) {
    this.confirm( false, 'onerror' );
    this.unbindProxyEvents( event );
  };

  // ----- confirm ----- //

  Resource.prototype.confirm = function( isLoaded, message ) {
    this.isConfirmed = true;
    this.isLoaded = isLoaded;
    this.emit( 'confirm', this, message );
  };

  Resource.prototype.unbindProxyEvents = function( event ) {
    eventie.unbind( event.target, 'load', this );
    eventie.unbind( event.target, 'error', this );
  };

  // -----  ----- //

  return ImagesLoaded;

});

"function"!==typeof Object.create&&(Object.create=function(f){function g(){}g.prototype=f;return new g});
(function(f,g,k){var l={init:function(a,b){this.$elem=f(b);this.options=f.extend({},f.fn.owlCarousel.options,this.$elem.data(),a);this.userOptions=a;this.loadContent()},loadContent:function(){function a(a){var d,e="";if("function"===typeof b.options.jsonSuccess)b.options.jsonSuccess.apply(this,[a]);else{for(d in a.owl)a.owl.hasOwnProperty(d)&&(e+=a.owl[d].item);b.$elem.html(e)}b.logIn()}var b=this,e;"function"===typeof b.options.beforeInit&&b.options.beforeInit.apply(this,[b.$elem]);"string"===typeof b.options.jsonPath?
(e=b.options.jsonPath,f.getJSON(e,a)):b.logIn()},logIn:function(){this.$elem.data("owl-originalStyles",this.$elem.attr("style"));this.$elem.data("owl-originalClasses",this.$elem.attr("class"));this.$elem.css({opacity:0});this.orignalItems=this.options.items;this.checkBrowser();this.wrapperWidth=0;this.checkVisible=null;this.setVars()},setVars:function(){if(0===this.$elem.children().length)return!1;this.baseClass();this.eventTypes();this.$userItems=this.$elem.children();this.itemsAmount=this.$userItems.length;
this.wrapItems();this.$owlItems=this.$elem.find(".owl-item");this.$owlWrapper=this.$elem.find(".owl-wrapper");this.playDirection="next";this.prevItem=0;this.prevArr=[0];this.currentItem=0;this.customEvents();this.onStartup()},onStartup:function(){this.updateItems();this.calculateAll();this.buildControls();this.updateControls();this.response();this.moveEvents();this.stopOnHover();this.owlStatus();!1!==this.options.transitionStyle&&this.transitionTypes(this.options.transitionStyle);!0===this.options.autoPlay&&
(this.options.autoPlay=5E3);this.play();this.$elem.find(".owl-wrapper").css("display","block");this.$elem.is(":visible")?this.$elem.css("opacity",1):this.watchVisibility();this.onstartup=!1;this.eachMoveUpdate();"function"===typeof this.options.afterInit&&this.options.afterInit.apply(this,[this.$elem])},eachMoveUpdate:function(){!0===this.options.lazyLoad&&this.lazyLoad();!0===this.options.autoHeight&&this.autoHeight();this.onVisibleItems();"function"===typeof this.options.afterAction&&this.options.afterAction.apply(this,
[this.$elem])},updateVars:function(){"function"===typeof this.options.beforeUpdate&&this.options.beforeUpdate.apply(this,[this.$elem]);this.watchVisibility();this.updateItems();this.calculateAll();this.updatePosition();this.updateControls();this.eachMoveUpdate();"function"===typeof this.options.afterUpdate&&this.options.afterUpdate.apply(this,[this.$elem])},reload:function(){var a=this;g.setTimeout(function(){a.updateVars()},0)},watchVisibility:function(){var a=this;if(!1===a.$elem.is(":visible"))a.$elem.css({opacity:0}),
g.clearInterval(a.autoPlayInterval),g.clearInterval(a.checkVisible);else return!1;a.checkVisible=g.setInterval(function(){a.$elem.is(":visible")&&(a.reload(),a.$elem.animate({opacity:1},200),g.clearInterval(a.checkVisible))},500)},wrapItems:function(){this.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"></div>');this.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">');this.wrapperOuter=this.$elem.find(".owl-wrapper-outer");this.$elem.css("display","block")},
baseClass:function(){var a=this.$elem.hasClass(this.options.baseClass),b=this.$elem.hasClass(this.options.theme);a||this.$elem.addClass(this.options.baseClass);b||this.$elem.addClass(this.options.theme)},updateItems:function(){var a,b;if(!1===this.options.responsive)return!1;if(!0===this.options.singleItem)return this.options.items=this.orignalItems=1,this.options.itemsCustom=!1,this.options.itemsDesktop=!1,this.options.itemsDesktopSmall=!1,this.options.itemsTablet=!1,this.options.itemsTabletSmall=
!1,this.options.itemsMobile=!1;a=f(this.options.responsiveBaseWidth).width();a>(this.options.itemsDesktop[0]||this.orignalItems)&&(this.options.items=this.orignalItems);if(!1!==this.options.itemsCustom)for(this.options.itemsCustom.sort(function(a,b){return a[0]-b[0]}),b=0;b<this.options.itemsCustom.length;b+=1)this.options.itemsCustom[b][0]<=a&&(this.options.items=this.options.itemsCustom[b][1]);else a<=this.options.itemsDesktop[0]&&!1!==this.options.itemsDesktop&&(this.options.items=this.options.itemsDesktop[1]),
a<=this.options.itemsDesktopSmall[0]&&!1!==this.options.itemsDesktopSmall&&(this.options.items=this.options.itemsDesktopSmall[1]),a<=this.options.itemsTablet[0]&&!1!==this.options.itemsTablet&&(this.options.items=this.options.itemsTablet[1]),a<=this.options.itemsTabletSmall[0]&&!1!==this.options.itemsTabletSmall&&(this.options.items=this.options.itemsTabletSmall[1]),a<=this.options.itemsMobile[0]&&!1!==this.options.itemsMobile&&(this.options.items=this.options.itemsMobile[1]);this.options.items>this.itemsAmount&&
!0===this.options.itemsScaleUp&&(this.options.items=this.itemsAmount)},response:function(){var a=this,b,e;if(!0!==a.options.responsive)return!1;e=f(g).width();a.resizer=function(){f(g).width()!==e&&(!1!==a.options.autoPlay&&g.clearInterval(a.autoPlayInterval),g.clearTimeout(b),b=g.setTimeout(function(){e=f(g).width();a.updateVars()},a.options.responsiveRefreshRate))};f(g).resize(a.resizer)},updatePosition:function(){this.jumpTo(this.currentItem);!1!==this.options.autoPlay&&this.checkAp()},appendItemsSizes:function(){var a=
this,b=0,e=a.itemsAmount-a.options.items;a.$owlItems.each(function(c){var d=f(this);d.css({width:a.itemWidth}).data("owl-item",Number(c));if(0===c%a.options.items||c===e)c>e||(b+=1);d.data("owl-roundPages",b)})},appendWrapperSizes:function(){this.$owlWrapper.css({width:this.$owlItems.length*this.itemWidth*2,left:0});this.appendItemsSizes()},calculateAll:function(){this.calculateWidth();this.appendWrapperSizes();this.loops();this.max()},calculateWidth:function(){this.itemWidth=Math.round(this.$elem.width()/
this.options.items)},max:function(){var a=-1*(this.itemsAmount*this.itemWidth-this.options.items*this.itemWidth);this.options.items>this.itemsAmount?this.maximumPixels=a=this.maximumItem=0:(this.maximumItem=this.itemsAmount-this.options.items,this.maximumPixels=a);return a},min:function(){return 0},loops:function(){var a=0,b=0,e,c;this.positionsInArray=[0];this.pagesInArray=[];for(e=0;e<this.itemsAmount;e+=1)b+=this.itemWidth,this.positionsInArray.push(-b),!0===this.options.scrollPerPage&&(c=f(this.$owlItems[e]),
c=c.data("owl-roundPages"),c!==a&&(this.pagesInArray[a]=this.positionsInArray[e],a=c))},buildControls:function(){if(!0===this.options.navigation||!0===this.options.pagination)this.owlControls=f('<div class="owl-controls"/>').toggleClass("clickable",!this.browser.isTouch).appendTo(this.$elem);!0===this.options.pagination&&this.buildPagination();!0===this.options.navigation&&this.buildButtons()},buildButtons:function(){var a=this,b=f('<div class="owl-buttons"/>');a.owlControls.append(b);a.buttonPrev=
f("<div/>",{"class":"owl-prev",html:a.options.navigationText[0]||""});a.buttonNext=f("<div/>",{"class":"owl-next",html:a.options.navigationText[1]||""});b.append(a.buttonPrev).append(a.buttonNext);b.on("touchstart.owlControls mousedown.owlControls",'div[class^="owl"]',function(a){a.preventDefault()});b.on("touchend.owlControls mouseup.owlControls",'div[class^="owl"]',function(b){b.preventDefault();f(this).hasClass("owl-next")?a.next():a.prev()})},buildPagination:function(){var a=this;a.paginationWrapper=
f('<div class="owl-pagination"/>');a.owlControls.append(a.paginationWrapper);a.paginationWrapper.on("touchend.owlControls mouseup.owlControls",".owl-page",function(b){b.preventDefault();Number(f(this).data("owl-page"))!==a.currentItem&&a.goTo(Number(f(this).data("owl-page")),!0)})},updatePagination:function(){var a,b,e,c,d,g;if(!1===this.options.pagination)return!1;this.paginationWrapper.html("");a=0;b=this.itemsAmount-this.itemsAmount%this.options.items;for(c=0;c<this.itemsAmount;c+=1)0===c%this.options.items&&
(a+=1,b===c&&(e=this.itemsAmount-this.options.items),d=f("<div/>",{"class":"owl-page"}),g=f("<span></span>",{text:!0===this.options.paginationNumbers?a:"","class":!0===this.options.paginationNumbers?"owl-numbers":""}),d.append(g),d.data("owl-page",b===c?e:c),d.data("owl-roundPages",a),this.paginationWrapper.append(d));this.checkPagination()},checkPagination:function(){var a=this;if(!1===a.options.pagination)return!1;a.paginationWrapper.find(".owl-page").each(function(){f(this).data("owl-roundPages")===
f(a.$owlItems[a.currentItem]).data("owl-roundPages")&&(a.paginationWrapper.find(".owl-page").removeClass("active"),f(this).addClass("active"))})},checkNavigation:function(){if(!1===this.options.navigation)return!1;!1===this.options.rewindNav&&(0===this.currentItem&&0===this.maximumItem?(this.buttonPrev.addClass("disabled"),this.buttonNext.addClass("disabled")):0===this.currentItem&&0!==this.maximumItem?(this.buttonPrev.addClass("disabled"),this.buttonNext.removeClass("disabled")):this.currentItem===
this.maximumItem?(this.buttonPrev.removeClass("disabled"),this.buttonNext.addClass("disabled")):0!==this.currentItem&&this.currentItem!==this.maximumItem&&(this.buttonPrev.removeClass("disabled"),this.buttonNext.removeClass("disabled")))},updateControls:function(){this.updatePagination();this.checkNavigation();this.owlControls&&(this.options.items>=this.itemsAmount?this.owlControls.hide():this.owlControls.show())},destroyControls:function(){this.owlControls&&this.owlControls.remove()},next:function(a){if(this.isTransition)return!1;
this.currentItem+=!0===this.options.scrollPerPage?this.options.items:1;if(this.currentItem>this.maximumItem+(!0===this.options.scrollPerPage?this.options.items-1:0))if(!0===this.options.rewindNav)this.currentItem=0,a="rewind";else return this.currentItem=this.maximumItem,!1;this.goTo(this.currentItem,a)},prev:function(a){if(this.isTransition)return!1;this.currentItem=!0===this.options.scrollPerPage&&0<this.currentItem&&this.currentItem<this.options.items?0:this.currentItem-(!0===this.options.scrollPerPage?
this.options.items:1);if(0>this.currentItem)if(!0===this.options.rewindNav)this.currentItem=this.maximumItem,a="rewind";else return this.currentItem=0,!1;this.goTo(this.currentItem,a)},goTo:function(a,b,e){var c=this;if(c.isTransition)return!1;"function"===typeof c.options.beforeMove&&c.options.beforeMove.apply(this,[c.$elem]);a>=c.maximumItem?a=c.maximumItem:0>=a&&(a=0);c.currentItem=c.owl.currentItem=a;if(!1!==c.options.transitionStyle&&"drag"!==e&&1===c.options.items&&!0===c.browser.support3d)return c.swapSpeed(0),
!0===c.browser.support3d?c.transition3d(c.positionsInArray[a]):c.css2slide(c.positionsInArray[a],1),c.afterGo(),c.singleItemTransition(),!1;a=c.positionsInArray[a];!0===c.browser.support3d?(c.isCss3Finish=!1,!0===b?(c.swapSpeed("paginationSpeed"),g.setTimeout(function(){c.isCss3Finish=!0},c.options.paginationSpeed)):"rewind"===b?(c.swapSpeed(c.options.rewindSpeed),g.setTimeout(function(){c.isCss3Finish=!0},c.options.rewindSpeed)):(c.swapSpeed("slideSpeed"),g.setTimeout(function(){c.isCss3Finish=!0},
c.options.slideSpeed)),c.transition3d(a)):!0===b?c.css2slide(a,c.options.paginationSpeed):"rewind"===b?c.css2slide(a,c.options.rewindSpeed):c.css2slide(a,c.options.slideSpeed);c.afterGo()},jumpTo:function(a){"function"===typeof this.options.beforeMove&&this.options.beforeMove.apply(this,[this.$elem]);a>=this.maximumItem||-1===a?a=this.maximumItem:0>=a&&(a=0);this.swapSpeed(0);!0===this.browser.support3d?this.transition3d(this.positionsInArray[a]):this.css2slide(this.positionsInArray[a],1);this.currentItem=
this.owl.currentItem=a;this.afterGo()},afterGo:function(){this.prevArr.push(this.currentItem);this.prevItem=this.owl.prevItem=this.prevArr[this.prevArr.length-2];this.prevArr.shift(0);this.prevItem!==this.currentItem&&(this.checkPagination(),this.checkNavigation(),this.eachMoveUpdate(),!1!==this.options.autoPlay&&this.checkAp());"function"===typeof this.options.afterMove&&this.prevItem!==this.currentItem&&this.options.afterMove.apply(this,[this.$elem])},stop:function(){this.apStatus="stop";g.clearInterval(this.autoPlayInterval)},
checkAp:function(){"stop"!==this.apStatus&&this.play()},play:function(){var a=this;a.apStatus="play";if(!1===a.options.autoPlay)return!1;g.clearInterval(a.autoPlayInterval);a.autoPlayInterval=g.setInterval(function(){a.next(!0)},a.options.autoPlay)},swapSpeed:function(a){"slideSpeed"===a?this.$owlWrapper.css(this.addCssSpeed(this.options.slideSpeed)):"paginationSpeed"===a?this.$owlWrapper.css(this.addCssSpeed(this.options.paginationSpeed)):"string"!==typeof a&&this.$owlWrapper.css(this.addCssSpeed(a))},
addCssSpeed:function(a){return{"-webkit-transition":"all "+a+"ms ease","-moz-transition":"all "+a+"ms ease","-o-transition":"all "+a+"ms ease",transition:"all "+a+"ms ease"}},removeTransition:function(){return{"-webkit-transition":"","-moz-transition":"","-o-transition":"",transition:""}},doTranslate:function(a){return{"-webkit-transform":"translate3d("+a+"px, 0px, 0px)","-moz-transform":"translate3d("+a+"px, 0px, 0px)","-o-transform":"translate3d("+a+"px, 0px, 0px)","-ms-transform":"translate3d("+
a+"px, 0px, 0px)",transform:"translate3d("+a+"px, 0px,0px)"}},transition3d:function(a){this.$owlWrapper.css(this.doTranslate(a))},css2move:function(a){this.$owlWrapper.css({left:a})},css2slide:function(a,b){var e=this;e.isCssFinish=!1;e.$owlWrapper.stop(!0,!0).animate({left:a},{duration:b||e.options.slideSpeed,complete:function(){e.isCssFinish=!0}})},checkBrowser:function(){var a=k.createElement("div");a.style.cssText="  -moz-transform:translate3d(0px, 0px, 0px); -ms-transform:translate3d(0px, 0px, 0px); -o-transform:translate3d(0px, 0px, 0px); -webkit-transform:translate3d(0px, 0px, 0px); transform:translate3d(0px, 0px, 0px)";
a=a.style.cssText.match(/translate3d\(0px, 0px, 0px\)/g);this.browser={support3d:null!==a&&1===a.length,isTouch:"ontouchstart"in g||g.navigator.msMaxTouchPoints}},moveEvents:function(){if(!1!==this.options.mouseDrag||!1!==this.options.touchDrag)this.gestures(),this.disabledEvents()},eventTypes:function(){var a=["s","e","x"];this.ev_types={};!0===this.options.mouseDrag&&!0===this.options.touchDrag?a=["touchstart.owl mousedown.owl","touchmove.owl mousemove.owl","touchend.owl touchcancel.owl mouseup.owl"]:
!1===this.options.mouseDrag&&!0===this.options.touchDrag?a=["touchstart.owl","touchmove.owl","touchend.owl touchcancel.owl"]:!0===this.options.mouseDrag&&!1===this.options.touchDrag&&(a=["mousedown.owl","mousemove.owl","mouseup.owl"]);this.ev_types.start=a[0];this.ev_types.move=a[1];this.ev_types.end=a[2]},disabledEvents:function(){this.$elem.on("dragstart.owl",function(a){a.preventDefault()});this.$elem.on("mousedown.disableTextSelect",function(a){return f(a.target).is("input, textarea, select, option")})},
gestures:function(){function a(a){if(void 0!==a.touches)return{x:a.touches[0].pageX,y:a.touches[0].pageY};if(void 0===a.touches){if(void 0!==a.pageX)return{x:a.pageX,y:a.pageY};if(void 0===a.pageX)return{x:a.clientX,y:a.clientY}}}function b(a){"on"===a?(f(k).on(d.ev_types.move,e),f(k).on(d.ev_types.end,c)):"off"===a&&(f(k).off(d.ev_types.move),f(k).off(d.ev_types.end))}function e(b){b=b.originalEvent||b||g.event;d.newPosX=a(b).x-h.offsetX;d.newPosY=a(b).y-h.offsetY;d.newRelativeX=d.newPosX-h.relativePos;
"function"===typeof d.options.startDragging&&!0!==h.dragging&&0!==d.newRelativeX&&(h.dragging=!0,d.options.startDragging.apply(d,[d.$elem]));(8<d.newRelativeX||-8>d.newRelativeX)&&!0===d.browser.isTouch&&(void 0!==b.preventDefault?b.preventDefault():b.returnValue=!1,h.sliding=!0);(10<d.newPosY||-10>d.newPosY)&&!1===h.sliding&&f(k).off("touchmove.owl");d.newPosX=Math.max(Math.min(d.newPosX,d.newRelativeX/5),d.maximumPixels+d.newRelativeX/5);!0===d.browser.support3d?d.transition3d(d.newPosX):d.css2move(d.newPosX)}
function c(a){a=a.originalEvent||a||g.event;var c;a.target=a.target||a.srcElement;h.dragging=!1;!0!==d.browser.isTouch&&d.$owlWrapper.removeClass("grabbing");d.dragDirection=0>d.newRelativeX?d.owl.dragDirection="left":d.owl.dragDirection="right";0!==d.newRelativeX&&(c=d.getNewPosition(),d.goTo(c,!1,"drag"),h.targetElement===a.target&&!0!==d.browser.isTouch&&(f(a.target).on("click.disable",function(a){a.stopImmediatePropagation();a.stopPropagation();a.preventDefault();f(a.target).off("click.disable")}),
a=f._data(a.target,"events").click,c=a.pop(),a.splice(0,0,c)));b("off")}var d=this,h={offsetX:0,offsetY:0,baseElWidth:0,relativePos:0,position:null,minSwipe:null,maxSwipe:null,sliding:null,dargging:null,targetElement:null};d.isCssFinish=!0;d.$elem.on(d.ev_types.start,".owl-wrapper",function(c){c=c.originalEvent||c||g.event;var e;if(3===c.which)return!1;if(!(d.itemsAmount<=d.options.items)){if(!1===d.isCssFinish&&!d.options.dragBeforeAnimFinish||!1===d.isCss3Finish&&!d.options.dragBeforeAnimFinish)return!1;
!1!==d.options.autoPlay&&g.clearInterval(d.autoPlayInterval);!0===d.browser.isTouch||d.$owlWrapper.hasClass("grabbing")||d.$owlWrapper.addClass("grabbing");d.newPosX=0;d.newRelativeX=0;f(this).css(d.removeTransition());e=f(this).position();h.relativePos=e.left;h.offsetX=a(c).x-e.left;h.offsetY=a(c).y-e.top;b("on");h.sliding=!1;h.targetElement=c.target||c.srcElement}})},getNewPosition:function(){var a=this.closestItem();a>this.maximumItem?a=this.currentItem=this.maximumItem:0<=this.newPosX&&(this.currentItem=
a=0);return a},closestItem:function(){var a=this,b=!0===a.options.scrollPerPage?a.pagesInArray:a.positionsInArray,e=a.newPosX,c=null;f.each(b,function(d,g){e-a.itemWidth/20>b[d+1]&&e-a.itemWidth/20<g&&"left"===a.moveDirection()?(c=g,a.currentItem=!0===a.options.scrollPerPage?f.inArray(c,a.positionsInArray):d):e+a.itemWidth/20<g&&e+a.itemWidth/20>(b[d+1]||b[d]-a.itemWidth)&&"right"===a.moveDirection()&&(!0===a.options.scrollPerPage?(c=b[d+1]||b[b.length-1],a.currentItem=f.inArray(c,a.positionsInArray)):
(c=b[d+1],a.currentItem=d+1))});return a.currentItem},moveDirection:function(){var a;0>this.newRelativeX?(a="right",this.playDirection="next"):(a="left",this.playDirection="prev");return a},customEvents:function(){var a=this;a.$elem.on("owl.next",function(){a.next()});a.$elem.on("owl.prev",function(){a.prev()});a.$elem.on("owl.play",function(b,e){a.options.autoPlay=e;a.play();a.hoverStatus="play"});a.$elem.on("owl.stop",function(){a.stop();a.hoverStatus="stop"});a.$elem.on("owl.goTo",function(b,e){a.goTo(e)});
a.$elem.on("owl.jumpTo",function(b,e){a.jumpTo(e)})},stopOnHover:function(){var a=this;!0===a.options.stopOnHover&&!0!==a.browser.isTouch&&!1!==a.options.autoPlay&&(a.$elem.on("mouseover",function(){a.stop()}),a.$elem.on("mouseout",function(){"stop"!==a.hoverStatus&&a.play()}))},lazyLoad:function(){var a,b,e,c,d;if(!1===this.options.lazyLoad)return!1;for(a=0;a<this.itemsAmount;a+=1)b=f(this.$owlItems[a]),"loaded"!==b.data("owl-loaded")&&(e=b.data("owl-item"),c=b.find(".lazyOwl"),"string"!==typeof c.data("src")?
b.data("owl-loaded","loaded"):(void 0===b.data("owl-loaded")&&(c.hide(),b.addClass("loading").data("owl-loaded","checked")),(d=!0===this.options.lazyFollow?e>=this.currentItem:!0)&&e<this.currentItem+this.options.items&&c.length&&this.lazyPreload(b,c)))},lazyPreload:function(a,b){function e(){a.data("owl-loaded","loaded").removeClass("loading");b.removeAttr("data-src");"fade"===d.options.lazyEffect?b.fadeIn(400):b.show();"function"===typeof d.options.afterLazyLoad&&d.options.afterLazyLoad.apply(this,
[d.$elem])}function c(){f+=1;d.completeImg(b.get(0))||!0===k?e():100>=f?g.setTimeout(c,100):e()}var d=this,f=0,k;"DIV"===b.prop("tagName")?(b.css("background-image","url("+b.data("src")+")"),k=!0):b[0].src=b.data("src");c()},autoHeight:function(){function a(){var a=f(e.$owlItems[e.currentItem]).height();e.wrapperOuter.css("height",a+"px");e.wrapperOuter.hasClass("autoHeight")||g.setTimeout(function(){e.wrapperOuter.addClass("autoHeight")},0)}function b(){d+=1;e.completeImg(c.get(0))?a():100>=d?g.setTimeout(b,
100):e.wrapperOuter.css("height","")}var e=this,c=f(e.$owlItems[e.currentItem]).find("img"),d;void 0!==c.get(0)?(d=0,b()):a()},completeImg:function(a){return!a.complete||"undefined"!==typeof a.naturalWidth&&0===a.naturalWidth?!1:!0},onVisibleItems:function(){var a;!0===this.options.addClassActive&&this.$owlItems.removeClass("active");this.visibleItems=[];for(a=this.currentItem;a<this.currentItem+this.options.items;a+=1)this.visibleItems.push(a),!0===this.options.addClassActive&&f(this.$owlItems[a]).addClass("active");
this.owl.visibleItems=this.visibleItems},transitionTypes:function(a){this.outClass="owl-"+a+"-out";this.inClass="owl-"+a+"-in"},singleItemTransition:function(){var a=this,b=a.outClass,e=a.inClass,c=a.$owlItems.eq(a.currentItem),d=a.$owlItems.eq(a.prevItem),f=Math.abs(a.positionsInArray[a.currentItem])+a.positionsInArray[a.prevItem],g=Math.abs(a.positionsInArray[a.currentItem])+a.itemWidth/2;a.isTransition=!0;a.$owlWrapper.addClass("owl-origin").css({"-webkit-transform-origin":g+"px","-moz-perspective-origin":g+
"px","perspective-origin":g+"px"});d.css({position:"relative",left:f+"px"}).addClass(b).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend",function(){a.endPrev=!0;d.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend");a.clearTransStyle(d,b)});c.addClass(e).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend",function(){a.endCurrent=!0;c.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend");a.clearTransStyle(c,e)})},clearTransStyle:function(a,
b){a.css({position:"",left:""}).removeClass(b);this.endPrev&&this.endCurrent&&(this.$owlWrapper.removeClass("owl-origin"),this.isTransition=this.endCurrent=this.endPrev=!1)},owlStatus:function(){this.owl={userOptions:this.userOptions,baseElement:this.$elem,userItems:this.$userItems,owlItems:this.$owlItems,currentItem:this.currentItem,prevItem:this.prevItem,visibleItems:this.visibleItems,isTouch:this.browser.isTouch,browser:this.browser,dragDirection:this.dragDirection}},clearEvents:function(){this.$elem.off(".owl owl mousedown.disableTextSelect");
f(k).off(".owl owl");f(g).off("resize",this.resizer)},unWrap:function(){0!==this.$elem.children().length&&(this.$owlWrapper.unwrap(),this.$userItems.unwrap().unwrap(),this.owlControls&&this.owlControls.remove());this.clearEvents();this.$elem.attr("style",this.$elem.data("owl-originalStyles")||"").attr("class",this.$elem.data("owl-originalClasses"))},destroy:function(){this.stop();g.clearInterval(this.checkVisible);this.unWrap();this.$elem.removeData()},reinit:function(a){a=f.extend({},this.userOptions,
a);this.unWrap();this.init(a,this.$elem)},addItem:function(a,b){var e;if(!a)return!1;if(0===this.$elem.children().length)return this.$elem.append(a),this.setVars(),!1;this.unWrap();e=void 0===b||-1===b?-1:b;e>=this.$userItems.length||-1===e?this.$userItems.eq(-1).after(a):this.$userItems.eq(e).before(a);this.setVars()},removeItem:function(a){if(0===this.$elem.children().length)return!1;a=void 0===a||-1===a?-1:a;this.unWrap();this.$userItems.eq(a).remove();this.setVars()}};f.fn.owlCarousel=function(a){return this.each(function(){if(!0===
f(this).data("owl-init"))return!1;f(this).data("owl-init",!0);var b=Object.create(l);b.init(a,this);f.data(this,"owlCarousel",b)})};f.fn.owlCarousel.options={items:5,itemsCustom:!1,itemsDesktop:[1199,4],itemsDesktopSmall:[979,3],itemsTablet:[768,2],itemsTabletSmall:!1,itemsMobile:[479,1],singleItem:!1,itemsScaleUp:!1,slideSpeed:200,paginationSpeed:800,rewindSpeed:1E3,autoPlay:!1,stopOnHover:!1,navigation:!1,navigationText:["prev","next"],rewindNav:!0,scrollPerPage:!1,pagination:!0,paginationNumbers:!1,
responsive:!0,responsiveRefreshRate:200,responsiveBaseWidth:g,baseClass:"owl-carousel",theme:"owl-theme",lazyLoad:!1,lazyFollow:!0,lazyEffect:"fade",autoHeight:!1,jsonPath:!1,jsonSuccess:!1,dragBeforeAnimFinish:!0,mouseDrag:!0,touchDrag:!0,addClassActive:!1,transitionStyle:!1,beforeUpdate:!1,afterUpdate:!1,beforeInit:!1,afterInit:!1,beforeMove:!1,afterMove:!1,afterAction:!1,startDragging:!1,afterLazyLoad:!1}})(jQuery,window,document);




/*! Overthrow v.0.1.0. An overflow:auto polyfill for responsive design. (c) 2012: Scott Jehl, Filament Group, Inc. http://filamentgroup.github.com/Overthrow/license.txt */
(function( w, undefined ){
  
  var doc = w.document,
    docElem = doc.documentElement,
    classtext = "overthrow-enabled",
  
    // Touch events are used in the polyfill, and thus are a prerequisite
    canBeFilledWithPoly = "ontouchmove" in doc,
    
    // The following attempts to determine whether the browser has native overflow support
    // so we can enable it but not polyfill
    overflowProbablyAlreadyWorks = 
      // Features-first. iOS5 overflow scrolling property check - no UA needed here. thanks Apple :)
      "WebkitOverflowScrolling" in docElem.style ||
      // Touch events aren't supported and screen width is greater than X
      // ...basically, this is a loose "desktop browser" check. 
      // It may wrongly opt-in very large tablets with no touch support.
      ( !canBeFilledWithPoly && w.screen.width > 1200 ) ||
      // Hang on to your hats.
      // Whitelist some popular, overflow-supporting mobile browsers for now and the future
      // These browsers are known to get overlow support right, but give us no way of detecting it.
      (function(){
        var ua = w.navigator.userAgent,
          // Webkit crosses platforms, and the browsers on our list run at least version 534
          webkit = ua.match( /AppleWebKit\/([0-9]+)/ ),
          wkversion = webkit && webkit[1],
          wkLte534 = webkit && wkversion >= 534;
          
        return (
          /* Android 3+ with webkit gte 534
          ~: Mozilla/5.0 (Linux; U; Android 3.0; en-us; Xoom Build/HRI39) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13 */
          ua.match( /Android ([0-9]+)/ ) && RegExp.$1 >= 3 && wkLte534 ||
          /* Blackberry 7+ with webkit gte 534
          ~: Mozilla/5.0 (BlackBerry; U; BlackBerry 9900; en-US) AppleWebKit/534.11+ (KHTML, like Gecko) Version/7.0.0 Mobile Safari/534.11+ */
          ua.match( / Version\/([0-9]+)/ ) && RegExp.$1 >= 0 && w.blackberry && wkLte534 ||
          /* Blackberry Playbook with webkit gte 534
          ~: Mozilla/5.0 (PlayBook; U; RIM Tablet OS 1.0.0; en-US) AppleWebKit/534.8+ (KHTML, like Gecko) Version/0.0.1 Safari/534.8+ */   
          ua.indexOf( /PlayBook/ ) > -1 && RegExp.$1 >= 0 && wkLte534 ||
          /* Firefox Mobile (Fennec) 4 and up
          ~: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:2.1.1) Gecko/ Firefox/4.0.2pre Fennec/4.0. */
          ua.match( /Fennec\/([0-9]+)/ ) && RegExp.$1 >= 4 ||
          /* WebOS 3 and up (TouchPad too)
          ~: Mozilla/5.0 (hp-tablet; Linux; hpwOS/3.0.0; U; en-US) AppleWebKit/534.6 (KHTML, like Gecko) wOSBrowser/233.48 Safari/534.6 TouchPad/1.0 */
          ua.match( /wOSBrowser\/([0-9]+)/ ) && RegExp.$1 >= 233 && wkLte534 ||
          /* Nokia Browser N8
          ~: Mozilla/5.0 (Symbian/3; Series60/5.2 NokiaN8-00/012.002; Profile/MIDP-2.1 Configuration/CLDC-1.1 ) AppleWebKit/533.4 (KHTML, like Gecko) NokiaBrowser/7.3.0 Mobile Safari/533.4 3gpp-gba 
          ~: Note: the N9 doesn't have native overflow with one-finger touch. wtf */
          ua.match( /NokiaBrowser\/([0-9\.]+)/ ) && parseFloat(RegExp.$1) === 7.3 && webkit && wkversion >= 533
        );
      })(),
      
    // Easing can use any of Robert Penner's equations (http://www.robertpenner.com/easing_terms_of_use.html). By default, overthrow includes ease-out-cubic
    // arguments: t = current iteration, b = initial value, c = end value, d = total iterations
    // use w.overthrow.easing to provide a custom function externally, or pass an easing function as a callback to the toss method
    defaultEasing = function (t, b, c, d) {
      return c*((t=t/d-1)*t*t + 1) + b;
    },  
      
    enabled = false,
    
    // Keeper of intervals
    timeKeeper,
        
    /* toss scrolls and element with easing
    
    // elem is the element to scroll
    // options hash:
      * left is the desired horizontal scroll. Default is "+0". For relative distances, pass a string with "+" or "-" in front.
      * top is the desired vertical scroll. Default is "+0". For relative distances, pass a string with "+" or "-" in front.
      * duration is the number of milliseconds the throw will take. Default is 100.
      * easing is an optional custom easing function. Default is w.overthrow.easing. Must follow the easing function signature 
    */
    toss = function( elem, options ){
      var i = 0,
        sLeft = elem.scrollLeft,
        sTop = elem.scrollTop,
        // Toss defaults
        o = {
          top: "+0",
          left: "+0",
          duration: 100,
          easing: w.overthrow.easing
        },
        endLeft, endTop;
      
      // Mixin based on predefined defaults
      if( options ){
        for( var j in o ){
          if( options[ j ] !== undefined ){
            o[ j ] = options[ j ];
          }
        }
      }
      
      // Convert relative values to ints
      // First the left val
      if( typeof o.left === "string" ){
        o.left = parseFloat( o.left );
        endLeft = o.left + sLeft;
      }
      else {
        endLeft = o.left;
        o.left = o.left - sLeft;
      }
      // Then the top val
      if( typeof o.top === "string" ){
        o.top = parseFloat( o.top );
        endTop = o.top + sTop;
      }
      else {
        endTop = o.top;
        o.top = o.top - sTop;
      }

      timeKeeper = setInterval(function(){          
        if( i++ < o.duration ){
          elem.scrollLeft = o.easing( i, sLeft, o.left, o.duration );
          elem.scrollTop = o.easing( i, sTop, o.top, o.duration );
        }
        else{
          if( endLeft !== elem.scrollLeft ){
            elem.scrollLeft = endLeft;
          }
          if( endTop !== elem.scrollTop ){
            elem.scrollTop = endTop;
          }
          intercept();
        }
      }, 1 );
      
      // Return the values, post-mixin, with end values specified
      return { top: endTop, left: endLeft, duration: o.duration, easing: o.easing };
    },
    
    // find closest overthrow (elem or a parent)
    closest = function( target, ascend ){
      return !ascend && target.className && target.className.indexOf( "overthrow" ) > -1 && target || closest( target.parentNode );
    },
        
    // Intercept any throw in progress
    intercept = function(){
      clearInterval( timeKeeper );
    },
      
    // Enable and potentially polyfill overflow
    enable = function(){
        
      // If it's on, 
      if( enabled ){
        return;
      }
      // It's on.
      enabled = true;
        
      // If overflowProbablyAlreadyWorks or at least the element canBeFilledWithPoly, add a class to cue CSS that assumes overflow scrolling will work (setting height on elements and such)
      if( overflowProbablyAlreadyWorks || canBeFilledWithPoly ){
        docElem.className += " " + classtext;
      }
        
      // Destroy everything later. If you want to.
      w.overthrow.forget = function(){
        // Strip the class name from docElem
        docElem.className = docElem.className.replace( classtext, "" );
        // Remove touch binding (check for method support since this part isn't qualified by touch support like the rest)
        if( doc.removeEventListener ){
          doc.removeEventListener( "touchstart", start, false );
        }
        // reset easing to default
        w.overthrow.easing = defaultEasing;
        
        // Let 'em know
        enabled = false;
      };
  
      // If overflowProbablyAlreadyWorks or it doesn't look like the browser canBeFilledWithPoly, our job is done here. Exit viewport left.
      if( overflowProbablyAlreadyWorks || !canBeFilledWithPoly ){
        return;
      }

      // Fill 'er up!
      // From here down, all logic is associated with touch scroll handling
        // elem references the overthrow element in use
      var elem,
        
        // The last several Y values are kept here
        lastTops = [],
    
        // The last several X values are kept here
        lastLefts = [],
        
        // lastDown will be true if the last scroll direction was down, false if it was up
        lastDown,
        
        // lastRight will be true if the last scroll direction was right, false if it was left
        lastRight,
        
        // For a new gesture, or change in direction, reset the values from last scroll
        resetVertTracking = function(){
          lastTops = [];
          lastDown = null;
        },
        
        resetHorTracking = function(){
          lastLefts = [];
          lastRight = null;
        },
        
        // After releasing touchend, throw the overthrow element, depending on momentum
        finishScroll = function(){
          // Come up with a distance and duration based on how 
          // Multipliers are tweaked to a comfortable balance across platforms
          var top = ( lastTops[ 0 ] - lastTops[ lastTops.length -1 ] ) * 8,
            left = ( lastLefts[ 0 ] - lastLefts[ lastLefts.length -1 ] ) * 8,
            duration = Math.max( Math.abs( left ), Math.abs( top ) ) / 8;
          
          // Make top and left relative-style strings (positive vals need "+" prefix)
          top = ( top > 0 ? "+" : "" ) + top;
          left = ( left > 0 ? "+" : "" ) + left;
          
          // Make sure there's a significant amount of throw involved, otherwise, just stay still
          if( !isNaN( duration ) && duration > 0 && ( Math.abs( left ) > 80 || Math.abs( top ) > 80 ) ){
            toss( elem, { left: left, top: top, duration: duration } );
          }
        },
      
        // On webkit, touch events hardly trickle through textareas and inputs
        // Disabling CSS pointer events makes sure they do, but it also makes the controls innaccessible
        // Toggling pointer events at the right moments seems to do the trick
        // Thanks Thomas Bachem http://stackoverflow.com/a/5798681 for the following
        inputs,
        setPointers = function( val ){
          inputs = elem.querySelectorAll( "textarea, input" );
          for( var i = 0, il = inputs.length; i < il; i++ ) {
            inputs[ i ].style.pointerEvents = val;
          }
        },
        
        // For nested overthrows, changeScrollTarget restarts a touch event cycle on a parent or child overthrow
        changeScrollTarget = function( startEvent, ascend ){
          if( doc.createEvent ){
            var newTarget = ( !ascend || ascend === undefined ) && elem.parentNode || elem.touchchild || elem,
              tEnd;
                
            if( newTarget !== elem ){
              tEnd = doc.createEvent( "HTMLEvents" );
              tEnd.initEvent( "touchend", true, true );
              elem.dispatchEvent( tEnd );
              newTarget.touchchild = elem;
              elem = newTarget;
              newTarget.dispatchEvent( startEvent );
            }
          }
        },
        
        // Touchstart handler
        // On touchstart, touchmove and touchend are freshly bound, and all three share a bunch of vars set by touchstart
        // Touchend unbinds them again, until next time
        start = function( e ){
          
          // Stop any throw in progress
          intercept();
          
          // Reset the distance and direction tracking
          resetVertTracking();
          resetHorTracking();
            
          elem = closest( e.target );
            
          if( !elem || elem === docElem || e.touches.length > 1 ){
            return;
          }     

          setPointers( "none" );
          var touchStartE = e,
            scrollT = elem.scrollTop,
            scrollL = elem.scrollLeft,
            height = elem.offsetHeight,
            width = elem.offsetWidth,
            startY = e.touches[ 0 ].pageY,
            startX = e.touches[ 0 ].pageX,
            scrollHeight = elem.scrollHeight,
            scrollWidth = elem.scrollWidth,
          
            // Touchmove handler
            move = function( e ){
            
              var ty = scrollT + startY - e.touches[ 0 ].pageY,
                tx = scrollL + startX - e.touches[ 0 ].pageX,
                down = ty >= ( lastTops.length ? lastTops[ 0 ] : 0 ),
                right = tx >= ( lastLefts.length ? lastLefts[ 0 ] : 0 );
                
              // If there's room to scroll the current container, prevent the default window scroll
              if( ( ty > 0 && ty < scrollHeight - height ) || ( tx > 0 && tx < scrollWidth - width ) ){
                e.preventDefault();
              }
              // This bubbling is dumb. Needs a rethink.
              else {
                changeScrollTarget( touchStartE );
              }
              
              // If down and lastDown are inequal, the y scroll has changed direction. Reset tracking.
              if( lastDown && down !== lastDown ){
                resetVertTracking();
              }
              
              // If right and lastRight are inequal, the x scroll has changed direction. Reset tracking.
              if( lastRight && right !== lastRight ){
                resetHorTracking();
              }
              
              // remember the last direction in which we were headed
              lastDown = down;
              lastRight = right;              
              
              // set the container's scroll
              elem.scrollTop = ty;
              elem.scrollLeft = tx;
            
              lastTops.unshift( ty );
              lastLefts.unshift( tx );
            
              if( lastTops.length > 3 ){
                lastTops.pop();
              }
              if( lastLefts.length > 3 ){
                lastLefts.pop();
              }
            },
          
            // Touchend handler
            end = function( e ){
              // Apply momentum based easing for a graceful finish
              finishScroll(); 
              // Bring the pointers back
              setPointers( "auto" );
              setTimeout( function(){
                setPointers( "none" );
              }, 450 );
              elem.removeEventListener( "touchmove", move, false );
              elem.removeEventListener( "touchend", end, false );
            };
          
          elem.addEventListener( "touchmove", move, false );
          elem.addEventListener( "touchend", end, false );
        };
        
      // Bind to touch, handle move and end within
      doc.addEventListener( "touchstart", start, false );
    };
    
  // Expose overthrow API
  w.overthrow = {
    set: enable,
    forget: function(){},
    easing: defaultEasing,
    toss: toss,
    intercept: intercept,
    closest: closest,
    support: overflowProbablyAlreadyWorks ? "native" : canBeFilledWithPoly && "polyfilled" || "none"
  };
  
  // Auto-init
  enable();
    
})( this );

function childImgsOn(myEle){
  for(var i=0;i<$(myEle).find('img').length;i++){
    var thisimg = $(myEle).find('img:eq('+i+')').attr('src');
    if(thisimg.indexOf("_off.") > -1){
      var img_onoff = thisimg.replace("_off.","_on.");
      $(myEle).find('img:eq('+i+')').attr('src',img_onoff);
    }
  }
}

function childImgsOff(myEle){
  for(var j=0;j<$(myEle).find('img').length;j++){
    var thisimg = $(myEle).find('img:eq('+j+')').attr('src');
    if(thisimg.indexOf("_on.") > -1){
      var img_onoff = thisimg.replace("_on.","_off.");
      $(myEle).find('img:eq('+j+')').attr('src',img_onoff);
    }
  }
}

//카드 뉴스 함수 시작

$.fn.extend({
    ensureLoad: function(handler) {
        return this.each(function() {
            if(this.complete) {
                handler.call(this);
            } else {
                $(this).load(handler);
                $(this).error(handler);
            }
        });
    }
});

/*다중 이미지 로드 체크*/
function imgLoad(opt){
  var imgEle = opt.tar.find("img");
  var imgLoad = 0;
  if(imgEle.length ==0){
    opt.Fn();
  }else{
    for(var l = 0 ; l < imgEle.length ; l++){
      imgEle.eq(l).ensureLoad(function(){
        imgLoad++;
        if(imgLoad == imgEle.length){
          opt.Fn();
        }
      });
    }
  }
}

/* iCutter - 커스터마이징*/
function iCutterOwen(obj){
  if (typeof(obj) == "object"){
    for( var i = 0 ; i < obj.length ; i++){
      var divs = $(obj[i]);
      action(divs);
    }
  }else{
    var divs = $(obj);
    action(divs);
  }

  function action(divs){
    divs.each(function(){
      var $this = $(this);
      var divAspect = $this.outerHeight() / $this.outerWidth();
      console.log($this.outerHeight(), $this.outerWidth())
      var img = $this.find('img');
      img.ensureLoad(function(){
        var imgAspect = img.outerHeight() / img.outerWidth();
        if (imgAspect <= divAspect) {
          var imgWidthActual = $this.outerHeight() / imgAspect;
          var imgWidthToBe = $this.outerHeight() / divAspect;
          if(!img.parent().hasClass('no_center')){
            var marginLeft = -Math.round(((imgWidthActual/$this.outerWidth())-1) / 2 * 100000)/1000;
          }else{
            var marginLeft = 0;
          }
            img.removeClass('w100p').addClass('h100p').css({"margin-left":marginLeft+"%"});
            
        } else {
          if(!img.hasClass('w100p')){
            img.removeClass('h100p').addClass('w100p').css({"margin-left":0});
          }
        }
        if(img.hasClass('ict_hide'))img.removeClass('ict_hide');
      });
    });//each
  }
}//iCutter

function iCutterInOwen(obj){
  if (typeof(obj) == "object"){
    for( var i = 0 ; i < obj.length ; i++){
      var divs = $(obj[i]);
      action(divs);
    }
  }else{
    var divs = $(obj);
    action(divs);
  }

  function action(divs){
    divs.each(function(){
      var $this = $(this);
      var divAspect = $this.outerHeight() / $this.outerWidth();
      var img = $this.find('img');
      img.ensureLoad(function(){
        var imgAspect = img.outerHeight() / img.outerWidth();
        if (imgAspect > divAspect) {
          img.removeClass('w100p').addClass('h100p');
        } else {
          if(!img.hasClass('w100p')){
            img.removeClass('h100p').addClass('w100p');
          }
        }
        if(img.hasClass('ict_hide'))img.removeClass('ict_hide');
      });
    });//each
  }
}//iCutter



function stopgoup(e){
  e.stopPropagation();
}
var mySwiper;
function getCardView(idx){
  $("#loadgin_img").fadeIn();
  $.ajax({
    type:"GET",
    url:"/news/skin/cardnews/__card_view.php",
    data:{"idx":idx },
    dataType:"html",
    success : function(data) {
      $("#cardnewsView").html(data);
      var imgLoad = imagesLoaded( $("#cardnewsView") );
            imgLoad.on( 'always', function(){
              openCardView();
                mySwiper = new Swiper('.swiper-container',{
            loop:true,
            simulateTouch:false,
            onSlideClick : function(){
              toggleFullImg();
            },
            onSlideChangeEnd : function(){
              var idx = mySwiper.activeIndex;
              var len = mySwiper.slides.length;
              $("#cardnewsView .con_box > ul li.img_list > span").text(idx%(len-2) == 0 ? len-2 : idx%(len-2));
            }
            
          });
          $('#cardnewsView button.prev').on('click', function(e){
            e.preventDefault()
            mySwiper.swipePrev()
          })
          $('#cardnewsView button.next').on('click', function(e){
            e.preventDefault()
            mySwiper.swipeNext()
          })
          // $("#cardnewsView .con_box > ul li.img_list > span").text(mySwiper.activeIndex$mySwiper.slides.length);
            } );
      
      swipeCardNews();
      
    },error : function(xhr, status, error) {
      alert(error);
    }
  });
  
  function openCardView(){
    var CardBox = $("#cardnewsView .img_box");
    
    $("#cardnewsView > .inner").fadeIn(200);
    var CardBoxH = Math.max($(window).scrollTop()+($(window).height()/2)-($("#cardnewsView .view_box").height()/2),$(window).scrollTop()+30);
    $("#cardnewsView .view_box").css("margin-top",CardBoxH);
  }
}//getCardView

function getCardView2(){
  var CardBox = $("#cardnewsView .img_box");
  CardBox.find("li:eq(0)").siblings().css({"left":"100%"}).removeClass("show").end().css({"left":"0px"}).addClass("show");
  $("#cardnewsView .con_box ul >li.img_list > span").text(CardBox.find("li.show").index()+1);
  $("#cardnewsView > .inner").fadeIn(200);
  var CardBoxH = Math.max($(window).scrollTop()+($(window).height()/2)-($("#cardnewsView .view_box").height()/2),$(window).scrollTop()+30);
  $("#cardnewsView .view_box").css("margin-top",CardBoxH);
}

function closeCardView(){
  $("#cardnewsView > .inner").fadeOut(300);
}

function resizing2(){
  var vw = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
  var vH = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
  var wcnt ;  
  if(vw >= 959){wcnt = 3;
  //}else if(vw2 >= 480){wcnt = 2;
  }else{wcnt = 2;
  }
  
  var itemLen = $("#bbsType6 .inner > ul > li").length;
  $("#bbsType6 .inner").removeClass("w1 w2 w3").addClass("w"+wcnt);
  $("#bbsType6 .inner > ul > li").removeClass("ml0");
  for(var i = 0 ; i < itemLen/wcnt ; i++){
    $("#bbsType6 .inner > ul > li:eq("+(i*wcnt)+")").addClass("ml0");
  }
  
  if($("#cardnewsView .view_box").hasClass("img_only")){
    if(vw >= vH){
      $("#cardnewsView .view_box").removeClass("w_max").addClass("h_max");
    }else{
      $("#cardnewsView .view_box").removeClass("h_max").addClass("w_max");
    }
  }
}

function slideCardImg(dire){
  
  // var term = 450;
  // var easi = "easeInOutQuint";
  // var myobj = $("#cardnewsView .img_box > li.show");
  // var slides = $("#cardnewsView .img_box > li");
  // var slide_len = slides.length;
  // var next_idx = $("#cardnewsView .img_box > li:eq("+((slide_len+myobj.index()+dire)%slide_len)+")");
//  
//  
  // if(dire == 1){
    // next_idx.css({"left":"100%"});
    // myobj.stop().animate({left:"-100%"},term, easi);
  // }else{
    // next_idx.css({"left":"-100%"});
    // myobj.stop().animate({left:"100%"},term, easi);
  // }
  // next_idx.stop().animate({left:"0px"},term, easi);
  // next_idx.siblings().removeClass('show').end().addClass('show');
  // $("#cardnewsView .con_box > ul >li.img_list > span").text(next_idx.index()+1);
}

function toggleFullImg(){
  if($("#cardnewsView .view_box").hasClass("img_only")){
    closeCardViewImgOnly();
  }else{
    showCardViewImgOnly();
  }
}

function clickCardViewBack(){
  if($("#cardnewsView .view_box").hasClass("img_only")){
    closeCardViewImgOnly();
  }else{
    closeCardView();
  }
}

function showCardViewImgOnly(){
  //$("#cardnewsView .view_box, #cardnewsView .view_box > .inner, #cardnewsView > .inner ").addClass("cssAni");
  var vw = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
  var vH = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
  $("#cardnewsView").addClass("img_only");
  $("#cardnewsView .view_box").addClass("img_only");
  if(vw >= vH){
    $("#cardnewsView .view_box").removeClass("w_max").addClass("h_max");
  $("#cardnewsView .view_box").css("margin-top",$(window).scrollTop());
  }else{
    $("#cardnewsView .view_box").removeClass("h_max").addClass("w_max");
  }
  setTimeout(function(){
    $("#cardnewsView .view_box, #cardnewsView .view_box > .inner").removeClass("cssAni");
  },300);
  $("body").css("overflow","hidden");
  mySwiper.resizeFix()
}

function closeCardViewImgOnly(){
  $("#cardnewsView").removeClass("img_only");
  $("#cardnewsView .view_box").removeClass("img_only w_max h_max");
  $("#cardnewsView .view_box").css("margin-top",($(window).scrollTop()+30));
  $("body").css("overflow","auto");
  var CardBoxH = Math.max($(window).scrollTop()+($(window).height()/2)-($("#cardnewsView .view_box").height()/2),$(window).scrollTop());
  $("#cardnewsView .view_box").css("margin-top",CardBoxH);
  mySwiper.resizeFix()
  
}
// 카드뉴스 함수 끝


/* common 팝업 */
var popFn = {
  show : function(t, callback,o){
    o  = o || {};
    o.bg = o.bg || "pop_bg_common";
    if($("body > #"+o.bg).length === 0){
      $("body").append("<div id='"+o.bg+"'></div>");
    }
    var bg = $("body > #"+o.bg);
    bg.css('display','block');
    t.css('display','block').data('cn-bg',o.bg);
    var posi = t.css('position');
    imgLoad({tar : t, Fn : function(){
      popFn.resize({data : {tg : t, posi : posi}});
        bg.addClass('on').on('click',function(){popFn.hide(t);});
        t.addClass('on');
        if(!!callback){
          callback();
        }
      }
    });
    $(window).on('resize', {tg : t, posi : posi}, popFn.resize);
  },
  hide : function(t, change){
    var bg = t.data('cn-bg') ? $("#"+t.data('cn-bg')) : $("#pop_bg_common");
    if(!change)bg.removeClass('on');  
    bg.off('click');
    t.removeClass('on');
    setTimeout(function(){
      if(!change)bg.remove(); 
      t.css('display','none');
    },300)
    $(window).off('resize', popFn.resize);
  },
  change : function(o){
    var bgName = o.prev.data('cn-bg');
    var bg = bgName ? $("#"+bgName) : $("#pop_bg_common");
    o.prev.removeClass('on');
    $(window).off('resize', popFn.resize);
    setTimeout(function(){
      o.prev.css('display','none');
    },300);
    o.next.css('display','block').data('cn-bg',bgName);
    var posi = o.next.css('position');
    imgLoad({tar : o.next, Fn : function(){
      popFn.resize({data : {tg : o.next, posi : posi}});
      bg.off('click').on('click', function(){popFn.hide(o.next)});
      o.next.addClass('on');
    }});
  },
  resize : function(e){
    var t = e.data.tg;
    var vH = $(window).height();
    t.css({'max-height':''});
    var bxH = t.outerHeight();
    var scl = e.data.posi =='fixed' ? 0 : $(window).scrollTop();
    t.css({'top':( bxH > vH ? scl : (vH-bxH)/2+scl )+"px"});
    //t.css({'max-height':vH, 'top':( bxH > vH ? scl : (vH-bxH)/2+scl )+"px"});
  }
}

/*ajax 팝업 띄우기*/
function ajaxShowPopCont(o){
  var t = o.target ? $(o.target) : $("#pop_bx_common");
  var data = o.data || {};
  $.ajax({
    url : o.url,
    type : o.type || "get",
    dataType : "html",
    data : data,
    success : function(data){
      if(!o.append)t.html('');
      t.append(data);
      
      var popup = o.pop ? $(o.pop) : t.find(">*").eq(0);
      popFn.show(popup);
    },
    error : function(a,b,c){
      alert(c);
    }
  })
}


