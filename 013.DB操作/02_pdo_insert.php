<?php

// データベース接続用。ユーザ定義関数のmysql_acces()によりpdoオブジェクトを取得。
require_once './00_mysql_acces.php';

$sql = 'insert into profiles(name, tell, age, birthday) values(:name, :tell, :age, :birthday);';

$pdo_obj = mysql_acces();

$pdo_st = $pdo_obj->prepare($sql);
$pdo_st->bindValue(':name', "佐藤 実");
$pdo_st->bindValue(':tell', "000-222-4455");
$pdo_st->bindValue(':age', 21);
$pdo_st->bindValue(':birthday', "1997-6-5");

$pdo_st->execute();

$pdo_obj = null;
