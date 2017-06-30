<?php

// データベース接続用。ユーザ定義関数のmysql_acces()によりpdoオブジェクトを取得。
require_once './00_mysql_acces.php';

function search_result(){
    $sql = 'select * from profiles where name like :value;';
    
    $pdo_obj = mysql_acces();
    $pdo_st = $pdo_obj->prepare($sql);
    $pdo_st->bindValue(':value', "%" . $_POST['name'] . "%");

    $pdo_st->execute();
    $datas = $pdo_st->fetchAll(PDO::FETCH_ASSOC);

    if($datas == null){
    echo "<tr><td>一致するデータがありません</td></tr>";
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
    
    $pdo_obj = null;
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登録者名検索フォーム</title>
</head>
<body>
    <form action="./08_pdo_search_form.php" method="post">
        名前<br>
        <input type="text" name="name" required><br>
        <input type="submit" name="btnsubmit">
    </form>

    <?php
    if (isset($_POST['name'])) { ?>
        <table border="1" cellpadding="5">
        <?php search_result(); ?>
        </table>
    <?php } ?>

</body>
</html>