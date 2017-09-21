<?php
class LIB_LIB
{
	/**
	* Get방식으로 받아서 검색에 적용할 경우
	*/
	public static function CkSearch($str)
	{
		//$str = iconv('euc-kr', 'utf-8', $str);
		$str = str_replace("%",'',trim($str) );
		$str = str_replace("'",'',$str);
		$str = str_replace("&",'',$str);
		$str = str_replace("?",'',$str);
		$str = str_replace(";",'',$str);
		$str = str_replace("\"",'',$str);
		return $str;
	}
	/**
	* Post방식으로 받아서 DB에 INSERT,UPDATE 할 경우
	*/
	public static function CkWord($str)
	{
		$str = trim($str);
		return $str;
	}

	/**
	* 글 수정시 " 값을 &quot; 로 변경
	**/
	public static function CkEdit($str){
		$str = trim($str);
		$str = str_replace("\"","&quot;");
		return $str;
	}

	/**
	 * real_ip()
	 *
	 * 게이트웨이를 포함한 ip
	 */
	public static function RealIp()
	{
		if (getenv('HTTP_X_FORWARDED_FOR'))
		{
			@$ip = getenv('HTTP_X_FORWARD_FOR');
			@$host = gethostbyaddr($ip);
		}else{
			@$ip = getenv('REMOTE_ADDR');
			@$host = gethostbyaddr($ip);
		}
		if($ip == $host) return $ip; else return $ip . "-" . $host;
	}

	/**
	* 임시키 생성
	*/
	public static function SecuID($num,$str = "")
	{
		//if(empty($str) ) $str = "23456789ASBCDEFGHKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz";
		if(empty($str) ) $str = "23456789ASBCDEFGHKLMNPQRSTUVWXYZ";
		for($i=0; $i<$num; $i++)
		{
			$serial .= $str[rand()%strlen($str)];
			uniqid($serial);
		}
		return $serial;
	}

	/**
	* cut_len의 길이만큼 $str문자를 이용하여 생상함
	*/
	public static function CutString($str,$cut_len,$add_str='..')
	{
		return $this->CutUtf8($str,$cut_len,"..");

		/* euc-kr일경우
		$getStr = substr($str, 0, $cut_len);
		preg_match('/^([\x00-\x7e]|.{2})*이곳을지움/', $getStr, $b);
		$getStr = $b[0];
		if(strlen($str) > $cut_len) return $getStr . $add_str;
		else return $getStr;
		*/
	}

	public static function CutUtf8($str, $len, $checkmb=false, $tail='') {
		/**
		* UTF-8 Format
		* 0xxxxxxx = ASCII, 110xxxxx 10xxxxxx or 1110xxxx 10xxxxxx 10xxxxxx
		* latin, greek, cyrillic, coptic, armenian, hebrew, arab characters consist of 2bytes
		* BMP(Basic Mulitilingual Plane) including Hangul, Japanese consist of 3bytes
		**/
		preg_match_all('/[\xE0-\xFF][\x80-\xFF]{2}|./', $str, $match); // target for BMP
		$m = $match[0];
		$slen = strlen($str); // length of source string
		$tlen = strlen($tail); // length of tail string
		$mlen = count($m); // length of matched characters

		if ($slen <= $len) return $str;
		if (!$checkmb && $mlen <= $len) return $str;
		$ret = array();
		$count = 0;
		for ($i=0; $i < $len; $i++) {
			$count += ($checkmb && strlen($m[$i]) > 1)?2:1;
			if ($count + $tlen > $len) break;
			$ret[] = $m[$i];
		}
		return join('', $ret).$tail;
	}


	/**
	* HTML을 TEXT로 변경
	*/
	public static function Html2Text($str)
	{
		return preg_replace(array("/&amp;/i", "/&nbsp;/i"), array('&', '&amp;nbsp;'), htmlspecialchars($str, ENT_QUOTES));
	}

	/**
	* TEXT를 HTML로 변경
	*/
	public static function Text2Html($str)
	{
		if (version_compare(phpversion(), "4.3.0") == 1)
		{
			return html_entity_decode($str);
		}else{
			$trans_tbl = get_html_translation_table(HTML_ENTITIES);
			$trans_tbl = array_flip($trans_tbl);
			return strtr($str, $trans_tbl);
		}
	}

	# AUTO HYPERLINK
	public static function AutoLink($str)
	{
		return preg_replace_callback("/(?<!<a href=\"|[^\s])((http|https|ftp|mailto|ed2k)+(s)?:\/\/[^<>\s]+)/i", "ShortAutoLink", $str);
	}

	# AUTO HYPERLINK SHORT
	public static function ShortAutolink($matches)
	{
		$str = $matches[0];
		$str1 = $str;
		return preg_replace("/(?<!<a href=\")((http|https|ftp|mailto|ed2k)+(s)?:\/\/[^<>\s]+)/i", "<a href=\"\\0\" target='_blank'><u>$str1</u></a>", $str);
	}

	# 메일 형식 확인
	public static function chkMail( $email ) {
		//if (ereg("([^[:space:]]+)", $email) && (!ereg("(^[_0-9a-zA-Z-]+(\.[_0-9a-zA-Z-]+)*@[0-9a-zA-Z-]+(\.[0-9a-zA-Z-]+)*$)",
		//if(preg_match("([^[:space:]]+)", $email) && (!preg_match("(^[_0-9a-zA-Z-]+(\.[_0-9a-zA-Z-]+)*@[0-9a-zA-Z-]+(\.[0-9a-zA-Z-]+)*$)", $email)))
		if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
		{
			return false;
		}
		else
		{
			for ($k=0; $k<strlen($email); $k++)
			{
				if (ord($email[$k])>127) //한글 검사
				{
					return false;
				}
			}
			return true;
		}
	}

	#백분율 구하기
	public static function GetPercent($total,$num){
		if($total == 0){
			$getPercent = 0;
		}
		else{
			$getPercent = round(($num / $total) * 100, 2);
		}
		return $getPercent;
	}

	# 배열을 받아서 몇번째 배열인지 돌려준다. class스타일을 설정하기 위해 Key값과 비교
	public static function ReturnKey($Arr,$Value)
	{
		if(empty($Value) )
		{
			$i = "";
		}
		else
		{
			$i = 0;
			$is_true = false;
			reset($Arr);
			while(list($Key,$Val) = each($Arr) )
			{
				if($Key == $Value){ break; $is_true = true; }
				else $i++;
			}
		}
		return $i;
	}
	# 배열을 받아서 몇번째 배열인지 돌려준다. class스타일을 설정하기 위해 Key값과 비교
	public static function ReturnValue($Arr,$Value)
	{
		if(empty($Value) )
		{
			$i = "";
		}
		else
		{
			$i = 0;
			$is_true = false;
			reset($Arr);
			while(list($Key,$Val) = each($Arr) )
			{
				if($Val == $Value){ break; $is_true = true; }
				else $i++;
			}
		}
		if($is_true) return $i;
		else return "";
	}

	# 배열을 받아서 몇번째 배열인지 돌려준다. class스타일을 설정하기 위해 Key값과 비교
	public static function ReturnArrValue($Arr,$Num)
	{
		$Value = "";
		reset($Arr);
		while(list($Key,$Val) = each($Arr) )
		{
			if($Key == $Num){
				$Value = $Val;
				break;
			}

		}
		return $Value;
	}

	# 주문번호 생성
	public static function getOrderNo(){
		return time().substr(microtime(),2,3);
	}

	# 학술대회 접수번호 생성
	public static function getRegistNo(){
		return time().substr(microtime(),2,3);
	}

	# 초록 접수번호 생성
	public static function getAbstractNo(){
		return time().substr(microtime(),2,3);
	}

	/***********************************************************************************
	* 암호화 하기
	*/
	public static function bytexor($a,$b)
	{
			$c="";
			for($i=0;$i<16;$i++)$c.=$a{$i}^$b{$i};
			return $c;
	}
	public static function decrypt_md5($msg,$key = "BLIA")
	{
		$string="";
		$buffer="";
		$key2="";

		//$msg = base64_decode($msg);
		$msg = base64_decode(rawurldecode($msg) );
		while($msg)
		{
			$key2=pack("H*",md5($key.$key2.$buffer));
			$buffer=LIB_LIB::bytexor(substr($msg,0,16),$key2);
			$string.=$buffer;
			$msg=substr($msg,16);
		}
		return($string);
	}
	public static function encrypt_md5($msg,$key = "BLIA")
	{
		$string="";
		$buffer="";
		$key2="";

		while($msg)
		{
			$key2=pack("H*",md5($key.$key2.$buffer));
			$buffer=substr($msg,0,16);
			$string.=LIB_LIB::bytexor($buffer,$key2);
			$msg=substr($msg,16);
		}
		//return(base64_encode($string) );
		return(rawurlencode(base64_encode($string) ) );
	}

	# serialize gz
	public static function SerializeGz($var)
	{
		return @base64_encode(@gzcompress(@serialize($var)));
	}

	# unserialize_gz
	public static function UnserializeGz($var)
	{
		return @unserialize(@gzuncompress(@base64_decode($var)));
	}
	/***********************************************************************************/



	// 구분자를 통해 데이터를 배열화
	public static function getArrayReturn($a) {
		$tmp = null;
		$cnt = $a;

		foreach($a as $v) {
			$tmp .= $v.'§';
		}
		return $tmp;
	}


	//특정 tag 만 처리 S
	//본문을 넣고 활성화할 태그를 배열로 넣는다. (디비에 < :  &#60; ,  > : &#62; 로 변경되어 들어갔을때만 사용 가능)
	public static function get_special_tag_arrays($str, $strip_tags) {
		foreach ($strip_tags as $key => $val){
			//preg_match_all( '{&#60;'.$val.'[^&#62;]*&#62;(.*?)'.'}', $str, $matches, PREG_PATTERN_ORDER);
			preg_match_all( '{&#60;'.$val.'[^>]*&#62;(.*?)'.'}', $str, $matches, PREG_PATTERN_ORDER);
			$str_arr = str_replace('&#60;','<',$matches[0]);
			$str_arr = str_replace('&#62;','>',$str_arr);

			foreach ($str_arr as $key => $val_str){
				$str =  str_replace($matches[0][0],$val_str, $str);
			}

			$str = str_replace('&#60;/'.$val.'&#62;','</'.$val.'>',$str);
		}
		return $str;
	}
	//echo get_special_tag_arrays($str, array('a','b')); // a 태그와 b 태그만 활성화
	//exit;
	//특정 tag 만 처리 E


	// 유효한 날짜인지 검사
	public static function chkDate($str) {
		if ( preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $str, $match) && checkdate($match[2],$match[3],$match[1]) ) {
			//echo 'O';
			return true;
		}
		else {
			//echo 'X';
			return false;
		}

		/*
		if( preg_match("/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})/", $string) ){
			echo"날짜 형식이 맞습니다";
		}else{
			echo"날짜 형식이 다릅니다.";
		}
		*/
	}

	// 유효한 URL 인지 검사
	public static function chkURL($url) {
		//echo $url;
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
		//if (!preg_match("/\b[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
			 //echo "chk1";
			 return false;
		}
		else {
			//echo "chk2";
			return true;
		}
	}

	// 도메인 또는 문서가 존재하는지 검사
	public static function existsUrl($url) {
		//$url = "http://www.domain.com/demo.jpg";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		$result = curl_exec($curl);

		if ($result !== false) {
			$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ($statusCode == 404) {
				//echo "URL Not Exists";
				return false;
			}
			else {
				//echo "URL Exists";
				return true;
			}
		}
		else {
			//echo "URL not Exists";
			return false;
		}
	}


}  //End Class