<?php 
// 상단 코드 (+ 네비게이션 포함)
    include $_SERVER['DOCUMENT_ROOT'].'/childcareWebsite/components/top.php';
?>

<div class="container text-center">
    <div class="row ">
        <!-- 로그인 정보 입력 창 -->
        <h1 class="display-6 fw-bold">로그인 정보를 입력하세요</h1>
        <form action="logincheck.php" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
            <div class="form-floating mb-3">
                <input type="id" class="form-control" id="floatingInput" placeholder="name@example.com" name="userid">
                <label for="floatingInput">아이디</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="userpw">
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
<?php 
    // 하단 footer
    include $_SERVER['DOCUMENT_ROOT'].'/childcareWebsite/components/footer.php';


    ?>