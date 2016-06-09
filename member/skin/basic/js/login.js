function chkForm(f){
	if(chkDefaultForm(f) ){
		f.target = "action_ifrm";
		f.submit();
	}
}
$(function(){
	$("#btnLogin").click(function(){
		 chkForm(document.loginFrm);
	});
});

//fnClickCheck2(".inp");