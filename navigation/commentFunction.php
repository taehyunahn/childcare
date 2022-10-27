<?php
    session_start();

    
function setComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $content = $_POST['content'];
        $con_num = $_POST['con_num'];       

        $sql = "INSERT INTO comment (name, date, content, con_num) VALUES ('$name', '$date', '$content', '$con_num')";
        $result = $conn -> query($sql);

        $sql11 = "UPDATE review SET comment= comment +1 WHERE seq='$con_num'";
        $result11 = $conn -> query($sql11);

        echo '<script> alert("댓글을 입력했습니다."); location.href="/category3_review/writeView.php?seq='.$con_num.'";</script>';

        
    }
}

function getComments($conn) {

    $con_num = $_GET['seq'];       

    $sql = "SELECT * FROM comment WHERE con_num = '$con_num'";
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
            <form class=\"p-2 bd-highlight\" method='POST' action='/category3_review/commentEdit.php'>
            <input type = 'hidden' name='seq' value = '".$row['seq']."'>
            <input type = 'hidden' name='name' value = '".$row['name']."'>
            <input type = 'hidden' name='date' value = '".$row['date']."'>
            <input type = 'hidden' name='content' value = '".$row['content']."'>
            <input type = 'hidden' name='con_num' value = '".$con_num."'>
            <button class='btn btn-dark' type='submit'>수정</button>
        </form>
        
        <form class=\"p-2 bd-highlight\" method='POST' action='/category3_review/commentDelete.php'>
            <input type = 'hidden' name='seq' value = '".$row['seq']."'>
            <input type = 'hidden' name='con_num' value = '".$con_num."'>
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
        $con_num = $_POST['con_num'];

        $sql = "UPDATE comment SET content='$content' WHERE seq='$seq'";
        $result = $conn -> query($sql);
        // header("Location: /category3_review/view.php?seq='".$con_num."'");
        header("Location: /category3_review/writeView.php?seq=$con_num");

    }
}

function deleteComment($conn) {
    if (isset($_POST['commentDelete'])) {
        $seq = $_POST['seq'];
        $con_num = $_POST['con_num'];

        $sql = "DELETE FROM comment WHERE seq='$seq'";        
        $result = $conn -> query($sql);
        // header("Location: /category3_review/view.php?seq=$con_num");
        header("Refresh:0; url=/category3_review/view.php?seq=$con_num");

    }
}


// <form class='delete-form' method='POST' action='".deleteComment($conn)."'>
// <input type = 'hidden' name='seq' value = '".$row['seq']."'>
// <input type = 'hidden' name='con_num' value = '".$con_num."'>
// <button type='submit' name='commentDelete'>Delete</button>
// </form>



// echo "<div class='comment-box'><p>";
// echo $row['name']."<br>";
// echo $row['date']."<br>";
// echo nl2br($row['content']);


// echo "</p>
//     <form class='' method='POST' action='./deletecomment.php'>
//         <input type = 'hidden' name='seq' value = '".$row['seq']."'>
//         <input type = 'hidden' name='con_num' value = '".$con_num."'>
//         <button>delete</button>
//     </form>

//     <form class='' method='POST' action='./editcomment.php'>
//         <input type = 'hidden' name='seq' value = '".$row['seq']."'>
//         <input type = 'hidden' name='name' value = '".$row['name']."'>
//         <input type = 'hidden' name='date' value = '".$row['date']."'>
//         <input type = 'hidden' name='content' value = '".$row['content']."'>
//         <input type = 'hidden' name='con_num' value = '".$con_num."'>
//         <button>Edit</button>
//     </form>
// </div>
// "        
// ;