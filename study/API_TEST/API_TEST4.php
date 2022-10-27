<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>전국 어린이집 정보 조회
    </title>
    <script src='xml2json.js'></script>


</head>

<body>
    <script>
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

            var stringjson = JSON.stringify(jsonObj, null, 1);
            document.write(stringjson);

            console.log(jsonObj['response']['item'][0]['sidoname']);
        })
    </script>

</body>

</html>