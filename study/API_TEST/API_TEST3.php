<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>전국 어린이집 정보 조회
    </title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <p id="data"></p>
    <script>
    fetch(
            'http://api.childcare.go.kr/mediate/rest/cpmsapi021/cpmsapi021/request?key=13233ee7f8574112aceb7b9174e4b910&arcode=26350'
        )
        .then(function(resp) {
            return resp.text();
        })
        .then(function(data) {
            let parser = new DOMParser(),
                xmlDoc = parser.parseFromString(data, 'text/xml');
            console.log(xmlDoc.getElementsByTagName('crname')[0]);
            console.log(xmlDoc.getElementsByTagName('crname')[2]);
            console.log(xmlDoc.getElementsByTagName('crname')[3]);
            console.log(xmlDoc.getElementsByTagName('crname')[4]);
            console.log(xmlDoc.getElementsByTagName('crname')[5]);

        });



    // const url =
    //     'http://api.childcare.go.kr/mediate/rest/cpmsapi021/cpmsapi021/request?key=13233ee7f8574112aceb7b9174e4b910&arcode=11380';

    // fetch(url).then(function(response) {
    //     response.text().then(function(text) {
    //         document.getElementById('data').innerText = text;
    //     })
    // });
    </script>

</body>

</html>