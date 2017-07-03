<?php

// データベース接続用。ユーザ定義関数のmysql_acces()によりpdoオブジェクトを取得。
require_once './00_mysql_acces.php';

function delete_id(){
    $sql = 'delete from profiles where profilesID = :id;';
    
    $pdo_obj = mysql_acces();
    $pdo_st = $pdo_obj->prepare($sql);
    $pdo_st->bindValue(':id', $_POST['id']);
    
    $pdo_st->execute();
    
    $pdo_obj = null;
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>削除フォーム</title>
</head>
<body>
    <form action="./10_pdo_delete_form.php" method="post">
        削除ID<br>
        <input type="number" name="id" required><br>
        <input type="submit" name="btnsubmit">
    </form>

    <?php
    if (isset($_POST['id'])) {
        delete_id();
    }
    ?>

</body>
</html>