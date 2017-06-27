<?php

function factoring($num, $fac_list, $i = 0, $list = array()){
    if(($fac_list[$i] >= 10) || ($num == 1)){
        $base = $num;
        foreach($list as $value){
            $base *= $value;
        }
        echo "<br>元の値：" . $base . "<br>素因数：";
        foreach($list as $value){
           echo $value . ", ";
        }
        if($num != 1){
            echo "<br>余り：" . $num;
        }
        return 0;
    }elseif($num % $fac_list[$i] == 0){
        echo $fac_list[$i] . "：" . $num . "<br>";
        $list[] = $fac_list[$i];
        factoring($num / $fac_list[$i], $fac_list, $i, $list);
    }else{
        factoring($num, $fac_list, $i+1, $list);
    }
}

$sosu = array(2, 3, 5, 7, 11);

factoring($_GET["number"], $sosu);
