<?php 
$link = mysqli_connect('localhost','mobeom','dbp2020t5!','mobeom');

if(mysqli_connect_error()){
    echo "접속에 실패했습니다. 관리자에게 문의하세요";
    exit();
}

if(isset($_GET['reasonForCancle'])){
    $reasonForCancle = mysqli_real_escape_string($link,$_GET['reasonForCancle']);
}else{
    $reasonForCancle = mysqslei_real_escape_string($link,$_POST['reasonForCancle']);
}

if($reasonForCancle == "전체선택"){
    $query = "
        SELECT selectedDate, cancleDate, restaurantName, roadAddress, businessName, reasonForCancle 
        FROM cancledRestDB
        ORDER BY restaurantName";
} else {
    $query = "
        SELECT selectedDate, cancleDate, restaurantName, roadAddress, businessName, reasonForCancle 
        FROM cancledRestDB
        where reasonForCancle ='{$reasonForCancle}'
        ORDER BY restaurantName";
}

$result = mysqli_query($link,$query);

$article ='';

while($row = mysqli_fetch_array($result)){
        $article .= '<tr>';
        $article .= '<td>'.$row['selectedDate'].'</td>';
        $article .= '<td>'.$row['cancleDate'].'</td>';
        $article .= '<td>'.$row['restaurantName'].'</td>';
        $article .= '<td>'.$row['roadAddress'].'</td>';
        $article .= '<td>'.$row['businessName'].'</td>';
        $article .= '<td>'.$row['reasonForCancle'].'</td>';
        $article .= '</tr>';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 모범 음식점 </title>
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
<h2><a href="index.php">모범 음식점</a> | 모범 음식점 취소 현황</h2>
    <p>취소 사유를 선택해주세요 (미선택시 전체선택)</p>
    <form action="cancleStatus_process.php" method="GET">
        <select name="reasonForCancle">
            <option value="전체선택"> 취소 사유를 선택해주세요 </option>
            <option value="전체선택"> 전체선택 </option>
            <option value="부적합"> 부적합 </option>
            <option value="재지정 안됨"> 재지정 안됨 </option>
            <option value="재지정 신청포기"> 재지정 신청포기 </option>
            <option value="행정처분"> 행정처분 </option>
            <option value="점검불가"> 점검불가 </option>
            <option value="지정기준미달"> 지정기준미달 </option>
            <option value="기준미흡(서울시위생등급평가)"> 기준미흡(서울시위생등급평가) </option>
            <option value="지위승계"> 지위승계 </option>
            <option value="모범음식점 기준 미흡"> 모범음식점 기준 미흡 </option>
            <option value="영업자지위승계"> 영업자지위승계 </option>
            <option value="기준미흡"> 기준미흡 </option>
            <option value="폐업예정"> 폐업예정 </option>
            <option value="취소요구"> 취소요구 </option>
            <option value="주류위주판매업소"> 주류위주판매업소 </option>
            <option value="혐오식품판매"> 혐오식품판매 </option>
            <option value="배달전문"> 배달전문 </option>
            <option value="행정처분(영업정지)"> 행정처분(영업정지) </option>
        <input type="submit" value="검색"/>
        </select>
    </form>
    
    <table border="1">
        <tr>
            <td>지정일자</td>
            <td>취소일자</td>
            <td>식당이름</td>
            <td>소재지 도로명</td>
            <td>업태명</td>
            <td>취소 사유</td>
        </tr>
        <p> <?=$reasonForCancle?> 취소 사유 검색결과입니다. </p>
        <?=$article?>
    </table>
    
</body>
</html>