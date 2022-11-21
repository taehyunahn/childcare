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

    <script type="text/javascript">
    function getCookie(name) {
        var cookie = document.cookie;
        if (document.cookie != "") {
            var cookie_array = cookie.split("; ");
            for (var index in cookie_array) {
                var cookie_name = cookie_array[index].split("=");
                if (cookie_name[0] == "popupYN") {
                    return cookie_name[1];
                }
            }
        }
        return;
    }

    function openPopup(url) {
        var cookieCheck = getCookie("popupYN");
        if (cookieCheck != "N") window.open(url, '', 'width=450,height=520,left=700,top=200')
    }
    </script>

    <!-- Custom styles for this template -->

    <link href="headers.css" rel="stylesheet">
</head>

<body onload=javascript:openPopup('./popup.html')>


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
                                <h1 class="display-5 fw-bold">집 주변 어린이집을 찾아보세요!</h1>
                                <p class="col-md-8 fs-4">어떤 어린이집으로 보내야할까요? 서로의 경험을 모아서, 우리 아이에게 가장 좋은 어린이집을 찾아봅시다!</p>
                                <a class="btn btn-primary btn-lg" href="/category2_search/search.php" role="button">어린이집
                                    찾기</a>

                            </div>
                        </div>

                        <div class="row align-items-md-stretch">
                            <div class="col-md-6">
                                <div class="h-100 p-5 text-white bg-dark rounded-3">
                                    <h2>부모님들의 솔직한 어린이집 후기를 들어보세요!</h2>
                                    <p>여러분들의 경험이 소중한 정보가 됩니다. 서로 공유하면서 어린이집이 훨씬 더 투명해지도록 만들어봅시다.</p>
                                    <a class="btn btn-outline-light" href="/category3_review/reviewMain.php"
                                        role="button">생생후기 확인</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="h-100 p-5 bg-light border rounded-3">
                                    <h2>공지사항</h2>
                                    <p>육아에 좋은 정보 또는 소식을 전달해드립니다. </p>
                                    <a class="btn btn-outline-secondary" href="/category4_notice/noticeMain.php"
                                        role="button">공지사항 확인</a>
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