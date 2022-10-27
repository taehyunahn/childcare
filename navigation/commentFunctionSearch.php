<?php
    session_start();

    
function setComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $content = $_POST['content'];
        $stcode = $_POST['stcode'];  
        $sigunguCode = $_POST['sigunguCode'];  

            
        $sql = "INSERT INTO commentSearch (name, date, content, stcode, sigunguCode) VALUES ('$name', '$date', '$content', '$stcode', '$sigunguCode')";
        $result = $conn -> query($sql);

        if($result === false) {
            echo mysqli_error($conn);
        } else {
            echo '<script> alert("댓글을 입력했습니다"); location.href="/category2_search/searchClick.php?stcode='.$stcode.'&sigunguCode='.$sigunguCode.'";</script>';

        }

        // $sql11 = "UPDATE commentNotice SET comment= comment +1 WHERE seq='$con_num'";
        // $result11 = $conn -> query($sql11);



    }
}

function getComments($conn) {

    $stcode = $_GET['stcode'];
    $sigunguCode = $_GET['sigunguCode'];         

    $sql = "SELECT * FROM commentSearch WHERE stcode = '$stcode'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {


        echo "
        <div class=\"d-flex flex-row bd-highlight mb-3 mt-3 border\">

        <div class=\"p-2 bd-highlight\" style=\"width: 20px\"></div>

        
        <div class=\"p-8 bd-highlight\">
            <div class=\"d-flex flex-column bd-highlight mb-3\">
                <div class=\"p-2 bd-highlight fw-bold\">".$row['name']."</div>
                <div class=\"p-2 bd-highlight\">".nl2br($row['content'])."</div>
            </div>
        </div>

        <div class=\"p-2 bd-highlight\">".$row['date']."</div>
        
";


        if($_SESSION['name']==$row['name']){
        
            echo "
            <form class=\"p-2 bd-highlight\" method='POST' action='/category2_search/commentEdit.php'>
            <input type = 'hidden' name='seq' value = '".$row['seq']."'>
            <input type = 'hidden' name='name' value = '".$row['name']."'>
            <input type = 'hidden' name='date' value = '".$row['date']."'>
            <input type = 'hidden' name='content' value = '".$row['content']."'>
            <input type = 'hidden' name='stcode' value = '".$stcode."'>
            <input type = 'hidden' name='sigunguCode' value = '".$sigunguCode."'>

            <button class='btn btn-dark' type='submit'>수정</button>
        </form>
        
        <form class=\"p-2 bd-highlight\" method='POST' action='/category2_search/commentDelete.php'>
            <input type = 'hidden' name='seq' value = '".$row['seq']."'>
            <input type = 'hidden' name='stcode' value = '".$stcode."'>
            <input type = 'hidden' name='sigunguCode' value = '".$sigunguCode."'>

            <button class='btn btn-dark' type='submit'>삭제</button>
        </form> ";
        
        } else {

        }
        
        echo "</div>
        
        ";

    }
}

// <input class= 'btn btn-dark' type='submit' name='commentSubmit' value='댓글입력'>

function editComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        $seq = $_POST['seq'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $content = $_POST['content'];
        $stcode = $_POST['stcode'];  
        $sigunguCode = $_POST['sigunguCode'];  

        $sql = "UPDATE commentSearch SET content='$content' WHERE seq='$seq'";
        $result = $conn -> query($sql);
        // header("Location: /category3_review/view.php?seq='".$con_num."'");
        header("Location: /category2_search/searchClick.php?stcode=$stcode&sigunguCode=$sigunguCode");


    }
}

function deleteComment($conn) {
    if (isset($_POST['commentDelete'])) {
        $seq = $_POST['seq'];
        $stcode = $_POST['stcode'];  
        $sigunguCode = $_POST['sigunguCode'];  

        $sql = "DELETE FROM commentSearch WHERE seq='$seq'";        
        $result = $conn -> query($sql);

        // $sql22 = "UPDATE notice SET comment= comment -1 WHERE seq='$con_num'";
        // $result22 = $conn -> query($sql22);

        // header("Location: /category3_review/view.php?seq=$con_num");
        header("Refresh:0; url=/category2_search/searchClick.php?stcode=$stcode&sigunguCode=$sigunguCode");

        
        // /category2_search/searchClick.php?stcode='.$stcode.'&sigunguCode='.$sigunguCode.'

    }
}