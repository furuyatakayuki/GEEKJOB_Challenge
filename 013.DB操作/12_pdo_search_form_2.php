<?php

// データベース接続用。ユーザ定義関数のmysql_acces()によりpdoオブジェクトを取得。
require_once './00_mysql_acces.php';

function search_result(){
    $sql = 'select * from profiles where';

    foreach ($_POST as $key => $value) {
        if (($key != "name") && ($value != "") && ($key != "btnsubmit")) {
            $sql .= " " . $key . " = :" . $key . " and";
        }
        else if (($value != "") && ($key != "btnsubmit")) {
            $sql .= " " . $key . " like :" . $key . " and";
        }
    }
    $sql = rtrim($sql, " and");
    $sql .= ';';

    $pdo_obj = mysql_acces();
    $pdo_st = $pdo_obj->prepare($sql);

    foreach ($_POST as $key => $value) {
        if (($key != "name") && (($value != "")) && ($key != "btnsubmit")) {
            $pdo_st->bindValue(":" . $key, $_POST[$key]);
        }
        elseif (($value != "") && ($key != "btnsubmit")) {
            $pdo_st->bindValue(":" . $key, "%" . $_POST[$key] . "%");
        }
    }
    
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
    <title>登録者検索フォーム</title>
</head>
<body>
    <form action="<?php basename($_SERVER['SCRIPT_NAME']) ?>" method="post">
        ID<br>
        <input type="number" name="profilesID"><br>
        名前<br>
        <input type="text" name="name"><br>
        電話番号<br>
        <input type="text" name="tell"><br>
        年齢<br>
        <input type="number" name="age"><br>
        誕生日<br>
        <input type="text" name="birthday"><br>
        <input type="submit" name="btnsubmit">
    </form>

    <?php
    if (isset($_POST['id']) || isset($_POST['name']) || isset($_POST['tell']) || isset($_POST['age']) || isset($_POST['birthday'])) { ?>
        <table border="1" cellpadding="5">
        <?php search_result(); ?>
        </table>
    <?php } ?>

</body>
</html>