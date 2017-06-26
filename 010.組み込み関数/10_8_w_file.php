<?php

$str = "始めまして\r\nよろしくお願いします。";

// 一括書き込みの場合
// file_put_contents("test_file.txt", $str);

$fp = fopen("test_file.txt", "w");

if($fp != false){
    fwrite($fp, $str);

    fclose($fp);
    
    echo "書き出し完了";
}
