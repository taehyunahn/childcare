<?php
    include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";
    ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Heroes · Bootstrap v5.1</title>

    <script>
    function checkid() {
        var userid = document.getElementById("uid").value;
        if (userid) {
            url = "check.php?userid=" + userid;
            window.open(url, "chkid", "width=300,height=100");
        } else {
            alert("아이디를 입력하세요");
        }
    }

    function checkName() {
        var userName = document.getElementById("uname").value;
        if (userName) {
            url = "checkName.php?userName=" + userName;
            window.open(url, "userName", "width=300,height=100");
        } else {
            alert("이름을 입력하세요");
        }
    }
    </script>



    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/heroes/">



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


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

                    <!-- 회원가입 정보 입력 창 -->

                    <form name="register" action="signupRegister.php" method="post"
                        class="p-4 p-md-4 border rounded-3 bg-light">

                        <h4 class="fw-bold">회원가입 정보를 입력하세요</h4>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="uname" placeholder="이름">
                            <label for="floatingInput">이름</label>
                            <input type="button" value="중복검사" onclick="checkName();" />
                            <input type="hidden" value="0" name="chs" />
                        </div>
                        <div class="form-floating mb-3">
                            <input type="id" class="form-control" name="id" id="uid" placeholder="아이디">
                            <label for="floatingInput">아이디</label>
                            <input type="button" value="중복검사" onclick="checkid();" />
                            <input type="hidden" value="0" name="chs" />

                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                name="pass">
                            <label for="floatingPassword">비밀번호</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                name="passcheck">
                            <label for="floatingPassword">비밀번호 확인</label>
                        </div>
                        <!-- <div class="form-floating mb-3">
                            <input type="phoneNumber" class="form-control" id="floatingInput" placeholder="전화번호"
                                name="phone">
                            <label for="floatingPassword">전화번호</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="address" class="form-control" id="floatingInput" placeholder="주소"
                                name="address">
                            <label for="floatingPassword">주소</label>
                        </div> -->

                        <!-- 완료버튼을 누르면, form에 입력한 이름, 아이디, 비밀번호를 옮긴다 -->
                        <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">완료</button>

                        <button class="w-100 btn btn-lg btn-primary mb-3">취소</button>

                        <hr class="my-4">
                        <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                    </form>


                </div>


            </div>
        </div>
        </div>


        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-muted">&copy; 2021 어린이집으로</p>

            </footer>
        </div>

        <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>




    </main>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>