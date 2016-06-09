<?php
class JS
{
	/**
	* 단순히 띄우는 경고메시지
	*/
	public static function Alert($alert,$close = 0)
	{
		$alert=addslashes($alert);
		echo "<script language='javascript'>\n";
		echo "alert('".stripslashes($alert)."');\n";
		if($close)
		{
			echo "self.close();\n";
		}
		echo "</script>";
	}

	/**
	* 이전페이지로 가는 함수.
	* 메시지를 인자로 전달할 경우, 메시지를 출력하고 이전 페이지로 간다.
	*/
	public static function HistoryBack( $alert = '', $exit = 1, $target = '')
	{
		echo "<script language=javascript>\n";
		if( $alert )
		{
			$alert=addslashes($alert);
			echo "alert('".stripslashes($alert)."');\n";
		}
		if( $target ) echo $target . ".";
		echo "history.back();\n";
		echo "</script>";
		if( $exit ) exit;
	}

	/**
	* 현재 페이지를 $url 로 대체
	* 현재 페이지는 history 상에 남지 않음
	*/
	public static function LocationReplace($alert = '', $href, $target = '')
	{
		echo "<script language=javascript>\n";
		if( $alert )
		{
			$alert=addslashes($alert);
			echo "alert('".stripslashes($alert)."');\n";
		}
		if( $target ) echo $target . ".";
		echo "location.replace('" . $href . "');\n";
		echo "</script>";
		exit;
	}

	/**
	* 현재 페이지를 $href로 이동
	*/
	public static function LocationHref($alert, $href, $target = '')
	{
		echo "<script language=javascript>\n";
		if( $alert )
		{
			$alert = addslashes($alert);
			echo "alert('".stripslashes($alert)."');\n";
		}
		if( $target ) echo $target . ".";
		//echo "location.href('" . $href . "');\n";
		echo "location='{$href}';\n";
		echo "</script>";
		exit;
	}


	/**
	* 페이지를 reload
	*/
	public static function LocationReload($alert, $href, $target = '')
	{
		echo "<script language=javascript>\n";
		if( $alert )
		{
			$alert = addslashes($alert);
			echo "alert('".stripslashes($alert)."');\n";
		}
		if( $target ) echo $target . ".";
		//echo "location.href('" . $href . "');\n";
		echo "location.reload();\n";
		echo "</script>";
		exit;
	}


	/**
	* 내용쓰기
	*/
	public static function DocumentWrite($str)
	{
		if (ereg("\n", $str))
		{
			$list = explode("\n", $str);
			foreach($list as $k => $v)
			{
				if (!empty($v))
				{
					$v = str_replace(array('"', "\n"), array('"', ''), trim($v));
					$html[] = "document.write(\"$v\");";
					$html[] = "document.write(\"<br>\");";
				}
			}
			echo join("\n", $html);
		}else{
			echo 'document.write("' . str_replace('"', '\"', $str) . '");' . "\n";
		}
	}

	/**
	* 쿠키굽기
	*/
	public static function setCookie2($Name,$Value,$Day = 0)
	{
		echo "<script language='javascript'>\n";
		if($Day > 0)
		{
			echo "
				var todayDate = new Date();
				var days = 0;
				todayDate.setDate( todayDate.getDate() + $Day );
				days = todayDate.toGMTString();
				";
			echo "document.cookie = '$Name' + \"=\" + escape( '$Value' ) + \"; path=/; expires=\" + days + \";\";";
		}
		else
		{
			echo "document.cookie = '$Name' + \"=\" + escape( '$Value' ) + \"; path=/;\";";
		}
		echo "</script>";
	}

	public static function ConsoleLog($str)
	{
		echo "<script language=javascript>\n";
		if( $str )
		{
			$str = addslashes($str);
			echo "console.log('".stripslashes($str)."');\n";
		}
		echo "</script>";
	}
}
?>