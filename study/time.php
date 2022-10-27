<?php
$timezones = ["Asia/Seoul", "America/New_York"];
//timezones라는 변수에 배열을 담았다.
echo implode(',', $timezones);
//implode라는 함수는 두 개의 인자를 갖는다
//첫번째 인자는 배열의 원소들을 묶어서 하나의 문자로 만들어주는데,
//묶을 때, 각각의 원소를 콤마(,)로 연결해준다
?>