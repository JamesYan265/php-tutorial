<!-- apache sever setting in localhost:8080
所以文件路徑為 http://localhost:8080/php-tutorial/ -->

<?php

//import connect.php
include_once("../database/connect.php");
// php 宣告變數要加$ 
//print_r($title)先顯示出來 
//var_dump($title) 會顯示data type 同 值
//$_POST[]可以取得被指定method 中 name 的 值
//isset()測試有無值

// 建立新的留言板功能 //
include("../../app/functions/thread_add.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="JamesYan" />
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>新的留言通訊展示板程式</title>
</head>
<body>
    <?php include("../../app/parts/header.php") ?>

    <!-- Value Checking 訊息 -->
    <?php include("../parts/validation.php") ?>

    <!-- NewThread Section -->
    <div style="padding-left: 36px; color:blue;">
        <h2 style="margin-top: 20px; margin-bottom: 0;">新的留言通訊展示板</h2>
    </div>

    <form method="post" class="formWrapper">
        <div>
            <label>留言通訊展示板主題</label>
            <input type="text" name="title" />
            <label>姓名</label>
            <input type="text" name="username" />
        </div>
        <div>
            <textarea name="commentBody" class="commentTextArea"></textarea>
        </div>
        <input type="submit" value="發佈新主題" name="threadSubmitButton">
    </form>

</body>
</html>