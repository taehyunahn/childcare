<?php

include $_SERVER['DOCUMENT_ROOT']."/commentTest/db.php"; /* db load */
$date = date('Y-m-d');
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
if(isset($_POST['lockpost'])){
	$lo_post = '1';
}else{
	$lo_post = '0';
}
$sql = mq("insert into board(name,pw,title,content,date,lock_post) values('".$_POST['name']."','".$userpw."','".$_POST['title']."','".$_POST['content']."','".$date."','".$lo_post."')"); ?>
<script type="text/javascript">
alert("글쓰기 완료되었습니다.");
location.href = "/commentTest/index.php";
</script>
<meta http-equiv="refresh" content="0 url=/" />