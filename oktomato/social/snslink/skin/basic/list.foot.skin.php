                  </tbody>
                </table>
              </div><!-- //lst_table3 -->
            <div class="bot_align">
              <div class="btn_right">
              <button type="button" id="btnSave"  class="btn_pack1 ov-b small rato">Save</button>
            </div>
          </div>
          </section><!--// section_box -->
          </form>
    </article>
   </div>
</section>
<?php echo ACTION_IFRAME;?>

<script>
function chkForm(f){
  if(chkDefaultForm(f) ){
    alert(chkDefaultForm(f));
    //f.target = "action_ifrm";
    f.submit();
  }
}

$("#btnSave").click(function(){
  //chkForm(document.fomnews);
  document.fomnews.submit();
});
</script>
<?php include('../../inc/bot.php'); ?>