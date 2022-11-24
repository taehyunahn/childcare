<?php 
  include 'inc_head.php';
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

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/heroes/">

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
    <link href="heroes.css" rel="stylesheet">
</head>

<body>

    <main>

        <div class="container">
            <?php 
            // 상단 네비게이션
                include $_SERVER['DOCUMENT_ROOT'].'/navigation/top.php';
            ?>

            <div class="container col-xl-10 col-xxl-6 px-4">
                <div class="row align-items-center g-lg-5 py-5">

                    <!-- 로그인 정보 입력 창 -->
                    <h1 class="display-10 fw-bold lh-1 mb-1">로그인 정보를 입력하세요</h1>
                    <form action="logincheck.php" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
                        <div class="form-floating mb-3">
                            <input type="id" class="form-control" id="floatingInput" placeholder="name@example.com"
                                name="userid">
                            <label for="floatingInput">아이디</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                name="userpw">
                            <label for="floatingPassword">비밀번호</label>
                        </div>
                        <div class="checkbox mb-3 text-center">
                            <label for="auto_login">
                                <input type="checkbox" id="auto_login" name="auto_login" value="yes"> 로그인 정보 저장
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">로그인</button>

                        <button class="w-100 btn btn-lg btn-primary mb-3"><a href="./signup.php"
                                class="link-light text-decoration-none">회원가입</a></button>

                        <hr class="my-4">
                        <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                    </form>


                </div>


            </div>
        </div>
        </div>

        <?php 
    // 하단 footer
    include $_SERVER['DOCUMENT_ROOT'].'/navigation/bottom.php';
    ?>



</body>

</html>