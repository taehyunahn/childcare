<h1>안녕하세요<br></h1>
<h1>안녕하세요<br></h1>
<h1>안녕하세요<br></h1>
<h1>안녕하세요<br></h1>

<?php
setcookie("test", "false", time() + 3600, "/");


?>

<?php
echo 'Hello ' . htmlspecialchars($_COOKIE["test"]) . '!';
echo '<br>';

if(isset($_COOKIE["test"])){
    echo '쿠키 존재';
} else echo '쿠지 존재 안함';
?>