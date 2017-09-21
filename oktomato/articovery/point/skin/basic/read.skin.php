<?php if (!defined('OKTOMATO')) exit;?>

<?php
if (is_array($list) && sizeof($list) > 0) {
	foreach ($list as $key => $row) {
		if ($key === $maxIndex) {
			//echo "chk1";
			$strClass = ' style="background-color:#efefef;text-decoration: line-through;text-decoration-color:red"';
		}
		else {
			//echo "chk2";
			$total_score += $row['final_score'];
			$strClass = '';
		}
?>
	<tr<?php echo $strClass; ?>>
		<td><?php echo $row['user_name']; ?></td>
		<td><?php echo $row['technique_score']; ?></td>
		<td><?php echo $row['artistic_score']; ?></td>
		<td><?php echo $row['creativity_score']; ?></td>
		<td><?php echo $row['potential_score']; ?></td>
		<td><?php echo $row['final_score']; ?></td>
	</tr>

<?php
	}
?>
	<tr>
		<th>합계</th>
		<th colspan="4"></td>
		<th><?php echo $total_score; ?></th>
	</tr>
<?php
} else {
?>
	<tr>
		<td colspan="6">자료가 존재하지 않습니다.</th>
	</tr>
<?php
}

