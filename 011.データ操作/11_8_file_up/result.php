<?php

$files_path = './files/' . $_FILES["userfile"]["name"];

if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $files_path)){
    echo "【アップロード成功】<br>";
    echo "<br>【アップされたファイルの内容】<br>";
    echo file_get_contents($files_path);
}else{
    echo "【アップロード失敗】";
}