<?php

$str = "きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます";

$result = str_replace("U", "う", $str);
$result = str_replace("I", "い", $result);

echo $str . "<br>↓<br>" . $result;