<?php if (!defined('OKTOMATO')) exit;?>
                 </div><!-- //lst_order -->
              </article><!-- //lft_group -->
              <form name="addrFrm" id="addrFrm" method="post" onsubmit="return false;">
              <input type="hidden" name="at" value="update">
              <input type="hidden" name="address" id="address" >
              <input type="hidden" name="mode" value="<?php echo $mode; ?>">
              <article class="rgh_group">
                <h2 class="title3">주소 등록 및 수정</h2>
                  <div class="formMailType1">
                        <ul>
                          <li>
                                <label for="addr_name" class="h">이름</label>
                                <input type="text" name="addr_name" id="addr_name" class="inp_txt2 {label:'이름',required:true}" maxlength="50">
                          </li>
                          <li class="address">
                                <label for="addr_zip" class="h">우편번호</label>
                                <input type="text" name="addr_zip" id="addr_zip" class="inp_txt2 only_number {label:'우편번호',minlength:6,maxlength:6,required:true}" maxlength="6" readonly>
                                <button class="btn_pack radius fw-b add" onclick="LayerPopup_type('#addressFind')">우편번호 검색</button>
                          </li>
                          <li>
                                <label for="addr_1" class="h">기본주소</label>
                                <input type="text" name="addr_1" id="addr_1" class="inp_txt2 {label:'기본주소',required:true}" readonly>
                          </li>
                          <li>
                                <label for="addr_2" class="h">상세주소</label>
                                <input type="text" name="addr_2" id="addr_2" class="inp_txt2 {label:'상세주소',required:true}" maxlength="100">
                          </li>
                          <li>
                                <label for="addr_email" class="h">이메일</label>
                                <input type="text" name="addr_email" id="addr_email" class="inp_txt2 {label:'이메일',required:true,email:true}" maxlength="60">
                          </li>
                          <li>
                                <label for="addr_tel" class="h">전화번호</label>
                                <input type="text" name="addr_tel" id="addr_tel" class="inp_txt2 only_number {label:'전화번호',required:true,numeric:true}" maxlength="11" placeholder="숫자만 입력 가능">
                          </li>
                        </ul>
                        <span class="check_listbox box"><label for="addr_state">기본 배송지로 설정</label><input type="checkbox" id="addr_state" name="addr_state" value="Y"></span>

                        <div class="btn_bot">
                          <a href="javascript:;" id="btnAddress" class="btn_pack samll2 black">저장</a>
                        </div><!-- //btn_bot -->
                  </div>
              </article><!-- //lft_group -->
              </form>
            </section><!-- //addressArea -->
            <script type="text/javascript">bbsCheckbox();tabTransformation(4,"c");</script>
        </div><!-- dashSubArea -->
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <section id="addressFind" class="layerPopup" style="display:none">
    <div class="inner">
        <header class="header">
            <h1>우편번호 찾기</h1>
            <button class="close" onclick="LayerPopup_type('close')"><img src="/images/btn/btn_close.png" alt="닫기"></button>
        </header>
        <article>
          <div class="ex_box">
            <p>찾고자하는 주소의 도로명 또는 건물명을 입력하세요.</p>
            <p class="ex">(예:중앙로, 오목로10길)</p>
          </div><!-- //gray_box -->
        </article>
        <form name="zipFrm" id="zipFrm" method="post" onsubmit="return false;">
        <div class="searchAddress1">
          <ul>
            <li>
              <strong>시/도</strong>
              <select name="sido" id="sido" style="width:160px;">
                <option selected="selected" value="">전체</option>
                <option value="강원도">강원도</option>
                <option value="경기도">경기도</option>
                <option value="경상남도">경상남도</option>
                <option value="경상북도">경상북도</option>
                <option value="광주광역시">광주광역시</option>
                <option value="대구광역시">대구광역시</option>
                <option value="대전광역시">대전광역시</option>
                <option value="부산광역시">부산광역시</option>
                <option value="서울특별시">서울특별시</option>
                <option value="세종특별자치시">세종특별자치시</option>
                <option value="울산광역시">울산광역시</option>
                <option value="인천광역시">인천광역시</option>
                <option value="전라남도">전라남도</option>
                <option value="전라북도">전라북도</option>
                <option value="제주특별자치도">제주특별자치도</option>
                <option value="충청남도">충청남도</option>
                <option value="충청북도">충청북도</option>
            </select>
            </li>
            <li>
              <strong>도로명</strong>
              <div class="bbs_searchbox">
                  <span class="inp"><input type="text" name="doro" id="doro" title="검색어 입력" value=""></span>
                  <button class="btn" onclick="searchDoro();"><img src="/images/btn/btn_search2.jpg" alt="검색"></button>
              </div>
            </li>
            <li><a href="http://www.juso.go.kr/openIndexPage.do" target="_blank" class="ch_add">바뀐주소 찾아보기 &gt;&gt;</a></li>
          </ul>
        </div>
        </form>

        <div class="searchAddress2"></div><!-- //inner -->
  </section><!-- //layerPopup -->

 <?php echo ACTION_IFRAME; ?>
<script src="/js/jquery.chkform.js"></script>
<script>
function editAddress(idx, nm, zip, addr1, addr2, email, tel, state) {
	$("#address").val(idx);
	$("#addr_name").val(nm);
	$("#addr_zip").val(zip);
	$("#addr_1").val(addr1);
	$("#addr_2").val(addr2);
	$("#addr_email").val(email);
	$("#addr_tel").val(tel);

	if (state == "Y") {
		$("input:checkbox[name='addr_state']").attr("checked", true);
		$(".check_listbox>label").attr("class", "on");
	}
	else {
		$("input:checkbox[name='addr_state']").attr("checked", false);
		$(".check_listbox>label").attr("class", "");
	}

}

function deleteAddress(address) {
	if (confirm("정말 삭제하시겠습니까?")) {
		$.ajax({
			type: "POST",
			url: "index.php",
			dataType:"json",
			data:{idx:address, at:"delete"},
			success:function(data) {
				if (data.cnt > 0) {
					location.reload();
				}
				else {
					alert("삭제를 실패했습니다.");
				}
			},
			error:function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			}
		});
	}
}

function searchDoro(){
	if ($("#doro").val() ==""){
		alert("도로명을 입력하세요.");
	}
	else {
		$.ajax({
			type: "POST",
			url: "index.php",
			dataType:"html",
			data:{"at":"address", "sido":$("#sido").val(), "doro":$("#doro").val()},
			success:function(data) {
				$(".searchAddress2").html(data);
			},
			error:function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			}
		});
	}
}

function setAddress(zip, addr1) {
	$("#addr_zip").val(zip);
	$("#addr_1").val(addr1);
	LayerPopup_type('close');
	$("#addr_2").focus();
}


function chkForm(f) {
	if (chkDefaultForm(f)) {
		f.target = "action_ifrm";
		f.submit();
	}
}


$(function(){
	$("#btnAddress").click(function(){
		chkForm(document.addrFrm);
	});
});
</script>
<?php
include(ROOT.'inc/footer.php');
include(ROOT.'inc/bot.php');
?>