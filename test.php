<?php

include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";

//정보 필드값
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d");
// $date = now();


?>

<script>
fetch(
        'https://api.childcare.go.kr/mediate/rest/cpmsapi030/cpmsapi030/request?key=f72049399f6c44d5a1fd737625441fa3&arcode=26350&stcode='
    )
    .then(response => response.text())
    .then(data => {
        var x2js = new X2JS();

        var jsonObj = x2js.xml_str2json(data);
        console.log(jsonObj);


        for (var i = 0; i < jsonObj['response']['item'].length; i++) {

            console.log(jsonObj['response']['item'][i]['crname']);
        }
    });
</script>

<?php

//데이터베이스 저장
$sql="INSERT INTO crinfo (title, writer, content, hit, add_date, comment) VALUES(
    '$title',
    '$writer',
    '$content',
    0,
    '$date',
    0
)";

$result = mysqli_query($conn,$sql);

if($result === false) {
    echo mysqli_error($conn);
} else {
    echo '<script> alert("게시물을 등록했습니다."); location.href="/category4_notice/writeView.php?seq='.$board1['Largest'].'";</script>';

}

?>