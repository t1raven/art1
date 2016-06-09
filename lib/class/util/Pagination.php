<?php
class Pagination
{
	var $attr;

	function __construct(){
		$this->attr = array();
	}

	function setPaging($totalPage, $blockSize, $page, $params) {
		$this->attr['totalPage'] = $totalPage;
		$this->attr['blockSize'] = $blockSize;
		$this->attr['page'] = $page;

		If ($this->attr['page'] % $this->attr['blockSize'] == 0) {
			$this->attr['minPage'] = (int)($this->attr['page'] / $this->attr['blockSize'] - 1) * $this->attr['blockSize'] + 1;
		}
		else {
			$this->attr['minPage'] = (int)($this->attr['page'] / $this->attr['blockSize']) * $this->attr['blockSize'] + 1;
		}

		If (($this->attr['minPage'] + $this->attr['blockSize'] - 1) > $this->attr['totalPage']) {
			$this->attr['maxPage'] = $this->attr['totalPage'];
		}
		else {
			$this->attr['maxPage'] = $this->attr['minPage'] + $this->attr['blockSize'] - 1;
		}

		$this->attr[pageHtml] = "<div class='paginate'>\n";


		If ($this->attr['page'] == 1) {
			$this->attr['pageHtml'] .= "<a href='#' class='btn'><img src='/btn/btn_prev2.gif\' alt='처음'></a>\n";
		}
		else {
			$this->attr['pageHtml'] .= "<a href='".PHP_SELF."?page=1&$params class='btn'><img src='/btn/btn_prev2.gif' alt='처음'></a>\n";
		}

		If ($this->attr['minPage'] > $this->attr['blockSize']) {
			$this->attr['pageHtml'] .= "<a href='".PHP_SELF."?page=".($this->attr['minPage'] - 1).$params."' class='btn prev'><img src='/btn/btn_prev.gif' alt='이전'></a>\n";
		}
		else {
			$this->attr['pageHtml'] .= "<a href='#' class='btn prev'><img src='/btn/btn_prev.gif alt'='이전'></a>\n";
		}

		for($i = $this->attr['minPage']; $i < $this->attr['maxPage']; $i++) {
			If ($i == $this->attr['page']) {
				$this->attr['pageHtml'] .= "<a href='#' class='num on'>$i</a>\n";
			}
			else {
				$this->attr['pageHtml'] .= "<a href='".PHP_SELF."?page=".$i.$params."' class='num'>$i</a>\n";
			}
		}

		If ($this->attr['maxPage'] < $this->attr['totalPage']) {
			$this->attr['pageHtml'] .= "<a href='".PHP_SELF."?page=".($this->attr['maxPage'] + 1).$params."' class='btn next'><img src='/btn/btn_next.gif' alt='다음'></a>\n";
		}
		else {
			$this->attr['pageHtml'] .= "<a href='#' class='btn next'><img src='/btn/btn_next.gif' alt='다음'></a>\n";
		}

		If ($this->attr['page'] == $this->attr['totalPage']) {
			$this->attr['pageHtml'] .= "<a href='#' class='btn'><img src='/btn/btn_next2.gif' alt='마지막'></a>\n";
		}
		else {
			$this->attr['pageHtml'] .= "<a href='".PHP_SELF."?page=".$this->attr['totalPage'].$params."' class='btn'><img src='/btn/btn_next2.gif' alt='마지막'></a>\n";
		}

		$this->attr[pageHtml] .= "</div>\n";
	}

}

?>