<?php 
    session_start();
    date_default_timezone_set('Europe/Copenhagen');
    include $_SERVER['DOCUMENT_ROOT']."/navigation/dbConnect.php";
    include $_SERVER['DOCUMENT_ROOT']."/navigation/commentFunctionSearch.php";

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


    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8da2a0e708f9b1d3b02ede8ffcba231d&libraries=services">
    </script>
    <script src='/xml2json.js'></script>
</head>

<body>
    <main>
        <div class="container">
            <?php 
            // 상단 네비게이션
                include $_SERVER['DOCUMENT_ROOT'].'/navigation/top.php';
            ?>



            <?php
            $stcode = $_GET['stcode'];
            $sigunguCode = $_GET['sigunguCode'];
            ?>



            <div class="container">


                <div class="row">
                    <div class="col-6">
                        <table class="table text-center">

                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">어린이집명</th>
                                    <td id="crname"></td>
                                </tr>
                                <tr>
                                    <th scope="row">어린이집유형</th>
                                    <td id="crtypename"></td>
                                </tr>
                                <tr>
                                    <th scope="row">운영현황</th>
                                    <td id="crstatusname"></td>
                                </tr>
                                <tr>
                                    <th scope="row">상세주소</th>
                                    <td id="craddr"></td>
                                </tr>
                                <tr>
                                    <th scope="row">홈페이지주소</th>
                                    <td id="crhome"></td>
                                </tr>
                                <tr>
                                    <th scope="row">보육교직원수</th>
                                    <td id="chcrtescnt"></td>
                                </tr>
                                <tr>
                                    <th scope="row">정원</th>
                                    <td id="crcapat"></td>
                                </tr>
                                <tr>
                                    <th scope="row">현원</th>
                                    <td id="crchcnt"></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <div id="map" style="width:100%;height:100%;"></div>

                        <script>
                        var url =
                            'https://api.childcare.go.kr/mediate/rest/cpmsapi030/cpmsapi030/request?key=f72049399f6c44d5a1fd737625441fa3&arcode=';

                        var add = '&stcode=';
                        var stcode = '<?php echo $stcode;?>';
                        var sigunguCode = '<?php echo $sigunguCode;?>';

                        fetch(url + sigunguCode + add + stcode)
                            .then(response => response.text())
                            .then(data => {
                                var x2js = new X2JS();
                                var jsonObj = x2js.xml_str2json(data);

                                console.log(jsonObj);

                                var x = jsonObj['response']['item']['la'];
                                var y = jsonObj['response']['item']['lo'];

                                var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
                                    mapOption = {
                                        center: new kakao.maps.LatLng(x, y), // 지도의 중심좌표
                                        level: 4, // 지도의 확대 레벨
                                        mapTypeId: kakao.maps.MapTypeId.ROADMAP // 지도종류
                                    };

                                // 지도를 생성한다 
                                var map = new kakao.maps.Map(mapContainer, mapOption);

                                // 지도에 마커를 생성하고 표시한다
                                var marker = new kakao.maps.Marker({
                                    position: new kakao.maps.LatLng(x, y), // 마커의 좌표
                                    map: map // 마커를 표시할 지도 객체
                                });


                                //지도 옆, 어린이집 정보 데이터를 변경시켜주는 명령
                                //
                                document.getElementById('crname').innerText = jsonObj['response']['item']['crname'];
                                document.getElementById('crtypename').innerText = jsonObj['response']['item'][
                                    'crtypename'
                                ];
                                document.getElementById('crstatusname').innerText = jsonObj['response']['item'][
                                    'crstatusname'
                                ];

                                document.getElementById('craddr').innerText = jsonObj['response']['item']['craddr'];

                                document.getElementById('crhome').innerText = jsonObj['response']['item']['crhome'];
                                document.getElementById('chcrtescnt').innerText = jsonObj['response']['item'][
                                    'chcrtescnt'
                                ];

                                document.getElementById('crcapat').innerText = jsonObj['response']['item'][
                                    'crcapat'
                                ];

                                document.getElementById('crchcnt').innerText = jsonObj['response']['item'][
                                    'crchcnt'
                                ];
                                document.getElementById('class_cnt_00').innerText = jsonObj['response']['item'][
                                    'CLASS_CNT_00'
                                ];

                                document.getElementById('class_cnt_01').innerText = jsonObj['response']['item'][
                                    'CLASS_CNT_01'
                                ];
                                document.getElementById('class_cnt_02').innerText = jsonObj['response']['item'][
                                    'CLASS_CNT_02'
                                ];
                                document.getElementById('class_cnt_03').innerText = jsonObj['response']['item'][
                                    'CLASS_CNT_03'
                                ];
                                document.getElementById('class_cnt_04').innerText = jsonObj['response']['item'][
                                    'CLASS_CNT_04'
                                ];
                                document.getElementById('class_cnt_05').innerText = jsonObj['response']['item'][
                                    'CLASS_CNT_05'
                                ];
                                document.getElementById('class_cnt_m2').innerText = jsonObj['response']['item'][
                                    'CLASS_CNT_M2'
                                ];
                                document.getElementById('class_cnt_m5').innerText = jsonObj['response']['item'][
                                    'CLASS_CNT_M5'
                                ];
                                document.getElementById('class_cnt_sp').innerText = jsonObj['response']['item'][
                                    'CLASS_CNT_SP'
                                ];
                                document.getElementById('class_cnt_tot').innerText = jsonObj['response']['item'][
                                    'CLASS_CNT_TOT'
                                ];
                                document.getElementById('CHILD_CNT_00').innerText = jsonObj['response']['item'][
                                    'CHILD_CNT_00'
                                ];
                                document.getElementById('CHILD_CNT_01').innerText = jsonObj['response']['item'][
                                    'CHILD_CNT_01'
                                ];

                                document.getElementById('CHILD_CNT_02').innerText = jsonObj['response']['item'][
                                    'CHILD_CNT_02'
                                ];
                                document.getElementById('CHILD_CNT_03').innerText = jsonObj['response']['item'][
                                    'CHILD_CNT_03'
                                ];
                                document.getElementById('CHILD_CNT_04').innerText = jsonObj['response']['item'][
                                    'CHILD_CNT_04'
                                ];
                                document.getElementById('CHILD_CNT_05').innerText = jsonObj['response']['item'][
                                    'CHILD_CNT_05'
                                ];
                                document.getElementById('CHILD_CNT_M2').innerText = jsonObj['response']['item'][
                                    'CHILD_CNT_M2'
                                ];
                                document.getElementById('CHILD_CNT_M5').innerText = jsonObj['response']['item'][
                                    'CHILD_CNT_M5'
                                ];
                                document.getElementById('CHILD_CNT_SP').innerText = jsonObj['response']['item'][
                                    'CHILD_CNT_SP'
                                ];
                                document.getElementById('CHILD_CNT_TOT').innerText = jsonObj['response']['item'][
                                    'CHILD_CNT_TOT'
                                ];














                            });
                        </script>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">연령</th>
                                    <th scope="col">만0세</th>
                                    <th scope="col">만1세</th>
                                    <th scope="col">만2세</th>
                                    <th scope="col">만3세</th>
                                    <th scope="col">만4세</th>
                                    <th scope="col">만5세</th>
                                    <th scope="col">영아혼합(만0~2세)</th>
                                    <th scope="col">유아혼합(만3~5세)</th>
                                    <th scope="col">특수/장애</th>
                                    <th scope="col">총계</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">반수</th>
                                    <td id="class_cnt_00"></td>
                                    <td id="class_cnt_01"></td>
                                    <td id="class_cnt_02"></td>
                                    <td id="class_cnt_03"></td>
                                    <td id="class_cnt_04"></td>
                                    <td id="class_cnt_05"></td>
                                    <td id="class_cnt_m2"></td>
                                    <td id="class_cnt_m5"></td>
                                    <td id="class_cnt_sp"></td>
                                    <td id="class_cnt_tot"></td>
                                </tr>
                                <tr>
                                    <th scope="row">아동수</th>
                                    <td id="CHILD_CNT_00"></td>
                                    <td id="CHILD_CNT_01"></td>
                                    <td id="CHILD_CNT_02"></td>
                                    <td id="CHILD_CNT_03"></td>
                                    <td id="CHILD_CNT_04"></td>
                                    <td id="CHILD_CNT_05"></td>
                                    <td id="CHILD_CNT_M2"></td>
                                    <td id="CHILD_CNT_M5"></td>
                                    <td id="CHILD_CNT_SP"></td>
                                    <td id="CHILD_CNT_TOT"></td>


                                </tr>
                            </tbody>

                        </table>

                    </div>
                </div>

                <?php //$bno : 현재 게시물 고유번호 // 그리고, 아래 내용은 댓글 입력 창



                    if($_SESSION['id']==null && $_SESSION['name']==null) { echo "로그인하셔야 댓글을 입력할 수 있습니다";
                    } else {
                        echo "<div class=\"form-floating\">
                        <form method='POST' action='".setComments($conn)."' >
                        <input type='hidden' name='stcode' value='".$stcode."'> 
                        <input type='hidden' name='sigunguCode' value='".$sigunguCode."'> 
                        <input type='hidden' name='name' value='".$_SESSION['name']."'>
                        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                        <textarea class=\"form-control \" name='content' placeholder=\"이곳에 댓글을 입력하세요\" id=\"floatingTextarea2\" style=\"height: 100px\"></textarea>
                        <label for=\"floatingTextarea2\"></label>
                        ";
                        
                        

                        echo "
                        <input class= 'btn btn-dark' type='submit' name='commentSubmit' value='댓글입력'>
                        
                        </div>
                        </form>
                        
                        ";
                    }

                    //댓글 불러오기
                    getComments($conn);
                    ?>

            </div>



        </div>
    </main>
    <!-- <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->


    <?php 
    // 하단 footer
    include $_SERVER['DOCUMENT_ROOT'].'/navigation/bottom.php';
    ?>





</body>

</html>