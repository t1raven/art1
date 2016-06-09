<?php
if($row['news_category_idx'] == 15 ){
	$a_href = '<a href="#" onclick="getCardView('.$row['news_idx'].');return false;">';
}else{
	$a_href = '<a href="?at=read&subm='.$row['news_category_idx'].'&idx='.$row['news_idx'].'&back_page='.$page.'&isto='.$row['news_idx'].'&at_tmp='.$at_tmp.'">';
}
?>
		<section class="newsBox" id="isto<?php echo $row['news_idx'] ; ?>">
			<div class="newsBox_inner">
				<div class="Boximg">
				<?php if(!empty($row['up_file_name'])) {?>
					<!-- a href="news_view.php"><img src="/images/news/img_news1.jpg" alt="" /></a -->
					<?php echo $a_href;?><img src="<?php echo $img_src?>" alt="" /></a>
					
				<?php } ?>
				</div><!-- Boximg -->
				<div class="news_cont">
					<h1><?php echo $row['news_category_name'];?></h1>
					<h2>
					
					<?php echo $a_href;?><?php echo $row['news_title'];?></a>

					</h2>
					<div class="text_cont" style="word-break:break-all; word-wrap: break-word; white-space: normal;" >

						<?php if( $check_mobile != true ){ ?>
						<?php echo $a_href;?>
						<?php echo (mb_strlen($row['new_paragraph_content']) > 100 ) ? mb_substr($row['new_paragraph_content'],0,100,"UTF-8").'...' : mb_substr($row['new_paragraph_content'],0,100,"UTF-8") ;?>

						<?php } ?>
						</a>
					</div><!-- text_cont -->
					<div class="news_date">
						<p class="writer"><span><?php echo (empty($row['source'])) ? NULL: '['.$row['source'].']'  ;?></span> <span><?php echo $row['reporter_name'];?></span></p>
						<p class="date"><?php echo substr($row['create_date'],0,10);?></p>
					</div><!-- news_date -->
				</div><!-- news_cont -->
			</div><!-- newsBox_inner -->
		</section>