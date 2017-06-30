<?php

// データベース接続用。ユーザ定義関数のmysql_acces()によりpdoオブジェクトを取得。
require_once './00_mysql_acces.php';

function touroku_result(){
    $sql = 'insert into profiles(name, tell, age, birthday) values(:name, :tell, :age, :birthday);';
    
    
    $pdo_obj = mysql_acces();
    $pdo_st = $pdo_obj->prepare($sql);
    $pdo_st->bindValue(':name', $_POST['name']);
    $pdo_st->bindValue(':tell', $_POST['tell']);
    $pdo_st->bindValue(':age', $_POST['age']);
    $pdo_st->bindValue(':birthday', $_POST['birthday']);
    
    $pdo_st->execute();
    
    $pdo_obj = null;
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登録フォーム</title>
</head>
<body>
    <form action="./09_pdo_registration_form.php" method="post">
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
    if (isset($_POST['name'],$_POST['tell'],$_POST['age'],$_POST['birthday'])) {
        touroku_result();
    }
    ?>

</body>
</html>