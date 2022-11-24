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
                <main>
                    <div class="col-md-12 col-lg-12">
                        <h4 class="mb-3">공지사항</h4>

                    </div>

                    <article class="table" id="tables">
                        <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
                        </div>

                        <div>
                            <div class="bd-example">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <!-- table: 표 전체, tr: 열(row), td/th: 셀 -->
                                        <tr>
                                            <th scope="col">번호</th>
                                            <th scope="col">제목</th>
                                            <th scope="col">글쓴이</th>
                                            <th scope="col">작성일</th>
                                            <th scope="col">조회 수</th>
                                            <th scope="col">댓글 수</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php

                                        if(isset($_GET['current_page'])) {
                                            $current_page = $_GET['current_page'];
                                        } else {
                                            $current_page = 1;
                                        }

                                            $page_per_item = 10;
                                            $start_item = ($current_page - 1) * $page_per_item;


                                            $sql = "SELECT * FROM notice ORDER BY seq DESC limit $start_item, $page_per_item";
                                            $result = mysqli_query($conn, $sql);
                                            $list = '';


                                            while($row = mysqli_fetch_array($result)){
                                                $list = 
                                            "<tr>
                                                <td style= \"width: 10% \" scope=\"row\">{$row['seq']}</td>
                                                <td style= \"width: 50%\" class=\"text-start\">
                                                    <a href=\"/category4_notice/writeView.php?seq={$row['seq']}\" class=\"text-dark text-decoration-none\">
                                                    {$row['title']}</a></td>
                                                <td style= \"width: 10%\" >{$row['writer']}</td>
                                                <td style= \"width: 10%\" >{$row['add_date']}</td>
                                                <td style= \"width: 10%\" >{$row['hit']}</td>
                                                <td style= \"width: 10%\" >{$row['comment']}</td>
                                            </tr>";
                                            echo $list;
                                            }

                                            $sql2 = "SELECT * FROM notice";
                                            $result2 = mysqli_query($conn, $sql2);

                                            $total_item = mysqli_num_rows($result2); //전체 아이템수 (from DB)
                                            $end_page = ceil($total_item / $page_per_item);
                                            


                                            $block_per_page = 10; //블록당 페이지 수
                                            
                                            $total_page = ceil($total_item / $page_per_item); // 전체 페이지 갯수
                                            $total_block = ceil($total_page / $block_per_page); // 전체 블록 갯수
                                            $now_block = ceil($current_page / $block_per_page); // 현재 페이지가 속해 있는 블록 번호
                                            $start_item = (($current_page-1) * $page_per_item)+1; //가져올 아이템 시작 번호
                                            $start_page = (($now_block-1) * $block_per_page)+1; //가져올 페이지 시작 번호
                                            $start_back = $start_page - $block_per_page;
                                            $start_next = $start_page + $block_per_page;

                                            $prev_page = $current_page -1;
                                            $next_page = $current_page +1;

                                            $end_page_test = (($start_page+$block_per_page) <= $total_page)?($start_page+$block_per_page):$total_page;

                                            ?>


                                    </tbody>
                                </table>


                            </div>



                            <!-- 테스트 완료 -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <?php //정상 작동 중 - 테스트 완료 (페이지 6이상에 가면, 맨앞 버튼 나옴 )
                                    if ($now_block > 1) {
                                        echo '<li class="page-item">
                                            <a class="page-link"
                                                href="/category4_notice/noticeMain.php?current_page=1">처음으로</a>
                                        </li>';
                                        }


                                         //정상 작동 중 - 테스트 완료 (페이지 1초과할 때에만 '이전' 버튼 나옴)
                                    if ($current_page > 10) {
                                        $pre_page = $current_page -1;
                                        echo '                                    <li class="page-item">
                                        <a class="page-link"
                                            href="/category4_notice/noticeMain.php?current_page='.$start_back.'">◀</a>
                                    </li>';
                                    }
                                    ?>

                                    <?php //정상 작동 중 - 테스트 완료 (6개 블락 단위로 이동)
                                for ($i = $start_page; $i <= ($end_page_test); $i++) {
                                    if($i==$current_page) {
                                        echo '  <li class="page-item active"><a class="page-link"
                                        href="/category4_notice/noticeMain.php?current_page='.$i.'">'.$i.'</a></li>';
                                    } else {
                                        echo '  <li class="page-item"><a class="page-link"
                                        href="/category4_notice/noticeMain.php?current_page='.$i.'">'.$i.'</a></li>';
                                    }
                                    
                                }
                                ?>


                                    <?php //정상 작동 중 - 테스트 완료 (마지막 페이지까지만 다음 버튼 있음)
                                    if($current_page < $total_page && $start_next < $total_page) {
                                        $next_page = $current_page+1;
                                        echo '<a class="page-link"
                                        href="/category4_notice/noticeMain.php?current_page='.$start_next.'">▶</a>
                                    </li>';
                                    }


                                    if($now_block<$total_block) {  //정상 작동 중 - 테스트 완료
                                        echo '<li class="page-item">
                                        <a class="page-link"
                                            href="/category4_notice/noticeMain.php?current_page='.$end_page.'">마지막으로</a>
                                    </li>
                                    ';
                                    }
                                    ?>
                                </ul>
                            </nav>


                            <div class="row">


                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">

                                    <?php
                                session_start();

                                //만약에, $_SESSION['role']이 admin이라면, 글쓰기 버튼이 나오고. 그렇지 않으면 출력하지 않는다
                                if($_SESSION['role']=='admin') {
                                    echo '<a class="btn btn-secondary" href="/category4_notice/writeMain.php">글쓰기</a>';

                                }

                                ?>


                                    <!-- <a class="btn btn-secondary" href="/category4_notice/writeMain.php">글쓰기</a> -->
                                </div>




                            </div>
                        </div>
            </div>
            </article>
        </div>
    </main>

    </div>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="form-validation.js"></script>



    </div>
    </main>
    <!-- <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->


    <?php 
    // 하단 footer
    include $_SERVER['DOCUMENT_ROOT'].'/navigation/bottom.php';
    ?>






</body>

</html>