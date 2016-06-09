<?php
class Provision
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

			$provision_idx = $this->getAddslashes('provision_idx');
			$provision_content = htmlspecialchars($this->getAddslashes('provision_content'));
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$create_date = date('Y-m-d H:i:s', time());

			$i=0;

				//echo $value .'<br>';
				$sns_link_idx = $arr_filed_idx[$i];
				$sns_url = $arr_url[$i];

				$sql = 'UPDATE  provision SET
								provision_content = :provision_content, 
								ip_addr = :ip_addr,
								create_date= :create_date
							WHERE provision_idx = :provision_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':provision_content',$provision_content,		PDO::PARAM_STR, 30);
				$stmt->bindParam(':ip_addr',$ip_addr,									PDO::PARAM_INT);
				$stmt->bindParam(':create_date',$create_date,						PDO::PARAM_STR, 30);
				$stmt->bindParam(':provision_idx',$provision_idx,					PDO::PARAM_INT);

				if ($stmt->execute()) {
					$bTransaction = true;
				}
				else {
					throw new Exception('error');
				}

				$i=$i+1;


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

	function getRead($dbh) {
		try {
			$provision_idx = $this->getAddslashes('provision_idx');
			$sql = 'SELECT
							provision_idx, provision_type, provision_content , create_date
						FROM provision 
						WHERE provision_idx = :provision_idx';
			//echo($sql .'<br>');
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':provision_idx', $provision_idx, PDO::PARAM_INT);

			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				foreach($row as $key => $val) {
					$this->setAttr($key, $val);
				}
				return true;
			}
			else {
				return false;
			}

			$dbh = null;
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}
}

?>