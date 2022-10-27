<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>다음 지도 API</title>
</head>

<body>
    <div id="map" style="width:1000px;height:500px;"></div>

    <script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8da2a0e708f9b1d3b02ede8ffcba231d"></script>
    <script>
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
        mapOption = {
            center: new kakao.maps.LatLng(37.59200, 127.12283), // 지도의 중심좌표
            level: 9, // 지도의 확대 레벨
            mapTypeId: kakao.maps.MapTypeId.ROADMAP // 지도종류
        };

    // 지도를 생성한다 
    var map = new kakao.maps.Map(mapContainer, mapOption);

    // 지도에 마커를 생성하고 표시한다
    var marker = new kakao.maps.Marker({
        position: new kakao.maps.LatLng(37.56682, 126.97865), // 마커의 좌표
        map: map // 마커를 표시할 지도 객체
    });
    </script>
</body>

</html>