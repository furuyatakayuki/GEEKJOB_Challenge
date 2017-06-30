<table border="1" cellpadding="5">

<?php

// データベース接続用。ユーザ定義関数のmysql_acces()によりpdoオブジェクトを取得。
require_once './00_mysql_acces.php';

$sql = 'select * from profiles where profilesID = :value;';

$pdo_obj = mysql_acces();

$pdo_st = $pdo_obj->prepare($sql);
$pdo_st->bindValue(':value', 1);

$pdo_st->execute();

$datas = $pdo_st->fetchAll(PDO::FETCH_ASSOC);

if($datas == null){
    echo "<tr><td>一致するデータがありません</td></tr>";
    exit();
}

echo "<tr>";
foreach ($datas[0] as $key => $value) {
    echo "<td>" . $key . "</td>";
}
echo "</tr>";

foreach ($datas as $prf) {
    echo "<tr>";
    foreach ($prf as $key => $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}

$pdo_obj = null;

?>

</table>