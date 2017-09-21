<?php
if (!defined('OKTOMATO')) exit;

$result = 0;
$msg = '';

if ($_SESSION['user_idx'])
{
	$covery_idx = isset($_POST['cidx']) ? Xss::chkXSS($_POST['cidx']) : null;
	$point_idx = isset($_POST['pidx']) ? Xss::chkXSS($_POST['pidx']) : null;
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
	$user_level = AES256::dec($_SESSION['user_level_code'], AES_KEY);
	if (is_numeric($covery_idx) && is_numeric($point_idx))
	{
		$Point = new Point();
		$Point->setAttr('covery_idx', $covery_idx);
		$Point->setAttr('point_idx', $point_idx);
		$Point->setAttr('user_idx', $user_idx);
		$Point->setAttr('user_level', $user_level);
		try
		{
			$isPointAble = $Point->getIsPointAble($user_level);
			if ($isPointAble)
			{
				$result = 1;
				$point_cnt = $Point->getMyPointCount($dbh);
				$contact = $Point->getIsContact($dbh);
				if ($contact)
				{
					$msg = '이미 이벤트에 응모하여 더 이상 수정할 수 없습니다.';
					$result = 0;
				}
			}
			else
			{
				$msg = 'POINT 기간이 종료되었습니다.';
				$result = 0;
			}
		}
		catch(Exception $e)
		{
			//echo $e->getMessage();
		}
	}
}
else
{
	$msg = '잘못된 접근입니다.';
}

setFree();
echo '{"result":"'.$result.'", "covery_idx":"'.$covery_idx.'", "point_cnt":"'.$point_cnt.'", "contact":"'.$contact.'","msg":"'.$msg.'"}';

function setFree() {
	$dbh = null;
	$Point = null;
	unset($dbh);
	unset($Point);
}
