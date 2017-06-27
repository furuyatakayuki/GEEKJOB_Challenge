<?php


echo "今回ログイン：" . date('Y-m-d H:i:s') . "<br>";
setcookie("lastLogintime", date('Y-m-d H:i:s'));

foreach ($_COOKIE as $key => $value) {
    if($key == "lastLogintime"){
        echo "前回ログイン：" . $value . "<br>";
    }
}