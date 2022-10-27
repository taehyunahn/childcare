<?php

include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";

//정보 필드값
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d");
// $date = now();

//로그인 중인 회원정보 이름(세션으로 가져오기)
session_start();
$writer = $_SESSION['name'];


for ($i = 0; $i < 2000; $i++) {
    
//데이터베이스 저장
$sql="INSERT INTO notice (title, writer, content, hit, add_date, comment) VALUES(
    '$i',
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
    echo '<script> alert("게시물 대량을 등록했습니다."); location.href="/category3_review/writeView.php?seq='.$a.'";</script>';

}

}

?>

<!-- '.$board1['Largest'].' -->


<!-- $sql4="SELECT MAX(seq) AS Largest FROM review";
$result4 = mysqli_query($conn,$sql4);
$board1 = $result4->fetch_array(); -->