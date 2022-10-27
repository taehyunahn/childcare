<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>한국은행_한국은행 주요계정 및 기준금리</title>
</head>

<body>
    <p id="data"></p>
    <script>
    const url =
        'http://ecos.bok.or.kr/api/StatisticSearch/XX3R3MBBKTEPEFMJWUXE/json/kr/1/10/098Y001/MM/2021/2022/0101000';

    fetch(url)
        .then(res => res.json())
        .then(myJson => {
            document.getElementById('data').innerText = JSON.stringify(myJson, null, 1);
        })
    </script>

</body>

</html>