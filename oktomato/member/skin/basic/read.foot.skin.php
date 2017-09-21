            </tbody>
          </table>
        </div> <!-- 검색결과리스트_게시판_끝 -->

        <!-- 검색결과리스트_페이징처리_시작 -->
        <div class="bot_align">
          <?=$pageUtil->attr[pageHtml]?> <!-- 검색결과리스트_페이징처리_끝 -->

          <div class="btn_right">
            <button class="btn_pack1 ov-b small rato"  id="btnSave">Register</button>
			<button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b gray small rato">Send E-mail</button>
            <!-- button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b gray small rato">Delete All</button -->
            <div class="space5"></div>

            <!-- button onClick="alert('준비중입니다.');" class="btn_pack1_b_type ov-b small rato">Send E-mail</button -->
          </div>
          
          <div class="space100"></div>


        </div>  
      </section> <!-- //lst_table2 -->
      
      
     </article> <!-- content -->
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

 <script type="text/javascript">

 $(function(){
    $("button.btn_switch").click(function(){
        var text = $(this).text();
        $(this).text((text == "AND") ? "OR":"AND");
        //$("#anor").val($(this).text());
    });
    LabelHidden(".inp_txt.lh");
    bbsCheckbox();
    checkListMotion();

})


function chkForm(f){
	if(chkDefaultForm(f) ){
		//f.target = "action_ifrm";
		f.submit();
	}
}
$(function(){
	$("#btnSave").click(function(){
		chkForm(document.joinFrm);
	});
});
</script>

<? include "../inc/bot.php"; ?>