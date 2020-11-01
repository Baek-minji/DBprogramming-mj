<?php
    $link = mysqli_connect("localhost","admin","admin","novel2020");

    if(mysqli_connect_error()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $query2 = "
    SELECT GrammyYear,count(Award) AS COUNT
    FROM grammyAlbums
    GROUP BY GrammyYear
    ORDER BY GrammyYear;
    ";

    $result2 = mysqli_query($link,$query2);


    $emp_info2 ='';

    while($row = mysqli_fetch_array($result2)){
        $emp_info2 .= '<tr>';
        $emp_info2 .= '<td>'.$row['GrammyYear'].'</td>';
        $emp_info2 .= '<td>'.$row['COUNT'].'</td>';
        $emp_info2 .= '</tr>';
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
            width : 80%;
        }
        th,td{
            padding : 10px;
            border-bottom : 1px solid #dadada;
        }
    </style>
</head>

<body>
<h1>ANNUAL Grammy Awards | BY YEAR</h1>
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

<div style="
    background-color:#d1d0e0; 
    padding:5px;
    height:20px;
">
    <form action="grammy_by_year_search.php" method="GET" style="
        font-size:20px;
        font-style:italic;
    ">
            <label>Enter a YEAR You want to find:</label>
            <input type="text" name="by_year" placeholder="Ex) 2018">
            <input type="submit" value="Search">
    </form>
</div>

<br>

<div style="
    position:fixedl
    float:left;
    left:120px;
">
        <div style="
        position:fixed;
        left:115px;
        ">
        <h2>POPULAR ALBUM</h2>
        </div>
        
        <div style="
        position:fixed;
        top:290px;
        left:100px;
        ">
            <img src="https://images-na.ssl-images-amazon.com/images/I/91SqBp7DtVL._SY355_.jpg"
            width=200px>
            <br><br>
            <h2>Ariana Grande</h2>
            <h3>Sweetener<h3>
            <h4>was out in 2018</h4>
            <br>
            <h3>Best Pop Vocal Album<h3>
            <h4>at the GRAMMY AWARDS</h4>
        <div style="
            position:fixed;
            top:790px;
            left:100px;
        ">
        <img src="https://www.grammy.com/sites/com/files/styles/news_detail_header/public/gettyimages-953566612.jpg?itok=_8J35fjI"
            width=200px;>
        </div>
</div>

<div 
    style="
    position:fixed;
    width:500px;
    height:800px;
">
    <table style="
        position:fixed;
        float:left;
        width:1050px;
        left:600px;
    ">
        <tr>
        <th>GrammyYear</th>
        <th>TOTAL</th>
        </tr>
        <?=$emp_info2?>
    </table>
    </div>
   
    
</body>

</html>