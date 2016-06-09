<form name="ssFrm" method="get" action="/galleries/search/index.php">
	<section id="headerArea" class="quickSearchBox content-mediaBox margin1">
		<div class="inner">
			<button type="button" class="close" onclick="fixedPopupClose();"><img src="/images/btn/btn_close.png" alt="닫기"></button>
			<div class="smartBox">
				<h1 class="smart_tit">galleries 검색</h1>
					<div class="searchBar">
						<div class="inner">
								<div class="col1">
										<span class="check_listbox box">
											<label for="chkgallery" class="on">Gallery</label>
											<input type="checkbox" id="chkgallery" name="chkgallery" value="Y" checked="checked">
										</span>
										<span class="check_listbox box min">
											<label for="chkartist" class="on">Artist</label>
											<input type="checkbox" id="chkartist" name="chkartist" value="Y" checked="checked">
										</span>
										<span class="check_listbox box">
											<label for="chkexhibition" class="on">Exhibition</label>
											<input type="checkbox" id="chkexhibition" name="chkexhibition" value="Y" checked="checked">
										</span><br />

										<span class="check_listbox box">
											<label for="chkartworks" class="on">Artwork</label>
											<input type="checkbox" id="chkartworks" name="chkartworks" value="Y" checked="checked">
										</span>
										<span class="check_listbox box min">
											<label for="chknews" class="on">News</label>
											<input type="checkbox" id="chknews" name="chknews" value="Y" checked="checked">
										</span>
										<span class="check_listbox box">
											<label for="chkartfair" class="on">Artfair</label>
											<input type="checkbox" id="chkartfair" name="chkartfair" value="Y" checked="checked">
										</span>
								</div>
								<div class="col2">
									<span class="col_td auto" style="vertical-align: top;">
										<label for="kword" class="pos">'galleries' 통합 검색입니다.</label>
										<input name="kword" type="text" class="inp_txt lh" id="kword" title="'galleris' 통합 검색입니다.">
									</span>
									<div class="search_btn">
										<a href="javascript:;" onclick="getSearch();">Search</a>
									</div>
								</div>
						</div>
					</div>
					<!-- <div class="search_btn">
						<a href="javascript:;" onclick="getSearch();">Search</a>
					</div> -->
			</div>
		</div>
	</section>
</form>
<script>
function getSearch() {
	var bx = $("#headerArea .searchBar > .inner > .col1");
	if (bx.find('input:checkbox').filter(function(){return $(this).prop('checked')}).length === 0) {
		alert("최소한 1개이상의 항목에 체크하여 주세요.");
		return false;
	}else{
		if ($("#kword").val() == "") {
			alert("검색어를 입력하세요!");
			$("#kword").focus();
			return false;
		}
	}
	document.ssFrm.submit();
}
</script>