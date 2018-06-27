<?php

$pdo = new PDO("mysql:host=localhost;dbname=netology;charset=utf8", 'basova', 'basova', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$pdo -> exec('SET NAMES utf8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isbn = $_POST['isbn'];
    $name = $_POST['name'];
    $author = $_POST['author'];
    $sql = "SELECT * FROM books WHERE ((name LIKE :name) AND (isbn LIKE :isbn) AND (author LIKE :author))";
    $statement = $pdo -> prepare($sql);
    $statement -> execute(["name"=>"%{$name}%","isbn"=>"%{$isbn}%","author"=>"%{$author}%"]);
} else {
    $sql = "SELECT * FROM books";
    $statement = $pdo -> prepare($sql);
    $statement -> execute();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <title></title>
  <meta charset="UTF-8">
</head>
<body>
  <h1>Библиотека успешного человека</h1>
  <form method="POST">
    <input  type="text" name="isbn" placeholder="ISBN" value="<?php if (!empty($_POST)){echo $_POST['isbn'];} ?>">
    <input type="text" name="name" placeholder="Название книги" value="<?php if (!empty($_POST)){echo $_POST['name'];} ?>">
    <input type="text" name="author" placeholder="Автор книги" value="<?php if (!empty($_POST)){echo $_POST['author'];} ?>">
    <button type="submit">Поиск</button>
  </form>
  
  <table>
    <tr>
      <th>Название</th>
      <th>Автор</th>
      <th>Год выпуска</th>
      <th>Жанр</th>
      <th>ISBN</th>
    </tr>
    <?php foreach ($statement as $row) : ?>
      <tr>
        <td><?=$row['name']?></td>
        <td><?=$row['author']?></td>
        <td><?=$row['year']?></td>
        <td><?=$row['genre']?></td>
        <td><?=$row['isbn']?></td>
      </tr>
    <?php endforeach;?>
  </table>
</body>
</html>