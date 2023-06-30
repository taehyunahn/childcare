<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>다음 지도 API</title>
</head>

<body>
    <div id="map" style="width:100%;height:700px;"></div>

    <script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8da2a0e708f9b1d3b02ede8ffcba231d"></script>
    <script>
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
        mapOption = {
            center: new kakao.maps.LatLng(35.17783190746764, 129.1672010536355), // 지도의 중심좌표
            level: 4, // 지도의 확대 레벨
            mapTypeId: kakao.maps.MapTypeId.ROADMAP // 지도종류
        };

    // 지도를 생성한다 
    var map = new kakao.maps.Map(mapContainer, mapOption);

    var 데이터 = [
        [35.17783190746764, 129.1672010536355, '<div style="padding: 5px">경남아너스빌</div>'],
        [35.178147605457134, 129.1690142269421, '<div style="padding: 5px">해운대도서관</div>'],
        [35.17543782447842, 129.16684700204306, '<div style="padding: 5px">양운중학교</div>']
    ];

    for (var i = 0; i < 데이터.length; i++) {

        // 지도에 마커를 생성하고 표시한다
        var marker = new kakao.maps.Marker({
            position: new kakao.maps.LatLng(데이터[i][0], 데이터[i][1]), // 마커의 좌표
            map: map // 마커를 표시할 지도 객체
        });

        // 인포윈도우를 생성합니다
        var infowindow = new kakao.maps.InfoWindow({
            content: 데이터[i][2]
        });

        // 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다
        infowindow.open(map, marker);


    }
    </script>
</body>

</html>