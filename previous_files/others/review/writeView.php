<?php 
    session_start();
    date_default_timezone_set('Europe/Copenhagen');
    include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";
    include $_SERVER['DOCUMENT_ROOT']."/navigation/commentFunction.php";

?>

<?php
	// include $_SERVER['DOCUMENT_ROOT']."/category3_review/db.php"; /* db load */
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="/css/css.css">



    <!-- Custom styles for this template -->
    <link href=" headers.css" rel="stylesheet">

</head>

<body>
    <?php

        $bno = $_GET['seq'];

        //1-1, 1-2 과정을 시작하기 전에, 쿠키(게시물 번호 연계) 여부를 확인한다
        if(!isset($_COOKIE["cookie".$bno])) {


        //1-1. review 테이블에 있는 seq 칼럼을 조회해서, 해당 게시물의 hit(조회수)를 찾아서 +1한다
        $sql1="select * from review where seq ='".$bno."'";
        $result1 = mysqli_query($conn,$sql1);
        $hit = mysqli_fetch_array($result1);
        $hit = $hit['hit'] + 1;
        
        //1-2. 위 과정으로 기존 hit(조회수)+1 합계를 DB에 업데이트한다
        $sql2="update review set hit = '".$hit."' where seq = '".$bno."'";
        $result2 = mysqli_query($conn,$sql2);

        //1-1, 1-2 과정을 마치고 나면, 쿠키(게시물 번호 연계)를 생성한다 (24시간 유효)
        setrawcookie("cookie".$bno,"cookie".$bno,(time()+3600*24),"/"); // 하루동안 쿠키 유지

            
    }        

        
        //현재 게시물 번호로 조회한 DB 정보를 배열 형식으로 뽑아낸다. $board 변수로 배열처럼 사용
        $sql3="select * from review where seq='".$bno."'";
        $result3 = mysqli_query($conn,$sql3);
        $board = $result3->fetch_array();

        // $hit = mysqli_fetch_array(mq("select * from review where seq ='".$bno."'"));
        // $hit = $hit['hit'] + 1;

        // $fet = mq("update review set hit = '".$hit."' where seq = '".$bno."'");

        // $sql = mq("select * from review where seq='".$bno."'"); /* 받아온 idx값을 선택 */
        // $board = $sql->fetch_array();

        // $sql4="SELECT MAX(seq) AS Largest FROM review";
        // $result4 = mysqli_query($conn,$sql4);
        // $board1 = $result4->fetch_array();
    

        // if ($bno > $board1['Largest']) {
        //     die("    <script>
        //     history.back();
        //     </script>");

        //칼럼번호가 데이터베이스에 없다면,
        $sql5="SELECT EXISTS (SELECT * FROM review WHERE seq = $bno) as isChk";
    $result5 = mysqli_query($conn,$sql5);
            $boardA = $result5->fetch_array();
    

            if($boardA['isChk']==0) {
                    ?>
    <script>
    alert('존재하지 않는 페이지입니다');
    history.back();
    </script>


    <?php 


            }

    
        //     ?>




    <main>
        <div class="container">
            <?php 
            // 상단 네비게이션
                include $_SERVER['DOCUMENT_ROOT'].'/navigation/top.php';
            ?>

            <div class="container">

                <main>
                    <div class="col-md-9 col-lg-9">
                        <h4 class="mb-3">생생후기 - 조회</h4>
                    </div>

                    <!-- bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2 -->


                    <div class="row mt-2 mb-2 border-0 border-dark">
                    </div>


                    <!-- 목록, 수정, 삭제 버튼 모음 -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <!-- 버튼1. 목록 (비로그인도 확인 가능) -->
                        <a class="btn btn-outline-dark  me-md-1" href="/category3_review/reviewMain.php"
                            role="button">목록</a>
                        <!-- 버튼2. 수정 (로그인 후 확인 가능) -->
                        <?php
                            if($_SESSION['name']==$board['writer']){
                                echo "<a class=\"btn btn-outline-dark\" href=\"/category3_review/writeEdit.php?seq=".$_GET['seq']."\" role=\"button\">수정</a>";
                                } else {
                                }
                                ?>

                        <!-- 버튼3. 삭제 (로그인 후 확인 가능) -->
                        <form action="writeDeleteProcess.php" method="post">
                            <input type="hidden" name="seq" value=" <?php echo $_GET['seq']?> ">
                            <?php 
                            if($_SESSION['name']==$board['writer']||$_SESSION['role']=='admin'){
                                echo "<input class=\"btn btn-outline-dark\" type=\"submit\" value=\"삭제\">";
                                } else {
                                }
                        ?>
                        </form>
                    </div>

                    <div class="row mt-2 mb-2 border-0 border-dark">
                    </div>

                    <div class="row fw-bold text-center ">
                        <div class="col-1 text-end">제목 </div>
                        <div class="col-7  text-start fw-normal"><?php echo $board['title']; ?>
                        </div>
                        <div class="col-1 text-end">작성일</div>
                        <div class="col-3 text-start fw-normal"><?php echo $board['add_date']; ?></div>
                    </div>

                    <div class="row mt-2 mb-2 border-0 border-dark">
                    </div>

                    <div class="row fw-bold text-center ">
                        <div class="col-1 text-end">글쓴이 </div>
                        <div class="col-7  text-start fw-normal"><?php echo $board['writer']; ?></div>
                        <div class="col-1 text-end">조회수</div>
                        <div class="col-1 text-start fw-normal"><?php echo $board['hit']; ?></div>
                        <div class="col-1 text-end">댓글수</div>
                        <div class="col-1 text-start fw-normal"><?php echo $board['comment']; ?></div>
                    </div>

                    <div class="row mt-2 border border-dark">
                    </div>

                    <div class="row mt-4">
                        <!-- <div class="row mt-4" style="height: 300px"> -->
                        <div class="col-1 text-end fw-bold">내용 </div>
                        <div class="col-10  text-start fw-normal pb-3">
                            <!-- <div class="col-10  text-start fw-normal" style="white-space:pre-line;"> -->

                            <?php echo nl2br($board['content']); ?>

                        </div>

                    </div>


                    <div class="row mt-2 border border-dark">
                    </div>

                    <!-- 댓글 -->

                    <div class="row fw-bold mt-2 text-center ">
                        <div class="col-1 fs-6 text-end pb-3">댓글목록 </div>
                        <div class="col-7  text-start fw-normal"></div>
                        <div class="col-1 text-end"></div>
                        <div class="col-3 text-start fw-normal"></div>
                    </div>

                    <?php //$bno : 현재 게시물 고유번호 // 그리고, 아래 내용은 댓글 입력 창

                                


if($_SESSION['id']==null&&$_SESSION['name']==null) { echo "로그인하셔야 댓글을 입력할 수 있습니다";
} else {
    echo "<div class=\"form-floating\">
    <form method='POST' action='".setComments($conn)."' >
    <input type='hidden' name='con_num' value='".$bno."'> 
    <input type='hidden' name='name' value='".$_SESSION['name']."'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea class=\"form-control \" name='content' placeholder=\"이곳에 댓글을 입력하세요\" id=\"floatingTextarea2\" style=\"height: 100px\"  required></textarea>
    <label for=\"floatingTextarea2\"></label>
    ";
    
    echo "

    <input class= 'btn btn-dark' type='submit' name='commentSubmit' id='comment_btn' value='댓글입력'>


    </div>
    </form>
    
    ";
}
    


                    //댓글 불러오기
                    getComments($conn);
                    ?>


                    <!-- <div class="d-flex flex-row bd-highlight mb-3 mt-3 border">
                        <div class="p-8 bd-highlight">
                            <div class="d-flex flex-column bd-highlight mb-3">
                                <div class="p-2 bd-highlight">이름</div>
                                <div class="p-2 bd-highlight">2020.01.11</div>
                                <div class="p-2 bd-highlight">좋은 댓글입니다.ㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇ</div>
                            </div>
                        </div>
                        <div class="p-2 bd-highlight">지우기</div>
                        <div class="p-2 bd-highlight">수정하기</div>
                    </div> -->


            </div>


        </div>



        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-muted">&copy; 2021 어린이집으로</p>

            </footer>
        </div>

        <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        < /sodium_crypto_sign_ed25519_pk_to_curve25519>




        <
        /body>

        <
        /html>