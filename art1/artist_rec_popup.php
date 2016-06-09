<?
	$tile = $_GET['tile'];
	include "artist_rec_data.php";
	$vData = new videoData;
	$vData -> checkData();
	echo $vData ->tile[$tile][popTxt];
?>
<script>
	$("#pop_artist_rec header > .inner h2").html("<?= $vData ->tile[$tile][tit][0]." ".$vData ->tile[$tile][tit][1]?>")
</script>
							








