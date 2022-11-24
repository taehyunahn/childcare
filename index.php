<!doctype html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>어린이집으로</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="js/openPopu.js"></script>

    <!-- Custom styles for this template -->

    <link href="headers.css" rel="stylesheet">
</head>

<body onload=javascript:openPopup('./components/popup.html')>


    <main>
        <div class="container">
            <?php 
            // 상단 네비게이션
                include '../navigation/top.php';
            ?>

            <div class="container">
                <main>
                    <div class="col-md-12 col-lg-12">
                        <div class="p-3 mb-4 bg-light rounded-5">
                            <div class="container-fluid py-5">
                                <h1 class="display-5 fw-bold">제목1</h1>
                                <p class="col-md-8 fs-4">내용1</p>
                                <a class="btn btn-primary btn-lg" href="/category2_search/search.php" role="button">
                                    확인1</a>

                            </div>
                        </div>

                        <div class="row align-items-md-stretch">
                            <div class="col-md-6">
                                <div class="h-100 p-5 text-white bg-dark rounded-3">
                                    <h2>제목2</h2>
                                    <p>내용2</p>
                                    <a class="btn btn-outline-light" href="/category3_review/reviewMain.php"
                                        role="button">확인2</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="h-100 p-5 bg-light border rounded-3">
                                    <h2>제목3</h2>
                                    <p>내용3</p>
                                    <a class="btn btn-outline-secondary" href="/category4_notice/noticeMain.php"
                                        role="button">확인3</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            </div>



    </main>

    </div>
    <!-- <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></sodium_crypto_sign_ed25519_pk_to_curve25519> -->



    <?php 
    // 하단 footer
    include '../navigation/bottom.php';
    ?>




</body>

</html>