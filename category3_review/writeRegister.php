<?php
    error_reporting(E_ALL);
    ini_set("display_errors", true);
?>

<?php

include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";

$files = $_FILES['aaa'];
// 대입된 $file은 파일의 여러정보를 가지기 위해 배열로 된 변수임

$num = count($files);
$num2 = count($files['name']);

$fileNum = count($files['name']);

for($i=0; $i<$fileNum; $i++){
    $srcName = $files['name'][$i];
    $tmpName = $files['tmp_name'][$i];
    $fileTypr = $files['type'][$i];
    $fileSize = $files['size'][$i];

    echo "$srcName <br>";
    echo "$fileTypr <br>";
    echo "$fileSize <br>";
    echo "$tmpName <br><br>";

    $dstNme = $_SERVER['DOCUMENT_ROOT']."/category3_review/images/". date('Ymd_his'). $srcName;

    move_uploaded_file($tmpName, $dstNme);

}

//정보 필드값
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d");
// $date = now();

//로그인 중인 회원정보 이름(세션으로 가져오기)
session_start();
$writer = $_SESSION['name'];

//데이터베이스 저장
$sql="INSERT INTO review (title, writer, content, hit, add_date, comment) VALUES(
    '$title',
    '$writer',
    '$content',
    0,
    '$date',
    0
)"

;

$result = mysqli_query($conn,$sql);

if($result === false) {
    echo mysqli_error($conn);
} else {
    // echo '<script> alert("게시물을 등록했습니다.");</script>';


    $sql4="SELECT MAX(seq) AS Largest FROM review";
    $result4 = mysqli_query($conn,$sql4);
    $board1 = $result4->fetch_array();
    $a = $board1['Largest'];


    // echo '<script> alert("게시물을 등록했습니다."); location.href="/category3_review/writeView.php?seq='.$a.'";</script>';

    // header("Location: /category3_review/writeView.php?seq=$a");

}

?>

<!-- '.$board1['Largest'].' -->


<!-- $sql4="SELECT MAX(seq) AS Largest FROM review";
$result4 = mysqli_query($conn,$sql4);
$board1 = $result4->fetch_array(); -->