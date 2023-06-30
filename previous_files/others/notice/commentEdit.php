<?php 
    session_start();
    date_default_timezone_set('Europe/Copenhagen');
    include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";
    include $_SERVER['DOCUMENT_ROOT']."/navigation/commentFunctionNotice.php";

?>

<?php
	// include $_SERVER['DOCUMENT_ROOT']."/category3_review/db.php"; /* db load */
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>어린이집으로</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.js"></script>
    <script type="text/javascript" src="./js/common.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="/css/css.css">

    <style>
    textarea {
        width: 1200px;
        height: 80px;
        background-color: #fff;
        resize: none;
    }

    #btn_sumit {
        width: 100px;
        height: 30px;
        background-color: #282828;
        border: none;
        color: #fff;
        font-family: arial;
        font-weight: 400px;
    }

    .comment-box {
        width: 845px;
        padding: 20px;
        margin-bottom: 4px;
        backgroud-color: #fff;
        border-radius: 4px;
        position: relative;
    }

    .edit-form {
        position: absolute;
        top: 0px;
        right: 0px;

    }
    </style>

    <!-- Custom styles for this template -->
    <link href=" headers.css" rel="stylesheet">


    <script>
    $(document).ready(function() {
        $('.dat_edit_bt').click(function() {
            /* dat_edit_bt클래스 클릭시 동작(댓글 수정) */
            var obj = $(this).closest('.dap_lo').find('.dat_edit');
            obj.dialog({
                modal: true,
                width: 650,
                height: 200,
                title: '댓글 수정',
            });
        });

        $('.dat_delete_bt').click(function() {
            /* dat_delete_bt클래스 클릭시 동작(댓글 삭제) */
            var obj = $(this).closest('.dap_lo').find('.dat_delete');
            obj.dialog({
                modal: true,
                width: 400,
                title: '댓글 삭제확인',
            });
        });
    });
    </script>
</head>

<body>
    <div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

    <div class="container">

        <div class="col-md-12 col-lg-12">
            <h4 class="mb-3">댓글수정</h4>

        </div>

        <?php

        $seq = $_POST['seq'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $content = $_POST['content']; 
        $con_num = $_POST['con_num'];
        
        echo "<form method='POST' action='".editComments($conn)."'>
            <input type='hidden' name='seq' value='".$seq."'>
            <input type='hidden' name='name' value='".$name."'>
            <input type='hidden' name='date' value='".$date."'>
            <input type='hidden' name='con_num' value='".$con_num."'>
            <textarea name='content'>".$content."</textarea><br>
            <button id= 'btn_sumit' type='submit' name='commentSubmit'>수정</button>
            <button id='btn_sumit' name='commentSubmit' onClick='javascript:history.back()'>취소</button>
        </form>";
        ?>



    </div>

    <!-- location.href="/category3_review/writeView.php?seq='.$seq.'"; -->