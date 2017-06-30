<?php

// データベース接続用。ユーザ定義関数のmysql_acces()によりpdoオブジェクトを取得。
require_once './00_mysql_acces.php';

$sql = 'update profiles set name = :name, age = :age, birthday = :birthday where profilesID = 1;';

$pdo_obj = mysql_acces();

$pdo_st = $pdo_obj->prepare($sql);
$pdo_st->bindValue(':name', '松岡 修造');
$pdo_st->bindValue(':age', 48);
$pdo_st->bindValue(':birthday', '1967-11-06');

$pdo_st->execute();

$datas = $pdo_st->fetchAll(PDO::FETCH_ASSOC);

$pdo_obj = null;

?>
