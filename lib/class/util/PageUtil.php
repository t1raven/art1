<?php
class PageUtil
{
	var $attr;

	function __construct(){
		$this->attr = array();
	}
	# PAGE LIMITER
	function pageLimiter($numPerPage, $numPerBlock, $totalArticle, $page,$PAGE_PARAM)
	{
		$this->attr[numPerPage] = $numPerPage;
		$this->attr[numPerBlock] = $numPerBlock;
		$this->attr[totalArticle] = $totalArticle;
		$this->attr[page] = (empty($page) ) ? 1 : (int)$page;

		if(!$this->attr[totalArticle])
		{
			$this->attr[first] = 1;
			$this->attr[last] = 0;
		}else{
			$this->attr[first] = $this->attr[numPerPage]*($this->attr[page]-1);
			$this->attr[last] = $this->attr[numPerPage]*$page;
			$this->attr[isNext] = $this->attr[totalArticle] - $this->attr[last];
			if($this->attr[isNext] > 0) $this->attr[last] -= 1;
			else $this->attr[last] = $this->attr[totalArticle] - 1;
		}
		$this->attr[totalPage] = ceil($this->attr[totalArticle]/$this->attr[numPerPage]);
		$this->attr[totalBlock] = ceil($this->attr[totalPage]/$this->attr[numPerBlock]);
		$this->attr[block] = ceil($this->attr[page]/$this->attr[numPerBlock]);
		$this->attr[firstPage] = ($this->attr[block]-1)*$this->attr[numPerBlock];
		$this->attr[lastPage] = $this->attr[block]*$this->attr[numPerBlock];
		if($this->attr[totalBlock] <= $this->attr[block]) $this->attr[lastPage] = $this->attr[totalPage];
		$this->attr[pageHtml] = "<div class='paginate'>\n";
		if($this->attr[block] > 1){
			//$this->attr[pageHtml] .= "<a href='".PHP_SELF."?page=1&$PAGE_PARAM' class='btn'><img src='/images/paginate/btn_prev2.gif' alt='처음' /></a>\n";
			//$this->attr[pageHtml] .= "<a href='".PHP_SELF."?page=$FirstPage&$PAGE_PARAM' class='btn prev'><img src='/images/paginate/btn_prev.gif' alt='이전' /></a>\n";
			$this->attr[pageHtml] .= "<a href='".PHP_SELF."?page=1&$PAGE_PARAM' class='btn prev'>처음</a>\n";
			//$this->attr[pageHtml] .= "<a href='".PHP_SELF."?page=$FirstPage&$PAGE_PARAM' class='btn prev2'>이전10페이지</a>\n";
			$this->attr[pageHtml] .= "<a href='".PHP_SELF."?page=".$this->attr[firstPage]."&$PAGE_PARAM' class='btn prev2'>이전10페이지</a>\n";
		}
		for($x = $this->attr[firstPage]+1; $x <= $this->attr[lastPage]; $x++)
		{
			if($this->attr[page] == $x)
				$this->attr[pageHtml] .= "<a href='".PHP_SELF."?page=$x&$PAGE_PARAM' class='num on'>". $x ."</a>\n";
			else
				$this->attr[pageHtml] .= "<a href='".PHP_SELF."?page=$x&$PAGE_PARAM' class='num'>". $x ."</a>\n";
		}

		if($this->attr[block] < $this->attr[totalBlock]){
			//$this->attr[pageHtml] .= "<a href='".PHP_SELF."?page=". ($this->attr[lastPage]+1) ."&$PAGE_PARAM' class='btn next'><img src='/images/paginate/btn_next.gif' alt='다음' /></a>\n";
			//$this->attr[pageHtml] .= "<a href='".PHP_SELF."?page=". ($this->attr[totalPage]) ."&$PAGE_PARAM' class='btn'><img src='/images/paginate/btn_next2.gif' alt='마지막' /></a>\n";
			$this->attr[pageHtml] .= "<a href='".PHP_SELF."?page=". ($this->attr[lastPage]+1) ."&$PAGE_PARAM' class='btn next2'>다음10페이지</a>\n";
			$this->attr[pageHtml] .= "<a href='".PHP_SELF."?page=". ($this->attr[totalPage]) ."&$PAGE_PARAM' class='btn next'>끝</a>\n";
		}
		$this->attr[pageHtml] .= "</div>\n";
	}

	function scriptPageLimiter($numPerPage, $numPerBlock, $totalArticle, $page)
	{
		$this->attr[numPerPage] = $numPerPage;
		$this->attr[numPerBlock] = $numPerBlock;
		$this->attr[totalArticle] = $totalArticle;
		$this->attr[page] = (empty($page) ) ? 1 : (int)$page;

		if(!$this->attr[totalArticle])
		{
			$this->attr[first] = 1;
			$this->attr[last] = 0;
		}else{
			$this->attr[first] = $this->attr[numPerPage]*($this->attr[page]-1);
			$this->attr[last] = $this->attr[numPerPage]*$page;
			$this->attr[isNext] = $this->attr[totalArticle] - $this->attr[last];
			if($this->attr[isNext] > 0) $this->attr[last] -= 1;
			else $this->attr[last] = $this->attr[totalArticle] - 1;
		}
		$this->attr[totalPage] = ceil($this->attr[totalArticle]/$this->attr[numPerPage]);
		$this->attr[totalBlock] = ceil($this->attr[totalPage]/$this->attr[numPerBlock]);
		$this->attr[block] = ceil($this->attr[page]/$this->attr[numPerBlock]);
		$this->attr[firstPage] = ($this->attr[block]-1)*$this->attr[numPerBlock];
		$this->attr[lastPage] = $this->attr[block]*$this->attr[numPerBlock];
		if($this->attr[totalBlock] <= $this->attr[block]) $this->attr[lastPage] = $this->attr[totalPage];
		$this->attr[pageHtml] = "<div class='paginate'>\n";
		if($this->attr[block] > 1){
			$this->attr[pageHtml] .= "<a href='#page:1' class='btn' onclick='pageRun(1);return false;'><img src='/images/paginate/btn_prev2.gif' alt='처음' /></a>\n";
			$this->attr[pageHtml] .= "<a href='#page:".$this->attr[firstPage]."' class='btn prev' onclick='pageRun(".$this->attr[firstPage].");return false;'><img src='/images/paginate/btn_prev.gif' alt='이전' /></a>\n";
		}
		for($x = $this->attr[firstPage]+1; $x <= $this->attr[lastPage]; $x++)
		{
			if($this->attr[page] == $x)
				$this->attr[pageHtml] .= "<a href='#page:$x' class='num on' onclick='pageRun($x);return false;'>". $x ."</a>\n";
			else
				$this->attr[pageHtml] .= "<a href='#page:$x' class='num' onclick='pageRun($x);return false;'>". $x ."</a>\n";
		}

		if($this->attr[block] < $this->attr[totalBlock]){
			$this->attr[pageHtml] .= "<a href='#page:". ($this->attr[lastPage]+1) ."' class='btn next' onclick='pageRun(". ($this->attr[lastPage]+1) .");return false;'><img src='/images/paginate/btn_next.gif' alt='다음' /></a>\n";
			$this->attr[pageHtml] .= "<a href='#page:". $this->attr[totalPage] ."' class='btn' onclick='pageRun(". $this->attr[totalPage] .");return false;'><img src='/images/paginate/btn_next2.gif' alt='마지막' /></a>\n";
		}
		$this->attr[pageHtml] .= "</div>\n";
	}

	/**
	 * registered date 2014-01-23
	 * programmed by Seok Kyun. Choi. 최석균 // 이용태 퍼옴
	 * http://syaku.tistory.com
	 */
	 /**
	 * Request QueryString 을 이용하여 임의의 문자열을 변형함
	 *
	 * @param string 조합할 QueryString
	 * @param string 시작 문자열 지정 (? or &)
	 * @param string 메소드 지정
	 * @return string

	 * ex :	http://syaku.tistory.com/index.php?prodid=S10000846247&siteid=SW&pcate=&order=1 라면
	 *		_param_get(''); //현재 파라미터 값 가져오기
	 *		_param_get('&prodid=syaku'); //prodid 변경하기
	 *		_param_get('&prodid=&pcate=50');  //prodid 값을 제거하고 pcate 값 변경 
	 */
	public static  function _param_get($query,$char = NULL,$method = 'GET') {
	   $parameter = ($method == 'GET') ? $_GET: $_POST;
	   $ret = array();
	   $output = array();
	 
	   if ( !empty($query) ) {
		 parse_str($query,$output);
		 foreach(array_keys($output) as $key){
		   if ( !empty($output[$key]) ) {
			 $ret[$key] = $output[$key];
		   } else {
			 unset($parameter[$key]);
		   }
		 }
	 
	   }
	 
	   $param = http_build_query(array_merge($parameter, $ret));
	   if ( $char != NULL && !empty($param) ) { $param = $char . $param; }
	   return $param;
	 }
}
?>