<?php

function prf($data, $pattern){
    foreach($data as $prf){
        foreach($prf as $key => $value){
            if($key == "name" && preg_match("/$pattern/", $value)){
                return $prf;
            }
        }
    }
    return false;
}

// 3人分のプロフィールの設定
$data = array(
    array('id'=>"0001", 'name'=>"satou taito", 'birth'=>"1/1", 'address'=>"kantou"),
    array('id'=>"0002", 'name'=>"suzuki ren", 'birth'=>"2/2", 'address'=>"jouto"),
    array('id'=>"0003", 'name'=>"takahasi yuuma", 'birth'=>"3/3", 'address'=>"houen")
    );

$result = prf($data, "suzuki");

if($result){
    foreach($result as $key => $value){
        if($key != "id") echo $key . "：" . $value . "<br>";
    }
}
else echo "該当者なし<br>";