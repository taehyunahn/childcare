<?php 
    session_start();
    date_default_timezone_set('Europe/Copenhagen');
    include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";
    include $_SERVER['DOCUMENT_ROOT']."/navigation/commentFunctionNotice.php";
?>


<?php

$seq = $_POST['seq']; 
$con_num = $_POST['con_num'];

$seq = $_POST['seq'];
$con_num = $_POST['con_num'];

$sql = "DELETE FROM commentNotice WHERE seq='$seq'";        
$result = $conn -> query($sql);

$sql22 = "UPDATE notice SET comment= comment -1 WHERE seq='$con_num'";
$result22 = $conn -> query($sql22);

header("Refresh:0; url=/category4_notice/writeView.php?seq=$con_num");

?>