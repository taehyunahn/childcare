<?php
$conn = mysqli_connect(
    "localhost", "root", "1234", "opentutorials");

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)) {
    //<li><a href=\"index.php?id=6\">MySQL</a></li>
    $list = $list."<li><a 
    href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}

$article = array(
    'title' => 'Welcome',
    'description' => 'Hello, web'
);
    
if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']); //인자로 들어온 데이터 중에서 sql 주입 공격을 문자로 바꿔버리는 함수
    $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = $row['title'];
    $article['description'] = $row['description'];
}

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>WEB</title>
</head>

<body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
        <!--아래에는 <?php echo $list; ?>의 축약형으로 작성 -->
        <?=$list?>
    </ol>
    <form action="process_create.php" method="POST">
        <p><input type="text" name="title" placeholder="title"> </p>
        <p><textarea name="description" placeholder="description"></textarea></p>
        <p><input type="submit"></p>

    </form>
</body>

</html>