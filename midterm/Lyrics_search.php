<?php
    $link = mysqli_connect("localhost","admin","admin","novel2020");

    if(isset($_GET['lyrics'])){
        $Lyricses = mysqli_real_escape_string($link,$_GET['lyrics']);
    }else{
        $Lyricses = mysqslei_real_escape_string($link,$_POST['lyrics']);
    }

    $query ="
    SELECT DISTINCT Lyrics
    FROM billboardHot100
    WHERE Name = '{$Lyricses}'
    ";

    $query2 ="
    SELECT DISTINCT h.Artists, h.Name, ga.Album
    FROM grammyAlbums ga
    INNER JOIN billboardHot100 h ON h.Artists=ga.Artist
    WHERE Name = '{$Lyricses}'
    ";

    $query3 ="
    SELECT DISTINCT Writing,Features
    FROM billboardHot100
    WHERE Name='{$Lyricses}'
    ";



    $result=mysqli_query($link,$query);

    $result2=mysqli_query($link,$query2);

    $result3=mysqli_query($link,$query3);

    $emp_info ='';

    while($row = mysqli_fetch_array($result)){
        $emp_info .= '<tr>';
        $emp_info .= '<td>'.$row['Lyrics'].'</td>';
        $emp_info .= '</tr>';
    }

    $emp_info2 ='';

    while($row2 = mysqli_fetch_array($result2)){
        $emp_info2 .= '<tr>';
        $emp_info2 .= '<td>'.$row2['Artists'].'</td>';
        $emp_info2 .= '<td>'.$row2['Name'].'</td>';
        $emp_info2 .= '<td>'.$row2['Album'].'</td>';
        $emp_info2 .= '</tr>';
    }

    $emp_info3 ='';

    while($row2 = mysqli_fetch_array($result3)){
        $emp_info3 .= '<tr>';
        $emp_info3 .= '<td>'.$row2['Writing'].'</td>';
        $emp_info3 .= '<td>'.$row2['Features'].'</td>';
        $emp_info3 .= '</tr>';
    }

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
<h1>Search a SONG | ABOUT <?=$Lyricses?></h1>
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
    </div>

    <table style="
        background-color:#F4E1F1;
        position:fixed;
        width:600px;
        top:200px;
        left:200px;
        border-radius:30px;
    ">
    <tr>
    <br>
    <th style="
        font-size:30px;
    ">Lyrics</th>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <?=$emp_info?>
    </table>

    <table style="
    background-color:#E5C1C5;
    position:fixed;
    top:200px;
        width:800px;
        float:left;
        left:1000px;
        font-size:25px;
        text-align:center;
        margin:0 auto;
        border-radius:15px;
    ">
    <tr>
    <th>ARTIST</th>
    <th>SONG NAME</th>
    <th>ALBUM</th>
    </tr>
    <?=$emp_info2?>
    
    </table>

    <table style="
    background-color:#fad3cf;
    position:fixed;
    top:300px;
        width:800px;
        float:left;
        left:1000px;
        font-size:25px;
        text-align:center;
        margin:0 auto;
        border-radius:15px;
    ">
    <tr>
    <th>WRITNED BY</th>
    <th>FEATURES</th>
    </tr>
    <?=$emp_info3?>
    
    </table>

    <div style="
        position:fixed;
        top:480px;
        background-color:#d1d0e0;
        width:300px;
        height:200px;
        left:1250px;
        border-radius:50px;
        text-align:center;
        margin:0 auto;
    "
    >
    <br>
    <h1>Search a SONG</h1>

   
    <form action="Lyrics_search.php" method="GET" >
    <input style="
        height:30px;
    " type="text" name="lyrics" placeholder="Ex) God Is A Woman">
    <input style="
        height:30px;
    "type="submit" value="SEARCH">
    </form>
    
</div>

   
</body>

</html>