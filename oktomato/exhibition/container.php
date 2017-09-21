<tr id="bbs_img_container">
	<th>파일첨부11</td>
	<td class="content_file">
		<table border="10" cellspacing="0" cellpadding="0" class="upload_tab">
			<tr>
				<td class="file_content">
					<table border="0" cellspacing="0" cellpadding="0" class="upload_tab2">
						<tr>
							<td class="file_content3" valign="bottom"><img src="/images/container/container_preview.gif" width="128" height="97" border="0" id="bbs_img"></td>
						</tr>
					</table>
				</td>
				<td class="file_content2">
					<!-- 테이블 시작 -->
					<div class="upload_div">
						<table border="0" cellspacing="0" cellpadding="0" class="upload_tab3">
							<tr>
								<td class="file_content4"><a onclick="bbsAttachFile();" style="cursor:pointer;"><img src="/images/container/but_sfile.gif" width="63" height="20" border="0" alt="파일첨부"></a> <a onclick="allDelFileList();" style="cursor:pointer;"><img src="/images/container/but_delall.gif" width="63" height="20" border="0" alt="전체삭제"></a></td>
								<td class="file_content5"><span class="text">파일: </span><span id="nowMB" class="text2">0MB</span><span class="text">/<?=$BBS_UPLOAD_SIZE;?> MB</span></td>
						  </tr>
						 </table>
					</div>
					<table border="1" cellspacing="0" cellpadding="0" class="upload_tab4">
						<tr>
							<td width="98%" height="75" class="file_content6">
								<div class="upload_div2">
									<table width="100%" border="0" cellspacing="0" cellpadding="0" class="upload_tab5" id="up_file_tbl" name="up_file_tbl"></table>
								</div>
								<table width="100%" border="0" cellspacing="0" cellpadding="0" style="display:none;">
									<tr>
										<td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0" >
												<tr>
													<td>
														
														<select size="7" multiple  name="file_list[]" id="file_list" style="width:500px;display:block;">
														<?php foreach($aFileInfo as $fileInfo): ?>
															<option value="<?=$fileInfo['exh_upfile_idx'];?>|<?=$fileInfo['ori_file_name'];?>|<?=$fileInfo['up_file_name'];?>|<?=$fileInfo['file_size'];?>|<?=$fileInfo['file_type'];?>"><?=$fileInfo['ori_file_name'];?> (<?=($fileInfo['file_size'] / 1024);?> KB)</option>
														<?php endforeach; ?>
														</select>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- 테이블 시작 -->
				</td>
			</tr>
		</table>
	</td>
</tr>




<script type="text/javascript">
<!--

function strCut2(val, bytes){

	var return_str = '';
	var tmp_chr = null;
	var len = 0;
	var i;
	//alert(val);
	if (val != "")
	{
		for (i = 0; i < val.length; i++)
		{
			tmp_chr = val.charAt(i);

			if (escape(tmp_chr).length > 4)
			{
				len += 2;
			}
			else
			{
				len += 1;
			}

			if (bytes >= len)
			{
				return_str += tmp_chr;
			}
			else
			{
				return return_str + "..";
			}

		}
	}

	return return_str;
}

	function sbar (st) {
		$(st).css("backgroundColor", "#EFEFEF").find("img").css("display", "block");
	}

	function cbar (st) {
		$(st).css("backgroundColor", "").find("img").css("display", "none");
	}

	function deleteTr(n){
		$($("#file_list option:eq("+n+")")).attr("selected", true);
		if (DelFileList())
		{
			$("#up_file_tbl tr").remove();
			uploadFileSize();
			uploadedFileTableInsert();
		}
	}

	function uploadFileSize(){
		var now_size = 0;

		$("#file_list option").each(function(){
			now_size += parseInt(this.value.split("|")[3]);
		});

		$("#nowMB").html((now_size/1024/1024).toFixed(2) + " MB");
		$("#max_size").val(now_size);
	}

	function uploadedFileTableRemove(){
		$("#up_file_tbl tr").remove();
	}

	function uploadedFileTableInsert(){

		$("#file_list option").each(function(n){
			var tmp = this.value.split("|"); //cu_idx|ori_filename|up_filename|file_size|file_type(1:이미지 2:일반)	;
			$($("#up_file_tbl").append("<tr></tr>"));
			$("#up_file_tbl tr:eq("+n+")")
				.append($("<td class=\"file_content7\"></td>").html("<a onclick=\"bbsImgChange(\'"+tmp[0]+"|"+tmp[2]+"|"+tmp[4]+"\');\" style=\"cursor:pointer;\">"+strCut2(tmp[1], 45) + "</a> ("+parseInt(tmp[3]/1024) +" KB)"))
				.append($("<td class=\"file_content7\"></td>").html("<img src=\"/images/container/but_del.gif\" onclick=\"deleteTr(\'"+n+"\');\" style=\"cursor:pointer;display:none;\">").attr("align", "right"))
				.mouseover(function(){
					sbar(this);
				})
				.mouseout(function(){
					cbar(this);
				});
		});
	}

	function allDelFileList(){
		$("#file_list option").attr("selected", true);

		if (DelFileList())
		{
			uploadedFileTableRemove();
			$("#file_list option").remove();
		}

		uploadFileSize();
	}

	function DelFileList(){
alert("DelFileList");
		if (parseInt($("#file_list :selected").size()) <= 0)
		{
			alert('삭제할 파일이 없습니다.');
			return;
		}

		if (confirm('파일을 삭제하면 본문에서도 삭제됩니다.'))
		{
			$("#file_list :selected").each(function(n){

				<?php if ($BBS_KIND == 'gallery' || $BBS_KIND == 'event'): ?>
				/****  이미지 게시판용 예외처리  ****/
				var list_file_idx = -1;
				var this_file_idx = $("#file_list option").index($(this)); //선택된 파일의 파일리스트중 인덱스값

				$("#file_list option").each(function(n){

					if ((this.value.split("|")[4] == 1 || this.value.split("|")[4] == 3) && list_file_idx == -1 && $("#bbs_list_img_init").val() == "0")
					{
						list_file_idx = n;
					}
				});

				if (list_file_idx == this_file_idx)
				{
					$("#bbs_list_img_init").val("1"); //처리페이지에서 썸네일 재생성 요청값
				}
				/****  이미지 게시판용 예외처리 끝 ****/
				<?php endif;?>

				var tmp = this.value.split("|"); //cu_idx|ori_filename|up_filename|file_size
				var this_idx = tmp[0];
				var o_file = tmp[1];
				var u_file = tmp[2];
				var types = tmp[4];
				var target_img = "";

alert("this_idx :"+this_idx);
				if (this_idx == 0)
				{
					target_img = "/upload/temp/" + u_file;
				}
				else
				{
					target_img = "/upload/bbs/" + u_file;
				}

				if (types == 1) //본문에 들어간 이미지
				{
					var target_start = oEditors.getById["content"].getIR().indexOf(target_img);
					var target_befor = oEditors.getById["content"].getIR().lastIndexOf('<', target_start);
					target_befor = oEditors.getById["content"].getIR().lastIndexOf('<', target_befor - 1);
					var target_after = oEditors.getById["content"].getIR().indexOf('>', target_start);
					target_after = oEditors.getById["content"].getIR().indexOf('>', target_after + 1);
					var target_html = oEditors.getById["content"].getIR().substring(target_befor, target_after+1);
					oEditors.getById["content"].setIR(oEditors.getById["content"].getIR().replace(target_html, ""));
				}
				else if (types == 4)//본문에 들어간 동영상 플레이어
				{
					var target_start = oEditors.getById["content"].getIR().indexOf(target_img);
					var target_befor = oEditors.getById["content"].getIR().lastIndexOf('<EMBED id=tomato_player', target_start);
					var target_after = oEditors.getById["content"].getIR().indexOf('>', target_start);
					var target_html = oEditors.getById["content"].getIR().substring(target_befor, target_after+1);
					oEditors.getById["content"].setIR(oEditors.getById["content"].getIR().replace(target_html, ""));
				}

alert("this_idx : "+this_idx);
				if (this_idx > 0)
				{
					
					$.ajax({
						type:"POST",
						//url: "/bbs/__file_delete.php",
						url: "/oktomato/exhibition/__file_delete.php",
						dataType: "JSON",
						//data: {"filename":u_file},
						data: {"idx":$("#idx").val(), "code":$("#code").val(), "file_idx":this_idx},
						asyc: true,
						success: function(data){
							alert("idx : "+$("#idx").val() );
							if (data.result == "__complete")
							{
								alert('삭제!');
							}
						},
						error: function(xhr, status, error){
							alert('서버응답 오류' + xhr.responseText);
						}
					});
				}

				bbsNoimg('/images/container/container_preview.gif');

			}).remove();
			return true;
		}

		return;
	}

	function bbsImgChange(img_src){
		//cu_idx|ori_filename|file_type
		var ext =  img_src.split("|")[1].split(".")[1].toUpperCase(); //파일 확장자
		var exts = "JPGE,BMP,GIF,PNG";

		if (img_src != "")
		{
			if (exts.indexOf(ext) >= 0)
			{
				if (img_src.split("|")[0] == 0)
				{
					$("#bbs_img").attr("src", '/upload/temp/'+img_src.split("|")[1]);
				}
				else
				{
					//alert(img_src.split("|")[2]);
					if (img_src.split("|")[2] == 1) //내용에 들어간 이미지
					{
						$("#bbs_img").attr("src", '/upload/bbs/'+img_src.split("|")[1]);
					}
					else if (img_src.split("|")[2] == 3 || img_src.split("|")[2] == 6) //동영상용 리스트 이미지
					{
						$("#bbs_img").attr("src", '/upload/bbs/listImg/'+img_src.split("|")[1]);
					}
					else
					{
						$("#bbs_img").attr("src", '/upload/bbs/append_file/'+img_src.split("|")[1]);
					}
				}
			}
			else
			{
				$("#bbs_img").attr("src", '/images/container/container_etc.gif');
			}
		}

	}

	function bbsNoimg(img_src){
		$("#bbs_img").attr("src", img_src);
	}

	function bbsAttachFile(){
		window.open("/editor/photo_uploader/popup/file_uploader.html", "AttachFile", "left=0,top=0,width=403,height=359,scrollbars=yes,location=no,status=0,resizable=no");
	}

	$(function(){
		uploadFileSize();
		uploadedFileTableInsert();
	});

//-->
</script>