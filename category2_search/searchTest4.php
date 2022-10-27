<input type="button" onclick="execDaumPostcode()" value="우편번호 찾기"><br>
<!-- <span>시군구코드:</span><input type="text" id="sigunguCode" placeholder="시군구코드"><br> -->

<script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8da2a0e708f9b1d3b02ede8ffcba231d&libraries=services"></script>
<script src='/xml2json.js'></script>

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
function execDaumPostcode() {
    new daum.Postcode({
        oncomplete: function(data) {

            // 우편번호와 주소 정보를 해당 필드에 넣는다.
            // document.getElementById('sigunguCode').value = data.sigunguCode;
            var sigunguCode = data.sigunguCode;



            var mapContainer = document.getElementById('map'), // 지도를 표시할 div
                mapOption = {
                    center: new daum.maps.LatLng(37.537187, 127.005476), // 지도의 중심좌표
                    level: 4 // 지도의 확대 레벨
                };

            //지도를 미리 생성
            var map = new kakao.maps.Map(mapContainer, mapOption);


            //주소-좌표 변환 객체를 생성
            var geocoder = new daum.maps.services.Geocoder();

            var url =
                'https://api.childcare.go.kr/mediate/rest/cpmsapi030/cpmsapi030/request?key=f72049399f6c44d5a1fd737625441fa3&arcode=';

            fetch(url + sigunguCode)
                .then(response => response.text())
                .then(data => {
                    var x2js = new X2JS();
                    var jsonObj = x2js.xml_str2json(data);

                    var markers = [];
                    for (var i = 0; i < jsonObj['response']['item'].length; i++) {

                        // 지도에 마커를 생성하고 표시한다
                        var marker = new kakao.maps.Marker({
                            position: new kakao.maps.LatLng(jsonObj['response']['item'][i][
                                'la'
                            ], jsonObj[
                                'response']['item'][i]['lo']), // 마커의 좌표
                            map: map // 마커를 표시할 지도 객체
                        });

                        // 인포윈도우를 생성합니다
                        var infowindow = new kakao.maps.InfoWindow({
                            position: new kakao.maps.LatLng(jsonObj['response']['item'][i][
                                'la'
                            ], jsonObj[
                                'response']['item'][i]['lo']),
                            content: jsonObj['response']['item'][i]['crname']

                        });

                        // 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다





                    }



                });
        }
    }).open();
}
</script>