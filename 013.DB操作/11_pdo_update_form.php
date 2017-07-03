<?php

// データベース接続用。ユーザ定義関数のmysql_acces()によりpdoオブジェクトを取得。
require_once './00_mysql_acces.php';

function touroku_result(){
    $sql = 'update profiles set name = :name, tell = :tell, age = :age, birthday = :birthday where profilesID = :id;';
    
    $pdo_obj = mysql_acces();
    $pdo_st = $pdo_obj->prepare($sql);
    $pdo_st->bindValue(':name', $_POST['name']);
    $pdo_st->bindValue(':tell', $_POST['tell']);
    $pdo_st->bindValue(':age', $_POST['age']);
    $pdo_st->bindValue(':birthday', $_POST['birthday']);
    $pdo_st->bindValue(':id', $_POST['id']);
    
    $pdo_st->execute();
    
    $pdo_obj = null;
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>更新フォーム</title>
</head>
<body>
    <form action="<?php basename($_SERVER['SCRIPT_NAME']) ?>" method="post">
        更新ID<br>
        <input type="number" name="id" required><br>
        名前<br>
        <input type="text" name="name" required><br>
        電話番号<br>
        <input type="text" name="tell" required><br>
        年齢<br>
        <input type="number" name="age" required><br>
        誕生日<br>
        <input type="text" name="birthday" required><br>
        <input type="submit" name="btnsubmit">
    </form>

    <?php
    if (isset($_POST['id'],$_POST['name'],$_POST['tell'],$_POST['age'],$_POST['birthday'])) {
        touroku_result();
    }
    ?>

</body>
</html>