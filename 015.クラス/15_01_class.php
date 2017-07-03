<?php

class num_test {
    public $a = 2;
    public $b = 3;

    public function set_num($num1, $num2){
        $this->a = $num1;
        $this->b = $num2;
    }

    public function echo_num($num1, $num2){
        echo $num1 . "<br>" . $num2 . "<br>";
    }
}

// 以下確認用
$test = new num_test();

$test->echo_num($test->a, $test->b);
$test->set_num(10, 15);
$test->echo_num($test->a, $test->b);