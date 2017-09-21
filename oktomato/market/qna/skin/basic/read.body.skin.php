          <table summary="Q&A관리(Q&A관련 내용)">
		  <form name="memoForm" method="post" action="?at=update" onsubmit="return false;">
			<input type="hidden" name="mode" value="edit">
			<input type="hidden" name="idx" value="<?php echo $Qna->attr['qna_idx'];?>">
            <caption>Q&A관리</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">제목</th>
                <td><?php echo $Qna->attr['qna_title']; ?></td>
              </tr>
			  <tr>
                <th scope="row">문의 유형</th>
                <td><?php echo $Qna->attr['secret_status']; ?></td>
              </tr>
			  <tr>
                <th scope="row">이름</th>
                <td><?php echo $Qna->attr['qna_user_name']; ?></td>
              </tr>
			  <tr>
                <th scope="row">등록일</th>
                <td ><?php echo $Qna->attr['create_date']; ?></td>
              </tr>
			  <tr>
                <th scope="row">요청작품명</th>
                <td ><span class="font_blue_color">작품명 처리예정</span> (작가명)<br>
                </td>
              </tr>
              <tr>
                <th scope="row">답변 요청방법</th>
                <td ><?php echo $Qna->attr['how_to_request']; ?></td>
              </tr>
              <tr>
                <th scope="row">전화번호</th>
                <td ><?php echo $Qna->attr['qna_user_tel']; ?></td>
              </tr>
              <tr>
                <th scope="row">이메일</th>
                <td ><?php echo $Qna->attr['qna_user_email']; ?></td>
              </tr>
              <tr>
                <th scope="row">내용</th>
                <td ><?php echo nl2br($Qna->attr['qna_user_content']); ?></td>
              </tr>
              <tr>
                <th scope="row">답변입력</th>
                <td >
					<div class="textarea">
                      <textarea name="memo" rows="5" cols="60" ><?php echo $Qna->attr['qna_amdin_memo']; ?></textarea>
                    </div>
                </td>
              </tr>
              <tr>
                <th scope="row">상태</th>
                <td >
					<div class="lst_check radio">
                      <span>
                        <label for="frame1">답변요청</label>
                        <input type="radio" name="frame" id="frame1" <?php echo $request_status_on;?>>
                      </span>
                      <span>
                        <label for="frame2">답변완료</label>
                        <input type="radio" name="frame" id="frame2" <?php echo $request_status_off;?>>
                      </span>
                    </div>
                </td>
              </tr>
            </tbody>
		  </form>
          </table>