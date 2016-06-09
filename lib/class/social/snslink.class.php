<?php
class Snslink
{
	var $attr;

	function __construct() {
		$this->attr = array();
	}

	function setAttr($key, $value){
		$this->attr[$key] = $value;
		//echo "<br>set:$key:".gettype($value);
		//echo "<br>set:$key:".$value;
	}

	function getAddslashes($key){
		//return addslashes($this->attr[$key]);
		//return ($this->attr[$key] == null) ? null : addslashes($this->attr[$key]);

		//if (is_null($this->attr[$key]) || $this->attr[$key] == '') {
		if (is_null($this->attr[$key])) {
			//echo "<br>$key:rtn null";
			return null;
		}
		else {
			if (gettype($this->attr[$key]) == 'string') {
				//echo "<br>$key:rtn string";
				return addslashes($this->attr[$key]);
			}
			else {
				//echo "<br>$key:rtn letter";
				return $this->attr[$key];
			}
		}
	}

	function setHtmlspecialchars($key) {
		while(list($key,$val) = each($this->attr) )
			$this->attr[$key] = htmlspecialchars($val);
	}

	function update($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();

			$arr_filed_idx = $this->getAddslashes('arr_filed_idx');
			$arr_url = $this->getAddslashes('arr_url');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$modify_date = date('Y-m-d H:i:s', time());

			$i=0;
			foreach ($arr_filed_idx as $value) {  //필드만큼 돌면서 업로드
				//echo $value .'<br>';
				$sns_link_idx = $arr_filed_idx[$i];
				$sns_url = $arr_url[$i];

				$sql = 'UPDATE  sns_link SET
								sns_url = :sns_url, 
								ip_addr = :ip_addr,
								modify_date= :modify_date
							WHERE sns_link_idx = :sns_link_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':sns_url',$sns_url,					PDO::PARAM_STR, 30);
				$stmt->bindParam(':ip_addr',$ip_addr,					PDO::PARAM_INT);
				$stmt->bindParam(':modify_date',$modify_date,		PDO::PARAM_STR, 30);
				$stmt->bindParam(':sns_link_idx',$sns_link_idx,		PDO::PARAM_INT);

				if ($stmt->execute()) {
					$bTransaction = true;
				}
				else {
					throw new Exception('error');
				}

				$i=$i+1;
			}

			if ($stmt->execute()) {
				$bTransaction = true;
			}
			else {
				throw new Exception('error');
				exit;
			}

			//exit;
			if ($bTransaction) {
				$dbh->commit();
			}else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}


	function getList($dbh) {
		try {
			//echo(" CALL up_snslink_list () <br>");
			$sql = 'CALL up_snslink_list ()';
			$stmt = $dbh->prepare($sql);

			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$dbh = null;

			return array($list);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}
}

?>