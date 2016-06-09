<?php
class BasketCount
{

	function __construct() {

	}

	function __destruct() {
		if (gc_enabled()) gc_collect_cycles();
	}

	// 장바구니 상품 갯수 구하기
	public static function getBasketCount($dbh) {
		try {
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = 'SELECT SUM(qty) FROM basket WHERE user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return (int)$stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}
}
?>