<?php

//error訊息記載
$error_msg = array();

//SESSION使用
session_start();

if (isset($_POST["submitButton"])) {

    //Value Checking
    if(empty($_POST['username'])) {
        $error_msg["username"] = "請輸入你的名字";
    } else {
        //防止XSS攻擊 htmlspecialchars轉換特殊符號
        $escaped["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
        //設定SESSION
        $_SESSION["username"] = $escaped["username"];
    }

    if(empty($_POST['commentBody'])) {
        $error_msg["body"] = "請輸入你的留言";
    } else {
        $escaped["comment"] = htmlspecialchars($_POST["commentBody"], ENT_QUOTES, "UTF-8");
    }

    if(empty($error_msg)) {
        $post_date = date("Y-m-d H:i:s");

        //Transaction 防止data傳送中途出bug的對策
        $pdo->beginTransaction();

        try {
            $sql = "INSERT INTO `comment` (`username`, `body`, `post_date`, `thread_id`) VALUE (:username, :body, :post_date, :thread_id)";
            $statement = $pdo->prepare($sql);
        
            // 把值存入, 第三個參數為Data type
            $statement -> bindParam(":username", $escaped["username"], PDO::PARAM_STR);
            $statement -> bindParam(":body", $escaped["comment"], PDO::PARAM_STR);
            $statement -> bindParam(":post_date", $post_date, PDO::PARAM_STR);
            $statement -> bindParam(":thread_id", $_POST["threadID"], PDO::PARAM_STR);
            //statement執行
            $statement -> execute();

            $pdo->commit();
        } catch(Exception $error) {
            // rollBack是指取消動作 復原
            $pdo->rollBack();
        }
    
    }



}

?>