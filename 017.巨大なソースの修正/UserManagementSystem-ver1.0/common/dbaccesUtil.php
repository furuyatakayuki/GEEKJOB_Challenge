<?php

//DBへの接続用を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','username','password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}

function all_registration($insert_db, $name, $birthday, $tell, $type, $comment){
    try{
        //DBに全項目のある1レコードを登録するSQL
        $insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
                . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";
    
        //クエリとして用意
        $insert_query = $insert_db->prepare($insert_sql);
    
        //SQL文にセッションから受け取った値＆現在時をバインド
        $insert_query->bindValue(':name',$name);
        $insert_query->bindValue(':birthday',$birthday);
        $insert_query->bindValue(':tell',$tell);
        if ($type == "エンジニア") { $type_int = 1; }
        elseif ($type == "営業") { $type_int = 2; }
        else { $type_int = 3; }
        $insert_query->bindValue(':type',$type_int);
        $insert_query->bindValue(':comment',$comment);
        $insert_query->bindValue(':newDate',date('Y-m-d H:i:s'));
        
        //SQLを実行
        $insert_query->execute();
        
        //接続オブジェクトを初期化することでDB接続を切断
        $insert_db=null;
        
        return 0;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}