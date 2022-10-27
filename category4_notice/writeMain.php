<?php 
session_start();
    
    if($_SESSION['id']==null && $_SESSION['name']==null) {//세션 id값이 없다면, 로그인 페이지로 이동
        echo '<script> alert("로그인하셔야 글쓰기가 가능합니다."); location.href="/userInfo/login.php";</script>';
    }
else { //세션 id값이 있다면, 아래 코드 진행

}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Headers · Bootstrap v5.1</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>

    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <?php 
            // 상단 네비게이션
                             include $_SERVER['DOCUMENT_ROOT'].'/navigation/top.php';
            ?>

            <div class="container">

                <form action="/category4_notice/writeRegister.php" method="post">

                    <main>
                        <div class="col-md-12 col-lg-12">
                            <h4 class="mb-3"> 공지사항 - 글쓰기</h4>
                        </div>

                        <input type="text" name="title" class="form-control mt-4 mb-2" placeholder="제목을 입력해주세요."
                            required="required">

                        <div class="form-group">
                            <textarea class="form-control" rows="10" name="content" placeholder="내용을 입력해주세요"
                                required="required"></textarea>
                            <div class="form-group">

                                <div class="row mt-2 mb-2">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        <button type="submit" class="btn btn-secondary mb-3">제출하기</button>

                                    </div>




                                </div>

                            </div>

                </form>

            </div>

            <div class="container">
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                    <p class="col-md-4 mb-0 text-muted">&copy; 2021 어린이집으로</p>

                </footer>
            </div>

            <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>

</body>

</html>