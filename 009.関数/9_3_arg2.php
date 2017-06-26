<?php

function calc($num1, $num2 = 5, $num3 = false){
    $x = $num1 * $num2;
    if($num3) $x = pow($x * $num3, 2);
    echo "計算結果：" . $x . "<br>";
}

calc(4, 2, 3);
