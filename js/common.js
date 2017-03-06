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
var ismacos = (/Mac OS X/i).test(navigator.userAgent);//mac navigator.userAgent.indexOf(\"Mac OS X\")
var device;

function con(l,t){
  if( "console" in window ){
     var log = (t == undefined) ? l : t + l;
     //console.log(log);
  }
}
var console = window.console || {log:function(){}};
// 지정된 범위의 정수 1개를 랜덤하게 반환하는 함수
// n1 은 "하한값", n2 는 "상한값"
function randomRange(n1, n2) {
  return Math.floor( (Math.random() * (n2 - n1 + 1)) + n1 );
}


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


$.scrollbarWidth = function() {
  var parent, child, width;

  if(width===undefined) {
    parent = $('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo('body');
    child=parent.children();
    width=child.innerWidth()-child.height(99).innerWidth();
    parent.remove();
  }

 return width;
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


//if(isie7 || isie8 || isie9){ isie6=false;}
//if(isie9){ isie=false;}
//if(isapple || isios || isipad || isandroid){}else{}
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

 //if()
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
  if($(this).data("src") != undefined) $(this).find(".fakefile > img").attr("src",$(this).data("src"));
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
(function (w) {
    // version check
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 && parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10) < 7) {
        location.href = '/NoticeIE6.html';
    }
})(window);






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

var waitForFinalEvent = (function () {
  var timers = {};
  return function (callback, ms, uniqueId) {
    if (!uniqueId) {
      uniqueId = "Don't call this twice without a uniqueId";
    }
    if (timers[uniqueId]) {
      clearTimeout (timers[uniqueId]);
    }
    timers[uniqueId] = setTimeout(callback, ms);
  };
})();


/*

$(window).resize(function () {
    waitForFinalEvent(function(){
      alert('Resize...');
      //...
    }, 500, "some unique string");
});

*/

var scrollT = $(window).scrollTop();
var initSize = true;



//
 function fadePlayMotion(play , t , speed){
    if(t){
      if(Modernizr.opacity){
          play.css({"display":"block","opacity":0}).stop().animate({"opacity":1},speed);
        }else{
          play.css({"display":"block"})
        }
    }else{//t
       if(Modernizr.opacity){
          play.stop().animate({"opacity":0},speed,function(){
            $(this).css("display","none");
          });
        }else{
          play.css({"display":"none"})
        }
    }

  }//fadePlayMotion

var sideMenuState;


function initResize(b){

    var reizeTimeOut;
    var headerAreaWidth = $("#header").outerWidth();
    var contentAreaWidth = $(window).width();
    var contentAreaHeight = $(window).height();
    //console.log(contentAreaWidth);
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



$(window).resize(initResize);

function pageSetting(){
    var lnb1depth = $("#lnb .list > li");
    var snb1depth = $(".side .snb > li");
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

    var snbTimeout;

    $("<img>").attr({
      "src" : "../images/bg/bg_snb_arr.gif",
      "alt" : ""
    }).css({
      "position":"absolute",
      "right":(subClassification) ? 0 : -8,
      "top":(subClassification) ? $(".side .snb > li.s"+subNum).offset().top - 52 : 0
    }).addClass("arr_snb").appendTo(".side")




  $(".side .snb > li").on("mouseenter" , function(){
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
  });

  initResize();
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
  var snbMenu = $(".side");
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
}//elemtAccordionMotion

function elemtAccordionMotion2(obj){
  var o = $(obj);

  o.each(function(){
    var $this = $(this);
    var Handler = $this.find(".handler");
    var close = $this.find(".close");
    function closeMotion(){
      $(this).parents(".answer").removeClass("on").css("display","none");
    };

    function motion(e){
      e.preventDefault();
      var $t = $(this);
      var answer = $t.parents("tr").next();
      var b = answer.css("display") == "table-row";
       $this.find(".answer.on").css("display","none");
      if(!b) answer.addClass("on").css("display","table-row");






    };





    close.on("click",closeMotion);
    Handler.on("click",motion);
  });//each

}//elemtAccordionMotion2




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

function checkListMotion(obj){
  if(obj == undefined){
    var o = $(".lst_check");
  }else{
    var o = $(obj);
  }

    o.each(function(){
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

    o.find(" > span > label").off().on("click",function(){
      if($(this).parent().parent().hasClass("radio")){
       $(this).parent().siblings(".on").removeClass("on").end().addClass("on");
     }else{
      $(this).parent().toggleClass("on");
     }//if

  });
}

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

function chkForm(f) {
	//alert("chk");
	if (chkDefaultForm(f)) {
		$(f).ajaxSubmit({
			//target: '#htmlExampleTarget',
			url: 'index.php',
			dataType:  'json',
			success : processResult,
			error : errorMsg
		});
	}
}

function processResult(data) {
	if (data.url != "") {
		alert(data.msg);
		window.location.href = data.url;
	}
	else {
		alert(data.msg);
	}

	//alert(data.message);
	//$('#htmlExampleTarget').html(data.message).fadeIn('slow');
}

function errorMsg() {
	alert("요청 처리 중 오류가 발생하였습니다.\r\n다시 시도하여 주십시오.");
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


function sharePinterest(url, img, title){
	var href = "http://www.pinterest.com/pin/create/button/?url="+encodeURIComponent(url)+"&media="+encodeURIComponent(img)+"&description="+encodeURIComponent(title);
	var a = window.open(href, 'pinterest', 'width=800, height=500');
	if (a){a.focus();}
}


function shareFaceBook(url, img, title, summary){
	/*
	$("meta[property='og:title']").attr("content", title);
	$("meta[property='og:image']").attr("content", img);
	$("meta[property='og:type']").attr("content", "art");
	$("meta[property='og:site_name']").attr("content", "아트1닷컴");
	$("meta[property='og:url']").attr("content", url);
	$("meta[property='og:description']").attr("content", summary);
	*/
	var fullUrl;
	var pWidth = 640;
	var pHeight = 380;
	var pLeft = (screen.width - pWidth) / 2;
	var pTop = (screen.height - pHeight) / 2;

	/*
	fullUrl = 'http://www.facebook.com/share.php?s=100&p[url]='+url+'&p[images][0]='+img+'&p[title]='+title+'&p[summary]='+summary;
	fullUrl = fullUrl.split('#').join('%23');
	fullUrl = encodeURI(fullUrl);
	window.open(fullUrl,'','width='+ pWidth +',height='+ pHeight +',left='+ pLeft +',top='+ pTop +',location=no,menubar=no,status=no,scrollbars=no,resizable=no,titlebar=no,toolbar=no');
	*/

	fullUrl = "https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(url) +  "&t=" + encodeURIComponent(title);
	window.open(fullUrl,'','width='+ pWidth +',height='+ pHeight +',left='+ pLeft +',top='+ pTop +',location=no,menubar=no,status=no,scrollbars=no,resizable=no,titlebar=no,toolbar=no');
}

function shareFaceBookMarket(url, img, title, summary){
	/*
	$("meta[property='og:title']").attr("content", title);
	$("meta[property='og:image']").attr("content", img);
	$("meta[property='og:type']").attr("content", "art");
	$("meta[property='og:site_name']").attr("content", "아트1닷컴");
	$("meta[property='og:url']").attr("content", url);
	$("meta[property='og:description']").attr("content", summary);
	*/
	var fullUrl;
	var pWidth = 640;
	var pHeight = 380;
	var pLeft = (screen.width - pWidth) / 2;
	var pTop = (screen.height - pHeight) / 2;

	url = $(".swiper-slide-active > div > a").attr("href");
	url = window.location.protocol + "//" + window.location.host + "/marketPlace/"+url;
	/*
	fullUrl = 'http://www.facebook.com/share.php?s=100&p[url]='+url+'&p[images][0]='+img+'&p[title]='+title+'&p[summary]='+summary;
	fullUrl = fullUrl.split('#').join('%23');
	fullUrl = encodeURI(fullUrl);
	window.open(fullUrl,'','width='+ pWidth +',height='+ pHeight +',left='+ pLeft +',top='+ pTop +',location=no,menubar=no,status=no,scrollbars=no,resizable=no,titlebar=no,toolbar=no');
	*/

	fullUrl = "https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(url) +  "&t=" + encodeURIComponent(title);
	window.open(fullUrl,'','width='+ pWidth +',height='+ pHeight +',left='+ pLeft +',top='+ pTop +',location=no,menubar=no,status=no,scrollbars=no,resizable=no,titlebar=no,toolbar=no');
}

function shareGooglePlus(url, title) {
	var url = "https://plus.google.com/share?url="+ encodeURIComponent(url) + "&t=" + encodeURIComponent(title);
	window.open(url, '', 'width=490 height=470');
}

 function calendar(flag, idx) {
	window.location.href = "download.php?flag="+flag+"&idx="+idx;
}

/*
function googleCal(text, bd,  loc) {
	var action= "TEMPLATE";
	//var text = "Opening+Tonight:+Julie+Rrap,+Remaking+the+World+in+Sydney";
	//var dates = "20160216/20160216";
	var details = "For+more+information+please+visit:+http://www.art1.com/galleries/";
	//var loc = "8+Soudan+Lane,+Paddington,+Sydney,+Australia";
	var sprop = "website:www.art1.com";

	window.open("https://calendar.google.com/calendar/render?action="+action+"&text="+text+"&dates="+bd+"/"+bd+"&details="+details+"&location="+loc+"&sprop="+sprop+"&pli=1&sf=true&output=xml#eventpage_6");
}
*/

function googleCal(flag, idx) {
	window.open("calendar.php?flag="+flag+"&idx="+idx);
}

function goLogin() {
	alert('로그인 후 이용할 수 있습니다.');
	location='/member/login.php?returnUrl='+encodeURIComponent(location.href);
}

function showLayerArtworksView(idx, widx, eidx, aidx, fidx, tgt){
	var t = $("#pop_bx_common");
	$.ajax({
		url : '/galleries/artworks/ajax_pop_artworks_view.php',
		type : 'POST',
		dataType : 'html',
		data : {"idx":idx, "widx":widx, "eidx":eidx, "aidx":aidx, "fidx":fidx, "tgt":tgt},
		success : function(data){
			t.html(data);
		},
		error : function(a,b,c){
			alert(c);
		}
	})
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};