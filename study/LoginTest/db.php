<?php
    $dns = "mysql:host=localhost;dbname=TEST;charset=utf8";
    $username="root";
    $pw="1234";

    try {
        $db = new PDO($dns, $username, $pw);
        echo '접속성공 축하합니다!';
    } catch (PDOException $th) {
        echo '접속실패 : ' . $th->getMessage();
    }
?>