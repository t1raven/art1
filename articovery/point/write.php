<?php
if (!defined('OKTOMATO')) exit;

if ($_SESSION['user_idx'])
{
	$covery_idx = isset($_POST['cidx']) ? (int)$_POST['cidx'] : 1;
	$point_idx = isset($_POST['pidx']) ? (int)$_POST['pidx'] : 1;
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
	$user_level = AES256::dec($_SESSION['user_level_code'], AES_KEY);

	$Point = new Point();
	$Point->setAttr('covery_idx', $covery_idx);
	$Point->setAttr('point_idx', $point_idx);
	$Point->setAttr('user_idx', $user_idx);
	$isPointAble = $Point->getIsPointAble($user_level);
	$isContact = $Point->getIsContact($dbh);

	if ($isPointAble)
	{
		if ($isContact == '0')
		{
			$Point->getPointEdit($dbh);
			if (empty($Point->attr['technique_score']))
			{
				$Point->attr['score_idx'] = '';
				$Point->attr['technique_score'] = 1;
				$Point->attr['artistic_score'] = 1;
				$Point->attr['creativity_score'] = 1;
				$Point->attr['potential_score'] = 1;
				$Point->attr['final_score'] = 1;
				$Point->attr['opinion'] = '';
			}

			switch ($point_idx)
			{
				case 1 :
					$thumbImg[1] = 'thum_review_1_1_1.jpg';
					$thumbImg[2] = 'thum_review_1_1_2.jpg';
					$thumbImg[3] = 'thum_review_1_1_3.jpg';
					$thumbImg[4] = 'thum_review_1_1_4.jpg';
					$thumbImg[5] = 'thum_review_1_1_5.jpg';
					break;
				case 2 :
					$thumbImg[1] = 'thum_review_1_2_1.jpg';
					$thumbImg[2] = 'thum_review_1_2_2.jpg';
					$thumbImg[3] = 'thum_review_1_2_3.jpg';
					$thumbImg[4] = 'thum_review_1_2_4.jpg';
					$thumbImg[5] = 'thum_review_1_2_5.jpg';
					break;
				case 3 :
					$thumbImg[1] = 'thum_review_1_3_1.jpg';
					$thumbImg[2] = 'thum_review_1_3_2.jpg';
					$thumbImg[3] = 'thum_review_1_3_3.jpg';
					$thumbImg[4] = 'thum_review_1_3_4.jpg';
					$thumbImg[5] = 'thum_review_1_3_5.jpg';
					break;
				case 4 :
					$thumbImg[1] = 'thum_review_1_4_1.jpg';
					$thumbImg[2] = 'thum_review_1_4_2.jpg';
					$thumbImg[3] = 'thum_review_1_4_3.jpg';
					$thumbImg[4] = 'thum_review_1_4_4.jpg';
					$thumbImg[5] = 'thum_review_1_4_5.jpg';
					break;
				case 5 :
					$thumbImg[1] = 'thum_review_1_5_1.jpg';
					$thumbImg[2] = 'thum_review_1_5_2.jpg';
					$thumbImg[3] = 'thum_review_1_5_3.jpg';
					$thumbImg[4] = 'thum_review_1_5_4.jpg';
					$thumbImg[5] = 'thum_review_1_5_5.jpg';
					break;
				case 6 :
					$thumbImg[1] = 'thum_review_1_6_1.jpg';
					$thumbImg[2] = 'thum_review_1_6_2.jpg';
					$thumbImg[3] = 'thum_review_1_6_3.jpg';
					$thumbImg[4] = 'thum_review_1_6_4.jpg';
					$thumbImg[5] = 'thum_review_1_6_5.jpg';
					break;
				case 7 :
					$thumbImg[1] = 'thum_review_1_7_1.jpg';
					$thumbImg[2] = 'thum_review_1_7_2.jpg';
					$thumbImg[3] = 'thum_review_1_7_3.jpg';
					$thumbImg[4] = 'thum_review_1_7_4.jpg';
					$thumbImg[5] = 'thum_review_1_7_5.jpg';
					break;
				case 8 :
					$thumbImg[1] = 'thum_review_1_8_1.jpg';
					$thumbImg[2] = 'thum_review_1_8_2.jpg';
					$thumbImg[3] = 'thum_review_1_8_3.jpg';
					$thumbImg[4] = 'thum_review_1_8_4.jpg';
					$thumbImg[5] = 'thum_review_1_8_5.jpg';
					break;
				case 9 :
					$thumbImg[1] = 'thum_review_1_9_1.jpg';
					$thumbImg[2] = 'thum_review_1_9_2.jpg';
					$thumbImg[3] = 'thum_review_1_9_3.jpg';
					$thumbImg[4] = 'thum_review_1_9_4.jpg';
					$thumbImg[5] = 'thum_review_1_9_5.jpg';
					break;
				default :
					$thumbImg[1] = 'img_pop_thumb01.jpg';
					$thumbImg[2] = 'img_pop_thumb02.jpg';
					$thumbImg[3] = 'img_pop_thumb03.jpg';
					$thumbImg[4] = 'img_pop_thumb04.jpg';
					$thumbImg[5] = 'img_pop_thumb05.jpg';
			}
			require 'skin/write.skin.php';
		}
		else
		{
			require 'skin/alert.skin.php';
		}
	}

	$Point = null;
	$dbh = null;
	unset($Point);
	unset($dbh);
}
