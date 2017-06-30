<?php

try{
    $dns = 'mysql:host=localhost;';// ホスト名
    $dns .= 'dbname=challenge_db;';// データベース名
    $dns .= 'charset=utf8';// 文字コード
    // データベースへの接続
    $pdo_obj = new PDO($dns, 'user_name', 'password');
    if($dns != null){
        echo "接続に成功しました<br>";
    }
}catch(PDOException $e){
    echo "接続に失敗しました<br>" . $e->getMessage();
    exit();
}
