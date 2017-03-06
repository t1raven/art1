//작성자: 이용태
//작성일 : 2014-12-03
//모듈 : 기간 검색 - 기간 날짜를 리턴 
$(document).ready(function(){
	$("#check_all").click(function() {
		$("input[name='idxs[]']:checkbox").attr("checked", true);
		$("#check_all").hide();
		$("#uncheck_all").show();
	});
	$("#uncheck_all").click(function() {
		$("input[name='idxs[]']:checkbox").attr("checked", false);
		$("#check_all").show();
		$("#uncheck_all").hide();
	});
	
	var nowdate = new Date();
	date_str = nowdate.getFullYear() + "-" + (nowdate.getMonth()+1) + "-" + nowdate.getDate(); //오늘
	function  jsDateCalculation(term){
		if (term == "month1") { //최근한달
			s_date_str = nowdate.getFullYear() + "-" + (nowdate.getMonth()) + "-" + nowdate.getDate();
			return s_date_str
		}
		if (term == "month3") { //최근석달
			s_date_str = nowdate.getFullYear() + "-" + (nowdate.getMonth()-2) + "-" + nowdate.getDate();
			return s_date_str
		}
	}

	$("#today").bind("click", function() { //오늘
		$('input[name=s_date]').val(date_str); 
		$('input[name=l_date]').val(date_str); 
	});
	$("#month1").bind("click", function() { //최근 한달
		$('input[name=s_date]').val(jsDateCalculation("month1")); 
		$('input[name=l_date]').val(date_str); 
	});
	$("#month3").bind("click", function() { //최근 석달
		$('input[name=s_date]').val(jsDateCalculation("month3")); 
		$('input[name=l_date]').val(date_str); 
	});
	
});

function show_hide(show_var, hide_var){ //첫번째 인자는 보이기, 두번째 인자는 감추기
	$("show_var").show();
	$("hide_var").hide();
}
