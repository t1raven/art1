<?
if ($pageNum == "1"){
  $depth1 = "회원";
}else if($pageNum == "2"){
  $depth1 = "회원";
}else if($pageNum == "3"){
  $depth1 = "학술대회";
}else if($pageNum == "4"){
 $depth1 = "간행물";
}else if($pageNum == "5"){
 $depth1 = "논문심사";
}else if($pageNum == "6"){
 $depth1 = "컨텐츠";
}else if($pageNum == "7"){
 $depth1 = "메일";
}else if($pageNum == "8"){
 $depth1 = "특집접수";
}


function goUrl($num){

  switch ($num) {
	case 0101: 
      $go_link = "/member/dashboard.php"; //대시보드
    break; 
    case 0102: 
      $go_link = "/member/member_list1.php"; //회원목록
    break; 
    case 0103: 
      $go_link = "/member/member_list2.php"; //회원명부
    break; 
    case 0104: 
      $go_link = "/member/committee.php"; //제위원회 관리
    break; 
    case 0105: 
      $go_link = "/member/group_member.php"; //단체회원 
    break;
	case 0106: 
      $go_link = "/member/member_statistic.php"; //회원통계 
    break; 
    case 0107: 
      $go_link = "/member/setting.php"; //환경설정 
    break; 
    case 0108: 
      $go_link = "/member/join.php";  //회원가입
    break;

	case 0201: 
      $go_link = "/accountant/dashboard.php"; //대시보드
    break; 
    case 0202: 
      $go_link = "/accountant/annualfee.php"; //연회비세팅
    break; 
    case 0203: 
      $go_link = "/accountant/rally.php"; //학술대회비 관리
    break; 
    case 0204: 
      $go_link = "/accountant/thesis.php"; //눈문심사료 관리
    break; 
    case 0205: 
      $go_link = "/accountant/etc.php"; //기타회비 관리
    break;
	case 0206: 
      $go_link = "/accountant/bankbook.php"; //무통장입금 계좌
    break; 

    case 0301: 
      $go_link = "/research/dashboard.php"; 
    break; 
    case 0302: 
      $go_link = "/research/conferences.php"; 
    break; 
    case 0303: 
      $go_link = "/research/rally.php"; 
    break; 
    case 0304: 
      $go_link = "/research/participant.php"; 
    break; 
    case 0305: 
      $go_link = "/research/abstract.php"; 
    break;
	case 0306: 
      $go_link = "/research/exhibition.php"; 
    break;

    case 0701: 
      $go_link = "/mail/smsauto.php"; 
    break; 
    case 0702: 
      $go_link = "/mail/smssend.php"; 
    break; 
    case 0703: 
      $go_link = "/mail/mailsend.php"; 
    break; 


  } 

  return $go_link; 

}

?>

