<?php
$link = mysqli_connect('localhost', 'root', 'st1043', 'w02p');

$query = "SELECT * FROM author";
$result = mysqli_query($link, $query);

$author_info ='';


while ($row = mysqli_fetch_array($result)) {
    $filtered =  array(
    'id' => htmlspecialchars($row['id']),
    'name' => htmlspecialchars($row['name']),
    'profile' => htmlspecialchars($row['profile'])
  );
    $author_info .='<tr>';
    $author_info .='<td>'.$filtered['id'].'</td>';
    $author_info .='<td>'.$filtered['name'].'</td>';
    $author_info .='<td>'.$filtered['profile'].'</td>';
    $author_info .='<td><a href="author.php?id='.$filtered['id'].'">update</a></td>';
    $author_info .='<td>
      <form action="process_delete_author.php" method="post">
      <input type="hidden" name="id" value="'.$filtered['id'].'">
      <input type="submit" value="delete">
      </form>
    </td>';
    $author_info .='</tr>';
};
$escaped = array(
  'name'=>'',
  'profile'=>''
);

$form_action = 'process_create_author.php';
$label_submit = 'Create author';
$form_id = '';
if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    settype($filtered_id, 'integer');
    $query = "SELECT * FROM author WHERE id = {$filtered_id}";
    $result =mysqli_query($link, $query);
    $row=mysqli_fetch_array($result);
    $escaped['name'] = htmlspecialchars($row['name']);
    $escaped['profile'] = htmlspecialchars($row['profile']);

    $form_action = 'process_update_author.php';
    $label_submit = 'Update author';
    $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
}

 ?>

 <!DOCTYPE html>
 <html>
<head>
<meta charset="utf-8">
<title>DATABASE</title>
</head>
<body>
  <h1><a href="index.php">MY FAVORITE : MUSICAL</a></h1>
  <p><a href="index.php">Welcome Page</a></p>

  <table border="1">
    <tr>
      <th>id</th>
      <th>name</th>
      <th>profile</th>
        <th>update</th>
        <th>delete</th>
    </tr>
      <?=$author_info?>
    </table>
    <br>
<form action="<?=$form_action?>" method="POST">
  <?=$form_id?>
  <label for ="fname">name:</label><br>
  <input type="text" id="name" name="name" placeholder="name" value="<?=$escaped['name']?>"><br>
    <label for ="lname">profile:</label><br>
    <input type="text" id="profile" name="profile" placeholder="profile"
    value="<?=$escaped['profile']?>"><br><br>
    <input type="submit" value="<?=$label_submit?>">
  </form>

</body>
 </html>
