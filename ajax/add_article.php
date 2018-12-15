<?php

$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
$intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
$text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));

$error = '';
if(strlen($title) <= 3)
  $error = 'Введите название статьи';
else if(strlen($intro) <= 15)
  $error = 'Введите интро статьи';
else if(strlen($text) <= 20)
  $error = 'Введите текст статьи';

  if ($error!='') {
    echo $error;
    exit();
  }

  require_once '../mysql_connect.php';

  $sql = 'INSERT INTO articles(title, intro, article, date, author) VALUES(?, ?, ?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$title, $intro, $text, time(), $_COOKIE['login']]);

  echo "Готово";
?>
