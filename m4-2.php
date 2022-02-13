<?php

 // DB接続設定
     $dsn = 'mysql:dbname=データベース名;host=localhost';
    $user = 'ユーザー名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
//4-1で書いた「// DB接続設定」のコードの下に続けて記載する。
    $sql = "CREATE TABLE IF NOT EXISTS tbtest"." (". "id INT AUTO_INCREMENT PRIMARY KEY,". "name char(32),". "comment TEXT".");";
    $stmt = $pdo->query($sql);
    
    ?>