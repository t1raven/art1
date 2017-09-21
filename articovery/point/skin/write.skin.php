<?php if (!defined('OKTOMATO')) exit; ?>

	<div class="btn_close_wrap">
		<button type="button" name="">
			<img src="/images/articovery/ico_closex.png" alt="닫기">
		</button>
	</div>

<?php if ($isPointAble) : ?>
	<div class="text_wrap">
		<?php if ($user_level == '20') : ?>
			<!-- 전문가 패널 -->
			<p class="title">TOP9의 작품을 POINT 해주세요!</p>
			<p class="subtitle">9명 작가의 각 5점의 작품을 보고 <span>4개의 항목을 POINT 후, 작품평을 작성</span> 하면 참여완료!</p>
		<?php else : ?>
		<!-- 일반 패널 -->
			<p class="title">TOP9의 작품을 POINT 해주세요!</p>
			<p class="subtitle">9명 작가의 각 5점의 작품을 보고 <span>4개의 항목을 POINT 후, 작품평을 작성</span> 하면 참여완료!</p>
			<p class="descript">추첨을 통해 단 한분께 ‘TOP 1 작가의 작품’을 드립니다.</p>
			<p class="descript">(이벤트 상품 수령을 위해 9명의 POINT 완료 후, 반드시 연락처를 남겨주세요)</p>
		<?php endif ; ?>
	</div>

	<div class="content_wrap">
		<div class="review_area">
			<p class="tit_review">[작품 다시보기]</p>
			<div class="review_li">
				<ul>
					<li>
						<div><img src="/images/articovery/<?php echo $thumbImg[1]; ?>" alt=""></div>
					</li>
					<li>
						<div><img src="/images/articovery/<?php echo $thumbImg[2]; ?>" alt=""></div>
					</li>
					<li>
						<div><img src="/images/articovery/<?php echo $thumbImg[3]; ?>" alt=""></div>
					</li>
					<li>
						<div><img src="/images/articovery/<?php echo $thumbImg[4]; ?>" alt=""></div>
					</li>
					<li>
						<div><img src="/images/articovery/<?php echo $thumbImg[5]; ?>" alt=""></div>
					</li>
				</ul>
			</div>
		</div>

		<div class="pointing_area">
			<p class="tit_review">[POINT 하기]</p>
			<div class="bar_area">
				<ul>
					<li>
						<div class="txt">
							<p>Technique / 기술성</p>
						</div>
						<div class="bar sliderRangeArea">
							<label>1</label>
							<div class="sliderRanges">
								<div class="sliderRange" data-start="<?php echo $Point->attr['technique_score']; ?>"></div>
							</div>
							<label>10</label>
						</div>
					</li>
					<li>
						<div class="txt">
							<p>Artistic Quality / 예술성</p>
						</div>
						<div class="bar sliderRangeArea">
							<label>1</label>
							<div class="sliderRanges">
								<div class="sliderRange" data-start="<?php echo $Point->attr['artistic_score']; ?>"></div>
							</div>
							<label>10</label>
						</div>
					</li>
					<li>
						<div class="txt">
							<p>Creativity / 창의성</p>
						</div>
						<div class="bar sliderRangeArea">
							<label>1</label>
							<div class="sliderRanges">
								<div class="sliderRange" data-start="<?php echo $Point->attr['creativity_score']; ?>"></div>
							</div>
							<label>10</label>
						</div>
					</li>
					<li>
						<div class="txt">
							<p>Potential / 가능성</p>
						</div>
						<div class="bar sliderRangeArea">
							<label>1</label>
							<div class="sliderRanges">
								<div class="sliderRange" data-start="<?php echo $Point->attr['potential_score']; ?>"></div>
							</div>
							<label>10</label>
						</div>
					</li>
				</ul>
			</div>
			<div class="fscore_area">
				<p>Final score
					<span><?php echo $Point->attr['final_score']; ?></span>
				</p>
			</div>
		</div>
		<div class="t_area">
			<p class="tit_q">Q.해당 작가의 작품에 대한 의견을 남겨주세요.<br />
				여러분의 소중한 의견이 작가에게 많은 도움이 됩니다.</p>
				<textarea name="opinion" id="opinion" rows="6" cols="80" maxlength="500" placeholder="500자 이하"><?php echo $Point->attr['opinion']; ?></textarea>
				<input type="hidden" name="sidx" id="sidx" value="<?php echo $Point->attr['score_idx']; ?>">
				<input type="hidden" name="technique" id="technique" value="<?php echo $Point->attr['technique_score']; ?>">
				<input type="hidden" name="artistic" id="artistic" value="<?php echo $Point->attr['artistic_score']; ?>">
				<input type="hidden" name="creativity" id="creativity" value="<?php echo $Point->attr['creativity_score']; ?>">
				<input type="hidden" name="potential" id="potential" value="<?php echo $Point->attr['potential_score']; ?>">
		</div>

	</div>

	<div class="btn_wrap">
		<button type="button" name="button" class="go_complete" onclick="update();">POINT 완료하기!</button>
	</div>
<?php else : ?>
	<div class="text_wrap">
		<!-- 기간 만료 -->
		<p class="title">POINT 기간이 아니거나 기간이 만료되었습니다.</p>
		<p class="subtitle">POINT 기간에만 평가 할 수 있습니다.</p>
	</div>
	<!--
	<div class="btn_wrap">
		<button type="button" name="button" class="go_complete" >닫기</button>
	</div>
	-->
<?php endif ; ?>

<script type="text/javascript">
$(function(){
	$(".btn_close_wrap > button").click(function(){
		$(".point_pop_wrap").hide();
		$(".popup_bg").hide();
	});

	$(".point_pop_alert .btn_wrap button").click(function(){
		var posTop = $(".t_area").offset();
		$(window).scrollTop(posTop.top);
	});
});

<?php if ($isPointAble) : ?>
var rangeSliders = document.getElementsByClassName('sliderRange');
for ( var i = 0; i < rangeSliders.length; i++ ) {
	noUiSlider.create(rangeSliders[i], {
		start: [$(rangeSliders[i]).data("start")],
		connect: [true, false],
		step: 1,
		range: {
			'min': 1,
			'max': 10
		},
		tooltips: [wNumb({ decimals: 0 })],
	});
	rangeSliders[i].noUiSlider.on('slide', totalRangeVal);
	if(i == rangeSliders.length-1) rangeSliders[i].noUiSlider.on('update', totalRangeVal);
}

function totalRangeVal(argument) {
	var totalVal = 0;
	for ( var i = 0; i < rangeSliders.length; i++ ) {
		//console.log("chk:"+parseInt(rangeSliders[i].noUiSlider.get()));

		if(i != 3){
			totalVal += parseInt(rangeSliders[i].noUiSlider.get())*0.3;
			if(i == 0){
				$("#technique").val(parseInt(rangeSliders[i].noUiSlider.get()));
			}else if(i == 1){
				$("#artistic").val(parseInt(rangeSliders[i].noUiSlider.get()));
			}else if(i == 2){
				$("#creativity").val(parseInt(rangeSliders[i].noUiSlider.get()));
			}
		}else{
			totalVal += parseInt(rangeSliders[i].noUiSlider.get())*0.1;
			if(i == 3){
				$("#potential").val(parseInt(rangeSliders[i].noUiSlider.get()));
			}
		}
	}
	$('.fscore_area span').text(totalVal.toFixed(2));
}

function update(){
	if ($("#opinion").val().trim() == "") {
		$(".popup_alert_bg").show();
		$(".point_pop_alert").show();
		var posTop = $(".point_pop_alert").offset();
		$(window).scrollTop(posTop.top);
	}else{
		// 전송로직
		$.ajax({
			url:"index.php",
			type:"post",
			data:{"cidx":"<?php echo $covery_idx; ?>", "pidx":"<?php echo $point_idx; ?>", "sidx":$("#sidx").val(), "technique":$("#technique").val(), "artistic":$("#artistic").val(), "creativity":$("#creativity").val(), "potential":$("#potential").val(), "opinion":$("#opinion").val(), "at":"update"},
			dataType:"json",
			success:function(data){
				if(data.result == 1){
					// 성공
					complete(data.covery_idx, data.point_cnt, data.contact, data.expert);

				}else{
					// 실패
					alert('error');
				}
			},
			error:function(e){
				alert(e.responseText);
			}
		});
	}
}
<?php endif ; ?>
</script>
