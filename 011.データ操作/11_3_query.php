<?php

switch ($_GET["type"]){
    case 1:
        echo "雑貨<br>";
        break;
    case 2:
        echo "生鮮食品<br>";
        break;
    default:
        echo "その他<br>";
        break;
}

echo "総額：" . $_GET["total"] . "<br>";

echo "単価：" . $_GET["total"] / $_GET["count"] . "<br>";

if($_GET["total"] >= 5000){
    echo "追加ポイント：5％"; 
}elseif($_GET["total"] >= 3000){
    echo "追加ポイント：3％";
}else{
    echo "今回は追加ポイントはありません";
}
