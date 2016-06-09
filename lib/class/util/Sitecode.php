<?php
class Sitecode{
	/**
	* 사이트 관련 정보를 DB에서 검색 후 배열화 함
	*/
	function GetSiteCode($str,$sort = "")
	{
		$arrSiteCode = array();
		if(empty($sort) ) $SQL = "SELECT siteCode,siteCodeName FROM TB_SITE_CODE WHERE siteCodeGroup='" . $str . "' ORDER BY siteCodeSort";
		else $SQL = "SELECT siteCode,siteCodeName FROM TB_SITE_CODE WHERE siteCodeGroup='" . $str . "' ORDER BY siteCodeName";
		$RESULT = mysql_query($SQL);		
		if($RESULT && mysql_num_rows($RESULT) > 0){
			while($ROW = mysql_fetch_assoc($RESULT) ) {
				extract($ROW);
				$arrSiteCode[$siteCode] = $siteCodeName;
			}
		}
		return $arrSiteCode;
	}
	
	//-- 회원 미입금 카운트
	function getNoPayCount($memberUid){
		$SQL = "SELECT noPayCount FROM TB_MEMBER WHERE memberUid='$memberUid'";
		$RESULT = mysql_query($RESULT);
		if($RESULT && mysql_num_rows($RESULT) > 0){
			return mysql_result($RESULT,0,0);
		}
		else{
			return "-1";
		}
	}
}
?>