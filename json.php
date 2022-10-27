<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src='xml2json.js'></script>
    <script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8da2a0e708f9b1d3b02ede8ffcba231d&libraries=clusterer"></script>


</head>

<body>
    <div id="map" style="width:100%;height:700px;"></div>

    <script>
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
        mapOption = {
            center: new kakao.maps.LatLng(35.17783190746764, 129.1672010536355), // 지도의 중심좌표
            level: 4, // 지도의 확대 레벨
            mapTypeId: kakao.maps.MapTypeId.ROADMAP // 지도종류
        };

    // 지도를 생성한다 
    var map = new kakao.maps.Map(mapContainer, mapOption);

    // 마커 클러스터러를 생성합니다 
    var clusterer = new kakao.maps.MarkerClusterer({
        map: map, // 마커들을 클러스터로 관리하고 표시할 지도 객체 
        averageCenter: true, // 클러스터에 포함된 마커들의 평균 위치를 클러스터 마커 위치로 설정 
        minLevel: 15 // 클러스터 할 최소 지도 레벨 
    });


    fetch(
            'https://api.childcare.go.kr/mediate/rest/cpmsapi030/cpmsapi030/request?key=f72049399f6c44d5a1fd737625441fa3&arcode=26350&stcode='
        )
        .then(response => response.text())
        .then(data => {
            var x2js = new X2JS();
            var jsonObj = x2js.xml_str2json(data);

            var markers = [];
            for (var i = 0; i < jsonObj['response']['item'].length; i++) {

                // 지도에 마커를 생성하고 표시한다
                var marker = new kakao.maps.Marker({
                    position: new kakao.maps.LatLng(jsonObj['response']['item'][i]['la'], jsonObj[
                        'response']['item'][i]['lo']), // 마커의 좌표
                    map: map // 마커를 표시할 지도 객체
                });

                // 인포윈도우를 생성합니다
                var infowindow = new kakao.maps.InfoWindow({
                    content: jsonObj['response']['item'][i]['crname']
                });

                // 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다

                markers.push(marker);
                kakao.maps.event.addListener(marker, 'mouseover', makeOverListener(map, marker, infowindow));
                kakao.maps.event.addListener(marker, 'mouseout', makeOutListener(infowindow));


            }





            // 클러스터러에 마커들을 추가합니다
            clusterer.addMarkers(markers);

            // 인포윈도우를 표시하는 클로저를 만드는 함수입니다 
            function makeOverListener(map, marker, infowindow) {
                return function() {
                    infowindow.open(map, marker);
                };
            }

            // 인포윈도우를 닫는 클로저를 만드는 함수입니다 
            function makeOutListener(infowindow) {
                return function() {
                    infowindow.close();
                };
            }



        })
    </script>



</body>

</html>