<?php

//$connect = mysqli_connect("localhost", "basova", "basova", "netology");

$filename = 'dump.sql'; // Имя файла дампа
$mysql_host = 'localhost'; // Адрес сервера MySQL
$mysql_username = 'basova'; // Имя пользователя MySQL
$mysql_password = 'basova'; // Пароль MySQL
$mysql_database = 'netology'; // Имя БД
 
$link = mysqli_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysqli_error($link));
mysqli_select_db($link, $mysql_database) or die('Error selecting MySQL database: ' . mysqli_error($link));
 
$templine = '';
$lines = file($filename);
foreach ($lines as $line){
  if (substr($line, 0, 2) == '--' || $line == '')
    continue;
  $templine .= $line;
  if (substr(trim($line), -1, 1) == ';'){
    mysqli_query($link, $templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($link) . '
 
');
    $templine = '';
  }
}
echo "Таблицы успешно импортированы";



/*$link = mysqli_connect("localhost", "basova", "basova", "netology");

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Соединение с MySQL установлено!" . PHP_EOL;
echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);


include "config.php";
$sql = "select * from shop";
$res = mysqli_query($connect, $sql);

while($data = mysqli_fetch_assoc($res)) {
    echo "Автомобиль {$data['name']} стоит {$data['price']}<br>";
}


1. Подключение к базе данных
$pdo = new PDO("mysql:host=localhost;dbname=students", "root", "qwerty123");
2. Подготовка запроса
$sql = "SELECT name FROM students";
3. Выполнение запроса и получение результатов
foreach ($pdo->query($sql) as $row) {
echo $row['name'] . "<br />";
}


*/
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title></title>
</head>
<body>
</body>
</html>