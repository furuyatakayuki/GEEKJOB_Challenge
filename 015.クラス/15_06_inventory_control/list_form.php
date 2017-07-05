<?php
// データベース接続用。ユーザ定義関数のmysql_acces()によりpdoオブジェクトを取得。
require_once './00_mysql_acces.php';

session_start();

if (!isset($_SESSION["name"])) {
    header("Location: logout_form.php");
    exit;
}

function list_show(){
    $sql = 'select * from i_goods';
    
    $pdo_obj = mysql_acces();
    $pdo_st = $pdo_obj->prepare($sql);
    $pdo_st->execute();
    $datas = $pdo_st->fetchAll(PDO::FETCH_ASSOC);
    
    $pdo_obj = null;
    
    if($datas == null){
        echo "<tr><td>商品情報がありません</td></tr>";
        return 0;
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
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>在庫一覧</title>
</head>
<body>
    <caption>在庫一覧</caption>
    <table border="1" cellpadding="5">
        <?php list_show(); ?>
    </table>
    <a href="registration_form.php">登録フォーム</a><br>
    <a href="logout_form.php">ログアウト画面</a><br>
</body>
</html>