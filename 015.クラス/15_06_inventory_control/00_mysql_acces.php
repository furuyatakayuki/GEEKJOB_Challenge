<?php

function mysql_acces(){
    try{
        $dns = 'mysql:host=localhost;';// ホスト名
        $dns .= 'dbname=challenge_db;';// データベース名
        $dns .= 'charset=utf8';// 文字コード
        // データベースへの接続
        $pdo_obj = new PDO($dns, 'user_name', 'password');
        if($pdo_obj != null){
            // echo "接続に成功しました<br>";
            return $pdo_obj;
        }
    }catch(PDOException $e){
        echo "接続に失敗しました<br>" . $e->getMessage();
        exit();
    }
}
