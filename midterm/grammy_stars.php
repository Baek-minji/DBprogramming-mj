<?php
    $link = mysqli_connect("localhost","admin","admin","novel2020");

    if(mysqli_connect_error()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $query ="
    SELECT DISTINCT df.Followers,df.Artist,df.Genres,df.Gender,df.NumAlbums
    FROM artistDf df
    INNER JOIN grammySongs gs ON gs.Artist=df.Artist
    ORDER BY Followers
    DESC";
    

    $result = mysqli_query($link,$query);
    $emp_info ='';

    while($row = mysqli_fetch_array($result)){
        $emp_info .= '<tr>';
        $emp_info .= '<td>'.$row['Followers'].'</td>';
        $emp_info .= '<td>'.$row['Artist'].'</td>';
        $emp_info .= '<td>'.$row['Genres'].'</td>';
        $emp_info .= '<td>'.$row['Gender'].'</td>';
        $emp_info .= '<td>'.$row['NumAlbums'].'</td>';
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
            display:block;
            overflow: auto;
            width:1200px;
            top:0px;
            margin-left:auto;
            margin-right:auto;
            text-align:center;
        }
        th,td{
            padding : 10px;
            border-bottom : 1px solid #dadada;
        }
    </style>
</head>

<body>
<h1>HOT GRAMMY STARS | By Followers</h1>
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

    <table style="
        width:1500px;
    ">
        <tr>
        <th>Followers</th>
        <th>Artist</th>
        <th>Genres</th>
        <th>Gender</th>
        <th>NumAlbums</th>
        </tr>
        <?=$emp_info?>
    </table>
   
    
</body>

</html>