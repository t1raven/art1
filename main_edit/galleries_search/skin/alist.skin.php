<?php
if (!defined('OKTOMATO')) exit;
?>

<?php
if(!empty($list)) {
?>
<table class="tb_type_edit">
    <colgroup>
        <col>
        <col>
        <col>
        <col width="60px">
    </colgroup>
    <thead>
        <tr>
            <th>갤러리명</th>
            <th>전시회명</th>
            <th>전시기간</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
		<?php
		$i=0;
		foreach($list as $row) {
		?>
        <tr>
            <td class="gallery"><?php echo $row['galleryNameKr']?></td>
            <td class="exhibition"><?php echo $row['exhibitionTitle']?></td>
            <td class="date"><?php echo $row['beginDate']?> ~ <?php echo $row['endDate']?></td>
            <td>
				<input type="radio" name="exhidx" id="select[<?php echo $i?>]" class="chkraido" value="<?php echo $row['exhibitionIdx']?>">
				<label for="select[<?php echo $i?>]"></label>
            </td>
        </tr>
		<?php
			$i++;
		}
		?>
        <!-- <tr>
            <td class="gallery">THE PAGE GALLERY</td>
            <td class="exhibition">the Original Sound as It Is</td>
            <td class="date">2016.12.03 ~ 2017.01.31</td>
            <td>
                <input type="radio" name="exhidx" id="select[1]" class="chkraido">
                <label for="select[1]"></label>
            </td>
        </tr>
        <tr>
            <td class="gallery">Hakgojae Gallery</td>
            <td class="exhibition">Who likes K colors?</td>
            <td class="date">2016.12.03 ~ 2017.01.31</td>
            <td>
                <input type="radio" name="exhidx" id="select[2]" class="chkraido">
                <label for="select[2]"></label>
            </td>
        </tr>
        <tr>
            <td class="gallery">THE PAGE GALLERY</td>
            <td class="exhibition">THE AESTHETICS OF BODY - ULTRAMARINE</td>
            <td class="date">2016.12.03 ~ 2017.01.31</td>
            <td>
                <input type="radio" name="exhidx" id="select[3]" class="chkraido">
                <label for="select[3]"></label>
            </td>
        </tr> -->
    </tbody>
</table>
<!-- <ul class="pagination">
    <li class="start"><a href="/main_edit/__ajax_result_market.php">Start</a></li>
    <li class="prev"><a href="/main_edit/__ajax_result_market.php">prev 5p</a></li>
    <li class="active"><span>1</span></li>
    <li class=""><a href="/main_edit/__ajax_result_market.php">2</a></li>
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


