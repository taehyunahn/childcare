<?php
    include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";
    ?>
<?php

//필드 정보
$id = $_POST['id'];

//비밀번호 암호화
// $password_hash = hash("sha256", $pass); //입력받은 비밀번호를 sha256 방법으로 암호화 한다
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$name = $_POST['name'];
// $phone = $_POST['phone'];
// $address = $_POST['address'];
$date = date("Y-m-d");



//데이터베이스 저장
$sql="INSERT INTO user (name, id, pass, add_date) VALUES(
    '$name',
    '$id',
    '$pass',
    '$date'
)";

$result = mysqli_query($conn,$sql);

if($result === false) {
    echo mysqli_error($conn);
} else {   
    echo '<script> alert("회원가입완료"); location.href="/userInfo/login.php";</script>';
}




?>