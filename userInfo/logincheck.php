<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">

</head>

<body>

    <?php

session_start();
include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";


$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

$id = $_POST["userid"];
$pw = $_POST["userpw"];
$auto = $_POST["auto_login"];

// $auto_login = $_POST["auto_login"];

if($result === false) {
    echo mysqli_error($conn);
} else {
    // echo '<script> alert("회원가입을 하였습니다."); location.href="/category1_home/home.php";</script>';
            ////post로 넘겨받은 데이터가 둘 중 하나라도 없다면 전 화면으로 돌아가는 예외처리 /// 
        if ($id== "" || $pw==""){
            echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';            
            return ;
        }

        while ($row = mysqli_fetch_assoc($result)){
        if($row['id']==$id && password_verify($pw, $row['pass']) ) { //원본 보관
            $_SESSION['id']=$row['id'];
            $_SESSION['pw']=$row['pass'];
            $_SESSION['name']=$row['name'];
            $_SESSION['role']=$row['role'];

            if($auto == yes) {
                setrawcookie("name",$row['name'],(time()+3600*24),"/"); // 하루동안 쿠키 유지
                setrawcookie("role",$row['role'],(time()+3600*24),"/"); // 하루동안 쿠키 유지
            } else {

            }


                ?>

    <?php
            echo '<script> alert("로그인에 성공하였습니다"); location.href="/category1_home/home.php"; </script>';


        
            
        }
        }
        
        if( $row['id']!=$id || $row['pass']!=$pw ){ //원본 보관
            // if( $row['id']!=$_POST["userid"] || password_verify($_POST["userpw"], $row['pass'] ) ){
        echo '<script> alert("아이디, 비밀번호를 다시 확인해주세요."); history.back(); </script>';



    
    }



}





?>

</body>

</html>