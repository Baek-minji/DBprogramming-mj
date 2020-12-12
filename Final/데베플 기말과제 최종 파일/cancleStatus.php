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
    
</body>
</html>