<?php

function prf(){
    $id = "0001";
    $name = "furuya";
    $birth = "2/3";
    $ad = "kantou";

    return array('id'=>$id, 'name'=>$name, 'birth'=>$birth, 'address'=>$ad);
}

$data = prf();

foreach($data as $key => $value){
    if($key != "id") echo $key . "：" . $value . "<br>";
}