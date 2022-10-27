<?php

	header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

	// localhost = DB주소, web=DB계정아이디, 1234=DB계정비밀번호, post_board="DB이름"
	$db = new mysqli("localhost","root","1234","alldata"); 
	$db->set_charset("utf8");

	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}


	$conn = mysqli_connect('localhost', 'root', '1234', 'alldata');

	mysqli_set_charset($conn,"utf8");
	if (!$conn) {
		die("Connection failed: ".mysqli_connect_error());
	}
?>