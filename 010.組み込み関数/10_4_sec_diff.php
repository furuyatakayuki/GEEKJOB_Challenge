<?php

$date1 = mktime(0, 0, 0, 1, 1, 2015);
$date2 = mktime(23, 59, 59, 12, 31, 2015);

$sa = abs($date1 - $date2);

echo date('Y-m-d H:i:s',$date1) . "<br>" . date('Y-m-d H:i:s',$date2) . "<br>上記の差は" . $sa . "秒です。";