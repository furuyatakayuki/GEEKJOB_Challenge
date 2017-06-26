<?php

function even_check($num){
    if($num % 2 == 0) echo $num . "は偶数です<br>";
    else echo $num . "は奇数です<br>";
}

even_check(10);
