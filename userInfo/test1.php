<?php

session_start();
setrawcookie("aaaa","안녕",(time()+3600*24),"/"); // 하루동안 쿠키 유지
echo "안녕";
?>