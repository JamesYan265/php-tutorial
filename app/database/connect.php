<?php
//與Database_MYSQL連接
//使用PDO (PHP DATA OBJECT), 本次連接帳號所以無 $password 參數
$user = "root";



// 測試是否真的已經連接
try {
    $pdo = new PDO('mysql:host=localhost;dbname=php-tutorial', $user);
} catch(PDOException $error) {
    echo $error->getMessage();
}
?>