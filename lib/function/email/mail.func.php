<?php
// 메일 보내기 (파일 여러개 첨부 가능)
// type : text=0, html=1, text+html=2
function mailer($fname, $fmail, $to, $subject, $content, $type=0, $file='', $cc='', $bcc='', $charset='utf-8')
{
    $fname   = "=?$charset?B?" . base64_encode($fname) . "?=";
    $subject = "=?$charset?B?" . base64_encode($subject) . "?=";

    $header  = "Return-Path: <$fmail>\n";
    $header .= "From: $fname <$fmail>\n";
    $header .= "Reply-To: <$fmail>\n";
    if ($cc)  $header .= "Cc: $cc\n";
    if ($bcc) $header .= "Bcc: $bcc\n";
    $header .= "MIME-Version: 1.0\n";
    $header .= "X-Mailer: Mailer 1.00 (oktomato.net) : $_SERVER[SERVER_ADDR] : $_SERVER[REMOTE_ADDR] : $_SERVER[PHP_SELF] : $_SERVER[HTTP_REFERER] \n";

    if ($file !== '') {
        $boundary = uniqid("http://www.oktomato.net/");
        $header .= "Content-type: MULTIPART/MIXED; BOUNDARY=\"$boundary\"\n\n";
        $header .= "--$boundary\n";
    }

    if ($type) {
        $header .= "Content-Type: TEXT/HTML; charset=$charset\n";
        if ($type === 2)
            $content = nl2br($content);
    } else {
        $header .= "Content-Type: TEXT/PLAIN; charset=$charset\n";
        $content = stripslashes($content);
    }
    $header .= "Content-Transfer-Encoding: BASE64\n\n";
    $header .= chunk_split(base64_encode($content)) . "\n";

    if ($file !== '') {
        foreach ($file as $f) {
            $header .= "\n--$boundary\n";
            $header .= "Content-Type: APPLICATION/OCTET-STREAM; name=\"$f[name]\"\n";
            $header .= "Content-Transfer-Encoding: BASE64\n";
            $header .= "Content-Disposition: inline; filename=\"$f[name]\"\n";
            $header .= "\n";
            $header .= chunk_split(base64_encode($f[data]));
            $header .= "\n";
        }
        $header .= "--$boundary--\n";
    }

	if (mail($to, $subject, '', $header)) {
		return true;
	}
	else {
		return false;
	}
}

// 파일을 첨부함
function attach_file($filename, $file)
{
    $fp = fopen($file, "r");
    $tmpfile = array(
        "name" => $filename,
        "data" => fread($fp, filesize($file)));
    fclose($fp);
    return $tmpfile;
}