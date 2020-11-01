<?php
    $link = mysqli_connect("localhost","admin","admin","novel2020");

    if(mysqli_connect_error()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $query = "
    SELECT GrammyYear,Award,Genre,Album,Artist
    FROM grammyAlbums 
    ORDER BY GrammyYear 
   ";

    $result = mysqli_query($link,$query);
    $emp_info ='';

    while($row = mysqli_fetch_array($result)){
        $emp_info .= '<tr>';
        $emp_info .= '<td>'.$row['GrammyYear'].'</td>';
        $emp_info .= '<td>'.$row['Award'].'</td>';
        $emp_info .= '<td>'.$row['Genre'].'</td>';
        $emp_info .= '<td>'.$row['Album'].'</td>';
        $emp_info .= '<td>'.$row['Artist'].'</td>';
        $emp_info .= '</tr>';
    }
   
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body{
            font-family : Consolas,monospace;
            font-family : 12px;
        }
        table{
            width : 1800px;
            margin-left:auto;
            margin-right:auto;
        }
        th,td{
            padding : 10px;
            border-bottom : 1px solid #dadada;
        }
    </style>
</head>

<body>
<h1>ANNUAL Grammy Awards | 2004-2018 ALL DATAS</h1>
    <p></p>
    <div style="
        padding:8px;
        height:50px;
        text-align:center;
        background-color: #C3E2DD;
    ">
        <div style="
            margin-left:500px;
            top:0px;
            background-color:#AC99C1;
            height:33px;
            border-radius:10px;
            text-align:center;
            margin:0 auto;
            font-size:30px;
            padding:8px;
            line-height:30px;
            float:left;
            font-weight:800;
        ">  
        <form action="grammy_by_year.php" method="GET">
        BY YEAR
        <input style="
            border-radius:15px;
            border:1px solid #C3E2DD;
            background-color:#FFFFFF;
            font-weight:800;
        "
        type="submit"value="Go to Search">
        </form>
        
        </div>

        <div style="
            margin-left:50px;
            top:0px;
            background-color:#AC99C1;
            height:33px;
            border-radius:10px;
            text-align:center;
            font-size:30px;
            padding:8px;
            line-height:30px;
            float:left;
            font-weight:800;
        ">  
        <form action="grammy_by_genre.php" method="GET">
        BY GENRE
        <input style="
            border-radius:15px;
            border:1px solid #C3E2DD;
            background-color:#FFFFFF;
            font-weight:800;
        "
        type="submit"value="Go to Search">
        </form>
        
        </div>

        

        <div style="
            top:0px;
            background-color:#C8707E;
            height:33px;
            border-radius:10px;
            text-align:center;
            margin-left:50px;
            font-size:30px;
            padding:8px;
            line-height:30px;
            float:left;
            font-weight:800;
        "
         onclick="
            location.href='index.php';
    ">
        HOME
        </div>
       
        <div style="
            top:0px;
            background-color:#F0C7AB;
            height:33px;
            border-radius:10px;
            text-align:center;
            margin-left:50px;
            font-size:30px;
            padding:8px;
            line-height:30px;
            float:left;
            font-weight:800;
        "
         onclick="
            location.href='grammy_stars.php';
    ">
        Grammy STARS
        </div>

        <div style="
            top:0px;
            background-color:#fad3cf;
            height:33px;
            text-align:center;
            margin-left:50px;
            font-size:30px;
            padding:8px;
            line-height:30px;
            float:left;
            font-weight:800;
    ">
        SEARCH A SONG
        </div>

        <div style="
            background-color:#fad3cf;
            height:33px;
            text-align:center;
            font-size:30px;
            padding:8px;
            line-height:30px;
            float:left;
            font-weight:800;
        ">
            <form action="Lyrics_search.php" method="GET" >
                <input style="
                    height:30px;
                    float:left;
                 " type="text" name="lyrics" placeholder="Ex) God Is A Woman">
                <input type="submit" value="SEARCH">
            </form>
        </div>
    </div>

<br>

    <table>
        <tr>
        <th>GrammyYear</th>
        <th>Award</th>
        <th>Genre</th>
        <th>Album</th>
        <th>Artist</th>
        </tr>
        <?=$emp_info?>
    </table>
   
    
</body>

</html>