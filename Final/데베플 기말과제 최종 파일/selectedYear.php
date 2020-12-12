<?php 
     $link = mysqli_connect('localhost', 'mobeom', 'dbp2020t5!', 'mobeom'); 
      
     if(mysqli_connect_errno()){ 
         echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요."; 
         echo "<br>"; 
         echo mysqli_connect_error(); 
         exit(); 
     } 
 
 
     $query = " 
     SELECT selectedDate, restaurantName, roadAddress, businessName, phoneNumber 
     FROM selectedRestDB 
     ORDER BY selectedDate; 
     "; 
 
 
     $result = mysqli_query($link, $query); 
 
 
     $article = ''; 
     while($row = mysqli_fetch_array($result)){ 
         $article .= '<tr><td>'; 
         $article .= $row['selectedDate']; 
         $article .= '</td><td>'; 
         $article .= $row['restaurantName']; 
         $article .= '</td><td>'; 
         $article .= $row['roadAddress']; 
         $article .= '</td><td>'; 
         $article .= $row['businessName']; 
         $article .= '</td><td>'; 
         $article .= $row['phoneNumber']; 
         $article .= '</td></tr>'; 
     } 
 
 
     mysqli_free_result($result); 
     mysqli_close($link); 
 ?> 
 
 
<!DOCTYPE html> 
 <html> 
 <head> 
     <meta charset="utf-8"> 
     <title> 모범음식점 지정년도 </title> 
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
         <h2><a href="index.php">모범 음식점</a> | 전통있는 모범음식점 현황</h2> 
         <table border="1">
            <tr>
                <td>지정일자</td>
                <td>식당 이름</td>
                <td>주소</td>
                <td>메뉴 분류</td>
                <td>전화번호</td>
            </tr>
         <?=$article?>
         </table> 

 </body> 
 </html> 