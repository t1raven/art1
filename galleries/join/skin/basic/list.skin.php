<?php if (!defined('OKTOMATO')) exit; ?>

<section id="container_sub">
	<div class="container_inner">
		<?php include '../../inc/path.php'; ?>
		<form name="frm" id="frm" method="post" onsubmit="return false;" enctype="multipart/form-data">
			<input type="hidden" name="at" value="update">
			<input type="hidden" name="lat" id="lat">
			<input type="hidden" name="lng" id="lng">
			<input type="hidden" name="overlap" id="overlap" value="Y">

			<section id="apply_gallery_join_area" class="content-mediaBox margin1">
				<div class="lst_table3 artist">
					<table summary="갤러리 등록(갤러리명 및 홈페이지 주소 ,담당자 등을 입력하는 표)">
						<caption>갤러리명 등록</caption>
						<colgroup>
							<col class="th1">
							<col>
						</colgroup>
						<tbody>
							<tr>
								<th scope="row">계정 *</th>
								<td>
									<input type="text" class="inp_txt lh w110 {label:'계정',required:true,nospace:true,minlength:4,maxlength:60,memberid:true}" name="galleryId" id="galleryId" maxlength="60">
									<button class="btn_width_input" onclick="chkAccount();">중복 확인</button>&nbsp;<span>c.f 원하는 계정을 4자 이상 입력하여 주세요.</span>
								</td>
							</tr>

							<tr>
								<th scope="row">갤러리명(국문) *</th>
								<td>
									<span class="col_td auto">
										<label for="galleryNameKr" class="pos"></label>
										<input type="text" class="inp_txt lh w390 {label:'갤러리명(국문)',required:true,minlength:2,maxlength:50}" name="galleryNameKr" id="galleryNameKr" maxlength="50">
									</span>
								</td>
							</tr>
							<tr>
								<th scope="row">갤러리명(영문) *</th>
								<td >
									<span class="col_td auto">
										<label for="galleryNameEn" class="pos"></label>
										<input type="text" class="inp_txt lh w390 {label:'갤러리명(영문)',required:true,minlength:2,maxlength:50}" name="galleryNameEn" id="galleryNameEn" maxlength="50">
									</span>
								</td>
							</tr>
							<tr>
								<th scope="row">홈페이지 주소 *</th>
								<td>
									<input type="text" class="inp_txt lh w390 {label:'홈페이지 주소',required:true,nospace:true,minlength:8,maxlength:255,url:true}" name="homepage" id="homepage" maxlength="255">&nbsp;cf. http://나 https://를 포함한 전체 url을 입력해주세요.
								</td>
							</tr>
							<tr>
								<th scope="row">이메일 *</th>
								<td>
									<input type="text" class="inp_txt lh w390 {label:'이메일',required:true,email:true,minlength:6,maxlength:60}" name="email" id="email" maxlength="60">
								</td>
							</tr>
							<tr>
								<th scope="row">전화번호 *</th>
								<td>
									<input type="text" class="inp_txt lh w390  {label:'전화번호',required:true,minlength:6,maxlength:30}" name="tel" id="tel" maxlength="30">
								</td>
							</tr>
							<tr>
								<th scope="row">팩스번호 *</th>
								<td>
									<input type="text" class="inp_txt lh w390 {label:'팩스번호',required:true,minlength:6,maxlength:30}" name="fax" id="fax" maxlength="30">
								</td>
							</tr>
							<tr>
								<th scope="row">주소(국문) *</th>
								<td>
									<input type="text" class="inp_txt lh w110 only_number {label:'우편번호',required:true,numeric:true,nospace:true,minlength:5,maxlength:5}" name="zipCode" id="zipCode"> <button type="button" class="btn_width_input"onclick="execDaumPostcode();">Search</button>
									<div style="margin-top:5px;"><input type="text" class="inp_txt lh w390 {label:'주소',required:true,minlength:6,maxlength:255}" name="addr1" id="addr1" readonly></div>
									<div style="margin-top:5px;"><input type="text" class="inp_txt lh w390  {label:'상세 주소',required:false,minlength:2,maxlength:255}" name="addr2" id="addr2" onblur="getMaps();"></div>
								</td>
							</tr>
							<tr>
								<th scope="row">주소(영문) *</th>
								<td>
									<div style="margin-top:5px;"><input type="text" class="inp_txt lh w390" name="addr1En" id="addr1En" readonly>&nbsp;cf. 주소(국문)를 입력하면 자동으로 영문 주소가 입력됩니다.</div>
								</td>
							</tr>

							<tr>
								<th scope="row">갤러리 로고 *</th>
								<td >
									<div class="clearfix">
										<div class="fileinputs" >
											<input type="file" class="file" name="upfile" id="upfile" accept="application/pdf, application/postscript" />
										</div>&nbsp;cf. ai 파일로 올려주세요.
									</div>
								</td>
							</tr>
							<tr>
								<th scope="row">시업자등록증 *</th>
								 <td >
									<div class="clearfix">
										<div class="fileinputs" >
											<input type="file" class="file" name="upfile2" id="upfile2" accept="image/*, application/pdf" />
										</div>&nbsp;cf. jpg, gif, png, pdf 파일로 올려주세요. 파일명은 가능하면 영문명으로, 그리고 공백은 제거해 주세요.
									</div>
								</td>
							</tr>
							<tr>
								<th scope="row">담당자명</th>
								<td>
									<input type="text" class="inp_txt lh w390  {label:'담당자명',required:false,minlength:2,maxlength:50}" name="contactName" id="contactName" maxlength="50">
								</td>
							</tr>
							<tr>
								<th scope="row">담당자 연락처</th>
								<td>
									<input type="text" class="inp_txt lh w390 {label:'담당자 연락처',required:false,minlength:6,maxlength:30}" name="contactTel" id="contactTel" maxlength="30">
								</td>
							</tr>
							<tr>
								<th scope="row">담당자 이메일</th>
								<td>
									<input type="text" class="inp_txt lh w390 {label:'담당자 이메일',required:false,minlength:6,maxlength:60}" name="contactEmail" id="contactEmail" maxlength="60">
								</td>
							</tr>
							<tr>
								<th scope="row">주차</th>
								<td>
									<input type="text" class="inp_txt lh w390 {label:'주차',required:false,minlength:2,maxlength:100}" name="parking" id="parking" maxlength="100">&nbsp;c.f 주차 위치를 입력하세요.
								</td>
							</tr>
							<tr>
								<th scope="row">관람시간</th>
								<td>
									<input type="text" class="inp_txt lh w390 {label:'관람시간',required:false,minlength:2,maxlength:100}" name="openingHours" id="openingHours" maxlength="100">&nbsp;c.f 연중무휴 (공휴일 제외) 10am-7pm
								</td>
							</tr>

					   </tbody>
				   </table>
				</div>

				<div class="bot_align">
					<div class="btn_right">
						<button type="button" class="btn_pack1 ov-b small rato" id="btnSave">Save</button>
					</div>
				</div>
			</section>
		</form>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<script src="//apis.daum.net/maps/maps3.js?apikey=b50047a255e7b5c6aea6945d919b269f&libraries=services"></script>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script src="/js/address.js"></script>
<script src="/partner/js/jquery.chkform.js"></script>
<script type="text/javascript" src="/partner/js/jquery.form.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#btnSave").click(function() {
		chkVaild();
	});
	LabelHidden(".inp_txt.lh");
	initFileUploads();
	$("#upfile").addClass("{label:'갤러리 로고',required:true}");
	$("#upfile2").addClass("{label:'사업자등록증',required:true}");
});
function chkVaild() {
	if($("#overlap").val() == "N"){
		chkForm(document.frm);
	}else {
		alert("계정 중복 확인을 처리해 주세요.");
		return false;
	}
}

function chkAccount() {
	var galleryId = $("#galleryId").val();
	if ($("#galleryId").val().trim() ==""){
		alert("계정을 입력하세요.");
		return false;
	}
	else {
		if ($("#galleryId").val().length < 4) {
			alert("계정은 최소 4자 이상 입력해야 합니다.");
			return false;
		}
		else {
			$.ajax({
				method : "POST",
				dataType : "JSON",
				url: "index.php",
				data: {"galleryId": $("#galleryId").val(), "at":"account"},
				success: function(data) {
					if( data.complete == "true" ){
						alert(data.msg);
						$("#overlap").val("N");
					}else{
						alert(data.msg);
						$("#galleryId").val("");
						$("#overlap").val("Y");
					}
				},
				error:function(request,status,error){
					alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				}
			});
		}
	}
}
</script>
