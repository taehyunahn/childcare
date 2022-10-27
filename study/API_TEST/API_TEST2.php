<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>전국 어린이집 정보 조회
    </title>
</head>

<body>
    <p id="data"></p>
    <script>
    const url =
        'http://api.childcare.go.kr/mediate/rest/cpmsapi021/cpmsapi021/request?key=13233ee7f8574112aceb7b9174e4b910&arcode=11380';

    fetch(url)
        .then(res => res.json())
        .then(myJson => {
            document.getElementById('data').innerText = JSON.stringify(myJson, null, 1);
        })
    </script>

</body>

</html>