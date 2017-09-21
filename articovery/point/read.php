<?php
if (!defined('OKTOMATO')) exit;

$categoriName = 'articovery';
$pageName = 'articovery';
$pageNum = '5';
$subNum = '1';
$thirdNum = '0';
$pathType = 'b';

$covery_idx = isset($_GET['cidx']) ? (int)$_GET['cidx'] : null;
$point_idx = isset($_GET['pidx']) ? (int)$_GET['pidx'] : null;

if ($_SESSION['user_idx'] && is_int($covery_idx) && is_int($point_idx)) {
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
	$user_level = AES256::dec($_SESSION['user_level_code'], AES_KEY);
	$aryColor = array('black', 'green', 'red', 'purple');
	$aryVisual = array('', 'fst', 'snd', 'trd', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth');

	$Point = new Point();
	$Point->setAttr('covery_idx', $covery_idx);
	$Point->setAttr('point_idx', $point_idx);
	$Point->setAttr('user_idx', $user_idx);
	$isExist = $Point->getIsExist($dbh);

	if ($isExist > 0) {
		$allPin = $Point->getAllPin($dbh);
		$expertList = $Point->getExpertComment($dbh);
		//print_r($expertList);

		if (is_array($expertList))
		{
			$technique_score = 0;
			$artistic_score = 0;
			$creativity_score = 0;
			$potential_score = 0;
			$final_score = 0;
			$totalCnt = sizeof($expertList);

			if ($totalCnt > 0 ) {
				foreach ($expertList as $key => $row) {
					if ($key == 0) {
						$opinion = $row['opinion'];
					}

					$technique_score += $row['technique_score'];
					$artistic_score += $row['artistic_score'];
					$creativity_score += $row['creativity_score'];
					$potential_score += $row['potential_score'];
					$final_score += $row['final_score'];
				}

				$technique_score = $technique_score / $totalCnt;
				$artistic_score = $artistic_score / $totalCnt;
				$creativity_score = $creativity_score / $totalCnt;
				$potential_score = $potential_score / $totalCnt;
				$final_score = $final_score / $totalCnt;
			}
		}

		$isPointAble = $Point->getIsPointAble($user_level);
		//$isContact = $Point->getIsContact($dbh);

		switch ($point_idx)
		{
			case 1 :
				$thumbImg[1] = 'img_artworks_1_1_1_big.jpg';
				$thumbImg[2] = 'img_artworks_1_1_2_big.jpg';
				$thumbImg[3] = 'img_artworks_1_1_3_big.jpg';
				$thumbImg[4] = 'img_artworks_1_1_4_big.jpg';
				$thumbImg[5] = 'img_artworks_1_1_5_big.jpg';
				$thumbInfo[1] = '나지수 - Blue Stream, 2017, Mixed media, 74 × 90 cm';
				$thumbInfo[2] = '나지수 - Talk About, 2017, Mixed media, 162.2 × 130 cm';
				$thumbInfo[3] = '나지수 - X - Stream, 2017, Mixed media on Korean paper, 74 × 90 cm';
				$thumbInfo[4] = '나지수 - Planet, 2016, Mixed media, 95.5 × 130.5 cm';
				$thumbInfo[5] = '나지수 - Flowers in Chaos, 2017, Mixed media, 130 × 130 cm';
				break;
			case 2 :
				$thumbImg[1] = 'img_artworks_1_2_1_big.jpg';
				$thumbImg[2] = 'img_artworks_1_2_2_big.jpg';
				$thumbImg[3] = 'img_artworks_1_2_3_big.jpg';
				$thumbImg[4] = 'img_artworks_1_2_4_big.jpg';
				$thumbImg[5] = 'img_artworks_1_2_5_big.jpg';
				$thumbInfo[1] = '베리킴 - Fake Life - Coffee Shop 4F, 2016, Digital print on canvas, 195 × 330 cm';
				$thumbInfo[2] = '베리킴 - Fake Life - Convenient Store 1F, 2017, Digital print on canvas, 195 × 330 cm';
				$thumbInfo[3] = '베리킴 - Fake Life - Luxury Store 5F, 2017, Digital print on canvas, 195 × 330 cm';
				$thumbInfo[4] = '베리킴 - Fake Life - Plastic Surgery 3F, 2016, Digital print on canvas, 195 × 330 cm';
				$thumbInfo[5] = '베리킴 - Miss Luiss.B, 2016, Mixed media, 60 × 45 cm';
				break;
			case 3 :
				$thumbImg[1] = 'img_artworks_1_3_1_big.jpg';
				$thumbImg[2] = 'img_artworks_1_3_2_big.jpg';
				$thumbImg[3] = 'img_artworks_1_3_3_big.jpg';
				$thumbImg[4] = 'img_artworks_1_3_4_big.jpg';
				$thumbImg[5] = 'img_artworks_1_3_5_big.jpg';
				$thumbInfo[1] = '은유영 - Levels of Life, 2017, Mixed media on canvas, 60 × 60 cm';
				$thumbInfo[2] = '은유영 - 천개의 바람이 되어, 2015, Mixed media on canvas, 162 × 130 cm';
				$thumbInfo[3] = '은유영 - Island Universe, 2015, Mixed media on canvas, 97 × 162.2 cm';
				$thumbInfo[4] = '은유영 - 투과된 서사, 2017, Mixed media on panel, 72.7 × 60.6 cm';
				$thumbInfo[5] = '은유영 - Universe (宇宙), 2017, Mixed media, 40.9 × 53 cm';
				break;
			case 4 :
				$thumbImg[1] = 'img_artworks_1_4_1_big.jpg';
				$thumbImg[2] = 'img_artworks_1_4_2_big.jpg';
				$thumbImg[3] = 'img_artworks_1_4_3_big.jpg';
				$thumbImg[4] = 'img_artworks_1_4_4_big.jpg';
				$thumbImg[5] = 'img_artworks_1_4_5_big.jpg';
				$thumbInfo[1] = '전병택 - The Tower of Card - Toco Toucan, 2016, Oil on canvas, 97 × 162.2 cm';
				$thumbInfo[2] = '전병택 - Instability, 2016, Oil on canvas, 112.1 × 162.2 cm';
				$thumbInfo[3] = '전병택 - The Tower of Card, 2017, Oil on canvas, 91 × 116.7 cm';
				$thumbInfo[4] = '전병택 - The Tower of Card, 2017, Oil on canvas, 72.7 × 50.3 cm';
				$thumbInfo[5] = '전병택 - The Tower of Card - Hyacinth Macaw, 2016, Oil on canvas, 112.1 × 162.2 cm';
				break;
			case 5 :
				$thumbImg[1] = 'img_artworks_1_5_1_big.jpg';
				$thumbImg[2] = 'img_artworks_1_5_2_big.jpg';
				$thumbImg[3] = 'img_artworks_1_5_3_big.jpg';
				$thumbImg[4] = 'img_artworks_1_5_4_big.jpg';
				$thumbImg[5] = 'img_artworks_1_5_5_big.jpg';
				$thumbInfo[1] = '정다운 - Fabric Drawing - Play Ground - Hide & Seek, 2016, Fabric, frame, installation, dimensions variable';
				$thumbInfo[2] = '정다운 - Fabric Drawing - The composition II, 2015, Fabric, acrylic on frame, 110 × 330 cm';
				$thumbInfo[3] = '정다운 - Fabric Drawing #61, 2017, Fabric on frame, 60.6 × 60.6 cm';
				$thumbInfo[4] = '정다운 - Fabric Drawing - A Striped Harmony, 2015, Fabric on frame, 162.2 × 130.3 cm';
				$thumbInfo[5] = '정다운 - Fabric Drawing - 감각의 전환, 2017, Fabric, installation, dimensions variable';
				break;
			case 6 :
				$thumbImg[1] = 'img_artworks_1_6_1_big.jpg';
				$thumbImg[2] = 'img_artworks_1_6_2_big.jpg';
				$thumbImg[3] = 'img_artworks_1_6_3_big.jpg';
				$thumbImg[4] = 'img_artworks_1_6_4_big.jpg';
				$thumbImg[5] = 'img_artworks_1_6_5_big.jpg';
				$thumbInfo[1] = '정현균 - OB, 2016, Mixed media, 78 × 187 cm';
				$thumbInfo[2] = '정현균 - Orange, 2017, Mixed media, 78 × 187 cm';
				$thumbInfo[3] = '정현균 - Multi, 2017, Mixed media, 78 × 187 cm';
				$thumbInfo[4] = '정현균 - Multi, 2017, Mixed media, 78 × 187 cm';
				$thumbInfo[5] = '정현균 - White Blue, 2016, Mixed media, 78 × 187 cm';
				break;
			case 7 :
				$thumbImg[1] = 'img_artworks_1_7_1_big.jpg';
				$thumbImg[2] = 'img_artworks_1_7_2_big.jpg';
				$thumbImg[3] = 'img_artworks_1_7_3_big.jpg';
				$thumbImg[4] = 'img_artworks_1_7_4_big.jpg';
				$thumbImg[5] = 'img_artworks_1_7_5_big.jpg';
				$thumbInfo[1] = '정현용 - Detroit, 2014, Acrylic on canvas, 91 × 117 cm';
				$thumbInfo[2] = '정현용 - Abuse, 2015, Acrylic on canvas, 135 × 270 cm';
				$thumbInfo[3] = '정현용 - 각각의 찰나, 2014, Acrylic on canvas, 130 × …';
				$thumbInfo[4] = '정현용 - 일식, 2014, Acrylic on canvas, 135 × 405 cm';
				$thumbInfo[5] = '정현용 - Pablo, 2014, Acrylic on canvas, 130 × 194 cm';
				break;
			case 8 :
				$thumbImg[1] = 'img_artworks_1_8_1_big.jpg';
				$thumbImg[2] = 'img_artworks_1_8_2_big.jpg';
				$thumbImg[3] = 'img_artworks_1_8_3_big.jpg';
				$thumbImg[4] = 'img_artworks_1_8_4_big.jpg';
				$thumbImg[5] = 'img_artworks_1_8_5_big.jpg';
				$thumbInfo[1] = '조은영 - In Quite Peace, 2015, Acrylic, colored pencil on paper, 91 × 116 cm';
				$thumbInfo[2] = '조은영 - A Reader, 2017, Acrylic and colored pencil on paper, 194 × …';
				$thumbInfo[3] = '조은영 - Mist, 2016, Acrylic on canvas, 91 × 116.8 cm';
				$thumbInfo[4] = '조은영 - Before Sunset, 2017, Acrylic, colored pencil on paper, 130.3 × 260 cm';
				$thumbInfo[5] = '조은영 - Blue Moon, 2014, Color pencil on paper, 73 × 54 cm';
				break;
			case 9 :
				$thumbImg[1] = 'img_artworks_1_9_1_big.jpg';
				$thumbImg[2] = 'img_artworks_1_9_2_big.jpg';
				$thumbImg[3] = 'img_artworks_1_9_3_big.jpg';
				$thumbImg[4] = 'img_artworks_1_9_4_big.jpg';
				$thumbImg[5] = 'img_artworks_1_9_5_big.jpg';
				$thumbInfo[1] = '천눈이 - 남겨진 것들, 2011, Oil on canvas, 120 × 220 cm';
				$thumbInfo[2] = '천눈이 - Dancing on the Beach, 2009, Oil on canvas, 40 × 200 cm';
				$thumbInfo[3] = '천눈이 - 기호들의 순환, 2012, Mixed media, 110 × 200 cm';
				$thumbInfo[4] = '천눈이 - Mintroom, 2013, Oil on canvas, 91 × 73 cm';
				$thumbInfo[5] = '천눈이 - A Cave, 2012, Oil on canvas, 230 × 182 cm';
				break;
			default :
				$thumbImg[1] = 'img_artworks_1_1_1_big.jpg';
				$thumbImg[2] = 'img_artworks_1_1_2_big.jpg';
				$thumbImg[3] = 'img_artworks_1_1_3_big.jpg';
				$thumbImg[4] = 'img_artworks_1_1_4_big.jpg';
				$thumbImg[5] = 'img_artworks_1_1_5_big.jpg';
				$thumbInfo[1] = '나지수 - Blue Stream, 2017, Mixed media, 74 × 90 cm';
				$thumbInfo[2] = '나지수 - Talk About, 2017, Mixed media, 162.2 × 130 cm';
				$thumbInfo[3] = '나지수 - X - Stream, 2017, Mixed media on Korean paper, 74 × 90 cm';
				$thumbInfo[4] = '나지수 - Planet, 2016, Mixed media, 95.5 × 130.5 cm';
				$thumbInfo[5] = '나지수 - Flowers in Chaos, 2017, Mixed media, 130 × 130 cm';
		}

		include '../../inc/link.php';
		include '../../inc/top.php';
		include '../../inc/header.php';
		require 'skin/read.skin.php';
		include '../../inc/footer.php';
		include '../../inc/bot.php';
	}
	else {
		header('Location:/articovery/point');
	}
}
else {
	header('Location:/articovery/point');
}

$Point = null;
$dbh = null;
unset($Point);
unset($dbh);
