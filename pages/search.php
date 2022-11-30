<?php 
// 상단 코드 (+ 네비게이션 포함)
    include $_SERVER['DOCUMENT_ROOT'].'/childcareWebsite/components/top.php';
?>
<div class="container">
    <main>
        <div class="px-2 py-2 my-2 text-center">
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">본인 집 주소를 검색해보세요! <br>집 주변 어린이집 정보를 조회할 수 있습니다.</p>

                <form action="searchresult.php" method="get" class="needs-validation" novalidate>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <input class="btn btn-primary" type="button" onclick="sample5_execDaumPostcode()"
                            value="주소 검색"><br>
                    </div>
                </form>
            </div>
        </div>
        <div id="map" style="width:100%;height:700px;margin-top:10px;display:none">
        </div>

        <!-- </div> -->



        <script>
        var mapContainer = document.getElementById('map'), // 지도를 표시할 div
            mapOption = {
                center: new daum.maps.LatLng(37.537187, 127.005476), // 지도의 중심좌표
                level: 4 // 지도의 확대 레벨
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
                    var url =
                        'https://api.childcare.go.kr/mediate/rest/cpmsapi030/cpmsapi030/request?key=f72049399f6c44d5a1fd737625441fa3&arcode=';
                    var sigunguCode = data.sigunguCode;
                    var address = data.address;

                    fetch(url + sigunguCode)
                        .then(response => response.text())
                        .then(data => {
                            var x2js = new X2JS();
                            var jsonObj = x2js.xml_str2json(data);


                            for (var i = 0; i < jsonObj['response']['item'].length; i++) {
                                displayMarker(jsonObj['response']['item'][i], sigunguCode);
                            }

                            // 주소로 상세 정보를 검색
                            geocoder.addressSearch(address, function(results, status) {
                                // 정상적으로 검색이 완료됐으면
                                if (status === daum.maps.services.Status.OK) {

                                    var result = results[0]; //첫번째 결과의 값을 활용

                                    // 해당 주소에 대한 좌표를 받아서
                                    var coords = new daum.maps.LatLng(result.y,
                                        result.x);
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
        function displayMarker(place, sigunguCode) {

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
                location.href = "/category2_search/searchClick.php?stcode=" + place['stcode'] +
                    "&sigunguCode=" + sigunguCode;
            });


        }
        </script>


    </main>

</div>



</div>
</main>
<!-- <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->


<?php 
    // 하단 footer
    include $_SERVER['DOCUMENT_ROOT'].'/navigation/bottom.php';
    ?>





</body>

</html>