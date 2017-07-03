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

class num_test_2 extends num_test{
    public function clear_num(){
        $this->a = 0;
        $this->b = 0;
    }
}


// 以下確認用
$test = new num_test_2();

$test->echo_num($test->a, $test->b);
$test->clear_num();
$test->echo_num($test->a, $test->b);
