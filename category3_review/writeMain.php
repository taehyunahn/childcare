<?php 
session_start();
    
    if($_SESSION['name']==null) {//세션 id값이 없다면, 로그인 페이지로 이동
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

                <form action="/category3_review/writeRegister.php" method="post" enctype="multipart/form-data">

                    <main>
                        <div class="col-md-12 col-lg-12">
                            <h4 class="mb-3">생생후기 - 글쓰기</h4>
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


                <!-- 파일 선택 부분 시작-->
                <form action="/category3_review/file2.php" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type="file" class="form-control" name="aaa[]" accept="image/jpeg"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" multiple>
                        <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">전송</button>
                    </div>
                </form>
                <!-- 파일 선택 부분 끝-->

                    <!-- 웹브라우저가 클라이언트인 경우, form을 통해서 파일을 등록하여 전송한다.
                         웹브라우저가 보내는 HTTP 메시지는 Content-Type 속성이 Multipart/form-data로 지정되고, 정해진 형식에 따라 메시지를 인코딩하여 전송한다.
                         (ex. 이미지 파일을 문자로 생성하여 HTTP request body에 담아 서버로 전송)
                         이를 처리하기 위한 서버는 멀티파트 메시지에 대해서 각 파트별로 분리하여, 개별 파일의 정보를 얻게 된다. -->

                    <!-- enctype(인코딩 타입) = 폼 데이터(form data)가 서버로 제출될 때 해당 데이터가 인코딩되는 방법을 명시한다. (form 태그의 속성값 중 하나)
                         종류 1. application/x-www-form-urlcencoded : default 값으로, 모든 문자들을 서버로 보내기 전에 인코딩됨을 명시. (파일이 없는 form에 사용)
                         종류 2. text/plain : 인코딩 없이 문자열을 그대로 전송. 보안x, 한글 등 2바이트 문자는 전송 후 글자가 깨지는 현상이 발생
                         종류 3. multipart/from-data : <form>요소가 파일이나 서버로 전송할 때 주로 사용.
                                 - "multipart/form-data"는 파일 업로드가 없는 폼에도 사용할 수 있으나, 파일 전송을 위해 추가적으로 표시되는 요소들이 있다
                                 - application/x-www-form-urlcencoded보다 기본 데이터가 더 커지기 때문에 짧은 데이터 전송에는 비효율적이다.
                                 - 파일 전송이 없으면, default 값을 사용하도록 enctype을 미 표시하는 것이 효율적 -->

                    <!-- HTML의 input의 type 중 'file'은 파일 업로드를 위한 input 컨트롤 (ex.<input type="file"/>)
                         사용자 컴퓨터에서 서버로 파일을 전송하기 위한 input.
                         form이 submit 되면, form 안에 있는 컨트롤들의 데이터가 서버로 전송된다.
                         데이터들은 HTTP Request 형태로 서버에 전송된다.
                         HTTP Request는 Body에 클라이언트가 전송하려고 하는 데이터를 넣을 수 있다.
                         Body에 들어가는 데이터의 타입을 HTTP Header에 명시해 줌으로써 서버가 타입에 따라 알맞게 처리하게 한다.
                         이 Body의 타입을 명시하는 Header가 Content-type이다. (ex. text/pain, text/xml, image/jpeg)

                         보통 HTTP Request의 Body는 한 종류의 타입이고, Content-type도 하나만 명시할 수 있다.
                         그러나 이미지를 업로드할 경우, 이미지에 대한 설명 text와 이미지 파일 자체에 대한 jpeg 두 가지를 전송해야 한다.
                         두 종류의 데이터가 하나의 HTTP Request Body에 들어가야 하는 것이다.
                         한 Body에 2 종류의 데이터를 구분해서 넣어주는 방법이 필요하여, multipart가 등장했다.
                -->





                <!-- 파일 선택 부분 시작-->
                <!-- <form action="/category3_review/file.php" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type="file" class="form-control" name="aaa" accept="image/jpeg"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">전송</button>
                    </div>
                </form> -->
                <!-- 파일 선택 부분 끝-->








                <!-- 테스트용 -->

                <!-- <form action="/category3_review/writeRegisterTest.php" method="post">

                    <main>
                        <div class="col-md-12 col-lg-12">
                            <h4 class="mb-3">테스트용</h4>
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

                </form> -->


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