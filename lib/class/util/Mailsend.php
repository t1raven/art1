<?
class Mailsend
{
	//상담관리 등에서 등록한 글에 대한 메일을 받을 관리자 정보를 가져온다.
	static public function getAdminMail($dbh) { 
		try {
			$sql = 'SELECT receive_email1, receive_email1_state, receive_email2, receive_email2_state FROM site_info WHERE member_idx = \'000001\' ';
			$stmt = $dbh->prepare($sql);

			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				if ($row['receive_email1_state']=='Y'){
					$mailto = $row['receive_email1'];
				}
				if ($row['receive_email2_state']=='Y'){
					if (!empty($mailto)){
						$mailto = $mailto .';'. $row['receive_email2'];
					}else{
						$mailto = $row['receive_email2'];
					}
				}

				return $mailto;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	//메일 전송
	static public function sendMail($EMAIL, $NAME, $mailto, $SUBJECT, $CONTENT){
		//exit;
		//$EMAIL : 답장받을 메일주소
		  //$NAME : 보낸이
		  //$mailto : 보낼 메일주소
		  //$SUBJECT : 메일 제목
		  //$CONTENT : 메일 내용
		  $admin_email = $EMAIL;
		  $admin_name = $NAME;

//echo $admin_email		.'<br>' ; 
//		  exit;

		  $header = "Return-Path: ".$admin_email."\n";
		  //$header .= "From: =?EUC-KR?B?".base64_encode($admin_name)."?= <".$admin_email."> \n";
		  $header .= "From: =?UTF-8?B?".base64_encode($admin_name)."?= <".$admin_email."> \n";
		  $header .= "MIME-Version: 1.0\n";
		  $header .= "X-Priority: 3\n";
		  $header .= "X-MSMail-Priority: Normal\n";
		  $header .= "X-Mailer: FormMailer\n";
		  $header .= "Content-Transfer-Encoding: base64\n";
		  //$header .= "Content-Type: text/html;\n \tcharset=euc-kr\n";
		  $header .= "Content-Type: text/html;\n \tcharset=UTF-8\n";

		  //$subject = "=?EUC-KR?B?".base64_encode($SUBJECT)."?=\n";
		  $subject .= "=?UTF-8?B?".base64_encode($SUBJECT)."?="."\r\n"; 
		  $contents = $CONTENT;

		  $message = base64_encode($contents);
		  flush();
		  return mail($mailto, $subject, $message, $header);
	}

	//관리자 정보를 설정 받아서 메일 전송 함수 호출
	static public function getAdminMailSend($dbh, $SUBJECT, $CONTENT){
		try {
			//$EMAIL= 'steplyt@gmail.com'; 
			$EMAIL= 'art1@mt.co.kr'; 
			$NAME='art1.com' ;

			$arrmailto = self::getAdminMail($dbh);
			$arr_mailto = explode ( ';' , $arrmailto);
			foreach($arr_mailto as $mailto) {
				
				//echo $mailto ;
				//	exit;
				$email_result =  self::sendMail($EMAIL, $NAME, $mailto, $SUBJECT, $CONTENT);

			}
		}catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	
	}
}
?>