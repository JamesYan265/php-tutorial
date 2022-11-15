<!-- apache sever setting in localhost:8080
所以文件路徑為 http://localhost:8080/php-tutorial/ -->

<?php

//import connect.php
include_once("./app/database/connect.php");
// php 宣告變數要加$ 
//print_r($title)先顯示出來 
//var_dump($title) 會顯示data type 同 值
//$_POST[]可以取得被指定method 中 name 的 值
//isset()測試有無值

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="JamesYan" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>訊息程式</title>
</head>
<body>
    <?php include("app/parts/header.php") ?>

    <!-- Value Checking 訊息 -->
    <?php include("app/parts/validation.php") ?>

    <!-- thread section -->
    <?php include("app/parts/thread.php") ?>

    <!-- Newthread section -->
    <?php include("app/parts/newThreadButton.php") ?>

</body>
</html>