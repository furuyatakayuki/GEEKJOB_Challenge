<?php

session_start();

foreach ($_SESSION as $key => $value) {
    if($key == "lastLogintime"){
        echo "前回ログイン：" . $value . "<br>";
    }
}

echo "今回ログイン：" . date('Y-m-d H:i:s') . "<br>";
$_SESSION["lastLogintime"] = date('Y-m-d H:i:s');

