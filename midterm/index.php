<?php
    $link = mysqli_connect("localhost","admin","admin","novel2020");
    $query ="
    SELECT *
    FROM grammyAlbums
    ";
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <div style="
        top:0px;
        font-size:50px;
        text-align:center;
    ">
        <h1>GRAMMY AWARDS</h1>
    </div>

    <div style="
        position:fixed;
        left:400px;
        top:300px;
        background-color:#AC99C1;
        width:300px;
        height:300px;
        border-radius:200px;
        text-align:center;
        text-lign:middle;
        margin:0 auto;
        vertical-align:middle;
      
    " 
    onclick="
    location.href='annual_grammy.php';
    "
    >
    <br><br><br><br>
    <h1>Annual GRAMMY Awards</h1>
</div>


<div style="
        position:fixed;
        left:1200px;
        top:300px;
        background-color:#AC99C1;
        width:300px;
        height:300px;
        border-radius:200px;
        text-align:center;
        text-lign:middle;3
        margin:0 auto;
        vertical-align:middle;
      
    " 
    onclick="
    location.href='grammy_stars.php';
    "
    >
    <br><br><br><br>
    <h1>HOT Grammy STARS</h1>
</div>

<div style="
        position:fixed;
        top:650px;
        background-color:#d1d0e0;
        width:180px;
        height:130px;
        left:300px;
        border-radius:50px;
        text-align:center;
        margin:0 auto;
        text
    " 
    onclick="
    location.href='grammy_by_year.php';
    "
    >
    <br>
    <h1>By YEAR</h1>
    </div>

    <div style="
        position:fixed;
        top:650px;
        background-color:#d1d0e0;
        width:180px;
        height:130px;
        left:600px;
        border-radius:50px;
        text-align:center;
        margin:0 auto;
        text
    " 
    onclick="
    location.href='grammy_by_genre.php';
    ">
    <br>
    <h1>By GENRE</h1>
</div>


<div style="
        position:fixed;
        top:650px;
        background-color:#d1d0e0;
        width:300px;
        height:200px;
        left:1200px;
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