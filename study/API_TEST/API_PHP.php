<?php

$ch = curl_init();
$url = 'http://api.data.go.kr/openapi/tn_pubr_public_child_house_api'; /*URL*/
$queryParams = '?' . urlencode('serviceKey') . '=JkGgA4Nb73MgGPy9bNrJPLOjpvhW6R22p0UMW1WF8Ch2m8hW%2By0H37RWesIL4Bk3AkbEam3TNOeBn4V2X4H3sA%3D%3D'; /*Service Key*/
$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('100'); /**/
$queryParams .= '&' . urlencode('type') . '=' . urlencode('xml'); /**/
$queryParams .= '&' . urlencode('childHouseNm') . '=' . urlencode('노아키즈어린이집'); /**/
$queryParams .= '&' . urlencode('ctprvnNm') . '=' . urlencode('강원도'); /**/
$queryParams .= '&' . urlencode('signguNm') . '=' . urlencode('원주시'); /**/
$queryParams .= '&' . urlencode('childHouseType') . '=' . urlencode('가정'); /**/
$queryParams .= '&' . urlencode('psncpa') . '=' . urlencode('20'); /**/
$queryParams .= '&' . urlencode('nrtrSklstfCo') . '=' . urlencode('5'); /**/
$queryParams .= '&' . urlencode('rdnmadr') . '=' . urlencode('"강원도 원주시 시청로 496-1 101동 102호(관설동, 코아루아파트)"'); /**/
$queryParams .= '&' . urlencode('childHouseTelephoneNumber') . '=' . urlencode('033-742-1295'); /**/
$queryParams .= '&' . urlencode('childHouseFaxNumber') . '=' . urlencode(''); /**/
$queryParams .= '&' . urlencode('nrtrRoomCo') . '=' . urlencode('0'); /**/
$queryParams .= '&' . urlencode('playgroundCo') . '=' . urlencode('0'); /**/
$queryParams .= '&' . urlencode('cctvCo') . '=' . urlencode('0'); /**/
$queryParams .= '&' . urlencode('atndsklVhcleYn') . '=' . urlencode(' '); /**/
$queryParams .= '&' . urlencode('homepageUrl') . '=' . urlencode(''); /**/
$queryParams .= '&' . urlencode('referenceDate') . '=' . urlencode('2018-07-31'); /**/
$queryParams .= '&' . urlencode('insttCode') . '=' . urlencode('6420000'); /**/
$queryParams .= '&' . urlencode('insttNm') . '=' . urlencode(''); /**/

curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);

var_dump($response);


?>