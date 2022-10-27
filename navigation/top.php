<header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap" />
        </svg>
    </a>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <?php 
                    $category1 = "홈";
                    $category2 = "어린이집 찾기";
                    $category3 = "생생후기";
                    $category4 = "공지사항";
                    $category5 = "커뮤니티 소개";
                    ?>
        <li><a href="/category1_home/home.php" class="nav-link px-2 link-dark fw-bold"><?php echo $category1 ?></a>
        </li>
        <li><a href="/category2_search/search.php" class="nav-link px-2 link-dark fw-bold"><?php echo $category2 ?></a>
        </li>
        <li><a href="/category3_review/reviewMain.php"
                class="nav-link px-2 link-dark fw-bold"><?php echo $category3 ?></a></li>
        <li><a href="/category4_notice/noticeMain.php"
                class="nav-link px-2 link-dark fw-bold"><?php echo $category4 ?></a></li>
        <li><a href="/category5_about/about.php" class="nav-link px-2 link-dark fw-bold"><?php echo $category5 ?></a>
        </li>
    </ul>
    <div class="col-md-3 text-end">

        <!-- 만약에 세션 id값이 있다면, 로그아웃 버튼을 만들어주세요(세션 삭제 기능 탑재한 버튼으로)
                세션 id값이 없다면, 현재처럼 로그인 및 회원가인 버튼을 배치해주세요 -->

        <?php //세션 id값이 없다면
                session_start();

                if(isset($_COOKIE['name'])) { //쿠키값이 있다면
                    $_SESSION["name"] = $_COOKIE['name'];
                    $_SESSION["role"] = $_COOKIE['role'];
                 }

                 if(!isset($_SESSION['name'])) {
                    echo "<button type=\"button\" class=\"btn btn-outline-primary me-2\"><a href=\"/userInfo/login.php\">로그인</a></button>
        <button type=\"button\" class=\"btn btn-primary\"><a href=\"/userInfo/signup.php\"
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

<!-- echo '<script> alert("로그인에 성공하였습니다."); location.href="/category1_home/home.php"; </script>';
echo '<script> alert("로그아웃되었습니다."); </script>'; -->