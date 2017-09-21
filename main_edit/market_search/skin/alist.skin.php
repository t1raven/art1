<?php
if (!defined('OKTOMATO')) exit;
?>

<?php
if(!empty($list)) {
?>
	<table class="tb_type_edit">
		<colgroup>
			<col width="30%">
			<col>
			<col>
			<col>
			<col>
			<col width="60px">
		</colgroup>
		<thead>
			<tr>
				<th>작품명</th>
				<th>작가</th>
				<th>연도</th>
				<th>재료</th>
				<th>사이즈</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php
			$i=0;
			foreach($list as $row) {
				$artWorkSize = null;
				$width = !empty($row['goods_width']) ? str_replace('.0','',$row['goods_width']) : null;
				$depth = !empty($row['goods_depth']) ? str_replace('.0','',$row['goods_depth']) : null;
				$height = !empty($row['goods_height']) ? str_replace('.0','',$row['goods_height']) : null;

				// 세로
				if (!empty($depth)) {
					$artWorkSize .= $depth;
				}

				// 가로
				if (!empty($width)) {
					$artWorkSize .= 'x'.$width;
				}

				// 높이
				if (!empty($height)) {
					if ((int)$height > 0) {
						$artWorkSize .= 'x'.$height.'cm';
					}
					else {
						$artWorkSize .= 'cm';
					}
				}
				else {
					$artWorkSize .= 'cm';
				}

				if($artWorkSize === 'cm') { //2016-05-12 LYT // 사이즈 값이 없으면 문구 처리
					//$artWorkSize = 'Variable dimensions';
					$artWorkSize = 'Dimensions variable';
				}
		?>        
				<tr>
					<td class="title"><?php echo $row['goods_name']?></td>
					<td class="artist"><?php echo $row['artist_name']?></td>
					<td class="data"><?php echo $row['goods_make_year']?></td>
					<td class="spec1"><?php echo $row['goods_make_type']?></td>
					<td class="spec2"><?php echo $artWorkSize?></td>
					<td>
						<input type="radio" name="artworkid" id="select[<?php echo $i?>]" class="chkraido" value="<?php echo $row['goods_idx']?>">
						<label for="select[<?php echo $i?>]"></label>
					</td>
				</tr>
		<?php
				$i++;
			}
		?>


			<!-- <tr>
				<td class="title">자세</td>
				<td class="artist">고길동</td>
				<td class="data">2017</td>
				<td class="spec1">paper on canvas</td>
				<td class="spec2">77.0cm x 77.0cm</td>
				<td>
					<input type="radio" name="artworkid" id="select[1]" class="chkraido" value="ID0003">
					<label for="select[1]"></label>
				</td>
			</tr>
			<tr>
				<td class="title">Him self(left)</td>
				<td class="artist">서길동</td>
				<td class="data">2016</td>
				<td class="spec1">paper on canvas</td>
				<td class="spec2">77.0cm x 77.0cm</td>
				<td>
					<input type="radio" name="artworkid" id="select[2]" class="chkraido" value="ID0002">
					<label for="select[2]"></label>
				</td>
			</tr>
			<tr>
				<td class="title">POTENTIAL</td>
				<td class="artist">남길동</td>
				<td class="data">2015</td>
				<td class="spec1">paper on canvas</td>
				<td class="spec2">77.0cm x 77.0cm</td>
				<td>
					<input type="radio" name="artworkid" id="select[3]" class="chkraido" value="ID0001">
					<label for="select[3]"></label>
				</td>
			</tr> -->
		</tbody>
	</table>
	<!-- <ul class="pagination">
		<li class="start"><a href="/main_edit/__ajax_result_market.php">Start</a></li>
		<li class="prev"><a href="/main_edit/__ajax_result_market.php">prev 5p</a></li>
		<li class="active"><span>1</span></li>
		<li class=""><a href="/main_edit/market_search/index.php?page=2&at=alist&st=0&word=김보민">2</a></li>
		<li class=""><a href="/main_edit/__ajax_result_market.php">3</a></li>
		<li class=""><a href="/main_edit/__ajax_result_market.php">4</a></li>
		<li class=""><a href="/main_edit/__ajax_result_market.php">5</a></li>
		<li class="next"><a href="/main_edit/__ajax_result_market.php">next 5</a></li>
		<li class="end"><a href="/main_edit/__ajax_result_market.php">End</a></li>
	</ul> -->


	<?php echo $pageUtil->attr[pageHtml]?>
<?php
} else {
?>
	<div class="result_none">
		<p>Sorry, no results found.</p>
		<p>Please try again with some different keywords. </p>
	</div>
<?php
}
