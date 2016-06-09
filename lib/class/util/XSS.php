<?php
class Xss
{
	static public function RemoveXSS($val)
	{
		// remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
		// this prevents some character re-spacing such as <java\0script>
		// note that you have to handle splits with \n, \r, and \t later since they *are*
		// allowed in some inputs
		$val = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val);

		// straight replacements, the user should never need these since they're normal characters
		// this prevents like <IMG SRC=&#X40&#X61&#X76&#X61&#X73&#X63&#X72&#X69&#X70&#X74&
		// #X3A&#X61&#X6C&#X65&#X72&#X74&#X28&#X27&#X58&#X53&#X53&#X27&#X29>
		$search = 'abcdefghijklmnopqrstuvwxyz';
		$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$search .= '1234567890!@#$%^&*()';
		$search .= '~`";:?+/={}[]-_|\'\\';
		for ($i = 0; $i < strlen($search); $i++) {
		// ;? matches the ;, which is optional
		// 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

		// &#x0040 @ search for the hex values
		  $val = preg_replace('/(&#[x|X]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val);
		  // with a ;

		  // @ @ 0{0,7} matches '0' zero to seven times
		  $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
		}

		// now the only remaining whitespace attacks are \t, \n, and \r
		$ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style',
		'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
		$ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
		$ra = array_merge($ra1, $ra2);

		$found = true; // keep replacing as long as the previous round replaced something
		while ($found == true) {
			$val_before = $val;
			for ($i = 0; $i < sizeof($ra); $i++) {
				$pattern = '/';
				for ($j = 0; $j < strlen($ra[$i]); $j++) {
					if ($j > 0) {
						$pattern .= '(';
						$pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?';
						$pattern .= '|(&#0{0,8}([9][10][13]);?)?';
						$pattern .= ')?';
					}
					$pattern .= $ra[$i][$j];
			 }

			 $pattern .= '/i';
			 $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
			 $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags

			 if ($val_before == $val) {
				// no replacements were made, so exit the loop
				$found = false;
			 }
		  }
		}

		return $val;
	}

	// Cross Site Script 막기
	static public function chkXSS($val, $bHtml = true){
		$val = preg_replace("#\/\*.*\*\/#", "", $val);
		//$val = preg_replace_callback("#<(object|embed)([^>]+)>#i", "bad120422", $val);
		$val = preg_replace("/(on)([a-z]+)([^a-z]*)(\=)/i", "&#111;&#110;$2$3$4", $val);
		$val = preg_replace("/(dy)(nsrc)/i", "&#100;&#121;$2", $val);
		$val = preg_replace("/(lo)(wsrc)/i", "&#108;&#111;$2", $val);
		//$val = preg_replace("/(sc)(ript)/i", "&#115;&#99;$2", $val);
		//$val = preg_replace("/(ex)(pression)/i", "&#101&#120;$2", $val);

		$val = preg_replace_callback("#<([^>]+)#", create_function('$m', 'return "<".str_replace("<", "&lt;", $m[1]);'), $val);
		$val = preg_replace("/\<(\w|\s|\?)*(xml)/i", "_$1$2_", $val);
		$val = preg_replace("#<param[^>]+AllowScriptAccess[^>]+>(<\/param>)?#i", "", $val);
		// embed 태그의 allowscript 속성을 삭제한다.
		$val = preg_replace("#(<embed[^>]+)(allowscriptaccess[^\s\>]+)#i", "$1", $val);
		// object 태그에 allowscript 의 값을 never 로 하여 태그를 추가한다.
		$val = preg_replace("#(<object[^>]+>)#i", "$1<param name=\"allowscriptaccess\" value=\"never\">", $val);
		// embed 태그에 allowscrpt 값을 never 로 하여 속성을 추가한다.
		$val = preg_replace("#(<embed[^>]+)#i", "$1 allowscriptaccess=\"never\"", $val);


		$pattern = "";
		$pattern .= "(e|&#(x65|101);?)";
		$pattern .= "(x|&#(x78|120);?)";
		$pattern .= "(p|&#(x70|112);?)";
		$pattern .= "(r|&#(x72|114);?)";
		$pattern .= "(e|&#(x65|101);?)";
		$pattern .= "(s|&#(x73|115);?)";
		$pattern .= "(s|&#(x73|115);?)";
		//$pattern .= "(i|&#(x6a|105);?)";
		$pattern .= "(i|&#(x69|105);?)";
		$pattern .= "(o|&#(x6f|111);?)";
		$pattern .= "(n|&#(x6e|110);?)";
		//$val = preg_replace("/".$pattern."/i", "__EXPRESSION__", $val);
		$val = preg_replace("/<[^>]*".$pattern."/i", "__EXPRESSION__", $val);
		// <IMG STYLE="xss:e\xpression(alert('XSS'))"></IMG> 와 같은 코드에 취약점이 있어 수정함. 121213
		$val = preg_replace("/(?<=style)(\s*=\s*[\"\']?xss\:)/i", '="__XSS__', $val);


		if(!$bHtml) {
			$val = str_replace("<", "&lt;", $val);
			$val = str_replace(">", "&gt;", $val);
		}
	   return $val;
	}

	// OBJECT 태그의 XSS 막기
	function bad120422($matches)
	{
		$tag  = $matches[1];
		$code = $matches[2];
		if (preg_match("#\bscript\b#i", $code)) {
			return "$tag 태그에 스크립트는 사용 불가합니다.";
		} else if (preg_match("#\bbase64\b#i", $code)) {
			return "$tag 태그에 BASE64는 사용 불가합니다.";
		}
		return $matches[0];
	}

}
?>