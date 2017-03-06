 //check browser
var isie=(/msie/i).test(navigator.userAgent); //ie
var isie6=(/msie 6/i).test(navigator.userAgent); //ie 6
var isie7=(/msie 7/i).test(navigator.userAgent); //ie 7
var isie8=(/msie 8/i).test(navigator.userAgent); //ie 8
var isie9=(/msie 9/i).test(navigator.userAgent); //ie 9
var isie10=(/msie 10/i).test(navigator.userAgent); //ie 9
var isfirefox=(/firefox/i).test(navigator.userAgent); //firefox
var isapple=(/applewebkit/i).test(navigator.userAgent); //safari,chrome
var isopera=(/opera/i).test(navigator.userAgent); //opera
var isios=(/(ipod|iphone|ipad)/i).test(navigator.userAgent);//ios
var isipad=(/(ipad)/i).test(navigator.userAgent);//ipad
var isandroid=(/android/i).test(navigator.userAgent);//android
var device;
//if(isie7 || isie8 || isie9){ isie6=false;}
//if(isie9){ isie=false;}
//if(isapple || isios || isipad || isandroid){}else{}


(function (w) {
    // version check
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 && parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10) < 7) {
        location.href = '/NoticeIE6.html';
    }
})(window);


function setCookie(name,value,expiredays) { 
    var today = new Date();
    today.setDate(today.getDate()+expiredays);
    document.cookie = name + "=" + escape(value) + "; path=/; expires=" + today.toGMTString() + ";";
}


function getCookie( name ) {
   var nameOfCookie = name + "="; 
   var x = 0; 
   while ( x <= document.cookie.length ) 
   { 
           var y = (x+nameOfCookie.length); 
           if ( document.cookie.substring( x, y ) == nameOfCookie ) { 
                   if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 ) 
                           endOfCookie = document.cookie.length; 
                   return unescape( document.cookie.substring( y, endOfCookie ) ); 
           } 
           x = document.cookie.indexOf( " ", x ) + 1; 
           if ( x == 0 ) 
                   break; 
   } 
   return ""; 
}

function setCookie01(name, value, expireDate)
{
    var date_expire = new Date();
    date_expire.setDate(date_expire.getDate()+expireDate);

    var cookieStr = name + "=" + escape(value) +
                    "; domain=" + escape(".auri.oktomato.net") +
                              "; path=/"  +
                    ((expireDate == null ) ? "" : ("; expires=" + date_expire.toGMTString())) ;

   // alert(cookieStr);

    document.cookie = cookieStr;
}

var scrollT = $(window).scrollTop();
var initSize = true;

$.fn.extend({
    imgConversion : function(s,type){
     var xt = $(this).attr('src').lastIndexOf('.') + 1;
     xt = $(this).attr('src').substr(xt);
     if(s) $(this).attr('src', $(this).attr('src').replace('off.'+xt, (type != "hover")? 'on.'+xt :'hover.'+xt ));
     else $(this).attr('src', $(this).attr('src').replace((type != "hover")? 'on.'+xt : 'hover.'+xt , 'off.'+xt));
     return $(this);
   }
 });

var sideMenuState;

function bbsCheckbox(){
  $(".check_listbox.box").each(function(index){
      $(this).find("label").attr("for","b0102"+index).end().find("input[type='checkbox']").attr("id","b0102"+index);
    })
    .find("label").click(function(){
      var  on = $(this).next().prop("checked") == true;
      if(on){
        $(this).removeClass("on");
      }else{
        $(this).addClass("on");
      }
    });
    $(".check_listbox.all").click(function(){
      
      var  on = $(this).hasClass("on");
      if(on){
        $(this).removeClass("on").parents("table").find("tbody .check_listbox > input[type='checkbox']").prop("checked",false).prev().removeClass("on");
      }else{
        $(this).addClass("on").parents("table").find("tbody .check_listbox > input[type='checkbox']").prop("checked",true).prev().addClass("on");
      }
    });
}

function initResize(b){
  return
    var reizeTimeOut;
    var headerAreaWidth = $("#header").outerWidth();
    var contentAreaWidth = $(window).width();
    var contentAreaHeight = $(window).height();
     if(initSize){
         if(contentAreaWidth > 900){
           $(".container_inner > .side").css({"left":0});
           $("#lnb .inner > ul").css({"margin-left":200});
           $(".container_inner > .content").css({"margin-left":219});
           sideMenuState = true;
        }else{
           $(".container_inner > .side").css({"left":-199});
           $("#menu-button").css("display","block").stop().animate({"left":198},300);
           $("#lnb .inner > ul").css({"margin-left":0});
           $(".container_inner > .content").css({"margin-left":22});
           sideMenuState = false;
        }
        initSize = false;     
     }else{

    clearInterval(reizeTimeOut);
      reizeTimeOut = setTimeout(function(){
          if(contentAreaWidth > 900){
             $(".container_inner > .side").stop().animate({"left":0},700);
             $("#menu-button").css("display","none").stop().animate({"left":174},300);
             $("#lnb .inner > ul").stop().animate({"margin-left":200},400);
             $(".container_inner > .content").stop().animate({"margin-left":219},400);
             sideMenuState = true;
          }else{
             $(".container_inner > .side").stop().animate({"left":-199},400);
             $("#menu-button").css("display","block").stop().animate({"left":198},300);
             $("#lnb .inner > ul").stop().animate({"margin-left":0},400);
             $(".container_inner > .content").stop().animate({"margin-left":22},400);
             sideMenuState = false;
         }    
   },600); 

 }
 boxAllHeight();

}//767

function fnClickCheck2(obj) {
  $(obj).each(function(e){
    var txt = new Array();
    var elemt = $(this);
    txt =  elemt.val();
    elemt.focusin(function(){
       // console.log("focusin");
       // console.log(txt);
       // console.log($(this).val());

       if($(this).val() == txt){
          $(this).val("");
       }else{
      ///  alert(false);
       }//if
    });//focusin
     elemt.focusout(function(){
      if($(this).val() == ""){
          $(this).val(txt);
      }
    });//focusin
  });
};

$.fn.extend({
    imgConversion : function(s,type){
     var xt = $(this).attr('src').lastIndexOf('.') + 1;
     xt = $(this).attr('src').substr(xt);
     if(s) $(this).attr('src', $(this).attr('src').replace('off.'+xt, (type != "hover")? 'on.'+xt :'hover.'+xt ));
     else $(this).attr('src', $(this).attr('src').replace((type != "hover")? 'on.'+xt : 'hover.'+xt , 'off.'+xt));
     return $(this);
   }
 });

var W3CDOM = (document.createElement && document.getElementsByTagName);

function initFileUploads() {
 if (!W3CDOM) {
  return;
  }
 var fakeFileUpload = document.createElement('div');
 fakeFileUpload.className = 'fakefile';
 var inputbox = document.createElement('input')
  fakeFileUpload.appendChild(inputbox);
 var image = document.createElement('img');
 image.src='/oktomato/images/btn/btn_upload_off.gif';
 fakeFileUpload.appendChild(image);
 var x = document.getElementsByTagName('input');
 for (var i=0;i<x.length;i++) {
  if (x[i].type != 'file') continue;
  if (x[i].parentNode.className != 'fileinputs') continue;
  x[i].className = 'file';
  var clone = fakeFileUpload.cloneNode(true);
  x[i].parentNode.appendChild(clone);
  x[i].relatedElement = clone.getElementsByTagName('input')[0];
  x[i].onchange = x[i].onmouseout = function () {
   this.relatedElement.value = this.value;
  }
 }
$(".fileinputs").each(function(){
  $(this).on("mouseenter mouseleave" , function(e){
      if($(this).find(".fakefile > img").length > 0){
          if(e.type == "mouseenter"){
            $(this).find(".fakefile > img").imgConversion(true);
          }else{
            $(this).find(".fakefile > img").imgConversion(false);
          }
      }


  });

});

}



    function layerBoxOffset(obj,x,y){
      $(obj).css({
        "left":x,
        "top":y
      });
      if(isie7 || isie8){
        $(obj).css({"display":"block"});
      }else{
        $(obj).css({"display":"block","opacity":0}).stop().animate({"opacity":1},300);
      }
      $(obj).find(".close").off().on("click",function(){
         if(isie7 || isie8){
            $(obj).css({"display":"none"});
          }else{
            $(obj).stop().animate({"opacity":0},300,function(){
              $(this).css("display","none");
            });
          }

      });


    };


function btnHover(t){

  obj = $(t); 
  obj.each(function(){
    $(this).on("mouseenter mouseleave",function(e){
        if(e.type == "mouseenter"){
            $(this).imgConversion(true);
        }else{
            $(this).imgConversion(false);
        }
    })
  });
}
function menuFadeHover(t , sp){
  $this = $(t);
  var speed = (sp != "undefined") ? sp : 100;
  $this.bind("mouseenter mouseleave",function(e){
    var elemt = $(this);
    if(e.type == "mouseenter"){
      var imgOvr = elemt.find(">a>span>img").attr("src").replace("_off","_on");
      elemt.find(">a>span").append($("<img />").attr("src",imgOvr).css({
        "opacity":0,
        "position":"absolute",
        "left":0,
        "top":0
      }).addClass("ovr"))
      .find(".ovr").stop().animate({"opacity":1},speed,function(){
        elemt.find(".ovr").prev().css("visibility","hidden");
      });
      
    }else{
      elemt.find(">a .ovr").prev().css("visibility","visible").end().stop().animate({"opacity":0},speed,function(){$(this).remove();});
    }

  })
}

$(window).resize(initResize); 

function pageSetting(){
    var lnb1depth = $("#lnb .list > li");
    var snb1depth = $("#side .snb > li");
    var lnbClassification = pageNum !="" && pageNum > 0 && pageNum <= lnb1depth.length;
    var subClassification = subNum !="" && subNum > 0 && subNum <= snb1depth.length;
    var lnbOpacitySpeed = 200;
    var lnbBarSpeed = 300;
    var bareasingIn = "easeInQuad";
    var bareasingOut = "easeOutQuad";
    var lnbeasingIn = "easeInQuad";
    var lnbeasingOut = "easeOutQuad";

     if(lnbClassification){
        lnb1depth.siblings(".m"+pageNum).addClass("on");
     }

      if(subClassification){
        snb1depth.siblings(".s"+subNum).addClass("on");
     }

    //var snbTimeout;

   /* $("<img>").attr({
      "src" : "../images/bg/bg_snb_arr.gif",
      "alt" : ""
    }).css({
      "position":"absolute",
      "right":(subClassification) ? 0 : -8,
      "top":(subClassification) ? $(".side .snb > li.s"+subNum).offset().top - 52 : 0
    }).addClass("arr_snb").appendTo(".side")
    */
      


 /* $(".side .snb > li").on("mouseenter" , function(){
    clearInterval(snbTimeout);
      $(".arr_snb").stop().animate({
        "right":0,
        "top":$(this).offset().top - 52
      },300)
  });

  $(".side .snb > li").on("mouseleave" , function(){
      snbTimeout = setTimeout(function(){
      $(".arr_snb").stop().animate({
        "right":0,
        "top":$(".side .snb > li.s"+subNum).offset().top - 52
      },300)    
      },700)
  });*/

  //initResize();
}
$(function(){
  $("#menu-button").on("mouseenter mouseleave",function(e){
    if(e.type == "mouseenter"){
      $("#menu-button-line").stop().animate({"width":30},300,function(){
      $("#menu-button-text").stop().animate({
        "left":59,
        "opacity":1
      },300);
      }); 

    }else{
      $("#menu-button-line").stop().animate({"width":0},300);
        $("#menu-button-text").stop().animate({
        "left":65,
        "opacity":0
      },300);
    }
  
  }).on("click",function(){
    $(".container_inner > .side").stop().animate({"left": (sideMenuState) ? -199 : 0},700);
    $(this).find("#menu-button-icon > img").imgConversion(!sideMenuState);
      sideMenuState = !sideMenuState;
  });
});


function boxAllHeight(){
  //var openFlag = getCookie("openFlag");
  //console.log(openFlag);
  //var sideOpenMenu = $("#menuOption");
  var snbMenu = $("#side");
  var snbMenuHeight = snbMenu.outerHeight();
  var winHeight = $(window).height();
  var conHeight = $("#wrap").outerHeight();
  snbMenu.css("height" ,"" );

  if(winHeight > conHeight){
      snbMenu.css("height", winHeight);
  }else{
     snbMenu.css("height", conHeight);
  }
}

function sideOpen(){
  var sideOpen = true;
  var easeIng = "easeInQuad";
  var speed = 300;
  $("#side .sideHeader .switch").on("click",Open);

  function Open(){
    if(sideOpen){
      $(this).removeClass("on");
      $("#side").delay(300).stop().animate({"left":-160},speed,easeIng);
      $("#side .snb").stop().animate({"left":-160},speed,easeIng);
      $("#header, #lnb, #container").stop().animate({"margin-left":80},speed,easeIng);
      sideOpen = !sideOpen;
    }else{
      $(this).addClass("on");
      $("#side").delay(300).stop().animate({"left":0},speed,easeIng);
      $("#side .snb").stop().animate({"left":0},speed,easeIng);
      $("#header, #lnb, #container").stop().animate({"margin-left":240},speed,easeIng);
      sideOpen = !sideOpen;
    }
  };


};




function checkListMotion(){
    $(".lst_check").each(function(){
      //if($(this).hasClass("radio")){
        var $this = $(this)
        var prev;
        $this.find(">span").each(function(){
          if($(this).find(" > input").prop("checked")){
            $(this).addClass("on");
          } 
        });//each
      //}else{


      //}//if
    }); //each

    $(".lst_check > span ").find(" > label").off().on("click",function(){
      if($(this).parents(".lst_check").hasClass("radio")){
       $(this).parent().siblings(".on").removeClass("on").end().addClass("on");
     }else{
      $(this).parent().toggleClass("on");
     }//if

  });
}


  function trEditer(t){
    var table =  t.parents("table");
  var nowCnt = table.find("tbody > tr").length; //현재갯수
  var max = parseInt(t.attr("value")); // 총 생성될 갯수
  table.find("tbody > tr:eq("+(max-2)+")").nextAll().remove();
  //console.log(nowCnt);
  for(var i=nowCnt+2; i<=max; i++){
      var newitem = table.find("tbody > tr:eq(0)").clone();
      table.find("tbody").append(newitem);
      table.find("tbody > tr:last").find("td.month").html(i);
      if(table.find(".calendar").length > 0){
        addDatepicker(table)    
      }
   setTimeout(function(){
     boxAllHeight();      
   },200);         
    
  }
 }//trEditer


   function addDatepicker(table){
    if(table.find("tr:last").find(".calendar").length > 0)  {
        var parentObj = table.find("tr:last").find(".calendar").parent();
        var objClass = table.find("tr:last").find(".calendar").attr("class");
        table.find("tr:last").find(".calendar").removeClass("hasDatepicker").attr("id","")
        .siblings(".ui-datepicker-trigger").remove().end()
        .datepicker({
              showOn: "button",
              buttonImage: "/images/btn/ico_datapiker.gif",
              buttonImageOnly: true,
              dateFormat: "yy-mm-dd"
       });
     }//if


      // objClass = objClass.replace("hasDatepicker");
      // table.find("tr:last").find(".calendar").remove();
      // table.find("tr:last").find(".ui-datepicker-trigger").remove();
    

    // $("<input>", {
    //             "name" : "test"
    //           }).addClass(objClass).appendTo(parentObj).datepicker({
    //             showOn: "button",
    //         buttonImage: "/images/btn/ico_datapiker.gif",
    //         buttonImageOnly: true,
    //         dateFormat: "yy-mm-dd"
    //           });

    }//addDatepicker

   // 수정 전버젼 dmp-240530
   // function addDatepicker(table){
   //    var parentObj = table.find("tr:last").find(".calendar").parent();
   //    var objClass = table.find("tr:last").find(".calendar").attr("class");
   //    objClass = objClass.replace("hasDatepicker");
   //    table.find("tr:last").find(".calendar").remove();
   //    table.find("tr:last").find(".ui-datepicker-trigger").remove();
   //  $("<input>", {
   //              "name" : "test"
   //            }).addClass(objClass).appendTo(parentObj).datepicker({
   //              showOn: "button",
   //          buttonImage: "/images/btn/ico_datapiker.gif",
   //          buttonImageOnly: true,
   //          dateFormat: "yy-mm-dd"
   //            });

   //  }



function elemtAddMotion(){
  var $parent = $(this).parent().next();
  var btnBox = $(this).parent();
  var depth = $(this).data("depth");
  var numArray = ["a","b","c","d","e","f","g"] 
  if(depth == "1"){
      //$parent.children(":last").clone().appendTo($parent);
	  $parent.append($("#addElementHidden").html());
      for( var i=0; i < btnBox.find(".name_info").length; i++ ){
        var name = btnBox.find(".name_info:eq("+i+")").attr("name");
        var id = btnBox.find(".name_info:eq("+i+")").attr("id");
          for( var j=0; j <  $parent.find(".ni"+i).length; j++ ){
              $parent.find(".ni"+i+":eq("+j+")").attr({"name":name+"_"+j , "id": id+"_"+j})        
          }//for2
       }//for 1 
      if($parent.children(":last").find(".group").length > 0){
        var id2= $parent.children(":last").find(".ni0").attr("id");
        var name2= $parent.children(":last").find(".ni0").attr("name");
        $parent.children(":last").find(".group .name_info").attr({"id":"r_"+id2,"name":"r_"+name2});

        for( var h=0; h < $parent.children(":last").find(".group > ul").children().length; h++ ){
          for( var k=0; k < $parent.children(":last").find(".group > ul").children().filter(":eq("+h+")").find(".ni").length; k++ ){
              $parent.children(":last").find(".group > ul").children().filter(":eq("+h+")").find(".ni:eq("+k+")")
            .attr({"name":name2+"_"+numArray[k]+"_"+h , "id": id2+"_"+numArray[k]+"_"+h})        
          }//for2
        }//for
      }
    }else if(depth == "2"){
		$parent.children(":last").clone().appendTo($parent);
        var name3 = btnBox.find(".name_info").attr("name").replace("r_","");
        var id3 = btnBox.find(".name_info").attr("id").replace("r_","");
        for( var h=0; h <  $parent.children().length; h++ ){
          for( var k=0; k <  $parent.children().filter(":eq("+h+")").find(".ni").length; k++ ){
            $parent.children().filter(":eq("+h+")").find(".ni:eq("+k+")")
            .attr({"name":name3+"_"+numArray[k]+"_"+h , "id": id3+"_"+numArray[k]+"_"+h})        
          }//for2
        }//for
    }//if
     boxAllHeight();
     $parent.children(":last").find(".addItemBtn").off().on("click", elemtAddMotion);
     $parent.children(":last").find(".delBtn").off().on("click", elemtRemoveMotion);
     $parent.children(":last").find(".switch").off().on("click", elemtAccordionMotion);
     $parent.children(":last").find(".up").on("click", elemtMoveUp);
     $parent.children(":last").find(".down").on("click", elemtMoveDown);
     fnClickCheck2($parent.children(":last").find(".inp_txt"));
}

function elemtMoveUp(){
  var $this = $(this).parent().parent();
  if($this.index() > 0){
    var copy = $this.clone();
    $this.prev().before(copy)
    $this.remove();
     copy.find(".up").on("click", elemtMoveUp);
     copy.find(".down").on("click", elemtMoveDown);
     fnClickCheck2(copy.find(".inp_txt"));
  }
}

function elemtMoveDown(){
  var $this = $(this).parent().parent();
  var total = $this.siblings().length;
  if($this.index() < total){
    var copy = $this.clone();
    $this.next().after(copy)
    $this.remove();
     copy.find(".up").on("click", elemtMoveUp);
     copy.find(".down").on("click", elemtMoveDown);
     fnClickCheck2(copy.find(".inp_txt"));
  }
}



function elemtRemoveMotion(){
	var $parent = $(this).parent().next();
	var btnBox = $(this).parent();
	if($parent.children().length > 1){
		$parent.children(":last").remove();
	}else{
		alert('마지막 행 입니다.');
	
	}
	boxAllHeight();
}

function elemtAccordionMotion(){
	var box = $(this).parent().siblings(".group");
	if(box.css("display") == "none"){
		box.slideDown(300);
		if($(this).html().indexOf("/_oktomato/images/btn/btn_plus2.gif") != -1 ){
			$(this).html('<img alt="닫기" src="/_oktomato/images/btn/btn_minus2.gif">');
		}
	}else{
		box.slideUp(300);
		if($(this).html().indexOf("/_oktomato/images/btn/btn_minus2.gif") != -1 ){
			$(this).html('<img alt="열기" src="/_oktomato/images/btn/btn_plus2.gif">');
		}
	}
}



function addTr(){
	var btnBox = $(this).parent();
	var table = $(this).parent().next();
	
	table.find("tbody > tr:last").clone().appendTo(table.find("tbody"));
	addDatepicker(table)
	for( var i=0; i < btnBox.find(".name_info").length; i++ ){
		var name = btnBox.find(".name_info:eq("+i+")").attr("name");
		var id = btnBox.find(".name_info:eq("+i+")").attr("id");
		for( var j=0; j < table.find(".ni"+i).length; j++ ){
			table.find(".ni"+i+":eq("+j+")").attr({"name":name+"_"+j , "id": id+"_"+j})        
		}//for2
	}//for 1
	boxAllHeight();
	fnClickCheck2(table.find("tbody > tr:last").find(".inp_txt"));
} 

function removeTr(){
	var table = $(this).parent().next();
	var last = table.find("tbody > tr:last").clone();
	if(table.find(".delChack").length > 0){
		table.find(".delChack").each(function(){
			if( $(this).attr("checked") == "checked" ){
				$(this).parent().parent().remove();
			}
			if(table.find("tbody > tr").length == 0){
				last.find("input[type='checkbox']").prop( "checked",false);
				last.find("input[type='text']").attr("value","").end().appendTo(table.find("tbody"));
				addDatepicker(table);
			}
		});//each
		
	}else{
		if(table.find("tbody > tr").length > 1){
			table.find("tbody > tr:last").remove();
		}else{
			alert('마지막 행 입니다.');
		
		}
	} 
	boxAllHeight();
} 

// function initScroll(){
//   scrollT = $(window).scrollTop();
//  //사이드메뉴 높이값 여부
// }

//인풋 라벨 숨김
function LabelHidden(obj){
$(obj).each(function(){
  if($(this).val() != ""){
    $(this).siblings("label").css("display","none");  
  }
  $(this).on("focusin focusout" , function(e){
    if (e.type == "focusin") {
      $(this).siblings("label").css("display","none");
    }else{
      if($(this).val() == ""){
        $(this).siblings("label").css("display","block"); 
      }
    }
  });
});
};//LabelHidden

function chkEmail(email){
	var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;   
	if(regex.test(email) === false) {  
		return false;  
	} else {  
		return true;
	} 
}

$(function(){
	//숫자키와 점(.) 만 입력 가능
	$(":input").filter(".only_number_dot")
		.keypress(function(event){		
			//if (event.which && (event.which < 48 || event.which > 57))
			if (event.which && (event.which >= 48 && event.which <= 57) || (event.which === 46))
			{
			}
			else
			{			
				event.preventDefault();
			}
		})	
		.css("imeMode", "disabled");
	//숫자키만 입력
	$(":input").filter(".only_number")
		.keypress(function(event){		
			if (event.which && (event.which < 48 || event.which > 57))
			{			
				event.preventDefault();
			}
		})	
		.css("imeMode", "disabled");
});

/* 이미지로드 */
$.fn.imagesLoaded = function (fn) {
    var $imgs = this.find('img[src!=""]'), imgArr = {cpl : [], err : []};
    if (!$imgs.length){
        if(fn) fn();
        return;
    }
    var dfds = [], cnt = 0;
    $imgs.each(function(){
        var _this = this;
        var dfd = $.Deferred();
        dfds.push(dfd);
        var img = new Image();
        img.onload = function(){
            imgArr.cpl.push(_this);
            check();
        }
        img.onerror = function(){
            imgArr.err.push(_this);
            check();
        }
        img.src = this.src;
    });
    function check(){
        cnt++;
        if(cnt === $imgs.length){
            if(fn) fn.call(imgArr);
        }
    }
}

/* common 팝업 */
var popFn = {
    show : function(t, params){
        var defaults = {
            onStart : function(){},
            onLoad : function(){},
            onClose : "",
            btnCloseCl : 'pop_close',
            bgClose : true,
            bxId: "#pop_bx_common",
            bgId : '#pop_bg_common',
            align : true,
            htmlCl : "of_hide",
            parent : false,
            resize : true
        };
        params = params || {};
        for (var prop in defaults) {
            if (prop in params && typeof params[prop] === 'object') {
                for (var subProp in defaults[prop]) {if (! (subProp in params[prop])) params[prop][subProp] = defaults[prop][subProp];}
            } else if (! (prop in params)) {params[prop] = defaults[prop];}
        };
        var _this = this;
        if(t == "ajax" && $(params.bxId).length === 0){
            var bx_id = params.bxId.substring(params.bxId.indexOf('#')+1, params.bxId.indexOf('.') === -1 ? params.bxId.length : params.bxId.indexOf('.'));
            var bx_class = params.bxId.replace("#"+bx_id,"").replace("."," ");
            $("body").append($("<section></section>").prop({id : bx_id}).addClass(bx_class));
        }
        if($(params.bgId).length === 0){
            var bg_id = params.bgId.substring(params.bgId.indexOf('#')+1, params.bgId.indexOf('.') === -1 ? params.bgId.length : params.bgId.indexOf('.'));
            var bg_class = params.bgId.replace("#"+bg_id,"").replace("."," ");
            $("body").append($("<div></div>").prop({id : bg_id}).addClass(bg_class));
        }
        
        var bg = $(params.bgId);
        params.htmlCl && $('html').addClass(params.htmlCl);
        bg.css('display','block');
        !params.url ? show() : ajax();
        function ajax(){
			$.ajax({
                url : params.url,
                type : "get",
                dataType : "html",
                data : params.data,
                success : function(data){
                    if($(params.bxId).length === 0){
                        var bx_id = params.bxId.substring(params.bxId.indexOf('#')+1, params.bxId.indexOf('.') === -1 ? params.bxId.length : params.bxId.indexOf('.'));
                        var bx_class = params.bxId.replace("#"+bx_id,"").replace("."," ");
                        $("body").append($("<section></section>").prop({id : bx_id}).addClass(bx_class));
                    }
                    var bx = $(params.bxId);
                    bx.html(data);
                    t = bx.find(">*").eq(0);
                    show();
                },
                error : function(a,b,c){
                    alert(c);
                }
            });
        }
        //!params.onStart ? show() : params.onStart(t, show);
        function show(){
            if(params.onLoad)params.onLoad();
            var posi = t.css('position');
            t.css('display','block');
            t.imagesLoaded(function(){
                var vW = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
                bg.addClass('on');
                if(params.bgClose){
                    bg.off('click').on('click',function(){popFn.hide(t,!params.parent ? '' : params.parent,params.bgId, params.onClose);});
                }
                if(params.align){
                    var vH = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
                    var bxH = t.outerHeight();
                    var scl = posi =='fixed' ? 0 : $(window).scrollTop();
                    t.css({"top":( bxH > vH ? scl : (vH/2-bxH)+scl-200 )+"px"});
                };
                if(params.parent){
                    params.parent.removeClass('on');
                }
                t.addClass('on');
                t.find('.'+params.btnCloseCl).on('click',function(){popFn.hide(t,!params.parent ? '' : params.parent,params.bgId, params.onClose, params.mobileUI);});
                if(params.align && params.resize){$(window).on('resize', {tg : t}, popFn.resize).resize();};
            });
            _this.close = function(){popFn.hide(t,!params.parent ? '' : params.parent,params.bgId, params.onClose, params.mobileUI);}
        }
    },
    hide : function(t, change, bgId, onClose, mobileUI){
        var vW = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var bg = bgId ? $(bgId): $("#pop_bg_common");
        var bx = $("#pop_bx_common");
        onClose ? onClose() : "";
        if(!change){
            bg.off('click');
            bg.removeClass('on');
            $('html').removeClass('of_hide');
        }else{
            bg.off('click').on('click',function(){popFn.hide(change);});
            change.addClass('on');
        }
        t.removeClass('on notrans');
        setTimeout(function(){
            if(!change){
                bg.remove();
                bx.remove();
            }
            t.css('display','none');
            t.css({'max-height':'', "top":''});
        },500);
        $(window).off('resize', popFn.resize);
        this.close = null;
    },
    resize : function(e){
        var t = e.data.tg;
        //var t = e;
        var vH = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        var bxH = t.outerHeight();
        var bxHeadH = t.find(".pop_header").length != 0 ? t.find(".pop_header").outerHeight() : 0;
        var bxCont = t.find(".pop_content");
        var scl = e.data.posi =='fixed' ? 0 : $(window).scrollTop();
        bxCont.css({"height": ""});
        if(bxCont.outerHeight() > bxH-bxHeadH) bxCont.css({"height": bxH-bxHeadH});
        bxH = t.outerHeight();
        t.css({"top":( bxH > vH ? scl : (vH-bxH)/2+scl-200 )+"px"});
    }
};