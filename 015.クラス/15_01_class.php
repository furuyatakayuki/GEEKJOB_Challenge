<?php

class calc_test {
    public $a = 2;
    public $b = 3;

    public function set_num(&$a_2, &$b_2){
        $a_2 = 5;
        $b_2 = 15;
    }

    public function echo_num($num1, $num2){
        echo $num1 . "<br>" . $num2 . "<br>";
    }
}


// 以下確認用
$test = new calc_test();

$test->echo_num($test->a, $test->b);
$test->set_num($test->a, $test->b);
$test->echo_num($test->a, $test->b);