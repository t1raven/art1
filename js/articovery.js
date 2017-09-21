function loginPopClose(){
  //console.log("loginPopClose 실행");
  $("#layerNewletter").css("display","none");
  $("#cover").remove();
}

function weekPopClose(){ //일주일간 열지 않기
  //alert($("input:checkbox[id='a_week']").is(":checked"));
  if ( $("input:checkbox[id='a_week']").is(":checked") == true){
    setCookie("cookLoginPopClose",true, 7);
  }
}

function googleOpen(url){
  if($("#returnUrl<?php echo $ajax_state;?>").val() != '/'){
    $("#returnUrl<?php echo $ajax_state;?>").val(document.location.href) ;
  }
  window.open(url, 'googleLogin', ',width=500,height=450');
}

function setMyPin(idx){
	$.ajax({
		url:'index.php',
		type:'post',
		data:{'idx':idx, 'at':'update'},
		dataType:'json',
		success:function(data){
			//alert(data.result);
			if(data.result == 1){
				if(data.contact == 0){
					//$("#popup_prd").find("div.head > div > div > button.pin").addClass("on").attr("onclick", "void(0)");
					$("#popup_prd").find("div.head > div > div > button.pin").addClass("on").attr("onclick", "layerPopup3.open('index.php','popup_pin_cancel','',{'idx':'"+data.works_idx+"','at':'cancel'}); return false;");
					$("#img-pin-"+idx).attr("src", "/images/articovery/img_pin_on.png");
				}else{
					$("#popup_prd").find("div.head > div > div > button.pin").addClass("on").attr("onclick", "void(0)");
				}
				getThumb(data.covery_idx);

				if(data.pin_cnt == 9){
					//$("#popup_prd").find("div.head > div > div > button.pin").addClass("on").attr("onclick", "void(0)");
					layerPopup3.open('index.php','popup_alert3', '', {'covery':data.covery_idx,'at':'write'});
				}
			}else{
				if(data.pin_cnt == 9){
					alert("핀은 최대 9개 까지만 가능합니다.");
					return false;
				}else{
					alert("error");
					return false;
				}
			}
		}
	});
}

function setMyPinCancel(idx){
	$.ajax({
		url:'index.php',
		type:'post',
		data:{'idx':idx, 'mode':'cancel', 'at':'update'},
		dataType:'json',
		success:function(data){
			//alert(data.result);
			if(data.result == 1){
				$("#popup_prd").find("div.head > div > div > button.pin").removeClass("on").attr("onclick", "layerPopup3.open('index.php','popup_alert1','',{'idx':'"+idx+"', 'at':'pin'}); return false;");
				$("#img-pin-"+idx).attr("src", "/images/articovery/img_pin_off.png");
				getThumb(data.covery_idx);
			}else{
					alert("error");
					return false;
			}
		}
	});
}

function getThumb(idx){
	$.ajax({
		url:'index.php',
		type:'post',
		data:{'idx':idx, 'at':'thumb'},
		dataType:'html',
		success:function(data){
			if(data){
				$("#box-pin1").children().remove();
				$("#box-pin1").html(data);

				// $("#box-pin1").imagesLoaded(function(){
				// 	iCutter(".i-cut");
				// })
			}else{
				alert("error");
			}
		}
	});
}

function setPinContact(){
	var regNumber = /^[0-9]*$/;
	var contact = $("#contact").val();
	if(contact.trim() == ""){
		alert("핸드폰 번호를 입력하세요.");
		$("#contact").focus();
		event.stopPropagation();
		return false;
	}else{
		if(!regNumber.test(contact)){
			alert("핸드폰 번호는 숫자만 입력해 주세요.");
			$("#contact").focus();
			event.stopPropagation();
			return false;
		}
		if(contact.length < 10){
			alert("핸드폰 번호가 유효하지 않습니다.다시 입력해 주세요.");
			$("#contact").focus();
			event.stopPropagation();
			return false;
		}
	}

	if ($(":radio[id=sms_agree1]").is(":checked") == false){
		alert("sms 수신동의에 동의 하셔야 합니다.");
		$("#sms_agree1").focus();
		event.stopPropagation();
		return false;
	}

	if ($('input:checkbox[id="roll_agree"]').is(":checked") == false ){
		alert("이용약관에 동의 하셔야 합니다.");
		$("#roll_agree").focus();
		event.stopPropagation();
		return false;
	}

	if ($('input:checkbox[id="private_agree"]').is(":checked") == false ){
		alert("개인정보 취급방침에 동의 하셔야 합니다.");
		$("#private_agree").focus();
		event.stopPropagation();
		return false;
	}

	$.ajax({
		url:"index.php",
		type:"post",
		data:{"covery":$("#covery").val(), "contact":contact, "at":"contact"},
		dataType:"json",
		success: function(data){
			if(data.result == 1) {
				//alert("등록 되었습니다.");
				layerPopup3.open('index.php','popup_alert4', '', {'at':'complete'});
				//return false;
			}else{
				alert("등록 오류가 발생했습니다.\r\n관리자에게 문의하여 주세요");
				//return false;
			}
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			//return false;
		}
	});

	//$("#pop_alert3").remove();
	//return false; //새로고침 방지
}

$("body").addClass("articoveryM");

function qmenu(){
	var $obj = $(".box_pin");
	var $start = $(".container_inner.pin");
	var $end = $("#footer");
	var mosize = 960;
	var win = $(window),
	doc = $(document),
	body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');

	function size(){
	   var tsize = $start.offset().top;
	   var top1 = win.scrollTop();
	   var top2 = win.scrollTop() + win.height();
	   var offset = $obj.offset();

	   if(tsize <=  top1 && $obj.outerHeight() <  win.height() ){
		 $obj.addClass("fix");
	   }else{
	   	$obj.removeClass("fix");
	   }
	};

	$(window).on("resize.qmenu",function(){
   		if(win.width() >= mosize){
   			size();
   		}
	});

	$(window).on("scroll.qmenu",function(){
		if(win.width() >= mosize){
	   	   size();
	      }
	});
}

qmenu();
//탭(전체/카테고리)

function thumbBoxEvent(o){
	var $obj = $(o);
	var $cursor = $(".m_cursor1");
	var mosize = 960;
	var win = $(window),
	doc = $(document),
	body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
	$obj.each(function(){
	var $this = $(this);
		$this.off().on("mousemove mouseleave",function(event){
			if(win.width() >= mosize){
				var $that = $(this);
				if(event.type == "mousemove"){
					      x = event.pageX;
	    				      y = event.pageY;
	    				      // console.log(x);
	    				      // console.log(y);
					$cursor.css({
						"display":"",
						"position":"absolute",
						"top":y,
						"left":x,
						/*"margin-left": -($cursor.width() / 2),
						"margin-top": -($cursor.height() / 2),*/
						"margin-left": ($cursor.width() / 3),
						"margin-top": ($cursor.height() / 3),
						"z-index":50
					});
					$that.css("cursor","none").find("a").css("cursor","none");

				}else{
					$cursor.css({
						"display":"none"
					})
					$that.css("cursor","auto");
				}

			}

		});

	});

}

/*

var pinScroll;
var $container = $(".lst-isotope");
var isotope = [];
var lstIsotope = [];
var scrollNewsStartFlag = false;

var page = 1;
var totalCount = <?php echo $worksTotalCount;?>;
var totalPage = Math.ceil(totalCount / <?php echo $sz; ?>);
*/

var loadingImg = $("<img>").addClass("loading").attr("src","../images/ico/ajax-loader.gif").css({
    "position":"absolute",
    "left":"50%",
    "top":0,
    "margin-left":-30
  });



function cannotPIN(){
	alert("9개의 PIN을 이미 선택하였습니다.\r\n더 이상 PIN을 선택할 수 없습니다.");
}

function bpop(id){
	$("#popup_prd").find(".thumb > img").attr("src", "/images/articovery/noimg.png");

	$.ajax({
		url:"index.php",
		type:"post",
		data:{idx:id, at:"read"},
		dataType:"json",
		async:true,
		success:function(data){
			console.log(data);
			var title;
			//$("#popup_prd").children().remove();
			//$("#popup_prd").html(data);
			if(data.result == 1){
					$("#popup_prd").find(".thumb > img").attr("src", data.works_img);
					$("#popup_prd").find("div.head > div > p").text(data.title);
					if (data.pin == 1){
						if(data.contact == 0){
							$("#popup_prd").find("div.head > div > div > button.pin").addClass("on").attr("onclick", "layerPopup3.open('index.php','popup_pin_cancel','',{'idx':'"+data.works_idx+"','at':'cancel'}); return false;");
						}else{
							$("#popup_prd").find("div.head > div > div > button.pin").addClass("on").attr("onclick", "void(0)");
						}
					}else{
						$("#popup_prd").find("div.head > div > div > button.pin").removeClass("on");
						if(data.contact == 0){
							$("#popup_prd").find("div.head > div > div > button.pin").attr("onclick", "layerPopup3.open('index.php','popup_alert1','',{'idx':'"+data.works_idx+"', 'at':'pin'}); return false;");
						}else{
							$("#popup_prd").find("div.head > div > div > button.pin").attr("onclick", "cannotPIN();");
						}
					}
			}else{
				alert("자료가 존재하지 않습니다.");
			}
			$("#popup_prd").imagesLoaded(function(){





				var win_top , w , h , win_h;
				$("#popup_prd").bPopup({
			            closeClass : "b-close",
			             follow: [true, true],
			              onClose: function() {
			              	if(win_h <  h){
					            	$("#wrap").css({
							      "overflow":"",
							      "height":""
							})//css
					            	$(window).scrollTop(win_top);
				          	 }

			              }
			          },function(){
				          	win_top = $(window).scrollTop();
				          	w = $("#popup_prd .thumb").width();
				          	h = $("#popup_prd .thumb").height();
				          	win_h = $(window).height();

				          	if(win_h <  h){
				          		$(window).scrollTop(0);
				          		$("#popup_prd").css("top",0);
				          		$("#wrap").css({
							    "overflow":"hidden",
							    "height":h
							  })//css
				          	}



				          	var $cursor2 = $(".m_cursor2");
						var mosize = 960;
						var win = $(window),
						doc = $(document),
						body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
						var $thumb = $("#popup_prd .thumb");
							$thumb.off().on("mousemove mouseleave",function(event){
								if(win.width() >= mosize){
									var $that = $(this);
									if(event.type == "mousemove"){
										      x = event.pageX;
						    				      y = event.pageY - $that.scrollTop();
						    				      // console.log(x);
						    				      // console.log(y);
										$cursor2.css({
										      "display":"",
											"position":"absolute",
											"top":y,
											"left":x,
											/*"margin-left": -($cursor2.width() / 2),
											"margin-top": -($cursor2.height() / 2),*/
											"margin-left": (27 / 3),
											"margin-top": (35 / 3),
											"z-index":50
										});
										$that.css("cursor","none").find("a").css("cursor","none");

									}else{
										$cursor2.css({
											"display":"none"
										})
										$that.css("cursor","auto");
									}

								}

							});


			        });




			});

			//$("#popup_prd").find("div > img").attr("src", "/upload/articovery/big/14958726405F33AAQMA2.jpg");

			/*
			var win_top , w , h , win_h;

			$("#popup_prd").bPopup(
				{
					closeClass : "b-close",
					follow: [true, true],
				},
				function(){
					win_top = $(window).scrollTop();
					w = $("#popup_prd .thumb").width();
					h = $("#popup_prd .thumb").height();
					win_h = $(window).height();
					if(win_h <  h){
						$(window).scrollTop(0);
						$("#popup_prd").css("top",0);
						$("#wrap").css({"overflow":"hidden", "height":h}); //css
					}
				}
			);

			$(".b-close").off().on("click",function(){
				if(win_h <  h){
					$(window).scrollTop(win_top);
					$("#wrap").css({"overflow":"", "height":""}); //css
				}
			});
			*/
		}

	});




}

function layerPopup3(){
 var $win = $(window);
 var $html = $('html, body');

   this.open = function (url,id,func,da2){
          var $wrap = $('#wrap');

          if(func != "none"){
            var callbacks = $.Callbacks(id);
            callbacks.add( func );
          }
          if(url != undefined){
                     $.ajax({
                        type:"GET",
                        url:url,
                        dataType:"html",
                        data : da2,
                         success : function(data) {
                            var cont ;
                            var $data = $(data);

                          // if($("#"+id).length > 0){
                          //      $("#"+id).bPopup({
                          //       closeClass : "b-close"
                          //      });
                          //   }else{
                               newLayer();
                            //}

                            function newLayer(){
                                $("body").append( $("<div id="+id+" class='layerPopup3'>") );
                                $("#"+id).append($data)
                                  $("#"+id).imagesLoaded(function(){
                                  	console.log("111");
                                      callbacks.fire("#"+id);
                                      $("#"+id).bPopup({
                                        closeClass : "b-close",
                                         onClose: function() {
                                         		$("#"+id).remove();
                                         }
                                      });
                                  });

                            }

                        },
                         complete : function(data) {
                         },error : function(xhr, status, error) {

                         }
                    })

          }else{//if
              alert('팝업파일이 존재하지 않습니다.');
          }
   };//open
   this.close = function (id){


   };//close


}//layerPopup



function scrollNewEvent(w) {
  var win = $(window),
  doc = $(document),
  body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
  var top = win.scrollTop() + win.height();
  var endHeight = $(".lst-isotope").offset().top + ($(".lst-isotope").outerHeight()  / 2);
  if (top > endHeight ) {
    if (totalPage >= page) {
    //if (totalPage > page) {
      startScroll();
    }
  }

  function startScroll() {
    if (!scrollNewsStartFlag) {
      scrollNewsStartFlag = true;

	  nextPage(); //2016-04-27 업체요구 무한스크롤 처리 LYT

      }
  }
};//scrollNewEvent



 function nextPage(){
    loadingStart($(".articovery_pin_main").outerHeight());
    getItemElement();
    // if (totalPage <= page){
    //   $("#marketProductAjax .newsBox.bt_vewmore").css("visibility","hidden");
    // }
 }


function loadingStart(num){
    $(".articovery_pin_main").append(loadingImg);
    loadingImg.css("top",num);
};



function getItemElement() {
    if (page == 1) {
      page = 2;
    }
	$.ajax({
          type:"get",
          url:"index.php",
          data:{"page":page, "at":"alist"},
          dataType:"html",
          success : function(data) {
            loadingImg.animate({
                  "opacity":0
                },500,function(){
                  $(this).css("opacity",1).remove();
                    $("<div id='tmpData'></div>").html(data).appendTo($container);
                      var count = $container.find("#tmpData .newsBox").length;
                      var $data2 = $($container.find("#tmpData").html());
                       thumbBoxEvent(".lst-isotope .thumb");
                      $container.append($data2);
                      $("#tmpData").remove();
                      $data2.imagesLoaded(function(){
                      	$container.find(".box-thumb").css("visibility","visible");
                           lstIsotope[0]
                           .isotope('insert',$data2)
                           .isotope('layout');
                            page ++;
                            scrollNewsStartFlag = false;

                            //$container.off("click.motionView").on( 'click.motionView', '.newsBox',marketViewMotion);
                        });//imagesLoaded
                })//loading

          },
           complete : function(data) {

           },error : function(xhr, status, error) {
            alert(error);
            $container.children().remove();
            $('<p class="noProduct">작품이 존재하지 않습니다.</p>').appendTo($container);
           }
      })
}//getItemElement





function quickMobile(b){
			var $this = $(".box_pin .box-scrollX");
			var $pos = $this.find(" .pos");
 	  	if(b){

			var w = 0;
			for (var i = 0; i <= $this.find(".thumb").length; i++) {
				w = w + $this.find(".thumb:eq("+i+")").outerWidth(true);
			}
			if($this.width() <  w){
				$pos.css("width",w + 10).parent().css("visibility","visible");

			}else{
				$pos.css("width","100%").parent().css("visibility","visible");
			}

		   pinScroll.refresh();


		  }else{
		  	$pos.css({"width":"auto"});
		  	pinScroll.refresh();

		  }




}




$(window).on("resize.quick",function(){
	var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	if(w > 960){
		quickMobile(false);
	}else{
		quickMobile(true);
	}
});


$(window).load(function() {
  	iCutterLoadNone(".i-cut");
  	//dotWindow(".t-dot");
  	thumbBoxEvent(".lst-isotope .thumb");


	pinScroll = new Swiper('.swiper-container', {
	    pagination: '.swiper-pagination',
	    slidesPerView: 3,
	    paginationClickable: true,
	    spaceBetween: 30,
	    freeMode: true
	});


  	pinScroll =  new IScroll("#box-pin1", {
		      scrollbars: false,
		      scrollX: true, scrollY: false,freeScroll: false,
		      // mouseWheelSpeed:200,
		       mouseWheel: true,
		      zoom: true,
		      click:true,
		      preventDefault:false,
		      interactiveScrollbars: false
		      //bounce:false
		      //bounceEasing: 'elastic',
		      //bounceTime: 0
		    });
	// pinScroll = new IScroll("#box-pin1", {
	//     scrollX: true,
	//     scrollY: false,
 //           scrollbars: false,
	//     mouseWheelSpeed:200,
	//     mouseWheel: true,
	//     probeType: 2,
	//     preventDefaultException: {
	//     // default config, all form elements,
	//     // extended with a WebComponents Custom Element from the future
	//     tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|X-WIDGET)$/,
	//     // and allow any element that has an accessKey (because we can)
	//     accessKey: /.+/
	//   }
	//  });




	    $(window).trigger("resize");
  //var num = 0;
   $(".box_pin .prev , .box_pin .next").on("click",function(e){
   	      //var matrix = $("#box-pin1 .pos").transform('x');
		 var current_pull = parseInt($("#box-pin1 .pos").css('transform').split(',')[4]);

		// translateX
		// var matchX = matrix.match(/translateX\((-?\d+\.?\d*px)\)/);
		// if(matchX) {
		//   translate.x = matchX[1];
		// }

		var b = $(this).hasClass("prev");
		var box = $("#box-pin1 .pos .thumb").width();

		if(b){
			var t = current_pull + box;
			pinScroll.scrollTo(t,0,100);
		}else{
			var t = current_pull - box;
			pinScroll.scrollTo(t,0,100);
		}

   })

  	    // isotope 플러그인
  if($(".lst-isotope").length > 0){

      function onRecentAlways(){

          for (var i = 0; i < $(".lst-isotope").length; i++) {
              var $lst_isotope = $(".lst-isotope:eq("+i+")");
              isotope[i] =  $lst_isotope;
              var isotopePlugin = $(".lst-isotope").isotope({
                    itemSelector: '.box-thumb',
                    layoutMode: 'packery'
               });
              lstIsotope.push(isotopePlugin);
             $(".lst-isotope > *").css("visibility","visible");



          }//for
      };//onRecentAlways
     var recentLoad = imagesLoaded($(".lst-isotope"));
     recentLoad.on( 'always', onRecentAlways );


     $(window).on("scroll",function(){
	 	scrollNewEvent();
	})


  }//if :: isotope


  })

window.layerPopup3  = new layerPopup3();