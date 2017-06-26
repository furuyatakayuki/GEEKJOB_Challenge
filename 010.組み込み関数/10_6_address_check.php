<?php

$mailaddress = "sample@gmail.com";

$check = strstr($mailaddress, '@');

if(mb_strlen($check) > 1){
    echo $mailaddress . "のドメインは" . substr($check, 1) . "です。";
}
else {
    echo "ドメインが見つかりません。";
}