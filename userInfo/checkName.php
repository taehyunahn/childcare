<?php

include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";
$uName = $_GET["userName"];
	$sql = mq("select * from user where name='".$uName."'");
	$member = $sql->fetch_array();
	if($member==0)
	{
?>
<div style='font-family:"malgun gothic"' ;><?php echo $uName; ?>은/는 사용가능한 이름입니다.</div>
<?php 
	}else{
?>
<div style='font-family:"malgun gothic"; color:red;'><?php echo $uName; ?>중복된 이름입니다.<div>
        <?php
	}
?>
        <button value="닫기" onclick="window.close()">닫기</button>
        <script>
        </script>