<?php

session_start();
include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)){


    if ($row['id']==test) {
    echo $row['name']."<br>";
    // setcookie("row['id']->",$row['id'],(time()+3600*24),"/"); // 하루동안 쿠키 유지
    setcookie("test",$row['name'],(time()+3600*24),"/"); // 하루동안 쿠키 유지
}



}

?>