<script>
var xhr = new XMLHttpRequest();
var url = 'http://api.data.go.kr/openapi/tn_pubr_public_child_house_api'; /*URL*/
var queryParams = '?' + encodeURIComponent('serviceKey') + '=' +
    'JkGgA4Nb73MgGPy9bNrJPLOjpvhW6R22p0UMW1WF8Ch2m8hW%2By0H37RWesIL4Bk3AkbEam3TNOeBn4V2X4H3sA%3D%3D'; /*Service Key*/
queryParams += '&' + encodeURIComponent('pageNo') + '=' + encodeURIComponent('1'); /**/
queryParams += '&' + encodeURIComponent('numOfRows') + '=' + encodeURIComponent('100'); /**/
queryParams += '&' + encodeURIComponent('type') + '=' + encodeURIComponent('xml'); /**/
queryParams += '&' + encodeURIComponent('childHouseNm') + '=' + encodeURIComponent('노아키즈어린이집'); /**/
queryParams += '&' + encodeURIComponent('ctprvnNm') + '=' + encodeURIComponent('강원도'); /**/
queryParams += '&' + encodeURIComponent('signguNm') + '=' + encodeURIComponent('원주시'); /**/
queryParams += '&' + encodeURIComponent('childHouseType') + '=' + encodeURIComponent('가정'); /**/
queryParams += '&' + encodeURIComponent('psncpa') + '=' + encodeURIComponent('20'); /**/
queryParams += '&' + encodeURIComponent('nrtrSklstfCo') + '=' + encodeURIComponent('5'); /**/
queryParams += '&' + encodeURIComponent('rdnmadr') + '=' + encodeURIComponent(
    '"강원도 원주시 시청로 496-1 101동 102호(관설동, 코아루아파트)"'); /**/
queryParams += '&' + encodeURIComponent('childHouseTelephoneNumber') + '=' + encodeURIComponent('033-742-1295'); /**/
queryParams += '&' + encodeURIComponent('childHouseFaxNumber') + '=' + encodeURIComponent(''); /**/
queryParams += '&' + encodeURIComponent('nrtrRoomCo') + '=' + encodeURIComponent('0'); /**/
queryParams += '&' + encodeURIComponent('playgroundCo') + '=' + encodeURIComponent('0'); /**/
queryParams += '&' + encodeURIComponent('cctvCo') + '=' + encodeURIComponent('0'); /**/
queryParams += '&' + encodeURIComponent('atndsklVhcleYn') + '=' + encodeURIComponent(' '); /**/
queryParams += '&' + encodeURIComponent('homepageUrl') + '=' + encodeURIComponent(''); /**/
queryParams += '&' + encodeURIComponent('referenceDate') + '=' + encodeURIComponent('2018-07-31'); /**/
queryParams += '&' + encodeURIComponent('insttCode') + '=' + encodeURIComponent('6420000'); /**/
queryParams += '&' + encodeURIComponent('insttNm') + '=' + encodeURIComponent(''); /**/
xhr.open('GET', url + queryParams);
xhr.onreadystatechange = function() {
    if (this.readyState == 4) {
        alert('Status: ' + this.status + 'nHeaders: ' + JSON.stringify(this.getAllResponseHeaders()) + 'nBody: ' +
            this.responseText);
    }
};

xhr.send('');
</script>