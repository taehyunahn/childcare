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

//데이터베이스 저장
$sql="INSERT INTO notice (title, writer, content, hit, add_date, comment) VALUES(
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

    
    $sql4="SELECT MAX(seq) AS Largest FROM notice";
    $result4 = mysqli_query($conn,$sql4);
    $board1 = $result4->fetch_array();

    echo '<script> alert("게시물을 등록했습니다."); location.href="/category4_notice/writeView.php?seq='.$board1['Largest'].'";</script>';


    
    
}

?>