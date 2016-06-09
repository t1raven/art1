<?php
if (!defined('OKTOMATO')) exit;

if ($aryURL['host'] !== $_SERVER['HTTP_HOST']) {
	exit;
}
else {
	if ($_SERVER['REQUEST_METHOD'] === 'POST' || is_array($_POST)) {
		$result = 'fail';
		$msg = '잘못된 접근입니다.';
		$url = null;

		$join = new Join();

		foreach($_POST as $key => $value) {
			if (!is_array($value)) {
				$join->setAttr($key, LIB_LIB::CkWord($value));
				//echo $key.'=>'.$value;
			}
			else {
				$$key = $value;
			}
		}

		try {
			if (!empty($join->attr['galleryId'])) {
				if ($join->chkAccount($dbh)) {
					$msg = '사용 가능한 계정 입니다.';
					$return = 'true';
				}
				else{
					$return = 'false';
					$msg = '사용 불가능한 계정입니다.\r\n다른 계정을 입력하여 주세요.' ;
				}
			}
			else {
				$return = 'false';
				$msg = '계정을 입력하여 주세요.' ;
			}
		}
		catch(Exception $e) {
			$return = 'false';
			//echo  'Error:'.$e->getMessage();
			$msg = '오류가 발생했습니다.';
		}
		$join = null;
		$tmp = null;
		unset($join);
		unset($tmp);
	}
}
?>
{"complete": "<?php echo $return; ?>", "msg":"<?php echo $msg; ?>"}