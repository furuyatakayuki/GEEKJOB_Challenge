<?php

if($fp = fopen("test_file.txt", "r")){
    while($line = fgets($fp)){
        echo $line . "<br>";
    }

    fclose($fp);
}
else{
    echo "ファイルの読み込みに失敗しました";
}
