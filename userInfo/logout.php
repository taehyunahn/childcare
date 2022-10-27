<?php 
  include 'inc_head.php';
?>
<!doctype html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
    <?php
    session_start();
    session_destroy();
    // setcookie("name", "",time() - 3600);
    setrawcookie("name","",(time() - 3600),"/"); // 하루동안 쿠키 유지

    // echo '<script> alert("로그아웃했습니다"); location.href="/userInfo/login.php"; </script>';
    echo '<script> alert("로그아웃했습니다"); history.back(); </script>';


    //   if ( $jb_login ) {
    //     session_destroy();
    //     echo '<script> alert("로그아웃되었습니다."); </script>';  
    // include $_SERVER['DOCUMENT_ROOT'].'/userInfo/login.php';
    //   } else {
    //     include $_SERVER['DOCUMENT_ROOT'].'/userInfo/login.php';
    // }

    // session_start();
    // // unset($_SESSION["name"]);
    // if ( $jb_login ) {
    // session_destroy();
    // } 
    // setcookie("username","");
    // setcookie("password","");
    // echo '<script> alert("로그아웃했습니다"); location.href="/userInfo/login.php"; </script>';
 ?>




</body>

</html>