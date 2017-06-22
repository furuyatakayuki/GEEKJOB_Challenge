<table border="1" cellpadding="5">

<?php

$x = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
$y = array(1, 2, 3, 4, 5, 6, 7, 8, 9);

foreach($y as $y_tmp){
    echo "<tr>";//<tr>HTMLで行の表記
    foreach($x as $x_tmp){
        if($x_tmp == 7) break;
        echo "<td>$x_tmp × $y_tmp = " . $x_tmp*$y_tmp . "</td>";//<td>HTMLで列の表記
    }
    echo "</tr>";
}

?>

</table>