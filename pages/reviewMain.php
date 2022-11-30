<?php 
// 상단 코드 (+ 네비게이션 포함)
    include $_SERVER['DOCUMENT_ROOT'].'/childcareWebsite/components/top.php';
?>

<div class="container">
    <main>
        <div class="col-md-12 col-lg-12">
            <h4 class="mb-3">생생후기</h4>

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

                                            $sql = "SELECT * FROM review ORDER BY seq DESC limit $start_item, $page_per_item";
                                            // $sql = "SELECT * FROM review ORDER BY seq DESC limit 0,10";

                                            $result = mysqli_query($conn, $sql);
                                            $list = '';

                                            while($row = mysqli_fetch_array($result)){
                                                $list = 
                                            "<tr>
                                                <td style= \"width: 10% \" scope=\"row\">{$row['seq']}</td>
                                                <td style= \"width: 50%\" class=\"text-start\">
                                                    <a href=\"/category3_review/writeView.php?seq={$row['seq']}\" class=\"text-dark text-decoration-none\">
                                                    {$row['title']}</a></td>
                                                <td style= \"width: 10%\" >{$row['writer']}</td>
                                                <td style= \"width: 10%\" >{$row['add_date']}</td>
                                                <td style= \"width: 10%\" >{$row['hit']}</td>
                                                <td style= \"width: 10%\" >{$row['comment']}</td>
                                            </tr>";
                                            echo $list;
                                            }

                                            $sql2 = "SELECT * FROM review";
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
                                                href="/category3_review/reviewMain.php?current_page=1">처음으로</a>
                                        </li>';
                                        }


                                         //정상 작동 중 - 테스트 완료 (페이지 1초과할 때에만 '이전' 버튼 나옴)
                                    if ($current_page > 10) {
                                        $pre_page = $current_page -1;
                                        echo '                                    <li class="page-item">
                                        <a class="page-link"
                                            href="/category3_review/reviewMain.php?current_page='.$start_back.'">◀</a>
                                    </li>';
                                    }
                                    ?>

                        <?php //정상 작동 중 - 테스트 완료 (6개 블락 단위로 이동)
                                for ($i = $start_page; $i <= ($end_page_test); $i++) {
                                    if($i==$current_page) {
                                        echo '  <li class="page-item active"><a class="page-link"
                                        href="/category3_review/reviewMain.php?current_page='.$i.'">'.$i.'</a></li>';
                                    } else {
                                        echo '  <li class="page-item"><a class="page-link"
                                        href="/category3_review/reviewMain.php?current_page='.$i.'">'.$i.'</a></li>';
                                    }
                                    
                                }
                                ?>


                        <?php //정상 작동 중 - 테스트 완료 (마지막 페이지까지만 다음 버튼 있음)
                                    if($current_page < $total_page && $start_next < $total_page) {
                                        $next_page = $current_page+1;
                                        echo '<a class="page-link"
                                        href="/category3_review/reviewMain.php?current_page='.$start_next.'">▶</a>
                                    </li>';
                                    }


                                    if($now_block<$total_block) {  //정상 작동 중 - 테스트 완료
                                        echo '<li class="page-item">
                                        <a class="page-link"
                                            href="/category3_review/reviewMain.php?current_page='.$end_page.'">마지막으로</a>
                                    </li>
                                    ';
                                    }
                                    ?>
                    </ul>
                </nav>

                <div class="row">


                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <a class="btn btn-secondary" href="/category3_review/writeMain.php">글쓰기</a>
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