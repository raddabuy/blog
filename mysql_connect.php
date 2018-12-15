<?php
    $user = 'root';
    $password = '';
    $db = 'testing';
    $host = 'localhost';

    //$connection = mysqli_connect($host, $user, $password, $db);
    //mysqli_set_charset($connection, 'utf8');

    $dsn = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';
    $pdo = new PDO($dsn, $user, $password);


    //mysql_query("SET NAMES UTF8");
    //mysql_query("SET CHARACTER SET UTF8");
    //$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES utf8');
 ?>
