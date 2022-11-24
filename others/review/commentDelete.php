<?php 
    session_start();
    date_default_timezone_set('Europe/Copenhagen');
    include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";
    include $_SERVER['DOCUMENT_ROOT']."/navigation/commentFunction.php";

?>


<?php

$seq = $_POST['seq']; 
$con_num = $_POST['con_num'];

$seq = $_POST['seq'];
$con_num = $_POST['con_num'];

$sql = "DELETE FROM comment WHERE seq='$seq'";        
$result = $conn -> query($sql);

$sql22 = "UPDATE review SET comment= comment -1 WHERE seq='$con_num'";
$result22 = $conn -> query($sql22);


// header("Location: /category3_review/view.php?seq=$con_num");
header("Refresh:0; url=/category3_review/writeView.php?seq=$con_num");

?>