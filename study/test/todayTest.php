<?php 
  include $_SERVER['DOCUMENT_ROOT'].'/var/www/html/userInfo/includetest2.php';
  include 'includetest.php';
  include 'var/www/html/userInfo/includetest2.php';
  var_dump($_SERVER['DOCUMENT_ROOT']);

  include $_SERVER['DOCUMENT_ROOT'].'/userInfo/includetest2.php';
?>