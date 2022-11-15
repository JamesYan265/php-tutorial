<?php

$comment_array = array();

//comment data 係 DB table 中取得
$sql = "SELECT * FROM comment";
$statement = $pdo->prepare($sql);
$statement -> execute();
$comment_array = $statement;

?>