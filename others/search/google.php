 <!-- [ 영국 런던을 중심으로 구글지도 만들기 ] -->
 <div id="googleMap" style="width: 100%;height: 700px;"></div>

 <script>
function myMap() {
    var mapOptions = {
        center: new google.maps.LatLng(35.17783190746764, 129.1672010536355),
        zoom: 16
    };

    var map = new google.maps.Map(
        document.getElementById("googleMap"), mapOptions);


    fetch(
            'https://api.childcare.go.kr/mediate/rest/cpmsapi030/cpmsapi030/request?key=f72049399f6c44d5a1fd737625441fa3&arcode=26350&stcode='
        )
        .then(function(resp) {
            return resp.text();
        })
        .then(function(data) {
            let parser = new DOMParser(),
                xmlDoc = parser.parseFromString(data, 'text/xml');
            xmlDoc.getElementsByTagName('crname')[0];



            for (var i = 0; i < 5; i++) {
                console.log(xmlDoc.getElementsByTagName('la')[i]);
                console.log(xmlDoc.getElementsByTagName('lo')[i]);



                var marker = new google.maps.Marker({
                    position: {
                        lat: Math.floor(xmlDoc.getElementsByTagName('la')[i]),
                        lng: Math.floor(xmlDoc.getElementsByTagName('lo')[i])
                    },
                    map: map
                });
            }
        })
}
 </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgSGceh8gQ0bbECNTUw_PevrI_tVOQaLU&callback=myMap">
 </script>