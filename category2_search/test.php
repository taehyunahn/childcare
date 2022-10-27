<input type="text" id="sample5_address" placeholder="주소">
<input type="button" onclick="sample5_execDaumPostcode()" value="주소 검색"><br>
<div id="map" style="width:100%;height:1000px;margin-top:10px;display:none"></div>

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8da2a0e708f9b1d3b02ede8ffcba231d&libraries=services"></script>
<script src='/xml2json.js'></script>

<script>
var mapContainer = document.getElementById('map'), // 지도를 표시할 div
    mapOption = {
        center: new daum.maps.LatLng(37.537187, 127.005476), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };

//지도를 미리 생성
var map = new daum.maps.Map(mapContainer, mapOption);
//주소-좌표 변환 객체를 생성
var geocoder = new daum.maps.services.Geocoder();
//마커를 미리 생성
// var marker = new daum.maps.Marker({
//     position: new daum.maps.LatLng(37.537187, 127.005476),
//     map: map
// });


function sample5_execDaumPostcode() {
    new daum.Postcode({
        oncomplete: function(data) {
            var addr = data.address; // 최종 주소 변수

            // 주소 정보를 해당 필드에 넣는다.
            document.getElementById("sample5_address").value = addr;
            // 주소로 상세 정보를 검색
            geocoder.addressSearch(data.address, function(results, status) {
                // 정상적으로 검색이 완료됐으면
                if (status === daum.maps.services.Status.OK) {

                    var result = results[0]; //첫번째 결과의 값을 활용

                    // 해당 주소에 대한 좌표를 받아서
                    var coords = new daum.maps.LatLng(result.y, result.x);
                    // 지도를 보여준다.
                    mapContainer.style.display = "block";
                    map.relayout();
                    // 지도 중심을 변경한다.
                    map.setCenter(coords);
                    // 마커를 결과값으로 받은 위치로 옮긴다.
                    // marker.setPosition(coords)
                }
            });

            console.log(data.address);
            console.log(data.sigungu);
            console.log(data.sigunguCode);


            var url =
                'https://api.childcare.go.kr/mediate/rest/cpmsapi030/cpmsapi030/request?key=f72049399f6c44d5a1fd737625441fa3&arcode=';
            var sigunguCode = data.sigunguCode;
            var address = data.address;

            fetch(url + sigunguCode)
                .then(response => response.text())
                .then(data => {
                    var x2js = new X2JS();
                    var jsonObj = x2js.xml_str2json(data);

                    console.log(jsonObj);
                    console.log(jsonObj['response']['item'][1]['crname']);
                    console.log(jsonObj['response']['item'][1]['la']);
                    console.log(jsonObj['response']['item'][1]['lo']);
                    console.log(jsonObj['response']['item'].length);



                    for (var i = 0; i < jsonObj['response']['item'].length; i++) {
                        displayMarker(jsonObj['response']['item'][i]);

                    }


                    // 주소로 상세 정보를 검색
                    geocoder.addressSearch(address, function(results, status) {
                        // 정상적으로 검색이 완료됐으면
                        if (status === daum.maps.services.Status.OK) {

                            var result = results[0]; //첫번째 결과의 값을 활용

                            // 해당 주소에 대한 좌표를 받아서
                            var coords = new daum.maps.LatLng(result.y, result.x);
                            // 지도를 보여준다.
                            mapContainer.style.display = "block";
                            map.relayout();
                            // 지도 중심을 변경한다.
                            map.setCenter(coords);
                            // 마커를 결과값으로 받은 위치로 옮긴다.
                            // marker.setPosition(coords)
                        }
                    });






                });

        }
    }).open();
}


// 지도에 마커를 표시하는 함수입니다
function displayMarker(place) {

    // 마커를 생성하고 지도에 표시합니다
    var marker = new kakao.maps.Marker({
        map: map,
        position: new kakao.maps.LatLng(place['la'], place['lo'])
    });

    // 인포윈도우를 생성합니다
    var infowindow = new kakao.maps.InfoWindow({
        content: '<div>' + place['crname'] + '</div>'
    });

    infowindow.open(map, marker);

    // 마커에 클릭 이벤트를 등록한다 (우클릭 : rightclick)
    kakao.maps.event.addListener(marker, 'click', function() {
        alert('마커를 클릭했습니다!');
    });

}
</script>