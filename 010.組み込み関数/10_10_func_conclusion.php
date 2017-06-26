<?php

// 多次元、連想配列の要素で並び替えを行うプログラム。
// 開始と終了の日時をlog.txtに保存する。
// 参考：http://qiita.com/tadasuke/items/e7be0d214e02105ab6d8

function hairetu_sort(&$target, $target_key){
    $array = array();
    foreach($target as $key => $value){
        $array[$key] = $value[$target_key];
    }
    array_multisort($array, $target);
}

function hairetu_view($target){
    foreach ($target as $key1 => $value1) {
        foreach($value1 as $key2 => $value2){
            echo $key2 . " => " . $value2 . "<br>";
        }
        echo "<br>";
    }
}


$log = "log.txt";

$data = array(
    array('id'=>"0000", 'name'=>"suzuki ren", 'birth'=>"2/2", 'address'=>"jouto"),
    array('id'=>"0001", 'name'=>"satou taito", 'birth'=>"1/1", 'address'=>"kantou"),
    array('id'=>"0002", 'name'=>"takahasi yuuma", 'birth'=>"3/3", 'address'=>"houen")
);

if($fp = fopen($log, "w")){
    fwrite($fp, date('Y-m-d H:i:s') . " 開始\r\n");

    // 並び替え処理
    echo "元データ<br>";
    hairetu_view($data);
    hairetu_sort($data, "name");
    echo "並び替え後<br>";
    hairetu_view($data);
    echo "<br>";

    fwrite($fp, date('Y-m-d H:i:s') . " 終了\r\n");
    fclose($fp);
    
    // logファイルの内容確認
    if($fp = fopen($log, "r")){
        while($line = fgets($fp)){
            echo $line . "<br>";
        }
    
        fclose($fp);
    }
    else{
        echo "ファイルの読み込みに失敗しました";
    }

}
else {
    echo "予期せぬエラーです";
}
