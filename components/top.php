<!doctype html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>어린이집으로</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="js/openPopu.js"></script>

    <!-- Custom styles for this template -->

    <link href="headers.css" rel="stylesheet">


    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8da2a0e708f9b1d3b02ede8ffcba231d&libraries=services">
    </script>
    <script src='/xml2json.js'></script>

</head>

<body onload=javascript:openPopup('./components/popup.html')>


    <main>
        <div class="container">

            <header
                class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="http://localhost/childcareWebsite/index.php" class="nav-link px-2 link-secondary">홈</a>
                    </li>
                    <li><a href="http://localhost/childcareWebsite/pages/search.php"
                            class="nav-link px-2 link-dark">찾기</a></li>
                    <li><a href="http://localhost/childcareWebsite/pages/reviewMain.php"
                            class="nav-link px-2 link-dark">후기</a>
                    </li>
                    <li><a href="http://localhost/childcareWebsite/pages/noticeMain.php"
                            class="nav-link px-2 link-dark">공지</a>
                    </li>
                    <li><a href="http://localhost/childcareWebsite/pages/about.php"
                            class="nav-link px-2 link-dark">소개</a></li>
                </ul>



                <!--                 
                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-outline-primary me-2">로그인</button>
                    <button type="button" class="btn btn-primary">회원가입</button>
                </div> -->


                <div class="col-md-3 text-end">

                    <?php //세션 id값이 없다면
                session_start();

                if(isset($_COOKIE['name'])) { //쿠키값이 있다면
                    $_SESSION["name"] = $_COOKIE['name'];
                    $_SESSION["role"] = $_COOKIE['role'];
                 }

                 if(!isset($_SESSION['name'])) {
                    echo "<button type=\"button\" class=\"btn btn-outline-primary me-2\"><a href=\"http://localhost/childcareWebsite/pages/login.php\">로그인</a></button>
        <button type=\"button\" class=\"btn btn-primary\"><a href=\"http://localhost/childcareWebsite/pages/signup.php\"
                class=\"link-light text-decoration-none\">회원가입</a></button>";
                }

                else  { //세션 id값이 있다면
                    echo $_SESSION['name']."님, 환영합니다 ";
                    echo "<button type=\"button\" class=\"btn btn-primary\"><a href=\"/userInfo/logout.php\"
                    class=\"link-light text-decoration-none\">로그아웃</a></button>";
                }

                ?>

                </div>


            </header>

        </div>
        </header>