<?php
class LIB_DATE
{
	# LINUX TIMESTAMP
	function Date2Timestamp($year, $month = 0, $day = 0, $hours = 0, $mins = 0, $seconds = 0)
	{
		return mktime($hours, $mins, $seconds, $month, $day, $year);
	}

	function DateToStamp($NowDate="", $RtnType="DateTime")
	{
		if(empty($NowDate)) $NowDate = date("Y-m-d H:i:s",Mktime());
		$NowYear = date("Y",strtotime($NowDate));
		$NowMonth = date("m",strtotime($NowDate));
		$NowDay = date("d",strtotime($NowDate));
		$NowHour = date("H",strtotime($NowDate));
		$NowMinute = date("i",strtotime($NowDate));
		$NowSecond = date("s",strtotime($NowDate));
		switch($RtnType)
		{
			Case "Date": $NowStamp = mktime(0, 0, 0, $NowMonth, $NowDay, $NowYear); Break;
			Case "Time": $NowStamp = mktime($NowHour, $NowMinute, $NowSecond, $NowMonth, $NowDay, $NowYear) - mktime(0, 0, 0, $NowMonth, $NowDay, $NowYear); Break;
			Default: $NowStamp = mktime($NowHour, $NowMinute, $NowSecond, $NowMonth, $NowDay, $NowYear); Break;
		}
		return $NowStamp;
	}
	
	function StampToDate($NowStamp="", $RtnType="DateTime")
	{
		if(empty($NowStamp)) $NowStamp = Mktime();
		switch($RtnType)
		{
			Case "Date": $NowDate = date("Y-m-d",$NowStamp); Break;
			Case "Time": $NowDate = date("H:i:s",$NowStamp); Break;
			Default: $NowDate = date("Y-m-d H:i:s",$NowStamp); Break;
		}
		return $NowDate;
	}

	//-- 원하는 형태로 변경해서 출력함
	//-- Y년 m월 d일 H시 i분 s초 같이
	function DateToString($NowDate="", $RtnType="Y-m-d")
	{
		if(empty($NowDate)) $NowDate = date("Y-m-d H:i:s",Mktime());
		$NowYear = date("Y",strtotime($NowDate));
		$NowMonth = date("m",strtotime($NowDate));
		$NowDay = date("d",strtotime($NowDate));
		$NowHour = date("H",strtotime($NowDate));
		$NowMinute = date("i",strtotime($NowDate));
		$NowSecond = date("s",strtotime($NowDate));
		
		$RtnType = str_replace("Y",$NowYear,$RtnType);
		$RtnType = str_replace("m",$NowMonth,$RtnType);
		$RtnType = str_replace("M",intval($NowMonth),$RtnType); //-- 한자리
		$RtnType = str_replace("d",$NowDay,$RtnType);
		$RtnType = str_replace("D",intval($NowDay),$RtnType); //-- 한자리
		$RtnType = str_replace("h",$NowHour,$RtnType);
		$RtnType = str_replace("i",$NowMinute,$RtnType);
		$RtnType = str_replace("s",$NowSecond,$RtnType);
		
		return $RtnType;
	}

	#############################################################################
	##-- 매달 의 마지막날일
	function GetEndDay($Year, $Month)
	{
		$Month = intval($Month);
		$EndDay = array(31,29,31,30,31,30,31,31,30,31,30,31);
		if($Year % 4 != 0) $EndDay[1] = "28";
		else if($Year % 100 != 0) $EndDay[1] = "29";
		else if($Year % 400 != 0) $EndDay[1] = "28";
		else  $EndDay[1] = "29";

		return $EndDay[$Month - 1];
	}
	
	#############################################################################
	##-- 요일표시
	function GetWeekName($num)
	{
		$ReturnValue = "";
		switch($num){
			case "0" :
				$ReturnValue = "일";
			break;
			case "1" :
				$ReturnValue = "월";
			break;
			case "2" :
				$ReturnValue = "화";
			break;
			case "3" :
				$ReturnValue = "수";
			break;
			case "4" :
				$ReturnValue = "목";
			break;
			case "5" :
				$ReturnValue = "금";
			break;
			case "6" :
				$ReturnValue = "토";
			break;
		}

		return $ReturnValue;
	}
	
	function GetDateToWeek($day){
		$week = array("일","월","화","수","목","금","토");
		return $week[date('w', strtotime($day))];
	}
	
	
}
?>