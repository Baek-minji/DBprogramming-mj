<?php
$link = mysqli_connect("localhost", "root", "st1043", "w02p");
$query = "
SELECT * FROM musical;
";
$result = mysqli_query($link, $query);
while ($row=mysqli_fetch_array($result)) {
    $list=$list. "<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}

$article =  array(
  'title' => 'Welcome',
  'description' => 'Writer is.. Baek minji..'
);
$update_link = '';
$delete_link = '';

if (isset($_GET['id'])) {
    $query = "
  SELECT * FROM musical where id={$_GET['id']}
  ";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
    'title' => $row['title'],
    'description' => $row['description']
  );
    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';

    $delete_link = '
      <form action ="process_delete.php" method="POST">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="submit" value="delete">
      </form>
    ';
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
  <h2>The Musical I've seen .. since 2017</h2>
  <ol><?=$list ?></ol>
  <a href="create.php">create</a>
  <?=$update_link?>
  <?=$delete_link?>
  <h2><?= $article['title']?></h2>
  <?= $article['description']?>
</body>
</html>
