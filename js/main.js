console.log("Peter");

const btnCallApi = document.querySelector("#btn_call_api");
btnCallApi.addEventListener("click", function () {
    console.log("버튼을 클릭했습니다");
});

// const request = new XMLHttpRequest();
// request.open(
//     "GET",
//     "https://apis.data.go.kr/B260003/VolunteerActivityGuideService/getVolunteerActivityGuideList?serviceKey=JkGgA4Nb73MgGPy9bNrJPLOjpvhW6R22p0UMW1WF8Ch2m8hW%2By0H37RWesIL4Bk3AkbEam3TNOeBn4V2X4H3sA%3D%3D&numOfRows=10",
//     true
// );

// request.onload = function () {
//     if (request.status >= 200 && request.status < 400) {
//         // API 호출이 성공한 경우
//         const data = JSON.parse(request.responseText);
//         // API 응답 데이터를 처리하는 코드
//         console.log(data);
//     } else {
//         // API 호출이 실패한 경우
//         console.log("에러 발생:", request.statusText);
//     }
// };

// request.onerror = function () {
//     // 네트워크 에러 처리 코드
//     console.log("네트워크 에러 발생");
// };

// request.send();
