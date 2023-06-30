<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src='/xml2json.js'></script>
    <script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8da2a0e708f9b1d3b02ede8ffcba231d"></script>


</head>

<body>
    <div id="map" style="width:100%;height:1000px;"></div>

    <script>
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
        mapOption = {
            center: new kakao.maps.LatLng(35.17783190746764, 129.1672010536355), // 지도의 중심좌표
            level: 4, // 지도의 확대 레벨
            mapTypeId: kakao.maps.MapTypeId.ROADMAP // 지도종류
        };

    // 지도를 생성한다 
    var map = new kakao.maps.Map(mapContainer, mapOption);


    fetch(
            'https://api.childcare.go.kr/mediate/rest/cpmsapi030/cpmsapi030/request?key=f72049399f6c44d5a1fd737625441fa3&arcode=26350&stcode='
        )
        .then(response => response.text())
        .then(data => {

            // Create x2js instance with default config
            var x2js = new X2JS();
            // var xmlText =
            //     "<MyRoot><test>Success</test><test2><item>val1</item><item>val2</item></test2></MyRoot>";
            var jsonObj = x2js.xml_str2json(data);
            console.log(jsonObj);



            console.log(jsonObj['response']['item'][0]['crname']);


            for (var i = 0; i < 3; i++) {

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
                infowindow.open(map, marker);


            }


        })
    </script>



</body>

</html>