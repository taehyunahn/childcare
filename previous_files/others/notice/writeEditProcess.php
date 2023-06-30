<?php
    include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";
?>

<?php
//정보 필드값
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d");
$seq = $_POST['seq'];

//데이터베이스 수정
$sql="
    UPDATE notice 
        SET
            title = '$title',
            content = '$content'
        WHERE
            seq = $seq
            ";

$result = mysqli_query($conn,$sql);

if($result === false) {
    echo mysqli_error($conn);
} else {
    
    echo '<script> alert("게시물을 수정했습니다."); location.href="/category4_notice/writeView.php?seq='.$seq.'";</script>';
}

?>