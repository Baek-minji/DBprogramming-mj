<?php
$link = mysqli_connect("localhost","root","st1043","w02p");
$query = "
SELECT * FROM musical;
";
$result = mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
  $list=$list. "<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}

$article =  array(
  'title' => 'Welcome',
  'description' => '...'
);

if(isset($_GET['id'])){
  $query = "
  SELECT * FROM musical where id={$_GET['id']}
  ";
  $result = mysqli_query($link,$query);
  $row = mysqli_fetch_array($result);
  $article = array(
    'title' => $row['title'],
    'description' => $row['description']
  );
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> DBP_WORK1 </title>
</head>
<body>
  <h1> MY FAVORITE : MUSICAL </h1>
  <h2>The Musical I've seen .. since 2015</h2>
  <ol>
    <?=$list?>
  </ol>

  <h3>Please fill out the blanks!</h3>
  <form action="process_create.php" method="POST">
    <p><input type="text" name="title" placeholder="Musical title"</p>
    <p><textarea name="description" placeholder="description"></textarea></p>
      <p><input type="submit"></p>
    </form>
</body>
</html>
