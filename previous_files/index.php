<?php 
// 상단 코드 (+ 네비게이션 포함)
    include 'components/top.php';
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
                        <a class="btn btn-outline-light" href="/category3_review/reviewMain.php" role="button">확인2</a>
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


<?php 
    // 하단 footer
    include 'components/footer.php';
    ?>