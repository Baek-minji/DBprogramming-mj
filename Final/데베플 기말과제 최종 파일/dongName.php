<?php 
$link = mysqli_connect('localhost','mobeom','dbp2020t5!','mobeom');

if(mysqli_connect_error()){
    echo "접속에 실패했습니다. 관리자에게 문의하세요";
    exit();
}

$query = "
    SELECT restaurantName, businessName, roadAddress, selectedYear, phoneNumber
    FROM selectedRestDB
    ORDER BY restaurantName
";

$result = mysqli_query($link,$query);

$restColumn='';

while($row = mysqli_fetch_array($result)){
    $restColumn .= '<tr>';
    $restColumn .= '<td>'.$row['restaurantName'].'</td>';
    $restColumn .= '<td>'.$row['businessName'].'</td>';
    $restColumn .= '<td>'.$row['roadAddress'].'</td>';
    $restColumn .= '<td>'.$row['selectedYear'].'</td>';
    $restColumn .= '<td>'.$row['phoneNumber'].'</td>';
    $restColumn .= '</tr>';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style> 
         body{ 
             font-family: Consolas, monospace; 
             font-family: 12px; 
         } 
         table{ 
             width: 100%; 
         } 
         th,td{ 
             padding: 10px; 
             border-bottom: 1px solid #dadada; 
         } 
     </style>
</head>
<body>
    <h2><a href="index.php">모범 음식점</a> | 모범 음식점 지정 현황</h3>
    <form action="dongName_process.php" method="GET">
    <label>행정동을 선택하여 주세요(미선택시 전체선택)</label>
    <select name="dongNames">
        <option value="none" selected>=== 선택 ===</option>
        <option value="돈암제1동">돈암제1동</option>
        <option value="돈암제2동">돈암제2동</option>
        <option value="동선동">동선동</option>
        <option value="보문동">보문동</option>
        <option value="삼선동">삼선동</option>
        <option value="석관동">석관동</option>
        <option value="성북동">성북동</option>
        <option value="안암동">안암동</option>
        <option value="월곡제1동">월곡제1동</option>
        <option value="월곡제2동">월곡제2동</option>
        <option value="장위제1동">장위제1동</option>
        <option value="장위제2동">장위제2동</option>
        <option value="장위제3동">장위제3동</option>
        <option value="정릉제1동">정릉제1동</option>
        <option value="정릉제3동">정릉제3동</option>
        <option value="정릉제4동">정릉제4동</option>
        <option value="종암동">종암동</option>
        <input type="submit" value="검색">
    </select>
    </form>

    <table border="1">
        <tr>
            <td>식당 이름</td>
            <td>업태명</td>
            <td>소재지도로명</td>
            <td>지정년도</td>
            <td>전화번호</td>
        </tr>
        <?=$restColumn?>
    </table>

</body>
</html>