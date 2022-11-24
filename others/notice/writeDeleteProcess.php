<?php
    include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";
?>

<?php
//정보 필드값
$seq = $_POST['seq'];

//데이터베이스 삭제

$sql = "DELETE FROM notice WHERE seq='$seq'";        
$result = $conn -> query($sql);

if($result === false) {
    echo mysqli_error($conn);
    echo "테스트중입니다";
    echo $seq;
} else {
    echo '<script> alert("게시물을 삭제했습니다."); location.href="/category4_notice/noticeMain.php";</script>';
}

?>