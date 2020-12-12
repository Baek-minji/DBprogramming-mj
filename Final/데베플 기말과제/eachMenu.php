<?php
    $link = mysqli_connect('localhost', 'mobeom', 'dbp2020t5!', 'mobeom');
    $query = " 
    SELECT * FROM selectedRestDB ORDER BY selectedDate DESC ";
    $result = mysqli_query($link, $query);
    //print_r($result);  
    //$row = mysqli_fetch_array($result);
    //print_r($row);
    $r_info = '';
    
    while($row = mysqli_fetch_array($result)) {
        $r_info .= '<tr>';
        $r_info .= '<td>'.$row['selectedDate'].'</td>';
        $r_info .= '<td>'.$row['restaurantName'].'</td>';
        $r_info .= '<td>'.$row['roadAddress'].'</td>';
        $r_info .= '<td>'.$row['businessName'].'</td>';  
        $r_info .= '<td>'.$row['mainFood'].'</td>';
        $r_info .= '<td>'.$row['dongName'].'</td>';
        $r_info .= '<td>'.$row['phoneNumber'].'</td>';
        $r_info .= '</tr>';
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
    <title>모범 음식점</title>
</head>
<body>
    <h2><a href="index.php">모범 음식점</a> | 업태명 분류</h2>
    <p> 업태명 선택</p>
    <form action="eachMenu_process.php" method="GET">
        <select name="businessName">
            <option value="전체">=== 선택 ===</option>
            <option value="경양식">경양식</option>
            <option value="기타" >기타</option>
            <option value="식육(숯불구이)">식육(숯불구이)</option>
            <option value="일식">일식</option>
            <option value="중국식" >중국식</option>
            <option value="탕류(보신용)">탕류(보신용)</option>
            <option value="한식">한식</option>
            <option value="호프/통닭" >호프/통닭</option>
            <option value="회집">회집</option>
        </select>
        <input type="submit" value="검색"/>
    </form>

    <table border="1">
        <tr>
            <td>지정일자</td>
            <td>식당 이름</td>
            <td>소재지도로명</td>
            <td>업태명</td>
            <td>주요 음식</td>
            <td>소재지 행정동</td>
            <td>전화번호</td>
        </tr>
        <?= $r_info ?>
    </table>

</body>
</html>