<?php
if (!defined('OKTOMATO')) exit;

require($_SERVER['DOCUMENT_ROOT'].'lib/class/address/XMLparse.php');

$sido = isset($_POST['sido']) ? Xss::chkXSS($_POST['sido']) : '';
$doro = isset($_POST['doro']) ? Xss::chkXSS($_POST['doro']) : '';
$Cnt = 0;


// 시/도 선택
$GET_URL = WS_URL . '?sd=' . urlencode($sido);
// 시/군/구
//$GET_URL .= '&sg=' . urlencode("금천구");
$GET_URL .= '&sg=';
// 결과형식
$GET_URL .= '&r=x';
// 인코딩
$GET_URL .= '&enc=utf-8';
// 검색어 (도로명/동/리/건물명)
$GET_URL .= '&k=' . urlencode($doro);
// 결과에 도로명 주소 포함여부
$GET_URL .= '&dr=t';
// 결과에 지번주소 포함 여부
$GET_URL .= '&jb=f';
// 결과에 도로명 영문주소 포함 여부
$GET_URL .= '&de=f';
// 결과에 대량배달/건물명 포함여부
$GET_URL .= '&bn=t';
// 결과에서 건물번호/지번 정보 제외
$GET_URL .= '&sp=t';
// 회원 인증키
// 회원 전용 사이트 -> 회원 정보 관리 -> "API 인증키" 사용
$GET_URL .= '&key='.DORO_KEY;
// 캐쉬가 안되도록 하기 위한 타임스탬프값 (캐쉬 방지 용으로 실제 사용하지는 않는 값입니다.)
$GET_URL .= '&ts=' . time();


$url = $GET_URL;
$info = parse_url($url);
$host = $info['host'];
$port = $info['port'];

if ($port == 0) $port = 80;

$path = $info['path'];

if ($info['query'] !== '') $path .='?'.$info['query'];

$out = "GET $path HTTP/1.0\r\nHost: $host\r\n\r\n";

$fp = fsockopen($host, $port, $errno, $errstr, 30);

if (!$fp) {
	echo "$errstr ($errno) <br>\n";
}
else {
	fputs($fp, $out);
	$start = false;
	$retVal = '';

	while(!feof($fp)) {
		$tmp = fgets($fp, 1024);
		if ($start === true) $retVal .=$tmp;
		if ($tmp === "\r\n") $start = true;
	}
	fclose($fp);

}

//$xml = file_get_contents($GET_URL);
$xml = ($retVal);

$parser = new XMLParser($xml);
$parser->Parse();

$doc_el = $parser->document;

// result : 처리 성공="True", 처리 실패="False"
$Result = $doc_el->result[0]->tagData;
// message : 처리 실패인 경우 에러 메시지
$Message = $doc_el->message[0]->tagData;

//echo ("처리 결과 : " . $Result . "<br />");
//echo ("메시지 : " . $Message . "<br />");


if ($Result === 'True')
{
    // count : 처리 성공인 경우 검색된 주소 카운트
    $Cnt = $doc_el->count[0]->tagData;
}
?>

          <p class="total">검색결과 : <strong><?php echo $Cnt;?></strong>건</p>
          <div class="addbox">
            <table summary="우편번호 찾기 검색결과 입니다.">
              <caption>우편번호 찾기 검색결과</caption>
              <colgroup>
                <col width="95">
                <col>
              </colgroup>
              <thead>
                  <tr>
                    <th scope="col">우편번호</th>
                    <th scope="col">주소</th>
                  </tr>
              </thead>
              <tbody>
<?php
if ($Result === 'True')
{
	foreach($doc_el->data[0]->item as $item)
	{
?>
                  <tr>
                    <td class="ta-c"><a href="javascript:;" onclick="setAddress('<?php echo $item->zipno[0]->tagData;?>', '<?php echo $item->doro[0]->tagData;?>');"><?php echo $item->zipno[0]->tagData;?></a></td>
                    <td><a href="javascript:;" onclick="setAddress('<?php echo $item->zipno[0]->tagData;?>', '<?php echo $item->doro[0]->tagData;?>');"><?php echo $item->doro[0]->tagData;?></a></td>
                  </tr>
<?php
	}
}
else
{
?>
                  <tr>
                    <td colspan="2" align="center">검색된 자료가 없습니다.</td>
                  </tr>
<?php
}
?>

              </tbody>
            </table>
          </div><!-- //addbox -->
        </div><!-- //searchAddress2 -->