<?php

//error訊息記載
$error_msg = array();

if (isset($_POST["threadSubmitButton"])) {

    //留言板 Checking
    if(empty($_POST['title'])) {
        $error_msg["title"] = "請輸入主題";
    } else {
        //防止XSS攻擊 htmlspecialchars轉換特殊符號
        $escaped["title"] = htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");
    }

    if(empty($_POST['username'])) {
        $error_msg["username"] = "請輸入你的名字";
    } else {
        //防止XSS攻擊 htmlspecialchars轉換特殊符號
        $escaped["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
    }

    if(empty($_POST['commentBody'])) {
        $error_msg["body"] = "請輸入你的留言";
    } else {
        $escaped["comment"] = htmlspecialchars($_POST["commentBody"], ENT_QUOTES, "UTF-8");
    }

    if(empty($error_msg)) {
        $post_date = date("Y-m-d H:i:s");

        $pdo->beginTransaction();

        try {
            $sql = "INSERT INTO `thread` (`title`) VALUE (:title);";
            $statement = $pdo->prepare($sql);
        
            // 把值存入, 第三個參數為Data type
            $statement -> bindParam(":title", $escaped["title"], PDO::PARAM_STR);
            //statement執行
            $statement -> execute();
    
            //新留言板的首個技稿(做樓豬)
            $sql = "INSERT INTO comment (username, body, post_date, thread_id)
            VALUES (:username, :body, :post_date, (SELECT id FROM thread WHERE title = :title))";
            $statement = $pdo->prepare($sql);
             // 把值存入, 第三個參數為Data type
             $statement -> bindParam(":username", $escaped["username"], PDO::PARAM_STR);
             $statement -> bindParam(":body", $escaped["comment"], PDO::PARAM_STR);
             $statement -> bindParam(":post_date", $post_date, PDO::PARAM_STR);
             $statement -> bindParam(":title", $escaped["title"], PDO::PARAM_STR);
            //statement執行
            $statement -> execute();
            $pdo->commit();
            
            //回首頁
            header("Location: http://localhost:8080/php-tutorial/");

        } catch(Exception $error) {
            $pdo->rollBack();
        }
    
    }

}

?>